<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_suppliers
 */
class PharmacySuppliers extends DbTable
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
    public $Suppliercode;
    public $Suppliername;
    public $Abbreviation;
    public $Creationdate;
    public $Address1;
    public $Address2;
    public $Address3;
    public $Citycode;
    public $State;
    public $Pincode;
    public $Tngstnumber;
    public $Phone;
    public $Fax;
    public $_Email;
    public $Paymentmode;
    public $Contactperson1;
    public $CP1Address1;
    public $CP1Address2;
    public $CP1Address3;
    public $CP1Citycode;
    public $CP1State;
    public $CP1Pincode;
    public $CP1Designation;
    public $CP1Phone;
    public $CP1MobileNo;
    public $CP1Fax;
    public $CP1Email;
    public $Contactperson2;
    public $CP2Address1;
    public $CP2Address2;
    public $CP2Address3;
    public $CP2Citycode;
    public $CP2State;
    public $CP2Pincode;
    public $CP2Designation;
    public $CP2Phone;
    public $CP2MobileNo;
    public $CP2Fax;
    public $CP2Email;
    public $Type;
    public $Creditterms;
    public $Remarks;
    public $Tinnumber;
    public $Universalsuppliercode;
    public $Mobilenumber;
    public $PANNumber;
    public $SalesRepMobileNo;
    public $GSTNumber;
    public $TANNumber;
    public $id;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_suppliers';
        $this->TableName = 'pharmacy_suppliers';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_suppliers`";
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

        // Suppliercode
        $this->Suppliercode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Suppliercode', 'Suppliercode', '`Suppliercode`', '`Suppliercode`', 200, 15, -1, false, '`Suppliercode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Suppliercode->Nullable = false; // NOT NULL field
        $this->Suppliercode->Required = true; // Required field
        $this->Suppliercode->Sortable = true; // Allow sort
        $this->Suppliercode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Suppliercode->Param, "CustomMsg");
        $this->Fields['Suppliercode'] = &$this->Suppliercode;

        // Suppliername
        $this->Suppliername = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Suppliername', 'Suppliername', '`Suppliername`', '`Suppliername`', 200, 200, -1, false, '`Suppliername`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Suppliername->Nullable = false; // NOT NULL field
        $this->Suppliername->Required = true; // Required field
        $this->Suppliername->Sortable = true; // Allow sort
        $this->Suppliername->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Suppliername->Param, "CustomMsg");
        $this->Fields['Suppliername'] = &$this->Suppliername;

        // Abbreviation
        $this->Abbreviation = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Abbreviation', 'Abbreviation', '`Abbreviation`', '`Abbreviation`', 200, 5, -1, false, '`Abbreviation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Abbreviation->Sortable = true; // Allow sort
        $this->Abbreviation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Abbreviation->Param, "CustomMsg");
        $this->Fields['Abbreviation'] = &$this->Abbreviation;

        // Creationdate
        $this->Creationdate = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Creationdate', 'Creationdate', '`Creationdate`', CastDateFieldForLike("`Creationdate`", 0, "DB"), 135, 23, 0, false, '`Creationdate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Creationdate->Sortable = true; // Allow sort
        $this->Creationdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Creationdate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Creationdate->Param, "CustomMsg");
        $this->Fields['Creationdate'] = &$this->Creationdate;

        // Address1
        $this->Address1 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 200, 250, -1, false, '`Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address1->Sortable = true; // Allow sort
        $this->Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address1->Param, "CustomMsg");
        $this->Fields['Address1'] = &$this->Address1;

        // Address2
        $this->Address2 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 200, 250, -1, false, '`Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address2->Sortable = true; // Allow sort
        $this->Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address2->Param, "CustomMsg");
        $this->Fields['Address2'] = &$this->Address2;

        // Address3
        $this->Address3 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 200, 250, -1, false, '`Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Address3->Sortable = true; // Allow sort
        $this->Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Address3->Param, "CustomMsg");
        $this->Fields['Address3'] = &$this->Address3;

        // Citycode
        $this->Citycode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Citycode', 'Citycode', '`Citycode`', '`Citycode`', 3, 11, -1, false, '`Citycode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Citycode->Sortable = true; // Allow sort
        $this->Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Citycode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Citycode->Param, "CustomMsg");
        $this->Fields['Citycode'] = &$this->Citycode;

        // State
        $this->State = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_State', 'State', '`State`', '`State`', 200, 50, -1, false, '`State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->State->Sortable = true; // Allow sort
        $this->State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->State->Param, "CustomMsg");
        $this->Fields['State'] = &$this->State;

        // Pincode
        $this->Pincode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 15, -1, false, '`Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pincode->Sortable = true; // Allow sort
        $this->Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pincode->Param, "CustomMsg");
        $this->Fields['Pincode'] = &$this->Pincode;

        // Tngstnumber
        $this->Tngstnumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Tngstnumber', 'Tngstnumber', '`Tngstnumber`', '`Tngstnumber`', 200, 50, -1, false, '`Tngstnumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tngstnumber->Sortable = true; // Allow sort
        $this->Tngstnumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tngstnumber->Param, "CustomMsg");
        $this->Fields['Tngstnumber'] = &$this->Tngstnumber;

        // Phone
        $this->Phone = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 40, -1, false, '`Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Phone->Sortable = true; // Allow sort
        $this->Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Phone->Param, "CustomMsg");
        $this->Fields['Phone'] = &$this->Phone;

        // Fax
        $this->Fax = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, 40, -1, false, '`Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Fax->Sortable = true; // Allow sort
        $this->Fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Fax->Param, "CustomMsg");
        $this->Fields['Fax'] = &$this->Fax;

        // Email
        $this->_Email = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x__Email', 'Email', '`Email`', '`Email`', 200, 40, -1, false, '`Email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Email->Sortable = true; // Allow sort
        $this->_Email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_Email->Param, "CustomMsg");
        $this->Fields['Email'] = &$this->_Email;

        // Paymentmode
        $this->Paymentmode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Paymentmode', 'Paymentmode', '`Paymentmode`', '`Paymentmode`', 200, 50, -1, false, '`Paymentmode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Paymentmode->Sortable = true; // Allow sort
        $this->Paymentmode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Paymentmode->Param, "CustomMsg");
        $this->Fields['Paymentmode'] = &$this->Paymentmode;

        // Contactperson1
        $this->Contactperson1 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Contactperson1', 'Contactperson1', '`Contactperson1`', '`Contactperson1`', 200, 100, -1, false, '`Contactperson1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Contactperson1->Sortable = true; // Allow sort
        $this->Contactperson1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Contactperson1->Param, "CustomMsg");
        $this->Fields['Contactperson1'] = &$this->Contactperson1;

        // CP1Address1
        $this->CP1Address1 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Address1', 'CP1Address1', '`CP1Address1`', '`CP1Address1`', 200, 255, -1, false, '`CP1Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Address1->Sortable = true; // Allow sort
        $this->CP1Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Address1->Param, "CustomMsg");
        $this->Fields['CP1Address1'] = &$this->CP1Address1;

        // CP1Address2
        $this->CP1Address2 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Address2', 'CP1Address2', '`CP1Address2`', '`CP1Address2`', 200, 250, -1, false, '`CP1Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Address2->Sortable = true; // Allow sort
        $this->CP1Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Address2->Param, "CustomMsg");
        $this->Fields['CP1Address2'] = &$this->CP1Address2;

        // CP1Address3
        $this->CP1Address3 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Address3', 'CP1Address3', '`CP1Address3`', '`CP1Address3`', 200, 250, -1, false, '`CP1Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Address3->Sortable = true; // Allow sort
        $this->CP1Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Address3->Param, "CustomMsg");
        $this->Fields['CP1Address3'] = &$this->CP1Address3;

        // CP1Citycode
        $this->CP1Citycode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Citycode', 'CP1Citycode', '`CP1Citycode`', '`CP1Citycode`', 3, 11, -1, false, '`CP1Citycode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Citycode->Sortable = true; // Allow sort
        $this->CP1Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->CP1Citycode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Citycode->Param, "CustomMsg");
        $this->Fields['CP1Citycode'] = &$this->CP1Citycode;

        // CP1State
        $this->CP1State = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1State', 'CP1State', '`CP1State`', '`CP1State`', 200, 50, -1, false, '`CP1State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1State->Sortable = true; // Allow sort
        $this->CP1State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1State->Param, "CustomMsg");
        $this->Fields['CP1State'] = &$this->CP1State;

        // CP1Pincode
        $this->CP1Pincode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Pincode', 'CP1Pincode', '`CP1Pincode`', '`CP1Pincode`', 200, 15, -1, false, '`CP1Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Pincode->Sortable = true; // Allow sort
        $this->CP1Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Pincode->Param, "CustomMsg");
        $this->Fields['CP1Pincode'] = &$this->CP1Pincode;

        // CP1Designation
        $this->CP1Designation = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Designation', 'CP1Designation', '`CP1Designation`', '`CP1Designation`', 200, 50, -1, false, '`CP1Designation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Designation->Sortable = true; // Allow sort
        $this->CP1Designation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Designation->Param, "CustomMsg");
        $this->Fields['CP1Designation'] = &$this->CP1Designation;

        // CP1Phone
        $this->CP1Phone = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Phone', 'CP1Phone', '`CP1Phone`', '`CP1Phone`', 200, 50, -1, false, '`CP1Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Phone->Sortable = true; // Allow sort
        $this->CP1Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Phone->Param, "CustomMsg");
        $this->Fields['CP1Phone'] = &$this->CP1Phone;

        // CP1MobileNo
        $this->CP1MobileNo = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1MobileNo', 'CP1MobileNo', '`CP1MobileNo`', '`CP1MobileNo`', 200, 50, -1, false, '`CP1MobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1MobileNo->Sortable = true; // Allow sort
        $this->CP1MobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1MobileNo->Param, "CustomMsg");
        $this->Fields['CP1MobileNo'] = &$this->CP1MobileNo;

        // CP1Fax
        $this->CP1Fax = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Fax', 'CP1Fax', '`CP1Fax`', '`CP1Fax`', 200, 50, -1, false, '`CP1Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Fax->Sortable = true; // Allow sort
        $this->CP1Fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Fax->Param, "CustomMsg");
        $this->Fields['CP1Fax'] = &$this->CP1Fax;

        // CP1Email
        $this->CP1Email = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP1Email', 'CP1Email', '`CP1Email`', '`CP1Email`', 200, 50, -1, false, '`CP1Email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP1Email->Sortable = true; // Allow sort
        $this->CP1Email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP1Email->Param, "CustomMsg");
        $this->Fields['CP1Email'] = &$this->CP1Email;

        // Contactperson2
        $this->Contactperson2 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Contactperson2', 'Contactperson2', '`Contactperson2`', '`Contactperson2`', 200, 100, -1, false, '`Contactperson2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Contactperson2->Sortable = true; // Allow sort
        $this->Contactperson2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Contactperson2->Param, "CustomMsg");
        $this->Fields['Contactperson2'] = &$this->Contactperson2;

        // CP2Address1
        $this->CP2Address1 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Address1', 'CP2Address1', '`CP2Address1`', '`CP2Address1`', 200, 255, -1, false, '`CP2Address1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Address1->Sortable = true; // Allow sort
        $this->CP2Address1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Address1->Param, "CustomMsg");
        $this->Fields['CP2Address1'] = &$this->CP2Address1;

        // CP2Address2
        $this->CP2Address2 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Address2', 'CP2Address2', '`CP2Address2`', '`CP2Address2`', 200, 250, -1, false, '`CP2Address2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Address2->Sortable = true; // Allow sort
        $this->CP2Address2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Address2->Param, "CustomMsg");
        $this->Fields['CP2Address2'] = &$this->CP2Address2;

        // CP2Address3
        $this->CP2Address3 = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Address3', 'CP2Address3', '`CP2Address3`', '`CP2Address3`', 200, 250, -1, false, '`CP2Address3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Address3->Sortable = true; // Allow sort
        $this->CP2Address3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Address3->Param, "CustomMsg");
        $this->Fields['CP2Address3'] = &$this->CP2Address3;

        // CP2Citycode
        $this->CP2Citycode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Citycode', 'CP2Citycode', '`CP2Citycode`', '`CP2Citycode`', 3, 11, -1, false, '`CP2Citycode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Citycode->Sortable = true; // Allow sort
        $this->CP2Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->CP2Citycode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Citycode->Param, "CustomMsg");
        $this->Fields['CP2Citycode'] = &$this->CP2Citycode;

        // CP2State
        $this->CP2State = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2State', 'CP2State', '`CP2State`', '`CP2State`', 200, 50, -1, false, '`CP2State`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2State->Sortable = true; // Allow sort
        $this->CP2State->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2State->Param, "CustomMsg");
        $this->Fields['CP2State'] = &$this->CP2State;

        // CP2Pincode
        $this->CP2Pincode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Pincode', 'CP2Pincode', '`CP2Pincode`', '`CP2Pincode`', 200, 15, -1, false, '`CP2Pincode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Pincode->Sortable = true; // Allow sort
        $this->CP2Pincode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Pincode->Param, "CustomMsg");
        $this->Fields['CP2Pincode'] = &$this->CP2Pincode;

        // CP2Designation
        $this->CP2Designation = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Designation', 'CP2Designation', '`CP2Designation`', '`CP2Designation`', 200, 50, -1, false, '`CP2Designation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Designation->Sortable = true; // Allow sort
        $this->CP2Designation->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Designation->Param, "CustomMsg");
        $this->Fields['CP2Designation'] = &$this->CP2Designation;

        // CP2Phone
        $this->CP2Phone = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Phone', 'CP2Phone', '`CP2Phone`', '`CP2Phone`', 200, 50, -1, false, '`CP2Phone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Phone->Sortable = true; // Allow sort
        $this->CP2Phone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Phone->Param, "CustomMsg");
        $this->Fields['CP2Phone'] = &$this->CP2Phone;

        // CP2MobileNo
        $this->CP2MobileNo = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2MobileNo', 'CP2MobileNo', '`CP2MobileNo`', '`CP2MobileNo`', 200, 50, -1, false, '`CP2MobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2MobileNo->Sortable = true; // Allow sort
        $this->CP2MobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2MobileNo->Param, "CustomMsg");
        $this->Fields['CP2MobileNo'] = &$this->CP2MobileNo;

        // CP2Fax
        $this->CP2Fax = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Fax', 'CP2Fax', '`CP2Fax`', '`CP2Fax`', 200, 50, -1, false, '`CP2Fax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Fax->Sortable = true; // Allow sort
        $this->CP2Fax->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Fax->Param, "CustomMsg");
        $this->Fields['CP2Fax'] = &$this->CP2Fax;

        // CP2Email
        $this->CP2Email = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_CP2Email', 'CP2Email', '`CP2Email`', '`CP2Email`', 200, 50, -1, false, '`CP2Email`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CP2Email->Sortable = true; // Allow sort
        $this->CP2Email->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->CP2Email->Param, "CustomMsg");
        $this->Fields['CP2Email'] = &$this->CP2Email;

        // Type
        $this->Type = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Type', 'Type', '`Type`', '`Type`', 200, 50, -1, false, '`Type`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Type->Sortable = true; // Allow sort
        $this->Type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Type->Param, "CustomMsg");
        $this->Fields['Type'] = &$this->Type;

        // Creditterms
        $this->Creditterms = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Creditterms', 'Creditterms', '`Creditterms`', '`Creditterms`', 200, 120, -1, false, '`Creditterms`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Creditterms->Sortable = true; // Allow sort
        $this->Creditterms->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Creditterms->Param, "CustomMsg");
        $this->Fields['Creditterms'] = &$this->Creditterms;

        // Remarks
        $this->Remarks = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 120, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Remarks->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Remarks->Param, "CustomMsg");
        $this->Fields['Remarks'] = &$this->Remarks;

        // Tinnumber
        $this->Tinnumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Tinnumber', 'Tinnumber', '`Tinnumber`', '`Tinnumber`', 200, 50, -1, false, '`Tinnumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Tinnumber->Sortable = true; // Allow sort
        $this->Tinnumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Tinnumber->Param, "CustomMsg");
        $this->Fields['Tinnumber'] = &$this->Tinnumber;

        // Universalsuppliercode
        $this->Universalsuppliercode = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Universalsuppliercode', 'Universalsuppliercode', '`Universalsuppliercode`', '`Universalsuppliercode`', 200, 50, -1, false, '`Universalsuppliercode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Universalsuppliercode->Sortable = true; // Allow sort
        $this->Universalsuppliercode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Universalsuppliercode->Param, "CustomMsg");
        $this->Fields['Universalsuppliercode'] = &$this->Universalsuppliercode;

        // Mobilenumber
        $this->Mobilenumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_Mobilenumber', 'Mobilenumber', '`Mobilenumber`', '`Mobilenumber`', 200, 50, -1, false, '`Mobilenumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Mobilenumber->Sortable = true; // Allow sort
        $this->Mobilenumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Mobilenumber->Param, "CustomMsg");
        $this->Fields['Mobilenumber'] = &$this->Mobilenumber;

        // PANNumber
        $this->PANNumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_PANNumber', 'PANNumber', '`PANNumber`', '`PANNumber`', 200, 50, -1, false, '`PANNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PANNumber->Sortable = true; // Allow sort
        $this->PANNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PANNumber->Param, "CustomMsg");
        $this->Fields['PANNumber'] = &$this->PANNumber;

        // SalesRepMobileNo
        $this->SalesRepMobileNo = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_SalesRepMobileNo', 'SalesRepMobileNo', '`SalesRepMobileNo`', '`SalesRepMobileNo`', 200, 50, -1, false, '`SalesRepMobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalesRepMobileNo->Sortable = true; // Allow sort
        $this->SalesRepMobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SalesRepMobileNo->Param, "CustomMsg");
        $this->Fields['SalesRepMobileNo'] = &$this->SalesRepMobileNo;

        // GSTNumber
        $this->GSTNumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_GSTNumber', 'GSTNumber', '`GSTNumber`', '`GSTNumber`', 200, 15, -1, false, '`GSTNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GSTNumber->Sortable = true; // Allow sort
        $this->GSTNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GSTNumber->Param, "CustomMsg");
        $this->Fields['GSTNumber'] = &$this->GSTNumber;

        // TANNumber
        $this->TANNumber = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_TANNumber', 'TANNumber', '`TANNumber`', '`TANNumber`', 200, 10, -1, false, '`TANNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TANNumber->Sortable = true; // Allow sort
        $this->TANNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TANNumber->Param, "CustomMsg");
        $this->Fields['TANNumber'] = &$this->TANNumber;

        // id
        $this->id = new DbField('pharmacy_suppliers', 'pharmacy_suppliers', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_suppliers`";
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
        $this->Suppliercode->DbValue = $row['Suppliercode'];
        $this->Suppliername->DbValue = $row['Suppliername'];
        $this->Abbreviation->DbValue = $row['Abbreviation'];
        $this->Creationdate->DbValue = $row['Creationdate'];
        $this->Address1->DbValue = $row['Address1'];
        $this->Address2->DbValue = $row['Address2'];
        $this->Address3->DbValue = $row['Address3'];
        $this->Citycode->DbValue = $row['Citycode'];
        $this->State->DbValue = $row['State'];
        $this->Pincode->DbValue = $row['Pincode'];
        $this->Tngstnumber->DbValue = $row['Tngstnumber'];
        $this->Phone->DbValue = $row['Phone'];
        $this->Fax->DbValue = $row['Fax'];
        $this->_Email->DbValue = $row['Email'];
        $this->Paymentmode->DbValue = $row['Paymentmode'];
        $this->Contactperson1->DbValue = $row['Contactperson1'];
        $this->CP1Address1->DbValue = $row['CP1Address1'];
        $this->CP1Address2->DbValue = $row['CP1Address2'];
        $this->CP1Address3->DbValue = $row['CP1Address3'];
        $this->CP1Citycode->DbValue = $row['CP1Citycode'];
        $this->CP1State->DbValue = $row['CP1State'];
        $this->CP1Pincode->DbValue = $row['CP1Pincode'];
        $this->CP1Designation->DbValue = $row['CP1Designation'];
        $this->CP1Phone->DbValue = $row['CP1Phone'];
        $this->CP1MobileNo->DbValue = $row['CP1MobileNo'];
        $this->CP1Fax->DbValue = $row['CP1Fax'];
        $this->CP1Email->DbValue = $row['CP1Email'];
        $this->Contactperson2->DbValue = $row['Contactperson2'];
        $this->CP2Address1->DbValue = $row['CP2Address1'];
        $this->CP2Address2->DbValue = $row['CP2Address2'];
        $this->CP2Address3->DbValue = $row['CP2Address3'];
        $this->CP2Citycode->DbValue = $row['CP2Citycode'];
        $this->CP2State->DbValue = $row['CP2State'];
        $this->CP2Pincode->DbValue = $row['CP2Pincode'];
        $this->CP2Designation->DbValue = $row['CP2Designation'];
        $this->CP2Phone->DbValue = $row['CP2Phone'];
        $this->CP2MobileNo->DbValue = $row['CP2MobileNo'];
        $this->CP2Fax->DbValue = $row['CP2Fax'];
        $this->CP2Email->DbValue = $row['CP2Email'];
        $this->Type->DbValue = $row['Type'];
        $this->Creditterms->DbValue = $row['Creditterms'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->Tinnumber->DbValue = $row['Tinnumber'];
        $this->Universalsuppliercode->DbValue = $row['Universalsuppliercode'];
        $this->Mobilenumber->DbValue = $row['Mobilenumber'];
        $this->PANNumber->DbValue = $row['PANNumber'];
        $this->SalesRepMobileNo->DbValue = $row['SalesRepMobileNo'];
        $this->GSTNumber->DbValue = $row['GSTNumber'];
        $this->TANNumber->DbValue = $row['TANNumber'];
        $this->id->DbValue = $row['id'];
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
        return $_SESSION[$name] ?? GetUrl("PharmacySuppliersList");
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
        if ($pageName == "PharmacySuppliersView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacySuppliersEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacySuppliersAdd") {
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
                return "PharmacySuppliersView";
            case Config("API_ADD_ACTION"):
                return "PharmacySuppliersAdd";
            case Config("API_EDIT_ACTION"):
                return "PharmacySuppliersEdit";
            case Config("API_DELETE_ACTION"):
                return "PharmacySuppliersDelete";
            case Config("API_LIST_ACTION"):
                return "PharmacySuppliersList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacySuppliersList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacySuppliersView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacySuppliersView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacySuppliersAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacySuppliersAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacySuppliersEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PharmacySuppliersAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PharmacySuppliersDelete", $this->getUrlParm());
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
        $this->Suppliercode->setDbValue($row['Suppliercode']);
        $this->Suppliername->setDbValue($row['Suppliername']);
        $this->Abbreviation->setDbValue($row['Abbreviation']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->Citycode->setDbValue($row['Citycode']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Tngstnumber->setDbValue($row['Tngstnumber']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Paymentmode->setDbValue($row['Paymentmode']);
        $this->Contactperson1->setDbValue($row['Contactperson1']);
        $this->CP1Address1->setDbValue($row['CP1Address1']);
        $this->CP1Address2->setDbValue($row['CP1Address2']);
        $this->CP1Address3->setDbValue($row['CP1Address3']);
        $this->CP1Citycode->setDbValue($row['CP1Citycode']);
        $this->CP1State->setDbValue($row['CP1State']);
        $this->CP1Pincode->setDbValue($row['CP1Pincode']);
        $this->CP1Designation->setDbValue($row['CP1Designation']);
        $this->CP1Phone->setDbValue($row['CP1Phone']);
        $this->CP1MobileNo->setDbValue($row['CP1MobileNo']);
        $this->CP1Fax->setDbValue($row['CP1Fax']);
        $this->CP1Email->setDbValue($row['CP1Email']);
        $this->Contactperson2->setDbValue($row['Contactperson2']);
        $this->CP2Address1->setDbValue($row['CP2Address1']);
        $this->CP2Address2->setDbValue($row['CP2Address2']);
        $this->CP2Address3->setDbValue($row['CP2Address3']);
        $this->CP2Citycode->setDbValue($row['CP2Citycode']);
        $this->CP2State->setDbValue($row['CP2State']);
        $this->CP2Pincode->setDbValue($row['CP2Pincode']);
        $this->CP2Designation->setDbValue($row['CP2Designation']);
        $this->CP2Phone->setDbValue($row['CP2Phone']);
        $this->CP2MobileNo->setDbValue($row['CP2MobileNo']);
        $this->CP2Fax->setDbValue($row['CP2Fax']);
        $this->CP2Email->setDbValue($row['CP2Email']);
        $this->Type->setDbValue($row['Type']);
        $this->Creditterms->setDbValue($row['Creditterms']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->Tinnumber->setDbValue($row['Tinnumber']);
        $this->Universalsuppliercode->setDbValue($row['Universalsuppliercode']);
        $this->Mobilenumber->setDbValue($row['Mobilenumber']);
        $this->PANNumber->setDbValue($row['PANNumber']);
        $this->SalesRepMobileNo->setDbValue($row['SalesRepMobileNo']);
        $this->GSTNumber->setDbValue($row['GSTNumber']);
        $this->TANNumber->setDbValue($row['TANNumber']);
        $this->id->setDbValue($row['id']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // Suppliercode

        // Suppliername

        // Abbreviation

        // Creationdate

        // Address1

        // Address2

        // Address3

        // Citycode

        // State

        // Pincode

        // Tngstnumber

        // Phone

        // Fax

        // Email

        // Paymentmode

        // Contactperson1

        // CP1Address1

        // CP1Address2

        // CP1Address3

        // CP1Citycode

        // CP1State

        // CP1Pincode

        // CP1Designation

        // CP1Phone

        // CP1MobileNo

        // CP1Fax

        // CP1Email

        // Contactperson2

        // CP2Address1

        // CP2Address2

        // CP2Address3

        // CP2Citycode

        // CP2State

        // CP2Pincode

        // CP2Designation

        // CP2Phone

        // CP2MobileNo

        // CP2Fax

        // CP2Email

        // Type

        // Creditterms

        // Remarks

        // Tinnumber

        // Universalsuppliercode

        // Mobilenumber

        // PANNumber

        // SalesRepMobileNo

        // GSTNumber

        // TANNumber

        // id

        // Suppliercode
        $this->Suppliercode->ViewValue = $this->Suppliercode->CurrentValue;
        $this->Suppliercode->ViewCustomAttributes = "";

        // Suppliername
        $this->Suppliername->ViewValue = $this->Suppliername->CurrentValue;
        $this->Suppliername->ViewCustomAttributes = "";

        // Abbreviation
        $this->Abbreviation->ViewValue = $this->Abbreviation->CurrentValue;
        $this->Abbreviation->ViewCustomAttributes = "";

        // Creationdate
        $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
        $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
        $this->Creationdate->ViewCustomAttributes = "";

        // Address1
        $this->Address1->ViewValue = $this->Address1->CurrentValue;
        $this->Address1->ViewCustomAttributes = "";

        // Address2
        $this->Address2->ViewValue = $this->Address2->CurrentValue;
        $this->Address2->ViewCustomAttributes = "";

        // Address3
        $this->Address3->ViewValue = $this->Address3->CurrentValue;
        $this->Address3->ViewCustomAttributes = "";

        // Citycode
        $this->Citycode->ViewValue = $this->Citycode->CurrentValue;
        $this->Citycode->ViewValue = FormatNumber($this->Citycode->ViewValue, 0, -2, -2, -2);
        $this->Citycode->ViewCustomAttributes = "";

        // State
        $this->State->ViewValue = $this->State->CurrentValue;
        $this->State->ViewCustomAttributes = "";

        // Pincode
        $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
        $this->Pincode->ViewCustomAttributes = "";

        // Tngstnumber
        $this->Tngstnumber->ViewValue = $this->Tngstnumber->CurrentValue;
        $this->Tngstnumber->ViewCustomAttributes = "";

        // Phone
        $this->Phone->ViewValue = $this->Phone->CurrentValue;
        $this->Phone->ViewCustomAttributes = "";

        // Fax
        $this->Fax->ViewValue = $this->Fax->CurrentValue;
        $this->Fax->ViewCustomAttributes = "";

        // Email
        $this->_Email->ViewValue = $this->_Email->CurrentValue;
        $this->_Email->ViewCustomAttributes = "";

        // Paymentmode
        $this->Paymentmode->ViewValue = $this->Paymentmode->CurrentValue;
        $this->Paymentmode->ViewCustomAttributes = "";

        // Contactperson1
        $this->Contactperson1->ViewValue = $this->Contactperson1->CurrentValue;
        $this->Contactperson1->ViewCustomAttributes = "";

        // CP1Address1
        $this->CP1Address1->ViewValue = $this->CP1Address1->CurrentValue;
        $this->CP1Address1->ViewCustomAttributes = "";

        // CP1Address2
        $this->CP1Address2->ViewValue = $this->CP1Address2->CurrentValue;
        $this->CP1Address2->ViewCustomAttributes = "";

        // CP1Address3
        $this->CP1Address3->ViewValue = $this->CP1Address3->CurrentValue;
        $this->CP1Address3->ViewCustomAttributes = "";

        // CP1Citycode
        $this->CP1Citycode->ViewValue = $this->CP1Citycode->CurrentValue;
        $this->CP1Citycode->ViewValue = FormatNumber($this->CP1Citycode->ViewValue, 0, -2, -2, -2);
        $this->CP1Citycode->ViewCustomAttributes = "";

        // CP1State
        $this->CP1State->ViewValue = $this->CP1State->CurrentValue;
        $this->CP1State->ViewCustomAttributes = "";

        // CP1Pincode
        $this->CP1Pincode->ViewValue = $this->CP1Pincode->CurrentValue;
        $this->CP1Pincode->ViewCustomAttributes = "";

        // CP1Designation
        $this->CP1Designation->ViewValue = $this->CP1Designation->CurrentValue;
        $this->CP1Designation->ViewCustomAttributes = "";

        // CP1Phone
        $this->CP1Phone->ViewValue = $this->CP1Phone->CurrentValue;
        $this->CP1Phone->ViewCustomAttributes = "";

        // CP1MobileNo
        $this->CP1MobileNo->ViewValue = $this->CP1MobileNo->CurrentValue;
        $this->CP1MobileNo->ViewCustomAttributes = "";

        // CP1Fax
        $this->CP1Fax->ViewValue = $this->CP1Fax->CurrentValue;
        $this->CP1Fax->ViewCustomAttributes = "";

        // CP1Email
        $this->CP1Email->ViewValue = $this->CP1Email->CurrentValue;
        $this->CP1Email->ViewCustomAttributes = "";

        // Contactperson2
        $this->Contactperson2->ViewValue = $this->Contactperson2->CurrentValue;
        $this->Contactperson2->ViewCustomAttributes = "";

        // CP2Address1
        $this->CP2Address1->ViewValue = $this->CP2Address1->CurrentValue;
        $this->CP2Address1->ViewCustomAttributes = "";

        // CP2Address2
        $this->CP2Address2->ViewValue = $this->CP2Address2->CurrentValue;
        $this->CP2Address2->ViewCustomAttributes = "";

        // CP2Address3
        $this->CP2Address3->ViewValue = $this->CP2Address3->CurrentValue;
        $this->CP2Address3->ViewCustomAttributes = "";

        // CP2Citycode
        $this->CP2Citycode->ViewValue = $this->CP2Citycode->CurrentValue;
        $this->CP2Citycode->ViewValue = FormatNumber($this->CP2Citycode->ViewValue, 0, -2, -2, -2);
        $this->CP2Citycode->ViewCustomAttributes = "";

        // CP2State
        $this->CP2State->ViewValue = $this->CP2State->CurrentValue;
        $this->CP2State->ViewCustomAttributes = "";

        // CP2Pincode
        $this->CP2Pincode->ViewValue = $this->CP2Pincode->CurrentValue;
        $this->CP2Pincode->ViewCustomAttributes = "";

        // CP2Designation
        $this->CP2Designation->ViewValue = $this->CP2Designation->CurrentValue;
        $this->CP2Designation->ViewCustomAttributes = "";

        // CP2Phone
        $this->CP2Phone->ViewValue = $this->CP2Phone->CurrentValue;
        $this->CP2Phone->ViewCustomAttributes = "";

        // CP2MobileNo
        $this->CP2MobileNo->ViewValue = $this->CP2MobileNo->CurrentValue;
        $this->CP2MobileNo->ViewCustomAttributes = "";

        // CP2Fax
        $this->CP2Fax->ViewValue = $this->CP2Fax->CurrentValue;
        $this->CP2Fax->ViewCustomAttributes = "";

        // CP2Email
        $this->CP2Email->ViewValue = $this->CP2Email->CurrentValue;
        $this->CP2Email->ViewCustomAttributes = "";

        // Type
        $this->Type->ViewValue = $this->Type->CurrentValue;
        $this->Type->ViewCustomAttributes = "";

        // Creditterms
        $this->Creditterms->ViewValue = $this->Creditterms->CurrentValue;
        $this->Creditterms->ViewCustomAttributes = "";

        // Remarks
        $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
        $this->Remarks->ViewCustomAttributes = "";

        // Tinnumber
        $this->Tinnumber->ViewValue = $this->Tinnumber->CurrentValue;
        $this->Tinnumber->ViewCustomAttributes = "";

        // Universalsuppliercode
        $this->Universalsuppliercode->ViewValue = $this->Universalsuppliercode->CurrentValue;
        $this->Universalsuppliercode->ViewCustomAttributes = "";

        // Mobilenumber
        $this->Mobilenumber->ViewValue = $this->Mobilenumber->CurrentValue;
        $this->Mobilenumber->ViewCustomAttributes = "";

        // PANNumber
        $this->PANNumber->ViewValue = $this->PANNumber->CurrentValue;
        $this->PANNumber->ViewCustomAttributes = "";

        // SalesRepMobileNo
        $this->SalesRepMobileNo->ViewValue = $this->SalesRepMobileNo->CurrentValue;
        $this->SalesRepMobileNo->ViewCustomAttributes = "";

        // GSTNumber
        $this->GSTNumber->ViewValue = $this->GSTNumber->CurrentValue;
        $this->GSTNumber->ViewCustomAttributes = "";

        // TANNumber
        $this->TANNumber->ViewValue = $this->TANNumber->CurrentValue;
        $this->TANNumber->ViewCustomAttributes = "";

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Suppliercode
        $this->Suppliercode->LinkCustomAttributes = "";
        $this->Suppliercode->HrefValue = "";
        $this->Suppliercode->TooltipValue = "";

        // Suppliername
        $this->Suppliername->LinkCustomAttributes = "";
        $this->Suppliername->HrefValue = "";
        $this->Suppliername->TooltipValue = "";

        // Abbreviation
        $this->Abbreviation->LinkCustomAttributes = "";
        $this->Abbreviation->HrefValue = "";
        $this->Abbreviation->TooltipValue = "";

        // Creationdate
        $this->Creationdate->LinkCustomAttributes = "";
        $this->Creationdate->HrefValue = "";
        $this->Creationdate->TooltipValue = "";

        // Address1
        $this->Address1->LinkCustomAttributes = "";
        $this->Address1->HrefValue = "";
        $this->Address1->TooltipValue = "";

        // Address2
        $this->Address2->LinkCustomAttributes = "";
        $this->Address2->HrefValue = "";
        $this->Address2->TooltipValue = "";

        // Address3
        $this->Address3->LinkCustomAttributes = "";
        $this->Address3->HrefValue = "";
        $this->Address3->TooltipValue = "";

        // Citycode
        $this->Citycode->LinkCustomAttributes = "";
        $this->Citycode->HrefValue = "";
        $this->Citycode->TooltipValue = "";

        // State
        $this->State->LinkCustomAttributes = "";
        $this->State->HrefValue = "";
        $this->State->TooltipValue = "";

        // Pincode
        $this->Pincode->LinkCustomAttributes = "";
        $this->Pincode->HrefValue = "";
        $this->Pincode->TooltipValue = "";

        // Tngstnumber
        $this->Tngstnumber->LinkCustomAttributes = "";
        $this->Tngstnumber->HrefValue = "";
        $this->Tngstnumber->TooltipValue = "";

        // Phone
        $this->Phone->LinkCustomAttributes = "";
        $this->Phone->HrefValue = "";
        $this->Phone->TooltipValue = "";

        // Fax
        $this->Fax->LinkCustomAttributes = "";
        $this->Fax->HrefValue = "";
        $this->Fax->TooltipValue = "";

        // Email
        $this->_Email->LinkCustomAttributes = "";
        $this->_Email->HrefValue = "";
        $this->_Email->TooltipValue = "";

        // Paymentmode
        $this->Paymentmode->LinkCustomAttributes = "";
        $this->Paymentmode->HrefValue = "";
        $this->Paymentmode->TooltipValue = "";

        // Contactperson1
        $this->Contactperson1->LinkCustomAttributes = "";
        $this->Contactperson1->HrefValue = "";
        $this->Contactperson1->TooltipValue = "";

        // CP1Address1
        $this->CP1Address1->LinkCustomAttributes = "";
        $this->CP1Address1->HrefValue = "";
        $this->CP1Address1->TooltipValue = "";

        // CP1Address2
        $this->CP1Address2->LinkCustomAttributes = "";
        $this->CP1Address2->HrefValue = "";
        $this->CP1Address2->TooltipValue = "";

        // CP1Address3
        $this->CP1Address3->LinkCustomAttributes = "";
        $this->CP1Address3->HrefValue = "";
        $this->CP1Address3->TooltipValue = "";

        // CP1Citycode
        $this->CP1Citycode->LinkCustomAttributes = "";
        $this->CP1Citycode->HrefValue = "";
        $this->CP1Citycode->TooltipValue = "";

        // CP1State
        $this->CP1State->LinkCustomAttributes = "";
        $this->CP1State->HrefValue = "";
        $this->CP1State->TooltipValue = "";

        // CP1Pincode
        $this->CP1Pincode->LinkCustomAttributes = "";
        $this->CP1Pincode->HrefValue = "";
        $this->CP1Pincode->TooltipValue = "";

        // CP1Designation
        $this->CP1Designation->LinkCustomAttributes = "";
        $this->CP1Designation->HrefValue = "";
        $this->CP1Designation->TooltipValue = "";

        // CP1Phone
        $this->CP1Phone->LinkCustomAttributes = "";
        $this->CP1Phone->HrefValue = "";
        $this->CP1Phone->TooltipValue = "";

        // CP1MobileNo
        $this->CP1MobileNo->LinkCustomAttributes = "";
        $this->CP1MobileNo->HrefValue = "";
        $this->CP1MobileNo->TooltipValue = "";

        // CP1Fax
        $this->CP1Fax->LinkCustomAttributes = "";
        $this->CP1Fax->HrefValue = "";
        $this->CP1Fax->TooltipValue = "";

        // CP1Email
        $this->CP1Email->LinkCustomAttributes = "";
        $this->CP1Email->HrefValue = "";
        $this->CP1Email->TooltipValue = "";

        // Contactperson2
        $this->Contactperson2->LinkCustomAttributes = "";
        $this->Contactperson2->HrefValue = "";
        $this->Contactperson2->TooltipValue = "";

        // CP2Address1
        $this->CP2Address1->LinkCustomAttributes = "";
        $this->CP2Address1->HrefValue = "";
        $this->CP2Address1->TooltipValue = "";

        // CP2Address2
        $this->CP2Address2->LinkCustomAttributes = "";
        $this->CP2Address2->HrefValue = "";
        $this->CP2Address2->TooltipValue = "";

        // CP2Address3
        $this->CP2Address3->LinkCustomAttributes = "";
        $this->CP2Address3->HrefValue = "";
        $this->CP2Address3->TooltipValue = "";

        // CP2Citycode
        $this->CP2Citycode->LinkCustomAttributes = "";
        $this->CP2Citycode->HrefValue = "";
        $this->CP2Citycode->TooltipValue = "";

        // CP2State
        $this->CP2State->LinkCustomAttributes = "";
        $this->CP2State->HrefValue = "";
        $this->CP2State->TooltipValue = "";

        // CP2Pincode
        $this->CP2Pincode->LinkCustomAttributes = "";
        $this->CP2Pincode->HrefValue = "";
        $this->CP2Pincode->TooltipValue = "";

        // CP2Designation
        $this->CP2Designation->LinkCustomAttributes = "";
        $this->CP2Designation->HrefValue = "";
        $this->CP2Designation->TooltipValue = "";

        // CP2Phone
        $this->CP2Phone->LinkCustomAttributes = "";
        $this->CP2Phone->HrefValue = "";
        $this->CP2Phone->TooltipValue = "";

        // CP2MobileNo
        $this->CP2MobileNo->LinkCustomAttributes = "";
        $this->CP2MobileNo->HrefValue = "";
        $this->CP2MobileNo->TooltipValue = "";

        // CP2Fax
        $this->CP2Fax->LinkCustomAttributes = "";
        $this->CP2Fax->HrefValue = "";
        $this->CP2Fax->TooltipValue = "";

        // CP2Email
        $this->CP2Email->LinkCustomAttributes = "";
        $this->CP2Email->HrefValue = "";
        $this->CP2Email->TooltipValue = "";

        // Type
        $this->Type->LinkCustomAttributes = "";
        $this->Type->HrefValue = "";
        $this->Type->TooltipValue = "";

        // Creditterms
        $this->Creditterms->LinkCustomAttributes = "";
        $this->Creditterms->HrefValue = "";
        $this->Creditterms->TooltipValue = "";

        // Remarks
        $this->Remarks->LinkCustomAttributes = "";
        $this->Remarks->HrefValue = "";
        $this->Remarks->TooltipValue = "";

        // Tinnumber
        $this->Tinnumber->LinkCustomAttributes = "";
        $this->Tinnumber->HrefValue = "";
        $this->Tinnumber->TooltipValue = "";

        // Universalsuppliercode
        $this->Universalsuppliercode->LinkCustomAttributes = "";
        $this->Universalsuppliercode->HrefValue = "";
        $this->Universalsuppliercode->TooltipValue = "";

        // Mobilenumber
        $this->Mobilenumber->LinkCustomAttributes = "";
        $this->Mobilenumber->HrefValue = "";
        $this->Mobilenumber->TooltipValue = "";

        // PANNumber
        $this->PANNumber->LinkCustomAttributes = "";
        $this->PANNumber->HrefValue = "";
        $this->PANNumber->TooltipValue = "";

        // SalesRepMobileNo
        $this->SalesRepMobileNo->LinkCustomAttributes = "";
        $this->SalesRepMobileNo->HrefValue = "";
        $this->SalesRepMobileNo->TooltipValue = "";

        // GSTNumber
        $this->GSTNumber->LinkCustomAttributes = "";
        $this->GSTNumber->HrefValue = "";
        $this->GSTNumber->TooltipValue = "";

        // TANNumber
        $this->TANNumber->LinkCustomAttributes = "";
        $this->TANNumber->HrefValue = "";
        $this->TANNumber->TooltipValue = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

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

        // Suppliercode
        $this->Suppliercode->EditAttrs["class"] = "form-control";
        $this->Suppliercode->EditCustomAttributes = "";
        if (!$this->Suppliercode->Raw) {
            $this->Suppliercode->CurrentValue = HtmlDecode($this->Suppliercode->CurrentValue);
        }
        $this->Suppliercode->EditValue = $this->Suppliercode->CurrentValue;
        $this->Suppliercode->PlaceHolder = RemoveHtml($this->Suppliercode->caption());

        // Suppliername
        $this->Suppliername->EditAttrs["class"] = "form-control";
        $this->Suppliername->EditCustomAttributes = "";
        if (!$this->Suppliername->Raw) {
            $this->Suppliername->CurrentValue = HtmlDecode($this->Suppliername->CurrentValue);
        }
        $this->Suppliername->EditValue = $this->Suppliername->CurrentValue;
        $this->Suppliername->PlaceHolder = RemoveHtml($this->Suppliername->caption());

        // Abbreviation
        $this->Abbreviation->EditAttrs["class"] = "form-control";
        $this->Abbreviation->EditCustomAttributes = "";
        if (!$this->Abbreviation->Raw) {
            $this->Abbreviation->CurrentValue = HtmlDecode($this->Abbreviation->CurrentValue);
        }
        $this->Abbreviation->EditValue = $this->Abbreviation->CurrentValue;
        $this->Abbreviation->PlaceHolder = RemoveHtml($this->Abbreviation->caption());

        // Creationdate
        $this->Creationdate->EditAttrs["class"] = "form-control";
        $this->Creationdate->EditCustomAttributes = "";
        $this->Creationdate->EditValue = FormatDateTime($this->Creationdate->CurrentValue, 8);
        $this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

        // Address1
        $this->Address1->EditAttrs["class"] = "form-control";
        $this->Address1->EditCustomAttributes = "";
        if (!$this->Address1->Raw) {
            $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
        }
        $this->Address1->EditValue = $this->Address1->CurrentValue;
        $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

        // Address2
        $this->Address2->EditAttrs["class"] = "form-control";
        $this->Address2->EditCustomAttributes = "";
        if (!$this->Address2->Raw) {
            $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
        }
        $this->Address2->EditValue = $this->Address2->CurrentValue;
        $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

        // Address3
        $this->Address3->EditAttrs["class"] = "form-control";
        $this->Address3->EditCustomAttributes = "";
        if (!$this->Address3->Raw) {
            $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
        }
        $this->Address3->EditValue = $this->Address3->CurrentValue;
        $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

        // Citycode
        $this->Citycode->EditAttrs["class"] = "form-control";
        $this->Citycode->EditCustomAttributes = "";
        $this->Citycode->EditValue = $this->Citycode->CurrentValue;
        $this->Citycode->PlaceHolder = RemoveHtml($this->Citycode->caption());

        // State
        $this->State->EditAttrs["class"] = "form-control";
        $this->State->EditCustomAttributes = "";
        if (!$this->State->Raw) {
            $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
        }
        $this->State->EditValue = $this->State->CurrentValue;
        $this->State->PlaceHolder = RemoveHtml($this->State->caption());

        // Pincode
        $this->Pincode->EditAttrs["class"] = "form-control";
        $this->Pincode->EditCustomAttributes = "";
        if (!$this->Pincode->Raw) {
            $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
        }
        $this->Pincode->EditValue = $this->Pincode->CurrentValue;
        $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

        // Tngstnumber
        $this->Tngstnumber->EditAttrs["class"] = "form-control";
        $this->Tngstnumber->EditCustomAttributes = "";
        if (!$this->Tngstnumber->Raw) {
            $this->Tngstnumber->CurrentValue = HtmlDecode($this->Tngstnumber->CurrentValue);
        }
        $this->Tngstnumber->EditValue = $this->Tngstnumber->CurrentValue;
        $this->Tngstnumber->PlaceHolder = RemoveHtml($this->Tngstnumber->caption());

        // Phone
        $this->Phone->EditAttrs["class"] = "form-control";
        $this->Phone->EditCustomAttributes = "";
        if (!$this->Phone->Raw) {
            $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
        }
        $this->Phone->EditValue = $this->Phone->CurrentValue;
        $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

        // Fax
        $this->Fax->EditAttrs["class"] = "form-control";
        $this->Fax->EditCustomAttributes = "";
        if (!$this->Fax->Raw) {
            $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
        }
        $this->Fax->EditValue = $this->Fax->CurrentValue;
        $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

        // Email
        $this->_Email->EditAttrs["class"] = "form-control";
        $this->_Email->EditCustomAttributes = "";
        if (!$this->_Email->Raw) {
            $this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
        }
        $this->_Email->EditValue = $this->_Email->CurrentValue;
        $this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

        // Paymentmode
        $this->Paymentmode->EditAttrs["class"] = "form-control";
        $this->Paymentmode->EditCustomAttributes = "";
        if (!$this->Paymentmode->Raw) {
            $this->Paymentmode->CurrentValue = HtmlDecode($this->Paymentmode->CurrentValue);
        }
        $this->Paymentmode->EditValue = $this->Paymentmode->CurrentValue;
        $this->Paymentmode->PlaceHolder = RemoveHtml($this->Paymentmode->caption());

        // Contactperson1
        $this->Contactperson1->EditAttrs["class"] = "form-control";
        $this->Contactperson1->EditCustomAttributes = "";
        if (!$this->Contactperson1->Raw) {
            $this->Contactperson1->CurrentValue = HtmlDecode($this->Contactperson1->CurrentValue);
        }
        $this->Contactperson1->EditValue = $this->Contactperson1->CurrentValue;
        $this->Contactperson1->PlaceHolder = RemoveHtml($this->Contactperson1->caption());

        // CP1Address1
        $this->CP1Address1->EditAttrs["class"] = "form-control";
        $this->CP1Address1->EditCustomAttributes = "";
        if (!$this->CP1Address1->Raw) {
            $this->CP1Address1->CurrentValue = HtmlDecode($this->CP1Address1->CurrentValue);
        }
        $this->CP1Address1->EditValue = $this->CP1Address1->CurrentValue;
        $this->CP1Address1->PlaceHolder = RemoveHtml($this->CP1Address1->caption());

        // CP1Address2
        $this->CP1Address2->EditAttrs["class"] = "form-control";
        $this->CP1Address2->EditCustomAttributes = "";
        if (!$this->CP1Address2->Raw) {
            $this->CP1Address2->CurrentValue = HtmlDecode($this->CP1Address2->CurrentValue);
        }
        $this->CP1Address2->EditValue = $this->CP1Address2->CurrentValue;
        $this->CP1Address2->PlaceHolder = RemoveHtml($this->CP1Address2->caption());

        // CP1Address3
        $this->CP1Address3->EditAttrs["class"] = "form-control";
        $this->CP1Address3->EditCustomAttributes = "";
        if (!$this->CP1Address3->Raw) {
            $this->CP1Address3->CurrentValue = HtmlDecode($this->CP1Address3->CurrentValue);
        }
        $this->CP1Address3->EditValue = $this->CP1Address3->CurrentValue;
        $this->CP1Address3->PlaceHolder = RemoveHtml($this->CP1Address3->caption());

        // CP1Citycode
        $this->CP1Citycode->EditAttrs["class"] = "form-control";
        $this->CP1Citycode->EditCustomAttributes = "";
        $this->CP1Citycode->EditValue = $this->CP1Citycode->CurrentValue;
        $this->CP1Citycode->PlaceHolder = RemoveHtml($this->CP1Citycode->caption());

        // CP1State
        $this->CP1State->EditAttrs["class"] = "form-control";
        $this->CP1State->EditCustomAttributes = "";
        if (!$this->CP1State->Raw) {
            $this->CP1State->CurrentValue = HtmlDecode($this->CP1State->CurrentValue);
        }
        $this->CP1State->EditValue = $this->CP1State->CurrentValue;
        $this->CP1State->PlaceHolder = RemoveHtml($this->CP1State->caption());

        // CP1Pincode
        $this->CP1Pincode->EditAttrs["class"] = "form-control";
        $this->CP1Pincode->EditCustomAttributes = "";
        if (!$this->CP1Pincode->Raw) {
            $this->CP1Pincode->CurrentValue = HtmlDecode($this->CP1Pincode->CurrentValue);
        }
        $this->CP1Pincode->EditValue = $this->CP1Pincode->CurrentValue;
        $this->CP1Pincode->PlaceHolder = RemoveHtml($this->CP1Pincode->caption());

        // CP1Designation
        $this->CP1Designation->EditAttrs["class"] = "form-control";
        $this->CP1Designation->EditCustomAttributes = "";
        if (!$this->CP1Designation->Raw) {
            $this->CP1Designation->CurrentValue = HtmlDecode($this->CP1Designation->CurrentValue);
        }
        $this->CP1Designation->EditValue = $this->CP1Designation->CurrentValue;
        $this->CP1Designation->PlaceHolder = RemoveHtml($this->CP1Designation->caption());

        // CP1Phone
        $this->CP1Phone->EditAttrs["class"] = "form-control";
        $this->CP1Phone->EditCustomAttributes = "";
        if (!$this->CP1Phone->Raw) {
            $this->CP1Phone->CurrentValue = HtmlDecode($this->CP1Phone->CurrentValue);
        }
        $this->CP1Phone->EditValue = $this->CP1Phone->CurrentValue;
        $this->CP1Phone->PlaceHolder = RemoveHtml($this->CP1Phone->caption());

        // CP1MobileNo
        $this->CP1MobileNo->EditAttrs["class"] = "form-control";
        $this->CP1MobileNo->EditCustomAttributes = "";
        if (!$this->CP1MobileNo->Raw) {
            $this->CP1MobileNo->CurrentValue = HtmlDecode($this->CP1MobileNo->CurrentValue);
        }
        $this->CP1MobileNo->EditValue = $this->CP1MobileNo->CurrentValue;
        $this->CP1MobileNo->PlaceHolder = RemoveHtml($this->CP1MobileNo->caption());

        // CP1Fax
        $this->CP1Fax->EditAttrs["class"] = "form-control";
        $this->CP1Fax->EditCustomAttributes = "";
        if (!$this->CP1Fax->Raw) {
            $this->CP1Fax->CurrentValue = HtmlDecode($this->CP1Fax->CurrentValue);
        }
        $this->CP1Fax->EditValue = $this->CP1Fax->CurrentValue;
        $this->CP1Fax->PlaceHolder = RemoveHtml($this->CP1Fax->caption());

        // CP1Email
        $this->CP1Email->EditAttrs["class"] = "form-control";
        $this->CP1Email->EditCustomAttributes = "";
        if (!$this->CP1Email->Raw) {
            $this->CP1Email->CurrentValue = HtmlDecode($this->CP1Email->CurrentValue);
        }
        $this->CP1Email->EditValue = $this->CP1Email->CurrentValue;
        $this->CP1Email->PlaceHolder = RemoveHtml($this->CP1Email->caption());

        // Contactperson2
        $this->Contactperson2->EditAttrs["class"] = "form-control";
        $this->Contactperson2->EditCustomAttributes = "";
        if (!$this->Contactperson2->Raw) {
            $this->Contactperson2->CurrentValue = HtmlDecode($this->Contactperson2->CurrentValue);
        }
        $this->Contactperson2->EditValue = $this->Contactperson2->CurrentValue;
        $this->Contactperson2->PlaceHolder = RemoveHtml($this->Contactperson2->caption());

        // CP2Address1
        $this->CP2Address1->EditAttrs["class"] = "form-control";
        $this->CP2Address1->EditCustomAttributes = "";
        if (!$this->CP2Address1->Raw) {
            $this->CP2Address1->CurrentValue = HtmlDecode($this->CP2Address1->CurrentValue);
        }
        $this->CP2Address1->EditValue = $this->CP2Address1->CurrentValue;
        $this->CP2Address1->PlaceHolder = RemoveHtml($this->CP2Address1->caption());

        // CP2Address2
        $this->CP2Address2->EditAttrs["class"] = "form-control";
        $this->CP2Address2->EditCustomAttributes = "";
        if (!$this->CP2Address2->Raw) {
            $this->CP2Address2->CurrentValue = HtmlDecode($this->CP2Address2->CurrentValue);
        }
        $this->CP2Address2->EditValue = $this->CP2Address2->CurrentValue;
        $this->CP2Address2->PlaceHolder = RemoveHtml($this->CP2Address2->caption());

        // CP2Address3
        $this->CP2Address3->EditAttrs["class"] = "form-control";
        $this->CP2Address3->EditCustomAttributes = "";
        if (!$this->CP2Address3->Raw) {
            $this->CP2Address3->CurrentValue = HtmlDecode($this->CP2Address3->CurrentValue);
        }
        $this->CP2Address3->EditValue = $this->CP2Address3->CurrentValue;
        $this->CP2Address3->PlaceHolder = RemoveHtml($this->CP2Address3->caption());

        // CP2Citycode
        $this->CP2Citycode->EditAttrs["class"] = "form-control";
        $this->CP2Citycode->EditCustomAttributes = "";
        $this->CP2Citycode->EditValue = $this->CP2Citycode->CurrentValue;
        $this->CP2Citycode->PlaceHolder = RemoveHtml($this->CP2Citycode->caption());

        // CP2State
        $this->CP2State->EditAttrs["class"] = "form-control";
        $this->CP2State->EditCustomAttributes = "";
        if (!$this->CP2State->Raw) {
            $this->CP2State->CurrentValue = HtmlDecode($this->CP2State->CurrentValue);
        }
        $this->CP2State->EditValue = $this->CP2State->CurrentValue;
        $this->CP2State->PlaceHolder = RemoveHtml($this->CP2State->caption());

        // CP2Pincode
        $this->CP2Pincode->EditAttrs["class"] = "form-control";
        $this->CP2Pincode->EditCustomAttributes = "";
        if (!$this->CP2Pincode->Raw) {
            $this->CP2Pincode->CurrentValue = HtmlDecode($this->CP2Pincode->CurrentValue);
        }
        $this->CP2Pincode->EditValue = $this->CP2Pincode->CurrentValue;
        $this->CP2Pincode->PlaceHolder = RemoveHtml($this->CP2Pincode->caption());

        // CP2Designation
        $this->CP2Designation->EditAttrs["class"] = "form-control";
        $this->CP2Designation->EditCustomAttributes = "";
        if (!$this->CP2Designation->Raw) {
            $this->CP2Designation->CurrentValue = HtmlDecode($this->CP2Designation->CurrentValue);
        }
        $this->CP2Designation->EditValue = $this->CP2Designation->CurrentValue;
        $this->CP2Designation->PlaceHolder = RemoveHtml($this->CP2Designation->caption());

        // CP2Phone
        $this->CP2Phone->EditAttrs["class"] = "form-control";
        $this->CP2Phone->EditCustomAttributes = "";
        if (!$this->CP2Phone->Raw) {
            $this->CP2Phone->CurrentValue = HtmlDecode($this->CP2Phone->CurrentValue);
        }
        $this->CP2Phone->EditValue = $this->CP2Phone->CurrentValue;
        $this->CP2Phone->PlaceHolder = RemoveHtml($this->CP2Phone->caption());

        // CP2MobileNo
        $this->CP2MobileNo->EditAttrs["class"] = "form-control";
        $this->CP2MobileNo->EditCustomAttributes = "";
        if (!$this->CP2MobileNo->Raw) {
            $this->CP2MobileNo->CurrentValue = HtmlDecode($this->CP2MobileNo->CurrentValue);
        }
        $this->CP2MobileNo->EditValue = $this->CP2MobileNo->CurrentValue;
        $this->CP2MobileNo->PlaceHolder = RemoveHtml($this->CP2MobileNo->caption());

        // CP2Fax
        $this->CP2Fax->EditAttrs["class"] = "form-control";
        $this->CP2Fax->EditCustomAttributes = "";
        if (!$this->CP2Fax->Raw) {
            $this->CP2Fax->CurrentValue = HtmlDecode($this->CP2Fax->CurrentValue);
        }
        $this->CP2Fax->EditValue = $this->CP2Fax->CurrentValue;
        $this->CP2Fax->PlaceHolder = RemoveHtml($this->CP2Fax->caption());

        // CP2Email
        $this->CP2Email->EditAttrs["class"] = "form-control";
        $this->CP2Email->EditCustomAttributes = "";
        if (!$this->CP2Email->Raw) {
            $this->CP2Email->CurrentValue = HtmlDecode($this->CP2Email->CurrentValue);
        }
        $this->CP2Email->EditValue = $this->CP2Email->CurrentValue;
        $this->CP2Email->PlaceHolder = RemoveHtml($this->CP2Email->caption());

        // Type
        $this->Type->EditAttrs["class"] = "form-control";
        $this->Type->EditCustomAttributes = "";
        if (!$this->Type->Raw) {
            $this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
        }
        $this->Type->EditValue = $this->Type->CurrentValue;
        $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

        // Creditterms
        $this->Creditterms->EditAttrs["class"] = "form-control";
        $this->Creditterms->EditCustomAttributes = "";
        if (!$this->Creditterms->Raw) {
            $this->Creditterms->CurrentValue = HtmlDecode($this->Creditterms->CurrentValue);
        }
        $this->Creditterms->EditValue = $this->Creditterms->CurrentValue;
        $this->Creditterms->PlaceHolder = RemoveHtml($this->Creditterms->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // Tinnumber
        $this->Tinnumber->EditAttrs["class"] = "form-control";
        $this->Tinnumber->EditCustomAttributes = "";
        if (!$this->Tinnumber->Raw) {
            $this->Tinnumber->CurrentValue = HtmlDecode($this->Tinnumber->CurrentValue);
        }
        $this->Tinnumber->EditValue = $this->Tinnumber->CurrentValue;
        $this->Tinnumber->PlaceHolder = RemoveHtml($this->Tinnumber->caption());

        // Universalsuppliercode
        $this->Universalsuppliercode->EditAttrs["class"] = "form-control";
        $this->Universalsuppliercode->EditCustomAttributes = "";
        if (!$this->Universalsuppliercode->Raw) {
            $this->Universalsuppliercode->CurrentValue = HtmlDecode($this->Universalsuppliercode->CurrentValue);
        }
        $this->Universalsuppliercode->EditValue = $this->Universalsuppliercode->CurrentValue;
        $this->Universalsuppliercode->PlaceHolder = RemoveHtml($this->Universalsuppliercode->caption());

        // Mobilenumber
        $this->Mobilenumber->EditAttrs["class"] = "form-control";
        $this->Mobilenumber->EditCustomAttributes = "";
        if (!$this->Mobilenumber->Raw) {
            $this->Mobilenumber->CurrentValue = HtmlDecode($this->Mobilenumber->CurrentValue);
        }
        $this->Mobilenumber->EditValue = $this->Mobilenumber->CurrentValue;
        $this->Mobilenumber->PlaceHolder = RemoveHtml($this->Mobilenumber->caption());

        // PANNumber
        $this->PANNumber->EditAttrs["class"] = "form-control";
        $this->PANNumber->EditCustomAttributes = "";
        if (!$this->PANNumber->Raw) {
            $this->PANNumber->CurrentValue = HtmlDecode($this->PANNumber->CurrentValue);
        }
        $this->PANNumber->EditValue = $this->PANNumber->CurrentValue;
        $this->PANNumber->PlaceHolder = RemoveHtml($this->PANNumber->caption());

        // SalesRepMobileNo
        $this->SalesRepMobileNo->EditAttrs["class"] = "form-control";
        $this->SalesRepMobileNo->EditCustomAttributes = "";
        if (!$this->SalesRepMobileNo->Raw) {
            $this->SalesRepMobileNo->CurrentValue = HtmlDecode($this->SalesRepMobileNo->CurrentValue);
        }
        $this->SalesRepMobileNo->EditValue = $this->SalesRepMobileNo->CurrentValue;
        $this->SalesRepMobileNo->PlaceHolder = RemoveHtml($this->SalesRepMobileNo->caption());

        // GSTNumber
        $this->GSTNumber->EditAttrs["class"] = "form-control";
        $this->GSTNumber->EditCustomAttributes = "";
        if (!$this->GSTNumber->Raw) {
            $this->GSTNumber->CurrentValue = HtmlDecode($this->GSTNumber->CurrentValue);
        }
        $this->GSTNumber->EditValue = $this->GSTNumber->CurrentValue;
        $this->GSTNumber->PlaceHolder = RemoveHtml($this->GSTNumber->caption());

        // TANNumber
        $this->TANNumber->EditAttrs["class"] = "form-control";
        $this->TANNumber->EditCustomAttributes = "";
        if (!$this->TANNumber->Raw) {
            $this->TANNumber->CurrentValue = HtmlDecode($this->TANNumber->CurrentValue);
        }
        $this->TANNumber->EditValue = $this->TANNumber->CurrentValue;
        $this->TANNumber->PlaceHolder = RemoveHtml($this->TANNumber->caption());

        // id
        $this->id->EditAttrs["class"] = "form-control";
        $this->id->EditCustomAttributes = "";
        $this->id->EditValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

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
                    $doc->exportCaption($this->Suppliercode);
                    $doc->exportCaption($this->Suppliername);
                    $doc->exportCaption($this->Abbreviation);
                    $doc->exportCaption($this->Creationdate);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->Citycode);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Tngstnumber);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->_Email);
                    $doc->exportCaption($this->Paymentmode);
                    $doc->exportCaption($this->Contactperson1);
                    $doc->exportCaption($this->CP1Address1);
                    $doc->exportCaption($this->CP1Address2);
                    $doc->exportCaption($this->CP1Address3);
                    $doc->exportCaption($this->CP1Citycode);
                    $doc->exportCaption($this->CP1State);
                    $doc->exportCaption($this->CP1Pincode);
                    $doc->exportCaption($this->CP1Designation);
                    $doc->exportCaption($this->CP1Phone);
                    $doc->exportCaption($this->CP1MobileNo);
                    $doc->exportCaption($this->CP1Fax);
                    $doc->exportCaption($this->CP1Email);
                    $doc->exportCaption($this->Contactperson2);
                    $doc->exportCaption($this->CP2Address1);
                    $doc->exportCaption($this->CP2Address2);
                    $doc->exportCaption($this->CP2Address3);
                    $doc->exportCaption($this->CP2Citycode);
                    $doc->exportCaption($this->CP2State);
                    $doc->exportCaption($this->CP2Pincode);
                    $doc->exportCaption($this->CP2Designation);
                    $doc->exportCaption($this->CP2Phone);
                    $doc->exportCaption($this->CP2MobileNo);
                    $doc->exportCaption($this->CP2Fax);
                    $doc->exportCaption($this->CP2Email);
                    $doc->exportCaption($this->Type);
                    $doc->exportCaption($this->Creditterms);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->Tinnumber);
                    $doc->exportCaption($this->Universalsuppliercode);
                    $doc->exportCaption($this->Mobilenumber);
                    $doc->exportCaption($this->PANNumber);
                    $doc->exportCaption($this->SalesRepMobileNo);
                    $doc->exportCaption($this->GSTNumber);
                    $doc->exportCaption($this->TANNumber);
                    $doc->exportCaption($this->id);
                } else {
                    $doc->exportCaption($this->Suppliercode);
                    $doc->exportCaption($this->Suppliername);
                    $doc->exportCaption($this->Abbreviation);
                    $doc->exportCaption($this->Creationdate);
                    $doc->exportCaption($this->Address1);
                    $doc->exportCaption($this->Address2);
                    $doc->exportCaption($this->Address3);
                    $doc->exportCaption($this->Citycode);
                    $doc->exportCaption($this->State);
                    $doc->exportCaption($this->Pincode);
                    $doc->exportCaption($this->Tngstnumber);
                    $doc->exportCaption($this->Phone);
                    $doc->exportCaption($this->Fax);
                    $doc->exportCaption($this->_Email);
                    $doc->exportCaption($this->Paymentmode);
                    $doc->exportCaption($this->Contactperson1);
                    $doc->exportCaption($this->CP1Address1);
                    $doc->exportCaption($this->CP1Address2);
                    $doc->exportCaption($this->CP1Address3);
                    $doc->exportCaption($this->CP1Citycode);
                    $doc->exportCaption($this->CP1State);
                    $doc->exportCaption($this->CP1Pincode);
                    $doc->exportCaption($this->CP1Designation);
                    $doc->exportCaption($this->CP1Phone);
                    $doc->exportCaption($this->CP1MobileNo);
                    $doc->exportCaption($this->CP1Fax);
                    $doc->exportCaption($this->CP1Email);
                    $doc->exportCaption($this->Contactperson2);
                    $doc->exportCaption($this->CP2Address1);
                    $doc->exportCaption($this->CP2Address2);
                    $doc->exportCaption($this->CP2Address3);
                    $doc->exportCaption($this->CP2Citycode);
                    $doc->exportCaption($this->CP2State);
                    $doc->exportCaption($this->CP2Pincode);
                    $doc->exportCaption($this->CP2Designation);
                    $doc->exportCaption($this->CP2Phone);
                    $doc->exportCaption($this->CP2MobileNo);
                    $doc->exportCaption($this->CP2Fax);
                    $doc->exportCaption($this->CP2Email);
                    $doc->exportCaption($this->Type);
                    $doc->exportCaption($this->Creditterms);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->Tinnumber);
                    $doc->exportCaption($this->Universalsuppliercode);
                    $doc->exportCaption($this->Mobilenumber);
                    $doc->exportCaption($this->PANNumber);
                    $doc->exportCaption($this->SalesRepMobileNo);
                    $doc->exportCaption($this->GSTNumber);
                    $doc->exportCaption($this->TANNumber);
                    $doc->exportCaption($this->id);
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
                        $doc->exportField($this->Suppliercode);
                        $doc->exportField($this->Suppliername);
                        $doc->exportField($this->Abbreviation);
                        $doc->exportField($this->Creationdate);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->Citycode);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Tngstnumber);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->_Email);
                        $doc->exportField($this->Paymentmode);
                        $doc->exportField($this->Contactperson1);
                        $doc->exportField($this->CP1Address1);
                        $doc->exportField($this->CP1Address2);
                        $doc->exportField($this->CP1Address3);
                        $doc->exportField($this->CP1Citycode);
                        $doc->exportField($this->CP1State);
                        $doc->exportField($this->CP1Pincode);
                        $doc->exportField($this->CP1Designation);
                        $doc->exportField($this->CP1Phone);
                        $doc->exportField($this->CP1MobileNo);
                        $doc->exportField($this->CP1Fax);
                        $doc->exportField($this->CP1Email);
                        $doc->exportField($this->Contactperson2);
                        $doc->exportField($this->CP2Address1);
                        $doc->exportField($this->CP2Address2);
                        $doc->exportField($this->CP2Address3);
                        $doc->exportField($this->CP2Citycode);
                        $doc->exportField($this->CP2State);
                        $doc->exportField($this->CP2Pincode);
                        $doc->exportField($this->CP2Designation);
                        $doc->exportField($this->CP2Phone);
                        $doc->exportField($this->CP2MobileNo);
                        $doc->exportField($this->CP2Fax);
                        $doc->exportField($this->CP2Email);
                        $doc->exportField($this->Type);
                        $doc->exportField($this->Creditterms);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->Tinnumber);
                        $doc->exportField($this->Universalsuppliercode);
                        $doc->exportField($this->Mobilenumber);
                        $doc->exportField($this->PANNumber);
                        $doc->exportField($this->SalesRepMobileNo);
                        $doc->exportField($this->GSTNumber);
                        $doc->exportField($this->TANNumber);
                        $doc->exportField($this->id);
                    } else {
                        $doc->exportField($this->Suppliercode);
                        $doc->exportField($this->Suppliername);
                        $doc->exportField($this->Abbreviation);
                        $doc->exportField($this->Creationdate);
                        $doc->exportField($this->Address1);
                        $doc->exportField($this->Address2);
                        $doc->exportField($this->Address3);
                        $doc->exportField($this->Citycode);
                        $doc->exportField($this->State);
                        $doc->exportField($this->Pincode);
                        $doc->exportField($this->Tngstnumber);
                        $doc->exportField($this->Phone);
                        $doc->exportField($this->Fax);
                        $doc->exportField($this->_Email);
                        $doc->exportField($this->Paymentmode);
                        $doc->exportField($this->Contactperson1);
                        $doc->exportField($this->CP1Address1);
                        $doc->exportField($this->CP1Address2);
                        $doc->exportField($this->CP1Address3);
                        $doc->exportField($this->CP1Citycode);
                        $doc->exportField($this->CP1State);
                        $doc->exportField($this->CP1Pincode);
                        $doc->exportField($this->CP1Designation);
                        $doc->exportField($this->CP1Phone);
                        $doc->exportField($this->CP1MobileNo);
                        $doc->exportField($this->CP1Fax);
                        $doc->exportField($this->CP1Email);
                        $doc->exportField($this->Contactperson2);
                        $doc->exportField($this->CP2Address1);
                        $doc->exportField($this->CP2Address2);
                        $doc->exportField($this->CP2Address3);
                        $doc->exportField($this->CP2Citycode);
                        $doc->exportField($this->CP2State);
                        $doc->exportField($this->CP2Pincode);
                        $doc->exportField($this->CP2Designation);
                        $doc->exportField($this->CP2Phone);
                        $doc->exportField($this->CP2MobileNo);
                        $doc->exportField($this->CP2Fax);
                        $doc->exportField($this->CP2Email);
                        $doc->exportField($this->Type);
                        $doc->exportField($this->Creditterms);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->Tinnumber);
                        $doc->exportField($this->Universalsuppliercode);
                        $doc->exportField($this->Mobilenumber);
                        $doc->exportField($this->PANNumber);
                        $doc->exportField($this->SalesRepMobileNo);
                        $doc->exportField($this->GSTNumber);
                        $doc->exportField($this->TANNumber);
                        $doc->exportField($this->id);
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
