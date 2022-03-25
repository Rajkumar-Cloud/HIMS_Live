<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for monitor_treatment_plan
 */
class MonitorTreatmentPlan extends DbTable
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
    public $PatId;
    public $PatientId;
    public $PatientName;
    public $Age;
    public $MobileNo;
    public $ConsultantName;
    public $RefDrName;
    public $RefDrMobileNo;
    public $NewVisitDate;
    public $NewVisitYesNo;
    public $Treatment;
    public $IUIDoneDate1;
    public $IUIDoneYesNo1;
    public $UPTTestDate1;
    public $UPTTestYesNo1;
    public $IUIDoneDate2;
    public $IUIDoneYesNo2;
    public $UPTTestDate2;
    public $UPTTestYesNo2;
    public $IUIDoneDate3;
    public $IUIDoneYesNo3;
    public $UPTTestDate3;
    public $UPTTestYesNo3;
    public $IUIDoneDate4;
    public $IUIDoneYesNo4;
    public $UPTTestDate4;
    public $UPTTestYesNo4;
    public $IVFStimulationDate;
    public $IVFStimulationYesNo;
    public $OPUDate;
    public $OPUYesNo;
    public $ETDate;
    public $ETYesNo;
    public $BetaHCGDate;
    public $BetaHCGYesNo;
    public $FETDate;
    public $FETYesNo;
    public $FBetaHCGDate;
    public $FBetaHCGYesNo;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $HospID;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'monitor_treatment_plan';
        $this->TableName = 'monitor_treatment_plan';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`monitor_treatment_plan`";
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
        $this->id = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatId
        $this->PatId = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatId', 'PatId', '`PatId`', '`PatId`', 3, 11, -1, false, '`PatId`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatId->Sortable = true; // Allow sort
        $this->PatId->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatId->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatId->Lookup = new Lookup('PatId', 'patient', false, 'id', ["first_name","PatientID","mobile_no",""], [], [], [], [], ["PatientID","first_name","Age","mobile_no","ReferA4TreatingConsultant","ReferedByDr","ReferMobileNo"], ["x_PatientId","x_PatientName","x_Age","x_MobileNo","x_ConsultantName","x_RefDrName","x_RefDrMobileNo"], '`id` DESC', '');
        $this->PatId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PatId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatId->Param, "CustomMsg");
        $this->Fields['PatId'] = &$this->PatId;

        // PatientId
        $this->PatientId = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // Age
        $this->Age = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // MobileNo
        $this->MobileNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_MobileNo', 'MobileNo', '`MobileNo`', '`MobileNo`', 200, 45, -1, false, '`MobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNo->Sortable = true; // Allow sort
        $this->MobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNo->Param, "CustomMsg");
        $this->Fields['MobileNo'] = &$this->MobileNo;

        // ConsultantName
        $this->ConsultantName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ConsultantName', 'ConsultantName', '`ConsultantName`', '`ConsultantName`', 200, 45, -1, false, '`ConsultantName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ConsultantName->Sortable = true; // Allow sort
        $this->ConsultantName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ConsultantName->Param, "CustomMsg");
        $this->Fields['ConsultantName'] = &$this->ConsultantName;

        // RefDrName
        $this->RefDrName = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_RefDrName', 'RefDrName', '`RefDrName`', '`RefDrName`', 200, 45, -1, false, '`RefDrName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefDrName->Sortable = true; // Allow sort
        $this->RefDrName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefDrName->Param, "CustomMsg");
        $this->Fields['RefDrName'] = &$this->RefDrName;

        // RefDrMobileNo
        $this->RefDrMobileNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_RefDrMobileNo', 'RefDrMobileNo', '`RefDrMobileNo`', '`RefDrMobileNo`', 200, 45, -1, false, '`RefDrMobileNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefDrMobileNo->Sortable = true; // Allow sort
        $this->RefDrMobileNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RefDrMobileNo->Param, "CustomMsg");
        $this->Fields['RefDrMobileNo'] = &$this->RefDrMobileNo;

        // NewVisitDate
        $this->NewVisitDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_NewVisitDate', 'NewVisitDate', '`NewVisitDate`', CastDateFieldForLike("`NewVisitDate`", 7, "DB"), 135, 19, 7, false, '`NewVisitDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NewVisitDate->Sortable = true; // Allow sort
        $this->NewVisitDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->NewVisitDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NewVisitDate->Param, "CustomMsg");
        $this->Fields['NewVisitDate'] = &$this->NewVisitDate;

        // NewVisitYesNo
        $this->NewVisitYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_NewVisitYesNo', 'NewVisitYesNo', '`NewVisitYesNo`', '`NewVisitYesNo`', 200, 45, -1, false, '`NewVisitYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->NewVisitYesNo->Sortable = true; // Allow sort
        $this->NewVisitYesNo->Lookup = new Lookup('NewVisitYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->NewVisitYesNo->OptionCount = 2;
        $this->NewVisitYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NewVisitYesNo->Param, "CustomMsg");
        $this->Fields['NewVisitYesNo'] = &$this->NewVisitYesNo;

        // Treatment
        $this->Treatment = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Treatment->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Treatment->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Treatment->Lookup = new Lookup('Treatment', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Treatment->OptionCount = 4;
        $this->Treatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatment->Param, "CustomMsg");
        $this->Fields['Treatment'] = &$this->Treatment;

        // IUIDoneDate1
        $this->IUIDoneDate1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate1', 'IUIDoneDate1', '`IUIDoneDate1`', CastDateFieldForLike("`IUIDoneDate1`", 7, "DB"), 135, 19, 7, false, '`IUIDoneDate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUIDoneDate1->Sortable = true; // Allow sort
        $this->IUIDoneDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->IUIDoneDate1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneDate1->Param, "CustomMsg");
        $this->Fields['IUIDoneDate1'] = &$this->IUIDoneDate1;

        // IUIDoneYesNo1
        $this->IUIDoneYesNo1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo1', 'IUIDoneYesNo1', '`IUIDoneYesNo1`', '`IUIDoneYesNo1`', 200, 45, -1, false, '`IUIDoneYesNo1`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->IUIDoneYesNo1->Sortable = true; // Allow sort
        $this->IUIDoneYesNo1->Lookup = new Lookup('IUIDoneYesNo1', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IUIDoneYesNo1->OptionCount = 2;
        $this->IUIDoneYesNo1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneYesNo1->Param, "CustomMsg");
        $this->Fields['IUIDoneYesNo1'] = &$this->IUIDoneYesNo1;

        // UPTTestDate1
        $this->UPTTestDate1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate1', 'UPTTestDate1', '`UPTTestDate1`', CastDateFieldForLike("`UPTTestDate1`", 7, "DB"), 135, 19, 7, false, '`UPTTestDate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UPTTestDate1->Sortable = true; // Allow sort
        $this->UPTTestDate1->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->UPTTestDate1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestDate1->Param, "CustomMsg");
        $this->Fields['UPTTestDate1'] = &$this->UPTTestDate1;

        // UPTTestYesNo1
        $this->UPTTestYesNo1 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo1', 'UPTTestYesNo1', '`UPTTestYesNo1`', '`UPTTestYesNo1`', 200, 45, -1, false, '`UPTTestYesNo1`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->UPTTestYesNo1->Sortable = true; // Allow sort
        $this->UPTTestYesNo1->Lookup = new Lookup('UPTTestYesNo1', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->UPTTestYesNo1->OptionCount = 2;
        $this->UPTTestYesNo1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestYesNo1->Param, "CustomMsg");
        $this->Fields['UPTTestYesNo1'] = &$this->UPTTestYesNo1;

        // IUIDoneDate2
        $this->IUIDoneDate2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate2', 'IUIDoneDate2', '`IUIDoneDate2`', CastDateFieldForLike("`IUIDoneDate2`", 7, "DB"), 135, 19, 7, false, '`IUIDoneDate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUIDoneDate2->Sortable = true; // Allow sort
        $this->IUIDoneDate2->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->IUIDoneDate2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneDate2->Param, "CustomMsg");
        $this->Fields['IUIDoneDate2'] = &$this->IUIDoneDate2;

        // IUIDoneYesNo2
        $this->IUIDoneYesNo2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo2', 'IUIDoneYesNo2', '`IUIDoneYesNo2`', '`IUIDoneYesNo2`', 200, 45, -1, false, '`IUIDoneYesNo2`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->IUIDoneYesNo2->Sortable = true; // Allow sort
        $this->IUIDoneYesNo2->Lookup = new Lookup('IUIDoneYesNo2', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IUIDoneYesNo2->OptionCount = 2;
        $this->IUIDoneYesNo2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneYesNo2->Param, "CustomMsg");
        $this->Fields['IUIDoneYesNo2'] = &$this->IUIDoneYesNo2;

        // UPTTestDate2
        $this->UPTTestDate2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate2', 'UPTTestDate2', '`UPTTestDate2`', CastDateFieldForLike("`UPTTestDate2`", 7, "DB"), 135, 19, 7, false, '`UPTTestDate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UPTTestDate2->Sortable = true; // Allow sort
        $this->UPTTestDate2->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->UPTTestDate2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestDate2->Param, "CustomMsg");
        $this->Fields['UPTTestDate2'] = &$this->UPTTestDate2;

        // UPTTestYesNo2
        $this->UPTTestYesNo2 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo2', 'UPTTestYesNo2', '`UPTTestYesNo2`', '`UPTTestYesNo2`', 200, 45, -1, false, '`UPTTestYesNo2`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->UPTTestYesNo2->Sortable = true; // Allow sort
        $this->UPTTestYesNo2->Lookup = new Lookup('UPTTestYesNo2', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->UPTTestYesNo2->OptionCount = 2;
        $this->UPTTestYesNo2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestYesNo2->Param, "CustomMsg");
        $this->Fields['UPTTestYesNo2'] = &$this->UPTTestYesNo2;

        // IUIDoneDate3
        $this->IUIDoneDate3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate3', 'IUIDoneDate3', '`IUIDoneDate3`', CastDateFieldForLike("`IUIDoneDate3`", 7, "DB"), 135, 19, 7, false, '`IUIDoneDate3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUIDoneDate3->Sortable = true; // Allow sort
        $this->IUIDoneDate3->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->IUIDoneDate3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneDate3->Param, "CustomMsg");
        $this->Fields['IUIDoneDate3'] = &$this->IUIDoneDate3;

        // IUIDoneYesNo3
        $this->IUIDoneYesNo3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo3', 'IUIDoneYesNo3', '`IUIDoneYesNo3`', '`IUIDoneYesNo3`', 200, 45, -1, false, '`IUIDoneYesNo3`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->IUIDoneYesNo3->Sortable = true; // Allow sort
        $this->IUIDoneYesNo3->Lookup = new Lookup('IUIDoneYesNo3', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IUIDoneYesNo3->OptionCount = 2;
        $this->IUIDoneYesNo3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneYesNo3->Param, "CustomMsg");
        $this->Fields['IUIDoneYesNo3'] = &$this->IUIDoneYesNo3;

        // UPTTestDate3
        $this->UPTTestDate3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate3', 'UPTTestDate3', '`UPTTestDate3`', CastDateFieldForLike("`UPTTestDate3`", 7, "DB"), 135, 19, 7, false, '`UPTTestDate3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UPTTestDate3->Sortable = true; // Allow sort
        $this->UPTTestDate3->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->UPTTestDate3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestDate3->Param, "CustomMsg");
        $this->Fields['UPTTestDate3'] = &$this->UPTTestDate3;

        // UPTTestYesNo3
        $this->UPTTestYesNo3 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo3', 'UPTTestYesNo3', '`UPTTestYesNo3`', '`UPTTestYesNo3`', 200, 45, -1, false, '`UPTTestYesNo3`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->UPTTestYesNo3->Sortable = true; // Allow sort
        $this->UPTTestYesNo3->Lookup = new Lookup('UPTTestYesNo3', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->UPTTestYesNo3->OptionCount = 2;
        $this->UPTTestYesNo3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestYesNo3->Param, "CustomMsg");
        $this->Fields['UPTTestYesNo3'] = &$this->UPTTestYesNo3;

        // IUIDoneDate4
        $this->IUIDoneDate4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneDate4', 'IUIDoneDate4', '`IUIDoneDate4`', CastDateFieldForLike("`IUIDoneDate4`", 7, "DB"), 135, 19, 7, false, '`IUIDoneDate4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IUIDoneDate4->Sortable = true; // Allow sort
        $this->IUIDoneDate4->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->IUIDoneDate4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneDate4->Param, "CustomMsg");
        $this->Fields['IUIDoneDate4'] = &$this->IUIDoneDate4;

        // IUIDoneYesNo4
        $this->IUIDoneYesNo4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IUIDoneYesNo4', 'IUIDoneYesNo4', '`IUIDoneYesNo4`', '`IUIDoneYesNo4`', 200, 45, -1, false, '`IUIDoneYesNo4`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->IUIDoneYesNo4->Sortable = true; // Allow sort
        $this->IUIDoneYesNo4->Lookup = new Lookup('IUIDoneYesNo4', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IUIDoneYesNo4->OptionCount = 2;
        $this->IUIDoneYesNo4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IUIDoneYesNo4->Param, "CustomMsg");
        $this->Fields['IUIDoneYesNo4'] = &$this->IUIDoneYesNo4;

        // UPTTestDate4
        $this->UPTTestDate4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestDate4', 'UPTTestDate4', '`UPTTestDate4`', CastDateFieldForLike("`UPTTestDate4`", 7, "DB"), 135, 19, 7, false, '`UPTTestDate4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UPTTestDate4->Sortable = true; // Allow sort
        $this->UPTTestDate4->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->UPTTestDate4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestDate4->Param, "CustomMsg");
        $this->Fields['UPTTestDate4'] = &$this->UPTTestDate4;

        // UPTTestYesNo4
        $this->UPTTestYesNo4 = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_UPTTestYesNo4', 'UPTTestYesNo4', '`UPTTestYesNo4`', '`UPTTestYesNo4`', 200, 45, -1, false, '`UPTTestYesNo4`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->UPTTestYesNo4->Sortable = true; // Allow sort
        $this->UPTTestYesNo4->Lookup = new Lookup('UPTTestYesNo4', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->UPTTestYesNo4->OptionCount = 2;
        $this->UPTTestYesNo4->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->UPTTestYesNo4->Param, "CustomMsg");
        $this->Fields['UPTTestYesNo4'] = &$this->UPTTestYesNo4;

        // IVFStimulationDate
        $this->IVFStimulationDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IVFStimulationDate', 'IVFStimulationDate', '`IVFStimulationDate`', CastDateFieldForLike("`IVFStimulationDate`", 7, "DB"), 135, 19, 7, false, '`IVFStimulationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IVFStimulationDate->Sortable = true; // Allow sort
        $this->IVFStimulationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->IVFStimulationDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IVFStimulationDate->Param, "CustomMsg");
        $this->Fields['IVFStimulationDate'] = &$this->IVFStimulationDate;

        // IVFStimulationYesNo
        $this->IVFStimulationYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_IVFStimulationYesNo', 'IVFStimulationYesNo', '`IVFStimulationYesNo`', '`IVFStimulationYesNo`', 200, 45, -1, false, '`IVFStimulationYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->IVFStimulationYesNo->Sortable = true; // Allow sort
        $this->IVFStimulationYesNo->Lookup = new Lookup('IVFStimulationYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->IVFStimulationYesNo->OptionCount = 2;
        $this->IVFStimulationYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->IVFStimulationYesNo->Param, "CustomMsg");
        $this->Fields['IVFStimulationYesNo'] = &$this->IVFStimulationYesNo;

        // OPUDate
        $this->OPUDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_OPUDate', 'OPUDate', '`OPUDate`', CastDateFieldForLike("`OPUDate`", 7, "DB"), 135, 19, 7, false, '`OPUDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPUDate->Sortable = true; // Allow sort
        $this->OPUDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->OPUDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPUDate->Param, "CustomMsg");
        $this->Fields['OPUDate'] = &$this->OPUDate;

        // OPUYesNo
        $this->OPUYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_OPUYesNo', 'OPUYesNo', '`OPUYesNo`', '`OPUYesNo`', 200, 45, -1, false, '`OPUYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->OPUYesNo->Sortable = true; // Allow sort
        $this->OPUYesNo->Lookup = new Lookup('OPUYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->OPUYesNo->OptionCount = 2;
        $this->OPUYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPUYesNo->Param, "CustomMsg");
        $this->Fields['OPUYesNo'] = &$this->OPUYesNo;

        // ETDate
        $this->ETDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ETDate', 'ETDate', '`ETDate`', CastDateFieldForLike("`ETDate`", 7, "DB"), 135, 19, 7, false, '`ETDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDate->Sortable = true; // Allow sort
        $this->ETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->ETDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETDate->Param, "CustomMsg");
        $this->Fields['ETDate'] = &$this->ETDate;

        // ETYesNo
        $this->ETYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_ETYesNo', 'ETYesNo', '`ETYesNo`', '`ETYesNo`', 200, 45, -1, false, '`ETYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ETYesNo->Sortable = true; // Allow sort
        $this->ETYesNo->Lookup = new Lookup('ETYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ETYesNo->OptionCount = 2;
        $this->ETYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ETYesNo->Param, "CustomMsg");
        $this->Fields['ETYesNo'] = &$this->ETYesNo;

        // BetaHCGDate
        $this->BetaHCGDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_BetaHCGDate', 'BetaHCGDate', '`BetaHCGDate`', CastDateFieldForLike("`BetaHCGDate`", 7, "DB"), 135, 19, 7, false, '`BetaHCGDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BetaHCGDate->Sortable = true; // Allow sort
        $this->BetaHCGDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->BetaHCGDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BetaHCGDate->Param, "CustomMsg");
        $this->Fields['BetaHCGDate'] = &$this->BetaHCGDate;

        // BetaHCGYesNo
        $this->BetaHCGYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_BetaHCGYesNo', 'BetaHCGYesNo', '`BetaHCGYesNo`', '`BetaHCGYesNo`', 200, 45, -1, false, '`BetaHCGYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->BetaHCGYesNo->Sortable = true; // Allow sort
        $this->BetaHCGYesNo->Lookup = new Lookup('BetaHCGYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->BetaHCGYesNo->OptionCount = 2;
        $this->BetaHCGYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BetaHCGYesNo->Param, "CustomMsg");
        $this->Fields['BetaHCGYesNo'] = &$this->BetaHCGYesNo;

        // FETDate
        $this->FETDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FETDate', 'FETDate', '`FETDate`', CastDateFieldForLike("`FETDate`", 7, "DB"), 135, 19, 7, false, '`FETDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FETDate->Sortable = true; // Allow sort
        $this->FETDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->FETDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FETDate->Param, "CustomMsg");
        $this->Fields['FETDate'] = &$this->FETDate;

        // FETYesNo
        $this->FETYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FETYesNo', 'FETYesNo', '`FETYesNo`', '`FETYesNo`', 200, 45, -1, false, '`FETYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->FETYesNo->Sortable = true; // Allow sort
        $this->FETYesNo->Lookup = new Lookup('FETYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FETYesNo->OptionCount = 2;
        $this->FETYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FETYesNo->Param, "CustomMsg");
        $this->Fields['FETYesNo'] = &$this->FETYesNo;

        // FBetaHCGDate
        $this->FBetaHCGDate = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FBetaHCGDate', 'FBetaHCGDate', '`FBetaHCGDate`', CastDateFieldForLike("`FBetaHCGDate`", 7, "DB"), 135, 19, 7, false, '`FBetaHCGDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FBetaHCGDate->Sortable = true; // Allow sort
        $this->FBetaHCGDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->FBetaHCGDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBetaHCGDate->Param, "CustomMsg");
        $this->Fields['FBetaHCGDate'] = &$this->FBetaHCGDate;

        // FBetaHCGYesNo
        $this->FBetaHCGYesNo = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_FBetaHCGYesNo', 'FBetaHCGYesNo', '`FBetaHCGYesNo`', '`FBetaHCGYesNo`', 200, 45, -1, false, '`FBetaHCGYesNo`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->FBetaHCGYesNo->Sortable = true; // Allow sort
        $this->FBetaHCGYesNo->Lookup = new Lookup('FBetaHCGYesNo', 'monitor_treatment_plan', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->FBetaHCGYesNo->OptionCount = 2;
        $this->FBetaHCGYesNo->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FBetaHCGYesNo->Param, "CustomMsg");
        $this->Fields['FBetaHCGYesNo'] = &$this->FBetaHCGYesNo;

        // createdby
        $this->createdby = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 200, 45, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 200, 45, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // HospID
        $this->HospID = new DbField('monitor_treatment_plan', 'monitor_treatment_plan', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`monitor_treatment_plan`";
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
        $this->PatId->DbValue = $row['PatId'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->Age->DbValue = $row['Age'];
        $this->MobileNo->DbValue = $row['MobileNo'];
        $this->ConsultantName->DbValue = $row['ConsultantName'];
        $this->RefDrName->DbValue = $row['RefDrName'];
        $this->RefDrMobileNo->DbValue = $row['RefDrMobileNo'];
        $this->NewVisitDate->DbValue = $row['NewVisitDate'];
        $this->NewVisitYesNo->DbValue = $row['NewVisitYesNo'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->IUIDoneDate1->DbValue = $row['IUIDoneDate1'];
        $this->IUIDoneYesNo1->DbValue = $row['IUIDoneYesNo1'];
        $this->UPTTestDate1->DbValue = $row['UPTTestDate1'];
        $this->UPTTestYesNo1->DbValue = $row['UPTTestYesNo1'];
        $this->IUIDoneDate2->DbValue = $row['IUIDoneDate2'];
        $this->IUIDoneYesNo2->DbValue = $row['IUIDoneYesNo2'];
        $this->UPTTestDate2->DbValue = $row['UPTTestDate2'];
        $this->UPTTestYesNo2->DbValue = $row['UPTTestYesNo2'];
        $this->IUIDoneDate3->DbValue = $row['IUIDoneDate3'];
        $this->IUIDoneYesNo3->DbValue = $row['IUIDoneYesNo3'];
        $this->UPTTestDate3->DbValue = $row['UPTTestDate3'];
        $this->UPTTestYesNo3->DbValue = $row['UPTTestYesNo3'];
        $this->IUIDoneDate4->DbValue = $row['IUIDoneDate4'];
        $this->IUIDoneYesNo4->DbValue = $row['IUIDoneYesNo4'];
        $this->UPTTestDate4->DbValue = $row['UPTTestDate4'];
        $this->UPTTestYesNo4->DbValue = $row['UPTTestYesNo4'];
        $this->IVFStimulationDate->DbValue = $row['IVFStimulationDate'];
        $this->IVFStimulationYesNo->DbValue = $row['IVFStimulationYesNo'];
        $this->OPUDate->DbValue = $row['OPUDate'];
        $this->OPUYesNo->DbValue = $row['OPUYesNo'];
        $this->ETDate->DbValue = $row['ETDate'];
        $this->ETYesNo->DbValue = $row['ETYesNo'];
        $this->BetaHCGDate->DbValue = $row['BetaHCGDate'];
        $this->BetaHCGYesNo->DbValue = $row['BetaHCGYesNo'];
        $this->FETDate->DbValue = $row['FETDate'];
        $this->FETYesNo->DbValue = $row['FETYesNo'];
        $this->FBetaHCGDate->DbValue = $row['FBetaHCGDate'];
        $this->FBetaHCGYesNo->DbValue = $row['FBetaHCGYesNo'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->HospID->DbValue = $row['HospID'];
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
        return $_SESSION[$name] ?? GetUrl("MonitorTreatmentPlanList");
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
        if ($pageName == "MonitorTreatmentPlanView") {
            return $Language->phrase("View");
        } elseif ($pageName == "MonitorTreatmentPlanEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "MonitorTreatmentPlanAdd") {
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
                return "MonitorTreatmentPlanView";
            case Config("API_ADD_ACTION"):
                return "MonitorTreatmentPlanAdd";
            case Config("API_EDIT_ACTION"):
                return "MonitorTreatmentPlanEdit";
            case Config("API_DELETE_ACTION"):
                return "MonitorTreatmentPlanDelete";
            case Config("API_LIST_ACTION"):
                return "MonitorTreatmentPlanList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "MonitorTreatmentPlanList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("MonitorTreatmentPlanView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("MonitorTreatmentPlanView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "MonitorTreatmentPlanAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "MonitorTreatmentPlanAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("MonitorTreatmentPlanEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("MonitorTreatmentPlanAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("MonitorTreatmentPlanDelete", $this->getUrlParm());
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
        $this->PatId->setDbValue($row['PatId']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->MobileNo->setDbValue($row['MobileNo']);
        $this->ConsultantName->setDbValue($row['ConsultantName']);
        $this->RefDrName->setDbValue($row['RefDrName']);
        $this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
        $this->NewVisitDate->setDbValue($row['NewVisitDate']);
        $this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
        $this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
        $this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
        $this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
        $this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
        $this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
        $this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
        $this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
        $this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
        $this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
        $this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
        $this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
        $this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
        $this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
        $this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
        $this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
        $this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
        $this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
        $this->OPUDate->setDbValue($row['OPUDate']);
        $this->OPUYesNo->setDbValue($row['OPUYesNo']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->ETYesNo->setDbValue($row['ETYesNo']);
        $this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
        $this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
        $this->FETDate->setDbValue($row['FETDate']);
        $this->FETYesNo->setDbValue($row['FETYesNo']);
        $this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
        $this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatId

        // PatientId

        // PatientName

        // Age

        // MobileNo

        // ConsultantName

        // RefDrName

        // RefDrMobileNo

        // NewVisitDate

        // NewVisitYesNo

        // Treatment

        // IUIDoneDate1

        // IUIDoneYesNo1

        // UPTTestDate1

        // UPTTestYesNo1

        // IUIDoneDate2

        // IUIDoneYesNo2

        // UPTTestDate2

        // UPTTestYesNo2

        // IUIDoneDate3

        // IUIDoneYesNo3

        // UPTTestDate3

        // UPTTestYesNo3

        // IUIDoneDate4

        // IUIDoneYesNo4

        // UPTTestDate4

        // UPTTestYesNo4

        // IVFStimulationDate

        // IVFStimulationYesNo

        // OPUDate

        // OPUYesNo

        // ETDate

        // ETYesNo

        // BetaHCGDate

        // BetaHCGYesNo

        // FETDate

        // FETYesNo

        // FBetaHCGDate

        // FBetaHCGYesNo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatId
        $curVal = trim(strval($this->PatId->CurrentValue));
        if ($curVal != "") {
            $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
            if ($this->PatId->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                    $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                } else {
                    $this->PatId->ViewValue = $this->PatId->CurrentValue;
                }
            }
        } else {
            $this->PatId->ViewValue = null;
        }
        $this->PatId->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // MobileNo
        $this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
        $this->MobileNo->ViewCustomAttributes = "";

        // ConsultantName
        $this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
        $this->ConsultantName->ViewCustomAttributes = "";

        // RefDrName
        $this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
        $this->RefDrName->ViewCustomAttributes = "";

        // RefDrMobileNo
        $this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
        $this->RefDrMobileNo->ViewCustomAttributes = "";

        // NewVisitDate
        $this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
        $this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
        $this->NewVisitDate->ViewCustomAttributes = "";

        // NewVisitYesNo
        if (strval($this->NewVisitYesNo->CurrentValue) != "") {
            $this->NewVisitYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->NewVisitYesNo->ViewValue = null;
        }
        $this->NewVisitYesNo->ViewCustomAttributes = "";

        // Treatment
        if (strval($this->Treatment->CurrentValue) != "") {
            $this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
        } else {
            $this->Treatment->ViewValue = null;
        }
        $this->Treatment->ViewCustomAttributes = "";

        // IUIDoneDate1
        $this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
        $this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
        $this->IUIDoneDate1->ViewCustomAttributes = "";

        // IUIDoneYesNo1
        if (strval($this->IUIDoneYesNo1->CurrentValue) != "") {
            $this->IUIDoneYesNo1->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->IUIDoneYesNo1->ViewValue = null;
        }
        $this->IUIDoneYesNo1->ViewCustomAttributes = "";

        // UPTTestDate1
        $this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
        $this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
        $this->UPTTestDate1->ViewCustomAttributes = "";

        // UPTTestYesNo1
        if (strval($this->UPTTestYesNo1->CurrentValue) != "") {
            $this->UPTTestYesNo1->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->UPTTestYesNo1->ViewValue = null;
        }
        $this->UPTTestYesNo1->ViewCustomAttributes = "";

        // IUIDoneDate2
        $this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
        $this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
        $this->IUIDoneDate2->ViewCustomAttributes = "";

        // IUIDoneYesNo2
        if (strval($this->IUIDoneYesNo2->CurrentValue) != "") {
            $this->IUIDoneYesNo2->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->IUIDoneYesNo2->ViewValue = null;
        }
        $this->IUIDoneYesNo2->ViewCustomAttributes = "";

        // UPTTestDate2
        $this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
        $this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
        $this->UPTTestDate2->ViewCustomAttributes = "";

        // UPTTestYesNo2
        if (strval($this->UPTTestYesNo2->CurrentValue) != "") {
            $this->UPTTestYesNo2->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->UPTTestYesNo2->ViewValue = null;
        }
        $this->UPTTestYesNo2->ViewCustomAttributes = "";

        // IUIDoneDate3
        $this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
        $this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
        $this->IUIDoneDate3->ViewCustomAttributes = "";

        // IUIDoneYesNo3
        if (strval($this->IUIDoneYesNo3->CurrentValue) != "") {
            $this->IUIDoneYesNo3->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->IUIDoneYesNo3->ViewValue = null;
        }
        $this->IUIDoneYesNo3->ViewCustomAttributes = "";

        // UPTTestDate3
        $this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
        $this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
        $this->UPTTestDate3->ViewCustomAttributes = "";

        // UPTTestYesNo3
        if (strval($this->UPTTestYesNo3->CurrentValue) != "") {
            $this->UPTTestYesNo3->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->UPTTestYesNo3->ViewValue = null;
        }
        $this->UPTTestYesNo3->ViewCustomAttributes = "";

        // IUIDoneDate4
        $this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
        $this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
        $this->IUIDoneDate4->ViewCustomAttributes = "";

        // IUIDoneYesNo4
        if (strval($this->IUIDoneYesNo4->CurrentValue) != "") {
            $this->IUIDoneYesNo4->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->IUIDoneYesNo4->ViewValue = null;
        }
        $this->IUIDoneYesNo4->ViewCustomAttributes = "";

        // UPTTestDate4
        $this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
        $this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
        $this->UPTTestDate4->ViewCustomAttributes = "";

        // UPTTestYesNo4
        if (strval($this->UPTTestYesNo4->CurrentValue) != "") {
            $this->UPTTestYesNo4->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->UPTTestYesNo4->ViewValue = null;
        }
        $this->UPTTestYesNo4->ViewCustomAttributes = "";

        // IVFStimulationDate
        $this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
        $this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
        $this->IVFStimulationDate->ViewCustomAttributes = "";

        // IVFStimulationYesNo
        if (strval($this->IVFStimulationYesNo->CurrentValue) != "") {
            $this->IVFStimulationYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->IVFStimulationYesNo->ViewValue = null;
        }
        $this->IVFStimulationYesNo->ViewCustomAttributes = "";

        // OPUDate
        $this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
        $this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
        $this->OPUDate->ViewCustomAttributes = "";

        // OPUYesNo
        if (strval($this->OPUYesNo->CurrentValue) != "") {
            $this->OPUYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->OPUYesNo->ViewValue = null;
        }
        $this->OPUYesNo->ViewCustomAttributes = "";

        // ETDate
        $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
        $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
        $this->ETDate->ViewCustomAttributes = "";

        // ETYesNo
        if (strval($this->ETYesNo->CurrentValue) != "") {
            $this->ETYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->ETYesNo->ViewValue = null;
        }
        $this->ETYesNo->ViewCustomAttributes = "";

        // BetaHCGDate
        $this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
        $this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
        $this->BetaHCGDate->ViewCustomAttributes = "";

        // BetaHCGYesNo
        if (strval($this->BetaHCGYesNo->CurrentValue) != "") {
            $this->BetaHCGYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->BetaHCGYesNo->ViewValue = null;
        }
        $this->BetaHCGYesNo->ViewCustomAttributes = "";

        // FETDate
        $this->FETDate->ViewValue = $this->FETDate->CurrentValue;
        $this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
        $this->FETDate->ViewCustomAttributes = "";

        // FETYesNo
        if (strval($this->FETYesNo->CurrentValue) != "") {
            $this->FETYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->FETYesNo->ViewValue = null;
        }
        $this->FETYesNo->ViewCustomAttributes = "";

        // FBetaHCGDate
        $this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
        $this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
        $this->FBetaHCGDate->ViewCustomAttributes = "";

        // FBetaHCGYesNo
        if (strval($this->FBetaHCGYesNo->CurrentValue) != "") {
            $this->FBetaHCGYesNo->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->FBetaHCGYesNo->ViewValue = null;
        }
        $this->FBetaHCGYesNo->ViewCustomAttributes = "";

        // createdby
        $this->createdby->ViewValue = $this->createdby->CurrentValue;
        $this->createdby->ViewCustomAttributes = "";

        // createddatetime
        $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
        $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
        $this->createddatetime->ViewCustomAttributes = "";

        // modifiedby
        $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
        $this->modifiedby->ViewCustomAttributes = "";

        // modifieddatetime
        $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
        $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
        $this->modifieddatetime->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatId
        $this->PatId->LinkCustomAttributes = "";
        $this->PatId->HrefValue = "";
        $this->PatId->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // MobileNo
        $this->MobileNo->LinkCustomAttributes = "";
        $this->MobileNo->HrefValue = "";
        $this->MobileNo->TooltipValue = "";

        // ConsultantName
        $this->ConsultantName->LinkCustomAttributes = "";
        $this->ConsultantName->HrefValue = "";
        $this->ConsultantName->TooltipValue = "";

        // RefDrName
        $this->RefDrName->LinkCustomAttributes = "";
        $this->RefDrName->HrefValue = "";
        $this->RefDrName->TooltipValue = "";

        // RefDrMobileNo
        $this->RefDrMobileNo->LinkCustomAttributes = "";
        $this->RefDrMobileNo->HrefValue = "";
        $this->RefDrMobileNo->TooltipValue = "";

        // NewVisitDate
        $this->NewVisitDate->LinkCustomAttributes = "";
        $this->NewVisitDate->HrefValue = "";
        $this->NewVisitDate->TooltipValue = "";

        // NewVisitYesNo
        $this->NewVisitYesNo->LinkCustomAttributes = "";
        $this->NewVisitYesNo->HrefValue = "";
        $this->NewVisitYesNo->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // IUIDoneDate1
        $this->IUIDoneDate1->LinkCustomAttributes = "";
        $this->IUIDoneDate1->HrefValue = "";
        $this->IUIDoneDate1->TooltipValue = "";

        // IUIDoneYesNo1
        $this->IUIDoneYesNo1->LinkCustomAttributes = "";
        $this->IUIDoneYesNo1->HrefValue = "";
        $this->IUIDoneYesNo1->TooltipValue = "";

        // UPTTestDate1
        $this->UPTTestDate1->LinkCustomAttributes = "";
        $this->UPTTestDate1->HrefValue = "";
        $this->UPTTestDate1->TooltipValue = "";

        // UPTTestYesNo1
        $this->UPTTestYesNo1->LinkCustomAttributes = "";
        $this->UPTTestYesNo1->HrefValue = "";
        $this->UPTTestYesNo1->TooltipValue = "";

        // IUIDoneDate2
        $this->IUIDoneDate2->LinkCustomAttributes = "";
        $this->IUIDoneDate2->HrefValue = "";
        $this->IUIDoneDate2->TooltipValue = "";

        // IUIDoneYesNo2
        $this->IUIDoneYesNo2->LinkCustomAttributes = "";
        $this->IUIDoneYesNo2->HrefValue = "";
        $this->IUIDoneYesNo2->TooltipValue = "";

        // UPTTestDate2
        $this->UPTTestDate2->LinkCustomAttributes = "";
        $this->UPTTestDate2->HrefValue = "";
        $this->UPTTestDate2->TooltipValue = "";

        // UPTTestYesNo2
        $this->UPTTestYesNo2->LinkCustomAttributes = "";
        $this->UPTTestYesNo2->HrefValue = "";
        $this->UPTTestYesNo2->TooltipValue = "";

        // IUIDoneDate3
        $this->IUIDoneDate3->LinkCustomAttributes = "";
        $this->IUIDoneDate3->HrefValue = "";
        $this->IUIDoneDate3->TooltipValue = "";

        // IUIDoneYesNo3
        $this->IUIDoneYesNo3->LinkCustomAttributes = "";
        $this->IUIDoneYesNo3->HrefValue = "";
        $this->IUIDoneYesNo3->TooltipValue = "";

        // UPTTestDate3
        $this->UPTTestDate3->LinkCustomAttributes = "";
        $this->UPTTestDate3->HrefValue = "";
        $this->UPTTestDate3->TooltipValue = "";

        // UPTTestYesNo3
        $this->UPTTestYesNo3->LinkCustomAttributes = "";
        $this->UPTTestYesNo3->HrefValue = "";
        $this->UPTTestYesNo3->TooltipValue = "";

        // IUIDoneDate4
        $this->IUIDoneDate4->LinkCustomAttributes = "";
        $this->IUIDoneDate4->HrefValue = "";
        $this->IUIDoneDate4->TooltipValue = "";

        // IUIDoneYesNo4
        $this->IUIDoneYesNo4->LinkCustomAttributes = "";
        $this->IUIDoneYesNo4->HrefValue = "";
        $this->IUIDoneYesNo4->TooltipValue = "";

        // UPTTestDate4
        $this->UPTTestDate4->LinkCustomAttributes = "";
        $this->UPTTestDate4->HrefValue = "";
        $this->UPTTestDate4->TooltipValue = "";

        // UPTTestYesNo4
        $this->UPTTestYesNo4->LinkCustomAttributes = "";
        $this->UPTTestYesNo4->HrefValue = "";
        $this->UPTTestYesNo4->TooltipValue = "";

        // IVFStimulationDate
        $this->IVFStimulationDate->LinkCustomAttributes = "";
        $this->IVFStimulationDate->HrefValue = "";
        $this->IVFStimulationDate->TooltipValue = "";

        // IVFStimulationYesNo
        $this->IVFStimulationYesNo->LinkCustomAttributes = "";
        $this->IVFStimulationYesNo->HrefValue = "";
        $this->IVFStimulationYesNo->TooltipValue = "";

        // OPUDate
        $this->OPUDate->LinkCustomAttributes = "";
        $this->OPUDate->HrefValue = "";
        $this->OPUDate->TooltipValue = "";

        // OPUYesNo
        $this->OPUYesNo->LinkCustomAttributes = "";
        $this->OPUYesNo->HrefValue = "";
        $this->OPUYesNo->TooltipValue = "";

        // ETDate
        $this->ETDate->LinkCustomAttributes = "";
        $this->ETDate->HrefValue = "";
        $this->ETDate->TooltipValue = "";

        // ETYesNo
        $this->ETYesNo->LinkCustomAttributes = "";
        $this->ETYesNo->HrefValue = "";
        $this->ETYesNo->TooltipValue = "";

        // BetaHCGDate
        $this->BetaHCGDate->LinkCustomAttributes = "";
        $this->BetaHCGDate->HrefValue = "";
        $this->BetaHCGDate->TooltipValue = "";

        // BetaHCGYesNo
        $this->BetaHCGYesNo->LinkCustomAttributes = "";
        $this->BetaHCGYesNo->HrefValue = "";
        $this->BetaHCGYesNo->TooltipValue = "";

        // FETDate
        $this->FETDate->LinkCustomAttributes = "";
        $this->FETDate->HrefValue = "";
        $this->FETDate->TooltipValue = "";

        // FETYesNo
        $this->FETYesNo->LinkCustomAttributes = "";
        $this->FETYesNo->HrefValue = "";
        $this->FETYesNo->TooltipValue = "";

        // FBetaHCGDate
        $this->FBetaHCGDate->LinkCustomAttributes = "";
        $this->FBetaHCGDate->HrefValue = "";
        $this->FBetaHCGDate->TooltipValue = "";

        // FBetaHCGYesNo
        $this->FBetaHCGYesNo->LinkCustomAttributes = "";
        $this->FBetaHCGYesNo->HrefValue = "";
        $this->FBetaHCGYesNo->TooltipValue = "";

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

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

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

        // PatId
        $this->PatId->EditAttrs["class"] = "form-control";
        $this->PatId->EditCustomAttributes = "";
        $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        if (!$this->PatientId->Raw) {
            $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
        }
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // MobileNo
        $this->MobileNo->EditAttrs["class"] = "form-control";
        $this->MobileNo->EditCustomAttributes = "";
        if (!$this->MobileNo->Raw) {
            $this->MobileNo->CurrentValue = HtmlDecode($this->MobileNo->CurrentValue);
        }
        $this->MobileNo->EditValue = $this->MobileNo->CurrentValue;
        $this->MobileNo->PlaceHolder = RemoveHtml($this->MobileNo->caption());

        // ConsultantName
        $this->ConsultantName->EditAttrs["class"] = "form-control";
        $this->ConsultantName->EditCustomAttributes = "";
        if (!$this->ConsultantName->Raw) {
            $this->ConsultantName->CurrentValue = HtmlDecode($this->ConsultantName->CurrentValue);
        }
        $this->ConsultantName->EditValue = $this->ConsultantName->CurrentValue;
        $this->ConsultantName->PlaceHolder = RemoveHtml($this->ConsultantName->caption());

        // RefDrName
        $this->RefDrName->EditAttrs["class"] = "form-control";
        $this->RefDrName->EditCustomAttributes = "";
        if (!$this->RefDrName->Raw) {
            $this->RefDrName->CurrentValue = HtmlDecode($this->RefDrName->CurrentValue);
        }
        $this->RefDrName->EditValue = $this->RefDrName->CurrentValue;
        $this->RefDrName->PlaceHolder = RemoveHtml($this->RefDrName->caption());

        // RefDrMobileNo
        $this->RefDrMobileNo->EditAttrs["class"] = "form-control";
        $this->RefDrMobileNo->EditCustomAttributes = "";
        if (!$this->RefDrMobileNo->Raw) {
            $this->RefDrMobileNo->CurrentValue = HtmlDecode($this->RefDrMobileNo->CurrentValue);
        }
        $this->RefDrMobileNo->EditValue = $this->RefDrMobileNo->CurrentValue;
        $this->RefDrMobileNo->PlaceHolder = RemoveHtml($this->RefDrMobileNo->caption());

        // NewVisitDate
        $this->NewVisitDate->EditAttrs["class"] = "form-control";
        $this->NewVisitDate->EditCustomAttributes = "";
        $this->NewVisitDate->EditValue = FormatDateTime($this->NewVisitDate->CurrentValue, 7);
        $this->NewVisitDate->PlaceHolder = RemoveHtml($this->NewVisitDate->caption());

        // NewVisitYesNo
        $this->NewVisitYesNo->EditCustomAttributes = "";
        $this->NewVisitYesNo->EditValue = $this->NewVisitYesNo->options(false);
        $this->NewVisitYesNo->PlaceHolder = RemoveHtml($this->NewVisitYesNo->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        $this->Treatment->EditValue = $this->Treatment->options(true);
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // IUIDoneDate1
        $this->IUIDoneDate1->EditAttrs["class"] = "form-control";
        $this->IUIDoneDate1->EditCustomAttributes = "";
        $this->IUIDoneDate1->EditValue = FormatDateTime($this->IUIDoneDate1->CurrentValue, 7);
        $this->IUIDoneDate1->PlaceHolder = RemoveHtml($this->IUIDoneDate1->caption());

        // IUIDoneYesNo1
        $this->IUIDoneYesNo1->EditCustomAttributes = "";
        $this->IUIDoneYesNo1->EditValue = $this->IUIDoneYesNo1->options(false);
        $this->IUIDoneYesNo1->PlaceHolder = RemoveHtml($this->IUIDoneYesNo1->caption());

        // UPTTestDate1
        $this->UPTTestDate1->EditAttrs["class"] = "form-control";
        $this->UPTTestDate1->EditCustomAttributes = "";
        $this->UPTTestDate1->EditValue = FormatDateTime($this->UPTTestDate1->CurrentValue, 7);
        $this->UPTTestDate1->PlaceHolder = RemoveHtml($this->UPTTestDate1->caption());

        // UPTTestYesNo1
        $this->UPTTestYesNo1->EditCustomAttributes = "";
        $this->UPTTestYesNo1->EditValue = $this->UPTTestYesNo1->options(false);
        $this->UPTTestYesNo1->PlaceHolder = RemoveHtml($this->UPTTestYesNo1->caption());

        // IUIDoneDate2
        $this->IUIDoneDate2->EditAttrs["class"] = "form-control";
        $this->IUIDoneDate2->EditCustomAttributes = "";
        $this->IUIDoneDate2->EditValue = FormatDateTime($this->IUIDoneDate2->CurrentValue, 7);
        $this->IUIDoneDate2->PlaceHolder = RemoveHtml($this->IUIDoneDate2->caption());

        // IUIDoneYesNo2
        $this->IUIDoneYesNo2->EditCustomAttributes = "";
        $this->IUIDoneYesNo2->EditValue = $this->IUIDoneYesNo2->options(false);
        $this->IUIDoneYesNo2->PlaceHolder = RemoveHtml($this->IUIDoneYesNo2->caption());

        // UPTTestDate2
        $this->UPTTestDate2->EditAttrs["class"] = "form-control";
        $this->UPTTestDate2->EditCustomAttributes = "";
        $this->UPTTestDate2->EditValue = FormatDateTime($this->UPTTestDate2->CurrentValue, 7);
        $this->UPTTestDate2->PlaceHolder = RemoveHtml($this->UPTTestDate2->caption());

        // UPTTestYesNo2
        $this->UPTTestYesNo2->EditCustomAttributes = "";
        $this->UPTTestYesNo2->EditValue = $this->UPTTestYesNo2->options(false);
        $this->UPTTestYesNo2->PlaceHolder = RemoveHtml($this->UPTTestYesNo2->caption());

        // IUIDoneDate3
        $this->IUIDoneDate3->EditAttrs["class"] = "form-control";
        $this->IUIDoneDate3->EditCustomAttributes = "";
        $this->IUIDoneDate3->EditValue = FormatDateTime($this->IUIDoneDate3->CurrentValue, 7);
        $this->IUIDoneDate3->PlaceHolder = RemoveHtml($this->IUIDoneDate3->caption());

        // IUIDoneYesNo3
        $this->IUIDoneYesNo3->EditCustomAttributes = "";
        $this->IUIDoneYesNo3->EditValue = $this->IUIDoneYesNo3->options(false);
        $this->IUIDoneYesNo3->PlaceHolder = RemoveHtml($this->IUIDoneYesNo3->caption());

        // UPTTestDate3
        $this->UPTTestDate3->EditAttrs["class"] = "form-control";
        $this->UPTTestDate3->EditCustomAttributes = "";
        $this->UPTTestDate3->EditValue = FormatDateTime($this->UPTTestDate3->CurrentValue, 7);
        $this->UPTTestDate3->PlaceHolder = RemoveHtml($this->UPTTestDate3->caption());

        // UPTTestYesNo3
        $this->UPTTestYesNo3->EditCustomAttributes = "";
        $this->UPTTestYesNo3->EditValue = $this->UPTTestYesNo3->options(false);
        $this->UPTTestYesNo3->PlaceHolder = RemoveHtml($this->UPTTestYesNo3->caption());

        // IUIDoneDate4
        $this->IUIDoneDate4->EditAttrs["class"] = "form-control";
        $this->IUIDoneDate4->EditCustomAttributes = "";
        $this->IUIDoneDate4->EditValue = FormatDateTime($this->IUIDoneDate4->CurrentValue, 7);
        $this->IUIDoneDate4->PlaceHolder = RemoveHtml($this->IUIDoneDate4->caption());

        // IUIDoneYesNo4
        $this->IUIDoneYesNo4->EditCustomAttributes = "";
        $this->IUIDoneYesNo4->EditValue = $this->IUIDoneYesNo4->options(false);
        $this->IUIDoneYesNo4->PlaceHolder = RemoveHtml($this->IUIDoneYesNo4->caption());

        // UPTTestDate4
        $this->UPTTestDate4->EditAttrs["class"] = "form-control";
        $this->UPTTestDate4->EditCustomAttributes = "";
        $this->UPTTestDate4->EditValue = FormatDateTime($this->UPTTestDate4->CurrentValue, 7);
        $this->UPTTestDate4->PlaceHolder = RemoveHtml($this->UPTTestDate4->caption());

        // UPTTestYesNo4
        $this->UPTTestYesNo4->EditCustomAttributes = "";
        $this->UPTTestYesNo4->EditValue = $this->UPTTestYesNo4->options(false);
        $this->UPTTestYesNo4->PlaceHolder = RemoveHtml($this->UPTTestYesNo4->caption());

        // IVFStimulationDate
        $this->IVFStimulationDate->EditAttrs["class"] = "form-control";
        $this->IVFStimulationDate->EditCustomAttributes = "";
        $this->IVFStimulationDate->EditValue = FormatDateTime($this->IVFStimulationDate->CurrentValue, 7);
        $this->IVFStimulationDate->PlaceHolder = RemoveHtml($this->IVFStimulationDate->caption());

        // IVFStimulationYesNo
        $this->IVFStimulationYesNo->EditCustomAttributes = "";
        $this->IVFStimulationYesNo->EditValue = $this->IVFStimulationYesNo->options(false);
        $this->IVFStimulationYesNo->PlaceHolder = RemoveHtml($this->IVFStimulationYesNo->caption());

        // OPUDate
        $this->OPUDate->EditAttrs["class"] = "form-control";
        $this->OPUDate->EditCustomAttributes = "";
        $this->OPUDate->EditValue = FormatDateTime($this->OPUDate->CurrentValue, 7);
        $this->OPUDate->PlaceHolder = RemoveHtml($this->OPUDate->caption());

        // OPUYesNo
        $this->OPUYesNo->EditCustomAttributes = "";
        $this->OPUYesNo->EditValue = $this->OPUYesNo->options(false);
        $this->OPUYesNo->PlaceHolder = RemoveHtml($this->OPUYesNo->caption());

        // ETDate
        $this->ETDate->EditAttrs["class"] = "form-control";
        $this->ETDate->EditCustomAttributes = "";
        $this->ETDate->EditValue = FormatDateTime($this->ETDate->CurrentValue, 7);
        $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

        // ETYesNo
        $this->ETYesNo->EditCustomAttributes = "";
        $this->ETYesNo->EditValue = $this->ETYesNo->options(false);
        $this->ETYesNo->PlaceHolder = RemoveHtml($this->ETYesNo->caption());

        // BetaHCGDate
        $this->BetaHCGDate->EditAttrs["class"] = "form-control";
        $this->BetaHCGDate->EditCustomAttributes = "";
        $this->BetaHCGDate->EditValue = FormatDateTime($this->BetaHCGDate->CurrentValue, 7);
        $this->BetaHCGDate->PlaceHolder = RemoveHtml($this->BetaHCGDate->caption());

        // BetaHCGYesNo
        $this->BetaHCGYesNo->EditCustomAttributes = "";
        $this->BetaHCGYesNo->EditValue = $this->BetaHCGYesNo->options(false);
        $this->BetaHCGYesNo->PlaceHolder = RemoveHtml($this->BetaHCGYesNo->caption());

        // FETDate
        $this->FETDate->EditAttrs["class"] = "form-control";
        $this->FETDate->EditCustomAttributes = "";
        $this->FETDate->EditValue = FormatDateTime($this->FETDate->CurrentValue, 7);
        $this->FETDate->PlaceHolder = RemoveHtml($this->FETDate->caption());

        // FETYesNo
        $this->FETYesNo->EditCustomAttributes = "";
        $this->FETYesNo->EditValue = $this->FETYesNo->options(false);
        $this->FETYesNo->PlaceHolder = RemoveHtml($this->FETYesNo->caption());

        // FBetaHCGDate
        $this->FBetaHCGDate->EditAttrs["class"] = "form-control";
        $this->FBetaHCGDate->EditCustomAttributes = "";
        $this->FBetaHCGDate->EditValue = FormatDateTime($this->FBetaHCGDate->CurrentValue, 7);
        $this->FBetaHCGDate->PlaceHolder = RemoveHtml($this->FBetaHCGDate->caption());

        // FBetaHCGYesNo
        $this->FBetaHCGYesNo->EditCustomAttributes = "";
        $this->FBetaHCGYesNo->EditValue = $this->FBetaHCGYesNo->options(false);
        $this->FBetaHCGYesNo->PlaceHolder = RemoveHtml($this->FBetaHCGYesNo->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

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
                    $doc->exportCaption($this->PatId);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->MobileNo);
                    $doc->exportCaption($this->ConsultantName);
                    $doc->exportCaption($this->RefDrName);
                    $doc->exportCaption($this->RefDrMobileNo);
                    $doc->exportCaption($this->NewVisitDate);
                    $doc->exportCaption($this->NewVisitYesNo);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->IUIDoneDate1);
                    $doc->exportCaption($this->IUIDoneYesNo1);
                    $doc->exportCaption($this->UPTTestDate1);
                    $doc->exportCaption($this->UPTTestYesNo1);
                    $doc->exportCaption($this->IUIDoneDate2);
                    $doc->exportCaption($this->IUIDoneYesNo2);
                    $doc->exportCaption($this->UPTTestDate2);
                    $doc->exportCaption($this->UPTTestYesNo2);
                    $doc->exportCaption($this->IUIDoneDate3);
                    $doc->exportCaption($this->IUIDoneYesNo3);
                    $doc->exportCaption($this->UPTTestDate3);
                    $doc->exportCaption($this->UPTTestYesNo3);
                    $doc->exportCaption($this->IUIDoneDate4);
                    $doc->exportCaption($this->IUIDoneYesNo4);
                    $doc->exportCaption($this->UPTTestDate4);
                    $doc->exportCaption($this->UPTTestYesNo4);
                    $doc->exportCaption($this->IVFStimulationDate);
                    $doc->exportCaption($this->IVFStimulationYesNo);
                    $doc->exportCaption($this->OPUDate);
                    $doc->exportCaption($this->OPUYesNo);
                    $doc->exportCaption($this->ETDate);
                    $doc->exportCaption($this->ETYesNo);
                    $doc->exportCaption($this->BetaHCGDate);
                    $doc->exportCaption($this->BetaHCGYesNo);
                    $doc->exportCaption($this->FETDate);
                    $doc->exportCaption($this->FETYesNo);
                    $doc->exportCaption($this->FBetaHCGDate);
                    $doc->exportCaption($this->FBetaHCGYesNo);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatId);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->MobileNo);
                    $doc->exportCaption($this->ConsultantName);
                    $doc->exportCaption($this->RefDrName);
                    $doc->exportCaption($this->RefDrMobileNo);
                    $doc->exportCaption($this->NewVisitDate);
                    $doc->exportCaption($this->NewVisitYesNo);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->IUIDoneDate1);
                    $doc->exportCaption($this->IUIDoneYesNo1);
                    $doc->exportCaption($this->UPTTestDate1);
                    $doc->exportCaption($this->UPTTestYesNo1);
                    $doc->exportCaption($this->IUIDoneDate2);
                    $doc->exportCaption($this->IUIDoneYesNo2);
                    $doc->exportCaption($this->UPTTestDate2);
                    $doc->exportCaption($this->UPTTestYesNo2);
                    $doc->exportCaption($this->IUIDoneDate3);
                    $doc->exportCaption($this->IUIDoneYesNo3);
                    $doc->exportCaption($this->UPTTestDate3);
                    $doc->exportCaption($this->UPTTestYesNo3);
                    $doc->exportCaption($this->IUIDoneDate4);
                    $doc->exportCaption($this->IUIDoneYesNo4);
                    $doc->exportCaption($this->UPTTestDate4);
                    $doc->exportCaption($this->UPTTestYesNo4);
                    $doc->exportCaption($this->IVFStimulationDate);
                    $doc->exportCaption($this->IVFStimulationYesNo);
                    $doc->exportCaption($this->OPUDate);
                    $doc->exportCaption($this->OPUYesNo);
                    $doc->exportCaption($this->ETDate);
                    $doc->exportCaption($this->ETYesNo);
                    $doc->exportCaption($this->BetaHCGDate);
                    $doc->exportCaption($this->BetaHCGYesNo);
                    $doc->exportCaption($this->FETDate);
                    $doc->exportCaption($this->FETYesNo);
                    $doc->exportCaption($this->FBetaHCGDate);
                    $doc->exportCaption($this->FBetaHCGYesNo);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->HospID);
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
                        $doc->exportField($this->PatId);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->MobileNo);
                        $doc->exportField($this->ConsultantName);
                        $doc->exportField($this->RefDrName);
                        $doc->exportField($this->RefDrMobileNo);
                        $doc->exportField($this->NewVisitDate);
                        $doc->exportField($this->NewVisitYesNo);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->IUIDoneDate1);
                        $doc->exportField($this->IUIDoneYesNo1);
                        $doc->exportField($this->UPTTestDate1);
                        $doc->exportField($this->UPTTestYesNo1);
                        $doc->exportField($this->IUIDoneDate2);
                        $doc->exportField($this->IUIDoneYesNo2);
                        $doc->exportField($this->UPTTestDate2);
                        $doc->exportField($this->UPTTestYesNo2);
                        $doc->exportField($this->IUIDoneDate3);
                        $doc->exportField($this->IUIDoneYesNo3);
                        $doc->exportField($this->UPTTestDate3);
                        $doc->exportField($this->UPTTestYesNo3);
                        $doc->exportField($this->IUIDoneDate4);
                        $doc->exportField($this->IUIDoneYesNo4);
                        $doc->exportField($this->UPTTestDate4);
                        $doc->exportField($this->UPTTestYesNo4);
                        $doc->exportField($this->IVFStimulationDate);
                        $doc->exportField($this->IVFStimulationYesNo);
                        $doc->exportField($this->OPUDate);
                        $doc->exportField($this->OPUYesNo);
                        $doc->exportField($this->ETDate);
                        $doc->exportField($this->ETYesNo);
                        $doc->exportField($this->BetaHCGDate);
                        $doc->exportField($this->BetaHCGYesNo);
                        $doc->exportField($this->FETDate);
                        $doc->exportField($this->FETYesNo);
                        $doc->exportField($this->FBetaHCGDate);
                        $doc->exportField($this->FBetaHCGYesNo);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatId);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->MobileNo);
                        $doc->exportField($this->ConsultantName);
                        $doc->exportField($this->RefDrName);
                        $doc->exportField($this->RefDrMobileNo);
                        $doc->exportField($this->NewVisitDate);
                        $doc->exportField($this->NewVisitYesNo);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->IUIDoneDate1);
                        $doc->exportField($this->IUIDoneYesNo1);
                        $doc->exportField($this->UPTTestDate1);
                        $doc->exportField($this->UPTTestYesNo1);
                        $doc->exportField($this->IUIDoneDate2);
                        $doc->exportField($this->IUIDoneYesNo2);
                        $doc->exportField($this->UPTTestDate2);
                        $doc->exportField($this->UPTTestYesNo2);
                        $doc->exportField($this->IUIDoneDate3);
                        $doc->exportField($this->IUIDoneYesNo3);
                        $doc->exportField($this->UPTTestDate3);
                        $doc->exportField($this->UPTTestYesNo3);
                        $doc->exportField($this->IUIDoneDate4);
                        $doc->exportField($this->IUIDoneYesNo4);
                        $doc->exportField($this->UPTTestDate4);
                        $doc->exportField($this->UPTTestYesNo4);
                        $doc->exportField($this->IVFStimulationDate);
                        $doc->exportField($this->IVFStimulationYesNo);
                        $doc->exportField($this->OPUDate);
                        $doc->exportField($this->OPUYesNo);
                        $doc->exportField($this->ETDate);
                        $doc->exportField($this->ETYesNo);
                        $doc->exportField($this->BetaHCGDate);
                        $doc->exportField($this->BetaHCGYesNo);
                        $doc->exportField($this->FETDate);
                        $doc->exportField($this->FETYesNo);
                        $doc->exportField($this->FBetaHCGDate);
                        $doc->exportField($this->FBetaHCGYesNo);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->HospID);
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
