<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_template_couple_vitals
 */
class view_template_couple_vitals extends DbTable
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
	public $Male;
	public $Female;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $malepropic;
	public $femalepropic;
	public $HusbandEducation;
	public $WifeEducation;
	public $HusbandWorkHours;
	public $WifeWorkHours;
	public $PatientLanguage;
	public $ReferedBy;
	public $ReferPhNo;
	public $WifeCell;
	public $HusbandCell;
	public $WifeEmail;
	public $HusbandEmail;
	public $ARTCYCLE;
	public $RESULT;
	public $CoupleID;
	public $HospID;
	public $PatientName;
	public $PatientID;
	public $PartnerName;
	public $PartnerID;
	public $DrID;
	public $DrDepartment;
	public $Doctor;
	public $hid;
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
	public $TidNo;
	public $pFamilyHistory;
	public $pTemplateMedications;
	public $AntiTPO;
	public $AntiTG;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_template_couple_vitals';
		$this->TableName = 'view_template_couple_vitals';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_template_couple_vitals`";
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
		$this->id = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Male
		$this->Male = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Male', 'Male', '`Male`', '`Male`', 3, -1, FALSE, '`Male`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Male->Nullable = FALSE; // NOT NULL field
		$this->Male->Required = TRUE; // Required field
		$this->Male->Sortable = TRUE; // Allow sort
		$this->Male->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Male'] = &$this->Male;

		// Female
		$this->Female = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Female', 'Female', '`Female`', '`Female`', 3, -1, FALSE, '`Female`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Female->Nullable = FALSE; // NOT NULL field
		$this->Female->Required = TRUE; // Required field
		$this->Female->Sortable = TRUE; // Allow sort
		$this->Female->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Female'] = &$this->Female;

		// status
		$this->status = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// malepropic
		$this->malepropic = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_malepropic', 'malepropic', '`malepropic`', '`malepropic`', 201, -1, FALSE, '`malepropic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->malepropic->Sortable = TRUE; // Allow sort
		$this->fields['malepropic'] = &$this->malepropic;

		// femalepropic
		$this->femalepropic = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_femalepropic', 'femalepropic', '`femalepropic`', '`femalepropic`', 201, -1, FALSE, '`femalepropic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->femalepropic->Sortable = TRUE; // Allow sort
		$this->fields['femalepropic'] = &$this->femalepropic;

		// HusbandEducation
		$this->HusbandEducation = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandEducation', 'HusbandEducation', '`HusbandEducation`', '`HusbandEducation`', 200, -1, FALSE, '`HusbandEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandEducation->Sortable = TRUE; // Allow sort
		$this->fields['HusbandEducation'] = &$this->HusbandEducation;

		// WifeEducation
		$this->WifeEducation = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeEducation', 'WifeEducation', '`WifeEducation`', '`WifeEducation`', 200, -1, FALSE, '`WifeEducation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeEducation->Sortable = TRUE; // Allow sort
		$this->fields['WifeEducation'] = &$this->WifeEducation;

		// HusbandWorkHours
		$this->HusbandWorkHours = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandWorkHours', 'HusbandWorkHours', '`HusbandWorkHours`', '`HusbandWorkHours`', 200, -1, FALSE, '`HusbandWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['HusbandWorkHours'] = &$this->HusbandWorkHours;

		// WifeWorkHours
		$this->WifeWorkHours = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeWorkHours', 'WifeWorkHours', '`WifeWorkHours`', '`WifeWorkHours`', 200, -1, FALSE, '`WifeWorkHours`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeWorkHours->Sortable = TRUE; // Allow sort
		$this->fields['WifeWorkHours'] = &$this->WifeWorkHours;

		// PatientLanguage
		$this->PatientLanguage = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientLanguage', 'PatientLanguage', '`PatientLanguage`', '`PatientLanguage`', 200, -1, FALSE, '`PatientLanguage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientLanguage->Sortable = TRUE; // Allow sort
		$this->fields['PatientLanguage'] = &$this->PatientLanguage;

		// ReferedBy
		$this->ReferedBy = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ReferedBy', 'ReferedBy', '`ReferedBy`', '`ReferedBy`', 200, -1, FALSE, '`ReferedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferedBy->Sortable = TRUE; // Allow sort
		$this->fields['ReferedBy'] = &$this->ReferedBy;

		// ReferPhNo
		$this->ReferPhNo = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ReferPhNo', 'ReferPhNo', '`ReferPhNo`', '`ReferPhNo`', 200, -1, FALSE, '`ReferPhNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferPhNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferPhNo'] = &$this->ReferPhNo;

		// WifeCell
		$this->WifeCell = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, -1, FALSE, '`WifeCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeCell->Sortable = TRUE; // Allow sort
		$this->fields['WifeCell'] = &$this->WifeCell;

		// HusbandCell
		$this->HusbandCell = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, -1, FALSE, '`HusbandCell`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandCell->Sortable = TRUE; // Allow sort
		$this->fields['HusbandCell'] = &$this->HusbandCell;

		// WifeEmail
		$this->WifeEmail = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_WifeEmail', 'WifeEmail', '`WifeEmail`', '`WifeEmail`', 200, -1, FALSE, '`WifeEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WifeEmail->Sortable = TRUE; // Allow sort
		$this->fields['WifeEmail'] = &$this->WifeEmail;

		// HusbandEmail
		$this->HusbandEmail = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HusbandEmail', 'HusbandEmail', '`HusbandEmail`', '`HusbandEmail`', 200, -1, FALSE, '`HusbandEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HusbandEmail->Sortable = TRUE; // Allow sort
		$this->fields['HusbandEmail'] = &$this->HusbandEmail;

		// ARTCYCLE
		$this->ARTCYCLE = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, -1, FALSE, '`ARTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ARTCYCLE->Sortable = TRUE; // Allow sort
		$this->fields['ARTCYCLE'] = &$this->ARTCYCLE;

		// RESULT
		$this->RESULT = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, -1, FALSE, '`RESULT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RESULT->Sortable = TRUE; // Allow sort
		$this->fields['RESULT'] = &$this->RESULT;

		// CoupleID
		$this->CoupleID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, -1, FALSE, '`CoupleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoupleID->Sortable = TRUE; // Allow sort
		$this->fields['CoupleID'] = &$this->CoupleID;

		// HospID
		$this->HospID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// PatientName
		$this->PatientName = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// PatientID
		$this->PatientID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// PartnerName
		$this->PartnerName = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerID
		$this->PartnerID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// DrID
		$this->DrID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// DrDepartment
		$this->DrDepartment = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DrDepartment', 'DrDepartment', '`DrDepartment`', '`DrDepartment`', 200, -1, FALSE, '`DrDepartment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrDepartment->Sortable = TRUE; // Allow sort
		$this->fields['DrDepartment'] = &$this->DrDepartment;

		// Doctor
		$this->Doctor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Doctor', 'Doctor', '`Doctor`', '`Doctor`', 200, -1, FALSE, '`Doctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Doctor->Sortable = TRUE; // Allow sort
		$this->fields['Doctor'] = &$this->Doctor;

		// hid
		$this->hid = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_hid', 'hid', '`hid`', '`hid`', 3, -1, FALSE, '`hid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->hid->IsAutoIncrement = TRUE; // Autoincrement field
		$this->hid->IsPrimaryKey = TRUE; // Primary key field
		$this->hid->Sortable = TRUE; // Allow sort
		$this->hid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['hid'] = &$this->hid;

		// RIDNO
		$this->RIDNO = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// SEX
		$this->SEX = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SEX', 'SEX', '`SEX`', '`SEX`', 200, -1, FALSE, '`SEX`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEX->Sortable = TRUE; // Allow sort
		$this->fields['SEX'] = &$this->SEX;

		// Religion
		$this->Religion = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, -1, FALSE, '`Religion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->fields['Religion'] = &$this->Religion;

		// Address
		$this->Address = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Address', 'Address', '`Address`', '`Address`', 200, -1, FALSE, '`Address`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->fields['Address'] = &$this->Address;

		// IdentificationMark
		$this->IdentificationMark = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// DoublewitnessName1
		$this->DoublewitnessName1 = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DoublewitnessName1', 'DoublewitnessName1', '`DoublewitnessName1`', '`DoublewitnessName1`', 201, -1, FALSE, '`DoublewitnessName1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DoublewitnessName1->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName1'] = &$this->DoublewitnessName1;

		// DoublewitnessName2
		$this->DoublewitnessName2 = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_DoublewitnessName2', 'DoublewitnessName2', '`DoublewitnessName2`', '`DoublewitnessName2`', 201, -1, FALSE, '`DoublewitnessName2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DoublewitnessName2->Sortable = TRUE; // Allow sort
		$this->fields['DoublewitnessName2'] = &$this->DoublewitnessName2;

		// Chiefcomplaints
		$this->Chiefcomplaints = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Chiefcomplaints', 'Chiefcomplaints', '`Chiefcomplaints`', '`Chiefcomplaints`', 201, -1, FALSE, '`Chiefcomplaints`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Chiefcomplaints->Sortable = TRUE; // Allow sort
		$this->fields['Chiefcomplaints'] = &$this->Chiefcomplaints;

		// MenstrualHistory
		$this->MenstrualHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MenstrualHistory', 'MenstrualHistory', '`MenstrualHistory`', '`MenstrualHistory`', 201, -1, FALSE, '`MenstrualHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MenstrualHistory->Sortable = TRUE; // Allow sort
		$this->fields['MenstrualHistory'] = &$this->MenstrualHistory;

		// ObstetricHistory
		$this->ObstetricHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_ObstetricHistory', 'ObstetricHistory', '`ObstetricHistory`', '`ObstetricHistory`', 201, -1, FALSE, '`ObstetricHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ObstetricHistory->Sortable = TRUE; // Allow sort
		$this->fields['ObstetricHistory'] = &$this->ObstetricHistory;

		// MedicalHistory
		$this->MedicalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MedicalHistory', 'MedicalHistory', '`MedicalHistory`', '`MedicalHistory`', 200, -1, FALSE, '`MedicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MedicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['MedicalHistory'] = &$this->MedicalHistory;

		// SurgicalHistory
		$this->SurgicalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SurgicalHistory', 'SurgicalHistory', '`SurgicalHistory`', '`SurgicalHistory`', 200, -1, FALSE, '`SurgicalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SurgicalHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgicalHistory'] = &$this->SurgicalHistory;

		// Generalexaminationpallor
		$this->Generalexaminationpallor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Generalexaminationpallor', 'Generalexaminationpallor', '`Generalexaminationpallor`', '`Generalexaminationpallor`', 200, -1, FALSE, '`Generalexaminationpallor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Generalexaminationpallor->Sortable = TRUE; // Allow sort
		$this->fields['Generalexaminationpallor'] = &$this->Generalexaminationpallor;

		// PR
		$this->PR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PR', 'PR', '`PR`', '`PR`', 200, -1, FALSE, '`PR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR->Sortable = TRUE; // Allow sort
		$this->fields['PR'] = &$this->PR;

		// CVS
		$this->CVS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CVS', 'CVS', '`CVS`', '`CVS`', 200, -1, FALSE, '`CVS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CVS->Sortable = TRUE; // Allow sort
		$this->fields['CVS'] = &$this->CVS;

		// PA
		$this->PA = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PA', 'PA', '`PA`', '`PA`', 200, -1, FALSE, '`PA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PA->Sortable = TRUE; // Allow sort
		$this->fields['PA'] = &$this->PA;

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PROVISIONALDIAGNOSIS', 'PROVISIONALDIAGNOSIS', '`PROVISIONALDIAGNOSIS`', '`PROVISIONALDIAGNOSIS`', 200, -1, FALSE, '`PROVISIONALDIAGNOSIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PROVISIONALDIAGNOSIS->Sortable = TRUE; // Allow sort
		$this->fields['PROVISIONALDIAGNOSIS'] = &$this->PROVISIONALDIAGNOSIS;

		// Investigations
		$this->Investigations = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Investigations', 'Investigations', '`Investigations`', '`Investigations`', 200, -1, FALSE, '`Investigations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Investigations->Sortable = TRUE; // Allow sort
		$this->fields['Investigations'] = &$this->Investigations;

		// Fheight
		$this->Fheight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fheight', 'Fheight', '`Fheight`', '`Fheight`', 200, -1, FALSE, '`Fheight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fheight->Sortable = TRUE; // Allow sort
		$this->fields['Fheight'] = &$this->Fheight;

		// Fweight
		$this->Fweight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fweight', 'Fweight', '`Fweight`', '`Fweight`', 200, -1, FALSE, '`Fweight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fweight->Sortable = TRUE; // Allow sort
		$this->fields['Fweight'] = &$this->Fweight;

		// FBMI
		$this->FBMI = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBMI', 'FBMI', '`FBMI`', '`FBMI`', 200, -1, FALSE, '`FBMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBMI->Sortable = TRUE; // Allow sort
		$this->fields['FBMI'] = &$this->FBMI;

		// FBloodgroup
		$this->FBloodgroup = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBloodgroup', 'FBloodgroup', '`FBloodgroup`', '`FBloodgroup`', 200, -1, FALSE, '`FBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBloodgroup->Sortable = TRUE; // Allow sort
		$this->fields['FBloodgroup'] = &$this->FBloodgroup;

		// Mheight
		$this->Mheight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mheight', 'Mheight', '`Mheight`', '`Mheight`', 200, -1, FALSE, '`Mheight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mheight->Sortable = TRUE; // Allow sort
		$this->fields['Mheight'] = &$this->Mheight;

		// Mweight
		$this->Mweight = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mweight', 'Mweight', '`Mweight`', '`Mweight`', 200, -1, FALSE, '`Mweight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mweight->Sortable = TRUE; // Allow sort
		$this->fields['Mweight'] = &$this->Mweight;

		// MBMI
		$this->MBMI = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBMI', 'MBMI', '`MBMI`', '`MBMI`', 200, -1, FALSE, '`MBMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MBMI->Sortable = TRUE; // Allow sort
		$this->fields['MBMI'] = &$this->MBMI;

		// MBloodgroup
		$this->MBloodgroup = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBloodgroup', 'MBloodgroup', '`MBloodgroup`', '`MBloodgroup`', 200, -1, FALSE, '`MBloodgroup`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MBloodgroup->Sortable = TRUE; // Allow sort
		$this->fields['MBloodgroup'] = &$this->MBloodgroup;

		// FBuild
		$this->FBuild = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FBuild', 'FBuild', '`FBuild`', '`FBuild`', 200, -1, FALSE, '`FBuild`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBuild->Sortable = TRUE; // Allow sort
		$this->fields['FBuild'] = &$this->FBuild;

		// MBuild
		$this->MBuild = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MBuild', 'MBuild', '`MBuild`', '`MBuild`', 200, -1, FALSE, '`MBuild`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MBuild->Sortable = TRUE; // Allow sort
		$this->fields['MBuild'] = &$this->MBuild;

		// FSkinColor
		$this->FSkinColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FSkinColor', 'FSkinColor', '`FSkinColor`', '`FSkinColor`', 200, -1, FALSE, '`FSkinColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FSkinColor->Sortable = TRUE; // Allow sort
		$this->fields['FSkinColor'] = &$this->FSkinColor;

		// MSkinColor
		$this->MSkinColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MSkinColor', 'MSkinColor', '`MSkinColor`', '`MSkinColor`', 200, -1, FALSE, '`MSkinColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MSkinColor->Sortable = TRUE; // Allow sort
		$this->fields['MSkinColor'] = &$this->MSkinColor;

		// FEyesColor
		$this->FEyesColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FEyesColor', 'FEyesColor', '`FEyesColor`', '`FEyesColor`', 200, -1, FALSE, '`FEyesColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FEyesColor->Sortable = TRUE; // Allow sort
		$this->fields['FEyesColor'] = &$this->FEyesColor;

		// MEyesColor
		$this->MEyesColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MEyesColor', 'MEyesColor', '`MEyesColor`', '`MEyesColor`', 200, -1, FALSE, '`MEyesColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MEyesColor->Sortable = TRUE; // Allow sort
		$this->fields['MEyesColor'] = &$this->MEyesColor;

		// FHairColor
		$this->FHairColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FHairColor', 'FHairColor', '`FHairColor`', '`FHairColor`', 200, -1, FALSE, '`FHairColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FHairColor->Sortable = TRUE; // Allow sort
		$this->fields['FHairColor'] = &$this->FHairColor;

		// MhairColor
		$this->MhairColor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MhairColor', 'MhairColor', '`MhairColor`', '`MhairColor`', 200, -1, FALSE, '`MhairColor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MhairColor->Sortable = TRUE; // Allow sort
		$this->fields['MhairColor'] = &$this->MhairColor;

		// FhairTexture
		$this->FhairTexture = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FhairTexture', 'FhairTexture', '`FhairTexture`', '`FhairTexture`', 200, -1, FALSE, '`FhairTexture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FhairTexture->Sortable = TRUE; // Allow sort
		$this->fields['FhairTexture'] = &$this->FhairTexture;

		// MHairTexture
		$this->MHairTexture = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MHairTexture', 'MHairTexture', '`MHairTexture`', '`MHairTexture`', 200, -1, FALSE, '`MHairTexture`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MHairTexture->Sortable = TRUE; // Allow sort
		$this->fields['MHairTexture'] = &$this->MHairTexture;

		// Fothers
		$this->Fothers = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Fothers', 'Fothers', '`Fothers`', '`Fothers`', 200, -1, FALSE, '`Fothers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fothers->Sortable = TRUE; // Allow sort
		$this->fields['Fothers'] = &$this->Fothers;

		// Mothers
		$this->Mothers = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Mothers', 'Mothers', '`Mothers`', '`Mothers`', 200, -1, FALSE, '`Mothers`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mothers->Sortable = TRUE; // Allow sort
		$this->fields['Mothers'] = &$this->Mothers;

		// PGE
		$this->PGE = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PGE', 'PGE', '`PGE`', '`PGE`', 200, -1, FALSE, '`PGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PGE->Sortable = TRUE; // Allow sort
		$this->fields['PGE'] = &$this->PGE;

		// PPR
		$this->PPR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPR', 'PPR', '`PPR`', '`PPR`', 200, -1, FALSE, '`PPR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPR->Sortable = TRUE; // Allow sort
		$this->fields['PPR'] = &$this->PPR;

		// PBP
		$this->PBP = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PBP', 'PBP', '`PBP`', '`PBP`', 200, -1, FALSE, '`PBP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PBP->Sortable = TRUE; // Allow sort
		$this->fields['PBP'] = &$this->PBP;

		// Breast
		$this->Breast = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Breast', 'Breast', '`Breast`', '`Breast`', 200, -1, FALSE, '`Breast`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Breast->Sortable = TRUE; // Allow sort
		$this->fields['Breast'] = &$this->Breast;

		// PPA
		$this->PPA = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPA', 'PPA', '`PPA`', '`PPA`', 200, -1, FALSE, '`PPA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPA->Sortable = TRUE; // Allow sort
		$this->fields['PPA'] = &$this->PPA;

		// PPSV
		$this->PPSV = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPSV', 'PPSV', '`PPSV`', '`PPSV`', 200, -1, FALSE, '`PPSV`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPSV->Sortable = TRUE; // Allow sort
		$this->fields['PPSV'] = &$this->PPSV;

		// PPAPSMEAR
		$this->PPAPSMEAR = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPAPSMEAR', 'PPAPSMEAR', '`PPAPSMEAR`', '`PPAPSMEAR`', 200, -1, FALSE, '`PPAPSMEAR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PPAPSMEAR->Sortable = TRUE; // Allow sort
		$this->fields['PPAPSMEAR'] = &$this->PPAPSMEAR;

		// PTHYROID
		$this->PTHYROID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PTHYROID', 'PTHYROID', '`PTHYROID`', '`PTHYROID`', 200, -1, FALSE, '`PTHYROID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTHYROID->Sortable = TRUE; // Allow sort
		$this->fields['PTHYROID'] = &$this->PTHYROID;

		// MTHYROID
		$this->MTHYROID = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MTHYROID', 'MTHYROID', '`MTHYROID`', '`MTHYROID`', 200, -1, FALSE, '`MTHYROID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MTHYROID->Sortable = TRUE; // Allow sort
		$this->fields['MTHYROID'] = &$this->MTHYROID;

		// SecSexCharacters
		$this->SecSexCharacters = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SecSexCharacters', 'SecSexCharacters', '`SecSexCharacters`', '`SecSexCharacters`', 200, -1, FALSE, '`SecSexCharacters`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SecSexCharacters->Sortable = TRUE; // Allow sort
		$this->fields['SecSexCharacters'] = &$this->SecSexCharacters;

		// PenisUM
		$this->PenisUM = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PenisUM', 'PenisUM', '`PenisUM`', '`PenisUM`', 200, -1, FALSE, '`PenisUM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PenisUM->Sortable = TRUE; // Allow sort
		$this->fields['PenisUM'] = &$this->PenisUM;

		// VAS
		$this->VAS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_VAS', 'VAS', '`VAS`', '`VAS`', 200, -1, FALSE, '`VAS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VAS->Sortable = TRUE; // Allow sort
		$this->fields['VAS'] = &$this->VAS;

		// EPIDIDYMIS
		$this->EPIDIDYMIS = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_EPIDIDYMIS', 'EPIDIDYMIS', '`EPIDIDYMIS`', '`EPIDIDYMIS`', 200, -1, FALSE, '`EPIDIDYMIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EPIDIDYMIS->Sortable = TRUE; // Allow sort
		$this->fields['EPIDIDYMIS'] = &$this->EPIDIDYMIS;

		// Varicocele
		$this->Varicocele = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Varicocele', 'Varicocele', '`Varicocele`', '`Varicocele`', 200, -1, FALSE, '`Varicocele`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Varicocele->Sortable = TRUE; // Allow sort
		$this->fields['Varicocele'] = &$this->Varicocele;

		// FertilityTreatmentHistory
		$this->FertilityTreatmentHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FertilityTreatmentHistory', 'FertilityTreatmentHistory', '`FertilityTreatmentHistory`', '`FertilityTreatmentHistory`', 201, -1, FALSE, '`FertilityTreatmentHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FertilityTreatmentHistory->Sortable = TRUE; // Allow sort
		$this->fields['FertilityTreatmentHistory'] = &$this->FertilityTreatmentHistory;

		// SurgeryHistory
		$this->SurgeryHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SurgeryHistory', 'SurgeryHistory', '`SurgeryHistory`', '`SurgeryHistory`', 201, -1, FALSE, '`SurgeryHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SurgeryHistory->Sortable = TRUE; // Allow sort
		$this->fields['SurgeryHistory'] = &$this->SurgeryHistory;

		// FamilyHistory
		$this->FamilyHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_FamilyHistory', 'FamilyHistory', '`FamilyHistory`', '`FamilyHistory`', 200, -1, FALSE, '`FamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FamilyHistory->Sortable = TRUE; // Allow sort
		$this->fields['FamilyHistory'] = &$this->FamilyHistory;

		// PInvestigations
		$this->PInvestigations = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PInvestigations', 'PInvestigations', '`PInvestigations`', '`PInvestigations`', 201, -1, FALSE, '`PInvestigations`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PInvestigations->Sortable = TRUE; // Allow sort
		$this->fields['PInvestigations'] = &$this->PInvestigations;

		// Addictions
		$this->Addictions = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Addictions', 'Addictions', '`Addictions`', '`Addictions`', 200, -1, FALSE, '`Addictions`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Addictions->Sortable = TRUE; // Allow sort
		$this->fields['Addictions'] = &$this->Addictions;

		// Medications
		$this->Medications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Medications', 'Medications', '`Medications`', '`Medications`', 201, -1, FALSE, '`Medications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Medications->Sortable = TRUE; // Allow sort
		$this->fields['Medications'] = &$this->Medications;

		// Medical
		$this->Medical = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Medical', 'Medical', '`Medical`', '`Medical`', 200, -1, FALSE, '`Medical`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Medical->Sortable = TRUE; // Allow sort
		$this->fields['Medical'] = &$this->Medical;

		// Surgical
		$this->Surgical = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_Surgical', 'Surgical', '`Surgical`', '`Surgical`', 200, -1, FALSE, '`Surgical`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Surgical->Sortable = TRUE; // Allow sort
		$this->fields['Surgical'] = &$this->Surgical;

		// CoitalHistory
		$this->CoitalHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CoitalHistory', 'CoitalHistory', '`CoitalHistory`', '`CoitalHistory`', 200, -1, FALSE, '`CoitalHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoitalHistory->Sortable = TRUE; // Allow sort
		$this->fields['CoitalHistory'] = &$this->CoitalHistory;

		// SemenAnalysis
		$this->SemenAnalysis = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_SemenAnalysis', 'SemenAnalysis', '`SemenAnalysis`', '`SemenAnalysis`', 201, -1, FALSE, '`SemenAnalysis`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->SemenAnalysis->Sortable = TRUE; // Allow sort
		$this->fields['SemenAnalysis'] = &$this->SemenAnalysis;

		// MInsvestications
		$this->MInsvestications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MInsvestications', 'MInsvestications', '`MInsvestications`', '`MInsvestications`', 201, -1, FALSE, '`MInsvestications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MInsvestications->Sortable = TRUE; // Allow sort
		$this->fields['MInsvestications'] = &$this->MInsvestications;

		// PImpression
		$this->PImpression = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PImpression', 'PImpression', '`PImpression`', '`PImpression`', 201, -1, FALSE, '`PImpression`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PImpression->Sortable = TRUE; // Allow sort
		$this->fields['PImpression'] = &$this->PImpression;

		// MIMpression
		$this->MIMpression = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MIMpression', 'MIMpression', '`MIMpression`', '`MIMpression`', 201, -1, FALSE, '`MIMpression`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MIMpression->Sortable = TRUE; // Allow sort
		$this->fields['MIMpression'] = &$this->MIMpression;

		// PPlanOfManagement
		$this->PPlanOfManagement = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PPlanOfManagement', 'PPlanOfManagement', '`PPlanOfManagement`', '`PPlanOfManagement`', 201, -1, FALSE, '`PPlanOfManagement`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PPlanOfManagement->Sortable = TRUE; // Allow sort
		$this->fields['PPlanOfManagement'] = &$this->PPlanOfManagement;

		// MPlanOfManagement
		$this->MPlanOfManagement = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MPlanOfManagement', 'MPlanOfManagement', '`MPlanOfManagement`', '`MPlanOfManagement`', 201, -1, FALSE, '`MPlanOfManagement`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MPlanOfManagement->Sortable = TRUE; // Allow sort
		$this->fields['MPlanOfManagement'] = &$this->MPlanOfManagement;

		// PReadMore
		$this->PReadMore = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_PReadMore', 'PReadMore', '`PReadMore`', '`PReadMore`', 201, -1, FALSE, '`PReadMore`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PReadMore->Sortable = TRUE; // Allow sort
		$this->fields['PReadMore'] = &$this->PReadMore;

		// MReadMore
		$this->MReadMore = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MReadMore', 'MReadMore', '`MReadMore`', '`MReadMore`', 201, -1, FALSE, '`MReadMore`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->MReadMore->Sortable = TRUE; // Allow sort
		$this->fields['MReadMore'] = &$this->MReadMore;

		// MariedFor
		$this->MariedFor = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_MariedFor', 'MariedFor', '`MariedFor`', '`MariedFor`', 200, -1, FALSE, '`MariedFor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MariedFor->Sortable = TRUE; // Allow sort
		$this->fields['MariedFor'] = &$this->MariedFor;

		// CMNCM
		$this->CMNCM = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_CMNCM', 'CMNCM', '`CMNCM`', '`CMNCM`', 200, -1, FALSE, '`CMNCM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CMNCM->Sortable = TRUE; // Allow sort
		$this->fields['CMNCM'] = &$this->CMNCM;

		// TidNo
		$this->TidNo = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// pFamilyHistory
		$this->pFamilyHistory = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_pFamilyHistory', 'pFamilyHistory', '`pFamilyHistory`', '`pFamilyHistory`', 200, -1, FALSE, '`pFamilyHistory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pFamilyHistory->Sortable = TRUE; // Allow sort
		$this->fields['pFamilyHistory'] = &$this->pFamilyHistory;

		// pTemplateMedications
		$this->pTemplateMedications = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_pTemplateMedications', 'pTemplateMedications', '`pTemplateMedications`', '`pTemplateMedications`', 201, -1, FALSE, '`pTemplateMedications`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->pTemplateMedications->Sortable = TRUE; // Allow sort
		$this->fields['pTemplateMedications'] = &$this->pTemplateMedications;

		// AntiTPO
		$this->AntiTPO = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_AntiTPO', 'AntiTPO', '`AntiTPO`', '`AntiTPO`', 200, -1, FALSE, '`AntiTPO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AntiTPO->Sortable = TRUE; // Allow sort
		$this->fields['AntiTPO'] = &$this->AntiTPO;

		// AntiTG
		$this->AntiTG = new DbField('view_template_couple_vitals', 'view_template_couple_vitals', 'x_AntiTG', 'AntiTG', '`AntiTG`', '`AntiTG`', 200, -1, FALSE, '`AntiTG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AntiTG->Sortable = TRUE; // Allow sort
		$this->fields['AntiTG'] = &$this->AntiTG;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_template_couple_vitals`";
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

			// Get insert id if necessary
			$this->hid->setDbValue($conn->insert_ID());
			$rs['hid'] = $this->hid->DbValue;
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
			if (array_key_exists('hid', $rs))
				AddFilter($where, QuotedName('hid', $this->Dbid) . '=' . QuotedValue($rs['hid'], $this->hid->DataType, $this->Dbid));
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
		$this->Male->DbValue = $row['Male'];
		$this->Female->DbValue = $row['Female'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->malepropic->DbValue = $row['malepropic'];
		$this->femalepropic->DbValue = $row['femalepropic'];
		$this->HusbandEducation->DbValue = $row['HusbandEducation'];
		$this->WifeEducation->DbValue = $row['WifeEducation'];
		$this->HusbandWorkHours->DbValue = $row['HusbandWorkHours'];
		$this->WifeWorkHours->DbValue = $row['WifeWorkHours'];
		$this->PatientLanguage->DbValue = $row['PatientLanguage'];
		$this->ReferedBy->DbValue = $row['ReferedBy'];
		$this->ReferPhNo->DbValue = $row['ReferPhNo'];
		$this->WifeCell->DbValue = $row['WifeCell'];
		$this->HusbandCell->DbValue = $row['HusbandCell'];
		$this->WifeEmail->DbValue = $row['WifeEmail'];
		$this->HusbandEmail->DbValue = $row['HusbandEmail'];
		$this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
		$this->RESULT->DbValue = $row['RESULT'];
		$this->CoupleID->DbValue = $row['CoupleID'];
		$this->HospID->DbValue = $row['HospID'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->DrID->DbValue = $row['DrID'];
		$this->DrDepartment->DbValue = $row['DrDepartment'];
		$this->Doctor->DbValue = $row['Doctor'];
		$this->hid->DbValue = $row['hid'];
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
		$this->TidNo->DbValue = $row['TidNo'];
		$this->pFamilyHistory->DbValue = $row['pFamilyHistory'];
		$this->pTemplateMedications->DbValue = $row['pTemplateMedications'];
		$this->AntiTPO->DbValue = $row['AntiTPO'];
		$this->AntiTG->DbValue = $row['AntiTG'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@ AND `hid` = @hid@";
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
		$val = is_array($row) ? (array_key_exists('hid', $row) ? $row['hid'] : NULL) : $this->hid->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@hid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_template_couple_vitalslist.php";
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
		if ($pageName == "view_template_couple_vitalsview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_template_couple_vitalsedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_template_couple_vitalsadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_template_couple_vitalslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_template_couple_vitalsview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_template_couple_vitalsview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_template_couple_vitalsadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_template_couple_vitalsadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_template_couple_vitalsedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_template_couple_vitalsadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_template_couple_vitalsdelete.php", $this->getUrlParm());
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
		$json .= ",hid:" . JsonEncode($this->hid->CurrentValue, "number");
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
		if ($this->hid->CurrentValue != NULL) {
			$url .= "&hid=" . urlencode($this->hid->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} else {
			if (Param("id") !== NULL)
				$arKey[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("hid") !== NULL)
				$arKey[] = Param("hid");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // id
					continue;
				if (!is_numeric($key[1])) // hid
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
			$this->id->CurrentValue = $key[0];
			$this->hid->CurrentValue = $key[1];
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
		$this->Male->setDbValue($rs->fields('Male'));
		$this->Female->setDbValue($rs->fields('Female'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->malepropic->setDbValue($rs->fields('malepropic'));
		$this->femalepropic->setDbValue($rs->fields('femalepropic'));
		$this->HusbandEducation->setDbValue($rs->fields('HusbandEducation'));
		$this->WifeEducation->setDbValue($rs->fields('WifeEducation'));
		$this->HusbandWorkHours->setDbValue($rs->fields('HusbandWorkHours'));
		$this->WifeWorkHours->setDbValue($rs->fields('WifeWorkHours'));
		$this->PatientLanguage->setDbValue($rs->fields('PatientLanguage'));
		$this->ReferedBy->setDbValue($rs->fields('ReferedBy'));
		$this->ReferPhNo->setDbValue($rs->fields('ReferPhNo'));
		$this->WifeCell->setDbValue($rs->fields('WifeCell'));
		$this->HusbandCell->setDbValue($rs->fields('HusbandCell'));
		$this->WifeEmail->setDbValue($rs->fields('WifeEmail'));
		$this->HusbandEmail->setDbValue($rs->fields('HusbandEmail'));
		$this->ARTCYCLE->setDbValue($rs->fields('ARTCYCLE'));
		$this->RESULT->setDbValue($rs->fields('RESULT'));
		$this->CoupleID->setDbValue($rs->fields('CoupleID'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->DrDepartment->setDbValue($rs->fields('DrDepartment'));
		$this->Doctor->setDbValue($rs->fields('Doctor'));
		$this->hid->setDbValue($rs->fields('hid'));
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
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->pFamilyHistory->setDbValue($rs->fields('pFamilyHistory'));
		$this->pTemplateMedications->setDbValue($rs->fields('pTemplateMedications'));
		$this->AntiTPO->setDbValue($rs->fields('AntiTPO'));
		$this->AntiTG->setDbValue($rs->fields('AntiTG'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Male
		// Female
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// WifeCell
		// HusbandCell
		// WifeEmail
		// HusbandEmail
		// ARTCYCLE
		// RESULT
		// CoupleID
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// DrID
		// DrDepartment
		// Doctor
		// hid
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
		// TidNo
		// pFamilyHistory
		// pTemplateMedications
		// AntiTPO
		// AntiTG
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Male
		$this->Male->ViewValue = $this->Male->CurrentValue;
		$this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
		$this->Male->ViewCustomAttributes = "";

		// Female
		$this->Female->ViewValue = $this->Female->CurrentValue;
		$this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
		$this->Female->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// malepropic
		$this->malepropic->ViewValue = $this->malepropic->CurrentValue;
		$this->malepropic->ViewCustomAttributes = "";

		// femalepropic
		$this->femalepropic->ViewValue = $this->femalepropic->CurrentValue;
		$this->femalepropic->ViewCustomAttributes = "";

		// HusbandEducation
		$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
		$this->HusbandEducation->ViewCustomAttributes = "";

		// WifeEducation
		$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
		$this->WifeEducation->ViewCustomAttributes = "";

		// HusbandWorkHours
		$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
		$this->HusbandWorkHours->ViewCustomAttributes = "";

		// WifeWorkHours
		$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
		$this->WifeWorkHours->ViewCustomAttributes = "";

		// PatientLanguage
		$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
		$this->PatientLanguage->ViewCustomAttributes = "";

		// ReferedBy
		$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
		$this->ReferedBy->ViewCustomAttributes = "";

		// ReferPhNo
		$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->ViewCustomAttributes = "";

		// WifeCell
		$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->ViewCustomAttributes = "";

		// HusbandCell
		$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->ViewCustomAttributes = "";

		// WifeEmail
		$this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
		$this->WifeEmail->ViewCustomAttributes = "";

		// HusbandEmail
		$this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
		$this->HusbandEmail->ViewCustomAttributes = "";

		// ARTCYCLE
		$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
		$this->ARTCYCLE->ViewCustomAttributes = "";

		// RESULT
		$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
		$this->RESULT->ViewCustomAttributes = "";

		// CoupleID
		$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

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

		// DrID
		$this->DrID->ViewValue = $this->DrID->CurrentValue;
		$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
		$this->DrID->ViewCustomAttributes = "";

		// DrDepartment
		$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->ViewCustomAttributes = "";

		// Doctor
		$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
		$this->Doctor->ViewCustomAttributes = "";

		// hid
		$this->hid->ViewValue = $this->hid->CurrentValue;
		$this->hid->ViewCustomAttributes = "";

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
		$this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
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
		$this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
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
		$this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
		$this->MBloodgroup->ViewCustomAttributes = "";

		// FBuild
		$this->FBuild->ViewValue = $this->FBuild->CurrentValue;
		$this->FBuild->ViewCustomAttributes = "";

		// MBuild
		$this->MBuild->ViewValue = $this->MBuild->CurrentValue;
		$this->MBuild->ViewCustomAttributes = "";

		// FSkinColor
		$this->FSkinColor->ViewValue = $this->FSkinColor->CurrentValue;
		$this->FSkinColor->ViewCustomAttributes = "";

		// MSkinColor
		$this->MSkinColor->ViewValue = $this->MSkinColor->CurrentValue;
		$this->MSkinColor->ViewCustomAttributes = "";

		// FEyesColor
		$this->FEyesColor->ViewValue = $this->FEyesColor->CurrentValue;
		$this->FEyesColor->ViewCustomAttributes = "";

		// MEyesColor
		$this->MEyesColor->ViewValue = $this->MEyesColor->CurrentValue;
		$this->MEyesColor->ViewCustomAttributes = "";

		// FHairColor
		$this->FHairColor->ViewValue = $this->FHairColor->CurrentValue;
		$this->FHairColor->ViewCustomAttributes = "";

		// MhairColor
		$this->MhairColor->ViewValue = $this->MhairColor->CurrentValue;
		$this->MhairColor->ViewCustomAttributes = "";

		// FhairTexture
		$this->FhairTexture->ViewValue = $this->FhairTexture->CurrentValue;
		$this->FhairTexture->ViewCustomAttributes = "";

		// MHairTexture
		$this->MHairTexture->ViewValue = $this->MHairTexture->CurrentValue;
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
		$this->FamilyHistory->ViewCustomAttributes = "";

		// PInvestigations
		$this->PInvestigations->ViewValue = $this->PInvestigations->CurrentValue;
		$this->PInvestigations->ViewCustomAttributes = "";

		// Addictions
		$this->Addictions->ViewValue = $this->Addictions->CurrentValue;
		$this->Addictions->ViewCustomAttributes = "";

		// Medications
		$this->Medications->ViewValue = $this->Medications->CurrentValue;
		$this->Medications->ViewCustomAttributes = "";

		// Medical
		$this->Medical->ViewValue = $this->Medical->CurrentValue;
		$this->Medical->ViewCustomAttributes = "";

		// Surgical
		$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
		$this->Surgical->ViewCustomAttributes = "";

		// CoitalHistory
		$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
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

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// pFamilyHistory
		$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
		$this->pFamilyHistory->ViewCustomAttributes = "";

		// pTemplateMedications
		$this->pTemplateMedications->ViewValue = $this->pTemplateMedications->CurrentValue;
		$this->pTemplateMedications->ViewCustomAttributes = "";

		// AntiTPO
		$this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
		$this->AntiTPO->ViewCustomAttributes = "";

		// AntiTG
		$this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
		$this->AntiTG->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Male
		$this->Male->LinkCustomAttributes = "";
		$this->Male->HrefValue = "";
		$this->Male->TooltipValue = "";

		// Female
		$this->Female->LinkCustomAttributes = "";
		$this->Female->HrefValue = "";
		$this->Female->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// createdby
		$this->createdby->LinkCustomAttributes = "";
		$this->createdby->HrefValue = "";
		$this->createdby->TooltipValue = "";

		// createddatetime
		$this->createddatetime->LinkCustomAttributes = "";
		$this->createddatetime->HrefValue = "";
		$this->createddatetime->TooltipValue = "";

		// modifiedby
		$this->modifiedby->LinkCustomAttributes = "";
		$this->modifiedby->HrefValue = "";
		$this->modifiedby->TooltipValue = "";

		// modifieddatetime
		$this->modifieddatetime->LinkCustomAttributes = "";
		$this->modifieddatetime->HrefValue = "";
		$this->modifieddatetime->TooltipValue = "";

		// malepropic
		$this->malepropic->LinkCustomAttributes = "";
		$this->malepropic->HrefValue = "";
		$this->malepropic->TooltipValue = "";

		// femalepropic
		$this->femalepropic->LinkCustomAttributes = "";
		$this->femalepropic->HrefValue = "";
		$this->femalepropic->TooltipValue = "";

		// HusbandEducation
		$this->HusbandEducation->LinkCustomAttributes = "";
		$this->HusbandEducation->HrefValue = "";
		$this->HusbandEducation->TooltipValue = "";

		// WifeEducation
		$this->WifeEducation->LinkCustomAttributes = "";
		$this->WifeEducation->HrefValue = "";
		$this->WifeEducation->TooltipValue = "";

		// HusbandWorkHours
		$this->HusbandWorkHours->LinkCustomAttributes = "";
		$this->HusbandWorkHours->HrefValue = "";
		$this->HusbandWorkHours->TooltipValue = "";

		// WifeWorkHours
		$this->WifeWorkHours->LinkCustomAttributes = "";
		$this->WifeWorkHours->HrefValue = "";
		$this->WifeWorkHours->TooltipValue = "";

		// PatientLanguage
		$this->PatientLanguage->LinkCustomAttributes = "";
		$this->PatientLanguage->HrefValue = "";
		$this->PatientLanguage->TooltipValue = "";

		// ReferedBy
		$this->ReferedBy->LinkCustomAttributes = "";
		$this->ReferedBy->HrefValue = "";
		$this->ReferedBy->TooltipValue = "";

		// ReferPhNo
		$this->ReferPhNo->LinkCustomAttributes = "";
		$this->ReferPhNo->HrefValue = "";
		$this->ReferPhNo->TooltipValue = "";

		// WifeCell
		$this->WifeCell->LinkCustomAttributes = "";
		$this->WifeCell->HrefValue = "";
		$this->WifeCell->TooltipValue = "";

		// HusbandCell
		$this->HusbandCell->LinkCustomAttributes = "";
		$this->HusbandCell->HrefValue = "";
		$this->HusbandCell->TooltipValue = "";

		// WifeEmail
		$this->WifeEmail->LinkCustomAttributes = "";
		$this->WifeEmail->HrefValue = "";
		$this->WifeEmail->TooltipValue = "";

		// HusbandEmail
		$this->HusbandEmail->LinkCustomAttributes = "";
		$this->HusbandEmail->HrefValue = "";
		$this->HusbandEmail->TooltipValue = "";

		// ARTCYCLE
		$this->ARTCYCLE->LinkCustomAttributes = "";
		$this->ARTCYCLE->HrefValue = "";
		$this->ARTCYCLE->TooltipValue = "";

		// RESULT
		$this->RESULT->LinkCustomAttributes = "";
		$this->RESULT->HrefValue = "";
		$this->RESULT->TooltipValue = "";

		// CoupleID
		$this->CoupleID->LinkCustomAttributes = "";
		$this->CoupleID->HrefValue = "";
		$this->CoupleID->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// DrDepartment
		$this->DrDepartment->LinkCustomAttributes = "";
		$this->DrDepartment->HrefValue = "";
		$this->DrDepartment->TooltipValue = "";

		// Doctor
		$this->Doctor->LinkCustomAttributes = "";
		$this->Doctor->HrefValue = "";
		$this->Doctor->TooltipValue = "";

		// hid
		$this->hid->LinkCustomAttributes = "";
		$this->hid->HrefValue = "";
		$this->hid->TooltipValue = "";

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

		// AntiTPO
		$this->AntiTPO->LinkCustomAttributes = "";
		$this->AntiTPO->HrefValue = "";
		$this->AntiTPO->TooltipValue = "";

		// AntiTG
		$this->AntiTG->LinkCustomAttributes = "";
		$this->AntiTG->HrefValue = "";
		$this->AntiTG->TooltipValue = "";

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

		// Male
		$this->Male->EditAttrs["class"] = "form-control";
		$this->Male->EditCustomAttributes = "";
		$this->Male->EditValue = $this->Male->CurrentValue;
		$this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

		// Female
		$this->Female->EditAttrs["class"] = "form-control";
		$this->Female->EditCustomAttributes = "";
		$this->Female->EditValue = $this->Female->CurrentValue;
		$this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
		$this->createdby->EditValue = $this->createdby->CurrentValue;
		$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

		// malepropic
		$this->malepropic->EditAttrs["class"] = "form-control";
		$this->malepropic->EditCustomAttributes = "";
		$this->malepropic->EditValue = $this->malepropic->CurrentValue;
		$this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

		// femalepropic
		$this->femalepropic->EditAttrs["class"] = "form-control";
		$this->femalepropic->EditCustomAttributes = "";
		$this->femalepropic->EditValue = $this->femalepropic->CurrentValue;
		$this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

		// HusbandEducation
		$this->HusbandEducation->EditAttrs["class"] = "form-control";
		$this->HusbandEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
		$this->HusbandEducation->EditValue = $this->HusbandEducation->CurrentValue;
		$this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

		// WifeEducation
		$this->WifeEducation->EditAttrs["class"] = "form-control";
		$this->WifeEducation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
		$this->WifeEducation->EditValue = $this->WifeEducation->CurrentValue;
		$this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

		// HusbandWorkHours
		$this->HusbandWorkHours->EditAttrs["class"] = "form-control";
		$this->HusbandWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
		$this->HusbandWorkHours->EditValue = $this->HusbandWorkHours->CurrentValue;
		$this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

		// WifeWorkHours
		$this->WifeWorkHours->EditAttrs["class"] = "form-control";
		$this->WifeWorkHours->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
		$this->WifeWorkHours->EditValue = $this->WifeWorkHours->CurrentValue;
		$this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

		// PatientLanguage
		$this->PatientLanguage->EditAttrs["class"] = "form-control";
		$this->PatientLanguage->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
		$this->PatientLanguage->EditValue = $this->PatientLanguage->CurrentValue;
		$this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

		// ReferedBy
		$this->ReferedBy->EditAttrs["class"] = "form-control";
		$this->ReferedBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferedBy->CurrentValue = HtmlDecode($this->ReferedBy->CurrentValue);
		$this->ReferedBy->EditValue = $this->ReferedBy->CurrentValue;
		$this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

		// ReferPhNo
		$this->ReferPhNo->EditAttrs["class"] = "form-control";
		$this->ReferPhNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
		$this->ReferPhNo->EditValue = $this->ReferPhNo->CurrentValue;
		$this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

		// WifeCell
		$this->WifeCell->EditAttrs["class"] = "form-control";
		$this->WifeCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
		$this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
		$this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

		// HusbandCell
		$this->HusbandCell->EditAttrs["class"] = "form-control";
		$this->HusbandCell->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
		$this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
		$this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

		// WifeEmail
		$this->WifeEmail->EditAttrs["class"] = "form-control";
		$this->WifeEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
		$this->WifeEmail->EditValue = $this->WifeEmail->CurrentValue;
		$this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

		// HusbandEmail
		$this->HusbandEmail->EditAttrs["class"] = "form-control";
		$this->HusbandEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
		$this->HusbandEmail->EditValue = $this->HusbandEmail->CurrentValue;
		$this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

		// ARTCYCLE
		$this->ARTCYCLE->EditAttrs["class"] = "form-control";
		$this->ARTCYCLE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
		$this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
		$this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

		// RESULT
		$this->RESULT->EditAttrs["class"] = "form-control";
		$this->RESULT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
		$this->RESULT->EditValue = $this->RESULT->CurrentValue;
		$this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

		// CoupleID
		$this->CoupleID->EditAttrs["class"] = "form-control";
		$this->CoupleID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
		$this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";
		$this->DrID->EditValue = $this->DrID->CurrentValue;
		$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

		// DrDepartment
		$this->DrDepartment->EditAttrs["class"] = "form-control";
		$this->DrDepartment->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
		$this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
		$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

		// Doctor
		$this->Doctor->EditAttrs["class"] = "form-control";
		$this->Doctor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
		$this->Doctor->EditValue = $this->Doctor->CurrentValue;
		$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

		// hid
		$this->hid->EditAttrs["class"] = "form-control";
		$this->hid->EditCustomAttributes = "";
		$this->hid->EditValue = $this->hid->CurrentValue;
		$this->hid->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// SEX
		$this->SEX->EditAttrs["class"] = "form-control";
		$this->SEX->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
		$this->SEX->EditValue = $this->SEX->CurrentValue;
		$this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

		// Religion
		$this->Religion->EditAttrs["class"] = "form-control";
		$this->Religion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
		$this->Religion->EditValue = $this->Religion->CurrentValue;
		$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

		// Address
		$this->Address->EditAttrs["class"] = "form-control";
		$this->Address->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
		$this->Address->EditValue = $this->Address->CurrentValue;
		$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		$this->MedicalHistory->EditAttrs["class"] = "form-control";
		$this->MedicalHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MedicalHistory->CurrentValue = HtmlDecode($this->MedicalHistory->CurrentValue);
		$this->MedicalHistory->EditValue = $this->MedicalHistory->CurrentValue;
		$this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

		// SurgicalHistory
		$this->SurgicalHistory->EditAttrs["class"] = "form-control";
		$this->SurgicalHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
		$this->SurgicalHistory->EditValue = $this->SurgicalHistory->CurrentValue;
		$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

		// Generalexaminationpallor
		$this->Generalexaminationpallor->EditAttrs["class"] = "form-control";
		$this->Generalexaminationpallor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Generalexaminationpallor->CurrentValue = HtmlDecode($this->Generalexaminationpallor->CurrentValue);
		$this->Generalexaminationpallor->EditValue = $this->Generalexaminationpallor->CurrentValue;
		$this->Generalexaminationpallor->PlaceHolder = RemoveHtml($this->Generalexaminationpallor->caption());

		// PR
		$this->PR->EditAttrs["class"] = "form-control";
		$this->PR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
		$this->PR->EditValue = $this->PR->CurrentValue;
		$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

		// CVS
		$this->CVS->EditAttrs["class"] = "form-control";
		$this->CVS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
		$this->CVS->EditValue = $this->CVS->CurrentValue;
		$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

		// PA
		$this->PA->EditAttrs["class"] = "form-control";
		$this->PA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
		$this->PA->EditValue = $this->PA->CurrentValue;
		$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
		$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
		$this->PROVISIONALDIAGNOSIS->EditValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

		// Investigations
		$this->Investigations->EditAttrs["class"] = "form-control";
		$this->Investigations->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Investigations->CurrentValue = HtmlDecode($this->Investigations->CurrentValue);
		$this->Investigations->EditValue = $this->Investigations->CurrentValue;
		$this->Investigations->PlaceHolder = RemoveHtml($this->Investigations->caption());

		// Fheight
		$this->Fheight->EditAttrs["class"] = "form-control";
		$this->Fheight->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fheight->CurrentValue = HtmlDecode($this->Fheight->CurrentValue);
		$this->Fheight->EditValue = $this->Fheight->CurrentValue;
		$this->Fheight->PlaceHolder = RemoveHtml($this->Fheight->caption());

		// Fweight
		$this->Fweight->EditAttrs["class"] = "form-control";
		$this->Fweight->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fweight->CurrentValue = HtmlDecode($this->Fweight->CurrentValue);
		$this->Fweight->EditValue = $this->Fweight->CurrentValue;
		$this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

		// FBMI
		$this->FBMI->EditAttrs["class"] = "form-control";
		$this->FBMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FBMI->CurrentValue = HtmlDecode($this->FBMI->CurrentValue);
		$this->FBMI->EditValue = $this->FBMI->CurrentValue;
		$this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

		// FBloodgroup
		$this->FBloodgroup->EditAttrs["class"] = "form-control";
		$this->FBloodgroup->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FBloodgroup->CurrentValue = HtmlDecode($this->FBloodgroup->CurrentValue);
		$this->FBloodgroup->EditValue = $this->FBloodgroup->CurrentValue;
		$this->FBloodgroup->PlaceHolder = RemoveHtml($this->FBloodgroup->caption());

		// Mheight
		$this->Mheight->EditAttrs["class"] = "form-control";
		$this->Mheight->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Mheight->CurrentValue = HtmlDecode($this->Mheight->CurrentValue);
		$this->Mheight->EditValue = $this->Mheight->CurrentValue;
		$this->Mheight->PlaceHolder = RemoveHtml($this->Mheight->caption());

		// Mweight
		$this->Mweight->EditAttrs["class"] = "form-control";
		$this->Mweight->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Mweight->CurrentValue = HtmlDecode($this->Mweight->CurrentValue);
		$this->Mweight->EditValue = $this->Mweight->CurrentValue;
		$this->Mweight->PlaceHolder = RemoveHtml($this->Mweight->caption());

		// MBMI
		$this->MBMI->EditAttrs["class"] = "form-control";
		$this->MBMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MBMI->CurrentValue = HtmlDecode($this->MBMI->CurrentValue);
		$this->MBMI->EditValue = $this->MBMI->CurrentValue;
		$this->MBMI->PlaceHolder = RemoveHtml($this->MBMI->caption());

		// MBloodgroup
		$this->MBloodgroup->EditAttrs["class"] = "form-control";
		$this->MBloodgroup->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MBloodgroup->CurrentValue = HtmlDecode($this->MBloodgroup->CurrentValue);
		$this->MBloodgroup->EditValue = $this->MBloodgroup->CurrentValue;
		$this->MBloodgroup->PlaceHolder = RemoveHtml($this->MBloodgroup->caption());

		// FBuild
		$this->FBuild->EditAttrs["class"] = "form-control";
		$this->FBuild->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FBuild->CurrentValue = HtmlDecode($this->FBuild->CurrentValue);
		$this->FBuild->EditValue = $this->FBuild->CurrentValue;
		$this->FBuild->PlaceHolder = RemoveHtml($this->FBuild->caption());

		// MBuild
		$this->MBuild->EditAttrs["class"] = "form-control";
		$this->MBuild->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MBuild->CurrentValue = HtmlDecode($this->MBuild->CurrentValue);
		$this->MBuild->EditValue = $this->MBuild->CurrentValue;
		$this->MBuild->PlaceHolder = RemoveHtml($this->MBuild->caption());

		// FSkinColor
		$this->FSkinColor->EditAttrs["class"] = "form-control";
		$this->FSkinColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FSkinColor->CurrentValue = HtmlDecode($this->FSkinColor->CurrentValue);
		$this->FSkinColor->EditValue = $this->FSkinColor->CurrentValue;
		$this->FSkinColor->PlaceHolder = RemoveHtml($this->FSkinColor->caption());

		// MSkinColor
		$this->MSkinColor->EditAttrs["class"] = "form-control";
		$this->MSkinColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MSkinColor->CurrentValue = HtmlDecode($this->MSkinColor->CurrentValue);
		$this->MSkinColor->EditValue = $this->MSkinColor->CurrentValue;
		$this->MSkinColor->PlaceHolder = RemoveHtml($this->MSkinColor->caption());

		// FEyesColor
		$this->FEyesColor->EditAttrs["class"] = "form-control";
		$this->FEyesColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FEyesColor->CurrentValue = HtmlDecode($this->FEyesColor->CurrentValue);
		$this->FEyesColor->EditValue = $this->FEyesColor->CurrentValue;
		$this->FEyesColor->PlaceHolder = RemoveHtml($this->FEyesColor->caption());

		// MEyesColor
		$this->MEyesColor->EditAttrs["class"] = "form-control";
		$this->MEyesColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MEyesColor->CurrentValue = HtmlDecode($this->MEyesColor->CurrentValue);
		$this->MEyesColor->EditValue = $this->MEyesColor->CurrentValue;
		$this->MEyesColor->PlaceHolder = RemoveHtml($this->MEyesColor->caption());

		// FHairColor
		$this->FHairColor->EditAttrs["class"] = "form-control";
		$this->FHairColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FHairColor->CurrentValue = HtmlDecode($this->FHairColor->CurrentValue);
		$this->FHairColor->EditValue = $this->FHairColor->CurrentValue;
		$this->FHairColor->PlaceHolder = RemoveHtml($this->FHairColor->caption());

		// MhairColor
		$this->MhairColor->EditAttrs["class"] = "form-control";
		$this->MhairColor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MhairColor->CurrentValue = HtmlDecode($this->MhairColor->CurrentValue);
		$this->MhairColor->EditValue = $this->MhairColor->CurrentValue;
		$this->MhairColor->PlaceHolder = RemoveHtml($this->MhairColor->caption());

		// FhairTexture
		$this->FhairTexture->EditAttrs["class"] = "form-control";
		$this->FhairTexture->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FhairTexture->CurrentValue = HtmlDecode($this->FhairTexture->CurrentValue);
		$this->FhairTexture->EditValue = $this->FhairTexture->CurrentValue;
		$this->FhairTexture->PlaceHolder = RemoveHtml($this->FhairTexture->caption());

		// MHairTexture
		$this->MHairTexture->EditAttrs["class"] = "form-control";
		$this->MHairTexture->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MHairTexture->CurrentValue = HtmlDecode($this->MHairTexture->CurrentValue);
		$this->MHairTexture->EditValue = $this->MHairTexture->CurrentValue;
		$this->MHairTexture->PlaceHolder = RemoveHtml($this->MHairTexture->caption());

		// Fothers
		$this->Fothers->EditAttrs["class"] = "form-control";
		$this->Fothers->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Fothers->CurrentValue = HtmlDecode($this->Fothers->CurrentValue);
		$this->Fothers->EditValue = $this->Fothers->CurrentValue;
		$this->Fothers->PlaceHolder = RemoveHtml($this->Fothers->caption());

		// Mothers
		$this->Mothers->EditAttrs["class"] = "form-control";
		$this->Mothers->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Mothers->CurrentValue = HtmlDecode($this->Mothers->CurrentValue);
		$this->Mothers->EditValue = $this->Mothers->CurrentValue;
		$this->Mothers->PlaceHolder = RemoveHtml($this->Mothers->caption());

		// PGE
		$this->PGE->EditAttrs["class"] = "form-control";
		$this->PGE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PGE->CurrentValue = HtmlDecode($this->PGE->CurrentValue);
		$this->PGE->EditValue = $this->PGE->CurrentValue;
		$this->PGE->PlaceHolder = RemoveHtml($this->PGE->caption());

		// PPR
		$this->PPR->EditAttrs["class"] = "form-control";
		$this->PPR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PPR->CurrentValue = HtmlDecode($this->PPR->CurrentValue);
		$this->PPR->EditValue = $this->PPR->CurrentValue;
		$this->PPR->PlaceHolder = RemoveHtml($this->PPR->caption());

		// PBP
		$this->PBP->EditAttrs["class"] = "form-control";
		$this->PBP->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PBP->CurrentValue = HtmlDecode($this->PBP->CurrentValue);
		$this->PBP->EditValue = $this->PBP->CurrentValue;
		$this->PBP->PlaceHolder = RemoveHtml($this->PBP->caption());

		// Breast
		$this->Breast->EditAttrs["class"] = "form-control";
		$this->Breast->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Breast->CurrentValue = HtmlDecode($this->Breast->CurrentValue);
		$this->Breast->EditValue = $this->Breast->CurrentValue;
		$this->Breast->PlaceHolder = RemoveHtml($this->Breast->caption());

		// PPA
		$this->PPA->EditAttrs["class"] = "form-control";
		$this->PPA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PPA->CurrentValue = HtmlDecode($this->PPA->CurrentValue);
		$this->PPA->EditValue = $this->PPA->CurrentValue;
		$this->PPA->PlaceHolder = RemoveHtml($this->PPA->caption());

		// PPSV
		$this->PPSV->EditAttrs["class"] = "form-control";
		$this->PPSV->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PPSV->CurrentValue = HtmlDecode($this->PPSV->CurrentValue);
		$this->PPSV->EditValue = $this->PPSV->CurrentValue;
		$this->PPSV->PlaceHolder = RemoveHtml($this->PPSV->caption());

		// PPAPSMEAR
		$this->PPAPSMEAR->EditAttrs["class"] = "form-control";
		$this->PPAPSMEAR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PPAPSMEAR->CurrentValue = HtmlDecode($this->PPAPSMEAR->CurrentValue);
		$this->PPAPSMEAR->EditValue = $this->PPAPSMEAR->CurrentValue;
		$this->PPAPSMEAR->PlaceHolder = RemoveHtml($this->PPAPSMEAR->caption());

		// PTHYROID
		$this->PTHYROID->EditAttrs["class"] = "form-control";
		$this->PTHYROID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PTHYROID->CurrentValue = HtmlDecode($this->PTHYROID->CurrentValue);
		$this->PTHYROID->EditValue = $this->PTHYROID->CurrentValue;
		$this->PTHYROID->PlaceHolder = RemoveHtml($this->PTHYROID->caption());

		// MTHYROID
		$this->MTHYROID->EditAttrs["class"] = "form-control";
		$this->MTHYROID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MTHYROID->CurrentValue = HtmlDecode($this->MTHYROID->CurrentValue);
		$this->MTHYROID->EditValue = $this->MTHYROID->CurrentValue;
		$this->MTHYROID->PlaceHolder = RemoveHtml($this->MTHYROID->caption());

		// SecSexCharacters
		$this->SecSexCharacters->EditAttrs["class"] = "form-control";
		$this->SecSexCharacters->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SecSexCharacters->CurrentValue = HtmlDecode($this->SecSexCharacters->CurrentValue);
		$this->SecSexCharacters->EditValue = $this->SecSexCharacters->CurrentValue;
		$this->SecSexCharacters->PlaceHolder = RemoveHtml($this->SecSexCharacters->caption());

		// PenisUM
		$this->PenisUM->EditAttrs["class"] = "form-control";
		$this->PenisUM->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PenisUM->CurrentValue = HtmlDecode($this->PenisUM->CurrentValue);
		$this->PenisUM->EditValue = $this->PenisUM->CurrentValue;
		$this->PenisUM->PlaceHolder = RemoveHtml($this->PenisUM->caption());

		// VAS
		$this->VAS->EditAttrs["class"] = "form-control";
		$this->VAS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->VAS->CurrentValue = HtmlDecode($this->VAS->CurrentValue);
		$this->VAS->EditValue = $this->VAS->CurrentValue;
		$this->VAS->PlaceHolder = RemoveHtml($this->VAS->caption());

		// EPIDIDYMIS
		$this->EPIDIDYMIS->EditAttrs["class"] = "form-control";
		$this->EPIDIDYMIS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->EPIDIDYMIS->CurrentValue = HtmlDecode($this->EPIDIDYMIS->CurrentValue);
		$this->EPIDIDYMIS->EditValue = $this->EPIDIDYMIS->CurrentValue;
		$this->EPIDIDYMIS->PlaceHolder = RemoveHtml($this->EPIDIDYMIS->caption());

		// Varicocele
		$this->Varicocele->EditAttrs["class"] = "form-control";
		$this->Varicocele->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		if (REMOVE_XSS)
			$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
		$this->FamilyHistory->EditValue = $this->FamilyHistory->CurrentValue;
		$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

		// PInvestigations
		$this->PInvestigations->EditAttrs["class"] = "form-control";
		$this->PInvestigations->EditCustomAttributes = "";
		$this->PInvestigations->EditValue = $this->PInvestigations->CurrentValue;
		$this->PInvestigations->PlaceHolder = RemoveHtml($this->PInvestigations->caption());

		// Addictions
		$this->Addictions->EditAttrs["class"] = "form-control";
		$this->Addictions->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Addictions->CurrentValue = HtmlDecode($this->Addictions->CurrentValue);
		$this->Addictions->EditValue = $this->Addictions->CurrentValue;
		$this->Addictions->PlaceHolder = RemoveHtml($this->Addictions->caption());

		// Medications
		$this->Medications->EditAttrs["class"] = "form-control";
		$this->Medications->EditCustomAttributes = "";
		$this->Medications->EditValue = $this->Medications->CurrentValue;
		$this->Medications->PlaceHolder = RemoveHtml($this->Medications->caption());

		// Medical
		$this->Medical->EditAttrs["class"] = "form-control";
		$this->Medical->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Medical->CurrentValue = HtmlDecode($this->Medical->CurrentValue);
		$this->Medical->EditValue = $this->Medical->CurrentValue;
		$this->Medical->PlaceHolder = RemoveHtml($this->Medical->caption());

		// Surgical
		$this->Surgical->EditAttrs["class"] = "form-control";
		$this->Surgical->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Surgical->CurrentValue = HtmlDecode($this->Surgical->CurrentValue);
		$this->Surgical->EditValue = $this->Surgical->CurrentValue;
		$this->Surgical->PlaceHolder = RemoveHtml($this->Surgical->caption());

		// CoitalHistory
		$this->CoitalHistory->EditAttrs["class"] = "form-control";
		$this->CoitalHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		if (REMOVE_XSS)
			$this->MariedFor->CurrentValue = HtmlDecode($this->MariedFor->CurrentValue);
		$this->MariedFor->EditValue = $this->MariedFor->CurrentValue;
		$this->MariedFor->PlaceHolder = RemoveHtml($this->MariedFor->caption());

		// CMNCM
		$this->CMNCM->EditAttrs["class"] = "form-control";
		$this->CMNCM->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CMNCM->CurrentValue = HtmlDecode($this->CMNCM->CurrentValue);
		$this->CMNCM->EditValue = $this->CMNCM->CurrentValue;
		$this->CMNCM->PlaceHolder = RemoveHtml($this->CMNCM->caption());

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

		// pFamilyHistory
		$this->pFamilyHistory->EditAttrs["class"] = "form-control";
		$this->pFamilyHistory->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->pFamilyHistory->CurrentValue = HtmlDecode($this->pFamilyHistory->CurrentValue);
		$this->pFamilyHistory->EditValue = $this->pFamilyHistory->CurrentValue;
		$this->pFamilyHistory->PlaceHolder = RemoveHtml($this->pFamilyHistory->caption());

		// pTemplateMedications
		$this->pTemplateMedications->EditAttrs["class"] = "form-control";
		$this->pTemplateMedications->EditCustomAttributes = "";
		$this->pTemplateMedications->EditValue = $this->pTemplateMedications->CurrentValue;
		$this->pTemplateMedications->PlaceHolder = RemoveHtml($this->pTemplateMedications->caption());

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
					$doc->exportCaption($this->Male);
					$doc->exportCaption($this->Female);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->malepropic);
					$doc->exportCaption($this->femalepropic);
					$doc->exportCaption($this->HusbandEducation);
					$doc->exportCaption($this->WifeEducation);
					$doc->exportCaption($this->HusbandWorkHours);
					$doc->exportCaption($this->WifeWorkHours);
					$doc->exportCaption($this->PatientLanguage);
					$doc->exportCaption($this->ReferedBy);
					$doc->exportCaption($this->ReferPhNo);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->WifeEmail);
					$doc->exportCaption($this->HusbandEmail);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->hid);
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
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->pFamilyHistory);
					$doc->exportCaption($this->pTemplateMedications);
					$doc->exportCaption($this->AntiTPO);
					$doc->exportCaption($this->AntiTG);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Male);
					$doc->exportCaption($this->Female);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->HusbandEducation);
					$doc->exportCaption($this->WifeEducation);
					$doc->exportCaption($this->HusbandWorkHours);
					$doc->exportCaption($this->WifeWorkHours);
					$doc->exportCaption($this->PatientLanguage);
					$doc->exportCaption($this->ReferedBy);
					$doc->exportCaption($this->ReferPhNo);
					$doc->exportCaption($this->WifeCell);
					$doc->exportCaption($this->HusbandCell);
					$doc->exportCaption($this->WifeEmail);
					$doc->exportCaption($this->HusbandEmail);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrDepartment);
					$doc->exportCaption($this->Doctor);
					$doc->exportCaption($this->hid);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->SEX);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Address);
					$doc->exportCaption($this->IdentificationMark);
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
					$doc->exportCaption($this->AntiTPO);
					$doc->exportCaption($this->AntiTG);
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
						$doc->exportField($this->Male);
						$doc->exportField($this->Female);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->malepropic);
						$doc->exportField($this->femalepropic);
						$doc->exportField($this->HusbandEducation);
						$doc->exportField($this->WifeEducation);
						$doc->exportField($this->HusbandWorkHours);
						$doc->exportField($this->WifeWorkHours);
						$doc->exportField($this->PatientLanguage);
						$doc->exportField($this->ReferedBy);
						$doc->exportField($this->ReferPhNo);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->WifeEmail);
						$doc->exportField($this->HusbandEmail);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->hid);
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
						$doc->exportField($this->TidNo);
						$doc->exportField($this->pFamilyHistory);
						$doc->exportField($this->pTemplateMedications);
						$doc->exportField($this->AntiTPO);
						$doc->exportField($this->AntiTG);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Male);
						$doc->exportField($this->Female);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->HusbandEducation);
						$doc->exportField($this->WifeEducation);
						$doc->exportField($this->HusbandWorkHours);
						$doc->exportField($this->WifeWorkHours);
						$doc->exportField($this->PatientLanguage);
						$doc->exportField($this->ReferedBy);
						$doc->exportField($this->ReferPhNo);
						$doc->exportField($this->WifeCell);
						$doc->exportField($this->HusbandCell);
						$doc->exportField($this->WifeEmail);
						$doc->exportField($this->HusbandEmail);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->HospID);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrDepartment);
						$doc->exportField($this->Doctor);
						$doc->exportField($this->hid);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->SEX);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Address);
						$doc->exportField($this->IdentificationMark);
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
						$doc->exportField($this->AntiTPO);
						$doc->exportField($this->AntiTG);
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