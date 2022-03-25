<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for lab_test_result
 */
class LabTestResult extends DbTable
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

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'lab_test_result';
        $this->TableName = 'lab_test_result';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`lab_test_result`";
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

        // Branch
        $this->Branch = new DbField('lab_test_result', 'lab_test_result', 'x_Branch', 'Branch', '`Branch`', '`Branch`', 200, 4, -1, false, '`Branch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Branch->Nullable = false; // NOT NULL field
        $this->Branch->Required = true; // Required field
        $this->Branch->Sortable = true; // Allow sort
        $this->Branch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Branch->Param, "CustomMsg");
        $this->Fields['Branch'] = &$this->Branch;

        // SidNo
        $this->SidNo = new DbField('lab_test_result', 'lab_test_result', 'x_SidNo', 'SidNo', '`SidNo`', '`SidNo`', 200, 6, -1, false, '`SidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SidNo->Nullable = false; // NOT NULL field
        $this->SidNo->Required = true; // Required field
        $this->SidNo->Sortable = true; // Allow sort
        $this->SidNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SidNo->Param, "CustomMsg");
        $this->Fields['SidNo'] = &$this->SidNo;

        // SidDate
        $this->SidDate = new DbField('lab_test_result', 'lab_test_result', 'x_SidDate', 'SidDate', '`SidDate`', CastDateFieldForLike("`SidDate`", 0, "DB"), 135, 23, 0, false, '`SidDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SidDate->Sortable = true; // Allow sort
        $this->SidDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->SidDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SidDate->Param, "CustomMsg");
        $this->Fields['SidDate'] = &$this->SidDate;

        // TestCd
        $this->TestCd = new DbField('lab_test_result', 'lab_test_result', 'x_TestCd', 'TestCd', '`TestCd`', '`TestCd`', 200, 6, -1, false, '`TestCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestCd->Nullable = false; // NOT NULL field
        $this->TestCd->Required = true; // Required field
        $this->TestCd->Sortable = true; // Allow sort
        $this->TestCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestCd->Param, "CustomMsg");
        $this->Fields['TestCd'] = &$this->TestCd;

        // TestSubCd
        $this->TestSubCd = new DbField('lab_test_result', 'lab_test_result', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 3, -1, false, '`TestSubCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestSubCd->Nullable = false; // NOT NULL field
        $this->TestSubCd->Required = true; // Required field
        $this->TestSubCd->Sortable = true; // Allow sort
        $this->TestSubCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestSubCd->Param, "CustomMsg");
        $this->Fields['TestSubCd'] = &$this->TestSubCd;

        // DEptCd
        $this->DEptCd = new DbField('lab_test_result', 'lab_test_result', 'x_DEptCd', 'DEptCd', '`DEptCd`', '`DEptCd`', 200, 2, -1, false, '`DEptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DEptCd->Nullable = false; // NOT NULL field
        $this->DEptCd->Required = true; // Required field
        $this->DEptCd->Sortable = true; // Allow sort
        $this->DEptCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DEptCd->Param, "CustomMsg");
        $this->Fields['DEptCd'] = &$this->DEptCd;

        // ProfCd
        $this->ProfCd = new DbField('lab_test_result', 'lab_test_result', 'x_ProfCd', 'ProfCd', '`ProfCd`', '`ProfCd`', 200, 6, -1, false, '`ProfCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProfCd->Nullable = false; // NOT NULL field
        $this->ProfCd->Required = true; // Required field
        $this->ProfCd->Sortable = true; // Allow sort
        $this->ProfCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProfCd->Param, "CustomMsg");
        $this->Fields['ProfCd'] = &$this->ProfCd;

        // LabReport
        $this->LabReport = new DbField('lab_test_result', 'lab_test_result', 'x_LabReport', 'LabReport', '`LabReport`', '`LabReport`', 201, 6000, -1, false, '`LabReport`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LabReport->Nullable = false; // NOT NULL field
        $this->LabReport->Required = true; // Required field
        $this->LabReport->Sortable = true; // Allow sort
        $this->LabReport->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LabReport->Param, "CustomMsg");
        $this->Fields['LabReport'] = &$this->LabReport;

        // ResultDate
        $this->ResultDate = new DbField('lab_test_result', 'lab_test_result', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 23, 0, false, '`ResultDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultDate->Sortable = true; // Allow sort
        $this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ResultDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultDate->Param, "CustomMsg");
        $this->Fields['ResultDate'] = &$this->ResultDate;

        // Comments
        $this->Comments = new DbField('lab_test_result', 'lab_test_result', 'x_Comments', 'Comments', '`Comments`', '`Comments`', 201, 2000, -1, false, '`Comments`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Comments->Nullable = false; // NOT NULL field
        $this->Comments->Required = true; // Required field
        $this->Comments->Sortable = true; // Allow sort
        $this->Comments->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Comments->Param, "CustomMsg");
        $this->Fields['Comments'] = &$this->Comments;

        // Method
        $this->Method = new DbField('lab_test_result', 'lab_test_result', 'x_Method', 'Method', '`Method`', '`Method`', 200, 50, -1, false, '`Method`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Method->Nullable = false; // NOT NULL field
        $this->Method->Required = true; // Required field
        $this->Method->Sortable = true; // Allow sort
        $this->Method->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Method->Param, "CustomMsg");
        $this->Fields['Method'] = &$this->Method;

        // Specimen
        $this->Specimen = new DbField('lab_test_result', 'lab_test_result', 'x_Specimen', 'Specimen', '`Specimen`', '`Specimen`', 200, 50, -1, false, '`Specimen`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Specimen->Nullable = false; // NOT NULL field
        $this->Specimen->Required = true; // Required field
        $this->Specimen->Sortable = true; // Allow sort
        $this->Specimen->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Specimen->Param, "CustomMsg");
        $this->Fields['Specimen'] = &$this->Specimen;

        // Amount
        $this->Amount = new DbField('lab_test_result', 'lab_test_result', 'x_Amount', 'Amount', '`Amount`', '`Amount`', 131, 9, -1, false, '`Amount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amount->Nullable = false; // NOT NULL field
        $this->Amount->Required = true; // Required field
        $this->Amount->Sortable = true; // Allow sort
        $this->Amount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amount->Param, "CustomMsg");
        $this->Fields['Amount'] = &$this->Amount;

        // ResultBy
        $this->ResultBy = new DbField('lab_test_result', 'lab_test_result', 'x_ResultBy', 'ResultBy', '`ResultBy`', '`ResultBy`', 200, 20, -1, false, '`ResultBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultBy->Nullable = false; // NOT NULL field
        $this->ResultBy->Required = true; // Required field
        $this->ResultBy->Sortable = true; // Allow sort
        $this->ResultBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResultBy->Param, "CustomMsg");
        $this->Fields['ResultBy'] = &$this->ResultBy;

        // AuthBy
        $this->AuthBy = new DbField('lab_test_result', 'lab_test_result', 'x_AuthBy', 'AuthBy', '`AuthBy`', '`AuthBy`', 200, 20, -1, false, '`AuthBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AuthBy->Nullable = false; // NOT NULL field
        $this->AuthBy->Required = true; // Required field
        $this->AuthBy->Sortable = true; // Allow sort
        $this->AuthBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AuthBy->Param, "CustomMsg");
        $this->Fields['AuthBy'] = &$this->AuthBy;

        // AuthDate
        $this->AuthDate = new DbField('lab_test_result', 'lab_test_result', 'x_AuthDate', 'AuthDate', '`AuthDate`', CastDateFieldForLike("`AuthDate`", 0, "DB"), 135, 23, 0, false, '`AuthDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AuthDate->Sortable = true; // Allow sort
        $this->AuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->AuthDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AuthDate->Param, "CustomMsg");
        $this->Fields['AuthDate'] = &$this->AuthDate;

        // Abnormal
        $this->Abnormal = new DbField('lab_test_result', 'lab_test_result', 'x_Abnormal', 'Abnormal', '`Abnormal`', '`Abnormal`', 200, 1, -1, false, '`Abnormal`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abnormal->Nullable = false; // NOT NULL field
        $this->Abnormal->Required = true; // Required field
        $this->Abnormal->Sortable = true; // Allow sort
        $this->Abnormal->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Abnormal->Param, "CustomMsg");
        $this->Fields['Abnormal'] = &$this->Abnormal;

        // Printed
        $this->Printed = new DbField('lab_test_result', 'lab_test_result', 'x_Printed', 'Printed', '`Printed`', '`Printed`', 200, 1, -1, false, '`Printed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Printed->Nullable = false; // NOT NULL field
        $this->Printed->Required = true; // Required field
        $this->Printed->Sortable = true; // Allow sort
        $this->Printed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Printed->Param, "CustomMsg");
        $this->Fields['Printed'] = &$this->Printed;

        // Dispatch
        $this->Dispatch = new DbField('lab_test_result', 'lab_test_result', 'x_Dispatch', 'Dispatch', '`Dispatch`', '`Dispatch`', 200, 1, -1, false, '`Dispatch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Dispatch->Nullable = false; // NOT NULL field
        $this->Dispatch->Required = true; // Required field
        $this->Dispatch->Sortable = true; // Allow sort
        $this->Dispatch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Dispatch->Param, "CustomMsg");
        $this->Fields['Dispatch'] = &$this->Dispatch;

        // LOWHIGH
        $this->LOWHIGH = new DbField('lab_test_result', 'lab_test_result', 'x_LOWHIGH', 'LOWHIGH', '`LOWHIGH`', '`LOWHIGH`', 200, 1, -1, false, '`LOWHIGH`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LOWHIGH->Nullable = false; // NOT NULL field
        $this->LOWHIGH->Required = true; // Required field
        $this->LOWHIGH->Sortable = true; // Allow sort
        $this->LOWHIGH->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LOWHIGH->Param, "CustomMsg");
        $this->Fields['LOWHIGH'] = &$this->LOWHIGH;

        // RefValue
        $this->RefValue = new DbField('lab_test_result', 'lab_test_result', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 1000, -1, false, '`RefValue`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RefValue->Nullable = false; // NOT NULL field
        $this->RefValue->Required = true; // Required field
        $this->RefValue->Sortable = true; // Allow sort
        $this->RefValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefValue->Param, "CustomMsg");
        $this->Fields['RefValue'] = &$this->RefValue;

        // Unit
        $this->Unit = new DbField('lab_test_result', 'lab_test_result', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, 20, -1, false, '`Unit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Unit->Nullable = false; // NOT NULL field
        $this->Unit->Required = true; // Required field
        $this->Unit->Sortable = true; // Allow sort
        $this->Unit->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Unit->Param, "CustomMsg");
        $this->Fields['Unit'] = &$this->Unit;

        // ResDate
        $this->ResDate = new DbField('lab_test_result', 'lab_test_result', 'x_ResDate', 'ResDate', '`ResDate`', CastDateFieldForLike("`ResDate`", 0, "DB"), 135, 23, 0, false, '`ResDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResDate->Sortable = true; // Allow sort
        $this->ResDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ResDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResDate->Param, "CustomMsg");
        $this->Fields['ResDate'] = &$this->ResDate;

        // Pic1
        $this->Pic1 = new DbField('lab_test_result', 'lab_test_result', 'x_Pic1', 'Pic1', '`Pic1`', '`Pic1`', 200, 200, -1, false, '`Pic1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pic1->Nullable = false; // NOT NULL field
        $this->Pic1->Required = true; // Required field
        $this->Pic1->Sortable = true; // Allow sort
        $this->Pic1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pic1->Param, "CustomMsg");
        $this->Fields['Pic1'] = &$this->Pic1;

        // Pic2
        $this->Pic2 = new DbField('lab_test_result', 'lab_test_result', 'x_Pic2', 'Pic2', '`Pic2`', '`Pic2`', 200, 200, -1, false, '`Pic2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pic2->Nullable = false; // NOT NULL field
        $this->Pic2->Required = true; // Required field
        $this->Pic2->Sortable = true; // Allow sort
        $this->Pic2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pic2->Param, "CustomMsg");
        $this->Fields['Pic2'] = &$this->Pic2;

        // GraphPath
        $this->GraphPath = new DbField('lab_test_result', 'lab_test_result', 'x_GraphPath', 'GraphPath', '`GraphPath`', '`GraphPath`', 200, 200, -1, false, '`GraphPath`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GraphPath->Nullable = false; // NOT NULL field
        $this->GraphPath->Required = true; // Required field
        $this->GraphPath->Sortable = true; // Allow sort
        $this->GraphPath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GraphPath->Param, "CustomMsg");
        $this->Fields['GraphPath'] = &$this->GraphPath;

        // SampleDate
        $this->SampleDate = new DbField('lab_test_result', 'lab_test_result', 'x_SampleDate', 'SampleDate', '`SampleDate`', CastDateFieldForLike("`SampleDate`", 0, "DB"), 135, 23, 0, false, '`SampleDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleDate->Sortable = true; // Allow sort
        $this->SampleDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->SampleDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SampleDate->Param, "CustomMsg");
        $this->Fields['SampleDate'] = &$this->SampleDate;

        // SampleUser
        $this->SampleUser = new DbField('lab_test_result', 'lab_test_result', 'x_SampleUser', 'SampleUser', '`SampleUser`', '`SampleUser`', 200, 10, -1, false, '`SampleUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SampleUser->Nullable = false; // NOT NULL field
        $this->SampleUser->Required = true; // Required field
        $this->SampleUser->Sortable = true; // Allow sort
        $this->SampleUser->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SampleUser->Param, "CustomMsg");
        $this->Fields['SampleUser'] = &$this->SampleUser;

        // ReceivedDate
        $this->ReceivedDate = new DbField('lab_test_result', 'lab_test_result', 'x_ReceivedDate', 'ReceivedDate', '`ReceivedDate`', CastDateFieldForLike("`ReceivedDate`", 0, "DB"), 135, 23, 0, false, '`ReceivedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedDate->Sortable = true; // Allow sort
        $this->ReceivedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ReceivedDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReceivedDate->Param, "CustomMsg");
        $this->Fields['ReceivedDate'] = &$this->ReceivedDate;

        // ReceivedUser
        $this->ReceivedUser = new DbField('lab_test_result', 'lab_test_result', 'x_ReceivedUser', 'ReceivedUser', '`ReceivedUser`', '`ReceivedUser`', 200, 10, -1, false, '`ReceivedUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReceivedUser->Nullable = false; // NOT NULL field
        $this->ReceivedUser->Required = true; // Required field
        $this->ReceivedUser->Sortable = true; // Allow sort
        $this->ReceivedUser->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReceivedUser->Param, "CustomMsg");
        $this->Fields['ReceivedUser'] = &$this->ReceivedUser;

        // DeptRecvDate
        $this->DeptRecvDate = new DbField('lab_test_result', 'lab_test_result', 'x_DeptRecvDate', 'DeptRecvDate', '`DeptRecvDate`', CastDateFieldForLike("`DeptRecvDate`", 0, "DB"), 135, 23, 0, false, '`DeptRecvDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptRecvDate->Sortable = true; // Allow sort
        $this->DeptRecvDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DeptRecvDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeptRecvDate->Param, "CustomMsg");
        $this->Fields['DeptRecvDate'] = &$this->DeptRecvDate;

        // DeptRecvUser
        $this->DeptRecvUser = new DbField('lab_test_result', 'lab_test_result', 'x_DeptRecvUser', 'DeptRecvUser', '`DeptRecvUser`', '`DeptRecvUser`', 200, 10, -1, false, '`DeptRecvUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptRecvUser->Nullable = false; // NOT NULL field
        $this->DeptRecvUser->Required = true; // Required field
        $this->DeptRecvUser->Sortable = true; // Allow sort
        $this->DeptRecvUser->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeptRecvUser->Param, "CustomMsg");
        $this->Fields['DeptRecvUser'] = &$this->DeptRecvUser;

        // PrintBy
        $this->PrintBy = new DbField('lab_test_result', 'lab_test_result', 'x_PrintBy', 'PrintBy', '`PrintBy`', '`PrintBy`', 200, 10, -1, false, '`PrintBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrintBy->Nullable = false; // NOT NULL field
        $this->PrintBy->Required = true; // Required field
        $this->PrintBy->Sortable = true; // Allow sort
        $this->PrintBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrintBy->Param, "CustomMsg");
        $this->Fields['PrintBy'] = &$this->PrintBy;

        // PrintDate
        $this->PrintDate = new DbField('lab_test_result', 'lab_test_result', 'x_PrintDate', 'PrintDate', '`PrintDate`', CastDateFieldForLike("`PrintDate`", 0, "DB"), 135, 23, 0, false, '`PrintDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrintDate->Sortable = true; // Allow sort
        $this->PrintDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->PrintDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrintDate->Param, "CustomMsg");
        $this->Fields['PrintDate'] = &$this->PrintDate;

        // MachineCD
        $this->MachineCD = new DbField('lab_test_result', 'lab_test_result', 'x_MachineCD', 'MachineCD', '`MachineCD`', '`MachineCD`', 200, 10, -1, false, '`MachineCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MachineCD->Nullable = false; // NOT NULL field
        $this->MachineCD->Required = true; // Required field
        $this->MachineCD->Sortable = true; // Allow sort
        $this->MachineCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MachineCD->Param, "CustomMsg");
        $this->Fields['MachineCD'] = &$this->MachineCD;

        // TestCancel
        $this->TestCancel = new DbField('lab_test_result', 'lab_test_result', 'x_TestCancel', 'TestCancel', '`TestCancel`', '`TestCancel`', 200, 1, -1, false, '`TestCancel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestCancel->Nullable = false; // NOT NULL field
        $this->TestCancel->Required = true; // Required field
        $this->TestCancel->Sortable = true; // Allow sort
        $this->TestCancel->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestCancel->Param, "CustomMsg");
        $this->Fields['TestCancel'] = &$this->TestCancel;

        // OutSource
        $this->OutSource = new DbField('lab_test_result', 'lab_test_result', 'x_OutSource', 'OutSource', '`OutSource`', '`OutSource`', 200, 1, -1, false, '`OutSource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OutSource->Nullable = false; // NOT NULL field
        $this->OutSource->Required = true; // Required field
        $this->OutSource->Sortable = true; // Allow sort
        $this->OutSource->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OutSource->Param, "CustomMsg");
        $this->Fields['OutSource'] = &$this->OutSource;

        // Tariff
        $this->Tariff = new DbField('lab_test_result', 'lab_test_result', 'x_Tariff', 'Tariff', '`Tariff`', '`Tariff`', 131, 9, -1, false, '`Tariff`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tariff->Nullable = false; // NOT NULL field
        $this->Tariff->Required = true; // Required field
        $this->Tariff->Sortable = true; // Allow sort
        $this->Tariff->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Tariff->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Tariff->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tariff->Param, "CustomMsg");
        $this->Fields['Tariff'] = &$this->Tariff;

        // EDITDATE
        $this->EDITDATE = new DbField('lab_test_result', 'lab_test_result', 'x_EDITDATE', 'EDITDATE', '`EDITDATE`', CastDateFieldForLike("`EDITDATE`", 0, "DB"), 135, 23, 0, false, '`EDITDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EDITDATE->Sortable = true; // Allow sort
        $this->EDITDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EDITDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EDITDATE->Param, "CustomMsg");
        $this->Fields['EDITDATE'] = &$this->EDITDATE;

        // UPLOAD
        $this->UPLOAD = new DbField('lab_test_result', 'lab_test_result', 'x_UPLOAD', 'UPLOAD', '`UPLOAD`', '`UPLOAD`', 200, 1, -1, false, '`UPLOAD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UPLOAD->Nullable = false; // NOT NULL field
        $this->UPLOAD->Required = true; // Required field
        $this->UPLOAD->Sortable = true; // Allow sort
        $this->UPLOAD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPLOAD->Param, "CustomMsg");
        $this->Fields['UPLOAD'] = &$this->UPLOAD;

        // SAuthDate
        $this->SAuthDate = new DbField('lab_test_result', 'lab_test_result', 'x_SAuthDate', 'SAuthDate', '`SAuthDate`', CastDateFieldForLike("`SAuthDate`", 0, "DB"), 135, 23, 0, false, '`SAuthDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAuthDate->Sortable = true; // Allow sort
        $this->SAuthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->SAuthDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SAuthDate->Param, "CustomMsg");
        $this->Fields['SAuthDate'] = &$this->SAuthDate;

        // SAuthBy
        $this->SAuthBy = new DbField('lab_test_result', 'lab_test_result', 'x_SAuthBy', 'SAuthBy', '`SAuthBy`', '`SAuthBy`', 200, 3, -1, false, '`SAuthBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAuthBy->Nullable = false; // NOT NULL field
        $this->SAuthBy->Required = true; // Required field
        $this->SAuthBy->Sortable = true; // Allow sort
        $this->SAuthBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SAuthBy->Param, "CustomMsg");
        $this->Fields['SAuthBy'] = &$this->SAuthBy;

        // NoRC
        $this->NoRC = new DbField('lab_test_result', 'lab_test_result', 'x_NoRC', 'NoRC', '`NoRC`', '`NoRC`', 200, 1, -1, false, '`NoRC`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoRC->Nullable = false; // NOT NULL field
        $this->NoRC->Required = true; // Required field
        $this->NoRC->Sortable = true; // Allow sort
        $this->NoRC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoRC->Param, "CustomMsg");
        $this->Fields['NoRC'] = &$this->NoRC;

        // DispDt
        $this->DispDt = new DbField('lab_test_result', 'lab_test_result', 'x_DispDt', 'DispDt', '`DispDt`', CastDateFieldForLike("`DispDt`", 0, "DB"), 135, 23, 0, false, '`DispDt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DispDt->Sortable = true; // Allow sort
        $this->DispDt->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->DispDt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DispDt->Param, "CustomMsg");
        $this->Fields['DispDt'] = &$this->DispDt;

        // DispUser
        $this->DispUser = new DbField('lab_test_result', 'lab_test_result', 'x_DispUser', 'DispUser', '`DispUser`', '`DispUser`', 200, 10, -1, false, '`DispUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DispUser->Nullable = false; // NOT NULL field
        $this->DispUser->Required = true; // Required field
        $this->DispUser->Sortable = true; // Allow sort
        $this->DispUser->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DispUser->Param, "CustomMsg");
        $this->Fields['DispUser'] = &$this->DispUser;

        // DispRemarks
        $this->DispRemarks = new DbField('lab_test_result', 'lab_test_result', 'x_DispRemarks', 'DispRemarks', '`DispRemarks`', '`DispRemarks`', 200, 250, -1, false, '`DispRemarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DispRemarks->Nullable = false; // NOT NULL field
        $this->DispRemarks->Required = true; // Required field
        $this->DispRemarks->Sortable = true; // Allow sort
        $this->DispRemarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DispRemarks->Param, "CustomMsg");
        $this->Fields['DispRemarks'] = &$this->DispRemarks;

        // DispMode
        $this->DispMode = new DbField('lab_test_result', 'lab_test_result', 'x_DispMode', 'DispMode', '`DispMode`', '`DispMode`', 200, 50, -1, false, '`DispMode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DispMode->Nullable = false; // NOT NULL field
        $this->DispMode->Required = true; // Required field
        $this->DispMode->Sortable = true; // Allow sort
        $this->DispMode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DispMode->Param, "CustomMsg");
        $this->Fields['DispMode'] = &$this->DispMode;

        // ProductCD
        $this->ProductCD = new DbField('lab_test_result', 'lab_test_result', 'x_ProductCD', 'ProductCD', '`ProductCD`', '`ProductCD`', 200, 6, -1, false, '`ProductCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductCD->Nullable = false; // NOT NULL field
        $this->ProductCD->Required = true; // Required field
        $this->ProductCD->Sortable = true; // Allow sort
        $this->ProductCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProductCD->Param, "CustomMsg");
        $this->Fields['ProductCD'] = &$this->ProductCD;

        // Nos
        $this->Nos = new DbField('lab_test_result', 'lab_test_result', 'x_Nos', 'Nos', '`Nos`', '`Nos`', 131, 3, -1, false, '`Nos`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Nos->Sortable = true; // Allow sort
        $this->Nos->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Nos->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Nos->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Nos->Param, "CustomMsg");
        $this->Fields['Nos'] = &$this->Nos;

        // WBCPath
        $this->WBCPath = new DbField('lab_test_result', 'lab_test_result', 'x_WBCPath', 'WBCPath', '`WBCPath`', '`WBCPath`', 200, 100, -1, false, '`WBCPath`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WBCPath->Nullable = false; // NOT NULL field
        $this->WBCPath->Required = true; // Required field
        $this->WBCPath->Sortable = true; // Allow sort
        $this->WBCPath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WBCPath->Param, "CustomMsg");
        $this->Fields['WBCPath'] = &$this->WBCPath;

        // RBCPath
        $this->RBCPath = new DbField('lab_test_result', 'lab_test_result', 'x_RBCPath', 'RBCPath', '`RBCPath`', '`RBCPath`', 200, 100, -1, false, '`RBCPath`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RBCPath->Nullable = false; // NOT NULL field
        $this->RBCPath->Required = true; // Required field
        $this->RBCPath->Sortable = true; // Allow sort
        $this->RBCPath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RBCPath->Param, "CustomMsg");
        $this->Fields['RBCPath'] = &$this->RBCPath;

        // PTPath
        $this->PTPath = new DbField('lab_test_result', 'lab_test_result', 'x_PTPath', 'PTPath', '`PTPath`', '`PTPath`', 200, 100, -1, false, '`PTPath`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PTPath->Nullable = false; // NOT NULL field
        $this->PTPath->Required = true; // Required field
        $this->PTPath->Sortable = true; // Allow sort
        $this->PTPath->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PTPath->Param, "CustomMsg");
        $this->Fields['PTPath'] = &$this->PTPath;

        // ActualAmt
        $this->ActualAmt = new DbField('lab_test_result', 'lab_test_result', 'x_ActualAmt', 'ActualAmt', '`ActualAmt`', '`ActualAmt`', 131, 9, -1, false, '`ActualAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ActualAmt->Nullable = false; // NOT NULL field
        $this->ActualAmt->Required = true; // Required field
        $this->ActualAmt->Sortable = true; // Allow sort
        $this->ActualAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ActualAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ActualAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ActualAmt->Param, "CustomMsg");
        $this->Fields['ActualAmt'] = &$this->ActualAmt;

        // NoSign
        $this->NoSign = new DbField('lab_test_result', 'lab_test_result', 'x_NoSign', 'NoSign', '`NoSign`', '`NoSign`', 200, 1, -1, false, '`NoSign`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoSign->Nullable = false; // NOT NULL field
        $this->NoSign->Required = true; // Required field
        $this->NoSign->Sortable = true; // Allow sort
        $this->NoSign->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoSign->Param, "CustomMsg");
        $this->Fields['NoSign'] = &$this->NoSign;

        // Barcode
        $this->_Barcode = new DbField('lab_test_result', 'lab_test_result', 'x__Barcode', 'Barcode', '`Barcode`', '`Barcode`', 200, 1, -1, false, '`Barcode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Barcode->Nullable = false; // NOT NULL field
        $this->_Barcode->Required = true; // Required field
        $this->_Barcode->Sortable = true; // Allow sort
        $this->_Barcode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_Barcode->Param, "CustomMsg");
        $this->Fields['Barcode'] = &$this->_Barcode;

        // ReadTime
        $this->ReadTime = new DbField('lab_test_result', 'lab_test_result', 'x_ReadTime', 'ReadTime', '`ReadTime`', CastDateFieldForLike("`ReadTime`", 0, "DB"), 135, 23, 0, false, '`ReadTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReadTime->Sortable = true; // Allow sort
        $this->ReadTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ReadTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReadTime->Param, "CustomMsg");
        $this->Fields['ReadTime'] = &$this->ReadTime;

        // Result
        $this->Result = new DbField('lab_test_result', 'lab_test_result', 'x_Result', 'Result', '`Result`', '`Result`', 201, 8000, -1, false, '`Result`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Result->Nullable = false; // NOT NULL field
        $this->Result->Required = true; // Required field
        $this->Result->Sortable = true; // Allow sort
        $this->Result->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Result->Param, "CustomMsg");
        $this->Fields['Result'] = &$this->Result;

        // VailID
        $this->VailID = new DbField('lab_test_result', 'lab_test_result', 'x_VailID', 'VailID', '`VailID`', '`VailID`', 200, 10, -1, false, '`VailID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->VailID->Nullable = false; // NOT NULL field
        $this->VailID->Required = true; // Required field
        $this->VailID->Sortable = true; // Allow sort
        $this->VailID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->VailID->Param, "CustomMsg");
        $this->Fields['VailID'] = &$this->VailID;

        // ReadMachine
        $this->ReadMachine = new DbField('lab_test_result', 'lab_test_result', 'x_ReadMachine', 'ReadMachine', '`ReadMachine`', '`ReadMachine`', 200, 20, -1, false, '`ReadMachine`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReadMachine->Nullable = false; // NOT NULL field
        $this->ReadMachine->Required = true; // Required field
        $this->ReadMachine->Sortable = true; // Allow sort
        $this->ReadMachine->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReadMachine->Param, "CustomMsg");
        $this->Fields['ReadMachine'] = &$this->ReadMachine;

        // LabCD
        $this->LabCD = new DbField('lab_test_result', 'lab_test_result', 'x_LabCD', 'LabCD', '`LabCD`', '`LabCD`', 200, 6, -1, false, '`LabCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LabCD->Nullable = false; // NOT NULL field
        $this->LabCD->Required = true; // Required field
        $this->LabCD->Sortable = true; // Allow sort
        $this->LabCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LabCD->Param, "CustomMsg");
        $this->Fields['LabCD'] = &$this->LabCD;

        // OutLabAmt
        $this->OutLabAmt = new DbField('lab_test_result', 'lab_test_result', 'x_OutLabAmt', 'OutLabAmt', '`OutLabAmt`', '`OutLabAmt`', 131, 9, -1, false, '`OutLabAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OutLabAmt->Nullable = false; // NOT NULL field
        $this->OutLabAmt->Required = true; // Required field
        $this->OutLabAmt->Sortable = true; // Allow sort
        $this->OutLabAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OutLabAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->OutLabAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OutLabAmt->Param, "CustomMsg");
        $this->Fields['OutLabAmt'] = &$this->OutLabAmt;

        // ProductQty
        $this->ProductQty = new DbField('lab_test_result', 'lab_test_result', 'x_ProductQty', 'ProductQty', '`ProductQty`', '`ProductQty`', 131, 3, -1, false, '`ProductQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductQty->Nullable = false; // NOT NULL field
        $this->ProductQty->Required = true; // Required field
        $this->ProductQty->Sortable = true; // Allow sort
        $this->ProductQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ProductQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ProductQty->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProductQty->Param, "CustomMsg");
        $this->Fields['ProductQty'] = &$this->ProductQty;

        // Repeat
        $this->Repeat = new DbField('lab_test_result', 'lab_test_result', 'x_Repeat', 'Repeat', '`Repeat`', '`Repeat`', 200, 1, -1, false, '`Repeat`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Repeat->Nullable = false; // NOT NULL field
        $this->Repeat->Required = true; // Required field
        $this->Repeat->Sortable = true; // Allow sort
        $this->Repeat->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Repeat->Param, "CustomMsg");
        $this->Fields['Repeat'] = &$this->Repeat;

        // DeptNo
        $this->DeptNo = new DbField('lab_test_result', 'lab_test_result', 'x_DeptNo', 'DeptNo', '`DeptNo`', '`DeptNo`', 200, 5, -1, false, '`DeptNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptNo->Nullable = false; // NOT NULL field
        $this->DeptNo->Required = true; // Required field
        $this->DeptNo->Sortable = true; // Allow sort
        $this->DeptNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeptNo->Param, "CustomMsg");
        $this->Fields['DeptNo'] = &$this->DeptNo;

        // Desc1
        $this->Desc1 = new DbField('lab_test_result', 'lab_test_result', 'x_Desc1', 'Desc1', '`Desc1`', '`Desc1`', 200, 200, -1, false, '`Desc1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Desc1->Nullable = false; // NOT NULL field
        $this->Desc1->Required = true; // Required field
        $this->Desc1->Sortable = true; // Allow sort
        $this->Desc1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Desc1->Param, "CustomMsg");
        $this->Fields['Desc1'] = &$this->Desc1;

        // Desc2
        $this->Desc2 = new DbField('lab_test_result', 'lab_test_result', 'x_Desc2', 'Desc2', '`Desc2`', '`Desc2`', 200, 200, -1, false, '`Desc2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Desc2->Nullable = false; // NOT NULL field
        $this->Desc2->Required = true; // Required field
        $this->Desc2->Sortable = true; // Allow sort
        $this->Desc2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Desc2->Param, "CustomMsg");
        $this->Fields['Desc2'] = &$this->Desc2;

        // RptResult
        $this->RptResult = new DbField('lab_test_result', 'lab_test_result', 'x_RptResult', 'RptResult', '`RptResult`', '`RptResult`', 200, 100, -1, false, '`RptResult`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RptResult->Nullable = false; // NOT NULL field
        $this->RptResult->Required = true; // Required field
        $this->RptResult->Sortable = true; // Allow sort
        $this->RptResult->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RptResult->Param, "CustomMsg");
        $this->Fields['RptResult'] = &$this->RptResult;
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

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 0) {
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
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
        return $_SESSION[$name] ?? GetUrl("LabTestResultList");
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
        if ($pageName == "LabTestResultView") {
            return $Language->phrase("View");
        } elseif ($pageName == "LabTestResultEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "LabTestResultAdd") {
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
                return "LabTestResultView";
            case Config("API_ADD_ACTION"):
                return "LabTestResultAdd";
            case Config("API_EDIT_ACTION"):
                return "LabTestResultEdit";
            case Config("API_DELETE_ACTION"):
                return "LabTestResultDelete";
            case Config("API_LIST_ACTION"):
                return "LabTestResultList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "LabTestResultList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("LabTestResultView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("LabTestResultView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "LabTestResultAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "LabTestResultAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("LabTestResultEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("LabTestResultAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("LabTestResultDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
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
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
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
        $this->Branch->setDbValue($row['Branch']);
        $this->SidNo->setDbValue($row['SidNo']);
        $this->SidDate->setDbValue($row['SidDate']);
        $this->TestCd->setDbValue($row['TestCd']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Amount->setDbValue($row['Amount']);
        $this->ResultBy->setDbValue($row['ResultBy']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Printed->setDbValue($row['Printed']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Unit->setDbValue($row['Unit']);
        $this->ResDate->setDbValue($row['ResDate']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Tariff->setDbValue($row['Tariff']);
        $this->EDITDATE->setDbValue($row['EDITDATE']);
        $this->UPLOAD->setDbValue($row['UPLOAD']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->NoRC->setDbValue($row['NoRC']);
        $this->DispDt->setDbValue($row['DispDt']);
        $this->DispUser->setDbValue($row['DispUser']);
        $this->DispRemarks->setDbValue($row['DispRemarks']);
        $this->DispMode->setDbValue($row['DispMode']);
        $this->ProductCD->setDbValue($row['ProductCD']);
        $this->Nos->setDbValue($row['Nos']);
        $this->WBCPath->setDbValue($row['WBCPath']);
        $this->RBCPath->setDbValue($row['RBCPath']);
        $this->PTPath->setDbValue($row['PTPath']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->NoSign->setDbValue($row['NoSign']);
        $this->_Barcode->setDbValue($row['Barcode']);
        $this->ReadTime->setDbValue($row['ReadTime']);
        $this->Result->setDbValue($row['Result']);
        $this->VailID->setDbValue($row['VailID']);
        $this->ReadMachine->setDbValue($row['ReadMachine']);
        $this->LabCD->setDbValue($row['LabCD']);
        $this->OutLabAmt->setDbValue($row['OutLabAmt']);
        $this->ProductQty->setDbValue($row['ProductQty']);
        $this->Repeat->setDbValue($row['Repeat']);
        $this->DeptNo->setDbValue($row['DeptNo']);
        $this->Desc1->setDbValue($row['Desc1']);
        $this->Desc2->setDbValue($row['Desc2']);
        $this->RptResult->setDbValue($row['RptResult']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

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

        // Branch
        $this->Branch->EditAttrs["class"] = "form-control";
        $this->Branch->EditCustomAttributes = "";
        if (!$this->Branch->Raw) {
            $this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
        }
        $this->Branch->EditValue = $this->Branch->CurrentValue;
        $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

        // SidNo
        $this->SidNo->EditAttrs["class"] = "form-control";
        $this->SidNo->EditCustomAttributes = "";
        if (!$this->SidNo->Raw) {
            $this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
        }
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
        if (!$this->TestCd->Raw) {
            $this->TestCd->CurrentValue = HtmlDecode($this->TestCd->CurrentValue);
        }
        $this->TestCd->EditValue = $this->TestCd->CurrentValue;
        $this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

        // TestSubCd
        $this->TestSubCd->EditAttrs["class"] = "form-control";
        $this->TestSubCd->EditCustomAttributes = "";
        if (!$this->TestSubCd->Raw) {
            $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
        }
        $this->TestSubCd->EditValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

        // DEptCd
        $this->DEptCd->EditAttrs["class"] = "form-control";
        $this->DEptCd->EditCustomAttributes = "";
        if (!$this->DEptCd->Raw) {
            $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
        }
        $this->DEptCd->EditValue = $this->DEptCd->CurrentValue;
        $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

        // ProfCd
        $this->ProfCd->EditAttrs["class"] = "form-control";
        $this->ProfCd->EditCustomAttributes = "";
        if (!$this->ProfCd->Raw) {
            $this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
        }
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
        if (!$this->Method->Raw) {
            $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
        }
        $this->Method->EditValue = $this->Method->CurrentValue;
        $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

        // Specimen
        $this->Specimen->EditAttrs["class"] = "form-control";
        $this->Specimen->EditCustomAttributes = "";
        if (!$this->Specimen->Raw) {
            $this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
        }
        $this->Specimen->EditValue = $this->Specimen->CurrentValue;
        $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

        // Amount
        $this->Amount->EditAttrs["class"] = "form-control";
        $this->Amount->EditCustomAttributes = "";
        $this->Amount->EditValue = $this->Amount->CurrentValue;
        $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
        if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
        }

        // ResultBy
        $this->ResultBy->EditAttrs["class"] = "form-control";
        $this->ResultBy->EditCustomAttributes = "";
        if (!$this->ResultBy->Raw) {
            $this->ResultBy->CurrentValue = HtmlDecode($this->ResultBy->CurrentValue);
        }
        $this->ResultBy->EditValue = $this->ResultBy->CurrentValue;
        $this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

        // AuthBy
        $this->AuthBy->EditAttrs["class"] = "form-control";
        $this->AuthBy->EditCustomAttributes = "";
        if (!$this->AuthBy->Raw) {
            $this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
        }
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
        if (!$this->Abnormal->Raw) {
            $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
        }
        $this->Abnormal->EditValue = $this->Abnormal->CurrentValue;
        $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

        // Printed
        $this->Printed->EditAttrs["class"] = "form-control";
        $this->Printed->EditCustomAttributes = "";
        if (!$this->Printed->Raw) {
            $this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
        }
        $this->Printed->EditValue = $this->Printed->CurrentValue;
        $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

        // Dispatch
        $this->Dispatch->EditAttrs["class"] = "form-control";
        $this->Dispatch->EditCustomAttributes = "";
        if (!$this->Dispatch->Raw) {
            $this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
        }
        $this->Dispatch->EditValue = $this->Dispatch->CurrentValue;
        $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

        // LOWHIGH
        $this->LOWHIGH->EditAttrs["class"] = "form-control";
        $this->LOWHIGH->EditCustomAttributes = "";
        if (!$this->LOWHIGH->Raw) {
            $this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
        }
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
        if (!$this->Unit->Raw) {
            $this->Unit->CurrentValue = HtmlDecode($this->Unit->CurrentValue);
        }
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
        if (!$this->Pic1->Raw) {
            $this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
        }
        $this->Pic1->EditValue = $this->Pic1->CurrentValue;
        $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

        // Pic2
        $this->Pic2->EditAttrs["class"] = "form-control";
        $this->Pic2->EditCustomAttributes = "";
        if (!$this->Pic2->Raw) {
            $this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
        }
        $this->Pic2->EditValue = $this->Pic2->CurrentValue;
        $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

        // GraphPath
        $this->GraphPath->EditAttrs["class"] = "form-control";
        $this->GraphPath->EditCustomAttributes = "";
        if (!$this->GraphPath->Raw) {
            $this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
        }
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
        if (!$this->SampleUser->Raw) {
            $this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
        }
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
        if (!$this->ReceivedUser->Raw) {
            $this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
        }
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
        if (!$this->DeptRecvUser->Raw) {
            $this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
        }
        $this->DeptRecvUser->EditValue = $this->DeptRecvUser->CurrentValue;
        $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

        // PrintBy
        $this->PrintBy->EditAttrs["class"] = "form-control";
        $this->PrintBy->EditCustomAttributes = "";
        if (!$this->PrintBy->Raw) {
            $this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
        }
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
        if (!$this->MachineCD->Raw) {
            $this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
        }
        $this->MachineCD->EditValue = $this->MachineCD->CurrentValue;
        $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

        // TestCancel
        $this->TestCancel->EditAttrs["class"] = "form-control";
        $this->TestCancel->EditCustomAttributes = "";
        if (!$this->TestCancel->Raw) {
            $this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
        }
        $this->TestCancel->EditValue = $this->TestCancel->CurrentValue;
        $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

        // OutSource
        $this->OutSource->EditAttrs["class"] = "form-control";
        $this->OutSource->EditCustomAttributes = "";
        if (!$this->OutSource->Raw) {
            $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
        }
        $this->OutSource->EditValue = $this->OutSource->CurrentValue;
        $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

        // Tariff
        $this->Tariff->EditAttrs["class"] = "form-control";
        $this->Tariff->EditCustomAttributes = "";
        $this->Tariff->EditValue = $this->Tariff->CurrentValue;
        $this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());
        if (strval($this->Tariff->EditValue) != "" && is_numeric($this->Tariff->EditValue)) {
            $this->Tariff->EditValue = FormatNumber($this->Tariff->EditValue, -2, -2, -2, -2);
        }

        // EDITDATE
        $this->EDITDATE->EditAttrs["class"] = "form-control";
        $this->EDITDATE->EditCustomAttributes = "";
        $this->EDITDATE->EditValue = FormatDateTime($this->EDITDATE->CurrentValue, 8);
        $this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

        // UPLOAD
        $this->UPLOAD->EditAttrs["class"] = "form-control";
        $this->UPLOAD->EditCustomAttributes = "";
        if (!$this->UPLOAD->Raw) {
            $this->UPLOAD->CurrentValue = HtmlDecode($this->UPLOAD->CurrentValue);
        }
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
        if (!$this->SAuthBy->Raw) {
            $this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
        }
        $this->SAuthBy->EditValue = $this->SAuthBy->CurrentValue;
        $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

        // NoRC
        $this->NoRC->EditAttrs["class"] = "form-control";
        $this->NoRC->EditCustomAttributes = "";
        if (!$this->NoRC->Raw) {
            $this->NoRC->CurrentValue = HtmlDecode($this->NoRC->CurrentValue);
        }
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
        if (!$this->DispUser->Raw) {
            $this->DispUser->CurrentValue = HtmlDecode($this->DispUser->CurrentValue);
        }
        $this->DispUser->EditValue = $this->DispUser->CurrentValue;
        $this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

        // DispRemarks
        $this->DispRemarks->EditAttrs["class"] = "form-control";
        $this->DispRemarks->EditCustomAttributes = "";
        if (!$this->DispRemarks->Raw) {
            $this->DispRemarks->CurrentValue = HtmlDecode($this->DispRemarks->CurrentValue);
        }
        $this->DispRemarks->EditValue = $this->DispRemarks->CurrentValue;
        $this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

        // DispMode
        $this->DispMode->EditAttrs["class"] = "form-control";
        $this->DispMode->EditCustomAttributes = "";
        if (!$this->DispMode->Raw) {
            $this->DispMode->CurrentValue = HtmlDecode($this->DispMode->CurrentValue);
        }
        $this->DispMode->EditValue = $this->DispMode->CurrentValue;
        $this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

        // ProductCD
        $this->ProductCD->EditAttrs["class"] = "form-control";
        $this->ProductCD->EditCustomAttributes = "";
        if (!$this->ProductCD->Raw) {
            $this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
        }
        $this->ProductCD->EditValue = $this->ProductCD->CurrentValue;
        $this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

        // Nos
        $this->Nos->EditAttrs["class"] = "form-control";
        $this->Nos->EditCustomAttributes = "";
        $this->Nos->EditValue = $this->Nos->CurrentValue;
        $this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());
        if (strval($this->Nos->EditValue) != "" && is_numeric($this->Nos->EditValue)) {
            $this->Nos->EditValue = FormatNumber($this->Nos->EditValue, -2, -2, -2, -2);
        }

        // WBCPath
        $this->WBCPath->EditAttrs["class"] = "form-control";
        $this->WBCPath->EditCustomAttributes = "";
        if (!$this->WBCPath->Raw) {
            $this->WBCPath->CurrentValue = HtmlDecode($this->WBCPath->CurrentValue);
        }
        $this->WBCPath->EditValue = $this->WBCPath->CurrentValue;
        $this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

        // RBCPath
        $this->RBCPath->EditAttrs["class"] = "form-control";
        $this->RBCPath->EditCustomAttributes = "";
        if (!$this->RBCPath->Raw) {
            $this->RBCPath->CurrentValue = HtmlDecode($this->RBCPath->CurrentValue);
        }
        $this->RBCPath->EditValue = $this->RBCPath->CurrentValue;
        $this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

        // PTPath
        $this->PTPath->EditAttrs["class"] = "form-control";
        $this->PTPath->EditCustomAttributes = "";
        if (!$this->PTPath->Raw) {
            $this->PTPath->CurrentValue = HtmlDecode($this->PTPath->CurrentValue);
        }
        $this->PTPath->EditValue = $this->PTPath->CurrentValue;
        $this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

        // ActualAmt
        $this->ActualAmt->EditAttrs["class"] = "form-control";
        $this->ActualAmt->EditCustomAttributes = "";
        $this->ActualAmt->EditValue = $this->ActualAmt->CurrentValue;
        $this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
        if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue)) {
            $this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
        }

        // NoSign
        $this->NoSign->EditAttrs["class"] = "form-control";
        $this->NoSign->EditCustomAttributes = "";
        if (!$this->NoSign->Raw) {
            $this->NoSign->CurrentValue = HtmlDecode($this->NoSign->CurrentValue);
        }
        $this->NoSign->EditValue = $this->NoSign->CurrentValue;
        $this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

        // Barcode
        $this->_Barcode->EditAttrs["class"] = "form-control";
        $this->_Barcode->EditCustomAttributes = "";
        if (!$this->_Barcode->Raw) {
            $this->_Barcode->CurrentValue = HtmlDecode($this->_Barcode->CurrentValue);
        }
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
        if (!$this->VailID->Raw) {
            $this->VailID->CurrentValue = HtmlDecode($this->VailID->CurrentValue);
        }
        $this->VailID->EditValue = $this->VailID->CurrentValue;
        $this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

        // ReadMachine
        $this->ReadMachine->EditAttrs["class"] = "form-control";
        $this->ReadMachine->EditCustomAttributes = "";
        if (!$this->ReadMachine->Raw) {
            $this->ReadMachine->CurrentValue = HtmlDecode($this->ReadMachine->CurrentValue);
        }
        $this->ReadMachine->EditValue = $this->ReadMachine->CurrentValue;
        $this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

        // LabCD
        $this->LabCD->EditAttrs["class"] = "form-control";
        $this->LabCD->EditCustomAttributes = "";
        if (!$this->LabCD->Raw) {
            $this->LabCD->CurrentValue = HtmlDecode($this->LabCD->CurrentValue);
        }
        $this->LabCD->EditValue = $this->LabCD->CurrentValue;
        $this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

        // OutLabAmt
        $this->OutLabAmt->EditAttrs["class"] = "form-control";
        $this->OutLabAmt->EditCustomAttributes = "";
        $this->OutLabAmt->EditValue = $this->OutLabAmt->CurrentValue;
        $this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());
        if (strval($this->OutLabAmt->EditValue) != "" && is_numeric($this->OutLabAmt->EditValue)) {
            $this->OutLabAmt->EditValue = FormatNumber($this->OutLabAmt->EditValue, -2, -2, -2, -2);
        }

        // ProductQty
        $this->ProductQty->EditAttrs["class"] = "form-control";
        $this->ProductQty->EditCustomAttributes = "";
        $this->ProductQty->EditValue = $this->ProductQty->CurrentValue;
        $this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());
        if (strval($this->ProductQty->EditValue) != "" && is_numeric($this->ProductQty->EditValue)) {
            $this->ProductQty->EditValue = FormatNumber($this->ProductQty->EditValue, -2, -2, -2, -2);
        }

        // Repeat
        $this->Repeat->EditAttrs["class"] = "form-control";
        $this->Repeat->EditCustomAttributes = "";
        if (!$this->Repeat->Raw) {
            $this->Repeat->CurrentValue = HtmlDecode($this->Repeat->CurrentValue);
        }
        $this->Repeat->EditValue = $this->Repeat->CurrentValue;
        $this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

        // DeptNo
        $this->DeptNo->EditAttrs["class"] = "form-control";
        $this->DeptNo->EditCustomAttributes = "";
        if (!$this->DeptNo->Raw) {
            $this->DeptNo->CurrentValue = HtmlDecode($this->DeptNo->CurrentValue);
        }
        $this->DeptNo->EditValue = $this->DeptNo->CurrentValue;
        $this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

        // Desc1
        $this->Desc1->EditAttrs["class"] = "form-control";
        $this->Desc1->EditCustomAttributes = "";
        if (!$this->Desc1->Raw) {
            $this->Desc1->CurrentValue = HtmlDecode($this->Desc1->CurrentValue);
        }
        $this->Desc1->EditValue = $this->Desc1->CurrentValue;
        $this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

        // Desc2
        $this->Desc2->EditAttrs["class"] = "form-control";
        $this->Desc2->EditCustomAttributes = "";
        if (!$this->Desc2->Raw) {
            $this->Desc2->CurrentValue = HtmlDecode($this->Desc2->CurrentValue);
        }
        $this->Desc2->EditValue = $this->Desc2->CurrentValue;
        $this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

        // RptResult
        $this->RptResult->EditAttrs["class"] = "form-control";
        $this->RptResult->EditCustomAttributes = "";
        if (!$this->RptResult->Raw) {
            $this->RptResult->CurrentValue = HtmlDecode($this->RptResult->CurrentValue);
        }
        $this->RptResult->EditValue = $this->RptResult->CurrentValue;
        $this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());

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
