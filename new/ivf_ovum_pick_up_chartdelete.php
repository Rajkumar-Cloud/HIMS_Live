<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_ovum_pick_up_chart_delete = new ivf_ovum_pick_up_chart_delete();

// Run the page
$ivf_ovum_pick_up_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_ovum_pick_up_chartdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_ovum_pick_up_chartdelete = currentForm = new ew.Form("fivf_ovum_pick_up_chartdelete", "delete");
	loadjs.done("fivf_ovum_pick_up_chartdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_ovum_pick_up_chart_delete->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_delete->showMessage();
?>
<form name="fivf_ovum_pick_up_chartdelete" id="fivf_ovum_pick_up_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_ovum_pick_up_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_ovum_pick_up_chart_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->id->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><?php echo $ivf_ovum_pick_up_chart_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><?php echo $ivf_ovum_pick_up_chart_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Name->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><?php echo $ivf_ovum_pick_up_chart_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><?php echo $ivf_ovum_pick_up_chart_delete->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Consultant->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><?php echo $ivf_ovum_pick_up_chart_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?php echo $ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Protocol->Visible) { // Protocol ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Protocol->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><?php echo $ivf_ovum_pick_up_chart_delete->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?php echo $ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->TriggerDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><?php echo $ivf_ovum_pick_up_chart_delete->TriggerDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->OPUDateTime->Visible) { // OPUDateTime ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->OPUDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><?php echo $ivf_ovum_pick_up_chart_delete->OPUDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><?php echo $ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->SerumE2->Visible) { // SerumE2 ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->SerumE2->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><?php echo $ivf_ovum_pick_up_chart_delete->SerumE2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->SerumP4->Visible) { // SerumP4 ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->SerumP4->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><?php echo $ivf_ovum_pick_up_chart_delete->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->FORT->Visible) { // FORT ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->FORT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><?php echo $ivf_ovum_pick_up_chart_delete->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->ExperctedOocytes->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><?php echo $ivf_ovum_pick_up_chart_delete->ExperctedOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?php echo $ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Anesthesia->Visible) { // Anesthesia ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Anesthesia->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><?php echo $ivf_ovum_pick_up_chart_delete->Anesthesia->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><?php echo $ivf_ovum_pick_up_chart_delete->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->UCL->Visible) { // UCL ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->UCL->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><?php echo $ivf_ovum_pick_up_chart_delete->UCL->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Angle->Visible) { // Angle ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Angle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><?php echo $ivf_ovum_pick_up_chart_delete->Angle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->EMS->Visible) { // EMS ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->EMS->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><?php echo $ivf_ovum_pick_up_chart_delete->EMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Cannulation->Visible) { // Cannulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->PlanT->Visible) { // PlanT ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->PlanT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><?php echo $ivf_ovum_pick_up_chart_delete->PlanT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ReviewDate->Visible) { // ReviewDate ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><?php echo $ivf_ovum_pick_up_chart_delete->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><?php echo $ivf_ovum_pick_up_chart_delete->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><?php echo $ivf_ovum_pick_up_chart_delete->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_ovum_pick_up_chart_delete->RecordCount = 0;
$i = 0;
while (!$ivf_ovum_pick_up_chart_delete->Recordset->EOF) {
	$ivf_ovum_pick_up_chart_delete->RecordCount++;
	$ivf_ovum_pick_up_chart_delete->RowCount++;

	// Set row properties
	$ivf_ovum_pick_up_chart->resetAttributes();
	$ivf_ovum_pick_up_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_ovum_pick_up_chart_delete->loadRowValues($ivf_ovum_pick_up_chart_delete->Recordset);

	// Render row
	$ivf_ovum_pick_up_chart_delete->renderRow();
?>
	<tr <?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart_delete->id->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Name->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart_delete->ARTCycle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Consultant->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Protocol->Visible) { // Protocol ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Protocol->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->TriggerDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_delete->TriggerDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->OPUDateTime->Visible) { // OPUDateTime ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->OPUDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_delete->OPUDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->OPUDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->SerumE2->Visible) { // SerumE2 ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->SerumE2->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart_delete->SerumE2->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->SerumE2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->SerumP4->Visible) { // SerumP4 ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart_delete->SerumP4->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->FORT->Visible) { // FORT ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart_delete->FORT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart_delete->ExperctedOocytes->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Anesthesia->Visible) { // Anesthesia ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Anesthesia->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Anesthesia->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Anesthesia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart_delete->TrialCannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->UCL->Visible) { // UCL ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->UCL->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart_delete->UCL->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->UCL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Angle->Visible) { // Angle ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Angle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Angle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Angle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->EMS->Visible) { // EMS ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->EMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart_delete->EMS->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->EMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->Cannulation->Visible) { // Cannulation ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->PlanT->Visible) { // PlanT ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->PlanT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart_delete->PlanT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->PlanT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ReviewDate->Visible) { // ReviewDate ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart_delete->ReviewDate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart_delete->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_ovum_pick_up_chart_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCount ?>_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart_delete->TidNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_ovum_pick_up_chart_delete->Recordset->moveNext();
}
$ivf_ovum_pick_up_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_ovum_pick_up_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_ovum_pick_up_chart_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_ovum_pick_up_chart_delete->terminate();
?>