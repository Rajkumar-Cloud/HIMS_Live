<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_opd_follow_up
 */
class PatientOpdFollowUp extends DbTable
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
    public $Reception;
    public $PatID;
    public $PatientId;
    public $PatientName;
    public $MobileNumber;
    public $Telephone;
    public $mrnno;
    public $Age;
    public $Gender;
    public $profilePic;
    public $procedurenotes;
    public $NextReviewDate;
    public $ICSIAdvised;
    public $DeliveryRegistered;
    public $EDD;
    public $SerologyPositive;
    public $Allergy;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $LMP;
    public $Procedure;
    public $ProcedureDateTime;
    public $ICSIDate;
    public $PatientSearch;
    public $HospID;
    public $createdUserName;
    public $TemplateDrNotes;
    public $reportheader;
    public $Purpose;
    public $DrName;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_opd_follow_up';
        $this->TableName = 'patient_opd_follow_up';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_opd_follow_up`";
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
        $this->id = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // Reception
        $this->Reception = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatID
        $this->PatID = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Nullable = false; // NOT NULL field
        $this->PatID->Required = true; // Required field
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientId
        $this->PatientId = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 3, 11, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Nullable = false; // NOT NULL field
        $this->PatientId->Required = true; // Required field
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientName
        $this->PatientName = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Nullable = false; // NOT NULL field
        $this->PatientName->Required = true; // Required field
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Nullable = false; // NOT NULL field
        $this->MobileNumber->Required = true; // Required field
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // Telephone
        $this->Telephone = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Telephone', 'Telephone', '`Telephone`', '`Telephone`', 200, 45, -1, false, '`Telephone`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Telephone->Sortable = true; // Allow sort
        $this->Telephone->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Telephone->Param, "CustomMsg");
        $this->Fields['Telephone'] = &$this->Telephone;

        // mrnno
        $this->mrnno = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // Age
        $this->Age = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Nullable = false; // NOT NULL field
        $this->Gender->Required = true; // Required field
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // procedurenotes
        $this->procedurenotes = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, false, '`procedurenotes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->procedurenotes->Required = true; // Required field
        $this->procedurenotes->Sortable = true; // Allow sort
        $this->procedurenotes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->procedurenotes->Param, "CustomMsg");
        $this->Fields['procedurenotes'] = &$this->procedurenotes;

        // NextReviewDate
        $this->NextReviewDate = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike("`NextReviewDate`", 7, "DB"), 135, 19, 7, false, '`NextReviewDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NextReviewDate->Sortable = true; // Allow sort
        $this->NextReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->NextReviewDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NextReviewDate->Param, "CustomMsg");
        $this->Fields['NextReviewDate'] = &$this->NextReviewDate;

        // ICSIAdvised
        $this->ICSIAdvised = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_ICSIAdvised', 'ICSIAdvised', '`ICSIAdvised`', '`ICSIAdvised`', 200, 45, -1, false, '`ICSIAdvised`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->ICSIAdvised->Sortable = true; // Allow sort
        $this->ICSIAdvised->Lookup = new Lookup('ICSIAdvised', 'patient_opd_follow_up', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->ICSIAdvised->OptionCount = 6;
        $this->ICSIAdvised->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ICSIAdvised->Param, "CustomMsg");
        $this->Fields['ICSIAdvised'] = &$this->ICSIAdvised;

        // DeliveryRegistered
        $this->DeliveryRegistered = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_DeliveryRegistered', 'DeliveryRegistered', '`DeliveryRegistered`', '`DeliveryRegistered`', 200, 45, -1, false, '`DeliveryRegistered`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->DeliveryRegistered->Sortable = true; // Allow sort
        $this->DeliveryRegistered->Lookup = new Lookup('DeliveryRegistered', 'patient_opd_follow_up', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->DeliveryRegistered->OptionCount = 1;
        $this->DeliveryRegistered->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DeliveryRegistered->Param, "CustomMsg");
        $this->Fields['DeliveryRegistered'] = &$this->DeliveryRegistered;

        // EDD
        $this->EDD = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_EDD', 'EDD', '`EDD`', CastDateFieldForLike("`EDD`", 7, "DB"), 135, 19, 7, false, '`EDD`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EDD->Sortable = true; // Allow sort
        $this->EDD->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->EDD->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EDD->Param, "CustomMsg");
        $this->Fields['EDD'] = &$this->EDD;

        // SerologyPositive
        $this->SerologyPositive = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_SerologyPositive', 'SerologyPositive', '`SerologyPositive`', '`SerologyPositive`', 200, 45, -1, false, '`SerologyPositive`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->SerologyPositive->Sortable = true; // Allow sort
        $this->SerologyPositive->Lookup = new Lookup('SerologyPositive', 'patient_opd_follow_up', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->SerologyPositive->OptionCount = 1;
        $this->SerologyPositive->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SerologyPositive->Param, "CustomMsg");
        $this->Fields['SerologyPositive'] = &$this->SerologyPositive;

        // Allergy
        $this->Allergy = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Allergy', 'Allergy', '`Allergy`', '`Allergy`', 200, 45, -1, false, '`Allergy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Allergy->Sortable = true; // Allow sort
        $this->Allergy->Lookup = new Lookup('Allergy', 'pres_mas_generic', false, 'Generic', ["Generic","","",""], [], [], [], [], [], [], '', '');
        $this->Allergy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Allergy->Param, "CustomMsg");
        $this->Fields['Allergy'] = &$this->Allergy;

        // status
        $this->status = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->status->Nullable = false; // NOT NULL field
        $this->status->Required = true; // Required field
        $this->status->Sortable = true; // Allow sort
        $this->status->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->status->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->status->Lookup = new Lookup('status', 'sys_status', false, 'id', ["Name","","",""], [], [], [], [], [], [], '', '');
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->createdby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdby->Param, "CustomMsg");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createddatetime->Param, "CustomMsg");
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->modifiedby->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifiedby->Param, "CustomMsg");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->modifieddatetime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->modifieddatetime->Param, "CustomMsg");
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // LMP
        $this->LMP = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_LMP', 'LMP', '`LMP`', CastDateFieldForLike("`LMP`", 7, "DB"), 135, 19, 7, false, '`LMP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LMP->Sortable = true; // Allow sort
        $this->LMP->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->LMP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMP->Param, "CustomMsg");
        $this->Fields['LMP'] = &$this->LMP;

        // Procedure
        $this->Procedure = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Procedure', 'Procedure', '`Procedure`', '`Procedure`', 201, 450, -1, false, '`Procedure`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Procedure->Sortable = true; // Allow sort
        $this->Procedure->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Procedure->Param, "CustomMsg");
        $this->Fields['Procedure'] = &$this->Procedure;

        // ProcedureDateTime
        $this->ProcedureDateTime = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_ProcedureDateTime', 'ProcedureDateTime', '`ProcedureDateTime`', CastDateFieldForLike("`ProcedureDateTime`", 11, "DB"), 135, 19, 11, false, '`ProcedureDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProcedureDateTime->Sortable = true; // Allow sort
        $this->ProcedureDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ProcedureDateTime->Param, "CustomMsg");
        $this->Fields['ProcedureDateTime'] = &$this->ProcedureDateTime;

        // ICSIDate
        $this->ICSIDate = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_ICSIDate', 'ICSIDate', '`ICSIDate`', CastDateFieldForLike("`ICSIDate`", 7, "DB"), 135, 19, 7, false, '`ICSIDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ICSIDate->Sortable = true; // Allow sort
        $this->ICSIDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->ICSIDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ICSIDate->Param, "CustomMsg");
        $this->Fields['ICSIDate'] = &$this->ICSIDate;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_PatientSearch', 'PatientSearch', '`PatientSearch`', '`PatientSearch`', 200, 45, -1, false, '`PatientSearch`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->Required = true; // Required field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'patient', false, 'id', ["PatientID","first_name","mobile_no",""], [], [], [], [], ["id","first_name","mobile_no","Age","gender","profilePic"], ["x_PatientId","x_PatientName","x_Telephone","x_Age","x_Gender","x_profilePic"], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;

        // HospID
        $this->HospID = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 200, 45, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // createdUserName
        $this->createdUserName = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_createdUserName', 'createdUserName', '`createdUserName`', '`createdUserName`', 200, 45, -1, false, '`createdUserName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdUserName->Sortable = true; // Allow sort
        $this->createdUserName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdUserName->Param, "CustomMsg");
        $this->Fields['createdUserName'] = &$this->createdUserName;

        // TemplateDrNotes
        $this->TemplateDrNotes = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_TemplateDrNotes', 'TemplateDrNotes', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->TemplateDrNotes->IsCustom = true; // Custom field
        $this->TemplateDrNotes->Sortable = true; // Allow sort
        $this->TemplateDrNotes->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->TemplateDrNotes->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->TemplateDrNotes->Lookup = new Lookup('TemplateDrNotes', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_procedurenotes"], '', '');
        $this->TemplateDrNotes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->TemplateDrNotes->Param, "CustomMsg");
        $this->Fields['TemplateDrNotes'] = &$this->TemplateDrNotes;

        // reportheader
        $this->reportheader = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_reportheader', 'reportheader', '`reportheader`', '`reportheader`', 200, 45, -1, false, '`reportheader`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->reportheader->Sortable = true; // Allow sort
        $this->reportheader->Lookup = new Lookup('reportheader', 'patient_opd_follow_up', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->reportheader->OptionCount = 1;
        $this->reportheader->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->reportheader->Param, "CustomMsg");
        $this->Fields['reportheader'] = &$this->reportheader;

        // Purpose
        $this->Purpose = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 201, 65535, -1, false, '`Purpose`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Purpose->Sortable = true; // Allow sort
        $this->Purpose->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Purpose->Param, "CustomMsg");
        $this->Fields['Purpose'] = &$this->Purpose;

        // DrName
        $this->DrName = new DbField('patient_opd_follow_up', 'patient_opd_follow_up', 'x_DrName', 'DrName', '`DrName`', '`DrName`', 200, 45, -1, false, '`DrName`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DrName->Sortable = true; // Allow sort
        $this->DrName->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DrName->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DrName->Lookup = new Lookup('DrName', 'doctors', false, 'CODE', ["NAME","","",""], [], [], [], [], [], [], '', '');
        $this->DrName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DrName->Param, "CustomMsg");
        $this->Fields['DrName'] = &$this->DrName;
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
        if ($this->getCurrentDetailTable() == "patient_an_registration") {
            $detailUrl = Container("patient_an_registration")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_PatientId", $this->PatientId->CurrentValue);
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "PatientOpdFollowUpList";
        }
        return $detailUrl;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_opd_follow_up`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `TemplateDrNotes`");
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
        $this->Reception->DbValue = $row['Reception'];
        $this->PatID->DbValue = $row['PatID'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->Telephone->DbValue = $row['Telephone'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->procedurenotes->DbValue = $row['procedurenotes'];
        $this->NextReviewDate->DbValue = $row['NextReviewDate'];
        $this->ICSIAdvised->DbValue = $row['ICSIAdvised'];
        $this->DeliveryRegistered->DbValue = $row['DeliveryRegistered'];
        $this->EDD->DbValue = $row['EDD'];
        $this->SerologyPositive->DbValue = $row['SerologyPositive'];
        $this->Allergy->DbValue = $row['Allergy'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->LMP->DbValue = $row['LMP'];
        $this->Procedure->DbValue = $row['Procedure'];
        $this->ProcedureDateTime->DbValue = $row['ProcedureDateTime'];
        $this->ICSIDate->DbValue = $row['ICSIDate'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
        $this->HospID->DbValue = $row['HospID'];
        $this->createdUserName->DbValue = $row['createdUserName'];
        $this->TemplateDrNotes->DbValue = $row['TemplateDrNotes'];
        $this->reportheader->DbValue = $row['reportheader'];
        $this->Purpose->DbValue = $row['Purpose'];
        $this->DrName->DbValue = $row['DrName'];
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
        return $_SESSION[$name] ?? GetUrl("PatientOpdFollowUpList");
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
        if ($pageName == "PatientOpdFollowUpView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientOpdFollowUpEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientOpdFollowUpAdd") {
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
                return "PatientOpdFollowUpView";
            case Config("API_ADD_ACTION"):
                return "PatientOpdFollowUpAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientOpdFollowUpEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientOpdFollowUpDelete";
            case Config("API_LIST_ACTION"):
                return "PatientOpdFollowUpList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientOpdFollowUpList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientOpdFollowUpView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientOpdFollowUpView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientOpdFollowUpAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientOpdFollowUpAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientOpdFollowUpEdit", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientOpdFollowUpEdit", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
            $url = $this->keyUrl("PatientOpdFollowUpAdd", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientOpdFollowUpAdd", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
        return $this->keyUrl("PatientOpdFollowUpDelete", $this->getUrlParm());
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Telephone->setDbValue($row['Telephone']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->ICSIAdvised->setDbValue($row['ICSIAdvised']);
        $this->DeliveryRegistered->setDbValue($row['DeliveryRegistered']);
        $this->EDD->setDbValue($row['EDD']);
        $this->SerologyPositive->setDbValue($row['SerologyPositive']);
        $this->Allergy->setDbValue($row['Allergy']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->LMP->setDbValue($row['LMP']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->ProcedureDateTime->setDbValue($row['ProcedureDateTime']);
        $this->ICSIDate->setDbValue($row['ICSIDate']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdUserName->setDbValue($row['createdUserName']);
        $this->TemplateDrNotes->setDbValue($row['TemplateDrNotes']);
        $this->reportheader->setDbValue($row['reportheader']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->DrName->setDbValue($row['DrName']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // Reception

        // PatID

        // PatientId

        // PatientName

        // MobileNumber

        // Telephone

        // mrnno

        // Age

        // Gender

        // profilePic

        // procedurenotes

        // NextReviewDate

        // ICSIAdvised

        // DeliveryRegistered

        // EDD

        // SerologyPositive

        // Allergy

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // LMP

        // Procedure

        // ProcedureDateTime

        // ICSIDate

        // PatientSearch

        // HospID

        // createdUserName

        // TemplateDrNotes

        // reportheader

        // Purpose

        // DrName

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // Telephone
        $this->Telephone->ViewValue = $this->Telephone->CurrentValue;
        $this->Telephone->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // procedurenotes
        $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->ViewCustomAttributes = "";

        // NextReviewDate
        $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
        $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
        $this->NextReviewDate->ViewCustomAttributes = "";

        // ICSIAdvised
        if (strval($this->ICSIAdvised->CurrentValue) != "") {
            $this->ICSIAdvised->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->ICSIAdvised->ViewValue = null;
        }
        $this->ICSIAdvised->ViewCustomAttributes = "";

        // DeliveryRegistered
        if (strval($this->DeliveryRegistered->CurrentValue) != "") {
            $this->DeliveryRegistered->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->DeliveryRegistered->ViewValue = null;
        }
        $this->DeliveryRegistered->ViewCustomAttributes = "";

        // EDD
        $this->EDD->ViewValue = $this->EDD->CurrentValue;
        $this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 7);
        $this->EDD->ViewCustomAttributes = "";

        // SerologyPositive
        if (strval($this->SerologyPositive->CurrentValue) != "") {
            $this->SerologyPositive->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->SerologyPositive->ViewValue = null;
        }
        $this->SerologyPositive->ViewCustomAttributes = "";

        // Allergy
        $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
        $curVal = trim(strval($this->Allergy->CurrentValue));
        if ($curVal != "") {
            $this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
            if ($this->Allergy->ViewValue === null) { // Lookup from database
                $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->Allergy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Allergy->Lookup->renderViewRow($rswrk[0]);
                    $this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
                } else {
                    $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
                }
            }
        } else {
            $this->Allergy->ViewValue = null;
        }
        $this->Allergy->ViewCustomAttributes = "";

        // status
        $curVal = trim(strval($this->status->CurrentValue));
        if ($curVal != "") {
            $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            if ($this->status->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                    $this->status->ViewValue = $this->status->displayValue($arwrk);
                } else {
                    $this->status->ViewValue = $this->status->CurrentValue;
                }
            }
        } else {
            $this->status->ViewValue = null;
        }
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

        // LMP
        $this->LMP->ViewValue = $this->LMP->CurrentValue;
        $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
        $this->LMP->ViewCustomAttributes = "";

        // Procedure
        $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
        $this->Procedure->ViewCustomAttributes = "";

        // ProcedureDateTime
        $this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
        $this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 11);
        $this->ProcedureDateTime->ViewCustomAttributes = "";

        // ICSIDate
        $this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
        $this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 7);
        $this->ICSIDate->ViewCustomAttributes = "";

        // PatientSearch
        $curVal = trim(strval($this->PatientSearch->CurrentValue));
        if ($curVal != "") {
            $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                }
            }
        } else {
            $this->PatientSearch->ViewValue = null;
        }
        $this->PatientSearch->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewCustomAttributes = "";

        // createdUserName
        $this->createdUserName->ViewValue = $this->createdUserName->CurrentValue;
        $this->createdUserName->ViewCustomAttributes = "";

        // TemplateDrNotes
        $curVal = trim(strval($this->TemplateDrNotes->CurrentValue));
        if ($curVal != "") {
            $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
            if ($this->TemplateDrNotes->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Doctor Notes'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateDrNotes->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->TemplateDrNotes->Lookup->renderViewRow($rswrk[0]);
                    $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->displayValue($arwrk);
                } else {
                    $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->CurrentValue;
                }
            }
        } else {
            $this->TemplateDrNotes->ViewValue = null;
        }
        $this->TemplateDrNotes->ViewCustomAttributes = "";

        // reportheader
        if (strval($this->reportheader->CurrentValue) != "") {
            $this->reportheader->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->reportheader->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->reportheader->ViewValue->add($this->reportheader->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->reportheader->ViewValue = null;
        }
        $this->reportheader->ViewCustomAttributes = "";

        // Purpose
        $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
        $this->Purpose->ViewCustomAttributes = "";

        // DrName
        $curVal = trim(strval($this->DrName->CurrentValue));
        if ($curVal != "") {
            $this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
            if ($this->DrName->ViewValue === null) { // Lookup from database
                $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrName->Lookup->renderViewRow($rswrk[0]);
                    $this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
                } else {
                    $this->DrName->ViewValue = $this->DrName->CurrentValue;
                }
            }
        } else {
            $this->DrName->ViewValue = null;
        }
        $this->DrName->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 80);
        $this->Reception->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->ExportHrefValue = Barcode()->getHrefValue($this->PatientId->CurrentValue, 'CODE128', 40);
        $this->PatientId->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // Telephone
        $this->Telephone->LinkCustomAttributes = "";
        $this->Telephone->HrefValue = "";
        $this->Telephone->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // Age
        $this->Age->LinkCustomAttributes = "";
        $this->Age->HrefValue = "";
        $this->Age->TooltipValue = "";

        // Gender
        $this->Gender->LinkCustomAttributes = "";
        $this->Gender->HrefValue = "";
        $this->Gender->TooltipValue = "";

        // profilePic
        $this->profilePic->LinkCustomAttributes = "";
        $this->profilePic->HrefValue = "";
        $this->profilePic->TooltipValue = "";

        // procedurenotes
        $this->procedurenotes->LinkCustomAttributes = "";
        $this->procedurenotes->HrefValue = "";
        $this->procedurenotes->TooltipValue = "";

        // NextReviewDate
        $this->NextReviewDate->LinkCustomAttributes = "";
        $this->NextReviewDate->HrefValue = "";
        $this->NextReviewDate->TooltipValue = "";

        // ICSIAdvised
        $this->ICSIAdvised->LinkCustomAttributes = "";
        $this->ICSIAdvised->HrefValue = "";
        $this->ICSIAdvised->TooltipValue = "";

        // DeliveryRegistered
        $this->DeliveryRegistered->LinkCustomAttributes = "";
        $this->DeliveryRegistered->HrefValue = "";
        $this->DeliveryRegistered->TooltipValue = "";

        // EDD
        $this->EDD->LinkCustomAttributes = "";
        $this->EDD->HrefValue = "";
        $this->EDD->TooltipValue = "";

        // SerologyPositive
        $this->SerologyPositive->LinkCustomAttributes = "";
        $this->SerologyPositive->HrefValue = "";
        $this->SerologyPositive->TooltipValue = "";

        // Allergy
        $this->Allergy->LinkCustomAttributes = "";
        $this->Allergy->HrefValue = "";
        $this->Allergy->TooltipValue = "";

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

        // LMP
        $this->LMP->LinkCustomAttributes = "";
        $this->LMP->HrefValue = "";
        $this->LMP->TooltipValue = "";

        // Procedure
        $this->Procedure->LinkCustomAttributes = "";
        $this->Procedure->HrefValue = "";
        $this->Procedure->TooltipValue = "";

        // ProcedureDateTime
        $this->ProcedureDateTime->LinkCustomAttributes = "";
        $this->ProcedureDateTime->HrefValue = "";
        $this->ProcedureDateTime->TooltipValue = "";

        // ICSIDate
        $this->ICSIDate->LinkCustomAttributes = "";
        $this->ICSIDate->HrefValue = "";
        $this->ICSIDate->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // createdUserName
        $this->createdUserName->LinkCustomAttributes = "";
        $this->createdUserName->HrefValue = "";
        $this->createdUserName->TooltipValue = "";

        // TemplateDrNotes
        $this->TemplateDrNotes->LinkCustomAttributes = "";
        $this->TemplateDrNotes->HrefValue = "";
        $this->TemplateDrNotes->TooltipValue = "";

        // reportheader
        $this->reportheader->LinkCustomAttributes = "";
        $this->reportheader->HrefValue = "";
        $this->reportheader->TooltipValue = "";

        // Purpose
        $this->Purpose->LinkCustomAttributes = "";
        $this->Purpose->HrefValue = "";
        $this->Purpose->TooltipValue = "";

        // DrName
        $this->DrName->LinkCustomAttributes = "";
        $this->DrName->HrefValue = "";
        $this->DrName->TooltipValue = "";

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

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        if (!$this->Reception->Raw) {
            $this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
        }
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        if (!$this->PatID->Raw) {
            $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
        }
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
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

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // Telephone
        $this->Telephone->EditAttrs["class"] = "form-control";
        $this->Telephone->EditCustomAttributes = "";
        if (!$this->Telephone->Raw) {
            $this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
        }
        $this->Telephone->EditValue = $this->Telephone->CurrentValue;
        $this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        if (!$this->mrnno->Raw) {
            $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
        }
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

        // Age
        $this->Age->EditAttrs["class"] = "form-control";
        $this->Age->EditCustomAttributes = "";
        if (!$this->Age->Raw) {
            $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
        }
        $this->Age->EditValue = $this->Age->CurrentValue;
        $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

        // Gender
        $this->Gender->EditAttrs["class"] = "form-control";
        $this->Gender->EditCustomAttributes = "";
        if (!$this->Gender->Raw) {
            $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
        }
        $this->Gender->EditValue = $this->Gender->CurrentValue;
        $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

        // profilePic
        $this->profilePic->EditAttrs["class"] = "form-control";
        $this->profilePic->EditCustomAttributes = "";
        $this->profilePic->EditValue = $this->profilePic->CurrentValue;
        $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

        // procedurenotes
        $this->procedurenotes->EditAttrs["class"] = "form-control";
        $this->procedurenotes->EditCustomAttributes = "";
        $this->procedurenotes->EditValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

        // NextReviewDate
        $this->NextReviewDate->EditAttrs["class"] = "form-control";
        $this->NextReviewDate->EditCustomAttributes = "";
        $this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 7);
        $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

        // ICSIAdvised
        $this->ICSIAdvised->EditCustomAttributes = "";
        $this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(false);
        $this->ICSIAdvised->PlaceHolder = RemoveHtml($this->ICSIAdvised->caption());

        // DeliveryRegistered
        $this->DeliveryRegistered->EditCustomAttributes = "";
        $this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(false);
        $this->DeliveryRegistered->PlaceHolder = RemoveHtml($this->DeliveryRegistered->caption());

        // EDD
        $this->EDD->EditAttrs["class"] = "form-control";
        $this->EDD->EditCustomAttributes = "";
        $this->EDD->EditValue = FormatDateTime($this->EDD->CurrentValue, 7);
        $this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

        // SerologyPositive
        $this->SerologyPositive->EditCustomAttributes = "";
        $this->SerologyPositive->EditValue = $this->SerologyPositive->options(false);
        $this->SerologyPositive->PlaceHolder = RemoveHtml($this->SerologyPositive->caption());

        // Allergy
        $this->Allergy->EditAttrs["class"] = "form-control";
        $this->Allergy->EditCustomAttributes = "";
        if (!$this->Allergy->Raw) {
            $this->Allergy->CurrentValue = HtmlDecode($this->Allergy->CurrentValue);
        }
        $this->Allergy->EditValue = $this->Allergy->CurrentValue;
        $this->Allergy->PlaceHolder = RemoveHtml($this->Allergy->caption());

        // status
        $this->status->EditAttrs["class"] = "form-control";
        $this->status->EditCustomAttributes = "";
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // LMP
        $this->LMP->EditAttrs["class"] = "form-control";
        $this->LMP->EditCustomAttributes = "";
        $this->LMP->EditValue = FormatDateTime($this->LMP->CurrentValue, 7);
        $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

        // Procedure
        $this->Procedure->EditAttrs["class"] = "form-control";
        $this->Procedure->EditCustomAttributes = "";
        $this->Procedure->EditValue = $this->Procedure->CurrentValue;
        $this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

        // ProcedureDateTime
        $this->ProcedureDateTime->EditAttrs["class"] = "form-control";
        $this->ProcedureDateTime->EditCustomAttributes = "";
        $this->ProcedureDateTime->EditValue = FormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
        $this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

        // ICSIDate
        $this->ICSIDate->EditAttrs["class"] = "form-control";
        $this->ICSIDate->EditCustomAttributes = "";
        $this->ICSIDate->EditValue = FormatDateTime($this->ICSIDate->CurrentValue, 7);
        $this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

        // HospID

        // createdUserName

        // TemplateDrNotes
        $this->TemplateDrNotes->EditAttrs["class"] = "form-control";
        $this->TemplateDrNotes->EditCustomAttributes = "";
        $this->TemplateDrNotes->PlaceHolder = RemoveHtml($this->TemplateDrNotes->caption());

        // reportheader
        $this->reportheader->EditCustomAttributes = "";
        $this->reportheader->EditValue = $this->reportheader->options(false);
        $this->reportheader->PlaceHolder = RemoveHtml($this->reportheader->caption());

        // Purpose
        $this->Purpose->EditAttrs["class"] = "form-control";
        $this->Purpose->EditCustomAttributes = "";
        $this->Purpose->EditValue = $this->Purpose->CurrentValue;
        $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

        // DrName
        $this->DrName->EditAttrs["class"] = "form-control";
        $this->DrName->EditCustomAttributes = "";
        $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

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
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Telephone);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->procedurenotes);
                    $doc->exportCaption($this->NextReviewDate);
                    $doc->exportCaption($this->ICSIAdvised);
                    $doc->exportCaption($this->DeliveryRegistered);
                    $doc->exportCaption($this->EDD);
                    $doc->exportCaption($this->SerologyPositive);
                    $doc->exportCaption($this->Allergy);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->Procedure);
                    $doc->exportCaption($this->ProcedureDateTime);
                    $doc->exportCaption($this->ICSIDate);
                    $doc->exportCaption($this->PatientSearch);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->createdUserName);
                    $doc->exportCaption($this->TemplateDrNotes);
                    $doc->exportCaption($this->reportheader);
                    $doc->exportCaption($this->Purpose);
                    $doc->exportCaption($this->DrName);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Telephone);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->NextReviewDate);
                    $doc->exportCaption($this->ICSIAdvised);
                    $doc->exportCaption($this->DeliveryRegistered);
                    $doc->exportCaption($this->EDD);
                    $doc->exportCaption($this->SerologyPositive);
                    $doc->exportCaption($this->Allergy);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->LMP);
                    $doc->exportCaption($this->ProcedureDateTime);
                    $doc->exportCaption($this->ICSIDate);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->createdUserName);
                    $doc->exportCaption($this->reportheader);
                    $doc->exportCaption($this->DrName);
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
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Telephone);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->procedurenotes);
                        $doc->exportField($this->NextReviewDate);
                        $doc->exportField($this->ICSIAdvised);
                        $doc->exportField($this->DeliveryRegistered);
                        $doc->exportField($this->EDD);
                        $doc->exportField($this->SerologyPositive);
                        $doc->exportField($this->Allergy);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->Procedure);
                        $doc->exportField($this->ProcedureDateTime);
                        $doc->exportField($this->ICSIDate);
                        $doc->exportField($this->PatientSearch);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->createdUserName);
                        $doc->exportField($this->TemplateDrNotes);
                        $doc->exportField($this->reportheader);
                        $doc->exportField($this->Purpose);
                        $doc->exportField($this->DrName);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Telephone);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->NextReviewDate);
                        $doc->exportField($this->ICSIAdvised);
                        $doc->exportField($this->DeliveryRegistered);
                        $doc->exportField($this->EDD);
                        $doc->exportField($this->SerologyPositive);
                        $doc->exportField($this->Allergy);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->LMP);
                        $doc->exportField($this->ProcedureDateTime);
                        $doc->exportField($this->ICSIDate);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->createdUserName);
                        $doc->exportField($this->reportheader);
                        $doc->exportField($this->DrName);
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
    public function rowInserting($rsold, &$rsnew) {
    	// Enter your code here
    	// To cancel, set return value to FALSE
    		$rsnew["createdUserName"]	= GetUserName();
    	return TRUE;
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
