<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient
 */
class Patient extends DbTable
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
    public $profilePicImage;
    public $Clients;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient';
        $this->TableName = 'patient';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient`";
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

        // id
        $this->id = new DbField('patient', 'patient', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatientID
        $this->PatientID = new DbField('patient', 'patient', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Nullable = false; // NOT NULL field
        $this->PatientID->Required = true; // Required field
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // title
        $this->title = new DbField('patient', 'patient', 'x_title', 'title', '`title`', '`title`', 3, 11, -1, false, '`title`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->title->Required = true; // Required field
        $this->title->Sortable = true; // Allow sort
        $this->title->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->title->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->title->Lookup = new Lookup('title', 'sys_tittle', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->title->Param, "CustomMsg");
        $this->Fields['title'] = &$this->title;

        // first_name
        $this->first_name = new DbField('patient', 'patient', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 50, -1, false, '`first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->first_name->Required = true; // Required field
        $this->first_name->Sortable = true; // Allow sort
        $this->first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->first_name->Param, "CustomMsg");
        $this->Fields['first_name'] = &$this->first_name;

        // middle_name
        $this->middle_name = new DbField('patient', 'patient', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, 100, -1, false, '`middle_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->middle_name->Sortable = false; // Allow sort
        $this->middle_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->middle_name->Param, "CustomMsg");
        $this->Fields['middle_name'] = &$this->middle_name;

        // last_name
        $this->last_name = new DbField('patient', 'patient', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 50, -1, false, '`last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_name->Sortable = false; // Allow sort
        $this->last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_name->Param, "CustomMsg");
        $this->Fields['last_name'] = &$this->last_name;

        // gender
        $this->gender = new DbField('patient', 'patient', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->gender->Lookup = new Lookup('gender', 'sys_gender', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // dob
        $this->dob = new DbField('patient', 'patient', 'x_dob', 'dob', '`dob`', CastDateFieldForLike("`dob`", 7, "DB"), 133, 10, 7, false, '`dob`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->dob->Required = true; // Required field
        $this->dob->Sortable = false; // Allow sort
        $this->dob->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->dob->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->dob->Param, "CustomMsg");
        $this->Fields['dob'] = &$this->dob;

        // Age
        $this->Age = new DbField('patient', 'patient', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = false; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // blood_group
        $this->blood_group = new DbField('patient', 'patient', 'x_blood_group', 'blood_group', '`blood_group`', '`blood_group`', 200, 45, -1, false, '`blood_group`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->blood_group->Sortable = true; // Allow sort
        $this->blood_group->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->blood_group->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->blood_group->Lookup = new Lookup('blood_group', 'mas_bloodgroup', false, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
        $this->blood_group->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->blood_group->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->blood_group->Param, "CustomMsg");
        $this->Fields['blood_group'] = &$this->blood_group;

        // mobile_no
        $this->mobile_no = new DbField('patient', 'patient', 'x_mobile_no', 'mobile_no', '`mobile_no`', '`mobile_no`', 200, 45, -1, false, '`mobile_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_no->Required = true; // Required field
        $this->mobile_no->Sortable = true; // Allow sort
        $this->mobile_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_no->Param, "CustomMsg");
        $this->Fields['mobile_no'] = &$this->mobile_no;

        // description
        $this->description = new DbField('patient', 'patient', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, false, '`description`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->description->Sortable = false; // Allow sort
        $this->description->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->description->Param, "CustomMsg");
        $this->Fields['description'] = &$this->description;

        // status
        $this->status = new DbField('patient', 'patient', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->status->Sortable = false; // Allow sort
        $this->status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->status->Lookup = new Lookup('status', 'sys_status', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient', 'patient', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = false; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient', 'patient', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient', 'patient', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = false; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient', 'patient', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = false; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // profilePic
        $this->profilePic = new DbField('patient', 'patient', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 200, 100, -1, true, '`profilePic`', false, false, false, 'IMAGE', 'FILE');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->ImageResize = true;
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // IdentificationMark
        $this->IdentificationMark = new DbField('patient', 'patient', 'x_IdentificationMark', 'IdentificationMark', '`IdentificationMark`', '`IdentificationMark`', 200, 45, -1, false, '`IdentificationMark`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IdentificationMark->Required = true; // Required field
        $this->IdentificationMark->Sortable = true; // Allow sort
        $this->IdentificationMark->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IdentificationMark->Param, "CustomMsg");
        $this->Fields['IdentificationMark'] = &$this->IdentificationMark;

        // Religion
        $this->Religion = new DbField('patient', 'patient', 'x_Religion', 'Religion', '`Religion`', '`Religion`', 200, 45, -1, false, '`Religion`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Religion->Sortable = true; // Allow sort
        $this->Religion->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Religion->Param, "CustomMsg");
        $this->Fields['Religion'] = &$this->Religion;

        // Nationality
        $this->Nationality = new DbField('patient', 'patient', 'x_Nationality', 'Nationality', '`Nationality`', '`Nationality`', 200, 45, -1, false, '`Nationality`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Nationality->Required = true; // Required field
        $this->Nationality->Sortable = true; // Allow sort
        $this->Nationality->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Nationality->Param, "CustomMsg");
        $this->Fields['Nationality'] = &$this->Nationality;

        // ReferedByDr
        $this->ReferedByDr = new DbField('patient', 'patient', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, 45, -1, false, '`EV__ReferedByDr`', true, true, true, 'FORMATTED TEXT', 'SELECT');
        $this->ReferedByDr->Required = true; // Required field
        $this->ReferedByDr->Sortable = true; // Allow sort
        $this->ReferedByDr->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ReferedByDr->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ReferedByDr->Lookup = new Lookup('ReferedByDr', 'mas_reference_type', false, 'reference', ["reference","ReferMobileNo","ReferClinicname","ReferCity"], [], [], [], [], ["ReferClinicname","ReferCity","ReferMobileNo"], ["x_ReferClinicname","x_ReferCity","x_ReferMobileNo"], '', '');
        $this->ReferedByDr->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferedByDr->Param, "CustomMsg");
        $this->Fields['ReferedByDr'] = &$this->ReferedByDr;

        // ReferClinicname
        $this->ReferClinicname = new DbField('patient', 'patient', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, 45, -1, false, '`ReferClinicname`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferClinicname->Sortable = false; // Allow sort
        $this->ReferClinicname->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferClinicname->Param, "CustomMsg");
        $this->Fields['ReferClinicname'] = &$this->ReferClinicname;

        // ReferCity
        $this->ReferCity = new DbField('patient', 'patient', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, 45, -1, false, '`ReferCity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferCity->Sortable = false; // Allow sort
        $this->ReferCity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferCity->Param, "CustomMsg");
        $this->Fields['ReferCity'] = &$this->ReferCity;

        // ReferMobileNo
        $this->ReferMobileNo = new DbField('patient', 'patient', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, 45, -1, false, '`ReferMobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReferMobileNo->Sortable = true; // Allow sort
        $this->ReferMobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferMobileNo->Param, "CustomMsg");
        $this->Fields['ReferMobileNo'] = &$this->ReferMobileNo;

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant = new DbField('patient', 'patient', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, 45, -1, false, '`ReferA4TreatingConsultant`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->ReferA4TreatingConsultant->Required = true; // Required field
        $this->ReferA4TreatingConsultant->Sortable = true; // Allow sort
        $this->ReferA4TreatingConsultant->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->ReferA4TreatingConsultant->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->ReferA4TreatingConsultant->Lookup = new Lookup('ReferA4TreatingConsultant', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->ReferA4TreatingConsultant->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReferA4TreatingConsultant->Param, "CustomMsg");
        $this->Fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

        // PurposreReferredfor
        $this->PurposreReferredfor = new DbField('patient', 'patient', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, 45, -1, false, '`PurposreReferredfor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurposreReferredfor->Required = true; // Required field
        $this->PurposreReferredfor->Sortable = true; // Allow sort
        $this->PurposreReferredfor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PurposreReferredfor->Param, "CustomMsg");
        $this->Fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

        // spouse_title
        $this->spouse_title = new DbField('patient', 'patient', 'x_spouse_title', 'spouse_title', '`spouse_title`', '`spouse_title`', 200, 45, -1, false, '`spouse_title`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->spouse_title->Required = true; // Required field
        $this->spouse_title->Sortable = true; // Allow sort
        $this->spouse_title->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->spouse_title->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->spouse_title->Lookup = new Lookup('spouse_title', 'sys_tittle', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->spouse_title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_title->Param, "CustomMsg");
        $this->Fields['spouse_title'] = &$this->spouse_title;

        // spouse_first_name
        $this->spouse_first_name = new DbField('patient', 'patient', 'x_spouse_first_name', 'spouse_first_name', '`spouse_first_name`', '`spouse_first_name`', 200, 45, -1, false, '`spouse_first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_first_name->Required = true; // Required field
        $this->spouse_first_name->Sortable = true; // Allow sort
        $this->spouse_first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_first_name->Param, "CustomMsg");
        $this->Fields['spouse_first_name'] = &$this->spouse_first_name;

        // spouse_middle_name
        $this->spouse_middle_name = new DbField('patient', 'patient', 'x_spouse_middle_name', 'spouse_middle_name', '`spouse_middle_name`', '`spouse_middle_name`', 200, 45, -1, false, '`spouse_middle_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_middle_name->Sortable = false; // Allow sort
        $this->spouse_middle_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_middle_name->Param, "CustomMsg");
        $this->Fields['spouse_middle_name'] = &$this->spouse_middle_name;

        // spouse_last_name
        $this->spouse_last_name = new DbField('patient', 'patient', 'x_spouse_last_name', 'spouse_last_name', '`spouse_last_name`', '`spouse_last_name`', 200, 45, -1, false, '`spouse_last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_last_name->Sortable = false; // Allow sort
        $this->spouse_last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_last_name->Param, "CustomMsg");
        $this->Fields['spouse_last_name'] = &$this->spouse_last_name;

        // spouse_gender
        $this->spouse_gender = new DbField('patient', 'patient', 'x_spouse_gender', 'spouse_gender', '`spouse_gender`', '`spouse_gender`', 200, 45, -1, false, '`spouse_gender`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->spouse_gender->Required = true; // Required field
        $this->spouse_gender->Sortable = true; // Allow sort
        $this->spouse_gender->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->spouse_gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->spouse_gender->Lookup = new Lookup('spouse_gender', 'sys_gender', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->spouse_gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_gender->Param, "CustomMsg");
        $this->Fields['spouse_gender'] = &$this->spouse_gender;

        // spouse_dob
        $this->spouse_dob = new DbField('patient', 'patient', 'x_spouse_dob', 'spouse_dob', '`spouse_dob`', CastDateFieldForLike("`spouse_dob`", 7, "DB"), 133, 10, 7, false, '`spouse_dob`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_dob->Sortable = false; // Allow sort
        $this->spouse_dob->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_dob->Param, "CustomMsg");
        $this->Fields['spouse_dob'] = &$this->spouse_dob;

        // spouse_Age
        $this->spouse_Age = new DbField('patient', 'patient', 'x_spouse_Age', 'spouse_Age', '`spouse_Age`', '`spouse_Age`', 200, 45, -1, false, '`spouse_Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_Age->Required = true; // Required field
        $this->spouse_Age->Sortable = false; // Allow sort
        $this->spouse_Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_Age->Param, "CustomMsg");
        $this->Fields['spouse_Age'] = &$this->spouse_Age;

        // spouse_blood_group
        $this->spouse_blood_group = new DbField('patient', 'patient', 'x_spouse_blood_group', 'spouse_blood_group', '`spouse_blood_group`', '`spouse_blood_group`', 200, 45, -1, false, '`spouse_blood_group`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->spouse_blood_group->Required = true; // Required field
        $this->spouse_blood_group->Sortable = false; // Allow sort
        $this->spouse_blood_group->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->spouse_blood_group->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->spouse_blood_group->Lookup = new Lookup('spouse_blood_group', 'mas_bloodgroup', false, 'BloodGroup', ["BloodGroup","","",""], [], [], [], [], [], [], '', '');
        $this->spouse_blood_group->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_blood_group->Param, "CustomMsg");
        $this->Fields['spouse_blood_group'] = &$this->spouse_blood_group;

        // spouse_mobile_no
        $this->spouse_mobile_no = new DbField('patient', 'patient', 'x_spouse_mobile_no', 'spouse_mobile_no', '`spouse_mobile_no`', '`spouse_mobile_no`', 200, 45, -1, false, '`spouse_mobile_no`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_mobile_no->Required = true; // Required field
        $this->spouse_mobile_no->Sortable = true; // Allow sort
        $this->spouse_mobile_no->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_mobile_no->Param, "CustomMsg");
        $this->Fields['spouse_mobile_no'] = &$this->spouse_mobile_no;

        // Maritalstatus
        $this->Maritalstatus = new DbField('patient', 'patient', 'x_Maritalstatus', 'Maritalstatus', '`Maritalstatus`', '`Maritalstatus`', 200, 45, -1, false, '`Maritalstatus`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Maritalstatus->Required = true; // Required field
        $this->Maritalstatus->Sortable = false; // Allow sort
        $this->Maritalstatus->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Maritalstatus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Maritalstatus->Lookup = new Lookup('Maritalstatus', 'mas_marital_status', false, 'MaritalStatus', ["MaritalStatus","","",""], [], [], [], [], [], [], '', '');
        $this->Maritalstatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Maritalstatus->Param, "CustomMsg");
        $this->Fields['Maritalstatus'] = &$this->Maritalstatus;

        // Business
        $this->Business = new DbField('patient', 'patient', 'x_Business', 'Business', '`Business`', '`Business`', 200, 45, -1, false, '`Business`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Business->Sortable = false; // Allow sort
        $this->Business->Lookup = new Lookup('Business', 'mas_job', false, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
        $this->Business->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Business->Param, "CustomMsg");
        $this->Fields['Business'] = &$this->Business;

        // Patient_Language
        $this->Patient_Language = new DbField('patient', 'patient', 'x_Patient_Language', 'Patient_Language', '`Patient_Language`', '`Patient_Language`', 200, 45, -1, false, '`Patient_Language`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Patient_Language->Sortable = false; // Allow sort
        $this->Patient_Language->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Patient_Language->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Patient_Language->Lookup = new Lookup('Patient_Language', 'mas_language', false, 'Language', ["Language","","",""], [], [], [], [], [], [], '', '');
        $this->Patient_Language->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Patient_Language->Param, "CustomMsg");
        $this->Fields['Patient_Language'] = &$this->Patient_Language;

        // Passport
        $this->Passport = new DbField('patient', 'patient', 'x_Passport', 'Passport', '`Passport`', '`Passport`', 200, 45, -1, false, '`Passport`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Passport->Sortable = true; // Allow sort
        $this->Passport->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Passport->Param, "CustomMsg");
        $this->Fields['Passport'] = &$this->Passport;

        // VisaNo
        $this->VisaNo = new DbField('patient', 'patient', 'x_VisaNo', 'VisaNo', '`VisaNo`', '`VisaNo`', 200, 45, -1, false, '`VisaNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VisaNo->Sortable = true; // Allow sort
        $this->VisaNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VisaNo->Param, "CustomMsg");
        $this->Fields['VisaNo'] = &$this->VisaNo;

        // ValidityOfVisa
        $this->ValidityOfVisa = new DbField('patient', 'patient', 'x_ValidityOfVisa', 'ValidityOfVisa', '`ValidityOfVisa`', '`ValidityOfVisa`', 200, 45, -1, false, '`ValidityOfVisa`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ValidityOfVisa->Sortable = false; // Allow sort
        $this->ValidityOfVisa->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ValidityOfVisa->Param, "CustomMsg");
        $this->Fields['ValidityOfVisa'] = &$this->ValidityOfVisa;

        // WhereDidYouHear
        $this->WhereDidYouHear = new DbField('patient', 'patient', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, 45, -1, false, '`WhereDidYouHear`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->WhereDidYouHear->Required = true; // Required field
        $this->WhereDidYouHear->Sortable = true; // Allow sort
        $this->WhereDidYouHear->Lookup = new Lookup('WhereDidYouHear', 'mas_where_didyou_hear', false, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
        $this->WhereDidYouHear->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WhereDidYouHear->Param, "CustomMsg");
        $this->Fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

        // HospID
        $this->HospID = new DbField('patient', 'patient', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->HospID->Sortable = false; // Allow sort
        $this->HospID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->HospID->Lookup = new Lookup('HospID', 'hospital', false, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // street
        $this->street = new DbField('patient', 'patient', 'x_street', 'street', '`street`', '`street`', 200, 100, -1, false, '`street`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->street->Sortable = false; // Allow sort
        $this->street->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->street->Param, "CustomMsg");
        $this->Fields['street'] = &$this->street;

        // town
        $this->town = new DbField('patient', 'patient', 'x_town', 'town', '`town`', '`town`', 200, 50, -1, false, '`town`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->town->Required = true; // Required field
        $this->town->Sortable = false; // Allow sort
        $this->town->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->town->Param, "CustomMsg");
        $this->Fields['town'] = &$this->town;

        // province
        $this->province = new DbField('patient', 'patient', 'x_province', 'province', '`province`', '`province`', 200, 50, -1, false, '`province`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->province->Required = true; // Required field
        $this->province->Sortable = true; // Allow sort
        $this->province->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->province->Param, "CustomMsg");
        $this->Fields['province'] = &$this->province;

        // country
        $this->country = new DbField('patient', 'patient', 'x_country', 'country', '`country`', '`country`', 200, 50, -1, false, '`country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->country->Required = true; // Required field
        $this->country->Sortable = true; // Allow sort
        $this->country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->country->Param, "CustomMsg");
        $this->Fields['country'] = &$this->country;

        // postal_code
        $this->postal_code = new DbField('patient', 'patient', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 50, -1, false, '`postal_code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postal_code->Required = true; // Required field
        $this->postal_code->Sortable = true; // Allow sort
        $this->postal_code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postal_code->Param, "CustomMsg");
        $this->Fields['postal_code'] = &$this->postal_code;

        // PEmail
        $this->PEmail = new DbField('patient', 'patient', 'x_PEmail', 'PEmail', '`PEmail`', '`PEmail`', 200, 50, -1, false, '`PEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PEmail->Sortable = true; // Allow sort
        $this->PEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PEmail->Param, "CustomMsg");
        $this->Fields['PEmail'] = &$this->PEmail;

        // PEmergencyContact
        $this->PEmergencyContact = new DbField('patient', 'patient', 'x_PEmergencyContact', 'PEmergencyContact', '`PEmergencyContact`', '`PEmergencyContact`', 200, 50, -1, false, '`PEmergencyContact`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PEmergencyContact->Required = true; // Required field
        $this->PEmergencyContact->Sortable = false; // Allow sort
        $this->PEmergencyContact->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PEmergencyContact->Param, "CustomMsg");
        $this->Fields['PEmergencyContact'] = &$this->PEmergencyContact;

        // occupation
        $this->occupation = new DbField('patient', 'patient', 'x_occupation', 'occupation', '`occupation`', '`occupation`', 200, 45, -1, false, '`occupation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->occupation->Sortable = false; // Allow sort
        $this->occupation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->occupation->Param, "CustomMsg");
        $this->Fields['occupation'] = &$this->occupation;

        // spouse_occupation
        $this->spouse_occupation = new DbField('patient', 'patient', 'x_spouse_occupation', 'spouse_occupation', '`spouse_occupation`', '`spouse_occupation`', 200, 45, -1, false, '`spouse_occupation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->spouse_occupation->Sortable = false; // Allow sort
        $this->spouse_occupation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->spouse_occupation->Param, "CustomMsg");
        $this->Fields['spouse_occupation'] = &$this->spouse_occupation;

        // WhatsApp
        $this->WhatsApp = new DbField('patient', 'patient', 'x_WhatsApp', 'WhatsApp', '`WhatsApp`', '`WhatsApp`', 200, 45, -1, false, '`WhatsApp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WhatsApp->Sortable = false; // Allow sort
        $this->WhatsApp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WhatsApp->Param, "CustomMsg");
        $this->Fields['WhatsApp'] = &$this->WhatsApp;

        // CouppleID
        $this->CouppleID = new DbField('patient', 'patient', 'x_CouppleID', 'CouppleID', '`CouppleID`', '`CouppleID`', 3, 11, -1, false, '`CouppleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CouppleID->Sortable = false; // Allow sort
        $this->CouppleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->CouppleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CouppleID->Param, "CustomMsg");
        $this->Fields['CouppleID'] = &$this->CouppleID;

        // MaleID
        $this->MaleID = new DbField('patient', 'patient', 'x_MaleID', 'MaleID', '`MaleID`', '`MaleID`', 3, 11, -1, false, '`MaleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaleID->Sortable = false; // Allow sort
        $this->MaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->MaleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MaleID->Param, "CustomMsg");
        $this->Fields['MaleID'] = &$this->MaleID;

        // FemaleID
        $this->FemaleID = new DbField('patient', 'patient', 'x_FemaleID', 'FemaleID', '`FemaleID`', '`FemaleID`', 3, 11, -1, false, '`FemaleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FemaleID->Sortable = false; // Allow sort
        $this->FemaleID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->FemaleID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FemaleID->Param, "CustomMsg");
        $this->Fields['FemaleID'] = &$this->FemaleID;

        // GroupID
        $this->GroupID = new DbField('patient', 'patient', 'x_GroupID', 'GroupID', '`GroupID`', '`GroupID`', 3, 11, -1, false, '`GroupID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GroupID->Sortable = false; // Allow sort
        $this->GroupID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->GroupID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GroupID->Param, "CustomMsg");
        $this->Fields['GroupID'] = &$this->GroupID;

        // Relationship
        $this->Relationship = new DbField('patient', 'patient', 'x_Relationship', 'Relationship', '`Relationship`', '`Relationship`', 200, 45, -1, false, '`Relationship`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Relationship->Sortable = false; // Allow sort
        $this->Relationship->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Relationship->Param, "CustomMsg");
        $this->Fields['Relationship'] = &$this->Relationship;

        // AppointmentSearch
        $this->AppointmentSearch = new DbField('patient', 'patient', 'x_AppointmentSearch', 'AppointmentSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->AppointmentSearch->IsCustom = true; // Custom field
        $this->AppointmentSearch->Sortable = false; // Allow sort
        $this->AppointmentSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->AppointmentSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->AppointmentSearch->Lookup = new Lookup('AppointmentSearch', 'patient_app', false, 'id', ["first_name","mobile_no","PatientID",""], [], [], [], [], ["title","first_name","gender","dob","Age","mobile_no"], ["x_title","x_first_name","x_gender","x_dob","x_Age","x_mobile_no"], '', '');
        $this->AppointmentSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AppointmentSearch->Param, "CustomMsg");
        $this->Fields['AppointmentSearch'] = &$this->AppointmentSearch;

        // FacebookID
        $this->FacebookID = new DbField('patient', 'patient', 'x_FacebookID', 'FacebookID', '`FacebookID`', '`FacebookID`', 200, 45, -1, false, '`FacebookID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FacebookID->Sortable = false; // Allow sort
        $this->FacebookID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FacebookID->Param, "CustomMsg");
        $this->Fields['FacebookID'] = &$this->FacebookID;

        // profilePicImage
        $this->profilePicImage = new DbField('patient', 'patient', 'x_profilePicImage', 'profilePicImage', '`profilePicImage`', '`profilePicImage`', 205, 0, -1, true, '`profilePicImage`', false, false, false, 'FORMATTED TEXT', 'FILE');
        $this->profilePicImage->Sortable = false; // Allow sort
        $this->profilePicImage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePicImage->Param, "CustomMsg");
        $this->Fields['profilePicImage'] = &$this->profilePicImage;

        // Clients
        $this->Clients = new DbField('patient', 'patient', 'x_Clients', 'Clients', '`Clients`', '`Clients`', 200, 45, -1, false, '`Clients`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Clients->Sortable = true; // Allow sort
        $this->Clients->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Clients->Param, "CustomMsg");
        $this->Fields['Clients'] = &$this->Clients;
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
            $sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortFieldList . " " . $curSort : "";
            $this->setSessionOrderByList($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Session ORDER BY for List page
    public function getSessionOrderByList()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST"));
    }

    public function setSessionOrderByList($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
    }

    // Current detail table name
    public function getCurrentDetailTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE"));
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
            $detailUrl = Container("patient_address")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "patient_email") {
            $detailUrl = Container("patient_email")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "patient_telephone") {
            $detailUrl = Container("patient_telephone")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "patient_emergency_contact") {
            $detailUrl = Container("patient_emergency_contact")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "patient_document") {
            $detailUrl = Container("patient_document")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "PatientList";
        }
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `AppointmentSearch`");
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
        if ($this->SqlSelectList) {
            return $this->SqlSelectList;
        }
        $from = "(SELECT *, '' AS `AppointmentSearch`, (SELECT CONCAT(COALESCE(`reference`, ''),'" . ValueSeparator(1, $this->ReferedByDr) . "',COALESCE(`ReferMobileNo`,''),'" . ValueSeparator(2, $this->ReferedByDr) . "',COALESCE(`ReferClinicname`,''),'" . ValueSeparator(3, $this->ReferedByDr) . "',COALESCE(`ReferCity`,'')) FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `patient`.`ReferedByDr` LIMIT 1) AS `EV__ReferedByDr` FROM `patient`)";
        return $from . " `TMP_TABLE`";
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
        if ($this->useVirtualFields()) {
            $select = "*";
            $from = $this->getSqlSelectList();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        } else {
            $select = $this->getSqlSelect();
            $from = $this->getSqlFrom();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        }
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
        $sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Check if virtual fields is used in SQL
    protected function useVirtualFields()
    {
        $where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
        $orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        if ($where != "") {
            $where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
        }
        if ($orderBy != "") {
            $orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
        }
        if ($this->BasicSearch->getKeyword() != "") {
            return true;
        }
        if (
            $this->ReferedByDr->AdvancedSearch->SearchValue != "" ||
            $this->ReferedByDr->AdvancedSearch->SearchValue2 != "" ||
            ContainsString($where, " " . $this->ReferedByDr->VirtualExpression . " ")
        ) {
            return true;
        }
        if (ContainsString($orderBy, " " . $this->ReferedByDr->VirtualExpression . " ")) {
            return true;
        }
        return false;
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
        if ($this->useVirtualFields()) {
            $sql = $this->buildSelectSql("*", $this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        } else {
            $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        }
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
        $this->profilePicImage->Upload->DbValue = $row['profilePicImage'];
        $this->Clients->DbValue = $row['Clients'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $oldFiles = EmptyValue($row['profilePic']) ? [] : [$row['profilePic']];
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->profilePic->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
            }
        }
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id` = @id@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
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
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
        return $_SESSION[$name] ?? GetUrl("PatientList");
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
        if ($pageName == "PatientView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientAdd") {
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
                return "PatientView";
            case Config("API_ADD_ACTION"):
                return "PatientAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientDelete";
            case Config("API_LIST_ACTION"):
                return "PatientList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
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
        if ($parm != "") {
            $url = $this->keyUrl("PatientAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
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
        return $this->keyUrl("PatientDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
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
        } else {
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
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
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
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
        $this->id->setDbValue($row['id']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->profilePic->Upload->DbValue = $row['profilePic'];
        $this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
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
        $this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
        $this->FacebookID->setDbValue($row['FacebookID']);
        $this->profilePicImage->Upload->DbValue = $row['profilePicImage'];
        if (is_resource($this->profilePicImage->Upload->DbValue) && get_resource_type($this->profilePicImage->Upload->DbValue) == "stream") { // Byte array
            $this->profilePicImage->Upload->DbValue = stream_get_contents($this->profilePicImage->Upload->DbValue);
        }
        $this->Clients->setDbValue($row['Clients']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

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

        // profilePicImage

        // Clients

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // title
        $curVal = trim(strval($this->title->CurrentValue));
        if ($curVal != "") {
            $this->title->ViewValue = $this->title->lookupCacheOption($curVal);
            if ($this->title->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->title->Lookup->renderViewRow($rswrk[0]);
                    $this->title->ViewValue = $this->title->displayValue($arwrk);
                } else {
                    $this->title->ViewValue = $this->title->CurrentValue;
                }
            }
        } else {
            $this->title->ViewValue = null;
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
        $curVal = trim(strval($this->gender->CurrentValue));
        if ($curVal != "") {
            $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
            if ($this->gender->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                    $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                } else {
                    $this->gender->ViewValue = $this->gender->CurrentValue;
                }
            }
        } else {
            $this->gender->ViewValue = null;
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
        $curVal = trim(strval($this->blood_group->CurrentValue));
        if ($curVal != "") {
            $this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
            if ($this->blood_group->ViewValue === null) { // Lookup from database
                $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->blood_group->Lookup->renderViewRow($rswrk[0]);
                    $this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
                } else {
                    $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
                }
            }
        } else {
            $this->blood_group->ViewValue = null;
        }
        $this->blood_group->ViewCustomAttributes = "";

        // mobile_no
        $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
        $this->mobile_no->ViewCustomAttributes = "";

        // description
        $this->description->ViewValue = $this->description->CurrentValue;
        $this->description->ViewCustomAttributes = "";

        // status
        $curVal = trim(strval($this->status->CurrentValue));
        if ($curVal != "") {
            $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            if ($this->status->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                    $this->status->ViewValue = $this->status->displayValue($arwrk);
                } else {
                    $this->status->ViewValue = $this->status->CurrentValue;
                }
            }
        } else {
            $this->status->ViewValue = null;
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
            $curVal = trim(strval($this->ReferedByDr->CurrentValue));
            if ($curVal != "") {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
                if ($this->ReferedByDr->ViewValue === null) { // Lookup from database
                    $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ReferedByDr->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ReferedByDr->Lookup->renderViewRow($rswrk[0]);
                        $this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
                    } else {
                        $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
                    }
                }
            } else {
                $this->ReferedByDr->ViewValue = null;
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
        $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
        if ($curVal != "") {
            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
            if ($this->ReferA4TreatingConsultant->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ReferA4TreatingConsultant->Lookup->renderViewRow($rswrk[0]);
                    $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
                } else {
                    $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
                }
            }
        } else {
            $this->ReferA4TreatingConsultant->ViewValue = null;
        }
        $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

        // PurposreReferredfor
        $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
        $this->PurposreReferredfor->ViewCustomAttributes = "";

        // spouse_title
        $curVal = trim(strval($this->spouse_title->CurrentValue));
        if ($curVal != "") {
            $this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
            if ($this->spouse_title->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->spouse_title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->spouse_title->Lookup->renderViewRow($rswrk[0]);
                    $this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
                } else {
                    $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
                }
            }
        } else {
            $this->spouse_title->ViewValue = null;
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
        $curVal = trim(strval($this->spouse_gender->CurrentValue));
        if ($curVal != "") {
            $this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
            if ($this->spouse_gender->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->spouse_gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->spouse_gender->Lookup->renderViewRow($rswrk[0]);
                    $this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
                } else {
                    $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
                }
            }
        } else {
            $this->spouse_gender->ViewValue = null;
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
        $curVal = trim(strval($this->spouse_blood_group->CurrentValue));
        if ($curVal != "") {
            $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
            if ($this->spouse_blood_group->ViewValue === null) { // Lookup from database
                $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->spouse_blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->spouse_blood_group->Lookup->renderViewRow($rswrk[0]);
                    $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
                } else {
                    $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
                }
            }
        } else {
            $this->spouse_blood_group->ViewValue = null;
        }
        $this->spouse_blood_group->ViewCustomAttributes = "";

        // spouse_mobile_no
        $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
        $this->spouse_mobile_no->ViewCustomAttributes = "";

        // Maritalstatus
        $curVal = trim(strval($this->Maritalstatus->CurrentValue));
        if ($curVal != "") {
            $this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
            if ($this->Maritalstatus->ViewValue === null) { // Lookup from database
                $filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Maritalstatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Maritalstatus->Lookup->renderViewRow($rswrk[0]);
                    $this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
                } else {
                    $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
                }
            }
        } else {
            $this->Maritalstatus->ViewValue = null;
        }
        $this->Maritalstatus->ViewCustomAttributes = "";

        // Business
        $this->Business->ViewValue = $this->Business->CurrentValue;
        $curVal = trim(strval($this->Business->CurrentValue));
        if ($curVal != "") {
            $this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
            if ($this->Business->ViewValue === null) { // Lookup from database
                $filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Business->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Business->Lookup->renderViewRow($rswrk[0]);
                    $this->Business->ViewValue = $this->Business->displayValue($arwrk);
                } else {
                    $this->Business->ViewValue = $this->Business->CurrentValue;
                }
            }
        } else {
            $this->Business->ViewValue = null;
        }
        $this->Business->ViewCustomAttributes = "";

        // Patient_Language
        $curVal = trim(strval($this->Patient_Language->CurrentValue));
        if ($curVal != "") {
            $this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
            if ($this->Patient_Language->ViewValue === null) { // Lookup from database
                $filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Patient_Language->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Patient_Language->Lookup->renderViewRow($rswrk[0]);
                    $this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
                } else {
                    $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
                }
            }
        } else {
            $this->Patient_Language->ViewValue = null;
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
        $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
        if ($curVal != "") {
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->WhereDidYouHear->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                        $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                    }
                } else {
                    $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                }
            }
        } else {
            $this->WhereDidYouHear->ViewValue = null;
        }
        $this->WhereDidYouHear->ViewCustomAttributes = "";

        // HospID
        $curVal = trim(strval($this->HospID->CurrentValue));
        if ($curVal != "") {
            $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
            if ($this->HospID->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                    $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                } else {
                    $this->HospID->ViewValue = $this->HospID->CurrentValue;
                }
            }
        } else {
            $this->HospID->ViewValue = null;
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
        $curVal = trim(strval($this->AppointmentSearch->CurrentValue));
        if ($curVal != "") {
            $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
            if ($this->AppointmentSearch->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->AppointmentSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AppointmentSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
                } else {
                    $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
                }
            }
        } else {
            $this->AppointmentSearch->ViewValue = null;
        }
        $this->AppointmentSearch->ViewCustomAttributes = "";

        // FacebookID
        $this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
        $this->FacebookID->ViewCustomAttributes = "";

        // profilePicImage
        if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
            $this->profilePicImage->ViewValue = $this->id->CurrentValue;
            $this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
        } else {
            $this->profilePicImage->ViewValue = "";
        }
        $this->profilePicImage->ViewCustomAttributes = "";

        // Clients
        $this->Clients->ViewValue = $this->Clients->CurrentValue;
        $this->Clients->ViewCustomAttributes = "";

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
            if ($this->isExport()) {
                $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
            }
        } else {
            $this->profilePic->HrefValue = "";
        }
        $this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
        $this->profilePic->TooltipValue = "";
        if ($this->profilePic->UseColorbox) {
            if (EmptyValue($this->profilePic->TooltipValue)) {
                $this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
            }
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

        // profilePicImage
        $this->profilePicImage->LinkCustomAttributes = "";
        if (!empty($this->profilePicImage->Upload->DbValue)) {
            $this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
            $this->profilePicImage->LinkAttrs["target"] = "";
            if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"])) {
                $this->profilePicImage->LinkAttrs["target"] = "_blank";
            }
            if ($this->isExport()) {
                $this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
            }
        } else {
            $this->profilePicImage->HrefValue = "";
        }
        $this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
        $this->profilePicImage->TooltipValue = "";

        // Clients
        $this->Clients->LinkCustomAttributes = "";
        $this->Clients->HrefValue = "";
        $this->Clients->TooltipValue = "";

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
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // dob
        $this->dob->EditAttrs["class"] = "form-control";
        $this->dob->EditCustomAttributes = "";
        $this->dob->EditValue = FormatDateTime($this->dob->CurrentValue, 7);
        $this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // blood_group
        $this->blood_group->EditAttrs["class"] = "form-control";
        $this->blood_group->EditCustomAttributes = "";
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
        if (!$this->description->Raw) {
            $this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
        }
        $this->description->EditValue = $this->description->CurrentValue;
        $this->description->PlaceHolder = RemoveHtml($this->description->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

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
        if (!EmptyValue($this->profilePic->CurrentValue)) {
            $this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;
        }

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

        // ReferedByDr
        $this->ReferedByDr->EditAttrs["class"] = "form-control";
        $this->ReferedByDr->EditCustomAttributes = "";
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
        $this->spouse_gender->PlaceHolder = RemoveHtml($this->spouse_gender->caption());

        // spouse_dob
        $this->spouse_dob->EditAttrs["class"] = "form-control";
        $this->spouse_dob->EditCustomAttributes = "";
        $this->spouse_dob->EditValue = FormatDateTime($this->spouse_dob->CurrentValue, 7);
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
        $this->WhereDidYouHear->EditCustomAttributes = "";
        $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

        // HospID

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

        // AppointmentSearch
        $this->AppointmentSearch->EditAttrs["class"] = "form-control";
        $this->AppointmentSearch->EditCustomAttributes = "";
        $this->AppointmentSearch->PlaceHolder = RemoveHtml($this->AppointmentSearch->caption());

        // FacebookID
        $this->FacebookID->EditAttrs["class"] = "form-control";
        $this->FacebookID->EditCustomAttributes = "";
        if (!$this->FacebookID->Raw) {
            $this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
        }
        $this->FacebookID->EditValue = $this->FacebookID->CurrentValue;
        $this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

        // profilePicImage
        $this->profilePicImage->EditAttrs["class"] = "form-control";
        $this->profilePicImage->EditCustomAttributes = "";
        if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
            $this->profilePicImage->EditValue = $this->id->CurrentValue;
            $this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
        } else {
            $this->profilePicImage->EditValue = "";
        }

        // Clients
        $this->Clients->EditAttrs["class"] = "form-control";
        $this->Clients->EditCustomAttributes = "";
        if (!$this->Clients->Raw) {
            $this->Clients->CurrentValue = HtmlDecode($this->Clients->CurrentValue);
        }
        $this->Clients->EditValue = $this->Clients->CurrentValue;
        $this->Clients->PlaceHolder = RemoveHtml($this->Clients->caption());

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
                    $doc->exportCaption($this->profilePicImage);
                    $doc->exportCaption($this->Clients);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->title);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->blood_group);
                    $doc->exportCaption($this->mobile_no);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->IdentificationMark);
                    $doc->exportCaption($this->Religion);
                    $doc->exportCaption($this->Nationality);
                    $doc->exportCaption($this->ReferedByDr);
                    $doc->exportCaption($this->ReferMobileNo);
                    $doc->exportCaption($this->ReferA4TreatingConsultant);
                    $doc->exportCaption($this->PurposreReferredfor);
                    $doc->exportCaption($this->spouse_title);
                    $doc->exportCaption($this->spouse_first_name);
                    $doc->exportCaption($this->spouse_gender);
                    $doc->exportCaption($this->spouse_mobile_no);
                    $doc->exportCaption($this->Passport);
                    $doc->exportCaption($this->VisaNo);
                    $doc->exportCaption($this->WhereDidYouHear);
                    $doc->exportCaption($this->province);
                    $doc->exportCaption($this->country);
                    $doc->exportCaption($this->postal_code);
                    $doc->exportCaption($this->PEmail);
                    $doc->exportCaption($this->Clients);
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
                        $doc->exportField($this->profilePicImage);
                        $doc->exportField($this->Clients);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->title);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->blood_group);
                        $doc->exportField($this->mobile_no);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->IdentificationMark);
                        $doc->exportField($this->Religion);
                        $doc->exportField($this->Nationality);
                        $doc->exportField($this->ReferedByDr);
                        $doc->exportField($this->ReferMobileNo);
                        $doc->exportField($this->ReferA4TreatingConsultant);
                        $doc->exportField($this->PurposreReferredfor);
                        $doc->exportField($this->spouse_title);
                        $doc->exportField($this->spouse_first_name);
                        $doc->exportField($this->spouse_gender);
                        $doc->exportField($this->spouse_mobile_no);
                        $doc->exportField($this->Passport);
                        $doc->exportField($this->VisaNo);
                        $doc->exportField($this->WhereDidYouHear);
                        $doc->exportField($this->province);
                        $doc->exportField($this->country);
                        $doc->exportField($this->postal_code);
                        $doc->exportField($this->PEmail);
                        $doc->exportField($this->Clients);
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
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'profilePic') {
            $fldName = "profilePic";
            $fileNameFld = "profilePic";
        } elseif ($fldparm == 'profilePicImage') {
            $fldName = "profilePicImage";
        } else {
            return false; // Incorrect field
        }

        // Set up key values
        $ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($ar) == 1) {
            $this->id->CurrentValue = $ar[0];
        } else {
            return false; // Incorrect key
        }

        // Set up filter (WHERE Clause)
        $filter = $this->getRecordFilter();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $dbtype = GetConnectionType($this->Dbid);
        if ($row = $conn->fetchAssoc($sql)) {
            $val = $row[$fldName];
            if (!EmptyValue($val)) {
                $fld = $this->Fields[$fldName];

                // Binary data
                if ($fld->DataType == DATATYPE_BLOB) {
                    if ($dbtype != "MYSQL") {
                        if (is_resource($val) && get_resource_type($val) == "stream") { // Byte array
                            $val = stream_get_contents($val);
                        }
                    }
                    if ($resize) {
                        ResizeBinary($val, $width, $height, 100, $plugins);
                    }

                    // Write file type
                    if ($fileTypeFld != "" && !EmptyValue($row[$fileTypeFld])) {
                        AddHeader("Content-type", $row[$fileTypeFld]);
                    } else {
                        AddHeader("Content-type", ContentType($val));
                    }

                    // Write file name
                    $downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
                    if ($fileNameFld != "" && !EmptyValue($row[$fileNameFld])) {
                        $fileName = $row[$fileNameFld];
                        $pathinfo = pathinfo($fileName);
                        $ext = strtolower(@$pathinfo["extension"]);
                        $isPdf = SameText($ext, "pdf");
                        if ($downloadPdf || !$isPdf) { // Skip header if not download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    } else {
                        $ext = ContentExtension($val);
                        $isPdf = SameText($ext, ".pdf");
                        if ($isPdf && $downloadPdf) { // Add header if download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    }

                    // Write file data
                    if (
                        StartsString("PK", $val) &&
                        ContainsString($val, "[Content_Types].xml") &&
                        ContainsString($val, "_rels") &&
                        ContainsString($val, "docProps")
                    ) { // Fix Office 2007 documents
                        if (!EndsString("\0\0\0", $val)) { // Not ends with 3 or 4 \0
                            $val .= "\0\0\0\0";
                        }
                    }

                    // Clear any debug message
                    if (ob_get_length()) {
                        ob_end_clean();
                    }

                    // Write binary data
                    Write($val);

                // Upload to folder
                } else {
                    if ($fld->UploadMultiple) {
                        $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                    } else {
                        $files = [$val];
                    }
                    $data = [];
                    $ar = [];
                    foreach ($files as $file) {
                        if (!EmptyValue($file)) {
                            if (Config("ENCRYPT_FILE_PATH")) {
                                $ar[$file] = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $this->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                            } else {
                                $ar[$file] = FullUrl($fld->hrefPath() . $file);
                            }
                        }
                    }
                    $data[$fld->Param] = $ar;
                    WriteJson($data);
                }
            }
            return true;
        }
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
    public function rowInserting($rsold, &$rsnew) {
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
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew) {
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
    public function rowRendered() {
    	// To view properties of field class, use:
    	//var_dump($this-><FieldName>);

    //	$this->profilePic->EditAttrs["capture"] = "camera";
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
