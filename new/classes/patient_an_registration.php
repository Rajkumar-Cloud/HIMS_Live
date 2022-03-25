<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_an_registration
 */
class patient_an_registration extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_an_registration';
		$this->TableName = 'patient_an_registration';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_an_registration`";
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
		$this->id = new DbField('patient_an_registration', 'patient_an_registration', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// pid
		$this->pid = new DbField('patient_an_registration', 'patient_an_registration', 'x_pid', 'pid', '`pid`', '`pid`', 3, 11, -1, FALSE, '`pid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pid->IsForeignKey = TRUE; // Foreign key field
		$this->pid->Sortable = TRUE; // Allow sort
		$this->pid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pid'] = &$this->pid;

		// fid
		$this->fid = new DbField('patient_an_registration', 'patient_an_registration', 'x_fid', 'fid', '`fid`', '`fid`', 3, 11, -1, FALSE, '`fid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->fid->IsForeignKey = TRUE; // Foreign key field
		$this->fid->Sortable = TRUE; // Allow sort
		$this->fid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['fid'] = &$this->fid;

		// G
		$this->G = new DbField('patient_an_registration', 'patient_an_registration', 'x_G', 'G', '`G`', '`G`', 200, 45, -1, FALSE, '`G`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->G->Sortable = TRUE; // Allow sort
		$this->fields['G'] = &$this->G;

		// P
		$this->P = new DbField('patient_an_registration', 'patient_an_registration', 'x_P', 'P', '`P`', '`P`', 200, 45, -1, FALSE, '`P`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->P->Sortable = TRUE; // Allow sort
		$this->fields['P'] = &$this->P;

		// L
		$this->L = new DbField('patient_an_registration', 'patient_an_registration', 'x_L', 'L', '`L`', '`L`', 200, 45, -1, FALSE, '`L`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L->Sortable = TRUE; // Allow sort
		$this->fields['L'] = &$this->L;

		// A
		$this->A = new DbField('patient_an_registration', 'patient_an_registration', 'x_A', 'A', '`A`', '`A`', 200, 45, -1, FALSE, '`A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A->Sortable = TRUE; // Allow sort
		$this->fields['A'] = &$this->A;

		// E
		$this->E = new DbField('patient_an_registration', 'patient_an_registration', 'x_E', 'E', '`E`', '`E`', 200, 45, -1, FALSE, '`E`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->E->Sortable = TRUE; // Allow sort
		$this->fields['E'] = &$this->E;

		// M
		$this->M = new DbField('patient_an_registration', 'patient_an_registration', 'x_M', 'M', '`M`', '`M`', 200, 45, -1, FALSE, '`M`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->M->Sortable = TRUE; // Allow sort
		$this->fields['M'] = &$this->M;

		// LMP
		$this->LMP = new DbField('patient_an_registration', 'patient_an_registration', 'x_LMP', 'LMP', '`LMP`', '`LMP`', 200, 45, 7, FALSE, '`LMP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LMP->Sortable = TRUE; // Allow sort
		$this->fields['LMP'] = &$this->LMP;

		// EDO
		$this->EDO = new DbField('patient_an_registration', 'patient_an_registration', 'x_EDO', 'EDO', '`EDO`', '`EDO`', 200, 45, 7, FALSE, '`EDO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDO->Sortable = TRUE; // Allow sort
		$this->fields['EDO'] = &$this->EDO;

		// MenstrualHistory
		$this->MenstrualHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 200, 45, -1, FALSE, '`MenstrualHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MenstrualHistory->Sortable = TRUE; // Allow sort
		$this->MenstrualHistory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MenstrualHistory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->MenstrualHistory->Lookup = new Lookup('MenstrualHistory', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->MenstrualHistory->OptionCount = 2;
		$this->fields['MenstrualHistory'] = &$this->MenstrualHistory;

		// MaritalHistory
		$this->MaritalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_MaritalHistory', 'MaritalHistory', '`MaritalHistory`', '`MaritalHistory`', 200, 45, -1, FALSE, '`MaritalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaritalHistory->Sortable = TRUE; // Allow sort
		$this->fields['MaritalHistory'] = &$this->MaritalHistory;

		// ObstetricHistory
		$this->ObstetricHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 200, 45, -1, FALSE, '`ObstetricHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ObstetricHistory->Sortable = TRUE; // Allow sort
		$this->fields['ObstetricHistory'] = &$this->ObstetricHistory;

		// PreviousHistoryofGDM
		$this->PreviousHistoryofGDM = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofGDM', 'PreviousHistoryofGDM', '`PreviousHistoryofGDM`', '`PreviousHistoryofGDM`', 200, 45, -1, FALSE, '`PreviousHistoryofGDM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreviousHistoryofGDM->Sortable = TRUE; // Allow sort
		$this->PreviousHistoryofGDM->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreviousHistoryofGDM->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreviousHistoryofGDM->Lookup = new Lookup('PreviousHistoryofGDM', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreviousHistoryofGDM->OptionCount = 2;
		$this->fields['PreviousHistoryofGDM'] = &$this->PreviousHistoryofGDM;

		// PreviousHistorofPIH
		$this->PreviousHistorofPIH = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistorofPIH', 'PreviousHistorofPIH', '`PreviousHistorofPIH`', '`PreviousHistorofPIH`', 200, 45, -1, FALSE, '`PreviousHistorofPIH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreviousHistorofPIH->Sortable = TRUE; // Allow sort
		$this->PreviousHistorofPIH->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreviousHistorofPIH->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreviousHistorofPIH->Lookup = new Lookup('PreviousHistorofPIH', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreviousHistorofPIH->OptionCount = 2;
		$this->fields['PreviousHistorofPIH'] = &$this->PreviousHistorofPIH;

		// PreviousHistoryofIUGR
		$this->PreviousHistoryofIUGR = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofIUGR', 'PreviousHistoryofIUGR', '`PreviousHistoryofIUGR`', '`PreviousHistoryofIUGR`', 200, 45, -1, FALSE, '`PreviousHistoryofIUGR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreviousHistoryofIUGR->Sortable = TRUE; // Allow sort
		$this->PreviousHistoryofIUGR->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreviousHistoryofIUGR->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreviousHistoryofIUGR->Lookup = new Lookup('PreviousHistoryofIUGR', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreviousHistoryofIUGR->OptionCount = 2;
		$this->fields['PreviousHistoryofIUGR'] = &$this->PreviousHistoryofIUGR;

		// PreviousHistoryofOligohydramnios
		$this->PreviousHistoryofOligohydramnios = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofOligohydramnios', 'PreviousHistoryofOligohydramnios', '`PreviousHistoryofOligohydramnios`', '`PreviousHistoryofOligohydramnios`', 200, 45, -1, FALSE, '`PreviousHistoryofOligohydramnios`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreviousHistoryofOligohydramnios->Sortable = TRUE; // Allow sort
		$this->PreviousHistoryofOligohydramnios->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreviousHistoryofOligohydramnios->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreviousHistoryofOligohydramnios->Lookup = new Lookup('PreviousHistoryofOligohydramnios', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreviousHistoryofOligohydramnios->OptionCount = 2;
		$this->fields['PreviousHistoryofOligohydramnios'] = &$this->PreviousHistoryofOligohydramnios;

		// PreviousHistoryofPreterm
		$this->PreviousHistoryofPreterm = new DbField('patient_an_registration', 'patient_an_registration', 'x_PreviousHistoryofPreterm', 'PreviousHistoryofPreterm', '`PreviousHistoryofPreterm`', '`PreviousHistoryofPreterm`', 200, 45, -1, FALSE, '`PreviousHistoryofPreterm`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PreviousHistoryofPreterm->Sortable = TRUE; // Allow sort
		$this->PreviousHistoryofPreterm->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PreviousHistoryofPreterm->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PreviousHistoryofPreterm->Lookup = new Lookup('PreviousHistoryofPreterm', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PreviousHistoryofPreterm->OptionCount = 2;
		$this->fields['PreviousHistoryofPreterm'] = &$this->PreviousHistoryofPreterm;

		// G1
		$this->G1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G1', 'G1', '`G1`', '`G1`', 200, 45, -1, FALSE, '`G1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->G1->Sortable = TRUE; // Allow sort
		$this->fields['G1'] = &$this->G1;

		// G2
		$this->G2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G2', 'G2', '`G2`', '`G2`', 200, 45, -1, FALSE, '`G2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->G2->Sortable = TRUE; // Allow sort
		$this->fields['G2'] = &$this->G2;

		// G3
		$this->G3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_G3', 'G3', '`G3`', '`G3`', 200, 45, -1, FALSE, '`G3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->G3->Sortable = TRUE; // Allow sort
		$this->fields['G3'] = &$this->G3;

		// DeliveryNDLSCS1
		$this->DeliveryNDLSCS1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS1', 'DeliveryNDLSCS1', '`DeliveryNDLSCS1`', '`DeliveryNDLSCS1`', 200, 45, -1, FALSE, '`DeliveryNDLSCS1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeliveryNDLSCS1->Sortable = TRUE; // Allow sort
		$this->fields['DeliveryNDLSCS1'] = &$this->DeliveryNDLSCS1;

		// DeliveryNDLSCS2
		$this->DeliveryNDLSCS2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS2', 'DeliveryNDLSCS2', '`DeliveryNDLSCS2`', '`DeliveryNDLSCS2`', 200, 45, -1, FALSE, '`DeliveryNDLSCS2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeliveryNDLSCS2->Sortable = TRUE; // Allow sort
		$this->fields['DeliveryNDLSCS2'] = &$this->DeliveryNDLSCS2;

		// DeliveryNDLSCS3
		$this->DeliveryNDLSCS3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_DeliveryNDLSCS3', 'DeliveryNDLSCS3', '`DeliveryNDLSCS3`', '`DeliveryNDLSCS3`', 200, 45, -1, FALSE, '`DeliveryNDLSCS3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeliveryNDLSCS3->Sortable = TRUE; // Allow sort
		$this->fields['DeliveryNDLSCS3'] = &$this->DeliveryNDLSCS3;

		// BabySexweight1
		$this->BabySexweight1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight1', 'BabySexweight1', '`BabySexweight1`', '`BabySexweight1`', 200, 45, -1, FALSE, '`BabySexweight1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BabySexweight1->Sortable = TRUE; // Allow sort
		$this->fields['BabySexweight1'] = &$this->BabySexweight1;

		// BabySexweight2
		$this->BabySexweight2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight2', 'BabySexweight2', '`BabySexweight2`', '`BabySexweight2`', 200, 45, -1, FALSE, '`BabySexweight2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BabySexweight2->Sortable = TRUE; // Allow sort
		$this->fields['BabySexweight2'] = &$this->BabySexweight2;

		// BabySexweight3
		$this->BabySexweight3 = new DbField('patient_an_registration', 'patient_an_registration', 'x_BabySexweight3', 'BabySexweight3', '`BabySexweight3`', '`BabySexweight3`', 200, 45, -1, FALSE, '`BabySexweight3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BabySexweight3->Sortable = TRUE; // Allow sort
		$this->fields['BabySexweight3'] = &$this->BabySexweight3;

		// PastMedicalHistory
		$this->PastMedicalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastMedicalHistory', 'PastMedicalHistory', '`PastMedicalHistory`', '`PastMedicalHistory`', 200, 45, -1, FALSE, '`PastMedicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->PastMedicalHistory->Sortable = TRUE; // Allow sort
		$this->PastMedicalHistory->Lookup = new Lookup('PastMedicalHistory', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PastMedicalHistory->OptionCount = 7;
		$this->fields['PastMedicalHistory'] = &$this->PastMedicalHistory;

		// PastSurgicalHistory
		$this->PastSurgicalHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastSurgicalHistory', 'PastSurgicalHistory', '`PastSurgicalHistory`', '`PastSurgicalHistory`', 200, 45, -1, FALSE, '`PastSurgicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->PastSurgicalHistory->Sortable = TRUE; // Allow sort
		$this->PastSurgicalHistory->Lookup = new Lookup('PastSurgicalHistory', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PastSurgicalHistory->OptionCount = 2;
		$this->fields['PastSurgicalHistory'] = &$this->PastSurgicalHistory;

		// FamilyHistory
		$this->FamilyHistory = new DbField('patient_an_registration', 'patient_an_registration', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, 45, -1, FALSE, '`FamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->FamilyHistory->Sortable = TRUE; // Allow sort
		$this->FamilyHistory->Lookup = new Lookup('FamilyHistory', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FamilyHistory->OptionCount = 5;
		$this->fields['FamilyHistory'] = &$this->FamilyHistory;

		// Viability
		$this->Viability = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability', 'Viability', '`Viability`', '`Viability`', 200, 45, -1, FALSE, '`Viability`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Viability->Sortable = TRUE; // Allow sort
		$this->fields['Viability'] = &$this->Viability;

		// ViabilityDATE
		$this->ViabilityDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ViabilityDATE', 'ViabilityDATE', '`ViabilityDATE`', '`ViabilityDATE`', 200, 45, 7, FALSE, '`ViabilityDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ViabilityDATE->Sortable = TRUE; // Allow sort
		$this->fields['ViabilityDATE'] = &$this->ViabilityDATE;

		// ViabilityREPORT
		$this->ViabilityREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_ViabilityREPORT', 'ViabilityREPORT', '`ViabilityREPORT`', '`ViabilityREPORT`', 201, 450, -1, FALSE, '`ViabilityREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ViabilityREPORT->Sortable = TRUE; // Allow sort
		$this->fields['ViabilityREPORT'] = &$this->ViabilityREPORT;

		// Viability2
		$this->Viability2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2', 'Viability2', '`Viability2`', '`Viability2`', 200, 45, -1, FALSE, '`Viability2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Viability2->Sortable = TRUE; // Allow sort
		$this->fields['Viability2'] = &$this->Viability2;

		// Viability2DATE
		$this->Viability2DATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2DATE', 'Viability2DATE', '`Viability2DATE`', '`Viability2DATE`', 200, 45, 7, FALSE, '`Viability2DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Viability2DATE->Sortable = TRUE; // Allow sort
		$this->fields['Viability2DATE'] = &$this->Viability2DATE;

		// Viability2REPORT
		$this->Viability2REPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_Viability2REPORT', 'Viability2REPORT', '`Viability2REPORT`', '`Viability2REPORT`', 201, 450, -1, FALSE, '`Viability2REPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Viability2REPORT->Sortable = TRUE; // Allow sort
		$this->fields['Viability2REPORT'] = &$this->Viability2REPORT;

		// NTscan
		$this->NTscan = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscan', 'NTscan', '`NTscan`', '`NTscan`', 200, 45, -1, FALSE, '`NTscan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NTscan->Sortable = TRUE; // Allow sort
		$this->fields['NTscan'] = &$this->NTscan;

		// NTscanDATE
		$this->NTscanDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscanDATE', 'NTscanDATE', '`NTscanDATE`', '`NTscanDATE`', 200, 45, 7, FALSE, '`NTscanDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NTscanDATE->Sortable = TRUE; // Allow sort
		$this->fields['NTscanDATE'] = &$this->NTscanDATE;

		// NTscanREPORT
		$this->NTscanREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_NTscanREPORT', 'NTscanREPORT', '`NTscanREPORT`', '`NTscanREPORT`', 201, 450, -1, FALSE, '`NTscanREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NTscanREPORT->Sortable = TRUE; // Allow sort
		$this->fields['NTscanREPORT'] = &$this->NTscanREPORT;

		// EarlyTarget
		$this->EarlyTarget = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTarget', 'EarlyTarget', '`EarlyTarget`', '`EarlyTarget`', 200, 45, -1, FALSE, '`EarlyTarget`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EarlyTarget->Sortable = TRUE; // Allow sort
		$this->fields['EarlyTarget'] = &$this->EarlyTarget;

		// EarlyTargetDATE
		$this->EarlyTargetDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTargetDATE', 'EarlyTargetDATE', '`EarlyTargetDATE`', '`EarlyTargetDATE`', 200, 45, 7, FALSE, '`EarlyTargetDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EarlyTargetDATE->Sortable = TRUE; // Allow sort
		$this->fields['EarlyTargetDATE'] = &$this->EarlyTargetDATE;

		// EarlyTargetREPORT
		$this->EarlyTargetREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_EarlyTargetREPORT', 'EarlyTargetREPORT', '`EarlyTargetREPORT`', '`EarlyTargetREPORT`', 201, 450, -1, FALSE, '`EarlyTargetREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EarlyTargetREPORT->Sortable = TRUE; // Allow sort
		$this->fields['EarlyTargetREPORT'] = &$this->EarlyTargetREPORT;

		// Anomaly
		$this->Anomaly = new DbField('patient_an_registration', 'patient_an_registration', 'x_Anomaly', 'Anomaly', '`Anomaly`', '`Anomaly`', 200, 45, -1, FALSE, '`Anomaly`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Anomaly->Sortable = TRUE; // Allow sort
		$this->fields['Anomaly'] = &$this->Anomaly;

		// AnomalyDATE
		$this->AnomalyDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_AnomalyDATE', 'AnomalyDATE', '`AnomalyDATE`', '`AnomalyDATE`', 200, 45, 7, FALSE, '`AnomalyDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnomalyDATE->Sortable = TRUE; // Allow sort
		$this->fields['AnomalyDATE'] = &$this->AnomalyDATE;

		// AnomalyREPORT
		$this->AnomalyREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_AnomalyREPORT', 'AnomalyREPORT', '`AnomalyREPORT`', '`AnomalyREPORT`', 201, 450, -1, FALSE, '`AnomalyREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnomalyREPORT->Sortable = TRUE; // Allow sort
		$this->fields['AnomalyREPORT'] = &$this->AnomalyREPORT;

		// Growth
		$this->Growth = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth', 'Growth', '`Growth`', '`Growth`', 200, 45, -1, FALSE, '`Growth`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Growth->Sortable = TRUE; // Allow sort
		$this->fields['Growth'] = &$this->Growth;

		// GrowthDATE
		$this->GrowthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_GrowthDATE', 'GrowthDATE', '`GrowthDATE`', '`GrowthDATE`', 200, 45, 7, FALSE, '`GrowthDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrowthDATE->Sortable = TRUE; // Allow sort
		$this->fields['GrowthDATE'] = &$this->GrowthDATE;

		// GrowthREPORT
		$this->GrowthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_GrowthREPORT', 'GrowthREPORT', '`GrowthREPORT`', '`GrowthREPORT`', 201, 450, -1, FALSE, '`GrowthREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GrowthREPORT->Sortable = TRUE; // Allow sort
		$this->fields['GrowthREPORT'] = &$this->GrowthREPORT;

		// Growth1
		$this->Growth1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1', 'Growth1', '`Growth1`', '`Growth1`', 200, 45, -1, FALSE, '`Growth1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Growth1->Sortable = TRUE; // Allow sort
		$this->fields['Growth1'] = &$this->Growth1;

		// Growth1DATE
		$this->Growth1DATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1DATE', 'Growth1DATE', '`Growth1DATE`', '`Growth1DATE`', 200, 45, 7, FALSE, '`Growth1DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Growth1DATE->Sortable = TRUE; // Allow sort
		$this->fields['Growth1DATE'] = &$this->Growth1DATE;

		// Growth1REPORT
		$this->Growth1REPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_Growth1REPORT', 'Growth1REPORT', '`Growth1REPORT`', '`Growth1REPORT`', 201, 450, -1, FALSE, '`Growth1REPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Growth1REPORT->Sortable = TRUE; // Allow sort
		$this->fields['Growth1REPORT'] = &$this->Growth1REPORT;

		// ANProfile
		$this->ANProfile = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfile', 'ANProfile', '`ANProfile`', '`ANProfile`', 200, 45, -1, FALSE, '`ANProfile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANProfile->Sortable = TRUE; // Allow sort
		$this->fields['ANProfile'] = &$this->ANProfile;

		// ANProfileDATE
		$this->ANProfileDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileDATE', 'ANProfileDATE', '`ANProfileDATE`', '`ANProfileDATE`', 200, 45, 7, FALSE, '`ANProfileDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANProfileDATE->Sortable = TRUE; // Allow sort
		$this->fields['ANProfileDATE'] = &$this->ANProfileDATE;

		// ANProfileINHOUSE
		$this->ANProfileINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileINHOUSE', 'ANProfileINHOUSE', '`ANProfileINHOUSE`', '`ANProfileINHOUSE`', 200, 45, -1, FALSE, '`ANProfileINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANProfileINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['ANProfileINHOUSE'] = &$this->ANProfileINHOUSE;

		// ANProfileREPORT
		$this->ANProfileREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANProfileREPORT', 'ANProfileREPORT', '`ANProfileREPORT`', '`ANProfileREPORT`', 201, 450, -1, FALSE, '`ANProfileREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANProfileREPORT->Sortable = TRUE; // Allow sort
		$this->fields['ANProfileREPORT'] = &$this->ANProfileREPORT;

		// DualMarker
		$this->DualMarker = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarker', 'DualMarker', '`DualMarker`', '`DualMarker`', 200, 45, -1, FALSE, '`DualMarker`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DualMarker->Sortable = TRUE; // Allow sort
		$this->fields['DualMarker'] = &$this->DualMarker;

		// DualMarkerDATE
		$this->DualMarkerDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerDATE', 'DualMarkerDATE', '`DualMarkerDATE`', '`DualMarkerDATE`', 200, 45, 7, FALSE, '`DualMarkerDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DualMarkerDATE->Sortable = TRUE; // Allow sort
		$this->fields['DualMarkerDATE'] = &$this->DualMarkerDATE;

		// DualMarkerINHOUSE
		$this->DualMarkerINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerINHOUSE', 'DualMarkerINHOUSE', '`DualMarkerINHOUSE`', '`DualMarkerINHOUSE`', 200, 45, -1, FALSE, '`DualMarkerINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DualMarkerINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['DualMarkerINHOUSE'] = &$this->DualMarkerINHOUSE;

		// DualMarkerREPORT
		$this->DualMarkerREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_DualMarkerREPORT', 'DualMarkerREPORT', '`DualMarkerREPORT`', '`DualMarkerREPORT`', 201, 450, -1, FALSE, '`DualMarkerREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DualMarkerREPORT->Sortable = TRUE; // Allow sort
		$this->fields['DualMarkerREPORT'] = &$this->DualMarkerREPORT;

		// Quadruple
		$this->Quadruple = new DbField('patient_an_registration', 'patient_an_registration', 'x_Quadruple', 'Quadruple', '`Quadruple`', '`Quadruple`', 200, 45, -1, FALSE, '`Quadruple`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Quadruple->Sortable = TRUE; // Allow sort
		$this->fields['Quadruple'] = &$this->Quadruple;

		// QuadrupleDATE
		$this->QuadrupleDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleDATE', 'QuadrupleDATE', '`QuadrupleDATE`', '`QuadrupleDATE`', 200, 45, 7, FALSE, '`QuadrupleDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QuadrupleDATE->Sortable = TRUE; // Allow sort
		$this->fields['QuadrupleDATE'] = &$this->QuadrupleDATE;

		// QuadrupleINHOUSE
		$this->QuadrupleINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleINHOUSE', 'QuadrupleINHOUSE', '`QuadrupleINHOUSE`', '`QuadrupleINHOUSE`', 200, 45, -1, FALSE, '`QuadrupleINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QuadrupleINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['QuadrupleINHOUSE'] = &$this->QuadrupleINHOUSE;

		// QuadrupleREPORT
		$this->QuadrupleREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_QuadrupleREPORT', 'QuadrupleREPORT', '`QuadrupleREPORT`', '`QuadrupleREPORT`', 201, 450, -1, FALSE, '`QuadrupleREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QuadrupleREPORT->Sortable = TRUE; // Allow sort
		$this->fields['QuadrupleREPORT'] = &$this->QuadrupleREPORT;

		// A5month
		$this->A5month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5month', 'A5month', '`A5month`', '`A5month`', 200, 45, -1, FALSE, '`A5month`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A5month->Sortable = TRUE; // Allow sort
		$this->fields['A5month'] = &$this->A5month;

		// A5monthDATE
		$this->A5monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthDATE', 'A5monthDATE', '`A5monthDATE`', '`A5monthDATE`', 200, 45, 7, FALSE, '`A5monthDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A5monthDATE->Sortable = TRUE; // Allow sort
		$this->fields['A5monthDATE'] = &$this->A5monthDATE;

		// A5monthINHOUSE
		$this->A5monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthINHOUSE', 'A5monthINHOUSE', '`A5monthINHOUSE`', '`A5monthINHOUSE`', 200, 45, -1, FALSE, '`A5monthINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A5monthINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['A5monthINHOUSE'] = &$this->A5monthINHOUSE;

		// A5monthREPORT
		$this->A5monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A5monthREPORT', 'A5monthREPORT', '`A5monthREPORT`', '`A5monthREPORT`', 201, 450, -1, FALSE, '`A5monthREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A5monthREPORT->Sortable = TRUE; // Allow sort
		$this->fields['A5monthREPORT'] = &$this->A5monthREPORT;

		// A7month
		$this->A7month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7month', 'A7month', '`A7month`', '`A7month`', 200, 45, -1, FALSE, '`A7month`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A7month->Sortable = TRUE; // Allow sort
		$this->fields['A7month'] = &$this->A7month;

		// A7monthDATE
		$this->A7monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthDATE', 'A7monthDATE', '`A7monthDATE`', '`A7monthDATE`', 200, 45, 7, FALSE, '`A7monthDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A7monthDATE->Sortable = TRUE; // Allow sort
		$this->fields['A7monthDATE'] = &$this->A7monthDATE;

		// A7monthINHOUSE
		$this->A7monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthINHOUSE', 'A7monthINHOUSE', '`A7monthINHOUSE`', '`A7monthINHOUSE`', 200, 45, -1, FALSE, '`A7monthINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A7monthINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['A7monthINHOUSE'] = &$this->A7monthINHOUSE;

		// A7monthREPORT
		$this->A7monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A7monthREPORT', 'A7monthREPORT', '`A7monthREPORT`', '`A7monthREPORT`', 201, 450, -1, FALSE, '`A7monthREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A7monthREPORT->Sortable = TRUE; // Allow sort
		$this->fields['A7monthREPORT'] = &$this->A7monthREPORT;

		// A9month
		$this->A9month = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9month', 'A9month', '`A9month`', '`A9month`', 200, 45, -1, FALSE, '`A9month`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A9month->Sortable = TRUE; // Allow sort
		$this->fields['A9month'] = &$this->A9month;

		// A9monthDATE
		$this->A9monthDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthDATE', 'A9monthDATE', '`A9monthDATE`', '`A9monthDATE`', 200, 45, 7, FALSE, '`A9monthDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A9monthDATE->Sortable = TRUE; // Allow sort
		$this->fields['A9monthDATE'] = &$this->A9monthDATE;

		// A9monthINHOUSE
		$this->A9monthINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthINHOUSE', 'A9monthINHOUSE', '`A9monthINHOUSE`', '`A9monthINHOUSE`', 200, 45, -1, FALSE, '`A9monthINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A9monthINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['A9monthINHOUSE'] = &$this->A9monthINHOUSE;

		// A9monthREPORT
		$this->A9monthREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_A9monthREPORT', 'A9monthREPORT', '`A9monthREPORT`', '`A9monthREPORT`', 201, 450, -1, FALSE, '`A9monthREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A9monthREPORT->Sortable = TRUE; // Allow sort
		$this->fields['A9monthREPORT'] = &$this->A9monthREPORT;

		// INJ
		$this->INJ = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJ', 'INJ', '`INJ`', '`INJ`', 200, 45, -1, FALSE, '`INJ`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INJ->Sortable = TRUE; // Allow sort
		$this->fields['INJ'] = &$this->INJ;

		// INJDATE
		$this->INJDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJDATE', 'INJDATE', '`INJDATE`', '`INJDATE`', 200, 45, 7, FALSE, '`INJDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INJDATE->Sortable = TRUE; // Allow sort
		$this->fields['INJDATE'] = &$this->INJDATE;

		// INJINHOUSE
		$this->INJINHOUSE = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJINHOUSE', 'INJINHOUSE', '`INJINHOUSE`', '`INJINHOUSE`', 200, 45, -1, FALSE, '`INJINHOUSE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INJINHOUSE->Sortable = TRUE; // Allow sort
		$this->fields['INJINHOUSE'] = &$this->INJINHOUSE;

		// INJREPORT
		$this->INJREPORT = new DbField('patient_an_registration', 'patient_an_registration', 'x_INJREPORT', 'INJREPORT', '`INJREPORT`', '`INJREPORT`', 201, 450, -1, FALSE, '`INJREPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INJREPORT->Sortable = TRUE; // Allow sort
		$this->fields['INJREPORT'] = &$this->INJREPORT;

		// Bleeding
		$this->Bleeding = new DbField('patient_an_registration', 'patient_an_registration', 'x_Bleeding', 'Bleeding', '`Bleeding`', '`Bleeding`', 200, 45, -1, FALSE, '`Bleeding`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Bleeding->Sortable = TRUE; // Allow sort
		$this->Bleeding->Lookup = new Lookup('Bleeding', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Bleeding->OptionCount = 16;
		$this->fields['Bleeding'] = &$this->Bleeding;

		// Hypothyroidism
		$this->Hypothyroidism = new DbField('patient_an_registration', 'patient_an_registration', 'x_Hypothyroidism', 'Hypothyroidism', '`Hypothyroidism`', '`Hypothyroidism`', 200, 45, -1, FALSE, '`Hypothyroidism`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Hypothyroidism->Sortable = TRUE; // Allow sort
		$this->fields['Hypothyroidism'] = &$this->Hypothyroidism;

		// PICMENumber
		$this->PICMENumber = new DbField('patient_an_registration', 'patient_an_registration', 'x_PICMENumber', 'PICMENumber', '`PICMENumber`', '`PICMENumber`', 200, 45, -1, FALSE, '`PICMENumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PICMENumber->Sortable = TRUE; // Allow sort
		$this->fields['PICMENumber'] = &$this->PICMENumber;

		// Outcome
		$this->Outcome = new DbField('patient_an_registration', 'patient_an_registration', 'x_Outcome', 'Outcome', '`Outcome`', '`Outcome`', 200, 45, -1, FALSE, '`Outcome`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Outcome->Sortable = TRUE; // Allow sort
		$this->fields['Outcome'] = &$this->Outcome;

		// DateofAdmission
		$this->DateofAdmission = new DbField('patient_an_registration', 'patient_an_registration', 'x_DateofAdmission', 'DateofAdmission', '`DateofAdmission`', '`DateofAdmission`', 200, 45, 7, FALSE, '`DateofAdmission`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateofAdmission->Sortable = TRUE; // Allow sort
		$this->fields['DateofAdmission'] = &$this->DateofAdmission;

		// DateodProcedure
		$this->DateodProcedure = new DbField('patient_an_registration', 'patient_an_registration', 'x_DateodProcedure', 'DateodProcedure', '`DateodProcedure`', '`DateodProcedure`', 200, 45, 7, FALSE, '`DateodProcedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateodProcedure->Sortable = TRUE; // Allow sort
		$this->fields['DateodProcedure'] = &$this->DateodProcedure;

		// Miscarriage
		$this->Miscarriage = new DbField('patient_an_registration', 'patient_an_registration', 'x_Miscarriage', 'Miscarriage', '`Miscarriage`', '`Miscarriage`', 200, 45, -1, FALSE, '`Miscarriage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Miscarriage->Sortable = TRUE; // Allow sort
		$this->Miscarriage->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Miscarriage->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Miscarriage->Lookup = new Lookup('Miscarriage', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Miscarriage->OptionCount = 8;
		$this->fields['Miscarriage'] = &$this->Miscarriage;

		// ModeOfDelivery
		$this->ModeOfDelivery = new DbField('patient_an_registration', 'patient_an_registration', 'x_ModeOfDelivery', 'ModeOfDelivery', '`ModeOfDelivery`', '`ModeOfDelivery`', 200, 45, -1, FALSE, '`ModeOfDelivery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ModeOfDelivery->Sortable = TRUE; // Allow sort
		$this->ModeOfDelivery->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ModeOfDelivery->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ModeOfDelivery->Lookup = new Lookup('ModeOfDelivery', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ModeOfDelivery->OptionCount = 10;
		$this->fields['ModeOfDelivery'] = &$this->ModeOfDelivery;

		// ND
		$this->ND = new DbField('patient_an_registration', 'patient_an_registration', 'x_ND', 'ND', '`ND`', '`ND`', 200, 45, -1, FALSE, '`ND`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ND->Sortable = TRUE; // Allow sort
		$this->fields['ND'] = &$this->ND;

		// NDS
		$this->NDS = new DbField('patient_an_registration', 'patient_an_registration', 'x_NDS', 'NDS', '`NDS`', '`NDS`', 200, 45, -1, FALSE, '`NDS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NDS->Sortable = TRUE; // Allow sort
		$this->NDS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NDS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->NDS->Lookup = new Lookup('NDS', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->NDS->OptionCount = 2;
		$this->fields['NDS'] = &$this->NDS;

		// NDP
		$this->NDP = new DbField('patient_an_registration', 'patient_an_registration', 'x_NDP', 'NDP', '`NDP`', '`NDP`', 200, 45, -1, FALSE, '`NDP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NDP->Sortable = TRUE; // Allow sort
		$this->NDP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NDP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->NDP->Lookup = new Lookup('NDP', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->NDP->OptionCount = 2;
		$this->fields['NDP'] = &$this->NDP;

		// Vaccum
		$this->Vaccum = new DbField('patient_an_registration', 'patient_an_registration', 'x_Vaccum', 'Vaccum', '`Vaccum`', '`Vaccum`', 200, 45, -1, FALSE, '`Vaccum`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vaccum->Sortable = TRUE; // Allow sort
		$this->fields['Vaccum'] = &$this->Vaccum;

		// VaccumS
		$this->VaccumS = new DbField('patient_an_registration', 'patient_an_registration', 'x_VaccumS', 'VaccumS', '`VaccumS`', '`VaccumS`', 200, 45, -1, FALSE, '`VaccumS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->VaccumS->Sortable = TRUE; // Allow sort
		$this->VaccumS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->VaccumS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->VaccumS->Lookup = new Lookup('VaccumS', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->VaccumS->OptionCount = 2;
		$this->fields['VaccumS'] = &$this->VaccumS;

		// VaccumP
		$this->VaccumP = new DbField('patient_an_registration', 'patient_an_registration', 'x_VaccumP', 'VaccumP', '`VaccumP`', '`VaccumP`', 200, 45, -1, FALSE, '`VaccumP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->VaccumP->Sortable = TRUE; // Allow sort
		$this->VaccumP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->VaccumP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->VaccumP->Lookup = new Lookup('VaccumP', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->VaccumP->OptionCount = 2;
		$this->fields['VaccumP'] = &$this->VaccumP;

		// Forceps
		$this->Forceps = new DbField('patient_an_registration', 'patient_an_registration', 'x_Forceps', 'Forceps', '`Forceps`', '`Forceps`', 200, 45, -1, FALSE, '`Forceps`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Forceps->Sortable = TRUE; // Allow sort
		$this->fields['Forceps'] = &$this->Forceps;

		// ForcepsS
		$this->ForcepsS = new DbField('patient_an_registration', 'patient_an_registration', 'x_ForcepsS', 'ForcepsS', '`ForcepsS`', '`ForcepsS`', 200, 45, -1, FALSE, '`ForcepsS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ForcepsS->Sortable = TRUE; // Allow sort
		$this->ForcepsS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ForcepsS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ForcepsS->Lookup = new Lookup('ForcepsS', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ForcepsS->OptionCount = 2;
		$this->fields['ForcepsS'] = &$this->ForcepsS;

		// ForcepsP
		$this->ForcepsP = new DbField('patient_an_registration', 'patient_an_registration', 'x_ForcepsP', 'ForcepsP', '`ForcepsP`', '`ForcepsP`', 200, 45, -1, FALSE, '`ForcepsP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ForcepsP->Sortable = TRUE; // Allow sort
		$this->ForcepsP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ForcepsP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ForcepsP->Lookup = new Lookup('ForcepsP', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ForcepsP->OptionCount = 2;
		$this->fields['ForcepsP'] = &$this->ForcepsP;

		// Elective
		$this->Elective = new DbField('patient_an_registration', 'patient_an_registration', 'x_Elective', 'Elective', '`Elective`', '`Elective`', 200, 45, -1, FALSE, '`Elective`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Elective->Sortable = TRUE; // Allow sort
		$this->fields['Elective'] = &$this->Elective;

		// ElectiveS
		$this->ElectiveS = new DbField('patient_an_registration', 'patient_an_registration', 'x_ElectiveS', 'ElectiveS', '`ElectiveS`', '`ElectiveS`', 200, 45, -1, FALSE, '`ElectiveS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ElectiveS->Sortable = TRUE; // Allow sort
		$this->ElectiveS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ElectiveS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ElectiveS->Lookup = new Lookup('ElectiveS', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ElectiveS->OptionCount = 2;
		$this->fields['ElectiveS'] = &$this->ElectiveS;

		// ElectiveP
		$this->ElectiveP = new DbField('patient_an_registration', 'patient_an_registration', 'x_ElectiveP', 'ElectiveP', '`ElectiveP`', '`ElectiveP`', 200, 45, -1, FALSE, '`ElectiveP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ElectiveP->Sortable = TRUE; // Allow sort
		$this->ElectiveP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ElectiveP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ElectiveP->Lookup = new Lookup('ElectiveP', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ElectiveP->OptionCount = 2;
		$this->fields['ElectiveP'] = &$this->ElectiveP;

		// Emergency
		$this->Emergency = new DbField('patient_an_registration', 'patient_an_registration', 'x_Emergency', 'Emergency', '`Emergency`', '`Emergency`', 200, 45, -1, FALSE, '`Emergency`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Emergency->Sortable = TRUE; // Allow sort
		$this->fields['Emergency'] = &$this->Emergency;

		// EmergencyS
		$this->EmergencyS = new DbField('patient_an_registration', 'patient_an_registration', 'x_EmergencyS', 'EmergencyS', '`EmergencyS`', '`EmergencyS`', 200, 45, -1, FALSE, '`EmergencyS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->EmergencyS->Sortable = TRUE; // Allow sort
		$this->EmergencyS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->EmergencyS->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->EmergencyS->Lookup = new Lookup('EmergencyS', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->EmergencyS->OptionCount = 2;
		$this->fields['EmergencyS'] = &$this->EmergencyS;

		// EmergencyP
		$this->EmergencyP = new DbField('patient_an_registration', 'patient_an_registration', 'x_EmergencyP', 'EmergencyP', '`EmergencyP`', '`EmergencyP`', 200, 45, -1, FALSE, '`EmergencyP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->EmergencyP->Sortable = TRUE; // Allow sort
		$this->EmergencyP->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->EmergencyP->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->EmergencyP->Lookup = new Lookup('EmergencyP', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->EmergencyP->OptionCount = 2;
		$this->fields['EmergencyP'] = &$this->EmergencyP;

		// Maturity
		$this->Maturity = new DbField('patient_an_registration', 'patient_an_registration', 'x_Maturity', 'Maturity', '`Maturity`', '`Maturity`', 200, 45, -1, FALSE, '`Maturity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Maturity->Sortable = TRUE; // Allow sort
		$this->Maturity->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Maturity->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Maturity->Lookup = new Lookup('Maturity', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Maturity->OptionCount = 2;
		$this->fields['Maturity'] = &$this->Maturity;

		// Baby1
		$this->Baby1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Baby1', 'Baby1', '`Baby1`', '`Baby1`', 200, 45, -1, FALSE, '`Baby1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Baby1->Sortable = TRUE; // Allow sort
		$this->fields['Baby1'] = &$this->Baby1;

		// Baby2
		$this->Baby2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Baby2', 'Baby2', '`Baby2`', '`Baby2`', 200, 45, -1, FALSE, '`Baby2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Baby2->Sortable = TRUE; // Allow sort
		$this->fields['Baby2'] = &$this->Baby2;

		// sex1
		$this->sex1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_sex1', 'sex1', '`sex1`', '`sex1`', 200, 45, -1, FALSE, '`sex1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sex1->Sortable = TRUE; // Allow sort
		$this->fields['sex1'] = &$this->sex1;

		// sex2
		$this->sex2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_sex2', 'sex2', '`sex2`', '`sex2`', 200, 45, -1, FALSE, '`sex2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sex2->Sortable = TRUE; // Allow sort
		$this->fields['sex2'] = &$this->sex2;

		// weight1
		$this->weight1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_weight1', 'weight1', '`weight1`', '`weight1`', 200, 45, -1, FALSE, '`weight1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->weight1->Sortable = TRUE; // Allow sort
		$this->fields['weight1'] = &$this->weight1;

		// weight2
		$this->weight2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_weight2', 'weight2', '`weight2`', '`weight2`', 200, 45, -1, FALSE, '`weight2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->weight2->Sortable = TRUE; // Allow sort
		$this->fields['weight2'] = &$this->weight2;

		// NICU1
		$this->NICU1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_NICU1', 'NICU1', '`NICU1`', '`NICU1`', 200, 45, -1, FALSE, '`NICU1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NICU1->Sortable = TRUE; // Allow sort
		$this->fields['NICU1'] = &$this->NICU1;

		// NICU2
		$this->NICU2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_NICU2', 'NICU2', '`NICU2`', '`NICU2`', 200, 45, -1, FALSE, '`NICU2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NICU2->Sortable = TRUE; // Allow sort
		$this->fields['NICU2'] = &$this->NICU2;

		// Jaundice1
		$this->Jaundice1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Jaundice1', 'Jaundice1', '`Jaundice1`', '`Jaundice1`', 200, 45, -1, FALSE, '`Jaundice1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jaundice1->Sortable = TRUE; // Allow sort
		$this->fields['Jaundice1'] = &$this->Jaundice1;

		// Jaundice2
		$this->Jaundice2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Jaundice2', 'Jaundice2', '`Jaundice2`', '`Jaundice2`', 200, 45, -1, FALSE, '`Jaundice2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jaundice2->Sortable = TRUE; // Allow sort
		$this->fields['Jaundice2'] = &$this->Jaundice2;

		// Others1
		$this->Others1 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Others1', 'Others1', '`Others1`', '`Others1`', 200, 45, -1, FALSE, '`Others1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Others1->Sortable = TRUE; // Allow sort
		$this->fields['Others1'] = &$this->Others1;

		// Others2
		$this->Others2 = new DbField('patient_an_registration', 'patient_an_registration', 'x_Others2', 'Others2', '`Others2`', '`Others2`', 200, 45, -1, FALSE, '`Others2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Others2->Sortable = TRUE; // Allow sort
		$this->fields['Others2'] = &$this->Others2;

		// SpillOverReasons
		$this->SpillOverReasons = new DbField('patient_an_registration', 'patient_an_registration', 'x_SpillOverReasons', 'SpillOverReasons', '`SpillOverReasons`', '`SpillOverReasons`', 200, 45, -1, FALSE, '`SpillOverReasons`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SpillOverReasons->Sortable = TRUE; // Allow sort
		$this->SpillOverReasons->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SpillOverReasons->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->SpillOverReasons->Lookup = new Lookup('SpillOverReasons', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->SpillOverReasons->OptionCount = 7;
		$this->fields['SpillOverReasons'] = &$this->SpillOverReasons;

		// ANClosed
		$this->ANClosed = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANClosed', 'ANClosed', '`ANClosed`', '`ANClosed`', 200, 45, -1, FALSE, '`ANClosed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->ANClosed->Sortable = TRUE; // Allow sort
		$this->ANClosed->Lookup = new Lookup('ANClosed', 'patient_an_registration', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ANClosed->OptionCount = 1;
		$this->fields['ANClosed'] = &$this->ANClosed;

		// ANClosedDATE
		$this->ANClosedDATE = new DbField('patient_an_registration', 'patient_an_registration', 'x_ANClosedDATE', 'ANClosedDATE', '`ANClosedDATE`', '`ANClosedDATE`', 200, 45, 7, FALSE, '`ANClosedDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANClosedDATE->Sortable = TRUE; // Allow sort
		$this->fields['ANClosedDATE'] = &$this->ANClosedDATE;

		// PastMedicalHistoryOthers
		$this->PastMedicalHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastMedicalHistoryOthers', 'PastMedicalHistoryOthers', '`PastMedicalHistoryOthers`', '`PastMedicalHistoryOthers`', 200, 45, -1, FALSE, '`PastMedicalHistoryOthers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PastMedicalHistoryOthers->Sortable = TRUE; // Allow sort
		$this->fields['PastMedicalHistoryOthers'] = &$this->PastMedicalHistoryOthers;

		// PastSurgicalHistoryOthers
		$this->PastSurgicalHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PastSurgicalHistoryOthers', 'PastSurgicalHistoryOthers', '`PastSurgicalHistoryOthers`', '`PastSurgicalHistoryOthers`', 200, 45, -1, FALSE, '`PastSurgicalHistoryOthers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PastSurgicalHistoryOthers->Sortable = TRUE; // Allow sort
		$this->fields['PastSurgicalHistoryOthers'] = &$this->PastSurgicalHistoryOthers;

		// FamilyHistoryOthers
		$this->FamilyHistoryOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_FamilyHistoryOthers', 'FamilyHistoryOthers', '`FamilyHistoryOthers`', '`FamilyHistoryOthers`', 200, 45, -1, FALSE, '`FamilyHistoryOthers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FamilyHistoryOthers->Sortable = TRUE; // Allow sort
		$this->fields['FamilyHistoryOthers'] = &$this->FamilyHistoryOthers;

		// PresentPregnancyComplicationsOthers
		$this->PresentPregnancyComplicationsOthers = new DbField('patient_an_registration', 'patient_an_registration', 'x_PresentPregnancyComplicationsOthers', 'PresentPregnancyComplicationsOthers', '`PresentPregnancyComplicationsOthers`', '`PresentPregnancyComplicationsOthers`', 200, 45, -1, FALSE, '`PresentPregnancyComplicationsOthers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PresentPregnancyComplicationsOthers->Sortable = TRUE; // Allow sort
		$this->fields['PresentPregnancyComplicationsOthers'] = &$this->PresentPregnancyComplicationsOthers;

		// ETdate
		$this->ETdate = new DbField('patient_an_registration', 'patient_an_registration', 'x_ETdate', 'ETdate', '`ETdate`', '`ETdate`', 200, 45, 0, FALSE, '`ETdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ETdate->Sortable = TRUE; // Allow sort
		$this->fields['ETdate'] = &$this->ETdate;
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
		if ($this->getCurrentMasterTable() == "patient_opd_follow_up") {
			if ($this->fid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->fid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->pid->getSessionValue() != "")
				$masterFilter .= " AND `PatientId`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "patient_opd_follow_up") {
			if ($this->fid->getSessionValue() != "")
				$detailFilter .= "`fid`=" . QuotedValue($this->fid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->pid->getSessionValue() != "")
				$detailFilter .= " AND `pid`=" . QuotedValue($this->pid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_patient_opd_follow_up()
	{
		return "`id`=@id@ AND `PatientId`=@PatientId@";
	}

	// Detail filter
	public function sqlDetailFilter_patient_opd_follow_up()
	{
		return "`fid`=@fid@ AND `pid`=@pid@";
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
			return "patient_an_registrationlist.php";
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
		if ($pageName == "patient_an_registrationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_an_registrationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_an_registrationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_an_registrationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_an_registrationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_an_registrationview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_an_registrationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_an_registrationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_an_registrationedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_an_registrationadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_an_registrationdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "patient_opd_follow_up" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->fid->CurrentValue);
			$url .= "&fk_PatientId=" . urlencode($this->pid->CurrentValue);
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
		$this->pid->setDbValue($rs->fields('pid'));
		$this->fid->setDbValue($rs->fields('fid'));
		$this->G->setDbValue($rs->fields('G'));
		$this->P->setDbValue($rs->fields('P'));
		$this->L->setDbValue($rs->fields('L'));
		$this->A->setDbValue($rs->fields('A'));
		$this->E->setDbValue($rs->fields('E'));
		$this->M->setDbValue($rs->fields('M'));
		$this->LMP->setDbValue($rs->fields('LMP'));
		$this->EDO->setDbValue($rs->fields('EDO'));
		$this->MenstrualHistory->setDbValue($rs->fields('MenstrualHistory'));
		$this->MaritalHistory->setDbValue($rs->fields('MaritalHistory'));
		$this->ObstetricHistory->setDbValue($rs->fields('ObstetricHistory'));
		$this->PreviousHistoryofGDM->setDbValue($rs->fields('PreviousHistoryofGDM'));
		$this->PreviousHistorofPIH->setDbValue($rs->fields('PreviousHistorofPIH'));
		$this->PreviousHistoryofIUGR->setDbValue($rs->fields('PreviousHistoryofIUGR'));
		$this->PreviousHistoryofOligohydramnios->setDbValue($rs->fields('PreviousHistoryofOligohydramnios'));
		$this->PreviousHistoryofPreterm->setDbValue($rs->fields('PreviousHistoryofPreterm'));
		$this->G1->setDbValue($rs->fields('G1'));
		$this->G2->setDbValue($rs->fields('G2'));
		$this->G3->setDbValue($rs->fields('G3'));
		$this->DeliveryNDLSCS1->setDbValue($rs->fields('DeliveryNDLSCS1'));
		$this->DeliveryNDLSCS2->setDbValue($rs->fields('DeliveryNDLSCS2'));
		$this->DeliveryNDLSCS3->setDbValue($rs->fields('DeliveryNDLSCS3'));
		$this->BabySexweight1->setDbValue($rs->fields('BabySexweight1'));
		$this->BabySexweight2->setDbValue($rs->fields('BabySexweight2'));
		$this->BabySexweight3->setDbValue($rs->fields('BabySexweight3'));
		$this->PastMedicalHistory->setDbValue($rs->fields('PastMedicalHistory'));
		$this->PastSurgicalHistory->setDbValue($rs->fields('PastSurgicalHistory'));
		$this->FamilyHistory->setDbValue($rs->fields('FamilyHistory'));
		$this->Viability->setDbValue($rs->fields('Viability'));
		$this->ViabilityDATE->setDbValue($rs->fields('ViabilityDATE'));
		$this->ViabilityREPORT->setDbValue($rs->fields('ViabilityREPORT'));
		$this->Viability2->setDbValue($rs->fields('Viability2'));
		$this->Viability2DATE->setDbValue($rs->fields('Viability2DATE'));
		$this->Viability2REPORT->setDbValue($rs->fields('Viability2REPORT'));
		$this->NTscan->setDbValue($rs->fields('NTscan'));
		$this->NTscanDATE->setDbValue($rs->fields('NTscanDATE'));
		$this->NTscanREPORT->setDbValue($rs->fields('NTscanREPORT'));
		$this->EarlyTarget->setDbValue($rs->fields('EarlyTarget'));
		$this->EarlyTargetDATE->setDbValue($rs->fields('EarlyTargetDATE'));
		$this->EarlyTargetREPORT->setDbValue($rs->fields('EarlyTargetREPORT'));
		$this->Anomaly->setDbValue($rs->fields('Anomaly'));
		$this->AnomalyDATE->setDbValue($rs->fields('AnomalyDATE'));
		$this->AnomalyREPORT->setDbValue($rs->fields('AnomalyREPORT'));
		$this->Growth->setDbValue($rs->fields('Growth'));
		$this->GrowthDATE->setDbValue($rs->fields('GrowthDATE'));
		$this->GrowthREPORT->setDbValue($rs->fields('GrowthREPORT'));
		$this->Growth1->setDbValue($rs->fields('Growth1'));
		$this->Growth1DATE->setDbValue($rs->fields('Growth1DATE'));
		$this->Growth1REPORT->setDbValue($rs->fields('Growth1REPORT'));
		$this->ANProfile->setDbValue($rs->fields('ANProfile'));
		$this->ANProfileDATE->setDbValue($rs->fields('ANProfileDATE'));
		$this->ANProfileINHOUSE->setDbValue($rs->fields('ANProfileINHOUSE'));
		$this->ANProfileREPORT->setDbValue($rs->fields('ANProfileREPORT'));
		$this->DualMarker->setDbValue($rs->fields('DualMarker'));
		$this->DualMarkerDATE->setDbValue($rs->fields('DualMarkerDATE'));
		$this->DualMarkerINHOUSE->setDbValue($rs->fields('DualMarkerINHOUSE'));
		$this->DualMarkerREPORT->setDbValue($rs->fields('DualMarkerREPORT'));
		$this->Quadruple->setDbValue($rs->fields('Quadruple'));
		$this->QuadrupleDATE->setDbValue($rs->fields('QuadrupleDATE'));
		$this->QuadrupleINHOUSE->setDbValue($rs->fields('QuadrupleINHOUSE'));
		$this->QuadrupleREPORT->setDbValue($rs->fields('QuadrupleREPORT'));
		$this->A5month->setDbValue($rs->fields('A5month'));
		$this->A5monthDATE->setDbValue($rs->fields('A5monthDATE'));
		$this->A5monthINHOUSE->setDbValue($rs->fields('A5monthINHOUSE'));
		$this->A5monthREPORT->setDbValue($rs->fields('A5monthREPORT'));
		$this->A7month->setDbValue($rs->fields('A7month'));
		$this->A7monthDATE->setDbValue($rs->fields('A7monthDATE'));
		$this->A7monthINHOUSE->setDbValue($rs->fields('A7monthINHOUSE'));
		$this->A7monthREPORT->setDbValue($rs->fields('A7monthREPORT'));
		$this->A9month->setDbValue($rs->fields('A9month'));
		$this->A9monthDATE->setDbValue($rs->fields('A9monthDATE'));
		$this->A9monthINHOUSE->setDbValue($rs->fields('A9monthINHOUSE'));
		$this->A9monthREPORT->setDbValue($rs->fields('A9monthREPORT'));
		$this->INJ->setDbValue($rs->fields('INJ'));
		$this->INJDATE->setDbValue($rs->fields('INJDATE'));
		$this->INJINHOUSE->setDbValue($rs->fields('INJINHOUSE'));
		$this->INJREPORT->setDbValue($rs->fields('INJREPORT'));
		$this->Bleeding->setDbValue($rs->fields('Bleeding'));
		$this->Hypothyroidism->setDbValue($rs->fields('Hypothyroidism'));
		$this->PICMENumber->setDbValue($rs->fields('PICMENumber'));
		$this->Outcome->setDbValue($rs->fields('Outcome'));
		$this->DateofAdmission->setDbValue($rs->fields('DateofAdmission'));
		$this->DateodProcedure->setDbValue($rs->fields('DateodProcedure'));
		$this->Miscarriage->setDbValue($rs->fields('Miscarriage'));
		$this->ModeOfDelivery->setDbValue($rs->fields('ModeOfDelivery'));
		$this->ND->setDbValue($rs->fields('ND'));
		$this->NDS->setDbValue($rs->fields('NDS'));
		$this->NDP->setDbValue($rs->fields('NDP'));
		$this->Vaccum->setDbValue($rs->fields('Vaccum'));
		$this->VaccumS->setDbValue($rs->fields('VaccumS'));
		$this->VaccumP->setDbValue($rs->fields('VaccumP'));
		$this->Forceps->setDbValue($rs->fields('Forceps'));
		$this->ForcepsS->setDbValue($rs->fields('ForcepsS'));
		$this->ForcepsP->setDbValue($rs->fields('ForcepsP'));
		$this->Elective->setDbValue($rs->fields('Elective'));
		$this->ElectiveS->setDbValue($rs->fields('ElectiveS'));
		$this->ElectiveP->setDbValue($rs->fields('ElectiveP'));
		$this->Emergency->setDbValue($rs->fields('Emergency'));
		$this->EmergencyS->setDbValue($rs->fields('EmergencyS'));
		$this->EmergencyP->setDbValue($rs->fields('EmergencyP'));
		$this->Maturity->setDbValue($rs->fields('Maturity'));
		$this->Baby1->setDbValue($rs->fields('Baby1'));
		$this->Baby2->setDbValue($rs->fields('Baby2'));
		$this->sex1->setDbValue($rs->fields('sex1'));
		$this->sex2->setDbValue($rs->fields('sex2'));
		$this->weight1->setDbValue($rs->fields('weight1'));
		$this->weight2->setDbValue($rs->fields('weight2'));
		$this->NICU1->setDbValue($rs->fields('NICU1'));
		$this->NICU2->setDbValue($rs->fields('NICU2'));
		$this->Jaundice1->setDbValue($rs->fields('Jaundice1'));
		$this->Jaundice2->setDbValue($rs->fields('Jaundice2'));
		$this->Others1->setDbValue($rs->fields('Others1'));
		$this->Others2->setDbValue($rs->fields('Others2'));
		$this->SpillOverReasons->setDbValue($rs->fields('SpillOverReasons'));
		$this->ANClosed->setDbValue($rs->fields('ANClosed'));
		$this->ANClosedDATE->setDbValue($rs->fields('ANClosedDATE'));
		$this->PastMedicalHistoryOthers->setDbValue($rs->fields('PastMedicalHistoryOthers'));
		$this->PastSurgicalHistoryOthers->setDbValue($rs->fields('PastSurgicalHistoryOthers'));
		$this->FamilyHistoryOthers->setDbValue($rs->fields('FamilyHistoryOthers'));
		$this->PresentPregnancyComplicationsOthers->setDbValue($rs->fields('PresentPregnancyComplicationsOthers'));
		$this->ETdate->setDbValue($rs->fields('ETdate'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
			$this->MenstrualHistory->ViewValue = NULL;
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
			$this->PreviousHistoryofGDM->ViewValue = NULL;
		}
		$this->PreviousHistoryofGDM->ViewCustomAttributes = "";

		// PreviousHistorofPIH
		if (strval($this->PreviousHistorofPIH->CurrentValue) != "") {
			$this->PreviousHistorofPIH->ViewValue = $this->PreviousHistorofPIH->optionCaption($this->PreviousHistorofPIH->CurrentValue);
		} else {
			$this->PreviousHistorofPIH->ViewValue = NULL;
		}
		$this->PreviousHistorofPIH->ViewCustomAttributes = "";

		// PreviousHistoryofIUGR
		if (strval($this->PreviousHistoryofIUGR->CurrentValue) != "") {
			$this->PreviousHistoryofIUGR->ViewValue = $this->PreviousHistoryofIUGR->optionCaption($this->PreviousHistoryofIUGR->CurrentValue);
		} else {
			$this->PreviousHistoryofIUGR->ViewValue = NULL;
		}
		$this->PreviousHistoryofIUGR->ViewCustomAttributes = "";

		// PreviousHistoryofOligohydramnios
		if (strval($this->PreviousHistoryofOligohydramnios->CurrentValue) != "") {
			$this->PreviousHistoryofOligohydramnios->ViewValue = $this->PreviousHistoryofOligohydramnios->optionCaption($this->PreviousHistoryofOligohydramnios->CurrentValue);
		} else {
			$this->PreviousHistoryofOligohydramnios->ViewValue = NULL;
		}
		$this->PreviousHistoryofOligohydramnios->ViewCustomAttributes = "";

		// PreviousHistoryofPreterm
		if (strval($this->PreviousHistoryofPreterm->CurrentValue) != "") {
			$this->PreviousHistoryofPreterm->ViewValue = $this->PreviousHistoryofPreterm->optionCaption($this->PreviousHistoryofPreterm->CurrentValue);
		} else {
			$this->PreviousHistoryofPreterm->ViewValue = NULL;
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
			$this->PastMedicalHistory->ViewValue = NULL;
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
			$this->PastSurgicalHistory->ViewValue = NULL;
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
			$this->FamilyHistory->ViewValue = NULL;
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
			$this->Bleeding->ViewValue = NULL;
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
			$this->Miscarriage->ViewValue = NULL;
		}
		$this->Miscarriage->ViewCustomAttributes = "";

		// ModeOfDelivery
		if (strval($this->ModeOfDelivery->CurrentValue) != "") {
			$this->ModeOfDelivery->ViewValue = $this->ModeOfDelivery->optionCaption($this->ModeOfDelivery->CurrentValue);
		} else {
			$this->ModeOfDelivery->ViewValue = NULL;
		}
		$this->ModeOfDelivery->ViewCustomAttributes = "";

		// ND
		$this->ND->ViewValue = $this->ND->CurrentValue;
		$this->ND->ViewCustomAttributes = "";

		// NDS
		if (strval($this->NDS->CurrentValue) != "") {
			$this->NDS->ViewValue = $this->NDS->optionCaption($this->NDS->CurrentValue);
		} else {
			$this->NDS->ViewValue = NULL;
		}
		$this->NDS->ViewCustomAttributes = "";

		// NDP
		if (strval($this->NDP->CurrentValue) != "") {
			$this->NDP->ViewValue = $this->NDP->optionCaption($this->NDP->CurrentValue);
		} else {
			$this->NDP->ViewValue = NULL;
		}
		$this->NDP->ViewCustomAttributes = "";

		// Vaccum
		$this->Vaccum->ViewValue = $this->Vaccum->CurrentValue;
		$this->Vaccum->ViewCustomAttributes = "";

		// VaccumS
		if (strval($this->VaccumS->CurrentValue) != "") {
			$this->VaccumS->ViewValue = $this->VaccumS->optionCaption($this->VaccumS->CurrentValue);
		} else {
			$this->VaccumS->ViewValue = NULL;
		}
		$this->VaccumS->ViewCustomAttributes = "";

		// VaccumP
		if (strval($this->VaccumP->CurrentValue) != "") {
			$this->VaccumP->ViewValue = $this->VaccumP->optionCaption($this->VaccumP->CurrentValue);
		} else {
			$this->VaccumP->ViewValue = NULL;
		}
		$this->VaccumP->ViewCustomAttributes = "";

		// Forceps
		$this->Forceps->ViewValue = $this->Forceps->CurrentValue;
		$this->Forceps->ViewCustomAttributes = "";

		// ForcepsS
		if (strval($this->ForcepsS->CurrentValue) != "") {
			$this->ForcepsS->ViewValue = $this->ForcepsS->optionCaption($this->ForcepsS->CurrentValue);
		} else {
			$this->ForcepsS->ViewValue = NULL;
		}
		$this->ForcepsS->ViewCustomAttributes = "";

		// ForcepsP
		if (strval($this->ForcepsP->CurrentValue) != "") {
			$this->ForcepsP->ViewValue = $this->ForcepsP->optionCaption($this->ForcepsP->CurrentValue);
		} else {
			$this->ForcepsP->ViewValue = NULL;
		}
		$this->ForcepsP->ViewCustomAttributes = "";

		// Elective
		$this->Elective->ViewValue = $this->Elective->CurrentValue;
		$this->Elective->ViewCustomAttributes = "";

		// ElectiveS
		if (strval($this->ElectiveS->CurrentValue) != "") {
			$this->ElectiveS->ViewValue = $this->ElectiveS->optionCaption($this->ElectiveS->CurrentValue);
		} else {
			$this->ElectiveS->ViewValue = NULL;
		}
		$this->ElectiveS->ViewCustomAttributes = "";

		// ElectiveP
		if (strval($this->ElectiveP->CurrentValue) != "") {
			$this->ElectiveP->ViewValue = $this->ElectiveP->optionCaption($this->ElectiveP->CurrentValue);
		} else {
			$this->ElectiveP->ViewValue = NULL;
		}
		$this->ElectiveP->ViewCustomAttributes = "";

		// Emergency
		$this->Emergency->ViewValue = $this->Emergency->CurrentValue;
		$this->Emergency->ViewCustomAttributes = "";

		// EmergencyS
		if (strval($this->EmergencyS->CurrentValue) != "") {
			$this->EmergencyS->ViewValue = $this->EmergencyS->optionCaption($this->EmergencyS->CurrentValue);
		} else {
			$this->EmergencyS->ViewValue = NULL;
		}
		$this->EmergencyS->ViewCustomAttributes = "";

		// EmergencyP
		if (strval($this->EmergencyP->CurrentValue) != "") {
			$this->EmergencyP->ViewValue = $this->EmergencyP->optionCaption($this->EmergencyP->CurrentValue);
		} else {
			$this->EmergencyP->ViewValue = NULL;
		}
		$this->EmergencyP->ViewCustomAttributes = "";

		// Maturity
		if (strval($this->Maturity->CurrentValue) != "") {
			$this->Maturity->ViewValue = $this->Maturity->optionCaption($this->Maturity->CurrentValue);
		} else {
			$this->Maturity->ViewValue = NULL;
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
			$this->SpillOverReasons->ViewValue = NULL;
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
			$this->ANClosed->ViewValue = NULL;
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

		// pid
		$this->pid->EditAttrs["class"] = "form-control";
		$this->pid->EditCustomAttributes = "";
		if ($this->pid->getSessionValue() != "") {
			$this->pid->CurrentValue = $this->pid->getSessionValue();
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
			$this->fid->CurrentValue = $this->fid->getSessionValue();
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
		if (!$this->G->Raw)
			$this->G->CurrentValue = HtmlDecode($this->G->CurrentValue);
		$this->G->EditValue = $this->G->CurrentValue;
		$this->G->PlaceHolder = RemoveHtml($this->G->caption());

		// P
		$this->P->EditAttrs["class"] = "form-control";
		$this->P->EditCustomAttributes = "";
		if (!$this->P->Raw)
			$this->P->CurrentValue = HtmlDecode($this->P->CurrentValue);
		$this->P->EditValue = $this->P->CurrentValue;
		$this->P->PlaceHolder = RemoveHtml($this->P->caption());

		// L
		$this->L->EditAttrs["class"] = "form-control";
		$this->L->EditCustomAttributes = "";
		if (!$this->L->Raw)
			$this->L->CurrentValue = HtmlDecode($this->L->CurrentValue);
		$this->L->EditValue = $this->L->CurrentValue;
		$this->L->PlaceHolder = RemoveHtml($this->L->caption());

		// A
		$this->A->EditAttrs["class"] = "form-control";
		$this->A->EditCustomAttributes = "";
		if (!$this->A->Raw)
			$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
		$this->A->EditValue = $this->A->CurrentValue;
		$this->A->PlaceHolder = RemoveHtml($this->A->caption());

		// E
		$this->E->EditAttrs["class"] = "form-control";
		$this->E->EditCustomAttributes = "";
		if (!$this->E->Raw)
			$this->E->CurrentValue = HtmlDecode($this->E->CurrentValue);
		$this->E->EditValue = $this->E->CurrentValue;
		$this->E->PlaceHolder = RemoveHtml($this->E->caption());

		// M
		$this->M->EditAttrs["class"] = "form-control";
		$this->M->EditCustomAttributes = "";
		if (!$this->M->Raw)
			$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
		$this->M->EditValue = $this->M->CurrentValue;
		$this->M->PlaceHolder = RemoveHtml($this->M->caption());

		// LMP
		$this->LMP->EditAttrs["class"] = "form-control";
		$this->LMP->EditCustomAttributes = "";
		if (!$this->LMP->Raw)
			$this->LMP->CurrentValue = HtmlDecode($this->LMP->CurrentValue);
		$this->LMP->EditValue = $this->LMP->CurrentValue;
		$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

		// EDO
		$this->EDO->EditAttrs["class"] = "form-control";
		$this->EDO->EditCustomAttributes = "";
		if (!$this->EDO->Raw)
			$this->EDO->CurrentValue = HtmlDecode($this->EDO->CurrentValue);
		$this->EDO->EditValue = $this->EDO->CurrentValue;
		$this->EDO->PlaceHolder = RemoveHtml($this->EDO->caption());

		// MenstrualHistory
		$this->MenstrualHistory->EditAttrs["class"] = "form-control";
		$this->MenstrualHistory->EditCustomAttributes = "";
		$this->MenstrualHistory->EditValue = $this->MenstrualHistory->options(TRUE);

		// MaritalHistory
		$this->MaritalHistory->EditAttrs["class"] = "form-control";
		$this->MaritalHistory->EditCustomAttributes = "";
		if (!$this->MaritalHistory->Raw)
			$this->MaritalHistory->CurrentValue = HtmlDecode($this->MaritalHistory->CurrentValue);
		$this->MaritalHistory->EditValue = $this->MaritalHistory->CurrentValue;
		$this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

		// ObstetricHistory
		$this->ObstetricHistory->EditAttrs["class"] = "form-control";
		$this->ObstetricHistory->EditCustomAttributes = "";
		if (!$this->ObstetricHistory->Raw)
			$this->ObstetricHistory->CurrentValue = HtmlDecode($this->ObstetricHistory->CurrentValue);
		$this->ObstetricHistory->EditValue = $this->ObstetricHistory->CurrentValue;
		$this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

		// PreviousHistoryofGDM
		$this->PreviousHistoryofGDM->EditAttrs["class"] = "form-control";
		$this->PreviousHistoryofGDM->EditCustomAttributes = "";
		$this->PreviousHistoryofGDM->EditValue = $this->PreviousHistoryofGDM->options(TRUE);

		// PreviousHistorofPIH
		$this->PreviousHistorofPIH->EditAttrs["class"] = "form-control";
		$this->PreviousHistorofPIH->EditCustomAttributes = "";
		$this->PreviousHistorofPIH->EditValue = $this->PreviousHistorofPIH->options(TRUE);

		// PreviousHistoryofIUGR
		$this->PreviousHistoryofIUGR->EditAttrs["class"] = "form-control";
		$this->PreviousHistoryofIUGR->EditCustomAttributes = "";
		$this->PreviousHistoryofIUGR->EditValue = $this->PreviousHistoryofIUGR->options(TRUE);

		// PreviousHistoryofOligohydramnios
		$this->PreviousHistoryofOligohydramnios->EditAttrs["class"] = "form-control";
		$this->PreviousHistoryofOligohydramnios->EditCustomAttributes = "";
		$this->PreviousHistoryofOligohydramnios->EditValue = $this->PreviousHistoryofOligohydramnios->options(TRUE);

		// PreviousHistoryofPreterm
		$this->PreviousHistoryofPreterm->EditAttrs["class"] = "form-control";
		$this->PreviousHistoryofPreterm->EditCustomAttributes = "";
		$this->PreviousHistoryofPreterm->EditValue = $this->PreviousHistoryofPreterm->options(TRUE);

		// G1
		$this->G1->EditAttrs["class"] = "form-control";
		$this->G1->EditCustomAttributes = "";
		if (!$this->G1->Raw)
			$this->G1->CurrentValue = HtmlDecode($this->G1->CurrentValue);
		$this->G1->EditValue = $this->G1->CurrentValue;
		$this->G1->PlaceHolder = RemoveHtml($this->G1->caption());

		// G2
		$this->G2->EditAttrs["class"] = "form-control";
		$this->G2->EditCustomAttributes = "";
		if (!$this->G2->Raw)
			$this->G2->CurrentValue = HtmlDecode($this->G2->CurrentValue);
		$this->G2->EditValue = $this->G2->CurrentValue;
		$this->G2->PlaceHolder = RemoveHtml($this->G2->caption());

		// G3
		$this->G3->EditAttrs["class"] = "form-control";
		$this->G3->EditCustomAttributes = "";
		if (!$this->G3->Raw)
			$this->G3->CurrentValue = HtmlDecode($this->G3->CurrentValue);
		$this->G3->EditValue = $this->G3->CurrentValue;
		$this->G3->PlaceHolder = RemoveHtml($this->G3->caption());

		// DeliveryNDLSCS1
		$this->DeliveryNDLSCS1->EditAttrs["class"] = "form-control";
		$this->DeliveryNDLSCS1->EditCustomAttributes = "";
		if (!$this->DeliveryNDLSCS1->Raw)
			$this->DeliveryNDLSCS1->CurrentValue = HtmlDecode($this->DeliveryNDLSCS1->CurrentValue);
		$this->DeliveryNDLSCS1->EditValue = $this->DeliveryNDLSCS1->CurrentValue;
		$this->DeliveryNDLSCS1->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS1->caption());

		// DeliveryNDLSCS2
		$this->DeliveryNDLSCS2->EditAttrs["class"] = "form-control";
		$this->DeliveryNDLSCS2->EditCustomAttributes = "";
		if (!$this->DeliveryNDLSCS2->Raw)
			$this->DeliveryNDLSCS2->CurrentValue = HtmlDecode($this->DeliveryNDLSCS2->CurrentValue);
		$this->DeliveryNDLSCS2->EditValue = $this->DeliveryNDLSCS2->CurrentValue;
		$this->DeliveryNDLSCS2->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS2->caption());

		// DeliveryNDLSCS3
		$this->DeliveryNDLSCS3->EditAttrs["class"] = "form-control";
		$this->DeliveryNDLSCS3->EditCustomAttributes = "";
		if (!$this->DeliveryNDLSCS3->Raw)
			$this->DeliveryNDLSCS3->CurrentValue = HtmlDecode($this->DeliveryNDLSCS3->CurrentValue);
		$this->DeliveryNDLSCS3->EditValue = $this->DeliveryNDLSCS3->CurrentValue;
		$this->DeliveryNDLSCS3->PlaceHolder = RemoveHtml($this->DeliveryNDLSCS3->caption());

		// BabySexweight1
		$this->BabySexweight1->EditAttrs["class"] = "form-control";
		$this->BabySexweight1->EditCustomAttributes = "";
		if (!$this->BabySexweight1->Raw)
			$this->BabySexweight1->CurrentValue = HtmlDecode($this->BabySexweight1->CurrentValue);
		$this->BabySexweight1->EditValue = $this->BabySexweight1->CurrentValue;
		$this->BabySexweight1->PlaceHolder = RemoveHtml($this->BabySexweight1->caption());

		// BabySexweight2
		$this->BabySexweight2->EditAttrs["class"] = "form-control";
		$this->BabySexweight2->EditCustomAttributes = "";
		if (!$this->BabySexweight2->Raw)
			$this->BabySexweight2->CurrentValue = HtmlDecode($this->BabySexweight2->CurrentValue);
		$this->BabySexweight2->EditValue = $this->BabySexweight2->CurrentValue;
		$this->BabySexweight2->PlaceHolder = RemoveHtml($this->BabySexweight2->caption());

		// BabySexweight3
		$this->BabySexweight3->EditAttrs["class"] = "form-control";
		$this->BabySexweight3->EditCustomAttributes = "";
		if (!$this->BabySexweight3->Raw)
			$this->BabySexweight3->CurrentValue = HtmlDecode($this->BabySexweight3->CurrentValue);
		$this->BabySexweight3->EditValue = $this->BabySexweight3->CurrentValue;
		$this->BabySexweight3->PlaceHolder = RemoveHtml($this->BabySexweight3->caption());

		// PastMedicalHistory
		$this->PastMedicalHistory->EditCustomAttributes = "";
		$this->PastMedicalHistory->EditValue = $this->PastMedicalHistory->options(FALSE);

		// PastSurgicalHistory
		$this->PastSurgicalHistory->EditCustomAttributes = "";
		$this->PastSurgicalHistory->EditValue = $this->PastSurgicalHistory->options(FALSE);

		// FamilyHistory
		$this->FamilyHistory->EditCustomAttributes = "";
		$this->FamilyHistory->EditValue = $this->FamilyHistory->options(FALSE);

		// Viability
		$this->Viability->EditAttrs["class"] = "form-control";
		$this->Viability->EditCustomAttributes = "";
		if (!$this->Viability->Raw)
			$this->Viability->CurrentValue = HtmlDecode($this->Viability->CurrentValue);
		$this->Viability->EditValue = $this->Viability->CurrentValue;
		$this->Viability->PlaceHolder = RemoveHtml($this->Viability->caption());

		// ViabilityDATE
		$this->ViabilityDATE->EditAttrs["class"] = "form-control";
		$this->ViabilityDATE->EditCustomAttributes = "";
		if (!$this->ViabilityDATE->Raw)
			$this->ViabilityDATE->CurrentValue = HtmlDecode($this->ViabilityDATE->CurrentValue);
		$this->ViabilityDATE->EditValue = $this->ViabilityDATE->CurrentValue;
		$this->ViabilityDATE->PlaceHolder = RemoveHtml($this->ViabilityDATE->caption());

		// ViabilityREPORT
		$this->ViabilityREPORT->EditAttrs["class"] = "form-control";
		$this->ViabilityREPORT->EditCustomAttributes = "";
		if (!$this->ViabilityREPORT->Raw)
			$this->ViabilityREPORT->CurrentValue = HtmlDecode($this->ViabilityREPORT->CurrentValue);
		$this->ViabilityREPORT->EditValue = $this->ViabilityREPORT->CurrentValue;
		$this->ViabilityREPORT->PlaceHolder = RemoveHtml($this->ViabilityREPORT->caption());

		// Viability2
		$this->Viability2->EditAttrs["class"] = "form-control";
		$this->Viability2->EditCustomAttributes = "";
		if (!$this->Viability2->Raw)
			$this->Viability2->CurrentValue = HtmlDecode($this->Viability2->CurrentValue);
		$this->Viability2->EditValue = $this->Viability2->CurrentValue;
		$this->Viability2->PlaceHolder = RemoveHtml($this->Viability2->caption());

		// Viability2DATE
		$this->Viability2DATE->EditAttrs["class"] = "form-control";
		$this->Viability2DATE->EditCustomAttributes = "";
		if (!$this->Viability2DATE->Raw)
			$this->Viability2DATE->CurrentValue = HtmlDecode($this->Viability2DATE->CurrentValue);
		$this->Viability2DATE->EditValue = $this->Viability2DATE->CurrentValue;
		$this->Viability2DATE->PlaceHolder = RemoveHtml($this->Viability2DATE->caption());

		// Viability2REPORT
		$this->Viability2REPORT->EditAttrs["class"] = "form-control";
		$this->Viability2REPORT->EditCustomAttributes = "";
		if (!$this->Viability2REPORT->Raw)
			$this->Viability2REPORT->CurrentValue = HtmlDecode($this->Viability2REPORT->CurrentValue);
		$this->Viability2REPORT->EditValue = $this->Viability2REPORT->CurrentValue;
		$this->Viability2REPORT->PlaceHolder = RemoveHtml($this->Viability2REPORT->caption());

		// NTscan
		$this->NTscan->EditAttrs["class"] = "form-control";
		$this->NTscan->EditCustomAttributes = "";
		if (!$this->NTscan->Raw)
			$this->NTscan->CurrentValue = HtmlDecode($this->NTscan->CurrentValue);
		$this->NTscan->EditValue = $this->NTscan->CurrentValue;
		$this->NTscan->PlaceHolder = RemoveHtml($this->NTscan->caption());

		// NTscanDATE
		$this->NTscanDATE->EditAttrs["class"] = "form-control";
		$this->NTscanDATE->EditCustomAttributes = "";
		if (!$this->NTscanDATE->Raw)
			$this->NTscanDATE->CurrentValue = HtmlDecode($this->NTscanDATE->CurrentValue);
		$this->NTscanDATE->EditValue = $this->NTscanDATE->CurrentValue;
		$this->NTscanDATE->PlaceHolder = RemoveHtml($this->NTscanDATE->caption());

		// NTscanREPORT
		$this->NTscanREPORT->EditAttrs["class"] = "form-control";
		$this->NTscanREPORT->EditCustomAttributes = "";
		if (!$this->NTscanREPORT->Raw)
			$this->NTscanREPORT->CurrentValue = HtmlDecode($this->NTscanREPORT->CurrentValue);
		$this->NTscanREPORT->EditValue = $this->NTscanREPORT->CurrentValue;
		$this->NTscanREPORT->PlaceHolder = RemoveHtml($this->NTscanREPORT->caption());

		// EarlyTarget
		$this->EarlyTarget->EditAttrs["class"] = "form-control";
		$this->EarlyTarget->EditCustomAttributes = "";
		if (!$this->EarlyTarget->Raw)
			$this->EarlyTarget->CurrentValue = HtmlDecode($this->EarlyTarget->CurrentValue);
		$this->EarlyTarget->EditValue = $this->EarlyTarget->CurrentValue;
		$this->EarlyTarget->PlaceHolder = RemoveHtml($this->EarlyTarget->caption());

		// EarlyTargetDATE
		$this->EarlyTargetDATE->EditAttrs["class"] = "form-control";
		$this->EarlyTargetDATE->EditCustomAttributes = "";
		if (!$this->EarlyTargetDATE->Raw)
			$this->EarlyTargetDATE->CurrentValue = HtmlDecode($this->EarlyTargetDATE->CurrentValue);
		$this->EarlyTargetDATE->EditValue = $this->EarlyTargetDATE->CurrentValue;
		$this->EarlyTargetDATE->PlaceHolder = RemoveHtml($this->EarlyTargetDATE->caption());

		// EarlyTargetREPORT
		$this->EarlyTargetREPORT->EditAttrs["class"] = "form-control";
		$this->EarlyTargetREPORT->EditCustomAttributes = "";
		if (!$this->EarlyTargetREPORT->Raw)
			$this->EarlyTargetREPORT->CurrentValue = HtmlDecode($this->EarlyTargetREPORT->CurrentValue);
		$this->EarlyTargetREPORT->EditValue = $this->EarlyTargetREPORT->CurrentValue;
		$this->EarlyTargetREPORT->PlaceHolder = RemoveHtml($this->EarlyTargetREPORT->caption());

		// Anomaly
		$this->Anomaly->EditAttrs["class"] = "form-control";
		$this->Anomaly->EditCustomAttributes = "";
		if (!$this->Anomaly->Raw)
			$this->Anomaly->CurrentValue = HtmlDecode($this->Anomaly->CurrentValue);
		$this->Anomaly->EditValue = $this->Anomaly->CurrentValue;
		$this->Anomaly->PlaceHolder = RemoveHtml($this->Anomaly->caption());

		// AnomalyDATE
		$this->AnomalyDATE->EditAttrs["class"] = "form-control";
		$this->AnomalyDATE->EditCustomAttributes = "";
		if (!$this->AnomalyDATE->Raw)
			$this->AnomalyDATE->CurrentValue = HtmlDecode($this->AnomalyDATE->CurrentValue);
		$this->AnomalyDATE->EditValue = $this->AnomalyDATE->CurrentValue;
		$this->AnomalyDATE->PlaceHolder = RemoveHtml($this->AnomalyDATE->caption());

		// AnomalyREPORT
		$this->AnomalyREPORT->EditAttrs["class"] = "form-control";
		$this->AnomalyREPORT->EditCustomAttributes = "";
		if (!$this->AnomalyREPORT->Raw)
			$this->AnomalyREPORT->CurrentValue = HtmlDecode($this->AnomalyREPORT->CurrentValue);
		$this->AnomalyREPORT->EditValue = $this->AnomalyREPORT->CurrentValue;
		$this->AnomalyREPORT->PlaceHolder = RemoveHtml($this->AnomalyREPORT->caption());

		// Growth
		$this->Growth->EditAttrs["class"] = "form-control";
		$this->Growth->EditCustomAttributes = "";
		if (!$this->Growth->Raw)
			$this->Growth->CurrentValue = HtmlDecode($this->Growth->CurrentValue);
		$this->Growth->EditValue = $this->Growth->CurrentValue;
		$this->Growth->PlaceHolder = RemoveHtml($this->Growth->caption());

		// GrowthDATE
		$this->GrowthDATE->EditAttrs["class"] = "form-control";
		$this->GrowthDATE->EditCustomAttributes = "";
		if (!$this->GrowthDATE->Raw)
			$this->GrowthDATE->CurrentValue = HtmlDecode($this->GrowthDATE->CurrentValue);
		$this->GrowthDATE->EditValue = $this->GrowthDATE->CurrentValue;
		$this->GrowthDATE->PlaceHolder = RemoveHtml($this->GrowthDATE->caption());

		// GrowthREPORT
		$this->GrowthREPORT->EditAttrs["class"] = "form-control";
		$this->GrowthREPORT->EditCustomAttributes = "";
		if (!$this->GrowthREPORT->Raw)
			$this->GrowthREPORT->CurrentValue = HtmlDecode($this->GrowthREPORT->CurrentValue);
		$this->GrowthREPORT->EditValue = $this->GrowthREPORT->CurrentValue;
		$this->GrowthREPORT->PlaceHolder = RemoveHtml($this->GrowthREPORT->caption());

		// Growth1
		$this->Growth1->EditAttrs["class"] = "form-control";
		$this->Growth1->EditCustomAttributes = "";
		if (!$this->Growth1->Raw)
			$this->Growth1->CurrentValue = HtmlDecode($this->Growth1->CurrentValue);
		$this->Growth1->EditValue = $this->Growth1->CurrentValue;
		$this->Growth1->PlaceHolder = RemoveHtml($this->Growth1->caption());

		// Growth1DATE
		$this->Growth1DATE->EditAttrs["class"] = "form-control";
		$this->Growth1DATE->EditCustomAttributes = "";
		if (!$this->Growth1DATE->Raw)
			$this->Growth1DATE->CurrentValue = HtmlDecode($this->Growth1DATE->CurrentValue);
		$this->Growth1DATE->EditValue = $this->Growth1DATE->CurrentValue;
		$this->Growth1DATE->PlaceHolder = RemoveHtml($this->Growth1DATE->caption());

		// Growth1REPORT
		$this->Growth1REPORT->EditAttrs["class"] = "form-control";
		$this->Growth1REPORT->EditCustomAttributes = "";
		if (!$this->Growth1REPORT->Raw)
			$this->Growth1REPORT->CurrentValue = HtmlDecode($this->Growth1REPORT->CurrentValue);
		$this->Growth1REPORT->EditValue = $this->Growth1REPORT->CurrentValue;
		$this->Growth1REPORT->PlaceHolder = RemoveHtml($this->Growth1REPORT->caption());

		// ANProfile
		$this->ANProfile->EditAttrs["class"] = "form-control";
		$this->ANProfile->EditCustomAttributes = "";
		if (!$this->ANProfile->Raw)
			$this->ANProfile->CurrentValue = HtmlDecode($this->ANProfile->CurrentValue);
		$this->ANProfile->EditValue = $this->ANProfile->CurrentValue;
		$this->ANProfile->PlaceHolder = RemoveHtml($this->ANProfile->caption());

		// ANProfileDATE
		$this->ANProfileDATE->EditAttrs["class"] = "form-control";
		$this->ANProfileDATE->EditCustomAttributes = "";
		if (!$this->ANProfileDATE->Raw)
			$this->ANProfileDATE->CurrentValue = HtmlDecode($this->ANProfileDATE->CurrentValue);
		$this->ANProfileDATE->EditValue = $this->ANProfileDATE->CurrentValue;
		$this->ANProfileDATE->PlaceHolder = RemoveHtml($this->ANProfileDATE->caption());

		// ANProfileINHOUSE
		$this->ANProfileINHOUSE->EditAttrs["class"] = "form-control";
		$this->ANProfileINHOUSE->EditCustomAttributes = "";
		if (!$this->ANProfileINHOUSE->Raw)
			$this->ANProfileINHOUSE->CurrentValue = HtmlDecode($this->ANProfileINHOUSE->CurrentValue);
		$this->ANProfileINHOUSE->EditValue = $this->ANProfileINHOUSE->CurrentValue;
		$this->ANProfileINHOUSE->PlaceHolder = RemoveHtml($this->ANProfileINHOUSE->caption());

		// ANProfileREPORT
		$this->ANProfileREPORT->EditAttrs["class"] = "form-control";
		$this->ANProfileREPORT->EditCustomAttributes = "";
		if (!$this->ANProfileREPORT->Raw)
			$this->ANProfileREPORT->CurrentValue = HtmlDecode($this->ANProfileREPORT->CurrentValue);
		$this->ANProfileREPORT->EditValue = $this->ANProfileREPORT->CurrentValue;
		$this->ANProfileREPORT->PlaceHolder = RemoveHtml($this->ANProfileREPORT->caption());

		// DualMarker
		$this->DualMarker->EditAttrs["class"] = "form-control";
		$this->DualMarker->EditCustomAttributes = "";
		if (!$this->DualMarker->Raw)
			$this->DualMarker->CurrentValue = HtmlDecode($this->DualMarker->CurrentValue);
		$this->DualMarker->EditValue = $this->DualMarker->CurrentValue;
		$this->DualMarker->PlaceHolder = RemoveHtml($this->DualMarker->caption());

		// DualMarkerDATE
		$this->DualMarkerDATE->EditAttrs["class"] = "form-control";
		$this->DualMarkerDATE->EditCustomAttributes = "";
		if (!$this->DualMarkerDATE->Raw)
			$this->DualMarkerDATE->CurrentValue = HtmlDecode($this->DualMarkerDATE->CurrentValue);
		$this->DualMarkerDATE->EditValue = $this->DualMarkerDATE->CurrentValue;
		$this->DualMarkerDATE->PlaceHolder = RemoveHtml($this->DualMarkerDATE->caption());

		// DualMarkerINHOUSE
		$this->DualMarkerINHOUSE->EditAttrs["class"] = "form-control";
		$this->DualMarkerINHOUSE->EditCustomAttributes = "";
		if (!$this->DualMarkerINHOUSE->Raw)
			$this->DualMarkerINHOUSE->CurrentValue = HtmlDecode($this->DualMarkerINHOUSE->CurrentValue);
		$this->DualMarkerINHOUSE->EditValue = $this->DualMarkerINHOUSE->CurrentValue;
		$this->DualMarkerINHOUSE->PlaceHolder = RemoveHtml($this->DualMarkerINHOUSE->caption());

		// DualMarkerREPORT
		$this->DualMarkerREPORT->EditAttrs["class"] = "form-control";
		$this->DualMarkerREPORT->EditCustomAttributes = "";
		if (!$this->DualMarkerREPORT->Raw)
			$this->DualMarkerREPORT->CurrentValue = HtmlDecode($this->DualMarkerREPORT->CurrentValue);
		$this->DualMarkerREPORT->EditValue = $this->DualMarkerREPORT->CurrentValue;
		$this->DualMarkerREPORT->PlaceHolder = RemoveHtml($this->DualMarkerREPORT->caption());

		// Quadruple
		$this->Quadruple->EditAttrs["class"] = "form-control";
		$this->Quadruple->EditCustomAttributes = "";
		if (!$this->Quadruple->Raw)
			$this->Quadruple->CurrentValue = HtmlDecode($this->Quadruple->CurrentValue);
		$this->Quadruple->EditValue = $this->Quadruple->CurrentValue;
		$this->Quadruple->PlaceHolder = RemoveHtml($this->Quadruple->caption());

		// QuadrupleDATE
		$this->QuadrupleDATE->EditAttrs["class"] = "form-control";
		$this->QuadrupleDATE->EditCustomAttributes = "";
		if (!$this->QuadrupleDATE->Raw)
			$this->QuadrupleDATE->CurrentValue = HtmlDecode($this->QuadrupleDATE->CurrentValue);
		$this->QuadrupleDATE->EditValue = $this->QuadrupleDATE->CurrentValue;
		$this->QuadrupleDATE->PlaceHolder = RemoveHtml($this->QuadrupleDATE->caption());

		// QuadrupleINHOUSE
		$this->QuadrupleINHOUSE->EditAttrs["class"] = "form-control";
		$this->QuadrupleINHOUSE->EditCustomAttributes = "";
		if (!$this->QuadrupleINHOUSE->Raw)
			$this->QuadrupleINHOUSE->CurrentValue = HtmlDecode($this->QuadrupleINHOUSE->CurrentValue);
		$this->QuadrupleINHOUSE->EditValue = $this->QuadrupleINHOUSE->CurrentValue;
		$this->QuadrupleINHOUSE->PlaceHolder = RemoveHtml($this->QuadrupleINHOUSE->caption());

		// QuadrupleREPORT
		$this->QuadrupleREPORT->EditAttrs["class"] = "form-control";
		$this->QuadrupleREPORT->EditCustomAttributes = "";
		if (!$this->QuadrupleREPORT->Raw)
			$this->QuadrupleREPORT->CurrentValue = HtmlDecode($this->QuadrupleREPORT->CurrentValue);
		$this->QuadrupleREPORT->EditValue = $this->QuadrupleREPORT->CurrentValue;
		$this->QuadrupleREPORT->PlaceHolder = RemoveHtml($this->QuadrupleREPORT->caption());

		// A5month
		$this->A5month->EditAttrs["class"] = "form-control";
		$this->A5month->EditCustomAttributes = "";
		if (!$this->A5month->Raw)
			$this->A5month->CurrentValue = HtmlDecode($this->A5month->CurrentValue);
		$this->A5month->EditValue = $this->A5month->CurrentValue;
		$this->A5month->PlaceHolder = RemoveHtml($this->A5month->caption());

		// A5monthDATE
		$this->A5monthDATE->EditAttrs["class"] = "form-control";
		$this->A5monthDATE->EditCustomAttributes = "";
		if (!$this->A5monthDATE->Raw)
			$this->A5monthDATE->CurrentValue = HtmlDecode($this->A5monthDATE->CurrentValue);
		$this->A5monthDATE->EditValue = $this->A5monthDATE->CurrentValue;
		$this->A5monthDATE->PlaceHolder = RemoveHtml($this->A5monthDATE->caption());

		// A5monthINHOUSE
		$this->A5monthINHOUSE->EditAttrs["class"] = "form-control";
		$this->A5monthINHOUSE->EditCustomAttributes = "";
		if (!$this->A5monthINHOUSE->Raw)
			$this->A5monthINHOUSE->CurrentValue = HtmlDecode($this->A5monthINHOUSE->CurrentValue);
		$this->A5monthINHOUSE->EditValue = $this->A5monthINHOUSE->CurrentValue;
		$this->A5monthINHOUSE->PlaceHolder = RemoveHtml($this->A5monthINHOUSE->caption());

		// A5monthREPORT
		$this->A5monthREPORT->EditAttrs["class"] = "form-control";
		$this->A5monthREPORT->EditCustomAttributes = "";
		if (!$this->A5monthREPORT->Raw)
			$this->A5monthREPORT->CurrentValue = HtmlDecode($this->A5monthREPORT->CurrentValue);
		$this->A5monthREPORT->EditValue = $this->A5monthREPORT->CurrentValue;
		$this->A5monthREPORT->PlaceHolder = RemoveHtml($this->A5monthREPORT->caption());

		// A7month
		$this->A7month->EditAttrs["class"] = "form-control";
		$this->A7month->EditCustomAttributes = "";
		if (!$this->A7month->Raw)
			$this->A7month->CurrentValue = HtmlDecode($this->A7month->CurrentValue);
		$this->A7month->EditValue = $this->A7month->CurrentValue;
		$this->A7month->PlaceHolder = RemoveHtml($this->A7month->caption());

		// A7monthDATE
		$this->A7monthDATE->EditAttrs["class"] = "form-control";
		$this->A7monthDATE->EditCustomAttributes = "";
		if (!$this->A7monthDATE->Raw)
			$this->A7monthDATE->CurrentValue = HtmlDecode($this->A7monthDATE->CurrentValue);
		$this->A7monthDATE->EditValue = $this->A7monthDATE->CurrentValue;
		$this->A7monthDATE->PlaceHolder = RemoveHtml($this->A7monthDATE->caption());

		// A7monthINHOUSE
		$this->A7monthINHOUSE->EditAttrs["class"] = "form-control";
		$this->A7monthINHOUSE->EditCustomAttributes = "";
		if (!$this->A7monthINHOUSE->Raw)
			$this->A7monthINHOUSE->CurrentValue = HtmlDecode($this->A7monthINHOUSE->CurrentValue);
		$this->A7monthINHOUSE->EditValue = $this->A7monthINHOUSE->CurrentValue;
		$this->A7monthINHOUSE->PlaceHolder = RemoveHtml($this->A7monthINHOUSE->caption());

		// A7monthREPORT
		$this->A7monthREPORT->EditAttrs["class"] = "form-control";
		$this->A7monthREPORT->EditCustomAttributes = "";
		if (!$this->A7monthREPORT->Raw)
			$this->A7monthREPORT->CurrentValue = HtmlDecode($this->A7monthREPORT->CurrentValue);
		$this->A7monthREPORT->EditValue = $this->A7monthREPORT->CurrentValue;
		$this->A7monthREPORT->PlaceHolder = RemoveHtml($this->A7monthREPORT->caption());

		// A9month
		$this->A9month->EditAttrs["class"] = "form-control";
		$this->A9month->EditCustomAttributes = "";
		if (!$this->A9month->Raw)
			$this->A9month->CurrentValue = HtmlDecode($this->A9month->CurrentValue);
		$this->A9month->EditValue = $this->A9month->CurrentValue;
		$this->A9month->PlaceHolder = RemoveHtml($this->A9month->caption());

		// A9monthDATE
		$this->A9monthDATE->EditAttrs["class"] = "form-control";
		$this->A9monthDATE->EditCustomAttributes = "";
		if (!$this->A9monthDATE->Raw)
			$this->A9monthDATE->CurrentValue = HtmlDecode($this->A9monthDATE->CurrentValue);
		$this->A9monthDATE->EditValue = $this->A9monthDATE->CurrentValue;
		$this->A9monthDATE->PlaceHolder = RemoveHtml($this->A9monthDATE->caption());

		// A9monthINHOUSE
		$this->A9monthINHOUSE->EditAttrs["class"] = "form-control";
		$this->A9monthINHOUSE->EditCustomAttributes = "";
		if (!$this->A9monthINHOUSE->Raw)
			$this->A9monthINHOUSE->CurrentValue = HtmlDecode($this->A9monthINHOUSE->CurrentValue);
		$this->A9monthINHOUSE->EditValue = $this->A9monthINHOUSE->CurrentValue;
		$this->A9monthINHOUSE->PlaceHolder = RemoveHtml($this->A9monthINHOUSE->caption());

		// A9monthREPORT
		$this->A9monthREPORT->EditAttrs["class"] = "form-control";
		$this->A9monthREPORT->EditCustomAttributes = "";
		if (!$this->A9monthREPORT->Raw)
			$this->A9monthREPORT->CurrentValue = HtmlDecode($this->A9monthREPORT->CurrentValue);
		$this->A9monthREPORT->EditValue = $this->A9monthREPORT->CurrentValue;
		$this->A9monthREPORT->PlaceHolder = RemoveHtml($this->A9monthREPORT->caption());

		// INJ
		$this->INJ->EditAttrs["class"] = "form-control";
		$this->INJ->EditCustomAttributes = "";
		if (!$this->INJ->Raw)
			$this->INJ->CurrentValue = HtmlDecode($this->INJ->CurrentValue);
		$this->INJ->EditValue = $this->INJ->CurrentValue;
		$this->INJ->PlaceHolder = RemoveHtml($this->INJ->caption());

		// INJDATE
		$this->INJDATE->EditAttrs["class"] = "form-control";
		$this->INJDATE->EditCustomAttributes = "";
		if (!$this->INJDATE->Raw)
			$this->INJDATE->CurrentValue = HtmlDecode($this->INJDATE->CurrentValue);
		$this->INJDATE->EditValue = $this->INJDATE->CurrentValue;
		$this->INJDATE->PlaceHolder = RemoveHtml($this->INJDATE->caption());

		// INJINHOUSE
		$this->INJINHOUSE->EditAttrs["class"] = "form-control";
		$this->INJINHOUSE->EditCustomAttributes = "";
		if (!$this->INJINHOUSE->Raw)
			$this->INJINHOUSE->CurrentValue = HtmlDecode($this->INJINHOUSE->CurrentValue);
		$this->INJINHOUSE->EditValue = $this->INJINHOUSE->CurrentValue;
		$this->INJINHOUSE->PlaceHolder = RemoveHtml($this->INJINHOUSE->caption());

		// INJREPORT
		$this->INJREPORT->EditAttrs["class"] = "form-control";
		$this->INJREPORT->EditCustomAttributes = "";
		if (!$this->INJREPORT->Raw)
			$this->INJREPORT->CurrentValue = HtmlDecode($this->INJREPORT->CurrentValue);
		$this->INJREPORT->EditValue = $this->INJREPORT->CurrentValue;
		$this->INJREPORT->PlaceHolder = RemoveHtml($this->INJREPORT->caption());

		// Bleeding
		$this->Bleeding->EditCustomAttributes = "";
		$this->Bleeding->EditValue = $this->Bleeding->options(FALSE);

		// Hypothyroidism
		$this->Hypothyroidism->EditAttrs["class"] = "form-control";
		$this->Hypothyroidism->EditCustomAttributes = "";
		if (!$this->Hypothyroidism->Raw)
			$this->Hypothyroidism->CurrentValue = HtmlDecode($this->Hypothyroidism->CurrentValue);
		$this->Hypothyroidism->EditValue = $this->Hypothyroidism->CurrentValue;
		$this->Hypothyroidism->PlaceHolder = RemoveHtml($this->Hypothyroidism->caption());

		// PICMENumber
		$this->PICMENumber->EditAttrs["class"] = "form-control";
		$this->PICMENumber->EditCustomAttributes = "";
		if (!$this->PICMENumber->Raw)
			$this->PICMENumber->CurrentValue = HtmlDecode($this->PICMENumber->CurrentValue);
		$this->PICMENumber->EditValue = $this->PICMENumber->CurrentValue;
		$this->PICMENumber->PlaceHolder = RemoveHtml($this->PICMENumber->caption());

		// Outcome
		$this->Outcome->EditAttrs["class"] = "form-control";
		$this->Outcome->EditCustomAttributes = "";
		if (!$this->Outcome->Raw)
			$this->Outcome->CurrentValue = HtmlDecode($this->Outcome->CurrentValue);
		$this->Outcome->EditValue = $this->Outcome->CurrentValue;
		$this->Outcome->PlaceHolder = RemoveHtml($this->Outcome->caption());

		// DateofAdmission
		$this->DateofAdmission->EditAttrs["class"] = "form-control";
		$this->DateofAdmission->EditCustomAttributes = "";
		if (!$this->DateofAdmission->Raw)
			$this->DateofAdmission->CurrentValue = HtmlDecode($this->DateofAdmission->CurrentValue);
		$this->DateofAdmission->EditValue = $this->DateofAdmission->CurrentValue;
		$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

		// DateodProcedure
		$this->DateodProcedure->EditAttrs["class"] = "form-control";
		$this->DateodProcedure->EditCustomAttributes = "";
		if (!$this->DateodProcedure->Raw)
			$this->DateodProcedure->CurrentValue = HtmlDecode($this->DateodProcedure->CurrentValue);
		$this->DateodProcedure->EditValue = $this->DateodProcedure->CurrentValue;
		$this->DateodProcedure->PlaceHolder = RemoveHtml($this->DateodProcedure->caption());

		// Miscarriage
		$this->Miscarriage->EditAttrs["class"] = "form-control";
		$this->Miscarriage->EditCustomAttributes = "";
		$this->Miscarriage->EditValue = $this->Miscarriage->options(TRUE);

		// ModeOfDelivery
		$this->ModeOfDelivery->EditAttrs["class"] = "form-control";
		$this->ModeOfDelivery->EditCustomAttributes = "";
		$this->ModeOfDelivery->EditValue = $this->ModeOfDelivery->options(TRUE);

		// ND
		$this->ND->EditAttrs["class"] = "form-control";
		$this->ND->EditCustomAttributes = "";
		if (!$this->ND->Raw)
			$this->ND->CurrentValue = HtmlDecode($this->ND->CurrentValue);
		$this->ND->EditValue = $this->ND->CurrentValue;
		$this->ND->PlaceHolder = RemoveHtml($this->ND->caption());

		// NDS
		$this->NDS->EditAttrs["class"] = "form-control";
		$this->NDS->EditCustomAttributes = "";
		$this->NDS->EditValue = $this->NDS->options(TRUE);

		// NDP
		$this->NDP->EditAttrs["class"] = "form-control";
		$this->NDP->EditCustomAttributes = "";
		$this->NDP->EditValue = $this->NDP->options(TRUE);

		// Vaccum
		$this->Vaccum->EditAttrs["class"] = "form-control";
		$this->Vaccum->EditCustomAttributes = "";
		if (!$this->Vaccum->Raw)
			$this->Vaccum->CurrentValue = HtmlDecode($this->Vaccum->CurrentValue);
		$this->Vaccum->EditValue = $this->Vaccum->CurrentValue;
		$this->Vaccum->PlaceHolder = RemoveHtml($this->Vaccum->caption());

		// VaccumS
		$this->VaccumS->EditAttrs["class"] = "form-control";
		$this->VaccumS->EditCustomAttributes = "";
		$this->VaccumS->EditValue = $this->VaccumS->options(TRUE);

		// VaccumP
		$this->VaccumP->EditAttrs["class"] = "form-control";
		$this->VaccumP->EditCustomAttributes = "";
		$this->VaccumP->EditValue = $this->VaccumP->options(TRUE);

		// Forceps
		$this->Forceps->EditAttrs["class"] = "form-control";
		$this->Forceps->EditCustomAttributes = "";
		if (!$this->Forceps->Raw)
			$this->Forceps->CurrentValue = HtmlDecode($this->Forceps->CurrentValue);
		$this->Forceps->EditValue = $this->Forceps->CurrentValue;
		$this->Forceps->PlaceHolder = RemoveHtml($this->Forceps->caption());

		// ForcepsS
		$this->ForcepsS->EditAttrs["class"] = "form-control";
		$this->ForcepsS->EditCustomAttributes = "";
		$this->ForcepsS->EditValue = $this->ForcepsS->options(TRUE);

		// ForcepsP
		$this->ForcepsP->EditAttrs["class"] = "form-control";
		$this->ForcepsP->EditCustomAttributes = "";
		$this->ForcepsP->EditValue = $this->ForcepsP->options(TRUE);

		// Elective
		$this->Elective->EditAttrs["class"] = "form-control";
		$this->Elective->EditCustomAttributes = "";
		if (!$this->Elective->Raw)
			$this->Elective->CurrentValue = HtmlDecode($this->Elective->CurrentValue);
		$this->Elective->EditValue = $this->Elective->CurrentValue;
		$this->Elective->PlaceHolder = RemoveHtml($this->Elective->caption());

		// ElectiveS
		$this->ElectiveS->EditAttrs["class"] = "form-control";
		$this->ElectiveS->EditCustomAttributes = "";
		$this->ElectiveS->EditValue = $this->ElectiveS->options(TRUE);

		// ElectiveP
		$this->ElectiveP->EditAttrs["class"] = "form-control";
		$this->ElectiveP->EditCustomAttributes = "";
		$this->ElectiveP->EditValue = $this->ElectiveP->options(TRUE);

		// Emergency
		$this->Emergency->EditAttrs["class"] = "form-control";
		$this->Emergency->EditCustomAttributes = "";
		if (!$this->Emergency->Raw)
			$this->Emergency->CurrentValue = HtmlDecode($this->Emergency->CurrentValue);
		$this->Emergency->EditValue = $this->Emergency->CurrentValue;
		$this->Emergency->PlaceHolder = RemoveHtml($this->Emergency->caption());

		// EmergencyS
		$this->EmergencyS->EditAttrs["class"] = "form-control";
		$this->EmergencyS->EditCustomAttributes = "";
		$this->EmergencyS->EditValue = $this->EmergencyS->options(TRUE);

		// EmergencyP
		$this->EmergencyP->EditAttrs["class"] = "form-control";
		$this->EmergencyP->EditCustomAttributes = "";
		$this->EmergencyP->EditValue = $this->EmergencyP->options(TRUE);

		// Maturity
		$this->Maturity->EditAttrs["class"] = "form-control";
		$this->Maturity->EditCustomAttributes = "";
		$this->Maturity->EditValue = $this->Maturity->options(TRUE);

		// Baby1
		$this->Baby1->EditAttrs["class"] = "form-control";
		$this->Baby1->EditCustomAttributes = "";
		if (!$this->Baby1->Raw)
			$this->Baby1->CurrentValue = HtmlDecode($this->Baby1->CurrentValue);
		$this->Baby1->EditValue = $this->Baby1->CurrentValue;
		$this->Baby1->PlaceHolder = RemoveHtml($this->Baby1->caption());

		// Baby2
		$this->Baby2->EditAttrs["class"] = "form-control";
		$this->Baby2->EditCustomAttributes = "";
		if (!$this->Baby2->Raw)
			$this->Baby2->CurrentValue = HtmlDecode($this->Baby2->CurrentValue);
		$this->Baby2->EditValue = $this->Baby2->CurrentValue;
		$this->Baby2->PlaceHolder = RemoveHtml($this->Baby2->caption());

		// sex1
		$this->sex1->EditAttrs["class"] = "form-control";
		$this->sex1->EditCustomAttributes = "";
		if (!$this->sex1->Raw)
			$this->sex1->CurrentValue = HtmlDecode($this->sex1->CurrentValue);
		$this->sex1->EditValue = $this->sex1->CurrentValue;
		$this->sex1->PlaceHolder = RemoveHtml($this->sex1->caption());

		// sex2
		$this->sex2->EditAttrs["class"] = "form-control";
		$this->sex2->EditCustomAttributes = "";
		if (!$this->sex2->Raw)
			$this->sex2->CurrentValue = HtmlDecode($this->sex2->CurrentValue);
		$this->sex2->EditValue = $this->sex2->CurrentValue;
		$this->sex2->PlaceHolder = RemoveHtml($this->sex2->caption());

		// weight1
		$this->weight1->EditAttrs["class"] = "form-control";
		$this->weight1->EditCustomAttributes = "";
		if (!$this->weight1->Raw)
			$this->weight1->CurrentValue = HtmlDecode($this->weight1->CurrentValue);
		$this->weight1->EditValue = $this->weight1->CurrentValue;
		$this->weight1->PlaceHolder = RemoveHtml($this->weight1->caption());

		// weight2
		$this->weight2->EditAttrs["class"] = "form-control";
		$this->weight2->EditCustomAttributes = "";
		if (!$this->weight2->Raw)
			$this->weight2->CurrentValue = HtmlDecode($this->weight2->CurrentValue);
		$this->weight2->EditValue = $this->weight2->CurrentValue;
		$this->weight2->PlaceHolder = RemoveHtml($this->weight2->caption());

		// NICU1
		$this->NICU1->EditAttrs["class"] = "form-control";
		$this->NICU1->EditCustomAttributes = "";
		if (!$this->NICU1->Raw)
			$this->NICU1->CurrentValue = HtmlDecode($this->NICU1->CurrentValue);
		$this->NICU1->EditValue = $this->NICU1->CurrentValue;
		$this->NICU1->PlaceHolder = RemoveHtml($this->NICU1->caption());

		// NICU2
		$this->NICU2->EditAttrs["class"] = "form-control";
		$this->NICU2->EditCustomAttributes = "";
		if (!$this->NICU2->Raw)
			$this->NICU2->CurrentValue = HtmlDecode($this->NICU2->CurrentValue);
		$this->NICU2->EditValue = $this->NICU2->CurrentValue;
		$this->NICU2->PlaceHolder = RemoveHtml($this->NICU2->caption());

		// Jaundice1
		$this->Jaundice1->EditAttrs["class"] = "form-control";
		$this->Jaundice1->EditCustomAttributes = "";
		if (!$this->Jaundice1->Raw)
			$this->Jaundice1->CurrentValue = HtmlDecode($this->Jaundice1->CurrentValue);
		$this->Jaundice1->EditValue = $this->Jaundice1->CurrentValue;
		$this->Jaundice1->PlaceHolder = RemoveHtml($this->Jaundice1->caption());

		// Jaundice2
		$this->Jaundice2->EditAttrs["class"] = "form-control";
		$this->Jaundice2->EditCustomAttributes = "";
		if (!$this->Jaundice2->Raw)
			$this->Jaundice2->CurrentValue = HtmlDecode($this->Jaundice2->CurrentValue);
		$this->Jaundice2->EditValue = $this->Jaundice2->CurrentValue;
		$this->Jaundice2->PlaceHolder = RemoveHtml($this->Jaundice2->caption());

		// Others1
		$this->Others1->EditAttrs["class"] = "form-control";
		$this->Others1->EditCustomAttributes = "";
		if (!$this->Others1->Raw)
			$this->Others1->CurrentValue = HtmlDecode($this->Others1->CurrentValue);
		$this->Others1->EditValue = $this->Others1->CurrentValue;
		$this->Others1->PlaceHolder = RemoveHtml($this->Others1->caption());

		// Others2
		$this->Others2->EditAttrs["class"] = "form-control";
		$this->Others2->EditCustomAttributes = "";
		if (!$this->Others2->Raw)
			$this->Others2->CurrentValue = HtmlDecode($this->Others2->CurrentValue);
		$this->Others2->EditValue = $this->Others2->CurrentValue;
		$this->Others2->PlaceHolder = RemoveHtml($this->Others2->caption());

		// SpillOverReasons
		$this->SpillOverReasons->EditAttrs["class"] = "form-control";
		$this->SpillOverReasons->EditCustomAttributes = "";
		$this->SpillOverReasons->EditValue = $this->SpillOverReasons->options(TRUE);

		// ANClosed
		$this->ANClosed->EditCustomAttributes = "";
		$this->ANClosed->EditValue = $this->ANClosed->options(FALSE);

		// ANClosedDATE
		$this->ANClosedDATE->EditAttrs["class"] = "form-control";
		$this->ANClosedDATE->EditCustomAttributes = "";
		if (!$this->ANClosedDATE->Raw)
			$this->ANClosedDATE->CurrentValue = HtmlDecode($this->ANClosedDATE->CurrentValue);
		$this->ANClosedDATE->EditValue = $this->ANClosedDATE->CurrentValue;
		$this->ANClosedDATE->PlaceHolder = RemoveHtml($this->ANClosedDATE->caption());

		// PastMedicalHistoryOthers
		$this->PastMedicalHistoryOthers->EditAttrs["class"] = "form-control";
		$this->PastMedicalHistoryOthers->EditCustomAttributes = "";
		if (!$this->PastMedicalHistoryOthers->Raw)
			$this->PastMedicalHistoryOthers->CurrentValue = HtmlDecode($this->PastMedicalHistoryOthers->CurrentValue);
		$this->PastMedicalHistoryOthers->EditValue = $this->PastMedicalHistoryOthers->CurrentValue;
		$this->PastMedicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastMedicalHistoryOthers->caption());

		// PastSurgicalHistoryOthers
		$this->PastSurgicalHistoryOthers->EditAttrs["class"] = "form-control";
		$this->PastSurgicalHistoryOthers->EditCustomAttributes = "";
		if (!$this->PastSurgicalHistoryOthers->Raw)
			$this->PastSurgicalHistoryOthers->CurrentValue = HtmlDecode($this->PastSurgicalHistoryOthers->CurrentValue);
		$this->PastSurgicalHistoryOthers->EditValue = $this->PastSurgicalHistoryOthers->CurrentValue;
		$this->PastSurgicalHistoryOthers->PlaceHolder = RemoveHtml($this->PastSurgicalHistoryOthers->caption());

		// FamilyHistoryOthers
		$this->FamilyHistoryOthers->EditAttrs["class"] = "form-control";
		$this->FamilyHistoryOthers->EditCustomAttributes = "";
		if (!$this->FamilyHistoryOthers->Raw)
			$this->FamilyHistoryOthers->CurrentValue = HtmlDecode($this->FamilyHistoryOthers->CurrentValue);
		$this->FamilyHistoryOthers->EditValue = $this->FamilyHistoryOthers->CurrentValue;
		$this->FamilyHistoryOthers->PlaceHolder = RemoveHtml($this->FamilyHistoryOthers->caption());

		// PresentPregnancyComplicationsOthers
		$this->PresentPregnancyComplicationsOthers->EditAttrs["class"] = "form-control";
		$this->PresentPregnancyComplicationsOthers->EditCustomAttributes = "";
		if (!$this->PresentPregnancyComplicationsOthers->Raw)
			$this->PresentPregnancyComplicationsOthers->CurrentValue = HtmlDecode($this->PresentPregnancyComplicationsOthers->CurrentValue);
		$this->PresentPregnancyComplicationsOthers->EditValue = $this->PresentPregnancyComplicationsOthers->CurrentValue;
		$this->PresentPregnancyComplicationsOthers->PlaceHolder = RemoveHtml($this->PresentPregnancyComplicationsOthers->caption());

		// ETdate
		$this->ETdate->EditAttrs["class"] = "form-control";
		$this->ETdate->EditCustomAttributes = "";
		if (!$this->ETdate->Raw)
			$this->ETdate->CurrentValue = HtmlDecode($this->ETdate->CurrentValue);
		$this->ETdate->EditValue = $this->ETdate->CurrentValue;
		$this->ETdate->PlaceHolder = RemoveHtml($this->ETdate->caption());

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