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
<?php include_once "header.php"; ?>
<script>
var fivf_art_summarydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_art_summarydelete = currentForm = new ew.Form("fivf_art_summarydelete", "delete");
	loadjs.done("fivf_art_summarydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_art_summary_delete->showPageHeader(); ?>
<?php
$ivf_art_summary_delete->showMessage();
?>
<form name="fivf_art_summarydelete" id="fivf_art_summarydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_art_summary_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_art_summary_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_art_summary_delete->id->headerCellClass() ?>"><span id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><?php echo $ivf_art_summary_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_art_summary_delete->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><?php echo $ivf_art_summary_delete->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Spermorigin->Visible) { // Spermorigin ?>
		<th class="<?php echo $ivf_art_summary_delete->Spermorigin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><?php echo $ivf_art_summary_delete->Spermorigin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->IndicationforART->Visible) { // IndicationforART ?>
		<th class="<?php echo $ivf_art_summary_delete->IndicationforART->headerCellClass() ?>"><span id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><?php echo $ivf_art_summary_delete->IndicationforART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->DateofICSI->Visible) { // DateofICSI ?>
		<th class="<?php echo $ivf_art_summary_delete->DateofICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><?php echo $ivf_art_summary_delete->DateofICSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Origin->Visible) { // Origin ?>
		<th class="<?php echo $ivf_art_summary_delete->Origin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><?php echo $ivf_art_summary_delete->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $ivf_art_summary_delete->Status->headerCellClass() ?>"><span id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><?php echo $ivf_art_summary_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $ivf_art_summary_delete->Method->headerCellClass() ?>"><span id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><?php echo $ivf_art_summary_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Concentration->Visible) { // pre_Concentration ?>
		<th class="<?php echo $ivf_art_summary_delete->pre_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><?php echo $ivf_art_summary_delete->pre_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Motility->Visible) { // pre_Motility ?>
		<th class="<?php echo $ivf_art_summary_delete->pre_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><?php echo $ivf_art_summary_delete->pre_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Morphology->Visible) { // pre_Morphology ?>
		<th class="<?php echo $ivf_art_summary_delete->pre_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><?php echo $ivf_art_summary_delete->pre_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Concentration->Visible) { // post_Concentration ?>
		<th class="<?php echo $ivf_art_summary_delete->post_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><?php echo $ivf_art_summary_delete->post_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Motility->Visible) { // post_Motility ?>
		<th class="<?php echo $ivf_art_summary_delete->post_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><?php echo $ivf_art_summary_delete->post_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Morphology->Visible) { // post_Morphology ?>
		<th class="<?php echo $ivf_art_summary_delete->post_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><?php echo $ivf_art_summary_delete->post_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<th class="<?php echo $ivf_art_summary_delete->NumberofEmbryostransferred->headerCellClass() ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><?php echo $ivf_art_summary_delete->NumberofEmbryostransferred->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<th class="<?php echo $ivf_art_summary_delete->Embryosunderobservation->headerCellClass() ?>"><span id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><?php echo $ivf_art_summary_delete->Embryosunderobservation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<th class="<?php echo $ivf_art_summary_delete->EmbryoDevelopmentSummary->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><?php echo $ivf_art_summary_delete->EmbryoDevelopmentSummary->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<th class="<?php echo $ivf_art_summary_delete->EmbryologistSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><?php echo $ivf_art_summary_delete->EmbryologistSignature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<th class="<?php echo $ivf_art_summary_delete->IVFRegistrationID->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><?php echo $ivf_art_summary_delete->IVFRegistrationID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_art_summary_delete->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><?php echo $ivf_art_summary_delete->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->ICSIDetails->Visible) { // ICSIDetails ?>
		<th class="<?php echo $ivf_art_summary_delete->ICSIDetails->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><?php echo $ivf_art_summary_delete->ICSIDetails->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->DateofET->Visible) { // DateofET ?>
		<th class="<?php echo $ivf_art_summary_delete->DateofET->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><?php echo $ivf_art_summary_delete->DateofET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<th class="<?php echo $ivf_art_summary_delete->Reasonfornotranfer->headerCellClass() ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><?php echo $ivf_art_summary_delete->Reasonfornotranfer->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<th class="<?php echo $ivf_art_summary_delete->EmbryosCryopreserved->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><?php echo $ivf_art_summary_delete->EmbryosCryopreserved->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->LegendCellStage->Visible) { // LegendCellStage ?>
		<th class="<?php echo $ivf_art_summary_delete->LegendCellStage->headerCellClass() ?>"><span id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><?php echo $ivf_art_summary_delete->LegendCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<th class="<?php echo $ivf_art_summary_delete->ConsultantsSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><?php echo $ivf_art_summary_delete->ConsultantsSignature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_art_summary_delete->Name->headerCellClass() ?>"><span id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><?php echo $ivf_art_summary_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->M2->Visible) { // M2 ?>
		<th class="<?php echo $ivf_art_summary_delete->M2->headerCellClass() ?>"><span id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><?php echo $ivf_art_summary_delete->M2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Mi2->Visible) { // Mi2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Mi2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><?php echo $ivf_art_summary_delete->Mi2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->ICSI->Visible) { // ICSI ?>
		<th class="<?php echo $ivf_art_summary_delete->ICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><?php echo $ivf_art_summary_delete->ICSI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->IVF->Visible) { // IVF ?>
		<th class="<?php echo $ivf_art_summary_delete->IVF->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><?php echo $ivf_art_summary_delete->IVF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->M1->Visible) { // M1 ?>
		<th class="<?php echo $ivf_art_summary_delete->M1->headerCellClass() ?>"><span id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><?php echo $ivf_art_summary_delete->M1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->GV->Visible) { // GV ?>
		<th class="<?php echo $ivf_art_summary_delete->GV->headerCellClass() ?>"><span id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><?php echo $ivf_art_summary_delete->GV->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Others->Visible) { // Others ?>
		<th class="<?php echo $ivf_art_summary_delete->Others->headerCellClass() ?>"><span id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others"><?php echo $ivf_art_summary_delete->Others->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Normal2PN->Visible) { // Normal2PN ?>
		<th class="<?php echo $ivf_art_summary_delete->Normal2PN->headerCellClass() ?>"><span id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><?php echo $ivf_art_summary_delete->Normal2PN->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<th class="<?php echo $ivf_art_summary_delete->Abnormalfertilisation1N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><?php echo $ivf_art_summary_delete->Abnormalfertilisation1N->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<th class="<?php echo $ivf_art_summary_delete->Abnormalfertilisation3N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><?php echo $ivf_art_summary_delete->Abnormalfertilisation3N->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotFertilized->Visible) { // NotFertilized ?>
		<th class="<?php echo $ivf_art_summary_delete->NotFertilized->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><?php echo $ivf_art_summary_delete->NotFertilized->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Degenerated->Visible) { // Degenerated ?>
		<th class="<?php echo $ivf_art_summary_delete->Degenerated->headerCellClass() ?>"><span id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><?php echo $ivf_art_summary_delete->Degenerated->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->SpermDate->Visible) { // SpermDate ?>
		<th class="<?php echo $ivf_art_summary_delete->SpermDate->headerCellClass() ?>"><span id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><?php echo $ivf_art_summary_delete->SpermDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code1->Visible) { // Code1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Code1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><?php echo $ivf_art_summary_delete->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day1->Visible) { // Day1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Day1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><?php echo $ivf_art_summary_delete->Day1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage1->Visible) { // CellStage1 ?>
		<th class="<?php echo $ivf_art_summary_delete->CellStage1->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><?php echo $ivf_art_summary_delete->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade1->Visible) { // Grade1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Grade1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><?php echo $ivf_art_summary_delete->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->State1->Visible) { // State1 ?>
		<th class="<?php echo $ivf_art_summary_delete->State1->headerCellClass() ?>"><span id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><?php echo $ivf_art_summary_delete->State1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code2->Visible) { // Code2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Code2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><?php echo $ivf_art_summary_delete->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day2->Visible) { // Day2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Day2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><?php echo $ivf_art_summary_delete->Day2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage2->Visible) { // CellStage2 ?>
		<th class="<?php echo $ivf_art_summary_delete->CellStage2->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><?php echo $ivf_art_summary_delete->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade2->Visible) { // Grade2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Grade2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><?php echo $ivf_art_summary_delete->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->State2->Visible) { // State2 ?>
		<th class="<?php echo $ivf_art_summary_delete->State2->headerCellClass() ?>"><span id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><?php echo $ivf_art_summary_delete->State2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code3->Visible) { // Code3 ?>
		<th class="<?php echo $ivf_art_summary_delete->Code3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><?php echo $ivf_art_summary_delete->Code3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day3->Visible) { // Day3 ?>
		<th class="<?php echo $ivf_art_summary_delete->Day3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><?php echo $ivf_art_summary_delete->Day3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage3->Visible) { // CellStage3 ?>
		<th class="<?php echo $ivf_art_summary_delete->CellStage3->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><?php echo $ivf_art_summary_delete->CellStage3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade3->Visible) { // Grade3 ?>
		<th class="<?php echo $ivf_art_summary_delete->Grade3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><?php echo $ivf_art_summary_delete->Grade3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->State3->Visible) { // State3 ?>
		<th class="<?php echo $ivf_art_summary_delete->State3->headerCellClass() ?>"><span id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><?php echo $ivf_art_summary_delete->State3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code4->Visible) { // Code4 ?>
		<th class="<?php echo $ivf_art_summary_delete->Code4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><?php echo $ivf_art_summary_delete->Code4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day4->Visible) { // Day4 ?>
		<th class="<?php echo $ivf_art_summary_delete->Day4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><?php echo $ivf_art_summary_delete->Day4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage4->Visible) { // CellStage4 ?>
		<th class="<?php echo $ivf_art_summary_delete->CellStage4->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><?php echo $ivf_art_summary_delete->CellStage4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade4->Visible) { // Grade4 ?>
		<th class="<?php echo $ivf_art_summary_delete->Grade4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><?php echo $ivf_art_summary_delete->Grade4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->State4->Visible) { // State4 ?>
		<th class="<?php echo $ivf_art_summary_delete->State4->headerCellClass() ?>"><span id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><?php echo $ivf_art_summary_delete->State4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code5->Visible) { // Code5 ?>
		<th class="<?php echo $ivf_art_summary_delete->Code5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><?php echo $ivf_art_summary_delete->Code5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day5->Visible) { // Day5 ?>
		<th class="<?php echo $ivf_art_summary_delete->Day5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><?php echo $ivf_art_summary_delete->Day5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage5->Visible) { // CellStage5 ?>
		<th class="<?php echo $ivf_art_summary_delete->CellStage5->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><?php echo $ivf_art_summary_delete->CellStage5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade5->Visible) { // Grade5 ?>
		<th class="<?php echo $ivf_art_summary_delete->Grade5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><?php echo $ivf_art_summary_delete->Grade5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->State5->Visible) { // State5 ?>
		<th class="<?php echo $ivf_art_summary_delete->State5->headerCellClass() ?>"><span id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><?php echo $ivf_art_summary_delete->State5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_art_summary_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><?php echo $ivf_art_summary_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_art_summary_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><?php echo $ivf_art_summary_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume->Visible) { // Volume ?>
		<th class="<?php echo $ivf_art_summary_delete->Volume->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><?php echo $ivf_art_summary_delete->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume1->Visible) { // Volume1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Volume1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><?php echo $ivf_art_summary_delete->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume2->Visible) { // Volume2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Volume2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><?php echo $ivf_art_summary_delete->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Concentration2->Visible) { // Concentration2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Concentration2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><?php echo $ivf_art_summary_delete->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total->Visible) { // Total ?>
		<th class="<?php echo $ivf_art_summary_delete->Total->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><?php echo $ivf_art_summary_delete->Total->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total1->Visible) { // Total1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Total1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><?php echo $ivf_art_summary_delete->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total2->Visible) { // Total2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Total2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><?php echo $ivf_art_summary_delete->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive->Visible) { // Progressive ?>
		<th class="<?php echo $ivf_art_summary_delete->Progressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><?php echo $ivf_art_summary_delete->Progressive->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive1->Visible) { // Progressive1 ?>
		<th class="<?php echo $ivf_art_summary_delete->Progressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><?php echo $ivf_art_summary_delete->Progressive1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive2->Visible) { // Progressive2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Progressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><?php echo $ivf_art_summary_delete->Progressive2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive->Visible) { // NotProgressive ?>
		<th class="<?php echo $ivf_art_summary_delete->NotProgressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><?php echo $ivf_art_summary_delete->NotProgressive->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive1->Visible) { // NotProgressive1 ?>
		<th class="<?php echo $ivf_art_summary_delete->NotProgressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><?php echo $ivf_art_summary_delete->NotProgressive1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive2->Visible) { // NotProgressive2 ?>
		<th class="<?php echo $ivf_art_summary_delete->NotProgressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><?php echo $ivf_art_summary_delete->NotProgressive2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Motility2->Visible) { // Motility2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Motility2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><?php echo $ivf_art_summary_delete->Motility2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_art_summary_delete->Morphology2->Visible) { // Morphology2 ?>
		<th class="<?php echo $ivf_art_summary_delete->Morphology2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><?php echo $ivf_art_summary_delete->Morphology2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_art_summary_delete->RecordCount = 0;
$i = 0;
while (!$ivf_art_summary_delete->Recordset->EOF) {
	$ivf_art_summary_delete->RecordCount++;
	$ivf_art_summary_delete->RowCount++;

	// Set row properties
	$ivf_art_summary->resetAttributes();
	$ivf_art_summary->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_art_summary_delete->loadRowValues($ivf_art_summary_delete->Recordset);

	// Render row
	$ivf_art_summary_delete->renderRow();
?>
	<tr <?php echo $ivf_art_summary->rowAttributes() ?>>
<?php if ($ivf_art_summary_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_art_summary_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_id" class="ivf_art_summary_id">
<span<?php echo $ivf_art_summary_delete->id->viewAttributes() ?>><?php echo $ivf_art_summary_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->ARTCycle->Visible) { // ARTCycle ?>
		<td <?php echo $ivf_art_summary_delete->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary_delete->ARTCycle->viewAttributes() ?>><?php echo $ivf_art_summary_delete->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Spermorigin->Visible) { // Spermorigin ?>
		<td <?php echo $ivf_art_summary_delete->Spermorigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary_delete->Spermorigin->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Spermorigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->IndicationforART->Visible) { // IndicationforART ?>
		<td <?php echo $ivf_art_summary_delete->IndicationforART->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary_delete->IndicationforART->viewAttributes() ?>><?php echo $ivf_art_summary_delete->IndicationforART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->DateofICSI->Visible) { // DateofICSI ?>
		<td <?php echo $ivf_art_summary_delete->DateofICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary_delete->DateofICSI->viewAttributes() ?>><?php echo $ivf_art_summary_delete->DateofICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Origin->Visible) { // Origin ?>
		<td <?php echo $ivf_art_summary_delete->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary_delete->Origin->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Status->Visible) { // Status ?>
		<td <?php echo $ivf_art_summary_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Status" class="ivf_art_summary_Status">
<span<?php echo $ivf_art_summary_delete->Status->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Method->Visible) { // Method ?>
		<td <?php echo $ivf_art_summary_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Method" class="ivf_art_summary_Method">
<span<?php echo $ivf_art_summary_delete->Method->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Concentration->Visible) { // pre_Concentration ?>
		<td <?php echo $ivf_art_summary_delete->pre_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary_delete->pre_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_delete->pre_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Motility->Visible) { // pre_Motility ?>
		<td <?php echo $ivf_art_summary_delete->pre_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary_delete->pre_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_delete->pre_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->pre_Morphology->Visible) { // pre_Morphology ?>
		<td <?php echo $ivf_art_summary_delete->pre_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary_delete->pre_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_delete->pre_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Concentration->Visible) { // post_Concentration ?>
		<td <?php echo $ivf_art_summary_delete->post_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary_delete->post_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_delete->post_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Motility->Visible) { // post_Motility ?>
		<td <?php echo $ivf_art_summary_delete->post_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary_delete->post_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_delete->post_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->post_Morphology->Visible) { // post_Morphology ?>
		<td <?php echo $ivf_art_summary_delete->post_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary_delete->post_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_delete->post_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td <?php echo $ivf_art_summary_delete->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary_delete->NumberofEmbryostransferred->viewAttributes() ?>><?php echo $ivf_art_summary_delete->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td <?php echo $ivf_art_summary_delete->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary_delete->Embryosunderobservation->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td <?php echo $ivf_art_summary_delete->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary_delete->EmbryoDevelopmentSummary->viewAttributes() ?>><?php echo $ivf_art_summary_delete->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td <?php echo $ivf_art_summary_delete->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary_delete->EmbryologistSignature->viewAttributes() ?>><?php echo $ivf_art_summary_delete->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td <?php echo $ivf_art_summary_delete->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary_delete->IVFRegistrationID->viewAttributes() ?>><?php echo $ivf_art_summary_delete->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td <?php echo $ivf_art_summary_delete->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary_delete->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_art_summary_delete->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->ICSIDetails->Visible) { // ICSIDetails ?>
		<td <?php echo $ivf_art_summary_delete->ICSIDetails->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary_delete->ICSIDetails->viewAttributes() ?>><?php echo $ivf_art_summary_delete->ICSIDetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->DateofET->Visible) { // DateofET ?>
		<td <?php echo $ivf_art_summary_delete->DateofET->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary_delete->DateofET->viewAttributes() ?>><?php echo $ivf_art_summary_delete->DateofET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td <?php echo $ivf_art_summary_delete->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary_delete->Reasonfornotranfer->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td <?php echo $ivf_art_summary_delete->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary_delete->EmbryosCryopreserved->viewAttributes() ?>><?php echo $ivf_art_summary_delete->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->LegendCellStage->Visible) { // LegendCellStage ?>
		<td <?php echo $ivf_art_summary_delete->LegendCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary_delete->LegendCellStage->viewAttributes() ?>><?php echo $ivf_art_summary_delete->LegendCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td <?php echo $ivf_art_summary_delete->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary_delete->ConsultantsSignature->viewAttributes() ?>><?php echo $ivf_art_summary_delete->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_art_summary_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Name" class="ivf_art_summary_Name">
<span<?php echo $ivf_art_summary_delete->Name->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->M2->Visible) { // M2 ?>
		<td <?php echo $ivf_art_summary_delete->M2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_M2" class="ivf_art_summary_M2">
<span<?php echo $ivf_art_summary_delete->M2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->M2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Mi2->Visible) { // Mi2 ?>
		<td <?php echo $ivf_art_summary_delete->Mi2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary_delete->Mi2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Mi2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->ICSI->Visible) { // ICSI ?>
		<td <?php echo $ivf_art_summary_delete->ICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary_delete->ICSI->viewAttributes() ?>><?php echo $ivf_art_summary_delete->ICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->IVF->Visible) { // IVF ?>
		<td <?php echo $ivf_art_summary_delete->IVF->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary_delete->IVF->viewAttributes() ?>><?php echo $ivf_art_summary_delete->IVF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->M1->Visible) { // M1 ?>
		<td <?php echo $ivf_art_summary_delete->M1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_M1" class="ivf_art_summary_M1">
<span<?php echo $ivf_art_summary_delete->M1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->M1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->GV->Visible) { // GV ?>
		<td <?php echo $ivf_art_summary_delete->GV->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_GV" class="ivf_art_summary_GV">
<span<?php echo $ivf_art_summary_delete->GV->viewAttributes() ?>><?php echo $ivf_art_summary_delete->GV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Others->Visible) { // Others ?>
		<td <?php echo $ivf_art_summary_delete->Others->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Others" class="ivf_art_summary_Others">
<span<?php echo $ivf_art_summary_delete->Others->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Others->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Normal2PN->Visible) { // Normal2PN ?>
		<td <?php echo $ivf_art_summary_delete->Normal2PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary_delete->Normal2PN->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Normal2PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td <?php echo $ivf_art_summary_delete->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary_delete->Abnormalfertilisation1N->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td <?php echo $ivf_art_summary_delete->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary_delete->Abnormalfertilisation3N->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotFertilized->Visible) { // NotFertilized ?>
		<td <?php echo $ivf_art_summary_delete->NotFertilized->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary_delete->NotFertilized->viewAttributes() ?>><?php echo $ivf_art_summary_delete->NotFertilized->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Degenerated->Visible) { // Degenerated ?>
		<td <?php echo $ivf_art_summary_delete->Degenerated->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary_delete->Degenerated->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Degenerated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->SpermDate->Visible) { // SpermDate ?>
		<td <?php echo $ivf_art_summary_delete->SpermDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary_delete->SpermDate->viewAttributes() ?>><?php echo $ivf_art_summary_delete->SpermDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code1->Visible) { // Code1 ?>
		<td <?php echo $ivf_art_summary_delete->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary_delete->Code1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day1->Visible) { // Day1 ?>
		<td <?php echo $ivf_art_summary_delete->Day1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary_delete->Day1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Day1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage1->Visible) { // CellStage1 ?>
		<td <?php echo $ivf_art_summary_delete->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary_delete->CellStage1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade1->Visible) { // Grade1 ?>
		<td <?php echo $ivf_art_summary_delete->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary_delete->Grade1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->State1->Visible) { // State1 ?>
		<td <?php echo $ivf_art_summary_delete->State1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_State1" class="ivf_art_summary_State1">
<span<?php echo $ivf_art_summary_delete->State1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->State1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code2->Visible) { // Code2 ?>
		<td <?php echo $ivf_art_summary_delete->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary_delete->Code2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day2->Visible) { // Day2 ?>
		<td <?php echo $ivf_art_summary_delete->Day2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary_delete->Day2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Day2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage2->Visible) { // CellStage2 ?>
		<td <?php echo $ivf_art_summary_delete->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary_delete->CellStage2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade2->Visible) { // Grade2 ?>
		<td <?php echo $ivf_art_summary_delete->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary_delete->Grade2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->State2->Visible) { // State2 ?>
		<td <?php echo $ivf_art_summary_delete->State2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_State2" class="ivf_art_summary_State2">
<span<?php echo $ivf_art_summary_delete->State2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->State2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code3->Visible) { // Code3 ?>
		<td <?php echo $ivf_art_summary_delete->Code3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary_delete->Code3->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Code3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day3->Visible) { // Day3 ?>
		<td <?php echo $ivf_art_summary_delete->Day3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary_delete->Day3->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Day3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage3->Visible) { // CellStage3 ?>
		<td <?php echo $ivf_art_summary_delete->CellStage3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary_delete->CellStage3->viewAttributes() ?>><?php echo $ivf_art_summary_delete->CellStage3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade3->Visible) { // Grade3 ?>
		<td <?php echo $ivf_art_summary_delete->Grade3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary_delete->Grade3->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Grade3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->State3->Visible) { // State3 ?>
		<td <?php echo $ivf_art_summary_delete->State3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_State3" class="ivf_art_summary_State3">
<span<?php echo $ivf_art_summary_delete->State3->viewAttributes() ?>><?php echo $ivf_art_summary_delete->State3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code4->Visible) { // Code4 ?>
		<td <?php echo $ivf_art_summary_delete->Code4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary_delete->Code4->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Code4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day4->Visible) { // Day4 ?>
		<td <?php echo $ivf_art_summary_delete->Day4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary_delete->Day4->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Day4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage4->Visible) { // CellStage4 ?>
		<td <?php echo $ivf_art_summary_delete->CellStage4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary_delete->CellStage4->viewAttributes() ?>><?php echo $ivf_art_summary_delete->CellStage4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade4->Visible) { // Grade4 ?>
		<td <?php echo $ivf_art_summary_delete->Grade4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary_delete->Grade4->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Grade4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->State4->Visible) { // State4 ?>
		<td <?php echo $ivf_art_summary_delete->State4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_State4" class="ivf_art_summary_State4">
<span<?php echo $ivf_art_summary_delete->State4->viewAttributes() ?>><?php echo $ivf_art_summary_delete->State4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Code5->Visible) { // Code5 ?>
		<td <?php echo $ivf_art_summary_delete->Code5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary_delete->Code5->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Code5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Day5->Visible) { // Day5 ?>
		<td <?php echo $ivf_art_summary_delete->Day5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary_delete->Day5->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Day5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->CellStage5->Visible) { // CellStage5 ?>
		<td <?php echo $ivf_art_summary_delete->CellStage5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary_delete->CellStage5->viewAttributes() ?>><?php echo $ivf_art_summary_delete->CellStage5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Grade5->Visible) { // Grade5 ?>
		<td <?php echo $ivf_art_summary_delete->Grade5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary_delete->Grade5->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Grade5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->State5->Visible) { // State5 ?>
		<td <?php echo $ivf_art_summary_delete->State5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_State5" class="ivf_art_summary_State5">
<span<?php echo $ivf_art_summary_delete->State5->viewAttributes() ?>><?php echo $ivf_art_summary_delete->State5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_art_summary_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary_delete->TidNo->viewAttributes() ?>><?php echo $ivf_art_summary_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_art_summary_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_art_summary_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume->Visible) { // Volume ?>
		<td <?php echo $ivf_art_summary_delete->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary_delete->Volume->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume1->Visible) { // Volume1 ?>
		<td <?php echo $ivf_art_summary_delete->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary_delete->Volume1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Volume2->Visible) { // Volume2 ?>
		<td <?php echo $ivf_art_summary_delete->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary_delete->Volume2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Concentration2->Visible) { // Concentration2 ?>
		<td <?php echo $ivf_art_summary_delete->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary_delete->Concentration2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total->Visible) { // Total ?>
		<td <?php echo $ivf_art_summary_delete->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Total" class="ivf_art_summary_Total">
<span<?php echo $ivf_art_summary_delete->Total->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total1->Visible) { // Total1 ?>
		<td <?php echo $ivf_art_summary_delete->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary_delete->Total1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Total2->Visible) { // Total2 ?>
		<td <?php echo $ivf_art_summary_delete->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary_delete->Total2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive->Visible) { // Progressive ?>
		<td <?php echo $ivf_art_summary_delete->Progressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary_delete->Progressive->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Progressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive1->Visible) { // Progressive1 ?>
		<td <?php echo $ivf_art_summary_delete->Progressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary_delete->Progressive1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Progressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Progressive2->Visible) { // Progressive2 ?>
		<td <?php echo $ivf_art_summary_delete->Progressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary_delete->Progressive2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Progressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive->Visible) { // NotProgressive ?>
		<td <?php echo $ivf_art_summary_delete->NotProgressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary_delete->NotProgressive->viewAttributes() ?>><?php echo $ivf_art_summary_delete->NotProgressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td <?php echo $ivf_art_summary_delete->NotProgressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary_delete->NotProgressive1->viewAttributes() ?>><?php echo $ivf_art_summary_delete->NotProgressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td <?php echo $ivf_art_summary_delete->NotProgressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary_delete->NotProgressive2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->NotProgressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Motility2->Visible) { // Motility2 ?>
		<td <?php echo $ivf_art_summary_delete->Motility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary_delete->Motility2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Motility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_art_summary_delete->Morphology2->Visible) { // Morphology2 ?>
		<td <?php echo $ivf_art_summary_delete->Morphology2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_delete->RowCount ?>_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary_delete->Morphology2->viewAttributes() ?>><?php echo $ivf_art_summary_delete->Morphology2->getViewValue() ?></span>
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
$ivf_art_summary_delete->terminate();
?>