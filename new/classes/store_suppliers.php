<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for store_suppliers
 */
class store_suppliers extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'store_suppliers';
		$this->TableName = 'store_suppliers';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`store_suppliers`";
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

		// Suppliercode
		$this->Suppliercode = new DbField('store_suppliers', 'store_suppliers', 'x_Suppliercode', 'Suppliercode', '`Suppliercode`', '`Suppliercode`', 200, 15, -1, FALSE, '`Suppliercode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Suppliercode->Nullable = FALSE; // NOT NULL field
		$this->Suppliercode->Required = TRUE; // Required field
		$this->Suppliercode->Sortable = TRUE; // Allow sort
		$this->fields['Suppliercode'] = &$this->Suppliercode;

		// Suppliername
		$this->Suppliername = new DbField('store_suppliers', 'store_suppliers', 'x_Suppliername', 'Suppliername', '`Suppliername`', '`Suppliername`', 200, 200, -1, FALSE, '`Suppliername`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Suppliername->Nullable = FALSE; // NOT NULL field
		$this->Suppliername->Required = TRUE; // Required field
		$this->Suppliername->Sortable = TRUE; // Allow sort
		$this->fields['Suppliername'] = &$this->Suppliername;

		// Abbreviation
		$this->Abbreviation = new DbField('store_suppliers', 'store_suppliers', 'x_Abbreviation', 'Abbreviation', '`Abbreviation`', '`Abbreviation`', 200, 5, -1, FALSE, '`Abbreviation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Abbreviation->Sortable = TRUE; // Allow sort
		$this->fields['Abbreviation'] = &$this->Abbreviation;

		// Creationdate
		$this->Creationdate = new DbField('store_suppliers', 'store_suppliers', 'x_Creationdate', 'Creationdate', '`Creationdate`', CastDateFieldForLike("`Creationdate`", 0, "DB"), 135, 23, 0, FALSE, '`Creationdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Creationdate->Sortable = TRUE; // Allow sort
		$this->Creationdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Creationdate'] = &$this->Creationdate;

		// Address1
		$this->Address1 = new DbField('store_suppliers', 'store_suppliers', 'x_Address1', 'Address1', '`Address1`', '`Address1`', 200, 250, -1, FALSE, '`Address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address1->Sortable = TRUE; // Allow sort
		$this->fields['Address1'] = &$this->Address1;

		// Address2
		$this->Address2 = new DbField('store_suppliers', 'store_suppliers', 'x_Address2', 'Address2', '`Address2`', '`Address2`', 200, 250, -1, FALSE, '`Address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address2->Sortable = TRUE; // Allow sort
		$this->fields['Address2'] = &$this->Address2;

		// Address3
		$this->Address3 = new DbField('store_suppliers', 'store_suppliers', 'x_Address3', 'Address3', '`Address3`', '`Address3`', 200, 250, -1, FALSE, '`Address3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address3->Sortable = TRUE; // Allow sort
		$this->fields['Address3'] = &$this->Address3;

		// Citycode
		$this->Citycode = new DbField('store_suppliers', 'store_suppliers', 'x_Citycode', 'Citycode', '`Citycode`', '`Citycode`', 3, 11, -1, FALSE, '`Citycode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Citycode->Sortable = TRUE; // Allow sort
		$this->Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Citycode'] = &$this->Citycode;

		// State
		$this->State = new DbField('store_suppliers', 'store_suppliers', 'x_State', 'State', '`State`', '`State`', 200, 50, -1, FALSE, '`State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->State->Sortable = TRUE; // Allow sort
		$this->fields['State'] = &$this->State;

		// Pincode
		$this->Pincode = new DbField('store_suppliers', 'store_suppliers', 'x_Pincode', 'Pincode', '`Pincode`', '`Pincode`', 200, 15, -1, FALSE, '`Pincode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pincode->Sortable = TRUE; // Allow sort
		$this->fields['Pincode'] = &$this->Pincode;

		// Tngstnumber
		$this->Tngstnumber = new DbField('store_suppliers', 'store_suppliers', 'x_Tngstnumber', 'Tngstnumber', '`Tngstnumber`', '`Tngstnumber`', 200, 50, -1, FALSE, '`Tngstnumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tngstnumber->Sortable = TRUE; // Allow sort
		$this->fields['Tngstnumber'] = &$this->Tngstnumber;

		// Phone
		$this->Phone = new DbField('store_suppliers', 'store_suppliers', 'x_Phone', 'Phone', '`Phone`', '`Phone`', 200, 40, -1, FALSE, '`Phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Phone->Sortable = TRUE; // Allow sort
		$this->fields['Phone'] = &$this->Phone;

		// Fax
		$this->Fax = new DbField('store_suppliers', 'store_suppliers', 'x_Fax', 'Fax', '`Fax`', '`Fax`', 200, 40, -1, FALSE, '`Fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Fax->Sortable = TRUE; // Allow sort
		$this->fields['Fax'] = &$this->Fax;

		// Email
		$this->_Email = new DbField('store_suppliers', 'store_suppliers', 'x__Email', 'Email', '`Email`', '`Email`', 200, 40, -1, FALSE, '`Email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Email->Sortable = TRUE; // Allow sort
		$this->fields['Email'] = &$this->_Email;

		// Paymentmode
		$this->Paymentmode = new DbField('store_suppliers', 'store_suppliers', 'x_Paymentmode', 'Paymentmode', '`Paymentmode`', '`Paymentmode`', 200, 50, -1, FALSE, '`Paymentmode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Paymentmode->Sortable = TRUE; // Allow sort
		$this->fields['Paymentmode'] = &$this->Paymentmode;

		// Contactperson1
		$this->Contactperson1 = new DbField('store_suppliers', 'store_suppliers', 'x_Contactperson1', 'Contactperson1', '`Contactperson1`', '`Contactperson1`', 200, 100, -1, FALSE, '`Contactperson1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Contactperson1->Sortable = TRUE; // Allow sort
		$this->fields['Contactperson1'] = &$this->Contactperson1;

		// CP1Address1
		$this->CP1Address1 = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Address1', 'CP1Address1', '`CP1Address1`', '`CP1Address1`', 200, 255, -1, FALSE, '`CP1Address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Address1->Sortable = TRUE; // Allow sort
		$this->fields['CP1Address1'] = &$this->CP1Address1;

		// CP1Address2
		$this->CP1Address2 = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Address2', 'CP1Address2', '`CP1Address2`', '`CP1Address2`', 200, 250, -1, FALSE, '`CP1Address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Address2->Sortable = TRUE; // Allow sort
		$this->fields['CP1Address2'] = &$this->CP1Address2;

		// CP1Address3
		$this->CP1Address3 = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Address3', 'CP1Address3', '`CP1Address3`', '`CP1Address3`', 200, 250, -1, FALSE, '`CP1Address3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Address3->Sortable = TRUE; // Allow sort
		$this->fields['CP1Address3'] = &$this->CP1Address3;

		// CP1Citycode
		$this->CP1Citycode = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Citycode', 'CP1Citycode', '`CP1Citycode`', '`CP1Citycode`', 3, 11, -1, FALSE, '`CP1Citycode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Citycode->Sortable = TRUE; // Allow sort
		$this->CP1Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CP1Citycode'] = &$this->CP1Citycode;

		// CP1State
		$this->CP1State = new DbField('store_suppliers', 'store_suppliers', 'x_CP1State', 'CP1State', '`CP1State`', '`CP1State`', 200, 50, -1, FALSE, '`CP1State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1State->Sortable = TRUE; // Allow sort
		$this->fields['CP1State'] = &$this->CP1State;

		// CP1Pincode
		$this->CP1Pincode = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Pincode', 'CP1Pincode', '`CP1Pincode`', '`CP1Pincode`', 200, 15, -1, FALSE, '`CP1Pincode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Pincode->Sortable = TRUE; // Allow sort
		$this->fields['CP1Pincode'] = &$this->CP1Pincode;

		// CP1Designation
		$this->CP1Designation = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Designation', 'CP1Designation', '`CP1Designation`', '`CP1Designation`', 200, 50, -1, FALSE, '`CP1Designation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Designation->Sortable = TRUE; // Allow sort
		$this->fields['CP1Designation'] = &$this->CP1Designation;

		// CP1Phone
		$this->CP1Phone = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Phone', 'CP1Phone', '`CP1Phone`', '`CP1Phone`', 200, 50, -1, FALSE, '`CP1Phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Phone->Sortable = TRUE; // Allow sort
		$this->fields['CP1Phone'] = &$this->CP1Phone;

		// CP1MobileNo
		$this->CP1MobileNo = new DbField('store_suppliers', 'store_suppliers', 'x_CP1MobileNo', 'CP1MobileNo', '`CP1MobileNo`', '`CP1MobileNo`', 200, 50, -1, FALSE, '`CP1MobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1MobileNo->Sortable = TRUE; // Allow sort
		$this->fields['CP1MobileNo'] = &$this->CP1MobileNo;

		// CP1Fax
		$this->CP1Fax = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Fax', 'CP1Fax', '`CP1Fax`', '`CP1Fax`', 200, 50, -1, FALSE, '`CP1Fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Fax->Sortable = TRUE; // Allow sort
		$this->fields['CP1Fax'] = &$this->CP1Fax;

		// CP1Email
		$this->CP1Email = new DbField('store_suppliers', 'store_suppliers', 'x_CP1Email', 'CP1Email', '`CP1Email`', '`CP1Email`', 200, 50, -1, FALSE, '`CP1Email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP1Email->Sortable = TRUE; // Allow sort
		$this->fields['CP1Email'] = &$this->CP1Email;

		// Contactperson2
		$this->Contactperson2 = new DbField('store_suppliers', 'store_suppliers', 'x_Contactperson2', 'Contactperson2', '`Contactperson2`', '`Contactperson2`', 200, 100, -1, FALSE, '`Contactperson2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Contactperson2->Sortable = TRUE; // Allow sort
		$this->fields['Contactperson2'] = &$this->Contactperson2;

		// CP2Address1
		$this->CP2Address1 = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Address1', 'CP2Address1', '`CP2Address1`', '`CP2Address1`', 200, 255, -1, FALSE, '`CP2Address1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Address1->Sortable = TRUE; // Allow sort
		$this->fields['CP2Address1'] = &$this->CP2Address1;

		// CP2Address2
		$this->CP2Address2 = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Address2', 'CP2Address2', '`CP2Address2`', '`CP2Address2`', 200, 250, -1, FALSE, '`CP2Address2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Address2->Sortable = TRUE; // Allow sort
		$this->fields['CP2Address2'] = &$this->CP2Address2;

		// CP2Address3
		$this->CP2Address3 = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Address3', 'CP2Address3', '`CP2Address3`', '`CP2Address3`', 200, 250, -1, FALSE, '`CP2Address3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Address3->Sortable = TRUE; // Allow sort
		$this->fields['CP2Address3'] = &$this->CP2Address3;

		// CP2Citycode
		$this->CP2Citycode = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Citycode', 'CP2Citycode', '`CP2Citycode`', '`CP2Citycode`', 3, 11, -1, FALSE, '`CP2Citycode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Citycode->Sortable = TRUE; // Allow sort
		$this->CP2Citycode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['CP2Citycode'] = &$this->CP2Citycode;

		// CP2State
		$this->CP2State = new DbField('store_suppliers', 'store_suppliers', 'x_CP2State', 'CP2State', '`CP2State`', '`CP2State`', 200, 50, -1, FALSE, '`CP2State`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2State->Sortable = TRUE; // Allow sort
		$this->fields['CP2State'] = &$this->CP2State;

		// CP2Pincode
		$this->CP2Pincode = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Pincode', 'CP2Pincode', '`CP2Pincode`', '`CP2Pincode`', 200, 15, -1, FALSE, '`CP2Pincode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Pincode->Sortable = TRUE; // Allow sort
		$this->fields['CP2Pincode'] = &$this->CP2Pincode;

		// CP2Designation
		$this->CP2Designation = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Designation', 'CP2Designation', '`CP2Designation`', '`CP2Designation`', 200, 50, -1, FALSE, '`CP2Designation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Designation->Sortable = TRUE; // Allow sort
		$this->fields['CP2Designation'] = &$this->CP2Designation;

		// CP2Phone
		$this->CP2Phone = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Phone', 'CP2Phone', '`CP2Phone`', '`CP2Phone`', 200, 50, -1, FALSE, '`CP2Phone`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Phone->Sortable = TRUE; // Allow sort
		$this->fields['CP2Phone'] = &$this->CP2Phone;

		// CP2MobileNo
		$this->CP2MobileNo = new DbField('store_suppliers', 'store_suppliers', 'x_CP2MobileNo', 'CP2MobileNo', '`CP2MobileNo`', '`CP2MobileNo`', 200, 50, -1, FALSE, '`CP2MobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2MobileNo->Sortable = TRUE; // Allow sort
		$this->fields['CP2MobileNo'] = &$this->CP2MobileNo;

		// CP2Fax
		$this->CP2Fax = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Fax', 'CP2Fax', '`CP2Fax`', '`CP2Fax`', 200, 50, -1, FALSE, '`CP2Fax`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Fax->Sortable = TRUE; // Allow sort
		$this->fields['CP2Fax'] = &$this->CP2Fax;

		// CP2Email
		$this->CP2Email = new DbField('store_suppliers', 'store_suppliers', 'x_CP2Email', 'CP2Email', '`CP2Email`', '`CP2Email`', 200, 50, -1, FALSE, '`CP2Email`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CP2Email->Sortable = TRUE; // Allow sort
		$this->fields['CP2Email'] = &$this->CP2Email;

		// Type
		$this->Type = new DbField('store_suppliers', 'store_suppliers', 'x_Type', 'Type', '`Type`', '`Type`', 200, 50, -1, FALSE, '`Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Type->Sortable = TRUE; // Allow sort
		$this->fields['Type'] = &$this->Type;

		// Creditterms
		$this->Creditterms = new DbField('store_suppliers', 'store_suppliers', 'x_Creditterms', 'Creditterms', '`Creditterms`', '`Creditterms`', 200, 120, -1, FALSE, '`Creditterms`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Creditterms->Sortable = TRUE; // Allow sort
		$this->fields['Creditterms'] = &$this->Creditterms;

		// Remarks
		$this->Remarks = new DbField('store_suppliers', 'store_suppliers', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 120, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// Tinnumber
		$this->Tinnumber = new DbField('store_suppliers', 'store_suppliers', 'x_Tinnumber', 'Tinnumber', '`Tinnumber`', '`Tinnumber`', 200, 50, -1, FALSE, '`Tinnumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tinnumber->Sortable = TRUE; // Allow sort
		$this->fields['Tinnumber'] = &$this->Tinnumber;

		// Universalsuppliercode
		$this->Universalsuppliercode = new DbField('store_suppliers', 'store_suppliers', 'x_Universalsuppliercode', 'Universalsuppliercode', '`Universalsuppliercode`', '`Universalsuppliercode`', 200, 50, -1, FALSE, '`Universalsuppliercode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Universalsuppliercode->Sortable = TRUE; // Allow sort
		$this->fields['Universalsuppliercode'] = &$this->Universalsuppliercode;

		// Mobilenumber
		$this->Mobilenumber = new DbField('store_suppliers', 'store_suppliers', 'x_Mobilenumber', 'Mobilenumber', '`Mobilenumber`', '`Mobilenumber`', 200, 50, -1, FALSE, '`Mobilenumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Mobilenumber->Sortable = TRUE; // Allow sort
		$this->fields['Mobilenumber'] = &$this->Mobilenumber;

		// PANNumber
		$this->PANNumber = new DbField('store_suppliers', 'store_suppliers', 'x_PANNumber', 'PANNumber', '`PANNumber`', '`PANNumber`', 200, 50, -1, FALSE, '`PANNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PANNumber->Sortable = TRUE; // Allow sort
		$this->fields['PANNumber'] = &$this->PANNumber;

		// SalesRepMobileNo
		$this->SalesRepMobileNo = new DbField('store_suppliers', 'store_suppliers', 'x_SalesRepMobileNo', 'SalesRepMobileNo', '`SalesRepMobileNo`', '`SalesRepMobileNo`', 200, 50, -1, FALSE, '`SalesRepMobileNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SalesRepMobileNo->Sortable = TRUE; // Allow sort
		$this->fields['SalesRepMobileNo'] = &$this->SalesRepMobileNo;

		// GSTNumber
		$this->GSTNumber = new DbField('store_suppliers', 'store_suppliers', 'x_GSTNumber', 'GSTNumber', '`GSTNumber`', '`GSTNumber`', 200, 15, -1, FALSE, '`GSTNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GSTNumber->Sortable = TRUE; // Allow sort
		$this->fields['GSTNumber'] = &$this->GSTNumber;

		// TANNumber
		$this->TANNumber = new DbField('store_suppliers', 'store_suppliers', 'x_TANNumber', 'TANNumber', '`TANNumber`', '`TANNumber`', 200, 10, -1, FALSE, '`TANNumber`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TANNumber->Sortable = TRUE; // Allow sort
		$this->fields['TANNumber'] = &$this->TANNumber;

		// id
		$this->id = new DbField('store_suppliers', 'store_suppliers', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`store_suppliers`";
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
			return "store_supplierslist.php";
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
		if ($pageName == "store_suppliersview.php")
			return $Language->phrase("View");
		elseif ($pageName == "store_suppliersedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "store_suppliersadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "store_supplierslist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("store_suppliersview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("store_suppliersview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "store_suppliersadd.php?" . $this->getUrlParm($parm);
		else
			$url = "store_suppliersadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("store_suppliersedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("store_suppliersadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("store_suppliersdelete.php", $this->getUrlParm());
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
		$this->Suppliercode->setDbValue($rs->fields('Suppliercode'));
		$this->Suppliername->setDbValue($rs->fields('Suppliername'));
		$this->Abbreviation->setDbValue($rs->fields('Abbreviation'));
		$this->Creationdate->setDbValue($rs->fields('Creationdate'));
		$this->Address1->setDbValue($rs->fields('Address1'));
		$this->Address2->setDbValue($rs->fields('Address2'));
		$this->Address3->setDbValue($rs->fields('Address3'));
		$this->Citycode->setDbValue($rs->fields('Citycode'));
		$this->State->setDbValue($rs->fields('State'));
		$this->Pincode->setDbValue($rs->fields('Pincode'));
		$this->Tngstnumber->setDbValue($rs->fields('Tngstnumber'));
		$this->Phone->setDbValue($rs->fields('Phone'));
		$this->Fax->setDbValue($rs->fields('Fax'));
		$this->_Email->setDbValue($rs->fields('Email'));
		$this->Paymentmode->setDbValue($rs->fields('Paymentmode'));
		$this->Contactperson1->setDbValue($rs->fields('Contactperson1'));
		$this->CP1Address1->setDbValue($rs->fields('CP1Address1'));
		$this->CP1Address2->setDbValue($rs->fields('CP1Address2'));
		$this->CP1Address3->setDbValue($rs->fields('CP1Address3'));
		$this->CP1Citycode->setDbValue($rs->fields('CP1Citycode'));
		$this->CP1State->setDbValue($rs->fields('CP1State'));
		$this->CP1Pincode->setDbValue($rs->fields('CP1Pincode'));
		$this->CP1Designation->setDbValue($rs->fields('CP1Designation'));
		$this->CP1Phone->setDbValue($rs->fields('CP1Phone'));
		$this->CP1MobileNo->setDbValue($rs->fields('CP1MobileNo'));
		$this->CP1Fax->setDbValue($rs->fields('CP1Fax'));
		$this->CP1Email->setDbValue($rs->fields('CP1Email'));
		$this->Contactperson2->setDbValue($rs->fields('Contactperson2'));
		$this->CP2Address1->setDbValue($rs->fields('CP2Address1'));
		$this->CP2Address2->setDbValue($rs->fields('CP2Address2'));
		$this->CP2Address3->setDbValue($rs->fields('CP2Address3'));
		$this->CP2Citycode->setDbValue($rs->fields('CP2Citycode'));
		$this->CP2State->setDbValue($rs->fields('CP2State'));
		$this->CP2Pincode->setDbValue($rs->fields('CP2Pincode'));
		$this->CP2Designation->setDbValue($rs->fields('CP2Designation'));
		$this->CP2Phone->setDbValue($rs->fields('CP2Phone'));
		$this->CP2MobileNo->setDbValue($rs->fields('CP2MobileNo'));
		$this->CP2Fax->setDbValue($rs->fields('CP2Fax'));
		$this->CP2Email->setDbValue($rs->fields('CP2Email'));
		$this->Type->setDbValue($rs->fields('Type'));
		$this->Creditterms->setDbValue($rs->fields('Creditterms'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->Tinnumber->setDbValue($rs->fields('Tinnumber'));
		$this->Universalsuppliercode->setDbValue($rs->fields('Universalsuppliercode'));
		$this->Mobilenumber->setDbValue($rs->fields('Mobilenumber'));
		$this->PANNumber->setDbValue($rs->fields('PANNumber'));
		$this->SalesRepMobileNo->setDbValue($rs->fields('SalesRepMobileNo'));
		$this->GSTNumber->setDbValue($rs->fields('GSTNumber'));
		$this->TANNumber->setDbValue($rs->fields('TANNumber'));
		$this->id->setDbValue($rs->fields('id'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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

		// Suppliercode
		$this->Suppliercode->EditAttrs["class"] = "form-control";
		$this->Suppliercode->EditCustomAttributes = "";
		if (!$this->Suppliercode->Raw)
			$this->Suppliercode->CurrentValue = HtmlDecode($this->Suppliercode->CurrentValue);
		$this->Suppliercode->EditValue = $this->Suppliercode->CurrentValue;
		$this->Suppliercode->PlaceHolder = RemoveHtml($this->Suppliercode->caption());

		// Suppliername
		$this->Suppliername->EditAttrs["class"] = "form-control";
		$this->Suppliername->EditCustomAttributes = "";
		if (!$this->Suppliername->Raw)
			$this->Suppliername->CurrentValue = HtmlDecode($this->Suppliername->CurrentValue);
		$this->Suppliername->EditValue = $this->Suppliername->CurrentValue;
		$this->Suppliername->PlaceHolder = RemoveHtml($this->Suppliername->caption());

		// Abbreviation
		$this->Abbreviation->EditAttrs["class"] = "form-control";
		$this->Abbreviation->EditCustomAttributes = "";
		if (!$this->Abbreviation->Raw)
			$this->Abbreviation->CurrentValue = HtmlDecode($this->Abbreviation->CurrentValue);
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
		if (!$this->Address1->Raw)
			$this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
		$this->Address1->EditValue = $this->Address1->CurrentValue;
		$this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

		// Address2
		$this->Address2->EditAttrs["class"] = "form-control";
		$this->Address2->EditCustomAttributes = "";
		if (!$this->Address2->Raw)
			$this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
		$this->Address2->EditValue = $this->Address2->CurrentValue;
		$this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

		// Address3
		$this->Address3->EditAttrs["class"] = "form-control";
		$this->Address3->EditCustomAttributes = "";
		if (!$this->Address3->Raw)
			$this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
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
		if (!$this->State->Raw)
			$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
		$this->State->EditValue = $this->State->CurrentValue;
		$this->State->PlaceHolder = RemoveHtml($this->State->caption());

		// Pincode
		$this->Pincode->EditAttrs["class"] = "form-control";
		$this->Pincode->EditCustomAttributes = "";
		if (!$this->Pincode->Raw)
			$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
		$this->Pincode->EditValue = $this->Pincode->CurrentValue;
		$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

		// Tngstnumber
		$this->Tngstnumber->EditAttrs["class"] = "form-control";
		$this->Tngstnumber->EditCustomAttributes = "";
		if (!$this->Tngstnumber->Raw)
			$this->Tngstnumber->CurrentValue = HtmlDecode($this->Tngstnumber->CurrentValue);
		$this->Tngstnumber->EditValue = $this->Tngstnumber->CurrentValue;
		$this->Tngstnumber->PlaceHolder = RemoveHtml($this->Tngstnumber->caption());

		// Phone
		$this->Phone->EditAttrs["class"] = "form-control";
		$this->Phone->EditCustomAttributes = "";
		if (!$this->Phone->Raw)
			$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
		$this->Phone->EditValue = $this->Phone->CurrentValue;
		$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

		// Fax
		$this->Fax->EditAttrs["class"] = "form-control";
		$this->Fax->EditCustomAttributes = "";
		if (!$this->Fax->Raw)
			$this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
		$this->Fax->EditValue = $this->Fax->CurrentValue;
		$this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

		// Email
		$this->_Email->EditAttrs["class"] = "form-control";
		$this->_Email->EditCustomAttributes = "";
		if (!$this->_Email->Raw)
			$this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
		$this->_Email->EditValue = $this->_Email->CurrentValue;
		$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

		// Paymentmode
		$this->Paymentmode->EditAttrs["class"] = "form-control";
		$this->Paymentmode->EditCustomAttributes = "";
		if (!$this->Paymentmode->Raw)
			$this->Paymentmode->CurrentValue = HtmlDecode($this->Paymentmode->CurrentValue);
		$this->Paymentmode->EditValue = $this->Paymentmode->CurrentValue;
		$this->Paymentmode->PlaceHolder = RemoveHtml($this->Paymentmode->caption());

		// Contactperson1
		$this->Contactperson1->EditAttrs["class"] = "form-control";
		$this->Contactperson1->EditCustomAttributes = "";
		if (!$this->Contactperson1->Raw)
			$this->Contactperson1->CurrentValue = HtmlDecode($this->Contactperson1->CurrentValue);
		$this->Contactperson1->EditValue = $this->Contactperson1->CurrentValue;
		$this->Contactperson1->PlaceHolder = RemoveHtml($this->Contactperson1->caption());

		// CP1Address1
		$this->CP1Address1->EditAttrs["class"] = "form-control";
		$this->CP1Address1->EditCustomAttributes = "";
		if (!$this->CP1Address1->Raw)
			$this->CP1Address1->CurrentValue = HtmlDecode($this->CP1Address1->CurrentValue);
		$this->CP1Address1->EditValue = $this->CP1Address1->CurrentValue;
		$this->CP1Address1->PlaceHolder = RemoveHtml($this->CP1Address1->caption());

		// CP1Address2
		$this->CP1Address2->EditAttrs["class"] = "form-control";
		$this->CP1Address2->EditCustomAttributes = "";
		if (!$this->CP1Address2->Raw)
			$this->CP1Address2->CurrentValue = HtmlDecode($this->CP1Address2->CurrentValue);
		$this->CP1Address2->EditValue = $this->CP1Address2->CurrentValue;
		$this->CP1Address2->PlaceHolder = RemoveHtml($this->CP1Address2->caption());

		// CP1Address3
		$this->CP1Address3->EditAttrs["class"] = "form-control";
		$this->CP1Address3->EditCustomAttributes = "";
		if (!$this->CP1Address3->Raw)
			$this->CP1Address3->CurrentValue = HtmlDecode($this->CP1Address3->CurrentValue);
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
		if (!$this->CP1State->Raw)
			$this->CP1State->CurrentValue = HtmlDecode($this->CP1State->CurrentValue);
		$this->CP1State->EditValue = $this->CP1State->CurrentValue;
		$this->CP1State->PlaceHolder = RemoveHtml($this->CP1State->caption());

		// CP1Pincode
		$this->CP1Pincode->EditAttrs["class"] = "form-control";
		$this->CP1Pincode->EditCustomAttributes = "";
		if (!$this->CP1Pincode->Raw)
			$this->CP1Pincode->CurrentValue = HtmlDecode($this->CP1Pincode->CurrentValue);
		$this->CP1Pincode->EditValue = $this->CP1Pincode->CurrentValue;
		$this->CP1Pincode->PlaceHolder = RemoveHtml($this->CP1Pincode->caption());

		// CP1Designation
		$this->CP1Designation->EditAttrs["class"] = "form-control";
		$this->CP1Designation->EditCustomAttributes = "";
		if (!$this->CP1Designation->Raw)
			$this->CP1Designation->CurrentValue = HtmlDecode($this->CP1Designation->CurrentValue);
		$this->CP1Designation->EditValue = $this->CP1Designation->CurrentValue;
		$this->CP1Designation->PlaceHolder = RemoveHtml($this->CP1Designation->caption());

		// CP1Phone
		$this->CP1Phone->EditAttrs["class"] = "form-control";
		$this->CP1Phone->EditCustomAttributes = "";
		if (!$this->CP1Phone->Raw)
			$this->CP1Phone->CurrentValue = HtmlDecode($this->CP1Phone->CurrentValue);
		$this->CP1Phone->EditValue = $this->CP1Phone->CurrentValue;
		$this->CP1Phone->PlaceHolder = RemoveHtml($this->CP1Phone->caption());

		// CP1MobileNo
		$this->CP1MobileNo->EditAttrs["class"] = "form-control";
		$this->CP1MobileNo->EditCustomAttributes = "";
		if (!$this->CP1MobileNo->Raw)
			$this->CP1MobileNo->CurrentValue = HtmlDecode($this->CP1MobileNo->CurrentValue);
		$this->CP1MobileNo->EditValue = $this->CP1MobileNo->CurrentValue;
		$this->CP1MobileNo->PlaceHolder = RemoveHtml($this->CP1MobileNo->caption());

		// CP1Fax
		$this->CP1Fax->EditAttrs["class"] = "form-control";
		$this->CP1Fax->EditCustomAttributes = "";
		if (!$this->CP1Fax->Raw)
			$this->CP1Fax->CurrentValue = HtmlDecode($this->CP1Fax->CurrentValue);
		$this->CP1Fax->EditValue = $this->CP1Fax->CurrentValue;
		$this->CP1Fax->PlaceHolder = RemoveHtml($this->CP1Fax->caption());

		// CP1Email
		$this->CP1Email->EditAttrs["class"] = "form-control";
		$this->CP1Email->EditCustomAttributes = "";
		if (!$this->CP1Email->Raw)
			$this->CP1Email->CurrentValue = HtmlDecode($this->CP1Email->CurrentValue);
		$this->CP1Email->EditValue = $this->CP1Email->CurrentValue;
		$this->CP1Email->PlaceHolder = RemoveHtml($this->CP1Email->caption());

		// Contactperson2
		$this->Contactperson2->EditAttrs["class"] = "form-control";
		$this->Contactperson2->EditCustomAttributes = "";
		if (!$this->Contactperson2->Raw)
			$this->Contactperson2->CurrentValue = HtmlDecode($this->Contactperson2->CurrentValue);
		$this->Contactperson2->EditValue = $this->Contactperson2->CurrentValue;
		$this->Contactperson2->PlaceHolder = RemoveHtml($this->Contactperson2->caption());

		// CP2Address1
		$this->CP2Address1->EditAttrs["class"] = "form-control";
		$this->CP2Address1->EditCustomAttributes = "";
		if (!$this->CP2Address1->Raw)
			$this->CP2Address1->CurrentValue = HtmlDecode($this->CP2Address1->CurrentValue);
		$this->CP2Address1->EditValue = $this->CP2Address1->CurrentValue;
		$this->CP2Address1->PlaceHolder = RemoveHtml($this->CP2Address1->caption());

		// CP2Address2
		$this->CP2Address2->EditAttrs["class"] = "form-control";
		$this->CP2Address2->EditCustomAttributes = "";
		if (!$this->CP2Address2->Raw)
			$this->CP2Address2->CurrentValue = HtmlDecode($this->CP2Address2->CurrentValue);
		$this->CP2Address2->EditValue = $this->CP2Address2->CurrentValue;
		$this->CP2Address2->PlaceHolder = RemoveHtml($this->CP2Address2->caption());

		// CP2Address3
		$this->CP2Address3->EditAttrs["class"] = "form-control";
		$this->CP2Address3->EditCustomAttributes = "";
		if (!$this->CP2Address3->Raw)
			$this->CP2Address3->CurrentValue = HtmlDecode($this->CP2Address3->CurrentValue);
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
		if (!$this->CP2State->Raw)
			$this->CP2State->CurrentValue = HtmlDecode($this->CP2State->CurrentValue);
		$this->CP2State->EditValue = $this->CP2State->CurrentValue;
		$this->CP2State->PlaceHolder = RemoveHtml($this->CP2State->caption());

		// CP2Pincode
		$this->CP2Pincode->EditAttrs["class"] = "form-control";
		$this->CP2Pincode->EditCustomAttributes = "";
		if (!$this->CP2Pincode->Raw)
			$this->CP2Pincode->CurrentValue = HtmlDecode($this->CP2Pincode->CurrentValue);
		$this->CP2Pincode->EditValue = $this->CP2Pincode->CurrentValue;
		$this->CP2Pincode->PlaceHolder = RemoveHtml($this->CP2Pincode->caption());

		// CP2Designation
		$this->CP2Designation->EditAttrs["class"] = "form-control";
		$this->CP2Designation->EditCustomAttributes = "";
		if (!$this->CP2Designation->Raw)
			$this->CP2Designation->CurrentValue = HtmlDecode($this->CP2Designation->CurrentValue);
		$this->CP2Designation->EditValue = $this->CP2Designation->CurrentValue;
		$this->CP2Designation->PlaceHolder = RemoveHtml($this->CP2Designation->caption());

		// CP2Phone
		$this->CP2Phone->EditAttrs["class"] = "form-control";
		$this->CP2Phone->EditCustomAttributes = "";
		if (!$this->CP2Phone->Raw)
			$this->CP2Phone->CurrentValue = HtmlDecode($this->CP2Phone->CurrentValue);
		$this->CP2Phone->EditValue = $this->CP2Phone->CurrentValue;
		$this->CP2Phone->PlaceHolder = RemoveHtml($this->CP2Phone->caption());

		// CP2MobileNo
		$this->CP2MobileNo->EditAttrs["class"] = "form-control";
		$this->CP2MobileNo->EditCustomAttributes = "";
		if (!$this->CP2MobileNo->Raw)
			$this->CP2MobileNo->CurrentValue = HtmlDecode($this->CP2MobileNo->CurrentValue);
		$this->CP2MobileNo->EditValue = $this->CP2MobileNo->CurrentValue;
		$this->CP2MobileNo->PlaceHolder = RemoveHtml($this->CP2MobileNo->caption());

		// CP2Fax
		$this->CP2Fax->EditAttrs["class"] = "form-control";
		$this->CP2Fax->EditCustomAttributes = "";
		if (!$this->CP2Fax->Raw)
			$this->CP2Fax->CurrentValue = HtmlDecode($this->CP2Fax->CurrentValue);
		$this->CP2Fax->EditValue = $this->CP2Fax->CurrentValue;
		$this->CP2Fax->PlaceHolder = RemoveHtml($this->CP2Fax->caption());

		// CP2Email
		$this->CP2Email->EditAttrs["class"] = "form-control";
		$this->CP2Email->EditCustomAttributes = "";
		if (!$this->CP2Email->Raw)
			$this->CP2Email->CurrentValue = HtmlDecode($this->CP2Email->CurrentValue);
		$this->CP2Email->EditValue = $this->CP2Email->CurrentValue;
		$this->CP2Email->PlaceHolder = RemoveHtml($this->CP2Email->caption());

		// Type
		$this->Type->EditAttrs["class"] = "form-control";
		$this->Type->EditCustomAttributes = "";
		if (!$this->Type->Raw)
			$this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
		$this->Type->EditValue = $this->Type->CurrentValue;
		$this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

		// Creditterms
		$this->Creditterms->EditAttrs["class"] = "form-control";
		$this->Creditterms->EditCustomAttributes = "";
		if (!$this->Creditterms->Raw)
			$this->Creditterms->CurrentValue = HtmlDecode($this->Creditterms->CurrentValue);
		$this->Creditterms->EditValue = $this->Creditterms->CurrentValue;
		$this->Creditterms->PlaceHolder = RemoveHtml($this->Creditterms->caption());

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		if (!$this->Remarks->Raw)
			$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// Tinnumber
		$this->Tinnumber->EditAttrs["class"] = "form-control";
		$this->Tinnumber->EditCustomAttributes = "";
		if (!$this->Tinnumber->Raw)
			$this->Tinnumber->CurrentValue = HtmlDecode($this->Tinnumber->CurrentValue);
		$this->Tinnumber->EditValue = $this->Tinnumber->CurrentValue;
		$this->Tinnumber->PlaceHolder = RemoveHtml($this->Tinnumber->caption());

		// Universalsuppliercode
		$this->Universalsuppliercode->EditAttrs["class"] = "form-control";
		$this->Universalsuppliercode->EditCustomAttributes = "";
		if (!$this->Universalsuppliercode->Raw)
			$this->Universalsuppliercode->CurrentValue = HtmlDecode($this->Universalsuppliercode->CurrentValue);
		$this->Universalsuppliercode->EditValue = $this->Universalsuppliercode->CurrentValue;
		$this->Universalsuppliercode->PlaceHolder = RemoveHtml($this->Universalsuppliercode->caption());

		// Mobilenumber
		$this->Mobilenumber->EditAttrs["class"] = "form-control";
		$this->Mobilenumber->EditCustomAttributes = "";
		if (!$this->Mobilenumber->Raw)
			$this->Mobilenumber->CurrentValue = HtmlDecode($this->Mobilenumber->CurrentValue);
		$this->Mobilenumber->EditValue = $this->Mobilenumber->CurrentValue;
		$this->Mobilenumber->PlaceHolder = RemoveHtml($this->Mobilenumber->caption());

		// PANNumber
		$this->PANNumber->EditAttrs["class"] = "form-control";
		$this->PANNumber->EditCustomAttributes = "";
		if (!$this->PANNumber->Raw)
			$this->PANNumber->CurrentValue = HtmlDecode($this->PANNumber->CurrentValue);
		$this->PANNumber->EditValue = $this->PANNumber->CurrentValue;
		$this->PANNumber->PlaceHolder = RemoveHtml($this->PANNumber->caption());

		// SalesRepMobileNo
		$this->SalesRepMobileNo->EditAttrs["class"] = "form-control";
		$this->SalesRepMobileNo->EditCustomAttributes = "";
		if (!$this->SalesRepMobileNo->Raw)
			$this->SalesRepMobileNo->CurrentValue = HtmlDecode($this->SalesRepMobileNo->CurrentValue);
		$this->SalesRepMobileNo->EditValue = $this->SalesRepMobileNo->CurrentValue;
		$this->SalesRepMobileNo->PlaceHolder = RemoveHtml($this->SalesRepMobileNo->caption());

		// GSTNumber
		$this->GSTNumber->EditAttrs["class"] = "form-control";
		$this->GSTNumber->EditCustomAttributes = "";
		if (!$this->GSTNumber->Raw)
			$this->GSTNumber->CurrentValue = HtmlDecode($this->GSTNumber->CurrentValue);
		$this->GSTNumber->EditValue = $this->GSTNumber->CurrentValue;
		$this->GSTNumber->PlaceHolder = RemoveHtml($this->GSTNumber->caption());

		// TANNumber
		$this->TANNumber->EditAttrs["class"] = "form-control";
		$this->TANNumber->EditCustomAttributes = "";
		if (!$this->TANNumber->Raw)
			$this->TANNumber->CurrentValue = HtmlDecode($this->TANNumber->CurrentValue);
		$this->TANNumber->EditValue = $this->TANNumber->CurrentValue;
		$this->TANNumber->PlaceHolder = RemoveHtml($this->TANNumber->caption());

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

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