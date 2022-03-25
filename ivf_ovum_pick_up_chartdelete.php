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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_ovum_pick_up_chartdelete = currentForm = new ew.Form("fivf_ovum_pick_up_chartdelete", "delete");

// Form_CustomValidate event
fivf_ovum_pick_up_chartdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_ovum_pick_up_chartdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_ovum_pick_up_chartdelete.lists["x_Protocol"] = <?php echo $ivf_ovum_pick_up_chart_delete->Protocol->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartdelete.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_delete->Protocol->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartdelete.lists["x_Cannulation"] = <?php echo $ivf_ovum_pick_up_chart_delete->Cannulation->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartdelete.lists["x_Cannulation"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_delete->Cannulation->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartdelete.lists["x_PlanT"] = <?php echo $ivf_ovum_pick_up_chart_delete->PlanT->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartdelete.lists["x_PlanT"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_delete->PlanT->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_ovum_pick_up_chart_delete->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_delete->showMessage();
?>
<form name="fivf_ovum_pick_up_chartdelete" id="fivf_ovum_pick_up_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_ovum_pick_up_chart_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_ovum_pick_up_chart_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_ovum_pick_up_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_ovum_pick_up_chart_delete->RecCnt = 0;
$i = 0;
while (!$ivf_ovum_pick_up_chart_delete->Recordset->EOF) {
	$ivf_ovum_pick_up_chart_delete->RecCnt++;
	$ivf_ovum_pick_up_chart_delete->RowCnt++;

	// Set row properties
	$ivf_ovum_pick_up_chart->resetAttributes();
	$ivf_ovum_pick_up_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_ovum_pick_up_chart_delete->loadRowValues($ivf_ovum_pick_up_chart_delete->Recordset);

	// Render row
	$ivf_ovum_pick_up_chart_delete->renderRow();
?>
	<tr<?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<td<?php echo $ivf_ovum_pick_up_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_ovum_pick_up_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td<?php echo $ivf_ovum_pick_up_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<td<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<td<?php echo $ivf_ovum_pick_up_chart->SerumE2->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart->SerumE2->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumE2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<td<?php echo $ivf_ovum_pick_up_chart->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<td<?php echo $ivf_ovum_pick_up_chart->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Anesthesia->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart->Anesthesia->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Anesthesia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<td<?php echo $ivf_ovum_pick_up_chart->UCL->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart->UCL->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->UCL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Angle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart->Angle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Angle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<td<?php echo $ivf_ovum_pick_up_chart->EMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart->EMS->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->EMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<td<?php echo $ivf_ovum_pick_up_chart->Cannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart->Cannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Cannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<td<?php echo $ivf_ovum_pick_up_chart->PlanT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart->PlanT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->PlanT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td<?php echo $ivf_ovum_pick_up_chart->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_ovum_pick_up_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_delete->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TidNo->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_ovum_pick_up_chart_delete->terminate();
?>