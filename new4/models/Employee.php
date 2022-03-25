<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for employee
 */
class Employee extends DbTable
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

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'employee';
        $this->TableName = 'employee';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`employee`";
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
        $this->id = new DbField('employee', 'employee', 'x_id', 'id', '`id`', '`id`', 3, 20, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // employee_id
        $this->employee_id = new DbField('employee', 'employee', 'x_employee_id', 'employee_id', '`employee_id`', '`employee_id`', 200, 50, -1, false, '`employee_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employee_id->Sortable = true; // Allow sort
        $this->employee_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employee_id->Param, "CustomMsg");
        $this->Fields['employee_id'] = &$this->employee_id;

        // first_name
        $this->first_name = new DbField('employee', 'employee', 'x_first_name', 'first_name', '`first_name`', '`first_name`', 200, 100, -1, false, '`first_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->first_name->Nullable = false; // NOT NULL field
        $this->first_name->Required = true; // Required field
        $this->first_name->Sortable = true; // Allow sort
        $this->first_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->first_name->Param, "CustomMsg");
        $this->Fields['first_name'] = &$this->first_name;

        // middle_name
        $this->middle_name = new DbField('employee', 'employee', 'x_middle_name', 'middle_name', '`middle_name`', '`middle_name`', 200, 100, -1, false, '`middle_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->middle_name->Sortable = true; // Allow sort
        $this->middle_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->middle_name->Param, "CustomMsg");
        $this->Fields['middle_name'] = &$this->middle_name;

        // last_name
        $this->last_name = new DbField('employee', 'employee', 'x_last_name', 'last_name', '`last_name`', '`last_name`', 200, 100, -1, false, '`last_name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->last_name->Required = true; // Required field
        $this->last_name->Sortable = true; // Allow sort
        $this->last_name->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->last_name->Param, "CustomMsg");
        $this->Fields['last_name'] = &$this->last_name;

        // gender
        $this->gender = new DbField('employee', 'employee', 'x_gender', 'gender', '`gender`', '`gender`', 202, 6, -1, false, '`gender`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->gender->Required = true; // Required field
        $this->gender->Sortable = true; // Allow sort
        $this->gender->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->gender->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->gender->Lookup = new Lookup('gender', 'sys_gender', false, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->gender->Param, "CustomMsg");
        $this->Fields['gender'] = &$this->gender;

        // nationality
        $this->nationality = new DbField('employee', 'employee', 'x_nationality', 'nationality', '`nationality`', '`nationality`', 20, 20, -1, false, '`nationality`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->nationality->Sortable = true; // Allow sort
        $this->nationality->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->nationality->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->nationality->Lookup = new Lookup('nationality', 'sys_country', false, 'id', ["name","","",""], [], [], [], [], [], [], '', '');
        $this->nationality->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->nationality->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nationality->Param, "CustomMsg");
        $this->Fields['nationality'] = &$this->nationality;

        // birthday
        $this->birthday = new DbField('employee', 'employee', 'x_birthday', 'birthday', '`birthday`', CastDateFieldForLike("`birthday`", 0, "DB"), 133, 10, 0, false, '`birthday`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->birthday->Sortable = true; // Allow sort
        $this->birthday->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->birthday->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->birthday->Param, "CustomMsg");
        $this->Fields['birthday'] = &$this->birthday;

        // marital_status
        $this->marital_status = new DbField('employee', 'employee', 'x_marital_status', 'marital_status', '`marital_status`', '`marital_status`', 202, 8, -1, false, '`marital_status`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->marital_status->Sortable = true; // Allow sort
        $this->marital_status->Lookup = new Lookup('marital_status', 'employee', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->marital_status->OptionCount = 5;
        $this->marital_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->marital_status->Param, "CustomMsg");
        $this->Fields['marital_status'] = &$this->marital_status;

        // ssn_num
        $this->ssn_num = new DbField('employee', 'employee', 'x_ssn_num', 'ssn_num', '`ssn_num`', '`ssn_num`', 200, 100, -1, false, '`ssn_num`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ssn_num->Sortable = true; // Allow sort
        $this->ssn_num->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ssn_num->Param, "CustomMsg");
        $this->Fields['ssn_num'] = &$this->ssn_num;

        // nic_num
        $this->nic_num = new DbField('employee', 'employee', 'x_nic_num', 'nic_num', '`nic_num`', '`nic_num`', 200, 100, -1, false, '`nic_num`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->nic_num->Sortable = true; // Allow sort
        $this->nic_num->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nic_num->Param, "CustomMsg");
        $this->Fields['nic_num'] = &$this->nic_num;

        // other_id
        $this->other_id = new DbField('employee', 'employee', 'x_other_id', 'other_id', '`other_id`', '`other_id`', 200, 100, -1, false, '`other_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->other_id->Sortable = true; // Allow sort
        $this->other_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->other_id->Param, "CustomMsg");
        $this->Fields['other_id'] = &$this->other_id;

        // driving_license
        $this->driving_license = new DbField('employee', 'employee', 'x_driving_license', 'driving_license', '`driving_license`', '`driving_license`', 200, 100, -1, false, '`driving_license`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->driving_license->Sortable = true; // Allow sort
        $this->driving_license->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->driving_license->Param, "CustomMsg");
        $this->Fields['driving_license'] = &$this->driving_license;

        // driving_license_exp_date
        $this->driving_license_exp_date = new DbField('employee', 'employee', 'x_driving_license_exp_date', 'driving_license_exp_date', '`driving_license_exp_date`', CastDateFieldForLike("`driving_license_exp_date`", 0, "DB"), 133, 10, 0, false, '`driving_license_exp_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->driving_license_exp_date->Sortable = true; // Allow sort
        $this->driving_license_exp_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->driving_license_exp_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->driving_license_exp_date->Param, "CustomMsg");
        $this->Fields['driving_license_exp_date'] = &$this->driving_license_exp_date;

        // employment_status
        $this->employment_status = new DbField('employee', 'employee', 'x_employment_status', 'employment_status', '`employment_status`', '`employment_status`', 20, 20, -1, false, '`employment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->employment_status->Sortable = true; // Allow sort
        $this->employment_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->employment_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->employment_status->Param, "CustomMsg");
        $this->Fields['employment_status'] = &$this->employment_status;

        // job_title
        $this->job_title = new DbField('employee', 'employee', 'x_job_title', 'job_title', '`job_title`', '`job_title`', 20, 20, -1, false, '`job_title`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->job_title->Sortable = true; // Allow sort
        $this->job_title->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->job_title->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->job_title->Param, "CustomMsg");
        $this->Fields['job_title'] = &$this->job_title;

        // pay_grade
        $this->pay_grade = new DbField('employee', 'employee', 'x_pay_grade', 'pay_grade', '`pay_grade`', '`pay_grade`', 20, 20, -1, false, '`pay_grade`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->pay_grade->Sortable = true; // Allow sort
        $this->pay_grade->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->pay_grade->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pay_grade->Param, "CustomMsg");
        $this->Fields['pay_grade'] = &$this->pay_grade;

        // work_station_id
        $this->work_station_id = new DbField('employee', 'employee', 'x_work_station_id', 'work_station_id', '`work_station_id`', '`work_station_id`', 200, 100, -1, false, '`work_station_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->work_station_id->Sortable = true; // Allow sort
        $this->work_station_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->work_station_id->Param, "CustomMsg");
        $this->Fields['work_station_id'] = &$this->work_station_id;

        // address1
        $this->address1 = new DbField('employee', 'employee', 'x_address1', 'address1', '`address1`', '`address1`', 200, 100, -1, false, '`address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->address1->Sortable = true; // Allow sort
        $this->address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->address1->Param, "CustomMsg");
        $this->Fields['address1'] = &$this->address1;

        // address2
        $this->address2 = new DbField('employee', 'employee', 'x_address2', 'address2', '`address2`', '`address2`', 200, 100, -1, false, '`address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->address2->Sortable = true; // Allow sort
        $this->address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->address2->Param, "CustomMsg");
        $this->Fields['address2'] = &$this->address2;

        // city
        $this->city = new DbField('employee', 'employee', 'x_city', 'city', '`city`', '`city`', 200, 150, -1, false, '`city`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->city->Sortable = true; // Allow sort
        $this->city->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->city->Param, "CustomMsg");
        $this->Fields['city'] = &$this->city;

        // country
        $this->country = new DbField('employee', 'employee', 'x_country', 'country', '`country`', '`country`', 200, 2, -1, false, '`country`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->country->Sortable = true; // Allow sort
        $this->country->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->country->Param, "CustomMsg");
        $this->Fields['country'] = &$this->country;

        // province
        $this->province = new DbField('employee', 'employee', 'x_province', 'province', '`province`', '`province`', 20, 20, -1, false, '`province`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->province->Sortable = true; // Allow sort
        $this->province->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->province->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->province->Param, "CustomMsg");
        $this->Fields['province'] = &$this->province;

        // postal_code
        $this->postal_code = new DbField('employee', 'employee', 'x_postal_code', 'postal_code', '`postal_code`', '`postal_code`', 200, 20, -1, false, '`postal_code`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->postal_code->Sortable = true; // Allow sort
        $this->postal_code->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->postal_code->Param, "CustomMsg");
        $this->Fields['postal_code'] = &$this->postal_code;

        // home_phone
        $this->home_phone = new DbField('employee', 'employee', 'x_home_phone', 'home_phone', '`home_phone`', '`home_phone`', 200, 50, -1, false, '`home_phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->home_phone->Sortable = true; // Allow sort
        $this->home_phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->home_phone->Param, "CustomMsg");
        $this->Fields['home_phone'] = &$this->home_phone;

        // mobile_phone
        $this->mobile_phone = new DbField('employee', 'employee', 'x_mobile_phone', 'mobile_phone', '`mobile_phone`', '`mobile_phone`', 200, 50, -1, false, '`mobile_phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mobile_phone->Sortable = true; // Allow sort
        $this->mobile_phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mobile_phone->Param, "CustomMsg");
        $this->Fields['mobile_phone'] = &$this->mobile_phone;

        // work_phone
        $this->work_phone = new DbField('employee', 'employee', 'x_work_phone', 'work_phone', '`work_phone`', '`work_phone`', 200, 50, -1, false, '`work_phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->work_phone->Sortable = true; // Allow sort
        $this->work_phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->work_phone->Param, "CustomMsg");
        $this->Fields['work_phone'] = &$this->work_phone;

        // work_email
        $this->work_email = new DbField('employee', 'employee', 'x_work_email', 'work_email', '`work_email`', '`work_email`', 200, 100, -1, false, '`work_email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->work_email->Sortable = true; // Allow sort
        $this->work_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->work_email->Param, "CustomMsg");
        $this->Fields['work_email'] = &$this->work_email;

        // private_email
        $this->private_email = new DbField('employee', 'employee', 'x_private_email', 'private_email', '`private_email`', '`private_email`', 200, 100, -1, false, '`private_email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->private_email->Sortable = true; // Allow sort
        $this->private_email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->private_email->Param, "CustomMsg");
        $this->Fields['private_email'] = &$this->private_email;

        // joined_date
        $this->joined_date = new DbField('employee', 'employee', 'x_joined_date', 'joined_date', '`joined_date`', CastDateFieldForLike("`joined_date`", 0, "DB"), 133, 10, 0, false, '`joined_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->joined_date->Sortable = true; // Allow sort
        $this->joined_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->joined_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->joined_date->Param, "CustomMsg");
        $this->Fields['joined_date'] = &$this->joined_date;

        // confirmation_date
        $this->confirmation_date = new DbField('employee', 'employee', 'x_confirmation_date', 'confirmation_date', '`confirmation_date`', CastDateFieldForLike("`confirmation_date`", 0, "DB"), 133, 10, 0, false, '`confirmation_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->confirmation_date->Sortable = true; // Allow sort
        $this->confirmation_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->confirmation_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->confirmation_date->Param, "CustomMsg");
        $this->Fields['confirmation_date'] = &$this->confirmation_date;

        // supervisor
        $this->supervisor = new DbField('employee', 'employee', 'x_supervisor', 'supervisor', '`supervisor`', '`supervisor`', 20, 20, -1, false, '`supervisor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->supervisor->Sortable = true; // Allow sort
        $this->supervisor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->supervisor->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->supervisor->Param, "CustomMsg");
        $this->Fields['supervisor'] = &$this->supervisor;

        // indirect_supervisors
        $this->indirect_supervisors = new DbField('employee', 'employee', 'x_indirect_supervisors', 'indirect_supervisors', '`indirect_supervisors`', '`indirect_supervisors`', 200, 250, -1, false, '`indirect_supervisors`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->indirect_supervisors->Sortable = true; // Allow sort
        $this->indirect_supervisors->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->indirect_supervisors->Param, "CustomMsg");
        $this->Fields['indirect_supervisors'] = &$this->indirect_supervisors;

        // department
        $this->department = new DbField('employee', 'employee', 'x_department', 'department', '`department`', '`department`', 20, 20, -1, false, '`department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->department->Sortable = true; // Allow sort
        $this->department->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->department->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->department->Param, "CustomMsg");
        $this->Fields['department'] = &$this->department;

        // custom1
        $this->custom1 = new DbField('employee', 'employee', 'x_custom1', 'custom1', '`custom1`', '`custom1`', 200, 250, -1, false, '`custom1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom1->Sortable = true; // Allow sort
        $this->custom1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom1->Param, "CustomMsg");
        $this->Fields['custom1'] = &$this->custom1;

        // custom2
        $this->custom2 = new DbField('employee', 'employee', 'x_custom2', 'custom2', '`custom2`', '`custom2`', 200, 250, -1, false, '`custom2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom2->Sortable = true; // Allow sort
        $this->custom2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom2->Param, "CustomMsg");
        $this->Fields['custom2'] = &$this->custom2;

        // custom3
        $this->custom3 = new DbField('employee', 'employee', 'x_custom3', 'custom3', '`custom3`', '`custom3`', 200, 250, -1, false, '`custom3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom3->Sortable = true; // Allow sort
        $this->custom3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom3->Param, "CustomMsg");
        $this->Fields['custom3'] = &$this->custom3;

        // custom4
        $this->custom4 = new DbField('employee', 'employee', 'x_custom4', 'custom4', '`custom4`', '`custom4`', 200, 250, -1, false, '`custom4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom4->Sortable = true; // Allow sort
        $this->custom4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom4->Param, "CustomMsg");
        $this->Fields['custom4'] = &$this->custom4;

        // custom5
        $this->custom5 = new DbField('employee', 'employee', 'x_custom5', 'custom5', '`custom5`', '`custom5`', 200, 250, -1, false, '`custom5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom5->Sortable = true; // Allow sort
        $this->custom5->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom5->Param, "CustomMsg");
        $this->Fields['custom5'] = &$this->custom5;

        // custom6
        $this->custom6 = new DbField('employee', 'employee', 'x_custom6', 'custom6', '`custom6`', '`custom6`', 200, 250, -1, false, '`custom6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom6->Sortable = true; // Allow sort
        $this->custom6->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom6->Param, "CustomMsg");
        $this->Fields['custom6'] = &$this->custom6;

        // custom7
        $this->custom7 = new DbField('employee', 'employee', 'x_custom7', 'custom7', '`custom7`', '`custom7`', 200, 250, -1, false, '`custom7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom7->Sortable = true; // Allow sort
        $this->custom7->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom7->Param, "CustomMsg");
        $this->Fields['custom7'] = &$this->custom7;

        // custom8
        $this->custom8 = new DbField('employee', 'employee', 'x_custom8', 'custom8', '`custom8`', '`custom8`', 200, 250, -1, false, '`custom8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom8->Sortable = true; // Allow sort
        $this->custom8->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom8->Param, "CustomMsg");
        $this->Fields['custom8'] = &$this->custom8;

        // custom9
        $this->custom9 = new DbField('employee', 'employee', 'x_custom9', 'custom9', '`custom9`', '`custom9`', 200, 250, -1, false, '`custom9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom9->Sortable = true; // Allow sort
        $this->custom9->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom9->Param, "CustomMsg");
        $this->Fields['custom9'] = &$this->custom9;

        // custom10
        $this->custom10 = new DbField('employee', 'employee', 'x_custom10', 'custom10', '`custom10`', '`custom10`', 200, 250, -1, false, '`custom10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->custom10->Sortable = true; // Allow sort
        $this->custom10->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->custom10->Param, "CustomMsg");
        $this->Fields['custom10'] = &$this->custom10;

        // termination_date
        $this->termination_date = new DbField('employee', 'employee', 'x_termination_date', 'termination_date', '`termination_date`', CastDateFieldForLike("`termination_date`", 0, "DB"), 133, 10, 0, false, '`termination_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->termination_date->Sortable = true; // Allow sort
        $this->termination_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->termination_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->termination_date->Param, "CustomMsg");
        $this->Fields['termination_date'] = &$this->termination_date;

        // notes
        $this->notes = new DbField('employee', 'employee', 'x_notes', 'notes', '`notes`', '`notes`', 201, 65535, -1, false, '`notes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->notes->Sortable = true; // Allow sort
        $this->notes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->notes->Param, "CustomMsg");
        $this->Fields['notes'] = &$this->notes;

        // ethnicity
        $this->ethnicity = new DbField('employee', 'employee', 'x_ethnicity', 'ethnicity', '`ethnicity`', '`ethnicity`', 20, 20, -1, false, '`ethnicity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ethnicity->Sortable = true; // Allow sort
        $this->ethnicity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->ethnicity->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ethnicity->Param, "CustomMsg");
        $this->Fields['ethnicity'] = &$this->ethnicity;

        // immigration_status
        $this->immigration_status = new DbField('employee', 'employee', 'x_immigration_status', 'immigration_status', '`immigration_status`', '`immigration_status`', 20, 20, -1, false, '`immigration_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->immigration_status->Sortable = true; // Allow sort
        $this->immigration_status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->immigration_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->immigration_status->Param, "CustomMsg");
        $this->Fields['immigration_status'] = &$this->immigration_status;

        // approver1
        $this->approver1 = new DbField('employee', 'employee', 'x_approver1', 'approver1', '`approver1`', '`approver1`', 20, 20, -1, false, '`approver1`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->approver1->Sortable = true; // Allow sort
        $this->approver1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->approver1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->approver1->Lookup = new Lookup('approver1', 'employee', false, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
        $this->approver1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->approver1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->approver1->Param, "CustomMsg");
        $this->Fields['approver1'] = &$this->approver1;

        // approver2
        $this->approver2 = new DbField('employee', 'employee', 'x_approver2', 'approver2', '`approver2`', '`approver2`', 20, 20, -1, false, '`approver2`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->approver2->Sortable = true; // Allow sort
        $this->approver2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->approver2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->approver2->Lookup = new Lookup('approver2', 'employee', false, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
        $this->approver2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->approver2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->approver2->Param, "CustomMsg");
        $this->Fields['approver2'] = &$this->approver2;

        // approver3
        $this->approver3 = new DbField('employee', 'employee', 'x_approver3', 'approver3', '`approver3`', '`approver3`', 20, 20, -1, false, '`approver3`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->approver3->Sortable = true; // Allow sort
        $this->approver3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->approver3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->approver3->Lookup = new Lookup('approver3', 'employee', false, 'id', ["first_name","","",""], [], [], [], [], [], [], '', '');
        $this->approver3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->approver3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->approver3->Param, "CustomMsg");
        $this->Fields['approver3'] = &$this->approver3;

        // status
        $this->status = new DbField('employee', 'employee', 'x_status', 'status', '`status`', '`status`', 202, 10, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->status->Sortable = true; // Allow sort
        $this->status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->status->Lookup = new Lookup('status', 'sys_status', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // HospID
        $this->HospID = new DbField('employee', 'employee', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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
        if ($this->getCurrentDetailTable() == "employee_address") {
            $detailUrl = Container("employee_address")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "employee_telephone") {
            $detailUrl = Container("employee_telephone")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "employee_email") {
            $detailUrl = Container("employee_email")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "employee_has_degree") {
            $detailUrl = Container("employee_has_degree")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "employee_has_experience") {
            $detailUrl = Container("employee_has_experience")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($this->getCurrentDetailTable() == "employee_document") {
            $detailUrl = Container("employee_document")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "EmployeeList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`employee`";
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
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
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
        // Cascade Update detail table 'employee_address'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_address")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_address")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_address")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_address")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

        // Cascade Update detail table 'employee_telephone'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_telephone")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_telephone")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_telephone")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_telephone")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

        // Cascade Update detail table 'employee_email'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_email")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_email")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_email")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_email")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

        // Cascade Update detail table 'employee_has_degree'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_has_degree")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_has_degree")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_has_degree")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_has_degree")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

        // Cascade Update detail table 'employee_has_experience'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_has_experience")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_has_experience")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_has_experience")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_has_experience")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

        // Cascade Update detail table 'employee_document'
        $cascadeUpdate = false;
        $rscascade = [];
        if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'employee_id'
            $cascadeUpdate = true;
            $rscascade['employee_id'] = $rs['id'];
        }
        if ($cascadeUpdate) {
            $rswrk = Container("employee_document")->loadRs("`employee_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'))->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rswrk as $rsdtlold) {
                $rskey = [];
                $fldname = 'id';
                $rskey[$fldname] = $rsdtlold[$fldname];
                $rsdtlnew = array_merge($rsdtlold, $rscascade);
                // Call Row_Updating event
                $success = Container("employee_document")->rowUpdating($rsdtlold, $rsdtlnew);
                if ($success) {
                    $success = Container("employee_document")->update($rscascade, $rskey, $rsdtlold);
                }
                if (!$success) {
                    return false;
                }
                // Call Row_Updated event
                Container("employee_document")->rowUpdated($rsdtlold, $rsdtlnew);
            }
        }

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

        // Cascade delete detail table 'employee_address'
        $dtlrows = Container("employee_address")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_address")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_address")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_address")->rowDeleted($dtlrow);
            }
        }

        // Cascade delete detail table 'employee_telephone'
        $dtlrows = Container("employee_telephone")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_telephone")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_telephone")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_telephone")->rowDeleted($dtlrow);
            }
        }

        // Cascade delete detail table 'employee_email'
        $dtlrows = Container("employee_email")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_email")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_email")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_email")->rowDeleted($dtlrow);
            }
        }

        // Cascade delete detail table 'employee_has_degree'
        $dtlrows = Container("employee_has_degree")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_has_degree")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_has_degree")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_has_degree")->rowDeleted($dtlrow);
            }
        }

        // Cascade delete detail table 'employee_has_experience'
        $dtlrows = Container("employee_has_experience")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_has_experience")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_has_experience")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_has_experience")->rowDeleted($dtlrow);
            }
        }

        // Cascade delete detail table 'employee_document'
        $dtlrows = Container("employee_document")->loadRs("`employee_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"))->fetchAll(\PDO::FETCH_ASSOC);
        // Call Row Deleting event
        foreach ($dtlrows as $dtlrow) {
            $success = Container("employee_document")->rowDeleting($dtlrow);
            if (!$success) {
                break;
            }
        }
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                $success = Container("employee_document")->delete($dtlrow); // Delete
                if (!$success) {
                    break;
                }
            }
        }
        // Call Row Deleted event
        if ($success) {
            foreach ($dtlrows as $dtlrow) {
                Container("employee_document")->rowDeleted($dtlrow);
            }
        }
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
        return $_SESSION[$name] ?? GetUrl("EmployeeList");
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
        if ($pageName == "EmployeeView") {
            return $Language->phrase("View");
        } elseif ($pageName == "EmployeeEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "EmployeeAdd") {
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
                return "EmployeeView";
            case Config("API_ADD_ACTION"):
                return "EmployeeAdd";
            case Config("API_EDIT_ACTION"):
                return "EmployeeEdit";
            case Config("API_DELETE_ACTION"):
                return "EmployeeDelete";
            case Config("API_LIST_ACTION"):
                return "EmployeeList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "EmployeeList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeeView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "EmployeeAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "EmployeeAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("EmployeeEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
            $url = $this->keyUrl("EmployeeAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("EmployeeAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
        return $this->keyUrl("EmployeeDelete", $this->getUrlParm());
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
        $this->employee_id->setDbValue($row['employee_id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->driving_license->setDbValue($row['driving_license']);
        $this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
        $this->employment_status->setDbValue($row['employment_status']);
        $this->job_title->setDbValue($row['job_title']);
        $this->pay_grade->setDbValue($row['pay_grade']);
        $this->work_station_id->setDbValue($row['work_station_id']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->work_phone->setDbValue($row['work_phone']);
        $this->work_email->setDbValue($row['work_email']);
        $this->private_email->setDbValue($row['private_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
        $this->department->setDbValue($row['department']);
        $this->custom1->setDbValue($row['custom1']);
        $this->custom2->setDbValue($row['custom2']);
        $this->custom3->setDbValue($row['custom3']);
        $this->custom4->setDbValue($row['custom4']);
        $this->custom5->setDbValue($row['custom5']);
        $this->custom6->setDbValue($row['custom6']);
        $this->custom7->setDbValue($row['custom7']);
        $this->custom8->setDbValue($row['custom8']);
        $this->custom9->setDbValue($row['custom9']);
        $this->custom10->setDbValue($row['custom10']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->ethnicity->setDbValue($row['ethnicity']);
        $this->immigration_status->setDbValue($row['immigration_status']);
        $this->approver1->setDbValue($row['approver1']);
        $this->approver2->setDbValue($row['approver2']);
        $this->approver3->setDbValue($row['approver3']);
        $this->status->setDbValue($row['status']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

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

        // nationality
        $curVal = trim(strval($this->nationality->CurrentValue));
        if ($curVal != "") {
            $this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
            if ($this->nationality->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->nationality->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->nationality->Lookup->renderViewRow($rswrk[0]);
                    $this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
                } else {
                    $this->nationality->ViewValue = $this->nationality->CurrentValue;
                }
            }
        } else {
            $this->nationality->ViewValue = null;
        }
        $this->nationality->ViewCustomAttributes = "";

        // birthday
        $this->birthday->ViewValue = $this->birthday->CurrentValue;
        $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
        $this->birthday->ViewCustomAttributes = "";

        // marital_status
        if (strval($this->marital_status->CurrentValue) != "") {
            $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
        } else {
            $this->marital_status->ViewValue = null;
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
        $curVal = trim(strval($this->approver1->CurrentValue));
        if ($curVal != "") {
            $this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
            if ($this->approver1->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->approver1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver1->Lookup->renderViewRow($rswrk[0]);
                    $this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
                } else {
                    $this->approver1->ViewValue = $this->approver1->CurrentValue;
                }
            }
        } else {
            $this->approver1->ViewValue = null;
        }
        $this->approver1->ViewCustomAttributes = "";

        // approver2
        $curVal = trim(strval($this->approver2->CurrentValue));
        if ($curVal != "") {
            $this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
            if ($this->approver2->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->approver2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver2->Lookup->renderViewRow($rswrk[0]);
                    $this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
                } else {
                    $this->approver2->ViewValue = $this->approver2->CurrentValue;
                }
            }
        } else {
            $this->approver2->ViewValue = null;
        }
        $this->approver2->ViewCustomAttributes = "";

        // approver3
        $curVal = trim(strval($this->approver3->CurrentValue));
        if ($curVal != "") {
            $this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
            if ($this->approver3->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->approver3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver3->Lookup->renderViewRow($rswrk[0]);
                    $this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
                } else {
                    $this->approver3->ViewValue = $this->approver3->CurrentValue;
                }
            }
        } else {
            $this->approver3->ViewValue = null;
        }
        $this->approver3->ViewCustomAttributes = "";

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

        // employee_id
        $this->employee_id->EditAttrs["class"] = "form-control";
        $this->employee_id->EditCustomAttributes = "";
        if (!$this->employee_id->Raw) {
            $this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
        }
        $this->employee_id->EditValue = $this->employee_id->CurrentValue;
        $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

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

        // nationality
        $this->nationality->EditAttrs["class"] = "form-control";
        $this->nationality->EditCustomAttributes = "";
        $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

        // birthday
        $this->birthday->EditAttrs["class"] = "form-control";
        $this->birthday->EditCustomAttributes = "";
        $this->birthday->EditValue = FormatDateTime($this->birthday->CurrentValue, 8);
        $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

        // marital_status
        $this->marital_status->EditCustomAttributes = "";
        $this->marital_status->EditValue = $this->marital_status->options(false);
        $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

        // ssn_num
        $this->ssn_num->EditAttrs["class"] = "form-control";
        $this->ssn_num->EditCustomAttributes = "";
        if (!$this->ssn_num->Raw) {
            $this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
        }
        $this->ssn_num->EditValue = $this->ssn_num->CurrentValue;
        $this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

        // nic_num
        $this->nic_num->EditAttrs["class"] = "form-control";
        $this->nic_num->EditCustomAttributes = "";
        if (!$this->nic_num->Raw) {
            $this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
        }
        $this->nic_num->EditValue = $this->nic_num->CurrentValue;
        $this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

        // other_id
        $this->other_id->EditAttrs["class"] = "form-control";
        $this->other_id->EditCustomAttributes = "";
        if (!$this->other_id->Raw) {
            $this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
        }
        $this->other_id->EditValue = $this->other_id->CurrentValue;
        $this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

        // driving_license
        $this->driving_license->EditAttrs["class"] = "form-control";
        $this->driving_license->EditCustomAttributes = "";
        if (!$this->driving_license->Raw) {
            $this->driving_license->CurrentValue = HtmlDecode($this->driving_license->CurrentValue);
        }
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
        if (!$this->work_station_id->Raw) {
            $this->work_station_id->CurrentValue = HtmlDecode($this->work_station_id->CurrentValue);
        }
        $this->work_station_id->EditValue = $this->work_station_id->CurrentValue;
        $this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

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

        // work_phone
        $this->work_phone->EditAttrs["class"] = "form-control";
        $this->work_phone->EditCustomAttributes = "";
        if (!$this->work_phone->Raw) {
            $this->work_phone->CurrentValue = HtmlDecode($this->work_phone->CurrentValue);
        }
        $this->work_phone->EditValue = $this->work_phone->CurrentValue;
        $this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

        // work_email
        $this->work_email->EditAttrs["class"] = "form-control";
        $this->work_email->EditCustomAttributes = "";
        if (!$this->work_email->Raw) {
            $this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
        }
        $this->work_email->EditValue = $this->work_email->CurrentValue;
        $this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

        // private_email
        $this->private_email->EditAttrs["class"] = "form-control";
        $this->private_email->EditCustomAttributes = "";
        if (!$this->private_email->Raw) {
            $this->private_email->CurrentValue = HtmlDecode($this->private_email->CurrentValue);
        }
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
        if (!$this->indirect_supervisors->Raw) {
            $this->indirect_supervisors->CurrentValue = HtmlDecode($this->indirect_supervisors->CurrentValue);
        }
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
        if (!$this->custom1->Raw) {
            $this->custom1->CurrentValue = HtmlDecode($this->custom1->CurrentValue);
        }
        $this->custom1->EditValue = $this->custom1->CurrentValue;
        $this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

        // custom2
        $this->custom2->EditAttrs["class"] = "form-control";
        $this->custom2->EditCustomAttributes = "";
        if (!$this->custom2->Raw) {
            $this->custom2->CurrentValue = HtmlDecode($this->custom2->CurrentValue);
        }
        $this->custom2->EditValue = $this->custom2->CurrentValue;
        $this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

        // custom3
        $this->custom3->EditAttrs["class"] = "form-control";
        $this->custom3->EditCustomAttributes = "";
        if (!$this->custom3->Raw) {
            $this->custom3->CurrentValue = HtmlDecode($this->custom3->CurrentValue);
        }
        $this->custom3->EditValue = $this->custom3->CurrentValue;
        $this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

        // custom4
        $this->custom4->EditAttrs["class"] = "form-control";
        $this->custom4->EditCustomAttributes = "";
        if (!$this->custom4->Raw) {
            $this->custom4->CurrentValue = HtmlDecode($this->custom4->CurrentValue);
        }
        $this->custom4->EditValue = $this->custom4->CurrentValue;
        $this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

        // custom5
        $this->custom5->EditAttrs["class"] = "form-control";
        $this->custom5->EditCustomAttributes = "";
        if (!$this->custom5->Raw) {
            $this->custom5->CurrentValue = HtmlDecode($this->custom5->CurrentValue);
        }
        $this->custom5->EditValue = $this->custom5->CurrentValue;
        $this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

        // custom6
        $this->custom6->EditAttrs["class"] = "form-control";
        $this->custom6->EditCustomAttributes = "";
        if (!$this->custom6->Raw) {
            $this->custom6->CurrentValue = HtmlDecode($this->custom6->CurrentValue);
        }
        $this->custom6->EditValue = $this->custom6->CurrentValue;
        $this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

        // custom7
        $this->custom7->EditAttrs["class"] = "form-control";
        $this->custom7->EditCustomAttributes = "";
        if (!$this->custom7->Raw) {
            $this->custom7->CurrentValue = HtmlDecode($this->custom7->CurrentValue);
        }
        $this->custom7->EditValue = $this->custom7->CurrentValue;
        $this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

        // custom8
        $this->custom8->EditAttrs["class"] = "form-control";
        $this->custom8->EditCustomAttributes = "";
        if (!$this->custom8->Raw) {
            $this->custom8->CurrentValue = HtmlDecode($this->custom8->CurrentValue);
        }
        $this->custom8->EditValue = $this->custom8->CurrentValue;
        $this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

        // custom9
        $this->custom9->EditAttrs["class"] = "form-control";
        $this->custom9->EditCustomAttributes = "";
        if (!$this->custom9->Raw) {
            $this->custom9->CurrentValue = HtmlDecode($this->custom9->CurrentValue);
        }
        $this->custom9->EditValue = $this->custom9->CurrentValue;
        $this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

        // custom10
        $this->custom10->EditAttrs["class"] = "form-control";
        $this->custom10->EditCustomAttributes = "";
        if (!$this->custom10->Raw) {
            $this->custom10->CurrentValue = HtmlDecode($this->custom10->CurrentValue);
        }
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
        $this->approver1->PlaceHolder = RemoveHtml($this->approver1->caption());

        // approver2
        $this->approver2->EditAttrs["class"] = "form-control";
        $this->approver2->EditCustomAttributes = "";
        $this->approver2->PlaceHolder = RemoveHtml($this->approver2->caption());

        // approver3
        $this->approver3->EditAttrs["class"] = "form-control";
        $this->approver3->EditCustomAttributes = "";
        $this->approver3->PlaceHolder = RemoveHtml($this->approver3->caption());

        // status

        // HospID

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
