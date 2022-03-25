<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_otherprocedure
 */
class ivf_otherprocedure extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_otherprocedure';
		$this->TableName = 'ivf_otherprocedure';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_otherprocedure`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->Name->Lookup = new Lookup('Name', 'patient', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = FALSE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// SEX
		$this->SEX = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, 45, -1, FALSE, '`SEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEX->Sortable = FALSE; // Allow sort
		$this->fields['SEX'] = &$this->SEX;

		// Address
		$this->Address = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Address', 'Address', '`Address`', '`Address`', 200, 45, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = FALSE; // Allow sort
		$this->fields['Address'] = &$this->Address;

		// DateofAdmission
		$this->DateofAdmission = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofAdmission', 'DateofAdmission', '`DateofAdmission`', CastDateFieldForLike("`DateofAdmission`", 11, "DB"), 135, 19, 11, FALSE, '`DateofAdmission`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateofAdmission->Sortable = TRUE; // Allow sort
		$this->DateofAdmission->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DateofAdmission'] = &$this->DateofAdmission;

		// DateofProcedure
		$this->DateofProcedure = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofProcedure', 'DateofProcedure', '`DateofProcedure`', CastDateFieldForLike("`DateofProcedure`", 11, "DB"), 135, 19, 11, FALSE, '`DateofProcedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateofProcedure->Sortable = TRUE; // Allow sort
		$this->fields['DateofProcedure'] = &$this->DateofProcedure;

		// DateofDischarge
		$this->DateofDischarge = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DateofDischarge', 'DateofDischarge', '`DateofDischarge`', CastDateFieldForLike("`DateofDischarge`", 11, "DB"), 135, 19, 11, FALSE, '`DateofDischarge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateofDischarge->Sortable = TRUE; // Allow sort
		$this->fields['DateofDischarge'] = &$this->DateofDischarge;

		// Consultant
		$this->Consultant = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, FALSE, '`Consultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Consultant->Sortable = TRUE; // Allow sort
		$this->Consultant->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Consultant->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Consultant->Lookup = new Lookup('Consultant', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Consultant'] = &$this->Consultant;

		// Surgeon
		$this->Surgeon = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, 45, -1, FALSE, '`Surgeon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Surgeon->Sortable = TRUE; // Allow sort
		$this->Surgeon->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Surgeon->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Surgeon->Lookup = new Lookup('Surgeon', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Surgeon'] = &$this->Surgeon;

		// Anesthetist
		$this->Anesthetist = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Anesthetist', 'Anesthetist', '`Anesthetist`', '`Anesthetist`', 200, 45, -1, FALSE, '`Anesthetist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Anesthetist->Sortable = TRUE; // Allow sort
		$this->Anesthetist->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Anesthetist->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Anesthetist->Lookup = new Lookup('Anesthetist', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Anesthetist'] = &$this->Anesthetist;

		// IdentificationMark
		$this->IdentificationMark = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// ProcedureDone
		$this->ProcedureDone = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_ProcedureDone', 'ProcedureDone', '`ProcedureDone`', '`ProcedureDone`', 200, 45, -1, FALSE, '`ProcedureDone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcedureDone->Sortable = TRUE; // Allow sort
		$this->fields['ProcedureDone'] = &$this->ProcedureDone;

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, 45, -1, FALSE, '`PROVISIONALDIAGNOSIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PROVISIONALDIAGNOSIS->Sortable = TRUE; // Allow sort
		$this->fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

		// Chiefcomplaints
		$this->Chiefcomplaints = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 200, 45, -1, FALSE, '`Chiefcomplaints`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Chiefcomplaints->Sortable = TRUE; // Allow sort
		$this->fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

		// MaritallHistory
		$this->MaritallHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_MaritallHistory', 'MaritallHistory', '`MaritallHistory`', '`MaritallHistory`', 200, 45, -1, FALSE, '`MaritallHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaritallHistory->Sortable = TRUE; // Allow sort
		$this->fields['MaritallHistory'] = &$this->MaritallHistory;

		// MenstrualHistory
		$this->MenstrualHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 200, 45, -1, FALSE, '`MenstrualHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MenstrualHistory->Sortable = TRUE; // Allow sort
		$this->fields['MenstrualHistory'] = &$this->MenstrualHistory;

		// SurgicalHistory
		$this->SurgicalHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, 45, -1, FALSE, '`SurgicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SurgicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgicalHistory'] = &$this->SurgicalHistory;

		// PastHistory
		$this->PastHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PastHistory', 'PastHistory', '`PastHistory`', '`PastHistory`', 200, 45, -1, FALSE, '`PastHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PastHistory->Sortable = TRUE; // Allow sort
		$this->fields['PastHistory'] = &$this->PastHistory;

		// FamilyHistory
		$this->FamilyHistory = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, FALSE, '`FamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FamilyHistory->Sortable = TRUE; // Allow sort
		$this->fields['FamilyHistory'] = &$this->FamilyHistory;

		// Temp
		$this->Temp = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Temp', 'Temp', '`Temp`', '`Temp`', 200, 45, -1, FALSE, '`Temp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Temp->Sortable = TRUE; // Allow sort
		$this->fields['Temp'] = &$this->Temp;

		// Pulse
		$this->Pulse = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, FALSE, '`Pulse`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pulse->Sortable = TRUE; // Allow sort
		$this->fields['Pulse'] = &$this->Pulse;

		// BP
		$this->BP = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, FALSE, '`BP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BP->Sortable = TRUE; // Allow sort
		$this->fields['BP'] = &$this->BP;

		// CNS
		$this->CNS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_CNS', 'CNS', '`CNS`', '`CNS`', 200, 45, -1, FALSE, '`CNS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CNS->Sortable = TRUE; // Allow sort
		$this->fields['CNS'] = &$this->CNS;

		// RS
		$this->_RS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x__RS', 'RS', '`RS`', '`RS`', 200, 45, -1, FALSE, '`RS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_RS->Sortable = TRUE; // Allow sort
		$this->fields['RS'] = &$this->_RS;

		// CVS
		$this->CVS = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, 45, -1, FALSE, '`CVS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CVS->Sortable = TRUE; // Allow sort
		$this->fields['CVS'] = &$this->CVS;

		// PA
		$this->PA = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_PA', 'PA', '`PA`', '`PA`', 200, 45, -1, FALSE, '`PA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PA->Sortable = TRUE; // Allow sort
		$this->fields['PA'] = &$this->PA;

		// InvestigationReport
		$this->InvestigationReport = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_InvestigationReport', 'InvestigationReport', '`InvestigationReport`', '`InvestigationReport`', 201, 65535, -1, FALSE, '`InvestigationReport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->InvestigationReport->Sortable = TRUE; // Allow sort
		$this->fields['InvestigationReport'] = &$this->InvestigationReport;

		// FinalDiagnosis
		$this->FinalDiagnosis = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FinalDiagnosis', 'FinalDiagnosis', '`FinalDiagnosis`', '`FinalDiagnosis`', 201, 65535, -1, FALSE, '`FinalDiagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FinalDiagnosis->Sortable = TRUE; // Allow sort
		$this->fields['FinalDiagnosis'] = &$this->FinalDiagnosis;

		// Treatment
		$this->Treatment = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 201, 65535, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->fields['Treatment'] = &$this->Treatment;

		// DetailOfOperation
		$this->DetailOfOperation = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_DetailOfOperation', 'DetailOfOperation', '`DetailOfOperation`', '`DetailOfOperation`', 201, 65535, -1, FALSE, '`DetailOfOperation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DetailOfOperation->Sortable = TRUE; // Allow sort
		$this->fields['DetailOfOperation'] = &$this->DetailOfOperation;

		// FollowUpAdvice
		$this->FollowUpAdvice = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FollowUpAdvice', 'FollowUpAdvice', '`FollowUpAdvice`', '`FollowUpAdvice`', 201, 65535, -1, FALSE, '`FollowUpAdvice`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowUpAdvice->Sortable = TRUE; // Allow sort
		$this->fields['FollowUpAdvice'] = &$this->FollowUpAdvice;

		// FollowUpMedication
		$this->FollowUpMedication = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_FollowUpMedication', 'FollowUpMedication', '`FollowUpMedication`', '`FollowUpMedication`', 201, 65535, -1, FALSE, '`FollowUpMedication`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowUpMedication->Sortable = TRUE; // Allow sort
		$this->fields['FollowUpMedication'] = &$this->FollowUpMedication;

		// Plan
		$this->Plan = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_Plan', 'Plan', '`Plan`', '`Plan`', 201, 65535, -1, FALSE, '`Plan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Plan->Sortable = TRUE; // Allow sort
		$this->fields['Plan'] = &$this->Plan;

		// TempleteFinalDiagnosis
		$this->TempleteFinalDiagnosis = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TempleteFinalDiagnosis', 'TempleteFinalDiagnosis', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TempleteFinalDiagnosis->IsCustom = TRUE; // Custom field
		$this->TempleteFinalDiagnosis->Sortable = TRUE; // Allow sort
		$this->TempleteFinalDiagnosis->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TempleteFinalDiagnosis->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TempleteFinalDiagnosis->Lookup = new Lookup('TempleteFinalDiagnosis', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FinalDiagnosis"], '', '');
		$this->fields['TempleteFinalDiagnosis'] = &$this->TempleteFinalDiagnosis;

		// TemplateTreatment
		$this->TemplateTreatment = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateTreatment', 'TemplateTreatment', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateTreatment->IsCustom = TRUE; // Custom field
		$this->TemplateTreatment->Sortable = TRUE; // Allow sort
		$this->TemplateTreatment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateTreatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateTreatment->Lookup = new Lookup('TemplateTreatment', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Treatment"], '', '');
		$this->fields['TemplateTreatment'] = &$this->TemplateTreatment;

		// TemplateOperation
		$this->TemplateOperation = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateOperation', 'TemplateOperation', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateOperation->IsCustom = TRUE; // Custom field
		$this->TemplateOperation->Sortable = TRUE; // Allow sort
		$this->TemplateOperation->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateOperation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateOperation->Lookup = new Lookup('TemplateOperation', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_DetailOfOperation"], '', '');
		$this->fields['TemplateOperation'] = &$this->TemplateOperation;

		// TemplateFollowUpAdvice
		$this->TemplateFollowUpAdvice = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateFollowUpAdvice', 'TemplateFollowUpAdvice', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateFollowUpAdvice->IsCustom = TRUE; // Custom field
		$this->TemplateFollowUpAdvice->Sortable = TRUE; // Allow sort
		$this->TemplateFollowUpAdvice->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateFollowUpAdvice->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateFollowUpAdvice->Lookup = new Lookup('TemplateFollowUpAdvice', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowUpAdvice"], '', '');
		$this->fields['TemplateFollowUpAdvice'] = &$this->TemplateFollowUpAdvice;

		// TemplateFollowUpMedication
		$this->TemplateFollowUpMedication = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplateFollowUpMedication', 'TemplateFollowUpMedication', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateFollowUpMedication->IsCustom = TRUE; // Custom field
		$this->TemplateFollowUpMedication->Sortable = TRUE; // Allow sort
		$this->TemplateFollowUpMedication->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateFollowUpMedication->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateFollowUpMedication->Lookup = new Lookup('TemplateFollowUpMedication', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowUpMedication"], '', '');
		$this->fields['TemplateFollowUpMedication'] = &$this->TemplateFollowUpMedication;

		// TemplatePlan
		$this->TemplatePlan = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TemplatePlan', 'TemplatePlan', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplatePlan->IsCustom = TRUE; // Custom field
		$this->TemplatePlan->Sortable = TRUE; // Allow sort
		$this->TemplatePlan->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplatePlan->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplatePlan->Lookup = new Lookup('TemplatePlan', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Plan"], '', '');
		$this->fields['TemplatePlan'] = &$this->TemplatePlan;

		// QRCode
		$this->QRCode = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_QRCode', 'QRCode', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->QRCode->IsCustom = TRUE; // Custom field
		$this->QRCode->Sortable = TRUE; // Allow sort
		$this->fields['QRCode'] = &$this->QRCode;

		// TidNo
		$this->TidNo = new DbField('ivf_otherprocedure', 'ivf_otherprocedure', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
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
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `TempleteFinalDiagnosis`, '' AS `TemplateTreatment`, '' AS `TemplateOperation`, '' AS `TemplateFollowUpAdvice`, '' AS `TemplateFollowUpMedication`, '' AS `TemplatePlan`, '' AS `QRCode` FROM " . $this->getSqlFrom();
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
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
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
	public function applyUserIDFilters($filter, $id = "")
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
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
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
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
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

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "ivf_otherprocedurelist.php";
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
		if ($pageName == "ivf_otherprocedureview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_otherprocedureedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_otherprocedureadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_otherprocedurelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_otherprocedureview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_otherprocedureview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_otherprocedureadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_otherprocedureadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_otherprocedureedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_otherprocedureadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_otherproceduredelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
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
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->SEX->setDbValue($rs->fields('SEX'));
		$this->Address->setDbValue($rs->fields('Address'));
		$this->DateofAdmission->setDbValue($rs->fields('DateofAdmission'));
		$this->DateofProcedure->setDbValue($rs->fields('DateofProcedure'));
		$this->DateofDischarge->setDbValue($rs->fields('DateofDischarge'));
		$this->Consultant->setDbValue($rs->fields('Consultant'));
		$this->Surgeon->setDbValue($rs->fields('Surgeon'));
		$this->Anesthetist->setDbValue($rs->fields('Anesthetist'));
		$this->IdentificationMark->setDbValue($rs->fields('IdentificationMark'));
		$this->ProcedureDone->setDbValue($rs->fields('ProcedureDone'));
		$this->PROVISIONALDIAGNOSIS->setDbValue($rs->fields('PROVISIONALDIAGNOSIS'));
		$this->Chiefcomplaints->setDbValue($rs->fields('Chiefcomplaints'));
		$this->MaritallHistory->setDbValue($rs->fields('MaritallHistory'));
		$this->MenstrualHistory->setDbValue($rs->fields('MenstrualHistory'));
		$this->SurgicalHistory->setDbValue($rs->fields('SurgicalHistory'));
		$this->PastHistory->setDbValue($rs->fields('PastHistory'));
		$this->FamilyHistory->setDbValue($rs->fields('FamilyHistory'));
		$this->Temp->setDbValue($rs->fields('Temp'));
		$this->Pulse->setDbValue($rs->fields('Pulse'));
		$this->BP->setDbValue($rs->fields('BP'));
		$this->CNS->setDbValue($rs->fields('CNS'));
		$this->_RS->setDbValue($rs->fields('RS'));
		$this->CVS->setDbValue($rs->fields('CVS'));
		$this->PA->setDbValue($rs->fields('PA'));
		$this->InvestigationReport->setDbValue($rs->fields('InvestigationReport'));
		$this->FinalDiagnosis->setDbValue($rs->fields('FinalDiagnosis'));
		$this->Treatment->setDbValue($rs->fields('Treatment'));
		$this->DetailOfOperation->setDbValue($rs->fields('DetailOfOperation'));
		$this->FollowUpAdvice->setDbValue($rs->fields('FollowUpAdvice'));
		$this->FollowUpMedication->setDbValue($rs->fields('FollowUpMedication'));
		$this->Plan->setDbValue($rs->fields('Plan'));
		$this->TempleteFinalDiagnosis->setDbValue($rs->fields('TempleteFinalDiagnosis'));
		$this->TemplateTreatment->setDbValue($rs->fields('TemplateTreatment'));
		$this->TemplateOperation->setDbValue($rs->fields('TemplateOperation'));
		$this->TemplateFollowUpAdvice->setDbValue($rs->fields('TemplateFollowUpAdvice'));
		$this->TemplateFollowUpMedication->setDbValue($rs->fields('TemplateFollowUpMedication'));
		$this->TemplatePlan->setDbValue($rs->fields('TemplatePlan'));
		$this->QRCode->setDbValue($rs->fields('QRCode'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		$curVal = strval($this->Name->CurrentValue);
		if ($curVal != "") {
			$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
			if ($this->Name->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Name->ViewValue = $this->Name->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Name->ViewValue = $this->Name->CurrentValue;
				}
			}
		} else {
			$this->Name->ViewValue = NULL;
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
		$curVal = strval($this->Consultant->CurrentValue);
		if ($curVal != "") {
			$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			if ($this->Consultant->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
				}
			}
		} else {
			$this->Consultant->ViewValue = NULL;
		}
		$this->Consultant->ViewCustomAttributes = "";

		// Surgeon
		$curVal = strval($this->Surgeon->CurrentValue);
		if ($curVal != "") {
			$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
				}
			}
		} else {
			$this->Surgeon->ViewValue = NULL;
		}
		$this->Surgeon->ViewCustomAttributes = "";

		// Anesthetist
		$curVal = strval($this->Anesthetist->CurrentValue);
		if ($curVal != "") {
			$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
				}
			}
		} else {
			$this->Anesthetist->ViewValue = NULL;
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
		$curVal = strval($this->TempleteFinalDiagnosis->CurrentValue);
		if ($curVal != "") {
			$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
			if ($this->TempleteFinalDiagnosis->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='TemplateDiagnosis'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->CurrentValue;
				}
			}
		} else {
			$this->TempleteFinalDiagnosis->ViewValue = NULL;
		}
		$this->TempleteFinalDiagnosis->ViewCustomAttributes = "";

		// TemplateTreatment
		$curVal = strval($this->TemplateTreatment->CurrentValue);
		if ($curVal != "") {
			$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
			if ($this->TemplateTreatment->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Treatment'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateTreatment->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->CurrentValue;
				}
			}
		} else {
			$this->TemplateTreatment->ViewValue = NULL;
		}
		$this->TemplateTreatment->ViewCustomAttributes = "";

		// TemplateOperation
		$curVal = strval($this->TemplateOperation->CurrentValue);
		if ($curVal != "") {
			$this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
			if ($this->TemplateOperation->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Operation'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateOperation->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateOperation->ViewValue = $this->TemplateOperation->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateOperation->ViewValue = $this->TemplateOperation->CurrentValue;
				}
			}
		} else {
			$this->TemplateOperation->ViewValue = NULL;
		}
		$this->TemplateOperation->ViewCustomAttributes = "";

		// TemplateFollowUpAdvice
		$curVal = strval($this->TemplateFollowUpAdvice->CurrentValue);
		if ($curVal != "") {
			$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
			if ($this->TemplateFollowUpAdvice->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='FollowUpAdvice '";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->CurrentValue;
				}
			}
		} else {
			$this->TemplateFollowUpAdvice->ViewValue = NULL;
		}
		$this->TemplateFollowUpAdvice->ViewCustomAttributes = "";

		// TemplateFollowUpMedication
		$curVal = strval($this->TemplateFollowUpMedication->CurrentValue);
		if ($curVal != "") {
			$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
			if ($this->TemplateFollowUpMedication->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='FollowUpMedication'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->CurrentValue;
				}
			}
		} else {
			$this->TemplateFollowUpMedication->ViewValue = NULL;
		}
		$this->TemplateFollowUpMedication->ViewCustomAttributes = "";

		// TemplatePlan
		$curVal = strval($this->TemplatePlan->CurrentValue);
		if ($curVal != "") {
			$this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
			if ($this->TemplatePlan->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='TemplatePlan'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePlan->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplatePlan->ViewValue = $this->TemplatePlan->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplatePlan->ViewValue = $this->TemplatePlan->CurrentValue;
				}
			}
		} else {
			$this->TemplatePlan->ViewValue = NULL;
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
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		if (!$this->Name->Raw)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// SEX
		$this->SEX->EditAttrs["class"] = "form-control";
		$this->SEX->EditCustomAttributes = "";
		if (!$this->SEX->Raw)
			$this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
		$this->SEX->EditValue = $this->SEX->CurrentValue;
		$this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

		// Address
		$this->Address->EditAttrs["class"] = "form-control";
		$this->Address->EditCustomAttributes = "";
		if (!$this->Address->Raw)
			$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
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

		// Surgeon
		$this->Surgeon->EditAttrs["class"] = "form-control";
		$this->Surgeon->EditCustomAttributes = "";

		// Anesthetist
		$this->Anesthetist->EditAttrs["class"] = "form-control";
		$this->Anesthetist->EditCustomAttributes = "";

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (!$this->IdentificationMark->Raw)
			$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
		$this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

		// ProcedureDone
		$this->ProcedureDone->EditAttrs["class"] = "form-control";
		$this->ProcedureDone->EditCustomAttributes = "";
		if (!$this->ProcedureDone->Raw)
			$this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
		$this->ProcedureDone->EditValue = $this->ProcedureDone->CurrentValue;
		$this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
		$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
		if (!$this->PROVISIONALDIAGNOSIS->Raw)
			$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
		$this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

		// Chiefcomplaints
		$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
		$this->Chiefcomplaints->EditCustomAttributes = "";
		if (!$this->Chiefcomplaints->Raw)
			$this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
		$this->Chiefcomplaints->EditValue = $this->Chiefcomplaints->CurrentValue;
		$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

		// MaritallHistory
		$this->MaritallHistory->EditAttrs["class"] = "form-control";
		$this->MaritallHistory->EditCustomAttributes = "";
		if (!$this->MaritallHistory->Raw)
			$this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
		$this->MaritallHistory->EditValue = $this->MaritallHistory->CurrentValue;
		$this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

		// MenstrualHistory
		$this->MenstrualHistory->EditAttrs["class"] = "form-control";
		$this->MenstrualHistory->EditCustomAttributes = "";
		if (!$this->MenstrualHistory->Raw)
			$this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
		$this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
		$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

		// SurgicalHistory
		$this->SurgicalHistory->EditAttrs["class"] = "form-control";
		$this->SurgicalHistory->EditCustomAttributes = "";
		if (!$this->SurgicalHistory->Raw)
			$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
		$this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

		// PastHistory
		$this->PastHistory->EditAttrs["class"] = "form-control";
		$this->PastHistory->EditCustomAttributes = "";
		if (!$this->PastHistory->Raw)
			$this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
		$this->PastHistory->EditValue = $this->PastHistory->CurrentValue;
		$this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

		// FamilyHistory
		$this->FamilyHistory->EditAttrs["class"] = "form-control";
		$this->FamilyHistory->EditCustomAttributes = "";
		if (!$this->FamilyHistory->Raw)
			$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
		$this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
		$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

		// Temp
		$this->Temp->EditAttrs["class"] = "form-control";
		$this->Temp->EditCustomAttributes = "";
		if (!$this->Temp->Raw)
			$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
		$this->Temp->EditValue = $this->Temp->CurrentValue;
		$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

		// Pulse
		$this->Pulse->EditAttrs["class"] = "form-control";
		$this->Pulse->EditCustomAttributes = "";
		if (!$this->Pulse->Raw)
			$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
		$this->Pulse->EditValue = $this->Pulse->CurrentValue;
		$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

		// BP
		$this->BP->EditAttrs["class"] = "form-control";
		$this->BP->EditCustomAttributes = "";
		if (!$this->BP->Raw)
			$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
		$this->BP->EditValue = $this->BP->CurrentValue;
		$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

		// CNS
		$this->CNS->EditAttrs["class"] = "form-control";
		$this->CNS->EditCustomAttributes = "";
		if (!$this->CNS->Raw)
			$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
		$this->CNS->EditValue = $this->CNS->CurrentValue;
		$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

		// RS
		$this->_RS->EditAttrs["class"] = "form-control";
		$this->_RS->EditCustomAttributes = "";
		if (!$this->_RS->Raw)
			$this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
		$this->_RS->EditValue = $this->_RS->CurrentValue;
		$this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

		// CVS
		$this->CVS->EditAttrs["class"] = "form-control";
		$this->CVS->EditCustomAttributes = "";
		if (!$this->CVS->Raw)
			$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
		$this->CVS->EditValue = $this->CVS->CurrentValue;
		$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

		// PA
		$this->PA->EditAttrs["class"] = "form-control";
		$this->PA->EditCustomAttributes = "";
		if (!$this->PA->Raw)
			$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
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

		// TemplateTreatment
		$this->TemplateTreatment->EditAttrs["class"] = "form-control";
		$this->TemplateTreatment->EditCustomAttributes = "";

		// TemplateOperation
		$this->TemplateOperation->EditAttrs["class"] = "form-control";
		$this->TemplateOperation->EditCustomAttributes = "";

		// TemplateFollowUpAdvice
		$this->TemplateFollowUpAdvice->EditAttrs["class"] = "form-control";
		$this->TemplateFollowUpAdvice->EditCustomAttributes = "";

		// TemplateFollowUpMedication
		$this->TemplateFollowUpMedication->EditAttrs["class"] = "form-control";
		$this->TemplateFollowUpMedication->EditCustomAttributes = "";

		// TemplatePlan
		$this->TemplatePlan->EditAttrs["class"] = "form-control";
		$this->TemplatePlan->EditCustomAttributes = "";

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
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
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
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

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
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>