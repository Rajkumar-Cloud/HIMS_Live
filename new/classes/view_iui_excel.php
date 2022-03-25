<?php namespace PHPMaker2020\HIMS; ?>
<?php

/**
 * Table class for view_iui_excel
 */
class view_iui_excel extends DbTable
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
	public $NAME;
	public $HUSBAND_NAME;
	public $CoupleID;
	public $AGE____WIFE;
	public $AGE__HUSBAND;
	public $ANXIOUS_TO_CONCEIVE_FOR;
	public $AMH_28_NG2FML29;
	public $TUBAL_PATENCY;
	public $HSG;
	public $DHL;
	public $UTERINE_PROBLEMS;
	public $W_COMORBIDS;
	public $H_COMORBIDS;
	public $SEXUAL_DYSFUNCTION;
	public $PREV_IUI;
	public $PREV_IVF;
	public $TABLETS;
	public $INJTYPE;
	public $LMP;
	public $TRIGGERR;
	public $TRIGGERDATE;
	public $FOLLICLE_STATUS;
	public $NUMBER_OF_IUI;
	public $PROCEDURE;
	public $LUTEAL_SUPPORT;
	public $H2FD_SAMPLE;
	public $DONOR___I_D;
	public $PREG_TEST_DATE;
	public $COLLECTION__METHOD;
	public $SAMPLE_SOURCE;
	public $SPECIFIC_PROBLEMS;
	public $IMSC_1;
	public $IMSC_2;
	public $LIQUIFACTION_STORAGE;
	public $IUI_PREP_METHOD;
	public $TIME_FROM_TRIGGER;
	public $COLLECTION_TO_PREPARATION;
	public $TIME_FROM_PREP_TO_INSEM;
	public $SPECIFIC_MATERNAL_PROBLEMS;
	public $RESULTS;
	public $ONGOING_PREG;
	public $EDD_Date;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'view_iui_excel';
		$this->TableName = 'view_iui_excel';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`view_iui_excel`";
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

		// NAME
		$this->NAME = new DbField('view_iui_excel', 'view_iui_excel', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, 50, -1, FALSE, '`NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NAME->Sortable = TRUE; // Allow sort
		$this->fields['NAME'] = &$this->NAME;

		// HUSBAND NAME
		$this->HUSBAND_NAME = new DbField('view_iui_excel', 'view_iui_excel', 'x_HUSBAND_NAME', 'HUSBAND NAME', '`HUSBAND NAME`', '`HUSBAND NAME`', 200, 50, -1, FALSE, '`HUSBAND NAME`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HUSBAND_NAME->Sortable = TRUE; // Allow sort
		$this->fields['HUSBAND NAME'] = &$this->HUSBAND_NAME;

		// CoupleID
		$this->CoupleID = new DbField('view_iui_excel', 'view_iui_excel', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, FALSE, '`CoupleID`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CoupleID->IsPrimaryKey = TRUE; // Primary key field
		$this->CoupleID->Nullable = FALSE; // NOT NULL field
		$this->CoupleID->Required = TRUE; // Required field
		$this->CoupleID->Sortable = TRUE; // Allow sort
		$this->fields['CoupleID'] = &$this->CoupleID;

		// AGE  - WIFE
		$this->AGE____WIFE = new DbField('view_iui_excel', 'view_iui_excel', 'x_AGE____WIFE', 'AGE  - WIFE', '`AGE  - WIFE`', '`AGE  - WIFE`', 200, 45, -1, FALSE, '`AGE  - WIFE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AGE____WIFE->Sortable = TRUE; // Allow sort
		$this->fields['AGE  - WIFE'] = &$this->AGE____WIFE;

		// AGE- HUSBAND
		$this->AGE__HUSBAND = new DbField('view_iui_excel', 'view_iui_excel', 'x_AGE__HUSBAND', 'AGE- HUSBAND', '`AGE- HUSBAND`', '`AGE- HUSBAND`', 200, 45, -1, FALSE, '`AGE- HUSBAND`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AGE__HUSBAND->Sortable = TRUE; // Allow sort
		$this->fields['AGE- HUSBAND'] = &$this->AGE__HUSBAND;

		// ANXIOUS TO CONCEIVE FOR
		$this->ANXIOUS_TO_CONCEIVE_FOR = new DbField('view_iui_excel', 'view_iui_excel', 'x_ANXIOUS_TO_CONCEIVE_FOR', 'ANXIOUS TO CONCEIVE FOR', '`ANXIOUS TO CONCEIVE FOR`', '`ANXIOUS TO CONCEIVE FOR`', 200, 45, -1, FALSE, '`ANXIOUS TO CONCEIVE FOR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ANXIOUS_TO_CONCEIVE_FOR->Sortable = TRUE; // Allow sort
		$this->fields['ANXIOUS TO CONCEIVE FOR'] = &$this->ANXIOUS_TO_CONCEIVE_FOR;

		// AMH ( NG/ML)
		$this->AMH_28_NG2FML29 = new DbField('view_iui_excel', 'view_iui_excel', 'x_AMH_28_NG2FML29', 'AMH ( NG/ML)', '`AMH ( NG/ML)`', '`AMH ( NG/ML)`', 200, 45, -1, FALSE, '`AMH ( NG/ML)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AMH_28_NG2FML29->Sortable = TRUE; // Allow sort
		$this->fields['AMH ( NG/ML)'] = &$this->AMH_28_NG2FML29;

		// TUBAL_PATENCY
		$this->TUBAL_PATENCY = new DbField('view_iui_excel', 'view_iui_excel', 'x_TUBAL_PATENCY', 'TUBAL_PATENCY', '`TUBAL_PATENCY`', '`TUBAL_PATENCY`', 200, 45, -1, FALSE, '`TUBAL_PATENCY`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TUBAL_PATENCY->Sortable = TRUE; // Allow sort
		$this->fields['TUBAL_PATENCY'] = &$this->TUBAL_PATENCY;

		// HSG
		$this->HSG = new DbField('view_iui_excel', 'view_iui_excel', 'x_HSG', 'HSG', '`HSG`', '`HSG`', 200, 45, -1, FALSE, '`HSG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HSG->Sortable = TRUE; // Allow sort
		$this->fields['HSG'] = &$this->HSG;

		// DHL
		$this->DHL = new DbField('view_iui_excel', 'view_iui_excel', 'x_DHL', 'DHL', '`DHL`', '`DHL`', 200, 45, -1, FALSE, '`DHL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DHL->Sortable = TRUE; // Allow sort
		$this->fields['DHL'] = &$this->DHL;

		// UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_UTERINE_PROBLEMS', 'UTERINE_PROBLEMS', '`UTERINE_PROBLEMS`', '`UTERINE_PROBLEMS`', 200, 45, -1, FALSE, '`UTERINE_PROBLEMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UTERINE_PROBLEMS->Sortable = TRUE; // Allow sort
		$this->fields['UTERINE_PROBLEMS'] = &$this->UTERINE_PROBLEMS;

		// W_COMORBIDS
		$this->W_COMORBIDS = new DbField('view_iui_excel', 'view_iui_excel', 'x_W_COMORBIDS', 'W_COMORBIDS', '`W_COMORBIDS`', '`W_COMORBIDS`', 200, 45, -1, FALSE, '`W_COMORBIDS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->W_COMORBIDS->Sortable = TRUE; // Allow sort
		$this->fields['W_COMORBIDS'] = &$this->W_COMORBIDS;

		// H_COMORBIDS
		$this->H_COMORBIDS = new DbField('view_iui_excel', 'view_iui_excel', 'x_H_COMORBIDS', 'H_COMORBIDS', '`H_COMORBIDS`', '`H_COMORBIDS`', 200, 45, -1, FALSE, '`H_COMORBIDS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->H_COMORBIDS->Sortable = TRUE; // Allow sort
		$this->fields['H_COMORBIDS'] = &$this->H_COMORBIDS;

		// SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION = new DbField('view_iui_excel', 'view_iui_excel', 'x_SEXUAL_DYSFUNCTION', 'SEXUAL_DYSFUNCTION', '`SEXUAL_DYSFUNCTION`', '`SEXUAL_DYSFUNCTION`', 200, 45, -1, FALSE, '`SEXUAL_DYSFUNCTION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SEXUAL_DYSFUNCTION->Sortable = TRUE; // Allow sort
		$this->fields['SEXUAL_DYSFUNCTION'] = &$this->SEXUAL_DYSFUNCTION;

		// PREV IUI
		$this->PREV_IUI = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREV_IUI', 'PREV IUI', '`PREV IUI`', '`PREV IUI`', 200, 45, -1, FALSE, '`PREV IUI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PREV_IUI->Sortable = TRUE; // Allow sort
		$this->fields['PREV IUI'] = &$this->PREV_IUI;

		// PREV_IVF
		$this->PREV_IVF = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREV_IVF', 'PREV_IVF', '`PREV_IVF`', '`PREV_IVF`', 201, 65530, -1, FALSE, '`PREV_IVF`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->PREV_IVF->Nullable = FALSE; // NOT NULL field
		$this->PREV_IVF->Required = TRUE; // Required field
		$this->PREV_IVF->Sortable = TRUE; // Allow sort
		$this->fields['PREV_IVF'] = &$this->PREV_IVF;

		// TABLETS
		$this->TABLETS = new DbField('view_iui_excel', 'view_iui_excel', 'x_TABLETS', 'TABLETS', '`TABLETS`', '`TABLETS`', 200, 45, -1, FALSE, '`TABLETS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TABLETS->Sortable = TRUE; // Allow sort
		$this->fields['TABLETS'] = &$this->TABLETS;

		// INJTYPE
		$this->INJTYPE = new DbField('view_iui_excel', 'view_iui_excel', 'x_INJTYPE', 'INJTYPE', '`INJTYPE`', '`INJTYPE`', 200, 45, -1, FALSE, '`INJTYPE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->INJTYPE->Sortable = TRUE; // Allow sort
		$this->fields['INJTYPE'] = &$this->INJTYPE;

		// LMP
		$this->LMP = new DbField('view_iui_excel', 'view_iui_excel', 'x_LMP', 'LMP', '`LMP`', CastDateFieldForLike("`LMP`", 0, "DB"), 135, 19, 0, FALSE, '`LMP`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LMP->Sortable = TRUE; // Allow sort
		$this->LMP->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['LMP'] = &$this->LMP;

		// TRIGGERR
		$this->TRIGGERR = new DbField('view_iui_excel', 'view_iui_excel', 'x_TRIGGERR', 'TRIGGERR', '`TRIGGERR`', '`TRIGGERR`', 200, 200, -1, FALSE, '`TRIGGERR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TRIGGERR->Sortable = TRUE; // Allow sort
		$this->fields['TRIGGERR'] = &$this->TRIGGERR;

		// TRIGGERDATE
		$this->TRIGGERDATE = new DbField('view_iui_excel', 'view_iui_excel', 'x_TRIGGERDATE', 'TRIGGERDATE', '`TRIGGERDATE`', CastDateFieldForLike("`TRIGGERDATE`", 0, "DB"), 135, 19, 0, FALSE, '`TRIGGERDATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TRIGGERDATE->Sortable = TRUE; // Allow sort
		$this->TRIGGERDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TRIGGERDATE'] = &$this->TRIGGERDATE;

		// FOLLICLE_STATUS
		$this->FOLLICLE_STATUS = new DbField('view_iui_excel', 'view_iui_excel', 'x_FOLLICLE_STATUS', 'FOLLICLE_STATUS', '`FOLLICLE_STATUS`', '`FOLLICLE_STATUS`', 200, 45, -1, FALSE, '`FOLLICLE_STATUS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FOLLICLE_STATUS->Sortable = TRUE; // Allow sort
		$this->fields['FOLLICLE_STATUS'] = &$this->FOLLICLE_STATUS;

		// NUMBER_OF_IUI
		$this->NUMBER_OF_IUI = new DbField('view_iui_excel', 'view_iui_excel', 'x_NUMBER_OF_IUI', 'NUMBER_OF_IUI', '`NUMBER_OF_IUI`', '`NUMBER_OF_IUI`', 200, 45, -1, FALSE, '`NUMBER_OF_IUI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NUMBER_OF_IUI->Sortable = TRUE; // Allow sort
		$this->fields['NUMBER_OF_IUI'] = &$this->NUMBER_OF_IUI;

		// PROCEDURE
		$this->PROCEDURE = new DbField('view_iui_excel', 'view_iui_excel', 'x_PROCEDURE', 'PROCEDURE', '`PROCEDURE`', '`PROCEDURE`', 200, 45, -1, FALSE, '`PROCEDURE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PROCEDURE->Sortable = TRUE; // Allow sort
		$this->fields['PROCEDURE'] = &$this->PROCEDURE;

		// LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT = new DbField('view_iui_excel', 'view_iui_excel', 'x_LUTEAL_SUPPORT', 'LUTEAL_SUPPORT', '`LUTEAL_SUPPORT`', '`LUTEAL_SUPPORT`', 200, 45, -1, FALSE, '`LUTEAL_SUPPORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LUTEAL_SUPPORT->Sortable = TRUE; // Allow sort
		$this->fields['LUTEAL_SUPPORT'] = &$this->LUTEAL_SUPPORT;

		// H/D SAMPLE
		$this->H2FD_SAMPLE = new DbField('view_iui_excel', 'view_iui_excel', 'x_H2FD_SAMPLE', 'H/D SAMPLE', '`H/D SAMPLE`', '`H/D SAMPLE`', 200, 45, -1, FALSE, '`H/D SAMPLE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->H2FD_SAMPLE->Sortable = TRUE; // Allow sort
		$this->fields['H/D SAMPLE'] = &$this->H2FD_SAMPLE;

		// DONOR - I.D
		$this->DONOR___I_D = new DbField('view_iui_excel', 'view_iui_excel', 'x_DONOR___I_D', 'DONOR - I.D', '`DONOR - I.D`', '`DONOR - I.D`', 3, 11, -1, FALSE, '`DONOR - I.D`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DONOR___I_D->Sortable = TRUE; // Allow sort
		$this->DONOR___I_D->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DONOR - I.D'] = &$this->DONOR___I_D;

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREG_TEST_DATE', 'PREG_TEST_DATE', '`PREG_TEST_DATE`', CastDateFieldForLike("`PREG_TEST_DATE`", 7, "DB"), 135, 19, 7, FALSE, '`PREG_TEST_DATE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PREG_TEST_DATE->Sortable = TRUE; // Allow sort
		$this->PREG_TEST_DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['PREG_TEST_DATE'] = &$this->PREG_TEST_DATE;

		// COLLECTION  METHOD
		$this->COLLECTION__METHOD = new DbField('view_iui_excel', 'view_iui_excel', 'x_COLLECTION__METHOD', 'COLLECTION  METHOD', '`COLLECTION  METHOD`', '`COLLECTION  METHOD`', 200, 45, -1, FALSE, '`COLLECTION  METHOD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->COLLECTION__METHOD->Sortable = TRUE; // Allow sort
		$this->fields['COLLECTION  METHOD'] = &$this->COLLECTION__METHOD;

		// SAMPLE SOURCE
		$this->SAMPLE_SOURCE = new DbField('view_iui_excel', 'view_iui_excel', 'x_SAMPLE_SOURCE', 'SAMPLE SOURCE', '`SAMPLE SOURCE`', '`SAMPLE SOURCE`', 200, 45, -1, FALSE, '`SAMPLE SOURCE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SAMPLE_SOURCE->Sortable = TRUE; // Allow sort
		$this->fields['SAMPLE SOURCE'] = &$this->SAMPLE_SOURCE;

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_SPECIFIC_PROBLEMS', 'SPECIFIC_PROBLEMS', '`SPECIFIC_PROBLEMS`', '`SPECIFIC_PROBLEMS`', 200, 45, -1, FALSE, '`SPECIFIC_PROBLEMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SPECIFIC_PROBLEMS->Sortable = TRUE; // Allow sort
		$this->fields['SPECIFIC_PROBLEMS'] = &$this->SPECIFIC_PROBLEMS;

		// IMSC_1
		$this->IMSC_1 = new DbField('view_iui_excel', 'view_iui_excel', 'x_IMSC_1', 'IMSC_1', '`IMSC_1`', '`IMSC_1`', 200, 45, -1, FALSE, '`IMSC_1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_1->Sortable = TRUE; // Allow sort
		$this->fields['IMSC_1'] = &$this->IMSC_1;

		// IMSC_2
		$this->IMSC_2 = new DbField('view_iui_excel', 'view_iui_excel', 'x_IMSC_2', 'IMSC_2', '`IMSC_2`', '`IMSC_2`', 200, 45, -1, FALSE, '`IMSC_2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IMSC_2->Sortable = TRUE; // Allow sort
		$this->fields['IMSC_2'] = &$this->IMSC_2;

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE = new DbField('view_iui_excel', 'view_iui_excel', 'x_LIQUIFACTION_STORAGE', 'LIQUIFACTION_STORAGE', '`LIQUIFACTION_STORAGE`', '`LIQUIFACTION_STORAGE`', 200, 45, -1, FALSE, '`LIQUIFACTION_STORAGE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LIQUIFACTION_STORAGE->Sortable = TRUE; // Allow sort
		$this->fields['LIQUIFACTION_STORAGE'] = &$this->LIQUIFACTION_STORAGE;

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD = new DbField('view_iui_excel', 'view_iui_excel', 'x_IUI_PREP_METHOD', 'IUI_PREP_METHOD', '`IUI_PREP_METHOD`', '`IUI_PREP_METHOD`', 200, 45, -1, FALSE, '`IUI_PREP_METHOD`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->IUI_PREP_METHOD->Sortable = TRUE; // Allow sort
		$this->fields['IUI_PREP_METHOD'] = &$this->IUI_PREP_METHOD;

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER = new DbField('view_iui_excel', 'view_iui_excel', 'x_TIME_FROM_TRIGGER', 'TIME_FROM_TRIGGER', '`TIME_FROM_TRIGGER`', '`TIME_FROM_TRIGGER`', 200, 45, -1, FALSE, '`TIME_FROM_TRIGGER`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TIME_FROM_TRIGGER->Sortable = TRUE; // Allow sort
		$this->fields['TIME_FROM_TRIGGER'] = &$this->TIME_FROM_TRIGGER;

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION = new DbField('view_iui_excel', 'view_iui_excel', 'x_COLLECTION_TO_PREPARATION', 'COLLECTION_TO_PREPARATION', '`COLLECTION_TO_PREPARATION`', '`COLLECTION_TO_PREPARATION`', 200, 45, -1, FALSE, '`COLLECTION_TO_PREPARATION`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->COLLECTION_TO_PREPARATION->Sortable = TRUE; // Allow sort
		$this->fields['COLLECTION_TO_PREPARATION'] = &$this->COLLECTION_TO_PREPARATION;

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM = new DbField('view_iui_excel', 'view_iui_excel', 'x_TIME_FROM_PREP_TO_INSEM', 'TIME_FROM_PREP_TO_INSEM', '`TIME_FROM_PREP_TO_INSEM`', '`TIME_FROM_PREP_TO_INSEM`', 200, 45, -1, FALSE, '`TIME_FROM_PREP_TO_INSEM`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TIME_FROM_PREP_TO_INSEM->Sortable = TRUE; // Allow sort
		$this->fields['TIME_FROM_PREP_TO_INSEM'] = &$this->TIME_FROM_PREP_TO_INSEM;

		// SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_SPECIFIC_MATERNAL_PROBLEMS', 'SPECIFIC_MATERNAL_PROBLEMS', '`SPECIFIC_MATERNAL_PROBLEMS`', '`SPECIFIC_MATERNAL_PROBLEMS`', 200, 45, -1, FALSE, '`SPECIFIC_MATERNAL_PROBLEMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SPECIFIC_MATERNAL_PROBLEMS->Sortable = TRUE; // Allow sort
		$this->fields['SPECIFIC_MATERNAL_PROBLEMS'] = &$this->SPECIFIC_MATERNAL_PROBLEMS;

		// RESULTS
		$this->RESULTS = new DbField('view_iui_excel', 'view_iui_excel', 'x_RESULTS', 'RESULTS', '`RESULTS`', '`RESULTS`', 201, 65530, -1, FALSE, '`RESULTS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->RESULTS->Nullable = FALSE; // NOT NULL field
		$this->RESULTS->Required = TRUE; // Required field
		$this->RESULTS->Sortable = TRUE; // Allow sort
		$this->fields['RESULTS'] = &$this->RESULTS;

		// ONGOING_PREG
		$this->ONGOING_PREG = new DbField('view_iui_excel', 'view_iui_excel', 'x_ONGOING_PREG', 'ONGOING_PREG', '`ONGOING_PREG`', '`ONGOING_PREG`', 200, 45, -1, FALSE, '`ONGOING_PREG`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ONGOING_PREG->Sortable = TRUE; // Allow sort
		$this->fields['ONGOING_PREG'] = &$this->ONGOING_PREG;

		// EDD_Date
		$this->EDD_Date = new DbField('view_iui_excel', 'view_iui_excel', 'x_EDD_Date', 'EDD_Date', '`EDD_Date`', CastDateFieldForLike("`EDD_Date`", 0, "DB"), 135, 19, 0, FALSE, '`EDD_Date`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EDD_Date->Sortable = TRUE; // Allow sort
		$this->EDD_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['EDD_Date'] = &$this->EDD_Date;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_iui_excel`";
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
			if (array_key_exists('CoupleID', $rs))
				AddFilter($where, QuotedName('CoupleID', $this->Dbid) . '=' . QuotedValue($rs['CoupleID'], $this->CoupleID->DataType, $this->Dbid));
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
		$this->NAME->DbValue = $row['NAME'];
		$this->HUSBAND_NAME->DbValue = $row['HUSBAND NAME'];
		$this->CoupleID->DbValue = $row['CoupleID'];
		$this->AGE____WIFE->DbValue = $row['AGE  - WIFE'];
		$this->AGE__HUSBAND->DbValue = $row['AGE- HUSBAND'];
		$this->ANXIOUS_TO_CONCEIVE_FOR->DbValue = $row['ANXIOUS TO CONCEIVE FOR'];
		$this->AMH_28_NG2FML29->DbValue = $row['AMH ( NG/ML)'];
		$this->TUBAL_PATENCY->DbValue = $row['TUBAL_PATENCY'];
		$this->HSG->DbValue = $row['HSG'];
		$this->DHL->DbValue = $row['DHL'];
		$this->UTERINE_PROBLEMS->DbValue = $row['UTERINE_PROBLEMS'];
		$this->W_COMORBIDS->DbValue = $row['W_COMORBIDS'];
		$this->H_COMORBIDS->DbValue = $row['H_COMORBIDS'];
		$this->SEXUAL_DYSFUNCTION->DbValue = $row['SEXUAL_DYSFUNCTION'];
		$this->PREV_IUI->DbValue = $row['PREV IUI'];
		$this->PREV_IVF->DbValue = $row['PREV_IVF'];
		$this->TABLETS->DbValue = $row['TABLETS'];
		$this->INJTYPE->DbValue = $row['INJTYPE'];
		$this->LMP->DbValue = $row['LMP'];
		$this->TRIGGERR->DbValue = $row['TRIGGERR'];
		$this->TRIGGERDATE->DbValue = $row['TRIGGERDATE'];
		$this->FOLLICLE_STATUS->DbValue = $row['FOLLICLE_STATUS'];
		$this->NUMBER_OF_IUI->DbValue = $row['NUMBER_OF_IUI'];
		$this->PROCEDURE->DbValue = $row['PROCEDURE'];
		$this->LUTEAL_SUPPORT->DbValue = $row['LUTEAL_SUPPORT'];
		$this->H2FD_SAMPLE->DbValue = $row['H/D SAMPLE'];
		$this->DONOR___I_D->DbValue = $row['DONOR - I.D'];
		$this->PREG_TEST_DATE->DbValue = $row['PREG_TEST_DATE'];
		$this->COLLECTION__METHOD->DbValue = $row['COLLECTION  METHOD'];
		$this->SAMPLE_SOURCE->DbValue = $row['SAMPLE SOURCE'];
		$this->SPECIFIC_PROBLEMS->DbValue = $row['SPECIFIC_PROBLEMS'];
		$this->IMSC_1->DbValue = $row['IMSC_1'];
		$this->IMSC_2->DbValue = $row['IMSC_2'];
		$this->LIQUIFACTION_STORAGE->DbValue = $row['LIQUIFACTION_STORAGE'];
		$this->IUI_PREP_METHOD->DbValue = $row['IUI_PREP_METHOD'];
		$this->TIME_FROM_TRIGGER->DbValue = $row['TIME_FROM_TRIGGER'];
		$this->COLLECTION_TO_PREPARATION->DbValue = $row['COLLECTION_TO_PREPARATION'];
		$this->TIME_FROM_PREP_TO_INSEM->DbValue = $row['TIME_FROM_PREP_TO_INSEM'];
		$this->SPECIFIC_MATERNAL_PROBLEMS->DbValue = $row['SPECIFIC_MATERNAL_PROBLEMS'];
		$this->RESULTS->DbValue = $row['RESULTS'];
		$this->ONGOING_PREG->DbValue = $row['ONGOING_PREG'];
		$this->EDD_Date->DbValue = $row['EDD_Date'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`CoupleID` = '@CoupleID@'";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('CoupleID', $row) ? $row['CoupleID'] : NULL;
		else
			$val = $this->CoupleID->OldValue !== NULL ? $this->CoupleID->OldValue : $this->CoupleID->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@CoupleID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "view_iui_excellist.php";
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
		if ($pageName == "view_iui_excelview.php")
			return $Language->phrase("View");
		elseif ($pageName == "view_iui_exceledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "view_iui_exceladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "view_iui_excellist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("view_iui_excelview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("view_iui_excelview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "view_iui_exceladd.php?" . $this->getUrlParm($parm);
		else
			$url = "view_iui_exceladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("view_iui_exceledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("view_iui_exceladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("view_iui_exceldelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "CoupleID:" . JsonEncode($this->CoupleID->CurrentValue, "string");
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
		if ($this->CoupleID->CurrentValue != NULL) {
			$url .= "CoupleID=" . urlencode($this->CoupleID->CurrentValue);
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
			if (Param("CoupleID") !== NULL)
				$arKeys[] = Param("CoupleID");
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
				$this->CoupleID->CurrentValue = $key;
			else
				$this->CoupleID->OldValue = $key;
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
		$this->NAME->setDbValue($rs->fields('NAME'));
		$this->HUSBAND_NAME->setDbValue($rs->fields('HUSBAND NAME'));
		$this->CoupleID->setDbValue($rs->fields('CoupleID'));
		$this->AGE____WIFE->setDbValue($rs->fields('AGE  - WIFE'));
		$this->AGE__HUSBAND->setDbValue($rs->fields('AGE- HUSBAND'));
		$this->ANXIOUS_TO_CONCEIVE_FOR->setDbValue($rs->fields('ANXIOUS TO CONCEIVE FOR'));
		$this->AMH_28_NG2FML29->setDbValue($rs->fields('AMH ( NG/ML)'));
		$this->TUBAL_PATENCY->setDbValue($rs->fields('TUBAL_PATENCY'));
		$this->HSG->setDbValue($rs->fields('HSG'));
		$this->DHL->setDbValue($rs->fields('DHL'));
		$this->UTERINE_PROBLEMS->setDbValue($rs->fields('UTERINE_PROBLEMS'));
		$this->W_COMORBIDS->setDbValue($rs->fields('W_COMORBIDS'));
		$this->H_COMORBIDS->setDbValue($rs->fields('H_COMORBIDS'));
		$this->SEXUAL_DYSFUNCTION->setDbValue($rs->fields('SEXUAL_DYSFUNCTION'));
		$this->PREV_IUI->setDbValue($rs->fields('PREV IUI'));
		$this->PREV_IVF->setDbValue($rs->fields('PREV_IVF'));
		$this->TABLETS->setDbValue($rs->fields('TABLETS'));
		$this->INJTYPE->setDbValue($rs->fields('INJTYPE'));
		$this->LMP->setDbValue($rs->fields('LMP'));
		$this->TRIGGERR->setDbValue($rs->fields('TRIGGERR'));
		$this->TRIGGERDATE->setDbValue($rs->fields('TRIGGERDATE'));
		$this->FOLLICLE_STATUS->setDbValue($rs->fields('FOLLICLE_STATUS'));
		$this->NUMBER_OF_IUI->setDbValue($rs->fields('NUMBER_OF_IUI'));
		$this->PROCEDURE->setDbValue($rs->fields('PROCEDURE'));
		$this->LUTEAL_SUPPORT->setDbValue($rs->fields('LUTEAL_SUPPORT'));
		$this->H2FD_SAMPLE->setDbValue($rs->fields('H/D SAMPLE'));
		$this->DONOR___I_D->setDbValue($rs->fields('DONOR - I.D'));
		$this->PREG_TEST_DATE->setDbValue($rs->fields('PREG_TEST_DATE'));
		$this->COLLECTION__METHOD->setDbValue($rs->fields('COLLECTION  METHOD'));
		$this->SAMPLE_SOURCE->setDbValue($rs->fields('SAMPLE SOURCE'));
		$this->SPECIFIC_PROBLEMS->setDbValue($rs->fields('SPECIFIC_PROBLEMS'));
		$this->IMSC_1->setDbValue($rs->fields('IMSC_1'));
		$this->IMSC_2->setDbValue($rs->fields('IMSC_2'));
		$this->LIQUIFACTION_STORAGE->setDbValue($rs->fields('LIQUIFACTION_STORAGE'));
		$this->IUI_PREP_METHOD->setDbValue($rs->fields('IUI_PREP_METHOD'));
		$this->TIME_FROM_TRIGGER->setDbValue($rs->fields('TIME_FROM_TRIGGER'));
		$this->COLLECTION_TO_PREPARATION->setDbValue($rs->fields('COLLECTION_TO_PREPARATION'));
		$this->TIME_FROM_PREP_TO_INSEM->setDbValue($rs->fields('TIME_FROM_PREP_TO_INSEM'));
		$this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($rs->fields('SPECIFIC_MATERNAL_PROBLEMS'));
		$this->RESULTS->setDbValue($rs->fields('RESULTS'));
		$this->ONGOING_PREG->setDbValue($rs->fields('ONGOING_PREG'));
		$this->EDD_Date->setDbValue($rs->fields('EDD_Date'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// NAME
		// HUSBAND NAME
		// CoupleID
		// AGE  - WIFE
		// AGE- HUSBAND
		// ANXIOUS TO CONCEIVE FOR
		// AMH ( NG/ML)
		// TUBAL_PATENCY
		// HSG
		// DHL
		// UTERINE_PROBLEMS
		// W_COMORBIDS
		// H_COMORBIDS
		// SEXUAL_DYSFUNCTION
		// PREV IUI
		// PREV_IVF
		// TABLETS
		// INJTYPE
		// LMP
		// TRIGGERR
		// TRIGGERDATE
		// FOLLICLE_STATUS
		// NUMBER_OF_IUI
		// PROCEDURE
		// LUTEAL_SUPPORT
		// H/D SAMPLE
		// DONOR - I.D
		// PREG_TEST_DATE
		// COLLECTION  METHOD
		// SAMPLE SOURCE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM
		// SPECIFIC_MATERNAL_PROBLEMS
		// RESULTS
		// ONGOING_PREG
		// EDD_Date
		// NAME

		$this->NAME->ViewValue = $this->NAME->CurrentValue;
		$this->NAME->ViewCustomAttributes = "";

		// HUSBAND NAME
		$this->HUSBAND_NAME->ViewValue = $this->HUSBAND_NAME->CurrentValue;
		$this->HUSBAND_NAME->ViewCustomAttributes = "";

		// CoupleID
		$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->ViewCustomAttributes = "";

		// AGE  - WIFE
		$this->AGE____WIFE->ViewValue = $this->AGE____WIFE->CurrentValue;
		$this->AGE____WIFE->ViewCustomAttributes = "";

		// AGE- HUSBAND
		$this->AGE__HUSBAND->ViewValue = $this->AGE__HUSBAND->CurrentValue;
		$this->AGE__HUSBAND->ViewCustomAttributes = "";

		// ANXIOUS TO CONCEIVE FOR
		$this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
		$this->ANXIOUS_TO_CONCEIVE_FOR->ViewCustomAttributes = "";

		// AMH ( NG/ML)
		$this->AMH_28_NG2FML29->ViewValue = $this->AMH_28_NG2FML29->CurrentValue;
		$this->AMH_28_NG2FML29->ViewCustomAttributes = "";

		// TUBAL_PATENCY
		$this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
		$this->TUBAL_PATENCY->ViewCustomAttributes = "";

		// HSG
		$this->HSG->ViewValue = $this->HSG->CurrentValue;
		$this->HSG->ViewCustomAttributes = "";

		// DHL
		$this->DHL->ViewValue = $this->DHL->CurrentValue;
		$this->DHL->ViewCustomAttributes = "";

		// UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
		$this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

		// W_COMORBIDS
		$this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
		$this->W_COMORBIDS->ViewCustomAttributes = "";

		// H_COMORBIDS
		$this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
		$this->H_COMORBIDS->ViewCustomAttributes = "";

		// SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
		$this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

		// PREV IUI
		$this->PREV_IUI->ViewValue = $this->PREV_IUI->CurrentValue;
		$this->PREV_IUI->ViewCustomAttributes = "";

		// PREV_IVF
		$this->PREV_IVF->ViewValue = $this->PREV_IVF->CurrentValue;
		$this->PREV_IVF->ViewCustomAttributes = "";

		// TABLETS
		$this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
		$this->TABLETS->ViewCustomAttributes = "";

		// INJTYPE
		$this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
		$this->INJTYPE->ViewCustomAttributes = "";

		// LMP
		$this->LMP->ViewValue = $this->LMP->CurrentValue;
		$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
		$this->LMP->ViewCustomAttributes = "";

		// TRIGGERR
		$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
		$this->TRIGGERR->ViewCustomAttributes = "";

		// TRIGGERDATE
		$this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
		$this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
		$this->TRIGGERDATE->ViewCustomAttributes = "";

		// FOLLICLE_STATUS
		$this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
		$this->FOLLICLE_STATUS->ViewCustomAttributes = "";

		// NUMBER_OF_IUI
		$this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
		$this->NUMBER_OF_IUI->ViewCustomAttributes = "";

		// PROCEDURE
		$this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
		$this->PROCEDURE->ViewCustomAttributes = "";

		// LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
		$this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

		// H/D SAMPLE
		$this->H2FD_SAMPLE->ViewValue = $this->H2FD_SAMPLE->CurrentValue;
		$this->H2FD_SAMPLE->ViewCustomAttributes = "";

		// DONOR - I.D
		$this->DONOR___I_D->ViewValue = $this->DONOR___I_D->CurrentValue;
		$this->DONOR___I_D->ViewValue = FormatNumber($this->DONOR___I_D->ViewValue, 0, -2, -2, -2);
		$this->DONOR___I_D->ViewCustomAttributes = "";

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
		$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
		$this->PREG_TEST_DATE->ViewCustomAttributes = "";

		// COLLECTION  METHOD
		$this->COLLECTION__METHOD->ViewValue = $this->COLLECTION__METHOD->CurrentValue;
		$this->COLLECTION__METHOD->ViewCustomAttributes = "";

		// SAMPLE SOURCE
		$this->SAMPLE_SOURCE->ViewValue = $this->SAMPLE_SOURCE->CurrentValue;
		$this->SAMPLE_SOURCE->ViewCustomAttributes = "";

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
		$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

		// IMSC_1
		$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
		$this->IMSC_1->ViewCustomAttributes = "";

		// IMSC_2
		$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
		$this->IMSC_2->ViewCustomAttributes = "";

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
		$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
		$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
		$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
		$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
		$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

		// SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
		$this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

		// RESULTS
		$this->RESULTS->ViewValue = $this->RESULTS->CurrentValue;
		$this->RESULTS->ViewCustomAttributes = "";

		// ONGOING_PREG
		$this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
		$this->ONGOING_PREG->ViewCustomAttributes = "";

		// EDD_Date
		$this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
		$this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
		$this->EDD_Date->ViewCustomAttributes = "";

		// NAME
		$this->NAME->LinkCustomAttributes = "";
		$this->NAME->HrefValue = "";
		$this->NAME->TooltipValue = "";

		// HUSBAND NAME
		$this->HUSBAND_NAME->LinkCustomAttributes = "";
		$this->HUSBAND_NAME->HrefValue = "";
		$this->HUSBAND_NAME->TooltipValue = "";

		// CoupleID
		$this->CoupleID->LinkCustomAttributes = "";
		$this->CoupleID->HrefValue = "";
		$this->CoupleID->TooltipValue = "";

		// AGE  - WIFE
		$this->AGE____WIFE->LinkCustomAttributes = "";
		$this->AGE____WIFE->HrefValue = "";
		$this->AGE____WIFE->TooltipValue = "";

		// AGE- HUSBAND
		$this->AGE__HUSBAND->LinkCustomAttributes = "";
		$this->AGE__HUSBAND->HrefValue = "";
		$this->AGE__HUSBAND->TooltipValue = "";

		// ANXIOUS TO CONCEIVE FOR
		$this->ANXIOUS_TO_CONCEIVE_FOR->LinkCustomAttributes = "";
		$this->ANXIOUS_TO_CONCEIVE_FOR->HrefValue = "";
		$this->ANXIOUS_TO_CONCEIVE_FOR->TooltipValue = "";

		// AMH ( NG/ML)
		$this->AMH_28_NG2FML29->LinkCustomAttributes = "";
		$this->AMH_28_NG2FML29->HrefValue = "";
		$this->AMH_28_NG2FML29->TooltipValue = "";

		// TUBAL_PATENCY
		$this->TUBAL_PATENCY->LinkCustomAttributes = "";
		$this->TUBAL_PATENCY->HrefValue = "";
		$this->TUBAL_PATENCY->TooltipValue = "";

		// HSG
		$this->HSG->LinkCustomAttributes = "";
		$this->HSG->HrefValue = "";
		$this->HSG->TooltipValue = "";

		// DHL
		$this->DHL->LinkCustomAttributes = "";
		$this->DHL->HrefValue = "";
		$this->DHL->TooltipValue = "";

		// UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
		$this->UTERINE_PROBLEMS->HrefValue = "";
		$this->UTERINE_PROBLEMS->TooltipValue = "";

		// W_COMORBIDS
		$this->W_COMORBIDS->LinkCustomAttributes = "";
		$this->W_COMORBIDS->HrefValue = "";
		$this->W_COMORBIDS->TooltipValue = "";

		// H_COMORBIDS
		$this->H_COMORBIDS->LinkCustomAttributes = "";
		$this->H_COMORBIDS->HrefValue = "";
		$this->H_COMORBIDS->TooltipValue = "";

		// SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
		$this->SEXUAL_DYSFUNCTION->HrefValue = "";
		$this->SEXUAL_DYSFUNCTION->TooltipValue = "";

		// PREV IUI
		$this->PREV_IUI->LinkCustomAttributes = "";
		$this->PREV_IUI->HrefValue = "";
		$this->PREV_IUI->TooltipValue = "";

		// PREV_IVF
		$this->PREV_IVF->LinkCustomAttributes = "";
		$this->PREV_IVF->HrefValue = "";
		$this->PREV_IVF->TooltipValue = "";

		// TABLETS
		$this->TABLETS->LinkCustomAttributes = "";
		$this->TABLETS->HrefValue = "";
		$this->TABLETS->TooltipValue = "";

		// INJTYPE
		$this->INJTYPE->LinkCustomAttributes = "";
		$this->INJTYPE->HrefValue = "";
		$this->INJTYPE->TooltipValue = "";

		// LMP
		$this->LMP->LinkCustomAttributes = "";
		$this->LMP->HrefValue = "";
		$this->LMP->TooltipValue = "";

		// TRIGGERR
		$this->TRIGGERR->LinkCustomAttributes = "";
		$this->TRIGGERR->HrefValue = "";
		$this->TRIGGERR->TooltipValue = "";

		// TRIGGERDATE
		$this->TRIGGERDATE->LinkCustomAttributes = "";
		$this->TRIGGERDATE->HrefValue = "";
		$this->TRIGGERDATE->TooltipValue = "";

		// FOLLICLE_STATUS
		$this->FOLLICLE_STATUS->LinkCustomAttributes = "";
		$this->FOLLICLE_STATUS->HrefValue = "";
		$this->FOLLICLE_STATUS->TooltipValue = "";

		// NUMBER_OF_IUI
		$this->NUMBER_OF_IUI->LinkCustomAttributes = "";
		$this->NUMBER_OF_IUI->HrefValue = "";
		$this->NUMBER_OF_IUI->TooltipValue = "";

		// PROCEDURE
		$this->PROCEDURE->LinkCustomAttributes = "";
		$this->PROCEDURE->HrefValue = "";
		$this->PROCEDURE->TooltipValue = "";

		// LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
		$this->LUTEAL_SUPPORT->HrefValue = "";
		$this->LUTEAL_SUPPORT->TooltipValue = "";

		// H/D SAMPLE
		$this->H2FD_SAMPLE->LinkCustomAttributes = "";
		$this->H2FD_SAMPLE->HrefValue = "";
		$this->H2FD_SAMPLE->TooltipValue = "";

		// DONOR - I.D
		$this->DONOR___I_D->LinkCustomAttributes = "";
		$this->DONOR___I_D->HrefValue = "";
		$this->DONOR___I_D->TooltipValue = "";

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->LinkCustomAttributes = "";
		$this->PREG_TEST_DATE->HrefValue = "";
		$this->PREG_TEST_DATE->TooltipValue = "";

		// COLLECTION  METHOD
		$this->COLLECTION__METHOD->LinkCustomAttributes = "";
		$this->COLLECTION__METHOD->HrefValue = "";
		$this->COLLECTION__METHOD->TooltipValue = "";

		// SAMPLE SOURCE
		$this->SAMPLE_SOURCE->LinkCustomAttributes = "";
		$this->SAMPLE_SOURCE->HrefValue = "";
		$this->SAMPLE_SOURCE->TooltipValue = "";

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
		$this->SPECIFIC_PROBLEMS->HrefValue = "";
		$this->SPECIFIC_PROBLEMS->TooltipValue = "";

		// IMSC_1
		$this->IMSC_1->LinkCustomAttributes = "";
		$this->IMSC_1->HrefValue = "";
		$this->IMSC_1->TooltipValue = "";

		// IMSC_2
		$this->IMSC_2->LinkCustomAttributes = "";
		$this->IMSC_2->HrefValue = "";
		$this->IMSC_2->TooltipValue = "";

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
		$this->LIQUIFACTION_STORAGE->HrefValue = "";
		$this->LIQUIFACTION_STORAGE->TooltipValue = "";

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
		$this->IUI_PREP_METHOD->HrefValue = "";
		$this->IUI_PREP_METHOD->TooltipValue = "";

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
		$this->TIME_FROM_TRIGGER->HrefValue = "";
		$this->TIME_FROM_TRIGGER->TooltipValue = "";

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
		$this->COLLECTION_TO_PREPARATION->HrefValue = "";
		$this->COLLECTION_TO_PREPARATION->TooltipValue = "";

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
		$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
		$this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";

		// SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
		$this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
		$this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

		// RESULTS
		$this->RESULTS->LinkCustomAttributes = "";
		$this->RESULTS->HrefValue = "";
		$this->RESULTS->TooltipValue = "";

		// ONGOING_PREG
		$this->ONGOING_PREG->LinkCustomAttributes = "";
		$this->ONGOING_PREG->HrefValue = "";
		$this->ONGOING_PREG->TooltipValue = "";

		// EDD_Date
		$this->EDD_Date->LinkCustomAttributes = "";
		$this->EDD_Date->HrefValue = "";
		$this->EDD_Date->TooltipValue = "";

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

		// NAME
		$this->NAME->EditAttrs["class"] = "form-control";
		$this->NAME->EditCustomAttributes = "";
		if (!$this->NAME->Raw)
			$this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
		$this->NAME->EditValue = $this->NAME->CurrentValue;
		$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

		// HUSBAND NAME
		$this->HUSBAND_NAME->EditAttrs["class"] = "form-control";
		$this->HUSBAND_NAME->EditCustomAttributes = "";
		if (!$this->HUSBAND_NAME->Raw)
			$this->HUSBAND_NAME->CurrentValue = HtmlDecode($this->HUSBAND_NAME->CurrentValue);
		$this->HUSBAND_NAME->EditValue = $this->HUSBAND_NAME->CurrentValue;
		$this->HUSBAND_NAME->PlaceHolder = RemoveHtml($this->HUSBAND_NAME->caption());

		// CoupleID
		$this->CoupleID->EditAttrs["class"] = "form-control";
		$this->CoupleID->EditCustomAttributes = "";
		if (!$this->CoupleID->Raw)
			$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
		$this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
		$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

		// AGE  - WIFE
		$this->AGE____WIFE->EditAttrs["class"] = "form-control";
		$this->AGE____WIFE->EditCustomAttributes = "";
		if (!$this->AGE____WIFE->Raw)
			$this->AGE____WIFE->CurrentValue = HtmlDecode($this->AGE____WIFE->CurrentValue);
		$this->AGE____WIFE->EditValue = $this->AGE____WIFE->CurrentValue;
		$this->AGE____WIFE->PlaceHolder = RemoveHtml($this->AGE____WIFE->caption());

		// AGE- HUSBAND
		$this->AGE__HUSBAND->EditAttrs["class"] = "form-control";
		$this->AGE__HUSBAND->EditCustomAttributes = "";
		if (!$this->AGE__HUSBAND->Raw)
			$this->AGE__HUSBAND->CurrentValue = HtmlDecode($this->AGE__HUSBAND->CurrentValue);
		$this->AGE__HUSBAND->EditValue = $this->AGE__HUSBAND->CurrentValue;
		$this->AGE__HUSBAND->PlaceHolder = RemoveHtml($this->AGE__HUSBAND->caption());

		// ANXIOUS TO CONCEIVE FOR
		$this->ANXIOUS_TO_CONCEIVE_FOR->EditAttrs["class"] = "form-control";
		$this->ANXIOUS_TO_CONCEIVE_FOR->EditCustomAttributes = "";
		if (!$this->ANXIOUS_TO_CONCEIVE_FOR->Raw)
			$this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue = HtmlDecode($this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue);
		$this->ANXIOUS_TO_CONCEIVE_FOR->EditValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
		$this->ANXIOUS_TO_CONCEIVE_FOR->PlaceHolder = RemoveHtml($this->ANXIOUS_TO_CONCEIVE_FOR->caption());

		// AMH ( NG/ML)
		$this->AMH_28_NG2FML29->EditAttrs["class"] = "form-control";
		$this->AMH_28_NG2FML29->EditCustomAttributes = "";
		if (!$this->AMH_28_NG2FML29->Raw)
			$this->AMH_28_NG2FML29->CurrentValue = HtmlDecode($this->AMH_28_NG2FML29->CurrentValue);
		$this->AMH_28_NG2FML29->EditValue = $this->AMH_28_NG2FML29->CurrentValue;
		$this->AMH_28_NG2FML29->PlaceHolder = RemoveHtml($this->AMH_28_NG2FML29->caption());

		// TUBAL_PATENCY
		$this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
		$this->TUBAL_PATENCY->EditCustomAttributes = "";
		if (!$this->TUBAL_PATENCY->Raw)
			$this->TUBAL_PATENCY->CurrentValue = HtmlDecode($this->TUBAL_PATENCY->CurrentValue);
		$this->TUBAL_PATENCY->EditValue = $this->TUBAL_PATENCY->CurrentValue;
		$this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

		// HSG
		$this->HSG->EditAttrs["class"] = "form-control";
		$this->HSG->EditCustomAttributes = "";
		if (!$this->HSG->Raw)
			$this->HSG->CurrentValue = HtmlDecode($this->HSG->CurrentValue);
		$this->HSG->EditValue = $this->HSG->CurrentValue;
		$this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

		// DHL
		$this->DHL->EditAttrs["class"] = "form-control";
		$this->DHL->EditCustomAttributes = "";
		if (!$this->DHL->Raw)
			$this->DHL->CurrentValue = HtmlDecode($this->DHL->CurrentValue);
		$this->DHL->EditValue = $this->DHL->CurrentValue;
		$this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

		// UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
		$this->UTERINE_PROBLEMS->EditCustomAttributes = "";
		if (!$this->UTERINE_PROBLEMS->Raw)
			$this->UTERINE_PROBLEMS->CurrentValue = HtmlDecode($this->UTERINE_PROBLEMS->CurrentValue);
		$this->UTERINE_PROBLEMS->EditValue = $this->UTERINE_PROBLEMS->CurrentValue;
		$this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

		// W_COMORBIDS
		$this->W_COMORBIDS->EditAttrs["class"] = "form-control";
		$this->W_COMORBIDS->EditCustomAttributes = "";
		if (!$this->W_COMORBIDS->Raw)
			$this->W_COMORBIDS->CurrentValue = HtmlDecode($this->W_COMORBIDS->CurrentValue);
		$this->W_COMORBIDS->EditValue = $this->W_COMORBIDS->CurrentValue;
		$this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

		// H_COMORBIDS
		$this->H_COMORBIDS->EditAttrs["class"] = "form-control";
		$this->H_COMORBIDS->EditCustomAttributes = "";
		if (!$this->H_COMORBIDS->Raw)
			$this->H_COMORBIDS->CurrentValue = HtmlDecode($this->H_COMORBIDS->CurrentValue);
		$this->H_COMORBIDS->EditValue = $this->H_COMORBIDS->CurrentValue;
		$this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

		// SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
		$this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
		if (!$this->SEXUAL_DYSFUNCTION->Raw)
			$this->SEXUAL_DYSFUNCTION->CurrentValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->CurrentValue);
		$this->SEXUAL_DYSFUNCTION->EditValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
		$this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

		// PREV IUI
		$this->PREV_IUI->EditAttrs["class"] = "form-control";
		$this->PREV_IUI->EditCustomAttributes = "";
		if (!$this->PREV_IUI->Raw)
			$this->PREV_IUI->CurrentValue = HtmlDecode($this->PREV_IUI->CurrentValue);
		$this->PREV_IUI->EditValue = $this->PREV_IUI->CurrentValue;
		$this->PREV_IUI->PlaceHolder = RemoveHtml($this->PREV_IUI->caption());

		// PREV_IVF
		$this->PREV_IVF->EditAttrs["class"] = "form-control";
		$this->PREV_IVF->EditCustomAttributes = "";
		$this->PREV_IVF->EditValue = $this->PREV_IVF->CurrentValue;
		$this->PREV_IVF->PlaceHolder = RemoveHtml($this->PREV_IVF->caption());

		// TABLETS
		$this->TABLETS->EditAttrs["class"] = "form-control";
		$this->TABLETS->EditCustomAttributes = "";
		if (!$this->TABLETS->Raw)
			$this->TABLETS->CurrentValue = HtmlDecode($this->TABLETS->CurrentValue);
		$this->TABLETS->EditValue = $this->TABLETS->CurrentValue;
		$this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

		// INJTYPE
		$this->INJTYPE->EditAttrs["class"] = "form-control";
		$this->INJTYPE->EditCustomAttributes = "";
		if (!$this->INJTYPE->Raw)
			$this->INJTYPE->CurrentValue = HtmlDecode($this->INJTYPE->CurrentValue);
		$this->INJTYPE->EditValue = $this->INJTYPE->CurrentValue;
		$this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

		// LMP
		$this->LMP->EditAttrs["class"] = "form-control";
		$this->LMP->EditCustomAttributes = "";
		$this->LMP->EditValue = FormatDateTime($this->LMP->CurrentValue, 8);
		$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

		// TRIGGERR
		$this->TRIGGERR->EditAttrs["class"] = "form-control";
		$this->TRIGGERR->EditCustomAttributes = "";
		if (!$this->TRIGGERR->Raw)
			$this->TRIGGERR->CurrentValue = HtmlDecode($this->TRIGGERR->CurrentValue);
		$this->TRIGGERR->EditValue = $this->TRIGGERR->CurrentValue;
		$this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

		// TRIGGERDATE
		$this->TRIGGERDATE->EditAttrs["class"] = "form-control";
		$this->TRIGGERDATE->EditCustomAttributes = "";
		$this->TRIGGERDATE->EditValue = FormatDateTime($this->TRIGGERDATE->CurrentValue, 8);
		$this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

		// FOLLICLE_STATUS
		$this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
		$this->FOLLICLE_STATUS->EditCustomAttributes = "";
		if (!$this->FOLLICLE_STATUS->Raw)
			$this->FOLLICLE_STATUS->CurrentValue = HtmlDecode($this->FOLLICLE_STATUS->CurrentValue);
		$this->FOLLICLE_STATUS->EditValue = $this->FOLLICLE_STATUS->CurrentValue;
		$this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

		// NUMBER_OF_IUI
		$this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
		$this->NUMBER_OF_IUI->EditCustomAttributes = "";
		if (!$this->NUMBER_OF_IUI->Raw)
			$this->NUMBER_OF_IUI->CurrentValue = HtmlDecode($this->NUMBER_OF_IUI->CurrentValue);
		$this->NUMBER_OF_IUI->EditValue = $this->NUMBER_OF_IUI->CurrentValue;
		$this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

		// PROCEDURE
		$this->PROCEDURE->EditAttrs["class"] = "form-control";
		$this->PROCEDURE->EditCustomAttributes = "";
		if (!$this->PROCEDURE->Raw)
			$this->PROCEDURE->CurrentValue = HtmlDecode($this->PROCEDURE->CurrentValue);
		$this->PROCEDURE->EditValue = $this->PROCEDURE->CurrentValue;
		$this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

		// LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
		$this->LUTEAL_SUPPORT->EditCustomAttributes = "";
		if (!$this->LUTEAL_SUPPORT->Raw)
			$this->LUTEAL_SUPPORT->CurrentValue = HtmlDecode($this->LUTEAL_SUPPORT->CurrentValue);
		$this->LUTEAL_SUPPORT->EditValue = $this->LUTEAL_SUPPORT->CurrentValue;
		$this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

		// H/D SAMPLE
		$this->H2FD_SAMPLE->EditAttrs["class"] = "form-control";
		$this->H2FD_SAMPLE->EditCustomAttributes = "";
		if (!$this->H2FD_SAMPLE->Raw)
			$this->H2FD_SAMPLE->CurrentValue = HtmlDecode($this->H2FD_SAMPLE->CurrentValue);
		$this->H2FD_SAMPLE->EditValue = $this->H2FD_SAMPLE->CurrentValue;
		$this->H2FD_SAMPLE->PlaceHolder = RemoveHtml($this->H2FD_SAMPLE->caption());

		// DONOR - I.D
		$this->DONOR___I_D->EditAttrs["class"] = "form-control";
		$this->DONOR___I_D->EditCustomAttributes = "";
		$this->DONOR___I_D->EditValue = $this->DONOR___I_D->CurrentValue;
		$this->DONOR___I_D->PlaceHolder = RemoveHtml($this->DONOR___I_D->caption());

		// PREG_TEST_DATE
		$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
		$this->PREG_TEST_DATE->EditCustomAttributes = "";
		$this->PREG_TEST_DATE->EditValue = FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 7);
		$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

		// COLLECTION  METHOD
		$this->COLLECTION__METHOD->EditAttrs["class"] = "form-control";
		$this->COLLECTION__METHOD->EditCustomAttributes = "";
		if (!$this->COLLECTION__METHOD->Raw)
			$this->COLLECTION__METHOD->CurrentValue = HtmlDecode($this->COLLECTION__METHOD->CurrentValue);
		$this->COLLECTION__METHOD->EditValue = $this->COLLECTION__METHOD->CurrentValue;
		$this->COLLECTION__METHOD->PlaceHolder = RemoveHtml($this->COLLECTION__METHOD->caption());

		// SAMPLE SOURCE
		$this->SAMPLE_SOURCE->EditAttrs["class"] = "form-control";
		$this->SAMPLE_SOURCE->EditCustomAttributes = "";
		if (!$this->SAMPLE_SOURCE->Raw)
			$this->SAMPLE_SOURCE->CurrentValue = HtmlDecode($this->SAMPLE_SOURCE->CurrentValue);
		$this->SAMPLE_SOURCE->EditValue = $this->SAMPLE_SOURCE->CurrentValue;
		$this->SAMPLE_SOURCE->PlaceHolder = RemoveHtml($this->SAMPLE_SOURCE->caption());

		// SPECIFIC_PROBLEMS
		$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
		$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
		if (!$this->SPECIFIC_PROBLEMS->Raw)
			$this->SPECIFIC_PROBLEMS->CurrentValue = HtmlDecode($this->SPECIFIC_PROBLEMS->CurrentValue);
		$this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
		$this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

		// IMSC_1
		$this->IMSC_1->EditAttrs["class"] = "form-control";
		$this->IMSC_1->EditCustomAttributes = "";
		if (!$this->IMSC_1->Raw)
			$this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
		$this->IMSC_1->EditValue = $this->IMSC_1->CurrentValue;
		$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

		// IMSC_2
		$this->IMSC_2->EditAttrs["class"] = "form-control";
		$this->IMSC_2->EditCustomAttributes = "";
		if (!$this->IMSC_2->Raw)
			$this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
		$this->IMSC_2->EditValue = $this->IMSC_2->CurrentValue;
		$this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

		// LIQUIFACTION_STORAGE
		$this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
		$this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
		if (!$this->LIQUIFACTION_STORAGE->Raw)
			$this->LIQUIFACTION_STORAGE->CurrentValue = HtmlDecode($this->LIQUIFACTION_STORAGE->CurrentValue);
		$this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
		$this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

		// IUI_PREP_METHOD
		$this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
		$this->IUI_PREP_METHOD->EditCustomAttributes = "";
		if (!$this->IUI_PREP_METHOD->Raw)
			$this->IUI_PREP_METHOD->CurrentValue = HtmlDecode($this->IUI_PREP_METHOD->CurrentValue);
		$this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->CurrentValue;
		$this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

		// TIME_FROM_TRIGGER
		$this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
		$this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
		if (!$this->TIME_FROM_TRIGGER->Raw)
			$this->TIME_FROM_TRIGGER->CurrentValue = HtmlDecode($this->TIME_FROM_TRIGGER->CurrentValue);
		$this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->CurrentValue;
		$this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

		// COLLECTION_TO_PREPARATION
		$this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
		$this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
		if (!$this->COLLECTION_TO_PREPARATION->Raw)
			$this->COLLECTION_TO_PREPARATION->CurrentValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->CurrentValue);
		$this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
		$this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

		// TIME_FROM_PREP_TO_INSEM
		$this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
		$this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
		if (!$this->TIME_FROM_PREP_TO_INSEM->Raw)
			$this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
		$this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
		$this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

		// SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
		$this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
		if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw)
			$this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
		$this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
		$this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

		// RESULTS
		$this->RESULTS->EditAttrs["class"] = "form-control";
		$this->RESULTS->EditCustomAttributes = "";
		$this->RESULTS->EditValue = $this->RESULTS->CurrentValue;
		$this->RESULTS->PlaceHolder = RemoveHtml($this->RESULTS->caption());

		// ONGOING_PREG
		$this->ONGOING_PREG->EditAttrs["class"] = "form-control";
		$this->ONGOING_PREG->EditCustomAttributes = "";
		if (!$this->ONGOING_PREG->Raw)
			$this->ONGOING_PREG->CurrentValue = HtmlDecode($this->ONGOING_PREG->CurrentValue);
		$this->ONGOING_PREG->EditValue = $this->ONGOING_PREG->CurrentValue;
		$this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

		// EDD_Date
		$this->EDD_Date->EditAttrs["class"] = "form-control";
		$this->EDD_Date->EditCustomAttributes = "";
		$this->EDD_Date->EditValue = FormatDateTime($this->EDD_Date->CurrentValue, 8);
		$this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());

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
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->HUSBAND_NAME);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->AGE____WIFE);
					$doc->exportCaption($this->AGE__HUSBAND);
					$doc->exportCaption($this->ANXIOUS_TO_CONCEIVE_FOR);
					$doc->exportCaption($this->AMH_28_NG2FML29);
					$doc->exportCaption($this->TUBAL_PATENCY);
					$doc->exportCaption($this->HSG);
					$doc->exportCaption($this->DHL);
					$doc->exportCaption($this->UTERINE_PROBLEMS);
					$doc->exportCaption($this->W_COMORBIDS);
					$doc->exportCaption($this->H_COMORBIDS);
					$doc->exportCaption($this->SEXUAL_DYSFUNCTION);
					$doc->exportCaption($this->PREV_IUI);
					$doc->exportCaption($this->PREV_IVF);
					$doc->exportCaption($this->TABLETS);
					$doc->exportCaption($this->INJTYPE);
					$doc->exportCaption($this->LMP);
					$doc->exportCaption($this->TRIGGERR);
					$doc->exportCaption($this->TRIGGERDATE);
					$doc->exportCaption($this->FOLLICLE_STATUS);
					$doc->exportCaption($this->NUMBER_OF_IUI);
					$doc->exportCaption($this->PROCEDURE);
					$doc->exportCaption($this->LUTEAL_SUPPORT);
					$doc->exportCaption($this->H2FD_SAMPLE);
					$doc->exportCaption($this->DONOR___I_D);
					$doc->exportCaption($this->PREG_TEST_DATE);
					$doc->exportCaption($this->COLLECTION__METHOD);
					$doc->exportCaption($this->SAMPLE_SOURCE);
					$doc->exportCaption($this->SPECIFIC_PROBLEMS);
					$doc->exportCaption($this->IMSC_1);
					$doc->exportCaption($this->IMSC_2);
					$doc->exportCaption($this->LIQUIFACTION_STORAGE);
					$doc->exportCaption($this->IUI_PREP_METHOD);
					$doc->exportCaption($this->TIME_FROM_TRIGGER);
					$doc->exportCaption($this->COLLECTION_TO_PREPARATION);
					$doc->exportCaption($this->TIME_FROM_PREP_TO_INSEM);
					$doc->exportCaption($this->SPECIFIC_MATERNAL_PROBLEMS);
					$doc->exportCaption($this->RESULTS);
					$doc->exportCaption($this->ONGOING_PREG);
					$doc->exportCaption($this->EDD_Date);
				} else {
					$doc->exportCaption($this->NAME);
					$doc->exportCaption($this->HUSBAND_NAME);
					$doc->exportCaption($this->CoupleID);
					$doc->exportCaption($this->AGE____WIFE);
					$doc->exportCaption($this->AGE__HUSBAND);
					$doc->exportCaption($this->ANXIOUS_TO_CONCEIVE_FOR);
					$doc->exportCaption($this->AMH_28_NG2FML29);
					$doc->exportCaption($this->TUBAL_PATENCY);
					$doc->exportCaption($this->HSG);
					$doc->exportCaption($this->DHL);
					$doc->exportCaption($this->UTERINE_PROBLEMS);
					$doc->exportCaption($this->W_COMORBIDS);
					$doc->exportCaption($this->H_COMORBIDS);
					$doc->exportCaption($this->SEXUAL_DYSFUNCTION);
					$doc->exportCaption($this->PREV_IUI);
					$doc->exportCaption($this->PREV_IVF);
					$doc->exportCaption($this->TABLETS);
					$doc->exportCaption($this->INJTYPE);
					$doc->exportCaption($this->LMP);
					$doc->exportCaption($this->TRIGGERR);
					$doc->exportCaption($this->TRIGGERDATE);
					$doc->exportCaption($this->FOLLICLE_STATUS);
					$doc->exportCaption($this->NUMBER_OF_IUI);
					$doc->exportCaption($this->PROCEDURE);
					$doc->exportCaption($this->LUTEAL_SUPPORT);
					$doc->exportCaption($this->H2FD_SAMPLE);
					$doc->exportCaption($this->DONOR___I_D);
					$doc->exportCaption($this->PREG_TEST_DATE);
					$doc->exportCaption($this->COLLECTION__METHOD);
					$doc->exportCaption($this->SAMPLE_SOURCE);
					$doc->exportCaption($this->SPECIFIC_PROBLEMS);
					$doc->exportCaption($this->IMSC_1);
					$doc->exportCaption($this->IMSC_2);
					$doc->exportCaption($this->LIQUIFACTION_STORAGE);
					$doc->exportCaption($this->IUI_PREP_METHOD);
					$doc->exportCaption($this->TIME_FROM_TRIGGER);
					$doc->exportCaption($this->COLLECTION_TO_PREPARATION);
					$doc->exportCaption($this->TIME_FROM_PREP_TO_INSEM);
					$doc->exportCaption($this->SPECIFIC_MATERNAL_PROBLEMS);
					$doc->exportCaption($this->RESULTS);
					$doc->exportCaption($this->ONGOING_PREG);
					$doc->exportCaption($this->EDD_Date);
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
						$doc->exportField($this->NAME);
						$doc->exportField($this->HUSBAND_NAME);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->AGE____WIFE);
						$doc->exportField($this->AGE__HUSBAND);
						$doc->exportField($this->ANXIOUS_TO_CONCEIVE_FOR);
						$doc->exportField($this->AMH_28_NG2FML29);
						$doc->exportField($this->TUBAL_PATENCY);
						$doc->exportField($this->HSG);
						$doc->exportField($this->DHL);
						$doc->exportField($this->UTERINE_PROBLEMS);
						$doc->exportField($this->W_COMORBIDS);
						$doc->exportField($this->H_COMORBIDS);
						$doc->exportField($this->SEXUAL_DYSFUNCTION);
						$doc->exportField($this->PREV_IUI);
						$doc->exportField($this->PREV_IVF);
						$doc->exportField($this->TABLETS);
						$doc->exportField($this->INJTYPE);
						$doc->exportField($this->LMP);
						$doc->exportField($this->TRIGGERR);
						$doc->exportField($this->TRIGGERDATE);
						$doc->exportField($this->FOLLICLE_STATUS);
						$doc->exportField($this->NUMBER_OF_IUI);
						$doc->exportField($this->PROCEDURE);
						$doc->exportField($this->LUTEAL_SUPPORT);
						$doc->exportField($this->H2FD_SAMPLE);
						$doc->exportField($this->DONOR___I_D);
						$doc->exportField($this->PREG_TEST_DATE);
						$doc->exportField($this->COLLECTION__METHOD);
						$doc->exportField($this->SAMPLE_SOURCE);
						$doc->exportField($this->SPECIFIC_PROBLEMS);
						$doc->exportField($this->IMSC_1);
						$doc->exportField($this->IMSC_2);
						$doc->exportField($this->LIQUIFACTION_STORAGE);
						$doc->exportField($this->IUI_PREP_METHOD);
						$doc->exportField($this->TIME_FROM_TRIGGER);
						$doc->exportField($this->COLLECTION_TO_PREPARATION);
						$doc->exportField($this->TIME_FROM_PREP_TO_INSEM);
						$doc->exportField($this->SPECIFIC_MATERNAL_PROBLEMS);
						$doc->exportField($this->RESULTS);
						$doc->exportField($this->ONGOING_PREG);
						$doc->exportField($this->EDD_Date);
					} else {
						$doc->exportField($this->NAME);
						$doc->exportField($this->HUSBAND_NAME);
						$doc->exportField($this->CoupleID);
						$doc->exportField($this->AGE____WIFE);
						$doc->exportField($this->AGE__HUSBAND);
						$doc->exportField($this->ANXIOUS_TO_CONCEIVE_FOR);
						$doc->exportField($this->AMH_28_NG2FML29);
						$doc->exportField($this->TUBAL_PATENCY);
						$doc->exportField($this->HSG);
						$doc->exportField($this->DHL);
						$doc->exportField($this->UTERINE_PROBLEMS);
						$doc->exportField($this->W_COMORBIDS);
						$doc->exportField($this->H_COMORBIDS);
						$doc->exportField($this->SEXUAL_DYSFUNCTION);
						$doc->exportField($this->PREV_IUI);
						$doc->exportField($this->PREV_IVF);
						$doc->exportField($this->TABLETS);
						$doc->exportField($this->INJTYPE);
						$doc->exportField($this->LMP);
						$doc->exportField($this->TRIGGERR);
						$doc->exportField($this->TRIGGERDATE);
						$doc->exportField($this->FOLLICLE_STATUS);
						$doc->exportField($this->NUMBER_OF_IUI);
						$doc->exportField($this->PROCEDURE);
						$doc->exportField($this->LUTEAL_SUPPORT);
						$doc->exportField($this->H2FD_SAMPLE);
						$doc->exportField($this->DONOR___I_D);
						$doc->exportField($this->PREG_TEST_DATE);
						$doc->exportField($this->COLLECTION__METHOD);
						$doc->exportField($this->SAMPLE_SOURCE);
						$doc->exportField($this->SPECIFIC_PROBLEMS);
						$doc->exportField($this->IMSC_1);
						$doc->exportField($this->IMSC_2);
						$doc->exportField($this->LIQUIFACTION_STORAGE);
						$doc->exportField($this->IUI_PREP_METHOD);
						$doc->exportField($this->TIME_FROM_TRIGGER);
						$doc->exportField($this->COLLECTION_TO_PREPARATION);
						$doc->exportField($this->TIME_FROM_PREP_TO_INSEM);
						$doc->exportField($this->SPECIFIC_MATERNAL_PROBLEMS);
						$doc->exportField($this->RESULTS);
						$doc->exportField($this->ONGOING_PREG);
						$doc->exportField($this->EDD_Date);
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