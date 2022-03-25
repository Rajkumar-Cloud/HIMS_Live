<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_et_chart
 */
class ivf_et_chart extends DbTable
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
	public $RIDNo;
	public $Name;
	public $ARTCycle;
	public $Consultant;
	public $InseminatinTechnique;
	public $IndicationForART;
	public $PreTreatment;
	public $Hysteroscopy;
	public $EndometrialScratching;
	public $TrialCannulation;
	public $CYCLETYPE;
	public $HRTCYCLE;
	public $OralEstrogenDosage;
	public $VaginalEstrogen;
	public $GCSF;
	public $ActivatedPRP;
	public $ERA;
	public $UCLcm;
	public $DATEOFSTART;
	public $DATEOFEMBRYOTRANSFER;
	public $DAYOFEMBRYOTRANSFER;
	public $NOOFEMBRYOSTHAWED;
	public $NOOFEMBRYOSTRANSFERRED;
	public $DAYOFEMBRYOS;
	public $CRYOPRESERVEDEMBRYOS;
	public $Code1;
	public $Code2;
	public $CellStage1;
	public $CellStage2;
	public $Grade1;
	public $Grade2;
	public $ProcedureRecord;
	public $Medicationsadvised;
	public $PostProcedureInstructions;
	public $PregnancyTestingWithSerumBetaHcG;
	public $ReviewDate;
	public $ReviewDoctor;
	public $TemplateProcedureRecord;
	public $TemplateMedicationsadvised;
	public $TemplatePostProcedureInstructions;
	public $TidNo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_et_chart';
		$this->TableName = 'ivf_et_chart';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_et_chart`";
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
		$this->id = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Nullable = FALSE; // NOT NULL field
		$this->RIDNo->Required = TRUE; // Required field
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// Name
		$this->Name = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// ARTCycle
		$this->ARTCycle = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, 45, -1, FALSE, '`ARTCycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ARTCycle->Sortable = TRUE; // Allow sort
		$this->ARTCycle->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ARTCycle->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ARTCycle->Lookup = new Lookup('ARTCycle', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ARTCycle->OptionCount = 8;
		$this->fields['ARTCycle'] = &$this->ARTCycle;

		// Consultant
		$this->Consultant = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, FALSE, '`Consultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Consultant->Sortable = TRUE; // Allow sort
		$this->fields['Consultant'] = &$this->Consultant;

		// InseminatinTechnique
		$this->InseminatinTechnique = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_InseminatinTechnique', 'InseminatinTechnique', '`InseminatinTechnique`', '`InseminatinTechnique`', 200, 45, -1, FALSE, '`InseminatinTechnique`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->InseminatinTechnique->Sortable = TRUE; // Allow sort
		$this->InseminatinTechnique->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->InseminatinTechnique->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->InseminatinTechnique->Lookup = new Lookup('InseminatinTechnique', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->InseminatinTechnique->OptionCount = 2;
		$this->fields['InseminatinTechnique'] = &$this->InseminatinTechnique;

		// IndicationForART
		$this->IndicationForART = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_IndicationForART', 'IndicationForART', '`IndicationForART`', '`IndicationForART`', 200, 45, -1, FALSE, '`IndicationForART`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IndicationForART->Sortable = TRUE; // Allow sort
		$this->fields['IndicationForART'] = &$this->IndicationForART;

		// PreTreatment
		$this->PreTreatment = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PreTreatment', 'PreTreatment', '`PreTreatment`', '`PreTreatment`', 200, 45, -1, FALSE, '`PreTreatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreTreatment->Sortable = TRUE; // Allow sort
		$this->PreTreatment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreTreatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreTreatment->Lookup = new Lookup('PreTreatment', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreTreatment->OptionCount = 3;
		$this->fields['PreTreatment'] = &$this->PreTreatment;

		// Hysteroscopy
		$this->Hysteroscopy = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Hysteroscopy', 'Hysteroscopy', '`Hysteroscopy`', '`Hysteroscopy`', 200, 45, -1, FALSE, '`Hysteroscopy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Hysteroscopy->Sortable = TRUE; // Allow sort
		$this->Hysteroscopy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Hysteroscopy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Hysteroscopy->Lookup = new Lookup('Hysteroscopy', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Hysteroscopy->OptionCount = 2;
		$this->fields['Hysteroscopy'] = &$this->Hysteroscopy;

		// EndometrialScratching
		$this->EndometrialScratching = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_EndometrialScratching', 'EndometrialScratching', '`EndometrialScratching`', '`EndometrialScratching`', 200, 45, -1, FALSE, '`EndometrialScratching`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->EndometrialScratching->Sortable = TRUE; // Allow sort
		$this->EndometrialScratching->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->EndometrialScratching->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->EndometrialScratching->Lookup = new Lookup('EndometrialScratching', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->EndometrialScratching->OptionCount = 2;
		$this->fields['EndometrialScratching'] = &$this->EndometrialScratching;

		// TrialCannulation
		$this->TrialCannulation = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TrialCannulation', 'TrialCannulation', '`TrialCannulation`', '`TrialCannulation`', 200, 45, -1, FALSE, '`TrialCannulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TrialCannulation->Sortable = TRUE; // Allow sort
		$this->TrialCannulation->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TrialCannulation->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TrialCannulation->Lookup = new Lookup('TrialCannulation', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TrialCannulation->OptionCount = 2;
		$this->fields['TrialCannulation'] = &$this->TrialCannulation;

		// CYCLETYPE
		$this->CYCLETYPE = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CYCLETYPE', 'CYCLETYPE', '`CYCLETYPE`', '`CYCLETYPE`', 200, 45, -1, FALSE, '`CYCLETYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CYCLETYPE->Sortable = TRUE; // Allow sort
		$this->CYCLETYPE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CYCLETYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CYCLETYPE->Lookup = new Lookup('CYCLETYPE', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CYCLETYPE->OptionCount = 3;
		$this->fields['CYCLETYPE'] = &$this->CYCLETYPE;

		// HRTCYCLE
		$this->HRTCYCLE = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_HRTCYCLE', 'HRTCYCLE', '`HRTCYCLE`', '`HRTCYCLE`', 200, 45, -1, FALSE, '`HRTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HRTCYCLE->Sortable = TRUE; // Allow sort
		$this->fields['HRTCYCLE'] = &$this->HRTCYCLE;

		// OralEstrogenDosage
		$this->OralEstrogenDosage = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_OralEstrogenDosage', 'OralEstrogenDosage', '`OralEstrogenDosage`', '`OralEstrogenDosage`', 200, 45, -1, FALSE, '`OralEstrogenDosage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->OralEstrogenDosage->Sortable = TRUE; // Allow sort
		$this->OralEstrogenDosage->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->OralEstrogenDosage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->OralEstrogenDosage->Lookup = new Lookup('OralEstrogenDosage', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->OralEstrogenDosage->OptionCount = 5;
		$this->fields['OralEstrogenDosage'] = &$this->OralEstrogenDosage;

		// VaginalEstrogen
		$this->VaginalEstrogen = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_VaginalEstrogen', 'VaginalEstrogen', '`VaginalEstrogen`', '`VaginalEstrogen`', 200, 45, -1, FALSE, '`VaginalEstrogen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VaginalEstrogen->Sortable = TRUE; // Allow sort
		$this->fields['VaginalEstrogen'] = &$this->VaginalEstrogen;

		// GCSF
		$this->GCSF = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_GCSF', 'GCSF', '`GCSF`', '`GCSF`', 200, 45, -1, FALSE, '`GCSF`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->GCSF->Sortable = TRUE; // Allow sort
		$this->GCSF->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->GCSF->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->GCSF->Lookup = new Lookup('GCSF', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->GCSF->OptionCount = 2;
		$this->fields['GCSF'] = &$this->GCSF;

		// ActivatedPRP
		$this->ActivatedPRP = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ActivatedPRP', 'ActivatedPRP', '`ActivatedPRP`', '`ActivatedPRP`', 200, 45, -1, FALSE, '`ActivatedPRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ActivatedPRP->Sortable = TRUE; // Allow sort
		$this->ActivatedPRP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ActivatedPRP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ActivatedPRP->Lookup = new Lookup('ActivatedPRP', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ActivatedPRP->OptionCount = 2;
		$this->fields['ActivatedPRP'] = &$this->ActivatedPRP;

		// ERA
		$this->ERA = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 200, 45, -1, FALSE, '`ERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ERA->Sortable = TRUE; // Allow sort
		$this->ERA->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ERA->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ERA->Lookup = new Lookup('ERA', 'ivf_et_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ERA->OptionCount = 2;
		$this->fields['ERA'] = &$this->ERA;

		// UCLcm
		$this->UCLcm = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_UCLcm', 'UCLcm', '`UCLcm`', '`UCLcm`', 200, 45, -1, FALSE, '`UCLcm`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UCLcm->Sortable = TRUE; // Allow sort
		$this->fields['UCLcm'] = &$this->UCLcm;

		// DATEOFSTART
		$this->DATEOFSTART = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DATEOFSTART', 'DATEOFSTART', '`DATEOFSTART`', CastDateFieldForLike("`DATEOFSTART`", 11, "DB"), 135, 19, 11, FALSE, '`DATEOFSTART`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATEOFSTART->Sortable = TRUE; // Allow sort
		$this->DATEOFSTART->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DATEOFSTART'] = &$this->DATEOFSTART;

		// DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DATEOFEMBRYOTRANSFER', 'DATEOFEMBRYOTRANSFER', '`DATEOFEMBRYOTRANSFER`', CastDateFieldForLike("`DATEOFEMBRYOTRANSFER`", 11, "DB"), 135, 19, 11, FALSE, '`DATEOFEMBRYOTRANSFER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DATEOFEMBRYOTRANSFER->Sortable = TRUE; // Allow sort
		$this->DATEOFEMBRYOTRANSFER->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DATEOFEMBRYOTRANSFER'] = &$this->DATEOFEMBRYOTRANSFER;

		// DAYOFEMBRYOTRANSFER
		$this->DAYOFEMBRYOTRANSFER = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DAYOFEMBRYOTRANSFER', 'DAYOFEMBRYOTRANSFER', '`DAYOFEMBRYOTRANSFER`', '`DAYOFEMBRYOTRANSFER`', 200, 45, -1, FALSE, '`DAYOFEMBRYOTRANSFER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DAYOFEMBRYOTRANSFER->Sortable = TRUE; // Allow sort
		$this->fields['DAYOFEMBRYOTRANSFER'] = &$this->DAYOFEMBRYOTRANSFER;

		// NOOFEMBRYOSTHAWED
		$this->NOOFEMBRYOSTHAWED = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_NOOFEMBRYOSTHAWED', 'NOOFEMBRYOSTHAWED', '`NOOFEMBRYOSTHAWED`', '`NOOFEMBRYOSTHAWED`', 200, 45, -1, FALSE, '`NOOFEMBRYOSTHAWED`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOOFEMBRYOSTHAWED->Sortable = TRUE; // Allow sort
		$this->fields['NOOFEMBRYOSTHAWED'] = &$this->NOOFEMBRYOSTHAWED;

		// NOOFEMBRYOSTRANSFERRED
		$this->NOOFEMBRYOSTRANSFERRED = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_NOOFEMBRYOSTRANSFERRED', 'NOOFEMBRYOSTRANSFERRED', '`NOOFEMBRYOSTRANSFERRED`', '`NOOFEMBRYOSTRANSFERRED`', 200, 45, -1, FALSE, '`NOOFEMBRYOSTRANSFERRED`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NOOFEMBRYOSTRANSFERRED->Sortable = TRUE; // Allow sort
		$this->fields['NOOFEMBRYOSTRANSFERRED'] = &$this->NOOFEMBRYOSTRANSFERRED;

		// DAYOFEMBRYOS
		$this->DAYOFEMBRYOS = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_DAYOFEMBRYOS', 'DAYOFEMBRYOS', '`DAYOFEMBRYOS`', '`DAYOFEMBRYOS`', 200, 45, -1, FALSE, '`DAYOFEMBRYOS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DAYOFEMBRYOS->Sortable = TRUE; // Allow sort
		$this->fields['DAYOFEMBRYOS'] = &$this->DAYOFEMBRYOS;

		// CRYOPRESERVEDEMBRYOS
		$this->CRYOPRESERVEDEMBRYOS = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CRYOPRESERVEDEMBRYOS', 'CRYOPRESERVEDEMBRYOS', '`CRYOPRESERVEDEMBRYOS`', '`CRYOPRESERVEDEMBRYOS`', 200, 45, -1, FALSE, '`CRYOPRESERVEDEMBRYOS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CRYOPRESERVEDEMBRYOS->Sortable = TRUE; // Allow sort
		$this->fields['CRYOPRESERVEDEMBRYOS'] = &$this->CRYOPRESERVEDEMBRYOS;

		// Code1
		$this->Code1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Code1', 'Code1', '`Code1`', '`Code1`', 200, 45, -1, FALSE, '`Code1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code1->Sortable = TRUE; // Allow sort
		$this->fields['Code1'] = &$this->Code1;

		// Code2
		$this->Code2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Code2', 'Code2', '`Code2`', '`Code2`', 200, 45, -1, FALSE, '`Code2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code2->Sortable = TRUE; // Allow sort
		$this->fields['Code2'] = &$this->Code2;

		// CellStage1
		$this->CellStage1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CellStage1', 'CellStage1', '`CellStage1`', '`CellStage1`', 200, 45, -1, FALSE, '`CellStage1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CellStage1->Sortable = TRUE; // Allow sort
		$this->fields['CellStage1'] = &$this->CellStage1;

		// CellStage2
		$this->CellStage2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_CellStage2', 'CellStage2', '`CellStage2`', '`CellStage2`', 200, 45, -1, FALSE, '`CellStage2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CellStage2->Sortable = TRUE; // Allow sort
		$this->fields['CellStage2'] = &$this->CellStage2;

		// Grade1
		$this->Grade1 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Grade1', 'Grade1', '`Grade1`', '`Grade1`', 200, 45, -1, FALSE, '`Grade1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Grade1->Sortable = TRUE; // Allow sort
		$this->fields['Grade1'] = &$this->Grade1;

		// Grade2
		$this->Grade2 = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Grade2', 'Grade2', '`Grade2`', '`Grade2`', 200, 45, -1, FALSE, '`Grade2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Grade2->Sortable = TRUE; // Allow sort
		$this->fields['Grade2'] = &$this->Grade2;

		// ProcedureRecord
		$this->ProcedureRecord = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ProcedureRecord', 'ProcedureRecord', '`ProcedureRecord`', '`ProcedureRecord`', 201, 65535, -1, FALSE, '`ProcedureRecord`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ProcedureRecord->Sortable = TRUE; // Allow sort
		$this->fields['ProcedureRecord'] = &$this->ProcedureRecord;

		// Medicationsadvised
		$this->Medicationsadvised = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_Medicationsadvised', 'Medicationsadvised', '`Medicationsadvised`', '`Medicationsadvised`', 201, 65535, -1, FALSE, '`Medicationsadvised`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Medicationsadvised->Sortable = TRUE; // Allow sort
		$this->fields['Medicationsadvised'] = &$this->Medicationsadvised;

		// PostProcedureInstructions
		$this->PostProcedureInstructions = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PostProcedureInstructions', 'PostProcedureInstructions', '`PostProcedureInstructions`', '`PostProcedureInstructions`', 201, 65535, -1, FALSE, '`PostProcedureInstructions`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PostProcedureInstructions->Sortable = TRUE; // Allow sort
		$this->fields['PostProcedureInstructions'] = &$this->PostProcedureInstructions;

		// PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_PregnancyTestingWithSerumBetaHcG', 'PregnancyTestingWithSerumBetaHcG', '`PregnancyTestingWithSerumBetaHcG`', '`PregnancyTestingWithSerumBetaHcG`', 200, 45, -1, FALSE, '`PregnancyTestingWithSerumBetaHcG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PregnancyTestingWithSerumBetaHcG->Sortable = TRUE; // Allow sort
		$this->fields['PregnancyTestingWithSerumBetaHcG'] = &$this->PregnancyTestingWithSerumBetaHcG;

		// ReviewDate
		$this->ReviewDate = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ReviewDate', 'ReviewDate', '`ReviewDate`', CastDateFieldForLike("`ReviewDate`", 0, "DB"), 135, 19, 0, FALSE, '`ReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReviewDate->Sortable = TRUE; // Allow sort
		$this->ReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReviewDate'] = &$this->ReviewDate;

		// ReviewDoctor
		$this->ReviewDoctor = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_ReviewDoctor', 'ReviewDoctor', '`ReviewDoctor`', '`ReviewDoctor`', 200, 45, -1, FALSE, '`ReviewDoctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReviewDoctor->Sortable = TRUE; // Allow sort
		$this->fields['ReviewDoctor'] = &$this->ReviewDoctor;

		// TemplateProcedureRecord
		$this->TemplateProcedureRecord = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TemplateProcedureRecord', 'TemplateProcedureRecord', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateProcedureRecord->IsCustom = TRUE; // Custom field
		$this->TemplateProcedureRecord->Sortable = TRUE; // Allow sort
		$this->TemplateProcedureRecord->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateProcedureRecord->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateProcedureRecord->Lookup = new Lookup('TemplateProcedureRecord', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_ProcedureRecord"], '', '');
		$this->fields['TemplateProcedureRecord'] = &$this->TemplateProcedureRecord;

		// TemplateMedicationsadvised
		$this->TemplateMedicationsadvised = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TemplateMedicationsadvised', 'TemplateMedicationsadvised', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateMedicationsadvised->IsCustom = TRUE; // Custom field
		$this->TemplateMedicationsadvised->Sortable = TRUE; // Allow sort
		$this->TemplateMedicationsadvised->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateMedicationsadvised->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplateMedicationsadvised->Lookup = new Lookup('TemplateMedicationsadvised', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_Medicationsadvised"], '', '');
		$this->fields['TemplateMedicationsadvised'] = &$this->TemplateMedicationsadvised;

		// TemplatePostProcedureInstructions
		$this->TemplatePostProcedureInstructions = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TemplatePostProcedureInstructions', 'TemplatePostProcedureInstructions', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplatePostProcedureInstructions->IsCustom = TRUE; // Custom field
		$this->TemplatePostProcedureInstructions->Sortable = TRUE; // Allow sort
		$this->TemplatePostProcedureInstructions->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplatePostProcedureInstructions->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TemplatePostProcedureInstructions->Lookup = new Lookup('TemplatePostProcedureInstructions', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], [], [], '', '');
		$this->fields['TemplatePostProcedureInstructions'] = &$this->TemplatePostProcedureInstructions;

		// TidNo
		$this->TidNo = new DbField('ivf_et_chart', 'ivf_et_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_et_chart`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `TemplateProcedureRecord`, '' AS `TemplateMedicationsadvised`, '' AS `TemplatePostProcedureInstructions` FROM " . $this->getSqlFrom();
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
		$this->RIDNo->DbValue = $row['RIDNo'];
		$this->Name->DbValue = $row['Name'];
		$this->ARTCycle->DbValue = $row['ARTCycle'];
		$this->Consultant->DbValue = $row['Consultant'];
		$this->InseminatinTechnique->DbValue = $row['InseminatinTechnique'];
		$this->IndicationForART->DbValue = $row['IndicationForART'];
		$this->PreTreatment->DbValue = $row['PreTreatment'];
		$this->Hysteroscopy->DbValue = $row['Hysteroscopy'];
		$this->EndometrialScratching->DbValue = $row['EndometrialScratching'];
		$this->TrialCannulation->DbValue = $row['TrialCannulation'];
		$this->CYCLETYPE->DbValue = $row['CYCLETYPE'];
		$this->HRTCYCLE->DbValue = $row['HRTCYCLE'];
		$this->OralEstrogenDosage->DbValue = $row['OralEstrogenDosage'];
		$this->VaginalEstrogen->DbValue = $row['VaginalEstrogen'];
		$this->GCSF->DbValue = $row['GCSF'];
		$this->ActivatedPRP->DbValue = $row['ActivatedPRP'];
		$this->ERA->DbValue = $row['ERA'];
		$this->UCLcm->DbValue = $row['UCLcm'];
		$this->DATEOFSTART->DbValue = $row['DATEOFSTART'];
		$this->DATEOFEMBRYOTRANSFER->DbValue = $row['DATEOFEMBRYOTRANSFER'];
		$this->DAYOFEMBRYOTRANSFER->DbValue = $row['DAYOFEMBRYOTRANSFER'];
		$this->NOOFEMBRYOSTHAWED->DbValue = $row['NOOFEMBRYOSTHAWED'];
		$this->NOOFEMBRYOSTRANSFERRED->DbValue = $row['NOOFEMBRYOSTRANSFERRED'];
		$this->DAYOFEMBRYOS->DbValue = $row['DAYOFEMBRYOS'];
		$this->CRYOPRESERVEDEMBRYOS->DbValue = $row['CRYOPRESERVEDEMBRYOS'];
		$this->Code1->DbValue = $row['Code1'];
		$this->Code2->DbValue = $row['Code2'];
		$this->CellStage1->DbValue = $row['CellStage1'];
		$this->CellStage2->DbValue = $row['CellStage2'];
		$this->Grade1->DbValue = $row['Grade1'];
		$this->Grade2->DbValue = $row['Grade2'];
		$this->ProcedureRecord->DbValue = $row['ProcedureRecord'];
		$this->Medicationsadvised->DbValue = $row['Medicationsadvised'];
		$this->PostProcedureInstructions->DbValue = $row['PostProcedureInstructions'];
		$this->PregnancyTestingWithSerumBetaHcG->DbValue = $row['PregnancyTestingWithSerumBetaHcG'];
		$this->ReviewDate->DbValue = $row['ReviewDate'];
		$this->ReviewDoctor->DbValue = $row['ReviewDoctor'];
		$this->TemplateProcedureRecord->DbValue = $row['TemplateProcedureRecord'];
		$this->TemplateMedicationsadvised->DbValue = $row['TemplateMedicationsadvised'];
		$this->TemplatePostProcedureInstructions->DbValue = $row['TemplatePostProcedureInstructions'];
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
			return "ivf_et_chartlist.php";
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
		if ($pageName == "ivf_et_chartview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_et_chartedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_et_chartadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_et_chartlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_et_chartview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_et_chartview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_et_chartadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_et_chartadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_et_chartedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_et_chartadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_et_chartdelete.php", $this->getUrlParm());
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
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->ARTCycle->setDbValue($rs->fields('ARTCycle'));
		$this->Consultant->setDbValue($rs->fields('Consultant'));
		$this->InseminatinTechnique->setDbValue($rs->fields('InseminatinTechnique'));
		$this->IndicationForART->setDbValue($rs->fields('IndicationForART'));
		$this->PreTreatment->setDbValue($rs->fields('PreTreatment'));
		$this->Hysteroscopy->setDbValue($rs->fields('Hysteroscopy'));
		$this->EndometrialScratching->setDbValue($rs->fields('EndometrialScratching'));
		$this->TrialCannulation->setDbValue($rs->fields('TrialCannulation'));
		$this->CYCLETYPE->setDbValue($rs->fields('CYCLETYPE'));
		$this->HRTCYCLE->setDbValue($rs->fields('HRTCYCLE'));
		$this->OralEstrogenDosage->setDbValue($rs->fields('OralEstrogenDosage'));
		$this->VaginalEstrogen->setDbValue($rs->fields('VaginalEstrogen'));
		$this->GCSF->setDbValue($rs->fields('GCSF'));
		$this->ActivatedPRP->setDbValue($rs->fields('ActivatedPRP'));
		$this->ERA->setDbValue($rs->fields('ERA'));
		$this->UCLcm->setDbValue($rs->fields('UCLcm'));
		$this->DATEOFSTART->setDbValue($rs->fields('DATEOFSTART'));
		$this->DATEOFEMBRYOTRANSFER->setDbValue($rs->fields('DATEOFEMBRYOTRANSFER'));
		$this->DAYOFEMBRYOTRANSFER->setDbValue($rs->fields('DAYOFEMBRYOTRANSFER'));
		$this->NOOFEMBRYOSTHAWED->setDbValue($rs->fields('NOOFEMBRYOSTHAWED'));
		$this->NOOFEMBRYOSTRANSFERRED->setDbValue($rs->fields('NOOFEMBRYOSTRANSFERRED'));
		$this->DAYOFEMBRYOS->setDbValue($rs->fields('DAYOFEMBRYOS'));
		$this->CRYOPRESERVEDEMBRYOS->setDbValue($rs->fields('CRYOPRESERVEDEMBRYOS'));
		$this->Code1->setDbValue($rs->fields('Code1'));
		$this->Code2->setDbValue($rs->fields('Code2'));
		$this->CellStage1->setDbValue($rs->fields('CellStage1'));
		$this->CellStage2->setDbValue($rs->fields('CellStage2'));
		$this->Grade1->setDbValue($rs->fields('Grade1'));
		$this->Grade2->setDbValue($rs->fields('Grade2'));
		$this->ProcedureRecord->setDbValue($rs->fields('ProcedureRecord'));
		$this->Medicationsadvised->setDbValue($rs->fields('Medicationsadvised'));
		$this->PostProcedureInstructions->setDbValue($rs->fields('PostProcedureInstructions'));
		$this->PregnancyTestingWithSerumBetaHcG->setDbValue($rs->fields('PregnancyTestingWithSerumBetaHcG'));
		$this->ReviewDate->setDbValue($rs->fields('ReviewDate'));
		$this->ReviewDoctor->setDbValue($rs->fields('ReviewDoctor'));
		$this->TemplateProcedureRecord->setDbValue($rs->fields('TemplateProcedureRecord'));
		$this->TemplateMedicationsadvised->setDbValue($rs->fields('TemplateMedicationsadvised'));
		$this->TemplatePostProcedureInstructions->setDbValue($rs->fields('TemplatePostProcedureInstructions'));
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
		// RIDNo
		// Name
		// ARTCycle
		// Consultant
		// InseminatinTechnique
		// IndicationForART
		// PreTreatment
		// Hysteroscopy
		// EndometrialScratching
		// TrialCannulation
		// CYCLETYPE
		// HRTCYCLE
		// OralEstrogenDosage
		// VaginalEstrogen
		// GCSF
		// ActivatedPRP
		// ERA
		// UCLcm
		// DATEOFSTART
		// DATEOFEMBRYOTRANSFER
		// DAYOFEMBRYOTRANSFER
		// NOOFEMBRYOSTHAWED
		// NOOFEMBRYOSTRANSFERRED
		// DAYOFEMBRYOS
		// CRYOPRESERVEDEMBRYOS
		// Code1
		// Code2
		// CellStage1
		// CellStage2
		// Grade1
		// Grade2
		// ProcedureRecord
		// Medicationsadvised
		// PostProcedureInstructions
		// PregnancyTestingWithSerumBetaHcG
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedureRecord
		// TemplateMedicationsadvised
		// TemplatePostProcedureInstructions
		// TidNo
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
			$this->ARTCycle->ViewValue = NULL;
		}
		$this->ARTCycle->ViewCustomAttributes = "";

		// Consultant
		$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
		$this->Consultant->ViewCustomAttributes = "";

		// InseminatinTechnique
		if (strval($this->InseminatinTechnique->CurrentValue) != "") {
			$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
		} else {
			$this->InseminatinTechnique->ViewValue = NULL;
		}
		$this->InseminatinTechnique->ViewCustomAttributes = "";

		// IndicationForART
		$this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
		$this->IndicationForART->ViewCustomAttributes = "";

		// PreTreatment
		if (strval($this->PreTreatment->CurrentValue) != "") {
			$this->PreTreatment->ViewValue = $this->PreTreatment->optionCaption($this->PreTreatment->CurrentValue);
		} else {
			$this->PreTreatment->ViewValue = NULL;
		}
		$this->PreTreatment->ViewCustomAttributes = "";

		// Hysteroscopy
		if (strval($this->Hysteroscopy->CurrentValue) != "") {
			$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
		} else {
			$this->Hysteroscopy->ViewValue = NULL;
		}
		$this->Hysteroscopy->ViewCustomAttributes = "";

		// EndometrialScratching
		if (strval($this->EndometrialScratching->CurrentValue) != "") {
			$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
		} else {
			$this->EndometrialScratching->ViewValue = NULL;
		}
		$this->EndometrialScratching->ViewCustomAttributes = "";

		// TrialCannulation
		if (strval($this->TrialCannulation->CurrentValue) != "") {
			$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
		} else {
			$this->TrialCannulation->ViewValue = NULL;
		}
		$this->TrialCannulation->ViewCustomAttributes = "";

		// CYCLETYPE
		if (strval($this->CYCLETYPE->CurrentValue) != "") {
			$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
		} else {
			$this->CYCLETYPE->ViewValue = NULL;
		}
		$this->CYCLETYPE->ViewCustomAttributes = "";

		// HRTCYCLE
		$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
		$this->HRTCYCLE->ViewCustomAttributes = "";

		// OralEstrogenDosage
		if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
			$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
		} else {
			$this->OralEstrogenDosage->ViewValue = NULL;
		}
		$this->OralEstrogenDosage->ViewCustomAttributes = "";

		// VaginalEstrogen
		$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
		$this->VaginalEstrogen->ViewCustomAttributes = "";

		// GCSF
		if (strval($this->GCSF->CurrentValue) != "") {
			$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
		} else {
			$this->GCSF->ViewValue = NULL;
		}
		$this->GCSF->ViewCustomAttributes = "";

		// ActivatedPRP
		if (strval($this->ActivatedPRP->CurrentValue) != "") {
			$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
		} else {
			$this->ActivatedPRP->ViewValue = NULL;
		}
		$this->ActivatedPRP->ViewCustomAttributes = "";

		// ERA
		if (strval($this->ERA->CurrentValue) != "") {
			$this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
		} else {
			$this->ERA->ViewValue = NULL;
		}
		$this->ERA->ViewCustomAttributes = "";

		// UCLcm
		$this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
		$this->UCLcm->ViewCustomAttributes = "";

		// DATEOFSTART
		$this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
		$this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 11);
		$this->DATEOFSTART->ViewCustomAttributes = "";

		// DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
		$this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 11);
		$this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

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

		// Code1
		$this->Code1->ViewValue = $this->Code1->CurrentValue;
		$this->Code1->ViewCustomAttributes = "";

		// Code2
		$this->Code2->ViewValue = $this->Code2->CurrentValue;
		$this->Code2->ViewCustomAttributes = "";

		// CellStage1
		$this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
		$this->CellStage1->ViewCustomAttributes = "";

		// CellStage2
		$this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
		$this->CellStage2->ViewCustomAttributes = "";

		// Grade1
		$this->Grade1->ViewValue = $this->Grade1->CurrentValue;
		$this->Grade1->ViewCustomAttributes = "";

		// Grade2
		$this->Grade2->ViewValue = $this->Grade2->CurrentValue;
		$this->Grade2->ViewCustomAttributes = "";

		// ProcedureRecord
		$this->ProcedureRecord->ViewValue = $this->ProcedureRecord->CurrentValue;
		$this->ProcedureRecord->ViewCustomAttributes = "";

		// Medicationsadvised
		$this->Medicationsadvised->ViewValue = $this->Medicationsadvised->CurrentValue;
		$this->Medicationsadvised->ViewCustomAttributes = "";

		// PostProcedureInstructions
		$this->PostProcedureInstructions->ViewValue = $this->PostProcedureInstructions->CurrentValue;
		$this->PostProcedureInstructions->ViewCustomAttributes = "";

		// PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
		$this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

		// ReviewDate
		$this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
		$this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
		$this->ReviewDate->ViewCustomAttributes = "";

		// ReviewDoctor
		$this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
		$this->ReviewDoctor->ViewCustomAttributes = "";

		// TemplateProcedureRecord
		$curVal = strval($this->TemplateProcedureRecord->CurrentValue);
		if ($curVal != "") {
			$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->lookupCacheOption($curVal);
			if ($this->TemplateProcedureRecord->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Procedure Record'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateProcedureRecord->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->CurrentValue;
				}
			}
		} else {
			$this->TemplateProcedureRecord->ViewValue = NULL;
		}
		$this->TemplateProcedureRecord->ViewCustomAttributes = "";

		// TemplateMedicationsadvised
		$curVal = strval($this->TemplateMedicationsadvised->CurrentValue);
		if ($curVal != "") {
			$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->lookupCacheOption($curVal);
			if ($this->TemplateMedicationsadvised->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Medications Advised'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMedicationsadvised->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->CurrentValue;
				}
			}
		} else {
			$this->TemplateMedicationsadvised->ViewValue = NULL;
		}
		$this->TemplateMedicationsadvised->ViewCustomAttributes = "";

		// TemplatePostProcedureInstructions
		$curVal = strval($this->TemplatePostProcedureInstructions->CurrentValue);
		if ($curVal != "") {
			$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->lookupCacheOption($curVal);
			if ($this->TemplatePostProcedureInstructions->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Post Procedure Instructions'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePostProcedureInstructions->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->CurrentValue;
				}
			}
		} else {
			$this->TemplatePostProcedureInstructions->ViewValue = NULL;
		}
		$this->TemplatePostProcedureInstructions->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

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

		// PreTreatment
		$this->PreTreatment->LinkCustomAttributes = "";
		$this->PreTreatment->HrefValue = "";
		$this->PreTreatment->TooltipValue = "";

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

		// ERA
		$this->ERA->LinkCustomAttributes = "";
		$this->ERA->HrefValue = "";
		$this->ERA->TooltipValue = "";

		// UCLcm
		$this->UCLcm->LinkCustomAttributes = "";
		$this->UCLcm->HrefValue = "";
		$this->UCLcm->TooltipValue = "";

		// DATEOFSTART
		$this->DATEOFSTART->LinkCustomAttributes = "";
		$this->DATEOFSTART->HrefValue = "";
		$this->DATEOFSTART->TooltipValue = "";

		// DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
		$this->DATEOFEMBRYOTRANSFER->HrefValue = "";
		$this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

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

		// Code1
		$this->Code1->LinkCustomAttributes = "";
		$this->Code1->HrefValue = "";
		$this->Code1->TooltipValue = "";

		// Code2
		$this->Code2->LinkCustomAttributes = "";
		$this->Code2->HrefValue = "";
		$this->Code2->TooltipValue = "";

		// CellStage1
		$this->CellStage1->LinkCustomAttributes = "";
		$this->CellStage1->HrefValue = "";
		$this->CellStage1->TooltipValue = "";

		// CellStage2
		$this->CellStage2->LinkCustomAttributes = "";
		$this->CellStage2->HrefValue = "";
		$this->CellStage2->TooltipValue = "";

		// Grade1
		$this->Grade1->LinkCustomAttributes = "";
		$this->Grade1->HrefValue = "";
		$this->Grade1->TooltipValue = "";

		// Grade2
		$this->Grade2->LinkCustomAttributes = "";
		$this->Grade2->HrefValue = "";
		$this->Grade2->TooltipValue = "";

		// ProcedureRecord
		$this->ProcedureRecord->LinkCustomAttributes = "";
		$this->ProcedureRecord->HrefValue = "";
		$this->ProcedureRecord->TooltipValue = "";

		// Medicationsadvised
		$this->Medicationsadvised->LinkCustomAttributes = "";
		$this->Medicationsadvised->HrefValue = "";
		$this->Medicationsadvised->TooltipValue = "";

		// PostProcedureInstructions
		$this->PostProcedureInstructions->LinkCustomAttributes = "";
		$this->PostProcedureInstructions->HrefValue = "";
		$this->PostProcedureInstructions->TooltipValue = "";

		// PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
		$this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
		$this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

		// ReviewDate
		$this->ReviewDate->LinkCustomAttributes = "";
		$this->ReviewDate->HrefValue = "";
		$this->ReviewDate->TooltipValue = "";

		// ReviewDoctor
		$this->ReviewDoctor->LinkCustomAttributes = "";
		$this->ReviewDoctor->HrefValue = "";
		$this->ReviewDoctor->TooltipValue = "";

		// TemplateProcedureRecord
		$this->TemplateProcedureRecord->LinkCustomAttributes = "";
		$this->TemplateProcedureRecord->HrefValue = "";
		$this->TemplateProcedureRecord->TooltipValue = "";

		// TemplateMedicationsadvised
		$this->TemplateMedicationsadvised->LinkCustomAttributes = "";
		$this->TemplateMedicationsadvised->HrefValue = "";
		$this->TemplateMedicationsadvised->TooltipValue = "";

		// TemplatePostProcedureInstructions
		$this->TemplatePostProcedureInstructions->LinkCustomAttributes = "";
		$this->TemplatePostProcedureInstructions->HrefValue = "";
		$this->TemplatePostProcedureInstructions->TooltipValue = "";

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

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (!$this->Name->Raw)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// ARTCycle
		$this->ARTCycle->EditAttrs["class"] = "form-control";
		$this->ARTCycle->EditCustomAttributes = "";
		$this->ARTCycle->EditValue = $this->ARTCycle->options(TRUE);

		// Consultant
		$this->Consultant->EditAttrs["class"] = "form-control";
		$this->Consultant->EditCustomAttributes = "";
		if (!$this->Consultant->Raw)
			$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
		$this->Consultant->EditValue = $this->Consultant->CurrentValue;
		$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

		// InseminatinTechnique
		$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
		$this->InseminatinTechnique->EditCustomAttributes = "";
		$this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(TRUE);

		// IndicationForART
		$this->IndicationForART->EditAttrs["class"] = "form-control";
		$this->IndicationForART->EditCustomAttributes = "";
		if (!$this->IndicationForART->Raw)
			$this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
		$this->IndicationForART->EditValue = $this->IndicationForART->CurrentValue;
		$this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

		// PreTreatment
		$this->PreTreatment->EditAttrs["class"] = "form-control";
		$this->PreTreatment->EditCustomAttributes = "";
		$this->PreTreatment->EditValue = $this->PreTreatment->options(TRUE);

		// Hysteroscopy
		$this->Hysteroscopy->EditAttrs["class"] = "form-control";
		$this->Hysteroscopy->EditCustomAttributes = "";
		$this->Hysteroscopy->EditValue = $this->Hysteroscopy->options(TRUE);

		// EndometrialScratching
		$this->EndometrialScratching->EditAttrs["class"] = "form-control";
		$this->EndometrialScratching->EditCustomAttributes = "";
		$this->EndometrialScratching->EditValue = $this->EndometrialScratching->options(TRUE);

		// TrialCannulation
		$this->TrialCannulation->EditAttrs["class"] = "form-control";
		$this->TrialCannulation->EditCustomAttributes = "";
		$this->TrialCannulation->EditValue = $this->TrialCannulation->options(TRUE);

		// CYCLETYPE
		$this->CYCLETYPE->EditAttrs["class"] = "form-control";
		$this->CYCLETYPE->EditCustomAttributes = "";
		$this->CYCLETYPE->EditValue = $this->CYCLETYPE->options(TRUE);

		// HRTCYCLE
		$this->HRTCYCLE->EditAttrs["class"] = "form-control";
		$this->HRTCYCLE->EditCustomAttributes = "";
		if (!$this->HRTCYCLE->Raw)
			$this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
		$this->HRTCYCLE->EditValue = $this->HRTCYCLE->CurrentValue;
		$this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

		// OralEstrogenDosage
		$this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
		$this->OralEstrogenDosage->EditCustomAttributes = "";
		$this->OralEstrogenDosage->EditValue = $this->OralEstrogenDosage->options(TRUE);

		// VaginalEstrogen
		$this->VaginalEstrogen->EditAttrs["class"] = "form-control";
		$this->VaginalEstrogen->EditCustomAttributes = "";
		if (!$this->VaginalEstrogen->Raw)
			$this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
		$this->VaginalEstrogen->EditValue = $this->VaginalEstrogen->CurrentValue;
		$this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

		// GCSF
		$this->GCSF->EditAttrs["class"] = "form-control";
		$this->GCSF->EditCustomAttributes = "";
		$this->GCSF->EditValue = $this->GCSF->options(TRUE);

		// ActivatedPRP
		$this->ActivatedPRP->EditAttrs["class"] = "form-control";
		$this->ActivatedPRP->EditCustomAttributes = "";
		$this->ActivatedPRP->EditValue = $this->ActivatedPRP->options(TRUE);

		// ERA
		$this->ERA->EditAttrs["class"] = "form-control";
		$this->ERA->EditCustomAttributes = "";
		$this->ERA->EditValue = $this->ERA->options(TRUE);

		// UCLcm
		$this->UCLcm->EditAttrs["class"] = "form-control";
		$this->UCLcm->EditCustomAttributes = "";
		if (!$this->UCLcm->Raw)
			$this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
		$this->UCLcm->EditValue = $this->UCLcm->CurrentValue;
		$this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

		// DATEOFSTART
		$this->DATEOFSTART->EditAttrs["class"] = "form-control";
		$this->DATEOFSTART->EditCustomAttributes = "";
		$this->DATEOFSTART->EditValue = FormatDateTime($this->DATEOFSTART->CurrentValue, 11);
		$this->DATEOFSTART->PlaceHolder = RemoveHtml($this->DATEOFSTART->caption());

		// DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
		$this->DATEOFEMBRYOTRANSFER->EditCustomAttributes = "";
		$this->DATEOFEMBRYOTRANSFER->EditValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11);
		$this->DATEOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATEOFEMBRYOTRANSFER->caption());

		// DAYOFEMBRYOTRANSFER
		$this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
		$this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
		if (!$this->DAYOFEMBRYOTRANSFER->Raw)
			$this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
		$this->DAYOFEMBRYOTRANSFER->EditValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
		$this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

		// NOOFEMBRYOSTHAWED
		$this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
		$this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
		if (!$this->NOOFEMBRYOSTHAWED->Raw)
			$this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
		$this->NOOFEMBRYOSTHAWED->EditValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
		$this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

		// NOOFEMBRYOSTRANSFERRED
		$this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
		$this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
		if (!$this->NOOFEMBRYOSTRANSFERRED->Raw)
			$this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
		$this->NOOFEMBRYOSTRANSFERRED->EditValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
		$this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

		// DAYOFEMBRYOS
		$this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
		$this->DAYOFEMBRYOS->EditCustomAttributes = "";
		if (!$this->DAYOFEMBRYOS->Raw)
			$this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
		$this->DAYOFEMBRYOS->EditValue = $this->DAYOFEMBRYOS->CurrentValue;
		$this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

		// CRYOPRESERVEDEMBRYOS
		$this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
		$this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
		if (!$this->CRYOPRESERVEDEMBRYOS->Raw)
			$this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
		$this->CRYOPRESERVEDEMBRYOS->EditValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
		$this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

		// Code1
		$this->Code1->EditAttrs["class"] = "form-control";
		$this->Code1->EditCustomAttributes = "";
		if (!$this->Code1->Raw)
			$this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
		$this->Code1->EditValue = $this->Code1->CurrentValue;
		$this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

		// Code2
		$this->Code2->EditAttrs["class"] = "form-control";
		$this->Code2->EditCustomAttributes = "";
		if (!$this->Code2->Raw)
			$this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
		$this->Code2->EditValue = $this->Code2->CurrentValue;
		$this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

		// CellStage1
		$this->CellStage1->EditAttrs["class"] = "form-control";
		$this->CellStage1->EditCustomAttributes = "";
		if (!$this->CellStage1->Raw)
			$this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
		$this->CellStage1->EditValue = $this->CellStage1->CurrentValue;
		$this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

		// CellStage2
		$this->CellStage2->EditAttrs["class"] = "form-control";
		$this->CellStage2->EditCustomAttributes = "";
		if (!$this->CellStage2->Raw)
			$this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
		$this->CellStage2->EditValue = $this->CellStage2->CurrentValue;
		$this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

		// Grade1
		$this->Grade1->EditAttrs["class"] = "form-control";
		$this->Grade1->EditCustomAttributes = "";
		if (!$this->Grade1->Raw)
			$this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
		$this->Grade1->EditValue = $this->Grade1->CurrentValue;
		$this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

		// Grade2
		$this->Grade2->EditAttrs["class"] = "form-control";
		$this->Grade2->EditCustomAttributes = "";
		if (!$this->Grade2->Raw)
			$this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
		$this->Grade2->EditValue = $this->Grade2->CurrentValue;
		$this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

		// ProcedureRecord
		$this->ProcedureRecord->EditAttrs["class"] = "form-control";
		$this->ProcedureRecord->EditCustomAttributes = "";
		$this->ProcedureRecord->EditValue = $this->ProcedureRecord->CurrentValue;
		$this->ProcedureRecord->PlaceHolder = RemoveHtml($this->ProcedureRecord->caption());

		// Medicationsadvised
		$this->Medicationsadvised->EditAttrs["class"] = "form-control";
		$this->Medicationsadvised->EditCustomAttributes = "";
		$this->Medicationsadvised->EditValue = $this->Medicationsadvised->CurrentValue;
		$this->Medicationsadvised->PlaceHolder = RemoveHtml($this->Medicationsadvised->caption());

		// PostProcedureInstructions
		$this->PostProcedureInstructions->EditAttrs["class"] = "form-control";
		$this->PostProcedureInstructions->EditCustomAttributes = "";
		$this->PostProcedureInstructions->EditValue = $this->PostProcedureInstructions->CurrentValue;
		$this->PostProcedureInstructions->PlaceHolder = RemoveHtml($this->PostProcedureInstructions->caption());

		// PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG->EditAttrs["class"] = "form-control";
		$this->PregnancyTestingWithSerumBetaHcG->EditCustomAttributes = "";
		if (!$this->PregnancyTestingWithSerumBetaHcG->Raw)
			$this->PregnancyTestingWithSerumBetaHcG->CurrentValue = HtmlDecode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
		$this->PregnancyTestingWithSerumBetaHcG->EditValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
		$this->PregnancyTestingWithSerumBetaHcG->PlaceHolder = RemoveHtml($this->PregnancyTestingWithSerumBetaHcG->caption());

		// ReviewDate
		$this->ReviewDate->EditAttrs["class"] = "form-control";
		$this->ReviewDate->EditCustomAttributes = "";
		$this->ReviewDate->EditValue = FormatDateTime($this->ReviewDate->CurrentValue, 8);
		$this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

		// ReviewDoctor
		$this->ReviewDoctor->EditAttrs["class"] = "form-control";
		$this->ReviewDoctor->EditCustomAttributes = "";
		if (!$this->ReviewDoctor->Raw)
			$this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
		$this->ReviewDoctor->EditValue = $this->ReviewDoctor->CurrentValue;
		$this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

		// TemplateProcedureRecord
		$this->TemplateProcedureRecord->EditAttrs["class"] = "form-control";
		$this->TemplateProcedureRecord->EditCustomAttributes = "";

		// TemplateMedicationsadvised
		$this->TemplateMedicationsadvised->EditAttrs["class"] = "form-control";
		$this->TemplateMedicationsadvised->EditCustomAttributes = "";

		// TemplatePostProcedureInstructions
		$this->TemplatePostProcedureInstructions->EditAttrs["class"] = "form-control";
		$this->TemplatePostProcedureInstructions->EditCustomAttributes = "";

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
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->InseminatinTechnique);
					$doc->exportCaption($this->IndicationForART);
					$doc->exportCaption($this->PreTreatment);
					$doc->exportCaption($this->Hysteroscopy);
					$doc->exportCaption($this->EndometrialScratching);
					$doc->exportCaption($this->TrialCannulation);
					$doc->exportCaption($this->CYCLETYPE);
					$doc->exportCaption($this->HRTCYCLE);
					$doc->exportCaption($this->OralEstrogenDosage);
					$doc->exportCaption($this->VaginalEstrogen);
					$doc->exportCaption($this->GCSF);
					$doc->exportCaption($this->ActivatedPRP);
					$doc->exportCaption($this->ERA);
					$doc->exportCaption($this->UCLcm);
					$doc->exportCaption($this->DATEOFSTART);
					$doc->exportCaption($this->DATEOFEMBRYOTRANSFER);
					$doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
					$doc->exportCaption($this->NOOFEMBRYOSTHAWED);
					$doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
					$doc->exportCaption($this->DAYOFEMBRYOS);
					$doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
					$doc->exportCaption($this->Code1);
					$doc->exportCaption($this->Code2);
					$doc->exportCaption($this->CellStage1);
					$doc->exportCaption($this->CellStage2);
					$doc->exportCaption($this->Grade1);
					$doc->exportCaption($this->Grade2);
					$doc->exportCaption($this->ProcedureRecord);
					$doc->exportCaption($this->Medicationsadvised);
					$doc->exportCaption($this->PostProcedureInstructions);
					$doc->exportCaption($this->PregnancyTestingWithSerumBetaHcG);
					$doc->exportCaption($this->ReviewDate);
					$doc->exportCaption($this->ReviewDoctor);
					$doc->exportCaption($this->TemplateProcedureRecord);
					$doc->exportCaption($this->TemplateMedicationsadvised);
					$doc->exportCaption($this->TemplatePostProcedureInstructions);
					$doc->exportCaption($this->TidNo);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->InseminatinTechnique);
					$doc->exportCaption($this->IndicationForART);
					$doc->exportCaption($this->PreTreatment);
					$doc->exportCaption($this->Hysteroscopy);
					$doc->exportCaption($this->EndometrialScratching);
					$doc->exportCaption($this->TrialCannulation);
					$doc->exportCaption($this->CYCLETYPE);
					$doc->exportCaption($this->HRTCYCLE);
					$doc->exportCaption($this->OralEstrogenDosage);
					$doc->exportCaption($this->VaginalEstrogen);
					$doc->exportCaption($this->GCSF);
					$doc->exportCaption($this->ActivatedPRP);
					$doc->exportCaption($this->ERA);
					$doc->exportCaption($this->UCLcm);
					$doc->exportCaption($this->DATEOFSTART);
					$doc->exportCaption($this->DATEOFEMBRYOTRANSFER);
					$doc->exportCaption($this->DAYOFEMBRYOTRANSFER);
					$doc->exportCaption($this->NOOFEMBRYOSTHAWED);
					$doc->exportCaption($this->NOOFEMBRYOSTRANSFERRED);
					$doc->exportCaption($this->DAYOFEMBRYOS);
					$doc->exportCaption($this->CRYOPRESERVEDEMBRYOS);
					$doc->exportCaption($this->Code1);
					$doc->exportCaption($this->Code2);
					$doc->exportCaption($this->CellStage1);
					$doc->exportCaption($this->CellStage2);
					$doc->exportCaption($this->Grade1);
					$doc->exportCaption($this->Grade2);
					$doc->exportCaption($this->PregnancyTestingWithSerumBetaHcG);
					$doc->exportCaption($this->ReviewDate);
					$doc->exportCaption($this->ReviewDoctor);
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
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->Name);
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->InseminatinTechnique);
						$doc->exportField($this->IndicationForART);
						$doc->exportField($this->PreTreatment);
						$doc->exportField($this->Hysteroscopy);
						$doc->exportField($this->EndometrialScratching);
						$doc->exportField($this->TrialCannulation);
						$doc->exportField($this->CYCLETYPE);
						$doc->exportField($this->HRTCYCLE);
						$doc->exportField($this->OralEstrogenDosage);
						$doc->exportField($this->VaginalEstrogen);
						$doc->exportField($this->GCSF);
						$doc->exportField($this->ActivatedPRP);
						$doc->exportField($this->ERA);
						$doc->exportField($this->UCLcm);
						$doc->exportField($this->DATEOFSTART);
						$doc->exportField($this->DATEOFEMBRYOTRANSFER);
						$doc->exportField($this->DAYOFEMBRYOTRANSFER);
						$doc->exportField($this->NOOFEMBRYOSTHAWED);
						$doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
						$doc->exportField($this->DAYOFEMBRYOS);
						$doc->exportField($this->CRYOPRESERVEDEMBRYOS);
						$doc->exportField($this->Code1);
						$doc->exportField($this->Code2);
						$doc->exportField($this->CellStage1);
						$doc->exportField($this->CellStage2);
						$doc->exportField($this->Grade1);
						$doc->exportField($this->Grade2);
						$doc->exportField($this->ProcedureRecord);
						$doc->exportField($this->Medicationsadvised);
						$doc->exportField($this->PostProcedureInstructions);
						$doc->exportField($this->PregnancyTestingWithSerumBetaHcG);
						$doc->exportField($this->ReviewDate);
						$doc->exportField($this->ReviewDoctor);
						$doc->exportField($this->TemplateProcedureRecord);
						$doc->exportField($this->TemplateMedicationsadvised);
						$doc->exportField($this->TemplatePostProcedureInstructions);
						$doc->exportField($this->TidNo);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->Name);
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->InseminatinTechnique);
						$doc->exportField($this->IndicationForART);
						$doc->exportField($this->PreTreatment);
						$doc->exportField($this->Hysteroscopy);
						$doc->exportField($this->EndometrialScratching);
						$doc->exportField($this->TrialCannulation);
						$doc->exportField($this->CYCLETYPE);
						$doc->exportField($this->HRTCYCLE);
						$doc->exportField($this->OralEstrogenDosage);
						$doc->exportField($this->VaginalEstrogen);
						$doc->exportField($this->GCSF);
						$doc->exportField($this->ActivatedPRP);
						$doc->exportField($this->ERA);
						$doc->exportField($this->UCLcm);
						$doc->exportField($this->DATEOFSTART);
						$doc->exportField($this->DATEOFEMBRYOTRANSFER);
						$doc->exportField($this->DAYOFEMBRYOTRANSFER);
						$doc->exportField($this->NOOFEMBRYOSTHAWED);
						$doc->exportField($this->NOOFEMBRYOSTRANSFERRED);
						$doc->exportField($this->DAYOFEMBRYOS);
						$doc->exportField($this->CRYOPRESERVEDEMBRYOS);
						$doc->exportField($this->Code1);
						$doc->exportField($this->Code2);
						$doc->exportField($this->CellStage1);
						$doc->exportField($this->CellStage2);
						$doc->exportField($this->Grade1);
						$doc->exportField($this->Grade2);
						$doc->exportField($this->PregnancyTestingWithSerumBetaHcG);
						$doc->exportField($this->ReviewDate);
						$doc->exportField($this->ReviewDoctor);
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