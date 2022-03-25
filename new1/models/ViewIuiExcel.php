<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_iui_excel
 */
class ViewIuiExcel extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

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
    public $AGE___WIFE;
    public $AGE_HUSBAND;
    public $ANXIOUS_TO_CONCEIVE_FOR;
    public $AMH__NGML;
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
    public $HD_SAMPLE;
    public $DONOR__ID;
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

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_iui_excel';
        $this->TableName = 'view_iui_excel';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_iui_excel`";
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

        // NAME
        $this->NAME = new DbField('view_iui_excel', 'view_iui_excel', 'x_NAME', 'NAME', '`NAME`', '`NAME`', 200, 50, -1, false, '`NAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NAME->Sortable = true; // Allow sort
        $this->Fields['NAME'] = &$this->NAME;

        // HUSBAND NAME
        $this->HUSBAND_NAME = new DbField('view_iui_excel', 'view_iui_excel', 'x_HUSBAND_NAME', 'HUSBAND NAME', '`HUSBAND NAME`', '`HUSBAND NAME`', 200, 50, -1, false, '`HUSBAND NAME`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HUSBAND_NAME->Sortable = true; // Allow sort
        $this->Fields['HUSBAND NAME'] = &$this->HUSBAND_NAME;

        // CoupleID
        $this->CoupleID = new DbField('view_iui_excel', 'view_iui_excel', 'x_CoupleID', 'CoupleID', '`CoupleID`', '`CoupleID`', 200, 45, -1, false, '`CoupleID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoupleID->IsPrimaryKey = true; // Primary key field
        $this->CoupleID->Nullable = false; // NOT NULL field
        $this->CoupleID->Required = true; // Required field
        $this->CoupleID->Sortable = true; // Allow sort
        $this->Fields['CoupleID'] = &$this->CoupleID;

        // AGE  - WIFE
        $this->AGE___WIFE = new DbField('view_iui_excel', 'view_iui_excel', 'x_AGE___WIFE', 'AGE  - WIFE', '`AGE  - WIFE`', '`AGE  - WIFE`', 200, 45, -1, false, '`AGE  - WIFE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AGE___WIFE->Sortable = true; // Allow sort
        $this->Fields['AGE  - WIFE'] = &$this->AGE___WIFE;

        // AGE- HUSBAND
        $this->AGE_HUSBAND = new DbField('view_iui_excel', 'view_iui_excel', 'x_AGE_HUSBAND', 'AGE- HUSBAND', '`AGE- HUSBAND`', '`AGE- HUSBAND`', 200, 45, -1, false, '`AGE- HUSBAND`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AGE_HUSBAND->Sortable = true; // Allow sort
        $this->Fields['AGE- HUSBAND'] = &$this->AGE_HUSBAND;

        // ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUS_TO_CONCEIVE_FOR = new DbField('view_iui_excel', 'view_iui_excel', 'x_ANXIOUS_TO_CONCEIVE_FOR', 'ANXIOUS TO CONCEIVE FOR', '`ANXIOUS TO CONCEIVE FOR`', '`ANXIOUS TO CONCEIVE FOR`', 200, 45, -1, false, '`ANXIOUS TO CONCEIVE FOR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ANXIOUS_TO_CONCEIVE_FOR->Sortable = true; // Allow sort
        $this->Fields['ANXIOUS TO CONCEIVE FOR'] = &$this->ANXIOUS_TO_CONCEIVE_FOR;

        // AMH ( NG/ML)
        $this->AMH__NGML = new DbField('view_iui_excel', 'view_iui_excel', 'x_AMH__NGML', 'AMH ( NG/ML)', '`AMH ( NG/ML)`', '`AMH ( NG/ML)`', 200, 45, -1, false, '`AMH ( NG/ML)`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AMH__NGML->Sortable = true; // Allow sort
        $this->Fields['AMH ( NG/ML)'] = &$this->AMH__NGML;

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY = new DbField('view_iui_excel', 'view_iui_excel', 'x_TUBAL_PATENCY', 'TUBAL_PATENCY', '`TUBAL_PATENCY`', '`TUBAL_PATENCY`', 200, 45, -1, false, '`TUBAL_PATENCY`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TUBAL_PATENCY->Sortable = true; // Allow sort
        $this->Fields['TUBAL_PATENCY'] = &$this->TUBAL_PATENCY;

        // HSG
        $this->HSG = new DbField('view_iui_excel', 'view_iui_excel', 'x_HSG', 'HSG', '`HSG`', '`HSG`', 200, 45, -1, false, '`HSG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSG->Sortable = true; // Allow sort
        $this->Fields['HSG'] = &$this->HSG;

        // DHL
        $this->DHL = new DbField('view_iui_excel', 'view_iui_excel', 'x_DHL', 'DHL', '`DHL`', '`DHL`', 200, 45, -1, false, '`DHL`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DHL->Sortable = true; // Allow sort
        $this->Fields['DHL'] = &$this->DHL;

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_UTERINE_PROBLEMS', 'UTERINE_PROBLEMS', '`UTERINE_PROBLEMS`', '`UTERINE_PROBLEMS`', 200, 45, -1, false, '`UTERINE_PROBLEMS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UTERINE_PROBLEMS->Sortable = true; // Allow sort
        $this->Fields['UTERINE_PROBLEMS'] = &$this->UTERINE_PROBLEMS;

        // W_COMORBIDS
        $this->W_COMORBIDS = new DbField('view_iui_excel', 'view_iui_excel', 'x_W_COMORBIDS', 'W_COMORBIDS', '`W_COMORBIDS`', '`W_COMORBIDS`', 200, 45, -1, false, '`W_COMORBIDS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->W_COMORBIDS->Sortable = true; // Allow sort
        $this->Fields['W_COMORBIDS'] = &$this->W_COMORBIDS;

        // H_COMORBIDS
        $this->H_COMORBIDS = new DbField('view_iui_excel', 'view_iui_excel', 'x_H_COMORBIDS', 'H_COMORBIDS', '`H_COMORBIDS`', '`H_COMORBIDS`', 200, 45, -1, false, '`H_COMORBIDS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->H_COMORBIDS->Sortable = true; // Allow sort
        $this->Fields['H_COMORBIDS'] = &$this->H_COMORBIDS;

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION = new DbField('view_iui_excel', 'view_iui_excel', 'x_SEXUAL_DYSFUNCTION', 'SEXUAL_DYSFUNCTION', '`SEXUAL_DYSFUNCTION`', '`SEXUAL_DYSFUNCTION`', 200, 45, -1, false, '`SEXUAL_DYSFUNCTION`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SEXUAL_DYSFUNCTION->Sortable = true; // Allow sort
        $this->Fields['SEXUAL_DYSFUNCTION'] = &$this->SEXUAL_DYSFUNCTION;

        // PREV IUI
        $this->PREV_IUI = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREV_IUI', 'PREV IUI', '`PREV IUI`', '`PREV IUI`', 200, 45, -1, false, '`PREV IUI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PREV_IUI->Sortable = true; // Allow sort
        $this->Fields['PREV IUI'] = &$this->PREV_IUI;

        // PREV_IVF
        $this->PREV_IVF = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREV_IVF', 'PREV_IVF', '`PREV_IVF`', '`PREV_IVF`', 201, 65530, -1, false, '`PREV_IVF`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->PREV_IVF->Nullable = false; // NOT NULL field
        $this->PREV_IVF->Required = true; // Required field
        $this->PREV_IVF->Sortable = true; // Allow sort
        $this->Fields['PREV_IVF'] = &$this->PREV_IVF;

        // TABLETS
        $this->TABLETS = new DbField('view_iui_excel', 'view_iui_excel', 'x_TABLETS', 'TABLETS', '`TABLETS`', '`TABLETS`', 200, 45, -1, false, '`TABLETS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TABLETS->Sortable = true; // Allow sort
        $this->Fields['TABLETS'] = &$this->TABLETS;

        // INJTYPE
        $this->INJTYPE = new DbField('view_iui_excel', 'view_iui_excel', 'x_INJTYPE', 'INJTYPE', '`INJTYPE`', '`INJTYPE`', 200, 45, -1, false, '`INJTYPE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->INJTYPE->Sortable = true; // Allow sort
        $this->Fields['INJTYPE'] = &$this->INJTYPE;

        // LMP
        $this->LMP = new DbField('view_iui_excel', 'view_iui_excel', 'x_LMP', 'LMP', '`LMP`', CastDateFieldForLike("`LMP`", 0, "DB"), 135, 19, 0, false, '`LMP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LMP->Sortable = true; // Allow sort
        $this->LMP->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['LMP'] = &$this->LMP;

        // TRIGGERR
        $this->TRIGGERR = new DbField('view_iui_excel', 'view_iui_excel', 'x_TRIGGERR', 'TRIGGERR', '`TRIGGERR`', '`TRIGGERR`', 200, 200, -1, false, '`TRIGGERR`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TRIGGERR->Sortable = true; // Allow sort
        $this->Fields['TRIGGERR'] = &$this->TRIGGERR;

        // TRIGGERDATE
        $this->TRIGGERDATE = new DbField('view_iui_excel', 'view_iui_excel', 'x_TRIGGERDATE', 'TRIGGERDATE', '`TRIGGERDATE`', CastDateFieldForLike("`TRIGGERDATE`", 0, "DB"), 135, 19, 0, false, '`TRIGGERDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TRIGGERDATE->Sortable = true; // Allow sort
        $this->TRIGGERDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TRIGGERDATE'] = &$this->TRIGGERDATE;

        // FOLLICLE_STATUS
        $this->FOLLICLE_STATUS = new DbField('view_iui_excel', 'view_iui_excel', 'x_FOLLICLE_STATUS', 'FOLLICLE_STATUS', '`FOLLICLE_STATUS`', '`FOLLICLE_STATUS`', 200, 45, -1, false, '`FOLLICLE_STATUS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FOLLICLE_STATUS->Sortable = true; // Allow sort
        $this->Fields['FOLLICLE_STATUS'] = &$this->FOLLICLE_STATUS;

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI = new DbField('view_iui_excel', 'view_iui_excel', 'x_NUMBER_OF_IUI', 'NUMBER_OF_IUI', '`NUMBER_OF_IUI`', '`NUMBER_OF_IUI`', 200, 45, -1, false, '`NUMBER_OF_IUI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NUMBER_OF_IUI->Sortable = true; // Allow sort
        $this->Fields['NUMBER_OF_IUI'] = &$this->NUMBER_OF_IUI;

        // PROCEDURE
        $this->PROCEDURE = new DbField('view_iui_excel', 'view_iui_excel', 'x_PROCEDURE', 'PROCEDURE', '`PROCEDURE`', '`PROCEDURE`', 200, 45, -1, false, '`PROCEDURE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PROCEDURE->Sortable = true; // Allow sort
        $this->Fields['PROCEDURE'] = &$this->PROCEDURE;

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT = new DbField('view_iui_excel', 'view_iui_excel', 'x_LUTEAL_SUPPORT', 'LUTEAL_SUPPORT', '`LUTEAL_SUPPORT`', '`LUTEAL_SUPPORT`', 200, 45, -1, false, '`LUTEAL_SUPPORT`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LUTEAL_SUPPORT->Sortable = true; // Allow sort
        $this->Fields['LUTEAL_SUPPORT'] = &$this->LUTEAL_SUPPORT;

        // H/D SAMPLE
        $this->HD_SAMPLE = new DbField('view_iui_excel', 'view_iui_excel', 'x_HD_SAMPLE', 'H/D SAMPLE', '`H/D SAMPLE`', '`H/D SAMPLE`', 200, 45, -1, false, '`H/D SAMPLE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HD_SAMPLE->Sortable = true; // Allow sort
        $this->Fields['H/D SAMPLE'] = &$this->HD_SAMPLE;

        // DONOR - I.D
        $this->DONOR__ID = new DbField('view_iui_excel', 'view_iui_excel', 'x_DONOR__ID', 'DONOR - I.D', '`DONOR - I.D`', '`DONOR - I.D`', 3, 11, -1, false, '`DONOR - I.D`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DONOR__ID->Sortable = true; // Allow sort
        $this->DONOR__ID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DONOR - I.D'] = &$this->DONOR__ID;

        // PREG_TEST_DATE
        $this->PREG_TEST_DATE = new DbField('view_iui_excel', 'view_iui_excel', 'x_PREG_TEST_DATE', 'PREG_TEST_DATE', '`PREG_TEST_DATE`', CastDateFieldForLike("`PREG_TEST_DATE`", 0, "DB"), 135, 19, 0, false, '`PREG_TEST_DATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PREG_TEST_DATE->Sortable = true; // Allow sort
        $this->PREG_TEST_DATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['PREG_TEST_DATE'] = &$this->PREG_TEST_DATE;

        // COLLECTION  METHOD
        $this->COLLECTION__METHOD = new DbField('view_iui_excel', 'view_iui_excel', 'x_COLLECTION__METHOD', 'COLLECTION  METHOD', '`COLLECTION  METHOD`', '`COLLECTION  METHOD`', 200, 45, -1, false, '`COLLECTION  METHOD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->COLLECTION__METHOD->Sortable = true; // Allow sort
        $this->Fields['COLLECTION  METHOD'] = &$this->COLLECTION__METHOD;

        // SAMPLE SOURCE
        $this->SAMPLE_SOURCE = new DbField('view_iui_excel', 'view_iui_excel', 'x_SAMPLE_SOURCE', 'SAMPLE SOURCE', '`SAMPLE SOURCE`', '`SAMPLE SOURCE`', 200, 45, -1, false, '`SAMPLE SOURCE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SAMPLE_SOURCE->Sortable = true; // Allow sort
        $this->Fields['SAMPLE SOURCE'] = &$this->SAMPLE_SOURCE;

        // SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_SPECIFIC_PROBLEMS', 'SPECIFIC_PROBLEMS', '`SPECIFIC_PROBLEMS`', '`SPECIFIC_PROBLEMS`', 200, 45, -1, false, '`SPECIFIC_PROBLEMS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SPECIFIC_PROBLEMS->Sortable = true; // Allow sort
        $this->Fields['SPECIFIC_PROBLEMS'] = &$this->SPECIFIC_PROBLEMS;

        // IMSC_1
        $this->IMSC_1 = new DbField('view_iui_excel', 'view_iui_excel', 'x_IMSC_1', 'IMSC_1', '`IMSC_1`', '`IMSC_1`', 200, 45, -1, false, '`IMSC_1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMSC_1->Sortable = true; // Allow sort
        $this->Fields['IMSC_1'] = &$this->IMSC_1;

        // IMSC_2
        $this->IMSC_2 = new DbField('view_iui_excel', 'view_iui_excel', 'x_IMSC_2', 'IMSC_2', '`IMSC_2`', '`IMSC_2`', 200, 45, -1, false, '`IMSC_2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IMSC_2->Sortable = true; // Allow sort
        $this->Fields['IMSC_2'] = &$this->IMSC_2;

        // LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE = new DbField('view_iui_excel', 'view_iui_excel', 'x_LIQUIFACTION_STORAGE', 'LIQUIFACTION_STORAGE', '`LIQUIFACTION_STORAGE`', '`LIQUIFACTION_STORAGE`', 200, 45, -1, false, '`LIQUIFACTION_STORAGE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LIQUIFACTION_STORAGE->Sortable = true; // Allow sort
        $this->Fields['LIQUIFACTION_STORAGE'] = &$this->LIQUIFACTION_STORAGE;

        // IUI_PREP_METHOD
        $this->IUI_PREP_METHOD = new DbField('view_iui_excel', 'view_iui_excel', 'x_IUI_PREP_METHOD', 'IUI_PREP_METHOD', '`IUI_PREP_METHOD`', '`IUI_PREP_METHOD`', 200, 45, -1, false, '`IUI_PREP_METHOD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUI_PREP_METHOD->Sortable = true; // Allow sort
        $this->Fields['IUI_PREP_METHOD'] = &$this->IUI_PREP_METHOD;

        // TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER = new DbField('view_iui_excel', 'view_iui_excel', 'x_TIME_FROM_TRIGGER', 'TIME_FROM_TRIGGER', '`TIME_FROM_TRIGGER`', '`TIME_FROM_TRIGGER`', 200, 45, -1, false, '`TIME_FROM_TRIGGER`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TIME_FROM_TRIGGER->Sortable = true; // Allow sort
        $this->Fields['TIME_FROM_TRIGGER'] = &$this->TIME_FROM_TRIGGER;

        // COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION = new DbField('view_iui_excel', 'view_iui_excel', 'x_COLLECTION_TO_PREPARATION', 'COLLECTION_TO_PREPARATION', '`COLLECTION_TO_PREPARATION`', '`COLLECTION_TO_PREPARATION`', 200, 45, -1, false, '`COLLECTION_TO_PREPARATION`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->COLLECTION_TO_PREPARATION->Sortable = true; // Allow sort
        $this->Fields['COLLECTION_TO_PREPARATION'] = &$this->COLLECTION_TO_PREPARATION;

        // TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM = new DbField('view_iui_excel', 'view_iui_excel', 'x_TIME_FROM_PREP_TO_INSEM', 'TIME_FROM_PREP_TO_INSEM', '`TIME_FROM_PREP_TO_INSEM`', '`TIME_FROM_PREP_TO_INSEM`', 200, 45, -1, false, '`TIME_FROM_PREP_TO_INSEM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TIME_FROM_PREP_TO_INSEM->Sortable = true; // Allow sort
        $this->Fields['TIME_FROM_PREP_TO_INSEM'] = &$this->TIME_FROM_PREP_TO_INSEM;

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS = new DbField('view_iui_excel', 'view_iui_excel', 'x_SPECIFIC_MATERNAL_PROBLEMS', 'SPECIFIC_MATERNAL_PROBLEMS', '`SPECIFIC_MATERNAL_PROBLEMS`', '`SPECIFIC_MATERNAL_PROBLEMS`', 200, 45, -1, false, '`SPECIFIC_MATERNAL_PROBLEMS`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SPECIFIC_MATERNAL_PROBLEMS->Sortable = true; // Allow sort
        $this->Fields['SPECIFIC_MATERNAL_PROBLEMS'] = &$this->SPECIFIC_MATERNAL_PROBLEMS;

        // RESULTS
        $this->RESULTS = new DbField('view_iui_excel', 'view_iui_excel', 'x_RESULTS', 'RESULTS', '`RESULTS`', '`RESULTS`', 201, 65530, -1, false, '`RESULTS`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->RESULTS->Nullable = false; // NOT NULL field
        $this->RESULTS->Required = true; // Required field
        $this->RESULTS->Sortable = true; // Allow sort
        $this->Fields['RESULTS'] = &$this->RESULTS;

        // ONGOING_PREG
        $this->ONGOING_PREG = new DbField('view_iui_excel', 'view_iui_excel', 'x_ONGOING_PREG', 'ONGOING_PREG', '`ONGOING_PREG`', '`ONGOING_PREG`', 200, 45, -1, false, '`ONGOING_PREG`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ONGOING_PREG->Sortable = true; // Allow sort
        $this->Fields['ONGOING_PREG'] = &$this->ONGOING_PREG;

        // EDD_Date
        $this->EDD_Date = new DbField('view_iui_excel', 'view_iui_excel', 'x_EDD_Date', 'EDD_Date', '`EDD_Date`', CastDateFieldForLike("`EDD_Date`", 0, "DB"), 135, 19, 0, false, '`EDD_Date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EDD_Date->Sortable = true; // Allow sort
        $this->EDD_Date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['EDD_Date'] = &$this->EDD_Date;
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
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
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
            if (array_key_exists('CoupleID', $rs)) {
                AddFilter($where, QuotedName('CoupleID', $this->Dbid) . '=' . QuotedValue($rs['CoupleID'], $this->CoupleID->DataType, $this->Dbid));
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
        $this->NAME->DbValue = $row['NAME'];
        $this->HUSBAND_NAME->DbValue = $row['HUSBAND NAME'];
        $this->CoupleID->DbValue = $row['CoupleID'];
        $this->AGE___WIFE->DbValue = $row['AGE  - WIFE'];
        $this->AGE_HUSBAND->DbValue = $row['AGE- HUSBAND'];
        $this->ANXIOUS_TO_CONCEIVE_FOR->DbValue = $row['ANXIOUS TO CONCEIVE FOR'];
        $this->AMH__NGML->DbValue = $row['AMH ( NG/ML)'];
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
        $this->HD_SAMPLE->DbValue = $row['H/D SAMPLE'];
        $this->DONOR__ID->DbValue = $row['DONOR - I.D'];
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
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('CoupleID', $row) ? $row['CoupleID'] : null;
        } else {
            $val = $this->CoupleID->OldValue !== null ? $this->CoupleID->OldValue : $this->CoupleID->CurrentValue;
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@CoupleID@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("ViewIuiExcelList");
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
        if ($pageName == "ViewIuiExcelView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewIuiExcelEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewIuiExcelAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewIuiExcelList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewIuiExcelView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewIuiExcelView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewIuiExcelAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewIuiExcelAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewIuiExcelEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewIuiExcelAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewIuiExcelDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "CoupleID:" . JsonEncode($this->CoupleID->CurrentValue, "string");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->CoupleID->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->CoupleID->CurrentValue);
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
            if (($keyValue = Param("CoupleID") ?? Route("CoupleID")) !== null) {
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
                $this->CoupleID->CurrentValue = $key;
            } else {
                $this->CoupleID->OldValue = $key;
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
        $this->NAME->setDbValue($row['NAME']);
        $this->HUSBAND_NAME->setDbValue($row['HUSBAND NAME']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->AGE___WIFE->setDbValue($row['AGE  - WIFE']);
        $this->AGE_HUSBAND->setDbValue($row['AGE- HUSBAND']);
        $this->ANXIOUS_TO_CONCEIVE_FOR->setDbValue($row['ANXIOUS TO CONCEIVE FOR']);
        $this->AMH__NGML->setDbValue($row['AMH ( NG/ML)']);
        $this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
        $this->HSG->setDbValue($row['HSG']);
        $this->DHL->setDbValue($row['DHL']);
        $this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
        $this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
        $this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
        $this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
        $this->PREV_IUI->setDbValue($row['PREV IUI']);
        $this->PREV_IVF->setDbValue($row['PREV_IVF']);
        $this->TABLETS->setDbValue($row['TABLETS']);
        $this->INJTYPE->setDbValue($row['INJTYPE']);
        $this->LMP->setDbValue($row['LMP']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
        $this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
        $this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
        $this->HD_SAMPLE->setDbValue($row['H/D SAMPLE']);
        $this->DONOR__ID->setDbValue($row['DONOR - I.D']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->COLLECTION__METHOD->setDbValue($row['COLLECTION  METHOD']);
        $this->SAMPLE_SOURCE->setDbValue($row['SAMPLE SOURCE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
        $this->RESULTS->setDbValue($row['RESULTS']);
        $this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
        $this->EDD_Date->setDbValue($row['EDD_Date']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

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
        $this->AGE___WIFE->ViewValue = $this->AGE___WIFE->CurrentValue;
        $this->AGE___WIFE->ViewCustomAttributes = "";

        // AGE- HUSBAND
        $this->AGE_HUSBAND->ViewValue = $this->AGE_HUSBAND->CurrentValue;
        $this->AGE_HUSBAND->ViewCustomAttributes = "";

        // ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
        $this->ANXIOUS_TO_CONCEIVE_FOR->ViewCustomAttributes = "";

        // AMH ( NG/ML)
        $this->AMH__NGML->ViewValue = $this->AMH__NGML->CurrentValue;
        $this->AMH__NGML->ViewCustomAttributes = "";

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
        $this->HD_SAMPLE->ViewValue = $this->HD_SAMPLE->CurrentValue;
        $this->HD_SAMPLE->ViewCustomAttributes = "";

        // DONOR - I.D
        $this->DONOR__ID->ViewValue = $this->DONOR__ID->CurrentValue;
        $this->DONOR__ID->ViewValue = FormatNumber($this->DONOR__ID->ViewValue, 0, -2, -2, -2);
        $this->DONOR__ID->ViewCustomAttributes = "";

        // PREG_TEST_DATE
        $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
        $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
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
        $this->AGE___WIFE->LinkCustomAttributes = "";
        $this->AGE___WIFE->HrefValue = "";
        $this->AGE___WIFE->TooltipValue = "";

        // AGE- HUSBAND
        $this->AGE_HUSBAND->LinkCustomAttributes = "";
        $this->AGE_HUSBAND->HrefValue = "";
        $this->AGE_HUSBAND->TooltipValue = "";

        // ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUS_TO_CONCEIVE_FOR->LinkCustomAttributes = "";
        $this->ANXIOUS_TO_CONCEIVE_FOR->HrefValue = "";
        $this->ANXIOUS_TO_CONCEIVE_FOR->TooltipValue = "";

        // AMH ( NG/ML)
        $this->AMH__NGML->LinkCustomAttributes = "";
        $this->AMH__NGML->HrefValue = "";
        $this->AMH__NGML->TooltipValue = "";

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
        $this->HD_SAMPLE->LinkCustomAttributes = "";
        $this->HD_SAMPLE->HrefValue = "";
        $this->HD_SAMPLE->TooltipValue = "";

        // DONOR - I.D
        $this->DONOR__ID->LinkCustomAttributes = "";
        $this->DONOR__ID->HrefValue = "";
        $this->DONOR__ID->TooltipValue = "";

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

        // NAME
        $this->NAME->EditAttrs["class"] = "form-control";
        $this->NAME->EditCustomAttributes = "";
        if (!$this->NAME->Raw) {
            $this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
        }
        $this->NAME->EditValue = $this->NAME->CurrentValue;
        $this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

        // HUSBAND NAME
        $this->HUSBAND_NAME->EditAttrs["class"] = "form-control";
        $this->HUSBAND_NAME->EditCustomAttributes = "";
        if (!$this->HUSBAND_NAME->Raw) {
            $this->HUSBAND_NAME->CurrentValue = HtmlDecode($this->HUSBAND_NAME->CurrentValue);
        }
        $this->HUSBAND_NAME->EditValue = $this->HUSBAND_NAME->CurrentValue;
        $this->HUSBAND_NAME->PlaceHolder = RemoveHtml($this->HUSBAND_NAME->caption());

        // CoupleID
        $this->CoupleID->EditAttrs["class"] = "form-control";
        $this->CoupleID->EditCustomAttributes = "";
        if (!$this->CoupleID->Raw) {
            $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
        }
        $this->CoupleID->EditValue = $this->CoupleID->CurrentValue;
        $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

        // AGE  - WIFE
        $this->AGE___WIFE->EditAttrs["class"] = "form-control";
        $this->AGE___WIFE->EditCustomAttributes = "";
        if (!$this->AGE___WIFE->Raw) {
            $this->AGE___WIFE->CurrentValue = HtmlDecode($this->AGE___WIFE->CurrentValue);
        }
        $this->AGE___WIFE->EditValue = $this->AGE___WIFE->CurrentValue;
        $this->AGE___WIFE->PlaceHolder = RemoveHtml($this->AGE___WIFE->caption());

        // AGE- HUSBAND
        $this->AGE_HUSBAND->EditAttrs["class"] = "form-control";
        $this->AGE_HUSBAND->EditCustomAttributes = "";
        if (!$this->AGE_HUSBAND->Raw) {
            $this->AGE_HUSBAND->CurrentValue = HtmlDecode($this->AGE_HUSBAND->CurrentValue);
        }
        $this->AGE_HUSBAND->EditValue = $this->AGE_HUSBAND->CurrentValue;
        $this->AGE_HUSBAND->PlaceHolder = RemoveHtml($this->AGE_HUSBAND->caption());

        // ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUS_TO_CONCEIVE_FOR->EditAttrs["class"] = "form-control";
        $this->ANXIOUS_TO_CONCEIVE_FOR->EditCustomAttributes = "";
        if (!$this->ANXIOUS_TO_CONCEIVE_FOR->Raw) {
            $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue = HtmlDecode($this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue);
        }
        $this->ANXIOUS_TO_CONCEIVE_FOR->EditValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
        $this->ANXIOUS_TO_CONCEIVE_FOR->PlaceHolder = RemoveHtml($this->ANXIOUS_TO_CONCEIVE_FOR->caption());

        // AMH ( NG/ML)
        $this->AMH__NGML->EditAttrs["class"] = "form-control";
        $this->AMH__NGML->EditCustomAttributes = "";
        if (!$this->AMH__NGML->Raw) {
            $this->AMH__NGML->CurrentValue = HtmlDecode($this->AMH__NGML->CurrentValue);
        }
        $this->AMH__NGML->EditValue = $this->AMH__NGML->CurrentValue;
        $this->AMH__NGML->PlaceHolder = RemoveHtml($this->AMH__NGML->caption());

        // TUBAL_PATENCY
        $this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
        $this->TUBAL_PATENCY->EditCustomAttributes = "";
        if (!$this->TUBAL_PATENCY->Raw) {
            $this->TUBAL_PATENCY->CurrentValue = HtmlDecode($this->TUBAL_PATENCY->CurrentValue);
        }
        $this->TUBAL_PATENCY->EditValue = $this->TUBAL_PATENCY->CurrentValue;
        $this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

        // HSG
        $this->HSG->EditAttrs["class"] = "form-control";
        $this->HSG->EditCustomAttributes = "";
        if (!$this->HSG->Raw) {
            $this->HSG->CurrentValue = HtmlDecode($this->HSG->CurrentValue);
        }
        $this->HSG->EditValue = $this->HSG->CurrentValue;
        $this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

        // DHL
        $this->DHL->EditAttrs["class"] = "form-control";
        $this->DHL->EditCustomAttributes = "";
        if (!$this->DHL->Raw) {
            $this->DHL->CurrentValue = HtmlDecode($this->DHL->CurrentValue);
        }
        $this->DHL->EditValue = $this->DHL->CurrentValue;
        $this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

        // UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
        $this->UTERINE_PROBLEMS->EditCustomAttributes = "";
        if (!$this->UTERINE_PROBLEMS->Raw) {
            $this->UTERINE_PROBLEMS->CurrentValue = HtmlDecode($this->UTERINE_PROBLEMS->CurrentValue);
        }
        $this->UTERINE_PROBLEMS->EditValue = $this->UTERINE_PROBLEMS->CurrentValue;
        $this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

        // W_COMORBIDS
        $this->W_COMORBIDS->EditAttrs["class"] = "form-control";
        $this->W_COMORBIDS->EditCustomAttributes = "";
        if (!$this->W_COMORBIDS->Raw) {
            $this->W_COMORBIDS->CurrentValue = HtmlDecode($this->W_COMORBIDS->CurrentValue);
        }
        $this->W_COMORBIDS->EditValue = $this->W_COMORBIDS->CurrentValue;
        $this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

        // H_COMORBIDS
        $this->H_COMORBIDS->EditAttrs["class"] = "form-control";
        $this->H_COMORBIDS->EditCustomAttributes = "";
        if (!$this->H_COMORBIDS->Raw) {
            $this->H_COMORBIDS->CurrentValue = HtmlDecode($this->H_COMORBIDS->CurrentValue);
        }
        $this->H_COMORBIDS->EditValue = $this->H_COMORBIDS->CurrentValue;
        $this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

        // SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
        $this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
        if (!$this->SEXUAL_DYSFUNCTION->Raw) {
            $this->SEXUAL_DYSFUNCTION->CurrentValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->CurrentValue);
        }
        $this->SEXUAL_DYSFUNCTION->EditValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
        $this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

        // PREV IUI
        $this->PREV_IUI->EditAttrs["class"] = "form-control";
        $this->PREV_IUI->EditCustomAttributes = "";
        if (!$this->PREV_IUI->Raw) {
            $this->PREV_IUI->CurrentValue = HtmlDecode($this->PREV_IUI->CurrentValue);
        }
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
        if (!$this->TABLETS->Raw) {
            $this->TABLETS->CurrentValue = HtmlDecode($this->TABLETS->CurrentValue);
        }
        $this->TABLETS->EditValue = $this->TABLETS->CurrentValue;
        $this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

        // INJTYPE
        $this->INJTYPE->EditAttrs["class"] = "form-control";
        $this->INJTYPE->EditCustomAttributes = "";
        if (!$this->INJTYPE->Raw) {
            $this->INJTYPE->CurrentValue = HtmlDecode($this->INJTYPE->CurrentValue);
        }
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
        if (!$this->TRIGGERR->Raw) {
            $this->TRIGGERR->CurrentValue = HtmlDecode($this->TRIGGERR->CurrentValue);
        }
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
        if (!$this->FOLLICLE_STATUS->Raw) {
            $this->FOLLICLE_STATUS->CurrentValue = HtmlDecode($this->FOLLICLE_STATUS->CurrentValue);
        }
        $this->FOLLICLE_STATUS->EditValue = $this->FOLLICLE_STATUS->CurrentValue;
        $this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

        // NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
        $this->NUMBER_OF_IUI->EditCustomAttributes = "";
        if (!$this->NUMBER_OF_IUI->Raw) {
            $this->NUMBER_OF_IUI->CurrentValue = HtmlDecode($this->NUMBER_OF_IUI->CurrentValue);
        }
        $this->NUMBER_OF_IUI->EditValue = $this->NUMBER_OF_IUI->CurrentValue;
        $this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

        // PROCEDURE
        $this->PROCEDURE->EditAttrs["class"] = "form-control";
        $this->PROCEDURE->EditCustomAttributes = "";
        if (!$this->PROCEDURE->Raw) {
            $this->PROCEDURE->CurrentValue = HtmlDecode($this->PROCEDURE->CurrentValue);
        }
        $this->PROCEDURE->EditValue = $this->PROCEDURE->CurrentValue;
        $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

        // LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
        $this->LUTEAL_SUPPORT->EditCustomAttributes = "";
        if (!$this->LUTEAL_SUPPORT->Raw) {
            $this->LUTEAL_SUPPORT->CurrentValue = HtmlDecode($this->LUTEAL_SUPPORT->CurrentValue);
        }
        $this->LUTEAL_SUPPORT->EditValue = $this->LUTEAL_SUPPORT->CurrentValue;
        $this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

        // H/D SAMPLE
        $this->HD_SAMPLE->EditAttrs["class"] = "form-control";
        $this->HD_SAMPLE->EditCustomAttributes = "";
        if (!$this->HD_SAMPLE->Raw) {
            $this->HD_SAMPLE->CurrentValue = HtmlDecode($this->HD_SAMPLE->CurrentValue);
        }
        $this->HD_SAMPLE->EditValue = $this->HD_SAMPLE->CurrentValue;
        $this->HD_SAMPLE->PlaceHolder = RemoveHtml($this->HD_SAMPLE->caption());

        // DONOR - I.D
        $this->DONOR__ID->EditAttrs["class"] = "form-control";
        $this->DONOR__ID->EditCustomAttributes = "";
        $this->DONOR__ID->EditValue = $this->DONOR__ID->CurrentValue;
        $this->DONOR__ID->PlaceHolder = RemoveHtml($this->DONOR__ID->caption());

        // PREG_TEST_DATE
        $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
        $this->PREG_TEST_DATE->EditCustomAttributes = "";
        $this->PREG_TEST_DATE->EditValue = FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8);
        $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

        // COLLECTION  METHOD
        $this->COLLECTION__METHOD->EditAttrs["class"] = "form-control";
        $this->COLLECTION__METHOD->EditCustomAttributes = "";
        if (!$this->COLLECTION__METHOD->Raw) {
            $this->COLLECTION__METHOD->CurrentValue = HtmlDecode($this->COLLECTION__METHOD->CurrentValue);
        }
        $this->COLLECTION__METHOD->EditValue = $this->COLLECTION__METHOD->CurrentValue;
        $this->COLLECTION__METHOD->PlaceHolder = RemoveHtml($this->COLLECTION__METHOD->caption());

        // SAMPLE SOURCE
        $this->SAMPLE_SOURCE->EditAttrs["class"] = "form-control";
        $this->SAMPLE_SOURCE->EditCustomAttributes = "";
        if (!$this->SAMPLE_SOURCE->Raw) {
            $this->SAMPLE_SOURCE->CurrentValue = HtmlDecode($this->SAMPLE_SOURCE->CurrentValue);
        }
        $this->SAMPLE_SOURCE->EditValue = $this->SAMPLE_SOURCE->CurrentValue;
        $this->SAMPLE_SOURCE->PlaceHolder = RemoveHtml($this->SAMPLE_SOURCE->caption());

        // SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
        $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
        if (!$this->SPECIFIC_PROBLEMS->Raw) {
            $this->SPECIFIC_PROBLEMS->CurrentValue = HtmlDecode($this->SPECIFIC_PROBLEMS->CurrentValue);
        }
        $this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
        $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

        // IMSC_1
        $this->IMSC_1->EditAttrs["class"] = "form-control";
        $this->IMSC_1->EditCustomAttributes = "";
        if (!$this->IMSC_1->Raw) {
            $this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
        }
        $this->IMSC_1->EditValue = $this->IMSC_1->CurrentValue;
        $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

        // IMSC_2
        $this->IMSC_2->EditAttrs["class"] = "form-control";
        $this->IMSC_2->EditCustomAttributes = "";
        if (!$this->IMSC_2->Raw) {
            $this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
        }
        $this->IMSC_2->EditValue = $this->IMSC_2->CurrentValue;
        $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

        // LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
        $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
        if (!$this->LIQUIFACTION_STORAGE->Raw) {
            $this->LIQUIFACTION_STORAGE->CurrentValue = HtmlDecode($this->LIQUIFACTION_STORAGE->CurrentValue);
        }
        $this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
        $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

        // IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
        $this->IUI_PREP_METHOD->EditCustomAttributes = "";
        if (!$this->IUI_PREP_METHOD->Raw) {
            $this->IUI_PREP_METHOD->CurrentValue = HtmlDecode($this->IUI_PREP_METHOD->CurrentValue);
        }
        $this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->CurrentValue;
        $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

        // TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
        $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
        if (!$this->TIME_FROM_TRIGGER->Raw) {
            $this->TIME_FROM_TRIGGER->CurrentValue = HtmlDecode($this->TIME_FROM_TRIGGER->CurrentValue);
        }
        $this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->CurrentValue;
        $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

        // COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
        $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
        if (!$this->COLLECTION_TO_PREPARATION->Raw) {
            $this->COLLECTION_TO_PREPARATION->CurrentValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->CurrentValue);
        }
        $this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
        $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

        // TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
        $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
        if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
            $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
        }
        $this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
        $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

        // SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
        $this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
        if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw) {
            $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
        }
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
        if (!$this->ONGOING_PREG->Raw) {
            $this->ONGOING_PREG->CurrentValue = HtmlDecode($this->ONGOING_PREG->CurrentValue);
        }
        $this->ONGOING_PREG->EditValue = $this->ONGOING_PREG->CurrentValue;
        $this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

        // EDD_Date
        $this->EDD_Date->EditAttrs["class"] = "form-control";
        $this->EDD_Date->EditCustomAttributes = "";
        $this->EDD_Date->EditValue = FormatDateTime($this->EDD_Date->CurrentValue, 8);
        $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());

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
                    $doc->exportCaption($this->NAME);
                    $doc->exportCaption($this->HUSBAND_NAME);
                    $doc->exportCaption($this->CoupleID);
                    $doc->exportCaption($this->AGE___WIFE);
                    $doc->exportCaption($this->AGE_HUSBAND);
                    $doc->exportCaption($this->ANXIOUS_TO_CONCEIVE_FOR);
                    $doc->exportCaption($this->AMH__NGML);
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
                    $doc->exportCaption($this->HD_SAMPLE);
                    $doc->exportCaption($this->DONOR__ID);
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
                    $doc->exportCaption($this->AGE___WIFE);
                    $doc->exportCaption($this->AGE_HUSBAND);
                    $doc->exportCaption($this->ANXIOUS_TO_CONCEIVE_FOR);
                    $doc->exportCaption($this->AMH__NGML);
                    $doc->exportCaption($this->TUBAL_PATENCY);
                    $doc->exportCaption($this->HSG);
                    $doc->exportCaption($this->DHL);
                    $doc->exportCaption($this->UTERINE_PROBLEMS);
                    $doc->exportCaption($this->W_COMORBIDS);
                    $doc->exportCaption($this->H_COMORBIDS);
                    $doc->exportCaption($this->SEXUAL_DYSFUNCTION);
                    $doc->exportCaption($this->PREV_IUI);
                    $doc->exportCaption($this->TABLETS);
                    $doc->exportCaption($this->INJTYPE);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->TRIGGERR);
                    $doc->exportCaption($this->TRIGGERDATE);
                    $doc->exportCaption($this->FOLLICLE_STATUS);
                    $doc->exportCaption($this->NUMBER_OF_IUI);
                    $doc->exportCaption($this->PROCEDURE);
                    $doc->exportCaption($this->LUTEAL_SUPPORT);
                    $doc->exportCaption($this->HD_SAMPLE);
                    $doc->exportCaption($this->DONOR__ID);
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
                    $doc->exportCaption($this->ONGOING_PREG);
                    $doc->exportCaption($this->EDD_Date);
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
                        $doc->exportField($this->NAME);
                        $doc->exportField($this->HUSBAND_NAME);
                        $doc->exportField($this->CoupleID);
                        $doc->exportField($this->AGE___WIFE);
                        $doc->exportField($this->AGE_HUSBAND);
                        $doc->exportField($this->ANXIOUS_TO_CONCEIVE_FOR);
                        $doc->exportField($this->AMH__NGML);
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
                        $doc->exportField($this->HD_SAMPLE);
                        $doc->exportField($this->DONOR__ID);
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
                        $doc->exportField($this->AGE___WIFE);
                        $doc->exportField($this->AGE_HUSBAND);
                        $doc->exportField($this->ANXIOUS_TO_CONCEIVE_FOR);
                        $doc->exportField($this->AMH__NGML);
                        $doc->exportField($this->TUBAL_PATENCY);
                        $doc->exportField($this->HSG);
                        $doc->exportField($this->DHL);
                        $doc->exportField($this->UTERINE_PROBLEMS);
                        $doc->exportField($this->W_COMORBIDS);
                        $doc->exportField($this->H_COMORBIDS);
                        $doc->exportField($this->SEXUAL_DYSFUNCTION);
                        $doc->exportField($this->PREV_IUI);
                        $doc->exportField($this->TABLETS);
                        $doc->exportField($this->INJTYPE);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->TRIGGERR);
                        $doc->exportField($this->TRIGGERDATE);
                        $doc->exportField($this->FOLLICLE_STATUS);
                        $doc->exportField($this->NUMBER_OF_IUI);
                        $doc->exportField($this->PROCEDURE);
                        $doc->exportField($this->LUTEAL_SUPPORT);
                        $doc->exportField($this->HD_SAMPLE);
                        $doc->exportField($this->DONOR__ID);
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
                        $doc->exportField($this->ONGOING_PREG);
                        $doc->exportField($this->EDD_Date);
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
