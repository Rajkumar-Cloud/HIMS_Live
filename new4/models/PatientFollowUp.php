<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for patient_follow_up
 */
class PatientFollowUp extends DbTable
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
    public $PatID;
    public $PatientName;
    public $MobileNumber;
    public $mrnno;
    public $BP;
    public $Pulse;
    public $Resp;
    public $SPO2;
    public $FollowupAdvice;
    public $NextReviewDate;
    public $Age;
    public $Gender;
    public $profilePic;
    public $_Template;
    public $courseinhospital;
    public $procedurenotes;
    public $conditionatdischarge;
    public $Template1;
    public $Template2;
    public $Template3;
    public $HospID;
    public $Reception;
    public $PatientId;
    public $PatientSearch;
    public $DischargeAdviceMedicine;
    public $DischargeAdviceMedicineTemplate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'patient_follow_up';
        $this->TableName = 'patient_follow_up';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`patient_follow_up`";
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
        $this->id = new DbField('patient_follow_up', 'patient_follow_up', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // PatID
        $this->PatID = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatID', 'PatID', '`PatID`', '`PatID`', 200, 45, -1, false, '`PatID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatID->Sortable = true; // Allow sort
        $this->PatID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatID->Param, "CustomMsg");
        $this->Fields['PatID'] = &$this->PatID;

        // PatientName
        $this->PatientName = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // MobileNumber
        $this->MobileNumber = new DbField('patient_follow_up', 'patient_follow_up', 'x_MobileNumber', 'MobileNumber', '`MobileNumber`', '`MobileNumber`', 200, 45, -1, false, '`MobileNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MobileNumber->Sortable = true; // Allow sort
        $this->MobileNumber->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MobileNumber->Param, "CustomMsg");
        $this->Fields['MobileNumber'] = &$this->MobileNumber;

        // mrnno
        $this->mrnno = new DbField('patient_follow_up', 'patient_follow_up', 'x_mrnno', 'mrnno', '`mrnno`', '`mrnno`', 200, 45, -1, false, '`mrnno`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->mrnno->IsForeignKey = true; // Foreign key field
        $this->mrnno->Sortable = true; // Allow sort
        $this->mrnno->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->mrnno->Param, "CustomMsg");
        $this->Fields['mrnno'] = &$this->mrnno;

        // BP
        $this->BP = new DbField('patient_follow_up', 'patient_follow_up', 'x_BP', 'BP', '`BP`', '`BP`', 200, 45, -1, false, '`BP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BP->Sortable = true; // Allow sort
        $this->BP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->BP->Param, "CustomMsg");
        $this->Fields['BP'] = &$this->BP;

        // Pulse
        $this->Pulse = new DbField('patient_follow_up', 'patient_follow_up', 'x_Pulse', 'Pulse', '`Pulse`', '`Pulse`', 200, 45, -1, false, '`Pulse`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Pulse->Sortable = true; // Allow sort
        $this->Pulse->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pulse->Param, "CustomMsg");
        $this->Fields['Pulse'] = &$this->Pulse;

        // Resp
        $this->Resp = new DbField('patient_follow_up', 'patient_follow_up', 'x_Resp', 'Resp', '`Resp`', '`Resp`', 200, 45, -1, false, '`Resp`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Resp->Sortable = true; // Allow sort
        $this->Resp->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Resp->Param, "CustomMsg");
        $this->Fields['Resp'] = &$this->Resp;

        // SPO2
        $this->SPO2 = new DbField('patient_follow_up', 'patient_follow_up', 'x_SPO2', 'SPO2', '`SPO2`', '`SPO2`', 200, 45, -1, false, '`SPO2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SPO2->Sortable = true; // Allow sort
        $this->SPO2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->SPO2->Param, "CustomMsg");
        $this->Fields['SPO2'] = &$this->SPO2;

        // FollowupAdvice
        $this->FollowupAdvice = new DbField('patient_follow_up', 'patient_follow_up', 'x_FollowupAdvice', 'FollowupAdvice', '`FollowupAdvice`', '`FollowupAdvice`', 201, -1, -1, false, '`FollowupAdvice`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FollowupAdvice->Sortable = true; // Allow sort
        $this->FollowupAdvice->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FollowupAdvice->Param, "CustomMsg");
        $this->Fields['FollowupAdvice'] = &$this->FollowupAdvice;

        // NextReviewDate
        $this->NextReviewDate = new DbField('patient_follow_up', 'patient_follow_up', 'x_NextReviewDate', 'NextReviewDate', '`NextReviewDate`', CastDateFieldForLike("`NextReviewDate`", 7, "DB"), 135, 19, 7, false, '`NextReviewDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NextReviewDate->Sortable = true; // Allow sort
        $this->NextReviewDate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NextReviewDate->Param, "CustomMsg");
        $this->Fields['NextReviewDate'] = &$this->NextReviewDate;

        // Age
        $this->Age = new DbField('patient_follow_up', 'patient_follow_up', 'x_Age', 'Age', '`Age`', '`Age`', 200, 45, -1, false, '`Age`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Age->Sortable = true; // Allow sort
        $this->Age->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Age->Param, "CustomMsg");
        $this->Fields['Age'] = &$this->Age;

        // Gender
        $this->Gender = new DbField('patient_follow_up', 'patient_follow_up', 'x_Gender', 'Gender', '`Gender`', '`Gender`', 200, 45, -1, false, '`Gender`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Gender->Sortable = true; // Allow sort
        $this->Gender->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Gender->Param, "CustomMsg");
        $this->Fields['Gender'] = &$this->Gender;

        // profilePic
        $this->profilePic = new DbField('patient_follow_up', 'patient_follow_up', 'x_profilePic', 'profilePic', '`profilePic`', '`profilePic`', 201, 450, -1, false, '`profilePic`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->profilePic->Sortable = true; // Allow sort
        $this->profilePic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->profilePic->Param, "CustomMsg");
        $this->Fields['profilePic'] = &$this->profilePic;

        // Template
        $this->_Template = new DbField('patient_follow_up', 'patient_follow_up', 'x__Template', 'Template', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->_Template->IsCustom = true; // Custom field
        $this->_Template->Sortable = true; // Allow sort
        $this->_Template->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->_Template->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->_Template->Lookup = new Lookup('Template', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowupAdvice"], '', '');
        $this->_Template->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->_Template->Param, "CustomMsg");
        $this->Fields['Template'] = &$this->_Template;

        // courseinhospital
        $this->courseinhospital = new DbField('patient_follow_up', 'patient_follow_up', 'x_courseinhospital', 'courseinhospital', '`courseinhospital`', '`courseinhospital`', 201, -1, -1, false, '`courseinhospital`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->courseinhospital->Sortable = true; // Allow sort
        $this->courseinhospital->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->courseinhospital->Param, "CustomMsg");
        $this->Fields['courseinhospital'] = &$this->courseinhospital;

        // procedurenotes
        $this->procedurenotes = new DbField('patient_follow_up', 'patient_follow_up', 'x_procedurenotes', 'procedurenotes', '`procedurenotes`', '`procedurenotes`', 201, -1, -1, false, '`procedurenotes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->procedurenotes->Sortable = true; // Allow sort
        $this->procedurenotes->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->procedurenotes->Param, "CustomMsg");
        $this->Fields['procedurenotes'] = &$this->procedurenotes;

        // conditionatdischarge
        $this->conditionatdischarge = new DbField('patient_follow_up', 'patient_follow_up', 'x_conditionatdischarge', 'conditionatdischarge', '`conditionatdischarge`', '`conditionatdischarge`', 201, -1, -1, false, '`conditionatdischarge`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->conditionatdischarge->Sortable = true; // Allow sort
        $this->conditionatdischarge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->conditionatdischarge->Param, "CustomMsg");
        $this->Fields['conditionatdischarge'] = &$this->conditionatdischarge;

        // Template1
        $this->Template1 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template1', 'Template1', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Template1->IsCustom = true; // Custom field
        $this->Template1->Sortable = true; // Allow sort
        $this->Template1->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Template1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Template1->Lookup = new Lookup('Template1', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_courseinhospital"], '', '');
        $this->Template1->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Template1->Param, "CustomMsg");
        $this->Fields['Template1'] = &$this->Template1;

        // Template2
        $this->Template2 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template2', 'Template2', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Template2->IsCustom = true; // Custom field
        $this->Template2->Sortable = true; // Allow sort
        $this->Template2->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Template2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Template2->Lookup = new Lookup('Template2', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_procedurenotes"], '', '');
        $this->Template2->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Template2->Param, "CustomMsg");
        $this->Fields['Template2'] = &$this->Template2;

        // Template3
        $this->Template3 = new DbField('patient_follow_up', 'patient_follow_up', 'x_Template3', 'Template3', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->Template3->IsCustom = true; // Custom field
        $this->Template3->Sortable = true; // Allow sort
        $this->Template3->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->Template3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->Template3->Lookup = new Lookup('Template3', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_conditionatdischarge"], '', '');
        $this->Template3->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Template3->Param, "CustomMsg");
        $this->Fields['Template3'] = &$this->Template3;

        // HospID
        $this->HospID = new DbField('patient_follow_up', 'patient_follow_up', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // Reception
        $this->Reception = new DbField('patient_follow_up', 'patient_follow_up', 'x_Reception', 'Reception', '`Reception`', '`Reception`', 200, 45, -1, false, '`Reception`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Reception->IsForeignKey = true; // Foreign key field
        $this->Reception->Sortable = true; // Allow sort
        $this->Reception->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Reception->Param, "CustomMsg");
        $this->Fields['Reception'] = &$this->Reception;

        // PatientId
        $this->PatientId = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientId', 'PatientId', '`PatientId`', '`PatientId`', 200, 45, -1, false, '`PatientId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientId->IsForeignKey = true; // Foreign key field
        $this->PatientId->Sortable = true; // Allow sort
        $this->PatientId->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientId->Param, "CustomMsg");
        $this->Fields['PatientId'] = &$this->PatientId;

        // PatientSearch
        $this->PatientSearch = new DbField('patient_follow_up', 'patient_follow_up', 'x_PatientSearch', 'PatientSearch', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->PatientSearch->IsCustom = true; // Custom field
        $this->PatientSearch->Sortable = true; // Allow sort
        $this->PatientSearch->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->PatientSearch->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->PatientSearch->Lookup = new Lookup('PatientSearch', 'ip_admission', false, 'id', ["patient_id","patient_name","mrnNo","mobileno"], [], [], [], [], [], [], '`id` DESC', '');
        $this->PatientSearch->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientSearch->Param, "CustomMsg");
        $this->Fields['PatientSearch'] = &$this->PatientSearch;

        // DischargeAdviceMedicine
        $this->DischargeAdviceMedicine = new DbField('patient_follow_up', 'patient_follow_up', 'x_DischargeAdviceMedicine', 'DischargeAdviceMedicine', '`DischargeAdviceMedicine`', '`DischargeAdviceMedicine`', 201, -1, -1, false, '`DischargeAdviceMedicine`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DischargeAdviceMedicine->Sortable = true; // Allow sort
        $this->DischargeAdviceMedicine->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DischargeAdviceMedicine->Param, "CustomMsg");
        $this->Fields['DischargeAdviceMedicine'] = &$this->DischargeAdviceMedicine;

        // DischargeAdviceMedicineTemplate
        $this->DischargeAdviceMedicineTemplate = new DbField('patient_follow_up', 'patient_follow_up', 'x_DischargeAdviceMedicineTemplate', 'DischargeAdviceMedicineTemplate', '\'\'', '\'\'', 201, 65530, -1, false, '\'\'', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->DischargeAdviceMedicineTemplate->IsCustom = true; // Custom field
        $this->DischargeAdviceMedicineTemplate->Sortable = true; // Allow sort
        $this->DischargeAdviceMedicineTemplate->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->DischargeAdviceMedicineTemplate->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->DischargeAdviceMedicineTemplate->Lookup = new Lookup('DischargeAdviceMedicineTemplate', 'mas_user_template', false, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_DischargeAdviceMedicine"], '', '');
        $this->DischargeAdviceMedicineTemplate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DischargeAdviceMedicineTemplate->Param, "CustomMsg");
        $this->Fields['DischargeAdviceMedicineTemplate'] = &$this->DischargeAdviceMedicineTemplate;
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

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
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
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id`", $this->Reception->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`patient_id`", $this->PatientId->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $masterFilter .= " AND " . GetForeignKeySql("`mrnNo`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "ip_admission") {
            if ($this->Reception->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`Reception`", $this->Reception->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->PatientId->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`PatientId`", $this->PatientId->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
            if ($this->mrnno->getSessionValue() != "") {
                $detailFilter .= " AND " . GetForeignKeySql("`mrnno`", $this->mrnno->getSessionValue(), DATATYPE_STRING, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_ip_admission()
    {
        return "`id`=@id@ AND `patient_id`=@patient_id@ AND `mrnNo`='@mrnNo@'";
    }
    // Detail filter
    public function sqlDetailFilter_ip_admission()
    {
        return "`Reception`='@Reception@' AND `PatientId`='@PatientId@' AND `mrnno`='@mrnno@'";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`patient_follow_up`";
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
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*, '' AS `Template`, '' AS `Template1`, '' AS `Template2`, '' AS `Template3`, '' AS `PatientSearch`, '' AS `DischargeAdviceMedicineTemplate`");
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
        $this->PatID->DbValue = $row['PatID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->MobileNumber->DbValue = $row['MobileNumber'];
        $this->mrnno->DbValue = $row['mrnno'];
        $this->BP->DbValue = $row['BP'];
        $this->Pulse->DbValue = $row['Pulse'];
        $this->Resp->DbValue = $row['Resp'];
        $this->SPO2->DbValue = $row['SPO2'];
        $this->FollowupAdvice->DbValue = $row['FollowupAdvice'];
        $this->NextReviewDate->DbValue = $row['NextReviewDate'];
        $this->Age->DbValue = $row['Age'];
        $this->Gender->DbValue = $row['Gender'];
        $this->profilePic->DbValue = $row['profilePic'];
        $this->_Template->DbValue = $row['Template'];
        $this->courseinhospital->DbValue = $row['courseinhospital'];
        $this->procedurenotes->DbValue = $row['procedurenotes'];
        $this->conditionatdischarge->DbValue = $row['conditionatdischarge'];
        $this->Template1->DbValue = $row['Template1'];
        $this->Template2->DbValue = $row['Template2'];
        $this->Template3->DbValue = $row['Template3'];
        $this->HospID->DbValue = $row['HospID'];
        $this->Reception->DbValue = $row['Reception'];
        $this->PatientId->DbValue = $row['PatientId'];
        $this->PatientSearch->DbValue = $row['PatientSearch'];
        $this->DischargeAdviceMedicine->DbValue = $row['DischargeAdviceMedicine'];
        $this->DischargeAdviceMedicineTemplate->DbValue = $row['DischargeAdviceMedicineTemplate'];
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
        return $_SESSION[$name] ?? GetUrl("PatientFollowUpList");
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
        if ($pageName == "PatientFollowUpView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PatientFollowUpEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PatientFollowUpAdd") {
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
                return "PatientFollowUpView";
            case Config("API_ADD_ACTION"):
                return "PatientFollowUpAdd";
            case Config("API_EDIT_ACTION"):
                return "PatientFollowUpEdit";
            case Config("API_DELETE_ACTION"):
                return "PatientFollowUpDelete";
            case Config("API_LIST_ACTION"):
                return "PatientFollowUpList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PatientFollowUpList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PatientFollowUpView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PatientFollowUpView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PatientFollowUpAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PatientFollowUpAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PatientFollowUpEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("PatientFollowUpAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("PatientFollowUpDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "ip_admission" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id", $this->Reception->CurrentValue ?? $this->Reception->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_patient_id", $this->PatientId->CurrentValue ?? $this->PatientId->getSessionValue());
            $url .= "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnno->CurrentValue ?? $this->mrnno->getSessionValue());
        }
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BP->setDbValue($row['BP']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->Resp->setDbValue($row['Resp']);
        $this->SPO2->setDbValue($row['SPO2']);
        $this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->_Template->setDbValue($row['Template']);
        $this->courseinhospital->setDbValue($row['courseinhospital']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
        $this->Template1->setDbValue($row['Template1']);
        $this->Template2->setDbValue($row['Template2']);
        $this->Template3->setDbValue($row['Template3']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->DischargeAdviceMedicine->setDbValue($row['DischargeAdviceMedicine']);
        $this->DischargeAdviceMedicineTemplate->setDbValue($row['DischargeAdviceMedicineTemplate']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // PatID

        // PatientName

        // MobileNumber

        // mrnno

        // BP

        // Pulse

        // Resp

        // SPO2

        // FollowupAdvice

        // NextReviewDate

        // Age

        // Gender

        // profilePic

        // Template

        // courseinhospital

        // procedurenotes

        // conditionatdischarge

        // Template1

        // Template2

        // Template3

        // HospID

        // Reception

        // PatientId

        // PatientSearch

        // DischargeAdviceMedicine

        // DischargeAdviceMedicineTemplate

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // PatID
        $this->PatID->ViewValue = $this->PatID->CurrentValue;
        $this->PatID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // MobileNumber
        $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
        $this->MobileNumber->ViewCustomAttributes = "";

        // mrnno
        $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // BP
        $this->BP->ViewValue = $this->BP->CurrentValue;
        $this->BP->ViewCustomAttributes = "";

        // Pulse
        $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
        $this->Pulse->ViewCustomAttributes = "";

        // Resp
        $this->Resp->ViewValue = $this->Resp->CurrentValue;
        $this->Resp->ViewCustomAttributes = "";

        // SPO2
        $this->SPO2->ViewValue = $this->SPO2->CurrentValue;
        $this->SPO2->ViewCustomAttributes = "";

        // FollowupAdvice
        $this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
        $this->FollowupAdvice->ViewCustomAttributes = "";

        // NextReviewDate
        $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
        $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
        $this->NextReviewDate->ViewCustomAttributes = "";

        // Age
        $this->Age->ViewValue = $this->Age->CurrentValue;
        $this->Age->ViewCustomAttributes = "";

        // Gender
        $this->Gender->ViewValue = $this->Gender->CurrentValue;
        $this->Gender->ViewCustomAttributes = "";

        // profilePic
        $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
        $this->profilePic->ViewCustomAttributes = "";

        // Template
        $curVal = trim(strval($this->_Template->CurrentValue));
        if ($curVal != "") {
            $this->_Template->ViewValue = $this->_Template->lookupCacheOption($curVal);
            if ($this->_Template->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Follow up Advice'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->_Template->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->_Template->Lookup->renderViewRow($rswrk[0]);
                    $this->_Template->ViewValue = $this->_Template->displayValue($arwrk);
                } else {
                    $this->_Template->ViewValue = $this->_Template->CurrentValue;
                }
            }
        } else {
            $this->_Template->ViewValue = null;
        }
        $this->_Template->ViewCustomAttributes = "";

        // courseinhospital
        $this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
        $this->courseinhospital->ViewCustomAttributes = "";

        // procedurenotes
        $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->ViewCustomAttributes = "";

        // conditionatdischarge
        $this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
        $this->conditionatdischarge->ViewCustomAttributes = "";

        // Template1
        $curVal = trim(strval($this->Template1->CurrentValue));
        if ($curVal != "") {
            $this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
            if ($this->Template1->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Course In Hospital'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template1->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Template1->Lookup->renderViewRow($rswrk[0]);
                    $this->Template1->ViewValue = $this->Template1->displayValue($arwrk);
                } else {
                    $this->Template1->ViewValue = $this->Template1->CurrentValue;
                }
            }
        } else {
            $this->Template1->ViewValue = null;
        }
        $this->Template1->ViewCustomAttributes = "";

        // Template2
        $curVal = trim(strval($this->Template2->CurrentValue));
        if ($curVal != "") {
            $this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
            if ($this->Template2->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Procedure Notes'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template2->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Template2->Lookup->renderViewRow($rswrk[0]);
                    $this->Template2->ViewValue = $this->Template2->displayValue($arwrk);
                } else {
                    $this->Template2->ViewValue = $this->Template2->CurrentValue;
                }
            }
        } else {
            $this->Template2->ViewValue = null;
        }
        $this->Template2->ViewCustomAttributes = "";

        // Template3
        $curVal = trim(strval($this->Template3->CurrentValue));
        if ($curVal != "") {
            $this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
            if ($this->Template3->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Condition at Discharge'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template3->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Template3->Lookup->renderViewRow($rswrk[0]);
                    $this->Template3->ViewValue = $this->Template3->displayValue($arwrk);
                } else {
                    $this->Template3->ViewValue = $this->Template3->CurrentValue;
                }
            }
        } else {
            $this->Template3->ViewValue = null;
        }
        $this->Template3->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // Reception
        $this->Reception->ViewValue = $this->Reception->CurrentValue;
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

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

        // DischargeAdviceMedicine
        $this->DischargeAdviceMedicine->ViewValue = $this->DischargeAdviceMedicine->CurrentValue;
        $this->DischargeAdviceMedicine->ViewCustomAttributes = "";

        // DischargeAdviceMedicineTemplate
        $curVal = trim(strval($this->DischargeAdviceMedicineTemplate->CurrentValue));
        if ($curVal != "") {
            $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->lookupCacheOption($curVal);
            if ($this->DischargeAdviceMedicineTemplate->ViewValue === null) { // Lookup from database
                $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                $lookupFilter = function() {
                    return "`TemplateType`='Discharge Advice Medicine'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->DischargeAdviceMedicineTemplate->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DischargeAdviceMedicineTemplate->Lookup->renderViewRow($rswrk[0]);
                    $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->displayValue($arwrk);
                } else {
                    $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->CurrentValue;
                }
            }
        } else {
            $this->DischargeAdviceMedicineTemplate->ViewValue = null;
        }
        $this->DischargeAdviceMedicineTemplate->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // PatID
        $this->PatID->LinkCustomAttributes = "";
        $this->PatID->HrefValue = "";
        $this->PatID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // MobileNumber
        $this->MobileNumber->LinkCustomAttributes = "";
        $this->MobileNumber->HrefValue = "";
        $this->MobileNumber->TooltipValue = "";

        // mrnno
        $this->mrnno->LinkCustomAttributes = "";
        $this->mrnno->HrefValue = "";
        $this->mrnno->TooltipValue = "";

        // BP
        $this->BP->LinkCustomAttributes = "";
        $this->BP->HrefValue = "";
        $this->BP->TooltipValue = "";

        // Pulse
        $this->Pulse->LinkCustomAttributes = "";
        $this->Pulse->HrefValue = "";
        $this->Pulse->TooltipValue = "";

        // Resp
        $this->Resp->LinkCustomAttributes = "";
        $this->Resp->HrefValue = "";
        $this->Resp->TooltipValue = "";

        // SPO2
        $this->SPO2->LinkCustomAttributes = "";
        $this->SPO2->HrefValue = "";
        $this->SPO2->TooltipValue = "";

        // FollowupAdvice
        $this->FollowupAdvice->LinkCustomAttributes = "";
        $this->FollowupAdvice->HrefValue = "";
        $this->FollowupAdvice->TooltipValue = "";

        // NextReviewDate
        $this->NextReviewDate->LinkCustomAttributes = "";
        $this->NextReviewDate->HrefValue = "";
        $this->NextReviewDate->TooltipValue = "";

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

        // Template
        $this->_Template->LinkCustomAttributes = "";
        $this->_Template->HrefValue = "";
        $this->_Template->TooltipValue = "";

        // courseinhospital
        $this->courseinhospital->LinkCustomAttributes = "";
        $this->courseinhospital->HrefValue = "";
        $this->courseinhospital->TooltipValue = "";

        // procedurenotes
        $this->procedurenotes->LinkCustomAttributes = "";
        $this->procedurenotes->HrefValue = "";
        $this->procedurenotes->TooltipValue = "";

        // conditionatdischarge
        $this->conditionatdischarge->LinkCustomAttributes = "";
        $this->conditionatdischarge->HrefValue = "";
        $this->conditionatdischarge->TooltipValue = "";

        // Template1
        $this->Template1->LinkCustomAttributes = "";
        $this->Template1->HrefValue = "";
        $this->Template1->TooltipValue = "";

        // Template2
        $this->Template2->LinkCustomAttributes = "";
        $this->Template2->HrefValue = "";
        $this->Template2->TooltipValue = "";

        // Template3
        $this->Template3->LinkCustomAttributes = "";
        $this->Template3->HrefValue = "";
        $this->Template3->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // Reception
        $this->Reception->LinkCustomAttributes = "";
        $this->Reception->HrefValue = "";
        $this->Reception->TooltipValue = "";

        // PatientId
        $this->PatientId->LinkCustomAttributes = "";
        $this->PatientId->HrefValue = "";
        $this->PatientId->TooltipValue = "";

        // PatientSearch
        $this->PatientSearch->LinkCustomAttributes = "";
        $this->PatientSearch->HrefValue = "";
        $this->PatientSearch->TooltipValue = "";

        // DischargeAdviceMedicine
        $this->DischargeAdviceMedicine->LinkCustomAttributes = "";
        $this->DischargeAdviceMedicine->HrefValue = "";
        $this->DischargeAdviceMedicine->TooltipValue = "";

        // DischargeAdviceMedicineTemplate
        $this->DischargeAdviceMedicineTemplate->LinkCustomAttributes = "";
        $this->DischargeAdviceMedicineTemplate->HrefValue = "";
        $this->DischargeAdviceMedicineTemplate->TooltipValue = "";

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

        // PatID
        $this->PatID->EditAttrs["class"] = "form-control";
        $this->PatID->EditCustomAttributes = "";
        if (!$this->PatID->Raw) {
            $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
        }
        $this->PatID->EditValue = $this->PatID->CurrentValue;
        $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

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

        // mrnno
        $this->mrnno->EditAttrs["class"] = "form-control";
        $this->mrnno->EditCustomAttributes = "";
        $this->mrnno->EditValue = $this->mrnno->CurrentValue;
        $this->mrnno->ViewCustomAttributes = "";

        // BP
        $this->BP->EditAttrs["class"] = "form-control";
        $this->BP->EditCustomAttributes = "";
        if (!$this->BP->Raw) {
            $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
        }
        $this->BP->EditValue = $this->BP->CurrentValue;
        $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

        // Pulse
        $this->Pulse->EditAttrs["class"] = "form-control";
        $this->Pulse->EditCustomAttributes = "";
        if (!$this->Pulse->Raw) {
            $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
        }
        $this->Pulse->EditValue = $this->Pulse->CurrentValue;
        $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

        // Resp
        $this->Resp->EditAttrs["class"] = "form-control";
        $this->Resp->EditCustomAttributes = "";
        if (!$this->Resp->Raw) {
            $this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
        }
        $this->Resp->EditValue = $this->Resp->CurrentValue;
        $this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

        // SPO2
        $this->SPO2->EditAttrs["class"] = "form-control";
        $this->SPO2->EditCustomAttributes = "";
        if (!$this->SPO2->Raw) {
            $this->SPO2->CurrentValue = HtmlDecode($this->SPO2->CurrentValue);
        }
        $this->SPO2->EditValue = $this->SPO2->CurrentValue;
        $this->SPO2->PlaceHolder = RemoveHtml($this->SPO2->caption());

        // FollowupAdvice
        $this->FollowupAdvice->EditAttrs["class"] = "form-control";
        $this->FollowupAdvice->EditCustomAttributes = "";
        $this->FollowupAdvice->EditValue = $this->FollowupAdvice->CurrentValue;
        $this->FollowupAdvice->PlaceHolder = RemoveHtml($this->FollowupAdvice->caption());

        // NextReviewDate
        $this->NextReviewDate->EditAttrs["class"] = "form-control";
        $this->NextReviewDate->EditCustomAttributes = "";
        $this->NextReviewDate->EditValue = FormatDateTime($this->NextReviewDate->CurrentValue, 7);
        $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

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

        // Template
        $this->_Template->EditAttrs["class"] = "form-control";
        $this->_Template->EditCustomAttributes = "";
        $this->_Template->PlaceHolder = RemoveHtml($this->_Template->caption());

        // courseinhospital
        $this->courseinhospital->EditAttrs["class"] = "form-control";
        $this->courseinhospital->EditCustomAttributes = "";
        $this->courseinhospital->EditValue = $this->courseinhospital->CurrentValue;
        $this->courseinhospital->PlaceHolder = RemoveHtml($this->courseinhospital->caption());

        // procedurenotes
        $this->procedurenotes->EditAttrs["class"] = "form-control";
        $this->procedurenotes->EditCustomAttributes = "";
        $this->procedurenotes->EditValue = $this->procedurenotes->CurrentValue;
        $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

        // conditionatdischarge
        $this->conditionatdischarge->EditAttrs["class"] = "form-control";
        $this->conditionatdischarge->EditCustomAttributes = "";
        $this->conditionatdischarge->EditValue = $this->conditionatdischarge->CurrentValue;
        $this->conditionatdischarge->PlaceHolder = RemoveHtml($this->conditionatdischarge->caption());

        // Template1
        $this->Template1->EditAttrs["class"] = "form-control";
        $this->Template1->EditCustomAttributes = "";
        $this->Template1->PlaceHolder = RemoveHtml($this->Template1->caption());

        // Template2
        $this->Template2->EditAttrs["class"] = "form-control";
        $this->Template2->EditCustomAttributes = "";
        $this->Template2->PlaceHolder = RemoveHtml($this->Template2->caption());

        // Template3
        $this->Template3->EditAttrs["class"] = "form-control";
        $this->Template3->EditCustomAttributes = "";
        $this->Template3->PlaceHolder = RemoveHtml($this->Template3->caption());

        // HospID

        // Reception
        $this->Reception->EditAttrs["class"] = "form-control";
        $this->Reception->EditCustomAttributes = "";
        $this->Reception->EditValue = $this->Reception->CurrentValue;
        $this->Reception->ViewCustomAttributes = "";

        // PatientId
        $this->PatientId->EditAttrs["class"] = "form-control";
        $this->PatientId->EditCustomAttributes = "";
        $this->PatientId->EditValue = $this->PatientId->CurrentValue;
        $this->PatientId->ViewCustomAttributes = "";

        // PatientSearch
        $this->PatientSearch->EditAttrs["class"] = "form-control";
        $this->PatientSearch->EditCustomAttributes = "";
        $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

        // DischargeAdviceMedicine
        $this->DischargeAdviceMedicine->EditAttrs["class"] = "form-control";
        $this->DischargeAdviceMedicine->EditCustomAttributes = "";
        $this->DischargeAdviceMedicine->EditValue = $this->DischargeAdviceMedicine->CurrentValue;
        $this->DischargeAdviceMedicine->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicine->caption());

        // DischargeAdviceMedicineTemplate
        $this->DischargeAdviceMedicineTemplate->EditAttrs["class"] = "form-control";
        $this->DischargeAdviceMedicineTemplate->EditCustomAttributes = "";
        $this->DischargeAdviceMedicineTemplate->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicineTemplate->caption());

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
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->Resp);
                    $doc->exportCaption($this->SPO2);
                    $doc->exportCaption($this->FollowupAdvice);
                    $doc->exportCaption($this->NextReviewDate);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->profilePic);
                    $doc->exportCaption($this->_Template);
                    $doc->exportCaption($this->courseinhospital);
                    $doc->exportCaption($this->procedurenotes);
                    $doc->exportCaption($this->conditionatdischarge);
                    $doc->exportCaption($this->Template1);
                    $doc->exportCaption($this->Template2);
                    $doc->exportCaption($this->Template3);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientId);
                    $doc->exportCaption($this->PatientSearch);
                    $doc->exportCaption($this->DischargeAdviceMedicine);
                    $doc->exportCaption($this->DischargeAdviceMedicineTemplate);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->PatID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->MobileNumber);
                    $doc->exportCaption($this->mrnno);
                    $doc->exportCaption($this->BP);
                    $doc->exportCaption($this->Pulse);
                    $doc->exportCaption($this->Resp);
                    $doc->exportCaption($this->SPO2);
                    $doc->exportCaption($this->NextReviewDate);
                    $doc->exportCaption($this->Age);
                    $doc->exportCaption($this->Gender);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->Reception);
                    $doc->exportCaption($this->PatientId);
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
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->Resp);
                        $doc->exportField($this->SPO2);
                        $doc->exportField($this->FollowupAdvice);
                        $doc->exportField($this->NextReviewDate);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->profilePic);
                        $doc->exportField($this->_Template);
                        $doc->exportField($this->courseinhospital);
                        $doc->exportField($this->procedurenotes);
                        $doc->exportField($this->conditionatdischarge);
                        $doc->exportField($this->Template1);
                        $doc->exportField($this->Template2);
                        $doc->exportField($this->Template3);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientId);
                        $doc->exportField($this->PatientSearch);
                        $doc->exportField($this->DischargeAdviceMedicine);
                        $doc->exportField($this->DischargeAdviceMedicineTemplate);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->PatID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->MobileNumber);
                        $doc->exportField($this->mrnno);
                        $doc->exportField($this->BP);
                        $doc->exportField($this->Pulse);
                        $doc->exportField($this->Resp);
                        $doc->exportField($this->SPO2);
                        $doc->exportField($this->NextReviewDate);
                        $doc->exportField($this->Age);
                        $doc->exportField($this->Gender);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->Reception);
                        $doc->exportField($this->PatientId);
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
    			if($rsnew["PatID"]=="")
    		{
    				$dbhelper = &DbHelper();
    				$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$rsnew["PatientId"]."'; ";
    				$results2 = $dbhelper->ExecuteRows($sql);
    				$rsnew["PatientName"] = $results2[0]["first_name"];
    				$rsnew["Age"] = $results2[0]["Age"];
    				$rsnew["Gender"] = $results2[0]["gender"];
    				$rsnew["profilePic"] = $results2[0]["profilePic"];
    				$rsnew["PatID"] = $results2[0]["PatientID"];
    				$rsnew["MobileNumber"] = $results2[0]["mobile_no"];
    		}
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
