<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for monitor_treatment_plan
 */
class monitor_treatment_plan extends DbTable
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
	public $PatId;
	public $PatientId;
	public $PatientName;
	public $Age;
	public $MobileNo;
	public $ConsultantName;
	public $RefDrName;
	public $RefDrMobileNo;
	public $NewVisitDate;
	public $NewVisitYesNo;
	public $Treatment;
	public $IUIDoneDate1;
	public $IUIDoneYesNo1;
	public $UPTTestDate1;
	public $UPTTestYesNo1;
	public $IUIDoneDate2;
	public $IUIDoneYesNo2;
	public $UPTTestDate2;
	public $UPTTestYesNo2;
	public $IUIDoneDate3;
	public $IUIDoneYesNo3;
	public $UPTTestDate3;
	public $UPTTestYesNo3;
	public $IUIDoneDate4;
	public $IUIDoneYesNo4;
	public $UPTTestDate4;
	public $UPTTestYesNo4;
	public $IVFStimulationDate;
	public $IVFStimulationYesNo;
	public $OPUDate;
	public $OPUYesNo;
	public $ETDate;
	public $ETYesNo;
	public $BetaHCGDate;
	public $BetaHCGYesNo;
	public $FETDate;
	public $FETYesNo;
	public $FBetaHCGDate;
	public $FBetaHCGYesNo;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $HospID;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'monitor_treatment_plan';
		$this->TableName = 'monitor_treatment_plan';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`monitor_treatment_plan`";
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
		$this->id = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// PatId
		$this->PatId = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, -1, FALSE, '`PatId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PatId->Sortable = TRUE; // Allow sort
		$this->PatId->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PatId->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PatId->Lookup = new Lookup('PatId', 'patient', FALSE, 'id', ["first_name","PatientID","mobile_no",""], [], [], [], [], ["PatientID","first_name","Age","mobile_no","ReferA4TreatingConsultant","ReferedByDr","ReferMobileNo"], ["x_PatientId","x_PatientName","x_Age","x_MobileNo","x_ConsultantName","x_RefDrName","x_RefDrMobileNo"], '`id` DESC', '');
		$this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PatId'] = &$this->PatId;

		// PatientId
		$this->PatientId = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, -1, FALSE, '`PatientId`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientId->Sortable = TRUE; // Allow sort
		$this->fields['PatientId'] = &$this->PatientId;

		// PatientName
		$this->PatientName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, -1, FALSE, '`PatientName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PatientName->Sortable = TRUE; // Allow sort
		$this->fields['PatientName'] = &$this->PatientName;

		// Age
		$this->Age = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_Age', 'Age', '`Age`', '`Age`', 200, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// MobileNo
		$this->MobileNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_MobileNo', 'MobileNo', '`MobileNo`', '`MobileNo`', 200, -1, FALSE, '`MobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MobileNo->Sortable = TRUE; // Allow sort
		$this->fields['MobileNo'] = &$this->MobileNo;

		// ConsultantName
		$this->ConsultantName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ConsultantName', 'ConsultantName', '`ConsultantName`', '`ConsultantName`', 200, -1, FALSE, '`ConsultantName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ConsultantName->Sortable = TRUE; // Allow sort
		$this->fields['ConsultantName'] = &$this->ConsultantName;

		// RefDrName
		$this->RefDrName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_RefDrName', 'RefDrName', '`RefDrName`', '`RefDrName`', 200, -1, FALSE, '`RefDrName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefDrName->Sortable = TRUE; // Allow sort
		$this->fields['RefDrName'] = &$this->RefDrName;

		// RefDrMobileNo
		$this->RefDrMobileNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_RefDrMobileNo', 'RefDrMobileNo', '`RefDrMobileNo`', '`RefDrMobileNo`', 200, -1, FALSE, '`RefDrMobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RefDrMobileNo->Sortable = TRUE; // Allow sort
		$this->fields['RefDrMobileNo'] = &$this->RefDrMobileNo;

		// NewVisitDate
		$this->NewVisitDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_NewVisitDate', 'NewVisitDate', '`NewVisitDate`', CastDateFieldForLike('`NewVisitDate`', 7, "DB"), 135, 7, FALSE, '`NewVisitDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NewVisitDate->Sortable = TRUE; // Allow sort
		$this->NewVisitDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['NewVisitDate'] = &$this->NewVisitDate;

		// NewVisitYesNo
		$this->NewVisitYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_NewVisitYesNo', 'NewVisitYesNo', '`NewVisitYesNo`', '`NewVisitYesNo`', 200, -1, FALSE, '`NewVisitYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->NewVisitYesNo->Sortable = TRUE; // Allow sort
		$this->NewVisitYesNo->Lookup = new Lookup('NewVisitYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->NewVisitYesNo->OptionCount = 2;
		$this->fields['NewVisitYesNo'] = &$this->NewVisitYesNo;

		// Treatment
		$this->Treatment = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, -1, FALSE, '`Treatment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Treatment->Sortable = TRUE; // Allow sort
		$this->Treatment->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Treatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Treatment->Lookup = new Lookup('Treatment', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Treatment->OptionCount = 4;
		$this->fields['Treatment'] = &$this->Treatment;

		// IUIDoneDate1
		$this->IUIDoneDate1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate1', 'IUIDoneDate1', '`IUIDoneDate1`', CastDateFieldForLike('`IUIDoneDate1`', 7, "DB"), 135, 7, FALSE, '`IUIDoneDate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUIDoneDate1->Sortable = TRUE; // Allow sort
		$this->IUIDoneDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['IUIDoneDate1'] = &$this->IUIDoneDate1;

		// IUIDoneYesNo1
		$this->IUIDoneYesNo1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo1', 'IUIDoneYesNo1', '`IUIDoneYesNo1`', '`IUIDoneYesNo1`', 200, -1, FALSE, '`IUIDoneYesNo1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->IUIDoneYesNo1->Sortable = TRUE; // Allow sort
		$this->IUIDoneYesNo1->Lookup = new Lookup('IUIDoneYesNo1', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUIDoneYesNo1->OptionCount = 2;
		$this->fields['IUIDoneYesNo1'] = &$this->IUIDoneYesNo1;

		// UPTTestDate1
		$this->UPTTestDate1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate1', 'UPTTestDate1', '`UPTTestDate1`', CastDateFieldForLike('`UPTTestDate1`', 7, "DB"), 135, 7, FALSE, '`UPTTestDate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UPTTestDate1->Sortable = TRUE; // Allow sort
		$this->UPTTestDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['UPTTestDate1'] = &$this->UPTTestDate1;

		// UPTTestYesNo1
		$this->UPTTestYesNo1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo1', 'UPTTestYesNo1', '`UPTTestYesNo1`', '`UPTTestYesNo1`', 200, -1, FALSE, '`UPTTestYesNo1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->UPTTestYesNo1->Sortable = TRUE; // Allow sort
		$this->UPTTestYesNo1->Lookup = new Lookup('UPTTestYesNo1', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->UPTTestYesNo1->OptionCount = 2;
		$this->fields['UPTTestYesNo1'] = &$this->UPTTestYesNo1;

		// IUIDoneDate2
		$this->IUIDoneDate2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate2', 'IUIDoneDate2', '`IUIDoneDate2`', CastDateFieldForLike('`IUIDoneDate2`', 7, "DB"), 135, 7, FALSE, '`IUIDoneDate2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUIDoneDate2->Sortable = TRUE; // Allow sort
		$this->IUIDoneDate2->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['IUIDoneDate2'] = &$this->IUIDoneDate2;

		// IUIDoneYesNo2
		$this->IUIDoneYesNo2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo2', 'IUIDoneYesNo2', '`IUIDoneYesNo2`', '`IUIDoneYesNo2`', 200, -1, FALSE, '`IUIDoneYesNo2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->IUIDoneYesNo2->Sortable = TRUE; // Allow sort
		$this->IUIDoneYesNo2->Lookup = new Lookup('IUIDoneYesNo2', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUIDoneYesNo2->OptionCount = 2;
		$this->fields['IUIDoneYesNo2'] = &$this->IUIDoneYesNo2;

		// UPTTestDate2
		$this->UPTTestDate2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate2', 'UPTTestDate2', '`UPTTestDate2`', CastDateFieldForLike('`UPTTestDate2`', 7, "DB"), 135, 7, FALSE, '`UPTTestDate2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UPTTestDate2->Sortable = TRUE; // Allow sort
		$this->UPTTestDate2->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['UPTTestDate2'] = &$this->UPTTestDate2;

		// UPTTestYesNo2
		$this->UPTTestYesNo2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo2', 'UPTTestYesNo2', '`UPTTestYesNo2`', '`UPTTestYesNo2`', 200, -1, FALSE, '`UPTTestYesNo2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->UPTTestYesNo2->Sortable = TRUE; // Allow sort
		$this->UPTTestYesNo2->Lookup = new Lookup('UPTTestYesNo2', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->UPTTestYesNo2->OptionCount = 2;
		$this->fields['UPTTestYesNo2'] = &$this->UPTTestYesNo2;

		// IUIDoneDate3
		$this->IUIDoneDate3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate3', 'IUIDoneDate3', '`IUIDoneDate3`', CastDateFieldForLike('`IUIDoneDate3`', 7, "DB"), 135, 7, FALSE, '`IUIDoneDate3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUIDoneDate3->Sortable = TRUE; // Allow sort
		$this->IUIDoneDate3->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['IUIDoneDate3'] = &$this->IUIDoneDate3;

		// IUIDoneYesNo3
		$this->IUIDoneYesNo3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo3', 'IUIDoneYesNo3', '`IUIDoneYesNo3`', '`IUIDoneYesNo3`', 200, -1, FALSE, '`IUIDoneYesNo3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->IUIDoneYesNo3->Sortable = TRUE; // Allow sort
		$this->IUIDoneYesNo3->Lookup = new Lookup('IUIDoneYesNo3', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUIDoneYesNo3->OptionCount = 2;
		$this->fields['IUIDoneYesNo3'] = &$this->IUIDoneYesNo3;

		// UPTTestDate3
		$this->UPTTestDate3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate3', 'UPTTestDate3', '`UPTTestDate3`', CastDateFieldForLike('`UPTTestDate3`', 7, "DB"), 135, 7, FALSE, '`UPTTestDate3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UPTTestDate3->Sortable = TRUE; // Allow sort
		$this->UPTTestDate3->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['UPTTestDate3'] = &$this->UPTTestDate3;

		// UPTTestYesNo3
		$this->UPTTestYesNo3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo3', 'UPTTestYesNo3', '`UPTTestYesNo3`', '`UPTTestYesNo3`', 200, -1, FALSE, '`UPTTestYesNo3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->UPTTestYesNo3->Sortable = TRUE; // Allow sort
		$this->UPTTestYesNo3->Lookup = new Lookup('UPTTestYesNo3', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->UPTTestYesNo3->OptionCount = 2;
		$this->fields['UPTTestYesNo3'] = &$this->UPTTestYesNo3;

		// IUIDoneDate4
		$this->IUIDoneDate4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate4', 'IUIDoneDate4', '`IUIDoneDate4`', CastDateFieldForLike('`IUIDoneDate4`', 7, "DB"), 135, 7, FALSE, '`IUIDoneDate4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUIDoneDate4->Sortable = TRUE; // Allow sort
		$this->IUIDoneDate4->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['IUIDoneDate4'] = &$this->IUIDoneDate4;

		// IUIDoneYesNo4
		$this->IUIDoneYesNo4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo4', 'IUIDoneYesNo4', '`IUIDoneYesNo4`', '`IUIDoneYesNo4`', 200, -1, FALSE, '`IUIDoneYesNo4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->IUIDoneYesNo4->Sortable = TRUE; // Allow sort
		$this->IUIDoneYesNo4->Lookup = new Lookup('IUIDoneYesNo4', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IUIDoneYesNo4->OptionCount = 2;
		$this->fields['IUIDoneYesNo4'] = &$this->IUIDoneYesNo4;

		// UPTTestDate4
		$this->UPTTestDate4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate4', 'UPTTestDate4', '`UPTTestDate4`', CastDateFieldForLike('`UPTTestDate4`', 7, "DB"), 135, 7, FALSE, '`UPTTestDate4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UPTTestDate4->Sortable = TRUE; // Allow sort
		$this->UPTTestDate4->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['UPTTestDate4'] = &$this->UPTTestDate4;

		// UPTTestYesNo4
		$this->UPTTestYesNo4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo4', 'UPTTestYesNo4', '`UPTTestYesNo4`', '`UPTTestYesNo4`', 200, -1, FALSE, '`UPTTestYesNo4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->UPTTestYesNo4->Sortable = TRUE; // Allow sort
		$this->UPTTestYesNo4->Lookup = new Lookup('UPTTestYesNo4', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->UPTTestYesNo4->OptionCount = 2;
		$this->fields['UPTTestYesNo4'] = &$this->UPTTestYesNo4;

		// IVFStimulationDate
		$this->IVFStimulationDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IVFStimulationDate', 'IVFStimulationDate', '`IVFStimulationDate`', CastDateFieldForLike('`IVFStimulationDate`', 7, "DB"), 135, 7, FALSE, '`IVFStimulationDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IVFStimulationDate->Sortable = TRUE; // Allow sort
		$this->IVFStimulationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['IVFStimulationDate'] = &$this->IVFStimulationDate;

		// IVFStimulationYesNo
		$this->IVFStimulationYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IVFStimulationYesNo', 'IVFStimulationYesNo', '`IVFStimulationYesNo`', '`IVFStimulationYesNo`', 200, -1, FALSE, '`IVFStimulationYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->IVFStimulationYesNo->Sortable = TRUE; // Allow sort
		$this->IVFStimulationYesNo->Lookup = new Lookup('IVFStimulationYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->IVFStimulationYesNo->OptionCount = 2;
		$this->fields['IVFStimulationYesNo'] = &$this->IVFStimulationYesNo;

		// OPUDate
		$this->OPUDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_OPUDate', 'OPUDate', '`OPUDate`', CastDateFieldForLike('`OPUDate`', 7, "DB"), 135, 7, FALSE, '`OPUDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPUDate->Sortable = TRUE; // Allow sort
		$this->OPUDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['OPUDate'] = &$this->OPUDate;

		// OPUYesNo
		$this->OPUYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_OPUYesNo', 'OPUYesNo', '`OPUYesNo`', '`OPUYesNo`', 200, -1, FALSE, '`OPUYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->OPUYesNo->Sortable = TRUE; // Allow sort
		$this->OPUYesNo->Lookup = new Lookup('OPUYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->OPUYesNo->OptionCount = 2;
		$this->fields['OPUYesNo'] = &$this->OPUYesNo;

		// ETDate
		$this->ETDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ETDate', 'ETDate', '`ETDate`', CastDateFieldForLike('`ETDate`', 7, "DB"), 135, 7, FALSE, '`ETDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ETDate->Sortable = TRUE; // Allow sort
		$this->ETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ETDate'] = &$this->ETDate;

		// ETYesNo
		$this->ETYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ETYesNo', 'ETYesNo', '`ETYesNo`', '`ETYesNo`', 200, -1, FALSE, '`ETYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->ETYesNo->Sortable = TRUE; // Allow sort
		$this->ETYesNo->Lookup = new Lookup('ETYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ETYesNo->OptionCount = 2;
		$this->fields['ETYesNo'] = &$this->ETYesNo;

		// BetaHCGDate
		$this->BetaHCGDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_BetaHCGDate', 'BetaHCGDate', '`BetaHCGDate`', CastDateFieldForLike('`BetaHCGDate`', 7, "DB"), 135, 7, FALSE, '`BetaHCGDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BetaHCGDate->Sortable = TRUE; // Allow sort
		$this->BetaHCGDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['BetaHCGDate'] = &$this->BetaHCGDate;

		// BetaHCGYesNo
		$this->BetaHCGYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_BetaHCGYesNo', 'BetaHCGYesNo', '`BetaHCGYesNo`', '`BetaHCGYesNo`', 200, -1, FALSE, '`BetaHCGYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->BetaHCGYesNo->Sortable = TRUE; // Allow sort
		$this->BetaHCGYesNo->Lookup = new Lookup('BetaHCGYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->BetaHCGYesNo->OptionCount = 2;
		$this->fields['BetaHCGYesNo'] = &$this->BetaHCGYesNo;

		// FETDate
		$this->FETDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FETDate', 'FETDate', '`FETDate`', CastDateFieldForLike('`FETDate`', 7, "DB"), 135, 7, FALSE, '`FETDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FETDate->Sortable = TRUE; // Allow sort
		$this->FETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['FETDate'] = &$this->FETDate;

		// FETYesNo
		$this->FETYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FETYesNo', 'FETYesNo', '`FETYesNo`', '`FETYesNo`', 200, -1, FALSE, '`FETYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->FETYesNo->Sortable = TRUE; // Allow sort
		$this->FETYesNo->Lookup = new Lookup('FETYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FETYesNo->OptionCount = 2;
		$this->fields['FETYesNo'] = &$this->FETYesNo;

		// FBetaHCGDate
		$this->FBetaHCGDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FBetaHCGDate', 'FBetaHCGDate', '`FBetaHCGDate`', CastDateFieldForLike('`FBetaHCGDate`', 7, "DB"), 135, 7, FALSE, '`FBetaHCGDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FBetaHCGDate->Sortable = TRUE; // Allow sort
		$this->FBetaHCGDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['FBetaHCGDate'] = &$this->FBetaHCGDate;

		// FBetaHCGYesNo
		$this->FBetaHCGYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FBetaHCGYesNo', 'FBetaHCGYesNo', '`FBetaHCGYesNo`', '`FBetaHCGYesNo`', 200, -1, FALSE, '`FBetaHCGYesNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->FBetaHCGYesNo->Sortable = TRUE; // Allow sort
		$this->FBetaHCGYesNo->Lookup = new Lookup('FBetaHCGYesNo', 'monitor_treatment_plan', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FBetaHCGYesNo->OptionCount = 2;
		$this->fields['FBetaHCGYesNo'] = &$this->FBetaHCGYesNo;

		// createdby
		$this->createdby = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// HospID
		$this->HospID = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`monitor_treatment_plan`";
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
		$this->PatId->DbValue = $row['PatId'];
		$this->PatientId->DbValue = $row['PatientId'];
		$this->PatientName->DbValue = $row['PatientName'];
		$this->Age->DbValue = $row['Age'];
		$this->MobileNo->DbValue = $row['MobileNo'];
		$this->ConsultantName->DbValue = $row['ConsultantName'];
		$this->RefDrName->DbValue = $row['RefDrName'];
		$this->RefDrMobileNo->DbValue = $row['RefDrMobileNo'];
		$this->NewVisitDate->DbValue = $row['NewVisitDate'];
		$this->NewVisitYesNo->DbValue = $row['NewVisitYesNo'];
		$this->Treatment->DbValue = $row['Treatment'];
		$this->IUIDoneDate1->DbValue = $row['IUIDoneDate1'];
		$this->IUIDoneYesNo1->DbValue = $row['IUIDoneYesNo1'];
		$this->UPTTestDate1->DbValue = $row['UPTTestDate1'];
		$this->UPTTestYesNo1->DbValue = $row['UPTTestYesNo1'];
		$this->IUIDoneDate2->DbValue = $row['IUIDoneDate2'];
		$this->IUIDoneYesNo2->DbValue = $row['IUIDoneYesNo2'];
		$this->UPTTestDate2->DbValue = $row['UPTTestDate2'];
		$this->UPTTestYesNo2->DbValue = $row['UPTTestYesNo2'];
		$this->IUIDoneDate3->DbValue = $row['IUIDoneDate3'];
		$this->IUIDoneYesNo3->DbValue = $row['IUIDoneYesNo3'];
		$this->UPTTestDate3->DbValue = $row['UPTTestDate3'];
		$this->UPTTestYesNo3->DbValue = $row['UPTTestYesNo3'];
		$this->IUIDoneDate4->DbValue = $row['IUIDoneDate4'];
		$this->IUIDoneYesNo4->DbValue = $row['IUIDoneYesNo4'];
		$this->UPTTestDate4->DbValue = $row['UPTTestDate4'];
		$this->UPTTestYesNo4->DbValue = $row['UPTTestYesNo4'];
		$this->IVFStimulationDate->DbValue = $row['IVFStimulationDate'];
		$this->IVFStimulationYesNo->DbValue = $row['IVFStimulationYesNo'];
		$this->OPUDate->DbValue = $row['OPUDate'];
		$this->OPUYesNo->DbValue = $row['OPUYesNo'];
		$this->ETDate->DbValue = $row['ETDate'];
		$this->ETYesNo->DbValue = $row['ETYesNo'];
		$this->BetaHCGDate->DbValue = $row['BetaHCGDate'];
		$this->BetaHCGYesNo->DbValue = $row['BetaHCGYesNo'];
		$this->FETDate->DbValue = $row['FETDate'];
		$this->FETYesNo->DbValue = $row['FETYesNo'];
		$this->FBetaHCGDate->DbValue = $row['FBetaHCGDate'];
		$this->FBetaHCGYesNo->DbValue = $row['FBetaHCGYesNo'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
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
			return "monitor_treatment_planlist.php";
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
		if ($pageName == "monitor_treatment_planview.php")
			return $Language->phrase("View");
		elseif ($pageName == "monitor_treatment_planedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "monitor_treatment_planadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "monitor_treatment_planlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("monitor_treatment_planview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("monitor_treatment_planview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "monitor_treatment_planadd.php?" . $this->getUrlParm($parm);
		else
			$url = "monitor_treatment_planadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("monitor_treatment_planedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("monitor_treatment_planadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("monitor_treatment_plandelete.php", $this->getUrlParm());
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
		$this->PatId->setDbValue($rs->fields('PatId'));
		$this->PatientId->setDbValue($rs->fields('PatientId'));
		$this->PatientName->setDbValue($rs->fields('PatientName'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->MobileNo->setDbValue($rs->fields('MobileNo'));
		$this->ConsultantName->setDbValue($rs->fields('ConsultantName'));
		$this->RefDrName->setDbValue($rs->fields('RefDrName'));
		$this->RefDrMobileNo->setDbValue($rs->fields('RefDrMobileNo'));
		$this->NewVisitDate->setDbValue($rs->fields('NewVisitDate'));
		$this->NewVisitYesNo->setDbValue($rs->fields('NewVisitYesNo'));
		$this->Treatment->setDbValue($rs->fields('Treatment'));
		$this->IUIDoneDate1->setDbValue($rs->fields('IUIDoneDate1'));
		$this->IUIDoneYesNo1->setDbValue($rs->fields('IUIDoneYesNo1'));
		$this->UPTTestDate1->setDbValue($rs->fields('UPTTestDate1'));
		$this->UPTTestYesNo1->setDbValue($rs->fields('UPTTestYesNo1'));
		$this->IUIDoneDate2->setDbValue($rs->fields('IUIDoneDate2'));
		$this->IUIDoneYesNo2->setDbValue($rs->fields('IUIDoneYesNo2'));
		$this->UPTTestDate2->setDbValue($rs->fields('UPTTestDate2'));
		$this->UPTTestYesNo2->setDbValue($rs->fields('UPTTestYesNo2'));
		$this->IUIDoneDate3->setDbValue($rs->fields('IUIDoneDate3'));
		$this->IUIDoneYesNo3->setDbValue($rs->fields('IUIDoneYesNo3'));
		$this->UPTTestDate3->setDbValue($rs->fields('UPTTestDate3'));
		$this->UPTTestYesNo3->setDbValue($rs->fields('UPTTestYesNo3'));
		$this->IUIDoneDate4->setDbValue($rs->fields('IUIDoneDate4'));
		$this->IUIDoneYesNo4->setDbValue($rs->fields('IUIDoneYesNo4'));
		$this->UPTTestDate4->setDbValue($rs->fields('UPTTestDate4'));
		$this->UPTTestYesNo4->setDbValue($rs->fields('UPTTestYesNo4'));
		$this->IVFStimulationDate->setDbValue($rs->fields('IVFStimulationDate'));
		$this->IVFStimulationYesNo->setDbValue($rs->fields('IVFStimulationYesNo'));
		$this->OPUDate->setDbValue($rs->fields('OPUDate'));
		$this->OPUYesNo->setDbValue($rs->fields('OPUYesNo'));
		$this->ETDate->setDbValue($rs->fields('ETDate'));
		$this->ETYesNo->setDbValue($rs->fields('ETYesNo'));
		$this->BetaHCGDate->setDbValue($rs->fields('BetaHCGDate'));
		$this->BetaHCGYesNo->setDbValue($rs->fields('BetaHCGYesNo'));
		$this->FETDate->setDbValue($rs->fields('FETDate'));
		$this->FETYesNo->setDbValue($rs->fields('FETYesNo'));
		$this->FBetaHCGDate->setDbValue($rs->fields('FBetaHCGDate'));
		$this->FBetaHCGYesNo->setDbValue($rs->fields('FBetaHCGYesNo'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
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
		// PatId
		// PatientId
		// PatientName
		// Age
		// MobileNo
		// ConsultantName
		// RefDrName
		// RefDrMobileNo
		// NewVisitDate
		// NewVisitYesNo
		// Treatment
		// IUIDoneDate1
		// IUIDoneYesNo1
		// UPTTestDate1
		// UPTTestYesNo1
		// IUIDoneDate2
		// IUIDoneYesNo2
		// UPTTestDate2
		// UPTTestYesNo2
		// IUIDoneDate3
		// IUIDoneYesNo3
		// UPTTestDate3
		// UPTTestYesNo3
		// IUIDoneDate4
		// IUIDoneYesNo4
		// UPTTestDate4
		// UPTTestYesNo4
		// IVFStimulationDate
		// IVFStimulationYesNo
		// OPUDate
		// OPUYesNo
		// ETDate
		// ETYesNo
		// BetaHCGDate
		// BetaHCGYesNo
		// FETDate
		// FETYesNo
		// FBetaHCGDate
		// FBetaHCGYesNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// PatId
		$curVal = strval($this->PatId->CurrentValue);
		if ($curVal <> "") {
			$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
			if ($this->PatId->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->PatId->ViewValue = $this->PatId->CurrentValue;
				}
			}
		} else {
			$this->PatId->ViewValue = NULL;
		}
		$this->PatId->ViewCustomAttributes = "";

		// PatientId
		$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
		$this->PatientId->ViewCustomAttributes = "";

		// PatientName
		$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
		$this->PatientName->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// MobileNo
		$this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
		$this->MobileNo->ViewCustomAttributes = "";

		// ConsultantName
		$this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
		$this->ConsultantName->ViewCustomAttributes = "";

		// RefDrName
		$this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
		$this->RefDrName->ViewCustomAttributes = "";

		// RefDrMobileNo
		$this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
		$this->RefDrMobileNo->ViewCustomAttributes = "";

		// NewVisitDate
		$this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
		$this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
		$this->NewVisitDate->ViewCustomAttributes = "";

		// NewVisitYesNo
		if (strval($this->NewVisitYesNo->CurrentValue) <> "") {
			$this->NewVisitYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->NewVisitYesNo->ViewValue = NULL;
		}
		$this->NewVisitYesNo->ViewCustomAttributes = "";

		// Treatment
		if (strval($this->Treatment->CurrentValue) <> "") {
			$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
		} else {
			$this->Treatment->ViewValue = NULL;
		}
		$this->Treatment->ViewCustomAttributes = "";

		// IUIDoneDate1
		$this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
		$this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
		$this->IUIDoneDate1->ViewCustomAttributes = "";

		// IUIDoneYesNo1
		if (strval($this->IUIDoneYesNo1->CurrentValue) <> "") {
			$this->IUIDoneYesNo1->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->IUIDoneYesNo1->ViewValue = NULL;
		}
		$this->IUIDoneYesNo1->ViewCustomAttributes = "";

		// UPTTestDate1
		$this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
		$this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
		$this->UPTTestDate1->ViewCustomAttributes = "";

		// UPTTestYesNo1
		if (strval($this->UPTTestYesNo1->CurrentValue) <> "") {
			$this->UPTTestYesNo1->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->UPTTestYesNo1->ViewValue = NULL;
		}
		$this->UPTTestYesNo1->ViewCustomAttributes = "";

		// IUIDoneDate2
		$this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
		$this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
		$this->IUIDoneDate2->ViewCustomAttributes = "";

		// IUIDoneYesNo2
		if (strval($this->IUIDoneYesNo2->CurrentValue) <> "") {
			$this->IUIDoneYesNo2->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->IUIDoneYesNo2->ViewValue = NULL;
		}
		$this->IUIDoneYesNo2->ViewCustomAttributes = "";

		// UPTTestDate2
		$this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
		$this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
		$this->UPTTestDate2->ViewCustomAttributes = "";

		// UPTTestYesNo2
		if (strval($this->UPTTestYesNo2->CurrentValue) <> "") {
			$this->UPTTestYesNo2->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->UPTTestYesNo2->ViewValue = NULL;
		}
		$this->UPTTestYesNo2->ViewCustomAttributes = "";

		// IUIDoneDate3
		$this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
		$this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
		$this->IUIDoneDate3->ViewCustomAttributes = "";

		// IUIDoneYesNo3
		if (strval($this->IUIDoneYesNo3->CurrentValue) <> "") {
			$this->IUIDoneYesNo3->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->IUIDoneYesNo3->ViewValue = NULL;
		}
		$this->IUIDoneYesNo3->ViewCustomAttributes = "";

		// UPTTestDate3
		$this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
		$this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
		$this->UPTTestDate3->ViewCustomAttributes = "";

		// UPTTestYesNo3
		if (strval($this->UPTTestYesNo3->CurrentValue) <> "") {
			$this->UPTTestYesNo3->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->UPTTestYesNo3->ViewValue = NULL;
		}
		$this->UPTTestYesNo3->ViewCustomAttributes = "";

		// IUIDoneDate4
		$this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
		$this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
		$this->IUIDoneDate4->ViewCustomAttributes = "";

		// IUIDoneYesNo4
		if (strval($this->IUIDoneYesNo4->CurrentValue) <> "") {
			$this->IUIDoneYesNo4->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->IUIDoneYesNo4->ViewValue = NULL;
		}
		$this->IUIDoneYesNo4->ViewCustomAttributes = "";

		// UPTTestDate4
		$this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
		$this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
		$this->UPTTestDate4->ViewCustomAttributes = "";

		// UPTTestYesNo4
		if (strval($this->UPTTestYesNo4->CurrentValue) <> "") {
			$this->UPTTestYesNo4->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->UPTTestYesNo4->ViewValue = NULL;
		}
		$this->UPTTestYesNo4->ViewCustomAttributes = "";

		// IVFStimulationDate
		$this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
		$this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
		$this->IVFStimulationDate->ViewCustomAttributes = "";

		// IVFStimulationYesNo
		if (strval($this->IVFStimulationYesNo->CurrentValue) <> "") {
			$this->IVFStimulationYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->IVFStimulationYesNo->ViewValue = NULL;
		}
		$this->IVFStimulationYesNo->ViewCustomAttributes = "";

		// OPUDate
		$this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
		$this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
		$this->OPUDate->ViewCustomAttributes = "";

		// OPUYesNo
		if (strval($this->OPUYesNo->CurrentValue) <> "") {
			$this->OPUYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->OPUYesNo->ViewValue = NULL;
		}
		$this->OPUYesNo->ViewCustomAttributes = "";

		// ETDate
		$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
		$this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
		$this->ETDate->ViewCustomAttributes = "";

		// ETYesNo
		if (strval($this->ETYesNo->CurrentValue) <> "") {
			$this->ETYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->ETYesNo->ViewValue = NULL;
		}
		$this->ETYesNo->ViewCustomAttributes = "";

		// BetaHCGDate
		$this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
		$this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
		$this->BetaHCGDate->ViewCustomAttributes = "";

		// BetaHCGYesNo
		if (strval($this->BetaHCGYesNo->CurrentValue) <> "") {
			$this->BetaHCGYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->BetaHCGYesNo->ViewValue = NULL;
		}
		$this->BetaHCGYesNo->ViewCustomAttributes = "";

		// FETDate
		$this->FETDate->ViewValue = $this->FETDate->CurrentValue;
		$this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
		$this->FETDate->ViewCustomAttributes = "";

		// FETYesNo
		if (strval($this->FETYesNo->CurrentValue) <> "") {
			$this->FETYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->FETYesNo->ViewValue = NULL;
		}
		$this->FETYesNo->ViewCustomAttributes = "";

		// FBetaHCGDate
		$this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
		$this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
		$this->FBetaHCGDate->ViewCustomAttributes = "";

		// FBetaHCGYesNo
		if (strval($this->FBetaHCGYesNo->CurrentValue) <> "") {
			$this->FBetaHCGYesNo->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->FBetaHCGYesNo->ViewValue = NULL;
		}
		$this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

		// HospID
		$this->HospID->ViewValue = $this->HospID->CurrentValue;
		$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
		$this->HospID->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// PatId
		$this->PatId->LinkCustomAttributes = "";
		$this->PatId->HrefValue = "";
		$this->PatId->TooltipValue = "";

		// PatientId
		$this->PatientId->LinkCustomAttributes = "";
		$this->PatientId->HrefValue = "";
		$this->PatientId->TooltipValue = "";

		// PatientName
		$this->PatientName->LinkCustomAttributes = "";
		$this->PatientName->HrefValue = "";
		$this->PatientName->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// MobileNo
		$this->MobileNo->LinkCustomAttributes = "";
		$this->MobileNo->HrefValue = "";
		$this->MobileNo->TooltipValue = "";

		// ConsultantName
		$this->ConsultantName->LinkCustomAttributes = "";
		$this->ConsultantName->HrefValue = "";
		$this->ConsultantName->TooltipValue = "";

		// RefDrName
		$this->RefDrName->LinkCustomAttributes = "";
		$this->RefDrName->HrefValue = "";
		$this->RefDrName->TooltipValue = "";

		// RefDrMobileNo
		$this->RefDrMobileNo->LinkCustomAttributes = "";
		$this->RefDrMobileNo->HrefValue = "";
		$this->RefDrMobileNo->TooltipValue = "";

		// NewVisitDate
		$this->NewVisitDate->LinkCustomAttributes = "";
		$this->NewVisitDate->HrefValue = "";
		$this->NewVisitDate->TooltipValue = "";

		// NewVisitYesNo
		$this->NewVisitYesNo->LinkCustomAttributes = "";
		$this->NewVisitYesNo->HrefValue = "";
		$this->NewVisitYesNo->TooltipValue = "";

		// Treatment
		$this->Treatment->LinkCustomAttributes = "";
		$this->Treatment->HrefValue = "";
		$this->Treatment->TooltipValue = "";

		// IUIDoneDate1
		$this->IUIDoneDate1->LinkCustomAttributes = "";
		$this->IUIDoneDate1->HrefValue = "";
		$this->IUIDoneDate1->TooltipValue = "";

		// IUIDoneYesNo1
		$this->IUIDoneYesNo1->LinkCustomAttributes = "";
		$this->IUIDoneYesNo1->HrefValue = "";
		$this->IUIDoneYesNo1->TooltipValue = "";

		// UPTTestDate1
		$this->UPTTestDate1->LinkCustomAttributes = "";
		$this->UPTTestDate1->HrefValue = "";
		$this->UPTTestDate1->TooltipValue = "";

		// UPTTestYesNo1
		$this->UPTTestYesNo1->LinkCustomAttributes = "";
		$this->UPTTestYesNo1->HrefValue = "";
		$this->UPTTestYesNo1->TooltipValue = "";

		// IUIDoneDate2
		$this->IUIDoneDate2->LinkCustomAttributes = "";
		$this->IUIDoneDate2->HrefValue = "";
		$this->IUIDoneDate2->TooltipValue = "";

		// IUIDoneYesNo2
		$this->IUIDoneYesNo2->LinkCustomAttributes = "";
		$this->IUIDoneYesNo2->HrefValue = "";
		$this->IUIDoneYesNo2->TooltipValue = "";

		// UPTTestDate2
		$this->UPTTestDate2->LinkCustomAttributes = "";
		$this->UPTTestDate2->HrefValue = "";
		$this->UPTTestDate2->TooltipValue = "";

		// UPTTestYesNo2
		$this->UPTTestYesNo2->LinkCustomAttributes = "";
		$this->UPTTestYesNo2->HrefValue = "";
		$this->UPTTestYesNo2->TooltipValue = "";

		// IUIDoneDate3
		$this->IUIDoneDate3->LinkCustomAttributes = "";
		$this->IUIDoneDate3->HrefValue = "";
		$this->IUIDoneDate3->TooltipValue = "";

		// IUIDoneYesNo3
		$this->IUIDoneYesNo3->LinkCustomAttributes = "";
		$this->IUIDoneYesNo3->HrefValue = "";
		$this->IUIDoneYesNo3->TooltipValue = "";

		// UPTTestDate3
		$this->UPTTestDate3->LinkCustomAttributes = "";
		$this->UPTTestDate3->HrefValue = "";
		$this->UPTTestDate3->TooltipValue = "";

		// UPTTestYesNo3
		$this->UPTTestYesNo3->LinkCustomAttributes = "";
		$this->UPTTestYesNo3->HrefValue = "";
		$this->UPTTestYesNo3->TooltipValue = "";

		// IUIDoneDate4
		$this->IUIDoneDate4->LinkCustomAttributes = "";
		$this->IUIDoneDate4->HrefValue = "";
		$this->IUIDoneDate4->TooltipValue = "";

		// IUIDoneYesNo4
		$this->IUIDoneYesNo4->LinkCustomAttributes = "";
		$this->IUIDoneYesNo4->HrefValue = "";
		$this->IUIDoneYesNo4->TooltipValue = "";

		// UPTTestDate4
		$this->UPTTestDate4->LinkCustomAttributes = "";
		$this->UPTTestDate4->HrefValue = "";
		$this->UPTTestDate4->TooltipValue = "";

		// UPTTestYesNo4
		$this->UPTTestYesNo4->LinkCustomAttributes = "";
		$this->UPTTestYesNo4->HrefValue = "";
		$this->UPTTestYesNo4->TooltipValue = "";

		// IVFStimulationDate
		$this->IVFStimulationDate->LinkCustomAttributes = "";
		$this->IVFStimulationDate->HrefValue = "";
		$this->IVFStimulationDate->TooltipValue = "";

		// IVFStimulationYesNo
		$this->IVFStimulationYesNo->LinkCustomAttributes = "";
		$this->IVFStimulationYesNo->HrefValue = "";
		$this->IVFStimulationYesNo->TooltipValue = "";

		// OPUDate
		$this->OPUDate->LinkCustomAttributes = "";
		$this->OPUDate->HrefValue = "";
		$this->OPUDate->TooltipValue = "";

		// OPUYesNo
		$this->OPUYesNo->LinkCustomAttributes = "";
		$this->OPUYesNo->HrefValue = "";
		$this->OPUYesNo->TooltipValue = "";

		// ETDate
		$this->ETDate->LinkCustomAttributes = "";
		$this->ETDate->HrefValue = "";
		$this->ETDate->TooltipValue = "";

		// ETYesNo
		$this->ETYesNo->LinkCustomAttributes = "";
		$this->ETYesNo->HrefValue = "";
		$this->ETYesNo->TooltipValue = "";

		// BetaHCGDate
		$this->BetaHCGDate->LinkCustomAttributes = "";
		$this->BetaHCGDate->HrefValue = "";
		$this->BetaHCGDate->TooltipValue = "";

		// BetaHCGYesNo
		$this->BetaHCGYesNo->LinkCustomAttributes = "";
		$this->BetaHCGYesNo->HrefValue = "";
		$this->BetaHCGYesNo->TooltipValue = "";

		// FETDate
		$this->FETDate->LinkCustomAttributes = "";
		$this->FETDate->HrefValue = "";
		$this->FETDate->TooltipValue = "";

		// FETYesNo
		$this->FETYesNo->LinkCustomAttributes = "";
		$this->FETYesNo->HrefValue = "";
		$this->FETYesNo->TooltipValue = "";

		// FBetaHCGDate
		$this->FBetaHCGDate->LinkCustomAttributes = "";
		$this->FBetaHCGDate->HrefValue = "";
		$this->FBetaHCGDate->TooltipValue = "";

		// FBetaHCGYesNo
		$this->FBetaHCGYesNo->LinkCustomAttributes = "";
		$this->FBetaHCGYesNo->HrefValue = "";
		$this->FBetaHCGYesNo->TooltipValue = "";

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

		// PatId
		$this->PatId->EditAttrs["class"] = "form-control";
		$this->PatId->EditCustomAttributes = "";

		// PatientId
		$this->PatientId->EditAttrs["class"] = "form-control";
		$this->PatientId->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
		$this->PatientId->EditValue = $this->PatientId->CurrentValue;
		$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

		// PatientName
		$this->PatientName->EditAttrs["class"] = "form-control";
		$this->PatientName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
		$this->PatientName->EditValue = $this->PatientName->CurrentValue;
		$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// MobileNo
		$this->MobileNo->EditAttrs["class"] = "form-control";
		$this->MobileNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MobileNo->CurrentValue = HtmlDecode($this->MobileNo->CurrentValue);
		$this->MobileNo->EditValue = $this->MobileNo->CurrentValue;
		$this->MobileNo->PlaceHolder = RemoveHtml($this->MobileNo->caption());

		// ConsultantName
		$this->ConsultantName->EditAttrs["class"] = "form-control";
		$this->ConsultantName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ConsultantName->CurrentValue = HtmlDecode($this->ConsultantName->CurrentValue);
		$this->ConsultantName->EditValue = $this->ConsultantName->CurrentValue;
		$this->ConsultantName->PlaceHolder = RemoveHtml($this->ConsultantName->caption());

		// RefDrName
		$this->RefDrName->EditAttrs["class"] = "form-control";
		$this->RefDrName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefDrName->CurrentValue = HtmlDecode($this->RefDrName->CurrentValue);
		$this->RefDrName->EditValue = $this->RefDrName->CurrentValue;
		$this->RefDrName->PlaceHolder = RemoveHtml($this->RefDrName->caption());

		// RefDrMobileNo
		$this->RefDrMobileNo->EditAttrs["class"] = "form-control";
		$this->RefDrMobileNo->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RefDrMobileNo->CurrentValue = HtmlDecode($this->RefDrMobileNo->CurrentValue);
		$this->RefDrMobileNo->EditValue = $this->RefDrMobileNo->CurrentValue;
		$this->RefDrMobileNo->PlaceHolder = RemoveHtml($this->RefDrMobileNo->caption());

		// NewVisitDate
		$this->NewVisitDate->EditAttrs["class"] = "form-control";
		$this->NewVisitDate->EditCustomAttributes = "";
		$this->NewVisitDate->EditValue = FormatDateTime($this->NewVisitDate->CurrentValue, 7);
		$this->NewVisitDate->PlaceHolder = RemoveHtml($this->NewVisitDate->caption());

		// NewVisitYesNo
		$this->NewVisitYesNo->EditCustomAttributes = "";
		$this->NewVisitYesNo->EditValue = $this->NewVisitYesNo->options(FALSE);

		// Treatment
		$this->Treatment->EditAttrs["class"] = "form-control";
		$this->Treatment->EditCustomAttributes = "";
		$this->Treatment->EditValue = $this->Treatment->options(TRUE);

		// IUIDoneDate1
		$this->IUIDoneDate1->EditAttrs["class"] = "form-control";
		$this->IUIDoneDate1->EditCustomAttributes = "";
		$this->IUIDoneDate1->EditValue = FormatDateTime($this->IUIDoneDate1->CurrentValue, 7);
		$this->IUIDoneDate1->PlaceHolder = RemoveHtml($this->IUIDoneDate1->caption());

		// IUIDoneYesNo1
		$this->IUIDoneYesNo1->EditCustomAttributes = "";
		$this->IUIDoneYesNo1->EditValue = $this->IUIDoneYesNo1->options(FALSE);

		// UPTTestDate1
		$this->UPTTestDate1->EditAttrs["class"] = "form-control";
		$this->UPTTestDate1->EditCustomAttributes = "";
		$this->UPTTestDate1->EditValue = FormatDateTime($this->UPTTestDate1->CurrentValue, 7);
		$this->UPTTestDate1->PlaceHolder = RemoveHtml($this->UPTTestDate1->caption());

		// UPTTestYesNo1
		$this->UPTTestYesNo1->EditCustomAttributes = "";
		$this->UPTTestYesNo1->EditValue = $this->UPTTestYesNo1->options(FALSE);

		// IUIDoneDate2
		$this->IUIDoneDate2->EditAttrs["class"] = "form-control";
		$this->IUIDoneDate2->EditCustomAttributes = "";
		$this->IUIDoneDate2->EditValue = FormatDateTime($this->IUIDoneDate2->CurrentValue, 7);
		$this->IUIDoneDate2->PlaceHolder = RemoveHtml($this->IUIDoneDate2->caption());

		// IUIDoneYesNo2
		$this->IUIDoneYesNo2->EditCustomAttributes = "";
		$this->IUIDoneYesNo2->EditValue = $this->IUIDoneYesNo2->options(FALSE);

		// UPTTestDate2
		$this->UPTTestDate2->EditAttrs["class"] = "form-control";
		$this->UPTTestDate2->EditCustomAttributes = "";
		$this->UPTTestDate2->EditValue = FormatDateTime($this->UPTTestDate2->CurrentValue, 7);
		$this->UPTTestDate2->PlaceHolder = RemoveHtml($this->UPTTestDate2->caption());

		// UPTTestYesNo2
		$this->UPTTestYesNo2->EditCustomAttributes = "";
		$this->UPTTestYesNo2->EditValue = $this->UPTTestYesNo2->options(FALSE);

		// IUIDoneDate3
		$this->IUIDoneDate3->EditAttrs["class"] = "form-control";
		$this->IUIDoneDate3->EditCustomAttributes = "";
		$this->IUIDoneDate3->EditValue = FormatDateTime($this->IUIDoneDate3->CurrentValue, 7);
		$this->IUIDoneDate3->PlaceHolder = RemoveHtml($this->IUIDoneDate3->caption());

		// IUIDoneYesNo3
		$this->IUIDoneYesNo3->EditCustomAttributes = "";
		$this->IUIDoneYesNo3->EditValue = $this->IUIDoneYesNo3->options(FALSE);

		// UPTTestDate3
		$this->UPTTestDate3->EditAttrs["class"] = "form-control";
		$this->UPTTestDate3->EditCustomAttributes = "";
		$this->UPTTestDate3->EditValue = FormatDateTime($this->UPTTestDate3->CurrentValue, 7);
		$this->UPTTestDate3->PlaceHolder = RemoveHtml($this->UPTTestDate3->caption());

		// UPTTestYesNo3
		$this->UPTTestYesNo3->EditCustomAttributes = "";
		$this->UPTTestYesNo3->EditValue = $this->UPTTestYesNo3->options(FALSE);

		// IUIDoneDate4
		$this->IUIDoneDate4->EditAttrs["class"] = "form-control";
		$this->IUIDoneDate4->EditCustomAttributes = "";
		$this->IUIDoneDate4->EditValue = FormatDateTime($this->IUIDoneDate4->CurrentValue, 7);
		$this->IUIDoneDate4->PlaceHolder = RemoveHtml($this->IUIDoneDate4->caption());

		// IUIDoneYesNo4
		$this->IUIDoneYesNo4->EditCustomAttributes = "";
		$this->IUIDoneYesNo4->EditValue = $this->IUIDoneYesNo4->options(FALSE);

		// UPTTestDate4
		$this->UPTTestDate4->EditAttrs["class"] = "form-control";
		$this->UPTTestDate4->EditCustomAttributes = "";
		$this->UPTTestDate4->EditValue = FormatDateTime($this->UPTTestDate4->CurrentValue, 7);
		$this->UPTTestDate4->PlaceHolder = RemoveHtml($this->UPTTestDate4->caption());

		// UPTTestYesNo4
		$this->UPTTestYesNo4->EditCustomAttributes = "";
		$this->UPTTestYesNo4->EditValue = $this->UPTTestYesNo4->options(FALSE);

		// IVFStimulationDate
		$this->IVFStimulationDate->EditAttrs["class"] = "form-control";
		$this->IVFStimulationDate->EditCustomAttributes = "";
		$this->IVFStimulationDate->EditValue = FormatDateTime($this->IVFStimulationDate->CurrentValue, 7);
		$this->IVFStimulationDate->PlaceHolder = RemoveHtml($this->IVFStimulationDate->caption());

		// IVFStimulationYesNo
		$this->IVFStimulationYesNo->EditCustomAttributes = "";
		$this->IVFStimulationYesNo->EditValue = $this->IVFStimulationYesNo->options(FALSE);

		// OPUDate
		$this->OPUDate->EditAttrs["class"] = "form-control";
		$this->OPUDate->EditCustomAttributes = "";
		$this->OPUDate->EditValue = FormatDateTime($this->OPUDate->CurrentValue, 7);
		$this->OPUDate->PlaceHolder = RemoveHtml($this->OPUDate->caption());

		// OPUYesNo
		$this->OPUYesNo->EditCustomAttributes = "";
		$this->OPUYesNo->EditValue = $this->OPUYesNo->options(FALSE);

		// ETDate
		$this->ETDate->EditAttrs["class"] = "form-control";
		$this->ETDate->EditCustomAttributes = "";
		$this->ETDate->EditValue = FormatDateTime($this->ETDate->CurrentValue, 7);
		$this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

		// ETYesNo
		$this->ETYesNo->EditCustomAttributes = "";
		$this->ETYesNo->EditValue = $this->ETYesNo->options(FALSE);

		// BetaHCGDate
		$this->BetaHCGDate->EditAttrs["class"] = "form-control";
		$this->BetaHCGDate->EditCustomAttributes = "";
		$this->BetaHCGDate->EditValue = FormatDateTime($this->BetaHCGDate->CurrentValue, 7);
		$this->BetaHCGDate->PlaceHolder = RemoveHtml($this->BetaHCGDate->caption());

		// BetaHCGYesNo
		$this->BetaHCGYesNo->EditCustomAttributes = "";
		$this->BetaHCGYesNo->EditValue = $this->BetaHCGYesNo->options(FALSE);

		// FETDate
		$this->FETDate->EditAttrs["class"] = "form-control";
		$this->FETDate->EditCustomAttributes = "";
		$this->FETDate->EditValue = FormatDateTime($this->FETDate->CurrentValue, 7);
		$this->FETDate->PlaceHolder = RemoveHtml($this->FETDate->caption());

		// FETYesNo
		$this->FETYesNo->EditCustomAttributes = "";
		$this->FETYesNo->EditValue = $this->FETYesNo->options(FALSE);

		// FBetaHCGDate
		$this->FBetaHCGDate->EditAttrs["class"] = "form-control";
		$this->FBetaHCGDate->EditCustomAttributes = "";
		$this->FBetaHCGDate->EditValue = FormatDateTime($this->FBetaHCGDate->CurrentValue, 7);
		$this->FBetaHCGDate->PlaceHolder = RemoveHtml($this->FBetaHCGDate->caption());

		// FBetaHCGYesNo
		$this->FBetaHCGYesNo->EditCustomAttributes = "";
		$this->FBetaHCGYesNo->EditValue = $this->FBetaHCGYesNo->options(FALSE);

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
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
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->MobileNo);
					$doc->exportCaption($this->ConsultantName);
					$doc->exportCaption($this->RefDrName);
					$doc->exportCaption($this->RefDrMobileNo);
					$doc->exportCaption($this->NewVisitDate);
					$doc->exportCaption($this->NewVisitYesNo);
					$doc->exportCaption($this->Treatment);
					$doc->exportCaption($this->IUIDoneDate1);
					$doc->exportCaption($this->IUIDoneYesNo1);
					$doc->exportCaption($this->UPTTestDate1);
					$doc->exportCaption($this->UPTTestYesNo1);
					$doc->exportCaption($this->IUIDoneDate2);
					$doc->exportCaption($this->IUIDoneYesNo2);
					$doc->exportCaption($this->UPTTestDate2);
					$doc->exportCaption($this->UPTTestYesNo2);
					$doc->exportCaption($this->IUIDoneDate3);
					$doc->exportCaption($this->IUIDoneYesNo3);
					$doc->exportCaption($this->UPTTestDate3);
					$doc->exportCaption($this->UPTTestYesNo3);
					$doc->exportCaption($this->IUIDoneDate4);
					$doc->exportCaption($this->IUIDoneYesNo4);
					$doc->exportCaption($this->UPTTestDate4);
					$doc->exportCaption($this->UPTTestYesNo4);
					$doc->exportCaption($this->IVFStimulationDate);
					$doc->exportCaption($this->IVFStimulationYesNo);
					$doc->exportCaption($this->OPUDate);
					$doc->exportCaption($this->OPUYesNo);
					$doc->exportCaption($this->ETDate);
					$doc->exportCaption($this->ETYesNo);
					$doc->exportCaption($this->BetaHCGDate);
					$doc->exportCaption($this->BetaHCGYesNo);
					$doc->exportCaption($this->FETDate);
					$doc->exportCaption($this->FETYesNo);
					$doc->exportCaption($this->FBetaHCGDate);
					$doc->exportCaption($this->FBetaHCGYesNo);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->HospID);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->PatId);
					$doc->exportCaption($this->PatientId);
					$doc->exportCaption($this->PatientName);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->MobileNo);
					$doc->exportCaption($this->ConsultantName);
					$doc->exportCaption($this->RefDrName);
					$doc->exportCaption($this->RefDrMobileNo);
					$doc->exportCaption($this->NewVisitDate);
					$doc->exportCaption($this->NewVisitYesNo);
					$doc->exportCaption($this->Treatment);
					$doc->exportCaption($this->IUIDoneDate1);
					$doc->exportCaption($this->IUIDoneYesNo1);
					$doc->exportCaption($this->UPTTestDate1);
					$doc->exportCaption($this->UPTTestYesNo1);
					$doc->exportCaption($this->IUIDoneDate2);
					$doc->exportCaption($this->IUIDoneYesNo2);
					$doc->exportCaption($this->UPTTestDate2);
					$doc->exportCaption($this->UPTTestYesNo2);
					$doc->exportCaption($this->IUIDoneDate3);
					$doc->exportCaption($this->IUIDoneYesNo3);
					$doc->exportCaption($this->UPTTestDate3);
					$doc->exportCaption($this->UPTTestYesNo3);
					$doc->exportCaption($this->IUIDoneDate4);
					$doc->exportCaption($this->IUIDoneYesNo4);
					$doc->exportCaption($this->UPTTestDate4);
					$doc->exportCaption($this->UPTTestYesNo4);
					$doc->exportCaption($this->IVFStimulationDate);
					$doc->exportCaption($this->IVFStimulationYesNo);
					$doc->exportCaption($this->OPUDate);
					$doc->exportCaption($this->OPUYesNo);
					$doc->exportCaption($this->ETDate);
					$doc->exportCaption($this->ETYesNo);
					$doc->exportCaption($this->BetaHCGDate);
					$doc->exportCaption($this->BetaHCGYesNo);
					$doc->exportCaption($this->FETDate);
					$doc->exportCaption($this->FETYesNo);
					$doc->exportCaption($this->FBetaHCGDate);
					$doc->exportCaption($this->FBetaHCGYesNo);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
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
						$doc->exportField($this->PatId);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->MobileNo);
						$doc->exportField($this->ConsultantName);
						$doc->exportField($this->RefDrName);
						$doc->exportField($this->RefDrMobileNo);
						$doc->exportField($this->NewVisitDate);
						$doc->exportField($this->NewVisitYesNo);
						$doc->exportField($this->Treatment);
						$doc->exportField($this->IUIDoneDate1);
						$doc->exportField($this->IUIDoneYesNo1);
						$doc->exportField($this->UPTTestDate1);
						$doc->exportField($this->UPTTestYesNo1);
						$doc->exportField($this->IUIDoneDate2);
						$doc->exportField($this->IUIDoneYesNo2);
						$doc->exportField($this->UPTTestDate2);
						$doc->exportField($this->UPTTestYesNo2);
						$doc->exportField($this->IUIDoneDate3);
						$doc->exportField($this->IUIDoneYesNo3);
						$doc->exportField($this->UPTTestDate3);
						$doc->exportField($this->UPTTestYesNo3);
						$doc->exportField($this->IUIDoneDate4);
						$doc->exportField($this->IUIDoneYesNo4);
						$doc->exportField($this->UPTTestDate4);
						$doc->exportField($this->UPTTestYesNo4);
						$doc->exportField($this->IVFStimulationDate);
						$doc->exportField($this->IVFStimulationYesNo);
						$doc->exportField($this->OPUDate);
						$doc->exportField($this->OPUYesNo);
						$doc->exportField($this->ETDate);
						$doc->exportField($this->ETYesNo);
						$doc->exportField($this->BetaHCGDate);
						$doc->exportField($this->BetaHCGYesNo);
						$doc->exportField($this->FETDate);
						$doc->exportField($this->FETYesNo);
						$doc->exportField($this->FBetaHCGDate);
						$doc->exportField($this->FBetaHCGYesNo);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->HospID);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->PatId);
						$doc->exportField($this->PatientId);
						$doc->exportField($this->PatientName);
						$doc->exportField($this->Age);
						$doc->exportField($this->MobileNo);
						$doc->exportField($this->ConsultantName);
						$doc->exportField($this->RefDrName);
						$doc->exportField($this->RefDrMobileNo);
						$doc->exportField($this->NewVisitDate);
						$doc->exportField($this->NewVisitYesNo);
						$doc->exportField($this->Treatment);
						$doc->exportField($this->IUIDoneDate1);
						$doc->exportField($this->IUIDoneYesNo1);
						$doc->exportField($this->UPTTestDate1);
						$doc->exportField($this->UPTTestYesNo1);
						$doc->exportField($this->IUIDoneDate2);
						$doc->exportField($this->IUIDoneYesNo2);
						$doc->exportField($this->UPTTestDate2);
						$doc->exportField($this->UPTTestYesNo2);
						$doc->exportField($this->IUIDoneDate3);
						$doc->exportField($this->IUIDoneYesNo3);
						$doc->exportField($this->UPTTestDate3);
						$doc->exportField($this->UPTTestYesNo3);
						$doc->exportField($this->IUIDoneDate4);
						$doc->exportField($this->IUIDoneYesNo4);
						$doc->exportField($this->UPTTestDate4);
						$doc->exportField($this->UPTTestYesNo4);
						$doc->exportField($this->IVFStimulationDate);
						$doc->exportField($this->IVFStimulationYesNo);
						$doc->exportField($this->OPUDate);
						$doc->exportField($this->OPUYesNo);
						$doc->exportField($this->ETDate);
						$doc->exportField($this->ETYesNo);
						$doc->exportField($this->BetaHCGDate);
						$doc->exportField($this->BetaHCGYesNo);
						$doc->exportField($this->FETDate);
						$doc->exportField($this->FETYesNo);
						$doc->exportField($this->FBetaHCGDate);
						$doc->exportField($this->FBetaHCGYesNo);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
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