<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient_app
 */
class patient_app extends DbTable
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
	public $IdentificationMark;
	public $Religion;
	public $Nationality;
	public $profilePic;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_app';
		$this->TableName = 'patient_app';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_app`";
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
		$this->id = new DbField('patient_app', 'patient_app', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatientID
		$this->PatientID = new DbField('patient_app', 'patient_app', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->IsPrimaryKey = TRUE; // Primary key field
		$this->PatientID->Nullable = FALSE; // NOT NULL field
		$this->PatientID->Required = TRUE; // Required field
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// title
		$this->title = new DbField('patient_app', 'patient_app', 'x_title', 'title', '`title`', '`title`', 3, -1, FALSE, '`title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->title->Sortable = TRUE; // Allow sort
		$this->title->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['title'] = &$this->title;

		// first_name
		$this->first_name = new DbField('patient_app', 'patient_app', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new DbField('patient_app', 'patient_app', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, -1, FALSE, '`middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new DbField('patient_app', 'patient_app', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new DbField('patient_app', 'patient_app', 'x_gender', 'gender', '`gender`', '`gender`', 200, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->fields['gender'] = &$this->gender;

		// dob
		$this->dob = new DbField('patient_app', 'patient_app', 'x_dob', 'dob', '`dob`', CastDateFieldForLike('`dob`', 0, "DB"), 133, 0, FALSE, '`dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dob->Sortable = TRUE; // Allow sort
		$this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['dob'] = &$this->dob;

		// Age
		$this->Age = new DbField('patient_app', 'patient_app', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// blood_group
		$this->blood_group = new DbField('patient_app', 'patient_app', 'x_blood_group', 'blood_group', '`blood_group`', '`blood_group`', 200, -1, FALSE, '`blood_group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->blood_group->Sortable = TRUE; // Allow sort
		$this->fields['blood_group'] = &$this->blood_group;

		// mobile_no
		$this->mobile_no = new DbField('patient_app', 'patient_app', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, -1, FALSE, '`mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['mobile_no'] = &$this->mobile_no;

		// description
		$this->description = new DbField('patient_app', 'patient_app', 'x_description', 'description', '`description`', '`description`', 201, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// IdentificationMark
		$this->IdentificationMark = new DbField('patient_app', 'patient_app', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, -1, FALSE, '`IdentificationMark`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// Religion
		$this->Religion = new DbField('patient_app', 'patient_app', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, -1, FALSE, '`Religion`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->fields['Religion'] = &$this->Religion;

		// Nationality
		$this->Nationality = new DbField('patient_app', 'patient_app', 'x_Nationality', 'Nationality', '`Nationality`', '`Nationality`', 200, -1, FALSE, '`Nationality`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nationality->Sortable = TRUE; // Allow sort
		$this->fields['Nationality'] = &$this->Nationality;

		// profilePic
		$this->profilePic = new DbField('patient_app', 'patient_app', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 200, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// status
		$this->status = new DbField('patient_app', 'patient_app', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_app', 'patient_app', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_app', 'patient_app', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_app', 'patient_app', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_app', 'patient_app', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// ReferedByDr
		$this->ReferedByDr = new DbField('patient_app', 'patient_app', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, -1, FALSE, '`ReferedByDr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferedByDr->Sortable = TRUE; // Allow sort
		$this->fields['ReferedByDr'] = &$this->ReferedByDr;

		// ReferClinicname
		$this->ReferClinicname = new DbField('patient_app', 'patient_app', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, -1, FALSE, '`ReferClinicname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferClinicname->Sortable = TRUE; // Allow sort
		$this->fields['ReferClinicname'] = &$this->ReferClinicname;

		// ReferCity
		$this->ReferCity = new DbField('patient_app', 'patient_app', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, -1, FALSE, '`ReferCity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferCity->Sortable = TRUE; // Allow sort
		$this->fields['ReferCity'] = &$this->ReferCity;

		// ReferMobileNo
		$this->ReferMobileNo = new DbField('patient_app', 'patient_app', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, -1, FALSE, '`ReferMobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferMobileNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferMobileNo'] = &$this->ReferMobileNo;

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant = new DbField('patient_app', 'patient_app', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, -1, FALSE, '`ReferA4TreatingConsultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferA4TreatingConsultant->Sortable = TRUE; // Allow sort
		$this->fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

		// PurposreReferredfor
		$this->PurposreReferredfor = new DbField('patient_app', 'patient_app', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, -1, FALSE, '`PurposreReferredfor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurposreReferredfor->Sortable = TRUE; // Allow sort
		$this->fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

		// spouse_title
		$this->spouse_title = new DbField('patient_app', 'patient_app', 'x_spouse_title', 'spouse_title', '`spouse_title`', '`spouse_title`', 200, -1, FALSE, '`spouse_title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_title->Sortable = TRUE; // Allow sort
		$this->fields['spouse_title'] = &$this->spouse_title;

		// spouse_first_name
		$this->spouse_first_name = new DbField('patient_app', 'patient_app', 'x_spouse_first_name', 'spouse_first_name', '`spouse_first_name`', '`spouse_first_name`', 200, -1, FALSE, '`spouse_first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_first_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_first_name'] = &$this->spouse_first_name;

		// spouse_middle_name
		$this->spouse_middle_name = new DbField('patient_app', 'patient_app', 'x_spouse_middle_name', 'spouse_middle_name', '`spouse_middle_name`', '`spouse_middle_name`', 200, -1, FALSE, '`spouse_middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_middle_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_middle_name'] = &$this->spouse_middle_name;

		// spouse_last_name
		$this->spouse_last_name = new DbField('patient_app', 'patient_app', 'x_spouse_last_name', 'spouse_last_name', '`spouse_last_name`', '`spouse_last_name`', 200, -1, FALSE, '`spouse_last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_last_name->Sortable = TRUE; // Allow sort
		$this->fields['spouse_last_name'] = &$this->spouse_last_name;

		// spouse_gender
		$this->spouse_gender = new DbField('patient_app', 'patient_app', 'x_spouse_gender', 'spouse_gender', '`spouse_gender`', '`spouse_gender`', 200, -1, FALSE, '`spouse_gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_gender->Sortable = TRUE; // Allow sort
		$this->fields['spouse_gender'] = &$this->spouse_gender;

		// spouse_dob
		$this->spouse_dob = new DbField('patient_app', 'patient_app', 'x_spouse_dob', 'spouse_dob', '`spouse_dob`', CastDateFieldForLike('`spouse_dob`', 0, "DB"), 133, 0, FALSE, '`spouse_dob`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_dob->Sortable = TRUE; // Allow sort
		$this->spouse_dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['spouse_dob'] = &$this->spouse_dob;

		// spouse_Age
		$this->spouse_Age = new DbField('patient_app', 'patient_app', 'x_spouse_Age', 'spouse_Age', '`spouse_Age`', '`spouse_Age`', 200, -1, FALSE, '`spouse_Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_Age->Sortable = TRUE; // Allow sort
		$this->fields['spouse_Age'] = &$this->spouse_Age;

		// spouse_blood_group
		$this->spouse_blood_group = new DbField('patient_app', 'patient_app', 'x_spouse_blood_group', 'spouse_blood_group', '`spouse_blood_group`', '`spouse_blood_group`', 200, -1, FALSE, '`spouse_blood_group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_blood_group->Sortable = TRUE; // Allow sort
		$this->fields['spouse_blood_group'] = &$this->spouse_blood_group;

		// spouse_mobile_no
		$this->spouse_mobile_no = new DbField('patient_app', 'patient_app', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', '`spouse_mobile_no`', 200, -1, FALSE, '`spouse_mobile_no`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_mobile_no->Sortable = TRUE; // Allow sort
		$this->fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

		// Maritalstatus
		$this->Maritalstatus = new DbField('patient_app', 'patient_app', 'x_Maritalstatus', 'Maritalstatus', '`Maritalstatus`', '`Maritalstatus`', 200, -1, FALSE, '`Maritalstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Maritalstatus->Sortable = TRUE; // Allow sort
		$this->fields['Maritalstatus'] = &$this->Maritalstatus;

		// Business
		$this->Business = new DbField('patient_app', 'patient_app', 'x_Business', 'Business', '`Business`', '`Business`', 200, -1, FALSE, '`Business`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Business->Sortable = TRUE; // Allow sort
		$this->fields['Business'] = &$this->Business;

		// Patient_Language
		$this->Patient_Language = new DbField('patient_app', 'patient_app', 'x_Patient_Language', 'Patient_Language', '`Patient_Language`', '`Patient_Language`', 200, -1, FALSE, '`Patient_Language`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Patient_Language->Sortable = TRUE; // Allow sort
		$this->fields['Patient_Language'] = &$this->Patient_Language;

		// Passport
		$this->Passport = new DbField('patient_app', 'patient_app', 'x_Passport', 'Passport', '`Passport`', '`Passport`', 200, -1, FALSE, '`Passport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Passport->Sortable = TRUE; // Allow sort
		$this->fields['Passport'] = &$this->Passport;

		// VisaNo
		$this->VisaNo = new DbField('patient_app', 'patient_app', 'x_VisaNo', 'VisaNo', '`VisaNo`', '`VisaNo`', 200, -1, FALSE, '`VisaNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VisaNo->Sortable = TRUE; // Allow sort
		$this->fields['VisaNo'] = &$this->VisaNo;

		// ValidityOfVisa
		$this->ValidityOfVisa = new DbField('patient_app', 'patient_app', 'x_ValidityOfVisa', 'ValidityOfVisa', '`ValidityOfVisa`', '`ValidityOfVisa`', 200, -1, FALSE, '`ValidityOfVisa`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ValidityOfVisa->Sortable = TRUE; // Allow sort
		$this->fields['ValidityOfVisa'] = &$this->ValidityOfVisa;

		// WhereDidYouHear
		$this->WhereDidYouHear = new DbField('patient_app', 'patient_app', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, -1, FALSE, '`WhereDidYouHear`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WhereDidYouHear->Sortable = TRUE; // Allow sort
		$this->fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

		// HospID
		$this->HospID = new DbField('patient_app', 'patient_app', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->fields['HospID'] = &$this->HospID;

		// street
		$this->street = new DbField('patient_app', 'patient_app', 'x_street', 'street', '`street`', '`street`', 200, -1, FALSE, '`street`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->street->Sortable = TRUE; // Allow sort
		$this->fields['street'] = &$this->street;

		// town
		$this->town = new DbField('patient_app', 'patient_app', 'x_town', 'town', '`town`', '`town`', 200, -1, FALSE, '`town`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->town->Sortable = TRUE; // Allow sort
		$this->fields['town'] = &$this->town;

		// province
		$this->province = new DbField('patient_app', 'patient_app', 'x_province', 'province', '`province`', '`province`', 200, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->fields['province'] = &$this->province;

		// country
		$this->country = new DbField('patient_app', 'patient_app', 'x_country', 'country', '`country`', '`country`', 200, -1, FALSE, '`country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Sortable = TRUE; // Allow sort
		$this->fields['country'] = &$this->country;

		// postal_code
		$this->postal_code = new DbField('patient_app', 'patient_app', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// PEmail
		$this->PEmail = new DbField('patient_app', 'patient_app', 'x_PEmail', 'PEmail', '`PEmail`', '`PEmail`', 200, -1, FALSE, '`PEmail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmail->Sortable = TRUE; // Allow sort
		$this->fields['PEmail'] = &$this->PEmail;

		// PEmergencyContact
		$this->PEmergencyContact = new DbField('patient_app', 'patient_app', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', '`PEmergencyContact`', 200, -1, FALSE, '`PEmergencyContact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmergencyContact->Sortable = TRUE; // Allow sort
		$this->fields['PEmergencyContact'] = &$this->PEmergencyContact;

		// occupation
		$this->occupation = new DbField('patient_app', 'patient_app', 'x_occupation', 'occupation', '`occupation`', '`occupation`', 200, -1, FALSE, '`occupation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->occupation->Sortable = TRUE; // Allow sort
		$this->fields['occupation'] = &$this->occupation;

		// spouse_occupation
		$this->spouse_occupation = new DbField('patient_app', 'patient_app', 'x_spouse_occupation', 'spouse_occupation', '`spouse_occupation`', '`spouse_occupation`', 200, -1, FALSE, '`spouse_occupation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_occupation->Sortable = TRUE; // Allow sort
		$this->fields['spouse_occupation'] = &$this->spouse_occupation;

		// WhatsApp
		$this->WhatsApp = new DbField('patient_app', 'patient_app', 'x_WhatsApp', 'WhatsApp', '`WhatsApp`', '`WhatsApp`', 200, -1, FALSE, '`WhatsApp`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WhatsApp->Sortable = TRUE; // Allow sort
		$this->fields['WhatsApp'] = &$this->WhatsApp;

		// CouppleID
		$this->CouppleID = new DbField('patient_app', 'patient_app', 'x_CouppleID', 'CouppleID', '`CouppleID`', '`CouppleID`', 3, -1, FALSE, '`CouppleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CouppleID->Sortable = TRUE; // Allow sort
		$this->CouppleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CouppleID'] = &$this->CouppleID;

		// MaleID
		$this->MaleID = new DbField('patient_app', 'patient_app', 'x_MaleID', 'MaleID', '`MaleID`', '`MaleID`', 3, -1, FALSE, '`MaleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MaleID->Sortable = TRUE; // Allow sort
		$this->MaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['MaleID'] = &$this->MaleID;

		// FemaleID
		$this->FemaleID = new DbField('patient_app', 'patient_app', 'x_FemaleID', 'FemaleID', '`FemaleID`', '`FemaleID`', 3, -1, FALSE, '`FemaleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FemaleID->Sortable = TRUE; // Allow sort
		$this->FemaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['FemaleID'] = &$this->FemaleID;

		// GroupID
		$this->GroupID = new DbField('patient_app', 'patient_app', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, -1, FALSE, '`GroupID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GroupID->Sortable = TRUE; // Allow sort
		$this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GroupID'] = &$this->GroupID;

		// Relationship
		$this->Relationship = new DbField('patient_app', 'patient_app', 'x_Relationship', 'Relationship', '`Relationship`', '`Relationship`', 200, -1, FALSE, '`Relationship`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Relationship->Sortable = TRUE; // Allow sort
		$this->fields['Relationship'] = &$this->Relationship;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`patient_app`";
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
			if (array_key_exists('PatientID', $rs))
				AddFilter($where, QuotedName('PatientID', $this->Dbid) . '=' . QuotedValue($rs['PatientID'], $this->PatientID->DataType, $this->Dbid));
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
		$this->IdentificationMark->DbValue = $row['IdentificationMark'];
		$this->Religion->DbValue = $row['Religion'];
		$this->Nationality->DbValue = $row['Nationality'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
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
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
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
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		$val = is_array($row) ? (array_key_exists('PatientID', $row) ? $row['PatientID'] : NULL) : $this->PatientID->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@PatientID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "patient_applist.php";
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
		if ($pageName == "patient_appview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_appedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_appadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_applist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("patient_appview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_appview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "patient_appadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_appadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_appedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_appadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_appdelete.php", $this->getUrlParm());
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
		if ($parm <> "")
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
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // id
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
			$this->PatientID->CurrentValue = $key[1];
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
		$this->IdentificationMark->setDbValue($rs->fields('IdentificationMark'));
		$this->Religion->setDbValue($rs->fields('Religion'));
		$this->Nationality->setDbValue($rs->fields('Nationality'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
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
		// IdentificationMark
		// Religion
		// Nationality
		// profilePic
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
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
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// title
		$this->title->ViewValue = $this->title->CurrentValue;
		$this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
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
		$this->gender->ViewValue = $this->gender->CurrentValue;
		$this->gender->ViewCustomAttributes = "";

		// dob
		$this->dob->ViewValue = $this->dob->CurrentValue;
		$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
		$this->dob->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// blood_group
		$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
		$this->blood_group->ViewCustomAttributes = "";

		// mobile_no
		$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// IdentificationMark
		$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->ViewCustomAttributes = "";

		// Religion
		$this->Religion->ViewValue = $this->Religion->CurrentValue;
		$this->Religion->ViewCustomAttributes = "";

		// Nationality
		$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
		$this->Nationality->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

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

		// ReferedByDr
		$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
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
		$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

		// PurposreReferredfor
		$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
		$this->PurposreReferredfor->ViewCustomAttributes = "";

		// spouse_title
		$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
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
		$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
		$this->spouse_gender->ViewCustomAttributes = "";

		// spouse_dob
		$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
		$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
		$this->spouse_dob->ViewCustomAttributes = "";

		// spouse_Age
		$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
		$this->spouse_Age->ViewCustomAttributes = "";

		// spouse_blood_group
		$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
		$this->spouse_blood_group->ViewCustomAttributes = "";

		// spouse_mobile_no
		$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->ViewCustomAttributes = "";

		// Maritalstatus
		$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
		$this->Maritalstatus->ViewCustomAttributes = "";

		// Business
		$this->Business->ViewValue = $this->Business->CurrentValue;
		$this->Business->ViewCustomAttributes = "";

		// Patient_Language
		$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
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
		$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
		$this->WhereDidYouHear->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
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

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

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
		$this->title->EditValue = $this->title->CurrentValue;
		$this->title->PlaceHolder = RemoveHtml($this->title->caption());

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// middle_name
		$this->middle_name->EditAttrs["class"] = "form-control";
		$this->middle_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
		$this->middle_name->EditValue = $this->middle_name->CurrentValue;
		$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

		// last_name
		$this->last_name->EditAttrs["class"] = "form-control";
		$this->last_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
		$this->last_name->EditValue = $this->last_name->CurrentValue;
		$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

		// gender
		$this->gender->EditAttrs["class"] = "form-control";
		$this->gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
		$this->gender->EditValue = $this->gender->CurrentValue;
		$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

		// dob
		$this->dob->EditAttrs["class"] = "form-control";
		$this->dob->EditCustomAttributes = "";
		$this->dob->EditValue = FormatDateTime($this->dob->CurrentValue, 8);
		$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// blood_group
		$this->blood_group->EditAttrs["class"] = "form-control";
		$this->blood_group->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->blood_group->CurrentValue = HtmlDecode($this->blood_group->CurrentValue);
		$this->blood_group->EditValue = $this->blood_group->CurrentValue;
		$this->blood_group->PlaceHolder = RemoveHtml($this->blood_group->caption());

		// mobile_no
		$this->mobile_no->EditAttrs["class"] = "form-control";
		$this->mobile_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
		$this->mobile_no->EditValue = $this->mobile_no->CurrentValue;
		$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// IdentificationMark
		$this->IdentificationMark->EditAttrs["class"] = "form-control";
		$this->IdentificationMark->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
		$this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
		$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

		// Religion
		$this->Religion->EditAttrs["class"] = "form-control";
		$this->Religion->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
		$this->Religion->EditValue = $this->Religion->CurrentValue;
		$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

		// Nationality
		$this->Nationality->EditAttrs["class"] = "form-control";
		$this->Nationality->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
		$this->Nationality->EditValue = $this->Nationality->CurrentValue;
		$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

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

		// ReferedByDr
		$this->ReferedByDr->EditAttrs["class"] = "form-control";
		$this->ReferedByDr->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferedByDr->CurrentValue = HtmlDecode($this->ReferedByDr->CurrentValue);
		$this->ReferedByDr->EditValue = $this->ReferedByDr->CurrentValue;
		$this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

		// ReferClinicname
		$this->ReferClinicname->EditAttrs["class"] = "form-control";
		$this->ReferClinicname->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
		$this->ReferClinicname->EditValue = $this->ReferClinicname->CurrentValue;
		$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

		// ReferCity
		$this->ReferCity->EditAttrs["class"] = "form-control";
		$this->ReferCity->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
		$this->ReferCity->EditValue = $this->ReferCity->CurrentValue;
		$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

		// ReferMobileNo
		$this->ReferMobileNo->EditAttrs["class"] = "form-control";
		$this->ReferMobileNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
		$this->ReferMobileNo->EditValue = $this->ReferMobileNo->CurrentValue;
		$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
		$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReferA4TreatingConsultant->CurrentValue = HtmlDecode($this->ReferA4TreatingConsultant->CurrentValue);
		$this->ReferA4TreatingConsultant->EditValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

		// PurposreReferredfor
		$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
		$this->PurposreReferredfor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
		$this->PurposreReferredfor->EditValue = $this->PurposreReferredfor->CurrentValue;
		$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

		// spouse_title
		$this->spouse_title->EditAttrs["class"] = "form-control";
		$this->spouse_title->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_title->CurrentValue = HtmlDecode($this->spouse_title->CurrentValue);
		$this->spouse_title->EditValue = $this->spouse_title->CurrentValue;
		$this->spouse_title->PlaceHolder = RemoveHtml($this->spouse_title->caption());

		// spouse_first_name
		$this->spouse_first_name->EditAttrs["class"] = "form-control";
		$this->spouse_first_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
		$this->spouse_first_name->EditValue = $this->spouse_first_name->CurrentValue;
		$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

		// spouse_middle_name
		$this->spouse_middle_name->EditAttrs["class"] = "form-control";
		$this->spouse_middle_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
		$this->spouse_middle_name->EditValue = $this->spouse_middle_name->CurrentValue;
		$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

		// spouse_last_name
		$this->spouse_last_name->EditAttrs["class"] = "form-control";
		$this->spouse_last_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
		$this->spouse_last_name->EditValue = $this->spouse_last_name->CurrentValue;
		$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

		// spouse_gender
		$this->spouse_gender->EditAttrs["class"] = "form-control";
		$this->spouse_gender->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_gender->CurrentValue = HtmlDecode($this->spouse_gender->CurrentValue);
		$this->spouse_gender->EditValue = $this->spouse_gender->CurrentValue;
		$this->spouse_gender->PlaceHolder = RemoveHtml($this->spouse_gender->caption());

		// spouse_dob
		$this->spouse_dob->EditAttrs["class"] = "form-control";
		$this->spouse_dob->EditCustomAttributes = "";
		$this->spouse_dob->EditValue = FormatDateTime($this->spouse_dob->CurrentValue, 8);
		$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

		// spouse_Age
		$this->spouse_Age->EditAttrs["class"] = "form-control";
		$this->spouse_Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
		$this->spouse_Age->EditValue = $this->spouse_Age->CurrentValue;
		$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

		// spouse_blood_group
		$this->spouse_blood_group->EditAttrs["class"] = "form-control";
		$this->spouse_blood_group->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_blood_group->CurrentValue = HtmlDecode($this->spouse_blood_group->CurrentValue);
		$this->spouse_blood_group->EditValue = $this->spouse_blood_group->CurrentValue;
		$this->spouse_blood_group->PlaceHolder = RemoveHtml($this->spouse_blood_group->caption());

		// spouse_mobile_no
		$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
		$this->spouse_mobile_no->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
		$this->spouse_mobile_no->EditValue = $this->spouse_mobile_no->CurrentValue;
		$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

		// Maritalstatus
		$this->Maritalstatus->EditAttrs["class"] = "form-control";
		$this->Maritalstatus->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Maritalstatus->CurrentValue = HtmlDecode($this->Maritalstatus->CurrentValue);
		$this->Maritalstatus->EditValue = $this->Maritalstatus->CurrentValue;
		$this->Maritalstatus->PlaceHolder = RemoveHtml($this->Maritalstatus->caption());

		// Business
		$this->Business->EditAttrs["class"] = "form-control";
		$this->Business->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
		$this->Business->EditValue = $this->Business->CurrentValue;
		$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

		// Patient_Language
		$this->Patient_Language->EditAttrs["class"] = "form-control";
		$this->Patient_Language->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Patient_Language->CurrentValue = HtmlDecode($this->Patient_Language->CurrentValue);
		$this->Patient_Language->EditValue = $this->Patient_Language->CurrentValue;
		$this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

		// Passport
		$this->Passport->EditAttrs["class"] = "form-control";
		$this->Passport->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
		$this->Passport->EditValue = $this->Passport->CurrentValue;
		$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

		// VisaNo
		$this->VisaNo->EditAttrs["class"] = "form-control";
		$this->VisaNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
		$this->VisaNo->EditValue = $this->VisaNo->CurrentValue;
		$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

		// ValidityOfVisa
		$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
		$this->ValidityOfVisa->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
		$this->ValidityOfVisa->EditValue = $this->ValidityOfVisa->CurrentValue;
		$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

		// WhereDidYouHear
		$this->WhereDidYouHear->EditAttrs["class"] = "form-control";
		$this->WhereDidYouHear->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->WhereDidYouHear->CurrentValue = HtmlDecode($this->WhereDidYouHear->CurrentValue);
		$this->WhereDidYouHear->EditValue = $this->WhereDidYouHear->CurrentValue;
		$this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

		// HospID
		$this->HospID->EditAttrs["class"] = "form-control";
		$this->HospID->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
		$this->HospID->EditValue = $this->HospID->CurrentValue;
		$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

		// street
		$this->street->EditAttrs["class"] = "form-control";
		$this->street->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
		$this->street->EditValue = $this->street->CurrentValue;
		$this->street->PlaceHolder = RemoveHtml($this->street->caption());

		// town
		$this->town->EditAttrs["class"] = "form-control";
		$this->town->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
		$this->town->EditValue = $this->town->CurrentValue;
		$this->town->PlaceHolder = RemoveHtml($this->town->caption());

		// province
		$this->province->EditAttrs["class"] = "form-control";
		$this->province->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
		$this->province->EditValue = $this->province->CurrentValue;
		$this->province->PlaceHolder = RemoveHtml($this->province->caption());

		// country
		$this->country->EditAttrs["class"] = "form-control";
		$this->country->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
		$this->country->EditValue = $this->country->CurrentValue;
		$this->country->PlaceHolder = RemoveHtml($this->country->caption());

		// postal_code
		$this->postal_code->EditAttrs["class"] = "form-control";
		$this->postal_code->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
		$this->postal_code->EditValue = $this->postal_code->CurrentValue;
		$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

		// PEmail
		$this->PEmail->EditAttrs["class"] = "form-control";
		$this->PEmail->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
		$this->PEmail->EditValue = $this->PEmail->CurrentValue;
		$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

		// PEmergencyContact
		$this->PEmergencyContact->EditAttrs["class"] = "form-control";
		$this->PEmergencyContact->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
		$this->PEmergencyContact->EditValue = $this->PEmergencyContact->CurrentValue;
		$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

		// occupation
		$this->occupation->EditAttrs["class"] = "form-control";
		$this->occupation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
		$this->occupation->EditValue = $this->occupation->CurrentValue;
		$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

		// spouse_occupation
		$this->spouse_occupation->EditAttrs["class"] = "form-control";
		$this->spouse_occupation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
		$this->spouse_occupation->EditValue = $this->spouse_occupation->CurrentValue;
		$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

		// WhatsApp
		$this->WhatsApp->EditAttrs["class"] = "form-control";
		$this->WhatsApp->EditCustomAttributes = "";
		if (REMOVE_XSS)
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
		if (REMOVE_XSS)
			$this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
		$this->Relationship->EditValue = $this->Relationship->CurrentValue;
		$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

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
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Nationality);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
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
				} else {
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
					$doc->exportCaption($this->IdentificationMark);
					$doc->exportCaption($this->Religion);
					$doc->exportCaption($this->Nationality);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
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
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Nationality);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
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
					} else {
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
						$doc->exportField($this->IdentificationMark);
						$doc->exportField($this->Religion);
						$doc->exportField($this->Nationality);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
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