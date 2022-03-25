<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for pres_tradenames_new
 */
class pres_tradenames_new extends DbTable
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
	public $ID;
	public $Drug_Name;
	public $Generic_Name;
	public $Trade_Name;
	public $PR_CODE;
	public $Form;
	public $Strength;
	public $Unit;
	public $CONTAINER_TYPE;
	public $CONTAINER_STRENGTH;
	public $TypeOfDrug;
	public $ProductType;
	public $Generic_Name1;
	public $Strength1;
	public $Unit1;
	public $Generic_Name2;
	public $Strength2;
	public $Unit2;
	public $Generic_Name3;
	public $Strength3;
	public $Unit3;
	public $Generic_Name4;
	public $Generic_Name5;
	public $Strength4;
	public $Strength5;
	public $Unit4;
	public $Unit5;
	public $AlterNative1;
	public $AlterNative2;
	public $AlterNative3;
	public $AlterNative4;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'pres_tradenames_new';
		$this->TableName = 'pres_tradenames_new';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`pres_tradenames_new`";
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

		// ID
		$this->ID = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_ID', 'ID', '`ID`', '`ID`', 3, -1, FALSE, '`ID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ID->IsAutoIncrement = TRUE; // Autoincrement field
		$this->ID->IsPrimaryKey = TRUE; // Primary key field
		$this->ID->IsForeignKey = TRUE; // Foreign key field
		$this->ID->Sortable = TRUE; // Allow sort
		$this->ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ID'] = &$this->ID;

		// Drug_Name
		$this->Drug_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Drug_Name', 'Drug_Name', '`Drug_Name`', '`Drug_Name`', 200, -1, FALSE, '`Drug_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Drug_Name->Sortable = TRUE; // Allow sort
		$this->fields['Drug_Name'] = &$this->Drug_Name;

		// Generic_Name
		$this->Generic_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name', 'Generic_Name', '`Generic_Name`', '`Generic_Name`', 200, -1, FALSE, '`Generic_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name->Sortable = TRUE; // Allow sort
		$this->Generic_Name->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name->Lookup = new Lookup('Generic_Name', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name'] = &$this->Generic_Name;

		// Trade_Name
		$this->Trade_Name = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Trade_Name', 'Trade_Name', '`Trade_Name`', '`Trade_Name`', 200, -1, FALSE, '`Trade_Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Trade_Name->Nullable = FALSE; // NOT NULL field
		$this->Trade_Name->Required = TRUE; // Required field
		$this->Trade_Name->Sortable = TRUE; // Allow sort
		$this->fields['Trade_Name'] = &$this->Trade_Name;

		// PR_CODE
		$this->PR_CODE = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_PR_CODE', 'PR_CODE', '`PR_CODE`', '`PR_CODE`', 200, -1, FALSE, '`PR_CODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PR_CODE->Nullable = FALSE; // NOT NULL field
		$this->PR_CODE->Required = TRUE; // Required field
		$this->PR_CODE->Sortable = TRUE; // Allow sort
		$this->fields['PR_CODE'] = &$this->PR_CODE;

		// Form
		$this->Form = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Form', 'Form', '`Form`', '`Form`', 200, -1, FALSE, '`Form`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Form->Sortable = TRUE; // Allow sort
		$this->Form->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Form->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Form->Lookup = new Lookup('Form', 'pres_mas_forms', FALSE, 'Forms', ["Forms","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Form'] = &$this->Form;

		// Strength
		$this->Strength = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength', 'Strength', '`Strength`', '`Strength`', 200, -1, FALSE, '`Strength`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength->Sortable = TRUE; // Allow sort
		$this->fields['Strength'] = &$this->Strength;

		// Unit
		$this->Unit = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit', 'Unit', '`Unit`', '`Unit`', 200, -1, FALSE, '`Unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit->Sortable = TRUE; // Allow sort
		$this->Unit->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit->Lookup = new Lookup('Unit', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit'] = &$this->Unit;

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_CONTAINER_TYPE', 'CONTAINER_TYPE', '`CONTAINER_TYPE`', '`CONTAINER_TYPE`', 200, -1, FALSE, '`CONTAINER_TYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CONTAINER_TYPE->Sortable = TRUE; // Allow sort
		$this->fields['CONTAINER_TYPE'] = &$this->CONTAINER_TYPE;

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_CONTAINER_STRENGTH', 'CONTAINER_STRENGTH', '`CONTAINER_STRENGTH`', '`CONTAINER_STRENGTH`', 200, -1, FALSE, '`CONTAINER_STRENGTH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CONTAINER_STRENGTH->Sortable = TRUE; // Allow sort
		$this->fields['CONTAINER_STRENGTH'] = &$this->CONTAINER_STRENGTH;

		// TypeOfDrug
		$this->TypeOfDrug = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_TypeOfDrug', 'TypeOfDrug', '`TypeOfDrug`', '`TypeOfDrug`', 200, -1, FALSE, '`TypeOfDrug`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TypeOfDrug->Sortable = TRUE; // Allow sort
		$this->TypeOfDrug->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TypeOfDrug->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TypeOfDrug->Lookup = new Lookup('TypeOfDrug', 'pres_tradenames_new', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TypeOfDrug->OptionCount = 2;
		$this->fields['TypeOfDrug'] = &$this->TypeOfDrug;

		// ProductType
		$this->ProductType = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_ProductType', 'ProductType', '`ProductType`', '`ProductType`', 200, -1, FALSE, '`ProductType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ProductType->Required = TRUE; // Required field
		$this->ProductType->Sortable = TRUE; // Allow sort
		$this->ProductType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ProductType->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->ProductType->Lookup = new Lookup('ProductType', 'pres_tradenames_new', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->ProductType->OptionCount = 3;
		$this->fields['ProductType'] = &$this->ProductType;

		// Generic_Name1
		$this->Generic_Name1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name1', 'Generic_Name1', '`Generic_Name1`', '`Generic_Name1`', 200, -1, FALSE, '`Generic_Name1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name1->Sortable = TRUE; // Allow sort
		$this->Generic_Name1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name1->Lookup = new Lookup('Generic_Name1', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name1'] = &$this->Generic_Name1;

		// Strength1
		$this->Strength1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength1', 'Strength1', '`Strength1`', '`Strength1`', 200, -1, FALSE, '`Strength1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength1->Sortable = TRUE; // Allow sort
		$this->fields['Strength1'] = &$this->Strength1;

		// Unit1
		$this->Unit1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit1', 'Unit1', '`Unit1`', '`Unit1`', 200, -1, FALSE, '`Unit1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit1->Sortable = TRUE; // Allow sort
		$this->Unit1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit1->Lookup = new Lookup('Unit1', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit1'] = &$this->Unit1;

		// Generic_Name2
		$this->Generic_Name2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name2', 'Generic_Name2', '`Generic_Name2`', '`Generic_Name2`', 200, -1, FALSE, '`Generic_Name2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name2->Sortable = TRUE; // Allow sort
		$this->Generic_Name2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name2->Lookup = new Lookup('Generic_Name2', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name2'] = &$this->Generic_Name2;

		// Strength2
		$this->Strength2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength2', 'Strength2', '`Strength2`', '`Strength2`', 200, -1, FALSE, '`Strength2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength2->Sortable = TRUE; // Allow sort
		$this->fields['Strength2'] = &$this->Strength2;

		// Unit2
		$this->Unit2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit2', 'Unit2', '`Unit2`', '`Unit2`', 200, -1, FALSE, '`Unit2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit2->Sortable = TRUE; // Allow sort
		$this->Unit2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit2->Lookup = new Lookup('Unit2', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit2'] = &$this->Unit2;

		// Generic_Name3
		$this->Generic_Name3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name3', 'Generic_Name3', '`Generic_Name3`', '`Generic_Name3`', 200, -1, FALSE, '`Generic_Name3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name3->Sortable = TRUE; // Allow sort
		$this->Generic_Name3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name3->Lookup = new Lookup('Generic_Name3', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name3'] = &$this->Generic_Name3;

		// Strength3
		$this->Strength3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength3', 'Strength3', '`Strength3`', '`Strength3`', 200, -1, FALSE, '`Strength3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength3->Sortable = TRUE; // Allow sort
		$this->fields['Strength3'] = &$this->Strength3;

		// Unit3
		$this->Unit3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit3', 'Unit3', '`Unit3`', '`Unit3`', 200, -1, FALSE, '`Unit3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit3->Sortable = TRUE; // Allow sort
		$this->Unit3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit3->Lookup = new Lookup('Unit3', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit3'] = &$this->Unit3;

		// Generic_Name4
		$this->Generic_Name4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name4', 'Generic_Name4', '`Generic_Name4`', '`Generic_Name4`', 200, -1, FALSE, '`Generic_Name4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name4->Sortable = TRUE; // Allow sort
		$this->Generic_Name4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name4->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name4->Lookup = new Lookup('Generic_Name4', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name4'] = &$this->Generic_Name4;

		// Generic_Name5
		$this->Generic_Name5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Generic_Name5', 'Generic_Name5', '`Generic_Name5`', '`Generic_Name5`', 200, -1, FALSE, '`Generic_Name5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Generic_Name5->Sortable = TRUE; // Allow sort
		$this->Generic_Name5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Generic_Name5->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Generic_Name5->Lookup = new Lookup('Generic_Name5', 'pres_mas_generic', FALSE, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Generic_Name5'] = &$this->Generic_Name5;

		// Strength4
		$this->Strength4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength4', 'Strength4', '`Strength4`', '`Strength4`', 200, -1, FALSE, '`Strength4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength4->Sortable = TRUE; // Allow sort
		$this->fields['Strength4'] = &$this->Strength4;

		// Strength5
		$this->Strength5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Strength5', 'Strength5', '`Strength5`', '`Strength5`', 200, -1, FALSE, '`Strength5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Strength5->Sortable = TRUE; // Allow sort
		$this->fields['Strength5'] = &$this->Strength5;

		// Unit4
		$this->Unit4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit4', 'Unit4', '`Unit4`', '`Unit4`', 200, -1, FALSE, '`Unit4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit4->Sortable = TRUE; // Allow sort
		$this->Unit4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit4->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit4->Lookup = new Lookup('Unit4', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit4'] = &$this->Unit4;

		// Unit5
		$this->Unit5 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_Unit5', 'Unit5', '`Unit5`', '`Unit5`', 200, -1, FALSE, '`Unit5`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Unit5->Sortable = TRUE; // Allow sort
		$this->Unit5->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Unit5->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Unit5->Lookup = new Lookup('Unit5', 'pres_mas_unit', FALSE, 'Units', ["Units","","",""], [], [], [], [], [], [], '', '');
		$this->fields['Unit5'] = &$this->Unit5;

		// AlterNative1
		$this->AlterNative1 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative1', 'AlterNative1', '`AlterNative1`', '`AlterNative1`', 200, -1, FALSE, '`AlterNative1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AlterNative1->Sortable = TRUE; // Allow sort
		$this->AlterNative1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AlterNative1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AlterNative1->Lookup = new Lookup('AlterNative1', 'pres_tradenames_new', FALSE, 'ID', ["PR_CODE","Trade_Name","",""], [], [], [], [], [], [], '', '');
		$this->fields['AlterNative1'] = &$this->AlterNative1;

		// AlterNative2
		$this->AlterNative2 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative2', 'AlterNative2', '`AlterNative2`', '`AlterNative2`', 200, -1, FALSE, '`AlterNative2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AlterNative2->Sortable = TRUE; // Allow sort
		$this->AlterNative2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AlterNative2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AlterNative2->Lookup = new Lookup('AlterNative2', 'pres_tradenames_new', FALSE, 'ID', ["PR_CODE","Trade_Name","",""], [], [], [], [], [], [], '', '');
		$this->fields['AlterNative2'] = &$this->AlterNative2;

		// AlterNative3
		$this->AlterNative3 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative3', 'AlterNative3', '`AlterNative3`', '`AlterNative3`', 200, -1, FALSE, '`AlterNative3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AlterNative3->Sortable = TRUE; // Allow sort
		$this->AlterNative3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AlterNative3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AlterNative3->Lookup = new Lookup('AlterNative3', 'pres_tradenames_new', FALSE, 'ID', ["PR_CODE","Trade_Name","",""], [], [], [], [], [], [], '', '');
		$this->fields['AlterNative3'] = &$this->AlterNative3;

		// AlterNative4
		$this->AlterNative4 = new DbField('pres_tradenames_new', 'pres_tradenames_new', 'x_AlterNative4', 'AlterNative4', '`AlterNative4`', '`AlterNative4`', 200, -1, FALSE, '`AlterNative4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->AlterNative4->Sortable = TRUE; // Allow sort
		$this->AlterNative4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->AlterNative4->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->AlterNative4->Lookup = new Lookup('AlterNative4', 'pres_tradenames_new', FALSE, 'ID', ["PR_CODE","Trade_Name","",""], [], [], [], [], [], [], '', '');
		$this->fields['AlterNative4'] = &$this->AlterNative4;
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
		if ($this->getCurrentDetailTable() == "pres_trade_combination_names_new") {
			$detailUrl = $GLOBALS["pres_trade_combination_names_new"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_ID=" . urlencode($this->ID->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "pres_tradenames_newlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`pres_tradenames_new`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "`ID` DESC";
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
			$this->ID->setDbValue($conn->insert_ID());
			$rs['ID'] = $this->ID->DbValue;
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

		// Cascade Update detail table 'pres_trade_combination_names_new'
		$cascadeUpdate = FALSE;
		$rscascade = array();
		if ($rsold && (isset($rs['ID']) && $rsold['ID'] <> $rs['ID'])) { // Update detail field 'tradenames_id'
			$cascadeUpdate = TRUE;
			$rscascade['tradenames_id'] = $rs['ID']; 
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["pres_trade_combination_names_new"]))
				$GLOBALS["pres_trade_combination_names_new"] = new pres_trade_combination_names_new();
			$rswrk = $GLOBALS["pres_trade_combination_names_new"]->loadRs("`tradenames_id` = " . QuotedValue($rsold['ID'], DATATYPE_NUMBER, 'DB')); 
			while ($rswrk && !$rswrk->EOF) {
				$rskey = array();
				$fldname = 'ID';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["pres_trade_combination_names_new"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["pres_trade_combination_names_new"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["pres_trade_combination_names_new"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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
			if (array_key_exists('ID', $rs))
				AddFilter($where, QuotedName('ID', $this->Dbid) . '=' . QuotedValue($rs['ID'], $this->ID->DataType, $this->Dbid));
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

		// Cascade delete detail table 'pres_trade_combination_names_new'
		if (!isset($GLOBALS["pres_trade_combination_names_new"]))
			$GLOBALS["pres_trade_combination_names_new"] = new pres_trade_combination_names_new();
		$rscascade = $GLOBALS["pres_trade_combination_names_new"]->loadRs("`tradenames_id` = " . QuotedValue($rs['ID'], DATATYPE_NUMBER, "DB")); 
		$dtlrows = ($rscascade) ? $rscascade->getRows() : array();

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["pres_trade_combination_names_new"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["pres_trade_combination_names_new"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["pres_trade_combination_names_new"]->Row_Deleted($dtlrow);
		}
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
		$this->ID->DbValue = $row['ID'];
		$this->Drug_Name->DbValue = $row['Drug_Name'];
		$this->Generic_Name->DbValue = $row['Generic_Name'];
		$this->Trade_Name->DbValue = $row['Trade_Name'];
		$this->PR_CODE->DbValue = $row['PR_CODE'];
		$this->Form->DbValue = $row['Form'];
		$this->Strength->DbValue = $row['Strength'];
		$this->Unit->DbValue = $row['Unit'];
		$this->CONTAINER_TYPE->DbValue = $row['CONTAINER_TYPE'];
		$this->CONTAINER_STRENGTH->DbValue = $row['CONTAINER_STRENGTH'];
		$this->TypeOfDrug->DbValue = $row['TypeOfDrug'];
		$this->ProductType->DbValue = $row['ProductType'];
		$this->Generic_Name1->DbValue = $row['Generic_Name1'];
		$this->Strength1->DbValue = $row['Strength1'];
		$this->Unit1->DbValue = $row['Unit1'];
		$this->Generic_Name2->DbValue = $row['Generic_Name2'];
		$this->Strength2->DbValue = $row['Strength2'];
		$this->Unit2->DbValue = $row['Unit2'];
		$this->Generic_Name3->DbValue = $row['Generic_Name3'];
		$this->Strength3->DbValue = $row['Strength3'];
		$this->Unit3->DbValue = $row['Unit3'];
		$this->Generic_Name4->DbValue = $row['Generic_Name4'];
		$this->Generic_Name5->DbValue = $row['Generic_Name5'];
		$this->Strength4->DbValue = $row['Strength4'];
		$this->Strength5->DbValue = $row['Strength5'];
		$this->Unit4->DbValue = $row['Unit4'];
		$this->Unit5->DbValue = $row['Unit5'];
		$this->AlterNative1->DbValue = $row['AlterNative1'];
		$this->AlterNative2->DbValue = $row['AlterNative2'];
		$this->AlterNative3->DbValue = $row['AlterNative3'];
		$this->AlterNative4->DbValue = $row['AlterNative4'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`ID` = @ID@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('ID', $row) ? $row['ID'] : NULL) : $this->ID->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@ID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "pres_tradenames_newlist.php";
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
		if ($pageName == "pres_tradenames_newview.php")
			return $Language->phrase("View");
		elseif ($pageName == "pres_tradenames_newedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "pres_tradenames_newadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "pres_tradenames_newlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pres_tradenames_newview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_tradenames_newview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "pres_tradenames_newadd.php?" . $this->getUrlParm($parm);
		else
			$url = "pres_tradenames_newadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("pres_tradenames_newedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_tradenames_newedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
			$url = $this->keyUrl("pres_tradenames_newadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("pres_tradenames_newadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("pres_tradenames_newdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "ID:" . JsonEncode($this->ID->CurrentValue, "number");
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
		if ($this->ID->CurrentValue != NULL) {
			$url .= "ID=" . urlencode($this->ID->CurrentValue);
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
			if (Param("ID") !== NULL)
				$arKeys[] = Param("ID");
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
			$this->ID->CurrentValue = $key;
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
		$this->ID->setDbValue($rs->fields('ID'));
		$this->Drug_Name->setDbValue($rs->fields('Drug_Name'));
		$this->Generic_Name->setDbValue($rs->fields('Generic_Name'));
		$this->Trade_Name->setDbValue($rs->fields('Trade_Name'));
		$this->PR_CODE->setDbValue($rs->fields('PR_CODE'));
		$this->Form->setDbValue($rs->fields('Form'));
		$this->Strength->setDbValue($rs->fields('Strength'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->CONTAINER_TYPE->setDbValue($rs->fields('CONTAINER_TYPE'));
		$this->CONTAINER_STRENGTH->setDbValue($rs->fields('CONTAINER_STRENGTH'));
		$this->TypeOfDrug->setDbValue($rs->fields('TypeOfDrug'));
		$this->ProductType->setDbValue($rs->fields('ProductType'));
		$this->Generic_Name1->setDbValue($rs->fields('Generic_Name1'));
		$this->Strength1->setDbValue($rs->fields('Strength1'));
		$this->Unit1->setDbValue($rs->fields('Unit1'));
		$this->Generic_Name2->setDbValue($rs->fields('Generic_Name2'));
		$this->Strength2->setDbValue($rs->fields('Strength2'));
		$this->Unit2->setDbValue($rs->fields('Unit2'));
		$this->Generic_Name3->setDbValue($rs->fields('Generic_Name3'));
		$this->Strength3->setDbValue($rs->fields('Strength3'));
		$this->Unit3->setDbValue($rs->fields('Unit3'));
		$this->Generic_Name4->setDbValue($rs->fields('Generic_Name4'));
		$this->Generic_Name5->setDbValue($rs->fields('Generic_Name5'));
		$this->Strength4->setDbValue($rs->fields('Strength4'));
		$this->Strength5->setDbValue($rs->fields('Strength5'));
		$this->Unit4->setDbValue($rs->fields('Unit4'));
		$this->Unit5->setDbValue($rs->fields('Unit5'));
		$this->AlterNative1->setDbValue($rs->fields('AlterNative1'));
		$this->AlterNative2->setDbValue($rs->fields('AlterNative2'));
		$this->AlterNative3->setDbValue($rs->fields('AlterNative3'));
		$this->AlterNative4->setDbValue($rs->fields('AlterNative4'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ID
		// Drug_Name
		// Generic_Name
		// Trade_Name
		// PR_CODE
		// Form
		// Strength
		// Unit
		// CONTAINER_TYPE
		// CONTAINER_STRENGTH
		// TypeOfDrug
		// ProductType
		// Generic_Name1
		// Strength1
		// Unit1
		// Generic_Name2
		// Strength2
		// Unit2
		// Generic_Name3
		// Strength3
		// Unit3
		// Generic_Name4
		// Generic_Name5
		// Strength4
		// Strength5
		// Unit4
		// Unit5
		// AlterNative1
		// AlterNative2
		// AlterNative3
		// AlterNative4
		// ID

		$this->ID->ViewValue = $this->ID->CurrentValue;
		$this->ID->ViewCustomAttributes = "";

		// Drug_Name
		$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->ViewCustomAttributes = "";

		// Generic_Name
		$curVal = strval($this->Generic_Name->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
			if ($this->Generic_Name->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name->ViewValue = NULL;
		}
		$this->Generic_Name->ViewCustomAttributes = "";

		// Trade_Name
		$this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
		$this->Trade_Name->ViewCustomAttributes = "";

		// PR_CODE
		$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->ViewCustomAttributes = "";

		// Form
		$curVal = strval($this->Form->CurrentValue);
		if ($curVal <> "") {
			$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
			if ($this->Form->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Form->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Form->ViewValue = $this->Form->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Form->ViewValue = $this->Form->CurrentValue;
				}
			}
		} else {
			$this->Form->ViewValue = NULL;
		}
		$this->Form->ViewCustomAttributes = "";

		// Strength
		$this->Strength->ViewValue = $this->Strength->CurrentValue;
		$this->Strength->ViewCustomAttributes = "";

		// Unit
		$curVal = strval($this->Unit->CurrentValue);
		if ($curVal <> "") {
			$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
			if ($this->Unit->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit->ViewValue = $this->Unit->CurrentValue;
				}
			}
		} else {
			$this->Unit->ViewValue = NULL;
		}
		$this->Unit->ViewCustomAttributes = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->ViewCustomAttributes = "";

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
		$this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

		// TypeOfDrug
		if (strval($this->TypeOfDrug->CurrentValue) <> "") {
			$this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
		} else {
			$this->TypeOfDrug->ViewValue = NULL;
		}
		$this->TypeOfDrug->ViewCustomAttributes = "";

		// ProductType
		if (strval($this->ProductType->CurrentValue) <> "") {
			$this->ProductType->ViewValue = $this->ProductType->optionCaption($this->ProductType->CurrentValue);
		} else {
			$this->ProductType->ViewValue = NULL;
		}
		$this->ProductType->ViewCustomAttributes = "";

		// Generic_Name1
		$curVal = strval($this->Generic_Name1->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
			if ($this->Generic_Name1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name1->ViewValue = NULL;
		}
		$this->Generic_Name1->ViewCustomAttributes = "";

		// Strength1
		$this->Strength1->ViewValue = $this->Strength1->CurrentValue;
		$this->Strength1->ViewCustomAttributes = "";

		// Unit1
		$curVal = strval($this->Unit1->CurrentValue);
		if ($curVal <> "") {
			$this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
			if ($this->Unit1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit1->ViewValue = $this->Unit1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit1->ViewValue = $this->Unit1->CurrentValue;
				}
			}
		} else {
			$this->Unit1->ViewValue = NULL;
		}
		$this->Unit1->ViewCustomAttributes = "";

		// Generic_Name2
		$curVal = strval($this->Generic_Name2->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
			if ($this->Generic_Name2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name2->ViewValue = NULL;
		}
		$this->Generic_Name2->ViewCustomAttributes = "";

		// Strength2
		$this->Strength2->ViewValue = $this->Strength2->CurrentValue;
		$this->Strength2->ViewCustomAttributes = "";

		// Unit2
		$curVal = strval($this->Unit2->CurrentValue);
		if ($curVal <> "") {
			$this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
			if ($this->Unit2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit2->ViewValue = $this->Unit2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit2->ViewValue = $this->Unit2->CurrentValue;
				}
			}
		} else {
			$this->Unit2->ViewValue = NULL;
		}
		$this->Unit2->ViewCustomAttributes = "";

		// Generic_Name3
		$curVal = strval($this->Generic_Name3->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
			if ($this->Generic_Name3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name3->ViewValue = NULL;
		}
		$this->Generic_Name3->ViewCustomAttributes = "";

		// Strength3
		$this->Strength3->ViewValue = $this->Strength3->CurrentValue;
		$this->Strength3->ViewCustomAttributes = "";

		// Unit3
		$curVal = strval($this->Unit3->CurrentValue);
		if ($curVal <> "") {
			$this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
			if ($this->Unit3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit3->ViewValue = $this->Unit3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit3->ViewValue = $this->Unit3->CurrentValue;
				}
			}
		} else {
			$this->Unit3->ViewValue = NULL;
		}
		$this->Unit3->ViewCustomAttributes = "";

		// Generic_Name4
		$curVal = strval($this->Generic_Name4->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
			if ($this->Generic_Name4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name4->ViewValue = NULL;
		}
		$this->Generic_Name4->ViewCustomAttributes = "";

		// Generic_Name5
		$curVal = strval($this->Generic_Name5->CurrentValue);
		if ($curVal <> "") {
			$this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
			if ($this->Generic_Name5->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Generic_Name5->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
				}
			}
		} else {
			$this->Generic_Name5->ViewValue = NULL;
		}
		$this->Generic_Name5->ViewCustomAttributes = "";

		// Strength4
		$this->Strength4->ViewValue = $this->Strength4->CurrentValue;
		$this->Strength4->ViewCustomAttributes = "";

		// Strength5
		$this->Strength5->ViewValue = $this->Strength5->CurrentValue;
		$this->Strength5->ViewCustomAttributes = "";

		// Unit4
		$curVal = strval($this->Unit4->CurrentValue);
		if ($curVal <> "") {
			$this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
			if ($this->Unit4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit4->ViewValue = $this->Unit4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit4->ViewValue = $this->Unit4->CurrentValue;
				}
			}
		} else {
			$this->Unit4->ViewValue = NULL;
		}
		$this->Unit4->ViewCustomAttributes = "";

		// Unit5
		$curVal = strval($this->Unit5->CurrentValue);
		if ($curVal <> "") {
			$this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
			if ($this->Unit5->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->Unit5->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->Unit5->ViewValue = $this->Unit5->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Unit5->ViewValue = $this->Unit5->CurrentValue;
				}
			}
		} else {
			$this->Unit5->ViewValue = NULL;
		}
		$this->Unit5->ViewCustomAttributes = "";

		// AlterNative1
		$curVal = strval($this->AlterNative1->CurrentValue);
		if ($curVal <> "") {
			$this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
			if ($this->AlterNative1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->AlterNative1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
				}
			}
		} else {
			$this->AlterNative1->ViewValue = NULL;
		}
		$this->AlterNative1->ViewCustomAttributes = "";

		// AlterNative2
		$curVal = strval($this->AlterNative2->CurrentValue);
		if ($curVal <> "") {
			$this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
			if ($this->AlterNative2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->AlterNative2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
				}
			}
		} else {
			$this->AlterNative2->ViewValue = NULL;
		}
		$this->AlterNative2->ViewCustomAttributes = "";

		// AlterNative3
		$curVal = strval($this->AlterNative3->CurrentValue);
		if ($curVal <> "") {
			$this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
			if ($this->AlterNative3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->AlterNative3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
				}
			}
		} else {
			$this->AlterNative3->ViewValue = NULL;
		}
		$this->AlterNative3->ViewCustomAttributes = "";

		// AlterNative4
		$curVal = strval($this->AlterNative4->CurrentValue);
		if ($curVal <> "") {
			$this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
			if ($this->AlterNative4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->AlterNative4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
				}
			}
		} else {
			$this->AlterNative4->ViewValue = NULL;
		}
		$this->AlterNative4->ViewCustomAttributes = "";

		// ID
		$this->ID->LinkCustomAttributes = "";
		$this->ID->HrefValue = "";
		$this->ID->TooltipValue = "";

		// Drug_Name
		$this->Drug_Name->LinkCustomAttributes = "";
		$this->Drug_Name->HrefValue = "";
		$this->Drug_Name->TooltipValue = "";

		// Generic_Name
		$this->Generic_Name->LinkCustomAttributes = "";
		$this->Generic_Name->HrefValue = "";
		$this->Generic_Name->TooltipValue = "";

		// Trade_Name
		$this->Trade_Name->LinkCustomAttributes = "";
		$this->Trade_Name->HrefValue = "";
		$this->Trade_Name->TooltipValue = "";

		// PR_CODE
		$this->PR_CODE->LinkCustomAttributes = "";
		$this->PR_CODE->HrefValue = "";
		$this->PR_CODE->TooltipValue = "";

		// Form
		$this->Form->LinkCustomAttributes = "";
		$this->Form->HrefValue = "";
		$this->Form->TooltipValue = "";

		// Strength
		$this->Strength->LinkCustomAttributes = "";
		$this->Strength->HrefValue = "";
		$this->Strength->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->LinkCustomAttributes = "";
		$this->CONTAINER_TYPE->HrefValue = "";
		$this->CONTAINER_TYPE->TooltipValue = "";

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
		$this->CONTAINER_STRENGTH->HrefValue = "";
		$this->CONTAINER_STRENGTH->TooltipValue = "";

		// TypeOfDrug
		$this->TypeOfDrug->LinkCustomAttributes = "";
		$this->TypeOfDrug->HrefValue = "";
		$this->TypeOfDrug->TooltipValue = "";

		// ProductType
		$this->ProductType->LinkCustomAttributes = "";
		$this->ProductType->HrefValue = "";
		$this->ProductType->TooltipValue = "";

		// Generic_Name1
		$this->Generic_Name1->LinkCustomAttributes = "";
		$this->Generic_Name1->HrefValue = "";
		$this->Generic_Name1->TooltipValue = "";

		// Strength1
		$this->Strength1->LinkCustomAttributes = "";
		$this->Strength1->HrefValue = "";
		$this->Strength1->TooltipValue = "";

		// Unit1
		$this->Unit1->LinkCustomAttributes = "";
		$this->Unit1->HrefValue = "";
		$this->Unit1->TooltipValue = "";

		// Generic_Name2
		$this->Generic_Name2->LinkCustomAttributes = "";
		$this->Generic_Name2->HrefValue = "";
		$this->Generic_Name2->TooltipValue = "";

		// Strength2
		$this->Strength2->LinkCustomAttributes = "";
		$this->Strength2->HrefValue = "";
		$this->Strength2->TooltipValue = "";

		// Unit2
		$this->Unit2->LinkCustomAttributes = "";
		$this->Unit2->HrefValue = "";
		$this->Unit2->TooltipValue = "";

		// Generic_Name3
		$this->Generic_Name3->LinkCustomAttributes = "";
		$this->Generic_Name3->HrefValue = "";
		$this->Generic_Name3->TooltipValue = "";

		// Strength3
		$this->Strength3->LinkCustomAttributes = "";
		$this->Strength3->HrefValue = "";
		$this->Strength3->TooltipValue = "";

		// Unit3
		$this->Unit3->LinkCustomAttributes = "";
		$this->Unit3->HrefValue = "";
		$this->Unit3->TooltipValue = "";

		// Generic_Name4
		$this->Generic_Name4->LinkCustomAttributes = "";
		$this->Generic_Name4->HrefValue = "";
		$this->Generic_Name4->TooltipValue = "";

		// Generic_Name5
		$this->Generic_Name5->LinkCustomAttributes = "";
		$this->Generic_Name5->HrefValue = "";
		$this->Generic_Name5->TooltipValue = "";

		// Strength4
		$this->Strength4->LinkCustomAttributes = "";
		$this->Strength4->HrefValue = "";
		$this->Strength4->TooltipValue = "";

		// Strength5
		$this->Strength5->LinkCustomAttributes = "";
		$this->Strength5->HrefValue = "";
		$this->Strength5->TooltipValue = "";

		// Unit4
		$this->Unit4->LinkCustomAttributes = "";
		$this->Unit4->HrefValue = "";
		$this->Unit4->TooltipValue = "";

		// Unit5
		$this->Unit5->LinkCustomAttributes = "";
		$this->Unit5->HrefValue = "";
		$this->Unit5->TooltipValue = "";

		// AlterNative1
		$this->AlterNative1->LinkCustomAttributes = "";
		$this->AlterNative1->HrefValue = "";
		$this->AlterNative1->TooltipValue = "";

		// AlterNative2
		$this->AlterNative2->LinkCustomAttributes = "";
		$this->AlterNative2->HrefValue = "";
		$this->AlterNative2->TooltipValue = "";

		// AlterNative3
		$this->AlterNative3->LinkCustomAttributes = "";
		$this->AlterNative3->HrefValue = "";
		$this->AlterNative3->TooltipValue = "";

		// AlterNative4
		$this->AlterNative4->LinkCustomAttributes = "";
		$this->AlterNative4->HrefValue = "";
		$this->AlterNative4->TooltipValue = "";

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

		// ID
		$this->ID->EditAttrs["class"] = "form-control";
		$this->ID->EditCustomAttributes = "";
		$this->ID->EditValue = $this->ID->CurrentValue;
		$this->ID->ViewCustomAttributes = "";

		// Drug_Name
		$this->Drug_Name->EditAttrs["class"] = "form-control";
		$this->Drug_Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
		$this->Drug_Name->EditValue = $this->Drug_Name->CurrentValue;
		$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

		// Generic_Name
		$this->Generic_Name->EditAttrs["class"] = "form-control";
		$this->Generic_Name->EditCustomAttributes = "";

		// Trade_Name
		$this->Trade_Name->EditAttrs["class"] = "form-control";
		$this->Trade_Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
		$this->Trade_Name->EditValue = $this->Trade_Name->CurrentValue;
		$this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

		// PR_CODE
		$this->PR_CODE->EditAttrs["class"] = "form-control";
		$this->PR_CODE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
		$this->PR_CODE->EditValue = $this->PR_CODE->CurrentValue;
		$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

		// Form
		$this->Form->EditAttrs["class"] = "form-control";
		$this->Form->EditCustomAttributes = "";

		// Strength
		$this->Strength->EditAttrs["class"] = "form-control";
		$this->Strength->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
		$this->Strength->EditValue = $this->Strength->CurrentValue;
		$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

		// Unit
		$this->Unit->EditAttrs["class"] = "form-control";
		$this->Unit->EditCustomAttributes = "";

		// CONTAINER_TYPE
		$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
		$this->CONTAINER_TYPE->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
		$this->CONTAINER_TYPE->EditValue = $this->CONTAINER_TYPE->CurrentValue;
		$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

		// CONTAINER_STRENGTH
		$this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
		$this->CONTAINER_STRENGTH->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
		$this->CONTAINER_STRENGTH->EditValue = $this->CONTAINER_STRENGTH->CurrentValue;
		$this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

		// TypeOfDrug
		$this->TypeOfDrug->EditAttrs["class"] = "form-control";
		$this->TypeOfDrug->EditCustomAttributes = "";
		$this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(TRUE);

		// ProductType
		$this->ProductType->EditAttrs["class"] = "form-control";
		$this->ProductType->EditCustomAttributes = "";
		$this->ProductType->EditValue = $this->ProductType->options(TRUE);

		// Generic_Name1
		$this->Generic_Name1->EditAttrs["class"] = "form-control";
		$this->Generic_Name1->EditCustomAttributes = "";

		// Strength1
		$this->Strength1->EditAttrs["class"] = "form-control";
		$this->Strength1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
		$this->Strength1->EditValue = $this->Strength1->CurrentValue;
		$this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

		// Unit1
		$this->Unit1->EditAttrs["class"] = "form-control";
		$this->Unit1->EditCustomAttributes = "";

		// Generic_Name2
		$this->Generic_Name2->EditAttrs["class"] = "form-control";
		$this->Generic_Name2->EditCustomAttributes = "";

		// Strength2
		$this->Strength2->EditAttrs["class"] = "form-control";
		$this->Strength2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
		$this->Strength2->EditValue = $this->Strength2->CurrentValue;
		$this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

		// Unit2
		$this->Unit2->EditAttrs["class"] = "form-control";
		$this->Unit2->EditCustomAttributes = "";

		// Generic_Name3
		$this->Generic_Name3->EditAttrs["class"] = "form-control";
		$this->Generic_Name3->EditCustomAttributes = "";

		// Strength3
		$this->Strength3->EditAttrs["class"] = "form-control";
		$this->Strength3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
		$this->Strength3->EditValue = $this->Strength3->CurrentValue;
		$this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

		// Unit3
		$this->Unit3->EditAttrs["class"] = "form-control";
		$this->Unit3->EditCustomAttributes = "";

		// Generic_Name4
		$this->Generic_Name4->EditAttrs["class"] = "form-control";
		$this->Generic_Name4->EditCustomAttributes = "";

		// Generic_Name5
		$this->Generic_Name5->EditAttrs["class"] = "form-control";
		$this->Generic_Name5->EditCustomAttributes = "";

		// Strength4
		$this->Strength4->EditAttrs["class"] = "form-control";
		$this->Strength4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
		$this->Strength4->EditValue = $this->Strength4->CurrentValue;
		$this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

		// Strength5
		$this->Strength5->EditAttrs["class"] = "form-control";
		$this->Strength5->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
		$this->Strength5->EditValue = $this->Strength5->CurrentValue;
		$this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

		// Unit4
		$this->Unit4->EditAttrs["class"] = "form-control";
		$this->Unit4->EditCustomAttributes = "";

		// Unit5
		$this->Unit5->EditAttrs["class"] = "form-control";
		$this->Unit5->EditCustomAttributes = "";

		// AlterNative1
		$this->AlterNative1->EditAttrs["class"] = "form-control";
		$this->AlterNative1->EditCustomAttributes = "";

		// AlterNative2
		$this->AlterNative2->EditAttrs["class"] = "form-control";
		$this->AlterNative2->EditCustomAttributes = "";

		// AlterNative3
		$this->AlterNative3->EditAttrs["class"] = "form-control";
		$this->AlterNative3->EditCustomAttributes = "";

		// AlterNative4
		$this->AlterNative4->EditAttrs["class"] = "form-control";
		$this->AlterNative4->EditCustomAttributes = "";

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
					$doc->exportCaption($this->ID);
					$doc->exportCaption($this->Drug_Name);
					$doc->exportCaption($this->Generic_Name);
					$doc->exportCaption($this->Trade_Name);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->CONTAINER_TYPE);
					$doc->exportCaption($this->CONTAINER_STRENGTH);
					$doc->exportCaption($this->TypeOfDrug);
					$doc->exportCaption($this->ProductType);
					$doc->exportCaption($this->Generic_Name1);
					$doc->exportCaption($this->Strength1);
					$doc->exportCaption($this->Unit1);
					$doc->exportCaption($this->Generic_Name2);
					$doc->exportCaption($this->Strength2);
					$doc->exportCaption($this->Unit2);
					$doc->exportCaption($this->Generic_Name3);
					$doc->exportCaption($this->Strength3);
					$doc->exportCaption($this->Unit3);
					$doc->exportCaption($this->Generic_Name4);
					$doc->exportCaption($this->Generic_Name5);
					$doc->exportCaption($this->Strength4);
					$doc->exportCaption($this->Strength5);
					$doc->exportCaption($this->Unit4);
					$doc->exportCaption($this->Unit5);
					$doc->exportCaption($this->AlterNative1);
					$doc->exportCaption($this->AlterNative2);
					$doc->exportCaption($this->AlterNative3);
					$doc->exportCaption($this->AlterNative4);
				} else {
					$doc->exportCaption($this->ID);
					$doc->exportCaption($this->Drug_Name);
					$doc->exportCaption($this->Generic_Name);
					$doc->exportCaption($this->Trade_Name);
					$doc->exportCaption($this->PR_CODE);
					$doc->exportCaption($this->Form);
					$doc->exportCaption($this->Strength);
					$doc->exportCaption($this->Unit);
					$doc->exportCaption($this->TypeOfDrug);
					$doc->exportCaption($this->ProductType);
					$doc->exportCaption($this->Generic_Name1);
					$doc->exportCaption($this->Strength1);
					$doc->exportCaption($this->Unit1);
					$doc->exportCaption($this->Generic_Name2);
					$doc->exportCaption($this->Strength2);
					$doc->exportCaption($this->Unit2);
					$doc->exportCaption($this->Generic_Name3);
					$doc->exportCaption($this->Strength3);
					$doc->exportCaption($this->Unit3);
					$doc->exportCaption($this->Generic_Name4);
					$doc->exportCaption($this->Generic_Name5);
					$doc->exportCaption($this->Strength4);
					$doc->exportCaption($this->Strength5);
					$doc->exportCaption($this->Unit4);
					$doc->exportCaption($this->Unit5);
					$doc->exportCaption($this->AlterNative1);
					$doc->exportCaption($this->AlterNative2);
					$doc->exportCaption($this->AlterNative3);
					$doc->exportCaption($this->AlterNative4);
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
						$doc->exportField($this->ID);
						$doc->exportField($this->Drug_Name);
						$doc->exportField($this->Generic_Name);
						$doc->exportField($this->Trade_Name);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->Form);
						$doc->exportField($this->Strength);
						$doc->exportField($this->Unit);
						$doc->exportField($this->CONTAINER_TYPE);
						$doc->exportField($this->CONTAINER_STRENGTH);
						$doc->exportField($this->TypeOfDrug);
						$doc->exportField($this->ProductType);
						$doc->exportField($this->Generic_Name1);
						$doc->exportField($this->Strength1);
						$doc->exportField($this->Unit1);
						$doc->exportField($this->Generic_Name2);
						$doc->exportField($this->Strength2);
						$doc->exportField($this->Unit2);
						$doc->exportField($this->Generic_Name3);
						$doc->exportField($this->Strength3);
						$doc->exportField($this->Unit3);
						$doc->exportField($this->Generic_Name4);
						$doc->exportField($this->Generic_Name5);
						$doc->exportField($this->Strength4);
						$doc->exportField($this->Strength5);
						$doc->exportField($this->Unit4);
						$doc->exportField($this->Unit5);
						$doc->exportField($this->AlterNative1);
						$doc->exportField($this->AlterNative2);
						$doc->exportField($this->AlterNative3);
						$doc->exportField($this->AlterNative4);
					} else {
						$doc->exportField($this->ID);
						$doc->exportField($this->Drug_Name);
						$doc->exportField($this->Generic_Name);
						$doc->exportField($this->Trade_Name);
						$doc->exportField($this->PR_CODE);
						$doc->exportField($this->Form);
						$doc->exportField($this->Strength);
						$doc->exportField($this->Unit);
						$doc->exportField($this->TypeOfDrug);
						$doc->exportField($this->ProductType);
						$doc->exportField($this->Generic_Name1);
						$doc->exportField($this->Strength1);
						$doc->exportField($this->Unit1);
						$doc->exportField($this->Generic_Name2);
						$doc->exportField($this->Strength2);
						$doc->exportField($this->Unit2);
						$doc->exportField($this->Generic_Name3);
						$doc->exportField($this->Strength3);
						$doc->exportField($this->Unit3);
						$doc->exportField($this->Generic_Name4);
						$doc->exportField($this->Generic_Name5);
						$doc->exportField($this->Strength4);
						$doc->exportField($this->Strength5);
						$doc->exportField($this->Unit4);
						$doc->exportField($this->Unit5);
						$doc->exportField($this->AlterNative1);
						$doc->exportField($this->AlterNative2);
						$doc->exportField($this->AlterNative3);
						$doc->exportField($this->AlterNative4);
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