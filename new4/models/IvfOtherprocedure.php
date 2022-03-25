<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_otherprocedure
 */
class IvfOtherprocedure extends DbTable
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
    public $Name;
    public $Age;
    public $SEX;
    public $Address;
    public $DateofAdmission;
    public $DateofProcedure;
    public $DateofDischarge;
    public $Consultant;
    public $Surgeon;
    public $Anesthetist;
    public $IdentificationMark;
    public $ProcedureDone;
    public $PROVISIONALDIAGNOSIS;
    public $Chiefcomplaints;
    public $MaritallHistory;
    public $MenstrualHistory;
    public $SurgicalHistory;
    public $PastHistory;
    public $FamilyHistory;
    public $Temp;
    public $Pulse;
    public $BP;
    public $CNS;
    public $_RS;
    public $CVS;
    public $PA;
    public $InvestigationReport;
    public $FinalDiagnosis;
    public $Treatment;
    public $DetailOfOperation;
    public $FollowUpAdvice;
    public $FollowUpMedication;
    public $Plan;
    public $TempleteFinalDiagnosis;
    public $TemplateTreatment;
    public $TemplateOperation;
    public $TemplateFollowUpAdvice;
    public $TemplateFollowUpMedication;
    public $TemplatePlan;
    public $QRCode;
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
        $this->TableVar = 'ivf_otherprocedure';
        $this->TableName = 'ivf_otherprocedure';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_otherprocedure`";
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
        $this->id = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Name->Lookup = new Lookup('Name', 'patient', false, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // Age
        $this->Age = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = false; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // SEX
        $this->SEX = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, 45, -1, false, '`SEX`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SEX->Sortable = false; // Allow sort
        $this->SEX->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SEX->Param, "CustomMsg");
        $this->Fields['SEX'] = &$this->SEX;

        // Address
        $this->Address = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Address', 'Address', '`Address`', '`Address`', 200, 45, -1, false, '`Address`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address->Sortable = false; // Allow sort
        $this->Address->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address->Param, "CustomMsg");
        $this->Fields['Address'] = &$this->Address;

        // DateofAdmission
        $this->DateofAdmission = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofAdmission', 'DateofAdmission', '`DateofAdmission`', CastDateFieldForLike("`DateofAdmission`", 11, "DB"), 135, 19, 11, false, '`DateofAdmission`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofAdmission->Sortable = true; // Allow sort
        $this->DateofAdmission->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->DateofAdmission->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DateofAdmission->Param, "CustomMsg");
        $this->Fields['DateofAdmission'] = &$this->DateofAdmission;

        // DateofProcedure
        $this->DateofProcedure = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofProcedure', 'DateofProcedure', '`DateofProcedure`', CastDateFieldForLike("`DateofProcedure`", 11, "DB"), 135, 19, 11, false, '`DateofProcedure`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofProcedure->Sortable = true; // Allow sort
        $this->DateofProcedure->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DateofProcedure->Param, "CustomMsg");
        $this->Fields['DateofProcedure'] = &$this->DateofProcedure;

        // DateofDischarge
        $this->DateofDischarge = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofDischarge', 'DateofDischarge', '`DateofDischarge`', CastDateFieldForLike("`DateofDischarge`", 11, "DB"), 135, 19, 11, false, '`DateofDischarge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateofDischarge->Sortable = true; // Allow sort
        $this->DateofDischarge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DateofDischarge->Param, "CustomMsg");
        $this->Fields['DateofDischarge'] = &$this->DateofDischarge;

        // Consultant
        $this->Consultant = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, false, '`Consultant`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Consultant->Sortable = true; // Allow sort
        $this->Consultant->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Consultant->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Consultant->Lookup = new Lookup('Consultant', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Consultant->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Consultant->Param, "CustomMsg");
        $this->Fields['Consultant'] = &$this->Consultant;

        // Surgeon
        $this->Surgeon = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, 45, -1, false, '`Surgeon`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Surgeon->Sortable = true; // Allow sort
        $this->Surgeon->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Surgeon->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Surgeon->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Surgeon->Param, "CustomMsg");
        $this->Fields['Surgeon'] = &$this->Surgeon;

        // Anesthetist
        $this->Anesthetist = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Anesthetist', 'Anesthetist', '`Anesthetist`', '`Anesthetist`', 200, 45, -1, false, '`Anesthetist`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Anesthetist->Sortable = true; // Allow sort
        $this->Anesthetist->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Anesthetist->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Anesthetist->Lookup = new Lookup('Anesthetist', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->Anesthetist->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Anesthetist->Param, "CustomMsg");
        $this->Fields['Anesthetist'] = &$this->Anesthetist;

        // IdentificationMark
        $this->IdentificationMark = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, false, '`IdentificationMark`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IdentificationMark->Sortable = true; // Allow sort
        $this->IdentificationMark->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IdentificationMark->Param, "CustomMsg");
        $this->Fields['IdentificationMark'] = &$this->IdentificationMark;

        // ProcedureDone
        $this->ProcedureDone = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_ProcedureDone', 'ProcedureDone', '`ProcedureDone`', '`ProcedureDone`', 200, 45, -1, false, '`ProcedureDone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProcedureDone->Sortable = true; // Allow sort
        $this->ProcedureDone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProcedureDone->Param, "CustomMsg");
        $this->Fields['ProcedureDone'] = &$this->ProcedureDone;

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, 45, -1, false, '`PROVISIONALDIAGNOSIS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PROVISIONALDIAGNOSIS->Sortable = true; // Allow sort
        $this->PROVISIONALDIAGNOSIS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PROVISIONALDIAGNOSIS->Param, "CustomMsg");
        $this->Fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

        // Chiefcomplaints
        $this->Chiefcomplaints = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 200, 45, -1, false, '`Chiefcomplaints`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Chiefcomplaints->Sortable = true; // Allow sort
        $this->Chiefcomplaints->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Chiefcomplaints->Param, "CustomMsg");
        $this->Fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

        // MaritallHistory
        $this->MaritallHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_MaritallHistory', 'MaritallHistory', '`MaritallHistory`', '`MaritallHistory`', 200, 45, -1, false, '`MaritallHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaritallHistory->Sortable = true; // Allow sort
        $this->MaritallHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaritallHistory->Param, "CustomMsg");
        $this->Fields['MaritallHistory'] = &$this->MaritallHistory;

        // MenstrualHistory
        $this->MenstrualHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 200, 45, -1, false, '`MenstrualHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MenstrualHistory->Sortable = true; // Allow sort
        $this->MenstrualHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MenstrualHistory->Param, "CustomMsg");
        $this->Fields['MenstrualHistory'] = &$this->MenstrualHistory;

        // SurgicalHistory
        $this->SurgicalHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, 45, -1, false, '`SurgicalHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SurgicalHistory->Sortable = true; // Allow sort
        $this->SurgicalHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SurgicalHistory->Param, "CustomMsg");
        $this->Fields['SurgicalHistory'] = &$this->SurgicalHistory;

        // PastHistory
        $this->PastHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PastHistory', 'PastHistory', '`PastHistory`', '`PastHistory`', 200, 45, -1, false, '`PastHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PastHistory->Sortable = true; // Allow sort
        $this->PastHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PastHistory->Param, "CustomMsg");
        $this->Fields['PastHistory'] = &$this->PastHistory;

        // FamilyHistory
        $this->FamilyHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, false, '`FamilyHistory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FamilyHistory->Sortable = true; // Allow sort
        $this->FamilyHistory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FamilyHistory->Param, "CustomMsg");
        $this->Fields['FamilyHistory'] = &$this->FamilyHistory;

        // Temp
        $this->Temp = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Temp', 'Temp', '`Temp`', '`Temp`', 200, 45, -1, false, '`Temp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Temp->Sortable = true; // Allow sort
        $this->Temp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Temp->Param, "CustomMsg");
        $this->Fields['Temp'] = &$this->Temp;

        // Pulse
        $this->Pulse = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, false, '`Pulse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pulse->Sortable = true; // Allow sort
        $this->Pulse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pulse->Param, "CustomMsg");
        $this->Fields['Pulse'] = &$this->Pulse;

        // BP
        $this->BP = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, false, '`BP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BP->Sortable = true; // Allow sort
        $this->BP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BP->Param, "CustomMsg");
        $this->Fields['BP'] = &$this->BP;

        // CNS
        $this->CNS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_CNS', 'CNS', '`CNS`', '`CNS`', 200, 45, -1, false, '`CNS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CNS->Sortable = true; // Allow sort
        $this->CNS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CNS->Param, "CustomMsg");
        $this->Fields['CNS'] = &$this->CNS;

        // RS
        $this->_RS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x__RS', 'RS', '`RS`', '`RS`', 200, 45, -1, false, '`RS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_RS->Sortable = true; // Allow sort
        $this->_RS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_RS->Param, "CustomMsg");
        $this->Fields['RS'] = &$this->_RS;

        // CVS
        $this->CVS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, 45, -1, false, '`CVS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CVS->Sortable = true; // Allow sort
        $this->CVS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CVS->Param, "CustomMsg");
        $this->Fields['CVS'] = &$this->CVS;

        // PA
        $this->PA = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PA', 'PA', '`PA`', '`PA`', 200, 45, -1, false, '`PA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PA->Sortable = true; // Allow sort
        $this->PA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PA->Param, "CustomMsg");
        $this->Fields['PA'] = &$this->PA;

        // InvestigationReport
        $this->InvestigationReport = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_InvestigationReport', 'InvestigationReport', '`InvestigationReport`', '`InvestigationReport`', 201, 65535, -1, false, '`InvestigationReport`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->InvestigationReport->Sortable = true; // Allow sort
        $this->InvestigationReport->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InvestigationReport->Param, "CustomMsg");
        $this->Fields['InvestigationReport'] = &$this->InvestigationReport;

        // FinalDiagnosis
        $this->FinalDiagnosis = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FinalDiagnosis', 'FinalDiagnosis', '`FinalDiagnosis`', '`FinalDiagnosis`', 201, 65535, -1, false, '`FinalDiagnosis`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FinalDiagnosis->Sortable = true; // Allow sort
        $this->FinalDiagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FinalDiagnosis->Param, "CustomMsg");
        $this->Fields['FinalDiagnosis'] = &$this->FinalDiagnosis;

        // Treatment
        $this->Treatment = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 201, 65535, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Treatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatment->Param, "CustomMsg");
        $this->Fields['Treatment'] = &$this->Treatment;

        // DetailOfOperation
        $this->DetailOfOperation = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DetailOfOperation', 'DetailOfOperation', '`DetailOfOperation`', '`DetailOfOperation`', 201, 65535, -1, false, '`DetailOfOperation`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DetailOfOperation->Sortable = true; // Allow sort
        $this->DetailOfOperation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DetailOfOperation->Param, "CustomMsg");
        $this->Fields['DetailOfOperation'] = &$this->DetailOfOperation;

        // FollowUpAdvice
        $this->FollowUpAdvice = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FollowUpAdvice', 'FollowUpAdvice', '`FollowUpAdvice`', '`FollowUpAdvice`', 201, 65535, -1, false, '`FollowUpAdvice`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FollowUpAdvice->Sortable = true; // Allow sort
        $this->FollowUpAdvice->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FollowUpAdvice->Param, "CustomMsg");
        $this->Fields['FollowUpAdvice'] = &$this->FollowUpAdvice;

        // FollowUpMedication
        $this->FollowUpMedication = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FollowUpMedication', 'FollowUpMedication', '`FollowUpMedication`', '`FollowUpMedication`', 201, 65535, -1, false, '`FollowUpMedication`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FollowUpMedication->Sortable = true; // Allow sort
        $this->FollowUpMedication->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FollowUpMedication->Param, "CustomMsg");
        $this->Fields['FollowUpMedication'] = &$this->FollowUpMedication;

        // Plan
        $this->Plan = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Plan', 'Plan', '`Plan`', '`Plan`', 201, 65535, -1, false, '`Plan`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Plan->Sortable = true; // Allow sort
        $this->Plan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Plan->Param, "CustomMsg");
        $this->Fields['Plan'] = &$this->Plan;

        // TempleteFinalDiagnosis
        $this->TempleteFinalDiagnosis = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TempleteFinalDiagnosis', 'TempleteFinalDiagnosis', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TempleteFinalDiagnosis->IsCustom = true; // Custom field
        $this->TempleteFinalDiagnosis->Sortable = true; // Allow sort
        $this->TempleteFinalDiagnosis->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TempleteFinalDiagnosis->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TempleteFinalDiagnosis->Lookup = new Lookup('TempleteFinalDiagnosis', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FinalDiagnosis"], '', '');
        $this->TempleteFinalDiagnosis->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TempleteFinalDiagnosis->Param, "CustomMsg");
        $this->Fields['TempleteFinalDiagnosis'] = &$this->TempleteFinalDiagnosis;

        // TemplateTreatment
        $this->TemplateTreatment = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateTreatment', 'TemplateTreatment', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateTreatment->IsCustom = true; // Custom field
        $this->TemplateTreatment->Sortable = true; // Allow sort
        $this->TemplateTreatment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateTreatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateTreatment->Lookup = new Lookup('TemplateTreatment', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Treatment"], '', '');
        $this->TemplateTreatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateTreatment->Param, "CustomMsg");
        $this->Fields['TemplateTreatment'] = &$this->TemplateTreatment;

        // TemplateOperation
        $this->TemplateOperation = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateOperation', 'TemplateOperation', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateOperation->IsCustom = true; // Custom field
        $this->TemplateOperation->Sortable = true; // Allow sort
        $this->TemplateOperation->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateOperation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateOperation->Lookup = new Lookup('TemplateOperation', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_DetailOfOperation"], '', '');
        $this->TemplateOperation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateOperation->Param, "CustomMsg");
        $this->Fields['TemplateOperation'] = &$this->TemplateOperation;

        // TemplateFollowUpAdvice
        $this->TemplateFollowUpAdvice = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateFollowUpAdvice', 'TemplateFollowUpAdvice', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateFollowUpAdvice->IsCustom = true; // Custom field
        $this->TemplateFollowUpAdvice->Sortable = true; // Allow sort
        $this->TemplateFollowUpAdvice->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateFollowUpAdvice->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateFollowUpAdvice->Lookup = new Lookup('TemplateFollowUpAdvice', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowUpAdvice"], '', '');
        $this->TemplateFollowUpAdvice->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateFollowUpAdvice->Param, "CustomMsg");
        $this->Fields['TemplateFollowUpAdvice'] = &$this->TemplateFollowUpAdvice;

        // TemplateFollowUpMedication
        $this->TemplateFollowUpMedication = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateFollowUpMedication', 'TemplateFollowUpMedication', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateFollowUpMedication->IsCustom = true; // Custom field
        $this->TemplateFollowUpMedication->Sortable = true; // Allow sort
        $this->TemplateFollowUpMedication->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateFollowUpMedication->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateFollowUpMedication->Lookup = new Lookup('TemplateFollowUpMedication', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowUpMedication"], '', '');
        $this->TemplateFollowUpMedication->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateFollowUpMedication->Param, "CustomMsg");
        $this->Fields['TemplateFollowUpMedication'] = &$this->TemplateFollowUpMedication;

        // TemplatePlan
        $this->TemplatePlan = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplatePlan', 'TemplatePlan', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplatePlan->IsCustom = true; // Custom field
        $this->TemplatePlan->Sortable = true; // Allow sort
        $this->TemplatePlan->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplatePlan->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplatePlan->Lookup = new Lookup('TemplatePlan', 'ivf_mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Plan"], '', '');
        $this->TemplatePlan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplatePlan->Param, "CustomMsg");
        $this->Fields['TemplatePlan'] = &$this->TemplatePlan;

        // QRCode
        $this->QRCode = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_QRCode', 'QRCode', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->QRCode->IsCustom = true; // Custom field
        $this->QRCode->Sortable = true; // Allow sort
        $this->QRCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->QRCode->Param, "CustomMsg");
        $this->Fields['QRCode'] = &$this->QRCode;

        // TidNo
        $this->TidNo = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->TidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TidNo->Param, "CustomMsg");
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_otherprocedure`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `TempleteFinalDiagnosis`, '' AS `TemplateTreatment`, '' AS `TemplateOperation`, '' AS `TemplateFollowUpAdvice`, '' AS `TemplateFollowUpMedication`, '' AS `TemplatePlan`, '' AS `QRCode`");
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
        $this->Name->DbValue = $row['Name'];
        $this->Age->DbValue = $row['Age'];
        $this->SEX->DbValue = $row['SEX'];
        $this->Address->DbValue = $row['Address'];
        $this->DateofAdmission->DbValue = $row['DateofAdmission'];
        $this->DateofProcedure->DbValue = $row['DateofProcedure'];
        $this->DateofDischarge->DbValue = $row['DateofDischarge'];
        $this->Consultant->DbValue = $row['Consultant'];
        $this->Surgeon->DbValue = $row['Surgeon'];
        $this->Anesthetist->DbValue = $row['Anesthetist'];
        $this->IdentificationMark->DbValue = $row['IdentificationMark'];
        $this->ProcedureDone->DbValue = $row['ProcedureDone'];
        $this->PROVISIONALDIAGNOSIS->DbValue = $row['PROVISIONALDIAGNOSIS'];
        $this->Chiefcomplaints->DbValue = $row['Chiefcomplaints'];
        $this->MaritallHistory->DbValue = $row['MaritallHistory'];
        $this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
        $this->SurgicalHistory->DbValue = $row['SurgicalHistory'];
        $this->PastHistory->DbValue = $row['PastHistory'];
        $this->FamilyHistory->DbValue = $row['FamilyHistory'];
        $this->Temp->DbValue = $row['Temp'];
        $this->Pulse->DbValue = $row['Pulse'];
        $this->BP->DbValue = $row['BP'];
        $this->CNS->DbValue = $row['CNS'];
        $this->_RS->DbValue = $row['RS'];
        $this->CVS->DbValue = $row['CVS'];
        $this->PA->DbValue = $row['PA'];
        $this->InvestigationReport->DbValue = $row['InvestigationReport'];
        $this->FinalDiagnosis->DbValue = $row['FinalDiagnosis'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->DetailOfOperation->DbValue = $row['DetailOfOperation'];
        $this->FollowUpAdvice->DbValue = $row['FollowUpAdvice'];
        $this->FollowUpMedication->DbValue = $row['FollowUpMedication'];
        $this->Plan->DbValue = $row['Plan'];
        $this->TempleteFinalDiagnosis->DbValue = $row['TempleteFinalDiagnosis'];
        $this->TemplateTreatment->DbValue = $row['TemplateTreatment'];
        $this->TemplateOperation->DbValue = $row['TemplateOperation'];
        $this->TemplateFollowUpAdvice->DbValue = $row['TemplateFollowUpAdvice'];
        $this->TemplateFollowUpMedication->DbValue = $row['TemplateFollowUpMedication'];
        $this->TemplatePlan->DbValue = $row['TemplatePlan'];
        $this->QRCode->DbValue = $row['QRCode'];
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
        return $_SESSION[$name] ?? GetUrl("IvfOtherprocedureList");
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
        if ($pageName == "IvfOtherprocedureView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfOtherprocedureEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfOtherprocedureAdd") {
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
                return "IvfOtherprocedureView";
            case Config("API_ADD_ACTION"):
                return "IvfOtherprocedureAdd";
            case Config("API_EDIT_ACTION"):
                return "IvfOtherprocedureEdit";
            case Config("API_DELETE_ACTION"):
                return "IvfOtherprocedureDelete";
            case Config("API_LIST_ACTION"):
                return "IvfOtherprocedureList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfOtherprocedureList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfOtherprocedureView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfOtherprocedureView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfOtherprocedureAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfOtherprocedureAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfOtherprocedureEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfOtherprocedureAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfOtherprocedureDelete", $this->getUrlParm());
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
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Address->setDbValue($row['Address']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateofProcedure->setDbValue($row['DateofProcedure']);
        $this->DateofDischarge->setDbValue($row['DateofDischarge']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->ProcedureDone->setDbValue($row['ProcedureDone']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MaritallHistory->setDbValue($row['MaritallHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->CNS->setDbValue($row['CNS']);
        $this->_RS->setDbValue($row['RS']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->InvestigationReport->setDbValue($row['InvestigationReport']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
        $this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
        $this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
        $this->Plan->setDbValue($row['Plan']);
        $this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
        $this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
        $this->TemplateOperation->setDbValue($row['TemplateOperation']);
        $this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
        $this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
        $this->TemplatePlan->setDbValue($row['TemplatePlan']);
        $this->QRCode->setDbValue($row['QRCode']);
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Address

        // DateofAdmission

        // DateofProcedure

        // DateofDischarge

        // Consultant

        // Surgeon

        // Anesthetist

        // IdentificationMark

        // ProcedureDone

        // PROVISIONALDIAGNOSIS

        // Chiefcomplaints

        // MaritallHistory

        // MenstrualHistory

        // SurgicalHistory

        // PastHistory

        // FamilyHistory

        // Temp

        // Pulse

        // BP

        // CNS

        // RS

        // CVS

        // PA

        // InvestigationReport

        // FinalDiagnosis

        // Treatment

        // DetailOfOperation

        // FollowUpAdvice

        // FollowUpMedication

        // Plan

        // TempleteFinalDiagnosis

        // TemplateTreatment

        // TemplateOperation

        // TemplateFollowUpAdvice

        // TemplateFollowUpMedication

        // TemplatePlan

        // QRCode

        // TidNo

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $curVal = trim(strval($this->Name->CurrentValue));
        if ($curVal != "") {
            $this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
            if ($this->Name->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Name->Lookup->renderViewRow($rswrk[0]);
                    $this->Name->ViewValue = $this->Name->displayValue($arwrk);
                } else {
                    $this->Name->ViewValue = $this->Name->CurrentValue;
                }
            }
        } else {
            $this->Name->ViewValue = null;
        }
        $this->Name->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // SEX
        $this->SEX->ViewValue = $this->SEX->CurrentValue;
        $this->SEX->ViewCustomAttributes = "";

        // Address
        $this->Address->ViewValue = $this->Address->CurrentValue;
        $this->Address->ViewCustomAttributes = "";

        // DateofAdmission
        $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
        $this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
        $this->DateofAdmission->ViewCustomAttributes = "";

        // DateofProcedure
        $this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
        $this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
        $this->DateofProcedure->ViewCustomAttributes = "";

        // DateofDischarge
        $this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
        $this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
        $this->DateofDischarge->ViewCustomAttributes = "";

        // Consultant
        $curVal = trim(strval($this->Consultant->CurrentValue));
        if ($curVal != "") {
            $this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
            if ($this->Consultant->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Consultant->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Consultant->Lookup->renderViewRow($rswrk[0]);
                    $this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
                } else {
                    $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
                }
            }
        } else {
            $this->Consultant->ViewValue = null;
        }
        $this->Consultant->ViewCustomAttributes = "";

        // Surgeon
        $curVal = trim(strval($this->Surgeon->CurrentValue));
        if ($curVal != "") {
            $this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
            if ($this->Surgeon->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Surgeon->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Surgeon->Lookup->renderViewRow($rswrk[0]);
                    $this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
                } else {
                    $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
                }
            }
        } else {
            $this->Surgeon->ViewValue = null;
        }
        $this->Surgeon->ViewCustomAttributes = "";

        // Anesthetist
        $curVal = trim(strval($this->Anesthetist->CurrentValue));
        if ($curVal != "") {
            $this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
            if ($this->Anesthetist->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Anesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Anesthetist->Lookup->renderViewRow($rswrk[0]);
                    $this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
                } else {
                    $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
                }
            }
        } else {
            $this->Anesthetist->ViewValue = null;
        }
        $this->Anesthetist->ViewCustomAttributes = "";

        // IdentificationMark
        $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
        $this->IdentificationMark->ViewCustomAttributes = "";

        // ProcedureDone
        $this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
        $this->ProcedureDone->ViewCustomAttributes = "";

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

        // Chiefcomplaints
        $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
        $this->Chiefcomplaints->ViewCustomAttributes = "";

        // MaritallHistory
        $this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
        $this->MaritallHistory->ViewCustomAttributes = "";

        // MenstrualHistory
        $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->ViewCustomAttributes = "";

        // SurgicalHistory
        $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->ViewCustomAttributes = "";

        // PastHistory
        $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
        $this->PastHistory->ViewCustomAttributes = "";

        // FamilyHistory
        $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->ViewCustomAttributes = "";

        // Temp
        $this->Temp->ViewValue = $this->Temp->CurrentValue;
        $this->Temp->ViewCustomAttributes = "";

        // Pulse
        $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
        $this->Pulse->ViewCustomAttributes = "";

        // BP
        $this->BP->ViewValue = $this->BP->CurrentValue;
        $this->BP->ViewCustomAttributes = "";

        // CNS
        $this->CNS->ViewValue = $this->CNS->CurrentValue;
        $this->CNS->ViewCustomAttributes = "";

        // RS
        $this->_RS->ViewValue = $this->_RS->CurrentValue;
        $this->_RS->ViewCustomAttributes = "";

        // CVS
        $this->CVS->ViewValue = $this->CVS->CurrentValue;
        $this->CVS->ViewCustomAttributes = "";

        // PA
        $this->PA->ViewValue = $this->PA->CurrentValue;
        $this->PA->ViewCustomAttributes = "";

        // InvestigationReport
        $this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
        $this->InvestigationReport->ViewCustomAttributes = "";

        // FinalDiagnosis
        $this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
        $this->FinalDiagnosis->ViewCustomAttributes = "";

        // Treatment
        $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
        $this->Treatment->ViewCustomAttributes = "";

        // DetailOfOperation
        $this->DetailOfOperation->ViewValue = $this->DetailOfOperation->CurrentValue;
        $this->DetailOfOperation->ViewCustomAttributes = "";

        // FollowUpAdvice
        $this->FollowUpAdvice->ViewValue = $this->FollowUpAdvice->CurrentValue;
        $this->FollowUpAdvice->ViewCustomAttributes = "";

        // FollowUpMedication
        $this->FollowUpMedication->ViewValue = $this->FollowUpMedication->CurrentValue;
        $this->FollowUpMedication->ViewCustomAttributes = "";

        // Plan
        $this->Plan->ViewValue = $this->Plan->CurrentValue;
        $this->Plan->ViewCustomAttributes = "";

        // TempleteFinalDiagnosis
        $curVal = trim(strval($this->TempleteFinalDiagnosis->CurrentValue));
        if ($curVal != "") {
            $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
            if ($this->TempleteFinalDiagnosis->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='TemplateDiagnosis'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TempleteFinalDiagnosis->Lookup->renderViewRow($rswrk[0]);
                    $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->displayValue($arwrk);
                } else {
                    $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->CurrentValue;
                }
            }
        } else {
            $this->TempleteFinalDiagnosis->ViewValue = null;
        }
        $this->TempleteFinalDiagnosis->ViewCustomAttributes = "";

        // TemplateTreatment
        $curVal = trim(strval($this->TemplateTreatment->CurrentValue));
        if ($curVal != "") {
            $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
            if ($this->TemplateTreatment->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Treatment'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateTreatment->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateTreatment->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->displayValue($arwrk);
                } else {
                    $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->CurrentValue;
                }
            }
        } else {
            $this->TemplateTreatment->ViewValue = null;
        }
        $this->TemplateTreatment->ViewCustomAttributes = "";

        // TemplateOperation
        $curVal = trim(strval($this->TemplateOperation->CurrentValue));
        if ($curVal != "") {
            $this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
            if ($this->TemplateOperation->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Operation'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateOperation->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateOperation->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateOperation->ViewValue = $this->TemplateOperation->displayValue($arwrk);
                } else {
                    $this->TemplateOperation->ViewValue = $this->TemplateOperation->CurrentValue;
                }
            }
        } else {
            $this->TemplateOperation->ViewValue = null;
        }
        $this->TemplateOperation->ViewCustomAttributes = "";

        // TemplateFollowUpAdvice
        $curVal = trim(strval($this->TemplateFollowUpAdvice->CurrentValue));
        if ($curVal != "") {
            $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
            if ($this->TemplateFollowUpAdvice->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='FollowUpAdvice '";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateFollowUpAdvice->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->displayValue($arwrk);
                } else {
                    $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->CurrentValue;
                }
            }
        } else {
            $this->TemplateFollowUpAdvice->ViewValue = null;
        }
        $this->TemplateFollowUpAdvice->ViewCustomAttributes = "";

        // TemplateFollowUpMedication
        $curVal = trim(strval($this->TemplateFollowUpMedication->CurrentValue));
        if ($curVal != "") {
            $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
            if ($this->TemplateFollowUpMedication->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='FollowUpMedication'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateFollowUpMedication->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->displayValue($arwrk);
                } else {
                    $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->CurrentValue;
                }
            }
        } else {
            $this->TemplateFollowUpMedication->ViewValue = null;
        }
        $this->TemplateFollowUpMedication->ViewCustomAttributes = "";

        // TemplatePlan
        $curVal = trim(strval($this->TemplatePlan->CurrentValue));
        if ($curVal != "") {
            $this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
            if ($this->TemplatePlan->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='TemplatePlan'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplatePlan->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplatePlan->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplatePlan->ViewValue = $this->TemplatePlan->displayValue($arwrk);
                } else {
                    $this->TemplatePlan->ViewValue = $this->TemplatePlan->CurrentValue;
                }
            }
        } else {
            $this->TemplatePlan->ViewValue = null;
        }
        $this->TemplatePlan->ViewCustomAttributes = "";

        // QRCode
        $this->QRCode->ViewValue = $this->QRCode->CurrentValue;
        $this->QRCode->ViewCustomAttributes = "";

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
        $this->RIDNO->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // SEX
        $this->SEX->LinkCustomAttributes = "";
        $this->SEX->HrefValue = "";
        $this->SEX->TooltipValue = "";

        // Address
        $this->Address->LinkCustomAttributes = "";
        $this->Address->HrefValue = "";
        $this->Address->TooltipValue = "";

        // DateofAdmission
        $this->DateofAdmission->LinkCustomAttributes = "";
        $this->DateofAdmission->HrefValue = "";
        $this->DateofAdmission->TooltipValue = "";

        // DateofProcedure
        $this->DateofProcedure->LinkCustomAttributes = "";
        $this->DateofProcedure->HrefValue = "";
        $this->DateofProcedure->TooltipValue = "";

        // DateofDischarge
        $this->DateofDischarge->LinkCustomAttributes = "";
        $this->DateofDischarge->HrefValue = "";
        $this->DateofDischarge->TooltipValue = "";

        // Consultant
        $this->Consultant->LinkCustomAttributes = "";
        $this->Consultant->HrefValue = "";
        $this->Consultant->TooltipValue = "";

        // Surgeon
        $this->Surgeon->LinkCustomAttributes = "";
        $this->Surgeon->HrefValue = "";
        $this->Surgeon->TooltipValue = "";

        // Anesthetist
        $this->Anesthetist->LinkCustomAttributes = "";
        $this->Anesthetist->HrefValue = "";
        $this->Anesthetist->TooltipValue = "";

        // IdentificationMark
        $this->IdentificationMark->LinkCustomAttributes = "";
        $this->IdentificationMark->HrefValue = "";
        $this->IdentificationMark->TooltipValue = "";

        // ProcedureDone
        $this->ProcedureDone->LinkCustomAttributes = "";
        $this->ProcedureDone->HrefValue = "";
        $this->ProcedureDone->TooltipValue = "";

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
        $this->PROVISIONALDIAGNOSIS->HrefValue = "";
        $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

        // Chiefcomplaints
        $this->Chiefcomplaints->LinkCustomAttributes = "";
        $this->Chiefcomplaints->HrefValue = "";
        $this->Chiefcomplaints->TooltipValue = "";

        // MaritallHistory
        $this->MaritallHistory->LinkCustomAttributes = "";
        $this->MaritallHistory->HrefValue = "";
        $this->MaritallHistory->TooltipValue = "";

        // MenstrualHistory
        $this->MenstrualHistory->LinkCustomAttributes = "";
        $this->MenstrualHistory->HrefValue = "";
        $this->MenstrualHistory->TooltipValue = "";

        // SurgicalHistory
        $this->SurgicalHistory->LinkCustomAttributes = "";
        $this->SurgicalHistory->HrefValue = "";
        $this->SurgicalHistory->TooltipValue = "";

        // PastHistory
        $this->PastHistory->LinkCustomAttributes = "";
        $this->PastHistory->HrefValue = "";
        $this->PastHistory->TooltipValue = "";

        // FamilyHistory
        $this->FamilyHistory->LinkCustomAttributes = "";
        $this->FamilyHistory->HrefValue = "";
        $this->FamilyHistory->TooltipValue = "";

        // Temp
        $this->Temp->LinkCustomAttributes = "";
        $this->Temp->HrefValue = "";
        $this->Temp->TooltipValue = "";

        // Pulse
        $this->Pulse->LinkCustomAttributes = "";
        $this->Pulse->HrefValue = "";
        $this->Pulse->TooltipValue = "";

        // BP
        $this->BP->LinkCustomAttributes = "";
        $this->BP->HrefValue = "";
        $this->BP->TooltipValue = "";

        // CNS
        $this->CNS->LinkCustomAttributes = "";
        $this->CNS->HrefValue = "";
        $this->CNS->TooltipValue = "";

        // RS
        $this->_RS->LinkCustomAttributes = "";
        $this->_RS->HrefValue = "";
        $this->_RS->TooltipValue = "";

        // CVS
        $this->CVS->LinkCustomAttributes = "";
        $this->CVS->HrefValue = "";
        $this->CVS->TooltipValue = "";

        // PA
        $this->PA->LinkCustomAttributes = "";
        $this->PA->HrefValue = "";
        $this->PA->TooltipValue = "";

        // InvestigationReport
        $this->InvestigationReport->LinkCustomAttributes = "";
        $this->InvestigationReport->HrefValue = "";
        $this->InvestigationReport->TooltipValue = "";

        // FinalDiagnosis
        $this->FinalDiagnosis->LinkCustomAttributes = "";
        $this->FinalDiagnosis->HrefValue = "";
        $this->FinalDiagnosis->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // DetailOfOperation
        $this->DetailOfOperation->LinkCustomAttributes = "";
        $this->DetailOfOperation->HrefValue = "";
        $this->DetailOfOperation->TooltipValue = "";

        // FollowUpAdvice
        $this->FollowUpAdvice->LinkCustomAttributes = "";
        $this->FollowUpAdvice->HrefValue = "";
        $this->FollowUpAdvice->TooltipValue = "";

        // FollowUpMedication
        $this->FollowUpMedication->LinkCustomAttributes = "";
        $this->FollowUpMedication->HrefValue = "";
        $this->FollowUpMedication->TooltipValue = "";

        // Plan
        $this->Plan->LinkCustomAttributes = "";
        $this->Plan->HrefValue = "";
        $this->Plan->TooltipValue = "";

        // TempleteFinalDiagnosis
        $this->TempleteFinalDiagnosis->LinkCustomAttributes = "";
        $this->TempleteFinalDiagnosis->HrefValue = "";
        $this->TempleteFinalDiagnosis->TooltipValue = "";

        // TemplateTreatment
        $this->TemplateTreatment->LinkCustomAttributes = "";
        $this->TemplateTreatment->HrefValue = "";
        $this->TemplateTreatment->TooltipValue = "";

        // TemplateOperation
        $this->TemplateOperation->LinkCustomAttributes = "";
        $this->TemplateOperation->HrefValue = "";
        $this->TemplateOperation->TooltipValue = "";

        // TemplateFollowUpAdvice
        $this->TemplateFollowUpAdvice->LinkCustomAttributes = "";
        $this->TemplateFollowUpAdvice->HrefValue = "";
        $this->TemplateFollowUpAdvice->TooltipValue = "";

        // TemplateFollowUpMedication
        $this->TemplateFollowUpMedication->LinkCustomAttributes = "";
        $this->TemplateFollowUpMedication->HrefValue = "";
        $this->TemplateFollowUpMedication->TooltipValue = "";

        // TemplatePlan
        $this->TemplatePlan->LinkCustomAttributes = "";
        $this->TemplatePlan->HrefValue = "";
        $this->TemplatePlan->TooltipValue = "";

        // QRCode
        $this->QRCode->LinkCustomAttributes = "";
        $this->QRCode->HrefValue = "";
        $this->QRCode->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'QRCODE', 80);
        $this->QRCode->TooltipValue = "";

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

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // SEX
        $this->SEX->EditAttrs["class"] = "form-control";
        $this->SEX->EditCustomAttributes = "";
        if (!$this->SEX->Raw) {
            $this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
        }
        $this->SEX->EditValue = $this->SEX->CurrentValue;
        $this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

        // Address
        $this->Address->EditAttrs["class"] = "form-control";
        $this->Address->EditCustomAttributes = "";
        if (!$this->Address->Raw) {
            $this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
        }
        $this->Address->EditValue = $this->Address->CurrentValue;
        $this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

        // DateofAdmission
        $this->DateofAdmission->EditAttrs["class"] = "form-control";
        $this->DateofAdmission->EditCustomAttributes = "";
        $this->DateofAdmission->EditValue = FormatDateTime($this->DateofAdmission->CurrentValue, 11);
        $this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

        // DateofProcedure
        $this->DateofProcedure->EditAttrs["class"] = "form-control";
        $this->DateofProcedure->EditCustomAttributes = "";
        $this->DateofProcedure->EditValue = FormatDateTime($this->DateofProcedure->CurrentValue, 11);
        $this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

        // DateofDischarge
        $this->DateofDischarge->EditAttrs["class"] = "form-control";
        $this->DateofDischarge->EditCustomAttributes = "";
        $this->DateofDischarge->EditValue = FormatDateTime($this->DateofDischarge->CurrentValue, 11);
        $this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

        // Consultant
        $this->Consultant->EditAttrs["class"] = "form-control";
        $this->Consultant->EditCustomAttributes = "";
        $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

        // Surgeon
        $this->Surgeon->EditAttrs["class"] = "form-control";
        $this->Surgeon->EditCustomAttributes = "";
        $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

        // Anesthetist
        $this->Anesthetist->EditAttrs["class"] = "form-control";
        $this->Anesthetist->EditCustomAttributes = "";
        $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

        // IdentificationMark
        $this->IdentificationMark->EditAttrs["class"] = "form-control";
        $this->IdentificationMark->EditCustomAttributes = "";
        if (!$this->IdentificationMark->Raw) {
            $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
        }
        $this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
        $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

        // ProcedureDone
        $this->ProcedureDone->EditAttrs["class"] = "form-control";
        $this->ProcedureDone->EditCustomAttributes = "";
        if (!$this->ProcedureDone->Raw) {
            $this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
        }
        $this->ProcedureDone->EditValue = $this->ProcedureDone->CurrentValue;
        $this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
        $this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
        if (!$this->PROVISIONALDIAGNOSIS->Raw) {
            $this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
        }
        $this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

        // Chiefcomplaints
        $this->Chiefcomplaints->EditAttrs["class"] = "form-control";
        $this->Chiefcomplaints->EditCustomAttributes = "";
        if (!$this->Chiefcomplaints->Raw) {
            $this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
        }
        $this->Chiefcomplaints->EditValue = $this->Chiefcomplaints->CurrentValue;
        $this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

        // MaritallHistory
        $this->MaritallHistory->EditAttrs["class"] = "form-control";
        $this->MaritallHistory->EditCustomAttributes = "";
        if (!$this->MaritallHistory->Raw) {
            $this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
        }
        $this->MaritallHistory->EditValue = $this->MaritallHistory->CurrentValue;
        $this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

        // MenstrualHistory
        $this->MenstrualHistory->EditAttrs["class"] = "form-control";
        $this->MenstrualHistory->EditCustomAttributes = "";
        if (!$this->MenstrualHistory->Raw) {
            $this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
        }
        $this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
        $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

        // SurgicalHistory
        $this->SurgicalHistory->EditAttrs["class"] = "form-control";
        $this->SurgicalHistory->EditCustomAttributes = "";
        if (!$this->SurgicalHistory->Raw) {
            $this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
        }
        $this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
        $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

        // PastHistory
        $this->PastHistory->EditAttrs["class"] = "form-control";
        $this->PastHistory->EditCustomAttributes = "";
        if (!$this->PastHistory->Raw) {
            $this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
        }
        $this->PastHistory->EditValue = $this->PastHistory->CurrentValue;
        $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

        // FamilyHistory
        $this->FamilyHistory->EditAttrs["class"] = "form-control";
        $this->FamilyHistory->EditCustomAttributes = "";
        if (!$this->FamilyHistory->Raw) {
            $this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
        }
        $this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
        $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

        // Temp
        $this->Temp->EditAttrs["class"] = "form-control";
        $this->Temp->EditCustomAttributes = "";
        if (!$this->Temp->Raw) {
            $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
        }
        $this->Temp->EditValue = $this->Temp->CurrentValue;
        $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

        // Pulse
        $this->Pulse->EditAttrs["class"] = "form-control";
        $this->Pulse->EditCustomAttributes = "";
        if (!$this->Pulse->Raw) {
            $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
        }
        $this->Pulse->EditValue = $this->Pulse->CurrentValue;
        $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

        // BP
        $this->BP->EditAttrs["class"] = "form-control";
        $this->BP->EditCustomAttributes = "";
        if (!$this->BP->Raw) {
            $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
        }
        $this->BP->EditValue = $this->BP->CurrentValue;
        $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

        // CNS
        $this->CNS->EditAttrs["class"] = "form-control";
        $this->CNS->EditCustomAttributes = "";
        if (!$this->CNS->Raw) {
            $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
        }
        $this->CNS->EditValue = $this->CNS->CurrentValue;
        $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

        // RS
        $this->_RS->EditAttrs["class"] = "form-control";
        $this->_RS->EditCustomAttributes = "";
        if (!$this->_RS->Raw) {
            $this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
        }
        $this->_RS->EditValue = $this->_RS->CurrentValue;
        $this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

        // CVS
        $this->CVS->EditAttrs["class"] = "form-control";
        $this->CVS->EditCustomAttributes = "";
        if (!$this->CVS->Raw) {
            $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
        }
        $this->CVS->EditValue = $this->CVS->CurrentValue;
        $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

        // PA
        $this->PA->EditAttrs["class"] = "form-control";
        $this->PA->EditCustomAttributes = "";
        if (!$this->PA->Raw) {
            $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
        }
        $this->PA->EditValue = $this->PA->CurrentValue;
        $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

        // InvestigationReport
        $this->InvestigationReport->EditAttrs["class"] = "form-control";
        $this->InvestigationReport->EditCustomAttributes = "";
        $this->InvestigationReport->EditValue = $this->InvestigationReport->CurrentValue;
        $this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

        // FinalDiagnosis
        $this->FinalDiagnosis->EditAttrs["class"] = "form-control";
        $this->FinalDiagnosis->EditCustomAttributes = "";
        $this->FinalDiagnosis->EditValue = $this->FinalDiagnosis->CurrentValue;
        $this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        $this->Treatment->EditValue = $this->Treatment->CurrentValue;
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // DetailOfOperation
        $this->DetailOfOperation->EditAttrs["class"] = "form-control";
        $this->DetailOfOperation->EditCustomAttributes = "";
        $this->DetailOfOperation->EditValue = $this->DetailOfOperation->CurrentValue;
        $this->DetailOfOperation->PlaceHolder = RemoveHtml($this->DetailOfOperation->caption());

        // FollowUpAdvice
        $this->FollowUpAdvice->EditAttrs["class"] = "form-control";
        $this->FollowUpAdvice->EditCustomAttributes = "";
        $this->FollowUpAdvice->EditValue = $this->FollowUpAdvice->CurrentValue;
        $this->FollowUpAdvice->PlaceHolder = RemoveHtml($this->FollowUpAdvice->caption());

        // FollowUpMedication
        $this->FollowUpMedication->EditAttrs["class"] = "form-control";
        $this->FollowUpMedication->EditCustomAttributes = "";
        $this->FollowUpMedication->EditValue = $this->FollowUpMedication->CurrentValue;
        $this->FollowUpMedication->PlaceHolder = RemoveHtml($this->FollowUpMedication->caption());

        // Plan
        $this->Plan->EditAttrs["class"] = "form-control";
        $this->Plan->EditCustomAttributes = "";
        $this->Plan->EditValue = $this->Plan->CurrentValue;
        $this->Plan->PlaceHolder = RemoveHtml($this->Plan->caption());

        // TempleteFinalDiagnosis
        $this->TempleteFinalDiagnosis->EditAttrs["class"] = "form-control";
        $this->TempleteFinalDiagnosis->EditCustomAttributes = "";
        $this->TempleteFinalDiagnosis->PlaceHolder = RemoveHtml($this->TempleteFinalDiagnosis->caption());

        // TemplateTreatment
        $this->TemplateTreatment->EditAttrs["class"] = "form-control";
        $this->TemplateTreatment->EditCustomAttributes = "";
        $this->TemplateTreatment->PlaceHolder = RemoveHtml($this->TemplateTreatment->caption());

        // TemplateOperation
        $this->TemplateOperation->EditAttrs["class"] = "form-control";
        $this->TemplateOperation->EditCustomAttributes = "";
        $this->TemplateOperation->PlaceHolder = RemoveHtml($this->TemplateOperation->caption());

        // TemplateFollowUpAdvice
        $this->TemplateFollowUpAdvice->EditAttrs["class"] = "form-control";
        $this->TemplateFollowUpAdvice->EditCustomAttributes = "";
        $this->TemplateFollowUpAdvice->PlaceHolder = RemoveHtml($this->TemplateFollowUpAdvice->caption());

        // TemplateFollowUpMedication
        $this->TemplateFollowUpMedication->EditAttrs["class"] = "form-control";
        $this->TemplateFollowUpMedication->EditCustomAttributes = "";
        $this->TemplateFollowUpMedication->PlaceHolder = RemoveHtml($this->TemplateFollowUpMedication->caption());

        // TemplatePlan
        $this->TemplatePlan->EditAttrs["class"] = "form-control";
        $this->TemplatePlan->EditCustomAttributes = "";
        $this->TemplatePlan->PlaceHolder = RemoveHtml($this->TemplatePlan->caption());

        // QRCode
        $this->QRCode->EditAttrs["class"] = "form-control";
        $this->QRCode->EditCustomAttributes = "";
        $this->QRCode->EditValue = $this->QRCode->CurrentValue;
        $this->QRCode->PlaceHolder = RemoveHtml($this->QRCode->caption());

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
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->SEX);
                    $doc->exportCaption($this->Address);
                    $doc->exportCaption($this->DateofAdmission);
                    $doc->exportCaption($this->DateofProcedure);
                    $doc->exportCaption($this->DateofDischarge);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->Anesthetist);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->ProcedureDone);
                    $doc->exportCaption($this->PROVISIONALDIAGNOSIS);
                    $doc->exportCaption($this->Chiefcomplaints);
                    $doc->exportCaption($this->MaritallHistory);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->SurgicalHistory);
                    $doc->exportCaption($this->PastHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Temp);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->CNS);
                    $doc->exportCaption($this->_RS);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->InvestigationReport);
                    $doc->exportCaption($this->FinalDiagnosis);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->DetailOfOperation);
                    $doc->exportCaption($this->FollowUpAdvice);
                    $doc->exportCaption($this->FollowUpMedication);
                    $doc->exportCaption($this->Plan);
                    $doc->exportCaption($this->TempleteFinalDiagnosis);
                    $doc->exportCaption($this->TemplateTreatment);
                    $doc->exportCaption($this->TemplateOperation);
                    $doc->exportCaption($this->TemplateFollowUpAdvice);
                    $doc->exportCaption($this->TemplateFollowUpMedication);
                    $doc->exportCaption($this->TemplatePlan);
                    $doc->exportCaption($this->QRCode);
                    $doc->exportCaption($this->TidNo);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->DateofAdmission);
                    $doc->exportCaption($this->DateofProcedure);
                    $doc->exportCaption($this->DateofDischarge);
                    $doc->exportCaption($this->Consultant);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->Anesthetist);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->ProcedureDone);
                    $doc->exportCaption($this->PROVISIONALDIAGNOSIS);
                    $doc->exportCaption($this->Chiefcomplaints);
                    $doc->exportCaption($this->MaritallHistory);
                    $doc->exportCaption($this->MenstrualHistory);
                    $doc->exportCaption($this->SurgicalHistory);
                    $doc->exportCaption($this->PastHistory);
                    $doc->exportCaption($this->FamilyHistory);
                    $doc->exportCaption($this->Temp);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->CNS);
                    $doc->exportCaption($this->_RS);
                    $doc->exportCaption($this->CVS);
                    $doc->exportCaption($this->PA);
                    $doc->exportCaption($this->InvestigationReport);
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
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->SEX);
                        $doc->exportField($this->Address);
                        $doc->exportField($this->DateofAdmission);
                        $doc->exportField($this->DateofProcedure);
                        $doc->exportField($this->DateofDischarge);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->Anesthetist);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->ProcedureDone);
                        $doc->exportField($this->PROVISIONALDIAGNOSIS);
                        $doc->exportField($this->Chiefcomplaints);
                        $doc->exportField($this->MaritallHistory);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->SurgicalHistory);
                        $doc->exportField($this->PastHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Temp);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->CNS);
                        $doc->exportField($this->_RS);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->InvestigationReport);
                        $doc->exportField($this->FinalDiagnosis);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->DetailOfOperation);
                        $doc->exportField($this->FollowUpAdvice);
                        $doc->exportField($this->FollowUpMedication);
                        $doc->exportField($this->Plan);
                        $doc->exportField($this->TempleteFinalDiagnosis);
                        $doc->exportField($this->TemplateTreatment);
                        $doc->exportField($this->TemplateOperation);
                        $doc->exportField($this->TemplateFollowUpAdvice);
                        $doc->exportField($this->TemplateFollowUpMedication);
                        $doc->exportField($this->TemplatePlan);
                        $doc->exportField($this->QRCode);
                        $doc->exportField($this->TidNo);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->DateofAdmission);
                        $doc->exportField($this->DateofProcedure);
                        $doc->exportField($this->DateofDischarge);
                        $doc->exportField($this->Consultant);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->Anesthetist);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->ProcedureDone);
                        $doc->exportField($this->PROVISIONALDIAGNOSIS);
                        $doc->exportField($this->Chiefcomplaints);
                        $doc->exportField($this->MaritallHistory);
                        $doc->exportField($this->MenstrualHistory);
                        $doc->exportField($this->SurgicalHistory);
                        $doc->exportField($this->PastHistory);
                        $doc->exportField($this->FamilyHistory);
                        $doc->exportField($this->Temp);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->CNS);
                        $doc->exportField($this->_RS);
                        $doc->exportField($this->CVS);
                        $doc->exportField($this->PA);
                        $doc->exportField($this->InvestigationReport);
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
