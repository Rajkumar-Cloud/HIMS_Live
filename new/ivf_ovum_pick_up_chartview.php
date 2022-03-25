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
$ivf_ovum_pick_up_chart_view = new ivf_ovum_pick_up_chart_view();

// Run the page
$ivf_ovum_pick_up_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_ovum_pick_up_chart_view->isExport()) { ?>
<script>
var fivf_ovum_pick_up_chartview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_ovum_pick_up_chartview = currentForm = new ew.Form("fivf_ovum_pick_up_chartview", "view");
	loadjs.done("fivf_ovum_pick_up_chartview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_ovum_pick_up_chart_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_ovum_pick_up_chart_view->ExportOptions->render("body") ?>
<?php $ivf_ovum_pick_up_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_ovum_pick_up_chart_view->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_view->showMessage();
?>
<form name="fivf_ovum_pick_up_chartview" id="fivf_ovum_pick_up_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_ovum_pick_up_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_ovum_pick_up_chart_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_id"><script id="tpc_ivf_ovum_pick_up_chart_id" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_ovum_pick_up_chart_view->id->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_id" type="text/html"><span id="el_ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart_view->id->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo"><script id="tpc_ivf_ovum_pick_up_chart_RIDNo" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->RIDNo->caption() ?></script></span></td>
		<td data-name="RIDNo" <?php echo $ivf_ovum_pick_up_chart_view->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_RIDNo" type="text/html"><span id="el_ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart_view->RIDNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->RIDNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Name"><script id="tpc_ivf_ovum_pick_up_chart_Name" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_ovum_pick_up_chart_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Name" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart_view->Name->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle"><script id="tpc_ivf_ovum_pick_up_chart_ARTCycle" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->ARTCycle->caption() ?></script></span></td>
		<td data-name="ARTCycle" <?php echo $ivf_ovum_pick_up_chart_view->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ARTCycle" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart_view->ARTCycle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->ARTCycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant"><script id="tpc_ivf_ovum_pick_up_chart_Consultant" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $ivf_ovum_pick_up_chart_view->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Consultant" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart_view->Consultant->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<tr id="r_TotalDoseOfStimulation">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><script id="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TotalDoseOfStimulation->caption() ?></script></span></td>
		<td data-name="TotalDoseOfStimulation" <?php echo $ivf_ovum_pick_up_chart_view->TotalDoseOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_view->TotalDoseOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TotalDoseOfStimulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Protocol->Visible) { // Protocol ?>
	<tr id="r_Protocol">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol"><script id="tpc_ivf_ovum_pick_up_chart_Protocol" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Protocol->caption() ?></script></span></td>
		<td data-name="Protocol" <?php echo $ivf_ovum_pick_up_chart_view->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Protocol" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart_view->Protocol->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Protocol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<tr id="r_NumberOfDaysOfStimulation">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><script id="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->NumberOfDaysOfStimulation->caption() ?></script></span></td>
		<td data-name="NumberOfDaysOfStimulation" <?php echo $ivf_ovum_pick_up_chart_view->NumberOfDaysOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_view->NumberOfDaysOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<tr id="r_TriggerDateTime">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime"><script id="tpc_ivf_ovum_pick_up_chart_TriggerDateTime" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TriggerDateTime->caption() ?></script></span></td>
		<td data-name="TriggerDateTime" <?php echo $ivf_ovum_pick_up_chart_view->TriggerDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TriggerDateTime" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_view->TriggerDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TriggerDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->OPUDateTime->Visible) { // OPUDateTime ?>
	<tr id="r_OPUDateTime">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime"><script id="tpc_ivf_ovum_pick_up_chart_OPUDateTime" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->OPUDateTime->caption() ?></script></span></td>
		<td data-name="OPUDateTime" <?php echo $ivf_ovum_pick_up_chart_view->OPUDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OPUDateTime" type="text/html"><span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_view->OPUDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->OPUDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<tr id="r_HoursAfterTrigger">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger"><script id="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->HoursAfterTrigger->caption() ?></script></span></td>
		<td data-name="HoursAfterTrigger" <?php echo $ivf_ovum_pick_up_chart_view->HoursAfterTrigger->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger" type="text/html"><span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart_view->HoursAfterTrigger->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->HoursAfterTrigger->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->SerumE2->Visible) { // SerumE2 ?>
	<tr id="r_SerumE2">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2"><script id="tpc_ivf_ovum_pick_up_chart_SerumE2" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->SerumE2->caption() ?></script></span></td>
		<td data-name="SerumE2" <?php echo $ivf_ovum_pick_up_chart_view->SerumE2->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumE2" type="text/html"><span id="el_ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart_view->SerumE2->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->SerumE2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->SerumP4->Visible) { // SerumP4 ?>
	<tr id="r_SerumP4">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4"><script id="tpc_ivf_ovum_pick_up_chart_SerumP4" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->SerumP4->caption() ?></script></span></td>
		<td data-name="SerumP4" <?php echo $ivf_ovum_pick_up_chart_view->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumP4" type="text/html"><span id="el_ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart_view->SerumP4->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->SerumP4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->FORT->Visible) { // FORT ?>
	<tr id="r_FORT">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT"><script id="tpc_ivf_ovum_pick_up_chart_FORT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->FORT->caption() ?></script></span></td>
		<td data-name="FORT" <?php echo $ivf_ovum_pick_up_chart_view->FORT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FORT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart_view->FORT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->FORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<tr id="r_ExperctedOocytes">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes"><script id="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->ExperctedOocytes->caption() ?></script></span></td>
		<td data-name="ExperctedOocytes" <?php echo $ivf_ovum_pick_up_chart_view->ExperctedOocytes->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart_view->ExperctedOocytes->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->ExperctedOocytes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<tr id="r_NoOfOocytesRetrieved">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrieved->caption() ?></script></span></td>
		<td data-name="NoOfOocytesRetrieved" <?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrieved->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrieved->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrieved->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<tr id="r_OocytesRetreivalRate">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><script id="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->OocytesRetreivalRate->caption() ?></script></span></td>
		<td data-name="OocytesRetreivalRate" <?php echo $ivf_ovum_pick_up_chart_view->OocytesRetreivalRate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate" type="text/html"><span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart_view->OocytesRetreivalRate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->OocytesRetreivalRate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Anesthesia->Visible) { // Anesthesia ?>
	<tr id="r_Anesthesia">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia"><script id="tpc_ivf_ovum_pick_up_chart_Anesthesia" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Anesthesia->caption() ?></script></span></td>
		<td data-name="Anesthesia" <?php echo $ivf_ovum_pick_up_chart_view->Anesthesia->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Anesthesia" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart_view->Anesthesia->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Anesthesia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TrialCannulation->Visible) { // TrialCannulation ?>
	<tr id="r_TrialCannulation">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation"><script id="tpc_ivf_ovum_pick_up_chart_TrialCannulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TrialCannulation->caption() ?></script></span></td>
		<td data-name="TrialCannulation" <?php echo $ivf_ovum_pick_up_chart_view->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TrialCannulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart_view->TrialCannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TrialCannulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->UCL->Visible) { // UCL ?>
	<tr id="r_UCL">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL"><script id="tpc_ivf_ovum_pick_up_chart_UCL" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->UCL->caption() ?></script></span></td>
		<td data-name="UCL" <?php echo $ivf_ovum_pick_up_chart_view->UCL->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_UCL" type="text/html"><span id="el_ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart_view->UCL->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->UCL->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Angle->Visible) { // Angle ?>
	<tr id="r_Angle">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle"><script id="tpc_ivf_ovum_pick_up_chart_Angle" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Angle->caption() ?></script></span></td>
		<td data-name="Angle" <?php echo $ivf_ovum_pick_up_chart_view->Angle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Angle" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart_view->Angle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Angle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->EMS->Visible) { // EMS ?>
	<tr id="r_EMS">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS"><script id="tpc_ivf_ovum_pick_up_chart_EMS" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->EMS->caption() ?></script></span></td>
		<td data-name="EMS" <?php echo $ivf_ovum_pick_up_chart_view->EMS->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_EMS" type="text/html"><span id="el_ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart_view->EMS->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->EMS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->Cannulation->Visible) { // Cannulation ?>
	<tr id="r_Cannulation">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation"><script id="tpc_ivf_ovum_pick_up_chart_Cannulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->Cannulation->caption() ?></script></span></td>
		<td data-name="Cannulation" <?php echo $ivf_ovum_pick_up_chart_view->Cannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Cannulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart_view->Cannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->Cannulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->ProcedureT->Visible) { // ProcedureT ?>
	<tr id="r_ProcedureT">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ProcedureT"><script id="tpc_ivf_ovum_pick_up_chart_ProcedureT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->ProcedureT->caption() ?></script></span></td>
		<td data-name="ProcedureT" <?php echo $ivf_ovum_pick_up_chart_view->ProcedureT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ProcedureT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<span<?php echo $ivf_ovum_pick_up_chart_view->ProcedureT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->ProcedureT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<tr id="r_NoOfOocytesRetrievedd">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrievedd->caption() ?></script></span></td>
		<td data-name="NoOfOocytesRetrievedd" <?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrievedd->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrievedd->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->CourseInHospital->Visible) { // CourseInHospital ?>
	<tr id="r_CourseInHospital">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_CourseInHospital"><script id="tpc_ivf_ovum_pick_up_chart_CourseInHospital" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->CourseInHospital->caption() ?></script></span></td>
		<td data-name="CourseInHospital" <?php echo $ivf_ovum_pick_up_chart_view->CourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_CourseInHospital" type="text/html"><span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<span<?php echo $ivf_ovum_pick_up_chart_view->CourseInHospital->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->CourseInHospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->DischargeAdvise->Visible) { // DischargeAdvise ?>
	<tr id="r_DischargeAdvise">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_DischargeAdvise"><script id="tpc_ivf_ovum_pick_up_chart_DischargeAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->DischargeAdvise->caption() ?></script></span></td>
		<td data-name="DischargeAdvise" <?php echo $ivf_ovum_pick_up_chart_view->DischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_DischargeAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<span<?php echo $ivf_ovum_pick_up_chart_view->DischargeAdvise->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->DischargeAdvise->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
	<tr id="r_FollowUpAdvise">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise"><script id="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->FollowUpAdvise->caption() ?></script></span></td>
		<td data-name="FollowUpAdvise" <?php echo $ivf_ovum_pick_up_chart_view->FollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<span<?php echo $ivf_ovum_pick_up_chart_view->FollowUpAdvise->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->FollowUpAdvise->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->PlanT->Visible) { // PlanT ?>
	<tr id="r_PlanT">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT"><script id="tpc_ivf_ovum_pick_up_chart_PlanT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->PlanT->caption() ?></script></span></td>
		<td data-name="PlanT" <?php echo $ivf_ovum_pick_up_chart_view->PlanT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_PlanT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart_view->PlanT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->PlanT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->ReviewDate->Visible) { // ReviewDate ?>
	<tr id="r_ReviewDate">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDate" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->ReviewDate->caption() ?></script></span></td>
		<td data-name="ReviewDate" <?php echo $ivf_ovum_pick_up_chart_view->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDate" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart_view->ReviewDate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->ReviewDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<tr id="r_ReviewDoctor">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDoctor" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->ReviewDoctor->caption() ?></script></span></td>
		<td data-name="ReviewDoctor" <?php echo $ivf_ovum_pick_up_chart_view->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDoctor" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart_view->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->ReviewDoctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TemplateProcedure->Visible) { // TemplateProcedure ?>
	<tr id="r_TemplateProcedure">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateProcedure"><script id="tpc_ivf_ovum_pick_up_chart_TemplateProcedure" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TemplateProcedure->caption() ?></script></span></td>
		<td data-name="TemplateProcedure" <?php echo $ivf_ovum_pick_up_chart_view->TemplateProcedure->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateProcedure" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateProcedure">
<span<?php echo $ivf_ovum_pick_up_chart_view->TemplateProcedure->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TemplateProcedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TemplateCourseInHospital->Visible) { // TemplateCourseInHospital ?>
	<tr id="r_TemplateCourseInHospital">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><script id="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TemplateCourseInHospital->caption() ?></script></span></td>
		<td data-name="TemplateCourseInHospital" <?php echo $ivf_ovum_pick_up_chart_view->TemplateCourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateCourseInHospital">
<span<?php echo $ivf_ovum_pick_up_chart_view->TemplateCourseInHospital->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TemplateCourseInHospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TemplateDischargeAdvise->Visible) { // TemplateDischargeAdvise ?>
	<tr id="r_TemplateDischargeAdvise">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><script id="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TemplateDischargeAdvise->caption() ?></script></span></td>
		<td data-name="TemplateDischargeAdvise" <?php echo $ivf_ovum_pick_up_chart_view->TemplateDischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateDischargeAdvise">
<span<?php echo $ivf_ovum_pick_up_chart_view->TemplateDischargeAdvise->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TemplateDischargeAdvise->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TemplateFollowUpAdvise->Visible) { // TemplateFollowUpAdvise ?>
	<tr id="r_TemplateFollowUpAdvise">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><script id="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TemplateFollowUpAdvise->caption() ?></script></span></td>
		<td data-name="TemplateFollowUpAdvise" <?php echo $ivf_ovum_pick_up_chart_view->TemplateFollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise">
<span<?php echo $ivf_ovum_pick_up_chart_view->TemplateFollowUpAdvise->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TemplateFollowUpAdvise->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_ovum_pick_up_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo"><script id="tpc_ivf_ovum_pick_up_chart_TidNo" type="text/html"><?php echo $ivf_ovum_pick_up_chart_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_ovum_pick_up_chart_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TidNo" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart_view->TidNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_ovum_pick_up_chartview" class="ew-custom-template"></div>
<script id="tpm_ivf_ovum_pick_up_chartview" type="text/html">
<div id="ct_ivf_ovum_pick_up_chart_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
{{include tmpl=~getTemplate("#tpx_RIDNO")/}}
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up Chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ARTCycle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Consultant")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Protocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Protocol")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation")/}}</span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TriggerDateTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TriggerDateTime")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OPUDateTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_OPUDateTime")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumE2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_SerumE2")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FORT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_FORT")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumP4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_SerumP4")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ExperctedOocytes")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Anesthesia"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Anesthesia")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TrialCannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TrialCannulation")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_UCL"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_UCL")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Angle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Angle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_EMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_EMS")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Cannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Cannulation")/}}</span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateProcedure")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ProcedureT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ProcedureT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_CourseInHospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_CourseInHospital")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_DischargeAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_DischargeAdvise")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_FollowUpAdvise")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_PlanT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_PlanT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ReviewDate")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDoctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ReviewDoctor")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_ovum_pick_up_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_ovum_pick_up_chartview", "tpm_ivf_ovum_pick_up_chartview", "ivf_ovum_pick_up_chartview", "<?php echo $ivf_ovum_pick_up_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_ovum_pick_up_chartview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_ovum_pick_up_chart_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_ovum_pick_up_chart_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_ovum_pick_up_chart_view->terminate();
?>