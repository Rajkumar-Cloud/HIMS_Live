<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for ivf_oocytedenudation
 */
class ivf_oocytedenudation extends DbTable
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
	public $patient2;
	public $OocytesDonate1;
	public $OocytesDonate2;
	public $ETDonate;
	public $OocyteOrgin;
	public $patient1;
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
	public $donor;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_oocytedenudation';
		$this->TableName = 'ivf_oocytedenudation';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_oocytedenudation`";
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

		// id
		$this->id = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->IsForeignKey = TRUE; // Foreign key field
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// Name
		$this->Name = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->IsForeignKey = TRUE; // Foreign key field
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// ResultDate
		$this->ResultDate = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ResultDate', 'ResultDate', '`ResultDate`', CastDateFieldForLike('`ResultDate`', 11, "DB"), 135, 11, FALSE, '`ResultDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ResultDate->Required = TRUE; // Required field
		$this->ResultDate->Sortable = TRUE; // Allow sort
		$this->ResultDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ResultDate'] = &$this->ResultDate;

		// Surgeon
		$this->Surgeon = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Surgeon', 'Surgeon', '`Surgeon`', '`Surgeon`', 200, -1, FALSE, '`Surgeon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Surgeon->Sortable = TRUE; // Allow sort
		$this->fields['Surgeon'] = &$this->Surgeon;

		// AsstSurgeon
		$this->AsstSurgeon = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_AsstSurgeon', 'AsstSurgeon', '`AsstSurgeon`', '`AsstSurgeon`', 200, -1, FALSE, '`AsstSurgeon`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AsstSurgeon->Sortable = TRUE; // Allow sort
		$this->fields['AsstSurgeon'] = &$this->AsstSurgeon;

		// Anaesthetist
		$this->Anaesthetist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_Anaesthetist', 'Anaesthetist', '`Anaesthetist`', '`Anaesthetist`', 200, -1, FALSE, '`Anaesthetist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Anaesthetist->Sortable = TRUE; // Allow sort
		$this->fields['Anaesthetist'] = &$this->Anaesthetist;

		// AnaestheiaType
		$this->AnaestheiaType = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_AnaestheiaType', 'AnaestheiaType', '`AnaestheiaType`', '`AnaestheiaType`', 200, -1, FALSE, '`AnaestheiaType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AnaestheiaType->Sortable = TRUE; // Allow sort
		$this->fields['AnaestheiaType'] = &$this->AnaestheiaType;

		// PrimaryEmbryologist
		$this->PrimaryEmbryologist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_PrimaryEmbryologist', 'PrimaryEmbryologist', '`PrimaryEmbryologist`', '`PrimaryEmbryologist`', 200, -1, FALSE, '`PrimaryEmbryologist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PrimaryEmbryologist->Sortable = TRUE; // Allow sort
		$this->fields['PrimaryEmbryologist'] = &$this->PrimaryEmbryologist;

		// SecondaryEmbryologist
		$this->SecondaryEmbryologist = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SecondaryEmbryologist', 'SecondaryEmbryologist', '`SecondaryEmbryologist`', '`SecondaryEmbryologist`', 200, -1, FALSE, '`SecondaryEmbryologist`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SecondaryEmbryologist->Sortable = TRUE; // Allow sort
		$this->fields['SecondaryEmbryologist'] = &$this->SecondaryEmbryologist;

		// OPUNotes
		$this->OPUNotes = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OPUNotes', 'OPUNotes', '`OPUNotes`', '`OPUNotes`', 201, -1, FALSE, '`OPUNotes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->OPUNotes->Sortable = TRUE; // Allow sort
		$this->fields['OPUNotes'] = &$this->OPUNotes;

		// NoOfFolliclesRight
		$this->NoOfFolliclesRight = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfFolliclesRight', 'NoOfFolliclesRight', '`NoOfFolliclesRight`', '`NoOfFolliclesRight`', 200, -1, FALSE, '`NoOfFolliclesRight`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfFolliclesRight->Sortable = TRUE; // Allow sort
		$this->fields['NoOfFolliclesRight'] = &$this->NoOfFolliclesRight;

		// NoOfFolliclesLeft
		$this->NoOfFolliclesLeft = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfFolliclesLeft', 'NoOfFolliclesLeft', '`NoOfFolliclesLeft`', '`NoOfFolliclesLeft`', 200, -1, FALSE, '`NoOfFolliclesLeft`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfFolliclesLeft->Sortable = TRUE; // Allow sort
		$this->fields['NoOfFolliclesLeft'] = &$this->NoOfFolliclesLeft;

		// NoOfOocytes
		$this->NoOfOocytes = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_NoOfOocytes', 'NoOfOocytes', '`NoOfOocytes`', '`NoOfOocytes`', 200, -1, FALSE, '`NoOfOocytes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfOocytes->Sortable = TRUE; // Allow sort
		$this->fields['NoOfOocytes'] = &$this->NoOfOocytes;

		// RecordOocyteDenudation
		$this->RecordOocyteDenudation = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_RecordOocyteDenudation', 'RecordOocyteDenudation', '`RecordOocyteDenudation`', '`RecordOocyteDenudation`', 200, -1, FALSE, '`RecordOocyteDenudation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RecordOocyteDenudation->Sortable = TRUE; // Allow sort
		$this->fields['RecordOocyteDenudation'] = &$this->RecordOocyteDenudation;

		// DateOfDenudation
		$this->DateOfDenudation = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_DateOfDenudation', 'DateOfDenudation', '`DateOfDenudation`', CastDateFieldForLike('`DateOfDenudation`', 11, "DB"), 135, 11, FALSE, '`DateOfDenudation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DateOfDenudation->Required = TRUE; // Required field
		$this->DateOfDenudation->Sortable = TRUE; // Allow sort
		$this->DateOfDenudation->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['DateOfDenudation'] = &$this->DateOfDenudation;

		// DenudationDoneBy
		$this->DenudationDoneBy = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_DenudationDoneBy', 'DenudationDoneBy', '`DenudationDoneBy`', '`DenudationDoneBy`', 200, -1, FALSE, '`DenudationDoneBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DenudationDoneBy->Sortable = TRUE; // Allow sort
		$this->fields['DenudationDoneBy'] = &$this->DenudationDoneBy;

		// status
		$this->status = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_status', 'status', '`status`', '`status`', 3, -1, FALSE, '`status`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->status->Sortable = TRUE; // Allow sort
		$this->status->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['status'] = &$this->status;

		// createdby
		$this->createdby = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_createdby', 'createdby', '`createdby`', '`createdby`', 3, -1, FALSE, '`createdby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createdby->Sortable = TRUE; // Allow sort
		$this->createdby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['createdby'] = &$this->createdby;

		// createddatetime
		$this->createddatetime = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_createddatetime', 'createddatetime', '`createddatetime`', CastDateFieldForLike('`createddatetime`', 0, "DB"), 135, 0, FALSE, '`createddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->createddatetime->Sortable = TRUE; // Allow sort
		$this->createddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['createddatetime'] = &$this->createddatetime;

		// modifiedby
		$this->modifiedby = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_modifiedby', 'modifiedby', '`modifiedby`', '`modifiedby`', 3, -1, FALSE, '`modifiedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifiedby->Sortable = TRUE; // Allow sort
		$this->modifiedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['modifiedby'] = &$this->modifiedby;

		// modifieddatetime
		$this->modifieddatetime = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_modifieddatetime', 'modifieddatetime', '`modifieddatetime`', CastDateFieldForLike('`modifieddatetime`', 0, "DB"), 135, 0, FALSE, '`modifieddatetime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->modifieddatetime->Sortable = TRUE; // Allow sort
		$this->modifieddatetime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['modifieddatetime'] = &$this->modifieddatetime;

		// TidNo
		$this->TidNo = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->IsForeignKey = TRUE; // Foreign key field
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;

		// ExpFollicles
		$this->ExpFollicles = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ExpFollicles', 'ExpFollicles', '`ExpFollicles`', '`ExpFollicles`', 200, -1, FALSE, '`ExpFollicles`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExpFollicles->Sortable = TRUE; // Allow sort
		$this->fields['ExpFollicles'] = &$this->ExpFollicles;

		// SecondaryDenudationDoneBy
		$this->SecondaryDenudationDoneBy = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SecondaryDenudationDoneBy', 'SecondaryDenudationDoneBy', '`SecondaryDenudationDoneBy`', '`SecondaryDenudationDoneBy`', 200, -1, FALSE, '`SecondaryDenudationDoneBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SecondaryDenudationDoneBy->Sortable = TRUE; // Allow sort
		$this->fields['SecondaryDenudationDoneBy'] = &$this->SecondaryDenudationDoneBy;

		// patient2
		$this->patient2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient2', 'patient2', '`patient2`', '`patient2`', 3, -1, FALSE, '`patient2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient2->Sortable = TRUE; // Allow sort
		$this->patient2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient2->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient2->Lookup = new Lookup('patient2', 'view_ongoing_treatment', FALSE, 'bid', ["bPatientID","first_name","mobile_no","bid"], [], [], [], [], [], [], '', '');
		$this->fields['patient2'] = &$this->patient2;

		// OocytesDonate1
		$this->OocytesDonate1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate1', 'OocytesDonate1', '`OocytesDonate1`', '`OocytesDonate1`', 200, -1, FALSE, '`OocytesDonate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OocytesDonate1->Sortable = TRUE; // Allow sort
		$this->fields['OocytesDonate1'] = &$this->OocytesDonate1;

		// OocytesDonate2
		$this->OocytesDonate2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate2', 'OocytesDonate2', '`OocytesDonate2`', '`OocytesDonate2`', 200, -1, FALSE, '`OocytesDonate2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OocytesDonate2->Sortable = TRUE; // Allow sort
		$this->fields['OocytesDonate2'] = &$this->OocytesDonate2;

		// ETDonate
		$this->ETDonate = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_ETDonate', 'ETDonate', '`ETDonate`', '`ETDonate`', 200, -1, FALSE, '`ETDonate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ETDonate->Sortable = TRUE; // Allow sort
		$this->fields['ETDonate'] = &$this->ETDonate;

		// OocyteOrgin
		$this->OocyteOrgin = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocyteOrgin', 'OocyteOrgin', '`OocyteOrgin`', '`OocyteOrgin`', 200, -1, FALSE, '`OocyteOrgin`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->OocyteOrgin->Sortable = TRUE; // Allow sort
		$this->OocyteOrgin->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->OocyteOrgin->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->OocyteOrgin->Lookup = new Lookup('OocyteOrgin', 'ivf_oocytedenudation', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->OocyteOrgin->OptionCount = 3;
		$this->fields['OocyteOrgin'] = &$this->OocyteOrgin;

		// patient1
		$this->patient1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient1', 'patient1', '`patient1`', '`patient1`', 3, -1, FALSE, '`patient1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient1->Sortable = TRUE; // Allow sort
		$this->patient1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient1->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient1->Lookup = new Lookup('patient1', 'view_ongoing_treatment', FALSE, 'bid', ["bPatientID","first_name","mobile_no","bid"], [], [], [], [], [], [], '', '');
		$this->fields['patient1'] = &$this->patient1;

		// OocyteType
		$this->OocyteType = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocyteType', 'OocyteType', '`OocyteType`', '`OocyteType`', 200, -1, FALSE, '`OocyteType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->OocyteType->Sortable = TRUE; // Allow sort
		$this->OocyteType->Lookup = new Lookup('OocyteType', 'ivf_oocytedenudation', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->OocyteType->OptionCount = 2;
		$this->fields['OocyteType'] = &$this->OocyteType;

		// MIOocytesDonate1
		$this->MIOocytesDonate1 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate1', 'MIOocytesDonate1', '`MIOocytesDonate1`', '`MIOocytesDonate1`', 200, -1, FALSE, '`MIOocytesDonate1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MIOocytesDonate1->Sortable = TRUE; // Allow sort
		$this->fields['MIOocytesDonate1'] = &$this->MIOocytesDonate1;

		// MIOocytesDonate2
		$this->MIOocytesDonate2 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate2', 'MIOocytesDonate2', '`MIOocytesDonate2`', '`MIOocytesDonate2`', 200, -1, FALSE, '`MIOocytesDonate2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MIOocytesDonate2->Sortable = TRUE; // Allow sort
		$this->fields['MIOocytesDonate2'] = &$this->MIOocytesDonate2;

		// SelfMI
		$this->SelfMI = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfMI', 'SelfMI', '`SelfMI`', '`SelfMI`', 200, -1, FALSE, '`SelfMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SelfMI->Sortable = TRUE; // Allow sort
		$this->fields['SelfMI'] = &$this->SelfMI;

		// SelfMII
		$this->SelfMII = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfMII', 'SelfMII', '`SelfMII`', '`SelfMII`', 200, -1, FALSE, '`SelfMII`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SelfMII->Sortable = TRUE; // Allow sort
		$this->fields['SelfMII'] = &$this->SelfMII;

		// patient3
		$this->patient3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient3', 'patient3', '`patient3`', '`patient3`', 3, -1, FALSE, '`patient3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient3->Sortable = TRUE; // Allow sort
		$this->patient3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient3->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient3->Lookup = new Lookup('patient3', 'view_ongoing_treatment', FALSE, 'bid', ["bPatientID","first_name","mobile_no","bid"], [], [], [], [], [], [], '', '');
		$this->fields['patient3'] = &$this->patient3;

		// patient4
		$this->patient4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_patient4', 'patient4', '`patient4`', '`patient4`', 3, -1, FALSE, '`patient4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->patient4->Sortable = TRUE; // Allow sort
		$this->patient4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->patient4->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->patient4->Lookup = new Lookup('patient4', 'view_ongoing_treatment', FALSE, 'bid', ["bPatientID","first_name","mobile_no","bid"], [], [], [], [], [], [], '', '');
		$this->fields['patient4'] = &$this->patient4;

		// OocytesDonate3
		$this->OocytesDonate3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate3', 'OocytesDonate3', '`OocytesDonate3`', '`OocytesDonate3`', 200, -1, FALSE, '`OocytesDonate3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OocytesDonate3->Sortable = TRUE; // Allow sort
		$this->fields['OocytesDonate3'] = &$this->OocytesDonate3;

		// OocytesDonate4
		$this->OocytesDonate4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_OocytesDonate4', 'OocytesDonate4', '`OocytesDonate4`', '`OocytesDonate4`', 200, -1, FALSE, '`OocytesDonate4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OocytesDonate4->Sortable = TRUE; // Allow sort
		$this->fields['OocytesDonate4'] = &$this->OocytesDonate4;

		// MIOocytesDonate3
		$this->MIOocytesDonate3 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate3', 'MIOocytesDonate3', '`MIOocytesDonate3`', '`MIOocytesDonate3`', 200, -1, FALSE, '`MIOocytesDonate3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MIOocytesDonate3->Sortable = TRUE; // Allow sort
		$this->fields['MIOocytesDonate3'] = &$this->MIOocytesDonate3;

		// MIOocytesDonate4
		$this->MIOocytesDonate4 = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_MIOocytesDonate4', 'MIOocytesDonate4', '`MIOocytesDonate4`', '`MIOocytesDonate4`', 200, -1, FALSE, '`MIOocytesDonate4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MIOocytesDonate4->Sortable = TRUE; // Allow sort
		$this->fields['MIOocytesDonate4'] = &$this->MIOocytesDonate4;

		// SelfOocytesMI
		$this->SelfOocytesMI = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfOocytesMI', 'SelfOocytesMI', '`SelfOocytesMI`', '`SelfOocytesMI`', 200, -1, FALSE, '`SelfOocytesMI`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SelfOocytesMI->Sortable = TRUE; // Allow sort
		$this->fields['SelfOocytesMI'] = &$this->SelfOocytesMI;

		// SelfOocytesMII
		$this->SelfOocytesMII = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_SelfOocytesMII', 'SelfOocytesMII', '`SelfOocytesMII`', '`SelfOocytesMII`', 200, -1, FALSE, '`SelfOocytesMII`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SelfOocytesMII->Sortable = TRUE; // Allow sort
		$this->fields['SelfOocytesMII'] = &$this->SelfOocytesMII;

		// donor
		$this->donor = new DbField('ivf_oocytedenudation', 'ivf_oocytedenudation', 'x_donor', 'donor', '`donor`', '`donor`', 3, -1, FALSE, '`donor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->donor->Sortable = TRUE; // Allow sort
		$this->donor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['donor'] = &$this->donor;
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
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
			if ($this->TidNo->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->RIDNo->getSessionValue() <> "")
				$masterFilter .= " AND `RIDNO`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() <> "")
				$masterFilter .= " AND `Name`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_STRING, "DB");
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
		if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
			if ($this->TidNo->getSessionValue() <> "")
				$detailFilter .= "`TidNo`=" . QuotedValue($this->TidNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->RIDNo->getSessionValue() <> "")
				$detailFilter .= " AND `RIDNo`=" . QuotedValue($this->RIDNo->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
			if ($this->Name->getSessionValue() <> "")
				$detailFilter .= " AND `Name`=" . QuotedValue($this->Name->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_view_ivf_treatment()
	{
		return "`id`=@id@ AND `RIDNO`=@RIDNO@ AND `Name`='@Name@'";
	}

	// Detail filter
	public function sqlDetailFilter_view_ivf_treatment()
	{
		return "`TidNo`=@TidNo@ AND `RIDNo`=@RIDNo@ AND `Name`='@Name@'";
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
		if ($this->getCurrentDetailTable() == "ivf_embryology_chart") {
			$detailUrl = $GLOBALS["ivf_embryology_chart"]->getListUrl() . "?" . TABLE_SHOW_MASTER . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "ivf_oocytedenudationlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`ivf_oocytedenudation`";
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
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
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
		$this->patient2->DbValue = $row['patient2'];
		$this->OocytesDonate1->DbValue = $row['OocytesDonate1'];
		$this->OocytesDonate2->DbValue = $row['OocytesDonate2'];
		$this->ETDonate->DbValue = $row['ETDonate'];
		$this->OocyteOrgin->DbValue = $row['OocyteOrgin'];
		$this->patient1->DbValue = $row['patient1'];
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
		$this->donor->DbValue = $row['donor'];
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
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
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
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "ivf_oocytedenudationlist.php";
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
		if ($pageName == "ivf_oocytedenudationview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_oocytedenudationedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_oocytedenudationadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_oocytedenudationlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivf_oocytedenudationview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_oocytedenudationview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "ivf_oocytedenudationadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_oocytedenudationadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivf_oocytedenudationedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_oocytedenudationedit.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
			$url = $this->keyUrl("ivf_oocytedenudationadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_oocytedenudationadd.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
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
		return $this->keyUrl("ivf_oocytedenudationdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "view_ivf_treatment" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->TidNo->CurrentValue);
			$url .= "&fk_RIDNO=" . urlencode($this->RIDNo->CurrentValue);
			$url .= "&fk_Name=" . urlencode($this->Name->CurrentValue);
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
		if ($parm <> "")
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
			$this->id->CurrentValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->RIDNo->setDbValue($rs->fields('RIDNo'));
		$this->Name->setDbValue($rs->fields('Name'));
		$this->ResultDate->setDbValue($rs->fields('ResultDate'));
		$this->Surgeon->setDbValue($rs->fields('Surgeon'));
		$this->AsstSurgeon->setDbValue($rs->fields('AsstSurgeon'));
		$this->Anaesthetist->setDbValue($rs->fields('Anaesthetist'));
		$this->AnaestheiaType->setDbValue($rs->fields('AnaestheiaType'));
		$this->PrimaryEmbryologist->setDbValue($rs->fields('PrimaryEmbryologist'));
		$this->SecondaryEmbryologist->setDbValue($rs->fields('SecondaryEmbryologist'));
		$this->OPUNotes->setDbValue($rs->fields('OPUNotes'));
		$this->NoOfFolliclesRight->setDbValue($rs->fields('NoOfFolliclesRight'));
		$this->NoOfFolliclesLeft->setDbValue($rs->fields('NoOfFolliclesLeft'));
		$this->NoOfOocytes->setDbValue($rs->fields('NoOfOocytes'));
		$this->RecordOocyteDenudation->setDbValue($rs->fields('RecordOocyteDenudation'));
		$this->DateOfDenudation->setDbValue($rs->fields('DateOfDenudation'));
		$this->DenudationDoneBy->setDbValue($rs->fields('DenudationDoneBy'));
		$this->status->setDbValue($rs->fields('status'));
		$this->createdby->setDbValue($rs->fields('createdby'));
		$this->createddatetime->setDbValue($rs->fields('createddatetime'));
		$this->modifiedby->setDbValue($rs->fields('modifiedby'));
		$this->modifieddatetime->setDbValue($rs->fields('modifieddatetime'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
		$this->ExpFollicles->setDbValue($rs->fields('ExpFollicles'));
		$this->SecondaryDenudationDoneBy->setDbValue($rs->fields('SecondaryDenudationDoneBy'));
		$this->patient2->setDbValue($rs->fields('patient2'));
		$this->OocytesDonate1->setDbValue($rs->fields('OocytesDonate1'));
		$this->OocytesDonate2->setDbValue($rs->fields('OocytesDonate2'));
		$this->ETDonate->setDbValue($rs->fields('ETDonate'));
		$this->OocyteOrgin->setDbValue($rs->fields('OocyteOrgin'));
		$this->patient1->setDbValue($rs->fields('patient1'));
		$this->OocyteType->setDbValue($rs->fields('OocyteType'));
		$this->MIOocytesDonate1->setDbValue($rs->fields('MIOocytesDonate1'));
		$this->MIOocytesDonate2->setDbValue($rs->fields('MIOocytesDonate2'));
		$this->SelfMI->setDbValue($rs->fields('SelfMI'));
		$this->SelfMII->setDbValue($rs->fields('SelfMII'));
		$this->patient3->setDbValue($rs->fields('patient3'));
		$this->patient4->setDbValue($rs->fields('patient4'));
		$this->OocytesDonate3->setDbValue($rs->fields('OocytesDonate3'));
		$this->OocytesDonate4->setDbValue($rs->fields('OocytesDonate4'));
		$this->MIOocytesDonate3->setDbValue($rs->fields('MIOocytesDonate3'));
		$this->MIOocytesDonate4->setDbValue($rs->fields('MIOocytesDonate4'));
		$this->SelfOocytesMI->setDbValue($rs->fields('SelfOocytesMI'));
		$this->SelfOocytesMII->setDbValue($rs->fields('SelfOocytesMII'));
		$this->donor->setDbValue($rs->fields('donor'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

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
		// patient2
		// OocytesDonate1
		// OocytesDonate2
		// ETDonate
		// OocyteOrgin
		// patient1
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
		// donor
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
		$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 11);
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
		$this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 11);
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

		// patient2
		$curVal = strval($this->patient2->CurrentValue);
		if ($curVal <> "") {
			$this->patient2->ViewValue = $this->patient2->lookupCacheOption($curVal);
			if ($this->patient2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->patient2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->patient2->ViewValue = $this->patient2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->patient2->ViewValue = $this->patient2->CurrentValue;
				}
			}
		} else {
			$this->patient2->ViewValue = NULL;
		}
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

		// OocyteOrgin
		if (strval($this->OocyteOrgin->CurrentValue) <> "") {
			$this->OocyteOrgin->ViewValue = $this->OocyteOrgin->optionCaption($this->OocyteOrgin->CurrentValue);
		} else {
			$this->OocyteOrgin->ViewValue = NULL;
		}
		$this->OocyteOrgin->ViewCustomAttributes = "";

		// patient1
		$curVal = strval($this->patient1->CurrentValue);
		if ($curVal <> "") {
			$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
			if ($this->patient1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->patient1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->patient1->ViewValue = $this->patient1->CurrentValue;
				}
			}
		} else {
			$this->patient1->ViewValue = NULL;
		}
		$this->patient1->ViewCustomAttributes = "";

		// OocyteType
		if (strval($this->OocyteType->CurrentValue) <> "") {
			$this->OocyteType->ViewValue = new OptionValues();
			$arwrk = explode(",", strval($this->OocyteType->CurrentValue));
			$cnt = count($arwrk);
			for ($ari = 0; $ari < $cnt; $ari++)
				$this->OocyteType->ViewValue->add($this->OocyteType->optionCaption(trim($arwrk[$ari])));
		} else {
			$this->OocyteType->ViewValue = NULL;
		}
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
		$curVal = strval($this->patient3->CurrentValue);
		if ($curVal <> "") {
			$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
			if ($this->patient3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->patient3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->patient3->ViewValue = $this->patient3->CurrentValue;
				}
			}
		} else {
			$this->patient3->ViewValue = NULL;
		}
		$this->patient3->ViewCustomAttributes = "";

		// patient4
		$curVal = strval($this->patient4->CurrentValue);
		if ($curVal <> "") {
			$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
			if ($this->patient4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->patient4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$arwrk[3] = $rswrk->fields('df3');
					$arwrk[4] = $rswrk->fields('df4');
					$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->patient4->ViewValue = $this->patient4->CurrentValue;
				}
			}
		} else {
			$this->patient4->ViewValue = NULL;
		}
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

		// donor
		$this->donor->ViewValue = $this->donor->CurrentValue;
		$this->donor->ViewValue = FormatNumber($this->donor->ViewValue, 0, -2, -2, -2);
		$this->donor->ViewCustomAttributes = "";

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

		// OocyteOrgin
		$this->OocyteOrgin->LinkCustomAttributes = "";
		$this->OocyteOrgin->HrefValue = "";
		$this->OocyteOrgin->TooltipValue = "";

		// patient1
		$this->patient1->LinkCustomAttributes = "";
		$this->patient1->HrefValue = "";
		$this->patient1->TooltipValue = "";

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

		// donor
		$this->donor->LinkCustomAttributes = "";
		$this->donor->HrefValue = "";
		$this->donor->TooltipValue = "";

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

		// RIDNo
		$this->RIDNo->EditAttrs["class"] = "form-control";
		$this->RIDNo->EditCustomAttributes = "";
		if ($this->RIDNo->getSessionValue() <> "") {
			$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
		$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
		$this->RIDNo->ViewCustomAttributes = "";
		} else {
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
		}

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if ($this->Name->getSessionValue() <> "") {
			$this->Name->CurrentValue = $this->Name->getSessionValue();
		$this->Name->ViewValue = $this->Name->CurrentValue;
		$this->Name->ViewCustomAttributes = "";
		} else {
		if (REMOVE_XSS)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
		}

		// ResultDate
		$this->ResultDate->EditAttrs["class"] = "form-control";
		$this->ResultDate->EditCustomAttributes = "";
		$this->ResultDate->EditValue = FormatDateTime($this->ResultDate->CurrentValue, 11);
		$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

		// Surgeon
		$this->Surgeon->EditAttrs["class"] = "form-control";
		$this->Surgeon->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
		$this->Surgeon->EditValue = $this->Surgeon->CurrentValue;
		$this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

		// AsstSurgeon
		$this->AsstSurgeon->EditAttrs["class"] = "form-control";
		$this->AsstSurgeon->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
		$this->AsstSurgeon->EditValue = $this->AsstSurgeon->CurrentValue;
		$this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

		// Anaesthetist
		$this->Anaesthetist->EditAttrs["class"] = "form-control";
		$this->Anaesthetist->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
		$this->Anaesthetist->EditValue = $this->Anaesthetist->CurrentValue;
		$this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

		// AnaestheiaType
		$this->AnaestheiaType->EditAttrs["class"] = "form-control";
		$this->AnaestheiaType->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
		$this->AnaestheiaType->EditValue = $this->AnaestheiaType->CurrentValue;
		$this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

		// PrimaryEmbryologist
		$this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
		$this->PrimaryEmbryologist->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
		$this->PrimaryEmbryologist->EditValue = $this->PrimaryEmbryologist->CurrentValue;
		$this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

		// SecondaryEmbryologist
		$this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
		$this->SecondaryEmbryologist->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
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
		if (REMOVE_XSS)
			$this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
		$this->NoOfFolliclesRight->EditValue = $this->NoOfFolliclesRight->CurrentValue;
		$this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

		// NoOfFolliclesLeft
		$this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
		$this->NoOfFolliclesLeft->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
		$this->NoOfFolliclesLeft->EditValue = $this->NoOfFolliclesLeft->CurrentValue;
		$this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

		// NoOfOocytes
		$this->NoOfOocytes->EditAttrs["class"] = "form-control";
		$this->NoOfOocytes->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
		$this->NoOfOocytes->EditValue = $this->NoOfOocytes->CurrentValue;
		$this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

		// RecordOocyteDenudation
		$this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
		$this->RecordOocyteDenudation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
		$this->RecordOocyteDenudation->EditValue = $this->RecordOocyteDenudation->CurrentValue;
		$this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

		// DateOfDenudation
		$this->DateOfDenudation->EditAttrs["class"] = "form-control";
		$this->DateOfDenudation->EditCustomAttributes = "";
		$this->DateOfDenudation->EditValue = FormatDateTime($this->DateOfDenudation->CurrentValue, 11);
		$this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

		// DenudationDoneBy
		$this->DenudationDoneBy->EditAttrs["class"] = "form-control";
		$this->DenudationDoneBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
		$this->DenudationDoneBy->EditValue = $this->DenudationDoneBy->CurrentValue;
		$this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

		// status
		$this->status->EditAttrs["class"] = "form-control";
		$this->status->EditCustomAttributes = "";
		$this->status->EditValue = $this->status->CurrentValue;
		$this->status->PlaceHolder = RemoveHtml($this->status->caption());

		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TidNo

		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		if ($this->TidNo->getSessionValue() <> "") {
			$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";
		} else {
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
		}

		// ExpFollicles
		$this->ExpFollicles->EditAttrs["class"] = "form-control";
		$this->ExpFollicles->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
		$this->ExpFollicles->EditValue = $this->ExpFollicles->CurrentValue;
		$this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

		// SecondaryDenudationDoneBy
		$this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
		$this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
		$this->SecondaryDenudationDoneBy->EditValue = $this->SecondaryDenudationDoneBy->CurrentValue;
		$this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

		// patient2
		$this->patient2->EditAttrs["class"] = "form-control";
		$this->patient2->EditCustomAttributes = "";

		// OocytesDonate1
		$this->OocytesDonate1->EditAttrs["class"] = "form-control";
		$this->OocytesDonate1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OocytesDonate1->CurrentValue = HtmlDecode($this->OocytesDonate1->CurrentValue);
		$this->OocytesDonate1->EditValue = $this->OocytesDonate1->CurrentValue;
		$this->OocytesDonate1->PlaceHolder = RemoveHtml($this->OocytesDonate1->caption());

		// OocytesDonate2
		$this->OocytesDonate2->EditAttrs["class"] = "form-control";
		$this->OocytesDonate2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OocytesDonate2->CurrentValue = HtmlDecode($this->OocytesDonate2->CurrentValue);
		$this->OocytesDonate2->EditValue = $this->OocytesDonate2->CurrentValue;
		$this->OocytesDonate2->PlaceHolder = RemoveHtml($this->OocytesDonate2->caption());

		// ETDonate
		$this->ETDonate->EditAttrs["class"] = "form-control";
		$this->ETDonate->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ETDonate->CurrentValue = HtmlDecode($this->ETDonate->CurrentValue);
		$this->ETDonate->EditValue = $this->ETDonate->CurrentValue;
		$this->ETDonate->PlaceHolder = RemoveHtml($this->ETDonate->caption());

		// OocyteOrgin
		$this->OocyteOrgin->EditAttrs["class"] = "form-control";
		$this->OocyteOrgin->EditCustomAttributes = "";
		$this->OocyteOrgin->EditValue = $this->OocyteOrgin->options(TRUE);

		// patient1
		$this->patient1->EditAttrs["class"] = "form-control";
		$this->patient1->EditCustomAttributes = "";

		// OocyteType
		$this->OocyteType->EditCustomAttributes = "";
		$this->OocyteType->EditValue = $this->OocyteType->options(FALSE);

		// MIOocytesDonate1
		$this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
		$this->MIOocytesDonate1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
		$this->MIOocytesDonate1->EditValue = $this->MIOocytesDonate1->CurrentValue;
		$this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

		// MIOocytesDonate2
		$this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
		$this->MIOocytesDonate2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
		$this->MIOocytesDonate2->EditValue = $this->MIOocytesDonate2->CurrentValue;
		$this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

		// SelfMI
		$this->SelfMI->EditAttrs["class"] = "form-control";
		$this->SelfMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
		$this->SelfMI->EditValue = $this->SelfMI->CurrentValue;
		$this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

		// SelfMII
		$this->SelfMII->EditAttrs["class"] = "form-control";
		$this->SelfMII->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
		$this->SelfMII->EditValue = $this->SelfMII->CurrentValue;
		$this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

		// patient3
		$this->patient3->EditAttrs["class"] = "form-control";
		$this->patient3->EditCustomAttributes = "";

		// patient4
		$this->patient4->EditAttrs["class"] = "form-control";
		$this->patient4->EditCustomAttributes = "";

		// OocytesDonate3
		$this->OocytesDonate3->EditAttrs["class"] = "form-control";
		$this->OocytesDonate3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
		$this->OocytesDonate3->EditValue = $this->OocytesDonate3->CurrentValue;
		$this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

		// OocytesDonate4
		$this->OocytesDonate4->EditAttrs["class"] = "form-control";
		$this->OocytesDonate4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
		$this->OocytesDonate4->EditValue = $this->OocytesDonate4->CurrentValue;
		$this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

		// MIOocytesDonate3
		$this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
		$this->MIOocytesDonate3->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
		$this->MIOocytesDonate3->EditValue = $this->MIOocytesDonate3->CurrentValue;
		$this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

		// MIOocytesDonate4
		$this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
		$this->MIOocytesDonate4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
		$this->MIOocytesDonate4->EditValue = $this->MIOocytesDonate4->CurrentValue;
		$this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

		// SelfOocytesMI
		$this->SelfOocytesMI->EditAttrs["class"] = "form-control";
		$this->SelfOocytesMI->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
		$this->SelfOocytesMI->EditValue = $this->SelfOocytesMI->CurrentValue;
		$this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

		// SelfOocytesMII
		$this->SelfOocytesMII->EditAttrs["class"] = "form-control";
		$this->SelfOocytesMII->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
		$this->SelfOocytesMII->EditValue = $this->SelfOocytesMII->CurrentValue;
		$this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

		// donor
		$this->donor->EditAttrs["class"] = "form-control";
		$this->donor->EditCustomAttributes = "";
		$this->donor->EditValue = $this->donor->CurrentValue;
		$this->donor->PlaceHolder = RemoveHtml($this->donor->caption());

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
					$doc->exportCaption($this->patient2);
					$doc->exportCaption($this->OocytesDonate1);
					$doc->exportCaption($this->OocytesDonate2);
					$doc->exportCaption($this->ETDonate);
					$doc->exportCaption($this->OocyteOrgin);
					$doc->exportCaption($this->patient1);
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
					$doc->exportCaption($this->donor);
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
					$doc->exportCaption($this->donor);
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
						$doc->exportField($this->patient2);
						$doc->exportField($this->OocytesDonate1);
						$doc->exportField($this->OocytesDonate2);
						$doc->exportField($this->ETDonate);
						$doc->exportField($this->OocyteOrgin);
						$doc->exportField($this->patient1);
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
						$doc->exportField($this->donor);
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
						$doc->exportField($this->donor);
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
		//	$rsnew["RIDNo"]  =	$_POST["RIDNO"];
		//	$rsnew["Name"] = $_POST["Female"];
		//	$rsnew["TidNo"] =	$_POST["TidNO"];

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	$dbhelper = &DbHelper();
				if($rsnew["NoOfOocytes"] > 0)
				{
					if($rsnew["OocytesDonate1"]> 0)
					{
						$doner1 = $rsnew["OocytesDonate1"];
					}
					if($rsnew["OocytesDonate2"]> 0)
					{
						 $doner2 = $rsnew["OocytesDonate2"];
					}
					if($rsnew["ETDonate"]> 0)
					{
						$ETDonate = $rsnew["ETDonate"];
					}
						$Donor = $rsnew["RIDNo"];
					$RIDNo = $rsnew["RIDNo"];
						$Name = $rsnew["Name"];
						$TidNo = $rsnew["TidNo"];
						$DidNO = $rsnew["id"];
						$patient1 = $rsnew["patient1"];
						$patient2 = $rsnew["patient2"];
						$patient3 = $rsnew["patient3"];
						$patient4 = $rsnew["patient4"];
	if($patient1 != '')
	{
			$sql = "select * from ganeshkumar_bjhims.ivf_treatment_plan where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_treatment_plan where Name='".$patient1."' ); ";
			$results = $dbhelper->ExecuteRows($sql);
			$RIDNo = $results[0]["RIDNO"];
			$Name = $patient1;
			$TidNo = $results[0]["id"];
			$sqlI = "
	INSERT INTO `ganeshkumar_bjhims`.`ivf_oocytedenudation`
	 (`RIDNo`, `Name`, `ResultDate`, `Surgeon`, `AsstSurgeon`,
	 `Anaesthetist`, `AnaestheiaType`, `PrimaryEmbryologist`, 
	 `SecondaryEmbryologist`, `NoOfFolliclesRight`, `NoOfFolliclesLeft`, 
	 `NoOfOocytes`, `DateOfDenudation`, `DenudationDoneBy`, `createddatetime`, 
	 `modifieddatetime`, `TidNo`, `ExpFollicles`, `SecondaryDenudationDoneBy`,
	 `OocyteOrgin` ,`donor` ) 
	 VALUES
	 ('".$RIDNo."', '".$Name."', '".$rsnew["ResultDate"]."', '".$rsnew["Surgeon"]."', '".$rsnew["AsstSurgeon"]."',
	 '".$rsnew["Anaesthetist"]."', '".$rsnew["AnaestheiaType"]."', '".$rsnew["PrimaryEmbryologist"]."',
	 '".$rsnew["SecondaryEmbryologist"]."', '".$rsnew["NoOfFolliclesRight"]."', '".$rsnew["NoOfFolliclesLeft"]."', 
	 '".$rsnew["NoOfOocytes"]."', '".$rsnew["DateOfDenudation"]."', '".$rsnew["DenudationDoneBy"]."', '".$rsnew["createddatetime"]."',
	 '".$rsnew["modifieddatetime"]."', '".$TidNo."', '".$rsnew["ExpFollicles"]."', '".$rsnew["SecondaryDenudationDoneBy"]."', 
	 '".$rsnew["OocyteOrgin"]."' ,  '".$Donor."' );";
			$resultsI = $dbhelper->ExecuteRows($sqlI);
	}
	if($patient2 != '')
	{
			$sql = "select * from ganeshkumar_bjhims.ivf_treatment_plan where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_treatment_plan where Name='".$patient2."' ); ";
			$results = $dbhelper->ExecuteRows($sql);
			$RIDNo = $results[0]["RIDNO"];
			$Name = $patient2;
			$TidNo = $results[0]["id"];
			$sqlI = "
	INSERT INTO `ganeshkumar_bjhims`.`ivf_oocytedenudation`
	 (`RIDNo`, `Name`, `ResultDate`, `Surgeon`, `AsstSurgeon`,
	 `Anaesthetist`, `AnaestheiaType`, `PrimaryEmbryologist`, 
	 `SecondaryEmbryologist`, `NoOfFolliclesRight`, `NoOfFolliclesLeft`, 
	 `NoOfOocytes`, `DateOfDenudation`, `DenudationDoneBy`, `createddatetime`, 
	 `modifieddatetime`, `TidNo`, `ExpFollicles`, `SecondaryDenudationDoneBy`,
	 `OocyteOrgin`  ,`donor` ) 
	 VALUES
	 ('".$RIDNo."', '".$Name."', '".$rsnew["ResultDate"]."', '".$rsnew["Surgeon"]."', '".$rsnew["AsstSurgeon"]."',
	 '".$rsnew["Anaesthetist"]."', '".$rsnew["AnaestheiaType"]."', '".$rsnew["PrimaryEmbryologist"]."',
	 '".$rsnew["SecondaryEmbryologist"]."', '".$rsnew["NoOfFolliclesRight"]."', '".$rsnew["NoOfFolliclesLeft"]."', 
	 '".$rsnew["NoOfOocytes"]."', '".$rsnew["DateOfDenudation"]."', '".$rsnew["DenudationDoneBy"]."', '".$rsnew["createddatetime"]."',
	 '".$rsnew["modifieddatetime"]."', '".$TidNo."', '".$rsnew["ExpFollicles"]."', '".$rsnew["SecondaryDenudationDoneBy"]."', 
	 '".$rsnew["OocyteOrgin"]."'  ,  '".$Donor."' );";
			$resultsI = $dbhelper->ExecuteRows($sqlI);
	}
	if($patient3 != '')
	{
			$sql = "select * from ganeshkumar_bjhims.ivf_treatment_plan where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_treatment_plan where Name='".$patient3."' ); ";
			$results = $dbhelper->ExecuteRows($sql);
			$RIDNo = $results[0]["RIDNO"];
			$Name = $patient3;
			$TidNo = $results[0]["id"];
			$sqlI = "
	INSERT INTO `ganeshkumar_bjhims`.`ivf_oocytedenudation`
	 (`RIDNo`, `Name`, `ResultDate`, `Surgeon`, `AsstSurgeon`,
	 `Anaesthetist`, `AnaestheiaType`, `PrimaryEmbryologist`, 
	 `SecondaryEmbryologist`, `NoOfFolliclesRight`, `NoOfFolliclesLeft`, 
	 `NoOfOocytes`, `DateOfDenudation`, `DenudationDoneBy`, `createddatetime`, 
	 `modifieddatetime`, `TidNo`, `ExpFollicles`, `SecondaryDenudationDoneBy`,
	 `OocyteOrgin`  ,`donor` ) 
	 VALUES
	 ('".$RIDNo."', '".$Name."', '".$rsnew["ResultDate"]."', '".$rsnew["Surgeon"]."', '".$rsnew["AsstSurgeon"]."',
	 '".$rsnew["Anaesthetist"]."', '".$rsnew["AnaestheiaType"]."', '".$rsnew["PrimaryEmbryologist"]."',
	 '".$rsnew["SecondaryEmbryologist"]."', '".$rsnew["NoOfFolliclesRight"]."', '".$rsnew["NoOfFolliclesLeft"]."', 
	 '".$rsnew["NoOfOocytes"]."', '".$rsnew["DateOfDenudation"]."', '".$rsnew["DenudationDoneBy"]."', '".$rsnew["createddatetime"]."',
	 '".$rsnew["modifieddatetime"]."', '".$TidNo."', '".$rsnew["ExpFollicles"]."', '".$rsnew["SecondaryDenudationDoneBy"]."', 
	 '".$rsnew["OocyteOrgin"]."'  ,  '".$Donor."' );";
			$resultsI = $dbhelper->ExecuteRows($sqlI);
	}
	if($patient4 != '')
	{
			$sql = "select * from ganeshkumar_bjhims.ivf_treatment_plan where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_treatment_plan where Name='".$patient4."' ); ";
			$results = $dbhelper->ExecuteRows($sql);
			$RIDNo = $results[0]["RIDNO"];
			$Name = $patient4;
			$TidNo = $results[0]["id"];
			$sqlI = "
	INSERT INTO `ganeshkumar_bjhims`.`ivf_oocytedenudation`
	 (`RIDNo`, `Name`, `ResultDate`, `Surgeon`, `AsstSurgeon`,
	 `Anaesthetist`, `AnaestheiaType`, `PrimaryEmbryologist`, 
	 `SecondaryEmbryologist`, `NoOfFolliclesRight`, `NoOfFolliclesLeft`, 
	 `NoOfOocytes`, `DateOfDenudation`, `DenudationDoneBy`, `createddatetime`, 
	 `modifieddatetime`, `TidNo`, `ExpFollicles`, `SecondaryDenudationDoneBy`,
	 `OocyteOrgin`  ,`donor` ) 
	 VALUES
	 ('".$RIDNo."', '".$Name."', '".$rsnew["ResultDate"]."', '".$rsnew["Surgeon"]."', '".$rsnew["AsstSurgeon"]."',
	 '".$rsnew["Anaesthetist"]."', '".$rsnew["AnaestheiaType"]."', '".$rsnew["PrimaryEmbryologist"]."',
	 '".$rsnew["SecondaryEmbryologist"]."', '".$rsnew["NoOfFolliclesRight"]."', '".$rsnew["NoOfFolliclesLeft"]."', 
	 '".$rsnew["NoOfOocytes"]."', '".$rsnew["DateOfDenudation"]."', '".$rsnew["DenudationDoneBy"]."', '".$rsnew["createddatetime"]."',
	 '".$rsnew["modifieddatetime"]."', '".$TidNo."', '".$rsnew["ExpFollicles"]."', '".$rsnew["SecondaryDenudationDoneBy"]."', 
	 '".$rsnew["OocyteOrgin"]."'  ,  '".$Donor."' );";
			$resultsI = $dbhelper->ExecuteRows($sqlI);
	}
					$TotalNoOfOocytes = $rsnew["NoOfOocytes"];
					$PatientOocytes = $TotalNoOfOocytes - ($doner1 + $doner2 + $ETDonate);
					for ($i = 1; $i <= $TotalNoOfOocytes; $i++) {

					   // print $array[$i];
						$OocyteNoID = "OocyteNo" . $i;
						$StageID = "Stage" . $i;
						$RemarksID = "Remarks" . $i;
						$OocyteTypeID = "OocyteType" . $i;
						$PatientID = "PatientID" . $i;
						$OocyteNo =	$_POST[$OocyteNoID];
						$Stage =	$_POST[$StageID];
						$Remarks =	$_POST[$RemarksID];
							$OocyteType =	$_POST[$OocyteTypeID];
							$Patient =	$_POST[$PatientID];
						$RIDNo = $rsnew["RIDNo"];
						$Name = $rsnew["Name"];
						$TidNo = $rsnew["TidNo"];
						$DidNO = $rsnew["id"];
	$Patient = trim($Patient);
						$patient1 = $rsnew["patient1"];
						$patient2 = $rsnew["patient2"];
						$patient3 = $rsnew["patient3"];
						$patient4 = $rsnew["patient4"];
						$Day0OocyteStage = $Stage;
						$Day0sino = $OocyteNo;
							$sql = "select * from ganeshkumar_bjhims.ivf_oocytedenudation where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_oocytedenudation where Name='".$Patient."' ); ";
							$results = $dbhelper->ExecuteRows($sql);
							$DidNO = $results[0]["id"];

								//$patient1 = $rsnew["patient1"];
								$sql = "select * from ganeshkumar_bjhims.ivf_treatment_plan where id in (SELECT max(id) as id FROM ganeshkumar_bjhims.ivf_treatment_plan where Name='".$Patient."' ); ";
								$results = $dbhelper->ExecuteRows($sql);
								$RIDNo = $results[0]["RIDNO"];
								$Name = $Patient;
								$TidNo = $results[0]["id"];
								$sql = "INSERT INTO `ganeshkumar_bjhims`.`ivf_embryology_chart` (`OocyteNo`,`Stage`,`RIDNo`, `Name`, `Day0OocyteStage`, `Day0sino`, `TidNo`, `DidNO`, `Remarks`) VALUES ('".$OocyteNo."','".$Stage."', '".$RIDNo."', '".$Name."', '".$Day0OocyteStage."', '".$Day0sino."', '".$TidNo."', '".$DidNO."', '".$Remarks."');";
								$results = $dbhelper->ExecuteRows($sql);
					}
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