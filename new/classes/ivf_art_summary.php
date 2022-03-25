<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_art_summary
 */
class ivf_art_summary extends DbTable
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
	public $ARTCycle;
	public $Spermorigin;
	public $IndicationforART;
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
	public $NumberofEmbryostransferred;
	public $Embryosunderobservation;
	public $EmbryoDevelopmentSummary;
	public $EmbryologistSignature;
	public $IVFRegistrationID;
	public $InseminatinTechnique;
	public $ICSIDetails;
	public $DateofET;
	public $Reasonfornotranfer;
	public $EmbryosCryopreserved;
	public $LegendCellStage;
	public $ConsultantsSignature;
	public $Name;
	public $M2;
	public $Mi2;
	public $ICSI;
	public $IVF;
	public $M1;
	public $GV;
	public $Others;
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_art_summary';
		$this->TableName = 'ivf_art_summary';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_art_summary`";
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
		$this->id = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// ARTCycle
		$this->ARTCycle = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, FALSE, '`ARTCycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ARTCycle->Sortable = TRUE; // Allow sort
		$this->ARTCycle->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ARTCycle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ARTCycle->Lookup = new Lookup('ARTCycle', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ARTCycle->OptionCount = 9;
		$this->fields['ARTCycle'] = &$this->ARTCycle;

		// Spermorigin
		$this->Spermorigin = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Spermorigin', 'Spermorigin', '`Spermorigin`', '`Spermorigin`', 200, 45, -1, FALSE, '`Spermorigin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Spermorigin->Sortable = TRUE; // Allow sort
		$this->Spermorigin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Spermorigin->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Spermorigin->Lookup = new Lookup('Spermorigin', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Spermorigin->OptionCount = 2;
		$this->fields['Spermorigin'] = &$this->Spermorigin;

		// IndicationforART
		$this->IndicationforART = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IndicationforART', 'IndicationforART', '`IndicationforART`', '`IndicationforART`', 200, 45, -1, FALSE, '`IndicationforART`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IndicationforART->Sortable = TRUE; // Allow sort
		$this->fields['IndicationforART'] = &$this->IndicationforART;

		// DateofICSI
		$this->DateofICSI = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_DateofICSI', 'DateofICSI', '`DateofICSI`', CastDateFieldForLike("`DateofICSI`", 7, "DB"), 135, 19, 7, FALSE, '`DateofICSI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateofICSI->Sortable = TRUE; // Allow sort
		$this->DateofICSI->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DateofICSI'] = &$this->DateofICSI;

		// Origin
		$this->Origin = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, FALSE, '`Origin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Origin->Sortable = TRUE; // Allow sort
		$this->Origin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Origin->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Origin->Lookup = new Lookup('Origin', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Origin->OptionCount = 3;
		$this->fields['Origin'] = &$this->Origin;

		// Status
		$this->Status = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Status', 'Status', '`Status`', '`Status`', 200, 45, -1, FALSE, '`Status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Status->Sortable = TRUE; // Allow sort
		$this->Status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Status->Lookup = new Lookup('Status', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Status->OptionCount = 3;
		$this->fields['Status'] = &$this->Status;

		// Method
		$this->Method = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Method->Sortable = TRUE; // Allow sort
		$this->Method->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Method->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Method->Lookup = new Lookup('Method', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Method->OptionCount = 2;
		$this->fields['Method'] = &$this->Method;

		// pre_Concentration
		$this->pre_Concentration = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Concentration', 'pre_Concentration', '`pre_Concentration`', '`pre_Concentration`', 200, 45, -1, FALSE, '`pre_Concentration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pre_Concentration->Sortable = TRUE; // Allow sort
		$this->fields['pre_Concentration'] = &$this->pre_Concentration;

		// pre_Motility
		$this->pre_Motility = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Motility', 'pre_Motility', '`pre_Motility`', '`pre_Motility`', 200, 45, -1, FALSE, '`pre_Motility`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pre_Motility->Sortable = TRUE; // Allow sort
		$this->fields['pre_Motility'] = &$this->pre_Motility;

		// pre_Morphology
		$this->pre_Morphology = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_pre_Morphology', 'pre_Morphology', '`pre_Morphology`', '`pre_Morphology`', 200, 45, -1, FALSE, '`pre_Morphology`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pre_Morphology->Sortable = TRUE; // Allow sort
		$this->fields['pre_Morphology'] = &$this->pre_Morphology;

		// post_Concentration
		$this->post_Concentration = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Concentration', 'post_Concentration', '`post_Concentration`', '`post_Concentration`', 200, 45, -1, FALSE, '`post_Concentration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->post_Concentration->Sortable = TRUE; // Allow sort
		$this->fields['post_Concentration'] = &$this->post_Concentration;

		// post_Motility
		$this->post_Motility = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Motility', 'post_Motility', '`post_Motility`', '`post_Motility`', 200, 45, -1, FALSE, '`post_Motility`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->post_Motility->Sortable = TRUE; // Allow sort
		$this->fields['post_Motility'] = &$this->post_Motility;

		// post_Morphology
		$this->post_Morphology = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_post_Morphology', 'post_Morphology', '`post_Morphology`', '`post_Morphology`', 200, 45, -1, FALSE, '`post_Morphology`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->post_Morphology->Sortable = TRUE; // Allow sort
		$this->fields['post_Morphology'] = &$this->post_Morphology;

		// NumberofEmbryostransferred
		$this->NumberofEmbryostransferred = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NumberofEmbryostransferred', 'NumberofEmbryostransferred', '`NumberofEmbryostransferred`', '`NumberofEmbryostransferred`', 200, 45, -1, FALSE, '`NumberofEmbryostransferred`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NumberofEmbryostransferred->Sortable = TRUE; // Allow sort
		$this->fields['NumberofEmbryostransferred'] = &$this->NumberofEmbryostransferred;

		// Embryosunderobservation
		$this->Embryosunderobservation = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Embryosunderobservation', 'Embryosunderobservation', '`Embryosunderobservation`', '`Embryosunderobservation`', 200, 45, -1, FALSE, '`Embryosunderobservation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Embryosunderobservation->Sortable = TRUE; // Allow sort
		$this->fields['Embryosunderobservation'] = &$this->Embryosunderobservation;

		// EmbryoDevelopmentSummary
		$this->EmbryoDevelopmentSummary = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryoDevelopmentSummary', 'EmbryoDevelopmentSummary', '`EmbryoDevelopmentSummary`', '`EmbryoDevelopmentSummary`', 200, 45, -1, FALSE, '`EmbryoDevelopmentSummary`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EmbryoDevelopmentSummary->Sortable = TRUE; // Allow sort
		$this->fields['EmbryoDevelopmentSummary'] = &$this->EmbryoDevelopmentSummary;

		// EmbryologistSignature
		$this->EmbryologistSignature = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryologistSignature', 'EmbryologistSignature', '`EmbryologistSignature`', '`EmbryologistSignature`', 200, 45, -1, FALSE, '`EmbryologistSignature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EmbryologistSignature->Sortable = TRUE; // Allow sort
		$this->fields['EmbryologistSignature'] = &$this->EmbryologistSignature;

		// IVFRegistrationID
		$this->IVFRegistrationID = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IVFRegistrationID', 'IVFRegistrationID', '`IVFRegistrationID`', '`IVFRegistrationID`', 3, 11, -1, FALSE, '`IVFRegistrationID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IVFRegistrationID->Nullable = FALSE; // NOT NULL field
		$this->IVFRegistrationID->Required = TRUE; // Required field
		$this->IVFRegistrationID->Sortable = TRUE; // Allow sort
		$this->IVFRegistrationID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['IVFRegistrationID'] = &$this->IVFRegistrationID;

		// InseminatinTechnique
		$this->InseminatinTechnique = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, FALSE, '`InseminatinTechnique`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->InseminatinTechnique->Sortable = TRUE; // Allow sort
		$this->InseminatinTechnique->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->InseminatinTechnique->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->InseminatinTechnique->Lookup = new Lookup('InseminatinTechnique', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->InseminatinTechnique->OptionCount = 2;
		$this->fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

		// ICSIDetails
		$this->ICSIDetails = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ICSIDetails', 'ICSIDetails', '`ICSIDetails`', '`ICSIDetails`', 200, 45, -1, FALSE, '`ICSIDetails`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ICSIDetails->Sortable = TRUE; // Allow sort
		$this->fields['ICSIDetails'] = &$this->ICSIDetails;

		// DateofET
		$this->DateofET = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_DateofET', 'DateofET', '`DateofET`', '`DateofET`', 200, 45, -1, FALSE, '`DateofET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DateofET->Sortable = TRUE; // Allow sort
		$this->DateofET->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DateofET->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DateofET->Lookup = new Lookup('DateofET', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->DateofET->OptionCount = 4;
		$this->fields['DateofET'] = &$this->DateofET;

		// Reasonfornotranfer
		$this->Reasonfornotranfer = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Reasonfornotranfer', 'Reasonfornotranfer', '`Reasonfornotranfer`', '`Reasonfornotranfer`', 200, 45, -1, FALSE, '`Reasonfornotranfer`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Reasonfornotranfer->Sortable = TRUE; // Allow sort
		$this->Reasonfornotranfer->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Reasonfornotranfer->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Reasonfornotranfer->Lookup = new Lookup('Reasonfornotranfer', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Reasonfornotranfer->OptionCount = 6;
		$this->fields['Reasonfornotranfer'] = &$this->Reasonfornotranfer;

		// EmbryosCryopreserved
		$this->EmbryosCryopreserved = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_EmbryosCryopreserved', 'EmbryosCryopreserved', '`EmbryosCryopreserved`', '`EmbryosCryopreserved`', 200, 45, -1, FALSE, '`EmbryosCryopreserved`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EmbryosCryopreserved->Sortable = TRUE; // Allow sort
		$this->fields['EmbryosCryopreserved'] = &$this->EmbryosCryopreserved;

		// LegendCellStage
		$this->LegendCellStage = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_LegendCellStage', 'LegendCellStage', '`LegendCellStage`', '`LegendCellStage`', 200, 45, -1, FALSE, '`LegendCellStage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LegendCellStage->Sortable = TRUE; // Allow sort
		$this->fields['LegendCellStage'] = &$this->LegendCellStage;

		// ConsultantsSignature
		$this->ConsultantsSignature = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ConsultantsSignature', 'ConsultantsSignature', '`ConsultantsSignature`', '`ConsultantsSignature`', 200, 45, -1, FALSE, '`ConsultantsSignature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ConsultantsSignature->Sortable = TRUE; // Allow sort
		$this->ConsultantsSignature->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ConsultantsSignature->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ConsultantsSignature->Lookup = new Lookup('ConsultantsSignature', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ConsultantsSignature'] = &$this->ConsultantsSignature;

		// Name
		$this->Name = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// M2
		$this->M2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_M2', 'M2', '`M2`', '`M2`', 200, 45, -1, FALSE, '`M2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M2->Sortable = TRUE; // Allow sort
		$this->fields['M2'] = &$this->M2;

		// Mi2
		$this->Mi2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Mi2', 'Mi2', '`Mi2`', '`Mi2`', 200, 45, -1, FALSE, '`Mi2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mi2->Sortable = TRUE; // Allow sort
		$this->fields['Mi2'] = &$this->Mi2;

		// ICSI
		$this->ICSI = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_ICSI', 'ICSI', '`ICSI`', '`ICSI`', 200, 45, -1, FALSE, '`ICSI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ICSI->Sortable = TRUE; // Allow sort
		$this->fields['ICSI'] = &$this->ICSI;

		// IVF
		$this->IVF = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_IVF', 'IVF', '`IVF`', '`IVF`', 200, 45, -1, FALSE, '`IVF`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IVF->Sortable = TRUE; // Allow sort
		$this->fields['IVF'] = &$this->IVF;

		// M1
		$this->M1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_M1', 'M1', '`M1`', '`M1`', 200, 45, -1, FALSE, '`M1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M1->Sortable = TRUE; // Allow sort
		$this->fields['M1'] = &$this->M1;

		// GV
		$this->GV = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_GV', 'GV', '`GV`', '`GV`', 200, 45, -1, FALSE, '`GV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GV->Sortable = TRUE; // Allow sort
		$this->fields['GV'] = &$this->GV;

		// Others
		$this->Others = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Others', 'Others', '`Others`', '`Others`', 200, 45, -1, FALSE, '`Others`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Others->Sortable = TRUE; // Allow sort
		$this->fields['Others'] = &$this->Others;

		// Normal2PN
		$this->Normal2PN = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Normal2PN', 'Normal2PN', '`Normal2PN`', '`Normal2PN`', 200, 45, -1, FALSE, '`Normal2PN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Normal2PN->Sortable = TRUE; // Allow sort
		$this->fields['Normal2PN'] = &$this->Normal2PN;

		// Abnormalfertilisation1N
		$this->Abnormalfertilisation1N = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Abnormalfertilisation1N', 'Abnormalfertilisation1N', '`Abnormalfertilisation1N`', '`Abnormalfertilisation1N`', 200, 45, -1, FALSE, '`Abnormalfertilisation1N`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormalfertilisation1N->Sortable = TRUE; // Allow sort
		$this->fields['Abnormalfertilisation1N'] = &$this->Abnormalfertilisation1N;

		// Abnormalfertilisation3N
		$this->Abnormalfertilisation3N = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Abnormalfertilisation3N', 'Abnormalfertilisation3N', '`Abnormalfertilisation3N`', '`Abnormalfertilisation3N`', 200, 45, -1, FALSE, '`Abnormalfertilisation3N`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormalfertilisation3N->Sortable = TRUE; // Allow sort
		$this->fields['Abnormalfertilisation3N'] = &$this->Abnormalfertilisation3N;

		// NotFertilized
		$this->NotFertilized = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotFertilized', 'NotFertilized', '`NotFertilized`', '`NotFertilized`', 200, 45, -1, FALSE, '`NotFertilized`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NotFertilized->Sortable = TRUE; // Allow sort
		$this->fields['NotFertilized'] = &$this->NotFertilized;

		// Degenerated
		$this->Degenerated = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Degenerated', 'Degenerated', '`Degenerated`', '`Degenerated`', 200, 45, -1, FALSE, '`Degenerated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Degenerated->Sortable = TRUE; // Allow sort
		$this->fields['Degenerated'] = &$this->Degenerated;

		// SpermDate
		$this->SpermDate = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_SpermDate', 'SpermDate', '`SpermDate`', CastDateFieldForLike("`SpermDate`", 0, "DB"), 135, 19, 0, FALSE, '`SpermDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SpermDate->Sortable = TRUE; // Allow sort
		$this->SpermDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SpermDate'] = &$this->SpermDate;

		// Code1
		$this->Code1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code1', 'Code1', '`Code1`', '`Code1`', 200, 45, -1, FALSE, '`Code1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code1->Sortable = TRUE; // Allow sort
		$this->fields['Code1'] = &$this->Code1;

		// Day1
		$this->Day1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day1', 'Day1', '`Day1`', '`Day1`', 200, 45, -1, FALSE, '`Day1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day1->Sortable = TRUE; // Allow sort
		$this->Day1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day1->Lookup = new Lookup('Day1', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day1->OptionCount = 3;
		$this->fields['Day1'] = &$this->Day1;

		// CellStage1
		$this->CellStage1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage1', 'CellStage1', '`CellStage1`', '`CellStage1`', 200, 45, -1, FALSE, '`CellStage1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CellStage1->Sortable = TRUE; // Allow sort
		$this->CellStage1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CellStage1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CellStage1->Lookup = new Lookup('CellStage1', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CellStage1->OptionCount = 5;
		$this->fields['CellStage1'] = &$this->CellStage1;

		// Grade1
		$this->Grade1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade1', 'Grade1', '`Grade1`', '`Grade1`', 200, 45, -1, FALSE, '`Grade1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade1->Sortable = TRUE; // Allow sort
		$this->Grade1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade1->Lookup = new Lookup('Grade1', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade1->OptionCount = 3;
		$this->fields['Grade1'] = &$this->Grade1;

		// State1
		$this->State1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State1', 'State1', '`State1`', '`State1`', 200, 45, -1, FALSE, '`State1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State1->Sortable = TRUE; // Allow sort
		$this->State1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->State1->Lookup = new Lookup('State1', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State1->OptionCount = 2;
		$this->fields['State1'] = &$this->State1;

		// Code2
		$this->Code2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code2', 'Code2', '`Code2`', '`Code2`', 200, 45, -1, FALSE, '`Code2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code2->Sortable = TRUE; // Allow sort
		$this->fields['Code2'] = &$this->Code2;

		// Day2
		$this->Day2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day2', 'Day2', '`Day2`', '`Day2`', 200, 45, -1, FALSE, '`Day2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day2->Sortable = TRUE; // Allow sort
		$this->Day2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day2->Lookup = new Lookup('Day2', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day2->OptionCount = 3;
		$this->fields['Day2'] = &$this->Day2;

		// CellStage2
		$this->CellStage2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage2', 'CellStage2', '`CellStage2`', '`CellStage2`', 200, 45, -1, FALSE, '`CellStage2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CellStage2->Sortable = TRUE; // Allow sort
		$this->CellStage2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CellStage2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CellStage2->Lookup = new Lookup('CellStage2', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CellStage2->OptionCount = 5;
		$this->fields['CellStage2'] = &$this->CellStage2;

		// Grade2
		$this->Grade2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade2', 'Grade2', '`Grade2`', '`Grade2`', 200, 45, -1, FALSE, '`Grade2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade2->Sortable = TRUE; // Allow sort
		$this->Grade2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade2->Lookup = new Lookup('Grade2', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade2->OptionCount = 3;
		$this->fields['Grade2'] = &$this->Grade2;

		// State2
		$this->State2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State2', 'State2', '`State2`', '`State2`', 200, 45, -1, FALSE, '`State2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State2->Sortable = TRUE; // Allow sort
		$this->State2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->State2->Lookup = new Lookup('State2', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State2->OptionCount = 2;
		$this->fields['State2'] = &$this->State2;

		// Code3
		$this->Code3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code3', 'Code3', '`Code3`', '`Code3`', 200, 45, -1, FALSE, '`Code3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code3->Sortable = TRUE; // Allow sort
		$this->fields['Code3'] = &$this->Code3;

		// Day3
		$this->Day3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day3', 'Day3', '`Day3`', '`Day3`', 200, 45, -1, FALSE, '`Day3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day3->Sortable = TRUE; // Allow sort
		$this->Day3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day3->Lookup = new Lookup('Day3', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day3->OptionCount = 3;
		$this->fields['Day3'] = &$this->Day3;

		// CellStage3
		$this->CellStage3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage3', 'CellStage3', '`CellStage3`', '`CellStage3`', 200, 45, -1, FALSE, '`CellStage3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CellStage3->Sortable = TRUE; // Allow sort
		$this->CellStage3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CellStage3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CellStage3->Lookup = new Lookup('CellStage3', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CellStage3->OptionCount = 5;
		$this->fields['CellStage3'] = &$this->CellStage3;

		// Grade3
		$this->Grade3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade3', 'Grade3', '`Grade3`', '`Grade3`', 200, 45, -1, FALSE, '`Grade3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade3->Sortable = TRUE; // Allow sort
		$this->Grade3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade3->Lookup = new Lookup('Grade3', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade3->OptionCount = 3;
		$this->fields['Grade3'] = &$this->Grade3;

		// State3
		$this->State3 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State3', 'State3', '`State3`', '`State3`', 200, 45, -1, FALSE, '`State3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State3->Sortable = TRUE; // Allow sort
		$this->State3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->State3->Lookup = new Lookup('State3', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State3->OptionCount = 2;
		$this->fields['State3'] = &$this->State3;

		// Code4
		$this->Code4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code4', 'Code4', '`Code4`', '`Code4`', 200, 45, -1, FALSE, '`Code4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code4->Sortable = TRUE; // Allow sort
		$this->fields['Code4'] = &$this->Code4;

		// Day4
		$this->Day4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day4', 'Day4', '`Day4`', '`Day4`', 200, 45, -1, FALSE, '`Day4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day4->Sortable = TRUE; // Allow sort
		$this->Day4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day4->Lookup = new Lookup('Day4', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day4->OptionCount = 3;
		$this->fields['Day4'] = &$this->Day4;

		// CellStage4
		$this->CellStage4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage4', 'CellStage4', '`CellStage4`', '`CellStage4`', 200, 45, -1, FALSE, '`CellStage4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CellStage4->Sortable = TRUE; // Allow sort
		$this->CellStage4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CellStage4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CellStage4->Lookup = new Lookup('CellStage4', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CellStage4->OptionCount = 5;
		$this->fields['CellStage4'] = &$this->CellStage4;

		// Grade4
		$this->Grade4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade4', 'Grade4', '`Grade4`', '`Grade4`', 200, 45, -1, FALSE, '`Grade4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade4->Sortable = TRUE; // Allow sort
		$this->Grade4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade4->Lookup = new Lookup('Grade4', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade4->OptionCount = 3;
		$this->fields['Grade4'] = &$this->Grade4;

		// State4
		$this->State4 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State4', 'State4', '`State4`', '`State4`', 200, 45, -1, FALSE, '`State4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State4->Sortable = TRUE; // Allow sort
		$this->State4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->State4->Lookup = new Lookup('State4', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State4->OptionCount = 2;
		$this->fields['State4'] = &$this->State4;

		// Code5
		$this->Code5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Code5', 'Code5', '`Code5`', '`Code5`', 200, 45, -1, FALSE, '`Code5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code5->Sortable = TRUE; // Allow sort
		$this->fields['Code5'] = &$this->Code5;

		// Day5
		$this->Day5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Day5', 'Day5', '`Day5`', '`Day5`', 200, 45, -1, FALSE, '`Day5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Day5->Sortable = TRUE; // Allow sort
		$this->Day5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Day5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Day5->Lookup = new Lookup('Day5', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Day5->OptionCount = 3;
		$this->fields['Day5'] = &$this->Day5;

		// CellStage5
		$this->CellStage5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_CellStage5', 'CellStage5', '`CellStage5`', '`CellStage5`', 200, 45, -1, FALSE, '`CellStage5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CellStage5->Sortable = TRUE; // Allow sort
		$this->CellStage5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CellStage5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CellStage5->Lookup = new Lookup('CellStage5', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CellStage5->OptionCount = 5;
		$this->fields['CellStage5'] = &$this->CellStage5;

		// Grade5
		$this->Grade5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Grade5', 'Grade5', '`Grade5`', '`Grade5`', 200, 45, -1, FALSE, '`Grade5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Grade5->Sortable = TRUE; // Allow sort
		$this->Grade5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Grade5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Grade5->Lookup = new Lookup('Grade5', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Grade5->OptionCount = 3;
		$this->fields['Grade5'] = &$this->Grade5;

		// State5
		$this->State5 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_State5', 'State5', '`State5`', '`State5`', 200, 45, -1, FALSE, '`State5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->State5->Sortable = TRUE; // Allow sort
		$this->State5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->State5->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->State5->Lookup = new Lookup('State5', 'ivf_art_summary', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->State5->OptionCount = 2;
		$this->fields['State5'] = &$this->State5;

		// TidNo
		$this->TidNo = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// RIDNo
		$this->RIDNo = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// Volume
		$this->Volume = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 200, 45, -1, FALSE, '`Volume`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume->Sortable = TRUE; // Allow sort
		$this->fields['Volume'] = &$this->Volume;

		// Volume1
		$this->Volume1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume1', 'Volume1', '`Volume1`', '`Volume1`', 200, 45, -1, FALSE, '`Volume1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume1->Sortable = TRUE; // Allow sort
		$this->fields['Volume1'] = &$this->Volume1;

		// Volume2
		$this->Volume2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Volume2', 'Volume2', '`Volume2`', '`Volume2`', 200, 45, -1, FALSE, '`Volume2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume2->Sortable = TRUE; // Allow sort
		$this->fields['Volume2'] = &$this->Volume2;

		// Concentration2
		$this->Concentration2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Concentration2', 'Concentration2', '`Concentration2`', '`Concentration2`', 200, 45, -1, FALSE, '`Concentration2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration2->Sortable = TRUE; // Allow sort
		$this->fields['Concentration2'] = &$this->Concentration2;

		// Total
		$this->Total = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total', 'Total', '`Total`', '`Total`', 200, 45, -1, FALSE, '`Total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total->Sortable = TRUE; // Allow sort
		$this->fields['Total'] = &$this->Total;

		// Total1
		$this->Total1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total1', 'Total1', '`Total1`', '`Total1`', 200, 45, -1, FALSE, '`Total1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total1->Sortable = TRUE; // Allow sort
		$this->fields['Total1'] = &$this->Total1;

		// Total2
		$this->Total2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Total2', 'Total2', '`Total2`', '`Total2`', 200, 45, -1, FALSE, '`Total2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total2->Sortable = TRUE; // Allow sort
		$this->fields['Total2'] = &$this->Total2;

		// Progressive
		$this->Progressive = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive', 'Progressive', '`Progressive`', '`Progressive`', 200, 45, -1, FALSE, '`Progressive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Progressive->Sortable = TRUE; // Allow sort
		$this->fields['Progressive'] = &$this->Progressive;

		// Progressive1
		$this->Progressive1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive1', 'Progressive1', '`Progressive1`', '`Progressive1`', 200, 45, -1, FALSE, '`Progressive1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Progressive1->Sortable = TRUE; // Allow sort
		$this->fields['Progressive1'] = &$this->Progressive1;

		// Progressive2
		$this->Progressive2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Progressive2', 'Progressive2', '`Progressive2`', '`Progressive2`', 200, 45, -1, FALSE, '`Progressive2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Progressive2->Sortable = TRUE; // Allow sort
		$this->fields['Progressive2'] = &$this->Progressive2;

		// NotProgressive
		$this->NotProgressive = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive', 'NotProgressive', '`NotProgressive`', '`NotProgressive`', 200, 45, -1, FALSE, '`NotProgressive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NotProgressive->Sortable = TRUE; // Allow sort
		$this->fields['NotProgressive'] = &$this->NotProgressive;

		// NotProgressive1
		$this->NotProgressive1 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive1', 'NotProgressive1', '`NotProgressive1`', '`NotProgressive1`', 200, 45, -1, FALSE, '`NotProgressive1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NotProgressive1->Sortable = TRUE; // Allow sort
		$this->fields['NotProgressive1'] = &$this->NotProgressive1;

		// NotProgressive2
		$this->NotProgressive2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_NotProgressive2', 'NotProgressive2', '`NotProgressive2`', '`NotProgressive2`', 200, 45, -1, FALSE, '`NotProgressive2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NotProgressive2->Sortable = TRUE; // Allow sort
		$this->fields['NotProgressive2'] = &$this->NotProgressive2;

		// Motility2
		$this->Motility2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Motility2', 'Motility2', '`Motility2`', '`Motility2`', 200, 45, -1, FALSE, '`Motility2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Motility2->Sortable = TRUE; // Allow sort
		$this->fields['Motility2'] = &$this->Motility2;

		// Morphology2
		$this->Morphology2 = new DbField('ivf_art_summary', 'ivf_art_summary', 'x_Morphology2', 'Morphology2', '`Morphology2`', '`Morphology2`', 200, 45, -1, FALSE, '`Morphology2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Morphology2->Sortable = TRUE; // Allow sort
		$this->fields['Morphology2'] = &$this->Morphology2;
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$this->ARTCycle->DbValue = $row['ARTCycle'];
		$this->Spermorigin->DbValue = $row['Spermorigin'];
		$this->IndicationforART->DbValue = $row['IndicationforART'];
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
		$this->NumberofEmbryostransferred->DbValue = $row['NumberofEmbryostransferred'];
		$this->Embryosunderobservation->DbValue = $row['Embryosunderobservation'];
		$this->EmbryoDevelopmentSummary->DbValue = $row['EmbryoDevelopmentSummary'];
		$this->EmbryologistSignature->DbValue = $row['EmbryologistSignature'];
		$this->IVFRegistrationID->DbValue = $row['IVFRegistrationID'];
		$this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
		$this->ICSIDetails->DbValue = $row['ICSIDetails'];
		$this->DateofET->DbValue = $row['DateofET'];
		$this->Reasonfornotranfer->DbValue = $row['Reasonfornotranfer'];
		$this->EmbryosCryopreserved->DbValue = $row['EmbryosCryopreserved'];
		$this->LegendCellStage->DbValue = $row['LegendCellStage'];
		$this->ConsultantsSignature->DbValue = $row['ConsultantsSignature'];
		$this->Name->DbValue = $row['Name'];
		$this->M2->DbValue = $row['M2'];
		$this->Mi2->DbValue = $row['Mi2'];
		$this->ICSI->DbValue = $row['ICSI'];
		$this->IVF->DbValue = $row['IVF'];
		$this->M1->DbValue = $row['M1'];
		$this->GV->DbValue = $row['GV'];
		$this->Others->DbValue = $row['Others'];
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
			return "ivf_art_summarylist.php";
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
		if ($pageName == "ivf_art_summaryview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_art_summaryedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_art_summaryadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_art_summarylist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_art_summaryview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_art_summaryview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_art_summaryadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_art_summaryadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_art_summaryedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_art_summaryadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_art_summarydelete.php", $this->getUrlParm());
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
		$this->ARTCycle->setDbValue($rs->fields('ARTCycle'));
		$this->Spermorigin->setDbValue($rs->fields('Spermorigin'));
		$this->IndicationforART->setDbValue($rs->fields('IndicationforART'));
		$this->DateofICSI->setDbValue($rs->fields('DateofICSI'));
		$this->Origin->setDbValue($rs->fields('Origin'));
		$this->Status->setDbValue($rs->fields('Status'));
		$this->Method->setDbValue($rs->fields('Method'));
		$this->pre_Concentration->setDbValue($rs->fields('pre_Concentration'));
		$this->pre_Motility->setDbValue($rs->fields('pre_Motility'));
		$this->pre_Morphology->setDbValue($rs->fields('pre_Morphology'));
		$this->post_Concentration->setDbValue($rs->fields('post_Concentration'));
		$this->post_Motility->setDbValue($rs->fields('post_Motility'));
		$this->post_Morphology->setDbValue($rs->fields('post_Morphology'));
		$this->NumberofEmbryostransferred->setDbValue($rs->fields('NumberofEmbryostransferred'));
		$this->Embryosunderobservation->setDbValue($rs->fields('Embryosunderobservation'));
		$this->EmbryoDevelopmentSummary->setDbValue($rs->fields('EmbryoDevelopmentSummary'));
		$this->EmbryologistSignature->setDbValue($rs->fields('EmbryologistSignature'));
		$this->IVFRegistrationID->setDbValue($rs->fields('IVFRegistrationID'));
		$this->InseminatinTechnique->setDbValue($rs->fields('InseminatinTechnique'));
		$this->ICSIDetails->setDbValue($rs->fields('ICSIDetails'));
		$this->DateofET->setDbValue($rs->fields('DateofET'));
		$this->Reasonfornotranfer->setDbValue($rs->fields('Reasonfornotranfer'));
		$this->EmbryosCryopreserved->setDbValue($rs->fields('EmbryosCryopreserved'));
		$this->LegendCellStage->setDbValue($rs->fields('LegendCellStage'));
		$this->ConsultantsSignature->setDbValue($rs->fields('ConsultantsSignature'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->M2->setDbValue($rs->fields('M2'));
		$this->Mi2->setDbValue($rs->fields('Mi2'));
		$this->ICSI->setDbValue($rs->fields('ICSI'));
		$this->IVF->setDbValue($rs->fields('IVF'));
		$this->M1->setDbValue($rs->fields('M1'));
		$this->GV->setDbValue($rs->fields('GV'));
		$this->Others->setDbValue($rs->fields('Others'));
		$this->Normal2PN->setDbValue($rs->fields('Normal2PN'));
		$this->Abnormalfertilisation1N->setDbValue($rs->fields('Abnormalfertilisation1N'));
		$this->Abnormalfertilisation3N->setDbValue($rs->fields('Abnormalfertilisation3N'));
		$this->NotFertilized->setDbValue($rs->fields('NotFertilized'));
		$this->Degenerated->setDbValue($rs->fields('Degenerated'));
		$this->SpermDate->setDbValue($rs->fields('SpermDate'));
		$this->Code1->setDbValue($rs->fields('Code1'));
		$this->Day1->setDbValue($rs->fields('Day1'));
		$this->CellStage1->setDbValue($rs->fields('CellStage1'));
		$this->Grade1->setDbValue($rs->fields('Grade1'));
		$this->State1->setDbValue($rs->fields('State1'));
		$this->Code2->setDbValue($rs->fields('Code2'));
		$this->Day2->setDbValue($rs->fields('Day2'));
		$this->CellStage2->setDbValue($rs->fields('CellStage2'));
		$this->Grade2->setDbValue($rs->fields('Grade2'));
		$this->State2->setDbValue($rs->fields('State2'));
		$this->Code3->setDbValue($rs->fields('Code3'));
		$this->Day3->setDbValue($rs->fields('Day3'));
		$this->CellStage3->setDbValue($rs->fields('CellStage3'));
		$this->Grade3->setDbValue($rs->fields('Grade3'));
		$this->State3->setDbValue($rs->fields('State3'));
		$this->Code4->setDbValue($rs->fields('Code4'));
		$this->Day4->setDbValue($rs->fields('Day4'));
		$this->CellStage4->setDbValue($rs->fields('CellStage4'));
		$this->Grade4->setDbValue($rs->fields('Grade4'));
		$this->State4->setDbValue($rs->fields('State4'));
		$this->Code5->setDbValue($rs->fields('Code5'));
		$this->Day5->setDbValue($rs->fields('Day5'));
		$this->CellStage5->setDbValue($rs->fields('CellStage5'));
		$this->Grade5->setDbValue($rs->fields('Grade5'));
		$this->State5->setDbValue($rs->fields('State5'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->Volume->setDbValue($rs->fields('Volume'));
		$this->Volume1->setDbValue($rs->fields('Volume1'));
		$this->Volume2->setDbValue($rs->fields('Volume2'));
		$this->Concentration2->setDbValue($rs->fields('Concentration2'));
		$this->Total->setDbValue($rs->fields('Total'));
		$this->Total1->setDbValue($rs->fields('Total1'));
		$this->Total2->setDbValue($rs->fields('Total2'));
		$this->Progressive->setDbValue($rs->fields('Progressive'));
		$this->Progressive1->setDbValue($rs->fields('Progressive1'));
		$this->Progressive2->setDbValue($rs->fields('Progressive2'));
		$this->NotProgressive->setDbValue($rs->fields('NotProgressive'));
		$this->NotProgressive1->setDbValue($rs->fields('NotProgressive1'));
		$this->NotProgressive2->setDbValue($rs->fields('NotProgressive2'));
		$this->Motility2->setDbValue($rs->fields('Motility2'));
		$this->Morphology2->setDbValue($rs->fields('Morphology2'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// ARTCycle
		// Spermorigin
		// IndicationforART
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
		// NumberofEmbryostransferred
		// Embryosunderobservation
		// EmbryoDevelopmentSummary
		// EmbryologistSignature
		// IVFRegistrationID
		// InseminatinTechnique
		// ICSIDetails
		// DateofET
		// Reasonfornotranfer
		// EmbryosCryopreserved
		// LegendCellStage
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

		// ARTCycle
		if (strval($this->ARTCycle->CurrentValue) != "") {
			$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
		} else {
			$this->ARTCycle->ViewValue = NULL;
		}
		$this->ARTCycle->ViewCustomAttributes = "";

		// Spermorigin
		if (strval($this->Spermorigin->CurrentValue) != "") {
			$this->Spermorigin->ViewValue = $this->Spermorigin->optionCaption($this->Spermorigin->CurrentValue);
		} else {
			$this->Spermorigin->ViewValue = NULL;
		}
		$this->Spermorigin->ViewCustomAttributes = "";

		// IndicationforART
		$this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
		$this->IndicationforART->ViewCustomAttributes = "";

		// DateofICSI
		$this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
		$this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 7);
		$this->DateofICSI->ViewCustomAttributes = "";

		// Origin
		if (strval($this->Origin->CurrentValue) != "") {
			$this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
		} else {
			$this->Origin->ViewValue = NULL;
		}
		$this->Origin->ViewCustomAttributes = "";

		// Status
		if (strval($this->Status->CurrentValue) != "") {
			$this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
		} else {
			$this->Status->ViewValue = NULL;
		}
		$this->Status->ViewCustomAttributes = "";

		// Method
		if (strval($this->Method->CurrentValue) != "") {
			$this->Method->ViewValue = $this->Method->optionCaption($this->Method->CurrentValue);
		} else {
			$this->Method->ViewValue = NULL;
		}
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

		// NumberofEmbryostransferred
		$this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
		$this->NumberofEmbryostransferred->ViewCustomAttributes = "";

		// Embryosunderobservation
		$this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
		$this->Embryosunderobservation->ViewCustomAttributes = "";

		// EmbryoDevelopmentSummary
		$this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
		$this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

		// EmbryologistSignature
		$this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
		$this->EmbryologistSignature->ViewCustomAttributes = "";

		// IVFRegistrationID
		$this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
		$this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
		$this->IVFRegistrationID->ViewCustomAttributes = "";

		// InseminatinTechnique
		if (strval($this->InseminatinTechnique->CurrentValue) != "") {
			$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
		} else {
			$this->InseminatinTechnique->ViewValue = NULL;
		}
		$this->InseminatinTechnique->ViewCustomAttributes = "";

		// ICSIDetails
		$this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
		$this->ICSIDetails->ViewCustomAttributes = "";

		// DateofET
		if (strval($this->DateofET->CurrentValue) != "") {
			$this->DateofET->ViewValue = $this->DateofET->optionCaption($this->DateofET->CurrentValue);
		} else {
			$this->DateofET->ViewValue = NULL;
		}
		$this->DateofET->ViewCustomAttributes = "";

		// Reasonfornotranfer
		if (strval($this->Reasonfornotranfer->CurrentValue) != "") {
			$this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->optionCaption($this->Reasonfornotranfer->CurrentValue);
		} else {
			$this->Reasonfornotranfer->ViewValue = NULL;
		}
		$this->Reasonfornotranfer->ViewCustomAttributes = "";

		// EmbryosCryopreserved
		$this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
		$this->EmbryosCryopreserved->ViewCustomAttributes = "";

		// LegendCellStage
		$this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
		$this->LegendCellStage->ViewCustomAttributes = "";

		// ConsultantsSignature
		$curVal = strval($this->ConsultantsSignature->CurrentValue);
		if ($curVal != "") {
			$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
			if ($this->ConsultantsSignature->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->ConsultantsSignature->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
				}
			}
		} else {
			$this->ConsultantsSignature->ViewValue = NULL;
		}
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
		$this->Others->ViewValue = $this->Others->CurrentValue;
		$this->Others->ViewCustomAttributes = "";

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
		if (strval($this->Day1->CurrentValue) != "") {
			$this->Day1->ViewValue = $this->Day1->optionCaption($this->Day1->CurrentValue);
		} else {
			$this->Day1->ViewValue = NULL;
		}
		$this->Day1->ViewCustomAttributes = "";

		// CellStage1
		if (strval($this->CellStage1->CurrentValue) != "") {
			$this->CellStage1->ViewValue = $this->CellStage1->optionCaption($this->CellStage1->CurrentValue);
		} else {
			$this->CellStage1->ViewValue = NULL;
		}
		$this->CellStage1->ViewCustomAttributes = "";

		// Grade1
		if (strval($this->Grade1->CurrentValue) != "") {
			$this->Grade1->ViewValue = $this->Grade1->optionCaption($this->Grade1->CurrentValue);
		} else {
			$this->Grade1->ViewValue = NULL;
		}
		$this->Grade1->ViewCustomAttributes = "";

		// State1
		if (strval($this->State1->CurrentValue) != "") {
			$this->State1->ViewValue = $this->State1->optionCaption($this->State1->CurrentValue);
		} else {
			$this->State1->ViewValue = NULL;
		}
		$this->State1->ViewCustomAttributes = "";

		// Code2
		$this->Code2->ViewValue = $this->Code2->CurrentValue;
		$this->Code2->ViewCustomAttributes = "";

		// Day2
		if (strval($this->Day2->CurrentValue) != "") {
			$this->Day2->ViewValue = $this->Day2->optionCaption($this->Day2->CurrentValue);
		} else {
			$this->Day2->ViewValue = NULL;
		}
		$this->Day2->ViewCustomAttributes = "";

		// CellStage2
		if (strval($this->CellStage2->CurrentValue) != "") {
			$this->CellStage2->ViewValue = $this->CellStage2->optionCaption($this->CellStage2->CurrentValue);
		} else {
			$this->CellStage2->ViewValue = NULL;
		}
		$this->CellStage2->ViewCustomAttributes = "";

		// Grade2
		if (strval($this->Grade2->CurrentValue) != "") {
			$this->Grade2->ViewValue = $this->Grade2->optionCaption($this->Grade2->CurrentValue);
		} else {
			$this->Grade2->ViewValue = NULL;
		}
		$this->Grade2->ViewCustomAttributes = "";

		// State2
		if (strval($this->State2->CurrentValue) != "") {
			$this->State2->ViewValue = $this->State2->optionCaption($this->State2->CurrentValue);
		} else {
			$this->State2->ViewValue = NULL;
		}
		$this->State2->ViewCustomAttributes = "";

		// Code3
		$this->Code3->ViewValue = $this->Code3->CurrentValue;
		$this->Code3->ViewCustomAttributes = "";

		// Day3
		if (strval($this->Day3->CurrentValue) != "") {
			$this->Day3->ViewValue = $this->Day3->optionCaption($this->Day3->CurrentValue);
		} else {
			$this->Day3->ViewValue = NULL;
		}
		$this->Day3->ViewCustomAttributes = "";

		// CellStage3
		if (strval($this->CellStage3->CurrentValue) != "") {
			$this->CellStage3->ViewValue = $this->CellStage3->optionCaption($this->CellStage3->CurrentValue);
		} else {
			$this->CellStage3->ViewValue = NULL;
		}
		$this->CellStage3->ViewCustomAttributes = "";

		// Grade3
		if (strval($this->Grade3->CurrentValue) != "") {
			$this->Grade3->ViewValue = $this->Grade3->optionCaption($this->Grade3->CurrentValue);
		} else {
			$this->Grade3->ViewValue = NULL;
		}
		$this->Grade3->ViewCustomAttributes = "";

		// State3
		if (strval($this->State3->CurrentValue) != "") {
			$this->State3->ViewValue = $this->State3->optionCaption($this->State3->CurrentValue);
		} else {
			$this->State3->ViewValue = NULL;
		}
		$this->State3->ViewCustomAttributes = "";

		// Code4
		$this->Code4->ViewValue = $this->Code4->CurrentValue;
		$this->Code4->ViewCustomAttributes = "";

		// Day4
		if (strval($this->Day4->CurrentValue) != "") {
			$this->Day4->ViewValue = $this->Day4->optionCaption($this->Day4->CurrentValue);
		} else {
			$this->Day4->ViewValue = NULL;
		}
		$this->Day4->ViewCustomAttributes = "";

		// CellStage4
		if (strval($this->CellStage4->CurrentValue) != "") {
			$this->CellStage4->ViewValue = $this->CellStage4->optionCaption($this->CellStage4->CurrentValue);
		} else {
			$this->CellStage4->ViewValue = NULL;
		}
		$this->CellStage4->ViewCustomAttributes = "";

		// Grade4
		if (strval($this->Grade4->CurrentValue) != "") {
			$this->Grade4->ViewValue = $this->Grade4->optionCaption($this->Grade4->CurrentValue);
		} else {
			$this->Grade4->ViewValue = NULL;
		}
		$this->Grade4->ViewCustomAttributes = "";

		// State4
		if (strval($this->State4->CurrentValue) != "") {
			$this->State4->ViewValue = $this->State4->optionCaption($this->State4->CurrentValue);
		} else {
			$this->State4->ViewValue = NULL;
		}
		$this->State4->ViewCustomAttributes = "";

		// Code5
		$this->Code5->ViewValue = $this->Code5->CurrentValue;
		$this->Code5->ViewCustomAttributes = "";

		// Day5
		if (strval($this->Day5->CurrentValue) != "") {
			$this->Day5->ViewValue = $this->Day5->optionCaption($this->Day5->CurrentValue);
		} else {
			$this->Day5->ViewValue = NULL;
		}
		$this->Day5->ViewCustomAttributes = "";

		// CellStage5
		if (strval($this->CellStage5->CurrentValue) != "") {
			$this->CellStage5->ViewValue = $this->CellStage5->optionCaption($this->CellStage5->CurrentValue);
		} else {
			$this->CellStage5->ViewValue = NULL;
		}
		$this->CellStage5->ViewCustomAttributes = "";

		// Grade5
		if (strval($this->Grade5->CurrentValue) != "") {
			$this->Grade5->ViewValue = $this->Grade5->optionCaption($this->Grade5->CurrentValue);
		} else {
			$this->Grade5->ViewValue = NULL;
		}
		$this->Grade5->ViewCustomAttributes = "";

		// State5
		if (strval($this->State5->CurrentValue) != "") {
			$this->State5->ViewValue = $this->State5->optionCaption($this->State5->CurrentValue);
		} else {
			$this->State5->ViewValue = NULL;
		}
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

		// ARTCycle
		$this->ARTCycle->LinkCustomAttributes = "";
		$this->ARTCycle->HrefValue = "";
		$this->ARTCycle->TooltipValue = "";

		// Spermorigin
		$this->Spermorigin->LinkCustomAttributes = "";
		$this->Spermorigin->HrefValue = "";
		$this->Spermorigin->TooltipValue = "";

		// IndicationforART
		$this->IndicationforART->LinkCustomAttributes = "";
		$this->IndicationforART->HrefValue = "";
		$this->IndicationforART->TooltipValue = "";

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

		// NumberofEmbryostransferred
		$this->NumberofEmbryostransferred->LinkCustomAttributes = "";
		$this->NumberofEmbryostransferred->HrefValue = "";
		$this->NumberofEmbryostransferred->TooltipValue = "";

		// Embryosunderobservation
		$this->Embryosunderobservation->LinkCustomAttributes = "";
		$this->Embryosunderobservation->HrefValue = "";
		$this->Embryosunderobservation->TooltipValue = "";

		// EmbryoDevelopmentSummary
		$this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
		$this->EmbryoDevelopmentSummary->HrefValue = "";
		$this->EmbryoDevelopmentSummary->TooltipValue = "";

		// EmbryologistSignature
		$this->EmbryologistSignature->LinkCustomAttributes = "";
		$this->EmbryologistSignature->HrefValue = "";
		$this->EmbryologistSignature->TooltipValue = "";

		// IVFRegistrationID
		$this->IVFRegistrationID->LinkCustomAttributes = "";
		$this->IVFRegistrationID->HrefValue = "";
		$this->IVFRegistrationID->TooltipValue = "";

		// InseminatinTechnique
		$this->InseminatinTechnique->LinkCustomAttributes = "";
		$this->InseminatinTechnique->HrefValue = "";
		$this->InseminatinTechnique->TooltipValue = "";

		// ICSIDetails
		$this->ICSIDetails->LinkCustomAttributes = "";
		$this->ICSIDetails->HrefValue = "";
		$this->ICSIDetails->TooltipValue = "";

		// DateofET
		$this->DateofET->LinkCustomAttributes = "";
		$this->DateofET->HrefValue = "";
		$this->DateofET->TooltipValue = "";

		// Reasonfornotranfer
		$this->Reasonfornotranfer->LinkCustomAttributes = "";
		$this->Reasonfornotranfer->HrefValue = "";
		$this->Reasonfornotranfer->TooltipValue = "";

		// EmbryosCryopreserved
		$this->EmbryosCryopreserved->LinkCustomAttributes = "";
		$this->EmbryosCryopreserved->HrefValue = "";
		$this->EmbryosCryopreserved->TooltipValue = "";

		// LegendCellStage
		$this->LegendCellStage->LinkCustomAttributes = "";
		$this->LegendCellStage->HrefValue = "";
		$this->LegendCellStage->TooltipValue = "";

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
		$this->Others->LinkCustomAttributes = "";
		$this->Others->HrefValue = "";
		$this->Others->TooltipValue = "";

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

		// ARTCycle
		$this->ARTCycle->EditAttrs["class"] = "form-control";
		$this->ARTCycle->EditCustomAttributes = "";
		$this->ARTCycle->EditValue = $this->ARTCycle->options(TRUE);

		// Spermorigin
		$this->Spermorigin->EditAttrs["class"] = "form-control";
		$this->Spermorigin->EditCustomAttributes = "";
		$this->Spermorigin->EditValue = $this->Spermorigin->options(TRUE);

		// IndicationforART
		$this->IndicationforART->EditAttrs["class"] = "form-control";
		$this->IndicationforART->EditCustomAttributes = "";
		if (!$this->IndicationforART->Raw)
			$this->IndicationforART->CurrentValue = HtmlDecode($this->IndicationforART->CurrentValue);
		$this->IndicationforART->EditValue = $this->IndicationforART->CurrentValue;
		$this->IndicationforART->PlaceHolder = RemoveHtml($this->IndicationforART->caption());

		// DateofICSI
		$this->DateofICSI->EditAttrs["class"] = "form-control";
		$this->DateofICSI->EditCustomAttributes = "";
		$this->DateofICSI->EditValue = FormatDateTime($this->DateofICSI->CurrentValue, 7);
		$this->DateofICSI->PlaceHolder = RemoveHtml($this->DateofICSI->caption());

		// Origin
		$this->Origin->EditAttrs["class"] = "form-control";
		$this->Origin->EditCustomAttributes = "";
		$this->Origin->EditValue = $this->Origin->options(TRUE);

		// Status
		$this->Status->EditAttrs["class"] = "form-control";
		$this->Status->EditCustomAttributes = "";
		$this->Status->EditValue = $this->Status->options(TRUE);

		// Method
		$this->Method->EditAttrs["class"] = "form-control";
		$this->Method->EditCustomAttributes = "";
		$this->Method->EditValue = $this->Method->options(TRUE);

		// pre_Concentration
		$this->pre_Concentration->EditAttrs["class"] = "form-control";
		$this->pre_Concentration->EditCustomAttributes = "";
		if (!$this->pre_Concentration->Raw)
			$this->pre_Concentration->CurrentValue = HtmlDecode($this->pre_Concentration->CurrentValue);
		$this->pre_Concentration->EditValue = $this->pre_Concentration->CurrentValue;
		$this->pre_Concentration->PlaceHolder = RemoveHtml($this->pre_Concentration->caption());

		// pre_Motility
		$this->pre_Motility->EditAttrs["class"] = "form-control";
		$this->pre_Motility->EditCustomAttributes = "";
		if (!$this->pre_Motility->Raw)
			$this->pre_Motility->CurrentValue = HtmlDecode($this->pre_Motility->CurrentValue);
		$this->pre_Motility->EditValue = $this->pre_Motility->CurrentValue;
		$this->pre_Motility->PlaceHolder = RemoveHtml($this->pre_Motility->caption());

		// pre_Morphology
		$this->pre_Morphology->EditAttrs["class"] = "form-control";
		$this->pre_Morphology->EditCustomAttributes = "";
		if (!$this->pre_Morphology->Raw)
			$this->pre_Morphology->CurrentValue = HtmlDecode($this->pre_Morphology->CurrentValue);
		$this->pre_Morphology->EditValue = $this->pre_Morphology->CurrentValue;
		$this->pre_Morphology->PlaceHolder = RemoveHtml($this->pre_Morphology->caption());

		// post_Concentration
		$this->post_Concentration->EditAttrs["class"] = "form-control";
		$this->post_Concentration->EditCustomAttributes = "";
		if (!$this->post_Concentration->Raw)
			$this->post_Concentration->CurrentValue = HtmlDecode($this->post_Concentration->CurrentValue);
		$this->post_Concentration->EditValue = $this->post_Concentration->CurrentValue;
		$this->post_Concentration->PlaceHolder = RemoveHtml($this->post_Concentration->caption());

		// post_Motility
		$this->post_Motility->EditAttrs["class"] = "form-control";
		$this->post_Motility->EditCustomAttributes = "";
		if (!$this->post_Motility->Raw)
			$this->post_Motility->CurrentValue = HtmlDecode($this->post_Motility->CurrentValue);
		$this->post_Motility->EditValue = $this->post_Motility->CurrentValue;
		$this->post_Motility->PlaceHolder = RemoveHtml($this->post_Motility->caption());

		// post_Morphology
		$this->post_Morphology->EditAttrs["class"] = "form-control";
		$this->post_Morphology->EditCustomAttributes = "";
		if (!$this->post_Morphology->Raw)
			$this->post_Morphology->CurrentValue = HtmlDecode($this->post_Morphology->CurrentValue);
		$this->post_Morphology->EditValue = $this->post_Morphology->CurrentValue;
		$this->post_Morphology->PlaceHolder = RemoveHtml($this->post_Morphology->caption());

		// NumberofEmbryostransferred
		$this->NumberofEmbryostransferred->EditAttrs["class"] = "form-control";
		$this->NumberofEmbryostransferred->EditCustomAttributes = "";
		if (!$this->NumberofEmbryostransferred->Raw)
			$this->NumberofEmbryostransferred->CurrentValue = HtmlDecode($this->NumberofEmbryostransferred->CurrentValue);
		$this->NumberofEmbryostransferred->EditValue = $this->NumberofEmbryostransferred->CurrentValue;
		$this->NumberofEmbryostransferred->PlaceHolder = RemoveHtml($this->NumberofEmbryostransferred->caption());

		// Embryosunderobservation
		$this->Embryosunderobservation->EditAttrs["class"] = "form-control";
		$this->Embryosunderobservation->EditCustomAttributes = "";
		if (!$this->Embryosunderobservation->Raw)
			$this->Embryosunderobservation->CurrentValue = HtmlDecode($this->Embryosunderobservation->CurrentValue);
		$this->Embryosunderobservation->EditValue = $this->Embryosunderobservation->CurrentValue;
		$this->Embryosunderobservation->PlaceHolder = RemoveHtml($this->Embryosunderobservation->caption());

		// EmbryoDevelopmentSummary
		$this->EmbryoDevelopmentSummary->EditAttrs["class"] = "form-control";
		$this->EmbryoDevelopmentSummary->EditCustomAttributes = "";
		if (!$this->EmbryoDevelopmentSummary->Raw)
			$this->EmbryoDevelopmentSummary->CurrentValue = HtmlDecode($this->EmbryoDevelopmentSummary->CurrentValue);
		$this->EmbryoDevelopmentSummary->EditValue = $this->EmbryoDevelopmentSummary->CurrentValue;
		$this->EmbryoDevelopmentSummary->PlaceHolder = RemoveHtml($this->EmbryoDevelopmentSummary->caption());

		// EmbryologistSignature
		$this->EmbryologistSignature->EditAttrs["class"] = "form-control";
		$this->EmbryologistSignature->EditCustomAttributes = "";
		if (!$this->EmbryologistSignature->Raw)
			$this->EmbryologistSignature->CurrentValue = HtmlDecode($this->EmbryologistSignature->CurrentValue);
		$this->EmbryologistSignature->EditValue = $this->EmbryologistSignature->CurrentValue;
		$this->EmbryologistSignature->PlaceHolder = RemoveHtml($this->EmbryologistSignature->caption());

		// IVFRegistrationID
		$this->IVFRegistrationID->EditAttrs["class"] = "form-control";
		$this->IVFRegistrationID->EditCustomAttributes = "";
		$this->IVFRegistrationID->EditValue = $this->IVFRegistrationID->CurrentValue;
		$this->IVFRegistrationID->PlaceHolder = RemoveHtml($this->IVFRegistrationID->caption());

		// InseminatinTechnique
		$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
		$this->InseminatinTechnique->EditCustomAttributes = "";
		$this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(TRUE);

		// ICSIDetails
		$this->ICSIDetails->EditAttrs["class"] = "form-control";
		$this->ICSIDetails->EditCustomAttributes = "";
		if (!$this->ICSIDetails->Raw)
			$this->ICSIDetails->CurrentValue = HtmlDecode($this->ICSIDetails->CurrentValue);
		$this->ICSIDetails->EditValue = $this->ICSIDetails->CurrentValue;
		$this->ICSIDetails->PlaceHolder = RemoveHtml($this->ICSIDetails->caption());

		// DateofET
		$this->DateofET->EditAttrs["class"] = "form-control";
		$this->DateofET->EditCustomAttributes = "";
		$this->DateofET->EditValue = $this->DateofET->options(TRUE);

		// Reasonfornotranfer
		$this->Reasonfornotranfer->EditAttrs["class"] = "form-control";
		$this->Reasonfornotranfer->EditCustomAttributes = "";
		$this->Reasonfornotranfer->EditValue = $this->Reasonfornotranfer->options(TRUE);

		// EmbryosCryopreserved
		$this->EmbryosCryopreserved->EditAttrs["class"] = "form-control";
		$this->EmbryosCryopreserved->EditCustomAttributes = "";
		if (!$this->EmbryosCryopreserved->Raw)
			$this->EmbryosCryopreserved->CurrentValue = HtmlDecode($this->EmbryosCryopreserved->CurrentValue);
		$this->EmbryosCryopreserved->EditValue = $this->EmbryosCryopreserved->CurrentValue;
		$this->EmbryosCryopreserved->PlaceHolder = RemoveHtml($this->EmbryosCryopreserved->caption());

		// LegendCellStage
		$this->LegendCellStage->EditAttrs["class"] = "form-control";
		$this->LegendCellStage->EditCustomAttributes = "";
		if (!$this->LegendCellStage->Raw)
			$this->LegendCellStage->CurrentValue = HtmlDecode($this->LegendCellStage->CurrentValue);
		$this->LegendCellStage->EditValue = $this->LegendCellStage->CurrentValue;
		$this->LegendCellStage->PlaceHolder = RemoveHtml($this->LegendCellStage->caption());

		// ConsultantsSignature
		$this->ConsultantsSignature->EditAttrs["class"] = "form-control";
		$this->ConsultantsSignature->EditCustomAttributes = "";

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (!$this->Name->Raw)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// M2
		$this->M2->EditAttrs["class"] = "form-control";
		$this->M2->EditCustomAttributes = "";
		if (!$this->M2->Raw)
			$this->M2->CurrentValue = HtmlDecode($this->M2->CurrentValue);
		$this->M2->EditValue = $this->M2->CurrentValue;
		$this->M2->PlaceHolder = RemoveHtml($this->M2->caption());

		// Mi2
		$this->Mi2->EditAttrs["class"] = "form-control";
		$this->Mi2->EditCustomAttributes = "";
		if (!$this->Mi2->Raw)
			$this->Mi2->CurrentValue = HtmlDecode($this->Mi2->CurrentValue);
		$this->Mi2->EditValue = $this->Mi2->CurrentValue;
		$this->Mi2->PlaceHolder = RemoveHtml($this->Mi2->caption());

		// ICSI
		$this->ICSI->EditAttrs["class"] = "form-control";
		$this->ICSI->EditCustomAttributes = "";
		if (!$this->ICSI->Raw)
			$this->ICSI->CurrentValue = HtmlDecode($this->ICSI->CurrentValue);
		$this->ICSI->EditValue = $this->ICSI->CurrentValue;
		$this->ICSI->PlaceHolder = RemoveHtml($this->ICSI->caption());

		// IVF
		$this->IVF->EditAttrs["class"] = "form-control";
		$this->IVF->EditCustomAttributes = "";
		if (!$this->IVF->Raw)
			$this->IVF->CurrentValue = HtmlDecode($this->IVF->CurrentValue);
		$this->IVF->EditValue = $this->IVF->CurrentValue;
		$this->IVF->PlaceHolder = RemoveHtml($this->IVF->caption());

		// M1
		$this->M1->EditAttrs["class"] = "form-control";
		$this->M1->EditCustomAttributes = "";
		if (!$this->M1->Raw)
			$this->M1->CurrentValue = HtmlDecode($this->M1->CurrentValue);
		$this->M1->EditValue = $this->M1->CurrentValue;
		$this->M1->PlaceHolder = RemoveHtml($this->M1->caption());

		// GV
		$this->GV->EditAttrs["class"] = "form-control";
		$this->GV->EditCustomAttributes = "";
		if (!$this->GV->Raw)
			$this->GV->CurrentValue = HtmlDecode($this->GV->CurrentValue);
		$this->GV->EditValue = $this->GV->CurrentValue;
		$this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

		// Others
		$this->Others->EditAttrs["class"] = "form-control";
		$this->Others->EditCustomAttributes = "";
		if (!$this->Others->Raw)
			$this->Others->CurrentValue = HtmlDecode($this->Others->CurrentValue);
		$this->Others->EditValue = $this->Others->CurrentValue;
		$this->Others->PlaceHolder = RemoveHtml($this->Others->caption());

		// Normal2PN
		$this->Normal2PN->EditAttrs["class"] = "form-control";
		$this->Normal2PN->EditCustomAttributes = "";
		if (!$this->Normal2PN->Raw)
			$this->Normal2PN->CurrentValue = HtmlDecode($this->Normal2PN->CurrentValue);
		$this->Normal2PN->EditValue = $this->Normal2PN->CurrentValue;
		$this->Normal2PN->PlaceHolder = RemoveHtml($this->Normal2PN->caption());

		// Abnormalfertilisation1N
		$this->Abnormalfertilisation1N->EditAttrs["class"] = "form-control";
		$this->Abnormalfertilisation1N->EditCustomAttributes = "";
		if (!$this->Abnormalfertilisation1N->Raw)
			$this->Abnormalfertilisation1N->CurrentValue = HtmlDecode($this->Abnormalfertilisation1N->CurrentValue);
		$this->Abnormalfertilisation1N->EditValue = $this->Abnormalfertilisation1N->CurrentValue;
		$this->Abnormalfertilisation1N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation1N->caption());

		// Abnormalfertilisation3N
		$this->Abnormalfertilisation3N->EditAttrs["class"] = "form-control";
		$this->Abnormalfertilisation3N->EditCustomAttributes = "";
		if (!$this->Abnormalfertilisation3N->Raw)
			$this->Abnormalfertilisation3N->CurrentValue = HtmlDecode($this->Abnormalfertilisation3N->CurrentValue);
		$this->Abnormalfertilisation3N->EditValue = $this->Abnormalfertilisation3N->CurrentValue;
		$this->Abnormalfertilisation3N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation3N->caption());

		// NotFertilized
		$this->NotFertilized->EditAttrs["class"] = "form-control";
		$this->NotFertilized->EditCustomAttributes = "";
		if (!$this->NotFertilized->Raw)
			$this->NotFertilized->CurrentValue = HtmlDecode($this->NotFertilized->CurrentValue);
		$this->NotFertilized->EditValue = $this->NotFertilized->CurrentValue;
		$this->NotFertilized->PlaceHolder = RemoveHtml($this->NotFertilized->caption());

		// Degenerated
		$this->Degenerated->EditAttrs["class"] = "form-control";
		$this->Degenerated->EditCustomAttributes = "";
		if (!$this->Degenerated->Raw)
			$this->Degenerated->CurrentValue = HtmlDecode($this->Degenerated->CurrentValue);
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
		if (!$this->Code1->Raw)
			$this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
		$this->Code1->EditValue = $this->Code1->CurrentValue;
		$this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

		// Day1
		$this->Day1->EditAttrs["class"] = "form-control";
		$this->Day1->EditCustomAttributes = "";
		$this->Day1->EditValue = $this->Day1->options(TRUE);

		// CellStage1
		$this->CellStage1->EditAttrs["class"] = "form-control";
		$this->CellStage1->EditCustomAttributes = "";
		$this->CellStage1->EditValue = $this->CellStage1->options(TRUE);

		// Grade1
		$this->Grade1->EditAttrs["class"] = "form-control";
		$this->Grade1->EditCustomAttributes = "";
		$this->Grade1->EditValue = $this->Grade1->options(TRUE);

		// State1
		$this->State1->EditAttrs["class"] = "form-control";
		$this->State1->EditCustomAttributes = "";
		$this->State1->EditValue = $this->State1->options(TRUE);

		// Code2
		$this->Code2->EditAttrs["class"] = "form-control";
		$this->Code2->EditCustomAttributes = "";
		if (!$this->Code2->Raw)
			$this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
		$this->Code2->EditValue = $this->Code2->CurrentValue;
		$this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

		// Day2
		$this->Day2->EditAttrs["class"] = "form-control";
		$this->Day2->EditCustomAttributes = "";
		$this->Day2->EditValue = $this->Day2->options(TRUE);

		// CellStage2
		$this->CellStage2->EditAttrs["class"] = "form-control";
		$this->CellStage2->EditCustomAttributes = "";
		$this->CellStage2->EditValue = $this->CellStage2->options(TRUE);

		// Grade2
		$this->Grade2->EditAttrs["class"] = "form-control";
		$this->Grade2->EditCustomAttributes = "";
		$this->Grade2->EditValue = $this->Grade2->options(TRUE);

		// State2
		$this->State2->EditAttrs["class"] = "form-control";
		$this->State2->EditCustomAttributes = "";
		$this->State2->EditValue = $this->State2->options(TRUE);

		// Code3
		$this->Code3->EditAttrs["class"] = "form-control";
		$this->Code3->EditCustomAttributes = "";
		if (!$this->Code3->Raw)
			$this->Code3->CurrentValue = HtmlDecode($this->Code3->CurrentValue);
		$this->Code3->EditValue = $this->Code3->CurrentValue;
		$this->Code3->PlaceHolder = RemoveHtml($this->Code3->caption());

		// Day3
		$this->Day3->EditAttrs["class"] = "form-control";
		$this->Day3->EditCustomAttributes = "";
		$this->Day3->EditValue = $this->Day3->options(TRUE);

		// CellStage3
		$this->CellStage3->EditAttrs["class"] = "form-control";
		$this->CellStage3->EditCustomAttributes = "";
		$this->CellStage3->EditValue = $this->CellStage3->options(TRUE);

		// Grade3
		$this->Grade3->EditAttrs["class"] = "form-control";
		$this->Grade3->EditCustomAttributes = "";
		$this->Grade3->EditValue = $this->Grade3->options(TRUE);

		// State3
		$this->State3->EditAttrs["class"] = "form-control";
		$this->State3->EditCustomAttributes = "";
		$this->State3->EditValue = $this->State3->options(TRUE);

		// Code4
		$this->Code4->EditAttrs["class"] = "form-control";
		$this->Code4->EditCustomAttributes = "";
		if (!$this->Code4->Raw)
			$this->Code4->CurrentValue = HtmlDecode($this->Code4->CurrentValue);
		$this->Code4->EditValue = $this->Code4->CurrentValue;
		$this->Code4->PlaceHolder = RemoveHtml($this->Code4->caption());

		// Day4
		$this->Day4->EditAttrs["class"] = "form-control";
		$this->Day4->EditCustomAttributes = "";
		$this->Day4->EditValue = $this->Day4->options(TRUE);

		// CellStage4
		$this->CellStage4->EditAttrs["class"] = "form-control";
		$this->CellStage4->EditCustomAttributes = "";
		$this->CellStage4->EditValue = $this->CellStage4->options(TRUE);

		// Grade4
		$this->Grade4->EditAttrs["class"] = "form-control";
		$this->Grade4->EditCustomAttributes = "";
		$this->Grade4->EditValue = $this->Grade4->options(TRUE);

		// State4
		$this->State4->EditAttrs["class"] = "form-control";
		$this->State4->EditCustomAttributes = "";
		$this->State4->EditValue = $this->State4->options(TRUE);

		// Code5
		$this->Code5->EditAttrs["class"] = "form-control";
		$this->Code5->EditCustomAttributes = "";
		if (!$this->Code5->Raw)
			$this->Code5->CurrentValue = HtmlDecode($this->Code5->CurrentValue);
		$this->Code5->EditValue = $this->Code5->CurrentValue;
		$this->Code5->PlaceHolder = RemoveHtml($this->Code5->caption());

		// Day5
		$this->Day5->EditAttrs["class"] = "form-control";
		$this->Day5->EditCustomAttributes = "";
		$this->Day5->EditValue = $this->Day5->options(TRUE);

		// CellStage5
		$this->CellStage5->EditAttrs["class"] = "form-control";
		$this->CellStage5->EditCustomAttributes = "";
		$this->CellStage5->EditValue = $this->CellStage5->options(TRUE);

		// Grade5
		$this->Grade5->EditAttrs["class"] = "form-control";
		$this->Grade5->EditCustomAttributes = "";
		$this->Grade5->EditValue = $this->Grade5->options(TRUE);

		// State5
		$this->State5->EditAttrs["class"] = "form-control";
		$this->State5->EditCustomAttributes = "";
		$this->State5->EditValue = $this->State5->options(TRUE);

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
		if (!$this->Volume->Raw)
			$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
		$this->Volume->EditValue = $this->Volume->CurrentValue;
		$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

		// Volume1
		$this->Volume1->EditAttrs["class"] = "form-control";
		$this->Volume1->EditCustomAttributes = "";
		if (!$this->Volume1->Raw)
			$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
		$this->Volume1->EditValue = $this->Volume1->CurrentValue;
		$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

		// Volume2
		$this->Volume2->EditAttrs["class"] = "form-control";
		$this->Volume2->EditCustomAttributes = "";
		if (!$this->Volume2->Raw)
			$this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
		$this->Volume2->EditValue = $this->Volume2->CurrentValue;
		$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

		// Concentration2
		$this->Concentration2->EditAttrs["class"] = "form-control";
		$this->Concentration2->EditCustomAttributes = "";
		if (!$this->Concentration2->Raw)
			$this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
		$this->Concentration2->EditValue = $this->Concentration2->CurrentValue;
		$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

		// Total
		$this->Total->EditAttrs["class"] = "form-control";
		$this->Total->EditCustomAttributes = "";
		if (!$this->Total->Raw)
			$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
		$this->Total->EditValue = $this->Total->CurrentValue;
		$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

		// Total1
		$this->Total1->EditAttrs["class"] = "form-control";
		$this->Total1->EditCustomAttributes = "";
		if (!$this->Total1->Raw)
			$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
		$this->Total1->EditValue = $this->Total1->CurrentValue;
		$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

		// Total2
		$this->Total2->EditAttrs["class"] = "form-control";
		$this->Total2->EditCustomAttributes = "";
		if (!$this->Total2->Raw)
			$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
		$this->Total2->EditValue = $this->Total2->CurrentValue;
		$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

		// Progressive
		$this->Progressive->EditAttrs["class"] = "form-control";
		$this->Progressive->EditCustomAttributes = "";
		if (!$this->Progressive->Raw)
			$this->Progressive->CurrentValue = HtmlDecode($this->Progressive->CurrentValue);
		$this->Progressive->EditValue = $this->Progressive->CurrentValue;
		$this->Progressive->PlaceHolder = RemoveHtml($this->Progressive->caption());

		// Progressive1
		$this->Progressive1->EditAttrs["class"] = "form-control";
		$this->Progressive1->EditCustomAttributes = "";
		if (!$this->Progressive1->Raw)
			$this->Progressive1->CurrentValue = HtmlDecode($this->Progressive1->CurrentValue);
		$this->Progressive1->EditValue = $this->Progressive1->CurrentValue;
		$this->Progressive1->PlaceHolder = RemoveHtml($this->Progressive1->caption());

		// Progressive2
		$this->Progressive2->EditAttrs["class"] = "form-control";
		$this->Progressive2->EditCustomAttributes = "";
		if (!$this->Progressive2->Raw)
			$this->Progressive2->CurrentValue = HtmlDecode($this->Progressive2->CurrentValue);
		$this->Progressive2->EditValue = $this->Progressive2->CurrentValue;
		$this->Progressive2->PlaceHolder = RemoveHtml($this->Progressive2->caption());

		// NotProgressive
		$this->NotProgressive->EditAttrs["class"] = "form-control";
		$this->NotProgressive->EditCustomAttributes = "";
		if (!$this->NotProgressive->Raw)
			$this->NotProgressive->CurrentValue = HtmlDecode($this->NotProgressive->CurrentValue);
		$this->NotProgressive->EditValue = $this->NotProgressive->CurrentValue;
		$this->NotProgressive->PlaceHolder = RemoveHtml($this->NotProgressive->caption());

		// NotProgressive1
		$this->NotProgressive1->EditAttrs["class"] = "form-control";
		$this->NotProgressive1->EditCustomAttributes = "";
		if (!$this->NotProgressive1->Raw)
			$this->NotProgressive1->CurrentValue = HtmlDecode($this->NotProgressive1->CurrentValue);
		$this->NotProgressive1->EditValue = $this->NotProgressive1->CurrentValue;
		$this->NotProgressive1->PlaceHolder = RemoveHtml($this->NotProgressive1->caption());

		// NotProgressive2
		$this->NotProgressive2->EditAttrs["class"] = "form-control";
		$this->NotProgressive2->EditCustomAttributes = "";
		if (!$this->NotProgressive2->Raw)
			$this->NotProgressive2->CurrentValue = HtmlDecode($this->NotProgressive2->CurrentValue);
		$this->NotProgressive2->EditValue = $this->NotProgressive2->CurrentValue;
		$this->NotProgressive2->PlaceHolder = RemoveHtml($this->NotProgressive2->caption());

		// Motility2
		$this->Motility2->EditAttrs["class"] = "form-control";
		$this->Motility2->EditCustomAttributes = "";
		if (!$this->Motility2->Raw)
			$this->Motility2->CurrentValue = HtmlDecode($this->Motility2->CurrentValue);
		$this->Motility2->EditValue = $this->Motility2->CurrentValue;
		$this->Motility2->PlaceHolder = RemoveHtml($this->Motility2->caption());

		// Morphology2
		$this->Morphology2->EditAttrs["class"] = "form-control";
		$this->Morphology2->EditCustomAttributes = "";
		if (!$this->Morphology2->Raw)
			$this->Morphology2->CurrentValue = HtmlDecode($this->Morphology2->CurrentValue);
		$this->Morphology2->EditValue = $this->Morphology2->CurrentValue;
		$this->Morphology2->PlaceHolder = RemoveHtml($this->Morphology2->caption());

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
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Spermorigin);
					$doc->exportCaption($this->IndicationforART);
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
					$doc->exportCaption($this->NumberofEmbryostransferred);
					$doc->exportCaption($this->Embryosunderobservation);
					$doc->exportCaption($this->EmbryoDevelopmentSummary);
					$doc->exportCaption($this->EmbryologistSignature);
					$doc->exportCaption($this->IVFRegistrationID);
					$doc->exportCaption($this->InseminatinTechnique);
					$doc->exportCaption($this->ICSIDetails);
					$doc->exportCaption($this->DateofET);
					$doc->exportCaption($this->Reasonfornotranfer);
					$doc->exportCaption($this->EmbryosCryopreserved);
					$doc->exportCaption($this->LegendCellStage);
					$doc->exportCaption($this->ConsultantsSignature);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->M2);
					$doc->exportCaption($this->Mi2);
					$doc->exportCaption($this->ICSI);
					$doc->exportCaption($this->IVF);
					$doc->exportCaption($this->M1);
					$doc->exportCaption($this->GV);
					$doc->exportCaption($this->Others);
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
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Spermorigin);
					$doc->exportCaption($this->IndicationforART);
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
					$doc->exportCaption($this->NumberofEmbryostransferred);
					$doc->exportCaption($this->Embryosunderobservation);
					$doc->exportCaption($this->EmbryoDevelopmentSummary);
					$doc->exportCaption($this->EmbryologistSignature);
					$doc->exportCaption($this->IVFRegistrationID);
					$doc->exportCaption($this->InseminatinTechnique);
					$doc->exportCaption($this->ICSIDetails);
					$doc->exportCaption($this->DateofET);
					$doc->exportCaption($this->Reasonfornotranfer);
					$doc->exportCaption($this->EmbryosCryopreserved);
					$doc->exportCaption($this->LegendCellStage);
					$doc->exportCaption($this->ConsultantsSignature);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->M2);
					$doc->exportCaption($this->Mi2);
					$doc->exportCaption($this->ICSI);
					$doc->exportCaption($this->IVF);
					$doc->exportCaption($this->M1);
					$doc->exportCaption($this->GV);
					$doc->exportCaption($this->Others);
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
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Spermorigin);
						$doc->exportField($this->IndicationforART);
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
						$doc->exportField($this->NumberofEmbryostransferred);
						$doc->exportField($this->Embryosunderobservation);
						$doc->exportField($this->EmbryoDevelopmentSummary);
						$doc->exportField($this->EmbryologistSignature);
						$doc->exportField($this->IVFRegistrationID);
						$doc->exportField($this->InseminatinTechnique);
						$doc->exportField($this->ICSIDetails);
						$doc->exportField($this->DateofET);
						$doc->exportField($this->Reasonfornotranfer);
						$doc->exportField($this->EmbryosCryopreserved);
						$doc->exportField($this->LegendCellStage);
						$doc->exportField($this->ConsultantsSignature);
						$doc->exportField($this->Name);
						$doc->exportField($this->M2);
						$doc->exportField($this->Mi2);
						$doc->exportField($this->ICSI);
						$doc->exportField($this->IVF);
						$doc->exportField($this->M1);
						$doc->exportField($this->GV);
						$doc->exportField($this->Others);
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
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Spermorigin);
						$doc->exportField($this->IndicationforART);
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
						$doc->exportField($this->NumberofEmbryostransferred);
						$doc->exportField($this->Embryosunderobservation);
						$doc->exportField($this->EmbryoDevelopmentSummary);
						$doc->exportField($this->EmbryologistSignature);
						$doc->exportField($this->IVFRegistrationID);
						$doc->exportField($this->InseminatinTechnique);
						$doc->exportField($this->ICSIDetails);
						$doc->exportField($this->DateofET);
						$doc->exportField($this->Reasonfornotranfer);
						$doc->exportField($this->EmbryosCryopreserved);
						$doc->exportField($this->LegendCellStage);
						$doc->exportField($this->ConsultantsSignature);
						$doc->exportField($this->Name);
						$doc->exportField($this->M2);
						$doc->exportField($this->Mi2);
						$doc->exportField($this->ICSI);
						$doc->exportField($this->IVF);
						$doc->exportField($this->M1);
						$doc->exportField($this->GV);
						$doc->exportField($this->Others);
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