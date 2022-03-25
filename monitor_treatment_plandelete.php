<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$monitor_treatment_plan_delete = new monitor_treatment_plan_delete();

// Run the page
$monitor_treatment_plan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$monitor_treatment_plan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmonitor_treatment_plandelete = currentForm = new ew.Form("fmonitor_treatment_plandelete", "delete");

// Form_CustomValidate event
fmonitor_treatment_plandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmonitor_treatment_plandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmonitor_treatment_plandelete.lists["x_PatId"] = <?php echo $monitor_treatment_plan_delete->PatId->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_PatId"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->PatId->lookupOptions()) ?>;
fmonitor_treatment_plandelete.lists["x_NewVisitYesNo[]"] = <?php echo $monitor_treatment_plan_delete->NewVisitYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_NewVisitYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->NewVisitYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_Treatment"] = <?php echo $monitor_treatment_plan_delete->Treatment->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_Treatment"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->Treatment->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo1[]"] = <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->IUIDoneYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo1[]"] = <?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->UPTTestYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo2[]"] = <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->IUIDoneYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo2[]"] = <?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->UPTTestYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo3[]"] = <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->IUIDoneYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo3[]"] = <?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->UPTTestYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo4[]"] = <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_IUIDoneYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->IUIDoneYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo4[]"] = <?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_UPTTestYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->UPTTestYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_IVFStimulationYesNo[]"] = <?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_IVFStimulationYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->IVFStimulationYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_OPUYesNo[]"] = <?php echo $monitor_treatment_plan_delete->OPUYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_OPUYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->OPUYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_ETYesNo[]"] = <?php echo $monitor_treatment_plan_delete->ETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_ETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->ETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_BetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_BetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->BetaHCGYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_FETYesNo[]"] = <?php echo $monitor_treatment_plan_delete->FETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_FETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->FETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_plandelete.lists["x_FBetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_plandelete.lists["x_FBetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_delete->FBetaHCGYesNo->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $monitor_treatment_plan_delete->showPageHeader(); ?>
<?php
$monitor_treatment_plan_delete->showMessage();
?>
<form name="fmonitor_treatment_plandelete" id="fmonitor_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($monitor_treatment_plan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $monitor_treatment_plan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($monitor_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
		<th class="<?php echo $monitor_treatment_plan->id->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><?php echo $monitor_treatment_plan->id->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
		<th class="<?php echo $monitor_treatment_plan->PatId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><?php echo $monitor_treatment_plan->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $monitor_treatment_plan->PatientId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><?php echo $monitor_treatment_plan->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $monitor_treatment_plan->PatientName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><?php echo $monitor_treatment_plan->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
		<th class="<?php echo $monitor_treatment_plan->Age->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><?php echo $monitor_treatment_plan->Age->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
		<th class="<?php echo $monitor_treatment_plan->MobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><?php echo $monitor_treatment_plan->MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
		<th class="<?php echo $monitor_treatment_plan->ConsultantName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><?php echo $monitor_treatment_plan->ConsultantName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
		<th class="<?php echo $monitor_treatment_plan->RefDrName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><?php echo $monitor_treatment_plan->RefDrName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<th class="<?php echo $monitor_treatment_plan->RefDrMobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><?php echo $monitor_treatment_plan->RefDrMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
		<th class="<?php echo $monitor_treatment_plan->NewVisitDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><?php echo $monitor_treatment_plan->NewVisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->NewVisitYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><?php echo $monitor_treatment_plan->NewVisitYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
		<th class="<?php echo $monitor_treatment_plan->Treatment->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><?php echo $monitor_treatment_plan->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><?php echo $monitor_treatment_plan->IUIDoneDate1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><?php echo $monitor_treatment_plan->IUIDoneYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><?php echo $monitor_treatment_plan->UPTTestDate1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><?php echo $monitor_treatment_plan->UPTTestYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><?php echo $monitor_treatment_plan->IUIDoneDate2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><?php echo $monitor_treatment_plan->IUIDoneYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><?php echo $monitor_treatment_plan->UPTTestDate2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><?php echo $monitor_treatment_plan->UPTTestYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><?php echo $monitor_treatment_plan->IUIDoneDate3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><?php echo $monitor_treatment_plan->IUIDoneYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><?php echo $monitor_treatment_plan->UPTTestDate3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><?php echo $monitor_treatment_plan->UPTTestYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><?php echo $monitor_treatment_plan->IUIDoneDate4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<th class="<?php echo $monitor_treatment_plan->IUIDoneYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><?php echo $monitor_treatment_plan->IUIDoneYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><?php echo $monitor_treatment_plan->UPTTestDate4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<th class="<?php echo $monitor_treatment_plan->UPTTestYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><?php echo $monitor_treatment_plan->UPTTestYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<th class="<?php echo $monitor_treatment_plan->IVFStimulationDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><?php echo $monitor_treatment_plan->IVFStimulationDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->IVFStimulationYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><?php echo $monitor_treatment_plan->IVFStimulationYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
		<th class="<?php echo $monitor_treatment_plan->OPUDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><?php echo $monitor_treatment_plan->OPUDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->OPUYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><?php echo $monitor_treatment_plan->OPUYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
		<th class="<?php echo $monitor_treatment_plan->ETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><?php echo $monitor_treatment_plan->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->ETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><?php echo $monitor_treatment_plan->ETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<th class="<?php echo $monitor_treatment_plan->BetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><?php echo $monitor_treatment_plan->BetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->BetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><?php echo $monitor_treatment_plan->BetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
		<th class="<?php echo $monitor_treatment_plan->FETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><?php echo $monitor_treatment_plan->FETDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->FETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><?php echo $monitor_treatment_plan->FETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<th class="<?php echo $monitor_treatment_plan->FBetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><?php echo $monitor_treatment_plan->FBetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<th class="<?php echo $monitor_treatment_plan->FBetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><?php echo $monitor_treatment_plan->FBetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->createdby->Visible) { // createdby ?>
		<th class="<?php echo $monitor_treatment_plan->createdby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><?php echo $monitor_treatment_plan->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $monitor_treatment_plan->createddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><?php echo $monitor_treatment_plan->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $monitor_treatment_plan->modifiedby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><?php echo $monitor_treatment_plan->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $monitor_treatment_plan->modifieddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><?php echo $monitor_treatment_plan->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan->HospID->Visible) { // HospID ?>
		<th class="<?php echo $monitor_treatment_plan->HospID->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><?php echo $monitor_treatment_plan->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$monitor_treatment_plan_delete->RecCnt = 0;
$i = 0;
while (!$monitor_treatment_plan_delete->Recordset->EOF) {
	$monitor_treatment_plan_delete->RecCnt++;
	$monitor_treatment_plan_delete->RowCnt++;

	// Set row properties
	$monitor_treatment_plan->resetAttributes();
	$monitor_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$monitor_treatment_plan_delete->loadRowValues($monitor_treatment_plan_delete->Recordset);

	// Render row
	$monitor_treatment_plan_delete->renderRow();
?>
	<tr<?php echo $monitor_treatment_plan->rowAttributes() ?>>
<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
		<td<?php echo $monitor_treatment_plan->id->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan->id->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
		<td<?php echo $monitor_treatment_plan->PatId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan->PatId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
		<td<?php echo $monitor_treatment_plan->PatientId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan->PatientId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
		<td<?php echo $monitor_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
		<td<?php echo $monitor_treatment_plan->Age->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan->Age->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
		<td<?php echo $monitor_treatment_plan->MobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan->MobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
		<td<?php echo $monitor_treatment_plan->ConsultantName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan->ConsultantName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ConsultantName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
		<td<?php echo $monitor_treatment_plan->RefDrName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan->RefDrName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<td<?php echo $monitor_treatment_plan->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan->RefDrMobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
		<td<?php echo $monitor_treatment_plan->NewVisitDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan->NewVisitDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<td<?php echo $monitor_treatment_plan->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan->NewVisitYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td<?php echo $monitor_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan->IUIDoneDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan->UPTTestDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan->IUIDoneDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan->UPTTestDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan->IUIDoneDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan->UPTTestDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan->IUIDoneDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<td<?php echo $monitor_treatment_plan->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan->UPTTestDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<td<?php echo $monitor_treatment_plan->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<td<?php echo $monitor_treatment_plan->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan->IVFStimulationDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<td<?php echo $monitor_treatment_plan->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan->IVFStimulationYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
		<td<?php echo $monitor_treatment_plan->OPUDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan->OPUDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
		<td<?php echo $monitor_treatment_plan->OPUYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan->OPUYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
		<td<?php echo $monitor_treatment_plan->ETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan->ETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
		<td<?php echo $monitor_treatment_plan->ETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan->ETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<td<?php echo $monitor_treatment_plan->BetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan->BetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<td<?php echo $monitor_treatment_plan->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->BetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
		<td<?php echo $monitor_treatment_plan->FETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan->FETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
		<td<?php echo $monitor_treatment_plan->FETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan->FETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<td<?php echo $monitor_treatment_plan->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan->FBetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<td<?php echo $monitor_treatment_plan->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->FBetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->createdby->Visible) { // createdby ?>
		<td<?php echo $monitor_treatment_plan->createdby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan->createdby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $monitor_treatment_plan->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan->createddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $monitor_treatment_plan->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan->modifiedby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $monitor_treatment_plan->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan->modifieddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan->HospID->Visible) { // HospID ?>
		<td<?php echo $monitor_treatment_plan->HospID->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCnt ?>_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan->HospID->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$monitor_treatment_plan_delete->Recordset->moveNext();
}
$monitor_treatment_plan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $monitor_treatment_plan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$monitor_treatment_plan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$monitor_treatment_plan_delete->terminate();
?>