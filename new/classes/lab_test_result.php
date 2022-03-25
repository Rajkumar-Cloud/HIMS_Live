<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for lab_test_result
 */
class lab_test_result extends DbTable
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
	public $Branch;
	public $SidNo;
	public $SidDate;
	public $TestCd;
	public $TestSubCd;
	public $DEptCd;
	public $ProfCd;
	public $LabReport;
	public $ResultDate;
	public $Comments;
	public $Method;
	public $Specimen;
	public $Amount;
	public $ResultBy;
	public $AuthBy;
	public $AuthDate;
	public $Abnormal;
	public $Printed;
	public $Dispatch;
	public $LOWHIGH;
	public $RefValue;
	public $Unit;
	public $ResDate;
	public $Pic1;
	public $Pic2;
	public $GraphPath;
	public $SampleDate;
	public $SampleUser;
	public $ReceivedDate;
	public $ReceivedUser;
	public $DeptRecvDate;
	public $DeptRecvUser;
	public $PrintBy;
	public $PrintDate;
	public $MachineCD;
	public $TestCancel;
	public $OutSource;
	public $Tariff;
	public $EDITDATE;
	public $UPLOAD;
	public $SAuthDate;
	public $SAuthBy;
	public $NoRC;
	public $DispDt;
	public $DispUser;
	public $DispRemarks;
	public $DispMode;
	public $ProductCD;
	public $Nos;
	public $WBCPath;
	public $RBCPath;
	public $PTPath;
	public $ActualAmt;
	public $NoSign;
	public $_Barcode;
	public $ReadTime;
	public $Result;
	public $VailID;
	public $ReadMachine;
	public $LabCD;
	public $OutLabAmt;
	public $ProductQty;
	public $Repeat;
	public $DeptNo;
	public $Desc1;
	public $Desc2;
	public $RptResult;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'lab_test_result';
		$this->TableName = 'lab_test_result';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`lab_test_result`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// Branch
		$this->Branch = new DbField('lab_test_result', 'lab_test_result', 'x_Branch', 'Branch', '`Branch`', '`Branch`', 200, 4, -1, FALSE, '`Branch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Branch->Nullable = FALSE; // NOT NULL field
		$this->Branch->Required = TRUE; // Required field
		$this->Branch->Sortable = TRUE; // Allow sort
		$this->fields['Branch'] = &$this->Branch;

		// SidNo
		$this->SidNo = new DbField('lab_test_result', 'lab_test_result', 'x_SidNo', 'SidNo', '`SidNo`', '`SidNo`', 200, 6, -1, FALSE, '`SidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SidNo->Nullable = FALSE; // NOT NULL field
		$this->SidNo->Required = TRUE; // Required field
		$this->SidNo->Sortable = TRUE; // Allow sort
		$this->fields['SidNo'] = &$this->SidNo;

		// SidDate
		$this->SidDate = new DbField('lab_test_result', 'lab_test_result', 'x_SidDate', 'SidDate', '`SidDate`', CastDateFieldForLike("`SidDate`", 0, "DB"), 135, 23, 0, FALSE, '`SidDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SidDate->Sortable = TRUE; // Allow sort
		$this->SidDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SidDate'] = &$this->SidDate;

		// TestCd
		$this->TestCd = new DbField('lab_test_result', 'lab_test_result', 'x_TestCd', 'TestCd', '`TestCd`', '`TestCd`', 200, 6, -1, FALSE, '`TestCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestCd->Nullable = FALSE; // NOT NULL field
		$this->TestCd->Required = TRUE; // Required field
		$this->TestCd->Sortable = TRUE; // Allow sort
		$this->fields['TestCd'] = &$this->TestCd;

		// TestSubCd
		$this->TestSubCd = new DbField('lab_test_result', 'lab_test_result', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 3, -1, FALSE, '`TestSubCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestSubCd->Nullable = FALSE; // NOT NULL field
		$this->TestSubCd->Required = TRUE; // Required field
		$this->TestSubCd->Sortable = TRUE; // Allow sort
		$this->fields['TestSubCd'] = &$this->TestSubCd;

		// DEptCd
		$this->DEptCd = new DbField('lab_test_result', 'lab_test_result', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 2, -1, FALSE, '`DEptCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DEptCd->Nullable = FALSE; // NOT NULL field
		$this->DEptCd->Required = TRUE; // Required field
		$this->DEptCd->Sortable = TRUE; // Allow sort
		$this->fields['DEptCd'] = &$this->DEptCd;

		// ProfCd
		$this->ProfCd = new DbField('lab_test_result', 'lab_test_result', 'x_ProfCd', 'ProfCd', '`ProfCd`', '`ProfCd`', 200, 6, -1, FALSE, '`ProfCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProfCd->Nullable = FALSE; // NOT NULL field
		$this->ProfCd->Required = TRUE; // Required field
		$this->ProfCd->Sortable = TRUE; // Allow sort
		$this->fields['ProfCd'] = &$this->ProfCd;

		// LabReport
		$this->LabReport = new DbField('lab_test_result', 'lab_test_result', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 6000, -1, FALSE, '`LabReport`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->LabReport->Nullable = FALSE; // NOT NULL field
		$this->LabReport->Required = TRUE; // Required field
		$this->LabReport->Sortable = TRUE; // Allow sort
		$this->fields['LabReport'] = &$this->LabReport;

		// ResultDate
		$this->ResultDate = new DbField('lab_test_result', 'lab_test_result', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 23, 0, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// Comments
		$this->Comments = new DbField('lab_test_result', 'lab_test_result', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 201, 2000, -1, FALSE, '`Comments`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Comments->Nullable = FALSE; // NOT NULL field
		$this->Comments->Required = TRUE; // Required field
		$this->Comments->Sortable = TRUE; // Allow sort
		$this->fields['Comments'] = &$this->Comments;

		// Method
		$this->Method = new DbField('lab_test_result', 'lab_test_result', 'x_Method', 'Method', '`Method`', '`Method`', 200, 50, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Method->Nullable = FALSE; // NOT NULL field
		$this->Method->Required = TRUE; // Required field
		$this->Method->Sortable = TRUE; // Allow sort
		$this->fields['Method'] = &$this->Method;

		// Specimen
		$this->Specimen = new DbField('lab_test_result', 'lab_test_result', 'x_Specimen', 'Specimen', '`Specimen`', '`Specimen`', 200, 50, -1, FALSE, '`Specimen`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Specimen->Nullable = FALSE; // NOT NULL field
		$this->Specimen->Required = TRUE; // Required field
		$this->Specimen->Sortable = TRUE; // Allow sort
		$this->fields['Specimen'] = &$this->Specimen;

		// Amount
		$this->Amount = new DbField('lab_test_result', 'lab_test_result', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 9, -1, FALSE, '`Amount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Amount->Nullable = FALSE; // NOT NULL field
		$this->Amount->Required = TRUE; // Required field
		$this->Amount->Sortable = TRUE; // Allow sort
		$this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Amount'] = &$this->Amount;

		// ResultBy
		$this->ResultBy = new DbField('lab_test_result', 'lab_test_result', 'x_ResultBy', 'ResultBy', '`ResultBy`', '`ResultBy`', 200, 20, -1, FALSE, '`ResultBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultBy->Nullable = FALSE; // NOT NULL field
		$this->ResultBy->Required = TRUE; // Required field
		$this->ResultBy->Sortable = TRUE; // Allow sort
		$this->fields['ResultBy'] = &$this->ResultBy;

		// AuthBy
		$this->AuthBy = new DbField('lab_test_result', 'lab_test_result', 'x_AuthBy', 'AuthBy', '`AuthBy`', '`AuthBy`', 200, 20, -1, FALSE, '`AuthBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AuthBy->Nullable = FALSE; // NOT NULL field
		$this->AuthBy->Required = TRUE; // Required field
		$this->AuthBy->Sortable = TRUE; // Allow sort
		$this->fields['AuthBy'] = &$this->AuthBy;

		// AuthDate
		$this->AuthDate = new DbField('lab_test_result', 'lab_test_result', 'x_AuthDate', 'AuthDate', '`AuthDate`', CastDateFieldForLike("`AuthDate`", 0, "DB"), 135, 23, 0, FALSE, '`AuthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AuthDate->Sortable = TRUE; // Allow sort
		$this->AuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['AuthDate'] = &$this->AuthDate;

		// Abnormal
		$this->Abnormal = new DbField('lab_test_result', 'lab_test_result', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, 1, -1, FALSE, '`Abnormal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abnormal->Nullable = FALSE; // NOT NULL field
		$this->Abnormal->Required = TRUE; // Required field
		$this->Abnormal->Sortable = TRUE; // Allow sort
		$this->fields['Abnormal'] = &$this->Abnormal;

		// Printed
		$this->Printed = new DbField('lab_test_result', 'lab_test_result', 'x_Printed', 'Printed', '`Printed`', '`Printed`', 200, 1, -1, FALSE, '`Printed`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Printed->Nullable = FALSE; // NOT NULL field
		$this->Printed->Required = TRUE; // Required field
		$this->Printed->Sortable = TRUE; // Allow sort
		$this->fields['Printed'] = &$this->Printed;

		// Dispatch
		$this->Dispatch = new DbField('lab_test_result', 'lab_test_result', 'x_Dispatch', 'Dispatch', '`Dispatch`', '`Dispatch`', 200, 1, -1, FALSE, '`Dispatch`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Dispatch->Nullable = FALSE; // NOT NULL field
		$this->Dispatch->Required = TRUE; // Required field
		$this->Dispatch->Sortable = TRUE; // Allow sort
		$this->fields['Dispatch'] = &$this->Dispatch;

		// LOWHIGH
		$this->LOWHIGH = new DbField('lab_test_result', 'lab_test_result', 'x_LOWHIGH', 'LOWHIGH', '`LOWHIGH`', '`LOWHIGH`', 200, 1, -1, FALSE, '`LOWHIGH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOWHIGH->Nullable = FALSE; // NOT NULL field
		$this->LOWHIGH->Required = TRUE; // Required field
		$this->LOWHIGH->Sortable = TRUE; // Allow sort
		$this->fields['LOWHIGH'] = &$this->LOWHIGH;

		// RefValue
		$this->RefValue = new DbField('lab_test_result', 'lab_test_result', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 1000, -1, FALSE, '`RefValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RefValue->Nullable = FALSE; // NOT NULL field
		$this->RefValue->Required = TRUE; // Required field
		$this->RefValue->Sortable = TRUE; // Allow sort
		$this->fields['RefValue'] = &$this->RefValue;

		// Unit
		$this->Unit = new DbField('lab_test_result', 'lab_test_result', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, 20, -1, FALSE, '`Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Unit->Nullable = FALSE; // NOT NULL field
		$this->Unit->Required = TRUE; // Required field
		$this->Unit->Sortable = TRUE; // Allow sort
		$this->fields['Unit'] = &$this->Unit;

		// ResDate
		$this->ResDate = new DbField('lab_test_result', 'lab_test_result', 'x_ResDate', 'ResDate', '`ResDate`', CastDateFieldForLike("`ResDate`", 0, "DB"), 135, 23, 0, FALSE, '`ResDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResDate->Sortable = TRUE; // Allow sort
		$this->ResDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ResDate'] = &$this->ResDate;

		// Pic1
		$this->Pic1 = new DbField('lab_test_result', 'lab_test_result', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 200, -1, FALSE, '`Pic1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic1->Nullable = FALSE; // NOT NULL field
		$this->Pic1->Required = TRUE; // Required field
		$this->Pic1->Sortable = TRUE; // Allow sort
		$this->fields['Pic1'] = &$this->Pic1;

		// Pic2
		$this->Pic2 = new DbField('lab_test_result', 'lab_test_result', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 200, -1, FALSE, '`Pic2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pic2->Nullable = FALSE; // NOT NULL field
		$this->Pic2->Required = TRUE; // Required field
		$this->Pic2->Sortable = TRUE; // Allow sort
		$this->fields['Pic2'] = &$this->Pic2;

		// GraphPath
		$this->GraphPath = new DbField('lab_test_result', 'lab_test_result', 'x_GraphPath', 'GraphPath', '`GraphPath`', '`GraphPath`', 200, 200, -1, FALSE, '`GraphPath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GraphPath->Nullable = FALSE; // NOT NULL field
		$this->GraphPath->Required = TRUE; // Required field
		$this->GraphPath->Sortable = TRUE; // Allow sort
		$this->fields['GraphPath'] = &$this->GraphPath;

		// SampleDate
		$this->SampleDate = new DbField('lab_test_result', 'lab_test_result', 'x_SampleDate', 'SampleDate', '`SampleDate`', CastDateFieldForLike("`SampleDate`", 0, "DB"), 135, 23, 0, FALSE, '`SampleDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleDate->Sortable = TRUE; // Allow sort
		$this->SampleDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SampleDate'] = &$this->SampleDate;

		// SampleUser
		$this->SampleUser = new DbField('lab_test_result', 'lab_test_result', 'x_SampleUser', 'SampleUser', '`SampleUser`', '`SampleUser`', 200, 10, -1, FALSE, '`SampleUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SampleUser->Nullable = FALSE; // NOT NULL field
		$this->SampleUser->Required = TRUE; // Required field
		$this->SampleUser->Sortable = TRUE; // Allow sort
		$this->fields['SampleUser'] = &$this->SampleUser;

		// ReceivedDate
		$this->ReceivedDate = new DbField('lab_test_result', 'lab_test_result', 'x_ReceivedDate', 'ReceivedDate', '`ReceivedDate`', CastDateFieldForLike("`ReceivedDate`", 0, "DB"), 135, 23, 0, FALSE, '`ReceivedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedDate->Sortable = TRUE; // Allow sort
		$this->ReceivedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReceivedDate'] = &$this->ReceivedDate;

		// ReceivedUser
		$this->ReceivedUser = new DbField('lab_test_result', 'lab_test_result', 'x_ReceivedUser', 'ReceivedUser', '`ReceivedUser`', '`ReceivedUser`', 200, 10, -1, FALSE, '`ReceivedUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReceivedUser->Nullable = FALSE; // NOT NULL field
		$this->ReceivedUser->Required = TRUE; // Required field
		$this->ReceivedUser->Sortable = TRUE; // Allow sort
		$this->fields['ReceivedUser'] = &$this->ReceivedUser;

		// DeptRecvDate
		$this->DeptRecvDate = new DbField('lab_test_result', 'lab_test_result', 'x_DeptRecvDate', 'DeptRecvDate', '`DeptRecvDate`', CastDateFieldForLike("`DeptRecvDate`", 0, "DB"), 135, 23, 0, FALSE, '`DeptRecvDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptRecvDate->Sortable = TRUE; // Allow sort
		$this->DeptRecvDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DeptRecvDate'] = &$this->DeptRecvDate;

		// DeptRecvUser
		$this->DeptRecvUser = new DbField('lab_test_result', 'lab_test_result', 'x_DeptRecvUser', 'DeptRecvUser', '`DeptRecvUser`', '`DeptRecvUser`', 200, 10, -1, FALSE, '`DeptRecvUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptRecvUser->Nullable = FALSE; // NOT NULL field
		$this->DeptRecvUser->Required = TRUE; // Required field
		$this->DeptRecvUser->Sortable = TRUE; // Allow sort
		$this->fields['DeptRecvUser'] = &$this->DeptRecvUser;

		// PrintBy
		$this->PrintBy = new DbField('lab_test_result', 'lab_test_result', 'x_PrintBy', 'PrintBy', '`PrintBy`', '`PrintBy`', 200, 10, -1, FALSE, '`PrintBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintBy->Nullable = FALSE; // NOT NULL field
		$this->PrintBy->Required = TRUE; // Required field
		$this->PrintBy->Sortable = TRUE; // Allow sort
		$this->fields['PrintBy'] = &$this->PrintBy;

		// PrintDate
		$this->PrintDate = new DbField('lab_test_result', 'lab_test_result', 'x_PrintDate', 'PrintDate', '`PrintDate`', CastDateFieldForLike("`PrintDate`", 0, "DB"), 135, 23, 0, FALSE, '`PrintDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrintDate->Sortable = TRUE; // Allow sort
		$this->PrintDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['PrintDate'] = &$this->PrintDate;

		// MachineCD
		$this->MachineCD = new DbField('lab_test_result', 'lab_test_result', 'x_MachineCD', 'MachineCD', '`MachineCD`', '`MachineCD`', 200, 10, -1, FALSE, '`MachineCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MachineCD->Nullable = FALSE; // NOT NULL field
		$this->MachineCD->Required = TRUE; // Required field
		$this->MachineCD->Sortable = TRUE; // Allow sort
		$this->fields['MachineCD'] = &$this->MachineCD;

		// TestCancel
		$this->TestCancel = new DbField('lab_test_result', 'lab_test_result', 'x_TestCancel', 'TestCancel', '`TestCancel`', '`TestCancel`', 200, 1, -1, FALSE, '`TestCancel`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestCancel->Nullable = FALSE; // NOT NULL field
		$this->TestCancel->Required = TRUE; // Required field
		$this->TestCancel->Sortable = TRUE; // Allow sort
		$this->fields['TestCancel'] = &$this->TestCancel;

		// OutSource
		$this->OutSource = new DbField('lab_test_result', 'lab_test_result', 'x_OutSource', 'OutSource', '`OutSource`', '`OutSource`', 200, 1, -1, FALSE, '`OutSource`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OutSource->Nullable = FALSE; // NOT NULL field
		$this->OutSource->Required = TRUE; // Required field
		$this->OutSource->Sortable = TRUE; // Allow sort
		$this->fields['OutSource'] = &$this->OutSource;

		// Tariff
		$this->Tariff = new DbField('lab_test_result', 'lab_test_result', 'x_Tariff', 'Tariff', '`Tariff`', '`Tariff`', 131, 9, -1, FALSE, '`Tariff`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tariff->Nullable = FALSE; // NOT NULL field
		$this->Tariff->Required = TRUE; // Required field
		$this->Tariff->Sortable = TRUE; // Allow sort
		$this->Tariff->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Tariff'] = &$this->Tariff;

		// EDITDATE
		$this->EDITDATE = new DbField('lab_test_result', 'lab_test_result', 'x_EDITDATE', 'EDITDATE', '`EDITDATE`', CastDateFieldForLike("`EDITDATE`", 0, "DB"), 135, 23, 0, FALSE, '`EDITDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDITDATE->Sortable = TRUE; // Allow sort
		$this->EDITDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EDITDATE'] = &$this->EDITDATE;

		// UPLOAD
		$this->UPLOAD = new DbField('lab_test_result', 'lab_test_result', 'x_UPLOAD', 'UPLOAD', '`UPLOAD`', '`UPLOAD`', 200, 1, -1, FALSE, '`UPLOAD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UPLOAD->Nullable = FALSE; // NOT NULL field
		$this->UPLOAD->Required = TRUE; // Required field
		$this->UPLOAD->Sortable = TRUE; // Allow sort
		$this->fields['UPLOAD'] = &$this->UPLOAD;

		// SAuthDate
		$this->SAuthDate = new DbField('lab_test_result', 'lab_test_result', 'x_SAuthDate', 'SAuthDate', '`SAuthDate`', CastDateFieldForLike("`SAuthDate`", 0, "DB"), 135, 23, 0, FALSE, '`SAuthDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAuthDate->Sortable = TRUE; // Allow sort
		$this->SAuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['SAuthDate'] = &$this->SAuthDate;

		// SAuthBy
		$this->SAuthBy = new DbField('lab_test_result', 'lab_test_result', 'x_SAuthBy', 'SAuthBy', '`SAuthBy`', '`SAuthBy`', 200, 3, -1, FALSE, '`SAuthBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAuthBy->Nullable = FALSE; // NOT NULL field
		$this->SAuthBy->Required = TRUE; // Required field
		$this->SAuthBy->Sortable = TRUE; // Allow sort
		$this->fields['SAuthBy'] = &$this->SAuthBy;

		// NoRC
		$this->NoRC = new DbField('lab_test_result', 'lab_test_result', 'x_NoRC', 'NoRC', '`NoRC`', '`NoRC`', 200, 1, -1, FALSE, '`NoRC`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoRC->Nullable = FALSE; // NOT NULL field
		$this->NoRC->Required = TRUE; // Required field
		$this->NoRC->Sortable = TRUE; // Allow sort
		$this->fields['NoRC'] = &$this->NoRC;

		// DispDt
		$this->DispDt = new DbField('lab_test_result', 'lab_test_result', 'x_DispDt', 'DispDt', '`DispDt`', CastDateFieldForLike("`DispDt`", 0, "DB"), 135, 23, 0, FALSE, '`DispDt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DispDt->Sortable = TRUE; // Allow sort
		$this->DispDt->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['DispDt'] = &$this->DispDt;

		// DispUser
		$this->DispUser = new DbField('lab_test_result', 'lab_test_result', 'x_DispUser', 'DispUser', '`DispUser`', '`DispUser`', 200, 10, -1, FALSE, '`DispUser`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DispUser->Nullable = FALSE; // NOT NULL field
		$this->DispUser->Required = TRUE; // Required field
		$this->DispUser->Sortable = TRUE; // Allow sort
		$this->fields['DispUser'] = &$this->DispUser;

		// DispRemarks
		$this->DispRemarks = new DbField('lab_test_result', 'lab_test_result', 'x_DispRemarks', 'DispRemarks', '`DispRemarks`', '`DispRemarks`', 200, 250, -1, FALSE, '`DispRemarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DispRemarks->Nullable = FALSE; // NOT NULL field
		$this->DispRemarks->Required = TRUE; // Required field
		$this->DispRemarks->Sortable = TRUE; // Allow sort
		$this->fields['DispRemarks'] = &$this->DispRemarks;

		// DispMode
		$this->DispMode = new DbField('lab_test_result', 'lab_test_result', 'x_DispMode', 'DispMode', '`DispMode`', '`DispMode`', 200, 50, -1, FALSE, '`DispMode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DispMode->Nullable = FALSE; // NOT NULL field
		$this->DispMode->Required = TRUE; // Required field
		$this->DispMode->Sortable = TRUE; // Allow sort
		$this->fields['DispMode'] = &$this->DispMode;

		// ProductCD
		$this->ProductCD = new DbField('lab_test_result', 'lab_test_result', 'x_ProductCD', 'ProductCD', '`ProductCD`', '`ProductCD`', 200, 6, -1, FALSE, '`ProductCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProductCD->Nullable = FALSE; // NOT NULL field
		$this->ProductCD->Required = TRUE; // Required field
		$this->ProductCD->Sortable = TRUE; // Allow sort
		$this->fields['ProductCD'] = &$this->ProductCD;

		// Nos
		$this->Nos = new DbField('lab_test_result', 'lab_test_result', 'x_Nos', 'Nos', '`Nos`', '`Nos`', 131, 3, -1, FALSE, '`Nos`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nos->Sortable = TRUE; // Allow sort
		$this->Nos->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Nos'] = &$this->Nos;

		// WBCPath
		$this->WBCPath = new DbField('lab_test_result', 'lab_test_result', 'x_WBCPath', 'WBCPath', '`WBCPath`', '`WBCPath`', 200, 100, -1, FALSE, '`WBCPath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->WBCPath->Nullable = FALSE; // NOT NULL field
		$this->WBCPath->Required = TRUE; // Required field
		$this->WBCPath->Sortable = TRUE; // Allow sort
		$this->fields['WBCPath'] = &$this->WBCPath;

		// RBCPath
		$this->RBCPath = new DbField('lab_test_result', 'lab_test_result', 'x_RBCPath', 'RBCPath', '`RBCPath`', '`RBCPath`', 200, 100, -1, FALSE, '`RBCPath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RBCPath->Nullable = FALSE; // NOT NULL field
		$this->RBCPath->Required = TRUE; // Required field
		$this->RBCPath->Sortable = TRUE; // Allow sort
		$this->fields['RBCPath'] = &$this->RBCPath;

		// PTPath
		$this->PTPath = new DbField('lab_test_result', 'lab_test_result', 'x_PTPath', 'PTPath', '`PTPath`', '`PTPath`', 200, 100, -1, FALSE, '`PTPath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTPath->Nullable = FALSE; // NOT NULL field
		$this->PTPath->Required = TRUE; // Required field
		$this->PTPath->Sortable = TRUE; // Allow sort
		$this->fields['PTPath'] = &$this->PTPath;

		// ActualAmt
		$this->ActualAmt = new DbField('lab_test_result', 'lab_test_result', 'x_ActualAmt', 'ActualAmt', '`ActualAmt`', '`ActualAmt`', 131, 9, -1, FALSE, '`ActualAmt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ActualAmt->Nullable = FALSE; // NOT NULL field
		$this->ActualAmt->Required = TRUE; // Required field
		$this->ActualAmt->Sortable = TRUE; // Allow sort
		$this->ActualAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ActualAmt'] = &$this->ActualAmt;

		// NoSign
		$this->NoSign = new DbField('lab_test_result', 'lab_test_result', 'x_NoSign', 'NoSign', '`NoSign`', '`NoSign`', 200, 1, -1, FALSE, '`NoSign`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoSign->Nullable = FALSE; // NOT NULL field
		$this->NoSign->Required = TRUE; // Required field
		$this->NoSign->Sortable = TRUE; // Allow sort
		$this->fields['NoSign'] = &$this->NoSign;

		// Barcode
		$this->_Barcode = new DbField('lab_test_result', 'lab_test_result', 'x__Barcode', 'Barcode', '`Barcode`', '`Barcode`', 200, 1, -1, FALSE, '`Barcode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Barcode->Nullable = FALSE; // NOT NULL field
		$this->_Barcode->Required = TRUE; // Required field
		$this->_Barcode->Sortable = TRUE; // Allow sort
		$this->fields['Barcode'] = &$this->_Barcode;

		// ReadTime
		$this->ReadTime = new DbField('lab_test_result', 'lab_test_result', 'x_ReadTime', 'ReadTime', '`ReadTime`', CastDateFieldForLike("`ReadTime`", 0, "DB"), 135, 23, 0, FALSE, '`ReadTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReadTime->Sortable = TRUE; // Allow sort
		$this->ReadTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReadTime'] = &$this->ReadTime;

		// Result
		$this->Result = new DbField('lab_test_result', 'lab_test_result', 'x_Result', 'Result', '`Result`', '`Result`', 201, 8000, -1, FALSE, '`Result`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Result->Nullable = FALSE; // NOT NULL field
		$this->Result->Required = TRUE; // Required field
		$this->Result->Sortable = TRUE; // Allow sort
		$this->fields['Result'] = &$this->Result;

		// VailID
		$this->VailID = new DbField('lab_test_result', 'lab_test_result', 'x_VailID', 'VailID', '`VailID`', '`VailID`', 200, 10, -1, FALSE, '`VailID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->VailID->Nullable = FALSE; // NOT NULL field
		$this->VailID->Required = TRUE; // Required field
		$this->VailID->Sortable = TRUE; // Allow sort
		$this->fields['VailID'] = &$this->VailID;

		// ReadMachine
		$this->ReadMachine = new DbField('lab_test_result', 'lab_test_result', 'x_ReadMachine', 'ReadMachine', '`ReadMachine`', '`ReadMachine`', 200, 20, -1, FALSE, '`ReadMachine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReadMachine->Nullable = FALSE; // NOT NULL field
		$this->ReadMachine->Required = TRUE; // Required field
		$this->ReadMachine->Sortable = TRUE; // Allow sort
		$this->fields['ReadMachine'] = &$this->ReadMachine;

		// LabCD
		$this->LabCD = new DbField('lab_test_result', 'lab_test_result', 'x_LabCD', 'LabCD', '`LabCD`', '`LabCD`', 200, 6, -1, FALSE, '`LabCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LabCD->Nullable = FALSE; // NOT NULL field
		$this->LabCD->Required = TRUE; // Required field
		$this->LabCD->Sortable = TRUE; // Allow sort
		$this->fields['LabCD'] = &$this->LabCD;

		// OutLabAmt
		$this->OutLabAmt = new DbField('lab_test_result', 'lab_test_result', 'x_OutLabAmt', 'OutLabAmt', '`OutLabAmt`', '`OutLabAmt`', 131, 9, -1, FALSE, '`OutLabAmt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OutLabAmt->Nullable = FALSE; // NOT NULL field
		$this->OutLabAmt->Required = TRUE; // Required field
		$this->OutLabAmt->Sortable = TRUE; // Allow sort
		$this->OutLabAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['OutLabAmt'] = &$this->OutLabAmt;

		// ProductQty
		$this->ProductQty = new DbField('lab_test_result', 'lab_test_result', 'x_ProductQty', 'ProductQty', '`ProductQty`', '`ProductQty`', 131, 3, -1, FALSE, '`ProductQty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProductQty->Nullable = FALSE; // NOT NULL field
		$this->ProductQty->Required = TRUE; // Required field
		$this->ProductQty->Sortable = TRUE; // Allow sort
		$this->ProductQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ProductQty'] = &$this->ProductQty;

		// Repeat
		$this->Repeat = new DbField('lab_test_result', 'lab_test_result', 'x_Repeat', 'Repeat', '`Repeat`', '`Repeat`', 200, 1, -1, FALSE, '`Repeat`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Repeat->Nullable = FALSE; // NOT NULL field
		$this->Repeat->Required = TRUE; // Required field
		$this->Repeat->Sortable = TRUE; // Allow sort
		$this->fields['Repeat'] = &$this->Repeat;

		// DeptNo
		$this->DeptNo = new DbField('lab_test_result', 'lab_test_result', 'x_DeptNo', 'DeptNo', '`DeptNo`', '`DeptNo`', 200, 5, -1, FALSE, '`DeptNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DeptNo->Nullable = FALSE; // NOT NULL field
		$this->DeptNo->Required = TRUE; // Required field
		$this->DeptNo->Sortable = TRUE; // Allow sort
		$this->fields['DeptNo'] = &$this->DeptNo;

		// Desc1
		$this->Desc1 = new DbField('lab_test_result', 'lab_test_result', 'x_Desc1', 'Desc1', '`Desc1`', '`Desc1`', 200, 200, -1, FALSE, '`Desc1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Desc1->Nullable = FALSE; // NOT NULL field
		$this->Desc1->Required = TRUE; // Required field
		$this->Desc1->Sortable = TRUE; // Allow sort
		$this->fields['Desc1'] = &$this->Desc1;

		// Desc2
		$this->Desc2 = new DbField('lab_test_result', 'lab_test_result', 'x_Desc2', 'Desc2', '`Desc2`', '`Desc2`', 200, 200, -1, FALSE, '`Desc2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Desc2->Nullable = FALSE; // NOT NULL field
		$this->Desc2->Required = TRUE; // Required field
		$this->Desc2->Sortable = TRUE; // Allow sort
		$this->fields['Desc2'] = &$this->Desc2;

		// RptResult
		$this->RptResult = new DbField('lab_test_result', 'lab_test_result', 'x_RptResult', 'RptResult', '`RptResult`', '`RptResult`', 200, 100, -1, FALSE, '`RptResult`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RptResult->Nullable = FALSE; // NOT NULL field
		$this->RptResult->Required = TRUE; // Required field
		$this->RptResult->Sortable = TRUE; // Allow sort
		$this->fields['RptResult'] = &$this->RptResult;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_test_result`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
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
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
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
		$this->Branch->DbValue = $row['Branch'];
		$this->SidNo->DbValue = $row['SidNo'];
		$this->SidDate->DbValue = $row['SidDate'];
		$this->TestCd->DbValue = $row['TestCd'];
		$this->TestSubCd->DbValue = $row['TestSubCd'];
		$this->DEptCd->DbValue = $row['DEptCd'];
		$this->ProfCd->DbValue = $row['ProfCd'];
		$this->LabReport->DbValue = $row['LabReport'];
		$this->ResultDate->DbValue = $row['ResultDate'];
		$this->Comments->DbValue = $row['Comments'];
		$this->Method->DbValue = $row['Method'];
		$this->Specimen->DbValue = $row['Specimen'];
		$this->Amount->DbValue = $row['Amount'];
		$this->ResultBy->DbValue = $row['ResultBy'];
		$this->AuthBy->DbValue = $row['AuthBy'];
		$this->AuthDate->DbValue = $row['AuthDate'];
		$this->Abnormal->DbValue = $row['Abnormal'];
		$this->Printed->DbValue = $row['Printed'];
		$this->Dispatch->DbValue = $row['Dispatch'];
		$this->LOWHIGH->DbValue = $row['LOWHIGH'];
		$this->RefValue->DbValue = $row['RefValue'];
		$this->Unit->DbValue = $row['Unit'];
		$this->ResDate->DbValue = $row['ResDate'];
		$this->Pic1->DbValue = $row['Pic1'];
		$this->Pic2->DbValue = $row['Pic2'];
		$this->GraphPath->DbValue = $row['GraphPath'];
		$this->SampleDate->DbValue = $row['SampleDate'];
		$this->SampleUser->DbValue = $row['SampleUser'];
		$this->ReceivedDate->DbValue = $row['ReceivedDate'];
		$this->ReceivedUser->DbValue = $row['ReceivedUser'];
		$this->DeptRecvDate->DbValue = $row['DeptRecvDate'];
		$this->DeptRecvUser->DbValue = $row['DeptRecvUser'];
		$this->PrintBy->DbValue = $row['PrintBy'];
		$this->PrintDate->DbValue = $row['PrintDate'];
		$this->MachineCD->DbValue = $row['MachineCD'];
		$this->TestCancel->DbValue = $row['TestCancel'];
		$this->OutSource->DbValue = $row['OutSource'];
		$this->Tariff->DbValue = $row['Tariff'];
		$this->EDITDATE->DbValue = $row['EDITDATE'];
		$this->UPLOAD->DbValue = $row['UPLOAD'];
		$this->SAuthDate->DbValue = $row['SAuthDate'];
		$this->SAuthBy->DbValue = $row['SAuthBy'];
		$this->NoRC->DbValue = $row['NoRC'];
		$this->DispDt->DbValue = $row['DispDt'];
		$this->DispUser->DbValue = $row['DispUser'];
		$this->DispRemarks->DbValue = $row['DispRemarks'];
		$this->DispMode->DbValue = $row['DispMode'];
		$this->ProductCD->DbValue = $row['ProductCD'];
		$this->Nos->DbValue = $row['Nos'];
		$this->WBCPath->DbValue = $row['WBCPath'];
		$this->RBCPath->DbValue = $row['RBCPath'];
		$this->PTPath->DbValue = $row['PTPath'];
		$this->ActualAmt->DbValue = $row['ActualAmt'];
		$this->NoSign->DbValue = $row['NoSign'];
		$this->_Barcode->DbValue = $row['Barcode'];
		$this->ReadTime->DbValue = $row['ReadTime'];
		$this->Result->DbValue = $row['Result'];
		$this->VailID->DbValue = $row['VailID'];
		$this->ReadMachine->DbValue = $row['ReadMachine'];
		$this->LabCD->DbValue = $row['LabCD'];
		$this->OutLabAmt->DbValue = $row['OutLabAmt'];
		$this->ProductQty->DbValue = $row['ProductQty'];
		$this->Repeat->DbValue = $row['Repeat'];
		$this->DeptNo->DbValue = $row['DeptNo'];
		$this->Desc1->DbValue = $row['Desc1'];
		$this->Desc2->DbValue = $row['Desc2'];
		$this->RptResult->DbValue = $row['RptResult'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "lab_test_resultlist.php";
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
		if ($pageName == "lab_test_resultview.php")
			return $Language->phrase("View");
		elseif ($pageName == "lab_test_resultedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "lab_test_resultadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "lab_test_resultlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("lab_test_resultview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("lab_test_resultview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "lab_test_resultadd.php?" . $this->getUrlParm($parm);
		else
			$url = "lab_test_resultadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("lab_test_resultedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("lab_test_resultadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("lab_test_resultdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
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
		$this->Branch->setDbValue($rs->fields('Branch'));
		$this->SidNo->setDbValue($rs->fields('SidNo'));
		$this->SidDate->setDbValue($rs->fields('SidDate'));
		$this->TestCd->setDbValue($rs->fields('TestCd'));
		$this->TestSubCd->setDbValue($rs->fields('TestSubCd'));
		$this->DEptCd->setDbValue($rs->fields('DEptCd'));
		$this->ProfCd->setDbValue($rs->fields('ProfCd'));
		$this->LabReport->setDbValue($rs->fields('LabReport'));
		$this->ResultDate->setDbValue($rs->fields('ResultDate'));
		$this->Comments->setDbValue($rs->fields('Comments'));
		$this->Method->setDbValue($rs->fields('Method'));
		$this->Specimen->setDbValue($rs->fields('Specimen'));
		$this->Amount->setDbValue($rs->fields('Amount'));
		$this->ResultBy->setDbValue($rs->fields('ResultBy'));
		$this->AuthBy->setDbValue($rs->fields('AuthBy'));
		$this->AuthDate->setDbValue($rs->fields('AuthDate'));
		$this->Abnormal->setDbValue($rs->fields('Abnormal'));
		$this->Printed->setDbValue($rs->fields('Printed'));
		$this->Dispatch->setDbValue($rs->fields('Dispatch'));
		$this->LOWHIGH->setDbValue($rs->fields('LOWHIGH'));
		$this->RefValue->setDbValue($rs->fields('RefValue'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->ResDate->setDbValue($rs->fields('ResDate'));
		$this->Pic1->setDbValue($rs->fields('Pic1'));
		$this->Pic2->setDbValue($rs->fields('Pic2'));
		$this->GraphPath->setDbValue($rs->fields('GraphPath'));
		$this->SampleDate->setDbValue($rs->fields('SampleDate'));
		$this->SampleUser->setDbValue($rs->fields('SampleUser'));
		$this->ReceivedDate->setDbValue($rs->fields('ReceivedDate'));
		$this->ReceivedUser->setDbValue($rs->fields('ReceivedUser'));
		$this->DeptRecvDate->setDbValue($rs->fields('DeptRecvDate'));
		$this->DeptRecvUser->setDbValue($rs->fields('DeptRecvUser'));
		$this->PrintBy->setDbValue($rs->fields('PrintBy'));
		$this->PrintDate->setDbValue($rs->fields('PrintDate'));
		$this->MachineCD->setDbValue($rs->fields('MachineCD'));
		$this->TestCancel->setDbValue($rs->fields('TestCancel'));
		$this->OutSource->setDbValue($rs->fields('OutSource'));
		$this->Tariff->setDbValue($rs->fields('Tariff'));
		$this->EDITDATE->setDbValue($rs->fields('EDITDATE'));
		$this->UPLOAD->setDbValue($rs->fields('UPLOAD'));
		$this->SAuthDate->setDbValue($rs->fields('SAuthDate'));
		$this->SAuthBy->setDbValue($rs->fields('SAuthBy'));
		$this->NoRC->setDbValue($rs->fields('NoRC'));
		$this->DispDt->setDbValue($rs->fields('DispDt'));
		$this->DispUser->setDbValue($rs->fields('DispUser'));
		$this->DispRemarks->setDbValue($rs->fields('DispRemarks'));
		$this->DispMode->setDbValue($rs->fields('DispMode'));
		$this->ProductCD->setDbValue($rs->fields('ProductCD'));
		$this->Nos->setDbValue($rs->fields('Nos'));
		$this->WBCPath->setDbValue($rs->fields('WBCPath'));
		$this->RBCPath->setDbValue($rs->fields('RBCPath'));
		$this->PTPath->setDbValue($rs->fields('PTPath'));
		$this->ActualAmt->setDbValue($rs->fields('ActualAmt'));
		$this->NoSign->setDbValue($rs->fields('NoSign'));
		$this->_Barcode->setDbValue($rs->fields('Barcode'));
		$this->ReadTime->setDbValue($rs->fields('ReadTime'));
		$this->Result->setDbValue($rs->fields('Result'));
		$this->VailID->setDbValue($rs->fields('VailID'));
		$this->ReadMachine->setDbValue($rs->fields('ReadMachine'));
		$this->LabCD->setDbValue($rs->fields('LabCD'));
		$this->OutLabAmt->setDbValue($rs->fields('OutLabAmt'));
		$this->ProductQty->setDbValue($rs->fields('ProductQty'));
		$this->Repeat->setDbValue($rs->fields('Repeat'));
		$this->DeptNo->setDbValue($rs->fields('DeptNo'));
		$this->Desc1->setDbValue($rs->fields('Desc1'));
		$this->Desc2->setDbValue($rs->fields('Desc2'));
		$this->RptResult->setDbValue($rs->fields('RptResult'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Branch
		// SidNo
		// SidDate
		// TestCd
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// ResultDate
		// Comments
		// Method
		// Specimen
		// Amount
		// ResultBy
		// AuthBy
		// AuthDate
		// Abnormal
		// Printed
		// Dispatch
		// LOWHIGH
		// RefValue
		// Unit
		// ResDate
		// Pic1
		// Pic2
		// GraphPath
		// SampleDate
		// SampleUser
		// ReceivedDate
		// ReceivedUser
		// DeptRecvDate
		// DeptRecvUser
		// PrintBy
		// PrintDate
		// MachineCD
		// TestCancel
		// OutSource
		// Tariff
		// EDITDATE
		// UPLOAD
		// SAuthDate
		// SAuthBy
		// NoRC
		// DispDt
		// DispUser
		// DispRemarks
		// DispMode
		// ProductCD
		// Nos
		// WBCPath
		// RBCPath
		// PTPath
		// ActualAmt
		// NoSign
		// Barcode
		// ReadTime
		// Result
		// VailID
		// ReadMachine
		// LabCD
		// OutLabAmt
		// ProductQty
		// Repeat
		// DeptNo
		// Desc1
		// Desc2
		// RptResult
		// Branch

		$this->Branch->ViewValue = $this->Branch->CurrentValue;
		$this->Branch->ViewCustomAttributes = "";

		// SidNo
		$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
		$this->SidNo->ViewCustomAttributes = "";

		// SidDate
		$this->SidDate->ViewValue = $this->SidDate->CurrentValue;
		$this->SidDate->ViewValue = FormatDateTime($this->SidDate->ViewValue, 0);
		$this->SidDate->ViewCustomAttributes = "";

		// TestCd
		$this->TestCd->ViewValue = $this->TestCd->CurrentValue;
		$this->TestCd->ViewCustomAttributes = "";

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

		// ResultDate
		$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
		$this->ResultDate->ViewCustomAttributes = "";

		// Comments
		$this->Comments->ViewValue = $this->Comments->CurrentValue;
		$this->Comments->ViewCustomAttributes = "";

		// Method
		$this->Method->ViewValue = $this->Method->CurrentValue;
		$this->Method->ViewCustomAttributes = "";

		// Specimen
		$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
		$this->Specimen->ViewCustomAttributes = "";

		// Amount
		$this->Amount->ViewValue = $this->Amount->CurrentValue;
		$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
		$this->Amount->ViewCustomAttributes = "";

		// ResultBy
		$this->ResultBy->ViewValue = $this->ResultBy->CurrentValue;
		$this->ResultBy->ViewCustomAttributes = "";

		// AuthBy
		$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
		$this->AuthBy->ViewCustomAttributes = "";

		// AuthDate
		$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
		$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
		$this->AuthDate->ViewCustomAttributes = "";

		// Abnormal
		$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->ViewCustomAttributes = "";

		// Printed
		$this->Printed->ViewValue = $this->Printed->CurrentValue;
		$this->Printed->ViewCustomAttributes = "";

		// Dispatch
		$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
		$this->Dispatch->ViewCustomAttributes = "";

		// LOWHIGH
		$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
		$this->LOWHIGH->ViewCustomAttributes = "";

		// RefValue
		$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
		$this->RefValue->ViewCustomAttributes = "";

		// Unit
		$this->Unit->ViewValue = $this->Unit->CurrentValue;
		$this->Unit->ViewCustomAttributes = "";

		// ResDate
		$this->ResDate->ViewValue = $this->ResDate->CurrentValue;
		$this->ResDate->ViewValue = FormatDateTime($this->ResDate->ViewValue, 0);
		$this->ResDate->ViewCustomAttributes = "";

		// Pic1
		$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
		$this->Pic1->ViewCustomAttributes = "";

		// Pic2
		$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
		$this->Pic2->ViewCustomAttributes = "";

		// GraphPath
		$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
		$this->GraphPath->ViewCustomAttributes = "";

		// SampleDate
		$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
		$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
		$this->SampleDate->ViewCustomAttributes = "";

		// SampleUser
		$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
		$this->SampleUser->ViewCustomAttributes = "";

		// ReceivedDate
		$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
		$this->ReceivedDate->ViewCustomAttributes = "";

		// ReceivedUser
		$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
		$this->ReceivedUser->ViewCustomAttributes = "";

		// DeptRecvDate
		$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
		$this->DeptRecvDate->ViewCustomAttributes = "";

		// DeptRecvUser
		$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
		$this->DeptRecvUser->ViewCustomAttributes = "";

		// PrintBy
		$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
		$this->PrintBy->ViewCustomAttributes = "";

		// PrintDate
		$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
		$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
		$this->PrintDate->ViewCustomAttributes = "";

		// MachineCD
		$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
		$this->MachineCD->ViewCustomAttributes = "";

		// TestCancel
		$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
		$this->TestCancel->ViewCustomAttributes = "";

		// OutSource
		$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
		$this->OutSource->ViewCustomAttributes = "";

		// Tariff
		$this->Tariff->ViewValue = $this->Tariff->CurrentValue;
		$this->Tariff->ViewValue = FormatNumber($this->Tariff->ViewValue, 2, -2, -2, -2);
		$this->Tariff->ViewCustomAttributes = "";

		// EDITDATE
		$this->EDITDATE->ViewValue = $this->EDITDATE->CurrentValue;
		$this->EDITDATE->ViewValue = FormatDateTime($this->EDITDATE->ViewValue, 0);
		$this->EDITDATE->ViewCustomAttributes = "";

		// UPLOAD
		$this->UPLOAD->ViewValue = $this->UPLOAD->CurrentValue;
		$this->UPLOAD->ViewCustomAttributes = "";

		// SAuthDate
		$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
		$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
		$this->SAuthDate->ViewCustomAttributes = "";

		// SAuthBy
		$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
		$this->SAuthBy->ViewCustomAttributes = "";

		// NoRC
		$this->NoRC->ViewValue = $this->NoRC->CurrentValue;
		$this->NoRC->ViewCustomAttributes = "";

		// DispDt
		$this->DispDt->ViewValue = $this->DispDt->CurrentValue;
		$this->DispDt->ViewValue = FormatDateTime($this->DispDt->ViewValue, 0);
		$this->DispDt->ViewCustomAttributes = "";

		// DispUser
		$this->DispUser->ViewValue = $this->DispUser->CurrentValue;
		$this->DispUser->ViewCustomAttributes = "";

		// DispRemarks
		$this->DispRemarks->ViewValue = $this->DispRemarks->CurrentValue;
		$this->DispRemarks->ViewCustomAttributes = "";

		// DispMode
		$this->DispMode->ViewValue = $this->DispMode->CurrentValue;
		$this->DispMode->ViewCustomAttributes = "";

		// ProductCD
		$this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
		$this->ProductCD->ViewCustomAttributes = "";

		// Nos
		$this->Nos->ViewValue = $this->Nos->CurrentValue;
		$this->Nos->ViewValue = FormatNumber($this->Nos->ViewValue, 2, -2, -2, -2);
		$this->Nos->ViewCustomAttributes = "";

		// WBCPath
		$this->WBCPath->ViewValue = $this->WBCPath->CurrentValue;
		$this->WBCPath->ViewCustomAttributes = "";

		// RBCPath
		$this->RBCPath->ViewValue = $this->RBCPath->CurrentValue;
		$this->RBCPath->ViewCustomAttributes = "";

		// PTPath
		$this->PTPath->ViewValue = $this->PTPath->CurrentValue;
		$this->PTPath->ViewCustomAttributes = "";

		// ActualAmt
		$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
		$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
		$this->ActualAmt->ViewCustomAttributes = "";

		// NoSign
		$this->NoSign->ViewValue = $this->NoSign->CurrentValue;
		$this->NoSign->ViewCustomAttributes = "";

		// Barcode
		$this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
		$this->_Barcode->ViewCustomAttributes = "";

		// ReadTime
		$this->ReadTime->ViewValue = $this->ReadTime->CurrentValue;
		$this->ReadTime->ViewValue = FormatDateTime($this->ReadTime->ViewValue, 0);
		$this->ReadTime->ViewCustomAttributes = "";

		// Result
		$this->Result->ViewValue = $this->Result->CurrentValue;
		$this->Result->ViewCustomAttributes = "";

		// VailID
		$this->VailID->ViewValue = $this->VailID->CurrentValue;
		$this->VailID->ViewCustomAttributes = "";

		// ReadMachine
		$this->ReadMachine->ViewValue = $this->ReadMachine->CurrentValue;
		$this->ReadMachine->ViewCustomAttributes = "";

		// LabCD
		$this->LabCD->ViewValue = $this->LabCD->CurrentValue;
		$this->LabCD->ViewCustomAttributes = "";

		// OutLabAmt
		$this->OutLabAmt->ViewValue = $this->OutLabAmt->CurrentValue;
		$this->OutLabAmt->ViewValue = FormatNumber($this->OutLabAmt->ViewValue, 2, -2, -2, -2);
		$this->OutLabAmt->ViewCustomAttributes = "";

		// ProductQty
		$this->ProductQty->ViewValue = $this->ProductQty->CurrentValue;
		$this->ProductQty->ViewValue = FormatNumber($this->ProductQty->ViewValue, 2, -2, -2, -2);
		$this->ProductQty->ViewCustomAttributes = "";

		// Repeat
		$this->Repeat->ViewValue = $this->Repeat->CurrentValue;
		$this->Repeat->ViewCustomAttributes = "";

		// DeptNo
		$this->DeptNo->ViewValue = $this->DeptNo->CurrentValue;
		$this->DeptNo->ViewCustomAttributes = "";

		// Desc1
		$this->Desc1->ViewValue = $this->Desc1->CurrentValue;
		$this->Desc1->ViewCustomAttributes = "";

		// Desc2
		$this->Desc2->ViewValue = $this->Desc2->CurrentValue;
		$this->Desc2->ViewCustomAttributes = "";

		// RptResult
		$this->RptResult->ViewValue = $this->RptResult->CurrentValue;
		$this->RptResult->ViewCustomAttributes = "";

		// Branch
		$this->Branch->LinkCustomAttributes = "";
		$this->Branch->HrefValue = "";
		$this->Branch->TooltipValue = "";

		// SidNo
		$this->SidNo->LinkCustomAttributes = "";
		$this->SidNo->HrefValue = "";
		$this->SidNo->TooltipValue = "";

		// SidDate
		$this->SidDate->LinkCustomAttributes = "";
		$this->SidDate->HrefValue = "";
		$this->SidDate->TooltipValue = "";

		// TestCd
		$this->TestCd->LinkCustomAttributes = "";
		$this->TestCd->HrefValue = "";
		$this->TestCd->TooltipValue = "";

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

		// ResultDate
		$this->ResultDate->LinkCustomAttributes = "";
		$this->ResultDate->HrefValue = "";
		$this->ResultDate->TooltipValue = "";

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

		// Amount
		$this->Amount->LinkCustomAttributes = "";
		$this->Amount->HrefValue = "";
		$this->Amount->TooltipValue = "";

		// ResultBy
		$this->ResultBy->LinkCustomAttributes = "";
		$this->ResultBy->HrefValue = "";
		$this->ResultBy->TooltipValue = "";

		// AuthBy
		$this->AuthBy->LinkCustomAttributes = "";
		$this->AuthBy->HrefValue = "";
		$this->AuthBy->TooltipValue = "";

		// AuthDate
		$this->AuthDate->LinkCustomAttributes = "";
		$this->AuthDate->HrefValue = "";
		$this->AuthDate->TooltipValue = "";

		// Abnormal
		$this->Abnormal->LinkCustomAttributes = "";
		$this->Abnormal->HrefValue = "";
		$this->Abnormal->TooltipValue = "";

		// Printed
		$this->Printed->LinkCustomAttributes = "";
		$this->Printed->HrefValue = "";
		$this->Printed->TooltipValue = "";

		// Dispatch
		$this->Dispatch->LinkCustomAttributes = "";
		$this->Dispatch->HrefValue = "";
		$this->Dispatch->TooltipValue = "";

		// LOWHIGH
		$this->LOWHIGH->LinkCustomAttributes = "";
		$this->LOWHIGH->HrefValue = "";
		$this->LOWHIGH->TooltipValue = "";

		// RefValue
		$this->RefValue->LinkCustomAttributes = "";
		$this->RefValue->HrefValue = "";
		$this->RefValue->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// ResDate
		$this->ResDate->LinkCustomAttributes = "";
		$this->ResDate->HrefValue = "";
		$this->ResDate->TooltipValue = "";

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

		// SampleDate
		$this->SampleDate->LinkCustomAttributes = "";
		$this->SampleDate->HrefValue = "";
		$this->SampleDate->TooltipValue = "";

		// SampleUser
		$this->SampleUser->LinkCustomAttributes = "";
		$this->SampleUser->HrefValue = "";
		$this->SampleUser->TooltipValue = "";

		// ReceivedDate
		$this->ReceivedDate->LinkCustomAttributes = "";
		$this->ReceivedDate->HrefValue = "";
		$this->ReceivedDate->TooltipValue = "";

		// ReceivedUser
		$this->ReceivedUser->LinkCustomAttributes = "";
		$this->ReceivedUser->HrefValue = "";
		$this->ReceivedUser->TooltipValue = "";

		// DeptRecvDate
		$this->DeptRecvDate->LinkCustomAttributes = "";
		$this->DeptRecvDate->HrefValue = "";
		$this->DeptRecvDate->TooltipValue = "";

		// DeptRecvUser
		$this->DeptRecvUser->LinkCustomAttributes = "";
		$this->DeptRecvUser->HrefValue = "";
		$this->DeptRecvUser->TooltipValue = "";

		// PrintBy
		$this->PrintBy->LinkCustomAttributes = "";
		$this->PrintBy->HrefValue = "";
		$this->PrintBy->TooltipValue = "";

		// PrintDate
		$this->PrintDate->LinkCustomAttributes = "";
		$this->PrintDate->HrefValue = "";
		$this->PrintDate->TooltipValue = "";

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

		// Tariff
		$this->Tariff->LinkCustomAttributes = "";
		$this->Tariff->HrefValue = "";
		$this->Tariff->TooltipValue = "";

		// EDITDATE
		$this->EDITDATE->LinkCustomAttributes = "";
		$this->EDITDATE->HrefValue = "";
		$this->EDITDATE->TooltipValue = "";

		// UPLOAD
		$this->UPLOAD->LinkCustomAttributes = "";
		$this->UPLOAD->HrefValue = "";
		$this->UPLOAD->TooltipValue = "";

		// SAuthDate
		$this->SAuthDate->LinkCustomAttributes = "";
		$this->SAuthDate->HrefValue = "";
		$this->SAuthDate->TooltipValue = "";

		// SAuthBy
		$this->SAuthBy->LinkCustomAttributes = "";
		$this->SAuthBy->HrefValue = "";
		$this->SAuthBy->TooltipValue = "";

		// NoRC
		$this->NoRC->LinkCustomAttributes = "";
		$this->NoRC->HrefValue = "";
		$this->NoRC->TooltipValue = "";

		// DispDt
		$this->DispDt->LinkCustomAttributes = "";
		$this->DispDt->HrefValue = "";
		$this->DispDt->TooltipValue = "";

		// DispUser
		$this->DispUser->LinkCustomAttributes = "";
		$this->DispUser->HrefValue = "";
		$this->DispUser->TooltipValue = "";

		// DispRemarks
		$this->DispRemarks->LinkCustomAttributes = "";
		$this->DispRemarks->HrefValue = "";
		$this->DispRemarks->TooltipValue = "";

		// DispMode
		$this->DispMode->LinkCustomAttributes = "";
		$this->DispMode->HrefValue = "";
		$this->DispMode->TooltipValue = "";

		// ProductCD
		$this->ProductCD->LinkCustomAttributes = "";
		$this->ProductCD->HrefValue = "";
		$this->ProductCD->TooltipValue = "";

		// Nos
		$this->Nos->LinkCustomAttributes = "";
		$this->Nos->HrefValue = "";
		$this->Nos->TooltipValue = "";

		// WBCPath
		$this->WBCPath->LinkCustomAttributes = "";
		$this->WBCPath->HrefValue = "";
		$this->WBCPath->TooltipValue = "";

		// RBCPath
		$this->RBCPath->LinkCustomAttributes = "";
		$this->RBCPath->HrefValue = "";
		$this->RBCPath->TooltipValue = "";

		// PTPath
		$this->PTPath->LinkCustomAttributes = "";
		$this->PTPath->HrefValue = "";
		$this->PTPath->TooltipValue = "";

		// ActualAmt
		$this->ActualAmt->LinkCustomAttributes = "";
		$this->ActualAmt->HrefValue = "";
		$this->ActualAmt->TooltipValue = "";

		// NoSign
		$this->NoSign->LinkCustomAttributes = "";
		$this->NoSign->HrefValue = "";
		$this->NoSign->TooltipValue = "";

		// Barcode
		$this->_Barcode->LinkCustomAttributes = "";
		$this->_Barcode->HrefValue = "";
		$this->_Barcode->TooltipValue = "";

		// ReadTime
		$this->ReadTime->LinkCustomAttributes = "";
		$this->ReadTime->HrefValue = "";
		$this->ReadTime->TooltipValue = "";

		// Result
		$this->Result->LinkCustomAttributes = "";
		$this->Result->HrefValue = "";
		$this->Result->TooltipValue = "";

		// VailID
		$this->VailID->LinkCustomAttributes = "";
		$this->VailID->HrefValue = "";
		$this->VailID->TooltipValue = "";

		// ReadMachine
		$this->ReadMachine->LinkCustomAttributes = "";
		$this->ReadMachine->HrefValue = "";
		$this->ReadMachine->TooltipValue = "";

		// LabCD
		$this->LabCD->LinkCustomAttributes = "";
		$this->LabCD->HrefValue = "";
		$this->LabCD->TooltipValue = "";

		// OutLabAmt
		$this->OutLabAmt->LinkCustomAttributes = "";
		$this->OutLabAmt->HrefValue = "";
		$this->OutLabAmt->TooltipValue = "";

		// ProductQty
		$this->ProductQty->LinkCustomAttributes = "";
		$this->ProductQty->HrefValue = "";
		$this->ProductQty->TooltipValue = "";

		// Repeat
		$this->Repeat->LinkCustomAttributes = "";
		$this->Repeat->HrefValue = "";
		$this->Repeat->TooltipValue = "";

		// DeptNo
		$this->DeptNo->LinkCustomAttributes = "";
		$this->DeptNo->HrefValue = "";
		$this->DeptNo->TooltipValue = "";

		// Desc1
		$this->Desc1->LinkCustomAttributes = "";
		$this->Desc1->HrefValue = "";
		$this->Desc1->TooltipValue = "";

		// Desc2
		$this->Desc2->LinkCustomAttributes = "";
		$this->Desc2->HrefValue = "";
		$this->Desc2->TooltipValue = "";

		// RptResult
		$this->RptResult->LinkCustomAttributes = "";
		$this->RptResult->HrefValue = "";
		$this->RptResult->TooltipValue = "";

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

		// Branch
		$this->Branch->EditAttrs["class"] = "form-control";
		$this->Branch->EditCustomAttributes = "";
		if (!$this->Branch->Raw)
			$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
		$this->Branch->EditValue = $this->Branch->CurrentValue;
		$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

		// SidNo
		$this->SidNo->EditAttrs["class"] = "form-control";
		$this->SidNo->EditCustomAttributes = "";
		if (!$this->SidNo->Raw)
			$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
		$this->SidNo->EditValue = $this->SidNo->CurrentValue;
		$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

		// SidDate
		$this->SidDate->EditAttrs["class"] = "form-control";
		$this->SidDate->EditCustomAttributes = "";
		$this->SidDate->EditValue = FormatDateTime($this->SidDate->CurrentValue, 8);
		$this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

		// TestCd
		$this->TestCd->EditAttrs["class"] = "form-control";
		$this->TestCd->EditCustomAttributes = "";
		if (!$this->TestCd->Raw)
			$this->TestCd->CurrentValue = HtmlDecode($this->TestCd->CurrentValue);
		$this->TestCd->EditValue = $this->TestCd->CurrentValue;
		$this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

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

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
		$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

		// Comments
		$this->Comments->EditAttrs["class"] = "form-control";
		$this->Comments->EditCustomAttributes = "";
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

		// Amount
		$this->Amount->EditAttrs["class"] = "form-control";
		$this->Amount->EditCustomAttributes = "";
		$this->Amount->EditValue = $this->Amount->CurrentValue;
		$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
		if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue))
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
		

		// ResultBy
		$this->ResultBy->EditAttrs["class"] = "form-control";
		$this->ResultBy->EditCustomAttributes = "";
		if (!$this->ResultBy->Raw)
			$this->ResultBy->CurrentValue = HtmlDecode($this->ResultBy->CurrentValue);
		$this->ResultBy->EditValue = $this->ResultBy->CurrentValue;
		$this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

		// AuthBy
		$this->AuthBy->EditAttrs["class"] = "form-control";
		$this->AuthBy->EditCustomAttributes = "";
		if (!$this->AuthBy->Raw)
			$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
		$this->AuthBy->EditValue = $this->AuthBy->CurrentValue;
		$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

		// AuthDate
		$this->AuthDate->EditAttrs["class"] = "form-control";
		$this->AuthDate->EditCustomAttributes = "";
		$this->AuthDate->EditValue = FormatDateTime($this->AuthDate->CurrentValue, 8);
		$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

		// Abnormal
		$this->Abnormal->EditAttrs["class"] = "form-control";
		$this->Abnormal->EditCustomAttributes = "";
		if (!$this->Abnormal->Raw)
			$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
		$this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
		$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

		// Printed
		$this->Printed->EditAttrs["class"] = "form-control";
		$this->Printed->EditCustomAttributes = "";
		if (!$this->Printed->Raw)
			$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
		$this->Printed->EditValue = $this->Printed->CurrentValue;
		$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

		// Dispatch
		$this->Dispatch->EditAttrs["class"] = "form-control";
		$this->Dispatch->EditCustomAttributes = "";
		if (!$this->Dispatch->Raw)
			$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
		$this->Dispatch->EditValue = $this->Dispatch->CurrentValue;
		$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

		// LOWHIGH
		$this->LOWHIGH->EditAttrs["class"] = "form-control";
		$this->LOWHIGH->EditCustomAttributes = "";
		if (!$this->LOWHIGH->Raw)
			$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
		$this->LOWHIGH->EditValue = $this->LOWHIGH->CurrentValue;
		$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

		// RefValue
		$this->RefValue->EditAttrs["class"] = "form-control";
		$this->RefValue->EditCustomAttributes = "";
		$this->RefValue->EditValue = $this->RefValue->CurrentValue;
		$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

		// Unit
		$this->Unit->EditAttrs["class"] = "form-control";
		$this->Unit->EditCustomAttributes = "";
		if (!$this->Unit->Raw)
			$this->Unit->CurrentValue = HtmlDecode($this->Unit->CurrentValue);
		$this->Unit->EditValue = $this->Unit->CurrentValue;
		$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

		// ResDate
		$this->ResDate->EditAttrs["class"] = "form-control";
		$this->ResDate->EditCustomAttributes = "";
		$this->ResDate->EditValue = FormatDateTime($this->ResDate->CurrentValue, 8);
		$this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

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

		// Tariff
		$this->Tariff->EditAttrs["class"] = "form-control";
		$this->Tariff->EditCustomAttributes = "";
		$this->Tariff->EditValue = $this->Tariff->CurrentValue;
		$this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());
		if (strval($this->Tariff->EditValue) != "" && is_numeric($this->Tariff->EditValue))
			$this->Tariff->EditValue = FormatNumber($this->Tariff->EditValue, -2, -2, -2, -2);
		

		// EDITDATE
		$this->EDITDATE->EditAttrs["class"] = "form-control";
		$this->EDITDATE->EditCustomAttributes = "";
		$this->EDITDATE->EditValue = FormatDateTime($this->EDITDATE->CurrentValue, 8);
		$this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

		// UPLOAD
		$this->UPLOAD->EditAttrs["class"] = "form-control";
		$this->UPLOAD->EditCustomAttributes = "";
		if (!$this->UPLOAD->Raw)
			$this->UPLOAD->CurrentValue = HtmlDecode($this->UPLOAD->CurrentValue);
		$this->UPLOAD->EditValue = $this->UPLOAD->CurrentValue;
		$this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

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

		// NoRC
		$this->NoRC->EditAttrs["class"] = "form-control";
		$this->NoRC->EditCustomAttributes = "";
		if (!$this->NoRC->Raw)
			$this->NoRC->CurrentValue = HtmlDecode($this->NoRC->CurrentValue);
		$this->NoRC->EditValue = $this->NoRC->CurrentValue;
		$this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

		// DispDt
		$this->DispDt->EditAttrs["class"] = "form-control";
		$this->DispDt->EditCustomAttributes = "";
		$this->DispDt->EditValue = FormatDateTime($this->DispDt->CurrentValue, 8);
		$this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

		// DispUser
		$this->DispUser->EditAttrs["class"] = "form-control";
		$this->DispUser->EditCustomAttributes = "";
		if (!$this->DispUser->Raw)
			$this->DispUser->CurrentValue = HtmlDecode($this->DispUser->CurrentValue);
		$this->DispUser->EditValue = $this->DispUser->CurrentValue;
		$this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

		// DispRemarks
		$this->DispRemarks->EditAttrs["class"] = "form-control";
		$this->DispRemarks->EditCustomAttributes = "";
		if (!$this->DispRemarks->Raw)
			$this->DispRemarks->CurrentValue = HtmlDecode($this->DispRemarks->CurrentValue);
		$this->DispRemarks->EditValue = $this->DispRemarks->CurrentValue;
		$this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

		// DispMode
		$this->DispMode->EditAttrs["class"] = "form-control";
		$this->DispMode->EditCustomAttributes = "";
		if (!$this->DispMode->Raw)
			$this->DispMode->CurrentValue = HtmlDecode($this->DispMode->CurrentValue);
		$this->DispMode->EditValue = $this->DispMode->CurrentValue;
		$this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

		// ProductCD
		$this->ProductCD->EditAttrs["class"] = "form-control";
		$this->ProductCD->EditCustomAttributes = "";
		if (!$this->ProductCD->Raw)
			$this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
		$this->ProductCD->EditValue = $this->ProductCD->CurrentValue;
		$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

		// Nos
		$this->Nos->EditAttrs["class"] = "form-control";
		$this->Nos->EditCustomAttributes = "";
		$this->Nos->EditValue = $this->Nos->CurrentValue;
		$this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());
		if (strval($this->Nos->EditValue) != "" && is_numeric($this->Nos->EditValue))
			$this->Nos->EditValue = FormatNumber($this->Nos->EditValue, -2, -2, -2, -2);
		

		// WBCPath
		$this->WBCPath->EditAttrs["class"] = "form-control";
		$this->WBCPath->EditCustomAttributes = "";
		if (!$this->WBCPath->Raw)
			$this->WBCPath->CurrentValue = HtmlDecode($this->WBCPath->CurrentValue);
		$this->WBCPath->EditValue = $this->WBCPath->CurrentValue;
		$this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

		// RBCPath
		$this->RBCPath->EditAttrs["class"] = "form-control";
		$this->RBCPath->EditCustomAttributes = "";
		if (!$this->RBCPath->Raw)
			$this->RBCPath->CurrentValue = HtmlDecode($this->RBCPath->CurrentValue);
		$this->RBCPath->EditValue = $this->RBCPath->CurrentValue;
		$this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

		// PTPath
		$this->PTPath->EditAttrs["class"] = "form-control";
		$this->PTPath->EditCustomAttributes = "";
		if (!$this->PTPath->Raw)
			$this->PTPath->CurrentValue = HtmlDecode($this->PTPath->CurrentValue);
		$this->PTPath->EditValue = $this->PTPath->CurrentValue;
		$this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

		// ActualAmt
		$this->ActualAmt->EditAttrs["class"] = "form-control";
		$this->ActualAmt->EditCustomAttributes = "";
		$this->ActualAmt->EditValue = $this->ActualAmt->CurrentValue;
		$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
		if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue))
			$this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
		

		// NoSign
		$this->NoSign->EditAttrs["class"] = "form-control";
		$this->NoSign->EditCustomAttributes = "";
		if (!$this->NoSign->Raw)
			$this->NoSign->CurrentValue = HtmlDecode($this->NoSign->CurrentValue);
		$this->NoSign->EditValue = $this->NoSign->CurrentValue;
		$this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

		// Barcode
		$this->_Barcode->EditAttrs["class"] = "form-control";
		$this->_Barcode->EditCustomAttributes = "";
		if (!$this->_Barcode->Raw)
			$this->_Barcode->CurrentValue = HtmlDecode($this->_Barcode->CurrentValue);
		$this->_Barcode->EditValue = $this->_Barcode->CurrentValue;
		$this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

		// ReadTime
		$this->ReadTime->EditAttrs["class"] = "form-control";
		$this->ReadTime->EditCustomAttributes = "";
		$this->ReadTime->EditValue = FormatDateTime($this->ReadTime->CurrentValue, 8);
		$this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

		// Result
		$this->Result->EditAttrs["class"] = "form-control";
		$this->Result->EditCustomAttributes = "";
		$this->Result->EditValue = $this->Result->CurrentValue;
		$this->Result->PlaceHolder = RemoveHtml($this->Result->caption());

		// VailID
		$this->VailID->EditAttrs["class"] = "form-control";
		$this->VailID->EditCustomAttributes = "";
		if (!$this->VailID->Raw)
			$this->VailID->CurrentValue = HtmlDecode($this->VailID->CurrentValue);
		$this->VailID->EditValue = $this->VailID->CurrentValue;
		$this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

		// ReadMachine
		$this->ReadMachine->EditAttrs["class"] = "form-control";
		$this->ReadMachine->EditCustomAttributes = "";
		if (!$this->ReadMachine->Raw)
			$this->ReadMachine->CurrentValue = HtmlDecode($this->ReadMachine->CurrentValue);
		$this->ReadMachine->EditValue = $this->ReadMachine->CurrentValue;
		$this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

		// LabCD
		$this->LabCD->EditAttrs["class"] = "form-control";
		$this->LabCD->EditCustomAttributes = "";
		if (!$this->LabCD->Raw)
			$this->LabCD->CurrentValue = HtmlDecode($this->LabCD->CurrentValue);
		$this->LabCD->EditValue = $this->LabCD->CurrentValue;
		$this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

		// OutLabAmt
		$this->OutLabAmt->EditAttrs["class"] = "form-control";
		$this->OutLabAmt->EditCustomAttributes = "";
		$this->OutLabAmt->EditValue = $this->OutLabAmt->CurrentValue;
		$this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());
		if (strval($this->OutLabAmt->EditValue) != "" && is_numeric($this->OutLabAmt->EditValue))
			$this->OutLabAmt->EditValue = FormatNumber($this->OutLabAmt->EditValue, -2, -2, -2, -2);
		

		// ProductQty
		$this->ProductQty->EditAttrs["class"] = "form-control";
		$this->ProductQty->EditCustomAttributes = "";
		$this->ProductQty->EditValue = $this->ProductQty->CurrentValue;
		$this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());
		if (strval($this->ProductQty->EditValue) != "" && is_numeric($this->ProductQty->EditValue))
			$this->ProductQty->EditValue = FormatNumber($this->ProductQty->EditValue, -2, -2, -2, -2);
		

		// Repeat
		$this->Repeat->EditAttrs["class"] = "form-control";
		$this->Repeat->EditCustomAttributes = "";
		if (!$this->Repeat->Raw)
			$this->Repeat->CurrentValue = HtmlDecode($this->Repeat->CurrentValue);
		$this->Repeat->EditValue = $this->Repeat->CurrentValue;
		$this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

		// DeptNo
		$this->DeptNo->EditAttrs["class"] = "form-control";
		$this->DeptNo->EditCustomAttributes = "";
		if (!$this->DeptNo->Raw)
			$this->DeptNo->CurrentValue = HtmlDecode($this->DeptNo->CurrentValue);
		$this->DeptNo->EditValue = $this->DeptNo->CurrentValue;
		$this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

		// Desc1
		$this->Desc1->EditAttrs["class"] = "form-control";
		$this->Desc1->EditCustomAttributes = "";
		if (!$this->Desc1->Raw)
			$this->Desc1->CurrentValue = HtmlDecode($this->Desc1->CurrentValue);
		$this->Desc1->EditValue = $this->Desc1->CurrentValue;
		$this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

		// Desc2
		$this->Desc2->EditAttrs["class"] = "form-control";
		$this->Desc2->EditCustomAttributes = "";
		if (!$this->Desc2->Raw)
			$this->Desc2->CurrentValue = HtmlDecode($this->Desc2->CurrentValue);
		$this->Desc2->EditValue = $this->Desc2->CurrentValue;
		$this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

		// RptResult
		$this->RptResult->EditAttrs["class"] = "form-control";
		$this->RptResult->EditCustomAttributes = "";
		if (!$this->RptResult->Raw)
			$this->RptResult->CurrentValue = HtmlDecode($this->RptResult->CurrentValue);
		$this->RptResult->EditValue = $this->RptResult->CurrentValue;
		$this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());

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
					$doc->exportCaption($this->Branch);
					$doc->exportCaption($this->SidNo);
					$doc->exportCaption($this->SidDate);
					$doc->exportCaption($this->TestCd);
					$doc->exportCaption($this->TestSubCd);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->ProfCd);
					$doc->exportCaption($this->LabReport);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->Comments);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Specimen);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ResultBy);
					$doc->exportCaption($this->AuthBy);
					$doc->exportCaption($this->AuthDate);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->Dispatch);
					$doc->exportCaption($this->LOWHIGH);
					$doc->exportCaption($this->RefValue);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->ResDate);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->GraphPath);
					$doc->exportCaption($this->SampleDate);
					$doc->exportCaption($this->SampleUser);
					$doc->exportCaption($this->ReceivedDate);
					$doc->exportCaption($this->ReceivedUser);
					$doc->exportCaption($this->DeptRecvDate);
					$doc->exportCaption($this->DeptRecvUser);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
					$doc->exportCaption($this->MachineCD);
					$doc->exportCaption($this->TestCancel);
					$doc->exportCaption($this->OutSource);
					$doc->exportCaption($this->Tariff);
					$doc->exportCaption($this->EDITDATE);
					$doc->exportCaption($this->UPLOAD);
					$doc->exportCaption($this->SAuthDate);
					$doc->exportCaption($this->SAuthBy);
					$doc->exportCaption($this->NoRC);
					$doc->exportCaption($this->DispDt);
					$doc->exportCaption($this->DispUser);
					$doc->exportCaption($this->DispRemarks);
					$doc->exportCaption($this->DispMode);
					$doc->exportCaption($this->ProductCD);
					$doc->exportCaption($this->Nos);
					$doc->exportCaption($this->WBCPath);
					$doc->exportCaption($this->RBCPath);
					$doc->exportCaption($this->PTPath);
					$doc->exportCaption($this->ActualAmt);
					$doc->exportCaption($this->NoSign);
					$doc->exportCaption($this->_Barcode);
					$doc->exportCaption($this->ReadTime);
					$doc->exportCaption($this->Result);
					$doc->exportCaption($this->VailID);
					$doc->exportCaption($this->ReadMachine);
					$doc->exportCaption($this->LabCD);
					$doc->exportCaption($this->OutLabAmt);
					$doc->exportCaption($this->ProductQty);
					$doc->exportCaption($this->Repeat);
					$doc->exportCaption($this->DeptNo);
					$doc->exportCaption($this->Desc1);
					$doc->exportCaption($this->Desc2);
					$doc->exportCaption($this->RptResult);
				} else {
					$doc->exportCaption($this->Branch);
					$doc->exportCaption($this->SidNo);
					$doc->exportCaption($this->SidDate);
					$doc->exportCaption($this->TestCd);
					$doc->exportCaption($this->TestSubCd);
					$doc->exportCaption($this->DEptCd);
					$doc->exportCaption($this->ProfCd);
					$doc->exportCaption($this->ResultDate);
					$doc->exportCaption($this->Method);
					$doc->exportCaption($this->Specimen);
					$doc->exportCaption($this->Amount);
					$doc->exportCaption($this->ResultBy);
					$doc->exportCaption($this->AuthBy);
					$doc->exportCaption($this->AuthDate);
					$doc->exportCaption($this->Abnormal);
					$doc->exportCaption($this->Printed);
					$doc->exportCaption($this->Dispatch);
					$doc->exportCaption($this->LOWHIGH);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->ResDate);
					$doc->exportCaption($this->Pic1);
					$doc->exportCaption($this->Pic2);
					$doc->exportCaption($this->GraphPath);
					$doc->exportCaption($this->SampleDate);
					$doc->exportCaption($this->SampleUser);
					$doc->exportCaption($this->ReceivedDate);
					$doc->exportCaption($this->ReceivedUser);
					$doc->exportCaption($this->DeptRecvDate);
					$doc->exportCaption($this->DeptRecvUser);
					$doc->exportCaption($this->PrintBy);
					$doc->exportCaption($this->PrintDate);
					$doc->exportCaption($this->MachineCD);
					$doc->exportCaption($this->TestCancel);
					$doc->exportCaption($this->OutSource);
					$doc->exportCaption($this->Tariff);
					$doc->exportCaption($this->EDITDATE);
					$doc->exportCaption($this->UPLOAD);
					$doc->exportCaption($this->SAuthDate);
					$doc->exportCaption($this->SAuthBy);
					$doc->exportCaption($this->NoRC);
					$doc->exportCaption($this->DispDt);
					$doc->exportCaption($this->DispUser);
					$doc->exportCaption($this->DispRemarks);
					$doc->exportCaption($this->DispMode);
					$doc->exportCaption($this->ProductCD);
					$doc->exportCaption($this->Nos);
					$doc->exportCaption($this->WBCPath);
					$doc->exportCaption($this->RBCPath);
					$doc->exportCaption($this->PTPath);
					$doc->exportCaption($this->ActualAmt);
					$doc->exportCaption($this->NoSign);
					$doc->exportCaption($this->_Barcode);
					$doc->exportCaption($this->ReadTime);
					$doc->exportCaption($this->VailID);
					$doc->exportCaption($this->ReadMachine);
					$doc->exportCaption($this->LabCD);
					$doc->exportCaption($this->OutLabAmt);
					$doc->exportCaption($this->ProductQty);
					$doc->exportCaption($this->Repeat);
					$doc->exportCaption($this->DeptNo);
					$doc->exportCaption($this->Desc1);
					$doc->exportCaption($this->Desc2);
					$doc->exportCaption($this->RptResult);
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
						$doc->exportField($this->Branch);
						$doc->exportField($this->SidNo);
						$doc->exportField($this->SidDate);
						$doc->exportField($this->TestCd);
						$doc->exportField($this->TestSubCd);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->ProfCd);
						$doc->exportField($this->LabReport);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->Comments);
						$doc->exportField($this->Method);
						$doc->exportField($this->Specimen);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ResultBy);
						$doc->exportField($this->AuthBy);
						$doc->exportField($this->AuthDate);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->Printed);
						$doc->exportField($this->Dispatch);
						$doc->exportField($this->LOWHIGH);
						$doc->exportField($this->RefValue);
						$doc->exportField($this->Unit);
						$doc->exportField($this->ResDate);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->GraphPath);
						$doc->exportField($this->SampleDate);
						$doc->exportField($this->SampleUser);
						$doc->exportField($this->ReceivedDate);
						$doc->exportField($this->ReceivedUser);
						$doc->exportField($this->DeptRecvDate);
						$doc->exportField($this->DeptRecvUser);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
						$doc->exportField($this->MachineCD);
						$doc->exportField($this->TestCancel);
						$doc->exportField($this->OutSource);
						$doc->exportField($this->Tariff);
						$doc->exportField($this->EDITDATE);
						$doc->exportField($this->UPLOAD);
						$doc->exportField($this->SAuthDate);
						$doc->exportField($this->SAuthBy);
						$doc->exportField($this->NoRC);
						$doc->exportField($this->DispDt);
						$doc->exportField($this->DispUser);
						$doc->exportField($this->DispRemarks);
						$doc->exportField($this->DispMode);
						$doc->exportField($this->ProductCD);
						$doc->exportField($this->Nos);
						$doc->exportField($this->WBCPath);
						$doc->exportField($this->RBCPath);
						$doc->exportField($this->PTPath);
						$doc->exportField($this->ActualAmt);
						$doc->exportField($this->NoSign);
						$doc->exportField($this->_Barcode);
						$doc->exportField($this->ReadTime);
						$doc->exportField($this->Result);
						$doc->exportField($this->VailID);
						$doc->exportField($this->ReadMachine);
						$doc->exportField($this->LabCD);
						$doc->exportField($this->OutLabAmt);
						$doc->exportField($this->ProductQty);
						$doc->exportField($this->Repeat);
						$doc->exportField($this->DeptNo);
						$doc->exportField($this->Desc1);
						$doc->exportField($this->Desc2);
						$doc->exportField($this->RptResult);
					} else {
						$doc->exportField($this->Branch);
						$doc->exportField($this->SidNo);
						$doc->exportField($this->SidDate);
						$doc->exportField($this->TestCd);
						$doc->exportField($this->TestSubCd);
						$doc->exportField($this->DEptCd);
						$doc->exportField($this->ProfCd);
						$doc->exportField($this->ResultDate);
						$doc->exportField($this->Method);
						$doc->exportField($this->Specimen);
						$doc->exportField($this->Amount);
						$doc->exportField($this->ResultBy);
						$doc->exportField($this->AuthBy);
						$doc->exportField($this->AuthDate);
						$doc->exportField($this->Abnormal);
						$doc->exportField($this->Printed);
						$doc->exportField($this->Dispatch);
						$doc->exportField($this->LOWHIGH);
						$doc->exportField($this->Unit);
						$doc->exportField($this->ResDate);
						$doc->exportField($this->Pic1);
						$doc->exportField($this->Pic2);
						$doc->exportField($this->GraphPath);
						$doc->exportField($this->SampleDate);
						$doc->exportField($this->SampleUser);
						$doc->exportField($this->ReceivedDate);
						$doc->exportField($this->ReceivedUser);
						$doc->exportField($this->DeptRecvDate);
						$doc->exportField($this->DeptRecvUser);
						$doc->exportField($this->PrintBy);
						$doc->exportField($this->PrintDate);
						$doc->exportField($this->MachineCD);
						$doc->exportField($this->TestCancel);
						$doc->exportField($this->OutSource);
						$doc->exportField($this->Tariff);
						$doc->exportField($this->EDITDATE);
						$doc->exportField($this->UPLOAD);
						$doc->exportField($this->SAuthDate);
						$doc->exportField($this->SAuthBy);
						$doc->exportField($this->NoRC);
						$doc->exportField($this->DispDt);
						$doc->exportField($this->DispUser);
						$doc->exportField($this->DispRemarks);
						$doc->exportField($this->DispMode);
						$doc->exportField($this->ProductCD);
						$doc->exportField($this->Nos);
						$doc->exportField($this->WBCPath);
						$doc->exportField($this->RBCPath);
						$doc->exportField($this->PTPath);
						$doc->exportField($this->ActualAmt);
						$doc->exportField($this->NoSign);
						$doc->exportField($this->_Barcode);
						$doc->exportField($this->ReadTime);
						$doc->exportField($this->VailID);
						$doc->exportField($this->ReadMachine);
						$doc->exportField($this->LabCD);
						$doc->exportField($this->OutLabAmt);
						$doc->exportField($this->ProductQty);
						$doc->exportField($this->Repeat);
						$doc->exportField($this->DeptNo);
						$doc->exportField($this->Desc1);
						$doc->exportField($this->Desc2);
						$doc->exportField($this->RptResult);
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