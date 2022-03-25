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
<?php include_once "header.php" ?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_art_summaryview = currentForm = new ew.Form("fivf_art_summaryview", "view");

// Form_CustomValidate event
fivf_art_summaryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_art_summaryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_art_summaryview.lists["x_ARTCycle"] = <?php echo $ivf_art_summary_view->ARTCycle->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_art_summary_view->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Spermorigin"] = <?php echo $ivf_art_summary_view->Spermorigin->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Spermorigin"].options = <?php echo JsonEncode($ivf_art_summary_view->Spermorigin->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Origin"] = <?php echo $ivf_art_summary_view->Origin->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Origin"].options = <?php echo JsonEncode($ivf_art_summary_view->Origin->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Status"] = <?php echo $ivf_art_summary_view->Status->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Status"].options = <?php echo JsonEncode($ivf_art_summary_view->Status->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Method"] = <?php echo $ivf_art_summary_view->Method->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Method"].options = <?php echo JsonEncode($ivf_art_summary_view->Method->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_InseminatinTechnique"] = <?php echo $ivf_art_summary_view->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_art_summary_view->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_DateofET"] = <?php echo $ivf_art_summary_view->DateofET->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_DateofET"].options = <?php echo JsonEncode($ivf_art_summary_view->DateofET->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Reasonfornotranfer"] = <?php echo $ivf_art_summary_view->Reasonfornotranfer->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Reasonfornotranfer"].options = <?php echo JsonEncode($ivf_art_summary_view->Reasonfornotranfer->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_ConsultantsSignature"] = <?php echo $ivf_art_summary_view->ConsultantsSignature->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_ConsultantsSignature"].options = <?php echo JsonEncode($ivf_art_summary_view->ConsultantsSignature->lookupOptions()) ?>;
fivf_art_summaryview.lists["x_Day1"] = <?php echo $ivf_art_summary_view->Day1->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Day1"].options = <?php echo JsonEncode($ivf_art_summary_view->Day1->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_CellStage1"] = <?php echo $ivf_art_summary_view->CellStage1->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_CellStage1"].options = <?php echo JsonEncode($ivf_art_summary_view->CellStage1->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Grade1"] = <?php echo $ivf_art_summary_view->Grade1->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Grade1"].options = <?php echo JsonEncode($ivf_art_summary_view->Grade1->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_State1"] = <?php echo $ivf_art_summary_view->State1->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_State1"].options = <?php echo JsonEncode($ivf_art_summary_view->State1->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Day2"] = <?php echo $ivf_art_summary_view->Day2->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Day2"].options = <?php echo JsonEncode($ivf_art_summary_view->Day2->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_CellStage2"] = <?php echo $ivf_art_summary_view->CellStage2->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_CellStage2"].options = <?php echo JsonEncode($ivf_art_summary_view->CellStage2->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Grade2"] = <?php echo $ivf_art_summary_view->Grade2->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Grade2"].options = <?php echo JsonEncode($ivf_art_summary_view->Grade2->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_State2"] = <?php echo $ivf_art_summary_view->State2->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_State2"].options = <?php echo JsonEncode($ivf_art_summary_view->State2->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Day3"] = <?php echo $ivf_art_summary_view->Day3->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Day3"].options = <?php echo JsonEncode($ivf_art_summary_view->Day3->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_CellStage3"] = <?php echo $ivf_art_summary_view->CellStage3->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_CellStage3"].options = <?php echo JsonEncode($ivf_art_summary_view->CellStage3->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Grade3"] = <?php echo $ivf_art_summary_view->Grade3->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Grade3"].options = <?php echo JsonEncode($ivf_art_summary_view->Grade3->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_State3"] = <?php echo $ivf_art_summary_view->State3->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_State3"].options = <?php echo JsonEncode($ivf_art_summary_view->State3->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Day4"] = <?php echo $ivf_art_summary_view->Day4->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Day4"].options = <?php echo JsonEncode($ivf_art_summary_view->Day4->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_CellStage4"] = <?php echo $ivf_art_summary_view->CellStage4->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_CellStage4"].options = <?php echo JsonEncode($ivf_art_summary_view->CellStage4->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Grade4"] = <?php echo $ivf_art_summary_view->Grade4->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Grade4"].options = <?php echo JsonEncode($ivf_art_summary_view->Grade4->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_State4"] = <?php echo $ivf_art_summary_view->State4->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_State4"].options = <?php echo JsonEncode($ivf_art_summary_view->State4->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Day5"] = <?php echo $ivf_art_summary_view->Day5->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Day5"].options = <?php echo JsonEncode($ivf_art_summary_view->Day5->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_CellStage5"] = <?php echo $ivf_art_summary_view->CellStage5->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_CellStage5"].options = <?php echo JsonEncode($ivf_art_summary_view->CellStage5->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_Grade5"] = <?php echo $ivf_art_summary_view->Grade5->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_Grade5"].options = <?php echo JsonEncode($ivf_art_summary_view->Grade5->options(FALSE, TRUE)) ?>;
fivf_art_summaryview.lists["x_State5"] = <?php echo $ivf_art_summary_view->State5->Lookup->toClientList() ?>;
fivf_art_summaryview.lists["x_State5"].options = <?php echo JsonEncode($ivf_art_summary_view->State5->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_art_summary->isExport()) { ?>
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
<?php if ($ivf_art_summary_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_art_summary_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_art_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_art_summary->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_id"><script id="tpc_ivf_art_summary_id" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_art_summary->id->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_id" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<?php echo $ivf_art_summary->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
	<tr id="r_ARTCycle">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ARTCycle"><script id="tpc_ivf_art_summary_ARTCycle" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->ARTCycle->caption() ?></span></script></span></td>
		<td data-name="ARTCycle"<?php echo $ivf_art_summary->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ARTCycle" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_art_summary->ARTCycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
	<tr id="r_Spermorigin">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Spermorigin"><script id="tpc_ivf_art_summary_Spermorigin" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Spermorigin->caption() ?></span></script></span></td>
		<td data-name="Spermorigin"<?php echo $ivf_art_summary->Spermorigin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Spermorigin" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Spermorigin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
	<tr id="r_IndicationforART">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IndicationforART"><script id="tpc_ivf_art_summary_IndicationforART" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->IndicationforART->caption() ?></span></script></span></td>
		<td data-name="IndicationforART"<?php echo $ivf_art_summary->IndicationforART->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IndicationforART" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<?php echo $ivf_art_summary->IndicationforART->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
	<tr id="r_DateofICSI">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofICSI"><script id="tpc_ivf_art_summary_DateofICSI" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->DateofICSI->caption() ?></span></script></span></td>
		<td data-name="DateofICSI"<?php echo $ivf_art_summary->DateofICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofICSI" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofICSI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
	<tr id="r_Origin">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Origin"><script id="tpc_ivf_art_summary_Origin" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Origin->caption() ?></span></script></span></td>
		<td data-name="Origin"<?php echo $ivf_art_summary->Origin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Origin" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Origin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Status"><script id="tpc_ivf_art_summary_Status" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Status->caption() ?></span></script></span></td>
		<td data-name="Status"<?php echo $ivf_art_summary->Status->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Status" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Status">
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<?php echo $ivf_art_summary->Status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
	<tr id="r_Method">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Method"><script id="tpc_ivf_art_summary_Method" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Method->caption() ?></span></script></span></td>
		<td data-name="Method"<?php echo $ivf_art_summary->Method->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Method" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Method">
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<?php echo $ivf_art_summary->Method->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
	<tr id="r_pre_Concentration">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Concentration"><script id="tpc_ivf_art_summary_pre_Concentration" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->pre_Concentration->caption() ?></span></script></span></td>
		<td data-name="pre_Concentration"<?php echo $ivf_art_summary->pre_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Concentration" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Concentration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
	<tr id="r_pre_Motility">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Motility"><script id="tpc_ivf_art_summary_pre_Motility" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->pre_Motility->caption() ?></span></script></span></td>
		<td data-name="pre_Motility"<?php echo $ivf_art_summary->pre_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Motility" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Motility->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
	<tr id="r_pre_Morphology">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Morphology"><script id="tpc_ivf_art_summary_pre_Morphology" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->pre_Morphology->caption() ?></span></script></span></td>
		<td data-name="pre_Morphology"<?php echo $ivf_art_summary->pre_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Morphology" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Morphology->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
	<tr id="r_post_Concentration">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Concentration"><script id="tpc_ivf_art_summary_post_Concentration" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->post_Concentration->caption() ?></span></script></span></td>
		<td data-name="post_Concentration"<?php echo $ivf_art_summary->post_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Concentration" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Concentration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
	<tr id="r_post_Motility">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Motility"><script id="tpc_ivf_art_summary_post_Motility" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->post_Motility->caption() ?></span></script></span></td>
		<td data-name="post_Motility"<?php echo $ivf_art_summary->post_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Motility" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Motility->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
	<tr id="r_post_Morphology">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Morphology"><script id="tpc_ivf_art_summary_post_Morphology" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->post_Morphology->caption() ?></span></script></span></td>
		<td data-name="post_Morphology"<?php echo $ivf_art_summary->post_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Morphology" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Morphology->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<tr id="r_NumberofEmbryostransferred">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred"><script id="tpc_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></span></script></span></td>
		<td data-name="NumberofEmbryostransferred"<?php echo $ivf_art_summary->NumberofEmbryostransferred->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<?php echo $ivf_art_summary->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<tr id="r_Embryosunderobservation">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Embryosunderobservation"><script id="tpc_ivf_art_summary_Embryosunderobservation" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></span></script></span></td>
		<td data-name="Embryosunderobservation"<?php echo $ivf_art_summary->Embryosunderobservation->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Embryosunderobservation" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<?php echo $ivf_art_summary->Embryosunderobservation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<tr id="r_EmbryoDevelopmentSummary">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary"><script id="tpc_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></span></script></span></td>
		<td data-name="EmbryoDevelopmentSummary"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<tr id="r_EmbryologistSignature">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryologistSignature"><script id="tpc_ivf_art_summary_EmbryologistSignature" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></span></script></span></td>
		<td data-name="EmbryologistSignature"<?php echo $ivf_art_summary->EmbryologistSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryologistSignature" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryologistSignature->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<tr id="r_IVFRegistrationID">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVFRegistrationID"><script id="tpc_ivf_art_summary_IVFRegistrationID" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></span></script></span></td>
		<td data-name="IVFRegistrationID"<?php echo $ivf_art_summary->IVFRegistrationID->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVFRegistrationID" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVFRegistrationID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<tr id="r_InseminatinTechnique">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_InseminatinTechnique"><script id="tpc_ivf_art_summary_InseminatinTechnique" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></span></script></span></td>
		<td data-name="InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_InseminatinTechnique" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_art_summary->InseminatinTechnique->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
	<tr id="r_ICSIDetails">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSIDetails"><script id="tpc_ivf_art_summary_ICSIDetails" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->ICSIDetails->caption() ?></span></script></span></td>
		<td data-name="ICSIDetails"<?php echo $ivf_art_summary->ICSIDetails->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSIDetails" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSIDetails->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
	<tr id="r_DateofET">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofET"><script id="tpc_ivf_art_summary_DateofET" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->DateofET->caption() ?></span></script></span></td>
		<td data-name="DateofET"<?php echo $ivf_art_summary->DateofET->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofET" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofET->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<tr id="r_Reasonfornotranfer">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer"><script id="tpc_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></span></script></span></td>
		<td data-name="Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<?php echo $ivf_art_summary->Reasonfornotranfer->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<tr id="r_EmbryosCryopreserved">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved"><script id="tpc_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></span></script></span></td>
		<td data-name="EmbryosCryopreserved"<?php echo $ivf_art_summary->EmbryosCryopreserved->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
	<tr id="r_LegendCellStage">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_LegendCellStage"><script id="tpc_ivf_art_summary_LegendCellStage" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->LegendCellStage->caption() ?></span></script></span></td>
		<td data-name="LegendCellStage"<?php echo $ivf_art_summary->LegendCellStage->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_LegendCellStage" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<?php echo $ivf_art_summary->LegendCellStage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<tr id="r_ConsultantsSignature">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ConsultantsSignature"><script id="tpc_ivf_art_summary_ConsultantsSignature" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></span></script></span></td>
		<td data-name="ConsultantsSignature"<?php echo $ivf_art_summary->ConsultantsSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ConsultantsSignature" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->ConsultantsSignature->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Name"><script id="tpc_ivf_art_summary_Name" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_art_summary->Name->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Name" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<?php echo $ivf_art_summary->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
	<tr id="r_M2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M2"><script id="tpc_ivf_art_summary_M2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->M2->caption() ?></span></script></span></td>
		<td data-name="M2"<?php echo $ivf_art_summary->M2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_M2">
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<?php echo $ivf_art_summary->M2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
	<tr id="r_Mi2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Mi2"><script id="tpc_ivf_art_summary_Mi2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Mi2->caption() ?></span></script></span></td>
		<td data-name="Mi2"<?php echo $ivf_art_summary->Mi2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Mi2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Mi2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
	<tr id="r_ICSI">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSI"><script id="tpc_ivf_art_summary_ICSI" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->ICSI->caption() ?></span></script></span></td>
		<td data-name="ICSI"<?php echo $ivf_art_summary->ICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSI" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
	<tr id="r_IVF">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVF"><script id="tpc_ivf_art_summary_IVF" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->IVF->caption() ?></span></script></span></td>
		<td data-name="IVF"<?php echo $ivf_art_summary->IVF->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVF" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVF->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
	<tr id="r_M1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M1"><script id="tpc_ivf_art_summary_M1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->M1->caption() ?></span></script></span></td>
		<td data-name="M1"<?php echo $ivf_art_summary->M1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_M1">
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<?php echo $ivf_art_summary->M1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
	<tr id="r_GV">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_GV"><script id="tpc_ivf_art_summary_GV" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->GV->caption() ?></span></script></span></td>
		<td data-name="GV"<?php echo $ivf_art_summary->GV->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_GV" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_GV">
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<?php echo $ivf_art_summary->GV->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
	<tr id="r_Others">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Others"><script id="tpc_ivf_art_summary_Others" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Others->caption() ?></span></script></span></td>
		<td data-name="Others"<?php echo $ivf_art_summary->Others->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Others" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Others">
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<?php echo $ivf_art_summary->Others->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
	<tr id="r_Normal2PN">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Normal2PN"><script id="tpc_ivf_art_summary_Normal2PN" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Normal2PN->caption() ?></span></script></span></td>
		<td data-name="Normal2PN"<?php echo $ivf_art_summary->Normal2PN->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Normal2PN" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<?php echo $ivf_art_summary->Normal2PN->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<tr id="r_Abnormalfertilisation1N">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N"><script id="tpc_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></span></script></span></td>
		<td data-name="Abnormalfertilisation1N"<?php echo $ivf_art_summary->Abnormalfertilisation1N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<tr id="r_Abnormalfertilisation3N">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N"><script id="tpc_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></span></script></span></td>
		<td data-name="Abnormalfertilisation3N"<?php echo $ivf_art_summary->Abnormalfertilisation3N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
	<tr id="r_NotFertilized">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotFertilized"><script id="tpc_ivf_art_summary_NotFertilized" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->NotFertilized->caption() ?></span></script></span></td>
		<td data-name="NotFertilized"<?php echo $ivf_art_summary->NotFertilized->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotFertilized" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotFertilized->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
	<tr id="r_Degenerated">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Degenerated"><script id="tpc_ivf_art_summary_Degenerated" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Degenerated->caption() ?></span></script></span></td>
		<td data-name="Degenerated"<?php echo $ivf_art_summary->Degenerated->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Degenerated" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<?php echo $ivf_art_summary->Degenerated->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
	<tr id="r_SpermDate">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_SpermDate"><script id="tpc_ivf_art_summary_SpermDate" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->SpermDate->caption() ?></span></script></span></td>
		<td data-name="SpermDate"<?php echo $ivf_art_summary->SpermDate->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_SpermDate" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<?php echo $ivf_art_summary->SpermDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
	<tr id="r_Code1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code1"><script id="tpc_ivf_art_summary_Code1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Code1->caption() ?></span></script></span></td>
		<td data-name="Code1"<?php echo $ivf_art_summary->Code1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
	<tr id="r_Day1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day1"><script id="tpc_ivf_art_summary_Day1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Day1->caption() ?></span></script></span></td>
		<td data-name="Day1"<?php echo $ivf_art_summary->Day1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
	<tr id="r_CellStage1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage1"><script id="tpc_ivf_art_summary_CellStage1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->CellStage1->caption() ?></span></script></span></td>
		<td data-name="CellStage1"<?php echo $ivf_art_summary->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
	<tr id="r_Grade1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade1"><script id="tpc_ivf_art_summary_Grade1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Grade1->caption() ?></span></script></span></td>
		<td data-name="Grade1"<?php echo $ivf_art_summary->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
	<tr id="r_State1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State1"><script id="tpc_ivf_art_summary_State1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->State1->caption() ?></span></script></span></td>
		<td data-name="State1"<?php echo $ivf_art_summary->State1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_State1">
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<?php echo $ivf_art_summary->State1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
	<tr id="r_Code2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code2"><script id="tpc_ivf_art_summary_Code2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Code2->caption() ?></span></script></span></td>
		<td data-name="Code2"<?php echo $ivf_art_summary->Code2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
	<tr id="r_Day2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day2"><script id="tpc_ivf_art_summary_Day2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Day2->caption() ?></span></script></span></td>
		<td data-name="Day2"<?php echo $ivf_art_summary->Day2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
	<tr id="r_CellStage2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage2"><script id="tpc_ivf_art_summary_CellStage2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->CellStage2->caption() ?></span></script></span></td>
		<td data-name="CellStage2"<?php echo $ivf_art_summary->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
	<tr id="r_Grade2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade2"><script id="tpc_ivf_art_summary_Grade2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Grade2->caption() ?></span></script></span></td>
		<td data-name="Grade2"<?php echo $ivf_art_summary->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
	<tr id="r_State2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State2"><script id="tpc_ivf_art_summary_State2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->State2->caption() ?></span></script></span></td>
		<td data-name="State2"<?php echo $ivf_art_summary->State2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_State2">
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<?php echo $ivf_art_summary->State2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
	<tr id="r_Code3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code3"><script id="tpc_ivf_art_summary_Code3" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Code3->caption() ?></span></script></span></td>
		<td data-name="Code3"<?php echo $ivf_art_summary->Code3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code3" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
	<tr id="r_Day3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day3"><script id="tpc_ivf_art_summary_Day3" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Day3->caption() ?></span></script></span></td>
		<td data-name="Day3"<?php echo $ivf_art_summary->Day3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day3" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
	<tr id="r_CellStage3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage3"><script id="tpc_ivf_art_summary_CellStage3" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->CellStage3->caption() ?></span></script></span></td>
		<td data-name="CellStage3"<?php echo $ivf_art_summary->CellStage3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage3" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
	<tr id="r_Grade3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade3"><script id="tpc_ivf_art_summary_Grade3" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Grade3->caption() ?></span></script></span></td>
		<td data-name="Grade3"<?php echo $ivf_art_summary->Grade3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade3" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
	<tr id="r_State3">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State3"><script id="tpc_ivf_art_summary_State3" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->State3->caption() ?></span></script></span></td>
		<td data-name="State3"<?php echo $ivf_art_summary->State3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State3" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_State3">
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<?php echo $ivf_art_summary->State3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
	<tr id="r_Code4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code4"><script id="tpc_ivf_art_summary_Code4" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Code4->caption() ?></span></script></span></td>
		<td data-name="Code4"<?php echo $ivf_art_summary->Code4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code4" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
	<tr id="r_Day4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day4"><script id="tpc_ivf_art_summary_Day4" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Day4->caption() ?></span></script></span></td>
		<td data-name="Day4"<?php echo $ivf_art_summary->Day4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day4" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
	<tr id="r_CellStage4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage4"><script id="tpc_ivf_art_summary_CellStage4" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->CellStage4->caption() ?></span></script></span></td>
		<td data-name="CellStage4"<?php echo $ivf_art_summary->CellStage4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage4" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
	<tr id="r_Grade4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade4"><script id="tpc_ivf_art_summary_Grade4" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Grade4->caption() ?></span></script></span></td>
		<td data-name="Grade4"<?php echo $ivf_art_summary->Grade4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade4" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
	<tr id="r_State4">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State4"><script id="tpc_ivf_art_summary_State4" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->State4->caption() ?></span></script></span></td>
		<td data-name="State4"<?php echo $ivf_art_summary->State4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State4" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_State4">
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<?php echo $ivf_art_summary->State4->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
	<tr id="r_Code5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code5"><script id="tpc_ivf_art_summary_Code5" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Code5->caption() ?></span></script></span></td>
		<td data-name="Code5"<?php echo $ivf_art_summary->Code5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code5" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
	<tr id="r_Day5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day5"><script id="tpc_ivf_art_summary_Day5" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Day5->caption() ?></span></script></span></td>
		<td data-name="Day5"<?php echo $ivf_art_summary->Day5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day5" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
	<tr id="r_CellStage5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage5"><script id="tpc_ivf_art_summary_CellStage5" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->CellStage5->caption() ?></span></script></span></td>
		<td data-name="CellStage5"<?php echo $ivf_art_summary->CellStage5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage5" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
	<tr id="r_Grade5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade5"><script id="tpc_ivf_art_summary_Grade5" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Grade5->caption() ?></span></script></span></td>
		<td data-name="Grade5"<?php echo $ivf_art_summary->Grade5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade5" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
	<tr id="r_State5">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State5"><script id="tpc_ivf_art_summary_State5" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->State5->caption() ?></span></script></span></td>
		<td data-name="State5"<?php echo $ivf_art_summary->State5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State5" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_State5">
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<?php echo $ivf_art_summary->State5->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_TidNo"><script id="tpc_ivf_art_summary_TidNo" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_art_summary->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_TidNo" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_RIDNo"><script id="tpc_ivf_art_summary_RIDNo" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->RIDNo->caption() ?></span></script></span></td>
		<td data-name="RIDNo"<?php echo $ivf_art_summary->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_RIDNo" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume"><script id="tpc_ivf_art_summary_Volume" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Volume->caption() ?></span></script></span></td>
		<td data-name="Volume"<?php echo $ivf_art_summary->Volume->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
	<tr id="r_Volume1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume1"><script id="tpc_ivf_art_summary_Volume1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Volume1->caption() ?></span></script></span></td>
		<td data-name="Volume1"<?php echo $ivf_art_summary->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
	<tr id="r_Volume2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume2"><script id="tpc_ivf_art_summary_Volume2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Volume2->caption() ?></span></script></span></td>
		<td data-name="Volume2"<?php echo $ivf_art_summary->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
	<tr id="r_Concentration2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Concentration2"><script id="tpc_ivf_art_summary_Concentration2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Concentration2->caption() ?></span></script></span></td>
		<td data-name="Concentration2"<?php echo $ivf_art_summary->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Concentration2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Concentration2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
	<tr id="r_Total">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total"><script id="tpc_ivf_art_summary_Total" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Total->caption() ?></span></script></span></td>
		<td data-name="Total"<?php echo $ivf_art_summary->Total->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Total">
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
	<tr id="r_Total1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total1"><script id="tpc_ivf_art_summary_Total1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Total1->caption() ?></span></script></span></td>
		<td data-name="Total1"<?php echo $ivf_art_summary->Total1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
	<tr id="r_Total2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total2"><script id="tpc_ivf_art_summary_Total2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Total2->caption() ?></span></script></span></td>
		<td data-name="Total2"<?php echo $ivf_art_summary->Total2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
	<tr id="r_Progressive">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive"><script id="tpc_ivf_art_summary_Progressive" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Progressive->caption() ?></span></script></span></td>
		<td data-name="Progressive"<?php echo $ivf_art_summary->Progressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
	<tr id="r_Progressive1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive1"><script id="tpc_ivf_art_summary_Progressive1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Progressive1->caption() ?></span></script></span></td>
		<td data-name="Progressive1"<?php echo $ivf_art_summary->Progressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
	<tr id="r_Progressive2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive2"><script id="tpc_ivf_art_summary_Progressive2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Progressive2->caption() ?></span></script></span></td>
		<td data-name="Progressive2"<?php echo $ivf_art_summary->Progressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
	<tr id="r_NotProgressive">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive"><script id="tpc_ivf_art_summary_NotProgressive" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->NotProgressive->caption() ?></span></script></span></td>
		<td data-name="NotProgressive"<?php echo $ivf_art_summary->NotProgressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
	<tr id="r_NotProgressive1">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive1"><script id="tpc_ivf_art_summary_NotProgressive1" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->NotProgressive1->caption() ?></span></script></span></td>
		<td data-name="NotProgressive1"<?php echo $ivf_art_summary->NotProgressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive1" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
	<tr id="r_NotProgressive2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive2"><script id="tpc_ivf_art_summary_NotProgressive2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->NotProgressive2->caption() ?></span></script></span></td>
		<td data-name="NotProgressive2"<?php echo $ivf_art_summary->NotProgressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
	<tr id="r_Motility2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Motility2"><script id="tpc_ivf_art_summary_Motility2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Motility2->caption() ?></span></script></span></td>
		<td data-name="Motility2"<?php echo $ivf_art_summary->Motility2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Motility2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Motility2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
	<tr id="r_Morphology2">
		<td class="<?php echo $ivf_art_summary_view->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Morphology2"><script id="tpc_ivf_art_summary_Morphology2" class="ivf_art_summaryview" type="text/html"><span><?php echo $ivf_art_summary->Morphology2->caption() ?></span></script></span></td>
		<td data-name="Morphology2"<?php echo $ivf_art_summary->Morphology2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Morphology2" class="ivf_art_summaryview" type="text/html">
<span id="el_ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Morphology2->getViewValue() ?></span>
</span>
</script>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ARTCycle"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_ARTCycle"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Spermorigin"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Spermorigin"/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_InseminatinTechnique"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_InseminatinTechnique"/}}</span>
				 </td>
				 <td>					
				 </td>
		 </tr>
		  <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_IndicationforART"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_IndicationforART"/}}</span>
				</td>
				<td>				
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ICSIDetails"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_ICSIDetails"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_DateofICSI"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_DateofICSI"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_M2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_M2"/}}</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_M1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_M1"/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Normal2PN"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Normal2PN"/}}</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Mi2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Mi2"/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_GV"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_GV"/}}</span>
				 </td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Abnormalfertilisation1N"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Abnormalfertilisation1N"/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:33%">
					 <span class="ew-cell"></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Others"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Others"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Abnormalfertilisation3N"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Abnormalfertilisation3N"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ICSI"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_ICSI"/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotFertilized"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_NotFertilized"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_IVF"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_IVF"/}}</span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Degenerated"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Degenerated"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Origin"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Origin"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Status"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Status"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Method"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Method"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_SpermDate"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_SpermDate"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Volume"/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Volume1"/}}</span>
				 </td>
				 <td>
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Volume2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Volume2"/}}</span>
				 </td>
		 </tr>
		  <tr>
				<td>
					<span class="ew-cell">Concentration (mili/ml)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Concentration"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_pre_Concentration"/}}</span>
				 </td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Concentration"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_post_Concentration"/}}</span>
				</td>
				<td>
				<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Concentration2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Concentration2"/}}</span>
				</td>
		 </tr>
		 <tr>
				<td>
					 <span class="ew-cell">Total</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Total"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Total1"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Total2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Total2"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Progressive"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Progressive1"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Progressive2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Progressive2"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Not Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_NotProgressive"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_NotProgressive1"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NotProgressive2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_NotProgressive2"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Motility (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Motility"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_pre_Motility"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Motility"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_post_Motility"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Motility2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Motility2"/}}</span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Morphology (%)</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_pre_Morphology"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_pre_Morphology"/}}</span>
				 </td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_post_Morphology"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_post_Morphology"/}}</span>
				</td>
				<td>
				     <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Morphology2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Morphology2"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_DateofET"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_DateofET"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_NumberofEmbryostransferred"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_NumberofEmbryostransferred"/}}</span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Reasonfornotranfer"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Reasonfornotranfer"/}}</span>
				 </td>
				 <td>
				 	<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Embryosunderobservation"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Embryosunderobservation"/}}</span>
				 </td>
		 </tr>
  		  <tr>
				<td style="width:50%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_EmbryosCryopreserved"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_EmbryosCryopreserved"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Code1"/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Day1"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_CellStage1"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Grade1"/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State1"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_State1"/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">2</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Code2"/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Day2"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_CellStage2"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Grade2"/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State2"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_State2"/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">3</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code3"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Code3"/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day3"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Day3"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage3"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_CellStage3"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade3"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Grade3"/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State3"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_State3"/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">4</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code4"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Code4"/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day4"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Day4"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage4"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_CellStage4"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade4"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Grade4"/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State4"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_State4"/}}</span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">5</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Code5"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Code5"/}}</span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Day5"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Day5"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_CellStage5"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_CellStage5"/}}</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_Grade5"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_Grade5"/}}</span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_State5"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_State5"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_EmbryologistSignature"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_EmbryologistSignature"/}}</span>
				 </td>
				 <td>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_art_summary_ConsultantsSignature"/}}&nbsp;{{include tmpl="#tpx_ivf_art_summary_ConsultantsSignature"/}}</span>
				</td>
		 </tr>	 
	</tbody>
</table>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_art_summary->Rows) ?> };
ew.applyTemplate("tpd_ivf_art_summaryview", "tpm_ivf_art_summaryview", "ivf_art_summaryview", "<?php echo $ivf_art_summary->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_art_summaryview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_art_summary_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("x_M2").style.width = "180px";
 document.getElementById("x_M1").style.width = "180px";
 document.getElementById("x_Normal2PN").style.width = "180px";
 document.getElementById("x_Mi2").style.width = "180px";
 document.getElementById("x_GV").style.width = "180px";
 document.getElementById("x_Abnormalfertilisation1N").style.width = "180px";
 document.getElementById("x_Others").style.width = "180px";
 document.getElementById("x_Abnormalfertilisation3N").style.width = "180px";
 document.getElementById("x_ICSI").style.width = "180px";
 document.getElementById("x_NotFertilized").style.width = "180px";
 document.getElementById("x_IVF").style.width = "180px";
 document.getElementById("x_Degenerated").style.width = "180px";
 document.getElementById("x_pre_Concentration").style.width = "180px";
 document.getElementById("x_post_Concentration").style.width = "180px";
 document.getElementById("x_pre_Motility").style.width = "180px";
 document.getElementById("x_post_Motility").style.width = "180px";
 document.getElementById("x_pre_Morphology").style.width = "180px";
 document.getElementById("x_post_Morphology").style.width = "180px";
  document.getElementById("x_Volume").style.width = "180px";
   document.getElementById("x_Volume1").style.width = "180px";
	document.getElementById("x_Volume2").style.width = "180px";
	document.getElementById("x_Concentration2").style.width = "180px";
	document.getElementById("x_Total").style.width = "180px";
	document.getElementById("x_Total1").style.width = "180px";
	document.getElementById("x_Total2").style.width = "180px";
	document.getElementById("x_Progressive").style.width = "180px";
	document.getElementById("x_Progressive1").style.width = "180px";
	document.getElementById("x_Progressive2").style.width = "180px";
	document.getElementById("x_NotProgressive").style.width = "180px";
	document.getElementById("x_NotProgressive1").style.width = "180px";
	document.getElementById("x_NotProgressive2").style.width = "180px";
	document.getElementById("x_Motility2").style.width = "180px";
	document.getElementById("x_Morphology2").style.width = "180px";
 document.getElementById("x_Code1").style.width = "180px";
 document.getElementById("x_Day1").style.width = "180px";
 document.getElementById("x_CellStage1").style.width = "180px";
 document.getElementById("x_Grade1").style.width = "180px";
 document.getElementById("x_State1").style.width = "180px";
  document.getElementById("x_Code2").style.width = "180px";
 document.getElementById("x_Day2").style.width = "180px";
 document.getElementById("x_CellStage2").style.width = "180px";
 document.getElementById("x_Grade2").style.width = "180px";
 document.getElementById("x_State2").style.width = "180px";
  document.getElementById("x_Code3").style.width = "180px";
 document.getElementById("x_Day3").style.width = "180px";
 document.getElementById("x_CellStage3").style.width = "180px";
 document.getElementById("x_Grade3").style.width = "180px";
 document.getElementById("x_State3").style.width = "180px";
  document.getElementById("x_Code4").style.width = "180px";
 document.getElementById("x_Day4").style.width = "180px";
 document.getElementById("x_CellStage4").style.width = "180px";
 document.getElementById("x_Grade4").style.width = "180px";
 document.getElementById("x_State4").style.width = "180px";
  document.getElementById("x_Code5").style.width = "180px";
 document.getElementById("x_Day5").style.width = "180px";
 document.getElementById("x_CellStage5").style.width = "180px";
 document.getElementById("x_Grade5").style.width = "180px";
 document.getElementById("x_State5").style.width = "180px";
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_art_summary_view->terminate();
?>