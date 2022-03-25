<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_template_for_opu
 */
class view_template_for_opu extends DbTable
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
	public $R_OVARY;
	public $R_AFC;
	public $L_OVARY;
	public $L_AFC;
	public $LH1;
	public $E2;
	public $StemCellInstallation;
	public $DHEAS;
	public $Mtorr;
	public $AMH1;
	public $LH;
	public $BMI28MALE29;
	public $MaleMedicalConditions;
	public $MaleExamination;
	public $SpermConcentration;
	public $SpermMotility28P26NP29;
	public $SpermMorphology;
	public $SpermRetrival;
	public $M_Testosterone;
	public $DFI;
	public $PreRX;
	public $CC_100;
	public $RFSH1A;
	public $HMG1;
	public $RLH;
	public $HMG_HP;
	public $day_of_HMG;
	public $Reason_for_HMG;
	public $RLH_day;
	public $DAYSOFSTIMULATION;
	public $Any_change_inbetween_28_Dose_added_2C_day29;
	public $day_of_Anta;
	public $R_FSH_TD;
	public $R_FSH_2B_HMG_TD;
	public $R_FSH_2B_R_LH_TD;
	public $HMG_TD;
	public $LH_TD;
	public $D1_LH;
	public $D1_E2;
	public $Trigger_day_E2;
	public $Trigger_day_P4;
	public $Trigger_day_LH;
	public $VIT_D;
	public $TRIGGERR;
	public $BHCG_BEFORE_RETRIEVAL;
	public $LH__12_HRS;
	public $P4__12_HRS;
	public $ET_on_hCG_day;
	public $ET_doppler;
	public $VI2FFI2FVFI;
	public $Endometrial_abnormality;
	public $AFC_ON_S1;
	public $TIME_OF_OPU_FROM_TRIGGER;
	public $SPERM_TYPE;
	public $EXPECTED_ON_TRIGGER_DAY;
	public $OOCYTES_RETRIEVED;
	public $TIME_OF_DENUDATION;
	public $M_II;
	public $MI;
	public $GV;
	public $ICSI_TIME_FORM_OPU;
	public $FERT_28_2_PN_29;
	public $DEG;
	public $D3_GRADE_A;
	public $D3_GRADE_B;
	public $D3_GRADE_C;
	public $D3_GRADE_D;
	public $USABLE_ON_DAY_3_ET;
	public $USABLE_ON_day_3_FREEZING;
	public $D5_GARDE_A;
	public $D5_GRADE_B;
	public $D5_GRADE_C;
	public $D5_GRADE_D;
	public $USABLE_ON_D5_ET;
	public $USABLE_ON_D5_FREEZING;
	public $D6_GRADE_A;
	public $D6_GRADE_B;
	public $D6_GRADE_C;
	public $D6_GRADE_D;
	public $D6_USABLE_EMBRYO_ET;
	public $D6_USABLE_FREEZING;
	public $TOTAL_BLAST;
	public $PGS;
	public $REMARKS;
	public $PU___D2FB;
	public $ICSI_D2FB;
	public $VIT_D2FB;
	public $ET_D2FB;
	public $LAB_COMMENTS;
	public $Reason_for_no_FRESH_transfer;
	public $No_of_embryos_transferred_Day_32F52C_A2CB2CC;
	public $EMBRYOS_PENDING;
	public $DAY_OF_TRANSFER;
	public $H2FD_sperm;
	public $Comments;
	public $sc_progesterone;
	public $Natural_micronised_400mg_bd_2B_duphaston_10mg_bd;
	public $CRINONE;
	public $progynova;
	public $Heparin;
	public $cabergolin;
	public $Antagonist;
	public $OHSS;
	public $Complications;
	public $LP_bleeding;
	public $DF_hCG;
	public $Implantation_rate;
	public $Ectopic;
	public $Type_of_preg;
	public $ANC;
	public $anomalies;
	public $baby_wt;
	public $GA_at_delivery;
	public $Pregnancy_outcome;
	public $_1st_FET;
	public $AFTER_HYSTEROSCOPY;
	public $AFTER_ERA;
	public $ERA;
	public $HRT;
	public $XGRAST2FPRP;
	public $EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C;
	public $LMWH_40MG;
	public $DF_hCG2;
	public $Implantation_rate1;
	public $Ectopic1;
	public $Type_of_pregA;
	public $ANC1;
	public $anomalies2;
	public $baby_wt2;
	public $GA_at_delivery1;
	public $Pregnancy_outcome1;
	public $_2ND_FET;
	public $AFTER_HYSTEROSCOPY1;
	public $AFTER_ERA1;
	public $ERA1;
	public $HRT1;
	public $XGRAST2FPRP1;
	public $NUMBER_OF_EMBRYOS;
	public $EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C;
	public $INTRALIPID_AND_BARGLOBIN;
	public $LMWH_40MG1;
	public $DF_hCG1;
	public $Implantation_rate2;
	public $Ectopic2;
	public $Type_of_preg2;
	public $ANCA;
	public $anomalies1;
	public $baby_wt1;
	public $GA_at_delivery2;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_template_for_opu';
		$this->TableName = 'view_template_for_opu';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_template_for_opu`";
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
		$this->id = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Treatment
		$this->Treatment = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->fields['Treatment'] = &$this->Treatment;

		// Origin
		$this->Origin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, -1, FALSE, '`Origin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Origin->Sortable = TRUE; // Allow sort
		$this->fields['Origin'] = &$this->Origin;

		// MaleIndications
		$this->MaleIndications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleIndications', 'MaleIndications', '`MaleIndications`', '`MaleIndications`', 200, -1, FALSE, '`MaleIndications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaleIndications->Sortable = TRUE; // Allow sort
		$this->fields['MaleIndications'] = &$this->MaleIndications;

		// FemaleIndications
		$this->FemaleIndications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FemaleIndications', 'FemaleIndications', '`FemaleIndications`', '`FemaleIndications`', 200, -1, FALSE, '`FemaleIndications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FemaleIndications->Sortable = TRUE; // Allow sort
		$this->fields['FemaleIndications'] = &$this->FemaleIndications;

		// PatientName
		$this->PatientName = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// PatientID
		$this->PatientID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PartnerName
		$this->PartnerName = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerID
		$this->PartnerID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// A4ICSICycle
		$this->A4ICSICycle = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_A4ICSICycle', 'A4ICSICycle', '`A4ICSICycle`', '`A4ICSICycle`', 200, -1, FALSE, '`A4ICSICycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->A4ICSICycle->Sortable = TRUE; // Allow sort
		$this->fields['A4ICSICycle'] = &$this->A4ICSICycle;

		// TotalICSICycle
		$this->TotalICSICycle = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TotalICSICycle', 'TotalICSICycle', '`TotalICSICycle`', '`TotalICSICycle`', 200, -1, FALSE, '`TotalICSICycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalICSICycle->Sortable = TRUE; // Allow sort
		$this->fields['TotalICSICycle'] = &$this->TotalICSICycle;

		// TypeOfInfertility
		$this->TypeOfInfertility = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TypeOfInfertility', 'TypeOfInfertility', '`TypeOfInfertility`', '`TypeOfInfertility`', 200, -1, FALSE, '`TypeOfInfertility`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypeOfInfertility->Sortable = TRUE; // Allow sort
		$this->fields['TypeOfInfertility'] = &$this->TypeOfInfertility;

		// RelevantHistory
		$this->RelevantHistory = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RelevantHistory', 'RelevantHistory', '`RelevantHistory`', '`RelevantHistory`', 200, -1, FALSE, '`RelevantHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RelevantHistory->Sortable = TRUE; // Allow sort
		$this->fields['RelevantHistory'] = &$this->RelevantHistory;

		// IUICycles
		$this->IUICycles = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_IUICycles', 'IUICycles', '`IUICycles`', '`IUICycles`', 200, -1, FALSE, '`IUICycles`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUICycles->Sortable = TRUE; // Allow sort
		$this->fields['IUICycles'] = &$this->IUICycles;

		// AMH
		$this->AMH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AMH', 'AMH', '`AMH`', '`AMH`', 200, -1, FALSE, '`AMH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AMH->Sortable = TRUE; // Allow sort
		$this->fields['AMH'] = &$this->AMH;

		// FBMI
		$this->FBMI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, -1, FALSE, '`FBMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBMI->Sortable = TRUE; // Allow sort
		$this->fields['FBMI'] = &$this->FBMI;

		// ANTAGONISTSTARTDAY
		$this->ANTAGONISTSTARTDAY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANTAGONISTSTARTDAY', 'ANTAGONISTSTARTDAY', '`ANTAGONISTSTARTDAY`', '`ANTAGONISTSTARTDAY`', 200, -1, FALSE, '`ANTAGONISTSTARTDAY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANTAGONISTSTARTDAY->Sortable = TRUE; // Allow sort
		$this->fields['ANTAGONISTSTARTDAY'] = &$this->ANTAGONISTSTARTDAY;

		// OvarianSurgery
		$this->OvarianSurgery = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OvarianSurgery', 'OvarianSurgery', '`OvarianSurgery`', '`OvarianSurgery`', 200, -1, FALSE, '`OvarianSurgery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OvarianSurgery->Sortable = TRUE; // Allow sort
		$this->fields['OvarianSurgery'] = &$this->OvarianSurgery;

		// OPUDATE
		$this->OPUDATE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OPUDATE', 'OPUDATE', '`OPUDATE`', CastDateFieldForLike('`OPUDATE`', 0, "DB"), 135, 0, FALSE, '`OPUDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPUDATE->Sortable = TRUE; // Allow sort
		$this->OPUDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['OPUDATE'] = &$this->OPUDATE;

		// RFSH1
		$this->RFSH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH1', 'RFSH1', '`RFSH1`', '`RFSH1`', 200, -1, FALSE, '`RFSH1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RFSH1->Sortable = TRUE; // Allow sort
		$this->fields['RFSH1'] = &$this->RFSH1;

		// RFSH2
		$this->RFSH2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH2', 'RFSH2', '`RFSH2`', '`RFSH2`', 200, -1, FALSE, '`RFSH2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RFSH2->Sortable = TRUE; // Allow sort
		$this->fields['RFSH2'] = &$this->RFSH2;

		// RFSH3
		$this->RFSH3 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH3', 'RFSH3', '`RFSH3`', '`RFSH3`', 200, -1, FALSE, '`RFSH3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RFSH3->Sortable = TRUE; // Allow sort
		$this->fields['RFSH3'] = &$this->RFSH3;

		// E21
		$this->E21 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_E21', 'E21', '`E21`', '`E21`', 200, -1, FALSE, '`E21`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->E21->Sortable = TRUE; // Allow sort
		$this->fields['E21'] = &$this->E21;

		// Hysteroscopy
		$this->Hysteroscopy = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Hysteroscopy', 'Hysteroscopy', '`Hysteroscopy`', '`Hysteroscopy`', 200, -1, FALSE, '`Hysteroscopy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Hysteroscopy->Sortable = TRUE; // Allow sort
		$this->fields['Hysteroscopy'] = &$this->Hysteroscopy;

		// HospID
		$this->HospID = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// Fweight
		$this->Fweight = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Fweight', 'Fweight', '`Fweight`', '`Fweight`', 200, -1, FALSE, '`Fweight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fweight->Sortable = TRUE; // Allow sort
		$this->fields['Fweight'] = &$this->Fweight;

		// AntiTPO
		$this->AntiTPO = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AntiTPO', 'AntiTPO', '`AntiTPO`', '`AntiTPO`', 200, -1, FALSE, '`AntiTPO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AntiTPO->Sortable = TRUE; // Allow sort
		$this->fields['AntiTPO'] = &$this->AntiTPO;

		// AntiTG
		$this->AntiTG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AntiTG', 'AntiTG', '`AntiTG`', '`AntiTG`', 200, -1, FALSE, '`AntiTG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AntiTG->Sortable = TRUE; // Allow sort
		$this->fields['AntiTG'] = &$this->AntiTG;

		// PatientAge
		$this->PatientAge = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PatientAge', 'PatientAge', '`PatientAge`', '`PatientAge`', 200, -1, FALSE, '`PatientAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientAge->Sortable = TRUE; // Allow sort
		$this->fields['PatientAge'] = &$this->PatientAge;

		// PartnerAge
		$this->PartnerAge = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PartnerAge', 'PartnerAge', '`PartnerAge`', '`PartnerAge`', 200, -1, FALSE, '`PartnerAge`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerAge->Sortable = TRUE; // Allow sort
		$this->fields['PartnerAge'] = &$this->PartnerAge;

		// CYCLES
		$this->CYCLES = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CYCLES', 'CYCLES', '`CYCLES`', '`CYCLES`', 201, -1, FALSE, '`CYCLES`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->CYCLES->Nullable = FALSE; // NOT NULL field
		$this->CYCLES->Required = TRUE; // Required field
		$this->CYCLES->Sortable = TRUE; // Allow sort
		$this->fields['CYCLES'] = &$this->CYCLES;

		// MF
		$this->MF = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MF', 'MF', '`MF`', '`MF`', 201, -1, FALSE, '`MF`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MF->Nullable = FALSE; // NOT NULL field
		$this->MF->Required = TRUE; // Required field
		$this->MF->Sortable = TRUE; // Allow sort
		$this->fields['MF'] = &$this->MF;

		// CauseOfINFERTILITY
		$this->CauseOfINFERTILITY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CauseOfINFERTILITY', 'CauseOfINFERTILITY', '`CauseOfINFERTILITY`', '`CauseOfINFERTILITY`', 201, -1, FALSE, '`CauseOfINFERTILITY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->CauseOfINFERTILITY->Nullable = FALSE; // NOT NULL field
		$this->CauseOfINFERTILITY->Required = TRUE; // Required field
		$this->CauseOfINFERTILITY->Sortable = TRUE; // Allow sort
		$this->fields['CauseOfINFERTILITY'] = &$this->CauseOfINFERTILITY;

		// SIS
		$this->SIS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SIS', 'SIS', '`SIS`', '`SIS`', 201, -1, FALSE, '`SIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SIS->Nullable = FALSE; // NOT NULL field
		$this->SIS->Required = TRUE; // Required field
		$this->SIS->Sortable = TRUE; // Allow sort
		$this->fields['SIS'] = &$this->SIS;

		// Scratching
		$this->Scratching = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Scratching', 'Scratching', '`Scratching`', '`Scratching`', 201, -1, FALSE, '`Scratching`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Scratching->Nullable = FALSE; // NOT NULL field
		$this->Scratching->Required = TRUE; // Required field
		$this->Scratching->Sortable = TRUE; // Allow sort
		$this->fields['Scratching'] = &$this->Scratching;

		// Cannulation
		$this->Cannulation = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Cannulation', 'Cannulation', '`Cannulation`', '`Cannulation`', 201, -1, FALSE, '`Cannulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Cannulation->Nullable = FALSE; // NOT NULL field
		$this->Cannulation->Required = TRUE; // Required field
		$this->Cannulation->Sortable = TRUE; // Allow sort
		$this->fields['Cannulation'] = &$this->Cannulation;

		// MEPRATE
		$this->MEPRATE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MEPRATE', 'MEPRATE', '`MEPRATE`', '`MEPRATE`', 201, -1, FALSE, '`MEPRATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MEPRATE->Nullable = FALSE; // NOT NULL field
		$this->MEPRATE->Required = TRUE; // Required field
		$this->MEPRATE->Sortable = TRUE; // Allow sort
		$this->fields['MEPRATE'] = &$this->MEPRATE;

		// R.OVARY
		$this->R_OVARY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_R_OVARY', 'R.OVARY', '`R.OVARY`', '`R.OVARY`', 200, -1, FALSE, '`R.OVARY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->R_OVARY->Sortable = TRUE; // Allow sort
		$this->fields['R.OVARY'] = &$this->R_OVARY;

		// R.AFC
		$this->R_AFC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_R_AFC', 'R.AFC', '`R.AFC`', '`R.AFC`', 200, -1, FALSE, '`R.AFC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->R_AFC->Sortable = TRUE; // Allow sort
		$this->fields['R.AFC'] = &$this->R_AFC;

		// L.OVARY
		$this->L_OVARY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_L_OVARY', 'L.OVARY', '`L.OVARY`', '`L.OVARY`', 200, -1, FALSE, '`L.OVARY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L_OVARY->Sortable = TRUE; // Allow sort
		$this->fields['L.OVARY'] = &$this->L_OVARY;

		// L.AFC
		$this->L_AFC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_L_AFC', 'L.AFC', '`L.AFC`', '`L.AFC`', 200, -1, FALSE, '`L.AFC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->L_AFC->Sortable = TRUE; // Allow sort
		$this->fields['L.AFC'] = &$this->L_AFC;

		// LH1
		$this->LH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH1', 'LH1', '`LH1`', '`LH1`', 201, -1, FALSE, '`LH1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LH1->Nullable = FALSE; // NOT NULL field
		$this->LH1->Required = TRUE; // Required field
		$this->LH1->Sortable = TRUE; // Allow sort
		$this->fields['LH1'] = &$this->LH1;

		// E2
		$this->E2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_E2', 'E2', '`E2`', '`E2`', 200, -1, FALSE, '`E2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->E2->Sortable = TRUE; // Allow sort
		$this->fields['E2'] = &$this->E2;

		// StemCellInstallation
		$this->StemCellInstallation = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_StemCellInstallation', 'StemCellInstallation', '`StemCellInstallation`', '`StemCellInstallation`', 201, -1, FALSE, '`StemCellInstallation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->StemCellInstallation->Nullable = FALSE; // NOT NULL field
		$this->StemCellInstallation->Required = TRUE; // Required field
		$this->StemCellInstallation->Sortable = TRUE; // Allow sort
		$this->fields['StemCellInstallation'] = &$this->StemCellInstallation;

		// DHEAS
		$this->DHEAS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DHEAS', 'DHEAS', '`DHEAS`', '`DHEAS`', 201, -1, FALSE, '`DHEAS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DHEAS->Nullable = FALSE; // NOT NULL field
		$this->DHEAS->Required = TRUE; // Required field
		$this->DHEAS->Sortable = TRUE; // Allow sort
		$this->fields['DHEAS'] = &$this->DHEAS;

		// Mtorr
		$this->Mtorr = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Mtorr', 'Mtorr', '`Mtorr`', '`Mtorr`', 201, -1, FALSE, '`Mtorr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Mtorr->Nullable = FALSE; // NOT NULL field
		$this->Mtorr->Required = TRUE; // Required field
		$this->Mtorr->Sortable = TRUE; // Allow sort
		$this->fields['Mtorr'] = &$this->Mtorr;

		// AMH1
		$this->AMH1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AMH1', 'AMH1', '`AMH1`', '`AMH1`', 200, -1, FALSE, '`AMH1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AMH1->Sortable = TRUE; // Allow sort
		$this->fields['AMH1'] = &$this->AMH1;

		// LH
		$this->LH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH', 'LH', '`LH`', '`LH`', 201, -1, FALSE, '`LH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LH->Nullable = FALSE; // NOT NULL field
		$this->LH->Required = TRUE; // Required field
		$this->LH->Sortable = TRUE; // Allow sort
		$this->fields['LH'] = &$this->LH;

		// BMI(MALE)
		$this->BMI28MALE29 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_BMI28MALE29', 'BMI(MALE)', '`BMI(MALE)`', '`BMI(MALE)`', 200, -1, FALSE, '`BMI(MALE)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BMI28MALE29->Sortable = TRUE; // Allow sort
		$this->fields['BMI(MALE)'] = &$this->BMI28MALE29;

		// MaleMedicalConditions
		$this->MaleMedicalConditions = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleMedicalConditions', 'MaleMedicalConditions', '`MaleMedicalConditions`', '`MaleMedicalConditions`', 200, -1, FALSE, '`MaleMedicalConditions`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaleMedicalConditions->Sortable = TRUE; // Allow sort
		$this->fields['MaleMedicalConditions'] = &$this->MaleMedicalConditions;

		// MaleExamination
		$this->MaleExamination = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MaleExamination', 'MaleExamination', '`MaleExamination`', '`MaleExamination`', 201, -1, FALSE, '`MaleExamination`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MaleExamination->Nullable = FALSE; // NOT NULL field
		$this->MaleExamination->Required = TRUE; // Required field
		$this->MaleExamination->Sortable = TRUE; // Allow sort
		$this->fields['MaleExamination'] = &$this->MaleExamination;

		// SpermConcentration
		$this->SpermConcentration = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermConcentration', 'SpermConcentration', '`SpermConcentration`', '`SpermConcentration`', 201, -1, FALSE, '`SpermConcentration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SpermConcentration->Nullable = FALSE; // NOT NULL field
		$this->SpermConcentration->Required = TRUE; // Required field
		$this->SpermConcentration->Sortable = TRUE; // Allow sort
		$this->fields['SpermConcentration'] = &$this->SpermConcentration;

		// SpermMotility(P&NP)
		$this->SpermMotility28P26NP29 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermMotility28P26NP29', 'SpermMotility(P&NP)', '`SpermMotility(P&NP)`', '`SpermMotility(P&NP)`', 201, -1, FALSE, '`SpermMotility(P&NP)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SpermMotility28P26NP29->Nullable = FALSE; // NOT NULL field
		$this->SpermMotility28P26NP29->Required = TRUE; // Required field
		$this->SpermMotility28P26NP29->Sortable = TRUE; // Allow sort
		$this->fields['SpermMotility(P&NP)'] = &$this->SpermMotility28P26NP29;

		// SpermMorphology
		$this->SpermMorphology = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermMorphology', 'SpermMorphology', '`SpermMorphology`', '`SpermMorphology`', 201, -1, FALSE, '`SpermMorphology`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SpermMorphology->Nullable = FALSE; // NOT NULL field
		$this->SpermMorphology->Required = TRUE; // Required field
		$this->SpermMorphology->Sortable = TRUE; // Allow sort
		$this->fields['SpermMorphology'] = &$this->SpermMorphology;

		// SpermRetrival
		$this->SpermRetrival = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SpermRetrival', 'SpermRetrival', '`SpermRetrival`', '`SpermRetrival`', 201, -1, FALSE, '`SpermRetrival`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SpermRetrival->Nullable = FALSE; // NOT NULL field
		$this->SpermRetrival->Required = TRUE; // Required field
		$this->SpermRetrival->Sortable = TRUE; // Allow sort
		$this->fields['SpermRetrival'] = &$this->SpermRetrival;

		// M.Testosterone
		$this->M_Testosterone = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_M_Testosterone', 'M.Testosterone', '`M.Testosterone`', '`M.Testosterone`', 201, -1, FALSE, '`M.Testosterone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->M_Testosterone->Nullable = FALSE; // NOT NULL field
		$this->M_Testosterone->Required = TRUE; // Required field
		$this->M_Testosterone->Sortable = TRUE; // Allow sort
		$this->fields['M.Testosterone'] = &$this->M_Testosterone;

		// DFI
		$this->DFI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DFI', 'DFI', '`DFI`', '`DFI`', 201, -1, FALSE, '`DFI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DFI->Nullable = FALSE; // NOT NULL field
		$this->DFI->Required = TRUE; // Required field
		$this->DFI->Sortable = TRUE; // Allow sort
		$this->fields['DFI'] = &$this->DFI;

		// PreRX
		$this->PreRX = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PreRX', 'PreRX', '`PreRX`', '`PreRX`', 201, -1, FALSE, '`PreRX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PreRX->Nullable = FALSE; // NOT NULL field
		$this->PreRX->Required = TRUE; // Required field
		$this->PreRX->Sortable = TRUE; // Allow sort
		$this->fields['PreRX'] = &$this->PreRX;

		// CC 100
		$this->CC_100 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CC_100', 'CC 100', '`CC 100`', '`CC 100`', 200, -1, FALSE, '`CC 100`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CC_100->Sortable = TRUE; // Allow sort
		$this->fields['CC 100'] = &$this->CC_100;

		// RFSH1A
		$this->RFSH1A = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RFSH1A', 'RFSH1A', '`RFSH1A`', '`RFSH1A`', 200, -1, FALSE, '`RFSH1A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RFSH1A->Sortable = TRUE; // Allow sort
		$this->fields['RFSH1A'] = &$this->RFSH1A;

		// HMG1
		$this->HMG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMG1', 'HMG1', '`HMG1`', '`HMG1`', 200, -1, FALSE, '`HMG1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HMG1->Sortable = TRUE; // Allow sort
		$this->fields['HMG1'] = &$this->HMG1;

		// RLH
		$this->RLH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RLH', 'RLH', '`RLH`', '`RLH`', 201, -1, FALSE, '`RLH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RLH->Nullable = FALSE; // NOT NULL field
		$this->RLH->Required = TRUE; // Required field
		$this->RLH->Sortable = TRUE; // Allow sort
		$this->fields['RLH'] = &$this->RLH;

		// HMG_HP
		$this->HMG_HP = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMG_HP', 'HMG_HP', '`HMG_HP`', '`HMG_HP`', 201, -1, FALSE, '`HMG_HP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HMG_HP->Nullable = FALSE; // NOT NULL field
		$this->HMG_HP->Required = TRUE; // Required field
		$this->HMG_HP->Sortable = TRUE; // Allow sort
		$this->fields['HMG_HP'] = &$this->HMG_HP;

		// day_of_HMG
		$this->day_of_HMG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_day_of_HMG', 'day_of_HMG', '`day_of_HMG`', '`day_of_HMG`', 201, -1, FALSE, '`day_of_HMG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->day_of_HMG->Nullable = FALSE; // NOT NULL field
		$this->day_of_HMG->Required = TRUE; // Required field
		$this->day_of_HMG->Sortable = TRUE; // Allow sort
		$this->fields['day_of_HMG'] = &$this->day_of_HMG;

		// Reason_for_HMG
		$this->Reason_for_HMG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Reason_for_HMG', 'Reason_for_HMG', '`Reason_for_HMG`', '`Reason_for_HMG`', 201, -1, FALSE, '`Reason_for_HMG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Reason_for_HMG->Nullable = FALSE; // NOT NULL field
		$this->Reason_for_HMG->Required = TRUE; // Required field
		$this->Reason_for_HMG->Sortable = TRUE; // Allow sort
		$this->fields['Reason_for_HMG'] = &$this->Reason_for_HMG;

		// RLH_day
		$this->RLH_day = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_RLH_day', 'RLH_day', '`RLH_day`', '`RLH_day`', 201, -1, FALSE, '`RLH_day`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RLH_day->Nullable = FALSE; // NOT NULL field
		$this->RLH_day->Required = TRUE; // Required field
		$this->RLH_day->Sortable = TRUE; // Allow sort
		$this->fields['RLH_day'] = &$this->RLH_day;

		// DAYSOFSTIMULATION
		$this->DAYSOFSTIMULATION = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DAYSOFSTIMULATION', 'DAYSOFSTIMULATION', '`DAYSOFSTIMULATION`', '`DAYSOFSTIMULATION`', 200, -1, FALSE, '`DAYSOFSTIMULATION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DAYSOFSTIMULATION->Sortable = TRUE; // Allow sort
		$this->fields['DAYSOFSTIMULATION'] = &$this->DAYSOFSTIMULATION;

		// Any change inbetween ( Dose added , day)
		$this->Any_change_inbetween_28_Dose_added_2C_day29 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Any_change_inbetween_28_Dose_added_2C_day29', 'Any change inbetween ( Dose added , day)', '`Any change inbetween ( Dose added , day)`', '`Any change inbetween ( Dose added , day)`', 201, -1, FALSE, '`Any change inbetween ( Dose added , day)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Any_change_inbetween_28_Dose_added_2C_day29->Nullable = FALSE; // NOT NULL field
		$this->Any_change_inbetween_28_Dose_added_2C_day29->Required = TRUE; // Required field
		$this->Any_change_inbetween_28_Dose_added_2C_day29->Sortable = TRUE; // Allow sort
		$this->fields['Any change inbetween ( Dose added , day)'] = &$this->Any_change_inbetween_28_Dose_added_2C_day29;

		// day of Anta
		$this->day_of_Anta = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_day_of_Anta', 'day of Anta', '`day of Anta`', '`day of Anta`', 201, -1, FALSE, '`day of Anta`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->day_of_Anta->Nullable = FALSE; // NOT NULL field
		$this->day_of_Anta->Required = TRUE; // Required field
		$this->day_of_Anta->Sortable = TRUE; // Allow sort
		$this->fields['day of Anta'] = &$this->day_of_Anta;

		// R FSH TD
		$this->R_FSH_TD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_R_FSH_TD', 'R FSH TD', '`R FSH TD`', '`R FSH TD`', 201, -1, FALSE, '`R FSH TD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->R_FSH_TD->Nullable = FALSE; // NOT NULL field
		$this->R_FSH_TD->Required = TRUE; // Required field
		$this->R_FSH_TD->Sortable = TRUE; // Allow sort
		$this->fields['R FSH TD'] = &$this->R_FSH_TD;

		// R FSH + HMG TD
		$this->R_FSH_2B_HMG_TD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_R_FSH_2B_HMG_TD', 'R FSH + HMG TD', '`R FSH + HMG TD`', '`R FSH + HMG TD`', 201, -1, FALSE, '`R FSH + HMG TD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->R_FSH_2B_HMG_TD->Nullable = FALSE; // NOT NULL field
		$this->R_FSH_2B_HMG_TD->Required = TRUE; // Required field
		$this->R_FSH_2B_HMG_TD->Sortable = TRUE; // Allow sort
		$this->fields['R FSH + HMG TD'] = &$this->R_FSH_2B_HMG_TD;

		// R FSH + R LH TD
		$this->R_FSH_2B_R_LH_TD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_R_FSH_2B_R_LH_TD', 'R FSH + R LH TD', '`R FSH + R LH TD`', '`R FSH + R LH TD`', 201, -1, FALSE, '`R FSH + R LH TD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->R_FSH_2B_R_LH_TD->Nullable = FALSE; // NOT NULL field
		$this->R_FSH_2B_R_LH_TD->Required = TRUE; // Required field
		$this->R_FSH_2B_R_LH_TD->Sortable = TRUE; // Allow sort
		$this->fields['R FSH + R LH TD'] = &$this->R_FSH_2B_R_LH_TD;

		// HMG TD
		$this->HMG_TD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HMG_TD', 'HMG TD', '`HMG TD`', '`HMG TD`', 201, -1, FALSE, '`HMG TD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HMG_TD->Nullable = FALSE; // NOT NULL field
		$this->HMG_TD->Required = TRUE; // Required field
		$this->HMG_TD->Sortable = TRUE; // Allow sort
		$this->fields['HMG TD'] = &$this->HMG_TD;

		// LH TD
		$this->LH_TD = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH_TD', 'LH TD', '`LH TD`', '`LH TD`', 201, -1, FALSE, '`LH TD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LH_TD->Nullable = FALSE; // NOT NULL field
		$this->LH_TD->Required = TRUE; // Required field
		$this->LH_TD->Sortable = TRUE; // Allow sort
		$this->fields['LH TD'] = &$this->LH_TD;

		// D1 LH
		$this->D1_LH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D1_LH', 'D1 LH', '`D1 LH`', '`D1 LH`', 201, -1, FALSE, '`D1 LH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D1_LH->Nullable = FALSE; // NOT NULL field
		$this->D1_LH->Required = TRUE; // Required field
		$this->D1_LH->Sortable = TRUE; // Allow sort
		$this->fields['D1 LH'] = &$this->D1_LH;

		// D1 E2
		$this->D1_E2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D1_E2', 'D1 E2', '`D1 E2`', '`D1 E2`', 201, -1, FALSE, '`D1 E2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D1_E2->Nullable = FALSE; // NOT NULL field
		$this->D1_E2->Required = TRUE; // Required field
		$this->D1_E2->Sortable = TRUE; // Allow sort
		$this->fields['D1 E2'] = &$this->D1_E2;

		// Trigger day E2
		$this->Trigger_day_E2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Trigger_day_E2', 'Trigger day E2', '`Trigger day E2`', '`Trigger day E2`', 201, -1, FALSE, '`Trigger day E2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Trigger_day_E2->Nullable = FALSE; // NOT NULL field
		$this->Trigger_day_E2->Required = TRUE; // Required field
		$this->Trigger_day_E2->Sortable = TRUE; // Allow sort
		$this->fields['Trigger day E2'] = &$this->Trigger_day_E2;

		// Trigger day P4
		$this->Trigger_day_P4 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Trigger_day_P4', 'Trigger day P4', '`Trigger day P4`', '`Trigger day P4`', 201, -1, FALSE, '`Trigger day P4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Trigger_day_P4->Nullable = FALSE; // NOT NULL field
		$this->Trigger_day_P4->Required = TRUE; // Required field
		$this->Trigger_day_P4->Sortable = TRUE; // Allow sort
		$this->fields['Trigger day P4'] = &$this->Trigger_day_P4;

		// Trigger day LH
		$this->Trigger_day_LH = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Trigger_day_LH', 'Trigger day LH', '`Trigger day LH`', '`Trigger day LH`', 201, -1, FALSE, '`Trigger day LH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Trigger_day_LH->Nullable = FALSE; // NOT NULL field
		$this->Trigger_day_LH->Required = TRUE; // Required field
		$this->Trigger_day_LH->Sortable = TRUE; // Allow sort
		$this->fields['Trigger day LH'] = &$this->Trigger_day_LH;

		// VIT-D
		$this->VIT_D = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VIT_D', 'VIT-D', '`VIT-D`', '`VIT-D`', 201, -1, FALSE, '`VIT-D`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->VIT_D->Nullable = FALSE; // NOT NULL field
		$this->VIT_D->Required = TRUE; // Required field
		$this->VIT_D->Sortable = TRUE; // Allow sort
		$this->fields['VIT-D'] = &$this->VIT_D;

		// TRIGGERR
		$this->TRIGGERR = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TRIGGERR', 'TRIGGERR', '`TRIGGERR`', '`TRIGGERR`', 200, -1, FALSE, '`TRIGGERR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TRIGGERR->Sortable = TRUE; // Allow sort
		$this->fields['TRIGGERR'] = &$this->TRIGGERR;

		// BHCG BEFORE RETRIEVAL
		$this->BHCG_BEFORE_RETRIEVAL = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_BHCG_BEFORE_RETRIEVAL', 'BHCG BEFORE RETRIEVAL', '`BHCG BEFORE RETRIEVAL`', '`BHCG BEFORE RETRIEVAL`', 201, -1, FALSE, '`BHCG BEFORE RETRIEVAL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->BHCG_BEFORE_RETRIEVAL->Nullable = FALSE; // NOT NULL field
		$this->BHCG_BEFORE_RETRIEVAL->Required = TRUE; // Required field
		$this->BHCG_BEFORE_RETRIEVAL->Sortable = TRUE; // Allow sort
		$this->fields['BHCG BEFORE RETRIEVAL'] = &$this->BHCG_BEFORE_RETRIEVAL;

		// LH -12 HRS
		$this->LH__12_HRS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LH__12_HRS', 'LH -12 HRS', '`LH -12 HRS`', '`LH -12 HRS`', 201, -1, FALSE, '`LH -12 HRS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LH__12_HRS->Nullable = FALSE; // NOT NULL field
		$this->LH__12_HRS->Required = TRUE; // Required field
		$this->LH__12_HRS->Sortable = TRUE; // Allow sort
		$this->fields['LH -12 HRS'] = &$this->LH__12_HRS;

		// P4 -12 HRS
		$this->P4__12_HRS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_P4__12_HRS', 'P4 -12 HRS', '`P4 -12 HRS`', '`P4 -12 HRS`', 201, -1, FALSE, '`P4 -12 HRS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->P4__12_HRS->Nullable = FALSE; // NOT NULL field
		$this->P4__12_HRS->Required = TRUE; // Required field
		$this->P4__12_HRS->Sortable = TRUE; // Allow sort
		$this->fields['P4 -12 HRS'] = &$this->P4__12_HRS;

		// ET on hCG day
		$this->ET_on_hCG_day = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ET_on_hCG_day', 'ET on hCG day', '`ET on hCG day`', '`ET on hCG day`', 201, -1, FALSE, '`ET on hCG day`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ET_on_hCG_day->Nullable = FALSE; // NOT NULL field
		$this->ET_on_hCG_day->Required = TRUE; // Required field
		$this->ET_on_hCG_day->Sortable = TRUE; // Allow sort
		$this->fields['ET on hCG day'] = &$this->ET_on_hCG_day;

		// ET doppler
		$this->ET_doppler = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ET_doppler', 'ET doppler', '`ET doppler`', '`ET doppler`', 201, -1, FALSE, '`ET doppler`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ET_doppler->Nullable = FALSE; // NOT NULL field
		$this->ET_doppler->Required = TRUE; // Required field
		$this->ET_doppler->Sortable = TRUE; // Allow sort
		$this->fields['ET doppler'] = &$this->ET_doppler;

		// VI/FI/VFI
		$this->VI2FFI2FVFI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VI2FFI2FVFI', 'VI/FI/VFI', '`VI/FI/VFI`', '`VI/FI/VFI`', 201, -1, FALSE, '`VI/FI/VFI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->VI2FFI2FVFI->Nullable = FALSE; // NOT NULL field
		$this->VI2FFI2FVFI->Required = TRUE; // Required field
		$this->VI2FFI2FVFI->Sortable = TRUE; // Allow sort
		$this->fields['VI/FI/VFI'] = &$this->VI2FFI2FVFI;

		// Endometrial abnormality
		$this->Endometrial_abnormality = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Endometrial_abnormality', 'Endometrial abnormality', '`Endometrial abnormality`', '`Endometrial abnormality`', 201, -1, FALSE, '`Endometrial abnormality`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Endometrial_abnormality->Nullable = FALSE; // NOT NULL field
		$this->Endometrial_abnormality->Required = TRUE; // Required field
		$this->Endometrial_abnormality->Sortable = TRUE; // Allow sort
		$this->fields['Endometrial abnormality'] = &$this->Endometrial_abnormality;

		// AFC ON S1
		$this->AFC_ON_S1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFC_ON_S1', 'AFC ON S1', '`AFC ON S1`', '`AFC ON S1`', 201, -1, FALSE, '`AFC ON S1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFC_ON_S1->Nullable = FALSE; // NOT NULL field
		$this->AFC_ON_S1->Required = TRUE; // Required field
		$this->AFC_ON_S1->Sortable = TRUE; // Allow sort
		$this->fields['AFC ON S1'] = &$this->AFC_ON_S1;

		// TIME OF OPU FROM TRIGGER
		$this->TIME_OF_OPU_FROM_TRIGGER = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TIME_OF_OPU_FROM_TRIGGER', 'TIME OF OPU FROM TRIGGER', '`TIME OF OPU FROM TRIGGER`', '`TIME OF OPU FROM TRIGGER`', 201, -1, FALSE, '`TIME OF OPU FROM TRIGGER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TIME_OF_OPU_FROM_TRIGGER->Nullable = FALSE; // NOT NULL field
		$this->TIME_OF_OPU_FROM_TRIGGER->Required = TRUE; // Required field
		$this->TIME_OF_OPU_FROM_TRIGGER->Sortable = TRUE; // Allow sort
		$this->fields['TIME OF OPU FROM TRIGGER'] = &$this->TIME_OF_OPU_FROM_TRIGGER;

		// SPERM TYPE
		$this->SPERM_TYPE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_SPERM_TYPE', 'SPERM TYPE', '`SPERM TYPE`', '`SPERM TYPE`', 201, -1, FALSE, '`SPERM TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SPERM_TYPE->Nullable = FALSE; // NOT NULL field
		$this->SPERM_TYPE->Required = TRUE; // Required field
		$this->SPERM_TYPE->Sortable = TRUE; // Allow sort
		$this->fields['SPERM TYPE'] = &$this->SPERM_TYPE;

		// EXPECTED ON TRIGGER DAY
		$this->EXPECTED_ON_TRIGGER_DAY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EXPECTED_ON_TRIGGER_DAY', 'EXPECTED ON TRIGGER DAY', '`EXPECTED ON TRIGGER DAY`', '`EXPECTED ON TRIGGER DAY`', 201, -1, FALSE, '`EXPECTED ON TRIGGER DAY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->EXPECTED_ON_TRIGGER_DAY->Nullable = FALSE; // NOT NULL field
		$this->EXPECTED_ON_TRIGGER_DAY->Required = TRUE; // Required field
		$this->EXPECTED_ON_TRIGGER_DAY->Sortable = TRUE; // Allow sort
		$this->fields['EXPECTED ON TRIGGER DAY'] = &$this->EXPECTED_ON_TRIGGER_DAY;

		// OOCYTES RETRIEVED
		$this->OOCYTES_RETRIEVED = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OOCYTES_RETRIEVED', 'OOCYTES RETRIEVED', '`OOCYTES RETRIEVED`', '`OOCYTES RETRIEVED`', 201, -1, FALSE, '`OOCYTES RETRIEVED`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->OOCYTES_RETRIEVED->Nullable = FALSE; // NOT NULL field
		$this->OOCYTES_RETRIEVED->Required = TRUE; // Required field
		$this->OOCYTES_RETRIEVED->Sortable = TRUE; // Allow sort
		$this->fields['OOCYTES RETRIEVED'] = &$this->OOCYTES_RETRIEVED;

		// TIME OF DENUDATION
		$this->TIME_OF_DENUDATION = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TIME_OF_DENUDATION', 'TIME OF DENUDATION', '`TIME OF DENUDATION`', '`TIME OF DENUDATION`', 201, -1, FALSE, '`TIME OF DENUDATION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TIME_OF_DENUDATION->Nullable = FALSE; // NOT NULL field
		$this->TIME_OF_DENUDATION->Required = TRUE; // Required field
		$this->TIME_OF_DENUDATION->Sortable = TRUE; // Allow sort
		$this->fields['TIME OF DENUDATION'] = &$this->TIME_OF_DENUDATION;

		// M-II
		$this->M_II = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_M_II', 'M-II', '`M-II`', '`M-II`', 201, -1, FALSE, '`M-II`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->M_II->Nullable = FALSE; // NOT NULL field
		$this->M_II->Required = TRUE; // Required field
		$this->M_II->Sortable = TRUE; // Allow sort
		$this->fields['M-II'] = &$this->M_II;

		// MI
		$this->MI = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_MI', 'MI', '`MI`', '`MI`', 201, -1, FALSE, '`MI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MI->Nullable = FALSE; // NOT NULL field
		$this->MI->Required = TRUE; // Required field
		$this->MI->Sortable = TRUE; // Allow sort
		$this->fields['MI'] = &$this->MI;

		// GV
		$this->GV = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GV', 'GV', '`GV`', '`GV`', 201, -1, FALSE, '`GV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GV->Nullable = FALSE; // NOT NULL field
		$this->GV->Required = TRUE; // Required field
		$this->GV->Sortable = TRUE; // Allow sort
		$this->fields['GV'] = &$this->GV;

		// ICSI TIME FORM OPU
		$this->ICSI_TIME_FORM_OPU = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ICSI_TIME_FORM_OPU', 'ICSI TIME FORM OPU', '`ICSI TIME FORM OPU`', '`ICSI TIME FORM OPU`', 201, -1, FALSE, '`ICSI TIME FORM OPU`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ICSI_TIME_FORM_OPU->Nullable = FALSE; // NOT NULL field
		$this->ICSI_TIME_FORM_OPU->Required = TRUE; // Required field
		$this->ICSI_TIME_FORM_OPU->Sortable = TRUE; // Allow sort
		$this->fields['ICSI TIME FORM OPU'] = &$this->ICSI_TIME_FORM_OPU;

		// FERT ( 2 PN )
		$this->FERT_28_2_PN_29 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_FERT_28_2_PN_29', 'FERT ( 2 PN )', '`FERT ( 2 PN )`', '`FERT ( 2 PN )`', 201, -1, FALSE, '`FERT ( 2 PN )`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FERT_28_2_PN_29->Nullable = FALSE; // NOT NULL field
		$this->FERT_28_2_PN_29->Required = TRUE; // Required field
		$this->FERT_28_2_PN_29->Sortable = TRUE; // Allow sort
		$this->fields['FERT ( 2 PN )'] = &$this->FERT_28_2_PN_29;

		// DEG
		$this->DEG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DEG', 'DEG', '`DEG`', '`DEG`', 201, -1, FALSE, '`DEG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DEG->Nullable = FALSE; // NOT NULL field
		$this->DEG->Required = TRUE; // Required field
		$this->DEG->Sortable = TRUE; // Allow sort
		$this->fields['DEG'] = &$this->DEG;

		// D3 GRADE A
		$this->D3_GRADE_A = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3_GRADE_A', 'D3 GRADE A', '`D3 GRADE A`', '`D3 GRADE A`', 201, -1, FALSE, '`D3 GRADE A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D3_GRADE_A->Nullable = FALSE; // NOT NULL field
		$this->D3_GRADE_A->Required = TRUE; // Required field
		$this->D3_GRADE_A->Sortable = TRUE; // Allow sort
		$this->fields['D3 GRADE A'] = &$this->D3_GRADE_A;

		// D3 GRADE B
		$this->D3_GRADE_B = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3_GRADE_B', 'D3 GRADE B', '`D3 GRADE B`', '`D3 GRADE B`', 201, -1, FALSE, '`D3 GRADE B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D3_GRADE_B->Nullable = FALSE; // NOT NULL field
		$this->D3_GRADE_B->Required = TRUE; // Required field
		$this->D3_GRADE_B->Sortable = TRUE; // Allow sort
		$this->fields['D3 GRADE B'] = &$this->D3_GRADE_B;

		// D3 GRADE C
		$this->D3_GRADE_C = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3_GRADE_C', 'D3 GRADE C', '`D3 GRADE C`', '`D3 GRADE C`', 201, -1, FALSE, '`D3 GRADE C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D3_GRADE_C->Nullable = FALSE; // NOT NULL field
		$this->D3_GRADE_C->Required = TRUE; // Required field
		$this->D3_GRADE_C->Sortable = TRUE; // Allow sort
		$this->fields['D3 GRADE C'] = &$this->D3_GRADE_C;

		// D3 GRADE D
		$this->D3_GRADE_D = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D3_GRADE_D', 'D3 GRADE D', '`D3 GRADE D`', '`D3 GRADE D`', 201, -1, FALSE, '`D3 GRADE D`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D3_GRADE_D->Nullable = FALSE; // NOT NULL field
		$this->D3_GRADE_D->Required = TRUE; // Required field
		$this->D3_GRADE_D->Sortable = TRUE; // Allow sort
		$this->fields['D3 GRADE D'] = &$this->D3_GRADE_D;

		// USABLE ON DAY 3 ET
		$this->USABLE_ON_DAY_3_ET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLE_ON_DAY_3_ET', 'USABLE ON DAY 3 ET', '`USABLE ON DAY 3 ET`', '`USABLE ON DAY 3 ET`', 201, -1, FALSE, '`USABLE ON DAY 3 ET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->USABLE_ON_DAY_3_ET->Nullable = FALSE; // NOT NULL field
		$this->USABLE_ON_DAY_3_ET->Required = TRUE; // Required field
		$this->USABLE_ON_DAY_3_ET->Sortable = TRUE; // Allow sort
		$this->fields['USABLE ON DAY 3 ET'] = &$this->USABLE_ON_DAY_3_ET;

		// USABLE ON day 3 FREEZING
		$this->USABLE_ON_day_3_FREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLE_ON_day_3_FREEZING', 'USABLE ON day 3 FREEZING', '`USABLE ON day 3 FREEZING`', '`USABLE ON day 3 FREEZING`', 201, -1, FALSE, '`USABLE ON day 3 FREEZING`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->USABLE_ON_day_3_FREEZING->Nullable = FALSE; // NOT NULL field
		$this->USABLE_ON_day_3_FREEZING->Required = TRUE; // Required field
		$this->USABLE_ON_day_3_FREEZING->Sortable = TRUE; // Allow sort
		$this->fields['USABLE ON day 3 FREEZING'] = &$this->USABLE_ON_day_3_FREEZING;

		// D5 GARDE A
		$this->D5_GARDE_A = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5_GARDE_A', 'D5 GARDE A', '`D5 GARDE A`', '`D5 GARDE A`', 201, -1, FALSE, '`D5 GARDE A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D5_GARDE_A->Nullable = FALSE; // NOT NULL field
		$this->D5_GARDE_A->Required = TRUE; // Required field
		$this->D5_GARDE_A->Sortable = TRUE; // Allow sort
		$this->fields['D5 GARDE A'] = &$this->D5_GARDE_A;

		// D5 GRADE B
		$this->D5_GRADE_B = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5_GRADE_B', 'D5 GRADE B', '`D5 GRADE B`', '`D5 GRADE B`', 201, -1, FALSE, '`D5 GRADE B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D5_GRADE_B->Nullable = FALSE; // NOT NULL field
		$this->D5_GRADE_B->Required = TRUE; // Required field
		$this->D5_GRADE_B->Sortable = TRUE; // Allow sort
		$this->fields['D5 GRADE B'] = &$this->D5_GRADE_B;

		// D5 GRADE C
		$this->D5_GRADE_C = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5_GRADE_C', 'D5 GRADE C', '`D5 GRADE C`', '`D5 GRADE C`', 201, -1, FALSE, '`D5 GRADE C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D5_GRADE_C->Nullable = FALSE; // NOT NULL field
		$this->D5_GRADE_C->Required = TRUE; // Required field
		$this->D5_GRADE_C->Sortable = TRUE; // Allow sort
		$this->fields['D5 GRADE C'] = &$this->D5_GRADE_C;

		// D5 GRADE D
		$this->D5_GRADE_D = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D5_GRADE_D', 'D5 GRADE D', '`D5 GRADE D`', '`D5 GRADE D`', 201, -1, FALSE, '`D5 GRADE D`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D5_GRADE_D->Nullable = FALSE; // NOT NULL field
		$this->D5_GRADE_D->Required = TRUE; // Required field
		$this->D5_GRADE_D->Sortable = TRUE; // Allow sort
		$this->fields['D5 GRADE D'] = &$this->D5_GRADE_D;

		// USABLE ON D5 ET
		$this->USABLE_ON_D5_ET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLE_ON_D5_ET', 'USABLE ON D5 ET', '`USABLE ON D5 ET`', '`USABLE ON D5 ET`', 201, -1, FALSE, '`USABLE ON D5 ET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->USABLE_ON_D5_ET->Nullable = FALSE; // NOT NULL field
		$this->USABLE_ON_D5_ET->Required = TRUE; // Required field
		$this->USABLE_ON_D5_ET->Sortable = TRUE; // Allow sort
		$this->fields['USABLE ON D5 ET'] = &$this->USABLE_ON_D5_ET;

		// USABLE ON D5 FREEZING
		$this->USABLE_ON_D5_FREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_USABLE_ON_D5_FREEZING', 'USABLE ON D5 FREEZING', '`USABLE ON D5 FREEZING`', '`USABLE ON D5 FREEZING`', 201, -1, FALSE, '`USABLE ON D5 FREEZING`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->USABLE_ON_D5_FREEZING->Nullable = FALSE; // NOT NULL field
		$this->USABLE_ON_D5_FREEZING->Required = TRUE; // Required field
		$this->USABLE_ON_D5_FREEZING->Sortable = TRUE; // Allow sort
		$this->fields['USABLE ON D5 FREEZING'] = &$this->USABLE_ON_D5_FREEZING;

		// D6 GRADE A
		$this->D6_GRADE_A = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_GRADE_A', 'D6 GRADE A', '`D6 GRADE A`', '`D6 GRADE A`', 201, -1, FALSE, '`D6 GRADE A`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_GRADE_A->Nullable = FALSE; // NOT NULL field
		$this->D6_GRADE_A->Required = TRUE; // Required field
		$this->D6_GRADE_A->Sortable = TRUE; // Allow sort
		$this->fields['D6 GRADE A'] = &$this->D6_GRADE_A;

		// D6 GRADE B
		$this->D6_GRADE_B = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_GRADE_B', 'D6 GRADE B', '`D6 GRADE B`', '`D6 GRADE B`', 201, -1, FALSE, '`D6 GRADE B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_GRADE_B->Nullable = FALSE; // NOT NULL field
		$this->D6_GRADE_B->Required = TRUE; // Required field
		$this->D6_GRADE_B->Sortable = TRUE; // Allow sort
		$this->fields['D6 GRADE B'] = &$this->D6_GRADE_B;

		// D6 GRADE C
		$this->D6_GRADE_C = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_GRADE_C', 'D6 GRADE C', '`D6 GRADE C`', '`D6 GRADE C`', 201, -1, FALSE, '`D6 GRADE C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_GRADE_C->Nullable = FALSE; // NOT NULL field
		$this->D6_GRADE_C->Required = TRUE; // Required field
		$this->D6_GRADE_C->Sortable = TRUE; // Allow sort
		$this->fields['D6 GRADE C'] = &$this->D6_GRADE_C;

		// D6 GRADE D
		$this->D6_GRADE_D = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_GRADE_D', 'D6 GRADE D', '`D6 GRADE D`', '`D6 GRADE D`', 201, -1, FALSE, '`D6 GRADE D`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_GRADE_D->Nullable = FALSE; // NOT NULL field
		$this->D6_GRADE_D->Required = TRUE; // Required field
		$this->D6_GRADE_D->Sortable = TRUE; // Allow sort
		$this->fields['D6 GRADE D'] = &$this->D6_GRADE_D;

		// D6 USABLE EMBRYO ET
		$this->D6_USABLE_EMBRYO_ET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_USABLE_EMBRYO_ET', 'D6 USABLE EMBRYO ET', '`D6 USABLE EMBRYO ET`', '`D6 USABLE EMBRYO ET`', 201, -1, FALSE, '`D6 USABLE EMBRYO ET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_USABLE_EMBRYO_ET->Nullable = FALSE; // NOT NULL field
		$this->D6_USABLE_EMBRYO_ET->Required = TRUE; // Required field
		$this->D6_USABLE_EMBRYO_ET->Sortable = TRUE; // Allow sort
		$this->fields['D6 USABLE EMBRYO ET'] = &$this->D6_USABLE_EMBRYO_ET;

		// D6 USABLE FREEZING
		$this->D6_USABLE_FREEZING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_D6_USABLE_FREEZING', 'D6 USABLE FREEZING', '`D6 USABLE FREEZING`', '`D6 USABLE FREEZING`', 201, -1, FALSE, '`D6 USABLE FREEZING`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->D6_USABLE_FREEZING->Nullable = FALSE; // NOT NULL field
		$this->D6_USABLE_FREEZING->Required = TRUE; // Required field
		$this->D6_USABLE_FREEZING->Sortable = TRUE; // Allow sort
		$this->fields['D6 USABLE FREEZING'] = &$this->D6_USABLE_FREEZING;

		// TOTAL BLAST
		$this->TOTAL_BLAST = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_TOTAL_BLAST', 'TOTAL BLAST', '`TOTAL BLAST`', '`TOTAL BLAST`', 201, -1, FALSE, '`TOTAL BLAST`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->TOTAL_BLAST->Nullable = FALSE; // NOT NULL field
		$this->TOTAL_BLAST->Required = TRUE; // Required field
		$this->TOTAL_BLAST->Sortable = TRUE; // Allow sort
		$this->fields['TOTAL BLAST'] = &$this->TOTAL_BLAST;

		// PGS
		$this->PGS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PGS', 'PGS', '`PGS`', '`PGS`', 201, -1, FALSE, '`PGS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PGS->Nullable = FALSE; // NOT NULL field
		$this->PGS->Required = TRUE; // Required field
		$this->PGS->Sortable = TRUE; // Allow sort
		$this->fields['PGS'] = &$this->PGS;

		// REMARKS
		$this->REMARKS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_REMARKS', 'REMARKS', '`REMARKS`', '`REMARKS`', 201, -1, FALSE, '`REMARKS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->REMARKS->Nullable = FALSE; // NOT NULL field
		$this->REMARKS->Required = TRUE; // Required field
		$this->REMARKS->Sortable = TRUE; // Allow sort
		$this->fields['REMARKS'] = &$this->REMARKS;

		// PU - D/B
		$this->PU___D2FB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_PU___D2FB', 'PU - D/B', '`PU - D/B`', '`PU - D/B`', 201, -1, FALSE, '`PU - D/B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PU___D2FB->Nullable = FALSE; // NOT NULL field
		$this->PU___D2FB->Required = TRUE; // Required field
		$this->PU___D2FB->Sortable = TRUE; // Allow sort
		$this->fields['PU - D/B'] = &$this->PU___D2FB;

		// ICSI D/B
		$this->ICSI_D2FB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ICSI_D2FB', 'ICSI D/B', '`ICSI D/B`', '`ICSI D/B`', 201, -1, FALSE, '`ICSI D/B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ICSI_D2FB->Nullable = FALSE; // NOT NULL field
		$this->ICSI_D2FB->Required = TRUE; // Required field
		$this->ICSI_D2FB->Sortable = TRUE; // Allow sort
		$this->fields['ICSI D/B'] = &$this->ICSI_D2FB;

		// VIT D/B
		$this->VIT_D2FB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_VIT_D2FB', 'VIT D/B', '`VIT D/B`', '`VIT D/B`', 201, -1, FALSE, '`VIT D/B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->VIT_D2FB->Nullable = FALSE; // NOT NULL field
		$this->VIT_D2FB->Required = TRUE; // Required field
		$this->VIT_D2FB->Sortable = TRUE; // Allow sort
		$this->fields['VIT D/B'] = &$this->VIT_D2FB;

		// ET D/B
		$this->ET_D2FB = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ET_D2FB', 'ET D/B', '`ET D/B`', '`ET D/B`', 201, -1, FALSE, '`ET D/B`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ET_D2FB->Nullable = FALSE; // NOT NULL field
		$this->ET_D2FB->Required = TRUE; // Required field
		$this->ET_D2FB->Sortable = TRUE; // Allow sort
		$this->fields['ET D/B'] = &$this->ET_D2FB;

		// LAB COMMENTS
		$this->LAB_COMMENTS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LAB_COMMENTS', 'LAB COMMENTS', '`LAB COMMENTS`', '`LAB COMMENTS`', 201, -1, FALSE, '`LAB COMMENTS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LAB_COMMENTS->Nullable = FALSE; // NOT NULL field
		$this->LAB_COMMENTS->Required = TRUE; // Required field
		$this->LAB_COMMENTS->Sortable = TRUE; // Allow sort
		$this->fields['LAB COMMENTS'] = &$this->LAB_COMMENTS;

		// Reason for no FRESH transfer
		$this->Reason_for_no_FRESH_transfer = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Reason_for_no_FRESH_transfer', 'Reason for no FRESH transfer', '`Reason for no FRESH transfer`', '`Reason for no FRESH transfer`', 201, -1, FALSE, '`Reason for no FRESH transfer`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Reason_for_no_FRESH_transfer->Nullable = FALSE; // NOT NULL field
		$this->Reason_for_no_FRESH_transfer->Required = TRUE; // Required field
		$this->Reason_for_no_FRESH_transfer->Sortable = TRUE; // Allow sort
		$this->fields['Reason for no FRESH transfer'] = &$this->Reason_for_no_FRESH_transfer;

		// No of embryos transferred Day 3/5, A,B,C
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_No_of_embryos_transferred_Day_32F52C_A2CB2CC', 'No of embryos transferred Day 3/5, A,B,C', '`No of embryos transferred Day 3/5, A,B,C`', '`No of embryos transferred Day 3/5, A,B,C`', 201, -1, FALSE, '`No of embryos transferred Day 3/5, A,B,C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->Nullable = FALSE; // NOT NULL field
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->Required = TRUE; // Required field
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->Sortable = TRUE; // Allow sort
		$this->fields['No of embryos transferred Day 3/5, A,B,C'] = &$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC;

		// EMBRYOS PENDING
		$this->EMBRYOS_PENDING = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYOS_PENDING', 'EMBRYOS PENDING', '`EMBRYOS PENDING`', '`EMBRYOS PENDING`', 201, -1, FALSE, '`EMBRYOS PENDING`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->EMBRYOS_PENDING->Nullable = FALSE; // NOT NULL field
		$this->EMBRYOS_PENDING->Required = TRUE; // Required field
		$this->EMBRYOS_PENDING->Sortable = TRUE; // Allow sort
		$this->fields['EMBRYOS PENDING'] = &$this->EMBRYOS_PENDING;

		// DAY OF TRANSFER
		$this->DAY_OF_TRANSFER = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DAY_OF_TRANSFER', 'DAY OF TRANSFER', '`DAY OF TRANSFER`', '`DAY OF TRANSFER`', 201, -1, FALSE, '`DAY OF TRANSFER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DAY_OF_TRANSFER->Nullable = FALSE; // NOT NULL field
		$this->DAY_OF_TRANSFER->Required = TRUE; // Required field
		$this->DAY_OF_TRANSFER->Sortable = TRUE; // Allow sort
		$this->fields['DAY OF TRANSFER'] = &$this->DAY_OF_TRANSFER;

		// H/D sperm
		$this->H2FD_sperm = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_H2FD_sperm', 'H/D sperm', '`H/D sperm`', '`H/D sperm`', 201, -1, FALSE, '`H/D sperm`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->H2FD_sperm->Nullable = FALSE; // NOT NULL field
		$this->H2FD_sperm->Required = TRUE; // Required field
		$this->H2FD_sperm->Sortable = TRUE; // Allow sort
		$this->fields['H/D sperm'] = &$this->H2FD_sperm;

		// Comments
		$this->Comments = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 201, -1, FALSE, '`Comments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Comments->Nullable = FALSE; // NOT NULL field
		$this->Comments->Required = TRUE; // Required field
		$this->Comments->Sortable = TRUE; // Allow sort
		$this->fields['Comments'] = &$this->Comments;

		// sc progesterone
		$this->sc_progesterone = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_sc_progesterone', 'sc progesterone', '`sc progesterone`', '`sc progesterone`', 201, -1, FALSE, '`sc progesterone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->sc_progesterone->Nullable = FALSE; // NOT NULL field
		$this->sc_progesterone->Required = TRUE; // Required field
		$this->sc_progesterone->Sortable = TRUE; // Allow sort
		$this->fields['sc progesterone'] = &$this->sc_progesterone;

		// Natural micronised 400mg bd + duphaston 10mg bd
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Natural_micronised_400mg_bd_2B_duphaston_10mg_bd', 'Natural micronised 400mg bd + duphaston 10mg bd', '`Natural micronised 400mg bd + duphaston 10mg bd`', '`Natural micronised 400mg bd + duphaston 10mg bd`', 201, -1, FALSE, '`Natural micronised 400mg bd + duphaston 10mg bd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->Nullable = FALSE; // NOT NULL field
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->Required = TRUE; // Required field
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->Sortable = TRUE; // Allow sort
		$this->fields['Natural micronised 400mg bd + duphaston 10mg bd'] = &$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd;

		// CRINONE
		$this->CRINONE = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_CRINONE', 'CRINONE', '`CRINONE`', '`CRINONE`', 201, -1, FALSE, '`CRINONE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->CRINONE->Nullable = FALSE; // NOT NULL field
		$this->CRINONE->Required = TRUE; // Required field
		$this->CRINONE->Sortable = TRUE; // Allow sort
		$this->fields['CRINONE'] = &$this->CRINONE;

		// progynova
		$this->progynova = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_progynova', 'progynova', '`progynova`', '`progynova`', 201, -1, FALSE, '`progynova`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->progynova->Nullable = FALSE; // NOT NULL field
		$this->progynova->Required = TRUE; // Required field
		$this->progynova->Sortable = TRUE; // Allow sort
		$this->fields['progynova'] = &$this->progynova;

		// Heparin
		$this->Heparin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Heparin', 'Heparin', '`Heparin`', '`Heparin`', 201, -1, FALSE, '`Heparin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Heparin->Nullable = FALSE; // NOT NULL field
		$this->Heparin->Required = TRUE; // Required field
		$this->Heparin->Sortable = TRUE; // Allow sort
		$this->fields['Heparin'] = &$this->Heparin;

		// cabergolin
		$this->cabergolin = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_cabergolin', 'cabergolin', '`cabergolin`', '`cabergolin`', 201, -1, FALSE, '`cabergolin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->cabergolin->Nullable = FALSE; // NOT NULL field
		$this->cabergolin->Required = TRUE; // Required field
		$this->cabergolin->Sortable = TRUE; // Allow sort
		$this->fields['cabergolin'] = &$this->cabergolin;

		// Antagonist
		$this->Antagonist = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Antagonist', 'Antagonist', '`Antagonist`', '`Antagonist`', 201, -1, FALSE, '`Antagonist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Antagonist->Nullable = FALSE; // NOT NULL field
		$this->Antagonist->Required = TRUE; // Required field
		$this->Antagonist->Sortable = TRUE; // Allow sort
		$this->fields['Antagonist'] = &$this->Antagonist;

		// OHSS
		$this->OHSS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_OHSS', 'OHSS', '`OHSS`', '`OHSS`', 201, -1, FALSE, '`OHSS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->OHSS->Nullable = FALSE; // NOT NULL field
		$this->OHSS->Required = TRUE; // Required field
		$this->OHSS->Sortable = TRUE; // Allow sort
		$this->fields['OHSS'] = &$this->OHSS;

		// Complications
		$this->Complications = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Complications', 'Complications', '`Complications`', '`Complications`', 201, -1, FALSE, '`Complications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Complications->Nullable = FALSE; // NOT NULL field
		$this->Complications->Required = TRUE; // Required field
		$this->Complications->Sortable = TRUE; // Allow sort
		$this->fields['Complications'] = &$this->Complications;

		// LP bleeding
		$this->LP_bleeding = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LP_bleeding', 'LP bleeding', '`LP bleeding`', '`LP bleeding`', 201, -1, FALSE, '`LP bleeding`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LP_bleeding->Nullable = FALSE; // NOT NULL field
		$this->LP_bleeding->Required = TRUE; // Required field
		$this->LP_bleeding->Sortable = TRUE; // Allow sort
		$this->fields['LP bleeding'] = &$this->LP_bleeding;

		// ß-hCG
		$this->DF_hCG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DF_hCG', 'ß-hCG', '`ß-hCG`', '`ß-hCG`', 201, -1, FALSE, '`ß-hCG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DF_hCG->Nullable = FALSE; // NOT NULL field
		$this->DF_hCG->Required = TRUE; // Required field
		$this->DF_hCG->Sortable = TRUE; // Allow sort
		$this->fields['ß-hCG'] = &$this->DF_hCG;

		// Implantation rate
		$this->Implantation_rate = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantation_rate', 'Implantation rate', '`Implantation rate`', '`Implantation rate`', 201, -1, FALSE, '`Implantation rate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Implantation_rate->Nullable = FALSE; // NOT NULL field
		$this->Implantation_rate->Required = TRUE; // Required field
		$this->Implantation_rate->Sortable = TRUE; // Allow sort
		$this->fields['Implantation rate'] = &$this->Implantation_rate;

		// Ectopic
		$this->Ectopic = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 201, -1, FALSE, '`Ectopic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Ectopic->Nullable = FALSE; // NOT NULL field
		$this->Ectopic->Required = TRUE; // Required field
		$this->Ectopic->Sortable = TRUE; // Allow sort
		$this->fields['Ectopic'] = &$this->Ectopic;

		// Type of preg
		$this->Type_of_preg = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Type_of_preg', 'Type of preg', '`Type of preg`', '`Type of preg`', 201, -1, FALSE, '`Type of preg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Type_of_preg->Nullable = FALSE; // NOT NULL field
		$this->Type_of_preg->Required = TRUE; // Required field
		$this->Type_of_preg->Sortable = TRUE; // Allow sort
		$this->fields['Type of preg'] = &$this->Type_of_preg;

		// ANC
		$this->ANC = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANC', 'ANC', '`ANC`', '`ANC`', 201, -1, FALSE, '`ANC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ANC->Nullable = FALSE; // NOT NULL field
		$this->ANC->Required = TRUE; // Required field
		$this->ANC->Sortable = TRUE; // Allow sort
		$this->fields['ANC'] = &$this->ANC;

		// anomalies
		$this->anomalies = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies', 'anomalies', '`anomalies`', '`anomalies`', 201, -1, FALSE, '`anomalies`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->anomalies->Nullable = FALSE; // NOT NULL field
		$this->anomalies->Required = TRUE; // Required field
		$this->anomalies->Sortable = TRUE; // Allow sort
		$this->fields['anomalies'] = &$this->anomalies;

		// baby wt
		$this->baby_wt = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_baby_wt', 'baby wt', '`baby wt`', '`baby wt`', 201, -1, FALSE, '`baby wt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->baby_wt->Nullable = FALSE; // NOT NULL field
		$this->baby_wt->Required = TRUE; // Required field
		$this->baby_wt->Sortable = TRUE; // Allow sort
		$this->fields['baby wt'] = &$this->baby_wt;

		// GA at delivery
		$this->GA_at_delivery = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GA_at_delivery', 'GA at delivery', '`GA at delivery`', '`GA at delivery`', 201, -1, FALSE, '`GA at delivery`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GA_at_delivery->Nullable = FALSE; // NOT NULL field
		$this->GA_at_delivery->Required = TRUE; // Required field
		$this->GA_at_delivery->Sortable = TRUE; // Allow sort
		$this->fields['GA at delivery'] = &$this->GA_at_delivery;

		// Pregnancy outcome
		$this->Pregnancy_outcome = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Pregnancy_outcome', 'Pregnancy outcome', '`Pregnancy outcome`', '`Pregnancy outcome`', 201, -1, FALSE, '`Pregnancy outcome`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Pregnancy_outcome->Nullable = FALSE; // NOT NULL field
		$this->Pregnancy_outcome->Required = TRUE; // Required field
		$this->Pregnancy_outcome->Sortable = TRUE; // Allow sort
		$this->fields['Pregnancy outcome'] = &$this->Pregnancy_outcome;

		// 1st FET
		$this->_1st_FET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x__1st_FET', '1st FET', '`1st FET`', '`1st FET`', 201, -1, FALSE, '`1st FET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_1st_FET->Nullable = FALSE; // NOT NULL field
		$this->_1st_FET->Required = TRUE; // Required field
		$this->_1st_FET->Sortable = TRUE; // Allow sort
		$this->fields['1st FET'] = &$this->_1st_FET;

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTER_HYSTEROSCOPY', 'AFTER HYSTEROSCOPY', '`AFTER HYSTEROSCOPY`', '`AFTER HYSTEROSCOPY`', 201, -1, FALSE, '`AFTER HYSTEROSCOPY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_HYSTEROSCOPY->Nullable = FALSE; // NOT NULL field
		$this->AFTER_HYSTEROSCOPY->Required = TRUE; // Required field
		$this->AFTER_HYSTEROSCOPY->Sortable = TRUE; // Allow sort
		$this->fields['AFTER HYSTEROSCOPY'] = &$this->AFTER_HYSTEROSCOPY;

		// AFTER ERA
		$this->AFTER_ERA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTER_ERA', 'AFTER ERA', '`AFTER ERA`', '`AFTER ERA`', 201, -1, FALSE, '`AFTER ERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_ERA->Nullable = FALSE; // NOT NULL field
		$this->AFTER_ERA->Required = TRUE; // Required field
		$this->AFTER_ERA->Sortable = TRUE; // Allow sort
		$this->fields['AFTER ERA'] = &$this->AFTER_ERA;

		// ERA
		$this->ERA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 201, -1, FALSE, '`ERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ERA->Nullable = FALSE; // NOT NULL field
		$this->ERA->Required = TRUE; // Required field
		$this->ERA->Sortable = TRUE; // Allow sort
		$this->fields['ERA'] = &$this->ERA;

		// HRT
		$this->HRT = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HRT', 'HRT', '`HRT`', '`HRT`', 201, -1, FALSE, '`HRT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HRT->Nullable = FALSE; // NOT NULL field
		$this->HRT->Required = TRUE; // Required field
		$this->HRT->Sortable = TRUE; // Allow sort
		$this->fields['HRT'] = &$this->HRT;

		// XGRAST/PRP
		$this->XGRAST2FPRP = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_XGRAST2FPRP', 'XGRAST/PRP', '`XGRAST/PRP`', '`XGRAST/PRP`', 201, -1, FALSE, '`XGRAST/PRP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->XGRAST2FPRP->Nullable = FALSE; // NOT NULL field
		$this->XGRAST2FPRP->Required = TRUE; // Required field
		$this->XGRAST2FPRP->Sortable = TRUE; // Allow sort
		$this->fields['XGRAST/PRP'] = &$this->XGRAST2FPRP;

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C', 'EMBRYO DETAILS DAY 3/ 5, A, B, C', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', 201, -1, FALSE, '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Nullable = FALSE; // NOT NULL field
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Required = TRUE; // Required field
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->Sortable = TRUE; // Allow sort
		$this->fields['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = &$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C;

		// LMWH 40MG
		$this->LMWH_40MG = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LMWH_40MG', 'LMWH 40MG', '`LMWH 40MG`', '`LMWH 40MG`', 201, -1, FALSE, '`LMWH 40MG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LMWH_40MG->Nullable = FALSE; // NOT NULL field
		$this->LMWH_40MG->Required = TRUE; // Required field
		$this->LMWH_40MG->Sortable = TRUE; // Allow sort
		$this->fields['LMWH 40MG'] = &$this->LMWH_40MG;

		// ß-hCG2
		$this->DF_hCG2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DF_hCG2', 'ß-hCG2', '`ß-hCG2`', '`ß-hCG2`', 201, -1, FALSE, '`ß-hCG2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DF_hCG2->Nullable = FALSE; // NOT NULL field
		$this->DF_hCG2->Required = TRUE; // Required field
		$this->DF_hCG2->Sortable = TRUE; // Allow sort
		$this->fields['ß-hCG2'] = &$this->DF_hCG2;

		// Implantation rate1
		$this->Implantation_rate1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantation_rate1', 'Implantation rate1', '`Implantation rate1`', '`Implantation rate1`', 201, -1, FALSE, '`Implantation rate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Implantation_rate1->Nullable = FALSE; // NOT NULL field
		$this->Implantation_rate1->Required = TRUE; // Required field
		$this->Implantation_rate1->Sortable = TRUE; // Allow sort
		$this->fields['Implantation rate1'] = &$this->Implantation_rate1;

		// Ectopic1
		$this->Ectopic1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic1', 'Ectopic1', '`Ectopic1`', '`Ectopic1`', 201, -1, FALSE, '`Ectopic1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Ectopic1->Nullable = FALSE; // NOT NULL field
		$this->Ectopic1->Required = TRUE; // Required field
		$this->Ectopic1->Sortable = TRUE; // Allow sort
		$this->fields['Ectopic1'] = &$this->Ectopic1;

		// Type of pregA
		$this->Type_of_pregA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Type_of_pregA', 'Type of pregA', '`Type of pregA`', '`Type of pregA`', 201, -1, FALSE, '`Type of pregA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Type_of_pregA->Nullable = FALSE; // NOT NULL field
		$this->Type_of_pregA->Required = TRUE; // Required field
		$this->Type_of_pregA->Sortable = TRUE; // Allow sort
		$this->fields['Type of pregA'] = &$this->Type_of_pregA;

		// ANC1
		$this->ANC1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANC1', 'ANC1', '`ANC1`', '`ANC1`', 201, -1, FALSE, '`ANC1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ANC1->Nullable = FALSE; // NOT NULL field
		$this->ANC1->Required = TRUE; // Required field
		$this->ANC1->Sortable = TRUE; // Allow sort
		$this->fields['ANC1'] = &$this->ANC1;

		// anomalies2
		$this->anomalies2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies2', 'anomalies2', '`anomalies2`', '`anomalies2`', 201, -1, FALSE, '`anomalies2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->anomalies2->Nullable = FALSE; // NOT NULL field
		$this->anomalies2->Required = TRUE; // Required field
		$this->anomalies2->Sortable = TRUE; // Allow sort
		$this->fields['anomalies2'] = &$this->anomalies2;

		// baby wt2
		$this->baby_wt2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_baby_wt2', 'baby wt2', '`baby wt2`', '`baby wt2`', 201, -1, FALSE, '`baby wt2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->baby_wt2->Nullable = FALSE; // NOT NULL field
		$this->baby_wt2->Required = TRUE; // Required field
		$this->baby_wt2->Sortable = TRUE; // Allow sort
		$this->fields['baby wt2'] = &$this->baby_wt2;

		// GA at delivery1
		$this->GA_at_delivery1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GA_at_delivery1', 'GA at delivery1', '`GA at delivery1`', '`GA at delivery1`', 201, -1, FALSE, '`GA at delivery1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GA_at_delivery1->Nullable = FALSE; // NOT NULL field
		$this->GA_at_delivery1->Required = TRUE; // Required field
		$this->GA_at_delivery1->Sortable = TRUE; // Allow sort
		$this->fields['GA at delivery1'] = &$this->GA_at_delivery1;

		// Pregnancy outcome1
		$this->Pregnancy_outcome1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Pregnancy_outcome1', 'Pregnancy outcome1', '`Pregnancy outcome1`', '`Pregnancy outcome1`', 201, -1, FALSE, '`Pregnancy outcome1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Pregnancy_outcome1->Nullable = FALSE; // NOT NULL field
		$this->Pregnancy_outcome1->Required = TRUE; // Required field
		$this->Pregnancy_outcome1->Sortable = TRUE; // Allow sort
		$this->fields['Pregnancy outcome1'] = &$this->Pregnancy_outcome1;

		// 2ND FET
		$this->_2ND_FET = new DbField('view_template_for_opu', 'view_template_for_opu', 'x__2ND_FET', '2ND FET', '`2ND FET`', '`2ND FET`', 201, -1, FALSE, '`2ND FET`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->_2ND_FET->Nullable = FALSE; // NOT NULL field
		$this->_2ND_FET->Required = TRUE; // Required field
		$this->_2ND_FET->Sortable = TRUE; // Allow sort
		$this->fields['2ND FET'] = &$this->_2ND_FET;

		// AFTER HYSTEROSCOPY1
		$this->AFTER_HYSTEROSCOPY1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTER_HYSTEROSCOPY1', 'AFTER HYSTEROSCOPY1', '`AFTER HYSTEROSCOPY1`', '`AFTER HYSTEROSCOPY1`', 201, -1, FALSE, '`AFTER HYSTEROSCOPY1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_HYSTEROSCOPY1->Nullable = FALSE; // NOT NULL field
		$this->AFTER_HYSTEROSCOPY1->Required = TRUE; // Required field
		$this->AFTER_HYSTEROSCOPY1->Sortable = TRUE; // Allow sort
		$this->fields['AFTER HYSTEROSCOPY1'] = &$this->AFTER_HYSTEROSCOPY1;

		// AFTER ERA1
		$this->AFTER_ERA1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_AFTER_ERA1', 'AFTER ERA1', '`AFTER ERA1`', '`AFTER ERA1`', 201, -1, FALSE, '`AFTER ERA1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->AFTER_ERA1->Nullable = FALSE; // NOT NULL field
		$this->AFTER_ERA1->Required = TRUE; // Required field
		$this->AFTER_ERA1->Sortable = TRUE; // Allow sort
		$this->fields['AFTER ERA1'] = &$this->AFTER_ERA1;

		// ERA1
		$this->ERA1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ERA1', 'ERA1', '`ERA1`', '`ERA1`', 201, -1, FALSE, '`ERA1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ERA1->Nullable = FALSE; // NOT NULL field
		$this->ERA1->Required = TRUE; // Required field
		$this->ERA1->Sortable = TRUE; // Allow sort
		$this->fields['ERA1'] = &$this->ERA1;

		// HRT1
		$this->HRT1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_HRT1', 'HRT1', '`HRT1`', '`HRT1`', 201, -1, FALSE, '`HRT1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->HRT1->Nullable = FALSE; // NOT NULL field
		$this->HRT1->Required = TRUE; // Required field
		$this->HRT1->Sortable = TRUE; // Allow sort
		$this->fields['HRT1'] = &$this->HRT1;

		// XGRAST/PRP1
		$this->XGRAST2FPRP1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_XGRAST2FPRP1', 'XGRAST/PRP1', '`XGRAST/PRP1`', '`XGRAST/PRP1`', 201, -1, FALSE, '`XGRAST/PRP1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->XGRAST2FPRP1->Nullable = FALSE; // NOT NULL field
		$this->XGRAST2FPRP1->Required = TRUE; // Required field
		$this->XGRAST2FPRP1->Sortable = TRUE; // Allow sort
		$this->fields['XGRAST/PRP1'] = &$this->XGRAST2FPRP1;

		// NUMBER OF EMBRYOS
		$this->NUMBER_OF_EMBRYOS = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_NUMBER_OF_EMBRYOS', 'NUMBER OF EMBRYOS', '`NUMBER OF EMBRYOS`', '`NUMBER OF EMBRYOS`', 201, -1, FALSE, '`NUMBER OF EMBRYOS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->NUMBER_OF_EMBRYOS->Nullable = FALSE; // NOT NULL field
		$this->NUMBER_OF_EMBRYOS->Required = TRUE; // Required field
		$this->NUMBER_OF_EMBRYOS->Sortable = TRUE; // Allow sort
		$this->fields['NUMBER OF EMBRYOS'] = &$this->NUMBER_OF_EMBRYOS;

		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C', 'EMBRYO DETAILS DAY 3/ 5,/6 A, B, C', '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', 201, -1, FALSE, '`EMBRYO DETAILS DAY 3/ 5,/6 A, B, C`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->Nullable = FALSE; // NOT NULL field
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->Required = TRUE; // Required field
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->Sortable = TRUE; // Allow sort
		$this->fields['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'] = &$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C;

		// INTRALIPID AND BARGLOBIN
		$this->INTRALIPID_AND_BARGLOBIN = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_INTRALIPID_AND_BARGLOBIN', 'INTRALIPID AND BARGLOBIN', '`INTRALIPID AND BARGLOBIN`', '`INTRALIPID AND BARGLOBIN`', 201, -1, FALSE, '`INTRALIPID AND BARGLOBIN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->INTRALIPID_AND_BARGLOBIN->Nullable = FALSE; // NOT NULL field
		$this->INTRALIPID_AND_BARGLOBIN->Required = TRUE; // Required field
		$this->INTRALIPID_AND_BARGLOBIN->Sortable = TRUE; // Allow sort
		$this->fields['INTRALIPID AND BARGLOBIN'] = &$this->INTRALIPID_AND_BARGLOBIN;

		// LMWH 40MG1
		$this->LMWH_40MG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_LMWH_40MG1', 'LMWH 40MG1', '`LMWH 40MG1`', '`LMWH 40MG1`', 201, -1, FALSE, '`LMWH 40MG1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LMWH_40MG1->Nullable = FALSE; // NOT NULL field
		$this->LMWH_40MG1->Required = TRUE; // Required field
		$this->LMWH_40MG1->Sortable = TRUE; // Allow sort
		$this->fields['LMWH 40MG1'] = &$this->LMWH_40MG1;

		// ß-hCG1
		$this->DF_hCG1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_DF_hCG1', 'ß-hCG1', '`ß-hCG1`', '`ß-hCG1`', 201, -1, FALSE, '`ß-hCG1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DF_hCG1->Nullable = FALSE; // NOT NULL field
		$this->DF_hCG1->Required = TRUE; // Required field
		$this->DF_hCG1->Sortable = TRUE; // Allow sort
		$this->fields['ß-hCG1'] = &$this->DF_hCG1;

		// Implantation rate2
		$this->Implantation_rate2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Implantation_rate2', 'Implantation rate2', '`Implantation rate2`', '`Implantation rate2`', 201, -1, FALSE, '`Implantation rate2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Implantation_rate2->Nullable = FALSE; // NOT NULL field
		$this->Implantation_rate2->Required = TRUE; // Required field
		$this->Implantation_rate2->Sortable = TRUE; // Allow sort
		$this->fields['Implantation rate2'] = &$this->Implantation_rate2;

		// Ectopic2
		$this->Ectopic2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Ectopic2', 'Ectopic2', '`Ectopic2`', '`Ectopic2`', 201, -1, FALSE, '`Ectopic2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Ectopic2->Nullable = FALSE; // NOT NULL field
		$this->Ectopic2->Required = TRUE; // Required field
		$this->Ectopic2->Sortable = TRUE; // Allow sort
		$this->fields['Ectopic2'] = &$this->Ectopic2;

		// Type of preg2
		$this->Type_of_preg2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_Type_of_preg2', 'Type of preg2', '`Type of preg2`', '`Type of preg2`', 201, -1, FALSE, '`Type of preg2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Type_of_preg2->Nullable = FALSE; // NOT NULL field
		$this->Type_of_preg2->Required = TRUE; // Required field
		$this->Type_of_preg2->Sortable = TRUE; // Allow sort
		$this->fields['Type of preg2'] = &$this->Type_of_preg2;

		// ANCA
		$this->ANCA = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_ANCA', 'ANCA', '`ANCA`', '`ANCA`', 201, -1, FALSE, '`ANCA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ANCA->Nullable = FALSE; // NOT NULL field
		$this->ANCA->Required = TRUE; // Required field
		$this->ANCA->Sortable = TRUE; // Allow sort
		$this->fields['ANCA'] = &$this->ANCA;

		// anomalies1
		$this->anomalies1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_anomalies1', 'anomalies1', '`anomalies1`', '`anomalies1`', 201, -1, FALSE, '`anomalies1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->anomalies1->Nullable = FALSE; // NOT NULL field
		$this->anomalies1->Required = TRUE; // Required field
		$this->anomalies1->Sortable = TRUE; // Allow sort
		$this->fields['anomalies1'] = &$this->anomalies1;

		// baby wt1
		$this->baby_wt1 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_baby_wt1', 'baby wt1', '`baby wt1`', '`baby wt1`', 201, -1, FALSE, '`baby wt1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->baby_wt1->Nullable = FALSE; // NOT NULL field
		$this->baby_wt1->Required = TRUE; // Required field
		$this->baby_wt1->Sortable = TRUE; // Allow sort
		$this->fields['baby wt1'] = &$this->baby_wt1;

		// GA at delivery2
		$this->GA_at_delivery2 = new DbField('view_template_for_opu', 'view_template_for_opu', 'x_GA_at_delivery2', 'GA at delivery2', '`GA at delivery2`', '`GA at delivery2`', 201, -1, FALSE, '`GA at delivery2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->GA_at_delivery2->Nullable = FALSE; // NOT NULL field
		$this->GA_at_delivery2->Required = TRUE; // Required field
		$this->GA_at_delivery2->Sortable = TRUE; // Allow sort
		$this->fields['GA at delivery2'] = &$this->GA_at_delivery2;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_template_for_opu`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
		$this->R_OVARY->DbValue = $row['R.OVARY'];
		$this->R_AFC->DbValue = $row['R.AFC'];
		$this->L_OVARY->DbValue = $row['L.OVARY'];
		$this->L_AFC->DbValue = $row['L.AFC'];
		$this->LH1->DbValue = $row['LH1'];
		$this->E2->DbValue = $row['E2'];
		$this->StemCellInstallation->DbValue = $row['StemCellInstallation'];
		$this->DHEAS->DbValue = $row['DHEAS'];
		$this->Mtorr->DbValue = $row['Mtorr'];
		$this->AMH1->DbValue = $row['AMH1'];
		$this->LH->DbValue = $row['LH'];
		$this->BMI28MALE29->DbValue = $row['BMI(MALE)'];
		$this->MaleMedicalConditions->DbValue = $row['MaleMedicalConditions'];
		$this->MaleExamination->DbValue = $row['MaleExamination'];
		$this->SpermConcentration->DbValue = $row['SpermConcentration'];
		$this->SpermMotility28P26NP29->DbValue = $row['SpermMotility(P&NP)'];
		$this->SpermMorphology->DbValue = $row['SpermMorphology'];
		$this->SpermRetrival->DbValue = $row['SpermRetrival'];
		$this->M_Testosterone->DbValue = $row['M.Testosterone'];
		$this->DFI->DbValue = $row['DFI'];
		$this->PreRX->DbValue = $row['PreRX'];
		$this->CC_100->DbValue = $row['CC 100'];
		$this->RFSH1A->DbValue = $row['RFSH1A'];
		$this->HMG1->DbValue = $row['HMG1'];
		$this->RLH->DbValue = $row['RLH'];
		$this->HMG_HP->DbValue = $row['HMG_HP'];
		$this->day_of_HMG->DbValue = $row['day_of_HMG'];
		$this->Reason_for_HMG->DbValue = $row['Reason_for_HMG'];
		$this->RLH_day->DbValue = $row['RLH_day'];
		$this->DAYSOFSTIMULATION->DbValue = $row['DAYSOFSTIMULATION'];
		$this->Any_change_inbetween_28_Dose_added_2C_day29->DbValue = $row['Any change inbetween ( Dose added , day)'];
		$this->day_of_Anta->DbValue = $row['day of Anta'];
		$this->R_FSH_TD->DbValue = $row['R FSH TD'];
		$this->R_FSH_2B_HMG_TD->DbValue = $row['R FSH + HMG TD'];
		$this->R_FSH_2B_R_LH_TD->DbValue = $row['R FSH + R LH TD'];
		$this->HMG_TD->DbValue = $row['HMG TD'];
		$this->LH_TD->DbValue = $row['LH TD'];
		$this->D1_LH->DbValue = $row['D1 LH'];
		$this->D1_E2->DbValue = $row['D1 E2'];
		$this->Trigger_day_E2->DbValue = $row['Trigger day E2'];
		$this->Trigger_day_P4->DbValue = $row['Trigger day P4'];
		$this->Trigger_day_LH->DbValue = $row['Trigger day LH'];
		$this->VIT_D->DbValue = $row['VIT-D'];
		$this->TRIGGERR->DbValue = $row['TRIGGERR'];
		$this->BHCG_BEFORE_RETRIEVAL->DbValue = $row['BHCG BEFORE RETRIEVAL'];
		$this->LH__12_HRS->DbValue = $row['LH -12 HRS'];
		$this->P4__12_HRS->DbValue = $row['P4 -12 HRS'];
		$this->ET_on_hCG_day->DbValue = $row['ET on hCG day'];
		$this->ET_doppler->DbValue = $row['ET doppler'];
		$this->VI2FFI2FVFI->DbValue = $row['VI/FI/VFI'];
		$this->Endometrial_abnormality->DbValue = $row['Endometrial abnormality'];
		$this->AFC_ON_S1->DbValue = $row['AFC ON S1'];
		$this->TIME_OF_OPU_FROM_TRIGGER->DbValue = $row['TIME OF OPU FROM TRIGGER'];
		$this->SPERM_TYPE->DbValue = $row['SPERM TYPE'];
		$this->EXPECTED_ON_TRIGGER_DAY->DbValue = $row['EXPECTED ON TRIGGER DAY'];
		$this->OOCYTES_RETRIEVED->DbValue = $row['OOCYTES RETRIEVED'];
		$this->TIME_OF_DENUDATION->DbValue = $row['TIME OF DENUDATION'];
		$this->M_II->DbValue = $row['M-II'];
		$this->MI->DbValue = $row['MI'];
		$this->GV->DbValue = $row['GV'];
		$this->ICSI_TIME_FORM_OPU->DbValue = $row['ICSI TIME FORM OPU'];
		$this->FERT_28_2_PN_29->DbValue = $row['FERT ( 2 PN )'];
		$this->DEG->DbValue = $row['DEG'];
		$this->D3_GRADE_A->DbValue = $row['D3 GRADE A'];
		$this->D3_GRADE_B->DbValue = $row['D3 GRADE B'];
		$this->D3_GRADE_C->DbValue = $row['D3 GRADE C'];
		$this->D3_GRADE_D->DbValue = $row['D3 GRADE D'];
		$this->USABLE_ON_DAY_3_ET->DbValue = $row['USABLE ON DAY 3 ET'];
		$this->USABLE_ON_day_3_FREEZING->DbValue = $row['USABLE ON day 3 FREEZING'];
		$this->D5_GARDE_A->DbValue = $row['D5 GARDE A'];
		$this->D5_GRADE_B->DbValue = $row['D5 GRADE B'];
		$this->D5_GRADE_C->DbValue = $row['D5 GRADE C'];
		$this->D5_GRADE_D->DbValue = $row['D5 GRADE D'];
		$this->USABLE_ON_D5_ET->DbValue = $row['USABLE ON D5 ET'];
		$this->USABLE_ON_D5_FREEZING->DbValue = $row['USABLE ON D5 FREEZING'];
		$this->D6_GRADE_A->DbValue = $row['D6 GRADE A'];
		$this->D6_GRADE_B->DbValue = $row['D6 GRADE B'];
		$this->D6_GRADE_C->DbValue = $row['D6 GRADE C'];
		$this->D6_GRADE_D->DbValue = $row['D6 GRADE D'];
		$this->D6_USABLE_EMBRYO_ET->DbValue = $row['D6 USABLE EMBRYO ET'];
		$this->D6_USABLE_FREEZING->DbValue = $row['D6 USABLE FREEZING'];
		$this->TOTAL_BLAST->DbValue = $row['TOTAL BLAST'];
		$this->PGS->DbValue = $row['PGS'];
		$this->REMARKS->DbValue = $row['REMARKS'];
		$this->PU___D2FB->DbValue = $row['PU - D/B'];
		$this->ICSI_D2FB->DbValue = $row['ICSI D/B'];
		$this->VIT_D2FB->DbValue = $row['VIT D/B'];
		$this->ET_D2FB->DbValue = $row['ET D/B'];
		$this->LAB_COMMENTS->DbValue = $row['LAB COMMENTS'];
		$this->Reason_for_no_FRESH_transfer->DbValue = $row['Reason for no FRESH transfer'];
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->DbValue = $row['No of embryos transferred Day 3/5, A,B,C'];
		$this->EMBRYOS_PENDING->DbValue = $row['EMBRYOS PENDING'];
		$this->DAY_OF_TRANSFER->DbValue = $row['DAY OF TRANSFER'];
		$this->H2FD_sperm->DbValue = $row['H/D sperm'];
		$this->Comments->DbValue = $row['Comments'];
		$this->sc_progesterone->DbValue = $row['sc progesterone'];
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->DbValue = $row['Natural micronised 400mg bd + duphaston 10mg bd'];
		$this->CRINONE->DbValue = $row['CRINONE'];
		$this->progynova->DbValue = $row['progynova'];
		$this->Heparin->DbValue = $row['Heparin'];
		$this->cabergolin->DbValue = $row['cabergolin'];
		$this->Antagonist->DbValue = $row['Antagonist'];
		$this->OHSS->DbValue = $row['OHSS'];
		$this->Complications->DbValue = $row['Complications'];
		$this->LP_bleeding->DbValue = $row['LP bleeding'];
		$this->DF_hCG->DbValue = $row['ß-hCG'];
		$this->Implantation_rate->DbValue = $row['Implantation rate'];
		$this->Ectopic->DbValue = $row['Ectopic'];
		$this->Type_of_preg->DbValue = $row['Type of preg'];
		$this->ANC->DbValue = $row['ANC'];
		$this->anomalies->DbValue = $row['anomalies'];
		$this->baby_wt->DbValue = $row['baby wt'];
		$this->GA_at_delivery->DbValue = $row['GA at delivery'];
		$this->Pregnancy_outcome->DbValue = $row['Pregnancy outcome'];
		$this->_1st_FET->DbValue = $row['1st FET'];
		$this->AFTER_HYSTEROSCOPY->DbValue = $row['AFTER HYSTEROSCOPY'];
		$this->AFTER_ERA->DbValue = $row['AFTER ERA'];
		$this->ERA->DbValue = $row['ERA'];
		$this->HRT->DbValue = $row['HRT'];
		$this->XGRAST2FPRP->DbValue = $row['XGRAST/PRP'];
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->DbValue = $row['EMBRYO DETAILS DAY 3/ 5, A, B, C'];
		$this->LMWH_40MG->DbValue = $row['LMWH 40MG'];
		$this->DF_hCG2->DbValue = $row['ß-hCG2'];
		$this->Implantation_rate1->DbValue = $row['Implantation rate1'];
		$this->Ectopic1->DbValue = $row['Ectopic1'];
		$this->Type_of_pregA->DbValue = $row['Type of pregA'];
		$this->ANC1->DbValue = $row['ANC1'];
		$this->anomalies2->DbValue = $row['anomalies2'];
		$this->baby_wt2->DbValue = $row['baby wt2'];
		$this->GA_at_delivery1->DbValue = $row['GA at delivery1'];
		$this->Pregnancy_outcome1->DbValue = $row['Pregnancy outcome1'];
		$this->_2ND_FET->DbValue = $row['2ND FET'];
		$this->AFTER_HYSTEROSCOPY1->DbValue = $row['AFTER HYSTEROSCOPY1'];
		$this->AFTER_ERA1->DbValue = $row['AFTER ERA1'];
		$this->ERA1->DbValue = $row['ERA1'];
		$this->HRT1->DbValue = $row['HRT1'];
		$this->XGRAST2FPRP1->DbValue = $row['XGRAST/PRP1'];
		$this->NUMBER_OF_EMBRYOS->DbValue = $row['NUMBER OF EMBRYOS'];
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->DbValue = $row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'];
		$this->INTRALIPID_AND_BARGLOBIN->DbValue = $row['INTRALIPID AND BARGLOBIN'];
		$this->LMWH_40MG1->DbValue = $row['LMWH 40MG1'];
		$this->DF_hCG1->DbValue = $row['ß-hCG1'];
		$this->Implantation_rate2->DbValue = $row['Implantation rate2'];
		$this->Ectopic2->DbValue = $row['Ectopic2'];
		$this->Type_of_preg2->DbValue = $row['Type of preg2'];
		$this->ANCA->DbValue = $row['ANCA'];
		$this->anomalies1->DbValue = $row['anomalies1'];
		$this->baby_wt1->DbValue = $row['baby wt1'];
		$this->GA_at_delivery2->DbValue = $row['GA at delivery2'];
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
			return "view_template_for_opulist.php";
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
		if ($pageName == "view_template_for_opuview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_template_for_opuedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_template_for_opuadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_template_for_opulist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_template_for_opuview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_template_for_opuview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_template_for_opuadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_template_for_opuadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_template_for_opuedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_template_for_opuadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_template_for_opudelete.php", $this->getUrlParm());
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
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Treatment->setDbValue($rs->fields('Treatment'));
		$this->Origin->setDbValue($rs->fields('Origin'));
		$this->MaleIndications->setDbValue($rs->fields('MaleIndications'));
		$this->FemaleIndications->setDbValue($rs->fields('FemaleIndications'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->A4ICSICycle->setDbValue($rs->fields('A4ICSICycle'));
		$this->TotalICSICycle->setDbValue($rs->fields('TotalICSICycle'));
		$this->TypeOfInfertility->setDbValue($rs->fields('TypeOfInfertility'));
		$this->RelevantHistory->setDbValue($rs->fields('RelevantHistory'));
		$this->IUICycles->setDbValue($rs->fields('IUICycles'));
		$this->AMH->setDbValue($rs->fields('AMH'));
		$this->FBMI->setDbValue($rs->fields('FBMI'));
		$this->ANTAGONISTSTARTDAY->setDbValue($rs->fields('ANTAGONISTSTARTDAY'));
		$this->OvarianSurgery->setDbValue($rs->fields('OvarianSurgery'));
		$this->OPUDATE->setDbValue($rs->fields('OPUDATE'));
		$this->RFSH1->setDbValue($rs->fields('RFSH1'));
		$this->RFSH2->setDbValue($rs->fields('RFSH2'));
		$this->RFSH3->setDbValue($rs->fields('RFSH3'));
		$this->E21->setDbValue($rs->fields('E21'));
		$this->Hysteroscopy->setDbValue($rs->fields('Hysteroscopy'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->Fweight->setDbValue($rs->fields('Fweight'));
		$this->AntiTPO->setDbValue($rs->fields('AntiTPO'));
		$this->AntiTG->setDbValue($rs->fields('AntiTG'));
		$this->PatientAge->setDbValue($rs->fields('PatientAge'));
		$this->PartnerAge->setDbValue($rs->fields('PartnerAge'));
		$this->CYCLES->setDbValue($rs->fields('CYCLES'));
		$this->MF->setDbValue($rs->fields('MF'));
		$this->CauseOfINFERTILITY->setDbValue($rs->fields('CauseOfINFERTILITY'));
		$this->SIS->setDbValue($rs->fields('SIS'));
		$this->Scratching->setDbValue($rs->fields('Scratching'));
		$this->Cannulation->setDbValue($rs->fields('Cannulation'));
		$this->MEPRATE->setDbValue($rs->fields('MEPRATE'));
		$this->R_OVARY->setDbValue($rs->fields('R.OVARY'));
		$this->R_AFC->setDbValue($rs->fields('R.AFC'));
		$this->L_OVARY->setDbValue($rs->fields('L.OVARY'));
		$this->L_AFC->setDbValue($rs->fields('L.AFC'));
		$this->LH1->setDbValue($rs->fields('LH1'));
		$this->E2->setDbValue($rs->fields('E2'));
		$this->StemCellInstallation->setDbValue($rs->fields('StemCellInstallation'));
		$this->DHEAS->setDbValue($rs->fields('DHEAS'));
		$this->Mtorr->setDbValue($rs->fields('Mtorr'));
		$this->AMH1->setDbValue($rs->fields('AMH1'));
		$this->LH->setDbValue($rs->fields('LH'));
		$this->BMI28MALE29->setDbValue($rs->fields('BMI(MALE)'));
		$this->MaleMedicalConditions->setDbValue($rs->fields('MaleMedicalConditions'));
		$this->MaleExamination->setDbValue($rs->fields('MaleExamination'));
		$this->SpermConcentration->setDbValue($rs->fields('SpermConcentration'));
		$this->SpermMotility28P26NP29->setDbValue($rs->fields('SpermMotility(P&NP)'));
		$this->SpermMorphology->setDbValue($rs->fields('SpermMorphology'));
		$this->SpermRetrival->setDbValue($rs->fields('SpermRetrival'));
		$this->M_Testosterone->setDbValue($rs->fields('M.Testosterone'));
		$this->DFI->setDbValue($rs->fields('DFI'));
		$this->PreRX->setDbValue($rs->fields('PreRX'));
		$this->CC_100->setDbValue($rs->fields('CC 100'));
		$this->RFSH1A->setDbValue($rs->fields('RFSH1A'));
		$this->HMG1->setDbValue($rs->fields('HMG1'));
		$this->RLH->setDbValue($rs->fields('RLH'));
		$this->HMG_HP->setDbValue($rs->fields('HMG_HP'));
		$this->day_of_HMG->setDbValue($rs->fields('day_of_HMG'));
		$this->Reason_for_HMG->setDbValue($rs->fields('Reason_for_HMG'));
		$this->RLH_day->setDbValue($rs->fields('RLH_day'));
		$this->DAYSOFSTIMULATION->setDbValue($rs->fields('DAYSOFSTIMULATION'));
		$this->Any_change_inbetween_28_Dose_added_2C_day29->setDbValue($rs->fields('Any change inbetween ( Dose added , day)'));
		$this->day_of_Anta->setDbValue($rs->fields('day of Anta'));
		$this->R_FSH_TD->setDbValue($rs->fields('R FSH TD'));
		$this->R_FSH_2B_HMG_TD->setDbValue($rs->fields('R FSH + HMG TD'));
		$this->R_FSH_2B_R_LH_TD->setDbValue($rs->fields('R FSH + R LH TD'));
		$this->HMG_TD->setDbValue($rs->fields('HMG TD'));
		$this->LH_TD->setDbValue($rs->fields('LH TD'));
		$this->D1_LH->setDbValue($rs->fields('D1 LH'));
		$this->D1_E2->setDbValue($rs->fields('D1 E2'));
		$this->Trigger_day_E2->setDbValue($rs->fields('Trigger day E2'));
		$this->Trigger_day_P4->setDbValue($rs->fields('Trigger day P4'));
		$this->Trigger_day_LH->setDbValue($rs->fields('Trigger day LH'));
		$this->VIT_D->setDbValue($rs->fields('VIT-D'));
		$this->TRIGGERR->setDbValue($rs->fields('TRIGGERR'));
		$this->BHCG_BEFORE_RETRIEVAL->setDbValue($rs->fields('BHCG BEFORE RETRIEVAL'));
		$this->LH__12_HRS->setDbValue($rs->fields('LH -12 HRS'));
		$this->P4__12_HRS->setDbValue($rs->fields('P4 -12 HRS'));
		$this->ET_on_hCG_day->setDbValue($rs->fields('ET on hCG day'));
		$this->ET_doppler->setDbValue($rs->fields('ET doppler'));
		$this->VI2FFI2FVFI->setDbValue($rs->fields('VI/FI/VFI'));
		$this->Endometrial_abnormality->setDbValue($rs->fields('Endometrial abnormality'));
		$this->AFC_ON_S1->setDbValue($rs->fields('AFC ON S1'));
		$this->TIME_OF_OPU_FROM_TRIGGER->setDbValue($rs->fields('TIME OF OPU FROM TRIGGER'));
		$this->SPERM_TYPE->setDbValue($rs->fields('SPERM TYPE'));
		$this->EXPECTED_ON_TRIGGER_DAY->setDbValue($rs->fields('EXPECTED ON TRIGGER DAY'));
		$this->OOCYTES_RETRIEVED->setDbValue($rs->fields('OOCYTES RETRIEVED'));
		$this->TIME_OF_DENUDATION->setDbValue($rs->fields('TIME OF DENUDATION'));
		$this->M_II->setDbValue($rs->fields('M-II'));
		$this->MI->setDbValue($rs->fields('MI'));
		$this->GV->setDbValue($rs->fields('GV'));
		$this->ICSI_TIME_FORM_OPU->setDbValue($rs->fields('ICSI TIME FORM OPU'));
		$this->FERT_28_2_PN_29->setDbValue($rs->fields('FERT ( 2 PN )'));
		$this->DEG->setDbValue($rs->fields('DEG'));
		$this->D3_GRADE_A->setDbValue($rs->fields('D3 GRADE A'));
		$this->D3_GRADE_B->setDbValue($rs->fields('D3 GRADE B'));
		$this->D3_GRADE_C->setDbValue($rs->fields('D3 GRADE C'));
		$this->D3_GRADE_D->setDbValue($rs->fields('D3 GRADE D'));
		$this->USABLE_ON_DAY_3_ET->setDbValue($rs->fields('USABLE ON DAY 3 ET'));
		$this->USABLE_ON_day_3_FREEZING->setDbValue($rs->fields('USABLE ON day 3 FREEZING'));
		$this->D5_GARDE_A->setDbValue($rs->fields('D5 GARDE A'));
		$this->D5_GRADE_B->setDbValue($rs->fields('D5 GRADE B'));
		$this->D5_GRADE_C->setDbValue($rs->fields('D5 GRADE C'));
		$this->D5_GRADE_D->setDbValue($rs->fields('D5 GRADE D'));
		$this->USABLE_ON_D5_ET->setDbValue($rs->fields('USABLE ON D5 ET'));
		$this->USABLE_ON_D5_FREEZING->setDbValue($rs->fields('USABLE ON D5 FREEZING'));
		$this->D6_GRADE_A->setDbValue($rs->fields('D6 GRADE A'));
		$this->D6_GRADE_B->setDbValue($rs->fields('D6 GRADE B'));
		$this->D6_GRADE_C->setDbValue($rs->fields('D6 GRADE C'));
		$this->D6_GRADE_D->setDbValue($rs->fields('D6 GRADE D'));
		$this->D6_USABLE_EMBRYO_ET->setDbValue($rs->fields('D6 USABLE EMBRYO ET'));
		$this->D6_USABLE_FREEZING->setDbValue($rs->fields('D6 USABLE FREEZING'));
		$this->TOTAL_BLAST->setDbValue($rs->fields('TOTAL BLAST'));
		$this->PGS->setDbValue($rs->fields('PGS'));
		$this->REMARKS->setDbValue($rs->fields('REMARKS'));
		$this->PU___D2FB->setDbValue($rs->fields('PU - D/B'));
		$this->ICSI_D2FB->setDbValue($rs->fields('ICSI D/B'));
		$this->VIT_D2FB->setDbValue($rs->fields('VIT D/B'));
		$this->ET_D2FB->setDbValue($rs->fields('ET D/B'));
		$this->LAB_COMMENTS->setDbValue($rs->fields('LAB COMMENTS'));
		$this->Reason_for_no_FRESH_transfer->setDbValue($rs->fields('Reason for no FRESH transfer'));
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->setDbValue($rs->fields('No of embryos transferred Day 3/5, A,B,C'));
		$this->EMBRYOS_PENDING->setDbValue($rs->fields('EMBRYOS PENDING'));
		$this->DAY_OF_TRANSFER->setDbValue($rs->fields('DAY OF TRANSFER'));
		$this->H2FD_sperm->setDbValue($rs->fields('H/D sperm'));
		$this->Comments->setDbValue($rs->fields('Comments'));
		$this->sc_progesterone->setDbValue($rs->fields('sc progesterone'));
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->setDbValue($rs->fields('Natural micronised 400mg bd + duphaston 10mg bd'));
		$this->CRINONE->setDbValue($rs->fields('CRINONE'));
		$this->progynova->setDbValue($rs->fields('progynova'));
		$this->Heparin->setDbValue($rs->fields('Heparin'));
		$this->cabergolin->setDbValue($rs->fields('cabergolin'));
		$this->Antagonist->setDbValue($rs->fields('Antagonist'));
		$this->OHSS->setDbValue($rs->fields('OHSS'));
		$this->Complications->setDbValue($rs->fields('Complications'));
		$this->LP_bleeding->setDbValue($rs->fields('LP bleeding'));
		$this->DF_hCG->setDbValue($rs->fields('ß-hCG'));
		$this->Implantation_rate->setDbValue($rs->fields('Implantation rate'));
		$this->Ectopic->setDbValue($rs->fields('Ectopic'));
		$this->Type_of_preg->setDbValue($rs->fields('Type of preg'));
		$this->ANC->setDbValue($rs->fields('ANC'));
		$this->anomalies->setDbValue($rs->fields('anomalies'));
		$this->baby_wt->setDbValue($rs->fields('baby wt'));
		$this->GA_at_delivery->setDbValue($rs->fields('GA at delivery'));
		$this->Pregnancy_outcome->setDbValue($rs->fields('Pregnancy outcome'));
		$this->_1st_FET->setDbValue($rs->fields('1st FET'));
		$this->AFTER_HYSTEROSCOPY->setDbValue($rs->fields('AFTER HYSTEROSCOPY'));
		$this->AFTER_ERA->setDbValue($rs->fields('AFTER ERA'));
		$this->ERA->setDbValue($rs->fields('ERA'));
		$this->HRT->setDbValue($rs->fields('HRT'));
		$this->XGRAST2FPRP->setDbValue($rs->fields('XGRAST/PRP'));
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->setDbValue($rs->fields('EMBRYO DETAILS DAY 3/ 5, A, B, C'));
		$this->LMWH_40MG->setDbValue($rs->fields('LMWH 40MG'));
		$this->DF_hCG2->setDbValue($rs->fields('ß-hCG2'));
		$this->Implantation_rate1->setDbValue($rs->fields('Implantation rate1'));
		$this->Ectopic1->setDbValue($rs->fields('Ectopic1'));
		$this->Type_of_pregA->setDbValue($rs->fields('Type of pregA'));
		$this->ANC1->setDbValue($rs->fields('ANC1'));
		$this->anomalies2->setDbValue($rs->fields('anomalies2'));
		$this->baby_wt2->setDbValue($rs->fields('baby wt2'));
		$this->GA_at_delivery1->setDbValue($rs->fields('GA at delivery1'));
		$this->Pregnancy_outcome1->setDbValue($rs->fields('Pregnancy outcome1'));
		$this->_2ND_FET->setDbValue($rs->fields('2ND FET'));
		$this->AFTER_HYSTEROSCOPY1->setDbValue($rs->fields('AFTER HYSTEROSCOPY1'));
		$this->AFTER_ERA1->setDbValue($rs->fields('AFTER ERA1'));
		$this->ERA1->setDbValue($rs->fields('ERA1'));
		$this->HRT1->setDbValue($rs->fields('HRT1'));
		$this->XGRAST2FPRP1->setDbValue($rs->fields('XGRAST/PRP1'));
		$this->NUMBER_OF_EMBRYOS->setDbValue($rs->fields('NUMBER OF EMBRYOS'));
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->setDbValue($rs->fields('EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'));
		$this->INTRALIPID_AND_BARGLOBIN->setDbValue($rs->fields('INTRALIPID AND BARGLOBIN'));
		$this->LMWH_40MG1->setDbValue($rs->fields('LMWH 40MG1'));
		$this->DF_hCG1->setDbValue($rs->fields('ß-hCG1'));
		$this->Implantation_rate2->setDbValue($rs->fields('Implantation rate2'));
		$this->Ectopic2->setDbValue($rs->fields('Ectopic2'));
		$this->Type_of_preg2->setDbValue($rs->fields('Type of preg2'));
		$this->ANCA->setDbValue($rs->fields('ANCA'));
		$this->anomalies1->setDbValue($rs->fields('anomalies1'));
		$this->baby_wt1->setDbValue($rs->fields('baby wt1'));
		$this->GA_at_delivery2->setDbValue($rs->fields('GA at delivery2'));
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
		$this->R_OVARY->ViewValue = $this->R_OVARY->CurrentValue;
		$this->R_OVARY->ViewCustomAttributes = "";

		// R.AFC
		$this->R_AFC->ViewValue = $this->R_AFC->CurrentValue;
		$this->R_AFC->ViewCustomAttributes = "";

		// L.OVARY
		$this->L_OVARY->ViewValue = $this->L_OVARY->CurrentValue;
		$this->L_OVARY->ViewCustomAttributes = "";

		// L.AFC
		$this->L_AFC->ViewValue = $this->L_AFC->CurrentValue;
		$this->L_AFC->ViewCustomAttributes = "";

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
		$this->BMI28MALE29->ViewValue = $this->BMI28MALE29->CurrentValue;
		$this->BMI28MALE29->ViewCustomAttributes = "";

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
		$this->SpermMotility28P26NP29->ViewValue = $this->SpermMotility28P26NP29->CurrentValue;
		$this->SpermMotility28P26NP29->ViewCustomAttributes = "";

		// SpermMorphology
		$this->SpermMorphology->ViewValue = $this->SpermMorphology->CurrentValue;
		$this->SpermMorphology->ViewCustomAttributes = "";

		// SpermRetrival
		$this->SpermRetrival->ViewValue = $this->SpermRetrival->CurrentValue;
		$this->SpermRetrival->ViewCustomAttributes = "";

		// M.Testosterone
		$this->M_Testosterone->ViewValue = $this->M_Testosterone->CurrentValue;
		$this->M_Testosterone->ViewCustomAttributes = "";

		// DFI
		$this->DFI->ViewValue = $this->DFI->CurrentValue;
		$this->DFI->ViewCustomAttributes = "";

		// PreRX
		$this->PreRX->ViewValue = $this->PreRX->CurrentValue;
		$this->PreRX->ViewCustomAttributes = "";

		// CC 100
		$this->CC_100->ViewValue = $this->CC_100->CurrentValue;
		$this->CC_100->ViewCustomAttributes = "";

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
		$this->Any_change_inbetween_28_Dose_added_2C_day29->ViewValue = $this->Any_change_inbetween_28_Dose_added_2C_day29->CurrentValue;
		$this->Any_change_inbetween_28_Dose_added_2C_day29->ViewCustomAttributes = "";

		// day of Anta
		$this->day_of_Anta->ViewValue = $this->day_of_Anta->CurrentValue;
		$this->day_of_Anta->ViewCustomAttributes = "";

		// R FSH TD
		$this->R_FSH_TD->ViewValue = $this->R_FSH_TD->CurrentValue;
		$this->R_FSH_TD->ViewCustomAttributes = "";

		// R FSH + HMG TD
		$this->R_FSH_2B_HMG_TD->ViewValue = $this->R_FSH_2B_HMG_TD->CurrentValue;
		$this->R_FSH_2B_HMG_TD->ViewCustomAttributes = "";

		// R FSH + R LH TD
		$this->R_FSH_2B_R_LH_TD->ViewValue = $this->R_FSH_2B_R_LH_TD->CurrentValue;
		$this->R_FSH_2B_R_LH_TD->ViewCustomAttributes = "";

		// HMG TD
		$this->HMG_TD->ViewValue = $this->HMG_TD->CurrentValue;
		$this->HMG_TD->ViewCustomAttributes = "";

		// LH TD
		$this->LH_TD->ViewValue = $this->LH_TD->CurrentValue;
		$this->LH_TD->ViewCustomAttributes = "";

		// D1 LH
		$this->D1_LH->ViewValue = $this->D1_LH->CurrentValue;
		$this->D1_LH->ViewCustomAttributes = "";

		// D1 E2
		$this->D1_E2->ViewValue = $this->D1_E2->CurrentValue;
		$this->D1_E2->ViewCustomAttributes = "";

		// Trigger day E2
		$this->Trigger_day_E2->ViewValue = $this->Trigger_day_E2->CurrentValue;
		$this->Trigger_day_E2->ViewCustomAttributes = "";

		// Trigger day P4
		$this->Trigger_day_P4->ViewValue = $this->Trigger_day_P4->CurrentValue;
		$this->Trigger_day_P4->ViewCustomAttributes = "";

		// Trigger day LH
		$this->Trigger_day_LH->ViewValue = $this->Trigger_day_LH->CurrentValue;
		$this->Trigger_day_LH->ViewCustomAttributes = "";

		// VIT-D
		$this->VIT_D->ViewValue = $this->VIT_D->CurrentValue;
		$this->VIT_D->ViewCustomAttributes = "";

		// TRIGGERR
		$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
		$this->TRIGGERR->ViewCustomAttributes = "";

		// BHCG BEFORE RETRIEVAL
		$this->BHCG_BEFORE_RETRIEVAL->ViewValue = $this->BHCG_BEFORE_RETRIEVAL->CurrentValue;
		$this->BHCG_BEFORE_RETRIEVAL->ViewCustomAttributes = "";

		// LH -12 HRS
		$this->LH__12_HRS->ViewValue = $this->LH__12_HRS->CurrentValue;
		$this->LH__12_HRS->ViewCustomAttributes = "";

		// P4 -12 HRS
		$this->P4__12_HRS->ViewValue = $this->P4__12_HRS->CurrentValue;
		$this->P4__12_HRS->ViewCustomAttributes = "";

		// ET on hCG day
		$this->ET_on_hCG_day->ViewValue = $this->ET_on_hCG_day->CurrentValue;
		$this->ET_on_hCG_day->ViewCustomAttributes = "";

		// ET doppler
		$this->ET_doppler->ViewValue = $this->ET_doppler->CurrentValue;
		$this->ET_doppler->ViewCustomAttributes = "";

		// VI/FI/VFI
		$this->VI2FFI2FVFI->ViewValue = $this->VI2FFI2FVFI->CurrentValue;
		$this->VI2FFI2FVFI->ViewCustomAttributes = "";

		// Endometrial abnormality
		$this->Endometrial_abnormality->ViewValue = $this->Endometrial_abnormality->CurrentValue;
		$this->Endometrial_abnormality->ViewCustomAttributes = "";

		// AFC ON S1
		$this->AFC_ON_S1->ViewValue = $this->AFC_ON_S1->CurrentValue;
		$this->AFC_ON_S1->ViewCustomAttributes = "";

		// TIME OF OPU FROM TRIGGER
		$this->TIME_OF_OPU_FROM_TRIGGER->ViewValue = $this->TIME_OF_OPU_FROM_TRIGGER->CurrentValue;
		$this->TIME_OF_OPU_FROM_TRIGGER->ViewCustomAttributes = "";

		// SPERM TYPE
		$this->SPERM_TYPE->ViewValue = $this->SPERM_TYPE->CurrentValue;
		$this->SPERM_TYPE->ViewCustomAttributes = "";

		// EXPECTED ON TRIGGER DAY
		$this->EXPECTED_ON_TRIGGER_DAY->ViewValue = $this->EXPECTED_ON_TRIGGER_DAY->CurrentValue;
		$this->EXPECTED_ON_TRIGGER_DAY->ViewCustomAttributes = "";

		// OOCYTES RETRIEVED
		$this->OOCYTES_RETRIEVED->ViewValue = $this->OOCYTES_RETRIEVED->CurrentValue;
		$this->OOCYTES_RETRIEVED->ViewCustomAttributes = "";

		// TIME OF DENUDATION
		$this->TIME_OF_DENUDATION->ViewValue = $this->TIME_OF_DENUDATION->CurrentValue;
		$this->TIME_OF_DENUDATION->ViewCustomAttributes = "";

		// M-II
		$this->M_II->ViewValue = $this->M_II->CurrentValue;
		$this->M_II->ViewCustomAttributes = "";

		// MI
		$this->MI->ViewValue = $this->MI->CurrentValue;
		$this->MI->ViewCustomAttributes = "";

		// GV
		$this->GV->ViewValue = $this->GV->CurrentValue;
		$this->GV->ViewCustomAttributes = "";

		// ICSI TIME FORM OPU
		$this->ICSI_TIME_FORM_OPU->ViewValue = $this->ICSI_TIME_FORM_OPU->CurrentValue;
		$this->ICSI_TIME_FORM_OPU->ViewCustomAttributes = "";

		// FERT ( 2 PN )
		$this->FERT_28_2_PN_29->ViewValue = $this->FERT_28_2_PN_29->CurrentValue;
		$this->FERT_28_2_PN_29->ViewCustomAttributes = "";

		// DEG
		$this->DEG->ViewValue = $this->DEG->CurrentValue;
		$this->DEG->ViewCustomAttributes = "";

		// D3 GRADE A
		$this->D3_GRADE_A->ViewValue = $this->D3_GRADE_A->CurrentValue;
		$this->D3_GRADE_A->ViewCustomAttributes = "";

		// D3 GRADE B
		$this->D3_GRADE_B->ViewValue = $this->D3_GRADE_B->CurrentValue;
		$this->D3_GRADE_B->ViewCustomAttributes = "";

		// D3 GRADE C
		$this->D3_GRADE_C->ViewValue = $this->D3_GRADE_C->CurrentValue;
		$this->D3_GRADE_C->ViewCustomAttributes = "";

		// D3 GRADE D
		$this->D3_GRADE_D->ViewValue = $this->D3_GRADE_D->CurrentValue;
		$this->D3_GRADE_D->ViewCustomAttributes = "";

		// USABLE ON DAY 3 ET
		$this->USABLE_ON_DAY_3_ET->ViewValue = $this->USABLE_ON_DAY_3_ET->CurrentValue;
		$this->USABLE_ON_DAY_3_ET->ViewCustomAttributes = "";

		// USABLE ON day 3 FREEZING
		$this->USABLE_ON_day_3_FREEZING->ViewValue = $this->USABLE_ON_day_3_FREEZING->CurrentValue;
		$this->USABLE_ON_day_3_FREEZING->ViewCustomAttributes = "";

		// D5 GARDE A
		$this->D5_GARDE_A->ViewValue = $this->D5_GARDE_A->CurrentValue;
		$this->D5_GARDE_A->ViewCustomAttributes = "";

		// D5 GRADE B
		$this->D5_GRADE_B->ViewValue = $this->D5_GRADE_B->CurrentValue;
		$this->D5_GRADE_B->ViewCustomAttributes = "";

		// D5 GRADE C
		$this->D5_GRADE_C->ViewValue = $this->D5_GRADE_C->CurrentValue;
		$this->D5_GRADE_C->ViewCustomAttributes = "";

		// D5 GRADE D
		$this->D5_GRADE_D->ViewValue = $this->D5_GRADE_D->CurrentValue;
		$this->D5_GRADE_D->ViewCustomAttributes = "";

		// USABLE ON D5 ET
		$this->USABLE_ON_D5_ET->ViewValue = $this->USABLE_ON_D5_ET->CurrentValue;
		$this->USABLE_ON_D5_ET->ViewCustomAttributes = "";

		// USABLE ON D5 FREEZING
		$this->USABLE_ON_D5_FREEZING->ViewValue = $this->USABLE_ON_D5_FREEZING->CurrentValue;
		$this->USABLE_ON_D5_FREEZING->ViewCustomAttributes = "";

		// D6 GRADE A
		$this->D6_GRADE_A->ViewValue = $this->D6_GRADE_A->CurrentValue;
		$this->D6_GRADE_A->ViewCustomAttributes = "";

		// D6 GRADE B
		$this->D6_GRADE_B->ViewValue = $this->D6_GRADE_B->CurrentValue;
		$this->D6_GRADE_B->ViewCustomAttributes = "";

		// D6 GRADE C
		$this->D6_GRADE_C->ViewValue = $this->D6_GRADE_C->CurrentValue;
		$this->D6_GRADE_C->ViewCustomAttributes = "";

		// D6 GRADE D
		$this->D6_GRADE_D->ViewValue = $this->D6_GRADE_D->CurrentValue;
		$this->D6_GRADE_D->ViewCustomAttributes = "";

		// D6 USABLE EMBRYO ET
		$this->D6_USABLE_EMBRYO_ET->ViewValue = $this->D6_USABLE_EMBRYO_ET->CurrentValue;
		$this->D6_USABLE_EMBRYO_ET->ViewCustomAttributes = "";

		// D6 USABLE FREEZING
		$this->D6_USABLE_FREEZING->ViewValue = $this->D6_USABLE_FREEZING->CurrentValue;
		$this->D6_USABLE_FREEZING->ViewCustomAttributes = "";

		// TOTAL BLAST
		$this->TOTAL_BLAST->ViewValue = $this->TOTAL_BLAST->CurrentValue;
		$this->TOTAL_BLAST->ViewCustomAttributes = "";

		// PGS
		$this->PGS->ViewValue = $this->PGS->CurrentValue;
		$this->PGS->ViewCustomAttributes = "";

		// REMARKS
		$this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
		$this->REMARKS->ViewCustomAttributes = "";

		// PU - D/B
		$this->PU___D2FB->ViewValue = $this->PU___D2FB->CurrentValue;
		$this->PU___D2FB->ViewCustomAttributes = "";

		// ICSI D/B
		$this->ICSI_D2FB->ViewValue = $this->ICSI_D2FB->CurrentValue;
		$this->ICSI_D2FB->ViewCustomAttributes = "";

		// VIT D/B
		$this->VIT_D2FB->ViewValue = $this->VIT_D2FB->CurrentValue;
		$this->VIT_D2FB->ViewCustomAttributes = "";

		// ET D/B
		$this->ET_D2FB->ViewValue = $this->ET_D2FB->CurrentValue;
		$this->ET_D2FB->ViewCustomAttributes = "";

		// LAB COMMENTS
		$this->LAB_COMMENTS->ViewValue = $this->LAB_COMMENTS->CurrentValue;
		$this->LAB_COMMENTS->ViewCustomAttributes = "";

		// Reason for no FRESH transfer
		$this->Reason_for_no_FRESH_transfer->ViewValue = $this->Reason_for_no_FRESH_transfer->CurrentValue;
		$this->Reason_for_no_FRESH_transfer->ViewCustomAttributes = "";

		// No of embryos transferred Day 3/5, A,B,C
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->ViewValue = $this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->CurrentValue;
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->ViewCustomAttributes = "";

		// EMBRYOS PENDING
		$this->EMBRYOS_PENDING->ViewValue = $this->EMBRYOS_PENDING->CurrentValue;
		$this->EMBRYOS_PENDING->ViewCustomAttributes = "";

		// DAY OF TRANSFER
		$this->DAY_OF_TRANSFER->ViewValue = $this->DAY_OF_TRANSFER->CurrentValue;
		$this->DAY_OF_TRANSFER->ViewCustomAttributes = "";

		// H/D sperm
		$this->H2FD_sperm->ViewValue = $this->H2FD_sperm->CurrentValue;
		$this->H2FD_sperm->ViewCustomAttributes = "";

		// Comments
		$this->Comments->ViewValue = $this->Comments->CurrentValue;
		$this->Comments->ViewCustomAttributes = "";

		// sc progesterone
		$this->sc_progesterone->ViewValue = $this->sc_progesterone->CurrentValue;
		$this->sc_progesterone->ViewCustomAttributes = "";

		// Natural micronised 400mg bd + duphaston 10mg bd
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->ViewValue = $this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->CurrentValue;
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->ViewCustomAttributes = "";

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
		$this->LP_bleeding->ViewValue = $this->LP_bleeding->CurrentValue;
		$this->LP_bleeding->ViewCustomAttributes = "";

		// ß-hCG
		$this->DF_hCG->ViewValue = $this->DF_hCG->CurrentValue;
		$this->DF_hCG->ViewCustomAttributes = "";

		// Implantation rate
		$this->Implantation_rate->ViewValue = $this->Implantation_rate->CurrentValue;
		$this->Implantation_rate->ViewCustomAttributes = "";

		// Ectopic
		$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->ViewCustomAttributes = "";

		// Type of preg
		$this->Type_of_preg->ViewValue = $this->Type_of_preg->CurrentValue;
		$this->Type_of_preg->ViewCustomAttributes = "";

		// ANC
		$this->ANC->ViewValue = $this->ANC->CurrentValue;
		$this->ANC->ViewCustomAttributes = "";

		// anomalies
		$this->anomalies->ViewValue = $this->anomalies->CurrentValue;
		$this->anomalies->ViewCustomAttributes = "";

		// baby wt
		$this->baby_wt->ViewValue = $this->baby_wt->CurrentValue;
		$this->baby_wt->ViewCustomAttributes = "";

		// GA at delivery
		$this->GA_at_delivery->ViewValue = $this->GA_at_delivery->CurrentValue;
		$this->GA_at_delivery->ViewCustomAttributes = "";

		// Pregnancy outcome
		$this->Pregnancy_outcome->ViewValue = $this->Pregnancy_outcome->CurrentValue;
		$this->Pregnancy_outcome->ViewCustomAttributes = "";

		// 1st FET
		$this->_1st_FET->ViewValue = $this->_1st_FET->CurrentValue;
		$this->_1st_FET->ViewCustomAttributes = "";

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->ViewValue = $this->AFTER_HYSTEROSCOPY->CurrentValue;
		$this->AFTER_HYSTEROSCOPY->ViewCustomAttributes = "";

		// AFTER ERA
		$this->AFTER_ERA->ViewValue = $this->AFTER_ERA->CurrentValue;
		$this->AFTER_ERA->ViewCustomAttributes = "";

		// ERA
		$this->ERA->ViewValue = $this->ERA->CurrentValue;
		$this->ERA->ViewCustomAttributes = "";

		// HRT
		$this->HRT->ViewValue = $this->HRT->CurrentValue;
		$this->HRT->ViewCustomAttributes = "";

		// XGRAST/PRP
		$this->XGRAST2FPRP->ViewValue = $this->XGRAST2FPRP->CurrentValue;
		$this->XGRAST2FPRP->ViewCustomAttributes = "";

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->ViewValue = $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->ViewCustomAttributes = "";

		// LMWH 40MG
		$this->LMWH_40MG->ViewValue = $this->LMWH_40MG->CurrentValue;
		$this->LMWH_40MG->ViewCustomAttributes = "";

		// ß-hCG2
		$this->DF_hCG2->ViewValue = $this->DF_hCG2->CurrentValue;
		$this->DF_hCG2->ViewCustomAttributes = "";

		// Implantation rate1
		$this->Implantation_rate1->ViewValue = $this->Implantation_rate1->CurrentValue;
		$this->Implantation_rate1->ViewCustomAttributes = "";

		// Ectopic1
		$this->Ectopic1->ViewValue = $this->Ectopic1->CurrentValue;
		$this->Ectopic1->ViewCustomAttributes = "";

		// Type of pregA
		$this->Type_of_pregA->ViewValue = $this->Type_of_pregA->CurrentValue;
		$this->Type_of_pregA->ViewCustomAttributes = "";

		// ANC1
		$this->ANC1->ViewValue = $this->ANC1->CurrentValue;
		$this->ANC1->ViewCustomAttributes = "";

		// anomalies2
		$this->anomalies2->ViewValue = $this->anomalies2->CurrentValue;
		$this->anomalies2->ViewCustomAttributes = "";

		// baby wt2
		$this->baby_wt2->ViewValue = $this->baby_wt2->CurrentValue;
		$this->baby_wt2->ViewCustomAttributes = "";

		// GA at delivery1
		$this->GA_at_delivery1->ViewValue = $this->GA_at_delivery1->CurrentValue;
		$this->GA_at_delivery1->ViewCustomAttributes = "";

		// Pregnancy outcome1
		$this->Pregnancy_outcome1->ViewValue = $this->Pregnancy_outcome1->CurrentValue;
		$this->Pregnancy_outcome1->ViewCustomAttributes = "";

		// 2ND FET
		$this->_2ND_FET->ViewValue = $this->_2ND_FET->CurrentValue;
		$this->_2ND_FET->ViewCustomAttributes = "";

		// AFTER HYSTEROSCOPY1
		$this->AFTER_HYSTEROSCOPY1->ViewValue = $this->AFTER_HYSTEROSCOPY1->CurrentValue;
		$this->AFTER_HYSTEROSCOPY1->ViewCustomAttributes = "";

		// AFTER ERA1
		$this->AFTER_ERA1->ViewValue = $this->AFTER_ERA1->CurrentValue;
		$this->AFTER_ERA1->ViewCustomAttributes = "";

		// ERA1
		$this->ERA1->ViewValue = $this->ERA1->CurrentValue;
		$this->ERA1->ViewCustomAttributes = "";

		// HRT1
		$this->HRT1->ViewValue = $this->HRT1->CurrentValue;
		$this->HRT1->ViewCustomAttributes = "";

		// XGRAST/PRP1
		$this->XGRAST2FPRP1->ViewValue = $this->XGRAST2FPRP1->CurrentValue;
		$this->XGRAST2FPRP1->ViewCustomAttributes = "";

		// NUMBER OF EMBRYOS
		$this->NUMBER_OF_EMBRYOS->ViewValue = $this->NUMBER_OF_EMBRYOS->CurrentValue;
		$this->NUMBER_OF_EMBRYOS->ViewCustomAttributes = "";

		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->ViewValue = $this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->ViewCustomAttributes = "";

		// INTRALIPID AND BARGLOBIN
		$this->INTRALIPID_AND_BARGLOBIN->ViewValue = $this->INTRALIPID_AND_BARGLOBIN->CurrentValue;
		$this->INTRALIPID_AND_BARGLOBIN->ViewCustomAttributes = "";

		// LMWH 40MG1
		$this->LMWH_40MG1->ViewValue = $this->LMWH_40MG1->CurrentValue;
		$this->LMWH_40MG1->ViewCustomAttributes = "";

		// ß-hCG1
		$this->DF_hCG1->ViewValue = $this->DF_hCG1->CurrentValue;
		$this->DF_hCG1->ViewCustomAttributes = "";

		// Implantation rate2
		$this->Implantation_rate2->ViewValue = $this->Implantation_rate2->CurrentValue;
		$this->Implantation_rate2->ViewCustomAttributes = "";

		// Ectopic2
		$this->Ectopic2->ViewValue = $this->Ectopic2->CurrentValue;
		$this->Ectopic2->ViewCustomAttributes = "";

		// Type of preg2
		$this->Type_of_preg2->ViewValue = $this->Type_of_preg2->CurrentValue;
		$this->Type_of_preg2->ViewCustomAttributes = "";

		// ANCA
		$this->ANCA->ViewValue = $this->ANCA->CurrentValue;
		$this->ANCA->ViewCustomAttributes = "";

		// anomalies1
		$this->anomalies1->ViewValue = $this->anomalies1->CurrentValue;
		$this->anomalies1->ViewCustomAttributes = "";

		// baby wt1
		$this->baby_wt1->ViewValue = $this->baby_wt1->CurrentValue;
		$this->baby_wt1->ViewCustomAttributes = "";

		// GA at delivery2
		$this->GA_at_delivery2->ViewValue = $this->GA_at_delivery2->CurrentValue;
		$this->GA_at_delivery2->ViewCustomAttributes = "";

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
		$this->R_OVARY->LinkCustomAttributes = "";
		$this->R_OVARY->HrefValue = "";
		$this->R_OVARY->TooltipValue = "";

		// R.AFC
		$this->R_AFC->LinkCustomAttributes = "";
		$this->R_AFC->HrefValue = "";
		$this->R_AFC->TooltipValue = "";

		// L.OVARY
		$this->L_OVARY->LinkCustomAttributes = "";
		$this->L_OVARY->HrefValue = "";
		$this->L_OVARY->TooltipValue = "";

		// L.AFC
		$this->L_AFC->LinkCustomAttributes = "";
		$this->L_AFC->HrefValue = "";
		$this->L_AFC->TooltipValue = "";

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
		$this->BMI28MALE29->LinkCustomAttributes = "";
		$this->BMI28MALE29->HrefValue = "";
		$this->BMI28MALE29->TooltipValue = "";

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
		$this->SpermMotility28P26NP29->LinkCustomAttributes = "";
		$this->SpermMotility28P26NP29->HrefValue = "";
		$this->SpermMotility28P26NP29->TooltipValue = "";

		// SpermMorphology
		$this->SpermMorphology->LinkCustomAttributes = "";
		$this->SpermMorphology->HrefValue = "";
		$this->SpermMorphology->TooltipValue = "";

		// SpermRetrival
		$this->SpermRetrival->LinkCustomAttributes = "";
		$this->SpermRetrival->HrefValue = "";
		$this->SpermRetrival->TooltipValue = "";

		// M.Testosterone
		$this->M_Testosterone->LinkCustomAttributes = "";
		$this->M_Testosterone->HrefValue = "";
		$this->M_Testosterone->TooltipValue = "";

		// DFI
		$this->DFI->LinkCustomAttributes = "";
		$this->DFI->HrefValue = "";
		$this->DFI->TooltipValue = "";

		// PreRX
		$this->PreRX->LinkCustomAttributes = "";
		$this->PreRX->HrefValue = "";
		$this->PreRX->TooltipValue = "";

		// CC 100
		$this->CC_100->LinkCustomAttributes = "";
		$this->CC_100->HrefValue = "";
		$this->CC_100->TooltipValue = "";

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
		$this->Any_change_inbetween_28_Dose_added_2C_day29->LinkCustomAttributes = "";
		$this->Any_change_inbetween_28_Dose_added_2C_day29->HrefValue = "";
		$this->Any_change_inbetween_28_Dose_added_2C_day29->TooltipValue = "";

		// day of Anta
		$this->day_of_Anta->LinkCustomAttributes = "";
		$this->day_of_Anta->HrefValue = "";
		$this->day_of_Anta->TooltipValue = "";

		// R FSH TD
		$this->R_FSH_TD->LinkCustomAttributes = "";
		$this->R_FSH_TD->HrefValue = "";
		$this->R_FSH_TD->TooltipValue = "";

		// R FSH + HMG TD
		$this->R_FSH_2B_HMG_TD->LinkCustomAttributes = "";
		$this->R_FSH_2B_HMG_TD->HrefValue = "";
		$this->R_FSH_2B_HMG_TD->TooltipValue = "";

		// R FSH + R LH TD
		$this->R_FSH_2B_R_LH_TD->LinkCustomAttributes = "";
		$this->R_FSH_2B_R_LH_TD->HrefValue = "";
		$this->R_FSH_2B_R_LH_TD->TooltipValue = "";

		// HMG TD
		$this->HMG_TD->LinkCustomAttributes = "";
		$this->HMG_TD->HrefValue = "";
		$this->HMG_TD->TooltipValue = "";

		// LH TD
		$this->LH_TD->LinkCustomAttributes = "";
		$this->LH_TD->HrefValue = "";
		$this->LH_TD->TooltipValue = "";

		// D1 LH
		$this->D1_LH->LinkCustomAttributes = "";
		$this->D1_LH->HrefValue = "";
		$this->D1_LH->TooltipValue = "";

		// D1 E2
		$this->D1_E2->LinkCustomAttributes = "";
		$this->D1_E2->HrefValue = "";
		$this->D1_E2->TooltipValue = "";

		// Trigger day E2
		$this->Trigger_day_E2->LinkCustomAttributes = "";
		$this->Trigger_day_E2->HrefValue = "";
		$this->Trigger_day_E2->TooltipValue = "";

		// Trigger day P4
		$this->Trigger_day_P4->LinkCustomAttributes = "";
		$this->Trigger_day_P4->HrefValue = "";
		$this->Trigger_day_P4->TooltipValue = "";

		// Trigger day LH
		$this->Trigger_day_LH->LinkCustomAttributes = "";
		$this->Trigger_day_LH->HrefValue = "";
		$this->Trigger_day_LH->TooltipValue = "";

		// VIT-D
		$this->VIT_D->LinkCustomAttributes = "";
		$this->VIT_D->HrefValue = "";
		$this->VIT_D->TooltipValue = "";

		// TRIGGERR
		$this->TRIGGERR->LinkCustomAttributes = "";
		$this->TRIGGERR->HrefValue = "";
		$this->TRIGGERR->TooltipValue = "";

		// BHCG BEFORE RETRIEVAL
		$this->BHCG_BEFORE_RETRIEVAL->LinkCustomAttributes = "";
		$this->BHCG_BEFORE_RETRIEVAL->HrefValue = "";
		$this->BHCG_BEFORE_RETRIEVAL->TooltipValue = "";

		// LH -12 HRS
		$this->LH__12_HRS->LinkCustomAttributes = "";
		$this->LH__12_HRS->HrefValue = "";
		$this->LH__12_HRS->TooltipValue = "";

		// P4 -12 HRS
		$this->P4__12_HRS->LinkCustomAttributes = "";
		$this->P4__12_HRS->HrefValue = "";
		$this->P4__12_HRS->TooltipValue = "";

		// ET on hCG day
		$this->ET_on_hCG_day->LinkCustomAttributes = "";
		$this->ET_on_hCG_day->HrefValue = "";
		$this->ET_on_hCG_day->TooltipValue = "";

		// ET doppler
		$this->ET_doppler->LinkCustomAttributes = "";
		$this->ET_doppler->HrefValue = "";
		$this->ET_doppler->TooltipValue = "";

		// VI/FI/VFI
		$this->VI2FFI2FVFI->LinkCustomAttributes = "";
		$this->VI2FFI2FVFI->HrefValue = "";
		$this->VI2FFI2FVFI->TooltipValue = "";

		// Endometrial abnormality
		$this->Endometrial_abnormality->LinkCustomAttributes = "";
		$this->Endometrial_abnormality->HrefValue = "";
		$this->Endometrial_abnormality->TooltipValue = "";

		// AFC ON S1
		$this->AFC_ON_S1->LinkCustomAttributes = "";
		$this->AFC_ON_S1->HrefValue = "";
		$this->AFC_ON_S1->TooltipValue = "";

		// TIME OF OPU FROM TRIGGER
		$this->TIME_OF_OPU_FROM_TRIGGER->LinkCustomAttributes = "";
		$this->TIME_OF_OPU_FROM_TRIGGER->HrefValue = "";
		$this->TIME_OF_OPU_FROM_TRIGGER->TooltipValue = "";

		// SPERM TYPE
		$this->SPERM_TYPE->LinkCustomAttributes = "";
		$this->SPERM_TYPE->HrefValue = "";
		$this->SPERM_TYPE->TooltipValue = "";

		// EXPECTED ON TRIGGER DAY
		$this->EXPECTED_ON_TRIGGER_DAY->LinkCustomAttributes = "";
		$this->EXPECTED_ON_TRIGGER_DAY->HrefValue = "";
		$this->EXPECTED_ON_TRIGGER_DAY->TooltipValue = "";

		// OOCYTES RETRIEVED
		$this->OOCYTES_RETRIEVED->LinkCustomAttributes = "";
		$this->OOCYTES_RETRIEVED->HrefValue = "";
		$this->OOCYTES_RETRIEVED->TooltipValue = "";

		// TIME OF DENUDATION
		$this->TIME_OF_DENUDATION->LinkCustomAttributes = "";
		$this->TIME_OF_DENUDATION->HrefValue = "";
		$this->TIME_OF_DENUDATION->TooltipValue = "";

		// M-II
		$this->M_II->LinkCustomAttributes = "";
		$this->M_II->HrefValue = "";
		$this->M_II->TooltipValue = "";

		// MI
		$this->MI->LinkCustomAttributes = "";
		$this->MI->HrefValue = "";
		$this->MI->TooltipValue = "";

		// GV
		$this->GV->LinkCustomAttributes = "";
		$this->GV->HrefValue = "";
		$this->GV->TooltipValue = "";

		// ICSI TIME FORM OPU
		$this->ICSI_TIME_FORM_OPU->LinkCustomAttributes = "";
		$this->ICSI_TIME_FORM_OPU->HrefValue = "";
		$this->ICSI_TIME_FORM_OPU->TooltipValue = "";

		// FERT ( 2 PN )
		$this->FERT_28_2_PN_29->LinkCustomAttributes = "";
		$this->FERT_28_2_PN_29->HrefValue = "";
		$this->FERT_28_2_PN_29->TooltipValue = "";

		// DEG
		$this->DEG->LinkCustomAttributes = "";
		$this->DEG->HrefValue = "";
		$this->DEG->TooltipValue = "";

		// D3 GRADE A
		$this->D3_GRADE_A->LinkCustomAttributes = "";
		$this->D3_GRADE_A->HrefValue = "";
		$this->D3_GRADE_A->TooltipValue = "";

		// D3 GRADE B
		$this->D3_GRADE_B->LinkCustomAttributes = "";
		$this->D3_GRADE_B->HrefValue = "";
		$this->D3_GRADE_B->TooltipValue = "";

		// D3 GRADE C
		$this->D3_GRADE_C->LinkCustomAttributes = "";
		$this->D3_GRADE_C->HrefValue = "";
		$this->D3_GRADE_C->TooltipValue = "";

		// D3 GRADE D
		$this->D3_GRADE_D->LinkCustomAttributes = "";
		$this->D3_GRADE_D->HrefValue = "";
		$this->D3_GRADE_D->TooltipValue = "";

		// USABLE ON DAY 3 ET
		$this->USABLE_ON_DAY_3_ET->LinkCustomAttributes = "";
		$this->USABLE_ON_DAY_3_ET->HrefValue = "";
		$this->USABLE_ON_DAY_3_ET->TooltipValue = "";

		// USABLE ON day 3 FREEZING
		$this->USABLE_ON_day_3_FREEZING->LinkCustomAttributes = "";
		$this->USABLE_ON_day_3_FREEZING->HrefValue = "";
		$this->USABLE_ON_day_3_FREEZING->TooltipValue = "";

		// D5 GARDE A
		$this->D5_GARDE_A->LinkCustomAttributes = "";
		$this->D5_GARDE_A->HrefValue = "";
		$this->D5_GARDE_A->TooltipValue = "";

		// D5 GRADE B
		$this->D5_GRADE_B->LinkCustomAttributes = "";
		$this->D5_GRADE_B->HrefValue = "";
		$this->D5_GRADE_B->TooltipValue = "";

		// D5 GRADE C
		$this->D5_GRADE_C->LinkCustomAttributes = "";
		$this->D5_GRADE_C->HrefValue = "";
		$this->D5_GRADE_C->TooltipValue = "";

		// D5 GRADE D
		$this->D5_GRADE_D->LinkCustomAttributes = "";
		$this->D5_GRADE_D->HrefValue = "";
		$this->D5_GRADE_D->TooltipValue = "";

		// USABLE ON D5 ET
		$this->USABLE_ON_D5_ET->LinkCustomAttributes = "";
		$this->USABLE_ON_D5_ET->HrefValue = "";
		$this->USABLE_ON_D5_ET->TooltipValue = "";

		// USABLE ON D5 FREEZING
		$this->USABLE_ON_D5_FREEZING->LinkCustomAttributes = "";
		$this->USABLE_ON_D5_FREEZING->HrefValue = "";
		$this->USABLE_ON_D5_FREEZING->TooltipValue = "";

		// D6 GRADE A
		$this->D6_GRADE_A->LinkCustomAttributes = "";
		$this->D6_GRADE_A->HrefValue = "";
		$this->D6_GRADE_A->TooltipValue = "";

		// D6 GRADE B
		$this->D6_GRADE_B->LinkCustomAttributes = "";
		$this->D6_GRADE_B->HrefValue = "";
		$this->D6_GRADE_B->TooltipValue = "";

		// D6 GRADE C
		$this->D6_GRADE_C->LinkCustomAttributes = "";
		$this->D6_GRADE_C->HrefValue = "";
		$this->D6_GRADE_C->TooltipValue = "";

		// D6 GRADE D
		$this->D6_GRADE_D->LinkCustomAttributes = "";
		$this->D6_GRADE_D->HrefValue = "";
		$this->D6_GRADE_D->TooltipValue = "";

		// D6 USABLE EMBRYO ET
		$this->D6_USABLE_EMBRYO_ET->LinkCustomAttributes = "";
		$this->D6_USABLE_EMBRYO_ET->HrefValue = "";
		$this->D6_USABLE_EMBRYO_ET->TooltipValue = "";

		// D6 USABLE FREEZING
		$this->D6_USABLE_FREEZING->LinkCustomAttributes = "";
		$this->D6_USABLE_FREEZING->HrefValue = "";
		$this->D6_USABLE_FREEZING->TooltipValue = "";

		// TOTAL BLAST
		$this->TOTAL_BLAST->LinkCustomAttributes = "";
		$this->TOTAL_BLAST->HrefValue = "";
		$this->TOTAL_BLAST->TooltipValue = "";

		// PGS
		$this->PGS->LinkCustomAttributes = "";
		$this->PGS->HrefValue = "";
		$this->PGS->TooltipValue = "";

		// REMARKS
		$this->REMARKS->LinkCustomAttributes = "";
		$this->REMARKS->HrefValue = "";
		$this->REMARKS->TooltipValue = "";

		// PU - D/B
		$this->PU___D2FB->LinkCustomAttributes = "";
		$this->PU___D2FB->HrefValue = "";
		$this->PU___D2FB->TooltipValue = "";

		// ICSI D/B
		$this->ICSI_D2FB->LinkCustomAttributes = "";
		$this->ICSI_D2FB->HrefValue = "";
		$this->ICSI_D2FB->TooltipValue = "";

		// VIT D/B
		$this->VIT_D2FB->LinkCustomAttributes = "";
		$this->VIT_D2FB->HrefValue = "";
		$this->VIT_D2FB->TooltipValue = "";

		// ET D/B
		$this->ET_D2FB->LinkCustomAttributes = "";
		$this->ET_D2FB->HrefValue = "";
		$this->ET_D2FB->TooltipValue = "";

		// LAB COMMENTS
		$this->LAB_COMMENTS->LinkCustomAttributes = "";
		$this->LAB_COMMENTS->HrefValue = "";
		$this->LAB_COMMENTS->TooltipValue = "";

		// Reason for no FRESH transfer
		$this->Reason_for_no_FRESH_transfer->LinkCustomAttributes = "";
		$this->Reason_for_no_FRESH_transfer->HrefValue = "";
		$this->Reason_for_no_FRESH_transfer->TooltipValue = "";

		// No of embryos transferred Day 3/5, A,B,C
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->LinkCustomAttributes = "";
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->HrefValue = "";
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->TooltipValue = "";

		// EMBRYOS PENDING
		$this->EMBRYOS_PENDING->LinkCustomAttributes = "";
		$this->EMBRYOS_PENDING->HrefValue = "";
		$this->EMBRYOS_PENDING->TooltipValue = "";

		// DAY OF TRANSFER
		$this->DAY_OF_TRANSFER->LinkCustomAttributes = "";
		$this->DAY_OF_TRANSFER->HrefValue = "";
		$this->DAY_OF_TRANSFER->TooltipValue = "";

		// H/D sperm
		$this->H2FD_sperm->LinkCustomAttributes = "";
		$this->H2FD_sperm->HrefValue = "";
		$this->H2FD_sperm->TooltipValue = "";

		// Comments
		$this->Comments->LinkCustomAttributes = "";
		$this->Comments->HrefValue = "";
		$this->Comments->TooltipValue = "";

		// sc progesterone
		$this->sc_progesterone->LinkCustomAttributes = "";
		$this->sc_progesterone->HrefValue = "";
		$this->sc_progesterone->TooltipValue = "";

		// Natural micronised 400mg bd + duphaston 10mg bd
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->LinkCustomAttributes = "";
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->HrefValue = "";
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->TooltipValue = "";

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
		$this->LP_bleeding->LinkCustomAttributes = "";
		$this->LP_bleeding->HrefValue = "";
		$this->LP_bleeding->TooltipValue = "";

		// ß-hCG
		$this->DF_hCG->LinkCustomAttributes = "";
		$this->DF_hCG->HrefValue = "";
		$this->DF_hCG->TooltipValue = "";

		// Implantation rate
		$this->Implantation_rate->LinkCustomAttributes = "";
		$this->Implantation_rate->HrefValue = "";
		$this->Implantation_rate->TooltipValue = "";

		// Ectopic
		$this->Ectopic->LinkCustomAttributes = "";
		$this->Ectopic->HrefValue = "";
		$this->Ectopic->TooltipValue = "";

		// Type of preg
		$this->Type_of_preg->LinkCustomAttributes = "";
		$this->Type_of_preg->HrefValue = "";
		$this->Type_of_preg->TooltipValue = "";

		// ANC
		$this->ANC->LinkCustomAttributes = "";
		$this->ANC->HrefValue = "";
		$this->ANC->TooltipValue = "";

		// anomalies
		$this->anomalies->LinkCustomAttributes = "";
		$this->anomalies->HrefValue = "";
		$this->anomalies->TooltipValue = "";

		// baby wt
		$this->baby_wt->LinkCustomAttributes = "";
		$this->baby_wt->HrefValue = "";
		$this->baby_wt->TooltipValue = "";

		// GA at delivery
		$this->GA_at_delivery->LinkCustomAttributes = "";
		$this->GA_at_delivery->HrefValue = "";
		$this->GA_at_delivery->TooltipValue = "";

		// Pregnancy outcome
		$this->Pregnancy_outcome->LinkCustomAttributes = "";
		$this->Pregnancy_outcome->HrefValue = "";
		$this->Pregnancy_outcome->TooltipValue = "";

		// 1st FET
		$this->_1st_FET->LinkCustomAttributes = "";
		$this->_1st_FET->HrefValue = "";
		$this->_1st_FET->TooltipValue = "";

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->LinkCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY->HrefValue = "";
		$this->AFTER_HYSTEROSCOPY->TooltipValue = "";

		// AFTER ERA
		$this->AFTER_ERA->LinkCustomAttributes = "";
		$this->AFTER_ERA->HrefValue = "";
		$this->AFTER_ERA->TooltipValue = "";

		// ERA
		$this->ERA->LinkCustomAttributes = "";
		$this->ERA->HrefValue = "";
		$this->ERA->TooltipValue = "";

		// HRT
		$this->HRT->LinkCustomAttributes = "";
		$this->HRT->HrefValue = "";
		$this->HRT->TooltipValue = "";

		// XGRAST/PRP
		$this->XGRAST2FPRP->LinkCustomAttributes = "";
		$this->XGRAST2FPRP->HrefValue = "";
		$this->XGRAST2FPRP->TooltipValue = "";

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->LinkCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->HrefValue = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->TooltipValue = "";

		// LMWH 40MG
		$this->LMWH_40MG->LinkCustomAttributes = "";
		$this->LMWH_40MG->HrefValue = "";
		$this->LMWH_40MG->TooltipValue = "";

		// ß-hCG2
		$this->DF_hCG2->LinkCustomAttributes = "";
		$this->DF_hCG2->HrefValue = "";
		$this->DF_hCG2->TooltipValue = "";

		// Implantation rate1
		$this->Implantation_rate1->LinkCustomAttributes = "";
		$this->Implantation_rate1->HrefValue = "";
		$this->Implantation_rate1->TooltipValue = "";

		// Ectopic1
		$this->Ectopic1->LinkCustomAttributes = "";
		$this->Ectopic1->HrefValue = "";
		$this->Ectopic1->TooltipValue = "";

		// Type of pregA
		$this->Type_of_pregA->LinkCustomAttributes = "";
		$this->Type_of_pregA->HrefValue = "";
		$this->Type_of_pregA->TooltipValue = "";

		// ANC1
		$this->ANC1->LinkCustomAttributes = "";
		$this->ANC1->HrefValue = "";
		$this->ANC1->TooltipValue = "";

		// anomalies2
		$this->anomalies2->LinkCustomAttributes = "";
		$this->anomalies2->HrefValue = "";
		$this->anomalies2->TooltipValue = "";

		// baby wt2
		$this->baby_wt2->LinkCustomAttributes = "";
		$this->baby_wt2->HrefValue = "";
		$this->baby_wt2->TooltipValue = "";

		// GA at delivery1
		$this->GA_at_delivery1->LinkCustomAttributes = "";
		$this->GA_at_delivery1->HrefValue = "";
		$this->GA_at_delivery1->TooltipValue = "";

		// Pregnancy outcome1
		$this->Pregnancy_outcome1->LinkCustomAttributes = "";
		$this->Pregnancy_outcome1->HrefValue = "";
		$this->Pregnancy_outcome1->TooltipValue = "";

		// 2ND FET
		$this->_2ND_FET->LinkCustomAttributes = "";
		$this->_2ND_FET->HrefValue = "";
		$this->_2ND_FET->TooltipValue = "";

		// AFTER HYSTEROSCOPY1
		$this->AFTER_HYSTEROSCOPY1->LinkCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY1->HrefValue = "";
		$this->AFTER_HYSTEROSCOPY1->TooltipValue = "";

		// AFTER ERA1
		$this->AFTER_ERA1->LinkCustomAttributes = "";
		$this->AFTER_ERA1->HrefValue = "";
		$this->AFTER_ERA1->TooltipValue = "";

		// ERA1
		$this->ERA1->LinkCustomAttributes = "";
		$this->ERA1->HrefValue = "";
		$this->ERA1->TooltipValue = "";

		// HRT1
		$this->HRT1->LinkCustomAttributes = "";
		$this->HRT1->HrefValue = "";
		$this->HRT1->TooltipValue = "";

		// XGRAST/PRP1
		$this->XGRAST2FPRP1->LinkCustomAttributes = "";
		$this->XGRAST2FPRP1->HrefValue = "";
		$this->XGRAST2FPRP1->TooltipValue = "";

		// NUMBER OF EMBRYOS
		$this->NUMBER_OF_EMBRYOS->LinkCustomAttributes = "";
		$this->NUMBER_OF_EMBRYOS->HrefValue = "";
		$this->NUMBER_OF_EMBRYOS->TooltipValue = "";

		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->LinkCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->HrefValue = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->TooltipValue = "";

		// INTRALIPID AND BARGLOBIN
		$this->INTRALIPID_AND_BARGLOBIN->LinkCustomAttributes = "";
		$this->INTRALIPID_AND_BARGLOBIN->HrefValue = "";
		$this->INTRALIPID_AND_BARGLOBIN->TooltipValue = "";

		// LMWH 40MG1
		$this->LMWH_40MG1->LinkCustomAttributes = "";
		$this->LMWH_40MG1->HrefValue = "";
		$this->LMWH_40MG1->TooltipValue = "";

		// ß-hCG1
		$this->DF_hCG1->LinkCustomAttributes = "";
		$this->DF_hCG1->HrefValue = "";
		$this->DF_hCG1->TooltipValue = "";

		// Implantation rate2
		$this->Implantation_rate2->LinkCustomAttributes = "";
		$this->Implantation_rate2->HrefValue = "";
		$this->Implantation_rate2->TooltipValue = "";

		// Ectopic2
		$this->Ectopic2->LinkCustomAttributes = "";
		$this->Ectopic2->HrefValue = "";
		$this->Ectopic2->TooltipValue = "";

		// Type of preg2
		$this->Type_of_preg2->LinkCustomAttributes = "";
		$this->Type_of_preg2->HrefValue = "";
		$this->Type_of_preg2->TooltipValue = "";

		// ANCA
		$this->ANCA->LinkCustomAttributes = "";
		$this->ANCA->HrefValue = "";
		$this->ANCA->TooltipValue = "";

		// anomalies1
		$this->anomalies1->LinkCustomAttributes = "";
		$this->anomalies1->HrefValue = "";
		$this->anomalies1->TooltipValue = "";

		// baby wt1
		$this->baby_wt1->LinkCustomAttributes = "";
		$this->baby_wt1->HrefValue = "";
		$this->baby_wt1->TooltipValue = "";

		// GA at delivery2
		$this->GA_at_delivery2->LinkCustomAttributes = "";
		$this->GA_at_delivery2->HrefValue = "";
		$this->GA_at_delivery2->TooltipValue = "";

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

		// Treatment
		$this->Treatment->EditAttrs["class"] = "form-control";
		$this->Treatment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
		$this->Treatment->EditValue = $this->Treatment->CurrentValue;
		$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

		// Origin
		$this->Origin->EditAttrs["class"] = "form-control";
		$this->Origin->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
		$this->Origin->EditValue = $this->Origin->CurrentValue;
		$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

		// MaleIndications
		$this->MaleIndications->EditAttrs["class"] = "form-control";
		$this->MaleIndications->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MaleIndications->CurrentValue = HtmlDecode($this->MaleIndications->CurrentValue);
		$this->MaleIndications->EditValue = $this->MaleIndications->CurrentValue;
		$this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

		// FemaleIndications
		$this->FemaleIndications->EditAttrs["class"] = "form-control";
		$this->FemaleIndications->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FemaleIndications->CurrentValue = HtmlDecode($this->FemaleIndications->CurrentValue);
		$this->FemaleIndications->EditValue = $this->FemaleIndications->CurrentValue;
		$this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

		// A4ICSICycle
		$this->A4ICSICycle->EditAttrs["class"] = "form-control";
		$this->A4ICSICycle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->A4ICSICycle->CurrentValue = HtmlDecode($this->A4ICSICycle->CurrentValue);
		$this->A4ICSICycle->EditValue = $this->A4ICSICycle->CurrentValue;
		$this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

		// TotalICSICycle
		$this->TotalICSICycle->EditAttrs["class"] = "form-control";
		$this->TotalICSICycle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TotalICSICycle->CurrentValue = HtmlDecode($this->TotalICSICycle->CurrentValue);
		$this->TotalICSICycle->EditValue = $this->TotalICSICycle->CurrentValue;
		$this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

		// TypeOfInfertility
		$this->TypeOfInfertility->EditAttrs["class"] = "form-control";
		$this->TypeOfInfertility->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TypeOfInfertility->CurrentValue = HtmlDecode($this->TypeOfInfertility->CurrentValue);
		$this->TypeOfInfertility->EditValue = $this->TypeOfInfertility->CurrentValue;
		$this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

		// RelevantHistory
		$this->RelevantHistory->EditAttrs["class"] = "form-control";
		$this->RelevantHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RelevantHistory->CurrentValue = HtmlDecode($this->RelevantHistory->CurrentValue);
		$this->RelevantHistory->EditValue = $this->RelevantHistory->CurrentValue;
		$this->RelevantHistory->PlaceHolder = RemoveHtml($this->RelevantHistory->caption());

		// IUICycles
		$this->IUICycles->EditAttrs["class"] = "form-control";
		$this->IUICycles->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IUICycles->CurrentValue = HtmlDecode($this->IUICycles->CurrentValue);
		$this->IUICycles->EditValue = $this->IUICycles->CurrentValue;
		$this->IUICycles->PlaceHolder = RemoveHtml($this->IUICycles->caption());

		// AMH
		$this->AMH->EditAttrs["class"] = "form-control";
		$this->AMH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AMH->CurrentValue = HtmlDecode($this->AMH->CurrentValue);
		$this->AMH->EditValue = $this->AMH->CurrentValue;
		$this->AMH->PlaceHolder = RemoveHtml($this->AMH->caption());

		// FBMI
		$this->FBMI->EditAttrs["class"] = "form-control";
		$this->FBMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
		$this->FBMI->EditValue = $this->FBMI->CurrentValue;
		$this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

		// ANTAGONISTSTARTDAY
		$this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
		$this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ANTAGONISTSTARTDAY->CurrentValue = HtmlDecode($this->ANTAGONISTSTARTDAY->CurrentValue);
		$this->ANTAGONISTSTARTDAY->EditValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
		$this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

		// OvarianSurgery
		$this->OvarianSurgery->EditAttrs["class"] = "form-control";
		$this->OvarianSurgery->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OvarianSurgery->CurrentValue = HtmlDecode($this->OvarianSurgery->CurrentValue);
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
		if (REMOVE_XSS)
			$this->RFSH1->CurrentValue = HtmlDecode($this->RFSH1->CurrentValue);
		$this->RFSH1->EditValue = $this->RFSH1->CurrentValue;
		$this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

		// RFSH2
		$this->RFSH2->EditAttrs["class"] = "form-control";
		$this->RFSH2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RFSH2->CurrentValue = HtmlDecode($this->RFSH2->CurrentValue);
		$this->RFSH2->EditValue = $this->RFSH2->CurrentValue;
		$this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

		// RFSH3
		$this->RFSH3->EditAttrs["class"] = "form-control";
		$this->RFSH3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RFSH3->CurrentValue = HtmlDecode($this->RFSH3->CurrentValue);
		$this->RFSH3->EditValue = $this->RFSH3->CurrentValue;
		$this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

		// E21
		$this->E21->EditAttrs["class"] = "form-control";
		$this->E21->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->E21->CurrentValue = HtmlDecode($this->E21->CurrentValue);
		$this->E21->EditValue = $this->E21->CurrentValue;
		$this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

		// Hysteroscopy
		$this->Hysteroscopy->EditAttrs["class"] = "form-control";
		$this->Hysteroscopy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Hysteroscopy->CurrentValue = HtmlDecode($this->Hysteroscopy->CurrentValue);
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
		if (REMOVE_XSS)
			$this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
		$this->Fweight->EditValue = $this->Fweight->CurrentValue;
		$this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

		// AntiTPO
		$this->AntiTPO->EditAttrs["class"] = "form-control";
		$this->AntiTPO->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AntiTPO->CurrentValue = HtmlDecode($this->AntiTPO->CurrentValue);
		$this->AntiTPO->EditValue = $this->AntiTPO->CurrentValue;
		$this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

		// AntiTG
		$this->AntiTG->EditAttrs["class"] = "form-control";
		$this->AntiTG->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AntiTG->CurrentValue = HtmlDecode($this->AntiTG->CurrentValue);
		$this->AntiTG->EditValue = $this->AntiTG->CurrentValue;
		$this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

		// PatientAge
		$this->PatientAge->EditAttrs["class"] = "form-control";
		$this->PatientAge->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientAge->CurrentValue = HtmlDecode($this->PatientAge->CurrentValue);
		$this->PatientAge->EditValue = $this->PatientAge->CurrentValue;
		$this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

		// PartnerAge
		$this->PartnerAge->EditAttrs["class"] = "form-control";
		$this->PartnerAge->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PartnerAge->CurrentValue = HtmlDecode($this->PartnerAge->CurrentValue);
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
		$this->R_OVARY->EditAttrs["class"] = "form-control";
		$this->R_OVARY->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->R_OVARY->CurrentValue = HtmlDecode($this->R_OVARY->CurrentValue);
		$this->R_OVARY->EditValue = $this->R_OVARY->CurrentValue;
		$this->R_OVARY->PlaceHolder = RemoveHtml($this->R_OVARY->caption());

		// R.AFC
		$this->R_AFC->EditAttrs["class"] = "form-control";
		$this->R_AFC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->R_AFC->CurrentValue = HtmlDecode($this->R_AFC->CurrentValue);
		$this->R_AFC->EditValue = $this->R_AFC->CurrentValue;
		$this->R_AFC->PlaceHolder = RemoveHtml($this->R_AFC->caption());

		// L.OVARY
		$this->L_OVARY->EditAttrs["class"] = "form-control";
		$this->L_OVARY->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->L_OVARY->CurrentValue = HtmlDecode($this->L_OVARY->CurrentValue);
		$this->L_OVARY->EditValue = $this->L_OVARY->CurrentValue;
		$this->L_OVARY->PlaceHolder = RemoveHtml($this->L_OVARY->caption());

		// L.AFC
		$this->L_AFC->EditAttrs["class"] = "form-control";
		$this->L_AFC->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->L_AFC->CurrentValue = HtmlDecode($this->L_AFC->CurrentValue);
		$this->L_AFC->EditValue = $this->L_AFC->CurrentValue;
		$this->L_AFC->PlaceHolder = RemoveHtml($this->L_AFC->caption());

		// LH1
		$this->LH1->EditAttrs["class"] = "form-control";
		$this->LH1->EditCustomAttributes = "";
		$this->LH1->EditValue = $this->LH1->CurrentValue;
		$this->LH1->PlaceHolder = RemoveHtml($this->LH1->caption());

		// E2
		$this->E2->EditAttrs["class"] = "form-control";
		$this->E2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->E2->CurrentValue = HtmlDecode($this->E2->CurrentValue);
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
		if (REMOVE_XSS)
			$this->AMH1->CurrentValue = HtmlDecode($this->AMH1->CurrentValue);
		$this->AMH1->EditValue = $this->AMH1->CurrentValue;
		$this->AMH1->PlaceHolder = RemoveHtml($this->AMH1->caption());

		// LH
		$this->LH->EditAttrs["class"] = "form-control";
		$this->LH->EditCustomAttributes = "";
		$this->LH->EditValue = $this->LH->CurrentValue;
		$this->LH->PlaceHolder = RemoveHtml($this->LH->caption());

		// BMI(MALE)
		$this->BMI28MALE29->EditAttrs["class"] = "form-control";
		$this->BMI28MALE29->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BMI28MALE29->CurrentValue = HtmlDecode($this->BMI28MALE29->CurrentValue);
		$this->BMI28MALE29->EditValue = $this->BMI28MALE29->CurrentValue;
		$this->BMI28MALE29->PlaceHolder = RemoveHtml($this->BMI28MALE29->caption());

		// MaleMedicalConditions
		$this->MaleMedicalConditions->EditAttrs["class"] = "form-control";
		$this->MaleMedicalConditions->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MaleMedicalConditions->CurrentValue = HtmlDecode($this->MaleMedicalConditions->CurrentValue);
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
		$this->SpermMotility28P26NP29->EditAttrs["class"] = "form-control";
		$this->SpermMotility28P26NP29->EditCustomAttributes = "";
		$this->SpermMotility28P26NP29->EditValue = $this->SpermMotility28P26NP29->CurrentValue;
		$this->SpermMotility28P26NP29->PlaceHolder = RemoveHtml($this->SpermMotility28P26NP29->caption());

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
		$this->M_Testosterone->EditAttrs["class"] = "form-control";
		$this->M_Testosterone->EditCustomAttributes = "";
		$this->M_Testosterone->EditValue = $this->M_Testosterone->CurrentValue;
		$this->M_Testosterone->PlaceHolder = RemoveHtml($this->M_Testosterone->caption());

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
		$this->CC_100->EditAttrs["class"] = "form-control";
		$this->CC_100->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CC_100->CurrentValue = HtmlDecode($this->CC_100->CurrentValue);
		$this->CC_100->EditValue = $this->CC_100->CurrentValue;
		$this->CC_100->PlaceHolder = RemoveHtml($this->CC_100->caption());

		// RFSH1A
		$this->RFSH1A->EditAttrs["class"] = "form-control";
		$this->RFSH1A->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RFSH1A->CurrentValue = HtmlDecode($this->RFSH1A->CurrentValue);
		$this->RFSH1A->EditValue = $this->RFSH1A->CurrentValue;
		$this->RFSH1A->PlaceHolder = RemoveHtml($this->RFSH1A->caption());

		// HMG1
		$this->HMG1->EditAttrs["class"] = "form-control";
		$this->HMG1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HMG1->CurrentValue = HtmlDecode($this->HMG1->CurrentValue);
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
		if (REMOVE_XSS)
			$this->DAYSOFSTIMULATION->CurrentValue = HtmlDecode($this->DAYSOFSTIMULATION->CurrentValue);
		$this->DAYSOFSTIMULATION->EditValue = $this->DAYSOFSTIMULATION->CurrentValue;
		$this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

		// Any change inbetween ( Dose added , day)
		$this->Any_change_inbetween_28_Dose_added_2C_day29->EditAttrs["class"] = "form-control";
		$this->Any_change_inbetween_28_Dose_added_2C_day29->EditCustomAttributes = "";
		$this->Any_change_inbetween_28_Dose_added_2C_day29->EditValue = $this->Any_change_inbetween_28_Dose_added_2C_day29->CurrentValue;
		$this->Any_change_inbetween_28_Dose_added_2C_day29->PlaceHolder = RemoveHtml($this->Any_change_inbetween_28_Dose_added_2C_day29->caption());

		// day of Anta
		$this->day_of_Anta->EditAttrs["class"] = "form-control";
		$this->day_of_Anta->EditCustomAttributes = "";
		$this->day_of_Anta->EditValue = $this->day_of_Anta->CurrentValue;
		$this->day_of_Anta->PlaceHolder = RemoveHtml($this->day_of_Anta->caption());

		// R FSH TD
		$this->R_FSH_TD->EditAttrs["class"] = "form-control";
		$this->R_FSH_TD->EditCustomAttributes = "";
		$this->R_FSH_TD->EditValue = $this->R_FSH_TD->CurrentValue;
		$this->R_FSH_TD->PlaceHolder = RemoveHtml($this->R_FSH_TD->caption());

		// R FSH + HMG TD
		$this->R_FSH_2B_HMG_TD->EditAttrs["class"] = "form-control";
		$this->R_FSH_2B_HMG_TD->EditCustomAttributes = "";
		$this->R_FSH_2B_HMG_TD->EditValue = $this->R_FSH_2B_HMG_TD->CurrentValue;
		$this->R_FSH_2B_HMG_TD->PlaceHolder = RemoveHtml($this->R_FSH_2B_HMG_TD->caption());

		// R FSH + R LH TD
		$this->R_FSH_2B_R_LH_TD->EditAttrs["class"] = "form-control";
		$this->R_FSH_2B_R_LH_TD->EditCustomAttributes = "";
		$this->R_FSH_2B_R_LH_TD->EditValue = $this->R_FSH_2B_R_LH_TD->CurrentValue;
		$this->R_FSH_2B_R_LH_TD->PlaceHolder = RemoveHtml($this->R_FSH_2B_R_LH_TD->caption());

		// HMG TD
		$this->HMG_TD->EditAttrs["class"] = "form-control";
		$this->HMG_TD->EditCustomAttributes = "";
		$this->HMG_TD->EditValue = $this->HMG_TD->CurrentValue;
		$this->HMG_TD->PlaceHolder = RemoveHtml($this->HMG_TD->caption());

		// LH TD
		$this->LH_TD->EditAttrs["class"] = "form-control";
		$this->LH_TD->EditCustomAttributes = "";
		$this->LH_TD->EditValue = $this->LH_TD->CurrentValue;
		$this->LH_TD->PlaceHolder = RemoveHtml($this->LH_TD->caption());

		// D1 LH
		$this->D1_LH->EditAttrs["class"] = "form-control";
		$this->D1_LH->EditCustomAttributes = "";
		$this->D1_LH->EditValue = $this->D1_LH->CurrentValue;
		$this->D1_LH->PlaceHolder = RemoveHtml($this->D1_LH->caption());

		// D1 E2
		$this->D1_E2->EditAttrs["class"] = "form-control";
		$this->D1_E2->EditCustomAttributes = "";
		$this->D1_E2->EditValue = $this->D1_E2->CurrentValue;
		$this->D1_E2->PlaceHolder = RemoveHtml($this->D1_E2->caption());

		// Trigger day E2
		$this->Trigger_day_E2->EditAttrs["class"] = "form-control";
		$this->Trigger_day_E2->EditCustomAttributes = "";
		$this->Trigger_day_E2->EditValue = $this->Trigger_day_E2->CurrentValue;
		$this->Trigger_day_E2->PlaceHolder = RemoveHtml($this->Trigger_day_E2->caption());

		// Trigger day P4
		$this->Trigger_day_P4->EditAttrs["class"] = "form-control";
		$this->Trigger_day_P4->EditCustomAttributes = "";
		$this->Trigger_day_P4->EditValue = $this->Trigger_day_P4->CurrentValue;
		$this->Trigger_day_P4->PlaceHolder = RemoveHtml($this->Trigger_day_P4->caption());

		// Trigger day LH
		$this->Trigger_day_LH->EditAttrs["class"] = "form-control";
		$this->Trigger_day_LH->EditCustomAttributes = "";
		$this->Trigger_day_LH->EditValue = $this->Trigger_day_LH->CurrentValue;
		$this->Trigger_day_LH->PlaceHolder = RemoveHtml($this->Trigger_day_LH->caption());

		// VIT-D
		$this->VIT_D->EditAttrs["class"] = "form-control";
		$this->VIT_D->EditCustomAttributes = "";
		$this->VIT_D->EditValue = $this->VIT_D->CurrentValue;
		$this->VIT_D->PlaceHolder = RemoveHtml($this->VIT_D->caption());

		// TRIGGERR
		$this->TRIGGERR->EditAttrs["class"] = "form-control";
		$this->TRIGGERR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TRIGGERR->CurrentValue = HtmlDecode($this->TRIGGERR->CurrentValue);
		$this->TRIGGERR->EditValue = $this->TRIGGERR->CurrentValue;
		$this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

		// BHCG BEFORE RETRIEVAL
		$this->BHCG_BEFORE_RETRIEVAL->EditAttrs["class"] = "form-control";
		$this->BHCG_BEFORE_RETRIEVAL->EditCustomAttributes = "";
		$this->BHCG_BEFORE_RETRIEVAL->EditValue = $this->BHCG_BEFORE_RETRIEVAL->CurrentValue;
		$this->BHCG_BEFORE_RETRIEVAL->PlaceHolder = RemoveHtml($this->BHCG_BEFORE_RETRIEVAL->caption());

		// LH -12 HRS
		$this->LH__12_HRS->EditAttrs["class"] = "form-control";
		$this->LH__12_HRS->EditCustomAttributes = "";
		$this->LH__12_HRS->EditValue = $this->LH__12_HRS->CurrentValue;
		$this->LH__12_HRS->PlaceHolder = RemoveHtml($this->LH__12_HRS->caption());

		// P4 -12 HRS
		$this->P4__12_HRS->EditAttrs["class"] = "form-control";
		$this->P4__12_HRS->EditCustomAttributes = "";
		$this->P4__12_HRS->EditValue = $this->P4__12_HRS->CurrentValue;
		$this->P4__12_HRS->PlaceHolder = RemoveHtml($this->P4__12_HRS->caption());

		// ET on hCG day
		$this->ET_on_hCG_day->EditAttrs["class"] = "form-control";
		$this->ET_on_hCG_day->EditCustomAttributes = "";
		$this->ET_on_hCG_day->EditValue = $this->ET_on_hCG_day->CurrentValue;
		$this->ET_on_hCG_day->PlaceHolder = RemoveHtml($this->ET_on_hCG_day->caption());

		// ET doppler
		$this->ET_doppler->EditAttrs["class"] = "form-control";
		$this->ET_doppler->EditCustomAttributes = "";
		$this->ET_doppler->EditValue = $this->ET_doppler->CurrentValue;
		$this->ET_doppler->PlaceHolder = RemoveHtml($this->ET_doppler->caption());

		// VI/FI/VFI
		$this->VI2FFI2FVFI->EditAttrs["class"] = "form-control";
		$this->VI2FFI2FVFI->EditCustomAttributes = "";
		$this->VI2FFI2FVFI->EditValue = $this->VI2FFI2FVFI->CurrentValue;
		$this->VI2FFI2FVFI->PlaceHolder = RemoveHtml($this->VI2FFI2FVFI->caption());

		// Endometrial abnormality
		$this->Endometrial_abnormality->EditAttrs["class"] = "form-control";
		$this->Endometrial_abnormality->EditCustomAttributes = "";
		$this->Endometrial_abnormality->EditValue = $this->Endometrial_abnormality->CurrentValue;
		$this->Endometrial_abnormality->PlaceHolder = RemoveHtml($this->Endometrial_abnormality->caption());

		// AFC ON S1
		$this->AFC_ON_S1->EditAttrs["class"] = "form-control";
		$this->AFC_ON_S1->EditCustomAttributes = "";
		$this->AFC_ON_S1->EditValue = $this->AFC_ON_S1->CurrentValue;
		$this->AFC_ON_S1->PlaceHolder = RemoveHtml($this->AFC_ON_S1->caption());

		// TIME OF OPU FROM TRIGGER
		$this->TIME_OF_OPU_FROM_TRIGGER->EditAttrs["class"] = "form-control";
		$this->TIME_OF_OPU_FROM_TRIGGER->EditCustomAttributes = "";
		$this->TIME_OF_OPU_FROM_TRIGGER->EditValue = $this->TIME_OF_OPU_FROM_TRIGGER->CurrentValue;
		$this->TIME_OF_OPU_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_OF_OPU_FROM_TRIGGER->caption());

		// SPERM TYPE
		$this->SPERM_TYPE->EditAttrs["class"] = "form-control";
		$this->SPERM_TYPE->EditCustomAttributes = "";
		$this->SPERM_TYPE->EditValue = $this->SPERM_TYPE->CurrentValue;
		$this->SPERM_TYPE->PlaceHolder = RemoveHtml($this->SPERM_TYPE->caption());

		// EXPECTED ON TRIGGER DAY
		$this->EXPECTED_ON_TRIGGER_DAY->EditAttrs["class"] = "form-control";
		$this->EXPECTED_ON_TRIGGER_DAY->EditCustomAttributes = "";
		$this->EXPECTED_ON_TRIGGER_DAY->EditValue = $this->EXPECTED_ON_TRIGGER_DAY->CurrentValue;
		$this->EXPECTED_ON_TRIGGER_DAY->PlaceHolder = RemoveHtml($this->EXPECTED_ON_TRIGGER_DAY->caption());

		// OOCYTES RETRIEVED
		$this->OOCYTES_RETRIEVED->EditAttrs["class"] = "form-control";
		$this->OOCYTES_RETRIEVED->EditCustomAttributes = "";
		$this->OOCYTES_RETRIEVED->EditValue = $this->OOCYTES_RETRIEVED->CurrentValue;
		$this->OOCYTES_RETRIEVED->PlaceHolder = RemoveHtml($this->OOCYTES_RETRIEVED->caption());

		// TIME OF DENUDATION
		$this->TIME_OF_DENUDATION->EditAttrs["class"] = "form-control";
		$this->TIME_OF_DENUDATION->EditCustomAttributes = "";
		$this->TIME_OF_DENUDATION->EditValue = $this->TIME_OF_DENUDATION->CurrentValue;
		$this->TIME_OF_DENUDATION->PlaceHolder = RemoveHtml($this->TIME_OF_DENUDATION->caption());

		// M-II
		$this->M_II->EditAttrs["class"] = "form-control";
		$this->M_II->EditCustomAttributes = "";
		$this->M_II->EditValue = $this->M_II->CurrentValue;
		$this->M_II->PlaceHolder = RemoveHtml($this->M_II->caption());

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
		$this->ICSI_TIME_FORM_OPU->EditAttrs["class"] = "form-control";
		$this->ICSI_TIME_FORM_OPU->EditCustomAttributes = "";
		$this->ICSI_TIME_FORM_OPU->EditValue = $this->ICSI_TIME_FORM_OPU->CurrentValue;
		$this->ICSI_TIME_FORM_OPU->PlaceHolder = RemoveHtml($this->ICSI_TIME_FORM_OPU->caption());

		// FERT ( 2 PN )
		$this->FERT_28_2_PN_29->EditAttrs["class"] = "form-control";
		$this->FERT_28_2_PN_29->EditCustomAttributes = "";
		$this->FERT_28_2_PN_29->EditValue = $this->FERT_28_2_PN_29->CurrentValue;
		$this->FERT_28_2_PN_29->PlaceHolder = RemoveHtml($this->FERT_28_2_PN_29->caption());

		// DEG
		$this->DEG->EditAttrs["class"] = "form-control";
		$this->DEG->EditCustomAttributes = "";
		$this->DEG->EditValue = $this->DEG->CurrentValue;
		$this->DEG->PlaceHolder = RemoveHtml($this->DEG->caption());

		// D3 GRADE A
		$this->D3_GRADE_A->EditAttrs["class"] = "form-control";
		$this->D3_GRADE_A->EditCustomAttributes = "";
		$this->D3_GRADE_A->EditValue = $this->D3_GRADE_A->CurrentValue;
		$this->D3_GRADE_A->PlaceHolder = RemoveHtml($this->D3_GRADE_A->caption());

		// D3 GRADE B
		$this->D3_GRADE_B->EditAttrs["class"] = "form-control";
		$this->D3_GRADE_B->EditCustomAttributes = "";
		$this->D3_GRADE_B->EditValue = $this->D3_GRADE_B->CurrentValue;
		$this->D3_GRADE_B->PlaceHolder = RemoveHtml($this->D3_GRADE_B->caption());

		// D3 GRADE C
		$this->D3_GRADE_C->EditAttrs["class"] = "form-control";
		$this->D3_GRADE_C->EditCustomAttributes = "";
		$this->D3_GRADE_C->EditValue = $this->D3_GRADE_C->CurrentValue;
		$this->D3_GRADE_C->PlaceHolder = RemoveHtml($this->D3_GRADE_C->caption());

		// D3 GRADE D
		$this->D3_GRADE_D->EditAttrs["class"] = "form-control";
		$this->D3_GRADE_D->EditCustomAttributes = "";
		$this->D3_GRADE_D->EditValue = $this->D3_GRADE_D->CurrentValue;
		$this->D3_GRADE_D->PlaceHolder = RemoveHtml($this->D3_GRADE_D->caption());

		// USABLE ON DAY 3 ET
		$this->USABLE_ON_DAY_3_ET->EditAttrs["class"] = "form-control";
		$this->USABLE_ON_DAY_3_ET->EditCustomAttributes = "";
		$this->USABLE_ON_DAY_3_ET->EditValue = $this->USABLE_ON_DAY_3_ET->CurrentValue;
		$this->USABLE_ON_DAY_3_ET->PlaceHolder = RemoveHtml($this->USABLE_ON_DAY_3_ET->caption());

		// USABLE ON day 3 FREEZING
		$this->USABLE_ON_day_3_FREEZING->EditAttrs["class"] = "form-control";
		$this->USABLE_ON_day_3_FREEZING->EditCustomAttributes = "";
		$this->USABLE_ON_day_3_FREEZING->EditValue = $this->USABLE_ON_day_3_FREEZING->CurrentValue;
		$this->USABLE_ON_day_3_FREEZING->PlaceHolder = RemoveHtml($this->USABLE_ON_day_3_FREEZING->caption());

		// D5 GARDE A
		$this->D5_GARDE_A->EditAttrs["class"] = "form-control";
		$this->D5_GARDE_A->EditCustomAttributes = "";
		$this->D5_GARDE_A->EditValue = $this->D5_GARDE_A->CurrentValue;
		$this->D5_GARDE_A->PlaceHolder = RemoveHtml($this->D5_GARDE_A->caption());

		// D5 GRADE B
		$this->D5_GRADE_B->EditAttrs["class"] = "form-control";
		$this->D5_GRADE_B->EditCustomAttributes = "";
		$this->D5_GRADE_B->EditValue = $this->D5_GRADE_B->CurrentValue;
		$this->D5_GRADE_B->PlaceHolder = RemoveHtml($this->D5_GRADE_B->caption());

		// D5 GRADE C
		$this->D5_GRADE_C->EditAttrs["class"] = "form-control";
		$this->D5_GRADE_C->EditCustomAttributes = "";
		$this->D5_GRADE_C->EditValue = $this->D5_GRADE_C->CurrentValue;
		$this->D5_GRADE_C->PlaceHolder = RemoveHtml($this->D5_GRADE_C->caption());

		// D5 GRADE D
		$this->D5_GRADE_D->EditAttrs["class"] = "form-control";
		$this->D5_GRADE_D->EditCustomAttributes = "";
		$this->D5_GRADE_D->EditValue = $this->D5_GRADE_D->CurrentValue;
		$this->D5_GRADE_D->PlaceHolder = RemoveHtml($this->D5_GRADE_D->caption());

		// USABLE ON D5 ET
		$this->USABLE_ON_D5_ET->EditAttrs["class"] = "form-control";
		$this->USABLE_ON_D5_ET->EditCustomAttributes = "";
		$this->USABLE_ON_D5_ET->EditValue = $this->USABLE_ON_D5_ET->CurrentValue;
		$this->USABLE_ON_D5_ET->PlaceHolder = RemoveHtml($this->USABLE_ON_D5_ET->caption());

		// USABLE ON D5 FREEZING
		$this->USABLE_ON_D5_FREEZING->EditAttrs["class"] = "form-control";
		$this->USABLE_ON_D5_FREEZING->EditCustomAttributes = "";
		$this->USABLE_ON_D5_FREEZING->EditValue = $this->USABLE_ON_D5_FREEZING->CurrentValue;
		$this->USABLE_ON_D5_FREEZING->PlaceHolder = RemoveHtml($this->USABLE_ON_D5_FREEZING->caption());

		// D6 GRADE A
		$this->D6_GRADE_A->EditAttrs["class"] = "form-control";
		$this->D6_GRADE_A->EditCustomAttributes = "";
		$this->D6_GRADE_A->EditValue = $this->D6_GRADE_A->CurrentValue;
		$this->D6_GRADE_A->PlaceHolder = RemoveHtml($this->D6_GRADE_A->caption());

		// D6 GRADE B
		$this->D6_GRADE_B->EditAttrs["class"] = "form-control";
		$this->D6_GRADE_B->EditCustomAttributes = "";
		$this->D6_GRADE_B->EditValue = $this->D6_GRADE_B->CurrentValue;
		$this->D6_GRADE_B->PlaceHolder = RemoveHtml($this->D6_GRADE_B->caption());

		// D6 GRADE C
		$this->D6_GRADE_C->EditAttrs["class"] = "form-control";
		$this->D6_GRADE_C->EditCustomAttributes = "";
		$this->D6_GRADE_C->EditValue = $this->D6_GRADE_C->CurrentValue;
		$this->D6_GRADE_C->PlaceHolder = RemoveHtml($this->D6_GRADE_C->caption());

		// D6 GRADE D
		$this->D6_GRADE_D->EditAttrs["class"] = "form-control";
		$this->D6_GRADE_D->EditCustomAttributes = "";
		$this->D6_GRADE_D->EditValue = $this->D6_GRADE_D->CurrentValue;
		$this->D6_GRADE_D->PlaceHolder = RemoveHtml($this->D6_GRADE_D->caption());

		// D6 USABLE EMBRYO ET
		$this->D6_USABLE_EMBRYO_ET->EditAttrs["class"] = "form-control";
		$this->D6_USABLE_EMBRYO_ET->EditCustomAttributes = "";
		$this->D6_USABLE_EMBRYO_ET->EditValue = $this->D6_USABLE_EMBRYO_ET->CurrentValue;
		$this->D6_USABLE_EMBRYO_ET->PlaceHolder = RemoveHtml($this->D6_USABLE_EMBRYO_ET->caption());

		// D6 USABLE FREEZING
		$this->D6_USABLE_FREEZING->EditAttrs["class"] = "form-control";
		$this->D6_USABLE_FREEZING->EditCustomAttributes = "";
		$this->D6_USABLE_FREEZING->EditValue = $this->D6_USABLE_FREEZING->CurrentValue;
		$this->D6_USABLE_FREEZING->PlaceHolder = RemoveHtml($this->D6_USABLE_FREEZING->caption());

		// TOTAL BLAST
		$this->TOTAL_BLAST->EditAttrs["class"] = "form-control";
		$this->TOTAL_BLAST->EditCustomAttributes = "";
		$this->TOTAL_BLAST->EditValue = $this->TOTAL_BLAST->CurrentValue;
		$this->TOTAL_BLAST->PlaceHolder = RemoveHtml($this->TOTAL_BLAST->caption());

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
		$this->PU___D2FB->EditAttrs["class"] = "form-control";
		$this->PU___D2FB->EditCustomAttributes = "";
		$this->PU___D2FB->EditValue = $this->PU___D2FB->CurrentValue;
		$this->PU___D2FB->PlaceHolder = RemoveHtml($this->PU___D2FB->caption());

		// ICSI D/B
		$this->ICSI_D2FB->EditAttrs["class"] = "form-control";
		$this->ICSI_D2FB->EditCustomAttributes = "";
		$this->ICSI_D2FB->EditValue = $this->ICSI_D2FB->CurrentValue;
		$this->ICSI_D2FB->PlaceHolder = RemoveHtml($this->ICSI_D2FB->caption());

		// VIT D/B
		$this->VIT_D2FB->EditAttrs["class"] = "form-control";
		$this->VIT_D2FB->EditCustomAttributes = "";
		$this->VIT_D2FB->EditValue = $this->VIT_D2FB->CurrentValue;
		$this->VIT_D2FB->PlaceHolder = RemoveHtml($this->VIT_D2FB->caption());

		// ET D/B
		$this->ET_D2FB->EditAttrs["class"] = "form-control";
		$this->ET_D2FB->EditCustomAttributes = "";
		$this->ET_D2FB->EditValue = $this->ET_D2FB->CurrentValue;
		$this->ET_D2FB->PlaceHolder = RemoveHtml($this->ET_D2FB->caption());

		// LAB COMMENTS
		$this->LAB_COMMENTS->EditAttrs["class"] = "form-control";
		$this->LAB_COMMENTS->EditCustomAttributes = "";
		$this->LAB_COMMENTS->EditValue = $this->LAB_COMMENTS->CurrentValue;
		$this->LAB_COMMENTS->PlaceHolder = RemoveHtml($this->LAB_COMMENTS->caption());

		// Reason for no FRESH transfer
		$this->Reason_for_no_FRESH_transfer->EditAttrs["class"] = "form-control";
		$this->Reason_for_no_FRESH_transfer->EditCustomAttributes = "";
		$this->Reason_for_no_FRESH_transfer->EditValue = $this->Reason_for_no_FRESH_transfer->CurrentValue;
		$this->Reason_for_no_FRESH_transfer->PlaceHolder = RemoveHtml($this->Reason_for_no_FRESH_transfer->caption());

		// No of embryos transferred Day 3/5, A,B,C
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->EditAttrs["class"] = "form-control";
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->EditCustomAttributes = "";
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->EditValue = $this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->CurrentValue;
		$this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->PlaceHolder = RemoveHtml($this->No_of_embryos_transferred_Day_32F52C_A2CB2CC->caption());

		// EMBRYOS PENDING
		$this->EMBRYOS_PENDING->EditAttrs["class"] = "form-control";
		$this->EMBRYOS_PENDING->EditCustomAttributes = "";
		$this->EMBRYOS_PENDING->EditValue = $this->EMBRYOS_PENDING->CurrentValue;
		$this->EMBRYOS_PENDING->PlaceHolder = RemoveHtml($this->EMBRYOS_PENDING->caption());

		// DAY OF TRANSFER
		$this->DAY_OF_TRANSFER->EditAttrs["class"] = "form-control";
		$this->DAY_OF_TRANSFER->EditCustomAttributes = "";
		$this->DAY_OF_TRANSFER->EditValue = $this->DAY_OF_TRANSFER->CurrentValue;
		$this->DAY_OF_TRANSFER->PlaceHolder = RemoveHtml($this->DAY_OF_TRANSFER->caption());

		// H/D sperm
		$this->H2FD_sperm->EditAttrs["class"] = "form-control";
		$this->H2FD_sperm->EditCustomAttributes = "";
		$this->H2FD_sperm->EditValue = $this->H2FD_sperm->CurrentValue;
		$this->H2FD_sperm->PlaceHolder = RemoveHtml($this->H2FD_sperm->caption());

		// Comments
		$this->Comments->EditAttrs["class"] = "form-control";
		$this->Comments->EditCustomAttributes = "";
		$this->Comments->EditValue = $this->Comments->CurrentValue;
		$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

		// sc progesterone
		$this->sc_progesterone->EditAttrs["class"] = "form-control";
		$this->sc_progesterone->EditCustomAttributes = "";
		$this->sc_progesterone->EditValue = $this->sc_progesterone->CurrentValue;
		$this->sc_progesterone->PlaceHolder = RemoveHtml($this->sc_progesterone->caption());

		// Natural micronised 400mg bd + duphaston 10mg bd
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->EditAttrs["class"] = "form-control";
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->EditCustomAttributes = "";
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->EditValue = $this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->CurrentValue;
		$this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->PlaceHolder = RemoveHtml($this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd->caption());

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
		$this->LP_bleeding->EditAttrs["class"] = "form-control";
		$this->LP_bleeding->EditCustomAttributes = "";
		$this->LP_bleeding->EditValue = $this->LP_bleeding->CurrentValue;
		$this->LP_bleeding->PlaceHolder = RemoveHtml($this->LP_bleeding->caption());

		// ß-hCG
		$this->DF_hCG->EditAttrs["class"] = "form-control";
		$this->DF_hCG->EditCustomAttributes = "";
		$this->DF_hCG->EditValue = $this->DF_hCG->CurrentValue;
		$this->DF_hCG->PlaceHolder = RemoveHtml($this->DF_hCG->caption());

		// Implantation rate
		$this->Implantation_rate->EditAttrs["class"] = "form-control";
		$this->Implantation_rate->EditCustomAttributes = "";
		$this->Implantation_rate->EditValue = $this->Implantation_rate->CurrentValue;
		$this->Implantation_rate->PlaceHolder = RemoveHtml($this->Implantation_rate->caption());

		// Ectopic
		$this->Ectopic->EditAttrs["class"] = "form-control";
		$this->Ectopic->EditCustomAttributes = "";
		$this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
		$this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

		// Type of preg
		$this->Type_of_preg->EditAttrs["class"] = "form-control";
		$this->Type_of_preg->EditCustomAttributes = "";
		$this->Type_of_preg->EditValue = $this->Type_of_preg->CurrentValue;
		$this->Type_of_preg->PlaceHolder = RemoveHtml($this->Type_of_preg->caption());

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
		$this->baby_wt->EditAttrs["class"] = "form-control";
		$this->baby_wt->EditCustomAttributes = "";
		$this->baby_wt->EditValue = $this->baby_wt->CurrentValue;
		$this->baby_wt->PlaceHolder = RemoveHtml($this->baby_wt->caption());

		// GA at delivery
		$this->GA_at_delivery->EditAttrs["class"] = "form-control";
		$this->GA_at_delivery->EditCustomAttributes = "";
		$this->GA_at_delivery->EditValue = $this->GA_at_delivery->CurrentValue;
		$this->GA_at_delivery->PlaceHolder = RemoveHtml($this->GA_at_delivery->caption());

		// Pregnancy outcome
		$this->Pregnancy_outcome->EditAttrs["class"] = "form-control";
		$this->Pregnancy_outcome->EditCustomAttributes = "";
		$this->Pregnancy_outcome->EditValue = $this->Pregnancy_outcome->CurrentValue;
		$this->Pregnancy_outcome->PlaceHolder = RemoveHtml($this->Pregnancy_outcome->caption());

		// 1st FET
		$this->_1st_FET->EditAttrs["class"] = "form-control";
		$this->_1st_FET->EditCustomAttributes = "";
		$this->_1st_FET->EditValue = $this->_1st_FET->CurrentValue;
		$this->_1st_FET->PlaceHolder = RemoveHtml($this->_1st_FET->caption());

		// AFTER HYSTEROSCOPY
		$this->AFTER_HYSTEROSCOPY->EditAttrs["class"] = "form-control";
		$this->AFTER_HYSTEROSCOPY->EditCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY->EditValue = $this->AFTER_HYSTEROSCOPY->CurrentValue;
		$this->AFTER_HYSTEROSCOPY->PlaceHolder = RemoveHtml($this->AFTER_HYSTEROSCOPY->caption());

		// AFTER ERA
		$this->AFTER_ERA->EditAttrs["class"] = "form-control";
		$this->AFTER_ERA->EditCustomAttributes = "";
		$this->AFTER_ERA->EditValue = $this->AFTER_ERA->CurrentValue;
		$this->AFTER_ERA->PlaceHolder = RemoveHtml($this->AFTER_ERA->caption());

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
		$this->XGRAST2FPRP->EditAttrs["class"] = "form-control";
		$this->XGRAST2FPRP->EditCustomAttributes = "";
		$this->XGRAST2FPRP->EditValue = $this->XGRAST2FPRP->CurrentValue;
		$this->XGRAST2FPRP->PlaceHolder = RemoveHtml($this->XGRAST2FPRP->caption());

		// EMBRYO DETAILS DAY 3/ 5, A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditAttrs["class"] = "form-control";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->EditValue = $this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->PlaceHolder = RemoveHtml($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C->caption());

		// LMWH 40MG
		$this->LMWH_40MG->EditAttrs["class"] = "form-control";
		$this->LMWH_40MG->EditCustomAttributes = "";
		$this->LMWH_40MG->EditValue = $this->LMWH_40MG->CurrentValue;
		$this->LMWH_40MG->PlaceHolder = RemoveHtml($this->LMWH_40MG->caption());

		// ß-hCG2
		$this->DF_hCG2->EditAttrs["class"] = "form-control";
		$this->DF_hCG2->EditCustomAttributes = "";
		$this->DF_hCG2->EditValue = $this->DF_hCG2->CurrentValue;
		$this->DF_hCG2->PlaceHolder = RemoveHtml($this->DF_hCG2->caption());

		// Implantation rate1
		$this->Implantation_rate1->EditAttrs["class"] = "form-control";
		$this->Implantation_rate1->EditCustomAttributes = "";
		$this->Implantation_rate1->EditValue = $this->Implantation_rate1->CurrentValue;
		$this->Implantation_rate1->PlaceHolder = RemoveHtml($this->Implantation_rate1->caption());

		// Ectopic1
		$this->Ectopic1->EditAttrs["class"] = "form-control";
		$this->Ectopic1->EditCustomAttributes = "";
		$this->Ectopic1->EditValue = $this->Ectopic1->CurrentValue;
		$this->Ectopic1->PlaceHolder = RemoveHtml($this->Ectopic1->caption());

		// Type of pregA
		$this->Type_of_pregA->EditAttrs["class"] = "form-control";
		$this->Type_of_pregA->EditCustomAttributes = "";
		$this->Type_of_pregA->EditValue = $this->Type_of_pregA->CurrentValue;
		$this->Type_of_pregA->PlaceHolder = RemoveHtml($this->Type_of_pregA->caption());

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
		$this->baby_wt2->EditAttrs["class"] = "form-control";
		$this->baby_wt2->EditCustomAttributes = "";
		$this->baby_wt2->EditValue = $this->baby_wt2->CurrentValue;
		$this->baby_wt2->PlaceHolder = RemoveHtml($this->baby_wt2->caption());

		// GA at delivery1
		$this->GA_at_delivery1->EditAttrs["class"] = "form-control";
		$this->GA_at_delivery1->EditCustomAttributes = "";
		$this->GA_at_delivery1->EditValue = $this->GA_at_delivery1->CurrentValue;
		$this->GA_at_delivery1->PlaceHolder = RemoveHtml($this->GA_at_delivery1->caption());

		// Pregnancy outcome1
		$this->Pregnancy_outcome1->EditAttrs["class"] = "form-control";
		$this->Pregnancy_outcome1->EditCustomAttributes = "";
		$this->Pregnancy_outcome1->EditValue = $this->Pregnancy_outcome1->CurrentValue;
		$this->Pregnancy_outcome1->PlaceHolder = RemoveHtml($this->Pregnancy_outcome1->caption());

		// 2ND FET
		$this->_2ND_FET->EditAttrs["class"] = "form-control";
		$this->_2ND_FET->EditCustomAttributes = "";
		$this->_2ND_FET->EditValue = $this->_2ND_FET->CurrentValue;
		$this->_2ND_FET->PlaceHolder = RemoveHtml($this->_2ND_FET->caption());

		// AFTER HYSTEROSCOPY1
		$this->AFTER_HYSTEROSCOPY1->EditAttrs["class"] = "form-control";
		$this->AFTER_HYSTEROSCOPY1->EditCustomAttributes = "";
		$this->AFTER_HYSTEROSCOPY1->EditValue = $this->AFTER_HYSTEROSCOPY1->CurrentValue;
		$this->AFTER_HYSTEROSCOPY1->PlaceHolder = RemoveHtml($this->AFTER_HYSTEROSCOPY1->caption());

		// AFTER ERA1
		$this->AFTER_ERA1->EditAttrs["class"] = "form-control";
		$this->AFTER_ERA1->EditCustomAttributes = "";
		$this->AFTER_ERA1->EditValue = $this->AFTER_ERA1->CurrentValue;
		$this->AFTER_ERA1->PlaceHolder = RemoveHtml($this->AFTER_ERA1->caption());

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
		$this->XGRAST2FPRP1->EditAttrs["class"] = "form-control";
		$this->XGRAST2FPRP1->EditCustomAttributes = "";
		$this->XGRAST2FPRP1->EditValue = $this->XGRAST2FPRP1->CurrentValue;
		$this->XGRAST2FPRP1->PlaceHolder = RemoveHtml($this->XGRAST2FPRP1->caption());

		// NUMBER OF EMBRYOS
		$this->NUMBER_OF_EMBRYOS->EditAttrs["class"] = "form-control";
		$this->NUMBER_OF_EMBRYOS->EditCustomAttributes = "";
		$this->NUMBER_OF_EMBRYOS->EditValue = $this->NUMBER_OF_EMBRYOS->CurrentValue;
		$this->NUMBER_OF_EMBRYOS->PlaceHolder = RemoveHtml($this->NUMBER_OF_EMBRYOS->caption());

		// EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->EditAttrs["class"] = "form-control";
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->EditCustomAttributes = "";
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->EditValue = $this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->CurrentValue;
		$this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->PlaceHolder = RemoveHtml($this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C->caption());

		// INTRALIPID AND BARGLOBIN
		$this->INTRALIPID_AND_BARGLOBIN->EditAttrs["class"] = "form-control";
		$this->INTRALIPID_AND_BARGLOBIN->EditCustomAttributes = "";
		$this->INTRALIPID_AND_BARGLOBIN->EditValue = $this->INTRALIPID_AND_BARGLOBIN->CurrentValue;
		$this->INTRALIPID_AND_BARGLOBIN->PlaceHolder = RemoveHtml($this->INTRALIPID_AND_BARGLOBIN->caption());

		// LMWH 40MG1
		$this->LMWH_40MG1->EditAttrs["class"] = "form-control";
		$this->LMWH_40MG1->EditCustomAttributes = "";
		$this->LMWH_40MG1->EditValue = $this->LMWH_40MG1->CurrentValue;
		$this->LMWH_40MG1->PlaceHolder = RemoveHtml($this->LMWH_40MG1->caption());

		// ß-hCG1
		$this->DF_hCG1->EditAttrs["class"] = "form-control";
		$this->DF_hCG1->EditCustomAttributes = "";
		$this->DF_hCG1->EditValue = $this->DF_hCG1->CurrentValue;
		$this->DF_hCG1->PlaceHolder = RemoveHtml($this->DF_hCG1->caption());

		// Implantation rate2
		$this->Implantation_rate2->EditAttrs["class"] = "form-control";
		$this->Implantation_rate2->EditCustomAttributes = "";
		$this->Implantation_rate2->EditValue = $this->Implantation_rate2->CurrentValue;
		$this->Implantation_rate2->PlaceHolder = RemoveHtml($this->Implantation_rate2->caption());

		// Ectopic2
		$this->Ectopic2->EditAttrs["class"] = "form-control";
		$this->Ectopic2->EditCustomAttributes = "";
		$this->Ectopic2->EditValue = $this->Ectopic2->CurrentValue;
		$this->Ectopic2->PlaceHolder = RemoveHtml($this->Ectopic2->caption());

		// Type of preg2
		$this->Type_of_preg2->EditAttrs["class"] = "form-control";
		$this->Type_of_preg2->EditCustomAttributes = "";
		$this->Type_of_preg2->EditValue = $this->Type_of_preg2->CurrentValue;
		$this->Type_of_preg2->PlaceHolder = RemoveHtml($this->Type_of_preg2->caption());

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
		$this->baby_wt1->EditAttrs["class"] = "form-control";
		$this->baby_wt1->EditCustomAttributes = "";
		$this->baby_wt1->EditValue = $this->baby_wt1->CurrentValue;
		$this->baby_wt1->PlaceHolder = RemoveHtml($this->baby_wt1->caption());

		// GA at delivery2
		$this->GA_at_delivery2->EditAttrs["class"] = "form-control";
		$this->GA_at_delivery2->EditCustomAttributes = "";
		$this->GA_at_delivery2->EditValue = $this->GA_at_delivery2->CurrentValue;
		$this->GA_at_delivery2->PlaceHolder = RemoveHtml($this->GA_at_delivery2->caption());

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
					$doc->exportCaption($this->R_OVARY);
					$doc->exportCaption($this->R_AFC);
					$doc->exportCaption($this->L_OVARY);
					$doc->exportCaption($this->L_AFC);
					$doc->exportCaption($this->LH1);
					$doc->exportCaption($this->E2);
					$doc->exportCaption($this->StemCellInstallation);
					$doc->exportCaption($this->DHEAS);
					$doc->exportCaption($this->Mtorr);
					$doc->exportCaption($this->AMH1);
					$doc->exportCaption($this->LH);
					$doc->exportCaption($this->BMI28MALE29);
					$doc->exportCaption($this->MaleMedicalConditions);
					$doc->exportCaption($this->MaleExamination);
					$doc->exportCaption($this->SpermConcentration);
					$doc->exportCaption($this->SpermMotility28P26NP29);
					$doc->exportCaption($this->SpermMorphology);
					$doc->exportCaption($this->SpermRetrival);
					$doc->exportCaption($this->M_Testosterone);
					$doc->exportCaption($this->DFI);
					$doc->exportCaption($this->PreRX);
					$doc->exportCaption($this->CC_100);
					$doc->exportCaption($this->RFSH1A);
					$doc->exportCaption($this->HMG1);
					$doc->exportCaption($this->RLH);
					$doc->exportCaption($this->HMG_HP);
					$doc->exportCaption($this->day_of_HMG);
					$doc->exportCaption($this->Reason_for_HMG);
					$doc->exportCaption($this->RLH_day);
					$doc->exportCaption($this->DAYSOFSTIMULATION);
					$doc->exportCaption($this->Any_change_inbetween_28_Dose_added_2C_day29);
					$doc->exportCaption($this->day_of_Anta);
					$doc->exportCaption($this->R_FSH_TD);
					$doc->exportCaption($this->R_FSH_2B_HMG_TD);
					$doc->exportCaption($this->R_FSH_2B_R_LH_TD);
					$doc->exportCaption($this->HMG_TD);
					$doc->exportCaption($this->LH_TD);
					$doc->exportCaption($this->D1_LH);
					$doc->exportCaption($this->D1_E2);
					$doc->exportCaption($this->Trigger_day_E2);
					$doc->exportCaption($this->Trigger_day_P4);
					$doc->exportCaption($this->Trigger_day_LH);
					$doc->exportCaption($this->VIT_D);
					$doc->exportCaption($this->TRIGGERR);
					$doc->exportCaption($this->BHCG_BEFORE_RETRIEVAL);
					$doc->exportCaption($this->LH__12_HRS);
					$doc->exportCaption($this->P4__12_HRS);
					$doc->exportCaption($this->ET_on_hCG_day);
					$doc->exportCaption($this->ET_doppler);
					$doc->exportCaption($this->VI2FFI2FVFI);
					$doc->exportCaption($this->Endometrial_abnormality);
					$doc->exportCaption($this->AFC_ON_S1);
					$doc->exportCaption($this->TIME_OF_OPU_FROM_TRIGGER);
					$doc->exportCaption($this->SPERM_TYPE);
					$doc->exportCaption($this->EXPECTED_ON_TRIGGER_DAY);
					$doc->exportCaption($this->OOCYTES_RETRIEVED);
					$doc->exportCaption($this->TIME_OF_DENUDATION);
					$doc->exportCaption($this->M_II);
					$doc->exportCaption($this->MI);
					$doc->exportCaption($this->GV);
					$doc->exportCaption($this->ICSI_TIME_FORM_OPU);
					$doc->exportCaption($this->FERT_28_2_PN_29);
					$doc->exportCaption($this->DEG);
					$doc->exportCaption($this->D3_GRADE_A);
					$doc->exportCaption($this->D3_GRADE_B);
					$doc->exportCaption($this->D3_GRADE_C);
					$doc->exportCaption($this->D3_GRADE_D);
					$doc->exportCaption($this->USABLE_ON_DAY_3_ET);
					$doc->exportCaption($this->USABLE_ON_day_3_FREEZING);
					$doc->exportCaption($this->D5_GARDE_A);
					$doc->exportCaption($this->D5_GRADE_B);
					$doc->exportCaption($this->D5_GRADE_C);
					$doc->exportCaption($this->D5_GRADE_D);
					$doc->exportCaption($this->USABLE_ON_D5_ET);
					$doc->exportCaption($this->USABLE_ON_D5_FREEZING);
					$doc->exportCaption($this->D6_GRADE_A);
					$doc->exportCaption($this->D6_GRADE_B);
					$doc->exportCaption($this->D6_GRADE_C);
					$doc->exportCaption($this->D6_GRADE_D);
					$doc->exportCaption($this->D6_USABLE_EMBRYO_ET);
					$doc->exportCaption($this->D6_USABLE_FREEZING);
					$doc->exportCaption($this->TOTAL_BLAST);
					$doc->exportCaption($this->PGS);
					$doc->exportCaption($this->REMARKS);
					$doc->exportCaption($this->PU___D2FB);
					$doc->exportCaption($this->ICSI_D2FB);
					$doc->exportCaption($this->VIT_D2FB);
					$doc->exportCaption($this->ET_D2FB);
					$doc->exportCaption($this->LAB_COMMENTS);
					$doc->exportCaption($this->Reason_for_no_FRESH_transfer);
					$doc->exportCaption($this->No_of_embryos_transferred_Day_32F52C_A2CB2CC);
					$doc->exportCaption($this->EMBRYOS_PENDING);
					$doc->exportCaption($this->DAY_OF_TRANSFER);
					$doc->exportCaption($this->H2FD_sperm);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->sc_progesterone);
					$doc->exportCaption($this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd);
					$doc->exportCaption($this->CRINONE);
					$doc->exportCaption($this->progynova);
					$doc->exportCaption($this->Heparin);
					$doc->exportCaption($this->cabergolin);
					$doc->exportCaption($this->Antagonist);
					$doc->exportCaption($this->OHSS);
					$doc->exportCaption($this->Complications);
					$doc->exportCaption($this->LP_bleeding);
					$doc->exportCaption($this->DF_hCG);
					$doc->exportCaption($this->Implantation_rate);
					$doc->exportCaption($this->Ectopic);
					$doc->exportCaption($this->Type_of_preg);
					$doc->exportCaption($this->ANC);
					$doc->exportCaption($this->anomalies);
					$doc->exportCaption($this->baby_wt);
					$doc->exportCaption($this->GA_at_delivery);
					$doc->exportCaption($this->Pregnancy_outcome);
					$doc->exportCaption($this->_1st_FET);
					$doc->exportCaption($this->AFTER_HYSTEROSCOPY);
					$doc->exportCaption($this->AFTER_ERA);
					$doc->exportCaption($this->ERA);
					$doc->exportCaption($this->HRT);
					$doc->exportCaption($this->XGRAST2FPRP);
					$doc->exportCaption($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C);
					$doc->exportCaption($this->LMWH_40MG);
					$doc->exportCaption($this->DF_hCG2);
					$doc->exportCaption($this->Implantation_rate1);
					$doc->exportCaption($this->Ectopic1);
					$doc->exportCaption($this->Type_of_pregA);
					$doc->exportCaption($this->ANC1);
					$doc->exportCaption($this->anomalies2);
					$doc->exportCaption($this->baby_wt2);
					$doc->exportCaption($this->GA_at_delivery1);
					$doc->exportCaption($this->Pregnancy_outcome1);
					$doc->exportCaption($this->_2ND_FET);
					$doc->exportCaption($this->AFTER_HYSTEROSCOPY1);
					$doc->exportCaption($this->AFTER_ERA1);
					$doc->exportCaption($this->ERA1);
					$doc->exportCaption($this->HRT1);
					$doc->exportCaption($this->XGRAST2FPRP1);
					$doc->exportCaption($this->NUMBER_OF_EMBRYOS);
					$doc->exportCaption($this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C);
					$doc->exportCaption($this->INTRALIPID_AND_BARGLOBIN);
					$doc->exportCaption($this->LMWH_40MG1);
					$doc->exportCaption($this->DF_hCG1);
					$doc->exportCaption($this->Implantation_rate2);
					$doc->exportCaption($this->Ectopic2);
					$doc->exportCaption($this->Type_of_preg2);
					$doc->exportCaption($this->ANCA);
					$doc->exportCaption($this->anomalies1);
					$doc->exportCaption($this->baby_wt1);
					$doc->exportCaption($this->GA_at_delivery2);
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
					$doc->exportCaption($this->R_OVARY);
					$doc->exportCaption($this->R_AFC);
					$doc->exportCaption($this->L_OVARY);
					$doc->exportCaption($this->L_AFC);
					$doc->exportCaption($this->E2);
					$doc->exportCaption($this->AMH1);
					$doc->exportCaption($this->BMI28MALE29);
					$doc->exportCaption($this->MaleMedicalConditions);
					$doc->exportCaption($this->CC_100);
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
						$doc->exportField($this->R_OVARY);
						$doc->exportField($this->R_AFC);
						$doc->exportField($this->L_OVARY);
						$doc->exportField($this->L_AFC);
						$doc->exportField($this->LH1);
						$doc->exportField($this->E2);
						$doc->exportField($this->StemCellInstallation);
						$doc->exportField($this->DHEAS);
						$doc->exportField($this->Mtorr);
						$doc->exportField($this->AMH1);
						$doc->exportField($this->LH);
						$doc->exportField($this->BMI28MALE29);
						$doc->exportField($this->MaleMedicalConditions);
						$doc->exportField($this->MaleExamination);
						$doc->exportField($this->SpermConcentration);
						$doc->exportField($this->SpermMotility28P26NP29);
						$doc->exportField($this->SpermMorphology);
						$doc->exportField($this->SpermRetrival);
						$doc->exportField($this->M_Testosterone);
						$doc->exportField($this->DFI);
						$doc->exportField($this->PreRX);
						$doc->exportField($this->CC_100);
						$doc->exportField($this->RFSH1A);
						$doc->exportField($this->HMG1);
						$doc->exportField($this->RLH);
						$doc->exportField($this->HMG_HP);
						$doc->exportField($this->day_of_HMG);
						$doc->exportField($this->Reason_for_HMG);
						$doc->exportField($this->RLH_day);
						$doc->exportField($this->DAYSOFSTIMULATION);
						$doc->exportField($this->Any_change_inbetween_28_Dose_added_2C_day29);
						$doc->exportField($this->day_of_Anta);
						$doc->exportField($this->R_FSH_TD);
						$doc->exportField($this->R_FSH_2B_HMG_TD);
						$doc->exportField($this->R_FSH_2B_R_LH_TD);
						$doc->exportField($this->HMG_TD);
						$doc->exportField($this->LH_TD);
						$doc->exportField($this->D1_LH);
						$doc->exportField($this->D1_E2);
						$doc->exportField($this->Trigger_day_E2);
						$doc->exportField($this->Trigger_day_P4);
						$doc->exportField($this->Trigger_day_LH);
						$doc->exportField($this->VIT_D);
						$doc->exportField($this->TRIGGERR);
						$doc->exportField($this->BHCG_BEFORE_RETRIEVAL);
						$doc->exportField($this->LH__12_HRS);
						$doc->exportField($this->P4__12_HRS);
						$doc->exportField($this->ET_on_hCG_day);
						$doc->exportField($this->ET_doppler);
						$doc->exportField($this->VI2FFI2FVFI);
						$doc->exportField($this->Endometrial_abnormality);
						$doc->exportField($this->AFC_ON_S1);
						$doc->exportField($this->TIME_OF_OPU_FROM_TRIGGER);
						$doc->exportField($this->SPERM_TYPE);
						$doc->exportField($this->EXPECTED_ON_TRIGGER_DAY);
						$doc->exportField($this->OOCYTES_RETRIEVED);
						$doc->exportField($this->TIME_OF_DENUDATION);
						$doc->exportField($this->M_II);
						$doc->exportField($this->MI);
						$doc->exportField($this->GV);
						$doc->exportField($this->ICSI_TIME_FORM_OPU);
						$doc->exportField($this->FERT_28_2_PN_29);
						$doc->exportField($this->DEG);
						$doc->exportField($this->D3_GRADE_A);
						$doc->exportField($this->D3_GRADE_B);
						$doc->exportField($this->D3_GRADE_C);
						$doc->exportField($this->D3_GRADE_D);
						$doc->exportField($this->USABLE_ON_DAY_3_ET);
						$doc->exportField($this->USABLE_ON_day_3_FREEZING);
						$doc->exportField($this->D5_GARDE_A);
						$doc->exportField($this->D5_GRADE_B);
						$doc->exportField($this->D5_GRADE_C);
						$doc->exportField($this->D5_GRADE_D);
						$doc->exportField($this->USABLE_ON_D5_ET);
						$doc->exportField($this->USABLE_ON_D5_FREEZING);
						$doc->exportField($this->D6_GRADE_A);
						$doc->exportField($this->D6_GRADE_B);
						$doc->exportField($this->D6_GRADE_C);
						$doc->exportField($this->D6_GRADE_D);
						$doc->exportField($this->D6_USABLE_EMBRYO_ET);
						$doc->exportField($this->D6_USABLE_FREEZING);
						$doc->exportField($this->TOTAL_BLAST);
						$doc->exportField($this->PGS);
						$doc->exportField($this->REMARKS);
						$doc->exportField($this->PU___D2FB);
						$doc->exportField($this->ICSI_D2FB);
						$doc->exportField($this->VIT_D2FB);
						$doc->exportField($this->ET_D2FB);
						$doc->exportField($this->LAB_COMMENTS);
						$doc->exportField($this->Reason_for_no_FRESH_transfer);
						$doc->exportField($this->No_of_embryos_transferred_Day_32F52C_A2CB2CC);
						$doc->exportField($this->EMBRYOS_PENDING);
						$doc->exportField($this->DAY_OF_TRANSFER);
						$doc->exportField($this->H2FD_sperm);
						$doc->exportField($this->Comments);
						$doc->exportField($this->sc_progesterone);
						$doc->exportField($this->Natural_micronised_400mg_bd_2B_duphaston_10mg_bd);
						$doc->exportField($this->CRINONE);
						$doc->exportField($this->progynova);
						$doc->exportField($this->Heparin);
						$doc->exportField($this->cabergolin);
						$doc->exportField($this->Antagonist);
						$doc->exportField($this->OHSS);
						$doc->exportField($this->Complications);
						$doc->exportField($this->LP_bleeding);
						$doc->exportField($this->DF_hCG);
						$doc->exportField($this->Implantation_rate);
						$doc->exportField($this->Ectopic);
						$doc->exportField($this->Type_of_preg);
						$doc->exportField($this->ANC);
						$doc->exportField($this->anomalies);
						$doc->exportField($this->baby_wt);
						$doc->exportField($this->GA_at_delivery);
						$doc->exportField($this->Pregnancy_outcome);
						$doc->exportField($this->_1st_FET);
						$doc->exportField($this->AFTER_HYSTEROSCOPY);
						$doc->exportField($this->AFTER_ERA);
						$doc->exportField($this->ERA);
						$doc->exportField($this->HRT);
						$doc->exportField($this->XGRAST2FPRP);
						$doc->exportField($this->EMBRYO_DETAILS_DAY_32F_52C_A2C_B2C_C);
						$doc->exportField($this->LMWH_40MG);
						$doc->exportField($this->DF_hCG2);
						$doc->exportField($this->Implantation_rate1);
						$doc->exportField($this->Ectopic1);
						$doc->exportField($this->Type_of_pregA);
						$doc->exportField($this->ANC1);
						$doc->exportField($this->anomalies2);
						$doc->exportField($this->baby_wt2);
						$doc->exportField($this->GA_at_delivery1);
						$doc->exportField($this->Pregnancy_outcome1);
						$doc->exportField($this->_2ND_FET);
						$doc->exportField($this->AFTER_HYSTEROSCOPY1);
						$doc->exportField($this->AFTER_ERA1);
						$doc->exportField($this->ERA1);
						$doc->exportField($this->HRT1);
						$doc->exportField($this->XGRAST2FPRP1);
						$doc->exportField($this->NUMBER_OF_EMBRYOS);
						$doc->exportField($this->EMBRYO_DETAILS_DAY_32F_52C2F6_A2C_B2C_C);
						$doc->exportField($this->INTRALIPID_AND_BARGLOBIN);
						$doc->exportField($this->LMWH_40MG1);
						$doc->exportField($this->DF_hCG1);
						$doc->exportField($this->Implantation_rate2);
						$doc->exportField($this->Ectopic2);
						$doc->exportField($this->Type_of_preg2);
						$doc->exportField($this->ANCA);
						$doc->exportField($this->anomalies1);
						$doc->exportField($this->baby_wt1);
						$doc->exportField($this->GA_at_delivery2);
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
						$doc->exportField($this->R_OVARY);
						$doc->exportField($this->R_AFC);
						$doc->exportField($this->L_OVARY);
						$doc->exportField($this->L_AFC);
						$doc->exportField($this->E2);
						$doc->exportField($this->AMH1);
						$doc->exportField($this->BMI28MALE29);
						$doc->exportField($this->MaleMedicalConditions);
						$doc->exportField($this->CC_100);
						$doc->exportField($this->RFSH1A);
						$doc->exportField($this->HMG1);
						$doc->exportField($this->DAYSOFSTIMULATION);
						$doc->exportField($this->TRIGGERR);
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

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>