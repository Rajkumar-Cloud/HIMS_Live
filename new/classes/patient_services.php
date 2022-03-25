<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for patient_services
 */
class patient_services extends DbTable
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
	public $Reception;
	public $Services;
	public $amount;
	public $description;
	public $patient_type;
	public $charged_date;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $mrnno;
	public $PatientName;
	public $Age;
	public $Gender;
	public $profilePic;
	public $Unit;
	public $Quantity;
	public $Discount;
	public $SubTotal;
	public $ServiceSelect;
	public $Aid;
	public $Vid;
	public $DrID;
	public $DrCODE;
	public $DrName;
	public $Department;
	public $DrSharePres;
	public $HospSharePres;
	public $DrShareAmount;
	public $HospShareAmount;
	public $DrShareSettiledAmount;
	public $DrShareSettledId;
	public $DrShareSettiledStatus;
	public $invoiceId;
	public $invoiceAmount;
	public $invoiceStatus;
	public $modeOfPayment;
	public $HospID;
	public $RIDNO;
	public $TidNo;
	public $DiscountCategory;
	public $sid;
	public $ItemCode;
	public $TestSubCd;
	public $DEptCd;
	public $ProfCd;
	public $LabReport;
	public $Comments;
	public $Method;
	public $Specimen;
	public $Abnormal;
	public $RefValue;
	public $TestUnit;
	public $LOWHIGH;
	public $Branch;
	public $Dispatch;
	public $Pic1;
	public $Pic2;
	public $GraphPath;
	public $MachineCD;
	public $TestCancel;
	public $OutSource;
	public $Printed;
	public $PrintBy;
	public $PrintDate;
	public $BillingDate;
	public $BilledBy;
	public $Resulted;
	public $ResultDate;
	public $ResultedBy;
	public $SampleDate;
	public $SampleUser;
	public $Sampled;
	public $ReceivedDate;
	public $ReceivedUser;
	public $Recevied;
	public $DeptRecvDate;
	public $DeptRecvUser;
	public $DeptRecived;
	public $SAuthDate;
	public $SAuthBy;
	public $SAuthendicate;
	public $AuthDate;
	public $AuthBy;
	public $Authencate;
	public $EditDate;
	public $EditBy;
	public $Editted;
	public $PatID;
	public $PatientId;
	public $Mobile;
	public $CId;
	public $Order;
	public $Form;
	public $ResType;
	public $Sample;
	public $NoD;
	public $BillOrder;
	public $Formula;
	public $Inactive;
	public $CollSample;
	public $TestType;
	public $Repeated;
	public $RepeatedBy;
	public $RepeatedDate;
	public $serviceID;
	public $Service_Type;
	public $Service_Department;
	public $RequestNo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'patient_services';
		$this->TableName = 'patient_services';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`patient_services`";
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
		$this->id = new DbField('patient_services', 'patient_services', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// Reception
		$this->Reception = new DbField('patient_services', 'patient_services', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 3, 11, -1, FALSE, '`Reception`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reception->IsForeignKey = TRUE; // Foreign key field
		$this->Reception->Sortable = TRUE; // Allow sort
		$this->Reception->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Reception'] = &$this->Reception;

		// Services
		$this->Services = new DbField('patient_services', 'patient_services', 'x_Services', 'Services', '`Services`', '`Services`', 200, 50, -1, FALSE, '`EV__Services`', TRUE, TRUE, TRUE, 'FORMATTED TEXT', 'TEXT');
		$this->Services->Nullable = FALSE; // NOT NULL field
		$this->Services->Required = TRUE; // Required field
		$this->Services->Sortable = TRUE; // Allow sort
		$this->Services->Lookup = new Lookup('Services', 'mas_services_billing', FALSE, 'SERVICE', ["SERVICE","","",""], [], [], [], [], ["AMOUNT","Id","CODE","Id","SERVICE_TYPE","DEPARTMENT"], ["x_amount","x_sid","x_ItemCode","x_serviceID","x_Service_Type","x_Service_Department"], '', '');
		$this->fields['Services'] = &$this->Services;

		// amount
		$this->amount = new DbField('patient_services', 'patient_services', 'x_amount', 'amount', '`amount`', '`amount`', 131, 12, -1, FALSE, '`amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->amount->Nullable = FALSE; // NOT NULL field
		$this->amount->Required = TRUE; // Required field
		$this->amount->Sortable = TRUE; // Allow sort
		$this->amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['amount'] = &$this->amount;

		// description
		$this->description = new DbField('patient_services', 'patient_services', 'x_description', 'description', '`description`', '`description`', 201, 65535, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// patient_type
		$this->patient_type = new DbField('patient_services', 'patient_services', 'x_patient_type', 'patient_type', '`patient_type`', '`patient_type`', 3, 11, -1, FALSE, '`patient_type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->patient_type->Sortable = TRUE; // Allow sort
		$this->patient_type->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['patient_type'] = &$this->patient_type;

		// charged_date
		$this->charged_date = new DbField('patient_services', 'patient_services', 'x_charged_date', 'charged_date', '`charged_date`', CastDateFieldForLike("`charged_date`", 0, "DB"), 135, 19, 0, FALSE, '`charged_date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->charged_date->Sortable = TRUE; // Allow sort
		$this->charged_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['charged_date'] = &$this->charged_date;

		// status
		$this->status = new DbField('patient_services', 'patient_services', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->status->Lookup = new Lookup('status', 'sys_status', FALSE, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('patient_services', 'patient_services', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = FALSE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('patient_services', 'patient_services', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = FALSE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('patient_services', 'patient_services', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = FALSE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('patient_services', 'patient_services', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = FALSE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// mrnno
		$this->mrnno = new DbField('patient_services', 'patient_services', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, FALSE, '`mrnno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mrnno->IsForeignKey = TRUE; // Foreign key field
		$this->mrnno->Sortable = TRUE; // Allow sort
		$this->fields['mrnno'] = &$this->mrnno;

		// PatientName
		$this->PatientName = new DbField('patient_services', 'patient_services', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Age
		$this->Age = new DbField('patient_services', 'patient_services', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// Gender
		$this->Gender = new DbField('patient_services', 'patient_services', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, FALSE, '`Gender`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Gender->Sortable = TRUE; // Allow sort
		$this->fields['Gender'] = &$this->Gender;

		// profilePic
		$this->profilePic = new DbField('patient_services', 'patient_services', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, FALSE, '`profilePic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->profilePic->Sortable = TRUE; // Allow sort
		$this->fields['profilePic'] = &$this->profilePic;

		// Unit
		$this->Unit = new DbField('patient_services', 'patient_services', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 3, 11, -1, FALSE, '`Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Unit->Sortable = TRUE; // Allow sort
		$this->Unit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Unit'] = &$this->Unit;

		// Quantity
		$this->Quantity = new DbField('patient_services', 'patient_services', 'x_Quantity', 'Quantity', '`Quantity`', '`Quantity`', 3, 11, -1, FALSE, '`Quantity`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Quantity->Sortable = TRUE; // Allow sort
		$this->Quantity->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Quantity'] = &$this->Quantity;

		// Discount
		$this->Discount = new DbField('patient_services', 'patient_services', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 131, 12, -1, FALSE, '`Discount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Discount->Sortable = TRUE; // Allow sort
		$this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Discount'] = &$this->Discount;

		// SubTotal
		$this->SubTotal = new DbField('patient_services', 'patient_services', 'x_SubTotal', 'SubTotal', '`SubTotal`', '`SubTotal`', 131, 12, -1, FALSE, '`SubTotal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SubTotal->Sortable = TRUE; // Allow sort
		$this->SubTotal->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['SubTotal'] = &$this->SubTotal;

		// ServiceSelect
		$this->ServiceSelect = new DbField('patient_services', 'patient_services', 'x_ServiceSelect', 'ServiceSelect', '\'\'', '\'\'', 201, 65530, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->ServiceSelect->IsCustom = TRUE; // Custom field
		$this->ServiceSelect->Sortable = TRUE; // Allow sort
		$this->ServiceSelect->Lookup = new Lookup('ServiceSelect', 'patient_services', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ServiceSelect->OptionCount = 1;
		$this->fields['ServiceSelect'] = &$this->ServiceSelect;

		// Aid
		$this->Aid = new DbField('patient_services', 'patient_services', 'x_Aid', 'Aid', '`Aid`', '`Aid`', 3, 11, -1, FALSE, '`Aid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Aid->Sortable = TRUE; // Allow sort
		$this->Aid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Aid'] = &$this->Aid;

		// Vid
		$this->Vid = new DbField('patient_services', 'patient_services', 'x_Vid', 'Vid', '`Vid`', '`Vid`', 3, 11, -1, FALSE, '`Vid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Vid->IsForeignKey = TRUE; // Foreign key field
		$this->Vid->Sortable = TRUE; // Allow sort
		$this->Vid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Vid'] = &$this->Vid;

		// DrID
		$this->DrID = new DbField('patient_services', 'patient_services', 'x_DrID', 'DrID', '`DrID`', '`DrID`', 3, 11, -1, FALSE, '`DrID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrID->Sortable = TRUE; // Allow sort
		$this->DrID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrID'] = &$this->DrID;

		// DrCODE
		$this->DrCODE = new DbField('patient_services', 'patient_services', 'x_DrCODE', 'DrCODE', '`DrCODE`', '`DrCODE`', 200, 45, -1, FALSE, '`DrCODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrCODE->Sortable = TRUE; // Allow sort
		$this->fields['DrCODE'] = &$this->DrCODE;

		// DrName
		$this->DrName = new DbField('patient_services', 'patient_services', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, FALSE, '`DrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrName->Sortable = TRUE; // Allow sort
		$this->fields['DrName'] = &$this->DrName;

		// Department
		$this->Department = new DbField('patient_services', 'patient_services', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, FALSE, '`Department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Department->Sortable = TRUE; // Allow sort
		$this->fields['Department'] = &$this->Department;

		// DrSharePres
		$this->DrSharePres = new DbField('patient_services', 'patient_services', 'x_DrSharePres', 'DrSharePres', '`DrSharePres`', '`DrSharePres`', 131, 12, -1, FALSE, '`DrSharePres`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrSharePres->Sortable = TRUE; // Allow sort
		$this->DrSharePres->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DrSharePres'] = &$this->DrSharePres;

		// HospSharePres
		$this->HospSharePres = new DbField('patient_services', 'patient_services', 'x_HospSharePres', 'HospSharePres', '`HospSharePres`', '`HospSharePres`', 131, 12, -1, FALSE, '`HospSharePres`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospSharePres->Sortable = TRUE; // Allow sort
		$this->HospSharePres->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['HospSharePres'] = &$this->HospSharePres;

		// DrShareAmount
		$this->DrShareAmount = new DbField('patient_services', 'patient_services', 'x_DrShareAmount', 'DrShareAmount', '`DrShareAmount`', '`DrShareAmount`', 131, 12, -1, FALSE, '`DrShareAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrShareAmount->Sortable = TRUE; // Allow sort
		$this->DrShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DrShareAmount'] = &$this->DrShareAmount;

		// HospShareAmount
		$this->HospShareAmount = new DbField('patient_services', 'patient_services', 'x_HospShareAmount', 'HospShareAmount', '`HospShareAmount`', '`HospShareAmount`', 131, 12, -1, FALSE, '`HospShareAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospShareAmount->Sortable = TRUE; // Allow sort
		$this->HospShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['HospShareAmount'] = &$this->HospShareAmount;

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount = new DbField('patient_services', 'patient_services', 'x_DrShareSettiledAmount', 'DrShareSettiledAmount', '`DrShareSettiledAmount`', '`DrShareSettiledAmount`', 131, 12, -1, FALSE, '`DrShareSettiledAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrShareSettiledAmount->Sortable = TRUE; // Allow sort
		$this->DrShareSettiledAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DrShareSettiledAmount'] = &$this->DrShareSettiledAmount;

		// DrShareSettledId
		$this->DrShareSettledId = new DbField('patient_services', 'patient_services', 'x_DrShareSettledId', 'DrShareSettledId', '`DrShareSettledId`', '`DrShareSettledId`', 3, 11, -1, FALSE, '`DrShareSettledId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrShareSettledId->Sortable = TRUE; // Allow sort
		$this->DrShareSettledId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrShareSettledId'] = &$this->DrShareSettledId;

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus = new DbField('patient_services', 'patient_services', 'x_DrShareSettiledStatus', 'DrShareSettiledStatus', '`DrShareSettiledStatus`', '`DrShareSettiledStatus`', 3, 11, -1, FALSE, '`DrShareSettiledStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrShareSettiledStatus->Sortable = TRUE; // Allow sort
		$this->DrShareSettiledStatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrShareSettiledStatus'] = &$this->DrShareSettiledStatus;

		// invoiceId
		$this->invoiceId = new DbField('patient_services', 'patient_services', 'x_invoiceId', 'invoiceId', '`invoiceId`', '`invoiceId`', 3, 11, -1, FALSE, '`invoiceId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceId->Sortable = TRUE; // Allow sort
		$this->invoiceId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['invoiceId'] = &$this->invoiceId;

		// invoiceAmount
		$this->invoiceAmount = new DbField('patient_services', 'patient_services', 'x_invoiceAmount', 'invoiceAmount', '`invoiceAmount`', '`invoiceAmount`', 131, 12, -1, FALSE, '`invoiceAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceAmount->Sortable = TRUE; // Allow sort
		$this->invoiceAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['invoiceAmount'] = &$this->invoiceAmount;

		// invoiceStatus
		$this->invoiceStatus = new DbField('patient_services', 'patient_services', 'x_invoiceStatus', 'invoiceStatus', '`invoiceStatus`', '`invoiceStatus`', 200, 45, -1, FALSE, '`invoiceStatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->invoiceStatus->Sortable = TRUE; // Allow sort
		$this->fields['invoiceStatus'] = &$this->invoiceStatus;

		// modeOfPayment
		$this->modeOfPayment = new DbField('patient_services', 'patient_services', 'x_modeOfPayment', 'modeOfPayment', '`modeOfPayment`', '`modeOfPayment`', 200, 45, -1, FALSE, '`modeOfPayment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modeOfPayment->Sortable = TRUE; // Allow sort
		$this->fields['modeOfPayment'] = &$this->modeOfPayment;

		// HospID
		$this->HospID = new DbField('patient_services', 'patient_services', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// RIDNO
		$this->RIDNO = new DbField('patient_services', 'patient_services', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// TidNo
		$this->TidNo = new DbField('patient_services', 'patient_services', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// DiscountCategory
		$this->DiscountCategory = new DbField('patient_services', 'patient_services', 'x_DiscountCategory', 'DiscountCategory', '`DiscountCategory`', '`DiscountCategory`', 200, 45, -1, FALSE, '`DiscountCategory`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DiscountCategory->Sortable = TRUE; // Allow sort
		$this->fields['DiscountCategory'] = &$this->DiscountCategory;

		// sid
		$this->sid = new DbField('patient_services', 'patient_services', 'x_sid', 'sid', '`sid`', '`sid`', 3, 11, -1, FALSE, '`sid`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sid->Sortable = TRUE; // Allow sort
		$this->sid->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sid'] = &$this->sid;

		// ItemCode
		$this->ItemCode = new DbField('patient_services', 'patient_services', 'x_ItemCode', 'ItemCode', '`ItemCode`', '`ItemCode`', 200, 45, -1, FALSE, '`ItemCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ItemCode->Sortable = TRUE; // Allow sort
		$this->fields['ItemCode'] = &$this->ItemCode;

		// TestSubCd
		$this->TestSubCd = new DbField('patient_services', 'patient_services', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 45, -1, FALSE, '`TestSubCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestSubCd->Sortable = TRUE; // Allow sort
		$this->fields['TestSubCd'] = &$this->TestSubCd;

		// DEptCd
		$this->DEptCd = new DbField('patient_services', 'patient_services', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 45, -1, FALSE, '`DEptCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->fields['DEptCd'] = &$this->DEptCd;

		// ProfCd
		$this->ProfCd = new DbField('patient_services', 'patient_services', 'x_ProfCd', 'ProfCd', '`ProfCd`', '`ProfCd`', 200, 45, -1, FALSE, '`ProfCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProfCd->Sortable = TRUE; // Allow sort
		$this->fields['ProfCd'] = &$this->ProfCd;

		// LabReport
		$this->LabReport = new DbField('patient_services', 'patient_services', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 65535, -1, FALSE, '`LabReport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LabReport->Sortable = TRUE; // Allow sort
		$this->fields['LabReport'] = &$this->LabReport;

		// Comments
		$this->Comments = new DbField('patient_services', 'patient_services', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 200, 45, -1, FALSE, '`Comments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Comments->Sortable = TRUE; // Allow sort
		$this->fields['Comments'] = &$this->Comments;

		// Method
		$this->Method = new DbField('patient_services', 'patient_services', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Method->Sortable = TRUE; // Allow sort
		$this->fields['Method'] = &$this->Method;

		// Specimen
		$this->Specimen = new DbField('patient_services', 'patient_services', 'x_Specimen', 'Specimen', '`Specimen`', '`Specimen`', 200, 45, -1, FALSE, '`Specimen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Specimen->Sortable = TRUE; // Allow sort
		$this->fields['Specimen'] = &$this->Specimen;

		// Abnormal
		$this->Abnormal = new DbField('patient_services', 'patient_services', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, 45, -1, FALSE, '`Abnormal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormal->Sortable = TRUE; // Allow sort
		$this->fields['Abnormal'] = &$this->Abnormal;

		// RefValue
		$this->RefValue = new DbField('patient_services', 'patient_services', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 65535, -1, FALSE, '`RefValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RefValue->Sortable = TRUE; // Allow sort
		$this->fields['RefValue'] = &$this->RefValue;

		// TestUnit
		$this->TestUnit = new DbField('patient_services', 'patient_services', 'x_TestUnit', 'TestUnit', '`TestUnit`', '`TestUnit`', 200, 45, -1, FALSE, '`TestUnit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestUnit->Sortable = TRUE; // Allow sort
		$this->fields['TestUnit'] = &$this->TestUnit;

		// LOWHIGH
		$this->LOWHIGH = new DbField('patient_services', 'patient_services', 'x_LOWHIGH', 'LOWHIGH', '`LOWHIGH`', '`LOWHIGH`', 200, 45, -1, FALSE, '`LOWHIGH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOWHIGH->Sortable = TRUE; // Allow sort
		$this->fields['LOWHIGH'] = &$this->LOWHIGH;

		// Branch
		$this->Branch = new DbField('patient_services', 'patient_services', 'x_Branch', 'Branch', '`Branch`', '`Branch`', 200, 45, -1, FALSE, '`Branch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Branch->Sortable = TRUE; // Allow sort
		$this->fields['Branch'] = &$this->Branch;

		// Dispatch
		$this->Dispatch = new DbField('patient_services', 'patient_services', 'x_Dispatch', 'Dispatch', '`Dispatch`', '`Dispatch`', 200, 45, -1, FALSE, '`Dispatch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dispatch->Sortable = TRUE; // Allow sort
		$this->fields['Dispatch'] = &$this->Dispatch;

		// Pic1
		$this->Pic1 = new DbField('patient_services', 'patient_services', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 45, -1, FALSE, '`Pic1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic1->Sortable = TRUE; // Allow sort
		$this->fields['Pic1'] = &$this->Pic1;

		// Pic2
		$this->Pic2 = new DbField('patient_services', 'patient_services', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 45, -1, FALSE, '`Pic2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic2->Sortable = TRUE; // Allow sort
		$this->fields['Pic2'] = &$this->Pic2;

		// GraphPath
		$this->GraphPath = new DbField('patient_services', 'patient_services', 'x_GraphPath', 'GraphPath', '`GraphPath`', '`GraphPath`', 200, 45, -1, FALSE, '`GraphPath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GraphPath->Sortable = TRUE; // Allow sort
		$this->fields['GraphPath'] = &$this->GraphPath;

		// MachineCD
		$this->MachineCD = new DbField('patient_services', 'patient_services', 'x_MachineCD', 'MachineCD', '`MachineCD`', '`MachineCD`', 200, 45, -1, FALSE, '`MachineCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MachineCD->Sortable = TRUE; // Allow sort
		$this->fields['MachineCD'] = &$this->MachineCD;

		// TestCancel
		$this->TestCancel = new DbField('patient_services', 'patient_services', 'x_TestCancel', 'TestCancel', '`TestCancel`', '`TestCancel`', 200, 45, -1, FALSE, '`TestCancel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestCancel->Sortable = TRUE; // Allow sort
		$this->fields['TestCancel'] = &$this->TestCancel;

		// OutSource
		$this->OutSource = new DbField('patient_services', 'patient_services', 'x_OutSource', 'OutSource', '`OutSource`', '`OutSource`', 200, 45, -1, FALSE, '`OutSource`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OutSource->Sortable = TRUE; // Allow sort
		$this->fields['OutSource'] = &$this->OutSource;

		// Printed
		$this->Printed = new DbField('patient_services', 'patient_services', 'x_Printed', 'Printed', '`Printed`', '`Printed`', 200, 45, -1, FALSE, '`Printed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Printed->Sortable = TRUE; // Allow sort
		$this->fields['Printed'] = &$this->Printed;

		// PrintBy
		$this->PrintBy = new DbField('patient_services', 'patient_services', 'x_PrintBy', 'PrintBy', '`PrintBy`', '`PrintBy`', 200, 45, -1, FALSE, '`PrintBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintBy->Sortable = TRUE; // Allow sort
		$this->fields['PrintBy'] = &$this->PrintBy;

		// PrintDate
		$this->PrintDate = new DbField('patient_services', 'patient_services', 'x_PrintDate', 'PrintDate', '`PrintDate`', CastDateFieldForLike("`PrintDate`", 0, "DB"), 135, 19, 0, FALSE, '`PrintDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintDate->Sortable = TRUE; // Allow sort
		$this->PrintDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['PrintDate'] = &$this->PrintDate;

		// BillingDate
		$this->BillingDate = new DbField('patient_services', 'patient_services', 'x_BillingDate', 'BillingDate', '`BillingDate`', CastDateFieldForLike("`BillingDate`", 0, "DB"), 135, 19, 0, FALSE, '`BillingDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillingDate->Sortable = TRUE; // Allow sort
		$this->BillingDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['BillingDate'] = &$this->BillingDate;

		// BilledBy
		$this->BilledBy = new DbField('patient_services', 'patient_services', 'x_BilledBy', 'BilledBy', '`BilledBy`', '`BilledBy`', 200, 45, -1, FALSE, '`BilledBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BilledBy->Sortable = TRUE; // Allow sort
		$this->fields['BilledBy'] = &$this->BilledBy;

		// Resulted
		$this->Resulted = new DbField('patient_services', 'patient_services', 'x_Resulted', 'Resulted', '`Resulted`', '`Resulted`', 200, 45, -1, FALSE, '`Resulted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Resulted->Sortable = TRUE; // Allow sort
		$this->fields['Resulted'] = &$this->Resulted;

		// ResultDate
		$this->ResultDate = new DbField('patient_services', 'patient_services', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// ResultedBy
		$this->ResultedBy = new DbField('patient_services', 'patient_services', 'x_ResultedBy', 'ResultedBy', '`ResultedBy`', '`ResultedBy`', 200, 45, -1, FALSE, '`ResultedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultedBy->Sortable = TRUE; // Allow sort
		$this->fields['ResultedBy'] = &$this->ResultedBy;

		// SampleDate
		$this->SampleDate = new DbField('patient_services', 'patient_services', 'x_SampleDate', 'SampleDate', '`SampleDate`', CastDateFieldForLike("`SampleDate`", 0, "DB"), 135, 19, 0, FALSE, '`SampleDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleDate->Sortable = TRUE; // Allow sort
		$this->SampleDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SampleDate'] = &$this->SampleDate;

		// SampleUser
		$this->SampleUser = new DbField('patient_services', 'patient_services', 'x_SampleUser', 'SampleUser', '`SampleUser`', '`SampleUser`', 200, 45, -1, FALSE, '`SampleUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleUser->Sortable = TRUE; // Allow sort
		$this->fields['SampleUser'] = &$this->SampleUser;

		// Sampled
		$this->Sampled = new DbField('patient_services', 'patient_services', 'x_Sampled', 'Sampled', '`Sampled`', '`Sampled`', 200, 45, -1, FALSE, '`Sampled`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sampled->Sortable = TRUE; // Allow sort
		$this->fields['Sampled'] = &$this->Sampled;

		// ReceivedDate
		$this->ReceivedDate = new DbField('patient_services', 'patient_services', 'x_ReceivedDate', 'ReceivedDate', '`ReceivedDate`', CastDateFieldForLike("`ReceivedDate`", 0, "DB"), 135, 19, 0, FALSE, '`ReceivedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedDate->Sortable = TRUE; // Allow sort
		$this->ReceivedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReceivedDate'] = &$this->ReceivedDate;

		// ReceivedUser
		$this->ReceivedUser = new DbField('patient_services', 'patient_services', 'x_ReceivedUser', 'ReceivedUser', '`ReceivedUser`', '`ReceivedUser`', 200, 45, -1, FALSE, '`ReceivedUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedUser->Sortable = TRUE; // Allow sort
		$this->fields['ReceivedUser'] = &$this->ReceivedUser;

		// Recevied
		$this->Recevied = new DbField('patient_services', 'patient_services', 'x_Recevied', 'Recevied', '`Recevied`', '`Recevied`', 200, 45, -1, FALSE, '`Recevied`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Recevied->Sortable = TRUE; // Allow sort
		$this->fields['Recevied'] = &$this->Recevied;

		// DeptRecvDate
		$this->DeptRecvDate = new DbField('patient_services', 'patient_services', 'x_DeptRecvDate', 'DeptRecvDate', '`DeptRecvDate`', CastDateFieldForLike("`DeptRecvDate`", 0, "DB"), 135, 19, 0, FALSE, '`DeptRecvDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptRecvDate->Sortable = TRUE; // Allow sort
		$this->DeptRecvDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DeptRecvDate'] = &$this->DeptRecvDate;

		// DeptRecvUser
		$this->DeptRecvUser = new DbField('patient_services', 'patient_services', 'x_DeptRecvUser', 'DeptRecvUser', '`DeptRecvUser`', '`DeptRecvUser`', 200, 45, -1, FALSE, '`DeptRecvUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptRecvUser->Sortable = TRUE; // Allow sort
		$this->fields['DeptRecvUser'] = &$this->DeptRecvUser;

		// DeptRecived
		$this->DeptRecived = new DbField('patient_services', 'patient_services', 'x_DeptRecived', 'DeptRecived', '`DeptRecived`', '`DeptRecived`', 200, 45, -1, FALSE, '`DeptRecived`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptRecived->Sortable = TRUE; // Allow sort
		$this->fields['DeptRecived'] = &$this->DeptRecived;

		// SAuthDate
		$this->SAuthDate = new DbField('patient_services', 'patient_services', 'x_SAuthDate', 'SAuthDate', '`SAuthDate`', CastDateFieldForLike("`SAuthDate`", 0, "DB"), 135, 19, 0, FALSE, '`SAuthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAuthDate->Sortable = TRUE; // Allow sort
		$this->SAuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SAuthDate'] = &$this->SAuthDate;

		// SAuthBy
		$this->SAuthBy = new DbField('patient_services', 'patient_services', 'x_SAuthBy', 'SAuthBy', '`SAuthBy`', '`SAuthBy`', 200, 45, -1, FALSE, '`SAuthBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAuthBy->Sortable = TRUE; // Allow sort
		$this->fields['SAuthBy'] = &$this->SAuthBy;

		// SAuthendicate
		$this->SAuthendicate = new DbField('patient_services', 'patient_services', 'x_SAuthendicate', 'SAuthendicate', '`SAuthendicate`', '`SAuthendicate`', 200, 45, -1, FALSE, '`SAuthendicate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAuthendicate->Sortable = TRUE; // Allow sort
		$this->fields['SAuthendicate'] = &$this->SAuthendicate;

		// AuthDate
		$this->AuthDate = new DbField('patient_services', 'patient_services', 'x_AuthDate', 'AuthDate', '`AuthDate`', CastDateFieldForLike("`AuthDate`", 0, "DB"), 135, 19, 0, FALSE, '`AuthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AuthDate->Sortable = TRUE; // Allow sort
		$this->AuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['AuthDate'] = &$this->AuthDate;

		// AuthBy
		$this->AuthBy = new DbField('patient_services', 'patient_services', 'x_AuthBy', 'AuthBy', '`AuthBy`', '`AuthBy`', 200, 45, -1, FALSE, '`AuthBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AuthBy->Sortable = TRUE; // Allow sort
		$this->fields['AuthBy'] = &$this->AuthBy;

		// Authencate
		$this->Authencate = new DbField('patient_services', 'patient_services', 'x_Authencate', 'Authencate', '`Authencate`', '`Authencate`', 200, 45, -1, FALSE, '`Authencate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Authencate->Sortable = TRUE; // Allow sort
		$this->fields['Authencate'] = &$this->Authencate;

		// EditDate
		$this->EditDate = new DbField('patient_services', 'patient_services', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 19, 0, FALSE, '`EditDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EditDate->Sortable = TRUE; // Allow sort
		$this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EditDate'] = &$this->EditDate;

		// EditBy
		$this->EditBy = new DbField('patient_services', 'patient_services', 'x_EditBy', 'EditBy', '`EditBy`', '`EditBy`', 200, 45, -1, FALSE, '`EditBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EditBy->Sortable = TRUE; // Allow sort
		$this->fields['EditBy'] = &$this->EditBy;

		// Editted
		$this->Editted = new DbField('patient_services', 'patient_services', 'x_Editted', 'Editted', '`Editted`', '`Editted`', 200, 45, -1, FALSE, '`Editted`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Editted->Sortable = TRUE; // Allow sort
		$this->fields['Editted'] = &$this->Editted;

		// PatID
		$this->PatID = new DbField('patient_services', 'patient_services', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 3, 11, -1, FALSE, '`PatID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatID->IsForeignKey = TRUE; // Foreign key field
		$this->PatID->Sortable = TRUE; // Allow sort
		$this->PatID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatID'] = &$this->PatID;

		// PatientId
		$this->PatientId = new DbField('patient_services', 'patient_services', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// Mobile
		$this->Mobile = new DbField('patient_services', 'patient_services', 'x_Mobile', 'Mobile', '`Mobile`', '`Mobile`', 200, 45, -1, FALSE, '`Mobile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mobile->Sortable = TRUE; // Allow sort
		$this->fields['Mobile'] = &$this->Mobile;

		// CId
		$this->CId = new DbField('patient_services', 'patient_services', 'x_CId', 'CId', '`CId`', '`CId`', 3, 11, -1, FALSE, '`CId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CId->Sortable = TRUE; // Allow sort
		$this->CId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CId'] = &$this->CId;

		// Order
		$this->Order = new DbField('patient_services', 'patient_services', 'x_Order', 'Order', '`Order`', '`Order`', 131, 10, -1, FALSE, '`Order`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Order->Sortable = TRUE; // Allow sort
		$this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Order'] = &$this->Order;

		// Form
		$this->Form = new DbField('patient_services', 'patient_services', 'x_Form', 'Form', '`Form`', '`Form`', 201, 500, -1, FALSE, '`Form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Form->Sortable = TRUE; // Allow sort
		$this->fields['Form'] = &$this->Form;

		// ResType
		$this->ResType = new DbField('patient_services', 'patient_services', 'x_ResType', 'ResType', '`ResType`', '`ResType`', 200, 45, -1, FALSE, '`ResType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResType->Sortable = TRUE; // Allow sort
		$this->fields['ResType'] = &$this->ResType;

		// Sample
		$this->Sample = new DbField('patient_services', 'patient_services', 'x_Sample', 'Sample', '`Sample`', '`Sample`', 200, 150, -1, FALSE, '`Sample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sample->Sortable = TRUE; // Allow sort
		$this->fields['Sample'] = &$this->Sample;

		// NoD
		$this->NoD = new DbField('patient_services', 'patient_services', 'x_NoD', 'NoD', '`NoD`', '`NoD`', 131, 10, -1, FALSE, '`NoD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoD->Sortable = TRUE; // Allow sort
		$this->NoD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NoD'] = &$this->NoD;

		// BillOrder
		$this->BillOrder = new DbField('patient_services', 'patient_services', 'x_BillOrder', 'BillOrder', '`BillOrder`', '`BillOrder`', 131, 10, -1, FALSE, '`BillOrder`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillOrder->Sortable = TRUE; // Allow sort
		$this->BillOrder->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['BillOrder'] = &$this->BillOrder;

		// Formula
		$this->Formula = new DbField('patient_services', 'patient_services', 'x_Formula', 'Formula', '`Formula`', '`Formula`', 201, 1500, -1, FALSE, '`Formula`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Formula->Sortable = TRUE; // Allow sort
		$this->fields['Formula'] = &$this->Formula;

		// Inactive
		$this->Inactive = new DbField('patient_services', 'patient_services', 'x_Inactive', 'Inactive', '`Inactive`', '`Inactive`', 200, 45, -1, FALSE, '`Inactive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Inactive->Sortable = TRUE; // Allow sort
		$this->fields['Inactive'] = &$this->Inactive;

		// CollSample
		$this->CollSample = new DbField('patient_services', 'patient_services', 'x_CollSample', 'CollSample', '`CollSample`', '`CollSample`', 200, 45, -1, FALSE, '`CollSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CollSample->Sortable = TRUE; // Allow sort
		$this->fields['CollSample'] = &$this->CollSample;

		// TestType
		$this->TestType = new DbField('patient_services', 'patient_services', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, 45, -1, FALSE, '`TestType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestType->Sortable = TRUE; // Allow sort
		$this->fields['TestType'] = &$this->TestType;

		// Repeated
		$this->Repeated = new DbField('patient_services', 'patient_services', 'x_Repeated', 'Repeated', '`Repeated`', '`Repeated`', 200, 45, -1, FALSE, '`Repeated`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Repeated->Sortable = TRUE; // Allow sort
		$this->fields['Repeated'] = &$this->Repeated;

		// RepeatedBy
		$this->RepeatedBy = new DbField('patient_services', 'patient_services', 'x_RepeatedBy', 'RepeatedBy', '`RepeatedBy`', '`RepeatedBy`', 200, 45, -1, FALSE, '`RepeatedBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RepeatedBy->Sortable = TRUE; // Allow sort
		$this->fields['RepeatedBy'] = &$this->RepeatedBy;

		// RepeatedDate
		$this->RepeatedDate = new DbField('patient_services', 'patient_services', 'x_RepeatedDate', 'RepeatedDate', '`RepeatedDate`', CastDateFieldForLike("`RepeatedDate`", 0, "DB"), 135, 19, 0, FALSE, '`RepeatedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RepeatedDate->Sortable = TRUE; // Allow sort
		$this->RepeatedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['RepeatedDate'] = &$this->RepeatedDate;

		// serviceID
		$this->serviceID = new DbField('patient_services', 'patient_services', 'x_serviceID', 'serviceID', '`serviceID`', '`serviceID`', 3, 11, -1, FALSE, '`serviceID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->serviceID->Sortable = TRUE; // Allow sort
		$this->serviceID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['serviceID'] = &$this->serviceID;

		// Service_Type
		$this->Service_Type = new DbField('patient_services', 'patient_services', 'x_Service_Type', 'Service_Type', '`Service_Type`', '`Service_Type`', 200, 45, -1, FALSE, '`Service_Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Service_Type->Sortable = TRUE; // Allow sort
		$this->fields['Service_Type'] = &$this->Service_Type;

		// Service_Department
		$this->Service_Department = new DbField('patient_services', 'patient_services', 'x_Service_Department', 'Service_Department', '`Service_Department`', '`Service_Department`', 200, 45, -1, FALSE, '`Service_Department`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Service_Department->Sortable = TRUE; // Allow sort
		$this->fields['Service_Department'] = &$this->Service_Department;

		// RequestNo
		$this->RequestNo = new DbField('patient_services', 'patient_services', 'x_RequestNo', 'RequestNo', '`RequestNo`', '`RequestNo`', 3, 11, -1, FALSE, '`RequestNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RequestNo->Sortable = TRUE; // Allow sort
		$this->RequestNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RequestNo'] = &$this->RequestNo;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "billing_voucher") {
			if ($this->Vid->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() != "")
				$masterFilter .= "`id`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
				$masterFilter .= " AND `mrnNo`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PatID->getSessionValue() != "")
				$masterFilter .= " AND `patient_id`=" . QuotedValue($this->PatID->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "billing_voucher") {
			if ($this->Vid->getSessionValue() != "")
				$detailFilter .= "`Vid`=" . QuotedValue($this->Vid->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		if ($this->getCurrentMasterTable() == "ip_admission") {
			if ($this->Reception->getSessionValue() != "")
				$detailFilter .= "`Reception`=" . QuotedValue($this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->mrnno->getSessionValue() != "")
				$detailFilter .= " AND `mrnno`=" . QuotedValue($this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->PatID->getSessionValue() != "")
				$detailFilter .= " AND `PatID`=" . QuotedValue($this->PatID->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_billing_voucher()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_billing_voucher()
	{
		return "`Vid`=@Vid@";
	}

	// Master filter
	public function sqlMasterFilter_ip_admission()
	{
		return "`id`=@id@ AND `mrnNo`='@mrnNo@' AND `patient_id`=@patient_id@";
	}

	// Detail filter
	public function sqlDetailFilter_ip_admission()
	{
		return "`Reception`=@Reception@ AND `mrnno`='@mrnno@' AND `PatID`=@PatID@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_services`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, '' AS `ServiceSelect` FROM " . $this->getSqlFrom();
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
			"SELECT *, '' AS `ServiceSelect`, (SELECT `SERVICE` FROM `mas_services_billing` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`SERVICE` = `patient_services`.`Services` LIMIT 1) AS `EV__Services` FROM `patient_services`" .
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
		if ($this->Services->AdvancedSearch->SearchValue != "" ||
			$this->Services->AdvancedSearch->SearchValue2 != "" ||
			ContainsString($where, " " . $this->Services->VirtualExpression . " "))
			return TRUE;
		if (ContainsString($orderBy, " " . $this->Services->VirtualExpression . " "))
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
		$this->Reception->DbValue = $row['Reception'];
		$this->Services->DbValue = $row['Services'];
		$this->amount->DbValue = $row['amount'];
		$this->description->DbValue = $row['description'];
		$this->patient_type->DbValue = $row['patient_type'];
		$this->charged_date->DbValue = $row['charged_date'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->mrnno->DbValue = $row['mrnno'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Age->DbValue = $row['Age'];
		$this->Gender->DbValue = $row['Gender'];
		$this->profilePic->DbValue = $row['profilePic'];
		$this->Unit->DbValue = $row['Unit'];
		$this->Quantity->DbValue = $row['Quantity'];
		$this->Discount->DbValue = $row['Discount'];
		$this->SubTotal->DbValue = $row['SubTotal'];
		$this->ServiceSelect->DbValue = $row['ServiceSelect'];
		$this->Aid->DbValue = $row['Aid'];
		$this->Vid->DbValue = $row['Vid'];
		$this->DrID->DbValue = $row['DrID'];
		$this->DrCODE->DbValue = $row['DrCODE'];
		$this->DrName->DbValue = $row['DrName'];
		$this->Department->DbValue = $row['Department'];
		$this->DrSharePres->DbValue = $row['DrSharePres'];
		$this->HospSharePres->DbValue = $row['HospSharePres'];
		$this->DrShareAmount->DbValue = $row['DrShareAmount'];
		$this->HospShareAmount->DbValue = $row['HospShareAmount'];
		$this->DrShareSettiledAmount->DbValue = $row['DrShareSettiledAmount'];
		$this->DrShareSettledId->DbValue = $row['DrShareSettledId'];
		$this->DrShareSettiledStatus->DbValue = $row['DrShareSettiledStatus'];
		$this->invoiceId->DbValue = $row['invoiceId'];
		$this->invoiceAmount->DbValue = $row['invoiceAmount'];
		$this->invoiceStatus->DbValue = $row['invoiceStatus'];
		$this->modeOfPayment->DbValue = $row['modeOfPayment'];
		$this->HospID->DbValue = $row['HospID'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->DiscountCategory->DbValue = $row['DiscountCategory'];
		$this->sid->DbValue = $row['sid'];
		$this->ItemCode->DbValue = $row['ItemCode'];
		$this->TestSubCd->DbValue = $row['TestSubCd'];
		$this->DEptCd->DbValue = $row['DEptCd'];
		$this->ProfCd->DbValue = $row['ProfCd'];
		$this->LabReport->DbValue = $row['LabReport'];
		$this->Comments->DbValue = $row['Comments'];
		$this->Method->DbValue = $row['Method'];
		$this->Specimen->DbValue = $row['Specimen'];
		$this->Abnormal->DbValue = $row['Abnormal'];
		$this->RefValue->DbValue = $row['RefValue'];
		$this->TestUnit->DbValue = $row['TestUnit'];
		$this->LOWHIGH->DbValue = $row['LOWHIGH'];
		$this->Branch->DbValue = $row['Branch'];
		$this->Dispatch->DbValue = $row['Dispatch'];
		$this->Pic1->DbValue = $row['Pic1'];
		$this->Pic2->DbValue = $row['Pic2'];
		$this->GraphPath->DbValue = $row['GraphPath'];
		$this->MachineCD->DbValue = $row['MachineCD'];
		$this->TestCancel->DbValue = $row['TestCancel'];
		$this->OutSource->DbValue = $row['OutSource'];
		$this->Printed->DbValue = $row['Printed'];
		$this->PrintBy->DbValue = $row['PrintBy'];
		$this->PrintDate->DbValue = $row['PrintDate'];
		$this->BillingDate->DbValue = $row['BillingDate'];
		$this->BilledBy->DbValue = $row['BilledBy'];
		$this->Resulted->DbValue = $row['Resulted'];
		$this->ResultDate->DbValue = $row['ResultDate'];
		$this->ResultedBy->DbValue = $row['ResultedBy'];
		$this->SampleDate->DbValue = $row['SampleDate'];
		$this->SampleUser->DbValue = $row['SampleUser'];
		$this->Sampled->DbValue = $row['Sampled'];
		$this->ReceivedDate->DbValue = $row['ReceivedDate'];
		$this->ReceivedUser->DbValue = $row['ReceivedUser'];
		$this->Recevied->DbValue = $row['Recevied'];
		$this->DeptRecvDate->DbValue = $row['DeptRecvDate'];
		$this->DeptRecvUser->DbValue = $row['DeptRecvUser'];
		$this->DeptRecived->DbValue = $row['DeptRecived'];
		$this->SAuthDate->DbValue = $row['SAuthDate'];
		$this->SAuthBy->DbValue = $row['SAuthBy'];
		$this->SAuthendicate->DbValue = $row['SAuthendicate'];
		$this->AuthDate->DbValue = $row['AuthDate'];
		$this->AuthBy->DbValue = $row['AuthBy'];
		$this->Authencate->DbValue = $row['Authencate'];
		$this->EditDate->DbValue = $row['EditDate'];
		$this->EditBy->DbValue = $row['EditBy'];
		$this->Editted->DbValue = $row['Editted'];
		$this->PatID->DbValue = $row['PatID'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->Mobile->DbValue = $row['Mobile'];
		$this->CId->DbValue = $row['CId'];
		$this->Order->DbValue = $row['Order'];
		$this->Form->DbValue = $row['Form'];
		$this->ResType->DbValue = $row['ResType'];
		$this->Sample->DbValue = $row['Sample'];
		$this->NoD->DbValue = $row['NoD'];
		$this->BillOrder->DbValue = $row['BillOrder'];
		$this->Formula->DbValue = $row['Formula'];
		$this->Inactive->DbValue = $row['Inactive'];
		$this->CollSample->DbValue = $row['CollSample'];
		$this->TestType->DbValue = $row['TestType'];
		$this->Repeated->DbValue = $row['Repeated'];
		$this->RepeatedBy->DbValue = $row['RepeatedBy'];
		$this->RepeatedDate->DbValue = $row['RepeatedDate'];
		$this->serviceID->DbValue = $row['serviceID'];
		$this->Service_Type->DbValue = $row['Service_Type'];
		$this->Service_Department->DbValue = $row['Service_Department'];
		$this->RequestNo->DbValue = $row['RequestNo'];
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
			return "patient_serviceslist.php";
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
		if ($pageName == "patient_servicesview.php")
			return $Language->phrase("View");
		elseif ($pageName == "patient_servicesedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "patient_servicesadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "patient_serviceslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("patient_servicesview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("patient_servicesview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "patient_servicesadd.php?" . $this->getUrlParm($parm);
		else
			$url = "patient_servicesadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("patient_servicesedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("patient_servicesadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("patient_servicesdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "billing_voucher" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Vid->CurrentValue);
		}
		if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->Reception->CurrentValue);
			$url .= "&fk_mrnNo=" . urlencode($this->mrnno->CurrentValue);
			$url .= "&fk_patient_id=" . urlencode($this->PatID->CurrentValue);
		}
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
		$this->Reception->setDbValue($rs->fields('Reception'));
		$this->Services->setDbValue($rs->fields('Services'));
		$this->amount->setDbValue($rs->fields('amount'));
		$this->description->setDbValue($rs->fields('description'));
		$this->patient_type->setDbValue($rs->fields('patient_type'));
		$this->charged_date->setDbValue($rs->fields('charged_date'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->mrnno->setDbValue($rs->fields('mrnno'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->Gender->setDbValue($rs->fields('Gender'));
		$this->profilePic->setDbValue($rs->fields('profilePic'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->Quantity->setDbValue($rs->fields('Quantity'));
		$this->Discount->setDbValue($rs->fields('Discount'));
		$this->SubTotal->setDbValue($rs->fields('SubTotal'));
		$this->ServiceSelect->setDbValue($rs->fields('ServiceSelect'));
		$this->Aid->setDbValue($rs->fields('Aid'));
		$this->Vid->setDbValue($rs->fields('Vid'));
		$this->DrID->setDbValue($rs->fields('DrID'));
		$this->DrCODE->setDbValue($rs->fields('DrCODE'));
		$this->DrName->setDbValue($rs->fields('DrName'));
		$this->Department->setDbValue($rs->fields('Department'));
		$this->DrSharePres->setDbValue($rs->fields('DrSharePres'));
		$this->HospSharePres->setDbValue($rs->fields('HospSharePres'));
		$this->DrShareAmount->setDbValue($rs->fields('DrShareAmount'));
		$this->HospShareAmount->setDbValue($rs->fields('HospShareAmount'));
		$this->DrShareSettiledAmount->setDbValue($rs->fields('DrShareSettiledAmount'));
		$this->DrShareSettledId->setDbValue($rs->fields('DrShareSettledId'));
		$this->DrShareSettiledStatus->setDbValue($rs->fields('DrShareSettiledStatus'));
		$this->invoiceId->setDbValue($rs->fields('invoiceId'));
		$this->invoiceAmount->setDbValue($rs->fields('invoiceAmount'));
		$this->invoiceStatus->setDbValue($rs->fields('invoiceStatus'));
		$this->modeOfPayment->setDbValue($rs->fields('modeOfPayment'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->DiscountCategory->setDbValue($rs->fields('DiscountCategory'));
		$this->sid->setDbValue($rs->fields('sid'));
		$this->ItemCode->setDbValue($rs->fields('ItemCode'));
		$this->TestSubCd->setDbValue($rs->fields('TestSubCd'));
		$this->DEptCd->setDbValue($rs->fields('DEptCd'));
		$this->ProfCd->setDbValue($rs->fields('ProfCd'));
		$this->LabReport->setDbValue($rs->fields('LabReport'));
		$this->Comments->setDbValue($rs->fields('Comments'));
		$this->Method->setDbValue($rs->fields('Method'));
		$this->Specimen->setDbValue($rs->fields('Specimen'));
		$this->Abnormal->setDbValue($rs->fields('Abnormal'));
		$this->RefValue->setDbValue($rs->fields('RefValue'));
		$this->TestUnit->setDbValue($rs->fields('TestUnit'));
		$this->LOWHIGH->setDbValue($rs->fields('LOWHIGH'));
		$this->Branch->setDbValue($rs->fields('Branch'));
		$this->Dispatch->setDbValue($rs->fields('Dispatch'));
		$this->Pic1->setDbValue($rs->fields('Pic1'));
		$this->Pic2->setDbValue($rs->fields('Pic2'));
		$this->GraphPath->setDbValue($rs->fields('GraphPath'));
		$this->MachineCD->setDbValue($rs->fields('MachineCD'));
		$this->TestCancel->setDbValue($rs->fields('TestCancel'));
		$this->OutSource->setDbValue($rs->fields('OutSource'));
		$this->Printed->setDbValue($rs->fields('Printed'));
		$this->PrintBy->setDbValue($rs->fields('PrintBy'));
		$this->PrintDate->setDbValue($rs->fields('PrintDate'));
		$this->BillingDate->setDbValue($rs->fields('BillingDate'));
		$this->BilledBy->setDbValue($rs->fields('BilledBy'));
		$this->Resulted->setDbValue($rs->fields('Resulted'));
		$this->ResultDate->setDbValue($rs->fields('ResultDate'));
		$this->ResultedBy->setDbValue($rs->fields('ResultedBy'));
		$this->SampleDate->setDbValue($rs->fields('SampleDate'));
		$this->SampleUser->setDbValue($rs->fields('SampleUser'));
		$this->Sampled->setDbValue($rs->fields('Sampled'));
		$this->ReceivedDate->setDbValue($rs->fields('ReceivedDate'));
		$this->ReceivedUser->setDbValue($rs->fields('ReceivedUser'));
		$this->Recevied->setDbValue($rs->fields('Recevied'));
		$this->DeptRecvDate->setDbValue($rs->fields('DeptRecvDate'));
		$this->DeptRecvUser->setDbValue($rs->fields('DeptRecvUser'));
		$this->DeptRecived->setDbValue($rs->fields('DeptRecived'));
		$this->SAuthDate->setDbValue($rs->fields('SAuthDate'));
		$this->SAuthBy->setDbValue($rs->fields('SAuthBy'));
		$this->SAuthendicate->setDbValue($rs->fields('SAuthendicate'));
		$this->AuthDate->setDbValue($rs->fields('AuthDate'));
		$this->AuthBy->setDbValue($rs->fields('AuthBy'));
		$this->Authencate->setDbValue($rs->fields('Authencate'));
		$this->EditDate->setDbValue($rs->fields('EditDate'));
		$this->EditBy->setDbValue($rs->fields('EditBy'));
		$this->Editted->setDbValue($rs->fields('Editted'));
		$this->PatID->setDbValue($rs->fields('PatID'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->Mobile->setDbValue($rs->fields('Mobile'));
		$this->CId->setDbValue($rs->fields('CId'));
		$this->Order->setDbValue($rs->fields('Order'));
		$this->Form->setDbValue($rs->fields('Form'));
		$this->ResType->setDbValue($rs->fields('ResType'));
		$this->Sample->setDbValue($rs->fields('Sample'));
		$this->NoD->setDbValue($rs->fields('NoD'));
		$this->BillOrder->setDbValue($rs->fields('BillOrder'));
		$this->Formula->setDbValue($rs->fields('Formula'));
		$this->Inactive->setDbValue($rs->fields('Inactive'));
		$this->CollSample->setDbValue($rs->fields('CollSample'));
		$this->TestType->setDbValue($rs->fields('TestType'));
		$this->Repeated->setDbValue($rs->fields('Repeated'));
		$this->RepeatedBy->setDbValue($rs->fields('RepeatedBy'));
		$this->RepeatedDate->setDbValue($rs->fields('RepeatedDate'));
		$this->serviceID->setDbValue($rs->fields('serviceID'));
		$this->Service_Type->setDbValue($rs->fields('Service_Type'));
		$this->Service_Department->setDbValue($rs->fields('Service_Department'));
		$this->RequestNo->setDbValue($rs->fields('RequestNo'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// Reception
		// Services
		// amount
		// description
		// patient_type
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Unit
		// Quantity
		// Discount
		// SubTotal
		// ServiceSelect
		// Aid
		// Vid
		// DrID
		// DrCODE
		// DrName
		// Department
		// DrSharePres
		// HospSharePres
		// DrShareAmount
		// HospShareAmount
		// DrShareSettiledAmount
		// DrShareSettledId
		// DrShareSettiledStatus
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// HospID
		// RIDNO
		// TidNo
		// DiscountCategory
		// sid
		// ItemCode
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// Comments
		// Method
		// Specimen
		// Abnormal
		// RefValue
		// TestUnit
		// LOWHIGH
		// Branch
		// Dispatch
		// Pic1
		// Pic2
		// GraphPath
		// MachineCD
		// TestCancel
		// OutSource
		// Printed
		// PrintBy
		// PrintDate
		// BillingDate
		// BilledBy
		// Resulted
		// ResultDate
		// ResultedBy
		// SampleDate
		// SampleUser
		// Sampled
		// ReceivedDate
		// ReceivedUser
		// Recevied
		// DeptRecvDate
		// DeptRecvUser
		// DeptRecived
		// SAuthDate
		// SAuthBy
		// SAuthendicate
		// AuthDate
		// AuthBy
		// Authencate
		// EditDate
		// EditBy
		// Editted
		// PatID
		// PatientId
		// Mobile
		// CId
		// Order
		// Form
		// ResType
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// CollSample
		// TestType
		// Repeated
		// RepeatedBy
		// RepeatedDate
		// serviceID
		// Service_Type
		// Service_Department
		// RequestNo
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// Reception
		$this->Reception->ViewValue = $this->Reception->CurrentValue;
		$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// Services
		if ($this->Services->VirtualValue != "") {
			$this->Services->ViewValue = $this->Services->VirtualValue;
		} else {
			$this->Services->ViewValue = $this->Services->CurrentValue;
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal != "") {
				$this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Services->ViewValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->ViewValue = $this->Services->CurrentValue;
					}
				}
			} else {
				$this->Services->ViewValue = NULL;
			}
		}
		$this->Services->ViewCustomAttributes = "";

		// amount
		$this->amount->ViewValue = $this->amount->CurrentValue;
		$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
		$this->amount->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// patient_type
		$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
		$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
		$this->patient_type->ViewCustomAttributes = "";

		// charged_date
		$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
		$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
		$this->charged_date->ViewCustomAttributes = "";

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
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// mrnno
		$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// Gender
		$this->Gender->ViewValue = $this->Gender->CurrentValue;
		$this->Gender->ViewCustomAttributes = "";

		// profilePic
		$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
		$this->profilePic->ViewCustomAttributes = "";

		// Unit
		$this->Unit->ViewValue = $this->Unit->CurrentValue;
		$this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
		$this->Unit->ViewCustomAttributes = "";

		// Quantity
		$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
		$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
		$this->Quantity->ViewCustomAttributes = "";

		// Discount
		$this->Discount->ViewValue = $this->Discount->CurrentValue;
		$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
		$this->Discount->ViewCustomAttributes = "";

		// SubTotal
		$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
		$this->SubTotal->ViewCustomAttributes = "";

		// ServiceSelect
		if (strval($this->ServiceSelect->CurrentValue) != "") {
			$this->ServiceSelect->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->ServiceSelect->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->ServiceSelect->ViewValue->add($this->ServiceSelect->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->ServiceSelect->ViewValue = NULL;
		}
		$this->ServiceSelect->ViewCustomAttributes = "";

		// Aid
		$this->Aid->ViewValue = $this->Aid->CurrentValue;
		$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
		$this->Aid->ViewCustomAttributes = "";

		// Vid
		$this->Vid->ViewValue = $this->Vid->CurrentValue;
		$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
		$this->Vid->ViewCustomAttributes = "";

		// DrID
		$this->DrID->ViewValue = $this->DrID->CurrentValue;
		$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
		$this->DrID->ViewCustomAttributes = "";

		// DrCODE
		$this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
		$this->DrCODE->ViewCustomAttributes = "";

		// DrName
		$this->DrName->ViewValue = $this->DrName->CurrentValue;
		$this->DrName->ViewCustomAttributes = "";

		// Department
		$this->Department->ViewValue = $this->Department->CurrentValue;
		$this->Department->ViewCustomAttributes = "";

		// DrSharePres
		$this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
		$this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
		$this->DrSharePres->ViewCustomAttributes = "";

		// HospSharePres
		$this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
		$this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
		$this->HospSharePres->ViewCustomAttributes = "";

		// DrShareAmount
		$this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
		$this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
		$this->DrShareAmount->ViewCustomAttributes = "";

		// HospShareAmount
		$this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
		$this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
		$this->HospShareAmount->ViewCustomAttributes = "";

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
		$this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
		$this->DrShareSettiledAmount->ViewCustomAttributes = "";

		// DrShareSettledId
		$this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
		$this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
		$this->DrShareSettledId->ViewCustomAttributes = "";

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
		$this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
		$this->DrShareSettiledStatus->ViewCustomAttributes = "";

		// invoiceId
		$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
		$this->invoiceId->ViewCustomAttributes = "";

		// invoiceAmount
		$this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
		$this->invoiceAmount->ViewCustomAttributes = "";

		// invoiceStatus
		$this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
		$this->invoiceStatus->ViewCustomAttributes = "";

		// modeOfPayment
		$this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
		$this->modeOfPayment->ViewCustomAttributes = "";

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// DiscountCategory
		$this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
		$this->DiscountCategory->ViewCustomAttributes = "";

		// sid
		$this->sid->ViewValue = $this->sid->CurrentValue;
		$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
		$this->sid->ViewCustomAttributes = "";

		// ItemCode
		$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->ViewCustomAttributes = "";

		// TestSubCd
		$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
		$this->TestSubCd->ViewCustomAttributes = "";

		// DEptCd
		$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->ViewCustomAttributes = "";

		// ProfCd
		$this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
		$this->ProfCd->ViewCustomAttributes = "";

		// LabReport
		$this->LabReport->ViewValue = $this->LabReport->CurrentValue;
		$this->LabReport->ViewCustomAttributes = "";

		// Comments
		$this->Comments->ViewValue = $this->Comments->CurrentValue;
		$this->Comments->ViewCustomAttributes = "";

		// Method
		$this->Method->ViewValue = $this->Method->CurrentValue;
		$this->Method->ViewCustomAttributes = "";

		// Specimen
		$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
		$this->Specimen->ViewCustomAttributes = "";

		// Abnormal
		$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->ViewCustomAttributes = "";

		// RefValue
		$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
		$this->RefValue->ViewCustomAttributes = "";

		// TestUnit
		$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
		$this->TestUnit->ViewCustomAttributes = "";

		// LOWHIGH
		$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
		$this->LOWHIGH->ViewCustomAttributes = "";

		// Branch
		$this->Branch->ViewValue = $this->Branch->CurrentValue;
		$this->Branch->ViewCustomAttributes = "";

		// Dispatch
		$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
		$this->Dispatch->ViewCustomAttributes = "";

		// Pic1
		$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
		$this->Pic1->ViewCustomAttributes = "";

		// Pic2
		$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
		$this->Pic2->ViewCustomAttributes = "";

		// GraphPath
		$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
		$this->GraphPath->ViewCustomAttributes = "";

		// MachineCD
		$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
		$this->MachineCD->ViewCustomAttributes = "";

		// TestCancel
		$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
		$this->TestCancel->ViewCustomAttributes = "";

		// OutSource
		$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
		$this->OutSource->ViewCustomAttributes = "";

		// Printed
		$this->Printed->ViewValue = $this->Printed->CurrentValue;
		$this->Printed->ViewCustomAttributes = "";

		// PrintBy
		$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
		$this->PrintBy->ViewCustomAttributes = "";

		// PrintDate
		$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
		$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
		$this->PrintDate->ViewCustomAttributes = "";

		// BillingDate
		$this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
		$this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
		$this->BillingDate->ViewCustomAttributes = "";

		// BilledBy
		$this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
		$this->BilledBy->ViewCustomAttributes = "";

		// Resulted
		$this->Resulted->ViewValue = $this->Resulted->CurrentValue;
		$this->Resulted->ViewCustomAttributes = "";

		// ResultDate
		$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
		$this->ResultDate->ViewCustomAttributes = "";

		// ResultedBy
		$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->ViewCustomAttributes = "";

		// SampleDate
		$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
		$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
		$this->SampleDate->ViewCustomAttributes = "";

		// SampleUser
		$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
		$this->SampleUser->ViewCustomAttributes = "";

		// Sampled
		$this->Sampled->ViewValue = $this->Sampled->CurrentValue;
		$this->Sampled->ViewCustomAttributes = "";

		// ReceivedDate
		$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
		$this->ReceivedDate->ViewCustomAttributes = "";

		// ReceivedUser
		$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
		$this->ReceivedUser->ViewCustomAttributes = "";

		// Recevied
		$this->Recevied->ViewValue = $this->Recevied->CurrentValue;
		$this->Recevied->ViewCustomAttributes = "";

		// DeptRecvDate
		$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
		$this->DeptRecvDate->ViewCustomAttributes = "";

		// DeptRecvUser
		$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
		$this->DeptRecvUser->ViewCustomAttributes = "";

		// DeptRecived
		$this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
		$this->DeptRecived->ViewCustomAttributes = "";

		// SAuthDate
		$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
		$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
		$this->SAuthDate->ViewCustomAttributes = "";

		// SAuthBy
		$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
		$this->SAuthBy->ViewCustomAttributes = "";

		// SAuthendicate
		$this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
		$this->SAuthendicate->ViewCustomAttributes = "";

		// AuthDate
		$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
		$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
		$this->AuthDate->ViewCustomAttributes = "";

		// AuthBy
		$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
		$this->AuthBy->ViewCustomAttributes = "";

		// Authencate
		$this->Authencate->ViewValue = $this->Authencate->CurrentValue;
		$this->Authencate->ViewCustomAttributes = "";

		// EditDate
		$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
		$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
		$this->EditDate->ViewCustomAttributes = "";

		// EditBy
		$this->EditBy->ViewValue = $this->EditBy->CurrentValue;
		$this->EditBy->ViewCustomAttributes = "";

		// Editted
		$this->Editted->ViewValue = $this->Editted->CurrentValue;
		$this->Editted->ViewCustomAttributes = "";

		// PatID
		$this->PatID->ViewValue = $this->PatID->CurrentValue;
		$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
		$this->PatID->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// Mobile
		$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
		$this->Mobile->ViewCustomAttributes = "";

		// CId
		$this->CId->ViewValue = $this->CId->CurrentValue;
		$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
		$this->CId->ViewCustomAttributes = "";

		// Order
		$this->Order->ViewValue = $this->Order->CurrentValue;
		$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
		$this->Order->ViewCustomAttributes = "";

		// Form
		$this->Form->ViewValue = $this->Form->CurrentValue;
		$this->Form->ViewCustomAttributes = "";

		// ResType
		$this->ResType->ViewValue = $this->ResType->CurrentValue;
		$this->ResType->ViewCustomAttributes = "";

		// Sample
		$this->Sample->ViewValue = $this->Sample->CurrentValue;
		$this->Sample->ViewCustomAttributes = "";

		// NoD
		$this->NoD->ViewValue = $this->NoD->CurrentValue;
		$this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
		$this->NoD->ViewCustomAttributes = "";

		// BillOrder
		$this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
		$this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
		$this->BillOrder->ViewCustomAttributes = "";

		// Formula
		$this->Formula->ViewValue = $this->Formula->CurrentValue;
		$this->Formula->ViewCustomAttributes = "";

		// Inactive
		$this->Inactive->ViewValue = $this->Inactive->CurrentValue;
		$this->Inactive->ViewCustomAttributes = "";

		// CollSample
		$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
		$this->CollSample->ViewCustomAttributes = "";

		// TestType
		$this->TestType->ViewValue = $this->TestType->CurrentValue;
		$this->TestType->ViewCustomAttributes = "";

		// Repeated
		$this->Repeated->ViewValue = $this->Repeated->CurrentValue;
		$this->Repeated->ViewCustomAttributes = "";

		// RepeatedBy
		$this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
		$this->RepeatedBy->ViewCustomAttributes = "";

		// RepeatedDate
		$this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
		$this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
		$this->RepeatedDate->ViewCustomAttributes = "";

		// serviceID
		$this->serviceID->ViewValue = $this->serviceID->CurrentValue;
		$this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
		$this->serviceID->ViewCustomAttributes = "";

		// Service_Type
		$this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
		$this->Service_Type->ViewCustomAttributes = "";

		// Service_Department
		$this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
		$this->Service_Department->ViewCustomAttributes = "";

		// RequestNo
		$this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
		$this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
		$this->RequestNo->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// Reception
		$this->Reception->LinkCustomAttributes = "";
		$this->Reception->HrefValue = "";
		$this->Reception->TooltipValue = "";

		// Services
		$this->Services->LinkCustomAttributes = "";
		$this->Services->HrefValue = "";
		$this->Services->TooltipValue = "";

		// amount
		$this->amount->LinkCustomAttributes = "";
		$this->amount->HrefValue = "";
		$this->amount->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

		// patient_type
		$this->patient_type->LinkCustomAttributes = "";
		$this->patient_type->HrefValue = "";
		$this->patient_type->TooltipValue = "";

		// charged_date
		$this->charged_date->LinkCustomAttributes = "";
		$this->charged_date->HrefValue = "";
		$this->charged_date->TooltipValue = "";

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

		// mrnno
		$this->mrnno->LinkCustomAttributes = "";
		$this->mrnno->HrefValue = "";
		$this->mrnno->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// Gender
		$this->Gender->LinkCustomAttributes = "";
		$this->Gender->HrefValue = "";
		$this->Gender->TooltipValue = "";

		// profilePic
		$this->profilePic->LinkCustomAttributes = "";
		$this->profilePic->HrefValue = "";
		$this->profilePic->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// Quantity
		$this->Quantity->LinkCustomAttributes = "";
		$this->Quantity->HrefValue = "";
		$this->Quantity->TooltipValue = "";

		// Discount
		$this->Discount->LinkCustomAttributes = "";
		$this->Discount->HrefValue = "";
		$this->Discount->TooltipValue = "";

		// SubTotal
		$this->SubTotal->LinkCustomAttributes = "";
		$this->SubTotal->HrefValue = "";
		$this->SubTotal->TooltipValue = "";

		// ServiceSelect
		$this->ServiceSelect->LinkCustomAttributes = "";
		$this->ServiceSelect->HrefValue = "";
		$this->ServiceSelect->TooltipValue = "";

		// Aid
		$this->Aid->LinkCustomAttributes = "";
		$this->Aid->HrefValue = "";
		$this->Aid->TooltipValue = "";

		// Vid
		$this->Vid->LinkCustomAttributes = "";
		$this->Vid->HrefValue = "";
		$this->Vid->TooltipValue = "";

		// DrID
		$this->DrID->LinkCustomAttributes = "";
		$this->DrID->HrefValue = "";
		$this->DrID->TooltipValue = "";

		// DrCODE
		$this->DrCODE->LinkCustomAttributes = "";
		$this->DrCODE->HrefValue = "";
		$this->DrCODE->TooltipValue = "";

		// DrName
		$this->DrName->LinkCustomAttributes = "";
		$this->DrName->HrefValue = "";
		$this->DrName->TooltipValue = "";

		// Department
		$this->Department->LinkCustomAttributes = "";
		$this->Department->HrefValue = "";
		$this->Department->TooltipValue = "";

		// DrSharePres
		$this->DrSharePres->LinkCustomAttributes = "";
		$this->DrSharePres->HrefValue = "";
		$this->DrSharePres->TooltipValue = "";

		// HospSharePres
		$this->HospSharePres->LinkCustomAttributes = "";
		$this->HospSharePres->HrefValue = "";
		$this->HospSharePres->TooltipValue = "";

		// DrShareAmount
		$this->DrShareAmount->LinkCustomAttributes = "";
		$this->DrShareAmount->HrefValue = "";
		$this->DrShareAmount->TooltipValue = "";

		// HospShareAmount
		$this->HospShareAmount->LinkCustomAttributes = "";
		$this->HospShareAmount->HrefValue = "";
		$this->HospShareAmount->TooltipValue = "";

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount->LinkCustomAttributes = "";
		$this->DrShareSettiledAmount->HrefValue = "";
		$this->DrShareSettiledAmount->TooltipValue = "";

		// DrShareSettledId
		$this->DrShareSettledId->LinkCustomAttributes = "";
		$this->DrShareSettledId->HrefValue = "";
		$this->DrShareSettledId->TooltipValue = "";

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus->LinkCustomAttributes = "";
		$this->DrShareSettiledStatus->HrefValue = "";
		$this->DrShareSettiledStatus->TooltipValue = "";

		// invoiceId
		$this->invoiceId->LinkCustomAttributes = "";
		$this->invoiceId->HrefValue = "";
		$this->invoiceId->TooltipValue = "";

		// invoiceAmount
		$this->invoiceAmount->LinkCustomAttributes = "";
		$this->invoiceAmount->HrefValue = "";
		$this->invoiceAmount->TooltipValue = "";

		// invoiceStatus
		$this->invoiceStatus->LinkCustomAttributes = "";
		$this->invoiceStatus->HrefValue = "";
		$this->invoiceStatus->TooltipValue = "";

		// modeOfPayment
		$this->modeOfPayment->LinkCustomAttributes = "";
		$this->modeOfPayment->HrefValue = "";
		$this->modeOfPayment->TooltipValue = "";

		// HospID
		$this->HospID->LinkCustomAttributes = "";
		$this->HospID->HrefValue = "";
		$this->HospID->TooltipValue = "";

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
		$this->RIDNO->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// DiscountCategory
		$this->DiscountCategory->LinkCustomAttributes = "";
		$this->DiscountCategory->HrefValue = "";
		$this->DiscountCategory->TooltipValue = "";

		// sid
		$this->sid->LinkCustomAttributes = "";
		$this->sid->HrefValue = "";
		$this->sid->TooltipValue = "";

		// ItemCode
		$this->ItemCode->LinkCustomAttributes = "";
		$this->ItemCode->HrefValue = "";
		$this->ItemCode->TooltipValue = "";

		// TestSubCd
		$this->TestSubCd->LinkCustomAttributes = "";
		$this->TestSubCd->HrefValue = "";
		$this->TestSubCd->TooltipValue = "";

		// DEptCd
		$this->DEptCd->LinkCustomAttributes = "";
		$this->DEptCd->HrefValue = "";
		$this->DEptCd->TooltipValue = "";

		// ProfCd
		$this->ProfCd->LinkCustomAttributes = "";
		$this->ProfCd->HrefValue = "";
		$this->ProfCd->TooltipValue = "";

		// LabReport
		$this->LabReport->LinkCustomAttributes = "";
		$this->LabReport->HrefValue = "";
		$this->LabReport->TooltipValue = "";

		// Comments
		$this->Comments->LinkCustomAttributes = "";
		$this->Comments->HrefValue = "";
		$this->Comments->TooltipValue = "";

		// Method
		$this->Method->LinkCustomAttributes = "";
		$this->Method->HrefValue = "";
		$this->Method->TooltipValue = "";

		// Specimen
		$this->Specimen->LinkCustomAttributes = "";
		$this->Specimen->HrefValue = "";
		$this->Specimen->TooltipValue = "";

		// Abnormal
		$this->Abnormal->LinkCustomAttributes = "";
		$this->Abnormal->HrefValue = "";
		$this->Abnormal->TooltipValue = "";

		// RefValue
		$this->RefValue->LinkCustomAttributes = "";
		$this->RefValue->HrefValue = "";
		$this->RefValue->TooltipValue = "";

		// TestUnit
		$this->TestUnit->LinkCustomAttributes = "";
		$this->TestUnit->HrefValue = "";
		$this->TestUnit->TooltipValue = "";

		// LOWHIGH
		$this->LOWHIGH->LinkCustomAttributes = "";
		$this->LOWHIGH->HrefValue = "";
		$this->LOWHIGH->TooltipValue = "";

		// Branch
		$this->Branch->LinkCustomAttributes = "";
		$this->Branch->HrefValue = "";
		$this->Branch->TooltipValue = "";

		// Dispatch
		$this->Dispatch->LinkCustomAttributes = "";
		$this->Dispatch->HrefValue = "";
		$this->Dispatch->TooltipValue = "";

		// Pic1
		$this->Pic1->LinkCustomAttributes = "";
		$this->Pic1->HrefValue = "";
		$this->Pic1->TooltipValue = "";

		// Pic2
		$this->Pic2->LinkCustomAttributes = "";
		$this->Pic2->HrefValue = "";
		$this->Pic2->TooltipValue = "";

		// GraphPath
		$this->GraphPath->LinkCustomAttributes = "";
		$this->GraphPath->HrefValue = "";
		$this->GraphPath->TooltipValue = "";

		// MachineCD
		$this->MachineCD->LinkCustomAttributes = "";
		$this->MachineCD->HrefValue = "";
		$this->MachineCD->TooltipValue = "";

		// TestCancel
		$this->TestCancel->LinkCustomAttributes = "";
		$this->TestCancel->HrefValue = "";
		$this->TestCancel->TooltipValue = "";

		// OutSource
		$this->OutSource->LinkCustomAttributes = "";
		$this->OutSource->HrefValue = "";
		$this->OutSource->TooltipValue = "";

		// Printed
		$this->Printed->LinkCustomAttributes = "";
		$this->Printed->HrefValue = "";
		$this->Printed->TooltipValue = "";

		// PrintBy
		$this->PrintBy->LinkCustomAttributes = "";
		$this->PrintBy->HrefValue = "";
		$this->PrintBy->TooltipValue = "";

		// PrintDate
		$this->PrintDate->LinkCustomAttributes = "";
		$this->PrintDate->HrefValue = "";
		$this->PrintDate->TooltipValue = "";

		// BillingDate
		$this->BillingDate->LinkCustomAttributes = "";
		$this->BillingDate->HrefValue = "";
		$this->BillingDate->TooltipValue = "";

		// BilledBy
		$this->BilledBy->LinkCustomAttributes = "";
		$this->BilledBy->HrefValue = "";
		$this->BilledBy->TooltipValue = "";

		// Resulted
		$this->Resulted->LinkCustomAttributes = "";
		$this->Resulted->HrefValue = "";
		$this->Resulted->TooltipValue = "";

		// ResultDate
		$this->ResultDate->LinkCustomAttributes = "";
		$this->ResultDate->HrefValue = "";
		$this->ResultDate->TooltipValue = "";

		// ResultedBy
		$this->ResultedBy->LinkCustomAttributes = "";
		$this->ResultedBy->HrefValue = "";
		$this->ResultedBy->TooltipValue = "";

		// SampleDate
		$this->SampleDate->LinkCustomAttributes = "";
		$this->SampleDate->HrefValue = "";
		$this->SampleDate->TooltipValue = "";

		// SampleUser
		$this->SampleUser->LinkCustomAttributes = "";
		$this->SampleUser->HrefValue = "";
		$this->SampleUser->TooltipValue = "";

		// Sampled
		$this->Sampled->LinkCustomAttributes = "";
		$this->Sampled->HrefValue = "";
		$this->Sampled->TooltipValue = "";

		// ReceivedDate
		$this->ReceivedDate->LinkCustomAttributes = "";
		$this->ReceivedDate->HrefValue = "";
		$this->ReceivedDate->TooltipValue = "";

		// ReceivedUser
		$this->ReceivedUser->LinkCustomAttributes = "";
		$this->ReceivedUser->HrefValue = "";
		$this->ReceivedUser->TooltipValue = "";

		// Recevied
		$this->Recevied->LinkCustomAttributes = "";
		$this->Recevied->HrefValue = "";
		$this->Recevied->TooltipValue = "";

		// DeptRecvDate
		$this->DeptRecvDate->LinkCustomAttributes = "";
		$this->DeptRecvDate->HrefValue = "";
		$this->DeptRecvDate->TooltipValue = "";

		// DeptRecvUser
		$this->DeptRecvUser->LinkCustomAttributes = "";
		$this->DeptRecvUser->HrefValue = "";
		$this->DeptRecvUser->TooltipValue = "";

		// DeptRecived
		$this->DeptRecived->LinkCustomAttributes = "";
		$this->DeptRecived->HrefValue = "";
		$this->DeptRecived->TooltipValue = "";

		// SAuthDate
		$this->SAuthDate->LinkCustomAttributes = "";
		$this->SAuthDate->HrefValue = "";
		$this->SAuthDate->TooltipValue = "";

		// SAuthBy
		$this->SAuthBy->LinkCustomAttributes = "";
		$this->SAuthBy->HrefValue = "";
		$this->SAuthBy->TooltipValue = "";

		// SAuthendicate
		$this->SAuthendicate->LinkCustomAttributes = "";
		$this->SAuthendicate->HrefValue = "";
		$this->SAuthendicate->TooltipValue = "";

		// AuthDate
		$this->AuthDate->LinkCustomAttributes = "";
		$this->AuthDate->HrefValue = "";
		$this->AuthDate->TooltipValue = "";

		// AuthBy
		$this->AuthBy->LinkCustomAttributes = "";
		$this->AuthBy->HrefValue = "";
		$this->AuthBy->TooltipValue = "";

		// Authencate
		$this->Authencate->LinkCustomAttributes = "";
		$this->Authencate->HrefValue = "";
		$this->Authencate->TooltipValue = "";

		// EditDate
		$this->EditDate->LinkCustomAttributes = "";
		$this->EditDate->HrefValue = "";
		$this->EditDate->TooltipValue = "";

		// EditBy
		$this->EditBy->LinkCustomAttributes = "";
		$this->EditBy->HrefValue = "";
		$this->EditBy->TooltipValue = "";

		// Editted
		$this->Editted->LinkCustomAttributes = "";
		$this->Editted->HrefValue = "";
		$this->Editted->TooltipValue = "";

		// PatID
		$this->PatID->LinkCustomAttributes = "";
		$this->PatID->HrefValue = "";
		$this->PatID->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// Mobile
		$this->Mobile->LinkCustomAttributes = "";
		$this->Mobile->HrefValue = "";
		$this->Mobile->TooltipValue = "";

		// CId
		$this->CId->LinkCustomAttributes = "";
		$this->CId->HrefValue = "";
		$this->CId->TooltipValue = "";

		// Order
		$this->Order->LinkCustomAttributes = "";
		$this->Order->HrefValue = "";
		$this->Order->TooltipValue = "";

		// Form
		$this->Form->LinkCustomAttributes = "";
		$this->Form->HrefValue = "";
		$this->Form->TooltipValue = "";

		// ResType
		$this->ResType->LinkCustomAttributes = "";
		$this->ResType->HrefValue = "";
		$this->ResType->TooltipValue = "";

		// Sample
		$this->Sample->LinkCustomAttributes = "";
		$this->Sample->HrefValue = "";
		$this->Sample->TooltipValue = "";

		// NoD
		$this->NoD->LinkCustomAttributes = "";
		$this->NoD->HrefValue = "";
		$this->NoD->TooltipValue = "";

		// BillOrder
		$this->BillOrder->LinkCustomAttributes = "";
		$this->BillOrder->HrefValue = "";
		$this->BillOrder->TooltipValue = "";

		// Formula
		$this->Formula->LinkCustomAttributes = "";
		$this->Formula->HrefValue = "";
		$this->Formula->TooltipValue = "";

		// Inactive
		$this->Inactive->LinkCustomAttributes = "";
		$this->Inactive->HrefValue = "";
		$this->Inactive->TooltipValue = "";

		// CollSample
		$this->CollSample->LinkCustomAttributes = "";
		$this->CollSample->HrefValue = "";
		$this->CollSample->TooltipValue = "";

		// TestType
		$this->TestType->LinkCustomAttributes = "";
		$this->TestType->HrefValue = "";
		$this->TestType->TooltipValue = "";

		// Repeated
		$this->Repeated->LinkCustomAttributes = "";
		$this->Repeated->HrefValue = "";
		$this->Repeated->TooltipValue = "";

		// RepeatedBy
		$this->RepeatedBy->LinkCustomAttributes = "";
		$this->RepeatedBy->HrefValue = "";
		$this->RepeatedBy->TooltipValue = "";

		// RepeatedDate
		$this->RepeatedDate->LinkCustomAttributes = "";
		$this->RepeatedDate->HrefValue = "";
		$this->RepeatedDate->TooltipValue = "";

		// serviceID
		$this->serviceID->LinkCustomAttributes = "";
		$this->serviceID->HrefValue = "";
		$this->serviceID->TooltipValue = "";

		// Service_Type
		$this->Service_Type->LinkCustomAttributes = "";
		$this->Service_Type->HrefValue = "";
		$this->Service_Type->TooltipValue = "";

		// Service_Department
		$this->Service_Department->LinkCustomAttributes = "";
		$this->Service_Department->HrefValue = "";
		$this->Service_Department->TooltipValue = "";

		// RequestNo
		$this->RequestNo->LinkCustomAttributes = "";
		$this->RequestNo->HrefValue = "";
		$this->RequestNo->TooltipValue = "";

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

		// Reception
		$this->Reception->EditAttrs["class"] = "form-control";
		$this->Reception->EditCustomAttributes = "";
		$this->Reception->EditValue = $this->Reception->CurrentValue;
		$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
		$this->Reception->ViewCustomAttributes = "";

		// Services
		$this->Services->EditAttrs["class"] = "form-control";
		$this->Services->EditCustomAttributes = "";
		if (!$this->Services->Raw)
			$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
		$this->Services->EditValue = $this->Services->CurrentValue;
		$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

		// amount
		$this->amount->EditAttrs["class"] = "form-control";
		$this->amount->EditCustomAttributes = "";
		$this->amount->EditValue = $this->amount->CurrentValue;
		$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
		if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue))
			$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
		

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		if (!$this->description->Raw)
			$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// patient_type
		$this->patient_type->EditAttrs["class"] = "form-control";
		$this->patient_type->EditCustomAttributes = "";
		$this->patient_type->EditValue = $this->patient_type->CurrentValue;
		$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

		// charged_date
		// status

		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno

		$this->mrnno->EditAttrs["class"] = "form-control";
		$this->mrnno->EditCustomAttributes = "";
		$this->mrnno->EditValue = $this->mrnno->CurrentValue;
		$this->mrnno->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (!$this->PatientName->Raw)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// Gender
		$this->Gender->EditAttrs["class"] = "form-control";
		$this->Gender->EditCustomAttributes = "";
		if (!$this->Gender->Raw)
			$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
		$this->Gender->EditValue = $this->Gender->CurrentValue;
		$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

		// profilePic
		$this->profilePic->EditAttrs["class"] = "form-control";
		$this->profilePic->EditCustomAttributes = "";
		$this->profilePic->EditValue = $this->profilePic->CurrentValue;
		$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

		// Unit
		$this->Unit->EditAttrs["class"] = "form-control";
		$this->Unit->EditCustomAttributes = "";
		$this->Unit->EditValue = $this->Unit->CurrentValue;
		$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

		// Quantity
		$this->Quantity->EditAttrs["class"] = "form-control";
		$this->Quantity->EditCustomAttributes = "";
		$this->Quantity->EditValue = $this->Quantity->CurrentValue;
		$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

		// Discount
		$this->Discount->EditAttrs["class"] = "form-control";
		$this->Discount->EditCustomAttributes = "";
		$this->Discount->EditValue = $this->Discount->CurrentValue;
		$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
		if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue))
			$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
		

		// SubTotal
		$this->SubTotal->EditAttrs["class"] = "form-control";
		$this->SubTotal->EditCustomAttributes = "";
		$this->SubTotal->EditValue = $this->SubTotal->CurrentValue;
		$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
		if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue))
			$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
		

		// ServiceSelect
		$this->ServiceSelect->EditCustomAttributes = "";
		$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

		// Aid
		$this->Aid->EditAttrs["class"] = "form-control";
		$this->Aid->EditCustomAttributes = "";
		$this->Aid->EditValue = $this->Aid->CurrentValue;
		$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

		// Vid
		$this->Vid->EditAttrs["class"] = "form-control";
		$this->Vid->EditCustomAttributes = "";
		if ($this->Vid->getSessionValue() != "") {
			$this->Vid->CurrentValue = $this->Vid->getSessionValue();
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";
		} else {
			$this->Vid->EditValue = $this->Vid->CurrentValue;
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
		}

		// DrID
		$this->DrID->EditAttrs["class"] = "form-control";
		$this->DrID->EditCustomAttributes = "";
		$this->DrID->EditValue = $this->DrID->CurrentValue;
		$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

		// DrCODE
		$this->DrCODE->EditAttrs["class"] = "form-control";
		$this->DrCODE->EditCustomAttributes = "";
		if (!$this->DrCODE->Raw)
			$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
		$this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
		$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

		// DrName
		$this->DrName->EditAttrs["class"] = "form-control";
		$this->DrName->EditCustomAttributes = "";
		if (!$this->DrName->Raw)
			$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
		$this->DrName->EditValue = $this->DrName->CurrentValue;
		$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

		// Department
		$this->Department->EditAttrs["class"] = "form-control";
		$this->Department->EditCustomAttributes = "";
		if (!$this->Department->Raw)
			$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
		$this->Department->EditValue = $this->Department->CurrentValue;
		$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

		// DrSharePres
		$this->DrSharePres->EditAttrs["class"] = "form-control";
		$this->DrSharePres->EditCustomAttributes = "";
		$this->DrSharePres->EditValue = $this->DrSharePres->CurrentValue;
		$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
		if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue))
			$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
		

		// HospSharePres
		$this->HospSharePres->EditAttrs["class"] = "form-control";
		$this->HospSharePres->EditCustomAttributes = "";
		$this->HospSharePres->EditValue = $this->HospSharePres->CurrentValue;
		$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
		if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue))
			$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
		

		// DrShareAmount
		$this->DrShareAmount->EditAttrs["class"] = "form-control";
		$this->DrShareAmount->EditCustomAttributes = "";
		$this->DrShareAmount->EditValue = $this->DrShareAmount->CurrentValue;
		$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
		if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue))
			$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
		

		// HospShareAmount
		$this->HospShareAmount->EditAttrs["class"] = "form-control";
		$this->HospShareAmount->EditCustomAttributes = "";
		$this->HospShareAmount->EditValue = $this->HospShareAmount->CurrentValue;
		$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
		if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue))
			$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
		

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
		$this->DrShareSettiledAmount->EditCustomAttributes = "";
		$this->DrShareSettiledAmount->EditValue = $this->DrShareSettiledAmount->CurrentValue;
		$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
		if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue))
			$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
		

		// DrShareSettledId
		$this->DrShareSettledId->EditAttrs["class"] = "form-control";
		$this->DrShareSettledId->EditCustomAttributes = "";
		$this->DrShareSettledId->EditValue = $this->DrShareSettledId->CurrentValue;
		$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
		$this->DrShareSettiledStatus->EditCustomAttributes = "";
		$this->DrShareSettiledStatus->EditValue = $this->DrShareSettiledStatus->CurrentValue;
		$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

		// invoiceId
		$this->invoiceId->EditAttrs["class"] = "form-control";
		$this->invoiceId->EditCustomAttributes = "";
		$this->invoiceId->EditValue = $this->invoiceId->CurrentValue;
		$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

		// invoiceAmount
		$this->invoiceAmount->EditAttrs["class"] = "form-control";
		$this->invoiceAmount->EditCustomAttributes = "";
		$this->invoiceAmount->EditValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
		if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue))
			$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
		

		// invoiceStatus
		$this->invoiceStatus->EditAttrs["class"] = "form-control";
		$this->invoiceStatus->EditCustomAttributes = "";
		if (!$this->invoiceStatus->Raw)
			$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
		$this->invoiceStatus->EditValue = $this->invoiceStatus->CurrentValue;
		$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

		// modeOfPayment
		$this->modeOfPayment->EditAttrs["class"] = "form-control";
		$this->modeOfPayment->EditCustomAttributes = "";
		if (!$this->modeOfPayment->Raw)
			$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
		$this->modeOfPayment->EditValue = $this->modeOfPayment->CurrentValue;
		$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

		// HospID
		// RIDNO

		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->EditValue = FormatNumber($this->RIDNO->EditValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// DiscountCategory
		$this->DiscountCategory->EditAttrs["class"] = "form-control";
		$this->DiscountCategory->EditCustomAttributes = "";
		if (!$this->DiscountCategory->Raw)
			$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
		$this->DiscountCategory->EditValue = $this->DiscountCategory->CurrentValue;
		$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

		// sid
		$this->sid->EditAttrs["class"] = "form-control";
		$this->sid->EditCustomAttributes = "";
		$this->sid->EditValue = $this->sid->CurrentValue;
		$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

		// ItemCode
		$this->ItemCode->EditAttrs["class"] = "form-control";
		$this->ItemCode->EditCustomAttributes = "";
		if (!$this->ItemCode->Raw)
			$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
		$this->ItemCode->EditValue = $this->ItemCode->CurrentValue;
		$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

		// TestSubCd
		$this->TestSubCd->EditAttrs["class"] = "form-control";
		$this->TestSubCd->EditCustomAttributes = "";
		if (!$this->TestSubCd->Raw)
			$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
		$this->TestSubCd->EditValue = $this->TestSubCd->CurrentValue;
		$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

		// DEptCd
		$this->DEptCd->EditAttrs["class"] = "form-control";
		$this->DEptCd->EditCustomAttributes = "";
		if (!$this->DEptCd->Raw)
			$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
		$this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
		$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

		// ProfCd
		$this->ProfCd->EditAttrs["class"] = "form-control";
		$this->ProfCd->EditCustomAttributes = "";
		if (!$this->ProfCd->Raw)
			$this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
		$this->ProfCd->EditValue = $this->ProfCd->CurrentValue;
		$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

		// LabReport
		$this->LabReport->EditAttrs["class"] = "form-control";
		$this->LabReport->EditCustomAttributes = "";
		$this->LabReport->EditValue = $this->LabReport->CurrentValue;
		$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

		// Comments
		$this->Comments->EditAttrs["class"] = "form-control";
		$this->Comments->EditCustomAttributes = "";
		if (!$this->Comments->Raw)
			$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
		$this->Comments->EditValue = $this->Comments->CurrentValue;
		$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

		// Method
		$this->Method->EditAttrs["class"] = "form-control";
		$this->Method->EditCustomAttributes = "";
		if (!$this->Method->Raw)
			$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
		$this->Method->EditValue = $this->Method->CurrentValue;
		$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

		// Specimen
		$this->Specimen->EditAttrs["class"] = "form-control";
		$this->Specimen->EditCustomAttributes = "";
		if (!$this->Specimen->Raw)
			$this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
		$this->Specimen->EditValue = $this->Specimen->CurrentValue;
		$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

		// Abnormal
		$this->Abnormal->EditAttrs["class"] = "form-control";
		$this->Abnormal->EditCustomAttributes = "";
		if (!$this->Abnormal->Raw)
			$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
		$this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

		// RefValue
		$this->RefValue->EditAttrs["class"] = "form-control";
		$this->RefValue->EditCustomAttributes = "";
		$this->RefValue->EditValue = $this->RefValue->CurrentValue;
		$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

		// TestUnit
		$this->TestUnit->EditAttrs["class"] = "form-control";
		$this->TestUnit->EditCustomAttributes = "";
		if (!$this->TestUnit->Raw)
			$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
		$this->TestUnit->EditValue = $this->TestUnit->CurrentValue;
		$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

		// LOWHIGH
		$this->LOWHIGH->EditAttrs["class"] = "form-control";
		$this->LOWHIGH->EditCustomAttributes = "";
		if (!$this->LOWHIGH->Raw)
			$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
		$this->LOWHIGH->EditValue = $this->LOWHIGH->CurrentValue;
		$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

		// Branch
		$this->Branch->EditAttrs["class"] = "form-control";
		$this->Branch->EditCustomAttributes = "";
		if (!$this->Branch->Raw)
			$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
		$this->Branch->EditValue = $this->Branch->CurrentValue;
		$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

		// Dispatch
		$this->Dispatch->EditAttrs["class"] = "form-control";
		$this->Dispatch->EditCustomAttributes = "";
		if (!$this->Dispatch->Raw)
			$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
		$this->Dispatch->EditValue = $this->Dispatch->CurrentValue;
		$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

		// Pic1
		$this->Pic1->EditAttrs["class"] = "form-control";
		$this->Pic1->EditCustomAttributes = "";
		if (!$this->Pic1->Raw)
			$this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
		$this->Pic1->EditValue = $this->Pic1->CurrentValue;
		$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

		// Pic2
		$this->Pic2->EditAttrs["class"] = "form-control";
		$this->Pic2->EditCustomAttributes = "";
		if (!$this->Pic2->Raw)
			$this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
		$this->Pic2->EditValue = $this->Pic2->CurrentValue;
		$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

		// GraphPath
		$this->GraphPath->EditAttrs["class"] = "form-control";
		$this->GraphPath->EditCustomAttributes = "";
		if (!$this->GraphPath->Raw)
			$this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
		$this->GraphPath->EditValue = $this->GraphPath->CurrentValue;
		$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

		// MachineCD
		$this->MachineCD->EditAttrs["class"] = "form-control";
		$this->MachineCD->EditCustomAttributes = "";
		if (!$this->MachineCD->Raw)
			$this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
		$this->MachineCD->EditValue = $this->MachineCD->CurrentValue;
		$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

		// TestCancel
		$this->TestCancel->EditAttrs["class"] = "form-control";
		$this->TestCancel->EditCustomAttributes = "";
		if (!$this->TestCancel->Raw)
			$this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
		$this->TestCancel->EditValue = $this->TestCancel->CurrentValue;
		$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

		// OutSource
		$this->OutSource->EditAttrs["class"] = "form-control";
		$this->OutSource->EditCustomAttributes = "";
		if (!$this->OutSource->Raw)
			$this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
		$this->OutSource->EditValue = $this->OutSource->CurrentValue;
		$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

		// Printed
		$this->Printed->EditAttrs["class"] = "form-control";
		$this->Printed->EditCustomAttributes = "";
		if (!$this->Printed->Raw)
			$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
		$this->Printed->EditValue = $this->Printed->CurrentValue;
		$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

		// PrintBy
		$this->PrintBy->EditAttrs["class"] = "form-control";
		$this->PrintBy->EditCustomAttributes = "";
		if (!$this->PrintBy->Raw)
			$this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
		$this->PrintBy->EditValue = $this->PrintBy->CurrentValue;
		$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

		// PrintDate
		$this->PrintDate->EditAttrs["class"] = "form-control";
		$this->PrintDate->EditCustomAttributes = "";
		$this->PrintDate->EditValue = FormatDateTime($this->PrintDate->CurrentValue, 8);
		$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

		// BillingDate
		$this->BillingDate->EditAttrs["class"] = "form-control";
		$this->BillingDate->EditCustomAttributes = "";
		$this->BillingDate->EditValue = FormatDateTime($this->BillingDate->CurrentValue, 8);
		$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

		// BilledBy
		$this->BilledBy->EditAttrs["class"] = "form-control";
		$this->BilledBy->EditCustomAttributes = "";
		if (!$this->BilledBy->Raw)
			$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
		$this->BilledBy->EditValue = $this->BilledBy->CurrentValue;
		$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

		// Resulted
		$this->Resulted->EditAttrs["class"] = "form-control";
		$this->Resulted->EditCustomAttributes = "";
		if (!$this->Resulted->Raw)
			$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
		$this->Resulted->EditValue = $this->Resulted->CurrentValue;
		$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
		$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

		// ResultedBy
		$this->ResultedBy->EditAttrs["class"] = "form-control";
		$this->ResultedBy->EditCustomAttributes = "";
		if (!$this->ResultedBy->Raw)
			$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
		$this->ResultedBy->EditValue = $this->ResultedBy->CurrentValue;
		$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

		// SampleDate
		$this->SampleDate->EditAttrs["class"] = "form-control";
		$this->SampleDate->EditCustomAttributes = "";
		$this->SampleDate->EditValue = FormatDateTime($this->SampleDate->CurrentValue, 8);
		$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

		// SampleUser
		$this->SampleUser->EditAttrs["class"] = "form-control";
		$this->SampleUser->EditCustomAttributes = "";
		if (!$this->SampleUser->Raw)
			$this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
		$this->SampleUser->EditValue = $this->SampleUser->CurrentValue;
		$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

		// Sampled
		$this->Sampled->EditAttrs["class"] = "form-control";
		$this->Sampled->EditCustomAttributes = "";
		if (!$this->Sampled->Raw)
			$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
		$this->Sampled->EditValue = $this->Sampled->CurrentValue;
		$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

		// ReceivedDate
		$this->ReceivedDate->EditAttrs["class"] = "form-control";
		$this->ReceivedDate->EditCustomAttributes = "";
		$this->ReceivedDate->EditValue = FormatDateTime($this->ReceivedDate->CurrentValue, 8);
		$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

		// ReceivedUser
		$this->ReceivedUser->EditAttrs["class"] = "form-control";
		$this->ReceivedUser->EditCustomAttributes = "";
		if (!$this->ReceivedUser->Raw)
			$this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
		$this->ReceivedUser->EditValue = $this->ReceivedUser->CurrentValue;
		$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

		// Recevied
		$this->Recevied->EditAttrs["class"] = "form-control";
		$this->Recevied->EditCustomAttributes = "";
		if (!$this->Recevied->Raw)
			$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
		$this->Recevied->EditValue = $this->Recevied->CurrentValue;
		$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

		// DeptRecvDate
		$this->DeptRecvDate->EditAttrs["class"] = "form-control";
		$this->DeptRecvDate->EditCustomAttributes = "";
		$this->DeptRecvDate->EditValue = FormatDateTime($this->DeptRecvDate->CurrentValue, 8);
		$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

		// DeptRecvUser
		$this->DeptRecvUser->EditAttrs["class"] = "form-control";
		$this->DeptRecvUser->EditCustomAttributes = "";
		if (!$this->DeptRecvUser->Raw)
			$this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
		$this->DeptRecvUser->EditValue = $this->DeptRecvUser->CurrentValue;
		$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

		// DeptRecived
		$this->DeptRecived->EditAttrs["class"] = "form-control";
		$this->DeptRecived->EditCustomAttributes = "";
		if (!$this->DeptRecived->Raw)
			$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
		$this->DeptRecived->EditValue = $this->DeptRecived->CurrentValue;
		$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

		// SAuthDate
		$this->SAuthDate->EditAttrs["class"] = "form-control";
		$this->SAuthDate->EditCustomAttributes = "";
		$this->SAuthDate->EditValue = FormatDateTime($this->SAuthDate->CurrentValue, 8);
		$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

		// SAuthBy
		$this->SAuthBy->EditAttrs["class"] = "form-control";
		$this->SAuthBy->EditCustomAttributes = "";
		if (!$this->SAuthBy->Raw)
			$this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
		$this->SAuthBy->EditValue = $this->SAuthBy->CurrentValue;
		$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

		// SAuthendicate
		$this->SAuthendicate->EditAttrs["class"] = "form-control";
		$this->SAuthendicate->EditCustomAttributes = "";
		if (!$this->SAuthendicate->Raw)
			$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
		$this->SAuthendicate->EditValue = $this->SAuthendicate->CurrentValue;
		$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

		// AuthDate
		$this->AuthDate->EditAttrs["class"] = "form-control";
		$this->AuthDate->EditCustomAttributes = "";
		$this->AuthDate->EditValue = FormatDateTime($this->AuthDate->CurrentValue, 8);
		$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

		// AuthBy
		$this->AuthBy->EditAttrs["class"] = "form-control";
		$this->AuthBy->EditCustomAttributes = "";
		if (!$this->AuthBy->Raw)
			$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
		$this->AuthBy->EditValue = $this->AuthBy->CurrentValue;
		$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

		// Authencate
		$this->Authencate->EditAttrs["class"] = "form-control";
		$this->Authencate->EditCustomAttributes = "";
		if (!$this->Authencate->Raw)
			$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
		$this->Authencate->EditValue = $this->Authencate->CurrentValue;
		$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

		// EditDate
		$this->EditDate->EditAttrs["class"] = "form-control";
		$this->EditDate->EditCustomAttributes = "";
		$this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
		$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

		// EditBy
		$this->EditBy->EditAttrs["class"] = "form-control";
		$this->EditBy->EditCustomAttributes = "";
		if (!$this->EditBy->Raw)
			$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
		$this->EditBy->EditValue = $this->EditBy->CurrentValue;
		$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

		// Editted
		$this->Editted->EditAttrs["class"] = "form-control";
		$this->Editted->EditCustomAttributes = "";
		if (!$this->Editted->Raw)
			$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
		$this->Editted->EditValue = $this->Editted->CurrentValue;
		$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

		// PatID
		$this->PatID->EditAttrs["class"] = "form-control";
		$this->PatID->EditCustomAttributes = "";
		if ($this->PatID->getSessionValue() != "") {
			$this->PatID->CurrentValue = $this->PatID->getSessionValue();
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";
		} else {
			$this->PatID->EditValue = $this->PatID->CurrentValue;
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
		}

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (!$this->PatientId->Raw)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// Mobile
		$this->Mobile->EditAttrs["class"] = "form-control";
		$this->Mobile->EditCustomAttributes = "";
		if (!$this->Mobile->Raw)
			$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
		$this->Mobile->EditValue = $this->Mobile->CurrentValue;
		$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

		// CId
		$this->CId->EditAttrs["class"] = "form-control";
		$this->CId->EditCustomAttributes = "";
		$this->CId->EditValue = $this->CId->CurrentValue;
		$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

		// Order
		$this->Order->EditAttrs["class"] = "form-control";
		$this->Order->EditCustomAttributes = "";
		$this->Order->EditValue = $this->Order->CurrentValue;
		$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
		if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue))
			$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
		

		// Form
		$this->Form->EditAttrs["class"] = "form-control";
		$this->Form->EditCustomAttributes = "";
		$this->Form->EditValue = $this->Form->CurrentValue;
		$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

		// ResType
		$this->ResType->EditAttrs["class"] = "form-control";
		$this->ResType->EditCustomAttributes = "";
		if (!$this->ResType->Raw)
			$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
		$this->ResType->EditValue = $this->ResType->CurrentValue;
		$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

		// Sample
		$this->Sample->EditAttrs["class"] = "form-control";
		$this->Sample->EditCustomAttributes = "";
		if (!$this->Sample->Raw)
			$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
		$this->Sample->EditValue = $this->Sample->CurrentValue;
		$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

		// NoD
		$this->NoD->EditAttrs["class"] = "form-control";
		$this->NoD->EditCustomAttributes = "";
		$this->NoD->EditValue = $this->NoD->CurrentValue;
		$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
		if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue))
			$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
		

		// BillOrder
		$this->BillOrder->EditAttrs["class"] = "form-control";
		$this->BillOrder->EditCustomAttributes = "";
		$this->BillOrder->EditValue = $this->BillOrder->CurrentValue;
		$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
		if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue))
			$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
		

		// Formula
		$this->Formula->EditAttrs["class"] = "form-control";
		$this->Formula->EditCustomAttributes = "";
		$this->Formula->EditValue = $this->Formula->CurrentValue;
		$this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

		// Inactive
		$this->Inactive->EditAttrs["class"] = "form-control";
		$this->Inactive->EditCustomAttributes = "";
		if (!$this->Inactive->Raw)
			$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
		$this->Inactive->EditValue = $this->Inactive->CurrentValue;
		$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

		// CollSample
		$this->CollSample->EditAttrs["class"] = "form-control";
		$this->CollSample->EditCustomAttributes = "";
		if (!$this->CollSample->Raw)
			$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
		$this->CollSample->EditValue = $this->CollSample->CurrentValue;
		$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

		// TestType
		$this->TestType->EditAttrs["class"] = "form-control";
		$this->TestType->EditCustomAttributes = "";
		if (!$this->TestType->Raw)
			$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
		$this->TestType->EditValue = $this->TestType->CurrentValue;
		$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

		// Repeated
		$this->Repeated->EditAttrs["class"] = "form-control";
		$this->Repeated->EditCustomAttributes = "";
		if (!$this->Repeated->Raw)
			$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
		$this->Repeated->EditValue = $this->Repeated->CurrentValue;
		$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

		// RepeatedBy
		$this->RepeatedBy->EditAttrs["class"] = "form-control";
		$this->RepeatedBy->EditCustomAttributes = "";
		if (!$this->RepeatedBy->Raw)
			$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
		$this->RepeatedBy->EditValue = $this->RepeatedBy->CurrentValue;
		$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

		// RepeatedDate
		$this->RepeatedDate->EditAttrs["class"] = "form-control";
		$this->RepeatedDate->EditCustomAttributes = "";
		$this->RepeatedDate->EditValue = FormatDateTime($this->RepeatedDate->CurrentValue, 8);
		$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

		// serviceID
		$this->serviceID->EditAttrs["class"] = "form-control";
		$this->serviceID->EditCustomAttributes = "";
		$this->serviceID->EditValue = $this->serviceID->CurrentValue;
		$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

		// Service_Type
		$this->Service_Type->EditAttrs["class"] = "form-control";
		$this->Service_Type->EditCustomAttributes = "";
		if (!$this->Service_Type->Raw)
			$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
		$this->Service_Type->EditValue = $this->Service_Type->CurrentValue;
		$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

		// Service_Department
		$this->Service_Department->EditAttrs["class"] = "form-control";
		$this->Service_Department->EditCustomAttributes = "";
		if (!$this->Service_Department->Raw)
			$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
		$this->Service_Department->EditValue = $this->Service_Department->CurrentValue;
		$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

		// RequestNo
		$this->RequestNo->EditAttrs["class"] = "form-control";
		$this->RequestNo->EditCustomAttributes = "";
		$this->RequestNo->EditValue = $this->RequestNo->CurrentValue;
		$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
			if (is_numeric($this->SubTotal->CurrentValue))
				$this->SubTotal->Total += $this->SubTotal->CurrentValue; // Accumulate total
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{
			$this->SubTotal->CurrentValue = $this->SubTotal->Total;
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";
			$this->SubTotal->HrefValue = ""; // Clear href value

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
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->patient_type);
					$doc->exportCaption($this->charged_date);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->profilePic);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->ServiceSelect);
					$doc->exportCaption($this->Aid);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrCODE);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->DrSharePres);
					$doc->exportCaption($this->HospSharePres);
					$doc->exportCaption($this->DrShareAmount);
					$doc->exportCaption($this->HospShareAmount);
					$doc->exportCaption($this->DrShareSettiledAmount);
					$doc->exportCaption($this->DrShareSettledId);
					$doc->exportCaption($this->DrShareSettiledStatus);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->invoiceAmount);
					$doc->exportCaption($this->invoiceStatus);
					$doc->exportCaption($this->modeOfPayment);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->DiscountCategory);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->TestSubCd);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->ProfCd);
					$doc->exportCaption($this->LabReport);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Specimen);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->RefValue);
					$doc->exportCaption($this->TestUnit);
					$doc->exportCaption($this->LOWHIGH);
					$doc->exportCaption($this->Branch);
					$doc->exportCaption($this->Dispatch);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->GraphPath);
					$doc->exportCaption($this->MachineCD);
					$doc->exportCaption($this->TestCancel);
					$doc->exportCaption($this->OutSource);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
					$doc->exportCaption($this->BillingDate);
					$doc->exportCaption($this->BilledBy);
					$doc->exportCaption($this->Resulted);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->SampleDate);
					$doc->exportCaption($this->SampleUser);
					$doc->exportCaption($this->Sampled);
					$doc->exportCaption($this->ReceivedDate);
					$doc->exportCaption($this->ReceivedUser);
					$doc->exportCaption($this->Recevied);
					$doc->exportCaption($this->DeptRecvDate);
					$doc->exportCaption($this->DeptRecvUser);
					$doc->exportCaption($this->DeptRecived);
					$doc->exportCaption($this->SAuthDate);
					$doc->exportCaption($this->SAuthBy);
					$doc->exportCaption($this->SAuthendicate);
					$doc->exportCaption($this->AuthDate);
					$doc->exportCaption($this->AuthBy);
					$doc->exportCaption($this->Authencate);
					$doc->exportCaption($this->EditDate);
					$doc->exportCaption($this->EditBy);
					$doc->exportCaption($this->Editted);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->ResType);
					$doc->exportCaption($this->Sample);
					$doc->exportCaption($this->NoD);
					$doc->exportCaption($this->BillOrder);
					$doc->exportCaption($this->Formula);
					$doc->exportCaption($this->Inactive);
					$doc->exportCaption($this->CollSample);
					$doc->exportCaption($this->TestType);
					$doc->exportCaption($this->Repeated);
					$doc->exportCaption($this->RepeatedBy);
					$doc->exportCaption($this->RepeatedDate);
					$doc->exportCaption($this->serviceID);
					$doc->exportCaption($this->Service_Type);
					$doc->exportCaption($this->Service_Department);
					$doc->exportCaption($this->RequestNo);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->Reception);
					$doc->exportCaption($this->Services);
					$doc->exportCaption($this->amount);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->patient_type);
					$doc->exportCaption($this->charged_date);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->mrnno);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->Gender);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->Quantity);
					$doc->exportCaption($this->Discount);
					$doc->exportCaption($this->SubTotal);
					$doc->exportCaption($this->ServiceSelect);
					$doc->exportCaption($this->Aid);
					$doc->exportCaption($this->Vid);
					$doc->exportCaption($this->DrID);
					$doc->exportCaption($this->DrCODE);
					$doc->exportCaption($this->DrName);
					$doc->exportCaption($this->Department);
					$doc->exportCaption($this->DrSharePres);
					$doc->exportCaption($this->HospSharePres);
					$doc->exportCaption($this->DrShareAmount);
					$doc->exportCaption($this->HospShareAmount);
					$doc->exportCaption($this->DrShareSettiledAmount);
					$doc->exportCaption($this->DrShareSettledId);
					$doc->exportCaption($this->DrShareSettiledStatus);
					$doc->exportCaption($this->invoiceId);
					$doc->exportCaption($this->invoiceAmount);
					$doc->exportCaption($this->invoiceStatus);
					$doc->exportCaption($this->modeOfPayment);
					$doc->exportCaption($this->HospID);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->DiscountCategory);
					$doc->exportCaption($this->sid);
					$doc->exportCaption($this->ItemCode);
					$doc->exportCaption($this->TestSubCd);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->ProfCd);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Specimen);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->TestUnit);
					$doc->exportCaption($this->LOWHIGH);
					$doc->exportCaption($this->Branch);
					$doc->exportCaption($this->Dispatch);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->GraphPath);
					$doc->exportCaption($this->MachineCD);
					$doc->exportCaption($this->TestCancel);
					$doc->exportCaption($this->OutSource);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
					$doc->exportCaption($this->BillingDate);
					$doc->exportCaption($this->BilledBy);
					$doc->exportCaption($this->Resulted);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->ResultedBy);
					$doc->exportCaption($this->SampleDate);
					$doc->exportCaption($this->SampleUser);
					$doc->exportCaption($this->Sampled);
					$doc->exportCaption($this->ReceivedDate);
					$doc->exportCaption($this->ReceivedUser);
					$doc->exportCaption($this->Recevied);
					$doc->exportCaption($this->DeptRecvDate);
					$doc->exportCaption($this->DeptRecvUser);
					$doc->exportCaption($this->DeptRecived);
					$doc->exportCaption($this->SAuthDate);
					$doc->exportCaption($this->SAuthBy);
					$doc->exportCaption($this->SAuthendicate);
					$doc->exportCaption($this->AuthDate);
					$doc->exportCaption($this->AuthBy);
					$doc->exportCaption($this->Authencate);
					$doc->exportCaption($this->EditDate);
					$doc->exportCaption($this->EditBy);
					$doc->exportCaption($this->Editted);
					$doc->exportCaption($this->PatID);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->Mobile);
					$doc->exportCaption($this->CId);
					$doc->exportCaption($this->Order);
					$doc->exportCaption($this->ResType);
					$doc->exportCaption($this->Sample);
					$doc->exportCaption($this->NoD);
					$doc->exportCaption($this->BillOrder);
					$doc->exportCaption($this->Inactive);
					$doc->exportCaption($this->CollSample);
					$doc->exportCaption($this->TestType);
					$doc->exportCaption($this->Repeated);
					$doc->exportCaption($this->RepeatedBy);
					$doc->exportCaption($this->RepeatedDate);
					$doc->exportCaption($this->serviceID);
					$doc->exportCaption($this->Service_Type);
					$doc->exportCaption($this->Service_Department);
					$doc->exportCaption($this->RequestNo);
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
				$this->aggregateListRowValues(); // Aggregate row values

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->Services);
						$doc->exportField($this->amount);
						$doc->exportField($this->description);
						$doc->exportField($this->patient_type);
						$doc->exportField($this->charged_date);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->profilePic);
						$doc->exportField($this->Unit);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->ServiceSelect);
						$doc->exportField($this->Aid);
						$doc->exportField($this->Vid);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrCODE);
						$doc->exportField($this->DrName);
						$doc->exportField($this->Department);
						$doc->exportField($this->DrSharePres);
						$doc->exportField($this->HospSharePres);
						$doc->exportField($this->DrShareAmount);
						$doc->exportField($this->HospShareAmount);
						$doc->exportField($this->DrShareSettiledAmount);
						$doc->exportField($this->DrShareSettledId);
						$doc->exportField($this->DrShareSettiledStatus);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->invoiceAmount);
						$doc->exportField($this->invoiceStatus);
						$doc->exportField($this->modeOfPayment);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->DiscountCategory);
						$doc->exportField($this->sid);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->TestSubCd);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->ProfCd);
						$doc->exportField($this->LabReport);
						$doc->exportField($this->Comments);
						$doc->exportField($this->Method);
						$doc->exportField($this->Specimen);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->RefValue);
						$doc->exportField($this->TestUnit);
						$doc->exportField($this->LOWHIGH);
						$doc->exportField($this->Branch);
						$doc->exportField($this->Dispatch);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->GraphPath);
						$doc->exportField($this->MachineCD);
						$doc->exportField($this->TestCancel);
						$doc->exportField($this->OutSource);
						$doc->exportField($this->Printed);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
						$doc->exportField($this->BillingDate);
						$doc->exportField($this->BilledBy);
						$doc->exportField($this->Resulted);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->SampleDate);
						$doc->exportField($this->SampleUser);
						$doc->exportField($this->Sampled);
						$doc->exportField($this->ReceivedDate);
						$doc->exportField($this->ReceivedUser);
						$doc->exportField($this->Recevied);
						$doc->exportField($this->DeptRecvDate);
						$doc->exportField($this->DeptRecvUser);
						$doc->exportField($this->DeptRecived);
						$doc->exportField($this->SAuthDate);
						$doc->exportField($this->SAuthBy);
						$doc->exportField($this->SAuthendicate);
						$doc->exportField($this->AuthDate);
						$doc->exportField($this->AuthBy);
						$doc->exportField($this->Authencate);
						$doc->exportField($this->EditDate);
						$doc->exportField($this->EditBy);
						$doc->exportField($this->Editted);
						$doc->exportField($this->PatID);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->CId);
						$doc->exportField($this->Order);
						$doc->exportField($this->Form);
						$doc->exportField($this->ResType);
						$doc->exportField($this->Sample);
						$doc->exportField($this->NoD);
						$doc->exportField($this->BillOrder);
						$doc->exportField($this->Formula);
						$doc->exportField($this->Inactive);
						$doc->exportField($this->CollSample);
						$doc->exportField($this->TestType);
						$doc->exportField($this->Repeated);
						$doc->exportField($this->RepeatedBy);
						$doc->exportField($this->RepeatedDate);
						$doc->exportField($this->serviceID);
						$doc->exportField($this->Service_Type);
						$doc->exportField($this->Service_Department);
						$doc->exportField($this->RequestNo);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->Reception);
						$doc->exportField($this->Services);
						$doc->exportField($this->amount);
						$doc->exportField($this->description);
						$doc->exportField($this->patient_type);
						$doc->exportField($this->charged_date);
						$doc->exportField($this->status);
						$doc->exportField($this->mrnno);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->Gender);
						$doc->exportField($this->Unit);
						$doc->exportField($this->Quantity);
						$doc->exportField($this->Discount);
						$doc->exportField($this->SubTotal);
						$doc->exportField($this->ServiceSelect);
						$doc->exportField($this->Aid);
						$doc->exportField($this->Vid);
						$doc->exportField($this->DrID);
						$doc->exportField($this->DrCODE);
						$doc->exportField($this->DrName);
						$doc->exportField($this->Department);
						$doc->exportField($this->DrSharePres);
						$doc->exportField($this->HospSharePres);
						$doc->exportField($this->DrShareAmount);
						$doc->exportField($this->HospShareAmount);
						$doc->exportField($this->DrShareSettiledAmount);
						$doc->exportField($this->DrShareSettledId);
						$doc->exportField($this->DrShareSettiledStatus);
						$doc->exportField($this->invoiceId);
						$doc->exportField($this->invoiceAmount);
						$doc->exportField($this->invoiceStatus);
						$doc->exportField($this->modeOfPayment);
						$doc->exportField($this->HospID);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->DiscountCategory);
						$doc->exportField($this->sid);
						$doc->exportField($this->ItemCode);
						$doc->exportField($this->TestSubCd);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->ProfCd);
						$doc->exportField($this->Comments);
						$doc->exportField($this->Method);
						$doc->exportField($this->Specimen);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->TestUnit);
						$doc->exportField($this->LOWHIGH);
						$doc->exportField($this->Branch);
						$doc->exportField($this->Dispatch);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->GraphPath);
						$doc->exportField($this->MachineCD);
						$doc->exportField($this->TestCancel);
						$doc->exportField($this->OutSource);
						$doc->exportField($this->Printed);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
						$doc->exportField($this->BillingDate);
						$doc->exportField($this->BilledBy);
						$doc->exportField($this->Resulted);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->ResultedBy);
						$doc->exportField($this->SampleDate);
						$doc->exportField($this->SampleUser);
						$doc->exportField($this->Sampled);
						$doc->exportField($this->ReceivedDate);
						$doc->exportField($this->ReceivedUser);
						$doc->exportField($this->Recevied);
						$doc->exportField($this->DeptRecvDate);
						$doc->exportField($this->DeptRecvUser);
						$doc->exportField($this->DeptRecived);
						$doc->exportField($this->SAuthDate);
						$doc->exportField($this->SAuthBy);
						$doc->exportField($this->SAuthendicate);
						$doc->exportField($this->AuthDate);
						$doc->exportField($this->AuthBy);
						$doc->exportField($this->Authencate);
						$doc->exportField($this->EditDate);
						$doc->exportField($this->EditBy);
						$doc->exportField($this->Editted);
						$doc->exportField($this->PatID);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->Mobile);
						$doc->exportField($this->CId);
						$doc->exportField($this->Order);
						$doc->exportField($this->ResType);
						$doc->exportField($this->Sample);
						$doc->exportField($this->NoD);
						$doc->exportField($this->BillOrder);
						$doc->exportField($this->Inactive);
						$doc->exportField($this->CollSample);
						$doc->exportField($this->TestType);
						$doc->exportField($this->Repeated);
						$doc->exportField($this->RepeatedBy);
						$doc->exportField($this->RepeatedDate);
						$doc->exportField($this->serviceID);
						$doc->exportField($this->Service_Type);
						$doc->exportField($this->Service_Department);
						$doc->exportField($this->RequestNo);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}

		// Export aggregates (horizontal format only)
		if ($doc->Horizontal) {
			$this->RowType = ROWTYPE_AGGREGATE;
			$this->resetAttributes();
			$this->aggregateListRow();
			if (!$doc->ExportCustom) {
				$doc->beginExportRow(-1);
				$doc->exportAggregate($this->id, '');
				$doc->exportAggregate($this->Reception, '');
				$doc->exportAggregate($this->Services, '');
				$doc->exportAggregate($this->amount, '');
				$doc->exportAggregate($this->description, '');
				$doc->exportAggregate($this->patient_type, '');
				$doc->exportAggregate($this->charged_date, '');
				$doc->exportAggregate($this->status, '');
				$doc->exportAggregate($this->mrnno, '');
				$doc->exportAggregate($this->PatientName, '');
				$doc->exportAggregate($this->Age, '');
				$doc->exportAggregate($this->Gender, '');
				$doc->exportAggregate($this->Unit, '');
				$doc->exportAggregate($this->Quantity, '');
				$doc->exportAggregate($this->Discount, '');
				$doc->exportAggregate($this->SubTotal, 'TOTAL');
				$doc->exportAggregate($this->ServiceSelect, '');
				$doc->exportAggregate($this->Aid, '');
				$doc->exportAggregate($this->Vid, '');
				$doc->exportAggregate($this->DrID, '');
				$doc->exportAggregate($this->DrCODE, '');
				$doc->exportAggregate($this->DrName, '');
				$doc->exportAggregate($this->Department, '');
				$doc->exportAggregate($this->DrSharePres, '');
				$doc->exportAggregate($this->HospSharePres, '');
				$doc->exportAggregate($this->DrShareAmount, '');
				$doc->exportAggregate($this->HospShareAmount, '');
				$doc->exportAggregate($this->DrShareSettiledAmount, '');
				$doc->exportAggregate($this->DrShareSettledId, '');
				$doc->exportAggregate($this->DrShareSettiledStatus, '');
				$doc->exportAggregate($this->invoiceId, '');
				$doc->exportAggregate($this->invoiceAmount, '');
				$doc->exportAggregate($this->invoiceStatus, '');
				$doc->exportAggregate($this->modeOfPayment, '');
				$doc->exportAggregate($this->HospID, '');
				$doc->exportAggregate($this->RIDNO, '');
				$doc->exportAggregate($this->TidNo, '');
				$doc->exportAggregate($this->DiscountCategory, '');
				$doc->exportAggregate($this->sid, '');
				$doc->exportAggregate($this->ItemCode, '');
				$doc->exportAggregate($this->TestSubCd, '');
				$doc->exportAggregate($this->DEptCd, '');
				$doc->exportAggregate($this->ProfCd, '');
				$doc->exportAggregate($this->Comments, '');
				$doc->exportAggregate($this->Method, '');
				$doc->exportAggregate($this->Specimen, '');
				$doc->exportAggregate($this->Abnormal, '');
				$doc->exportAggregate($this->TestUnit, '');
				$doc->exportAggregate($this->LOWHIGH, '');
				$doc->exportAggregate($this->Branch, '');
				$doc->exportAggregate($this->Dispatch, '');
				$doc->exportAggregate($this->Pic1, '');
				$doc->exportAggregate($this->Pic2, '');
				$doc->exportAggregate($this->GraphPath, '');
				$doc->exportAggregate($this->MachineCD, '');
				$doc->exportAggregate($this->TestCancel, '');
				$doc->exportAggregate($this->OutSource, '');
				$doc->exportAggregate($this->Printed, '');
				$doc->exportAggregate($this->PrintBy, '');
				$doc->exportAggregate($this->PrintDate, '');
				$doc->exportAggregate($this->BillingDate, '');
				$doc->exportAggregate($this->BilledBy, '');
				$doc->exportAggregate($this->Resulted, '');
				$doc->exportAggregate($this->ResultDate, '');
				$doc->exportAggregate($this->ResultedBy, '');
				$doc->exportAggregate($this->SampleDate, '');
				$doc->exportAggregate($this->SampleUser, '');
				$doc->exportAggregate($this->Sampled, '');
				$doc->exportAggregate($this->ReceivedDate, '');
				$doc->exportAggregate($this->ReceivedUser, '');
				$doc->exportAggregate($this->Recevied, '');
				$doc->exportAggregate($this->DeptRecvDate, '');
				$doc->exportAggregate($this->DeptRecvUser, '');
				$doc->exportAggregate($this->DeptRecived, '');
				$doc->exportAggregate($this->SAuthDate, '');
				$doc->exportAggregate($this->SAuthBy, '');
				$doc->exportAggregate($this->SAuthendicate, '');
				$doc->exportAggregate($this->AuthDate, '');
				$doc->exportAggregate($this->AuthBy, '');
				$doc->exportAggregate($this->Authencate, '');
				$doc->exportAggregate($this->EditDate, '');
				$doc->exportAggregate($this->EditBy, '');
				$doc->exportAggregate($this->Editted, '');
				$doc->exportAggregate($this->PatID, '');
				$doc->exportAggregate($this->PatientId, '');
				$doc->exportAggregate($this->Mobile, '');
				$doc->exportAggregate($this->CId, '');
				$doc->exportAggregate($this->Order, '');
				$doc->exportAggregate($this->ResType, '');
				$doc->exportAggregate($this->Sample, '');
				$doc->exportAggregate($this->NoD, '');
				$doc->exportAggregate($this->BillOrder, '');
				$doc->exportAggregate($this->Inactive, '');
				$doc->exportAggregate($this->CollSample, '');
				$doc->exportAggregate($this->TestType, '');
				$doc->exportAggregate($this->Repeated, '');
				$doc->exportAggregate($this->RepeatedBy, '');
				$doc->exportAggregate($this->RepeatedDate, '');
				$doc->exportAggregate($this->serviceID, '');
				$doc->exportAggregate($this->Service_Type, '');
				$doc->exportAggregate($this->Service_Department, '');
				$doc->exportAggregate($this->RequestNo, '');
				$doc->endExportRow();
			}
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
		//  $urrll = "billing_voucherview.php?showdetail=&id=".$rsnew[0]["invoiceId"];
	//	$urrll = 'view_billing_voucheradd.php?showdetail=view_patient_services';
	//	header("Location: " .$urrll);

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
					if ($this->invoiceId->CurrentValue != null) {
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