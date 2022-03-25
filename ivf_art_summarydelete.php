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
$ivf_art_summary_delete = new ivf_art_summary_delete();

// Run the page
$ivf_art_summary_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_art_summarydelete = currentForm = new ew.Form("fivf_art_summarydelete", "delete");

// Form_CustomValidate event
fivf_art_summarydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_art_summarydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_art_summarydelete.lists["x_ARTCycle"] = <?php echo $ivf_art_summary_delete->ARTCycle->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_art_summary_delete->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Spermorigin"] = <?php echo $ivf_art_summary_delete->Spermorigin->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Spermorigin"].options = <?php echo JsonEncode($ivf_art_summary_delete->Spermorigin->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Origin"] = <?php echo $ivf_art_summary_delete->Origin->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Origin"].options = <?php echo JsonEncode($ivf_art_summary_delete->Origin->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Status"] = <?php echo $ivf_art_summary_delete->Status->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Status"].options = <?php echo JsonEncode($ivf_art_summary_delete->Status->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Method"] = <?php echo $ivf_art_summary_delete->Method->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Method"].options = <?php echo JsonEncode($ivf_art_summary_delete->Method->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_InseminatinTechnique"] = <?php echo $ivf_art_summary_delete->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_art_summary_delete->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_DateofET"] = <?php echo $ivf_art_summary_delete->DateofET->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_DateofET"].options = <?php echo JsonEncode($ivf_art_summary_delete->DateofET->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Reasonfornotranfer"] = <?php echo $ivf_art_summary_delete->Reasonfornotranfer->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Reasonfornotranfer"].options = <?php echo JsonEncode($ivf_art_summary_delete->Reasonfornotranfer->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_ConsultantsSignature"] = <?php echo $ivf_art_summary_delete->ConsultantsSignature->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_ConsultantsSignature"].options = <?php echo JsonEncode($ivf_art_summary_delete->ConsultantsSignature->lookupOptions()) ?>;
fivf_art_summarydelete.lists["x_Day1"] = <?php echo $ivf_art_summary_delete->Day1->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Day1"].options = <?php echo JsonEncode($ivf_art_summary_delete->Day1->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_CellStage1"] = <?php echo $ivf_art_summary_delete->CellStage1->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_CellStage1"].options = <?php echo JsonEncode($ivf_art_summary_delete->CellStage1->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Grade1"] = <?php echo $ivf_art_summary_delete->Grade1->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Grade1"].options = <?php echo JsonEncode($ivf_art_summary_delete->Grade1->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_State1"] = <?php echo $ivf_art_summary_delete->State1->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_State1"].options = <?php echo JsonEncode($ivf_art_summary_delete->State1->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Day2"] = <?php echo $ivf_art_summary_delete->Day2->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Day2"].options = <?php echo JsonEncode($ivf_art_summary_delete->Day2->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_CellStage2"] = <?php echo $ivf_art_summary_delete->CellStage2->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_CellStage2"].options = <?php echo JsonEncode($ivf_art_summary_delete->CellStage2->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Grade2"] = <?php echo $ivf_art_summary_delete->Grade2->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Grade2"].options = <?php echo JsonEncode($ivf_art_summary_delete->Grade2->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_State2"] = <?php echo $ivf_art_summary_delete->State2->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_State2"].options = <?php echo JsonEncode($ivf_art_summary_delete->State2->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Day3"] = <?php echo $ivf_art_summary_delete->Day3->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Day3"].options = <?php echo JsonEncode($ivf_art_summary_delete->Day3->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_CellStage3"] = <?php echo $ivf_art_summary_delete->CellStage3->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_CellStage3"].options = <?php echo JsonEncode($ivf_art_summary_delete->CellStage3->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Grade3"] = <?php echo $ivf_art_summary_delete->Grade3->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Grade3"].options = <?php echo JsonEncode($ivf_art_summary_delete->Grade3->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_State3"] = <?php echo $ivf_art_summary_delete->State3->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_State3"].options = <?php echo JsonEncode($ivf_art_summary_delete->State3->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Day4"] = <?php echo $ivf_art_summary_delete->Day4->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Day4"].options = <?php echo JsonEncode($ivf_art_summary_delete->Day4->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_CellStage4"] = <?php echo $ivf_art_summary_delete->CellStage4->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_CellStage4"].options = <?php echo JsonEncode($ivf_art_summary_delete->CellStage4->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Grade4"] = <?php echo $ivf_art_summary_delete->Grade4->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Grade4"].options = <?php echo JsonEncode($ivf_art_summary_delete->Grade4->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_State4"] = <?php echo $ivf_art_summary_delete->State4->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_State4"].options = <?php echo JsonEncode($ivf_art_summary_delete->State4->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Day5"] = <?php echo $ivf_art_summary_delete->Day5->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Day5"].options = <?php echo JsonEncode($ivf_art_summary_delete->Day5->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_CellStage5"] = <?php echo $ivf_art_summary_delete->CellStage5->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_CellStage5"].options = <?php echo JsonEncode($ivf_art_summary_delete->CellStage5->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_Grade5"] = <?php echo $ivf_art_summary_delete->Grade5->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_Grade5"].options = <?php echo JsonEncode($ivf_art_summary_delete->Grade5->options(FALSE, TRUE)) ?>;
fivf_art_summarydelete.lists["x_State5"] = <?php echo $ivf_art_summary_delete->State5->Lookup->toClientList() ?>;
fivf_art_summarydelete.lists["x_State5"].options = <?php echo JsonEncode($ivf_art_summary_delete->State5->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_art_summary_delete->showPageHeader(); ?>
<?php
$ivf_art_summary_delete->showMessage();
?>
<form name="fivf_art_summarydelete" id="fivf_art_summarydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_art_summary_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_art_summary_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_art_summary_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<th class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><span id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><?php echo $ivf_art_summary->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><?php echo $ivf_art_summary->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<th class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><?php echo $ivf_art_summary->Spermorigin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<th class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><span id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><?php echo $ivf_art_summary->IndicationforART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<th class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><?php echo $ivf_art_summary->DateofICSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<th class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><?php echo $ivf_art_summary->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<th class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><span id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><?php echo $ivf_art_summary->Status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<th class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><span id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><?php echo $ivf_art_summary->Method->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<th class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<th class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><?php echo $ivf_art_summary->pre_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<th class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<th class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><?php echo $ivf_art_summary->post_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<th class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><?php echo $ivf_art_summary->post_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<th class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><?php echo $ivf_art_summary->post_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<th class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<th class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><span id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<th class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<th class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<th class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<th class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<th class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><?php echo $ivf_art_summary->DateofET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<th class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<th class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<th class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><span id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<th class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><span id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><?php echo $ivf_art_summary->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<th class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><span id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><?php echo $ivf_art_summary->M2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<th class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><?php echo $ivf_art_summary->Mi2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<th class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><?php echo $ivf_art_summary->ICSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<th class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><?php echo $ivf_art_summary->IVF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<th class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><span id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><?php echo $ivf_art_summary->M1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<th class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><span id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><?php echo $ivf_art_summary->GV->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<th class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><span id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others"><?php echo $ivf_art_summary->Others->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<th class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><span id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><?php echo $ivf_art_summary->Normal2PN->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<th class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<th class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><?php echo $ivf_art_summary->NotFertilized->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<th class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><span id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><?php echo $ivf_art_summary->Degenerated->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<th class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><span id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><?php echo $ivf_art_summary->SpermDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<th class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><?php echo $ivf_art_summary->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<th class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><?php echo $ivf_art_summary->Day1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<th class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><?php echo $ivf_art_summary->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<th class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><?php echo $ivf_art_summary->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<th class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><span id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><?php echo $ivf_art_summary->State1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<th class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><?php echo $ivf_art_summary->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<th class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><?php echo $ivf_art_summary->Day2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<th class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><?php echo $ivf_art_summary->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<th class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><?php echo $ivf_art_summary->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<th class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><span id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><?php echo $ivf_art_summary->State2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<th class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><?php echo $ivf_art_summary->Code3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<th class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><?php echo $ivf_art_summary->Day3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<th class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><?php echo $ivf_art_summary->CellStage3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<th class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><?php echo $ivf_art_summary->Grade3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<th class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><span id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><?php echo $ivf_art_summary->State3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<th class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><?php echo $ivf_art_summary->Code4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<th class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><?php echo $ivf_art_summary->Day4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<th class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><?php echo $ivf_art_summary->CellStage4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<th class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><?php echo $ivf_art_summary->Grade4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<th class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><span id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><?php echo $ivf_art_summary->State4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<th class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><?php echo $ivf_art_summary->Code5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<th class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><?php echo $ivf_art_summary->Day5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<th class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><?php echo $ivf_art_summary->CellStage5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<th class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><?php echo $ivf_art_summary->Grade5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<th class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><span id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><?php echo $ivf_art_summary->State5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><?php echo $ivf_art_summary->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><?php echo $ivf_art_summary->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<th class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><?php echo $ivf_art_summary->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<th class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><?php echo $ivf_art_summary->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<th class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><?php echo $ivf_art_summary->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<th class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><?php echo $ivf_art_summary->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<th class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><?php echo $ivf_art_summary->Total->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<th class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><?php echo $ivf_art_summary->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<th class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><?php echo $ivf_art_summary->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<th class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><?php echo $ivf_art_summary->Progressive->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<th class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><?php echo $ivf_art_summary->Progressive1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<th class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><?php echo $ivf_art_summary->Progressive2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><?php echo $ivf_art_summary->NotProgressive->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<th class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<th class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><?php echo $ivf_art_summary->Motility2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<th class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><?php echo $ivf_art_summary->Morphology2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_art_summary_delete->RecCnt = 0;
$i = 0;
while (!$ivf_art_summary_delete->Recordset->EOF) {
	$ivf_art_summary_delete->RecCnt++;
	$ivf_art_summary_delete->RowCnt++;

	// Set row properties
	$ivf_art_summary->resetAttributes();
	$ivf_art_summary->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_art_summary_delete->loadRowValues($ivf_art_summary_delete->Recordset);

	// Render row
	$ivf_art_summary_delete->renderRow();
?>
	<tr<?php echo $ivf_art_summary->rowAttributes() ?>>
<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<td<?php echo $ivf_art_summary->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_id" class="ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<?php echo $ivf_art_summary->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<td<?php echo $ivf_art_summary->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_art_summary->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<td<?php echo $ivf_art_summary->Spermorigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Spermorigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<td<?php echo $ivf_art_summary->IndicationforART->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<?php echo $ivf_art_summary->IndicationforART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<td<?php echo $ivf_art_summary->DateofICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<td<?php echo $ivf_art_summary->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<td<?php echo $ivf_art_summary->Status->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Status" class="ivf_art_summary_Status">
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<?php echo $ivf_art_summary->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<td<?php echo $ivf_art_summary->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Method" class="ivf_art_summary_Method">
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<?php echo $ivf_art_summary->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<td<?php echo $ivf_art_summary->pre_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<td<?php echo $ivf_art_summary->pre_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<td<?php echo $ivf_art_summary->pre_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<td<?php echo $ivf_art_summary->post_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<td<?php echo $ivf_art_summary->post_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<td<?php echo $ivf_art_summary->post_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td<?php echo $ivf_art_summary->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<?php echo $ivf_art_summary->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td<?php echo $ivf_art_summary->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<?php echo $ivf_art_summary->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td<?php echo $ivf_art_summary->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td<?php echo $ivf_art_summary->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td<?php echo $ivf_art_summary->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_art_summary->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<td<?php echo $ivf_art_summary->ICSIDetails->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSIDetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<td<?php echo $ivf_art_summary->DateofET->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td<?php echo $ivf_art_summary->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<?php echo $ivf_art_summary->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td<?php echo $ivf_art_summary->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<td<?php echo $ivf_art_summary->LegendCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<?php echo $ivf_art_summary->LegendCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td<?php echo $ivf_art_summary->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<td<?php echo $ivf_art_summary->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Name" class="ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<?php echo $ivf_art_summary->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<td<?php echo $ivf_art_summary->M2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_M2" class="ivf_art_summary_M2">
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<?php echo $ivf_art_summary->M2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<td<?php echo $ivf_art_summary->Mi2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Mi2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<td<?php echo $ivf_art_summary->ICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<td<?php echo $ivf_art_summary->IVF->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<td<?php echo $ivf_art_summary->M1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_M1" class="ivf_art_summary_M1">
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<?php echo $ivf_art_summary->M1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<td<?php echo $ivf_art_summary->GV->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_GV" class="ivf_art_summary_GV">
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<?php echo $ivf_art_summary->GV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<td<?php echo $ivf_art_summary->Others->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Others" class="ivf_art_summary_Others">
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<?php echo $ivf_art_summary->Others->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<td<?php echo $ivf_art_summary->Normal2PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<?php echo $ivf_art_summary->Normal2PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td<?php echo $ivf_art_summary->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td<?php echo $ivf_art_summary->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<td<?php echo $ivf_art_summary->NotFertilized->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotFertilized->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<td<?php echo $ivf_art_summary->Degenerated->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<?php echo $ivf_art_summary->Degenerated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<td<?php echo $ivf_art_summary->SpermDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<?php echo $ivf_art_summary->SpermDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<td<?php echo $ivf_art_summary->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<td<?php echo $ivf_art_summary->Day1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<td<?php echo $ivf_art_summary->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<td<?php echo $ivf_art_summary->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<td<?php echo $ivf_art_summary->State1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_State1" class="ivf_art_summary_State1">
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<?php echo $ivf_art_summary->State1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<td<?php echo $ivf_art_summary->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<td<?php echo $ivf_art_summary->Day2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<td<?php echo $ivf_art_summary->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<td<?php echo $ivf_art_summary->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<td<?php echo $ivf_art_summary->State2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_State2" class="ivf_art_summary_State2">
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<?php echo $ivf_art_summary->State2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<td<?php echo $ivf_art_summary->Code3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<td<?php echo $ivf_art_summary->Day3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<td<?php echo $ivf_art_summary->CellStage3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<td<?php echo $ivf_art_summary->Grade3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<td<?php echo $ivf_art_summary->State3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_State3" class="ivf_art_summary_State3">
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<?php echo $ivf_art_summary->State3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<td<?php echo $ivf_art_summary->Code4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<td<?php echo $ivf_art_summary->Day4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<td<?php echo $ivf_art_summary->CellStage4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<td<?php echo $ivf_art_summary->Grade4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<td<?php echo $ivf_art_summary->State4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_State4" class="ivf_art_summary_State4">
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<?php echo $ivf_art_summary->State4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<td<?php echo $ivf_art_summary->Code5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<td<?php echo $ivf_art_summary->Day5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<td<?php echo $ivf_art_summary->CellStage5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<td<?php echo $ivf_art_summary->Grade5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<td<?php echo $ivf_art_summary->State5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_State5" class="ivf_art_summary_State5">
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<?php echo $ivf_art_summary->State5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_art_summary->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_art_summary->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<td<?php echo $ivf_art_summary->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<td<?php echo $ivf_art_summary->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<td<?php echo $ivf_art_summary->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<td<?php echo $ivf_art_summary->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<td<?php echo $ivf_art_summary->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Total" class="ivf_art_summary_Total">
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<td<?php echo $ivf_art_summary->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<td<?php echo $ivf_art_summary->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<td<?php echo $ivf_art_summary->Progressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<td<?php echo $ivf_art_summary->Progressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<td<?php echo $ivf_art_summary->Progressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<td<?php echo $ivf_art_summary->NotProgressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td<?php echo $ivf_art_summary->NotProgressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td<?php echo $ivf_art_summary->NotProgressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<td<?php echo $ivf_art_summary->Motility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Motility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<td<?php echo $ivf_art_summary->Morphology2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCnt ?>_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Morphology2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_art_summary_delete->Recordset->moveNext();
}
$ivf_art_summary_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_art_summary_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_art_summary_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_art_summary_delete->terminate();
?>