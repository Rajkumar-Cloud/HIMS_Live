<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for recruitment_candidates
 */
class recruitment_candidates extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'recruitment_candidates';
		$this->TableName = 'recruitment_candidates';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`recruitment_candidates`";
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
		$this->id = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_id', 'id', '`id`', '`id`', 20, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// first_name
		$this->first_name = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Nullable = FALSE; // NOT NULL field
		$this->first_name->Required = TRUE; // Required field
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// last_name
		$this->last_name = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Nullable = FALSE; // NOT NULL field
		$this->last_name->Required = TRUE; // Required field
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// nationality
		$this->nationality = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_nationality', 'nationality', '`nationality`', '`nationality`', 20, -1, FALSE, '`nationality`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nationality->Sortable = TRUE; // Allow sort
		$this->nationality->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['nationality'] = &$this->nationality;

		// birthday
		$this->birthday = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_birthday', 'birthday', '`birthday`', CastDateFieldForLike('`birthday`', 0, "DB"), 135, 0, FALSE, '`birthday`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->birthday->Sortable = TRUE; // Allow sort
		$this->birthday->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['birthday'] = &$this->birthday;

		// gender
		$this->gender = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_gender', 'gender', '`gender`', '`gender`', 202, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->Lookup = new Lookup('gender', 'recruitment_candidates', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->gender->OptionCount = 2;
		$this->fields['gender'] = &$this->gender;

		// marital_status
		$this->marital_status = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_marital_status', 'marital_status', '`marital_status`', '`marital_status`', 202, -1, FALSE, '`marital_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->marital_status->Sortable = TRUE; // Allow sort
		$this->marital_status->Lookup = new Lookup('marital_status', 'recruitment_candidates', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->marital_status->OptionCount = 5;
		$this->fields['marital_status'] = &$this->marital_status;

		// address1
		$this->address1 = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_address1', 'address1', '`address1`', '`address1`', 200, -1, FALSE, '`address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->address1->Sortable = TRUE; // Allow sort
		$this->fields['address1'] = &$this->address1;

		// address2
		$this->address2 = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_address2', 'address2', '`address2`', '`address2`', 200, -1, FALSE, '`address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->address2->Sortable = TRUE; // Allow sort
		$this->fields['address2'] = &$this->address2;

		// city
		$this->city = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_city', 'city', '`city`', '`city`', 200, -1, FALSE, '`city`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->city->Sortable = TRUE; // Allow sort
		$this->fields['city'] = &$this->city;

		// country
		$this->country = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_country', 'country', '`country`', '`country`', 200, -1, FALSE, '`country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Sortable = TRUE; // Allow sort
		$this->fields['country'] = &$this->country;

		// province
		$this->province = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_province', 'province', '`province`', '`province`', 20, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->province->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['province'] = &$this->province;

		// postal_code
		$this->postal_code = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// email
		$this->_email = new DbField('recruitment_candidates', 'recruitment_candidates', 'x__email', 'email', '`email`', '`email`', 200, -1, FALSE, '`email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_email->Sortable = TRUE; // Allow sort
		$this->fields['email'] = &$this->_email;

		// home_phone
		$this->home_phone = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_home_phone', 'home_phone', '`home_phone`', '`home_phone`', 200, -1, FALSE, '`home_phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->home_phone->Sortable = TRUE; // Allow sort
		$this->fields['home_phone'] = &$this->home_phone;

		// mobile_phone
		$this->mobile_phone = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_mobile_phone', 'mobile_phone', '`mobile_phone`', '`mobile_phone`', 200, -1, FALSE, '`mobile_phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_phone->Sortable = TRUE; // Allow sort
		$this->fields['mobile_phone'] = &$this->mobile_phone;

		// cv_title
		$this->cv_title = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cv_title', 'cv_title', '`cv_title`', '`cv_title`', 200, -1, FALSE, '`cv_title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cv_title->Nullable = FALSE; // NOT NULL field
		$this->cv_title->Required = TRUE; // Required field
		$this->cv_title->Sortable = TRUE; // Allow sort
		$this->fields['cv_title'] = &$this->cv_title;

		// cv
		$this->cv = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cv', 'cv', '`cv`', '`cv`', 200, -1, FALSE, '`cv`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->cv->Sortable = TRUE; // Allow sort
		$this->fields['cv'] = &$this->cv;

		// cvtext
		$this->cvtext = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_cvtext', 'cvtext', '`cvtext`', '`cvtext`', 201, -1, FALSE, '`cvtext`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->cvtext->Sortable = TRUE; // Allow sort
		$this->fields['cvtext'] = &$this->cvtext;

		// industry
		$this->industry = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_industry', 'industry', '`industry`', '`industry`', 201, -1, FALSE, '`industry`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->industry->Sortable = TRUE; // Allow sort
		$this->fields['industry'] = &$this->industry;

		// profileImage
		$this->profileImage = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_profileImage', 'profileImage', '`profileImage`', '`profileImage`', 200, -1, FALSE, '`profileImage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->profileImage->Sortable = TRUE; // Allow sort
		$this->fields['profileImage'] = &$this->profileImage;

		// head_line
		$this->head_line = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_head_line', 'head_line', '`head_line`', '`head_line`', 201, -1, FALSE, '`head_line`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->head_line->Sortable = TRUE; // Allow sort
		$this->fields['head_line'] = &$this->head_line;

		// objective
		$this->objective = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_objective', 'objective', '`objective`', '`objective`', 201, -1, FALSE, '`objective`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->objective->Sortable = TRUE; // Allow sort
		$this->fields['objective'] = &$this->objective;

		// work_history
		$this->work_history = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_work_history', 'work_history', '`work_history`', '`work_history`', 201, -1, FALSE, '`work_history`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->work_history->Sortable = TRUE; // Allow sort
		$this->fields['work_history'] = &$this->work_history;

		// education
		$this->education = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_education', 'education', '`education`', '`education`', 201, -1, FALSE, '`education`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->education->Sortable = TRUE; // Allow sort
		$this->fields['education'] = &$this->education;

		// skills
		$this->skills = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_skills', 'skills', '`skills`', '`skills`', 201, -1, FALSE, '`skills`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->skills->Sortable = TRUE; // Allow sort
		$this->fields['skills'] = &$this->skills;

		// referees
		$this->referees = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_referees', 'referees', '`referees`', '`referees`', 201, -1, FALSE, '`referees`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->referees->Sortable = TRUE; // Allow sort
		$this->fields['referees'] = &$this->referees;

		// linkedInUrl
		$this->linkedInUrl = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInUrl', 'linkedInUrl', '`linkedInUrl`', '`linkedInUrl`', 201, -1, FALSE, '`linkedInUrl`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->linkedInUrl->Sortable = TRUE; // Allow sort
		$this->fields['linkedInUrl'] = &$this->linkedInUrl;

		// linkedInData
		$this->linkedInData = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInData', 'linkedInData', '`linkedInData`', '`linkedInData`', 201, -1, FALSE, '`linkedInData`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->linkedInData->Sortable = TRUE; // Allow sort
		$this->fields['linkedInData'] = &$this->linkedInData;

		// totalYearsOfExperience
		$this->totalYearsOfExperience = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_totalYearsOfExperience', 'totalYearsOfExperience', '`totalYearsOfExperience`', '`totalYearsOfExperience`', 3, -1, FALSE, '`totalYearsOfExperience`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->totalYearsOfExperience->Sortable = TRUE; // Allow sort
		$this->totalYearsOfExperience->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['totalYearsOfExperience'] = &$this->totalYearsOfExperience;

		// totalMonthsOfExperience
		$this->totalMonthsOfExperience = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_totalMonthsOfExperience', 'totalMonthsOfExperience', '`totalMonthsOfExperience`', '`totalMonthsOfExperience`', 3, -1, FALSE, '`totalMonthsOfExperience`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->totalMonthsOfExperience->Sortable = TRUE; // Allow sort
		$this->totalMonthsOfExperience->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['totalMonthsOfExperience'] = &$this->totalMonthsOfExperience;

		// htmlCVData
		$this->htmlCVData = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_htmlCVData', 'htmlCVData', '`htmlCVData`', '`htmlCVData`', 201, -1, FALSE, '`htmlCVData`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->htmlCVData->Sortable = TRUE; // Allow sort
		$this->fields['htmlCVData'] = &$this->htmlCVData;

		// generatedCVFile
		$this->generatedCVFile = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_generatedCVFile', 'generatedCVFile', '`generatedCVFile`', '`generatedCVFile`', 200, -1, FALSE, '`generatedCVFile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->generatedCVFile->Sortable = TRUE; // Allow sort
		$this->fields['generatedCVFile'] = &$this->generatedCVFile;

		// created
		$this->created = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_created', 'created', '`created`', CastDateFieldForLike('`created`', 0, "DB"), 135, 0, FALSE, '`created`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->created->Sortable = TRUE; // Allow sort
		$this->created->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['created'] = &$this->created;

		// updated
		$this->updated = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_updated', 'updated', '`updated`', CastDateFieldForLike('`updated`', 0, "DB"), 135, 0, FALSE, '`updated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->updated->Sortable = TRUE; // Allow sort
		$this->updated->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['updated'] = &$this->updated;

		// expectedSalary
		$this->expectedSalary = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_expectedSalary', 'expectedSalary', '`expectedSalary`', '`expectedSalary`', 3, -1, FALSE, '`expectedSalary`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->expectedSalary->Sortable = TRUE; // Allow sort
		$this->expectedSalary->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['expectedSalary'] = &$this->expectedSalary;

		// preferedPositions
		$this->preferedPositions = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedPositions', 'preferedPositions', '`preferedPositions`', '`preferedPositions`', 201, -1, FALSE, '`preferedPositions`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->preferedPositions->Sortable = TRUE; // Allow sort
		$this->fields['preferedPositions'] = &$this->preferedPositions;

		// preferedJobtype
		$this->preferedJobtype = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedJobtype', 'preferedJobtype', '`preferedJobtype`', '`preferedJobtype`', 200, -1, FALSE, '`preferedJobtype`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->preferedJobtype->Sortable = TRUE; // Allow sort
		$this->fields['preferedJobtype'] = &$this->preferedJobtype;

		// preferedCountries
		$this->preferedCountries = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_preferedCountries', 'preferedCountries', '`preferedCountries`', '`preferedCountries`', 201, -1, FALSE, '`preferedCountries`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->preferedCountries->Sortable = TRUE; // Allow sort
		$this->fields['preferedCountries'] = &$this->preferedCountries;

		// tags
		$this->tags = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_tags', 'tags', '`tags`', '`tags`', 201, -1, FALSE, '`tags`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->tags->Sortable = TRUE; // Allow sort
		$this->fields['tags'] = &$this->tags;

		// notes
		$this->notes = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_notes', 'notes', '`notes`', '`notes`', 201, -1, FALSE, '`notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->notes->Sortable = TRUE; // Allow sort
		$this->fields['notes'] = &$this->notes;

		// calls
		$this->calls = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_calls', 'calls', '`calls`', '`calls`', 201, -1, FALSE, '`calls`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->calls->Sortable = TRUE; // Allow sort
		$this->fields['calls'] = &$this->calls;

		// age
		$this->age = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_age', 'age', '`age`', '`age`', 3, -1, FALSE, '`age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->age->Sortable = TRUE; // Allow sort
		$this->age->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['age'] = &$this->age;

		// hash
		$this->hash = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_hash', 'hash', '`hash`', '`hash`', 200, -1, FALSE, '`hash`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hash->Sortable = TRUE; // Allow sort
		$this->fields['hash'] = &$this->hash;

		// linkedInProfileLink
		$this->linkedInProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInProfileLink', 'linkedInProfileLink', '`linkedInProfileLink`', '`linkedInProfileLink`', 200, -1, FALSE, '`linkedInProfileLink`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->linkedInProfileLink->Sortable = TRUE; // Allow sort
		$this->fields['linkedInProfileLink'] = &$this->linkedInProfileLink;

		// linkedInProfileId
		$this->linkedInProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_linkedInProfileId', 'linkedInProfileId', '`linkedInProfileId`', '`linkedInProfileId`', 200, -1, FALSE, '`linkedInProfileId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->linkedInProfileId->Sortable = TRUE; // Allow sort
		$this->fields['linkedInProfileId'] = &$this->linkedInProfileId;

		// facebookProfileLink
		$this->facebookProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_facebookProfileLink', 'facebookProfileLink', '`facebookProfileLink`', '`facebookProfileLink`', 200, -1, FALSE, '`facebookProfileLink`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->facebookProfileLink->Sortable = TRUE; // Allow sort
		$this->fields['facebookProfileLink'] = &$this->facebookProfileLink;

		// facebookProfileId
		$this->facebookProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_facebookProfileId', 'facebookProfileId', '`facebookProfileId`', '`facebookProfileId`', 200, -1, FALSE, '`facebookProfileId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->facebookProfileId->Sortable = TRUE; // Allow sort
		$this->fields['facebookProfileId'] = &$this->facebookProfileId;

		// twitterProfileLink
		$this->twitterProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_twitterProfileLink', 'twitterProfileLink', '`twitterProfileLink`', '`twitterProfileLink`', 200, -1, FALSE, '`twitterProfileLink`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->twitterProfileLink->Sortable = TRUE; // Allow sort
		$this->fields['twitterProfileLink'] = &$this->twitterProfileLink;

		// twitterProfileId
		$this->twitterProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_twitterProfileId', 'twitterProfileId', '`twitterProfileId`', '`twitterProfileId`', 200, -1, FALSE, '`twitterProfileId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->twitterProfileId->Sortable = TRUE; // Allow sort
		$this->fields['twitterProfileId'] = &$this->twitterProfileId;

		// googleProfileLink
		$this->googleProfileLink = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_googleProfileLink', 'googleProfileLink', '`googleProfileLink`', '`googleProfileLink`', 200, -1, FALSE, '`googleProfileLink`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->googleProfileLink->Sortable = TRUE; // Allow sort
		$this->fields['googleProfileLink'] = &$this->googleProfileLink;

		// googleProfileId
		$this->googleProfileId = new DbField('recruitment_candidates', 'recruitment_candidates', 'x_googleProfileId', 'googleProfileId', '`googleProfileId`', '`googleProfileId`', 200, -1, FALSE, '`googleProfileId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->googleProfileId->Sortable = TRUE; // Allow sort
		$this->fields['googleProfileId'] = &$this->googleProfileId;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`recruitment_candidates`";
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
			return "recruitment_candidateslist.php";
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
		if ($pageName == "recruitment_candidatesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "recruitment_candidatesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "recruitment_candidatesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "recruitment_candidateslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("recruitment_candidatesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("recruitment_candidatesview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "recruitment_candidatesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "recruitment_candidatesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("recruitment_candidatesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("recruitment_candidatesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("recruitment_candidatesdelete.php", $this->getUrlParm());
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
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->last_name->setDbValue($rs->fields('last_name'));
		$this->nationality->setDbValue($rs->fields('nationality'));
		$this->birthday->setDbValue($rs->fields('birthday'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->marital_status->setDbValue($rs->fields('marital_status'));
		$this->address1->setDbValue($rs->fields('address1'));
		$this->address2->setDbValue($rs->fields('address2'));
		$this->city->setDbValue($rs->fields('city'));
		$this->country->setDbValue($rs->fields('country'));
		$this->province->setDbValue($rs->fields('province'));
		$this->postal_code->setDbValue($rs->fields('postal_code'));
		$this->_email->setDbValue($rs->fields('email'));
		$this->home_phone->setDbValue($rs->fields('home_phone'));
		$this->mobile_phone->setDbValue($rs->fields('mobile_phone'));
		$this->cv_title->setDbValue($rs->fields('cv_title'));
		$this->cv->setDbValue($rs->fields('cv'));
		$this->cvtext->setDbValue($rs->fields('cvtext'));
		$this->industry->setDbValue($rs->fields('industry'));
		$this->profileImage->setDbValue($rs->fields('profileImage'));
		$this->head_line->setDbValue($rs->fields('head_line'));
		$this->objective->setDbValue($rs->fields('objective'));
		$this->work_history->setDbValue($rs->fields('work_history'));
		$this->education->setDbValue($rs->fields('education'));
		$this->skills->setDbValue($rs->fields('skills'));
		$this->referees->setDbValue($rs->fields('referees'));
		$this->linkedInUrl->setDbValue($rs->fields('linkedInUrl'));
		$this->linkedInData->setDbValue($rs->fields('linkedInData'));
		$this->totalYearsOfExperience->setDbValue($rs->fields('totalYearsOfExperience'));
		$this->totalMonthsOfExperience->setDbValue($rs->fields('totalMonthsOfExperience'));
		$this->htmlCVData->setDbValue($rs->fields('htmlCVData'));
		$this->generatedCVFile->setDbValue($rs->fields('generatedCVFile'));
		$this->created->setDbValue($rs->fields('created'));
		$this->updated->setDbValue($rs->fields('updated'));
		$this->expectedSalary->setDbValue($rs->fields('expectedSalary'));
		$this->preferedPositions->setDbValue($rs->fields('preferedPositions'));
		$this->preferedJobtype->setDbValue($rs->fields('preferedJobtype'));
		$this->preferedCountries->setDbValue($rs->fields('preferedCountries'));
		$this->tags->setDbValue($rs->fields('tags'));
		$this->notes->setDbValue($rs->fields('notes'));
		$this->calls->setDbValue($rs->fields('calls'));
		$this->age->setDbValue($rs->fields('age'));
		$this->hash->setDbValue($rs->fields('hash'));
		$this->linkedInProfileLink->setDbValue($rs->fields('linkedInProfileLink'));
		$this->linkedInProfileId->setDbValue($rs->fields('linkedInProfileId'));
		$this->facebookProfileLink->setDbValue($rs->fields('facebookProfileLink'));
		$this->facebookProfileId->setDbValue($rs->fields('facebookProfileId'));
		$this->twitterProfileLink->setDbValue($rs->fields('twitterProfileLink'));
		$this->twitterProfileId->setDbValue($rs->fields('twitterProfileId'));
		$this->googleProfileLink->setDbValue($rs->fields('googleProfileLink'));
		$this->googleProfileId->setDbValue($rs->fields('googleProfileId'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		if (strval($this->gender->CurrentValue) <> "") {
			$this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
		} else {
			$this->gender->ViewValue = NULL;
		}
		$this->gender->ViewCustomAttributes = "";

		// marital_status
		if (strval($this->marital_status->CurrentValue) <> "") {
			$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
		} else {
			$this->marital_status->ViewValue = NULL;
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

		// first_name
		$this->first_name->EditAttrs["class"] = "form-control";
		$this->first_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
		$this->first_name->EditValue = $this->first_name->CurrentValue;
		$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

		// last_name
		$this->last_name->EditAttrs["class"] = "form-control";
		$this->last_name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
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
		$this->gender->EditValue = $this->gender->options(FALSE);

		// marital_status
		$this->marital_status->EditCustomAttributes = "";
		$this->marital_status->EditValue = $this->marital_status->options(FALSE);

		// address1
		$this->address1->EditAttrs["class"] = "form-control";
		$this->address1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
		$this->address1->EditValue = $this->address1->CurrentValue;
		$this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

		// address2
		$this->address2->EditAttrs["class"] = "form-control";
		$this->address2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
		$this->address2->EditValue = $this->address2->CurrentValue;
		$this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

		// city
		$this->city->EditAttrs["class"] = "form-control";
		$this->city->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
		$this->city->EditValue = $this->city->CurrentValue;
		$this->city->PlaceHolder = RemoveHtml($this->city->caption());

		// country
		$this->country->EditAttrs["class"] = "form-control";
		$this->country->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
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
		if (REMOVE_XSS)
			$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
		$this->postal_code->EditValue = $this->postal_code->CurrentValue;
		$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

		// email
		$this->_email->EditAttrs["class"] = "form-control";
		$this->_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
		$this->_email->EditValue = $this->_email->CurrentValue;
		$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

		// home_phone
		$this->home_phone->EditAttrs["class"] = "form-control";
		$this->home_phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
		$this->home_phone->EditValue = $this->home_phone->CurrentValue;
		$this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

		// mobile_phone
		$this->mobile_phone->EditAttrs["class"] = "form-control";
		$this->mobile_phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
		$this->mobile_phone->EditValue = $this->mobile_phone->CurrentValue;
		$this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

		// cv_title
		$this->cv_title->EditAttrs["class"] = "form-control";
		$this->cv_title->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->cv_title->CurrentValue = HtmlDecode($this->cv_title->CurrentValue);
		$this->cv_title->EditValue = $this->cv_title->CurrentValue;
		$this->cv_title->PlaceHolder = RemoveHtml($this->cv_title->caption());

		// cv
		$this->cv->EditAttrs["class"] = "form-control";
		$this->cv->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->cv->CurrentValue = HtmlDecode($this->cv->CurrentValue);
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
		if (REMOVE_XSS)
			$this->profileImage->CurrentValue = HtmlDecode($this->profileImage->CurrentValue);
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
		if (REMOVE_XSS)
			$this->generatedCVFile->CurrentValue = HtmlDecode($this->generatedCVFile->CurrentValue);
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
		if (REMOVE_XSS)
			$this->preferedJobtype->CurrentValue = HtmlDecode($this->preferedJobtype->CurrentValue);
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
		if (REMOVE_XSS)
			$this->hash->CurrentValue = HtmlDecode($this->hash->CurrentValue);
		$this->hash->EditValue = $this->hash->CurrentValue;
		$this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

		// linkedInProfileLink
		$this->linkedInProfileLink->EditAttrs["class"] = "form-control";
		$this->linkedInProfileLink->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->linkedInProfileLink->CurrentValue = HtmlDecode($this->linkedInProfileLink->CurrentValue);
		$this->linkedInProfileLink->EditValue = $this->linkedInProfileLink->CurrentValue;
		$this->linkedInProfileLink->PlaceHolder = RemoveHtml($this->linkedInProfileLink->caption());

		// linkedInProfileId
		$this->linkedInProfileId->EditAttrs["class"] = "form-control";
		$this->linkedInProfileId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->linkedInProfileId->CurrentValue = HtmlDecode($this->linkedInProfileId->CurrentValue);
		$this->linkedInProfileId->EditValue = $this->linkedInProfileId->CurrentValue;
		$this->linkedInProfileId->PlaceHolder = RemoveHtml($this->linkedInProfileId->caption());

		// facebookProfileLink
		$this->facebookProfileLink->EditAttrs["class"] = "form-control";
		$this->facebookProfileLink->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->facebookProfileLink->CurrentValue = HtmlDecode($this->facebookProfileLink->CurrentValue);
		$this->facebookProfileLink->EditValue = $this->facebookProfileLink->CurrentValue;
		$this->facebookProfileLink->PlaceHolder = RemoveHtml($this->facebookProfileLink->caption());

		// facebookProfileId
		$this->facebookProfileId->EditAttrs["class"] = "form-control";
		$this->facebookProfileId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->facebookProfileId->CurrentValue = HtmlDecode($this->facebookProfileId->CurrentValue);
		$this->facebookProfileId->EditValue = $this->facebookProfileId->CurrentValue;
		$this->facebookProfileId->PlaceHolder = RemoveHtml($this->facebookProfileId->caption());

		// twitterProfileLink
		$this->twitterProfileLink->EditAttrs["class"] = "form-control";
		$this->twitterProfileLink->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->twitterProfileLink->CurrentValue = HtmlDecode($this->twitterProfileLink->CurrentValue);
		$this->twitterProfileLink->EditValue = $this->twitterProfileLink->CurrentValue;
		$this->twitterProfileLink->PlaceHolder = RemoveHtml($this->twitterProfileLink->caption());

		// twitterProfileId
		$this->twitterProfileId->EditAttrs["class"] = "form-control";
		$this->twitterProfileId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->twitterProfileId->CurrentValue = HtmlDecode($this->twitterProfileId->CurrentValue);
		$this->twitterProfileId->EditValue = $this->twitterProfileId->CurrentValue;
		$this->twitterProfileId->PlaceHolder = RemoveHtml($this->twitterProfileId->caption());

		// googleProfileLink
		$this->googleProfileLink->EditAttrs["class"] = "form-control";
		$this->googleProfileLink->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->googleProfileLink->CurrentValue = HtmlDecode($this->googleProfileLink->CurrentValue);
		$this->googleProfileLink->EditValue = $this->googleProfileLink->CurrentValue;
		$this->googleProfileLink->PlaceHolder = RemoveHtml($this->googleProfileLink->caption());

		// googleProfileId
		$this->googleProfileId->EditAttrs["class"] = "form-control";
		$this->googleProfileId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->googleProfileId->CurrentValue = HtmlDecode($this->googleProfileId->CurrentValue);
		$this->googleProfileId->EditValue = $this->googleProfileId->CurrentValue;
		$this->googleProfileId->PlaceHolder = RemoveHtml($this->googleProfileId->caption());

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