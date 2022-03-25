<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for view_lab_profile
 */
class view_lab_profile extends DbTable
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_lab_profile';
		$this->TableName = 'view_lab_profile';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_lab_profile`";
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

		// Id
		$this->Id = new DbField('view_lab_profile', 'view_lab_profile', 'x_Id', 'Id', '`Id`', '`Id`', 3, -1, FALSE, '`Id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->Id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->Id->IsPrimaryKey = TRUE; // Primary key field
		$this->Id->Sortable = TRUE; // Allow sort
		$this->Id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Id'] = &$this->Id;

		// CODE
		$this->CODE = new DbField('view_lab_profile', 'view_lab_profile', 'x_CODE', 'CODE', '`CODE`', '`CODE`', 200, -1, FALSE, '`CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CODE->IsForeignKey = TRUE; // Foreign key field
		$this->CODE->Required = TRUE; // Required field
		$this->CODE->Sortable = TRUE; // Allow sort
		$this->fields['CODE'] = &$this->CODE;

		// SERVICE
		$this->SERVICE = new DbField('view_lab_profile', 'view_lab_profile', 'x_SERVICE', 'SERVICE', '`SERVICE`', '`SERVICE`', 200, -1, FALSE, '`SERVICE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SERVICE->Required = TRUE; // Required field
		$this->SERVICE->Sortable = TRUE; // Allow sort
		$this->fields['SERVICE'] = &$this->SERVICE;

		// UNITS
		$this->UNITS = new DbField('view_lab_profile', 'view_lab_profile', 'x_UNITS', 'UNITS', '`UNITS`', '`UNITS`', 3, -1, FALSE, '`UNITS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UNITS->Sortable = TRUE; // Allow sort
		$this->UNITS->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['UNITS'] = &$this->UNITS;

		// AMOUNT
		$this->AMOUNT = new DbField('view_lab_profile', 'view_lab_profile', 'x_AMOUNT', 'AMOUNT', '`AMOUNT`', '`AMOUNT`', 5, -1, FALSE, '`AMOUNT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AMOUNT->Required = TRUE; // Required field
		$this->AMOUNT->Sortable = TRUE; // Allow sort
		$this->fields['AMOUNT'] = &$this->AMOUNT;

		// SERVICE_TYPE
		$this->SERVICE_TYPE = new DbField('view_lab_profile', 'view_lab_profile', 'x_SERVICE_TYPE', 'SERVICE_TYPE', '`SERVICE_TYPE`', '`SERVICE_TYPE`', 200, -1, FALSE, '`SERVICE_TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->SERVICE_TYPE->Required = TRUE; // Required field
		$this->SERVICE_TYPE->Sortable = TRUE; // Allow sort
		$this->SERVICE_TYPE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->SERVICE_TYPE->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->SERVICE_TYPE->Lookup = new Lookup('SERVICE_TYPE', 'mas_services_type', FALSE, 'name', ["name","","",""], [], [], [], [], [], [], '', '');
		$this->fields['SERVICE_TYPE'] = &$this->SERVICE_TYPE;

		// DEPARTMENT
		$this->DEPARTMENT = new DbField('view_lab_profile', 'view_lab_profile', 'x_DEPARTMENT', 'DEPARTMENT', '`DEPARTMENT`', '`DEPARTMENT`', 200, -1, FALSE, '`DEPARTMENT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DEPARTMENT->Required = TRUE; // Required field
		$this->DEPARTMENT->Sortable = TRUE; // Allow sort
		$this->DEPARTMENT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DEPARTMENT->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->DEPARTMENT->Lookup = new Lookup('DEPARTMENT', 'mas_billing_department', FALSE, 'department', ["department","","",""], [], [], [], [], [], [], '', '');
		$this->fields['DEPARTMENT'] = &$this->DEPARTMENT;

		// Created
		$this->Created = new DbField('view_lab_profile', 'view_lab_profile', 'x_Created', 'Created', '`Created`', '`Created`', 200, -1, FALSE, '`Created`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Created->Sortable = FALSE; // Allow sort
		$this->fields['Created'] = &$this->Created;

		// CreatedDateTime
		$this->CreatedDateTime = new DbField('view_lab_profile', 'view_lab_profile', 'x_CreatedDateTime', 'CreatedDateTime', '`CreatedDateTime`', CastDateFieldForLike('`CreatedDateTime`', 0, "DB"), 135, 0, FALSE, '`CreatedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CreatedDateTime->Sortable = FALSE; // Allow sort
		$this->CreatedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['CreatedDateTime'] = &$this->CreatedDateTime;

		// Modified
		$this->Modified = new DbField('view_lab_profile', 'view_lab_profile', 'x_Modified', 'Modified', '`Modified`', '`Modified`', 200, -1, FALSE, '`Modified`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Modified->Sortable = FALSE; // Allow sort
		$this->fields['Modified'] = &$this->Modified;

		// ModifiedDateTime
		$this->ModifiedDateTime = new DbField('view_lab_profile', 'view_lab_profile', 'x_ModifiedDateTime', 'ModifiedDateTime', '`ModifiedDateTime`', CastDateFieldForLike('`ModifiedDateTime`', 0, "DB"), 135, 0, FALSE, '`ModifiedDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ModifiedDateTime->Sortable = FALSE; // Allow sort
		$this->ModifiedDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ModifiedDateTime'] = &$this->ModifiedDateTime;

		// mas_services_billingcol
		$this->mas_services_billingcol = new DbField('view_lab_profile', 'view_lab_profile', 'x_mas_services_billingcol', 'mas_services_billingcol', '`mas_services_billingcol`', '`mas_services_billingcol`', 200, -1, FALSE, '`mas_services_billingcol`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mas_services_billingcol->Sortable = TRUE; // Allow sort
		$this->fields['mas_services_billingcol'] = &$this->mas_services_billingcol;

		// DrShareAmount
		$this->DrShareAmount = new DbField('view_lab_profile', 'view_lab_profile', 'x_DrShareAmount', 'DrShareAmount', '`DrShareAmount`', '`DrShareAmount`', 5, -1, FALSE, '`DrShareAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrShareAmount->Sortable = TRUE; // Allow sort
		$this->DrShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['DrShareAmount'] = &$this->DrShareAmount;

		// HospShareAmount
		$this->HospShareAmount = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospShareAmount', 'HospShareAmount', '`HospShareAmount`', '`HospShareAmount`', 5, -1, FALSE, '`HospShareAmount`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospShareAmount->Sortable = TRUE; // Allow sort
		$this->HospShareAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['HospShareAmount'] = &$this->HospShareAmount;

		// DrSharePer
		$this->DrSharePer = new DbField('view_lab_profile', 'view_lab_profile', 'x_DrSharePer', 'DrSharePer', '`DrSharePer`', '`DrSharePer`', 3, -1, FALSE, '`DrSharePer`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DrSharePer->Sortable = TRUE; // Allow sort
		$this->DrSharePer->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DrSharePer'] = &$this->DrSharePer;

		// HospSharePer
		$this->HospSharePer = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospSharePer', 'HospSharePer', '`HospSharePer`', '`HospSharePer`', 3, -1, FALSE, '`HospSharePer`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospSharePer->Sortable = TRUE; // Allow sort
		$this->HospSharePer->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospSharePer'] = &$this->HospSharePer;

		// HospID
		$this->HospID = new DbField('view_lab_profile', 'view_lab_profile', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, -1, FALSE, '`HospID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HospID->Sortable = TRUE; // Allow sort
		$this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HospID'] = &$this->HospID;

		// TestSubCd
		$this->TestSubCd = new DbField('view_lab_profile', 'view_lab_profile', 'x_TestSubCd', 'TestSubCd', '`TestSubCd`', '`TestSubCd`', 200, -1, FALSE, '`TestSubCd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TestSubCd->Sortable = TRUE; // Allow sort
		$this->fields['TestSubCd'] = &$this->TestSubCd;

		// Method
		$this->Method = new DbField('view_lab_profile', 'view_lab_profile', 'x_Method', 'Method', '`Method`', '`Method`', 200, -1, FALSE, '`Method`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Method->Sortable = TRUE; // Allow sort
		$this->fields['Method'] = &$this->Method;

		// Order
		$this->Order = new DbField('view_lab_profile', 'view_lab_profile', 'x_Order', 'Order', '`Order`', '`Order`', 131, -1, FALSE, '`Order`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Order->Sortable = TRUE; // Allow sort
		$this->Order->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Order'] = &$this->Order;

		// Form
		$this->Form = new DbField('view_lab_profile', 'view_lab_profile', 'x_Form', 'Form', '`Form`', '`Form`', 201, -1, FALSE, '`Form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Form->Sortable = TRUE; // Allow sort
		$this->fields['Form'] = &$this->Form;

		// ResType
		$this->ResType = new DbField('view_lab_profile', 'view_lab_profile', 'x_ResType', 'ResType', '`ResType`', '`ResType`', 200, -1, FALSE, '`ResType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResType->Sortable = TRUE; // Allow sort
		$this->fields['ResType'] = &$this->ResType;

		// UnitCD
		$this->UnitCD = new DbField('view_lab_profile', 'view_lab_profile', 'x_UnitCD', 'UnitCD', '`UnitCD`', '`UnitCD`', 200, -1, FALSE, '`UnitCD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UnitCD->Sortable = TRUE; // Allow sort
		$this->fields['UnitCD'] = &$this->UnitCD;

		// RefValue
		$this->RefValue = new DbField('view_lab_profile', 'view_lab_profile', 'x_RefValue', 'RefValue', '`RefValue`', '`RefValue`', 201, -1, FALSE, '`RefValue`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RefValue->Sortable = TRUE; // Allow sort
		$this->fields['RefValue'] = &$this->RefValue;

		// Sample
		$this->Sample = new DbField('view_lab_profile', 'view_lab_profile', 'x_Sample', 'Sample', '`Sample`', '`Sample`', 200, -1, FALSE, '`Sample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sample->Sortable = TRUE; // Allow sort
		$this->fields['Sample'] = &$this->Sample;

		// NoD
		$this->NoD = new DbField('view_lab_profile', 'view_lab_profile', 'x_NoD', 'NoD', '`NoD`', '`NoD`', 131, -1, FALSE, '`NoD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoD->Sortable = TRUE; // Allow sort
		$this->NoD->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NoD'] = &$this->NoD;

		// BillOrder
		$this->BillOrder = new DbField('view_lab_profile', 'view_lab_profile', 'x_BillOrder', 'BillOrder', '`BillOrder`', '`BillOrder`', 131, -1, FALSE, '`BillOrder`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BillOrder->Sortable = TRUE; // Allow sort
		$this->BillOrder->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['BillOrder'] = &$this->BillOrder;

		// Formula
		$this->Formula = new DbField('view_lab_profile', 'view_lab_profile', 'x_Formula', 'Formula', '`Formula`', '`Formula`', 201, -1, FALSE, '`Formula`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Formula->Sortable = TRUE; // Allow sort
		$this->fields['Formula'] = &$this->Formula;

		// Inactive
		$this->Inactive = new DbField('view_lab_profile', 'view_lab_profile', 'x_Inactive', 'Inactive', '`Inactive`', '`Inactive`', 200, -1, FALSE, '`Inactive`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Inactive->Sortable = TRUE; // Allow sort
		$this->fields['Inactive'] = &$this->Inactive;

		// Outsource
		$this->Outsource = new DbField('view_lab_profile', 'view_lab_profile', 'x_Outsource', 'Outsource', '`Outsource`', '`Outsource`', 200, -1, FALSE, '`Outsource`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Outsource->Sortable = TRUE; // Allow sort
		$this->fields['Outsource'] = &$this->Outsource;

		// CollSample
		$this->CollSample = new DbField('view_lab_profile', 'view_lab_profile', 'x_CollSample', 'CollSample', '`CollSample`', '`CollSample`', 200, -1, FALSE, '`CollSample`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CollSample->Sortable = TRUE; // Allow sort
		$this->fields['CollSample'] = &$this->CollSample;

		// TestType
		$this->TestType = new DbField('view_lab_profile', 'view_lab_profile', 'x_TestType', 'TestType', '`TestType`', '`TestType`', 200, -1, FALSE, '`TestType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TestType->Sortable = TRUE; // Allow sort
		$this->TestType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TestType->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TestType->Lookup = new Lookup('TestType', 'view_lab_profile', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TestType->OptionCount = 2;
		$this->fields['TestType'] = &$this->TestType;

		// NoHeading
		$this->NoHeading = new DbField('view_lab_profile', 'view_lab_profile', 'x_NoHeading', 'NoHeading', '`NoHeading`', '`NoHeading`', 200, -1, FALSE, '`NoHeading`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoHeading->Sortable = TRUE; // Allow sort
		$this->fields['NoHeading'] = &$this->NoHeading;

		// ChemicalCode
		$this->ChemicalCode = new DbField('view_lab_profile', 'view_lab_profile', 'x_ChemicalCode', 'ChemicalCode', '`ChemicalCode`', '`ChemicalCode`', 200, -1, FALSE, '`ChemicalCode`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChemicalCode->Sortable = TRUE; // Allow sort
		$this->fields['ChemicalCode'] = &$this->ChemicalCode;

		// ChemicalName
		$this->ChemicalName = new DbField('view_lab_profile', 'view_lab_profile', 'x_ChemicalName', 'ChemicalName', '`ChemicalName`', '`ChemicalName`', 200, -1, FALSE, '`ChemicalName`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ChemicalName->Sortable = TRUE; // Allow sort
		$this->fields['ChemicalName'] = &$this->ChemicalName;

		// Utilaization
		$this->Utilaization = new DbField('view_lab_profile', 'view_lab_profile', 'x_Utilaization', 'Utilaization', '`Utilaization`', '`Utilaization`', 200, -1, FALSE, '`Utilaization`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Utilaization->Sortable = TRUE; // Allow sort
		$this->fields['Utilaization'] = &$this->Utilaization;

		// Interpretation
		$this->Interpretation = new DbField('view_lab_profile', 'view_lab_profile', 'x_Interpretation', 'Interpretation', '`Interpretation`', '`Interpretation`', 201, -1, FALSE, '`Interpretation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Interpretation->Sortable = TRUE; // Allow sort
		$this->fields['Interpretation'] = &$this->Interpretation;
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

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_DETAIL_TABLE] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "lab_profile_details") {
			$detailUrl = $GLOBALS["lab_profile_details"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_CODE=" . urlencode($this->CODE->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "view_lab_profilelist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`view_lab_profile`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
			$this->Id->setDbValue($conn->insert_ID());
			$rs['Id'] = $this->Id->DbValue;
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
			if (array_key_exists('Id', $rs))
				AddFilter($where, QuotedName('Id', $this->Dbid) . '=' . QuotedValue($rs['Id'], $this->Id->DataType, $this->Dbid));
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

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('Id', $row) ? $row['Id'] : NULL) : $this->Id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@Id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_lab_profilelist.php";
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
		if ($pageName == "view_lab_profileview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_lab_profileedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_lab_profileadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_lab_profilelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_lab_profileview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_lab_profileview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "view_lab_profileadd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_lab_profileadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("view_lab_profileedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_lab_profileedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		if ($parm <> "")
			$url = $this->keyUrl("view_lab_profileadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_lab_profileadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("view_lab_profiledelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "Id:" . JsonEncode($this->Id->CurrentValue, "number");
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
		if ($this->Id->CurrentValue != NULL) {
			$url .= "Id=" . urlencode($this->Id->CurrentValue);
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
			if (Param("Id") !== NULL)
				$arKeys[] = Param("Id");
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
			$this->Id->CurrentValue = $key;
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
		$this->Id->setDbValue($rs->fields('Id'));
		$this->CODE->setDbValue($rs->fields('CODE'));
		$this->SERVICE->setDbValue($rs->fields('SERVICE'));
		$this->UNITS->setDbValue($rs->fields('UNITS'));
		$this->AMOUNT->setDbValue($rs->fields('AMOUNT'));
		$this->SERVICE_TYPE->setDbValue($rs->fields('SERVICE_TYPE'));
		$this->DEPARTMENT->setDbValue($rs->fields('DEPARTMENT'));
		$this->Created->setDbValue($rs->fields('Created'));
		$this->CreatedDateTime->setDbValue($rs->fields('CreatedDateTime'));
		$this->Modified->setDbValue($rs->fields('Modified'));
		$this->ModifiedDateTime->setDbValue($rs->fields('ModifiedDateTime'));
		$this->mas_services_billingcol->setDbValue($rs->fields('mas_services_billingcol'));
		$this->DrShareAmount->setDbValue($rs->fields('DrShareAmount'));
		$this->HospShareAmount->setDbValue($rs->fields('HospShareAmount'));
		$this->DrSharePer->setDbValue($rs->fields('DrSharePer'));
		$this->HospSharePer->setDbValue($rs->fields('HospSharePer'));
		$this->HospID->setDbValue($rs->fields('HospID'));
		$this->TestSubCd->setDbValue($rs->fields('TestSubCd'));
		$this->Method->setDbValue($rs->fields('Method'));
		$this->Order->setDbValue($rs->fields('Order'));
		$this->Form->setDbValue($rs->fields('Form'));
		$this->ResType->setDbValue($rs->fields('ResType'));
		$this->UnitCD->setDbValue($rs->fields('UnitCD'));
		$this->RefValue->setDbValue($rs->fields('RefValue'));
		$this->Sample->setDbValue($rs->fields('Sample'));
		$this->NoD->setDbValue($rs->fields('NoD'));
		$this->BillOrder->setDbValue($rs->fields('BillOrder'));
		$this->Formula->setDbValue($rs->fields('Formula'));
		$this->Inactive->setDbValue($rs->fields('Inactive'));
		$this->Outsource->setDbValue($rs->fields('Outsource'));
		$this->CollSample->setDbValue($rs->fields('CollSample'));
		$this->TestType->setDbValue($rs->fields('TestType'));
		$this->NoHeading->setDbValue($rs->fields('NoHeading'));
		$this->ChemicalCode->setDbValue($rs->fields('ChemicalCode'));
		$this->ChemicalName->setDbValue($rs->fields('ChemicalName'));
		$this->Utilaization->setDbValue($rs->fields('Utilaization'));
		$this->Interpretation->setDbValue($rs->fields('Interpretation'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		$this->AMOUNT->ViewCustomAttributes = "";

		// SERVICE_TYPE
		$curVal = strval($this->SERVICE_TYPE->CurrentValue);
		if ($curVal <> "") {
			$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
			if ($this->SERVICE_TYPE->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
				}
			}
		} else {
			$this->SERVICE_TYPE->ViewValue = NULL;
		}
		$this->SERVICE_TYPE->ViewCustomAttributes = "";

		// DEPARTMENT
		$curVal = strval($this->DEPARTMENT->CurrentValue);
		if ($curVal <> "") {
			$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->lookupCacheOption($curVal);
			if ($this->DEPARTMENT->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`department`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->DEPARTMENT->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
				}
			}
		} else {
			$this->DEPARTMENT->ViewValue = NULL;
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
		if (strval($this->TestType->CurrentValue) <> "") {
			$this->TestType->ViewValue = $this->TestType->optionCaption($this->TestType->CurrentValue);
		} else {
			$this->TestType->ViewValue = NULL;
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

		// Id
		$this->Id->EditAttrs["class"] = "form-control";
		$this->Id->EditCustomAttributes = "";
		$this->Id->EditValue = $this->Id->CurrentValue;
		$this->Id->ViewCustomAttributes = "";

		// CODE
		$this->CODE->EditAttrs["class"] = "form-control";
		$this->CODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
		$this->CODE->EditValue = $this->CODE->CurrentValue;
		$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

		// SERVICE
		$this->SERVICE->EditAttrs["class"] = "form-control";
		$this->SERVICE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
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
		if (strval($this->AMOUNT->EditValue) <> "" && is_numeric($this->AMOUNT->EditValue))
			$this->AMOUNT->EditValue = FormatNumber($this->AMOUNT->EditValue, -2, -1, -2, 0);

		// SERVICE_TYPE
		$this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
		$this->SERVICE_TYPE->EditCustomAttributes = "";

		// DEPARTMENT
		$this->DEPARTMENT->EditAttrs["class"] = "form-control";
		$this->DEPARTMENT->EditCustomAttributes = "";

		// Created
		// CreatedDateTime
		// Modified
		// ModifiedDateTime
		// mas_services_billingcol

		$this->mas_services_billingcol->EditAttrs["class"] = "form-control";
		$this->mas_services_billingcol->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->mas_services_billingcol->CurrentValue = HtmlDecode($this->mas_services_billingcol->CurrentValue);
		$this->mas_services_billingcol->EditValue = $this->mas_services_billingcol->CurrentValue;
		$this->mas_services_billingcol->PlaceHolder = RemoveHtml($this->mas_services_billingcol->caption());

		// DrShareAmount
		$this->DrShareAmount->EditAttrs["class"] = "form-control";
		$this->DrShareAmount->EditCustomAttributes = "";
		$this->DrShareAmount->EditValue = $this->DrShareAmount->CurrentValue;
		$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
		if (strval($this->DrShareAmount->EditValue) <> "" && is_numeric($this->DrShareAmount->EditValue))
			$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);

		// HospShareAmount
		$this->HospShareAmount->EditAttrs["class"] = "form-control";
		$this->HospShareAmount->EditCustomAttributes = "";
		$this->HospShareAmount->EditValue = $this->HospShareAmount->CurrentValue;
		$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
		if (strval($this->HospShareAmount->EditValue) <> "" && is_numeric($this->HospShareAmount->EditValue))
			$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);

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
		if (REMOVE_XSS)
			$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
		$this->TestSubCd->EditValue = $this->TestSubCd->CurrentValue;
		$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

		// Method
		$this->Method->EditAttrs["class"] = "form-control";
		$this->Method->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
		$this->Method->EditValue = $this->Method->CurrentValue;
		$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

		// Order
		$this->Order->EditAttrs["class"] = "form-control";
		$this->Order->EditCustomAttributes = "";
		$this->Order->EditValue = $this->Order->CurrentValue;
		$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
		if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue))
			$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);

		// Form
		$this->Form->EditAttrs["class"] = "form-control";
		$this->Form->EditCustomAttributes = "";
		$this->Form->EditValue = $this->Form->CurrentValue;
		$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

		// ResType
		$this->ResType->EditAttrs["class"] = "form-control";
		$this->ResType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
		$this->ResType->EditValue = $this->ResType->CurrentValue;
		$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

		// UnitCD
		$this->UnitCD->EditAttrs["class"] = "form-control";
		$this->UnitCD->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->UnitCD->CurrentValue = HtmlDecode($this->UnitCD->CurrentValue);
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
		if (REMOVE_XSS)
			$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
		$this->Sample->EditValue = $this->Sample->CurrentValue;
		$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

		// NoD
		$this->NoD->EditAttrs["class"] = "form-control";
		$this->NoD->EditCustomAttributes = "";
		$this->NoD->EditValue = $this->NoD->CurrentValue;
		$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
		if (strval($this->NoD->EditValue) <> "" && is_numeric($this->NoD->EditValue))
			$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);

		// BillOrder
		$this->BillOrder->EditAttrs["class"] = "form-control";
		$this->BillOrder->EditCustomAttributes = "";
		$this->BillOrder->EditValue = $this->BillOrder->CurrentValue;
		$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
		if (strval($this->BillOrder->EditValue) <> "" && is_numeric($this->BillOrder->EditValue))
			$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);

		// Formula
		$this->Formula->EditAttrs["class"] = "form-control";
		$this->Formula->EditCustomAttributes = "";
		$this->Formula->EditValue = $this->Formula->CurrentValue;
		$this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

		// Inactive
		$this->Inactive->EditAttrs["class"] = "form-control";
		$this->Inactive->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
		$this->Inactive->EditValue = $this->Inactive->CurrentValue;
		$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

		// Outsource
		$this->Outsource->EditAttrs["class"] = "form-control";
		$this->Outsource->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
		$this->Outsource->EditValue = $this->Outsource->CurrentValue;
		$this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

		// CollSample
		$this->CollSample->EditAttrs["class"] = "form-control";
		$this->CollSample->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
		$this->CollSample->EditValue = $this->CollSample->CurrentValue;
		$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

		// TestType
		$this->TestType->EditAttrs["class"] = "form-control";
		$this->TestType->EditCustomAttributes = "";
		$this->TestType->EditValue = $this->TestType->options(TRUE);

		// NoHeading
		$this->NoHeading->EditAttrs["class"] = "form-control";
		$this->NoHeading->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
		$this->NoHeading->EditValue = $this->NoHeading->CurrentValue;
		$this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

		// ChemicalCode
		$this->ChemicalCode->EditAttrs["class"] = "form-control";
		$this->ChemicalCode->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChemicalCode->CurrentValue = HtmlDecode($this->ChemicalCode->CurrentValue);
		$this->ChemicalCode->EditValue = $this->ChemicalCode->CurrentValue;
		$this->ChemicalCode->PlaceHolder = RemoveHtml($this->ChemicalCode->caption());

		// ChemicalName
		$this->ChemicalName->EditAttrs["class"] = "form-control";
		$this->ChemicalName->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ChemicalName->CurrentValue = HtmlDecode($this->ChemicalName->CurrentValue);
		$this->ChemicalName->EditValue = $this->ChemicalName->CurrentValue;
		$this->ChemicalName->PlaceHolder = RemoveHtml($this->ChemicalName->caption());

		// Utilaization
		$this->Utilaization->EditAttrs["class"] = "form-control";
		$this->Utilaization->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Utilaization->CurrentValue = HtmlDecode($this->Utilaization->CurrentValue);
		$this->Utilaization->EditValue = $this->Utilaization->CurrentValue;
		$this->Utilaization->PlaceHolder = RemoveHtml($this->Utilaization->caption());

		// Interpretation
		$this->Interpretation->EditAttrs["class"] = "form-control";
		$this->Interpretation->EditCustomAttributes = "";
		$this->Interpretation->EditValue = $this->Interpretation->CurrentValue;
		$this->Interpretation->PlaceHolder = RemoveHtml($this->Interpretation->caption());

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