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
$ivf_art_summary_view = new ivf_art_summary_view();

// Run the page
$ivf_art_summary_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_art_summary_view->isExport()) { ?>
<script>
var fivf_art_summaryview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_art_summaryview = currentForm = new ew.Form("fivf_art_summaryview", "view");
	loadjs.done("fivf_art_summaryview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_art_summary_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_art_summary_view->ExportOptions->render("body") ?>
<?php $ivf_art_summary_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_art_summary_view->showPageHeader(); ?>
<?php
$ivf_art_summary_view->showMessage();
?>
<form name="fivf_art_summaryview" id="fivf_art_summaryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_art_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_art_summary_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_id"><script id="tpc_ivf_art_summary_id" type="text/html"><?php echo $ivf_art_summary_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_art_summary_view->id->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_id" type="text/html"><span id="el_ivf_art_summary_id">
<span<?php echo $ivf_art_summary_view->id->viewAttributes() ?>><?php echo $ivf_art_summary_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ARTCycle"><script id="tpc_ivf_art_summary_ARTCycle" type="text/html"><?php echo $ivf_art_summary_view->ARTCycle->caption() ?></script></span></td>
		<td data-name="ARTCycle" <?php echo $ivf_art_summary_view->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ARTCycle" type="text/html"><span id="el_ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary_view->ARTCycle->viewAttributes() ?>><?php echo $ivf_art_summary_view->ARTCycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Spermorigin->Visible) { // Spermorigin ?>
	<tr id="r_Spermorigin">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Spermorigin"><script id="tpc_ivf_art_summary_Spermorigin" type="text/html"><?php echo $ivf_art_summary_view->Spermorigin->caption() ?></script></span></td>
		<td data-name="Spermorigin" <?php echo $ivf_art_summary_view->Spermorigin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Spermorigin" type="text/html"><span id="el_ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary_view->Spermorigin->viewAttributes() ?>><?php echo $ivf_art_summary_view->Spermorigin->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->IndicationforART->Visible) { // IndicationforART ?>
	<tr id="r_IndicationforART">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IndicationforART"><script id="tpc_ivf_art_summary_IndicationforART" type="text/html"><?php echo $ivf_art_summary_view->IndicationforART->caption() ?></script></span></td>
		<td data-name="IndicationforART" <?php echo $ivf_art_summary_view->IndicationforART->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IndicationforART" type="text/html"><span id="el_ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary_view->IndicationforART->viewAttributes() ?>><?php echo $ivf_art_summary_view->IndicationforART->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->DateofICSI->Visible) { // DateofICSI ?>
	<tr id="r_DateofICSI">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofICSI"><script id="tpc_ivf_art_summary_DateofICSI" type="text/html"><?php echo $ivf_art_summary_view->DateofICSI->caption() ?></script></span></td>
		<td data-name="DateofICSI" <?php echo $ivf_art_summary_view->DateofICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofICSI" type="text/html"><span id="el_ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary_view->DateofICSI->viewAttributes() ?>><?php echo $ivf_art_summary_view->DateofICSI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Origin->Visible) { // Origin ?>
	<tr id="r_Origin">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Origin"><script id="tpc_ivf_art_summary_Origin" type="text/html"><?php echo $ivf_art_summary_view->Origin->caption() ?></script></span></td>
		<td data-name="Origin" <?php echo $ivf_art_summary_view->Origin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Origin" type="text/html"><span id="el_ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary_view->Origin->viewAttributes() ?>><?php echo $ivf_art_summary_view->Origin->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Status"><script id="tpc_ivf_art_summary_Status" type="text/html"><?php echo $ivf_art_summary_view->Status->caption() ?></script></span></td>
		<td data-name="Status" <?php echo $ivf_art_summary_view->Status->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Status" type="text/html"><span id="el_ivf_art_summary_Status">
<span<?php echo $ivf_art_summary_view->Status->viewAttributes() ?>><?php echo $ivf_art_summary_view->Status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Method"><script id="tpc_ivf_art_summary_Method" type="text/html"><?php echo $ivf_art_summary_view->Method->caption() ?></script></span></td>
		<td data-name="Method" <?php echo $ivf_art_summary_view->Method->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Method" type="text/html"><span id="el_ivf_art_summary_Method">
<span<?php echo $ivf_art_summary_view->Method->viewAttributes() ?>><?php echo $ivf_art_summary_view->Method->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->pre_Concentration->Visible) { // pre_Concentration ?>
	<tr id="r_pre_Concentration">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Concentration"><script id="tpc_ivf_art_summary_pre_Concentration" type="text/html"><?php echo $ivf_art_summary_view->pre_Concentration->caption() ?></script></span></td>
		<td data-name="pre_Concentration" <?php echo $ivf_art_summary_view->pre_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Concentration" type="text/html"><span id="el_ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary_view->pre_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_view->pre_Concentration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->pre_Motility->Visible) { // pre_Motility ?>
	<tr id="r_pre_Motility">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Motility"><script id="tpc_ivf_art_summary_pre_Motility" type="text/html"><?php echo $ivf_art_summary_view->pre_Motility->caption() ?></script></span></td>
		<td data-name="pre_Motility" <?php echo $ivf_art_summary_view->pre_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Motility" type="text/html"><span id="el_ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary_view->pre_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_view->pre_Motility->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->pre_Morphology->Visible) { // pre_Morphology ?>
	<tr id="r_pre_Morphology">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Morphology"><script id="tpc_ivf_art_summary_pre_Morphology" type="text/html"><?php echo $ivf_art_summary_view->pre_Morphology->caption() ?></script></span></td>
		<td data-name="pre_Morphology" <?php echo $ivf_art_summary_view->pre_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Morphology" type="text/html"><span id="el_ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary_view->pre_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_view->pre_Morphology->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->post_Concentration->Visible) { // post_Concentration ?>
	<tr id="r_post_Concentration">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Concentration"><script id="tpc_ivf_art_summary_post_Concentration" type="text/html"><?php echo $ivf_art_summary_view->post_Concentration->caption() ?></script></span></td>
		<td data-name="post_Concentration" <?php echo $ivf_art_summary_view->post_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Concentration" type="text/html"><span id="el_ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary_view->post_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_view->post_Concentration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->post_Motility->Visible) { // post_Motility ?>
	<tr id="r_post_Motility">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Motility"><script id="tpc_ivf_art_summary_post_Motility" type="text/html"><?php echo $ivf_art_summary_view->post_Motility->caption() ?></script></span></td>
		<td data-name="post_Motility" <?php echo $ivf_art_summary_view->post_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Motility" type="text/html"><span id="el_ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary_view->post_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_view->post_Motility->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->post_Morphology->Visible) { // post_Morphology ?>
	<tr id="r_post_Morphology">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Morphology"><script id="tpc_ivf_art_summary_post_Morphology" type="text/html"><?php echo $ivf_art_summary_view->post_Morphology->caption() ?></script></span></td>
		<td data-name="post_Morphology" <?php echo $ivf_art_summary_view->post_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Morphology" type="text/html"><span id="el_ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary_view->post_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_view->post_Morphology->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<tr id="r_NumberofEmbryostransferred">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred"><script id="tpc_ivf_art_summary_NumberofEmbryostransferred" type="text/html"><?php echo $ivf_art_summary_view->NumberofEmbryostransferred->caption() ?></script></span></td>
		<td data-name="NumberofEmbryostransferred" <?php echo $ivf_art_summary_view->NumberofEmbryostransferred->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NumberofEmbryostransferred" type="text/html"><span id="el_ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary_view->NumberofEmbryostransferred->viewAttributes() ?>><?php echo $ivf_art_summary_view->NumberofEmbryostransferred->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<tr id="r_Embryosunderobservation">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Embryosunderobservation"><script id="tpc_ivf_art_summary_Embryosunderobservation" type="text/html"><?php echo $ivf_art_summary_view->Embryosunderobservation->caption() ?></script></span></td>
		<td data-name="Embryosunderobservation" <?php echo $ivf_art_summary_view->Embryosunderobservation->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Embryosunderobservation" type="text/html"><span id="el_ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary_view->Embryosunderobservation->viewAttributes() ?>><?php echo $ivf_art_summary_view->Embryosunderobservation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<tr id="r_EmbryoDevelopmentSummary">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary"><script id="tpc_ivf_art_summary_EmbryoDevelopmentSummary" type="text/html"><?php echo $ivf_art_summary_view->EmbryoDevelopmentSummary->caption() ?></script></span></td>
		<td data-name="EmbryoDevelopmentSummary" <?php echo $ivf_art_summary_view->EmbryoDevelopmentSummary->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryoDevelopmentSummary" type="text/html"><span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary_view->EmbryoDevelopmentSummary->viewAttributes() ?>><?php echo $ivf_art_summary_view->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<tr id="r_EmbryologistSignature">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryologistSignature"><script id="tpc_ivf_art_summary_EmbryologistSignature" type="text/html"><?php echo $ivf_art_summary_view->EmbryologistSignature->caption() ?></script></span></td>
		<td data-name="EmbryologistSignature" <?php echo $ivf_art_summary_view->EmbryologistSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryologistSignature" type="text/html"><span id="el_ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary_view->EmbryologistSignature->viewAttributes() ?>><?php echo $ivf_art_summary_view->EmbryologistSignature->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<tr id="r_IVFRegistrationID">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVFRegistrationID"><script id="tpc_ivf_art_summary_IVFRegistrationID" type="text/html"><?php echo $ivf_art_summary_view->IVFRegistrationID->caption() ?></script></span></td>
		<td data-name="IVFRegistrationID" <?php echo $ivf_art_summary_view->IVFRegistrationID->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVFRegistrationID" type="text/html"><span id="el_ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary_view->IVFRegistrationID->viewAttributes() ?>><?php echo $ivf_art_summary_view->IVFRegistrationID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_InseminatinTechnique"><script id="tpc_ivf_art_summary_InseminatinTechnique" type="text/html"><?php echo $ivf_art_summary_view->InseminatinTechnique->caption() ?></script></span></td>
		<td data-name="InseminatinTechnique" <?php echo $ivf_art_summary_view->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_InseminatinTechnique" type="text/html"><span id="el_ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary_view->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_art_summary_view->InseminatinTechnique->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->ICSIDetails->Visible) { // ICSIDetails ?>
	<tr id="r_ICSIDetails">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSIDetails"><script id="tpc_ivf_art_summary_ICSIDetails" type="text/html"><?php echo $ivf_art_summary_view->ICSIDetails->caption() ?></script></span></td>
		<td data-name="ICSIDetails" <?php echo $ivf_art_summary_view->ICSIDetails->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSIDetails" type="text/html"><span id="el_ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary_view->ICSIDetails->viewAttributes() ?>><?php echo $ivf_art_summary_view->ICSIDetails->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->DateofET->Visible) { // DateofET ?>
	<tr id="r_DateofET">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofET"><script id="tpc_ivf_art_summary_DateofET" type="text/html"><?php echo $ivf_art_summary_view->DateofET->caption() ?></script></span></td>
		<td data-name="DateofET" <?php echo $ivf_art_summary_view->DateofET->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofET" type="text/html"><span id="el_ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary_view->DateofET->viewAttributes() ?>><?php echo $ivf_art_summary_view->DateofET->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<tr id="r_Reasonfornotranfer">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer"><script id="tpc_ivf_art_summary_Reasonfornotranfer" type="text/html"><?php echo $ivf_art_summary_view->Reasonfornotranfer->caption() ?></script></span></td>
		<td data-name="Reasonfornotranfer" <?php echo $ivf_art_summary_view->Reasonfornotranfer->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Reasonfornotranfer" type="text/html"><span id="el_ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary_view->Reasonfornotranfer->viewAttributes() ?>><?php echo $ivf_art_summary_view->Reasonfornotranfer->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<tr id="r_EmbryosCryopreserved">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved"><script id="tpc_ivf_art_summary_EmbryosCryopreserved" type="text/html"><?php echo $ivf_art_summary_view->EmbryosCryopreserved->caption() ?></script></span></td>
		<td data-name="EmbryosCryopreserved" <?php echo $ivf_art_summary_view->EmbryosCryopreserved->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryosCryopreserved" type="text/html"><span id="el_ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary_view->EmbryosCryopreserved->viewAttributes() ?>><?php echo $ivf_art_summary_view->EmbryosCryopreserved->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->LegendCellStage->Visible) { // LegendCellStage ?>
	<tr id="r_LegendCellStage">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_LegendCellStage"><script id="tpc_ivf_art_summary_LegendCellStage" type="text/html"><?php echo $ivf_art_summary_view->LegendCellStage->caption() ?></script></span></td>
		<td data-name="LegendCellStage" <?php echo $ivf_art_summary_view->LegendCellStage->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_LegendCellStage" type="text/html"><span id="el_ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary_view->LegendCellStage->viewAttributes() ?>><?php echo $ivf_art_summary_view->LegendCellStage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<tr id="r_ConsultantsSignature">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ConsultantsSignature"><script id="tpc_ivf_art_summary_ConsultantsSignature" type="text/html"><?php echo $ivf_art_summary_view->ConsultantsSignature->caption() ?></script></span></td>
		<td data-name="ConsultantsSignature" <?php echo $ivf_art_summary_view->ConsultantsSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ConsultantsSignature" type="text/html"><span id="el_ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary_view->ConsultantsSignature->viewAttributes() ?>><?php echo $ivf_art_summary_view->ConsultantsSignature->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Name"><script id="tpc_ivf_art_summary_Name" type="text/html"><?php echo $ivf_art_summary_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_art_summary_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Name" type="text/html"><span id="el_ivf_art_summary_Name">
<span<?php echo $ivf_art_summary_view->Name->viewAttributes() ?>><?php echo $ivf_art_summary_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->M2->Visible) { // M2 ?>
	<tr id="r_M2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M2"><script id="tpc_ivf_art_summary_M2" type="text/html"><?php echo $ivf_art_summary_view->M2->caption() ?></script></span></td>
		<td data-name="M2" <?php echo $ivf_art_summary_view->M2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M2" type="text/html"><span id="el_ivf_art_summary_M2">
<span<?php echo $ivf_art_summary_view->M2->viewAttributes() ?>><?php echo $ivf_art_summary_view->M2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Mi2->Visible) { // Mi2 ?>
	<tr id="r_Mi2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Mi2"><script id="tpc_ivf_art_summary_Mi2" type="text/html"><?php echo $ivf_art_summary_view->Mi2->caption() ?></script></span></td>
		<td data-name="Mi2" <?php echo $ivf_art_summary_view->Mi2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Mi2" type="text/html"><span id="el_ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary_view->Mi2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Mi2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->ICSI->Visible) { // ICSI ?>
	<tr id="r_ICSI">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSI"><script id="tpc_ivf_art_summary_ICSI" type="text/html"><?php echo $ivf_art_summary_view->ICSI->caption() ?></script></span></td>
		<td data-name="ICSI" <?php echo $ivf_art_summary_view->ICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSI" type="text/html"><span id="el_ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary_view->ICSI->viewAttributes() ?>><?php echo $ivf_art_summary_view->ICSI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->IVF->Visible) { // IVF ?>
	<tr id="r_IVF">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVF"><script id="tpc_ivf_art_summary_IVF" type="text/html"><?php echo $ivf_art_summary_view->IVF->caption() ?></script></span></td>
		<td data-name="IVF" <?php echo $ivf_art_summary_view->IVF->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVF" type="text/html"><span id="el_ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary_view->IVF->viewAttributes() ?>><?php echo $ivf_art_summary_view->IVF->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->M1->Visible) { // M1 ?>
	<tr id="r_M1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M1"><script id="tpc_ivf_art_summary_M1" type="text/html"><?php echo $ivf_art_summary_view->M1->caption() ?></script></span></td>
		<td data-name="M1" <?php echo $ivf_art_summary_view->M1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M1" type="text/html"><span id="el_ivf_art_summary_M1">
<span<?php echo $ivf_art_summary_view->M1->viewAttributes() ?>><?php echo $ivf_art_summary_view->M1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->GV->Visible) { // GV ?>
	<tr id="r_GV">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_GV"><script id="tpc_ivf_art_summary_GV" type="text/html"><?php echo $ivf_art_summary_view->GV->caption() ?></script></span></td>
		<td data-name="GV" <?php echo $ivf_art_summary_view->GV->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_GV" type="text/html"><span id="el_ivf_art_summary_GV">
<span<?php echo $ivf_art_summary_view->GV->viewAttributes() ?>><?php echo $ivf_art_summary_view->GV->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Others->Visible) { // Others ?>
	<tr id="r_Others">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Others"><script id="tpc_ivf_art_summary_Others" type="text/html"><?php echo $ivf_art_summary_view->Others->caption() ?></script></span></td>
		<td data-name="Others" <?php echo $ivf_art_summary_view->Others->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Others" type="text/html"><span id="el_ivf_art_summary_Others">
<span<?php echo $ivf_art_summary_view->Others->viewAttributes() ?>><?php echo $ivf_art_summary_view->Others->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Normal2PN->Visible) { // Normal2PN ?>
	<tr id="r_Normal2PN">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Normal2PN"><script id="tpc_ivf_art_summary_Normal2PN" type="text/html"><?php echo $ivf_art_summary_view->Normal2PN->caption() ?></script></span></td>
		<td data-name="Normal2PN" <?php echo $ivf_art_summary_view->Normal2PN->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Normal2PN" type="text/html"><span id="el_ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary_view->Normal2PN->viewAttributes() ?>><?php echo $ivf_art_summary_view->Normal2PN->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<tr id="r_Abnormalfertilisation1N">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N"><script id="tpc_ivf_art_summary_Abnormalfertilisation1N" type="text/html"><?php echo $ivf_art_summary_view->Abnormalfertilisation1N->caption() ?></script></span></td>
		<td data-name="Abnormalfertilisation1N" <?php echo $ivf_art_summary_view->Abnormalfertilisation1N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation1N" type="text/html"><span id="el_ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary_view->Abnormalfertilisation1N->viewAttributes() ?>><?php echo $ivf_art_summary_view->Abnormalfertilisation1N->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<tr id="r_Abnormalfertilisation3N">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N"><script id="tpc_ivf_art_summary_Abnormalfertilisation3N" type="text/html"><?php echo $ivf_art_summary_view->Abnormalfertilisation3N->caption() ?></script></span></td>
		<td data-name="Abnormalfertilisation3N" <?php echo $ivf_art_summary_view->Abnormalfertilisation3N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation3N" type="text/html"><span id="el_ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary_view->Abnormalfertilisation3N->viewAttributes() ?>><?php echo $ivf_art_summary_view->Abnormalfertilisation3N->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->NotFertilized->Visible) { // NotFertilized ?>
	<tr id="r_NotFertilized">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotFertilized"><script id="tpc_ivf_art_summary_NotFertilized" type="text/html"><?php echo $ivf_art_summary_view->NotFertilized->caption() ?></script></span></td>
		<td data-name="NotFertilized" <?php echo $ivf_art_summary_view->NotFertilized->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotFertilized" type="text/html"><span id="el_ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary_view->NotFertilized->viewAttributes() ?>><?php echo $ivf_art_summary_view->NotFertilized->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Degenerated->Visible) { // Degenerated ?>
	<tr id="r_Degenerated">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Degenerated"><script id="tpc_ivf_art_summary_Degenerated" type="text/html"><?php echo $ivf_art_summary_view->Degenerated->caption() ?></script></span></td>
		<td data-name="Degenerated" <?php echo $ivf_art_summary_view->Degenerated->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Degenerated" type="text/html"><span id="el_ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary_view->Degenerated->viewAttributes() ?>><?php echo $ivf_art_summary_view->Degenerated->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->SpermDate->Visible) { // SpermDate ?>
	<tr id="r_SpermDate">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_SpermDate"><script id="tpc_ivf_art_summary_SpermDate" type="text/html"><?php echo $ivf_art_summary_view->SpermDate->caption() ?></script></span></td>
		<td data-name="SpermDate" <?php echo $ivf_art_summary_view->SpermDate->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_SpermDate" type="text/html"><span id="el_ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary_view->SpermDate->viewAttributes() ?>><?php echo $ivf_art_summary_view->SpermDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Code1->Visible) { // Code1 ?>
	<tr id="r_Code1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code1"><script id="tpc_ivf_art_summary_Code1" type="text/html"><?php echo $ivf_art_summary_view->Code1->caption() ?></script></span></td>
		<td data-name="Code1" <?php echo $ivf_art_summary_view->Code1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code1" type="text/html"><span id="el_ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary_view->Code1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Code1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Day1->Visible) { // Day1 ?>
	<tr id="r_Day1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day1"><script id="tpc_ivf_art_summary_Day1" type="text/html"><?php echo $ivf_art_summary_view->Day1->caption() ?></script></span></td>
		<td data-name="Day1" <?php echo $ivf_art_summary_view->Day1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day1" type="text/html"><span id="el_ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary_view->Day1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Day1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->CellStage1->Visible) { // CellStage1 ?>
	<tr id="r_CellStage1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage1"><script id="tpc_ivf_art_summary_CellStage1" type="text/html"><?php echo $ivf_art_summary_view->CellStage1->caption() ?></script></span></td>
		<td data-name="CellStage1" <?php echo $ivf_art_summary_view->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage1" type="text/html"><span id="el_ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary_view->CellStage1->viewAttributes() ?>><?php echo $ivf_art_summary_view->CellStage1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Grade1->Visible) { // Grade1 ?>
	<tr id="r_Grade1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade1"><script id="tpc_ivf_art_summary_Grade1" type="text/html"><?php echo $ivf_art_summary_view->Grade1->caption() ?></script></span></td>
		<td data-name="Grade1" <?php echo $ivf_art_summary_view->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade1" type="text/html"><span id="el_ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary_view->Grade1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Grade1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->State1->Visible) { // State1 ?>
	<tr id="r_State1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State1"><script id="tpc_ivf_art_summary_State1" type="text/html"><?php echo $ivf_art_summary_view->State1->caption() ?></script></span></td>
		<td data-name="State1" <?php echo $ivf_art_summary_view->State1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State1" type="text/html"><span id="el_ivf_art_summary_State1">
<span<?php echo $ivf_art_summary_view->State1->viewAttributes() ?>><?php echo $ivf_art_summary_view->State1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Code2->Visible) { // Code2 ?>
	<tr id="r_Code2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code2"><script id="tpc_ivf_art_summary_Code2" type="text/html"><?php echo $ivf_art_summary_view->Code2->caption() ?></script></span></td>
		<td data-name="Code2" <?php echo $ivf_art_summary_view->Code2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code2" type="text/html"><span id="el_ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary_view->Code2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Code2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Day2->Visible) { // Day2 ?>
	<tr id="r_Day2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day2"><script id="tpc_ivf_art_summary_Day2" type="text/html"><?php echo $ivf_art_summary_view->Day2->caption() ?></script></span></td>
		<td data-name="Day2" <?php echo $ivf_art_summary_view->Day2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day2" type="text/html"><span id="el_ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary_view->Day2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Day2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->CellStage2->Visible) { // CellStage2 ?>
	<tr id="r_CellStage2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage2"><script id="tpc_ivf_art_summary_CellStage2" type="text/html"><?php echo $ivf_art_summary_view->CellStage2->caption() ?></script></span></td>
		<td data-name="CellStage2" <?php echo $ivf_art_summary_view->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage2" type="text/html"><span id="el_ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary_view->CellStage2->viewAttributes() ?>><?php echo $ivf_art_summary_view->CellStage2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Grade2->Visible) { // Grade2 ?>
	<tr id="r_Grade2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade2"><script id="tpc_ivf_art_summary_Grade2" type="text/html"><?php echo $ivf_art_summary_view->Grade2->caption() ?></script></span></td>
		<td data-name="Grade2" <?php echo $ivf_art_summary_view->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade2" type="text/html"><span id="el_ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary_view->Grade2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Grade2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->State2->Visible) { // State2 ?>
	<tr id="r_State2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State2"><script id="tpc_ivf_art_summary_State2" type="text/html"><?php echo $ivf_art_summary_view->State2->caption() ?></script></span></td>
		<td data-name="State2" <?php echo $ivf_art_summary_view->State2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State2" type="text/html"><span id="el_ivf_art_summary_State2">
<span<?php echo $ivf_art_summary_view->State2->viewAttributes() ?>><?php echo $ivf_art_summary_view->State2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Code3->Visible) { // Code3 ?>
	<tr id="r_Code3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code3"><script id="tpc_ivf_art_summary_Code3" type="text/html"><?php echo $ivf_art_summary_view->Code3->caption() ?></script></span></td>
		<td data-name="Code3" <?php echo $ivf_art_summary_view->Code3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code3" type="text/html"><span id="el_ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary_view->Code3->viewAttributes() ?>><?php echo $ivf_art_summary_view->Code3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Day3->Visible) { // Day3 ?>
	<tr id="r_Day3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day3"><script id="tpc_ivf_art_summary_Day3" type="text/html"><?php echo $ivf_art_summary_view->Day3->caption() ?></script></span></td>
		<td data-name="Day3" <?php echo $ivf_art_summary_view->Day3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day3" type="text/html"><span id="el_ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary_view->Day3->viewAttributes() ?>><?php echo $ivf_art_summary_view->Day3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->CellStage3->Visible) { // CellStage3 ?>
	<tr id="r_CellStage3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage3"><script id="tpc_ivf_art_summary_CellStage3" type="text/html"><?php echo $ivf_art_summary_view->CellStage3->caption() ?></script></span></td>
		<td data-name="CellStage3" <?php echo $ivf_art_summary_view->CellStage3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage3" type="text/html"><span id="el_ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary_view->CellStage3->viewAttributes() ?>><?php echo $ivf_art_summary_view->CellStage3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Grade3->Visible) { // Grade3 ?>
	<tr id="r_Grade3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade3"><script id="tpc_ivf_art_summary_Grade3" type="text/html"><?php echo $ivf_art_summary_view->Grade3->caption() ?></script></span></td>
		<td data-name="Grade3" <?php echo $ivf_art_summary_view->Grade3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade3" type="text/html"><span id="el_ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary_view->Grade3->viewAttributes() ?>><?php echo $ivf_art_summary_view->Grade3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->State3->Visible) { // State3 ?>
	<tr id="r_State3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State3"><script id="tpc_ivf_art_summary_State3" type="text/html"><?php echo $ivf_art_summary_view->State3->caption() ?></script></span></td>
		<td data-name="State3" <?php echo $ivf_art_summary_view->State3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State3" type="text/html"><span id="el_ivf_art_summary_State3">
<span<?php echo $ivf_art_summary_view->State3->viewAttributes() ?>><?php echo $ivf_art_summary_view->State3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Code4->Visible) { // Code4 ?>
	<tr id="r_Code4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code4"><script id="tpc_ivf_art_summary_Code4" type="text/html"><?php echo $ivf_art_summary_view->Code4->caption() ?></script></span></td>
		<td data-name="Code4" <?php echo $ivf_art_summary_view->Code4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code4" type="text/html"><span id="el_ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary_view->Code4->viewAttributes() ?>><?php echo $ivf_art_summary_view->Code4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Day4->Visible) { // Day4 ?>
	<tr id="r_Day4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day4"><script id="tpc_ivf_art_summary_Day4" type="text/html"><?php echo $ivf_art_summary_view->Day4->caption() ?></script></span></td>
		<td data-name="Day4" <?php echo $ivf_art_summary_view->Day4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day4" type="text/html"><span id="el_ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary_view->Day4->viewAttributes() ?>><?php echo $ivf_art_summary_view->Day4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->CellStage4->Visible) { // CellStage4 ?>
	<tr id="r_CellStage4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage4"><script id="tpc_ivf_art_summary_CellStage4" type="text/html"><?php echo $ivf_art_summary_view->CellStage4->caption() ?></script></span></td>
		<td data-name="CellStage4" <?php echo $ivf_art_summary_view->CellStage4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage4" type="text/html"><span id="el_ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary_view->CellStage4->viewAttributes() ?>><?php echo $ivf_art_summary_view->CellStage4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Grade4->Visible) { // Grade4 ?>
	<tr id="r_Grade4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade4"><script id="tpc_ivf_art_summary_Grade4" type="text/html"><?php echo $ivf_art_summary_view->Grade4->caption() ?></script></span></td>
		<td data-name="Grade4" <?php echo $ivf_art_summary_view->Grade4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade4" type="text/html"><span id="el_ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary_view->Grade4->viewAttributes() ?>><?php echo $ivf_art_summary_view->Grade4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->State4->Visible) { // State4 ?>
	<tr id="r_State4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State4"><script id="tpc_ivf_art_summary_State4" type="text/html"><?php echo $ivf_art_summary_view->State4->caption() ?></script></span></td>
		<td data-name="State4" <?php echo $ivf_art_summary_view->State4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State4" type="text/html"><span id="el_ivf_art_summary_State4">
<span<?php echo $ivf_art_summary_view->State4->viewAttributes() ?>><?php echo $ivf_art_summary_view->State4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Code5->Visible) { // Code5 ?>
	<tr id="r_Code5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code5"><script id="tpc_ivf_art_summary_Code5" type="text/html"><?php echo $ivf_art_summary_view->Code5->caption() ?></script></span></td>
		<td data-name="Code5" <?php echo $ivf_art_summary_view->Code5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code5" type="text/html"><span id="el_ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary_view->Code5->viewAttributes() ?>><?php echo $ivf_art_summary_view->Code5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Day5->Visible) { // Day5 ?>
	<tr id="r_Day5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day5"><script id="tpc_ivf_art_summary_Day5" type="text/html"><?php echo $ivf_art_summary_view->Day5->caption() ?></script></span></td>
		<td data-name="Day5" <?php echo $ivf_art_summary_view->Day5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day5" type="text/html"><span id="el_ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary_view->Day5->viewAttributes() ?>><?php echo $ivf_art_summary_view->Day5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->CellStage5->Visible) { // CellStage5 ?>
	<tr id="r_CellStage5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage5"><script id="tpc_ivf_art_summary_CellStage5" type="text/html"><?php echo $ivf_art_summary_view->CellStage5->caption() ?></script></span></td>
		<td data-name="CellStage5" <?php echo $ivf_art_summary_view->CellStage5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage5" type="text/html"><span id="el_ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary_view->CellStage5->viewAttributes() ?>><?php echo $ivf_art_summary_view->CellStage5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Grade5->Visible) { // Grade5 ?>
	<tr id="r_Grade5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade5"><script id="tpc_ivf_art_summary_Grade5" type="text/html"><?php echo $ivf_art_summary_view->Grade5->caption() ?></script></span></td>
		<td data-name="Grade5" <?php echo $ivf_art_summary_view->Grade5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade5" type="text/html"><span id="el_ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary_view->Grade5->viewAttributes() ?>><?php echo $ivf_art_summary_view->Grade5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->State5->Visible) { // State5 ?>
	<tr id="r_State5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State5"><script id="tpc_ivf_art_summary_State5" type="text/html"><?php echo $ivf_art_summary_view->State5->caption() ?></script></span></td>
		<td data-name="State5" <?php echo $ivf_art_summary_view->State5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State5" type="text/html"><span id="el_ivf_art_summary_State5">
<span<?php echo $ivf_art_summary_view->State5->viewAttributes() ?>><?php echo $ivf_art_summary_view->State5->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_TidNo"><script id="tpc_ivf_art_summary_TidNo" type="text/html"><?php echo $ivf_art_summary_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_art_summary_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_TidNo" type="text/html"><span id="el_ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary_view->TidNo->viewAttributes() ?>><?php echo $ivf_art_summary_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_RIDNo"><script id="tpc_ivf_art_summary_RIDNo" type="text/html"><?php echo $ivf_art_summary_view->RIDNo->caption() ?></script></span></td>
		<td data-name="RIDNo" <?php echo $ivf_art_summary_view->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_RIDNo" type="text/html"><span id="el_ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary_view->RIDNo->viewAttributes() ?>><?php echo $ivf_art_summary_view->RIDNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume"><script id="tpc_ivf_art_summary_Volume" type="text/html"><?php echo $ivf_art_summary_view->Volume->caption() ?></script></span></td>
		<td data-name="Volume" <?php echo $ivf_art_summary_view->Volume->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume" type="text/html"><span id="el_ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary_view->Volume->viewAttributes() ?>><?php echo $ivf_art_summary_view->Volume->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Volume1->Visible) { // Volume1 ?>
	<tr id="r_Volume1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume1"><script id="tpc_ivf_art_summary_Volume1" type="text/html"><?php echo $ivf_art_summary_view->Volume1->caption() ?></script></span></td>
		<td data-name="Volume1" <?php echo $ivf_art_summary_view->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume1" type="text/html"><span id="el_ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary_view->Volume1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Volume1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Volume2->Visible) { // Volume2 ?>
	<tr id="r_Volume2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume2"><script id="tpc_ivf_art_summary_Volume2" type="text/html"><?php echo $ivf_art_summary_view->Volume2->caption() ?></script></span></td>
		<td data-name="Volume2" <?php echo $ivf_art_summary_view->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume2" type="text/html"><span id="el_ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary_view->Volume2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Volume2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Concentration2->Visible) { // Concentration2 ?>
	<tr id="r_Concentration2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Concentration2"><script id="tpc_ivf_art_summary_Concentration2" type="text/html"><?php echo $ivf_art_summary_view->Concentration2->caption() ?></script></span></td>
		<td data-name="Concentration2" <?php echo $ivf_art_summary_view->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Concentration2" type="text/html"><span id="el_ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary_view->Concentration2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Concentration2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Total->Visible) { // Total ?>
	<tr id="r_Total">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total"><script id="tpc_ivf_art_summary_Total" type="text/html"><?php echo $ivf_art_summary_view->Total->caption() ?></script></span></td>
		<td data-name="Total" <?php echo $ivf_art_summary_view->Total->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total" type="text/html"><span id="el_ivf_art_summary_Total">
<span<?php echo $ivf_art_summary_view->Total->viewAttributes() ?>><?php echo $ivf_art_summary_view->Total->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Total1->Visible) { // Total1 ?>
	<tr id="r_Total1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total1"><script id="tpc_ivf_art_summary_Total1" type="text/html"><?php echo $ivf_art_summary_view->Total1->caption() ?></script></span></td>
		<td data-name="Total1" <?php echo $ivf_art_summary_view->Total1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total1" type="text/html"><span id="el_ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary_view->Total1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Total1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Total2->Visible) { // Total2 ?>
	<tr id="r_Total2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total2"><script id="tpc_ivf_art_summary_Total2" type="text/html"><?php echo $ivf_art_summary_view->Total2->caption() ?></script></span></td>
		<td data-name="Total2" <?php echo $ivf_art_summary_view->Total2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total2" type="text/html"><span id="el_ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary_view->Total2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Total2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Progressive->Visible) { // Progressive ?>
	<tr id="r_Progressive">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive"><script id="tpc_ivf_art_summary_Progressive" type="text/html"><?php echo $ivf_art_summary_view->Progressive->caption() ?></script></span></td>
		<td data-name="Progressive" <?php echo $ivf_art_summary_view->Progressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive" type="text/html"><span id="el_ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary_view->Progressive->viewAttributes() ?>><?php echo $ivf_art_summary_view->Progressive->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Progressive1->Visible) { // Progressive1 ?>
	<tr id="r_Progressive1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive1"><script id="tpc_ivf_art_summary_Progressive1" type="text/html"><?php echo $ivf_art_summary_view->Progressive1->caption() ?></script></span></td>
		<td data-name="Progressive1" <?php echo $ivf_art_summary_view->Progressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive1" type="text/html"><span id="el_ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary_view->Progressive1->viewAttributes() ?>><?php echo $ivf_art_summary_view->Progressive1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Progressive2->Visible) { // Progressive2 ?>
	<tr id="r_Progressive2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive2"><script id="tpc_ivf_art_summary_Progressive2" type="text/html"><?php echo $ivf_art_summary_view->Progressive2->caption() ?></script></span></td>
		<td data-name="Progressive2" <?php echo $ivf_art_summary_view->Progressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive2" type="text/html"><span id="el_ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary_view->Progressive2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Progressive2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->NotProgressive->Visible) { // NotProgressive ?>
	<tr id="r_NotProgressive">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive"><script id="tpc_ivf_art_summary_NotProgressive" type="text/html"><?php echo $ivf_art_summary_view->NotProgressive->caption() ?></script></span></td>
		<td data-name="NotProgressive" <?php echo $ivf_art_summary_view->NotProgressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive" type="text/html"><span id="el_ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary_view->NotProgressive->viewAttributes() ?>><?php echo $ivf_art_summary_view->NotProgressive->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->NotProgressive1->Visible) { // NotProgressive1 ?>
	<tr id="r_NotProgressive1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive1"><script id="tpc_ivf_art_summary_NotProgressive1" type="text/html"><?php echo $ivf_art_summary_view->NotProgressive1->caption() ?></script></span></td>
		<td data-name="NotProgressive1" <?php echo $ivf_art_summary_view->NotProgressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive1" type="text/html"><span id="el_ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary_view->NotProgressive1->viewAttributes() ?>><?php echo $ivf_art_summary_view->NotProgressive1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->NotProgressive2->Visible) { // NotProgressive2 ?>
	<tr id="r_NotProgressive2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive2"><script id="tpc_ivf_art_summary_NotProgressive2" type="text/html"><?php echo $ivf_art_summary_view->NotProgressive2->caption() ?></script></span></td>
		<td data-name="NotProgressive2" <?php echo $ivf_art_summary_view->NotProgressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive2" type="text/html"><span id="el_ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary_view->NotProgressive2->viewAttributes() ?>><?php echo $ivf_art_summary_view->NotProgressive2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Motility2->Visible) { // Motility2 ?>
	<tr id="r_Motility2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Motility2"><script id="tpc_ivf_art_summary_Motility2" type="text/html"><?php echo $ivf_art_summary_view->Motility2->caption() ?></script></span></td>
		<td data-name="Motility2" <?php echo $ivf_art_summary_view->Motility2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Motility2" type="text/html"><span id="el_ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary_view->Motility2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Motility2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary_view->Morphology2->Visible) { // Morphology2 ?>
	<tr id="r_Morphology2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Morphology2"><script id="tpc_ivf_art_summary_Morphology2" type="text/html"><?php echo $ivf_art_summary_view->Morphology2->caption() ?></script></span></td>
		<td data-name="Morphology2" <?php echo $ivf_art_summary_view->Morphology2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Morphology2" type="text/html"><span id="el_ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary_view->Morphology2->viewAttributes() ?>><?php echo $ivf_art_summary_view->Morphology2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_art_summaryview" class="ew-custom-template"></div>
<script id="tpm_ivf_art_summaryview" type="text/html">
<div id="ct_ivf_art_summary_view"><style>
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
				<h3 class="card-title">CHARACTERSTICS OF CYCLE</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_ARTCycle")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Spermorigin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Spermorigin")/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_InseminatinTechnique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_InseminatinTechnique")/}}</span>
				 </td>
				 <td>					
				 </td>
		 </tr>
		  <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_IndicationforART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_IndicationforART")/}}</span>
				</td>
				<td>				
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ICSIDetails"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_ICSIDetails")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_DateofICSI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_DateofICSI")/}}</span>
				</td>
		 </tr>		 
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
				<h3 class="card-title">FOLLICULAR RETRIEVAL</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Mature Oocytes</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Immature Oocytes</span>
				 </td>
				 <td>
					<span class="ew-cell">Fertilisation details</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_M2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_M2")/}}</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_M1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_M1")/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Normal2PN"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Normal2PN")/}}</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Mi2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Mi2")/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_GV"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_GV")/}}</span>
				 </td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Abnormalfertilisation1N"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Abnormalfertilisation1N")/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:33%">
					 <span class="ew-cell"></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Others"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Others")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Abnormalfertilisation3N"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Abnormalfertilisation3N")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ICSI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_ICSI")/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotFertilized"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_NotFertilized")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_IVF"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_IVF")/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Degenerated"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Degenerated")/}}</span>
				</td>
		 </tr>		
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Sperm</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Origin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Origin")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Status")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Method"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Method")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_SpermDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_SpermDate")/}}</span>
				  </div>		   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spermiogram</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Pre Capacitation</span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Post Capacitation</span>
				</td>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:25%">
					<span class="ew-cell">Volume (ml.) </span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Volume")/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Volume1")/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Volume2")/}}</span>
				 </td>
		 </tr>
		  <tr>
				<td>
					<span class="ew-cell">Concentration (mili/ml)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Concentration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_pre_Concentration")/}}</span>
				 </td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Concentration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_post_Concentration")/}}</span>
				</td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Concentration2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Concentration2")/}}</span>
				</td>
		 </tr>
		 <tr>
				<td>
					 <span class="ew-cell">Total</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Total")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Total1")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Total2")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Progressive")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Progressive1")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Progressive2")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Not Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_NotProgressive")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_NotProgressive1")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_NotProgressive2")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Motility (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Motility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_pre_Motility")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Motility"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_post_Motility")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Motility2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Motility2")/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Morphology (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Morphology"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_pre_Morphology")/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Morphology"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_post_Morphology")/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Morphology2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Morphology2")/}}</span>
				</td>
		 </tr>	
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
				<h3 class="card-title">Summary of Embryo transfer( ET)</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_DateofET"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_DateofET")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NumberofEmbryostransferred"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_NumberofEmbryostransferred")/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Reasonfornotranfer"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Reasonfornotranfer")/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Embryosunderobservation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Embryosunderobservation")/}}</span>
				 </td>
		 </tr>
  		  <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_EmbryosCryopreserved"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_EmbryosCryopreserved")/}}</span>
				</td>
				<td>				
				</td>
		 </tr>
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
				<h3 class="card-title">Embryo Development Summary</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:16%">
					<span class="ew-cell">Embryo</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Code</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Day</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Cell Stage</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Grade</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">State</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">1</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Code1")/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Day1")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_CellStage1")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Grade1")/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_State1")/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">2</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Code2")/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Day2")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_CellStage2")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Grade2")/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_State2")/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">3</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Code3")/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Day3")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_CellStage3")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Grade3")/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_State3")/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">4</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Code4")/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Day4")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_CellStage4")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Grade4")/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_State4")/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">5</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Code5")/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Day5")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_CellStage5")/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_Grade5")/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State5"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_State5")/}}</span>
				 </td>
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
				<td style="width:33%">
					<span class="ew-cell">Legend Cell Stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"></span>
				</td>
					<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">cleavage stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Day 3 embryos</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">CM : Compacting Morula</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">CB : Cavitated Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">XB : Expanded Blastocyst</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">iHB : Hatching Blastocyst</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">HB : Hatched Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">EB : Early Blastocyst</span>
				 </td>
		 </tr>
	</tbody>
</table>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_EmbryologistSignature"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_EmbryologistSignature")/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ConsultantsSignature"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_art_summary_ConsultantsSignature")/}}</span>
				</td>
		 </tr>	 
	</tbody>
</table>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_art_summary->Rows) ?> };
	ew.applyTemplate("tpd_ivf_art_summaryview", "tpm_ivf_art_summaryview", "ivf_art_summaryview", "<?php echo $ivf_art_summary->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_art_summaryview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_art_summary_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_art_summary_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_M2").style.width="180px",document.getElementById("x_M1").style.width="180px",document.getElementById("x_Normal2PN").style.width="180px",document.getElementById("x_Mi2").style.width="180px",document.getElementById("x_GV").style.width="180px",document.getElementById("x_Abnormalfertilisation1N").style.width="180px",document.getElementById("x_Others").style.width="180px",document.getElementById("x_Abnormalfertilisation3N").style.width="180px",document.getElementById("x_ICSI").style.width="180px",document.getElementById("x_NotFertilized").style.width="180px",document.getElementById("x_IVF").style.width="180px",document.getElementById("x_Degenerated").style.width="180px",document.getElementById("x_pre_Concentration").style.width="180px",document.getElementById("x_post_Concentration").style.width="180px",document.getElementById("x_pre_Motility").style.width="180px",document.getElementById("x_post_Motility").style.width="180px",document.getElementById("x_pre_Morphology").style.width="180px",document.getElementById("x_post_Morphology").style.width="180px",document.getElementById("x_Volume").style.width="180px",document.getElementById("x_Volume1").style.width="180px",document.getElementById("x_Volume2").style.width="180px",document.getElementById("x_Concentration2").style.width="180px",document.getElementById("x_Total").style.width="180px",document.getElementById("x_Total1").style.width="180px",document.getElementById("x_Total2").style.width="180px",document.getElementById("x_Progressive").style.width="180px",document.getElementById("x_Progressive1").style.width="180px",document.getElementById("x_Progressive2").style.width="180px",document.getElementById("x_NotProgressive").style.width="180px",document.getElementById("x_NotProgressive1").style.width="180px",document.getElementById("x_NotProgressive2").style.width="180px",document.getElementById("x_Motility2").style.width="180px",document.getElementById("x_Morphology2").style.width="180px",document.getElementById("x_Code1").style.width="180px",document.getElementById("x_Day1").style.width="180px",document.getElementById("x_CellStage1").style.width="180px",document.getElementById("x_Grade1").style.width="180px",document.getElementById("x_State1").style.width="180px",document.getElementById("x_Code2").style.width="180px",document.getElementById("x_Day2").style.width="180px",document.getElementById("x_CellStage2").style.width="180px",document.getElementById("x_Grade2").style.width="180px",document.getElementById("x_State2").style.width="180px",document.getElementById("x_Code3").style.width="180px",document.getElementById("x_Day3").style.width="180px",document.getElementById("x_CellStage3").style.width="180px",document.getElementById("x_Grade3").style.width="180px",document.getElementById("x_State3").style.width="180px",document.getElementById("x_Code4").style.width="180px",document.getElementById("x_Day4").style.width="180px",document.getElementById("x_CellStage4").style.width="180px",document.getElementById("x_Grade4").style.width="180px",document.getElementById("x_State4").style.width="180px",document.getElementById("x_Code5").style.width="180px",document.getElementById("x_Day5").style.width="180px",document.getElementById("x_CellStage5").style.width="180px",document.getElementById("x_Grade5").style.width="180px",document.getElementById("x_State5").style.width="180px";
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_art_summary_view->terminate();
?>