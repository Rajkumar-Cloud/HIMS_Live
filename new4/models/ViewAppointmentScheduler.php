<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_appointment_scheduler
 */
class ViewAppointmentScheduler extends DbTable
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
    public $patientID;
    public $patientName;
    public $MobileNumber;
    public $Purpose;
    public $PatientType;
    public $Referal;
    public $start_date;
    public $DoctorName;
    public $HospID;
    public $end_date;
    public $DoctorID;
    public $DoctorCode;
    public $Department;
    public $AppointmentStatus;
    public $status;
    public $scheduler_id;
    public $text;
    public $appointment_status;
    public $PId;
    public $SchEmail;
    public $appointment_type;
    public $Notified;
    public $Notes;
    public $paymentType;
    public $WhereDidYouHear;
    public $createdBy;
    public $createdDateTime;
    public $PatientTypee;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_appointment_scheduler';
        $this->TableName = 'view_appointment_scheduler';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_appointment_scheduler`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = true; // Allow detail add
        $this->DetailEdit = true; // Allow detail edit
        $this->DetailView = true; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id
        $this->id = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // patientID
        $this->patientID = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_patientID', 'patientID', '`patientID`', '`patientID`', 200, 45, -1, false, '`patientID`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->patientID->Sortable = true; // Allow sort
        $this->patientID->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->patientID->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->patientID->Lookup = new Lookup('patientID', 'patient', false, 'PatientID', ["PatientID","first_name","mobile_no","spouse_mobile_no"], [], [], [], [], ["first_name","id","mobile_no","ReferedByDr"], ["x_patientName","x_PId","x_MobileNumber","x_Referal"], '`id` DESC', '');
        $this->patientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patientID->Param, "CustomMsg");
        $this->Fields['patientID'] = &$this->patientID;

        // patientName
        $this->patientName = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_patientName', 'patientName', '`patientName`', '`patientName`', 200, 45, -1, false, '`patientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patientName->Sortable = true; // Allow sort
        $this->patientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->patientName->Param, "CustomMsg");
        $this->Fields['patientName'] = &$this->patientName;

        // MobileNumber
        $this->MobileNumber = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // Purpose
        $this->Purpose = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_Purpose', 'Purpose', '`Purpose`', '`Purpose`', 200, 45, -1, false, '`Purpose`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Purpose->Sortable = true; // Allow sort
        $this->Purpose->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Purpose->Param, "CustomMsg");
        $this->Fields['Purpose'] = &$this->Purpose;

        // PatientType
        $this->PatientType = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_PatientType', 'PatientType', '`PatientType`', '`PatientType`', 200, 45, -1, false, '`PatientType`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->PatientType->Required = true; // Required field
        $this->PatientType->Sortable = true; // Allow sort
        $this->PatientType->Lookup = new Lookup('PatientType', 'view_appointment_scheduler', false, '', ["","","",""], [], ["x_PatientTypee"], [], [], [], [], '', '');
        $this->PatientType->OptionCount = 2;
        $this->PatientType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientType->Param, "CustomMsg");
        $this->Fields['PatientType'] = &$this->PatientType;

        // Referal
        $this->Referal = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_Referal', 'Referal', '`Referal`', '`Referal`', 200, 45, -1, false, '`EV__Referal`', true, true, true, 'FORMATTED TEXT', 'SELECT');
        $this->Referal->Sortable = true; // Allow sort
        $this->Referal->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Referal->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Referal->Lookup = new Lookup('Referal', 'mas_reference_type', false, 'reference', ["reference","","",""], [], [], [], [], [], [], '', '');
        $this->Referal->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Referal->Param, "CustomMsg");
        $this->Fields['Referal'] = &$this->Referal;

        // start_date
        $this->start_date = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_start_date', 'start_date', '`start_date`', CastDateFieldForLike("`start_date`", 11, "DB"), 135, 19, 11, false, '`start_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->start_date->Sortable = true; // Allow sort
        $this->start_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->start_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->start_date->Param, "CustomMsg");
        $this->Fields['start_date'] = &$this->start_date;

        // DoctorName
        $this->DoctorName = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_DoctorName', 'DoctorName', '`DoctorName`', '`DoctorName`', 200, 45, -1, false, '`DoctorName`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DoctorName->Sortable = true; // Allow sort
        $this->DoctorName->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DoctorName->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DoctorName->Lookup = new Lookup('DoctorName', 'doctors', false, 'NAME', ["NAME","","",""], [], [], [], [], ["id","CODE","DEPARTMENT"], ["x_DoctorID","x_DoctorCode","x_Department"], '', '');
        $this->DoctorName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DoctorName->Param, "CustomMsg");
        $this->Fields['DoctorName'] = &$this->DoctorName;

        // HospID
        $this->HospID = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // end_date
        $this->end_date = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_end_date', 'end_date', '`end_date`', CastDateFieldForLike("`end_date`", 11, "DB"), 135, 19, 11, false, '`end_date`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->end_date->Sortable = true; // Allow sort
        $this->end_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
        $this->end_date->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->end_date->Param, "CustomMsg");
        $this->Fields['end_date'] = &$this->end_date;

        // DoctorID
        $this->DoctorID = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_DoctorID', 'DoctorID', '`DoctorID`', '`DoctorID`', 3, 11, -1, false, '`DoctorID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoctorID->Sortable = true; // Allow sort
        $this->DoctorID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DoctorID->Param, "CustomMsg");
        $this->Fields['DoctorID'] = &$this->DoctorID;

        // DoctorCode
        $this->DoctorCode = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_DoctorCode', 'DoctorCode', '`DoctorCode`', '`DoctorCode`', 200, 45, -1, false, '`DoctorCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoctorCode->Sortable = true; // Allow sort
        $this->DoctorCode->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DoctorCode->Param, "CustomMsg");
        $this->Fields['DoctorCode'] = &$this->DoctorCode;

        // Department
        $this->Department = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_Department', 'Department', '`Department`', '`Department`', 200, 45, -1, false, '`Department`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Department->Sortable = true; // Allow sort
        $this->Department->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Department->Param, "CustomMsg");
        $this->Fields['Department'] = &$this->Department;

        // AppointmentStatus
        $this->AppointmentStatus = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_AppointmentStatus', 'AppointmentStatus', '`AppointmentStatus`', '`AppointmentStatus`', 200, 45, -1, false, '`AppointmentStatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AppointmentStatus->Sortable = true; // Allow sort
        $this->AppointmentStatus->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AppointmentStatus->Param, "CustomMsg");
        $this->Fields['AppointmentStatus'] = &$this->AppointmentStatus;

        // status
        $this->status = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_status', 'status', '`status`', '`status`', 200, 45, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->status->Sortable = true; // Allow sort
        $this->status->Lookup = new Lookup('status', 'view_appointment_scheduler', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->status->OptionCount = 1;
        $this->status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->status->Param, "CustomMsg");
        $this->Fields['status'] = &$this->status;

        // scheduler_id
        $this->scheduler_id = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_scheduler_id', 'scheduler_id', '`scheduler_id`', '`scheduler_id`', 200, 45, -1, false, '`scheduler_id`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->scheduler_id->Sortable = true; // Allow sort
        $this->scheduler_id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->scheduler_id->Param, "CustomMsg");
        $this->Fields['scheduler_id'] = &$this->scheduler_id;

        // text
        $this->text = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_text', 'text', '`text`', '`text`', 200, 45, -1, false, '`text`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->text->Sortable = true; // Allow sort
        $this->text->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->text->Param, "CustomMsg");
        $this->Fields['text'] = &$this->text;

        // appointment_status
        $this->appointment_status = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_appointment_status', 'appointment_status', '`appointment_status`', '`appointment_status`', 200, 45, -1, false, '`appointment_status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->appointment_status->Sortable = true; // Allow sort
        $this->appointment_status->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->appointment_status->Param, "CustomMsg");
        $this->Fields['appointment_status'] = &$this->appointment_status;

        // PId
        $this->PId = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_PId', 'PId', '`PId`', '`PId`', 3, 11, -1, false, '`PId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PId->Sortable = true; // Allow sort
        $this->PId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->PId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PId->Param, "CustomMsg");
        $this->Fields['PId'] = &$this->PId;

        // SchEmail
        $this->SchEmail = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_SchEmail', 'SchEmail', '`SchEmail`', '`SchEmail`', 200, 45, -1, false, '`SchEmail`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SchEmail->Sortable = true; // Allow sort
        $this->SchEmail->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SchEmail->Param, "CustomMsg");
        $this->Fields['SchEmail'] = &$this->SchEmail;

        // appointment_type
        $this->appointment_type = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_appointment_type', 'appointment_type', '`appointment_type`', '`appointment_type`', 200, 45, -1, false, '`appointment_type`', false, false, false, 'FORMATTED TEXT', 'RADIO');
        $this->appointment_type->Sortable = true; // Allow sort
        $this->appointment_type->Lookup = new Lookup('appointment_type', 'view_appointment_scheduler', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->appointment_type->OptionCount = 2;
        $this->appointment_type->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->appointment_type->Param, "CustomMsg");
        $this->Fields['appointment_type'] = &$this->appointment_type;

        // Notified
        $this->Notified = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_Notified', 'Notified', '`Notified`', '`Notified`', 200, 45, -1, false, '`Notified`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->Notified->Sortable = true; // Allow sort
        $this->Notified->Lookup = new Lookup('Notified', 'view_appointment_scheduler', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->Notified->OptionCount = 2;
        $this->Notified->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Notified->Param, "CustomMsg");
        $this->Fields['Notified'] = &$this->Notified;

        // Notes
        $this->Notes = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_Notes', 'Notes', '`Notes`', '`Notes`', 200, 45, -1, false, '`Notes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Notes->Sortable = true; // Allow sort
        $this->Notes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Notes->Param, "CustomMsg");
        $this->Fields['Notes'] = &$this->Notes;

        // paymentType
        $this->paymentType = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_paymentType', 'paymentType', '`paymentType`', '`paymentType`', 200, 45, -1, false, '`paymentType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->paymentType->Sortable = true; // Allow sort
        $this->paymentType->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->paymentType->Param, "CustomMsg");
        $this->Fields['paymentType'] = &$this->paymentType;

        // WhereDidYouHear
        $this->WhereDidYouHear = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_WhereDidYouHear', 'WhereDidYouHear', '`WhereDidYouHear`', '`WhereDidYouHear`', 200, 45, -1, false, '`WhereDidYouHear`', false, false, false, 'FORMATTED TEXT', 'CHECKBOX');
        $this->WhereDidYouHear->Sortable = true; // Allow sort
        $this->WhereDidYouHear->Lookup = new Lookup('WhereDidYouHear', 'mas_where_didyou_hear', false, 'Job', ["Job","","",""], [], [], [], [], [], [], '', '');
        $this->WhereDidYouHear->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->WhereDidYouHear->Param, "CustomMsg");
        $this->Fields['WhereDidYouHear'] = &$this->WhereDidYouHear;

        // createdBy
        $this->createdBy = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_createdBy', 'createdBy', '`createdBy`', '`createdBy`', 200, 45, -1, false, '`createdBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdBy->Sortable = true; // Allow sort
        $this->createdBy->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdBy->Param, "CustomMsg");
        $this->Fields['createdBy'] = &$this->createdBy;

        // createdDateTime
        $this->createdDateTime = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_createdDateTime', 'createdDateTime', '`createdDateTime`', CastDateFieldForLike("`createdDateTime`", 0, "DB"), 135, 19, 0, false, '`createdDateTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdDateTime->Sortable = true; // Allow sort
        $this->createdDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->createdDateTime->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->createdDateTime->Param, "CustomMsg");
        $this->Fields['createdDateTime'] = &$this->createdDateTime;

        // PatientTypee
        $this->PatientTypee = new DbField('view_appointment_scheduler', 'view_appointment_scheduler', 'x_PatientTypee', 'PatientTypee', '`PatientTypee`', '`PatientTypee`', 200, 45, -1, false, '`PatientTypee`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientTypee->Required = true; // Required field
        $this->PatientTypee->Sortable = true; // Allow sort
        $this->PatientTypee->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientTypee->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientTypee->Lookup = new Lookup('PatientTypee', 'appointment_patienttypee', false, 'Name', ["Name","","",""], ["x_PatientType"], [], ["Type"], ["x_Type"], [], [], '', '');
        $this->PatientTypee->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientTypee->Param, "CustomMsg");
        $this->Fields['PatientTypee'] = &$this->PatientTypee;
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
            $sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortFieldList . " " . $curSort : "";
            $this->setSessionOrderByList($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Session ORDER BY for List page
    public function getSessionOrderByList()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST"));
    }

    public function setSessionOrderByList($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_appointment_scheduler`";
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

    public function getSqlSelectList() // Select for List page
    {
        if ($this->SqlSelectList) {
            return $this->SqlSelectList;
        }
        $from = "(SELECT *, (SELECT `reference` FROM `mas_reference_type` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`reference` = `view_appointment_scheduler`.`Referal` LIMIT 1) AS `EV__Referal` FROM `view_appointment_scheduler`)";
        return $from . " `TMP_TABLE`";
    }

    public function sqlSelectList() // For backward compatibility
    {
        return $this->getSqlSelectList();
    }

    public function setSqlSelectList($v)
    {
        $this->SqlSelectList = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "`HospID`='".HospitalID()."'";
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
        if ($this->useVirtualFields()) {
            $select = "*";
            $from = $this->getSqlSelectList();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        } else {
            $select = $this->getSqlSelect();
            $from = $this->getSqlFrom();
            $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        }
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
        $sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Check if virtual fields is used in SQL
    protected function useVirtualFields()
    {
        $where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
        $orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
        if ($where != "") {
            $where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
        }
        if ($orderBy != "") {
            $orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
        }
        if ($this->BasicSearch->getKeyword() != "") {
            return true;
        }
        if (
            $this->Referal->AdvancedSearch->SearchValue != "" ||
            $this->Referal->AdvancedSearch->SearchValue2 != "" ||
            ContainsString($where, " " . $this->Referal->VirtualExpression . " ")
        ) {
            return true;
        }
        if (ContainsString($orderBy, " " . $this->Referal->VirtualExpression . " ")) {
            return true;
        }
        return false;
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
        if ($this->useVirtualFields()) {
            $sql = $this->buildSelectSql("*", $this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        } else {
            $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        }
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
        $this->patientID->DbValue = $row['patientID'];
        $this->patientName->DbValue = $row['patientName'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->Purpose->DbValue = $row['Purpose'];
        $this->PatientType->DbValue = $row['PatientType'];
        $this->Referal->DbValue = $row['Referal'];
        $this->start_date->DbValue = $row['start_date'];
        $this->DoctorName->DbValue = $row['DoctorName'];
        $this->HospID->DbValue = $row['HospID'];
        $this->end_date->DbValue = $row['end_date'];
        $this->DoctorID->DbValue = $row['DoctorID'];
        $this->DoctorCode->DbValue = $row['DoctorCode'];
        $this->Department->DbValue = $row['Department'];
        $this->AppointmentStatus->DbValue = $row['AppointmentStatus'];
        $this->status->DbValue = $row['status'];
        $this->scheduler_id->DbValue = $row['scheduler_id'];
        $this->text->DbValue = $row['text'];
        $this->appointment_status->DbValue = $row['appointment_status'];
        $this->PId->DbValue = $row['PId'];
        $this->SchEmail->DbValue = $row['SchEmail'];
        $this->appointment_type->DbValue = $row['appointment_type'];
        $this->Notified->DbValue = $row['Notified'];
        $this->Notes->DbValue = $row['Notes'];
        $this->paymentType->DbValue = $row['paymentType'];
        $this->WhereDidYouHear->DbValue = $row['WhereDidYouHear'];
        $this->createdBy->DbValue = $row['createdBy'];
        $this->createdDateTime->DbValue = $row['createdDateTime'];
        $this->PatientTypee->DbValue = $row['PatientTypee'];
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
        return $_SESSION[$name] ?? GetUrl("ViewAppointmentSchedulerList");
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
        if ($pageName == "ViewAppointmentSchedulerView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewAppointmentSchedulerEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewAppointmentSchedulerAdd") {
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
                return "ViewAppointmentSchedulerView";
            case Config("API_ADD_ACTION"):
                return "ViewAppointmentSchedulerAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewAppointmentSchedulerEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewAppointmentSchedulerDelete";
            case Config("API_LIST_ACTION"):
                return "ViewAppointmentSchedulerList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewAppointmentSchedulerList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewAppointmentSchedulerView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewAppointmentSchedulerView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewAppointmentSchedulerAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewAppointmentSchedulerAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewAppointmentSchedulerEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewAppointmentSchedulerAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewAppointmentSchedulerDelete", $this->getUrlParm());
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
        $this->patientID->setDbValue($row['patientID']);
        $this->patientName->setDbValue($row['patientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->PatientType->setDbValue($row['PatientType']);
        $this->Referal->setDbValue($row['Referal']);
        $this->start_date->setDbValue($row['start_date']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->end_date->setDbValue($row['end_date']);
        $this->DoctorID->setDbValue($row['DoctorID']);
        $this->DoctorCode->setDbValue($row['DoctorCode']);
        $this->Department->setDbValue($row['Department']);
        $this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
        $this->status->setDbValue($row['status']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->text->setDbValue($row['text']);
        $this->appointment_status->setDbValue($row['appointment_status']);
        $this->PId->setDbValue($row['PId']);
        $this->SchEmail->setDbValue($row['SchEmail']);
        $this->appointment_type->setDbValue($row['appointment_type']);
        $this->Notified->setDbValue($row['Notified']);
        $this->Notes->setDbValue($row['Notes']);
        $this->paymentType->setDbValue($row['paymentType']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->createdBy->setDbValue($row['createdBy']);
        $this->createdDateTime->setDbValue($row['createdDateTime']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // patientID

        // patientName

        // MobileNumber

        // Purpose

        // PatientType

        // Referal

        // start_date

        // DoctorName

        // HospID

        // end_date

        // DoctorID

        // DoctorCode

        // Department

        // AppointmentStatus

        // status

        // scheduler_id

        // text

        // appointment_status

        // PId

        // SchEmail

        // appointment_type

        // Notified

        // Notes

        // paymentType

        // WhereDidYouHear

        // createdBy

        // createdDateTime

        // PatientTypee

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // patientID
        $curVal = trim(strval($this->patientID->CurrentValue));
        if ($curVal != "") {
            $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
            if ($this->patientID->ViewValue === null) { // Lookup from database
                $filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->patientID->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                    $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                } else {
                    $this->patientID->ViewValue = $this->patientID->CurrentValue;
                }
            }
        } else {
            $this->patientID->ViewValue = null;
        }
        $this->patientID->ViewCustomAttributes = "";

        // patientName
        $this->patientName->ViewValue = $this->patientName->CurrentValue;
        $this->patientName->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // Purpose
        $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
        $this->Purpose->ViewCustomAttributes = "";

        // PatientType
        if (strval($this->PatientType->CurrentValue) != "") {
            $this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
        } else {
            $this->PatientType->ViewValue = null;
        }
        $this->PatientType->ViewCustomAttributes = "";

        // Referal
        if ($this->Referal->VirtualValue != "") {
            $this->Referal->ViewValue = $this->Referal->VirtualValue;
        } else {
            $curVal = trim(strval($this->Referal->CurrentValue));
            if ($curVal != "") {
                $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
                if ($this->Referal->ViewValue === null) { // Lookup from database
                    $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Referal->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                        $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                    } else {
                        $this->Referal->ViewValue = $this->Referal->CurrentValue;
                    }
                }
            } else {
                $this->Referal->ViewValue = null;
            }
        }
        $this->Referal->ViewCustomAttributes = "";

        // start_date
        $this->start_date->ViewValue = $this->start_date->CurrentValue;
        $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
        $this->start_date->ViewCustomAttributes = "";

        // DoctorName
        $curVal = trim(strval($this->DoctorName->CurrentValue));
        if ($curVal != "") {
            $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            if ($this->DoctorName->ViewValue === null) { // Lookup from database
                $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->DoctorName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                    $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                } else {
                    $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
                }
            }
        } else {
            $this->DoctorName->ViewValue = null;
        }
        $this->DoctorName->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // end_date
        $this->end_date->ViewValue = $this->end_date->CurrentValue;
        $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
        $this->end_date->ViewCustomAttributes = "";

        // DoctorID
        $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
        $this->DoctorID->ViewCustomAttributes = "";

        // DoctorCode
        $this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
        $this->DoctorCode->ViewCustomAttributes = "";

        // Department
        $this->Department->ViewValue = $this->Department->CurrentValue;
        $this->Department->ViewCustomAttributes = "";

        // AppointmentStatus
        $this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
        $this->AppointmentStatus->ViewCustomAttributes = "";

        // status
        if (strval($this->status->CurrentValue) != "") {
            $this->status->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->status->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->status->ViewValue = null;
        }
        $this->status->ViewCustomAttributes = "";

        // scheduler_id
        $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
        $this->scheduler_id->ViewCustomAttributes = "";

        // text
        $this->text->ViewValue = $this->text->CurrentValue;
        $this->text->ViewCustomAttributes = "";

        // appointment_status
        $this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
        $this->appointment_status->ViewCustomAttributes = "";

        // PId
        $this->PId->ViewValue = $this->PId->CurrentValue;
        $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
        $this->PId->ViewCustomAttributes = "";

        // SchEmail
        $this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
        $this->SchEmail->ViewCustomAttributes = "";

        // appointment_type
        if (strval($this->appointment_type->CurrentValue) != "") {
            $this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
        } else {
            $this->appointment_type->ViewValue = null;
        }
        $this->appointment_type->ViewCustomAttributes = "";

        // Notified
        if (strval($this->Notified->CurrentValue) != "") {
            $this->Notified->ViewValue = new OptionValues();
            $arwrk = explode(",", strval($this->Notified->CurrentValue));
            $cnt = count($arwrk);
            for ($ari = 0; $ari < $cnt; $ari++)
                $this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
        } else {
            $this->Notified->ViewValue = null;
        }
        $this->Notified->ViewCustomAttributes = "";

        // Notes
        $this->Notes->ViewValue = $this->Notes->CurrentValue;
        $this->Notes->ViewCustomAttributes = "";

        // paymentType
        $this->paymentType->ViewValue = $this->paymentType->CurrentValue;
        $this->paymentType->ViewCustomAttributes = "";

        // WhereDidYouHear
        $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
        if ($curVal != "") {
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                $arwrk = explode(",", $curVal);
                $filterWrk = "";
                foreach ($arwrk as $wrk) {
                    if ($filterWrk != "") {
                        $filterWrk .= " OR ";
                    }
                    $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->WhereDidYouHear->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                        $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                    }
                } else {
                    $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                }
            }
        } else {
            $this->WhereDidYouHear->ViewValue = null;
        }
        $this->WhereDidYouHear->ViewCustomAttributes = "";

        // createdBy
        $this->createdBy->ViewValue = $this->createdBy->CurrentValue;
        $this->createdBy->ViewCustomAttributes = "";

        // createdDateTime
        $this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
        $this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
        $this->createdDateTime->ViewCustomAttributes = "";

        // PatientTypee
        $curVal = trim(strval($this->PatientTypee->CurrentValue));
        if ($curVal != "") {
            $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
            if ($this->PatientTypee->ViewValue === null) { // Lookup from database
                $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $sqlWrk = $this->PatientTypee->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientTypee->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
                } else {
                    $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
                }
            }
        } else {
            $this->PatientTypee->ViewValue = null;
        }
        $this->PatientTypee->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // patientID
        $this->patientID->LinkCustomAttributes = "";
        $this->patientID->HrefValue = "";
        $this->patientID->TooltipValue = "";

        // patientName
        $this->patientName->LinkCustomAttributes = "";
        $this->patientName->HrefValue = "";
        $this->patientName->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // Purpose
        $this->Purpose->LinkCustomAttributes = "";
        $this->Purpose->HrefValue = "";
        $this->Purpose->TooltipValue = "";

        // PatientType
        $this->PatientType->LinkCustomAttributes = "";
        $this->PatientType->HrefValue = "";
        $this->PatientType->TooltipValue = "";

        // Referal
        $this->Referal->LinkCustomAttributes = "";
        $this->Referal->HrefValue = "";
        $this->Referal->TooltipValue = "";

        // start_date
        $this->start_date->LinkCustomAttributes = "";
        $this->start_date->HrefValue = "";
        $this->start_date->TooltipValue = "";

        // DoctorName
        $this->DoctorName->LinkCustomAttributes = "";
        $this->DoctorName->HrefValue = "";
        $this->DoctorName->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // end_date
        $this->end_date->LinkCustomAttributes = "";
        $this->end_date->HrefValue = "";
        $this->end_date->TooltipValue = "";

        // DoctorID
        $this->DoctorID->LinkCustomAttributes = "";
        $this->DoctorID->HrefValue = "";
        $this->DoctorID->TooltipValue = "";

        // DoctorCode
        $this->DoctorCode->LinkCustomAttributes = "";
        $this->DoctorCode->HrefValue = "";
        $this->DoctorCode->TooltipValue = "";

        // Department
        $this->Department->LinkCustomAttributes = "";
        $this->Department->HrefValue = "";
        $this->Department->TooltipValue = "";

        // AppointmentStatus
        $this->AppointmentStatus->LinkCustomAttributes = "";
        $this->AppointmentStatus->HrefValue = "";
        $this->AppointmentStatus->TooltipValue = "";

        // status
        $this->status->LinkCustomAttributes = "";
        $this->status->HrefValue = "";
        $this->status->TooltipValue = "";

        // scheduler_id
        $this->scheduler_id->LinkCustomAttributes = "";
        $this->scheduler_id->HrefValue = "";
        $this->scheduler_id->TooltipValue = "";

        // text
        $this->text->LinkCustomAttributes = "";
        $this->text->HrefValue = "";
        $this->text->TooltipValue = "";

        // appointment_status
        $this->appointment_status->LinkCustomAttributes = "";
        $this->appointment_status->HrefValue = "";
        $this->appointment_status->TooltipValue = "";

        // PId
        $this->PId->LinkCustomAttributes = "";
        $this->PId->HrefValue = "";
        $this->PId->TooltipValue = "";

        // SchEmail
        $this->SchEmail->LinkCustomAttributes = "";
        $this->SchEmail->HrefValue = "";
        $this->SchEmail->TooltipValue = "";

        // appointment_type
        $this->appointment_type->LinkCustomAttributes = "";
        $this->appointment_type->HrefValue = "";
        $this->appointment_type->TooltipValue = "";

        // Notified
        $this->Notified->LinkCustomAttributes = "";
        $this->Notified->HrefValue = "";
        $this->Notified->TooltipValue = "";

        // Notes
        $this->Notes->LinkCustomAttributes = "";
        $this->Notes->HrefValue = "";
        $this->Notes->TooltipValue = "";

        // paymentType
        $this->paymentType->LinkCustomAttributes = "";
        $this->paymentType->HrefValue = "";
        $this->paymentType->TooltipValue = "";

        // WhereDidYouHear
        $this->WhereDidYouHear->LinkCustomAttributes = "";
        $this->WhereDidYouHear->HrefValue = "";
        $this->WhereDidYouHear->TooltipValue = "";

        // createdBy
        $this->createdBy->LinkCustomAttributes = "";
        $this->createdBy->HrefValue = "";
        $this->createdBy->TooltipValue = "";

        // createdDateTime
        $this->createdDateTime->LinkCustomAttributes = "";
        $this->createdDateTime->HrefValue = "";
        $this->createdDateTime->TooltipValue = "";

        // PatientTypee
        $this->PatientTypee->LinkCustomAttributes = "";
        $this->PatientTypee->HrefValue = "";
        $this->PatientTypee->TooltipValue = "";

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

        // patientID
        $this->patientID->EditAttrs["class"] = "form-control";
        $this->patientID->EditCustomAttributes = "";
        $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

        // patientName
        $this->patientName->EditAttrs["class"] = "form-control";
        $this->patientName->EditCustomAttributes = "";
        if (!$this->patientName->Raw) {
            $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
        }
        $this->patientName->EditValue = $this->patientName->CurrentValue;
        $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

        // MobileNumber
        $this->MobileNumber->EditAttrs["class"] = "form-control";
        $this->MobileNumber->EditCustomAttributes = "";
        if (!$this->MobileNumber->Raw) {
            $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
        }
        $this->MobileNumber->EditValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

        // Purpose
        $this->Purpose->EditAttrs["class"] = "form-control";
        $this->Purpose->EditCustomAttributes = "";
        if (!$this->Purpose->Raw) {
            $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
        }
        $this->Purpose->EditValue = $this->Purpose->CurrentValue;
        $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

        // PatientType
        $this->PatientType->EditCustomAttributes = "";
        $this->PatientType->EditValue = $this->PatientType->options(false);
        $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

        // Referal
        $this->Referal->EditAttrs["class"] = "form-control";
        $this->Referal->EditCustomAttributes = "";
        $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

        // start_date
        $this->start_date->EditAttrs["class"] = "form-control";
        $this->start_date->EditCustomAttributes = "";
        $this->start_date->EditValue = FormatDateTime($this->start_date->CurrentValue, 11);
        $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

        // DoctorName
        $this->DoctorName->EditAttrs["class"] = "form-control";
        $this->DoctorName->EditCustomAttributes = "";
        $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

        // HospID

        // end_date
        $this->end_date->EditAttrs["class"] = "form-control";
        $this->end_date->EditCustomAttributes = "";
        $this->end_date->EditValue = FormatDateTime($this->end_date->CurrentValue, 11);
        $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

        // DoctorID
        $this->DoctorID->EditAttrs["class"] = "form-control";
        $this->DoctorID->EditCustomAttributes = "";
        $this->DoctorID->EditValue = $this->DoctorID->CurrentValue;
        $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

        // DoctorCode
        $this->DoctorCode->EditAttrs["class"] = "form-control";
        $this->DoctorCode->EditCustomAttributes = "";
        if (!$this->DoctorCode->Raw) {
            $this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
        }
        $this->DoctorCode->EditValue = $this->DoctorCode->CurrentValue;
        $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

        // Department
        $this->Department->EditAttrs["class"] = "form-control";
        $this->Department->EditCustomAttributes = "";
        if (!$this->Department->Raw) {
            $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
        }
        $this->Department->EditValue = $this->Department->CurrentValue;
        $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

        // AppointmentStatus
        $this->AppointmentStatus->EditAttrs["class"] = "form-control";
        $this->AppointmentStatus->EditCustomAttributes = "";
        if (!$this->AppointmentStatus->Raw) {
            $this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
        }
        $this->AppointmentStatus->EditValue = $this->AppointmentStatus->CurrentValue;
        $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

        // status
        $this->status->EditCustomAttributes = "";
        $this->status->EditValue = $this->status->options(false);
        $this->status->PlaceHolder = RemoveHtml($this->status->caption());

        // scheduler_id
        $this->scheduler_id->EditAttrs["class"] = "form-control";
        $this->scheduler_id->EditCustomAttributes = "";
        $this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
        $this->scheduler_id->ViewCustomAttributes = "";

        // text
        $this->text->EditAttrs["class"] = "form-control";
        $this->text->EditCustomAttributes = "";
        if (!$this->text->Raw) {
            $this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
        }
        $this->text->EditValue = $this->text->CurrentValue;
        $this->text->PlaceHolder = RemoveHtml($this->text->caption());

        // appointment_status
        $this->appointment_status->EditAttrs["class"] = "form-control";
        $this->appointment_status->EditCustomAttributes = "";
        if (!$this->appointment_status->Raw) {
            $this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
        }
        $this->appointment_status->EditValue = $this->appointment_status->CurrentValue;
        $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

        // PId
        $this->PId->EditAttrs["class"] = "form-control";
        $this->PId->EditCustomAttributes = "";
        $this->PId->EditValue = $this->PId->CurrentValue;
        $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

        // SchEmail
        $this->SchEmail->EditAttrs["class"] = "form-control";
        $this->SchEmail->EditCustomAttributes = "";
        if (!$this->SchEmail->Raw) {
            $this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
        }
        $this->SchEmail->EditValue = $this->SchEmail->CurrentValue;
        $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

        // appointment_type
        $this->appointment_type->EditCustomAttributes = "";
        $this->appointment_type->EditValue = $this->appointment_type->options(false);
        $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

        // Notified
        $this->Notified->EditCustomAttributes = "";
        $this->Notified->EditValue = $this->Notified->options(false);
        $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

        // Notes
        $this->Notes->EditAttrs["class"] = "form-control";
        $this->Notes->EditCustomAttributes = "";
        if (!$this->Notes->Raw) {
            $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
        }
        $this->Notes->EditValue = $this->Notes->CurrentValue;
        $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

        // paymentType
        $this->paymentType->EditAttrs["class"] = "form-control";
        $this->paymentType->EditCustomAttributes = "";
        if (!$this->paymentType->Raw) {
            $this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
        }
        $this->paymentType->EditValue = $this->paymentType->CurrentValue;
        $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

        // WhereDidYouHear
        $this->WhereDidYouHear->EditCustomAttributes = "";
        $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

        // createdBy

        // createdDateTime

        // PatientTypee
        $this->PatientTypee->EditAttrs["class"] = "form-control";
        $this->PatientTypee->EditCustomAttributes = "";
        $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

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
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Purpose);
                    $doc->exportCaption($this->PatientType);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->end_date);
                    $doc->exportCaption($this->DoctorID);
                    $doc->exportCaption($this->DoctorCode);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->AppointmentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->scheduler_id);
                    $doc->exportCaption($this->text);
                    $doc->exportCaption($this->appointment_status);
                    $doc->exportCaption($this->PId);
                    $doc->exportCaption($this->SchEmail);
                    $doc->exportCaption($this->appointment_type);
                    $doc->exportCaption($this->Notified);
                    $doc->exportCaption($this->Notes);
                    $doc->exportCaption($this->paymentType);
                    $doc->exportCaption($this->WhereDidYouHear);
                    $doc->exportCaption($this->createdBy);
                    $doc->exportCaption($this->createdDateTime);
                    $doc->exportCaption($this->PatientTypee);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->patientID);
                    $doc->exportCaption($this->patientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->Purpose);
                    $doc->exportCaption($this->PatientType);
                    $doc->exportCaption($this->Referal);
                    $doc->exportCaption($this->start_date);
                    $doc->exportCaption($this->DoctorName);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->end_date);
                    $doc->exportCaption($this->DoctorID);
                    $doc->exportCaption($this->DoctorCode);
                    $doc->exportCaption($this->Department);
                    $doc->exportCaption($this->AppointmentStatus);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->scheduler_id);
                    $doc->exportCaption($this->text);
                    $doc->exportCaption($this->appointment_status);
                    $doc->exportCaption($this->PId);
                    $doc->exportCaption($this->SchEmail);
                    $doc->exportCaption($this->appointment_type);
                    $doc->exportCaption($this->Notified);
                    $doc->exportCaption($this->Notes);
                    $doc->exportCaption($this->paymentType);
                    $doc->exportCaption($this->WhereDidYouHear);
                    $doc->exportCaption($this->createdBy);
                    $doc->exportCaption($this->createdDateTime);
                    $doc->exportCaption($this->PatientTypee);
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
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Purpose);
                        $doc->exportField($this->PatientType);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->end_date);
                        $doc->exportField($this->DoctorID);
                        $doc->exportField($this->DoctorCode);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->AppointmentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->scheduler_id);
                        $doc->exportField($this->text);
                        $doc->exportField($this->appointment_status);
                        $doc->exportField($this->PId);
                        $doc->exportField($this->SchEmail);
                        $doc->exportField($this->appointment_type);
                        $doc->exportField($this->Notified);
                        $doc->exportField($this->Notes);
                        $doc->exportField($this->paymentType);
                        $doc->exportField($this->WhereDidYouHear);
                        $doc->exportField($this->createdBy);
                        $doc->exportField($this->createdDateTime);
                        $doc->exportField($this->PatientTypee);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->patientID);
                        $doc->exportField($this->patientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->Purpose);
                        $doc->exportField($this->PatientType);
                        $doc->exportField($this->Referal);
                        $doc->exportField($this->start_date);
                        $doc->exportField($this->DoctorName);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->end_date);
                        $doc->exportField($this->DoctorID);
                        $doc->exportField($this->DoctorCode);
                        $doc->exportField($this->Department);
                        $doc->exportField($this->AppointmentStatus);
                        $doc->exportField($this->status);
                        $doc->exportField($this->scheduler_id);
                        $doc->exportField($this->text);
                        $doc->exportField($this->appointment_status);
                        $doc->exportField($this->PId);
                        $doc->exportField($this->SchEmail);
                        $doc->exportField($this->appointment_type);
                        $doc->exportField($this->Notified);
                        $doc->exportField($this->Notes);
                        $doc->exportField($this->paymentType);
                        $doc->exportField($this->WhereDidYouHear);
                        $doc->exportField($this->createdBy);
                        $doc->exportField($this->createdDateTime);
                        $doc->exportField($this->PatientTypee);
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
    public function rowDeleting(&$rs) {
    	// Enter your code here
    	// To cancel, set return value to False
    	$dbhelper = &DbHelper();
    	$sql = "SELECT * FROM ganeshkumar_bjhims.sms_cintent where SMSType='AppointmentCancellation' and HospID='".HospitalID()."'; ";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["Enabled"]=="Yes")
    	{
    		$Content = $results1[0]["Content"];
    		$patientName =  $rs["patientName"];
    		$mobileNumber = $rs["MobileNumber"];
    		$start_date = $rs["start_date"];

    		//$AppoinmentTime = date('l jS \of F Y', strtotime($start_date));
    		$AppoinmentTime = date('l jS \of F Y - h:i A', strtotime($start_date));
    		$Content = str_replace("###PatientName###",$patientName,$Content);
    		$message = str_replace("###AppointmentTime###",$AppoinmentTime,$Content);

    	//	$mobileNumber = "9176191908";
    		SendSMS($mobileNumber,$message);
    	}
    	return TRUE;
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
