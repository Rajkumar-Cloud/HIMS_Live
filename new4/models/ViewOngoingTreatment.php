<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_ongoing_treatment
 */
class ViewOngoingTreatment extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $bid;
    public $bPatientID;
    public $title;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $dob;
    public $bAge;
    public $blood_group;
    public $mobile_no;
    public $description;
    public $IdentificationMark;
    public $Religion;
    public $Nationality;
    public $profilePic;
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
    public $FacebookID;
    public $id;
    public $RIDNO;
    public $Name;
    public $treatment_status;
    public $ARTCYCLE;
    public $RESULT;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $TreatmentStartDate;
    public $TreatementStopDate;
    public $TypePatient;
    public $Treatment;
    public $TreatmentTec;
    public $TypeOfCycle;
    public $SpermOrgin;
    public $State;
    public $Origin;
    public $MACS;
    public $Technique;
    public $PgdPlanning;
    public $IMSI;
    public $SequentialCulture;
    public $TimeLapse;
    public $AH;
    public $Weight;
    public $BMI;
    public $MaleIndications;
    public $FemaleIndications;
    public $UseOfThe;
    public $Ectopic;
    public $Heterotopic;
    public $TransferDFE;
    public $Evolutive;
    public $Number;
    public $SequentialCult;
    public $TineLapse;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $WifeCell;
    public $HusbandCell;
    public $CoupleID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_ongoing_treatment';
        $this->TableName = 'view_ongoing_treatment';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_ongoing_treatment`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // bid
        $this->bid = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_bid', 'bid', '`bid`', '`bid`', 3, 11, -1, false, '`bid`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->bid->IsAutoIncrement = true; // Autoincrement field
        $this->bid->IsPrimaryKey = true; // Primary key field
        $this->bid->Sortable = true; // Allow sort
        $this->bid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->bid->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bid->Param, "CustomMsg");
        $this->Fields['bid'] = &$this->bid;

        // bPatientID
        $this->bPatientID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_bPatientID', 'bPatientID', '`bPatientID`', '`bPatientID`', 200, 45, -1, false, '`bPatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bPatientID->IsPrimaryKey = true; // Primary key field
        $this->bPatientID->Nullable = false; // NOT NULL field
        $this->bPatientID->Required = true; // Required field
        $this->bPatientID->Sortable = true; // Allow sort
        $this->bPatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bPatientID->Param, "CustomMsg");
        $this->Fields['bPatientID'] = &$this->bPatientID;

        // title
        $this->title = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_title', 'title', '`title`', '`title`', 3, 11, -1, false, '`title`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->title->Sortable = true; // Allow sort
        $this->title->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->title->Param, "CustomMsg");
        $this->Fields['title'] = &$this->title;

        // first_name
        $this->first_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 50, -1, false, '`first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->first_name->Sortable = true; // Allow sort
        $this->first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->first_name->Param, "CustomMsg");
        $this->Fields['first_name'] = &$this->first_name;

        // middle_name
        $this->middle_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, 100, -1, false, '`middle_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->middle_name->Sortable = true; // Allow sort
        $this->middle_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->middle_name->Param, "CustomMsg");
        $this->Fields['middle_name'] = &$this->middle_name;

        // last_name
        $this->last_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 50, -1, false, '`last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_name->Sortable = true; // Allow sort
        $this->last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_name->Param, "CustomMsg");
        $this->Fields['last_name'] = &$this->last_name;

        // gender
        $this->gender = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // dob
        $this->dob = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_dob', 'dob', '`dob`', CastDateFieldForLike("`dob`", 0, "DB"), 133, 10, 0, false, '`dob`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->dob->Sortable = true; // Allow sort
        $this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->dob->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dob->Param, "CustomMsg");
        $this->Fields['dob'] = &$this->dob;

        // bAge
        $this->bAge = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_bAge', 'bAge', '`bAge`', '`bAge`', 200, 45, -1, false, '`bAge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->bAge->Sortable = true; // Allow sort
        $this->bAge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->bAge->Param, "CustomMsg");
        $this->Fields['bAge'] = &$this->bAge;

        // blood_group
        $this->blood_group = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_blood_group', 'blood_group', '`blood_group`', '`blood_group`', 200, 45, -1, false, '`blood_group`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->blood_group->Sortable = true; // Allow sort
        $this->blood_group->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->blood_group->Param, "CustomMsg");
        $this->Fields['blood_group'] = &$this->blood_group;

        // mobile_no
        $this->mobile_no = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, 45, -1, false, '`mobile_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_no->Sortable = true; // Allow sort
        $this->mobile_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_no->Param, "CustomMsg");
        $this->Fields['mobile_no'] = &$this->mobile_no;

        // description
        $this->description = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->description->Sortable = true; // Allow sort
        $this->description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->description->Param, "CustomMsg");
        $this->Fields['description'] = &$this->description;

        // IdentificationMark
        $this->IdentificationMark = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, false, '`IdentificationMark`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IdentificationMark->Sortable = true; // Allow sort
        $this->IdentificationMark->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IdentificationMark->Param, "CustomMsg");
        $this->Fields['IdentificationMark'] = &$this->IdentificationMark;

        // Religion
        $this->Religion = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, 45, -1, false, '`Religion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Religion->Sortable = true; // Allow sort
        $this->Religion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Religion->Param, "CustomMsg");
        $this->Fields['Religion'] = &$this->Religion;

        // Nationality
        $this->Nationality = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Nationality', 'Nationality', '`Nationality`', '`Nationality`', 200, 45, -1, false, '`Nationality`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Nationality->Sortable = true; // Allow sort
        $this->Nationality->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Nationality->Param, "CustomMsg");
        $this->Fields['Nationality'] = &$this->Nationality;

        // profilePic
        $this->profilePic = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 200, 100, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // ReferedByDr
        $this->ReferedByDr = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, 45, -1, false, '`ReferedByDr`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferedByDr->Sortable = true; // Allow sort
        $this->ReferedByDr->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferedByDr->Param, "CustomMsg");
        $this->Fields['ReferedByDr'] = &$this->ReferedByDr;

        // ReferClinicname
        $this->ReferClinicname = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, 45, -1, false, '`ReferClinicname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferClinicname->Sortable = true; // Allow sort
        $this->ReferClinicname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferClinicname->Param, "CustomMsg");
        $this->Fields['ReferClinicname'] = &$this->ReferClinicname;

        // ReferCity
        $this->ReferCity = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, 45, -1, false, '`ReferCity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferCity->Sortable = true; // Allow sort
        $this->ReferCity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferCity->Param, "CustomMsg");
        $this->Fields['ReferCity'] = &$this->ReferCity;

        // ReferMobileNo
        $this->ReferMobileNo = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, 45, -1, false, '`ReferMobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferMobileNo->Sortable = true; // Allow sort
        $this->ReferMobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferMobileNo->Param, "CustomMsg");
        $this->Fields['ReferMobileNo'] = &$this->ReferMobileNo;

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, 45, -1, false, '`ReferA4TreatingConsultant`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferA4TreatingConsultant->Sortable = true; // Allow sort
        $this->ReferA4TreatingConsultant->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferA4TreatingConsultant->Param, "CustomMsg");
        $this->Fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

        // PurposreReferredfor
        $this->PurposreReferredfor = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, 45, -1, false, '`PurposreReferredfor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurposreReferredfor->Sortable = true; // Allow sort
        $this->PurposreReferredfor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurposreReferredfor->Param, "CustomMsg");
        $this->Fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

        // spouse_title
        $this->spouse_title = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_title', 'spouse_title', '`spouse_title`', '`spouse_title`', 200, 45, -1, false, '`spouse_title`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_title->Sortable = true; // Allow sort
        $this->spouse_title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_title->Param, "CustomMsg");
        $this->Fields['spouse_title'] = &$this->spouse_title;

        // spouse_first_name
        $this->spouse_first_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_first_name', 'spouse_first_name', '`spouse_first_name`', '`spouse_first_name`', 200, 45, -1, false, '`spouse_first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_first_name->Sortable = true; // Allow sort
        $this->spouse_first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_first_name->Param, "CustomMsg");
        $this->Fields['spouse_first_name'] = &$this->spouse_first_name;

        // spouse_middle_name
        $this->spouse_middle_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_middle_name', 'spouse_middle_name', '`spouse_middle_name`', '`spouse_middle_name`', 200, 45, -1, false, '`spouse_middle_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_middle_name->Sortable = true; // Allow sort
        $this->spouse_middle_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_middle_name->Param, "CustomMsg");
        $this->Fields['spouse_middle_name'] = &$this->spouse_middle_name;

        // spouse_last_name
        $this->spouse_last_name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_last_name', 'spouse_last_name', '`spouse_last_name`', '`spouse_last_name`', 200, 45, -1, false, '`spouse_last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_last_name->Sortable = true; // Allow sort
        $this->spouse_last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_last_name->Param, "CustomMsg");
        $this->Fields['spouse_last_name'] = &$this->spouse_last_name;

        // spouse_gender
        $this->spouse_gender = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_gender', 'spouse_gender', '`spouse_gender`', '`spouse_gender`', 200, 45, -1, false, '`spouse_gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_gender->Sortable = true; // Allow sort
        $this->spouse_gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_gender->Param, "CustomMsg");
        $this->Fields['spouse_gender'] = &$this->spouse_gender;

        // spouse_dob
        $this->spouse_dob = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_dob', 'spouse_dob', '`spouse_dob`', CastDateFieldForLike("`spouse_dob`", 0, "DB"), 133, 10, 0, false, '`spouse_dob`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_dob->Sortable = true; // Allow sort
        $this->spouse_dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->spouse_dob->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_dob->Param, "CustomMsg");
        $this->Fields['spouse_dob'] = &$this->spouse_dob;

        // spouse_Age
        $this->spouse_Age = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_Age', 'spouse_Age', '`spouse_Age`', '`spouse_Age`', 200, 45, -1, false, '`spouse_Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_Age->Sortable = true; // Allow sort
        $this->spouse_Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_Age->Param, "CustomMsg");
        $this->Fields['spouse_Age'] = &$this->spouse_Age;

        // spouse_blood_group
        $this->spouse_blood_group = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_blood_group', 'spouse_blood_group', '`spouse_blood_group`', '`spouse_blood_group`', 200, 45, -1, false, '`spouse_blood_group`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_blood_group->Sortable = true; // Allow sort
        $this->spouse_blood_group->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_blood_group->Param, "CustomMsg");
        $this->Fields['spouse_blood_group'] = &$this->spouse_blood_group;

        // spouse_mobile_no
        $this->spouse_mobile_no = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', '`spouse_mobile_no`', 200, 45, -1, false, '`spouse_mobile_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_mobile_no->Sortable = true; // Allow sort
        $this->spouse_mobile_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_mobile_no->Param, "CustomMsg");
        $this->Fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

        // Maritalstatus
        $this->Maritalstatus = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Maritalstatus', 'Maritalstatus', '`Maritalstatus`', '`Maritalstatus`', 200, 45, -1, false, '`Maritalstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Maritalstatus->Sortable = true; // Allow sort
        $this->Maritalstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Maritalstatus->Param, "CustomMsg");
        $this->Fields['Maritalstatus'] = &$this->Maritalstatus;

        // Business
        $this->Business = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Business', 'Business', '`Business`', '`Business`', 200, 45, -1, false, '`Business`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Business->Sortable = true; // Allow sort
        $this->Business->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Business->Param, "CustomMsg");
        $this->Fields['Business'] = &$this->Business;

        // Patient_Language
        $this->Patient_Language = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Patient_Language', 'Patient_Language', '`Patient_Language`', '`Patient_Language`', 200, 45, -1, false, '`Patient_Language`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Patient_Language->Sortable = true; // Allow sort
        $this->Patient_Language->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Patient_Language->Param, "CustomMsg");
        $this->Fields['Patient_Language'] = &$this->Patient_Language;

        // Passport
        $this->Passport = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Passport', 'Passport', '`Passport`', '`Passport`', 200, 45, -1, false, '`Passport`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Passport->Sortable = true; // Allow sort
        $this->Passport->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Passport->Param, "CustomMsg");
        $this->Fields['Passport'] = &$this->Passport;

        // VisaNo
        $this->VisaNo = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_VisaNo', 'VisaNo', '`VisaNo`', '`VisaNo`', 200, 45, -1, false, '`VisaNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisaNo->Sortable = true; // Allow sort
        $this->VisaNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisaNo->Param, "CustomMsg");
        $this->Fields['VisaNo'] = &$this->VisaNo;

        // ValidityOfVisa
        $this->ValidityOfVisa = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ValidityOfVisa', 'ValidityOfVisa', '`ValidityOfVisa`', '`ValidityOfVisa`', 200, 45, -1, false, '`ValidityOfVisa`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ValidityOfVisa->Sortable = true; // Allow sort
        $this->ValidityOfVisa->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ValidityOfVisa->Param, "CustomMsg");
        $this->Fields['ValidityOfVisa'] = &$this->ValidityOfVisa;

        // WhereDidYouHear
        $this->WhereDidYouHear = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, 45, -1, false, '`WhereDidYouHear`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WhereDidYouHear->Sortable = true; // Allow sort
        $this->WhereDidYouHear->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WhereDidYouHear->Param, "CustomMsg");
        $this->Fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

        // HospID
        $this->HospID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // street
        $this->street = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_street', 'street', '`street`', '`street`', 200, 100, -1, false, '`street`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->street->Sortable = true; // Allow sort
        $this->street->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->street->Param, "CustomMsg");
        $this->Fields['street'] = &$this->street;

        // town
        $this->town = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_town', 'town', '`town`', '`town`', 200, 50, -1, false, '`town`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->town->Sortable = true; // Allow sort
        $this->town->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->town->Param, "CustomMsg");
        $this->Fields['town'] = &$this->town;

        // province
        $this->province = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_province', 'province', '`province`', '`province`', 200, 50, -1, false, '`province`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->province->Sortable = true; // Allow sort
        $this->province->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->province->Param, "CustomMsg");
        $this->Fields['province'] = &$this->province;

        // country
        $this->country = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_country', 'country', '`country`', '`country`', 200, 50, -1, false, '`country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->country->Sortable = true; // Allow sort
        $this->country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->country->Param, "CustomMsg");
        $this->Fields['country'] = &$this->country;

        // postal_code
        $this->postal_code = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 50, -1, false, '`postal_code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postal_code->Sortable = true; // Allow sort
        $this->postal_code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postal_code->Param, "CustomMsg");
        $this->Fields['postal_code'] = &$this->postal_code;

        // PEmail
        $this->PEmail = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PEmail', 'PEmail', '`PEmail`', '`PEmail`', 200, 50, -1, false, '`PEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PEmail->Sortable = true; // Allow sort
        $this->PEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PEmail->Param, "CustomMsg");
        $this->Fields['PEmail'] = &$this->PEmail;

        // PEmergencyContact
        $this->PEmergencyContact = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', '`PEmergencyContact`', 200, 50, -1, false, '`PEmergencyContact`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PEmergencyContact->Sortable = true; // Allow sort
        $this->PEmergencyContact->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PEmergencyContact->Param, "CustomMsg");
        $this->Fields['PEmergencyContact'] = &$this->PEmergencyContact;

        // occupation
        $this->occupation = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_occupation', 'occupation', '`occupation`', '`occupation`', 200, 45, -1, false, '`occupation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->occupation->Sortable = true; // Allow sort
        $this->occupation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->occupation->Param, "CustomMsg");
        $this->Fields['occupation'] = &$this->occupation;

        // spouse_occupation
        $this->spouse_occupation = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_spouse_occupation', 'spouse_occupation', '`spouse_occupation`', '`spouse_occupation`', 200, 45, -1, false, '`spouse_occupation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_occupation->Sortable = true; // Allow sort
        $this->spouse_occupation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_occupation->Param, "CustomMsg");
        $this->Fields['spouse_occupation'] = &$this->spouse_occupation;

        // WhatsApp
        $this->WhatsApp = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_WhatsApp', 'WhatsApp', '`WhatsApp`', '`WhatsApp`', 200, 45, -1, false, '`WhatsApp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WhatsApp->Sortable = true; // Allow sort
        $this->WhatsApp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WhatsApp->Param, "CustomMsg");
        $this->Fields['WhatsApp'] = &$this->WhatsApp;

        // CouppleID
        $this->CouppleID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_CouppleID', 'CouppleID', '`CouppleID`', '`CouppleID`', 3, 11, -1, false, '`CouppleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CouppleID->Sortable = true; // Allow sort
        $this->CouppleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->CouppleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CouppleID->Param, "CustomMsg");
        $this->Fields['CouppleID'] = &$this->CouppleID;

        // MaleID
        $this->MaleID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_MaleID', 'MaleID', '`MaleID`', '`MaleID`', 3, 11, -1, false, '`MaleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleID->Sortable = true; // Allow sort
        $this->MaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->MaleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleID->Param, "CustomMsg");
        $this->Fields['MaleID'] = &$this->MaleID;

        // FemaleID
        $this->FemaleID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_FemaleID', 'FemaleID', '`FemaleID`', '`FemaleID`', 3, 11, -1, false, '`FemaleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FemaleID->Sortable = true; // Allow sort
        $this->FemaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->FemaleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FemaleID->Param, "CustomMsg");
        $this->Fields['FemaleID'] = &$this->FemaleID;

        // GroupID
        $this->GroupID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, 11, -1, false, '`GroupID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GroupID->Sortable = true; // Allow sort
        $this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->GroupID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GroupID->Param, "CustomMsg");
        $this->Fields['GroupID'] = &$this->GroupID;

        // Relationship
        $this->Relationship = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Relationship', 'Relationship', '`Relationship`', '`Relationship`', 200, 45, -1, false, '`Relationship`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Relationship->Sortable = true; // Allow sort
        $this->Relationship->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Relationship->Param, "CustomMsg");
        $this->Fields['Relationship'] = &$this->Relationship;

        // FacebookID
        $this->FacebookID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_FacebookID', 'FacebookID', '`FacebookID`', '`FacebookID`', 200, 45, -1, false, '`FacebookID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FacebookID->Sortable = true; // Allow sort
        $this->FacebookID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FacebookID->Param, "CustomMsg");
        $this->Fields['FacebookID'] = &$this->FacebookID;

        // id
        $this->id = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // RIDNO
        $this->RIDNO = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Name
        $this->Name = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Name->Param, "CustomMsg");
        $this->Fields['Name'] = &$this->Name;

        // treatment_status
        $this->treatment_status = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, 45, -1, false, '`treatment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->treatment_status->Sortable = true; // Allow sort
        $this->treatment_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->treatment_status->Param, "CustomMsg");
        $this->Fields['treatment_status'] = &$this->treatment_status;

        // ARTCYCLE
        $this->ARTCYCLE = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, false, '`ARTCYCLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ARTCYCLE->Sortable = true; // Allow sort
        $this->ARTCYCLE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ARTCYCLE->Param, "CustomMsg");
        $this->Fields['ARTCYCLE'] = &$this->ARTCYCLE;

        // RESULT
        $this->RESULT = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, false, '`RESULT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RESULT->Sortable = true; // Allow sort
        $this->RESULT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RESULT->Param, "CustomMsg");
        $this->Fields['RESULT'] = &$this->RESULT;

        // status
        $this->status = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // TreatmentStartDate
        $this->TreatmentStartDate = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TreatmentStartDate', 'TreatmentStartDate', '`TreatmentStartDate`', CastDateFieldForLike("`TreatmentStartDate`", 0, "DB"), 135, 19, 0, false, '`TreatmentStartDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentStartDate->Sortable = true; // Allow sort
        $this->TreatmentStartDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->TreatmentStartDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TreatmentStartDate->Param, "CustomMsg");
        $this->Fields['TreatmentStartDate'] = &$this->TreatmentStartDate;

        // TreatementStopDate
        $this->TreatementStopDate = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TreatementStopDate', 'TreatementStopDate', '`TreatementStopDate`', CastDateFieldForLike("`TreatementStopDate`", 0, "DB"), 135, 19, 0, false, '`TreatementStopDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatementStopDate->Sortable = true; // Allow sort
        $this->TreatementStopDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->TreatementStopDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TreatementStopDate->Param, "CustomMsg");
        $this->Fields['TreatementStopDate'] = &$this->TreatementStopDate;

        // TypePatient
        $this->TypePatient = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TypePatient', 'TypePatient', '`TypePatient`', '`TypePatient`', 200, 45, -1, false, '`TypePatient`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypePatient->Sortable = true; // Allow sort
        $this->TypePatient->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypePatient->Param, "CustomMsg");
        $this->Fields['TypePatient'] = &$this->TypePatient;

        // Treatment
        $this->Treatment = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Treatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatment->Param, "CustomMsg");
        $this->Fields['Treatment'] = &$this->Treatment;

        // TreatmentTec
        $this->TreatmentTec = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TreatmentTec', 'TreatmentTec', '`TreatmentTec`', '`TreatmentTec`', 200, 45, -1, false, '`TreatmentTec`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentTec->Sortable = true; // Allow sort
        $this->TreatmentTec->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TreatmentTec->Param, "CustomMsg");
        $this->Fields['TreatmentTec'] = &$this->TreatmentTec;

        // TypeOfCycle
        $this->TypeOfCycle = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TypeOfCycle', 'TypeOfCycle', '`TypeOfCycle`', '`TypeOfCycle`', 200, 45, -1, false, '`TypeOfCycle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TypeOfCycle->Sortable = true; // Allow sort
        $this->TypeOfCycle->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TypeOfCycle->Param, "CustomMsg");
        $this->Fields['TypeOfCycle'] = &$this->TypeOfCycle;

        // SpermOrgin
        $this->SpermOrgin = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_SpermOrgin', 'SpermOrgin', '`SpermOrgin`', '`SpermOrgin`', 200, 45, -1, false, '`SpermOrgin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SpermOrgin->Sortable = true; // Allow sort
        $this->SpermOrgin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SpermOrgin->Param, "CustomMsg");
        $this->Fields['SpermOrgin'] = &$this->SpermOrgin;

        // State
        $this->State = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_State', 'State', '`State`', '`State`', 200, 45, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->State->Param, "CustomMsg");
        $this->Fields['State'] = &$this->State;

        // Origin
        $this->Origin = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Origin', 'Origin', '`Origin`', '`Origin`', 200, 45, -1, false, '`Origin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Origin->Sortable = true; // Allow sort
        $this->Origin->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Origin->Param, "CustomMsg");
        $this->Fields['Origin'] = &$this->Origin;

        // MACS
        $this->MACS = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_MACS', 'MACS', '`MACS`', '`MACS`', 200, 45, -1, false, '`MACS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MACS->Sortable = true; // Allow sort
        $this->MACS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MACS->Param, "CustomMsg");
        $this->Fields['MACS'] = &$this->MACS;

        // Technique
        $this->Technique = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Technique', 'Technique', '`Technique`', '`Technique`', 200, 45, -1, false, '`Technique`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Technique->Sortable = true; // Allow sort
        $this->Technique->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Technique->Param, "CustomMsg");
        $this->Fields['Technique'] = &$this->Technique;

        // PgdPlanning
        $this->PgdPlanning = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PgdPlanning', 'PgdPlanning', '`PgdPlanning`', '`PgdPlanning`', 200, 45, -1, false, '`PgdPlanning`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PgdPlanning->Sortable = true; // Allow sort
        $this->PgdPlanning->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PgdPlanning->Param, "CustomMsg");
        $this->Fields['PgdPlanning'] = &$this->PgdPlanning;

        // IMSI
        $this->IMSI = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_IMSI', 'IMSI', '`IMSI`', '`IMSI`', 200, 45, -1, false, '`IMSI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMSI->Sortable = true; // Allow sort
        $this->IMSI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IMSI->Param, "CustomMsg");
        $this->Fields['IMSI'] = &$this->IMSI;

        // SequentialCulture
        $this->SequentialCulture = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_SequentialCulture', 'SequentialCulture', '`SequentialCulture`', '`SequentialCulture`', 200, 45, -1, false, '`SequentialCulture`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SequentialCulture->Sortable = true; // Allow sort
        $this->SequentialCulture->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SequentialCulture->Param, "CustomMsg");
        $this->Fields['SequentialCulture'] = &$this->SequentialCulture;

        // TimeLapse
        $this->TimeLapse = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TimeLapse', 'TimeLapse', '`TimeLapse`', '`TimeLapse`', 200, 45, -1, false, '`TimeLapse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TimeLapse->Sortable = true; // Allow sort
        $this->TimeLapse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TimeLapse->Param, "CustomMsg");
        $this->Fields['TimeLapse'] = &$this->TimeLapse;

        // AH
        $this->AH = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_AH', 'AH', '`AH`', '`AH`', 200, 45, -1, false, '`AH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AH->Sortable = true; // Allow sort
        $this->AH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AH->Param, "CustomMsg");
        $this->Fields['AH'] = &$this->AH;

        // Weight
        $this->Weight = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 200, 45, -1, false, '`Weight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Weight->Sortable = true; // Allow sort
        $this->Weight->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Weight->Param, "CustomMsg");
        $this->Fields['Weight'] = &$this->Weight;

        // BMI
        $this->BMI = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_BMI', 'BMI', '`BMI`', '`BMI`', 200, 45, -1, false, '`BMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BMI->Sortable = true; // Allow sort
        $this->BMI->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BMI->Param, "CustomMsg");
        $this->Fields['BMI'] = &$this->BMI;

        // MaleIndications
        $this->MaleIndications = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_MaleIndications', 'MaleIndications', '`MaleIndications`', '`MaleIndications`', 200, 45, -1, false, '`MaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleIndications->Sortable = true; // Allow sort
        $this->MaleIndications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleIndications->Param, "CustomMsg");
        $this->Fields['MaleIndications'] = &$this->MaleIndications;

        // FemaleIndications
        $this->FemaleIndications = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_FemaleIndications', 'FemaleIndications', '`FemaleIndications`', '`FemaleIndications`', 200, 45, -1, false, '`FemaleIndications`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FemaleIndications->Sortable = true; // Allow sort
        $this->FemaleIndications->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FemaleIndications->Param, "CustomMsg");
        $this->Fields['FemaleIndications'] = &$this->FemaleIndications;

        // UseOfThe
        $this->UseOfThe = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_UseOfThe', 'UseOfThe', '`UseOfThe`', '`UseOfThe`', 200, 45, -1, false, '`UseOfThe`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UseOfThe->Sortable = true; // Allow sort
        $this->UseOfThe->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UseOfThe->Param, "CustomMsg");
        $this->Fields['UseOfThe'] = &$this->UseOfThe;

        // Ectopic
        $this->Ectopic = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 200, 45, -1, false, '`Ectopic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Ectopic->Sortable = true; // Allow sort
        $this->Ectopic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic->Param, "CustomMsg");
        $this->Fields['Ectopic'] = &$this->Ectopic;

        // Heterotopic
        $this->Heterotopic = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Heterotopic', 'Heterotopic', '`Heterotopic`', '`Heterotopic`', 200, 45, -1, false, '`Heterotopic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Heterotopic->Sortable = true; // Allow sort
        $this->Heterotopic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Heterotopic->Param, "CustomMsg");
        $this->Fields['Heterotopic'] = &$this->Heterotopic;

        // TransferDFE
        $this->TransferDFE = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TransferDFE', 'TransferDFE', '`TransferDFE`', '`TransferDFE`', 200, 45, -1, false, '`TransferDFE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransferDFE->Sortable = true; // Allow sort
        $this->TransferDFE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TransferDFE->Param, "CustomMsg");
        $this->Fields['TransferDFE'] = &$this->TransferDFE;

        // Evolutive
        $this->Evolutive = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Evolutive', 'Evolutive', '`Evolutive`', '`Evolutive`', 200, 45, -1, false, '`Evolutive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Evolutive->Sortable = true; // Allow sort
        $this->Evolutive->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Evolutive->Param, "CustomMsg");
        $this->Fields['Evolutive'] = &$this->Evolutive;

        // Number
        $this->Number = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_Number', 'Number', '`Number`', '`Number`', 200, 45, -1, false, '`Number`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Number->Sortable = true; // Allow sort
        $this->Number->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Number->Param, "CustomMsg");
        $this->Fields['Number'] = &$this->Number;

        // SequentialCult
        $this->SequentialCult = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_SequentialCult', 'SequentialCult', '`SequentialCult`', '`SequentialCult`', 200, 45, -1, false, '`SequentialCult`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SequentialCult->Sortable = true; // Allow sort
        $this->SequentialCult->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SequentialCult->Param, "CustomMsg");
        $this->Fields['SequentialCult'] = &$this->SequentialCult;

        // TineLapse
        $this->TineLapse = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_TineLapse', 'TineLapse', '`TineLapse`', '`TineLapse`', 200, 45, -1, false, '`TineLapse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TineLapse->Sortable = true; // Allow sort
        $this->TineLapse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TineLapse->Param, "CustomMsg");
        $this->Fields['TineLapse'] = &$this->TineLapse;

        // PatientName
        $this->PatientName = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->PartnerName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerName->Param, "CustomMsg");
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->PartnerID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerID->Param, "CustomMsg");
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // WifeCell
        $this->WifeCell = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_WifeCell', 'WifeCell', '`WifeCell`', '`WifeCell`', 200, 45, -1, false, '`WifeCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WifeCell->Sortable = true; // Allow sort
        $this->WifeCell->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WifeCell->Param, "CustomMsg");
        $this->Fields['WifeCell'] = &$this->WifeCell;

        // HusbandCell
        $this->HusbandCell = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_HusbandCell', 'HusbandCell', '`HusbandCell`', '`HusbandCell`', 200, 45, -1, false, '`HusbandCell`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HusbandCell->Sortable = true; // Allow sort
        $this->HusbandCell->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HusbandCell->Param, "CustomMsg");
        $this->Fields['HusbandCell'] = &$this->HusbandCell;

        // CoupleID
        $this->CoupleID = new DbField('view_ongoing_treatment', 'view_ongoing_treatment', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->Sortable = true; // Allow sort
        $this->CoupleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CoupleID->Param, "CustomMsg");
        $this->Fields['CoupleID'] = &$this->CoupleID;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
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
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_ongoing_treatment`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
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
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
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
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
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
            case "changepassword":
            case "resetpassword":
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

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
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
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->bid->setDbValue($conn->lastInsertId());
            $rs['bid'] = $this->bid->DbValue;

            // Get insert id if necessary
            $this->id->setDbValue($conn->lastInsertId());
            $rs['id'] = $this->id->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('bid', $rs)) {
                AddFilter($where, QuotedName('bid', $this->Dbid) . '=' . QuotedValue($rs['bid'], $this->bid->DataType, $this->Dbid));
            }
            if (array_key_exists('bPatientID', $rs)) {
                AddFilter($where, QuotedName('bPatientID', $this->Dbid) . '=' . QuotedValue($rs['bPatientID'], $this->bPatientID->DataType, $this->Dbid));
            }
            if (array_key_exists('id', $rs)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->bid->DbValue = $row['bid'];
        $this->bPatientID->DbValue = $row['bPatientID'];
        $this->title->DbValue = $row['title'];
        $this->first_name->DbValue = $row['first_name'];
        $this->middle_name->DbValue = $row['middle_name'];
        $this->last_name->DbValue = $row['last_name'];
        $this->gender->DbValue = $row['gender'];
        $this->dob->DbValue = $row['dob'];
        $this->bAge->DbValue = $row['bAge'];
        $this->blood_group->DbValue = $row['blood_group'];
        $this->mobile_no->DbValue = $row['mobile_no'];
        $this->description->DbValue = $row['description'];
        $this->IdentificationMark->DbValue = $row['IdentificationMark'];
        $this->Religion->DbValue = $row['Religion'];
        $this->Nationality->DbValue = $row['Nationality'];
        $this->profilePic->DbValue = $row['profilePic'];
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
        $this->FacebookID->DbValue = $row['FacebookID'];
        $this->id->DbValue = $row['id'];
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Name->DbValue = $row['Name'];
        $this->treatment_status->DbValue = $row['treatment_status'];
        $this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
        $this->RESULT->DbValue = $row['RESULT'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->TreatmentStartDate->DbValue = $row['TreatmentStartDate'];
        $this->TreatementStopDate->DbValue = $row['TreatementStopDate'];
        $this->TypePatient->DbValue = $row['TypePatient'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->TreatmentTec->DbValue = $row['TreatmentTec'];
        $this->TypeOfCycle->DbValue = $row['TypeOfCycle'];
        $this->SpermOrgin->DbValue = $row['SpermOrgin'];
        $this->State->DbValue = $row['State'];
        $this->Origin->DbValue = $row['Origin'];
        $this->MACS->DbValue = $row['MACS'];
        $this->Technique->DbValue = $row['Technique'];
        $this->PgdPlanning->DbValue = $row['PgdPlanning'];
        $this->IMSI->DbValue = $row['IMSI'];
        $this->SequentialCulture->DbValue = $row['SequentialCulture'];
        $this->TimeLapse->DbValue = $row['TimeLapse'];
        $this->AH->DbValue = $row['AH'];
        $this->Weight->DbValue = $row['Weight'];
        $this->BMI->DbValue = $row['BMI'];
        $this->MaleIndications->DbValue = $row['MaleIndications'];
        $this->FemaleIndications->DbValue = $row['FemaleIndications'];
        $this->UseOfThe->DbValue = $row['UseOfThe'];
        $this->Ectopic->DbValue = $row['Ectopic'];
        $this->Heterotopic->DbValue = $row['Heterotopic'];
        $this->TransferDFE->DbValue = $row['TransferDFE'];
        $this->Evolutive->DbValue = $row['Evolutive'];
        $this->Number->DbValue = $row['Number'];
        $this->SequentialCult->DbValue = $row['SequentialCult'];
        $this->TineLapse->DbValue = $row['TineLapse'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->WifeCell->DbValue = $row['WifeCell'];
        $this->HusbandCell->DbValue = $row['HusbandCell'];
        $this->CoupleID->DbValue = $row['CoupleID'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`bid` = @bid@ AND `bPatientID` = '@bPatientID@' AND `id` = @id@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->bid->CurrentValue : $this->bid->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        $val = $current ? $this->bPatientID->CurrentValue : $this->bPatientID->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 3) {
            if ($current) {
                $this->bid->CurrentValue = $keys[0];
            } else {
                $this->bid->OldValue = $keys[0];
            }
            if ($current) {
                $this->bPatientID->CurrentValue = $keys[1];
            } else {
                $this->bPatientID->OldValue = $keys[1];
            }
            if ($current) {
                $this->id->CurrentValue = $keys[2];
            } else {
                $this->id->OldValue = $keys[2];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('bid', $row) ? $row['bid'] : null;
        } else {
            $val = $this->bid->OldValue !== null ? $this->bid->OldValue : $this->bid->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@bid@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        if (is_array($row)) {
            $val = array_key_exists('bPatientID', $row) ? $row['bPatientID'] : null;
        } else {
            $val = $this->bPatientID->OldValue !== null ? $this->bPatientID->OldValue : $this->bPatientID->CurrentValue;
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@bPatientID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = $this->id->OldValue !== null ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("ViewOngoingTreatmentList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "ViewOngoingTreatmentView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewOngoingTreatmentEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewOngoingTreatmentAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "ViewOngoingTreatmentView";
            case Config("API_ADD_ACTION"):
                return "ViewOngoingTreatmentAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewOngoingTreatmentEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewOngoingTreatmentDelete";
            case Config("API_LIST_ACTION"):
                return "ViewOngoingTreatmentList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewOngoingTreatmentList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewOngoingTreatmentView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewOngoingTreatmentView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewOngoingTreatmentAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewOngoingTreatmentAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewOngoingTreatmentEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewOngoingTreatmentAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewOngoingTreatmentDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "bid:" . JsonEncode($this->bid->CurrentValue, "number");
        $json .= ",bPatientID:" . JsonEncode($this->bPatientID->CurrentValue, "string");
        $json .= ",id:" . JsonEncode($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->bid->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->bid->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($this->bPatientID->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->bPatientID->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
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
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
            for ($i = 0; $i < $cnt; $i++) {
                $arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
            }
        } else {
            if (($keyValue = Param("bid") ?? Route("bid")) !== null) {
                $arKey[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKey[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
            if (($keyValue = Param("bPatientID") ?? Route("bPatientID")) !== null) {
                $arKey[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(1) ?? Route(3)) !== null)) {
                $arKey[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKey[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(2) ?? Route(4)) !== null)) {
                $arKey[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
            if (is_array($arKeys)) {
                $arKeys[] = $arKey;
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_array($key) || count($key) != 3) {
                    continue; // Just skip so other keys will still work
                }
                if (!is_numeric($key[0])) { // bid
                    continue;
                }
                if (!is_numeric($key[2])) { // id
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->bid->CurrentValue = $key[0];
            } else {
                $this->bid->OldValue = $key[0];
            }
            if ($setCurrent) {
                $this->bPatientID->CurrentValue = $key[1];
            } else {
                $this->bPatientID->OldValue = $key[1];
            }
            if ($setCurrent) {
                $this->id->CurrentValue = $key[2];
            } else {
                $this->id->OldValue = $key[2];
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->bid->setDbValue($row['bid']);
        $this->bPatientID->setDbValue($row['bPatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->bAge->setDbValue($row['bAge']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
        $this->FacebookID->setDbValue($row['FacebookID']);
        $this->id->setDbValue($row['id']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
        $this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
        $this->TypePatient->setDbValue($row['TypePatient']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->TreatmentTec->setDbValue($row['TreatmentTec']);
        $this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
        $this->SpermOrgin->setDbValue($row['SpermOrgin']);
        $this->State->setDbValue($row['State']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MACS->setDbValue($row['MACS']);
        $this->Technique->setDbValue($row['Technique']);
        $this->PgdPlanning->setDbValue($row['PgdPlanning']);
        $this->IMSI->setDbValue($row['IMSI']);
        $this->SequentialCulture->setDbValue($row['SequentialCulture']);
        $this->TimeLapse->setDbValue($row['TimeLapse']);
        $this->AH->setDbValue($row['AH']);
        $this->Weight->setDbValue($row['Weight']);
        $this->BMI->setDbValue($row['BMI']);
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->UseOfThe->setDbValue($row['UseOfThe']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Heterotopic->setDbValue($row['Heterotopic']);
        $this->TransferDFE->setDbValue($row['TransferDFE']);
        $this->Evolutive->setDbValue($row['Evolutive']);
        $this->Number->setDbValue($row['Number']);
        $this->SequentialCult->setDbValue($row['SequentialCult']);
        $this->TineLapse->setDbValue($row['TineLapse']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->CoupleID->setDbValue($row['CoupleID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // bid

        // bPatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // bAge

        // blood_group

        // mobile_no

        // description

        // IdentificationMark

        // Religion

        // Nationality

        // profilePic

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

        // FacebookID

        // id

        // RIDNO

        // Name

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TreatmentStartDate

        // TreatementStopDate

        // TypePatient

        // Treatment

        // TreatmentTec

        // TypeOfCycle

        // SpermOrgin

        // State

        // Origin

        // MACS

        // Technique

        // PgdPlanning

        // IMSI

        // SequentialCulture

        // TimeLapse

        // AH

        // Weight

        // BMI

        // MaleIndications

        // FemaleIndications

        // UseOfThe

        // Ectopic

        // Heterotopic

        // TransferDFE

        // Evolutive

        // Number

        // SequentialCult

        // TineLapse

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // WifeCell

        // HusbandCell

        // CoupleID

        // bid
        $this->bid->ViewValue = $this->bid->CurrentValue;
        $this->bid->ViewCustomAttributes = "";

        // bPatientID
        $this->bPatientID->ViewValue = $this->bPatientID->CurrentValue;
        $this->bPatientID->ViewCustomAttributes = "";

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

        // bAge
        $this->bAge->ViewValue = $this->bAge->CurrentValue;
        $this->bAge->ViewCustomAttributes = "";

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

        // FacebookID
        $this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
        $this->FacebookID->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // treatment_status
        $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->ViewCustomAttributes = "";

        // ARTCYCLE
        $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->ViewCustomAttributes = "";

        // RESULT
        $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
        $this->RESULT->ViewCustomAttributes = "";

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

        // TreatmentStartDate
        $this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
        $this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
        $this->TreatmentStartDate->ViewCustomAttributes = "";

        // TreatementStopDate
        $this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
        $this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
        $this->TreatementStopDate->ViewCustomAttributes = "";

        // TypePatient
        $this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
        $this->TypePatient->ViewCustomAttributes = "";

        // Treatment
        $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
        $this->Treatment->ViewCustomAttributes = "";

        // TreatmentTec
        $this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
        $this->TreatmentTec->ViewCustomAttributes = "";

        // TypeOfCycle
        $this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
        $this->TypeOfCycle->ViewCustomAttributes = "";

        // SpermOrgin
        $this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
        $this->SpermOrgin->ViewCustomAttributes = "";

        // State
        $this->State->ViewValue = $this->State->CurrentValue;
        $this->State->ViewCustomAttributes = "";

        // Origin
        $this->Origin->ViewValue = $this->Origin->CurrentValue;
        $this->Origin->ViewCustomAttributes = "";

        // MACS
        $this->MACS->ViewValue = $this->MACS->CurrentValue;
        $this->MACS->ViewCustomAttributes = "";

        // Technique
        $this->Technique->ViewValue = $this->Technique->CurrentValue;
        $this->Technique->ViewCustomAttributes = "";

        // PgdPlanning
        $this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
        $this->PgdPlanning->ViewCustomAttributes = "";

        // IMSI
        $this->IMSI->ViewValue = $this->IMSI->CurrentValue;
        $this->IMSI->ViewCustomAttributes = "";

        // SequentialCulture
        $this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
        $this->SequentialCulture->ViewCustomAttributes = "";

        // TimeLapse
        $this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
        $this->TimeLapse->ViewCustomAttributes = "";

        // AH
        $this->AH->ViewValue = $this->AH->CurrentValue;
        $this->AH->ViewCustomAttributes = "";

        // Weight
        $this->Weight->ViewValue = $this->Weight->CurrentValue;
        $this->Weight->ViewCustomAttributes = "";

        // BMI
        $this->BMI->ViewValue = $this->BMI->CurrentValue;
        $this->BMI->ViewCustomAttributes = "";

        // MaleIndications
        $this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->ViewCustomAttributes = "";

        // FemaleIndications
        $this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->ViewCustomAttributes = "";

        // UseOfThe
        $this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
        $this->UseOfThe->ViewCustomAttributes = "";

        // Ectopic
        $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->ViewCustomAttributes = "";

        // Heterotopic
        $this->Heterotopic->ViewValue = $this->Heterotopic->CurrentValue;
        $this->Heterotopic->ViewCustomAttributes = "";

        // TransferDFE
        $this->TransferDFE->ViewValue = $this->TransferDFE->CurrentValue;
        $this->TransferDFE->ViewCustomAttributes = "";

        // Evolutive
        $this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
        $this->Evolutive->ViewCustomAttributes = "";

        // Number
        $this->Number->ViewValue = $this->Number->CurrentValue;
        $this->Number->ViewCustomAttributes = "";

        // SequentialCult
        $this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
        $this->SequentialCult->ViewCustomAttributes = "";

        // TineLapse
        $this->TineLapse->ViewValue = $this->TineLapse->CurrentValue;
        $this->TineLapse->ViewCustomAttributes = "";

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

        // WifeCell
        $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->ViewCustomAttributes = "";

        // HusbandCell
        $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->ViewCustomAttributes = "";

        // CoupleID
        $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->ViewCustomAttributes = "";

        // bid
        $this->bid->LinkCustomAttributes = "";
        $this->bid->HrefValue = "";
        $this->bid->TooltipValue = "";

        // bPatientID
        $this->bPatientID->LinkCustomAttributes = "";
        $this->bPatientID->HrefValue = "";
        $this->bPatientID->TooltipValue = "";

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

        // bAge
        $this->bAge->LinkCustomAttributes = "";
        $this->bAge->HrefValue = "";
        $this->bAge->TooltipValue = "";

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

        // FacebookID
        $this->FacebookID->LinkCustomAttributes = "";
        $this->FacebookID->HrefValue = "";
        $this->FacebookID->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // treatment_status
        $this->treatment_status->LinkCustomAttributes = "";
        $this->treatment_status->HrefValue = "";
        $this->treatment_status->TooltipValue = "";

        // ARTCYCLE
        $this->ARTCYCLE->LinkCustomAttributes = "";
        $this->ARTCYCLE->HrefValue = "";
        $this->ARTCYCLE->TooltipValue = "";

        // RESULT
        $this->RESULT->LinkCustomAttributes = "";
        $this->RESULT->HrefValue = "";
        $this->RESULT->TooltipValue = "";

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

        // TreatmentStartDate
        $this->TreatmentStartDate->LinkCustomAttributes = "";
        $this->TreatmentStartDate->HrefValue = "";
        $this->TreatmentStartDate->TooltipValue = "";

        // TreatementStopDate
        $this->TreatementStopDate->LinkCustomAttributes = "";
        $this->TreatementStopDate->HrefValue = "";
        $this->TreatementStopDate->TooltipValue = "";

        // TypePatient
        $this->TypePatient->LinkCustomAttributes = "";
        $this->TypePatient->HrefValue = "";
        $this->TypePatient->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // TreatmentTec
        $this->TreatmentTec->LinkCustomAttributes = "";
        $this->TreatmentTec->HrefValue = "";
        $this->TreatmentTec->TooltipValue = "";

        // TypeOfCycle
        $this->TypeOfCycle->LinkCustomAttributes = "";
        $this->TypeOfCycle->HrefValue = "";
        $this->TypeOfCycle->TooltipValue = "";

        // SpermOrgin
        $this->SpermOrgin->LinkCustomAttributes = "";
        $this->SpermOrgin->HrefValue = "";
        $this->SpermOrgin->TooltipValue = "";

        // State
        $this->State->LinkCustomAttributes = "";
        $this->State->HrefValue = "";
        $this->State->TooltipValue = "";

        // Origin
        $this->Origin->LinkCustomAttributes = "";
        $this->Origin->HrefValue = "";
        $this->Origin->TooltipValue = "";

        // MACS
        $this->MACS->LinkCustomAttributes = "";
        $this->MACS->HrefValue = "";
        $this->MACS->TooltipValue = "";

        // Technique
        $this->Technique->LinkCustomAttributes = "";
        $this->Technique->HrefValue = "";
        $this->Technique->TooltipValue = "";

        // PgdPlanning
        $this->PgdPlanning->LinkCustomAttributes = "";
        $this->PgdPlanning->HrefValue = "";
        $this->PgdPlanning->TooltipValue = "";

        // IMSI
        $this->IMSI->LinkCustomAttributes = "";
        $this->IMSI->HrefValue = "";
        $this->IMSI->TooltipValue = "";

        // SequentialCulture
        $this->SequentialCulture->LinkCustomAttributes = "";
        $this->SequentialCulture->HrefValue = "";
        $this->SequentialCulture->TooltipValue = "";

        // TimeLapse
        $this->TimeLapse->LinkCustomAttributes = "";
        $this->TimeLapse->HrefValue = "";
        $this->TimeLapse->TooltipValue = "";

        // AH
        $this->AH->LinkCustomAttributes = "";
        $this->AH->HrefValue = "";
        $this->AH->TooltipValue = "";

        // Weight
        $this->Weight->LinkCustomAttributes = "";
        $this->Weight->HrefValue = "";
        $this->Weight->TooltipValue = "";

        // BMI
        $this->BMI->LinkCustomAttributes = "";
        $this->BMI->HrefValue = "";
        $this->BMI->TooltipValue = "";

        // MaleIndications
        $this->MaleIndications->LinkCustomAttributes = "";
        $this->MaleIndications->HrefValue = "";
        $this->MaleIndications->TooltipValue = "";

        // FemaleIndications
        $this->FemaleIndications->LinkCustomAttributes = "";
        $this->FemaleIndications->HrefValue = "";
        $this->FemaleIndications->TooltipValue = "";

        // UseOfThe
        $this->UseOfThe->LinkCustomAttributes = "";
        $this->UseOfThe->HrefValue = "";
        $this->UseOfThe->TooltipValue = "";

        // Ectopic
        $this->Ectopic->LinkCustomAttributes = "";
        $this->Ectopic->HrefValue = "";
        $this->Ectopic->TooltipValue = "";

        // Heterotopic
        $this->Heterotopic->LinkCustomAttributes = "";
        $this->Heterotopic->HrefValue = "";
        $this->Heterotopic->TooltipValue = "";

        // TransferDFE
        $this->TransferDFE->LinkCustomAttributes = "";
        $this->TransferDFE->HrefValue = "";
        $this->TransferDFE->TooltipValue = "";

        // Evolutive
        $this->Evolutive->LinkCustomAttributes = "";
        $this->Evolutive->HrefValue = "";
        $this->Evolutive->TooltipValue = "";

        // Number
        $this->Number->LinkCustomAttributes = "";
        $this->Number->HrefValue = "";
        $this->Number->TooltipValue = "";

        // SequentialCult
        $this->SequentialCult->LinkCustomAttributes = "";
        $this->SequentialCult->HrefValue = "";
        $this->SequentialCult->TooltipValue = "";

        // TineLapse
        $this->TineLapse->LinkCustomAttributes = "";
        $this->TineLapse->HrefValue = "";
        $this->TineLapse->TooltipValue = "";

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

        // WifeCell
        $this->WifeCell->LinkCustomAttributes = "";
        $this->WifeCell->HrefValue = "";
        $this->WifeCell->TooltipValue = "";

        // HusbandCell
        $this->HusbandCell->LinkCustomAttributes = "";
        $this->HusbandCell->HrefValue = "";
        $this->HusbandCell->TooltipValue = "";

        // CoupleID
        $this->CoupleID->LinkCustomAttributes = "";
        $this->CoupleID->HrefValue = "";
        $this->CoupleID->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // bid
        $this->bid->EditAttrs["class"] = "form-control";
        $this->bid->EditCustomAttributes = "";
        $this->bid->EditValue = $this->bid->CurrentValue;
        $this->bid->ViewCustomAttributes = "";

        // bPatientID
        $this->bPatientID->EditAttrs["class"] = "form-control";
        $this->bPatientID->EditCustomAttributes = "";
        if (!$this->bPatientID->Raw) {
            $this->bPatientID->CurrentValue = HtmlDecode($this->bPatientID->CurrentValue);
        }
        $this->bPatientID->EditValue = $this->bPatientID->CurrentValue;
        $this->bPatientID->PlaceHolder = RemoveHtml($this->bPatientID->caption());

        // title
        $this->title->EditAttrs["class"] = "form-control";
        $this->title->EditCustomAttributes = "";
        $this->title->EditValue = $this->title->CurrentValue;
        $this->title->PlaceHolder = RemoveHtml($this->title->caption());

        // first_name
        $this->first_name->EditAttrs["class"] = "form-control";
        $this->first_name->EditCustomAttributes = "";
        if (!$this->first_name->Raw) {
            $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
        }
        $this->first_name->EditValue = $this->first_name->CurrentValue;
        $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

        // middle_name
        $this->middle_name->EditAttrs["class"] = "form-control";
        $this->middle_name->EditCustomAttributes = "";
        if (!$this->middle_name->Raw) {
            $this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
        }
        $this->middle_name->EditValue = $this->middle_name->CurrentValue;
        $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

        // last_name
        $this->last_name->EditAttrs["class"] = "form-control";
        $this->last_name->EditCustomAttributes = "";
        if (!$this->last_name->Raw) {
            $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
        }
        $this->last_name->EditValue = $this->last_name->CurrentValue;
        $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

        // gender
        $this->gender->EditAttrs["class"] = "form-control";
        $this->gender->EditCustomAttributes = "";
        if (!$this->gender->Raw) {
            $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
        }
        $this->gender->EditValue = $this->gender->CurrentValue;
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // dob
        $this->dob->EditAttrs["class"] = "form-control";
        $this->dob->EditCustomAttributes = "";
        $this->dob->EditValue = FormatDateTime($this->dob->CurrentValue, 8);
        $this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

        // bAge
        $this->bAge->EditAttrs["class"] = "form-control";
        $this->bAge->EditCustomAttributes = "";
        if (!$this->bAge->Raw) {
            $this->bAge->CurrentValue = HtmlDecode($this->bAge->CurrentValue);
        }
        $this->bAge->EditValue = $this->bAge->CurrentValue;
        $this->bAge->PlaceHolder = RemoveHtml($this->bAge->caption());

        // blood_group
        $this->blood_group->EditAttrs["class"] = "form-control";
        $this->blood_group->EditCustomAttributes = "";
        if (!$this->blood_group->Raw) {
            $this->blood_group->CurrentValue = HtmlDecode($this->blood_group->CurrentValue);
        }
        $this->blood_group->EditValue = $this->blood_group->CurrentValue;
        $this->blood_group->PlaceHolder = RemoveHtml($this->blood_group->caption());

        // mobile_no
        $this->mobile_no->EditAttrs["class"] = "form-control";
        $this->mobile_no->EditCustomAttributes = "";
        if (!$this->mobile_no->Raw) {
            $this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
        }
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
        if (!$this->IdentificationMark->Raw) {
            $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
        }
        $this->IdentificationMark->EditValue = $this->IdentificationMark->CurrentValue;
        $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

        // Religion
        $this->Religion->EditAttrs["class"] = "form-control";
        $this->Religion->EditCustomAttributes = "";
        if (!$this->Religion->Raw) {
            $this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
        }
        $this->Religion->EditValue = $this->Religion->CurrentValue;
        $this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

        // Nationality
        $this->Nationality->EditAttrs["class"] = "form-control";
        $this->Nationality->EditCustomAttributes = "";
        if (!$this->Nationality->Raw) {
            $this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
        }
        $this->Nationality->EditValue = $this->Nationality->CurrentValue;
        $this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        if (!$this->profilePic->Raw) {
            $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
        }
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // ReferedByDr
        $this->ReferedByDr->EditAttrs["class"] = "form-control";
        $this->ReferedByDr->EditCustomAttributes = "";
        if (!$this->ReferedByDr->Raw) {
            $this->ReferedByDr->CurrentValue = HtmlDecode($this->ReferedByDr->CurrentValue);
        }
        $this->ReferedByDr->EditValue = $this->ReferedByDr->CurrentValue;
        $this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

        // ReferClinicname
        $this->ReferClinicname->EditAttrs["class"] = "form-control";
        $this->ReferClinicname->EditCustomAttributes = "";
        if (!$this->ReferClinicname->Raw) {
            $this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
        }
        $this->ReferClinicname->EditValue = $this->ReferClinicname->CurrentValue;
        $this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

        // ReferCity
        $this->ReferCity->EditAttrs["class"] = "form-control";
        $this->ReferCity->EditCustomAttributes = "";
        if (!$this->ReferCity->Raw) {
            $this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
        }
        $this->ReferCity->EditValue = $this->ReferCity->CurrentValue;
        $this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

        // ReferMobileNo
        $this->ReferMobileNo->EditAttrs["class"] = "form-control";
        $this->ReferMobileNo->EditCustomAttributes = "";
        if (!$this->ReferMobileNo->Raw) {
            $this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
        }
        $this->ReferMobileNo->EditValue = $this->ReferMobileNo->CurrentValue;
        $this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
        $this->ReferA4TreatingConsultant->EditCustomAttributes = "";
        if (!$this->ReferA4TreatingConsultant->Raw) {
            $this->ReferA4TreatingConsultant->CurrentValue = HtmlDecode($this->ReferA4TreatingConsultant->CurrentValue);
        }
        $this->ReferA4TreatingConsultant->EditValue = $this->ReferA4TreatingConsultant->CurrentValue;
        $this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

        // PurposreReferredfor
        $this->PurposreReferredfor->EditAttrs["class"] = "form-control";
        $this->PurposreReferredfor->EditCustomAttributes = "";
        if (!$this->PurposreReferredfor->Raw) {
            $this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
        }
        $this->PurposreReferredfor->EditValue = $this->PurposreReferredfor->CurrentValue;
        $this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

        // spouse_title
        $this->spouse_title->EditAttrs["class"] = "form-control";
        $this->spouse_title->EditCustomAttributes = "";
        if (!$this->spouse_title->Raw) {
            $this->spouse_title->CurrentValue = HtmlDecode($this->spouse_title->CurrentValue);
        }
        $this->spouse_title->EditValue = $this->spouse_title->CurrentValue;
        $this->spouse_title->PlaceHolder = RemoveHtml($this->spouse_title->caption());

        // spouse_first_name
        $this->spouse_first_name->EditAttrs["class"] = "form-control";
        $this->spouse_first_name->EditCustomAttributes = "";
        if (!$this->spouse_first_name->Raw) {
            $this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
        }
        $this->spouse_first_name->EditValue = $this->spouse_first_name->CurrentValue;
        $this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

        // spouse_middle_name
        $this->spouse_middle_name->EditAttrs["class"] = "form-control";
        $this->spouse_middle_name->EditCustomAttributes = "";
        if (!$this->spouse_middle_name->Raw) {
            $this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
        }
        $this->spouse_middle_name->EditValue = $this->spouse_middle_name->CurrentValue;
        $this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

        // spouse_last_name
        $this->spouse_last_name->EditAttrs["class"] = "form-control";
        $this->spouse_last_name->EditCustomAttributes = "";
        if (!$this->spouse_last_name->Raw) {
            $this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
        }
        $this->spouse_last_name->EditValue = $this->spouse_last_name->CurrentValue;
        $this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

        // spouse_gender
        $this->spouse_gender->EditAttrs["class"] = "form-control";
        $this->spouse_gender->EditCustomAttributes = "";
        if (!$this->spouse_gender->Raw) {
            $this->spouse_gender->CurrentValue = HtmlDecode($this->spouse_gender->CurrentValue);
        }
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
        if (!$this->spouse_Age->Raw) {
            $this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
        }
        $this->spouse_Age->EditValue = $this->spouse_Age->CurrentValue;
        $this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

        // spouse_blood_group
        $this->spouse_blood_group->EditAttrs["class"] = "form-control";
        $this->spouse_blood_group->EditCustomAttributes = "";
        if (!$this->spouse_blood_group->Raw) {
            $this->spouse_blood_group->CurrentValue = HtmlDecode($this->spouse_blood_group->CurrentValue);
        }
        $this->spouse_blood_group->EditValue = $this->spouse_blood_group->CurrentValue;
        $this->spouse_blood_group->PlaceHolder = RemoveHtml($this->spouse_blood_group->caption());

        // spouse_mobile_no
        $this->spouse_mobile_no->EditAttrs["class"] = "form-control";
        $this->spouse_mobile_no->EditCustomAttributes = "";
        if (!$this->spouse_mobile_no->Raw) {
            $this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
        }
        $this->spouse_mobile_no->EditValue = $this->spouse_mobile_no->CurrentValue;
        $this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

        // Maritalstatus
        $this->Maritalstatus->EditAttrs["class"] = "form-control";
        $this->Maritalstatus->EditCustomAttributes = "";
        if (!$this->Maritalstatus->Raw) {
            $this->Maritalstatus->CurrentValue = HtmlDecode($this->Maritalstatus->CurrentValue);
        }
        $this->Maritalstatus->EditValue = $this->Maritalstatus->CurrentValue;
        $this->Maritalstatus->PlaceHolder = RemoveHtml($this->Maritalstatus->caption());

        // Business
        $this->Business->EditAttrs["class"] = "form-control";
        $this->Business->EditCustomAttributes = "";
        if (!$this->Business->Raw) {
            $this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
        }
        $this->Business->EditValue = $this->Business->CurrentValue;
        $this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

        // Patient_Language
        $this->Patient_Language->EditAttrs["class"] = "form-control";
        $this->Patient_Language->EditCustomAttributes = "";
        if (!$this->Patient_Language->Raw) {
            $this->Patient_Language->CurrentValue = HtmlDecode($this->Patient_Language->CurrentValue);
        }
        $this->Patient_Language->EditValue = $this->Patient_Language->CurrentValue;
        $this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

        // Passport
        $this->Passport->EditAttrs["class"] = "form-control";
        $this->Passport->EditCustomAttributes = "";
        if (!$this->Passport->Raw) {
            $this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
        }
        $this->Passport->EditValue = $this->Passport->CurrentValue;
        $this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

        // VisaNo
        $this->VisaNo->EditAttrs["class"] = "form-control";
        $this->VisaNo->EditCustomAttributes = "";
        if (!$this->VisaNo->Raw) {
            $this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
        }
        $this->VisaNo->EditValue = $this->VisaNo->CurrentValue;
        $this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

        // ValidityOfVisa
        $this->ValidityOfVisa->EditAttrs["class"] = "form-control";
        $this->ValidityOfVisa->EditCustomAttributes = "";
        if (!$this->ValidityOfVisa->Raw) {
            $this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
        }
        $this->ValidityOfVisa->EditValue = $this->ValidityOfVisa->CurrentValue;
        $this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

        // WhereDidYouHear
        $this->WhereDidYouHear->EditAttrs["class"] = "form-control";
        $this->WhereDidYouHear->EditCustomAttributes = "";
        if (!$this->WhereDidYouHear->Raw) {
            $this->WhereDidYouHear->CurrentValue = HtmlDecode($this->WhereDidYouHear->CurrentValue);
        }
        $this->WhereDidYouHear->EditValue = $this->WhereDidYouHear->CurrentValue;
        $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        if (!$this->HospID->Raw) {
            $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
        }
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // street
        $this->street->EditAttrs["class"] = "form-control";
        $this->street->EditCustomAttributes = "";
        if (!$this->street->Raw) {
            $this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
        }
        $this->street->EditValue = $this->street->CurrentValue;
        $this->street->PlaceHolder = RemoveHtml($this->street->caption());

        // town
        $this->town->EditAttrs["class"] = "form-control";
        $this->town->EditCustomAttributes = "";
        if (!$this->town->Raw) {
            $this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
        }
        $this->town->EditValue = $this->town->CurrentValue;
        $this->town->PlaceHolder = RemoveHtml($this->town->caption());

        // province
        $this->province->EditAttrs["class"] = "form-control";
        $this->province->EditCustomAttributes = "";
        if (!$this->province->Raw) {
            $this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
        }
        $this->province->EditValue = $this->province->CurrentValue;
        $this->province->PlaceHolder = RemoveHtml($this->province->caption());

        // country
        $this->country->EditAttrs["class"] = "form-control";
        $this->country->EditCustomAttributes = "";
        if (!$this->country->Raw) {
            $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
        }
        $this->country->EditValue = $this->country->CurrentValue;
        $this->country->PlaceHolder = RemoveHtml($this->country->caption());

        // postal_code
        $this->postal_code->EditAttrs["class"] = "form-control";
        $this->postal_code->EditCustomAttributes = "";
        if (!$this->postal_code->Raw) {
            $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
        }
        $this->postal_code->EditValue = $this->postal_code->CurrentValue;
        $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

        // PEmail
        $this->PEmail->EditAttrs["class"] = "form-control";
        $this->PEmail->EditCustomAttributes = "";
        if (!$this->PEmail->Raw) {
            $this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
        }
        $this->PEmail->EditValue = $this->PEmail->CurrentValue;
        $this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

        // PEmergencyContact
        $this->PEmergencyContact->EditAttrs["class"] = "form-control";
        $this->PEmergencyContact->EditCustomAttributes = "";
        if (!$this->PEmergencyContact->Raw) {
            $this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
        }
        $this->PEmergencyContact->EditValue = $this->PEmergencyContact->CurrentValue;
        $this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

        // occupation
        $this->occupation->EditAttrs["class"] = "form-control";
        $this->occupation->EditCustomAttributes = "";
        if (!$this->occupation->Raw) {
            $this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
        }
        $this->occupation->EditValue = $this->occupation->CurrentValue;
        $this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

        // spouse_occupation
        $this->spouse_occupation->EditAttrs["class"] = "form-control";
        $this->spouse_occupation->EditCustomAttributes = "";
        if (!$this->spouse_occupation->Raw) {
            $this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
        }
        $this->spouse_occupation->EditValue = $this->spouse_occupation->CurrentValue;
        $this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

        // WhatsApp
        $this->WhatsApp->EditAttrs["class"] = "form-control";
        $this->WhatsApp->EditCustomAttributes = "";
        if (!$this->WhatsApp->Raw) {
            $this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
        }
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
        if (!$this->Relationship->Raw) {
            $this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
        }
        $this->Relationship->EditValue = $this->Relationship->CurrentValue;
        $this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

        // FacebookID
        $this->FacebookID->EditAttrs["class"] = "form-control";
        $this->FacebookID->EditCustomAttributes = "";
        if (!$this->FacebookID->Raw) {
            $this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
        }
        $this->FacebookID->EditValue = $this->FacebookID->CurrentValue;
        $this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

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

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // treatment_status
        $this->treatment_status->EditAttrs["class"] = "form-control";
        $this->treatment_status->EditCustomAttributes = "";
        if (!$this->treatment_status->Raw) {
            $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
        }
        $this->treatment_status->EditValue = $this->treatment_status->CurrentValue;
        $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

        // ARTCYCLE
        $this->ARTCYCLE->EditAttrs["class"] = "form-control";
        $this->ARTCYCLE->EditCustomAttributes = "";
        if (!$this->ARTCYCLE->Raw) {
            $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
        }
        $this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
        $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

        // RESULT
        $this->RESULT->EditAttrs["class"] = "form-control";
        $this->RESULT->EditCustomAttributes = "";
        if (!$this->RESULT->Raw) {
            $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
        }
        $this->RESULT->EditValue = $this->RESULT->CurrentValue;
        $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

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

        // TreatmentStartDate
        $this->TreatmentStartDate->EditAttrs["class"] = "form-control";
        $this->TreatmentStartDate->EditCustomAttributes = "";
        $this->TreatmentStartDate->EditValue = FormatDateTime($this->TreatmentStartDate->CurrentValue, 8);
        $this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

        // TreatementStopDate
        $this->TreatementStopDate->EditAttrs["class"] = "form-control";
        $this->TreatementStopDate->EditCustomAttributes = "";
        $this->TreatementStopDate->EditValue = FormatDateTime($this->TreatementStopDate->CurrentValue, 8);
        $this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

        // TypePatient
        $this->TypePatient->EditAttrs["class"] = "form-control";
        $this->TypePatient->EditCustomAttributes = "";
        if (!$this->TypePatient->Raw) {
            $this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
        }
        $this->TypePatient->EditValue = $this->TypePatient->CurrentValue;
        $this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        if (!$this->Treatment->Raw) {
            $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
        }
        $this->Treatment->EditValue = $this->Treatment->CurrentValue;
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // TreatmentTec
        $this->TreatmentTec->EditAttrs["class"] = "form-control";
        $this->TreatmentTec->EditCustomAttributes = "";
        if (!$this->TreatmentTec->Raw) {
            $this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
        }
        $this->TreatmentTec->EditValue = $this->TreatmentTec->CurrentValue;
        $this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

        // TypeOfCycle
        $this->TypeOfCycle->EditAttrs["class"] = "form-control";
        $this->TypeOfCycle->EditCustomAttributes = "";
        if (!$this->TypeOfCycle->Raw) {
            $this->TypeOfCycle->CurrentValue = HtmlDecode($this->TypeOfCycle->CurrentValue);
        }
        $this->TypeOfCycle->EditValue = $this->TypeOfCycle->CurrentValue;
        $this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

        // SpermOrgin
        $this->SpermOrgin->EditAttrs["class"] = "form-control";
        $this->SpermOrgin->EditCustomAttributes = "";
        if (!$this->SpermOrgin->Raw) {
            $this->SpermOrgin->CurrentValue = HtmlDecode($this->SpermOrgin->CurrentValue);
        }
        $this->SpermOrgin->EditValue = $this->SpermOrgin->CurrentValue;
        $this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

        // State
        $this->State->EditAttrs["class"] = "form-control";
        $this->State->EditCustomAttributes = "";
        if (!$this->State->Raw) {
            $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
        }
        $this->State->EditValue = $this->State->CurrentValue;
        $this->State->PlaceHolder = RemoveHtml($this->State->caption());

        // Origin
        $this->Origin->EditAttrs["class"] = "form-control";
        $this->Origin->EditCustomAttributes = "";
        if (!$this->Origin->Raw) {
            $this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
        }
        $this->Origin->EditValue = $this->Origin->CurrentValue;
        $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

        // MACS
        $this->MACS->EditAttrs["class"] = "form-control";
        $this->MACS->EditCustomAttributes = "";
        if (!$this->MACS->Raw) {
            $this->MACS->CurrentValue = HtmlDecode($this->MACS->CurrentValue);
        }
        $this->MACS->EditValue = $this->MACS->CurrentValue;
        $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

        // Technique
        $this->Technique->EditAttrs["class"] = "form-control";
        $this->Technique->EditCustomAttributes = "";
        if (!$this->Technique->Raw) {
            $this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
        }
        $this->Technique->EditValue = $this->Technique->CurrentValue;
        $this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

        // PgdPlanning
        $this->PgdPlanning->EditAttrs["class"] = "form-control";
        $this->PgdPlanning->EditCustomAttributes = "";
        if (!$this->PgdPlanning->Raw) {
            $this->PgdPlanning->CurrentValue = HtmlDecode($this->PgdPlanning->CurrentValue);
        }
        $this->PgdPlanning->EditValue = $this->PgdPlanning->CurrentValue;
        $this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

        // IMSI
        $this->IMSI->EditAttrs["class"] = "form-control";
        $this->IMSI->EditCustomAttributes = "";
        if (!$this->IMSI->Raw) {
            $this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
        }
        $this->IMSI->EditValue = $this->IMSI->CurrentValue;
        $this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

        // SequentialCulture
        $this->SequentialCulture->EditAttrs["class"] = "form-control";
        $this->SequentialCulture->EditCustomAttributes = "";
        if (!$this->SequentialCulture->Raw) {
            $this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
        }
        $this->SequentialCulture->EditValue = $this->SequentialCulture->CurrentValue;
        $this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

        // TimeLapse
        $this->TimeLapse->EditAttrs["class"] = "form-control";
        $this->TimeLapse->EditCustomAttributes = "";
        if (!$this->TimeLapse->Raw) {
            $this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
        }
        $this->TimeLapse->EditValue = $this->TimeLapse->CurrentValue;
        $this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

        // AH
        $this->AH->EditAttrs["class"] = "form-control";
        $this->AH->EditCustomAttributes = "";
        if (!$this->AH->Raw) {
            $this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
        }
        $this->AH->EditValue = $this->AH->CurrentValue;
        $this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

        // Weight
        $this->Weight->EditAttrs["class"] = "form-control";
        $this->Weight->EditCustomAttributes = "";
        if (!$this->Weight->Raw) {
            $this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
        }
        $this->Weight->EditValue = $this->Weight->CurrentValue;
        $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

        // BMI
        $this->BMI->EditAttrs["class"] = "form-control";
        $this->BMI->EditCustomAttributes = "";
        if (!$this->BMI->Raw) {
            $this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
        }
        $this->BMI->EditValue = $this->BMI->CurrentValue;
        $this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

        // MaleIndications
        $this->MaleIndications->EditAttrs["class"] = "form-control";
        $this->MaleIndications->EditCustomAttributes = "";
        if (!$this->MaleIndications->Raw) {
            $this->MaleIndications->CurrentValue = HtmlDecode($this->MaleIndications->CurrentValue);
        }
        $this->MaleIndications->EditValue = $this->MaleIndications->CurrentValue;
        $this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

        // FemaleIndications
        $this->FemaleIndications->EditAttrs["class"] = "form-control";
        $this->FemaleIndications->EditCustomAttributes = "";
        if (!$this->FemaleIndications->Raw) {
            $this->FemaleIndications->CurrentValue = HtmlDecode($this->FemaleIndications->CurrentValue);
        }
        $this->FemaleIndications->EditValue = $this->FemaleIndications->CurrentValue;
        $this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

        // UseOfThe
        $this->UseOfThe->EditAttrs["class"] = "form-control";
        $this->UseOfThe->EditCustomAttributes = "";
        if (!$this->UseOfThe->Raw) {
            $this->UseOfThe->CurrentValue = HtmlDecode($this->UseOfThe->CurrentValue);
        }
        $this->UseOfThe->EditValue = $this->UseOfThe->CurrentValue;
        $this->UseOfThe->PlaceHolder = RemoveHtml($this->UseOfThe->caption());

        // Ectopic
        $this->Ectopic->EditAttrs["class"] = "form-control";
        $this->Ectopic->EditCustomAttributes = "";
        if (!$this->Ectopic->Raw) {
            $this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
        }
        $this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

        // Heterotopic
        $this->Heterotopic->EditAttrs["class"] = "form-control";
        $this->Heterotopic->EditCustomAttributes = "";
        if (!$this->Heterotopic->Raw) {
            $this->Heterotopic->CurrentValue = HtmlDecode($this->Heterotopic->CurrentValue);
        }
        $this->Heterotopic->EditValue = $this->Heterotopic->CurrentValue;
        $this->Heterotopic->PlaceHolder = RemoveHtml($this->Heterotopic->caption());

        // TransferDFE
        $this->TransferDFE->EditAttrs["class"] = "form-control";
        $this->TransferDFE->EditCustomAttributes = "";
        if (!$this->TransferDFE->Raw) {
            $this->TransferDFE->CurrentValue = HtmlDecode($this->TransferDFE->CurrentValue);
        }
        $this->TransferDFE->EditValue = $this->TransferDFE->CurrentValue;
        $this->TransferDFE->PlaceHolder = RemoveHtml($this->TransferDFE->caption());

        // Evolutive
        $this->Evolutive->EditAttrs["class"] = "form-control";
        $this->Evolutive->EditCustomAttributes = "";
        if (!$this->Evolutive->Raw) {
            $this->Evolutive->CurrentValue = HtmlDecode($this->Evolutive->CurrentValue);
        }
        $this->Evolutive->EditValue = $this->Evolutive->CurrentValue;
        $this->Evolutive->PlaceHolder = RemoveHtml($this->Evolutive->caption());

        // Number
        $this->Number->EditAttrs["class"] = "form-control";
        $this->Number->EditCustomAttributes = "";
        if (!$this->Number->Raw) {
            $this->Number->CurrentValue = HtmlDecode($this->Number->CurrentValue);
        }
        $this->Number->EditValue = $this->Number->CurrentValue;
        $this->Number->PlaceHolder = RemoveHtml($this->Number->caption());

        // SequentialCult
        $this->SequentialCult->EditAttrs["class"] = "form-control";
        $this->SequentialCult->EditCustomAttributes = "";
        if (!$this->SequentialCult->Raw) {
            $this->SequentialCult->CurrentValue = HtmlDecode($this->SequentialCult->CurrentValue);
        }
        $this->SequentialCult->EditValue = $this->SequentialCult->CurrentValue;
        $this->SequentialCult->PlaceHolder = RemoveHtml($this->SequentialCult->caption());

        // TineLapse
        $this->TineLapse->EditAttrs["class"] = "form-control";
        $this->TineLapse->EditCustomAttributes = "";
        if (!$this->TineLapse->Raw) {
            $this->TineLapse->CurrentValue = HtmlDecode($this->TineLapse->CurrentValue);
        }
        $this->TineLapse->EditValue = $this->TineLapse->CurrentValue;
        $this->TineLapse->PlaceHolder = RemoveHtml($this->TineLapse->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PartnerID
        $this->PartnerID->EditAttrs["class"] = "form-control";
        $this->PartnerID->EditCustomAttributes = "";
        if (!$this->PartnerID->Raw) {
            $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
        }
        $this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

        // WifeCell
        $this->WifeCell->EditAttrs["class"] = "form-control";
        $this->WifeCell->EditCustomAttributes = "";
        if (!$this->WifeCell->Raw) {
            $this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
        }
        $this->WifeCell->EditValue = $this->WifeCell->CurrentValue;
        $this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

        // HusbandCell
        $this->HusbandCell->EditAttrs["class"] = "form-control";
        $this->HusbandCell->EditCustomAttributes = "";
        if (!$this->HusbandCell->Raw) {
            $this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
        }
        $this->HusbandCell->EditValue = $this->HusbandCell->CurrentValue;
        $this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

        // CoupleID
        $this->CoupleID->EditAttrs["class"] = "form-control";
        $this->CoupleID->EditCustomAttributes = "";
        if (!$this->CoupleID->Raw) {
            $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
        }
        $this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->bid);
                    $doc->exportCaption($this->bPatientID);
                    $doc->exportCaption($this->title);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->middle_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->dob);
                    $doc->exportCaption($this->bAge);
                    $doc->exportCaption($this->blood_group);
                    $doc->exportCaption($this->mobile_no);
                    $doc->exportCaption($this->description);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->Religion);
                    $doc->exportCaption($this->Nationality);
                    $doc->exportCaption($this->profilePic);
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
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TreatmentStartDate);
                    $doc->exportCaption($this->TreatementStopDate);
                    $doc->exportCaption($this->TypePatient);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->TreatmentTec);
                    $doc->exportCaption($this->TypeOfCycle);
                    $doc->exportCaption($this->SpermOrgin);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MACS);
                    $doc->exportCaption($this->Technique);
                    $doc->exportCaption($this->PgdPlanning);
                    $doc->exportCaption($this->IMSI);
                    $doc->exportCaption($this->SequentialCulture);
                    $doc->exportCaption($this->TimeLapse);
                    $doc->exportCaption($this->AH);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->BMI);
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->UseOfThe);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Heterotopic);
                    $doc->exportCaption($this->TransferDFE);
                    $doc->exportCaption($this->Evolutive);
                    $doc->exportCaption($this->Number);
                    $doc->exportCaption($this->SequentialCult);
                    $doc->exportCaption($this->TineLapse);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->CoupleID);
                } else {
                    $doc->exportCaption($this->bid);
                    $doc->exportCaption($this->bPatientID);
                    $doc->exportCaption($this->title);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->middle_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->dob);
                    $doc->exportCaption($this->bAge);
                    $doc->exportCaption($this->blood_group);
                    $doc->exportCaption($this->mobile_no);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->Religion);
                    $doc->exportCaption($this->Nationality);
                    $doc->exportCaption($this->profilePic);
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
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->treatment_status);
                    $doc->exportCaption($this->ARTCYCLE);
                    $doc->exportCaption($this->RESULT);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TreatmentStartDate);
                    $doc->exportCaption($this->TreatementStopDate);
                    $doc->exportCaption($this->TypePatient);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->TreatmentTec);
                    $doc->exportCaption($this->TypeOfCycle);
                    $doc->exportCaption($this->SpermOrgin);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Origin);
                    $doc->exportCaption($this->MACS);
                    $doc->exportCaption($this->Technique);
                    $doc->exportCaption($this->PgdPlanning);
                    $doc->exportCaption($this->IMSI);
                    $doc->exportCaption($this->SequentialCulture);
                    $doc->exportCaption($this->TimeLapse);
                    $doc->exportCaption($this->AH);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->BMI);
                    $doc->exportCaption($this->MaleIndications);
                    $doc->exportCaption($this->FemaleIndications);
                    $doc->exportCaption($this->UseOfThe);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->Heterotopic);
                    $doc->exportCaption($this->TransferDFE);
                    $doc->exportCaption($this->Evolutive);
                    $doc->exportCaption($this->Number);
                    $doc->exportCaption($this->SequentialCult);
                    $doc->exportCaption($this->TineLapse);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->WifeCell);
                    $doc->exportCaption($this->HusbandCell);
                    $doc->exportCaption($this->CoupleID);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->bid);
                        $doc->exportField($this->bPatientID);
                        $doc->exportField($this->title);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->middle_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->dob);
                        $doc->exportField($this->bAge);
                        $doc->exportField($this->blood_group);
                        $doc->exportField($this->mobile_no);
                        $doc->exportField($this->description);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->Religion);
                        $doc->exportField($this->Nationality);
                        $doc->exportField($this->profilePic);
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
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TreatmentStartDate);
                        $doc->exportField($this->TreatementStopDate);
                        $doc->exportField($this->TypePatient);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->TreatmentTec);
                        $doc->exportField($this->TypeOfCycle);
                        $doc->exportField($this->SpermOrgin);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MACS);
                        $doc->exportField($this->Technique);
                        $doc->exportField($this->PgdPlanning);
                        $doc->exportField($this->IMSI);
                        $doc->exportField($this->SequentialCulture);
                        $doc->exportField($this->TimeLapse);
                        $doc->exportField($this->AH);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->BMI);
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->UseOfThe);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Heterotopic);
                        $doc->exportField($this->TransferDFE);
                        $doc->exportField($this->Evolutive);
                        $doc->exportField($this->Number);
                        $doc->exportField($this->SequentialCult);
                        $doc->exportField($this->TineLapse);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->CoupleID);
                    } else {
                        $doc->exportField($this->bid);
                        $doc->exportField($this->bPatientID);
                        $doc->exportField($this->title);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->middle_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->dob);
                        $doc->exportField($this->bAge);
                        $doc->exportField($this->blood_group);
                        $doc->exportField($this->mobile_no);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->Religion);
                        $doc->exportField($this->Nationality);
                        $doc->exportField($this->profilePic);
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
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->treatment_status);
                        $doc->exportField($this->ARTCYCLE);
                        $doc->exportField($this->RESULT);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TreatmentStartDate);
                        $doc->exportField($this->TreatementStopDate);
                        $doc->exportField($this->TypePatient);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->TreatmentTec);
                        $doc->exportField($this->TypeOfCycle);
                        $doc->exportField($this->SpermOrgin);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Origin);
                        $doc->exportField($this->MACS);
                        $doc->exportField($this->Technique);
                        $doc->exportField($this->PgdPlanning);
                        $doc->exportField($this->IMSI);
                        $doc->exportField($this->SequentialCulture);
                        $doc->exportField($this->TimeLapse);
                        $doc->exportField($this->AH);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->BMI);
                        $doc->exportField($this->MaleIndications);
                        $doc->exportField($this->FemaleIndications);
                        $doc->exportField($this->UseOfThe);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->Heterotopic);
                        $doc->exportField($this->TransferDFE);
                        $doc->exportField($this->Evolutive);
                        $doc->exportField($this->Number);
                        $doc->exportField($this->SequentialCult);
                        $doc->exportField($this->TineLapse);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->WifeCell);
                        $doc->exportField($this->HusbandCell);
                        $doc->exportField($this->CoupleID);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
