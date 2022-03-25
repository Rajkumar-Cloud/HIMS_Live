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
$ivf_stimulation_chart_view = new ivf_stimulation_chart_view();

// Run the page
$ivf_stimulation_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_stimulation_chart_view->isExport()) { ?>
<script>
var fivf_stimulation_chartview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_stimulation_chartview = currentForm = new ew.Form("fivf_stimulation_chartview", "view");
	loadjs.done("fivf_stimulation_chartview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_stimulation_chart_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_stimulation_chart_view->ExportOptions->render("body") ?>
<?php $ivf_stimulation_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_stimulation_chart_view->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_view->showMessage();
?>
<form name="fivf_stimulation_chartview" id="fivf_stimulation_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_stimulation_chart_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_id"><script id="tpc_ivf_stimulation_chart_id" type="text/html"><?php echo $ivf_stimulation_chart_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_stimulation_chart_view->id->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_id" type="text/html"><span id="el_ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart_view->id->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RIDNo"><script id="tpc_ivf_stimulation_chart_RIDNo" type="text/html"><?php echo $ivf_stimulation_chart_view->RIDNo->caption() ?></script></span></td>
		<td data-name="RIDNo" <?php echo $ivf_stimulation_chart_view->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RIDNo" type="text/html"><span id="el_ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart_view->RIDNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RIDNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Name"><script id="tpc_ivf_stimulation_chart_Name" type="text/html"><?php echo $ivf_stimulation_chart_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_stimulation_chart_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Name" type="text/html"><span id="el_ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart_view->Name->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ARTCycle"><script id="tpc_ivf_stimulation_chart_ARTCycle" type="text/html"><?php echo $ivf_stimulation_chart_view->ARTCycle->caption() ?></script></span></td>
		<td data-name="ARTCycle" <?php echo $ivf_stimulation_chart_view->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ARTCycle" type="text/html"><span id="el_ivf_stimulation_chart_ARTCycle">
<span<?php echo $ivf_stimulation_chart_view->ARTCycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ARTCycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->FemaleFactor->Visible) { // FemaleFactor ?>
	<tr id="r_FemaleFactor">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor"><script id="tpc_ivf_stimulation_chart_FemaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_view->FemaleFactor->caption() ?></script></span></td>
		<td data-name="FemaleFactor" <?php echo $ivf_stimulation_chart_view->FemaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FemaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_FemaleFactor">
<span<?php echo $ivf_stimulation_chart_view->FemaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->FemaleFactor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->MaleFactor->Visible) { // MaleFactor ?>
	<tr id="r_MaleFactor">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MaleFactor"><script id="tpc_ivf_stimulation_chart_MaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_view->MaleFactor->caption() ?></script></span></td>
		<td data-name="MaleFactor" <?php echo $ivf_stimulation_chart_view->MaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_MaleFactor">
<span<?php echo $ivf_stimulation_chart_view->MaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->MaleFactor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Protocol->Visible) { // Protocol ?>
	<tr id="r_Protocol">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Protocol"><script id="tpc_ivf_stimulation_chart_Protocol" type="text/html"><?php echo $ivf_stimulation_chart_view->Protocol->caption() ?></script></span></td>
		<td data-name="Protocol" <?php echo $ivf_stimulation_chart_view->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Protocol" type="text/html"><span id="el_ivf_stimulation_chart_Protocol">
<span<?php echo $ivf_stimulation_chart_view->Protocol->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Protocol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SemenFrozen->Visible) { // SemenFrozen ?>
	<tr id="r_SemenFrozen">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen"><script id="tpc_ivf_stimulation_chart_SemenFrozen" type="text/html"><?php echo $ivf_stimulation_chart_view->SemenFrozen->caption() ?></script></span></td>
		<td data-name="SemenFrozen" <?php echo $ivf_stimulation_chart_view->SemenFrozen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SemenFrozen" type="text/html"><span id="el_ivf_stimulation_chart_SemenFrozen">
<span<?php echo $ivf_stimulation_chart_view->SemenFrozen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SemenFrozen->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<tr id="r_A4ICSICycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle"><script id="tpc_ivf_stimulation_chart_A4ICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_view->A4ICSICycle->caption() ?></script></span></td>
		<td data-name="A4ICSICycle" <?php echo $ivf_stimulation_chart_view->A4ICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_A4ICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_A4ICSICycle">
<span<?php echo $ivf_stimulation_chart_view->A4ICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->A4ICSICycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<tr id="r_TotalICSICycle">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle"><script id="tpc_ivf_stimulation_chart_TotalICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_view->TotalICSICycle->caption() ?></script></span></td>
		<td data-name="TotalICSICycle" <?php echo $ivf_stimulation_chart_view->TotalICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TotalICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_TotalICSICycle">
<span<?php echo $ivf_stimulation_chart_view->TotalICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TotalICSICycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<tr id="r_TypeOfInfertility">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility"><script id="tpc_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><?php echo $ivf_stimulation_chart_view->TypeOfInfertility->caption() ?></script></span></td>
		<td data-name="TypeOfInfertility" <?php echo $ivf_stimulation_chart_view->TypeOfInfertility->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><span id="el_ivf_stimulation_chart_TypeOfInfertility">
<span<?php echo $ivf_stimulation_chart_view->TypeOfInfertility->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TypeOfInfertility->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Duration"><script id="tpc_ivf_stimulation_chart_Duration" type="text/html"><?php echo $ivf_stimulation_chart_view->Duration->caption() ?></script></span></td>
		<td data-name="Duration" <?php echo $ivf_stimulation_chart_view->Duration->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Duration" type="text/html"><span id="el_ivf_stimulation_chart_Duration">
<span<?php echo $ivf_stimulation_chart_view->Duration->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Duration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LMP"><script id="tpc_ivf_stimulation_chart_LMP" type="text/html"><?php echo $ivf_stimulation_chart_view->LMP->caption() ?></script></span></td>
		<td data-name="LMP" <?php echo $ivf_stimulation_chart_view->LMP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LMP" type="text/html"><span id="el_ivf_stimulation_chart_LMP">
<span<?php echo $ivf_stimulation_chart_view->LMP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->LMP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RelevantHistory->Visible) { // RelevantHistory ?>
	<tr id="r_RelevantHistory">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory"><script id="tpc_ivf_stimulation_chart_RelevantHistory" type="text/html"><?php echo $ivf_stimulation_chart_view->RelevantHistory->caption() ?></script></span></td>
		<td data-name="RelevantHistory" <?php echo $ivf_stimulation_chart_view->RelevantHistory->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RelevantHistory" type="text/html"><span id="el_ivf_stimulation_chart_RelevantHistory">
<span<?php echo $ivf_stimulation_chart_view->RelevantHistory->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RelevantHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->IUICycles->Visible) { // IUICycles ?>
	<tr id="r_IUICycles">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IUICycles"><script id="tpc_ivf_stimulation_chart_IUICycles" type="text/html"><?php echo $ivf_stimulation_chart_view->IUICycles->caption() ?></script></span></td>
		<td data-name="IUICycles" <?php echo $ivf_stimulation_chart_view->IUICycles->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IUICycles" type="text/html"><span id="el_ivf_stimulation_chart_IUICycles">
<span<?php echo $ivf_stimulation_chart_view->IUICycles->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->IUICycles->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->AFC->Visible) { // AFC ?>
	<tr id="r_AFC">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AFC"><script id="tpc_ivf_stimulation_chart_AFC" type="text/html"><?php echo $ivf_stimulation_chart_view->AFC->caption() ?></script></span></td>
		<td data-name="AFC" <?php echo $ivf_stimulation_chart_view->AFC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AFC" type="text/html"><span id="el_ivf_stimulation_chart_AFC">
<span<?php echo $ivf_stimulation_chart_view->AFC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->AFC->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->AMH->Visible) { // AMH ?>
	<tr id="r_AMH">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AMH"><script id="tpc_ivf_stimulation_chart_AMH" type="text/html"><?php echo $ivf_stimulation_chart_view->AMH->caption() ?></script></span></td>
		<td data-name="AMH" <?php echo $ivf_stimulation_chart_view->AMH->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AMH" type="text/html"><span id="el_ivf_stimulation_chart_AMH">
<span<?php echo $ivf_stimulation_chart_view->AMH->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->AMH->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->FBMI->Visible) { // FBMI ?>
	<tr id="r_FBMI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FBMI"><script id="tpc_ivf_stimulation_chart_FBMI" type="text/html"><?php echo $ivf_stimulation_chart_view->FBMI->caption() ?></script></span></td>
		<td data-name="FBMI" <?php echo $ivf_stimulation_chart_view->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FBMI" type="text/html"><span id="el_ivf_stimulation_chart_FBMI">
<span<?php echo $ivf_stimulation_chart_view->FBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->FBMI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->MBMI->Visible) { // MBMI ?>
	<tr id="r_MBMI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MBMI"><script id="tpc_ivf_stimulation_chart_MBMI" type="text/html"><?php echo $ivf_stimulation_chart_view->MBMI->caption() ?></script></span></td>
		<td data-name="MBMI" <?php echo $ivf_stimulation_chart_view->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MBMI" type="text/html"><span id="el_ivf_stimulation_chart_MBMI">
<span<?php echo $ivf_stimulation_chart_view->MBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->MBMI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<tr id="r_OvarianVolumeRT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT"><script id="tpc_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><?php echo $ivf_stimulation_chart_view->OvarianVolumeRT->caption() ?></script></span></td>
		<td data-name="OvarianVolumeRT" <?php echo $ivf_stimulation_chart_view->OvarianVolumeRT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<span<?php echo $ivf_stimulation_chart_view->OvarianVolumeRT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->OvarianVolumeRT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<tr id="r_OvarianVolumeLT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT"><script id="tpc_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><?php echo $ivf_stimulation_chart_view->OvarianVolumeLT->caption() ?></script></span></td>
		<td data-name="OvarianVolumeLT" <?php echo $ivf_stimulation_chart_view->OvarianVolumeLT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<span<?php echo $ivf_stimulation_chart_view->OvarianVolumeLT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->OvarianVolumeLT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<tr id="r_DAYSOFSTIMULATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION"><script id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><?php echo $ivf_stimulation_chart_view->DAYSOFSTIMULATION->caption() ?></script></span></td>
		<td data-name="DAYSOFSTIMULATION" <?php echo $ivf_stimulation_chart_view->DAYSOFSTIMULATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?php echo $ivf_stimulation_chart_view->DAYSOFSTIMULATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DAYSOFSTIMULATION->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<tr id="r_DOSEOFGONADOTROPINS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><script id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><?php echo $ivf_stimulation_chart_view->DOSEOFGONADOTROPINS->caption() ?></script></span></td>
		<td data-name="DOSEOFGONADOTROPINS" <?php echo $ivf_stimulation_chart_view->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?php echo $ivf_stimulation_chart_view->DOSEOFGONADOTROPINS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->INJTYPE->Visible) { // INJTYPE ?>
	<tr id="r_INJTYPE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_INJTYPE"><script id="tpc_ivf_stimulation_chart_INJTYPE" type="text/html"><?php echo $ivf_stimulation_chart_view->INJTYPE->caption() ?></script></span></td>
		<td data-name="INJTYPE" <?php echo $ivf_stimulation_chart_view->INJTYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_INJTYPE" type="text/html"><span id="el_ivf_stimulation_chart_INJTYPE">
<span<?php echo $ivf_stimulation_chart_view->INJTYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->INJTYPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<tr id="r_ANTAGONISTDAYS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS"><script id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><?php echo $ivf_stimulation_chart_view->ANTAGONISTDAYS->caption() ?></script></span></td>
		<td data-name="ANTAGONISTDAYS" <?php echo $ivf_stimulation_chart_view->ANTAGONISTDAYS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?php echo $ivf_stimulation_chart_view->ANTAGONISTDAYS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ANTAGONISTDAYS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<tr id="r_ANTAGONISTSTARTDAY">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><script id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><?php echo $ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->caption() ?></script></span></td>
		<td data-name="ANTAGONISTSTARTDAY" <?php echo $ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?php echo $ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<tr id="r_GROWTHHORMONE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE"><script id="tpc_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><?php echo $ivf_stimulation_chart_view->GROWTHHORMONE->caption() ?></script></span></td>
		<td data-name="GROWTHHORMONE" <?php echo $ivf_stimulation_chart_view->GROWTHHORMONE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<span<?php echo $ivf_stimulation_chart_view->GROWTHHORMONE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GROWTHHORMONE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<tr id="r_PRETREATMENT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT"><script id="tpc_ivf_stimulation_chart_PRETREATMENT" type="text/html"><?php echo $ivf_stimulation_chart_view->PRETREATMENT->caption() ?></script></span></td>
		<td data-name="PRETREATMENT" <?php echo $ivf_stimulation_chart_view->PRETREATMENT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PRETREATMENT" type="text/html"><span id="el_ivf_stimulation_chart_PRETREATMENT">
<span<?php echo $ivf_stimulation_chart_view->PRETREATMENT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->PRETREATMENT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SerumP4->Visible) { // SerumP4 ?>
	<tr id="r_SerumP4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SerumP4"><script id="tpc_ivf_stimulation_chart_SerumP4" type="text/html"><?php echo $ivf_stimulation_chart_view->SerumP4->caption() ?></script></span></td>
		<td data-name="SerumP4" <?php echo $ivf_stimulation_chart_view->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SerumP4" type="text/html"><span id="el_ivf_stimulation_chart_SerumP4">
<span<?php echo $ivf_stimulation_chart_view->SerumP4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SerumP4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->FORT->Visible) { // FORT ?>
	<tr id="r_FORT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FORT"><script id="tpc_ivf_stimulation_chart_FORT" type="text/html"><?php echo $ivf_stimulation_chart_view->FORT->caption() ?></script></span></td>
		<td data-name="FORT" <?php echo $ivf_stimulation_chart_view->FORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FORT" type="text/html"><span id="el_ivf_stimulation_chart_FORT">
<span<?php echo $ivf_stimulation_chart_view->FORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->FORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->MedicalFactors->Visible) { // MedicalFactors ?>
	<tr id="r_MedicalFactors">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors"><script id="tpc_ivf_stimulation_chart_MedicalFactors" type="text/html"><?php echo $ivf_stimulation_chart_view->MedicalFactors->caption() ?></script></span></td>
		<td data-name="MedicalFactors" <?php echo $ivf_stimulation_chart_view->MedicalFactors->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MedicalFactors" type="text/html"><span id="el_ivf_stimulation_chart_MedicalFactors">
<span<?php echo $ivf_stimulation_chart_view->MedicalFactors->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->MedicalFactors->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SCDate->Visible) { // SCDate ?>
	<tr id="r_SCDate">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SCDate"><script id="tpc_ivf_stimulation_chart_SCDate" type="text/html"><?php echo $ivf_stimulation_chart_view->SCDate->caption() ?></script></span></td>
		<td data-name="SCDate" <?php echo $ivf_stimulation_chart_view->SCDate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SCDate" type="text/html"><span id="el_ivf_stimulation_chart_SCDate">
<span<?php echo $ivf_stimulation_chart_view->SCDate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SCDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<tr id="r_OvarianSurgery">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery"><script id="tpc_ivf_stimulation_chart_OvarianSurgery" type="text/html"><?php echo $ivf_stimulation_chart_view->OvarianSurgery->caption() ?></script></span></td>
		<td data-name="OvarianSurgery" <?php echo $ivf_stimulation_chart_view->OvarianSurgery->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianSurgery" type="text/html"><span id="el_ivf_stimulation_chart_OvarianSurgery">
<span<?php echo $ivf_stimulation_chart_view->OvarianSurgery->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->OvarianSurgery->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<tr id="r_PreProcedureOrder">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder"><script id="tpc_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><?php echo $ivf_stimulation_chart_view->PreProcedureOrder->caption() ?></script></span></td>
		<td data-name="PreProcedureOrder" <?php echo $ivf_stimulation_chart_view->PreProcedureOrder->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><span id="el_ivf_stimulation_chart_PreProcedureOrder">
<span<?php echo $ivf_stimulation_chart_view->PreProcedureOrder->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->PreProcedureOrder->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TRIGGERR->Visible) { // TRIGGERR ?>
	<tr id="r_TRIGGERR">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR"><script id="tpc_ivf_stimulation_chart_TRIGGERR" type="text/html"><?php echo $ivf_stimulation_chart_view->TRIGGERR->caption() ?></script></span></td>
		<td data-name="TRIGGERR" <?php echo $ivf_stimulation_chart_view->TRIGGERR->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERR" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERR">
<span<?php echo $ivf_stimulation_chart_view->TRIGGERR->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TRIGGERR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<tr id="r_TRIGGERDATE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE"><script id="tpc_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><?php echo $ivf_stimulation_chart_view->TRIGGERDATE->caption() ?></script></span></td>
		<td data-name="TRIGGERDATE" <?php echo $ivf_stimulation_chart_view->TRIGGERDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERDATE">
<span<?php echo $ivf_stimulation_chart_view->TRIGGERDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TRIGGERDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<tr id="r_ATHOMEorCLINIC">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC"><script id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><?php echo $ivf_stimulation_chart_view->ATHOMEorCLINIC->caption() ?></script></span></td>
		<td data-name="ATHOMEorCLINIC" <?php echo $ivf_stimulation_chart_view->ATHOMEorCLINIC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?php echo $ivf_stimulation_chart_view->ATHOMEorCLINIC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ATHOMEorCLINIC->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->OPUDATE->Visible) { // OPUDATE ?>
	<tr id="r_OPUDATE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OPUDATE"><script id="tpc_ivf_stimulation_chart_OPUDATE" type="text/html"><?php echo $ivf_stimulation_chart_view->OPUDATE->caption() ?></script></span></td>
		<td data-name="OPUDATE" <?php echo $ivf_stimulation_chart_view->OPUDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OPUDATE" type="text/html"><span id="el_ivf_stimulation_chart_OPUDATE">
<span<?php echo $ivf_stimulation_chart_view->OPUDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->OPUDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<tr id="r_ALLFREEZEINDICATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION"><script id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><?php echo $ivf_stimulation_chart_view->ALLFREEZEINDICATION->caption() ?></script></span></td>
		<td data-name="ALLFREEZEINDICATION" <?php echo $ivf_stimulation_chart_view->ALLFREEZEINDICATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?php echo $ivf_stimulation_chart_view->ALLFREEZEINDICATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ALLFREEZEINDICATION->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ERA->Visible) { // ERA ?>
	<tr id="r_ERA">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ERA"><script id="tpc_ivf_stimulation_chart_ERA" type="text/html"><?php echo $ivf_stimulation_chart_view->ERA->caption() ?></script></span></td>
		<td data-name="ERA" <?php echo $ivf_stimulation_chart_view->ERA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ERA" type="text/html"><span id="el_ivf_stimulation_chart_ERA">
<span<?php echo $ivf_stimulation_chart_view->ERA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ERA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->PGTA->Visible) { // PGTA ?>
	<tr id="r_PGTA">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGTA"><script id="tpc_ivf_stimulation_chart_PGTA" type="text/html"><?php echo $ivf_stimulation_chart_view->PGTA->caption() ?></script></span></td>
		<td data-name="PGTA" <?php echo $ivf_stimulation_chart_view->PGTA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGTA" type="text/html"><span id="el_ivf_stimulation_chart_PGTA">
<span<?php echo $ivf_stimulation_chart_view->PGTA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->PGTA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->PGD->Visible) { // PGD ?>
	<tr id="r_PGD">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGD"><script id="tpc_ivf_stimulation_chart_PGD" type="text/html"><?php echo $ivf_stimulation_chart_view->PGD->caption() ?></script></span></td>
		<td data-name="PGD" <?php echo $ivf_stimulation_chart_view->PGD->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGD" type="text/html"><span id="el_ivf_stimulation_chart_PGD">
<span<?php echo $ivf_stimulation_chart_view->PGD->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->PGD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DATEOFET->Visible) { // DATEOFET ?>
	<tr id="r_DATEOFET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATEOFET"><script id="tpc_ivf_stimulation_chart_DATEOFET" type="text/html"><?php echo $ivf_stimulation_chart_view->DATEOFET->caption() ?></script></span></td>
		<td data-name="DATEOFET" <?php echo $ivf_stimulation_chart_view->DATEOFET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATEOFET" type="text/html"><span id="el_ivf_stimulation_chart_DATEOFET">
<span<?php echo $ivf_stimulation_chart_view->DATEOFET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DATEOFET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ET->Visible) { // ET ?>
	<tr id="r_ET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ET"><script id="tpc_ivf_stimulation_chart_ET" type="text/html"><?php echo $ivf_stimulation_chart_view->ET->caption() ?></script></span></td>
		<td data-name="ET" <?php echo $ivf_stimulation_chart_view->ET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ET" type="text/html"><span id="el_ivf_stimulation_chart_ET">
<span<?php echo $ivf_stimulation_chart_view->ET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ESET->Visible) { // ESET ?>
	<tr id="r_ESET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ESET"><script id="tpc_ivf_stimulation_chart_ESET" type="text/html"><?php echo $ivf_stimulation_chart_view->ESET->caption() ?></script></span></td>
		<td data-name="ESET" <?php echo $ivf_stimulation_chart_view->ESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ESET" type="text/html"><span id="el_ivf_stimulation_chart_ESET">
<span<?php echo $ivf_stimulation_chart_view->ESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ESET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DOET->Visible) { // DOET ?>
	<tr id="r_DOET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOET"><script id="tpc_ivf_stimulation_chart_DOET" type="text/html"><?php echo $ivf_stimulation_chart_view->DOET->caption() ?></script></span></td>
		<td data-name="DOET" <?php echo $ivf_stimulation_chart_view->DOET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOET" type="text/html"><span id="el_ivf_stimulation_chart_DOET">
<span<?php echo $ivf_stimulation_chart_view->DOET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DOET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<tr id="r_SEMENPREPARATION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION"><script id="tpc_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><?php echo $ivf_stimulation_chart_view->SEMENPREPARATION->caption() ?></script></span></td>
		<td data-name="SEMENPREPARATION" <?php echo $ivf_stimulation_chart_view->SEMENPREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<span<?php echo $ivf_stimulation_chart_view->SEMENPREPARATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SEMENPREPARATION->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->REASONFORESET->Visible) { // REASONFORESET ?>
	<tr id="r_REASONFORESET">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET"><script id="tpc_ivf_stimulation_chart_REASONFORESET" type="text/html"><?php echo $ivf_stimulation_chart_view->REASONFORESET->caption() ?></script></span></td>
		<td data-name="REASONFORESET" <?php echo $ivf_stimulation_chart_view->REASONFORESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_REASONFORESET" type="text/html"><span id="el_ivf_stimulation_chart_REASONFORESET">
<span<?php echo $ivf_stimulation_chart_view->REASONFORESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->REASONFORESET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<tr id="r_Expectedoocytes">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes"><script id="tpc_ivf_stimulation_chart_Expectedoocytes" type="text/html"><?php echo $ivf_stimulation_chart_view->Expectedoocytes->caption() ?></script></span></td>
		<td data-name="Expectedoocytes" <?php echo $ivf_stimulation_chart_view->Expectedoocytes->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Expectedoocytes" type="text/html"><span id="el_ivf_stimulation_chart_Expectedoocytes">
<span<?php echo $ivf_stimulation_chart_view->Expectedoocytes->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Expectedoocytes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate1->Visible) { // StChDate1 ?>
	<tr id="r_StChDate1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate1"><script id="tpc_ivf_stimulation_chart_StChDate1" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate1->caption() ?></script></span></td>
		<td data-name="StChDate1" <?php echo $ivf_stimulation_chart_view->StChDate1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate1" type="text/html"><span id="el_ivf_stimulation_chart_StChDate1">
<span<?php echo $ivf_stimulation_chart_view->StChDate1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate2->Visible) { // StChDate2 ?>
	<tr id="r_StChDate2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate2"><script id="tpc_ivf_stimulation_chart_StChDate2" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate2->caption() ?></script></span></td>
		<td data-name="StChDate2" <?php echo $ivf_stimulation_chart_view->StChDate2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate2" type="text/html"><span id="el_ivf_stimulation_chart_StChDate2">
<span<?php echo $ivf_stimulation_chart_view->StChDate2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate3->Visible) { // StChDate3 ?>
	<tr id="r_StChDate3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate3"><script id="tpc_ivf_stimulation_chart_StChDate3" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate3->caption() ?></script></span></td>
		<td data-name="StChDate3" <?php echo $ivf_stimulation_chart_view->StChDate3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate3" type="text/html"><span id="el_ivf_stimulation_chart_StChDate3">
<span<?php echo $ivf_stimulation_chart_view->StChDate3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate4->Visible) { // StChDate4 ?>
	<tr id="r_StChDate4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate4"><script id="tpc_ivf_stimulation_chart_StChDate4" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate4->caption() ?></script></span></td>
		<td data-name="StChDate4" <?php echo $ivf_stimulation_chart_view->StChDate4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate4" type="text/html"><span id="el_ivf_stimulation_chart_StChDate4">
<span<?php echo $ivf_stimulation_chart_view->StChDate4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate5->Visible) { // StChDate5 ?>
	<tr id="r_StChDate5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate5"><script id="tpc_ivf_stimulation_chart_StChDate5" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate5->caption() ?></script></span></td>
		<td data-name="StChDate5" <?php echo $ivf_stimulation_chart_view->StChDate5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate5" type="text/html"><span id="el_ivf_stimulation_chart_StChDate5">
<span<?php echo $ivf_stimulation_chart_view->StChDate5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate6->Visible) { // StChDate6 ?>
	<tr id="r_StChDate6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate6"><script id="tpc_ivf_stimulation_chart_StChDate6" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate6->caption() ?></script></span></td>
		<td data-name="StChDate6" <?php echo $ivf_stimulation_chart_view->StChDate6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate6" type="text/html"><span id="el_ivf_stimulation_chart_StChDate6">
<span<?php echo $ivf_stimulation_chart_view->StChDate6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate7->Visible) { // StChDate7 ?>
	<tr id="r_StChDate7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate7"><script id="tpc_ivf_stimulation_chart_StChDate7" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate7->caption() ?></script></span></td>
		<td data-name="StChDate7" <?php echo $ivf_stimulation_chart_view->StChDate7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate7" type="text/html"><span id="el_ivf_stimulation_chart_StChDate7">
<span<?php echo $ivf_stimulation_chart_view->StChDate7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate8->Visible) { // StChDate8 ?>
	<tr id="r_StChDate8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate8"><script id="tpc_ivf_stimulation_chart_StChDate8" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate8->caption() ?></script></span></td>
		<td data-name="StChDate8" <?php echo $ivf_stimulation_chart_view->StChDate8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate8" type="text/html"><span id="el_ivf_stimulation_chart_StChDate8">
<span<?php echo $ivf_stimulation_chart_view->StChDate8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate9->Visible) { // StChDate9 ?>
	<tr id="r_StChDate9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate9"><script id="tpc_ivf_stimulation_chart_StChDate9" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate9->caption() ?></script></span></td>
		<td data-name="StChDate9" <?php echo $ivf_stimulation_chart_view->StChDate9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate9" type="text/html"><span id="el_ivf_stimulation_chart_StChDate9">
<span<?php echo $ivf_stimulation_chart_view->StChDate9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate10->Visible) { // StChDate10 ?>
	<tr id="r_StChDate10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate10"><script id="tpc_ivf_stimulation_chart_StChDate10" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate10->caption() ?></script></span></td>
		<td data-name="StChDate10" <?php echo $ivf_stimulation_chart_view->StChDate10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate10" type="text/html"><span id="el_ivf_stimulation_chart_StChDate10">
<span<?php echo $ivf_stimulation_chart_view->StChDate10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate11->Visible) { // StChDate11 ?>
	<tr id="r_StChDate11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate11"><script id="tpc_ivf_stimulation_chart_StChDate11" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate11->caption() ?></script></span></td>
		<td data-name="StChDate11" <?php echo $ivf_stimulation_chart_view->StChDate11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate11" type="text/html"><span id="el_ivf_stimulation_chart_StChDate11">
<span<?php echo $ivf_stimulation_chart_view->StChDate11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate12->Visible) { // StChDate12 ?>
	<tr id="r_StChDate12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate12"><script id="tpc_ivf_stimulation_chart_StChDate12" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate12->caption() ?></script></span></td>
		<td data-name="StChDate12" <?php echo $ivf_stimulation_chart_view->StChDate12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate12" type="text/html"><span id="el_ivf_stimulation_chart_StChDate12">
<span<?php echo $ivf_stimulation_chart_view->StChDate12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate13->Visible) { // StChDate13 ?>
	<tr id="r_StChDate13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate13"><script id="tpc_ivf_stimulation_chart_StChDate13" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate13->caption() ?></script></span></td>
		<td data-name="StChDate13" <?php echo $ivf_stimulation_chart_view->StChDate13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate13" type="text/html"><span id="el_ivf_stimulation_chart_StChDate13">
<span<?php echo $ivf_stimulation_chart_view->StChDate13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay1->Visible) { // CycleDay1 ?>
	<tr id="r_CycleDay1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay1"><script id="tpc_ivf_stimulation_chart_CycleDay1" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay1->caption() ?></script></span></td>
		<td data-name="CycleDay1" <?php echo $ivf_stimulation_chart_view->CycleDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay1" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay1">
<span<?php echo $ivf_stimulation_chart_view->CycleDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay2->Visible) { // CycleDay2 ?>
	<tr id="r_CycleDay2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay2"><script id="tpc_ivf_stimulation_chart_CycleDay2" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay2->caption() ?></script></span></td>
		<td data-name="CycleDay2" <?php echo $ivf_stimulation_chart_view->CycleDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay2" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay2">
<span<?php echo $ivf_stimulation_chart_view->CycleDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay3->Visible) { // CycleDay3 ?>
	<tr id="r_CycleDay3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay3"><script id="tpc_ivf_stimulation_chart_CycleDay3" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay3->caption() ?></script></span></td>
		<td data-name="CycleDay3" <?php echo $ivf_stimulation_chart_view->CycleDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay3" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay3">
<span<?php echo $ivf_stimulation_chart_view->CycleDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay4->Visible) { // CycleDay4 ?>
	<tr id="r_CycleDay4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay4"><script id="tpc_ivf_stimulation_chart_CycleDay4" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay4->caption() ?></script></span></td>
		<td data-name="CycleDay4" <?php echo $ivf_stimulation_chart_view->CycleDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay4" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay4">
<span<?php echo $ivf_stimulation_chart_view->CycleDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay5->Visible) { // CycleDay5 ?>
	<tr id="r_CycleDay5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay5"><script id="tpc_ivf_stimulation_chart_CycleDay5" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay5->caption() ?></script></span></td>
		<td data-name="CycleDay5" <?php echo $ivf_stimulation_chart_view->CycleDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay5" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay5">
<span<?php echo $ivf_stimulation_chart_view->CycleDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay6->Visible) { // CycleDay6 ?>
	<tr id="r_CycleDay6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay6"><script id="tpc_ivf_stimulation_chart_CycleDay6" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay6->caption() ?></script></span></td>
		<td data-name="CycleDay6" <?php echo $ivf_stimulation_chart_view->CycleDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay6" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay6">
<span<?php echo $ivf_stimulation_chart_view->CycleDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay7->Visible) { // CycleDay7 ?>
	<tr id="r_CycleDay7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay7"><script id="tpc_ivf_stimulation_chart_CycleDay7" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay7->caption() ?></script></span></td>
		<td data-name="CycleDay7" <?php echo $ivf_stimulation_chart_view->CycleDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay7" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay7">
<span<?php echo $ivf_stimulation_chart_view->CycleDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay8->Visible) { // CycleDay8 ?>
	<tr id="r_CycleDay8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay8"><script id="tpc_ivf_stimulation_chart_CycleDay8" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay8->caption() ?></script></span></td>
		<td data-name="CycleDay8" <?php echo $ivf_stimulation_chart_view->CycleDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay8" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay8">
<span<?php echo $ivf_stimulation_chart_view->CycleDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay9->Visible) { // CycleDay9 ?>
	<tr id="r_CycleDay9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay9"><script id="tpc_ivf_stimulation_chart_CycleDay9" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay9->caption() ?></script></span></td>
		<td data-name="CycleDay9" <?php echo $ivf_stimulation_chart_view->CycleDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay9" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay9">
<span<?php echo $ivf_stimulation_chart_view->CycleDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay10->Visible) { // CycleDay10 ?>
	<tr id="r_CycleDay10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay10"><script id="tpc_ivf_stimulation_chart_CycleDay10" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay10->caption() ?></script></span></td>
		<td data-name="CycleDay10" <?php echo $ivf_stimulation_chart_view->CycleDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay10" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay10">
<span<?php echo $ivf_stimulation_chart_view->CycleDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay11->Visible) { // CycleDay11 ?>
	<tr id="r_CycleDay11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay11"><script id="tpc_ivf_stimulation_chart_CycleDay11" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay11->caption() ?></script></span></td>
		<td data-name="CycleDay11" <?php echo $ivf_stimulation_chart_view->CycleDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay11" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay11">
<span<?php echo $ivf_stimulation_chart_view->CycleDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay12->Visible) { // CycleDay12 ?>
	<tr id="r_CycleDay12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay12"><script id="tpc_ivf_stimulation_chart_CycleDay12" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay12->caption() ?></script></span></td>
		<td data-name="CycleDay12" <?php echo $ivf_stimulation_chart_view->CycleDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay12" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay12">
<span<?php echo $ivf_stimulation_chart_view->CycleDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay13->Visible) { // CycleDay13 ?>
	<tr id="r_CycleDay13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay13"><script id="tpc_ivf_stimulation_chart_CycleDay13" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay13->caption() ?></script></span></td>
		<td data-name="CycleDay13" <?php echo $ivf_stimulation_chart_view->CycleDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay13" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay13">
<span<?php echo $ivf_stimulation_chart_view->CycleDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay1->Visible) { // StimulationDay1 ?>
	<tr id="r_StimulationDay1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1"><script id="tpc_ivf_stimulation_chart_StimulationDay1" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay1->caption() ?></script></span></td>
		<td data-name="StimulationDay1" <?php echo $ivf_stimulation_chart_view->StimulationDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay1" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay1">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay2->Visible) { // StimulationDay2 ?>
	<tr id="r_StimulationDay2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2"><script id="tpc_ivf_stimulation_chart_StimulationDay2" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay2->caption() ?></script></span></td>
		<td data-name="StimulationDay2" <?php echo $ivf_stimulation_chart_view->StimulationDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay2" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay2">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay3->Visible) { // StimulationDay3 ?>
	<tr id="r_StimulationDay3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3"><script id="tpc_ivf_stimulation_chart_StimulationDay3" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay3->caption() ?></script></span></td>
		<td data-name="StimulationDay3" <?php echo $ivf_stimulation_chart_view->StimulationDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay3" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay3">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay4->Visible) { // StimulationDay4 ?>
	<tr id="r_StimulationDay4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4"><script id="tpc_ivf_stimulation_chart_StimulationDay4" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay4->caption() ?></script></span></td>
		<td data-name="StimulationDay4" <?php echo $ivf_stimulation_chart_view->StimulationDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay4" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay4">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay5->Visible) { // StimulationDay5 ?>
	<tr id="r_StimulationDay5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5"><script id="tpc_ivf_stimulation_chart_StimulationDay5" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay5->caption() ?></script></span></td>
		<td data-name="StimulationDay5" <?php echo $ivf_stimulation_chart_view->StimulationDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay5" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay5">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay6->Visible) { // StimulationDay6 ?>
	<tr id="r_StimulationDay6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6"><script id="tpc_ivf_stimulation_chart_StimulationDay6" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay6->caption() ?></script></span></td>
		<td data-name="StimulationDay6" <?php echo $ivf_stimulation_chart_view->StimulationDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay6" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay6">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay7->Visible) { // StimulationDay7 ?>
	<tr id="r_StimulationDay7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7"><script id="tpc_ivf_stimulation_chart_StimulationDay7" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay7->caption() ?></script></span></td>
		<td data-name="StimulationDay7" <?php echo $ivf_stimulation_chart_view->StimulationDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay7" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay7">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay8->Visible) { // StimulationDay8 ?>
	<tr id="r_StimulationDay8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8"><script id="tpc_ivf_stimulation_chart_StimulationDay8" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay8->caption() ?></script></span></td>
		<td data-name="StimulationDay8" <?php echo $ivf_stimulation_chart_view->StimulationDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay8" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay8">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay9->Visible) { // StimulationDay9 ?>
	<tr id="r_StimulationDay9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9"><script id="tpc_ivf_stimulation_chart_StimulationDay9" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay9->caption() ?></script></span></td>
		<td data-name="StimulationDay9" <?php echo $ivf_stimulation_chart_view->StimulationDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay9" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay9">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay10->Visible) { // StimulationDay10 ?>
	<tr id="r_StimulationDay10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10"><script id="tpc_ivf_stimulation_chart_StimulationDay10" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay10->caption() ?></script></span></td>
		<td data-name="StimulationDay10" <?php echo $ivf_stimulation_chart_view->StimulationDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay10" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay10">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay11->Visible) { // StimulationDay11 ?>
	<tr id="r_StimulationDay11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11"><script id="tpc_ivf_stimulation_chart_StimulationDay11" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay11->caption() ?></script></span></td>
		<td data-name="StimulationDay11" <?php echo $ivf_stimulation_chart_view->StimulationDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay11" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay11">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay12->Visible) { // StimulationDay12 ?>
	<tr id="r_StimulationDay12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12"><script id="tpc_ivf_stimulation_chart_StimulationDay12" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay12->caption() ?></script></span></td>
		<td data-name="StimulationDay12" <?php echo $ivf_stimulation_chart_view->StimulationDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay12" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay12">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay13->Visible) { // StimulationDay13 ?>
	<tr id="r_StimulationDay13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13"><script id="tpc_ivf_stimulation_chart_StimulationDay13" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay13->caption() ?></script></span></td>
		<td data-name="StimulationDay13" <?php echo $ivf_stimulation_chart_view->StimulationDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay13" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay13">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet1->Visible) { // Tablet1 ?>
	<tr id="r_Tablet1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet1"><script id="tpc_ivf_stimulation_chart_Tablet1" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet1->caption() ?></script></span></td>
		<td data-name="Tablet1" <?php echo $ivf_stimulation_chart_view->Tablet1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet1" type="text/html"><span id="el_ivf_stimulation_chart_Tablet1">
<span<?php echo $ivf_stimulation_chart_view->Tablet1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet2->Visible) { // Tablet2 ?>
	<tr id="r_Tablet2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet2"><script id="tpc_ivf_stimulation_chart_Tablet2" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet2->caption() ?></script></span></td>
		<td data-name="Tablet2" <?php echo $ivf_stimulation_chart_view->Tablet2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet2" type="text/html"><span id="el_ivf_stimulation_chart_Tablet2">
<span<?php echo $ivf_stimulation_chart_view->Tablet2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet3->Visible) { // Tablet3 ?>
	<tr id="r_Tablet3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet3"><script id="tpc_ivf_stimulation_chart_Tablet3" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet3->caption() ?></script></span></td>
		<td data-name="Tablet3" <?php echo $ivf_stimulation_chart_view->Tablet3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet3" type="text/html"><span id="el_ivf_stimulation_chart_Tablet3">
<span<?php echo $ivf_stimulation_chart_view->Tablet3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet4->Visible) { // Tablet4 ?>
	<tr id="r_Tablet4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet4"><script id="tpc_ivf_stimulation_chart_Tablet4" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet4->caption() ?></script></span></td>
		<td data-name="Tablet4" <?php echo $ivf_stimulation_chart_view->Tablet4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet4" type="text/html"><span id="el_ivf_stimulation_chart_Tablet4">
<span<?php echo $ivf_stimulation_chart_view->Tablet4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet5->Visible) { // Tablet5 ?>
	<tr id="r_Tablet5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet5"><script id="tpc_ivf_stimulation_chart_Tablet5" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet5->caption() ?></script></span></td>
		<td data-name="Tablet5" <?php echo $ivf_stimulation_chart_view->Tablet5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet5" type="text/html"><span id="el_ivf_stimulation_chart_Tablet5">
<span<?php echo $ivf_stimulation_chart_view->Tablet5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet6->Visible) { // Tablet6 ?>
	<tr id="r_Tablet6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet6"><script id="tpc_ivf_stimulation_chart_Tablet6" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet6->caption() ?></script></span></td>
		<td data-name="Tablet6" <?php echo $ivf_stimulation_chart_view->Tablet6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet6" type="text/html"><span id="el_ivf_stimulation_chart_Tablet6">
<span<?php echo $ivf_stimulation_chart_view->Tablet6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet7->Visible) { // Tablet7 ?>
	<tr id="r_Tablet7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet7"><script id="tpc_ivf_stimulation_chart_Tablet7" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet7->caption() ?></script></span></td>
		<td data-name="Tablet7" <?php echo $ivf_stimulation_chart_view->Tablet7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet7" type="text/html"><span id="el_ivf_stimulation_chart_Tablet7">
<span<?php echo $ivf_stimulation_chart_view->Tablet7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet8->Visible) { // Tablet8 ?>
	<tr id="r_Tablet8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet8"><script id="tpc_ivf_stimulation_chart_Tablet8" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet8->caption() ?></script></span></td>
		<td data-name="Tablet8" <?php echo $ivf_stimulation_chart_view->Tablet8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet8" type="text/html"><span id="el_ivf_stimulation_chart_Tablet8">
<span<?php echo $ivf_stimulation_chart_view->Tablet8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet9->Visible) { // Tablet9 ?>
	<tr id="r_Tablet9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet9"><script id="tpc_ivf_stimulation_chart_Tablet9" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet9->caption() ?></script></span></td>
		<td data-name="Tablet9" <?php echo $ivf_stimulation_chart_view->Tablet9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet9" type="text/html"><span id="el_ivf_stimulation_chart_Tablet9">
<span<?php echo $ivf_stimulation_chart_view->Tablet9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet10->Visible) { // Tablet10 ?>
	<tr id="r_Tablet10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet10"><script id="tpc_ivf_stimulation_chart_Tablet10" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet10->caption() ?></script></span></td>
		<td data-name="Tablet10" <?php echo $ivf_stimulation_chart_view->Tablet10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet10" type="text/html"><span id="el_ivf_stimulation_chart_Tablet10">
<span<?php echo $ivf_stimulation_chart_view->Tablet10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet11->Visible) { // Tablet11 ?>
	<tr id="r_Tablet11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet11"><script id="tpc_ivf_stimulation_chart_Tablet11" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet11->caption() ?></script></span></td>
		<td data-name="Tablet11" <?php echo $ivf_stimulation_chart_view->Tablet11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet11" type="text/html"><span id="el_ivf_stimulation_chart_Tablet11">
<span<?php echo $ivf_stimulation_chart_view->Tablet11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet12->Visible) { // Tablet12 ?>
	<tr id="r_Tablet12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet12"><script id="tpc_ivf_stimulation_chart_Tablet12" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet12->caption() ?></script></span></td>
		<td data-name="Tablet12" <?php echo $ivf_stimulation_chart_view->Tablet12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet12" type="text/html"><span id="el_ivf_stimulation_chart_Tablet12">
<span<?php echo $ivf_stimulation_chart_view->Tablet12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet13->Visible) { // Tablet13 ?>
	<tr id="r_Tablet13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet13"><script id="tpc_ivf_stimulation_chart_Tablet13" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet13->caption() ?></script></span></td>
		<td data-name="Tablet13" <?php echo $ivf_stimulation_chart_view->Tablet13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet13" type="text/html"><span id="el_ivf_stimulation_chart_Tablet13">
<span<?php echo $ivf_stimulation_chart_view->Tablet13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH1->Visible) { // RFSH1 ?>
	<tr id="r_RFSH1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH1"><script id="tpc_ivf_stimulation_chart_RFSH1" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH1->caption() ?></script></span></td>
		<td data-name="RFSH1" <?php echo $ivf_stimulation_chart_view->RFSH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH1" type="text/html"><span id="el_ivf_stimulation_chart_RFSH1">
<span<?php echo $ivf_stimulation_chart_view->RFSH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH2->Visible) { // RFSH2 ?>
	<tr id="r_RFSH2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH2"><script id="tpc_ivf_stimulation_chart_RFSH2" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH2->caption() ?></script></span></td>
		<td data-name="RFSH2" <?php echo $ivf_stimulation_chart_view->RFSH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH2" type="text/html"><span id="el_ivf_stimulation_chart_RFSH2">
<span<?php echo $ivf_stimulation_chart_view->RFSH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH3->Visible) { // RFSH3 ?>
	<tr id="r_RFSH3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH3"><script id="tpc_ivf_stimulation_chart_RFSH3" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH3->caption() ?></script></span></td>
		<td data-name="RFSH3" <?php echo $ivf_stimulation_chart_view->RFSH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH3" type="text/html"><span id="el_ivf_stimulation_chart_RFSH3">
<span<?php echo $ivf_stimulation_chart_view->RFSH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH4->Visible) { // RFSH4 ?>
	<tr id="r_RFSH4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH4"><script id="tpc_ivf_stimulation_chart_RFSH4" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH4->caption() ?></script></span></td>
		<td data-name="RFSH4" <?php echo $ivf_stimulation_chart_view->RFSH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH4" type="text/html"><span id="el_ivf_stimulation_chart_RFSH4">
<span<?php echo $ivf_stimulation_chart_view->RFSH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH5->Visible) { // RFSH5 ?>
	<tr id="r_RFSH5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH5"><script id="tpc_ivf_stimulation_chart_RFSH5" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH5->caption() ?></script></span></td>
		<td data-name="RFSH5" <?php echo $ivf_stimulation_chart_view->RFSH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH5" type="text/html"><span id="el_ivf_stimulation_chart_RFSH5">
<span<?php echo $ivf_stimulation_chart_view->RFSH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH6->Visible) { // RFSH6 ?>
	<tr id="r_RFSH6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH6"><script id="tpc_ivf_stimulation_chart_RFSH6" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH6->caption() ?></script></span></td>
		<td data-name="RFSH6" <?php echo $ivf_stimulation_chart_view->RFSH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH6" type="text/html"><span id="el_ivf_stimulation_chart_RFSH6">
<span<?php echo $ivf_stimulation_chart_view->RFSH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH7->Visible) { // RFSH7 ?>
	<tr id="r_RFSH7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH7"><script id="tpc_ivf_stimulation_chart_RFSH7" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH7->caption() ?></script></span></td>
		<td data-name="RFSH7" <?php echo $ivf_stimulation_chart_view->RFSH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH7" type="text/html"><span id="el_ivf_stimulation_chart_RFSH7">
<span<?php echo $ivf_stimulation_chart_view->RFSH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH8->Visible) { // RFSH8 ?>
	<tr id="r_RFSH8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH8"><script id="tpc_ivf_stimulation_chart_RFSH8" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH8->caption() ?></script></span></td>
		<td data-name="RFSH8" <?php echo $ivf_stimulation_chart_view->RFSH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH8" type="text/html"><span id="el_ivf_stimulation_chart_RFSH8">
<span<?php echo $ivf_stimulation_chart_view->RFSH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH9->Visible) { // RFSH9 ?>
	<tr id="r_RFSH9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH9"><script id="tpc_ivf_stimulation_chart_RFSH9" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH9->caption() ?></script></span></td>
		<td data-name="RFSH9" <?php echo $ivf_stimulation_chart_view->RFSH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH9" type="text/html"><span id="el_ivf_stimulation_chart_RFSH9">
<span<?php echo $ivf_stimulation_chart_view->RFSH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH10->Visible) { // RFSH10 ?>
	<tr id="r_RFSH10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH10"><script id="tpc_ivf_stimulation_chart_RFSH10" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH10->caption() ?></script></span></td>
		<td data-name="RFSH10" <?php echo $ivf_stimulation_chart_view->RFSH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH10" type="text/html"><span id="el_ivf_stimulation_chart_RFSH10">
<span<?php echo $ivf_stimulation_chart_view->RFSH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH11->Visible) { // RFSH11 ?>
	<tr id="r_RFSH11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH11"><script id="tpc_ivf_stimulation_chart_RFSH11" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH11->caption() ?></script></span></td>
		<td data-name="RFSH11" <?php echo $ivf_stimulation_chart_view->RFSH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH11" type="text/html"><span id="el_ivf_stimulation_chart_RFSH11">
<span<?php echo $ivf_stimulation_chart_view->RFSH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH12->Visible) { // RFSH12 ?>
	<tr id="r_RFSH12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH12"><script id="tpc_ivf_stimulation_chart_RFSH12" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH12->caption() ?></script></span></td>
		<td data-name="RFSH12" <?php echo $ivf_stimulation_chart_view->RFSH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH12" type="text/html"><span id="el_ivf_stimulation_chart_RFSH12">
<span<?php echo $ivf_stimulation_chart_view->RFSH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH13->Visible) { // RFSH13 ?>
	<tr id="r_RFSH13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH13"><script id="tpc_ivf_stimulation_chart_RFSH13" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH13->caption() ?></script></span></td>
		<td data-name="RFSH13" <?php echo $ivf_stimulation_chart_view->RFSH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH13" type="text/html"><span id="el_ivf_stimulation_chart_RFSH13">
<span<?php echo $ivf_stimulation_chart_view->RFSH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG1->Visible) { // HMG1 ?>
	<tr id="r_HMG1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG1"><script id="tpc_ivf_stimulation_chart_HMG1" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG1->caption() ?></script></span></td>
		<td data-name="HMG1" <?php echo $ivf_stimulation_chart_view->HMG1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG1" type="text/html"><span id="el_ivf_stimulation_chart_HMG1">
<span<?php echo $ivf_stimulation_chart_view->HMG1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG2->Visible) { // HMG2 ?>
	<tr id="r_HMG2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG2"><script id="tpc_ivf_stimulation_chart_HMG2" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG2->caption() ?></script></span></td>
		<td data-name="HMG2" <?php echo $ivf_stimulation_chart_view->HMG2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG2" type="text/html"><span id="el_ivf_stimulation_chart_HMG2">
<span<?php echo $ivf_stimulation_chart_view->HMG2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG3->Visible) { // HMG3 ?>
	<tr id="r_HMG3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG3"><script id="tpc_ivf_stimulation_chart_HMG3" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG3->caption() ?></script></span></td>
		<td data-name="HMG3" <?php echo $ivf_stimulation_chart_view->HMG3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG3" type="text/html"><span id="el_ivf_stimulation_chart_HMG3">
<span<?php echo $ivf_stimulation_chart_view->HMG3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG4->Visible) { // HMG4 ?>
	<tr id="r_HMG4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG4"><script id="tpc_ivf_stimulation_chart_HMG4" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG4->caption() ?></script></span></td>
		<td data-name="HMG4" <?php echo $ivf_stimulation_chart_view->HMG4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG4" type="text/html"><span id="el_ivf_stimulation_chart_HMG4">
<span<?php echo $ivf_stimulation_chart_view->HMG4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG5->Visible) { // HMG5 ?>
	<tr id="r_HMG5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG5"><script id="tpc_ivf_stimulation_chart_HMG5" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG5->caption() ?></script></span></td>
		<td data-name="HMG5" <?php echo $ivf_stimulation_chart_view->HMG5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG5" type="text/html"><span id="el_ivf_stimulation_chart_HMG5">
<span<?php echo $ivf_stimulation_chart_view->HMG5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG6->Visible) { // HMG6 ?>
	<tr id="r_HMG6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG6"><script id="tpc_ivf_stimulation_chart_HMG6" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG6->caption() ?></script></span></td>
		<td data-name="HMG6" <?php echo $ivf_stimulation_chart_view->HMG6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG6" type="text/html"><span id="el_ivf_stimulation_chart_HMG6">
<span<?php echo $ivf_stimulation_chart_view->HMG6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG7->Visible) { // HMG7 ?>
	<tr id="r_HMG7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG7"><script id="tpc_ivf_stimulation_chart_HMG7" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG7->caption() ?></script></span></td>
		<td data-name="HMG7" <?php echo $ivf_stimulation_chart_view->HMG7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG7" type="text/html"><span id="el_ivf_stimulation_chart_HMG7">
<span<?php echo $ivf_stimulation_chart_view->HMG7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG8->Visible) { // HMG8 ?>
	<tr id="r_HMG8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG8"><script id="tpc_ivf_stimulation_chart_HMG8" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG8->caption() ?></script></span></td>
		<td data-name="HMG8" <?php echo $ivf_stimulation_chart_view->HMG8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG8" type="text/html"><span id="el_ivf_stimulation_chart_HMG8">
<span<?php echo $ivf_stimulation_chart_view->HMG8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG9->Visible) { // HMG9 ?>
	<tr id="r_HMG9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG9"><script id="tpc_ivf_stimulation_chart_HMG9" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG9->caption() ?></script></span></td>
		<td data-name="HMG9" <?php echo $ivf_stimulation_chart_view->HMG9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG9" type="text/html"><span id="el_ivf_stimulation_chart_HMG9">
<span<?php echo $ivf_stimulation_chart_view->HMG9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG10->Visible) { // HMG10 ?>
	<tr id="r_HMG10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG10"><script id="tpc_ivf_stimulation_chart_HMG10" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG10->caption() ?></script></span></td>
		<td data-name="HMG10" <?php echo $ivf_stimulation_chart_view->HMG10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG10" type="text/html"><span id="el_ivf_stimulation_chart_HMG10">
<span<?php echo $ivf_stimulation_chart_view->HMG10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG11->Visible) { // HMG11 ?>
	<tr id="r_HMG11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG11"><script id="tpc_ivf_stimulation_chart_HMG11" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG11->caption() ?></script></span></td>
		<td data-name="HMG11" <?php echo $ivf_stimulation_chart_view->HMG11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG11" type="text/html"><span id="el_ivf_stimulation_chart_HMG11">
<span<?php echo $ivf_stimulation_chart_view->HMG11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG12->Visible) { // HMG12 ?>
	<tr id="r_HMG12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG12"><script id="tpc_ivf_stimulation_chart_HMG12" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG12->caption() ?></script></span></td>
		<td data-name="HMG12" <?php echo $ivf_stimulation_chart_view->HMG12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG12" type="text/html"><span id="el_ivf_stimulation_chart_HMG12">
<span<?php echo $ivf_stimulation_chart_view->HMG12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG13->Visible) { // HMG13 ?>
	<tr id="r_HMG13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG13"><script id="tpc_ivf_stimulation_chart_HMG13" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG13->caption() ?></script></span></td>
		<td data-name="HMG13" <?php echo $ivf_stimulation_chart_view->HMG13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG13" type="text/html"><span id="el_ivf_stimulation_chart_HMG13">
<span<?php echo $ivf_stimulation_chart_view->HMG13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH1->Visible) { // GnRH1 ?>
	<tr id="r_GnRH1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH1"><script id="tpc_ivf_stimulation_chart_GnRH1" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH1->caption() ?></script></span></td>
		<td data-name="GnRH1" <?php echo $ivf_stimulation_chart_view->GnRH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH1" type="text/html"><span id="el_ivf_stimulation_chart_GnRH1">
<span<?php echo $ivf_stimulation_chart_view->GnRH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH2->Visible) { // GnRH2 ?>
	<tr id="r_GnRH2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH2"><script id="tpc_ivf_stimulation_chart_GnRH2" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH2->caption() ?></script></span></td>
		<td data-name="GnRH2" <?php echo $ivf_stimulation_chart_view->GnRH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH2" type="text/html"><span id="el_ivf_stimulation_chart_GnRH2">
<span<?php echo $ivf_stimulation_chart_view->GnRH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH3->Visible) { // GnRH3 ?>
	<tr id="r_GnRH3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH3"><script id="tpc_ivf_stimulation_chart_GnRH3" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH3->caption() ?></script></span></td>
		<td data-name="GnRH3" <?php echo $ivf_stimulation_chart_view->GnRH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH3" type="text/html"><span id="el_ivf_stimulation_chart_GnRH3">
<span<?php echo $ivf_stimulation_chart_view->GnRH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH4->Visible) { // GnRH4 ?>
	<tr id="r_GnRH4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH4"><script id="tpc_ivf_stimulation_chart_GnRH4" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH4->caption() ?></script></span></td>
		<td data-name="GnRH4" <?php echo $ivf_stimulation_chart_view->GnRH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH4" type="text/html"><span id="el_ivf_stimulation_chart_GnRH4">
<span<?php echo $ivf_stimulation_chart_view->GnRH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH5->Visible) { // GnRH5 ?>
	<tr id="r_GnRH5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH5"><script id="tpc_ivf_stimulation_chart_GnRH5" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH5->caption() ?></script></span></td>
		<td data-name="GnRH5" <?php echo $ivf_stimulation_chart_view->GnRH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH5" type="text/html"><span id="el_ivf_stimulation_chart_GnRH5">
<span<?php echo $ivf_stimulation_chart_view->GnRH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH6->Visible) { // GnRH6 ?>
	<tr id="r_GnRH6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH6"><script id="tpc_ivf_stimulation_chart_GnRH6" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH6->caption() ?></script></span></td>
		<td data-name="GnRH6" <?php echo $ivf_stimulation_chart_view->GnRH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH6" type="text/html"><span id="el_ivf_stimulation_chart_GnRH6">
<span<?php echo $ivf_stimulation_chart_view->GnRH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH7->Visible) { // GnRH7 ?>
	<tr id="r_GnRH7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH7"><script id="tpc_ivf_stimulation_chart_GnRH7" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH7->caption() ?></script></span></td>
		<td data-name="GnRH7" <?php echo $ivf_stimulation_chart_view->GnRH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH7" type="text/html"><span id="el_ivf_stimulation_chart_GnRH7">
<span<?php echo $ivf_stimulation_chart_view->GnRH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH8->Visible) { // GnRH8 ?>
	<tr id="r_GnRH8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH8"><script id="tpc_ivf_stimulation_chart_GnRH8" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH8->caption() ?></script></span></td>
		<td data-name="GnRH8" <?php echo $ivf_stimulation_chart_view->GnRH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH8" type="text/html"><span id="el_ivf_stimulation_chart_GnRH8">
<span<?php echo $ivf_stimulation_chart_view->GnRH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH9->Visible) { // GnRH9 ?>
	<tr id="r_GnRH9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH9"><script id="tpc_ivf_stimulation_chart_GnRH9" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH9->caption() ?></script></span></td>
		<td data-name="GnRH9" <?php echo $ivf_stimulation_chart_view->GnRH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH9" type="text/html"><span id="el_ivf_stimulation_chart_GnRH9">
<span<?php echo $ivf_stimulation_chart_view->GnRH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH10->Visible) { // GnRH10 ?>
	<tr id="r_GnRH10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH10"><script id="tpc_ivf_stimulation_chart_GnRH10" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH10->caption() ?></script></span></td>
		<td data-name="GnRH10" <?php echo $ivf_stimulation_chart_view->GnRH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH10" type="text/html"><span id="el_ivf_stimulation_chart_GnRH10">
<span<?php echo $ivf_stimulation_chart_view->GnRH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH11->Visible) { // GnRH11 ?>
	<tr id="r_GnRH11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH11"><script id="tpc_ivf_stimulation_chart_GnRH11" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH11->caption() ?></script></span></td>
		<td data-name="GnRH11" <?php echo $ivf_stimulation_chart_view->GnRH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH11" type="text/html"><span id="el_ivf_stimulation_chart_GnRH11">
<span<?php echo $ivf_stimulation_chart_view->GnRH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH12->Visible) { // GnRH12 ?>
	<tr id="r_GnRH12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH12"><script id="tpc_ivf_stimulation_chart_GnRH12" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH12->caption() ?></script></span></td>
		<td data-name="GnRH12" <?php echo $ivf_stimulation_chart_view->GnRH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH12" type="text/html"><span id="el_ivf_stimulation_chart_GnRH12">
<span<?php echo $ivf_stimulation_chart_view->GnRH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH13->Visible) { // GnRH13 ?>
	<tr id="r_GnRH13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH13"><script id="tpc_ivf_stimulation_chart_GnRH13" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH13->caption() ?></script></span></td>
		<td data-name="GnRH13" <?php echo $ivf_stimulation_chart_view->GnRH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH13" type="text/html"><span id="el_ivf_stimulation_chart_GnRH13">
<span<?php echo $ivf_stimulation_chart_view->GnRH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E21->Visible) { // E21 ?>
	<tr id="r_E21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E21"><script id="tpc_ivf_stimulation_chart_E21" type="text/html"><?php echo $ivf_stimulation_chart_view->E21->caption() ?></script></span></td>
		<td data-name="E21" <?php echo $ivf_stimulation_chart_view->E21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E21" type="text/html"><span id="el_ivf_stimulation_chart_E21">
<span<?php echo $ivf_stimulation_chart_view->E21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E22->Visible) { // E22 ?>
	<tr id="r_E22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E22"><script id="tpc_ivf_stimulation_chart_E22" type="text/html"><?php echo $ivf_stimulation_chart_view->E22->caption() ?></script></span></td>
		<td data-name="E22" <?php echo $ivf_stimulation_chart_view->E22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E22" type="text/html"><span id="el_ivf_stimulation_chart_E22">
<span<?php echo $ivf_stimulation_chart_view->E22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E23->Visible) { // E23 ?>
	<tr id="r_E23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E23"><script id="tpc_ivf_stimulation_chart_E23" type="text/html"><?php echo $ivf_stimulation_chart_view->E23->caption() ?></script></span></td>
		<td data-name="E23" <?php echo $ivf_stimulation_chart_view->E23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E23" type="text/html"><span id="el_ivf_stimulation_chart_E23">
<span<?php echo $ivf_stimulation_chart_view->E23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E24->Visible) { // E24 ?>
	<tr id="r_E24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E24"><script id="tpc_ivf_stimulation_chart_E24" type="text/html"><?php echo $ivf_stimulation_chart_view->E24->caption() ?></script></span></td>
		<td data-name="E24" <?php echo $ivf_stimulation_chart_view->E24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E24" type="text/html"><span id="el_ivf_stimulation_chart_E24">
<span<?php echo $ivf_stimulation_chart_view->E24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E25->Visible) { // E25 ?>
	<tr id="r_E25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E25"><script id="tpc_ivf_stimulation_chart_E25" type="text/html"><?php echo $ivf_stimulation_chart_view->E25->caption() ?></script></span></td>
		<td data-name="E25" <?php echo $ivf_stimulation_chart_view->E25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E25" type="text/html"><span id="el_ivf_stimulation_chart_E25">
<span<?php echo $ivf_stimulation_chart_view->E25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E26->Visible) { // E26 ?>
	<tr id="r_E26">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E26"><script id="tpc_ivf_stimulation_chart_E26" type="text/html"><?php echo $ivf_stimulation_chart_view->E26->caption() ?></script></span></td>
		<td data-name="E26" <?php echo $ivf_stimulation_chart_view->E26->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E26" type="text/html"><span id="el_ivf_stimulation_chart_E26">
<span<?php echo $ivf_stimulation_chart_view->E26->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E26->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E27->Visible) { // E27 ?>
	<tr id="r_E27">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E27"><script id="tpc_ivf_stimulation_chart_E27" type="text/html"><?php echo $ivf_stimulation_chart_view->E27->caption() ?></script></span></td>
		<td data-name="E27" <?php echo $ivf_stimulation_chart_view->E27->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E27" type="text/html"><span id="el_ivf_stimulation_chart_E27">
<span<?php echo $ivf_stimulation_chart_view->E27->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E27->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E28->Visible) { // E28 ?>
	<tr id="r_E28">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E28"><script id="tpc_ivf_stimulation_chart_E28" type="text/html"><?php echo $ivf_stimulation_chart_view->E28->caption() ?></script></span></td>
		<td data-name="E28" <?php echo $ivf_stimulation_chart_view->E28->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E28" type="text/html"><span id="el_ivf_stimulation_chart_E28">
<span<?php echo $ivf_stimulation_chart_view->E28->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E28->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E29->Visible) { // E29 ?>
	<tr id="r_E29">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E29"><script id="tpc_ivf_stimulation_chart_E29" type="text/html"><?php echo $ivf_stimulation_chart_view->E29->caption() ?></script></span></td>
		<td data-name="E29" <?php echo $ivf_stimulation_chart_view->E29->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E29" type="text/html"><span id="el_ivf_stimulation_chart_E29">
<span<?php echo $ivf_stimulation_chart_view->E29->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E29->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E210->Visible) { // E210 ?>
	<tr id="r_E210">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E210"><script id="tpc_ivf_stimulation_chart_E210" type="text/html"><?php echo $ivf_stimulation_chart_view->E210->caption() ?></script></span></td>
		<td data-name="E210" <?php echo $ivf_stimulation_chart_view->E210->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E210" type="text/html"><span id="el_ivf_stimulation_chart_E210">
<span<?php echo $ivf_stimulation_chart_view->E210->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E210->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E211->Visible) { // E211 ?>
	<tr id="r_E211">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E211"><script id="tpc_ivf_stimulation_chart_E211" type="text/html"><?php echo $ivf_stimulation_chart_view->E211->caption() ?></script></span></td>
		<td data-name="E211" <?php echo $ivf_stimulation_chart_view->E211->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E211" type="text/html"><span id="el_ivf_stimulation_chart_E211">
<span<?php echo $ivf_stimulation_chart_view->E211->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E211->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E212->Visible) { // E212 ?>
	<tr id="r_E212">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E212"><script id="tpc_ivf_stimulation_chart_E212" type="text/html"><?php echo $ivf_stimulation_chart_view->E212->caption() ?></script></span></td>
		<td data-name="E212" <?php echo $ivf_stimulation_chart_view->E212->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E212" type="text/html"><span id="el_ivf_stimulation_chart_E212">
<span<?php echo $ivf_stimulation_chart_view->E212->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E212->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E213->Visible) { // E213 ?>
	<tr id="r_E213">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E213"><script id="tpc_ivf_stimulation_chart_E213" type="text/html"><?php echo $ivf_stimulation_chart_view->E213->caption() ?></script></span></td>
		<td data-name="E213" <?php echo $ivf_stimulation_chart_view->E213->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E213" type="text/html"><span id="el_ivf_stimulation_chart_E213">
<span<?php echo $ivf_stimulation_chart_view->E213->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E213->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P41->Visible) { // P41 ?>
	<tr id="r_P41">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P41"><script id="tpc_ivf_stimulation_chart_P41" type="text/html"><?php echo $ivf_stimulation_chart_view->P41->caption() ?></script></span></td>
		<td data-name="P41" <?php echo $ivf_stimulation_chart_view->P41->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P41" type="text/html"><span id="el_ivf_stimulation_chart_P41">
<span<?php echo $ivf_stimulation_chart_view->P41->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P41->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P42->Visible) { // P42 ?>
	<tr id="r_P42">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P42"><script id="tpc_ivf_stimulation_chart_P42" type="text/html"><?php echo $ivf_stimulation_chart_view->P42->caption() ?></script></span></td>
		<td data-name="P42" <?php echo $ivf_stimulation_chart_view->P42->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P42" type="text/html"><span id="el_ivf_stimulation_chart_P42">
<span<?php echo $ivf_stimulation_chart_view->P42->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P42->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P43->Visible) { // P43 ?>
	<tr id="r_P43">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P43"><script id="tpc_ivf_stimulation_chart_P43" type="text/html"><?php echo $ivf_stimulation_chart_view->P43->caption() ?></script></span></td>
		<td data-name="P43" <?php echo $ivf_stimulation_chart_view->P43->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P43" type="text/html"><span id="el_ivf_stimulation_chart_P43">
<span<?php echo $ivf_stimulation_chart_view->P43->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P43->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P44->Visible) { // P44 ?>
	<tr id="r_P44">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P44"><script id="tpc_ivf_stimulation_chart_P44" type="text/html"><?php echo $ivf_stimulation_chart_view->P44->caption() ?></script></span></td>
		<td data-name="P44" <?php echo $ivf_stimulation_chart_view->P44->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P44" type="text/html"><span id="el_ivf_stimulation_chart_P44">
<span<?php echo $ivf_stimulation_chart_view->P44->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P44->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P45->Visible) { // P45 ?>
	<tr id="r_P45">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P45"><script id="tpc_ivf_stimulation_chart_P45" type="text/html"><?php echo $ivf_stimulation_chart_view->P45->caption() ?></script></span></td>
		<td data-name="P45" <?php echo $ivf_stimulation_chart_view->P45->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P45" type="text/html"><span id="el_ivf_stimulation_chart_P45">
<span<?php echo $ivf_stimulation_chart_view->P45->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P45->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P46->Visible) { // P46 ?>
	<tr id="r_P46">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P46"><script id="tpc_ivf_stimulation_chart_P46" type="text/html"><?php echo $ivf_stimulation_chart_view->P46->caption() ?></script></span></td>
		<td data-name="P46" <?php echo $ivf_stimulation_chart_view->P46->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P46" type="text/html"><span id="el_ivf_stimulation_chart_P46">
<span<?php echo $ivf_stimulation_chart_view->P46->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P46->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P47->Visible) { // P47 ?>
	<tr id="r_P47">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P47"><script id="tpc_ivf_stimulation_chart_P47" type="text/html"><?php echo $ivf_stimulation_chart_view->P47->caption() ?></script></span></td>
		<td data-name="P47" <?php echo $ivf_stimulation_chart_view->P47->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P47" type="text/html"><span id="el_ivf_stimulation_chart_P47">
<span<?php echo $ivf_stimulation_chart_view->P47->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P47->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P48->Visible) { // P48 ?>
	<tr id="r_P48">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P48"><script id="tpc_ivf_stimulation_chart_P48" type="text/html"><?php echo $ivf_stimulation_chart_view->P48->caption() ?></script></span></td>
		<td data-name="P48" <?php echo $ivf_stimulation_chart_view->P48->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P48" type="text/html"><span id="el_ivf_stimulation_chart_P48">
<span<?php echo $ivf_stimulation_chart_view->P48->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P48->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P49->Visible) { // P49 ?>
	<tr id="r_P49">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P49"><script id="tpc_ivf_stimulation_chart_P49" type="text/html"><?php echo $ivf_stimulation_chart_view->P49->caption() ?></script></span></td>
		<td data-name="P49" <?php echo $ivf_stimulation_chart_view->P49->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P49" type="text/html"><span id="el_ivf_stimulation_chart_P49">
<span<?php echo $ivf_stimulation_chart_view->P49->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P49->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P410->Visible) { // P410 ?>
	<tr id="r_P410">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P410"><script id="tpc_ivf_stimulation_chart_P410" type="text/html"><?php echo $ivf_stimulation_chart_view->P410->caption() ?></script></span></td>
		<td data-name="P410" <?php echo $ivf_stimulation_chart_view->P410->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P410" type="text/html"><span id="el_ivf_stimulation_chart_P410">
<span<?php echo $ivf_stimulation_chart_view->P410->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P410->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P411->Visible) { // P411 ?>
	<tr id="r_P411">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P411"><script id="tpc_ivf_stimulation_chart_P411" type="text/html"><?php echo $ivf_stimulation_chart_view->P411->caption() ?></script></span></td>
		<td data-name="P411" <?php echo $ivf_stimulation_chart_view->P411->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P411" type="text/html"><span id="el_ivf_stimulation_chart_P411">
<span<?php echo $ivf_stimulation_chart_view->P411->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P411->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P412->Visible) { // P412 ?>
	<tr id="r_P412">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P412"><script id="tpc_ivf_stimulation_chart_P412" type="text/html"><?php echo $ivf_stimulation_chart_view->P412->caption() ?></script></span></td>
		<td data-name="P412" <?php echo $ivf_stimulation_chart_view->P412->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P412" type="text/html"><span id="el_ivf_stimulation_chart_P412">
<span<?php echo $ivf_stimulation_chart_view->P412->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P412->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P413->Visible) { // P413 ?>
	<tr id="r_P413">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P413"><script id="tpc_ivf_stimulation_chart_P413" type="text/html"><?php echo $ivf_stimulation_chart_view->P413->caption() ?></script></span></td>
		<td data-name="P413" <?php echo $ivf_stimulation_chart_view->P413->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P413" type="text/html"><span id="el_ivf_stimulation_chart_P413">
<span<?php echo $ivf_stimulation_chart_view->P413->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P413->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt1->Visible) { // USGRt1 ?>
	<tr id="r_USGRt1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt1"><script id="tpc_ivf_stimulation_chart_USGRt1" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt1->caption() ?></script></span></td>
		<td data-name="USGRt1" <?php echo $ivf_stimulation_chart_view->USGRt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt1" type="text/html"><span id="el_ivf_stimulation_chart_USGRt1">
<span<?php echo $ivf_stimulation_chart_view->USGRt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt2->Visible) { // USGRt2 ?>
	<tr id="r_USGRt2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt2"><script id="tpc_ivf_stimulation_chart_USGRt2" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt2->caption() ?></script></span></td>
		<td data-name="USGRt2" <?php echo $ivf_stimulation_chart_view->USGRt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt2" type="text/html"><span id="el_ivf_stimulation_chart_USGRt2">
<span<?php echo $ivf_stimulation_chart_view->USGRt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt3->Visible) { // USGRt3 ?>
	<tr id="r_USGRt3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt3"><script id="tpc_ivf_stimulation_chart_USGRt3" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt3->caption() ?></script></span></td>
		<td data-name="USGRt3" <?php echo $ivf_stimulation_chart_view->USGRt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt3" type="text/html"><span id="el_ivf_stimulation_chart_USGRt3">
<span<?php echo $ivf_stimulation_chart_view->USGRt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt4->Visible) { // USGRt4 ?>
	<tr id="r_USGRt4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt4"><script id="tpc_ivf_stimulation_chart_USGRt4" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt4->caption() ?></script></span></td>
		<td data-name="USGRt4" <?php echo $ivf_stimulation_chart_view->USGRt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt4" type="text/html"><span id="el_ivf_stimulation_chart_USGRt4">
<span<?php echo $ivf_stimulation_chart_view->USGRt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt5->Visible) { // USGRt5 ?>
	<tr id="r_USGRt5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt5"><script id="tpc_ivf_stimulation_chart_USGRt5" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt5->caption() ?></script></span></td>
		<td data-name="USGRt5" <?php echo $ivf_stimulation_chart_view->USGRt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt5" type="text/html"><span id="el_ivf_stimulation_chart_USGRt5">
<span<?php echo $ivf_stimulation_chart_view->USGRt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt6->Visible) { // USGRt6 ?>
	<tr id="r_USGRt6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt6"><script id="tpc_ivf_stimulation_chart_USGRt6" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt6->caption() ?></script></span></td>
		<td data-name="USGRt6" <?php echo $ivf_stimulation_chart_view->USGRt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt6" type="text/html"><span id="el_ivf_stimulation_chart_USGRt6">
<span<?php echo $ivf_stimulation_chart_view->USGRt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt7->Visible) { // USGRt7 ?>
	<tr id="r_USGRt7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt7"><script id="tpc_ivf_stimulation_chart_USGRt7" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt7->caption() ?></script></span></td>
		<td data-name="USGRt7" <?php echo $ivf_stimulation_chart_view->USGRt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt7" type="text/html"><span id="el_ivf_stimulation_chart_USGRt7">
<span<?php echo $ivf_stimulation_chart_view->USGRt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt8->Visible) { // USGRt8 ?>
	<tr id="r_USGRt8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt8"><script id="tpc_ivf_stimulation_chart_USGRt8" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt8->caption() ?></script></span></td>
		<td data-name="USGRt8" <?php echo $ivf_stimulation_chart_view->USGRt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt8" type="text/html"><span id="el_ivf_stimulation_chart_USGRt8">
<span<?php echo $ivf_stimulation_chart_view->USGRt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt9->Visible) { // USGRt9 ?>
	<tr id="r_USGRt9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt9"><script id="tpc_ivf_stimulation_chart_USGRt9" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt9->caption() ?></script></span></td>
		<td data-name="USGRt9" <?php echo $ivf_stimulation_chart_view->USGRt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt9" type="text/html"><span id="el_ivf_stimulation_chart_USGRt9">
<span<?php echo $ivf_stimulation_chart_view->USGRt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt10->Visible) { // USGRt10 ?>
	<tr id="r_USGRt10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt10"><script id="tpc_ivf_stimulation_chart_USGRt10" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt10->caption() ?></script></span></td>
		<td data-name="USGRt10" <?php echo $ivf_stimulation_chart_view->USGRt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt10" type="text/html"><span id="el_ivf_stimulation_chart_USGRt10">
<span<?php echo $ivf_stimulation_chart_view->USGRt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt11->Visible) { // USGRt11 ?>
	<tr id="r_USGRt11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt11"><script id="tpc_ivf_stimulation_chart_USGRt11" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt11->caption() ?></script></span></td>
		<td data-name="USGRt11" <?php echo $ivf_stimulation_chart_view->USGRt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt11" type="text/html"><span id="el_ivf_stimulation_chart_USGRt11">
<span<?php echo $ivf_stimulation_chart_view->USGRt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt12->Visible) { // USGRt12 ?>
	<tr id="r_USGRt12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt12"><script id="tpc_ivf_stimulation_chart_USGRt12" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt12->caption() ?></script></span></td>
		<td data-name="USGRt12" <?php echo $ivf_stimulation_chart_view->USGRt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt12" type="text/html"><span id="el_ivf_stimulation_chart_USGRt12">
<span<?php echo $ivf_stimulation_chart_view->USGRt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt13->Visible) { // USGRt13 ?>
	<tr id="r_USGRt13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt13"><script id="tpc_ivf_stimulation_chart_USGRt13" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt13->caption() ?></script></span></td>
		<td data-name="USGRt13" <?php echo $ivf_stimulation_chart_view->USGRt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt13" type="text/html"><span id="el_ivf_stimulation_chart_USGRt13">
<span<?php echo $ivf_stimulation_chart_view->USGRt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt1->Visible) { // USGLt1 ?>
	<tr id="r_USGLt1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt1"><script id="tpc_ivf_stimulation_chart_USGLt1" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt1->caption() ?></script></span></td>
		<td data-name="USGLt1" <?php echo $ivf_stimulation_chart_view->USGLt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt1" type="text/html"><span id="el_ivf_stimulation_chart_USGLt1">
<span<?php echo $ivf_stimulation_chart_view->USGLt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt2->Visible) { // USGLt2 ?>
	<tr id="r_USGLt2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt2"><script id="tpc_ivf_stimulation_chart_USGLt2" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt2->caption() ?></script></span></td>
		<td data-name="USGLt2" <?php echo $ivf_stimulation_chart_view->USGLt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt2" type="text/html"><span id="el_ivf_stimulation_chart_USGLt2">
<span<?php echo $ivf_stimulation_chart_view->USGLt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt3->Visible) { // USGLt3 ?>
	<tr id="r_USGLt3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt3"><script id="tpc_ivf_stimulation_chart_USGLt3" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt3->caption() ?></script></span></td>
		<td data-name="USGLt3" <?php echo $ivf_stimulation_chart_view->USGLt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt3" type="text/html"><span id="el_ivf_stimulation_chart_USGLt3">
<span<?php echo $ivf_stimulation_chart_view->USGLt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt4->Visible) { // USGLt4 ?>
	<tr id="r_USGLt4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt4"><script id="tpc_ivf_stimulation_chart_USGLt4" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt4->caption() ?></script></span></td>
		<td data-name="USGLt4" <?php echo $ivf_stimulation_chart_view->USGLt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt4" type="text/html"><span id="el_ivf_stimulation_chart_USGLt4">
<span<?php echo $ivf_stimulation_chart_view->USGLt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt5->Visible) { // USGLt5 ?>
	<tr id="r_USGLt5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt5"><script id="tpc_ivf_stimulation_chart_USGLt5" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt5->caption() ?></script></span></td>
		<td data-name="USGLt5" <?php echo $ivf_stimulation_chart_view->USGLt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt5" type="text/html"><span id="el_ivf_stimulation_chart_USGLt5">
<span<?php echo $ivf_stimulation_chart_view->USGLt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt6->Visible) { // USGLt6 ?>
	<tr id="r_USGLt6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt6"><script id="tpc_ivf_stimulation_chart_USGLt6" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt6->caption() ?></script></span></td>
		<td data-name="USGLt6" <?php echo $ivf_stimulation_chart_view->USGLt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt6" type="text/html"><span id="el_ivf_stimulation_chart_USGLt6">
<span<?php echo $ivf_stimulation_chart_view->USGLt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt7->Visible) { // USGLt7 ?>
	<tr id="r_USGLt7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt7"><script id="tpc_ivf_stimulation_chart_USGLt7" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt7->caption() ?></script></span></td>
		<td data-name="USGLt7" <?php echo $ivf_stimulation_chart_view->USGLt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt7" type="text/html"><span id="el_ivf_stimulation_chart_USGLt7">
<span<?php echo $ivf_stimulation_chart_view->USGLt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt8->Visible) { // USGLt8 ?>
	<tr id="r_USGLt8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt8"><script id="tpc_ivf_stimulation_chart_USGLt8" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt8->caption() ?></script></span></td>
		<td data-name="USGLt8" <?php echo $ivf_stimulation_chart_view->USGLt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt8" type="text/html"><span id="el_ivf_stimulation_chart_USGLt8">
<span<?php echo $ivf_stimulation_chart_view->USGLt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt9->Visible) { // USGLt9 ?>
	<tr id="r_USGLt9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt9"><script id="tpc_ivf_stimulation_chart_USGLt9" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt9->caption() ?></script></span></td>
		<td data-name="USGLt9" <?php echo $ivf_stimulation_chart_view->USGLt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt9" type="text/html"><span id="el_ivf_stimulation_chart_USGLt9">
<span<?php echo $ivf_stimulation_chart_view->USGLt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt10->Visible) { // USGLt10 ?>
	<tr id="r_USGLt10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt10"><script id="tpc_ivf_stimulation_chart_USGLt10" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt10->caption() ?></script></span></td>
		<td data-name="USGLt10" <?php echo $ivf_stimulation_chart_view->USGLt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt10" type="text/html"><span id="el_ivf_stimulation_chart_USGLt10">
<span<?php echo $ivf_stimulation_chart_view->USGLt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt11->Visible) { // USGLt11 ?>
	<tr id="r_USGLt11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt11"><script id="tpc_ivf_stimulation_chart_USGLt11" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt11->caption() ?></script></span></td>
		<td data-name="USGLt11" <?php echo $ivf_stimulation_chart_view->USGLt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt11" type="text/html"><span id="el_ivf_stimulation_chart_USGLt11">
<span<?php echo $ivf_stimulation_chart_view->USGLt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt12->Visible) { // USGLt12 ?>
	<tr id="r_USGLt12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt12"><script id="tpc_ivf_stimulation_chart_USGLt12" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt12->caption() ?></script></span></td>
		<td data-name="USGLt12" <?php echo $ivf_stimulation_chart_view->USGLt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt12" type="text/html"><span id="el_ivf_stimulation_chart_USGLt12">
<span<?php echo $ivf_stimulation_chart_view->USGLt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt13->Visible) { // USGLt13 ?>
	<tr id="r_USGLt13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt13"><script id="tpc_ivf_stimulation_chart_USGLt13" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt13->caption() ?></script></span></td>
		<td data-name="USGLt13" <?php echo $ivf_stimulation_chart_view->USGLt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt13" type="text/html"><span id="el_ivf_stimulation_chart_USGLt13">
<span<?php echo $ivf_stimulation_chart_view->USGLt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM1->Visible) { // EM1 ?>
	<tr id="r_EM1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM1"><script id="tpc_ivf_stimulation_chart_EM1" type="text/html"><?php echo $ivf_stimulation_chart_view->EM1->caption() ?></script></span></td>
		<td data-name="EM1" <?php echo $ivf_stimulation_chart_view->EM1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM1" type="text/html"><span id="el_ivf_stimulation_chart_EM1">
<span<?php echo $ivf_stimulation_chart_view->EM1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM2->Visible) { // EM2 ?>
	<tr id="r_EM2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM2"><script id="tpc_ivf_stimulation_chart_EM2" type="text/html"><?php echo $ivf_stimulation_chart_view->EM2->caption() ?></script></span></td>
		<td data-name="EM2" <?php echo $ivf_stimulation_chart_view->EM2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM2" type="text/html"><span id="el_ivf_stimulation_chart_EM2">
<span<?php echo $ivf_stimulation_chart_view->EM2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM3->Visible) { // EM3 ?>
	<tr id="r_EM3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM3"><script id="tpc_ivf_stimulation_chart_EM3" type="text/html"><?php echo $ivf_stimulation_chart_view->EM3->caption() ?></script></span></td>
		<td data-name="EM3" <?php echo $ivf_stimulation_chart_view->EM3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM3" type="text/html"><span id="el_ivf_stimulation_chart_EM3">
<span<?php echo $ivf_stimulation_chart_view->EM3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM4->Visible) { // EM4 ?>
	<tr id="r_EM4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM4"><script id="tpc_ivf_stimulation_chart_EM4" type="text/html"><?php echo $ivf_stimulation_chart_view->EM4->caption() ?></script></span></td>
		<td data-name="EM4" <?php echo $ivf_stimulation_chart_view->EM4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM4" type="text/html"><span id="el_ivf_stimulation_chart_EM4">
<span<?php echo $ivf_stimulation_chart_view->EM4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM5->Visible) { // EM5 ?>
	<tr id="r_EM5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM5"><script id="tpc_ivf_stimulation_chart_EM5" type="text/html"><?php echo $ivf_stimulation_chart_view->EM5->caption() ?></script></span></td>
		<td data-name="EM5" <?php echo $ivf_stimulation_chart_view->EM5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM5" type="text/html"><span id="el_ivf_stimulation_chart_EM5">
<span<?php echo $ivf_stimulation_chart_view->EM5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM6->Visible) { // EM6 ?>
	<tr id="r_EM6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM6"><script id="tpc_ivf_stimulation_chart_EM6" type="text/html"><?php echo $ivf_stimulation_chart_view->EM6->caption() ?></script></span></td>
		<td data-name="EM6" <?php echo $ivf_stimulation_chart_view->EM6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM6" type="text/html"><span id="el_ivf_stimulation_chart_EM6">
<span<?php echo $ivf_stimulation_chart_view->EM6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM7->Visible) { // EM7 ?>
	<tr id="r_EM7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM7"><script id="tpc_ivf_stimulation_chart_EM7" type="text/html"><?php echo $ivf_stimulation_chart_view->EM7->caption() ?></script></span></td>
		<td data-name="EM7" <?php echo $ivf_stimulation_chart_view->EM7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM7" type="text/html"><span id="el_ivf_stimulation_chart_EM7">
<span<?php echo $ivf_stimulation_chart_view->EM7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM8->Visible) { // EM8 ?>
	<tr id="r_EM8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM8"><script id="tpc_ivf_stimulation_chart_EM8" type="text/html"><?php echo $ivf_stimulation_chart_view->EM8->caption() ?></script></span></td>
		<td data-name="EM8" <?php echo $ivf_stimulation_chart_view->EM8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM8" type="text/html"><span id="el_ivf_stimulation_chart_EM8">
<span<?php echo $ivf_stimulation_chart_view->EM8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM9->Visible) { // EM9 ?>
	<tr id="r_EM9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM9"><script id="tpc_ivf_stimulation_chart_EM9" type="text/html"><?php echo $ivf_stimulation_chart_view->EM9->caption() ?></script></span></td>
		<td data-name="EM9" <?php echo $ivf_stimulation_chart_view->EM9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM9" type="text/html"><span id="el_ivf_stimulation_chart_EM9">
<span<?php echo $ivf_stimulation_chart_view->EM9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM10->Visible) { // EM10 ?>
	<tr id="r_EM10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM10"><script id="tpc_ivf_stimulation_chart_EM10" type="text/html"><?php echo $ivf_stimulation_chart_view->EM10->caption() ?></script></span></td>
		<td data-name="EM10" <?php echo $ivf_stimulation_chart_view->EM10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM10" type="text/html"><span id="el_ivf_stimulation_chart_EM10">
<span<?php echo $ivf_stimulation_chart_view->EM10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM11->Visible) { // EM11 ?>
	<tr id="r_EM11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM11"><script id="tpc_ivf_stimulation_chart_EM11" type="text/html"><?php echo $ivf_stimulation_chart_view->EM11->caption() ?></script></span></td>
		<td data-name="EM11" <?php echo $ivf_stimulation_chart_view->EM11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM11" type="text/html"><span id="el_ivf_stimulation_chart_EM11">
<span<?php echo $ivf_stimulation_chart_view->EM11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM12->Visible) { // EM12 ?>
	<tr id="r_EM12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM12"><script id="tpc_ivf_stimulation_chart_EM12" type="text/html"><?php echo $ivf_stimulation_chart_view->EM12->caption() ?></script></span></td>
		<td data-name="EM12" <?php echo $ivf_stimulation_chart_view->EM12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM12" type="text/html"><span id="el_ivf_stimulation_chart_EM12">
<span<?php echo $ivf_stimulation_chart_view->EM12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM13->Visible) { // EM13 ?>
	<tr id="r_EM13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM13"><script id="tpc_ivf_stimulation_chart_EM13" type="text/html"><?php echo $ivf_stimulation_chart_view->EM13->caption() ?></script></span></td>
		<td data-name="EM13" <?php echo $ivf_stimulation_chart_view->EM13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM13" type="text/html"><span id="el_ivf_stimulation_chart_EM13">
<span<?php echo $ivf_stimulation_chart_view->EM13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others1->Visible) { // Others1 ?>
	<tr id="r_Others1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others1"><script id="tpc_ivf_stimulation_chart_Others1" type="text/html"><?php echo $ivf_stimulation_chart_view->Others1->caption() ?></script></span></td>
		<td data-name="Others1" <?php echo $ivf_stimulation_chart_view->Others1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others1" type="text/html"><span id="el_ivf_stimulation_chart_Others1">
<span<?php echo $ivf_stimulation_chart_view->Others1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others2->Visible) { // Others2 ?>
	<tr id="r_Others2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others2"><script id="tpc_ivf_stimulation_chart_Others2" type="text/html"><?php echo $ivf_stimulation_chart_view->Others2->caption() ?></script></span></td>
		<td data-name="Others2" <?php echo $ivf_stimulation_chart_view->Others2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others2" type="text/html"><span id="el_ivf_stimulation_chart_Others2">
<span<?php echo $ivf_stimulation_chart_view->Others2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others3->Visible) { // Others3 ?>
	<tr id="r_Others3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others3"><script id="tpc_ivf_stimulation_chart_Others3" type="text/html"><?php echo $ivf_stimulation_chart_view->Others3->caption() ?></script></span></td>
		<td data-name="Others3" <?php echo $ivf_stimulation_chart_view->Others3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others3" type="text/html"><span id="el_ivf_stimulation_chart_Others3">
<span<?php echo $ivf_stimulation_chart_view->Others3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others4->Visible) { // Others4 ?>
	<tr id="r_Others4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others4"><script id="tpc_ivf_stimulation_chart_Others4" type="text/html"><?php echo $ivf_stimulation_chart_view->Others4->caption() ?></script></span></td>
		<td data-name="Others4" <?php echo $ivf_stimulation_chart_view->Others4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others4" type="text/html"><span id="el_ivf_stimulation_chart_Others4">
<span<?php echo $ivf_stimulation_chart_view->Others4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others5->Visible) { // Others5 ?>
	<tr id="r_Others5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others5"><script id="tpc_ivf_stimulation_chart_Others5" type="text/html"><?php echo $ivf_stimulation_chart_view->Others5->caption() ?></script></span></td>
		<td data-name="Others5" <?php echo $ivf_stimulation_chart_view->Others5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others5" type="text/html"><span id="el_ivf_stimulation_chart_Others5">
<span<?php echo $ivf_stimulation_chart_view->Others5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others6->Visible) { // Others6 ?>
	<tr id="r_Others6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others6"><script id="tpc_ivf_stimulation_chart_Others6" type="text/html"><?php echo $ivf_stimulation_chart_view->Others6->caption() ?></script></span></td>
		<td data-name="Others6" <?php echo $ivf_stimulation_chart_view->Others6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others6" type="text/html"><span id="el_ivf_stimulation_chart_Others6">
<span<?php echo $ivf_stimulation_chart_view->Others6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others7->Visible) { // Others7 ?>
	<tr id="r_Others7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others7"><script id="tpc_ivf_stimulation_chart_Others7" type="text/html"><?php echo $ivf_stimulation_chart_view->Others7->caption() ?></script></span></td>
		<td data-name="Others7" <?php echo $ivf_stimulation_chart_view->Others7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others7" type="text/html"><span id="el_ivf_stimulation_chart_Others7">
<span<?php echo $ivf_stimulation_chart_view->Others7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others8->Visible) { // Others8 ?>
	<tr id="r_Others8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others8"><script id="tpc_ivf_stimulation_chart_Others8" type="text/html"><?php echo $ivf_stimulation_chart_view->Others8->caption() ?></script></span></td>
		<td data-name="Others8" <?php echo $ivf_stimulation_chart_view->Others8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others8" type="text/html"><span id="el_ivf_stimulation_chart_Others8">
<span<?php echo $ivf_stimulation_chart_view->Others8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others9->Visible) { // Others9 ?>
	<tr id="r_Others9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others9"><script id="tpc_ivf_stimulation_chart_Others9" type="text/html"><?php echo $ivf_stimulation_chart_view->Others9->caption() ?></script></span></td>
		<td data-name="Others9" <?php echo $ivf_stimulation_chart_view->Others9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others9" type="text/html"><span id="el_ivf_stimulation_chart_Others9">
<span<?php echo $ivf_stimulation_chart_view->Others9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others10->Visible) { // Others10 ?>
	<tr id="r_Others10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others10"><script id="tpc_ivf_stimulation_chart_Others10" type="text/html"><?php echo $ivf_stimulation_chart_view->Others10->caption() ?></script></span></td>
		<td data-name="Others10" <?php echo $ivf_stimulation_chart_view->Others10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others10" type="text/html"><span id="el_ivf_stimulation_chart_Others10">
<span<?php echo $ivf_stimulation_chart_view->Others10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others11->Visible) { // Others11 ?>
	<tr id="r_Others11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others11"><script id="tpc_ivf_stimulation_chart_Others11" type="text/html"><?php echo $ivf_stimulation_chart_view->Others11->caption() ?></script></span></td>
		<td data-name="Others11" <?php echo $ivf_stimulation_chart_view->Others11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others11" type="text/html"><span id="el_ivf_stimulation_chart_Others11">
<span<?php echo $ivf_stimulation_chart_view->Others11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others12->Visible) { // Others12 ?>
	<tr id="r_Others12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others12"><script id="tpc_ivf_stimulation_chart_Others12" type="text/html"><?php echo $ivf_stimulation_chart_view->Others12->caption() ?></script></span></td>
		<td data-name="Others12" <?php echo $ivf_stimulation_chart_view->Others12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others12" type="text/html"><span id="el_ivf_stimulation_chart_Others12">
<span<?php echo $ivf_stimulation_chart_view->Others12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others13->Visible) { // Others13 ?>
	<tr id="r_Others13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others13"><script id="tpc_ivf_stimulation_chart_Others13" type="text/html"><?php echo $ivf_stimulation_chart_view->Others13->caption() ?></script></span></td>
		<td data-name="Others13" <?php echo $ivf_stimulation_chart_view->Others13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others13" type="text/html"><span id="el_ivf_stimulation_chart_Others13">
<span<?php echo $ivf_stimulation_chart_view->Others13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR1->Visible) { // DR1 ?>
	<tr id="r_DR1">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR1"><script id="tpc_ivf_stimulation_chart_DR1" type="text/html"><?php echo $ivf_stimulation_chart_view->DR1->caption() ?></script></span></td>
		<td data-name="DR1" <?php echo $ivf_stimulation_chart_view->DR1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR1" type="text/html"><span id="el_ivf_stimulation_chart_DR1">
<span<?php echo $ivf_stimulation_chart_view->DR1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR2->Visible) { // DR2 ?>
	<tr id="r_DR2">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR2"><script id="tpc_ivf_stimulation_chart_DR2" type="text/html"><?php echo $ivf_stimulation_chart_view->DR2->caption() ?></script></span></td>
		<td data-name="DR2" <?php echo $ivf_stimulation_chart_view->DR2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR2" type="text/html"><span id="el_ivf_stimulation_chart_DR2">
<span<?php echo $ivf_stimulation_chart_view->DR2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR3->Visible) { // DR3 ?>
	<tr id="r_DR3">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR3"><script id="tpc_ivf_stimulation_chart_DR3" type="text/html"><?php echo $ivf_stimulation_chart_view->DR3->caption() ?></script></span></td>
		<td data-name="DR3" <?php echo $ivf_stimulation_chart_view->DR3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR3" type="text/html"><span id="el_ivf_stimulation_chart_DR3">
<span<?php echo $ivf_stimulation_chart_view->DR3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR4->Visible) { // DR4 ?>
	<tr id="r_DR4">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR4"><script id="tpc_ivf_stimulation_chart_DR4" type="text/html"><?php echo $ivf_stimulation_chart_view->DR4->caption() ?></script></span></td>
		<td data-name="DR4" <?php echo $ivf_stimulation_chart_view->DR4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR4" type="text/html"><span id="el_ivf_stimulation_chart_DR4">
<span<?php echo $ivf_stimulation_chart_view->DR4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR5->Visible) { // DR5 ?>
	<tr id="r_DR5">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR5"><script id="tpc_ivf_stimulation_chart_DR5" type="text/html"><?php echo $ivf_stimulation_chart_view->DR5->caption() ?></script></span></td>
		<td data-name="DR5" <?php echo $ivf_stimulation_chart_view->DR5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR5" type="text/html"><span id="el_ivf_stimulation_chart_DR5">
<span<?php echo $ivf_stimulation_chart_view->DR5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR6->Visible) { // DR6 ?>
	<tr id="r_DR6">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR6"><script id="tpc_ivf_stimulation_chart_DR6" type="text/html"><?php echo $ivf_stimulation_chart_view->DR6->caption() ?></script></span></td>
		<td data-name="DR6" <?php echo $ivf_stimulation_chart_view->DR6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR6" type="text/html"><span id="el_ivf_stimulation_chart_DR6">
<span<?php echo $ivf_stimulation_chart_view->DR6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR6->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR7->Visible) { // DR7 ?>
	<tr id="r_DR7">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR7"><script id="tpc_ivf_stimulation_chart_DR7" type="text/html"><?php echo $ivf_stimulation_chart_view->DR7->caption() ?></script></span></td>
		<td data-name="DR7" <?php echo $ivf_stimulation_chart_view->DR7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR7" type="text/html"><span id="el_ivf_stimulation_chart_DR7">
<span<?php echo $ivf_stimulation_chart_view->DR7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR7->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR8->Visible) { // DR8 ?>
	<tr id="r_DR8">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR8"><script id="tpc_ivf_stimulation_chart_DR8" type="text/html"><?php echo $ivf_stimulation_chart_view->DR8->caption() ?></script></span></td>
		<td data-name="DR8" <?php echo $ivf_stimulation_chart_view->DR8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR8" type="text/html"><span id="el_ivf_stimulation_chart_DR8">
<span<?php echo $ivf_stimulation_chart_view->DR8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR8->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR9->Visible) { // DR9 ?>
	<tr id="r_DR9">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR9"><script id="tpc_ivf_stimulation_chart_DR9" type="text/html"><?php echo $ivf_stimulation_chart_view->DR9->caption() ?></script></span></td>
		<td data-name="DR9" <?php echo $ivf_stimulation_chart_view->DR9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR9" type="text/html"><span id="el_ivf_stimulation_chart_DR9">
<span<?php echo $ivf_stimulation_chart_view->DR9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR9->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR10->Visible) { // DR10 ?>
	<tr id="r_DR10">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR10"><script id="tpc_ivf_stimulation_chart_DR10" type="text/html"><?php echo $ivf_stimulation_chart_view->DR10->caption() ?></script></span></td>
		<td data-name="DR10" <?php echo $ivf_stimulation_chart_view->DR10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR10" type="text/html"><span id="el_ivf_stimulation_chart_DR10">
<span<?php echo $ivf_stimulation_chart_view->DR10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR10->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR11->Visible) { // DR11 ?>
	<tr id="r_DR11">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR11"><script id="tpc_ivf_stimulation_chart_DR11" type="text/html"><?php echo $ivf_stimulation_chart_view->DR11->caption() ?></script></span></td>
		<td data-name="DR11" <?php echo $ivf_stimulation_chart_view->DR11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR11" type="text/html"><span id="el_ivf_stimulation_chart_DR11">
<span<?php echo $ivf_stimulation_chart_view->DR11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR11->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR12->Visible) { // DR12 ?>
	<tr id="r_DR12">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR12"><script id="tpc_ivf_stimulation_chart_DR12" type="text/html"><?php echo $ivf_stimulation_chart_view->DR12->caption() ?></script></span></td>
		<td data-name="DR12" <?php echo $ivf_stimulation_chart_view->DR12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR12" type="text/html"><span id="el_ivf_stimulation_chart_DR12">
<span<?php echo $ivf_stimulation_chart_view->DR12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR12->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR13->Visible) { // DR13 ?>
	<tr id="r_DR13">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR13"><script id="tpc_ivf_stimulation_chart_DR13" type="text/html"><?php echo $ivf_stimulation_chart_view->DR13->caption() ?></script></span></td>
		<td data-name="DR13" <?php echo $ivf_stimulation_chart_view->DR13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR13" type="text/html"><span id="el_ivf_stimulation_chart_DR13">
<span<?php echo $ivf_stimulation_chart_view->DR13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR13->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
	<tr id="r_DOCTORRESPONSIBLE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE"><script id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><?php echo $ivf_stimulation_chart_view->DOCTORRESPONSIBLE->caption() ?></script></span></td>
		<td data-name="DOCTORRESPONSIBLE" <?php echo $ivf_stimulation_chart_view->DOCTORRESPONSIBLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<span<?php echo $ivf_stimulation_chart_view->DOCTORRESPONSIBLE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DOCTORRESPONSIBLE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TidNo"><script id="tpc_ivf_stimulation_chart_TidNo" type="text/html"><?php echo $ivf_stimulation_chart_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_stimulation_chart_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TidNo" type="text/html"><span id="el_ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart_view->TidNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Convert->Visible) { // Convert ?>
	<tr id="r_Convert">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Convert"><script id="tpc_ivf_stimulation_chart_Convert" type="text/html"><?php echo $ivf_stimulation_chart_view->Convert->caption() ?></script></span></td>
		<td data-name="Convert" <?php echo $ivf_stimulation_chart_view->Convert->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Convert" type="text/html"><span id="el_ivf_stimulation_chart_Convert">
<span<?php echo $ivf_stimulation_chart_view->Convert->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Convert->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Consultant"><script id="tpc_ivf_stimulation_chart_Consultant" type="text/html"><?php echo $ivf_stimulation_chart_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $ivf_stimulation_chart_view->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Consultant" type="text/html"><span id="el_ivf_stimulation_chart_Consultant">
<span<?php echo $ivf_stimulation_chart_view->Consultant->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique"><script id="tpc_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><?php echo $ivf_stimulation_chart_view->InseminatinTechnique->caption() ?></script></span></td>
		<td data-name="InseminatinTechnique" <?php echo $ivf_stimulation_chart_view->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><span id="el_ivf_stimulation_chart_InseminatinTechnique">
<span<?php echo $ivf_stimulation_chart_view->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->InseminatinTechnique->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IndicationForART"><script id="tpc_ivf_stimulation_chart_IndicationForART" type="text/html"><?php echo $ivf_stimulation_chart_view->IndicationForART->caption() ?></script></span></td>
		<td data-name="IndicationForART" <?php echo $ivf_stimulation_chart_view->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IndicationForART" type="text/html"><span id="el_ivf_stimulation_chart_IndicationForART">
<span<?php echo $ivf_stimulation_chart_view->IndicationForART->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->IndicationForART->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<tr id="r_Hysteroscopy">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy"><script id="tpc_ivf_stimulation_chart_Hysteroscopy" type="text/html"><?php echo $ivf_stimulation_chart_view->Hysteroscopy->caption() ?></script></span></td>
		<td data-name="Hysteroscopy" <?php echo $ivf_stimulation_chart_view->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Hysteroscopy" type="text/html"><span id="el_ivf_stimulation_chart_Hysteroscopy">
<span<?php echo $ivf_stimulation_chart_view->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Hysteroscopy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<tr id="r_EndometrialScratching">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching"><script id="tpc_ivf_stimulation_chart_EndometrialScratching" type="text/html"><?php echo $ivf_stimulation_chart_view->EndometrialScratching->caption() ?></script></span></td>
		<td data-name="EndometrialScratching" <?php echo $ivf_stimulation_chart_view->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EndometrialScratching" type="text/html"><span id="el_ivf_stimulation_chart_EndometrialScratching">
<span<?php echo $ivf_stimulation_chart_view->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EndometrialScratching->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TrialCannulation->Visible) { // TrialCannulation ?>
	<tr id="r_TrialCannulation">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation"><script id="tpc_ivf_stimulation_chart_TrialCannulation" type="text/html"><?php echo $ivf_stimulation_chart_view->TrialCannulation->caption() ?></script></span></td>
		<td data-name="TrialCannulation" <?php echo $ivf_stimulation_chart_view->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TrialCannulation" type="text/html"><span id="el_ivf_stimulation_chart_TrialCannulation">
<span<?php echo $ivf_stimulation_chart_view->TrialCannulation->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TrialCannulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<tr id="r_CYCLETYPE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE"><script id="tpc_ivf_stimulation_chart_CYCLETYPE" type="text/html"><?php echo $ivf_stimulation_chart_view->CYCLETYPE->caption() ?></script></span></td>
		<td data-name="CYCLETYPE" <?php echo $ivf_stimulation_chart_view->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CYCLETYPE" type="text/html"><span id="el_ivf_stimulation_chart_CYCLETYPE">
<span<?php echo $ivf_stimulation_chart_view->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CYCLETYPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<tr id="r_HRTCYCLE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE"><script id="tpc_ivf_stimulation_chart_HRTCYCLE" type="text/html"><?php echo $ivf_stimulation_chart_view->HRTCYCLE->caption() ?></script></span></td>
		<td data-name="HRTCYCLE" <?php echo $ivf_stimulation_chart_view->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HRTCYCLE" type="text/html"><span id="el_ivf_stimulation_chart_HRTCYCLE">
<span<?php echo $ivf_stimulation_chart_view->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HRTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<tr id="r_OralEstrogenDosage">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage"><script id="tpc_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><?php echo $ivf_stimulation_chart_view->OralEstrogenDosage->caption() ?></script></span></td>
		<td data-name="OralEstrogenDosage" <?php echo $ivf_stimulation_chart_view->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<span<?php echo $ivf_stimulation_chart_view->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->OralEstrogenDosage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<tr id="r_VaginalEstrogen">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen"><script id="tpc_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><?php echo $ivf_stimulation_chart_view->VaginalEstrogen->caption() ?></script></span></td>
		<td data-name="VaginalEstrogen" <?php echo $ivf_stimulation_chart_view->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><span id="el_ivf_stimulation_chart_VaginalEstrogen">
<span<?php echo $ivf_stimulation_chart_view->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->VaginalEstrogen->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GCSF->Visible) { // GCSF ?>
	<tr id="r_GCSF">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GCSF"><script id="tpc_ivf_stimulation_chart_GCSF" type="text/html"><?php echo $ivf_stimulation_chart_view->GCSF->caption() ?></script></span></td>
		<td data-name="GCSF" <?php echo $ivf_stimulation_chart_view->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GCSF" type="text/html"><span id="el_ivf_stimulation_chart_GCSF">
<span<?php echo $ivf_stimulation_chart_view->GCSF->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GCSF->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<tr id="r_ActivatedPRP">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP"><script id="tpc_ivf_stimulation_chart_ActivatedPRP" type="text/html"><?php echo $ivf_stimulation_chart_view->ActivatedPRP->caption() ?></script></span></td>
		<td data-name="ActivatedPRP" <?php echo $ivf_stimulation_chart_view->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ActivatedPRP" type="text/html"><span id="el_ivf_stimulation_chart_ActivatedPRP">
<span<?php echo $ivf_stimulation_chart_view->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ActivatedPRP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->UCLcm->Visible) { // UCLcm ?>
	<tr id="r_UCLcm">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UCLcm"><script id="tpc_ivf_stimulation_chart_UCLcm" type="text/html"><?php echo $ivf_stimulation_chart_view->UCLcm->caption() ?></script></span></td>
		<td data-name="UCLcm" <?php echo $ivf_stimulation_chart_view->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UCLcm" type="text/html"><span id="el_ivf_stimulation_chart_UCLcm">
<span<?php echo $ivf_stimulation_chart_view->UCLcm->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->UCLcm->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<tr id="r_DATOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><script id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_view->DATOFEMBRYOTRANSFER->caption() ?></script></span></td>
		<td data-name="DATOFEMBRYOTRANSFER" <?php echo $ivf_stimulation_chart_view->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart_view->DATOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<tr id="r_DAYOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOTRANSFER->caption() ?></script></span></td>
		<td data-name="DAYOFEMBRYOTRANSFER" <?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<tr id="r_NOOFEMBRYOSTHAWED">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTHAWED->caption() ?></script></span></td>
		<td data-name="NOOFEMBRYOSTHAWED" <?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<tr id="r_NOOFEMBRYOSTRANSFERRED">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTRANSFERRED->caption() ?></script></span></td>
		<td data-name="NOOFEMBRYOSTRANSFERRED" <?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<tr id="r_DAYOFEMBRYOS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOS->caption() ?></script></span></td>
		<td data-name="DAYOFEMBRYOS" <?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DAYOFEMBRYOS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<tr id="r_CRYOPRESERVEDEMBRYOS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><script id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_view->CRYOPRESERVEDEMBRYOS->caption() ?></script></span></td>
		<td data-name="CRYOPRESERVEDEMBRYOS" <?php echo $ivf_stimulation_chart_view->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_stimulation_chart_view->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ViaAdmin->Visible) { // ViaAdmin ?>
	<tr id="r_ViaAdmin">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin"><script id="tpc_ivf_stimulation_chart_ViaAdmin" type="text/html"><?php echo $ivf_stimulation_chart_view->ViaAdmin->caption() ?></script></span></td>
		<td data-name="ViaAdmin" <?php echo $ivf_stimulation_chart_view->ViaAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ViaAdmin">
<span<?php echo $ivf_stimulation_chart_view->ViaAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ViaAdmin->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<tr id="r_ViaStartDateTime">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime"><script id="tpc_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><?php echo $ivf_stimulation_chart_view->ViaStartDateTime->caption() ?></script></span></td>
		<td data-name="ViaStartDateTime" <?php echo $ivf_stimulation_chart_view->ViaStartDateTime->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><span id="el_ivf_stimulation_chart_ViaStartDateTime">
<span<?php echo $ivf_stimulation_chart_view->ViaStartDateTime->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ViaStartDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ViaDose->Visible) { // ViaDose ?>
	<tr id="r_ViaDose">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaDose"><script id="tpc_ivf_stimulation_chart_ViaDose" type="text/html"><?php echo $ivf_stimulation_chart_view->ViaDose->caption() ?></script></span></td>
		<td data-name="ViaDose" <?php echo $ivf_stimulation_chart_view->ViaDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaDose" type="text/html"><span id="el_ivf_stimulation_chart_ViaDose">
<span<?php echo $ivf_stimulation_chart_view->ViaDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ViaDose->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->AllFreeze->Visible) { // AllFreeze ?>
	<tr id="r_AllFreeze">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AllFreeze"><script id="tpc_ivf_stimulation_chart_AllFreeze" type="text/html"><?php echo $ivf_stimulation_chart_view->AllFreeze->caption() ?></script></span></td>
		<td data-name="AllFreeze" <?php echo $ivf_stimulation_chart_view->AllFreeze->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AllFreeze" type="text/html"><span id="el_ivf_stimulation_chart_AllFreeze">
<span<?php echo $ivf_stimulation_chart_view->AllFreeze->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->AllFreeze->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<tr id="r_TreatmentCancel">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel"><script id="tpc_ivf_stimulation_chart_TreatmentCancel" type="text/html"><?php echo $ivf_stimulation_chart_view->TreatmentCancel->caption() ?></script></span></td>
		<td data-name="TreatmentCancel" <?php echo $ivf_stimulation_chart_view->TreatmentCancel->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TreatmentCancel" type="text/html"><span id="el_ivf_stimulation_chart_TreatmentCancel">
<span<?php echo $ivf_stimulation_chart_view->TreatmentCancel->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TreatmentCancel->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Reason->Visible) { // Reason ?>
	<tr id="r_Reason">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Reason"><script id="tpc_ivf_stimulation_chart_Reason" type="text/html"><?php echo $ivf_stimulation_chart_view->Reason->caption() ?></script></span></td>
		<td data-name="Reason" <?php echo $ivf_stimulation_chart_view->Reason->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Reason" type="text/html"><span id="el_ivf_stimulation_chart_Reason">
<span<?php echo $ivf_stimulation_chart_view->Reason->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Reason->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<tr id="r_ProgesteroneAdmin">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin"><script id="tpc_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><?php echo $ivf_stimulation_chart_view->ProgesteroneAdmin->caption() ?></script></span></td>
		<td data-name="ProgesteroneAdmin" <?php echo $ivf_stimulation_chart_view->ProgesteroneAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<span<?php echo $ivf_stimulation_chart_view->ProgesteroneAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ProgesteroneAdmin->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<tr id="r_ProgesteroneStart">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart"><script id="tpc_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><?php echo $ivf_stimulation_chart_view->ProgesteroneStart->caption() ?></script></span></td>
		<td data-name="ProgesteroneStart" <?php echo $ivf_stimulation_chart_view->ProgesteroneStart->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneStart">
<span<?php echo $ivf_stimulation_chart_view->ProgesteroneStart->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ProgesteroneStart->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<tr id="r_ProgesteroneDose">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose"><script id="tpc_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><?php echo $ivf_stimulation_chart_view->ProgesteroneDose->caption() ?></script></span></td>
		<td data-name="ProgesteroneDose" <?php echo $ivf_stimulation_chart_view->ProgesteroneDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneDose">
<span<?php echo $ivf_stimulation_chart_view->ProgesteroneDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ProgesteroneDose->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Projectron->Visible) { // Projectron ?>
	<tr id="r_Projectron">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Projectron"><script id="tpc_ivf_stimulation_chart_Projectron" type="text/html"><?php echo $ivf_stimulation_chart_view->Projectron->caption() ?></script></span></td>
		<td data-name="Projectron" <?php echo $ivf_stimulation_chart_view->Projectron->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Projectron" type="text/html"><span id="el_ivf_stimulation_chart_Projectron">
<span<?php echo $ivf_stimulation_chart_view->Projectron->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Projectron->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate14->Visible) { // StChDate14 ?>
	<tr id="r_StChDate14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate14"><script id="tpc_ivf_stimulation_chart_StChDate14" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate14->caption() ?></script></span></td>
		<td data-name="StChDate14" <?php echo $ivf_stimulation_chart_view->StChDate14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate14" type="text/html"><span id="el_ivf_stimulation_chart_StChDate14">
<span<?php echo $ivf_stimulation_chart_view->StChDate14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate15->Visible) { // StChDate15 ?>
	<tr id="r_StChDate15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate15"><script id="tpc_ivf_stimulation_chart_StChDate15" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate15->caption() ?></script></span></td>
		<td data-name="StChDate15" <?php echo $ivf_stimulation_chart_view->StChDate15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate15" type="text/html"><span id="el_ivf_stimulation_chart_StChDate15">
<span<?php echo $ivf_stimulation_chart_view->StChDate15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate16->Visible) { // StChDate16 ?>
	<tr id="r_StChDate16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate16"><script id="tpc_ivf_stimulation_chart_StChDate16" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate16->caption() ?></script></span></td>
		<td data-name="StChDate16" <?php echo $ivf_stimulation_chart_view->StChDate16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate16" type="text/html"><span id="el_ivf_stimulation_chart_StChDate16">
<span<?php echo $ivf_stimulation_chart_view->StChDate16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate17->Visible) { // StChDate17 ?>
	<tr id="r_StChDate17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate17"><script id="tpc_ivf_stimulation_chart_StChDate17" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate17->caption() ?></script></span></td>
		<td data-name="StChDate17" <?php echo $ivf_stimulation_chart_view->StChDate17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate17" type="text/html"><span id="el_ivf_stimulation_chart_StChDate17">
<span<?php echo $ivf_stimulation_chart_view->StChDate17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate18->Visible) { // StChDate18 ?>
	<tr id="r_StChDate18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate18"><script id="tpc_ivf_stimulation_chart_StChDate18" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate18->caption() ?></script></span></td>
		<td data-name="StChDate18" <?php echo $ivf_stimulation_chart_view->StChDate18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate18" type="text/html"><span id="el_ivf_stimulation_chart_StChDate18">
<span<?php echo $ivf_stimulation_chart_view->StChDate18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate19->Visible) { // StChDate19 ?>
	<tr id="r_StChDate19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate19"><script id="tpc_ivf_stimulation_chart_StChDate19" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate19->caption() ?></script></span></td>
		<td data-name="StChDate19" <?php echo $ivf_stimulation_chart_view->StChDate19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate19" type="text/html"><span id="el_ivf_stimulation_chart_StChDate19">
<span<?php echo $ivf_stimulation_chart_view->StChDate19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate20->Visible) { // StChDate20 ?>
	<tr id="r_StChDate20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate20"><script id="tpc_ivf_stimulation_chart_StChDate20" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate20->caption() ?></script></span></td>
		<td data-name="StChDate20" <?php echo $ivf_stimulation_chart_view->StChDate20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate20" type="text/html"><span id="el_ivf_stimulation_chart_StChDate20">
<span<?php echo $ivf_stimulation_chart_view->StChDate20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate21->Visible) { // StChDate21 ?>
	<tr id="r_StChDate21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate21"><script id="tpc_ivf_stimulation_chart_StChDate21" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate21->caption() ?></script></span></td>
		<td data-name="StChDate21" <?php echo $ivf_stimulation_chart_view->StChDate21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate21" type="text/html"><span id="el_ivf_stimulation_chart_StChDate21">
<span<?php echo $ivf_stimulation_chart_view->StChDate21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate22->Visible) { // StChDate22 ?>
	<tr id="r_StChDate22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate22"><script id="tpc_ivf_stimulation_chart_StChDate22" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate22->caption() ?></script></span></td>
		<td data-name="StChDate22" <?php echo $ivf_stimulation_chart_view->StChDate22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate22" type="text/html"><span id="el_ivf_stimulation_chart_StChDate22">
<span<?php echo $ivf_stimulation_chart_view->StChDate22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate23->Visible) { // StChDate23 ?>
	<tr id="r_StChDate23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate23"><script id="tpc_ivf_stimulation_chart_StChDate23" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate23->caption() ?></script></span></td>
		<td data-name="StChDate23" <?php echo $ivf_stimulation_chart_view->StChDate23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate23" type="text/html"><span id="el_ivf_stimulation_chart_StChDate23">
<span<?php echo $ivf_stimulation_chart_view->StChDate23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate24->Visible) { // StChDate24 ?>
	<tr id="r_StChDate24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate24"><script id="tpc_ivf_stimulation_chart_StChDate24" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate24->caption() ?></script></span></td>
		<td data-name="StChDate24" <?php echo $ivf_stimulation_chart_view->StChDate24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate24" type="text/html"><span id="el_ivf_stimulation_chart_StChDate24">
<span<?php echo $ivf_stimulation_chart_view->StChDate24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StChDate25->Visible) { // StChDate25 ?>
	<tr id="r_StChDate25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate25"><script id="tpc_ivf_stimulation_chart_StChDate25" type="text/html"><?php echo $ivf_stimulation_chart_view->StChDate25->caption() ?></script></span></td>
		<td data-name="StChDate25" <?php echo $ivf_stimulation_chart_view->StChDate25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate25" type="text/html"><span id="el_ivf_stimulation_chart_StChDate25">
<span<?php echo $ivf_stimulation_chart_view->StChDate25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StChDate25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay14->Visible) { // CycleDay14 ?>
	<tr id="r_CycleDay14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay14"><script id="tpc_ivf_stimulation_chart_CycleDay14" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay14->caption() ?></script></span></td>
		<td data-name="CycleDay14" <?php echo $ivf_stimulation_chart_view->CycleDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay14" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay14">
<span<?php echo $ivf_stimulation_chart_view->CycleDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay15->Visible) { // CycleDay15 ?>
	<tr id="r_CycleDay15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay15"><script id="tpc_ivf_stimulation_chart_CycleDay15" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay15->caption() ?></script></span></td>
		<td data-name="CycleDay15" <?php echo $ivf_stimulation_chart_view->CycleDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay15" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay15">
<span<?php echo $ivf_stimulation_chart_view->CycleDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay16->Visible) { // CycleDay16 ?>
	<tr id="r_CycleDay16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay16"><script id="tpc_ivf_stimulation_chart_CycleDay16" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay16->caption() ?></script></span></td>
		<td data-name="CycleDay16" <?php echo $ivf_stimulation_chart_view->CycleDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay16" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay16">
<span<?php echo $ivf_stimulation_chart_view->CycleDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay17->Visible) { // CycleDay17 ?>
	<tr id="r_CycleDay17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay17"><script id="tpc_ivf_stimulation_chart_CycleDay17" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay17->caption() ?></script></span></td>
		<td data-name="CycleDay17" <?php echo $ivf_stimulation_chart_view->CycleDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay17" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay17">
<span<?php echo $ivf_stimulation_chart_view->CycleDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay18->Visible) { // CycleDay18 ?>
	<tr id="r_CycleDay18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay18"><script id="tpc_ivf_stimulation_chart_CycleDay18" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay18->caption() ?></script></span></td>
		<td data-name="CycleDay18" <?php echo $ivf_stimulation_chart_view->CycleDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay18" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay18">
<span<?php echo $ivf_stimulation_chart_view->CycleDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay19->Visible) { // CycleDay19 ?>
	<tr id="r_CycleDay19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay19"><script id="tpc_ivf_stimulation_chart_CycleDay19" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay19->caption() ?></script></span></td>
		<td data-name="CycleDay19" <?php echo $ivf_stimulation_chart_view->CycleDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay19" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay19">
<span<?php echo $ivf_stimulation_chart_view->CycleDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay20->Visible) { // CycleDay20 ?>
	<tr id="r_CycleDay20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay20"><script id="tpc_ivf_stimulation_chart_CycleDay20" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay20->caption() ?></script></span></td>
		<td data-name="CycleDay20" <?php echo $ivf_stimulation_chart_view->CycleDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay20" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay20">
<span<?php echo $ivf_stimulation_chart_view->CycleDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay21->Visible) { // CycleDay21 ?>
	<tr id="r_CycleDay21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay21"><script id="tpc_ivf_stimulation_chart_CycleDay21" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay21->caption() ?></script></span></td>
		<td data-name="CycleDay21" <?php echo $ivf_stimulation_chart_view->CycleDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay21" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay21">
<span<?php echo $ivf_stimulation_chart_view->CycleDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay22->Visible) { // CycleDay22 ?>
	<tr id="r_CycleDay22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay22"><script id="tpc_ivf_stimulation_chart_CycleDay22" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay22->caption() ?></script></span></td>
		<td data-name="CycleDay22" <?php echo $ivf_stimulation_chart_view->CycleDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay22" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay22">
<span<?php echo $ivf_stimulation_chart_view->CycleDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay23->Visible) { // CycleDay23 ?>
	<tr id="r_CycleDay23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay23"><script id="tpc_ivf_stimulation_chart_CycleDay23" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay23->caption() ?></script></span></td>
		<td data-name="CycleDay23" <?php echo $ivf_stimulation_chart_view->CycleDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay23" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay23">
<span<?php echo $ivf_stimulation_chart_view->CycleDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay24->Visible) { // CycleDay24 ?>
	<tr id="r_CycleDay24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay24"><script id="tpc_ivf_stimulation_chart_CycleDay24" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay24->caption() ?></script></span></td>
		<td data-name="CycleDay24" <?php echo $ivf_stimulation_chart_view->CycleDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay24" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay24">
<span<?php echo $ivf_stimulation_chart_view->CycleDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->CycleDay25->Visible) { // CycleDay25 ?>
	<tr id="r_CycleDay25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay25"><script id="tpc_ivf_stimulation_chart_CycleDay25" type="text/html"><?php echo $ivf_stimulation_chart_view->CycleDay25->caption() ?></script></span></td>
		<td data-name="CycleDay25" <?php echo $ivf_stimulation_chart_view->CycleDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay25" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay25">
<span<?php echo $ivf_stimulation_chart_view->CycleDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->CycleDay25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay14->Visible) { // StimulationDay14 ?>
	<tr id="r_StimulationDay14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14"><script id="tpc_ivf_stimulation_chart_StimulationDay14" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay14->caption() ?></script></span></td>
		<td data-name="StimulationDay14" <?php echo $ivf_stimulation_chart_view->StimulationDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay14" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay14">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay15->Visible) { // StimulationDay15 ?>
	<tr id="r_StimulationDay15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15"><script id="tpc_ivf_stimulation_chart_StimulationDay15" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay15->caption() ?></script></span></td>
		<td data-name="StimulationDay15" <?php echo $ivf_stimulation_chart_view->StimulationDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay15" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay15">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay16->Visible) { // StimulationDay16 ?>
	<tr id="r_StimulationDay16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16"><script id="tpc_ivf_stimulation_chart_StimulationDay16" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay16->caption() ?></script></span></td>
		<td data-name="StimulationDay16" <?php echo $ivf_stimulation_chart_view->StimulationDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay16" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay16">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay17->Visible) { // StimulationDay17 ?>
	<tr id="r_StimulationDay17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17"><script id="tpc_ivf_stimulation_chart_StimulationDay17" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay17->caption() ?></script></span></td>
		<td data-name="StimulationDay17" <?php echo $ivf_stimulation_chart_view->StimulationDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay17" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay17">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay18->Visible) { // StimulationDay18 ?>
	<tr id="r_StimulationDay18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18"><script id="tpc_ivf_stimulation_chart_StimulationDay18" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay18->caption() ?></script></span></td>
		<td data-name="StimulationDay18" <?php echo $ivf_stimulation_chart_view->StimulationDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay18" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay18">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay19->Visible) { // StimulationDay19 ?>
	<tr id="r_StimulationDay19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19"><script id="tpc_ivf_stimulation_chart_StimulationDay19" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay19->caption() ?></script></span></td>
		<td data-name="StimulationDay19" <?php echo $ivf_stimulation_chart_view->StimulationDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay19" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay19">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay20->Visible) { // StimulationDay20 ?>
	<tr id="r_StimulationDay20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20"><script id="tpc_ivf_stimulation_chart_StimulationDay20" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay20->caption() ?></script></span></td>
		<td data-name="StimulationDay20" <?php echo $ivf_stimulation_chart_view->StimulationDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay20" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay20">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay21->Visible) { // StimulationDay21 ?>
	<tr id="r_StimulationDay21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21"><script id="tpc_ivf_stimulation_chart_StimulationDay21" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay21->caption() ?></script></span></td>
		<td data-name="StimulationDay21" <?php echo $ivf_stimulation_chart_view->StimulationDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay21" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay21">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay22->Visible) { // StimulationDay22 ?>
	<tr id="r_StimulationDay22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22"><script id="tpc_ivf_stimulation_chart_StimulationDay22" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay22->caption() ?></script></span></td>
		<td data-name="StimulationDay22" <?php echo $ivf_stimulation_chart_view->StimulationDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay22" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay22">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay23->Visible) { // StimulationDay23 ?>
	<tr id="r_StimulationDay23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23"><script id="tpc_ivf_stimulation_chart_StimulationDay23" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay23->caption() ?></script></span></td>
		<td data-name="StimulationDay23" <?php echo $ivf_stimulation_chart_view->StimulationDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay23" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay23">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay24->Visible) { // StimulationDay24 ?>
	<tr id="r_StimulationDay24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24"><script id="tpc_ivf_stimulation_chart_StimulationDay24" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay24->caption() ?></script></span></td>
		<td data-name="StimulationDay24" <?php echo $ivf_stimulation_chart_view->StimulationDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay24" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay24">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->StimulationDay25->Visible) { // StimulationDay25 ?>
	<tr id="r_StimulationDay25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25"><script id="tpc_ivf_stimulation_chart_StimulationDay25" type="text/html"><?php echo $ivf_stimulation_chart_view->StimulationDay25->caption() ?></script></span></td>
		<td data-name="StimulationDay25" <?php echo $ivf_stimulation_chart_view->StimulationDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay25" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay25">
<span<?php echo $ivf_stimulation_chart_view->StimulationDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->StimulationDay25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet14->Visible) { // Tablet14 ?>
	<tr id="r_Tablet14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet14"><script id="tpc_ivf_stimulation_chart_Tablet14" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet14->caption() ?></script></span></td>
		<td data-name="Tablet14" <?php echo $ivf_stimulation_chart_view->Tablet14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet14" type="text/html"><span id="el_ivf_stimulation_chart_Tablet14">
<span<?php echo $ivf_stimulation_chart_view->Tablet14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet15->Visible) { // Tablet15 ?>
	<tr id="r_Tablet15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet15"><script id="tpc_ivf_stimulation_chart_Tablet15" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet15->caption() ?></script></span></td>
		<td data-name="Tablet15" <?php echo $ivf_stimulation_chart_view->Tablet15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet15" type="text/html"><span id="el_ivf_stimulation_chart_Tablet15">
<span<?php echo $ivf_stimulation_chart_view->Tablet15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet16->Visible) { // Tablet16 ?>
	<tr id="r_Tablet16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet16"><script id="tpc_ivf_stimulation_chart_Tablet16" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet16->caption() ?></script></span></td>
		<td data-name="Tablet16" <?php echo $ivf_stimulation_chart_view->Tablet16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet16" type="text/html"><span id="el_ivf_stimulation_chart_Tablet16">
<span<?php echo $ivf_stimulation_chart_view->Tablet16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet17->Visible) { // Tablet17 ?>
	<tr id="r_Tablet17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet17"><script id="tpc_ivf_stimulation_chart_Tablet17" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet17->caption() ?></script></span></td>
		<td data-name="Tablet17" <?php echo $ivf_stimulation_chart_view->Tablet17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet17" type="text/html"><span id="el_ivf_stimulation_chart_Tablet17">
<span<?php echo $ivf_stimulation_chart_view->Tablet17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet18->Visible) { // Tablet18 ?>
	<tr id="r_Tablet18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet18"><script id="tpc_ivf_stimulation_chart_Tablet18" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet18->caption() ?></script></span></td>
		<td data-name="Tablet18" <?php echo $ivf_stimulation_chart_view->Tablet18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet18" type="text/html"><span id="el_ivf_stimulation_chart_Tablet18">
<span<?php echo $ivf_stimulation_chart_view->Tablet18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet19->Visible) { // Tablet19 ?>
	<tr id="r_Tablet19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet19"><script id="tpc_ivf_stimulation_chart_Tablet19" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet19->caption() ?></script></span></td>
		<td data-name="Tablet19" <?php echo $ivf_stimulation_chart_view->Tablet19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet19" type="text/html"><span id="el_ivf_stimulation_chart_Tablet19">
<span<?php echo $ivf_stimulation_chart_view->Tablet19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet20->Visible) { // Tablet20 ?>
	<tr id="r_Tablet20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet20"><script id="tpc_ivf_stimulation_chart_Tablet20" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet20->caption() ?></script></span></td>
		<td data-name="Tablet20" <?php echo $ivf_stimulation_chart_view->Tablet20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet20" type="text/html"><span id="el_ivf_stimulation_chart_Tablet20">
<span<?php echo $ivf_stimulation_chart_view->Tablet20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet21->Visible) { // Tablet21 ?>
	<tr id="r_Tablet21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet21"><script id="tpc_ivf_stimulation_chart_Tablet21" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet21->caption() ?></script></span></td>
		<td data-name="Tablet21" <?php echo $ivf_stimulation_chart_view->Tablet21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet21" type="text/html"><span id="el_ivf_stimulation_chart_Tablet21">
<span<?php echo $ivf_stimulation_chart_view->Tablet21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet22->Visible) { // Tablet22 ?>
	<tr id="r_Tablet22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet22"><script id="tpc_ivf_stimulation_chart_Tablet22" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet22->caption() ?></script></span></td>
		<td data-name="Tablet22" <?php echo $ivf_stimulation_chart_view->Tablet22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet22" type="text/html"><span id="el_ivf_stimulation_chart_Tablet22">
<span<?php echo $ivf_stimulation_chart_view->Tablet22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet23->Visible) { // Tablet23 ?>
	<tr id="r_Tablet23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet23"><script id="tpc_ivf_stimulation_chart_Tablet23" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet23->caption() ?></script></span></td>
		<td data-name="Tablet23" <?php echo $ivf_stimulation_chart_view->Tablet23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet23" type="text/html"><span id="el_ivf_stimulation_chart_Tablet23">
<span<?php echo $ivf_stimulation_chart_view->Tablet23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet24->Visible) { // Tablet24 ?>
	<tr id="r_Tablet24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet24"><script id="tpc_ivf_stimulation_chart_Tablet24" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet24->caption() ?></script></span></td>
		<td data-name="Tablet24" <?php echo $ivf_stimulation_chart_view->Tablet24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet24" type="text/html"><span id="el_ivf_stimulation_chart_Tablet24">
<span<?php echo $ivf_stimulation_chart_view->Tablet24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Tablet25->Visible) { // Tablet25 ?>
	<tr id="r_Tablet25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet25"><script id="tpc_ivf_stimulation_chart_Tablet25" type="text/html"><?php echo $ivf_stimulation_chart_view->Tablet25->caption() ?></script></span></td>
		<td data-name="Tablet25" <?php echo $ivf_stimulation_chart_view->Tablet25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet25" type="text/html"><span id="el_ivf_stimulation_chart_Tablet25">
<span<?php echo $ivf_stimulation_chart_view->Tablet25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Tablet25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH14->Visible) { // RFSH14 ?>
	<tr id="r_RFSH14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH14"><script id="tpc_ivf_stimulation_chart_RFSH14" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH14->caption() ?></script></span></td>
		<td data-name="RFSH14" <?php echo $ivf_stimulation_chart_view->RFSH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH14" type="text/html"><span id="el_ivf_stimulation_chart_RFSH14">
<span<?php echo $ivf_stimulation_chart_view->RFSH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH15->Visible) { // RFSH15 ?>
	<tr id="r_RFSH15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH15"><script id="tpc_ivf_stimulation_chart_RFSH15" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH15->caption() ?></script></span></td>
		<td data-name="RFSH15" <?php echo $ivf_stimulation_chart_view->RFSH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH15" type="text/html"><span id="el_ivf_stimulation_chart_RFSH15">
<span<?php echo $ivf_stimulation_chart_view->RFSH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH16->Visible) { // RFSH16 ?>
	<tr id="r_RFSH16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH16"><script id="tpc_ivf_stimulation_chart_RFSH16" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH16->caption() ?></script></span></td>
		<td data-name="RFSH16" <?php echo $ivf_stimulation_chart_view->RFSH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH16" type="text/html"><span id="el_ivf_stimulation_chart_RFSH16">
<span<?php echo $ivf_stimulation_chart_view->RFSH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH17->Visible) { // RFSH17 ?>
	<tr id="r_RFSH17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH17"><script id="tpc_ivf_stimulation_chart_RFSH17" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH17->caption() ?></script></span></td>
		<td data-name="RFSH17" <?php echo $ivf_stimulation_chart_view->RFSH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH17" type="text/html"><span id="el_ivf_stimulation_chart_RFSH17">
<span<?php echo $ivf_stimulation_chart_view->RFSH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH18->Visible) { // RFSH18 ?>
	<tr id="r_RFSH18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH18"><script id="tpc_ivf_stimulation_chart_RFSH18" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH18->caption() ?></script></span></td>
		<td data-name="RFSH18" <?php echo $ivf_stimulation_chart_view->RFSH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH18" type="text/html"><span id="el_ivf_stimulation_chart_RFSH18">
<span<?php echo $ivf_stimulation_chart_view->RFSH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH19->Visible) { // RFSH19 ?>
	<tr id="r_RFSH19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH19"><script id="tpc_ivf_stimulation_chart_RFSH19" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH19->caption() ?></script></span></td>
		<td data-name="RFSH19" <?php echo $ivf_stimulation_chart_view->RFSH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH19" type="text/html"><span id="el_ivf_stimulation_chart_RFSH19">
<span<?php echo $ivf_stimulation_chart_view->RFSH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH20->Visible) { // RFSH20 ?>
	<tr id="r_RFSH20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH20"><script id="tpc_ivf_stimulation_chart_RFSH20" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH20->caption() ?></script></span></td>
		<td data-name="RFSH20" <?php echo $ivf_stimulation_chart_view->RFSH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH20" type="text/html"><span id="el_ivf_stimulation_chart_RFSH20">
<span<?php echo $ivf_stimulation_chart_view->RFSH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH21->Visible) { // RFSH21 ?>
	<tr id="r_RFSH21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH21"><script id="tpc_ivf_stimulation_chart_RFSH21" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH21->caption() ?></script></span></td>
		<td data-name="RFSH21" <?php echo $ivf_stimulation_chart_view->RFSH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH21" type="text/html"><span id="el_ivf_stimulation_chart_RFSH21">
<span<?php echo $ivf_stimulation_chart_view->RFSH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH22->Visible) { // RFSH22 ?>
	<tr id="r_RFSH22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH22"><script id="tpc_ivf_stimulation_chart_RFSH22" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH22->caption() ?></script></span></td>
		<td data-name="RFSH22" <?php echo $ivf_stimulation_chart_view->RFSH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH22" type="text/html"><span id="el_ivf_stimulation_chart_RFSH22">
<span<?php echo $ivf_stimulation_chart_view->RFSH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH23->Visible) { // RFSH23 ?>
	<tr id="r_RFSH23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH23"><script id="tpc_ivf_stimulation_chart_RFSH23" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH23->caption() ?></script></span></td>
		<td data-name="RFSH23" <?php echo $ivf_stimulation_chart_view->RFSH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH23" type="text/html"><span id="el_ivf_stimulation_chart_RFSH23">
<span<?php echo $ivf_stimulation_chart_view->RFSH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH24->Visible) { // RFSH24 ?>
	<tr id="r_RFSH24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH24"><script id="tpc_ivf_stimulation_chart_RFSH24" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH24->caption() ?></script></span></td>
		<td data-name="RFSH24" <?php echo $ivf_stimulation_chart_view->RFSH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH24" type="text/html"><span id="el_ivf_stimulation_chart_RFSH24">
<span<?php echo $ivf_stimulation_chart_view->RFSH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->RFSH25->Visible) { // RFSH25 ?>
	<tr id="r_RFSH25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH25"><script id="tpc_ivf_stimulation_chart_RFSH25" type="text/html"><?php echo $ivf_stimulation_chart_view->RFSH25->caption() ?></script></span></td>
		<td data-name="RFSH25" <?php echo $ivf_stimulation_chart_view->RFSH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH25" type="text/html"><span id="el_ivf_stimulation_chart_RFSH25">
<span<?php echo $ivf_stimulation_chart_view->RFSH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->RFSH25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG14->Visible) { // HMG14 ?>
	<tr id="r_HMG14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG14"><script id="tpc_ivf_stimulation_chart_HMG14" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG14->caption() ?></script></span></td>
		<td data-name="HMG14" <?php echo $ivf_stimulation_chart_view->HMG14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG14" type="text/html"><span id="el_ivf_stimulation_chart_HMG14">
<span<?php echo $ivf_stimulation_chart_view->HMG14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG15->Visible) { // HMG15 ?>
	<tr id="r_HMG15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG15"><script id="tpc_ivf_stimulation_chart_HMG15" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG15->caption() ?></script></span></td>
		<td data-name="HMG15" <?php echo $ivf_stimulation_chart_view->HMG15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG15" type="text/html"><span id="el_ivf_stimulation_chart_HMG15">
<span<?php echo $ivf_stimulation_chart_view->HMG15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG16->Visible) { // HMG16 ?>
	<tr id="r_HMG16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG16"><script id="tpc_ivf_stimulation_chart_HMG16" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG16->caption() ?></script></span></td>
		<td data-name="HMG16" <?php echo $ivf_stimulation_chart_view->HMG16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG16" type="text/html"><span id="el_ivf_stimulation_chart_HMG16">
<span<?php echo $ivf_stimulation_chart_view->HMG16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG17->Visible) { // HMG17 ?>
	<tr id="r_HMG17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG17"><script id="tpc_ivf_stimulation_chart_HMG17" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG17->caption() ?></script></span></td>
		<td data-name="HMG17" <?php echo $ivf_stimulation_chart_view->HMG17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG17" type="text/html"><span id="el_ivf_stimulation_chart_HMG17">
<span<?php echo $ivf_stimulation_chart_view->HMG17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG18->Visible) { // HMG18 ?>
	<tr id="r_HMG18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG18"><script id="tpc_ivf_stimulation_chart_HMG18" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG18->caption() ?></script></span></td>
		<td data-name="HMG18" <?php echo $ivf_stimulation_chart_view->HMG18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG18" type="text/html"><span id="el_ivf_stimulation_chart_HMG18">
<span<?php echo $ivf_stimulation_chart_view->HMG18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG19->Visible) { // HMG19 ?>
	<tr id="r_HMG19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG19"><script id="tpc_ivf_stimulation_chart_HMG19" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG19->caption() ?></script></span></td>
		<td data-name="HMG19" <?php echo $ivf_stimulation_chart_view->HMG19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG19" type="text/html"><span id="el_ivf_stimulation_chart_HMG19">
<span<?php echo $ivf_stimulation_chart_view->HMG19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG20->Visible) { // HMG20 ?>
	<tr id="r_HMG20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG20"><script id="tpc_ivf_stimulation_chart_HMG20" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG20->caption() ?></script></span></td>
		<td data-name="HMG20" <?php echo $ivf_stimulation_chart_view->HMG20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG20" type="text/html"><span id="el_ivf_stimulation_chart_HMG20">
<span<?php echo $ivf_stimulation_chart_view->HMG20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG21->Visible) { // HMG21 ?>
	<tr id="r_HMG21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG21"><script id="tpc_ivf_stimulation_chart_HMG21" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG21->caption() ?></script></span></td>
		<td data-name="HMG21" <?php echo $ivf_stimulation_chart_view->HMG21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG21" type="text/html"><span id="el_ivf_stimulation_chart_HMG21">
<span<?php echo $ivf_stimulation_chart_view->HMG21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG22->Visible) { // HMG22 ?>
	<tr id="r_HMG22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG22"><script id="tpc_ivf_stimulation_chart_HMG22" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG22->caption() ?></script></span></td>
		<td data-name="HMG22" <?php echo $ivf_stimulation_chart_view->HMG22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG22" type="text/html"><span id="el_ivf_stimulation_chart_HMG22">
<span<?php echo $ivf_stimulation_chart_view->HMG22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG23->Visible) { // HMG23 ?>
	<tr id="r_HMG23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG23"><script id="tpc_ivf_stimulation_chart_HMG23" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG23->caption() ?></script></span></td>
		<td data-name="HMG23" <?php echo $ivf_stimulation_chart_view->HMG23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG23" type="text/html"><span id="el_ivf_stimulation_chart_HMG23">
<span<?php echo $ivf_stimulation_chart_view->HMG23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG24->Visible) { // HMG24 ?>
	<tr id="r_HMG24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG24"><script id="tpc_ivf_stimulation_chart_HMG24" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG24->caption() ?></script></span></td>
		<td data-name="HMG24" <?php echo $ivf_stimulation_chart_view->HMG24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG24" type="text/html"><span id="el_ivf_stimulation_chart_HMG24">
<span<?php echo $ivf_stimulation_chart_view->HMG24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HMG25->Visible) { // HMG25 ?>
	<tr id="r_HMG25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG25"><script id="tpc_ivf_stimulation_chart_HMG25" type="text/html"><?php echo $ivf_stimulation_chart_view->HMG25->caption() ?></script></span></td>
		<td data-name="HMG25" <?php echo $ivf_stimulation_chart_view->HMG25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG25" type="text/html"><span id="el_ivf_stimulation_chart_HMG25">
<span<?php echo $ivf_stimulation_chart_view->HMG25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HMG25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH14->Visible) { // GnRH14 ?>
	<tr id="r_GnRH14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH14"><script id="tpc_ivf_stimulation_chart_GnRH14" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH14->caption() ?></script></span></td>
		<td data-name="GnRH14" <?php echo $ivf_stimulation_chart_view->GnRH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH14" type="text/html"><span id="el_ivf_stimulation_chart_GnRH14">
<span<?php echo $ivf_stimulation_chart_view->GnRH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH15->Visible) { // GnRH15 ?>
	<tr id="r_GnRH15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH15"><script id="tpc_ivf_stimulation_chart_GnRH15" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH15->caption() ?></script></span></td>
		<td data-name="GnRH15" <?php echo $ivf_stimulation_chart_view->GnRH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH15" type="text/html"><span id="el_ivf_stimulation_chart_GnRH15">
<span<?php echo $ivf_stimulation_chart_view->GnRH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH16->Visible) { // GnRH16 ?>
	<tr id="r_GnRH16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH16"><script id="tpc_ivf_stimulation_chart_GnRH16" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH16->caption() ?></script></span></td>
		<td data-name="GnRH16" <?php echo $ivf_stimulation_chart_view->GnRH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH16" type="text/html"><span id="el_ivf_stimulation_chart_GnRH16">
<span<?php echo $ivf_stimulation_chart_view->GnRH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH17->Visible) { // GnRH17 ?>
	<tr id="r_GnRH17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH17"><script id="tpc_ivf_stimulation_chart_GnRH17" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH17->caption() ?></script></span></td>
		<td data-name="GnRH17" <?php echo $ivf_stimulation_chart_view->GnRH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH17" type="text/html"><span id="el_ivf_stimulation_chart_GnRH17">
<span<?php echo $ivf_stimulation_chart_view->GnRH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH18->Visible) { // GnRH18 ?>
	<tr id="r_GnRH18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH18"><script id="tpc_ivf_stimulation_chart_GnRH18" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH18->caption() ?></script></span></td>
		<td data-name="GnRH18" <?php echo $ivf_stimulation_chart_view->GnRH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH18" type="text/html"><span id="el_ivf_stimulation_chart_GnRH18">
<span<?php echo $ivf_stimulation_chart_view->GnRH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH19->Visible) { // GnRH19 ?>
	<tr id="r_GnRH19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH19"><script id="tpc_ivf_stimulation_chart_GnRH19" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH19->caption() ?></script></span></td>
		<td data-name="GnRH19" <?php echo $ivf_stimulation_chart_view->GnRH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH19" type="text/html"><span id="el_ivf_stimulation_chart_GnRH19">
<span<?php echo $ivf_stimulation_chart_view->GnRH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH20->Visible) { // GnRH20 ?>
	<tr id="r_GnRH20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH20"><script id="tpc_ivf_stimulation_chart_GnRH20" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH20->caption() ?></script></span></td>
		<td data-name="GnRH20" <?php echo $ivf_stimulation_chart_view->GnRH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH20" type="text/html"><span id="el_ivf_stimulation_chart_GnRH20">
<span<?php echo $ivf_stimulation_chart_view->GnRH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH21->Visible) { // GnRH21 ?>
	<tr id="r_GnRH21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH21"><script id="tpc_ivf_stimulation_chart_GnRH21" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH21->caption() ?></script></span></td>
		<td data-name="GnRH21" <?php echo $ivf_stimulation_chart_view->GnRH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH21" type="text/html"><span id="el_ivf_stimulation_chart_GnRH21">
<span<?php echo $ivf_stimulation_chart_view->GnRH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH22->Visible) { // GnRH22 ?>
	<tr id="r_GnRH22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH22"><script id="tpc_ivf_stimulation_chart_GnRH22" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH22->caption() ?></script></span></td>
		<td data-name="GnRH22" <?php echo $ivf_stimulation_chart_view->GnRH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH22" type="text/html"><span id="el_ivf_stimulation_chart_GnRH22">
<span<?php echo $ivf_stimulation_chart_view->GnRH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH23->Visible) { // GnRH23 ?>
	<tr id="r_GnRH23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH23"><script id="tpc_ivf_stimulation_chart_GnRH23" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH23->caption() ?></script></span></td>
		<td data-name="GnRH23" <?php echo $ivf_stimulation_chart_view->GnRH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH23" type="text/html"><span id="el_ivf_stimulation_chart_GnRH23">
<span<?php echo $ivf_stimulation_chart_view->GnRH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH24->Visible) { // GnRH24 ?>
	<tr id="r_GnRH24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH24"><script id="tpc_ivf_stimulation_chart_GnRH24" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH24->caption() ?></script></span></td>
		<td data-name="GnRH24" <?php echo $ivf_stimulation_chart_view->GnRH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH24" type="text/html"><span id="el_ivf_stimulation_chart_GnRH24">
<span<?php echo $ivf_stimulation_chart_view->GnRH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->GnRH25->Visible) { // GnRH25 ?>
	<tr id="r_GnRH25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH25"><script id="tpc_ivf_stimulation_chart_GnRH25" type="text/html"><?php echo $ivf_stimulation_chart_view->GnRH25->caption() ?></script></span></td>
		<td data-name="GnRH25" <?php echo $ivf_stimulation_chart_view->GnRH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH25" type="text/html"><span id="el_ivf_stimulation_chart_GnRH25">
<span<?php echo $ivf_stimulation_chart_view->GnRH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->GnRH25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P414->Visible) { // P414 ?>
	<tr id="r_P414">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P414"><script id="tpc_ivf_stimulation_chart_P414" type="text/html"><?php echo $ivf_stimulation_chart_view->P414->caption() ?></script></span></td>
		<td data-name="P414" <?php echo $ivf_stimulation_chart_view->P414->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P414" type="text/html"><span id="el_ivf_stimulation_chart_P414">
<span<?php echo $ivf_stimulation_chart_view->P414->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P414->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P415->Visible) { // P415 ?>
	<tr id="r_P415">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P415"><script id="tpc_ivf_stimulation_chart_P415" type="text/html"><?php echo $ivf_stimulation_chart_view->P415->caption() ?></script></span></td>
		<td data-name="P415" <?php echo $ivf_stimulation_chart_view->P415->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P415" type="text/html"><span id="el_ivf_stimulation_chart_P415">
<span<?php echo $ivf_stimulation_chart_view->P415->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P415->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P416->Visible) { // P416 ?>
	<tr id="r_P416">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P416"><script id="tpc_ivf_stimulation_chart_P416" type="text/html"><?php echo $ivf_stimulation_chart_view->P416->caption() ?></script></span></td>
		<td data-name="P416" <?php echo $ivf_stimulation_chart_view->P416->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P416" type="text/html"><span id="el_ivf_stimulation_chart_P416">
<span<?php echo $ivf_stimulation_chart_view->P416->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P416->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P417->Visible) { // P417 ?>
	<tr id="r_P417">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P417"><script id="tpc_ivf_stimulation_chart_P417" type="text/html"><?php echo $ivf_stimulation_chart_view->P417->caption() ?></script></span></td>
		<td data-name="P417" <?php echo $ivf_stimulation_chart_view->P417->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P417" type="text/html"><span id="el_ivf_stimulation_chart_P417">
<span<?php echo $ivf_stimulation_chart_view->P417->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P417->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P418->Visible) { // P418 ?>
	<tr id="r_P418">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P418"><script id="tpc_ivf_stimulation_chart_P418" type="text/html"><?php echo $ivf_stimulation_chart_view->P418->caption() ?></script></span></td>
		<td data-name="P418" <?php echo $ivf_stimulation_chart_view->P418->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P418" type="text/html"><span id="el_ivf_stimulation_chart_P418">
<span<?php echo $ivf_stimulation_chart_view->P418->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P418->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P419->Visible) { // P419 ?>
	<tr id="r_P419">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P419"><script id="tpc_ivf_stimulation_chart_P419" type="text/html"><?php echo $ivf_stimulation_chart_view->P419->caption() ?></script></span></td>
		<td data-name="P419" <?php echo $ivf_stimulation_chart_view->P419->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P419" type="text/html"><span id="el_ivf_stimulation_chart_P419">
<span<?php echo $ivf_stimulation_chart_view->P419->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P419->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P420->Visible) { // P420 ?>
	<tr id="r_P420">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P420"><script id="tpc_ivf_stimulation_chart_P420" type="text/html"><?php echo $ivf_stimulation_chart_view->P420->caption() ?></script></span></td>
		<td data-name="P420" <?php echo $ivf_stimulation_chart_view->P420->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P420" type="text/html"><span id="el_ivf_stimulation_chart_P420">
<span<?php echo $ivf_stimulation_chart_view->P420->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P420->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P421->Visible) { // P421 ?>
	<tr id="r_P421">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P421"><script id="tpc_ivf_stimulation_chart_P421" type="text/html"><?php echo $ivf_stimulation_chart_view->P421->caption() ?></script></span></td>
		<td data-name="P421" <?php echo $ivf_stimulation_chart_view->P421->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P421" type="text/html"><span id="el_ivf_stimulation_chart_P421">
<span<?php echo $ivf_stimulation_chart_view->P421->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P421->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P422->Visible) { // P422 ?>
	<tr id="r_P422">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P422"><script id="tpc_ivf_stimulation_chart_P422" type="text/html"><?php echo $ivf_stimulation_chart_view->P422->caption() ?></script></span></td>
		<td data-name="P422" <?php echo $ivf_stimulation_chart_view->P422->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P422" type="text/html"><span id="el_ivf_stimulation_chart_P422">
<span<?php echo $ivf_stimulation_chart_view->P422->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P422->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P423->Visible) { // P423 ?>
	<tr id="r_P423">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P423"><script id="tpc_ivf_stimulation_chart_P423" type="text/html"><?php echo $ivf_stimulation_chart_view->P423->caption() ?></script></span></td>
		<td data-name="P423" <?php echo $ivf_stimulation_chart_view->P423->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P423" type="text/html"><span id="el_ivf_stimulation_chart_P423">
<span<?php echo $ivf_stimulation_chart_view->P423->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P423->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P424->Visible) { // P424 ?>
	<tr id="r_P424">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P424"><script id="tpc_ivf_stimulation_chart_P424" type="text/html"><?php echo $ivf_stimulation_chart_view->P424->caption() ?></script></span></td>
		<td data-name="P424" <?php echo $ivf_stimulation_chart_view->P424->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P424" type="text/html"><span id="el_ivf_stimulation_chart_P424">
<span<?php echo $ivf_stimulation_chart_view->P424->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P424->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->P425->Visible) { // P425 ?>
	<tr id="r_P425">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P425"><script id="tpc_ivf_stimulation_chart_P425" type="text/html"><?php echo $ivf_stimulation_chart_view->P425->caption() ?></script></span></td>
		<td data-name="P425" <?php echo $ivf_stimulation_chart_view->P425->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P425" type="text/html"><span id="el_ivf_stimulation_chart_P425">
<span<?php echo $ivf_stimulation_chart_view->P425->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->P425->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt14->Visible) { // USGRt14 ?>
	<tr id="r_USGRt14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt14"><script id="tpc_ivf_stimulation_chart_USGRt14" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt14->caption() ?></script></span></td>
		<td data-name="USGRt14" <?php echo $ivf_stimulation_chart_view->USGRt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt14" type="text/html"><span id="el_ivf_stimulation_chart_USGRt14">
<span<?php echo $ivf_stimulation_chart_view->USGRt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt15->Visible) { // USGRt15 ?>
	<tr id="r_USGRt15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt15"><script id="tpc_ivf_stimulation_chart_USGRt15" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt15->caption() ?></script></span></td>
		<td data-name="USGRt15" <?php echo $ivf_stimulation_chart_view->USGRt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt15" type="text/html"><span id="el_ivf_stimulation_chart_USGRt15">
<span<?php echo $ivf_stimulation_chart_view->USGRt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt16->Visible) { // USGRt16 ?>
	<tr id="r_USGRt16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt16"><script id="tpc_ivf_stimulation_chart_USGRt16" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt16->caption() ?></script></span></td>
		<td data-name="USGRt16" <?php echo $ivf_stimulation_chart_view->USGRt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt16" type="text/html"><span id="el_ivf_stimulation_chart_USGRt16">
<span<?php echo $ivf_stimulation_chart_view->USGRt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt17->Visible) { // USGRt17 ?>
	<tr id="r_USGRt17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt17"><script id="tpc_ivf_stimulation_chart_USGRt17" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt17->caption() ?></script></span></td>
		<td data-name="USGRt17" <?php echo $ivf_stimulation_chart_view->USGRt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt17" type="text/html"><span id="el_ivf_stimulation_chart_USGRt17">
<span<?php echo $ivf_stimulation_chart_view->USGRt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt18->Visible) { // USGRt18 ?>
	<tr id="r_USGRt18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt18"><script id="tpc_ivf_stimulation_chart_USGRt18" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt18->caption() ?></script></span></td>
		<td data-name="USGRt18" <?php echo $ivf_stimulation_chart_view->USGRt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt18" type="text/html"><span id="el_ivf_stimulation_chart_USGRt18">
<span<?php echo $ivf_stimulation_chart_view->USGRt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt19->Visible) { // USGRt19 ?>
	<tr id="r_USGRt19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt19"><script id="tpc_ivf_stimulation_chart_USGRt19" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt19->caption() ?></script></span></td>
		<td data-name="USGRt19" <?php echo $ivf_stimulation_chart_view->USGRt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt19" type="text/html"><span id="el_ivf_stimulation_chart_USGRt19">
<span<?php echo $ivf_stimulation_chart_view->USGRt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt20->Visible) { // USGRt20 ?>
	<tr id="r_USGRt20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt20"><script id="tpc_ivf_stimulation_chart_USGRt20" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt20->caption() ?></script></span></td>
		<td data-name="USGRt20" <?php echo $ivf_stimulation_chart_view->USGRt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt20" type="text/html"><span id="el_ivf_stimulation_chart_USGRt20">
<span<?php echo $ivf_stimulation_chart_view->USGRt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt21->Visible) { // USGRt21 ?>
	<tr id="r_USGRt21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt21"><script id="tpc_ivf_stimulation_chart_USGRt21" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt21->caption() ?></script></span></td>
		<td data-name="USGRt21" <?php echo $ivf_stimulation_chart_view->USGRt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt21" type="text/html"><span id="el_ivf_stimulation_chart_USGRt21">
<span<?php echo $ivf_stimulation_chart_view->USGRt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt22->Visible) { // USGRt22 ?>
	<tr id="r_USGRt22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt22"><script id="tpc_ivf_stimulation_chart_USGRt22" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt22->caption() ?></script></span></td>
		<td data-name="USGRt22" <?php echo $ivf_stimulation_chart_view->USGRt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt22" type="text/html"><span id="el_ivf_stimulation_chart_USGRt22">
<span<?php echo $ivf_stimulation_chart_view->USGRt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt23->Visible) { // USGRt23 ?>
	<tr id="r_USGRt23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt23"><script id="tpc_ivf_stimulation_chart_USGRt23" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt23->caption() ?></script></span></td>
		<td data-name="USGRt23" <?php echo $ivf_stimulation_chart_view->USGRt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt23" type="text/html"><span id="el_ivf_stimulation_chart_USGRt23">
<span<?php echo $ivf_stimulation_chart_view->USGRt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt24->Visible) { // USGRt24 ?>
	<tr id="r_USGRt24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt24"><script id="tpc_ivf_stimulation_chart_USGRt24" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt24->caption() ?></script></span></td>
		<td data-name="USGRt24" <?php echo $ivf_stimulation_chart_view->USGRt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt24" type="text/html"><span id="el_ivf_stimulation_chart_USGRt24">
<span<?php echo $ivf_stimulation_chart_view->USGRt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGRt25->Visible) { // USGRt25 ?>
	<tr id="r_USGRt25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt25"><script id="tpc_ivf_stimulation_chart_USGRt25" type="text/html"><?php echo $ivf_stimulation_chart_view->USGRt25->caption() ?></script></span></td>
		<td data-name="USGRt25" <?php echo $ivf_stimulation_chart_view->USGRt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt25" type="text/html"><span id="el_ivf_stimulation_chart_USGRt25">
<span<?php echo $ivf_stimulation_chart_view->USGRt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGRt25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt14->Visible) { // USGLt14 ?>
	<tr id="r_USGLt14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt14"><script id="tpc_ivf_stimulation_chart_USGLt14" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt14->caption() ?></script></span></td>
		<td data-name="USGLt14" <?php echo $ivf_stimulation_chart_view->USGLt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt14" type="text/html"><span id="el_ivf_stimulation_chart_USGLt14">
<span<?php echo $ivf_stimulation_chart_view->USGLt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt15->Visible) { // USGLt15 ?>
	<tr id="r_USGLt15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt15"><script id="tpc_ivf_stimulation_chart_USGLt15" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt15->caption() ?></script></span></td>
		<td data-name="USGLt15" <?php echo $ivf_stimulation_chart_view->USGLt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt15" type="text/html"><span id="el_ivf_stimulation_chart_USGLt15">
<span<?php echo $ivf_stimulation_chart_view->USGLt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt16->Visible) { // USGLt16 ?>
	<tr id="r_USGLt16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt16"><script id="tpc_ivf_stimulation_chart_USGLt16" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt16->caption() ?></script></span></td>
		<td data-name="USGLt16" <?php echo $ivf_stimulation_chart_view->USGLt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt16" type="text/html"><span id="el_ivf_stimulation_chart_USGLt16">
<span<?php echo $ivf_stimulation_chart_view->USGLt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt17->Visible) { // USGLt17 ?>
	<tr id="r_USGLt17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt17"><script id="tpc_ivf_stimulation_chart_USGLt17" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt17->caption() ?></script></span></td>
		<td data-name="USGLt17" <?php echo $ivf_stimulation_chart_view->USGLt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt17" type="text/html"><span id="el_ivf_stimulation_chart_USGLt17">
<span<?php echo $ivf_stimulation_chart_view->USGLt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt18->Visible) { // USGLt18 ?>
	<tr id="r_USGLt18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt18"><script id="tpc_ivf_stimulation_chart_USGLt18" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt18->caption() ?></script></span></td>
		<td data-name="USGLt18" <?php echo $ivf_stimulation_chart_view->USGLt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt18" type="text/html"><span id="el_ivf_stimulation_chart_USGLt18">
<span<?php echo $ivf_stimulation_chart_view->USGLt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt19->Visible) { // USGLt19 ?>
	<tr id="r_USGLt19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt19"><script id="tpc_ivf_stimulation_chart_USGLt19" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt19->caption() ?></script></span></td>
		<td data-name="USGLt19" <?php echo $ivf_stimulation_chart_view->USGLt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt19" type="text/html"><span id="el_ivf_stimulation_chart_USGLt19">
<span<?php echo $ivf_stimulation_chart_view->USGLt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt20->Visible) { // USGLt20 ?>
	<tr id="r_USGLt20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt20"><script id="tpc_ivf_stimulation_chart_USGLt20" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt20->caption() ?></script></span></td>
		<td data-name="USGLt20" <?php echo $ivf_stimulation_chart_view->USGLt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt20" type="text/html"><span id="el_ivf_stimulation_chart_USGLt20">
<span<?php echo $ivf_stimulation_chart_view->USGLt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt21->Visible) { // USGLt21 ?>
	<tr id="r_USGLt21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt21"><script id="tpc_ivf_stimulation_chart_USGLt21" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt21->caption() ?></script></span></td>
		<td data-name="USGLt21" <?php echo $ivf_stimulation_chart_view->USGLt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt21" type="text/html"><span id="el_ivf_stimulation_chart_USGLt21">
<span<?php echo $ivf_stimulation_chart_view->USGLt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt22->Visible) { // USGLt22 ?>
	<tr id="r_USGLt22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt22"><script id="tpc_ivf_stimulation_chart_USGLt22" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt22->caption() ?></script></span></td>
		<td data-name="USGLt22" <?php echo $ivf_stimulation_chart_view->USGLt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt22" type="text/html"><span id="el_ivf_stimulation_chart_USGLt22">
<span<?php echo $ivf_stimulation_chart_view->USGLt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt23->Visible) { // USGLt23 ?>
	<tr id="r_USGLt23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt23"><script id="tpc_ivf_stimulation_chart_USGLt23" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt23->caption() ?></script></span></td>
		<td data-name="USGLt23" <?php echo $ivf_stimulation_chart_view->USGLt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt23" type="text/html"><span id="el_ivf_stimulation_chart_USGLt23">
<span<?php echo $ivf_stimulation_chart_view->USGLt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt24->Visible) { // USGLt24 ?>
	<tr id="r_USGLt24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt24"><script id="tpc_ivf_stimulation_chart_USGLt24" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt24->caption() ?></script></span></td>
		<td data-name="USGLt24" <?php echo $ivf_stimulation_chart_view->USGLt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt24" type="text/html"><span id="el_ivf_stimulation_chart_USGLt24">
<span<?php echo $ivf_stimulation_chart_view->USGLt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->USGLt25->Visible) { // USGLt25 ?>
	<tr id="r_USGLt25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt25"><script id="tpc_ivf_stimulation_chart_USGLt25" type="text/html"><?php echo $ivf_stimulation_chart_view->USGLt25->caption() ?></script></span></td>
		<td data-name="USGLt25" <?php echo $ivf_stimulation_chart_view->USGLt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt25" type="text/html"><span id="el_ivf_stimulation_chart_USGLt25">
<span<?php echo $ivf_stimulation_chart_view->USGLt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->USGLt25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM14->Visible) { // EM14 ?>
	<tr id="r_EM14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM14"><script id="tpc_ivf_stimulation_chart_EM14" type="text/html"><?php echo $ivf_stimulation_chart_view->EM14->caption() ?></script></span></td>
		<td data-name="EM14" <?php echo $ivf_stimulation_chart_view->EM14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM14" type="text/html"><span id="el_ivf_stimulation_chart_EM14">
<span<?php echo $ivf_stimulation_chart_view->EM14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM15->Visible) { // EM15 ?>
	<tr id="r_EM15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM15"><script id="tpc_ivf_stimulation_chart_EM15" type="text/html"><?php echo $ivf_stimulation_chart_view->EM15->caption() ?></script></span></td>
		<td data-name="EM15" <?php echo $ivf_stimulation_chart_view->EM15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM15" type="text/html"><span id="el_ivf_stimulation_chart_EM15">
<span<?php echo $ivf_stimulation_chart_view->EM15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM16->Visible) { // EM16 ?>
	<tr id="r_EM16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM16"><script id="tpc_ivf_stimulation_chart_EM16" type="text/html"><?php echo $ivf_stimulation_chart_view->EM16->caption() ?></script></span></td>
		<td data-name="EM16" <?php echo $ivf_stimulation_chart_view->EM16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM16" type="text/html"><span id="el_ivf_stimulation_chart_EM16">
<span<?php echo $ivf_stimulation_chart_view->EM16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM17->Visible) { // EM17 ?>
	<tr id="r_EM17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM17"><script id="tpc_ivf_stimulation_chart_EM17" type="text/html"><?php echo $ivf_stimulation_chart_view->EM17->caption() ?></script></span></td>
		<td data-name="EM17" <?php echo $ivf_stimulation_chart_view->EM17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM17" type="text/html"><span id="el_ivf_stimulation_chart_EM17">
<span<?php echo $ivf_stimulation_chart_view->EM17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM18->Visible) { // EM18 ?>
	<tr id="r_EM18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM18"><script id="tpc_ivf_stimulation_chart_EM18" type="text/html"><?php echo $ivf_stimulation_chart_view->EM18->caption() ?></script></span></td>
		<td data-name="EM18" <?php echo $ivf_stimulation_chart_view->EM18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM18" type="text/html"><span id="el_ivf_stimulation_chart_EM18">
<span<?php echo $ivf_stimulation_chart_view->EM18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM19->Visible) { // EM19 ?>
	<tr id="r_EM19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM19"><script id="tpc_ivf_stimulation_chart_EM19" type="text/html"><?php echo $ivf_stimulation_chart_view->EM19->caption() ?></script></span></td>
		<td data-name="EM19" <?php echo $ivf_stimulation_chart_view->EM19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM19" type="text/html"><span id="el_ivf_stimulation_chart_EM19">
<span<?php echo $ivf_stimulation_chart_view->EM19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM20->Visible) { // EM20 ?>
	<tr id="r_EM20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM20"><script id="tpc_ivf_stimulation_chart_EM20" type="text/html"><?php echo $ivf_stimulation_chart_view->EM20->caption() ?></script></span></td>
		<td data-name="EM20" <?php echo $ivf_stimulation_chart_view->EM20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM20" type="text/html"><span id="el_ivf_stimulation_chart_EM20">
<span<?php echo $ivf_stimulation_chart_view->EM20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM21->Visible) { // EM21 ?>
	<tr id="r_EM21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM21"><script id="tpc_ivf_stimulation_chart_EM21" type="text/html"><?php echo $ivf_stimulation_chart_view->EM21->caption() ?></script></span></td>
		<td data-name="EM21" <?php echo $ivf_stimulation_chart_view->EM21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM21" type="text/html"><span id="el_ivf_stimulation_chart_EM21">
<span<?php echo $ivf_stimulation_chart_view->EM21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM22->Visible) { // EM22 ?>
	<tr id="r_EM22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM22"><script id="tpc_ivf_stimulation_chart_EM22" type="text/html"><?php echo $ivf_stimulation_chart_view->EM22->caption() ?></script></span></td>
		<td data-name="EM22" <?php echo $ivf_stimulation_chart_view->EM22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM22" type="text/html"><span id="el_ivf_stimulation_chart_EM22">
<span<?php echo $ivf_stimulation_chart_view->EM22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM23->Visible) { // EM23 ?>
	<tr id="r_EM23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM23"><script id="tpc_ivf_stimulation_chart_EM23" type="text/html"><?php echo $ivf_stimulation_chart_view->EM23->caption() ?></script></span></td>
		<td data-name="EM23" <?php echo $ivf_stimulation_chart_view->EM23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM23" type="text/html"><span id="el_ivf_stimulation_chart_EM23">
<span<?php echo $ivf_stimulation_chart_view->EM23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM24->Visible) { // EM24 ?>
	<tr id="r_EM24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM24"><script id="tpc_ivf_stimulation_chart_EM24" type="text/html"><?php echo $ivf_stimulation_chart_view->EM24->caption() ?></script></span></td>
		<td data-name="EM24" <?php echo $ivf_stimulation_chart_view->EM24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM24" type="text/html"><span id="el_ivf_stimulation_chart_EM24">
<span<?php echo $ivf_stimulation_chart_view->EM24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EM25->Visible) { // EM25 ?>
	<tr id="r_EM25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM25"><script id="tpc_ivf_stimulation_chart_EM25" type="text/html"><?php echo $ivf_stimulation_chart_view->EM25->caption() ?></script></span></td>
		<td data-name="EM25" <?php echo $ivf_stimulation_chart_view->EM25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM25" type="text/html"><span id="el_ivf_stimulation_chart_EM25">
<span<?php echo $ivf_stimulation_chart_view->EM25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EM25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others14->Visible) { // Others14 ?>
	<tr id="r_Others14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others14"><script id="tpc_ivf_stimulation_chart_Others14" type="text/html"><?php echo $ivf_stimulation_chart_view->Others14->caption() ?></script></span></td>
		<td data-name="Others14" <?php echo $ivf_stimulation_chart_view->Others14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others14" type="text/html"><span id="el_ivf_stimulation_chart_Others14">
<span<?php echo $ivf_stimulation_chart_view->Others14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others15->Visible) { // Others15 ?>
	<tr id="r_Others15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others15"><script id="tpc_ivf_stimulation_chart_Others15" type="text/html"><?php echo $ivf_stimulation_chart_view->Others15->caption() ?></script></span></td>
		<td data-name="Others15" <?php echo $ivf_stimulation_chart_view->Others15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others15" type="text/html"><span id="el_ivf_stimulation_chart_Others15">
<span<?php echo $ivf_stimulation_chart_view->Others15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others16->Visible) { // Others16 ?>
	<tr id="r_Others16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others16"><script id="tpc_ivf_stimulation_chart_Others16" type="text/html"><?php echo $ivf_stimulation_chart_view->Others16->caption() ?></script></span></td>
		<td data-name="Others16" <?php echo $ivf_stimulation_chart_view->Others16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others16" type="text/html"><span id="el_ivf_stimulation_chart_Others16">
<span<?php echo $ivf_stimulation_chart_view->Others16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others17->Visible) { // Others17 ?>
	<tr id="r_Others17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others17"><script id="tpc_ivf_stimulation_chart_Others17" type="text/html"><?php echo $ivf_stimulation_chart_view->Others17->caption() ?></script></span></td>
		<td data-name="Others17" <?php echo $ivf_stimulation_chart_view->Others17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others17" type="text/html"><span id="el_ivf_stimulation_chart_Others17">
<span<?php echo $ivf_stimulation_chart_view->Others17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others18->Visible) { // Others18 ?>
	<tr id="r_Others18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others18"><script id="tpc_ivf_stimulation_chart_Others18" type="text/html"><?php echo $ivf_stimulation_chart_view->Others18->caption() ?></script></span></td>
		<td data-name="Others18" <?php echo $ivf_stimulation_chart_view->Others18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others18" type="text/html"><span id="el_ivf_stimulation_chart_Others18">
<span<?php echo $ivf_stimulation_chart_view->Others18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others19->Visible) { // Others19 ?>
	<tr id="r_Others19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others19"><script id="tpc_ivf_stimulation_chart_Others19" type="text/html"><?php echo $ivf_stimulation_chart_view->Others19->caption() ?></script></span></td>
		<td data-name="Others19" <?php echo $ivf_stimulation_chart_view->Others19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others19" type="text/html"><span id="el_ivf_stimulation_chart_Others19">
<span<?php echo $ivf_stimulation_chart_view->Others19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others20->Visible) { // Others20 ?>
	<tr id="r_Others20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others20"><script id="tpc_ivf_stimulation_chart_Others20" type="text/html"><?php echo $ivf_stimulation_chart_view->Others20->caption() ?></script></span></td>
		<td data-name="Others20" <?php echo $ivf_stimulation_chart_view->Others20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others20" type="text/html"><span id="el_ivf_stimulation_chart_Others20">
<span<?php echo $ivf_stimulation_chart_view->Others20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others21->Visible) { // Others21 ?>
	<tr id="r_Others21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others21"><script id="tpc_ivf_stimulation_chart_Others21" type="text/html"><?php echo $ivf_stimulation_chart_view->Others21->caption() ?></script></span></td>
		<td data-name="Others21" <?php echo $ivf_stimulation_chart_view->Others21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others21" type="text/html"><span id="el_ivf_stimulation_chart_Others21">
<span<?php echo $ivf_stimulation_chart_view->Others21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others22->Visible) { // Others22 ?>
	<tr id="r_Others22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others22"><script id="tpc_ivf_stimulation_chart_Others22" type="text/html"><?php echo $ivf_stimulation_chart_view->Others22->caption() ?></script></span></td>
		<td data-name="Others22" <?php echo $ivf_stimulation_chart_view->Others22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others22" type="text/html"><span id="el_ivf_stimulation_chart_Others22">
<span<?php echo $ivf_stimulation_chart_view->Others22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others23->Visible) { // Others23 ?>
	<tr id="r_Others23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others23"><script id="tpc_ivf_stimulation_chart_Others23" type="text/html"><?php echo $ivf_stimulation_chart_view->Others23->caption() ?></script></span></td>
		<td data-name="Others23" <?php echo $ivf_stimulation_chart_view->Others23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others23" type="text/html"><span id="el_ivf_stimulation_chart_Others23">
<span<?php echo $ivf_stimulation_chart_view->Others23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others24->Visible) { // Others24 ?>
	<tr id="r_Others24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others24"><script id="tpc_ivf_stimulation_chart_Others24" type="text/html"><?php echo $ivf_stimulation_chart_view->Others24->caption() ?></script></span></td>
		<td data-name="Others24" <?php echo $ivf_stimulation_chart_view->Others24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others24" type="text/html"><span id="el_ivf_stimulation_chart_Others24">
<span<?php echo $ivf_stimulation_chart_view->Others24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->Others25->Visible) { // Others25 ?>
	<tr id="r_Others25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others25"><script id="tpc_ivf_stimulation_chart_Others25" type="text/html"><?php echo $ivf_stimulation_chart_view->Others25->caption() ?></script></span></td>
		<td data-name="Others25" <?php echo $ivf_stimulation_chart_view->Others25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others25" type="text/html"><span id="el_ivf_stimulation_chart_Others25">
<span<?php echo $ivf_stimulation_chart_view->Others25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->Others25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR14->Visible) { // DR14 ?>
	<tr id="r_DR14">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR14"><script id="tpc_ivf_stimulation_chart_DR14" type="text/html"><?php echo $ivf_stimulation_chart_view->DR14->caption() ?></script></span></td>
		<td data-name="DR14" <?php echo $ivf_stimulation_chart_view->DR14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR14" type="text/html"><span id="el_ivf_stimulation_chart_DR14">
<span<?php echo $ivf_stimulation_chart_view->DR14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR14->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR15->Visible) { // DR15 ?>
	<tr id="r_DR15">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR15"><script id="tpc_ivf_stimulation_chart_DR15" type="text/html"><?php echo $ivf_stimulation_chart_view->DR15->caption() ?></script></span></td>
		<td data-name="DR15" <?php echo $ivf_stimulation_chart_view->DR15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR15" type="text/html"><span id="el_ivf_stimulation_chart_DR15">
<span<?php echo $ivf_stimulation_chart_view->DR15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR15->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR16->Visible) { // DR16 ?>
	<tr id="r_DR16">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR16"><script id="tpc_ivf_stimulation_chart_DR16" type="text/html"><?php echo $ivf_stimulation_chart_view->DR16->caption() ?></script></span></td>
		<td data-name="DR16" <?php echo $ivf_stimulation_chart_view->DR16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR16" type="text/html"><span id="el_ivf_stimulation_chart_DR16">
<span<?php echo $ivf_stimulation_chart_view->DR16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR16->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR17->Visible) { // DR17 ?>
	<tr id="r_DR17">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR17"><script id="tpc_ivf_stimulation_chart_DR17" type="text/html"><?php echo $ivf_stimulation_chart_view->DR17->caption() ?></script></span></td>
		<td data-name="DR17" <?php echo $ivf_stimulation_chart_view->DR17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR17" type="text/html"><span id="el_ivf_stimulation_chart_DR17">
<span<?php echo $ivf_stimulation_chart_view->DR17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR17->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR18->Visible) { // DR18 ?>
	<tr id="r_DR18">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR18"><script id="tpc_ivf_stimulation_chart_DR18" type="text/html"><?php echo $ivf_stimulation_chart_view->DR18->caption() ?></script></span></td>
		<td data-name="DR18" <?php echo $ivf_stimulation_chart_view->DR18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR18" type="text/html"><span id="el_ivf_stimulation_chart_DR18">
<span<?php echo $ivf_stimulation_chart_view->DR18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR18->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR19->Visible) { // DR19 ?>
	<tr id="r_DR19">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR19"><script id="tpc_ivf_stimulation_chart_DR19" type="text/html"><?php echo $ivf_stimulation_chart_view->DR19->caption() ?></script></span></td>
		<td data-name="DR19" <?php echo $ivf_stimulation_chart_view->DR19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR19" type="text/html"><span id="el_ivf_stimulation_chart_DR19">
<span<?php echo $ivf_stimulation_chart_view->DR19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR19->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR20->Visible) { // DR20 ?>
	<tr id="r_DR20">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR20"><script id="tpc_ivf_stimulation_chart_DR20" type="text/html"><?php echo $ivf_stimulation_chart_view->DR20->caption() ?></script></span></td>
		<td data-name="DR20" <?php echo $ivf_stimulation_chart_view->DR20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR20" type="text/html"><span id="el_ivf_stimulation_chart_DR20">
<span<?php echo $ivf_stimulation_chart_view->DR20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR20->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR21->Visible) { // DR21 ?>
	<tr id="r_DR21">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR21"><script id="tpc_ivf_stimulation_chart_DR21" type="text/html"><?php echo $ivf_stimulation_chart_view->DR21->caption() ?></script></span></td>
		<td data-name="DR21" <?php echo $ivf_stimulation_chart_view->DR21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR21" type="text/html"><span id="el_ivf_stimulation_chart_DR21">
<span<?php echo $ivf_stimulation_chart_view->DR21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR21->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR22->Visible) { // DR22 ?>
	<tr id="r_DR22">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR22"><script id="tpc_ivf_stimulation_chart_DR22" type="text/html"><?php echo $ivf_stimulation_chart_view->DR22->caption() ?></script></span></td>
		<td data-name="DR22" <?php echo $ivf_stimulation_chart_view->DR22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR22" type="text/html"><span id="el_ivf_stimulation_chart_DR22">
<span<?php echo $ivf_stimulation_chart_view->DR22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR22->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR23->Visible) { // DR23 ?>
	<tr id="r_DR23">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR23"><script id="tpc_ivf_stimulation_chart_DR23" type="text/html"><?php echo $ivf_stimulation_chart_view->DR23->caption() ?></script></span></td>
		<td data-name="DR23" <?php echo $ivf_stimulation_chart_view->DR23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR23" type="text/html"><span id="el_ivf_stimulation_chart_DR23">
<span<?php echo $ivf_stimulation_chart_view->DR23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR23->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR24->Visible) { // DR24 ?>
	<tr id="r_DR24">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR24"><script id="tpc_ivf_stimulation_chart_DR24" type="text/html"><?php echo $ivf_stimulation_chart_view->DR24->caption() ?></script></span></td>
		<td data-name="DR24" <?php echo $ivf_stimulation_chart_view->DR24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR24" type="text/html"><span id="el_ivf_stimulation_chart_DR24">
<span<?php echo $ivf_stimulation_chart_view->DR24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR24->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DR25->Visible) { // DR25 ?>
	<tr id="r_DR25">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR25"><script id="tpc_ivf_stimulation_chart_DR25" type="text/html"><?php echo $ivf_stimulation_chart_view->DR25->caption() ?></script></span></td>
		<td data-name="DR25" <?php echo $ivf_stimulation_chart_view->DR25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR25" type="text/html"><span id="el_ivf_stimulation_chart_DR25">
<span<?php echo $ivf_stimulation_chart_view->DR25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DR25->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E214->Visible) { // E214 ?>
	<tr id="r_E214">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E214"><script id="tpc_ivf_stimulation_chart_E214" type="text/html"><?php echo $ivf_stimulation_chart_view->E214->caption() ?></script></span></td>
		<td data-name="E214" <?php echo $ivf_stimulation_chart_view->E214->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E214" type="text/html"><span id="el_ivf_stimulation_chart_E214">
<span<?php echo $ivf_stimulation_chart_view->E214->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E214->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E215->Visible) { // E215 ?>
	<tr id="r_E215">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E215"><script id="tpc_ivf_stimulation_chart_E215" type="text/html"><?php echo $ivf_stimulation_chart_view->E215->caption() ?></script></span></td>
		<td data-name="E215" <?php echo $ivf_stimulation_chart_view->E215->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E215" type="text/html"><span id="el_ivf_stimulation_chart_E215">
<span<?php echo $ivf_stimulation_chart_view->E215->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E215->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E216->Visible) { // E216 ?>
	<tr id="r_E216">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E216"><script id="tpc_ivf_stimulation_chart_E216" type="text/html"><?php echo $ivf_stimulation_chart_view->E216->caption() ?></script></span></td>
		<td data-name="E216" <?php echo $ivf_stimulation_chart_view->E216->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E216" type="text/html"><span id="el_ivf_stimulation_chart_E216">
<span<?php echo $ivf_stimulation_chart_view->E216->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E216->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E217->Visible) { // E217 ?>
	<tr id="r_E217">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E217"><script id="tpc_ivf_stimulation_chart_E217" type="text/html"><?php echo $ivf_stimulation_chart_view->E217->caption() ?></script></span></td>
		<td data-name="E217" <?php echo $ivf_stimulation_chart_view->E217->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E217" type="text/html"><span id="el_ivf_stimulation_chart_E217">
<span<?php echo $ivf_stimulation_chart_view->E217->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E217->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E218->Visible) { // E218 ?>
	<tr id="r_E218">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E218"><script id="tpc_ivf_stimulation_chart_E218" type="text/html"><?php echo $ivf_stimulation_chart_view->E218->caption() ?></script></span></td>
		<td data-name="E218" <?php echo $ivf_stimulation_chart_view->E218->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E218" type="text/html"><span id="el_ivf_stimulation_chart_E218">
<span<?php echo $ivf_stimulation_chart_view->E218->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E218->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E219->Visible) { // E219 ?>
	<tr id="r_E219">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E219"><script id="tpc_ivf_stimulation_chart_E219" type="text/html"><?php echo $ivf_stimulation_chart_view->E219->caption() ?></script></span></td>
		<td data-name="E219" <?php echo $ivf_stimulation_chart_view->E219->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E219" type="text/html"><span id="el_ivf_stimulation_chart_E219">
<span<?php echo $ivf_stimulation_chart_view->E219->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E219->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E220->Visible) { // E220 ?>
	<tr id="r_E220">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E220"><script id="tpc_ivf_stimulation_chart_E220" type="text/html"><?php echo $ivf_stimulation_chart_view->E220->caption() ?></script></span></td>
		<td data-name="E220" <?php echo $ivf_stimulation_chart_view->E220->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E220" type="text/html"><span id="el_ivf_stimulation_chart_E220">
<span<?php echo $ivf_stimulation_chart_view->E220->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E220->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E221->Visible) { // E221 ?>
	<tr id="r_E221">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E221"><script id="tpc_ivf_stimulation_chart_E221" type="text/html"><?php echo $ivf_stimulation_chart_view->E221->caption() ?></script></span></td>
		<td data-name="E221" <?php echo $ivf_stimulation_chart_view->E221->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E221" type="text/html"><span id="el_ivf_stimulation_chart_E221">
<span<?php echo $ivf_stimulation_chart_view->E221->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E221->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E222->Visible) { // E222 ?>
	<tr id="r_E222">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E222"><script id="tpc_ivf_stimulation_chart_E222" type="text/html"><?php echo $ivf_stimulation_chart_view->E222->caption() ?></script></span></td>
		<td data-name="E222" <?php echo $ivf_stimulation_chart_view->E222->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E222" type="text/html"><span id="el_ivf_stimulation_chart_E222">
<span<?php echo $ivf_stimulation_chart_view->E222->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E222->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E223->Visible) { // E223 ?>
	<tr id="r_E223">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E223"><script id="tpc_ivf_stimulation_chart_E223" type="text/html"><?php echo $ivf_stimulation_chart_view->E223->caption() ?></script></span></td>
		<td data-name="E223" <?php echo $ivf_stimulation_chart_view->E223->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E223" type="text/html"><span id="el_ivf_stimulation_chart_E223">
<span<?php echo $ivf_stimulation_chart_view->E223->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E223->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E224->Visible) { // E224 ?>
	<tr id="r_E224">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E224"><script id="tpc_ivf_stimulation_chart_E224" type="text/html"><?php echo $ivf_stimulation_chart_view->E224->caption() ?></script></span></td>
		<td data-name="E224" <?php echo $ivf_stimulation_chart_view->E224->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E224" type="text/html"><span id="el_ivf_stimulation_chart_E224">
<span<?php echo $ivf_stimulation_chart_view->E224->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E224->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->E225->Visible) { // E225 ?>
	<tr id="r_E225">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E225"><script id="tpc_ivf_stimulation_chart_E225" type="text/html"><?php echo $ivf_stimulation_chart_view->E225->caption() ?></script></span></td>
		<td data-name="E225" <?php echo $ivf_stimulation_chart_view->E225->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E225" type="text/html"><span id="el_ivf_stimulation_chart_E225">
<span<?php echo $ivf_stimulation_chart_view->E225->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->E225->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<tr id="r_EEETTTDTE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE"><script id="tpc_ivf_stimulation_chart_EEETTTDTE" type="text/html"><?php echo $ivf_stimulation_chart_view->EEETTTDTE->caption() ?></script></span></td>
		<td data-name="EEETTTDTE" <?php echo $ivf_stimulation_chart_view->EEETTTDTE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EEETTTDTE" type="text/html"><span id="el_ivf_stimulation_chart_EEETTTDTE">
<span<?php echo $ivf_stimulation_chart_view->EEETTTDTE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EEETTTDTE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->bhcgdate->Visible) { // bhcgdate ?>
	<tr id="r_bhcgdate">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_bhcgdate"><script id="tpc_ivf_stimulation_chart_bhcgdate" type="text/html"><?php echo $ivf_stimulation_chart_view->bhcgdate->caption() ?></script></span></td>
		<td data-name="bhcgdate" <?php echo $ivf_stimulation_chart_view->bhcgdate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_bhcgdate" type="text/html"><span id="el_ivf_stimulation_chart_bhcgdate">
<span<?php echo $ivf_stimulation_chart_view->bhcgdate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->bhcgdate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<tr id="r_TUBAL_PATENCY">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY"><script id="tpc_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><?php echo $ivf_stimulation_chart_view->TUBAL_PATENCY->caption() ?></script></span></td>
		<td data-name="TUBAL_PATENCY" <?php echo $ivf_stimulation_chart_view->TUBAL_PATENCY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<span<?php echo $ivf_stimulation_chart_view->TUBAL_PATENCY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TUBAL_PATENCY->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->HSG->Visible) { // HSG ?>
	<tr id="r_HSG">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HSG"><script id="tpc_ivf_stimulation_chart_HSG" type="text/html"><?php echo $ivf_stimulation_chart_view->HSG->caption() ?></script></span></td>
		<td data-name="HSG" <?php echo $ivf_stimulation_chart_view->HSG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HSG" type="text/html"><span id="el_ivf_stimulation_chart_HSG">
<span<?php echo $ivf_stimulation_chart_view->HSG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->HSG->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->DHL->Visible) { // DHL ?>
	<tr id="r_DHL">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DHL"><script id="tpc_ivf_stimulation_chart_DHL" type="text/html"><?php echo $ivf_stimulation_chart_view->DHL->caption() ?></script></span></td>
		<td data-name="DHL" <?php echo $ivf_stimulation_chart_view->DHL->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DHL" type="text/html"><span id="el_ivf_stimulation_chart_DHL">
<span<?php echo $ivf_stimulation_chart_view->DHL->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->DHL->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<tr id="r_UTERINE_PROBLEMS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS"><script id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_view->UTERINE_PROBLEMS->caption() ?></script></span></td>
		<td data-name="UTERINE_PROBLEMS" <?php echo $ivf_stimulation_chart_view->UTERINE_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?php echo $ivf_stimulation_chart_view->UTERINE_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->UTERINE_PROBLEMS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<tr id="r_W_COMORBIDS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS"><script id="tpc_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_view->W_COMORBIDS->caption() ?></script></span></td>
		<td data-name="W_COMORBIDS" <?php echo $ivf_stimulation_chart_view->W_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_W_COMORBIDS">
<span<?php echo $ivf_stimulation_chart_view->W_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->W_COMORBIDS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<tr id="r_H_COMORBIDS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS"><script id="tpc_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_view->H_COMORBIDS->caption() ?></script></span></td>
		<td data-name="H_COMORBIDS" <?php echo $ivf_stimulation_chart_view->H_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_H_COMORBIDS">
<span<?php echo $ivf_stimulation_chart_view->H_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->H_COMORBIDS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<tr id="r_SEXUAL_DYSFUNCTION">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><script id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><?php echo $ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->caption() ?></script></span></td>
		<td data-name="SEXUAL_DYSFUNCTION" <?php echo $ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?php echo $ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->TABLETS->Visible) { // TABLETS ?>
	<tr id="r_TABLETS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TABLETS"><script id="tpc_ivf_stimulation_chart_TABLETS" type="text/html"><?php echo $ivf_stimulation_chart_view->TABLETS->caption() ?></script></span></td>
		<td data-name="TABLETS" <?php echo $ivf_stimulation_chart_view->TABLETS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TABLETS" type="text/html"><span id="el_ivf_stimulation_chart_TABLETS">
<span<?php echo $ivf_stimulation_chart_view->TABLETS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->TABLETS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<tr id="r_FOLLICLE_STATUS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS"><script id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><?php echo $ivf_stimulation_chart_view->FOLLICLE_STATUS->caption() ?></script></span></td>
		<td data-name="FOLLICLE_STATUS" <?php echo $ivf_stimulation_chart_view->FOLLICLE_STATUS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?php echo $ivf_stimulation_chart_view->FOLLICLE_STATUS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->FOLLICLE_STATUS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<tr id="r_NUMBER_OF_IUI">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI"><script id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><?php echo $ivf_stimulation_chart_view->NUMBER_OF_IUI->caption() ?></script></span></td>
		<td data-name="NUMBER_OF_IUI" <?php echo $ivf_stimulation_chart_view->NUMBER_OF_IUI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?php echo $ivf_stimulation_chart_view->NUMBER_OF_IUI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->NUMBER_OF_IUI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->PROCEDURE->Visible) { // PROCEDURE ?>
	<tr id="r_PROCEDURE">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE"><script id="tpc_ivf_stimulation_chart_PROCEDURE" type="text/html"><?php echo $ivf_stimulation_chart_view->PROCEDURE->caption() ?></script></span></td>
		<td data-name="PROCEDURE" <?php echo $ivf_stimulation_chart_view->PROCEDURE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PROCEDURE" type="text/html"><span id="el_ivf_stimulation_chart_PROCEDURE">
<span<?php echo $ivf_stimulation_chart_view->PROCEDURE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->PROCEDURE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<tr id="r_LUTEAL_SUPPORT">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT"><script id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><?php echo $ivf_stimulation_chart_view->LUTEAL_SUPPORT->caption() ?></script></span></td>
		<td data-name="LUTEAL_SUPPORT" <?php echo $ivf_stimulation_chart_view->LUTEAL_SUPPORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?php echo $ivf_stimulation_chart_view->LUTEAL_SUPPORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->LUTEAL_SUPPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<tr id="r_SPECIFIC_MATERNAL_PROBLEMS">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><script id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></script></span></td>
		<td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?php echo $ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<tr id="r_ONGOING_PREG">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG"><script id="tpc_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><?php echo $ivf_stimulation_chart_view->ONGOING_PREG->caption() ?></script></span></td>
		<td data-name="ONGOING_PREG" <?php echo $ivf_stimulation_chart_view->ONGOING_PREG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><span id="el_ivf_stimulation_chart_ONGOING_PREG">
<span<?php echo $ivf_stimulation_chart_view->ONGOING_PREG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->ONGOING_PREG->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_chart_view->EDD_Date->Visible) { // EDD_Date ?>
	<tr id="r_EDD_Date">
		<td class="<?php echo $ivf_stimulation_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EDD_Date"><script id="tpc_ivf_stimulation_chart_EDD_Date" type="text/html"><?php echo $ivf_stimulation_chart_view->EDD_Date->caption() ?></script></span></td>
		<td data-name="EDD_Date" <?php echo $ivf_stimulation_chart_view->EDD_Date->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EDD_Date" type="text/html"><span id="el_ivf_stimulation_chart_EDD_Date">
<span<?php echo $ivf_stimulation_chart_view->EDD_Date->viewAttributes() ?>><?php echo $ivf_stimulation_chart_view->EDD_Date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_stimulation_chartview" class="ew-custom-template"></div>
<script id="tpm_ivf_stimulation_chartview" type="text/html">
<div id="ct_ivf_stimulation_chart_view"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultsA[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
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
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"><?php echo $pageHeader; ?></h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ARTCycle")/}}</span>
				 </td>
				<td id="fieldProtocol">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Protocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Protocol")/}}</span>
				</td>
				<td id="fieldGROWTHHORMONE">
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_GROWTHHORMONE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GROWTHHORMONE")/}}</span>
				</td>
					<td id="fieldSemenFrozen">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SemenFrozen"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_SemenFrozen")/}}</span>
				</td>
		 </tr>
		  <tr id="rowTypeOfInfertility">
		  	<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TypeOfInfertility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TypeOfInfertility")/}}</span>
				</td>
								<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Duration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Duration")/}}</span>
				</td>
									<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TotalICSICycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TotalICSICycle")/}}</span>
				</td>
									<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_A4ICSICycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_A4ICSICycle")/}}</span>
				</td>
		 </tr>
		   <tr id="rowIUICycles">
		  	<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_IUICycles"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_IUICycles")/}}</span>
				</td>
					<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OvarianVolumeRT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_OvarianVolumeRT")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_RelevantHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RelevantHistory")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_AFC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_AFC")/}}</span>
				</td>
		 </tr>
		  <tr id="rowMedicalFactors">
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_MedicalFactors"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_MedicalFactors")/}}</span>
				</td>
					<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OvarianSurgery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_OvarianSurgery")/}}</span>
				</td>
					<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PRETREATMENT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_PRETREATMENT")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_AMH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_AMH")/}}</span>
				</td>
		 </tr>
		  <tr>
		  		<td id="fieldINJTYPE">
					<span  class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_INJTYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_INJTYPE")/}}</span>
				</td>
		  	<td id="fieldLMP">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_LMP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_LMP")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SCDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_SCDate")/}}</span>
				</td>
	<td id="fieldANTAGONISTSTARTDAY">
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY")/}}</span>
				</td>
		 </tr>
		  <tr>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Consultant")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_InseminatinTechnique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_InseminatinTechnique")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_IndicationForART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_IndicationForART")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Hysteroscopy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Hysteroscopy")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EndometrialScratching"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EndometrialScratching")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TrialCannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TrialCannulation")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_CYCLETYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CYCLETYPE")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_HRTCYCLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HRTCYCLE")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OralEstrogenDosage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_OralEstrogenDosage")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_VaginalEstrogen"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_VaginalEstrogen")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_GCSF"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GCSF")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ActivatedPRP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ActivatedPRP")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_UCLcm"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_UCLcm")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYOFEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DAYOFEMBRYOS")/}}</span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS")/}}</span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>	
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_ivf_stimulation_chart_Convert"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Convert")/}}
<div id="AllFreezeVisible" class="row">
	<div class="col-4">
	{{include tmpl="#tpc_ivf_stimulation_chart_AllFreeze"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_AllFreeze")/}}
	</div>
	<div class="col-4">
	{{include tmpl="#tpc_ivf_stimulation_chart_TreatmentCancel"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TreatmentCancel")/}}
	</div>
	<div id='CancelReason' style="visibility: hidden" class="col-4">
	{{include tmpl="#tpc_ivf_stimulation_chart_Reason"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Reason")/}}
	</div>
</div>
<br>
<div id="ProjectronVisible" class="row">
	<div class="col-4">
	{{include tmpl="#tpc_ivf_stimulation_chart_Projectron"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Projectron")/}}
	</div>
</div>
<div id="ProgesteroneAdminTable"  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Clinical Management</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
<table   class="table table-striped ew-table ew-export-table" style="width:40%;">
	<tbody>
		<tr><td>Detail Progesterone</td></tr>
		<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneAdmin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ProgesteroneAdmin")/}}</span></td></tr>
	<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneStart"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ProgesteroneStart")/}}</span></td></tr>
		<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ProgesteroneDose"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ProgesteroneDose")/}}</span></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		<tr><td><button type="button" onclick="ProgesteroneAccept()" class="btn btn-success">Accept</button>
<button type="button" onclick="ProgesteroneCancel()" class="btn btn-info">Cancel</button></td></tr>	
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td ><span class="ew-cell">Date</span></td>
				 <td ><span class="ew-cell">Cycle day</span></td>
				 <td id="tableStimulationday"><span class="ew-cell">Stimulation day</span></td>
				<td id="tableTablet" ><span class="ew-cell">A/CC</span></td>
				 <td id="tableRFSH"><span class="ew-cell">R FSH</span></td>
				 <td id="tableHMG"><span class="ew-cell">HMG</span></td>
				<td><span class="ew-cell">GnRH</span></td>
				 <td id="tableE2"><span id="colE2" class="ew-cell">E2</span></td>
				 <td><span id="colP4" class="ew-cell">P4</span></td>
				<td><span id="colUSGRt" class="ew-cell">USG Rt</span></td>
				 <td ><span id="colUSGLt" class="ew-cell">USG Lt</span></td>
				 <td><span id="colET" class="ew-cell">ET</span></td>
				<td><span id="colOthers" class="ew-cell">Others</span></td>
				<td><span id="colDr" class="ew-cell">Dr</span></td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate1")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay1")/}}</td>
				 <td id="tableStimulationday1">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay1")/}}</td>
				<td id="tableTablet1">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet1")/}}</td>
				<td  id="tableRFSH1">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH1")/}}</td>				 
				<td id="tableHMG1">{{include tmpl="#tpc_ivf_stimulation_chart_HMG1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG1")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH1")/}}</td>
				<td id="tableE21">{{include tmpl="#tpc_ivf_stimulation_chart_E21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E21")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P41"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P41")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt1")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt1")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM1")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others1")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR1")/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate2")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay2")/}}</td>
				 <td id="tableStimulationday2">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay2")/}}</td>
				<td id="tableTablet2">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet2")/}}</td>
				<td id="tableRFSH2">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH2")/}}</td>				 
				<td id="tableHMG2">{{include tmpl="#tpc_ivf_stimulation_chart_HMG2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG2")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH2")/}}</td>
				<td id="tableE22">{{include tmpl="#tpc_ivf_stimulation_chart_E22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E22")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P42"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P42")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt2")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt2")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM2")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others2")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR2")/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate3")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay3")/}}</td>
				 <td id="tableStimulationday3">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay3")/}}</td>
				<td id="tableTablet3">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet3")/}}</td>
				<td id="tableRFSH3">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH3")/}}</td>				 
				<td id="tableHMG3">{{include tmpl="#tpc_ivf_stimulation_chart_HMG3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG3")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH3")/}}</td>
				<td id="tableE23">{{include tmpl="#tpc_ivf_stimulation_chart_E23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E23")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P43"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P43")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt3")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt3")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM3")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others3")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR3")/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate4")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay4")/}}</td>
				 <td id="tableStimulationday4">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay4")/}}</td>
				<td id="tableTablet4">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet4")/}}</td>
				<td id="tableRFSH4">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH4")/}}</td>				 
				<td id="tableHMG4">{{include tmpl="#tpc_ivf_stimulation_chart_HMG4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG4")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH4")/}}</td>
				<td id="tableE24">{{include tmpl="#tpc_ivf_stimulation_chart_E24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E24")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P44"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P44")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt4")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt4")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM4")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others4")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR4")/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate5")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay5")/}}</td>
				 <td id="tableStimulationday5">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay5")/}}</td>
				<td id="tableTablet5">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet5")/}}</td>
				<td id="tableRFSH5">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH5")/}}</td>				 
				<td id="tableHMG5">{{include tmpl="#tpc_ivf_stimulation_chart_HMG5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG5")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH5")/}}</td>
				<td id="tableE25">{{include tmpl="#tpc_ivf_stimulation_chart_E25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E25")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P45"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P45")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt5")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt5")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM5")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others5")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR5")/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate6")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay6")/}}</td>
				 <td id="tableStimulationday6">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay6")/}}</td>
				<td id="tableTablet6">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet6")/}}</td>
				<td id="tableRFSH6">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH6")/}}</td>				 
				<td id="tableHMG6">{{include tmpl="#tpc_ivf_stimulation_chart_HMG6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG6")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH6")/}}</td>
				<td id="tableE26">{{include tmpl="#tpc_ivf_stimulation_chart_E26"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E26")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P46"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P46")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt6")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt6")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM6")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others6")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR6"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR6")/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate7")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay7")/}}</td>
				 <td id="tableStimulationday7">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay7")/}}</td>
				<td id="tableTablet7">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet7")/}}</td>
				<td id="tableRFSH7">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH7")/}}</td>				 
				<td id="tableHMG7">{{include tmpl="#tpc_ivf_stimulation_chart_HMG7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG7")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH7")/}}</td>
				<td id="tableE27">{{include tmpl="#tpc_ivf_stimulation_chart_E27"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E27")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P47"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P47")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt7")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt7")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM7")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others7")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR7"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR7")/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate8")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay8")/}}</td>
				 <td id="tableStimulationday8">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay8")/}}</td>
				<td id="tableTablet8">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet8")/}}</td>
				<td id="tableRFSH8">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH8")/}}</td>				 
				<td id="tableHMG8">{{include tmpl="#tpc_ivf_stimulation_chart_HMG8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG8")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH8")/}}</td>
				<td id="tableE28">{{include tmpl="#tpc_ivf_stimulation_chart_E28"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E28")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P48"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P48")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt8")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt8")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM8")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others8")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR8"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR8")/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate9")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay9")/}}</td>
				 <td id="tableStimulationday9">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay9")/}}</td>
				<td id="tableTablet9">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet9")/}}</td>
				<td id="tableRFSH9">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH9")/}}</td>				 
				<td id="tableHMG9">{{include tmpl="#tpc_ivf_stimulation_chart_HMG9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG9")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH9")/}}</td>
				<td id="tableE29">{{include tmpl="#tpc_ivf_stimulation_chart_E29"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E29")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P49"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P49")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt9")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt9")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM9")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others9")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR9"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR9")/}}</td>
		 </tr>
	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate10")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay10")/}}</td>
				 <td id="tableStimulationday10">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay10")/}}</td>
				<td id="tableTablet10">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet10")/}}</td>
				<td id="tableRFSH10">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH10")/}}</td>				 
				<td id="tableHMG10">{{include tmpl="#tpc_ivf_stimulation_chart_HMG10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG10")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH10")/}}</td>
				<td id="tableE210">{{include tmpl="#tpc_ivf_stimulation_chart_E210"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E210")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P410"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P410")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt10")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt10")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM10")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others10")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR10"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR10")/}}</td>
		 </tr>	
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate11")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay11")/}}</td>
				 <td id="tableStimulationday11">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay11")/}}</td>
				<td id="tableTablet11">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet11")/}}</td>
				<td id="tableRFSH11">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH11")/}}</td>				 
				<td id="tableHMG11">{{include tmpl="#tpc_ivf_stimulation_chart_HMG11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG11")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH11")/}}</td>
				<td id="tableE211">{{include tmpl="#tpc_ivf_stimulation_chart_E211"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E211")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P411"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P411")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt11")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt11")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM11")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others11")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR11"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR11")/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate12")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay12")/}}</td>
				 <td id="tableStimulationday12">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay12")/}}</td>
				<td id="tableTablet12">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet12")/}}</td>
				<td id="tableRFSH12">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH12")/}}</td>				 
				<td id="tableHMG12">{{include tmpl="#tpc_ivf_stimulation_chart_HMG12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG12")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH12")/}}</td>
				<td id="tableE212">{{include tmpl="#tpc_ivf_stimulation_chart_E212"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E212")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P412"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P412")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt12")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt12")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM12")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others12")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR12"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR12")/}}</td>
		 </tr>
		 	 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate13")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay13")/}}</td>
				 <td id="tableStimulationday13">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay13")/}}</td>
				<td id="tableTablet13">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet13")/}}</td>
				<td id="tableRFSH13">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH13")/}}</td>				 
				<td id="tableHMG13">{{include tmpl="#tpc_ivf_stimulation_chart_HMG13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG13")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH13")/}}</td>
				<td id="tableE213">{{include tmpl="#tpc_ivf_stimulation_chart_E213"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E213")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P413"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P413")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt13")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt13")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM13")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others13")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR13"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR13")/}}</td>
		 </tr>
		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate14")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay14")/}}</td>
				 <td id="tableStimulationday14">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay14")/}}</td>
				<td id="tableTablet14">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet14")/}}</td>
				<td  id="tableRFSH14">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH14")/}}</td>				 
				<td id="tableHMG14">{{include tmpl="#tpc_ivf_stimulation_chart_HMG14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG14")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH14")/}}</td>
				<td id="tableE214">{{include tmpl="#tpc_ivf_stimulation_chart_E214"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E214")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P414"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P414")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt14")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt14")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM14")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others14")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR14"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR14")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate15")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay15")/}}</td>
				 <td id="tableStimulationday15">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay15")/}}</td>
				<td id="tableTablet15">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet15")/}}</td>
				<td  id="tableRFSH15">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH15")/}}</td>				 
				<td id="tableHMG15">{{include tmpl="#tpc_ivf_stimulation_chart_HMG15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG15")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH15")/}}</td>
				<td id="tableE215">{{include tmpl="#tpc_ivf_stimulation_chart_E215"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E215")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P415"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P415")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt15")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt15")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM15")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others15")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR15"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR15")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate16")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay16")/}}</td>
				 <td id="tableStimulationday16">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay16")/}}</td>
				<td id="tableTablet16">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet16")/}}</td>
				<td  id="tableRFSH16">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH16")/}}</td>				 
				<td id="tableHMG16">{{include tmpl="#tpc_ivf_stimulation_chart_HMG16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG16")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH16")/}}</td>
				<td id="tableE216">{{include tmpl="#tpc_ivf_stimulation_chart_E216"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E216")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P416"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P416")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt16")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt16")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM16")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others16")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR16"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR16")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate17")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay17")/}}</td>
				 <td id="tableStimulationday17">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay17")/}}</td>
				<td id="tableTablet17">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet17")/}}</td>
				<td  id="tableRFSH17">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH17")/}}</td>				 
				<td id="tableHMG17">{{include tmpl="#tpc_ivf_stimulation_chart_HMG17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG17")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH17")/}}</td>
				<td id="tableE217">{{include tmpl="#tpc_ivf_stimulation_chart_E217"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E217")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P417"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P417")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt17")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt17")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM17")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others17")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR17"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR17")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate18")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay18")/}}</td>
				 <td id="tableStimulationday18">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay18")/}}</td>
				<td id="tableTablet18">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet18")/}}</td>
				<td  id="tableRFSH18">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH18")/}}</td>				 
				<td id="tableHMG18">{{include tmpl="#tpc_ivf_stimulation_chart_HMG18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG18")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH18")/}}</td>
				<td id="tableE218">{{include tmpl="#tpc_ivf_stimulation_chart_E218"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E218")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P418"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P418")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt18")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt18")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM18")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others18")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR18"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR18")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate19")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay19")/}}</td>
				 <td id="tableStimulationday19">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay19")/}}</td>
				<td id="tableTablet19">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet19")/}}</td>
				<td  id="tableRFSH19">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH19")/}}</td>				 
				<td id="tableHMG19">{{include tmpl="#tpc_ivf_stimulation_chart_HMG19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG19")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH19")/}}</td>
				<td id="tableE219">{{include tmpl="#tpc_ivf_stimulation_chart_E219"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E219")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P419"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P419")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt19")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt19")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM19")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others19")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR19"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR19")/}}</td>
		 </tr>
		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate20")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay20")/}}</td>
				 <td id="tableStimulationday20">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay20")/}}</td>
				<td id="tableTablet20">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet20")/}}</td>
				<td  id="tableRFSH20">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH20")/}}</td>				 
				<td id="tableHMG20">{{include tmpl="#tpc_ivf_stimulation_chart_HMG20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG20")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH20")/}}</td>
				<td id="tableE220">{{include tmpl="#tpc_ivf_stimulation_chart_E220"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E220")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P420"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P420")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt20")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt20")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM20")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others20")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR20"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR20")/}}</td>
		 </tr>
		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate21")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay21")/}}</td>
				 <td id="tableStimulationday21">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay21")/}}</td>
				<td id="tableTablet21">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet21")/}}</td>
				<td  id="tableRFSH21">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH21")/}}</td>				 
				<td id="tableHMG21">{{include tmpl="#tpc_ivf_stimulation_chart_HMG21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG21")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH21")/}}</td>
				<td id="tableE221">{{include tmpl="#tpc_ivf_stimulation_chart_E221"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E221")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P421"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P421")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt21")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt21")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM21")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others21")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR21"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR21")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate22")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay22")/}}</td>
				 <td id="tableStimulationday22">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay22")/}}</td>
				<td id="tableTablet22">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet22")/}}</td>
				<td  id="tableRFSH22">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH22")/}}</td>				 
				<td id="tableHMG22">{{include tmpl="#tpc_ivf_stimulation_chart_HMG22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG22")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH22")/}}</td>
				<td id="tableE222">{{include tmpl="#tpc_ivf_stimulation_chart_E222"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E222")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P422"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P422")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt22")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt22")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM22")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others22")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR22"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR22")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate23")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay23")/}}</td>
				 <td id="tableStimulationday23">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay23")/}}</td>
				<td id="tableTablet23">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet23")/}}</td>
				<td  id="tableRFSH23">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH23")/}}</td>				 
				<td id="tableHMG23">{{include tmpl="#tpc_ivf_stimulation_chart_HMG23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG23")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH23")/}}</td>
				<td id="tableE223">{{include tmpl="#tpc_ivf_stimulation_chart_E223"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E223")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P423"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P423")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt23")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt23")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM23")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others23")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR23"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR23")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate24")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay24")/}}</td>
				 <td id="tableStimulationday24">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay24")/}}</td>
				<td id="tableTablet24">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet24")/}}</td>
				<td  id="tableRFSH24">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH24")/}}</td>				 
				<td id="tableHMG24">{{include tmpl="#tpc_ivf_stimulation_chart_HMG24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG24")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH24")/}}</td>
				<td id="tableE224">{{include tmpl="#tpc_ivf_stimulation_chart_E224"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E224")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P424"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P424")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt24")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt24")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM24")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others24")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR24"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR24")/}}</td>
		 </tr>
		 		 <tr>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_StChDate25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StChDate25")/}}</td>
				 <td>{{include tmpl="#tpc_ivf_stimulation_chart_CycleDay25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_CycleDay25")/}}</td>
				 <td id="tableStimulationday25">{{include tmpl="#tpc_ivf_stimulation_chart_StimulationDay25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_StimulationDay25")/}}</td>
				<td id="tableTablet25">{{include tmpl="#tpc_ivf_stimulation_chart_Tablet25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Tablet25")/}}</td>
				<td  id="tableRFSH25">{{include tmpl="#tpc_ivf_stimulation_chart_RFSH25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_RFSH25")/}}</td>				 
				<td id="tableHMG25">{{include tmpl="#tpc_ivf_stimulation_chart_HMG25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HMG25")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_GnRH25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_GnRH25")/}}</td>
				<td id="tableE225">{{include tmpl="#tpc_ivf_stimulation_chart_E225"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_E225")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_P425"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_P425")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGRt25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGRt25")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_USGLt25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_USGLt25")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_EM25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EM25")/}}</td>	
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_Others25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Others25")/}}</td>
				<td>{{include tmpl="#tpc_ivf_stimulation_chart_DR25"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DR25")/}}</td>
		 </tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DAYSOFSTIMULATION")/}}</span></td>	
				<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS")/}}</span></td>
				<td><span  id="ANTAGONISTDAYSstum"  class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ANTAGONISTDAYS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ANTAGONISTDAYS")/}}</span></td>
	   </tr>	
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Pre Procedure Order</h3>
			</div>
			<div class="card-body">
<table id="PreProcedureEEETTTDTE" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EEETTTDTE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EEETTTDTE")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_bhcgdate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_bhcgdate")/}}</span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table  id="PreProcedureOrderPPOOUU"  class="ew-table" style="width:100%;">
	 <tbody>
		<tr id="RowPreProcedureOrder">
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PreProcedureOrder"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_PreProcedureOrder")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_Expectedoocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Expectedoocytes")/}}</span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
		 <tr>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TRIGGERR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TRIGGERR")/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TRIGGERDATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TRIGGERDATE")/}}</span>
				 </td>
				 <td id="colATHOMEorCLINIC">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ATHOMEorCLINIC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ATHOMEorCLINIC")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
		 <tr id="RowALLFREEZEINDICATION"> 
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ALLFREEZEINDICATION")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ERA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ERA")/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_REASONFORESET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_REASONFORESET")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				 </td>
		 </tr>
  		  <tr id="RowDATEOFET">
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DATEOFET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DATEOFET")/}}</span>
				</td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ET")/}}</span>
				 </td>
				  <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ESET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ESET")/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DOET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DOET")/}}</span>
				 </td>
		 </tr>
		 <tr>
		 		 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SEMENPREPARATION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_SEMENPREPARATION")/}}</span>
				 </td>
				 <td>
					<span id="fieldOPUDATE" class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_OPUDATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_OPUDATE")/}}</span>
				 </td>
				<td id="colPGTA">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PGTA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_PGTA")/}}</span>
				 </td>
				 <td id="colPGD">
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PGD"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_PGD")/}}</span>
				 </td>
		 </tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE")/}}
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_stimulation_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_stimulation_chartview", "tpm_ivf_stimulation_chartview", "ivf_stimulation_chartview", "<?php echo $ivf_stimulation_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_stimulation_chartview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_stimulation_chart_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_chart_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	var tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="none",artcycle='<?php echo $resultsA[0]["ARTCYCLE"]; ?>',Treatment='<?php echo $resultsA[0]["Treatment"]; ?>';if("Intrauterine insemination(IUI)"==artcycle){tableE2=document.getElementById("tableE2").style.display="none",tableE2=document.getElementById("tableE21").style.display="none",tableE2=document.getElementById("tableE22").style.display="none",tableE2=document.getElementById("tableE23").style.display="none",tableE2=document.getElementById("tableE24").style.display="none",tableE2=document.getElementById("tableE25").style.display="none",tableE2=document.getElementById("tableE26").style.display="none",tableE2=document.getElementById("tableE27").style.display="none",tableE2=document.getElementById("tableE28").style.display="none",tableE2=document.getElementById("tableE29").style.display="none",tableE2=document.getElementById("tableE210").style.display="none",tableE2=document.getElementById("tableE211").style.display="none",tableE2=document.getElementById("tableE212").style.display="none",tableE2=document.getElementById("tableE213").style.display="none",tableE2=document.getElementById("tableE214").style.display="none",tableE2=document.getElementById("tableE215").style.display="none",tableE2=document.getElementById("tableE216").style.display="none",tableE2=document.getElementById("tableE217").style.display="none",tableE2=document.getElementById("tableE218").style.display="none",tableE2=document.getElementById("tableE219").style.display="none",tableE2=document.getElementById("tableE220").style.display="none",tableE2=document.getElementById("tableE221").style.display="none",tableE2=document.getElementById("tableE222").style.display="none",tableE2=document.getElementById("tableE223").style.display="none",tableE2=document.getElementById("tableE224").style.display="none",tableE2=document.getElementById("tableE225").style.display="none";var RowPreProcedureOrder=document.getElementById("RowPreProcedureOrder").style.display="none",RowALLFREEZEINDICATION=document.getElementById("RowALLFREEZEINDICATION").style.display="none",RowDATEOFET=document.getElementById("RowDATEOFET").style.display="none",colPGTA=document.getElementById("colPGTA").style.display="none",colPGD=document.getElementById("colPGD").style.display="none",fieldOPUDATE=document.getElementById("fieldOPUDATE");fieldOPUDATE.firstElementChild.innerText="IUI Date";var colP4=document.getElementById("colP4").innerHTML="A/CC",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ANTAGONISTDAYSstum=document.getElementById("ANTAGONISTDAYSstum").style.display="none",x_OPUDATE=document.getElementById("x_OPUDATE");x_OPUDATE.placeholder="IUI Date"}if("Frozen Embryo Transfer"===artcycle||"Evaluation cycle"===artcycle){var colE2=document.getElementById("colE2").innerHTML="VE",colUSGRt=(colP4=document.getElementById("colP4").innerHTML="Patches",document.getElementById("colUSGRt").innerHTML="Progesterone"),colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableTablet=(tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",document.getElementById("tableTablet").style.display="none"),tableRFSH=(tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",document.getElementById("tableRFSH").style.display="none"),tableHMG=(tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",document.getElementById("tableHMG").style.display="none"),rowTypeOfInfertility=(tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",document.getElementById("rowTypeOfInfertility").style.display="none"),rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProgesteroneAdminTable=(ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",document.getElementById("ProgesteroneAdminTable").style.display="none");ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",fieldSemenFrozen=document.getElementById("RowPreProcedureOrder").style.display="none",fieldSemenFrozen=document.getElementById("RowALLFREEZEINDICATION").style.display="none",fieldSemenFrozen=document.getElementById("RowDATEOFET").style.display="none",fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block"}else{ETTableSt=document.getElementById("ETTableSt").style.display="none";if("Intrauterine insemination(IUI)"!=artcycle)ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="block";ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none"}if("Fresh ET"==Treatment||"Frozen ET"==Treatment||"OD Fresh ET"==Treatment||"OD Frozen ET"==Treatment)colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",rowTypeOfInfertility=document.getElementById("rowTypeOfInfertility").style.display="none",rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none";if("OD ICSI"==Treatment)fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block";function ProgesteroneAccept(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function ProgesteroneCancel(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function addDays(e,t){const l=new Date(Number(e));return l.setDate(e.getDate()+t),l}function calculateDoseofGonadotropins(){}function calculateDoseofRFSHHMG(){for(var e=0,t=0,l=1;l<14;l++){var n="x_RFSH"+l;(a=document.getElementById(n).value.split(" ")).length>1&&(e=parseInt(e)+1,t="Follisurge"==a[0]?parseInt(t)+parseInt(a[1]):parseInt(t)+parseInt(a[2]));var a;n="x_HMG"+l;(a=document.getElementById(n).value.split(" ")).length>1&&(t="HUMOG"==a[0]?parseInt(t)+parseInt(a[1]):parseInt(t)+parseInt(a[2]))}document.getElementById("x_DAYSOFSTIMULATION").value=e,document.getElementById("x_DOSEOFGONADOTROPINS").value=t}function calculateDaysofGnRH(){for(var e=0,t=1;t<14;t++){var l="x_GnRH"+t;document.getElementById(l).value.split(" ").length>1&&(e=parseInt(e)+1)}document.getElementById("x_ANTAGONISTDAYS").value=e}
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_stimulation_chart_view->terminate();
?>