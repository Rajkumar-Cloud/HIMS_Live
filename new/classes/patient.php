<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient
 */
class patient extends DbTable
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
	public $PatientID;
	public $title;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $gender;
	public $dob;
	public $Age;
	public $blood_group;
	public $mobile_no;
	public $description;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $profilePic;
	public $IdentificationMark;
	public $Religion;
	public $Nationality;
	public $ReferedByDr;
	public $ReferClinicname;
	public $ReferCity;
	public $ReferMobileNo;
	public $ReferA4TreatingConsultant;
	public $PurposreReferredfor;
	public $spouse_title;
	public $spouse_first_name;
	public $spouse_middle_name;
	public $spouse_last_name;
	public $spouse_gender;
	public $spouse_dob;
	public $spouse_Age;
	public $spouse_blood_group;
	public $spouse_mobile_no;
	public $Maritalstatus;
	public $Business;
	public $Patient_Language;
	public $Passport;
	public $VisaNo;
	public $ValidityOfVisa;
	public $WhereDidYouHear;
	public $HospID;
	public $street;
	public $town;
	public $province;
	public $country;
	public $postal_code;
	public $PEmail;
	public $PEmergencyContact;
	public $occupation;
	public $spouse_occupation;
	public $WhatsApp;
	public $CouppleID;
	public $MaleID;
	public $FemaleID;
	public $GroupID;
	public $Relationship;
	public $AppointmentSearch;
	public $FacebookID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient';
		$this->TableName = 'patient';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient`";
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
		$this->id = new DbField('patient', 'patient', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatientID
		$this->PatientID = new DbField('patient', 'patient', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->IsPrimaryKey = TRUE; // Primary key field
		$this->PatientID->Nullable = FALSE; // NOT NULL field
		$this->PatientID->Required = TRUE; // Required field
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// title
		$this->title = new DbField('patient', 'patient', 'x_title', 'title', '`title`', '`title`', 3, 11, -1, FALSE, '`title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->title->Required = TRUE; // Required field
		$this->title->Sortable = TRUE; // Allow sort
		$this->title->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->title->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->title->Lookup = new Lookup('title', 'sys_tittle', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['title'] = &$this->title;

		// first_name
		$this->first_name = new DbField('patient', 'patient', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 50, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Required = TRUE; // Required field
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new DbField('patient', 'patient', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, 100, -1, FALSE, '`middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new DbField('patient', 'patient', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 50, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new DbField('patient', 'patient', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->gender->Lookup = new Lookup('gender', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['gender'] = &$this->gender;

		// dob
		$this->dob = new DbField('patient', 'patient', 'x_dob', 'dob', '`dob`', CastDateFieldForLike("`dob`", 7, "DB"), 133, 10, 7, FALSE, '`dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dob->Required = TRUE; // Required field
		$this->dob->Sortable = TRUE; // Allow sort
		$this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['dob'] = &$this->dob;

		// Age
		$this->Age = new DbField('patient', 'patient', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = FALSE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// blood_group
		$this->blood_group = new DbField('patient', 'patient', 'x_blood_group', 'blood_group', '`blood_group`', '`blood_group`', 200, 45, -1, FALSE, '`blood_group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->blood_group->Sortable = TRUE; // Allow sort
		$this->blood_group->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->blood_group->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->blood_group->Lookup = new Lookup('blood_group', 'mas_bloodgroup', FALSE, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
		$this->blood_group->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['blood_group'] = &$this->blood_group;

		// mobile_no
		$this->mobile_no = new DbField('patient', 'patient', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, 45, -1, FALSE, '`mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Required = TRUE; // Required field
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['mobile_no'] = &$this->mobile_no;

		// description
		$this->description = new DbField('patient', 'patient', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// status
		$this->status = new DbField('patient', 'patient', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient', 'patient', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient', 'patient', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient', 'patient', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient', 'patient', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// profilePic
		$this->profilePic = new DbField('patient', 'patient', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 200, 100, -1, TRUE, '`profilePic`', FALSE, FALSE, FALSE, 'IMAGE', 'FILE');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->profilePic->ImageResize = TRUE;
		$this->fields['profilePic'] = &$this->profilePic;

		// IdentificationMark
		$this->IdentificationMark = new DbField('patient', 'patient', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Required = TRUE; // Required field
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// Religion
		$this->Religion = new DbField('patient', 'patient', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, 45, -1, FALSE, '`Religion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->fields['Religion'] = &$this->Religion;

		// Nationality
		$this->Nationality = new DbField('patient', 'patient', 'x_Nationality', 'Nationality', '`Nationality`', '`Nationality`', 200, 45, -1, FALSE, '`Nationality`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nationality->Required = TRUE; // Required field
		$this->Nationality->Sortable = TRUE; // Allow sort
		$this->fields['Nationality'] = &$this->Nationality;

		// ReferedByDr
		$this->ReferedByDr = new DbField('patient', 'patient', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, 45, -1, FALSE, '`EV__ReferedByDr`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferedByDr->Required = TRUE; // Required field
		$this->ReferedByDr->Sortable = TRUE; // Allow sort
		$this->ReferedByDr->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferedByDr->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ReferedByDr->Lookup = new Lookup('ReferedByDr', 'mas_reference_type', FALSE, 'reference', ["reference","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ReferedByDr'] = &$this->ReferedByDr;

		// ReferClinicname
		$this->ReferClinicname = new DbField('patient', 'patient', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, 45, -1, FALSE, '`ReferClinicname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferClinicname->Sortable = TRUE; // Allow sort
		$this->fields['ReferClinicname'] = &$this->ReferClinicname;

		// ReferCity
		$this->ReferCity = new DbField('patient', 'patient', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, 45, -1, FALSE, '`ReferCity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferCity->Sortable = TRUE; // Allow sort
		$this->fields['ReferCity'] = &$this->ReferCity;

		// ReferMobileNo
		$this->ReferMobileNo = new DbField('patient', 'patient', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, 45, -1, FALSE, '`ReferMobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferMobileNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferMobileNo'] = &$this->ReferMobileNo;

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant = new DbField('patient', 'patient', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, 45, -1, FALSE, '`EV__ReferA4TreatingConsultant`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferA4TreatingConsultant->Required = TRUE; // Required field
		$this->ReferA4TreatingConsultant->Sortable = TRUE; // Allow sort
		$this->ReferA4TreatingConsultant->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferA4TreatingConsultant->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ReferA4TreatingConsultant->Lookup = new Lookup('ReferA4TreatingConsultant', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

		// PurposreReferredfor
		$this->PurposreReferredfor = new DbField('patient', 'patient', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, 45, -1, FALSE, '`PurposreReferredfor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurposreReferredfor->Required = TRUE; // Required field
		$this->PurposreReferredfor->Sortable = TRUE; // Allow sort
		$this->fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

		// spouse_title
		$this->spouse_title = new DbField('patient', 'patient', 'x_spouse_title', 'spouse_title', '`spouse_title`', '`spouse_title`', 200, 45, -1, FALSE, '`spouse_title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->spouse_title->Sortable = TRUE; // Allow sort
		$this->spouse_title->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->spouse_title->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->spouse_title->Lookup = new Lookup('spouse_title', 'sys_tittle', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['spouse_title'] = &$this->spouse_title;

		// spouse_first_name
		$this->spouse_first_name = new DbField('patient', 'patient', 'x_spouse_first_name', 'spouse_first_name', '`spouse_first_name`', '`spouse_first_name`', 200, 45, -1, FALSE, '`spouse_first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_first_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_first_name'] = &$this->spouse_first_name;

		// spouse_middle_name
		$this->spouse_middle_name = new DbField('patient', 'patient', 'x_spouse_middle_name', 'spouse_middle_name', '`spouse_middle_name`', '`spouse_middle_name`', 200, 45, -1, FALSE, '`spouse_middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_middle_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_middle_name'] = &$this->spouse_middle_name;

		// spouse_last_name
		$this->spouse_last_name = new DbField('patient', 'patient', 'x_spouse_last_name', 'spouse_last_name', '`spouse_last_name`', '`spouse_last_name`', 200, 45, -1, FALSE, '`spouse_last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_last_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_last_name'] = &$this->spouse_last_name;

		// spouse_gender
		$this->spouse_gender = new DbField('patient', 'patient', 'x_spouse_gender', 'spouse_gender', '`spouse_gender`', '`spouse_gender`', 200, 45, -1, FALSE, '`spouse_gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->spouse_gender->Sortable = TRUE; // Allow sort
		$this->spouse_gender->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->spouse_gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->spouse_gender->Lookup = new Lookup('spouse_gender', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['spouse_gender'] = &$this->spouse_gender;

		// spouse_dob
		$this->spouse_dob = new DbField('patient', 'patient', 'x_spouse_dob', 'spouse_dob', '`spouse_dob`', CastDateFieldForLike("`spouse_dob`", 7, "DB"), 133, 10, 7, FALSE, '`spouse_dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_dob->Sortable = TRUE; // Allow sort
		$this->fields['spouse_dob'] = &$this->spouse_dob;

		// spouse_Age
		$this->spouse_Age = new DbField('patient', 'patient', 'x_spouse_Age', 'spouse_Age', '`spouse_Age`', '`spouse_Age`', 200, 45, -1, FALSE, '`spouse_Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_Age->Sortable = TRUE; // Allow sort
		$this->fields['spouse_Age'] = &$this->spouse_Age;

		// spouse_blood_group
		$this->spouse_blood_group = new DbField('patient', 'patient', 'x_spouse_blood_group', 'spouse_blood_group', '`spouse_blood_group`', '`spouse_blood_group`', 200, 45, -1, FALSE, '`spouse_blood_group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->spouse_blood_group->Sortable = TRUE; // Allow sort
		$this->spouse_blood_group->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->spouse_blood_group->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->spouse_blood_group->Lookup = new Lookup('spouse_blood_group', 'mas_bloodgroup', FALSE, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
		$this->fields['spouse_blood_group'] = &$this->spouse_blood_group;

		// spouse_mobile_no
		$this->spouse_mobile_no = new DbField('patient', 'patient', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', '`spouse_mobile_no`', 200, 45, -1, FALSE, '`spouse_mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

		// Maritalstatus
		$this->Maritalstatus = new DbField('patient', 'patient', 'x_Maritalstatus', 'Maritalstatus', '`Maritalstatus`', '`Maritalstatus`', 200, 45, -1, FALSE, '`Maritalstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Maritalstatus->Required = TRUE; // Required field
		$this->Maritalstatus->Sortable = TRUE; // Allow sort
		$this->Maritalstatus->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Maritalstatus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Maritalstatus->Lookup = new Lookup('Maritalstatus', 'mas_marital_status', FALSE, 'MaritalStatus', ["MaritalStatus","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Maritalstatus'] = &$this->Maritalstatus;

		// Business
		$this->Business = new DbField('patient', 'patient', 'x_Business', 'Business', '`Business`', '`Business`', 200, 45, -1, FALSE, '`Business`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Business->Sortable = TRUE; // Allow sort
		$this->Business->Lookup = new Lookup('Business', 'mas_job', FALSE, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Business'] = &$this->Business;

		// Patient_Language
		$this->Patient_Language = new DbField('patient', 'patient', 'x_Patient_Language', 'Patient_Language', '`Patient_Language`', '`Patient_Language`', 200, 45, -1, FALSE, '`Patient_Language`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Patient_Language->Sortable = TRUE; // Allow sort
		$this->Patient_Language->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Patient_Language->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Patient_Language->Lookup = new Lookup('Patient_Language', 'mas_language', FALSE, 'Language', ["Language","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Patient_Language'] = &$this->Patient_Language;

		// Passport
		$this->Passport = new DbField('patient', 'patient', 'x_Passport', 'Passport', '`Passport`', '`Passport`', 200, 45, -1, FALSE, '`Passport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Passport->Sortable = TRUE; // Allow sort
		$this->fields['Passport'] = &$this->Passport;

		// VisaNo
		$this->VisaNo = new DbField('patient', 'patient', 'x_VisaNo', 'VisaNo', '`VisaNo`', '`VisaNo`', 200, 45, -1, FALSE, '`VisaNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VisaNo->Sortable = TRUE; // Allow sort
		$this->fields['VisaNo'] = &$this->VisaNo;

		// ValidityOfVisa
		$this->ValidityOfVisa = new DbField('patient', 'patient', 'x_ValidityOfVisa', 'ValidityOfVisa', '`ValidityOfVisa`', '`ValidityOfVisa`', 200, 45, -1, FALSE, '`ValidityOfVisa`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ValidityOfVisa->Sortable = TRUE; // Allow sort
		$this->fields['ValidityOfVisa'] = &$this->ValidityOfVisa;

		// WhereDidYouHear
		$this->WhereDidYouHear = new DbField('patient', 'patient', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, 45, -1, FALSE, '`WhereDidYouHear`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->WhereDidYouHear->Required = TRUE; // Required field
		$this->WhereDidYouHear->Sortable = TRUE; // Allow sort
		$this->WhereDidYouHear->Lookup = new Lookup('WhereDidYouHear', 'mas_where_didyou_hear', FALSE, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
		$this->fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

		// HospID
		$this->HospID = new DbField('patient', 'patient', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// street
		$this->street = new DbField('patient', 'patient', 'x_street', 'street', '`street`', '`street`', 200, 100, -1, FALSE, '`street`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->street->Sortable = TRUE; // Allow sort
		$this->fields['street'] = &$this->street;

		// town
		$this->town = new DbField('patient', 'patient', 'x_town', 'town', '`town`', '`town`', 200, 50, -1, FALSE, '`town`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->town->Required = TRUE; // Required field
		$this->town->Sortable = TRUE; // Allow sort
		$this->fields['town'] = &$this->town;

		// province
		$this->province = new DbField('patient', 'patient', 'x_province', 'province', '`province`', '`province`', 200, 50, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Required = TRUE; // Required field
		$this->province->Sortable = TRUE; // Allow sort
		$this->fields['province'] = &$this->province;

		// country
		$this->country = new DbField('patient', 'patient', 'x_country', 'country', '`country`', '`country`', 200, 50, -1, FALSE, '`country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Required = TRUE; // Required field
		$this->country->Sortable = TRUE; // Allow sort
		$this->fields['country'] = &$this->country;

		// postal_code
		$this->postal_code = new DbField('patient', 'patient', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 50, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Required = TRUE; // Required field
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// PEmail
		$this->PEmail = new DbField('patient', 'patient', 'x_PEmail', 'PEmail', '`PEmail`', '`PEmail`', 200, 50, -1, FALSE, '`PEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmail->Sortable = TRUE; // Allow sort
		$this->fields['PEmail'] = &$this->PEmail;

		// PEmergencyContact
		$this->PEmergencyContact = new DbField('patient', 'patient', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', '`PEmergencyContact`', 200, 50, -1, FALSE, '`PEmergencyContact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmergencyContact->Required = TRUE; // Required field
		$this->PEmergencyContact->Sortable = TRUE; // Allow sort
		$this->fields['PEmergencyContact'] = &$this->PEmergencyContact;

		// occupation
		$this->occupation = new DbField('patient', 'patient', 'x_occupation', 'occupation', '`occupation`', '`occupation`', 200, 45, -1, FALSE, '`occupation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->occupation->Sortable = TRUE; // Allow sort
		$this->fields['occupation'] = &$this->occupation;

		// spouse_occupation
		$this->spouse_occupation = new DbField('patient', 'patient', 'x_spouse_occupation', 'spouse_occupation', '`spouse_occupation`', '`spouse_occupation`', 200, 45, -1, FALSE, '`spouse_occupation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_occupation->Sortable = TRUE; // Allow sort
		$this->fields['spouse_occupation'] = &$this->spouse_occupation;

		// WhatsApp
		$this->WhatsApp = new DbField('patient', 'patient', 'x_WhatsApp', 'WhatsApp', '`WhatsApp`', '`WhatsApp`', 200, 45, -1, FALSE, '`WhatsApp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WhatsApp->Sortable = TRUE; // Allow sort
		$this->fields['WhatsApp'] = &$this->WhatsApp;

		// CouppleID
		$this->CouppleID = new DbField('patient', 'patient', 'x_CouppleID', 'CouppleID', '`CouppleID`', '`CouppleID`', 3, 11, -1, FALSE, '`CouppleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CouppleID->Sortable = TRUE; // Allow sort
		$this->CouppleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CouppleID'] = &$this->CouppleID;

		// MaleID
		$this->MaleID = new DbField('patient', 'patient', 'x_MaleID', 'MaleID', '`MaleID`', '`MaleID`', 3, 11, -1, FALSE, '`MaleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaleID->Sortable = TRUE; // Allow sort
		$this->MaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['MaleID'] = &$this->MaleID;

		// FemaleID
		$this->FemaleID = new DbField('patient', 'patient', 'x_FemaleID', 'FemaleID', '`FemaleID`', '`FemaleID`', 3, 11, -1, FALSE, '`FemaleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FemaleID->Sortable = TRUE; // Allow sort
		$this->FemaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['FemaleID'] = &$this->FemaleID;

		// GroupID
		$this->GroupID = new DbField('patient', 'patient', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, 11, -1, FALSE, '`GroupID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GroupID->Sortable = TRUE; // Allow sort
		$this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GroupID'] = &$this->GroupID;

		// Relationship
		$this->Relationship = new DbField('patient', 'patient', 'x_Relationship', 'Relationship', '`Relationship`', '`Relationship`', 200, 45, -1, FALSE, '`Relationship`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Relationship->Sortable = TRUE; // Allow sort
		$this->fields['Relationship'] = &$this->Relationship;

		// AppointmentSearch
		$this->AppointmentSearch = new DbField('patient', 'patient', 'x_AppointmentSearch', 'AppointmentSearch', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AppointmentSearch->IsCustom = TRUE; // Custom field
		$this->AppointmentSearch->Sortable = TRUE; // Allow sort
		$this->AppointmentSearch->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AppointmentSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->AppointmentSearch->Lookup = new Lookup('AppointmentSearch', 'patient_app', FALSE, 'id', ["first_name","mobile_no","PatientID",""], [], [], [], [], ["title","first_name","gender","dob","Age","mobile_no"], ["x_title","x_first_name","x_gender","x_dob","x_Age","x_mobile_no"], '', '');
		$this->fields['AppointmentSearch'] = &$this->AppointmentSearch;

		// FacebookID
		$this->FacebookID = new DbField('patient', 'patient', 'x_FacebookID', 'FacebookID', '`FacebookID`', '`FacebookID`', 200, 45, -1, FALSE, '`FacebookID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FacebookID->Sortable = TRUE; // Allow sort
		$this->fields['FacebookID'] = &$this->FacebookID;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "patient_address") {
			$detailUrl = $GLOBALS["patient_address"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_email") {
			$detailUrl = $GLOBALS["patient_email"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_telephone") {
			$detailUrl = $GLOBALS["patient_telephone"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_emergency_contact") {
			$detailUrl = $GLOBALS["patient_emergency_contact"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_document") {
			$detailUrl = $GLOBALS["patient_document"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "patientlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `AppointmentSearch` FROM " . $this->getSqlFrom();
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
			"SELECT *, '' AS `AppointmentSearch`, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `patient`.`ReferedByDr` LIMIT 1) AS `EV__ReferedByDr`, (SELECT `NAME` FROM `doctors` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`NAME` = `patient`.`ReferA4TreatingConsultant` LIMIT 1) AS `EV__ReferA4TreatingConsultant` FROM `patient`" .
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`id` DESC";
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
		if ($this->ReferedByDr->AdvancedSearch->SearchValue != "" ||
			$this->ReferedByDr->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->ReferedByDr->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->ReferedByDr->VirtualExpression . " "))
			return TRUE;
		if ($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue != "" ||
			$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->ReferA4TreatingConsultant->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->ReferA4TreatingConsultant->VirtualExpression . " "))
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
			if (array_key_exists('PatientID', $rs))
				AddFilter($where, QuotedName('PatientID', $this->Dbid) . '=' . QuotedValue($rs['PatientID'], $this->PatientID->DataType, $this->Dbid));
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
		$this->PatientID->DbValue = $row['PatientID'];
		$this->title->DbValue = $row['title'];
		$this->first_name->DbValue = $row['first_name'];
		$this->middle_name->DbValue = $row['middle_name'];
		$this->last_name->DbValue = $row['last_name'];
		$this->gender->DbValue = $row['gender'];
		$this->dob->DbValue = $row['dob'];
		$this->Age->DbValue = $row['Age'];
		$this->blood_group->DbValue = $row['blood_group'];
		$this->mobile_no->DbValue = $row['mobile_no'];
		$this->description->DbValue = $row['description'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->IdentificationMark->DbValue = $row['IdentificationMark'];
		$this->Religion->DbValue = $row['Religion'];
		$this->Nationality->DbValue = $row['Nationality'];
		$this->ReferedByDr->DbValue = $row['ReferedByDr'];
		$this->ReferClinicname->DbValue = $row['ReferClinicname'];
		$this->ReferCity->DbValue = $row['ReferCity'];
		$this->ReferMobileNo->DbValue = $row['ReferMobileNo'];
		$this->ReferA4TreatingConsultant->DbValue = $row['ReferA4TreatingConsultant'];
		$this->PurposreReferredfor->DbValue = $row['PurposreReferredfor'];
		$this->spouse_title->DbValue = $row['spouse_title'];
		$this->spouse_first_name->DbValue = $row['spouse_first_name'];
		$this->spouse_middle_name->DbValue = $row['spouse_middle_name'];
		$this->spouse_last_name->DbValue = $row['spouse_last_name'];
		$this->spouse_gender->DbValue = $row['spouse_gender'];
		$this->spouse_dob->DbValue = $row['spouse_dob'];
		$this->spouse_Age->DbValue = $row['spouse_Age'];
		$this->spouse_blood_group->DbValue = $row['spouse_blood_group'];
		$this->spouse_mobile_no->DbValue = $row['spouse_mobile_no'];
		$this->Maritalstatus->DbValue = $row['Maritalstatus'];
		$this->Business->DbValue = $row['Business'];
		$this->Patient_Language->DbValue = $row['Patient_Language'];
		$this->Passport->DbValue = $row['Passport'];
		$this->VisaNo->DbValue = $row['VisaNo'];
		$this->ValidityOfVisa->DbValue = $row['ValidityOfVisa'];
		$this->WhereDidYouHear->DbValue = $row['WhereDidYouHear'];
		$this->HospID->DbValue = $row['HospID'];
		$this->street->DbValue = $row['street'];
		$this->town->DbValue = $row['town'];
		$this->province->DbValue = $row['province'];
		$this->country->DbValue = $row['country'];
		$this->postal_code->DbValue = $row['postal_code'];
		$this->PEmail->DbValue = $row['PEmail'];
		$this->PEmergencyContact->DbValue = $row['PEmergencyContact'];
		$this->occupation->DbValue = $row['occupation'];
		$this->spouse_occupation->DbValue = $row['spouse_occupation'];
		$this->WhatsApp->DbValue = $row['WhatsApp'];
		$this->CouppleID->DbValue = $row['CouppleID'];
		$this->MaleID->DbValue = $row['MaleID'];
		$this->FemaleID->DbValue = $row['FemaleID'];
		$this->GroupID->DbValue = $row['GroupID'];
		$this->Relationship->DbValue = $row['Relationship'];
		$this->AppointmentSearch->DbValue = $row['AppointmentSearch'];
		$this->FacebookID->DbValue = $row['FacebookID'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
		$oldFiles = EmptyValue($row['profilePic']) ? [] : [$row['profilePic']];
		foreach ($oldFiles as $oldFile) {
			if (file_exists($this->profilePic->oldPhysicalUploadPath() . $oldFile))
				@unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
		}
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@ AND `PatientID` = '@PatientID@'";
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
		if (is_array($row))
			$val = array_key_exists('PatientID', $row) ? $row['PatientID'] : NULL;
		else
			$val = $this->PatientID->OldValue !== NULL ? $this->PatientID->OldValue : $this->PatientID->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@PatientID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "patientlist.php";
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
		if ($pageName == "patientview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patientedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patientadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patientlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patientview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patientview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patientadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patientadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patientedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patientedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("patientadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patientadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("patientdelete.php", $this->getUrlParm());
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
		$json .= ",PatientID:" . JsonEncode($this->PatientID->CurrentValue, "string");
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
		if ($this->PatientID->CurrentValue != NULL) {
			$url .= "&PatientID=" . urlencode($this->PatientID->CurrentValue);
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
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("id") !== NULL)
				$arKey[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("PatientID") !== NULL)
				$arKey[] = Param("PatientID");
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
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // id
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
				$this->id->CurrentValue = $key[0];
			else
				$this->id->OldValue = $key[0];
			if ($setCurrent)
				$this->PatientID->CurrentValue = $key[1];
			else
				$this->PatientID->OldValue = $key[1];
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
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->title->setDbValue($rs->fields('title'));
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->middle_name->setDbValue($rs->fields('middle_name'));
		$this->last_name->setDbValue($rs->fields('last_name'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->dob->setDbValue($rs->fields('dob'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->blood_group->setDbValue($rs->fields('blood_group'));
		$this->mobile_no->setDbValue($rs->fields('mobile_no'));
		$this->description->setDbValue($rs->fields('description'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->profilePic->Upload->DbValue = $rs->fields('profilePic');
		$this->IdentificationMark->setDbValue($rs->fields('IdentificationMark'));
		$this->Religion->setDbValue($rs->fields('Religion'));
		$this->Nationality->setDbValue($rs->fields('Nationality'));
		$this->ReferedByDr->setDbValue($rs->fields('ReferedByDr'));
		$this->ReferClinicname->setDbValue($rs->fields('ReferClinicname'));
		$this->ReferCity->setDbValue($rs->fields('ReferCity'));
		$this->ReferMobileNo->setDbValue($rs->fields('ReferMobileNo'));
		$this->ReferA4TreatingConsultant->setDbValue($rs->fields('ReferA4TreatingConsultant'));
		$this->PurposreReferredfor->setDbValue($rs->fields('PurposreReferredfor'));
		$this->spouse_title->setDbValue($rs->fields('spouse_title'));
		$this->spouse_first_name->setDbValue($rs->fields('spouse_first_name'));
		$this->spouse_middle_name->setDbValue($rs->fields('spouse_middle_name'));
		$this->spouse_last_name->setDbValue($rs->fields('spouse_last_name'));
		$this->spouse_gender->setDbValue($rs->fields('spouse_gender'));
		$this->spouse_dob->setDbValue($rs->fields('spouse_dob'));
		$this->spouse_Age->setDbValue($rs->fields('spouse_Age'));
		$this->spouse_blood_group->setDbValue($rs->fields('spouse_blood_group'));
		$this->spouse_mobile_no->setDbValue($rs->fields('spouse_mobile_no'));
		$this->Maritalstatus->setDbValue($rs->fields('Maritalstatus'));
		$this->Business->setDbValue($rs->fields('Business'));
		$this->Patient_Language->setDbValue($rs->fields('Patient_Language'));
		$this->Passport->setDbValue($rs->fields('Passport'));
		$this->VisaNo->setDbValue($rs->fields('VisaNo'));
		$this->ValidityOfVisa->setDbValue($rs->fields('ValidityOfVisa'));
		$this->WhereDidYouHear->setDbValue($rs->fields('WhereDidYouHear'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->street->setDbValue($rs->fields('street'));
		$this->town->setDbValue($rs->fields('town'));
		$this->province->setDbValue($rs->fields('province'));
		$this->country->setDbValue($rs->fields('country'));
		$this->postal_code->setDbValue($rs->fields('postal_code'));
		$this->PEmail->setDbValue($rs->fields('PEmail'));
		$this->PEmergencyContact->setDbValue($rs->fields('PEmergencyContact'));
		$this->occupation->setDbValue($rs->fields('occupation'));
		$this->spouse_occupation->setDbValue($rs->fields('spouse_occupation'));
		$this->WhatsApp->setDbValue($rs->fields('WhatsApp'));
		$this->CouppleID->setDbValue($rs->fields('CouppleID'));
		$this->MaleID->setDbValue($rs->fields('MaleID'));
		$this->FemaleID->setDbValue($rs->fields('FemaleID'));
		$this->GroupID->setDbValue($rs->fields('GroupID'));
		$this->Relationship->setDbValue($rs->fields('Relationship'));
		$this->AppointmentSearch->setDbValue($rs->fields('AppointmentSearch'));
		$this->FacebookID->setDbValue($rs->fields('FacebookID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// PatientID
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// Age
		// blood_group
		// mobile_no
		// description
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// IdentificationMark
		// Religion
		// Nationality
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// spouse_title
		// spouse_first_name
		// spouse_middle_name
		// spouse_last_name
		// spouse_gender
		// spouse_dob
		// spouse_Age
		// spouse_blood_group
		// spouse_mobile_no
		// Maritalstatus
		// Business
		// Patient_Language
		// Passport
		// VisaNo
		// ValidityOfVisa
		// WhereDidYouHear
		// HospID
		// street
		// town
		// province
		// country
		// postal_code
		// PEmail
		// PEmergencyContact
		// occupation
		// spouse_occupation
		// WhatsApp
		// CouppleID
		// MaleID
		// FemaleID
		// GroupID
		// Relationship
		// AppointmentSearch
		// FacebookID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// title
		$curVal = strval($this->title->CurrentValue);
		if ($curVal != "") {
			$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
			if ($this->title->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->title->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->title->ViewValue = $this->title->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->title->ViewValue = $this->title->CurrentValue;
				}
			}
		} else {
			$this->title->ViewValue = NULL;
		}
		$this->title->ViewCustomAttributes = "";

		// first_name
		$this->first_name->ViewValue = $this->first_name->CurrentValue;
		$this->first_name->ViewCustomAttributes = "";

		// middle_name
		$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
		$this->middle_name->ViewCustomAttributes = "";

		// last_name
		$this->last_name->ViewValue = $this->last_name->CurrentValue;
		$this->last_name->ViewCustomAttributes = "";

		// gender
		$curVal = strval($this->gender->CurrentValue);
		if ($curVal != "") {
			$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			if ($this->gender->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->gender->ViewValue = $this->gender->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->gender->ViewValue = $this->gender->CurrentValue;
				}
			}
		} else {
			$this->gender->ViewValue = NULL;
		}
		$this->gender->ViewCustomAttributes = "";

		// dob
		$this->dob->ViewValue = $this->dob->CurrentValue;
		$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
		$this->dob->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// blood_group
		$curVal = strval($this->blood_group->CurrentValue);
		if ($curVal != "") {
			$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
			if ($this->blood_group->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
				}
			}
		} else {
			$this->blood_group->ViewValue = NULL;
		}
		$this->blood_group->ViewCustomAttributes = "";

		// mobile_no
		$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal != "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->status->ViewValue = $this->status->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->status->ViewValue = $this->status->CurrentValue;
				}
			}
		} else {
			$this->status->ViewValue = NULL;
		}
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

		// profilePic
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->ImageWidth = 80;
			$this->profilePic->ImageHeight = 80;
			$this->profilePic->ImageAlt = $this->profilePic->alt();
			$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
		} else {
			$this->profilePic->ViewValue = "";
		}
		$this->profilePic->ViewCustomAttributes = "";

		// IdentificationMark
		$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->ViewCustomAttributes = "";

		// Religion
		$this->Religion->ViewValue = $this->Religion->CurrentValue;
		$this->Religion->ViewCustomAttributes = "";

		// Nationality
		$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
		$this->Nationality->ViewCustomAttributes = "";

		// ReferedByDr
		if ($this->ReferedByDr->VirtualValue != "") {
			$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
		} else {
			$curVal = strval($this->ReferedByDr->CurrentValue);
			if ($curVal != "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
				if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
					}
				}
			} else {
				$this->ReferedByDr->ViewValue = NULL;
			}
		}
		$this->ReferedByDr->ViewCustomAttributes = "";

		// ReferClinicname
		$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
		$this->ReferClinicname->ViewCustomAttributes = "";

		// ReferCity
		$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
		$this->ReferCity->ViewCustomAttributes = "";

		// ReferMobileNo
		$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
		$this->ReferMobileNo->ViewCustomAttributes = "";

		// ReferA4TreatingConsultant
		if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
			$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
		} else {
			$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
			if ($curVal != "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
				if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
					}
				}
			} else {
				$this->ReferA4TreatingConsultant->ViewValue = NULL;
			}
		}
		$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

		// PurposreReferredfor
		$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
		$this->PurposreReferredfor->ViewCustomAttributes = "";

		// spouse_title
		$curVal = strval($this->spouse_title->CurrentValue);
		if ($curVal != "") {
			$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
			if ($this->spouse_title->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->spouse_title->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
				}
			}
		} else {
			$this->spouse_title->ViewValue = NULL;
		}
		$this->spouse_title->ViewCustomAttributes = "";

		// spouse_first_name
		$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
		$this->spouse_first_name->ViewCustomAttributes = "";

		// spouse_middle_name
		$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
		$this->spouse_middle_name->ViewCustomAttributes = "";

		// spouse_last_name
		$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
		$this->spouse_last_name->ViewCustomAttributes = "";

		// spouse_gender
		$curVal = strval($this->spouse_gender->CurrentValue);
		if ($curVal != "") {
			$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
			if ($this->spouse_gender->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->spouse_gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
				}
			}
		} else {
			$this->spouse_gender->ViewValue = NULL;
		}
		$this->spouse_gender->ViewCustomAttributes = "";

		// spouse_dob
		$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
		$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
		$this->spouse_dob->ViewCustomAttributes = "";

		// spouse_Age
		$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
		$this->spouse_Age->ViewCustomAttributes = "";

		// spouse_blood_group
		$curVal = strval($this->spouse_blood_group->CurrentValue);
		if ($curVal != "") {
			$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
			if ($this->spouse_blood_group->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->spouse_blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
				}
			}
		} else {
			$this->spouse_blood_group->ViewValue = NULL;
		}
		$this->spouse_blood_group->ViewCustomAttributes = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->ViewCustomAttributes = "";

		// Maritalstatus
		$curVal = strval($this->Maritalstatus->CurrentValue);
		if ($curVal != "") {
			$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
			if ($this->Maritalstatus->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Maritalstatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
				}
			}
		} else {
			$this->Maritalstatus->ViewValue = NULL;
		}
		$this->Maritalstatus->ViewCustomAttributes = "";

		// Business
		$this->Business->ViewValue = $this->Business->CurrentValue;
		$curVal = strval($this->Business->CurrentValue);
		if ($curVal != "") {
			$this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
			if ($this->Business->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Business->ViewValue = $this->Business->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Business->ViewValue = $this->Business->CurrentValue;
				}
			}
		} else {
			$this->Business->ViewValue = NULL;
		}
		$this->Business->ViewCustomAttributes = "";

		// Patient_Language
		$curVal = strval($this->Patient_Language->CurrentValue);
		if ($curVal != "") {
			$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
			if ($this->Patient_Language->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Patient_Language->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
				}
			}
		} else {
			$this->Patient_Language->ViewValue = NULL;
		}
		$this->Patient_Language->ViewCustomAttributes = "";

		// Passport
		$this->Passport->ViewValue = $this->Passport->CurrentValue;
		$this->Passport->ViewCustomAttributes = "";

		// VisaNo
		$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
		$this->VisaNo->ViewCustomAttributes = "";

		// ValidityOfVisa
		$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
		$this->ValidityOfVisa->ViewCustomAttributes = "";

		// WhereDidYouHear
		$curVal = strval($this->WhereDidYouHear->CurrentValue);
		if ($curVal != "") {
			$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
				$arwrk = explode(",", $curVal);
				$filterWrk = "";
				foreach ($arwrk as $wrk) {
					if ($filterWrk != "")
						$filterWrk .= " OR ";
					$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->WhereDidYouHear->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->Close();
				} else {
					$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
				}
			}
		} else {
			$this->WhereDidYouHear->ViewValue = NULL;
		}
		$this->WhereDidYouHear->ViewCustomAttributes = "";

		// HospID
		$curVal = strval($this->HospID->CurrentValue);
		if ($curVal != "") {
			$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			if ($this->HospID->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HospID->ViewValue = $this->HospID->CurrentValue;
				}
			}
		} else {
			$this->HospID->ViewValue = NULL;
		}
		$this->HospID->ViewCustomAttributes = "";

		// street
		$this->street->ViewValue = $this->street->CurrentValue;
		$this->street->ViewCustomAttributes = "";

		// town
		$this->town->ViewValue = $this->town->CurrentValue;
		$this->town->ViewCustomAttributes = "";

		// province
		$this->province->ViewValue = $this->province->CurrentValue;
		$this->province->ViewCustomAttributes = "";

		// country
		$this->country->ViewValue = $this->country->CurrentValue;
		$this->country->ViewCustomAttributes = "";

		// postal_code
		$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
		$this->postal_code->ViewCustomAttributes = "";

		// PEmail
		$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
		$this->PEmail->ViewCustomAttributes = "";

		// PEmergencyContact
		$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
		$this->PEmergencyContact->ViewCustomAttributes = "";

		// occupation
		$this->occupation->ViewValue = $this->occupation->CurrentValue;
		$this->occupation->ViewCustomAttributes = "";

		// spouse_occupation
		$this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
		$this->spouse_occupation->ViewCustomAttributes = "";

		// WhatsApp
		$this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
		$this->WhatsApp->ViewCustomAttributes = "";

		// CouppleID
		$this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
		$this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
		$this->CouppleID->ViewCustomAttributes = "";

		// MaleID
		$this->MaleID->ViewValue = $this->MaleID->CurrentValue;
		$this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
		$this->MaleID->ViewCustomAttributes = "";

		// FemaleID
		$this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
		$this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
		$this->FemaleID->ViewCustomAttributes = "";

		// GroupID
		$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
		$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
		$this->GroupID->ViewCustomAttributes = "";

		// Relationship
		$this->Relationship->ViewValue = $this->Relationship->CurrentValue;
		$this->Relationship->ViewCustomAttributes = "";

		// AppointmentSearch
		$curVal = strval($this->AppointmentSearch->CurrentValue);
		if ($curVal != "") {
			$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
			if ($this->AppointmentSearch->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->AppointmentSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
				}
			}
		} else {
			$this->AppointmentSearch->ViewValue = NULL;
		}
		$this->AppointmentSearch->ViewCustomAttributes = "";

		// FacebookID
		$this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
		$this->FacebookID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// title
		$this->title->LinkCustomAttributes = "";
		$this->title->HrefValue = "";
		$this->title->TooltipValue = "";

		// first_name
		$this->first_name->LinkCustomAttributes = "";
		$this->first_name->HrefValue = "";
		$this->first_name->TooltipValue = "";

		// middle_name
		$this->middle_name->LinkCustomAttributes = "";
		$this->middle_name->HrefValue = "";
		$this->middle_name->TooltipValue = "";

		// last_name
		$this->last_name->LinkCustomAttributes = "";
		$this->last_name->HrefValue = "";
		$this->last_name->TooltipValue = "";

		// gender
		$this->gender->LinkCustomAttributes = "";
		$this->gender->HrefValue = "";
		$this->gender->TooltipValue = "";

		// dob
		$this->dob->LinkCustomAttributes = "";
		$this->dob->HrefValue = "";
		$this->dob->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// blood_group
		$this->blood_group->LinkCustomAttributes = "";
		$this->blood_group->HrefValue = "";
		$this->blood_group->TooltipValue = "";

		// mobile_no
		$this->mobile_no->LinkCustomAttributes = "";
		$this->mobile_no->HrefValue = "";
		$this->mobile_no->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

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

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
			$this->profilePic->LinkAttrs["target"] = ""; // Add target
			if ($this->isExport())
				$this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
		} else {
			$this->profilePic->HrefValue = "";
		}
		$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
		$this->profilePic->TooltipValue = "";
		if ($this->profilePic->UseColorbox) {
			if (EmptyValue($this->profilePic->TooltipValue))
				$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
			$this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
			$this->profilePic->LinkAttrs->appendClass("ew-lightbox");
		}

		// IdentificationMark
		$this->IdentificationMark->LinkCustomAttributes = "";
		$this->IdentificationMark->HrefValue = "";
		$this->IdentificationMark->TooltipValue = "";

		// Religion
		$this->Religion->LinkCustomAttributes = "";
		$this->Religion->HrefValue = "";
		$this->Religion->TooltipValue = "";

		// Nationality
		$this->Nationality->LinkCustomAttributes = "";
		$this->Nationality->HrefValue = "";
		$this->Nationality->TooltipValue = "";

		// ReferedByDr
		$this->ReferedByDr->LinkCustomAttributes = "";
		$this->ReferedByDr->HrefValue = "";
		$this->ReferedByDr->TooltipValue = "";

		// ReferClinicname
		$this->ReferClinicname->LinkCustomAttributes = "";
		$this->ReferClinicname->HrefValue = "";
		$this->ReferClinicname->TooltipValue = "";

		// ReferCity
		$this->ReferCity->LinkCustomAttributes = "";
		$this->ReferCity->HrefValue = "";
		$this->ReferCity->TooltipValue = "";

		// ReferMobileNo
		$this->ReferMobileNo->LinkCustomAttributes = "";
		$this->ReferMobileNo->HrefValue = "";
		$this->ReferMobileNo->TooltipValue = "";

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
		$this->ReferA4TreatingConsultant->HrefValue = "";
		$this->ReferA4TreatingConsultant->TooltipValue = "";

		// PurposreReferredfor
		$this->PurposreReferredfor->LinkCustomAttributes = "";
		$this->PurposreReferredfor->HrefValue = "";
		$this->PurposreReferredfor->TooltipValue = "";

		// spouse_title
		$this->spouse_title->LinkCustomAttributes = "";
		$this->spouse_title->HrefValue = "";
		$this->spouse_title->TooltipValue = "";

		// spouse_first_name
		$this->spouse_first_name->LinkCustomAttributes = "";
		$this->spouse_first_name->HrefValue = "";
		$this->spouse_first_name->TooltipValue = "";

		// spouse_middle_name
		$this->spouse_middle_name->LinkCustomAttributes = "";
		$this->spouse_middle_name->HrefValue = "";
		$this->spouse_middle_name->TooltipValue = "";

		// spouse_last_name
		$this->spouse_last_name->LinkCustomAttributes = "";
		$this->spouse_last_name->HrefValue = "";
		$this->spouse_last_name->TooltipValue = "";

		// spouse_gender
		$this->spouse_gender->LinkCustomAttributes = "";
		$this->spouse_gender->HrefValue = "";
		$this->spouse_gender->TooltipValue = "";

		// spouse_dob
		$this->spouse_dob->LinkCustomAttributes = "";
		$this->spouse_dob->HrefValue = "";
		$this->spouse_dob->TooltipValue = "";

		// spouse_Age
		$this->spouse_Age->LinkCustomAttributes = "";
		$this->spouse_Age->HrefValue = "";
		$this->spouse_Age->TooltipValue = "";

		// spouse_blood_group
		$this->spouse_blood_group->LinkCustomAttributes = "";
		$this->spouse_blood_group->HrefValue = "";
		$this->spouse_blood_group->TooltipValue = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->LinkCustomAttributes = "";
		$this->spouse_mobile_no->HrefValue = "";
		$this->spouse_mobile_no->TooltipValue = "";

		// Maritalstatus
		$this->Maritalstatus->LinkCustomAttributes = "";
		$this->Maritalstatus->HrefValue = "";
		$this->Maritalstatus->TooltipValue = "";

		// Business
		$this->Business->LinkCustomAttributes = "";
		$this->Business->HrefValue = "";
		$this->Business->TooltipValue = "";

		// Patient_Language
		$this->Patient_Language->LinkCustomAttributes = "";
		$this->Patient_Language->HrefValue = "";
		$this->Patient_Language->TooltipValue = "";

		// Passport
		$this->Passport->LinkCustomAttributes = "";
		$this->Passport->HrefValue = "";
		$this->Passport->TooltipValue = "";

		// VisaNo
		$this->VisaNo->LinkCustomAttributes = "";
		$this->VisaNo->HrefValue = "";
		$this->VisaNo->TooltipValue = "";

		// ValidityOfVisa
		$this->ValidityOfVisa->LinkCustomAttributes = "";
		$this->ValidityOfVisa->HrefValue = "";
		$this->ValidityOfVisa->TooltipValue = "";

		// WhereDidYouHear
		$this->WhereDidYouHear->LinkCustomAttributes = "";
		$this->WhereDidYouHear->HrefValue = "";
		$this->WhereDidYouHear->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// street
		$this->street->LinkCustomAttributes = "";
		$this->street->HrefValue = "";
		$this->street->TooltipValue = "";

		// town
		$this->town->LinkCustomAttributes = "";
		$this->town->HrefValue = "";
		$this->town->TooltipValue = "";

		// province
		$this->province->LinkCustomAttributes = "";
		$this->province->HrefValue = "";
		$this->province->TooltipValue = "";

		// country
		$this->country->LinkCustomAttributes = "";
		$this->country->HrefValue = "";
		$this->country->TooltipValue = "";

		// postal_code
		$this->postal_code->LinkCustomAttributes = "";
		$this->postal_code->HrefValue = "";
		$this->postal_code->TooltipValue = "";

		// PEmail
		$this->PEmail->LinkCustomAttributes = "";
		$this->PEmail->HrefValue = "";
		$this->PEmail->TooltipValue = "";

		// PEmergencyContact
		$this->PEmergencyContact->LinkCustomAttributes = "";
		$this->PEmergencyContact->HrefValue = "";
		$this->PEmergencyContact->TooltipValue = "";

		// occupation
		$this->occupation->LinkCustomAttributes = "";
		$this->occupation->HrefValue = "";
		$this->occupation->TooltipValue = "";

		// spouse_occupation
		$this->spouse_occupation->LinkCustomAttributes = "";
		$this->spouse_occupation->HrefValue = "";
		$this->spouse_occupation->TooltipValue = "";

		// WhatsApp
		$this->WhatsApp->LinkCustomAttributes = "";
		$this->WhatsApp->HrefValue = "";
		$this->WhatsApp->TooltipValue = "";

		// CouppleID
		$this->CouppleID->LinkCustomAttributes = "";
		$this->CouppleID->HrefValue = "";
		$this->CouppleID->TooltipValue = "";

		// MaleID
		$this->MaleID->LinkCustomAttributes = "";
		$this->MaleID->HrefValue = "";
		$this->MaleID->TooltipValue = "";

		// FemaleID
		$this->FemaleID->LinkCustomAttributes = "";
		$this->FemaleID->HrefValue = "";
		$this->FemaleID->TooltipValue = "";

		// GroupID
		$this->GroupID->LinkCustomAttributes = "";
		$this->GroupID->HrefValue = "";
		$this->GroupID->TooltipValue = "";

		// Relationship
		$this->Relationship->LinkCustomAttributes = "";
		$this->Relationship->HrefValue = "";
		$this->Relationship->TooltipValue = "";

		// AppointmentSearch
		$this->AppointmentSearch->LinkCustomAttributes = "";
		$this->AppointmentSearch->HrefValue = "";
		$this->AppointmentSearch->TooltipValue = "";

		// FacebookID
		$this->FacebookID->LinkCustomAttributes = "";
		$this->FacebookID->HrefValue = "";
		$this->FacebookID->TooltipValue = "";

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

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// title
		$this->title->EditAttrs["class"] = "form-control";
		$this->title->EditCustomAttributes = "";

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (!$this->first_name->Raw)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// middle_name
		$this->middle_name->EditAttrs["class"] = "form-control";
		$this->middle_name->EditCustomAttributes = "";
		if (!$this->middle_name->Raw)
			$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
		$this->middle_name->EditValue = $this->middle_name->CurrentValue;
		$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

		// last_name
		$this->last_name->EditAttrs["class"] = "form-control";
		$this->last_name->EditCustomAttributes = "";
		if (!$this->last_name->Raw)
			$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
		$this->last_name->EditValue = $this->last_name->CurrentValue;
		$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

		// gender
		$this->gender->EditAttrs["class"] = "form-control";
		$this->gender->EditCustomAttributes = "";

		// dob
		$this->dob->EditAttrs["class"] = "form-control";
		$this->dob->EditCustomAttributes = "";
		$this->dob->EditValue = FormatDateTime($this->dob->CurrentValue, 7);
		$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// blood_group
		$this->blood_group->EditAttrs["class"] = "form-control";
		$this->blood_group->EditCustomAttributes = "";

		// mobile_no
		$this->mobile_no->EditAttrs["class"] = "form-control";
		$this->mobile_no->EditCustomAttributes = "";
		if (!$this->mobile_no->Raw)
			$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
		$this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		if (!$this->description->Raw)
			$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic

		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		if (!EmptyValue($this->profilePic->Upload->DbValue)) {
			$this->profilePic->ImageWidth = 80;
			$this->profilePic->ImageHeight = 80;
			$this->profilePic->ImageAlt = $this->profilePic->alt();
			$this->profilePic->EditValue = $this->profilePic->Upload->DbValue;
		} else {
			$this->profilePic->EditValue = "";
		}
		if (!EmptyValue($this->profilePic->CurrentValue))
				$this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (!$this->IdentificationMark->Raw)
			$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
		$this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

		// Religion
		$this->Religion->EditAttrs["class"] = "form-control";
		$this->Religion->EditCustomAttributes = "";
		if (!$this->Religion->Raw)
			$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
		$this->Religion->EditValue = $this->Religion->CurrentValue;
		$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

		// Nationality
		$this->Nationality->EditAttrs["class"] = "form-control";
		$this->Nationality->EditCustomAttributes = "";
		if (!$this->Nationality->Raw)
			$this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
		$this->Nationality->EditValue = $this->Nationality->CurrentValue;
		$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

		// ReferedByDr
		$this->ReferedByDr->EditAttrs["class"] = "form-control";
		$this->ReferedByDr->EditCustomAttributes = "";

		// ReferClinicname
		$this->ReferClinicname->EditAttrs["class"] = "form-control";
		$this->ReferClinicname->EditCustomAttributes = "";
		if (!$this->ReferClinicname->Raw)
			$this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
		$this->ReferClinicname->EditValue = $this->ReferClinicname->CurrentValue;
		$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

		// ReferCity
		$this->ReferCity->EditAttrs["class"] = "form-control";
		$this->ReferCity->EditCustomAttributes = "";
		if (!$this->ReferCity->Raw)
			$this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
		$this->ReferCity->EditValue = $this->ReferCity->CurrentValue;
		$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

		// ReferMobileNo
		$this->ReferMobileNo->EditAttrs["class"] = "form-control";
		$this->ReferMobileNo->EditCustomAttributes = "";
		if (!$this->ReferMobileNo->Raw)
			$this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
		$this->ReferMobileNo->EditValue = $this->ReferMobileNo->CurrentValue;
		$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
		$this->ReferA4TreatingConsultant->EditCustomAttributes = "";

		// PurposreReferredfor
		$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
		$this->PurposreReferredfor->EditCustomAttributes = "";
		if (!$this->PurposreReferredfor->Raw)
			$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
		$this->PurposreReferredfor->EditValue = $this->PurposreReferredfor->CurrentValue;
		$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

		// spouse_title
		$this->spouse_title->EditAttrs["class"] = "form-control";
		$this->spouse_title->EditCustomAttributes = "";

		// spouse_first_name
		$this->spouse_first_name->EditAttrs["class"] = "form-control";
		$this->spouse_first_name->EditCustomAttributes = "";
		if (!$this->spouse_first_name->Raw)
			$this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
		$this->spouse_first_name->EditValue = $this->spouse_first_name->CurrentValue;
		$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

		// spouse_middle_name
		$this->spouse_middle_name->EditAttrs["class"] = "form-control";
		$this->spouse_middle_name->EditCustomAttributes = "";
		if (!$this->spouse_middle_name->Raw)
			$this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
		$this->spouse_middle_name->EditValue = $this->spouse_middle_name->CurrentValue;
		$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

		// spouse_last_name
		$this->spouse_last_name->EditAttrs["class"] = "form-control";
		$this->spouse_last_name->EditCustomAttributes = "";
		if (!$this->spouse_last_name->Raw)
			$this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
		$this->spouse_last_name->EditValue = $this->spouse_last_name->CurrentValue;
		$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

		// spouse_gender
		$this->spouse_gender->EditAttrs["class"] = "form-control";
		$this->spouse_gender->EditCustomAttributes = "";

		// spouse_dob
		$this->spouse_dob->EditAttrs["class"] = "form-control";
		$this->spouse_dob->EditCustomAttributes = "";
		$this->spouse_dob->EditValue = FormatDateTime($this->spouse_dob->CurrentValue, 7);
		$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

		// spouse_Age
		$this->spouse_Age->EditAttrs["class"] = "form-control";
		$this->spouse_Age->EditCustomAttributes = "";
		if (!$this->spouse_Age->Raw)
			$this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
		$this->spouse_Age->EditValue = $this->spouse_Age->CurrentValue;
		$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

		// spouse_blood_group
		$this->spouse_blood_group->EditAttrs["class"] = "form-control";
		$this->spouse_blood_group->EditCustomAttributes = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
		$this->spouse_mobile_no->EditCustomAttributes = "";
		if (!$this->spouse_mobile_no->Raw)
			$this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
		$this->spouse_mobile_no->EditValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

		// Maritalstatus
		$this->Maritalstatus->EditAttrs["class"] = "form-control";
		$this->Maritalstatus->EditCustomAttributes = "";

		// Business
		$this->Business->EditAttrs["class"] = "form-control";
		$this->Business->EditCustomAttributes = "";
		if (!$this->Business->Raw)
			$this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
		$this->Business->EditValue = $this->Business->CurrentValue;
		$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

		// Patient_Language
		$this->Patient_Language->EditAttrs["class"] = "form-control";
		$this->Patient_Language->EditCustomAttributes = "";

		// Passport
		$this->Passport->EditAttrs["class"] = "form-control";
		$this->Passport->EditCustomAttributes = "";
		if (!$this->Passport->Raw)
			$this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
		$this->Passport->EditValue = $this->Passport->CurrentValue;
		$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

		// VisaNo
		$this->VisaNo->EditAttrs["class"] = "form-control";
		$this->VisaNo->EditCustomAttributes = "";
		if (!$this->VisaNo->Raw)
			$this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
		$this->VisaNo->EditValue = $this->VisaNo->CurrentValue;
		$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

		// ValidityOfVisa
		$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
		$this->ValidityOfVisa->EditCustomAttributes = "";
		if (!$this->ValidityOfVisa->Raw)
			$this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
		$this->ValidityOfVisa->EditValue = $this->ValidityOfVisa->CurrentValue;
		$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

		// WhereDidYouHear
		$this->WhereDidYouHear->EditCustomAttributes = "";

		// HospID
		// street

		$this->street->EditAttrs["class"] = "form-control";
		$this->street->EditCustomAttributes = "";
		if (!$this->street->Raw)
			$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
		$this->street->EditValue = $this->street->CurrentValue;
		$this->street->PlaceHolder = RemoveHtml($this->street->caption());

		// town
		$this->town->EditAttrs["class"] = "form-control";
		$this->town->EditCustomAttributes = "";
		if (!$this->town->Raw)
			$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
		$this->town->EditValue = $this->town->CurrentValue;
		$this->town->PlaceHolder = RemoveHtml($this->town->caption());

		// province
		$this->province->EditAttrs["class"] = "form-control";
		$this->province->EditCustomAttributes = "";
		if (!$this->province->Raw)
			$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
		$this->province->EditValue = $this->province->CurrentValue;
		$this->province->PlaceHolder = RemoveHtml($this->province->caption());

		// country
		$this->country->EditAttrs["class"] = "form-control";
		$this->country->EditCustomAttributes = "";
		if (!$this->country->Raw)
			$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
		$this->country->EditValue = $this->country->CurrentValue;
		$this->country->PlaceHolder = RemoveHtml($this->country->caption());

		// postal_code
		$this->postal_code->EditAttrs["class"] = "form-control";
		$this->postal_code->EditCustomAttributes = "";
		if (!$this->postal_code->Raw)
			$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
		$this->postal_code->EditValue = $this->postal_code->CurrentValue;
		$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

		// PEmail
		$this->PEmail->EditAttrs["class"] = "form-control";
		$this->PEmail->EditCustomAttributes = "";
		if (!$this->PEmail->Raw)
			$this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
		$this->PEmail->EditValue = $this->PEmail->CurrentValue;
		$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

		// PEmergencyContact
		$this->PEmergencyContact->EditAttrs["class"] = "form-control";
		$this->PEmergencyContact->EditCustomAttributes = "";
		if (!$this->PEmergencyContact->Raw)
			$this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
		$this->PEmergencyContact->EditValue = $this->PEmergencyContact->CurrentValue;
		$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

		// occupation
		$this->occupation->EditAttrs["class"] = "form-control";
		$this->occupation->EditCustomAttributes = "";
		if (!$this->occupation->Raw)
			$this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
		$this->occupation->EditValue = $this->occupation->CurrentValue;
		$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

		// spouse_occupation
		$this->spouse_occupation->EditAttrs["class"] = "form-control";
		$this->spouse_occupation->EditCustomAttributes = "";
		if (!$this->spouse_occupation->Raw)
			$this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
		$this->spouse_occupation->EditValue = $this->spouse_occupation->CurrentValue;
		$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

		// WhatsApp
		$this->WhatsApp->EditAttrs["class"] = "form-control";
		$this->WhatsApp->EditCustomAttributes = "";
		if (!$this->WhatsApp->Raw)
			$this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
		$this->WhatsApp->EditValue = $this->WhatsApp->CurrentValue;
		$this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

		// CouppleID
		$this->CouppleID->EditAttrs["class"] = "form-control";
		$this->CouppleID->EditCustomAttributes = "";
		$this->CouppleID->EditValue = $this->CouppleID->CurrentValue;
		$this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

		// MaleID
		$this->MaleID->EditAttrs["class"] = "form-control";
		$this->MaleID->EditCustomAttributes = "";
		$this->MaleID->EditValue = $this->MaleID->CurrentValue;
		$this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

		// FemaleID
		$this->FemaleID->EditAttrs["class"] = "form-control";
		$this->FemaleID->EditCustomAttributes = "";
		$this->FemaleID->EditValue = $this->FemaleID->CurrentValue;
		$this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

		// GroupID
		$this->GroupID->EditAttrs["class"] = "form-control";
		$this->GroupID->EditCustomAttributes = "";
		$this->GroupID->EditValue = $this->GroupID->CurrentValue;
		$this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

		// Relationship
		$this->Relationship->EditAttrs["class"] = "form-control";
		$this->Relationship->EditCustomAttributes = "";
		if (!$this->Relationship->Raw)
			$this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
		$this->Relationship->EditValue = $this->Relationship->CurrentValue;
		$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

		// AppointmentSearch
		$this->AppointmentSearch->EditAttrs["class"] = "form-control";
		$this->AppointmentSearch->EditCustomAttributes = "";

		// FacebookID
		$this->FacebookID->EditAttrs["class"] = "form-control";
		$this->FacebookID->EditCustomAttributes = "";
		if (!$this->FacebookID->Raw)
			$this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
		$this->FacebookID->EditValue = $this->FacebookID->CurrentValue;
		$this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

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
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->title);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->dob);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->blood_group);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Nationality);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->ReferClinicname);
					$doc->exportCaption($this->ReferCity);
					$doc->exportCaption($this->ReferMobileNo);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->PurposreReferredfor);
					$doc->exportCaption($this->spouse_title);
					$doc->exportCaption($this->spouse_first_name);
					$doc->exportCaption($this->spouse_middle_name);
					$doc->exportCaption($this->spouse_last_name);
					$doc->exportCaption($this->spouse_gender);
					$doc->exportCaption($this->spouse_dob);
					$doc->exportCaption($this->spouse_Age);
					$doc->exportCaption($this->spouse_blood_group);
					$doc->exportCaption($this->spouse_mobile_no);
					$doc->exportCaption($this->Maritalstatus);
					$doc->exportCaption($this->Business);
					$doc->exportCaption($this->Patient_Language);
					$doc->exportCaption($this->Passport);
					$doc->exportCaption($this->VisaNo);
					$doc->exportCaption($this->ValidityOfVisa);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->PEmail);
					$doc->exportCaption($this->PEmergencyContact);
					$doc->exportCaption($this->occupation);
					$doc->exportCaption($this->spouse_occupation);
					$doc->exportCaption($this->WhatsApp);
					$doc->exportCaption($this->CouppleID);
					$doc->exportCaption($this->MaleID);
					$doc->exportCaption($this->FemaleID);
					$doc->exportCaption($this->GroupID);
					$doc->exportCaption($this->Relationship);
					$doc->exportCaption($this->AppointmentSearch);
					$doc->exportCaption($this->FacebookID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->title);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->dob);
					$doc->exportCaption($this->blood_group);
					$doc->exportCaption($this->mobile_no);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Nationality);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->ReferClinicname);
					$doc->exportCaption($this->ReferCity);
					$doc->exportCaption($this->ReferMobileNo);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->PurposreReferredfor);
					$doc->exportCaption($this->spouse_title);
					$doc->exportCaption($this->spouse_first_name);
					$doc->exportCaption($this->spouse_middle_name);
					$doc->exportCaption($this->spouse_last_name);
					$doc->exportCaption($this->spouse_gender);
					$doc->exportCaption($this->spouse_dob);
					$doc->exportCaption($this->spouse_Age);
					$doc->exportCaption($this->spouse_blood_group);
					$doc->exportCaption($this->spouse_mobile_no);
					$doc->exportCaption($this->Maritalstatus);
					$doc->exportCaption($this->Business);
					$doc->exportCaption($this->Patient_Language);
					$doc->exportCaption($this->Passport);
					$doc->exportCaption($this->VisaNo);
					$doc->exportCaption($this->ValidityOfVisa);
					$doc->exportCaption($this->WhereDidYouHear);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->street);
					$doc->exportCaption($this->town);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->PEmail);
					$doc->exportCaption($this->PEmergencyContact);
					$doc->exportCaption($this->occupation);
					$doc->exportCaption($this->spouse_occupation);
					$doc->exportCaption($this->WhatsApp);
					$doc->exportCaption($this->CouppleID);
					$doc->exportCaption($this->MaleID);
					$doc->exportCaption($this->FemaleID);
					$doc->exportCaption($this->GroupID);
					$doc->exportCaption($this->Relationship);
					$doc->exportCaption($this->FacebookID);
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
						$doc->exportField($this->PatientID);
						$doc->exportField($this->title);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->dob);
						$doc->exportField($this->Age);
						$doc->exportField($this->blood_group);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->description);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Nationality);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->ReferClinicname);
						$doc->exportField($this->ReferCity);
						$doc->exportField($this->ReferMobileNo);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->PurposreReferredfor);
						$doc->exportField($this->spouse_title);
						$doc->exportField($this->spouse_first_name);
						$doc->exportField($this->spouse_middle_name);
						$doc->exportField($this->spouse_last_name);
						$doc->exportField($this->spouse_gender);
						$doc->exportField($this->spouse_dob);
						$doc->exportField($this->spouse_Age);
						$doc->exportField($this->spouse_blood_group);
						$doc->exportField($this->spouse_mobile_no);
						$doc->exportField($this->Maritalstatus);
						$doc->exportField($this->Business);
						$doc->exportField($this->Patient_Language);
						$doc->exportField($this->Passport);
						$doc->exportField($this->VisaNo);
						$doc->exportField($this->ValidityOfVisa);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->street);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->country);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->PEmail);
						$doc->exportField($this->PEmergencyContact);
						$doc->exportField($this->occupation);
						$doc->exportField($this->spouse_occupation);
						$doc->exportField($this->WhatsApp);
						$doc->exportField($this->CouppleID);
						$doc->exportField($this->MaleID);
						$doc->exportField($this->FemaleID);
						$doc->exportField($this->GroupID);
						$doc->exportField($this->Relationship);
						$doc->exportField($this->AppointmentSearch);
						$doc->exportField($this->FacebookID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->title);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->dob);
						$doc->exportField($this->blood_group);
						$doc->exportField($this->mobile_no);
						$doc->exportField($this->status);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Nationality);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->ReferClinicname);
						$doc->exportField($this->ReferCity);
						$doc->exportField($this->ReferMobileNo);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->PurposreReferredfor);
						$doc->exportField($this->spouse_title);
						$doc->exportField($this->spouse_first_name);
						$doc->exportField($this->spouse_middle_name);
						$doc->exportField($this->spouse_last_name);
						$doc->exportField($this->spouse_gender);
						$doc->exportField($this->spouse_dob);
						$doc->exportField($this->spouse_Age);
						$doc->exportField($this->spouse_blood_group);
						$doc->exportField($this->spouse_mobile_no);
						$doc->exportField($this->Maritalstatus);
						$doc->exportField($this->Business);
						$doc->exportField($this->Patient_Language);
						$doc->exportField($this->Passport);
						$doc->exportField($this->VisaNo);
						$doc->exportField($this->ValidityOfVisa);
						$doc->exportField($this->WhereDidYouHear);
						$doc->exportField($this->HospID);
						$doc->exportField($this->street);
						$doc->exportField($this->town);
						$doc->exportField($this->province);
						$doc->exportField($this->country);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->PEmail);
						$doc->exportField($this->PEmergencyContact);
						$doc->exportField($this->occupation);
						$doc->exportField($this->spouse_occupation);
						$doc->exportField($this->WhatsApp);
						$doc->exportField($this->CouppleID);
						$doc->exportField($this->MaleID);
						$doc->exportField($this->FemaleID);
						$doc->exportField($this->GroupID);
						$doc->exportField($this->Relationship);
						$doc->exportField($this->FacebookID);
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
		$width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
		$height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

		// Set up field name / file name field / file type field
		$fldName = "";
		$fileNameFld = "";
		$fileTypeFld = "";
		if ($fldparm == 'profilePic') {
			$fldName = "profilePic";
			$fileNameFld = "profilePic";
		} else {
			return FALSE; // Incorrect field
		}

		// Set up key values
		$ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($ar) == 2) {
			$this->id->CurrentValue = $ar[0];
			$this->PatientID->CurrentValue = $ar[1];
		} else {
			return FALSE; // Incorrect key
		}

		// Set up filter (WHERE Clause)
		$filter = $this->getRecordFilter();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$dbtype = GetConnectionType($this->Dbid);
		if (($rs = $conn->execute($sql)) && !$rs->EOF) {
			$val = $rs->fields($fldName);
			if (!EmptyValue($val)) {
				$fld = $this->fields[$fldName];

				// Binary data
				if ($fld->DataType == DATATYPE_BLOB) {
					if ($dbtype != "MYSQL") {
						if (is_array($val) || is_object($val)) // Byte array
							$val = BytesToString($val);
					}
					if ($resize)
						ResizeBinary($val, $width, $height);

					// Write file type
					if ($fileTypeFld != "" && !EmptyValue($rs->fields($fileTypeFld))) {
						AddHeader("Content-type", $rs->fields($fileTypeFld));
					} else {
						AddHeader("Content-type", ContentType($val));
					}

					// Write file name
					$downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
					if ($fileNameFld != "" && !EmptyValue($rs->fields($fileNameFld))) {
						$fileName = $rs->fields($fileNameFld);
						$pathinfo = pathinfo($fileName);
						$ext = strtolower(@$pathinfo["extension"]);
						$isPdf = SameText($ext, "pdf");
						if ($downloadPdf || !$isPdf) // Skip header if not download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					} else {
						$ext = ContentExtension($val);
						$isPdf = SameText($ext, ".pdf");
						if ($isPdf && $downloadPdf) // Add header if download PDF
							AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
					}

					// Write file data
					if (StartsString("PK", $val) && ContainsString($val, "[Content_Types].xml") &&
						ContainsString($val, "_rels") && ContainsString($val, "docProps")) { // Fix Office 2007 documents
						if (!EndsString("\0\0\0", $val)) // Not ends with 3 or 4 \0
							$val .= "\0\0\0\0";
					}

					// Clear any debug message
					if (ob_get_length())
						ob_end_clean();

					// Write binary data
					Write($val);

				// Upload to folder
				} else {
					if ($fld->UploadMultiple)
						$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
					else
						$files = [$val];
					$data = [];
					$ar = [];
					foreach ($files as $file) {
						if (!EmptyValue($file))
							$ar[$file] = FullUrl($fld->hrefPath() . $file);
					}
					$data[$fld->Param] = $ar;
					WriteJson($data);
				}
			}
			$rs->close();
			return TRUE;
		}
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
		// screenshot-img

			$CaptureIMG = 	$_POST["screenshot-img"];
			$CaptureIMAGE = $_POST["screenshotFF"];
			$UserProfile = new UserProfile();
			$id =  $UserProfile->Profile['id'];
			$HospID =  $UserProfile->Profile['HospID'];
			$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			if($hospital_PreFixCode == "")
			{
				getHospitalDetails($HospID);
				$UserProfile = new UserProfile();
				$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			}
			$rsnew["PatientID"] =  $hospital_PreFixCode . getPatientID($HospID);
				if($CaptureIMAGE != '')
				{
					$rsnew["profilePic"] = $rsnew["PatientID"].'.png';
					$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $CaptureIMAGE));
					file_put_contents('uploads/'.$rsnew["PatientID"].'.png', $data);
				}
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

				$CaptureIMG = 	$_POST["screenshot-img"];
			$CaptureIMAGE = $_POST["screenshotFF"];
				if($CaptureIMAGE != '')
				{
					$fileUPL = 'uploads/'.$rsold["PatientID"].'.png';
				    if (file_exists($fileUPL)) {
				    	unlink($fileUPL);
				    }
					$rsnew["profilePic"] = $rsold["PatientID"].'.png';
					$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $CaptureIMAGE));
					file_put_contents('uploads/'.$rsold["PatientID"].'.png', $data);
				}
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
	//	$this->profilePic->EditAttrs["capture"] = "camera";

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>