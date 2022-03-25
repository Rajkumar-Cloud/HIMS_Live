<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for patient
 */
class patient_base extends ReportTable
{
	public $ShowGroupHeaderAsRow = TRUE;
	public $ShowCompactSummaryFooter = TRUE;
	public $BloodGroup;
	public $Nationality;
	public $Patient_Language;
	public $Business;
	public $id;
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
	public $_Nationality;
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
	public $_Business;
	public $_Patient_Language;
	public $Passport;
	public $VisaNo;
	public $ValidityOfVisa;
	public $WhereDidYouHear;
	public $PatientID;
	public $HospID;
	public $street;
	public $town;
	public $province;
	public $country;
	public $postal_code;
	public $PEmail;
	public $PEmergencyContact;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'patient_base';
		$this->TableName = 'patient';
		$this->TableType = 'TABLE';
		$this->TableReportType = 'rpt';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// id
		$this->id = new ReportField('patient_base', 'patient', 'x_id', 'id', '`id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->id->DateFilter = "";
		$this->fields['id'] = &$this->id;

		// title
		$this->title = new ReportField('patient_base', 'patient', 'x_title', 'title', '`title`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->title->Sortable = TRUE; // Allow sort
		$this->title->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->title->DateFilter = "";
		$this->fields['title'] = &$this->title;

		// first_name
		$this->first_name = new ReportField('patient_base', 'patient', 'x_first_name', 'first_name', '`first_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->first_name->DateFilter = "";
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new ReportField('patient_base', 'patient', 'x_middle_name', 'middle_name', '`middle_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->middle_name->DateFilter = "";
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new ReportField('patient_base', 'patient', 'x_last_name', 'last_name', '`last_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->last_name->DateFilter = "";
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new ReportField('patient_base', 'patient', 'x_gender', 'gender', '`gender`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->DateFilter = "";
		$this->fields['gender'] = &$this->gender;

		// dob
		$this->dob = new ReportField('patient_base', 'patient', 'x_dob', 'dob', '`dob`', 133, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dob->Sortable = TRUE; // Allow sort
		$this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->dob->DateFilter = "";
		$this->fields['dob'] = &$this->dob;

		// Age
		$this->Age = new ReportField('patient_base', 'patient', 'x_Age', 'Age', '`Age`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->Age->DateFilter = "";
		$this->fields['Age'] = &$this->Age;

		// blood_group
		$this->blood_group = new ReportField('patient_base', 'patient', 'x_blood_group', 'blood_group', '`blood_group`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->blood_group->Sortable = TRUE; // Allow sort
		$this->blood_group->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->blood_group->DateFilter = "";
		$this->fields['blood_group'] = &$this->blood_group;

		// mobile_no
		$this->mobile_no = new ReportField('patient_base', 'patient', 'x_mobile_no', 'mobile_no', '`mobile_no`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_no->Sortable = TRUE; // Allow sort
		$this->mobile_no->DateFilter = "";
		$this->fields['mobile_no'] = &$this->mobile_no;

		// description
		$this->description = new ReportField('patient_base', 'patient', 'x_description', 'description', '`description`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->description->Sortable = TRUE; // Allow sort
		$this->description->DateFilter = "";
		$this->fields['description'] = &$this->description;

		// IdentificationMark
		$this->IdentificationMark = new ReportField('patient_base', 'patient', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IdentificationMark->Sortable = TRUE; // Allow sort
		$this->IdentificationMark->DateFilter = "";
		$this->fields['IdentificationMark'] = &$this->IdentificationMark;

		// Religion
		$this->Religion = new ReportField('patient_base', 'patient', 'x_Religion', 'Religion', '`Religion`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Religion->Sortable = TRUE; // Allow sort
		$this->Religion->DateFilter = "";
		$this->fields['Religion'] = &$this->Religion;

		// Nationality
		$this->_Nationality = new ReportField('patient_base', 'patient', 'x__Nationality', 'Nationality', '`Nationality`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Nationality->Sortable = TRUE; // Allow sort
		$this->_Nationality->DateFilter = "";
		$this->fields['Nationality'] = &$this->_Nationality;

		// profilePic
		$this->profilePic = new ReportField('patient_base', 'patient', 'x_profilePic', 'profilePic', '`profilePic`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->profilePic->DateFilter = "";
		$this->fields['profilePic'] = &$this->profilePic;

		// status
		$this->status = new ReportField('patient_base', 'patient', 'x_status', 'status', '`status`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->status->DateFilter = "";
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new ReportField('patient_base', 'patient', 'x_createdby', 'createdby', '`createdby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->createdby->DateFilter = "";
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new ReportField('patient_base', 'patient', 'x_createddatetime', 'createddatetime', '`createddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->createddatetime->DateFilter = "";
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new ReportField('patient_base', 'patient', 'x_modifiedby', 'modifiedby', '`modifiedby`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->modifiedby->DateFilter = "";
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new ReportField('patient_base', 'patient', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->modifieddatetime->DateFilter = "";
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// ReferedByDr
		$this->ReferedByDr = new ReportField('patient_base', 'patient', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferedByDr->Sortable = TRUE; // Allow sort
		$this->ReferedByDr->DateFilter = "";
		$this->fields['ReferedByDr'] = &$this->ReferedByDr;

		// ReferClinicname
		$this->ReferClinicname = new ReportField('patient_base', 'patient', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferClinicname->Sortable = TRUE; // Allow sort
		$this->ReferClinicname->DateFilter = "";
		$this->fields['ReferClinicname'] = &$this->ReferClinicname;

		// ReferCity
		$this->ReferCity = new ReportField('patient_base', 'patient', 'x_ReferCity', 'ReferCity', '`ReferCity`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferCity->Sortable = TRUE; // Allow sort
		$this->ReferCity->DateFilter = "";
		$this->fields['ReferCity'] = &$this->ReferCity;

		// ReferMobileNo
		$this->ReferMobileNo = new ReportField('patient_base', 'patient', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferMobileNo->Sortable = TRUE; // Allow sort
		$this->ReferMobileNo->DateFilter = "";
		$this->fields['ReferMobileNo'] = &$this->ReferMobileNo;

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant = new ReportField('patient_base', 'patient', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferA4TreatingConsultant->Sortable = TRUE; // Allow sort
		$this->ReferA4TreatingConsultant->DateFilter = "";
		$this->fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

		// PurposreReferredfor
		$this->PurposreReferredfor = new ReportField('patient_base', 'patient', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurposreReferredfor->Sortable = TRUE; // Allow sort
		$this->PurposreReferredfor->DateFilter = "";
		$this->fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

		// spouse_title
		$this->spouse_title = new ReportField('patient_base', 'patient', 'x_spouse_title', 'spouse_title', '`spouse_title`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_title->Sortable = TRUE; // Allow sort
		$this->spouse_title->DateFilter = "";
		$this->fields['spouse_title'] = &$this->spouse_title;

		// spouse_first_name
		$this->spouse_first_name = new ReportField('patient_base', 'patient', 'x_spouse_first_name', 'spouse_first_name', '`spouse_first_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_first_name->Sortable = TRUE; // Allow sort
		$this->spouse_first_name->DateFilter = "";
		$this->fields['spouse_first_name'] = &$this->spouse_first_name;

		// spouse_middle_name
		$this->spouse_middle_name = new ReportField('patient_base', 'patient', 'x_spouse_middle_name', 'spouse_middle_name', '`spouse_middle_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_middle_name->Sortable = TRUE; // Allow sort
		$this->spouse_middle_name->DateFilter = "";
		$this->fields['spouse_middle_name'] = &$this->spouse_middle_name;

		// spouse_last_name
		$this->spouse_last_name = new ReportField('patient_base', 'patient', 'x_spouse_last_name', 'spouse_last_name', '`spouse_last_name`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_last_name->Sortable = TRUE; // Allow sort
		$this->spouse_last_name->DateFilter = "";
		$this->fields['spouse_last_name'] = &$this->spouse_last_name;

		// spouse_gender
		$this->spouse_gender = new ReportField('patient_base', 'patient', 'x_spouse_gender', 'spouse_gender', '`spouse_gender`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_gender->Sortable = TRUE; // Allow sort
		$this->spouse_gender->DateFilter = "";
		$this->fields['spouse_gender'] = &$this->spouse_gender;

		// spouse_dob
		$this->spouse_dob = new ReportField('patient_base', 'patient', 'x_spouse_dob', 'spouse_dob', '`spouse_dob`', 133, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_dob->Sortable = TRUE; // Allow sort
		$this->spouse_dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->spouse_dob->DateFilter = "";
		$this->fields['spouse_dob'] = &$this->spouse_dob;

		// spouse_Age
		$this->spouse_Age = new ReportField('patient_base', 'patient', 'x_spouse_Age', 'spouse_Age', '`spouse_Age`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_Age->Sortable = TRUE; // Allow sort
		$this->spouse_Age->DateFilter = "";
		$this->fields['spouse_Age'] = &$this->spouse_Age;

		// spouse_blood_group
		$this->spouse_blood_group = new ReportField('patient_base', 'patient', 'x_spouse_blood_group', 'spouse_blood_group', '`spouse_blood_group`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_blood_group->Sortable = TRUE; // Allow sort
		$this->spouse_blood_group->DateFilter = "";
		$this->fields['spouse_blood_group'] = &$this->spouse_blood_group;

		// spouse_mobile_no
		$this->spouse_mobile_no = new ReportField('patient_base', 'patient', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->spouse_mobile_no->Sortable = TRUE; // Allow sort
		$this->spouse_mobile_no->DateFilter = "";
		$this->fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

		// Maritalstatus
		$this->Maritalstatus = new ReportField('patient_base', 'patient', 'x_Maritalstatus', 'Maritalstatus', '`Maritalstatus`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Maritalstatus->Sortable = TRUE; // Allow sort
		$this->Maritalstatus->DateFilter = "";
		$this->fields['Maritalstatus'] = &$this->Maritalstatus;

		// Business
		$this->_Business = new ReportField('patient_base', 'patient', 'x__Business', 'Business', '`Business`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Business->Sortable = TRUE; // Allow sort
		$this->_Business->DateFilter = "";
		$this->fields['Business'] = &$this->_Business;

		// Patient_Language
		$this->_Patient_Language = new ReportField('patient_base', 'patient', 'x__Patient_Language', 'Patient_Language', '`Patient_Language`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Patient_Language->Sortable = TRUE; // Allow sort
		$this->_Patient_Language->DateFilter = "";
		$this->fields['Patient_Language'] = &$this->_Patient_Language;

		// Passport
		$this->Passport = new ReportField('patient_base', 'patient', 'x_Passport', 'Passport', '`Passport`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Passport->Sortable = TRUE; // Allow sort
		$this->Passport->DateFilter = "";
		$this->fields['Passport'] = &$this->Passport;

		// VisaNo
		$this->VisaNo = new ReportField('patient_base', 'patient', 'x_VisaNo', 'VisaNo', '`VisaNo`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VisaNo->Sortable = TRUE; // Allow sort
		$this->VisaNo->DateFilter = "";
		$this->fields['VisaNo'] = &$this->VisaNo;

		// ValidityOfVisa
		$this->ValidityOfVisa = new ReportField('patient_base', 'patient', 'x_ValidityOfVisa', 'ValidityOfVisa', '`ValidityOfVisa`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ValidityOfVisa->Sortable = TRUE; // Allow sort
		$this->ValidityOfVisa->DateFilter = "";
		$this->fields['ValidityOfVisa'] = &$this->ValidityOfVisa;

		// WhereDidYouHear
		$this->WhereDidYouHear = new ReportField('patient_base', 'patient', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WhereDidYouHear->Sortable = TRUE; // Allow sort
		$this->WhereDidYouHear->DateFilter = "";
		$this->fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

		// PatientID
		$this->PatientID = new ReportField('patient_base', 'patient', 'x_PatientID', 'PatientID', '`PatientID`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->PatientID->DateFilter = "";
		$this->fields['PatientID'] = &$this->PatientID;

		// HospID
		$this->HospID = new ReportField('patient_base', 'patient', 'x_HospID', 'HospID', '`HospID`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DateFilter = "";
		$this->fields['HospID'] = &$this->HospID;

		// street
		$this->street = new ReportField('patient_base', 'patient', 'x_street', 'street', '`street`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->street->Sortable = TRUE; // Allow sort
		$this->street->DateFilter = "";
		$this->fields['street'] = &$this->street;

		// town
		$this->town = new ReportField('patient_base', 'patient', 'x_town', 'town', '`town`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->town->Sortable = TRUE; // Allow sort
		$this->town->DateFilter = "";
		$this->fields['town'] = &$this->town;

		// province
		$this->province = new ReportField('patient_base', 'patient', 'x_province', 'province', '`province`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->province->DateFilter = "";
		$this->fields['province'] = &$this->province;

		// country
		$this->country = new ReportField('patient_base', 'patient', 'x_country', 'country', '`country`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Sortable = TRUE; // Allow sort
		$this->country->DateFilter = "";
		$this->fields['country'] = &$this->country;

		// postal_code
		$this->postal_code = new ReportField('patient_base', 'patient', 'x_postal_code', 'postal_code', '`postal_code`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->postal_code->DateFilter = "";
		$this->fields['postal_code'] = &$this->postal_code;

		// PEmail
		$this->PEmail = new ReportField('patient_base', 'patient', 'x_PEmail', 'PEmail', '`PEmail`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmail->Sortable = TRUE; // Allow sort
		$this->PEmail->DateFilter = "";
		$this->fields['PEmail'] = &$this->PEmail;

		// PEmergencyContact
		$this->PEmergencyContact = new ReportField('patient_base', 'patient', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PEmergencyContact->Sortable = TRUE; // Allow sort
		$this->PEmergencyContact->DateFilter = "";
		$this->fields['PEmergencyContact'] = &$this->PEmergencyContact;

		// BloodGroup
		$this->BloodGroup = new DbChart($this, 'BloodGroup', 'BloodGroup', 'blood_group', 'blood_group', 1101, '', 0, 'COUNT', 600, 500);
		$this->BloodGroup->SortType = 0;
		$this->BloodGroup->SortSequence = "";
		$this->BloodGroup->SqlSelect = "SELECT `blood_group`, '', COUNT(`blood_group`) FROM ";
		$this->BloodGroup->SqlGroupBy = "`blood_group`";
		$this->BloodGroup->SqlOrderBy = "";
		$this->BloodGroup->SeriesDateType = "";
		$this->BloodGroup->ID = "patient_base_BloodGroup"; // Chart ID
		$this->BloodGroup->setParameters([new ChartParameter("type", "1101", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->BloodGroup->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->BloodGroup->setParameters([new ChartParameter("caption", $this->BloodGroup->caption()),
			new ChartParameter("xaxisname", $this->BloodGroup->xAxisName())]); // Chart caption / X axis name
		$this->BloodGroup->setParameter("yaxisname", $this->BloodGroup->yAxisName(), TRUE); // Y axis name
		$this->BloodGroup->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->BloodGroup->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->BloodGroup->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->BloodGroup->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);

		// Nationality
		$this->Nationality = new DbChart($this, 'Nationality', 'Nationality', 'Nationality', 'Nationality', 1003, '', 0, 'COUNT', 600, 500);
		$this->Nationality->SortType = 0;
		$this->Nationality->SortSequence = "";
		$this->Nationality->SqlSelect = "SELECT `Nationality`, '', COUNT(`Nationality`) FROM ";
		$this->Nationality->SqlGroupBy = "`Nationality`";
		$this->Nationality->SqlOrderBy = "";
		$this->Nationality->SeriesDateType = "";
		$this->Nationality->ID = "patient_base_Nationality"; // Chart ID
		$this->Nationality->setParameters([new ChartParameter("type", "1003", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->Nationality->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->Nationality->setParameters([new ChartParameter("caption", $this->Nationality->caption()),
			new ChartParameter("xaxisname", $this->Nationality->xAxisName())]); // Chart caption / X axis name
		$this->Nationality->setParameter("yaxisname", $this->Nationality->yAxisName(), TRUE); // Y axis name
		$this->Nationality->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->Nationality->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->Nationality->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->Nationality->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);

		// Patient Language
		$this->Patient_Language = new DbChart($this, 'Patient_Language', 'Patient Language', 'Patient_Language', 'Patient_Language', 1106, '', 0, 'COUNT', 600, 500);
		$this->Patient_Language->SortType = 0;
		$this->Patient_Language->SortSequence = "";
		$this->Patient_Language->SqlSelect = "SELECT `Patient_Language`, '', COUNT(`Patient_Language`) FROM ";
		$this->Patient_Language->SqlGroupBy = "`Patient_Language`";
		$this->Patient_Language->SqlOrderBy = "";
		$this->Patient_Language->SeriesDateType = "";
		$this->Patient_Language->ID = "patient_base_Patient_Language"; // Chart ID
		$this->Patient_Language->setParameters([new ChartParameter("type", "1106", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->Patient_Language->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->Patient_Language->setParameters([new ChartParameter("caption", $this->Patient_Language->caption()),
			new ChartParameter("xaxisname", $this->Patient_Language->xAxisName())]); // Chart caption / X axis name
		$this->Patient_Language->setParameter("yaxisname", $this->Patient_Language->yAxisName(), TRUE); // Y axis name
		$this->Patient_Language->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->Patient_Language->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->Patient_Language->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->Patient_Language->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);

		// Business
		$this->Business = new DbChart($this, 'Business', 'Business', 'Business', 'Business', 1101, '', 0, 'COUNT', 600, 500);
		$this->Business->SortType = 0;
		$this->Business->SortSequence = "";
		$this->Business->SqlSelect = "SELECT `Business`, '', COUNT(`Business`) FROM ";
		$this->Business->SqlGroupBy = "`Business`";
		$this->Business->SqlOrderBy = "";
		$this->Business->SeriesDateType = "";
		$this->Business->ID = "patient_base_Business"; // Chart ID
		$this->Business->setParameters([new ChartParameter("type", "1101", FALSE),
			new ChartParameter("seriestype", "0", FALSE)]);  // Chart type / Chart series type
		$this->Business->setParameter("bgcolor", "FCFCFC", TRUE); // Background color
		$this->Business->setParameters([new ChartParameter("caption", $this->Business->caption()),
			new ChartParameter("xaxisname", $this->Business->xAxisName())]); // Chart caption / X axis name
		$this->Business->setParameter("yaxisname", $this->Business->yAxisName(), TRUE); // Y axis name
		$this->Business->setParameters([new ChartParameter("shownames", "1"),
			new ChartParameter("showvalues", "1"),
			new ChartParameter("showhovercap", "0")]); // Show names / Show values / Show hover
		$this->Business->setParameter("alpha", "50", FALSE); // Chart alpha
		$this->Business->setParameter("colorpalette", "#FF0000|#FF0080|#FF00FF|#8000FF|#FF8000|#FF3D3D|#7AFFFF|#0000FF|#FFFF00|#FF7A7A|#3DFFFF|#0080FF|#80FF00|#00FF00|#00FF80|#00FFFF", FALSE); // Chart color palette
		$this->Business->setParameters([new ChartParameter("showLimits", "1"),
	new ChartParameter("showDivLineValues", "1"),
	new ChartParameter("yAxisMinValue", "0"),
	new ChartParameter("yAxisMaxValue", "0"),
	new ChartParameter("exportMode", "auto"),
	new ChartParameter("showAlternateVGridColor", "0"),
	]);
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
	}

	// Get Field Visibility
	public function getFieldVisibility($fldparm)
	{
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
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
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql <> "") {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Table level SQL
	private $_sqlFrom = "";
	private $_sqlSelect = "";
	private $_sqlWhere = "";
	private $_sqlGroupBy = "";
	private $_sqlHaving = "";
	private $_sqlOrderBy = "";

	// From
	public function getSqlFrom()
	{
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`patient`";
	}
	public function setSqlFrom($v)
	{
		$this->_sqlFrom = $v;
	}

	// Select
	public function getSqlSelect()
	{
		return ($this->_sqlSelect <> "") ? $this->_sqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelect($v)
	{
		$this->_sqlSelect = $v;
	}

	// Where
	public function getSqlWhere()
	{
		$where = ($this->_sqlWhere <> "") ? $this->_sqlWhere : "";
		$filter = "";
		AddFilter($where, $filter);
		return $where;
	}
	public function setSqlWhere($v)
	{
		$this->_sqlWhere = $v;
	}

	// Group By
	public function getSqlGroupBy()
	{
		return ($this->_sqlGroupBy <> "") ? $this->_sqlGroupBy : "";
	}
	public function setSqlGroupBy($v)
	{
		$this->_sqlGroupBy = $v;
	}

	// Having
	public function getSqlHaving()
	{
		return ($this->_sqlHaving <> "") ? $this->_sqlHaving : "";
	}
	public function setSqlHaving($v)
	{
		$this->_sqlHaving = $v;
	}

	// Order By
	public function getSqlOrderBy()
	{
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "";
	}
	public function setSqlOrderBy($v)
	{
		$this->_sqlOrderBy = $v;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix <> "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix <> "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount <> "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
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

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = '';
		return $rs;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		return "";
	}

	// Lookup data from table
	public function lookup()
	{
		global $Security, $RequestSecurity, $PROJECT_ID, $RELATED_PROJECT_ID;
		$projectId = $RELATED_PROJECT_ID;

		// Check token first
		$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($projectId . $this->TableName);
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
			$Security->loadCurrentUserLevel($projectId . $this->TableName);
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

		// Create lookup object and output JSON
		$lookup = new ReportLookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if (Post("keys") !== NULL) { // Selected records from modal
			$keys = Post("keys");
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
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["class"] = "xxx";

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

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', PROJECT_NAMESPACE . 'GetStartsWithAFilter'); // With function, or
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->Name == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->Name == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->Name == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->Name == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>