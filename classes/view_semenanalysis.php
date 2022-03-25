<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_semenanalysis
 */
class view_semenanalysis extends DbTable
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
	public $PaID;
	public $PaName;
	public $PaMobile;
	public $PartnerID;
	public $PartnerName;
	public $PartnerMobile;
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
	public $Volume;
	public $pH;
	public $Timeofcollection;
	public $Timeofexamination;
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
	public $IssuedBy;
	public $IssuedTo;
	public $MACS;
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

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_semenanalysis';
		$this->TableName = 'view_semenanalysis';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_semenanalysis`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PaID
		$this->PaID = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PaID', 'PaID', '`PaID`', '`PaID`', 200, -1, FALSE, '`PaID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaID->Sortable = TRUE; // Allow sort
		$this->fields['PaID'] = &$this->PaID;

		// PaName
		$this->PaName = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PaName', 'PaName', '`PaName`', '`PaName`', 200, -1, FALSE, '`PaName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaName->Sortable = TRUE; // Allow sort
		$this->fields['PaName'] = &$this->PaName;

		// PaMobile
		$this->PaMobile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PaMobile', 'PaMobile', '`PaMobile`', '`PaMobile`', 200, -1, FALSE, '`PaMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PaMobile->Sortable = TRUE; // Allow sort
		$this->fields['PaMobile'] = &$this->PaMobile;

		// PartnerID
		$this->PartnerID = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// PartnerName
		$this->PartnerName = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerMobile
		$this->PartnerMobile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PartnerMobile', 'PartnerMobile', '`PartnerMobile`', '`PartnerMobile`', 200, -1, FALSE, '`PartnerMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerMobile->Sortable = TRUE; // Allow sort
		$this->fields['PartnerMobile'] = &$this->PartnerMobile;

		// RIDNo
		$this->RIDNo = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RIDNo->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RIDNo->Lookup = new Lookup('RIDNo', 'ivf', FALSE, 'id', ["CoupleID","PatientID","PatientName","PartnerName"], [], [], [], [], ["PatientID","PatientName","WifeCell","PartnerID","PartnerName","HusbandCell","Female"], ["x_PaID","x_PaName","x_PaMobile","x_PartnerID","x_PartnerName","x_PartnerMobile","x_PatientName"], '`id` DESC', '');
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// PatientName
		$this->PatientName = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->PatientName->Lookup = new Lookup('PatientName', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], [], [], '', '');
		$this->fields['PatientName'] = &$this->PatientName;

		// HusbandName
		$this->HusbandName = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_HusbandName', 'HusbandName', '`HusbandName`', '`HusbandName`', 200, -1, FALSE, '`HusbandName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HusbandName->Sortable = TRUE; // Allow sort
		$this->HusbandName->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HusbandName->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->HusbandName->Lookup = new Lookup('HusbandName', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["PatientID","first_name","mobile_no"], ["x_PaID","x_PaName","x_PaMobile"], '`id` DESC', '');
		$this->fields['HusbandName'] = &$this->HusbandName;

		// RequestDr
		$this->RequestDr = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_RequestDr', 'RequestDr', '`RequestDr`', '`RequestDr`', 200, -1, FALSE, '`RequestDr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RequestDr->Sortable = TRUE; // Allow sort
		$this->fields['RequestDr'] = &$this->RequestDr;

		// CollectionDate
		$this->CollectionDate = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_CollectionDate', 'CollectionDate', '`CollectionDate`', CastDateFieldForLike('`CollectionDate`', 7, "DB"), 135, 7, FALSE, '`CollectionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CollectionDate->Sortable = TRUE; // Allow sort
		$this->CollectionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['CollectionDate'] = &$this->CollectionDate;

		// ResultDate
		$this->ResultDate = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike('`ResultDate`', 7, "DB"), 135, 7, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// RequestSample
		$this->RequestSample = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_RequestSample', 'RequestSample', '`RequestSample`', '`RequestSample`', 200, -1, FALSE, '`RequestSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->RequestSample->Sortable = TRUE; // Allow sort
		$this->RequestSample->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->RequestSample->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->RequestSample->Lookup = new Lookup('RequestSample', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->RequestSample->OptionCount = 5;
		$this->fields['RequestSample'] = &$this->RequestSample;

		// CollectionType
		$this->CollectionType = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_CollectionType', 'CollectionType', '`CollectionType`', '`CollectionType`', 200, -1, FALSE, '`CollectionType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CollectionType->Sortable = FALSE; // Allow sort
		$this->CollectionType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CollectionType->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->CollectionType->Lookup = new Lookup('CollectionType', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CollectionType->OptionCount = 2;
		$this->fields['CollectionType'] = &$this->CollectionType;

		// CollectionMethod
		$this->CollectionMethod = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_CollectionMethod', 'CollectionMethod', '`CollectionMethod`', '`CollectionMethod`', 200, -1, FALSE, '`CollectionMethod`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CollectionMethod->Sortable = FALSE; // Allow sort
		$this->CollectionMethod->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CollectionMethod->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->CollectionMethod->Lookup = new Lookup('CollectionMethod', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CollectionMethod->OptionCount = 2;
		$this->fields['CollectionMethod'] = &$this->CollectionMethod;

		// Medicationused
		$this->Medicationused = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Medicationused', 'Medicationused', '`Medicationused`', '`Medicationused`', 200, -1, FALSE, '`Medicationused`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Medicationused->Sortable = FALSE; // Allow sort
		$this->Medicationused->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Medicationused->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Medicationused->Lookup = new Lookup('Medicationused', 'ivf_semenan_medication', FALSE, 'Medication', ["Medication","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Medicationused'] = &$this->Medicationused;

		// DifficultiesinCollection
		$this->DifficultiesinCollection = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_DifficultiesinCollection', 'DifficultiesinCollection', '`DifficultiesinCollection`', '`DifficultiesinCollection`', 200, -1, FALSE, '`DifficultiesinCollection`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DifficultiesinCollection->Sortable = FALSE; // Allow sort
		$this->DifficultiesinCollection->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DifficultiesinCollection->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DifficultiesinCollection->Lookup = new Lookup('DifficultiesinCollection', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->DifficultiesinCollection->OptionCount = 2;
		$this->fields['DifficultiesinCollection'] = &$this->DifficultiesinCollection;

		// Volume
		$this->Volume = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 200, -1, FALSE, '`Volume`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume->Sortable = FALSE; // Allow sort
		$this->fields['Volume'] = &$this->Volume;

		// pH
		$this->pH = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_pH', 'pH', '`pH`', '`pH`', 200, -1, FALSE, '`pH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pH->Sortable = FALSE; // Allow sort
		$this->fields['pH'] = &$this->pH;

		// Timeofcollection
		$this->Timeofcollection = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Timeofcollection', 'Timeofcollection', '`Timeofcollection`', '`Timeofcollection`', 200, -1, FALSE, '`Timeofcollection`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Timeofcollection->Sortable = FALSE; // Allow sort
		$this->fields['Timeofcollection'] = &$this->Timeofcollection;

		// Timeofexamination
		$this->Timeofexamination = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Timeofexamination', 'Timeofexamination', '`Timeofexamination`', '`Timeofexamination`', 200, -1, FALSE, '`Timeofexamination`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Timeofexamination->Sortable = FALSE; // Allow sort
		$this->fields['Timeofexamination'] = &$this->Timeofexamination;

		// Concentration
		$this->Concentration = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Concentration', 'Concentration', '`Concentration`', '`Concentration`', 200, -1, FALSE, '`Concentration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration->Sortable = FALSE; // Allow sort
		$this->fields['Concentration'] = &$this->Concentration;

		// Total
		$this->Total = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Total', 'Total', '`Total`', '`Total`', 200, -1, FALSE, '`Total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total->Sortable = FALSE; // Allow sort
		$this->fields['Total'] = &$this->Total;

		// ProgressiveMotility
		$this->ProgressiveMotility = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ProgressiveMotility', 'ProgressiveMotility', '`ProgressiveMotility`', '`ProgressiveMotility`', 200, -1, FALSE, '`ProgressiveMotility`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility->Sortable = FALSE; // Allow sort
		$this->fields['ProgressiveMotility'] = &$this->ProgressiveMotility;

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NonProgrssiveMotile', 'NonProgrssiveMotile', '`NonProgrssiveMotile`', '`NonProgrssiveMotile`', 200, -1, FALSE, '`NonProgrssiveMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile->Sortable = FALSE; // Allow sort
		$this->fields['NonProgrssiveMotile'] = &$this->NonProgrssiveMotile;

		// Immotile
		$this->Immotile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Immotile', 'Immotile', '`Immotile`', '`Immotile`', 200, -1, FALSE, '`Immotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile->Sortable = FALSE; // Allow sort
		$this->fields['Immotile'] = &$this->Immotile;

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TotalProgrssiveMotile', 'TotalProgrssiveMotile', '`TotalProgrssiveMotile`', '`TotalProgrssiveMotile`', 200, -1, FALSE, '`TotalProgrssiveMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile->Sortable = FALSE; // Allow sort
		$this->fields['TotalProgrssiveMotile'] = &$this->TotalProgrssiveMotile;

		// Appearance
		$this->Appearance = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Appearance', 'Appearance', '`Appearance`', '`Appearance`', 200, -1, FALSE, '`Appearance`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Appearance->Sortable = FALSE; // Allow sort
		$this->fields['Appearance'] = &$this->Appearance;

		// Homogenosity
		$this->Homogenosity = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Homogenosity', 'Homogenosity', '`Homogenosity`', '`Homogenosity`', 200, -1, FALSE, '`Homogenosity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Homogenosity->Sortable = FALSE; // Allow sort
		$this->Homogenosity->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Homogenosity->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Homogenosity->Lookup = new Lookup('Homogenosity', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Homogenosity->OptionCount = 2;
		$this->fields['Homogenosity'] = &$this->Homogenosity;

		// CompleteSample
		$this->CompleteSample = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_CompleteSample', 'CompleteSample', '`CompleteSample`', '`CompleteSample`', 200, -1, FALSE, '`CompleteSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->CompleteSample->Sortable = FALSE; // Allow sort
		$this->CompleteSample->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->CompleteSample->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->CompleteSample->Lookup = new Lookup('CompleteSample', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->CompleteSample->OptionCount = 3;
		$this->fields['CompleteSample'] = &$this->CompleteSample;

		// Liquefactiontime
		$this->Liquefactiontime = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Liquefactiontime', 'Liquefactiontime', '`Liquefactiontime`', '`Liquefactiontime`', 200, -1, FALSE, '`Liquefactiontime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Liquefactiontime->Sortable = FALSE; // Allow sort
		$this->fields['Liquefactiontime'] = &$this->Liquefactiontime;

		// Normal
		$this->Normal = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Normal', 'Normal', '`Normal`', '`Normal`', 200, -1, FALSE, '`Normal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Normal->Sortable = FALSE; // Allow sort
		$this->fields['Normal'] = &$this->Normal;

		// Abnormal
		$this->Abnormal = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, -1, FALSE, '`Abnormal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormal->Sortable = FALSE; // Allow sort
		$this->fields['Abnormal'] = &$this->Abnormal;

		// Headdefects
		$this->Headdefects = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Headdefects', 'Headdefects', '`Headdefects`', '`Headdefects`', 200, -1, FALSE, '`Headdefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Headdefects->Sortable = FALSE; // Allow sort
		$this->fields['Headdefects'] = &$this->Headdefects;

		// MidpieceDefects
		$this->MidpieceDefects = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_MidpieceDefects', 'MidpieceDefects', '`MidpieceDefects`', '`MidpieceDefects`', 200, -1, FALSE, '`MidpieceDefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MidpieceDefects->Sortable = FALSE; // Allow sort
		$this->fields['MidpieceDefects'] = &$this->MidpieceDefects;

		// TailDefects
		$this->TailDefects = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TailDefects', 'TailDefects', '`TailDefects`', '`TailDefects`', 200, -1, FALSE, '`TailDefects`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TailDefects->Sortable = FALSE; // Allow sort
		$this->fields['TailDefects'] = &$this->TailDefects;

		// NormalProgMotile
		$this->NormalProgMotile = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NormalProgMotile', 'NormalProgMotile', '`NormalProgMotile`', '`NormalProgMotile`', 200, -1, FALSE, '`NormalProgMotile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NormalProgMotile->Sortable = FALSE; // Allow sort
		$this->fields['NormalProgMotile'] = &$this->NormalProgMotile;

		// ImmatureForms
		$this->ImmatureForms = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ImmatureForms', 'ImmatureForms', '`ImmatureForms`', '`ImmatureForms`', 200, -1, FALSE, '`ImmatureForms`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ImmatureForms->Sortable = FALSE; // Allow sort
		$this->fields['ImmatureForms'] = &$this->ImmatureForms;

		// Leucocytes
		$this->Leucocytes = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Leucocytes', 'Leucocytes', '`Leucocytes`', '`Leucocytes`', 200, -1, FALSE, '`Leucocytes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Leucocytes->Sortable = FALSE; // Allow sort
		$this->fields['Leucocytes'] = &$this->Leucocytes;

		// Agglutination
		$this->Agglutination = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Agglutination', 'Agglutination', '`Agglutination`', '`Agglutination`', 200, -1, FALSE, '`Agglutination`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Agglutination->Sortable = FALSE; // Allow sort
		$this->fields['Agglutination'] = &$this->Agglutination;

		// Debris
		$this->Debris = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Debris', 'Debris', '`Debris`', '`Debris`', 200, -1, FALSE, '`Debris`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Debris->Sortable = FALSE; // Allow sort
		$this->fields['Debris'] = &$this->Debris;

		// Diagnosis
		$this->Diagnosis = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Diagnosis', 'Diagnosis', '`Diagnosis`', '`Diagnosis`', 201, -1, FALSE, '`Diagnosis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Diagnosis->Sortable = FALSE; // Allow sort
		$this->fields['Diagnosis'] = &$this->Diagnosis;

		// Observations
		$this->Observations = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Observations', 'Observations', '`Observations`', '`Observations`', 201, -1, FALSE, '`Observations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Observations->Sortable = FALSE; // Allow sort
		$this->fields['Observations'] = &$this->Observations;

		// Signature
		$this->Signature = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Signature', 'Signature', '`Signature`', '`Signature`', 200, -1, FALSE, '`Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Signature->Sortable = FALSE; // Allow sort
		$this->fields['Signature'] = &$this->Signature;

		// SemenOrgin
		$this->SemenOrgin = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_SemenOrgin', 'SemenOrgin', '`SemenOrgin`', '`SemenOrgin`', 200, -1, FALSE, '`SemenOrgin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SemenOrgin->Sortable = FALSE; // Allow sort
		$this->SemenOrgin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SemenOrgin->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->SemenOrgin->Lookup = new Lookup('SemenOrgin', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SemenOrgin->OptionCount = 4;
		$this->fields['SemenOrgin'] = &$this->SemenOrgin;

		// Donor
		$this->Donor = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Donor', 'Donor', '`Donor`', '`Donor`', 3, -1, FALSE, '`Donor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Donor->Sortable = FALSE; // Allow sort
		$this->Donor->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Donor->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Donor->Lookup = new Lookup('Donor', 'ivf_donorsemendetails', FALSE, 'id', ["DonorNo","","",""], [], [], [], [], ["BloodGroup"], ["x_DonorBloodgroup"], '', '');
		$this->Donor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Donor'] = &$this->Donor;

		// DonorBloodgroup
		$this->DonorBloodgroup = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_DonorBloodgroup', 'DonorBloodgroup', '`DonorBloodgroup`', '`DonorBloodgroup`', 200, -1, FALSE, '`DonorBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DonorBloodgroup->Sortable = FALSE; // Allow sort
		$this->fields['DonorBloodgroup'] = &$this->DonorBloodgroup;

		// Tank
		$this->Tank = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Tank', 'Tank', '`Tank`', '`Tank`', 200, -1, FALSE, '`Tank`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tank->Sortable = FALSE; // Allow sort
		$this->fields['Tank'] = &$this->Tank;

		// Location
		$this->Location = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Location', 'Location', '`Location`', '`Location`', 200, -1, FALSE, '`Location`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Location->Sortable = FALSE; // Allow sort
		$this->fields['Location'] = &$this->Location;

		// Volume1
		$this->Volume1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Volume1', 'Volume1', '`Volume1`', '`Volume1`', 200, -1, FALSE, '`Volume1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume1->Sortable = FALSE; // Allow sort
		$this->fields['Volume1'] = &$this->Volume1;

		// Concentration1
		$this->Concentration1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Concentration1', 'Concentration1', '`Concentration1`', '`Concentration1`', 200, -1, FALSE, '`Concentration1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration1->Sortable = FALSE; // Allow sort
		$this->fields['Concentration1'] = &$this->Concentration1;

		// Total1
		$this->Total1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Total1', 'Total1', '`Total1`', '`Total1`', 200, -1, FALSE, '`Total1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total1->Sortable = FALSE; // Allow sort
		$this->fields['Total1'] = &$this->Total1;

		// ProgressiveMotility1
		$this->ProgressiveMotility1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ProgressiveMotility1', 'ProgressiveMotility1', '`ProgressiveMotility1`', '`ProgressiveMotility1`', 200, -1, FALSE, '`ProgressiveMotility1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility1->Sortable = FALSE; // Allow sort
		$this->fields['ProgressiveMotility1'] = &$this->ProgressiveMotility1;

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NonProgrssiveMotile1', 'NonProgrssiveMotile1', '`NonProgrssiveMotile1`', '`NonProgrssiveMotile1`', 200, -1, FALSE, '`NonProgrssiveMotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile1->Sortable = FALSE; // Allow sort
		$this->fields['NonProgrssiveMotile1'] = &$this->NonProgrssiveMotile1;

		// Immotile1
		$this->Immotile1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Immotile1', 'Immotile1', '`Immotile1`', '`Immotile1`', 200, -1, FALSE, '`Immotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile1->Sortable = FALSE; // Allow sort
		$this->fields['Immotile1'] = &$this->Immotile1;

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TotalProgrssiveMotile1', 'TotalProgrssiveMotile1', '`TotalProgrssiveMotile1`', '`TotalProgrssiveMotile1`', 200, -1, FALSE, '`TotalProgrssiveMotile1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile1->Sortable = FALSE; // Allow sort
		$this->fields['TotalProgrssiveMotile1'] = &$this->TotalProgrssiveMotile1;

		// TidNo
		$this->TidNo = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// Color
		$this->Color = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Color', 'Color', '`Color`', '`Color`', 200, -1, FALSE, '`Color`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Color->Sortable = FALSE; // Allow sort
		$this->fields['Color'] = &$this->Color;

		// DoneBy
		$this->DoneBy = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_DoneBy', 'DoneBy', '`DoneBy`', '`DoneBy`', 200, -1, FALSE, '`DoneBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DoneBy->Sortable = FALSE; // Allow sort
		$this->fields['DoneBy'] = &$this->DoneBy;

		// Method
		$this->Method = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Method', 'Method', '`Method`', '`Method`', 200, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Method->Sortable = FALSE; // Allow sort
		$this->fields['Method'] = &$this->Method;

		// Abstinence
		$this->Abstinence = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Abstinence', 'Abstinence', '`Abstinence`', '`Abstinence`', 200, -1, FALSE, '`Abstinence`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abstinence->Sortable = FALSE; // Allow sort
		$this->fields['Abstinence'] = &$this->Abstinence;

		// ProcessedBy
		$this->ProcessedBy = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ProcessedBy', 'ProcessedBy', '`ProcessedBy`', '`ProcessedBy`', 200, -1, FALSE, '`ProcessedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcessedBy->Sortable = FALSE; // Allow sort
		$this->fields['ProcessedBy'] = &$this->ProcessedBy;

		// InseminationTime
		$this->InseminationTime = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_InseminationTime', 'InseminationTime', '`InseminationTime`', '`InseminationTime`', 200, -1, FALSE, '`InseminationTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InseminationTime->Sortable = FALSE; // Allow sort
		$this->fields['InseminationTime'] = &$this->InseminationTime;

		// InseminationBy
		$this->InseminationBy = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_InseminationBy', 'InseminationBy', '`InseminationBy`', '`InseminationBy`', 200, -1, FALSE, '`InseminationBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InseminationBy->Sortable = FALSE; // Allow sort
		$this->fields['InseminationBy'] = &$this->InseminationBy;

		// Big
		$this->Big = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Big', 'Big', '`Big`', '`Big`', 200, -1, FALSE, '`Big`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Big->Sortable = FALSE; // Allow sort
		$this->fields['Big'] = &$this->Big;

		// Medium
		$this->Medium = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Medium', 'Medium', '`Medium`', '`Medium`', 200, -1, FALSE, '`Medium`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medium->Sortable = FALSE; // Allow sort
		$this->fields['Medium'] = &$this->Medium;

		// Small
		$this->Small = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Small', 'Small', '`Small`', '`Small`', 200, -1, FALSE, '`Small`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Small->Sortable = FALSE; // Allow sort
		$this->fields['Small'] = &$this->Small;

		// NoHalo
		$this->NoHalo = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NoHalo', 'NoHalo', '`NoHalo`', '`NoHalo`', 200, -1, FALSE, '`NoHalo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoHalo->Sortable = FALSE; // Allow sort
		$this->fields['NoHalo'] = &$this->NoHalo;

		// Fragmented
		$this->Fragmented = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Fragmented', 'Fragmented', '`Fragmented`', '`Fragmented`', 200, -1, FALSE, '`Fragmented`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fragmented->Sortable = FALSE; // Allow sort
		$this->fields['Fragmented'] = &$this->Fragmented;

		// NonFragmented
		$this->NonFragmented = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NonFragmented', 'NonFragmented', '`NonFragmented`', '`NonFragmented`', 200, -1, FALSE, '`NonFragmented`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonFragmented->Sortable = FALSE; // Allow sort
		$this->fields['NonFragmented'] = &$this->NonFragmented;

		// DFI
		$this->DFI = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_DFI', 'DFI', '`DFI`', '`DFI`', 200, -1, FALSE, '`DFI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DFI->Sortable = FALSE; // Allow sort
		$this->fields['DFI'] = &$this->DFI;

		// IsueBy
		$this->IsueBy = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IsueBy', 'IsueBy', '`IsueBy`', '`IsueBy`', 200, -1, FALSE, '`IsueBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IsueBy->Sortable = FALSE; // Allow sort
		$this->fields['IsueBy'] = &$this->IsueBy;

		// Volume2
		$this->Volume2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Volume2', 'Volume2', '`Volume2`', '`Volume2`', 200, -1, FALSE, '`Volume2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Volume2->Sortable = FALSE; // Allow sort
		$this->fields['Volume2'] = &$this->Volume2;

		// Concentration2
		$this->Concentration2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Concentration2', 'Concentration2', '`Concentration2`', '`Concentration2`', 200, -1, FALSE, '`Concentration2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Concentration2->Sortable = FALSE; // Allow sort
		$this->fields['Concentration2'] = &$this->Concentration2;

		// Total2
		$this->Total2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Total2', 'Total2', '`Total2`', '`Total2`', 200, -1, FALSE, '`Total2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total2->Sortable = FALSE; // Allow sort
		$this->fields['Total2'] = &$this->Total2;

		// ProgressiveMotility2
		$this->ProgressiveMotility2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_ProgressiveMotility2', 'ProgressiveMotility2', '`ProgressiveMotility2`', '`ProgressiveMotility2`', 200, -1, FALSE, '`ProgressiveMotility2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProgressiveMotility2->Sortable = FALSE; // Allow sort
		$this->fields['ProgressiveMotility2'] = &$this->ProgressiveMotility2;

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_NonProgrssiveMotile2', 'NonProgrssiveMotile2', '`NonProgrssiveMotile2`', '`NonProgrssiveMotile2`', 200, -1, FALSE, '`NonProgrssiveMotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NonProgrssiveMotile2->Sortable = FALSE; // Allow sort
		$this->fields['NonProgrssiveMotile2'] = &$this->NonProgrssiveMotile2;

		// Immotile2
		$this->Immotile2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_Immotile2', 'Immotile2', '`Immotile2`', '`Immotile2`', 200, -1, FALSE, '`Immotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Immotile2->Sortable = FALSE; // Allow sort
		$this->fields['Immotile2'] = &$this->Immotile2;

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TotalProgrssiveMotile2', 'TotalProgrssiveMotile2', '`TotalProgrssiveMotile2`', '`TotalProgrssiveMotile2`', 200, -1, FALSE, '`TotalProgrssiveMotile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalProgrssiveMotile2->Sortable = FALSE; // Allow sort
		$this->fields['TotalProgrssiveMotile2'] = &$this->TotalProgrssiveMotile2;

		// IssuedBy
		$this->IssuedBy = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IssuedBy', 'IssuedBy', '`IssuedBy`', '`IssuedBy`', 200, -1, FALSE, '`IssuedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IssuedBy->Sortable = FALSE; // Allow sort
		$this->fields['IssuedBy'] = &$this->IssuedBy;

		// IssuedTo
		$this->IssuedTo = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IssuedTo', 'IssuedTo', '`IssuedTo`', '`IssuedTo`', 200, -1, FALSE, '`IssuedTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IssuedTo->Sortable = FALSE; // Allow sort
		$this->fields['IssuedTo'] = &$this->IssuedTo;

		// MACS
		$this->MACS = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, -1, FALSE, '`MACS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->MACS->Sortable = FALSE; // Allow sort
		$this->MACS->Lookup = new Lookup('MACS', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MACS->OptionCount = 1;
		$this->fields['MACS'] = &$this->MACS;

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_PREG_TEST_DATE', 'PREG_TEST_DATE', '`PREG_TEST_DATE`', CastDateFieldForLike('`PREG_TEST_DATE`', 7, "DB"), 135, 7, FALSE, '`PREG_TEST_DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PREG_TEST_DATE->Sortable = TRUE; // Allow sort
		$this->PREG_TEST_DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['PREG_TEST_DATE'] = &$this->PREG_TEST_DATE;

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_SPECIFIC_PROBLEMS', 'SPECIFIC_PROBLEMS', '`SPECIFIC_PROBLEMS`', '`SPECIFIC_PROBLEMS`', 200, -1, FALSE, '`SPECIFIC_PROBLEMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SPECIFIC_PROBLEMS->Sortable = FALSE; // Allow sort
		$this->SPECIFIC_PROBLEMS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SPECIFIC_PROBLEMS->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->SPECIFIC_PROBLEMS->Lookup = new Lookup('SPECIFIC_PROBLEMS', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SPECIFIC_PROBLEMS->OptionCount = 6;
		$this->fields['SPECIFIC_PROBLEMS'] = &$this->SPECIFIC_PROBLEMS;

		// IMSC_1
		$this->IMSC_1 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IMSC_1', 'IMSC_1', '`IMSC_1`', '`IMSC_1`', 200, -1, FALSE, '`IMSC_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_1->Sortable = FALSE; // Allow sort
		$this->fields['IMSC_1'] = &$this->IMSC_1;

		// IMSC_2
		$this->IMSC_2 = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IMSC_2', 'IMSC_2', '`IMSC_2`', '`IMSC_2`', 200, -1, FALSE, '`IMSC_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_2->Sortable = FALSE; // Allow sort
		$this->fields['IMSC_2'] = &$this->IMSC_2;

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_LIQUIFACTION_STORAGE', 'LIQUIFACTION_STORAGE', '`LIQUIFACTION_STORAGE`', '`LIQUIFACTION_STORAGE`', 200, -1, FALSE, '`LIQUIFACTION_STORAGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->LIQUIFACTION_STORAGE->Sortable = FALSE; // Allow sort
		$this->LIQUIFACTION_STORAGE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->LIQUIFACTION_STORAGE->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->LIQUIFACTION_STORAGE->Lookup = new Lookup('LIQUIFACTION_STORAGE', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->LIQUIFACTION_STORAGE->OptionCount = 2;
		$this->fields['LIQUIFACTION_STORAGE'] = &$this->LIQUIFACTION_STORAGE;

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_IUI_PREP_METHOD', 'IUI_PREP_METHOD', '`IUI_PREP_METHOD`', '`IUI_PREP_METHOD`', 200, -1, FALSE, '`IUI_PREP_METHOD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->IUI_PREP_METHOD->Sortable = FALSE; // Allow sort
		$this->IUI_PREP_METHOD->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->IUI_PREP_METHOD->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->IUI_PREP_METHOD->Lookup = new Lookup('IUI_PREP_METHOD', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUI_PREP_METHOD->OptionCount = 6;
		$this->fields['IUI_PREP_METHOD'] = &$this->IUI_PREP_METHOD;

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TIME_FROM_TRIGGER', 'TIME_FROM_TRIGGER', '`TIME_FROM_TRIGGER`', '`TIME_FROM_TRIGGER`', 200, -1, FALSE, '`TIME_FROM_TRIGGER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TIME_FROM_TRIGGER->Sortable = FALSE; // Allow sort
		$this->TIME_FROM_TRIGGER->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TIME_FROM_TRIGGER->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TIME_FROM_TRIGGER->Lookup = new Lookup('TIME_FROM_TRIGGER', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TIME_FROM_TRIGGER->OptionCount = 4;
		$this->fields['TIME_FROM_TRIGGER'] = &$this->TIME_FROM_TRIGGER;

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_COLLECTION_TO_PREPARATION', 'COLLECTION_TO_PREPARATION', '`COLLECTION_TO_PREPARATION`', '`COLLECTION_TO_PREPARATION`', 200, -1, FALSE, '`COLLECTION_TO_PREPARATION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->COLLECTION_TO_PREPARATION->Sortable = FALSE; // Allow sort
		$this->COLLECTION_TO_PREPARATION->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->COLLECTION_TO_PREPARATION->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->COLLECTION_TO_PREPARATION->Lookup = new Lookup('COLLECTION_TO_PREPARATION', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->COLLECTION_TO_PREPARATION->OptionCount = 5;
		$this->fields['COLLECTION_TO_PREPARATION'] = &$this->COLLECTION_TO_PREPARATION;

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM = new DbField('view_semenanalysis', 'view_semenanalysis', 'x_TIME_FROM_PREP_TO_INSEM', 'TIME_FROM_PREP_TO_INSEM', '`TIME_FROM_PREP_TO_INSEM`', '`TIME_FROM_PREP_TO_INSEM`', 200, -1, FALSE, '`TIME_FROM_PREP_TO_INSEM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TIME_FROM_PREP_TO_INSEM->Sortable = FALSE; // Allow sort
		$this->TIME_FROM_PREP_TO_INSEM->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TIME_FROM_PREP_TO_INSEM->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TIME_FROM_PREP_TO_INSEM->Lookup = new Lookup('TIME_FROM_PREP_TO_INSEM', 'view_semenanalysis', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TIME_FROM_PREP_TO_INSEM->OptionCount = 4;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_semenanalysis`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
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
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
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
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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
		$allow = USER_ID_ALLOW;
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
			default:
				return (($allow & 8) == 8);
		}
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

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
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
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
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
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
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
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
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
		$this->PaID->DbValue = $row['PaID'];
		$this->PaName->DbValue = $row['PaName'];
		$this->PaMobile->DbValue = $row['PaMobile'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerMobile->DbValue = $row['PartnerMobile'];
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
		$this->Volume->DbValue = $row['Volume'];
		$this->pH->DbValue = $row['pH'];
		$this->Timeofcollection->DbValue = $row['Timeofcollection'];
		$this->Timeofexamination->DbValue = $row['Timeofexamination'];
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
		$this->IssuedBy->DbValue = $row['IssuedBy'];
		$this->IssuedTo->DbValue = $row['IssuedTo'];
		$this->MACS->DbValue = $row['MACS'];
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
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "view_semenanalysislist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "view_semenanalysisview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_semenanalysisedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_semenanalysisadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_semenanalysislist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_semenanalysisview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_semenanalysisview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_semenanalysisadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_semenanalysisadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_semenanalysisedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_semenanalysisadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_semenanalysisdelete.php", $this->getUrlParm());
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
		if ($parm <> "")
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
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
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
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
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
		$ar = array();
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
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->id->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->PaID->setDbValue($rs->fields('PaID'));
		$this->PaName->setDbValue($rs->fields('PaName'));
		$this->PaMobile->setDbValue($rs->fields('PaMobile'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerMobile->setDbValue($rs->fields('PartnerMobile'));
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
		$this->Volume->setDbValue($rs->fields('Volume'));
		$this->pH->setDbValue($rs->fields('pH'));
		$this->Timeofcollection->setDbValue($rs->fields('Timeofcollection'));
		$this->Timeofexamination->setDbValue($rs->fields('Timeofexamination'));
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
		$this->IssuedBy->setDbValue($rs->fields('IssuedBy'));
		$this->IssuedTo->setDbValue($rs->fields('IssuedTo'));
		$this->MACS->setDbValue($rs->fields('MACS'));
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
		// PaID
		// PaName
		// PaMobile
		// PartnerID
		// PartnerName
		// PartnerMobile
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
		// Volume
		// pH
		// Timeofcollection
		// Timeofexamination
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
		// IssuedBy
		// IssuedTo
		// MACS
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

		// RIDNo
		$curVal = strval($this->RIDNo->CurrentValue);
		if ($curVal <> "") {
			$this->RIDNo->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
			if ($this->RIDNo->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->RIDNo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->RIDNo->ViewValue = $this->RIDNo->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
				}
			}
		} else {
			$this->RIDNo->ViewValue = NULL;
		}
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$curVal = strval($this->PatientName->CurrentValue);
		if ($curVal <> "") {
			$this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
			if ($this->PatientName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
				}
			}
		} else {
			$this->PatientName->ViewValue = NULL;
		}
		$this->PatientName->ViewCustomAttributes = "";

		// HusbandName
		$curVal = strval($this->HusbandName->CurrentValue);
		if ($curVal <> "") {
			$this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
			if ($this->HusbandName->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HusbandName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
				}
			}
		} else {
			$this->HusbandName->ViewValue = NULL;
		}
		$this->HusbandName->ViewCustomAttributes = "";

		// RequestDr
		$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->ViewCustomAttributes = "";

		// CollectionDate
		$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
		$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 7);
		$this->CollectionDate->ViewCustomAttributes = "";

		// ResultDate
		$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 7);
		$this->ResultDate->ViewCustomAttributes = "";

		// RequestSample
		if (strval($this->RequestSample->CurrentValue) <> "") {
			$this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
		} else {
			$this->RequestSample->ViewValue = NULL;
		}
		$this->RequestSample->ViewCustomAttributes = "";

		// CollectionType
		if (strval($this->CollectionType->CurrentValue) <> "") {
			$this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
		} else {
			$this->CollectionType->ViewValue = NULL;
		}
		$this->CollectionType->ViewCustomAttributes = "";

		// CollectionMethod
		if (strval($this->CollectionMethod->CurrentValue) <> "") {
			$this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
		} else {
			$this->CollectionMethod->ViewValue = NULL;
		}
		$this->CollectionMethod->ViewCustomAttributes = "";

		// Medicationused
		$curVal = strval($this->Medicationused->CurrentValue);
		if ($curVal <> "") {
			$this->Medicationused->ViewValue = $this->Medicationused->lookupCacheOption($curVal);
			if ($this->Medicationused->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Medication`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Medicationused->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Medicationused->ViewValue = $this->Medicationused->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Medicationused->ViewValue = $this->Medicationused->CurrentValue;
				}
			}
		} else {
			$this->Medicationused->ViewValue = NULL;
		}
		$this->Medicationused->ViewCustomAttributes = "";

		// DifficultiesinCollection
		if (strval($this->DifficultiesinCollection->CurrentValue) <> "") {
			$this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
		} else {
			$this->DifficultiesinCollection->ViewValue = NULL;
		}
		$this->DifficultiesinCollection->ViewCustomAttributes = "";

		// Volume
		$this->Volume->ViewValue = $this->Volume->CurrentValue;
		$this->Volume->ViewCustomAttributes = "";

		// pH
		$this->pH->ViewValue = $this->pH->CurrentValue;
		$this->pH->ViewCustomAttributes = "";

		// Timeofcollection
		$this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
		$this->Timeofcollection->ViewCustomAttributes = "";

		// Timeofexamination
		$this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
		$this->Timeofexamination->ViewCustomAttributes = "";

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
		if (strval($this->Homogenosity->CurrentValue) <> "") {
			$this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
		} else {
			$this->Homogenosity->ViewValue = NULL;
		}
		$this->Homogenosity->ViewCustomAttributes = "";

		// CompleteSample
		if (strval($this->CompleteSample->CurrentValue) <> "") {
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
		if (strval($this->SemenOrgin->CurrentValue) <> "") {
			$this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
		} else {
			$this->SemenOrgin->ViewValue = NULL;
		}
		$this->SemenOrgin->ViewCustomAttributes = "";

		// Donor
		$curVal = strval($this->Donor->CurrentValue);
		if ($curVal <> "") {
			$this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
			if ($this->Donor->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Donor->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// IssuedBy
		$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->ViewCustomAttributes = "";

		// IssuedTo
		$this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
		$this->IssuedTo->ViewCustomAttributes = "";

		// MACS
		if (strval($this->MACS->CurrentValue) <> "") {
			$this->MACS->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->MACS->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->MACS->ViewValue->add($this->MACS->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->MACS->ViewValue = NULL;
		}
		$this->MACS->ViewCustomAttributes = "";

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
		$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
		$this->PREG_TEST_DATE->ViewCustomAttributes = "";

		// SPECIFIC_PROBLEMS
		if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) <> "") {
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
		if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) <> "") {
			$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
		} else {
			$this->LIQUIFACTION_STORAGE->ViewValue = NULL;
		}
		$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

		// IUI_PREP_METHOD
		if (strval($this->IUI_PREP_METHOD->CurrentValue) <> "") {
			$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
		} else {
			$this->IUI_PREP_METHOD->ViewValue = NULL;
		}
		$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

		// TIME_FROM_TRIGGER
		if (strval($this->TIME_FROM_TRIGGER->CurrentValue) <> "") {
			$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
		} else {
			$this->TIME_FROM_TRIGGER->ViewValue = NULL;
		}
		$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

		// COLLECTION_TO_PREPARATION
		if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) <> "") {
			$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
		} else {
			$this->COLLECTION_TO_PREPARATION->ViewValue = NULL;
		}
		$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

		// TIME_FROM_PREP_TO_INSEM
		if (strval($this->TIME_FROM_PREP_TO_INSEM->CurrentValue) <> "") {
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->optionCaption($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
		} else {
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = NULL;
		}
		$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

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

		// Volume
		$this->Volume->LinkCustomAttributes = "";
		$this->Volume->HrefValue = "";
		$this->Volume->TooltipValue = "";

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

		// IssuedBy
		$this->IssuedBy->LinkCustomAttributes = "";
		$this->IssuedBy->HrefValue = "";
		$this->IssuedBy->TooltipValue = "";

		// IssuedTo
		$this->IssuedTo->LinkCustomAttributes = "";
		$this->IssuedTo->HrefValue = "";
		$this->IssuedTo->TooltipValue = "";

		// MACS
		$this->MACS->LinkCustomAttributes = "";
		$this->MACS->HrefValue = "";
		$this->MACS->TooltipValue = "";

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

		// PaID
		$this->PaID->EditAttrs["class"] = "form-control";
		$this->PaID->EditCustomAttributes = "";
		$this->PaID->EditValue = $this->PaID->CurrentValue;
		$this->PaID->ViewCustomAttributes = "";

		// PaName
		$this->PaName->EditAttrs["class"] = "form-control";
		$this->PaName->EditCustomAttributes = "";
		$this->PaName->EditValue = $this->PaName->CurrentValue;
		$this->PaName->ViewCustomAttributes = "";

		// PaMobile
		$this->PaMobile->EditAttrs["class"] = "form-control";
		$this->PaMobile->EditCustomAttributes = "";
		$this->PaMobile->EditValue = $this->PaMobile->CurrentValue;
		$this->PaMobile->ViewCustomAttributes = "";

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// PartnerMobile
		$this->PartnerMobile->EditAttrs["class"] = "form-control";
		$this->PartnerMobile->EditCustomAttributes = "";
		$this->PartnerMobile->EditValue = $this->PartnerMobile->CurrentValue;
		$this->PartnerMobile->ViewCustomAttributes = "";

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		$curVal = strval($this->RIDNo->CurrentValue);
		if ($curVal <> "") {
			$this->RIDNo->EditValue = $this->RIDNo->lookupCacheOption($curVal);
			if ($this->RIDNo->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->RIDNo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->RIDNo->EditValue = $this->RIDNo->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
				}
			}
		} else {
			$this->RIDNo->EditValue = NULL;
		}
		$this->RIDNo->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$curVal = strval($this->PatientName->CurrentValue);
		if ($curVal <> "") {
			$this->PatientName->EditValue = $this->PatientName->lookupCacheOption($curVal);
			if ($this->PatientName->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->PatientName->EditValue = $this->PatientName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatientName->EditValue = $this->PatientName->CurrentValue;
				}
			}
		} else {
			$this->PatientName->EditValue = NULL;
		}
		$this->PatientName->ViewCustomAttributes = "";

		// HusbandName
		$this->HusbandName->EditAttrs["class"] = "form-control";
		$this->HusbandName->EditCustomAttributes = "";
		$curVal = strval($this->HusbandName->CurrentValue);
		if ($curVal <> "") {
			$this->HusbandName->EditValue = $this->HusbandName->lookupCacheOption($curVal);
			if ($this->HusbandName->EditValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HusbandName->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->HusbandName->EditValue = $this->HusbandName->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HusbandName->EditValue = $this->HusbandName->CurrentValue;
				}
			}
		} else {
			$this->HusbandName->EditValue = NULL;
		}
		$this->HusbandName->ViewCustomAttributes = "";

		// RequestDr
		$this->RequestDr->EditAttrs["class"] = "form-control";
		$this->RequestDr->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
		$this->RequestDr->EditValue = $this->RequestDr->CurrentValue;
		$this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

		// CollectionDate
		$this->CollectionDate->EditAttrs["class"] = "form-control";
		$this->CollectionDate->EditCustomAttributes = "";
		$this->CollectionDate->EditValue = FormatDateTime($this->CollectionDate->CurrentValue, 7);
		$this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 7);
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

		// DifficultiesinCollection
		$this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
		$this->DifficultiesinCollection->EditCustomAttributes = "";
		$this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(TRUE);

		// Volume
		$this->Volume->EditAttrs["class"] = "form-control";
		$this->Volume->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
		$this->Volume->EditValue = $this->Volume->CurrentValue;
		$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

		// pH
		$this->pH->EditAttrs["class"] = "form-control";
		$this->pH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
		$this->pH->EditValue = $this->pH->CurrentValue;
		$this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

		// Timeofcollection
		$this->Timeofcollection->EditAttrs["class"] = "form-control";
		$this->Timeofcollection->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
		$this->Timeofcollection->EditValue = $this->Timeofcollection->CurrentValue;
		$this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

		// Timeofexamination
		$this->Timeofexamination->EditAttrs["class"] = "form-control";
		$this->Timeofexamination->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
		$this->Timeofexamination->EditValue = $this->Timeofexamination->CurrentValue;
		$this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

		// Concentration
		$this->Concentration->EditAttrs["class"] = "form-control";
		$this->Concentration->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
		$this->Concentration->EditValue = $this->Concentration->CurrentValue;
		$this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

		// Total
		$this->Total->EditAttrs["class"] = "form-control";
		$this->Total->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
		$this->Total->EditValue = $this->Total->CurrentValue;
		$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

		// ProgressiveMotility
		$this->ProgressiveMotility->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
		$this->ProgressiveMotility->EditValue = $this->ProgressiveMotility->CurrentValue;
		$this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

		// NonProgrssiveMotile
		$this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
		$this->NonProgrssiveMotile->EditValue = $this->NonProgrssiveMotile->CurrentValue;
		$this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

		// Immotile
		$this->Immotile->EditAttrs["class"] = "form-control";
		$this->Immotile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
		$this->Immotile->EditValue = $this->Immotile->CurrentValue;
		$this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

		// TotalProgrssiveMotile
		$this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
		$this->TotalProgrssiveMotile->EditValue = $this->TotalProgrssiveMotile->CurrentValue;
		$this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

		// Appearance
		$this->Appearance->EditAttrs["class"] = "form-control";
		$this->Appearance->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		if (REMOVE_XSS)
			$this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
		$this->Liquefactiontime->EditValue = $this->Liquefactiontime->CurrentValue;
		$this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

		// Normal
		$this->Normal->EditAttrs["class"] = "form-control";
		$this->Normal->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
		$this->Normal->EditValue = $this->Normal->CurrentValue;
		$this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

		// Abnormal
		$this->Abnormal->EditAttrs["class"] = "form-control";
		$this->Abnormal->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
		$this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

		// Headdefects
		$this->Headdefects->EditAttrs["class"] = "form-control";
		$this->Headdefects->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
		$this->Headdefects->EditValue = $this->Headdefects->CurrentValue;
		$this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

		// MidpieceDefects
		$this->MidpieceDefects->EditAttrs["class"] = "form-control";
		$this->MidpieceDefects->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
		$this->MidpieceDefects->EditValue = $this->MidpieceDefects->CurrentValue;
		$this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

		// TailDefects
		$this->TailDefects->EditAttrs["class"] = "form-control";
		$this->TailDefects->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
		$this->TailDefects->EditValue = $this->TailDefects->CurrentValue;
		$this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

		// NormalProgMotile
		$this->NormalProgMotile->EditAttrs["class"] = "form-control";
		$this->NormalProgMotile->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
		$this->NormalProgMotile->EditValue = $this->NormalProgMotile->CurrentValue;
		$this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

		// ImmatureForms
		$this->ImmatureForms->EditAttrs["class"] = "form-control";
		$this->ImmatureForms->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
		$this->ImmatureForms->EditValue = $this->ImmatureForms->CurrentValue;
		$this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

		// Leucocytes
		$this->Leucocytes->EditAttrs["class"] = "form-control";
		$this->Leucocytes->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
		$this->Leucocytes->EditValue = $this->Leucocytes->CurrentValue;
		$this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

		// Agglutination
		$this->Agglutination->EditAttrs["class"] = "form-control";
		$this->Agglutination->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
		$this->Agglutination->EditValue = $this->Agglutination->CurrentValue;
		$this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

		// Debris
		$this->Debris->EditAttrs["class"] = "form-control";
		$this->Debris->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
		$this->Debris->EditValue = $this->Debris->CurrentValue;
		$this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

		// Diagnosis
		$this->Diagnosis->EditAttrs["class"] = "form-control";
		$this->Diagnosis->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Diagnosis->CurrentValue = HtmlDecode($this->Diagnosis->CurrentValue);
		$this->Diagnosis->EditValue = $this->Diagnosis->CurrentValue;
		$this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

		// Observations
		$this->Observations->EditAttrs["class"] = "form-control";
		$this->Observations->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Observations->CurrentValue = HtmlDecode($this->Observations->CurrentValue);
		$this->Observations->EditValue = $this->Observations->CurrentValue;
		$this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

		// Signature
		$this->Signature->EditAttrs["class"] = "form-control";
		$this->Signature->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		if (REMOVE_XSS)
			$this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
		$this->DonorBloodgroup->EditValue = $this->DonorBloodgroup->CurrentValue;
		$this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

		// Tank
		$this->Tank->EditAttrs["class"] = "form-control";
		$this->Tank->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
		$this->Tank->EditValue = $this->Tank->CurrentValue;
		$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

		// Location
		$this->Location->EditAttrs["class"] = "form-control";
		$this->Location->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
		$this->Location->EditValue = $this->Location->CurrentValue;
		$this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

		// Volume1
		$this->Volume1->EditAttrs["class"] = "form-control";
		$this->Volume1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
		$this->Volume1->EditValue = $this->Volume1->CurrentValue;
		$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

		// Concentration1
		$this->Concentration1->EditAttrs["class"] = "form-control";
		$this->Concentration1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
		$this->Concentration1->EditValue = $this->Concentration1->CurrentValue;
		$this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

		// Total1
		$this->Total1->EditAttrs["class"] = "form-control";
		$this->Total1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
		$this->Total1->EditValue = $this->Total1->CurrentValue;
		$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

		// ProgressiveMotility1
		$this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
		$this->ProgressiveMotility1->EditValue = $this->ProgressiveMotility1->CurrentValue;
		$this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

		// NonProgrssiveMotile1
		$this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
		$this->NonProgrssiveMotile1->EditValue = $this->NonProgrssiveMotile1->CurrentValue;
		$this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

		// Immotile1
		$this->Immotile1->EditAttrs["class"] = "form-control";
		$this->Immotile1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
		$this->Immotile1->EditValue = $this->Immotile1->CurrentValue;
		$this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

		// TotalProgrssiveMotile1
		$this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
		$this->TotalProgrssiveMotile1->EditValue = $this->TotalProgrssiveMotile1->CurrentValue;
		$this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// Color
		$this->Color->EditAttrs["class"] = "form-control";
		$this->Color->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
		$this->Color->EditValue = $this->Color->CurrentValue;
		$this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

		// DoneBy
		$this->DoneBy->EditAttrs["class"] = "form-control";
		$this->DoneBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
		$this->DoneBy->EditValue = $this->DoneBy->CurrentValue;
		$this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

		// Method
		$this->Method->EditAttrs["class"] = "form-control";
		$this->Method->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
		$this->Method->EditValue = $this->Method->CurrentValue;
		$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

		// Abstinence
		$this->Abstinence->EditAttrs["class"] = "form-control";
		$this->Abstinence->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
		$this->Abstinence->EditValue = $this->Abstinence->CurrentValue;
		$this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

		// ProcessedBy
		$this->ProcessedBy->EditAttrs["class"] = "form-control";
		$this->ProcessedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
		$this->ProcessedBy->EditValue = $this->ProcessedBy->CurrentValue;
		$this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

		// InseminationTime
		$this->InseminationTime->EditAttrs["class"] = "form-control";
		$this->InseminationTime->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
		$this->InseminationTime->EditValue = $this->InseminationTime->CurrentValue;
		$this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

		// InseminationBy
		$this->InseminationBy->EditAttrs["class"] = "form-control";
		$this->InseminationBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
		$this->InseminationBy->EditValue = $this->InseminationBy->CurrentValue;
		$this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

		// Big
		$this->Big->EditAttrs["class"] = "form-control";
		$this->Big->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
		$this->Big->EditValue = $this->Big->CurrentValue;
		$this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

		// Medium
		$this->Medium->EditAttrs["class"] = "form-control";
		$this->Medium->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
		$this->Medium->EditValue = $this->Medium->CurrentValue;
		$this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

		// Small
		$this->Small->EditAttrs["class"] = "form-control";
		$this->Small->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
		$this->Small->EditValue = $this->Small->CurrentValue;
		$this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

		// NoHalo
		$this->NoHalo->EditAttrs["class"] = "form-control";
		$this->NoHalo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
		$this->NoHalo->EditValue = $this->NoHalo->CurrentValue;
		$this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

		// Fragmented
		$this->Fragmented->EditAttrs["class"] = "form-control";
		$this->Fragmented->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
		$this->Fragmented->EditValue = $this->Fragmented->CurrentValue;
		$this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

		// NonFragmented
		$this->NonFragmented->EditAttrs["class"] = "form-control";
		$this->NonFragmented->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
		$this->NonFragmented->EditValue = $this->NonFragmented->CurrentValue;
		$this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

		// DFI
		$this->DFI->EditAttrs["class"] = "form-control";
		$this->DFI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
		$this->DFI->EditValue = $this->DFI->CurrentValue;
		$this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

		// IsueBy
		$this->IsueBy->EditAttrs["class"] = "form-control";
		$this->IsueBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
		$this->IsueBy->EditValue = $this->IsueBy->CurrentValue;
		$this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

		// Volume2
		$this->Volume2->EditAttrs["class"] = "form-control";
		$this->Volume2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
		$this->Volume2->EditValue = $this->Volume2->CurrentValue;
		$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

		// Concentration2
		$this->Concentration2->EditAttrs["class"] = "form-control";
		$this->Concentration2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
		$this->Concentration2->EditValue = $this->Concentration2->CurrentValue;
		$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

		// Total2
		$this->Total2->EditAttrs["class"] = "form-control";
		$this->Total2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
		$this->Total2->EditValue = $this->Total2->CurrentValue;
		$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

		// ProgressiveMotility2
		$this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
		$this->ProgressiveMotility2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
		$this->ProgressiveMotility2->EditValue = $this->ProgressiveMotility2->CurrentValue;
		$this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

		// NonProgrssiveMotile2
		$this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
		$this->NonProgrssiveMotile2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
		$this->NonProgrssiveMotile2->EditValue = $this->NonProgrssiveMotile2->CurrentValue;
		$this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

		// Immotile2
		$this->Immotile2->EditAttrs["class"] = "form-control";
		$this->Immotile2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
		$this->Immotile2->EditValue = $this->Immotile2->CurrentValue;
		$this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

		// TotalProgrssiveMotile2
		$this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
		$this->TotalProgrssiveMotile2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
		$this->TotalProgrssiveMotile2->EditValue = $this->TotalProgrssiveMotile2->CurrentValue;
		$this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

		// IssuedBy
		$this->IssuedBy->EditAttrs["class"] = "form-control";
		$this->IssuedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
		$this->IssuedBy->EditValue = $this->IssuedBy->CurrentValue;
		$this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

		// IssuedTo
		$this->IssuedTo->EditAttrs["class"] = "form-control";
		$this->IssuedTo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
		$this->IssuedTo->EditValue = $this->IssuedTo->CurrentValue;
		$this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

		// MACS
		$this->MACS->EditCustomAttributes = "";
		$this->MACS->EditValue = $this->MACS->options(FALSE);

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
		$this->PREG_TEST_DATE->EditCustomAttributes = "";
		$this->PREG_TEST_DATE->EditValue = FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 7);
		$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
		$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
		$this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(TRUE);

		// IMSC_1
		$this->IMSC_1->EditAttrs["class"] = "form-control";
		$this->IMSC_1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
		$this->IMSC_1->EditValue = $this->IMSC_1->CurrentValue;
		$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

		// IMSC_2
		$this->IMSC_2->EditAttrs["class"] = "form-control";
		$this->IMSC_2->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		$this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->options(TRUE);

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
					$doc->exportCaption($this->PaID);
					$doc->exportCaption($this->PaName);
					$doc->exportCaption($this->PaMobile);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
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
					$doc->exportCaption($this->Volume);
					$doc->exportCaption($this->pH);
					$doc->exportCaption($this->Timeofcollection);
					$doc->exportCaption($this->Timeofexamination);
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
					$doc->exportCaption($this->MACS);
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
					$doc->exportCaption($this->PaID);
					$doc->exportCaption($this->PaName);
					$doc->exportCaption($this->PaMobile);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->HusbandName);
					$doc->exportCaption($this->RequestDr);
					$doc->exportCaption($this->CollectionDate);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->RequestSample);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->PREG_TEST_DATE);
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
						$doc->exportField($this->PaID);
						$doc->exportField($this->PaName);
						$doc->exportField($this->PaMobile);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
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
						$doc->exportField($this->Volume);
						$doc->exportField($this->pH);
						$doc->exportField($this->Timeofcollection);
						$doc->exportField($this->Timeofexamination);
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
						$doc->exportField($this->MACS);
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
						$doc->exportField($this->PaID);
						$doc->exportField($this->PaName);
						$doc->exportField($this->PaMobile);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->HusbandName);
						$doc->exportField($this->RequestDr);
						$doc->exportField($this->CollectionDate);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->RequestSample);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->PREG_TEST_DATE);
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

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
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

			if ($this->TidNo->ViewValue != 0) {
			$this->RowAttrs["style"] = "color: white; background-color: #07BEBA";
		}
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>