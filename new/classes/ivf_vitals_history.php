<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_vitals_history
 */
class ivf_vitals_history extends DbTable
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
	public $Religion;
	public $Address;
	public $IdentificationMark;
	public $DoublewitnessName1;
	public $DoublewitnessName2;
	public $Chiefcomplaints;
	public $MenstrualHistory;
	public $ObstetricHistory;
	public $MedicalHistory;
	public $SurgicalHistory;
	public $Generalexaminationpallor;
	public $PR;
	public $CVS;
	public $PA;
	public $PROVISIONALDIAGNOSIS;
	public $Investigations;
	public $Fheight;
	public $Fweight;
	public $FBMI;
	public $FBloodgroup;
	public $Mheight;
	public $Mweight;
	public $MBMI;
	public $MBloodgroup;
	public $FBuild;
	public $MBuild;
	public $FSkinColor;
	public $MSkinColor;
	public $FEyesColor;
	public $MEyesColor;
	public $FHairColor;
	public $MhairColor;
	public $FhairTexture;
	public $MHairTexture;
	public $Fothers;
	public $Mothers;
	public $PGE;
	public $PPR;
	public $PBP;
	public $Breast;
	public $PPA;
	public $PPSV;
	public $PPAPSMEAR;
	public $PTHYROID;
	public $MTHYROID;
	public $SecSexCharacters;
	public $PenisUM;
	public $VAS;
	public $EPIDIDYMIS;
	public $Varicocele;
	public $FertilityTreatmentHistory;
	public $SurgeryHistory;
	public $FamilyHistory;
	public $PInvestigations;
	public $Addictions;
	public $Medications;
	public $Medical;
	public $Surgical;
	public $CoitalHistory;
	public $SemenAnalysis;
	public $MInsvestications;
	public $PImpression;
	public $MIMpression;
	public $PPlanOfManagement;
	public $MPlanOfManagement;
	public $PReadMore;
	public $MReadMore;
	public $MariedFor;
	public $CMNCM;
	public $TemplateMenstrualHistory;
	public $TemplateObstetricHistory;
	public $TemplateFertilityTreatmentHistory;
	public $TemplateSurgeryHistory;
	public $TemplateFInvestigations;
	public $TemplatePlanOfManagement;
	public $TemplatePImpression;
	public $TemplateMedications;
	public $TemplateSemenAnalysis;
	public $MaleInsvestications;
	public $TemplateMIMpression;
	public $TemplateMalePlanOfManagement;
	public $TidNo;
	public $pFamilyHistory;
	public $pTemplateMedications;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_vitals_history';
		$this->TableName = 'ivf_vitals_history';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_vitals_history`";
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
		$this->id = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// SEX
		$this->SEX = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, 45, -1, FALSE, '`SEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEX->Sortable = TRUE; // Allow sort
		$this->fields['SEX'] = &$this->SEX;

		// Religion
		$this->Religion = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, 45, -1, FALSE, '`Religion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->fields['Religion'] = &$this->Religion;

		// Address
		$this->Address = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Address', 'Address', '`Address`', '`Address`', 200, 45, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->fields['Address'] = &$this->Address;

		// IdentificationMark
		$this->IdentificationMark = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// DoublewitnessName1
		$this->DoublewitnessName1 = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_DoublewitnessName1', 'DoublewitnessName1', '`DoublewitnessName1`', '`DoublewitnessName1`', 201, 444, -1, FALSE, '`DoublewitnessName1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DoublewitnessName1->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName1'] = &$this->DoublewitnessName1;

		// DoublewitnessName2
		$this->DoublewitnessName2 = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_DoublewitnessName2', 'DoublewitnessName2', '`DoublewitnessName2`', '`DoublewitnessName2`', 201, 444, -1, FALSE, '`DoublewitnessName2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DoublewitnessName2->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName2'] = &$this->DoublewitnessName2;

		// Chiefcomplaints
		$this->Chiefcomplaints = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 201, 800, -1, FALSE, '`Chiefcomplaints`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Chiefcomplaints->Sortable = TRUE; // Allow sort
		$this->fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

		// MenstrualHistory
		$this->MenstrualHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 201, 65535, -1, FALSE, '`MenstrualHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MenstrualHistory->Sortable = TRUE; // Allow sort
		$this->fields['MenstrualHistory'] = &$this->MenstrualHistory;

		// ObstetricHistory
		$this->ObstetricHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 201, 65535, -1, FALSE, '`ObstetricHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ObstetricHistory->Sortable = TRUE; // Allow sort
		$this->fields['ObstetricHistory'] = &$this->ObstetricHistory;

		// MedicalHistory
		$this->MedicalHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MedicalHistory', 'MedicalHistory', '`MedicalHistory`', '`MedicalHistory`', 200, 45, -1, FALSE, '`MedicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->MedicalHistory->Sortable = TRUE; // Allow sort
		$this->MedicalHistory->Lookup = new Lookup('MedicalHistory', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MedicalHistory->OptionCount = 12;
		$this->fields['MedicalHistory'] = &$this->MedicalHistory;

		// SurgicalHistory
		$this->SurgicalHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, 45, -1, FALSE, '`SurgicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SurgicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgicalHistory'] = &$this->SurgicalHistory;

		// Generalexaminationpallor
		$this->Generalexaminationpallor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Generalexaminationpallor', 'Generalexaminationpallor', '`Generalexaminationpallor`', '`Generalexaminationpallor`', 200, 45, -1, FALSE, '`Generalexaminationpallor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Generalexaminationpallor->Sortable = TRUE; // Allow sort
		$this->fields['Generalexaminationpallor'] = &$this->Generalexaminationpallor;

		// PR
		$this->PR = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PR', 'PR', '`PR`', '`PR`', 200, 45, -1, FALSE, '`PR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR->Sortable = TRUE; // Allow sort
		$this->fields['PR'] = &$this->PR;

		// CVS
		$this->CVS = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, 45, -1, FALSE, '`CVS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CVS->Sortable = TRUE; // Allow sort
		$this->fields['CVS'] = &$this->CVS;

		// PA
		$this->PA = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PA', 'PA', '`PA`', '`PA`', 200, 45, -1, FALSE, '`PA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PA->Sortable = TRUE; // Allow sort
		$this->fields['PA'] = &$this->PA;

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, 45, -1, FALSE, '`PROVISIONALDIAGNOSIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PROVISIONALDIAGNOSIS->Sortable = TRUE; // Allow sort
		$this->fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

		// Investigations
		$this->Investigations = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Investigations', 'Investigations', '`Investigations`', '`Investigations`', 200, 45, -1, FALSE, '`Investigations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Investigations->Sortable = TRUE; // Allow sort
		$this->fields['Investigations'] = &$this->Investigations;

		// Fheight
		$this->Fheight = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Fheight', 'Fheight', '`Fheight`', '`Fheight`', 200, 45, -1, FALSE, '`Fheight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fheight->Sortable = TRUE; // Allow sort
		$this->fields['Fheight'] = &$this->Fheight;

		// Fweight
		$this->Fweight = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Fweight', 'Fweight', '`Fweight`', '`Fweight`', 200, 45, -1, FALSE, '`Fweight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fweight->Sortable = TRUE; // Allow sort
		$this->fields['Fweight'] = &$this->Fweight;

		// FBMI
		$this->FBMI = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, 45, -1, FALSE, '`FBMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBMI->Sortable = TRUE; // Allow sort
		$this->fields['FBMI'] = &$this->FBMI;

		// FBloodgroup
		$this->FBloodgroup = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FBloodgroup', 'FBloodgroup', '`FBloodgroup`', '`FBloodgroup`', 200, 45, -1, FALSE, '`FBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->FBloodgroup->Sortable = TRUE; // Allow sort
		$this->FBloodgroup->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->FBloodgroup->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->FBloodgroup->Lookup = new Lookup('FBloodgroup', 'mas_bloodgroup', FALSE, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
		$this->fields['FBloodgroup'] = &$this->FBloodgroup;

		// Mheight
		$this->Mheight = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Mheight', 'Mheight', '`Mheight`', '`Mheight`', 200, 45, -1, FALSE, '`Mheight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mheight->Sortable = TRUE; // Allow sort
		$this->fields['Mheight'] = &$this->Mheight;

		// Mweight
		$this->Mweight = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Mweight', 'Mweight', '`Mweight`', '`Mweight`', 200, 45, -1, FALSE, '`Mweight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mweight->Sortable = TRUE; // Allow sort
		$this->fields['Mweight'] = &$this->Mweight;

		// MBMI
		$this->MBMI = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MBMI', 'MBMI', '`MBMI`', '`MBMI`', 200, 45, -1, FALSE, '`MBMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MBMI->Sortable = TRUE; // Allow sort
		$this->fields['MBMI'] = &$this->MBMI;

		// MBloodgroup
		$this->MBloodgroup = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MBloodgroup', 'MBloodgroup', '`MBloodgroup`', '`MBloodgroup`', 200, 45, -1, FALSE, '`MBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MBloodgroup->Sortable = TRUE; // Allow sort
		$this->MBloodgroup->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MBloodgroup->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->MBloodgroup->Lookup = new Lookup('MBloodgroup', 'mas_bloodgroup', FALSE, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
		$this->fields['MBloodgroup'] = &$this->MBloodgroup;

		// FBuild
		$this->FBuild = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FBuild', 'FBuild', '`FBuild`', '`FBuild`', 200, 45, -1, FALSE, '`FBuild`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->FBuild->Sortable = TRUE; // Allow sort
		$this->FBuild->Lookup = new Lookup('FBuild', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FBuild->OptionCount = 5;
		$this->fields['FBuild'] = &$this->FBuild;

		// MBuild
		$this->MBuild = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MBuild', 'MBuild', '`MBuild`', '`MBuild`', 200, 45, -1, FALSE, '`MBuild`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MBuild->Sortable = TRUE; // Allow sort
		$this->MBuild->Lookup = new Lookup('MBuild', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MBuild->OptionCount = 5;
		$this->fields['MBuild'] = &$this->MBuild;

		// FSkinColor
		$this->FSkinColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FSkinColor', 'FSkinColor', '`FSkinColor`', '`FSkinColor`', 200, 45, -1, FALSE, '`FSkinColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->FSkinColor->Sortable = TRUE; // Allow sort
		$this->FSkinColor->Lookup = new Lookup('FSkinColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FSkinColor->OptionCount = 5;
		$this->fields['FSkinColor'] = &$this->FSkinColor;

		// MSkinColor
		$this->MSkinColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MSkinColor', 'MSkinColor', '`MSkinColor`', '`MSkinColor`', 200, 45, -1, FALSE, '`MSkinColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MSkinColor->Sortable = TRUE; // Allow sort
		$this->MSkinColor->Lookup = new Lookup('MSkinColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MSkinColor->OptionCount = 5;
		$this->fields['MSkinColor'] = &$this->MSkinColor;

		// FEyesColor
		$this->FEyesColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FEyesColor', 'FEyesColor', '`FEyesColor`', '`FEyesColor`', 200, 45, -1, FALSE, '`FEyesColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->FEyesColor->Sortable = TRUE; // Allow sort
		$this->FEyesColor->Lookup = new Lookup('FEyesColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FEyesColor->OptionCount = 6;
		$this->fields['FEyesColor'] = &$this->FEyesColor;

		// MEyesColor
		$this->MEyesColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MEyesColor', 'MEyesColor', '`MEyesColor`', '`MEyesColor`', 200, 45, -1, FALSE, '`MEyesColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MEyesColor->Sortable = TRUE; // Allow sort
		$this->MEyesColor->Lookup = new Lookup('MEyesColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MEyesColor->OptionCount = 6;
		$this->fields['MEyesColor'] = &$this->MEyesColor;

		// FHairColor
		$this->FHairColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FHairColor', 'FHairColor', '`FHairColor`', '`FHairColor`', 200, 45, -1, FALSE, '`FHairColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->FHairColor->Sortable = TRUE; // Allow sort
		$this->FHairColor->Lookup = new Lookup('FHairColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FHairColor->OptionCount = 6;
		$this->fields['FHairColor'] = &$this->FHairColor;

		// MhairColor
		$this->MhairColor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MhairColor', 'MhairColor', '`MhairColor`', '`MhairColor`', 200, 45, -1, FALSE, '`MhairColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MhairColor->Sortable = TRUE; // Allow sort
		$this->MhairColor->Lookup = new Lookup('MhairColor', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MhairColor->OptionCount = 6;
		$this->fields['MhairColor'] = &$this->MhairColor;

		// FhairTexture
		$this->FhairTexture = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FhairTexture', 'FhairTexture', '`FhairTexture`', '`FhairTexture`', 200, 45, -1, FALSE, '`FhairTexture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->FhairTexture->Sortable = TRUE; // Allow sort
		$this->FhairTexture->Lookup = new Lookup('FhairTexture', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FhairTexture->OptionCount = 5;
		$this->fields['FhairTexture'] = &$this->FhairTexture;

		// MHairTexture
		$this->MHairTexture = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MHairTexture', 'MHairTexture', '`MHairTexture`', '`MHairTexture`', 200, 45, -1, FALSE, '`MHairTexture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->MHairTexture->Sortable = TRUE; // Allow sort
		$this->MHairTexture->Lookup = new Lookup('MHairTexture', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MHairTexture->OptionCount = 5;
		$this->fields['MHairTexture'] = &$this->MHairTexture;

		// Fothers
		$this->Fothers = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Fothers', 'Fothers', '`Fothers`', '`Fothers`', 200, 45, -1, FALSE, '`Fothers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fothers->Sortable = TRUE; // Allow sort
		$this->fields['Fothers'] = &$this->Fothers;

		// Mothers
		$this->Mothers = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Mothers', 'Mothers', '`Mothers`', '`Mothers`', 200, 45, -1, FALSE, '`Mothers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mothers->Sortable = TRUE; // Allow sort
		$this->fields['Mothers'] = &$this->Mothers;

		// PGE
		$this->PGE = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PGE', 'PGE', '`PGE`', '`PGE`', 200, 45, -1, FALSE, '`PGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PGE->Sortable = TRUE; // Allow sort
		$this->fields['PGE'] = &$this->PGE;

		// PPR
		$this->PPR = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PPR', 'PPR', '`PPR`', '`PPR`', 200, 45, -1, FALSE, '`PPR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPR->Sortable = TRUE; // Allow sort
		$this->fields['PPR'] = &$this->PPR;

		// PBP
		$this->PBP = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PBP', 'PBP', '`PBP`', '`PBP`', 200, 45, -1, FALSE, '`PBP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PBP->Sortable = TRUE; // Allow sort
		$this->fields['PBP'] = &$this->PBP;

		// Breast
		$this->Breast = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Breast', 'Breast', '`Breast`', '`Breast`', 200, 45, -1, FALSE, '`Breast`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Breast->Sortable = TRUE; // Allow sort
		$this->fields['Breast'] = &$this->Breast;

		// PPA
		$this->PPA = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PPA', 'PPA', '`PPA`', '`PPA`', 200, 45, -1, FALSE, '`PPA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPA->Sortable = TRUE; // Allow sort
		$this->fields['PPA'] = &$this->PPA;

		// PPSV
		$this->PPSV = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PPSV', 'PPSV', '`PPSV`', '`PPSV`', 200, 45, -1, FALSE, '`PPSV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPSV->Sortable = TRUE; // Allow sort
		$this->fields['PPSV'] = &$this->PPSV;

		// PPAPSMEAR
		$this->PPAPSMEAR = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PPAPSMEAR', 'PPAPSMEAR', '`PPAPSMEAR`', '`PPAPSMEAR`', 200, 45, -1, FALSE, '`PPAPSMEAR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPAPSMEAR->Sortable = TRUE; // Allow sort
		$this->fields['PPAPSMEAR'] = &$this->PPAPSMEAR;

		// PTHYROID
		$this->PTHYROID = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PTHYROID', 'PTHYROID', '`PTHYROID`', '`PTHYROID`', 200, 45, -1, FALSE, '`PTHYROID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTHYROID->Sortable = TRUE; // Allow sort
		$this->fields['PTHYROID'] = &$this->PTHYROID;

		// MTHYROID
		$this->MTHYROID = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MTHYROID', 'MTHYROID', '`MTHYROID`', '`MTHYROID`', 200, 45, -1, FALSE, '`MTHYROID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MTHYROID->Sortable = TRUE; // Allow sort
		$this->fields['MTHYROID'] = &$this->MTHYROID;

		// SecSexCharacters
		$this->SecSexCharacters = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_SecSexCharacters', 'SecSexCharacters', '`SecSexCharacters`', '`SecSexCharacters`', 200, 45, -1, FALSE, '`SecSexCharacters`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SecSexCharacters->Sortable = TRUE; // Allow sort
		$this->fields['SecSexCharacters'] = &$this->SecSexCharacters;

		// PenisUM
		$this->PenisUM = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PenisUM', 'PenisUM', '`PenisUM`', '`PenisUM`', 200, 45, -1, FALSE, '`PenisUM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PenisUM->Sortable = TRUE; // Allow sort
		$this->fields['PenisUM'] = &$this->PenisUM;

		// VAS
		$this->VAS = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_VAS', 'VAS', '`VAS`', '`VAS`', 200, 45, -1, FALSE, '`VAS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VAS->Sortable = TRUE; // Allow sort
		$this->fields['VAS'] = &$this->VAS;

		// EPIDIDYMIS
		$this->EPIDIDYMIS = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_EPIDIDYMIS', 'EPIDIDYMIS', '`EPIDIDYMIS`', '`EPIDIDYMIS`', 200, 45, -1, FALSE, '`EPIDIDYMIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EPIDIDYMIS->Sortable = TRUE; // Allow sort
		$this->fields['EPIDIDYMIS'] = &$this->EPIDIDYMIS;

		// Varicocele
		$this->Varicocele = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Varicocele', 'Varicocele', '`Varicocele`', '`Varicocele`', 200, 45, -1, FALSE, '`Varicocele`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Varicocele->Sortable = TRUE; // Allow sort
		$this->fields['Varicocele'] = &$this->Varicocele;

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FertilityTreatmentHistory', 'FertilityTreatmentHistory', '`FertilityTreatmentHistory`', '`FertilityTreatmentHistory`', 201, 65535, -1, FALSE, '`FertilityTreatmentHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FertilityTreatmentHistory->Sortable = TRUE; // Allow sort
		$this->fields['FertilityTreatmentHistory'] = &$this->FertilityTreatmentHistory;

		// SurgeryHistory
		$this->SurgeryHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_SurgeryHistory', 'SurgeryHistory', '`SurgeryHistory`', '`SurgeryHistory`', 201, 65535, -1, FALSE, '`SurgeryHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SurgeryHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgeryHistory'] = &$this->SurgeryHistory;

		// FamilyHistory
		$this->FamilyHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, FALSE, '`FamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FamilyHistory->Sortable = TRUE; // Allow sort
		$this->FamilyHistory->Lookup = new Lookup('FamilyHistory', 'ivf_history_master', FALSE, 'History', ["History","","",""], [], [], [], [], [], [], '', '');
		$this->fields['FamilyHistory'] = &$this->FamilyHistory;

		// PInvestigations
		$this->PInvestigations = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PInvestigations', 'PInvestigations', '`PInvestigations`', '`PInvestigations`', 201, 65535, -1, FALSE, '`PInvestigations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PInvestigations->Sortable = TRUE; // Allow sort
		$this->fields['PInvestigations'] = &$this->PInvestigations;

		// Addictions
		$this->Addictions = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Addictions', 'Addictions', '`Addictions`', '`Addictions`', 200, 45, -1, FALSE, '`Addictions`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Addictions->Sortable = TRUE; // Allow sort
		$this->Addictions->Lookup = new Lookup('Addictions', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Addictions->OptionCount = 4;
		$this->fields['Addictions'] = &$this->Addictions;

		// Medications
		$this->Medications = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Medications', 'Medications', '`Medications`', '`Medications`', 201, 805, -1, FALSE, '`Medications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Medications->Sortable = TRUE; // Allow sort
		$this->fields['Medications'] = &$this->Medications;

		// Medical
		$this->Medical = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Medical', 'Medical', '`Medical`', '`Medical`', 200, 45, -1, FALSE, '`Medical`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Medical->Sortable = TRUE; // Allow sort
		$this->Medical->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Medical->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Medical->Lookup = new Lookup('Medical', 'ivf_vitals_history', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Medical->OptionCount = 13;
		$this->fields['Medical'] = &$this->Medical;

		// Surgical
		$this->Surgical = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_Surgical', 'Surgical', '`Surgical`', '`Surgical`', 200, 45, -1, FALSE, '`EV__Surgical`', TRUE, FALSE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->Surgical->Sortable = TRUE; // Allow sort
		$this->Surgical->Lookup = new Lookup('Surgical', 'ivf_history_master', FALSE, 'History', ["History","","",""], [], [], [], [], [], [], '`id` ASC', '');
		$this->fields['Surgical'] = &$this->Surgical;

		// CoitalHistory
		$this->CoitalHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_CoitalHistory', 'CoitalHistory', '`CoitalHistory`', '`CoitalHistory`', 200, 45, -1, FALSE, '`CoitalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoitalHistory->Sortable = TRUE; // Allow sort
		$this->CoitalHistory->Lookup = new Lookup('CoitalHistory', 'ivf_history_master', FALSE, 'History', ["History","","",""], [], [], [], [], [], [], '', '');
		$this->fields['CoitalHistory'] = &$this->CoitalHistory;

		// SemenAnalysis
		$this->SemenAnalysis = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_SemenAnalysis', 'SemenAnalysis', '`SemenAnalysis`', '`SemenAnalysis`', 201, 65535, -1, FALSE, '`SemenAnalysis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SemenAnalysis->Sortable = TRUE; // Allow sort
		$this->fields['SemenAnalysis'] = &$this->SemenAnalysis;

		// MInsvestications
		$this->MInsvestications = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MInsvestications', 'MInsvestications', '`MInsvestications`', '`MInsvestications`', 201, 65535, -1, FALSE, '`MInsvestications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MInsvestications->Sortable = TRUE; // Allow sort
		$this->fields['MInsvestications'] = &$this->MInsvestications;

		// PImpression
		$this->PImpression = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PImpression', 'PImpression', '`PImpression`', '`PImpression`', 201, 65535, -1, FALSE, '`PImpression`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PImpression->Sortable = TRUE; // Allow sort
		$this->fields['PImpression'] = &$this->PImpression;

		// MIMpression
		$this->MIMpression = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MIMpression', 'MIMpression', '`MIMpression`', '`MIMpression`', 201, 65535, -1, FALSE, '`MIMpression`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MIMpression->Sortable = TRUE; // Allow sort
		$this->fields['MIMpression'] = &$this->MIMpression;

		// PPlanOfManagement
		$this->PPlanOfManagement = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PPlanOfManagement', 'PPlanOfManagement', '`PPlanOfManagement`', '`PPlanOfManagement`', 201, 65535, -1, FALSE, '`PPlanOfManagement`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PPlanOfManagement->Sortable = TRUE; // Allow sort
		$this->fields['PPlanOfManagement'] = &$this->PPlanOfManagement;

		// MPlanOfManagement
		$this->MPlanOfManagement = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MPlanOfManagement', 'MPlanOfManagement', '`MPlanOfManagement`', '`MPlanOfManagement`', 201, 65535, -1, FALSE, '`MPlanOfManagement`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MPlanOfManagement->Sortable = TRUE; // Allow sort
		$this->fields['MPlanOfManagement'] = &$this->MPlanOfManagement;

		// PReadMore
		$this->PReadMore = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_PReadMore', 'PReadMore', '`PReadMore`', '`PReadMore`', 201, 65535, -1, FALSE, '`PReadMore`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PReadMore->Sortable = TRUE; // Allow sort
		$this->fields['PReadMore'] = &$this->PReadMore;

		// MReadMore
		$this->MReadMore = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MReadMore', 'MReadMore', '`MReadMore`', '`MReadMore`', 201, 65535, -1, FALSE, '`MReadMore`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MReadMore->Sortable = TRUE; // Allow sort
		$this->fields['MReadMore'] = &$this->MReadMore;

		// MariedFor
		$this->MariedFor = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MariedFor', 'MariedFor', '`MariedFor`', '`MariedFor`', 200, 45, -1, FALSE, '`MariedFor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MariedFor->Sortable = TRUE; // Allow sort
		$this->fields['MariedFor'] = &$this->MariedFor;

		// CMNCM
		$this->CMNCM = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_CMNCM', 'CMNCM', '`CMNCM`', '`CMNCM`', 200, 45, -1, FALSE, '`CMNCM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CMNCM->Sortable = TRUE; // Allow sort
		$this->fields['CMNCM'] = &$this->CMNCM;

		// TemplateMenstrualHistory
		$this->TemplateMenstrualHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateMenstrualHistory', 'TemplateMenstrualHistory', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateMenstrualHistory->IsCustom = TRUE; // Custom field
		$this->TemplateMenstrualHistory->Sortable = TRUE; // Allow sort
		$this->TemplateMenstrualHistory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateMenstrualHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateMenstrualHistory->Lookup = new Lookup('TemplateMenstrualHistory', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_MenstrualHistory"], '', '');
		$this->fields['TemplateMenstrualHistory'] = &$this->TemplateMenstrualHistory;

		// TemplateObstetricHistory
		$this->TemplateObstetricHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateObstetricHistory', 'TemplateObstetricHistory', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateObstetricHistory->IsCustom = TRUE; // Custom field
		$this->TemplateObstetricHistory->Sortable = TRUE; // Allow sort
		$this->TemplateObstetricHistory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateObstetricHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateObstetricHistory->Lookup = new Lookup('TemplateObstetricHistory', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_ObstetricHistory"], '', '');
		$this->fields['TemplateObstetricHistory'] = &$this->TemplateObstetricHistory;

		// TemplateFertilityTreatmentHistory
		$this->TemplateFertilityTreatmentHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateFertilityTreatmentHistory', 'TemplateFertilityTreatmentHistory', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateFertilityTreatmentHistory->IsCustom = TRUE; // Custom field
		$this->TemplateFertilityTreatmentHistory->Sortable = TRUE; // Allow sort
		$this->TemplateFertilityTreatmentHistory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateFertilityTreatmentHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateFertilityTreatmentHistory->Lookup = new Lookup('TemplateFertilityTreatmentHistory', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FertilityTreatmentHistory"], '', '');
		$this->fields['TemplateFertilityTreatmentHistory'] = &$this->TemplateFertilityTreatmentHistory;

		// TemplateSurgeryHistory
		$this->TemplateSurgeryHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateSurgeryHistory', 'TemplateSurgeryHistory', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateSurgeryHistory->IsCustom = TRUE; // Custom field
		$this->TemplateSurgeryHistory->Sortable = TRUE; // Allow sort
		$this->TemplateSurgeryHistory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateSurgeryHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateSurgeryHistory->Lookup = new Lookup('TemplateSurgeryHistory', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_SurgeryHistory"], '', '');
		$this->fields['TemplateSurgeryHistory'] = &$this->TemplateSurgeryHistory;

		// TemplateFInvestigations
		$this->TemplateFInvestigations = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateFInvestigations', 'TemplateFInvestigations', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateFInvestigations->IsCustom = TRUE; // Custom field
		$this->TemplateFInvestigations->Sortable = TRUE; // Allow sort
		$this->TemplateFInvestigations->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateFInvestigations->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateFInvestigations->Lookup = new Lookup('TemplateFInvestigations', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_PInvestigations"], '', '');
		$this->fields['TemplateFInvestigations'] = &$this->TemplateFInvestigations;

		// TemplatePlanOfManagement
		$this->TemplatePlanOfManagement = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplatePlanOfManagement', 'TemplatePlanOfManagement', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplatePlanOfManagement->IsCustom = TRUE; // Custom field
		$this->TemplatePlanOfManagement->Sortable = TRUE; // Allow sort
		$this->TemplatePlanOfManagement->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplatePlanOfManagement->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplatePlanOfManagement->Lookup = new Lookup('TemplatePlanOfManagement', 'ivf_mas_user_template', FALSE, 'TemplateType', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_PPlanOfManagement"], '', '');
		$this->fields['TemplatePlanOfManagement'] = &$this->TemplatePlanOfManagement;

		// TemplatePImpression
		$this->TemplatePImpression = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplatePImpression', 'TemplatePImpression', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplatePImpression->IsCustom = TRUE; // Custom field
		$this->TemplatePImpression->Sortable = TRUE; // Allow sort
		$this->TemplatePImpression->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplatePImpression->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplatePImpression->Lookup = new Lookup('TemplatePImpression', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_PImpression"], '', '');
		$this->fields['TemplatePImpression'] = &$this->TemplatePImpression;

		// TemplateMedications
		$this->TemplateMedications = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateMedications', 'TemplateMedications', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateMedications->IsCustom = TRUE; // Custom field
		$this->TemplateMedications->Sortable = TRUE; // Allow sort
		$this->TemplateMedications->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateMedications->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateMedications->Lookup = new Lookup('TemplateMedications', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Medications"], '', '');
		$this->fields['TemplateMedications'] = &$this->TemplateMedications;

		// TemplateSemenAnalysis
		$this->TemplateSemenAnalysis = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateSemenAnalysis', 'TemplateSemenAnalysis', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateSemenAnalysis->IsCustom = TRUE; // Custom field
		$this->TemplateSemenAnalysis->Sortable = TRUE; // Allow sort
		$this->TemplateSemenAnalysis->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateSemenAnalysis->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateSemenAnalysis->Lookup = new Lookup('TemplateSemenAnalysis', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_SemenAnalysis"], '', '');
		$this->fields['TemplateSemenAnalysis'] = &$this->TemplateSemenAnalysis;

		// MaleInsvestications
		$this->MaleInsvestications = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_MaleInsvestications', 'MaleInsvestications', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MaleInsvestications->IsCustom = TRUE; // Custom field
		$this->MaleInsvestications->Sortable = TRUE; // Allow sort
		$this->MaleInsvestications->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MaleInsvestications->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->MaleInsvestications->Lookup = new Lookup('MaleInsvestications', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_MInsvestications"], '', '');
		$this->fields['MaleInsvestications'] = &$this->MaleInsvestications;

		// TemplateMIMpression
		$this->TemplateMIMpression = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateMIMpression', 'TemplateMIMpression', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateMIMpression->IsCustom = TRUE; // Custom field
		$this->TemplateMIMpression->Sortable = TRUE; // Allow sort
		$this->TemplateMIMpression->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateMIMpression->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateMIMpression->Lookup = new Lookup('TemplateMIMpression', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_MaleInsvestications"], '', '');
		$this->fields['TemplateMIMpression'] = &$this->TemplateMIMpression;

		// TemplateMalePlanOfManagement
		$this->TemplateMalePlanOfManagement = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TemplateMalePlanOfManagement', 'TemplateMalePlanOfManagement', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateMalePlanOfManagement->IsCustom = TRUE; // Custom field
		$this->TemplateMalePlanOfManagement->Sortable = TRUE; // Allow sort
		$this->TemplateMalePlanOfManagement->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateMalePlanOfManagement->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateMalePlanOfManagement->Lookup = new Lookup('TemplateMalePlanOfManagement', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_MPlanOfManagement"], '', '');
		$this->fields['TemplateMalePlanOfManagement'] = &$this->TemplateMalePlanOfManagement;

		// TidNo
		$this->TidNo = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// pFamilyHistory
		$this->pFamilyHistory = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_pFamilyHistory', 'pFamilyHistory', '`pFamilyHistory`', '`pFamilyHistory`', 200, 45, -1, FALSE, '`pFamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pFamilyHistory->Sortable = TRUE; // Allow sort
		$this->pFamilyHistory->Lookup = new Lookup('pFamilyHistory', 'ivf_history_master', FALSE, 'History', ["History","","",""], [], [], [], [], [], [], '', '');
		$this->fields['pFamilyHistory'] = &$this->pFamilyHistory;

		// pTemplateMedications
		$this->pTemplateMedications = new DbField('ivf_vitals_history', 'ivf_vitals_history', 'x_pTemplateMedications', 'pTemplateMedications', '`pTemplateMedications`', '`pTemplateMedications`', 201, 65535, -1, FALSE, '`pTemplateMedications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->pTemplateMedications->Sortable = TRUE; // Allow sort
		$this->fields['pTemplateMedications'] = &$this->pTemplateMedications;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_vitals_history`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `TemplateMenstrualHistory`, '' AS `TemplateObstetricHistory`, '' AS `TemplateFertilityTreatmentHistory`, '' AS `TemplateSurgeryHistory`, '' AS `TemplateFInvestigations`, '' AS `TemplatePlanOfManagement`, '' AS `TemplatePImpression`, '' AS `TemplateMedications`, '' AS `TemplateSemenAnalysis`, '' AS `MaleInsvestications`, '' AS `TemplateMIMpression`, '' AS `TemplateMalePlanOfManagement` FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, '' AS `TemplateMenstrualHistory`, '' AS `TemplateObstetricHistory`, '' AS `TemplateFertilityTreatmentHistory`, '' AS `TemplateSurgeryHistory`, '' AS `TemplateFInvestigations`, '' AS `TemplatePlanOfManagement`, '' AS `TemplatePImpression`, '' AS `TemplateMedications`, '' AS `TemplateSemenAnalysis`, '' AS `MaleInsvestications`, '' AS `TemplateMIMpression`, '' AS `TemplateMalePlanOfManagement`, (SELECT `History` FROM `ivf_history_master` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`History` = `ivf_vitals_history`.`Surgical` LIMIT 1) AS `EV__Surgical` FROM `ivf_vitals_history`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if ($this->Surgical->AdvancedSearch->SearchValue != "" ||
			$this->Surgical->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->Surgical->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Surgical->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
		$this->Religion->DbValue = $row['Religion'];
		$this->Address->DbValue = $row['Address'];
		$this->IdentificationMark->DbValue = $row['IdentificationMark'];
		$this->DoublewitnessName1->DbValue = $row['DoublewitnessName1'];
		$this->DoublewitnessName2->DbValue = $row['DoublewitnessName2'];
		$this->Chiefcomplaints->DbValue = $row['Chiefcomplaints'];
		$this->MenstrualHistory->DbValue = $row['MenstrualHistory'];
		$this->ObstetricHistory->DbValue = $row['ObstetricHistory'];
		$this->MedicalHistory->DbValue = $row['MedicalHistory'];
		$this->SurgicalHistory->DbValue = $row['SurgicalHistory'];
		$this->Generalexaminationpallor->DbValue = $row['Generalexaminationpallor'];
		$this->PR->DbValue = $row['PR'];
		$this->CVS->DbValue = $row['CVS'];
		$this->PA->DbValue = $row['PA'];
		$this->PROVISIONALDIAGNOSIS->DbValue = $row['PROVISIONALDIAGNOSIS'];
		$this->Investigations->DbValue = $row['Investigations'];
		$this->Fheight->DbValue = $row['Fheight'];
		$this->Fweight->DbValue = $row['Fweight'];
		$this->FBMI->DbValue = $row['FBMI'];
		$this->FBloodgroup->DbValue = $row['FBloodgroup'];
		$this->Mheight->DbValue = $row['Mheight'];
		$this->Mweight->DbValue = $row['Mweight'];
		$this->MBMI->DbValue = $row['MBMI'];
		$this->MBloodgroup->DbValue = $row['MBloodgroup'];
		$this->FBuild->DbValue = $row['FBuild'];
		$this->MBuild->DbValue = $row['MBuild'];
		$this->FSkinColor->DbValue = $row['FSkinColor'];
		$this->MSkinColor->DbValue = $row['MSkinColor'];
		$this->FEyesColor->DbValue = $row['FEyesColor'];
		$this->MEyesColor->DbValue = $row['MEyesColor'];
		$this->FHairColor->DbValue = $row['FHairColor'];
		$this->MhairColor->DbValue = $row['MhairColor'];
		$this->FhairTexture->DbValue = $row['FhairTexture'];
		$this->MHairTexture->DbValue = $row['MHairTexture'];
		$this->Fothers->DbValue = $row['Fothers'];
		$this->Mothers->DbValue = $row['Mothers'];
		$this->PGE->DbValue = $row['PGE'];
		$this->PPR->DbValue = $row['PPR'];
		$this->PBP->DbValue = $row['PBP'];
		$this->Breast->DbValue = $row['Breast'];
		$this->PPA->DbValue = $row['PPA'];
		$this->PPSV->DbValue = $row['PPSV'];
		$this->PPAPSMEAR->DbValue = $row['PPAPSMEAR'];
		$this->PTHYROID->DbValue = $row['PTHYROID'];
		$this->MTHYROID->DbValue = $row['MTHYROID'];
		$this->SecSexCharacters->DbValue = $row['SecSexCharacters'];
		$this->PenisUM->DbValue = $row['PenisUM'];
		$this->VAS->DbValue = $row['VAS'];
		$this->EPIDIDYMIS->DbValue = $row['EPIDIDYMIS'];
		$this->Varicocele->DbValue = $row['Varicocele'];
		$this->FertilityTreatmentHistory->DbValue = $row['FertilityTreatmentHistory'];
		$this->SurgeryHistory->DbValue = $row['SurgeryHistory'];
		$this->FamilyHistory->DbValue = $row['FamilyHistory'];
		$this->PInvestigations->DbValue = $row['PInvestigations'];
		$this->Addictions->DbValue = $row['Addictions'];
		$this->Medications->DbValue = $row['Medications'];
		$this->Medical->DbValue = $row['Medical'];
		$this->Surgical->DbValue = $row['Surgical'];
		$this->CoitalHistory->DbValue = $row['CoitalHistory'];
		$this->SemenAnalysis->DbValue = $row['SemenAnalysis'];
		$this->MInsvestications->DbValue = $row['MInsvestications'];
		$this->PImpression->DbValue = $row['PImpression'];
		$this->MIMpression->DbValue = $row['MIMpression'];
		$this->PPlanOfManagement->DbValue = $row['PPlanOfManagement'];
		$this->MPlanOfManagement->DbValue = $row['MPlanOfManagement'];
		$this->PReadMore->DbValue = $row['PReadMore'];
		$this->MReadMore->DbValue = $row['MReadMore'];
		$this->MariedFor->DbValue = $row['MariedFor'];
		$this->CMNCM->DbValue = $row['CMNCM'];
		$this->TemplateMenstrualHistory->DbValue = $row['TemplateMenstrualHistory'];
		$this->TemplateObstetricHistory->DbValue = $row['TemplateObstetricHistory'];
		$this->TemplateFertilityTreatmentHistory->DbValue = $row['TemplateFertilityTreatmentHistory'];
		$this->TemplateSurgeryHistory->DbValue = $row['TemplateSurgeryHistory'];
		$this->TemplateFInvestigations->DbValue = $row['TemplateFInvestigations'];
		$this->TemplatePlanOfManagement->DbValue = $row['TemplatePlanOfManagement'];
		$this->TemplatePImpression->DbValue = $row['TemplatePImpression'];
		$this->TemplateMedications->DbValue = $row['TemplateMedications'];
		$this->TemplateSemenAnalysis->DbValue = $row['TemplateSemenAnalysis'];
		$this->MaleInsvestications->DbValue = $row['MaleInsvestications'];
		$this->TemplateMIMpression->DbValue = $row['TemplateMIMpression'];
		$this->TemplateMalePlanOfManagement->DbValue = $row['TemplateMalePlanOfManagement'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->pFamilyHistory->DbValue = $row['pFamilyHistory'];
		$this->pTemplateMedications->DbValue = $row['pTemplateMedications'];
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
			return "ivf_vitals_historylist.php";
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
		if ($pageName == "ivf_vitals_historyview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_vitals_historyedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_vitals_historyadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_vitals_historylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_vitals_historyview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_vitals_historyview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_vitals_historyadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_vitals_historyadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_vitals_historyedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_vitals_historyadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_vitals_historydelete.php", $this->getUrlParm());
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
		$this->Religion->setDbValue($rs->fields('Religion'));
		$this->Address->setDbValue($rs->fields('Address'));
		$this->IdentificationMark->setDbValue($rs->fields('IdentificationMark'));
		$this->DoublewitnessName1->setDbValue($rs->fields('DoublewitnessName1'));
		$this->DoublewitnessName2->setDbValue($rs->fields('DoublewitnessName2'));
		$this->Chiefcomplaints->setDbValue($rs->fields('Chiefcomplaints'));
		$this->MenstrualHistory->setDbValue($rs->fields('MenstrualHistory'));
		$this->ObstetricHistory->setDbValue($rs->fields('ObstetricHistory'));
		$this->MedicalHistory->setDbValue($rs->fields('MedicalHistory'));
		$this->SurgicalHistory->setDbValue($rs->fields('SurgicalHistory'));
		$this->Generalexaminationpallor->setDbValue($rs->fields('Generalexaminationpallor'));
		$this->PR->setDbValue($rs->fields('PR'));
		$this->CVS->setDbValue($rs->fields('CVS'));
		$this->PA->setDbValue($rs->fields('PA'));
		$this->PROVISIONALDIAGNOSIS->setDbValue($rs->fields('PROVISIONALDIAGNOSIS'));
		$this->Investigations->setDbValue($rs->fields('Investigations'));
		$this->Fheight->setDbValue($rs->fields('Fheight'));
		$this->Fweight->setDbValue($rs->fields('Fweight'));
		$this->FBMI->setDbValue($rs->fields('FBMI'));
		$this->FBloodgroup->setDbValue($rs->fields('FBloodgroup'));
		$this->Mheight->setDbValue($rs->fields('Mheight'));
		$this->Mweight->setDbValue($rs->fields('Mweight'));
		$this->MBMI->setDbValue($rs->fields('MBMI'));
		$this->MBloodgroup->setDbValue($rs->fields('MBloodgroup'));
		$this->FBuild->setDbValue($rs->fields('FBuild'));
		$this->MBuild->setDbValue($rs->fields('MBuild'));
		$this->FSkinColor->setDbValue($rs->fields('FSkinColor'));
		$this->MSkinColor->setDbValue($rs->fields('MSkinColor'));
		$this->FEyesColor->setDbValue($rs->fields('FEyesColor'));
		$this->MEyesColor->setDbValue($rs->fields('MEyesColor'));
		$this->FHairColor->setDbValue($rs->fields('FHairColor'));
		$this->MhairColor->setDbValue($rs->fields('MhairColor'));
		$this->FhairTexture->setDbValue($rs->fields('FhairTexture'));
		$this->MHairTexture->setDbValue($rs->fields('MHairTexture'));
		$this->Fothers->setDbValue($rs->fields('Fothers'));
		$this->Mothers->setDbValue($rs->fields('Mothers'));
		$this->PGE->setDbValue($rs->fields('PGE'));
		$this->PPR->setDbValue($rs->fields('PPR'));
		$this->PBP->setDbValue($rs->fields('PBP'));
		$this->Breast->setDbValue($rs->fields('Breast'));
		$this->PPA->setDbValue($rs->fields('PPA'));
		$this->PPSV->setDbValue($rs->fields('PPSV'));
		$this->PPAPSMEAR->setDbValue($rs->fields('PPAPSMEAR'));
		$this->PTHYROID->setDbValue($rs->fields('PTHYROID'));
		$this->MTHYROID->setDbValue($rs->fields('MTHYROID'));
		$this->SecSexCharacters->setDbValue($rs->fields('SecSexCharacters'));
		$this->PenisUM->setDbValue($rs->fields('PenisUM'));
		$this->VAS->setDbValue($rs->fields('VAS'));
		$this->EPIDIDYMIS->setDbValue($rs->fields('EPIDIDYMIS'));
		$this->Varicocele->setDbValue($rs->fields('Varicocele'));
		$this->FertilityTreatmentHistory->setDbValue($rs->fields('FertilityTreatmentHistory'));
		$this->SurgeryHistory->setDbValue($rs->fields('SurgeryHistory'));
		$this->FamilyHistory->setDbValue($rs->fields('FamilyHistory'));
		$this->PInvestigations->setDbValue($rs->fields('PInvestigations'));
		$this->Addictions->setDbValue($rs->fields('Addictions'));
		$this->Medications->setDbValue($rs->fields('Medications'));
		$this->Medical->setDbValue($rs->fields('Medical'));
		$this->Surgical->setDbValue($rs->fields('Surgical'));
		$this->CoitalHistory->setDbValue($rs->fields('CoitalHistory'));
		$this->SemenAnalysis->setDbValue($rs->fields('SemenAnalysis'));
		$this->MInsvestications->setDbValue($rs->fields('MInsvestications'));
		$this->PImpression->setDbValue($rs->fields('PImpression'));
		$this->MIMpression->setDbValue($rs->fields('MIMpression'));
		$this->PPlanOfManagement->setDbValue($rs->fields('PPlanOfManagement'));
		$this->MPlanOfManagement->setDbValue($rs->fields('MPlanOfManagement'));
		$this->PReadMore->setDbValue($rs->fields('PReadMore'));
		$this->MReadMore->setDbValue($rs->fields('MReadMore'));
		$this->MariedFor->setDbValue($rs->fields('MariedFor'));
		$this->CMNCM->setDbValue($rs->fields('CMNCM'));
		$this->TemplateMenstrualHistory->setDbValue($rs->fields('TemplateMenstrualHistory'));
		$this->TemplateObstetricHistory->setDbValue($rs->fields('TemplateObstetricHistory'));
		$this->TemplateFertilityTreatmentHistory->setDbValue($rs->fields('TemplateFertilityTreatmentHistory'));
		$this->TemplateSurgeryHistory->setDbValue($rs->fields('TemplateSurgeryHistory'));
		$this->TemplateFInvestigations->setDbValue($rs->fields('TemplateFInvestigations'));
		$this->TemplatePlanOfManagement->setDbValue($rs->fields('TemplatePlanOfManagement'));
		$this->TemplatePImpression->setDbValue($rs->fields('TemplatePImpression'));
		$this->TemplateMedications->setDbValue($rs->fields('TemplateMedications'));
		$this->TemplateSemenAnalysis->setDbValue($rs->fields('TemplateSemenAnalysis'));
		$this->MaleInsvestications->setDbValue($rs->fields('MaleInsvestications'));
		$this->TemplateMIMpression->setDbValue($rs->fields('TemplateMIMpression'));
		$this->TemplateMalePlanOfManagement->setDbValue($rs->fields('TemplateMalePlanOfManagement'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->pFamilyHistory->setDbValue($rs->fields('pFamilyHistory'));
		$this->pTemplateMedications->setDbValue($rs->fields('pTemplateMedications'));
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
		// Religion
		// Address
		// IdentificationMark
		// DoublewitnessName1
		// DoublewitnessName2
		// Chiefcomplaints
		// MenstrualHistory
		// ObstetricHistory
		// MedicalHistory
		// SurgicalHistory
		// Generalexaminationpallor
		// PR
		// CVS
		// PA
		// PROVISIONALDIAGNOSIS
		// Investigations
		// Fheight
		// Fweight
		// FBMI
		// FBloodgroup
		// Mheight
		// Mweight
		// MBMI
		// MBloodgroup
		// FBuild
		// MBuild
		// FSkinColor
		// MSkinColor
		// FEyesColor
		// MEyesColor
		// FHairColor
		// MhairColor
		// FhairTexture
		// MHairTexture
		// Fothers
		// Mothers
		// PGE
		// PPR
		// PBP
		// Breast
		// PPA
		// PPSV
		// PPAPSMEAR
		// PTHYROID
		// MTHYROID
		// SecSexCharacters
		// PenisUM
		// VAS
		// EPIDIDYMIS
		// Varicocele
		// FertilityTreatmentHistory
		// SurgeryHistory
		// FamilyHistory
		// PInvestigations
		// Addictions
		// Medications
		// Medical
		// Surgical
		// CoitalHistory
		// SemenAnalysis
		// MInsvestications
		// PImpression
		// MIMpression
		// PPlanOfManagement
		// MPlanOfManagement
		// PReadMore
		// MReadMore
		// MariedFor
		// CMNCM
		// TemplateMenstrualHistory
		// TemplateObstetricHistory
		// TemplateFertilityTreatmentHistory
		// TemplateSurgeryHistory
		// TemplateFInvestigations
		// TemplatePlanOfManagement
		// TemplatePImpression
		// TemplateMedications
		// TemplateSemenAnalysis
		// MaleInsvestications
		// TemplateMIMpression
		// TemplateMalePlanOfManagement
		// TidNo
		// pFamilyHistory
		// pTemplateMedications
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// Name
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// SEX
		$this->SEX->ViewValue = $this->SEX->CurrentValue;
		$this->SEX->ViewCustomAttributes = "";

		// Religion
		$this->Religion->ViewValue = $this->Religion->CurrentValue;
		$this->Religion->ViewCustomAttributes = "";

		// Address
		$this->Address->ViewValue = $this->Address->CurrentValue;
		$this->Address->ViewCustomAttributes = "";

		// IdentificationMark
		$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->ViewCustomAttributes = "";

		// DoublewitnessName1
		$this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
		$this->DoublewitnessName1->ViewCustomAttributes = "";

		// DoublewitnessName2
		$this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
		$this->DoublewitnessName2->ViewCustomAttributes = "";

		// Chiefcomplaints
		$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
		$this->Chiefcomplaints->ViewCustomAttributes = "";

		// MenstrualHistory
		$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
		$this->MenstrualHistory->ViewCustomAttributes = "";

		// ObstetricHistory
		$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
		$this->ObstetricHistory->ViewCustomAttributes = "";

		// MedicalHistory
		if (strval($this->MedicalHistory->CurrentValue) != "") {
			$this->MedicalHistory->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->MedicalHistory->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->MedicalHistory->ViewValue->add($this->MedicalHistory->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->MedicalHistory->ViewValue = NULL;
		}
		$this->MedicalHistory->ViewCustomAttributes = "";

		// SurgicalHistory
		$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->ViewCustomAttributes = "";

		// Generalexaminationpallor
		$this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
		$this->Generalexaminationpallor->ViewCustomAttributes = "";

		// PR
		$this->PR->ViewValue = $this->PR->CurrentValue;
		$this->PR->ViewCustomAttributes = "";

		// CVS
		$this->CVS->ViewValue = $this->CVS->CurrentValue;
		$this->CVS->ViewCustomAttributes = "";

		// PA
		$this->PA->ViewValue = $this->PA->CurrentValue;
		$this->PA->ViewCustomAttributes = "";

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

		// Investigations
		$this->Investigations->ViewValue = $this->Investigations->CurrentValue;
		$this->Investigations->ViewCustomAttributes = "";

		// Fheight
		$this->Fheight->ViewValue = $this->Fheight->CurrentValue;
		$this->Fheight->ViewCustomAttributes = "";

		// Fweight
		$this->Fweight->ViewValue = $this->Fweight->CurrentValue;
		$this->Fweight->ViewCustomAttributes = "";

		// FBMI
		$this->FBMI->ViewValue = $this->FBMI->CurrentValue;
		$this->FBMI->ViewCustomAttributes = "";

		// FBloodgroup
		$curVal = strval($this->FBloodgroup->CurrentValue);
		if ($curVal != "") {
			$this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
			if ($this->FBloodgroup->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->FBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->FBloodgroup->ViewValue = $this->FBloodgroup->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
				}
			}
		} else {
			$this->FBloodgroup->ViewValue = NULL;
		}
		$this->FBloodgroup->ViewCustomAttributes = "";

		// Mheight
		$this->Mheight->ViewValue = $this->Mheight->CurrentValue;
		$this->Mheight->ViewCustomAttributes = "";

		// Mweight
		$this->Mweight->ViewValue = $this->Mweight->CurrentValue;
		$this->Mweight->ViewCustomAttributes = "";

		// MBMI
		$this->MBMI->ViewValue = $this->MBMI->CurrentValue;
		$this->MBMI->ViewCustomAttributes = "";

		// MBloodgroup
		$curVal = strval($this->MBloodgroup->CurrentValue);
		if ($curVal != "") {
			$this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
			if ($this->MBloodgroup->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->MBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->MBloodgroup->ViewValue = $this->MBloodgroup->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
				}
			}
		} else {
			$this->MBloodgroup->ViewValue = NULL;
		}
		$this->MBloodgroup->ViewCustomAttributes = "";

		// FBuild
		if (strval($this->FBuild->CurrentValue) != "") {
			$this->FBuild->ViewValue = $this->FBuild->optionCaption($this->FBuild->CurrentValue);
		} else {
			$this->FBuild->ViewValue = NULL;
		}
		$this->FBuild->ViewCustomAttributes = "";

		// MBuild
		if (strval($this->MBuild->CurrentValue) != "") {
			$this->MBuild->ViewValue = $this->MBuild->optionCaption($this->MBuild->CurrentValue);
		} else {
			$this->MBuild->ViewValue = NULL;
		}
		$this->MBuild->ViewCustomAttributes = "";

		// FSkinColor
		if (strval($this->FSkinColor->CurrentValue) != "") {
			$this->FSkinColor->ViewValue = $this->FSkinColor->optionCaption($this->FSkinColor->CurrentValue);
		} else {
			$this->FSkinColor->ViewValue = NULL;
		}
		$this->FSkinColor->ViewCustomAttributes = "";

		// MSkinColor
		if (strval($this->MSkinColor->CurrentValue) != "") {
			$this->MSkinColor->ViewValue = $this->MSkinColor->optionCaption($this->MSkinColor->CurrentValue);
		} else {
			$this->MSkinColor->ViewValue = NULL;
		}
		$this->MSkinColor->ViewCustomAttributes = "";

		// FEyesColor
		if (strval($this->FEyesColor->CurrentValue) != "") {
			$this->FEyesColor->ViewValue = $this->FEyesColor->optionCaption($this->FEyesColor->CurrentValue);
		} else {
			$this->FEyesColor->ViewValue = NULL;
		}
		$this->FEyesColor->ViewCustomAttributes = "";

		// MEyesColor
		if (strval($this->MEyesColor->CurrentValue) != "") {
			$this->MEyesColor->ViewValue = $this->MEyesColor->optionCaption($this->MEyesColor->CurrentValue);
		} else {
			$this->MEyesColor->ViewValue = NULL;
		}
		$this->MEyesColor->ViewCustomAttributes = "";

		// FHairColor
		if (strval($this->FHairColor->CurrentValue) != "") {
			$this->FHairColor->ViewValue = $this->FHairColor->optionCaption($this->FHairColor->CurrentValue);
		} else {
			$this->FHairColor->ViewValue = NULL;
		}
		$this->FHairColor->ViewCustomAttributes = "";

		// MhairColor
		if (strval($this->MhairColor->CurrentValue) != "") {
			$this->MhairColor->ViewValue = $this->MhairColor->optionCaption($this->MhairColor->CurrentValue);
		} else {
			$this->MhairColor->ViewValue = NULL;
		}
		$this->MhairColor->ViewCustomAttributes = "";

		// FhairTexture
		if (strval($this->FhairTexture->CurrentValue) != "") {
			$this->FhairTexture->ViewValue = $this->FhairTexture->optionCaption($this->FhairTexture->CurrentValue);
		} else {
			$this->FhairTexture->ViewValue = NULL;
		}
		$this->FhairTexture->ViewCustomAttributes = "";

		// MHairTexture
		if (strval($this->MHairTexture->CurrentValue) != "") {
			$this->MHairTexture->ViewValue = $this->MHairTexture->optionCaption($this->MHairTexture->CurrentValue);
		} else {
			$this->MHairTexture->ViewValue = NULL;
		}
		$this->MHairTexture->ViewCustomAttributes = "";

		// Fothers
		$this->Fothers->ViewValue = $this->Fothers->CurrentValue;
		$this->Fothers->ViewCustomAttributes = "";

		// Mothers
		$this->Mothers->ViewValue = $this->Mothers->CurrentValue;
		$this->Mothers->ViewCustomAttributes = "";

		// PGE
		$this->PGE->ViewValue = $this->PGE->CurrentValue;
		$this->PGE->ViewCustomAttributes = "";

		// PPR
		$this->PPR->ViewValue = $this->PPR->CurrentValue;
		$this->PPR->ViewCustomAttributes = "";

		// PBP
		$this->PBP->ViewValue = $this->PBP->CurrentValue;
		$this->PBP->ViewCustomAttributes = "";

		// Breast
		$this->Breast->ViewValue = $this->Breast->CurrentValue;
		$this->Breast->ViewCustomAttributes = "";

		// PPA
		$this->PPA->ViewValue = $this->PPA->CurrentValue;
		$this->PPA->ViewCustomAttributes = "";

		// PPSV
		$this->PPSV->ViewValue = $this->PPSV->CurrentValue;
		$this->PPSV->ViewCustomAttributes = "";

		// PPAPSMEAR
		$this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
		$this->PPAPSMEAR->ViewCustomAttributes = "";

		// PTHYROID
		$this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
		$this->PTHYROID->ViewCustomAttributes = "";

		// MTHYROID
		$this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
		$this->MTHYROID->ViewCustomAttributes = "";

		// SecSexCharacters
		$this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
		$this->SecSexCharacters->ViewCustomAttributes = "";

		// PenisUM
		$this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
		$this->PenisUM->ViewCustomAttributes = "";

		// VAS
		$this->VAS->ViewValue = $this->VAS->CurrentValue;
		$this->VAS->ViewCustomAttributes = "";

		// EPIDIDYMIS
		$this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
		$this->EPIDIDYMIS->ViewCustomAttributes = "";

		// Varicocele
		$this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
		$this->Varicocele->ViewCustomAttributes = "";

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory->ViewValue = $this->FertilityTreatmentHistory->CurrentValue;
		$this->FertilityTreatmentHistory->ViewCustomAttributes = "";

		// SurgeryHistory
		$this->SurgeryHistory->ViewValue = $this->SurgeryHistory->CurrentValue;
		$this->SurgeryHistory->ViewCustomAttributes = "";

		// FamilyHistory
		$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
		$curVal = strval($this->FamilyHistory->CurrentValue);
		if ($curVal != "") {
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->lookupCacheOption($curVal);
			if ($this->FamilyHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`HistoryType`='FamilyHistory'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->FamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->FamilyHistory->ViewValue = $this->FamilyHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
				}
			}
		} else {
			$this->FamilyHistory->ViewValue = NULL;
		}
		$this->FamilyHistory->ViewCustomAttributes = "";

		// PInvestigations
		$this->PInvestigations->ViewValue = $this->PInvestigations->CurrentValue;
		$this->PInvestigations->ViewCustomAttributes = "";

		// Addictions
		if (strval($this->Addictions->CurrentValue) != "") {
			$this->Addictions->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->Addictions->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->Addictions->ViewValue->add($this->Addictions->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->Addictions->ViewValue = NULL;
		}
		$this->Addictions->ViewCustomAttributes = "";

		// Medications
		$this->Medications->ViewValue = $this->Medications->CurrentValue;
		$this->Medications->ViewCustomAttributes = "";

		// Medical
		if (strval($this->Medical->CurrentValue) != "") {
			$this->Medical->ViewValue = $this->Medical->optionCaption($this->Medical->CurrentValue);
		} else {
			$this->Medical->ViewValue = NULL;
		}
		$this->Medical->ViewCustomAttributes = "";

		// Surgical
		if ($this->Surgical->VirtualValue != "") {
			$this->Surgical->ViewValue = $this->Surgical->VirtualValue;
		} else {
			$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
			$curVal = strval($this->Surgical->CurrentValue);
			if ($curVal != "") {
				$this->Surgical->ViewValue = $this->Surgical->lookupCacheOption($curVal);
				if ($this->Surgical->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='SurgicalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Surgical->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgical->ViewValue = $this->Surgical->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
					}
				}
			} else {
				$this->Surgical->ViewValue = NULL;
			}
		}
		$this->Surgical->ViewCustomAttributes = "";

		// CoitalHistory
		$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
		$curVal = strval($this->CoitalHistory->CurrentValue);
		if ($curVal != "") {
			$this->CoitalHistory->ViewValue = $this->CoitalHistory->lookupCacheOption($curVal);
			if ($this->CoitalHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`HistoryType`='CoitalHistory'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->CoitalHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->CoitalHistory->ViewValue = $this->CoitalHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
				}
			}
		} else {
			$this->CoitalHistory->ViewValue = NULL;
		}
		$this->CoitalHistory->ViewCustomAttributes = "";

		// SemenAnalysis
		$this->SemenAnalysis->ViewValue = $this->SemenAnalysis->CurrentValue;
		$this->SemenAnalysis->ViewCustomAttributes = "";

		// MInsvestications
		$this->MInsvestications->ViewValue = $this->MInsvestications->CurrentValue;
		$this->MInsvestications->ViewCustomAttributes = "";

		// PImpression
		$this->PImpression->ViewValue = $this->PImpression->CurrentValue;
		$this->PImpression->ViewCustomAttributes = "";

		// MIMpression
		$this->MIMpression->ViewValue = $this->MIMpression->CurrentValue;
		$this->MIMpression->ViewCustomAttributes = "";

		// PPlanOfManagement
		$this->PPlanOfManagement->ViewValue = $this->PPlanOfManagement->CurrentValue;
		$this->PPlanOfManagement->ViewCustomAttributes = "";

		// MPlanOfManagement
		$this->MPlanOfManagement->ViewValue = $this->MPlanOfManagement->CurrentValue;
		$this->MPlanOfManagement->ViewCustomAttributes = "";

		// PReadMore
		$this->PReadMore->ViewValue = $this->PReadMore->CurrentValue;
		$this->PReadMore->ViewCustomAttributes = "";

		// MReadMore
		$this->MReadMore->ViewValue = $this->MReadMore->CurrentValue;
		$this->MReadMore->ViewCustomAttributes = "";

		// MariedFor
		$this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
		$this->MariedFor->ViewCustomAttributes = "";

		// CMNCM
		$this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
		$this->CMNCM->ViewCustomAttributes = "";

		// TemplateMenstrualHistory
		$curVal = strval($this->TemplateMenstrualHistory->CurrentValue);
		if ($curVal != "") {
			$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->lookupCacheOption($curVal);
			if ($this->TemplateMenstrualHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Menstrual History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMenstrualHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->CurrentValue;
				}
			}
		} else {
			$this->TemplateMenstrualHistory->ViewValue = NULL;
		}
		$this->TemplateMenstrualHistory->ViewCustomAttributes = "";

		// TemplateObstetricHistory
		$curVal = strval($this->TemplateObstetricHistory->CurrentValue);
		if ($curVal != "") {
			$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->lookupCacheOption($curVal);
			if ($this->TemplateObstetricHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Obstetric History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateObstetricHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->CurrentValue;
				}
			}
		} else {
			$this->TemplateObstetricHistory->ViewValue = NULL;
		}
		$this->TemplateObstetricHistory->ViewCustomAttributes = "";

		// TemplateFertilityTreatmentHistory
		$curVal = strval($this->TemplateFertilityTreatmentHistory->CurrentValue);
		if ($curVal != "") {
			$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->lookupCacheOption($curVal);
			if ($this->TemplateFertilityTreatmentHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Fertility Treatment History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFertilityTreatmentHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->CurrentValue;
				}
			}
		} else {
			$this->TemplateFertilityTreatmentHistory->ViewValue = NULL;
		}
		$this->TemplateFertilityTreatmentHistory->ViewCustomAttributes = "";

		// TemplateSurgeryHistory
		$curVal = strval($this->TemplateSurgeryHistory->CurrentValue);
		if ($curVal != "") {
			$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->lookupCacheOption($curVal);
			if ($this->TemplateSurgeryHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Surgery History'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateSurgeryHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->CurrentValue;
				}
			}
		} else {
			$this->TemplateSurgeryHistory->ViewValue = NULL;
		}
		$this->TemplateSurgeryHistory->ViewCustomAttributes = "";

		// TemplateFInvestigations
		$curVal = strval($this->TemplateFInvestigations->CurrentValue);
		if ($curVal != "") {
			$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->lookupCacheOption($curVal);
			if ($this->TemplateFInvestigations->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Female Investigations'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFInvestigations->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->CurrentValue;
				}
			}
		} else {
			$this->TemplateFInvestigations->ViewValue = NULL;
		}
		$this->TemplateFInvestigations->ViewCustomAttributes = "";

		// TemplatePlanOfManagement
		$curVal = strval($this->TemplatePlanOfManagement->CurrentValue);
		if ($curVal != "") {
			$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->lookupCacheOption($curVal);
			if ($this->TemplatePlanOfManagement->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Female Plan Of Management'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePlanOfManagement->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->CurrentValue;
				}
			}
		} else {
			$this->TemplatePlanOfManagement->ViewValue = NULL;
		}
		$this->TemplatePlanOfManagement->ViewCustomAttributes = "";

		// TemplatePImpression
		$curVal = strval($this->TemplatePImpression->CurrentValue);
		if ($curVal != "") {
			$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->lookupCacheOption($curVal);
			if ($this->TemplatePImpression->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Female Impression'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePImpression->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplatePImpression->ViewValue = $this->TemplatePImpression->CurrentValue;
				}
			}
		} else {
			$this->TemplatePImpression->ViewValue = NULL;
		}
		$this->TemplatePImpression->ViewCustomAttributes = "";

		// TemplateMedications
		$curVal = strval($this->TemplateMedications->CurrentValue);
		if ($curVal != "") {
			$this->TemplateMedications->ViewValue = $this->TemplateMedications->lookupCacheOption($curVal);
			if ($this->TemplateMedications->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Medications'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMedications->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateMedications->ViewValue = $this->TemplateMedications->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateMedications->ViewValue = $this->TemplateMedications->CurrentValue;
				}
			}
		} else {
			$this->TemplateMedications->ViewValue = NULL;
		}
		$this->TemplateMedications->ViewCustomAttributes = "";

		// TemplateSemenAnalysis
		$curVal = strval($this->TemplateSemenAnalysis->CurrentValue);
		if ($curVal != "") {
			$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->lookupCacheOption($curVal);
			if ($this->TemplateSemenAnalysis->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Semen Analysis'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateSemenAnalysis->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->CurrentValue;
				}
			}
		} else {
			$this->TemplateSemenAnalysis->ViewValue = NULL;
		}
		$this->TemplateSemenAnalysis->ViewCustomAttributes = "";

		// MaleInsvestications
		$curVal = strval($this->MaleInsvestications->CurrentValue);
		if ($curVal != "") {
			$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->lookupCacheOption($curVal);
			if ($this->MaleInsvestications->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Male Insvestications'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->MaleInsvestications->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->MaleInsvestications->ViewValue = $this->MaleInsvestications->CurrentValue;
				}
			}
		} else {
			$this->MaleInsvestications->ViewValue = NULL;
		}
		$this->MaleInsvestications->ViewCustomAttributes = "";

		// TemplateMIMpression
		$curVal = strval($this->TemplateMIMpression->CurrentValue);
		if ($curVal != "") {
			$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->lookupCacheOption($curVal);
			if ($this->TemplateMIMpression->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Male Impression'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMIMpression->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->CurrentValue;
				}
			}
		} else {
			$this->TemplateMIMpression->ViewValue = NULL;
		}
		$this->TemplateMIMpression->ViewCustomAttributes = "";

		// TemplateMalePlanOfManagement
		$curVal = strval($this->TemplateMalePlanOfManagement->CurrentValue);
		if ($curVal != "") {
			$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->lookupCacheOption($curVal);
			if ($this->TemplateMalePlanOfManagement->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='Male Plan Of Management'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMalePlanOfManagement->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->CurrentValue;
				}
			}
		} else {
			$this->TemplateMalePlanOfManagement->ViewValue = NULL;
		}
		$this->TemplateMalePlanOfManagement->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// pFamilyHistory
		$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
		$curVal = strval($this->pFamilyHistory->CurrentValue);
		if ($curVal != "") {
			$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->lookupCacheOption($curVal);
			if ($this->pFamilyHistory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`HistoryType`='FamilyHistory'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->pFamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
				}
			}
		} else {
			$this->pFamilyHistory->ViewValue = NULL;
		}
		$this->pFamilyHistory->ViewCustomAttributes = "";

		// pTemplateMedications
		$this->pTemplateMedications->ViewValue = $this->pTemplateMedications->CurrentValue;
		$this->pTemplateMedications->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
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

		// Religion
		$this->Religion->LinkCustomAttributes = "";
		$this->Religion->HrefValue = "";
		$this->Religion->TooltipValue = "";

		// Address
		$this->Address->LinkCustomAttributes = "";
		$this->Address->HrefValue = "";
		$this->Address->TooltipValue = "";

		// IdentificationMark
		$this->IdentificationMark->LinkCustomAttributes = "";
		$this->IdentificationMark->HrefValue = "";
		$this->IdentificationMark->TooltipValue = "";

		// DoublewitnessName1
		$this->DoublewitnessName1->LinkCustomAttributes = "";
		$this->DoublewitnessName1->HrefValue = "";
		$this->DoublewitnessName1->TooltipValue = "";

		// DoublewitnessName2
		$this->DoublewitnessName2->LinkCustomAttributes = "";
		$this->DoublewitnessName2->HrefValue = "";
		$this->DoublewitnessName2->TooltipValue = "";

		// Chiefcomplaints
		$this->Chiefcomplaints->LinkCustomAttributes = "";
		$this->Chiefcomplaints->HrefValue = "";
		$this->Chiefcomplaints->TooltipValue = "";

		// MenstrualHistory
		$this->MenstrualHistory->LinkCustomAttributes = "";
		$this->MenstrualHistory->HrefValue = "";
		$this->MenstrualHistory->TooltipValue = "";

		// ObstetricHistory
		$this->ObstetricHistory->LinkCustomAttributes = "";
		$this->ObstetricHistory->HrefValue = "";
		$this->ObstetricHistory->TooltipValue = "";

		// MedicalHistory
		$this->MedicalHistory->LinkCustomAttributes = "";
		$this->MedicalHistory->HrefValue = "";
		$this->MedicalHistory->TooltipValue = "";

		// SurgicalHistory
		$this->SurgicalHistory->LinkCustomAttributes = "";
		$this->SurgicalHistory->HrefValue = "";
		$this->SurgicalHistory->TooltipValue = "";

		// Generalexaminationpallor
		$this->Generalexaminationpallor->LinkCustomAttributes = "";
		$this->Generalexaminationpallor->HrefValue = "";
		$this->Generalexaminationpallor->TooltipValue = "";

		// PR
		$this->PR->LinkCustomAttributes = "";
		$this->PR->HrefValue = "";
		$this->PR->TooltipValue = "";

		// CVS
		$this->CVS->LinkCustomAttributes = "";
		$this->CVS->HrefValue = "";
		$this->CVS->TooltipValue = "";

		// PA
		$this->PA->LinkCustomAttributes = "";
		$this->PA->HrefValue = "";
		$this->PA->TooltipValue = "";

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
		$this->PROVISIONALDIAGNOSIS->HrefValue = "";
		$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

		// Investigations
		$this->Investigations->LinkCustomAttributes = "";
		$this->Investigations->HrefValue = "";
		$this->Investigations->TooltipValue = "";

		// Fheight
		$this->Fheight->LinkCustomAttributes = "";
		$this->Fheight->HrefValue = "";
		$this->Fheight->TooltipValue = "";

		// Fweight
		$this->Fweight->LinkCustomAttributes = "";
		$this->Fweight->HrefValue = "";
		$this->Fweight->TooltipValue = "";

		// FBMI
		$this->FBMI->LinkCustomAttributes = "";
		$this->FBMI->HrefValue = "";
		$this->FBMI->TooltipValue = "";

		// FBloodgroup
		$this->FBloodgroup->LinkCustomAttributes = "";
		$this->FBloodgroup->HrefValue = "";
		$this->FBloodgroup->TooltipValue = "";

		// Mheight
		$this->Mheight->LinkCustomAttributes = "";
		$this->Mheight->HrefValue = "";
		$this->Mheight->TooltipValue = "";

		// Mweight
		$this->Mweight->LinkCustomAttributes = "";
		$this->Mweight->HrefValue = "";
		$this->Mweight->TooltipValue = "";

		// MBMI
		$this->MBMI->LinkCustomAttributes = "";
		$this->MBMI->HrefValue = "";
		$this->MBMI->TooltipValue = "";

		// MBloodgroup
		$this->MBloodgroup->LinkCustomAttributes = "";
		$this->MBloodgroup->HrefValue = "";
		$this->MBloodgroup->TooltipValue = "";

		// FBuild
		$this->FBuild->LinkCustomAttributes = "";
		$this->FBuild->HrefValue = "";
		$this->FBuild->TooltipValue = "";

		// MBuild
		$this->MBuild->LinkCustomAttributes = "";
		$this->MBuild->HrefValue = "";
		$this->MBuild->TooltipValue = "";

		// FSkinColor
		$this->FSkinColor->LinkCustomAttributes = "";
		$this->FSkinColor->HrefValue = "";
		$this->FSkinColor->TooltipValue = "";

		// MSkinColor
		$this->MSkinColor->LinkCustomAttributes = "";
		$this->MSkinColor->HrefValue = "";
		$this->MSkinColor->TooltipValue = "";

		// FEyesColor
		$this->FEyesColor->LinkCustomAttributes = "";
		$this->FEyesColor->HrefValue = "";
		$this->FEyesColor->TooltipValue = "";

		// MEyesColor
		$this->MEyesColor->LinkCustomAttributes = "";
		$this->MEyesColor->HrefValue = "";
		$this->MEyesColor->TooltipValue = "";

		// FHairColor
		$this->FHairColor->LinkCustomAttributes = "";
		$this->FHairColor->HrefValue = "";
		$this->FHairColor->TooltipValue = "";

		// MhairColor
		$this->MhairColor->LinkCustomAttributes = "";
		$this->MhairColor->HrefValue = "";
		$this->MhairColor->TooltipValue = "";

		// FhairTexture
		$this->FhairTexture->LinkCustomAttributes = "";
		$this->FhairTexture->HrefValue = "";
		$this->FhairTexture->TooltipValue = "";

		// MHairTexture
		$this->MHairTexture->LinkCustomAttributes = "";
		$this->MHairTexture->HrefValue = "";
		$this->MHairTexture->TooltipValue = "";

		// Fothers
		$this->Fothers->LinkCustomAttributes = "";
		$this->Fothers->HrefValue = "";
		$this->Fothers->TooltipValue = "";

		// Mothers
		$this->Mothers->LinkCustomAttributes = "";
		$this->Mothers->HrefValue = "";
		$this->Mothers->TooltipValue = "";

		// PGE
		$this->PGE->LinkCustomAttributes = "";
		$this->PGE->HrefValue = "";
		$this->PGE->TooltipValue = "";

		// PPR
		$this->PPR->LinkCustomAttributes = "";
		$this->PPR->HrefValue = "";
		$this->PPR->TooltipValue = "";

		// PBP
		$this->PBP->LinkCustomAttributes = "";
		$this->PBP->HrefValue = "";
		$this->PBP->TooltipValue = "";

		// Breast
		$this->Breast->LinkCustomAttributes = "";
		$this->Breast->HrefValue = "";
		$this->Breast->TooltipValue = "";

		// PPA
		$this->PPA->LinkCustomAttributes = "";
		$this->PPA->HrefValue = "";
		$this->PPA->TooltipValue = "";

		// PPSV
		$this->PPSV->LinkCustomAttributes = "";
		$this->PPSV->HrefValue = "";
		$this->PPSV->TooltipValue = "";

		// PPAPSMEAR
		$this->PPAPSMEAR->LinkCustomAttributes = "";
		$this->PPAPSMEAR->HrefValue = "";
		$this->PPAPSMEAR->TooltipValue = "";

		// PTHYROID
		$this->PTHYROID->LinkCustomAttributes = "";
		$this->PTHYROID->HrefValue = "";
		$this->PTHYROID->TooltipValue = "";

		// MTHYROID
		$this->MTHYROID->LinkCustomAttributes = "";
		$this->MTHYROID->HrefValue = "";
		$this->MTHYROID->TooltipValue = "";

		// SecSexCharacters
		$this->SecSexCharacters->LinkCustomAttributes = "";
		$this->SecSexCharacters->HrefValue = "";
		$this->SecSexCharacters->TooltipValue = "";

		// PenisUM
		$this->PenisUM->LinkCustomAttributes = "";
		$this->PenisUM->HrefValue = "";
		$this->PenisUM->TooltipValue = "";

		// VAS
		$this->VAS->LinkCustomAttributes = "";
		$this->VAS->HrefValue = "";
		$this->VAS->TooltipValue = "";

		// EPIDIDYMIS
		$this->EPIDIDYMIS->LinkCustomAttributes = "";
		$this->EPIDIDYMIS->HrefValue = "";
		$this->EPIDIDYMIS->TooltipValue = "";

		// Varicocele
		$this->Varicocele->LinkCustomAttributes = "";
		$this->Varicocele->HrefValue = "";
		$this->Varicocele->TooltipValue = "";

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory->LinkCustomAttributes = "";
		$this->FertilityTreatmentHistory->HrefValue = "";
		$this->FertilityTreatmentHistory->TooltipValue = "";

		// SurgeryHistory
		$this->SurgeryHistory->LinkCustomAttributes = "";
		$this->SurgeryHistory->HrefValue = "";
		$this->SurgeryHistory->TooltipValue = "";

		// FamilyHistory
		$this->FamilyHistory->LinkCustomAttributes = "";
		$this->FamilyHistory->HrefValue = "";
		$this->FamilyHistory->TooltipValue = "";

		// PInvestigations
		$this->PInvestigations->LinkCustomAttributes = "";
		$this->PInvestigations->HrefValue = "";
		$this->PInvestigations->TooltipValue = "";

		// Addictions
		$this->Addictions->LinkCustomAttributes = "";
		$this->Addictions->HrefValue = "";
		$this->Addictions->TooltipValue = "";

		// Medications
		$this->Medications->LinkCustomAttributes = "";
		$this->Medications->HrefValue = "";
		$this->Medications->TooltipValue = "";

		// Medical
		$this->Medical->LinkCustomAttributes = "";
		$this->Medical->HrefValue = "";
		$this->Medical->TooltipValue = "";

		// Surgical
		$this->Surgical->LinkCustomAttributes = "";
		$this->Surgical->HrefValue = "";
		$this->Surgical->TooltipValue = "";

		// CoitalHistory
		$this->CoitalHistory->LinkCustomAttributes = "";
		$this->CoitalHistory->HrefValue = "";
		$this->CoitalHistory->TooltipValue = "";

		// SemenAnalysis
		$this->SemenAnalysis->LinkCustomAttributes = "";
		$this->SemenAnalysis->HrefValue = "";
		$this->SemenAnalysis->TooltipValue = "";

		// MInsvestications
		$this->MInsvestications->LinkCustomAttributes = "";
		$this->MInsvestications->HrefValue = "";
		$this->MInsvestications->TooltipValue = "";

		// PImpression
		$this->PImpression->LinkCustomAttributes = "";
		$this->PImpression->HrefValue = "";
		$this->PImpression->TooltipValue = "";

		// MIMpression
		$this->MIMpression->LinkCustomAttributes = "";
		$this->MIMpression->HrefValue = "";
		$this->MIMpression->TooltipValue = "";

		// PPlanOfManagement
		$this->PPlanOfManagement->LinkCustomAttributes = "";
		$this->PPlanOfManagement->HrefValue = "";
		$this->PPlanOfManagement->TooltipValue = "";

		// MPlanOfManagement
		$this->MPlanOfManagement->LinkCustomAttributes = "";
		$this->MPlanOfManagement->HrefValue = "";
		$this->MPlanOfManagement->TooltipValue = "";

		// PReadMore
		$this->PReadMore->LinkCustomAttributes = "";
		$this->PReadMore->HrefValue = "";
		$this->PReadMore->TooltipValue = "";

		// MReadMore
		$this->MReadMore->LinkCustomAttributes = "";
		$this->MReadMore->HrefValue = "";
		$this->MReadMore->TooltipValue = "";

		// MariedFor
		$this->MariedFor->LinkCustomAttributes = "";
		$this->MariedFor->HrefValue = "";
		$this->MariedFor->TooltipValue = "";

		// CMNCM
		$this->CMNCM->LinkCustomAttributes = "";
		$this->CMNCM->HrefValue = "";
		$this->CMNCM->TooltipValue = "";

		// TemplateMenstrualHistory
		$this->TemplateMenstrualHistory->LinkCustomAttributes = "";
		$this->TemplateMenstrualHistory->HrefValue = "";
		$this->TemplateMenstrualHistory->TooltipValue = "";

		// TemplateObstetricHistory
		$this->TemplateObstetricHistory->LinkCustomAttributes = "";
		$this->TemplateObstetricHistory->HrefValue = "";
		$this->TemplateObstetricHistory->TooltipValue = "";

		// TemplateFertilityTreatmentHistory
		$this->TemplateFertilityTreatmentHistory->LinkCustomAttributes = "";
		$this->TemplateFertilityTreatmentHistory->HrefValue = "";
		$this->TemplateFertilityTreatmentHistory->TooltipValue = "";

		// TemplateSurgeryHistory
		$this->TemplateSurgeryHistory->LinkCustomAttributes = "";
		$this->TemplateSurgeryHistory->HrefValue = "";
		$this->TemplateSurgeryHistory->TooltipValue = "";

		// TemplateFInvestigations
		$this->TemplateFInvestigations->LinkCustomAttributes = "";
		$this->TemplateFInvestigations->HrefValue = "";
		$this->TemplateFInvestigations->TooltipValue = "";

		// TemplatePlanOfManagement
		$this->TemplatePlanOfManagement->LinkCustomAttributes = "";
		$this->TemplatePlanOfManagement->HrefValue = "";
		$this->TemplatePlanOfManagement->TooltipValue = "";

		// TemplatePImpression
		$this->TemplatePImpression->LinkCustomAttributes = "";
		$this->TemplatePImpression->HrefValue = "";
		$this->TemplatePImpression->TooltipValue = "";

		// TemplateMedications
		$this->TemplateMedications->LinkCustomAttributes = "";
		$this->TemplateMedications->HrefValue = "";
		$this->TemplateMedications->TooltipValue = "";

		// TemplateSemenAnalysis
		$this->TemplateSemenAnalysis->LinkCustomAttributes = "";
		$this->TemplateSemenAnalysis->HrefValue = "";
		$this->TemplateSemenAnalysis->TooltipValue = "";

		// MaleInsvestications
		$this->MaleInsvestications->LinkCustomAttributes = "";
		$this->MaleInsvestications->HrefValue = "";
		$this->MaleInsvestications->TooltipValue = "";

		// TemplateMIMpression
		$this->TemplateMIMpression->LinkCustomAttributes = "";
		$this->TemplateMIMpression->HrefValue = "";
		$this->TemplateMIMpression->TooltipValue = "";

		// TemplateMalePlanOfManagement
		$this->TemplateMalePlanOfManagement->LinkCustomAttributes = "";
		$this->TemplateMalePlanOfManagement->HrefValue = "";
		$this->TemplateMalePlanOfManagement->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// pFamilyHistory
		$this->pFamilyHistory->LinkCustomAttributes = "";
		$this->pFamilyHistory->HrefValue = "";
		$this->pFamilyHistory->TooltipValue = "";

		// pTemplateMedications
		$this->pTemplateMedications->LinkCustomAttributes = "";
		$this->pTemplateMedications->HrefValue = "";
		$this->pTemplateMedications->TooltipValue = "";

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

		// Religion
		$this->Religion->EditAttrs["class"] = "form-control";
		$this->Religion->EditCustomAttributes = "";
		if (!$this->Religion->Raw)
			$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
		$this->Religion->EditValue = $this->Religion->CurrentValue;
		$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

		// Address
		$this->Address->EditAttrs["class"] = "form-control";
		$this->Address->EditCustomAttributes = "";
		if (!$this->Address->Raw)
			$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
		$this->Address->EditValue = $this->Address->CurrentValue;
		$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (!$this->IdentificationMark->Raw)
			$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
		$this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

		// DoublewitnessName1
		$this->DoublewitnessName1->EditAttrs["class"] = "form-control";
		$this->DoublewitnessName1->EditCustomAttributes = "";
		$this->DoublewitnessName1->EditValue = $this->DoublewitnessName1->CurrentValue;
		$this->DoublewitnessName1->PlaceHolder = RemoveHtml($this->DoublewitnessName1->caption());

		// DoublewitnessName2
		$this->DoublewitnessName2->EditAttrs["class"] = "form-control";
		$this->DoublewitnessName2->EditCustomAttributes = "";
		$this->DoublewitnessName2->EditValue = $this->DoublewitnessName2->CurrentValue;
		$this->DoublewitnessName2->PlaceHolder = RemoveHtml($this->DoublewitnessName2->caption());

		// Chiefcomplaints
		$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
		$this->Chiefcomplaints->EditCustomAttributes = "";
		$this->Chiefcomplaints->EditValue = $this->Chiefcomplaints->CurrentValue;
		$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

		// MenstrualHistory
		$this->MenstrualHistory->EditAttrs["class"] = "form-control";
		$this->MenstrualHistory->EditCustomAttributes = "";
		$this->MenstrualHistory->EditValue = $this->MenstrualHistory->CurrentValue;
		$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

		// ObstetricHistory
		$this->ObstetricHistory->EditAttrs["class"] = "form-control";
		$this->ObstetricHistory->EditCustomAttributes = "";
		$this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
		$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

		// MedicalHistory
		$this->MedicalHistory->EditCustomAttributes = "";
		$this->MedicalHistory->EditValue = $this->MedicalHistory->options(FALSE);

		// SurgicalHistory
		$this->SurgicalHistory->EditAttrs["class"] = "form-control";
		$this->SurgicalHistory->EditCustomAttributes = "";
		if (!$this->SurgicalHistory->Raw)
			$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
		$this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

		// Generalexaminationpallor
		$this->Generalexaminationpallor->EditAttrs["class"] = "form-control";
		$this->Generalexaminationpallor->EditCustomAttributes = "";
		if (!$this->Generalexaminationpallor->Raw)
			$this->Generalexaminationpallor->CurrentValue = HtmlDecode($this->Generalexaminationpallor->CurrentValue);
		$this->Generalexaminationpallor->EditValue = $this->Generalexaminationpallor->CurrentValue;
		$this->Generalexaminationpallor->PlaceHolder = RemoveHtml($this->Generalexaminationpallor->caption());

		// PR
		$this->PR->EditAttrs["class"] = "form-control";
		$this->PR->EditCustomAttributes = "";
		if (!$this->PR->Raw)
			$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
		$this->PR->EditValue = $this->PR->CurrentValue;
		$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

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

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
		$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
		if (!$this->PROVISIONALDIAGNOSIS->Raw)
			$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
		$this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

		// Investigations
		$this->Investigations->EditAttrs["class"] = "form-control";
		$this->Investigations->EditCustomAttributes = "";
		if (!$this->Investigations->Raw)
			$this->Investigations->CurrentValue = HtmlDecode($this->Investigations->CurrentValue);
		$this->Investigations->EditValue = $this->Investigations->CurrentValue;
		$this->Investigations->PlaceHolder = RemoveHtml($this->Investigations->caption());

		// Fheight
		$this->Fheight->EditAttrs["class"] = "form-control";
		$this->Fheight->EditCustomAttributes = "";
		if (!$this->Fheight->Raw)
			$this->Fheight->CurrentValue = HtmlDecode($this->Fheight->CurrentValue);
		$this->Fheight->EditValue = $this->Fheight->CurrentValue;
		$this->Fheight->PlaceHolder = RemoveHtml($this->Fheight->caption());

		// Fweight
		$this->Fweight->EditAttrs["class"] = "form-control";
		$this->Fweight->EditCustomAttributes = "";
		if (!$this->Fweight->Raw)
			$this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
		$this->Fweight->EditValue = $this->Fweight->CurrentValue;
		$this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

		// FBMI
		$this->FBMI->EditAttrs["class"] = "form-control";
		$this->FBMI->EditCustomAttributes = "";
		if (!$this->FBMI->Raw)
			$this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
		$this->FBMI->EditValue = $this->FBMI->CurrentValue;
		$this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

		// FBloodgroup
		$this->FBloodgroup->EditAttrs["class"] = "form-control";
		$this->FBloodgroup->EditCustomAttributes = "";

		// Mheight
		$this->Mheight->EditAttrs["class"] = "form-control";
		$this->Mheight->EditCustomAttributes = "";
		if (!$this->Mheight->Raw)
			$this->Mheight->CurrentValue = HtmlDecode($this->Mheight->CurrentValue);
		$this->Mheight->EditValue = $this->Mheight->CurrentValue;
		$this->Mheight->PlaceHolder = RemoveHtml($this->Mheight->caption());

		// Mweight
		$this->Mweight->EditAttrs["class"] = "form-control";
		$this->Mweight->EditCustomAttributes = "";
		if (!$this->Mweight->Raw)
			$this->Mweight->CurrentValue = HtmlDecode($this->Mweight->CurrentValue);
		$this->Mweight->EditValue = $this->Mweight->CurrentValue;
		$this->Mweight->PlaceHolder = RemoveHtml($this->Mweight->caption());

		// MBMI
		$this->MBMI->EditAttrs["class"] = "form-control";
		$this->MBMI->EditCustomAttributes = "";
		if (!$this->MBMI->Raw)
			$this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
		$this->MBMI->EditValue = $this->MBMI->CurrentValue;
		$this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

		// MBloodgroup
		$this->MBloodgroup->EditAttrs["class"] = "form-control";
		$this->MBloodgroup->EditCustomAttributes = "";

		// FBuild
		$this->FBuild->EditCustomAttributes = "";
		$this->FBuild->EditValue = $this->FBuild->options(FALSE);

		// MBuild
		$this->MBuild->EditCustomAttributes = "";
		$this->MBuild->EditValue = $this->MBuild->options(FALSE);

		// FSkinColor
		$this->FSkinColor->EditCustomAttributes = "";
		$this->FSkinColor->EditValue = $this->FSkinColor->options(FALSE);

		// MSkinColor
		$this->MSkinColor->EditCustomAttributes = "";
		$this->MSkinColor->EditValue = $this->MSkinColor->options(FALSE);

		// FEyesColor
		$this->FEyesColor->EditCustomAttributes = "";
		$this->FEyesColor->EditValue = $this->FEyesColor->options(FALSE);

		// MEyesColor
		$this->MEyesColor->EditCustomAttributes = "";
		$this->MEyesColor->EditValue = $this->MEyesColor->options(FALSE);

		// FHairColor
		$this->FHairColor->EditCustomAttributes = "";
		$this->FHairColor->EditValue = $this->FHairColor->options(FALSE);

		// MhairColor
		$this->MhairColor->EditCustomAttributes = "";
		$this->MhairColor->EditValue = $this->MhairColor->options(FALSE);

		// FhairTexture
		$this->FhairTexture->EditCustomAttributes = "";
		$this->FhairTexture->EditValue = $this->FhairTexture->options(FALSE);

		// MHairTexture
		$this->MHairTexture->EditCustomAttributes = "";
		$this->MHairTexture->EditValue = $this->MHairTexture->options(FALSE);

		// Fothers
		$this->Fothers->EditAttrs["class"] = "form-control";
		$this->Fothers->EditCustomAttributes = "";
		if (!$this->Fothers->Raw)
			$this->Fothers->CurrentValue = HtmlDecode($this->Fothers->CurrentValue);
		$this->Fothers->EditValue = $this->Fothers->CurrentValue;
		$this->Fothers->PlaceHolder = RemoveHtml($this->Fothers->caption());

		// Mothers
		$this->Mothers->EditAttrs["class"] = "form-control";
		$this->Mothers->EditCustomAttributes = "";
		if (!$this->Mothers->Raw)
			$this->Mothers->CurrentValue = HtmlDecode($this->Mothers->CurrentValue);
		$this->Mothers->EditValue = $this->Mothers->CurrentValue;
		$this->Mothers->PlaceHolder = RemoveHtml($this->Mothers->caption());

		// PGE
		$this->PGE->EditAttrs["class"] = "form-control";
		$this->PGE->EditCustomAttributes = "";
		if (!$this->PGE->Raw)
			$this->PGE->CurrentValue = HtmlDecode($this->PGE->CurrentValue);
		$this->PGE->EditValue = $this->PGE->CurrentValue;
		$this->PGE->PlaceHolder = RemoveHtml($this->PGE->caption());

		// PPR
		$this->PPR->EditAttrs["class"] = "form-control";
		$this->PPR->EditCustomAttributes = "";
		if (!$this->PPR->Raw)
			$this->PPR->CurrentValue = HtmlDecode($this->PPR->CurrentValue);
		$this->PPR->EditValue = $this->PPR->CurrentValue;
		$this->PPR->PlaceHolder = RemoveHtml($this->PPR->caption());

		// PBP
		$this->PBP->EditAttrs["class"] = "form-control";
		$this->PBP->EditCustomAttributes = "";
		if (!$this->PBP->Raw)
			$this->PBP->CurrentValue = HtmlDecode($this->PBP->CurrentValue);
		$this->PBP->EditValue = $this->PBP->CurrentValue;
		$this->PBP->PlaceHolder = RemoveHtml($this->PBP->caption());

		// Breast
		$this->Breast->EditAttrs["class"] = "form-control";
		$this->Breast->EditCustomAttributes = "";
		if (!$this->Breast->Raw)
			$this->Breast->CurrentValue = HtmlDecode($this->Breast->CurrentValue);
		$this->Breast->EditValue = $this->Breast->CurrentValue;
		$this->Breast->PlaceHolder = RemoveHtml($this->Breast->caption());

		// PPA
		$this->PPA->EditAttrs["class"] = "form-control";
		$this->PPA->EditCustomAttributes = "";
		if (!$this->PPA->Raw)
			$this->PPA->CurrentValue = HtmlDecode($this->PPA->CurrentValue);
		$this->PPA->EditValue = $this->PPA->CurrentValue;
		$this->PPA->PlaceHolder = RemoveHtml($this->PPA->caption());

		// PPSV
		$this->PPSV->EditAttrs["class"] = "form-control";
		$this->PPSV->EditCustomAttributes = "";
		if (!$this->PPSV->Raw)
			$this->PPSV->CurrentValue = HtmlDecode($this->PPSV->CurrentValue);
		$this->PPSV->EditValue = $this->PPSV->CurrentValue;
		$this->PPSV->PlaceHolder = RemoveHtml($this->PPSV->caption());

		// PPAPSMEAR
		$this->PPAPSMEAR->EditAttrs["class"] = "form-control";
		$this->PPAPSMEAR->EditCustomAttributes = "";
		if (!$this->PPAPSMEAR->Raw)
			$this->PPAPSMEAR->CurrentValue = HtmlDecode($this->PPAPSMEAR->CurrentValue);
		$this->PPAPSMEAR->EditValue = $this->PPAPSMEAR->CurrentValue;
		$this->PPAPSMEAR->PlaceHolder = RemoveHtml($this->PPAPSMEAR->caption());

		// PTHYROID
		$this->PTHYROID->EditAttrs["class"] = "form-control";
		$this->PTHYROID->EditCustomAttributes = "";
		if (!$this->PTHYROID->Raw)
			$this->PTHYROID->CurrentValue = HtmlDecode($this->PTHYROID->CurrentValue);
		$this->PTHYROID->EditValue = $this->PTHYROID->CurrentValue;
		$this->PTHYROID->PlaceHolder = RemoveHtml($this->PTHYROID->caption());

		// MTHYROID
		$this->MTHYROID->EditAttrs["class"] = "form-control";
		$this->MTHYROID->EditCustomAttributes = "";
		if (!$this->MTHYROID->Raw)
			$this->MTHYROID->CurrentValue = HtmlDecode($this->MTHYROID->CurrentValue);
		$this->MTHYROID->EditValue = $this->MTHYROID->CurrentValue;
		$this->MTHYROID->PlaceHolder = RemoveHtml($this->MTHYROID->caption());

		// SecSexCharacters
		$this->SecSexCharacters->EditAttrs["class"] = "form-control";
		$this->SecSexCharacters->EditCustomAttributes = "";
		if (!$this->SecSexCharacters->Raw)
			$this->SecSexCharacters->CurrentValue = HtmlDecode($this->SecSexCharacters->CurrentValue);
		$this->SecSexCharacters->EditValue = $this->SecSexCharacters->CurrentValue;
		$this->SecSexCharacters->PlaceHolder = RemoveHtml($this->SecSexCharacters->caption());

		// PenisUM
		$this->PenisUM->EditAttrs["class"] = "form-control";
		$this->PenisUM->EditCustomAttributes = "";
		if (!$this->PenisUM->Raw)
			$this->PenisUM->CurrentValue = HtmlDecode($this->PenisUM->CurrentValue);
		$this->PenisUM->EditValue = $this->PenisUM->CurrentValue;
		$this->PenisUM->PlaceHolder = RemoveHtml($this->PenisUM->caption());

		// VAS
		$this->VAS->EditAttrs["class"] = "form-control";
		$this->VAS->EditCustomAttributes = "";
		if (!$this->VAS->Raw)
			$this->VAS->CurrentValue = HtmlDecode($this->VAS->CurrentValue);
		$this->VAS->EditValue = $this->VAS->CurrentValue;
		$this->VAS->PlaceHolder = RemoveHtml($this->VAS->caption());

		// EPIDIDYMIS
		$this->EPIDIDYMIS->EditAttrs["class"] = "form-control";
		$this->EPIDIDYMIS->EditCustomAttributes = "";
		if (!$this->EPIDIDYMIS->Raw)
			$this->EPIDIDYMIS->CurrentValue = HtmlDecode($this->EPIDIDYMIS->CurrentValue);
		$this->EPIDIDYMIS->EditValue = $this->EPIDIDYMIS->CurrentValue;
		$this->EPIDIDYMIS->PlaceHolder = RemoveHtml($this->EPIDIDYMIS->caption());

		// Varicocele
		$this->Varicocele->EditAttrs["class"] = "form-control";
		$this->Varicocele->EditCustomAttributes = "";
		if (!$this->Varicocele->Raw)
			$this->Varicocele->CurrentValue = HtmlDecode($this->Varicocele->CurrentValue);
		$this->Varicocele->EditValue = $this->Varicocele->CurrentValue;
		$this->Varicocele->PlaceHolder = RemoveHtml($this->Varicocele->caption());

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory->EditAttrs["class"] = "form-control";
		$this->FertilityTreatmentHistory->EditCustomAttributes = "";
		$this->FertilityTreatmentHistory->EditValue = $this->FertilityTreatmentHistory->CurrentValue;
		$this->FertilityTreatmentHistory->PlaceHolder = RemoveHtml($this->FertilityTreatmentHistory->caption());

		// SurgeryHistory
		$this->SurgeryHistory->EditAttrs["class"] = "form-control";
		$this->SurgeryHistory->EditCustomAttributes = "";
		$this->SurgeryHistory->EditValue = $this->SurgeryHistory->CurrentValue;
		$this->SurgeryHistory->PlaceHolder = RemoveHtml($this->SurgeryHistory->caption());

		// FamilyHistory
		$this->FamilyHistory->EditAttrs["class"] = "form-control";
		$this->FamilyHistory->EditCustomAttributes = "";
		if (!$this->FamilyHistory->Raw)
			$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
		$this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
		$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

		// PInvestigations
		$this->PInvestigations->EditAttrs["class"] = "form-control";
		$this->PInvestigations->EditCustomAttributes = "";
		$this->PInvestigations->EditValue = $this->PInvestigations->CurrentValue;
		$this->PInvestigations->PlaceHolder = RemoveHtml($this->PInvestigations->caption());

		// Addictions
		$this->Addictions->EditCustomAttributes = "";
		$this->Addictions->EditValue = $this->Addictions->options(FALSE);

		// Medications
		$this->Medications->EditAttrs["class"] = "form-control";
		$this->Medications->EditCustomAttributes = "";
		$this->Medications->EditValue = $this->Medications->CurrentValue;
		$this->Medications->PlaceHolder = RemoveHtml($this->Medications->caption());

		// Medical
		$this->Medical->EditAttrs["class"] = "form-control";
		$this->Medical->EditCustomAttributes = "";
		$this->Medical->EditValue = $this->Medical->options(TRUE);

		// Surgical
		$this->Surgical->EditAttrs["class"] = "form-control";
		$this->Surgical->EditCustomAttributes = "";
		if (!$this->Surgical->Raw)
			$this->Surgical->CurrentValue = HtmlDecode($this->Surgical->CurrentValue);
		$this->Surgical->EditValue = $this->Surgical->CurrentValue;
		$this->Surgical->PlaceHolder = RemoveHtml($this->Surgical->caption());

		// CoitalHistory
		$this->CoitalHistory->EditAttrs["class"] = "form-control";
		$this->CoitalHistory->EditCustomAttributes = "";
		if (!$this->CoitalHistory->Raw)
			$this->CoitalHistory->CurrentValue = HtmlDecode($this->CoitalHistory->CurrentValue);
		$this->CoitalHistory->EditValue = $this->CoitalHistory->CurrentValue;
		$this->CoitalHistory->PlaceHolder = RemoveHtml($this->CoitalHistory->caption());

		// SemenAnalysis
		$this->SemenAnalysis->EditAttrs["class"] = "form-control";
		$this->SemenAnalysis->EditCustomAttributes = "";
		$this->SemenAnalysis->EditValue = $this->SemenAnalysis->CurrentValue;
		$this->SemenAnalysis->PlaceHolder = RemoveHtml($this->SemenAnalysis->caption());

		// MInsvestications
		$this->MInsvestications->EditAttrs["class"] = "form-control";
		$this->MInsvestications->EditCustomAttributes = "";
		$this->MInsvestications->EditValue = $this->MInsvestications->CurrentValue;
		$this->MInsvestications->PlaceHolder = RemoveHtml($this->MInsvestications->caption());

		// PImpression
		$this->PImpression->EditAttrs["class"] = "form-control";
		$this->PImpression->EditCustomAttributes = "";
		$this->PImpression->EditValue = $this->PImpression->CurrentValue;
		$this->PImpression->PlaceHolder = RemoveHtml($this->PImpression->caption());

		// MIMpression
		$this->MIMpression->EditAttrs["class"] = "form-control";
		$this->MIMpression->EditCustomAttributes = "";
		$this->MIMpression->EditValue = $this->MIMpression->CurrentValue;
		$this->MIMpression->PlaceHolder = RemoveHtml($this->MIMpression->caption());

		// PPlanOfManagement
		$this->PPlanOfManagement->EditAttrs["class"] = "form-control";
		$this->PPlanOfManagement->EditCustomAttributes = "";
		$this->PPlanOfManagement->EditValue = $this->PPlanOfManagement->CurrentValue;
		$this->PPlanOfManagement->PlaceHolder = RemoveHtml($this->PPlanOfManagement->caption());

		// MPlanOfManagement
		$this->MPlanOfManagement->EditAttrs["class"] = "form-control";
		$this->MPlanOfManagement->EditCustomAttributes = "";
		$this->MPlanOfManagement->EditValue = $this->MPlanOfManagement->CurrentValue;
		$this->MPlanOfManagement->PlaceHolder = RemoveHtml($this->MPlanOfManagement->caption());

		// PReadMore
		$this->PReadMore->EditAttrs["class"] = "form-control";
		$this->PReadMore->EditCustomAttributes = "";
		$this->PReadMore->EditValue = $this->PReadMore->CurrentValue;
		$this->PReadMore->PlaceHolder = RemoveHtml($this->PReadMore->caption());

		// MReadMore
		$this->MReadMore->EditAttrs["class"] = "form-control";
		$this->MReadMore->EditCustomAttributes = "";
		$this->MReadMore->EditValue = $this->MReadMore->CurrentValue;
		$this->MReadMore->PlaceHolder = RemoveHtml($this->MReadMore->caption());

		// MariedFor
		$this->MariedFor->EditAttrs["class"] = "form-control";
		$this->MariedFor->EditCustomAttributes = "";
		if (!$this->MariedFor->Raw)
			$this->MariedFor->CurrentValue = HtmlDecode($this->MariedFor->CurrentValue);
		$this->MariedFor->EditValue = $this->MariedFor->CurrentValue;
		$this->MariedFor->PlaceHolder = RemoveHtml($this->MariedFor->caption());

		// CMNCM
		$this->CMNCM->EditAttrs["class"] = "form-control";
		$this->CMNCM->EditCustomAttributes = "";
		if (!$this->CMNCM->Raw)
			$this->CMNCM->CurrentValue = HtmlDecode($this->CMNCM->CurrentValue);
		$this->CMNCM->EditValue = $this->CMNCM->CurrentValue;
		$this->CMNCM->PlaceHolder = RemoveHtml($this->CMNCM->caption());

		// TemplateMenstrualHistory
		$this->TemplateMenstrualHistory->EditAttrs["class"] = "form-control";
		$this->TemplateMenstrualHistory->EditCustomAttributes = "";

		// TemplateObstetricHistory
		$this->TemplateObstetricHistory->EditAttrs["class"] = "form-control";
		$this->TemplateObstetricHistory->EditCustomAttributes = "";

		// TemplateFertilityTreatmentHistory
		$this->TemplateFertilityTreatmentHistory->EditAttrs["class"] = "form-control";
		$this->TemplateFertilityTreatmentHistory->EditCustomAttributes = "";

		// TemplateSurgeryHistory
		$this->TemplateSurgeryHistory->EditAttrs["class"] = "form-control";
		$this->TemplateSurgeryHistory->EditCustomAttributes = "";

		// TemplateFInvestigations
		$this->TemplateFInvestigations->EditAttrs["class"] = "form-control";
		$this->TemplateFInvestigations->EditCustomAttributes = "";

		// TemplatePlanOfManagement
		$this->TemplatePlanOfManagement->EditAttrs["class"] = "form-control";
		$this->TemplatePlanOfManagement->EditCustomAttributes = "";

		// TemplatePImpression
		$this->TemplatePImpression->EditAttrs["class"] = "form-control";
		$this->TemplatePImpression->EditCustomAttributes = "";

		// TemplateMedications
		$this->TemplateMedications->EditAttrs["class"] = "form-control";
		$this->TemplateMedications->EditCustomAttributes = "";

		// TemplateSemenAnalysis
		$this->TemplateSemenAnalysis->EditAttrs["class"] = "form-control";
		$this->TemplateSemenAnalysis->EditCustomAttributes = "";

		// MaleInsvestications
		$this->MaleInsvestications->EditAttrs["class"] = "form-control";
		$this->MaleInsvestications->EditCustomAttributes = "";

		// TemplateMIMpression
		$this->TemplateMIMpression->EditAttrs["class"] = "form-control";
		$this->TemplateMIMpression->EditCustomAttributes = "";

		// TemplateMalePlanOfManagement
		$this->TemplateMalePlanOfManagement->EditAttrs["class"] = "form-control";
		$this->TemplateMalePlanOfManagement->EditCustomAttributes = "";

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// pFamilyHistory
		$this->pFamilyHistory->EditAttrs["class"] = "form-control";
		$this->pFamilyHistory->EditCustomAttributes = "";
		if (!$this->pFamilyHistory->Raw)
			$this->pFamilyHistory->CurrentValue = HtmlDecode($this->pFamilyHistory->CurrentValue);
		$this->pFamilyHistory->EditValue = $this->pFamilyHistory->CurrentValue;
		$this->pFamilyHistory->PlaceHolder = RemoveHtml($this->pFamilyHistory->caption());

		// pTemplateMedications
		$this->pTemplateMedications->EditAttrs["class"] = "form-control";
		$this->pTemplateMedications->EditCustomAttributes = "";
		$this->pTemplateMedications->EditValue = $this->pTemplateMedications->CurrentValue;
		$this->pTemplateMedications->PlaceHolder = RemoveHtml($this->pTemplateMedications->caption());

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
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->DoublewitnessName1);
					$doc->exportCaption($this->DoublewitnessName2);
					$doc->exportCaption($this->Chiefcomplaints);
					$doc->exportCaption($this->MenstrualHistory);
					$doc->exportCaption($this->ObstetricHistory);
					$doc->exportCaption($this->MedicalHistory);
					$doc->exportCaption($this->SurgicalHistory);
					$doc->exportCaption($this->Generalexaminationpallor);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PROVISIONALDIAGNOSIS);
					$doc->exportCaption($this->Investigations);
					$doc->exportCaption($this->Fheight);
					$doc->exportCaption($this->Fweight);
					$doc->exportCaption($this->FBMI);
					$doc->exportCaption($this->FBloodgroup);
					$doc->exportCaption($this->Mheight);
					$doc->exportCaption($this->Mweight);
					$doc->exportCaption($this->MBMI);
					$doc->exportCaption($this->MBloodgroup);
					$doc->exportCaption($this->FBuild);
					$doc->exportCaption($this->MBuild);
					$doc->exportCaption($this->FSkinColor);
					$doc->exportCaption($this->MSkinColor);
					$doc->exportCaption($this->FEyesColor);
					$doc->exportCaption($this->MEyesColor);
					$doc->exportCaption($this->FHairColor);
					$doc->exportCaption($this->MhairColor);
					$doc->exportCaption($this->FhairTexture);
					$doc->exportCaption($this->MHairTexture);
					$doc->exportCaption($this->Fothers);
					$doc->exportCaption($this->Mothers);
					$doc->exportCaption($this->PGE);
					$doc->exportCaption($this->PPR);
					$doc->exportCaption($this->PBP);
					$doc->exportCaption($this->Breast);
					$doc->exportCaption($this->PPA);
					$doc->exportCaption($this->PPSV);
					$doc->exportCaption($this->PPAPSMEAR);
					$doc->exportCaption($this->PTHYROID);
					$doc->exportCaption($this->MTHYROID);
					$doc->exportCaption($this->SecSexCharacters);
					$doc->exportCaption($this->PenisUM);
					$doc->exportCaption($this->VAS);
					$doc->exportCaption($this->EPIDIDYMIS);
					$doc->exportCaption($this->Varicocele);
					$doc->exportCaption($this->FertilityTreatmentHistory);
					$doc->exportCaption($this->SurgeryHistory);
					$doc->exportCaption($this->FamilyHistory);
					$doc->exportCaption($this->PInvestigations);
					$doc->exportCaption($this->Addictions);
					$doc->exportCaption($this->Medications);
					$doc->exportCaption($this->Medical);
					$doc->exportCaption($this->Surgical);
					$doc->exportCaption($this->CoitalHistory);
					$doc->exportCaption($this->SemenAnalysis);
					$doc->exportCaption($this->MInsvestications);
					$doc->exportCaption($this->PImpression);
					$doc->exportCaption($this->MIMpression);
					$doc->exportCaption($this->PPlanOfManagement);
					$doc->exportCaption($this->MPlanOfManagement);
					$doc->exportCaption($this->PReadMore);
					$doc->exportCaption($this->MReadMore);
					$doc->exportCaption($this->MariedFor);
					$doc->exportCaption($this->CMNCM);
					$doc->exportCaption($this->TemplateMenstrualHistory);
					$doc->exportCaption($this->TemplateObstetricHistory);
					$doc->exportCaption($this->TemplateFertilityTreatmentHistory);
					$doc->exportCaption($this->TemplateSurgeryHistory);
					$doc->exportCaption($this->TemplateFInvestigations);
					$doc->exportCaption($this->TemplatePlanOfManagement);
					$doc->exportCaption($this->TemplatePImpression);
					$doc->exportCaption($this->TemplateMedications);
					$doc->exportCaption($this->TemplateSemenAnalysis);
					$doc->exportCaption($this->MaleInsvestications);
					$doc->exportCaption($this->TemplateMIMpression);
					$doc->exportCaption($this->TemplateMalePlanOfManagement);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->pFamilyHistory);
					$doc->exportCaption($this->pTemplateMedications);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->SEX);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->DoublewitnessName1);
					$doc->exportCaption($this->DoublewitnessName2);
					$doc->exportCaption($this->Chiefcomplaints);
					$doc->exportCaption($this->MenstrualHistory);
					$doc->exportCaption($this->ObstetricHistory);
					$doc->exportCaption($this->MedicalHistory);
					$doc->exportCaption($this->SurgicalHistory);
					$doc->exportCaption($this->Generalexaminationpallor);
					$doc->exportCaption($this->PR);
					$doc->exportCaption($this->CVS);
					$doc->exportCaption($this->PA);
					$doc->exportCaption($this->PROVISIONALDIAGNOSIS);
					$doc->exportCaption($this->Investigations);
					$doc->exportCaption($this->Fheight);
					$doc->exportCaption($this->Fweight);
					$doc->exportCaption($this->FBMI);
					$doc->exportCaption($this->FBloodgroup);
					$doc->exportCaption($this->Mheight);
					$doc->exportCaption($this->Mweight);
					$doc->exportCaption($this->MBMI);
					$doc->exportCaption($this->MBloodgroup);
					$doc->exportCaption($this->FBuild);
					$doc->exportCaption($this->MBuild);
					$doc->exportCaption($this->FSkinColor);
					$doc->exportCaption($this->MSkinColor);
					$doc->exportCaption($this->FEyesColor);
					$doc->exportCaption($this->MEyesColor);
					$doc->exportCaption($this->FHairColor);
					$doc->exportCaption($this->MhairColor);
					$doc->exportCaption($this->FhairTexture);
					$doc->exportCaption($this->MHairTexture);
					$doc->exportCaption($this->Fothers);
					$doc->exportCaption($this->Mothers);
					$doc->exportCaption($this->PGE);
					$doc->exportCaption($this->PPR);
					$doc->exportCaption($this->PBP);
					$doc->exportCaption($this->Breast);
					$doc->exportCaption($this->PPA);
					$doc->exportCaption($this->PPSV);
					$doc->exportCaption($this->PPAPSMEAR);
					$doc->exportCaption($this->PTHYROID);
					$doc->exportCaption($this->MTHYROID);
					$doc->exportCaption($this->SecSexCharacters);
					$doc->exportCaption($this->PenisUM);
					$doc->exportCaption($this->VAS);
					$doc->exportCaption($this->EPIDIDYMIS);
					$doc->exportCaption($this->Varicocele);
					$doc->exportCaption($this->FamilyHistory);
					$doc->exportCaption($this->Addictions);
					$doc->exportCaption($this->Medical);
					$doc->exportCaption($this->Surgical);
					$doc->exportCaption($this->CoitalHistory);
					$doc->exportCaption($this->MariedFor);
					$doc->exportCaption($this->CMNCM);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->pFamilyHistory);
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
						$doc->exportField($this->Religion);
						$doc->exportField($this->Address);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->DoublewitnessName1);
						$doc->exportField($this->DoublewitnessName2);
						$doc->exportField($this->Chiefcomplaints);
						$doc->exportField($this->MenstrualHistory);
						$doc->exportField($this->ObstetricHistory);
						$doc->exportField($this->MedicalHistory);
						$doc->exportField($this->SurgicalHistory);
						$doc->exportField($this->Generalexaminationpallor);
						$doc->exportField($this->PR);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PROVISIONALDIAGNOSIS);
						$doc->exportField($this->Investigations);
						$doc->exportField($this->Fheight);
						$doc->exportField($this->Fweight);
						$doc->exportField($this->FBMI);
						$doc->exportField($this->FBloodgroup);
						$doc->exportField($this->Mheight);
						$doc->exportField($this->Mweight);
						$doc->exportField($this->MBMI);
						$doc->exportField($this->MBloodgroup);
						$doc->exportField($this->FBuild);
						$doc->exportField($this->MBuild);
						$doc->exportField($this->FSkinColor);
						$doc->exportField($this->MSkinColor);
						$doc->exportField($this->FEyesColor);
						$doc->exportField($this->MEyesColor);
						$doc->exportField($this->FHairColor);
						$doc->exportField($this->MhairColor);
						$doc->exportField($this->FhairTexture);
						$doc->exportField($this->MHairTexture);
						$doc->exportField($this->Fothers);
						$doc->exportField($this->Mothers);
						$doc->exportField($this->PGE);
						$doc->exportField($this->PPR);
						$doc->exportField($this->PBP);
						$doc->exportField($this->Breast);
						$doc->exportField($this->PPA);
						$doc->exportField($this->PPSV);
						$doc->exportField($this->PPAPSMEAR);
						$doc->exportField($this->PTHYROID);
						$doc->exportField($this->MTHYROID);
						$doc->exportField($this->SecSexCharacters);
						$doc->exportField($this->PenisUM);
						$doc->exportField($this->VAS);
						$doc->exportField($this->EPIDIDYMIS);
						$doc->exportField($this->Varicocele);
						$doc->exportField($this->FertilityTreatmentHistory);
						$doc->exportField($this->SurgeryHistory);
						$doc->exportField($this->FamilyHistory);
						$doc->exportField($this->PInvestigations);
						$doc->exportField($this->Addictions);
						$doc->exportField($this->Medications);
						$doc->exportField($this->Medical);
						$doc->exportField($this->Surgical);
						$doc->exportField($this->CoitalHistory);
						$doc->exportField($this->SemenAnalysis);
						$doc->exportField($this->MInsvestications);
						$doc->exportField($this->PImpression);
						$doc->exportField($this->MIMpression);
						$doc->exportField($this->PPlanOfManagement);
						$doc->exportField($this->MPlanOfManagement);
						$doc->exportField($this->PReadMore);
						$doc->exportField($this->MReadMore);
						$doc->exportField($this->MariedFor);
						$doc->exportField($this->CMNCM);
						$doc->exportField($this->TemplateMenstrualHistory);
						$doc->exportField($this->TemplateObstetricHistory);
						$doc->exportField($this->TemplateFertilityTreatmentHistory);
						$doc->exportField($this->TemplateSurgeryHistory);
						$doc->exportField($this->TemplateFInvestigations);
						$doc->exportField($this->TemplatePlanOfManagement);
						$doc->exportField($this->TemplatePImpression);
						$doc->exportField($this->TemplateMedications);
						$doc->exportField($this->TemplateSemenAnalysis);
						$doc->exportField($this->MaleInsvestications);
						$doc->exportField($this->TemplateMIMpression);
						$doc->exportField($this->TemplateMalePlanOfManagement);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->pFamilyHistory);
						$doc->exportField($this->pTemplateMedications);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->SEX);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Address);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->DoublewitnessName1);
						$doc->exportField($this->DoublewitnessName2);
						$doc->exportField($this->Chiefcomplaints);
						$doc->exportField($this->MenstrualHistory);
						$doc->exportField($this->ObstetricHistory);
						$doc->exportField($this->MedicalHistory);
						$doc->exportField($this->SurgicalHistory);
						$doc->exportField($this->Generalexaminationpallor);
						$doc->exportField($this->PR);
						$doc->exportField($this->CVS);
						$doc->exportField($this->PA);
						$doc->exportField($this->PROVISIONALDIAGNOSIS);
						$doc->exportField($this->Investigations);
						$doc->exportField($this->Fheight);
						$doc->exportField($this->Fweight);
						$doc->exportField($this->FBMI);
						$doc->exportField($this->FBloodgroup);
						$doc->exportField($this->Mheight);
						$doc->exportField($this->Mweight);
						$doc->exportField($this->MBMI);
						$doc->exportField($this->MBloodgroup);
						$doc->exportField($this->FBuild);
						$doc->exportField($this->MBuild);
						$doc->exportField($this->FSkinColor);
						$doc->exportField($this->MSkinColor);
						$doc->exportField($this->FEyesColor);
						$doc->exportField($this->MEyesColor);
						$doc->exportField($this->FHairColor);
						$doc->exportField($this->MhairColor);
						$doc->exportField($this->FhairTexture);
						$doc->exportField($this->MHairTexture);
						$doc->exportField($this->Fothers);
						$doc->exportField($this->Mothers);
						$doc->exportField($this->PGE);
						$doc->exportField($this->PPR);
						$doc->exportField($this->PBP);
						$doc->exportField($this->Breast);
						$doc->exportField($this->PPA);
						$doc->exportField($this->PPSV);
						$doc->exportField($this->PPAPSMEAR);
						$doc->exportField($this->PTHYROID);
						$doc->exportField($this->MTHYROID);
						$doc->exportField($this->SecSexCharacters);
						$doc->exportField($this->PenisUM);
						$doc->exportField($this->VAS);
						$doc->exportField($this->EPIDIDYMIS);
						$doc->exportField($this->Varicocele);
						$doc->exportField($this->FamilyHistory);
						$doc->exportField($this->Addictions);
						$doc->exportField($this->Medical);
						$doc->exportField($this->Surgical);
						$doc->exportField($this->CoitalHistory);
						$doc->exportField($this->MariedFor);
						$doc->exportField($this->CMNCM);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->pFamilyHistory);
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

			$rsnew["RIDNO"] = $_POST["ivfRIDNO"];
				$rsnew["Name"] = $_POST["ivfName"];
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