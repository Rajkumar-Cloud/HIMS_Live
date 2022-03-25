<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for employee
 */
class employee extends DbTable
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
	public $employee_id;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $gender;
	public $nationality;
	public $birthday;
	public $marital_status;
	public $ssn_num;
	public $nic_num;
	public $other_id;
	public $driving_license;
	public $driving_license_exp_date;
	public $employment_status;
	public $job_title;
	public $pay_grade;
	public $work_station_id;
	public $address1;
	public $address2;
	public $city;
	public $country;
	public $province;
	public $postal_code;
	public $home_phone;
	public $mobile_phone;
	public $work_phone;
	public $work_email;
	public $private_email;
	public $joined_date;
	public $confirmation_date;
	public $supervisor;
	public $indirect_supervisors;
	public $department;
	public $custom1;
	public $custom2;
	public $custom3;
	public $custom4;
	public $custom5;
	public $custom6;
	public $custom7;
	public $custom8;
	public $custom9;
	public $custom10;
	public $termination_date;
	public $notes;
	public $ethnicity;
	public $immigration_status;
	public $approver1;
	public $approver2;
	public $approver3;
	public $status;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'employee';
		$this->TableName = 'employee';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`employee`";
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
		$this->id = new DbField('employee', 'employee', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// employee_id
		$this->employee_id = new DbField('employee', 'employee', 'x_employee_id', 'employee_id', '`employee_id`', '`employee_id`', 200, -1, FALSE, '`employee_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employee_id->Sortable = TRUE; // Allow sort
		$this->fields['employee_id'] = &$this->employee_id;

		// first_name
		$this->first_name = new DbField('employee', 'employee', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, -1, FALSE, '`first_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->first_name->Nullable = FALSE; // NOT NULL field
		$this->first_name->Required = TRUE; // Required field
		$this->first_name->Sortable = TRUE; // Allow sort
		$this->fields['first_name'] = &$this->first_name;

		// middle_name
		$this->middle_name = new DbField('employee', 'employee', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, -1, FALSE, '`middle_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->middle_name->Sortable = TRUE; // Allow sort
		$this->fields['middle_name'] = &$this->middle_name;

		// last_name
		$this->last_name = new DbField('employee', 'employee', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, -1, FALSE, '`last_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->last_name->Required = TRUE; // Required field
		$this->last_name->Sortable = TRUE; // Allow sort
		$this->fields['last_name'] = &$this->last_name;

		// gender
		$this->gender = new DbField('employee', 'employee', 'x_gender', 'gender', '`gender`', '`gender`', 202, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->gender->Required = TRUE; // Required field
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->gender->Lookup = new Lookup('gender', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['gender'] = &$this->gender;

		// nationality
		$this->nationality = new DbField('employee', 'employee', 'x_nationality', 'nationality', '`nationality`', '`nationality`', 20, -1, FALSE, '`nationality`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->nationality->Sortable = TRUE; // Allow sort
		$this->nationality->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->nationality->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->nationality->Lookup = new Lookup('nationality', 'sys_country', FALSE, 'id', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->nationality->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['nationality'] = &$this->nationality;

		// birthday
		$this->birthday = new DbField('employee', 'employee', 'x_birthday', 'birthday', '`birthday`', CastDateFieldForLike('`birthday`', 0, "DB"), 133, 0, FALSE, '`birthday`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->birthday->Sortable = TRUE; // Allow sort
		$this->birthday->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['birthday'] = &$this->birthday;

		// marital_status
		$this->marital_status = new DbField('employee', 'employee', 'x_marital_status', 'marital_status', '`marital_status`', '`marital_status`', 202, -1, FALSE, '`marital_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->marital_status->Sortable = TRUE; // Allow sort
		$this->marital_status->Lookup = new Lookup('marital_status', 'employee', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->marital_status->OptionCount = 5;
		$this->fields['marital_status'] = &$this->marital_status;

		// ssn_num
		$this->ssn_num = new DbField('employee', 'employee', 'x_ssn_num', 'ssn_num', '`ssn_num`', '`ssn_num`', 200, -1, FALSE, '`ssn_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ssn_num->Sortable = TRUE; // Allow sort
		$this->fields['ssn_num'] = &$this->ssn_num;

		// nic_num
		$this->nic_num = new DbField('employee', 'employee', 'x_nic_num', 'nic_num', '`nic_num`', '`nic_num`', 200, -1, FALSE, '`nic_num`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->nic_num->Sortable = TRUE; // Allow sort
		$this->fields['nic_num'] = &$this->nic_num;

		// other_id
		$this->other_id = new DbField('employee', 'employee', 'x_other_id', 'other_id', '`other_id`', '`other_id`', 200, -1, FALSE, '`other_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->other_id->Sortable = TRUE; // Allow sort
		$this->fields['other_id'] = &$this->other_id;

		// driving_license
		$this->driving_license = new DbField('employee', 'employee', 'x_driving_license', 'driving_license', '`driving_license`', '`driving_license`', 200, -1, FALSE, '`driving_license`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->driving_license->Sortable = TRUE; // Allow sort
		$this->fields['driving_license'] = &$this->driving_license;

		// driving_license_exp_date
		$this->driving_license_exp_date = new DbField('employee', 'employee', 'x_driving_license_exp_date', 'driving_license_exp_date', '`driving_license_exp_date`', CastDateFieldForLike('`driving_license_exp_date`', 0, "DB"), 133, 0, FALSE, '`driving_license_exp_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->driving_license_exp_date->Sortable = TRUE; // Allow sort
		$this->driving_license_exp_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['driving_license_exp_date'] = &$this->driving_license_exp_date;

		// employment_status
		$this->employment_status = new DbField('employee', 'employee', 'x_employment_status', 'employment_status', '`employment_status`', '`employment_status`', 20, -1, FALSE, '`employment_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->employment_status->Sortable = TRUE; // Allow sort
		$this->employment_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['employment_status'] = &$this->employment_status;

		// job_title
		$this->job_title = new DbField('employee', 'employee', 'x_job_title', 'job_title', '`job_title`', '`job_title`', 20, -1, FALSE, '`job_title`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->job_title->Sortable = TRUE; // Allow sort
		$this->job_title->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['job_title'] = &$this->job_title;

		// pay_grade
		$this->pay_grade = new DbField('employee', 'employee', 'x_pay_grade', 'pay_grade', '`pay_grade`', '`pay_grade`', 20, -1, FALSE, '`pay_grade`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pay_grade->Sortable = TRUE; // Allow sort
		$this->pay_grade->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pay_grade'] = &$this->pay_grade;

		// work_station_id
		$this->work_station_id = new DbField('employee', 'employee', 'x_work_station_id', 'work_station_id', '`work_station_id`', '`work_station_id`', 200, -1, FALSE, '`work_station_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->work_station_id->Sortable = TRUE; // Allow sort
		$this->fields['work_station_id'] = &$this->work_station_id;

		// address1
		$this->address1 = new DbField('employee', 'employee', 'x_address1', 'address1', '`address1`', '`address1`', 200, -1, FALSE, '`address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->address1->Sortable = TRUE; // Allow sort
		$this->fields['address1'] = &$this->address1;

		// address2
		$this->address2 = new DbField('employee', 'employee', 'x_address2', 'address2', '`address2`', '`address2`', 200, -1, FALSE, '`address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->address2->Sortable = TRUE; // Allow sort
		$this->fields['address2'] = &$this->address2;

		// city
		$this->city = new DbField('employee', 'employee', 'x_city', 'city', '`city`', '`city`', 200, -1, FALSE, '`city`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->city->Sortable = TRUE; // Allow sort
		$this->fields['city'] = &$this->city;

		// country
		$this->country = new DbField('employee', 'employee', 'x_country', 'country', '`country`', '`country`', 200, -1, FALSE, '`country`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->country->Sortable = TRUE; // Allow sort
		$this->fields['country'] = &$this->country;

		// province
		$this->province = new DbField('employee', 'employee', 'x_province', 'province', '`province`', '`province`', 20, -1, FALSE, '`province`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->province->Sortable = TRUE; // Allow sort
		$this->province->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['province'] = &$this->province;

		// postal_code
		$this->postal_code = new DbField('employee', 'employee', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, -1, FALSE, '`postal_code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->postal_code->Sortable = TRUE; // Allow sort
		$this->fields['postal_code'] = &$this->postal_code;

		// home_phone
		$this->home_phone = new DbField('employee', 'employee', 'x_home_phone', 'home_phone', '`home_phone`', '`home_phone`', 200, -1, FALSE, '`home_phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->home_phone->Sortable = TRUE; // Allow sort
		$this->fields['home_phone'] = &$this->home_phone;

		// mobile_phone
		$this->mobile_phone = new DbField('employee', 'employee', 'x_mobile_phone', 'mobile_phone', '`mobile_phone`', '`mobile_phone`', 200, -1, FALSE, '`mobile_phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobile_phone->Sortable = TRUE; // Allow sort
		$this->fields['mobile_phone'] = &$this->mobile_phone;

		// work_phone
		$this->work_phone = new DbField('employee', 'employee', 'x_work_phone', 'work_phone', '`work_phone`', '`work_phone`', 200, -1, FALSE, '`work_phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->work_phone->Sortable = TRUE; // Allow sort
		$this->fields['work_phone'] = &$this->work_phone;

		// work_email
		$this->work_email = new DbField('employee', 'employee', 'x_work_email', 'work_email', '`work_email`', '`work_email`', 200, -1, FALSE, '`work_email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->work_email->Sortable = TRUE; // Allow sort
		$this->fields['work_email'] = &$this->work_email;

		// private_email
		$this->private_email = new DbField('employee', 'employee', 'x_private_email', 'private_email', '`private_email`', '`private_email`', 200, -1, FALSE, '`private_email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->private_email->Sortable = TRUE; // Allow sort
		$this->fields['private_email'] = &$this->private_email;

		// joined_date
		$this->joined_date = new DbField('employee', 'employee', 'x_joined_date', 'joined_date', '`joined_date`', CastDateFieldForLike('`joined_date`', 0, "DB"), 133, 0, FALSE, '`joined_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->joined_date->Sortable = TRUE; // Allow sort
		$this->joined_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['joined_date'] = &$this->joined_date;

		// confirmation_date
		$this->confirmation_date = new DbField('employee', 'employee', 'x_confirmation_date', 'confirmation_date', '`confirmation_date`', CastDateFieldForLike('`confirmation_date`', 0, "DB"), 133, 0, FALSE, '`confirmation_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->confirmation_date->Sortable = TRUE; // Allow sort
		$this->confirmation_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['confirmation_date'] = &$this->confirmation_date;

		// supervisor
		$this->supervisor = new DbField('employee', 'employee', 'x_supervisor', 'supervisor', '`supervisor`', '`supervisor`', 20, -1, FALSE, '`supervisor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->supervisor->Sortable = TRUE; // Allow sort
		$this->supervisor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['supervisor'] = &$this->supervisor;

		// indirect_supervisors
		$this->indirect_supervisors = new DbField('employee', 'employee', 'x_indirect_supervisors', 'indirect_supervisors', '`indirect_supervisors`', '`indirect_supervisors`', 200, -1, FALSE, '`indirect_supervisors`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->indirect_supervisors->Sortable = TRUE; // Allow sort
		$this->fields['indirect_supervisors'] = &$this->indirect_supervisors;

		// department
		$this->department = new DbField('employee', 'employee', 'x_department', 'department', '`department`', '`department`', 20, -1, FALSE, '`department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->department->Sortable = TRUE; // Allow sort
		$this->department->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['department'] = &$this->department;

		// custom1
		$this->custom1 = new DbField('employee', 'employee', 'x_custom1', 'custom1', '`custom1`', '`custom1`', 200, -1, FALSE, '`custom1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom1->Sortable = TRUE; // Allow sort
		$this->fields['custom1'] = &$this->custom1;

		// custom2
		$this->custom2 = new DbField('employee', 'employee', 'x_custom2', 'custom2', '`custom2`', '`custom2`', 200, -1, FALSE, '`custom2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom2->Sortable = TRUE; // Allow sort
		$this->fields['custom2'] = &$this->custom2;

		// custom3
		$this->custom3 = new DbField('employee', 'employee', 'x_custom3', 'custom3', '`custom3`', '`custom3`', 200, -1, FALSE, '`custom3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom3->Sortable = TRUE; // Allow sort
		$this->fields['custom3'] = &$this->custom3;

		// custom4
		$this->custom4 = new DbField('employee', 'employee', 'x_custom4', 'custom4', '`custom4`', '`custom4`', 200, -1, FALSE, '`custom4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom4->Sortable = TRUE; // Allow sort
		$this->fields['custom4'] = &$this->custom4;

		// custom5
		$this->custom5 = new DbField('employee', 'employee', 'x_custom5', 'custom5', '`custom5`', '`custom5`', 200, -1, FALSE, '`custom5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom5->Sortable = TRUE; // Allow sort
		$this->fields['custom5'] = &$this->custom5;

		// custom6
		$this->custom6 = new DbField('employee', 'employee', 'x_custom6', 'custom6', '`custom6`', '`custom6`', 200, -1, FALSE, '`custom6`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom6->Sortable = TRUE; // Allow sort
		$this->fields['custom6'] = &$this->custom6;

		// custom7
		$this->custom7 = new DbField('employee', 'employee', 'x_custom7', 'custom7', '`custom7`', '`custom7`', 200, -1, FALSE, '`custom7`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom7->Sortable = TRUE; // Allow sort
		$this->fields['custom7'] = &$this->custom7;

		// custom8
		$this->custom8 = new DbField('employee', 'employee', 'x_custom8', 'custom8', '`custom8`', '`custom8`', 200, -1, FALSE, '`custom8`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom8->Sortable = TRUE; // Allow sort
		$this->fields['custom8'] = &$this->custom8;

		// custom9
		$this->custom9 = new DbField('employee', 'employee', 'x_custom9', 'custom9', '`custom9`', '`custom9`', 200, -1, FALSE, '`custom9`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom9->Sortable = TRUE; // Allow sort
		$this->fields['custom9'] = &$this->custom9;

		// custom10
		$this->custom10 = new DbField('employee', 'employee', 'x_custom10', 'custom10', '`custom10`', '`custom10`', 200, -1, FALSE, '`custom10`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->custom10->Sortable = TRUE; // Allow sort
		$this->fields['custom10'] = &$this->custom10;

		// termination_date
		$this->termination_date = new DbField('employee', 'employee', 'x_termination_date', 'termination_date', '`termination_date`', CastDateFieldForLike('`termination_date`', 0, "DB"), 133, 0, FALSE, '`termination_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->termination_date->Sortable = TRUE; // Allow sort
		$this->termination_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['termination_date'] = &$this->termination_date;

		// notes
		$this->notes = new DbField('employee', 'employee', 'x_notes', 'notes', '`notes`', '`notes`', 201, -1, FALSE, '`notes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->notes->Sortable = TRUE; // Allow sort
		$this->fields['notes'] = &$this->notes;

		// ethnicity
		$this->ethnicity = new DbField('employee', 'employee', 'x_ethnicity', 'ethnicity', '`ethnicity`', '`ethnicity`', 20, -1, FALSE, '`ethnicity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ethnicity->Sortable = TRUE; // Allow sort
		$this->ethnicity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ethnicity'] = &$this->ethnicity;

		// immigration_status
		$this->immigration_status = new DbField('employee', 'employee', 'x_immigration_status', 'immigration_status', '`immigration_status`', '`immigration_status`', 20, -1, FALSE, '`immigration_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->immigration_status->Sortable = TRUE; // Allow sort
		$this->immigration_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['immigration_status'] = &$this->immigration_status;

		// approver1
		$this->approver1 = new DbField('employee', 'employee', 'x_approver1', 'approver1', '`approver1`', '`approver1`', 20, -1, FALSE, '`approver1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->approver1->Sortable = TRUE; // Allow sort
		$this->approver1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->approver1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->approver1->Lookup = new Lookup('approver1', 'employee', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->approver1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['approver1'] = &$this->approver1;

		// approver2
		$this->approver2 = new DbField('employee', 'employee', 'x_approver2', 'approver2', '`approver2`', '`approver2`', 20, -1, FALSE, '`approver2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->approver2->Sortable = TRUE; // Allow sort
		$this->approver2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->approver2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->approver2->Lookup = new Lookup('approver2', 'employee', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->approver2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['approver2'] = &$this->approver2;

		// approver3
		$this->approver3 = new DbField('employee', 'employee', 'x_approver3', 'approver3', '`approver3`', '`approver3`', 20, -1, FALSE, '`approver3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->approver3->Sortable = TRUE; // Allow sort
		$this->approver3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->approver3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->approver3->Lookup = new Lookup('approver3', 'employee', FALSE, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
		$this->approver3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['approver3'] = &$this->approver3;

		// status
		$this->status = new DbField('employee', 'employee', 'x_status', 'status', '`status`', '`status`', 202, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// HospID
		$this->HospID = new DbField('employee', 'employee', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "employee_address") {
			$detailUrl = $GLOBALS["employee_address"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_telephone") {
			$detailUrl = $GLOBALS["employee_telephone"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_email") {
			$detailUrl = $GLOBALS["employee_email"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_has_degree") {
			$detailUrl = $GLOBALS["employee_has_degree"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_has_experience") {
			$detailUrl = $GLOBALS["employee_has_experience"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "employee_document") {
			$detailUrl = $GLOBALS["employee_document"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "employeelist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`employee`";
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
		$this->TableFilter = "`HospID`='".HospitalID()."'";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`id` DESC";
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

		// Cascade Update detail table 'employee_address'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_address"]))
				$GLOBALS["employee_address"] = new employee_address();
			$rswrk = $GLOBALS["employee_address"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_address"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_address"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_address"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_telephone'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_telephone"]))
				$GLOBALS["employee_telephone"] = new employee_telephone();
			$rswrk = $GLOBALS["employee_telephone"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_telephone"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_telephone"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_telephone"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_email'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_email"]))
				$GLOBALS["employee_email"] = new employee_email();
			$rswrk = $GLOBALS["employee_email"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_email"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_email"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_email"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_has_degree'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_has_degree"]))
				$GLOBALS["employee_has_degree"] = new employee_has_degree();
			$rswrk = $GLOBALS["employee_has_degree"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_has_degree"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_has_degree"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_has_degree"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_has_experience'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_has_experience"]))
				$GLOBALS["employee_has_experience"] = new employee_has_experience();
			$rswrk = $GLOBALS["employee_has_experience"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_has_experience"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_has_experience"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_has_experience"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}

		// Cascade Update detail table 'employee_document'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['id']) && $rsold['id'] <> $rs['id'])) { // Update detail field 'employee_id'
			$cascadeUpdate = TRUE;
			$rscascade['employee_id'] = $rs['id']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["employee_document"]))
				$GLOBALS["employee_document"] = new employee_document();
			$rswrk = $GLOBALS["employee_document"]->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["employee_document"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["employee_document"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["employee_document"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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

		// Cascade delete detail table 'employee_address'
		if (!isset($GLOBALS["employee_address"]))
			$GLOBALS["employee_address"] = new employee_address();
		$rscascade = $GLOBALS["employee_address"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_address"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_address"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_address"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_telephone'
		if (!isset($GLOBALS["employee_telephone"]))
			$GLOBALS["employee_telephone"] = new employee_telephone();
		$rscascade = $GLOBALS["employee_telephone"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_telephone"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_telephone"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_telephone"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_email'
		if (!isset($GLOBALS["employee_email"]))
			$GLOBALS["employee_email"] = new employee_email();
		$rscascade = $GLOBALS["employee_email"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_email"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_email"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_email"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_has_degree'
		if (!isset($GLOBALS["employee_has_degree"]))
			$GLOBALS["employee_has_degree"] = new employee_has_degree();
		$rscascade = $GLOBALS["employee_has_degree"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_has_degree"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_has_degree"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_has_degree"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_has_experience'
		if (!isset($GLOBALS["employee_has_experience"]))
			$GLOBALS["employee_has_experience"] = new employee_has_experience();
		$rscascade = $GLOBALS["employee_has_experience"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_has_experience"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_has_experience"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_has_experience"]->Row_Deleted($dtlrow);
		}

		// Cascade delete detail table 'employee_document'
		if (!isset($GLOBALS["employee_document"]))
			$GLOBALS["employee_document"] = new employee_document();
		$rscascade = $GLOBALS["employee_document"]->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["employee_document"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["employee_document"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["employee_document"]->Row_Deleted($dtlrow);
		}
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
		$this->employee_id->DbValue = $row['employee_id'];
		$this->first_name->DbValue = $row['first_name'];
		$this->middle_name->DbValue = $row['middle_name'];
		$this->last_name->DbValue = $row['last_name'];
		$this->gender->DbValue = $row['gender'];
		$this->nationality->DbValue = $row['nationality'];
		$this->birthday->DbValue = $row['birthday'];
		$this->marital_status->DbValue = $row['marital_status'];
		$this->ssn_num->DbValue = $row['ssn_num'];
		$this->nic_num->DbValue = $row['nic_num'];
		$this->other_id->DbValue = $row['other_id'];
		$this->driving_license->DbValue = $row['driving_license'];
		$this->driving_license_exp_date->DbValue = $row['driving_license_exp_date'];
		$this->employment_status->DbValue = $row['employment_status'];
		$this->job_title->DbValue = $row['job_title'];
		$this->pay_grade->DbValue = $row['pay_grade'];
		$this->work_station_id->DbValue = $row['work_station_id'];
		$this->address1->DbValue = $row['address1'];
		$this->address2->DbValue = $row['address2'];
		$this->city->DbValue = $row['city'];
		$this->country->DbValue = $row['country'];
		$this->province->DbValue = $row['province'];
		$this->postal_code->DbValue = $row['postal_code'];
		$this->home_phone->DbValue = $row['home_phone'];
		$this->mobile_phone->DbValue = $row['mobile_phone'];
		$this->work_phone->DbValue = $row['work_phone'];
		$this->work_email->DbValue = $row['work_email'];
		$this->private_email->DbValue = $row['private_email'];
		$this->joined_date->DbValue = $row['joined_date'];
		$this->confirmation_date->DbValue = $row['confirmation_date'];
		$this->supervisor->DbValue = $row['supervisor'];
		$this->indirect_supervisors->DbValue = $row['indirect_supervisors'];
		$this->department->DbValue = $row['department'];
		$this->custom1->DbValue = $row['custom1'];
		$this->custom2->DbValue = $row['custom2'];
		$this->custom3->DbValue = $row['custom3'];
		$this->custom4->DbValue = $row['custom4'];
		$this->custom5->DbValue = $row['custom5'];
		$this->custom6->DbValue = $row['custom6'];
		$this->custom7->DbValue = $row['custom7'];
		$this->custom8->DbValue = $row['custom8'];
		$this->custom9->DbValue = $row['custom9'];
		$this->custom10->DbValue = $row['custom10'];
		$this->termination_date->DbValue = $row['termination_date'];
		$this->notes->DbValue = $row['notes'];
		$this->ethnicity->DbValue = $row['ethnicity'];
		$this->immigration_status->DbValue = $row['immigration_status'];
		$this->approver1->DbValue = $row['approver1'];
		$this->approver2->DbValue = $row['approver2'];
		$this->approver3->DbValue = $row['approver3'];
		$this->status->DbValue = $row['status'];
		$this->HospID->DbValue = $row['HospID'];
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
			return "employeelist.php";
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
		if ($pageName == "employeeview.php")
			return $Language->phrase("View");
		elseif ($pageName == "employeeedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "employeeadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "employeelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("employeeview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "employeeadd.php?" . $this->getUrlParm($parm);
		else
			$url = "employeeadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("employeeedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("employeeadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("employeeadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("employeedelete.php", $this->getUrlParm());
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
		$this->employee_id->setDbValue($rs->fields('employee_id'));
		$this->first_name->setDbValue($rs->fields('first_name'));
		$this->middle_name->setDbValue($rs->fields('middle_name'));
		$this->last_name->setDbValue($rs->fields('last_name'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->nationality->setDbValue($rs->fields('nationality'));
		$this->birthday->setDbValue($rs->fields('birthday'));
		$this->marital_status->setDbValue($rs->fields('marital_status'));
		$this->ssn_num->setDbValue($rs->fields('ssn_num'));
		$this->nic_num->setDbValue($rs->fields('nic_num'));
		$this->other_id->setDbValue($rs->fields('other_id'));
		$this->driving_license->setDbValue($rs->fields('driving_license'));
		$this->driving_license_exp_date->setDbValue($rs->fields('driving_license_exp_date'));
		$this->employment_status->setDbValue($rs->fields('employment_status'));
		$this->job_title->setDbValue($rs->fields('job_title'));
		$this->pay_grade->setDbValue($rs->fields('pay_grade'));
		$this->work_station_id->setDbValue($rs->fields('work_station_id'));
		$this->address1->setDbValue($rs->fields('address1'));
		$this->address2->setDbValue($rs->fields('address2'));
		$this->city->setDbValue($rs->fields('city'));
		$this->country->setDbValue($rs->fields('country'));
		$this->province->setDbValue($rs->fields('province'));
		$this->postal_code->setDbValue($rs->fields('postal_code'));
		$this->home_phone->setDbValue($rs->fields('home_phone'));
		$this->mobile_phone->setDbValue($rs->fields('mobile_phone'));
		$this->work_phone->setDbValue($rs->fields('work_phone'));
		$this->work_email->setDbValue($rs->fields('work_email'));
		$this->private_email->setDbValue($rs->fields('private_email'));
		$this->joined_date->setDbValue($rs->fields('joined_date'));
		$this->confirmation_date->setDbValue($rs->fields('confirmation_date'));
		$this->supervisor->setDbValue($rs->fields('supervisor'));
		$this->indirect_supervisors->setDbValue($rs->fields('indirect_supervisors'));
		$this->department->setDbValue($rs->fields('department'));
		$this->custom1->setDbValue($rs->fields('custom1'));
		$this->custom2->setDbValue($rs->fields('custom2'));
		$this->custom3->setDbValue($rs->fields('custom3'));
		$this->custom4->setDbValue($rs->fields('custom4'));
		$this->custom5->setDbValue($rs->fields('custom5'));
		$this->custom6->setDbValue($rs->fields('custom6'));
		$this->custom7->setDbValue($rs->fields('custom7'));
		$this->custom8->setDbValue($rs->fields('custom8'));
		$this->custom9->setDbValue($rs->fields('custom9'));
		$this->custom10->setDbValue($rs->fields('custom10'));
		$this->termination_date->setDbValue($rs->fields('termination_date'));
		$this->notes->setDbValue($rs->fields('notes'));
		$this->ethnicity->setDbValue($rs->fields('ethnicity'));
		$this->immigration_status->setDbValue($rs->fields('immigration_status'));
		$this->approver1->setDbValue($rs->fields('approver1'));
		$this->approver2->setDbValue($rs->fields('approver2'));
		$this->approver3->setDbValue($rs->fields('approver3'));
		$this->status->setDbValue($rs->fields('status'));
		$this->HospID->setDbValue($rs->fields('HospID'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// employee_id
		// first_name
		// middle_name
		// last_name
		// gender
		// nationality
		// birthday
		// marital_status
		// ssn_num
		// nic_num
		// other_id
		// driving_license
		// driving_license_exp_date
		// employment_status
		// job_title
		// pay_grade
		// work_station_id
		// address1
		// address2
		// city
		// country
		// province
		// postal_code
		// home_phone
		// mobile_phone
		// work_phone
		// work_email
		// private_email
		// joined_date
		// confirmation_date
		// supervisor
		// indirect_supervisors
		// department
		// custom1
		// custom2
		// custom3
		// custom4
		// custom5
		// custom6
		// custom7
		// custom8
		// custom9
		// custom10
		// termination_date
		// notes
		// ethnicity
		// immigration_status
		// approver1
		// approver2
		// approver3
		// status
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// employee_id
		$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
		$this->employee_id->ViewCustomAttributes = "";

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
		if ($curVal <> "") {
			$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			if ($this->gender->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// nationality
		$curVal = strval($this->nationality->CurrentValue);
		if ($curVal <> "") {
			$this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
			if ($this->nationality->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->nationality->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->nationality->ViewValue = $this->nationality->CurrentValue;
				}
			}
		} else {
			$this->nationality->ViewValue = NULL;
		}
		$this->nationality->ViewCustomAttributes = "";

		// birthday
		$this->birthday->ViewValue = $this->birthday->CurrentValue;
		$this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
		$this->birthday->ViewCustomAttributes = "";

		// marital_status
		if (strval($this->marital_status->CurrentValue) <> "") {
			$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
		} else {
			$this->marital_status->ViewValue = NULL;
		}
		$this->marital_status->ViewCustomAttributes = "";

		// ssn_num
		$this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
		$this->ssn_num->ViewCustomAttributes = "";

		// nic_num
		$this->nic_num->ViewValue = $this->nic_num->CurrentValue;
		$this->nic_num->ViewCustomAttributes = "";

		// other_id
		$this->other_id->ViewValue = $this->other_id->CurrentValue;
		$this->other_id->ViewCustomAttributes = "";

		// driving_license
		$this->driving_license->ViewValue = $this->driving_license->CurrentValue;
		$this->driving_license->ViewCustomAttributes = "";

		// driving_license_exp_date
		$this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
		$this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
		$this->driving_license_exp_date->ViewCustomAttributes = "";

		// employment_status
		$this->employment_status->ViewValue = $this->employment_status->CurrentValue;
		$this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
		$this->employment_status->ViewCustomAttributes = "";

		// job_title
		$this->job_title->ViewValue = $this->job_title->CurrentValue;
		$this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
		$this->job_title->ViewCustomAttributes = "";

		// pay_grade
		$this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
		$this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
		$this->pay_grade->ViewCustomAttributes = "";

		// work_station_id
		$this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
		$this->work_station_id->ViewCustomAttributes = "";

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

		// home_phone
		$this->home_phone->ViewValue = $this->home_phone->CurrentValue;
		$this->home_phone->ViewCustomAttributes = "";

		// mobile_phone
		$this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
		$this->mobile_phone->ViewCustomAttributes = "";

		// work_phone
		$this->work_phone->ViewValue = $this->work_phone->CurrentValue;
		$this->work_phone->ViewCustomAttributes = "";

		// work_email
		$this->work_email->ViewValue = $this->work_email->CurrentValue;
		$this->work_email->ViewCustomAttributes = "";

		// private_email
		$this->private_email->ViewValue = $this->private_email->CurrentValue;
		$this->private_email->ViewCustomAttributes = "";

		// joined_date
		$this->joined_date->ViewValue = $this->joined_date->CurrentValue;
		$this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
		$this->joined_date->ViewCustomAttributes = "";

		// confirmation_date
		$this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
		$this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
		$this->confirmation_date->ViewCustomAttributes = "";

		// supervisor
		$this->supervisor->ViewValue = $this->supervisor->CurrentValue;
		$this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
		$this->supervisor->ViewCustomAttributes = "";

		// indirect_supervisors
		$this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
		$this->indirect_supervisors->ViewCustomAttributes = "";

		// department
		$this->department->ViewValue = $this->department->CurrentValue;
		$this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
		$this->department->ViewCustomAttributes = "";

		// custom1
		$this->custom1->ViewValue = $this->custom1->CurrentValue;
		$this->custom1->ViewCustomAttributes = "";

		// custom2
		$this->custom2->ViewValue = $this->custom2->CurrentValue;
		$this->custom2->ViewCustomAttributes = "";

		// custom3
		$this->custom3->ViewValue = $this->custom3->CurrentValue;
		$this->custom3->ViewCustomAttributes = "";

		// custom4
		$this->custom4->ViewValue = $this->custom4->CurrentValue;
		$this->custom4->ViewCustomAttributes = "";

		// custom5
		$this->custom5->ViewValue = $this->custom5->CurrentValue;
		$this->custom5->ViewCustomAttributes = "";

		// custom6
		$this->custom6->ViewValue = $this->custom6->CurrentValue;
		$this->custom6->ViewCustomAttributes = "";

		// custom7
		$this->custom7->ViewValue = $this->custom7->CurrentValue;
		$this->custom7->ViewCustomAttributes = "";

		// custom8
		$this->custom8->ViewValue = $this->custom8->CurrentValue;
		$this->custom8->ViewCustomAttributes = "";

		// custom9
		$this->custom9->ViewValue = $this->custom9->CurrentValue;
		$this->custom9->ViewCustomAttributes = "";

		// custom10
		$this->custom10->ViewValue = $this->custom10->CurrentValue;
		$this->custom10->ViewCustomAttributes = "";

		// termination_date
		$this->termination_date->ViewValue = $this->termination_date->CurrentValue;
		$this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
		$this->termination_date->ViewCustomAttributes = "";

		// notes
		$this->notes->ViewValue = $this->notes->CurrentValue;
		$this->notes->ViewCustomAttributes = "";

		// ethnicity
		$this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
		$this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
		$this->ethnicity->ViewCustomAttributes = "";

		// immigration_status
		$this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
		$this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
		$this->immigration_status->ViewCustomAttributes = "";

		// approver1
		$curVal = strval($this->approver1->CurrentValue);
		if ($curVal <> "") {
			$this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
			if ($this->approver1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->approver1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->approver1->ViewValue = $this->approver1->CurrentValue;
				}
			}
		} else {
			$this->approver1->ViewValue = NULL;
		}
		$this->approver1->ViewCustomAttributes = "";

		// approver2
		$curVal = strval($this->approver2->CurrentValue);
		if ($curVal <> "") {
			$this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
			if ($this->approver2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->approver2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->approver2->ViewValue = $this->approver2->CurrentValue;
				}
			}
		} else {
			$this->approver2->ViewValue = NULL;
		}
		$this->approver2->ViewCustomAttributes = "";

		// approver3
		$curVal = strval($this->approver3->CurrentValue);
		if ($curVal <> "") {
			$this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
			if ($this->approver3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->approver3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->approver3->ViewValue = $this->approver3->CurrentValue;
				}
			}
		} else {
			$this->approver3->ViewValue = NULL;
		}
		$this->approver3->ViewCustomAttributes = "";

		// status
		$curVal = strval($this->status->CurrentValue);
		if ($curVal <> "") {
			$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			if ($this->status->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
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

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// employee_id
		$this->employee_id->LinkCustomAttributes = "";
		$this->employee_id->HrefValue = "";
		$this->employee_id->TooltipValue = "";

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

		// nationality
		$this->nationality->LinkCustomAttributes = "";
		$this->nationality->HrefValue = "";
		$this->nationality->TooltipValue = "";

		// birthday
		$this->birthday->LinkCustomAttributes = "";
		$this->birthday->HrefValue = "";
		$this->birthday->TooltipValue = "";

		// marital_status
		$this->marital_status->LinkCustomAttributes = "";
		$this->marital_status->HrefValue = "";
		$this->marital_status->TooltipValue = "";

		// ssn_num
		$this->ssn_num->LinkCustomAttributes = "";
		$this->ssn_num->HrefValue = "";
		$this->ssn_num->TooltipValue = "";

		// nic_num
		$this->nic_num->LinkCustomAttributes = "";
		$this->nic_num->HrefValue = "";
		$this->nic_num->TooltipValue = "";

		// other_id
		$this->other_id->LinkCustomAttributes = "";
		$this->other_id->HrefValue = "";
		$this->other_id->TooltipValue = "";

		// driving_license
		$this->driving_license->LinkCustomAttributes = "";
		$this->driving_license->HrefValue = "";
		$this->driving_license->TooltipValue = "";

		// driving_license_exp_date
		$this->driving_license_exp_date->LinkCustomAttributes = "";
		$this->driving_license_exp_date->HrefValue = "";
		$this->driving_license_exp_date->TooltipValue = "";

		// employment_status
		$this->employment_status->LinkCustomAttributes = "";
		$this->employment_status->HrefValue = "";
		$this->employment_status->TooltipValue = "";

		// job_title
		$this->job_title->LinkCustomAttributes = "";
		$this->job_title->HrefValue = "";
		$this->job_title->TooltipValue = "";

		// pay_grade
		$this->pay_grade->LinkCustomAttributes = "";
		$this->pay_grade->HrefValue = "";
		$this->pay_grade->TooltipValue = "";

		// work_station_id
		$this->work_station_id->LinkCustomAttributes = "";
		$this->work_station_id->HrefValue = "";
		$this->work_station_id->TooltipValue = "";

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

		// home_phone
		$this->home_phone->LinkCustomAttributes = "";
		$this->home_phone->HrefValue = "";
		$this->home_phone->TooltipValue = "";

		// mobile_phone
		$this->mobile_phone->LinkCustomAttributes = "";
		$this->mobile_phone->HrefValue = "";
		$this->mobile_phone->TooltipValue = "";

		// work_phone
		$this->work_phone->LinkCustomAttributes = "";
		$this->work_phone->HrefValue = "";
		$this->work_phone->TooltipValue = "";

		// work_email
		$this->work_email->LinkCustomAttributes = "";
		$this->work_email->HrefValue = "";
		$this->work_email->TooltipValue = "";

		// private_email
		$this->private_email->LinkCustomAttributes = "";
		$this->private_email->HrefValue = "";
		$this->private_email->TooltipValue = "";

		// joined_date
		$this->joined_date->LinkCustomAttributes = "";
		$this->joined_date->HrefValue = "";
		$this->joined_date->TooltipValue = "";

		// confirmation_date
		$this->confirmation_date->LinkCustomAttributes = "";
		$this->confirmation_date->HrefValue = "";
		$this->confirmation_date->TooltipValue = "";

		// supervisor
		$this->supervisor->LinkCustomAttributes = "";
		$this->supervisor->HrefValue = "";
		$this->supervisor->TooltipValue = "";

		// indirect_supervisors
		$this->indirect_supervisors->LinkCustomAttributes = "";
		$this->indirect_supervisors->HrefValue = "";
		$this->indirect_supervisors->TooltipValue = "";

		// department
		$this->department->LinkCustomAttributes = "";
		$this->department->HrefValue = "";
		$this->department->TooltipValue = "";

		// custom1
		$this->custom1->LinkCustomAttributes = "";
		$this->custom1->HrefValue = "";
		$this->custom1->TooltipValue = "";

		// custom2
		$this->custom2->LinkCustomAttributes = "";
		$this->custom2->HrefValue = "";
		$this->custom2->TooltipValue = "";

		// custom3
		$this->custom3->LinkCustomAttributes = "";
		$this->custom3->HrefValue = "";
		$this->custom3->TooltipValue = "";

		// custom4
		$this->custom4->LinkCustomAttributes = "";
		$this->custom4->HrefValue = "";
		$this->custom4->TooltipValue = "";

		// custom5
		$this->custom5->LinkCustomAttributes = "";
		$this->custom5->HrefValue = "";
		$this->custom5->TooltipValue = "";

		// custom6
		$this->custom6->LinkCustomAttributes = "";
		$this->custom6->HrefValue = "";
		$this->custom6->TooltipValue = "";

		// custom7
		$this->custom7->LinkCustomAttributes = "";
		$this->custom7->HrefValue = "";
		$this->custom7->TooltipValue = "";

		// custom8
		$this->custom8->LinkCustomAttributes = "";
		$this->custom8->HrefValue = "";
		$this->custom8->TooltipValue = "";

		// custom9
		$this->custom9->LinkCustomAttributes = "";
		$this->custom9->HrefValue = "";
		$this->custom9->TooltipValue = "";

		// custom10
		$this->custom10->LinkCustomAttributes = "";
		$this->custom10->HrefValue = "";
		$this->custom10->TooltipValue = "";

		// termination_date
		$this->termination_date->LinkCustomAttributes = "";
		$this->termination_date->HrefValue = "";
		$this->termination_date->TooltipValue = "";

		// notes
		$this->notes->LinkCustomAttributes = "";
		$this->notes->HrefValue = "";
		$this->notes->TooltipValue = "";

		// ethnicity
		$this->ethnicity->LinkCustomAttributes = "";
		$this->ethnicity->HrefValue = "";
		$this->ethnicity->TooltipValue = "";

		// immigration_status
		$this->immigration_status->LinkCustomAttributes = "";
		$this->immigration_status->HrefValue = "";
		$this->immigration_status->TooltipValue = "";

		// approver1
		$this->approver1->LinkCustomAttributes = "";
		$this->approver1->HrefValue = "";
		$this->approver1->TooltipValue = "";

		// approver2
		$this->approver2->LinkCustomAttributes = "";
		$this->approver2->HrefValue = "";
		$this->approver2->TooltipValue = "";

		// approver3
		$this->approver3->LinkCustomAttributes = "";
		$this->approver3->HrefValue = "";
		$this->approver3->TooltipValue = "";

		// status
		$this->status->LinkCustomAttributes = "";
		$this->status->HrefValue = "";
		$this->status->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

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

		// employee_id
		$this->employee_id->EditAttrs["class"] = "form-control";
		$this->employee_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
		$this->employee_id->EditValue = $this->employee_id->CurrentValue;
		$this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

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

		// nationality
		$this->nationality->EditAttrs["class"] = "form-control";
		$this->nationality->EditCustomAttributes = "";

		// birthday
		$this->birthday->EditAttrs["class"] = "form-control";
		$this->birthday->EditCustomAttributes = "";
		$this->birthday->EditValue = FormatDateTime($this->birthday->CurrentValue, 8);
		$this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

		// marital_status
		$this->marital_status->EditCustomAttributes = "";
		$this->marital_status->EditValue = $this->marital_status->options(FALSE);

		// ssn_num
		$this->ssn_num->EditAttrs["class"] = "form-control";
		$this->ssn_num->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
		$this->ssn_num->EditValue = $this->ssn_num->CurrentValue;
		$this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

		// nic_num
		$this->nic_num->EditAttrs["class"] = "form-control";
		$this->nic_num->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
		$this->nic_num->EditValue = $this->nic_num->CurrentValue;
		$this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

		// other_id
		$this->other_id->EditAttrs["class"] = "form-control";
		$this->other_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
		$this->other_id->EditValue = $this->other_id->CurrentValue;
		$this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

		// driving_license
		$this->driving_license->EditAttrs["class"] = "form-control";
		$this->driving_license->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->driving_license->CurrentValue = HtmlDecode($this->driving_license->CurrentValue);
		$this->driving_license->EditValue = $this->driving_license->CurrentValue;
		$this->driving_license->PlaceHolder = RemoveHtml($this->driving_license->caption());

		// driving_license_exp_date
		$this->driving_license_exp_date->EditAttrs["class"] = "form-control";
		$this->driving_license_exp_date->EditCustomAttributes = "";
		$this->driving_license_exp_date->EditValue = FormatDateTime($this->driving_license_exp_date->CurrentValue, 8);
		$this->driving_license_exp_date->PlaceHolder = RemoveHtml($this->driving_license_exp_date->caption());

		// employment_status
		$this->employment_status->EditAttrs["class"] = "form-control";
		$this->employment_status->EditCustomAttributes = "";
		$this->employment_status->EditValue = $this->employment_status->CurrentValue;
		$this->employment_status->PlaceHolder = RemoveHtml($this->employment_status->caption());

		// job_title
		$this->job_title->EditAttrs["class"] = "form-control";
		$this->job_title->EditCustomAttributes = "";
		$this->job_title->EditValue = $this->job_title->CurrentValue;
		$this->job_title->PlaceHolder = RemoveHtml($this->job_title->caption());

		// pay_grade
		$this->pay_grade->EditAttrs["class"] = "form-control";
		$this->pay_grade->EditCustomAttributes = "";
		$this->pay_grade->EditValue = $this->pay_grade->CurrentValue;
		$this->pay_grade->PlaceHolder = RemoveHtml($this->pay_grade->caption());

		// work_station_id
		$this->work_station_id->EditAttrs["class"] = "form-control";
		$this->work_station_id->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->work_station_id->CurrentValue = HtmlDecode($this->work_station_id->CurrentValue);
		$this->work_station_id->EditValue = $this->work_station_id->CurrentValue;
		$this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

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

		// work_phone
		$this->work_phone->EditAttrs["class"] = "form-control";
		$this->work_phone->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->work_phone->CurrentValue = HtmlDecode($this->work_phone->CurrentValue);
		$this->work_phone->EditValue = $this->work_phone->CurrentValue;
		$this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

		// work_email
		$this->work_email->EditAttrs["class"] = "form-control";
		$this->work_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
		$this->work_email->EditValue = $this->work_email->CurrentValue;
		$this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

		// private_email
		$this->private_email->EditAttrs["class"] = "form-control";
		$this->private_email->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->private_email->CurrentValue = HtmlDecode($this->private_email->CurrentValue);
		$this->private_email->EditValue = $this->private_email->CurrentValue;
		$this->private_email->PlaceHolder = RemoveHtml($this->private_email->caption());

		// joined_date
		$this->joined_date->EditAttrs["class"] = "form-control";
		$this->joined_date->EditCustomAttributes = "";
		$this->joined_date->EditValue = FormatDateTime($this->joined_date->CurrentValue, 8);
		$this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

		// confirmation_date
		$this->confirmation_date->EditAttrs["class"] = "form-control";
		$this->confirmation_date->EditCustomAttributes = "";
		$this->confirmation_date->EditValue = FormatDateTime($this->confirmation_date->CurrentValue, 8);
		$this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

		// supervisor
		$this->supervisor->EditAttrs["class"] = "form-control";
		$this->supervisor->EditCustomAttributes = "";
		$this->supervisor->EditValue = $this->supervisor->CurrentValue;
		$this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

		// indirect_supervisors
		$this->indirect_supervisors->EditAttrs["class"] = "form-control";
		$this->indirect_supervisors->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->indirect_supervisors->CurrentValue = HtmlDecode($this->indirect_supervisors->CurrentValue);
		$this->indirect_supervisors->EditValue = $this->indirect_supervisors->CurrentValue;
		$this->indirect_supervisors->PlaceHolder = RemoveHtml($this->indirect_supervisors->caption());

		// department
		$this->department->EditAttrs["class"] = "form-control";
		$this->department->EditCustomAttributes = "";
		$this->department->EditValue = $this->department->CurrentValue;
		$this->department->PlaceHolder = RemoveHtml($this->department->caption());

		// custom1
		$this->custom1->EditAttrs["class"] = "form-control";
		$this->custom1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom1->CurrentValue = HtmlDecode($this->custom1->CurrentValue);
		$this->custom1->EditValue = $this->custom1->CurrentValue;
		$this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

		// custom2
		$this->custom2->EditAttrs["class"] = "form-control";
		$this->custom2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom2->CurrentValue = HtmlDecode($this->custom2->CurrentValue);
		$this->custom2->EditValue = $this->custom2->CurrentValue;
		$this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

		// custom3
		$this->custom3->EditAttrs["class"] = "form-control";
		$this->custom3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom3->CurrentValue = HtmlDecode($this->custom3->CurrentValue);
		$this->custom3->EditValue = $this->custom3->CurrentValue;
		$this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

		// custom4
		$this->custom4->EditAttrs["class"] = "form-control";
		$this->custom4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom4->CurrentValue = HtmlDecode($this->custom4->CurrentValue);
		$this->custom4->EditValue = $this->custom4->CurrentValue;
		$this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

		// custom5
		$this->custom5->EditAttrs["class"] = "form-control";
		$this->custom5->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom5->CurrentValue = HtmlDecode($this->custom5->CurrentValue);
		$this->custom5->EditValue = $this->custom5->CurrentValue;
		$this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

		// custom6
		$this->custom6->EditAttrs["class"] = "form-control";
		$this->custom6->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom6->CurrentValue = HtmlDecode($this->custom6->CurrentValue);
		$this->custom6->EditValue = $this->custom6->CurrentValue;
		$this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

		// custom7
		$this->custom7->EditAttrs["class"] = "form-control";
		$this->custom7->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom7->CurrentValue = HtmlDecode($this->custom7->CurrentValue);
		$this->custom7->EditValue = $this->custom7->CurrentValue;
		$this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

		// custom8
		$this->custom8->EditAttrs["class"] = "form-control";
		$this->custom8->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom8->CurrentValue = HtmlDecode($this->custom8->CurrentValue);
		$this->custom8->EditValue = $this->custom8->CurrentValue;
		$this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

		// custom9
		$this->custom9->EditAttrs["class"] = "form-control";
		$this->custom9->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom9->CurrentValue = HtmlDecode($this->custom9->CurrentValue);
		$this->custom9->EditValue = $this->custom9->CurrentValue;
		$this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

		// custom10
		$this->custom10->EditAttrs["class"] = "form-control";
		$this->custom10->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->custom10->CurrentValue = HtmlDecode($this->custom10->CurrentValue);
		$this->custom10->EditValue = $this->custom10->CurrentValue;
		$this->custom10->PlaceHolder = RemoveHtml($this->custom10->caption());

		// termination_date
		$this->termination_date->EditAttrs["class"] = "form-control";
		$this->termination_date->EditCustomAttributes = "";
		$this->termination_date->EditValue = FormatDateTime($this->termination_date->CurrentValue, 8);
		$this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

		// notes
		$this->notes->EditAttrs["class"] = "form-control";
		$this->notes->EditCustomAttributes = "";
		$this->notes->EditValue = $this->notes->CurrentValue;
		$this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

		// ethnicity
		$this->ethnicity->EditAttrs["class"] = "form-control";
		$this->ethnicity->EditCustomAttributes = "";
		$this->ethnicity->EditValue = $this->ethnicity->CurrentValue;
		$this->ethnicity->PlaceHolder = RemoveHtml($this->ethnicity->caption());

		// immigration_status
		$this->immigration_status->EditAttrs["class"] = "form-control";
		$this->immigration_status->EditCustomAttributes = "";
		$this->immigration_status->EditValue = $this->immigration_status->CurrentValue;
		$this->immigration_status->PlaceHolder = RemoveHtml($this->immigration_status->caption());

		// approver1
		$this->approver1->EditAttrs["class"] = "form-control";
		$this->approver1->EditCustomAttributes = "";

		// approver2
		$this->approver2->EditAttrs["class"] = "form-control";
		$this->approver2->EditCustomAttributes = "";

		// approver3
		$this->approver3->EditAttrs["class"] = "form-control";
		$this->approver3->EditCustomAttributes = "";

		// status
		// HospID
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
					$doc->exportCaption($this->employee_id);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->nationality);
					$doc->exportCaption($this->birthday);
					$doc->exportCaption($this->marital_status);
					$doc->exportCaption($this->ssn_num);
					$doc->exportCaption($this->nic_num);
					$doc->exportCaption($this->other_id);
					$doc->exportCaption($this->driving_license);
					$doc->exportCaption($this->driving_license_exp_date);
					$doc->exportCaption($this->employment_status);
					$doc->exportCaption($this->job_title);
					$doc->exportCaption($this->pay_grade);
					$doc->exportCaption($this->work_station_id);
					$doc->exportCaption($this->address1);
					$doc->exportCaption($this->address2);
					$doc->exportCaption($this->city);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->home_phone);
					$doc->exportCaption($this->mobile_phone);
					$doc->exportCaption($this->work_phone);
					$doc->exportCaption($this->work_email);
					$doc->exportCaption($this->private_email);
					$doc->exportCaption($this->joined_date);
					$doc->exportCaption($this->confirmation_date);
					$doc->exportCaption($this->supervisor);
					$doc->exportCaption($this->indirect_supervisors);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->custom1);
					$doc->exportCaption($this->custom2);
					$doc->exportCaption($this->custom3);
					$doc->exportCaption($this->custom4);
					$doc->exportCaption($this->custom5);
					$doc->exportCaption($this->custom6);
					$doc->exportCaption($this->custom7);
					$doc->exportCaption($this->custom8);
					$doc->exportCaption($this->custom9);
					$doc->exportCaption($this->custom10);
					$doc->exportCaption($this->termination_date);
					$doc->exportCaption($this->notes);
					$doc->exportCaption($this->ethnicity);
					$doc->exportCaption($this->immigration_status);
					$doc->exportCaption($this->approver1);
					$doc->exportCaption($this->approver2);
					$doc->exportCaption($this->approver3);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->employee_id);
					$doc->exportCaption($this->first_name);
					$doc->exportCaption($this->middle_name);
					$doc->exportCaption($this->last_name);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->nationality);
					$doc->exportCaption($this->birthday);
					$doc->exportCaption($this->marital_status);
					$doc->exportCaption($this->ssn_num);
					$doc->exportCaption($this->nic_num);
					$doc->exportCaption($this->other_id);
					$doc->exportCaption($this->driving_license);
					$doc->exportCaption($this->driving_license_exp_date);
					$doc->exportCaption($this->employment_status);
					$doc->exportCaption($this->job_title);
					$doc->exportCaption($this->pay_grade);
					$doc->exportCaption($this->work_station_id);
					$doc->exportCaption($this->address1);
					$doc->exportCaption($this->address2);
					$doc->exportCaption($this->city);
					$doc->exportCaption($this->country);
					$doc->exportCaption($this->province);
					$doc->exportCaption($this->postal_code);
					$doc->exportCaption($this->home_phone);
					$doc->exportCaption($this->mobile_phone);
					$doc->exportCaption($this->work_phone);
					$doc->exportCaption($this->work_email);
					$doc->exportCaption($this->private_email);
					$doc->exportCaption($this->joined_date);
					$doc->exportCaption($this->confirmation_date);
					$doc->exportCaption($this->supervisor);
					$doc->exportCaption($this->indirect_supervisors);
					$doc->exportCaption($this->department);
					$doc->exportCaption($this->custom1);
					$doc->exportCaption($this->custom2);
					$doc->exportCaption($this->custom3);
					$doc->exportCaption($this->custom4);
					$doc->exportCaption($this->custom5);
					$doc->exportCaption($this->custom6);
					$doc->exportCaption($this->custom7);
					$doc->exportCaption($this->custom8);
					$doc->exportCaption($this->custom9);
					$doc->exportCaption($this->custom10);
					$doc->exportCaption($this->termination_date);
					$doc->exportCaption($this->ethnicity);
					$doc->exportCaption($this->immigration_status);
					$doc->exportCaption($this->approver1);
					$doc->exportCaption($this->approver2);
					$doc->exportCaption($this->approver3);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->HospID);
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
						$doc->exportField($this->employee_id);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->nationality);
						$doc->exportField($this->birthday);
						$doc->exportField($this->marital_status);
						$doc->exportField($this->ssn_num);
						$doc->exportField($this->nic_num);
						$doc->exportField($this->other_id);
						$doc->exportField($this->driving_license);
						$doc->exportField($this->driving_license_exp_date);
						$doc->exportField($this->employment_status);
						$doc->exportField($this->job_title);
						$doc->exportField($this->pay_grade);
						$doc->exportField($this->work_station_id);
						$doc->exportField($this->address1);
						$doc->exportField($this->address2);
						$doc->exportField($this->city);
						$doc->exportField($this->country);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->home_phone);
						$doc->exportField($this->mobile_phone);
						$doc->exportField($this->work_phone);
						$doc->exportField($this->work_email);
						$doc->exportField($this->private_email);
						$doc->exportField($this->joined_date);
						$doc->exportField($this->confirmation_date);
						$doc->exportField($this->supervisor);
						$doc->exportField($this->indirect_supervisors);
						$doc->exportField($this->department);
						$doc->exportField($this->custom1);
						$doc->exportField($this->custom2);
						$doc->exportField($this->custom3);
						$doc->exportField($this->custom4);
						$doc->exportField($this->custom5);
						$doc->exportField($this->custom6);
						$doc->exportField($this->custom7);
						$doc->exportField($this->custom8);
						$doc->exportField($this->custom9);
						$doc->exportField($this->custom10);
						$doc->exportField($this->termination_date);
						$doc->exportField($this->notes);
						$doc->exportField($this->ethnicity);
						$doc->exportField($this->immigration_status);
						$doc->exportField($this->approver1);
						$doc->exportField($this->approver2);
						$doc->exportField($this->approver3);
						$doc->exportField($this->status);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->employee_id);
						$doc->exportField($this->first_name);
						$doc->exportField($this->middle_name);
						$doc->exportField($this->last_name);
						$doc->exportField($this->gender);
						$doc->exportField($this->nationality);
						$doc->exportField($this->birthday);
						$doc->exportField($this->marital_status);
						$doc->exportField($this->ssn_num);
						$doc->exportField($this->nic_num);
						$doc->exportField($this->other_id);
						$doc->exportField($this->driving_license);
						$doc->exportField($this->driving_license_exp_date);
						$doc->exportField($this->employment_status);
						$doc->exportField($this->job_title);
						$doc->exportField($this->pay_grade);
						$doc->exportField($this->work_station_id);
						$doc->exportField($this->address1);
						$doc->exportField($this->address2);
						$doc->exportField($this->city);
						$doc->exportField($this->country);
						$doc->exportField($this->province);
						$doc->exportField($this->postal_code);
						$doc->exportField($this->home_phone);
						$doc->exportField($this->mobile_phone);
						$doc->exportField($this->work_phone);
						$doc->exportField($this->work_email);
						$doc->exportField($this->private_email);
						$doc->exportField($this->joined_date);
						$doc->exportField($this->confirmation_date);
						$doc->exportField($this->supervisor);
						$doc->exportField($this->indirect_supervisors);
						$doc->exportField($this->department);
						$doc->exportField($this->custom1);
						$doc->exportField($this->custom2);
						$doc->exportField($this->custom3);
						$doc->exportField($this->custom4);
						$doc->exportField($this->custom5);
						$doc->exportField($this->custom6);
						$doc->exportField($this->custom7);
						$doc->exportField($this->custom8);
						$doc->exportField($this->custom9);
						$doc->exportField($this->custom10);
						$doc->exportField($this->termination_date);
						$doc->exportField($this->ethnicity);
						$doc->exportField($this->immigration_status);
						$doc->exportField($this->approver1);
						$doc->exportField($this->approver2);
						$doc->exportField($this->approver3);
						$doc->exportField($this->status);
						$doc->exportField($this->HospID);
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