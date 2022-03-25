<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for view_template_for_et
 */
class ViewTemplateForEt extends DbTable
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
    public $HospID;
    public $PatientName;
    public $PatientID;
    public $PartnerName;
    public $PartnerID;
    public $RIDNO;
    public $Treatment;
    public $Ectopic;
    public $OPUDATE;
    public $ERA;
    public $PatientAge;
    public $PartnerAge;
    public $FRESHETFETFRESHODETODFETFRESHDETFROZENDET;
    public $AFTERHYSTEROSCOPY;
    public $AFTERERA;
    public $HRT;
    public $XGRASTPRP;
    public $EMBRYODETAILSDAY35ABC;
    public $LMWH40MG;
    public $hCG;
    public $Implantationrate;
    public $Typeofpreg;
    public $MISCARRIAGEEARLYLATE;
    public $ANC;
    public $NICUADMISSION;
    public $anomalies;
    public $babywt;
    public $GAatdelivery;
    public $Pregnancyoutcome;
    public $DELIVEREDHOSPITAL;
    public $DOCTOR;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'view_template_for_et';
        $this->TableName = 'view_template_for_et';
        $this->TableType = 'VIEW';

        // Update Table
        $this->UpdateTable = "`view_template_for_et`";
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
        $this->id = new DbField('view_template_for_et', 'view_template_for_et', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id->Param, "CustomMsg");
        $this->Fields['id'] = &$this->id;

        // HospID
        $this->HospID = new DbField('view_template_for_et', 'view_template_for_et', 'x_HospID', 'HospID', '`HospID`', '`HospID`', 3, 11, -1, false, '`HospID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HospID->Sortable = true; // Allow sort
        $this->HospID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->HospID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HospID->Param, "CustomMsg");
        $this->Fields['HospID'] = &$this->HospID;

        // PatientName
        $this->PatientName = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientName', 'PatientName', '`PatientName`', '`PatientName`', 200, 45, -1, false, '`PatientName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientName->Sortable = true; // Allow sort
        $this->PatientName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientName->Param, "CustomMsg");
        $this->Fields['PatientName'] = &$this->PatientName;

        // PatientID
        $this->PatientID = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientID', 'PatientID', '`PatientID`', '`PatientID`', 200, 45, -1, false, '`PatientID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientID->Sortable = true; // Allow sort
        $this->PatientID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientID->Param, "CustomMsg");
        $this->Fields['PatientID'] = &$this->PatientID;

        // PartnerName
        $this->PartnerName = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerName', 'PartnerName', '`PartnerName`', '`PartnerName`', 200, 45, -1, false, '`PartnerName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerName->Sortable = true; // Allow sort
        $this->PartnerName->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerName->Param, "CustomMsg");
        $this->Fields['PartnerName'] = &$this->PartnerName;

        // PartnerID
        $this->PartnerID = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerID', 'PartnerID', '`PartnerID`', '`PartnerID`', 200, 45, -1, false, '`PartnerID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerID->Sortable = true; // Allow sort
        $this->PartnerID->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerID->Param, "CustomMsg");
        $this->Fields['PartnerID'] = &$this->PartnerID;

        // RIDNO
        $this->RIDNO = new DbField('view_template_for_et', 'view_template_for_et', 'x_RIDNO', 'RIDNO', '`RIDNO`', '`RIDNO`', 3, 11, -1, false, '`RIDNO`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNO->Sortable = true; // Allow sort
        $this->RIDNO->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->RIDNO->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->RIDNO->Param, "CustomMsg");
        $this->Fields['RIDNO'] = &$this->RIDNO;

        // Treatment
        $this->Treatment = new DbField('view_template_for_et', 'view_template_for_et', 'x_Treatment', 'Treatment', '`Treatment`', '`Treatment`', 200, 45, -1, false, '`Treatment`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Treatment->Sortable = true; // Allow sort
        $this->Treatment->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Treatment->Param, "CustomMsg");
        $this->Fields['Treatment'] = &$this->Treatment;

        // Ectopic
        $this->Ectopic = new DbField('view_template_for_et', 'view_template_for_et', 'x_Ectopic', 'Ectopic', '`Ectopic`', '`Ectopic`', 201, 65530, -1, false, '`Ectopic`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Ectopic->Nullable = false; // NOT NULL field
        $this->Ectopic->Required = true; // Required field
        $this->Ectopic->Sortable = true; // Allow sort
        $this->Ectopic->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Ectopic->Param, "CustomMsg");
        $this->Fields['Ectopic'] = &$this->Ectopic;

        // OPUDATE
        $this->OPUDATE = new DbField('view_template_for_et', 'view_template_for_et', 'x_OPUDATE', 'OPUDATE', '`OPUDATE`', CastDateFieldForLike("`OPUDATE`", 0, "DB"), 135, 19, 0, false, '`OPUDATE`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OPUDATE->Sortable = true; // Allow sort
        $this->OPUDATE->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->OPUDATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->OPUDATE->Param, "CustomMsg");
        $this->Fields['OPUDATE'] = &$this->OPUDATE;

        // ERA
        $this->ERA = new DbField('view_template_for_et', 'view_template_for_et', 'x_ERA', 'ERA', '`ERA`', '`ERA`', 201, 65530, -1, false, '`ERA`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ERA->Nullable = false; // NOT NULL field
        $this->ERA->Required = true; // Required field
        $this->ERA->Sortable = true; // Allow sort
        $this->ERA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ERA->Param, "CustomMsg");
        $this->Fields['ERA'] = &$this->ERA;

        // PatientAge
        $this->PatientAge = new DbField('view_template_for_et', 'view_template_for_et', 'x_PatientAge', 'PatientAge', '`PatientAge`', '`PatientAge`', 200, 45, -1, false, '`PatientAge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PatientAge->Sortable = true; // Allow sort
        $this->PatientAge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PatientAge->Param, "CustomMsg");
        $this->Fields['PatientAge'] = &$this->PatientAge;

        // PartnerAge
        $this->PartnerAge = new DbField('view_template_for_et', 'view_template_for_et', 'x_PartnerAge', 'PartnerAge', '`PartnerAge`', '`PartnerAge`', 200, 45, -1, false, '`PartnerAge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PartnerAge->Sortable = true; // Allow sort
        $this->PartnerAge->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->PartnerAge->Param, "CustomMsg");
        $this->Fields['PartnerAge'] = &$this->PartnerAge;

        // FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET = new DbField('view_template_for_et', 'view_template_for_et', 'x_FRESHETFETFRESHODETODFETFRESHDETFROZENDET', 'FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET', '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', 201, 65530, -1, false, '`FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->Nullable = false; // NOT NULL field
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->Required = true; // Required field
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->Sortable = true; // Allow sort
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->Param, "CustomMsg");
        $this->Fields['FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET'] = &$this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET;

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY = new DbField('view_template_for_et', 'view_template_for_et', 'x_AFTERHYSTEROSCOPY', 'AFTER HYSTEROSCOPY', '`AFTER HYSTEROSCOPY`', '`AFTER HYSTEROSCOPY`', 201, 65530, -1, false, '`AFTER HYSTEROSCOPY`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERHYSTEROSCOPY->Nullable = false; // NOT NULL field
        $this->AFTERHYSTEROSCOPY->Required = true; // Required field
        $this->AFTERHYSTEROSCOPY->Sortable = true; // Allow sort
        $this->AFTERHYSTEROSCOPY->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERHYSTEROSCOPY->Param, "CustomMsg");
        $this->Fields['AFTER HYSTEROSCOPY'] = &$this->AFTERHYSTEROSCOPY;

        // AFTER ERA
        $this->AFTERERA = new DbField('view_template_for_et', 'view_template_for_et', 'x_AFTERERA', 'AFTER ERA', '`AFTER ERA`', '`AFTER ERA`', 201, 65530, -1, false, '`AFTER ERA`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->AFTERERA->Nullable = false; // NOT NULL field
        $this->AFTERERA->Required = true; // Required field
        $this->AFTERERA->Sortable = true; // Allow sort
        $this->AFTERERA->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->AFTERERA->Param, "CustomMsg");
        $this->Fields['AFTER ERA'] = &$this->AFTERERA;

        // HRT
        $this->HRT = new DbField('view_template_for_et', 'view_template_for_et', 'x_HRT', 'HRT', '`HRT`', '`HRT`', 201, 65530, -1, false, '`HRT`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->HRT->Nullable = false; // NOT NULL field
        $this->HRT->Required = true; // Required field
        $this->HRT->Sortable = true; // Allow sort
        $this->HRT->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->HRT->Param, "CustomMsg");
        $this->Fields['HRT'] = &$this->HRT;

        // XGRAST/PRP
        $this->XGRASTPRP = new DbField('view_template_for_et', 'view_template_for_et', 'x_XGRASTPRP', 'XGRAST/PRP', '`XGRAST/PRP`', '`XGRAST/PRP`', 201, 65530, -1, false, '`XGRAST/PRP`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->XGRASTPRP->Nullable = false; // NOT NULL field
        $this->XGRASTPRP->Required = true; // Required field
        $this->XGRASTPRP->Sortable = true; // Allow sort
        $this->XGRASTPRP->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->XGRASTPRP->Param, "CustomMsg");
        $this->Fields['XGRAST/PRP'] = &$this->XGRASTPRP;

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC = new DbField('view_template_for_et', 'view_template_for_et', 'x_EMBRYODETAILSDAY35ABC', 'EMBRYO DETAILS DAY 3/ 5, A, B, C', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', 201, 65530, -1, false, '`EMBRYO DETAILS DAY 3/ 5, A, B, C`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->EMBRYODETAILSDAY35ABC->Nullable = false; // NOT NULL field
        $this->EMBRYODETAILSDAY35ABC->Required = true; // Required field
        $this->EMBRYODETAILSDAY35ABC->Sortable = true; // Allow sort
        $this->EMBRYODETAILSDAY35ABC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->EMBRYODETAILSDAY35ABC->Param, "CustomMsg");
        $this->Fields['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = &$this->EMBRYODETAILSDAY35ABC;

        // LMWH 40MG
        $this->LMWH40MG = new DbField('view_template_for_et', 'view_template_for_et', 'x_LMWH40MG', 'LMWH 40MG', '`LMWH 40MG`', '`LMWH 40MG`', 201, 65530, -1, false, '`LMWH 40MG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LMWH40MG->Nullable = false; // NOT NULL field
        $this->LMWH40MG->Required = true; // Required field
        $this->LMWH40MG->Sortable = true; // Allow sort
        $this->LMWH40MG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->LMWH40MG->Param, "CustomMsg");
        $this->Fields['LMWH 40MG'] = &$this->LMWH40MG;

        // ß-hCG
        $this->hCG = new DbField('view_template_for_et', 'view_template_for_et', 'x_hCG', 'ß-hCG', '`ß-hCG`', '`ß-hCG`', 201, 65530, -1, false, '`ß-hCG`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->hCG->Nullable = false; // NOT NULL field
        $this->hCG->Required = true; // Required field
        $this->hCG->Sortable = true; // Allow sort
        $this->hCG->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->hCG->Param, "CustomMsg");
        $this->Fields['ß-hCG'] = &$this->hCG;

        // Implantation rate
        $this->Implantationrate = new DbField('view_template_for_et', 'view_template_for_et', 'x_Implantationrate', 'Implantation rate', '`Implantation rate`', '`Implantation rate`', 201, 65530, -1, false, '`Implantation rate`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Implantationrate->Nullable = false; // NOT NULL field
        $this->Implantationrate->Required = true; // Required field
        $this->Implantationrate->Sortable = true; // Allow sort
        $this->Implantationrate->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Implantationrate->Param, "CustomMsg");
        $this->Fields['Implantation rate'] = &$this->Implantationrate;

        // Type of preg
        $this->Typeofpreg = new DbField('view_template_for_et', 'view_template_for_et', 'x_Typeofpreg', 'Type of preg', '`Type of preg`', '`Type of preg`', 201, 65530, -1, false, '`Type of preg`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Typeofpreg->Nullable = false; // NOT NULL field
        $this->Typeofpreg->Required = true; // Required field
        $this->Typeofpreg->Sortable = true; // Allow sort
        $this->Typeofpreg->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Typeofpreg->Param, "CustomMsg");
        $this->Fields['Type of preg'] = &$this->Typeofpreg;

        // MISCARRIAGE EARLY / LATE
        $this->MISCARRIAGEEARLYLATE = new DbField('view_template_for_et', 'view_template_for_et', 'x_MISCARRIAGEEARLYLATE', 'MISCARRIAGE EARLY / LATE', '`MISCARRIAGE EARLY / LATE`', '`MISCARRIAGE EARLY / LATE`', 201, 65530, -1, false, '`MISCARRIAGE EARLY / LATE`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MISCARRIAGEEARLYLATE->Nullable = false; // NOT NULL field
        $this->MISCARRIAGEEARLYLATE->Required = true; // Required field
        $this->MISCARRIAGEEARLYLATE->Sortable = true; // Allow sort
        $this->MISCARRIAGEEARLYLATE->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->MISCARRIAGEEARLYLATE->Param, "CustomMsg");
        $this->Fields['MISCARRIAGE EARLY / LATE'] = &$this->MISCARRIAGEEARLYLATE;

        // ANC
        $this->ANC = new DbField('view_template_for_et', 'view_template_for_et', 'x_ANC', 'ANC', '`ANC`', '`ANC`', 201, 65530, -1, false, '`ANC`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->ANC->Nullable = false; // NOT NULL field
        $this->ANC->Required = true; // Required field
        $this->ANC->Sortable = true; // Allow sort
        $this->ANC->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->ANC->Param, "CustomMsg");
        $this->Fields['ANC'] = &$this->ANC;

        // NICU ADMISSION
        $this->NICUADMISSION = new DbField('view_template_for_et', 'view_template_for_et', 'x_NICUADMISSION', 'NICU ADMISSION', '`NICU ADMISSION`', '`NICU ADMISSION`', 201, 65530, -1, false, '`NICU ADMISSION`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->NICUADMISSION->Nullable = false; // NOT NULL field
        $this->NICUADMISSION->Required = true; // Required field
        $this->NICUADMISSION->Sortable = true; // Allow sort
        $this->NICUADMISSION->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->NICUADMISSION->Param, "CustomMsg");
        $this->Fields['NICU ADMISSION'] = &$this->NICUADMISSION;

        // anomalies
        $this->anomalies = new DbField('view_template_for_et', 'view_template_for_et', 'x_anomalies', 'anomalies', '`anomalies`', '`anomalies`', 201, 65530, -1, false, '`anomalies`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->anomalies->Nullable = false; // NOT NULL field
        $this->anomalies->Required = true; // Required field
        $this->anomalies->Sortable = true; // Allow sort
        $this->anomalies->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->anomalies->Param, "CustomMsg");
        $this->Fields['anomalies'] = &$this->anomalies;

        // baby wt
        $this->babywt = new DbField('view_template_for_et', 'view_template_for_et', 'x_babywt', 'baby wt', '`baby wt`', '`baby wt`', 201, 65530, -1, false, '`baby wt`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->babywt->Nullable = false; // NOT NULL field
        $this->babywt->Required = true; // Required field
        $this->babywt->Sortable = true; // Allow sort
        $this->babywt->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->babywt->Param, "CustomMsg");
        $this->Fields['baby wt'] = &$this->babywt;

        // GA at delivery
        $this->GAatdelivery = new DbField('view_template_for_et', 'view_template_for_et', 'x_GAatdelivery', 'GA at delivery', '`GA at delivery`', '`GA at delivery`', 201, 65530, -1, false, '`GA at delivery`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->GAatdelivery->Nullable = false; // NOT NULL field
        $this->GAatdelivery->Required = true; // Required field
        $this->GAatdelivery->Sortable = true; // Allow sort
        $this->GAatdelivery->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->GAatdelivery->Param, "CustomMsg");
        $this->Fields['GA at delivery'] = &$this->GAatdelivery;

        // Pregnancy outcome
        $this->Pregnancyoutcome = new DbField('view_template_for_et', 'view_template_for_et', 'x_Pregnancyoutcome', 'Pregnancy outcome', '`Pregnancy outcome`', '`Pregnancy outcome`', 201, 65530, -1, false, '`Pregnancy outcome`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->Pregnancyoutcome->Nullable = false; // NOT NULL field
        $this->Pregnancyoutcome->Required = true; // Required field
        $this->Pregnancyoutcome->Sortable = true; // Allow sort
        $this->Pregnancyoutcome->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->Pregnancyoutcome->Param, "CustomMsg");
        $this->Fields['Pregnancy outcome'] = &$this->Pregnancyoutcome;

        // DELIVERED HOSPITAL
        $this->DELIVEREDHOSPITAL = new DbField('view_template_for_et', 'view_template_for_et', 'x_DELIVEREDHOSPITAL', 'DELIVERED HOSPITAL', '`DELIVERED HOSPITAL`', '`DELIVERED HOSPITAL`', 201, 65530, -1, false, '`DELIVERED HOSPITAL`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DELIVEREDHOSPITAL->Nullable = false; // NOT NULL field
        $this->DELIVEREDHOSPITAL->Required = true; // Required field
        $this->DELIVEREDHOSPITAL->Sortable = true; // Allow sort
        $this->DELIVEREDHOSPITAL->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DELIVEREDHOSPITAL->Param, "CustomMsg");
        $this->Fields['DELIVERED HOSPITAL'] = &$this->DELIVEREDHOSPITAL;

        // DOCTOR
        $this->DOCTOR = new DbField('view_template_for_et', 'view_template_for_et', 'x_DOCTOR', 'DOCTOR', '`DOCTOR`', '`DOCTOR`', 201, 65530, -1, false, '`DOCTOR`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->DOCTOR->Nullable = false; // NOT NULL field
        $this->DOCTOR->Required = true; // Required field
        $this->DOCTOR->Sortable = true; // Allow sort
        $this->DOCTOR->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->DOCTOR->Param, "CustomMsg");
        $this->Fields['DOCTOR'] = &$this->DOCTOR;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`view_template_for_et`";
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
        $this->HospID->DbValue = $row['HospID'];
        $this->PatientName->DbValue = $row['PatientName'];
        $this->PatientID->DbValue = $row['PatientID'];
        $this->PartnerName->DbValue = $row['PartnerName'];
        $this->PartnerID->DbValue = $row['PartnerID'];
        $this->RIDNO->DbValue = $row['RIDNO'];
        $this->Treatment->DbValue = $row['Treatment'];
        $this->Ectopic->DbValue = $row['Ectopic'];
        $this->OPUDATE->DbValue = $row['OPUDATE'];
        $this->ERA->DbValue = $row['ERA'];
        $this->PatientAge->DbValue = $row['PatientAge'];
        $this->PartnerAge->DbValue = $row['PartnerAge'];
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->DbValue = $row['FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET'];
        $this->AFTERHYSTEROSCOPY->DbValue = $row['AFTER HYSTEROSCOPY'];
        $this->AFTERERA->DbValue = $row['AFTER ERA'];
        $this->HRT->DbValue = $row['HRT'];
        $this->XGRASTPRP->DbValue = $row['XGRAST/PRP'];
        $this->EMBRYODETAILSDAY35ABC->DbValue = $row['EMBRYO DETAILS DAY 3/ 5, A, B, C'];
        $this->LMWH40MG->DbValue = $row['LMWH 40MG'];
        $this->hCG->DbValue = $row['ß-hCG'];
        $this->Implantationrate->DbValue = $row['Implantation rate'];
        $this->Typeofpreg->DbValue = $row['Type of preg'];
        $this->MISCARRIAGEEARLYLATE->DbValue = $row['MISCARRIAGE EARLY / LATE'];
        $this->ANC->DbValue = $row['ANC'];
        $this->NICUADMISSION->DbValue = $row['NICU ADMISSION'];
        $this->anomalies->DbValue = $row['anomalies'];
        $this->babywt->DbValue = $row['baby wt'];
        $this->GAatdelivery->DbValue = $row['GA at delivery'];
        $this->Pregnancyoutcome->DbValue = $row['Pregnancy outcome'];
        $this->DELIVEREDHOSPITAL->DbValue = $row['DELIVERED HOSPITAL'];
        $this->DOCTOR->DbValue = $row['DOCTOR'];
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
        return $_SESSION[$name] ?? GetUrl("ViewTemplateForEtList");
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
        if ($pageName == "ViewTemplateForEtView") {
            return $Language->phrase("View");
        } elseif ($pageName == "ViewTemplateForEtEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "ViewTemplateForEtAdd") {
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
                return "ViewTemplateForEtView";
            case Config("API_ADD_ACTION"):
                return "ViewTemplateForEtAdd";
            case Config("API_EDIT_ACTION"):
                return "ViewTemplateForEtEdit";
            case Config("API_DELETE_ACTION"):
                return "ViewTemplateForEtDelete";
            case Config("API_LIST_ACTION"):
                return "ViewTemplateForEtList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "ViewTemplateForEtList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("ViewTemplateForEtView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("ViewTemplateForEtView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "ViewTemplateForEtAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "ViewTemplateForEtAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("ViewTemplateForEtEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("ViewTemplateForEtAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("ViewTemplateForEtDelete", $this->getUrlParm());
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
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->OPUDATE->setDbValue($row['OPUDATE']);
        $this->ERA->setDbValue($row['ERA']);
        $this->PatientAge->setDbValue($row['PatientAge']);
        $this->PartnerAge->setDbValue($row['PartnerAge']);
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->setDbValue($row['FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET']);
        $this->AFTERHYSTEROSCOPY->setDbValue($row['AFTER HYSTEROSCOPY']);
        $this->AFTERERA->setDbValue($row['AFTER ERA']);
        $this->HRT->setDbValue($row['HRT']);
        $this->XGRASTPRP->setDbValue($row['XGRAST/PRP']);
        $this->EMBRYODETAILSDAY35ABC->setDbValue($row['EMBRYO DETAILS DAY 3/ 5, A, B, C']);
        $this->LMWH40MG->setDbValue($row['LMWH 40MG']);
        $this->hCG->setDbValue($row['ß-hCG']);
        $this->Implantationrate->setDbValue($row['Implantation rate']);
        $this->Typeofpreg->setDbValue($row['Type of preg']);
        $this->MISCARRIAGEEARLYLATE->setDbValue($row['MISCARRIAGE EARLY / LATE']);
        $this->ANC->setDbValue($row['ANC']);
        $this->NICUADMISSION->setDbValue($row['NICU ADMISSION']);
        $this->anomalies->setDbValue($row['anomalies']);
        $this->babywt->setDbValue($row['baby wt']);
        $this->GAatdelivery->setDbValue($row['GA at delivery']);
        $this->Pregnancyoutcome->setDbValue($row['Pregnancy outcome']);
        $this->DELIVEREDHOSPITAL->setDbValue($row['DELIVERED HOSPITAL']);
        $this->DOCTOR->setDbValue($row['DOCTOR']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // HospID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // RIDNO

        // Treatment

        // Ectopic

        // OPUDATE

        // ERA

        // PatientAge

        // PartnerAge

        // FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET

        // AFTER HYSTEROSCOPY

        // AFTER ERA

        // HRT

        // XGRAST/PRP

        // EMBRYO DETAILS DAY 3/ 5, A, B, C

        // LMWH 40MG

        // ß-hCG

        // Implantation rate

        // Type of preg

        // MISCARRIAGE EARLY / LATE

        // ANC

        // NICU ADMISSION

        // anomalies

        // baby wt

        // GA at delivery

        // Pregnancy outcome

        // DELIVERED HOSPITAL

        // DOCTOR

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // HospID
        $this->HospID->ViewValue = $this->HospID->CurrentValue;
        $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
        $this->HospID->ViewCustomAttributes = "";

        // PatientName
        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
        $this->PatientName->ViewCustomAttributes = "";

        // PatientID
        $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
        $this->PatientID->ViewCustomAttributes = "";

        // PartnerName
        $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->ViewCustomAttributes = "";

        // PartnerID
        $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->ViewCustomAttributes = "";

        // RIDNO
        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
        $this->RIDNO->ViewCustomAttributes = "";

        // Treatment
        $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
        $this->Treatment->ViewCustomAttributes = "";

        // Ectopic
        $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->ViewCustomAttributes = "";

        // OPUDATE
        $this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
        $this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
        $this->OPUDATE->ViewCustomAttributes = "";

        // ERA
        $this->ERA->ViewValue = $this->ERA->CurrentValue;
        $this->ERA->ViewCustomAttributes = "";

        // PatientAge
        $this->PatientAge->ViewValue = $this->PatientAge->CurrentValue;
        $this->PatientAge->ViewCustomAttributes = "";

        // PartnerAge
        $this->PartnerAge->ViewValue = $this->PartnerAge->CurrentValue;
        $this->PartnerAge->ViewCustomAttributes = "";

        // FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->ViewValue = $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->CurrentValue;
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->ViewCustomAttributes = "";

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->ViewValue = $this->AFTERHYSTEROSCOPY->CurrentValue;
        $this->AFTERHYSTEROSCOPY->ViewCustomAttributes = "";

        // AFTER ERA
        $this->AFTERERA->ViewValue = $this->AFTERERA->CurrentValue;
        $this->AFTERERA->ViewCustomAttributes = "";

        // HRT
        $this->HRT->ViewValue = $this->HRT->CurrentValue;
        $this->HRT->ViewCustomAttributes = "";

        // XGRAST/PRP
        $this->XGRASTPRP->ViewValue = $this->XGRASTPRP->CurrentValue;
        $this->XGRASTPRP->ViewCustomAttributes = "";

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->ViewValue = $this->EMBRYODETAILSDAY35ABC->CurrentValue;
        $this->EMBRYODETAILSDAY35ABC->ViewCustomAttributes = "";

        // LMWH 40MG
        $this->LMWH40MG->ViewValue = $this->LMWH40MG->CurrentValue;
        $this->LMWH40MG->ViewCustomAttributes = "";

        // ß-hCG
        $this->hCG->ViewValue = $this->hCG->CurrentValue;
        $this->hCG->ViewCustomAttributes = "";

        // Implantation rate
        $this->Implantationrate->ViewValue = $this->Implantationrate->CurrentValue;
        $this->Implantationrate->ViewCustomAttributes = "";

        // Type of preg
        $this->Typeofpreg->ViewValue = $this->Typeofpreg->CurrentValue;
        $this->Typeofpreg->ViewCustomAttributes = "";

        // MISCARRIAGE EARLY / LATE
        $this->MISCARRIAGEEARLYLATE->ViewValue = $this->MISCARRIAGEEARLYLATE->CurrentValue;
        $this->MISCARRIAGEEARLYLATE->ViewCustomAttributes = "";

        // ANC
        $this->ANC->ViewValue = $this->ANC->CurrentValue;
        $this->ANC->ViewCustomAttributes = "";

        // NICU ADMISSION
        $this->NICUADMISSION->ViewValue = $this->NICUADMISSION->CurrentValue;
        $this->NICUADMISSION->ViewCustomAttributes = "";

        // anomalies
        $this->anomalies->ViewValue = $this->anomalies->CurrentValue;
        $this->anomalies->ViewCustomAttributes = "";

        // baby wt
        $this->babywt->ViewValue = $this->babywt->CurrentValue;
        $this->babywt->ViewCustomAttributes = "";

        // GA at delivery
        $this->GAatdelivery->ViewValue = $this->GAatdelivery->CurrentValue;
        $this->GAatdelivery->ViewCustomAttributes = "";

        // Pregnancy outcome
        $this->Pregnancyoutcome->ViewValue = $this->Pregnancyoutcome->CurrentValue;
        $this->Pregnancyoutcome->ViewCustomAttributes = "";

        // DELIVERED HOSPITAL
        $this->DELIVEREDHOSPITAL->ViewValue = $this->DELIVEREDHOSPITAL->CurrentValue;
        $this->DELIVEREDHOSPITAL->ViewCustomAttributes = "";

        // DOCTOR
        $this->DOCTOR->ViewValue = $this->DOCTOR->CurrentValue;
        $this->DOCTOR->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // HospID
        $this->HospID->LinkCustomAttributes = "";
        $this->HospID->HrefValue = "";
        $this->HospID->TooltipValue = "";

        // PatientName
        $this->PatientName->LinkCustomAttributes = "";
        $this->PatientName->HrefValue = "";
        $this->PatientName->TooltipValue = "";

        // PatientID
        $this->PatientID->LinkCustomAttributes = "";
        $this->PatientID->HrefValue = "";
        $this->PatientID->TooltipValue = "";

        // PartnerName
        $this->PartnerName->LinkCustomAttributes = "";
        $this->PartnerName->HrefValue = "";
        $this->PartnerName->TooltipValue = "";

        // PartnerID
        $this->PartnerID->LinkCustomAttributes = "";
        $this->PartnerID->HrefValue = "";
        $this->PartnerID->TooltipValue = "";

        // RIDNO
        $this->RIDNO->LinkCustomAttributes = "";
        $this->RIDNO->HrefValue = "";
        $this->RIDNO->TooltipValue = "";

        // Treatment
        $this->Treatment->LinkCustomAttributes = "";
        $this->Treatment->HrefValue = "";
        $this->Treatment->TooltipValue = "";

        // Ectopic
        $this->Ectopic->LinkCustomAttributes = "";
        $this->Ectopic->HrefValue = "";
        $this->Ectopic->TooltipValue = "";

        // OPUDATE
        $this->OPUDATE->LinkCustomAttributes = "";
        $this->OPUDATE->HrefValue = "";
        $this->OPUDATE->TooltipValue = "";

        // ERA
        $this->ERA->LinkCustomAttributes = "";
        $this->ERA->HrefValue = "";
        $this->ERA->TooltipValue = "";

        // PatientAge
        $this->PatientAge->LinkCustomAttributes = "";
        $this->PatientAge->HrefValue = "";
        $this->PatientAge->TooltipValue = "";

        // PartnerAge
        $this->PartnerAge->LinkCustomAttributes = "";
        $this->PartnerAge->HrefValue = "";
        $this->PartnerAge->TooltipValue = "";

        // FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->LinkCustomAttributes = "";
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->HrefValue = "";
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->TooltipValue = "";

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->LinkCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY->HrefValue = "";
        $this->AFTERHYSTEROSCOPY->TooltipValue = "";

        // AFTER ERA
        $this->AFTERERA->LinkCustomAttributes = "";
        $this->AFTERERA->HrefValue = "";
        $this->AFTERERA->TooltipValue = "";

        // HRT
        $this->HRT->LinkCustomAttributes = "";
        $this->HRT->HrefValue = "";
        $this->HRT->TooltipValue = "";

        // XGRAST/PRP
        $this->XGRASTPRP->LinkCustomAttributes = "";
        $this->XGRASTPRP->HrefValue = "";
        $this->XGRASTPRP->TooltipValue = "";

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->LinkCustomAttributes = "";
        $this->EMBRYODETAILSDAY35ABC->HrefValue = "";
        $this->EMBRYODETAILSDAY35ABC->TooltipValue = "";

        // LMWH 40MG
        $this->LMWH40MG->LinkCustomAttributes = "";
        $this->LMWH40MG->HrefValue = "";
        $this->LMWH40MG->TooltipValue = "";

        // ß-hCG
        $this->hCG->LinkCustomAttributes = "";
        $this->hCG->HrefValue = "";
        $this->hCG->TooltipValue = "";

        // Implantation rate
        $this->Implantationrate->LinkCustomAttributes = "";
        $this->Implantationrate->HrefValue = "";
        $this->Implantationrate->TooltipValue = "";

        // Type of preg
        $this->Typeofpreg->LinkCustomAttributes = "";
        $this->Typeofpreg->HrefValue = "";
        $this->Typeofpreg->TooltipValue = "";

        // MISCARRIAGE EARLY / LATE
        $this->MISCARRIAGEEARLYLATE->LinkCustomAttributes = "";
        $this->MISCARRIAGEEARLYLATE->HrefValue = "";
        $this->MISCARRIAGEEARLYLATE->TooltipValue = "";

        // ANC
        $this->ANC->LinkCustomAttributes = "";
        $this->ANC->HrefValue = "";
        $this->ANC->TooltipValue = "";

        // NICU ADMISSION
        $this->NICUADMISSION->LinkCustomAttributes = "";
        $this->NICUADMISSION->HrefValue = "";
        $this->NICUADMISSION->TooltipValue = "";

        // anomalies
        $this->anomalies->LinkCustomAttributes = "";
        $this->anomalies->HrefValue = "";
        $this->anomalies->TooltipValue = "";

        // baby wt
        $this->babywt->LinkCustomAttributes = "";
        $this->babywt->HrefValue = "";
        $this->babywt->TooltipValue = "";

        // GA at delivery
        $this->GAatdelivery->LinkCustomAttributes = "";
        $this->GAatdelivery->HrefValue = "";
        $this->GAatdelivery->TooltipValue = "";

        // Pregnancy outcome
        $this->Pregnancyoutcome->LinkCustomAttributes = "";
        $this->Pregnancyoutcome->HrefValue = "";
        $this->Pregnancyoutcome->TooltipValue = "";

        // DELIVERED HOSPITAL
        $this->DELIVEREDHOSPITAL->LinkCustomAttributes = "";
        $this->DELIVEREDHOSPITAL->HrefValue = "";
        $this->DELIVEREDHOSPITAL->TooltipValue = "";

        // DOCTOR
        $this->DOCTOR->LinkCustomAttributes = "";
        $this->DOCTOR->HrefValue = "";
        $this->DOCTOR->TooltipValue = "";

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

        // HospID
        $this->HospID->EditAttrs["class"] = "form-control";
        $this->HospID->EditCustomAttributes = "";
        $this->HospID->EditValue = $this->HospID->CurrentValue;
        $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

        // PatientName
        $this->PatientName->EditAttrs["class"] = "form-control";
        $this->PatientName->EditCustomAttributes = "";
        if (!$this->PatientName->Raw) {
            $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
        }
        $this->PatientName->EditValue = $this->PatientName->CurrentValue;
        $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

        // PatientID
        $this->PatientID->EditAttrs["class"] = "form-control";
        $this->PatientID->EditCustomAttributes = "";
        if (!$this->PatientID->Raw) {
            $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
        }
        $this->PatientID->EditValue = $this->PatientID->CurrentValue;
        $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

        // PartnerName
        $this->PartnerName->EditAttrs["class"] = "form-control";
        $this->PartnerName->EditCustomAttributes = "";
        if (!$this->PartnerName->Raw) {
            $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
        }
        $this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
        $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

        // PartnerID
        $this->PartnerID->EditAttrs["class"] = "form-control";
        $this->PartnerID->EditCustomAttributes = "";
        if (!$this->PartnerID->Raw) {
            $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
        }
        $this->PartnerID->EditValue = $this->PartnerID->CurrentValue;
        $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

        // RIDNO
        $this->RIDNO->EditAttrs["class"] = "form-control";
        $this->RIDNO->EditCustomAttributes = "";
        $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
        $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

        // Treatment
        $this->Treatment->EditAttrs["class"] = "form-control";
        $this->Treatment->EditCustomAttributes = "";
        if (!$this->Treatment->Raw) {
            $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
        }
        $this->Treatment->EditValue = $this->Treatment->CurrentValue;
        $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

        // Ectopic
        $this->Ectopic->EditAttrs["class"] = "form-control";
        $this->Ectopic->EditCustomAttributes = "";
        if (!$this->Ectopic->Raw) {
            $this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
        }
        $this->Ectopic->EditValue = $this->Ectopic->CurrentValue;
        $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

        // OPUDATE
        $this->OPUDATE->EditAttrs["class"] = "form-control";
        $this->OPUDATE->EditCustomAttributes = "";
        $this->OPUDATE->EditValue = FormatDateTime($this->OPUDATE->CurrentValue, 8);
        $this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

        // ERA
        $this->ERA->EditAttrs["class"] = "form-control";
        $this->ERA->EditCustomAttributes = "";
        if (!$this->ERA->Raw) {
            $this->ERA->CurrentValue = HtmlDecode($this->ERA->CurrentValue);
        }
        $this->ERA->EditValue = $this->ERA->CurrentValue;
        $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

        // PatientAge
        $this->PatientAge->EditAttrs["class"] = "form-control";
        $this->PatientAge->EditCustomAttributes = "";
        if (!$this->PatientAge->Raw) {
            $this->PatientAge->CurrentValue = HtmlDecode($this->PatientAge->CurrentValue);
        }
        $this->PatientAge->EditValue = $this->PatientAge->CurrentValue;
        $this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

        // PartnerAge
        $this->PartnerAge->EditAttrs["class"] = "form-control";
        $this->PartnerAge->EditCustomAttributes = "";
        if (!$this->PartnerAge->Raw) {
            $this->PartnerAge->CurrentValue = HtmlDecode($this->PartnerAge->CurrentValue);
        }
        $this->PartnerAge->EditValue = $this->PartnerAge->CurrentValue;
        $this->PartnerAge->PlaceHolder = RemoveHtml($this->PartnerAge->caption());

        // FRESH ET/ FET/ FRESH OD ET/ OD FET / FRESH DET/ FROZEN DET
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->EditAttrs["class"] = "form-control";
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->EditCustomAttributes = "";
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->EditValue = $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->CurrentValue;
        $this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->PlaceHolder = RemoveHtml($this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET->caption());

        // AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->EditAttrs["class"] = "form-control";
        $this->AFTERHYSTEROSCOPY->EditCustomAttributes = "";
        $this->AFTERHYSTEROSCOPY->EditValue = $this->AFTERHYSTEROSCOPY->CurrentValue;
        $this->AFTERHYSTEROSCOPY->PlaceHolder = RemoveHtml($this->AFTERHYSTEROSCOPY->caption());

        // AFTER ERA
        $this->AFTERERA->EditAttrs["class"] = "form-control";
        $this->AFTERERA->EditCustomAttributes = "";
        $this->AFTERERA->EditValue = $this->AFTERERA->CurrentValue;
        $this->AFTERERA->PlaceHolder = RemoveHtml($this->AFTERERA->caption());

        // HRT
        $this->HRT->EditAttrs["class"] = "form-control";
        $this->HRT->EditCustomAttributes = "";
        $this->HRT->EditValue = $this->HRT->CurrentValue;
        $this->HRT->PlaceHolder = RemoveHtml($this->HRT->caption());

        // XGRAST/PRP
        $this->XGRASTPRP->EditAttrs["class"] = "form-control";
        $this->XGRASTPRP->EditCustomAttributes = "";
        $this->XGRASTPRP->EditValue = $this->XGRASTPRP->CurrentValue;
        $this->XGRASTPRP->PlaceHolder = RemoveHtml($this->XGRASTPRP->caption());

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->EditAttrs["class"] = "form-control";
        $this->EMBRYODETAILSDAY35ABC->EditCustomAttributes = "";
        $this->EMBRYODETAILSDAY35ABC->EditValue = $this->EMBRYODETAILSDAY35ABC->CurrentValue;
        $this->EMBRYODETAILSDAY35ABC->PlaceHolder = RemoveHtml($this->EMBRYODETAILSDAY35ABC->caption());

        // LMWH 40MG
        $this->LMWH40MG->EditAttrs["class"] = "form-control";
        $this->LMWH40MG->EditCustomAttributes = "";
        $this->LMWH40MG->EditValue = $this->LMWH40MG->CurrentValue;
        $this->LMWH40MG->PlaceHolder = RemoveHtml($this->LMWH40MG->caption());

        // ß-hCG
        $this->hCG->EditAttrs["class"] = "form-control";
        $this->hCG->EditCustomAttributes = "";
        $this->hCG->EditValue = $this->hCG->CurrentValue;
        $this->hCG->PlaceHolder = RemoveHtml($this->hCG->caption());

        // Implantation rate
        $this->Implantationrate->EditAttrs["class"] = "form-control";
        $this->Implantationrate->EditCustomAttributes = "";
        $this->Implantationrate->EditValue = $this->Implantationrate->CurrentValue;
        $this->Implantationrate->PlaceHolder = RemoveHtml($this->Implantationrate->caption());

        // Type of preg
        $this->Typeofpreg->EditAttrs["class"] = "form-control";
        $this->Typeofpreg->EditCustomAttributes = "";
        $this->Typeofpreg->EditValue = $this->Typeofpreg->CurrentValue;
        $this->Typeofpreg->PlaceHolder = RemoveHtml($this->Typeofpreg->caption());

        // MISCARRIAGE EARLY / LATE
        $this->MISCARRIAGEEARLYLATE->EditAttrs["class"] = "form-control";
        $this->MISCARRIAGEEARLYLATE->EditCustomAttributes = "";
        $this->MISCARRIAGEEARLYLATE->EditValue = $this->MISCARRIAGEEARLYLATE->CurrentValue;
        $this->MISCARRIAGEEARLYLATE->PlaceHolder = RemoveHtml($this->MISCARRIAGEEARLYLATE->caption());

        // ANC
        $this->ANC->EditAttrs["class"] = "form-control";
        $this->ANC->EditCustomAttributes = "";
        $this->ANC->EditValue = $this->ANC->CurrentValue;
        $this->ANC->PlaceHolder = RemoveHtml($this->ANC->caption());

        // NICU ADMISSION
        $this->NICUADMISSION->EditAttrs["class"] = "form-control";
        $this->NICUADMISSION->EditCustomAttributes = "";
        $this->NICUADMISSION->EditValue = $this->NICUADMISSION->CurrentValue;
        $this->NICUADMISSION->PlaceHolder = RemoveHtml($this->NICUADMISSION->caption());

        // anomalies
        $this->anomalies->EditAttrs["class"] = "form-control";
        $this->anomalies->EditCustomAttributes = "";
        $this->anomalies->EditValue = $this->anomalies->CurrentValue;
        $this->anomalies->PlaceHolder = RemoveHtml($this->anomalies->caption());

        // baby wt
        $this->babywt->EditAttrs["class"] = "form-control";
        $this->babywt->EditCustomAttributes = "";
        $this->babywt->EditValue = $this->babywt->CurrentValue;
        $this->babywt->PlaceHolder = RemoveHtml($this->babywt->caption());

        // GA at delivery
        $this->GAatdelivery->EditAttrs["class"] = "form-control";
        $this->GAatdelivery->EditCustomAttributes = "";
        $this->GAatdelivery->EditValue = $this->GAatdelivery->CurrentValue;
        $this->GAatdelivery->PlaceHolder = RemoveHtml($this->GAatdelivery->caption());

        // Pregnancy outcome
        $this->Pregnancyoutcome->EditAttrs["class"] = "form-control";
        $this->Pregnancyoutcome->EditCustomAttributes = "";
        $this->Pregnancyoutcome->EditValue = $this->Pregnancyoutcome->CurrentValue;
        $this->Pregnancyoutcome->PlaceHolder = RemoveHtml($this->Pregnancyoutcome->caption());

        // DELIVERED HOSPITAL
        $this->DELIVEREDHOSPITAL->EditAttrs["class"] = "form-control";
        $this->DELIVEREDHOSPITAL->EditCustomAttributes = "";
        $this->DELIVEREDHOSPITAL->EditValue = $this->DELIVEREDHOSPITAL->CurrentValue;
        $this->DELIVEREDHOSPITAL->PlaceHolder = RemoveHtml($this->DELIVEREDHOSPITAL->caption());

        // DOCTOR
        $this->DOCTOR->EditAttrs["class"] = "form-control";
        $this->DOCTOR->EditCustomAttributes = "";
        $this->DOCTOR->EditValue = $this->DOCTOR->CurrentValue;
        $this->DOCTOR->PlaceHolder = RemoveHtml($this->DOCTOR->caption());

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
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->PatientAge);
                    $doc->exportCaption($this->PartnerAge);
                    $doc->exportCaption($this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET);
                    $doc->exportCaption($this->AFTERHYSTEROSCOPY);
                    $doc->exportCaption($this->AFTERERA);
                    $doc->exportCaption($this->HRT);
                    $doc->exportCaption($this->XGRASTPRP);
                    $doc->exportCaption($this->EMBRYODETAILSDAY35ABC);
                    $doc->exportCaption($this->LMWH40MG);
                    $doc->exportCaption($this->hCG);
                    $doc->exportCaption($this->Implantationrate);
                    $doc->exportCaption($this->Typeofpreg);
                    $doc->exportCaption($this->MISCARRIAGEEARLYLATE);
                    $doc->exportCaption($this->ANC);
                    $doc->exportCaption($this->NICUADMISSION);
                    $doc->exportCaption($this->anomalies);
                    $doc->exportCaption($this->babywt);
                    $doc->exportCaption($this->GAatdelivery);
                    $doc->exportCaption($this->Pregnancyoutcome);
                    $doc->exportCaption($this->DELIVEREDHOSPITAL);
                    $doc->exportCaption($this->DOCTOR);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->HospID);
                    $doc->exportCaption($this->PatientName);
                    $doc->exportCaption($this->PatientID);
                    $doc->exportCaption($this->PartnerName);
                    $doc->exportCaption($this->PartnerID);
                    $doc->exportCaption($this->RIDNO);
                    $doc->exportCaption($this->Treatment);
                    $doc->exportCaption($this->Ectopic);
                    $doc->exportCaption($this->OPUDATE);
                    $doc->exportCaption($this->ERA);
                    $doc->exportCaption($this->PatientAge);
                    $doc->exportCaption($this->PartnerAge);
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
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->PatientAge);
                        $doc->exportField($this->PartnerAge);
                        $doc->exportField($this->FRESHETFETFRESHODETODFETFRESHDETFROZENDET);
                        $doc->exportField($this->AFTERHYSTEROSCOPY);
                        $doc->exportField($this->AFTERERA);
                        $doc->exportField($this->HRT);
                        $doc->exportField($this->XGRASTPRP);
                        $doc->exportField($this->EMBRYODETAILSDAY35ABC);
                        $doc->exportField($this->LMWH40MG);
                        $doc->exportField($this->hCG);
                        $doc->exportField($this->Implantationrate);
                        $doc->exportField($this->Typeofpreg);
                        $doc->exportField($this->MISCARRIAGEEARLYLATE);
                        $doc->exportField($this->ANC);
                        $doc->exportField($this->NICUADMISSION);
                        $doc->exportField($this->anomalies);
                        $doc->exportField($this->babywt);
                        $doc->exportField($this->GAatdelivery);
                        $doc->exportField($this->Pregnancyoutcome);
                        $doc->exportField($this->DELIVEREDHOSPITAL);
                        $doc->exportField($this->DOCTOR);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->HospID);
                        $doc->exportField($this->PatientName);
                        $doc->exportField($this->PatientID);
                        $doc->exportField($this->PartnerName);
                        $doc->exportField($this->PartnerID);
                        $doc->exportField($this->RIDNO);
                        $doc->exportField($this->Treatment);
                        $doc->exportField($this->Ectopic);
                        $doc->exportField($this->OPUDATE);
                        $doc->exportField($this->ERA);
                        $doc->exportField($this->PatientAge);
                        $doc->exportField($this->PartnerAge);
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
