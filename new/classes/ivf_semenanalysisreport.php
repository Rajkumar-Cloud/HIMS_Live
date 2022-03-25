<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_semenanalysisreport
 */
class ivf_semenanalysisreport extends DbTable
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
	public $PatientName;
	public $HusbandName;
	public $RequestDr;
	public $CollectionDate;
	public $ResultDate;
	public $RequestSample;
	public $CollectionType;
	public $CollectionMethod;
	public $Medicationused;
	public $DifficultiesinCollection;
	public $pH;
	public $Timeofcollection;
	public $Timeofexamination;
	public $Volume;
	public $Concentration;
	public $Total;
	public $ProgressiveMotility;
	public $NonProgrssiveMotile;
	public $Immotile;
	public $TotalProgrssiveMotile;
	public $Appearance;
	public $Homogenosity;
	public $CompleteSample;
	public $Liquefactiontime;
	public $Normal;
	public $Abnormal;
	public $Headdefects;
	public $MidpieceDefects;
	public $TailDefects;
	public $NormalProgMotile;
	public $ImmatureForms;
	public $Leucocytes;
	public $Agglutination;
	public $Debris;
	public $Diagnosis;
	public $Observations;
	public $Signature;
	public $SemenOrgin;
	public $Donor;
	public $DonorBloodgroup;
	public $Tank;
	public $Location;
	public $Volume1;
	public $Concentration1;
	public $Total1;
	public $ProgressiveMotility1;
	public $NonProgrssiveMotile1;
	public $Immotile1;
	public $TotalProgrssiveMotile1;
	public $TidNo;
	public $Color;
	public $DoneBy;
	public $Method;
	public $Abstinence;
	public $ProcessedBy;
	public $InseminationTime;
	public $InseminationBy;
	public $Big;
	public $Medium;
	public $Small;
	public $NoHalo;
	public $Fragmented;
	public $NonFragmented;
	public $DFI;
	public $IsueBy;
	public $Volume2;
	public $Concentration2;
	public $Total2;
	public $ProgressiveMotility2;
	public $NonProgrssiveMotile2;
	public $Immotile2;
	public $TotalProgrssiveMotile2;
	public $MACS;
	public $IssuedBy;
	public $IssuedTo;
	public $PaID;
	public $PaName;
	public $PaMobile;
	public $PartnerID;
	public $PartnerName;
	public $PartnerMobile;
	public $PREG_TEST_DATE;
	public $SPECIFIC_PROBLEMS;
	public $IMSC_1;
	public $IMSC_2;
	public $LIQUIFACTION_STORAGE;
	public $IUI_PREP_METHOD;
	public $TIME_FROM_TRIGGER;
	public $COLLECTION_TO_PREPARATION;
	public $TIME_FROM_PREP_TO_INSEM;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_semenanalysisreport';
		$this->TableName = 'ivf_semenanalysisreport';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_semenanalysisreport`";
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
		$this->id = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->IsForeignKey = TRUE; // Foreign key field
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// PatientName
		$this->PatientName = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->IsForeignKey = TRUE; // Foreign key field
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// HusbandName
		$this->HusbandName = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_HusbandName', 'HusbandName', '`HusbandName`', '`HusbandName`', 200, 45, -1, FALSE, '`HusbandName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandName->Sortable = TRUE; // Allow sort
		$this->fields['HusbandName'] = &$this->HusbandName;

		// RequestDr
		$this->RequestDr = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_RequestDr', 'RequestDr', '`RequestDr`', '`RequestDr`', 200, 45, -1, FALSE, '`RequestDr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RequestDr->Sortable = TRUE; // Allow sort
		$this->fields['RequestDr'] = &$this->RequestDr;

		// CollectionDate
		$this->CollectionDate = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_CollectionDate', 'CollectionDate', '`CollectionDate`', CastDateFieldForLike("`CollectionDate`", 0, "DB"), 135, 19, 0, FALSE, '`CollectionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CollectionDate->Sortable = TRUE; // Allow sort
		$this->CollectionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CollectionDate'] = &$this->CollectionDate;

		// ResultDate
		$this->ResultDate = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// RequestSample
		$this->RequestSample = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_RequestSample', 'RequestSample', '`RequestSample`', '`RequestSample`', 200, 45, -1, FALSE, '`RequestSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RequestSample->Sortable = TRUE; // Allow sort
		$this->RequestSample->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RequestSample->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->RequestSample->Lookup = new Lookup('RequestSample', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RequestSample->OptionCount = 5;
		$this->fields['RequestSample'] = &$this->RequestSample;

		// CollectionType
		$this->CollectionType = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_CollectionType', 'CollectionType', '`CollectionType`', '`CollectionType`', 200, 45, -1, FALSE, '`CollectionType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CollectionType->Sortable = TRUE; // Allow sort
		$this->CollectionType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CollectionType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CollectionType->Lookup = new Lookup('CollectionType', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CollectionType->OptionCount = 2;
		$this->fields['CollectionType'] = &$this->CollectionType;

		// CollectionMethod
		$this->CollectionMethod = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_CollectionMethod', 'CollectionMethod', '`CollectionMethod`', '`CollectionMethod`', 200, 45, -1, FALSE, '`CollectionMethod`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CollectionMethod->Sortable = TRUE; // Allow sort
		$this->CollectionMethod->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CollectionMethod->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CollectionMethod->Lookup = new Lookup('CollectionMethod', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CollectionMethod->OptionCount = 2;
		$this->fields['CollectionMethod'] = &$this->CollectionMethod;

		// Medicationused
		$this->Medicationused = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Medicationused', 'Medicationused', '`Medicationused`', '`Medicationused`', 200, 45, -1, FALSE, '`Medicationused`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Medicationused->Sortable = TRUE; // Allow sort
		$this->Medicationused->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Medicationused->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Medicationused->Lookup = new Lookup('Medicationused', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Medicationused->OptionCount = 2;
		$this->fields['Medicationused'] = &$this->Medicationused;

		// DifficultiesinCollection
		$this->DifficultiesinCollection = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_DifficultiesinCollection', 'DifficultiesinCollection', '`DifficultiesinCollection`', '`DifficultiesinCollection`', 200, 45, -1, FALSE, '`DifficultiesinCollection`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DifficultiesinCollection->Sortable = TRUE; // Allow sort
		$this->DifficultiesinCollection->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DifficultiesinCollection->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DifficultiesinCollection->Lookup = new Lookup('DifficultiesinCollection', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->DifficultiesinCollection->OptionCount = 2;
		$this->fields['DifficultiesinCollection'] = &$this->DifficultiesinCollection;

		// pH
		$this->pH = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_pH', 'pH', '`pH`', '`pH`', 200, 45, -1, FALSE, '`pH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pH->Sortable = TRUE; // Allow sort
		$this->fields['pH'] = &$this->pH;

		// Timeofcollection
		$this->Timeofcollection = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Timeofcollection', 'Timeofcollection', '`Timeofcollection`', '`Timeofcollection`', 200, 45, 3, FALSE, '`Timeofcollection`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Timeofcollection->Sortable = TRUE; // Allow sort
		$this->fields['Timeofcollection'] = &$this->Timeofcollection;

		// Timeofexamination
		$this->Timeofexamination = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Timeofexamination', 'Timeofexamination', '`Timeofexamination`', '`Timeofexamination`', 200, 45, 3, FALSE, '`Timeofexamination`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Timeofexamination->Sortable = TRUE; // Allow sort
		$this->fields['Timeofexamination'] = &$this->Timeofexamination;

		// Volume
		$this->Volume = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 200, 45, -1, FALSE, '`Volume`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume->Sortable = TRUE; // Allow sort
		$this->fields['Volume'] = &$this->Volume;

		// Concentration
		$this->Concentration = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Concentration', 'Concentration', '`Concentration`', '`Concentration`', 200, 45, -1, FALSE, '`Concentration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration->Sortable = TRUE; // Allow sort
		$this->fields['Concentration'] = &$this->Concentration;

		// Total
		$this->Total = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Total', 'Total', '`Total`', '`Total`', 200, 45, -1, FALSE, '`Total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total->Sortable = TRUE; // Allow sort
		$this->fields['Total'] = &$this->Total;

		// ProgressiveMotility
		$this->ProgressiveMotility = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ProgressiveMotility', 'ProgressiveMotility', '`ProgressiveMotility`', '`ProgressiveMotility`', 200, 45, -1, FALSE, '`ProgressiveMotility`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility->Sortable = TRUE; // Allow sort
		$this->fields['ProgressiveMotility'] = &$this->ProgressiveMotility;

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NonProgrssiveMotile', 'NonProgrssiveMotile', '`NonProgrssiveMotile`', '`NonProgrssiveMotile`', 200, 45, -1, FALSE, '`NonProgrssiveMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile->Sortable = TRUE; // Allow sort
		$this->fields['NonProgrssiveMotile'] = &$this->NonProgrssiveMotile;

		// Immotile
		$this->Immotile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Immotile', 'Immotile', '`Immotile`', '`Immotile`', 200, 45, -1, FALSE, '`Immotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile->Sortable = TRUE; // Allow sort
		$this->fields['Immotile'] = &$this->Immotile;

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TotalProgrssiveMotile', 'TotalProgrssiveMotile', '`TotalProgrssiveMotile`', '`TotalProgrssiveMotile`', 200, 45, -1, FALSE, '`TotalProgrssiveMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile->Sortable = TRUE; // Allow sort
		$this->fields['TotalProgrssiveMotile'] = &$this->TotalProgrssiveMotile;

		// Appearance
		$this->Appearance = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Appearance', 'Appearance', '`Appearance`', '`Appearance`', 200, 45, -1, FALSE, '`Appearance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Appearance->Sortable = TRUE; // Allow sort
		$this->fields['Appearance'] = &$this->Appearance;

		// Homogenosity
		$this->Homogenosity = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Homogenosity', 'Homogenosity', '`Homogenosity`', '`Homogenosity`', 200, 45, -1, FALSE, '`Homogenosity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Homogenosity->Sortable = TRUE; // Allow sort
		$this->Homogenosity->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Homogenosity->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Homogenosity->Lookup = new Lookup('Homogenosity', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Homogenosity->OptionCount = 2;
		$this->fields['Homogenosity'] = &$this->Homogenosity;

		// CompleteSample
		$this->CompleteSample = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_CompleteSample', 'CompleteSample', '`CompleteSample`', '`CompleteSample`', 200, 45, -1, FALSE, '`CompleteSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CompleteSample->Sortable = TRUE; // Allow sort
		$this->CompleteSample->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CompleteSample->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->CompleteSample->Lookup = new Lookup('CompleteSample', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CompleteSample->OptionCount = 3;
		$this->fields['CompleteSample'] = &$this->CompleteSample;

		// Liquefactiontime
		$this->Liquefactiontime = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Liquefactiontime', 'Liquefactiontime', '`Liquefactiontime`', '`Liquefactiontime`', 200, 45, -1, FALSE, '`Liquefactiontime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Liquefactiontime->Sortable = TRUE; // Allow sort
		$this->fields['Liquefactiontime'] = &$this->Liquefactiontime;

		// Normal
		$this->Normal = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Normal', 'Normal', '`Normal`', '`Normal`', 200, 45, -1, FALSE, '`Normal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Normal->Sortable = TRUE; // Allow sort
		$this->fields['Normal'] = &$this->Normal;

		// Abnormal
		$this->Abnormal = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, 45, -1, FALSE, '`Abnormal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormal->Sortable = TRUE; // Allow sort
		$this->fields['Abnormal'] = &$this->Abnormal;

		// Headdefects
		$this->Headdefects = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Headdefects', 'Headdefects', '`Headdefects`', '`Headdefects`', 200, 45, -1, FALSE, '`Headdefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Headdefects->Sortable = TRUE; // Allow sort
		$this->fields['Headdefects'] = &$this->Headdefects;

		// MidpieceDefects
		$this->MidpieceDefects = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_MidpieceDefects', 'MidpieceDefects', '`MidpieceDefects`', '`MidpieceDefects`', 200, 45, -1, FALSE, '`MidpieceDefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MidpieceDefects->Sortable = TRUE; // Allow sort
		$this->fields['MidpieceDefects'] = &$this->MidpieceDefects;

		// TailDefects
		$this->TailDefects = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TailDefects', 'TailDefects', '`TailDefects`', '`TailDefects`', 200, 45, -1, FALSE, '`TailDefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TailDefects->Sortable = TRUE; // Allow sort
		$this->fields['TailDefects'] = &$this->TailDefects;

		// NormalProgMotile
		$this->NormalProgMotile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NormalProgMotile', 'NormalProgMotile', '`NormalProgMotile`', '`NormalProgMotile`', 200, 45, -1, FALSE, '`NormalProgMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NormalProgMotile->Sortable = TRUE; // Allow sort
		$this->fields['NormalProgMotile'] = &$this->NormalProgMotile;

		// ImmatureForms
		$this->ImmatureForms = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ImmatureForms', 'ImmatureForms', '`ImmatureForms`', '`ImmatureForms`', 200, 45, -1, FALSE, '`ImmatureForms`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ImmatureForms->Sortable = TRUE; // Allow sort
		$this->fields['ImmatureForms'] = &$this->ImmatureForms;

		// Leucocytes
		$this->Leucocytes = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Leucocytes', 'Leucocytes', '`Leucocytes`', '`Leucocytes`', 200, 45, -1, FALSE, '`Leucocytes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Leucocytes->Sortable = TRUE; // Allow sort
		$this->fields['Leucocytes'] = &$this->Leucocytes;

		// Agglutination
		$this->Agglutination = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Agglutination', 'Agglutination', '`Agglutination`', '`Agglutination`', 200, 45, -1, FALSE, '`Agglutination`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Agglutination->Sortable = TRUE; // Allow sort
		$this->fields['Agglutination'] = &$this->Agglutination;

		// Debris
		$this->Debris = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Debris', 'Debris', '`Debris`', '`Debris`', 200, 45, -1, FALSE, '`Debris`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Debris->Sortable = TRUE; // Allow sort
		$this->fields['Debris'] = &$this->Debris;

		// Diagnosis
		$this->Diagnosis = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Diagnosis', 'Diagnosis', '`Diagnosis`', '`Diagnosis`', 201, 65535, -1, FALSE, '`Diagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Diagnosis->Sortable = TRUE; // Allow sort
		$this->fields['Diagnosis'] = &$this->Diagnosis;

		// Observations
		$this->Observations = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Observations', 'Observations', '`Observations`', '`Observations`', 201, 65535, -1, FALSE, '`Observations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Observations->Sortable = TRUE; // Allow sort
		$this->fields['Observations'] = &$this->Observations;

		// Signature
		$this->Signature = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Signature', 'Signature', '`Signature`', '`Signature`', 200, 45, -1, FALSE, '`Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Signature->Sortable = TRUE; // Allow sort
		$this->fields['Signature'] = &$this->Signature;

		// SemenOrgin
		$this->SemenOrgin = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_SemenOrgin', 'SemenOrgin', '`SemenOrgin`', '`SemenOrgin`', 200, 45, -1, FALSE, '`SemenOrgin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SemenOrgin->Sortable = TRUE; // Allow sort
		$this->SemenOrgin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SemenOrgin->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->SemenOrgin->Lookup = new Lookup('SemenOrgin', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SemenOrgin->OptionCount = 4;
		$this->fields['SemenOrgin'] = &$this->SemenOrgin;

		// Donor
		$this->Donor = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Donor', 'Donor', '`Donor`', '`Donor`', 3, 11, -1, FALSE, '`Donor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Donor->Sortable = TRUE; // Allow sort
		$this->Donor->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Donor->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Donor->Lookup = new Lookup('Donor', 'ivf_donorsemendetails', FALSE, 'id', ["DonorNo","","",""], [], [], [], [], ["BloodGroup"], ["x_DonorBloodgroup"], '`id` DESC', '');
		$this->Donor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Donor'] = &$this->Donor;

		// DonorBloodgroup
		$this->DonorBloodgroup = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_DonorBloodgroup', 'DonorBloodgroup', '`DonorBloodgroup`', '`DonorBloodgroup`', 200, 45, -1, FALSE, '`DonorBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DonorBloodgroup->Sortable = TRUE; // Allow sort
		$this->fields['DonorBloodgroup'] = &$this->DonorBloodgroup;

		// Tank
		$this->Tank = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, 45, -1, FALSE, '`Tank`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tank->Sortable = TRUE; // Allow sort
		$this->fields['Tank'] = &$this->Tank;

		// Location
		$this->Location = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Location', 'Location', '`Location`', '`Location`', 200, 45, -1, FALSE, '`Location`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Location->Sortable = TRUE; // Allow sort
		$this->fields['Location'] = &$this->Location;

		// Volume1
		$this->Volume1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Volume1', 'Volume1', '`Volume1`', '`Volume1`', 200, 45, -1, FALSE, '`Volume1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume1->Sortable = TRUE; // Allow sort
		$this->fields['Volume1'] = &$this->Volume1;

		// Concentration1
		$this->Concentration1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Concentration1', 'Concentration1', '`Concentration1`', '`Concentration1`', 200, 45, -1, FALSE, '`Concentration1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration1->Sortable = TRUE; // Allow sort
		$this->fields['Concentration1'] = &$this->Concentration1;

		// Total1
		$this->Total1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Total1', 'Total1', '`Total1`', '`Total1`', 200, 45, -1, FALSE, '`Total1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total1->Sortable = TRUE; // Allow sort
		$this->fields['Total1'] = &$this->Total1;

		// ProgressiveMotility1
		$this->ProgressiveMotility1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ProgressiveMotility1', 'ProgressiveMotility1', '`ProgressiveMotility1`', '`ProgressiveMotility1`', 200, 45, -1, FALSE, '`ProgressiveMotility1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility1->Sortable = TRUE; // Allow sort
		$this->fields['ProgressiveMotility1'] = &$this->ProgressiveMotility1;

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NonProgrssiveMotile1', 'NonProgrssiveMotile1', '`NonProgrssiveMotile1`', '`NonProgrssiveMotile1`', 200, 45, -1, FALSE, '`NonProgrssiveMotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile1->Sortable = TRUE; // Allow sort
		$this->fields['NonProgrssiveMotile1'] = &$this->NonProgrssiveMotile1;

		// Immotile1
		$this->Immotile1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Immotile1', 'Immotile1', '`Immotile1`', '`Immotile1`', 200, 45, -1, FALSE, '`Immotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile1->Sortable = TRUE; // Allow sort
		$this->fields['Immotile1'] = &$this->Immotile1;

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TotalProgrssiveMotile1', 'TotalProgrssiveMotile1', '`TotalProgrssiveMotile1`', '`TotalProgrssiveMotile1`', 200, 45, -1, FALSE, '`TotalProgrssiveMotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile1->Sortable = TRUE; // Allow sort
		$this->fields['TotalProgrssiveMotile1'] = &$this->TotalProgrssiveMotile1;

		// TidNo
		$this->TidNo = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->IsForeignKey = TRUE; // Foreign key field
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// Color
		$this->Color = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Color', 'Color', '`Color`', '`Color`', 200, 45, -1, FALSE, '`Color`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Color->Sortable = TRUE; // Allow sort
		$this->fields['Color'] = &$this->Color;

		// DoneBy
		$this->DoneBy = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_DoneBy', 'DoneBy', '`DoneBy`', '`DoneBy`', 200, 45, -1, FALSE, '`DoneBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoneBy->Sortable = TRUE; // Allow sort
		$this->fields['DoneBy'] = &$this->DoneBy;

		// Method
		$this->Method = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Method->Sortable = TRUE; // Allow sort
		$this->fields['Method'] = &$this->Method;

		// Abstinence
		$this->Abstinence = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Abstinence', 'Abstinence', '`Abstinence`', '`Abstinence`', 200, 45, -1, FALSE, '`Abstinence`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abstinence->Sortable = TRUE; // Allow sort
		$this->fields['Abstinence'] = &$this->Abstinence;

		// ProcessedBy
		$this->ProcessedBy = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ProcessedBy', 'ProcessedBy', '`ProcessedBy`', '`ProcessedBy`', 200, 45, -1, FALSE, '`ProcessedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcessedBy->Sortable = TRUE; // Allow sort
		$this->fields['ProcessedBy'] = &$this->ProcessedBy;

		// InseminationTime
		$this->InseminationTime = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_InseminationTime', 'InseminationTime', '`InseminationTime`', '`InseminationTime`', 200, 45, -1, FALSE, '`InseminationTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InseminationTime->Sortable = TRUE; // Allow sort
		$this->fields['InseminationTime'] = &$this->InseminationTime;

		// InseminationBy
		$this->InseminationBy = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_InseminationBy', 'InseminationBy', '`InseminationBy`', '`InseminationBy`', 200, 45, -1, FALSE, '`InseminationBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InseminationBy->Sortable = TRUE; // Allow sort
		$this->fields['InseminationBy'] = &$this->InseminationBy;

		// Big
		$this->Big = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Big', 'Big', '`Big`', '`Big`', 200, 45, -1, FALSE, '`Big`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Big->Sortable = TRUE; // Allow sort
		$this->fields['Big'] = &$this->Big;

		// Medium
		$this->Medium = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Medium', 'Medium', '`Medium`', '`Medium`', 200, 45, -1, FALSE, '`Medium`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medium->Sortable = TRUE; // Allow sort
		$this->fields['Medium'] = &$this->Medium;

		// Small
		$this->Small = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Small', 'Small', '`Small`', '`Small`', 200, 45, -1, FALSE, '`Small`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Small->Sortable = TRUE; // Allow sort
		$this->fields['Small'] = &$this->Small;

		// NoHalo
		$this->NoHalo = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NoHalo', 'NoHalo', '`NoHalo`', '`NoHalo`', 200, 45, -1, FALSE, '`NoHalo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoHalo->Sortable = TRUE; // Allow sort
		$this->fields['NoHalo'] = &$this->NoHalo;

		// Fragmented
		$this->Fragmented = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Fragmented', 'Fragmented', '`Fragmented`', '`Fragmented`', 200, 45, -1, FALSE, '`Fragmented`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fragmented->Sortable = TRUE; // Allow sort
		$this->fields['Fragmented'] = &$this->Fragmented;

		// NonFragmented
		$this->NonFragmented = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NonFragmented', 'NonFragmented', '`NonFragmented`', '`NonFragmented`', 200, 45, -1, FALSE, '`NonFragmented`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonFragmented->Sortable = TRUE; // Allow sort
		$this->fields['NonFragmented'] = &$this->NonFragmented;

		// DFI
		$this->DFI = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_DFI', 'DFI', '`DFI`', '`DFI`', 200, 45, -1, FALSE, '`DFI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DFI->Sortable = TRUE; // Allow sort
		$this->fields['DFI'] = &$this->DFI;

		// IsueBy
		$this->IsueBy = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IsueBy', 'IsueBy', '`IsueBy`', '`IsueBy`', 200, 45, -1, FALSE, '`IsueBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsueBy->Sortable = TRUE; // Allow sort
		$this->fields['IsueBy'] = &$this->IsueBy;

		// Volume2
		$this->Volume2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Volume2', 'Volume2', '`Volume2`', '`Volume2`', 200, 45, -1, FALSE, '`Volume2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume2->Sortable = TRUE; // Allow sort
		$this->fields['Volume2'] = &$this->Volume2;

		// Concentration2
		$this->Concentration2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Concentration2', 'Concentration2', '`Concentration2`', '`Concentration2`', 200, 45, -1, FALSE, '`Concentration2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration2->Sortable = TRUE; // Allow sort
		$this->fields['Concentration2'] = &$this->Concentration2;

		// Total2
		$this->Total2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Total2', 'Total2', '`Total2`', '`Total2`', 200, 45, -1, FALSE, '`Total2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total2->Sortable = TRUE; // Allow sort
		$this->fields['Total2'] = &$this->Total2;

		// ProgressiveMotility2
		$this->ProgressiveMotility2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_ProgressiveMotility2', 'ProgressiveMotility2', '`ProgressiveMotility2`', '`ProgressiveMotility2`', 200, 45, -1, FALSE, '`ProgressiveMotility2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility2->Sortable = TRUE; // Allow sort
		$this->fields['ProgressiveMotility2'] = &$this->ProgressiveMotility2;

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_NonProgrssiveMotile2', 'NonProgrssiveMotile2', '`NonProgrssiveMotile2`', '`NonProgrssiveMotile2`', 200, 45, -1, FALSE, '`NonProgrssiveMotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile2->Sortable = TRUE; // Allow sort
		$this->fields['NonProgrssiveMotile2'] = &$this->NonProgrssiveMotile2;

		// Immotile2
		$this->Immotile2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_Immotile2', 'Immotile2', '`Immotile2`', '`Immotile2`', 200, 45, -1, FALSE, '`Immotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile2->Sortable = TRUE; // Allow sort
		$this->fields['Immotile2'] = &$this->Immotile2;

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TotalProgrssiveMotile2', 'TotalProgrssiveMotile2', '`TotalProgrssiveMotile2`', '`TotalProgrssiveMotile2`', 200, 45, -1, FALSE, '`TotalProgrssiveMotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile2->Sortable = TRUE; // Allow sort
		$this->fields['TotalProgrssiveMotile2'] = &$this->TotalProgrssiveMotile2;

		// MACS
		$this->MACS = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, 45, -1, FALSE, '`MACS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->MACS->Sortable = TRUE; // Allow sort
		$this->MACS->Lookup = new Lookup('MACS', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MACS->OptionCount = 1;
		$this->fields['MACS'] = &$this->MACS;

		// IssuedBy
		$this->IssuedBy = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IssuedBy', 'IssuedBy', '`IssuedBy`', '`IssuedBy`', 200, 45, -1, FALSE, '`IssuedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IssuedBy->Sortable = TRUE; // Allow sort
		$this->fields['IssuedBy'] = &$this->IssuedBy;

		// IssuedTo
		$this->IssuedTo = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IssuedTo', 'IssuedTo', '`IssuedTo`', '`IssuedTo`', 200, 45, -1, FALSE, '`IssuedTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IssuedTo->Sortable = TRUE; // Allow sort
		$this->fields['IssuedTo'] = &$this->IssuedTo;

		// PaID
		$this->PaID = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PaID', 'PaID', '`PaID`', '`PaID`', 200, 45, -1, FALSE, '`PaID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaID->Sortable = TRUE; // Allow sort
		$this->fields['PaID'] = &$this->PaID;

		// PaName
		$this->PaName = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PaName', 'PaName', '`PaName`', '`PaName`', 200, 45, -1, FALSE, '`PaName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaName->Sortable = TRUE; // Allow sort
		$this->fields['PaName'] = &$this->PaName;

		// PaMobile
		$this->PaMobile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PaMobile', 'PaMobile', '`PaMobile`', '`PaMobile`', 200, 45, -1, FALSE, '`PaMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaMobile->Sortable = TRUE; // Allow sort
		$this->fields['PaMobile'] = &$this->PaMobile;

		// PartnerID
		$this->PartnerID = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// PartnerName
		$this->PartnerName = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerMobile
		$this->PartnerMobile = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PartnerMobile', 'PartnerMobile', '`PartnerMobile`', '`PartnerMobile`', 200, 45, -1, FALSE, '`PartnerMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerMobile->Sortable = TRUE; // Allow sort
		$this->fields['PartnerMobile'] = &$this->PartnerMobile;

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_PREG_TEST_DATE', 'PREG_TEST_DATE', '`PREG_TEST_DATE`', CastDateFieldForLike("`PREG_TEST_DATE`", 0, "DB"), 135, 19, 0, FALSE, '`PREG_TEST_DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PREG_TEST_DATE->Sortable = TRUE; // Allow sort
		$this->PREG_TEST_DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['PREG_TEST_DATE'] = &$this->PREG_TEST_DATE;

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_SPECIFIC_PROBLEMS', 'SPECIFIC_PROBLEMS', '`SPECIFIC_PROBLEMS`', '`SPECIFIC_PROBLEMS`', 200, 45, -1, FALSE, '`SPECIFIC_PROBLEMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SPECIFIC_PROBLEMS->Sortable = TRUE; // Allow sort
		$this->SPECIFIC_PROBLEMS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SPECIFIC_PROBLEMS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->SPECIFIC_PROBLEMS->Lookup = new Lookup('SPECIFIC_PROBLEMS', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SPECIFIC_PROBLEMS->OptionCount = 6;
		$this->fields['SPECIFIC_PROBLEMS'] = &$this->SPECIFIC_PROBLEMS;

		// IMSC_1
		$this->IMSC_1 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IMSC_1', 'IMSC_1', '`IMSC_1`', '`IMSC_1`', 200, 45, -1, FALSE, '`IMSC_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_1->Sortable = TRUE; // Allow sort
		$this->fields['IMSC_1'] = &$this->IMSC_1;

		// IMSC_2
		$this->IMSC_2 = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IMSC_2', 'IMSC_2', '`IMSC_2`', '`IMSC_2`', 200, 45, -1, FALSE, '`IMSC_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_2->Sortable = TRUE; // Allow sort
		$this->fields['IMSC_2'] = &$this->IMSC_2;

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_LIQUIFACTION_STORAGE', 'LIQUIFACTION_STORAGE', '`LIQUIFACTION_STORAGE`', '`LIQUIFACTION_STORAGE`', 200, 45, -1, FALSE, '`LIQUIFACTION_STORAGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->LIQUIFACTION_STORAGE->Sortable = TRUE; // Allow sort
		$this->LIQUIFACTION_STORAGE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->LIQUIFACTION_STORAGE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->LIQUIFACTION_STORAGE->Lookup = new Lookup('LIQUIFACTION_STORAGE', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->LIQUIFACTION_STORAGE->OptionCount = 2;
		$this->fields['LIQUIFACTION_STORAGE'] = &$this->LIQUIFACTION_STORAGE;

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_IUI_PREP_METHOD', 'IUI_PREP_METHOD', '`IUI_PREP_METHOD`', '`IUI_PREP_METHOD`', 200, 45, -1, FALSE, '`IUI_PREP_METHOD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->IUI_PREP_METHOD->Sortable = TRUE; // Allow sort
		$this->IUI_PREP_METHOD->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->IUI_PREP_METHOD->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->IUI_PREP_METHOD->Lookup = new Lookup('IUI_PREP_METHOD', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUI_PREP_METHOD->OptionCount = 6;
		$this->fields['IUI_PREP_METHOD'] = &$this->IUI_PREP_METHOD;

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TIME_FROM_TRIGGER', 'TIME_FROM_TRIGGER', '`TIME_FROM_TRIGGER`', '`TIME_FROM_TRIGGER`', 200, 45, -1, FALSE, '`TIME_FROM_TRIGGER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TIME_FROM_TRIGGER->Sortable = TRUE; // Allow sort
		$this->TIME_FROM_TRIGGER->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TIME_FROM_TRIGGER->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TIME_FROM_TRIGGER->Lookup = new Lookup('TIME_FROM_TRIGGER', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TIME_FROM_TRIGGER->OptionCount = 4;
		$this->fields['TIME_FROM_TRIGGER'] = &$this->TIME_FROM_TRIGGER;

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_COLLECTION_TO_PREPARATION', 'COLLECTION_TO_PREPARATION', '`COLLECTION_TO_PREPARATION`', '`COLLECTION_TO_PREPARATION`', 200, 45, -1, FALSE, '`COLLECTION_TO_PREPARATION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->COLLECTION_TO_PREPARATION->Sortable = TRUE; // Allow sort
		$this->COLLECTION_TO_PREPARATION->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->COLLECTION_TO_PREPARATION->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->COLLECTION_TO_PREPARATION->Lookup = new Lookup('COLLECTION_TO_PREPARATION', 'ivf_semenanalysisreport', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->COLLECTION_TO_PREPARATION->OptionCount = 5;
		$this->fields['COLLECTION_TO_PREPARATION'] = &$this->COLLECTION_TO_PREPARATION;

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM = new DbField('ivf_semenanalysisreport', 'ivf_semenanalysisreport', 'x_TIME_FROM_PREP_TO_INSEM', 'TIME_FROM_PREP_TO_INSEM', '`TIME_FROM_PREP_TO_INSEM`', '`TIME_FROM_PREP_TO_INSEM`', 200, 45, -1, FALSE, '`TIME_FROM_PREP_TO_INSEM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TIME_FROM_PREP_TO_INSEM->Sortable = TRUE; // Allow sort
		$this->fields['TIME_FROM_PREP_TO_INSEM'] = &$this->TIME_FROM_PREP_TO_INSEM;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
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
		if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
			if ($this->TidNo->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->RIDNo->getSessionValue() != "")
				$masterFilter .= " AND `RIDNO`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientName->getSessionValue() != "")
				$masterFilter .= " AND `Name`=" . QuotedValue($this->PatientName->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
			if ($this->RIDNo->getSessionValue() != "")
				$masterFilter .= "`RIDNO`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientName->getSessionValue() != "")
				$masterFilter .= " AND `Name`=" . QuotedValue($this->PatientName->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->TidNo->getSessionValue() != "")
				$masterFilter .= " AND `id`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
			if ($this->TidNo->getSessionValue() != "")
				$detailFilter .= "`TidNo`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->RIDNo->getSessionValue() != "")
				$detailFilter .= " AND `RIDNo`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientName->getSessionValue() != "")
				$detailFilter .= " AND `PatientName`=" . QuotedValue($this->PatientName->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
			if ($this->RIDNo->getSessionValue() != "")
				$detailFilter .= "`RIDNo`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->PatientName->getSessionValue() != "")
				$detailFilter .= " AND `PatientName`=" . QuotedValue($this->PatientName->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->TidNo->getSessionValue() != "")
				$detailFilter .= " AND `TidNo`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_ivf_treatment()
	{
		return "`id`=@id@ AND `RIDNO`=@RIDNO@ AND `Name`='@Name@'";
	}

	// Detail filter
	public function sqlDetailFilter_view_ivf_treatment()
	{
		return "`TidNo`=@TidNo@ AND `RIDNo`=@RIDNo@ AND `PatientName`='@PatientName@'";
	}

	// Master filter
	public function sqlMasterFilter_ivf_treatment_plan()
	{
		return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_ivf_treatment_plan()
	{
		return "`RIDNo`=@RIDNo@ AND `PatientName`='@PatientName@' AND `TidNo`=@TidNo@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_semenanalysisreport`";
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
		$this->RIDNo->DbValue = $row['RIDNo'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->HusbandName->DbValue = $row['HusbandName'];
		$this->RequestDr->DbValue = $row['RequestDr'];
		$this->CollectionDate->DbValue = $row['CollectionDate'];
		$this->ResultDate->DbValue = $row['ResultDate'];
		$this->RequestSample->DbValue = $row['RequestSample'];
		$this->CollectionType->DbValue = $row['CollectionType'];
		$this->CollectionMethod->DbValue = $row['CollectionMethod'];
		$this->Medicationused->DbValue = $row['Medicationused'];
		$this->DifficultiesinCollection->DbValue = $row['DifficultiesinCollection'];
		$this->pH->DbValue = $row['pH'];
		$this->Timeofcollection->DbValue = $row['Timeofcollection'];
		$this->Timeofexamination->DbValue = $row['Timeofexamination'];
		$this->Volume->DbValue = $row['Volume'];
		$this->Concentration->DbValue = $row['Concentration'];
		$this->Total->DbValue = $row['Total'];
		$this->ProgressiveMotility->DbValue = $row['ProgressiveMotility'];
		$this->NonProgrssiveMotile->DbValue = $row['NonProgrssiveMotile'];
		$this->Immotile->DbValue = $row['Immotile'];
		$this->TotalProgrssiveMotile->DbValue = $row['TotalProgrssiveMotile'];
		$this->Appearance->DbValue = $row['Appearance'];
		$this->Homogenosity->DbValue = $row['Homogenosity'];
		$this->CompleteSample->DbValue = $row['CompleteSample'];
		$this->Liquefactiontime->DbValue = $row['Liquefactiontime'];
		$this->Normal->DbValue = $row['Normal'];
		$this->Abnormal->DbValue = $row['Abnormal'];
		$this->Headdefects->DbValue = $row['Headdefects'];
		$this->MidpieceDefects->DbValue = $row['MidpieceDefects'];
		$this->TailDefects->DbValue = $row['TailDefects'];
		$this->NormalProgMotile->DbValue = $row['NormalProgMotile'];
		$this->ImmatureForms->DbValue = $row['ImmatureForms'];
		$this->Leucocytes->DbValue = $row['Leucocytes'];
		$this->Agglutination->DbValue = $row['Agglutination'];
		$this->Debris->DbValue = $row['Debris'];
		$this->Diagnosis->DbValue = $row['Diagnosis'];
		$this->Observations->DbValue = $row['Observations'];
		$this->Signature->DbValue = $row['Signature'];
		$this->SemenOrgin->DbValue = $row['SemenOrgin'];
		$this->Donor->DbValue = $row['Donor'];
		$this->DonorBloodgroup->DbValue = $row['DonorBloodgroup'];
		$this->Tank->DbValue = $row['Tank'];
		$this->Location->DbValue = $row['Location'];
		$this->Volume1->DbValue = $row['Volume1'];
		$this->Concentration1->DbValue = $row['Concentration1'];
		$this->Total1->DbValue = $row['Total1'];
		$this->ProgressiveMotility1->DbValue = $row['ProgressiveMotility1'];
		$this->NonProgrssiveMotile1->DbValue = $row['NonProgrssiveMotile1'];
		$this->Immotile1->DbValue = $row['Immotile1'];
		$this->TotalProgrssiveMotile1->DbValue = $row['TotalProgrssiveMotile1'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->Color->DbValue = $row['Color'];
		$this->DoneBy->DbValue = $row['DoneBy'];
		$this->Method->DbValue = $row['Method'];
		$this->Abstinence->DbValue = $row['Abstinence'];
		$this->ProcessedBy->DbValue = $row['ProcessedBy'];
		$this->InseminationTime->DbValue = $row['InseminationTime'];
		$this->InseminationBy->DbValue = $row['InseminationBy'];
		$this->Big->DbValue = $row['Big'];
		$this->Medium->DbValue = $row['Medium'];
		$this->Small->DbValue = $row['Small'];
		$this->NoHalo->DbValue = $row['NoHalo'];
		$this->Fragmented->DbValue = $row['Fragmented'];
		$this->NonFragmented->DbValue = $row['NonFragmented'];
		$this->DFI->DbValue = $row['DFI'];
		$this->IsueBy->DbValue = $row['IsueBy'];
		$this->Volume2->DbValue = $row['Volume2'];
		$this->Concentration2->DbValue = $row['Concentration2'];
		$this->Total2->DbValue = $row['Total2'];
		$this->ProgressiveMotility2->DbValue = $row['ProgressiveMotility2'];
		$this->NonProgrssiveMotile2->DbValue = $row['NonProgrssiveMotile2'];
		$this->Immotile2->DbValue = $row['Immotile2'];
		$this->TotalProgrssiveMotile2->DbValue = $row['TotalProgrssiveMotile2'];
		$this->MACS->DbValue = $row['MACS'];
		$this->IssuedBy->DbValue = $row['IssuedBy'];
		$this->IssuedTo->DbValue = $row['IssuedTo'];
		$this->PaID->DbValue = $row['PaID'];
		$this->PaName->DbValue = $row['PaName'];
		$this->PaMobile->DbValue = $row['PaMobile'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerMobile->DbValue = $row['PartnerMobile'];
		$this->PREG_TEST_DATE->DbValue = $row['PREG_TEST_DATE'];
		$this->SPECIFIC_PROBLEMS->DbValue = $row['SPECIFIC_PROBLEMS'];
		$this->IMSC_1->DbValue = $row['IMSC_1'];
		$this->IMSC_2->DbValue = $row['IMSC_2'];
		$this->LIQUIFACTION_STORAGE->DbValue = $row['LIQUIFACTION_STORAGE'];
		$this->IUI_PREP_METHOD->DbValue = $row['IUI_PREP_METHOD'];
		$this->TIME_FROM_TRIGGER->DbValue = $row['TIME_FROM_TRIGGER'];
		$this->COLLECTION_TO_PREPARATION->DbValue = $row['COLLECTION_TO_PREPARATION'];
		$this->TIME_FROM_PREP_TO_INSEM->DbValue = $row['TIME_FROM_PREP_TO_INSEM'];
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
			return "ivf_semenanalysisreportlist.php";
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
		if ($pageName == "ivf_semenanalysisreportview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_semenanalysisreportedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_semenanalysisreportadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_semenanalysisreportlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_semenanalysisreportview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_semenanalysisreportview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_semenanalysisreportadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_semenanalysisreportadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_semenanalysisreportedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_semenanalysisreportadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_semenanalysisreportdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_ivf_treatment" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->TidNo->CurrentValue);
			$url .= "&fk_RIDNO=" . urlencode($this->RIDNo->CurrentValue);
			$url .= "&fk_Name=" . urlencode($this->PatientName->CurrentValue);
		}
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_RIDNO=" . urlencode($this->RIDNo->CurrentValue);
			$url .= "&fk_Name=" . urlencode($this->PatientName->CurrentValue);
			$url .= "&fk_id=" . urlencode($this->TidNo->CurrentValue);
		}
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
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->HusbandName->setDbValue($rs->fields('HusbandName'));
		$this->RequestDr->setDbValue($rs->fields('RequestDr'));
		$this->CollectionDate->setDbValue($rs->fields('CollectionDate'));
		$this->ResultDate->setDbValue($rs->fields('ResultDate'));
		$this->RequestSample->setDbValue($rs->fields('RequestSample'));
		$this->CollectionType->setDbValue($rs->fields('CollectionType'));
		$this->CollectionMethod->setDbValue($rs->fields('CollectionMethod'));
		$this->Medicationused->setDbValue($rs->fields('Medicationused'));
		$this->DifficultiesinCollection->setDbValue($rs->fields('DifficultiesinCollection'));
		$this->pH->setDbValue($rs->fields('pH'));
		$this->Timeofcollection->setDbValue($rs->fields('Timeofcollection'));
		$this->Timeofexamination->setDbValue($rs->fields('Timeofexamination'));
		$this->Volume->setDbValue($rs->fields('Volume'));
		$this->Concentration->setDbValue($rs->fields('Concentration'));
		$this->Total->setDbValue($rs->fields('Total'));
		$this->ProgressiveMotility->setDbValue($rs->fields('ProgressiveMotility'));
		$this->NonProgrssiveMotile->setDbValue($rs->fields('NonProgrssiveMotile'));
		$this->Immotile->setDbValue($rs->fields('Immotile'));
		$this->TotalProgrssiveMotile->setDbValue($rs->fields('TotalProgrssiveMotile'));
		$this->Appearance->setDbValue($rs->fields('Appearance'));
		$this->Homogenosity->setDbValue($rs->fields('Homogenosity'));
		$this->CompleteSample->setDbValue($rs->fields('CompleteSample'));
		$this->Liquefactiontime->setDbValue($rs->fields('Liquefactiontime'));
		$this->Normal->setDbValue($rs->fields('Normal'));
		$this->Abnormal->setDbValue($rs->fields('Abnormal'));
		$this->Headdefects->setDbValue($rs->fields('Headdefects'));
		$this->MidpieceDefects->setDbValue($rs->fields('MidpieceDefects'));
		$this->TailDefects->setDbValue($rs->fields('TailDefects'));
		$this->NormalProgMotile->setDbValue($rs->fields('NormalProgMotile'));
		$this->ImmatureForms->setDbValue($rs->fields('ImmatureForms'));
		$this->Leucocytes->setDbValue($rs->fields('Leucocytes'));
		$this->Agglutination->setDbValue($rs->fields('Agglutination'));
		$this->Debris->setDbValue($rs->fields('Debris'));
		$this->Diagnosis->setDbValue($rs->fields('Diagnosis'));
		$this->Observations->setDbValue($rs->fields('Observations'));
		$this->Signature->setDbValue($rs->fields('Signature'));
		$this->SemenOrgin->setDbValue($rs->fields('SemenOrgin'));
		$this->Donor->setDbValue($rs->fields('Donor'));
		$this->DonorBloodgroup->setDbValue($rs->fields('DonorBloodgroup'));
		$this->Tank->setDbValue($rs->fields('Tank'));
		$this->Location->setDbValue($rs->fields('Location'));
		$this->Volume1->setDbValue($rs->fields('Volume1'));
		$this->Concentration1->setDbValue($rs->fields('Concentration1'));
		$this->Total1->setDbValue($rs->fields('Total1'));
		$this->ProgressiveMotility1->setDbValue($rs->fields('ProgressiveMotility1'));
		$this->NonProgrssiveMotile1->setDbValue($rs->fields('NonProgrssiveMotile1'));
		$this->Immotile1->setDbValue($rs->fields('Immotile1'));
		$this->TotalProgrssiveMotile1->setDbValue($rs->fields('TotalProgrssiveMotile1'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->Color->setDbValue($rs->fields('Color'));
		$this->DoneBy->setDbValue($rs->fields('DoneBy'));
		$this->Method->setDbValue($rs->fields('Method'));
		$this->Abstinence->setDbValue($rs->fields('Abstinence'));
		$this->ProcessedBy->setDbValue($rs->fields('ProcessedBy'));
		$this->InseminationTime->setDbValue($rs->fields('InseminationTime'));
		$this->InseminationBy->setDbValue($rs->fields('InseminationBy'));
		$this->Big->setDbValue($rs->fields('Big'));
		$this->Medium->setDbValue($rs->fields('Medium'));
		$this->Small->setDbValue($rs->fields('Small'));
		$this->NoHalo->setDbValue($rs->fields('NoHalo'));
		$this->Fragmented->setDbValue($rs->fields('Fragmented'));
		$this->NonFragmented->setDbValue($rs->fields('NonFragmented'));
		$this->DFI->setDbValue($rs->fields('DFI'));
		$this->IsueBy->setDbValue($rs->fields('IsueBy'));
		$this->Volume2->setDbValue($rs->fields('Volume2'));
		$this->Concentration2->setDbValue($rs->fields('Concentration2'));
		$this->Total2->setDbValue($rs->fields('Total2'));
		$this->ProgressiveMotility2->setDbValue($rs->fields('ProgressiveMotility2'));
		$this->NonProgrssiveMotile2->setDbValue($rs->fields('NonProgrssiveMotile2'));
		$this->Immotile2->setDbValue($rs->fields('Immotile2'));
		$this->TotalProgrssiveMotile2->setDbValue($rs->fields('TotalProgrssiveMotile2'));
		$this->MACS->setDbValue($rs->fields('MACS'));
		$this->IssuedBy->setDbValue($rs->fields('IssuedBy'));
		$this->IssuedTo->setDbValue($rs->fields('IssuedTo'));
		$this->PaID->setDbValue($rs->fields('PaID'));
		$this->PaName->setDbValue($rs->fields('PaName'));
		$this->PaMobile->setDbValue($rs->fields('PaMobile'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerMobile->setDbValue($rs->fields('PartnerMobile'));
		$this->PREG_TEST_DATE->setDbValue($rs->fields('PREG_TEST_DATE'));
		$this->SPECIFIC_PROBLEMS->setDbValue($rs->fields('SPECIFIC_PROBLEMS'));
		$this->IMSC_1->setDbValue($rs->fields('IMSC_1'));
		$this->IMSC_2->setDbValue($rs->fields('IMSC_2'));
		$this->LIQUIFACTION_STORAGE->setDbValue($rs->fields('LIQUIFACTION_STORAGE'));
		$this->IUI_PREP_METHOD->setDbValue($rs->fields('IUI_PREP_METHOD'));
		$this->TIME_FROM_TRIGGER->setDbValue($rs->fields('TIME_FROM_TRIGGER'));
		$this->COLLECTION_TO_PREPARATION->setDbValue($rs->fields('COLLECTION_TO_PREPARATION'));
		$this->TIME_FROM_PREP_TO_INSEM->setDbValue($rs->fields('TIME_FROM_PREP_TO_INSEM'));
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
		// PatientName
		// HusbandName
		// RequestDr
		// CollectionDate
		// ResultDate
		// RequestSample
		// CollectionType
		// CollectionMethod
		// Medicationused
		// DifficultiesinCollection
		// pH
		// Timeofcollection
		// Timeofexamination
		// Volume
		// Concentration
		// Total
		// ProgressiveMotility
		// NonProgrssiveMotile
		// Immotile
		// TotalProgrssiveMotile
		// Appearance
		// Homogenosity
		// CompleteSample
		// Liquefactiontime
		// Normal
		// Abnormal
		// Headdefects
		// MidpieceDefects
		// TailDefects
		// NormalProgMotile
		// ImmatureForms
		// Leucocytes
		// Agglutination
		// Debris
		// Diagnosis
		// Observations
		// Signature
		// SemenOrgin
		// Donor
		// DonorBloodgroup
		// Tank
		// Location
		// Volume1
		// Concentration1
		// Total1
		// ProgressiveMotility1
		// NonProgrssiveMotile1
		// Immotile1
		// TotalProgrssiveMotile1
		// TidNo
		// Color
		// DoneBy
		// Method
		// Abstinence
		// ProcessedBy
		// InseminationTime
		// InseminationBy
		// Big
		// Medium
		// Small
		// NoHalo
		// Fragmented
		// NonFragmented
		// DFI
		// IsueBy
		// Volume2
		// Concentration2
		// Total2
		// ProgressiveMotility2
		// NonProgrssiveMotile2
		// Immotile2
		// TotalProgrssiveMotile2
		// MACS
		// IssuedBy
		// IssuedTo
		// PaID
		// PaName
		// PaMobile
		// PartnerID
		// PartnerName
		// PartnerMobile
		// PREG_TEST_DATE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// HusbandName
		$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
		$this->HusbandName->ViewCustomAttributes = "";

		// RequestDr
		$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->ViewCustomAttributes = "";

		// CollectionDate
		$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
		$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
		$this->CollectionDate->ViewCustomAttributes = "";

		// ResultDate
		$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
		$this->ResultDate->ViewCustomAttributes = "";

		// RequestSample
		if (strval($this->RequestSample->CurrentValue) != "") {
			$this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
		} else {
			$this->RequestSample->ViewValue = NULL;
		}
		$this->RequestSample->ViewCustomAttributes = "";

		// CollectionType
		if (strval($this->CollectionType->CurrentValue) != "") {
			$this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
		} else {
			$this->CollectionType->ViewValue = NULL;
		}
		$this->CollectionType->ViewCustomAttributes = "";

		// CollectionMethod
		if (strval($this->CollectionMethod->CurrentValue) != "") {
			$this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
		} else {
			$this->CollectionMethod->ViewValue = NULL;
		}
		$this->CollectionMethod->ViewCustomAttributes = "";

		// Medicationused
		if (strval($this->Medicationused->CurrentValue) != "") {
			$this->Medicationused->ViewValue = $this->Medicationused->optionCaption($this->Medicationused->CurrentValue);
		} else {
			$this->Medicationused->ViewValue = NULL;
		}
		$this->Medicationused->ViewCustomAttributes = "";

		// DifficultiesinCollection
		if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
			$this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
		} else {
			$this->DifficultiesinCollection->ViewValue = NULL;
		}
		$this->DifficultiesinCollection->ViewCustomAttributes = "";

		// pH
		$this->pH->ViewValue = $this->pH->CurrentValue;
		$this->pH->ViewCustomAttributes = "";

		// Timeofcollection
		$this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
		$this->Timeofcollection->ViewCustomAttributes = "";

		// Timeofexamination
		$this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
		$this->Timeofexamination->ViewCustomAttributes = "";

		// Volume
		$this->Volume->ViewValue = $this->Volume->CurrentValue;
		$this->Volume->ViewCustomAttributes = "";

		// Concentration
		$this->Concentration->ViewValue = $this->Concentration->CurrentValue;
		$this->Concentration->ViewCustomAttributes = "";

		// Total
		$this->Total->ViewValue = $this->Total->CurrentValue;
		$this->Total->ViewCustomAttributes = "";

		// ProgressiveMotility
		$this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
		$this->ProgressiveMotility->ViewCustomAttributes = "";

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
		$this->NonProgrssiveMotile->ViewCustomAttributes = "";

		// Immotile
		$this->Immotile->ViewValue = $this->Immotile->CurrentValue;
		$this->Immotile->ViewCustomAttributes = "";

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
		$this->TotalProgrssiveMotile->ViewCustomAttributes = "";

		// Appearance
		$this->Appearance->ViewValue = $this->Appearance->CurrentValue;
		$this->Appearance->ViewCustomAttributes = "";

		// Homogenosity
		if (strval($this->Homogenosity->CurrentValue) != "") {
			$this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
		} else {
			$this->Homogenosity->ViewValue = NULL;
		}
		$this->Homogenosity->ViewCustomAttributes = "";

		// CompleteSample
		if (strval($this->CompleteSample->CurrentValue) != "") {
			$this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
		} else {
			$this->CompleteSample->ViewValue = NULL;
		}
		$this->CompleteSample->ViewCustomAttributes = "";

		// Liquefactiontime
		$this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
		$this->Liquefactiontime->ViewCustomAttributes = "";

		// Normal
		$this->Normal->ViewValue = $this->Normal->CurrentValue;
		$this->Normal->ViewCustomAttributes = "";

		// Abnormal
		$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->ViewCustomAttributes = "";

		// Headdefects
		$this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
		$this->Headdefects->ViewCustomAttributes = "";

		// MidpieceDefects
		$this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
		$this->MidpieceDefects->ViewCustomAttributes = "";

		// TailDefects
		$this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
		$this->TailDefects->ViewCustomAttributes = "";

		// NormalProgMotile
		$this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
		$this->NormalProgMotile->ViewCustomAttributes = "";

		// ImmatureForms
		$this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
		$this->ImmatureForms->ViewCustomAttributes = "";

		// Leucocytes
		$this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
		$this->Leucocytes->ViewCustomAttributes = "";

		// Agglutination
		$this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
		$this->Agglutination->ViewCustomAttributes = "";

		// Debris
		$this->Debris->ViewValue = $this->Debris->CurrentValue;
		$this->Debris->ViewCustomAttributes = "";

		// Diagnosis
		$this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
		$this->Diagnosis->ViewCustomAttributes = "";

		// Observations
		$this->Observations->ViewValue = $this->Observations->CurrentValue;
		$this->Observations->ViewCustomAttributes = "";

		// Signature
		$this->Signature->ViewValue = $this->Signature->CurrentValue;
		$this->Signature->ViewCustomAttributes = "";

		// SemenOrgin
		if (strval($this->SemenOrgin->CurrentValue) != "") {
			$this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
		} else {
			$this->SemenOrgin->ViewValue = NULL;
		}
		$this->SemenOrgin->ViewCustomAttributes = "";

		// Donor
		$curVal = strval($this->Donor->CurrentValue);
		if ($curVal != "") {
			$this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
			if ($this->Donor->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Donor->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Donor->ViewValue = $this->Donor->CurrentValue;
				}
			}
		} else {
			$this->Donor->ViewValue = NULL;
		}
		$this->Donor->ViewCustomAttributes = "";

		// DonorBloodgroup
		$this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
		$this->DonorBloodgroup->ViewCustomAttributes = "";

		// Tank
		$this->Tank->ViewValue = $this->Tank->CurrentValue;
		$this->Tank->ViewCustomAttributes = "";

		// Location
		$this->Location->ViewValue = $this->Location->CurrentValue;
		$this->Location->ViewCustomAttributes = "";

		// Volume1
		$this->Volume1->ViewValue = $this->Volume1->CurrentValue;
		$this->Volume1->ViewCustomAttributes = "";

		// Concentration1
		$this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
		$this->Concentration1->ViewCustomAttributes = "";

		// Total1
		$this->Total1->ViewValue = $this->Total1->CurrentValue;
		$this->Total1->ViewCustomAttributes = "";

		// ProgressiveMotility1
		$this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
		$this->ProgressiveMotility1->ViewCustomAttributes = "";

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
		$this->NonProgrssiveMotile1->ViewCustomAttributes = "";

		// Immotile1
		$this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
		$this->Immotile1->ViewCustomAttributes = "";

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
		$this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// Color
		$this->Color->ViewValue = $this->Color->CurrentValue;
		$this->Color->ViewCustomAttributes = "";

		// DoneBy
		$this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
		$this->DoneBy->ViewCustomAttributes = "";

		// Method
		$this->Method->ViewValue = $this->Method->CurrentValue;
		$this->Method->ViewCustomAttributes = "";

		// Abstinence
		$this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
		$this->Abstinence->ViewCustomAttributes = "";

		// ProcessedBy
		$this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
		$this->ProcessedBy->ViewCustomAttributes = "";

		// InseminationTime
		$this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
		$this->InseminationTime->ViewCustomAttributes = "";

		// InseminationBy
		$this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
		$this->InseminationBy->ViewCustomAttributes = "";

		// Big
		$this->Big->ViewValue = $this->Big->CurrentValue;
		$this->Big->ViewCustomAttributes = "";

		// Medium
		$this->Medium->ViewValue = $this->Medium->CurrentValue;
		$this->Medium->ViewCustomAttributes = "";

		// Small
		$this->Small->ViewValue = $this->Small->CurrentValue;
		$this->Small->ViewCustomAttributes = "";

		// NoHalo
		$this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
		$this->NoHalo->ViewCustomAttributes = "";

		// Fragmented
		$this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
		$this->Fragmented->ViewCustomAttributes = "";

		// NonFragmented
		$this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
		$this->NonFragmented->ViewCustomAttributes = "";

		// DFI
		$this->DFI->ViewValue = $this->DFI->CurrentValue;
		$this->DFI->ViewCustomAttributes = "";

		// IsueBy
		$this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
		$this->IsueBy->ViewCustomAttributes = "";

		// Volume2
		$this->Volume2->ViewValue = $this->Volume2->CurrentValue;
		$this->Volume2->ViewCustomAttributes = "";

		// Concentration2
		$this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
		$this->Concentration2->ViewCustomAttributes = "";

		// Total2
		$this->Total2->ViewValue = $this->Total2->CurrentValue;
		$this->Total2->ViewCustomAttributes = "";

		// ProgressiveMotility2
		$this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
		$this->ProgressiveMotility2->ViewCustomAttributes = "";

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
		$this->NonProgrssiveMotile2->ViewCustomAttributes = "";

		// Immotile2
		$this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
		$this->Immotile2->ViewCustomAttributes = "";

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
		$this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

		// MACS
		if (strval($this->MACS->CurrentValue) != "") {
			$this->MACS->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->MACS->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->MACS->ViewValue->add($this->MACS->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->MACS->ViewValue = NULL;
		}
		$this->MACS->ViewCustomAttributes = "";

		// IssuedBy
		$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->ViewCustomAttributes = "";

		// IssuedTo
		$this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
		$this->IssuedTo->ViewCustomAttributes = "";

		// PaID
		$this->PaID->ViewValue = $this->PaID->CurrentValue;
		$this->PaID->ViewCustomAttributes = "";

		// PaName
		$this->PaName->ViewValue = $this->PaName->CurrentValue;
		$this->PaName->ViewCustomAttributes = "";

		// PaMobile
		$this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
		$this->PaMobile->ViewCustomAttributes = "";

		// PartnerID
		$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// PartnerMobile
		$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
		$this->PartnerMobile->ViewCustomAttributes = "";

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
		$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
		$this->PREG_TEST_DATE->ViewCustomAttributes = "";

		// SPECIFIC_PROBLEMS
		if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
			$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
		} else {
			$this->SPECIFIC_PROBLEMS->ViewValue = NULL;
		}
		$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

		// IMSC_1
		$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
		$this->IMSC_1->ViewCustomAttributes = "";

		// IMSC_2
		$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
		$this->IMSC_2->ViewCustomAttributes = "";

		// LIQUIFACTION_STORAGE
		if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
			$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
		} else {
			$this->LIQUIFACTION_STORAGE->ViewValue = NULL;
		}
		$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

		// IUI_PREP_METHOD
		if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
			$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
		} else {
			$this->IUI_PREP_METHOD->ViewValue = NULL;
		}
		$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

		// TIME_FROM_TRIGGER
		if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
			$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
		} else {
			$this->TIME_FROM_TRIGGER->ViewValue = NULL;
		}
		$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

		// COLLECTION_TO_PREPARATION
		if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
			$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
		} else {
			$this->COLLECTION_TO_PREPARATION->ViewValue = NULL;
		}
		$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
		$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// RIDNo
		$this->RIDNo->LinkCustomAttributes = "";
		$this->RIDNo->HrefValue = "";
		$this->RIDNo->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// HusbandName
		$this->HusbandName->LinkCustomAttributes = "";
		$this->HusbandName->HrefValue = "";
		$this->HusbandName->TooltipValue = "";

		// RequestDr
		$this->RequestDr->LinkCustomAttributes = "";
		$this->RequestDr->HrefValue = "";
		$this->RequestDr->TooltipValue = "";

		// CollectionDate
		$this->CollectionDate->LinkCustomAttributes = "";
		$this->CollectionDate->HrefValue = "";
		$this->CollectionDate->TooltipValue = "";

		// ResultDate
		$this->ResultDate->LinkCustomAttributes = "";
		$this->ResultDate->HrefValue = "";
		$this->ResultDate->TooltipValue = "";

		// RequestSample
		$this->RequestSample->LinkCustomAttributes = "";
		$this->RequestSample->HrefValue = "";
		$this->RequestSample->TooltipValue = "";

		// CollectionType
		$this->CollectionType->LinkCustomAttributes = "";
		$this->CollectionType->HrefValue = "";
		$this->CollectionType->TooltipValue = "";

		// CollectionMethod
		$this->CollectionMethod->LinkCustomAttributes = "";
		$this->CollectionMethod->HrefValue = "";
		$this->CollectionMethod->TooltipValue = "";

		// Medicationused
		$this->Medicationused->LinkCustomAttributes = "";
		$this->Medicationused->HrefValue = "";
		$this->Medicationused->TooltipValue = "";

		// DifficultiesinCollection
		$this->DifficultiesinCollection->LinkCustomAttributes = "";
		$this->DifficultiesinCollection->HrefValue = "";
		$this->DifficultiesinCollection->TooltipValue = "";

		// pH
		$this->pH->LinkCustomAttributes = "";
		$this->pH->HrefValue = "";
		$this->pH->TooltipValue = "";

		// Timeofcollection
		$this->Timeofcollection->LinkCustomAttributes = "";
		$this->Timeofcollection->HrefValue = "";
		$this->Timeofcollection->TooltipValue = "";

		// Timeofexamination
		$this->Timeofexamination->LinkCustomAttributes = "";
		$this->Timeofexamination->HrefValue = "";
		$this->Timeofexamination->TooltipValue = "";

		// Volume
		$this->Volume->LinkCustomAttributes = "";
		$this->Volume->HrefValue = "";
		$this->Volume->TooltipValue = "";

		// Concentration
		$this->Concentration->LinkCustomAttributes = "";
		$this->Concentration->HrefValue = "";
		$this->Concentration->TooltipValue = "";

		// Total
		$this->Total->LinkCustomAttributes = "";
		$this->Total->HrefValue = "";
		$this->Total->TooltipValue = "";

		// ProgressiveMotility
		$this->ProgressiveMotility->LinkCustomAttributes = "";
		$this->ProgressiveMotility->HrefValue = "";
		$this->ProgressiveMotility->TooltipValue = "";

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile->LinkCustomAttributes = "";
		$this->NonProgrssiveMotile->HrefValue = "";
		$this->NonProgrssiveMotile->TooltipValue = "";

		// Immotile
		$this->Immotile->LinkCustomAttributes = "";
		$this->Immotile->HrefValue = "";
		$this->Immotile->TooltipValue = "";

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile->LinkCustomAttributes = "";
		$this->TotalProgrssiveMotile->HrefValue = "";
		$this->TotalProgrssiveMotile->TooltipValue = "";

		// Appearance
		$this->Appearance->LinkCustomAttributes = "";
		$this->Appearance->HrefValue = "";
		$this->Appearance->TooltipValue = "";

		// Homogenosity
		$this->Homogenosity->LinkCustomAttributes = "";
		$this->Homogenosity->HrefValue = "";
		$this->Homogenosity->TooltipValue = "";

		// CompleteSample
		$this->CompleteSample->LinkCustomAttributes = "";
		$this->CompleteSample->HrefValue = "";
		$this->CompleteSample->TooltipValue = "";

		// Liquefactiontime
		$this->Liquefactiontime->LinkCustomAttributes = "";
		$this->Liquefactiontime->HrefValue = "";
		$this->Liquefactiontime->TooltipValue = "";

		// Normal
		$this->Normal->LinkCustomAttributes = "";
		$this->Normal->HrefValue = "";
		$this->Normal->TooltipValue = "";

		// Abnormal
		$this->Abnormal->LinkCustomAttributes = "";
		$this->Abnormal->HrefValue = "";
		$this->Abnormal->TooltipValue = "";

		// Headdefects
		$this->Headdefects->LinkCustomAttributes = "";
		$this->Headdefects->HrefValue = "";
		$this->Headdefects->TooltipValue = "";

		// MidpieceDefects
		$this->MidpieceDefects->LinkCustomAttributes = "";
		$this->MidpieceDefects->HrefValue = "";
		$this->MidpieceDefects->TooltipValue = "";

		// TailDefects
		$this->TailDefects->LinkCustomAttributes = "";
		$this->TailDefects->HrefValue = "";
		$this->TailDefects->TooltipValue = "";

		// NormalProgMotile
		$this->NormalProgMotile->LinkCustomAttributes = "";
		$this->NormalProgMotile->HrefValue = "";
		$this->NormalProgMotile->TooltipValue = "";

		// ImmatureForms
		$this->ImmatureForms->LinkCustomAttributes = "";
		$this->ImmatureForms->HrefValue = "";
		$this->ImmatureForms->TooltipValue = "";

		// Leucocytes
		$this->Leucocytes->LinkCustomAttributes = "";
		$this->Leucocytes->HrefValue = "";
		$this->Leucocytes->TooltipValue = "";

		// Agglutination
		$this->Agglutination->LinkCustomAttributes = "";
		$this->Agglutination->HrefValue = "";
		$this->Agglutination->TooltipValue = "";

		// Debris
		$this->Debris->LinkCustomAttributes = "";
		$this->Debris->HrefValue = "";
		$this->Debris->TooltipValue = "";

		// Diagnosis
		$this->Diagnosis->LinkCustomAttributes = "";
		$this->Diagnosis->HrefValue = "";
		$this->Diagnosis->TooltipValue = "";

		// Observations
		$this->Observations->LinkCustomAttributes = "";
		$this->Observations->HrefValue = "";
		$this->Observations->TooltipValue = "";

		// Signature
		$this->Signature->LinkCustomAttributes = "";
		$this->Signature->HrefValue = "";
		$this->Signature->TooltipValue = "";

		// SemenOrgin
		$this->SemenOrgin->LinkCustomAttributes = "";
		$this->SemenOrgin->HrefValue = "";
		$this->SemenOrgin->TooltipValue = "";

		// Donor
		$this->Donor->LinkCustomAttributes = "";
		$this->Donor->HrefValue = "";
		$this->Donor->TooltipValue = "";

		// DonorBloodgroup
		$this->DonorBloodgroup->LinkCustomAttributes = "";
		$this->DonorBloodgroup->HrefValue = "";
		$this->DonorBloodgroup->TooltipValue = "";

		// Tank
		$this->Tank->LinkCustomAttributes = "";
		$this->Tank->HrefValue = "";
		$this->Tank->TooltipValue = "";

		// Location
		$this->Location->LinkCustomAttributes = "";
		$this->Location->HrefValue = "";
		$this->Location->TooltipValue = "";

		// Volume1
		$this->Volume1->LinkCustomAttributes = "";
		$this->Volume1->HrefValue = "";
		$this->Volume1->TooltipValue = "";

		// Concentration1
		$this->Concentration1->LinkCustomAttributes = "";
		$this->Concentration1->HrefValue = "";
		$this->Concentration1->TooltipValue = "";

		// Total1
		$this->Total1->LinkCustomAttributes = "";
		$this->Total1->HrefValue = "";
		$this->Total1->TooltipValue = "";

		// ProgressiveMotility1
		$this->ProgressiveMotility1->LinkCustomAttributes = "";
		$this->ProgressiveMotility1->HrefValue = "";
		$this->ProgressiveMotility1->TooltipValue = "";

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1->LinkCustomAttributes = "";
		$this->NonProgrssiveMotile1->HrefValue = "";
		$this->NonProgrssiveMotile1->TooltipValue = "";

		// Immotile1
		$this->Immotile1->LinkCustomAttributes = "";
		$this->Immotile1->HrefValue = "";
		$this->Immotile1->TooltipValue = "";

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
		$this->TotalProgrssiveMotile1->HrefValue = "";
		$this->TotalProgrssiveMotile1->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// Color
		$this->Color->LinkCustomAttributes = "";
		$this->Color->HrefValue = "";
		$this->Color->TooltipValue = "";

		// DoneBy
		$this->DoneBy->LinkCustomAttributes = "";
		$this->DoneBy->HrefValue = "";
		$this->DoneBy->TooltipValue = "";

		// Method
		$this->Method->LinkCustomAttributes = "";
		$this->Method->HrefValue = "";
		$this->Method->TooltipValue = "";

		// Abstinence
		$this->Abstinence->LinkCustomAttributes = "";
		$this->Abstinence->HrefValue = "";
		$this->Abstinence->TooltipValue = "";

		// ProcessedBy
		$this->ProcessedBy->LinkCustomAttributes = "";
		$this->ProcessedBy->HrefValue = "";
		$this->ProcessedBy->TooltipValue = "";

		// InseminationTime
		$this->InseminationTime->LinkCustomAttributes = "";
		$this->InseminationTime->HrefValue = "";
		$this->InseminationTime->TooltipValue = "";

		// InseminationBy
		$this->InseminationBy->LinkCustomAttributes = "";
		$this->InseminationBy->HrefValue = "";
		$this->InseminationBy->TooltipValue = "";

		// Big
		$this->Big->LinkCustomAttributes = "";
		$this->Big->HrefValue = "";
		$this->Big->TooltipValue = "";

		// Medium
		$this->Medium->LinkCustomAttributes = "";
		$this->Medium->HrefValue = "";
		$this->Medium->TooltipValue = "";

		// Small
		$this->Small->LinkCustomAttributes = "";
		$this->Small->HrefValue = "";
		$this->Small->TooltipValue = "";

		// NoHalo
		$this->NoHalo->LinkCustomAttributes = "";
		$this->NoHalo->HrefValue = "";
		$this->NoHalo->TooltipValue = "";

		// Fragmented
		$this->Fragmented->LinkCustomAttributes = "";
		$this->Fragmented->HrefValue = "";
		$this->Fragmented->TooltipValue = "";

		// NonFragmented
		$this->NonFragmented->LinkCustomAttributes = "";
		$this->NonFragmented->HrefValue = "";
		$this->NonFragmented->TooltipValue = "";

		// DFI
		$this->DFI->LinkCustomAttributes = "";
		$this->DFI->HrefValue = "";
		$this->DFI->TooltipValue = "";

		// IsueBy
		$this->IsueBy->LinkCustomAttributes = "";
		$this->IsueBy->HrefValue = "";
		$this->IsueBy->TooltipValue = "";

		// Volume2
		$this->Volume2->LinkCustomAttributes = "";
		$this->Volume2->HrefValue = "";
		$this->Volume2->TooltipValue = "";

		// Concentration2
		$this->Concentration2->LinkCustomAttributes = "";
		$this->Concentration2->HrefValue = "";
		$this->Concentration2->TooltipValue = "";

		// Total2
		$this->Total2->LinkCustomAttributes = "";
		$this->Total2->HrefValue = "";
		$this->Total2->TooltipValue = "";

		// ProgressiveMotility2
		$this->ProgressiveMotility2->LinkCustomAttributes = "";
		$this->ProgressiveMotility2->HrefValue = "";
		$this->ProgressiveMotility2->TooltipValue = "";

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2->LinkCustomAttributes = "";
		$this->NonProgrssiveMotile2->HrefValue = "";
		$this->NonProgrssiveMotile2->TooltipValue = "";

		// Immotile2
		$this->Immotile2->LinkCustomAttributes = "";
		$this->Immotile2->HrefValue = "";
		$this->Immotile2->TooltipValue = "";

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
		$this->TotalProgrssiveMotile2->HrefValue = "";
		$this->TotalProgrssiveMotile2->TooltipValue = "";

		// MACS
		$this->MACS->LinkCustomAttributes = "";
		$this->MACS->HrefValue = "";
		$this->MACS->TooltipValue = "";

		// IssuedBy
		$this->IssuedBy->LinkCustomAttributes = "";
		$this->IssuedBy->HrefValue = "";
		$this->IssuedBy->TooltipValue = "";

		// IssuedTo
		$this->IssuedTo->LinkCustomAttributes = "";
		$this->IssuedTo->HrefValue = "";
		$this->IssuedTo->TooltipValue = "";

		// PaID
		$this->PaID->LinkCustomAttributes = "";
		$this->PaID->HrefValue = "";
		$this->PaID->TooltipValue = "";

		// PaName
		$this->PaName->LinkCustomAttributes = "";
		$this->PaName->HrefValue = "";
		$this->PaName->TooltipValue = "";

		// PaMobile
		$this->PaMobile->LinkCustomAttributes = "";
		$this->PaMobile->HrefValue = "";
		$this->PaMobile->TooltipValue = "";

		// PartnerID
		$this->PartnerID->LinkCustomAttributes = "";
		$this->PartnerID->HrefValue = "";
		$this->PartnerID->TooltipValue = "";

		// PartnerName
		$this->PartnerName->LinkCustomAttributes = "";
		$this->PartnerName->HrefValue = "";
		$this->PartnerName->TooltipValue = "";

		// PartnerMobile
		$this->PartnerMobile->LinkCustomAttributes = "";
		$this->PartnerMobile->HrefValue = "";
		$this->PartnerMobile->TooltipValue = "";

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->LinkCustomAttributes = "";
		$this->PREG_TEST_DATE->HrefValue = "";
		$this->PREG_TEST_DATE->TooltipValue = "";

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
		$this->SPECIFIC_PROBLEMS->HrefValue = "";
		$this->SPECIFIC_PROBLEMS->TooltipValue = "";

		// IMSC_1
		$this->IMSC_1->LinkCustomAttributes = "";
		$this->IMSC_1->HrefValue = "";
		$this->IMSC_1->TooltipValue = "";

		// IMSC_2
		$this->IMSC_2->LinkCustomAttributes = "";
		$this->IMSC_2->HrefValue = "";
		$this->IMSC_2->TooltipValue = "";

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
		$this->LIQUIFACTION_STORAGE->HrefValue = "";
		$this->LIQUIFACTION_STORAGE->TooltipValue = "";

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
		$this->IUI_PREP_METHOD->HrefValue = "";
		$this->IUI_PREP_METHOD->TooltipValue = "";

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
		$this->TIME_FROM_TRIGGER->HrefValue = "";
		$this->TIME_FROM_TRIGGER->TooltipValue = "";

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
		$this->COLLECTION_TO_PREPARATION->HrefValue = "";
		$this->COLLECTION_TO_PREPARATION->TooltipValue = "";

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
		$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
		$this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";

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
		if ($this->RIDNo->getSessionValue() != "") {
			$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
		} else {
			$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
		}

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if ($this->PatientName->getSessionValue() != "") {
			$this->PatientName->CurrentValue = $this->PatientName->getSessionValue();
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";
		} else {
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());
		}

		// HusbandName
		$this->HusbandName->EditAttrs["class"] = "form-control";
		$this->HusbandName->EditCustomAttributes = "";
		if (!$this->HusbandName->Raw)
			$this->HusbandName->CurrentValue = HtmlDecode($this->HusbandName->CurrentValue);
		$this->HusbandName->EditValue = $this->HusbandName->CurrentValue;
		$this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

		// RequestDr
		$this->RequestDr->EditAttrs["class"] = "form-control";
		$this->RequestDr->EditCustomAttributes = "";
		if (!$this->RequestDr->Raw)
			$this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
		$this->RequestDr->EditValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

		// CollectionDate
		$this->CollectionDate->EditAttrs["class"] = "form-control";
		$this->CollectionDate->EditCustomAttributes = "";
		$this->CollectionDate->EditValue = FormatDateTime($this->CollectionDate->CurrentValue, 8);
		$this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
		$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

		// RequestSample
		$this->RequestSample->EditAttrs["class"] = "form-control";
		$this->RequestSample->EditCustomAttributes = "";
		$this->RequestSample->EditValue = $this->RequestSample->options(TRUE);

		// CollectionType
		$this->CollectionType->EditAttrs["class"] = "form-control";
		$this->CollectionType->EditCustomAttributes = "";
		$this->CollectionType->EditValue = $this->CollectionType->options(TRUE);

		// CollectionMethod
		$this->CollectionMethod->EditAttrs["class"] = "form-control";
		$this->CollectionMethod->EditCustomAttributes = "";
		$this->CollectionMethod->EditValue = $this->CollectionMethod->options(TRUE);

		// Medicationused
		$this->Medicationused->EditAttrs["class"] = "form-control";
		$this->Medicationused->EditCustomAttributes = "";
		$this->Medicationused->EditValue = $this->Medicationused->options(TRUE);

		// DifficultiesinCollection
		$this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
		$this->DifficultiesinCollection->EditCustomAttributes = "";
		$this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(TRUE);

		// pH
		$this->pH->EditAttrs["class"] = "form-control";
		$this->pH->EditCustomAttributes = "";
		if (!$this->pH->Raw)
			$this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
		$this->pH->EditValue = $this->pH->CurrentValue;
		$this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

		// Timeofcollection
		$this->Timeofcollection->EditAttrs["class"] = "form-control";
		$this->Timeofcollection->EditCustomAttributes = "";
		if (!$this->Timeofcollection->Raw)
			$this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
		$this->Timeofcollection->EditValue = $this->Timeofcollection->CurrentValue;
		$this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

		// Timeofexamination
		$this->Timeofexamination->EditAttrs["class"] = "form-control";
		$this->Timeofexamination->EditCustomAttributes = "";
		if (!$this->Timeofexamination->Raw)
			$this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
		$this->Timeofexamination->EditValue = $this->Timeofexamination->CurrentValue;
		$this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

		// Volume
		$this->Volume->EditAttrs["class"] = "form-control";
		$this->Volume->EditCustomAttributes = "";
		if (!$this->Volume->Raw)
			$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
		$this->Volume->EditValue = $this->Volume->CurrentValue;
		$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

		// Concentration
		$this->Concentration->EditAttrs["class"] = "form-control";
		$this->Concentration->EditCustomAttributes = "";
		if (!$this->Concentration->Raw)
			$this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
		$this->Concentration->EditValue = $this->Concentration->CurrentValue;
		$this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

		// Total
		$this->Total->EditAttrs["class"] = "form-control";
		$this->Total->EditCustomAttributes = "";
		if (!$this->Total->Raw)
			$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
		$this->Total->EditValue = $this->Total->CurrentValue;
		$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

		// ProgressiveMotility
		$this->ProgressiveMotility->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility->EditCustomAttributes = "";
		if (!$this->ProgressiveMotility->Raw)
			$this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
		$this->ProgressiveMotility->EditValue = $this->ProgressiveMotility->CurrentValue;
		$this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile->EditCustomAttributes = "";
		if (!$this->NonProgrssiveMotile->Raw)
			$this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
		$this->NonProgrssiveMotile->EditValue = $this->NonProgrssiveMotile->CurrentValue;
		$this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

		// Immotile
		$this->Immotile->EditAttrs["class"] = "form-control";
		$this->Immotile->EditCustomAttributes = "";
		if (!$this->Immotile->Raw)
			$this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
		$this->Immotile->EditValue = $this->Immotile->CurrentValue;
		$this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile->EditCustomAttributes = "";
		if (!$this->TotalProgrssiveMotile->Raw)
			$this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
		$this->TotalProgrssiveMotile->EditValue = $this->TotalProgrssiveMotile->CurrentValue;
		$this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

		// Appearance
		$this->Appearance->EditAttrs["class"] = "form-control";
		$this->Appearance->EditCustomAttributes = "";
		if (!$this->Appearance->Raw)
			$this->Appearance->CurrentValue = HtmlDecode($this->Appearance->CurrentValue);
		$this->Appearance->EditValue = $this->Appearance->CurrentValue;
		$this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

		// Homogenosity
		$this->Homogenosity->EditAttrs["class"] = "form-control";
		$this->Homogenosity->EditCustomAttributes = "";
		$this->Homogenosity->EditValue = $this->Homogenosity->options(TRUE);

		// CompleteSample
		$this->CompleteSample->EditAttrs["class"] = "form-control";
		$this->CompleteSample->EditCustomAttributes = "";
		$this->CompleteSample->EditValue = $this->CompleteSample->options(TRUE);

		// Liquefactiontime
		$this->Liquefactiontime->EditAttrs["class"] = "form-control";
		$this->Liquefactiontime->EditCustomAttributes = "";
		if (!$this->Liquefactiontime->Raw)
			$this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
		$this->Liquefactiontime->EditValue = $this->Liquefactiontime->CurrentValue;
		$this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

		// Normal
		$this->Normal->EditAttrs["class"] = "form-control";
		$this->Normal->EditCustomAttributes = "";
		if (!$this->Normal->Raw)
			$this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
		$this->Normal->EditValue = $this->Normal->CurrentValue;
		$this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

		// Abnormal
		$this->Abnormal->EditAttrs["class"] = "form-control";
		$this->Abnormal->EditCustomAttributes = "";
		if (!$this->Abnormal->Raw)
			$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
		$this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

		// Headdefects
		$this->Headdefects->EditAttrs["class"] = "form-control";
		$this->Headdefects->EditCustomAttributes = "";
		if (!$this->Headdefects->Raw)
			$this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
		$this->Headdefects->EditValue = $this->Headdefects->CurrentValue;
		$this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

		// MidpieceDefects
		$this->MidpieceDefects->EditAttrs["class"] = "form-control";
		$this->MidpieceDefects->EditCustomAttributes = "";
		if (!$this->MidpieceDefects->Raw)
			$this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
		$this->MidpieceDefects->EditValue = $this->MidpieceDefects->CurrentValue;
		$this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

		// TailDefects
		$this->TailDefects->EditAttrs["class"] = "form-control";
		$this->TailDefects->EditCustomAttributes = "";
		if (!$this->TailDefects->Raw)
			$this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
		$this->TailDefects->EditValue = $this->TailDefects->CurrentValue;
		$this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

		// NormalProgMotile
		$this->NormalProgMotile->EditAttrs["class"] = "form-control";
		$this->NormalProgMotile->EditCustomAttributes = "";
		if (!$this->NormalProgMotile->Raw)
			$this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
		$this->NormalProgMotile->EditValue = $this->NormalProgMotile->CurrentValue;
		$this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

		// ImmatureForms
		$this->ImmatureForms->EditAttrs["class"] = "form-control";
		$this->ImmatureForms->EditCustomAttributes = "";
		if (!$this->ImmatureForms->Raw)
			$this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
		$this->ImmatureForms->EditValue = $this->ImmatureForms->CurrentValue;
		$this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

		// Leucocytes
		$this->Leucocytes->EditAttrs["class"] = "form-control";
		$this->Leucocytes->EditCustomAttributes = "";
		if (!$this->Leucocytes->Raw)
			$this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
		$this->Leucocytes->EditValue = $this->Leucocytes->CurrentValue;
		$this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

		// Agglutination
		$this->Agglutination->EditAttrs["class"] = "form-control";
		$this->Agglutination->EditCustomAttributes = "";
		if (!$this->Agglutination->Raw)
			$this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
		$this->Agglutination->EditValue = $this->Agglutination->CurrentValue;
		$this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

		// Debris
		$this->Debris->EditAttrs["class"] = "form-control";
		$this->Debris->EditCustomAttributes = "";
		if (!$this->Debris->Raw)
			$this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
		$this->Debris->EditValue = $this->Debris->CurrentValue;
		$this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

		// Diagnosis
		$this->Diagnosis->EditAttrs["class"] = "form-control";
		$this->Diagnosis->EditCustomAttributes = "";
		$this->Diagnosis->EditValue = $this->Diagnosis->CurrentValue;
		$this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

		// Observations
		$this->Observations->EditAttrs["class"] = "form-control";
		$this->Observations->EditCustomAttributes = "";
		$this->Observations->EditValue = $this->Observations->CurrentValue;
		$this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

		// Signature
		$this->Signature->EditAttrs["class"] = "form-control";
		$this->Signature->EditCustomAttributes = "";
		if (!$this->Signature->Raw)
			$this->Signature->CurrentValue = HtmlDecode($this->Signature->CurrentValue);
		$this->Signature->EditValue = $this->Signature->CurrentValue;
		$this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

		// SemenOrgin
		$this->SemenOrgin->EditAttrs["class"] = "form-control";
		$this->SemenOrgin->EditCustomAttributes = "";
		$this->SemenOrgin->EditValue = $this->SemenOrgin->options(TRUE);

		// Donor
		$this->Donor->EditAttrs["class"] = "form-control";
		$this->Donor->EditCustomAttributes = "";

		// DonorBloodgroup
		$this->DonorBloodgroup->EditAttrs["class"] = "form-control";
		$this->DonorBloodgroup->EditCustomAttributes = "";
		if (!$this->DonorBloodgroup->Raw)
			$this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
		$this->DonorBloodgroup->EditValue = $this->DonorBloodgroup->CurrentValue;
		$this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

		// Tank
		$this->Tank->EditAttrs["class"] = "form-control";
		$this->Tank->EditCustomAttributes = "";
		if (!$this->Tank->Raw)
			$this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
		$this->Tank->EditValue = $this->Tank->CurrentValue;
		$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

		// Location
		$this->Location->EditAttrs["class"] = "form-control";
		$this->Location->EditCustomAttributes = "";
		if (!$this->Location->Raw)
			$this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
		$this->Location->EditValue = $this->Location->CurrentValue;
		$this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

		// Volume1
		$this->Volume1->EditAttrs["class"] = "form-control";
		$this->Volume1->EditCustomAttributes = "";
		if (!$this->Volume1->Raw)
			$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
		$this->Volume1->EditValue = $this->Volume1->CurrentValue;
		$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

		// Concentration1
		$this->Concentration1->EditAttrs["class"] = "form-control";
		$this->Concentration1->EditCustomAttributes = "";
		if (!$this->Concentration1->Raw)
			$this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
		$this->Concentration1->EditValue = $this->Concentration1->CurrentValue;
		$this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

		// Total1
		$this->Total1->EditAttrs["class"] = "form-control";
		$this->Total1->EditCustomAttributes = "";
		if (!$this->Total1->Raw)
			$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
		$this->Total1->EditValue = $this->Total1->CurrentValue;
		$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

		// ProgressiveMotility1
		$this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility1->EditCustomAttributes = "";
		if (!$this->ProgressiveMotility1->Raw)
			$this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
		$this->ProgressiveMotility1->EditValue = $this->ProgressiveMotility1->CurrentValue;
		$this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile1->EditCustomAttributes = "";
		if (!$this->NonProgrssiveMotile1->Raw)
			$this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
		$this->NonProgrssiveMotile1->EditValue = $this->NonProgrssiveMotile1->CurrentValue;
		$this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

		// Immotile1
		$this->Immotile1->EditAttrs["class"] = "form-control";
		$this->Immotile1->EditCustomAttributes = "";
		if (!$this->Immotile1->Raw)
			$this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
		$this->Immotile1->EditValue = $this->Immotile1->CurrentValue;
		$this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile1->EditCustomAttributes = "";
		if (!$this->TotalProgrssiveMotile1->Raw)
			$this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
		$this->TotalProgrssiveMotile1->EditValue = $this->TotalProgrssiveMotile1->CurrentValue;
		$this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		if ($this->TidNo->getSessionValue() != "") {
			$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
		} else {
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
		}

		// Color
		$this->Color->EditAttrs["class"] = "form-control";
		$this->Color->EditCustomAttributes = "";
		if (!$this->Color->Raw)
			$this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
		$this->Color->EditValue = $this->Color->CurrentValue;
		$this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

		// DoneBy
		$this->DoneBy->EditAttrs["class"] = "form-control";
		$this->DoneBy->EditCustomAttributes = "";
		if (!$this->DoneBy->Raw)
			$this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
		$this->DoneBy->EditValue = $this->DoneBy->CurrentValue;
		$this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

		// Method
		$this->Method->EditAttrs["class"] = "form-control";
		$this->Method->EditCustomAttributes = "";
		if (!$this->Method->Raw)
			$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
		$this->Method->EditValue = $this->Method->CurrentValue;
		$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

		// Abstinence
		$this->Abstinence->EditAttrs["class"] = "form-control";
		$this->Abstinence->EditCustomAttributes = "";
		if (!$this->Abstinence->Raw)
			$this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
		$this->Abstinence->EditValue = $this->Abstinence->CurrentValue;
		$this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

		// ProcessedBy
		$this->ProcessedBy->EditAttrs["class"] = "form-control";
		$this->ProcessedBy->EditCustomAttributes = "";
		if (!$this->ProcessedBy->Raw)
			$this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
		$this->ProcessedBy->EditValue = $this->ProcessedBy->CurrentValue;
		$this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

		// InseminationTime
		$this->InseminationTime->EditAttrs["class"] = "form-control";
		$this->InseminationTime->EditCustomAttributes = "";
		if (!$this->InseminationTime->Raw)
			$this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
		$this->InseminationTime->EditValue = $this->InseminationTime->CurrentValue;
		$this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

		// InseminationBy
		$this->InseminationBy->EditAttrs["class"] = "form-control";
		$this->InseminationBy->EditCustomAttributes = "";
		if (!$this->InseminationBy->Raw)
			$this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
		$this->InseminationBy->EditValue = $this->InseminationBy->CurrentValue;
		$this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

		// Big
		$this->Big->EditAttrs["class"] = "form-control";
		$this->Big->EditCustomAttributes = "";
		if (!$this->Big->Raw)
			$this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
		$this->Big->EditValue = $this->Big->CurrentValue;
		$this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

		// Medium
		$this->Medium->EditAttrs["class"] = "form-control";
		$this->Medium->EditCustomAttributes = "";
		if (!$this->Medium->Raw)
			$this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
		$this->Medium->EditValue = $this->Medium->CurrentValue;
		$this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

		// Small
		$this->Small->EditAttrs["class"] = "form-control";
		$this->Small->EditCustomAttributes = "";
		if (!$this->Small->Raw)
			$this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
		$this->Small->EditValue = $this->Small->CurrentValue;
		$this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

		// NoHalo
		$this->NoHalo->EditAttrs["class"] = "form-control";
		$this->NoHalo->EditCustomAttributes = "";
		if (!$this->NoHalo->Raw)
			$this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
		$this->NoHalo->EditValue = $this->NoHalo->CurrentValue;
		$this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

		// Fragmented
		$this->Fragmented->EditAttrs["class"] = "form-control";
		$this->Fragmented->EditCustomAttributes = "";
		if (!$this->Fragmented->Raw)
			$this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
		$this->Fragmented->EditValue = $this->Fragmented->CurrentValue;
		$this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

		// NonFragmented
		$this->NonFragmented->EditAttrs["class"] = "form-control";
		$this->NonFragmented->EditCustomAttributes = "";
		if (!$this->NonFragmented->Raw)
			$this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
		$this->NonFragmented->EditValue = $this->NonFragmented->CurrentValue;
		$this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

		// DFI
		$this->DFI->EditAttrs["class"] = "form-control";
		$this->DFI->EditCustomAttributes = "";
		if (!$this->DFI->Raw)
			$this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
		$this->DFI->EditValue = $this->DFI->CurrentValue;
		$this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

		// IsueBy
		$this->IsueBy->EditAttrs["class"] = "form-control";
		$this->IsueBy->EditCustomAttributes = "";
		if (!$this->IsueBy->Raw)
			$this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
		$this->IsueBy->EditValue = $this->IsueBy->CurrentValue;
		$this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

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

		// Total2
		$this->Total2->EditAttrs["class"] = "form-control";
		$this->Total2->EditCustomAttributes = "";
		if (!$this->Total2->Raw)
			$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
		$this->Total2->EditValue = $this->Total2->CurrentValue;
		$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

		// ProgressiveMotility2
		$this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility2->EditCustomAttributes = "";
		if (!$this->ProgressiveMotility2->Raw)
			$this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
		$this->ProgressiveMotility2->EditValue = $this->ProgressiveMotility2->CurrentValue;
		$this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile2->EditCustomAttributes = "";
		if (!$this->NonProgrssiveMotile2->Raw)
			$this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
		$this->NonProgrssiveMotile2->EditValue = $this->NonProgrssiveMotile2->CurrentValue;
		$this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

		// Immotile2
		$this->Immotile2->EditAttrs["class"] = "form-control";
		$this->Immotile2->EditCustomAttributes = "";
		if (!$this->Immotile2->Raw)
			$this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
		$this->Immotile2->EditValue = $this->Immotile2->CurrentValue;
		$this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile2->EditCustomAttributes = "";
		if (!$this->TotalProgrssiveMotile2->Raw)
			$this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
		$this->TotalProgrssiveMotile2->EditValue = $this->TotalProgrssiveMotile2->CurrentValue;
		$this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

		// MACS
		$this->MACS->EditCustomAttributes = "";
		$this->MACS->EditValue = $this->MACS->options(FALSE);

		// IssuedBy
		$this->IssuedBy->EditAttrs["class"] = "form-control";
		$this->IssuedBy->EditCustomAttributes = "";
		if (!$this->IssuedBy->Raw)
			$this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
		$this->IssuedBy->EditValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

		// IssuedTo
		$this->IssuedTo->EditAttrs["class"] = "form-control";
		$this->IssuedTo->EditCustomAttributes = "";
		if (!$this->IssuedTo->Raw)
			$this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
		$this->IssuedTo->EditValue = $this->IssuedTo->CurrentValue;
		$this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

		// PaID
		$this->PaID->EditAttrs["class"] = "form-control";
		$this->PaID->EditCustomAttributes = "";
		if (!$this->PaID->Raw)
			$this->PaID->CurrentValue = HtmlDecode($this->PaID->CurrentValue);
		$this->PaID->EditValue = $this->PaID->CurrentValue;
		$this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

		// PaName
		$this->PaName->EditAttrs["class"] = "form-control";
		$this->PaName->EditCustomAttributes = "";
		if (!$this->PaName->Raw)
			$this->PaName->CurrentValue = HtmlDecode($this->PaName->CurrentValue);
		$this->PaName->EditValue = $this->PaName->CurrentValue;
		$this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

		// PaMobile
		$this->PaMobile->EditAttrs["class"] = "form-control";
		$this->PaMobile->EditCustomAttributes = "";
		if (!$this->PaMobile->Raw)
			$this->PaMobile->CurrentValue = HtmlDecode($this->PaMobile->CurrentValue);
		$this->PaMobile->EditValue = $this->PaMobile->CurrentValue;
		$this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		if (!$this->PartnerID->Raw)
			$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (!$this->PartnerName->Raw)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PartnerMobile
		$this->PartnerMobile->EditAttrs["class"] = "form-control";
		$this->PartnerMobile->EditCustomAttributes = "";
		if (!$this->PartnerMobile->Raw)
			$this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
		$this->PartnerMobile->EditValue = $this->PartnerMobile->CurrentValue;
		$this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
		$this->PREG_TEST_DATE->EditCustomAttributes = "";
		$this->PREG_TEST_DATE->EditValue = FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8);
		$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
		$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
		$this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(TRUE);

		// IMSC_1
		$this->IMSC_1->EditAttrs["class"] = "form-control";
		$this->IMSC_1->EditCustomAttributes = "";
		if (!$this->IMSC_1->Raw)
			$this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
		$this->IMSC_1->EditValue = $this->IMSC_1->CurrentValue;
		$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

		// IMSC_2
		$this->IMSC_2->EditAttrs["class"] = "form-control";
		$this->IMSC_2->EditCustomAttributes = "";
		if (!$this->IMSC_2->Raw)
			$this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
		$this->IMSC_2->EditValue = $this->IMSC_2->CurrentValue;
		$this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
		$this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
		$this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(TRUE);

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
		$this->IUI_PREP_METHOD->EditCustomAttributes = "";
		$this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(TRUE);

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
		$this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
		$this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(TRUE);

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
		$this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
		$this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(TRUE);

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
		$this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
		if (!$this->TIME_FROM_PREP_TO_INSEM->Raw)
			$this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
		$this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
		$this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

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
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->HusbandName);
					$doc->exportCaption($this->RequestDr);
					$doc->exportCaption($this->CollectionDate);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->RequestSample);
					$doc->exportCaption($this->CollectionType);
					$doc->exportCaption($this->CollectionMethod);
					$doc->exportCaption($this->Medicationused);
					$doc->exportCaption($this->DifficultiesinCollection);
					$doc->exportCaption($this->pH);
					$doc->exportCaption($this->Timeofcollection);
					$doc->exportCaption($this->Timeofexamination);
					$doc->exportCaption($this->Volume);
					$doc->exportCaption($this->Concentration);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->ProgressiveMotility);
					$doc->exportCaption($this->NonProgrssiveMotile);
					$doc->exportCaption($this->Immotile);
					$doc->exportCaption($this->TotalProgrssiveMotile);
					$doc->exportCaption($this->Appearance);
					$doc->exportCaption($this->Homogenosity);
					$doc->exportCaption($this->CompleteSample);
					$doc->exportCaption($this->Liquefactiontime);
					$doc->exportCaption($this->Normal);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->Headdefects);
					$doc->exportCaption($this->MidpieceDefects);
					$doc->exportCaption($this->TailDefects);
					$doc->exportCaption($this->NormalProgMotile);
					$doc->exportCaption($this->ImmatureForms);
					$doc->exportCaption($this->Leucocytes);
					$doc->exportCaption($this->Agglutination);
					$doc->exportCaption($this->Debris);
					$doc->exportCaption($this->Diagnosis);
					$doc->exportCaption($this->Observations);
					$doc->exportCaption($this->Signature);
					$doc->exportCaption($this->SemenOrgin);
					$doc->exportCaption($this->Donor);
					$doc->exportCaption($this->DonorBloodgroup);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Location);
					$doc->exportCaption($this->Volume1);
					$doc->exportCaption($this->Concentration1);
					$doc->exportCaption($this->Total1);
					$doc->exportCaption($this->ProgressiveMotility1);
					$doc->exportCaption($this->NonProgrssiveMotile1);
					$doc->exportCaption($this->Immotile1);
					$doc->exportCaption($this->TotalProgrssiveMotile1);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Color);
					$doc->exportCaption($this->DoneBy);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Abstinence);
					$doc->exportCaption($this->ProcessedBy);
					$doc->exportCaption($this->InseminationTime);
					$doc->exportCaption($this->InseminationBy);
					$doc->exportCaption($this->Big);
					$doc->exportCaption($this->Medium);
					$doc->exportCaption($this->Small);
					$doc->exportCaption($this->NoHalo);
					$doc->exportCaption($this->Fragmented);
					$doc->exportCaption($this->NonFragmented);
					$doc->exportCaption($this->DFI);
					$doc->exportCaption($this->IsueBy);
					$doc->exportCaption($this->Volume2);
					$doc->exportCaption($this->Concentration2);
					$doc->exportCaption($this->Total2);
					$doc->exportCaption($this->ProgressiveMotility2);
					$doc->exportCaption($this->NonProgrssiveMotile2);
					$doc->exportCaption($this->Immotile2);
					$doc->exportCaption($this->TotalProgrssiveMotile2);
					$doc->exportCaption($this->MACS);
					$doc->exportCaption($this->IssuedBy);
					$doc->exportCaption($this->IssuedTo);
					$doc->exportCaption($this->PaID);
					$doc->exportCaption($this->PaName);
					$doc->exportCaption($this->PaMobile);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
					$doc->exportCaption($this->PREG_TEST_DATE);
					$doc->exportCaption($this->SPECIFIC_PROBLEMS);
					$doc->exportCaption($this->IMSC_1);
					$doc->exportCaption($this->IMSC_2);
					$doc->exportCaption($this->LIQUIFACTION_STORAGE);
					$doc->exportCaption($this->IUI_PREP_METHOD);
					$doc->exportCaption($this->TIME_FROM_TRIGGER);
					$doc->exportCaption($this->COLLECTION_TO_PREPARATION);
					$doc->exportCaption($this->TIME_FROM_PREP_TO_INSEM);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->HusbandName);
					$doc->exportCaption($this->RequestDr);
					$doc->exportCaption($this->CollectionDate);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->RequestSample);
					$doc->exportCaption($this->CollectionType);
					$doc->exportCaption($this->CollectionMethod);
					$doc->exportCaption($this->Medicationused);
					$doc->exportCaption($this->DifficultiesinCollection);
					$doc->exportCaption($this->pH);
					$doc->exportCaption($this->Timeofcollection);
					$doc->exportCaption($this->Timeofexamination);
					$doc->exportCaption($this->Volume);
					$doc->exportCaption($this->Concentration);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->ProgressiveMotility);
					$doc->exportCaption($this->NonProgrssiveMotile);
					$doc->exportCaption($this->Immotile);
					$doc->exportCaption($this->TotalProgrssiveMotile);
					$doc->exportCaption($this->Appearance);
					$doc->exportCaption($this->Homogenosity);
					$doc->exportCaption($this->CompleteSample);
					$doc->exportCaption($this->Liquefactiontime);
					$doc->exportCaption($this->Normal);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->Headdefects);
					$doc->exportCaption($this->MidpieceDefects);
					$doc->exportCaption($this->TailDefects);
					$doc->exportCaption($this->NormalProgMotile);
					$doc->exportCaption($this->ImmatureForms);
					$doc->exportCaption($this->Leucocytes);
					$doc->exportCaption($this->Agglutination);
					$doc->exportCaption($this->Debris);
					$doc->exportCaption($this->Diagnosis);
					$doc->exportCaption($this->Observations);
					$doc->exportCaption($this->Signature);
					$doc->exportCaption($this->SemenOrgin);
					$doc->exportCaption($this->Donor);
					$doc->exportCaption($this->DonorBloodgroup);
					$doc->exportCaption($this->Tank);
					$doc->exportCaption($this->Location);
					$doc->exportCaption($this->Volume1);
					$doc->exportCaption($this->Concentration1);
					$doc->exportCaption($this->Total1);
					$doc->exportCaption($this->ProgressiveMotility1);
					$doc->exportCaption($this->NonProgrssiveMotile1);
					$doc->exportCaption($this->Immotile1);
					$doc->exportCaption($this->TotalProgrssiveMotile1);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Color);
					$doc->exportCaption($this->DoneBy);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Abstinence);
					$doc->exportCaption($this->ProcessedBy);
					$doc->exportCaption($this->InseminationTime);
					$doc->exportCaption($this->InseminationBy);
					$doc->exportCaption($this->Big);
					$doc->exportCaption($this->Medium);
					$doc->exportCaption($this->Small);
					$doc->exportCaption($this->NoHalo);
					$doc->exportCaption($this->Fragmented);
					$doc->exportCaption($this->NonFragmented);
					$doc->exportCaption($this->DFI);
					$doc->exportCaption($this->IsueBy);
					$doc->exportCaption($this->Volume2);
					$doc->exportCaption($this->Concentration2);
					$doc->exportCaption($this->Total2);
					$doc->exportCaption($this->ProgressiveMotility2);
					$doc->exportCaption($this->NonProgrssiveMotile2);
					$doc->exportCaption($this->Immotile2);
					$doc->exportCaption($this->TotalProgrssiveMotile2);
					$doc->exportCaption($this->IssuedBy);
					$doc->exportCaption($this->IssuedTo);
					$doc->exportCaption($this->PaID);
					$doc->exportCaption($this->PaName);
					$doc->exportCaption($this->PaMobile);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
					$doc->exportCaption($this->PREG_TEST_DATE);
					$doc->exportCaption($this->SPECIFIC_PROBLEMS);
					$doc->exportCaption($this->IMSC_1);
					$doc->exportCaption($this->IMSC_2);
					$doc->exportCaption($this->LIQUIFACTION_STORAGE);
					$doc->exportCaption($this->IUI_PREP_METHOD);
					$doc->exportCaption($this->TIME_FROM_TRIGGER);
					$doc->exportCaption($this->COLLECTION_TO_PREPARATION);
					$doc->exportCaption($this->TIME_FROM_PREP_TO_INSEM);
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
						$doc->exportField($this->PatientName);
						$doc->exportField($this->HusbandName);
						$doc->exportField($this->RequestDr);
						$doc->exportField($this->CollectionDate);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->RequestSample);
						$doc->exportField($this->CollectionType);
						$doc->exportField($this->CollectionMethod);
						$doc->exportField($this->Medicationused);
						$doc->exportField($this->DifficultiesinCollection);
						$doc->exportField($this->pH);
						$doc->exportField($this->Timeofcollection);
						$doc->exportField($this->Timeofexamination);
						$doc->exportField($this->Volume);
						$doc->exportField($this->Concentration);
						$doc->exportField($this->Total);
						$doc->exportField($this->ProgressiveMotility);
						$doc->exportField($this->NonProgrssiveMotile);
						$doc->exportField($this->Immotile);
						$doc->exportField($this->TotalProgrssiveMotile);
						$doc->exportField($this->Appearance);
						$doc->exportField($this->Homogenosity);
						$doc->exportField($this->CompleteSample);
						$doc->exportField($this->Liquefactiontime);
						$doc->exportField($this->Normal);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->Headdefects);
						$doc->exportField($this->MidpieceDefects);
						$doc->exportField($this->TailDefects);
						$doc->exportField($this->NormalProgMotile);
						$doc->exportField($this->ImmatureForms);
						$doc->exportField($this->Leucocytes);
						$doc->exportField($this->Agglutination);
						$doc->exportField($this->Debris);
						$doc->exportField($this->Diagnosis);
						$doc->exportField($this->Observations);
						$doc->exportField($this->Signature);
						$doc->exportField($this->SemenOrgin);
						$doc->exportField($this->Donor);
						$doc->exportField($this->DonorBloodgroup);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Location);
						$doc->exportField($this->Volume1);
						$doc->exportField($this->Concentration1);
						$doc->exportField($this->Total1);
						$doc->exportField($this->ProgressiveMotility1);
						$doc->exportField($this->NonProgrssiveMotile1);
						$doc->exportField($this->Immotile1);
						$doc->exportField($this->TotalProgrssiveMotile1);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Color);
						$doc->exportField($this->DoneBy);
						$doc->exportField($this->Method);
						$doc->exportField($this->Abstinence);
						$doc->exportField($this->ProcessedBy);
						$doc->exportField($this->InseminationTime);
						$doc->exportField($this->InseminationBy);
						$doc->exportField($this->Big);
						$doc->exportField($this->Medium);
						$doc->exportField($this->Small);
						$doc->exportField($this->NoHalo);
						$doc->exportField($this->Fragmented);
						$doc->exportField($this->NonFragmented);
						$doc->exportField($this->DFI);
						$doc->exportField($this->IsueBy);
						$doc->exportField($this->Volume2);
						$doc->exportField($this->Concentration2);
						$doc->exportField($this->Total2);
						$doc->exportField($this->ProgressiveMotility2);
						$doc->exportField($this->NonProgrssiveMotile2);
						$doc->exportField($this->Immotile2);
						$doc->exportField($this->TotalProgrssiveMotile2);
						$doc->exportField($this->MACS);
						$doc->exportField($this->IssuedBy);
						$doc->exportField($this->IssuedTo);
						$doc->exportField($this->PaID);
						$doc->exportField($this->PaName);
						$doc->exportField($this->PaMobile);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
						$doc->exportField($this->PREG_TEST_DATE);
						$doc->exportField($this->SPECIFIC_PROBLEMS);
						$doc->exportField($this->IMSC_1);
						$doc->exportField($this->IMSC_2);
						$doc->exportField($this->LIQUIFACTION_STORAGE);
						$doc->exportField($this->IUI_PREP_METHOD);
						$doc->exportField($this->TIME_FROM_TRIGGER);
						$doc->exportField($this->COLLECTION_TO_PREPARATION);
						$doc->exportField($this->TIME_FROM_PREP_TO_INSEM);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->HusbandName);
						$doc->exportField($this->RequestDr);
						$doc->exportField($this->CollectionDate);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->RequestSample);
						$doc->exportField($this->CollectionType);
						$doc->exportField($this->CollectionMethod);
						$doc->exportField($this->Medicationused);
						$doc->exportField($this->DifficultiesinCollection);
						$doc->exportField($this->pH);
						$doc->exportField($this->Timeofcollection);
						$doc->exportField($this->Timeofexamination);
						$doc->exportField($this->Volume);
						$doc->exportField($this->Concentration);
						$doc->exportField($this->Total);
						$doc->exportField($this->ProgressiveMotility);
						$doc->exportField($this->NonProgrssiveMotile);
						$doc->exportField($this->Immotile);
						$doc->exportField($this->TotalProgrssiveMotile);
						$doc->exportField($this->Appearance);
						$doc->exportField($this->Homogenosity);
						$doc->exportField($this->CompleteSample);
						$doc->exportField($this->Liquefactiontime);
						$doc->exportField($this->Normal);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->Headdefects);
						$doc->exportField($this->MidpieceDefects);
						$doc->exportField($this->TailDefects);
						$doc->exportField($this->NormalProgMotile);
						$doc->exportField($this->ImmatureForms);
						$doc->exportField($this->Leucocytes);
						$doc->exportField($this->Agglutination);
						$doc->exportField($this->Debris);
						$doc->exportField($this->Diagnosis);
						$doc->exportField($this->Observations);
						$doc->exportField($this->Signature);
						$doc->exportField($this->SemenOrgin);
						$doc->exportField($this->Donor);
						$doc->exportField($this->DonorBloodgroup);
						$doc->exportField($this->Tank);
						$doc->exportField($this->Location);
						$doc->exportField($this->Volume1);
						$doc->exportField($this->Concentration1);
						$doc->exportField($this->Total1);
						$doc->exportField($this->ProgressiveMotility1);
						$doc->exportField($this->NonProgrssiveMotile1);
						$doc->exportField($this->Immotile1);
						$doc->exportField($this->TotalProgrssiveMotile1);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Color);
						$doc->exportField($this->DoneBy);
						$doc->exportField($this->Method);
						$doc->exportField($this->Abstinence);
						$doc->exportField($this->ProcessedBy);
						$doc->exportField($this->InseminationTime);
						$doc->exportField($this->InseminationBy);
						$doc->exportField($this->Big);
						$doc->exportField($this->Medium);
						$doc->exportField($this->Small);
						$doc->exportField($this->NoHalo);
						$doc->exportField($this->Fragmented);
						$doc->exportField($this->NonFragmented);
						$doc->exportField($this->DFI);
						$doc->exportField($this->IsueBy);
						$doc->exportField($this->Volume2);
						$doc->exportField($this->Concentration2);
						$doc->exportField($this->Total2);
						$doc->exportField($this->ProgressiveMotility2);
						$doc->exportField($this->NonProgrssiveMotile2);
						$doc->exportField($this->Immotile2);
						$doc->exportField($this->TotalProgrssiveMotile2);
						$doc->exportField($this->IssuedBy);
						$doc->exportField($this->IssuedTo);
						$doc->exportField($this->PaID);
						$doc->exportField($this->PaName);
						$doc->exportField($this->PaMobile);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
						$doc->exportField($this->PREG_TEST_DATE);
						$doc->exportField($this->SPECIFIC_PROBLEMS);
						$doc->exportField($this->IMSC_1);
						$doc->exportField($this->IMSC_2);
						$doc->exportField($this->LIQUIFACTION_STORAGE);
						$doc->exportField($this->IUI_PREP_METHOD);
						$doc->exportField($this->TIME_FROM_TRIGGER);
						$doc->exportField($this->COLLECTION_TO_PREPARATION);
						$doc->exportField($this->TIME_FROM_PREP_TO_INSEM);
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