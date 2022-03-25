<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for ivf_outcome
 */
class ivf_outcome extends DbTable
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
	public $RIDNO;
	public $Name;
	public $Age;
	public $treatment_status;
	public $ARTCYCLE;
	public $RESULT;
	public $status;
	public $createdby;
	public $createddatetime;
	public $modifiedby;
	public $modifieddatetime;
	public $outcomeDate;
	public $outcomeDay;
	public $OPResult;
	public $Gestation;
	public $TransferdEmbryos;
	public $InitalOfSacs;
	public $ImplimentationRate;
	public $EmbryoNo;
	public $ExtrauterineSac;
	public $PregnancyMonozygotic;
	public $TypeGestation;
	public $Urine;
	public $PTdate;
	public $Reduced;
	public $INduced;
	public $INducedDate;
	public $Miscarriage;
	public $Induced1;
	public $Type;
	public $IfClinical;
	public $GADate;
	public $GA;
	public $FoetalDeath;
	public $FerinatalDeath;
	public $TidNo;
	public $Ectopic;
	public $Extra;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_outcome';
		$this->TableName = 'ivf_outcome';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_outcome`";
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

		// id
		$this->id = new DbField('ivf_outcome', 'ivf_outcome', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNO
		$this->RIDNO = new DbField('ivf_outcome', 'ivf_outcome', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, FALSE, '`RIDNO`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNO->IsForeignKey = TRUE; // Foreign key field
		$this->RIDNO->Sortable = TRUE; // Allow sort
		$this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNO'] = &$this->RIDNO;

		// Name
		$this->Name = new DbField('ivf_outcome', 'ivf_outcome', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->IsForeignKey = TRUE; // Foreign key field
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// Age
		$this->Age = new DbField('ivf_outcome', 'ivf_outcome', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, FALSE, '`Age`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Age->Sortable = TRUE; // Allow sort
		$this->fields['Age'] = &$this->Age;

		// treatment_status
		$this->treatment_status = new DbField('ivf_outcome', 'ivf_outcome', 'x_treatment_status', 'treatment_status', '`treatment_status`', '`treatment_status`', 200, 45, -1, FALSE, '`treatment_status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->treatment_status->Sortable = TRUE; // Allow sort
		$this->fields['treatment_status'] = &$this->treatment_status;

		// ARTCYCLE
		$this->ARTCYCLE = new DbField('ivf_outcome', 'ivf_outcome', 'x_ARTCYCLE', 'ARTCYCLE', '`ARTCYCLE`', '`ARTCYCLE`', 200, 45, -1, FALSE, '`ARTCYCLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ARTCYCLE->Sortable = TRUE; // Allow sort
		$this->fields['ARTCYCLE'] = &$this->ARTCYCLE;

		// RESULT
		$this->RESULT = new DbField('ivf_outcome', 'ivf_outcome', 'x_RESULT', 'RESULT', '`RESULT`', '`RESULT`', 200, 45, -1, FALSE, '`RESULT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RESULT->Sortable = TRUE; // Allow sort
		$this->fields['RESULT'] = &$this->RESULT;

		// status
		$this->status = new DbField('ivf_outcome', 'ivf_outcome', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('ivf_outcome', 'ivf_outcome', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('ivf_outcome', 'ivf_outcome', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('ivf_outcome', 'ivf_outcome', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('ivf_outcome', 'ivf_outcome', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// outcomeDate
		$this->outcomeDate = new DbField('ivf_outcome', 'ivf_outcome', 'x_outcomeDate', 'outcomeDate', '`outcomeDate`', CastDateFieldForLike("`outcomeDate`", 0, "DB"), 135, 19, 0, FALSE, '`outcomeDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->outcomeDate->Sortable = TRUE; // Allow sort
		$this->outcomeDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['outcomeDate'] = &$this->outcomeDate;

		// outcomeDay
		$this->outcomeDay = new DbField('ivf_outcome', 'ivf_outcome', 'x_outcomeDay', 'outcomeDay', '`outcomeDay`', CastDateFieldForLike("`outcomeDay`", 0, "DB"), 135, 19, 0, FALSE, '`outcomeDay`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->outcomeDay->Sortable = TRUE; // Allow sort
		$this->outcomeDay->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['outcomeDay'] = &$this->outcomeDay;

		// OPResult
		$this->OPResult = new DbField('ivf_outcome', 'ivf_outcome', 'x_OPResult', 'OPResult', '`OPResult`', '`OPResult`', 200, 45, -1, FALSE, '`OPResult`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPResult->Sortable = TRUE; // Allow sort
		$this->fields['OPResult'] = &$this->OPResult;

		// Gestation
		$this->Gestation = new DbField('ivf_outcome', 'ivf_outcome', 'x_Gestation', 'Gestation', '`Gestation`', '`Gestation`', 200, 45, -1, FALSE, '`Gestation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Gestation->Sortable = TRUE; // Allow sort
		$this->Gestation->Lookup = new Lookup('Gestation', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Gestation->OptionCount = 2;
		$this->fields['Gestation'] = &$this->Gestation;

		// TransferdEmbryos
		$this->TransferdEmbryos = new DbField('ivf_outcome', 'ivf_outcome', 'x_TransferdEmbryos', 'TransferdEmbryos', '`TransferdEmbryos`', '`TransferdEmbryos`', 200, 45, -1, FALSE, '`TransferdEmbryos`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransferdEmbryos->Sortable = TRUE; // Allow sort
		$this->fields['TransferdEmbryos'] = &$this->TransferdEmbryos;

		// InitalOfSacs
		$this->InitalOfSacs = new DbField('ivf_outcome', 'ivf_outcome', 'x_InitalOfSacs', 'InitalOfSacs', '`InitalOfSacs`', '`InitalOfSacs`', 200, 45, -1, FALSE, '`InitalOfSacs`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->InitalOfSacs->Sortable = TRUE; // Allow sort
		$this->fields['InitalOfSacs'] = &$this->InitalOfSacs;

		// ImplimentationRate
		$this->ImplimentationRate = new DbField('ivf_outcome', 'ivf_outcome', 'x_ImplimentationRate', 'ImplimentationRate', '`ImplimentationRate`', '`ImplimentationRate`', 200, 45, -1, FALSE, '`ImplimentationRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ImplimentationRate->Sortable = TRUE; // Allow sort
		$this->fields['ImplimentationRate'] = &$this->ImplimentationRate;

		// EmbryoNo
		$this->EmbryoNo = new DbField('ivf_outcome', 'ivf_outcome', 'x_EmbryoNo', 'EmbryoNo', '`EmbryoNo`', '`EmbryoNo`', 200, 45, -1, FALSE, '`EmbryoNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EmbryoNo->Sortable = TRUE; // Allow sort
		$this->fields['EmbryoNo'] = &$this->EmbryoNo;

		// ExtrauterineSac
		$this->ExtrauterineSac = new DbField('ivf_outcome', 'ivf_outcome', 'x_ExtrauterineSac', 'ExtrauterineSac', '`ExtrauterineSac`', '`ExtrauterineSac`', 200, 45, -1, FALSE, '`ExtrauterineSac`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExtrauterineSac->Sortable = TRUE; // Allow sort
		$this->fields['ExtrauterineSac'] = &$this->ExtrauterineSac;

		// PregnancyMonozygotic
		$this->PregnancyMonozygotic = new DbField('ivf_outcome', 'ivf_outcome', 'x_PregnancyMonozygotic', 'PregnancyMonozygotic', '`PregnancyMonozygotic`', '`PregnancyMonozygotic`', 200, 45, -1, FALSE, '`PregnancyMonozygotic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PregnancyMonozygotic->Sortable = TRUE; // Allow sort
		$this->fields['PregnancyMonozygotic'] = &$this->PregnancyMonozygotic;

		// TypeGestation
		$this->TypeGestation = new DbField('ivf_outcome', 'ivf_outcome', 'x_TypeGestation', 'TypeGestation', '`TypeGestation`', '`TypeGestation`', 200, 45, -1, FALSE, '`TypeGestation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TypeGestation->Sortable = TRUE; // Allow sort
		$this->fields['TypeGestation'] = &$this->TypeGestation;

		// Urine
		$this->Urine = new DbField('ivf_outcome', 'ivf_outcome', 'x_Urine', 'Urine', '`Urine`', '`Urine`', 200, 45, -1, FALSE, '`Urine`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Urine->Sortable = TRUE; // Allow sort
		$this->Urine->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Urine->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Urine->Lookup = new Lookup('Urine', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Urine->OptionCount = 2;
		$this->fields['Urine'] = &$this->Urine;

		// PTdate
		$this->PTdate = new DbField('ivf_outcome', 'ivf_outcome', 'x_PTdate', 'PTdate', '`PTdate`', '`PTdate`', 200, 45, -1, FALSE, '`PTdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PTdate->Sortable = TRUE; // Allow sort
		$this->fields['PTdate'] = &$this->PTdate;

		// Reduced
		$this->Reduced = new DbField('ivf_outcome', 'ivf_outcome', 'x_Reduced', 'Reduced', '`Reduced`', '`Reduced`', 200, 45, -1, FALSE, '`Reduced`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Reduced->Sortable = TRUE; // Allow sort
		$this->fields['Reduced'] = &$this->Reduced;

		// INduced
		$this->INduced = new DbField('ivf_outcome', 'ivf_outcome', 'x_INduced', 'INduced', '`INduced`', '`INduced`', 200, 45, -1, FALSE, '`INduced`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INduced->Sortable = TRUE; // Allow sort
		$this->fields['INduced'] = &$this->INduced;

		// INducedDate
		$this->INducedDate = new DbField('ivf_outcome', 'ivf_outcome', 'x_INducedDate', 'INducedDate', '`INducedDate`', '`INducedDate`', 200, 45, -1, FALSE, '`INducedDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INducedDate->Sortable = TRUE; // Allow sort
		$this->fields['INducedDate'] = &$this->INducedDate;

		// Miscarriage
		$this->Miscarriage = new DbField('ivf_outcome', 'ivf_outcome', 'x_Miscarriage', 'Miscarriage', '`Miscarriage`', '`Miscarriage`', 200, 45, -1, FALSE, '`Miscarriage`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Miscarriage->Sortable = TRUE; // Allow sort
		$this->Miscarriage->Lookup = new Lookup('Miscarriage', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Miscarriage->OptionCount = 2;
		$this->fields['Miscarriage'] = &$this->Miscarriage;

		// Induced1
		$this->Induced1 = new DbField('ivf_outcome', 'ivf_outcome', 'x_Induced1', 'Induced1', '`Induced1`', '`Induced1`', 200, 45, -1, FALSE, '`Induced1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Induced1->Sortable = TRUE; // Allow sort
		$this->Induced1->Lookup = new Lookup('Induced1', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Induced1->OptionCount = 2;
		$this->fields['Induced1'] = &$this->Induced1;

		// Type
		$this->Type = new DbField('ivf_outcome', 'ivf_outcome', 'x_Type', 'Type', '`Type`', '`Type`', 200, 45, -1, FALSE, '`Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Type->Sortable = TRUE; // Allow sort
		$this->Type->Lookup = new Lookup('Type', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Type->OptionCount = 2;
		$this->fields['Type'] = &$this->Type;

		// IfClinical
		$this->IfClinical = new DbField('ivf_outcome', 'ivf_outcome', 'x_IfClinical', 'IfClinical', '`IfClinical`', '`IfClinical`', 200, 45, -1, FALSE, '`IfClinical`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IfClinical->Sortable = TRUE; // Allow sort
		$this->fields['IfClinical'] = &$this->IfClinical;

		// GADate
		$this->GADate = new DbField('ivf_outcome', 'ivf_outcome', 'x_GADate', 'GADate', '`GADate`', '`GADate`', 200, 45, -1, FALSE, '`GADate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GADate->Sortable = TRUE; // Allow sort
		$this->fields['GADate'] = &$this->GADate;

		// GA
		$this->GA = new DbField('ivf_outcome', 'ivf_outcome', 'x_GA', 'GA', '`GA`', '`GA`', 200, 45, -1, FALSE, '`GA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GA->Sortable = TRUE; // Allow sort
		$this->fields['GA'] = &$this->GA;

		// FoetalDeath
		$this->FoetalDeath = new DbField('ivf_outcome', 'ivf_outcome', 'x_FoetalDeath', 'FoetalDeath', '`FoetalDeath`', '`FoetalDeath`', 200, 45, -1, FALSE, '`FoetalDeath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->FoetalDeath->Sortable = TRUE; // Allow sort
		$this->FoetalDeath->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->FoetalDeath->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->FoetalDeath->Lookup = new Lookup('FoetalDeath', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FoetalDeath->OptionCount = 2;
		$this->fields['FoetalDeath'] = &$this->FoetalDeath;

		// FerinatalDeath
		$this->FerinatalDeath = new DbField('ivf_outcome', 'ivf_outcome', 'x_FerinatalDeath', 'FerinatalDeath', '`FerinatalDeath`', '`FerinatalDeath`', 200, 45, -1, FALSE, '`FerinatalDeath`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->FerinatalDeath->Sortable = TRUE; // Allow sort
		$this->FerinatalDeath->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->FerinatalDeath->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->FerinatalDeath->Lookup = new Lookup('FerinatalDeath', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->FerinatalDeath->OptionCount = 2;
		$this->fields['FerinatalDeath'] = &$this->FerinatalDeath;

		// TidNo
		$this->TidNo = new DbField('ivf_outcome', 'ivf_outcome', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->IsForeignKey = TRUE; // Foreign key field
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// Ectopic
		$this->Ectopic = new DbField('ivf_outcome', 'ivf_outcome', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 200, 45, -1, FALSE, '`Ectopic`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Ectopic->Sortable = TRUE; // Allow sort
		$this->Ectopic->Lookup = new Lookup('Ectopic', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Ectopic->OptionCount = 3;
		$this->fields['Ectopic'] = &$this->Ectopic;

		// Extra
		$this->Extra = new DbField('ivf_outcome', 'ivf_outcome', 'x_Extra', 'Extra', '`Extra`', '`Extra`', 200, 45, -1, FALSE, '`Extra`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Extra->Sortable = TRUE; // Allow sort
		$this->Extra->Lookup = new Lookup('Extra', 'ivf_outcome', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Extra->OptionCount = 3;
		$this->fields['Extra'] = &$this->Extra;
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
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
			if ($this->RIDNO->getSessionValue() != "")
				$masterFilter .= "`RIDNO`=" . QuotedValue($this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() != "")
				$masterFilter .= " AND `Name`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->TidNo->getSessionValue() != "")
				$masterFilter .= " AND `id`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
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
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
			if ($this->RIDNO->getSessionValue() != "")
				$detailFilter .= "`RIDNO`=" . QuotedValue($this->RIDNO->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() != "")
				$detailFilter .= " AND `Name`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
			if ($this->TidNo->getSessionValue() != "")
				$detailFilter .= " AND `TidNo`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_ivf_treatment_plan()
	{
		return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_ivf_treatment_plan()
	{
		return "`RIDNO`=@RIDNO@ AND `Name`='@Name@' AND `TidNo`=@TidNo@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_outcome`";
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
		$this->id->DbValue = $row['id'];
		$this->RIDNO->DbValue = $row['RIDNO'];
		$this->Name->DbValue = $row['Name'];
		$this->Age->DbValue = $row['Age'];
		$this->treatment_status->DbValue = $row['treatment_status'];
		$this->ARTCYCLE->DbValue = $row['ARTCYCLE'];
		$this->RESULT->DbValue = $row['RESULT'];
		$this->status->DbValue = $row['status'];
		$this->createdby->DbValue = $row['createdby'];
		$this->createddatetime->DbValue = $row['createddatetime'];
		$this->modifiedby->DbValue = $row['modifiedby'];
		$this->modifieddatetime->DbValue = $row['modifieddatetime'];
		$this->outcomeDate->DbValue = $row['outcomeDate'];
		$this->outcomeDay->DbValue = $row['outcomeDay'];
		$this->OPResult->DbValue = $row['OPResult'];
		$this->Gestation->DbValue = $row['Gestation'];
		$this->TransferdEmbryos->DbValue = $row['TransferdEmbryos'];
		$this->InitalOfSacs->DbValue = $row['InitalOfSacs'];
		$this->ImplimentationRate->DbValue = $row['ImplimentationRate'];
		$this->EmbryoNo->DbValue = $row['EmbryoNo'];
		$this->ExtrauterineSac->DbValue = $row['ExtrauterineSac'];
		$this->PregnancyMonozygotic->DbValue = $row['PregnancyMonozygotic'];
		$this->TypeGestation->DbValue = $row['TypeGestation'];
		$this->Urine->DbValue = $row['Urine'];
		$this->PTdate->DbValue = $row['PTdate'];
		$this->Reduced->DbValue = $row['Reduced'];
		$this->INduced->DbValue = $row['INduced'];
		$this->INducedDate->DbValue = $row['INducedDate'];
		$this->Miscarriage->DbValue = $row['Miscarriage'];
		$this->Induced1->DbValue = $row['Induced1'];
		$this->Type->DbValue = $row['Type'];
		$this->IfClinical->DbValue = $row['IfClinical'];
		$this->GADate->DbValue = $row['GADate'];
		$this->GA->DbValue = $row['GA'];
		$this->FoetalDeath->DbValue = $row['FoetalDeath'];
		$this->FerinatalDeath->DbValue = $row['FerinatalDeath'];
		$this->TidNo->DbValue = $row['TidNo'];
		$this->Ectopic->DbValue = $row['Ectopic'];
		$this->Extra->DbValue = $row['Extra'];
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
			return "ivf_outcomelist.php";
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
		if ($pageName == "ivf_outcomeview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_outcomeedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_outcomeadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_outcomelist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("ivf_outcomeview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_outcomeview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "ivf_outcomeadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_outcomeadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_outcomeedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_outcomeadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_outcomedelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "ivf_treatment_plan" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_RIDNO=" . urlencode($this->RIDNO->CurrentValue);
			$url .= "&fk_Name=" . urlencode($this->Name->CurrentValue);
			$url .= "&fk_id=" . urlencode($this->TidNo->CurrentValue);
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
		$this->RIDNO->setDbValue($rs->fields('RIDNO'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->Age->setDbValue($rs->fields('Age'));
		$this->treatment_status->setDbValue($rs->fields('treatment_status'));
		$this->ARTCYCLE->setDbValue($rs->fields('ARTCYCLE'));
		$this->RESULT->setDbValue($rs->fields('RESULT'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->outcomeDate->setDbValue($rs->fields('outcomeDate'));
		$this->outcomeDay->setDbValue($rs->fields('outcomeDay'));
		$this->OPResult->setDbValue($rs->fields('OPResult'));
		$this->Gestation->setDbValue($rs->fields('Gestation'));
		$this->TransferdEmbryos->setDbValue($rs->fields('TransferdEmbryos'));
		$this->InitalOfSacs->setDbValue($rs->fields('InitalOfSacs'));
		$this->ImplimentationRate->setDbValue($rs->fields('ImplimentationRate'));
		$this->EmbryoNo->setDbValue($rs->fields('EmbryoNo'));
		$this->ExtrauterineSac->setDbValue($rs->fields('ExtrauterineSac'));
		$this->PregnancyMonozygotic->setDbValue($rs->fields('PregnancyMonozygotic'));
		$this->TypeGestation->setDbValue($rs->fields('TypeGestation'));
		$this->Urine->setDbValue($rs->fields('Urine'));
		$this->PTdate->setDbValue($rs->fields('PTdate'));
		$this->Reduced->setDbValue($rs->fields('Reduced'));
		$this->INduced->setDbValue($rs->fields('INduced'));
		$this->INducedDate->setDbValue($rs->fields('INducedDate'));
		$this->Miscarriage->setDbValue($rs->fields('Miscarriage'));
		$this->Induced1->setDbValue($rs->fields('Induced1'));
		$this->Type->setDbValue($rs->fields('Type'));
		$this->IfClinical->setDbValue($rs->fields('IfClinical'));
		$this->GADate->setDbValue($rs->fields('GADate'));
		$this->GA->setDbValue($rs->fields('GA'));
		$this->FoetalDeath->setDbValue($rs->fields('FoetalDeath'));
		$this->FerinatalDeath->setDbValue($rs->fields('FerinatalDeath'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->Ectopic->setDbValue($rs->fields('Ectopic'));
		$this->Extra->setDbValue($rs->fields('Extra'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// RIDNO
		// Name
		// Age
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// outcomeDate
		// outcomeDay
		// OPResult
		// Gestation
		// TransferdEmbryos
		// InitalOfSacs
		// ImplimentationRate
		// EmbryoNo
		// ExtrauterineSac
		// PregnancyMonozygotic
		// TypeGestation
		// Urine
		// PTdate
		// Reduced
		// INduced
		// INducedDate
		// Miscarriage
		// Induced1
		// Type
		// IfClinical
		// GADate
		// GA
		// FoetalDeath
		// FerinatalDeath
		// TidNo
		// Ectopic
		// Extra
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// RIDNO
		$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
		$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
		$this->RIDNO->ViewCustomAttributes = "";

		// Name
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";

		// Age
		$this->Age->ViewValue = $this->Age->CurrentValue;
		$this->Age->ViewCustomAttributes = "";

		// treatment_status
		$this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
		$this->treatment_status->ViewCustomAttributes = "";

		// ARTCYCLE
		$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
		$this->ARTCYCLE->ViewCustomAttributes = "";

		// RESULT
		$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
		$this->RESULT->ViewCustomAttributes = "";

		// status
		$this->status->ViewValue = $this->status->CurrentValue;
		$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
		$this->status->ViewCustomAttributes = "";

		// createdby
		$this->createdby->ViewValue = $this->createdby->CurrentValue;
		$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
		$this->createdby->ViewCustomAttributes = "";

		// createddatetime
		$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
		$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
		$this->createddatetime->ViewCustomAttributes = "";

		// modifiedby
		$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
		$this->modifiedby->ViewCustomAttributes = "";

		// modifieddatetime
		$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
		$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
		$this->modifieddatetime->ViewCustomAttributes = "";

		// outcomeDate
		$this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
		$this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
		$this->outcomeDate->ViewCustomAttributes = "";

		// outcomeDay
		$this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
		$this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
		$this->outcomeDay->ViewCustomAttributes = "";

		// OPResult
		$this->OPResult->ViewValue = $this->OPResult->CurrentValue;
		$this->OPResult->ViewCustomAttributes = "";

		// Gestation
		if (strval($this->Gestation->CurrentValue) != "") {
			$this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
		} else {
			$this->Gestation->ViewValue = NULL;
		}
		$this->Gestation->ViewCustomAttributes = "";

		// TransferdEmbryos
		$this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
		$this->TransferdEmbryos->ViewCustomAttributes = "";

		// InitalOfSacs
		$this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
		$this->InitalOfSacs->ViewCustomAttributes = "";

		// ImplimentationRate
		$this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
		$this->ImplimentationRate->ViewCustomAttributes = "";

		// EmbryoNo
		$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
		$this->EmbryoNo->ViewCustomAttributes = "";

		// ExtrauterineSac
		$this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
		$this->ExtrauterineSac->ViewCustomAttributes = "";

		// PregnancyMonozygotic
		$this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
		$this->PregnancyMonozygotic->ViewCustomAttributes = "";

		// TypeGestation
		$this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
		$this->TypeGestation->ViewCustomAttributes = "";

		// Urine
		if (strval($this->Urine->CurrentValue) != "") {
			$this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
		} else {
			$this->Urine->ViewValue = NULL;
		}
		$this->Urine->ViewCustomAttributes = "";

		// PTdate
		$this->PTdate->ViewValue = $this->PTdate->CurrentValue;
		$this->PTdate->ViewCustomAttributes = "";

		// Reduced
		$this->Reduced->ViewValue = $this->Reduced->CurrentValue;
		$this->Reduced->ViewCustomAttributes = "";

		// INduced
		$this->INduced->ViewValue = $this->INduced->CurrentValue;
		$this->INduced->ViewCustomAttributes = "";

		// INducedDate
		$this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
		$this->INducedDate->ViewCustomAttributes = "";

		// Miscarriage
		if (strval($this->Miscarriage->CurrentValue) != "") {
			$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
		} else {
			$this->Miscarriage->ViewValue = NULL;
		}
		$this->Miscarriage->ViewCustomAttributes = "";

		// Induced1
		if (strval($this->Induced1->CurrentValue) != "") {
			$this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
		} else {
			$this->Induced1->ViewValue = NULL;
		}
		$this->Induced1->ViewCustomAttributes = "";

		// Type
		if (strval($this->Type->CurrentValue) != "") {
			$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
		} else {
			$this->Type->ViewValue = NULL;
		}
		$this->Type->ViewCustomAttributes = "";

		// IfClinical
		$this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
		$this->IfClinical->ViewCustomAttributes = "";

		// GADate
		$this->GADate->ViewValue = $this->GADate->CurrentValue;
		$this->GADate->ViewCustomAttributes = "";

		// GA
		$this->GA->ViewValue = $this->GA->CurrentValue;
		$this->GA->ViewCustomAttributes = "";

		// FoetalDeath
		if (strval($this->FoetalDeath->CurrentValue) != "") {
			$this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
		} else {
			$this->FoetalDeath->ViewValue = NULL;
		}
		$this->FoetalDeath->ViewCustomAttributes = "";

		// FerinatalDeath
		if (strval($this->FerinatalDeath->CurrentValue) != "") {
			$this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
		} else {
			$this->FerinatalDeath->ViewValue = NULL;
		}
		$this->FerinatalDeath->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

		// Ectopic
		if (strval($this->Ectopic->CurrentValue) != "") {
			$this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
		} else {
			$this->Ectopic->ViewValue = NULL;
		}
		$this->Ectopic->ViewCustomAttributes = "";

		// Extra
		if (strval($this->Extra->CurrentValue) != "") {
			$this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
		} else {
			$this->Extra->ViewValue = NULL;
		}
		$this->Extra->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// RIDNO
		$this->RIDNO->LinkCustomAttributes = "";
		$this->RIDNO->HrefValue = "";
		$this->RIDNO->TooltipValue = "";

		// Name
		$this->Name->LinkCustomAttributes = "";
		$this->Name->HrefValue = "";
		$this->Name->TooltipValue = "";

		// Age
		$this->Age->LinkCustomAttributes = "";
		$this->Age->HrefValue = "";
		$this->Age->TooltipValue = "";

		// treatment_status
		$this->treatment_status->LinkCustomAttributes = "";
		$this->treatment_status->HrefValue = "";
		$this->treatment_status->TooltipValue = "";

		// ARTCYCLE
		$this->ARTCYCLE->LinkCustomAttributes = "";
		$this->ARTCYCLE->HrefValue = "";
		$this->ARTCYCLE->TooltipValue = "";

		// RESULT
		$this->RESULT->LinkCustomAttributes = "";
		$this->RESULT->HrefValue = "";
		$this->RESULT->TooltipValue = "";

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

		// outcomeDate
		$this->outcomeDate->LinkCustomAttributes = "";
		$this->outcomeDate->HrefValue = "";
		$this->outcomeDate->TooltipValue = "";

		// outcomeDay
		$this->outcomeDay->LinkCustomAttributes = "";
		$this->outcomeDay->HrefValue = "";
		$this->outcomeDay->TooltipValue = "";

		// OPResult
		$this->OPResult->LinkCustomAttributes = "";
		$this->OPResult->HrefValue = "";
		$this->OPResult->TooltipValue = "";

		// Gestation
		$this->Gestation->LinkCustomAttributes = "";
		$this->Gestation->HrefValue = "";
		$this->Gestation->TooltipValue = "";

		// TransferdEmbryos
		$this->TransferdEmbryos->LinkCustomAttributes = "";
		$this->TransferdEmbryos->HrefValue = "";
		$this->TransferdEmbryos->TooltipValue = "";

		// InitalOfSacs
		$this->InitalOfSacs->LinkCustomAttributes = "";
		$this->InitalOfSacs->HrefValue = "";
		$this->InitalOfSacs->TooltipValue = "";

		// ImplimentationRate
		$this->ImplimentationRate->LinkCustomAttributes = "";
		$this->ImplimentationRate->HrefValue = "";
		$this->ImplimentationRate->TooltipValue = "";

		// EmbryoNo
		$this->EmbryoNo->LinkCustomAttributes = "";
		$this->EmbryoNo->HrefValue = "";
		$this->EmbryoNo->TooltipValue = "";

		// ExtrauterineSac
		$this->ExtrauterineSac->LinkCustomAttributes = "";
		$this->ExtrauterineSac->HrefValue = "";
		$this->ExtrauterineSac->TooltipValue = "";

		// PregnancyMonozygotic
		$this->PregnancyMonozygotic->LinkCustomAttributes = "";
		$this->PregnancyMonozygotic->HrefValue = "";
		$this->PregnancyMonozygotic->TooltipValue = "";

		// TypeGestation
		$this->TypeGestation->LinkCustomAttributes = "";
		$this->TypeGestation->HrefValue = "";
		$this->TypeGestation->TooltipValue = "";

		// Urine
		$this->Urine->LinkCustomAttributes = "";
		$this->Urine->HrefValue = "";
		$this->Urine->TooltipValue = "";

		// PTdate
		$this->PTdate->LinkCustomAttributes = "";
		$this->PTdate->HrefValue = "";
		$this->PTdate->TooltipValue = "";

		// Reduced
		$this->Reduced->LinkCustomAttributes = "";
		$this->Reduced->HrefValue = "";
		$this->Reduced->TooltipValue = "";

		// INduced
		$this->INduced->LinkCustomAttributes = "";
		$this->INduced->HrefValue = "";
		$this->INduced->TooltipValue = "";

		// INducedDate
		$this->INducedDate->LinkCustomAttributes = "";
		$this->INducedDate->HrefValue = "";
		$this->INducedDate->TooltipValue = "";

		// Miscarriage
		$this->Miscarriage->LinkCustomAttributes = "";
		$this->Miscarriage->HrefValue = "";
		$this->Miscarriage->TooltipValue = "";

		// Induced1
		$this->Induced1->LinkCustomAttributes = "";
		$this->Induced1->HrefValue = "";
		$this->Induced1->TooltipValue = "";

		// Type
		$this->Type->LinkCustomAttributes = "";
		$this->Type->HrefValue = "";
		$this->Type->TooltipValue = "";

		// IfClinical
		$this->IfClinical->LinkCustomAttributes = "";
		$this->IfClinical->HrefValue = "";
		$this->IfClinical->TooltipValue = "";

		// GADate
		$this->GADate->LinkCustomAttributes = "";
		$this->GADate->HrefValue = "";
		$this->GADate->TooltipValue = "";

		// GA
		$this->GA->LinkCustomAttributes = "";
		$this->GA->HrefValue = "";
		$this->GA->TooltipValue = "";

		// FoetalDeath
		$this->FoetalDeath->LinkCustomAttributes = "";
		$this->FoetalDeath->HrefValue = "";
		$this->FoetalDeath->TooltipValue = "";

		// FerinatalDeath
		$this->FerinatalDeath->LinkCustomAttributes = "";
		$this->FerinatalDeath->HrefValue = "";
		$this->FerinatalDeath->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

		// Ectopic
		$this->Ectopic->LinkCustomAttributes = "";
		$this->Ectopic->HrefValue = "";
		$this->Ectopic->TooltipValue = "";

		// Extra
		$this->Extra->LinkCustomAttributes = "";
		$this->Extra->HrefValue = "";
		$this->Extra->TooltipValue = "";

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

		// RIDNO
		$this->RIDNO->EditAttrs["class"] = "form-control";
		$this->RIDNO->EditCustomAttributes = "";
		if ($this->RIDNO->getSessionValue() != "") {
			$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";
		} else {
			$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
		}

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if ($this->Name->getSessionValue() != "") {
			$this->Name->CurrentValue = $this->Name->getSessionValue();
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
		} else {
			if (!$this->Name->Raw)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = $this->Name->CurrentValue;
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
		}

		// Age
		$this->Age->EditAttrs["class"] = "form-control";
		$this->Age->EditCustomAttributes = "";
		if (!$this->Age->Raw)
			$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
		$this->Age->EditValue = $this->Age->CurrentValue;
		$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

		// treatment_status
		$this->treatment_status->EditAttrs["class"] = "form-control";
		$this->treatment_status->EditCustomAttributes = "";
		if (!$this->treatment_status->Raw)
			$this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
		$this->treatment_status->EditValue = $this->treatment_status->CurrentValue;
		$this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

		// ARTCYCLE
		$this->ARTCYCLE->EditAttrs["class"] = "form-control";
		$this->ARTCYCLE->EditCustomAttributes = "";
		if (!$this->ARTCYCLE->Raw)
			$this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
		$this->ARTCYCLE->EditValue = $this->ARTCYCLE->CurrentValue;
		$this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

		// RESULT
		$this->RESULT->EditAttrs["class"] = "form-control";
		$this->RESULT->EditCustomAttributes = "";
		if (!$this->RESULT->Raw)
			$this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
		$this->RESULT->EditValue = $this->RESULT->CurrentValue;
		$this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		$this->createdby->EditAttrs["class"] = "form-control";
		$this->createdby->EditCustomAttributes = "";
		$this->createdby->EditValue = $this->createdby->CurrentValue;
		$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

		// createddatetime
		$this->createddatetime->EditAttrs["class"] = "form-control";
		$this->createddatetime->EditCustomAttributes = "";
		$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->CurrentValue, 8);
		$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

		// modifiedby
		$this->modifiedby->EditAttrs["class"] = "form-control";
		$this->modifiedby->EditCustomAttributes = "";
		$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
		$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

		// modifieddatetime
		$this->modifieddatetime->EditAttrs["class"] = "form-control";
		$this->modifieddatetime->EditCustomAttributes = "";
		$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->CurrentValue, 8);
		$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

		// outcomeDate
		$this->outcomeDate->EditAttrs["class"] = "form-control";
		$this->outcomeDate->EditCustomAttributes = "";
		$this->outcomeDate->EditValue = FormatDateTime($this->outcomeDate->CurrentValue, 8);
		$this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

		// outcomeDay
		$this->outcomeDay->EditAttrs["class"] = "form-control";
		$this->outcomeDay->EditCustomAttributes = "";
		$this->outcomeDay->EditValue = FormatDateTime($this->outcomeDay->CurrentValue, 8);
		$this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

		// OPResult
		$this->OPResult->EditAttrs["class"] = "form-control";
		$this->OPResult->EditCustomAttributes = "";
		if (!$this->OPResult->Raw)
			$this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
		$this->OPResult->EditValue = $this->OPResult->CurrentValue;
		$this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

		// Gestation
		$this->Gestation->EditCustomAttributes = "";
		$this->Gestation->EditValue = $this->Gestation->options(FALSE);

		// TransferdEmbryos
		$this->TransferdEmbryos->EditAttrs["class"] = "form-control";
		$this->TransferdEmbryos->EditCustomAttributes = "";
		if (!$this->TransferdEmbryos->Raw)
			$this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
		$this->TransferdEmbryos->EditValue = $this->TransferdEmbryos->CurrentValue;
		$this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

		// InitalOfSacs
		$this->InitalOfSacs->EditAttrs["class"] = "form-control";
		$this->InitalOfSacs->EditCustomAttributes = "";
		if (!$this->InitalOfSacs->Raw)
			$this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
		$this->InitalOfSacs->EditValue = $this->InitalOfSacs->CurrentValue;
		$this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

		// ImplimentationRate
		$this->ImplimentationRate->EditAttrs["class"] = "form-control";
		$this->ImplimentationRate->EditCustomAttributes = "";
		if (!$this->ImplimentationRate->Raw)
			$this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
		$this->ImplimentationRate->EditValue = $this->ImplimentationRate->CurrentValue;
		$this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

		// EmbryoNo
		$this->EmbryoNo->EditAttrs["class"] = "form-control";
		$this->EmbryoNo->EditCustomAttributes = "";
		if (!$this->EmbryoNo->Raw)
			$this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
		$this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
		$this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

		// ExtrauterineSac
		$this->ExtrauterineSac->EditAttrs["class"] = "form-control";
		$this->ExtrauterineSac->EditCustomAttributes = "";
		if (!$this->ExtrauterineSac->Raw)
			$this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
		$this->ExtrauterineSac->EditValue = $this->ExtrauterineSac->CurrentValue;
		$this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

		// PregnancyMonozygotic
		$this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
		$this->PregnancyMonozygotic->EditCustomAttributes = "";
		if (!$this->PregnancyMonozygotic->Raw)
			$this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
		$this->PregnancyMonozygotic->EditValue = $this->PregnancyMonozygotic->CurrentValue;
		$this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

		// TypeGestation
		$this->TypeGestation->EditAttrs["class"] = "form-control";
		$this->TypeGestation->EditCustomAttributes = "";
		if (!$this->TypeGestation->Raw)
			$this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
		$this->TypeGestation->EditValue = $this->TypeGestation->CurrentValue;
		$this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

		// Urine
		$this->Urine->EditAttrs["class"] = "form-control";
		$this->Urine->EditCustomAttributes = "";
		$this->Urine->EditValue = $this->Urine->options(TRUE);

		// PTdate
		$this->PTdate->EditAttrs["class"] = "form-control";
		$this->PTdate->EditCustomAttributes = "";
		if (!$this->PTdate->Raw)
			$this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
		$this->PTdate->EditValue = $this->PTdate->CurrentValue;
		$this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

		// Reduced
		$this->Reduced->EditAttrs["class"] = "form-control";
		$this->Reduced->EditCustomAttributes = "";
		if (!$this->Reduced->Raw)
			$this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
		$this->Reduced->EditValue = $this->Reduced->CurrentValue;
		$this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

		// INduced
		$this->INduced->EditAttrs["class"] = "form-control";
		$this->INduced->EditCustomAttributes = "";
		if (!$this->INduced->Raw)
			$this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
		$this->INduced->EditValue = $this->INduced->CurrentValue;
		$this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

		// INducedDate
		$this->INducedDate->EditAttrs["class"] = "form-control";
		$this->INducedDate->EditCustomAttributes = "";
		if (!$this->INducedDate->Raw)
			$this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
		$this->INducedDate->EditValue = $this->INducedDate->CurrentValue;
		$this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

		// Miscarriage
		$this->Miscarriage->EditCustomAttributes = "";
		$this->Miscarriage->EditValue = $this->Miscarriage->options(FALSE);

		// Induced1
		$this->Induced1->EditCustomAttributes = "";
		$this->Induced1->EditValue = $this->Induced1->options(FALSE);

		// Type
		$this->Type->EditCustomAttributes = "";
		$this->Type->EditValue = $this->Type->options(FALSE);

		// IfClinical
		$this->IfClinical->EditAttrs["class"] = "form-control";
		$this->IfClinical->EditCustomAttributes = "";
		if (!$this->IfClinical->Raw)
			$this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
		$this->IfClinical->EditValue = $this->IfClinical->CurrentValue;
		$this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

		// GADate
		$this->GADate->EditAttrs["class"] = "form-control";
		$this->GADate->EditCustomAttributes = "";
		if (!$this->GADate->Raw)
			$this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
		$this->GADate->EditValue = $this->GADate->CurrentValue;
		$this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

		// GA
		$this->GA->EditAttrs["class"] = "form-control";
		$this->GA->EditCustomAttributes = "";
		if (!$this->GA->Raw)
			$this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
		$this->GA->EditValue = $this->GA->CurrentValue;
		$this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

		// FoetalDeath
		$this->FoetalDeath->EditAttrs["class"] = "form-control";
		$this->FoetalDeath->EditCustomAttributes = "";
		$this->FoetalDeath->EditValue = $this->FoetalDeath->options(TRUE);

		// FerinatalDeath
		$this->FerinatalDeath->EditAttrs["class"] = "form-control";
		$this->FerinatalDeath->EditCustomAttributes = "";
		$this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(TRUE);

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		if ($this->TidNo->getSessionValue() != "") {
			$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
		} else {
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
		}

		// Ectopic
		$this->Ectopic->EditCustomAttributes = "";
		$this->Ectopic->EditValue = $this->Ectopic->options(FALSE);

		// Extra
		$this->Extra->EditCustomAttributes = "";
		$this->Extra->EditValue = $this->Extra->options(FALSE);

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
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->treatment_status);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->outcomeDate);
					$doc->exportCaption($this->outcomeDay);
					$doc->exportCaption($this->OPResult);
					$doc->exportCaption($this->Gestation);
					$doc->exportCaption($this->TransferdEmbryos);
					$doc->exportCaption($this->InitalOfSacs);
					$doc->exportCaption($this->ImplimentationRate);
					$doc->exportCaption($this->EmbryoNo);
					$doc->exportCaption($this->ExtrauterineSac);
					$doc->exportCaption($this->PregnancyMonozygotic);
					$doc->exportCaption($this->TypeGestation);
					$doc->exportCaption($this->Urine);
					$doc->exportCaption($this->PTdate);
					$doc->exportCaption($this->Reduced);
					$doc->exportCaption($this->INduced);
					$doc->exportCaption($this->INducedDate);
					$doc->exportCaption($this->Miscarriage);
					$doc->exportCaption($this->Induced1);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->IfClinical);
					$doc->exportCaption($this->GADate);
					$doc->exportCaption($this->GA);
					$doc->exportCaption($this->FoetalDeath);
					$doc->exportCaption($this->FerinatalDeath);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Ectopic);
					$doc->exportCaption($this->Extra);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNO);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->Age);
					$doc->exportCaption($this->treatment_status);
					$doc->exportCaption($this->ARTCYCLE);
					$doc->exportCaption($this->RESULT);
					$doc->exportCaption($this->status);
					$doc->exportCaption($this->createdby);
					$doc->exportCaption($this->createddatetime);
					$doc->exportCaption($this->modifiedby);
					$doc->exportCaption($this->modifieddatetime);
					$doc->exportCaption($this->outcomeDate);
					$doc->exportCaption($this->outcomeDay);
					$doc->exportCaption($this->OPResult);
					$doc->exportCaption($this->Gestation);
					$doc->exportCaption($this->TransferdEmbryos);
					$doc->exportCaption($this->InitalOfSacs);
					$doc->exportCaption($this->ImplimentationRate);
					$doc->exportCaption($this->EmbryoNo);
					$doc->exportCaption($this->ExtrauterineSac);
					$doc->exportCaption($this->PregnancyMonozygotic);
					$doc->exportCaption($this->TypeGestation);
					$doc->exportCaption($this->Urine);
					$doc->exportCaption($this->PTdate);
					$doc->exportCaption($this->Reduced);
					$doc->exportCaption($this->INduced);
					$doc->exportCaption($this->INducedDate);
					$doc->exportCaption($this->Miscarriage);
					$doc->exportCaption($this->Induced1);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->IfClinical);
					$doc->exportCaption($this->GADate);
					$doc->exportCaption($this->GA);
					$doc->exportCaption($this->FoetalDeath);
					$doc->exportCaption($this->FerinatalDeath);
					$doc->exportCaption($this->TidNo);
					$doc->exportCaption($this->Ectopic);
					$doc->exportCaption($this->Extra);
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
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->treatment_status);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->outcomeDate);
						$doc->exportField($this->outcomeDay);
						$doc->exportField($this->OPResult);
						$doc->exportField($this->Gestation);
						$doc->exportField($this->TransferdEmbryos);
						$doc->exportField($this->InitalOfSacs);
						$doc->exportField($this->ImplimentationRate);
						$doc->exportField($this->EmbryoNo);
						$doc->exportField($this->ExtrauterineSac);
						$doc->exportField($this->PregnancyMonozygotic);
						$doc->exportField($this->TypeGestation);
						$doc->exportField($this->Urine);
						$doc->exportField($this->PTdate);
						$doc->exportField($this->Reduced);
						$doc->exportField($this->INduced);
						$doc->exportField($this->INducedDate);
						$doc->exportField($this->Miscarriage);
						$doc->exportField($this->Induced1);
						$doc->exportField($this->Type);
						$doc->exportField($this->IfClinical);
						$doc->exportField($this->GADate);
						$doc->exportField($this->GA);
						$doc->exportField($this->FoetalDeath);
						$doc->exportField($this->FerinatalDeath);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Ectopic);
						$doc->exportField($this->Extra);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNO);
						$doc->exportField($this->Name);
						$doc->exportField($this->Age);
						$doc->exportField($this->treatment_status);
						$doc->exportField($this->ARTCYCLE);
						$doc->exportField($this->RESULT);
						$doc->exportField($this->status);
						$doc->exportField($this->createdby);
						$doc->exportField($this->createddatetime);
						$doc->exportField($this->modifiedby);
						$doc->exportField($this->modifieddatetime);
						$doc->exportField($this->outcomeDate);
						$doc->exportField($this->outcomeDay);
						$doc->exportField($this->OPResult);
						$doc->exportField($this->Gestation);
						$doc->exportField($this->TransferdEmbryos);
						$doc->exportField($this->InitalOfSacs);
						$doc->exportField($this->ImplimentationRate);
						$doc->exportField($this->EmbryoNo);
						$doc->exportField($this->ExtrauterineSac);
						$doc->exportField($this->PregnancyMonozygotic);
						$doc->exportField($this->TypeGestation);
						$doc->exportField($this->Urine);
						$doc->exportField($this->PTdate);
						$doc->exportField($this->Reduced);
						$doc->exportField($this->INduced);
						$doc->exportField($this->INducedDate);
						$doc->exportField($this->Miscarriage);
						$doc->exportField($this->Induced1);
						$doc->exportField($this->Type);
						$doc->exportField($this->IfClinical);
						$doc->exportField($this->GADate);
						$doc->exportField($this->GA);
						$doc->exportField($this->FoetalDeath);
						$doc->exportField($this->FerinatalDeath);
						$doc->exportField($this->TidNo);
						$doc->exportField($this->Ectopic);
						$doc->exportField($this->Extra);
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
		$Urine = $rsnew["Urine"];
		$Miscarriage = $rsnew["Miscarriage"];
		$INduced = $rsnew["INduced"];
		$Gestation = $rsnew["Gestation"];
		$TidNo = $rsnew["TidNo"];
		$dbhelper = &DbHelper();
		if($Urine == 'Negative' || $Miscarriage == 'Yes' || $INduced == 'Yes' || $Gestation == 'No')
		{
			$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Finalized' WHERE `id`='".$TidNo."';";
			$results = $dbhelper->ExecuteRows($sql);
		}else{
			$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='On Going' WHERE `id`='".$TidNo."';";
			$results = $dbhelper->ExecuteRows($sql);
		}
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
			$Urine = $rsnew["Urine"];
		$Miscarriage = $rsnew["Miscarriage"];
		$INduced = $rsnew["INduced"];
		$Gestation = $rsnew["Gestation"];
		$TidNo = $rsold["TidNo"];
		$dbhelper = &DbHelper();
		if($Urine == 'Negative' || $Miscarriage == 'Yes' || $INduced == 'Yes' || $Gestation == 'No')
		{
			$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='Finalized' WHERE `id`='".$TidNo."';";
			$results = $dbhelper->ExecuteRows($sql);
		}else{
			$sql = "UPDATE `ganeshkumar_bjhims`.`ivf_treatment_plan` SET `treatment_status`='On Going' WHERE `id`='".$TidNo."';";
			$results = $dbhelper->ExecuteRows($sql);
		}
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