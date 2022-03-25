<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ip_admission
 */
class ip_admission extends DbTable
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
	public $mrnNo;
	public $PatientID;
	public $patient_name;
	public $mobileno;
	public $gender;
	public $age;
	public $typeRegsisteration;
	public $PaymentCategory;
	public $physician_id;
	public $admission_consultant_id;
	public $leading_consultant_id;
	public $cause;
	public $admission_date;
	public $release_date;
	public $PaymentStatus;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $profilePic;
	public $HospID;
	public $DOB;
	public $ReferedByDr;
	public $ReferClinicname;
	public $ReferCity;
	public $ReferMobileNo;
	public $ReferA4TreatingConsultant;
	public $PurposreReferredfor;
	public $BillClosing;
	public $BillClosingDate;
	public $BillNumber;
	public $ClosingAmount;
	public $ClosingType;
	public $BillAmount;
	public $billclosedBy;
	public $bllcloseByDate;
	public $ReportHeader;
	public $Procedure;
	public $Consultant;
	public $Anesthetist;
	public $Amound;
	public $Package;
	public $patient_id;
	public $PartnerID;
	public $PartnerName;
	public $PartnerMobile;
	public $Cid;
	public $PartId;
	public $IDProof;
	public $AdviceToOtherHospital;
	public $Reason;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ip_admission';
		$this->TableName = 'ip_admission';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ip_admission`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('ip_admission', 'ip_admission', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// mrnNo
		$this->mrnNo = new DbField('ip_admission', 'ip_admission', 'x_mrnNo', 'mrnNo', '`mrnNo`', '`mrnNo`', 200, 45, -1, FALSE, '`mrnNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnNo->IsForeignKey = TRUE; // Foreign key field
		$this->mrnNo->Nullable = FALSE; // NOT NULL field
		$this->mrnNo->Required = TRUE; // Required field
		$this->mrnNo->Sortable = TRUE; // Allow sort
		$this->fields['mrnNo'] = &$this->mrnNo;

		// PatientID
		$this->PatientID = new DbField('ip_admission', 'ip_admission', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, FALSE, '`PatientID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientID->Sortable = TRUE; // Allow sort
		$this->fields['PatientID'] = &$this->PatientID;

		// patient_name
		$this->patient_name = new DbField('ip_admission', 'ip_admission', 'x_patient_name', 'patient_name', '`patient_name`', '`patient_name`', 200, 45, -1, FALSE, '`patient_name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_name->Sortable = TRUE; // Allow sort
		$this->fields['patient_name'] = &$this->patient_name;

		// mobileno
		$this->mobileno = new DbField('ip_admission', 'ip_admission', 'x_mobileno', 'mobileno', '`mobileno`', '`mobileno`', 200, 45, -1, FALSE, '`mobileno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mobileno->Sortable = TRUE; // Allow sort
		$this->fields['mobileno'] = &$this->mobileno;

		// gender
		$this->gender = new DbField('ip_admission', 'ip_admission', 'x_gender', 'gender', '`gender`', '`gender`', 200, 45, -1, FALSE, '`gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->gender->Sortable = TRUE; // Allow sort
		$this->gender->Lookup = new Lookup('gender', 'sys_gender', FALSE, 'Name', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['gender'] = &$this->gender;

		// age
		$this->age = new DbField('ip_admission', 'ip_admission', 'x_age', 'age', '`age`', '`age`', 200, 45, -1, FALSE, '`age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->age->Sortable = TRUE; // Allow sort
		$this->fields['age'] = &$this->age;

		// typeRegsisteration
		$this->typeRegsisteration = new DbField('ip_admission', 'ip_admission', 'x_typeRegsisteration', 'typeRegsisteration', '`typeRegsisteration`', '`typeRegsisteration`', 200, 45, -1, FALSE, '`typeRegsisteration`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->typeRegsisteration->Sortable = TRUE; // Allow sort
		$this->typeRegsisteration->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->typeRegsisteration->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->typeRegsisteration->Lookup = new Lookup('typeRegsisteration', 'mas_typeofregsistration', FALSE, 'RegsistrationType', ["RegsistrationType","","",""], [], [], [], [], [], [], '', '');
		$this->fields['typeRegsisteration'] = &$this->typeRegsisteration;

		// PaymentCategory
		$this->PaymentCategory = new DbField('ip_admission', 'ip_admission', 'x_PaymentCategory', 'PaymentCategory', '`PaymentCategory`', '`PaymentCategory`', 200, 45, -1, FALSE, '`PaymentCategory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PaymentCategory->Sortable = TRUE; // Allow sort
		$this->PaymentCategory->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PaymentCategory->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PaymentCategory->Lookup = new Lookup('PaymentCategory', 'mas_paymentcategory', FALSE, 'Category', ["Category","","",""], [], [], [], [], [], [], '', '');
		$this->fields['PaymentCategory'] = &$this->PaymentCategory;

		// physician_id
		$this->physician_id = new DbField('ip_admission', 'ip_admission', 'x_physician_id', 'physician_id', '`physician_id`', '`physician_id`', 3, 11, -1, FALSE, '`physician_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->physician_id->Sortable = TRUE; // Allow sort
		$this->physician_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->physician_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->physician_id->Lookup = new Lookup('physician_id', 'doctors', FALSE, 'id', ["NAME","DEPARTMENT","",""], [], [], [], [], [], [], '', '');
		$this->physician_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['physician_id'] = &$this->physician_id;

		// admission_consultant_id
		$this->admission_consultant_id = new DbField('ip_admission', 'ip_admission', 'x_admission_consultant_id', 'admission_consultant_id', '`admission_consultant_id`', '`admission_consultant_id`', 3, 11, -1, FALSE, '`admission_consultant_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->admission_consultant_id->Sortable = TRUE; // Allow sort
		$this->admission_consultant_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->admission_consultant_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->admission_consultant_id->Lookup = new Lookup('admission_consultant_id', 'doctors', FALSE, 'id', ["NAME","DEPARTMENT","",""], [], [], [], [], [], [], '', '');
		$this->admission_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['admission_consultant_id'] = &$this->admission_consultant_id;

		// leading_consultant_id
		$this->leading_consultant_id = new DbField('ip_admission', 'ip_admission', 'x_leading_consultant_id', 'leading_consultant_id', '`leading_consultant_id`', '`leading_consultant_id`', 3, 11, -1, FALSE, '`leading_consultant_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->leading_consultant_id->Sortable = TRUE; // Allow sort
		$this->leading_consultant_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->leading_consultant_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->leading_consultant_id->Lookup = new Lookup('leading_consultant_id', 'doctors', FALSE, 'id', ["NAME","DEPARTMENT","",""], [], [], [], [], [], [], '', '');
		$this->leading_consultant_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['leading_consultant_id'] = &$this->leading_consultant_id;

		// cause
		$this->cause = new DbField('ip_admission', 'ip_admission', 'x_cause', 'cause', '`cause`', '`cause`', 201, 65535, -1, FALSE, '`cause`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->cause->Sortable = TRUE; // Allow sort
		$this->fields['cause'] = &$this->cause;

		// admission_date
		$this->admission_date = new DbField('ip_admission', 'ip_admission', 'x_admission_date', 'admission_date', '`admission_date`', CastDateFieldForLike("`admission_date`", 11, "DB"), 135, 19, 11, FALSE, '`admission_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->admission_date->Sortable = TRUE; // Allow sort
		$this->admission_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['admission_date'] = &$this->admission_date;

		// release_date
		$this->release_date = new DbField('ip_admission', 'ip_admission', 'x_release_date', 'release_date', '`release_date`', CastDateFieldForLike("`release_date`", 17, "DB"), 135, 19, 17, FALSE, '`release_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->release_date->Sortable = TRUE; // Allow sort
		$this->release_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectShortDateDMY"));
		$this->fields['release_date'] = &$this->release_date;

		// PaymentStatus
		$this->PaymentStatus = new DbField('ip_admission', 'ip_admission', 'x_PaymentStatus', 'PaymentStatus', '`PaymentStatus`', '`PaymentStatus`', 3, 11, -1, FALSE, '`PaymentStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PaymentStatus->Sortable = FALSE; // Allow sort
		$this->PaymentStatus->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PaymentStatus->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->PaymentStatus->Lookup = new Lookup('PaymentStatus', 'mas_payment_status', FALSE, 'id', ["Status","","",""], [], [], [], [], [], [], '', '');
		$this->PaymentStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PaymentStatus'] = &$this->PaymentStatus;

		// status
		$this->status = new DbField('ip_admission', 'ip_admission', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = FALSE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('ip_admission', 'ip_admission', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('ip_admission', 'ip_admission', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('ip_admission', 'ip_admission', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('ip_admission', 'ip_admission', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// profilePic
		$this->profilePic = new DbField('ip_admission', 'ip_admission', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// HospID
		$this->HospID = new DbField('ip_admission', 'ip_admission', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HospID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HospID->Lookup = new Lookup('HospID', 'hospital', FALSE, 'id', ["hospital","","",""], [], [], [], [], [], [], '', '');
		$this->fields['HospID'] = &$this->HospID;

		// DOB
		$this->DOB = new DbField('ip_admission', 'ip_admission', 'x_DOB', 'DOB', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DOB->IsCustom = TRUE; // Custom field
		$this->DOB->Sortable = TRUE; // Allow sort
		$this->fields['DOB'] = &$this->DOB;

		// ReferedByDr
		$this->ReferedByDr = new DbField('ip_admission', 'ip_admission', 'x_ReferedByDr', 'ReferedByDr', '`ReferedByDr`', '`ReferedByDr`', 200, 45, -1, FALSE, '`EV__ReferedByDr`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferedByDr->Sortable = TRUE; // Allow sort
		$this->ReferedByDr->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferedByDr->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ReferedByDr->Lookup = new Lookup('ReferedByDr', 'mas_reference_type', FALSE, 'reference', ["reference","","",""], [], [], [], [], ["ReferClinicname","ReferCity","ReferMobileNo"], ["x_ReferClinicname","x_ReferCity","x_ReferMobileNo"], '', '');
		$this->fields['ReferedByDr'] = &$this->ReferedByDr;

		// ReferClinicname
		$this->ReferClinicname = new DbField('ip_admission', 'ip_admission', 'x_ReferClinicname', 'ReferClinicname', '`ReferClinicname`', '`ReferClinicname`', 200, 45, -1, FALSE, '`ReferClinicname`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferClinicname->Sortable = TRUE; // Allow sort
		$this->fields['ReferClinicname'] = &$this->ReferClinicname;

		// ReferCity
		$this->ReferCity = new DbField('ip_admission', 'ip_admission', 'x_ReferCity', 'ReferCity', '`ReferCity`', '`ReferCity`', 200, 45, -1, FALSE, '`ReferCity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferCity->Sortable = TRUE; // Allow sort
		$this->fields['ReferCity'] = &$this->ReferCity;

		// ReferMobileNo
		$this->ReferMobileNo = new DbField('ip_admission', 'ip_admission', 'x_ReferMobileNo', 'ReferMobileNo', '`ReferMobileNo`', '`ReferMobileNo`', 200, 45, -1, FALSE, '`ReferMobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReferMobileNo->Sortable = TRUE; // Allow sort
		$this->fields['ReferMobileNo'] = &$this->ReferMobileNo;

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant = new DbField('ip_admission', 'ip_admission', 'x_ReferA4TreatingConsultant', 'ReferA4TreatingConsultant', '`ReferA4TreatingConsultant`', '`ReferA4TreatingConsultant`', 200, 45, -1, FALSE, '`EV__ReferA4TreatingConsultant`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->ReferA4TreatingConsultant->Sortable = TRUE; // Allow sort
		$this->ReferA4TreatingConsultant->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ReferA4TreatingConsultant->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ReferA4TreatingConsultant->Lookup = new Lookup('ReferA4TreatingConsultant', 'doctors', FALSE, 'NAME', ["NAME","","",""], [], [], [], [], [], [], '', '');
		$this->fields['ReferA4TreatingConsultant'] = &$this->ReferA4TreatingConsultant;

		// PurposreReferredfor
		$this->PurposreReferredfor = new DbField('ip_admission', 'ip_admission', 'x_PurposreReferredfor', 'PurposreReferredfor', '`PurposreReferredfor`', '`PurposreReferredfor`', 200, 45, -1, FALSE, '`PurposreReferredfor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PurposreReferredfor->Sortable = TRUE; // Allow sort
		$this->fields['PurposreReferredfor'] = &$this->PurposreReferredfor;

		// BillClosing
		$this->BillClosing = new DbField('ip_admission', 'ip_admission', 'x_BillClosing', 'BillClosing', '`BillClosing`', '`BillClosing`', 200, 45, -1, FALSE, '`BillClosing`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillClosing->Sortable = TRUE; // Allow sort
		$this->fields['BillClosing'] = &$this->BillClosing;

		// BillClosingDate
		$this->BillClosingDate = new DbField('ip_admission', 'ip_admission', 'x_BillClosingDate', 'BillClosingDate', '`BillClosingDate`', CastDateFieldForLike("`BillClosingDate`", 0, "DB"), 135, 19, 0, FALSE, '`BillClosingDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillClosingDate->Sortable = TRUE; // Allow sort
		$this->BillClosingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['BillClosingDate'] = &$this->BillClosingDate;

		// BillNumber
		$this->BillNumber = new DbField('ip_admission', 'ip_admission', 'x_BillNumber', 'BillNumber', '`BillNumber`', '`BillNumber`', 200, 45, -1, FALSE, '`BillNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillNumber->Sortable = TRUE; // Allow sort
		$this->fields['BillNumber'] = &$this->BillNumber;

		// ClosingAmount
		$this->ClosingAmount = new DbField('ip_admission', 'ip_admission', 'x_ClosingAmount', 'ClosingAmount', '`ClosingAmount`', '`ClosingAmount`', 200, 45, -1, FALSE, '`ClosingAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ClosingAmount->Sortable = TRUE; // Allow sort
		$this->fields['ClosingAmount'] = &$this->ClosingAmount;

		// ClosingType
		$this->ClosingType = new DbField('ip_admission', 'ip_admission', 'x_ClosingType', 'ClosingType', '`ClosingType`', '`ClosingType`', 200, 45, -1, FALSE, '`ClosingType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ClosingType->Sortable = TRUE; // Allow sort
		$this->fields['ClosingType'] = &$this->ClosingType;

		// BillAmount
		$this->BillAmount = new DbField('ip_admission', 'ip_admission', 'x_BillAmount', 'BillAmount', '`BillAmount`', '`BillAmount`', 200, 45, -1, FALSE, '`BillAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillAmount->Sortable = TRUE; // Allow sort
		$this->fields['BillAmount'] = &$this->BillAmount;

		// billclosedBy
		$this->billclosedBy = new DbField('ip_admission', 'ip_admission', 'x_billclosedBy', 'billclosedBy', '`billclosedBy`', '`billclosedBy`', 200, 45, -1, FALSE, '`billclosedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->billclosedBy->Sortable = TRUE; // Allow sort
		$this->fields['billclosedBy'] = &$this->billclosedBy;

		// bllcloseByDate
		$this->bllcloseByDate = new DbField('ip_admission', 'ip_admission', 'x_bllcloseByDate', 'bllcloseByDate', '`bllcloseByDate`', CastDateFieldForLike("`bllcloseByDate`", 0, "DB"), 135, 19, 0, FALSE, '`bllcloseByDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->bllcloseByDate->Sortable = TRUE; // Allow sort
		$this->bllcloseByDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['bllcloseByDate'] = &$this->bllcloseByDate;

		// ReportHeader
		$this->ReportHeader = new DbField('ip_admission', 'ip_admission', 'x_ReportHeader', 'ReportHeader', '`ReportHeader`', '`ReportHeader`', 200, 45, -1, FALSE, '`ReportHeader`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportHeader->Sortable = TRUE; // Allow sort
		$this->fields['ReportHeader'] = &$this->ReportHeader;

		// Procedure
		$this->Procedure = new DbField('ip_admission', 'ip_admission', 'x_Procedure', 'Procedure', '`Procedure`', '`Procedure`', 200, 45, -1, FALSE, '`Procedure`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Procedure->Sortable = TRUE; // Allow sort
		$this->fields['Procedure'] = &$this->Procedure;

		// Consultant
		$this->Consultant = new DbField('ip_admission', 'ip_admission', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, 45, -1, FALSE, '`Consultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Consultant->Sortable = TRUE; // Allow sort
		$this->fields['Consultant'] = &$this->Consultant;

		// Anesthetist
		$this->Anesthetist = new DbField('ip_admission', 'ip_admission', 'x_Anesthetist', 'Anesthetist', '`Anesthetist`', '`Anesthetist`', 200, 45, -1, FALSE, '`Anesthetist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Anesthetist->Sortable = TRUE; // Allow sort
		$this->fields['Anesthetist'] = &$this->Anesthetist;

		// Amound
		$this->Amound = new DbField('ip_admission', 'ip_admission', 'x_Amound', 'Amound', '`Amound`', '`Amound`', 131, 10, -1, FALSE, '`Amound`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amound->Sortable = TRUE; // Allow sort
		$this->Amound->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amound'] = &$this->Amound;

		// Package
		$this->Package = new DbField('ip_admission', 'ip_admission', 'x_Package', 'Package', '`Package`', '`Package`', 200, 45, -1, FALSE, '`Package`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Package->Sortable = TRUE; // Allow sort
		$this->fields['Package'] = &$this->Package;

		// patient_id
		$this->patient_id = new DbField('ip_admission', 'ip_admission', 'x_patient_id', 'patient_id', '`patient_id`', '`patient_id`', 3, 11, -1, FALSE, '`EV__patient_id`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'SELECT');
		$this->patient_id->IsForeignKey = TRUE; // Foreign key field
		$this->patient_id->Nullable = FALSE; // NOT NULL field
		$this->patient_id->Required = TRUE; // Required field
		$this->patient_id->Sortable = TRUE; // Allow sort
		$this->patient_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->patient_id->Lookup = new Lookup('patient_id', 'patient', FALSE, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["first_name","gender","profilePic","PatientID","dob","mobile_no"], ["x_patient_name","x_gender","x_profilePic","x_PatientID","x_DOB","x_mobileno"], '`id` DESC', '');
		$this->patient_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_id'] = &$this->patient_id;

		// PartnerID
		$this->PartnerID = new DbField('ip_admission', 'ip_admission', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, FALSE, '`PartnerID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerID->Sortable = TRUE; // Allow sort
		$this->fields['PartnerID'] = &$this->PartnerID;

		// PartnerName
		$this->PartnerName = new DbField('ip_admission', 'ip_admission', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, FALSE, '`PartnerName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerName->Sortable = TRUE; // Allow sort
		$this->fields['PartnerName'] = &$this->PartnerName;

		// PartnerMobile
		$this->PartnerMobile = new DbField('ip_admission', 'ip_admission', 'x_PartnerMobile', 'PartnerMobile', '`PartnerMobile`', '`PartnerMobile`', 200, 45, -1, FALSE, '`PartnerMobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartnerMobile->Sortable = TRUE; // Allow sort
		$this->fields['PartnerMobile'] = &$this->PartnerMobile;

		// Cid
		$this->Cid = new DbField('ip_admission', 'ip_admission', 'x_Cid', 'Cid', '`Cid`', '`Cid`', 3, 11, -1, FALSE, '`Cid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Cid->Sortable = TRUE; // Allow sort
		$this->Cid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Cid'] = &$this->Cid;

		// PartId
		$this->PartId = new DbField('ip_admission', 'ip_admission', 'x_PartId', 'PartId', '`PartId`', '`PartId`', 3, 11, -1, FALSE, '`PartId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PartId->Sortable = TRUE; // Allow sort
		$this->PartId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PartId'] = &$this->PartId;

		// IDProof
		$this->IDProof = new DbField('ip_admission', 'ip_admission', 'x_IDProof', 'IDProof', '`IDProof`', '`IDProof`', 200, 115, -1, FALSE, '`IDProof`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IDProof->Sortable = TRUE; // Allow sort
		$this->fields['IDProof'] = &$this->IDProof;

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital = new DbField('ip_admission', 'ip_admission', 'x_AdviceToOtherHospital', 'AdviceToOtherHospital', '`AdviceToOtherHospital`', '`AdviceToOtherHospital`', 200, 45, -1, FALSE, '`AdviceToOtherHospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AdviceToOtherHospital->Sortable = TRUE; // Allow sort
		$this->fields['AdviceToOtherHospital'] = &$this->AdviceToOtherHospital;

		// Reason
		$this->Reason = new DbField('ip_admission', 'ip_admission', 'x_Reason', 'Reason', '`Reason`', '`Reason`', 201, 65535, -1, FALSE, '`Reason`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Reason->Sortable = TRUE; // Allow sort
		$this->fields['Reason'] = &$this->Reason;
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
		if ($this->getCurrentDetailTable() == "patient_vitals") {
			$detailUrl = $GLOBALS["patient_vitals"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_history") {
			$detailUrl = $GLOBALS["patient_history"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_provisional_diagnosis") {
			$detailUrl = $GLOBALS["patient_provisional_diagnosis"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_prescription") {
			$detailUrl = $GLOBALS["patient_prescription"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_final_diagnosis") {
			$detailUrl = $GLOBALS["patient_final_diagnosis"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_follow_up") {
			$detailUrl = $GLOBALS["patient_follow_up"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_ot_delivery_register") {
			$detailUrl = $GLOBALS["patient_ot_delivery_register"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_ot_surgery_register") {
			$detailUrl = $GLOBALS["patient_ot_surgery_register"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_services") {
			$detailUrl = $GLOBALS["patient_services"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_investigations") {
			$detailUrl = $GLOBALS["patient_investigations"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_insurance") {
			$detailUrl = $GLOBALS["patient_insurance"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "pharmacy_pharled") {
			$detailUrl = $GLOBALS["pharmacy_pharled"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "view_ip_advance") {
			$detailUrl = $GLOBALS["view_ip_advance"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
		}
		if ($this->getCurrentDetailTable() == "patient_room") {
			$detailUrl = $GLOBALS["patient_room"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
			$detailUrl .= "&fk_mrnNo=" . urlencode($this->mrnNo->CurrentValue);
			$detailUrl .= "&fk_patient_id=" . urlencode($this->patient_id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "ip_admissionlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ip_admission`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `DOB` FROM " . $this->getSqlFrom();
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
			"SELECT *, '' AS `DOB`, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `ip_admission`.`ReferedByDr` LIMIT 1) AS `EV__ReferedByDr`, (SELECT `NAME` FROM `doctors` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`NAME` = `ip_admission`.`ReferA4TreatingConsultant` LIMIT 1) AS `EV__ReferA4TreatingConsultant`, (SELECT CONCAT(COALESCE(`PatientID`, ''),'" . ValueSeparator(1, $this->patient_id) . "',COALESCE(`first_name`,''),'" . ValueSeparator(2, $this->patient_id) . "',COALESCE(`mobile_no`,'')) FROM `patient` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `ip_admission`.`patient_id` LIMIT 1) AS `EV__patient_id` FROM `ip_admission`" .
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
		if ($this->patient_id->AdvancedSearch->SearchValue != "" ||
			$this->patient_id->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->patient_id->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->patient_id->VirtualExpression . " "))
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
		$this->mrnNo->DbValue = $row['mrnNo'];
		$this->PatientID->DbValue = $row['PatientID'];
		$this->patient_name->DbValue = $row['patient_name'];
		$this->mobileno->DbValue = $row['mobileno'];
		$this->gender->DbValue = $row['gender'];
		$this->age->DbValue = $row['age'];
		$this->typeRegsisteration->DbValue = $row['typeRegsisteration'];
		$this->PaymentCategory->DbValue = $row['PaymentCategory'];
		$this->physician_id->DbValue = $row['physician_id'];
		$this->admission_consultant_id->DbValue = $row['admission_consultant_id'];
		$this->leading_consultant_id->DbValue = $row['leading_consultant_id'];
		$this->cause->DbValue = $row['cause'];
		$this->admission_date->DbValue = $row['admission_date'];
		$this->release_date->DbValue = $row['release_date'];
		$this->PaymentStatus->DbValue = $row['PaymentStatus'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->HospID->DbValue = $row['HospID'];
		$this->DOB->DbValue = $row['DOB'];
		$this->ReferedByDr->DbValue = $row['ReferedByDr'];
		$this->ReferClinicname->DbValue = $row['ReferClinicname'];
		$this->ReferCity->DbValue = $row['ReferCity'];
		$this->ReferMobileNo->DbValue = $row['ReferMobileNo'];
		$this->ReferA4TreatingConsultant->DbValue = $row['ReferA4TreatingConsultant'];
		$this->PurposreReferredfor->DbValue = $row['PurposreReferredfor'];
		$this->BillClosing->DbValue = $row['BillClosing'];
		$this->BillClosingDate->DbValue = $row['BillClosingDate'];
		$this->BillNumber->DbValue = $row['BillNumber'];
		$this->ClosingAmount->DbValue = $row['ClosingAmount'];
		$this->ClosingType->DbValue = $row['ClosingType'];
		$this->BillAmount->DbValue = $row['BillAmount'];
		$this->billclosedBy->DbValue = $row['billclosedBy'];
		$this->bllcloseByDate->DbValue = $row['bllcloseByDate'];
		$this->ReportHeader->DbValue = $row['ReportHeader'];
		$this->Procedure->DbValue = $row['Procedure'];
		$this->Consultant->DbValue = $row['Consultant'];
		$this->Anesthetist->DbValue = $row['Anesthetist'];
		$this->Amound->DbValue = $row['Amound'];
		$this->Package->DbValue = $row['Package'];
		$this->patient_id->DbValue = $row['patient_id'];
		$this->PartnerID->DbValue = $row['PartnerID'];
		$this->PartnerName->DbValue = $row['PartnerName'];
		$this->PartnerMobile->DbValue = $row['PartnerMobile'];
		$this->Cid->DbValue = $row['Cid'];
		$this->PartId->DbValue = $row['PartId'];
		$this->IDProof->DbValue = $row['IDProof'];
		$this->AdviceToOtherHospital->DbValue = $row['AdviceToOtherHospital'];
		$this->Reason->DbValue = $row['Reason'];
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
			return "ip_admissionlist.php";
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
		if ($pageName == "ip_admissionview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ip_admissionedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ip_admissionadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ip_admissionlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ip_admissionview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ip_admissionview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ip_admissionadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ip_admissionadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ip_admissionedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ip_admissionedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
			$url = $this->keyUrl("ip_admissionadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ip_admissionadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("ip_admissiondelete.php", $this->getUrlParm());
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
		if ($parm != "")
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
		$ar = [];
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
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->mrnNo->setDbValue($rs->fields('mrnNo'));
		$this->PatientID->setDbValue($rs->fields('PatientID'));
		$this->patient_name->setDbValue($rs->fields('patient_name'));
		$this->mobileno->setDbValue($rs->fields('mobileno'));
		$this->gender->setDbValue($rs->fields('gender'));
		$this->age->setDbValue($rs->fields('age'));
		$this->typeRegsisteration->setDbValue($rs->fields('typeRegsisteration'));
		$this->PaymentCategory->setDbValue($rs->fields('PaymentCategory'));
		$this->physician_id->setDbValue($rs->fields('physician_id'));
		$this->admission_consultant_id->setDbValue($rs->fields('admission_consultant_id'));
		$this->leading_consultant_id->setDbValue($rs->fields('leading_consultant_id'));
		$this->cause->setDbValue($rs->fields('cause'));
		$this->admission_date->setDbValue($rs->fields('admission_date'));
		$this->release_date->setDbValue($rs->fields('release_date'));
		$this->PaymentStatus->setDbValue($rs->fields('PaymentStatus'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->DOB->setDbValue($rs->fields('DOB'));
		$this->ReferedByDr->setDbValue($rs->fields('ReferedByDr'));
		$this->ReferClinicname->setDbValue($rs->fields('ReferClinicname'));
		$this->ReferCity->setDbValue($rs->fields('ReferCity'));
		$this->ReferMobileNo->setDbValue($rs->fields('ReferMobileNo'));
		$this->ReferA4TreatingConsultant->setDbValue($rs->fields('ReferA4TreatingConsultant'));
		$this->PurposreReferredfor->setDbValue($rs->fields('PurposreReferredfor'));
		$this->BillClosing->setDbValue($rs->fields('BillClosing'));
		$this->BillClosingDate->setDbValue($rs->fields('BillClosingDate'));
		$this->BillNumber->setDbValue($rs->fields('BillNumber'));
		$this->ClosingAmount->setDbValue($rs->fields('ClosingAmount'));
		$this->ClosingType->setDbValue($rs->fields('ClosingType'));
		$this->BillAmount->setDbValue($rs->fields('BillAmount'));
		$this->billclosedBy->setDbValue($rs->fields('billclosedBy'));
		$this->bllcloseByDate->setDbValue($rs->fields('bllcloseByDate'));
		$this->ReportHeader->setDbValue($rs->fields('ReportHeader'));
		$this->Procedure->setDbValue($rs->fields('Procedure'));
		$this->Consultant->setDbValue($rs->fields('Consultant'));
		$this->Anesthetist->setDbValue($rs->fields('Anesthetist'));
		$this->Amound->setDbValue($rs->fields('Amound'));
		$this->Package->setDbValue($rs->fields('Package'));
		$this->patient_id->setDbValue($rs->fields('patient_id'));
		$this->PartnerID->setDbValue($rs->fields('PartnerID'));
		$this->PartnerName->setDbValue($rs->fields('PartnerName'));
		$this->PartnerMobile->setDbValue($rs->fields('PartnerMobile'));
		$this->Cid->setDbValue($rs->fields('Cid'));
		$this->PartId->setDbValue($rs->fields('PartId'));
		$this->IDProof->setDbValue($rs->fields('IDProof'));
		$this->AdviceToOtherHospital->setDbValue($rs->fields('AdviceToOtherHospital'));
		$this->Reason->setDbValue($rs->fields('Reason'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// mrnNo
		// PatientID
		// patient_name
		// mobileno
		// gender
		// age
		// typeRegsisteration
		// PaymentCategory
		// physician_id
		// admission_consultant_id
		// leading_consultant_id
		// cause
		// admission_date
		// release_date
		// PaymentStatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// HospID
		// DOB
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// BillClosing
		// BillClosingDate
		// BillNumber
		// ClosingAmount
		// ClosingType
		// BillAmount
		// billclosedBy
		// bllcloseByDate
		// ReportHeader
		// Procedure
		// Consultant
		// Anesthetist
		// Amound
		// Package
		// patient_id
		// PartnerID
		// PartnerName
		// PartnerMobile
		// Cid
		// PartId
		// IDProof
		// AdviceToOtherHospital
		// Reason
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// mrnNo
		$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
		$this->mrnNo->ViewCustomAttributes = "";

		// PatientID
		$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
		$this->PatientID->ViewCustomAttributes = "";

		// patient_name
		$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
		$this->patient_name->ViewCustomAttributes = "";

		// mobileno
		$this->mobileno->ViewValue = $this->mobileno->CurrentValue;
		$this->mobileno->ViewCustomAttributes = "";

		// gender
		$this->gender->ViewValue = $this->gender->CurrentValue;
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

		// age
		$this->age->ViewValue = $this->age->CurrentValue;
		$this->age->ViewCustomAttributes = "";

		// typeRegsisteration
		$curVal = strval($this->typeRegsisteration->CurrentValue);
		if ($curVal != "") {
			$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
			if ($this->typeRegsisteration->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`RegsistrationType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->typeRegsisteration->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
				}
			}
		} else {
			$this->typeRegsisteration->ViewValue = NULL;
		}
		$this->typeRegsisteration->ViewCustomAttributes = "";

		// PaymentCategory
		$curVal = strval($this->PaymentCategory->CurrentValue);
		if ($curVal != "") {
			$this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
			if ($this->PaymentCategory->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->PaymentCategory->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
				}
			}
		} else {
			$this->PaymentCategory->ViewValue = NULL;
		}
		$this->PaymentCategory->ViewCustomAttributes = "";

		// physician_id
		$curVal = strval($this->physician_id->CurrentValue);
		if ($curVal != "") {
			$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
			if ($this->physician_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
				}
			}
		} else {
			$this->physician_id->ViewValue = NULL;
		}
		$this->physician_id->ViewCustomAttributes = "";

		// admission_consultant_id
		$curVal = strval($this->admission_consultant_id->CurrentValue);
		if ($curVal != "") {
			$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
			if ($this->admission_consultant_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->admission_consultant_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
				}
			}
		} else {
			$this->admission_consultant_id->ViewValue = NULL;
		}
		$this->admission_consultant_id->ViewCustomAttributes = "";

		// leading_consultant_id
		$curVal = strval($this->leading_consultant_id->CurrentValue);
		if ($curVal != "") {
			$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
			if ($this->leading_consultant_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->leading_consultant_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
				}
			}
		} else {
			$this->leading_consultant_id->ViewValue = NULL;
		}
		$this->leading_consultant_id->ViewCustomAttributes = "";

		// cause
		$this->cause->ViewValue = $this->cause->CurrentValue;
		$this->cause->ViewCustomAttributes = "";

		// admission_date
		$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
		$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
		$this->admission_date->ViewCustomAttributes = "";

		// release_date
		$this->release_date->ViewValue = $this->release_date->CurrentValue;
		$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 17);
		$this->release_date->ViewCustomAttributes = "";

		// PaymentStatus
		$curVal = strval($this->PaymentStatus->CurrentValue);
		if ($curVal != "") {
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
			if ($this->PaymentStatus->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PaymentStatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
				}
			}
		} else {
			$this->PaymentStatus->ViewValue = NULL;
		}
		$this->PaymentStatus->ViewCustomAttributes = "";

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
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

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

		// DOB
		$this->DOB->ViewValue = $this->DOB->CurrentValue;
		$this->DOB->ViewCustomAttributes = "";

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
					$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
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

		// BillClosing
		$this->BillClosing->ViewValue = $this->BillClosing->CurrentValue;
		$this->BillClosing->ViewCustomAttributes = "";

		// BillClosingDate
		$this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
		$this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
		$this->BillClosingDate->ViewCustomAttributes = "";

		// BillNumber
		$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->ViewCustomAttributes = "";

		// ClosingAmount
		$this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
		$this->ClosingAmount->ViewCustomAttributes = "";

		// ClosingType
		$this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
		$this->ClosingType->ViewCustomAttributes = "";

		// BillAmount
		$this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
		$this->BillAmount->ViewCustomAttributes = "";

		// billclosedBy
		$this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
		$this->billclosedBy->ViewCustomAttributes = "";

		// bllcloseByDate
		$this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
		$this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
		$this->bllcloseByDate->ViewCustomAttributes = "";

		// ReportHeader
		$this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
		$this->ReportHeader->ViewCustomAttributes = "";

		// Procedure
		$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
		$this->Procedure->ViewCustomAttributes = "";

		// Consultant
		$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
		$this->Consultant->ViewCustomAttributes = "";

		// Anesthetist
		$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
		$this->Anesthetist->ViewCustomAttributes = "";

		// Amound
		$this->Amound->ViewValue = $this->Amound->CurrentValue;
		$this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
		$this->Amound->ViewCustomAttributes = "";

		// Package
		$this->Package->ViewValue = $this->Package->CurrentValue;
		$this->Package->ViewCustomAttributes = "";

		// patient_id
		if ($this->patient_id->VirtualValue != "") {
			$this->patient_id->ViewValue = $this->patient_id->VirtualValue;
		} else {
			$curVal = strval($this->patient_id->CurrentValue);
			if ($curVal != "") {
				$this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
				if ($this->patient_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
					}
				}
			} else {
				$this->patient_id->ViewValue = NULL;
			}
		}
		$this->patient_id->ViewCustomAttributes = "";

		// PartnerID
		$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->ViewCustomAttributes = "";

		// PartnerName
		$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->ViewCustomAttributes = "";

		// PartnerMobile
		$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
		$this->PartnerMobile->ViewCustomAttributes = "";

		// Cid
		$this->Cid->ViewValue = $this->Cid->CurrentValue;
		$this->Cid->ViewValue = FormatNumber($this->Cid->ViewValue, 0, -2, -2, -2);
		$this->Cid->ViewCustomAttributes = "";

		// PartId
		$this->PartId->ViewValue = $this->PartId->CurrentValue;
		$this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
		$this->PartId->ViewCustomAttributes = "";

		// IDProof
		$this->IDProof->ViewValue = $this->IDProof->CurrentValue;
		$this->IDProof->ViewCustomAttributes = "";

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
		$this->AdviceToOtherHospital->ViewCustomAttributes = "";

		// Reason
		$this->Reason->ViewValue = $this->Reason->CurrentValue;
		$this->Reason->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// mrnNo
		$this->mrnNo->LinkCustomAttributes = "";
		$this->mrnNo->HrefValue = "";
		$this->mrnNo->TooltipValue = "";

		// PatientID
		$this->PatientID->LinkCustomAttributes = "";
		$this->PatientID->HrefValue = "";
		$this->PatientID->TooltipValue = "";

		// patient_name
		$this->patient_name->LinkCustomAttributes = "";
		$this->patient_name->HrefValue = "";
		$this->patient_name->TooltipValue = "";

		// mobileno
		$this->mobileno->LinkCustomAttributes = "";
		$this->mobileno->HrefValue = "";
		$this->mobileno->TooltipValue = "";

		// gender
		$this->gender->LinkCustomAttributes = "";
		$this->gender->HrefValue = "";
		$this->gender->TooltipValue = "";

		// age
		$this->age->LinkCustomAttributes = "";
		$this->age->HrefValue = "";
		$this->age->TooltipValue = "";

		// typeRegsisteration
		$this->typeRegsisteration->LinkCustomAttributes = "";
		$this->typeRegsisteration->HrefValue = "";
		$this->typeRegsisteration->TooltipValue = "";

		// PaymentCategory
		$this->PaymentCategory->LinkCustomAttributes = "";
		$this->PaymentCategory->HrefValue = "";
		$this->PaymentCategory->TooltipValue = "";

		// physician_id
		$this->physician_id->LinkCustomAttributes = "";
		$this->physician_id->HrefValue = "";
		$this->physician_id->TooltipValue = "";

		// admission_consultant_id
		$this->admission_consultant_id->LinkCustomAttributes = "";
		$this->admission_consultant_id->HrefValue = "";
		$this->admission_consultant_id->TooltipValue = "";

		// leading_consultant_id
		$this->leading_consultant_id->LinkCustomAttributes = "";
		$this->leading_consultant_id->HrefValue = "";
		$this->leading_consultant_id->TooltipValue = "";

		// cause
		$this->cause->LinkCustomAttributes = "";
		$this->cause->HrefValue = "";
		$this->cause->TooltipValue = "";

		// admission_date
		$this->admission_date->LinkCustomAttributes = "";
		$this->admission_date->HrefValue = "";
		$this->admission_date->TooltipValue = "";

		// release_date
		$this->release_date->LinkCustomAttributes = "";
		$this->release_date->HrefValue = "";
		$this->release_date->TooltipValue = "";

		// PaymentStatus
		$this->PaymentStatus->LinkCustomAttributes = "";
		$this->PaymentStatus->HrefValue = "";
		$this->PaymentStatus->TooltipValue = "";

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
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// DOB
		$this->DOB->LinkCustomAttributes = "";
		$this->DOB->HrefValue = "";
		$this->DOB->TooltipValue = "";

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

		// BillClosing
		$this->BillClosing->LinkCustomAttributes = "";
		$this->BillClosing->HrefValue = "";
		$this->BillClosing->TooltipValue = "";

		// BillClosingDate
		$this->BillClosingDate->LinkCustomAttributes = "";
		$this->BillClosingDate->HrefValue = "";
		$this->BillClosingDate->TooltipValue = "";

		// BillNumber
		$this->BillNumber->LinkCustomAttributes = "";
		$this->BillNumber->HrefValue = "";
		$this->BillNumber->TooltipValue = "";

		// ClosingAmount
		$this->ClosingAmount->LinkCustomAttributes = "";
		$this->ClosingAmount->HrefValue = "";
		$this->ClosingAmount->TooltipValue = "";

		// ClosingType
		$this->ClosingType->LinkCustomAttributes = "";
		$this->ClosingType->HrefValue = "";
		$this->ClosingType->TooltipValue = "";

		// BillAmount
		$this->BillAmount->LinkCustomAttributes = "";
		$this->BillAmount->HrefValue = "";
		$this->BillAmount->TooltipValue = "";

		// billclosedBy
		$this->billclosedBy->LinkCustomAttributes = "";
		$this->billclosedBy->HrefValue = "";
		$this->billclosedBy->TooltipValue = "";

		// bllcloseByDate
		$this->bllcloseByDate->LinkCustomAttributes = "";
		$this->bllcloseByDate->HrefValue = "";
		$this->bllcloseByDate->TooltipValue = "";

		// ReportHeader
		$this->ReportHeader->LinkCustomAttributes = "";
		$this->ReportHeader->HrefValue = "";
		$this->ReportHeader->TooltipValue = "";

		// Procedure
		$this->Procedure->LinkCustomAttributes = "";
		$this->Procedure->HrefValue = "";
		$this->Procedure->TooltipValue = "";

		// Consultant
		$this->Consultant->LinkCustomAttributes = "";
		$this->Consultant->HrefValue = "";
		$this->Consultant->TooltipValue = "";

		// Anesthetist
		$this->Anesthetist->LinkCustomAttributes = "";
		$this->Anesthetist->HrefValue = "";
		$this->Anesthetist->TooltipValue = "";

		// Amound
		$this->Amound->LinkCustomAttributes = "";
		$this->Amound->HrefValue = "";
		$this->Amound->TooltipValue = "";

		// Package
		$this->Package->LinkCustomAttributes = "";
		$this->Package->HrefValue = "";
		$this->Package->TooltipValue = "";

		// patient_id
		$this->patient_id->LinkCustomAttributes = "";
		$this->patient_id->HrefValue = "";
		$this->patient_id->TooltipValue = "";

		// PartnerID
		$this->PartnerID->LinkCustomAttributes = "";
		$this->PartnerID->HrefValue = "";
		$this->PartnerID->TooltipValue = "";

		// PartnerName
		$this->PartnerName->LinkCustomAttributes = "";
		$this->PartnerName->HrefValue = "";
		$this->PartnerName->TooltipValue = "";

		// PartnerMobile
		$this->PartnerMobile->LinkCustomAttributes = "";
		$this->PartnerMobile->HrefValue = "";
		$this->PartnerMobile->TooltipValue = "";

		// Cid
		$this->Cid->LinkCustomAttributes = "";
		$this->Cid->HrefValue = "";
		$this->Cid->TooltipValue = "";

		// PartId
		$this->PartId->LinkCustomAttributes = "";
		$this->PartId->HrefValue = "";
		$this->PartId->TooltipValue = "";

		// IDProof
		$this->IDProof->LinkCustomAttributes = "";
		$this->IDProof->HrefValue = "";
		$this->IDProof->TooltipValue = "";

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->LinkCustomAttributes = "";
		$this->AdviceToOtherHospital->HrefValue = "";
		$this->AdviceToOtherHospital->TooltipValue = "";

		// Reason
		$this->Reason->LinkCustomAttributes = "";
		$this->Reason->HrefValue = "";
		$this->Reason->TooltipValue = "";

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

		// mrnNo
		$this->mrnNo->EditAttrs["class"] = "form-control";
		$this->mrnNo->EditCustomAttributes = "";
		if (!$this->mrnNo->Raw)
			$this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
		$this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
		$this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

		// PatientID
		$this->PatientID->EditAttrs["class"] = "form-control";
		$this->PatientID->EditCustomAttributes = "";
		if (!$this->PatientID->Raw)
			$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
		$this->PatientID->EditValue = $this->PatientID->CurrentValue;
		$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

		// patient_name
		$this->patient_name->EditAttrs["class"] = "form-control";
		$this->patient_name->EditCustomAttributes = "";
		if (!$this->patient_name->Raw)
			$this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
		$this->patient_name->EditValue = $this->patient_name->CurrentValue;
		$this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

		// mobileno
		$this->mobileno->EditAttrs["class"] = "form-control";
		$this->mobileno->EditCustomAttributes = "";
		if (!$this->mobileno->Raw)
			$this->mobileno->CurrentValue = HtmlDecode($this->mobileno->CurrentValue);
		$this->mobileno->EditValue = $this->mobileno->CurrentValue;
		$this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

		// gender
		$this->gender->EditAttrs["class"] = "form-control";
		$this->gender->EditCustomAttributes = "";
		if (!$this->gender->Raw)
			$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
		$this->gender->EditValue = $this->gender->CurrentValue;
		$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

		// age
		$this->age->EditAttrs["class"] = "form-control";
		$this->age->EditCustomAttributes = "";
		if (!$this->age->Raw)
			$this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
		$this->age->EditValue = $this->age->CurrentValue;
		$this->age->PlaceHolder = RemoveHtml($this->age->caption());

		// typeRegsisteration
		$this->typeRegsisteration->EditAttrs["class"] = "form-control";
		$this->typeRegsisteration->EditCustomAttributes = "";

		// PaymentCategory
		$this->PaymentCategory->EditAttrs["class"] = "form-control";
		$this->PaymentCategory->EditCustomAttributes = "";

		// physician_id
		$this->physician_id->EditAttrs["class"] = "form-control";
		$this->physician_id->EditCustomAttributes = "";

		// admission_consultant_id
		$this->admission_consultant_id->EditAttrs["class"] = "form-control";
		$this->admission_consultant_id->EditCustomAttributes = "";

		// leading_consultant_id
		$this->leading_consultant_id->EditAttrs["class"] = "form-control";
		$this->leading_consultant_id->EditCustomAttributes = "";

		// cause
		$this->cause->EditAttrs["class"] = "form-control";
		$this->cause->EditCustomAttributes = "";
		$this->cause->EditValue = $this->cause->CurrentValue;
		$this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

		// admission_date
		$this->admission_date->EditAttrs["class"] = "form-control";
		$this->admission_date->EditCustomAttributes = "";
		$this->admission_date->EditValue = FormatDateTime($this->admission_date->CurrentValue, 11);
		$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

		// release_date
		$this->release_date->EditAttrs["class"] = "form-control";
		$this->release_date->EditCustomAttributes = "";
		$this->release_date->EditValue = FormatDateTime($this->release_date->CurrentValue, 17);
		$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

		// PaymentStatus
		$this->PaymentStatus->EditAttrs["class"] = "form-control";
		$this->PaymentStatus->EditCustomAttributes = "";

		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic

		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// HospID
		// DOB

		$this->DOB->EditAttrs["class"] = "form-control";
		$this->DOB->EditCustomAttributes = "";
		if (!$this->DOB->Raw)
			$this->DOB->CurrentValue = HtmlDecode($this->DOB->CurrentValue);
		$this->DOB->EditValue = $this->DOB->CurrentValue;
		$this->DOB->PlaceHolder = RemoveHtml($this->DOB->caption());

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

		// BillClosing
		$this->BillClosing->EditAttrs["class"] = "form-control";
		$this->BillClosing->EditCustomAttributes = "";
		if (!$this->BillClosing->Raw)
			$this->BillClosing->CurrentValue = HtmlDecode($this->BillClosing->CurrentValue);
		$this->BillClosing->EditValue = $this->BillClosing->CurrentValue;
		$this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

		// BillClosingDate
		$this->BillClosingDate->EditAttrs["class"] = "form-control";
		$this->BillClosingDate->EditCustomAttributes = "";
		$this->BillClosingDate->EditValue = FormatDateTime($this->BillClosingDate->CurrentValue, 8);
		$this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

		// BillNumber
		$this->BillNumber->EditAttrs["class"] = "form-control";
		$this->BillNumber->EditCustomAttributes = "";
		if (!$this->BillNumber->Raw)
			$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
		$this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
		$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

		// ClosingAmount
		$this->ClosingAmount->EditAttrs["class"] = "form-control";
		$this->ClosingAmount->EditCustomAttributes = "";
		if (!$this->ClosingAmount->Raw)
			$this->ClosingAmount->CurrentValue = HtmlDecode($this->ClosingAmount->CurrentValue);
		$this->ClosingAmount->EditValue = $this->ClosingAmount->CurrentValue;
		$this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

		// ClosingType
		$this->ClosingType->EditAttrs["class"] = "form-control";
		$this->ClosingType->EditCustomAttributes = "";
		if (!$this->ClosingType->Raw)
			$this->ClosingType->CurrentValue = HtmlDecode($this->ClosingType->CurrentValue);
		$this->ClosingType->EditValue = $this->ClosingType->CurrentValue;
		$this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

		// BillAmount
		$this->BillAmount->EditAttrs["class"] = "form-control";
		$this->BillAmount->EditCustomAttributes = "";
		if (!$this->BillAmount->Raw)
			$this->BillAmount->CurrentValue = HtmlDecode($this->BillAmount->CurrentValue);
		$this->BillAmount->EditValue = $this->BillAmount->CurrentValue;
		$this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

		// billclosedBy
		$this->billclosedBy->EditAttrs["class"] = "form-control";
		$this->billclosedBy->EditCustomAttributes = "";
		if (!$this->billclosedBy->Raw)
			$this->billclosedBy->CurrentValue = HtmlDecode($this->billclosedBy->CurrentValue);
		$this->billclosedBy->EditValue = $this->billclosedBy->CurrentValue;
		$this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

		// bllcloseByDate
		$this->bllcloseByDate->EditAttrs["class"] = "form-control";
		$this->bllcloseByDate->EditCustomAttributes = "";
		$this->bllcloseByDate->EditValue = FormatDateTime($this->bllcloseByDate->CurrentValue, 8);
		$this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

		// ReportHeader
		$this->ReportHeader->EditAttrs["class"] = "form-control";
		$this->ReportHeader->EditCustomAttributes = "";
		if (!$this->ReportHeader->Raw)
			$this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
		$this->ReportHeader->EditValue = $this->ReportHeader->CurrentValue;
		$this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

		// Procedure
		$this->Procedure->EditAttrs["class"] = "form-control";
		$this->Procedure->EditCustomAttributes = "";
		if (!$this->Procedure->Raw)
			$this->Procedure->CurrentValue = HtmlDecode($this->Procedure->CurrentValue);
		$this->Procedure->EditValue = $this->Procedure->CurrentValue;
		$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

		// Consultant
		$this->Consultant->EditAttrs["class"] = "form-control";
		$this->Consultant->EditCustomAttributes = "";
		if (!$this->Consultant->Raw)
			$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
		$this->Consultant->EditValue = $this->Consultant->CurrentValue;
		$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

		// Anesthetist
		$this->Anesthetist->EditAttrs["class"] = "form-control";
		$this->Anesthetist->EditCustomAttributes = "";
		if (!$this->Anesthetist->Raw)
			$this->Anesthetist->CurrentValue = HtmlDecode($this->Anesthetist->CurrentValue);
		$this->Anesthetist->EditValue = $this->Anesthetist->CurrentValue;
		$this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

		// Amound
		$this->Amound->EditAttrs["class"] = "form-control";
		$this->Amound->EditCustomAttributes = "";
		$this->Amound->EditValue = $this->Amound->CurrentValue;
		$this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());
		if (strval($this->Amound->EditValue) != "" && is_numeric($this->Amound->EditValue))
			$this->Amound->EditValue = FormatNumber($this->Amound->EditValue, -2, -2, -2, -2);
		

		// Package
		$this->Package->EditAttrs["class"] = "form-control";
		$this->Package->EditCustomAttributes = "";
		if (!$this->Package->Raw)
			$this->Package->CurrentValue = HtmlDecode($this->Package->CurrentValue);
		$this->Package->EditValue = $this->Package->CurrentValue;
		$this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

		// patient_id
		$this->patient_id->EditAttrs["class"] = "form-control";
		$this->patient_id->EditCustomAttributes = "";

		// PartnerID
		$this->PartnerID->EditAttrs["class"] = "form-control";
		$this->PartnerID->EditCustomAttributes = "";
		if (!$this->PartnerID->Raw)
			$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
		$this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
		$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

		// PartnerName
		$this->PartnerName->EditAttrs["class"] = "form-control";
		$this->PartnerName->EditCustomAttributes = "";
		if (!$this->PartnerName->Raw)
			$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
		$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
		$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

		// PartnerMobile
		$this->PartnerMobile->EditAttrs["class"] = "form-control";
		$this->PartnerMobile->EditCustomAttributes = "";
		if (!$this->PartnerMobile->Raw)
			$this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
		$this->PartnerMobile->EditValue = $this->PartnerMobile->CurrentValue;
		$this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

		// Cid
		$this->Cid->EditAttrs["class"] = "form-control";
		$this->Cid->EditCustomAttributes = "";
		$this->Cid->EditValue = $this->Cid->CurrentValue;
		$this->Cid->PlaceHolder = RemoveHtml($this->Cid->caption());

		// PartId
		$this->PartId->EditAttrs["class"] = "form-control";
		$this->PartId->EditCustomAttributes = "";
		$this->PartId->EditValue = $this->PartId->CurrentValue;
		$this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

		// IDProof
		$this->IDProof->EditAttrs["class"] = "form-control";
		$this->IDProof->EditCustomAttributes = "";
		if (!$this->IDProof->Raw)
			$this->IDProof->CurrentValue = HtmlDecode($this->IDProof->CurrentValue);
		$this->IDProof->EditValue = $this->IDProof->CurrentValue;
		$this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
		$this->AdviceToOtherHospital->EditCustomAttributes = "";
		if (!$this->AdviceToOtherHospital->Raw)
			$this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
		$this->AdviceToOtherHospital->EditValue = $this->AdviceToOtherHospital->CurrentValue;
		$this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

		// Reason
		$this->Reason->EditAttrs["class"] = "form-control";
		$this->Reason->EditCustomAttributes = "";
		$this->Reason->EditValue = $this->Reason->CurrentValue;
		$this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

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
					$doc->exportCaption($this->mrnNo);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->patient_name);
					$doc->exportCaption($this->mobileno);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->age);
					$doc->exportCaption($this->typeRegsisteration);
					$doc->exportCaption($this->PaymentCategory);
					$doc->exportCaption($this->physician_id);
					$doc->exportCaption($this->admission_consultant_id);
					$doc->exportCaption($this->leading_consultant_id);
					$doc->exportCaption($this->cause);
					$doc->exportCaption($this->admission_date);
					$doc->exportCaption($this->release_date);
					$doc->exportCaption($this->PaymentStatus);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->DOB);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->ReferClinicname);
					$doc->exportCaption($this->ReferCity);
					$doc->exportCaption($this->ReferMobileNo);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->PurposreReferredfor);
					$doc->exportCaption($this->BillClosing);
					$doc->exportCaption($this->BillClosingDate);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->ClosingAmount);
					$doc->exportCaption($this->ClosingType);
					$doc->exportCaption($this->BillAmount);
					$doc->exportCaption($this->billclosedBy);
					$doc->exportCaption($this->bllcloseByDate);
					$doc->exportCaption($this->ReportHeader);
					$doc->exportCaption($this->Procedure);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->Anesthetist);
					$doc->exportCaption($this->Amound);
					$doc->exportCaption($this->Package);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
					$doc->exportCaption($this->Cid);
					$doc->exportCaption($this->PartId);
					$doc->exportCaption($this->IDProof);
					$doc->exportCaption($this->AdviceToOtherHospital);
					$doc->exportCaption($this->Reason);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->mrnNo);
					$doc->exportCaption($this->PatientID);
					$doc->exportCaption($this->patient_name);
					$doc->exportCaption($this->mobileno);
					$doc->exportCaption($this->gender);
					$doc->exportCaption($this->age);
					$doc->exportCaption($this->typeRegsisteration);
					$doc->exportCaption($this->PaymentCategory);
					$doc->exportCaption($this->physician_id);
					$doc->exportCaption($this->admission_consultant_id);
					$doc->exportCaption($this->leading_consultant_id);
					$doc->exportCaption($this->admission_date);
					$doc->exportCaption($this->release_date);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->ReferedByDr);
					$doc->exportCaption($this->ReferClinicname);
					$doc->exportCaption($this->ReferCity);
					$doc->exportCaption($this->ReferMobileNo);
					$doc->exportCaption($this->ReferA4TreatingConsultant);
					$doc->exportCaption($this->PurposreReferredfor);
					$doc->exportCaption($this->BillClosing);
					$doc->exportCaption($this->BillClosingDate);
					$doc->exportCaption($this->BillNumber);
					$doc->exportCaption($this->ClosingAmount);
					$doc->exportCaption($this->ClosingType);
					$doc->exportCaption($this->BillAmount);
					$doc->exportCaption($this->billclosedBy);
					$doc->exportCaption($this->bllcloseByDate);
					$doc->exportCaption($this->ReportHeader);
					$doc->exportCaption($this->Procedure);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->Anesthetist);
					$doc->exportCaption($this->Amound);
					$doc->exportCaption($this->Package);
					$doc->exportCaption($this->patient_id);
					$doc->exportCaption($this->PartnerID);
					$doc->exportCaption($this->PartnerName);
					$doc->exportCaption($this->PartnerMobile);
					$doc->exportCaption($this->Cid);
					$doc->exportCaption($this->PartId);
					$doc->exportCaption($this->IDProof);
					$doc->exportCaption($this->AdviceToOtherHospital);
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
						$doc->exportField($this->mrnNo);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->patient_name);
						$doc->exportField($this->mobileno);
						$doc->exportField($this->gender);
						$doc->exportField($this->age);
						$doc->exportField($this->typeRegsisteration);
						$doc->exportField($this->PaymentCategory);
						$doc->exportField($this->physician_id);
						$doc->exportField($this->admission_consultant_id);
						$doc->exportField($this->leading_consultant_id);
						$doc->exportField($this->cause);
						$doc->exportField($this->admission_date);
						$doc->exportField($this->release_date);
						$doc->exportField($this->PaymentStatus);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->HospID);
						$doc->exportField($this->DOB);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->ReferClinicname);
						$doc->exportField($this->ReferCity);
						$doc->exportField($this->ReferMobileNo);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->PurposreReferredfor);
						$doc->exportField($this->BillClosing);
						$doc->exportField($this->BillClosingDate);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->ClosingAmount);
						$doc->exportField($this->ClosingType);
						$doc->exportField($this->BillAmount);
						$doc->exportField($this->billclosedBy);
						$doc->exportField($this->bllcloseByDate);
						$doc->exportField($this->ReportHeader);
						$doc->exportField($this->Procedure);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->Anesthetist);
						$doc->exportField($this->Amound);
						$doc->exportField($this->Package);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
						$doc->exportField($this->Cid);
						$doc->exportField($this->PartId);
						$doc->exportField($this->IDProof);
						$doc->exportField($this->AdviceToOtherHospital);
						$doc->exportField($this->Reason);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->mrnNo);
						$doc->exportField($this->PatientID);
						$doc->exportField($this->patient_name);
						$doc->exportField($this->mobileno);
						$doc->exportField($this->gender);
						$doc->exportField($this->age);
						$doc->exportField($this->typeRegsisteration);
						$doc->exportField($this->PaymentCategory);
						$doc->exportField($this->physician_id);
						$doc->exportField($this->admission_consultant_id);
						$doc->exportField($this->leading_consultant_id);
						$doc->exportField($this->admission_date);
						$doc->exportField($this->release_date);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->HospID);
						$doc->exportField($this->ReferedByDr);
						$doc->exportField($this->ReferClinicname);
						$doc->exportField($this->ReferCity);
						$doc->exportField($this->ReferMobileNo);
						$doc->exportField($this->ReferA4TreatingConsultant);
						$doc->exportField($this->PurposreReferredfor);
						$doc->exportField($this->BillClosing);
						$doc->exportField($this->BillClosingDate);
						$doc->exportField($this->BillNumber);
						$doc->exportField($this->ClosingAmount);
						$doc->exportField($this->ClosingType);
						$doc->exportField($this->BillAmount);
						$doc->exportField($this->billclosedBy);
						$doc->exportField($this->bllcloseByDate);
						$doc->exportField($this->ReportHeader);
						$doc->exportField($this->Procedure);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->Anesthetist);
						$doc->exportField($this->Amound);
						$doc->exportField($this->Package);
						$doc->exportField($this->patient_id);
						$doc->exportField($this->PartnerID);
						$doc->exportField($this->PartnerName);
						$doc->exportField($this->PartnerMobile);
						$doc->exportField($this->Cid);
						$doc->exportField($this->PartId);
						$doc->exportField($this->IDProof);
						$doc->exportField($this->AdviceToOtherHospital);
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
			$rsnew["mrnNo"]  =  $hospital_PreFixCode . 'MRN'. getmrnNo($HospID);
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

				if ($this->PageID == "list") { // List/View page only
					if ($this->PaymentStatus->CurrentValue == 1) {
						$this->RowAttrs["style"] = "background-color: #85e085";
					}else{
						$this->RowAttrs["style"] = "background-color: #ff9999";
					}
				}
	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>