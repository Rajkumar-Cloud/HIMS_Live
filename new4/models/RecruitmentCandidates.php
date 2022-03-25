<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for recruitment_candidates
 */
class RecruitmentCandidates extends DbTable
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
    public $first_name;
    public $last_name;
    public $nationality;
    public $birthday;
    public $gender;
    public $marital_status;
    public $address1;
    public $address2;
    public $city;
    public $country;
    public $province;
    public $postal_code;
    public $_email;
    public $home_phone;
    public $mobile_phone;
    public $cv_title;
    public $cv;
    public $cvtext;
    public $industry;
    public $profileImage;
    public $head_line;
    public $objective;
    public $work_history;
    public $education;
    public $skills;
    public $referees;
    public $linkedInUrl;
    public $linkedInData;
    public $totalYearsOfExperience;
    public $totalMonthsOfExperience;
    public $htmlCVData;
    public $generatedCVFile;
    public $created;
    public $updated;
    public $expectedSalary;
    public $preferedPositions;
    public $preferedJobtype;
    public $preferedCountries;
    public $tags;
    public $notes;
    public $calls;
    public $age;
    public $hash;
    public $linkedInProfileLink;
    public $linkedInProfileId;
    public $facebookProfileLink;
    public $facebookProfileId;
    public $twitterProfileLink;
    public $twitterProfileId;
    public $googleProfileLink;
    public $googleProfileId;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'recruitment_candidates';
        $this->TableName = 'recruitment_candidates';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`recruitment_candidates`";
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
        $this->id = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_id', 'id', '`id`', '`id`', 20, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // first_name
        $this->first_name = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 100, -1, false, '`first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->first_name->Nullable = false; // NOT NULL field
        $this->first_name->Required = true; // Required field
        $this->first_name->Sortable = true; // Allow sort
        $this->first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->first_name->Param, "CustomMsg");
        $this->Fields['first_name'] = &$this->first_name;

        // last_name
        $this->last_name = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 100, -1, false, '`last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_name->Nullable = false; // NOT NULL field
        $this->last_name->Required = true; // Required field
        $this->last_name->Sortable = true; // Allow sort
        $this->last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_name->Param, "CustomMsg");
        $this->Fields['last_name'] = &$this->last_name;

        // nationality
        $this->nationality = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_nationality', 'nationality', '`nationality`', '`nationality`', 20, 20, -1, false, '`nationality`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->nationality->Sortable = true; // Allow sort
        $this->nationality->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->nationality->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nationality->Param, "CustomMsg");
        $this->Fields['nationality'] = &$this->nationality;

        // birthday
        $this->birthday = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_birthday', 'birthday', '`birthday`', CastDateFieldForLike("`birthday`", 0, "DB"), 135, 19, 0, false, '`birthday`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->birthday->Sortable = true; // Allow sort
        $this->birthday->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->birthday->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->birthday->Param, "CustomMsg");
        $this->Fields['birthday'] = &$this->birthday;

        // gender
        $this->gender = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_gender', 'gender', '`gender`', '`gender`', 202, 6, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->gender->Sortable = true; // Allow sort
        $this->gender->Lookup = new Lookup('gender', 'recruitment_candidates', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->gender->OptionCount = 2;
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // marital_status
        $this->marital_status = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_marital_status', 'marital_status', '`marital_status`', '`marital_status`', 202, 8, -1, false, '`marital_status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->marital_status->Sortable = true; // Allow sort
        $this->marital_status->Lookup = new Lookup('marital_status', 'recruitment_candidates', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->marital_status->OptionCount = 5;
        $this->marital_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->marital_status->Param, "CustomMsg");
        $this->Fields['marital_status'] = &$this->marital_status;

        // address1
        $this->address1 = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_address1', 'address1', '`address1`', '`address1`', 200, 100, -1, false, '`address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->address1->Sortable = true; // Allow sort
        $this->address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->address1->Param, "CustomMsg");
        $this->Fields['address1'] = &$this->address1;

        // address2
        $this->address2 = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_address2', 'address2', '`address2`', '`address2`', 200, 100, -1, false, '`address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->address2->Sortable = true; // Allow sort
        $this->address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->address2->Param, "CustomMsg");
        $this->Fields['address2'] = &$this->address2;

        // city
        $this->city = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_city', 'city', '`city`', '`city`', 200, 150, -1, false, '`city`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->city->Sortable = true; // Allow sort
        $this->city->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->city->Param, "CustomMsg");
        $this->Fields['city'] = &$this->city;

        // country
        $this->country = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_country', 'country', '`country`', '`country`', 200, 2, -1, false, '`country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->country->Sortable = true; // Allow sort
        $this->country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->country->Param, "CustomMsg");
        $this->Fields['country'] = &$this->country;

        // province
        $this->province = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_province', 'province', '`province`', '`province`', 20, 20, -1, false, '`province`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->province->Sortable = true; // Allow sort
        $this->province->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->province->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->province->Param, "CustomMsg");
        $this->Fields['province'] = &$this->province;

        // postal_code
        $this->postal_code = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 20, -1, false, '`postal_code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postal_code->Sortable = true; // Allow sort
        $this->postal_code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postal_code->Param, "CustomMsg");
        $this->Fields['postal_code'] = &$this->postal_code;

        // email
        $this->_email = new DbField('recruitment_candidates', 'recruitment_candidates', 'x__email', 'email', '`email`', '`email`', 200, 200, -1, false, '`email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_email->Sortable = true; // Allow sort
        $this->_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_email->Param, "CustomMsg");
        $this->Fields['email'] = &$this->_email;

        // home_phone
        $this->home_phone = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_home_phone', 'home_phone', '`home_phone`', '`home_phone`', 200, 50, -1, false, '`home_phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->home_phone->Sortable = true; // Allow sort
        $this->home_phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->home_phone->Param, "CustomMsg");
        $this->Fields['home_phone'] = &$this->home_phone;

        // mobile_phone
        $this->mobile_phone = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_mobile_phone', 'mobile_phone', '`mobile_phone`', '`mobile_phone`', 200, 50, -1, false, '`mobile_phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_phone->Sortable = true; // Allow sort
        $this->mobile_phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_phone->Param, "CustomMsg");
        $this->Fields['mobile_phone'] = &$this->mobile_phone;

        // cv_title
        $this->cv_title = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cv_title', 'cv_title', '`cv_title`', '`cv_title`', 200, 200, -1, false, '`cv_title`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->cv_title->Nullable = false; // NOT NULL field
        $this->cv_title->Required = true; // Required field
        $this->cv_title->Sortable = true; // Allow sort
        $this->cv_title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cv_title->Param, "CustomMsg");
        $this->Fields['cv_title'] = &$this->cv_title;

        // cv
        $this->cv = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cv', 'cv', '`cv`', '`cv`', 200, 150, -1, false, '`cv`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->cv->Sortable = true; // Allow sort
        $this->cv->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cv->Param, "CustomMsg");
        $this->Fields['cv'] = &$this->cv;

        // cvtext
        $this->cvtext = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cvtext', 'cvtext', '`cvtext`', '`cvtext`', 201, 65535, -1, false, '`cvtext`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->cvtext->Sortable = true; // Allow sort
        $this->cvtext->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->cvtext->Param, "CustomMsg");
        $this->Fields['cvtext'] = &$this->cvtext;

        // industry
        $this->industry = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_industry', 'industry', '`industry`', '`industry`', 201, 65535, -1, false, '`industry`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->industry->Sortable = true; // Allow sort
        $this->industry->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->industry->Param, "CustomMsg");
        $this->Fields['industry'] = &$this->industry;

        // profileImage
        $this->profileImage = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_profileImage', 'profileImage', '`profileImage`', '`profileImage`', 200, 150, -1, false, '`profileImage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->profileImage->Sortable = true; // Allow sort
        $this->profileImage->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profileImage->Param, "CustomMsg");
        $this->Fields['profileImage'] = &$this->profileImage;

        // head_line
        $this->head_line = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_head_line', 'head_line', '`head_line`', '`head_line`', 201, 65535, -1, false, '`head_line`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->head_line->Sortable = true; // Allow sort
        $this->head_line->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->head_line->Param, "CustomMsg");
        $this->Fields['head_line'] = &$this->head_line;

        // objective
        $this->objective = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_objective', 'objective', '`objective`', '`objective`', 201, 65535, -1, false, '`objective`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->objective->Sortable = true; // Allow sort
        $this->objective->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->objective->Param, "CustomMsg");
        $this->Fields['objective'] = &$this->objective;

        // work_history
        $this->work_history = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_work_history', 'work_history', '`work_history`', '`work_history`', 201, 65535, -1, false, '`work_history`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->work_history->Sortable = true; // Allow sort
        $this->work_history->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->work_history->Param, "CustomMsg");
        $this->Fields['work_history'] = &$this->work_history;

        // education
        $this->education = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_education', 'education', '`education`', '`education`', 201, 65535, -1, false, '`education`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->education->Sortable = true; // Allow sort
        $this->education->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->education->Param, "CustomMsg");
        $this->Fields['education'] = &$this->education;

        // skills
        $this->skills = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_skills', 'skills', '`skills`', '`skills`', 201, 65535, -1, false, '`skills`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->skills->Sortable = true; // Allow sort
        $this->skills->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->skills->Param, "CustomMsg");
        $this->Fields['skills'] = &$this->skills;

        // referees
        $this->referees = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_referees', 'referees', '`referees`', '`referees`', 201, 65535, -1, false, '`referees`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->referees->Sortable = true; // Allow sort
        $this->referees->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->referees->Param, "CustomMsg");
        $this->Fields['referees'] = &$this->referees;

        // linkedInUrl
        $this->linkedInUrl = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInUrl', 'linkedInUrl', '`linkedInUrl`', '`linkedInUrl`', 201, 500, -1, false, '`linkedInUrl`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->linkedInUrl->Sortable = true; // Allow sort
        $this->linkedInUrl->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->linkedInUrl->Param, "CustomMsg");
        $this->Fields['linkedInUrl'] = &$this->linkedInUrl;

        // linkedInData
        $this->linkedInData = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInData', 'linkedInData', '`linkedInData`', '`linkedInData`', 201, 65535, -1, false, '`linkedInData`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->linkedInData->Sortable = true; // Allow sort
        $this->linkedInData->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->linkedInData->Param, "CustomMsg");
        $this->Fields['linkedInData'] = &$this->linkedInData;

        // totalYearsOfExperience
        $this->totalYearsOfExperience = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_totalYearsOfExperience', 'totalYearsOfExperience', '`totalYearsOfExperience`', '`totalYearsOfExperience`', 3, 11, -1, false, '`totalYearsOfExperience`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->totalYearsOfExperience->Sortable = true; // Allow sort
        $this->totalYearsOfExperience->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->totalYearsOfExperience->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->totalYearsOfExperience->Param, "CustomMsg");
        $this->Fields['totalYearsOfExperience'] = &$this->totalYearsOfExperience;

        // totalMonthsOfExperience
        $this->totalMonthsOfExperience = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_totalMonthsOfExperience', 'totalMonthsOfExperience', '`totalMonthsOfExperience`', '`totalMonthsOfExperience`', 3, 11, -1, false, '`totalMonthsOfExperience`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->totalMonthsOfExperience->Sortable = true; // Allow sort
        $this->totalMonthsOfExperience->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->totalMonthsOfExperience->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->totalMonthsOfExperience->Param, "CustomMsg");
        $this->Fields['totalMonthsOfExperience'] = &$this->totalMonthsOfExperience;

        // htmlCVData
        $this->htmlCVData = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_htmlCVData', 'htmlCVData', '`htmlCVData`', '`htmlCVData`', 201, -1, -1, false, '`htmlCVData`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->htmlCVData->Sortable = true; // Allow sort
        $this->htmlCVData->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->htmlCVData->Param, "CustomMsg");
        $this->Fields['htmlCVData'] = &$this->htmlCVData;

        // generatedCVFile
        $this->generatedCVFile = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_generatedCVFile', 'generatedCVFile', '`generatedCVFile`', '`generatedCVFile`', 200, 150, -1, false, '`generatedCVFile`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->generatedCVFile->Sortable = true; // Allow sort
        $this->generatedCVFile->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->generatedCVFile->Param, "CustomMsg");
        $this->Fields['generatedCVFile'] = &$this->generatedCVFile;

        // created
        $this->created = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_created', 'created', '`created`', CastDateFieldForLike("`created`", 0, "DB"), 135, 19, 0, false, '`created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->created->Sortable = true; // Allow sort
        $this->created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->created->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->created->Param, "CustomMsg");
        $this->Fields['created'] = &$this->created;

        // updated
        $this->updated = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_updated', 'updated', '`updated`', CastDateFieldForLike("`updated`", 0, "DB"), 135, 19, 0, false, '`updated`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->updated->Sortable = true; // Allow sort
        $this->updated->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->updated->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->updated->Param, "CustomMsg");
        $this->Fields['updated'] = &$this->updated;

        // expectedSalary
        $this->expectedSalary = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_expectedSalary', 'expectedSalary', '`expectedSalary`', '`expectedSalary`', 3, 11, -1, false, '`expectedSalary`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->expectedSalary->Sortable = true; // Allow sort
        $this->expectedSalary->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->expectedSalary->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->expectedSalary->Param, "CustomMsg");
        $this->Fields['expectedSalary'] = &$this->expectedSalary;

        // preferedPositions
        $this->preferedPositions = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedPositions', 'preferedPositions', '`preferedPositions`', '`preferedPositions`', 201, 65535, -1, false, '`preferedPositions`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->preferedPositions->Sortable = true; // Allow sort
        $this->preferedPositions->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->preferedPositions->Param, "CustomMsg");
        $this->Fields['preferedPositions'] = &$this->preferedPositions;

        // preferedJobtype
        $this->preferedJobtype = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedJobtype', 'preferedJobtype', '`preferedJobtype`', '`preferedJobtype`', 200, 60, -1, false, '`preferedJobtype`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->preferedJobtype->Sortable = true; // Allow sort
        $this->preferedJobtype->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->preferedJobtype->Param, "CustomMsg");
        $this->Fields['preferedJobtype'] = &$this->preferedJobtype;

        // preferedCountries
        $this->preferedCountries = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedCountries', 'preferedCountries', '`preferedCountries`', '`preferedCountries`', 201, 65535, -1, false, '`preferedCountries`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->preferedCountries->Sortable = true; // Allow sort
        $this->preferedCountries->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->preferedCountries->Param, "CustomMsg");
        $this->Fields['preferedCountries'] = &$this->preferedCountries;

        // tags
        $this->tags = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_tags', 'tags', '`tags`', '`tags`', 201, 65535, -1, false, '`tags`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->tags->Sortable = true; // Allow sort
        $this->tags->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->tags->Param, "CustomMsg");
        $this->Fields['tags'] = &$this->tags;

        // notes
        $this->notes = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_notes', 'notes', '`notes`', '`notes`', 201, 65535, -1, false, '`notes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->notes->Sortable = true; // Allow sort
        $this->notes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->notes->Param, "CustomMsg");
        $this->Fields['notes'] = &$this->notes;

        // calls
        $this->calls = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_calls', 'calls', '`calls`', '`calls`', 201, 65535, -1, false, '`calls`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->calls->Sortable = true; // Allow sort
        $this->calls->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->calls->Param, "CustomMsg");
        $this->Fields['calls'] = &$this->calls;

        // age
        $this->age = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_age', 'age', '`age`', '`age`', 3, 11, -1, false, '`age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->age->Sortable = true; // Allow sort
        $this->age->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->age->Param, "CustomMsg");
        $this->Fields['age'] = &$this->age;

        // hash
        $this->hash = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_hash', 'hash', '`hash`', '`hash`', 200, 100, -1, false, '`hash`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->hash->Sortable = true; // Allow sort
        $this->hash->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hash->Param, "CustomMsg");
        $this->Fields['hash'] = &$this->hash;

        // linkedInProfileLink
        $this->linkedInProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInProfileLink', 'linkedInProfileLink', '`linkedInProfileLink`', '`linkedInProfileLink`', 200, 250, -1, false, '`linkedInProfileLink`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->linkedInProfileLink->Sortable = true; // Allow sort
        $this->linkedInProfileLink->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->linkedInProfileLink->Param, "CustomMsg");
        $this->Fields['linkedInProfileLink'] = &$this->linkedInProfileLink;

        // linkedInProfileId
        $this->linkedInProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInProfileId', 'linkedInProfileId', '`linkedInProfileId`', '`linkedInProfileId`', 200, 50, -1, false, '`linkedInProfileId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->linkedInProfileId->Sortable = true; // Allow sort
        $this->linkedInProfileId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->linkedInProfileId->Param, "CustomMsg");
        $this->Fields['linkedInProfileId'] = &$this->linkedInProfileId;

        // facebookProfileLink
        $this->facebookProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_facebookProfileLink', 'facebookProfileLink', '`facebookProfileLink`', '`facebookProfileLink`', 200, 250, -1, false, '`facebookProfileLink`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->facebookProfileLink->Sortable = true; // Allow sort
        $this->facebookProfileLink->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->facebookProfileLink->Param, "CustomMsg");
        $this->Fields['facebookProfileLink'] = &$this->facebookProfileLink;

        // facebookProfileId
        $this->facebookProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_facebookProfileId', 'facebookProfileId', '`facebookProfileId`', '`facebookProfileId`', 200, 50, -1, false, '`facebookProfileId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->facebookProfileId->Sortable = true; // Allow sort
        $this->facebookProfileId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->facebookProfileId->Param, "CustomMsg");
        $this->Fields['facebookProfileId'] = &$this->facebookProfileId;

        // twitterProfileLink
        $this->twitterProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_twitterProfileLink', 'twitterProfileLink', '`twitterProfileLink`', '`twitterProfileLink`', 200, 250, -1, false, '`twitterProfileLink`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->twitterProfileLink->Sortable = true; // Allow sort
        $this->twitterProfileLink->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->twitterProfileLink->Param, "CustomMsg");
        $this->Fields['twitterProfileLink'] = &$this->twitterProfileLink;

        // twitterProfileId
        $this->twitterProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_twitterProfileId', 'twitterProfileId', '`twitterProfileId`', '`twitterProfileId`', 200, 50, -1, false, '`twitterProfileId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->twitterProfileId->Sortable = true; // Allow sort
        $this->twitterProfileId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->twitterProfileId->Param, "CustomMsg");
        $this->Fields['twitterProfileId'] = &$this->twitterProfileId;

        // googleProfileLink
        $this->googleProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_googleProfileLink', 'googleProfileLink', '`googleProfileLink`', '`googleProfileLink`', 200, 250, -1, false, '`googleProfileLink`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->googleProfileLink->Sortable = true; // Allow sort
        $this->googleProfileLink->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->googleProfileLink->Param, "CustomMsg");
        $this->Fields['googleProfileLink'] = &$this->googleProfileLink;

        // googleProfileId
        $this->googleProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_googleProfileId', 'googleProfileId', '`googleProfileId`', '`googleProfileId`', 200, 50, -1, false, '`googleProfileId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->googleProfileId->Sortable = true; // Allow sort
        $this->googleProfileId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->googleProfileId->Param, "CustomMsg");
        $this->Fields['googleProfileId'] = &$this->googleProfileId;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`recruitment_candidates`";
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
        $this->first_name->DbValue = $row['first_name'];
        $this->last_name->DbValue = $row['last_name'];
        $this->nationality->DbValue = $row['nationality'];
        $this->birthday->DbValue = $row['birthday'];
        $this->gender->DbValue = $row['gender'];
        $this->marital_status->DbValue = $row['marital_status'];
        $this->address1->DbValue = $row['address1'];
        $this->address2->DbValue = $row['address2'];
        $this->city->DbValue = $row['city'];
        $this->country->DbValue = $row['country'];
        $this->province->DbValue = $row['province'];
        $this->postal_code->DbValue = $row['postal_code'];
        $this->_email->DbValue = $row['email'];
        $this->home_phone->DbValue = $row['home_phone'];
        $this->mobile_phone->DbValue = $row['mobile_phone'];
        $this->cv_title->DbValue = $row['cv_title'];
        $this->cv->DbValue = $row['cv'];
        $this->cvtext->DbValue = $row['cvtext'];
        $this->industry->DbValue = $row['industry'];
        $this->profileImage->DbValue = $row['profileImage'];
        $this->head_line->DbValue = $row['head_line'];
        $this->objective->DbValue = $row['objective'];
        $this->work_history->DbValue = $row['work_history'];
        $this->education->DbValue = $row['education'];
        $this->skills->DbValue = $row['skills'];
        $this->referees->DbValue = $row['referees'];
        $this->linkedInUrl->DbValue = $row['linkedInUrl'];
        $this->linkedInData->DbValue = $row['linkedInData'];
        $this->totalYearsOfExperience->DbValue = $row['totalYearsOfExperience'];
        $this->totalMonthsOfExperience->DbValue = $row['totalMonthsOfExperience'];
        $this->htmlCVData->DbValue = $row['htmlCVData'];
        $this->generatedCVFile->DbValue = $row['generatedCVFile'];
        $this->created->DbValue = $row['created'];
        $this->updated->DbValue = $row['updated'];
        $this->expectedSalary->DbValue = $row['expectedSalary'];
        $this->preferedPositions->DbValue = $row['preferedPositions'];
        $this->preferedJobtype->DbValue = $row['preferedJobtype'];
        $this->preferedCountries->DbValue = $row['preferedCountries'];
        $this->tags->DbValue = $row['tags'];
        $this->notes->DbValue = $row['notes'];
        $this->calls->DbValue = $row['calls'];
        $this->age->DbValue = $row['age'];
        $this->hash->DbValue = $row['hash'];
        $this->linkedInProfileLink->DbValue = $row['linkedInProfileLink'];
        $this->linkedInProfileId->DbValue = $row['linkedInProfileId'];
        $this->facebookProfileLink->DbValue = $row['facebookProfileLink'];
        $this->facebookProfileId->DbValue = $row['facebookProfileId'];
        $this->twitterProfileLink->DbValue = $row['twitterProfileLink'];
        $this->twitterProfileId->DbValue = $row['twitterProfileId'];
        $this->googleProfileLink->DbValue = $row['googleProfileLink'];
        $this->googleProfileId->DbValue = $row['googleProfileId'];
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
        return $_SESSION[$name] ?? GetUrl("RecruitmentCandidatesList");
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
        if ($pageName == "RecruitmentCandidatesView") {
            return $Language->phrase("View");
        } elseif ($pageName == "RecruitmentCandidatesEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "RecruitmentCandidatesAdd") {
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
                return "RecruitmentCandidatesView";
            case Config("API_ADD_ACTION"):
                return "RecruitmentCandidatesAdd";
            case Config("API_EDIT_ACTION"):
                return "RecruitmentCandidatesEdit";
            case Config("API_DELETE_ACTION"):
                return "RecruitmentCandidatesDelete";
            case Config("API_LIST_ACTION"):
                return "RecruitmentCandidatesList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "RecruitmentCandidatesList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("RecruitmentCandidatesView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("RecruitmentCandidatesView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "RecruitmentCandidatesAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "RecruitmentCandidatesAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("RecruitmentCandidatesEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("RecruitmentCandidatesAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("RecruitmentCandidatesDelete", $this->getUrlParm());
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
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->gender->setDbValue($row['gender']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->_email->setDbValue($row['email']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->cv_title->setDbValue($row['cv_title']);
        $this->cv->setDbValue($row['cv']);
        $this->cvtext->setDbValue($row['cvtext']);
        $this->industry->setDbValue($row['industry']);
        $this->profileImage->setDbValue($row['profileImage']);
        $this->head_line->setDbValue($row['head_line']);
        $this->objective->setDbValue($row['objective']);
        $this->work_history->setDbValue($row['work_history']);
        $this->education->setDbValue($row['education']);
        $this->skills->setDbValue($row['skills']);
        $this->referees->setDbValue($row['referees']);
        $this->linkedInUrl->setDbValue($row['linkedInUrl']);
        $this->linkedInData->setDbValue($row['linkedInData']);
        $this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
        $this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
        $this->htmlCVData->setDbValue($row['htmlCVData']);
        $this->generatedCVFile->setDbValue($row['generatedCVFile']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->expectedSalary->setDbValue($row['expectedSalary']);
        $this->preferedPositions->setDbValue($row['preferedPositions']);
        $this->preferedJobtype->setDbValue($row['preferedJobtype']);
        $this->preferedCountries->setDbValue($row['preferedCountries']);
        $this->tags->setDbValue($row['tags']);
        $this->notes->setDbValue($row['notes']);
        $this->calls->setDbValue($row['calls']);
        $this->age->setDbValue($row['age']);
        $this->hash->setDbValue($row['hash']);
        $this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
        $this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
        $this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
        $this->facebookProfileId->setDbValue($row['facebookProfileId']);
        $this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
        $this->twitterProfileId->setDbValue($row['twitterProfileId']);
        $this->googleProfileLink->setDbValue($row['googleProfileLink']);
        $this->googleProfileId->setDbValue($row['googleProfileId']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // first_name

        // last_name

        // nationality

        // birthday

        // gender

        // marital_status

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // email

        // home_phone

        // mobile_phone

        // cv_title

        // cv

        // cvtext

        // industry

        // profileImage

        // head_line

        // objective

        // work_history

        // education

        // skills

        // referees

        // linkedInUrl

        // linkedInData

        // totalYearsOfExperience

        // totalMonthsOfExperience

        // htmlCVData

        // generatedCVFile

        // created

        // updated

        // expectedSalary

        // preferedPositions

        // preferedJobtype

        // preferedCountries

        // tags

        // notes

        // calls

        // age

        // hash

        // linkedInProfileLink

        // linkedInProfileId

        // facebookProfileLink

        // facebookProfileId

        // twitterProfileLink

        // twitterProfileId

        // googleProfileLink

        // googleProfileId

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // first_name
        $this->first_name->ViewValue = $this->first_name->CurrentValue;
        $this->first_name->ViewCustomAttributes = "";

        // last_name
        $this->last_name->ViewValue = $this->last_name->CurrentValue;
        $this->last_name->ViewCustomAttributes = "";

        // nationality
        $this->nationality->ViewValue = $this->nationality->CurrentValue;
        $this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
        $this->nationality->ViewCustomAttributes = "";

        // birthday
        $this->birthday->ViewValue = $this->birthday->CurrentValue;
        $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
        $this->birthday->ViewCustomAttributes = "";

        // gender
        if (strval($this->gender->CurrentValue) != "") {
            $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
        } else {
            $this->gender->ViewValue = null;
        }
        $this->gender->ViewCustomAttributes = "";

        // marital_status
        if (strval($this->marital_status->CurrentValue) != "") {
            $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
        } else {
            $this->marital_status->ViewValue = null;
        }
        $this->marital_status->ViewCustomAttributes = "";

        // address1
        $this->address1->ViewValue = $this->address1->CurrentValue;
        $this->address1->ViewCustomAttributes = "";

        // address2
        $this->address2->ViewValue = $this->address2->CurrentValue;
        $this->address2->ViewCustomAttributes = "";

        // city
        $this->city->ViewValue = $this->city->CurrentValue;
        $this->city->ViewCustomAttributes = "";

        // country
        $this->country->ViewValue = $this->country->CurrentValue;
        $this->country->ViewCustomAttributes = "";

        // province
        $this->province->ViewValue = $this->province->CurrentValue;
        $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
        $this->province->ViewCustomAttributes = "";

        // postal_code
        $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
        $this->postal_code->ViewCustomAttributes = "";

        // email
        $this->_email->ViewValue = $this->_email->CurrentValue;
        $this->_email->ViewCustomAttributes = "";

        // home_phone
        $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
        $this->home_phone->ViewCustomAttributes = "";

        // mobile_phone
        $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
        $this->mobile_phone->ViewCustomAttributes = "";

        // cv_title
        $this->cv_title->ViewValue = $this->cv_title->CurrentValue;
        $this->cv_title->ViewCustomAttributes = "";

        // cv
        $this->cv->ViewValue = $this->cv->CurrentValue;
        $this->cv->ViewCustomAttributes = "";

        // cvtext
        $this->cvtext->ViewValue = $this->cvtext->CurrentValue;
        $this->cvtext->ViewCustomAttributes = "";

        // industry
        $this->industry->ViewValue = $this->industry->CurrentValue;
        $this->industry->ViewCustomAttributes = "";

        // profileImage
        $this->profileImage->ViewValue = $this->profileImage->CurrentValue;
        $this->profileImage->ViewCustomAttributes = "";

        // head_line
        $this->head_line->ViewValue = $this->head_line->CurrentValue;
        $this->head_line->ViewCustomAttributes = "";

        // objective
        $this->objective->ViewValue = $this->objective->CurrentValue;
        $this->objective->ViewCustomAttributes = "";

        // work_history
        $this->work_history->ViewValue = $this->work_history->CurrentValue;
        $this->work_history->ViewCustomAttributes = "";

        // education
        $this->education->ViewValue = $this->education->CurrentValue;
        $this->education->ViewCustomAttributes = "";

        // skills
        $this->skills->ViewValue = $this->skills->CurrentValue;
        $this->skills->ViewCustomAttributes = "";

        // referees
        $this->referees->ViewValue = $this->referees->CurrentValue;
        $this->referees->ViewCustomAttributes = "";

        // linkedInUrl
        $this->linkedInUrl->ViewValue = $this->linkedInUrl->CurrentValue;
        $this->linkedInUrl->ViewCustomAttributes = "";

        // linkedInData
        $this->linkedInData->ViewValue = $this->linkedInData->CurrentValue;
        $this->linkedInData->ViewCustomAttributes = "";

        // totalYearsOfExperience
        $this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
        $this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
        $this->totalYearsOfExperience->ViewCustomAttributes = "";

        // totalMonthsOfExperience
        $this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
        $this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
        $this->totalMonthsOfExperience->ViewCustomAttributes = "";

        // htmlCVData
        $this->htmlCVData->ViewValue = $this->htmlCVData->CurrentValue;
        $this->htmlCVData->ViewCustomAttributes = "";

        // generatedCVFile
        $this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
        $this->generatedCVFile->ViewCustomAttributes = "";

        // created
        $this->created->ViewValue = $this->created->CurrentValue;
        $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
        $this->created->ViewCustomAttributes = "";

        // updated
        $this->updated->ViewValue = $this->updated->CurrentValue;
        $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
        $this->updated->ViewCustomAttributes = "";

        // expectedSalary
        $this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
        $this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
        $this->expectedSalary->ViewCustomAttributes = "";

        // preferedPositions
        $this->preferedPositions->ViewValue = $this->preferedPositions->CurrentValue;
        $this->preferedPositions->ViewCustomAttributes = "";

        // preferedJobtype
        $this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
        $this->preferedJobtype->ViewCustomAttributes = "";

        // preferedCountries
        $this->preferedCountries->ViewValue = $this->preferedCountries->CurrentValue;
        $this->preferedCountries->ViewCustomAttributes = "";

        // tags
        $this->tags->ViewValue = $this->tags->CurrentValue;
        $this->tags->ViewCustomAttributes = "";

        // notes
        $this->notes->ViewValue = $this->notes->CurrentValue;
        $this->notes->ViewCustomAttributes = "";

        // calls
        $this->calls->ViewValue = $this->calls->CurrentValue;
        $this->calls->ViewCustomAttributes = "";

        // age
        $this->age->ViewValue = $this->age->CurrentValue;
        $this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
        $this->age->ViewCustomAttributes = "";

        // hash
        $this->hash->ViewValue = $this->hash->CurrentValue;
        $this->hash->ViewCustomAttributes = "";

        // linkedInProfileLink
        $this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
        $this->linkedInProfileLink->ViewCustomAttributes = "";

        // linkedInProfileId
        $this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
        $this->linkedInProfileId->ViewCustomAttributes = "";

        // facebookProfileLink
        $this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
        $this->facebookProfileLink->ViewCustomAttributes = "";

        // facebookProfileId
        $this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
        $this->facebookProfileId->ViewCustomAttributes = "";

        // twitterProfileLink
        $this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
        $this->twitterProfileLink->ViewCustomAttributes = "";

        // twitterProfileId
        $this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
        $this->twitterProfileId->ViewCustomAttributes = "";

        // googleProfileLink
        $this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
        $this->googleProfileLink->ViewCustomAttributes = "";

        // googleProfileId
        $this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
        $this->googleProfileId->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // first_name
        $this->first_name->LinkCustomAttributes = "";
        $this->first_name->HrefValue = "";
        $this->first_name->TooltipValue = "";

        // last_name
        $this->last_name->LinkCustomAttributes = "";
        $this->last_name->HrefValue = "";
        $this->last_name->TooltipValue = "";

        // nationality
        $this->nationality->LinkCustomAttributes = "";
        $this->nationality->HrefValue = "";
        $this->nationality->TooltipValue = "";

        // birthday
        $this->birthday->LinkCustomAttributes = "";
        $this->birthday->HrefValue = "";
        $this->birthday->TooltipValue = "";

        // gender
        $this->gender->LinkCustomAttributes = "";
        $this->gender->HrefValue = "";
        $this->gender->TooltipValue = "";

        // marital_status
        $this->marital_status->LinkCustomAttributes = "";
        $this->marital_status->HrefValue = "";
        $this->marital_status->TooltipValue = "";

        // address1
        $this->address1->LinkCustomAttributes = "";
        $this->address1->HrefValue = "";
        $this->address1->TooltipValue = "";

        // address2
        $this->address2->LinkCustomAttributes = "";
        $this->address2->HrefValue = "";
        $this->address2->TooltipValue = "";

        // city
        $this->city->LinkCustomAttributes = "";
        $this->city->HrefValue = "";
        $this->city->TooltipValue = "";

        // country
        $this->country->LinkCustomAttributes = "";
        $this->country->HrefValue = "";
        $this->country->TooltipValue = "";

        // province
        $this->province->LinkCustomAttributes = "";
        $this->province->HrefValue = "";
        $this->province->TooltipValue = "";

        // postal_code
        $this->postal_code->LinkCustomAttributes = "";
        $this->postal_code->HrefValue = "";
        $this->postal_code->TooltipValue = "";

        // email
        $this->_email->LinkCustomAttributes = "";
        $this->_email->HrefValue = "";
        $this->_email->TooltipValue = "";

        // home_phone
        $this->home_phone->LinkCustomAttributes = "";
        $this->home_phone->HrefValue = "";
        $this->home_phone->TooltipValue = "";

        // mobile_phone
        $this->mobile_phone->LinkCustomAttributes = "";
        $this->mobile_phone->HrefValue = "";
        $this->mobile_phone->TooltipValue = "";

        // cv_title
        $this->cv_title->LinkCustomAttributes = "";
        $this->cv_title->HrefValue = "";
        $this->cv_title->TooltipValue = "";

        // cv
        $this->cv->LinkCustomAttributes = "";
        $this->cv->HrefValue = "";
        $this->cv->TooltipValue = "";

        // cvtext
        $this->cvtext->LinkCustomAttributes = "";
        $this->cvtext->HrefValue = "";
        $this->cvtext->TooltipValue = "";

        // industry
        $this->industry->LinkCustomAttributes = "";
        $this->industry->HrefValue = "";
        $this->industry->TooltipValue = "";

        // profileImage
        $this->profileImage->LinkCustomAttributes = "";
        $this->profileImage->HrefValue = "";
        $this->profileImage->TooltipValue = "";

        // head_line
        $this->head_line->LinkCustomAttributes = "";
        $this->head_line->HrefValue = "";
        $this->head_line->TooltipValue = "";

        // objective
        $this->objective->LinkCustomAttributes = "";
        $this->objective->HrefValue = "";
        $this->objective->TooltipValue = "";

        // work_history
        $this->work_history->LinkCustomAttributes = "";
        $this->work_history->HrefValue = "";
        $this->work_history->TooltipValue = "";

        // education
        $this->education->LinkCustomAttributes = "";
        $this->education->HrefValue = "";
        $this->education->TooltipValue = "";

        // skills
        $this->skills->LinkCustomAttributes = "";
        $this->skills->HrefValue = "";
        $this->skills->TooltipValue = "";

        // referees
        $this->referees->LinkCustomAttributes = "";
        $this->referees->HrefValue = "";
        $this->referees->TooltipValue = "";

        // linkedInUrl
        $this->linkedInUrl->LinkCustomAttributes = "";
        $this->linkedInUrl->HrefValue = "";
        $this->linkedInUrl->TooltipValue = "";

        // linkedInData
        $this->linkedInData->LinkCustomAttributes = "";
        $this->linkedInData->HrefValue = "";
        $this->linkedInData->TooltipValue = "";

        // totalYearsOfExperience
        $this->totalYearsOfExperience->LinkCustomAttributes = "";
        $this->totalYearsOfExperience->HrefValue = "";
        $this->totalYearsOfExperience->TooltipValue = "";

        // totalMonthsOfExperience
        $this->totalMonthsOfExperience->LinkCustomAttributes = "";
        $this->totalMonthsOfExperience->HrefValue = "";
        $this->totalMonthsOfExperience->TooltipValue = "";

        // htmlCVData
        $this->htmlCVData->LinkCustomAttributes = "";
        $this->htmlCVData->HrefValue = "";
        $this->htmlCVData->TooltipValue = "";

        // generatedCVFile
        $this->generatedCVFile->LinkCustomAttributes = "";
        $this->generatedCVFile->HrefValue = "";
        $this->generatedCVFile->TooltipValue = "";

        // created
        $this->created->LinkCustomAttributes = "";
        $this->created->HrefValue = "";
        $this->created->TooltipValue = "";

        // updated
        $this->updated->LinkCustomAttributes = "";
        $this->updated->HrefValue = "";
        $this->updated->TooltipValue = "";

        // expectedSalary
        $this->expectedSalary->LinkCustomAttributes = "";
        $this->expectedSalary->HrefValue = "";
        $this->expectedSalary->TooltipValue = "";

        // preferedPositions
        $this->preferedPositions->LinkCustomAttributes = "";
        $this->preferedPositions->HrefValue = "";
        $this->preferedPositions->TooltipValue = "";

        // preferedJobtype
        $this->preferedJobtype->LinkCustomAttributes = "";
        $this->preferedJobtype->HrefValue = "";
        $this->preferedJobtype->TooltipValue = "";

        // preferedCountries
        $this->preferedCountries->LinkCustomAttributes = "";
        $this->preferedCountries->HrefValue = "";
        $this->preferedCountries->TooltipValue = "";

        // tags
        $this->tags->LinkCustomAttributes = "";
        $this->tags->HrefValue = "";
        $this->tags->TooltipValue = "";

        // notes
        $this->notes->LinkCustomAttributes = "";
        $this->notes->HrefValue = "";
        $this->notes->TooltipValue = "";

        // calls
        $this->calls->LinkCustomAttributes = "";
        $this->calls->HrefValue = "";
        $this->calls->TooltipValue = "";

        // age
        $this->age->LinkCustomAttributes = "";
        $this->age->HrefValue = "";
        $this->age->TooltipValue = "";

        // hash
        $this->hash->LinkCustomAttributes = "";
        $this->hash->HrefValue = "";
        $this->hash->TooltipValue = "";

        // linkedInProfileLink
        $this->linkedInProfileLink->LinkCustomAttributes = "";
        $this->linkedInProfileLink->HrefValue = "";
        $this->linkedInProfileLink->TooltipValue = "";

        // linkedInProfileId
        $this->linkedInProfileId->LinkCustomAttributes = "";
        $this->linkedInProfileId->HrefValue = "";
        $this->linkedInProfileId->TooltipValue = "";

        // facebookProfileLink
        $this->facebookProfileLink->LinkCustomAttributes = "";
        $this->facebookProfileLink->HrefValue = "";
        $this->facebookProfileLink->TooltipValue = "";

        // facebookProfileId
        $this->facebookProfileId->LinkCustomAttributes = "";
        $this->facebookProfileId->HrefValue = "";
        $this->facebookProfileId->TooltipValue = "";

        // twitterProfileLink
        $this->twitterProfileLink->LinkCustomAttributes = "";
        $this->twitterProfileLink->HrefValue = "";
        $this->twitterProfileLink->TooltipValue = "";

        // twitterProfileId
        $this->twitterProfileId->LinkCustomAttributes = "";
        $this->twitterProfileId->HrefValue = "";
        $this->twitterProfileId->TooltipValue = "";

        // googleProfileLink
        $this->googleProfileLink->LinkCustomAttributes = "";
        $this->googleProfileLink->HrefValue = "";
        $this->googleProfileLink->TooltipValue = "";

        // googleProfileId
        $this->googleProfileId->LinkCustomAttributes = "";
        $this->googleProfileId->HrefValue = "";
        $this->googleProfileId->TooltipValue = "";

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

        // first_name
        $this->first_name->EditAttrs["class"] = "form-control";
        $this->first_name->EditCustomAttributes = "";
        if (!$this->first_name->Raw) {
            $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
        }
        $this->first_name->EditValue = $this->first_name->CurrentValue;
        $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

        // last_name
        $this->last_name->EditAttrs["class"] = "form-control";
        $this->last_name->EditCustomAttributes = "";
        if (!$this->last_name->Raw) {
            $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
        }
        $this->last_name->EditValue = $this->last_name->CurrentValue;
        $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

        // nationality
        $this->nationality->EditAttrs["class"] = "form-control";
        $this->nationality->EditCustomAttributes = "";
        $this->nationality->EditValue = $this->nationality->CurrentValue;
        $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

        // birthday
        $this->birthday->EditAttrs["class"] = "form-control";
        $this->birthday->EditCustomAttributes = "";
        $this->birthday->EditValue = FormatDateTime($this->birthday->CurrentValue, 8);
        $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

        // gender
        $this->gender->EditCustomAttributes = "";
        $this->gender->EditValue = $this->gender->options(false);
        $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

        // marital_status
        $this->marital_status->EditCustomAttributes = "";
        $this->marital_status->EditValue = $this->marital_status->options(false);
        $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

        // address1
        $this->address1->EditAttrs["class"] = "form-control";
        $this->address1->EditCustomAttributes = "";
        if (!$this->address1->Raw) {
            $this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
        }
        $this->address1->EditValue = $this->address1->CurrentValue;
        $this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

        // address2
        $this->address2->EditAttrs["class"] = "form-control";
        $this->address2->EditCustomAttributes = "";
        if (!$this->address2->Raw) {
            $this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
        }
        $this->address2->EditValue = $this->address2->CurrentValue;
        $this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

        // city
        $this->city->EditAttrs["class"] = "form-control";
        $this->city->EditCustomAttributes = "";
        if (!$this->city->Raw) {
            $this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
        }
        $this->city->EditValue = $this->city->CurrentValue;
        $this->city->PlaceHolder = RemoveHtml($this->city->caption());

        // country
        $this->country->EditAttrs["class"] = "form-control";
        $this->country->EditCustomAttributes = "";
        if (!$this->country->Raw) {
            $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
        }
        $this->country->EditValue = $this->country->CurrentValue;
        $this->country->PlaceHolder = RemoveHtml($this->country->caption());

        // province
        $this->province->EditAttrs["class"] = "form-control";
        $this->province->EditCustomAttributes = "";
        $this->province->EditValue = $this->province->CurrentValue;
        $this->province->PlaceHolder = RemoveHtml($this->province->caption());

        // postal_code
        $this->postal_code->EditAttrs["class"] = "form-control";
        $this->postal_code->EditCustomAttributes = "";
        if (!$this->postal_code->Raw) {
            $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
        }
        $this->postal_code->EditValue = $this->postal_code->CurrentValue;
        $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

        // email
        $this->_email->EditAttrs["class"] = "form-control";
        $this->_email->EditCustomAttributes = "";
        if (!$this->_email->Raw) {
            $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
        }
        $this->_email->EditValue = $this->_email->CurrentValue;
        $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

        // home_phone
        $this->home_phone->EditAttrs["class"] = "form-control";
        $this->home_phone->EditCustomAttributes = "";
        if (!$this->home_phone->Raw) {
            $this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
        }
        $this->home_phone->EditValue = $this->home_phone->CurrentValue;
        $this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

        // mobile_phone
        $this->mobile_phone->EditAttrs["class"] = "form-control";
        $this->mobile_phone->EditCustomAttributes = "";
        if (!$this->mobile_phone->Raw) {
            $this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
        }
        $this->mobile_phone->EditValue = $this->mobile_phone->CurrentValue;
        $this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

        // cv_title
        $this->cv_title->EditAttrs["class"] = "form-control";
        $this->cv_title->EditCustomAttributes = "";
        if (!$this->cv_title->Raw) {
            $this->cv_title->CurrentValue = HtmlDecode($this->cv_title->CurrentValue);
        }
        $this->cv_title->EditValue = $this->cv_title->CurrentValue;
        $this->cv_title->PlaceHolder = RemoveHtml($this->cv_title->caption());

        // cv
        $this->cv->EditAttrs["class"] = "form-control";
        $this->cv->EditCustomAttributes = "";
        if (!$this->cv->Raw) {
            $this->cv->CurrentValue = HtmlDecode($this->cv->CurrentValue);
        }
        $this->cv->EditValue = $this->cv->CurrentValue;
        $this->cv->PlaceHolder = RemoveHtml($this->cv->caption());

        // cvtext
        $this->cvtext->EditAttrs["class"] = "form-control";
        $this->cvtext->EditCustomAttributes = "";
        $this->cvtext->EditValue = $this->cvtext->CurrentValue;
        $this->cvtext->PlaceHolder = RemoveHtml($this->cvtext->caption());

        // industry
        $this->industry->EditAttrs["class"] = "form-control";
        $this->industry->EditCustomAttributes = "";
        $this->industry->EditValue = $this->industry->CurrentValue;
        $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

        // profileImage
        $this->profileImage->EditAttrs["class"] = "form-control";
        $this->profileImage->EditCustomAttributes = "";
        if (!$this->profileImage->Raw) {
            $this->profileImage->CurrentValue = HtmlDecode($this->profileImage->CurrentValue);
        }
        $this->profileImage->EditValue = $this->profileImage->CurrentValue;
        $this->profileImage->PlaceHolder = RemoveHtml($this->profileImage->caption());

        // head_line
        $this->head_line->EditAttrs["class"] = "form-control";
        $this->head_line->EditCustomAttributes = "";
        $this->head_line->EditValue = $this->head_line->CurrentValue;
        $this->head_line->PlaceHolder = RemoveHtml($this->head_line->caption());

        // objective
        $this->objective->EditAttrs["class"] = "form-control";
        $this->objective->EditCustomAttributes = "";
        $this->objective->EditValue = $this->objective->CurrentValue;
        $this->objective->PlaceHolder = RemoveHtml($this->objective->caption());

        // work_history
        $this->work_history->EditAttrs["class"] = "form-control";
        $this->work_history->EditCustomAttributes = "";
        $this->work_history->EditValue = $this->work_history->CurrentValue;
        $this->work_history->PlaceHolder = RemoveHtml($this->work_history->caption());

        // education
        $this->education->EditAttrs["class"] = "form-control";
        $this->education->EditCustomAttributes = "";
        $this->education->EditValue = $this->education->CurrentValue;
        $this->education->PlaceHolder = RemoveHtml($this->education->caption());

        // skills
        $this->skills->EditAttrs["class"] = "form-control";
        $this->skills->EditCustomAttributes = "";
        $this->skills->EditValue = $this->skills->CurrentValue;
        $this->skills->PlaceHolder = RemoveHtml($this->skills->caption());

        // referees
        $this->referees->EditAttrs["class"] = "form-control";
        $this->referees->EditCustomAttributes = "";
        $this->referees->EditValue = $this->referees->CurrentValue;
        $this->referees->PlaceHolder = RemoveHtml($this->referees->caption());

        // linkedInUrl
        $this->linkedInUrl->EditAttrs["class"] = "form-control";
        $this->linkedInUrl->EditCustomAttributes = "";
        $this->linkedInUrl->EditValue = $this->linkedInUrl->CurrentValue;
        $this->linkedInUrl->PlaceHolder = RemoveHtml($this->linkedInUrl->caption());

        // linkedInData
        $this->linkedInData->EditAttrs["class"] = "form-control";
        $this->linkedInData->EditCustomAttributes = "";
        $this->linkedInData->EditValue = $this->linkedInData->CurrentValue;
        $this->linkedInData->PlaceHolder = RemoveHtml($this->linkedInData->caption());

        // totalYearsOfExperience
        $this->totalYearsOfExperience->EditAttrs["class"] = "form-control";
        $this->totalYearsOfExperience->EditCustomAttributes = "";
        $this->totalYearsOfExperience->EditValue = $this->totalYearsOfExperience->CurrentValue;
        $this->totalYearsOfExperience->PlaceHolder = RemoveHtml($this->totalYearsOfExperience->caption());

        // totalMonthsOfExperience
        $this->totalMonthsOfExperience->EditAttrs["class"] = "form-control";
        $this->totalMonthsOfExperience->EditCustomAttributes = "";
        $this->totalMonthsOfExperience->EditValue = $this->totalMonthsOfExperience->CurrentValue;
        $this->totalMonthsOfExperience->PlaceHolder = RemoveHtml($this->totalMonthsOfExperience->caption());

        // htmlCVData
        $this->htmlCVData->EditAttrs["class"] = "form-control";
        $this->htmlCVData->EditCustomAttributes = "";
        $this->htmlCVData->EditValue = $this->htmlCVData->CurrentValue;
        $this->htmlCVData->PlaceHolder = RemoveHtml($this->htmlCVData->caption());

        // generatedCVFile
        $this->generatedCVFile->EditAttrs["class"] = "form-control";
        $this->generatedCVFile->EditCustomAttributes = "";
        if (!$this->generatedCVFile->Raw) {
            $this->generatedCVFile->CurrentValue = HtmlDecode($this->generatedCVFile->CurrentValue);
        }
        $this->generatedCVFile->EditValue = $this->generatedCVFile->CurrentValue;
        $this->generatedCVFile->PlaceHolder = RemoveHtml($this->generatedCVFile->caption());

        // created
        $this->created->EditAttrs["class"] = "form-control";
        $this->created->EditCustomAttributes = "";
        $this->created->EditValue = FormatDateTime($this->created->CurrentValue, 8);
        $this->created->PlaceHolder = RemoveHtml($this->created->caption());

        // updated
        $this->updated->EditAttrs["class"] = "form-control";
        $this->updated->EditCustomAttributes = "";
        $this->updated->EditValue = FormatDateTime($this->updated->CurrentValue, 8);
        $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

        // expectedSalary
        $this->expectedSalary->EditAttrs["class"] = "form-control";
        $this->expectedSalary->EditCustomAttributes = "";
        $this->expectedSalary->EditValue = $this->expectedSalary->CurrentValue;
        $this->expectedSalary->PlaceHolder = RemoveHtml($this->expectedSalary->caption());

        // preferedPositions
        $this->preferedPositions->EditAttrs["class"] = "form-control";
        $this->preferedPositions->EditCustomAttributes = "";
        $this->preferedPositions->EditValue = $this->preferedPositions->CurrentValue;
        $this->preferedPositions->PlaceHolder = RemoveHtml($this->preferedPositions->caption());

        // preferedJobtype
        $this->preferedJobtype->EditAttrs["class"] = "form-control";
        $this->preferedJobtype->EditCustomAttributes = "";
        if (!$this->preferedJobtype->Raw) {
            $this->preferedJobtype->CurrentValue = HtmlDecode($this->preferedJobtype->CurrentValue);
        }
        $this->preferedJobtype->EditValue = $this->preferedJobtype->CurrentValue;
        $this->preferedJobtype->PlaceHolder = RemoveHtml($this->preferedJobtype->caption());

        // preferedCountries
        $this->preferedCountries->EditAttrs["class"] = "form-control";
        $this->preferedCountries->EditCustomAttributes = "";
        $this->preferedCountries->EditValue = $this->preferedCountries->CurrentValue;
        $this->preferedCountries->PlaceHolder = RemoveHtml($this->preferedCountries->caption());

        // tags
        $this->tags->EditAttrs["class"] = "form-control";
        $this->tags->EditCustomAttributes = "";
        $this->tags->EditValue = $this->tags->CurrentValue;
        $this->tags->PlaceHolder = RemoveHtml($this->tags->caption());

        // notes
        $this->notes->EditAttrs["class"] = "form-control";
        $this->notes->EditCustomAttributes = "";
        $this->notes->EditValue = $this->notes->CurrentValue;
        $this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

        // calls
        $this->calls->EditAttrs["class"] = "form-control";
        $this->calls->EditCustomAttributes = "";
        $this->calls->EditValue = $this->calls->CurrentValue;
        $this->calls->PlaceHolder = RemoveHtml($this->calls->caption());

        // age
        $this->age->EditAttrs["class"] = "form-control";
        $this->age->EditCustomAttributes = "";
        $this->age->EditValue = $this->age->CurrentValue;
        $this->age->PlaceHolder = RemoveHtml($this->age->caption());

        // hash
        $this->hash->EditAttrs["class"] = "form-control";
        $this->hash->EditCustomAttributes = "";
        if (!$this->hash->Raw) {
            $this->hash->CurrentValue = HtmlDecode($this->hash->CurrentValue);
        }
        $this->hash->EditValue = $this->hash->CurrentValue;
        $this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

        // linkedInProfileLink
        $this->linkedInProfileLink->EditAttrs["class"] = "form-control";
        $this->linkedInProfileLink->EditCustomAttributes = "";
        if (!$this->linkedInProfileLink->Raw) {
            $this->linkedInProfileLink->CurrentValue = HtmlDecode($this->linkedInProfileLink->CurrentValue);
        }
        $this->linkedInProfileLink->EditValue = $this->linkedInProfileLink->CurrentValue;
        $this->linkedInProfileLink->PlaceHolder = RemoveHtml($this->linkedInProfileLink->caption());

        // linkedInProfileId
        $this->linkedInProfileId->EditAttrs["class"] = "form-control";
        $this->linkedInProfileId->EditCustomAttributes = "";
        if (!$this->linkedInProfileId->Raw) {
            $this->linkedInProfileId->CurrentValue = HtmlDecode($this->linkedInProfileId->CurrentValue);
        }
        $this->linkedInProfileId->EditValue = $this->linkedInProfileId->CurrentValue;
        $this->linkedInProfileId->PlaceHolder = RemoveHtml($this->linkedInProfileId->caption());

        // facebookProfileLink
        $this->facebookProfileLink->EditAttrs["class"] = "form-control";
        $this->facebookProfileLink->EditCustomAttributes = "";
        if (!$this->facebookProfileLink->Raw) {
            $this->facebookProfileLink->CurrentValue = HtmlDecode($this->facebookProfileLink->CurrentValue);
        }
        $this->facebookProfileLink->EditValue = $this->facebookProfileLink->CurrentValue;
        $this->facebookProfileLink->PlaceHolder = RemoveHtml($this->facebookProfileLink->caption());

        // facebookProfileId
        $this->facebookProfileId->EditAttrs["class"] = "form-control";
        $this->facebookProfileId->EditCustomAttributes = "";
        if (!$this->facebookProfileId->Raw) {
            $this->facebookProfileId->CurrentValue = HtmlDecode($this->facebookProfileId->CurrentValue);
        }
        $this->facebookProfileId->EditValue = $this->facebookProfileId->CurrentValue;
        $this->facebookProfileId->PlaceHolder = RemoveHtml($this->facebookProfileId->caption());

        // twitterProfileLink
        $this->twitterProfileLink->EditAttrs["class"] = "form-control";
        $this->twitterProfileLink->EditCustomAttributes = "";
        if (!$this->twitterProfileLink->Raw) {
            $this->twitterProfileLink->CurrentValue = HtmlDecode($this->twitterProfileLink->CurrentValue);
        }
        $this->twitterProfileLink->EditValue = $this->twitterProfileLink->CurrentValue;
        $this->twitterProfileLink->PlaceHolder = RemoveHtml($this->twitterProfileLink->caption());

        // twitterProfileId
        $this->twitterProfileId->EditAttrs["class"] = "form-control";
        $this->twitterProfileId->EditCustomAttributes = "";
        if (!$this->twitterProfileId->Raw) {
            $this->twitterProfileId->CurrentValue = HtmlDecode($this->twitterProfileId->CurrentValue);
        }
        $this->twitterProfileId->EditValue = $this->twitterProfileId->CurrentValue;
        $this->twitterProfileId->PlaceHolder = RemoveHtml($this->twitterProfileId->caption());

        // googleProfileLink
        $this->googleProfileLink->EditAttrs["class"] = "form-control";
        $this->googleProfileLink->EditCustomAttributes = "";
        if (!$this->googleProfileLink->Raw) {
            $this->googleProfileLink->CurrentValue = HtmlDecode($this->googleProfileLink->CurrentValue);
        }
        $this->googleProfileLink->EditValue = $this->googleProfileLink->CurrentValue;
        $this->googleProfileLink->PlaceHolder = RemoveHtml($this->googleProfileLink->caption());

        // googleProfileId
        $this->googleProfileId->EditAttrs["class"] = "form-control";
        $this->googleProfileId->EditCustomAttributes = "";
        if (!$this->googleProfileId->Raw) {
            $this->googleProfileId->CurrentValue = HtmlDecode($this->googleProfileId->CurrentValue);
        }
        $this->googleProfileId->EditValue = $this->googleProfileId->CurrentValue;
        $this->googleProfileId->PlaceHolder = RemoveHtml($this->googleProfileId->caption());

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
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->nationality);
                    $doc->exportCaption($this->birthday);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->marital_status);
                    $doc->exportCaption($this->address1);
                    $doc->exportCaption($this->address2);
                    $doc->exportCaption($this->city);
                    $doc->exportCaption($this->country);
                    $doc->exportCaption($this->province);
                    $doc->exportCaption($this->postal_code);
                    $doc->exportCaption($this->_email);
                    $doc->exportCaption($this->home_phone);
                    $doc->exportCaption($this->mobile_phone);
                    $doc->exportCaption($this->cv_title);
                    $doc->exportCaption($this->cv);
                    $doc->exportCaption($this->cvtext);
                    $doc->exportCaption($this->industry);
                    $doc->exportCaption($this->profileImage);
                    $doc->exportCaption($this->head_line);
                    $doc->exportCaption($this->objective);
                    $doc->exportCaption($this->work_history);
                    $doc->exportCaption($this->education);
                    $doc->exportCaption($this->skills);
                    $doc->exportCaption($this->referees);
                    $doc->exportCaption($this->linkedInUrl);
                    $doc->exportCaption($this->linkedInData);
                    $doc->exportCaption($this->totalYearsOfExperience);
                    $doc->exportCaption($this->totalMonthsOfExperience);
                    $doc->exportCaption($this->htmlCVData);
                    $doc->exportCaption($this->generatedCVFile);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
                    $doc->exportCaption($this->expectedSalary);
                    $doc->exportCaption($this->preferedPositions);
                    $doc->exportCaption($this->preferedJobtype);
                    $doc->exportCaption($this->preferedCountries);
                    $doc->exportCaption($this->tags);
                    $doc->exportCaption($this->notes);
                    $doc->exportCaption($this->calls);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->hash);
                    $doc->exportCaption($this->linkedInProfileLink);
                    $doc->exportCaption($this->linkedInProfileId);
                    $doc->exportCaption($this->facebookProfileLink);
                    $doc->exportCaption($this->facebookProfileId);
                    $doc->exportCaption($this->twitterProfileLink);
                    $doc->exportCaption($this->twitterProfileId);
                    $doc->exportCaption($this->googleProfileLink);
                    $doc->exportCaption($this->googleProfileId);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->first_name);
                    $doc->exportCaption($this->last_name);
                    $doc->exportCaption($this->nationality);
                    $doc->exportCaption($this->birthday);
                    $doc->exportCaption($this->gender);
                    $doc->exportCaption($this->marital_status);
                    $doc->exportCaption($this->address1);
                    $doc->exportCaption($this->address2);
                    $doc->exportCaption($this->city);
                    $doc->exportCaption($this->country);
                    $doc->exportCaption($this->province);
                    $doc->exportCaption($this->postal_code);
                    $doc->exportCaption($this->_email);
                    $doc->exportCaption($this->home_phone);
                    $doc->exportCaption($this->mobile_phone);
                    $doc->exportCaption($this->cv_title);
                    $doc->exportCaption($this->cv);
                    $doc->exportCaption($this->profileImage);
                    $doc->exportCaption($this->totalYearsOfExperience);
                    $doc->exportCaption($this->totalMonthsOfExperience);
                    $doc->exportCaption($this->generatedCVFile);
                    $doc->exportCaption($this->created);
                    $doc->exportCaption($this->updated);
                    $doc->exportCaption($this->expectedSalary);
                    $doc->exportCaption($this->preferedJobtype);
                    $doc->exportCaption($this->age);
                    $doc->exportCaption($this->hash);
                    $doc->exportCaption($this->linkedInProfileLink);
                    $doc->exportCaption($this->linkedInProfileId);
                    $doc->exportCaption($this->facebookProfileLink);
                    $doc->exportCaption($this->facebookProfileId);
                    $doc->exportCaption($this->twitterProfileLink);
                    $doc->exportCaption($this->twitterProfileId);
                    $doc->exportCaption($this->googleProfileLink);
                    $doc->exportCaption($this->googleProfileId);
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
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->nationality);
                        $doc->exportField($this->birthday);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->marital_status);
                        $doc->exportField($this->address1);
                        $doc->exportField($this->address2);
                        $doc->exportField($this->city);
                        $doc->exportField($this->country);
                        $doc->exportField($this->province);
                        $doc->exportField($this->postal_code);
                        $doc->exportField($this->_email);
                        $doc->exportField($this->home_phone);
                        $doc->exportField($this->mobile_phone);
                        $doc->exportField($this->cv_title);
                        $doc->exportField($this->cv);
                        $doc->exportField($this->cvtext);
                        $doc->exportField($this->industry);
                        $doc->exportField($this->profileImage);
                        $doc->exportField($this->head_line);
                        $doc->exportField($this->objective);
                        $doc->exportField($this->work_history);
                        $doc->exportField($this->education);
                        $doc->exportField($this->skills);
                        $doc->exportField($this->referees);
                        $doc->exportField($this->linkedInUrl);
                        $doc->exportField($this->linkedInData);
                        $doc->exportField($this->totalYearsOfExperience);
                        $doc->exportField($this->totalMonthsOfExperience);
                        $doc->exportField($this->htmlCVData);
                        $doc->exportField($this->generatedCVFile);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
                        $doc->exportField($this->expectedSalary);
                        $doc->exportField($this->preferedPositions);
                        $doc->exportField($this->preferedJobtype);
                        $doc->exportField($this->preferedCountries);
                        $doc->exportField($this->tags);
                        $doc->exportField($this->notes);
                        $doc->exportField($this->calls);
                        $doc->exportField($this->age);
                        $doc->exportField($this->hash);
                        $doc->exportField($this->linkedInProfileLink);
                        $doc->exportField($this->linkedInProfileId);
                        $doc->exportField($this->facebookProfileLink);
                        $doc->exportField($this->facebookProfileId);
                        $doc->exportField($this->twitterProfileLink);
                        $doc->exportField($this->twitterProfileId);
                        $doc->exportField($this->googleProfileLink);
                        $doc->exportField($this->googleProfileId);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->first_name);
                        $doc->exportField($this->last_name);
                        $doc->exportField($this->nationality);
                        $doc->exportField($this->birthday);
                        $doc->exportField($this->gender);
                        $doc->exportField($this->marital_status);
                        $doc->exportField($this->address1);
                        $doc->exportField($this->address2);
                        $doc->exportField($this->city);
                        $doc->exportField($this->country);
                        $doc->exportField($this->province);
                        $doc->exportField($this->postal_code);
                        $doc->exportField($this->_email);
                        $doc->exportField($this->home_phone);
                        $doc->exportField($this->mobile_phone);
                        $doc->exportField($this->cv_title);
                        $doc->exportField($this->cv);
                        $doc->exportField($this->profileImage);
                        $doc->exportField($this->totalYearsOfExperience);
                        $doc->exportField($this->totalMonthsOfExperience);
                        $doc->exportField($this->generatedCVFile);
                        $doc->exportField($this->created);
                        $doc->exportField($this->updated);
                        $doc->exportField($this->expectedSalary);
                        $doc->exportField($this->preferedJobtype);
                        $doc->exportField($this->age);
                        $doc->exportField($this->hash);
                        $doc->exportField($this->linkedInProfileLink);
                        $doc->exportField($this->linkedInProfileId);
                        $doc->exportField($this->facebookProfileLink);
                        $doc->exportField($this->facebookProfileId);
                        $doc->exportField($this->twitterProfileLink);
                        $doc->exportField($this->twitterProfileId);
                        $doc->exportField($this->googleProfileLink);
                        $doc->exportField($this->googleProfileId);
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
