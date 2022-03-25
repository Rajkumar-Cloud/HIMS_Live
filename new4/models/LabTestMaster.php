<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for lab_test_master
 */
class LabTestMaster extends DbTable
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
    public $MainDeptCd;
    public $DeptCd;
    public $TestCd;
    public $TestSubCd;
    public $TestName;
    public $XrayPart;
    public $Method;
    public $Order;
    public $Form;
    public $Amt;
    public $SplAmt;
    public $ResType;
    public $UnitCD;
    public $RefValue;
    public $Sample;
    public $NoD;
    public $BillOrder;
    public $Formula;
    public $Inactive;
    public $ReagentAmt;
    public $LabAmt;
    public $RefAmt;
    public $CreFrom;
    public $CreTo;
    public $Note;
    public $Sun;
    public $Mon;
    public $Tue;
    public $Wed;
    public $Thi;
    public $Fri;
    public $Sat;
    public $Days;
    public $Cutoff;
    public $FontBold;
    public $TestHeading;
    public $Outsource;
    public $NoResult;
    public $GraphLow;
    public $GraphHigh;
    public $CollSample;
    public $ProcessTime;
    public $TamilName;
    public $ShortName;
    public $Individual;
    public $PrevAmt;
    public $PrevSplAmt;
    public $Remarks;
    public $EditDate;
    public $BillName;
    public $ActualAmt;
    public $HISCD;
    public $PriceList;
    public $IPAmt;
    public $InsAmt;
    public $ManualCD;
    public $Free;
    public $AutoAuth;
    public $ProductCD;
    public $Inventory;
    public $IntimateTest;
    public $Manual;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'lab_test_master';
        $this->TableName = 'lab_test_master';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`lab_test_master`";
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
        $this->id = new DbField('lab_test_master', 'lab_test_master', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // MainDeptCd
        $this->MainDeptCd = new DbField('lab_test_master', 'lab_test_master', 'x_MainDeptCd', 'MainDeptCd', '`MainDeptCd`', '`MainDeptCd`', 200, 3, -1, false, '`MainDeptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MainDeptCd->Sortable = true; // Allow sort
        $this->MainDeptCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MainDeptCd->Param, "CustomMsg");
        $this->Fields['MainDeptCd'] = &$this->MainDeptCd;

        // DeptCd
        $this->DeptCd = new DbField('lab_test_master', 'lab_test_master', 'x_DeptCd', 'DeptCd', '`DeptCd`', '`DeptCd`', 200, 3, -1, false, '`DeptCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DeptCd->Sortable = true; // Allow sort
        $this->DeptCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeptCd->Param, "CustomMsg");
        $this->Fields['DeptCd'] = &$this->DeptCd;

        // TestCd
        $this->TestCd = new DbField('lab_test_master', 'lab_test_master', 'x_TestCd', 'TestCd', '`TestCd`', '`TestCd`', 200, 6, -1, false, '`TestCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestCd->Sortable = true; // Allow sort
        $this->TestCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestCd->Param, "CustomMsg");
        $this->Fields['TestCd'] = &$this->TestCd;

        // TestSubCd
        $this->TestSubCd = new DbField('lab_test_master', 'lab_test_master', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 3, -1, false, '`TestSubCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestSubCd->Sortable = true; // Allow sort
        $this->TestSubCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestSubCd->Param, "CustomMsg");
        $this->Fields['TestSubCd'] = &$this->TestSubCd;

        // TestName
        $this->TestName = new DbField('lab_test_master', 'lab_test_master', 'x_TestName', 'TestName', '`TestName`', '`TestName`', 200, 100, -1, false, '`TestName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestName->Sortable = true; // Allow sort
        $this->TestName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestName->Param, "CustomMsg");
        $this->Fields['TestName'] = &$this->TestName;

        // XrayPart
        $this->XrayPart = new DbField('lab_test_master', 'lab_test_master', 'x_XrayPart', 'XrayPart', '`XrayPart`', '`XrayPart`', 200, 50, -1, false, '`XrayPart`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->XrayPart->Sortable = true; // Allow sort
        $this->XrayPart->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->XrayPart->Param, "CustomMsg");
        $this->Fields['XrayPart'] = &$this->XrayPart;

        // Method
        $this->Method = new DbField('lab_test_master', 'lab_test_master', 'x_Method', 'Method', '`Method`', '`Method`', 200, 50, -1, false, '`Method`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Method->Sortable = true; // Allow sort
        $this->Method->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Method->Param, "CustomMsg");
        $this->Fields['Method'] = &$this->Method;

        // Order
        $this->Order = new DbField('lab_test_master', 'lab_test_master', 'x_Order', 'Order', '`Order`', '`Order`', 131, 3, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Order->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Order->Param, "CustomMsg");
        $this->Fields['Order'] = &$this->Order;

        // Form
        $this->Form = new DbField('lab_test_master', 'lab_test_master', 'x_Form', 'Form', '`Form`', '`Form`', 200, 100, -1, false, '`Form`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Form->Sortable = true; // Allow sort
        $this->Form->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Form->Param, "CustomMsg");
        $this->Fields['Form'] = &$this->Form;

        // Amt
        $this->Amt = new DbField('lab_test_master', 'lab_test_master', 'x_Amt', 'Amt', '`Amt`', '`Amt`', 131, 18, -1, false, '`Amt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Amt->Sortable = true; // Allow sort
        $this->Amt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Amt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Amt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Amt->Param, "CustomMsg");
        $this->Fields['Amt'] = &$this->Amt;

        // SplAmt
        $this->SplAmt = new DbField('lab_test_master', 'lab_test_master', 'x_SplAmt', 'SplAmt', '`SplAmt`', '`SplAmt`', 131, 18, -1, false, '`SplAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SplAmt->Sortable = true; // Allow sort
        $this->SplAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SplAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->SplAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SplAmt->Param, "CustomMsg");
        $this->Fields['SplAmt'] = &$this->SplAmt;

        // ResType
        $this->ResType = new DbField('lab_test_master', 'lab_test_master', 'x_ResType', 'ResType', '`ResType`', '`ResType`', 200, 2, -1, false, '`ResType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResType->Sortable = true; // Allow sort
        $this->ResType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResType->Param, "CustomMsg");
        $this->Fields['ResType'] = &$this->ResType;

        // UnitCD
        $this->UnitCD = new DbField('lab_test_master', 'lab_test_master', 'x_UnitCD', 'UnitCD', '`UnitCD`', '`UnitCD`', 200, 3, -1, false, '`UnitCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitCD->Sortable = true; // Allow sort
        $this->UnitCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitCD->Param, "CustomMsg");
        $this->Fields['UnitCD'] = &$this->UnitCD;

        // RefValue
        $this->RefValue = new DbField('lab_test_master', 'lab_test_master', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 2000, -1, false, '`RefValue`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RefValue->Sortable = true; // Allow sort
        $this->RefValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefValue->Param, "CustomMsg");
        $this->Fields['RefValue'] = &$this->RefValue;

        // Sample
        $this->Sample = new DbField('lab_test_master', 'lab_test_master', 'x_Sample', 'Sample', '`Sample`', '`Sample`', 200, 50, -1, false, '`Sample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sample->Sortable = true; // Allow sort
        $this->Sample->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Sample->Param, "CustomMsg");
        $this->Fields['Sample'] = &$this->Sample;

        // NoD
        $this->NoD = new DbField('lab_test_master', 'lab_test_master', 'x_NoD', 'NoD', '`NoD`', '`NoD`', 131, 5, -1, false, '`NoD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoD->Sortable = true; // Allow sort
        $this->NoD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NoD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->NoD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoD->Param, "CustomMsg");
        $this->Fields['NoD'] = &$this->NoD;

        // BillOrder
        $this->BillOrder = new DbField('lab_test_master', 'lab_test_master', 'x_BillOrder', 'BillOrder', '`BillOrder`', '`BillOrder`', 131, 5, -1, false, '`BillOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillOrder->Sortable = true; // Allow sort
        $this->BillOrder->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillOrder->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillOrder->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillOrder->Param, "CustomMsg");
        $this->Fields['BillOrder'] = &$this->BillOrder;

        // Formula
        $this->Formula = new DbField('lab_test_master', 'lab_test_master', 'x_Formula', 'Formula', '`Formula`', '`Formula`', 201, 500, -1, false, '`Formula`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Formula->Sortable = true; // Allow sort
        $this->Formula->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Formula->Param, "CustomMsg");
        $this->Fields['Formula'] = &$this->Formula;

        // Inactive
        $this->Inactive = new DbField('lab_test_master', 'lab_test_master', 'x_Inactive', 'Inactive', '`Inactive`', '`Inactive`', 200, 1, -1, false, '`Inactive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Inactive->Sortable = true; // Allow sort
        $this->Inactive->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Inactive->Param, "CustomMsg");
        $this->Fields['Inactive'] = &$this->Inactive;

        // ReagentAmt
        $this->ReagentAmt = new DbField('lab_test_master', 'lab_test_master', 'x_ReagentAmt', 'ReagentAmt', '`ReagentAmt`', '`ReagentAmt`', 131, 18, -1, false, '`ReagentAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReagentAmt->Sortable = true; // Allow sort
        $this->ReagentAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ReagentAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ReagentAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ReagentAmt->Param, "CustomMsg");
        $this->Fields['ReagentAmt'] = &$this->ReagentAmt;

        // LabAmt
        $this->LabAmt = new DbField('lab_test_master', 'lab_test_master', 'x_LabAmt', 'LabAmt', '`LabAmt`', '`LabAmt`', 131, 18, -1, false, '`LabAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LabAmt->Sortable = true; // Allow sort
        $this->LabAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LabAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->LabAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LabAmt->Param, "CustomMsg");
        $this->Fields['LabAmt'] = &$this->LabAmt;

        // RefAmt
        $this->RefAmt = new DbField('lab_test_master', 'lab_test_master', 'x_RefAmt', 'RefAmt', '`RefAmt`', '`RefAmt`', 131, 18, -1, false, '`RefAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefAmt->Sortable = true; // Allow sort
        $this->RefAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RefAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->RefAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefAmt->Param, "CustomMsg");
        $this->Fields['RefAmt'] = &$this->RefAmt;

        // CreFrom
        $this->CreFrom = new DbField('lab_test_master', 'lab_test_master', 'x_CreFrom', 'CreFrom', '`CreFrom`', '`CreFrom`', 131, 9, -1, false, '`CreFrom`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreFrom->Sortable = true; // Allow sort
        $this->CreFrom->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CreFrom->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->CreFrom->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreFrom->Param, "CustomMsg");
        $this->Fields['CreFrom'] = &$this->CreFrom;

        // CreTo
        $this->CreTo = new DbField('lab_test_master', 'lab_test_master', 'x_CreTo', 'CreTo', '`CreTo`', '`CreTo`', 131, 9, -1, false, '`CreTo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreTo->Sortable = true; // Allow sort
        $this->CreTo->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CreTo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->CreTo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreTo->Param, "CustomMsg");
        $this->Fields['CreTo'] = &$this->CreTo;

        // Note
        $this->Note = new DbField('lab_test_master', 'lab_test_master', 'x_Note', 'Note', '`Note`', '`Note`', 201, 2000, -1, false, '`Note`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Note->Sortable = true; // Allow sort
        $this->Note->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Note->Param, "CustomMsg");
        $this->Fields['Note'] = &$this->Note;

        // Sun
        $this->Sun = new DbField('lab_test_master', 'lab_test_master', 'x_Sun', 'Sun', '`Sun`', '`Sun`', 200, 1, -1, false, '`Sun`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sun->Sortable = true; // Allow sort
        $this->Sun->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Sun->Param, "CustomMsg");
        $this->Fields['Sun'] = &$this->Sun;

        // Mon
        $this->Mon = new DbField('lab_test_master', 'lab_test_master', 'x_Mon', 'Mon', '`Mon`', '`Mon`', 200, 1, -1, false, '`Mon`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mon->Sortable = true; // Allow sort
        $this->Mon->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mon->Param, "CustomMsg");
        $this->Fields['Mon'] = &$this->Mon;

        // Tue
        $this->Tue = new DbField('lab_test_master', 'lab_test_master', 'x_Tue', 'Tue', '`Tue`', '`Tue`', 200, 1, -1, false, '`Tue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tue->Sortable = true; // Allow sort
        $this->Tue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tue->Param, "CustomMsg");
        $this->Fields['Tue'] = &$this->Tue;

        // Wed
        $this->Wed = new DbField('lab_test_master', 'lab_test_master', 'x_Wed', 'Wed', '`Wed`', '`Wed`', 200, 1, -1, false, '`Wed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Wed->Sortable = true; // Allow sort
        $this->Wed->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Wed->Param, "CustomMsg");
        $this->Fields['Wed'] = &$this->Wed;

        // Thi
        $this->Thi = new DbField('lab_test_master', 'lab_test_master', 'x_Thi', 'Thi', '`Thi`', '`Thi`', 200, 1, -1, false, '`Thi`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Thi->Sortable = true; // Allow sort
        $this->Thi->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Thi->Param, "CustomMsg");
        $this->Fields['Thi'] = &$this->Thi;

        // Fri
        $this->Fri = new DbField('lab_test_master', 'lab_test_master', 'x_Fri', 'Fri', '`Fri`', '`Fri`', 200, 1, -1, false, '`Fri`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fri->Sortable = true; // Allow sort
        $this->Fri->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fri->Param, "CustomMsg");
        $this->Fields['Fri'] = &$this->Fri;

        // Sat
        $this->Sat = new DbField('lab_test_master', 'lab_test_master', 'x_Sat', 'Sat', '`Sat`', '`Sat`', 200, 1, -1, false, '`Sat`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sat->Sortable = true; // Allow sort
        $this->Sat->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Sat->Param, "CustomMsg");
        $this->Fields['Sat'] = &$this->Sat;

        // Days
        $this->Days = new DbField('lab_test_master', 'lab_test_master', 'x_Days', 'Days', '`Days`', '`Days`', 131, 3, -1, false, '`Days`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Days->Sortable = true; // Allow sort
        $this->Days->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Days->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Days->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Days->Param, "CustomMsg");
        $this->Fields['Days'] = &$this->Days;

        // Cutoff
        $this->Cutoff = new DbField('lab_test_master', 'lab_test_master', 'x_Cutoff', 'Cutoff', '`Cutoff`', '`Cutoff`', 200, 5, -1, false, '`Cutoff`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Cutoff->Sortable = true; // Allow sort
        $this->Cutoff->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Cutoff->Param, "CustomMsg");
        $this->Fields['Cutoff'] = &$this->Cutoff;

        // FontBold
        $this->FontBold = new DbField('lab_test_master', 'lab_test_master', 'x_FontBold', 'FontBold', '`FontBold`', '`FontBold`', 200, 1, -1, false, '`FontBold`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FontBold->Sortable = true; // Allow sort
        $this->FontBold->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FontBold->Param, "CustomMsg");
        $this->Fields['FontBold'] = &$this->FontBold;

        // TestHeading
        $this->TestHeading = new DbField('lab_test_master', 'lab_test_master', 'x_TestHeading', 'TestHeading', '`TestHeading`', '`TestHeading`', 200, 1, -1, false, '`TestHeading`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestHeading->Sortable = true; // Allow sort
        $this->TestHeading->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestHeading->Param, "CustomMsg");
        $this->Fields['TestHeading'] = &$this->TestHeading;

        // Outsource
        $this->Outsource = new DbField('lab_test_master', 'lab_test_master', 'x_Outsource', 'Outsource', '`Outsource`', '`Outsource`', 200, 1, -1, false, '`Outsource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Outsource->Sortable = true; // Allow sort
        $this->Outsource->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Outsource->Param, "CustomMsg");
        $this->Fields['Outsource'] = &$this->Outsource;

        // NoResult
        $this->NoResult = new DbField('lab_test_master', 'lab_test_master', 'x_NoResult', 'NoResult', '`NoResult`', '`NoResult`', 200, 1, -1, false, '`NoResult`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoResult->Sortable = true; // Allow sort
        $this->NoResult->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoResult->Param, "CustomMsg");
        $this->Fields['NoResult'] = &$this->NoResult;

        // GraphLow
        $this->GraphLow = new DbField('lab_test_master', 'lab_test_master', 'x_GraphLow', 'GraphLow', '`GraphLow`', '`GraphLow`', 131, 18, -1, false, '`GraphLow`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GraphLow->Sortable = true; // Allow sort
        $this->GraphLow->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GraphLow->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->GraphLow->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GraphLow->Param, "CustomMsg");
        $this->Fields['GraphLow'] = &$this->GraphLow;

        // GraphHigh
        $this->GraphHigh = new DbField('lab_test_master', 'lab_test_master', 'x_GraphHigh', 'GraphHigh', '`GraphHigh`', '`GraphHigh`', 131, 18, -1, false, '`GraphHigh`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GraphHigh->Sortable = true; // Allow sort
        $this->GraphHigh->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->GraphHigh->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->GraphHigh->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GraphHigh->Param, "CustomMsg");
        $this->Fields['GraphHigh'] = &$this->GraphHigh;

        // CollSample
        $this->CollSample = new DbField('lab_test_master', 'lab_test_master', 'x_CollSample', 'CollSample', '`CollSample`', '`CollSample`', 200, 4, -1, false, '`CollSample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CollSample->Sortable = true; // Allow sort
        $this->CollSample->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CollSample->Param, "CustomMsg");
        $this->Fields['CollSample'] = &$this->CollSample;

        // ProcessTime
        $this->ProcessTime = new DbField('lab_test_master', 'lab_test_master', 'x_ProcessTime', 'ProcessTime', '`ProcessTime`', '`ProcessTime`', 200, 5, -1, false, '`ProcessTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProcessTime->Sortable = true; // Allow sort
        $this->ProcessTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProcessTime->Param, "CustomMsg");
        $this->Fields['ProcessTime'] = &$this->ProcessTime;

        // TamilName
        $this->TamilName = new DbField('lab_test_master', 'lab_test_master', 'x_TamilName', 'TamilName', '`TamilName`', '`TamilName`', 200, 50, -1, false, '`TamilName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TamilName->Sortable = true; // Allow sort
        $this->TamilName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TamilName->Param, "CustomMsg");
        $this->Fields['TamilName'] = &$this->TamilName;

        // ShortName
        $this->ShortName = new DbField('lab_test_master', 'lab_test_master', 'x_ShortName', 'ShortName', '`ShortName`', '`ShortName`', 200, 7, -1, false, '`ShortName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShortName->Sortable = true; // Allow sort
        $this->ShortName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ShortName->Param, "CustomMsg");
        $this->Fields['ShortName'] = &$this->ShortName;

        // Individual
        $this->Individual = new DbField('lab_test_master', 'lab_test_master', 'x_Individual', 'Individual', '`Individual`', '`Individual`', 200, 1, -1, false, '`Individual`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Individual->Sortable = true; // Allow sort
        $this->Individual->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Individual->Param, "CustomMsg");
        $this->Fields['Individual'] = &$this->Individual;

        // PrevAmt
        $this->PrevAmt = new DbField('lab_test_master', 'lab_test_master', 'x_PrevAmt', 'PrevAmt', '`PrevAmt`', '`PrevAmt`', 131, 9, -1, false, '`PrevAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrevAmt->Sortable = true; // Allow sort
        $this->PrevAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PrevAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PrevAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrevAmt->Param, "CustomMsg");
        $this->Fields['PrevAmt'] = &$this->PrevAmt;

        // PrevSplAmt
        $this->PrevSplAmt = new DbField('lab_test_master', 'lab_test_master', 'x_PrevSplAmt', 'PrevSplAmt', '`PrevSplAmt`', '`PrevSplAmt`', 131, 9, -1, false, '`PrevSplAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrevSplAmt->Sortable = true; // Allow sort
        $this->PrevSplAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PrevSplAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->PrevSplAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PrevSplAmt->Param, "CustomMsg");
        $this->Fields['PrevSplAmt'] = &$this->PrevSplAmt;

        // Remarks
        $this->Remarks = new DbField('lab_test_master', 'lab_test_master', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 5000, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // EditDate
        $this->EditDate = new DbField('lab_test_master', 'lab_test_master', 'x_EditDate', 'EditDate', '`EditDate`', CastDateFieldForLike("`EditDate`", 0, "DB"), 135, 23, 0, false, '`EditDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EditDate->Sortable = true; // Allow sort
        $this->EditDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->EditDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EditDate->Param, "CustomMsg");
        $this->Fields['EditDate'] = &$this->EditDate;

        // BillName
        $this->BillName = new DbField('lab_test_master', 'lab_test_master', 'x_BillName', 'BillName', '`BillName`', '`BillName`', 200, 50, -1, false, '`BillName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillName->Sortable = true; // Allow sort
        $this->BillName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillName->Param, "CustomMsg");
        $this->Fields['BillName'] = &$this->BillName;

        // ActualAmt
        $this->ActualAmt = new DbField('lab_test_master', 'lab_test_master', 'x_ActualAmt', 'ActualAmt', '`ActualAmt`', '`ActualAmt`', 131, 9, -1, false, '`ActualAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ActualAmt->Sortable = true; // Allow sort
        $this->ActualAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ActualAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->ActualAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ActualAmt->Param, "CustomMsg");
        $this->Fields['ActualAmt'] = &$this->ActualAmt;

        // HISCD
        $this->HISCD = new DbField('lab_test_master', 'lab_test_master', 'x_HISCD', 'HISCD', '`HISCD`', '`HISCD`', 200, 20, -1, false, '`HISCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HISCD->Sortable = true; // Allow sort
        $this->HISCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HISCD->Param, "CustomMsg");
        $this->Fields['HISCD'] = &$this->HISCD;

        // PriceList
        $this->PriceList = new DbField('lab_test_master', 'lab_test_master', 'x_PriceList', 'PriceList', '`PriceList`', '`PriceList`', 200, 1, -1, false, '`PriceList`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PriceList->Sortable = true; // Allow sort
        $this->PriceList->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PriceList->Param, "CustomMsg");
        $this->Fields['PriceList'] = &$this->PriceList;

        // IPAmt
        $this->IPAmt = new DbField('lab_test_master', 'lab_test_master', 'x_IPAmt', 'IPAmt', '`IPAmt`', '`IPAmt`', 131, 9, -1, false, '`IPAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IPAmt->Sortable = true; // Allow sort
        $this->IPAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->IPAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->IPAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IPAmt->Param, "CustomMsg");
        $this->Fields['IPAmt'] = &$this->IPAmt;

        // InsAmt
        $this->InsAmt = new DbField('lab_test_master', 'lab_test_master', 'x_InsAmt', 'InsAmt', '`InsAmt`', '`InsAmt`', 131, 9, -1, false, '`InsAmt`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InsAmt->Sortable = true; // Allow sort
        $this->InsAmt->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->InsAmt->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->InsAmt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->InsAmt->Param, "CustomMsg");
        $this->Fields['InsAmt'] = &$this->InsAmt;

        // ManualCD
        $this->ManualCD = new DbField('lab_test_master', 'lab_test_master', 'x_ManualCD', 'ManualCD', '`ManualCD`', '`ManualCD`', 200, 10, -1, false, '`ManualCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ManualCD->Sortable = true; // Allow sort
        $this->ManualCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ManualCD->Param, "CustomMsg");
        $this->Fields['ManualCD'] = &$this->ManualCD;

        // Free
        $this->Free = new DbField('lab_test_master', 'lab_test_master', 'x_Free', 'Free', '`Free`', '`Free`', 200, 1, -1, false, '`Free`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Free->Sortable = true; // Allow sort
        $this->Free->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Free->Param, "CustomMsg");
        $this->Fields['Free'] = &$this->Free;

        // AutoAuth
        $this->AutoAuth = new DbField('lab_test_master', 'lab_test_master', 'x_AutoAuth', 'AutoAuth', '`AutoAuth`', '`AutoAuth`', 200, 1, -1, false, '`AutoAuth`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AutoAuth->Sortable = true; // Allow sort
        $this->AutoAuth->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AutoAuth->Param, "CustomMsg");
        $this->Fields['AutoAuth'] = &$this->AutoAuth;

        // ProductCD
        $this->ProductCD = new DbField('lab_test_master', 'lab_test_master', 'x_ProductCD', 'ProductCD', '`ProductCD`', '`ProductCD`', 200, 6, -1, false, '`ProductCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductCD->Sortable = true; // Allow sort
        $this->ProductCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProductCD->Param, "CustomMsg");
        $this->Fields['ProductCD'] = &$this->ProductCD;

        // Inventory
        $this->Inventory = new DbField('lab_test_master', 'lab_test_master', 'x_Inventory', 'Inventory', '`Inventory`', '`Inventory`', 200, 1, -1, false, '`Inventory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Inventory->Sortable = true; // Allow sort
        $this->Inventory->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Inventory->Param, "CustomMsg");
        $this->Fields['Inventory'] = &$this->Inventory;

        // IntimateTest
        $this->IntimateTest = new DbField('lab_test_master', 'lab_test_master', 'x_IntimateTest', 'IntimateTest', '`IntimateTest`', '`IntimateTest`', 200, 1, -1, false, '`IntimateTest`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IntimateTest->Sortable = true; // Allow sort
        $this->IntimateTest->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IntimateTest->Param, "CustomMsg");
        $this->Fields['IntimateTest'] = &$this->IntimateTest;

        // Manual
        $this->Manual = new DbField('lab_test_master', 'lab_test_master', 'x_Manual', 'Manual', '`Manual`', '`Manual`', 200, 1, -1, false, '`Manual`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Manual->Sortable = true; // Allow sort
        $this->Manual->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Manual->Param, "CustomMsg");
        $this->Fields['Manual'] = &$this->Manual;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`lab_test_master`";
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
        $this->MainDeptCd->DbValue = $row['MainDeptCd'];
        $this->DeptCd->DbValue = $row['DeptCd'];
        $this->TestCd->DbValue = $row['TestCd'];
        $this->TestSubCd->DbValue = $row['TestSubCd'];
        $this->TestName->DbValue = $row['TestName'];
        $this->XrayPart->DbValue = $row['XrayPart'];
        $this->Method->DbValue = $row['Method'];
        $this->Order->DbValue = $row['Order'];
        $this->Form->DbValue = $row['Form'];
        $this->Amt->DbValue = $row['Amt'];
        $this->SplAmt->DbValue = $row['SplAmt'];
        $this->ResType->DbValue = $row['ResType'];
        $this->UnitCD->DbValue = $row['UnitCD'];
        $this->RefValue->DbValue = $row['RefValue'];
        $this->Sample->DbValue = $row['Sample'];
        $this->NoD->DbValue = $row['NoD'];
        $this->BillOrder->DbValue = $row['BillOrder'];
        $this->Formula->DbValue = $row['Formula'];
        $this->Inactive->DbValue = $row['Inactive'];
        $this->ReagentAmt->DbValue = $row['ReagentAmt'];
        $this->LabAmt->DbValue = $row['LabAmt'];
        $this->RefAmt->DbValue = $row['RefAmt'];
        $this->CreFrom->DbValue = $row['CreFrom'];
        $this->CreTo->DbValue = $row['CreTo'];
        $this->Note->DbValue = $row['Note'];
        $this->Sun->DbValue = $row['Sun'];
        $this->Mon->DbValue = $row['Mon'];
        $this->Tue->DbValue = $row['Tue'];
        $this->Wed->DbValue = $row['Wed'];
        $this->Thi->DbValue = $row['Thi'];
        $this->Fri->DbValue = $row['Fri'];
        $this->Sat->DbValue = $row['Sat'];
        $this->Days->DbValue = $row['Days'];
        $this->Cutoff->DbValue = $row['Cutoff'];
        $this->FontBold->DbValue = $row['FontBold'];
        $this->TestHeading->DbValue = $row['TestHeading'];
        $this->Outsource->DbValue = $row['Outsource'];
        $this->NoResult->DbValue = $row['NoResult'];
        $this->GraphLow->DbValue = $row['GraphLow'];
        $this->GraphHigh->DbValue = $row['GraphHigh'];
        $this->CollSample->DbValue = $row['CollSample'];
        $this->ProcessTime->DbValue = $row['ProcessTime'];
        $this->TamilName->DbValue = $row['TamilName'];
        $this->ShortName->DbValue = $row['ShortName'];
        $this->Individual->DbValue = $row['Individual'];
        $this->PrevAmt->DbValue = $row['PrevAmt'];
        $this->PrevSplAmt->DbValue = $row['PrevSplAmt'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->EditDate->DbValue = $row['EditDate'];
        $this->BillName->DbValue = $row['BillName'];
        $this->ActualAmt->DbValue = $row['ActualAmt'];
        $this->HISCD->DbValue = $row['HISCD'];
        $this->PriceList->DbValue = $row['PriceList'];
        $this->IPAmt->DbValue = $row['IPAmt'];
        $this->InsAmt->DbValue = $row['InsAmt'];
        $this->ManualCD->DbValue = $row['ManualCD'];
        $this->Free->DbValue = $row['Free'];
        $this->AutoAuth->DbValue = $row['AutoAuth'];
        $this->ProductCD->DbValue = $row['ProductCD'];
        $this->Inventory->DbValue = $row['Inventory'];
        $this->IntimateTest->DbValue = $row['IntimateTest'];
        $this->Manual->DbValue = $row['Manual'];
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
        return $_SESSION[$name] ?? GetUrl("LabTestMasterList");
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
        if ($pageName == "LabTestMasterView") {
            return $Language->phrase("View");
        } elseif ($pageName == "LabTestMasterEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "LabTestMasterAdd") {
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
                return "LabTestMasterView";
            case Config("API_ADD_ACTION"):
                return "LabTestMasterAdd";
            case Config("API_EDIT_ACTION"):
                return "LabTestMasterEdit";
            case Config("API_DELETE_ACTION"):
                return "LabTestMasterDelete";
            case Config("API_LIST_ACTION"):
                return "LabTestMasterList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "LabTestMasterList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("LabTestMasterView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("LabTestMasterView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "LabTestMasterAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "LabTestMasterAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("LabTestMasterEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("LabTestMasterAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("LabTestMasterDelete", $this->getUrlParm());
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
        $this->MainDeptCd->setDbValue($row['MainDeptCd']);
        $this->DeptCd->setDbValue($row['DeptCd']);
        $this->TestCd->setDbValue($row['TestCd']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->TestName->setDbValue($row['TestName']);
        $this->XrayPart->setDbValue($row['XrayPart']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->Amt->setDbValue($row['Amt']);
        $this->SplAmt->setDbValue($row['SplAmt']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->CreFrom->setDbValue($row['CreFrom']);
        $this->CreTo->setDbValue($row['CreTo']);
        $this->Note->setDbValue($row['Note']);
        $this->Sun->setDbValue($row['Sun']);
        $this->Mon->setDbValue($row['Mon']);
        $this->Tue->setDbValue($row['Tue']);
        $this->Wed->setDbValue($row['Wed']);
        $this->Thi->setDbValue($row['Thi']);
        $this->Fri->setDbValue($row['Fri']);
        $this->Sat->setDbValue($row['Sat']);
        $this->Days->setDbValue($row['Days']);
        $this->Cutoff->setDbValue($row['Cutoff']);
        $this->FontBold->setDbValue($row['FontBold']);
        $this->TestHeading->setDbValue($row['TestHeading']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->NoResult->setDbValue($row['NoResult']);
        $this->GraphLow->setDbValue($row['GraphLow']);
        $this->GraphHigh->setDbValue($row['GraphHigh']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->ProcessTime->setDbValue($row['ProcessTime']);
        $this->TamilName->setDbValue($row['TamilName']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Individual->setDbValue($row['Individual']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->PrevSplAmt->setDbValue($row['PrevSplAmt']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->AutoAuth->setDbValue($row['AutoAuth']);
        $this->ProductCD->setDbValue($row['ProductCD']);
        $this->Inventory->setDbValue($row['Inventory']);
        $this->IntimateTest->setDbValue($row['IntimateTest']);
        $this->Manual->setDbValue($row['Manual']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // MainDeptCd

        // DeptCd

        // TestCd

        // TestSubCd

        // TestName

        // XrayPart

        // Method

        // Order

        // Form

        // Amt

        // SplAmt

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // CreFrom

        // CreTo

        // Note

        // Sun

        // Mon

        // Tue

        // Wed

        // Thi

        // Fri

        // Sat

        // Days

        // Cutoff

        // FontBold

        // TestHeading

        // Outsource

        // NoResult

        // GraphLow

        // GraphHigh

        // CollSample

        // ProcessTime

        // TamilName

        // ShortName

        // Individual

        // PrevAmt

        // PrevSplAmt

        // Remarks

        // EditDate

        // BillName

        // ActualAmt

        // HISCD

        // PriceList

        // IPAmt

        // InsAmt

        // ManualCD

        // Free

        // AutoAuth

        // ProductCD

        // Inventory

        // IntimateTest

        // Manual

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // MainDeptCd
        $this->MainDeptCd->ViewValue = $this->MainDeptCd->CurrentValue;
        $this->MainDeptCd->ViewCustomAttributes = "";

        // DeptCd
        $this->DeptCd->ViewValue = $this->DeptCd->CurrentValue;
        $this->DeptCd->ViewCustomAttributes = "";

        // TestCd
        $this->TestCd->ViewValue = $this->TestCd->CurrentValue;
        $this->TestCd->ViewCustomAttributes = "";

        // TestSubCd
        $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->ViewCustomAttributes = "";

        // TestName
        $this->TestName->ViewValue = $this->TestName->CurrentValue;
        $this->TestName->ViewCustomAttributes = "";

        // XrayPart
        $this->XrayPart->ViewValue = $this->XrayPart->CurrentValue;
        $this->XrayPart->ViewCustomAttributes = "";

        // Method
        $this->Method->ViewValue = $this->Method->CurrentValue;
        $this->Method->ViewCustomAttributes = "";

        // Order
        $this->Order->ViewValue = $this->Order->CurrentValue;
        $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
        $this->Order->ViewCustomAttributes = "";

        // Form
        $this->Form->ViewValue = $this->Form->CurrentValue;
        $this->Form->ViewCustomAttributes = "";

        // Amt
        $this->Amt->ViewValue = $this->Amt->CurrentValue;
        $this->Amt->ViewValue = FormatNumber($this->Amt->ViewValue, 2, -2, -2, -2);
        $this->Amt->ViewCustomAttributes = "";

        // SplAmt
        $this->SplAmt->ViewValue = $this->SplAmt->CurrentValue;
        $this->SplAmt->ViewValue = FormatNumber($this->SplAmt->ViewValue, 2, -2, -2, -2);
        $this->SplAmt->ViewCustomAttributes = "";

        // ResType
        $this->ResType->ViewValue = $this->ResType->CurrentValue;
        $this->ResType->ViewCustomAttributes = "";

        // UnitCD
        $this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
        $this->UnitCD->ViewCustomAttributes = "";

        // RefValue
        $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
        $this->RefValue->ViewCustomAttributes = "";

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

        // ReagentAmt
        $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
        $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
        $this->ReagentAmt->ViewCustomAttributes = "";

        // LabAmt
        $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
        $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
        $this->LabAmt->ViewCustomAttributes = "";

        // RefAmt
        $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
        $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
        $this->RefAmt->ViewCustomAttributes = "";

        // CreFrom
        $this->CreFrom->ViewValue = $this->CreFrom->CurrentValue;
        $this->CreFrom->ViewValue = FormatNumber($this->CreFrom->ViewValue, 2, -2, -2, -2);
        $this->CreFrom->ViewCustomAttributes = "";

        // CreTo
        $this->CreTo->ViewValue = $this->CreTo->CurrentValue;
        $this->CreTo->ViewValue = FormatNumber($this->CreTo->ViewValue, 2, -2, -2, -2);
        $this->CreTo->ViewCustomAttributes = "";

        // Note
        $this->Note->ViewValue = $this->Note->CurrentValue;
        $this->Note->ViewCustomAttributes = "";

        // Sun
        $this->Sun->ViewValue = $this->Sun->CurrentValue;
        $this->Sun->ViewCustomAttributes = "";

        // Mon
        $this->Mon->ViewValue = $this->Mon->CurrentValue;
        $this->Mon->ViewCustomAttributes = "";

        // Tue
        $this->Tue->ViewValue = $this->Tue->CurrentValue;
        $this->Tue->ViewCustomAttributes = "";

        // Wed
        $this->Wed->ViewValue = $this->Wed->CurrentValue;
        $this->Wed->ViewCustomAttributes = "";

        // Thi
        $this->Thi->ViewValue = $this->Thi->CurrentValue;
        $this->Thi->ViewCustomAttributes = "";

        // Fri
        $this->Fri->ViewValue = $this->Fri->CurrentValue;
        $this->Fri->ViewCustomAttributes = "";

        // Sat
        $this->Sat->ViewValue = $this->Sat->CurrentValue;
        $this->Sat->ViewCustomAttributes = "";

        // Days
        $this->Days->ViewValue = $this->Days->CurrentValue;
        $this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 2, -2, -2, -2);
        $this->Days->ViewCustomAttributes = "";

        // Cutoff
        $this->Cutoff->ViewValue = $this->Cutoff->CurrentValue;
        $this->Cutoff->ViewCustomAttributes = "";

        // FontBold
        $this->FontBold->ViewValue = $this->FontBold->CurrentValue;
        $this->FontBold->ViewCustomAttributes = "";

        // TestHeading
        $this->TestHeading->ViewValue = $this->TestHeading->CurrentValue;
        $this->TestHeading->ViewCustomAttributes = "";

        // Outsource
        $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
        $this->Outsource->ViewCustomAttributes = "";

        // NoResult
        $this->NoResult->ViewValue = $this->NoResult->CurrentValue;
        $this->NoResult->ViewCustomAttributes = "";

        // GraphLow
        $this->GraphLow->ViewValue = $this->GraphLow->CurrentValue;
        $this->GraphLow->ViewValue = FormatNumber($this->GraphLow->ViewValue, 2, -2, -2, -2);
        $this->GraphLow->ViewCustomAttributes = "";

        // GraphHigh
        $this->GraphHigh->ViewValue = $this->GraphHigh->CurrentValue;
        $this->GraphHigh->ViewValue = FormatNumber($this->GraphHigh->ViewValue, 2, -2, -2, -2);
        $this->GraphHigh->ViewCustomAttributes = "";

        // CollSample
        $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
        $this->CollSample->ViewCustomAttributes = "";

        // ProcessTime
        $this->ProcessTime->ViewValue = $this->ProcessTime->CurrentValue;
        $this->ProcessTime->ViewCustomAttributes = "";

        // TamilName
        $this->TamilName->ViewValue = $this->TamilName->CurrentValue;
        $this->TamilName->ViewCustomAttributes = "";

        // ShortName
        $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
        $this->ShortName->ViewCustomAttributes = "";

        // Individual
        $this->Individual->ViewValue = $this->Individual->CurrentValue;
        $this->Individual->ViewCustomAttributes = "";

        // PrevAmt
        $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
        $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
        $this->PrevAmt->ViewCustomAttributes = "";

        // PrevSplAmt
        $this->PrevSplAmt->ViewValue = $this->PrevSplAmt->CurrentValue;
        $this->PrevSplAmt->ViewValue = FormatNumber($this->PrevSplAmt->ViewValue, 2, -2, -2, -2);
        $this->PrevSplAmt->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // EditDate
        $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
        $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
        $this->EditDate->ViewCustomAttributes = "";

        // BillName
        $this->BillName->ViewValue = $this->BillName->CurrentValue;
        $this->BillName->ViewCustomAttributes = "";

        // ActualAmt
        $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
        $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
        $this->ActualAmt->ViewCustomAttributes = "";

        // HISCD
        $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
        $this->HISCD->ViewCustomAttributes = "";

        // PriceList
        $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
        $this->PriceList->ViewCustomAttributes = "";

        // IPAmt
        $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
        $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
        $this->IPAmt->ViewCustomAttributes = "";

        // InsAmt
        $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
        $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
        $this->InsAmt->ViewCustomAttributes = "";

        // ManualCD
        $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
        $this->ManualCD->ViewCustomAttributes = "";

        // Free
        $this->Free->ViewValue = $this->Free->CurrentValue;
        $this->Free->ViewCustomAttributes = "";

        // AutoAuth
        $this->AutoAuth->ViewValue = $this->AutoAuth->CurrentValue;
        $this->AutoAuth->ViewCustomAttributes = "";

        // ProductCD
        $this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
        $this->ProductCD->ViewCustomAttributes = "";

        // Inventory
        $this->Inventory->ViewValue = $this->Inventory->CurrentValue;
        $this->Inventory->ViewCustomAttributes = "";

        // IntimateTest
        $this->IntimateTest->ViewValue = $this->IntimateTest->CurrentValue;
        $this->IntimateTest->ViewCustomAttributes = "";

        // Manual
        $this->Manual->ViewValue = $this->Manual->CurrentValue;
        $this->Manual->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // MainDeptCd
        $this->MainDeptCd->LinkCustomAttributes = "";
        $this->MainDeptCd->HrefValue = "";
        $this->MainDeptCd->TooltipValue = "";

        // DeptCd
        $this->DeptCd->LinkCustomAttributes = "";
        $this->DeptCd->HrefValue = "";
        $this->DeptCd->TooltipValue = "";

        // TestCd
        $this->TestCd->LinkCustomAttributes = "";
        $this->TestCd->HrefValue = "";
        $this->TestCd->TooltipValue = "";

        // TestSubCd
        $this->TestSubCd->LinkCustomAttributes = "";
        $this->TestSubCd->HrefValue = "";
        $this->TestSubCd->TooltipValue = "";

        // TestName
        $this->TestName->LinkCustomAttributes = "";
        $this->TestName->HrefValue = "";
        $this->TestName->TooltipValue = "";

        // XrayPart
        $this->XrayPart->LinkCustomAttributes = "";
        $this->XrayPart->HrefValue = "";
        $this->XrayPart->TooltipValue = "";

        // Method
        $this->Method->LinkCustomAttributes = "";
        $this->Method->HrefValue = "";
        $this->Method->TooltipValue = "";

        // Order
        $this->Order->LinkCustomAttributes = "";
        $this->Order->HrefValue = "";
        $this->Order->TooltipValue = "";

        // Form
        $this->Form->LinkCustomAttributes = "";
        $this->Form->HrefValue = "";
        $this->Form->TooltipValue = "";

        // Amt
        $this->Amt->LinkCustomAttributes = "";
        $this->Amt->HrefValue = "";
        $this->Amt->TooltipValue = "";

        // SplAmt
        $this->SplAmt->LinkCustomAttributes = "";
        $this->SplAmt->HrefValue = "";
        $this->SplAmt->TooltipValue = "";

        // ResType
        $this->ResType->LinkCustomAttributes = "";
        $this->ResType->HrefValue = "";
        $this->ResType->TooltipValue = "";

        // UnitCD
        $this->UnitCD->LinkCustomAttributes = "";
        $this->UnitCD->HrefValue = "";
        $this->UnitCD->TooltipValue = "";

        // RefValue
        $this->RefValue->LinkCustomAttributes = "";
        $this->RefValue->HrefValue = "";
        $this->RefValue->TooltipValue = "";

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

        // ReagentAmt
        $this->ReagentAmt->LinkCustomAttributes = "";
        $this->ReagentAmt->HrefValue = "";
        $this->ReagentAmt->TooltipValue = "";

        // LabAmt
        $this->LabAmt->LinkCustomAttributes = "";
        $this->LabAmt->HrefValue = "";
        $this->LabAmt->TooltipValue = "";

        // RefAmt
        $this->RefAmt->LinkCustomAttributes = "";
        $this->RefAmt->HrefValue = "";
        $this->RefAmt->TooltipValue = "";

        // CreFrom
        $this->CreFrom->LinkCustomAttributes = "";
        $this->CreFrom->HrefValue = "";
        $this->CreFrom->TooltipValue = "";

        // CreTo
        $this->CreTo->LinkCustomAttributes = "";
        $this->CreTo->HrefValue = "";
        $this->CreTo->TooltipValue = "";

        // Note
        $this->Note->LinkCustomAttributes = "";
        $this->Note->HrefValue = "";
        $this->Note->TooltipValue = "";

        // Sun
        $this->Sun->LinkCustomAttributes = "";
        $this->Sun->HrefValue = "";
        $this->Sun->TooltipValue = "";

        // Mon
        $this->Mon->LinkCustomAttributes = "";
        $this->Mon->HrefValue = "";
        $this->Mon->TooltipValue = "";

        // Tue
        $this->Tue->LinkCustomAttributes = "";
        $this->Tue->HrefValue = "";
        $this->Tue->TooltipValue = "";

        // Wed
        $this->Wed->LinkCustomAttributes = "";
        $this->Wed->HrefValue = "";
        $this->Wed->TooltipValue = "";

        // Thi
        $this->Thi->LinkCustomAttributes = "";
        $this->Thi->HrefValue = "";
        $this->Thi->TooltipValue = "";

        // Fri
        $this->Fri->LinkCustomAttributes = "";
        $this->Fri->HrefValue = "";
        $this->Fri->TooltipValue = "";

        // Sat
        $this->Sat->LinkCustomAttributes = "";
        $this->Sat->HrefValue = "";
        $this->Sat->TooltipValue = "";

        // Days
        $this->Days->LinkCustomAttributes = "";
        $this->Days->HrefValue = "";
        $this->Days->TooltipValue = "";

        // Cutoff
        $this->Cutoff->LinkCustomAttributes = "";
        $this->Cutoff->HrefValue = "";
        $this->Cutoff->TooltipValue = "";

        // FontBold
        $this->FontBold->LinkCustomAttributes = "";
        $this->FontBold->HrefValue = "";
        $this->FontBold->TooltipValue = "";

        // TestHeading
        $this->TestHeading->LinkCustomAttributes = "";
        $this->TestHeading->HrefValue = "";
        $this->TestHeading->TooltipValue = "";

        // Outsource
        $this->Outsource->LinkCustomAttributes = "";
        $this->Outsource->HrefValue = "";
        $this->Outsource->TooltipValue = "";

        // NoResult
        $this->NoResult->LinkCustomAttributes = "";
        $this->NoResult->HrefValue = "";
        $this->NoResult->TooltipValue = "";

        // GraphLow
        $this->GraphLow->LinkCustomAttributes = "";
        $this->GraphLow->HrefValue = "";
        $this->GraphLow->TooltipValue = "";

        // GraphHigh
        $this->GraphHigh->LinkCustomAttributes = "";
        $this->GraphHigh->HrefValue = "";
        $this->GraphHigh->TooltipValue = "";

        // CollSample
        $this->CollSample->LinkCustomAttributes = "";
        $this->CollSample->HrefValue = "";
        $this->CollSample->TooltipValue = "";

        // ProcessTime
        $this->ProcessTime->LinkCustomAttributes = "";
        $this->ProcessTime->HrefValue = "";
        $this->ProcessTime->TooltipValue = "";

        // TamilName
        $this->TamilName->LinkCustomAttributes = "";
        $this->TamilName->HrefValue = "";
        $this->TamilName->TooltipValue = "";

        // ShortName
        $this->ShortName->LinkCustomAttributes = "";
        $this->ShortName->HrefValue = "";
        $this->ShortName->TooltipValue = "";

        // Individual
        $this->Individual->LinkCustomAttributes = "";
        $this->Individual->HrefValue = "";
        $this->Individual->TooltipValue = "";

        // PrevAmt
        $this->PrevAmt->LinkCustomAttributes = "";
        $this->PrevAmt->HrefValue = "";
        $this->PrevAmt->TooltipValue = "";

        // PrevSplAmt
        $this->PrevSplAmt->LinkCustomAttributes = "";
        $this->PrevSplAmt->HrefValue = "";
        $this->PrevSplAmt->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // EditDate
        $this->EditDate->LinkCustomAttributes = "";
        $this->EditDate->HrefValue = "";
        $this->EditDate->TooltipValue = "";

        // BillName
        $this->BillName->LinkCustomAttributes = "";
        $this->BillName->HrefValue = "";
        $this->BillName->TooltipValue = "";

        // ActualAmt
        $this->ActualAmt->LinkCustomAttributes = "";
        $this->ActualAmt->HrefValue = "";
        $this->ActualAmt->TooltipValue = "";

        // HISCD
        $this->HISCD->LinkCustomAttributes = "";
        $this->HISCD->HrefValue = "";
        $this->HISCD->TooltipValue = "";

        // PriceList
        $this->PriceList->LinkCustomAttributes = "";
        $this->PriceList->HrefValue = "";
        $this->PriceList->TooltipValue = "";

        // IPAmt
        $this->IPAmt->LinkCustomAttributes = "";
        $this->IPAmt->HrefValue = "";
        $this->IPAmt->TooltipValue = "";

        // InsAmt
        $this->InsAmt->LinkCustomAttributes = "";
        $this->InsAmt->HrefValue = "";
        $this->InsAmt->TooltipValue = "";

        // ManualCD
        $this->ManualCD->LinkCustomAttributes = "";
        $this->ManualCD->HrefValue = "";
        $this->ManualCD->TooltipValue = "";

        // Free
        $this->Free->LinkCustomAttributes = "";
        $this->Free->HrefValue = "";
        $this->Free->TooltipValue = "";

        // AutoAuth
        $this->AutoAuth->LinkCustomAttributes = "";
        $this->AutoAuth->HrefValue = "";
        $this->AutoAuth->TooltipValue = "";

        // ProductCD
        $this->ProductCD->LinkCustomAttributes = "";
        $this->ProductCD->HrefValue = "";
        $this->ProductCD->TooltipValue = "";

        // Inventory
        $this->Inventory->LinkCustomAttributes = "";
        $this->Inventory->HrefValue = "";
        $this->Inventory->TooltipValue = "";

        // IntimateTest
        $this->IntimateTest->LinkCustomAttributes = "";
        $this->IntimateTest->HrefValue = "";
        $this->IntimateTest->TooltipValue = "";

        // Manual
        $this->Manual->LinkCustomAttributes = "";
        $this->Manual->HrefValue = "";
        $this->Manual->TooltipValue = "";

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

        // MainDeptCd
        $this->MainDeptCd->EditAttrs["class"] = "form-control";
        $this->MainDeptCd->EditCustomAttributes = "";
        if (!$this->MainDeptCd->Raw) {
            $this->MainDeptCd->CurrentValue = HtmlDecode($this->MainDeptCd->CurrentValue);
        }
        $this->MainDeptCd->EditValue = $this->MainDeptCd->CurrentValue;
        $this->MainDeptCd->PlaceHolder = RemoveHtml($this->MainDeptCd->caption());

        // DeptCd
        $this->DeptCd->EditAttrs["class"] = "form-control";
        $this->DeptCd->EditCustomAttributes = "";
        if (!$this->DeptCd->Raw) {
            $this->DeptCd->CurrentValue = HtmlDecode($this->DeptCd->CurrentValue);
        }
        $this->DeptCd->EditValue = $this->DeptCd->CurrentValue;
        $this->DeptCd->PlaceHolder = RemoveHtml($this->DeptCd->caption());

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

        // TestName
        $this->TestName->EditAttrs["class"] = "form-control";
        $this->TestName->EditCustomAttributes = "";
        if (!$this->TestName->Raw) {
            $this->TestName->CurrentValue = HtmlDecode($this->TestName->CurrentValue);
        }
        $this->TestName->EditValue = $this->TestName->CurrentValue;
        $this->TestName->PlaceHolder = RemoveHtml($this->TestName->caption());

        // XrayPart
        $this->XrayPart->EditAttrs["class"] = "form-control";
        $this->XrayPart->EditCustomAttributes = "";
        if (!$this->XrayPart->Raw) {
            $this->XrayPart->CurrentValue = HtmlDecode($this->XrayPart->CurrentValue);
        }
        $this->XrayPart->EditValue = $this->XrayPart->CurrentValue;
        $this->XrayPart->PlaceHolder = RemoveHtml($this->XrayPart->caption());

        // Method
        $this->Method->EditAttrs["class"] = "form-control";
        $this->Method->EditCustomAttributes = "";
        if (!$this->Method->Raw) {
            $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
        }
        $this->Method->EditValue = $this->Method->CurrentValue;
        $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

        // Order
        $this->Order->EditAttrs["class"] = "form-control";
        $this->Order->EditCustomAttributes = "";
        $this->Order->EditValue = $this->Order->CurrentValue;
        $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
        if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
            $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
        }

        // Form
        $this->Form->EditAttrs["class"] = "form-control";
        $this->Form->EditCustomAttributes = "";
        if (!$this->Form->Raw) {
            $this->Form->CurrentValue = HtmlDecode($this->Form->CurrentValue);
        }
        $this->Form->EditValue = $this->Form->CurrentValue;
        $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

        // Amt
        $this->Amt->EditAttrs["class"] = "form-control";
        $this->Amt->EditCustomAttributes = "";
        $this->Amt->EditValue = $this->Amt->CurrentValue;
        $this->Amt->PlaceHolder = RemoveHtml($this->Amt->caption());
        if (strval($this->Amt->EditValue) != "" && is_numeric($this->Amt->EditValue)) {
            $this->Amt->EditValue = FormatNumber($this->Amt->EditValue, -2, -2, -2, -2);
        }

        // SplAmt
        $this->SplAmt->EditAttrs["class"] = "form-control";
        $this->SplAmt->EditCustomAttributes = "";
        $this->SplAmt->EditValue = $this->SplAmt->CurrentValue;
        $this->SplAmt->PlaceHolder = RemoveHtml($this->SplAmt->caption());
        if (strval($this->SplAmt->EditValue) != "" && is_numeric($this->SplAmt->EditValue)) {
            $this->SplAmt->EditValue = FormatNumber($this->SplAmt->EditValue, -2, -2, -2, -2);
        }

        // ResType
        $this->ResType->EditAttrs["class"] = "form-control";
        $this->ResType->EditCustomAttributes = "";
        if (!$this->ResType->Raw) {
            $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
        }
        $this->ResType->EditValue = $this->ResType->CurrentValue;
        $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

        // UnitCD
        $this->UnitCD->EditAttrs["class"] = "form-control";
        $this->UnitCD->EditCustomAttributes = "";
        if (!$this->UnitCD->Raw) {
            $this->UnitCD->CurrentValue = HtmlDecode($this->UnitCD->CurrentValue);
        }
        $this->UnitCD->EditValue = $this->UnitCD->CurrentValue;
        $this->UnitCD->PlaceHolder = RemoveHtml($this->UnitCD->caption());

        // RefValue
        $this->RefValue->EditAttrs["class"] = "form-control";
        $this->RefValue->EditCustomAttributes = "";
        $this->RefValue->EditValue = $this->RefValue->CurrentValue;
        $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

        // Sample
        $this->Sample->EditAttrs["class"] = "form-control";
        $this->Sample->EditCustomAttributes = "";
        if (!$this->Sample->Raw) {
            $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
        }
        $this->Sample->EditValue = $this->Sample->CurrentValue;
        $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

        // NoD
        $this->NoD->EditAttrs["class"] = "form-control";
        $this->NoD->EditCustomAttributes = "";
        $this->NoD->EditValue = $this->NoD->CurrentValue;
        $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
        if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
            $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
        }

        // BillOrder
        $this->BillOrder->EditAttrs["class"] = "form-control";
        $this->BillOrder->EditCustomAttributes = "";
        $this->BillOrder->EditValue = $this->BillOrder->CurrentValue;
        $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
        if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
            $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
        }

        // Formula
        $this->Formula->EditAttrs["class"] = "form-control";
        $this->Formula->EditCustomAttributes = "";
        $this->Formula->EditValue = $this->Formula->CurrentValue;
        $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

        // Inactive
        $this->Inactive->EditAttrs["class"] = "form-control";
        $this->Inactive->EditCustomAttributes = "";
        if (!$this->Inactive->Raw) {
            $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
        }
        $this->Inactive->EditValue = $this->Inactive->CurrentValue;
        $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

        // ReagentAmt
        $this->ReagentAmt->EditAttrs["class"] = "form-control";
        $this->ReagentAmt->EditCustomAttributes = "";
        $this->ReagentAmt->EditValue = $this->ReagentAmt->CurrentValue;
        $this->ReagentAmt->PlaceHolder = RemoveHtml($this->ReagentAmt->caption());
        if (strval($this->ReagentAmt->EditValue) != "" && is_numeric($this->ReagentAmt->EditValue)) {
            $this->ReagentAmt->EditValue = FormatNumber($this->ReagentAmt->EditValue, -2, -2, -2, -2);
        }

        // LabAmt
        $this->LabAmt->EditAttrs["class"] = "form-control";
        $this->LabAmt->EditCustomAttributes = "";
        $this->LabAmt->EditValue = $this->LabAmt->CurrentValue;
        $this->LabAmt->PlaceHolder = RemoveHtml($this->LabAmt->caption());
        if (strval($this->LabAmt->EditValue) != "" && is_numeric($this->LabAmt->EditValue)) {
            $this->LabAmt->EditValue = FormatNumber($this->LabAmt->EditValue, -2, -2, -2, -2);
        }

        // RefAmt
        $this->RefAmt->EditAttrs["class"] = "form-control";
        $this->RefAmt->EditCustomAttributes = "";
        $this->RefAmt->EditValue = $this->RefAmt->CurrentValue;
        $this->RefAmt->PlaceHolder = RemoveHtml($this->RefAmt->caption());
        if (strval($this->RefAmt->EditValue) != "" && is_numeric($this->RefAmt->EditValue)) {
            $this->RefAmt->EditValue = FormatNumber($this->RefAmt->EditValue, -2, -2, -2, -2);
        }

        // CreFrom
        $this->CreFrom->EditAttrs["class"] = "form-control";
        $this->CreFrom->EditCustomAttributes = "";
        $this->CreFrom->EditValue = $this->CreFrom->CurrentValue;
        $this->CreFrom->PlaceHolder = RemoveHtml($this->CreFrom->caption());
        if (strval($this->CreFrom->EditValue) != "" && is_numeric($this->CreFrom->EditValue)) {
            $this->CreFrom->EditValue = FormatNumber($this->CreFrom->EditValue, -2, -2, -2, -2);
        }

        // CreTo
        $this->CreTo->EditAttrs["class"] = "form-control";
        $this->CreTo->EditCustomAttributes = "";
        $this->CreTo->EditValue = $this->CreTo->CurrentValue;
        $this->CreTo->PlaceHolder = RemoveHtml($this->CreTo->caption());
        if (strval($this->CreTo->EditValue) != "" && is_numeric($this->CreTo->EditValue)) {
            $this->CreTo->EditValue = FormatNumber($this->CreTo->EditValue, -2, -2, -2, -2);
        }

        // Note
        $this->Note->EditAttrs["class"] = "form-control";
        $this->Note->EditCustomAttributes = "";
        $this->Note->EditValue = $this->Note->CurrentValue;
        $this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

        // Sun
        $this->Sun->EditAttrs["class"] = "form-control";
        $this->Sun->EditCustomAttributes = "";
        if (!$this->Sun->Raw) {
            $this->Sun->CurrentValue = HtmlDecode($this->Sun->CurrentValue);
        }
        $this->Sun->EditValue = $this->Sun->CurrentValue;
        $this->Sun->PlaceHolder = RemoveHtml($this->Sun->caption());

        // Mon
        $this->Mon->EditAttrs["class"] = "form-control";
        $this->Mon->EditCustomAttributes = "";
        if (!$this->Mon->Raw) {
            $this->Mon->CurrentValue = HtmlDecode($this->Mon->CurrentValue);
        }
        $this->Mon->EditValue = $this->Mon->CurrentValue;
        $this->Mon->PlaceHolder = RemoveHtml($this->Mon->caption());

        // Tue
        $this->Tue->EditAttrs["class"] = "form-control";
        $this->Tue->EditCustomAttributes = "";
        if (!$this->Tue->Raw) {
            $this->Tue->CurrentValue = HtmlDecode($this->Tue->CurrentValue);
        }
        $this->Tue->EditValue = $this->Tue->CurrentValue;
        $this->Tue->PlaceHolder = RemoveHtml($this->Tue->caption());

        // Wed
        $this->Wed->EditAttrs["class"] = "form-control";
        $this->Wed->EditCustomAttributes = "";
        if (!$this->Wed->Raw) {
            $this->Wed->CurrentValue = HtmlDecode($this->Wed->CurrentValue);
        }
        $this->Wed->EditValue = $this->Wed->CurrentValue;
        $this->Wed->PlaceHolder = RemoveHtml($this->Wed->caption());

        // Thi
        $this->Thi->EditAttrs["class"] = "form-control";
        $this->Thi->EditCustomAttributes = "";
        if (!$this->Thi->Raw) {
            $this->Thi->CurrentValue = HtmlDecode($this->Thi->CurrentValue);
        }
        $this->Thi->EditValue = $this->Thi->CurrentValue;
        $this->Thi->PlaceHolder = RemoveHtml($this->Thi->caption());

        // Fri
        $this->Fri->EditAttrs["class"] = "form-control";
        $this->Fri->EditCustomAttributes = "";
        if (!$this->Fri->Raw) {
            $this->Fri->CurrentValue = HtmlDecode($this->Fri->CurrentValue);
        }
        $this->Fri->EditValue = $this->Fri->CurrentValue;
        $this->Fri->PlaceHolder = RemoveHtml($this->Fri->caption());

        // Sat
        $this->Sat->EditAttrs["class"] = "form-control";
        $this->Sat->EditCustomAttributes = "";
        if (!$this->Sat->Raw) {
            $this->Sat->CurrentValue = HtmlDecode($this->Sat->CurrentValue);
        }
        $this->Sat->EditValue = $this->Sat->CurrentValue;
        $this->Sat->PlaceHolder = RemoveHtml($this->Sat->caption());

        // Days
        $this->Days->EditAttrs["class"] = "form-control";
        $this->Days->EditCustomAttributes = "";
        $this->Days->EditValue = $this->Days->CurrentValue;
        $this->Days->PlaceHolder = RemoveHtml($this->Days->caption());
        if (strval($this->Days->EditValue) != "" && is_numeric($this->Days->EditValue)) {
            $this->Days->EditValue = FormatNumber($this->Days->EditValue, -2, -2, -2, -2);
        }

        // Cutoff
        $this->Cutoff->EditAttrs["class"] = "form-control";
        $this->Cutoff->EditCustomAttributes = "";
        if (!$this->Cutoff->Raw) {
            $this->Cutoff->CurrentValue = HtmlDecode($this->Cutoff->CurrentValue);
        }
        $this->Cutoff->EditValue = $this->Cutoff->CurrentValue;
        $this->Cutoff->PlaceHolder = RemoveHtml($this->Cutoff->caption());

        // FontBold
        $this->FontBold->EditAttrs["class"] = "form-control";
        $this->FontBold->EditCustomAttributes = "";
        if (!$this->FontBold->Raw) {
            $this->FontBold->CurrentValue = HtmlDecode($this->FontBold->CurrentValue);
        }
        $this->FontBold->EditValue = $this->FontBold->CurrentValue;
        $this->FontBold->PlaceHolder = RemoveHtml($this->FontBold->caption());

        // TestHeading
        $this->TestHeading->EditAttrs["class"] = "form-control";
        $this->TestHeading->EditCustomAttributes = "";
        if (!$this->TestHeading->Raw) {
            $this->TestHeading->CurrentValue = HtmlDecode($this->TestHeading->CurrentValue);
        }
        $this->TestHeading->EditValue = $this->TestHeading->CurrentValue;
        $this->TestHeading->PlaceHolder = RemoveHtml($this->TestHeading->caption());

        // Outsource
        $this->Outsource->EditAttrs["class"] = "form-control";
        $this->Outsource->EditCustomAttributes = "";
        if (!$this->Outsource->Raw) {
            $this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
        }
        $this->Outsource->EditValue = $this->Outsource->CurrentValue;
        $this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

        // NoResult
        $this->NoResult->EditAttrs["class"] = "form-control";
        $this->NoResult->EditCustomAttributes = "";
        if (!$this->NoResult->Raw) {
            $this->NoResult->CurrentValue = HtmlDecode($this->NoResult->CurrentValue);
        }
        $this->NoResult->EditValue = $this->NoResult->CurrentValue;
        $this->NoResult->PlaceHolder = RemoveHtml($this->NoResult->caption());

        // GraphLow
        $this->GraphLow->EditAttrs["class"] = "form-control";
        $this->GraphLow->EditCustomAttributes = "";
        $this->GraphLow->EditValue = $this->GraphLow->CurrentValue;
        $this->GraphLow->PlaceHolder = RemoveHtml($this->GraphLow->caption());
        if (strval($this->GraphLow->EditValue) != "" && is_numeric($this->GraphLow->EditValue)) {
            $this->GraphLow->EditValue = FormatNumber($this->GraphLow->EditValue, -2, -2, -2, -2);
        }

        // GraphHigh
        $this->GraphHigh->EditAttrs["class"] = "form-control";
        $this->GraphHigh->EditCustomAttributes = "";
        $this->GraphHigh->EditValue = $this->GraphHigh->CurrentValue;
        $this->GraphHigh->PlaceHolder = RemoveHtml($this->GraphHigh->caption());
        if (strval($this->GraphHigh->EditValue) != "" && is_numeric($this->GraphHigh->EditValue)) {
            $this->GraphHigh->EditValue = FormatNumber($this->GraphHigh->EditValue, -2, -2, -2, -2);
        }

        // CollSample
        $this->CollSample->EditAttrs["class"] = "form-control";
        $this->CollSample->EditCustomAttributes = "";
        if (!$this->CollSample->Raw) {
            $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
        }
        $this->CollSample->EditValue = $this->CollSample->CurrentValue;
        $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

        // ProcessTime
        $this->ProcessTime->EditAttrs["class"] = "form-control";
        $this->ProcessTime->EditCustomAttributes = "";
        if (!$this->ProcessTime->Raw) {
            $this->ProcessTime->CurrentValue = HtmlDecode($this->ProcessTime->CurrentValue);
        }
        $this->ProcessTime->EditValue = $this->ProcessTime->CurrentValue;
        $this->ProcessTime->PlaceHolder = RemoveHtml($this->ProcessTime->caption());

        // TamilName
        $this->TamilName->EditAttrs["class"] = "form-control";
        $this->TamilName->EditCustomAttributes = "";
        if (!$this->TamilName->Raw) {
            $this->TamilName->CurrentValue = HtmlDecode($this->TamilName->CurrentValue);
        }
        $this->TamilName->EditValue = $this->TamilName->CurrentValue;
        $this->TamilName->PlaceHolder = RemoveHtml($this->TamilName->caption());

        // ShortName
        $this->ShortName->EditAttrs["class"] = "form-control";
        $this->ShortName->EditCustomAttributes = "";
        if (!$this->ShortName->Raw) {
            $this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
        }
        $this->ShortName->EditValue = $this->ShortName->CurrentValue;
        $this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

        // Individual
        $this->Individual->EditAttrs["class"] = "form-control";
        $this->Individual->EditCustomAttributes = "";
        if (!$this->Individual->Raw) {
            $this->Individual->CurrentValue = HtmlDecode($this->Individual->CurrentValue);
        }
        $this->Individual->EditValue = $this->Individual->CurrentValue;
        $this->Individual->PlaceHolder = RemoveHtml($this->Individual->caption());

        // PrevAmt
        $this->PrevAmt->EditAttrs["class"] = "form-control";
        $this->PrevAmt->EditCustomAttributes = "";
        $this->PrevAmt->EditValue = $this->PrevAmt->CurrentValue;
        $this->PrevAmt->PlaceHolder = RemoveHtml($this->PrevAmt->caption());
        if (strval($this->PrevAmt->EditValue) != "" && is_numeric($this->PrevAmt->EditValue)) {
            $this->PrevAmt->EditValue = FormatNumber($this->PrevAmt->EditValue, -2, -2, -2, -2);
        }

        // PrevSplAmt
        $this->PrevSplAmt->EditAttrs["class"] = "form-control";
        $this->PrevSplAmt->EditCustomAttributes = "";
        $this->PrevSplAmt->EditValue = $this->PrevSplAmt->CurrentValue;
        $this->PrevSplAmt->PlaceHolder = RemoveHtml($this->PrevSplAmt->caption());
        if (strval($this->PrevSplAmt->EditValue) != "" && is_numeric($this->PrevSplAmt->EditValue)) {
            $this->PrevSplAmt->EditValue = FormatNumber($this->PrevSplAmt->EditValue, -2, -2, -2, -2);
        }

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // EditDate
        $this->EditDate->EditAttrs["class"] = "form-control";
        $this->EditDate->EditCustomAttributes = "";
        $this->EditDate->EditValue = FormatDateTime($this->EditDate->CurrentValue, 8);
        $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

        // BillName
        $this->BillName->EditAttrs["class"] = "form-control";
        $this->BillName->EditCustomAttributes = "";
        if (!$this->BillName->Raw) {
            $this->BillName->CurrentValue = HtmlDecode($this->BillName->CurrentValue);
        }
        $this->BillName->EditValue = $this->BillName->CurrentValue;
        $this->BillName->PlaceHolder = RemoveHtml($this->BillName->caption());

        // ActualAmt
        $this->ActualAmt->EditAttrs["class"] = "form-control";
        $this->ActualAmt->EditCustomAttributes = "";
        $this->ActualAmt->EditValue = $this->ActualAmt->CurrentValue;
        $this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
        if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue)) {
            $this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
        }

        // HISCD
        $this->HISCD->EditAttrs["class"] = "form-control";
        $this->HISCD->EditCustomAttributes = "";
        if (!$this->HISCD->Raw) {
            $this->HISCD->CurrentValue = HtmlDecode($this->HISCD->CurrentValue);
        }
        $this->HISCD->EditValue = $this->HISCD->CurrentValue;
        $this->HISCD->PlaceHolder = RemoveHtml($this->HISCD->caption());

        // PriceList
        $this->PriceList->EditAttrs["class"] = "form-control";
        $this->PriceList->EditCustomAttributes = "";
        if (!$this->PriceList->Raw) {
            $this->PriceList->CurrentValue = HtmlDecode($this->PriceList->CurrentValue);
        }
        $this->PriceList->EditValue = $this->PriceList->CurrentValue;
        $this->PriceList->PlaceHolder = RemoveHtml($this->PriceList->caption());

        // IPAmt
        $this->IPAmt->EditAttrs["class"] = "form-control";
        $this->IPAmt->EditCustomAttributes = "";
        $this->IPAmt->EditValue = $this->IPAmt->CurrentValue;
        $this->IPAmt->PlaceHolder = RemoveHtml($this->IPAmt->caption());
        if (strval($this->IPAmt->EditValue) != "" && is_numeric($this->IPAmt->EditValue)) {
            $this->IPAmt->EditValue = FormatNumber($this->IPAmt->EditValue, -2, -2, -2, -2);
        }

        // InsAmt
        $this->InsAmt->EditAttrs["class"] = "form-control";
        $this->InsAmt->EditCustomAttributes = "";
        $this->InsAmt->EditValue = $this->InsAmt->CurrentValue;
        $this->InsAmt->PlaceHolder = RemoveHtml($this->InsAmt->caption());
        if (strval($this->InsAmt->EditValue) != "" && is_numeric($this->InsAmt->EditValue)) {
            $this->InsAmt->EditValue = FormatNumber($this->InsAmt->EditValue, -2, -2, -2, -2);
        }

        // ManualCD
        $this->ManualCD->EditAttrs["class"] = "form-control";
        $this->ManualCD->EditCustomAttributes = "";
        if (!$this->ManualCD->Raw) {
            $this->ManualCD->CurrentValue = HtmlDecode($this->ManualCD->CurrentValue);
        }
        $this->ManualCD->EditValue = $this->ManualCD->CurrentValue;
        $this->ManualCD->PlaceHolder = RemoveHtml($this->ManualCD->caption());

        // Free
        $this->Free->EditAttrs["class"] = "form-control";
        $this->Free->EditCustomAttributes = "";
        if (!$this->Free->Raw) {
            $this->Free->CurrentValue = HtmlDecode($this->Free->CurrentValue);
        }
        $this->Free->EditValue = $this->Free->CurrentValue;
        $this->Free->PlaceHolder = RemoveHtml($this->Free->caption());

        // AutoAuth
        $this->AutoAuth->EditAttrs["class"] = "form-control";
        $this->AutoAuth->EditCustomAttributes = "";
        if (!$this->AutoAuth->Raw) {
            $this->AutoAuth->CurrentValue = HtmlDecode($this->AutoAuth->CurrentValue);
        }
        $this->AutoAuth->EditValue = $this->AutoAuth->CurrentValue;
        $this->AutoAuth->PlaceHolder = RemoveHtml($this->AutoAuth->caption());

        // ProductCD
        $this->ProductCD->EditAttrs["class"] = "form-control";
        $this->ProductCD->EditCustomAttributes = "";
        if (!$this->ProductCD->Raw) {
            $this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
        }
        $this->ProductCD->EditValue = $this->ProductCD->CurrentValue;
        $this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

        // Inventory
        $this->Inventory->EditAttrs["class"] = "form-control";
        $this->Inventory->EditCustomAttributes = "";
        if (!$this->Inventory->Raw) {
            $this->Inventory->CurrentValue = HtmlDecode($this->Inventory->CurrentValue);
        }
        $this->Inventory->EditValue = $this->Inventory->CurrentValue;
        $this->Inventory->PlaceHolder = RemoveHtml($this->Inventory->caption());

        // IntimateTest
        $this->IntimateTest->EditAttrs["class"] = "form-control";
        $this->IntimateTest->EditCustomAttributes = "";
        if (!$this->IntimateTest->Raw) {
            $this->IntimateTest->CurrentValue = HtmlDecode($this->IntimateTest->CurrentValue);
        }
        $this->IntimateTest->EditValue = $this->IntimateTest->CurrentValue;
        $this->IntimateTest->PlaceHolder = RemoveHtml($this->IntimateTest->caption());

        // Manual
        $this->Manual->EditAttrs["class"] = "form-control";
        $this->Manual->EditCustomAttributes = "";
        if (!$this->Manual->Raw) {
            $this->Manual->CurrentValue = HtmlDecode($this->Manual->CurrentValue);
        }
        $this->Manual->EditValue = $this->Manual->CurrentValue;
        $this->Manual->PlaceHolder = RemoveHtml($this->Manual->caption());

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
                    $doc->exportCaption($this->MainDeptCd);
                    $doc->exportCaption($this->DeptCd);
                    $doc->exportCaption($this->TestCd);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->TestName);
                    $doc->exportCaption($this->XrayPart);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->Amt);
                    $doc->exportCaption($this->SplAmt);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->UnitCD);
                    $doc->exportCaption($this->RefValue);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Formula);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->ReagentAmt);
                    $doc->exportCaption($this->LabAmt);
                    $doc->exportCaption($this->RefAmt);
                    $doc->exportCaption($this->CreFrom);
                    $doc->exportCaption($this->CreTo);
                    $doc->exportCaption($this->Note);
                    $doc->exportCaption($this->Sun);
                    $doc->exportCaption($this->Mon);
                    $doc->exportCaption($this->Tue);
                    $doc->exportCaption($this->Wed);
                    $doc->exportCaption($this->Thi);
                    $doc->exportCaption($this->Fri);
                    $doc->exportCaption($this->Sat);
                    $doc->exportCaption($this->Days);
                    $doc->exportCaption($this->Cutoff);
                    $doc->exportCaption($this->FontBold);
                    $doc->exportCaption($this->TestHeading);
                    $doc->exportCaption($this->Outsource);
                    $doc->exportCaption($this->NoResult);
                    $doc->exportCaption($this->GraphLow);
                    $doc->exportCaption($this->GraphHigh);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->ProcessTime);
                    $doc->exportCaption($this->TamilName);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->Individual);
                    $doc->exportCaption($this->PrevAmt);
                    $doc->exportCaption($this->PrevSplAmt);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->BillName);
                    $doc->exportCaption($this->ActualAmt);
                    $doc->exportCaption($this->HISCD);
                    $doc->exportCaption($this->PriceList);
                    $doc->exportCaption($this->IPAmt);
                    $doc->exportCaption($this->InsAmt);
                    $doc->exportCaption($this->ManualCD);
                    $doc->exportCaption($this->Free);
                    $doc->exportCaption($this->AutoAuth);
                    $doc->exportCaption($this->ProductCD);
                    $doc->exportCaption($this->Inventory);
                    $doc->exportCaption($this->IntimateTest);
                    $doc->exportCaption($this->Manual);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->MainDeptCd);
                    $doc->exportCaption($this->DeptCd);
                    $doc->exportCaption($this->TestCd);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->TestName);
                    $doc->exportCaption($this->XrayPart);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->Amt);
                    $doc->exportCaption($this->SplAmt);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->UnitCD);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->ReagentAmt);
                    $doc->exportCaption($this->LabAmt);
                    $doc->exportCaption($this->RefAmt);
                    $doc->exportCaption($this->CreFrom);
                    $doc->exportCaption($this->CreTo);
                    $doc->exportCaption($this->Sun);
                    $doc->exportCaption($this->Mon);
                    $doc->exportCaption($this->Tue);
                    $doc->exportCaption($this->Wed);
                    $doc->exportCaption($this->Thi);
                    $doc->exportCaption($this->Fri);
                    $doc->exportCaption($this->Sat);
                    $doc->exportCaption($this->Days);
                    $doc->exportCaption($this->Cutoff);
                    $doc->exportCaption($this->FontBold);
                    $doc->exportCaption($this->TestHeading);
                    $doc->exportCaption($this->Outsource);
                    $doc->exportCaption($this->NoResult);
                    $doc->exportCaption($this->GraphLow);
                    $doc->exportCaption($this->GraphHigh);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->ProcessTime);
                    $doc->exportCaption($this->TamilName);
                    $doc->exportCaption($this->ShortName);
                    $doc->exportCaption($this->Individual);
                    $doc->exportCaption($this->PrevAmt);
                    $doc->exportCaption($this->PrevSplAmt);
                    $doc->exportCaption($this->EditDate);
                    $doc->exportCaption($this->BillName);
                    $doc->exportCaption($this->ActualAmt);
                    $doc->exportCaption($this->HISCD);
                    $doc->exportCaption($this->PriceList);
                    $doc->exportCaption($this->IPAmt);
                    $doc->exportCaption($this->InsAmt);
                    $doc->exportCaption($this->ManualCD);
                    $doc->exportCaption($this->Free);
                    $doc->exportCaption($this->AutoAuth);
                    $doc->exportCaption($this->ProductCD);
                    $doc->exportCaption($this->Inventory);
                    $doc->exportCaption($this->IntimateTest);
                    $doc->exportCaption($this->Manual);
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
                        $doc->exportField($this->MainDeptCd);
                        $doc->exportField($this->DeptCd);
                        $doc->exportField($this->TestCd);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->TestName);
                        $doc->exportField($this->XrayPart);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->Amt);
                        $doc->exportField($this->SplAmt);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->UnitCD);
                        $doc->exportField($this->RefValue);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Formula);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->ReagentAmt);
                        $doc->exportField($this->LabAmt);
                        $doc->exportField($this->RefAmt);
                        $doc->exportField($this->CreFrom);
                        $doc->exportField($this->CreTo);
                        $doc->exportField($this->Note);
                        $doc->exportField($this->Sun);
                        $doc->exportField($this->Mon);
                        $doc->exportField($this->Tue);
                        $doc->exportField($this->Wed);
                        $doc->exportField($this->Thi);
                        $doc->exportField($this->Fri);
                        $doc->exportField($this->Sat);
                        $doc->exportField($this->Days);
                        $doc->exportField($this->Cutoff);
                        $doc->exportField($this->FontBold);
                        $doc->exportField($this->TestHeading);
                        $doc->exportField($this->Outsource);
                        $doc->exportField($this->NoResult);
                        $doc->exportField($this->GraphLow);
                        $doc->exportField($this->GraphHigh);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->ProcessTime);
                        $doc->exportField($this->TamilName);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->Individual);
                        $doc->exportField($this->PrevAmt);
                        $doc->exportField($this->PrevSplAmt);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->BillName);
                        $doc->exportField($this->ActualAmt);
                        $doc->exportField($this->HISCD);
                        $doc->exportField($this->PriceList);
                        $doc->exportField($this->IPAmt);
                        $doc->exportField($this->InsAmt);
                        $doc->exportField($this->ManualCD);
                        $doc->exportField($this->Free);
                        $doc->exportField($this->AutoAuth);
                        $doc->exportField($this->ProductCD);
                        $doc->exportField($this->Inventory);
                        $doc->exportField($this->IntimateTest);
                        $doc->exportField($this->Manual);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->MainDeptCd);
                        $doc->exportField($this->DeptCd);
                        $doc->exportField($this->TestCd);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->TestName);
                        $doc->exportField($this->XrayPart);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->Amt);
                        $doc->exportField($this->SplAmt);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->UnitCD);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->ReagentAmt);
                        $doc->exportField($this->LabAmt);
                        $doc->exportField($this->RefAmt);
                        $doc->exportField($this->CreFrom);
                        $doc->exportField($this->CreTo);
                        $doc->exportField($this->Sun);
                        $doc->exportField($this->Mon);
                        $doc->exportField($this->Tue);
                        $doc->exportField($this->Wed);
                        $doc->exportField($this->Thi);
                        $doc->exportField($this->Fri);
                        $doc->exportField($this->Sat);
                        $doc->exportField($this->Days);
                        $doc->exportField($this->Cutoff);
                        $doc->exportField($this->FontBold);
                        $doc->exportField($this->TestHeading);
                        $doc->exportField($this->Outsource);
                        $doc->exportField($this->NoResult);
                        $doc->exportField($this->GraphLow);
                        $doc->exportField($this->GraphHigh);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->ProcessTime);
                        $doc->exportField($this->TamilName);
                        $doc->exportField($this->ShortName);
                        $doc->exportField($this->Individual);
                        $doc->exportField($this->PrevAmt);
                        $doc->exportField($this->PrevSplAmt);
                        $doc->exportField($this->EditDate);
                        $doc->exportField($this->BillName);
                        $doc->exportField($this->ActualAmt);
                        $doc->exportField($this->HISCD);
                        $doc->exportField($this->PriceList);
                        $doc->exportField($this->IPAmt);
                        $doc->exportField($this->InsAmt);
                        $doc->exportField($this->ManualCD);
                        $doc->exportField($this->Free);
                        $doc->exportField($this->AutoAuth);
                        $doc->exportField($this->ProductCD);
                        $doc->exportField($this->Inventory);
                        $doc->exportField($this->IntimateTest);
                        $doc->exportField($this->Manual);
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
