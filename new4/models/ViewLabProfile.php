<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_lab_profile
 */
class ViewLabProfile extends DbTable
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
    public $Id;
    public $CODE;
    public $SERVICE;
    public $UNITS;
    public $AMOUNT;
    public $SERVICE_TYPE;
    public $DEPARTMENT;
    public $Created;
    public $CreatedDateTime;
    public $Modified;
    public $ModifiedDateTime;
    public $mas_services_billingcol;
    public $DrShareAmount;
    public $HospShareAmount;
    public $DrSharePer;
    public $HospSharePer;
    public $HospID;
    public $TestSubCd;
    public $Method;
    public $Order;
    public $Form;
    public $ResType;
    public $UnitCD;
    public $RefValue;
    public $Sample;
    public $NoD;
    public $BillOrder;
    public $Formula;
    public $Inactive;
    public $Outsource;
    public $CollSample;
    public $TestType;
    public $NoHeading;
    public $ChemicalCode;
    public $ChemicalName;
    public $Utilaization;
    public $Interpretation;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_lab_profile';
        $this->TableName = 'view_lab_profile';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_lab_profile`";
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

        // Id
        $this->Id = new DbField('view_lab_profile', 'view_lab_profile', 'x_Id', 'Id', '`Id`', '`Id`', 3, 11, -1, false, '`Id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->Id->IsAutoIncrement = true; // Autoincrement field
        $this->Id->IsPrimaryKey = true; // Primary key field
        $this->Id->Sortable = true; // Allow sort
        $this->Id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Id->Param, "CustomMsg");
        $this->Fields['Id'] = &$this->Id;

        // CODE
        $this->CODE = new DbField('view_lab_profile', 'view_lab_profile', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, 50, -1, false, '`CODE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CODE->IsForeignKey = true; // Foreign key field
        $this->CODE->Required = true; // Required field
        $this->CODE->Sortable = true; // Allow sort
        $this->CODE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CODE->Param, "CustomMsg");
        $this->Fields['CODE'] = &$this->CODE;

        // SERVICE
        $this->SERVICE = new DbField('view_lab_profile', 'view_lab_profile', 'x_SERVICE', 'SERVICE', '`SERVICE`', '`SERVICE`', 200, 50, -1, false, '`SERVICE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SERVICE->Required = true; // Required field
        $this->SERVICE->Sortable = true; // Allow sort
        $this->SERVICE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SERVICE->Param, "CustomMsg");
        $this->Fields['SERVICE'] = &$this->SERVICE;

        // UNITS
        $this->UNITS = new DbField('view_lab_profile', 'view_lab_profile', 'x_UNITS', 'UNITS', '`UNITS`', '`UNITS`', 3, 11, -1, false, '`UNITS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UNITS->Sortable = true; // Allow sort
        $this->UNITS->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->UNITS->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UNITS->Param, "CustomMsg");
        $this->Fields['UNITS'] = &$this->UNITS;

        // AMOUNT
        $this->AMOUNT = new DbField('view_lab_profile', 'view_lab_profile', 'x_AMOUNT', 'AMOUNT', '`AMOUNT`', '`AMOUNT`', 5, 22, -1, false, '`AMOUNT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AMOUNT->Required = true; // Required field
        $this->AMOUNT->Sortable = true; // Allow sort
        $this->AMOUNT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AMOUNT->Param, "CustomMsg");
        $this->Fields['AMOUNT'] = &$this->AMOUNT;

        // SERVICE_TYPE
        $this->SERVICE_TYPE = new DbField('view_lab_profile', 'view_lab_profile', 'x_SERVICE_TYPE', 'SERVICE_TYPE', '`SERVICE_TYPE`', '`SERVICE_TYPE`', 200, 50, -1, false, '`SERVICE_TYPE`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->SERVICE_TYPE->Required = true; // Required field
        $this->SERVICE_TYPE->Sortable = true; // Allow sort
        $this->SERVICE_TYPE->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->SERVICE_TYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->SERVICE_TYPE->Lookup = new Lookup('SERVICE_TYPE', 'mas_services_type', false, 'name', ["name","","",""], [], [], [], [], [], [], '', '');
        $this->SERVICE_TYPE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SERVICE_TYPE->Param, "CustomMsg");
        $this->Fields['SERVICE_TYPE'] = &$this->SERVICE_TYPE;

        // DEPARTMENT
        $this->DEPARTMENT = new DbField('view_lab_profile', 'view_lab_profile', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, 50, -1, false, '`DEPARTMENT`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DEPARTMENT->Required = true; // Required field
        $this->DEPARTMENT->Sortable = true; // Allow sort
        $this->DEPARTMENT->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DEPARTMENT->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DEPARTMENT->Lookup = new Lookup('DEPARTMENT', 'mas_billing_department', false, 'department', ["department","","",""], [], [], [], [], [], [], '', '');
        $this->DEPARTMENT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DEPARTMENT->Param, "CustomMsg");
        $this->Fields['DEPARTMENT'] = &$this->DEPARTMENT;

        // Created
        $this->Created = new DbField('view_lab_profile', 'view_lab_profile', 'x_Created', 'Created', '`Created`', '`Created`', 200, 45, -1, false, '`Created`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Created->Sortable = false; // Allow sort
        $this->Created->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Created->Param, "CustomMsg");
        $this->Fields['Created'] = &$this->Created;

        // CreatedDateTime
        $this->CreatedDateTime = new DbField('view_lab_profile', 'view_lab_profile', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike("`CreatedDateTime`", 0, "DB"), 135, 19, 0, false, '`CreatedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedDateTime->Sortable = false; // Allow sort
        $this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->CreatedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CreatedDateTime->Param, "CustomMsg");
        $this->Fields['CreatedDateTime'] = &$this->CreatedDateTime;

        // Modified
        $this->Modified = new DbField('view_lab_profile', 'view_lab_profile', 'x_Modified', 'Modified', '`Modified`', '`Modified`', 200, 45, -1, false, '`Modified`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Modified->Sortable = false; // Allow sort
        $this->Modified->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Modified->Param, "CustomMsg");
        $this->Fields['Modified'] = &$this->Modified;

        // ModifiedDateTime
        $this->ModifiedDateTime = new DbField('view_lab_profile', 'view_lab_profile', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike("`ModifiedDateTime`", 0, "DB"), 135, 19, 0, false, '`ModifiedDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDateTime->Sortable = false; // Allow sort
        $this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->ModifiedDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ModifiedDateTime->Param, "CustomMsg");
        $this->Fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

        // mas_services_billingcol
        $this->mas_services_billingcol = new DbField('view_lab_profile', 'view_lab_profile', 'x_mas_services_billingcol', 'mas_services_billingcol', '`mas_services_billingcol`', '`mas_services_billingcol`', 200, 45, -1, false, '`mas_services_billingcol`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mas_services_billingcol->Sortable = true; // Allow sort
        $this->mas_services_billingcol->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mas_services_billingcol->Param, "CustomMsg");
        $this->Fields['mas_services_billingcol'] = &$this->mas_services_billingcol;

        // DrShareAmount
        $this->DrShareAmount = new DbField('view_lab_profile', 'view_lab_profile', 'x_DrShareAmount', 'DrShareAmount', '`DrShareAmount`', '`DrShareAmount`', 5, 22, -1, false, '`DrShareAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrShareAmount->Sortable = true; // Allow sort
        $this->DrShareAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DrShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->DrShareAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrShareAmount->Param, "CustomMsg");
        $this->Fields['DrShareAmount'] = &$this->DrShareAmount;

        // HospShareAmount
        $this->HospShareAmount = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospShareAmount', 'HospShareAmount', '`HospShareAmount`', '`HospShareAmount`', 5, 22, -1, false, '`HospShareAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospShareAmount->Sortable = true; // Allow sort
        $this->HospShareAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->HospShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->HospShareAmount->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospShareAmount->Param, "CustomMsg");
        $this->Fields['HospShareAmount'] = &$this->HospShareAmount;

        // DrSharePer
        $this->DrSharePer = new DbField('view_lab_profile', 'view_lab_profile', 'x_DrSharePer', 'DrSharePer', '`DrSharePer`', '`DrSharePer`', 3, 11, -1, false, '`DrSharePer`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DrSharePer->Sortable = true; // Allow sort
        $this->DrSharePer->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->DrSharePer->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrSharePer->Param, "CustomMsg");
        $this->Fields['DrSharePer'] = &$this->DrSharePer;

        // HospSharePer
        $this->HospSharePer = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospSharePer', 'HospSharePer', '`HospSharePer`', '`HospSharePer`', 3, 11, -1, false, '`HospSharePer`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospSharePer->Sortable = true; // Allow sort
        $this->HospSharePer->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospSharePer->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospSharePer->Param, "CustomMsg");
        $this->Fields['HospSharePer'] = &$this->HospSharePer;

        // HospID
        $this->HospID = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // TestSubCd
        $this->TestSubCd = new DbField('view_lab_profile', 'view_lab_profile', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, 45, -1, false, '`TestSubCd`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TestSubCd->Sortable = true; // Allow sort
        $this->TestSubCd->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestSubCd->Param, "CustomMsg");
        $this->Fields['TestSubCd'] = &$this->TestSubCd;

        // Method
        $this->Method = new DbField('view_lab_profile', 'view_lab_profile', 'x_Method', 'Method', '`Method`', '`Method`', 200, 45, -1, false, '`Method`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Method->Sortable = true; // Allow sort
        $this->Method->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Method->Param, "CustomMsg");
        $this->Fields['Method'] = &$this->Method;

        // Order
        $this->Order = new DbField('view_lab_profile', 'view_lab_profile', 'x_Order', 'Order', '`Order`', '`Order`', 131, 10, -1, false, '`Order`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Order->Sortable = true; // Allow sort
        $this->Order->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Order->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Order->Param, "CustomMsg");
        $this->Fields['Order'] = &$this->Order;

        // Form
        $this->Form = new DbField('view_lab_profile', 'view_lab_profile', 'x_Form', 'Form', '`Form`', '`Form`', 201, 405, -1, false, '`Form`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Form->Sortable = true; // Allow sort
        $this->Form->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Form->Param, "CustomMsg");
        $this->Fields['Form'] = &$this->Form;

        // ResType
        $this->ResType = new DbField('view_lab_profile', 'view_lab_profile', 'x_ResType', 'ResType', '`ResType`', '`ResType`', 200, 45, -1, false, '`ResType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResType->Sortable = true; // Allow sort
        $this->ResType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ResType->Param, "CustomMsg");
        $this->Fields['ResType'] = &$this->ResType;

        // UnitCD
        $this->UnitCD = new DbField('view_lab_profile', 'view_lab_profile', 'x_UnitCD', 'UnitCD', '`UnitCD`', '`UnitCD`', 200, 45, -1, false, '`UnitCD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitCD->Sortable = true; // Allow sort
        $this->UnitCD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UnitCD->Param, "CustomMsg");
        $this->Fields['UnitCD'] = &$this->UnitCD;

        // RefValue
        $this->RefValue = new DbField('view_lab_profile', 'view_lab_profile', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, 65535, -1, false, '`RefValue`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RefValue->Sortable = true; // Allow sort
        $this->RefValue->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefValue->Param, "CustomMsg");
        $this->Fields['RefValue'] = &$this->RefValue;

        // Sample
        $this->Sample = new DbField('view_lab_profile', 'view_lab_profile', 'x_Sample', 'Sample', '`Sample`', '`Sample`', 200, 105, -1, false, '`Sample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Sample->Sortable = true; // Allow sort
        $this->Sample->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Sample->Param, "CustomMsg");
        $this->Fields['Sample'] = &$this->Sample;

        // NoD
        $this->NoD = new DbField('view_lab_profile', 'view_lab_profile', 'x_NoD', 'NoD', '`NoD`', '`NoD`', 131, 10, -1, false, '`NoD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoD->Sortable = true; // Allow sort
        $this->NoD->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->NoD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->NoD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoD->Param, "CustomMsg");
        $this->Fields['NoD'] = &$this->NoD;

        // BillOrder
        $this->BillOrder = new DbField('view_lab_profile', 'view_lab_profile', 'x_BillOrder', 'BillOrder', '`BillOrder`', '`BillOrder`', 131, 10, -1, false, '`BillOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillOrder->Sortable = true; // Allow sort
        $this->BillOrder->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->BillOrder->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->BillOrder->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BillOrder->Param, "CustomMsg");
        $this->Fields['BillOrder'] = &$this->BillOrder;

        // Formula
        $this->Formula = new DbField('view_lab_profile', 'view_lab_profile', 'x_Formula', 'Formula', '`Formula`', '`Formula`', 201, 1000, -1, false, '`Formula`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Formula->Sortable = true; // Allow sort
        $this->Formula->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Formula->Param, "CustomMsg");
        $this->Fields['Formula'] = &$this->Formula;

        // Inactive
        $this->Inactive = new DbField('view_lab_profile', 'view_lab_profile', 'x_Inactive', 'Inactive', '`Inactive`', '`Inactive`', 200, 45, -1, false, '`Inactive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Inactive->Sortable = true; // Allow sort
        $this->Inactive->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Inactive->Param, "CustomMsg");
        $this->Fields['Inactive'] = &$this->Inactive;

        // Outsource
        $this->Outsource = new DbField('view_lab_profile', 'view_lab_profile', 'x_Outsource', 'Outsource', '`Outsource`', '`Outsource`', 200, 45, -1, false, '`Outsource`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Outsource->Sortable = true; // Allow sort
        $this->Outsource->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Outsource->Param, "CustomMsg");
        $this->Fields['Outsource'] = &$this->Outsource;

        // CollSample
        $this->CollSample = new DbField('view_lab_profile', 'view_lab_profile', 'x_CollSample', 'CollSample', '`CollSample`', '`CollSample`', 200, 45, -1, false, '`CollSample`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CollSample->Sortable = true; // Allow sort
        $this->CollSample->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CollSample->Param, "CustomMsg");
        $this->Fields['CollSample'] = &$this->CollSample;

        // TestType
        $this->TestType = new DbField('view_lab_profile', 'view_lab_profile', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, 45, -1, false, '`TestType`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TestType->Sortable = true; // Allow sort
        $this->TestType->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TestType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TestType->Lookup = new Lookup('TestType', 'view_lab_profile', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->TestType->OptionCount = 2;
        $this->TestType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TestType->Param, "CustomMsg");
        $this->Fields['TestType'] = &$this->TestType;

        // NoHeading
        $this->NoHeading = new DbField('view_lab_profile', 'view_lab_profile', 'x_NoHeading', 'NoHeading', '`NoHeading`', '`NoHeading`', 200, 45, -1, false, '`NoHeading`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoHeading->Sortable = true; // Allow sort
        $this->NoHeading->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NoHeading->Param, "CustomMsg");
        $this->Fields['NoHeading'] = &$this->NoHeading;

        // ChemicalCode
        $this->ChemicalCode = new DbField('view_lab_profile', 'view_lab_profile', 'x_ChemicalCode', 'ChemicalCode', '`ChemicalCode`', '`ChemicalCode`', 200, 45, -1, false, '`ChemicalCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChemicalCode->Sortable = true; // Allow sort
        $this->ChemicalCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChemicalCode->Param, "CustomMsg");
        $this->Fields['ChemicalCode'] = &$this->ChemicalCode;

        // ChemicalName
        $this->ChemicalName = new DbField('view_lab_profile', 'view_lab_profile', 'x_ChemicalName', 'ChemicalName', '`ChemicalName`', '`ChemicalName`', 200, 45, -1, false, '`ChemicalName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ChemicalName->Sortable = true; // Allow sort
        $this->ChemicalName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ChemicalName->Param, "CustomMsg");
        $this->Fields['ChemicalName'] = &$this->ChemicalName;

        // Utilaization
        $this->Utilaization = new DbField('view_lab_profile', 'view_lab_profile', 'x_Utilaization', 'Utilaization', '`Utilaization`', '`Utilaization`', 200, 45, -1, false, '`Utilaization`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Utilaization->Sortable = true; // Allow sort
        $this->Utilaization->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Utilaization->Param, "CustomMsg");
        $this->Fields['Utilaization'] = &$this->Utilaization;

        // Interpretation
        $this->Interpretation = new DbField('view_lab_profile', 'view_lab_profile', 'x_Interpretation', 'Interpretation', '`Interpretation`', '`Interpretation`', 201, 65535, -1, false, '`Interpretation`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Interpretation->Sortable = true; // Allow sort
        $this->Interpretation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Interpretation->Param, "CustomMsg");
        $this->Fields['Interpretation'] = &$this->Interpretation;
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
        if ($this->getCurrentDetailTable() == "lab_profile_details") {
            $detailUrl = Container("lab_profile_details")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_CODE", $this->CODE->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "ViewLabProfileList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_lab_profile`";
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
            $this->Id->setDbValue($conn->lastInsertId());
            $rs['Id'] = $this->Id->DbValue;
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
            if (array_key_exists('Id', $rs)) {
                AddFilter($where, QuotedName('Id', $this->Dbid) . '=' . QuotedValue($rs['Id'], $this->Id->DataType, $this->Dbid));
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
        $this->Id->DbValue = $row['Id'];
        $this->CODE->DbValue = $row['CODE'];
        $this->SERVICE->DbValue = $row['SERVICE'];
        $this->UNITS->DbValue = $row['UNITS'];
        $this->AMOUNT->DbValue = $row['AMOUNT'];
        $this->SERVICE_TYPE->DbValue = $row['SERVICE_TYPE'];
        $this->DEPARTMENT->DbValue = $row['DEPARTMENT'];
        $this->Created->DbValue = $row['Created'];
        $this->CreatedDateTime->DbValue = $row['CreatedDateTime'];
        $this->Modified->DbValue = $row['Modified'];
        $this->ModifiedDateTime->DbValue = $row['ModifiedDateTime'];
        $this->mas_services_billingcol->DbValue = $row['mas_services_billingcol'];
        $this->DrShareAmount->DbValue = $row['DrShareAmount'];
        $this->HospShareAmount->DbValue = $row['HospShareAmount'];
        $this->DrSharePer->DbValue = $row['DrSharePer'];
        $this->HospSharePer->DbValue = $row['HospSharePer'];
        $this->HospID->DbValue = $row['HospID'];
        $this->TestSubCd->DbValue = $row['TestSubCd'];
        $this->Method->DbValue = $row['Method'];
        $this->Order->DbValue = $row['Order'];
        $this->Form->DbValue = $row['Form'];
        $this->ResType->DbValue = $row['ResType'];
        $this->UnitCD->DbValue = $row['UnitCD'];
        $this->RefValue->DbValue = $row['RefValue'];
        $this->Sample->DbValue = $row['Sample'];
        $this->NoD->DbValue = $row['NoD'];
        $this->BillOrder->DbValue = $row['BillOrder'];
        $this->Formula->DbValue = $row['Formula'];
        $this->Inactive->DbValue = $row['Inactive'];
        $this->Outsource->DbValue = $row['Outsource'];
        $this->CollSample->DbValue = $row['CollSample'];
        $this->TestType->DbValue = $row['TestType'];
        $this->NoHeading->DbValue = $row['NoHeading'];
        $this->ChemicalCode->DbValue = $row['ChemicalCode'];
        $this->ChemicalName->DbValue = $row['ChemicalName'];
        $this->Utilaization->DbValue = $row['Utilaization'];
        $this->Interpretation->DbValue = $row['Interpretation'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`Id` = @Id@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->Id->CurrentValue : $this->Id->OldValue;
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
                $this->Id->CurrentValue = $keys[0];
            } else {
                $this->Id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('Id', $row) ? $row['Id'] : null;
        } else {
            $val = $this->Id->OldValue !== null ? $this->Id->OldValue : $this->Id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@Id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
        return $_SESSION[$name] ?? GetUrl("ViewLabProfileList");
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
        if ($pageName == "ViewLabProfileView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewLabProfileEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewLabProfileAdd") {
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
                return "ViewLabProfileView";
            case Config("API_ADD_ACTION"):
                return "ViewLabProfileAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewLabProfileEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewLabProfileDelete";
            case Config("API_LIST_ACTION"):
                return "ViewLabProfileList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewLabProfileList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewLabProfileView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewLabProfileView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewLabProfileAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewLabProfileAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewLabProfileEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewLabProfileEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
            $url = $this->keyUrl("ViewLabProfileAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewLabProfileAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
        return $this->keyUrl("ViewLabProfileDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "Id:" . JsonEncode($this->Id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->Id->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->Id->CurrentValue);
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
            if (($keyValue = Param("Id") ?? Route("Id")) !== null) {
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
                $this->Id->CurrentValue = $key;
            } else {
                $this->Id->OldValue = $key;
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
        $this->Id->setDbValue($row['Id']);
        $this->CODE->setDbValue($row['CODE']);
        $this->SERVICE->setDbValue($row['SERVICE']);
        $this->UNITS->setDbValue($row['UNITS']);
        $this->AMOUNT->setDbValue($row['AMOUNT']);
        $this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->mas_services_billingcol->setDbValue($row['mas_services_billingcol']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrSharePer->setDbValue($row['DrSharePer']);
        $this->HospSharePer->setDbValue($row['HospSharePer']);
        $this->HospID->setDbValue($row['HospID']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->ChemicalCode->setDbValue($row['ChemicalCode']);
        $this->ChemicalName->setDbValue($row['ChemicalName']);
        $this->Utilaization->setDbValue($row['Utilaization']);
        $this->Interpretation->setDbValue($row['Interpretation']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // Id

        // CODE

        // SERVICE

        // UNITS

        // AMOUNT

        // SERVICE_TYPE

        // DEPARTMENT

        // Created

        // CreatedDateTime

        // Modified

        // ModifiedDateTime

        // mas_services_billingcol

        // DrShareAmount

        // HospShareAmount

        // DrSharePer

        // HospSharePer

        // HospID

        // TestSubCd

        // Method

        // Order

        // Form

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // Outsource

        // CollSample

        // TestType

        // NoHeading

        // ChemicalCode

        // ChemicalName

        // Utilaization

        // Interpretation

        // Id
        $this->Id->ViewValue = $this->Id->CurrentValue;
        $this->Id->ViewCustomAttributes = "";

        // CODE
        $this->CODE->ViewValue = $this->CODE->CurrentValue;
        $this->CODE->ViewCustomAttributes = "";

        // SERVICE
        $this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
        $this->SERVICE->ViewCustomAttributes = "";

        // UNITS
        $this->UNITS->ViewValue = $this->UNITS->CurrentValue;
        $this->UNITS->ViewValue = FormatNumber($this->UNITS->ViewValue, 0, -2, -2, -2);
        $this->UNITS->ViewCustomAttributes = "";

        // AMOUNT
        $this->AMOUNT->ViewValue = $this->AMOUNT->CurrentValue;
        $this->AMOUNT->ViewValue = FormatNumber($this->AMOUNT->ViewValue, $this->AMOUNT->DefaultDecimalPrecision);
        $this->AMOUNT->ViewCustomAttributes = "";

        // SERVICE_TYPE
        $curVal = trim(strval($this->SERVICE_TYPE->CurrentValue));
        if ($curVal != "") {
            $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
            if ($this->SERVICE_TYPE->ViewValue === null) { // Lookup from database
                $filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->SERVICE_TYPE->Lookup->renderViewRow($rswrk[0]);
                    $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->displayValue($arwrk);
                } else {
                    $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
                }
            }
        } else {
            $this->SERVICE_TYPE->ViewValue = null;
        }
        $this->SERVICE_TYPE->ViewCustomAttributes = "";

        // DEPARTMENT
        $curVal = trim(strval($this->DEPARTMENT->CurrentValue));
        if ($curVal != "") {
            $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->lookupCacheOption($curVal);
            if ($this->DEPARTMENT->ViewValue === null) { // Lookup from database
                $filterWrk = "`department`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DEPARTMENT->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DEPARTMENT->Lookup->renderViewRow($rswrk[0]);
                    $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->displayValue($arwrk);
                } else {
                    $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
                }
            }
        } else {
            $this->DEPARTMENT->ViewValue = null;
        }
        $this->DEPARTMENT->ViewCustomAttributes = "";

        // Created
        $this->Created->ViewValue = $this->Created->CurrentValue;
        $this->Created->ViewCustomAttributes = "";

        // CreatedDateTime
        $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
        $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
        $this->CreatedDateTime->ViewCustomAttributes = "";

        // Modified
        $this->Modified->ViewValue = $this->Modified->CurrentValue;
        $this->Modified->ViewCustomAttributes = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
        $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
        $this->ModifiedDateTime->ViewCustomAttributes = "";

        // mas_services_billingcol
        $this->mas_services_billingcol->ViewValue = $this->mas_services_billingcol->CurrentValue;
        $this->mas_services_billingcol->ViewCustomAttributes = "";

        // DrShareAmount
        $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
        $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
        $this->DrShareAmount->ViewCustomAttributes = "";

        // HospShareAmount
        $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
        $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
        $this->HospShareAmount->ViewCustomAttributes = "";

        // DrSharePer
        $this->DrSharePer->ViewValue = $this->DrSharePer->CurrentValue;
        $this->DrSharePer->ViewValue = FormatNumber($this->DrSharePer->ViewValue, 0, -2, -2, -2);
        $this->DrSharePer->ViewCustomAttributes = "";

        // HospSharePer
        $this->HospSharePer->ViewValue = $this->HospSharePer->CurrentValue;
        $this->HospSharePer->ViewValue = FormatNumber($this->HospSharePer->ViewValue, 0, -2, -2, -2);
        $this->HospSharePer->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // TestSubCd
        $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->ViewCustomAttributes = "";

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

        // Outsource
        $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
        $this->Outsource->ViewCustomAttributes = "";

        // CollSample
        $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
        $this->CollSample->ViewCustomAttributes = "";

        // TestType
        if (strval($this->TestType->CurrentValue) != "") {
            $this->TestType->ViewValue = $this->TestType->optionCaption($this->TestType->CurrentValue);
        } else {
            $this->TestType->ViewValue = null;
        }
        $this->TestType->ViewCustomAttributes = "";

        // NoHeading
        $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
        $this->NoHeading->ViewCustomAttributes = "";

        // ChemicalCode
        $this->ChemicalCode->ViewValue = $this->ChemicalCode->CurrentValue;
        $this->ChemicalCode->ViewCustomAttributes = "";

        // ChemicalName
        $this->ChemicalName->ViewValue = $this->ChemicalName->CurrentValue;
        $this->ChemicalName->ViewCustomAttributes = "";

        // Utilaization
        $this->Utilaization->ViewValue = $this->Utilaization->CurrentValue;
        $this->Utilaization->ViewCustomAttributes = "";

        // Interpretation
        $this->Interpretation->ViewValue = $this->Interpretation->CurrentValue;
        $this->Interpretation->ViewCustomAttributes = "";

        // Id
        $this->Id->LinkCustomAttributes = "";
        $this->Id->HrefValue = "";
        $this->Id->TooltipValue = "";

        // CODE
        $this->CODE->LinkCustomAttributes = "";
        $this->CODE->HrefValue = "";
        $this->CODE->TooltipValue = "";

        // SERVICE
        $this->SERVICE->LinkCustomAttributes = "";
        $this->SERVICE->HrefValue = "";
        $this->SERVICE->TooltipValue = "";

        // UNITS
        $this->UNITS->LinkCustomAttributes = "";
        $this->UNITS->HrefValue = "";
        $this->UNITS->TooltipValue = "";

        // AMOUNT
        $this->AMOUNT->LinkCustomAttributes = "";
        $this->AMOUNT->HrefValue = "";
        $this->AMOUNT->TooltipValue = "";

        // SERVICE_TYPE
        $this->SERVICE_TYPE->LinkCustomAttributes = "";
        $this->SERVICE_TYPE->HrefValue = "";
        $this->SERVICE_TYPE->TooltipValue = "";

        // DEPARTMENT
        $this->DEPARTMENT->LinkCustomAttributes = "";
        $this->DEPARTMENT->HrefValue = "";
        $this->DEPARTMENT->TooltipValue = "";

        // Created
        $this->Created->LinkCustomAttributes = "";
        $this->Created->HrefValue = "";
        $this->Created->TooltipValue = "";

        // CreatedDateTime
        $this->CreatedDateTime->LinkCustomAttributes = "";
        $this->CreatedDateTime->HrefValue = "";
        $this->CreatedDateTime->TooltipValue = "";

        // Modified
        $this->Modified->LinkCustomAttributes = "";
        $this->Modified->HrefValue = "";
        $this->Modified->TooltipValue = "";

        // ModifiedDateTime
        $this->ModifiedDateTime->LinkCustomAttributes = "";
        $this->ModifiedDateTime->HrefValue = "";
        $this->ModifiedDateTime->TooltipValue = "";

        // mas_services_billingcol
        $this->mas_services_billingcol->LinkCustomAttributes = "";
        $this->mas_services_billingcol->HrefValue = "";
        $this->mas_services_billingcol->TooltipValue = "";

        // DrShareAmount
        $this->DrShareAmount->LinkCustomAttributes = "";
        $this->DrShareAmount->HrefValue = "";
        $this->DrShareAmount->TooltipValue = "";

        // HospShareAmount
        $this->HospShareAmount->LinkCustomAttributes = "";
        $this->HospShareAmount->HrefValue = "";
        $this->HospShareAmount->TooltipValue = "";

        // DrSharePer
        $this->DrSharePer->LinkCustomAttributes = "";
        $this->DrSharePer->HrefValue = "";
        $this->DrSharePer->TooltipValue = "";

        // HospSharePer
        $this->HospSharePer->LinkCustomAttributes = "";
        $this->HospSharePer->HrefValue = "";
        $this->HospSharePer->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // TestSubCd
        $this->TestSubCd->LinkCustomAttributes = "";
        $this->TestSubCd->HrefValue = "";
        $this->TestSubCd->TooltipValue = "";

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

        // Outsource
        $this->Outsource->LinkCustomAttributes = "";
        $this->Outsource->HrefValue = "";
        $this->Outsource->TooltipValue = "";

        // CollSample
        $this->CollSample->LinkCustomAttributes = "";
        $this->CollSample->HrefValue = "";
        $this->CollSample->TooltipValue = "";

        // TestType
        $this->TestType->LinkCustomAttributes = "";
        $this->TestType->HrefValue = "";
        $this->TestType->TooltipValue = "";

        // NoHeading
        $this->NoHeading->LinkCustomAttributes = "";
        $this->NoHeading->HrefValue = "";
        $this->NoHeading->TooltipValue = "";

        // ChemicalCode
        $this->ChemicalCode->LinkCustomAttributes = "";
        $this->ChemicalCode->HrefValue = "";
        $this->ChemicalCode->TooltipValue = "";

        // ChemicalName
        $this->ChemicalName->LinkCustomAttributes = "";
        $this->ChemicalName->HrefValue = "";
        $this->ChemicalName->TooltipValue = "";

        // Utilaization
        $this->Utilaization->LinkCustomAttributes = "";
        $this->Utilaization->HrefValue = "";
        $this->Utilaization->TooltipValue = "";

        // Interpretation
        $this->Interpretation->LinkCustomAttributes = "";
        $this->Interpretation->HrefValue = "";
        $this->Interpretation->TooltipValue = "";

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

        // Id
        $this->Id->EditAttrs["class"] = "form-control";
        $this->Id->EditCustomAttributes = "";
        $this->Id->EditValue = $this->Id->CurrentValue;
        $this->Id->ViewCustomAttributes = "";

        // CODE
        $this->CODE->EditAttrs["class"] = "form-control";
        $this->CODE->EditCustomAttributes = "";
        if (!$this->CODE->Raw) {
            $this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
        }
        $this->CODE->EditValue = $this->CODE->CurrentValue;
        $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

        // SERVICE
        $this->SERVICE->EditAttrs["class"] = "form-control";
        $this->SERVICE->EditCustomAttributes = "";
        if (!$this->SERVICE->Raw) {
            $this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
        }
        $this->SERVICE->EditValue = $this->SERVICE->CurrentValue;
        $this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

        // UNITS
        $this->UNITS->EditAttrs["class"] = "form-control";
        $this->UNITS->EditCustomAttributes = "";
        $this->UNITS->EditValue = $this->UNITS->CurrentValue;
        $this->UNITS->PlaceHolder = RemoveHtml($this->UNITS->caption());

        // AMOUNT
        $this->AMOUNT->EditAttrs["class"] = "form-control";
        $this->AMOUNT->EditCustomAttributes = "";
        $this->AMOUNT->EditValue = $this->AMOUNT->CurrentValue;
        $this->AMOUNT->PlaceHolder = RemoveHtml($this->AMOUNT->caption());
        if (strval($this->AMOUNT->EditValue) != "" && is_numeric($this->AMOUNT->EditValue)) {
            $this->AMOUNT->EditValue = FormatNumber($this->AMOUNT->EditValue, -2, -1, -2, 0);
        }

        // SERVICE_TYPE
        $this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
        $this->SERVICE_TYPE->EditCustomAttributes = "";
        $this->SERVICE_TYPE->PlaceHolder = RemoveHtml($this->SERVICE_TYPE->caption());

        // DEPARTMENT
        $this->DEPARTMENT->EditAttrs["class"] = "form-control";
        $this->DEPARTMENT->EditCustomAttributes = "";
        $this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

        // Created

        // CreatedDateTime

        // Modified

        // ModifiedDateTime

        // mas_services_billingcol
        $this->mas_services_billingcol->EditAttrs["class"] = "form-control";
        $this->mas_services_billingcol->EditCustomAttributes = "";
        if (!$this->mas_services_billingcol->Raw) {
            $this->mas_services_billingcol->CurrentValue = HtmlDecode($this->mas_services_billingcol->CurrentValue);
        }
        $this->mas_services_billingcol->EditValue = $this->mas_services_billingcol->CurrentValue;
        $this->mas_services_billingcol->PlaceHolder = RemoveHtml($this->mas_services_billingcol->caption());

        // DrShareAmount
        $this->DrShareAmount->EditAttrs["class"] = "form-control";
        $this->DrShareAmount->EditCustomAttributes = "";
        $this->DrShareAmount->EditValue = $this->DrShareAmount->CurrentValue;
        $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
        if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
            $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
        }

        // HospShareAmount
        $this->HospShareAmount->EditAttrs["class"] = "form-control";
        $this->HospShareAmount->EditCustomAttributes = "";
        $this->HospShareAmount->EditValue = $this->HospShareAmount->CurrentValue;
        $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
        if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
            $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
        }

        // DrSharePer
        $this->DrSharePer->EditAttrs["class"] = "form-control";
        $this->DrSharePer->EditCustomAttributes = "";
        $this->DrSharePer->EditValue = $this->DrSharePer->CurrentValue;
        $this->DrSharePer->PlaceHolder = RemoveHtml($this->DrSharePer->caption());

        // HospSharePer
        $this->HospSharePer->EditAttrs["class"] = "form-control";
        $this->HospSharePer->EditCustomAttributes = "";
        $this->HospSharePer->EditValue = $this->HospSharePer->CurrentValue;
        $this->HospSharePer->PlaceHolder = RemoveHtml($this->HospSharePer->caption());

        // HospID

        // TestSubCd
        $this->TestSubCd->EditAttrs["class"] = "form-control";
        $this->TestSubCd->EditCustomAttributes = "";
        if (!$this->TestSubCd->Raw) {
            $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
        }
        $this->TestSubCd->EditValue = $this->TestSubCd->CurrentValue;
        $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

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
        $this->Form->EditValue = $this->Form->CurrentValue;
        $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

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

        // Outsource
        $this->Outsource->EditAttrs["class"] = "form-control";
        $this->Outsource->EditCustomAttributes = "";
        if (!$this->Outsource->Raw) {
            $this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
        }
        $this->Outsource->EditValue = $this->Outsource->CurrentValue;
        $this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

        // CollSample
        $this->CollSample->EditAttrs["class"] = "form-control";
        $this->CollSample->EditCustomAttributes = "";
        if (!$this->CollSample->Raw) {
            $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
        }
        $this->CollSample->EditValue = $this->CollSample->CurrentValue;
        $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

        // TestType
        $this->TestType->EditAttrs["class"] = "form-control";
        $this->TestType->EditCustomAttributes = "";
        $this->TestType->EditValue = $this->TestType->options(true);
        $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

        // NoHeading
        $this->NoHeading->EditAttrs["class"] = "form-control";
        $this->NoHeading->EditCustomAttributes = "";
        if (!$this->NoHeading->Raw) {
            $this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
        }
        $this->NoHeading->EditValue = $this->NoHeading->CurrentValue;
        $this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

        // ChemicalCode
        $this->ChemicalCode->EditAttrs["class"] = "form-control";
        $this->ChemicalCode->EditCustomAttributes = "";
        if (!$this->ChemicalCode->Raw) {
            $this->ChemicalCode->CurrentValue = HtmlDecode($this->ChemicalCode->CurrentValue);
        }
        $this->ChemicalCode->EditValue = $this->ChemicalCode->CurrentValue;
        $this->ChemicalCode->PlaceHolder = RemoveHtml($this->ChemicalCode->caption());

        // ChemicalName
        $this->ChemicalName->EditAttrs["class"] = "form-control";
        $this->ChemicalName->EditCustomAttributes = "";
        if (!$this->ChemicalName->Raw) {
            $this->ChemicalName->CurrentValue = HtmlDecode($this->ChemicalName->CurrentValue);
        }
        $this->ChemicalName->EditValue = $this->ChemicalName->CurrentValue;
        $this->ChemicalName->PlaceHolder = RemoveHtml($this->ChemicalName->caption());

        // Utilaization
        $this->Utilaization->EditAttrs["class"] = "form-control";
        $this->Utilaization->EditCustomAttributes = "";
        if (!$this->Utilaization->Raw) {
            $this->Utilaization->CurrentValue = HtmlDecode($this->Utilaization->CurrentValue);
        }
        $this->Utilaization->EditValue = $this->Utilaization->CurrentValue;
        $this->Utilaization->PlaceHolder = RemoveHtml($this->Utilaization->caption());

        // Interpretation
        $this->Interpretation->EditAttrs["class"] = "form-control";
        $this->Interpretation->EditCustomAttributes = "";
        $this->Interpretation->EditValue = $this->Interpretation->CurrentValue;
        $this->Interpretation->PlaceHolder = RemoveHtml($this->Interpretation->caption());

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
                    $doc->exportCaption($this->Id);
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->SERVICE);
                    $doc->exportCaption($this->UNITS);
                    $doc->exportCaption($this->AMOUNT);
                    $doc->exportCaption($this->SERVICE_TYPE);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->Created);
                    $doc->exportCaption($this->CreatedDateTime);
                    $doc->exportCaption($this->Modified);
                    $doc->exportCaption($this->ModifiedDateTime);
                    $doc->exportCaption($this->mas_services_billingcol);
                    $doc->exportCaption($this->DrShareAmount);
                    $doc->exportCaption($this->HospShareAmount);
                    $doc->exportCaption($this->DrSharePer);
                    $doc->exportCaption($this->HospSharePer);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->Form);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->UnitCD);
                    $doc->exportCaption($this->RefValue);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Formula);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->Outsource);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->NoHeading);
                    $doc->exportCaption($this->ChemicalCode);
                    $doc->exportCaption($this->ChemicalName);
                    $doc->exportCaption($this->Utilaization);
                    $doc->exportCaption($this->Interpretation);
                } else {
                    $doc->exportCaption($this->Id);
                    $doc->exportCaption($this->CODE);
                    $doc->exportCaption($this->SERVICE);
                    $doc->exportCaption($this->UNITS);
                    $doc->exportCaption($this->AMOUNT);
                    $doc->exportCaption($this->SERVICE_TYPE);
                    $doc->exportCaption($this->DEPARTMENT);
                    $doc->exportCaption($this->mas_services_billingcol);
                    $doc->exportCaption($this->DrShareAmount);
                    $doc->exportCaption($this->HospShareAmount);
                    $doc->exportCaption($this->DrSharePer);
                    $doc->exportCaption($this->HospSharePer);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->TestSubCd);
                    $doc->exportCaption($this->Method);
                    $doc->exportCaption($this->Order);
                    $doc->exportCaption($this->ResType);
                    $doc->exportCaption($this->UnitCD);
                    $doc->exportCaption($this->Sample);
                    $doc->exportCaption($this->NoD);
                    $doc->exportCaption($this->BillOrder);
                    $doc->exportCaption($this->Inactive);
                    $doc->exportCaption($this->Outsource);
                    $doc->exportCaption($this->CollSample);
                    $doc->exportCaption($this->TestType);
                    $doc->exportCaption($this->NoHeading);
                    $doc->exportCaption($this->ChemicalCode);
                    $doc->exportCaption($this->ChemicalName);
                    $doc->exportCaption($this->Utilaization);
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
                        $doc->exportField($this->Id);
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->SERVICE);
                        $doc->exportField($this->UNITS);
                        $doc->exportField($this->AMOUNT);
                        $doc->exportField($this->SERVICE_TYPE);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->Created);
                        $doc->exportField($this->CreatedDateTime);
                        $doc->exportField($this->Modified);
                        $doc->exportField($this->ModifiedDateTime);
                        $doc->exportField($this->mas_services_billingcol);
                        $doc->exportField($this->DrShareAmount);
                        $doc->exportField($this->HospShareAmount);
                        $doc->exportField($this->DrSharePer);
                        $doc->exportField($this->HospSharePer);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->Form);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->UnitCD);
                        $doc->exportField($this->RefValue);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Formula);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->Outsource);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->NoHeading);
                        $doc->exportField($this->ChemicalCode);
                        $doc->exportField($this->ChemicalName);
                        $doc->exportField($this->Utilaization);
                        $doc->exportField($this->Interpretation);
                    } else {
                        $doc->exportField($this->Id);
                        $doc->exportField($this->CODE);
                        $doc->exportField($this->SERVICE);
                        $doc->exportField($this->UNITS);
                        $doc->exportField($this->AMOUNT);
                        $doc->exportField($this->SERVICE_TYPE);
                        $doc->exportField($this->DEPARTMENT);
                        $doc->exportField($this->mas_services_billingcol);
                        $doc->exportField($this->DrShareAmount);
                        $doc->exportField($this->HospShareAmount);
                        $doc->exportField($this->DrSharePer);
                        $doc->exportField($this->HospSharePer);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->TestSubCd);
                        $doc->exportField($this->Method);
                        $doc->exportField($this->Order);
                        $doc->exportField($this->ResType);
                        $doc->exportField($this->UnitCD);
                        $doc->exportField($this->Sample);
                        $doc->exportField($this->NoD);
                        $doc->exportField($this->BillOrder);
                        $doc->exportField($this->Inactive);
                        $doc->exportField($this->Outsource);
                        $doc->exportField($this->CollSample);
                        $doc->exportField($this->TestType);
                        $doc->exportField($this->NoHeading);
                        $doc->exportField($this->ChemicalCode);
                        $doc->exportField($this->ChemicalName);
                        $doc->exportField($this->Utilaization);
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
