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
<?php include_once "header.php" ?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_et_chartview = currentForm = new ew.Form("fivf_et_chartview", "view");

// Form_CustomValidate event
fivf_et_chartview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_et_chartview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_et_chartview.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_view->ARTCycle->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_view->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_view->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_view->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_view->PreTreatment->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_view->PreTreatment->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_view->Hysteroscopy->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_view->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_view->EndometrialScratching->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_view->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_view->TrialCannulation->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_view->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_view->CYCLETYPE->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_view->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_view->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_view->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_GCSF"] = <?php echo $ivf_et_chart_view->GCSF->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_view->GCSF->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_view->ActivatedPRP->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_view->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_ERA"] = <?php echo $ivf_et_chart_view->ERA->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_view->ERA->options(FALSE, TRUE)) ?>;
fivf_et_chartview.lists["x_TemplateProcedureRecord"] = <?php echo $ivf_et_chart_view->TemplateProcedureRecord->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_TemplateProcedureRecord"].options = <?php echo JsonEncode($ivf_et_chart_view->TemplateProcedureRecord->lookupOptions()) ?>;
fivf_et_chartview.lists["x_TemplateMedicationsadvised"] = <?php echo $ivf_et_chart_view->TemplateMedicationsadvised->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_TemplateMedicationsadvised"].options = <?php echo JsonEncode($ivf_et_chart_view->TemplateMedicationsadvised->lookupOptions()) ?>;
fivf_et_chartview.lists["x_TemplatePostProcedureInstructions"] = <?php echo $ivf_et_chart_view->TemplatePostProcedureInstructions->Lookup->toClientList() ?>;
fivf_et_chartview.lists["x_TemplatePostProcedureInstructions"].options = <?php echo JsonEncode($ivf_et_chart_view->TemplatePostProcedureInstructions->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_et_chart->isExport()) { ?>
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
<?php if ($ivf_et_chart_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_et_chart_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_et_chart_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_et_chart->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_id"><script id="tpc_ivf_et_chart_id" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_et_chart->id->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_id" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<?php echo $ivf_et_chart->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_RIDNo"><script id="tpc_ivf_et_chart_RIDNo" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->RIDNo->caption() ?></span></script></span></td>
		<td data-name="RIDNo"<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_RIDNo" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Name"><script id="tpc_ivf_et_chart_Name" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Name" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<?php echo $ivf_et_chart->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ARTCycle"><script id="tpc_ivf_et_chart_ARTCycle" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ARTCycle->caption() ?></span></script></span></td>
		<td data-name="ARTCycle"<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ARTCycle" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_et_chart->ARTCycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Consultant"><script id="tpc_ivf_et_chart_Consultant" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Consultant" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_et_chart->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_InseminatinTechnique"><script id="tpc_ivf_et_chart_InseminatinTechnique" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></span></script></span></td>
		<td data-name="InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_InseminatinTechnique" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_et_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
	<tr id="r_IndicationForART">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_IndicationForART"><script id="tpc_ivf_et_chart_IndicationForART" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->IndicationForART->caption() ?></span></script></span></td>
		<td data-name="IndicationForART"<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_IndicationForART" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_et_chart->IndicationForART->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
	<tr id="r_PreTreatment">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PreTreatment"><script id="tpc_ivf_et_chart_PreTreatment" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->PreTreatment->caption() ?></span></script></span></td>
		<td data-name="PreTreatment"<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PreTreatment" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<?php echo $ivf_et_chart->PreTreatment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<tr id="r_Hysteroscopy">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Hysteroscopy"><script id="tpc_ivf_et_chart_Hysteroscopy" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></span></script></span></td>
		<td data-name="Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Hysteroscopy" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_et_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<tr id="r_EndometrialScratching">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_EndometrialScratching"><script id="tpc_ivf_et_chart_EndometrialScratching" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></span></script></span></td>
		<td data-name="EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_EndometrialScratching" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_et_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<tr id="r_TrialCannulation">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TrialCannulation"><script id="tpc_ivf_et_chart_TrialCannulation" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->TrialCannulation->caption() ?></span></script></span></td>
		<td data-name="TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TrialCannulation" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_et_chart->TrialCannulation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<tr id="r_CYCLETYPE">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CYCLETYPE"><script id="tpc_ivf_et_chart_CYCLETYPE" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></span></script></span></td>
		<td data-name="CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CYCLETYPE" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_et_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<tr id="r_HRTCYCLE">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_HRTCYCLE"><script id="tpc_ivf_et_chart_HRTCYCLE" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></span></script></span></td>
		<td data-name="HRTCYCLE"<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_HRTCYCLE" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_et_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<tr id="r_OralEstrogenDosage">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage"><script id="tpc_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></span></script></span></td>
		<td data-name="OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_et_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<tr id="r_VaginalEstrogen">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_VaginalEstrogen"><script id="tpc_ivf_et_chart_VaginalEstrogen" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></span></script></span></td>
		<td data-name="VaginalEstrogen"<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_VaginalEstrogen" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_et_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
	<tr id="r_GCSF">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_GCSF"><script id="tpc_ivf_et_chart_GCSF" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->GCSF->caption() ?></span></script></span></td>
		<td data-name="GCSF"<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_GCSF" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_et_chart->GCSF->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<tr id="r_ActivatedPRP">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ActivatedPRP"><script id="tpc_ivf_et_chart_ActivatedPRP" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></span></script></span></td>
		<td data-name="ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ActivatedPRP" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_et_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
	<tr id="r_ERA">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ERA"><script id="tpc_ivf_et_chart_ERA" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ERA->caption() ?></span></script></span></td>
		<td data-name="ERA"<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ERA" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_et_chart->ERA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
	<tr id="r_UCLcm">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_UCLcm"><script id="tpc_ivf_et_chart_UCLcm" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->UCLcm->caption() ?></span></script></span></td>
		<td data-name="UCLcm"<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_UCLcm" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_et_chart->UCLcm->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<tr id="r_DATEOFSTART">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFSTART"><script id="tpc_ivf_et_chart_DATEOFSTART" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></span></script></span></td>
		<td data-name="DATEOFSTART"<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFSTART" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFSTART->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<tr id="r_DATEOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER"><script id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></span></script></span></td>
		<td data-name="DATEOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<tr id="r_DAYOFEMBRYOTRANSFER">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER"><script id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></span></script></span></td>
		<td data-name="DAYOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<tr id="r_NOOFEMBRYOSTHAWED">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></span></script></span></td>
		<td data-name="NOOFEMBRYOSTHAWED"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<tr id="r_NOOFEMBRYOSTRANSFERRED">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span></script></span></td>
		<td data-name="NOOFEMBRYOSTRANSFERRED"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<tr id="r_DAYOFEMBRYOS">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS"><script id="tpc_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></span></script></span></td>
		<td data-name="DAYOFEMBRYOS"<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<tr id="r_CRYOPRESERVEDEMBRYOS">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><script id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span></script></span></td>
		<td data-name="CRYOPRESERVEDEMBRYOS"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
	<tr id="r_Code1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code1"><script id="tpc_ivf_et_chart_Code1" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Code1->caption() ?></span></script></span></td>
		<td data-name="Code1"<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code1" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
	<tr id="r_Code2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code2"><script id="tpc_ivf_et_chart_Code2" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Code2->caption() ?></span></script></span></td>
		<td data-name="Code2"<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code2" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
	<tr id="r_CellStage1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage1"><script id="tpc_ivf_et_chart_CellStage1" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->CellStage1->caption() ?></span></script></span></td>
		<td data-name="CellStage1"<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage1" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
	<tr id="r_CellStage2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage2"><script id="tpc_ivf_et_chart_CellStage2" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->CellStage2->caption() ?></span></script></span></td>
		<td data-name="CellStage2"<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage2" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
	<tr id="r_Grade1">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade1"><script id="tpc_ivf_et_chart_Grade1" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Grade1->caption() ?></span></script></span></td>
		<td data-name="Grade1"<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade1" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
	<tr id="r_Grade2">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade2"><script id="tpc_ivf_et_chart_Grade2" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Grade2->caption() ?></span></script></span></td>
		<td data-name="Grade2"<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade2" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ProcedureRecord->Visible) { // ProcedureRecord ?>
	<tr id="r_ProcedureRecord">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ProcedureRecord"><script id="tpc_ivf_et_chart_ProcedureRecord" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ProcedureRecord->caption() ?></span></script></span></td>
		<td data-name="ProcedureRecord"<?php echo $ivf_et_chart->ProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ProcedureRecord" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ProcedureRecord">
<span<?php echo $ivf_et_chart->ProcedureRecord->viewAttributes() ?>>
<?php echo $ivf_et_chart->ProcedureRecord->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->Medicationsadvised->Visible) { // Medicationsadvised ?>
	<tr id="r_Medicationsadvised">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Medicationsadvised"><script id="tpc_ivf_et_chart_Medicationsadvised" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->Medicationsadvised->caption() ?></span></script></span></td>
		<td data-name="Medicationsadvised"<?php echo $ivf_et_chart->Medicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Medicationsadvised" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_Medicationsadvised">
<span<?php echo $ivf_et_chart->Medicationsadvised->viewAttributes() ?>>
<?php echo $ivf_et_chart->Medicationsadvised->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
	<tr id="r_PostProcedureInstructions">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PostProcedureInstructions"><script id="tpc_ivf_et_chart_PostProcedureInstructions" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->PostProcedureInstructions->caption() ?></span></script></span></td>
		<td data-name="PostProcedureInstructions"<?php echo $ivf_et_chart->PostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PostProcedureInstructions" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_PostProcedureInstructions">
<span<?php echo $ivf_et_chart->PostProcedureInstructions->viewAttributes() ?>>
<?php echo $ivf_et_chart->PostProcedureInstructions->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<tr id="r_PregnancyTestingWithSerumBetaHcG">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><script id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></span></script></span></td>
		<td data-name="PregnancyTestingWithSerumBetaHcG"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
	<tr id="r_ReviewDate">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDate"><script id="tpc_ivf_et_chart_ReviewDate" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ReviewDate->caption() ?></span></script></span></td>
		<td data-name="ReviewDate"<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDate" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<tr id="r_ReviewDoctor">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDoctor"><script id="tpc_ivf_et_chart_ReviewDoctor" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></span></script></span></td>
		<td data-name="ReviewDoctor"<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDoctor" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDoctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
	<tr id="r_TemplateProcedureRecord">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateProcedureRecord"><script id="tpc_ivf_et_chart_TemplateProcedureRecord" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->TemplateProcedureRecord->caption() ?></span></script></span></td>
		<td data-name="TemplateProcedureRecord"<?php echo $ivf_et_chart->TemplateProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateProcedureRecord" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_TemplateProcedureRecord">
<span<?php echo $ivf_et_chart->TemplateProcedureRecord->viewAttributes() ?>>
<?php echo $ivf_et_chart->TemplateProcedureRecord->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
	<tr id="r_TemplateMedicationsadvised">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateMedicationsadvised"><script id="tpc_ivf_et_chart_TemplateMedicationsadvised" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->TemplateMedicationsadvised->caption() ?></span></script></span></td>
		<td data-name="TemplateMedicationsadvised"<?php echo $ivf_et_chart->TemplateMedicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateMedicationsadvised" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_TemplateMedicationsadvised">
<span<?php echo $ivf_et_chart->TemplateMedicationsadvised->viewAttributes() ?>>
<?php echo $ivf_et_chart->TemplateMedicationsadvised->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
	<tr id="r_TemplatePostProcedureInstructions">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplatePostProcedureInstructions"><script id="tpc_ivf_et_chart_TemplatePostProcedureInstructions" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->TemplatePostProcedureInstructions->caption() ?></span></script></span></td>
		<td data-name="TemplatePostProcedureInstructions"<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplatePostProcedureInstructions" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<span<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->viewAttributes() ?>>
<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_et_chart_view->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TidNo"><script id="tpc_ivf_et_chart_TidNo" class="ivf_et_chartview" type="text/html"><span><?php echo $ivf_et_chart->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TidNo" class="ivf_et_chartview" type="text/html">
<span id="el_ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->TidNo->getViewValue() ?></span>
</span>
</script>
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
{{include tmpl="#tpx_RIDNO"/}}
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ARTCycle"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ARTCycle"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Consultant"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Consultant"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_InseminatinTechnique"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_InseminatinTechnique"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_IndicationForART"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_IndicationForART"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PreTreatment"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_PreTreatment"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Hysteroscopy"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Hysteroscopy"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_EndometrialScratching"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_EndometrialScratching"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_TrialCannulation"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_TrialCannulation"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CYCLETYPE"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_CYCLETYPE"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_HRTCYCLE"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_HRTCYCLE"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_OralEstrogenDosage"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_OralEstrogenDosage"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_VaginalEstrogen"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_VaginalEstrogen"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_GCSF"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_GCSF"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ActivatedPRP"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ActivatedPRP"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ERA"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ERA"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_UCLcm"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_UCLcm"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFSTART"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_DATEOFSTART"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_NOOFEMBRYOSTHAWED"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOS"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_DAYOFEMBRYOS"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS"/}}</span>
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
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code1"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Code1"/}}</span></td>
					<td><span class="ew-cell">D5</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage1"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_CellStage1"/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade1"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Grade1"/}}</span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
				<tr>
					<td><span class="ew-cell">2</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code2"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Code2"/}}</span></td>
					<td><span class="ew-cell">D6</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage2"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_CellStage2"/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade2"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Grade2"/}}</span></td>
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
				  {{include tmpl="#tpc_ivf_et_chart_TemplateProcedureRecord"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_TemplateProcedureRecord"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ProcedureRecord"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ProcedureRecord"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplateMedicationsadvised"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_TemplateMedicationsadvised"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Medicationsadvised"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_Medicationsadvised"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplatePostProcedureInstructions"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_TemplatePostProcedureInstructions"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PostProcedureInstructions"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_PostProcedureInstructions"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDate"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ReviewDate"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDoctor"/}}&nbsp;{{include tmpl="#tpx_ivf_et_chart_ReviewDoctor"/}}</span>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_et_chart->Rows) ?> };
ew.applyTemplate("tpd_ivf_et_chartview", "tpm_ivf_et_chartview", "ivf_et_chartview", "<?php echo $ivf_et_chart->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_et_chartview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_et_chart_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_et_chart_view->terminate();
?>