<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for ivf_oocytedenudation
 */
class IvfOocytedenudation extends DbTable
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
    public $id;
    public $RIDNo;
    public $Name;
    public $ResultDate;
    public $Surgeon;
    public $AsstSurgeon;
    public $Anaesthetist;
    public $AnaestheiaType;
    public $PrimaryEmbryologist;
    public $SecondaryEmbryologist;
    public $OPUNotes;
    public $NoOfFolliclesRight;
    public $NoOfFolliclesLeft;
    public $NoOfOocytes;
    public $RecordOocyteDenudation;
    public $DateOfDenudation;
    public $DenudationDoneBy;
    public $status;
    public $createdby;
    public $createddatetime;
    public $modifiedby;
    public $modifieddatetime;
    public $TidNo;
    public $ExpFollicles;
    public $SecondaryDenudationDoneBy;
    public $OocyteOrgin;
    public $patient1;
    public $patient2;
    public $OocytesDonate1;
    public $OocytesDonate2;
    public $ETDonate;
    public $OocyteType;
    public $MIOocytesDonate1;
    public $MIOocytesDonate2;
    public $SelfMI;
    public $SelfMII;
    public $patient3;
    public $patient4;
    public $OocytesDonate3;
    public $OocytesDonate4;
    public $MIOocytesDonate3;
    public $MIOocytesDonate4;
    public $SelfOocytesMI;
    public $SelfOocytesMII;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'ivf_oocytedenudation';
        $this->TableName = 'ivf_oocytedenudation';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`ivf_oocytedenudation`";
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
        $this->id = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, false, '`id`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->Sortable = true; // Allow sort
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id'] = &$this->id;

        // RIDNo
        $this->RIDNo = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, 11, -1, false, '`RIDNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RIDNo->Sortable = true; // Allow sort
        $this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RIDNo'] = &$this->RIDNo;

        // Name
        $this->Name = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Name', 'Name', '`Name`', '`Name`', 200, 45, -1, false, '`Name`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Name->Sortable = true; // Allow sort
        $this->Fields['Name'] = &$this->Name;

        // ResultDate
        $this->ResultDate = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike("`ResultDate`", 0, "DB"), 135, 19, 0, false, '`ResultDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResultDate->Sortable = true; // Allow sort
        $this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ResultDate'] = &$this->ResultDate;

        // Surgeon
        $this->Surgeon = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, 45, -1, false, '`Surgeon`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Surgeon->Sortable = true; // Allow sort
        $this->Fields['Surgeon'] = &$this->Surgeon;

        // AsstSurgeon
        $this->AsstSurgeon = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_AsstSurgeon', 'AsstSurgeon', '`AsstSurgeon`', '`AsstSurgeon`', 200, 50, -1, false, '`AsstSurgeon`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AsstSurgeon->Sortable = true; // Allow sort
        $this->Fields['AsstSurgeon'] = &$this->AsstSurgeon;

        // Anaesthetist
        $this->Anaesthetist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, 50, -1, false, '`Anaesthetist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Anaesthetist->Sortable = true; // Allow sort
        $this->Fields['Anaesthetist'] = &$this->Anaesthetist;

        // AnaestheiaType
        $this->AnaestheiaType = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_AnaestheiaType', 'AnaestheiaType', '`AnaestheiaType`', '`AnaestheiaType`', 200, 50, -1, false, '`AnaestheiaType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AnaestheiaType->Sortable = true; // Allow sort
        $this->Fields['AnaestheiaType'] = &$this->AnaestheiaType;

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_PrimaryEmbryologist', 'PrimaryEmbryologist', '`PrimaryEmbryologist`', '`PrimaryEmbryologist`', 200, 50, -1, false, '`PrimaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PrimaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['PrimaryEmbryologist'] = &$this->PrimaryEmbryologist;

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SecondaryEmbryologist', 'SecondaryEmbryologist', '`SecondaryEmbryologist`', '`SecondaryEmbryologist`', 200, 50, -1, false, '`SecondaryEmbryologist`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecondaryEmbryologist->Sortable = true; // Allow sort
        $this->Fields['SecondaryEmbryologist'] = &$this->SecondaryEmbryologist;

        // OPUNotes
        $this->OPUNotes = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OPUNotes', 'OPUNotes', '`OPUNotes`', '`OPUNotes`', 201, 500, -1, false, '`OPUNotes`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->OPUNotes->Sortable = true; // Allow sort
        $this->Fields['OPUNotes'] = &$this->OPUNotes;

        // NoOfFolliclesRight
        $this->NoOfFolliclesRight = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfFolliclesRight', 'NoOfFolliclesRight', '`NoOfFolliclesRight`', '`NoOfFolliclesRight`', 200, 50, -1, false, '`NoOfFolliclesRight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfFolliclesRight->Sortable = true; // Allow sort
        $this->Fields['NoOfFolliclesRight'] = &$this->NoOfFolliclesRight;

        // NoOfFolliclesLeft
        $this->NoOfFolliclesLeft = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfFolliclesLeft', 'NoOfFolliclesLeft', '`NoOfFolliclesLeft`', '`NoOfFolliclesLeft`', 200, 50, -1, false, '`NoOfFolliclesLeft`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfFolliclesLeft->Sortable = true; // Allow sort
        $this->Fields['NoOfFolliclesLeft'] = &$this->NoOfFolliclesLeft;

        // NoOfOocytes
        $this->NoOfOocytes = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfOocytes', 'NoOfOocytes', '`NoOfOocytes`', '`NoOfOocytes`', 200, 50, -1, false, '`NoOfOocytes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfOocytes->Sortable = true; // Allow sort
        $this->Fields['NoOfOocytes'] = &$this->NoOfOocytes;

        // RecordOocyteDenudation
        $this->RecordOocyteDenudation = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_RecordOocyteDenudation', 'RecordOocyteDenudation', '`RecordOocyteDenudation`', '`RecordOocyteDenudation`', 200, 50, -1, false, '`RecordOocyteDenudation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecordOocyteDenudation->Sortable = true; // Allow sort
        $this->Fields['RecordOocyteDenudation'] = &$this->RecordOocyteDenudation;

        // DateOfDenudation
        $this->DateOfDenudation = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_DateOfDenudation', 'DateOfDenudation', '`DateOfDenudation`', CastDateFieldForLike("`DateOfDenudation`", 0, "DB"), 135, 19, 0, false, '`DateOfDenudation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DateOfDenudation->Sortable = true; // Allow sort
        $this->DateOfDenudation->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['DateOfDenudation'] = &$this->DateOfDenudation;

        // DenudationDoneBy
        $this->DenudationDoneBy = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_DenudationDoneBy', 'DenudationDoneBy', '`DenudationDoneBy`', '`DenudationDoneBy`', 200, 50, -1, false, '`DenudationDoneBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DenudationDoneBy->Sortable = true; // Allow sort
        $this->Fields['DenudationDoneBy'] = &$this->DenudationDoneBy;

        // status
        $this->status = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_status', 'status', '`status`', '`status`', 3, 11, -1, false, '`status`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->status->Sortable = true; // Allow sort
        $this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['status'] = &$this->status;

        // createdby
        $this->createdby = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, 11, -1, false, '`createdby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createdby->Sortable = true; // Allow sort
        $this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['createdby'] = &$this->createdby;

        // createddatetime
        $this->createddatetime = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike("`createddatetime`", 0, "DB"), 135, 19, 0, false, '`createddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->createddatetime->Sortable = true; // Allow sort
        $this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['createddatetime'] = &$this->createddatetime;

        // modifiedby
        $this->modifiedby = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, 11, -1, false, '`modifiedby`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifiedby->Sortable = true; // Allow sort
        $this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['modifiedby'] = &$this->modifiedby;

        // modifieddatetime
        $this->modifieddatetime = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike("`modifieddatetime`", 0, "DB"), 135, 19, 0, false, '`modifieddatetime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->modifieddatetime->Sortable = true; // Allow sort
        $this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['modifieddatetime'] = &$this->modifieddatetime;

        // TidNo
        $this->TidNo = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, 11, -1, false, '`TidNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TidNo->Sortable = true; // Allow sort
        $this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TidNo'] = &$this->TidNo;

        // ExpFollicles
        $this->ExpFollicles = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ExpFollicles', 'ExpFollicles', '`ExpFollicles`', '`ExpFollicles`', 200, 45, -1, false, '`ExpFollicles`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpFollicles->Sortable = true; // Allow sort
        $this->Fields['ExpFollicles'] = &$this->ExpFollicles;

        // SecondaryDenudationDoneBy
        $this->SecondaryDenudationDoneBy = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SecondaryDenudationDoneBy', 'SecondaryDenudationDoneBy', '`SecondaryDenudationDoneBy`', '`SecondaryDenudationDoneBy`', 200, 45, -1, false, '`SecondaryDenudationDoneBy`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SecondaryDenudationDoneBy->Sortable = true; // Allow sort
        $this->Fields['SecondaryDenudationDoneBy'] = &$this->SecondaryDenudationDoneBy;

        // OocyteOrgin
        $this->OocyteOrgin = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocyteOrgin', 'OocyteOrgin', '`OocyteOrgin`', '`OocyteOrgin`', 200, 45, -1, false, '`OocyteOrgin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocyteOrgin->Sortable = true; // Allow sort
        $this->Fields['OocyteOrgin'] = &$this->OocyteOrgin;

        // patient1
        $this->patient1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient1', 'patient1', '`patient1`', '`patient1`', 3, 11, -1, false, '`patient1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient1->Sortable = true; // Allow sort
        $this->patient1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient1'] = &$this->patient1;

        // patient2
        $this->patient2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient2', 'patient2', '`patient2`', '`patient2`', 3, 11, -1, false, '`patient2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient2->Sortable = true; // Allow sort
        $this->patient2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient2'] = &$this->patient2;

        // OocytesDonate1
        $this->OocytesDonate1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate1', 'OocytesDonate1', '`OocytesDonate1`', '`OocytesDonate1`', 200, 45, -1, false, '`OocytesDonate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocytesDonate1->Sortable = true; // Allow sort
        $this->Fields['OocytesDonate1'] = &$this->OocytesDonate1;

        // OocytesDonate2
        $this->OocytesDonate2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate2', 'OocytesDonate2', '`OocytesDonate2`', '`OocytesDonate2`', 200, 45, -1, false, '`OocytesDonate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocytesDonate2->Sortable = true; // Allow sort
        $this->Fields['OocytesDonate2'] = &$this->OocytesDonate2;

        // ETDonate
        $this->ETDonate = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ETDonate', 'ETDonate', '`ETDonate`', '`ETDonate`', 200, 45, -1, false, '`ETDonate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ETDonate->Sortable = true; // Allow sort
        $this->Fields['ETDonate'] = &$this->ETDonate;

        // OocyteType
        $this->OocyteType = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocyteType', 'OocyteType', '`OocyteType`', '`OocyteType`', 200, 45, -1, false, '`OocyteType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocyteType->Sortable = true; // Allow sort
        $this->Fields['OocyteType'] = &$this->OocyteType;

        // MIOocytesDonate1
        $this->MIOocytesDonate1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate1', 'MIOocytesDonate1', '`MIOocytesDonate1`', '`MIOocytesDonate1`', 200, 45, -1, false, '`MIOocytesDonate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MIOocytesDonate1->Sortable = true; // Allow sort
        $this->Fields['MIOocytesDonate1'] = &$this->MIOocytesDonate1;

        // MIOocytesDonate2
        $this->MIOocytesDonate2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate2', 'MIOocytesDonate2', '`MIOocytesDonate2`', '`MIOocytesDonate2`', 200, 45, -1, false, '`MIOocytesDonate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MIOocytesDonate2->Sortable = true; // Allow sort
        $this->Fields['MIOocytesDonate2'] = &$this->MIOocytesDonate2;

        // SelfMI
        $this->SelfMI = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfMI', 'SelfMI', '`SelfMI`', '`SelfMI`', 200, 45, -1, false, '`SelfMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SelfMI->Sortable = true; // Allow sort
        $this->Fields['SelfMI'] = &$this->SelfMI;

        // SelfMII
        $this->SelfMII = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfMII', 'SelfMII', '`SelfMII`', '`SelfMII`', 200, 45, -1, false, '`SelfMII`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SelfMII->Sortable = true; // Allow sort
        $this->Fields['SelfMII'] = &$this->SelfMII;

        // patient3
        $this->patient3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient3', 'patient3', '`patient3`', '`patient3`', 3, 11, -1, false, '`patient3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient3->Sortable = true; // Allow sort
        $this->patient3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient3'] = &$this->patient3;

        // patient4
        $this->patient4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient4', 'patient4', '`patient4`', '`patient4`', 3, 11, -1, false, '`patient4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->patient4->Sortable = true; // Allow sort
        $this->patient4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['patient4'] = &$this->patient4;

        // OocytesDonate3
        $this->OocytesDonate3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate3', 'OocytesDonate3', '`OocytesDonate3`', '`OocytesDonate3`', 200, 45, -1, false, '`OocytesDonate3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocytesDonate3->Sortable = true; // Allow sort
        $this->Fields['OocytesDonate3'] = &$this->OocytesDonate3;

        // OocytesDonate4
        $this->OocytesDonate4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate4', 'OocytesDonate4', '`OocytesDonate4`', '`OocytesDonate4`', 200, 45, -1, false, '`OocytesDonate4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OocytesDonate4->Sortable = true; // Allow sort
        $this->Fields['OocytesDonate4'] = &$this->OocytesDonate4;

        // MIOocytesDonate3
        $this->MIOocytesDonate3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate3', 'MIOocytesDonate3', '`MIOocytesDonate3`', '`MIOocytesDonate3`', 200, 45, -1, false, '`MIOocytesDonate3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MIOocytesDonate3->Sortable = true; // Allow sort
        $this->Fields['MIOocytesDonate3'] = &$this->MIOocytesDonate3;

        // MIOocytesDonate4
        $this->MIOocytesDonate4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate4', 'MIOocytesDonate4', '`MIOocytesDonate4`', '`MIOocytesDonate4`', 200, 45, -1, false, '`MIOocytesDonate4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MIOocytesDonate4->Sortable = true; // Allow sort
        $this->Fields['MIOocytesDonate4'] = &$this->MIOocytesDonate4;

        // SelfOocytesMI
        $this->SelfOocytesMI = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfOocytesMI', 'SelfOocytesMI', '`SelfOocytesMI`', '`SelfOocytesMI`', 200, 45, -1, false, '`SelfOocytesMI`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SelfOocytesMI->Sortable = true; // Allow sort
        $this->Fields['SelfOocytesMI'] = &$this->SelfOocytesMI;

        // SelfOocytesMII
        $this->SelfOocytesMII = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfOocytesMII', 'SelfOocytesMII', '`SelfOocytesMII`', '`SelfOocytesMII`', 200, 45, -1, false, '`SelfOocytesMII`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SelfOocytesMII->Sortable = true; // Allow sort
        $this->Fields['SelfOocytesMII'] = &$this->SelfOocytesMII;
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
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`ivf_oocytedenudation`";
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
        $this->RIDNo->DbValue = $row['RIDNo'];
        $this->Name->DbValue = $row['Name'];
        $this->ResultDate->DbValue = $row['ResultDate'];
        $this->Surgeon->DbValue = $row['Surgeon'];
        $this->AsstSurgeon->DbValue = $row['AsstSurgeon'];
        $this->Anaesthetist->DbValue = $row['Anaesthetist'];
        $this->AnaestheiaType->DbValue = $row['AnaestheiaType'];
        $this->PrimaryEmbryologist->DbValue = $row['PrimaryEmbryologist'];
        $this->SecondaryEmbryologist->DbValue = $row['SecondaryEmbryologist'];
        $this->OPUNotes->DbValue = $row['OPUNotes'];
        $this->NoOfFolliclesRight->DbValue = $row['NoOfFolliclesRight'];
        $this->NoOfFolliclesLeft->DbValue = $row['NoOfFolliclesLeft'];
        $this->NoOfOocytes->DbValue = $row['NoOfOocytes'];
        $this->RecordOocyteDenudation->DbValue = $row['RecordOocyteDenudation'];
        $this->DateOfDenudation->DbValue = $row['DateOfDenudation'];
        $this->DenudationDoneBy->DbValue = $row['DenudationDoneBy'];
        $this->status->DbValue = $row['status'];
        $this->createdby->DbValue = $row['createdby'];
        $this->createddatetime->DbValue = $row['createddatetime'];
        $this->modifiedby->DbValue = $row['modifiedby'];
        $this->modifieddatetime->DbValue = $row['modifieddatetime'];
        $this->TidNo->DbValue = $row['TidNo'];
        $this->ExpFollicles->DbValue = $row['ExpFollicles'];
        $this->SecondaryDenudationDoneBy->DbValue = $row['SecondaryDenudationDoneBy'];
        $this->OocyteOrgin->DbValue = $row['OocyteOrgin'];
        $this->patient1->DbValue = $row['patient1'];
        $this->patient2->DbValue = $row['patient2'];
        $this->OocytesDonate1->DbValue = $row['OocytesDonate1'];
        $this->OocytesDonate2->DbValue = $row['OocytesDonate2'];
        $this->ETDonate->DbValue = $row['ETDonate'];
        $this->OocyteType->DbValue = $row['OocyteType'];
        $this->MIOocytesDonate1->DbValue = $row['MIOocytesDonate1'];
        $this->MIOocytesDonate2->DbValue = $row['MIOocytesDonate2'];
        $this->SelfMI->DbValue = $row['SelfMI'];
        $this->SelfMII->DbValue = $row['SelfMII'];
        $this->patient3->DbValue = $row['patient3'];
        $this->patient4->DbValue = $row['patient4'];
        $this->OocytesDonate3->DbValue = $row['OocytesDonate3'];
        $this->OocytesDonate4->DbValue = $row['OocytesDonate4'];
        $this->MIOocytesDonate3->DbValue = $row['MIOocytesDonate3'];
        $this->MIOocytesDonate4->DbValue = $row['MIOocytesDonate4'];
        $this->SelfOocytesMI->DbValue = $row['SelfOocytesMI'];
        $this->SelfOocytesMII->DbValue = $row['SelfOocytesMII'];
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
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("IvfOocytedenudationList");
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
        if ($pageName == "IvfOocytedenudationView") {
            return $Language->phrase("View");
        } elseif ($pageName == "IvfOocytedenudationEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "IvfOocytedenudationAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "IvfOocytedenudationList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("IvfOocytedenudationView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("IvfOocytedenudationView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "IvfOocytedenudationAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "IvfOocytedenudationAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("IvfOocytedenudationEdit", $this->getUrlParm($parm));
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
        $url = $this->keyUrl("IvfOocytedenudationAdd", $this->getUrlParm($parm));
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
        return $this->keyUrl("IvfOocytedenudationDelete", $this->getUrlParm());
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Name->setDbValue($row['Name']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
        $this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
        $this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
        $this->OPUNotes->setDbValue($row['OPUNotes']);
        $this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
        $this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
        $this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
        $this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
        $this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
        $this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->ExpFollicles->setDbValue($row['ExpFollicles']);
        $this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
        $this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
        $this->patient1->setDbValue($row['patient1']);
        $this->patient2->setDbValue($row['patient2']);
        $this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
        $this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
        $this->ETDonate->setDbValue($row['ETDonate']);
        $this->OocyteType->setDbValue($row['OocyteType']);
        $this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
        $this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
        $this->SelfMI->setDbValue($row['SelfMI']);
        $this->SelfMII->setDbValue($row['SelfMII']);
        $this->patient3->setDbValue($row['patient3']);
        $this->patient4->setDbValue($row['patient4']);
        $this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
        $this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
        $this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
        $this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
        $this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
        $this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // RIDNo

        // Name

        // ResultDate

        // Surgeon

        // AsstSurgeon

        // Anaesthetist

        // AnaestheiaType

        // PrimaryEmbryologist

        // SecondaryEmbryologist

        // OPUNotes

        // NoOfFolliclesRight

        // NoOfFolliclesLeft

        // NoOfOocytes

        // RecordOocyteDenudation

        // DateOfDenudation

        // DenudationDoneBy

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TidNo

        // ExpFollicles

        // SecondaryDenudationDoneBy

        // OocyteOrgin

        // patient1

        // patient2

        // OocytesDonate1

        // OocytesDonate2

        // ETDonate

        // OocyteType

        // MIOocytesDonate1

        // MIOocytesDonate2

        // SelfMI

        // SelfMII

        // patient3

        // patient4

        // OocytesDonate3

        // OocytesDonate4

        // MIOocytesDonate3

        // MIOocytesDonate4

        // SelfOocytesMI

        // SelfOocytesMII

        // id
        $this->id->ViewValue = $this->id->CurrentValue;
        $this->id->ViewCustomAttributes = "";

        // RIDNo
        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
        $this->RIDNo->ViewCustomAttributes = "";

        // Name
        $this->Name->ViewValue = $this->Name->CurrentValue;
        $this->Name->ViewCustomAttributes = "";

        // ResultDate
        $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
        $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
        $this->ResultDate->ViewCustomAttributes = "";

        // Surgeon
        $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
        $this->Surgeon->ViewCustomAttributes = "";

        // AsstSurgeon
        $this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
        $this->AsstSurgeon->ViewCustomAttributes = "";

        // Anaesthetist
        $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
        $this->Anaesthetist->ViewCustomAttributes = "";

        // AnaestheiaType
        $this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
        $this->AnaestheiaType->ViewCustomAttributes = "";

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
        $this->PrimaryEmbryologist->ViewCustomAttributes = "";

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
        $this->SecondaryEmbryologist->ViewCustomAttributes = "";

        // OPUNotes
        $this->OPUNotes->ViewValue = $this->OPUNotes->CurrentValue;
        $this->OPUNotes->ViewCustomAttributes = "";

        // NoOfFolliclesRight
        $this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
        $this->NoOfFolliclesRight->ViewCustomAttributes = "";

        // NoOfFolliclesLeft
        $this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
        $this->NoOfFolliclesLeft->ViewCustomAttributes = "";

        // NoOfOocytes
        $this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
        $this->NoOfOocytes->ViewCustomAttributes = "";

        // RecordOocyteDenudation
        $this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
        $this->RecordOocyteDenudation->ViewCustomAttributes = "";

        // DateOfDenudation
        $this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
        $this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 0);
        $this->DateOfDenudation->ViewCustomAttributes = "";

        // DenudationDoneBy
        $this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
        $this->DenudationDoneBy->ViewCustomAttributes = "";

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

        // TidNo
        $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
        $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
        $this->TidNo->ViewCustomAttributes = "";

        // ExpFollicles
        $this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
        $this->ExpFollicles->ViewCustomAttributes = "";

        // SecondaryDenudationDoneBy
        $this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
        $this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

        // OocyteOrgin
        $this->OocyteOrgin->ViewValue = $this->OocyteOrgin->CurrentValue;
        $this->OocyteOrgin->ViewCustomAttributes = "";

        // patient1
        $this->patient1->ViewValue = $this->patient1->CurrentValue;
        $this->patient1->ViewValue = FormatNumber($this->patient1->ViewValue, 0, -2, -2, -2);
        $this->patient1->ViewCustomAttributes = "";

        // patient2
        $this->patient2->ViewValue = $this->patient2->CurrentValue;
        $this->patient2->ViewValue = FormatNumber($this->patient2->ViewValue, 0, -2, -2, -2);
        $this->patient2->ViewCustomAttributes = "";

        // OocytesDonate1
        $this->OocytesDonate1->ViewValue = $this->OocytesDonate1->CurrentValue;
        $this->OocytesDonate1->ViewCustomAttributes = "";

        // OocytesDonate2
        $this->OocytesDonate2->ViewValue = $this->OocytesDonate2->CurrentValue;
        $this->OocytesDonate2->ViewCustomAttributes = "";

        // ETDonate
        $this->ETDonate->ViewValue = $this->ETDonate->CurrentValue;
        $this->ETDonate->ViewCustomAttributes = "";

        // OocyteType
        $this->OocyteType->ViewValue = $this->OocyteType->CurrentValue;
        $this->OocyteType->ViewCustomAttributes = "";

        // MIOocytesDonate1
        $this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
        $this->MIOocytesDonate1->ViewCustomAttributes = "";

        // MIOocytesDonate2
        $this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
        $this->MIOocytesDonate2->ViewCustomAttributes = "";

        // SelfMI
        $this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
        $this->SelfMI->ViewCustomAttributes = "";

        // SelfMII
        $this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
        $this->SelfMII->ViewCustomAttributes = "";

        // patient3
        $this->patient3->ViewValue = $this->patient3->CurrentValue;
        $this->patient3->ViewValue = FormatNumber($this->patient3->ViewValue, 0, -2, -2, -2);
        $this->patient3->ViewCustomAttributes = "";

        // patient4
        $this->patient4->ViewValue = $this->patient4->CurrentValue;
        $this->patient4->ViewValue = FormatNumber($this->patient4->ViewValue, 0, -2, -2, -2);
        $this->patient4->ViewCustomAttributes = "";

        // OocytesDonate3
        $this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
        $this->OocytesDonate3->ViewCustomAttributes = "";

        // OocytesDonate4
        $this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
        $this->OocytesDonate4->ViewCustomAttributes = "";

        // MIOocytesDonate3
        $this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
        $this->MIOocytesDonate3->ViewCustomAttributes = "";

        // MIOocytesDonate4
        $this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
        $this->MIOocytesDonate4->ViewCustomAttributes = "";

        // SelfOocytesMI
        $this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
        $this->SelfOocytesMI->ViewCustomAttributes = "";

        // SelfOocytesMII
        $this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
        $this->SelfOocytesMII->ViewCustomAttributes = "";

        // id
        $this->id->LinkCustomAttributes = "";
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // RIDNo
        $this->RIDNo->LinkCustomAttributes = "";
        $this->RIDNo->HrefValue = "";
        $this->RIDNo->TooltipValue = "";

        // Name
        $this->Name->LinkCustomAttributes = "";
        $this->Name->HrefValue = "";
        $this->Name->TooltipValue = "";

        // ResultDate
        $this->ResultDate->LinkCustomAttributes = "";
        $this->ResultDate->HrefValue = "";
        $this->ResultDate->TooltipValue = "";

        // Surgeon
        $this->Surgeon->LinkCustomAttributes = "";
        $this->Surgeon->HrefValue = "";
        $this->Surgeon->TooltipValue = "";

        // AsstSurgeon
        $this->AsstSurgeon->LinkCustomAttributes = "";
        $this->AsstSurgeon->HrefValue = "";
        $this->AsstSurgeon->TooltipValue = "";

        // Anaesthetist
        $this->Anaesthetist->LinkCustomAttributes = "";
        $this->Anaesthetist->HrefValue = "";
        $this->Anaesthetist->TooltipValue = "";

        // AnaestheiaType
        $this->AnaestheiaType->LinkCustomAttributes = "";
        $this->AnaestheiaType->HrefValue = "";
        $this->AnaestheiaType->TooltipValue = "";

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->LinkCustomAttributes = "";
        $this->PrimaryEmbryologist->HrefValue = "";
        $this->PrimaryEmbryologist->TooltipValue = "";

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->LinkCustomAttributes = "";
        $this->SecondaryEmbryologist->HrefValue = "";
        $this->SecondaryEmbryologist->TooltipValue = "";

        // OPUNotes
        $this->OPUNotes->LinkCustomAttributes = "";
        $this->OPUNotes->HrefValue = "";
        $this->OPUNotes->TooltipValue = "";

        // NoOfFolliclesRight
        $this->NoOfFolliclesRight->LinkCustomAttributes = "";
        $this->NoOfFolliclesRight->HrefValue = "";
        $this->NoOfFolliclesRight->TooltipValue = "";

        // NoOfFolliclesLeft
        $this->NoOfFolliclesLeft->LinkCustomAttributes = "";
        $this->NoOfFolliclesLeft->HrefValue = "";
        $this->NoOfFolliclesLeft->TooltipValue = "";

        // NoOfOocytes
        $this->NoOfOocytes->LinkCustomAttributes = "";
        $this->NoOfOocytes->HrefValue = "";
        $this->NoOfOocytes->TooltipValue = "";

        // RecordOocyteDenudation
        $this->RecordOocyteDenudation->LinkCustomAttributes = "";
        $this->RecordOocyteDenudation->HrefValue = "";
        $this->RecordOocyteDenudation->TooltipValue = "";

        // DateOfDenudation
        $this->DateOfDenudation->LinkCustomAttributes = "";
        $this->DateOfDenudation->HrefValue = "";
        $this->DateOfDenudation->TooltipValue = "";

        // DenudationDoneBy
        $this->DenudationDoneBy->LinkCustomAttributes = "";
        $this->DenudationDoneBy->HrefValue = "";
        $this->DenudationDoneBy->TooltipValue = "";

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

        // TidNo
        $this->TidNo->LinkCustomAttributes = "";
        $this->TidNo->HrefValue = "";
        $this->TidNo->TooltipValue = "";

        // ExpFollicles
        $this->ExpFollicles->LinkCustomAttributes = "";
        $this->ExpFollicles->HrefValue = "";
        $this->ExpFollicles->TooltipValue = "";

        // SecondaryDenudationDoneBy
        $this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
        $this->SecondaryDenudationDoneBy->HrefValue = "";
        $this->SecondaryDenudationDoneBy->TooltipValue = "";

        // OocyteOrgin
        $this->OocyteOrgin->LinkCustomAttributes = "";
        $this->OocyteOrgin->HrefValue = "";
        $this->OocyteOrgin->TooltipValue = "";

        // patient1
        $this->patient1->LinkCustomAttributes = "";
        $this->patient1->HrefValue = "";
        $this->patient1->TooltipValue = "";

        // patient2
        $this->patient2->LinkCustomAttributes = "";
        $this->patient2->HrefValue = "";
        $this->patient2->TooltipValue = "";

        // OocytesDonate1
        $this->OocytesDonate1->LinkCustomAttributes = "";
        $this->OocytesDonate1->HrefValue = "";
        $this->OocytesDonate1->TooltipValue = "";

        // OocytesDonate2
        $this->OocytesDonate2->LinkCustomAttributes = "";
        $this->OocytesDonate2->HrefValue = "";
        $this->OocytesDonate2->TooltipValue = "";

        // ETDonate
        $this->ETDonate->LinkCustomAttributes = "";
        $this->ETDonate->HrefValue = "";
        $this->ETDonate->TooltipValue = "";

        // OocyteType
        $this->OocyteType->LinkCustomAttributes = "";
        $this->OocyteType->HrefValue = "";
        $this->OocyteType->TooltipValue = "";

        // MIOocytesDonate1
        $this->MIOocytesDonate1->LinkCustomAttributes = "";
        $this->MIOocytesDonate1->HrefValue = "";
        $this->MIOocytesDonate1->TooltipValue = "";

        // MIOocytesDonate2
        $this->MIOocytesDonate2->LinkCustomAttributes = "";
        $this->MIOocytesDonate2->HrefValue = "";
        $this->MIOocytesDonate2->TooltipValue = "";

        // SelfMI
        $this->SelfMI->LinkCustomAttributes = "";
        $this->SelfMI->HrefValue = "";
        $this->SelfMI->TooltipValue = "";

        // SelfMII
        $this->SelfMII->LinkCustomAttributes = "";
        $this->SelfMII->HrefValue = "";
        $this->SelfMII->TooltipValue = "";

        // patient3
        $this->patient3->LinkCustomAttributes = "";
        $this->patient3->HrefValue = "";
        $this->patient3->TooltipValue = "";

        // patient4
        $this->patient4->LinkCustomAttributes = "";
        $this->patient4->HrefValue = "";
        $this->patient4->TooltipValue = "";

        // OocytesDonate3
        $this->OocytesDonate3->LinkCustomAttributes = "";
        $this->OocytesDonate3->HrefValue = "";
        $this->OocytesDonate3->TooltipValue = "";

        // OocytesDonate4
        $this->OocytesDonate4->LinkCustomAttributes = "";
        $this->OocytesDonate4->HrefValue = "";
        $this->OocytesDonate4->TooltipValue = "";

        // MIOocytesDonate3
        $this->MIOocytesDonate3->LinkCustomAttributes = "";
        $this->MIOocytesDonate3->HrefValue = "";
        $this->MIOocytesDonate3->TooltipValue = "";

        // MIOocytesDonate4
        $this->MIOocytesDonate4->LinkCustomAttributes = "";
        $this->MIOocytesDonate4->HrefValue = "";
        $this->MIOocytesDonate4->TooltipValue = "";

        // SelfOocytesMI
        $this->SelfOocytesMI->LinkCustomAttributes = "";
        $this->SelfOocytesMI->HrefValue = "";
        $this->SelfOocytesMI->TooltipValue = "";

        // SelfOocytesMII
        $this->SelfOocytesMII->LinkCustomAttributes = "";
        $this->SelfOocytesMII->HrefValue = "";
        $this->SelfOocytesMII->TooltipValue = "";

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

        // RIDNo
        $this->RIDNo->EditAttrs["class"] = "form-control";
        $this->RIDNo->EditCustomAttributes = "";
        $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
        $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

        // Name
        $this->Name->EditAttrs["class"] = "form-control";
        $this->Name->EditCustomAttributes = "";
        if (!$this->Name->Raw) {
            $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
        }
        $this->Name->EditValue = $this->Name->CurrentValue;
        $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

        // ResultDate
        $this->ResultDate->EditAttrs["class"] = "form-control";
        $this->ResultDate->EditCustomAttributes = "";
        $this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 8);
        $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

        // Surgeon
        $this->Surgeon->EditAttrs["class"] = "form-control";
        $this->Surgeon->EditCustomAttributes = "";
        if (!$this->Surgeon->Raw) {
            $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
        }
        $this->Surgeon->EditValue = $this->Surgeon->CurrentValue;
        $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

        // AsstSurgeon
        $this->AsstSurgeon->EditAttrs["class"] = "form-control";
        $this->AsstSurgeon->EditCustomAttributes = "";
        if (!$this->AsstSurgeon->Raw) {
            $this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
        }
        $this->AsstSurgeon->EditValue = $this->AsstSurgeon->CurrentValue;
        $this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

        // Anaesthetist
        $this->Anaesthetist->EditAttrs["class"] = "form-control";
        $this->Anaesthetist->EditCustomAttributes = "";
        if (!$this->Anaesthetist->Raw) {
            $this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
        }
        $this->Anaesthetist->EditValue = $this->Anaesthetist->CurrentValue;
        $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

        // AnaestheiaType
        $this->AnaestheiaType->EditAttrs["class"] = "form-control";
        $this->AnaestheiaType->EditCustomAttributes = "";
        if (!$this->AnaestheiaType->Raw) {
            $this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
        }
        $this->AnaestheiaType->EditValue = $this->AnaestheiaType->CurrentValue;
        $this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

        // PrimaryEmbryologist
        $this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->PrimaryEmbryologist->EditCustomAttributes = "";
        if (!$this->PrimaryEmbryologist->Raw) {
            $this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
        }
        $this->PrimaryEmbryologist->EditValue = $this->PrimaryEmbryologist->CurrentValue;
        $this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

        // SecondaryEmbryologist
        $this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
        $this->SecondaryEmbryologist->EditCustomAttributes = "";
        if (!$this->SecondaryEmbryologist->Raw) {
            $this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
        }
        $this->SecondaryEmbryologist->EditValue = $this->SecondaryEmbryologist->CurrentValue;
        $this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

        // OPUNotes
        $this->OPUNotes->EditAttrs["class"] = "form-control";
        $this->OPUNotes->EditCustomAttributes = "";
        $this->OPUNotes->EditValue = $this->OPUNotes->CurrentValue;
        $this->OPUNotes->PlaceHolder = RemoveHtml($this->OPUNotes->caption());

        // NoOfFolliclesRight
        $this->NoOfFolliclesRight->EditAttrs["class"] = "form-control";
        $this->NoOfFolliclesRight->EditCustomAttributes = "";
        if (!$this->NoOfFolliclesRight->Raw) {
            $this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
        }
        $this->NoOfFolliclesRight->EditValue = $this->NoOfFolliclesRight->CurrentValue;
        $this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

        // NoOfFolliclesLeft
        $this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
        $this->NoOfFolliclesLeft->EditCustomAttributes = "";
        if (!$this->NoOfFolliclesLeft->Raw) {
            $this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
        }
        $this->NoOfFolliclesLeft->EditValue = $this->NoOfFolliclesLeft->CurrentValue;
        $this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

        // NoOfOocytes
        $this->NoOfOocytes->EditAttrs["class"] = "form-control";
        $this->NoOfOocytes->EditCustomAttributes = "";
        if (!$this->NoOfOocytes->Raw) {
            $this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
        }
        $this->NoOfOocytes->EditValue = $this->NoOfOocytes->CurrentValue;
        $this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

        // RecordOocyteDenudation
        $this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
        $this->RecordOocyteDenudation->EditCustomAttributes = "";
        if (!$this->RecordOocyteDenudation->Raw) {
            $this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
        }
        $this->RecordOocyteDenudation->EditValue = $this->RecordOocyteDenudation->CurrentValue;
        $this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

        // DateOfDenudation
        $this->DateOfDenudation->EditAttrs["class"] = "form-control";
        $this->DateOfDenudation->EditCustomAttributes = "";
        $this->DateOfDenudation->EditValue = FormatDateTime($this->DateOfDenudation->CurrentValue, 8);
        $this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

        // DenudationDoneBy
        $this->DenudationDoneBy->EditAttrs["class"] = "form-control";
        $this->DenudationDoneBy->EditCustomAttributes = "";
        if (!$this->DenudationDoneBy->Raw) {
            $this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
        }
        $this->DenudationDoneBy->EditValue = $this->DenudationDoneBy->CurrentValue;
        $this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

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

        // TidNo
        $this->TidNo->EditAttrs["class"] = "form-control";
        $this->TidNo->EditCustomAttributes = "";
        $this->TidNo->EditValue = $this->TidNo->CurrentValue;
        $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

        // ExpFollicles
        $this->ExpFollicles->EditAttrs["class"] = "form-control";
        $this->ExpFollicles->EditCustomAttributes = "";
        if (!$this->ExpFollicles->Raw) {
            $this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
        }
        $this->ExpFollicles->EditValue = $this->ExpFollicles->CurrentValue;
        $this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

        // SecondaryDenudationDoneBy
        $this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
        $this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
        if (!$this->SecondaryDenudationDoneBy->Raw) {
            $this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
        }
        $this->SecondaryDenudationDoneBy->EditValue = $this->SecondaryDenudationDoneBy->CurrentValue;
        $this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

        // OocyteOrgin
        $this->OocyteOrgin->EditAttrs["class"] = "form-control";
        $this->OocyteOrgin->EditCustomAttributes = "";
        if (!$this->OocyteOrgin->Raw) {
            $this->OocyteOrgin->CurrentValue = HtmlDecode($this->OocyteOrgin->CurrentValue);
        }
        $this->OocyteOrgin->EditValue = $this->OocyteOrgin->CurrentValue;
        $this->OocyteOrgin->PlaceHolder = RemoveHtml($this->OocyteOrgin->caption());

        // patient1
        $this->patient1->EditAttrs["class"] = "form-control";
        $this->patient1->EditCustomAttributes = "";
        $this->patient1->EditValue = $this->patient1->CurrentValue;
        $this->patient1->PlaceHolder = RemoveHtml($this->patient1->caption());

        // patient2
        $this->patient2->EditAttrs["class"] = "form-control";
        $this->patient2->EditCustomAttributes = "";
        $this->patient2->EditValue = $this->patient2->CurrentValue;
        $this->patient2->PlaceHolder = RemoveHtml($this->patient2->caption());

        // OocytesDonate1
        $this->OocytesDonate1->EditAttrs["class"] = "form-control";
        $this->OocytesDonate1->EditCustomAttributes = "";
        if (!$this->OocytesDonate1->Raw) {
            $this->OocytesDonate1->CurrentValue = HtmlDecode($this->OocytesDonate1->CurrentValue);
        }
        $this->OocytesDonate1->EditValue = $this->OocytesDonate1->CurrentValue;
        $this->OocytesDonate1->PlaceHolder = RemoveHtml($this->OocytesDonate1->caption());

        // OocytesDonate2
        $this->OocytesDonate2->EditAttrs["class"] = "form-control";
        $this->OocytesDonate2->EditCustomAttributes = "";
        if (!$this->OocytesDonate2->Raw) {
            $this->OocytesDonate2->CurrentValue = HtmlDecode($this->OocytesDonate2->CurrentValue);
        }
        $this->OocytesDonate2->EditValue = $this->OocytesDonate2->CurrentValue;
        $this->OocytesDonate2->PlaceHolder = RemoveHtml($this->OocytesDonate2->caption());

        // ETDonate
        $this->ETDonate->EditAttrs["class"] = "form-control";
        $this->ETDonate->EditCustomAttributes = "";
        if (!$this->ETDonate->Raw) {
            $this->ETDonate->CurrentValue = HtmlDecode($this->ETDonate->CurrentValue);
        }
        $this->ETDonate->EditValue = $this->ETDonate->CurrentValue;
        $this->ETDonate->PlaceHolder = RemoveHtml($this->ETDonate->caption());

        // OocyteType
        $this->OocyteType->EditAttrs["class"] = "form-control";
        $this->OocyteType->EditCustomAttributes = "";
        if (!$this->OocyteType->Raw) {
            $this->OocyteType->CurrentValue = HtmlDecode($this->OocyteType->CurrentValue);
        }
        $this->OocyteType->EditValue = $this->OocyteType->CurrentValue;
        $this->OocyteType->PlaceHolder = RemoveHtml($this->OocyteType->caption());

        // MIOocytesDonate1
        $this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
        $this->MIOocytesDonate1->EditCustomAttributes = "";
        if (!$this->MIOocytesDonate1->Raw) {
            $this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
        }
        $this->MIOocytesDonate1->EditValue = $this->MIOocytesDonate1->CurrentValue;
        $this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

        // MIOocytesDonate2
        $this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
        $this->MIOocytesDonate2->EditCustomAttributes = "";
        if (!$this->MIOocytesDonate2->Raw) {
            $this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
        }
        $this->MIOocytesDonate2->EditValue = $this->MIOocytesDonate2->CurrentValue;
        $this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

        // SelfMI
        $this->SelfMI->EditAttrs["class"] = "form-control";
        $this->SelfMI->EditCustomAttributes = "";
        if (!$this->SelfMI->Raw) {
            $this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
        }
        $this->SelfMI->EditValue = $this->SelfMI->CurrentValue;
        $this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

        // SelfMII
        $this->SelfMII->EditAttrs["class"] = "form-control";
        $this->SelfMII->EditCustomAttributes = "";
        if (!$this->SelfMII->Raw) {
            $this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
        }
        $this->SelfMII->EditValue = $this->SelfMII->CurrentValue;
        $this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

        // patient3
        $this->patient3->EditAttrs["class"] = "form-control";
        $this->patient3->EditCustomAttributes = "";
        $this->patient3->EditValue = $this->patient3->CurrentValue;
        $this->patient3->PlaceHolder = RemoveHtml($this->patient3->caption());

        // patient4
        $this->patient4->EditAttrs["class"] = "form-control";
        $this->patient4->EditCustomAttributes = "";
        $this->patient4->EditValue = $this->patient4->CurrentValue;
        $this->patient4->PlaceHolder = RemoveHtml($this->patient4->caption());

        // OocytesDonate3
        $this->OocytesDonate3->EditAttrs["class"] = "form-control";
        $this->OocytesDonate3->EditCustomAttributes = "";
        if (!$this->OocytesDonate3->Raw) {
            $this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
        }
        $this->OocytesDonate3->EditValue = $this->OocytesDonate3->CurrentValue;
        $this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

        // OocytesDonate4
        $this->OocytesDonate4->EditAttrs["class"] = "form-control";
        $this->OocytesDonate4->EditCustomAttributes = "";
        if (!$this->OocytesDonate4->Raw) {
            $this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
        }
        $this->OocytesDonate4->EditValue = $this->OocytesDonate4->CurrentValue;
        $this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

        // MIOocytesDonate3
        $this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
        $this->MIOocytesDonate3->EditCustomAttributes = "";
        if (!$this->MIOocytesDonate3->Raw) {
            $this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
        }
        $this->MIOocytesDonate3->EditValue = $this->MIOocytesDonate3->CurrentValue;
        $this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

        // MIOocytesDonate4
        $this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
        $this->MIOocytesDonate4->EditCustomAttributes = "";
        if (!$this->MIOocytesDonate4->Raw) {
            $this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
        }
        $this->MIOocytesDonate4->EditValue = $this->MIOocytesDonate4->CurrentValue;
        $this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

        // SelfOocytesMI
        $this->SelfOocytesMI->EditAttrs["class"] = "form-control";
        $this->SelfOocytesMI->EditCustomAttributes = "";
        if (!$this->SelfOocytesMI->Raw) {
            $this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
        }
        $this->SelfOocytesMI->EditValue = $this->SelfOocytesMI->CurrentValue;
        $this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

        // SelfOocytesMII
        $this->SelfOocytesMII->EditAttrs["class"] = "form-control";
        $this->SelfOocytesMII->EditCustomAttributes = "";
        if (!$this->SelfOocytesMII->Raw) {
            $this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
        }
        $this->SelfOocytesMII->EditValue = $this->SelfOocytesMII->CurrentValue;
        $this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

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
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->AsstSurgeon);
                    $doc->exportCaption($this->Anaesthetist);
                    $doc->exportCaption($this->AnaestheiaType);
                    $doc->exportCaption($this->PrimaryEmbryologist);
                    $doc->exportCaption($this->SecondaryEmbryologist);
                    $doc->exportCaption($this->OPUNotes);
                    $doc->exportCaption($this->NoOfFolliclesRight);
                    $doc->exportCaption($this->NoOfFolliclesLeft);
                    $doc->exportCaption($this->NoOfOocytes);
                    $doc->exportCaption($this->RecordOocyteDenudation);
                    $doc->exportCaption($this->DateOfDenudation);
                    $doc->exportCaption($this->DenudationDoneBy);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->ExpFollicles);
                    $doc->exportCaption($this->SecondaryDenudationDoneBy);
                    $doc->exportCaption($this->OocyteOrgin);
                    $doc->exportCaption($this->patient1);
                    $doc->exportCaption($this->patient2);
                    $doc->exportCaption($this->OocytesDonate1);
                    $doc->exportCaption($this->OocytesDonate2);
                    $doc->exportCaption($this->ETDonate);
                    $doc->exportCaption($this->OocyteType);
                    $doc->exportCaption($this->MIOocytesDonate1);
                    $doc->exportCaption($this->MIOocytesDonate2);
                    $doc->exportCaption($this->SelfMI);
                    $doc->exportCaption($this->SelfMII);
                    $doc->exportCaption($this->patient3);
                    $doc->exportCaption($this->patient4);
                    $doc->exportCaption($this->OocytesDonate3);
                    $doc->exportCaption($this->OocytesDonate4);
                    $doc->exportCaption($this->MIOocytesDonate3);
                    $doc->exportCaption($this->MIOocytesDonate4);
                    $doc->exportCaption($this->SelfOocytesMI);
                    $doc->exportCaption($this->SelfOocytesMII);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->RIDNo);
                    $doc->exportCaption($this->Name);
                    $doc->exportCaption($this->ResultDate);
                    $doc->exportCaption($this->Surgeon);
                    $doc->exportCaption($this->AsstSurgeon);
                    $doc->exportCaption($this->Anaesthetist);
                    $doc->exportCaption($this->AnaestheiaType);
                    $doc->exportCaption($this->PrimaryEmbryologist);
                    $doc->exportCaption($this->SecondaryEmbryologist);
                    $doc->exportCaption($this->NoOfFolliclesRight);
                    $doc->exportCaption($this->NoOfFolliclesLeft);
                    $doc->exportCaption($this->NoOfOocytes);
                    $doc->exportCaption($this->RecordOocyteDenudation);
                    $doc->exportCaption($this->DateOfDenudation);
                    $doc->exportCaption($this->DenudationDoneBy);
                    $doc->exportCaption($this->status);
                    $doc->exportCaption($this->createdby);
                    $doc->exportCaption($this->createddatetime);
                    $doc->exportCaption($this->modifiedby);
                    $doc->exportCaption($this->modifieddatetime);
                    $doc->exportCaption($this->TidNo);
                    $doc->exportCaption($this->ExpFollicles);
                    $doc->exportCaption($this->SecondaryDenudationDoneBy);
                    $doc->exportCaption($this->OocyteOrgin);
                    $doc->exportCaption($this->patient1);
                    $doc->exportCaption($this->patient2);
                    $doc->exportCaption($this->OocytesDonate1);
                    $doc->exportCaption($this->OocytesDonate2);
                    $doc->exportCaption($this->ETDonate);
                    $doc->exportCaption($this->OocyteType);
                    $doc->exportCaption($this->MIOocytesDonate1);
                    $doc->exportCaption($this->MIOocytesDonate2);
                    $doc->exportCaption($this->SelfMI);
                    $doc->exportCaption($this->SelfMII);
                    $doc->exportCaption($this->patient3);
                    $doc->exportCaption($this->patient4);
                    $doc->exportCaption($this->OocytesDonate3);
                    $doc->exportCaption($this->OocytesDonate4);
                    $doc->exportCaption($this->MIOocytesDonate3);
                    $doc->exportCaption($this->MIOocytesDonate4);
                    $doc->exportCaption($this->SelfOocytesMI);
                    $doc->exportCaption($this->SelfOocytesMII);
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
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->AsstSurgeon);
                        $doc->exportField($this->Anaesthetist);
                        $doc->exportField($this->AnaestheiaType);
                        $doc->exportField($this->PrimaryEmbryologist);
                        $doc->exportField($this->SecondaryEmbryologist);
                        $doc->exportField($this->OPUNotes);
                        $doc->exportField($this->NoOfFolliclesRight);
                        $doc->exportField($this->NoOfFolliclesLeft);
                        $doc->exportField($this->NoOfOocytes);
                        $doc->exportField($this->RecordOocyteDenudation);
                        $doc->exportField($this->DateOfDenudation);
                        $doc->exportField($this->DenudationDoneBy);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->ExpFollicles);
                        $doc->exportField($this->SecondaryDenudationDoneBy);
                        $doc->exportField($this->OocyteOrgin);
                        $doc->exportField($this->patient1);
                        $doc->exportField($this->patient2);
                        $doc->exportField($this->OocytesDonate1);
                        $doc->exportField($this->OocytesDonate2);
                        $doc->exportField($this->ETDonate);
                        $doc->exportField($this->OocyteType);
                        $doc->exportField($this->MIOocytesDonate1);
                        $doc->exportField($this->MIOocytesDonate2);
                        $doc->exportField($this->SelfMI);
                        $doc->exportField($this->SelfMII);
                        $doc->exportField($this->patient3);
                        $doc->exportField($this->patient4);
                        $doc->exportField($this->OocytesDonate3);
                        $doc->exportField($this->OocytesDonate4);
                        $doc->exportField($this->MIOocytesDonate3);
                        $doc->exportField($this->MIOocytesDonate4);
                        $doc->exportField($this->SelfOocytesMI);
                        $doc->exportField($this->SelfOocytesMII);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->RIDNo);
                        $doc->exportField($this->Name);
                        $doc->exportField($this->ResultDate);
                        $doc->exportField($this->Surgeon);
                        $doc->exportField($this->AsstSurgeon);
                        $doc->exportField($this->Anaesthetist);
                        $doc->exportField($this->AnaestheiaType);
                        $doc->exportField($this->PrimaryEmbryologist);
                        $doc->exportField($this->SecondaryEmbryologist);
                        $doc->exportField($this->NoOfFolliclesRight);
                        $doc->exportField($this->NoOfFolliclesLeft);
                        $doc->exportField($this->NoOfOocytes);
                        $doc->exportField($this->RecordOocyteDenudation);
                        $doc->exportField($this->DateOfDenudation);
                        $doc->exportField($this->DenudationDoneBy);
                        $doc->exportField($this->status);
                        $doc->exportField($this->createdby);
                        $doc->exportField($this->createddatetime);
                        $doc->exportField($this->modifiedby);
                        $doc->exportField($this->modifieddatetime);
                        $doc->exportField($this->TidNo);
                        $doc->exportField($this->ExpFollicles);
                        $doc->exportField($this->SecondaryDenudationDoneBy);
                        $doc->exportField($this->OocyteOrgin);
                        $doc->exportField($this->patient1);
                        $doc->exportField($this->patient2);
                        $doc->exportField($this->OocytesDonate1);
                        $doc->exportField($this->OocytesDonate2);
                        $doc->exportField($this->ETDonate);
                        $doc->exportField($this->OocyteType);
                        $doc->exportField($this->MIOocytesDonate1);
                        $doc->exportField($this->MIOocytesDonate2);
                        $doc->exportField($this->SelfMI);
                        $doc->exportField($this->SelfMII);
                        $doc->exportField($this->patient3);
                        $doc->exportField($this->patient4);
                        $doc->exportField($this->OocytesDonate3);
                        $doc->exportField($this->OocytesDonate4);
                        $doc->exportField($this->MIOocytesDonate3);
                        $doc->exportField($this->MIOocytesDonate4);
                        $doc->exportField($this->SelfOocytesMI);
                        $doc->exportField($this->SelfOocytesMII);
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
