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
$ivf_et_chart_view = new ivf_et_chart_view();

// Run the page
$ivf_et_chart_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_et_chart_view->isExport()) { ?>
<script>
var fivf_et_chartview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_et_chartview = currentForm = new ew.Form("fivf_et_chartview", "view");
	loadjs.done("fivf_et_chartview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_et_chart_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_et_chart_view->ExportOptions->render("body") ?>
<?php $ivf_et_chart_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_et_chart_view->showPageHeader(); ?>
<?php
$ivf_et_chart_view->showMessage();
?>
<form name="fivf_et_chartview" id="fivf_et_chartview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_et_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_et_chart_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_id"><script id="tpc_ivf_et_chart_id" type="text/html"><?php echo $ivf_et_chart_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_et_chart_view->id->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_id" type="text/html"><span id="el_ivf_et_chart_id">
<span<?php echo $ivf_et_chart_view->id->viewAttributes() ?>><?php echo $ivf_et_chart_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_RIDNo"><script id="tpc_ivf_et_chart_RIDNo" type="text/html"><?php echo $ivf_et_chart_view->RIDNo->caption() ?></script></span></td>
		<td data-name="RIDNo" <?php echo $ivf_et_chart_view->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_RIDNo" type="text/html"><span id="el_ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart_view->RIDNo->viewAttributes() ?>><?php echo $ivf_et_chart_view->RIDNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Name"><script id="tpc_ivf_et_chart_Name" type="text/html"><?php echo $ivf_et_chart_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_et_chart_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Name" type="text/html"><span id="el_ivf_et_chart_Name">
<span<?php echo $ivf_et_chart_view->Name->viewAttributes() ?>><?php echo $ivf_et_chart_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ARTCycle"><script id="tpc_ivf_et_chart_ARTCycle" type="text/html"><?php echo $ivf_et_chart_view->ARTCycle->caption() ?></script></span></td>
		<td data-name="ARTCycle" <?php echo $ivf_et_chart_view->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ARTCycle" type="text/html"><span id="el_ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart_view->ARTCycle->viewAttributes() ?>><?php echo $ivf_et_chart_view->ARTCycle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Consultant"><script id="tpc_ivf_et_chart_Consultant" type="text/html"><?php echo $ivf_et_chart_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $ivf_et_chart_view->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Consultant" type="text/html"><span id="el_ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart_view->Consultant->viewAttributes() ?>><?php echo $ivf_et_chart_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_InseminatinTechnique"><script id="tpc_ivf_et_chart_InseminatinTechnique" type="text/html"><?php echo $ivf_et_chart_view->InseminatinTechnique->caption() ?></script></span></td>
		<td data-name="InseminatinTechnique" <?php echo $ivf_et_chart_view->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_InseminatinTechnique" type="text/html"><span id="el_ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart_view->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_et_chart_view->InseminatinTechnique->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_IndicationForART"><script id="tpc_ivf_et_chart_IndicationForART" type="text/html"><?php echo $ivf_et_chart_view->IndicationForART->caption() ?></script></span></td>
		<td data-name="IndicationForART" <?php echo $ivf_et_chart_view->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_IndicationForART" type="text/html"><span id="el_ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart_view->IndicationForART->viewAttributes() ?>><?php echo $ivf_et_chart_view->IndicationForART->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->PreTreatment->Visible) { // PreTreatment ?>
	<tr id="r_PreTreatment">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PreTreatment"><script id="tpc_ivf_et_chart_PreTreatment" type="text/html"><?php echo $ivf_et_chart_view->PreTreatment->caption() ?></script></span></td>
		<td data-name="PreTreatment" <?php echo $ivf_et_chart_view->PreTreatment->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PreTreatment" type="text/html"><span id="el_ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart_view->PreTreatment->viewAttributes() ?>><?php echo $ivf_et_chart_view->PreTreatment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<tr id="r_Hysteroscopy">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Hysteroscopy"><script id="tpc_ivf_et_chart_Hysteroscopy" type="text/html"><?php echo $ivf_et_chart_view->Hysteroscopy->caption() ?></script></span></td>
		<td data-name="Hysteroscopy" <?php echo $ivf_et_chart_view->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Hysteroscopy" type="text/html"><span id="el_ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart_view->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_et_chart_view->Hysteroscopy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<tr id="r_EndometrialScratching">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_EndometrialScratching"><script id="tpc_ivf_et_chart_EndometrialScratching" type="text/html"><?php echo $ivf_et_chart_view->EndometrialScratching->caption() ?></script></span></td>
		<td data-name="EndometrialScratching" <?php echo $ivf_et_chart_view->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_EndometrialScratching" type="text/html"><span id="el_ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart_view->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_et_chart_view->EndometrialScratching->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->TrialCannulation->Visible) { // TrialCannulation ?>
	<tr id="r_TrialCannulation">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TrialCannulation"><script id="tpc_ivf_et_chart_TrialCannulation" type="text/html"><?php echo $ivf_et_chart_view->TrialCannulation->caption() ?></script></span></td>
		<td data-name="TrialCannulation" <?php echo $ivf_et_chart_view->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TrialCannulation" type="text/html"><span id="el_ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart_view->TrialCannulation->viewAttributes() ?>><?php echo $ivf_et_chart_view->TrialCannulation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<tr id="r_CYCLETYPE">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CYCLETYPE"><script id="tpc_ivf_et_chart_CYCLETYPE" type="text/html"><?php echo $ivf_et_chart_view->CYCLETYPE->caption() ?></script></span></td>
		<td data-name="CYCLETYPE" <?php echo $ivf_et_chart_view->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CYCLETYPE" type="text/html"><span id="el_ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart_view->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_et_chart_view->CYCLETYPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<tr id="r_HRTCYCLE">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_HRTCYCLE"><script id="tpc_ivf_et_chart_HRTCYCLE" type="text/html"><?php echo $ivf_et_chart_view->HRTCYCLE->caption() ?></script></span></td>
		<td data-name="HRTCYCLE" <?php echo $ivf_et_chart_view->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_HRTCYCLE" type="text/html"><span id="el_ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart_view->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_et_chart_view->HRTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<tr id="r_OralEstrogenDosage">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage"><script id="tpc_ivf_et_chart_OralEstrogenDosage" type="text/html"><?php echo $ivf_et_chart_view->OralEstrogenDosage->caption() ?></script></span></td>
		<td data-name="OralEstrogenDosage" <?php echo $ivf_et_chart_view->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_OralEstrogenDosage" type="text/html"><span id="el_ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart_view->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_et_chart_view->OralEstrogenDosage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<tr id="r_VaginalEstrogen">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_VaginalEstrogen"><script id="tpc_ivf_et_chart_VaginalEstrogen" type="text/html"><?php echo $ivf_et_chart_view->VaginalEstrogen->caption() ?></script></span></td>
		<td data-name="VaginalEstrogen" <?php echo $ivf_et_chart_view->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_VaginalEstrogen" type="text/html"><span id="el_ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart_view->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_et_chart_view->VaginalEstrogen->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->GCSF->Visible) { // GCSF ?>
	<tr id="r_GCSF">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_GCSF"><script id="tpc_ivf_et_chart_GCSF" type="text/html"><?php echo $ivf_et_chart_view->GCSF->caption() ?></script></span></td>
		<td data-name="GCSF" <?php echo $ivf_et_chart_view->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_GCSF" type="text/html"><span id="el_ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart_view->GCSF->viewAttributes() ?>><?php echo $ivf_et_chart_view->GCSF->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<tr id="r_ActivatedPRP">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ActivatedPRP"><script id="tpc_ivf_et_chart_ActivatedPRP" type="text/html"><?php echo $ivf_et_chart_view->ActivatedPRP->caption() ?></script></span></td>
		<td data-name="ActivatedPRP" <?php echo $ivf_et_chart_view->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ActivatedPRP" type="text/html"><span id="el_ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart_view->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_et_chart_view->ActivatedPRP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ERA->Visible) { // ERA ?>
	<tr id="r_ERA">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ERA"><script id="tpc_ivf_et_chart_ERA" type="text/html"><?php echo $ivf_et_chart_view->ERA->caption() ?></script></span></td>
		<td data-name="ERA" <?php echo $ivf_et_chart_view->ERA->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ERA" type="text/html"><span id="el_ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart_view->ERA->viewAttributes() ?>><?php echo $ivf_et_chart_view->ERA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->UCLcm->Visible) { // UCLcm ?>
	<tr id="r_UCLcm">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_UCLcm"><script id="tpc_ivf_et_chart_UCLcm" type="text/html"><?php echo $ivf_et_chart_view->UCLcm->caption() ?></script></span></td>
		<td data-name="UCLcm" <?php echo $ivf_et_chart_view->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_UCLcm" type="text/html"><span id="el_ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart_view->UCLcm->viewAttributes() ?>><?php echo $ivf_et_chart_view->UCLcm->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<tr id="r_DATEOFSTART">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFSTART"><script id="tpc_ivf_et_chart_DATEOFSTART" type="text/html"><?php echo $ivf_et_chart_view->DATEOFSTART->caption() ?></script></span></td>
		<td data-name="DATEOFSTART" <?php echo $ivf_et_chart_view->DATEOFSTART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFSTART" type="text/html"><span id="el_ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart_view->DATEOFSTART->viewAttributes() ?>><?php echo $ivf_et_chart_view->DATEOFSTART->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<tr id="r_DATEOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER"><script id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_et_chart_view->DATEOFEMBRYOTRANSFER->caption() ?></script></span></td>
		<td data-name="DATEOFEMBRYOTRANSFER" <?php echo $ivf_et_chart_view->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_view->DATEOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_view->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<tr id="r_DAYOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER"><script id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_et_chart_view->DAYOFEMBRYOTRANSFER->caption() ?></script></span></td>
		<td data-name="DAYOFEMBRYOTRANSFER" <?php echo $ivf_et_chart_view->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_view->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_view->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<tr id="r_NOOFEMBRYOSTHAWED">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED" type="text/html"><?php echo $ivf_et_chart_view->NOOFEMBRYOSTHAWED->caption() ?></script></span></td>
		<td data-name="NOOFEMBRYOSTHAWED" <?php echo $ivf_et_chart_view->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED" type="text/html"><span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart_view->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_et_chart_view->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<tr id="r_NOOFEMBRYOSTRANSFERRED">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><?php echo $ivf_et_chart_view->NOOFEMBRYOSTRANSFERRED->caption() ?></script></span></td>
		<td data-name="NOOFEMBRYOSTRANSFERRED" <?php echo $ivf_et_chart_view->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart_view->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_et_chart_view->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<tr id="r_DAYOFEMBRYOS">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS"><script id="tpc_ivf_et_chart_DAYOFEMBRYOS" type="text/html"><?php echo $ivf_et_chart_view->DAYOFEMBRYOS->caption() ?></script></span></td>
		<td data-name="DAYOFEMBRYOS" <?php echo $ivf_et_chart_view->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOS" type="text/html"><span id="el_ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart_view->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_view->DAYOFEMBRYOS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<tr id="r_CRYOPRESERVEDEMBRYOS">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><script id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><?php echo $ivf_et_chart_view->CRYOPRESERVEDEMBRYOS->caption() ?></script></span></td>
		<td data-name="CRYOPRESERVEDEMBRYOS" <?php echo $ivf_et_chart_view->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart_view->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_view->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Code1->Visible) { // Code1 ?>
	<tr id="r_Code1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code1"><script id="tpc_ivf_et_chart_Code1" type="text/html"><?php echo $ivf_et_chart_view->Code1->caption() ?></script></span></td>
		<td data-name="Code1" <?php echo $ivf_et_chart_view->Code1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code1" type="text/html"><span id="el_ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart_view->Code1->viewAttributes() ?>><?php echo $ivf_et_chart_view->Code1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Code2->Visible) { // Code2 ?>
	<tr id="r_Code2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code2"><script id="tpc_ivf_et_chart_Code2" type="text/html"><?php echo $ivf_et_chart_view->Code2->caption() ?></script></span></td>
		<td data-name="Code2" <?php echo $ivf_et_chart_view->Code2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code2" type="text/html"><span id="el_ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart_view->Code2->viewAttributes() ?>><?php echo $ivf_et_chart_view->Code2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->CellStage1->Visible) { // CellStage1 ?>
	<tr id="r_CellStage1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage1"><script id="tpc_ivf_et_chart_CellStage1" type="text/html"><?php echo $ivf_et_chart_view->CellStage1->caption() ?></script></span></td>
		<td data-name="CellStage1" <?php echo $ivf_et_chart_view->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage1" type="text/html"><span id="el_ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart_view->CellStage1->viewAttributes() ?>><?php echo $ivf_et_chart_view->CellStage1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->CellStage2->Visible) { // CellStage2 ?>
	<tr id="r_CellStage2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage2"><script id="tpc_ivf_et_chart_CellStage2" type="text/html"><?php echo $ivf_et_chart_view->CellStage2->caption() ?></script></span></td>
		<td data-name="CellStage2" <?php echo $ivf_et_chart_view->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage2" type="text/html"><span id="el_ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart_view->CellStage2->viewAttributes() ?>><?php echo $ivf_et_chart_view->CellStage2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Grade1->Visible) { // Grade1 ?>
	<tr id="r_Grade1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade1"><script id="tpc_ivf_et_chart_Grade1" type="text/html"><?php echo $ivf_et_chart_view->Grade1->caption() ?></script></span></td>
		<td data-name="Grade1" <?php echo $ivf_et_chart_view->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade1" type="text/html"><span id="el_ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart_view->Grade1->viewAttributes() ?>><?php echo $ivf_et_chart_view->Grade1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Grade2->Visible) { // Grade2 ?>
	<tr id="r_Grade2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade2"><script id="tpc_ivf_et_chart_Grade2" type="text/html"><?php echo $ivf_et_chart_view->Grade2->caption() ?></script></span></td>
		<td data-name="Grade2" <?php echo $ivf_et_chart_view->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade2" type="text/html"><span id="el_ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart_view->Grade2->viewAttributes() ?>><?php echo $ivf_et_chart_view->Grade2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ProcedureRecord->Visible) { // ProcedureRecord ?>
	<tr id="r_ProcedureRecord">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ProcedureRecord"><script id="tpc_ivf_et_chart_ProcedureRecord" type="text/html"><?php echo $ivf_et_chart_view->ProcedureRecord->caption() ?></script></span></td>
		<td data-name="ProcedureRecord" <?php echo $ivf_et_chart_view->ProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ProcedureRecord" type="text/html"><span id="el_ivf_et_chart_ProcedureRecord">
<span<?php echo $ivf_et_chart_view->ProcedureRecord->viewAttributes() ?>><?php echo $ivf_et_chart_view->ProcedureRecord->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->Medicationsadvised->Visible) { // Medicationsadvised ?>
	<tr id="r_Medicationsadvised">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Medicationsadvised"><script id="tpc_ivf_et_chart_Medicationsadvised" type="text/html"><?php echo $ivf_et_chart_view->Medicationsadvised->caption() ?></script></span></td>
		<td data-name="Medicationsadvised" <?php echo $ivf_et_chart_view->Medicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Medicationsadvised" type="text/html"><span id="el_ivf_et_chart_Medicationsadvised">
<span<?php echo $ivf_et_chart_view->Medicationsadvised->viewAttributes() ?>><?php echo $ivf_et_chart_view->Medicationsadvised->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
	<tr id="r_PostProcedureInstructions">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PostProcedureInstructions"><script id="tpc_ivf_et_chart_PostProcedureInstructions" type="text/html"><?php echo $ivf_et_chart_view->PostProcedureInstructions->caption() ?></script></span></td>
		<td data-name="PostProcedureInstructions" <?php echo $ivf_et_chart_view->PostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PostProcedureInstructions" type="text/html"><span id="el_ivf_et_chart_PostProcedureInstructions">
<span<?php echo $ivf_et_chart_view->PostProcedureInstructions->viewAttributes() ?>><?php echo $ivf_et_chart_view->PostProcedureInstructions->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<tr id="r_PregnancyTestingWithSerumBetaHcG">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><script id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" type="text/html"><?php echo $ivf_et_chart_view->PregnancyTestingWithSerumBetaHcG->caption() ?></script></span></td>
		<td data-name="PregnancyTestingWithSerumBetaHcG" <?php echo $ivf_et_chart_view->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" type="text/html"><span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart_view->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>><?php echo $ivf_et_chart_view->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ReviewDate->Visible) { // ReviewDate ?>
	<tr id="r_ReviewDate">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDate"><script id="tpc_ivf_et_chart_ReviewDate" type="text/html"><?php echo $ivf_et_chart_view->ReviewDate->caption() ?></script></span></td>
		<td data-name="ReviewDate" <?php echo $ivf_et_chart_view->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDate" type="text/html"><span id="el_ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart_view->ReviewDate->viewAttributes() ?>><?php echo $ivf_et_chart_view->ReviewDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<tr id="r_ReviewDoctor">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDoctor"><script id="tpc_ivf_et_chart_ReviewDoctor" type="text/html"><?php echo $ivf_et_chart_view->ReviewDoctor->caption() ?></script></span></td>
		<td data-name="ReviewDoctor" <?php echo $ivf_et_chart_view->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDoctor" type="text/html"><span id="el_ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart_view->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_et_chart_view->ReviewDoctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
	<tr id="r_TemplateProcedureRecord">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateProcedureRecord"><script id="tpc_ivf_et_chart_TemplateProcedureRecord" type="text/html"><?php echo $ivf_et_chart_view->TemplateProcedureRecord->caption() ?></script></span></td>
		<td data-name="TemplateProcedureRecord" <?php echo $ivf_et_chart_view->TemplateProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateProcedureRecord" type="text/html"><span id="el_ivf_et_chart_TemplateProcedureRecord">
<span<?php echo $ivf_et_chart_view->TemplateProcedureRecord->viewAttributes() ?>><?php echo $ivf_et_chart_view->TemplateProcedureRecord->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
	<tr id="r_TemplateMedicationsadvised">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateMedicationsadvised"><script id="tpc_ivf_et_chart_TemplateMedicationsadvised" type="text/html"><?php echo $ivf_et_chart_view->TemplateMedicationsadvised->caption() ?></script></span></td>
		<td data-name="TemplateMedicationsadvised" <?php echo $ivf_et_chart_view->TemplateMedicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateMedicationsadvised" type="text/html"><span id="el_ivf_et_chart_TemplateMedicationsadvised">
<span<?php echo $ivf_et_chart_view->TemplateMedicationsadvised->viewAttributes() ?>><?php echo $ivf_et_chart_view->TemplateMedicationsadvised->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
	<tr id="r_TemplatePostProcedureInstructions">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplatePostProcedureInstructions"><script id="tpc_ivf_et_chart_TemplatePostProcedureInstructions" type="text/html"><?php echo $ivf_et_chart_view->TemplatePostProcedureInstructions->caption() ?></script></span></td>
		<td data-name="TemplatePostProcedureInstructions" <?php echo $ivf_et_chart_view->TemplatePostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplatePostProcedureInstructions" type="text/html"><span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<span<?php echo $ivf_et_chart_view->TemplatePostProcedureInstructions->viewAttributes() ?>><?php echo $ivf_et_chart_view->TemplatePostProcedureInstructions->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TidNo"><script id="tpc_ivf_et_chart_TidNo" type="text/html"><?php echo $ivf_et_chart_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_et_chart_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TidNo" type="text/html"><span id="el_ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart_view->TidNo->viewAttributes() ?>><?php echo $ivf_et_chart_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_et_chartview" class="ew-custom-template"></div>
<script id="tpm_ivf_et_chartview" type="text/html">
<div id="ct_ivf_et_chart_view"><style>
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
				<h3 class="card-title">ET chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ARTCycle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Consultant")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_InseminatinTechnique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_InseminatinTechnique")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_IndicationForART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_IndicationForART")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PreTreatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PreTreatment")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Hysteroscopy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Hysteroscopy")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_EndometrialScratching"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_EndometrialScratching")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_TrialCannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TrialCannulation")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CYCLETYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CYCLETYPE")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_HRTCYCLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_HRTCYCLE")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_OralEstrogenDosage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_OralEstrogenDosage")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_VaginalEstrogen"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_VaginalEstrogen")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_GCSF"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_GCSF")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ActivatedPRP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ActivatedPRP")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ERA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ERA")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_UCLcm"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_UCLcm")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFSTART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DATEOFSTART")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_NOOFEMBRYOSTHAWED")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DAYOFEMBRYOS")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
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
				<h3 class="card-title">Embryo development summary</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
			<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
			<thead>
				<tr>
					<td ><span class="ew-cell">Embryo</span></td>
					<td ><span class="ew-cell">Code</span></td>
					<td><span class="ew-cell">Day</span></td>
					<td ><span class="ew-cell">Cell Stage</span></td>
					<td><span class="ew-cell">Grade</span></td>
					<td><span class="ew-cell">State</span></td>
					</tr>
		    </thead>
			<tbody>
				<tr>
					<td><span class="ew-cell">1</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Code1")/}}</span></td>
					<td><span class="ew-cell">D5</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CellStage1")/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Grade1")/}}</span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
				<tr>
					<td><span class="ew-cell">2</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Code2")/}}</span></td>
					<td><span class="ew-cell">D6</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CellStage2")/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Grade2")/}}</span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
			</tbody>
			</table>				  
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplateProcedureRecord"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplateProcedureRecord")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ProcedureRecord"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ProcedureRecord")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplateMedicationsadvised"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplateMedicationsadvised")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Medicationsadvised"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Medicationsadvised")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplatePostProcedureInstructions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplatePostProcedureInstructions")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PostProcedureInstructions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PostProcedureInstructions")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ReviewDate")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDoctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ReviewDoctor")/}}</span>
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
	ew.templateData = { rows: <?php echo JsonEncode($ivf_et_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_et_chartview", "tpm_ivf_et_chartview", "ivf_et_chartview", "<?php echo $ivf_et_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_et_chartview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_et_chart_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_et_chart_view->isExport()) { ?>
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
$ivf_et_chart_view->terminate();
?>