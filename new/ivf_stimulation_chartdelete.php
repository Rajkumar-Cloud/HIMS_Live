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
$ivf_stimulation_chart_delete = new ivf_stimulation_chart_delete();

// Run the page
$ivf_stimulation_chart_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_stimulation_chartdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_stimulation_chartdelete = currentForm = new ew.Form("fivf_stimulation_chartdelete", "delete");
	loadjs.done("fivf_stimulation_chartdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_stimulation_chart_delete->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_delete->showMessage();
?>
<form name="fivf_stimulation_chartdelete" id="fivf_stimulation_chartdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_stimulation_chart_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_stimulation_chart_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->id->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id"><?php echo $ivf_stimulation_chart_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo"><?php echo $ivf_stimulation_chart_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Name->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name"><?php echo $ivf_stimulation_chart_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle"><?php echo $ivf_stimulation_chart_delete->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FemaleFactor->Visible) { // FemaleFactor ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->FemaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor"><?php echo $ivf_stimulation_chart_delete->FemaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MaleFactor->Visible) { // MaleFactor ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->MaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor"><?php echo $ivf_stimulation_chart_delete->MaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Protocol->Visible) { // Protocol ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Protocol->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol"><?php echo $ivf_stimulation_chart_delete->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SemenFrozen->Visible) { // SemenFrozen ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SemenFrozen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen"><?php echo $ivf_stimulation_chart_delete->SemenFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->A4ICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle"><?php echo $ivf_stimulation_chart_delete->A4ICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TotalICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle"><?php echo $ivf_stimulation_chart_delete->TotalICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility"><?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Duration->Visible) { // Duration ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Duration->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration"><?php echo $ivf_stimulation_chart_delete->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->LMP->Visible) { // LMP ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->LMP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP"><?php echo $ivf_stimulation_chart_delete->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RelevantHistory->Visible) { // RelevantHistory ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RelevantHistory->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory"><?php echo $ivf_stimulation_chart_delete->RelevantHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->IUICycles->Visible) { // IUICycles ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->IUICycles->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles"><?php echo $ivf_stimulation_chart_delete->IUICycles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AFC->Visible) { // AFC ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->AFC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC"><?php echo $ivf_stimulation_chart_delete->AFC->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AMH->Visible) { // AMH ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->AMH->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH"><?php echo $ivf_stimulation_chart_delete->AMH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FBMI->Visible) { // FBMI ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->FBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI"><?php echo $ivf_stimulation_chart_delete->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MBMI->Visible) { // MBMI ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->MBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI"><?php echo $ivf_stimulation_chart_delete->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->OvarianVolumeRT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT"><?php echo $ivf_stimulation_chart_delete->OvarianVolumeRT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->OvarianVolumeLT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT"><?php echo $ivf_stimulation_chart_delete->OvarianVolumeLT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DAYSOFSTIMULATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION"><?php echo $ivf_stimulation_chart_delete->DAYSOFSTIMULATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?php echo $ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->INJTYPE->Visible) { // INJTYPE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->INJTYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE"><?php echo $ivf_stimulation_chart_delete->INJTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ANTAGONISTDAYS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS"><?php echo $ivf_stimulation_chart_delete->ANTAGONISTDAYS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GROWTHHORMONE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE"><?php echo $ivf_stimulation_chart_delete->GROWTHHORMONE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->PRETREATMENT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT"><?php echo $ivf_stimulation_chart_delete->PRETREATMENT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SerumP4->Visible) { // SerumP4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SerumP4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4"><?php echo $ivf_stimulation_chart_delete->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FORT->Visible) { // FORT ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->FORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT"><?php echo $ivf_stimulation_chart_delete->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MedicalFactors->Visible) { // MedicalFactors ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->MedicalFactors->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors"><?php echo $ivf_stimulation_chart_delete->MedicalFactors->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SCDate->Visible) { // SCDate ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SCDate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate"><?php echo $ivf_stimulation_chart_delete->SCDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->OvarianSurgery->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery"><?php echo $ivf_stimulation_chart_delete->OvarianSurgery->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->PreProcedureOrder->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder"><?php echo $ivf_stimulation_chart_delete->PreProcedureOrder->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TRIGGERR->Visible) { // TRIGGERR ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TRIGGERR->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR"><?php echo $ivf_stimulation_chart_delete->TRIGGERR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TRIGGERDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE"><?php echo $ivf_stimulation_chart_delete->TRIGGERDATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC"><?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OPUDATE->Visible) { // OPUDATE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->OPUDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE"><?php echo $ivf_stimulation_chart_delete->OPUDATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION"><?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ERA->Visible) { // ERA ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ERA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA"><?php echo $ivf_stimulation_chart_delete->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PGTA->Visible) { // PGTA ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->PGTA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA"><?php echo $ivf_stimulation_chart_delete->PGTA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PGD->Visible) { // PGD ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->PGD->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD"><?php echo $ivf_stimulation_chart_delete->PGD->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DATEOFET->Visible) { // DATEOFET ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DATEOFET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET"><?php echo $ivf_stimulation_chart_delete->DATEOFET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ET->Visible) { // ET ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET"><?php echo $ivf_stimulation_chart_delete->ET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ESET->Visible) { // ESET ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET"><?php echo $ivf_stimulation_chart_delete->ESET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DOET->Visible) { // DOET ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DOET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET"><?php echo $ivf_stimulation_chart_delete->DOET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION"><?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->REASONFORESET->Visible) { // REASONFORESET ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->REASONFORESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET"><?php echo $ivf_stimulation_chart_delete->REASONFORESET->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Expectedoocytes->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes"><?php echo $ivf_stimulation_chart_delete->Expectedoocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate1->Visible) { // StChDate1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1"><?php echo $ivf_stimulation_chart_delete->StChDate1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate2->Visible) { // StChDate2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2"><?php echo $ivf_stimulation_chart_delete->StChDate2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate3->Visible) { // StChDate3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3"><?php echo $ivf_stimulation_chart_delete->StChDate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate4->Visible) { // StChDate4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4"><?php echo $ivf_stimulation_chart_delete->StChDate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate5->Visible) { // StChDate5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5"><?php echo $ivf_stimulation_chart_delete->StChDate5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate6->Visible) { // StChDate6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6"><?php echo $ivf_stimulation_chart_delete->StChDate6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate7->Visible) { // StChDate7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7"><?php echo $ivf_stimulation_chart_delete->StChDate7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate8->Visible) { // StChDate8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8"><?php echo $ivf_stimulation_chart_delete->StChDate8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate9->Visible) { // StChDate9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9"><?php echo $ivf_stimulation_chart_delete->StChDate9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate10->Visible) { // StChDate10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10"><?php echo $ivf_stimulation_chart_delete->StChDate10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate11->Visible) { // StChDate11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11"><?php echo $ivf_stimulation_chart_delete->StChDate11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate12->Visible) { // StChDate12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12"><?php echo $ivf_stimulation_chart_delete->StChDate12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate13->Visible) { // StChDate13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13"><?php echo $ivf_stimulation_chart_delete->StChDate13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay1->Visible) { // CycleDay1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1"><?php echo $ivf_stimulation_chart_delete->CycleDay1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay2->Visible) { // CycleDay2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2"><?php echo $ivf_stimulation_chart_delete->CycleDay2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay3->Visible) { // CycleDay3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3"><?php echo $ivf_stimulation_chart_delete->CycleDay3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay4->Visible) { // CycleDay4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4"><?php echo $ivf_stimulation_chart_delete->CycleDay4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay5->Visible) { // CycleDay5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5"><?php echo $ivf_stimulation_chart_delete->CycleDay5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay6->Visible) { // CycleDay6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6"><?php echo $ivf_stimulation_chart_delete->CycleDay6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay7->Visible) { // CycleDay7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7"><?php echo $ivf_stimulation_chart_delete->CycleDay7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay8->Visible) { // CycleDay8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8"><?php echo $ivf_stimulation_chart_delete->CycleDay8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay9->Visible) { // CycleDay9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9"><?php echo $ivf_stimulation_chart_delete->CycleDay9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay10->Visible) { // CycleDay10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10"><?php echo $ivf_stimulation_chart_delete->CycleDay10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay11->Visible) { // CycleDay11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11"><?php echo $ivf_stimulation_chart_delete->CycleDay11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay12->Visible) { // CycleDay12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12"><?php echo $ivf_stimulation_chart_delete->CycleDay12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay13->Visible) { // CycleDay13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13"><?php echo $ivf_stimulation_chart_delete->CycleDay13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay1->Visible) { // StimulationDay1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1"><?php echo $ivf_stimulation_chart_delete->StimulationDay1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay2->Visible) { // StimulationDay2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2"><?php echo $ivf_stimulation_chart_delete->StimulationDay2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay3->Visible) { // StimulationDay3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3"><?php echo $ivf_stimulation_chart_delete->StimulationDay3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay4->Visible) { // StimulationDay4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4"><?php echo $ivf_stimulation_chart_delete->StimulationDay4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay5->Visible) { // StimulationDay5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5"><?php echo $ivf_stimulation_chart_delete->StimulationDay5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay6->Visible) { // StimulationDay6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6"><?php echo $ivf_stimulation_chart_delete->StimulationDay6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay7->Visible) { // StimulationDay7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7"><?php echo $ivf_stimulation_chart_delete->StimulationDay7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay8->Visible) { // StimulationDay8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8"><?php echo $ivf_stimulation_chart_delete->StimulationDay8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay9->Visible) { // StimulationDay9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9"><?php echo $ivf_stimulation_chart_delete->StimulationDay9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay10->Visible) { // StimulationDay10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10"><?php echo $ivf_stimulation_chart_delete->StimulationDay10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay11->Visible) { // StimulationDay11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11"><?php echo $ivf_stimulation_chart_delete->StimulationDay11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay12->Visible) { // StimulationDay12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12"><?php echo $ivf_stimulation_chart_delete->StimulationDay12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay13->Visible) { // StimulationDay13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13"><?php echo $ivf_stimulation_chart_delete->StimulationDay13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet1->Visible) { // Tablet1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1"><?php echo $ivf_stimulation_chart_delete->Tablet1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet2->Visible) { // Tablet2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2"><?php echo $ivf_stimulation_chart_delete->Tablet2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet3->Visible) { // Tablet3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3"><?php echo $ivf_stimulation_chart_delete->Tablet3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet4->Visible) { // Tablet4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4"><?php echo $ivf_stimulation_chart_delete->Tablet4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet5->Visible) { // Tablet5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5"><?php echo $ivf_stimulation_chart_delete->Tablet5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet6->Visible) { // Tablet6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6"><?php echo $ivf_stimulation_chart_delete->Tablet6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet7->Visible) { // Tablet7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7"><?php echo $ivf_stimulation_chart_delete->Tablet7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet8->Visible) { // Tablet8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8"><?php echo $ivf_stimulation_chart_delete->Tablet8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet9->Visible) { // Tablet9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9"><?php echo $ivf_stimulation_chart_delete->Tablet9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet10->Visible) { // Tablet10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10"><?php echo $ivf_stimulation_chart_delete->Tablet10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet11->Visible) { // Tablet11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11"><?php echo $ivf_stimulation_chart_delete->Tablet11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet12->Visible) { // Tablet12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12"><?php echo $ivf_stimulation_chart_delete->Tablet12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet13->Visible) { // Tablet13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13"><?php echo $ivf_stimulation_chart_delete->Tablet13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH1->Visible) { // RFSH1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1"><?php echo $ivf_stimulation_chart_delete->RFSH1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH2->Visible) { // RFSH2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2"><?php echo $ivf_stimulation_chart_delete->RFSH2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH3->Visible) { // RFSH3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3"><?php echo $ivf_stimulation_chart_delete->RFSH3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH4->Visible) { // RFSH4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4"><?php echo $ivf_stimulation_chart_delete->RFSH4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH5->Visible) { // RFSH5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5"><?php echo $ivf_stimulation_chart_delete->RFSH5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH6->Visible) { // RFSH6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6"><?php echo $ivf_stimulation_chart_delete->RFSH6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH7->Visible) { // RFSH7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7"><?php echo $ivf_stimulation_chart_delete->RFSH7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH8->Visible) { // RFSH8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8"><?php echo $ivf_stimulation_chart_delete->RFSH8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH9->Visible) { // RFSH9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9"><?php echo $ivf_stimulation_chart_delete->RFSH9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH10->Visible) { // RFSH10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10"><?php echo $ivf_stimulation_chart_delete->RFSH10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH11->Visible) { // RFSH11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11"><?php echo $ivf_stimulation_chart_delete->RFSH11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH12->Visible) { // RFSH12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12"><?php echo $ivf_stimulation_chart_delete->RFSH12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH13->Visible) { // RFSH13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13"><?php echo $ivf_stimulation_chart_delete->RFSH13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG1->Visible) { // HMG1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1"><?php echo $ivf_stimulation_chart_delete->HMG1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG2->Visible) { // HMG2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2"><?php echo $ivf_stimulation_chart_delete->HMG2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG3->Visible) { // HMG3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3"><?php echo $ivf_stimulation_chart_delete->HMG3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG4->Visible) { // HMG4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4"><?php echo $ivf_stimulation_chart_delete->HMG4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG5->Visible) { // HMG5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5"><?php echo $ivf_stimulation_chart_delete->HMG5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG6->Visible) { // HMG6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6"><?php echo $ivf_stimulation_chart_delete->HMG6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG7->Visible) { // HMG7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7"><?php echo $ivf_stimulation_chart_delete->HMG7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG8->Visible) { // HMG8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8"><?php echo $ivf_stimulation_chart_delete->HMG8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG9->Visible) { // HMG9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9"><?php echo $ivf_stimulation_chart_delete->HMG9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG10->Visible) { // HMG10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10"><?php echo $ivf_stimulation_chart_delete->HMG10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG11->Visible) { // HMG11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11"><?php echo $ivf_stimulation_chart_delete->HMG11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG12->Visible) { // HMG12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12"><?php echo $ivf_stimulation_chart_delete->HMG12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG13->Visible) { // HMG13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13"><?php echo $ivf_stimulation_chart_delete->HMG13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH1->Visible) { // GnRH1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1"><?php echo $ivf_stimulation_chart_delete->GnRH1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH2->Visible) { // GnRH2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2"><?php echo $ivf_stimulation_chart_delete->GnRH2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH3->Visible) { // GnRH3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3"><?php echo $ivf_stimulation_chart_delete->GnRH3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH4->Visible) { // GnRH4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4"><?php echo $ivf_stimulation_chart_delete->GnRH4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH5->Visible) { // GnRH5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5"><?php echo $ivf_stimulation_chart_delete->GnRH5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH6->Visible) { // GnRH6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6"><?php echo $ivf_stimulation_chart_delete->GnRH6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH7->Visible) { // GnRH7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7"><?php echo $ivf_stimulation_chart_delete->GnRH7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH8->Visible) { // GnRH8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8"><?php echo $ivf_stimulation_chart_delete->GnRH8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH9->Visible) { // GnRH9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9"><?php echo $ivf_stimulation_chart_delete->GnRH9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH10->Visible) { // GnRH10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10"><?php echo $ivf_stimulation_chart_delete->GnRH10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH11->Visible) { // GnRH11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11"><?php echo $ivf_stimulation_chart_delete->GnRH11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH12->Visible) { // GnRH12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12"><?php echo $ivf_stimulation_chart_delete->GnRH12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH13->Visible) { // GnRH13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13"><?php echo $ivf_stimulation_chart_delete->GnRH13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E21->Visible) { // E21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21"><?php echo $ivf_stimulation_chart_delete->E21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E22->Visible) { // E22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22"><?php echo $ivf_stimulation_chart_delete->E22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E23->Visible) { // E23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23"><?php echo $ivf_stimulation_chart_delete->E23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E24->Visible) { // E24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24"><?php echo $ivf_stimulation_chart_delete->E24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E25->Visible) { // E25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25"><?php echo $ivf_stimulation_chart_delete->E25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E26->Visible) { // E26 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E26->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26"><?php echo $ivf_stimulation_chart_delete->E26->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E27->Visible) { // E27 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E27->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27"><?php echo $ivf_stimulation_chart_delete->E27->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E28->Visible) { // E28 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E28->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28"><?php echo $ivf_stimulation_chart_delete->E28->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E29->Visible) { // E29 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E29->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29"><?php echo $ivf_stimulation_chart_delete->E29->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E210->Visible) { // E210 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E210->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210"><?php echo $ivf_stimulation_chart_delete->E210->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E211->Visible) { // E211 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E211->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211"><?php echo $ivf_stimulation_chart_delete->E211->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E212->Visible) { // E212 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E212->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212"><?php echo $ivf_stimulation_chart_delete->E212->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E213->Visible) { // E213 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E213->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213"><?php echo $ivf_stimulation_chart_delete->E213->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P41->Visible) { // P41 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P41->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41"><?php echo $ivf_stimulation_chart_delete->P41->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P42->Visible) { // P42 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P42->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42"><?php echo $ivf_stimulation_chart_delete->P42->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P43->Visible) { // P43 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P43->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43"><?php echo $ivf_stimulation_chart_delete->P43->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P44->Visible) { // P44 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P44->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44"><?php echo $ivf_stimulation_chart_delete->P44->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P45->Visible) { // P45 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P45->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45"><?php echo $ivf_stimulation_chart_delete->P45->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P46->Visible) { // P46 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P46->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46"><?php echo $ivf_stimulation_chart_delete->P46->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P47->Visible) { // P47 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P47->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47"><?php echo $ivf_stimulation_chart_delete->P47->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P48->Visible) { // P48 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P48->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48"><?php echo $ivf_stimulation_chart_delete->P48->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P49->Visible) { // P49 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P49->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49"><?php echo $ivf_stimulation_chart_delete->P49->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P410->Visible) { // P410 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P410->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410"><?php echo $ivf_stimulation_chart_delete->P410->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P411->Visible) { // P411 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P411->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411"><?php echo $ivf_stimulation_chart_delete->P411->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P412->Visible) { // P412 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P412->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412"><?php echo $ivf_stimulation_chart_delete->P412->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P413->Visible) { // P413 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P413->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413"><?php echo $ivf_stimulation_chart_delete->P413->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt1->Visible) { // USGRt1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1"><?php echo $ivf_stimulation_chart_delete->USGRt1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt2->Visible) { // USGRt2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2"><?php echo $ivf_stimulation_chart_delete->USGRt2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt3->Visible) { // USGRt3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3"><?php echo $ivf_stimulation_chart_delete->USGRt3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt4->Visible) { // USGRt4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4"><?php echo $ivf_stimulation_chart_delete->USGRt4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt5->Visible) { // USGRt5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5"><?php echo $ivf_stimulation_chart_delete->USGRt5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt6->Visible) { // USGRt6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6"><?php echo $ivf_stimulation_chart_delete->USGRt6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt7->Visible) { // USGRt7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7"><?php echo $ivf_stimulation_chart_delete->USGRt7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt8->Visible) { // USGRt8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8"><?php echo $ivf_stimulation_chart_delete->USGRt8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt9->Visible) { // USGRt9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9"><?php echo $ivf_stimulation_chart_delete->USGRt9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt10->Visible) { // USGRt10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10"><?php echo $ivf_stimulation_chart_delete->USGRt10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt11->Visible) { // USGRt11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11"><?php echo $ivf_stimulation_chart_delete->USGRt11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt12->Visible) { // USGRt12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12"><?php echo $ivf_stimulation_chart_delete->USGRt12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt13->Visible) { // USGRt13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13"><?php echo $ivf_stimulation_chart_delete->USGRt13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt1->Visible) { // USGLt1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1"><?php echo $ivf_stimulation_chart_delete->USGLt1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt2->Visible) { // USGLt2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2"><?php echo $ivf_stimulation_chart_delete->USGLt2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt3->Visible) { // USGLt3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3"><?php echo $ivf_stimulation_chart_delete->USGLt3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt4->Visible) { // USGLt4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4"><?php echo $ivf_stimulation_chart_delete->USGLt4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt5->Visible) { // USGLt5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5"><?php echo $ivf_stimulation_chart_delete->USGLt5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt6->Visible) { // USGLt6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6"><?php echo $ivf_stimulation_chart_delete->USGLt6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt7->Visible) { // USGLt7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7"><?php echo $ivf_stimulation_chart_delete->USGLt7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt8->Visible) { // USGLt8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8"><?php echo $ivf_stimulation_chart_delete->USGLt8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt9->Visible) { // USGLt9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9"><?php echo $ivf_stimulation_chart_delete->USGLt9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt10->Visible) { // USGLt10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10"><?php echo $ivf_stimulation_chart_delete->USGLt10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt11->Visible) { // USGLt11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11"><?php echo $ivf_stimulation_chart_delete->USGLt11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt12->Visible) { // USGLt12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12"><?php echo $ivf_stimulation_chart_delete->USGLt12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt13->Visible) { // USGLt13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13"><?php echo $ivf_stimulation_chart_delete->USGLt13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM1->Visible) { // EM1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1"><?php echo $ivf_stimulation_chart_delete->EM1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM2->Visible) { // EM2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2"><?php echo $ivf_stimulation_chart_delete->EM2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM3->Visible) { // EM3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3"><?php echo $ivf_stimulation_chart_delete->EM3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM4->Visible) { // EM4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4"><?php echo $ivf_stimulation_chart_delete->EM4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM5->Visible) { // EM5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5"><?php echo $ivf_stimulation_chart_delete->EM5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM6->Visible) { // EM6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6"><?php echo $ivf_stimulation_chart_delete->EM6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM7->Visible) { // EM7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7"><?php echo $ivf_stimulation_chart_delete->EM7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM8->Visible) { // EM8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8"><?php echo $ivf_stimulation_chart_delete->EM8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM9->Visible) { // EM9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9"><?php echo $ivf_stimulation_chart_delete->EM9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM10->Visible) { // EM10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10"><?php echo $ivf_stimulation_chart_delete->EM10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM11->Visible) { // EM11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11"><?php echo $ivf_stimulation_chart_delete->EM11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM12->Visible) { // EM12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12"><?php echo $ivf_stimulation_chart_delete->EM12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM13->Visible) { // EM13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13"><?php echo $ivf_stimulation_chart_delete->EM13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others1->Visible) { // Others1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1"><?php echo $ivf_stimulation_chart_delete->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others2->Visible) { // Others2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2"><?php echo $ivf_stimulation_chart_delete->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others3->Visible) { // Others3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3"><?php echo $ivf_stimulation_chart_delete->Others3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others4->Visible) { // Others4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4"><?php echo $ivf_stimulation_chart_delete->Others4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others5->Visible) { // Others5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5"><?php echo $ivf_stimulation_chart_delete->Others5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others6->Visible) { // Others6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6"><?php echo $ivf_stimulation_chart_delete->Others6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others7->Visible) { // Others7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7"><?php echo $ivf_stimulation_chart_delete->Others7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others8->Visible) { // Others8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8"><?php echo $ivf_stimulation_chart_delete->Others8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others9->Visible) { // Others9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9"><?php echo $ivf_stimulation_chart_delete->Others9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others10->Visible) { // Others10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10"><?php echo $ivf_stimulation_chart_delete->Others10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others11->Visible) { // Others11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11"><?php echo $ivf_stimulation_chart_delete->Others11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others12->Visible) { // Others12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12"><?php echo $ivf_stimulation_chart_delete->Others12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others13->Visible) { // Others13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13"><?php echo $ivf_stimulation_chart_delete->Others13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR1->Visible) { // DR1 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1"><?php echo $ivf_stimulation_chart_delete->DR1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR2->Visible) { // DR2 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2"><?php echo $ivf_stimulation_chart_delete->DR2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR3->Visible) { // DR3 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3"><?php echo $ivf_stimulation_chart_delete->DR3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR4->Visible) { // DR4 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4"><?php echo $ivf_stimulation_chart_delete->DR4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR5->Visible) { // DR5 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5"><?php echo $ivf_stimulation_chart_delete->DR5->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR6->Visible) { // DR6 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6"><?php echo $ivf_stimulation_chart_delete->DR6->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR7->Visible) { // DR7 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7"><?php echo $ivf_stimulation_chart_delete->DR7->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR8->Visible) { // DR8 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8"><?php echo $ivf_stimulation_chart_delete->DR8->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR9->Visible) { // DR9 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9"><?php echo $ivf_stimulation_chart_delete->DR9->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR10->Visible) { // DR10 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10"><?php echo $ivf_stimulation_chart_delete->DR10->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR11->Visible) { // DR11 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11"><?php echo $ivf_stimulation_chart_delete->DR11->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR12->Visible) { // DR12 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12"><?php echo $ivf_stimulation_chart_delete->DR12->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR13->Visible) { // DR13 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13"><?php echo $ivf_stimulation_chart_delete->DR13->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo"><?php echo $ivf_stimulation_chart_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Convert->Visible) { // Convert ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Convert->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert"><?php echo $ivf_stimulation_chart_delete->Convert->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Consultant->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant"><?php echo $ivf_stimulation_chart_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique"><?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART"><?php echo $ivf_stimulation_chart_delete->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy"><?php echo $ivf_stimulation_chart_delete->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching"><?php echo $ivf_stimulation_chart_delete->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation"><?php echo $ivf_stimulation_chart_delete->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE"><?php echo $ivf_stimulation_chart_delete->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE"><?php echo $ivf_stimulation_chart_delete->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage"><?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen"><?php echo $ivf_stimulation_chart_delete->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GCSF->Visible) { // GCSF ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GCSF->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF"><?php echo $ivf_stimulation_chart_delete->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP"><?php echo $ivf_stimulation_chart_delete->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->UCLcm->Visible) { // UCLcm ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->UCLcm->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm"><?php echo $ivf_stimulation_chart_delete->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?php echo $ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS"><?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?php echo $ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaAdmin->Visible) { // ViaAdmin ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ViaAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin"><?php echo $ivf_stimulation_chart_delete->ViaAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ViaStartDateTime->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime"><?php echo $ivf_stimulation_chart_delete->ViaStartDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaDose->Visible) { // ViaDose ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ViaDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose"><?php echo $ivf_stimulation_chart_delete->ViaDose->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AllFreeze->Visible) { // AllFreeze ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->AllFreeze->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze"><?php echo $ivf_stimulation_chart_delete->AllFreeze->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TreatmentCancel->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel"><?php echo $ivf_stimulation_chart_delete->TreatmentCancel->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ProgesteroneAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin"><?php echo $ivf_stimulation_chart_delete->ProgesteroneAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ProgesteroneStart->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart"><?php echo $ivf_stimulation_chart_delete->ProgesteroneStart->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ProgesteroneDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose"><?php echo $ivf_stimulation_chart_delete->ProgesteroneDose->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate14->Visible) { // StChDate14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14"><?php echo $ivf_stimulation_chart_delete->StChDate14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate15->Visible) { // StChDate15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15"><?php echo $ivf_stimulation_chart_delete->StChDate15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate16->Visible) { // StChDate16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16"><?php echo $ivf_stimulation_chart_delete->StChDate16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate17->Visible) { // StChDate17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17"><?php echo $ivf_stimulation_chart_delete->StChDate17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate18->Visible) { // StChDate18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18"><?php echo $ivf_stimulation_chart_delete->StChDate18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate19->Visible) { // StChDate19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19"><?php echo $ivf_stimulation_chart_delete->StChDate19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate20->Visible) { // StChDate20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20"><?php echo $ivf_stimulation_chart_delete->StChDate20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate21->Visible) { // StChDate21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21"><?php echo $ivf_stimulation_chart_delete->StChDate21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate22->Visible) { // StChDate22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22"><?php echo $ivf_stimulation_chart_delete->StChDate22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate23->Visible) { // StChDate23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23"><?php echo $ivf_stimulation_chart_delete->StChDate23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate24->Visible) { // StChDate24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24"><?php echo $ivf_stimulation_chart_delete->StChDate24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate25->Visible) { // StChDate25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StChDate25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25"><?php echo $ivf_stimulation_chart_delete->StChDate25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay14->Visible) { // CycleDay14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14"><?php echo $ivf_stimulation_chart_delete->CycleDay14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay15->Visible) { // CycleDay15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15"><?php echo $ivf_stimulation_chart_delete->CycleDay15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay16->Visible) { // CycleDay16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16"><?php echo $ivf_stimulation_chart_delete->CycleDay16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay17->Visible) { // CycleDay17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17"><?php echo $ivf_stimulation_chart_delete->CycleDay17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay18->Visible) { // CycleDay18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18"><?php echo $ivf_stimulation_chart_delete->CycleDay18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay19->Visible) { // CycleDay19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19"><?php echo $ivf_stimulation_chart_delete->CycleDay19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay20->Visible) { // CycleDay20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20"><?php echo $ivf_stimulation_chart_delete->CycleDay20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay21->Visible) { // CycleDay21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21"><?php echo $ivf_stimulation_chart_delete->CycleDay21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay22->Visible) { // CycleDay22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22"><?php echo $ivf_stimulation_chart_delete->CycleDay22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay23->Visible) { // CycleDay23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23"><?php echo $ivf_stimulation_chart_delete->CycleDay23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay24->Visible) { // CycleDay24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24"><?php echo $ivf_stimulation_chart_delete->CycleDay24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay25->Visible) { // CycleDay25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->CycleDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25"><?php echo $ivf_stimulation_chart_delete->CycleDay25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay14->Visible) { // StimulationDay14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14"><?php echo $ivf_stimulation_chart_delete->StimulationDay14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay15->Visible) { // StimulationDay15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15"><?php echo $ivf_stimulation_chart_delete->StimulationDay15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay16->Visible) { // StimulationDay16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16"><?php echo $ivf_stimulation_chart_delete->StimulationDay16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay17->Visible) { // StimulationDay17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17"><?php echo $ivf_stimulation_chart_delete->StimulationDay17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay18->Visible) { // StimulationDay18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18"><?php echo $ivf_stimulation_chart_delete->StimulationDay18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay19->Visible) { // StimulationDay19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19"><?php echo $ivf_stimulation_chart_delete->StimulationDay19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay20->Visible) { // StimulationDay20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20"><?php echo $ivf_stimulation_chart_delete->StimulationDay20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay21->Visible) { // StimulationDay21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21"><?php echo $ivf_stimulation_chart_delete->StimulationDay21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay22->Visible) { // StimulationDay22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22"><?php echo $ivf_stimulation_chart_delete->StimulationDay22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay23->Visible) { // StimulationDay23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23"><?php echo $ivf_stimulation_chart_delete->StimulationDay23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay24->Visible) { // StimulationDay24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24"><?php echo $ivf_stimulation_chart_delete->StimulationDay24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay25->Visible) { // StimulationDay25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->StimulationDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25"><?php echo $ivf_stimulation_chart_delete->StimulationDay25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet14->Visible) { // Tablet14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14"><?php echo $ivf_stimulation_chart_delete->Tablet14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet15->Visible) { // Tablet15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15"><?php echo $ivf_stimulation_chart_delete->Tablet15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet16->Visible) { // Tablet16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16"><?php echo $ivf_stimulation_chart_delete->Tablet16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet17->Visible) { // Tablet17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17"><?php echo $ivf_stimulation_chart_delete->Tablet17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet18->Visible) { // Tablet18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18"><?php echo $ivf_stimulation_chart_delete->Tablet18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet19->Visible) { // Tablet19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19"><?php echo $ivf_stimulation_chart_delete->Tablet19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet20->Visible) { // Tablet20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20"><?php echo $ivf_stimulation_chart_delete->Tablet20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet21->Visible) { // Tablet21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21"><?php echo $ivf_stimulation_chart_delete->Tablet21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet22->Visible) { // Tablet22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22"><?php echo $ivf_stimulation_chart_delete->Tablet22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet23->Visible) { // Tablet23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23"><?php echo $ivf_stimulation_chart_delete->Tablet23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet24->Visible) { // Tablet24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24"><?php echo $ivf_stimulation_chart_delete->Tablet24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet25->Visible) { // Tablet25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Tablet25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25"><?php echo $ivf_stimulation_chart_delete->Tablet25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH14->Visible) { // RFSH14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14"><?php echo $ivf_stimulation_chart_delete->RFSH14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH15->Visible) { // RFSH15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15"><?php echo $ivf_stimulation_chart_delete->RFSH15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH16->Visible) { // RFSH16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16"><?php echo $ivf_stimulation_chart_delete->RFSH16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH17->Visible) { // RFSH17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17"><?php echo $ivf_stimulation_chart_delete->RFSH17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH18->Visible) { // RFSH18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18"><?php echo $ivf_stimulation_chart_delete->RFSH18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH19->Visible) { // RFSH19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19"><?php echo $ivf_stimulation_chart_delete->RFSH19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH20->Visible) { // RFSH20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20"><?php echo $ivf_stimulation_chart_delete->RFSH20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH21->Visible) { // RFSH21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21"><?php echo $ivf_stimulation_chart_delete->RFSH21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH22->Visible) { // RFSH22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22"><?php echo $ivf_stimulation_chart_delete->RFSH22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH23->Visible) { // RFSH23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23"><?php echo $ivf_stimulation_chart_delete->RFSH23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH24->Visible) { // RFSH24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24"><?php echo $ivf_stimulation_chart_delete->RFSH24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH25->Visible) { // RFSH25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->RFSH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25"><?php echo $ivf_stimulation_chart_delete->RFSH25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG14->Visible) { // HMG14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14"><?php echo $ivf_stimulation_chart_delete->HMG14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG15->Visible) { // HMG15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15"><?php echo $ivf_stimulation_chart_delete->HMG15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG16->Visible) { // HMG16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16"><?php echo $ivf_stimulation_chart_delete->HMG16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG17->Visible) { // HMG17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17"><?php echo $ivf_stimulation_chart_delete->HMG17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG18->Visible) { // HMG18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18"><?php echo $ivf_stimulation_chart_delete->HMG18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG19->Visible) { // HMG19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19"><?php echo $ivf_stimulation_chart_delete->HMG19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG20->Visible) { // HMG20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20"><?php echo $ivf_stimulation_chart_delete->HMG20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG21->Visible) { // HMG21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21"><?php echo $ivf_stimulation_chart_delete->HMG21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG22->Visible) { // HMG22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22"><?php echo $ivf_stimulation_chart_delete->HMG22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG23->Visible) { // HMG23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23"><?php echo $ivf_stimulation_chart_delete->HMG23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG24->Visible) { // HMG24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24"><?php echo $ivf_stimulation_chart_delete->HMG24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG25->Visible) { // HMG25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HMG25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25"><?php echo $ivf_stimulation_chart_delete->HMG25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH14->Visible) { // GnRH14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14"><?php echo $ivf_stimulation_chart_delete->GnRH14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH15->Visible) { // GnRH15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15"><?php echo $ivf_stimulation_chart_delete->GnRH15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH16->Visible) { // GnRH16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16"><?php echo $ivf_stimulation_chart_delete->GnRH16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH17->Visible) { // GnRH17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17"><?php echo $ivf_stimulation_chart_delete->GnRH17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH18->Visible) { // GnRH18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18"><?php echo $ivf_stimulation_chart_delete->GnRH18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH19->Visible) { // GnRH19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19"><?php echo $ivf_stimulation_chart_delete->GnRH19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH20->Visible) { // GnRH20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20"><?php echo $ivf_stimulation_chart_delete->GnRH20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH21->Visible) { // GnRH21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21"><?php echo $ivf_stimulation_chart_delete->GnRH21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH22->Visible) { // GnRH22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22"><?php echo $ivf_stimulation_chart_delete->GnRH22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH23->Visible) { // GnRH23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23"><?php echo $ivf_stimulation_chart_delete->GnRH23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH24->Visible) { // GnRH24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24"><?php echo $ivf_stimulation_chart_delete->GnRH24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH25->Visible) { // GnRH25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->GnRH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25"><?php echo $ivf_stimulation_chart_delete->GnRH25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P414->Visible) { // P414 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P414->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414"><?php echo $ivf_stimulation_chart_delete->P414->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P415->Visible) { // P415 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P415->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415"><?php echo $ivf_stimulation_chart_delete->P415->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P416->Visible) { // P416 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P416->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416"><?php echo $ivf_stimulation_chart_delete->P416->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P417->Visible) { // P417 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P417->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417"><?php echo $ivf_stimulation_chart_delete->P417->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P418->Visible) { // P418 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P418->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418"><?php echo $ivf_stimulation_chart_delete->P418->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P419->Visible) { // P419 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P419->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419"><?php echo $ivf_stimulation_chart_delete->P419->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P420->Visible) { // P420 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P420->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420"><?php echo $ivf_stimulation_chart_delete->P420->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P421->Visible) { // P421 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P421->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421"><?php echo $ivf_stimulation_chart_delete->P421->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P422->Visible) { // P422 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P422->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422"><?php echo $ivf_stimulation_chart_delete->P422->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P423->Visible) { // P423 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P423->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423"><?php echo $ivf_stimulation_chart_delete->P423->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P424->Visible) { // P424 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P424->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424"><?php echo $ivf_stimulation_chart_delete->P424->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P425->Visible) { // P425 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->P425->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425"><?php echo $ivf_stimulation_chart_delete->P425->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt14->Visible) { // USGRt14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14"><?php echo $ivf_stimulation_chart_delete->USGRt14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt15->Visible) { // USGRt15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15"><?php echo $ivf_stimulation_chart_delete->USGRt15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt16->Visible) { // USGRt16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16"><?php echo $ivf_stimulation_chart_delete->USGRt16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt17->Visible) { // USGRt17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17"><?php echo $ivf_stimulation_chart_delete->USGRt17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt18->Visible) { // USGRt18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18"><?php echo $ivf_stimulation_chart_delete->USGRt18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt19->Visible) { // USGRt19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19"><?php echo $ivf_stimulation_chart_delete->USGRt19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt20->Visible) { // USGRt20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20"><?php echo $ivf_stimulation_chart_delete->USGRt20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt21->Visible) { // USGRt21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21"><?php echo $ivf_stimulation_chart_delete->USGRt21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt22->Visible) { // USGRt22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22"><?php echo $ivf_stimulation_chart_delete->USGRt22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt23->Visible) { // USGRt23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23"><?php echo $ivf_stimulation_chart_delete->USGRt23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt24->Visible) { // USGRt24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24"><?php echo $ivf_stimulation_chart_delete->USGRt24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt25->Visible) { // USGRt25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGRt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25"><?php echo $ivf_stimulation_chart_delete->USGRt25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt14->Visible) { // USGLt14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14"><?php echo $ivf_stimulation_chart_delete->USGLt14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt15->Visible) { // USGLt15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15"><?php echo $ivf_stimulation_chart_delete->USGLt15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt16->Visible) { // USGLt16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16"><?php echo $ivf_stimulation_chart_delete->USGLt16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt17->Visible) { // USGLt17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17"><?php echo $ivf_stimulation_chart_delete->USGLt17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt18->Visible) { // USGLt18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18"><?php echo $ivf_stimulation_chart_delete->USGLt18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt19->Visible) { // USGLt19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19"><?php echo $ivf_stimulation_chart_delete->USGLt19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt20->Visible) { // USGLt20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20"><?php echo $ivf_stimulation_chart_delete->USGLt20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt21->Visible) { // USGLt21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21"><?php echo $ivf_stimulation_chart_delete->USGLt21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt22->Visible) { // USGLt22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22"><?php echo $ivf_stimulation_chart_delete->USGLt22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt23->Visible) { // USGLt23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23"><?php echo $ivf_stimulation_chart_delete->USGLt23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt24->Visible) { // USGLt24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24"><?php echo $ivf_stimulation_chart_delete->USGLt24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt25->Visible) { // USGLt25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->USGLt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25"><?php echo $ivf_stimulation_chart_delete->USGLt25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM14->Visible) { // EM14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14"><?php echo $ivf_stimulation_chart_delete->EM14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM15->Visible) { // EM15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15"><?php echo $ivf_stimulation_chart_delete->EM15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM16->Visible) { // EM16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16"><?php echo $ivf_stimulation_chart_delete->EM16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM17->Visible) { // EM17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17"><?php echo $ivf_stimulation_chart_delete->EM17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM18->Visible) { // EM18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18"><?php echo $ivf_stimulation_chart_delete->EM18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM19->Visible) { // EM19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19"><?php echo $ivf_stimulation_chart_delete->EM19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM20->Visible) { // EM20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20"><?php echo $ivf_stimulation_chart_delete->EM20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM21->Visible) { // EM21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21"><?php echo $ivf_stimulation_chart_delete->EM21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM22->Visible) { // EM22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22"><?php echo $ivf_stimulation_chart_delete->EM22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM23->Visible) { // EM23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23"><?php echo $ivf_stimulation_chart_delete->EM23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM24->Visible) { // EM24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24"><?php echo $ivf_stimulation_chart_delete->EM24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM25->Visible) { // EM25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EM25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25"><?php echo $ivf_stimulation_chart_delete->EM25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others14->Visible) { // Others14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14"><?php echo $ivf_stimulation_chart_delete->Others14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others15->Visible) { // Others15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15"><?php echo $ivf_stimulation_chart_delete->Others15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others16->Visible) { // Others16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16"><?php echo $ivf_stimulation_chart_delete->Others16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others17->Visible) { // Others17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17"><?php echo $ivf_stimulation_chart_delete->Others17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others18->Visible) { // Others18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18"><?php echo $ivf_stimulation_chart_delete->Others18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others19->Visible) { // Others19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19"><?php echo $ivf_stimulation_chart_delete->Others19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others20->Visible) { // Others20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20"><?php echo $ivf_stimulation_chart_delete->Others20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others21->Visible) { // Others21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21"><?php echo $ivf_stimulation_chart_delete->Others21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others22->Visible) { // Others22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22"><?php echo $ivf_stimulation_chart_delete->Others22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others23->Visible) { // Others23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23"><?php echo $ivf_stimulation_chart_delete->Others23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others24->Visible) { // Others24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24"><?php echo $ivf_stimulation_chart_delete->Others24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others25->Visible) { // Others25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->Others25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25"><?php echo $ivf_stimulation_chart_delete->Others25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR14->Visible) { // DR14 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14"><?php echo $ivf_stimulation_chart_delete->DR14->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR15->Visible) { // DR15 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15"><?php echo $ivf_stimulation_chart_delete->DR15->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR16->Visible) { // DR16 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16"><?php echo $ivf_stimulation_chart_delete->DR16->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR17->Visible) { // DR17 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17"><?php echo $ivf_stimulation_chart_delete->DR17->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR18->Visible) { // DR18 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18"><?php echo $ivf_stimulation_chart_delete->DR18->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR19->Visible) { // DR19 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19"><?php echo $ivf_stimulation_chart_delete->DR19->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR20->Visible) { // DR20 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20"><?php echo $ivf_stimulation_chart_delete->DR20->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR21->Visible) { // DR21 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21"><?php echo $ivf_stimulation_chart_delete->DR21->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR22->Visible) { // DR22 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22"><?php echo $ivf_stimulation_chart_delete->DR22->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR23->Visible) { // DR23 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23"><?php echo $ivf_stimulation_chart_delete->DR23->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR24->Visible) { // DR24 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24"><?php echo $ivf_stimulation_chart_delete->DR24->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR25->Visible) { // DR25 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DR25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25"><?php echo $ivf_stimulation_chart_delete->DR25->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E214->Visible) { // E214 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E214->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214"><?php echo $ivf_stimulation_chart_delete->E214->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E215->Visible) { // E215 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E215->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215"><?php echo $ivf_stimulation_chart_delete->E215->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E216->Visible) { // E216 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E216->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216"><?php echo $ivf_stimulation_chart_delete->E216->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E217->Visible) { // E217 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E217->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217"><?php echo $ivf_stimulation_chart_delete->E217->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E218->Visible) { // E218 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E218->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218"><?php echo $ivf_stimulation_chart_delete->E218->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E219->Visible) { // E219 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E219->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219"><?php echo $ivf_stimulation_chart_delete->E219->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E220->Visible) { // E220 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E220->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220"><?php echo $ivf_stimulation_chart_delete->E220->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E221->Visible) { // E221 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E221->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221"><?php echo $ivf_stimulation_chart_delete->E221->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E222->Visible) { // E222 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E222->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222"><?php echo $ivf_stimulation_chart_delete->E222->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E223->Visible) { // E223 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E223->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223"><?php echo $ivf_stimulation_chart_delete->E223->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E224->Visible) { // E224 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E224->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224"><?php echo $ivf_stimulation_chart_delete->E224->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E225->Visible) { // E225 ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->E225->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225"><?php echo $ivf_stimulation_chart_delete->E225->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EEETTTDTE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE"><?php echo $ivf_stimulation_chart_delete->EEETTTDTE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->bhcgdate->Visible) { // bhcgdate ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->bhcgdate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate"><?php echo $ivf_stimulation_chart_delete->bhcgdate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY"><?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HSG->Visible) { // HSG ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->HSG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG"><?php echo $ivf_stimulation_chart_delete->HSG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DHL->Visible) { // DHL ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->DHL->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL"><?php echo $ivf_stimulation_chart_delete->DHL->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS"><?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS"><?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS"><?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TABLETS->Visible) { // TABLETS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->TABLETS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS"><?php echo $ivf_stimulation_chart_delete->TABLETS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS"><?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI"><?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->PROCEDURE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE"><?php echo $ivf_stimulation_chart_delete->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT"><?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->ONGOING_PREG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG"><?php echo $ivf_stimulation_chart_delete->ONGOING_PREG->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EDD_Date->Visible) { // EDD_Date ?>
		<th class="<?php echo $ivf_stimulation_chart_delete->EDD_Date->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date"><?php echo $ivf_stimulation_chart_delete->EDD_Date->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_stimulation_chart_delete->RecordCount = 0;
$i = 0;
while (!$ivf_stimulation_chart_delete->Recordset->EOF) {
	$ivf_stimulation_chart_delete->RecordCount++;
	$ivf_stimulation_chart_delete->RowCount++;

	// Set row properties
	$ivf_stimulation_chart->resetAttributes();
	$ivf_stimulation_chart->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_stimulation_chart_delete->loadRowValues($ivf_stimulation_chart_delete->Recordset);

	// Render row
	$ivf_stimulation_chart_delete->renderRow();
?>
	<tr <?php echo $ivf_stimulation_chart->rowAttributes() ?>>
<?php if ($ivf_stimulation_chart_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_stimulation_chart_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart_delete->id->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_stimulation_chart_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_stimulation_chart_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart_delete->Name->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ARTCycle->Visible) { // ARTCycle ?>
		<td <?php echo $ivf_stimulation_chart_delete->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle">
<span<?php echo $ivf_stimulation_chart_delete->ARTCycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FemaleFactor->Visible) { // FemaleFactor ?>
		<td <?php echo $ivf_stimulation_chart_delete->FemaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor">
<span<?php echo $ivf_stimulation_chart_delete->FemaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->FemaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MaleFactor->Visible) { // MaleFactor ?>
		<td <?php echo $ivf_stimulation_chart_delete->MaleFactor->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor">
<span<?php echo $ivf_stimulation_chart_delete->MaleFactor->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->MaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Protocol->Visible) { // Protocol ?>
		<td <?php echo $ivf_stimulation_chart_delete->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol">
<span<?php echo $ivf_stimulation_chart_delete->Protocol->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SemenFrozen->Visible) { // SemenFrozen ?>
		<td <?php echo $ivf_stimulation_chart_delete->SemenFrozen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen">
<span<?php echo $ivf_stimulation_chart_delete->SemenFrozen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SemenFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->A4ICSICycle->Visible) { // A4ICSICycle ?>
		<td <?php echo $ivf_stimulation_chart_delete->A4ICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle">
<span<?php echo $ivf_stimulation_chart_delete->A4ICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TotalICSICycle->Visible) { // TotalICSICycle ?>
		<td <?php echo $ivf_stimulation_chart_delete->TotalICSICycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle">
<span<?php echo $ivf_stimulation_chart_delete->TotalICSICycle->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
		<td <?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility">
<span<?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Duration->Visible) { // Duration ?>
		<td <?php echo $ivf_stimulation_chart_delete->Duration->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration">
<span<?php echo $ivf_stimulation_chart_delete->Duration->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->LMP->Visible) { // LMP ?>
		<td <?php echo $ivf_stimulation_chart_delete->LMP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP">
<span<?php echo $ivf_stimulation_chart_delete->LMP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RelevantHistory->Visible) { // RelevantHistory ?>
		<td <?php echo $ivf_stimulation_chart_delete->RelevantHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory">
<span<?php echo $ivf_stimulation_chart_delete->RelevantHistory->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RelevantHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->IUICycles->Visible) { // IUICycles ?>
		<td <?php echo $ivf_stimulation_chart_delete->IUICycles->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles">
<span<?php echo $ivf_stimulation_chart_delete->IUICycles->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->IUICycles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AFC->Visible) { // AFC ?>
		<td <?php echo $ivf_stimulation_chart_delete->AFC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC">
<span<?php echo $ivf_stimulation_chart_delete->AFC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->AFC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AMH->Visible) { // AMH ?>
		<td <?php echo $ivf_stimulation_chart_delete->AMH->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH">
<span<?php echo $ivf_stimulation_chart_delete->AMH->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->AMH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FBMI->Visible) { // FBMI ?>
		<td <?php echo $ivf_stimulation_chart_delete->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI">
<span<?php echo $ivf_stimulation_chart_delete->FBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MBMI->Visible) { // MBMI ?>
		<td <?php echo $ivf_stimulation_chart_delete->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI">
<span<?php echo $ivf_stimulation_chart_delete->MBMI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
		<td <?php echo $ivf_stimulation_chart_delete->OvarianVolumeRT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT">
<span<?php echo $ivf_stimulation_chart_delete->OvarianVolumeRT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
		<td <?php echo $ivf_stimulation_chart_delete->OvarianVolumeLT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT">
<span<?php echo $ivf_stimulation_chart_delete->OvarianVolumeLT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
		<td <?php echo $ivf_stimulation_chart_delete->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?php echo $ivf_stimulation_chart_delete->DAYSOFSTIMULATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
		<td <?php echo $ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?php echo $ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->INJTYPE->Visible) { // INJTYPE ?>
		<td <?php echo $ivf_stimulation_chart_delete->INJTYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE">
<span<?php echo $ivf_stimulation_chart_delete->INJTYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->INJTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
		<td <?php echo $ivf_stimulation_chart_delete->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?php echo $ivf_stimulation_chart_delete->ANTAGONISTDAYS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
		<td <?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
		<td <?php echo $ivf_stimulation_chart_delete->GROWTHHORMONE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE">
<span<?php echo $ivf_stimulation_chart_delete->GROWTHHORMONE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PRETREATMENT->Visible) { // PRETREATMENT ?>
		<td <?php echo $ivf_stimulation_chart_delete->PRETREATMENT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT">
<span<?php echo $ivf_stimulation_chart_delete->PRETREATMENT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SerumP4->Visible) { // SerumP4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4">
<span<?php echo $ivf_stimulation_chart_delete->SerumP4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FORT->Visible) { // FORT ?>
		<td <?php echo $ivf_stimulation_chart_delete->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT">
<span<?php echo $ivf_stimulation_chart_delete->FORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->MedicalFactors->Visible) { // MedicalFactors ?>
		<td <?php echo $ivf_stimulation_chart_delete->MedicalFactors->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors">
<span<?php echo $ivf_stimulation_chart_delete->MedicalFactors->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->MedicalFactors->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SCDate->Visible) { // SCDate ?>
		<td <?php echo $ivf_stimulation_chart_delete->SCDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate">
<span<?php echo $ivf_stimulation_chart_delete->SCDate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SCDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OvarianSurgery->Visible) { // OvarianSurgery ?>
		<td <?php echo $ivf_stimulation_chart_delete->OvarianSurgery->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery">
<span<?php echo $ivf_stimulation_chart_delete->OvarianSurgery->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
		<td <?php echo $ivf_stimulation_chart_delete->PreProcedureOrder->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder">
<span<?php echo $ivf_stimulation_chart_delete->PreProcedureOrder->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TRIGGERR->Visible) { // TRIGGERR ?>
		<td <?php echo $ivf_stimulation_chart_delete->TRIGGERR->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR">
<span<?php echo $ivf_stimulation_chart_delete->TRIGGERR->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TRIGGERR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
		<td <?php echo $ivf_stimulation_chart_delete->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE">
<span<?php echo $ivf_stimulation_chart_delete->TRIGGERDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
		<td <?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OPUDATE->Visible) { // OPUDATE ?>
		<td <?php echo $ivf_stimulation_chart_delete->OPUDATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE">
<span<?php echo $ivf_stimulation_chart_delete->OPUDATE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->OPUDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
		<td <?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ERA->Visible) { // ERA ?>
		<td <?php echo $ivf_stimulation_chart_delete->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA">
<span<?php echo $ivf_stimulation_chart_delete->ERA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PGTA->Visible) { // PGTA ?>
		<td <?php echo $ivf_stimulation_chart_delete->PGTA->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA">
<span<?php echo $ivf_stimulation_chart_delete->PGTA->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->PGTA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PGD->Visible) { // PGD ?>
		<td <?php echo $ivf_stimulation_chart_delete->PGD->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD">
<span<?php echo $ivf_stimulation_chart_delete->PGD->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->PGD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DATEOFET->Visible) { // DATEOFET ?>
		<td <?php echo $ivf_stimulation_chart_delete->DATEOFET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET">
<span<?php echo $ivf_stimulation_chart_delete->DATEOFET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DATEOFET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ET->Visible) { // ET ?>
		<td <?php echo $ivf_stimulation_chart_delete->ET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET">
<span<?php echo $ivf_stimulation_chart_delete->ET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ESET->Visible) { // ESET ?>
		<td <?php echo $ivf_stimulation_chart_delete->ESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET">
<span<?php echo $ivf_stimulation_chart_delete->ESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DOET->Visible) { // DOET ?>
		<td <?php echo $ivf_stimulation_chart_delete->DOET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET">
<span<?php echo $ivf_stimulation_chart_delete->DOET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DOET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
		<td <?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION">
<span<?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->REASONFORESET->Visible) { // REASONFORESET ?>
		<td <?php echo $ivf_stimulation_chart_delete->REASONFORESET->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET">
<span<?php echo $ivf_stimulation_chart_delete->REASONFORESET->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->REASONFORESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Expectedoocytes->Visible) { // Expectedoocytes ?>
		<td <?php echo $ivf_stimulation_chart_delete->Expectedoocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes">
<span<?php echo $ivf_stimulation_chart_delete->Expectedoocytes->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate1->Visible) { // StChDate1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1">
<span<?php echo $ivf_stimulation_chart_delete->StChDate1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate2->Visible) { // StChDate2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2">
<span<?php echo $ivf_stimulation_chart_delete->StChDate2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate3->Visible) { // StChDate3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3">
<span<?php echo $ivf_stimulation_chart_delete->StChDate3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate4->Visible) { // StChDate4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4">
<span<?php echo $ivf_stimulation_chart_delete->StChDate4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate5->Visible) { // StChDate5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5">
<span<?php echo $ivf_stimulation_chart_delete->StChDate5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate6->Visible) { // StChDate6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6">
<span<?php echo $ivf_stimulation_chart_delete->StChDate6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate7->Visible) { // StChDate7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7">
<span<?php echo $ivf_stimulation_chart_delete->StChDate7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate8->Visible) { // StChDate8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8">
<span<?php echo $ivf_stimulation_chart_delete->StChDate8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate9->Visible) { // StChDate9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9">
<span<?php echo $ivf_stimulation_chart_delete->StChDate9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate10->Visible) { // StChDate10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10">
<span<?php echo $ivf_stimulation_chart_delete->StChDate10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate11->Visible) { // StChDate11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11">
<span<?php echo $ivf_stimulation_chart_delete->StChDate11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate12->Visible) { // StChDate12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12">
<span<?php echo $ivf_stimulation_chart_delete->StChDate12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate13->Visible) { // StChDate13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13">
<span<?php echo $ivf_stimulation_chart_delete->StChDate13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay1->Visible) { // CycleDay1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay2->Visible) { // CycleDay2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay3->Visible) { // CycleDay3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay4->Visible) { // CycleDay4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay5->Visible) { // CycleDay5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay6->Visible) { // CycleDay6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay7->Visible) { // CycleDay7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay8->Visible) { // CycleDay8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay9->Visible) { // CycleDay9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay10->Visible) { // CycleDay10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay11->Visible) { // CycleDay11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay12->Visible) { // CycleDay12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay13->Visible) { // CycleDay13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay1->Visible) { // StimulationDay1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay2->Visible) { // StimulationDay2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay3->Visible) { // StimulationDay3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay4->Visible) { // StimulationDay4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay5->Visible) { // StimulationDay5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay6->Visible) { // StimulationDay6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay7->Visible) { // StimulationDay7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay8->Visible) { // StimulationDay8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay9->Visible) { // StimulationDay9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay10->Visible) { // StimulationDay10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay11->Visible) { // StimulationDay11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay12->Visible) { // StimulationDay12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay13->Visible) { // StimulationDay13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet1->Visible) { // Tablet1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1">
<span<?php echo $ivf_stimulation_chart_delete->Tablet1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet2->Visible) { // Tablet2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2">
<span<?php echo $ivf_stimulation_chart_delete->Tablet2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet3->Visible) { // Tablet3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3">
<span<?php echo $ivf_stimulation_chart_delete->Tablet3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet4->Visible) { // Tablet4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4">
<span<?php echo $ivf_stimulation_chart_delete->Tablet4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet5->Visible) { // Tablet5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5">
<span<?php echo $ivf_stimulation_chart_delete->Tablet5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet6->Visible) { // Tablet6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6">
<span<?php echo $ivf_stimulation_chart_delete->Tablet6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet7->Visible) { // Tablet7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7">
<span<?php echo $ivf_stimulation_chart_delete->Tablet7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet8->Visible) { // Tablet8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8">
<span<?php echo $ivf_stimulation_chart_delete->Tablet8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet9->Visible) { // Tablet9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9">
<span<?php echo $ivf_stimulation_chart_delete->Tablet9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet10->Visible) { // Tablet10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10">
<span<?php echo $ivf_stimulation_chart_delete->Tablet10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet11->Visible) { // Tablet11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11">
<span<?php echo $ivf_stimulation_chart_delete->Tablet11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet12->Visible) { // Tablet12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12">
<span<?php echo $ivf_stimulation_chart_delete->Tablet12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet13->Visible) { // Tablet13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13">
<span<?php echo $ivf_stimulation_chart_delete->Tablet13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH1->Visible) { // RFSH1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1">
<span<?php echo $ivf_stimulation_chart_delete->RFSH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH2->Visible) { // RFSH2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2">
<span<?php echo $ivf_stimulation_chart_delete->RFSH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH3->Visible) { // RFSH3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3">
<span<?php echo $ivf_stimulation_chart_delete->RFSH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH4->Visible) { // RFSH4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4">
<span<?php echo $ivf_stimulation_chart_delete->RFSH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH5->Visible) { // RFSH5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5">
<span<?php echo $ivf_stimulation_chart_delete->RFSH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH6->Visible) { // RFSH6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6">
<span<?php echo $ivf_stimulation_chart_delete->RFSH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH7->Visible) { // RFSH7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7">
<span<?php echo $ivf_stimulation_chart_delete->RFSH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH8->Visible) { // RFSH8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8">
<span<?php echo $ivf_stimulation_chart_delete->RFSH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH9->Visible) { // RFSH9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9">
<span<?php echo $ivf_stimulation_chart_delete->RFSH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH10->Visible) { // RFSH10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10">
<span<?php echo $ivf_stimulation_chart_delete->RFSH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH11->Visible) { // RFSH11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11">
<span<?php echo $ivf_stimulation_chart_delete->RFSH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH12->Visible) { // RFSH12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12">
<span<?php echo $ivf_stimulation_chart_delete->RFSH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH13->Visible) { // RFSH13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13">
<span<?php echo $ivf_stimulation_chart_delete->RFSH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG1->Visible) { // HMG1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1">
<span<?php echo $ivf_stimulation_chart_delete->HMG1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG2->Visible) { // HMG2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2">
<span<?php echo $ivf_stimulation_chart_delete->HMG2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG3->Visible) { // HMG3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3">
<span<?php echo $ivf_stimulation_chart_delete->HMG3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG4->Visible) { // HMG4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4">
<span<?php echo $ivf_stimulation_chart_delete->HMG4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG5->Visible) { // HMG5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5">
<span<?php echo $ivf_stimulation_chart_delete->HMG5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG6->Visible) { // HMG6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6">
<span<?php echo $ivf_stimulation_chart_delete->HMG6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG7->Visible) { // HMG7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7">
<span<?php echo $ivf_stimulation_chart_delete->HMG7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG8->Visible) { // HMG8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8">
<span<?php echo $ivf_stimulation_chart_delete->HMG8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG9->Visible) { // HMG9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9">
<span<?php echo $ivf_stimulation_chart_delete->HMG9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG10->Visible) { // HMG10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10">
<span<?php echo $ivf_stimulation_chart_delete->HMG10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG11->Visible) { // HMG11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11">
<span<?php echo $ivf_stimulation_chart_delete->HMG11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG12->Visible) { // HMG12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12">
<span<?php echo $ivf_stimulation_chart_delete->HMG12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG13->Visible) { // HMG13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13">
<span<?php echo $ivf_stimulation_chart_delete->HMG13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH1->Visible) { // GnRH1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1">
<span<?php echo $ivf_stimulation_chart_delete->GnRH1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH2->Visible) { // GnRH2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2">
<span<?php echo $ivf_stimulation_chart_delete->GnRH2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH3->Visible) { // GnRH3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3">
<span<?php echo $ivf_stimulation_chart_delete->GnRH3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH4->Visible) { // GnRH4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4">
<span<?php echo $ivf_stimulation_chart_delete->GnRH4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH5->Visible) { // GnRH5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5">
<span<?php echo $ivf_stimulation_chart_delete->GnRH5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH6->Visible) { // GnRH6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6">
<span<?php echo $ivf_stimulation_chart_delete->GnRH6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH7->Visible) { // GnRH7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7">
<span<?php echo $ivf_stimulation_chart_delete->GnRH7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH8->Visible) { // GnRH8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8">
<span<?php echo $ivf_stimulation_chart_delete->GnRH8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH9->Visible) { // GnRH9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9">
<span<?php echo $ivf_stimulation_chart_delete->GnRH9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH10->Visible) { // GnRH10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10">
<span<?php echo $ivf_stimulation_chart_delete->GnRH10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH11->Visible) { // GnRH11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11">
<span<?php echo $ivf_stimulation_chart_delete->GnRH11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH12->Visible) { // GnRH12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12">
<span<?php echo $ivf_stimulation_chart_delete->GnRH12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH13->Visible) { // GnRH13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13">
<span<?php echo $ivf_stimulation_chart_delete->GnRH13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E21->Visible) { // E21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21">
<span<?php echo $ivf_stimulation_chart_delete->E21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E22->Visible) { // E22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22">
<span<?php echo $ivf_stimulation_chart_delete->E22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E23->Visible) { // E23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23">
<span<?php echo $ivf_stimulation_chart_delete->E23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E24->Visible) { // E24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24">
<span<?php echo $ivf_stimulation_chart_delete->E24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E25->Visible) { // E25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25">
<span<?php echo $ivf_stimulation_chart_delete->E25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E26->Visible) { // E26 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E26->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26">
<span<?php echo $ivf_stimulation_chart_delete->E26->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E26->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E27->Visible) { // E27 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E27->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27">
<span<?php echo $ivf_stimulation_chart_delete->E27->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E27->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E28->Visible) { // E28 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E28->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28">
<span<?php echo $ivf_stimulation_chart_delete->E28->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E28->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E29->Visible) { // E29 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E29->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29">
<span<?php echo $ivf_stimulation_chart_delete->E29->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E29->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E210->Visible) { // E210 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E210->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210">
<span<?php echo $ivf_stimulation_chart_delete->E210->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E210->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E211->Visible) { // E211 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E211->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211">
<span<?php echo $ivf_stimulation_chart_delete->E211->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E211->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E212->Visible) { // E212 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E212->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212">
<span<?php echo $ivf_stimulation_chart_delete->E212->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E212->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E213->Visible) { // E213 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E213->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213">
<span<?php echo $ivf_stimulation_chart_delete->E213->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E213->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P41->Visible) { // P41 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P41->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41">
<span<?php echo $ivf_stimulation_chart_delete->P41->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P41->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P42->Visible) { // P42 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P42->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42">
<span<?php echo $ivf_stimulation_chart_delete->P42->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P42->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P43->Visible) { // P43 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P43->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43">
<span<?php echo $ivf_stimulation_chart_delete->P43->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P43->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P44->Visible) { // P44 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P44->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44">
<span<?php echo $ivf_stimulation_chart_delete->P44->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P44->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P45->Visible) { // P45 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P45->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45">
<span<?php echo $ivf_stimulation_chart_delete->P45->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P45->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P46->Visible) { // P46 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P46->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46">
<span<?php echo $ivf_stimulation_chart_delete->P46->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P46->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P47->Visible) { // P47 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P47->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47">
<span<?php echo $ivf_stimulation_chart_delete->P47->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P47->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P48->Visible) { // P48 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P48->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48">
<span<?php echo $ivf_stimulation_chart_delete->P48->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P48->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P49->Visible) { // P49 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P49->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49">
<span<?php echo $ivf_stimulation_chart_delete->P49->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P49->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P410->Visible) { // P410 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P410->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410">
<span<?php echo $ivf_stimulation_chart_delete->P410->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P410->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P411->Visible) { // P411 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P411->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411">
<span<?php echo $ivf_stimulation_chart_delete->P411->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P411->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P412->Visible) { // P412 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P412->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412">
<span<?php echo $ivf_stimulation_chart_delete->P412->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P412->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P413->Visible) { // P413 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P413->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413">
<span<?php echo $ivf_stimulation_chart_delete->P413->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P413->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt1->Visible) { // USGRt1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1">
<span<?php echo $ivf_stimulation_chart_delete->USGRt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt2->Visible) { // USGRt2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2">
<span<?php echo $ivf_stimulation_chart_delete->USGRt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt3->Visible) { // USGRt3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3">
<span<?php echo $ivf_stimulation_chart_delete->USGRt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt4->Visible) { // USGRt4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4">
<span<?php echo $ivf_stimulation_chart_delete->USGRt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt5->Visible) { // USGRt5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5">
<span<?php echo $ivf_stimulation_chart_delete->USGRt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt6->Visible) { // USGRt6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6">
<span<?php echo $ivf_stimulation_chart_delete->USGRt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt7->Visible) { // USGRt7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7">
<span<?php echo $ivf_stimulation_chart_delete->USGRt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt8->Visible) { // USGRt8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8">
<span<?php echo $ivf_stimulation_chart_delete->USGRt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt9->Visible) { // USGRt9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9">
<span<?php echo $ivf_stimulation_chart_delete->USGRt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt10->Visible) { // USGRt10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10">
<span<?php echo $ivf_stimulation_chart_delete->USGRt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt11->Visible) { // USGRt11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11">
<span<?php echo $ivf_stimulation_chart_delete->USGRt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt12->Visible) { // USGRt12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12">
<span<?php echo $ivf_stimulation_chart_delete->USGRt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt13->Visible) { // USGRt13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13">
<span<?php echo $ivf_stimulation_chart_delete->USGRt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt1->Visible) { // USGLt1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1">
<span<?php echo $ivf_stimulation_chart_delete->USGLt1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt2->Visible) { // USGLt2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2">
<span<?php echo $ivf_stimulation_chart_delete->USGLt2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt3->Visible) { // USGLt3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3">
<span<?php echo $ivf_stimulation_chart_delete->USGLt3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt4->Visible) { // USGLt4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4">
<span<?php echo $ivf_stimulation_chart_delete->USGLt4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt5->Visible) { // USGLt5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5">
<span<?php echo $ivf_stimulation_chart_delete->USGLt5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt6->Visible) { // USGLt6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6">
<span<?php echo $ivf_stimulation_chart_delete->USGLt6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt7->Visible) { // USGLt7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7">
<span<?php echo $ivf_stimulation_chart_delete->USGLt7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt8->Visible) { // USGLt8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8">
<span<?php echo $ivf_stimulation_chart_delete->USGLt8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt9->Visible) { // USGLt9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9">
<span<?php echo $ivf_stimulation_chart_delete->USGLt9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt10->Visible) { // USGLt10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10">
<span<?php echo $ivf_stimulation_chart_delete->USGLt10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt11->Visible) { // USGLt11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11">
<span<?php echo $ivf_stimulation_chart_delete->USGLt11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt12->Visible) { // USGLt12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12">
<span<?php echo $ivf_stimulation_chart_delete->USGLt12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt13->Visible) { // USGLt13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13">
<span<?php echo $ivf_stimulation_chart_delete->USGLt13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM1->Visible) { // EM1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1">
<span<?php echo $ivf_stimulation_chart_delete->EM1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM2->Visible) { // EM2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2">
<span<?php echo $ivf_stimulation_chart_delete->EM2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM3->Visible) { // EM3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3">
<span<?php echo $ivf_stimulation_chart_delete->EM3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM4->Visible) { // EM4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4">
<span<?php echo $ivf_stimulation_chart_delete->EM4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM5->Visible) { // EM5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5">
<span<?php echo $ivf_stimulation_chart_delete->EM5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM6->Visible) { // EM6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6">
<span<?php echo $ivf_stimulation_chart_delete->EM6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM7->Visible) { // EM7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7">
<span<?php echo $ivf_stimulation_chart_delete->EM7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM8->Visible) { // EM8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8">
<span<?php echo $ivf_stimulation_chart_delete->EM8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM9->Visible) { // EM9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9">
<span<?php echo $ivf_stimulation_chart_delete->EM9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM10->Visible) { // EM10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10">
<span<?php echo $ivf_stimulation_chart_delete->EM10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM11->Visible) { // EM11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11">
<span<?php echo $ivf_stimulation_chart_delete->EM11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM12->Visible) { // EM12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12">
<span<?php echo $ivf_stimulation_chart_delete->EM12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM13->Visible) { // EM13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13">
<span<?php echo $ivf_stimulation_chart_delete->EM13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others1->Visible) { // Others1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1">
<span<?php echo $ivf_stimulation_chart_delete->Others1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others2->Visible) { // Others2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2">
<span<?php echo $ivf_stimulation_chart_delete->Others2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others3->Visible) { // Others3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3">
<span<?php echo $ivf_stimulation_chart_delete->Others3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others4->Visible) { // Others4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4">
<span<?php echo $ivf_stimulation_chart_delete->Others4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others5->Visible) { // Others5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5">
<span<?php echo $ivf_stimulation_chart_delete->Others5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others6->Visible) { // Others6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6">
<span<?php echo $ivf_stimulation_chart_delete->Others6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others7->Visible) { // Others7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7">
<span<?php echo $ivf_stimulation_chart_delete->Others7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others8->Visible) { // Others8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8">
<span<?php echo $ivf_stimulation_chart_delete->Others8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others9->Visible) { // Others9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9">
<span<?php echo $ivf_stimulation_chart_delete->Others9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others10->Visible) { // Others10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10">
<span<?php echo $ivf_stimulation_chart_delete->Others10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others11->Visible) { // Others11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11">
<span<?php echo $ivf_stimulation_chart_delete->Others11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others12->Visible) { // Others12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12">
<span<?php echo $ivf_stimulation_chart_delete->Others12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others13->Visible) { // Others13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13">
<span<?php echo $ivf_stimulation_chart_delete->Others13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR1->Visible) { // DR1 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR1->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1">
<span<?php echo $ivf_stimulation_chart_delete->DR1->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR2->Visible) { // DR2 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR2->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2">
<span<?php echo $ivf_stimulation_chart_delete->DR2->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR3->Visible) { // DR3 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR3->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3">
<span<?php echo $ivf_stimulation_chart_delete->DR3->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR4->Visible) { // DR4 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR4->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4">
<span<?php echo $ivf_stimulation_chart_delete->DR4->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR5->Visible) { // DR5 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR5->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5">
<span<?php echo $ivf_stimulation_chart_delete->DR5->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR6->Visible) { // DR6 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR6->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6">
<span<?php echo $ivf_stimulation_chart_delete->DR6->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR7->Visible) { // DR7 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR7->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7">
<span<?php echo $ivf_stimulation_chart_delete->DR7->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR8->Visible) { // DR8 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR8->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8">
<span<?php echo $ivf_stimulation_chart_delete->DR8->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR9->Visible) { // DR9 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR9->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9">
<span<?php echo $ivf_stimulation_chart_delete->DR9->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR10->Visible) { // DR10 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR10->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10">
<span<?php echo $ivf_stimulation_chart_delete->DR10->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR11->Visible) { // DR11 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR11->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11">
<span<?php echo $ivf_stimulation_chart_delete->DR11->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR12->Visible) { // DR12 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR12->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12">
<span<?php echo $ivf_stimulation_chart_delete->DR12->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR13->Visible) { // DR13 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR13->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13">
<span<?php echo $ivf_stimulation_chart_delete->DR13->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_stimulation_chart_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart_delete->TidNo->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Convert->Visible) { // Convert ?>
		<td <?php echo $ivf_stimulation_chart_delete->Convert->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert">
<span<?php echo $ivf_stimulation_chart_delete->Convert->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Convert->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $ivf_stimulation_chart_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant">
<span<?php echo $ivf_stimulation_chart_delete->Consultant->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td <?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique">
<span<?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->IndicationForART->Visible) { // IndicationForART ?>
		<td <?php echo $ivf_stimulation_chart_delete->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART">
<span<?php echo $ivf_stimulation_chart_delete->IndicationForART->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td <?php echo $ivf_stimulation_chart_delete->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy">
<span<?php echo $ivf_stimulation_chart_delete->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td <?php echo $ivf_stimulation_chart_delete->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching">
<span<?php echo $ivf_stimulation_chart_delete->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TrialCannulation->Visible) { // TrialCannulation ?>
		<td <?php echo $ivf_stimulation_chart_delete->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation">
<span<?php echo $ivf_stimulation_chart_delete->TrialCannulation->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td <?php echo $ivf_stimulation_chart_delete->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE">
<span<?php echo $ivf_stimulation_chart_delete->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td <?php echo $ivf_stimulation_chart_delete->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE">
<span<?php echo $ivf_stimulation_chart_delete->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td <?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage">
<span<?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td <?php echo $ivf_stimulation_chart_delete->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen">
<span<?php echo $ivf_stimulation_chart_delete->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GCSF->Visible) { // GCSF ?>
		<td <?php echo $ivf_stimulation_chart_delete->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF">
<span<?php echo $ivf_stimulation_chart_delete->GCSF->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td <?php echo $ivf_stimulation_chart_delete->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP">
<span<?php echo $ivf_stimulation_chart_delete->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->UCLcm->Visible) { // UCLcm ?>
		<td <?php echo $ivf_stimulation_chart_delete->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm">
<span<?php echo $ivf_stimulation_chart_delete->UCLcm->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
		<td <?php echo $ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td <?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td <?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td <?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td <?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td <?php echo $ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaAdmin->Visible) { // ViaAdmin ?>
		<td <?php echo $ivf_stimulation_chart_delete->ViaAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin">
<span<?php echo $ivf_stimulation_chart_delete->ViaAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ViaAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
		<td <?php echo $ivf_stimulation_chart_delete->ViaStartDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime">
<span<?php echo $ivf_stimulation_chart_delete->ViaStartDateTime->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ViaDose->Visible) { // ViaDose ?>
		<td <?php echo $ivf_stimulation_chart_delete->ViaDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose">
<span<?php echo $ivf_stimulation_chart_delete->ViaDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ViaDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->AllFreeze->Visible) { // AllFreeze ?>
		<td <?php echo $ivf_stimulation_chart_delete->AllFreeze->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze">
<span<?php echo $ivf_stimulation_chart_delete->AllFreeze->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->AllFreeze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TreatmentCancel->Visible) { // TreatmentCancel ?>
		<td <?php echo $ivf_stimulation_chart_delete->TreatmentCancel->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel">
<span<?php echo $ivf_stimulation_chart_delete->TreatmentCancel->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
		<td <?php echo $ivf_stimulation_chart_delete->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin">
<span<?php echo $ivf_stimulation_chart_delete->ProgesteroneAdmin->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
		<td <?php echo $ivf_stimulation_chart_delete->ProgesteroneStart->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart">
<span<?php echo $ivf_stimulation_chart_delete->ProgesteroneStart->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
		<td <?php echo $ivf_stimulation_chart_delete->ProgesteroneDose->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose">
<span<?php echo $ivf_stimulation_chart_delete->ProgesteroneDose->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate14->Visible) { // StChDate14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14">
<span<?php echo $ivf_stimulation_chart_delete->StChDate14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate15->Visible) { // StChDate15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15">
<span<?php echo $ivf_stimulation_chart_delete->StChDate15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate16->Visible) { // StChDate16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16">
<span<?php echo $ivf_stimulation_chart_delete->StChDate16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate17->Visible) { // StChDate17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17">
<span<?php echo $ivf_stimulation_chart_delete->StChDate17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate18->Visible) { // StChDate18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18">
<span<?php echo $ivf_stimulation_chart_delete->StChDate18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate19->Visible) { // StChDate19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19">
<span<?php echo $ivf_stimulation_chart_delete->StChDate19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate20->Visible) { // StChDate20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20">
<span<?php echo $ivf_stimulation_chart_delete->StChDate20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate21->Visible) { // StChDate21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21">
<span<?php echo $ivf_stimulation_chart_delete->StChDate21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate22->Visible) { // StChDate22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22">
<span<?php echo $ivf_stimulation_chart_delete->StChDate22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate23->Visible) { // StChDate23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23">
<span<?php echo $ivf_stimulation_chart_delete->StChDate23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate24->Visible) { // StChDate24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24">
<span<?php echo $ivf_stimulation_chart_delete->StChDate24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StChDate25->Visible) { // StChDate25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StChDate25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25">
<span<?php echo $ivf_stimulation_chart_delete->StChDate25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StChDate25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay14->Visible) { // CycleDay14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay15->Visible) { // CycleDay15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay16->Visible) { // CycleDay16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay17->Visible) { // CycleDay17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay18->Visible) { // CycleDay18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay19->Visible) { // CycleDay19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay20->Visible) { // CycleDay20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay21->Visible) { // CycleDay21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay22->Visible) { // CycleDay22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay23->Visible) { // CycleDay23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay24->Visible) { // CycleDay24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->CycleDay25->Visible) { // CycleDay25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->CycleDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25">
<span<?php echo $ivf_stimulation_chart_delete->CycleDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->CycleDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay14->Visible) { // StimulationDay14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay15->Visible) { // StimulationDay15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay16->Visible) { // StimulationDay16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay17->Visible) { // StimulationDay17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay18->Visible) { // StimulationDay18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay19->Visible) { // StimulationDay19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay20->Visible) { // StimulationDay20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay21->Visible) { // StimulationDay21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay22->Visible) { // StimulationDay22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay23->Visible) { // StimulationDay23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay24->Visible) { // StimulationDay24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->StimulationDay25->Visible) { // StimulationDay25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->StimulationDay25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25">
<span<?php echo $ivf_stimulation_chart_delete->StimulationDay25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->StimulationDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet14->Visible) { // Tablet14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14">
<span<?php echo $ivf_stimulation_chart_delete->Tablet14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet15->Visible) { // Tablet15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15">
<span<?php echo $ivf_stimulation_chart_delete->Tablet15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet16->Visible) { // Tablet16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16">
<span<?php echo $ivf_stimulation_chart_delete->Tablet16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet17->Visible) { // Tablet17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17">
<span<?php echo $ivf_stimulation_chart_delete->Tablet17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet18->Visible) { // Tablet18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18">
<span<?php echo $ivf_stimulation_chart_delete->Tablet18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet19->Visible) { // Tablet19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19">
<span<?php echo $ivf_stimulation_chart_delete->Tablet19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet20->Visible) { // Tablet20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20">
<span<?php echo $ivf_stimulation_chart_delete->Tablet20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet21->Visible) { // Tablet21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21">
<span<?php echo $ivf_stimulation_chart_delete->Tablet21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet22->Visible) { // Tablet22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22">
<span<?php echo $ivf_stimulation_chart_delete->Tablet22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet23->Visible) { // Tablet23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23">
<span<?php echo $ivf_stimulation_chart_delete->Tablet23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet24->Visible) { // Tablet24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24">
<span<?php echo $ivf_stimulation_chart_delete->Tablet24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Tablet25->Visible) { // Tablet25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Tablet25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25">
<span<?php echo $ivf_stimulation_chart_delete->Tablet25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Tablet25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH14->Visible) { // RFSH14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14">
<span<?php echo $ivf_stimulation_chart_delete->RFSH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH15->Visible) { // RFSH15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15">
<span<?php echo $ivf_stimulation_chart_delete->RFSH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH16->Visible) { // RFSH16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16">
<span<?php echo $ivf_stimulation_chart_delete->RFSH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH17->Visible) { // RFSH17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17">
<span<?php echo $ivf_stimulation_chart_delete->RFSH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH18->Visible) { // RFSH18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18">
<span<?php echo $ivf_stimulation_chart_delete->RFSH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH19->Visible) { // RFSH19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19">
<span<?php echo $ivf_stimulation_chart_delete->RFSH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH20->Visible) { // RFSH20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20">
<span<?php echo $ivf_stimulation_chart_delete->RFSH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH21->Visible) { // RFSH21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21">
<span<?php echo $ivf_stimulation_chart_delete->RFSH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH22->Visible) { // RFSH22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22">
<span<?php echo $ivf_stimulation_chart_delete->RFSH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH23->Visible) { // RFSH23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23">
<span<?php echo $ivf_stimulation_chart_delete->RFSH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH24->Visible) { // RFSH24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24">
<span<?php echo $ivf_stimulation_chart_delete->RFSH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->RFSH25->Visible) { // RFSH25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->RFSH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25">
<span<?php echo $ivf_stimulation_chart_delete->RFSH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->RFSH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG14->Visible) { // HMG14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14">
<span<?php echo $ivf_stimulation_chart_delete->HMG14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG15->Visible) { // HMG15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15">
<span<?php echo $ivf_stimulation_chart_delete->HMG15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG16->Visible) { // HMG16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16">
<span<?php echo $ivf_stimulation_chart_delete->HMG16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG17->Visible) { // HMG17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17">
<span<?php echo $ivf_stimulation_chart_delete->HMG17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG18->Visible) { // HMG18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18">
<span<?php echo $ivf_stimulation_chart_delete->HMG18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG19->Visible) { // HMG19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19">
<span<?php echo $ivf_stimulation_chart_delete->HMG19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG20->Visible) { // HMG20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20">
<span<?php echo $ivf_stimulation_chart_delete->HMG20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG21->Visible) { // HMG21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21">
<span<?php echo $ivf_stimulation_chart_delete->HMG21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG22->Visible) { // HMG22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22">
<span<?php echo $ivf_stimulation_chart_delete->HMG22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG23->Visible) { // HMG23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23">
<span<?php echo $ivf_stimulation_chart_delete->HMG23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG24->Visible) { // HMG24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24">
<span<?php echo $ivf_stimulation_chart_delete->HMG24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HMG25->Visible) { // HMG25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->HMG25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25">
<span<?php echo $ivf_stimulation_chart_delete->HMG25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HMG25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH14->Visible) { // GnRH14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14">
<span<?php echo $ivf_stimulation_chart_delete->GnRH14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH15->Visible) { // GnRH15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15">
<span<?php echo $ivf_stimulation_chart_delete->GnRH15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH16->Visible) { // GnRH16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16">
<span<?php echo $ivf_stimulation_chart_delete->GnRH16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH17->Visible) { // GnRH17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17">
<span<?php echo $ivf_stimulation_chart_delete->GnRH17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH18->Visible) { // GnRH18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18">
<span<?php echo $ivf_stimulation_chart_delete->GnRH18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH19->Visible) { // GnRH19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19">
<span<?php echo $ivf_stimulation_chart_delete->GnRH19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH20->Visible) { // GnRH20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20">
<span<?php echo $ivf_stimulation_chart_delete->GnRH20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH21->Visible) { // GnRH21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21">
<span<?php echo $ivf_stimulation_chart_delete->GnRH21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH22->Visible) { // GnRH22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22">
<span<?php echo $ivf_stimulation_chart_delete->GnRH22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH23->Visible) { // GnRH23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23">
<span<?php echo $ivf_stimulation_chart_delete->GnRH23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH24->Visible) { // GnRH24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24">
<span<?php echo $ivf_stimulation_chart_delete->GnRH24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->GnRH25->Visible) { // GnRH25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->GnRH25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25">
<span<?php echo $ivf_stimulation_chart_delete->GnRH25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->GnRH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P414->Visible) { // P414 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P414->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414">
<span<?php echo $ivf_stimulation_chart_delete->P414->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P414->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P415->Visible) { // P415 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P415->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415">
<span<?php echo $ivf_stimulation_chart_delete->P415->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P415->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P416->Visible) { // P416 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P416->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416">
<span<?php echo $ivf_stimulation_chart_delete->P416->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P416->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P417->Visible) { // P417 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P417->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417">
<span<?php echo $ivf_stimulation_chart_delete->P417->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P417->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P418->Visible) { // P418 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P418->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418">
<span<?php echo $ivf_stimulation_chart_delete->P418->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P418->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P419->Visible) { // P419 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P419->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419">
<span<?php echo $ivf_stimulation_chart_delete->P419->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P419->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P420->Visible) { // P420 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P420->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420">
<span<?php echo $ivf_stimulation_chart_delete->P420->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P420->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P421->Visible) { // P421 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P421->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421">
<span<?php echo $ivf_stimulation_chart_delete->P421->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P421->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P422->Visible) { // P422 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P422->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422">
<span<?php echo $ivf_stimulation_chart_delete->P422->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P422->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P423->Visible) { // P423 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P423->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423">
<span<?php echo $ivf_stimulation_chart_delete->P423->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P423->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P424->Visible) { // P424 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P424->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424">
<span<?php echo $ivf_stimulation_chart_delete->P424->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P424->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->P425->Visible) { // P425 ?>
		<td <?php echo $ivf_stimulation_chart_delete->P425->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425">
<span<?php echo $ivf_stimulation_chart_delete->P425->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->P425->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt14->Visible) { // USGRt14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14">
<span<?php echo $ivf_stimulation_chart_delete->USGRt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt15->Visible) { // USGRt15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15">
<span<?php echo $ivf_stimulation_chart_delete->USGRt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt16->Visible) { // USGRt16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16">
<span<?php echo $ivf_stimulation_chart_delete->USGRt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt17->Visible) { // USGRt17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17">
<span<?php echo $ivf_stimulation_chart_delete->USGRt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt18->Visible) { // USGRt18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18">
<span<?php echo $ivf_stimulation_chart_delete->USGRt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt19->Visible) { // USGRt19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19">
<span<?php echo $ivf_stimulation_chart_delete->USGRt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt20->Visible) { // USGRt20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20">
<span<?php echo $ivf_stimulation_chart_delete->USGRt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt21->Visible) { // USGRt21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21">
<span<?php echo $ivf_stimulation_chart_delete->USGRt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt22->Visible) { // USGRt22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22">
<span<?php echo $ivf_stimulation_chart_delete->USGRt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt23->Visible) { // USGRt23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23">
<span<?php echo $ivf_stimulation_chart_delete->USGRt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt24->Visible) { // USGRt24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24">
<span<?php echo $ivf_stimulation_chart_delete->USGRt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGRt25->Visible) { // USGRt25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGRt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25">
<span<?php echo $ivf_stimulation_chart_delete->USGRt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGRt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt14->Visible) { // USGLt14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14">
<span<?php echo $ivf_stimulation_chart_delete->USGLt14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt15->Visible) { // USGLt15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15">
<span<?php echo $ivf_stimulation_chart_delete->USGLt15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt16->Visible) { // USGLt16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16">
<span<?php echo $ivf_stimulation_chart_delete->USGLt16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt17->Visible) { // USGLt17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17">
<span<?php echo $ivf_stimulation_chart_delete->USGLt17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt18->Visible) { // USGLt18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18">
<span<?php echo $ivf_stimulation_chart_delete->USGLt18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt19->Visible) { // USGLt19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19">
<span<?php echo $ivf_stimulation_chart_delete->USGLt19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt20->Visible) { // USGLt20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20">
<span<?php echo $ivf_stimulation_chart_delete->USGLt20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt21->Visible) { // USGLt21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21">
<span<?php echo $ivf_stimulation_chart_delete->USGLt21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt22->Visible) { // USGLt22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22">
<span<?php echo $ivf_stimulation_chart_delete->USGLt22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt23->Visible) { // USGLt23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23">
<span<?php echo $ivf_stimulation_chart_delete->USGLt23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt24->Visible) { // USGLt24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24">
<span<?php echo $ivf_stimulation_chart_delete->USGLt24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->USGLt25->Visible) { // USGLt25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->USGLt25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25">
<span<?php echo $ivf_stimulation_chart_delete->USGLt25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->USGLt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM14->Visible) { // EM14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14">
<span<?php echo $ivf_stimulation_chart_delete->EM14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM15->Visible) { // EM15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15">
<span<?php echo $ivf_stimulation_chart_delete->EM15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM16->Visible) { // EM16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16">
<span<?php echo $ivf_stimulation_chart_delete->EM16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM17->Visible) { // EM17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17">
<span<?php echo $ivf_stimulation_chart_delete->EM17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM18->Visible) { // EM18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18">
<span<?php echo $ivf_stimulation_chart_delete->EM18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM19->Visible) { // EM19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19">
<span<?php echo $ivf_stimulation_chart_delete->EM19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM20->Visible) { // EM20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20">
<span<?php echo $ivf_stimulation_chart_delete->EM20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM21->Visible) { // EM21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21">
<span<?php echo $ivf_stimulation_chart_delete->EM21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM22->Visible) { // EM22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22">
<span<?php echo $ivf_stimulation_chart_delete->EM22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM23->Visible) { // EM23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23">
<span<?php echo $ivf_stimulation_chart_delete->EM23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM24->Visible) { // EM24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24">
<span<?php echo $ivf_stimulation_chart_delete->EM24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EM25->Visible) { // EM25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->EM25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25">
<span<?php echo $ivf_stimulation_chart_delete->EM25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EM25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others14->Visible) { // Others14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14">
<span<?php echo $ivf_stimulation_chart_delete->Others14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others15->Visible) { // Others15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15">
<span<?php echo $ivf_stimulation_chart_delete->Others15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others16->Visible) { // Others16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16">
<span<?php echo $ivf_stimulation_chart_delete->Others16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others17->Visible) { // Others17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17">
<span<?php echo $ivf_stimulation_chart_delete->Others17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others18->Visible) { // Others18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18">
<span<?php echo $ivf_stimulation_chart_delete->Others18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others19->Visible) { // Others19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19">
<span<?php echo $ivf_stimulation_chart_delete->Others19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others20->Visible) { // Others20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20">
<span<?php echo $ivf_stimulation_chart_delete->Others20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others21->Visible) { // Others21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21">
<span<?php echo $ivf_stimulation_chart_delete->Others21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others22->Visible) { // Others22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22">
<span<?php echo $ivf_stimulation_chart_delete->Others22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others23->Visible) { // Others23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23">
<span<?php echo $ivf_stimulation_chart_delete->Others23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others24->Visible) { // Others24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24">
<span<?php echo $ivf_stimulation_chart_delete->Others24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->Others25->Visible) { // Others25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->Others25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25">
<span<?php echo $ivf_stimulation_chart_delete->Others25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->Others25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR14->Visible) { // DR14 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR14->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14">
<span<?php echo $ivf_stimulation_chart_delete->DR14->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR15->Visible) { // DR15 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR15->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15">
<span<?php echo $ivf_stimulation_chart_delete->DR15->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR16->Visible) { // DR16 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR16->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16">
<span<?php echo $ivf_stimulation_chart_delete->DR16->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR17->Visible) { // DR17 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR17->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17">
<span<?php echo $ivf_stimulation_chart_delete->DR17->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR18->Visible) { // DR18 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR18->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18">
<span<?php echo $ivf_stimulation_chart_delete->DR18->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR19->Visible) { // DR19 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR19->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19">
<span<?php echo $ivf_stimulation_chart_delete->DR19->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR20->Visible) { // DR20 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR20->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20">
<span<?php echo $ivf_stimulation_chart_delete->DR20->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR21->Visible) { // DR21 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR21->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21">
<span<?php echo $ivf_stimulation_chart_delete->DR21->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR22->Visible) { // DR22 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR22->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22">
<span<?php echo $ivf_stimulation_chart_delete->DR22->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR23->Visible) { // DR23 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR23->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23">
<span<?php echo $ivf_stimulation_chart_delete->DR23->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR24->Visible) { // DR24 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR24->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24">
<span<?php echo $ivf_stimulation_chart_delete->DR24->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DR25->Visible) { // DR25 ?>
		<td <?php echo $ivf_stimulation_chart_delete->DR25->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25">
<span<?php echo $ivf_stimulation_chart_delete->DR25->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DR25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E214->Visible) { // E214 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E214->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214">
<span<?php echo $ivf_stimulation_chart_delete->E214->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E214->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E215->Visible) { // E215 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E215->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215">
<span<?php echo $ivf_stimulation_chart_delete->E215->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E215->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E216->Visible) { // E216 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E216->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216">
<span<?php echo $ivf_stimulation_chart_delete->E216->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E216->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E217->Visible) { // E217 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E217->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217">
<span<?php echo $ivf_stimulation_chart_delete->E217->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E217->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E218->Visible) { // E218 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E218->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218">
<span<?php echo $ivf_stimulation_chart_delete->E218->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E218->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E219->Visible) { // E219 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E219->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219">
<span<?php echo $ivf_stimulation_chart_delete->E219->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E219->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E220->Visible) { // E220 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E220->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220">
<span<?php echo $ivf_stimulation_chart_delete->E220->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E220->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E221->Visible) { // E221 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E221->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221">
<span<?php echo $ivf_stimulation_chart_delete->E221->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E221->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E222->Visible) { // E222 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E222->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222">
<span<?php echo $ivf_stimulation_chart_delete->E222->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E222->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E223->Visible) { // E223 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E223->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223">
<span<?php echo $ivf_stimulation_chart_delete->E223->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E223->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E224->Visible) { // E224 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E224->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224">
<span<?php echo $ivf_stimulation_chart_delete->E224->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E224->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->E225->Visible) { // E225 ?>
		<td <?php echo $ivf_stimulation_chart_delete->E225->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225">
<span<?php echo $ivf_stimulation_chart_delete->E225->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->E225->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EEETTTDTE->Visible) { // EEETTTDTE ?>
		<td <?php echo $ivf_stimulation_chart_delete->EEETTTDTE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE">
<span<?php echo $ivf_stimulation_chart_delete->EEETTTDTE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->bhcgdate->Visible) { // bhcgdate ?>
		<td <?php echo $ivf_stimulation_chart_delete->bhcgdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate">
<span<?php echo $ivf_stimulation_chart_delete->bhcgdate->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->bhcgdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
		<td <?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY">
<span<?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->HSG->Visible) { // HSG ?>
		<td <?php echo $ivf_stimulation_chart_delete->HSG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG">
<span<?php echo $ivf_stimulation_chart_delete->HSG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->HSG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->DHL->Visible) { // DHL ?>
		<td <?php echo $ivf_stimulation_chart_delete->DHL->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL">
<span<?php echo $ivf_stimulation_chart_delete->DHL->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->DHL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
		<td <?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
		<td <?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS">
<span<?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
		<td <?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS">
<span<?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
		<td <?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->TABLETS->Visible) { // TABLETS ?>
		<td <?php echo $ivf_stimulation_chart_delete->TABLETS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS">
<span<?php echo $ivf_stimulation_chart_delete->TABLETS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->TABLETS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
		<td <?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
		<td <?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<td <?php echo $ivf_stimulation_chart_delete->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE">
<span<?php echo $ivf_stimulation_chart_delete->PROCEDURE->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
		<td <?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
		<td <?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
		<td <?php echo $ivf_stimulation_chart_delete->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG">
<span<?php echo $ivf_stimulation_chart_delete->ONGOING_PREG->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_chart_delete->EDD_Date->Visible) { // EDD_Date ?>
		<td <?php echo $ivf_stimulation_chart_delete->EDD_Date->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_chart_delete->RowCount ?>_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date">
<span<?php echo $ivf_stimulation_chart_delete->EDD_Date->viewAttributes() ?>><?php echo $ivf_stimulation_chart_delete->EDD_Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_stimulation_chart_delete->Recordset->moveNext();
}
$ivf_stimulation_chart_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_chart_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_stimulation_chart_delete->showPageFooter();
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
$ivf_stimulation_chart_delete->terminate();
?>