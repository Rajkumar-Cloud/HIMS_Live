<?php
namespace PHPMaker2019\HIMS;

/**
 * Table class for ivf_ovum_pick_up_chart
 */
class ivf_ovum_pick_up_chart extends DbTable
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
	public $ARTCycle;
	public $Consultant;
	public $TotalDoseOfStimulation;
	public $Protocol;
	public $NumberOfDaysOfStimulation;
	public $TriggerDateTime;
	public $OPUDateTime;
	public $HoursAfterTrigger;
	public $SerumE2;
	public $SerumP4;
	public $FORT;
	public $ExperctedOocytes;
	public $NoOfOocytesRetrieved;
	public $OocytesRetreivalRate;
	public $Anesthesia;
	public $TrialCannulation;
	public $UCL;
	public $Angle;
	public $EMS;
	public $Cannulation;
	public $ProcedureT;
	public $NoOfOocytesRetrievedd;
	public $CourseInHospital;
	public $DischargeAdvise;
	public $FollowUpAdvise;
	public $PlanT;
	public $ReviewDate;
	public $ReviewDoctor;
	public $TemplateProcedure;
	public $TemplateCourseInHospital;
	public $TemplateDischargeAdvise;
	public $TemplateFollowUpAdvise;
	public $TidNo;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'ivf_ovum_pick_up_chart';
		$this->TableName = 'ivf_ovum_pick_up_chart';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`ivf_ovum_pick_up_chart`";
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
		$this->id = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// RIDNo
		$this->RIDNo = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_RIDNo', 'RIDNo', '`RIDNo`', '`RIDNo`', 3, -1, FALSE, '`RIDNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->RIDNo->Nullable = FALSE; // NOT NULL field
		$this->RIDNo->Required = TRUE; // Required field
		$this->RIDNo->Sortable = TRUE; // Allow sort
		$this->RIDNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['RIDNo'] = &$this->RIDNo;

		// Name
		$this->Name = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Name', 'Name', '`Name`', '`Name`', 200, -1, FALSE, '`Name`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Name->Sortable = TRUE; // Allow sort
		$this->fields['Name'] = &$this->Name;

		// ARTCycle
		$this->ARTCycle = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ARTCycle', 'ARTCycle', '`ARTCycle`', '`ARTCycle`', 200, -1, FALSE, '`ARTCycle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ARTCycle->Sortable = TRUE; // Allow sort
		$this->fields['ARTCycle'] = &$this->ARTCycle;

		// Consultant
		$this->Consultant = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Consultant', 'Consultant', '`Consultant`', '`Consultant`', 200, -1, FALSE, '`Consultant`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Consultant->Sortable = TRUE; // Allow sort
		$this->fields['Consultant'] = &$this->Consultant;

		// TotalDoseOfStimulation
		$this->TotalDoseOfStimulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TotalDoseOfStimulation', 'TotalDoseOfStimulation', '`TotalDoseOfStimulation`', '`TotalDoseOfStimulation`', 200, -1, FALSE, '`TotalDoseOfStimulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TotalDoseOfStimulation->Sortable = TRUE; // Allow sort
		$this->fields['TotalDoseOfStimulation'] = &$this->TotalDoseOfStimulation;

		// Protocol
		$this->Protocol = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Protocol', 'Protocol', '`Protocol`', '`Protocol`', 200, -1, FALSE, '`Protocol`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Protocol->Sortable = TRUE; // Allow sort
		$this->Protocol->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Protocol->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Protocol->Lookup = new Lookup('Protocol', 'ivf_ovum_pick_up_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Protocol->OptionCount = 2;
		$this->fields['Protocol'] = &$this->Protocol;

		// NumberOfDaysOfStimulation
		$this->NumberOfDaysOfStimulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NumberOfDaysOfStimulation', 'NumberOfDaysOfStimulation', '`NumberOfDaysOfStimulation`', '`NumberOfDaysOfStimulation`', 200, -1, FALSE, '`NumberOfDaysOfStimulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NumberOfDaysOfStimulation->Sortable = TRUE; // Allow sort
		$this->fields['NumberOfDaysOfStimulation'] = &$this->NumberOfDaysOfStimulation;

		// TriggerDateTime
		$this->TriggerDateTime = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TriggerDateTime', 'TriggerDateTime', '`TriggerDateTime`', CastDateFieldForLike('`TriggerDateTime`', 0, "DB"), 135, 0, FALSE, '`TriggerDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TriggerDateTime->Sortable = TRUE; // Allow sort
		$this->TriggerDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TriggerDateTime'] = &$this->TriggerDateTime;

		// OPUDateTime
		$this->OPUDateTime = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_OPUDateTime', 'OPUDateTime', '`OPUDateTime`', CastDateFieldForLike('`OPUDateTime`', 0, "DB"), 135, 0, FALSE, '`OPUDateTime`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OPUDateTime->Sortable = TRUE; // Allow sort
		$this->OPUDateTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['OPUDateTime'] = &$this->OPUDateTime;

		// HoursAfterTrigger
		$this->HoursAfterTrigger = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_HoursAfterTrigger', 'HoursAfterTrigger', '`HoursAfterTrigger`', '`HoursAfterTrigger`', 200, -1, FALSE, '`HoursAfterTrigger`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HoursAfterTrigger->Sortable = TRUE; // Allow sort
		$this->fields['HoursAfterTrigger'] = &$this->HoursAfterTrigger;

		// SerumE2
		$this->SerumE2 = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_SerumE2', 'SerumE2', '`SerumE2`', '`SerumE2`', 200, -1, FALSE, '`SerumE2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SerumE2->Sortable = TRUE; // Allow sort
		$this->fields['SerumE2'] = &$this->SerumE2;

		// SerumP4
		$this->SerumP4 = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_SerumP4', 'SerumP4', '`SerumP4`', '`SerumP4`', 200, -1, FALSE, '`SerumP4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->SerumP4->Sortable = TRUE; // Allow sort
		$this->fields['SerumP4'] = &$this->SerumP4;

		// FORT
		$this->FORT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_FORT', 'FORT', '`FORT`', '`FORT`', 200, -1, FALSE, '`FORT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FORT->Sortable = TRUE; // Allow sort
		$this->fields['FORT'] = &$this->FORT;

		// ExperctedOocytes
		$this->ExperctedOocytes = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ExperctedOocytes', 'ExperctedOocytes', '`ExperctedOocytes`', '`ExperctedOocytes`', 200, -1, FALSE, '`ExperctedOocytes`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ExperctedOocytes->Sortable = TRUE; // Allow sort
		$this->fields['ExperctedOocytes'] = &$this->ExperctedOocytes;

		// NoOfOocytesRetrieved
		$this->NoOfOocytesRetrieved = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NoOfOocytesRetrieved', 'NoOfOocytesRetrieved', '`NoOfOocytesRetrieved`', '`NoOfOocytesRetrieved`', 200, -1, FALSE, '`NoOfOocytesRetrieved`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfOocytesRetrieved->Sortable = TRUE; // Allow sort
		$this->fields['NoOfOocytesRetrieved'] = &$this->NoOfOocytesRetrieved;

		// OocytesRetreivalRate
		$this->OocytesRetreivalRate = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_OocytesRetreivalRate', 'OocytesRetreivalRate', '`OocytesRetreivalRate`', '`OocytesRetreivalRate`', 200, -1, FALSE, '`OocytesRetreivalRate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->OocytesRetreivalRate->Sortable = TRUE; // Allow sort
		$this->fields['OocytesRetreivalRate'] = &$this->OocytesRetreivalRate;

		// Anesthesia
		$this->Anesthesia = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Anesthesia', 'Anesthesia', '`Anesthesia`', '`Anesthesia`', 200, -1, FALSE, '`Anesthesia`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Anesthesia->Sortable = TRUE; // Allow sort
		$this->fields['Anesthesia'] = &$this->Anesthesia;

		// TrialCannulation
		$this->TrialCannulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TrialCannulation', 'TrialCannulation', '`TrialCannulation`', '`TrialCannulation`', 200, -1, FALSE, '`TrialCannulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TrialCannulation->Sortable = TRUE; // Allow sort
		$this->fields['TrialCannulation'] = &$this->TrialCannulation;

		// UCL
		$this->UCL = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_UCL', 'UCL', '`UCL`', '`UCL`', 200, -1, FALSE, '`UCL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->UCL->Sortable = TRUE; // Allow sort
		$this->fields['UCL'] = &$this->UCL;

		// Angle
		$this->Angle = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Angle', 'Angle', '`Angle`', '`Angle`', 200, -1, FALSE, '`Angle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Angle->Sortable = TRUE; // Allow sort
		$this->fields['Angle'] = &$this->Angle;

		// EMS
		$this->EMS = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_EMS', 'EMS', '`EMS`', '`EMS`', 200, -1, FALSE, '`EMS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->EMS->Sortable = TRUE; // Allow sort
		$this->fields['EMS'] = &$this->EMS;

		// Cannulation
		$this->Cannulation = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_Cannulation', 'Cannulation', '`Cannulation`', '`Cannulation`', 200, -1, FALSE, '`Cannulation`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Cannulation->Sortable = TRUE; // Allow sort
		$this->Cannulation->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Cannulation->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->Cannulation->Lookup = new Lookup('Cannulation', 'ivf_ovum_pick_up_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->Cannulation->OptionCount = 2;
		$this->fields['Cannulation'] = &$this->Cannulation;

		// ProcedureT
		$this->ProcedureT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ProcedureT', 'ProcedureT', '`ProcedureT`', '`ProcedureT`', 201, -1, FALSE, '`ProcedureT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->ProcedureT->Sortable = TRUE; // Allow sort
		$this->fields['ProcedureT'] = &$this->ProcedureT;

		// NoOfOocytesRetrievedd
		$this->NoOfOocytesRetrievedd = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_NoOfOocytesRetrievedd', 'NoOfOocytesRetrievedd', '`NoOfOocytesRetrievedd`', '`NoOfOocytesRetrievedd`', 200, -1, FALSE, '`NoOfOocytesRetrievedd`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NoOfOocytesRetrievedd->Sortable = TRUE; // Allow sort
		$this->fields['NoOfOocytesRetrievedd'] = &$this->NoOfOocytesRetrievedd;

		// CourseInHospital
		$this->CourseInHospital = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_CourseInHospital', 'CourseInHospital', '`CourseInHospital`', '`CourseInHospital`', 201, -1, FALSE, '`CourseInHospital`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->CourseInHospital->Sortable = TRUE; // Allow sort
		$this->fields['CourseInHospital'] = &$this->CourseInHospital;

		// DischargeAdvise
		$this->DischargeAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_DischargeAdvise', 'DischargeAdvise', '`DischargeAdvise`', '`DischargeAdvise`', 201, -1, FALSE, '`DischargeAdvise`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->DischargeAdvise->Sortable = TRUE; // Allow sort
		$this->fields['DischargeAdvise'] = &$this->DischargeAdvise;

		// FollowUpAdvise
		$this->FollowUpAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_FollowUpAdvise', 'FollowUpAdvise', '`FollowUpAdvise`', '`FollowUpAdvise`', 201, -1, FALSE, '`FollowUpAdvise`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->FollowUpAdvise->Sortable = TRUE; // Allow sort
		$this->fields['FollowUpAdvise'] = &$this->FollowUpAdvise;

		// PlanT
		$this->PlanT = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_PlanT', 'PlanT', '`PlanT`', '`PlanT`', 200, -1, FALSE, '`PlanT`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PlanT->Sortable = TRUE; // Allow sort
		$this->PlanT->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PlanT->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PlanT->Lookup = new Lookup('PlanT', 'ivf_ovum_pick_up_chart', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->PlanT->OptionCount = 3;
		$this->fields['PlanT'] = &$this->PlanT;

		// ReviewDate
		$this->ReviewDate = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ReviewDate', 'ReviewDate', '`ReviewDate`', CastDateFieldForLike('`ReviewDate`', 0, "DB"), 135, 0, FALSE, '`ReviewDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReviewDate->Sortable = TRUE; // Allow sort
		$this->ReviewDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ReviewDate'] = &$this->ReviewDate;

		// ReviewDoctor
		$this->ReviewDoctor = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_ReviewDoctor', 'ReviewDoctor', '`ReviewDoctor`', '`ReviewDoctor`', 200, -1, FALSE, '`ReviewDoctor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReviewDoctor->Sortable = TRUE; // Allow sort
		$this->fields['ReviewDoctor'] = &$this->ReviewDoctor;

		// TemplateProcedure
		$this->TemplateProcedure = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TemplateProcedure', 'TemplateProcedure', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateProcedure->IsCustom = TRUE; // Custom field
		$this->TemplateProcedure->Sortable = TRUE; // Allow sort
		$this->TemplateProcedure->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateProcedure->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TemplateProcedure->Lookup = new Lookup('TemplateProcedure', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_ProcedureT"], '', '');
		$this->fields['TemplateProcedure'] = &$this->TemplateProcedure;

		// TemplateCourseInHospital
		$this->TemplateCourseInHospital = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TemplateCourseInHospital', 'TemplateCourseInHospital', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateCourseInHospital->IsCustom = TRUE; // Custom field
		$this->TemplateCourseInHospital->Sortable = TRUE; // Allow sort
		$this->TemplateCourseInHospital->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateCourseInHospital->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TemplateCourseInHospital->Lookup = new Lookup('TemplateCourseInHospital', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_CourseInHospital"], '', '');
		$this->fields['TemplateCourseInHospital'] = &$this->TemplateCourseInHospital;

		// TemplateDischargeAdvise
		$this->TemplateDischargeAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TemplateDischargeAdvise', 'TemplateDischargeAdvise', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateDischargeAdvise->IsCustom = TRUE; // Custom field
		$this->TemplateDischargeAdvise->Sortable = TRUE; // Allow sort
		$this->TemplateDischargeAdvise->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateDischargeAdvise->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TemplateDischargeAdvise->Lookup = new Lookup('TemplateDischargeAdvise', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_DischargeAdvise"], '', '');
		$this->fields['TemplateDischargeAdvise'] = &$this->TemplateDischargeAdvise;

		// TemplateFollowUpAdvise
		$this->TemplateFollowUpAdvise = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TemplateFollowUpAdvise', 'TemplateFollowUpAdvise', '\'\'', '\'\'', 201, -1, FALSE, '\'\'', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TemplateFollowUpAdvise->IsCustom = TRUE; // Custom field
		$this->TemplateFollowUpAdvise->Sortable = TRUE; // Allow sort
		$this->TemplateFollowUpAdvise->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TemplateFollowUpAdvise->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->TemplateFollowUpAdvise->Lookup = new Lookup('TemplateFollowUpAdvise', 'ivf_mas_user_template', FALSE, 'TemplateName', ["TemplateName","","",""], [], [], [], [], ["Template"], ["x_FollowUpAdvise"], '', '');
		$this->fields['TemplateFollowUpAdvise'] = &$this->TemplateFollowUpAdvise;

		// TidNo
		$this->TidNo = new DbField('ivf_ovum_pick_up_chart', 'ivf_ovum_pick_up_chart', 'x_TidNo', 'TidNo', '`TidNo`', '`TidNo`', 3, -1, FALSE, '`TidNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TidNo->Sortable = TRUE; // Allow sort
		$this->TidNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TidNo'] = &$this->TidNo;
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
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`ivf_ovum_pick_up_chart`";
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
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT *, '' AS `TemplateProcedure`, '' AS `TemplateCourseInHospital`, '' AS `TemplateDischargeAdvise`, '' AS `TemplateFollowUpAdvise` FROM " . $this->getSqlFrom();
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
		$this->ARTCycle->DbValue = $row['ARTCycle'];
		$this->Consultant->DbValue = $row['Consultant'];
		$this->TotalDoseOfStimulation->DbValue = $row['TotalDoseOfStimulation'];
		$this->Protocol->DbValue = $row['Protocol'];
		$this->NumberOfDaysOfStimulation->DbValue = $row['NumberOfDaysOfStimulation'];
		$this->TriggerDateTime->DbValue = $row['TriggerDateTime'];
		$this->OPUDateTime->DbValue = $row['OPUDateTime'];
		$this->HoursAfterTrigger->DbValue = $row['HoursAfterTrigger'];
		$this->SerumE2->DbValue = $row['SerumE2'];
		$this->SerumP4->DbValue = $row['SerumP4'];
		$this->FORT->DbValue = $row['FORT'];
		$this->ExperctedOocytes->DbValue = $row['ExperctedOocytes'];
		$this->NoOfOocytesRetrieved->DbValue = $row['NoOfOocytesRetrieved'];
		$this->OocytesRetreivalRate->DbValue = $row['OocytesRetreivalRate'];
		$this->Anesthesia->DbValue = $row['Anesthesia'];
		$this->TrialCannulation->DbValue = $row['TrialCannulation'];
		$this->UCL->DbValue = $row['UCL'];
		$this->Angle->DbValue = $row['Angle'];
		$this->EMS->DbValue = $row['EMS'];
		$this->Cannulation->DbValue = $row['Cannulation'];
		$this->ProcedureT->DbValue = $row['ProcedureT'];
		$this->NoOfOocytesRetrievedd->DbValue = $row['NoOfOocytesRetrievedd'];
		$this->CourseInHospital->DbValue = $row['CourseInHospital'];
		$this->DischargeAdvise->DbValue = $row['DischargeAdvise'];
		$this->FollowUpAdvise->DbValue = $row['FollowUpAdvise'];
		$this->PlanT->DbValue = $row['PlanT'];
		$this->ReviewDate->DbValue = $row['ReviewDate'];
		$this->ReviewDoctor->DbValue = $row['ReviewDoctor'];
		$this->TemplateProcedure->DbValue = $row['TemplateProcedure'];
		$this->TemplateCourseInHospital->DbValue = $row['TemplateCourseInHospital'];
		$this->TemplateDischargeAdvise->DbValue = $row['TemplateDischargeAdvise'];
		$this->TemplateFollowUpAdvise->DbValue = $row['TemplateFollowUpAdvise'];
		$this->TidNo->DbValue = $row['TidNo'];
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
			return "ivf_ovum_pick_up_chartlist.php";
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
		if ($pageName == "ivf_ovum_pick_up_chartview.php")
			return $Language->phrase("View");
		elseif ($pageName == "ivf_ovum_pick_up_chartedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "ivf_ovum_pick_up_chartadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "ivf_ovum_pick_up_chartlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("ivf_ovum_pick_up_chartview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("ivf_ovum_pick_up_chartview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "ivf_ovum_pick_up_chartadd.php?" . $this->getUrlParm($parm);
		else
			$url = "ivf_ovum_pick_up_chartadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("ivf_ovum_pick_up_chartedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("ivf_ovum_pick_up_chartadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("ivf_ovum_pick_up_chartdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
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
		$this->ARTCycle->setDbValue($rs->fields('ARTCycle'));
		$this->Consultant->setDbValue($rs->fields('Consultant'));
		$this->TotalDoseOfStimulation->setDbValue($rs->fields('TotalDoseOfStimulation'));
		$this->Protocol->setDbValue($rs->fields('Protocol'));
		$this->NumberOfDaysOfStimulation->setDbValue($rs->fields('NumberOfDaysOfStimulation'));
		$this->TriggerDateTime->setDbValue($rs->fields('TriggerDateTime'));
		$this->OPUDateTime->setDbValue($rs->fields('OPUDateTime'));
		$this->HoursAfterTrigger->setDbValue($rs->fields('HoursAfterTrigger'));
		$this->SerumE2->setDbValue($rs->fields('SerumE2'));
		$this->SerumP4->setDbValue($rs->fields('SerumP4'));
		$this->FORT->setDbValue($rs->fields('FORT'));
		$this->ExperctedOocytes->setDbValue($rs->fields('ExperctedOocytes'));
		$this->NoOfOocytesRetrieved->setDbValue($rs->fields('NoOfOocytesRetrieved'));
		$this->OocytesRetreivalRate->setDbValue($rs->fields('OocytesRetreivalRate'));
		$this->Anesthesia->setDbValue($rs->fields('Anesthesia'));
		$this->TrialCannulation->setDbValue($rs->fields('TrialCannulation'));
		$this->UCL->setDbValue($rs->fields('UCL'));
		$this->Angle->setDbValue($rs->fields('Angle'));
		$this->EMS->setDbValue($rs->fields('EMS'));
		$this->Cannulation->setDbValue($rs->fields('Cannulation'));
		$this->ProcedureT->setDbValue($rs->fields('ProcedureT'));
		$this->NoOfOocytesRetrievedd->setDbValue($rs->fields('NoOfOocytesRetrievedd'));
		$this->CourseInHospital->setDbValue($rs->fields('CourseInHospital'));
		$this->DischargeAdvise->setDbValue($rs->fields('DischargeAdvise'));
		$this->FollowUpAdvise->setDbValue($rs->fields('FollowUpAdvise'));
		$this->PlanT->setDbValue($rs->fields('PlanT'));
		$this->ReviewDate->setDbValue($rs->fields('ReviewDate'));
		$this->ReviewDoctor->setDbValue($rs->fields('ReviewDoctor'));
		$this->TemplateProcedure->setDbValue($rs->fields('TemplateProcedure'));
		$this->TemplateCourseInHospital->setDbValue($rs->fields('TemplateCourseInHospital'));
		$this->TemplateDischargeAdvise->setDbValue($rs->fields('TemplateDischargeAdvise'));
		$this->TemplateFollowUpAdvise->setDbValue($rs->fields('TemplateFollowUpAdvise'));
		$this->TidNo->setDbValue($rs->fields('TidNo'));
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
		// ARTCycle
		// Consultant
		// TotalDoseOfStimulation
		// Protocol
		// NumberOfDaysOfStimulation
		// TriggerDateTime
		// OPUDateTime
		// HoursAfterTrigger
		// SerumE2
		// SerumP4
		// FORT
		// ExperctedOocytes
		// NoOfOocytesRetrieved
		// OocytesRetreivalRate
		// Anesthesia
		// TrialCannulation
		// UCL
		// Angle
		// EMS
		// Cannulation
		// ProcedureT
		// NoOfOocytesRetrievedd
		// CourseInHospital
		// DischargeAdvise
		// FollowUpAdvise
		// PlanT
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedure
		// TemplateCourseInHospital
		// TemplateDischargeAdvise
		// TemplateFollowUpAdvise
		// TidNo
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

		// ARTCycle
		$this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
		$this->ARTCycle->ViewCustomAttributes = "";

		// Consultant
		$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
		$this->Consultant->ViewCustomAttributes = "";

		// TotalDoseOfStimulation
		$this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
		$this->TotalDoseOfStimulation->ViewCustomAttributes = "";

		// Protocol
		if (strval($this->Protocol->CurrentValue) <> "") {
			$this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
		} else {
			$this->Protocol->ViewValue = NULL;
		}
		$this->Protocol->ViewCustomAttributes = "";

		// NumberOfDaysOfStimulation
		$this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
		$this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

		// TriggerDateTime
		$this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
		$this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
		$this->TriggerDateTime->ViewCustomAttributes = "";

		// OPUDateTime
		$this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
		$this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
		$this->OPUDateTime->ViewCustomAttributes = "";

		// HoursAfterTrigger
		$this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
		$this->HoursAfterTrigger->ViewCustomAttributes = "";

		// SerumE2
		$this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
		$this->SerumE2->ViewCustomAttributes = "";

		// SerumP4
		$this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
		$this->SerumP4->ViewCustomAttributes = "";

		// FORT
		$this->FORT->ViewValue = $this->FORT->CurrentValue;
		$this->FORT->ViewCustomAttributes = "";

		// ExperctedOocytes
		$this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
		$this->ExperctedOocytes->ViewCustomAttributes = "";

		// NoOfOocytesRetrieved
		$this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
		$this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

		// OocytesRetreivalRate
		$this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
		$this->OocytesRetreivalRate->ViewCustomAttributes = "";

		// Anesthesia
		$this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
		$this->Anesthesia->ViewCustomAttributes = "";

		// TrialCannulation
		$this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
		$this->TrialCannulation->ViewCustomAttributes = "";

		// UCL
		$this->UCL->ViewValue = $this->UCL->CurrentValue;
		$this->UCL->ViewCustomAttributes = "";

		// Angle
		$this->Angle->ViewValue = $this->Angle->CurrentValue;
		$this->Angle->ViewCustomAttributes = "";

		// EMS
		$this->EMS->ViewValue = $this->EMS->CurrentValue;
		$this->EMS->ViewCustomAttributes = "";

		// Cannulation
		if (strval($this->Cannulation->CurrentValue) <> "") {
			$this->Cannulation->ViewValue = $this->Cannulation->optionCaption($this->Cannulation->CurrentValue);
		} else {
			$this->Cannulation->ViewValue = NULL;
		}
		$this->Cannulation->ViewCustomAttributes = "";

		// ProcedureT
		$this->ProcedureT->ViewValue = $this->ProcedureT->CurrentValue;
		$this->ProcedureT->ViewCustomAttributes = "";

		// NoOfOocytesRetrievedd
		$this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
		$this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

		// CourseInHospital
		$this->CourseInHospital->ViewValue = $this->CourseInHospital->CurrentValue;
		$this->CourseInHospital->ViewCustomAttributes = "";

		// DischargeAdvise
		$this->DischargeAdvise->ViewValue = $this->DischargeAdvise->CurrentValue;
		$this->DischargeAdvise->ViewCustomAttributes = "";

		// FollowUpAdvise
		$this->FollowUpAdvise->ViewValue = $this->FollowUpAdvise->CurrentValue;
		$this->FollowUpAdvise->ViewCustomAttributes = "";

		// PlanT
		if (strval($this->PlanT->CurrentValue) <> "") {
			$this->PlanT->ViewValue = $this->PlanT->optionCaption($this->PlanT->CurrentValue);
		} else {
			$this->PlanT->ViewValue = NULL;
		}
		$this->PlanT->ViewCustomAttributes = "";

		// ReviewDate
		$this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
		$this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
		$this->ReviewDate->ViewCustomAttributes = "";

		// ReviewDoctor
		$this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
		$this->ReviewDoctor->ViewCustomAttributes = "";

		// TemplateProcedure
		$curVal = strval($this->TemplateProcedure->CurrentValue);
		if ($curVal <> "") {
			$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
			if ($this->TemplateProcedure->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ovum Procedure'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateProcedure->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->CurrentValue;
				}
			}
		} else {
			$this->TemplateProcedure->ViewValue = NULL;
		}
		$this->TemplateProcedure->ViewCustomAttributes = "";

		// TemplateCourseInHospital
		$curVal = strval($this->TemplateCourseInHospital->CurrentValue);
		if ($curVal <> "") {
			$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
			if ($this->TemplateCourseInHospital->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ovum Course In Hospital'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->CurrentValue;
				}
			}
		} else {
			$this->TemplateCourseInHospital->ViewValue = NULL;
		}
		$this->TemplateCourseInHospital->ViewCustomAttributes = "";

		// TemplateDischargeAdvise
		$curVal = strval($this->TemplateDischargeAdvise->CurrentValue);
		if ($curVal <> "") {
			$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
			if ($this->TemplateDischargeAdvise->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ovum Discharge Advise'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->CurrentValue;
				}
			}
		} else {
			$this->TemplateDischargeAdvise->ViewValue = NULL;
		}
		$this->TemplateDischargeAdvise->ViewCustomAttributes = "";

		// TemplateFollowUpAdvise
		$curVal = strval($this->TemplateFollowUpAdvise->CurrentValue);
		if ($curVal <> "") {
			$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
			if ($this->TemplateFollowUpAdvise->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$lookupFilter = function() {
					return "`TemplateType`='ovum Follow Up Advise'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->CurrentValue;
				}
			}
		} else {
			$this->TemplateFollowUpAdvise->ViewValue = NULL;
		}
		$this->TemplateFollowUpAdvise->ViewCustomAttributes = "";

		// TidNo
		$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
		$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
		$this->TidNo->ViewCustomAttributes = "";

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

		// ARTCycle
		$this->ARTCycle->LinkCustomAttributes = "";
		$this->ARTCycle->HrefValue = "";
		$this->ARTCycle->TooltipValue = "";

		// Consultant
		$this->Consultant->LinkCustomAttributes = "";
		$this->Consultant->HrefValue = "";
		$this->Consultant->TooltipValue = "";

		// TotalDoseOfStimulation
		$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
		$this->TotalDoseOfStimulation->HrefValue = "";
		$this->TotalDoseOfStimulation->TooltipValue = "";

		// Protocol
		$this->Protocol->LinkCustomAttributes = "";
		$this->Protocol->HrefValue = "";
		$this->Protocol->TooltipValue = "";

		// NumberOfDaysOfStimulation
		$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
		$this->NumberOfDaysOfStimulation->HrefValue = "";
		$this->NumberOfDaysOfStimulation->TooltipValue = "";

		// TriggerDateTime
		$this->TriggerDateTime->LinkCustomAttributes = "";
		$this->TriggerDateTime->HrefValue = "";
		$this->TriggerDateTime->TooltipValue = "";

		// OPUDateTime
		$this->OPUDateTime->LinkCustomAttributes = "";
		$this->OPUDateTime->HrefValue = "";
		$this->OPUDateTime->TooltipValue = "";

		// HoursAfterTrigger
		$this->HoursAfterTrigger->LinkCustomAttributes = "";
		$this->HoursAfterTrigger->HrefValue = "";
		$this->HoursAfterTrigger->TooltipValue = "";

		// SerumE2
		$this->SerumE2->LinkCustomAttributes = "";
		$this->SerumE2->HrefValue = "";
		$this->SerumE2->TooltipValue = "";

		// SerumP4
		$this->SerumP4->LinkCustomAttributes = "";
		$this->SerumP4->HrefValue = "";
		$this->SerumP4->TooltipValue = "";

		// FORT
		$this->FORT->LinkCustomAttributes = "";
		$this->FORT->HrefValue = "";
		$this->FORT->TooltipValue = "";

		// ExperctedOocytes
		$this->ExperctedOocytes->LinkCustomAttributes = "";
		$this->ExperctedOocytes->HrefValue = "";
		$this->ExperctedOocytes->TooltipValue = "";

		// NoOfOocytesRetrieved
		$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
		$this->NoOfOocytesRetrieved->HrefValue = "";
		$this->NoOfOocytesRetrieved->TooltipValue = "";

		// OocytesRetreivalRate
		$this->OocytesRetreivalRate->LinkCustomAttributes = "";
		$this->OocytesRetreivalRate->HrefValue = "";
		$this->OocytesRetreivalRate->TooltipValue = "";

		// Anesthesia
		$this->Anesthesia->LinkCustomAttributes = "";
		$this->Anesthesia->HrefValue = "";
		$this->Anesthesia->TooltipValue = "";

		// TrialCannulation
		$this->TrialCannulation->LinkCustomAttributes = "";
		$this->TrialCannulation->HrefValue = "";
		$this->TrialCannulation->TooltipValue = "";

		// UCL
		$this->UCL->LinkCustomAttributes = "";
		$this->UCL->HrefValue = "";
		$this->UCL->TooltipValue = "";

		// Angle
		$this->Angle->LinkCustomAttributes = "";
		$this->Angle->HrefValue = "";
		$this->Angle->TooltipValue = "";

		// EMS
		$this->EMS->LinkCustomAttributes = "";
		$this->EMS->HrefValue = "";
		$this->EMS->TooltipValue = "";

		// Cannulation
		$this->Cannulation->LinkCustomAttributes = "";
		$this->Cannulation->HrefValue = "";
		$this->Cannulation->TooltipValue = "";

		// ProcedureT
		$this->ProcedureT->LinkCustomAttributes = "";
		$this->ProcedureT->HrefValue = "";
		$this->ProcedureT->TooltipValue = "";

		// NoOfOocytesRetrievedd
		$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
		$this->NoOfOocytesRetrievedd->HrefValue = "";
		$this->NoOfOocytesRetrievedd->TooltipValue = "";

		// CourseInHospital
		$this->CourseInHospital->LinkCustomAttributes = "";
		$this->CourseInHospital->HrefValue = "";
		$this->CourseInHospital->TooltipValue = "";

		// DischargeAdvise
		$this->DischargeAdvise->LinkCustomAttributes = "";
		$this->DischargeAdvise->HrefValue = "";
		$this->DischargeAdvise->TooltipValue = "";

		// FollowUpAdvise
		$this->FollowUpAdvise->LinkCustomAttributes = "";
		$this->FollowUpAdvise->HrefValue = "";
		$this->FollowUpAdvise->TooltipValue = "";

		// PlanT
		$this->PlanT->LinkCustomAttributes = "";
		$this->PlanT->HrefValue = "";
		$this->PlanT->TooltipValue = "";

		// ReviewDate
		$this->ReviewDate->LinkCustomAttributes = "";
		$this->ReviewDate->HrefValue = "";
		$this->ReviewDate->TooltipValue = "";

		// ReviewDoctor
		$this->ReviewDoctor->LinkCustomAttributes = "";
		$this->ReviewDoctor->HrefValue = "";
		$this->ReviewDoctor->TooltipValue = "";

		// TemplateProcedure
		$this->TemplateProcedure->LinkCustomAttributes = "";
		$this->TemplateProcedure->HrefValue = "";
		$this->TemplateProcedure->TooltipValue = "";

		// TemplateCourseInHospital
		$this->TemplateCourseInHospital->LinkCustomAttributes = "";
		$this->TemplateCourseInHospital->HrefValue = "";
		$this->TemplateCourseInHospital->TooltipValue = "";

		// TemplateDischargeAdvise
		$this->TemplateDischargeAdvise->LinkCustomAttributes = "";
		$this->TemplateDischargeAdvise->HrefValue = "";
		$this->TemplateDischargeAdvise->TooltipValue = "";

		// TemplateFollowUpAdvise
		$this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
		$this->TemplateFollowUpAdvise->HrefValue = "";
		$this->TemplateFollowUpAdvise->TooltipValue = "";

		// TidNo
		$this->TidNo->LinkCustomAttributes = "";
		$this->TidNo->HrefValue = "";
		$this->TidNo->TooltipValue = "";

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
		$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
		$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

		// Name
		$this->Name->EditAttrs["class"] = "form-control";
		$this->Name->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
		$this->Name->EditValue = $this->Name->CurrentValue;
		$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

		// ARTCycle
		$this->ARTCycle->EditAttrs["class"] = "form-control";
		$this->ARTCycle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
		$this->ARTCycle->EditValue = $this->ARTCycle->CurrentValue;
		$this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

		// Consultant
		$this->Consultant->EditAttrs["class"] = "form-control";
		$this->Consultant->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
		$this->Consultant->EditValue = $this->Consultant->CurrentValue;
		$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

		// TotalDoseOfStimulation
		$this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
		$this->TotalDoseOfStimulation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
		$this->TotalDoseOfStimulation->EditValue = $this->TotalDoseOfStimulation->CurrentValue;
		$this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

		// Protocol
		$this->Protocol->EditAttrs["class"] = "form-control";
		$this->Protocol->EditCustomAttributes = "";
		$this->Protocol->EditValue = $this->Protocol->options(TRUE);

		// NumberOfDaysOfStimulation
		$this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
		$this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
		$this->NumberOfDaysOfStimulation->EditValue = $this->NumberOfDaysOfStimulation->CurrentValue;
		$this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

		// TriggerDateTime
		$this->TriggerDateTime->EditAttrs["class"] = "form-control";
		$this->TriggerDateTime->EditCustomAttributes = "";
		$this->TriggerDateTime->EditValue = FormatDateTime($this->TriggerDateTime->CurrentValue, 8);
		$this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

		// OPUDateTime
		$this->OPUDateTime->EditAttrs["class"] = "form-control";
		$this->OPUDateTime->EditCustomAttributes = "";
		$this->OPUDateTime->EditValue = FormatDateTime($this->OPUDateTime->CurrentValue, 8);
		$this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

		// HoursAfterTrigger
		$this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
		$this->HoursAfterTrigger->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
		$this->HoursAfterTrigger->EditValue = $this->HoursAfterTrigger->CurrentValue;
		$this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

		// SerumE2
		$this->SerumE2->EditAttrs["class"] = "form-control";
		$this->SerumE2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
		$this->SerumE2->EditValue = $this->SerumE2->CurrentValue;
		$this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

		// SerumP4
		$this->SerumP4->EditAttrs["class"] = "form-control";
		$this->SerumP4->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
		$this->SerumP4->EditValue = $this->SerumP4->CurrentValue;
		$this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

		// FORT
		$this->FORT->EditAttrs["class"] = "form-control";
		$this->FORT->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
		$this->FORT->EditValue = $this->FORT->CurrentValue;
		$this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

		// ExperctedOocytes
		$this->ExperctedOocytes->EditAttrs["class"] = "form-control";
		$this->ExperctedOocytes->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
		$this->ExperctedOocytes->EditValue = $this->ExperctedOocytes->CurrentValue;
		$this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

		// NoOfOocytesRetrieved
		$this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
		$this->NoOfOocytesRetrieved->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
		$this->NoOfOocytesRetrieved->EditValue = $this->NoOfOocytesRetrieved->CurrentValue;
		$this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

		// OocytesRetreivalRate
		$this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
		$this->OocytesRetreivalRate->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
		$this->OocytesRetreivalRate->EditValue = $this->OocytesRetreivalRate->CurrentValue;
		$this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

		// Anesthesia
		$this->Anesthesia->EditAttrs["class"] = "form-control";
		$this->Anesthesia->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
		$this->Anesthesia->EditValue = $this->Anesthesia->CurrentValue;
		$this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

		// TrialCannulation
		$this->TrialCannulation->EditAttrs["class"] = "form-control";
		$this->TrialCannulation->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
		$this->TrialCannulation->EditValue = $this->TrialCannulation->CurrentValue;
		$this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

		// UCL
		$this->UCL->EditAttrs["class"] = "form-control";
		$this->UCL->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
		$this->UCL->EditValue = $this->UCL->CurrentValue;
		$this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

		// Angle
		$this->Angle->EditAttrs["class"] = "form-control";
		$this->Angle->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
		$this->Angle->EditValue = $this->Angle->CurrentValue;
		$this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

		// EMS
		$this->EMS->EditAttrs["class"] = "form-control";
		$this->EMS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
		$this->EMS->EditValue = $this->EMS->CurrentValue;
		$this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

		// Cannulation
		$this->Cannulation->EditAttrs["class"] = "form-control";
		$this->Cannulation->EditCustomAttributes = "";
		$this->Cannulation->EditValue = $this->Cannulation->options(TRUE);

		// ProcedureT
		$this->ProcedureT->EditAttrs["class"] = "form-control";
		$this->ProcedureT->EditCustomAttributes = "";
		$this->ProcedureT->EditValue = $this->ProcedureT->CurrentValue;
		$this->ProcedureT->PlaceHolder = RemoveHtml($this->ProcedureT->caption());

		// NoOfOocytesRetrievedd
		$this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
		$this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
		$this->NoOfOocytesRetrievedd->EditValue = $this->NoOfOocytesRetrievedd->CurrentValue;
		$this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

		// CourseInHospital
		$this->CourseInHospital->EditAttrs["class"] = "form-control";
		$this->CourseInHospital->EditCustomAttributes = "";
		$this->CourseInHospital->EditValue = $this->CourseInHospital->CurrentValue;
		$this->CourseInHospital->PlaceHolder = RemoveHtml($this->CourseInHospital->caption());

		// DischargeAdvise
		$this->DischargeAdvise->EditAttrs["class"] = "form-control";
		$this->DischargeAdvise->EditCustomAttributes = "";
		$this->DischargeAdvise->EditValue = $this->DischargeAdvise->CurrentValue;
		$this->DischargeAdvise->PlaceHolder = RemoveHtml($this->DischargeAdvise->caption());

		// FollowUpAdvise
		$this->FollowUpAdvise->EditAttrs["class"] = "form-control";
		$this->FollowUpAdvise->EditCustomAttributes = "";
		$this->FollowUpAdvise->EditValue = $this->FollowUpAdvise->CurrentValue;
		$this->FollowUpAdvise->PlaceHolder = RemoveHtml($this->FollowUpAdvise->caption());

		// PlanT
		$this->PlanT->EditAttrs["class"] = "form-control";
		$this->PlanT->EditCustomAttributes = "";
		$this->PlanT->EditValue = $this->PlanT->options(TRUE);

		// ReviewDate
		$this->ReviewDate->EditAttrs["class"] = "form-control";
		$this->ReviewDate->EditCustomAttributes = "";
		$this->ReviewDate->EditValue = FormatDateTime($this->ReviewDate->CurrentValue, 8);
		$this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

		// ReviewDoctor
		$this->ReviewDoctor->EditAttrs["class"] = "form-control";
		$this->ReviewDoctor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
		$this->ReviewDoctor->EditValue = $this->ReviewDoctor->CurrentValue;
		$this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

		// TemplateProcedure
		$this->TemplateProcedure->EditAttrs["class"] = "form-control";
		$this->TemplateProcedure->EditCustomAttributes = "";

		// TemplateCourseInHospital
		$this->TemplateCourseInHospital->EditAttrs["class"] = "form-control";
		$this->TemplateCourseInHospital->EditCustomAttributes = "";

		// TemplateDischargeAdvise
		$this->TemplateDischargeAdvise->EditAttrs["class"] = "form-control";
		$this->TemplateDischargeAdvise->EditCustomAttributes = "";

		// TemplateFollowUpAdvise
		$this->TemplateFollowUpAdvise->EditAttrs["class"] = "form-control";
		$this->TemplateFollowUpAdvise->EditCustomAttributes = "";

		// TidNo
		$this->TidNo->EditAttrs["class"] = "form-control";
		$this->TidNo->EditCustomAttributes = "";
		$this->TidNo->EditValue = $this->TidNo->CurrentValue;
		$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

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
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->TotalDoseOfStimulation);
					$doc->exportCaption($this->Protocol);
					$doc->exportCaption($this->NumberOfDaysOfStimulation);
					$doc->exportCaption($this->TriggerDateTime);
					$doc->exportCaption($this->OPUDateTime);
					$doc->exportCaption($this->HoursAfterTrigger);
					$doc->exportCaption($this->SerumE2);
					$doc->exportCaption($this->SerumP4);
					$doc->exportCaption($this->FORT);
					$doc->exportCaption($this->ExperctedOocytes);
					$doc->exportCaption($this->NoOfOocytesRetrieved);
					$doc->exportCaption($this->OocytesRetreivalRate);
					$doc->exportCaption($this->Anesthesia);
					$doc->exportCaption($this->TrialCannulation);
					$doc->exportCaption($this->UCL);
					$doc->exportCaption($this->Angle);
					$doc->exportCaption($this->EMS);
					$doc->exportCaption($this->Cannulation);
					$doc->exportCaption($this->ProcedureT);
					$doc->exportCaption($this->NoOfOocytesRetrievedd);
					$doc->exportCaption($this->CourseInHospital);
					$doc->exportCaption($this->DischargeAdvise);
					$doc->exportCaption($this->FollowUpAdvise);
					$doc->exportCaption($this->PlanT);
					$doc->exportCaption($this->ReviewDate);
					$doc->exportCaption($this->ReviewDoctor);
					$doc->exportCaption($this->TemplateProcedure);
					$doc->exportCaption($this->TemplateCourseInHospital);
					$doc->exportCaption($this->TemplateDischargeAdvise);
					$doc->exportCaption($this->TemplateFollowUpAdvise);
					$doc->exportCaption($this->TidNo);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->RIDNo);
					$doc->exportCaption($this->Name);
					$doc->exportCaption($this->ARTCycle);
					$doc->exportCaption($this->Consultant);
					$doc->exportCaption($this->TotalDoseOfStimulation);
					$doc->exportCaption($this->Protocol);
					$doc->exportCaption($this->NumberOfDaysOfStimulation);
					$doc->exportCaption($this->TriggerDateTime);
					$doc->exportCaption($this->OPUDateTime);
					$doc->exportCaption($this->HoursAfterTrigger);
					$doc->exportCaption($this->SerumE2);
					$doc->exportCaption($this->SerumP4);
					$doc->exportCaption($this->FORT);
					$doc->exportCaption($this->ExperctedOocytes);
					$doc->exportCaption($this->NoOfOocytesRetrieved);
					$doc->exportCaption($this->OocytesRetreivalRate);
					$doc->exportCaption($this->Anesthesia);
					$doc->exportCaption($this->TrialCannulation);
					$doc->exportCaption($this->UCL);
					$doc->exportCaption($this->Angle);
					$doc->exportCaption($this->EMS);
					$doc->exportCaption($this->Cannulation);
					$doc->exportCaption($this->NoOfOocytesRetrievedd);
					$doc->exportCaption($this->PlanT);
					$doc->exportCaption($this->ReviewDate);
					$doc->exportCaption($this->ReviewDoctor);
					$doc->exportCaption($this->TidNo);
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
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->TotalDoseOfStimulation);
						$doc->exportField($this->Protocol);
						$doc->exportField($this->NumberOfDaysOfStimulation);
						$doc->exportField($this->TriggerDateTime);
						$doc->exportField($this->OPUDateTime);
						$doc->exportField($this->HoursAfterTrigger);
						$doc->exportField($this->SerumE2);
						$doc->exportField($this->SerumP4);
						$doc->exportField($this->FORT);
						$doc->exportField($this->ExperctedOocytes);
						$doc->exportField($this->NoOfOocytesRetrieved);
						$doc->exportField($this->OocytesRetreivalRate);
						$doc->exportField($this->Anesthesia);
						$doc->exportField($this->TrialCannulation);
						$doc->exportField($this->UCL);
						$doc->exportField($this->Angle);
						$doc->exportField($this->EMS);
						$doc->exportField($this->Cannulation);
						$doc->exportField($this->ProcedureT);
						$doc->exportField($this->NoOfOocytesRetrievedd);
						$doc->exportField($this->CourseInHospital);
						$doc->exportField($this->DischargeAdvise);
						$doc->exportField($this->FollowUpAdvise);
						$doc->exportField($this->PlanT);
						$doc->exportField($this->ReviewDate);
						$doc->exportField($this->ReviewDoctor);
						$doc->exportField($this->TemplateProcedure);
						$doc->exportField($this->TemplateCourseInHospital);
						$doc->exportField($this->TemplateDischargeAdvise);
						$doc->exportField($this->TemplateFollowUpAdvise);
						$doc->exportField($this->TidNo);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->RIDNo);
						$doc->exportField($this->Name);
						$doc->exportField($this->ARTCycle);
						$doc->exportField($this->Consultant);
						$doc->exportField($this->TotalDoseOfStimulation);
						$doc->exportField($this->Protocol);
						$doc->exportField($this->NumberOfDaysOfStimulation);
						$doc->exportField($this->TriggerDateTime);
						$doc->exportField($this->OPUDateTime);
						$doc->exportField($this->HoursAfterTrigger);
						$doc->exportField($this->SerumE2);
						$doc->exportField($this->SerumP4);
						$doc->exportField($this->FORT);
						$doc->exportField($this->ExperctedOocytes);
						$doc->exportField($this->NoOfOocytesRetrieved);
						$doc->exportField($this->OocytesRetreivalRate);
						$doc->exportField($this->Anesthesia);
						$doc->exportField($this->TrialCannulation);
						$doc->exportField($this->UCL);
						$doc->exportField($this->Angle);
						$doc->exportField($this->EMS);
						$doc->exportField($this->Cannulation);
						$doc->exportField($this->NoOfOocytesRetrievedd);
						$doc->exportField($this->PlanT);
						$doc->exportField($this->ReviewDate);
						$doc->exportField($this->ReviewDoctor);
						$doc->exportField($this->TidNo);
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