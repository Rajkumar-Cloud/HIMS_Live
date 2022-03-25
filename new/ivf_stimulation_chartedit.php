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
$ivf_stimulation_chart_edit = new ivf_stimulation_chart_edit();

// Run the page
$ivf_stimulation_chart_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_stimulation_chartedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_stimulation_chartedit = currentForm = new ew.Form("fivf_stimulation_chartedit", "edit");

	// Validate form
	fivf_stimulation_chartedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($ivf_stimulation_chart_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->id->caption(), $ivf_stimulation_chart_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RIDNo->caption(), $ivf_stimulation_chart_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Name->caption(), $ivf_stimulation_chart_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ARTCycle->caption(), $ivf_stimulation_chart_edit->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->FemaleFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->FemaleFactor->caption(), $ivf_stimulation_chart_edit->FemaleFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->MaleFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->MaleFactor->caption(), $ivf_stimulation_chart_edit->MaleFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Protocol->Required) { ?>
				elm = this.getElements("x" + infix + "_Protocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Protocol->caption(), $ivf_stimulation_chart_edit->Protocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SemenFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenFrozen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SemenFrozen->caption(), $ivf_stimulation_chart_edit->SemenFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->A4ICSICycle->Required) { ?>
				elm = this.getElements("x" + infix + "_A4ICSICycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->A4ICSICycle->caption(), $ivf_stimulation_chart_edit->A4ICSICycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TotalICSICycle->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalICSICycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TotalICSICycle->caption(), $ivf_stimulation_chart_edit->TotalICSICycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TypeOfInfertility->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfInfertility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TypeOfInfertility->caption(), $ivf_stimulation_chart_edit->TypeOfInfertility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Duration->caption(), $ivf_stimulation_chart_edit->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->LMP->caption(), $ivf_stimulation_chart_edit->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RelevantHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_RelevantHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RelevantHistory->caption(), $ivf_stimulation_chart_edit->RelevantHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->IUICycles->Required) { ?>
				elm = this.getElements("x" + infix + "_IUICycles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->IUICycles->caption(), $ivf_stimulation_chart_edit->IUICycles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->AFC->Required) { ?>
				elm = this.getElements("x" + infix + "_AFC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->AFC->caption(), $ivf_stimulation_chart_edit->AFC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->AMH->Required) { ?>
				elm = this.getElements("x" + infix + "_AMH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->AMH->caption(), $ivf_stimulation_chart_edit->AMH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->FBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_FBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->FBMI->caption(), $ivf_stimulation_chart_edit->FBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->MBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_MBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->MBMI->caption(), $ivf_stimulation_chart_edit->MBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->OvarianVolumeRT->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianVolumeRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->OvarianVolumeRT->caption(), $ivf_stimulation_chart_edit->OvarianVolumeRT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->OvarianVolumeLT->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianVolumeLT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->OvarianVolumeLT->caption(), $ivf_stimulation_chart_edit->OvarianVolumeLT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DAYSOFSTIMULATION->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYSOFSTIMULATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->caption(), $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->Required) { ?>
				elm = this.getElements("x" + infix + "_DOSEOFGONADOTROPINS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->caption(), $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->INJTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->INJTYPE->caption(), $ivf_stimulation_chart_edit->INJTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ANTAGONISTDAYS->Required) { ?>
				elm = this.getElements("x" + infix + "_ANTAGONISTDAYS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ANTAGONISTDAYS->caption(), $ivf_stimulation_chart_edit->ANTAGONISTDAYS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->Required) { ?>
				elm = this.getElements("x" + infix + "_ANTAGONISTSTARTDAY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->caption(), $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GROWTHHORMONE->Required) { ?>
				elm = this.getElements("x" + infix + "_GROWTHHORMONE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GROWTHHORMONE->caption(), $ivf_stimulation_chart_edit->GROWTHHORMONE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->PRETREATMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_PRETREATMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->PRETREATMENT->caption(), $ivf_stimulation_chart_edit->PRETREATMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SerumP4->Required) { ?>
				elm = this.getElements("x" + infix + "_SerumP4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SerumP4->caption(), $ivf_stimulation_chart_edit->SerumP4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->FORT->Required) { ?>
				elm = this.getElements("x" + infix + "_FORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->FORT->caption(), $ivf_stimulation_chart_edit->FORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->MedicalFactors->Required) { ?>
				elm = this.getElements("x" + infix + "_MedicalFactors");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->MedicalFactors->caption(), $ivf_stimulation_chart_edit->MedicalFactors->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SCDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SCDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SCDate->caption(), $ivf_stimulation_chart_edit->SCDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->OvarianSurgery->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianSurgery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->OvarianSurgery->caption(), $ivf_stimulation_chart_edit->OvarianSurgery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->PreProcedureOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_PreProcedureOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->PreProcedureOrder->caption(), $ivf_stimulation_chart_edit->PreProcedureOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TRIGGERR->Required) { ?>
				elm = this.getElements("x" + infix + "_TRIGGERR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TRIGGERR->caption(), $ivf_stimulation_chart_edit->TRIGGERR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TRIGGERDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_TRIGGERDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TRIGGERDATE->caption(), $ivf_stimulation_chart_edit->TRIGGERDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ATHOMEorCLINIC->Required) { ?>
				elm = this.getElements("x" + infix + "_ATHOMEorCLINIC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ATHOMEorCLINIC->caption(), $ivf_stimulation_chart_edit->ATHOMEorCLINIC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->OPUDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_OPUDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->OPUDATE->caption(), $ivf_stimulation_chart_edit->OPUDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ALLFREEZEINDICATION->Required) { ?>
				elm = this.getElements("x" + infix + "_ALLFREEZEINDICATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->caption(), $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ERA->Required) { ?>
				elm = this.getElements("x" + infix + "_ERA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ERA->caption(), $ivf_stimulation_chart_edit->ERA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->PGTA->Required) { ?>
				elm = this.getElements("x" + infix + "_PGTA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->PGTA->caption(), $ivf_stimulation_chart_edit->PGTA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->PGD->Required) { ?>
				elm = this.getElements("x" + infix + "_PGD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->PGD->caption(), $ivf_stimulation_chart_edit->PGD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DATEOFET->Required) { ?>
				elm = this.getElements("x" + infix + "_DATEOFET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DATEOFET->caption(), $ivf_stimulation_chart_edit->DATEOFET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ET->Required) { ?>
				elm = this.getElements("x" + infix + "_ET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ET->caption(), $ivf_stimulation_chart_edit->ET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ESET->Required) { ?>
				elm = this.getElements("x" + infix + "_ESET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ESET->caption(), $ivf_stimulation_chart_edit->ESET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DOET->Required) { ?>
				elm = this.getElements("x" + infix + "_DOET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DOET->caption(), $ivf_stimulation_chart_edit->DOET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SEMENPREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_SEMENPREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SEMENPREPARATION->caption(), $ivf_stimulation_chart_edit->SEMENPREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->REASONFORESET->Required) { ?>
				elm = this.getElements("x" + infix + "_REASONFORESET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->REASONFORESET->caption(), $ivf_stimulation_chart_edit->REASONFORESET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Expectedoocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Expectedoocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Expectedoocytes->caption(), $ivf_stimulation_chart_edit->Expectedoocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate1->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate1->caption(), $ivf_stimulation_chart_edit->StChDate1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate2->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate2->caption(), $ivf_stimulation_chart_edit->StChDate2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate3->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate3->caption(), $ivf_stimulation_chart_edit->StChDate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate4->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate4->caption(), $ivf_stimulation_chart_edit->StChDate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate5->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate5->caption(), $ivf_stimulation_chart_edit->StChDate5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate6->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate6->caption(), $ivf_stimulation_chart_edit->StChDate6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate7->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate7->caption(), $ivf_stimulation_chart_edit->StChDate7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate8->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate8->caption(), $ivf_stimulation_chart_edit->StChDate8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate9->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate9->caption(), $ivf_stimulation_chart_edit->StChDate9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate10->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate10->caption(), $ivf_stimulation_chart_edit->StChDate10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate11->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate11->caption(), $ivf_stimulation_chart_edit->StChDate11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate12->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate12->caption(), $ivf_stimulation_chart_edit->StChDate12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate13->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate13->caption(), $ivf_stimulation_chart_edit->StChDate13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay1->caption(), $ivf_stimulation_chart_edit->CycleDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay2->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay2->caption(), $ivf_stimulation_chart_edit->CycleDay2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay3->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay3->caption(), $ivf_stimulation_chart_edit->CycleDay3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay4->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay4->caption(), $ivf_stimulation_chart_edit->CycleDay4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay5->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay5->caption(), $ivf_stimulation_chart_edit->CycleDay5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay6->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay6->caption(), $ivf_stimulation_chart_edit->CycleDay6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay7->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay7->caption(), $ivf_stimulation_chart_edit->CycleDay7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay8->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay8->caption(), $ivf_stimulation_chart_edit->CycleDay8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay9->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay9->caption(), $ivf_stimulation_chart_edit->CycleDay9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay10->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay10->caption(), $ivf_stimulation_chart_edit->CycleDay10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay11->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay11->caption(), $ivf_stimulation_chart_edit->CycleDay11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay12->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay12->caption(), $ivf_stimulation_chart_edit->CycleDay12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay13->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay13->caption(), $ivf_stimulation_chart_edit->CycleDay13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay1->caption(), $ivf_stimulation_chart_edit->StimulationDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay2->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay2->caption(), $ivf_stimulation_chart_edit->StimulationDay2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay3->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay3->caption(), $ivf_stimulation_chart_edit->StimulationDay3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay4->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay4->caption(), $ivf_stimulation_chart_edit->StimulationDay4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay5->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay5->caption(), $ivf_stimulation_chart_edit->StimulationDay5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay6->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay6->caption(), $ivf_stimulation_chart_edit->StimulationDay6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay7->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay7->caption(), $ivf_stimulation_chart_edit->StimulationDay7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay8->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay8->caption(), $ivf_stimulation_chart_edit->StimulationDay8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay9->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay9->caption(), $ivf_stimulation_chart_edit->StimulationDay9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay10->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay10->caption(), $ivf_stimulation_chart_edit->StimulationDay10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay11->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay11->caption(), $ivf_stimulation_chart_edit->StimulationDay11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay12->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay12->caption(), $ivf_stimulation_chart_edit->StimulationDay12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay13->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay13->caption(), $ivf_stimulation_chart_edit->StimulationDay13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet1->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet1->caption(), $ivf_stimulation_chart_edit->Tablet1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet2->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet2->caption(), $ivf_stimulation_chart_edit->Tablet2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet3->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet3->caption(), $ivf_stimulation_chart_edit->Tablet3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet4->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet4->caption(), $ivf_stimulation_chart_edit->Tablet4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet5->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet5->caption(), $ivf_stimulation_chart_edit->Tablet5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet6->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet6->caption(), $ivf_stimulation_chart_edit->Tablet6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet7->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet7->caption(), $ivf_stimulation_chart_edit->Tablet7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet8->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet8->caption(), $ivf_stimulation_chart_edit->Tablet8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet9->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet9->caption(), $ivf_stimulation_chart_edit->Tablet9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet10->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet10->caption(), $ivf_stimulation_chart_edit->Tablet10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet11->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet11->caption(), $ivf_stimulation_chart_edit->Tablet11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet12->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet12->caption(), $ivf_stimulation_chart_edit->Tablet12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet13->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet13->caption(), $ivf_stimulation_chart_edit->Tablet13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH1->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH1->caption(), $ivf_stimulation_chart_edit->RFSH1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH2->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH2->caption(), $ivf_stimulation_chart_edit->RFSH2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH3->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH3->caption(), $ivf_stimulation_chart_edit->RFSH3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH4->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH4->caption(), $ivf_stimulation_chart_edit->RFSH4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH5->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH5->caption(), $ivf_stimulation_chart_edit->RFSH5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH6->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH6->caption(), $ivf_stimulation_chart_edit->RFSH6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH7->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH7->caption(), $ivf_stimulation_chart_edit->RFSH7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH8->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH8->caption(), $ivf_stimulation_chart_edit->RFSH8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH9->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH9->caption(), $ivf_stimulation_chart_edit->RFSH9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH10->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH10->caption(), $ivf_stimulation_chart_edit->RFSH10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH11->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH11->caption(), $ivf_stimulation_chart_edit->RFSH11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH12->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH12->caption(), $ivf_stimulation_chart_edit->RFSH12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH13->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH13->caption(), $ivf_stimulation_chart_edit->RFSH13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG1->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG1->caption(), $ivf_stimulation_chart_edit->HMG1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG2->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG2->caption(), $ivf_stimulation_chart_edit->HMG2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG3->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG3->caption(), $ivf_stimulation_chart_edit->HMG3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG4->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG4->caption(), $ivf_stimulation_chart_edit->HMG4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG5->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG5->caption(), $ivf_stimulation_chart_edit->HMG5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG6->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG6->caption(), $ivf_stimulation_chart_edit->HMG6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG7->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG7->caption(), $ivf_stimulation_chart_edit->HMG7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG8->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG8->caption(), $ivf_stimulation_chart_edit->HMG8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG9->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG9->caption(), $ivf_stimulation_chart_edit->HMG9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG10->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG10->caption(), $ivf_stimulation_chart_edit->HMG10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG11->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG11->caption(), $ivf_stimulation_chart_edit->HMG11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG12->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG12->caption(), $ivf_stimulation_chart_edit->HMG12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG13->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG13->caption(), $ivf_stimulation_chart_edit->HMG13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH1->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH1->caption(), $ivf_stimulation_chart_edit->GnRH1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH2->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH2->caption(), $ivf_stimulation_chart_edit->GnRH2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH3->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH3->caption(), $ivf_stimulation_chart_edit->GnRH3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH4->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH4->caption(), $ivf_stimulation_chart_edit->GnRH4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH5->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH5->caption(), $ivf_stimulation_chart_edit->GnRH5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH6->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH6->caption(), $ivf_stimulation_chart_edit->GnRH6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH7->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH7->caption(), $ivf_stimulation_chart_edit->GnRH7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH8->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH8->caption(), $ivf_stimulation_chart_edit->GnRH8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH9->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH9->caption(), $ivf_stimulation_chart_edit->GnRH9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH10->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH10->caption(), $ivf_stimulation_chart_edit->GnRH10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH11->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH11->caption(), $ivf_stimulation_chart_edit->GnRH11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH12->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH12->caption(), $ivf_stimulation_chart_edit->GnRH12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH13->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH13->caption(), $ivf_stimulation_chart_edit->GnRH13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E21->Required) { ?>
				elm = this.getElements("x" + infix + "_E21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E21->caption(), $ivf_stimulation_chart_edit->E21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E22->Required) { ?>
				elm = this.getElements("x" + infix + "_E22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E22->caption(), $ivf_stimulation_chart_edit->E22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E23->Required) { ?>
				elm = this.getElements("x" + infix + "_E23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E23->caption(), $ivf_stimulation_chart_edit->E23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E24->Required) { ?>
				elm = this.getElements("x" + infix + "_E24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E24->caption(), $ivf_stimulation_chart_edit->E24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E25->Required) { ?>
				elm = this.getElements("x" + infix + "_E25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E25->caption(), $ivf_stimulation_chart_edit->E25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E26->Required) { ?>
				elm = this.getElements("x" + infix + "_E26");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E26->caption(), $ivf_stimulation_chart_edit->E26->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E27->Required) { ?>
				elm = this.getElements("x" + infix + "_E27");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E27->caption(), $ivf_stimulation_chart_edit->E27->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E28->Required) { ?>
				elm = this.getElements("x" + infix + "_E28");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E28->caption(), $ivf_stimulation_chart_edit->E28->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E29->Required) { ?>
				elm = this.getElements("x" + infix + "_E29");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E29->caption(), $ivf_stimulation_chart_edit->E29->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E210->Required) { ?>
				elm = this.getElements("x" + infix + "_E210");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E210->caption(), $ivf_stimulation_chart_edit->E210->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E211->Required) { ?>
				elm = this.getElements("x" + infix + "_E211");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E211->caption(), $ivf_stimulation_chart_edit->E211->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E212->Required) { ?>
				elm = this.getElements("x" + infix + "_E212");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E212->caption(), $ivf_stimulation_chart_edit->E212->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E213->Required) { ?>
				elm = this.getElements("x" + infix + "_E213");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E213->caption(), $ivf_stimulation_chart_edit->E213->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P41->Required) { ?>
				elm = this.getElements("x" + infix + "_P41");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P41->caption(), $ivf_stimulation_chart_edit->P41->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P42->Required) { ?>
				elm = this.getElements("x" + infix + "_P42");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P42->caption(), $ivf_stimulation_chart_edit->P42->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P43->Required) { ?>
				elm = this.getElements("x" + infix + "_P43");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P43->caption(), $ivf_stimulation_chart_edit->P43->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P44->Required) { ?>
				elm = this.getElements("x" + infix + "_P44");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P44->caption(), $ivf_stimulation_chart_edit->P44->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P45->Required) { ?>
				elm = this.getElements("x" + infix + "_P45");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P45->caption(), $ivf_stimulation_chart_edit->P45->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P46->Required) { ?>
				elm = this.getElements("x" + infix + "_P46");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P46->caption(), $ivf_stimulation_chart_edit->P46->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P47->Required) { ?>
				elm = this.getElements("x" + infix + "_P47");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P47->caption(), $ivf_stimulation_chart_edit->P47->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P48->Required) { ?>
				elm = this.getElements("x" + infix + "_P48");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P48->caption(), $ivf_stimulation_chart_edit->P48->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P49->Required) { ?>
				elm = this.getElements("x" + infix + "_P49");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P49->caption(), $ivf_stimulation_chart_edit->P49->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P410->Required) { ?>
				elm = this.getElements("x" + infix + "_P410");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P410->caption(), $ivf_stimulation_chart_edit->P410->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P411->Required) { ?>
				elm = this.getElements("x" + infix + "_P411");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P411->caption(), $ivf_stimulation_chart_edit->P411->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P412->Required) { ?>
				elm = this.getElements("x" + infix + "_P412");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P412->caption(), $ivf_stimulation_chart_edit->P412->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P413->Required) { ?>
				elm = this.getElements("x" + infix + "_P413");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P413->caption(), $ivf_stimulation_chart_edit->P413->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt1->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt1->caption(), $ivf_stimulation_chart_edit->USGRt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt2->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt2->caption(), $ivf_stimulation_chart_edit->USGRt2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt3->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt3->caption(), $ivf_stimulation_chart_edit->USGRt3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt4->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt4->caption(), $ivf_stimulation_chart_edit->USGRt4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt5->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt5->caption(), $ivf_stimulation_chart_edit->USGRt5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt6->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt6->caption(), $ivf_stimulation_chart_edit->USGRt6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt7->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt7->caption(), $ivf_stimulation_chart_edit->USGRt7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt8->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt8->caption(), $ivf_stimulation_chart_edit->USGRt8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt9->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt9->caption(), $ivf_stimulation_chart_edit->USGRt9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt10->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt10->caption(), $ivf_stimulation_chart_edit->USGRt10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt11->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt11->caption(), $ivf_stimulation_chart_edit->USGRt11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt12->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt12->caption(), $ivf_stimulation_chart_edit->USGRt12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt13->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt13->caption(), $ivf_stimulation_chart_edit->USGRt13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt1->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt1->caption(), $ivf_stimulation_chart_edit->USGLt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt2->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt2->caption(), $ivf_stimulation_chart_edit->USGLt2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt3->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt3->caption(), $ivf_stimulation_chart_edit->USGLt3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt4->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt4->caption(), $ivf_stimulation_chart_edit->USGLt4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt5->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt5->caption(), $ivf_stimulation_chart_edit->USGLt5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt6->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt6->caption(), $ivf_stimulation_chart_edit->USGLt6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt7->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt7->caption(), $ivf_stimulation_chart_edit->USGLt7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt8->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt8->caption(), $ivf_stimulation_chart_edit->USGLt8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt9->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt9->caption(), $ivf_stimulation_chart_edit->USGLt9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt10->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt10->caption(), $ivf_stimulation_chart_edit->USGLt10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt11->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt11->caption(), $ivf_stimulation_chart_edit->USGLt11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt12->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt12->caption(), $ivf_stimulation_chart_edit->USGLt12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt13->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt13->caption(), $ivf_stimulation_chart_edit->USGLt13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM1->Required) { ?>
				elm = this.getElements("x" + infix + "_EM1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM1->caption(), $ivf_stimulation_chart_edit->EM1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM2->Required) { ?>
				elm = this.getElements("x" + infix + "_EM2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM2->caption(), $ivf_stimulation_chart_edit->EM2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM3->Required) { ?>
				elm = this.getElements("x" + infix + "_EM3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM3->caption(), $ivf_stimulation_chart_edit->EM3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM4->Required) { ?>
				elm = this.getElements("x" + infix + "_EM4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM4->caption(), $ivf_stimulation_chart_edit->EM4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM5->Required) { ?>
				elm = this.getElements("x" + infix + "_EM5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM5->caption(), $ivf_stimulation_chart_edit->EM5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM6->Required) { ?>
				elm = this.getElements("x" + infix + "_EM6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM6->caption(), $ivf_stimulation_chart_edit->EM6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM7->Required) { ?>
				elm = this.getElements("x" + infix + "_EM7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM7->caption(), $ivf_stimulation_chart_edit->EM7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM8->Required) { ?>
				elm = this.getElements("x" + infix + "_EM8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM8->caption(), $ivf_stimulation_chart_edit->EM8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM9->Required) { ?>
				elm = this.getElements("x" + infix + "_EM9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM9->caption(), $ivf_stimulation_chart_edit->EM9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM10->Required) { ?>
				elm = this.getElements("x" + infix + "_EM10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM10->caption(), $ivf_stimulation_chart_edit->EM10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM11->Required) { ?>
				elm = this.getElements("x" + infix + "_EM11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM11->caption(), $ivf_stimulation_chart_edit->EM11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM12->Required) { ?>
				elm = this.getElements("x" + infix + "_EM12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM12->caption(), $ivf_stimulation_chart_edit->EM12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM13->Required) { ?>
				elm = this.getElements("x" + infix + "_EM13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM13->caption(), $ivf_stimulation_chart_edit->EM13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others1->Required) { ?>
				elm = this.getElements("x" + infix + "_Others1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others1->caption(), $ivf_stimulation_chart_edit->Others1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others2->Required) { ?>
				elm = this.getElements("x" + infix + "_Others2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others2->caption(), $ivf_stimulation_chart_edit->Others2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others3->Required) { ?>
				elm = this.getElements("x" + infix + "_Others3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others3->caption(), $ivf_stimulation_chart_edit->Others3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others4->Required) { ?>
				elm = this.getElements("x" + infix + "_Others4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others4->caption(), $ivf_stimulation_chart_edit->Others4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others5->Required) { ?>
				elm = this.getElements("x" + infix + "_Others5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others5->caption(), $ivf_stimulation_chart_edit->Others5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others6->Required) { ?>
				elm = this.getElements("x" + infix + "_Others6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others6->caption(), $ivf_stimulation_chart_edit->Others6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others7->Required) { ?>
				elm = this.getElements("x" + infix + "_Others7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others7->caption(), $ivf_stimulation_chart_edit->Others7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others8->Required) { ?>
				elm = this.getElements("x" + infix + "_Others8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others8->caption(), $ivf_stimulation_chart_edit->Others8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others9->Required) { ?>
				elm = this.getElements("x" + infix + "_Others9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others9->caption(), $ivf_stimulation_chart_edit->Others9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others10->Required) { ?>
				elm = this.getElements("x" + infix + "_Others10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others10->caption(), $ivf_stimulation_chart_edit->Others10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others11->Required) { ?>
				elm = this.getElements("x" + infix + "_Others11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others11->caption(), $ivf_stimulation_chart_edit->Others11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others12->Required) { ?>
				elm = this.getElements("x" + infix + "_Others12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others12->caption(), $ivf_stimulation_chart_edit->Others12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others13->Required) { ?>
				elm = this.getElements("x" + infix + "_Others13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others13->caption(), $ivf_stimulation_chart_edit->Others13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR1->Required) { ?>
				elm = this.getElements("x" + infix + "_DR1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR1->caption(), $ivf_stimulation_chart_edit->DR1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR2->Required) { ?>
				elm = this.getElements("x" + infix + "_DR2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR2->caption(), $ivf_stimulation_chart_edit->DR2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR3->Required) { ?>
				elm = this.getElements("x" + infix + "_DR3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR3->caption(), $ivf_stimulation_chart_edit->DR3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR4->Required) { ?>
				elm = this.getElements("x" + infix + "_DR4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR4->caption(), $ivf_stimulation_chart_edit->DR4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR5->Required) { ?>
				elm = this.getElements("x" + infix + "_DR5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR5->caption(), $ivf_stimulation_chart_edit->DR5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR6->Required) { ?>
				elm = this.getElements("x" + infix + "_DR6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR6->caption(), $ivf_stimulation_chart_edit->DR6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR7->Required) { ?>
				elm = this.getElements("x" + infix + "_DR7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR7->caption(), $ivf_stimulation_chart_edit->DR7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR8->Required) { ?>
				elm = this.getElements("x" + infix + "_DR8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR8->caption(), $ivf_stimulation_chart_edit->DR8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR9->Required) { ?>
				elm = this.getElements("x" + infix + "_DR9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR9->caption(), $ivf_stimulation_chart_edit->DR9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR10->Required) { ?>
				elm = this.getElements("x" + infix + "_DR10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR10->caption(), $ivf_stimulation_chart_edit->DR10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR11->Required) { ?>
				elm = this.getElements("x" + infix + "_DR11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR11->caption(), $ivf_stimulation_chart_edit->DR11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR12->Required) { ?>
				elm = this.getElements("x" + infix + "_DR12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR12->caption(), $ivf_stimulation_chart_edit->DR12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR13->Required) { ?>
				elm = this.getElements("x" + infix + "_DR13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR13->caption(), $ivf_stimulation_chart_edit->DR13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->Required) { ?>
				elm = this.getElements("x" + infix + "_DOCTORRESPONSIBLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->caption(), $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TidNo->caption(), $ivf_stimulation_chart_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->TidNo->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->Convert->Required) { ?>
				elm = this.getElements("x" + infix + "_Convert[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Convert->caption(), $ivf_stimulation_chart_edit->Convert->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Consultant->caption(), $ivf_stimulation_chart_edit->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->InseminatinTechnique->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminatinTechnique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->InseminatinTechnique->caption(), $ivf_stimulation_chart_edit->InseminatinTechnique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->IndicationForART->Required) { ?>
				elm = this.getElements("x" + infix + "_IndicationForART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->IndicationForART->caption(), $ivf_stimulation_chart_edit->IndicationForART->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Hysteroscopy->Required) { ?>
				elm = this.getElements("x" + infix + "_Hysteroscopy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Hysteroscopy->caption(), $ivf_stimulation_chart_edit->Hysteroscopy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EndometrialScratching->Required) { ?>
				elm = this.getElements("x" + infix + "_EndometrialScratching");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EndometrialScratching->caption(), $ivf_stimulation_chart_edit->EndometrialScratching->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TrialCannulation->Required) { ?>
				elm = this.getElements("x" + infix + "_TrialCannulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TrialCannulation->caption(), $ivf_stimulation_chart_edit->TrialCannulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CYCLETYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CYCLETYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CYCLETYPE->caption(), $ivf_stimulation_chart_edit->CYCLETYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HRTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_HRTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HRTCYCLE->caption(), $ivf_stimulation_chart_edit->HRTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->OralEstrogenDosage->Required) { ?>
				elm = this.getElements("x" + infix + "_OralEstrogenDosage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->OralEstrogenDosage->caption(), $ivf_stimulation_chart_edit->OralEstrogenDosage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->VaginalEstrogen->Required) { ?>
				elm = this.getElements("x" + infix + "_VaginalEstrogen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->VaginalEstrogen->caption(), $ivf_stimulation_chart_edit->VaginalEstrogen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GCSF->Required) { ?>
				elm = this.getElements("x" + infix + "_GCSF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GCSF->caption(), $ivf_stimulation_chart_edit->GCSF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ActivatedPRP->Required) { ?>
				elm = this.getElements("x" + infix + "_ActivatedPRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ActivatedPRP->caption(), $ivf_stimulation_chart_edit->ActivatedPRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->UCLcm->Required) { ?>
				elm = this.getElements("x" + infix + "_UCLcm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->UCLcm->caption(), $ivf_stimulation_chart_edit->UCLcm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DATOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->caption(), $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->caption(), $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTHAWED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->caption(), $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTRANSFERRED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->caption(), $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DAYOFEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DAYOFEMBRYOS->caption(), $ivf_stimulation_chart_edit->DAYOFEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_CRYOPRESERVEDEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->caption(), $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ViaAdmin->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaAdmin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ViaAdmin->caption(), $ivf_stimulation_chart_edit->ViaAdmin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ViaStartDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaStartDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ViaStartDateTime->caption(), $ivf_stimulation_chart_edit->ViaStartDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ViaStartDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->ViaStartDateTime->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->ViaDose->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaDose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ViaDose->caption(), $ivf_stimulation_chart_edit->ViaDose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->AllFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_AllFreeze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->AllFreeze->caption(), $ivf_stimulation_chart_edit->AllFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TreatmentCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TreatmentCancel->caption(), $ivf_stimulation_chart_edit->TreatmentCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Reason->Required) { ?>
				elm = this.getElements("x" + infix + "_Reason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Reason->caption(), $ivf_stimulation_chart_edit->Reason->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ProgesteroneAdmin->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneAdmin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ProgesteroneAdmin->caption(), $ivf_stimulation_chart_edit->ProgesteroneAdmin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ProgesteroneStart->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneStart");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ProgesteroneStart->caption(), $ivf_stimulation_chart_edit->ProgesteroneStart->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ProgesteroneDose->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneDose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ProgesteroneDose->caption(), $ivf_stimulation_chart_edit->ProgesteroneDose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Projectron->Required) { ?>
				elm = this.getElements("x" + infix + "_Projectron");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Projectron->caption(), $ivf_stimulation_chart_edit->Projectron->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StChDate14->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate14->caption(), $ivf_stimulation_chart_edit->StChDate14->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate14");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate14->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate15->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate15->caption(), $ivf_stimulation_chart_edit->StChDate15->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate15");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate15->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate16->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate16->caption(), $ivf_stimulation_chart_edit->StChDate16->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate16");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate16->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate17->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate17->caption(), $ivf_stimulation_chart_edit->StChDate17->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate17");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate17->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate18->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate18->caption(), $ivf_stimulation_chart_edit->StChDate18->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate18");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate18->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate19->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate19->caption(), $ivf_stimulation_chart_edit->StChDate19->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate19");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate19->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate20->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate20->caption(), $ivf_stimulation_chart_edit->StChDate20->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate20");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate20->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate21->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate21->caption(), $ivf_stimulation_chart_edit->StChDate21->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate21");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate21->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate22->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate22->caption(), $ivf_stimulation_chart_edit->StChDate22->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate22");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate22->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate23->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate23->caption(), $ivf_stimulation_chart_edit->StChDate23->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate23");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate23->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate24->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate24->caption(), $ivf_stimulation_chart_edit->StChDate24->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate24");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate24->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->StChDate25->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StChDate25->caption(), $ivf_stimulation_chart_edit->StChDate25->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate25");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->StChDate25->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->CycleDay14->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay14->caption(), $ivf_stimulation_chart_edit->CycleDay14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay15->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay15->caption(), $ivf_stimulation_chart_edit->CycleDay15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay16->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay16->caption(), $ivf_stimulation_chart_edit->CycleDay16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay17->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay17->caption(), $ivf_stimulation_chart_edit->CycleDay17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay18->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay18->caption(), $ivf_stimulation_chart_edit->CycleDay18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay19->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay19->caption(), $ivf_stimulation_chart_edit->CycleDay19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay20->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay20->caption(), $ivf_stimulation_chart_edit->CycleDay20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay21->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay21->caption(), $ivf_stimulation_chart_edit->CycleDay21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay22->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay22->caption(), $ivf_stimulation_chart_edit->CycleDay22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay23->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay23->caption(), $ivf_stimulation_chart_edit->CycleDay23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay24->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay24->caption(), $ivf_stimulation_chart_edit->CycleDay24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->CycleDay25->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->CycleDay25->caption(), $ivf_stimulation_chart_edit->CycleDay25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay14->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay14->caption(), $ivf_stimulation_chart_edit->StimulationDay14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay15->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay15->caption(), $ivf_stimulation_chart_edit->StimulationDay15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay16->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay16->caption(), $ivf_stimulation_chart_edit->StimulationDay16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay17->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay17->caption(), $ivf_stimulation_chart_edit->StimulationDay17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay18->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay18->caption(), $ivf_stimulation_chart_edit->StimulationDay18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay19->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay19->caption(), $ivf_stimulation_chart_edit->StimulationDay19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay20->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay20->caption(), $ivf_stimulation_chart_edit->StimulationDay20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay21->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay21->caption(), $ivf_stimulation_chart_edit->StimulationDay21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay22->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay22->caption(), $ivf_stimulation_chart_edit->StimulationDay22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay23->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay23->caption(), $ivf_stimulation_chart_edit->StimulationDay23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay24->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay24->caption(), $ivf_stimulation_chart_edit->StimulationDay24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->StimulationDay25->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->StimulationDay25->caption(), $ivf_stimulation_chart_edit->StimulationDay25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet14->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet14->caption(), $ivf_stimulation_chart_edit->Tablet14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet15->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet15->caption(), $ivf_stimulation_chart_edit->Tablet15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet16->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet16->caption(), $ivf_stimulation_chart_edit->Tablet16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet17->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet17->caption(), $ivf_stimulation_chart_edit->Tablet17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet18->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet18->caption(), $ivf_stimulation_chart_edit->Tablet18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet19->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet19->caption(), $ivf_stimulation_chart_edit->Tablet19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet20->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet20->caption(), $ivf_stimulation_chart_edit->Tablet20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet21->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet21->caption(), $ivf_stimulation_chart_edit->Tablet21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet22->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet22->caption(), $ivf_stimulation_chart_edit->Tablet22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet23->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet23->caption(), $ivf_stimulation_chart_edit->Tablet23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet24->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet24->caption(), $ivf_stimulation_chart_edit->Tablet24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Tablet25->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Tablet25->caption(), $ivf_stimulation_chart_edit->Tablet25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH14->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH14->caption(), $ivf_stimulation_chart_edit->RFSH14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH15->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH15->caption(), $ivf_stimulation_chart_edit->RFSH15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH16->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH16->caption(), $ivf_stimulation_chart_edit->RFSH16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH17->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH17->caption(), $ivf_stimulation_chart_edit->RFSH17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH18->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH18->caption(), $ivf_stimulation_chart_edit->RFSH18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH19->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH19->caption(), $ivf_stimulation_chart_edit->RFSH19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH20->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH20->caption(), $ivf_stimulation_chart_edit->RFSH20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH21->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH21->caption(), $ivf_stimulation_chart_edit->RFSH21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH22->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH22->caption(), $ivf_stimulation_chart_edit->RFSH22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH23->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH23->caption(), $ivf_stimulation_chart_edit->RFSH23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH24->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH24->caption(), $ivf_stimulation_chart_edit->RFSH24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->RFSH25->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->RFSH25->caption(), $ivf_stimulation_chart_edit->RFSH25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG14->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG14->caption(), $ivf_stimulation_chart_edit->HMG14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG15->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG15->caption(), $ivf_stimulation_chart_edit->HMG15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG16->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG16->caption(), $ivf_stimulation_chart_edit->HMG16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG17->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG17->caption(), $ivf_stimulation_chart_edit->HMG17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG18->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG18->caption(), $ivf_stimulation_chart_edit->HMG18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG19->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG19->caption(), $ivf_stimulation_chart_edit->HMG19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG20->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG20->caption(), $ivf_stimulation_chart_edit->HMG20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG21->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG21->caption(), $ivf_stimulation_chart_edit->HMG21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG22->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG22->caption(), $ivf_stimulation_chart_edit->HMG22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG23->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG23->caption(), $ivf_stimulation_chart_edit->HMG23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG24->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG24->caption(), $ivf_stimulation_chart_edit->HMG24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HMG25->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HMG25->caption(), $ivf_stimulation_chart_edit->HMG25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH14->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH14->caption(), $ivf_stimulation_chart_edit->GnRH14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH15->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH15->caption(), $ivf_stimulation_chart_edit->GnRH15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH16->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH16->caption(), $ivf_stimulation_chart_edit->GnRH16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH17->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH17->caption(), $ivf_stimulation_chart_edit->GnRH17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH18->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH18->caption(), $ivf_stimulation_chart_edit->GnRH18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH19->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH19->caption(), $ivf_stimulation_chart_edit->GnRH19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH20->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH20->caption(), $ivf_stimulation_chart_edit->GnRH20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH21->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH21->caption(), $ivf_stimulation_chart_edit->GnRH21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH22->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH22->caption(), $ivf_stimulation_chart_edit->GnRH22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH23->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH23->caption(), $ivf_stimulation_chart_edit->GnRH23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH24->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH24->caption(), $ivf_stimulation_chart_edit->GnRH24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->GnRH25->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->GnRH25->caption(), $ivf_stimulation_chart_edit->GnRH25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P414->Required) { ?>
				elm = this.getElements("x" + infix + "_P414");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P414->caption(), $ivf_stimulation_chart_edit->P414->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P415->Required) { ?>
				elm = this.getElements("x" + infix + "_P415");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P415->caption(), $ivf_stimulation_chart_edit->P415->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P416->Required) { ?>
				elm = this.getElements("x" + infix + "_P416");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P416->caption(), $ivf_stimulation_chart_edit->P416->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P417->Required) { ?>
				elm = this.getElements("x" + infix + "_P417");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P417->caption(), $ivf_stimulation_chart_edit->P417->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P418->Required) { ?>
				elm = this.getElements("x" + infix + "_P418");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P418->caption(), $ivf_stimulation_chart_edit->P418->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P419->Required) { ?>
				elm = this.getElements("x" + infix + "_P419");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P419->caption(), $ivf_stimulation_chart_edit->P419->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P420->Required) { ?>
				elm = this.getElements("x" + infix + "_P420");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P420->caption(), $ivf_stimulation_chart_edit->P420->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P421->Required) { ?>
				elm = this.getElements("x" + infix + "_P421");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P421->caption(), $ivf_stimulation_chart_edit->P421->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P422->Required) { ?>
				elm = this.getElements("x" + infix + "_P422");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P422->caption(), $ivf_stimulation_chart_edit->P422->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P423->Required) { ?>
				elm = this.getElements("x" + infix + "_P423");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P423->caption(), $ivf_stimulation_chart_edit->P423->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P424->Required) { ?>
				elm = this.getElements("x" + infix + "_P424");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P424->caption(), $ivf_stimulation_chart_edit->P424->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->P425->Required) { ?>
				elm = this.getElements("x" + infix + "_P425");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->P425->caption(), $ivf_stimulation_chart_edit->P425->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt14->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt14->caption(), $ivf_stimulation_chart_edit->USGRt14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt15->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt15->caption(), $ivf_stimulation_chart_edit->USGRt15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt16->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt16->caption(), $ivf_stimulation_chart_edit->USGRt16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt17->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt17->caption(), $ivf_stimulation_chart_edit->USGRt17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt18->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt18->caption(), $ivf_stimulation_chart_edit->USGRt18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt19->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt19->caption(), $ivf_stimulation_chart_edit->USGRt19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt20->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt20->caption(), $ivf_stimulation_chart_edit->USGRt20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt21->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt21->caption(), $ivf_stimulation_chart_edit->USGRt21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt22->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt22->caption(), $ivf_stimulation_chart_edit->USGRt22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt23->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt23->caption(), $ivf_stimulation_chart_edit->USGRt23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt24->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt24->caption(), $ivf_stimulation_chart_edit->USGRt24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGRt25->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGRt25->caption(), $ivf_stimulation_chart_edit->USGRt25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt14->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt14->caption(), $ivf_stimulation_chart_edit->USGLt14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt15->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt15->caption(), $ivf_stimulation_chart_edit->USGLt15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt16->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt16->caption(), $ivf_stimulation_chart_edit->USGLt16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt17->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt17->caption(), $ivf_stimulation_chart_edit->USGLt17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt18->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt18->caption(), $ivf_stimulation_chart_edit->USGLt18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt19->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt19->caption(), $ivf_stimulation_chart_edit->USGLt19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt20->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt20->caption(), $ivf_stimulation_chart_edit->USGLt20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt21->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt21->caption(), $ivf_stimulation_chart_edit->USGLt21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt22->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt22->caption(), $ivf_stimulation_chart_edit->USGLt22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt23->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt23->caption(), $ivf_stimulation_chart_edit->USGLt23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt24->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt24->caption(), $ivf_stimulation_chart_edit->USGLt24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->USGLt25->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->USGLt25->caption(), $ivf_stimulation_chart_edit->USGLt25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM14->Required) { ?>
				elm = this.getElements("x" + infix + "_EM14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM14->caption(), $ivf_stimulation_chart_edit->EM14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM15->Required) { ?>
				elm = this.getElements("x" + infix + "_EM15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM15->caption(), $ivf_stimulation_chart_edit->EM15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM16->Required) { ?>
				elm = this.getElements("x" + infix + "_EM16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM16->caption(), $ivf_stimulation_chart_edit->EM16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM17->Required) { ?>
				elm = this.getElements("x" + infix + "_EM17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM17->caption(), $ivf_stimulation_chart_edit->EM17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM18->Required) { ?>
				elm = this.getElements("x" + infix + "_EM18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM18->caption(), $ivf_stimulation_chart_edit->EM18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM19->Required) { ?>
				elm = this.getElements("x" + infix + "_EM19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM19->caption(), $ivf_stimulation_chart_edit->EM19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM20->Required) { ?>
				elm = this.getElements("x" + infix + "_EM20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM20->caption(), $ivf_stimulation_chart_edit->EM20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM21->Required) { ?>
				elm = this.getElements("x" + infix + "_EM21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM21->caption(), $ivf_stimulation_chart_edit->EM21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM22->Required) { ?>
				elm = this.getElements("x" + infix + "_EM22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM22->caption(), $ivf_stimulation_chart_edit->EM22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM23->Required) { ?>
				elm = this.getElements("x" + infix + "_EM23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM23->caption(), $ivf_stimulation_chart_edit->EM23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM24->Required) { ?>
				elm = this.getElements("x" + infix + "_EM24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM24->caption(), $ivf_stimulation_chart_edit->EM24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EM25->Required) { ?>
				elm = this.getElements("x" + infix + "_EM25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EM25->caption(), $ivf_stimulation_chart_edit->EM25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others14->Required) { ?>
				elm = this.getElements("x" + infix + "_Others14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others14->caption(), $ivf_stimulation_chart_edit->Others14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others15->Required) { ?>
				elm = this.getElements("x" + infix + "_Others15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others15->caption(), $ivf_stimulation_chart_edit->Others15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others16->Required) { ?>
				elm = this.getElements("x" + infix + "_Others16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others16->caption(), $ivf_stimulation_chart_edit->Others16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others17->Required) { ?>
				elm = this.getElements("x" + infix + "_Others17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others17->caption(), $ivf_stimulation_chart_edit->Others17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others18->Required) { ?>
				elm = this.getElements("x" + infix + "_Others18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others18->caption(), $ivf_stimulation_chart_edit->Others18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others19->Required) { ?>
				elm = this.getElements("x" + infix + "_Others19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others19->caption(), $ivf_stimulation_chart_edit->Others19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others20->Required) { ?>
				elm = this.getElements("x" + infix + "_Others20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others20->caption(), $ivf_stimulation_chart_edit->Others20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others21->Required) { ?>
				elm = this.getElements("x" + infix + "_Others21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others21->caption(), $ivf_stimulation_chart_edit->Others21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others22->Required) { ?>
				elm = this.getElements("x" + infix + "_Others22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others22->caption(), $ivf_stimulation_chart_edit->Others22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others23->Required) { ?>
				elm = this.getElements("x" + infix + "_Others23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others23->caption(), $ivf_stimulation_chart_edit->Others23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others24->Required) { ?>
				elm = this.getElements("x" + infix + "_Others24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others24->caption(), $ivf_stimulation_chart_edit->Others24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->Others25->Required) { ?>
				elm = this.getElements("x" + infix + "_Others25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->Others25->caption(), $ivf_stimulation_chart_edit->Others25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR14->Required) { ?>
				elm = this.getElements("x" + infix + "_DR14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR14->caption(), $ivf_stimulation_chart_edit->DR14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR15->Required) { ?>
				elm = this.getElements("x" + infix + "_DR15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR15->caption(), $ivf_stimulation_chart_edit->DR15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR16->Required) { ?>
				elm = this.getElements("x" + infix + "_DR16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR16->caption(), $ivf_stimulation_chart_edit->DR16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR17->Required) { ?>
				elm = this.getElements("x" + infix + "_DR17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR17->caption(), $ivf_stimulation_chart_edit->DR17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR18->Required) { ?>
				elm = this.getElements("x" + infix + "_DR18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR18->caption(), $ivf_stimulation_chart_edit->DR18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR19->Required) { ?>
				elm = this.getElements("x" + infix + "_DR19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR19->caption(), $ivf_stimulation_chart_edit->DR19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR20->Required) { ?>
				elm = this.getElements("x" + infix + "_DR20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR20->caption(), $ivf_stimulation_chart_edit->DR20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR21->Required) { ?>
				elm = this.getElements("x" + infix + "_DR21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR21->caption(), $ivf_stimulation_chart_edit->DR21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR22->Required) { ?>
				elm = this.getElements("x" + infix + "_DR22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR22->caption(), $ivf_stimulation_chart_edit->DR22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR23->Required) { ?>
				elm = this.getElements("x" + infix + "_DR23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR23->caption(), $ivf_stimulation_chart_edit->DR23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR24->Required) { ?>
				elm = this.getElements("x" + infix + "_DR24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR24->caption(), $ivf_stimulation_chart_edit->DR24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DR25->Required) { ?>
				elm = this.getElements("x" + infix + "_DR25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DR25->caption(), $ivf_stimulation_chart_edit->DR25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E214->Required) { ?>
				elm = this.getElements("x" + infix + "_E214");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E214->caption(), $ivf_stimulation_chart_edit->E214->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E215->Required) { ?>
				elm = this.getElements("x" + infix + "_E215");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E215->caption(), $ivf_stimulation_chart_edit->E215->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E216->Required) { ?>
				elm = this.getElements("x" + infix + "_E216");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E216->caption(), $ivf_stimulation_chart_edit->E216->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E217->Required) { ?>
				elm = this.getElements("x" + infix + "_E217");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E217->caption(), $ivf_stimulation_chart_edit->E217->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E218->Required) { ?>
				elm = this.getElements("x" + infix + "_E218");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E218->caption(), $ivf_stimulation_chart_edit->E218->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E219->Required) { ?>
				elm = this.getElements("x" + infix + "_E219");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E219->caption(), $ivf_stimulation_chart_edit->E219->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E220->Required) { ?>
				elm = this.getElements("x" + infix + "_E220");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E220->caption(), $ivf_stimulation_chart_edit->E220->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E221->Required) { ?>
				elm = this.getElements("x" + infix + "_E221");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E221->caption(), $ivf_stimulation_chart_edit->E221->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E222->Required) { ?>
				elm = this.getElements("x" + infix + "_E222");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E222->caption(), $ivf_stimulation_chart_edit->E222->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E223->Required) { ?>
				elm = this.getElements("x" + infix + "_E223");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E223->caption(), $ivf_stimulation_chart_edit->E223->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E224->Required) { ?>
				elm = this.getElements("x" + infix + "_E224");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E224->caption(), $ivf_stimulation_chart_edit->E224->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->E225->Required) { ?>
				elm = this.getElements("x" + infix + "_E225");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->E225->caption(), $ivf_stimulation_chart_edit->E225->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EEETTTDTE->Required) { ?>
				elm = this.getElements("x" + infix + "_EEETTTDTE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EEETTTDTE->caption(), $ivf_stimulation_chart_edit->EEETTTDTE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EEETTTDTE");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->EEETTTDTE->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->bhcgdate->Required) { ?>
				elm = this.getElements("x" + infix + "_bhcgdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->bhcgdate->caption(), $ivf_stimulation_chart_edit->bhcgdate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bhcgdate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->bhcgdate->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_edit->TUBAL_PATENCY->Required) { ?>
				elm = this.getElements("x" + infix + "_TUBAL_PATENCY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TUBAL_PATENCY->caption(), $ivf_stimulation_chart_edit->TUBAL_PATENCY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->HSG->Required) { ?>
				elm = this.getElements("x" + infix + "_HSG");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->HSG->caption(), $ivf_stimulation_chart_edit->HSG->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->DHL->Required) { ?>
				elm = this.getElements("x" + infix + "_DHL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->DHL->caption(), $ivf_stimulation_chart_edit->DHL->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->UTERINE_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_UTERINE_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->caption(), $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->W_COMORBIDS->Required) { ?>
				elm = this.getElements("x" + infix + "_W_COMORBIDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->W_COMORBIDS->caption(), $ivf_stimulation_chart_edit->W_COMORBIDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->H_COMORBIDS->Required) { ?>
				elm = this.getElements("x" + infix + "_H_COMORBIDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->H_COMORBIDS->caption(), $ivf_stimulation_chart_edit->H_COMORBIDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->Required) { ?>
				elm = this.getElements("x" + infix + "_SEXUAL_DYSFUNCTION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->caption(), $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->TABLETS->Required) { ?>
				elm = this.getElements("x" + infix + "_TABLETS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->TABLETS->caption(), $ivf_stimulation_chart_edit->TABLETS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->FOLLICLE_STATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_FOLLICLE_STATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->FOLLICLE_STATUS->caption(), $ivf_stimulation_chart_edit->FOLLICLE_STATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->NUMBER_OF_IUI->Required) { ?>
				elm = this.getElements("x" + infix + "_NUMBER_OF_IUI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->NUMBER_OF_IUI->caption(), $ivf_stimulation_chart_edit->NUMBER_OF_IUI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->PROCEDURE->Required) { ?>
				elm = this.getElements("x" + infix + "_PROCEDURE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->PROCEDURE->caption(), $ivf_stimulation_chart_edit->PROCEDURE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->LUTEAL_SUPPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_LUTEAL_SUPPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->caption(), $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_MATERNAL_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->caption(), $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->ONGOING_PREG->Required) { ?>
				elm = this.getElements("x" + infix + "_ONGOING_PREG");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->ONGOING_PREG->caption(), $ivf_stimulation_chart_edit->ONGOING_PREG->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_edit->EDD_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_EDD_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_edit->EDD_Date->caption(), $ivf_stimulation_chart_edit->EDD_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EDD_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_edit->EDD_Date->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fivf_stimulation_chartedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_stimulation_chartedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_stimulation_chartedit.lists["x_ARTCycle"] = <?php echo $ivf_stimulation_chart_edit->ARTCycle->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ARTCycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_FemaleFactor"] = <?php echo $ivf_stimulation_chart_edit->FemaleFactor->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_FemaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->FemaleFactor->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_MaleFactor"] = <?php echo $ivf_stimulation_chart_edit->MaleFactor->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_MaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->MaleFactor->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_Protocol"] = <?php echo $ivf_stimulation_chart_edit->Protocol->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Protocol->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_SemenFrozen"] = <?php echo $ivf_stimulation_chart_edit->SemenFrozen->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_SemenFrozen"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->SemenFrozen->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_A4ICSICycle"] = <?php echo $ivf_stimulation_chart_edit->A4ICSICycle->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_A4ICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->A4ICSICycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_TotalICSICycle"] = <?php echo $ivf_stimulation_chart_edit->TotalICSICycle->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TotalICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TotalICSICycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_TypeOfInfertility"] = <?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TypeOfInfertility"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TypeOfInfertility->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_INJTYPE"] = <?php echo $ivf_stimulation_chart_edit->INJTYPE->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_INJTYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->INJTYPE->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_ANTAGONISTSTARTDAY"] = <?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ANTAGONISTSTARTDAY"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_PRETREATMENT"] = <?php echo $ivf_stimulation_chart_edit->PRETREATMENT->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_PRETREATMENT"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->PRETREATMENT->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_MedicalFactors"] = <?php echo $ivf_stimulation_chart_edit->MedicalFactors->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_MedicalFactors"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->MedicalFactors->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_TRIGGERR"] = <?php echo $ivf_stimulation_chart_edit->TRIGGERR->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TRIGGERR"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TRIGGERR->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_ALLFREEZEINDICATION"] = <?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ALLFREEZEINDICATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ALLFREEZEINDICATION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_ERA"] = <?php echo $ivf_stimulation_chart_edit->ERA->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ERA"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ERA->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_ET"] = <?php echo $ivf_stimulation_chart_edit->ET->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ET"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ET->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_SEMENPREPARATION"] = <?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_SEMENPREPARATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->SEMENPREPARATION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_REASONFORESET"] = <?php echo $ivf_stimulation_chart_edit->REASONFORESET->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_REASONFORESET"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->REASONFORESET->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet1"] = <?php echo $ivf_stimulation_chart_edit->Tablet1->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet1"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet1->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet2"] = <?php echo $ivf_stimulation_chart_edit->Tablet2->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet2"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet2->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet3"] = <?php echo $ivf_stimulation_chart_edit->Tablet3->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet3"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet3->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet4"] = <?php echo $ivf_stimulation_chart_edit->Tablet4->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet4"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet4->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet5"] = <?php echo $ivf_stimulation_chart_edit->Tablet5->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet5"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet5->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet6"] = <?php echo $ivf_stimulation_chart_edit->Tablet6->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet6"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet6->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet7"] = <?php echo $ivf_stimulation_chart_edit->Tablet7->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet7"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet7->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet8"] = <?php echo $ivf_stimulation_chart_edit->Tablet8->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet8"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet8->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet9"] = <?php echo $ivf_stimulation_chart_edit->Tablet9->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet9"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet9->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet10"] = <?php echo $ivf_stimulation_chart_edit->Tablet10->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet10"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet10->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet11"] = <?php echo $ivf_stimulation_chart_edit->Tablet11->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet11"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet11->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet12"] = <?php echo $ivf_stimulation_chart_edit->Tablet12->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet12"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet12->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet13"] = <?php echo $ivf_stimulation_chart_edit->Tablet13->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet13"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet13->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH1"] = <?php echo $ivf_stimulation_chart_edit->RFSH1->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH1->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH2"] = <?php echo $ivf_stimulation_chart_edit->RFSH2->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH2->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH3"] = <?php echo $ivf_stimulation_chart_edit->RFSH3->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH3->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH4"] = <?php echo $ivf_stimulation_chart_edit->RFSH4->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH4->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH5"] = <?php echo $ivf_stimulation_chart_edit->RFSH5->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH5->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH6"] = <?php echo $ivf_stimulation_chart_edit->RFSH6->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH6->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH7"] = <?php echo $ivf_stimulation_chart_edit->RFSH7->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH7->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH8"] = <?php echo $ivf_stimulation_chart_edit->RFSH8->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH8->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH9"] = <?php echo $ivf_stimulation_chart_edit->RFSH9->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH9->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH10"] = <?php echo $ivf_stimulation_chart_edit->RFSH10->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH10->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH11"] = <?php echo $ivf_stimulation_chart_edit->RFSH11->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH11->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH12"] = <?php echo $ivf_stimulation_chart_edit->RFSH12->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH12->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH13"] = <?php echo $ivf_stimulation_chart_edit->RFSH13->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH13->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG1"] = <?php echo $ivf_stimulation_chart_edit->HMG1->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG1"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG1->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG2"] = <?php echo $ivf_stimulation_chart_edit->HMG2->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG2"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG2->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG3"] = <?php echo $ivf_stimulation_chart_edit->HMG3->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG3"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG3->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG4"] = <?php echo $ivf_stimulation_chart_edit->HMG4->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG4"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG4->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG5"] = <?php echo $ivf_stimulation_chart_edit->HMG5->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG5"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG5->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG6"] = <?php echo $ivf_stimulation_chart_edit->HMG6->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG6"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG6->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG7"] = <?php echo $ivf_stimulation_chart_edit->HMG7->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG7"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG7->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG8"] = <?php echo $ivf_stimulation_chart_edit->HMG8->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG8"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG8->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG9"] = <?php echo $ivf_stimulation_chart_edit->HMG9->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG9"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG9->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG10"] = <?php echo $ivf_stimulation_chart_edit->HMG10->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG10"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG10->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG11"] = <?php echo $ivf_stimulation_chart_edit->HMG11->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG11"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG11->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG12"] = <?php echo $ivf_stimulation_chart_edit->HMG12->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG12"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG12->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG13"] = <?php echo $ivf_stimulation_chart_edit->HMG13->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG13"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG13->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH1"] = <?php echo $ivf_stimulation_chart_edit->GnRH1->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH1->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH2"] = <?php echo $ivf_stimulation_chart_edit->GnRH2->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH2->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH3"] = <?php echo $ivf_stimulation_chart_edit->GnRH3->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH3->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH4"] = <?php echo $ivf_stimulation_chart_edit->GnRH4->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH4->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH5"] = <?php echo $ivf_stimulation_chart_edit->GnRH5->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH5->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH6"] = <?php echo $ivf_stimulation_chart_edit->GnRH6->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH6->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH7"] = <?php echo $ivf_stimulation_chart_edit->GnRH7->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH7->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH8"] = <?php echo $ivf_stimulation_chart_edit->GnRH8->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH8->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH9"] = <?php echo $ivf_stimulation_chart_edit->GnRH9->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH9->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH10"] = <?php echo $ivf_stimulation_chart_edit->GnRH10->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH10->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH11"] = <?php echo $ivf_stimulation_chart_edit->GnRH11->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH11->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH12"] = <?php echo $ivf_stimulation_chart_edit->GnRH12->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH12->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH13"] = <?php echo $ivf_stimulation_chart_edit->GnRH13->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH13->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Convert[]"] = <?php echo $ivf_stimulation_chart_edit->Convert->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Convert[]"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Convert->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_InseminatinTechnique"] = <?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->InseminatinTechnique->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_IndicationForART"] = <?php echo $ivf_stimulation_chart_edit->IndicationForART->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_IndicationForART"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->IndicationForART->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_Hysteroscopy"] = <?php echo $ivf_stimulation_chart_edit->Hysteroscopy->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Hysteroscopy->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_EndometrialScratching"] = <?php echo $ivf_stimulation_chart_edit->EndometrialScratching->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->EndometrialScratching->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_TrialCannulation"] = <?php echo $ivf_stimulation_chart_edit->TrialCannulation->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TrialCannulation->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_CYCLETYPE"] = <?php echo $ivf_stimulation_chart_edit->CYCLETYPE->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->CYCLETYPE->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_OralEstrogenDosage"] = <?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_GCSF"] = <?php echo $ivf_stimulation_chart_edit->GCSF->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GCSF->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_ActivatedPRP"] = <?php echo $ivf_stimulation_chart_edit->ActivatedPRP->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->ActivatedPRP->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_AllFreeze"] = <?php echo $ivf_stimulation_chart_edit->AllFreeze->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_AllFreeze"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->AllFreeze->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_TreatmentCancel"] = <?php echo $ivf_stimulation_chart_edit->TreatmentCancel->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TreatmentCancel"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TreatmentCancel->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_Projectron"] = <?php echo $ivf_stimulation_chart_edit->Projectron->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Projectron"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Projectron->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet14"] = <?php echo $ivf_stimulation_chart_edit->Tablet14->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet14"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet14->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet15"] = <?php echo $ivf_stimulation_chart_edit->Tablet15->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet15"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet15->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet16"] = <?php echo $ivf_stimulation_chart_edit->Tablet16->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet16"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet16->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet17"] = <?php echo $ivf_stimulation_chart_edit->Tablet17->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet17"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet17->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet18"] = <?php echo $ivf_stimulation_chart_edit->Tablet18->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet18"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet18->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet19"] = <?php echo $ivf_stimulation_chart_edit->Tablet19->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet19"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet19->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet20"] = <?php echo $ivf_stimulation_chart_edit->Tablet20->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet20"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet20->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet21"] = <?php echo $ivf_stimulation_chart_edit->Tablet21->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet21"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet21->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet22"] = <?php echo $ivf_stimulation_chart_edit->Tablet22->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet22"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet22->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet23"] = <?php echo $ivf_stimulation_chart_edit->Tablet23->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet23"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet23->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet24"] = <?php echo $ivf_stimulation_chart_edit->Tablet24->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet24"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet24->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet25"] = <?php echo $ivf_stimulation_chart_edit->Tablet25->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_Tablet25"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->Tablet25->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH14"] = <?php echo $ivf_stimulation_chart_edit->RFSH14->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH14->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH15"] = <?php echo $ivf_stimulation_chart_edit->RFSH15->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH15->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH16"] = <?php echo $ivf_stimulation_chart_edit->RFSH16->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH16->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH17"] = <?php echo $ivf_stimulation_chart_edit->RFSH17->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH17->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH18"] = <?php echo $ivf_stimulation_chart_edit->RFSH18->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH18->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH19"] = <?php echo $ivf_stimulation_chart_edit->RFSH19->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH19->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH20"] = <?php echo $ivf_stimulation_chart_edit->RFSH20->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH20->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH21"] = <?php echo $ivf_stimulation_chart_edit->RFSH21->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH21->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH22"] = <?php echo $ivf_stimulation_chart_edit->RFSH22->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH22->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH23"] = <?php echo $ivf_stimulation_chart_edit->RFSH23->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH23->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH24"] = <?php echo $ivf_stimulation_chart_edit->RFSH24->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH24->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH25"] = <?php echo $ivf_stimulation_chart_edit->RFSH25->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_RFSH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->RFSH25->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG14"] = <?php echo $ivf_stimulation_chart_edit->HMG14->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG14"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG14->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG15"] = <?php echo $ivf_stimulation_chart_edit->HMG15->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG15"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG15->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG16"] = <?php echo $ivf_stimulation_chart_edit->HMG16->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG16"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG16->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG17"] = <?php echo $ivf_stimulation_chart_edit->HMG17->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG17"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG17->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG18"] = <?php echo $ivf_stimulation_chart_edit->HMG18->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG18"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG18->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG19"] = <?php echo $ivf_stimulation_chart_edit->HMG19->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG19"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG19->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG20"] = <?php echo $ivf_stimulation_chart_edit->HMG20->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG20"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG20->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG21"] = <?php echo $ivf_stimulation_chart_edit->HMG21->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG21"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG21->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG22"] = <?php echo $ivf_stimulation_chart_edit->HMG22->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG22"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG22->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG23"] = <?php echo $ivf_stimulation_chart_edit->HMG23->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG23"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG23->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG24"] = <?php echo $ivf_stimulation_chart_edit->HMG24->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG24"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG24->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_HMG25"] = <?php echo $ivf_stimulation_chart_edit->HMG25->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HMG25"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HMG25->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH14"] = <?php echo $ivf_stimulation_chart_edit->GnRH14->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH14->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH15"] = <?php echo $ivf_stimulation_chart_edit->GnRH15->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH15->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH16"] = <?php echo $ivf_stimulation_chart_edit->GnRH16->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH16->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH17"] = <?php echo $ivf_stimulation_chart_edit->GnRH17->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH17->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH18"] = <?php echo $ivf_stimulation_chart_edit->GnRH18->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH18->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH19"] = <?php echo $ivf_stimulation_chart_edit->GnRH19->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH19->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH20"] = <?php echo $ivf_stimulation_chart_edit->GnRH20->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH20->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH21"] = <?php echo $ivf_stimulation_chart_edit->GnRH21->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH21->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH22"] = <?php echo $ivf_stimulation_chart_edit->GnRH22->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH22->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH23"] = <?php echo $ivf_stimulation_chart_edit->GnRH23->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH23->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH24"] = <?php echo $ivf_stimulation_chart_edit->GnRH24->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH24->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH25"] = <?php echo $ivf_stimulation_chart_edit->GnRH25->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_GnRH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->GnRH25->lookupOptions()) ?>;
	fivf_stimulation_chartedit.lists["x_TUBAL_PATENCY"] = <?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_TUBAL_PATENCY"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->TUBAL_PATENCY->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_HSG"] = <?php echo $ivf_stimulation_chart_edit->HSG->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_HSG"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->HSG->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_DHL"] = <?php echo $ivf_stimulation_chart_edit->DHL->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_DHL"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->DHL->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_UTERINE_PROBLEMS"] = <?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_UTERINE_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->UTERINE_PROBLEMS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_W_COMORBIDS"] = <?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_W_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->W_COMORBIDS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_H_COMORBIDS"] = <?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_H_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->H_COMORBIDS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_SEXUAL_DYSFUNCTION"] = <?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_SEXUAL_DYSFUNCTION"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_FOLLICLE_STATUS"] = <?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_FOLLICLE_STATUS"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->FOLLICLE_STATUS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_NUMBER_OF_IUI"] = <?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_NUMBER_OF_IUI"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->NUMBER_OF_IUI->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_PROCEDURE"] = <?php echo $ivf_stimulation_chart_edit->PROCEDURE->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_PROCEDURE"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->PROCEDURE->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_LUTEAL_SUPPORT"] = <?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_LUTEAL_SUPPORT"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->LUTEAL_SUPPORT->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartedit.lists["x_SPECIFIC_MATERNAL_PROBLEMS"] = <?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->Lookup->toClientList($ivf_stimulation_chart_edit) ?>;
	fivf_stimulation_chartedit.lists["x_SPECIFIC_MATERNAL_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_stimulation_chartedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_stimulation_chart_edit->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_edit->showMessage();
?>
<form name="fivf_stimulation_chartedit" id="fivf_stimulation_chartedit" class="<?php echo $ivf_stimulation_chart_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_chart_edit->IsModal ?>">
<?php if ($ivf_stimulation_chart->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_stimulation_chart_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_stimulation_chart_id" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_id" type="text/html"><?php echo $ivf_stimulation_chart_edit->id->caption() ?><?php echo $ivf_stimulation_chart_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->id->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_id" type="text/html"><span id="el_ivf_stimulation_chart_id">
<span<?php echo $ivf_stimulation_chart_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf_stimulation_chart" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->id->CurrentValue) ?>">
<?php echo $ivf_stimulation_chart_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RIDNo" type="text/html"><?php echo $ivf_stimulation_chart_edit->RIDNo->caption() ?><?php echo $ivf_stimulation_chart_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RIDNo->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_edit->RIDNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_RIDNo" type="text/html"><span id="el_ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart_edit->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_edit->RIDNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_RIDNo" type="text/html"><span id="el_ivf_stimulation_chart_RIDNo">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->RIDNo->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->RIDNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Name" for="x_Name" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Name" type="text/html"><?php echo $ivf_stimulation_chart_edit->Name->caption() ?><?php echo $ivf_stimulation_chart_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Name->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_edit->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_Name" type="text/html"><span id="el_ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart_edit->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_edit->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_Name" type="text/html"><span id="el_ivf_stimulation_chart_Name">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Name->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ARTCycle" type="text/html"><?php echo $ivf_stimulation_chart_edit->ARTCycle->caption() ?><?php echo $ivf_stimulation_chart_edit->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ARTCycle" type="text/html"><span id="el_ivf_stimulation_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ARTCycle->displayValueSeparatorAttribute() ?>" id="x_ARTCycle" name="x_ARTCycle"<?php echo $ivf_stimulation_chart_edit->ARTCycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->FemaleFactor->Visible) { // FemaleFactor ?>
	<div id="r_FemaleFactor" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FemaleFactor" for="x_FemaleFactor" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FemaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_edit->FemaleFactor->caption() ?><?php echo $ivf_stimulation_chart_edit->FemaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->FemaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FemaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_FemaleFactor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_FemaleFactor" data-value-separator="<?php echo $ivf_stimulation_chart_edit->FemaleFactor->displayValueSeparatorAttribute() ?>" id="x_FemaleFactor" name="x_FemaleFactor"<?php echo $ivf_stimulation_chart_edit->FemaleFactor->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->FemaleFactor->selectOptionListHtml("x_FemaleFactor") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->FemaleFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->MaleFactor->Visible) { // MaleFactor ?>
	<div id="r_MaleFactor" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MaleFactor" for="x_MaleFactor" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_edit->MaleFactor->caption() ?><?php echo $ivf_stimulation_chart_edit->MaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->MaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_MaleFactor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_MaleFactor" data-value-separator="<?php echo $ivf_stimulation_chart_edit->MaleFactor->displayValueSeparatorAttribute() ?>" id="x_MaleFactor" name="x_MaleFactor"<?php echo $ivf_stimulation_chart_edit->MaleFactor->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->MaleFactor->selectOptionListHtml("x_MaleFactor") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->MaleFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Protocol->Visible) { // Protocol ?>
	<div id="r_Protocol" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Protocol" for="x_Protocol" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Protocol" type="text/html"><?php echo $ivf_stimulation_chart_edit->Protocol->caption() ?><?php echo $ivf_stimulation_chart_edit->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Protocol" type="text/html"><span id="el_ivf_stimulation_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Protocol->displayValueSeparatorAttribute() ?>" id="x_Protocol" name="x_Protocol"<?php echo $ivf_stimulation_chart_edit->Protocol->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Protocol->selectOptionListHtml("x_Protocol") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Protocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SemenFrozen->Visible) { // SemenFrozen ?>
	<div id="r_SemenFrozen" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SemenFrozen" for="x_SemenFrozen" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SemenFrozen" type="text/html"><?php echo $ivf_stimulation_chart_edit->SemenFrozen->caption() ?><?php echo $ivf_stimulation_chart_edit->SemenFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SemenFrozen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SemenFrozen" type="text/html"><span id="el_ivf_stimulation_chart_SemenFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SemenFrozen" data-value-separator="<?php echo $ivf_stimulation_chart_edit->SemenFrozen->displayValueSeparatorAttribute() ?>" id="x_SemenFrozen" name="x_SemenFrozen"<?php echo $ivf_stimulation_chart_edit->SemenFrozen->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->SemenFrozen->selectOptionListHtml("x_SemenFrozen") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->SemenFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<div id="r_A4ICSICycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_A4ICSICycle" for="x_A4ICSICycle" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_A4ICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_edit->A4ICSICycle->caption() ?><?php echo $ivf_stimulation_chart_edit->A4ICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->A4ICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_A4ICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_A4ICSICycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_A4ICSICycle" data-value-separator="<?php echo $ivf_stimulation_chart_edit->A4ICSICycle->displayValueSeparatorAttribute() ?>" id="x_A4ICSICycle" name="x_A4ICSICycle"<?php echo $ivf_stimulation_chart_edit->A4ICSICycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->A4ICSICycle->selectOptionListHtml("x_A4ICSICycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->A4ICSICycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<div id="r_TotalICSICycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TotalICSICycle" for="x_TotalICSICycle" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TotalICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_edit->TotalICSICycle->caption() ?><?php echo $ivf_stimulation_chart_edit->TotalICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TotalICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TotalICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_TotalICSICycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TotalICSICycle" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TotalICSICycle->displayValueSeparatorAttribute() ?>" id="x_TotalICSICycle" name="x_TotalICSICycle"<?php echo $ivf_stimulation_chart_edit->TotalICSICycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->TotalICSICycle->selectOptionListHtml("x_TotalICSICycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TotalICSICycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<div id="r_TypeOfInfertility" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TypeOfInfertility" for="x_TypeOfInfertility" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->caption() ?><?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><span id="el_ivf_stimulation_chart_TypeOfInfertility">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TypeOfInfertility" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->displayValueSeparatorAttribute() ?>" id="x_TypeOfInfertility" name="x_TypeOfInfertility"<?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->selectOptionListHtml("x_TypeOfInfertility") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TypeOfInfertility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Duration" for="x_Duration" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Duration" type="text/html"><?php echo $ivf_stimulation_chart_edit->Duration->caption() ?><?php echo $ivf_stimulation_chart_edit->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Duration->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Duration" type="text/html"><span id="el_ivf_stimulation_chart_Duration">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Duration->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Duration->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Duration->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_ivf_stimulation_chart_LMP" for="x_LMP" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_LMP" type="text/html"><?php echo $ivf_stimulation_chart_edit->LMP->caption() ?><?php echo $ivf_stimulation_chart_edit->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->LMP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LMP" type="text/html"><span id="el_ivf_stimulation_chart_LMP">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->LMP->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->LMP->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->LMP->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->LMP->ReadOnly && !$ivf_stimulation_chart_edit->LMP->Disabled && !isset($ivf_stimulation_chart_edit->LMP->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RelevantHistory->Visible) { // RelevantHistory ?>
	<div id="r_RelevantHistory" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RelevantHistory" for="x_RelevantHistory" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RelevantHistory" type="text/html"><?php echo $ivf_stimulation_chart_edit->RelevantHistory->caption() ?><?php echo $ivf_stimulation_chart_edit->RelevantHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RelevantHistory->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RelevantHistory" type="text/html"><span id="el_ivf_stimulation_chart_RelevantHistory">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_RelevantHistory" name="x_RelevantHistory" id="x_RelevantHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->RelevantHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->RelevantHistory->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->RelevantHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RelevantHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->IUICycles->Visible) { // IUICycles ?>
	<div id="r_IUICycles" class="form-group row">
		<label id="elh_ivf_stimulation_chart_IUICycles" for="x_IUICycles" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_IUICycles" type="text/html"><?php echo $ivf_stimulation_chart_edit->IUICycles->caption() ?><?php echo $ivf_stimulation_chart_edit->IUICycles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->IUICycles->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IUICycles" type="text/html"><span id="el_ivf_stimulation_chart_IUICycles">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_IUICycles" name="x_IUICycles" id="x_IUICycles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->IUICycles->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->IUICycles->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->IUICycles->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->IUICycles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->AFC->Visible) { // AFC ?>
	<div id="r_AFC" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AFC" for="x_AFC" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AFC" type="text/html"><?php echo $ivf_stimulation_chart_edit->AFC->caption() ?><?php echo $ivf_stimulation_chart_edit->AFC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->AFC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AFC" type="text/html"><span id="el_ivf_stimulation_chart_AFC">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_AFC" name="x_AFC" id="x_AFC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->AFC->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->AFC->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->AFC->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->AFC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->AMH->Visible) { // AMH ?>
	<div id="r_AMH" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AMH" for="x_AMH" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AMH" type="text/html"><?php echo $ivf_stimulation_chart_edit->AMH->caption() ?><?php echo $ivf_stimulation_chart_edit->AMH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->AMH->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AMH" type="text/html"><span id="el_ivf_stimulation_chart_AMH">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_AMH" name="x_AMH" id="x_AMH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->AMH->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->AMH->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->AMH->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->AMH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->FBMI->Visible) { // FBMI ?>
	<div id="r_FBMI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FBMI" for="x_FBMI" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FBMI" type="text/html"><?php echo $ivf_stimulation_chart_edit->FBMI->caption() ?><?php echo $ivf_stimulation_chart_edit->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FBMI" type="text/html"><span id="el_ivf_stimulation_chart_FBMI">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->FBMI->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->FBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->FBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->MBMI->Visible) { // MBMI ?>
	<div id="r_MBMI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MBMI" for="x_MBMI" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MBMI" type="text/html"><?php echo $ivf_stimulation_chart_edit->MBMI->caption() ?><?php echo $ivf_stimulation_chart_edit->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MBMI" type="text/html"><span id="el_ivf_stimulation_chart_MBMI">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->MBMI->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->MBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->MBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<div id="r_OvarianVolumeRT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianVolumeRT" for="x_OvarianVolumeRT" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->caption() ?><?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeRT" name="x_OvarianVolumeRT" id="x_OvarianVolumeRT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->OvarianVolumeRT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->OvarianVolumeRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<div id="r_OvarianVolumeLT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianVolumeLT" for="x_OvarianVolumeLT" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->caption() ?><?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeLT" name="x_OvarianVolumeLT" id="x_OvarianVolumeLT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->OvarianVolumeLT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->OvarianVolumeLT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<div id="r_DAYSOFSTIMULATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" for="x_DAYSOFSTIMULATION" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->caption() ?><?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYSOFSTIMULATION" name="x_DAYSOFSTIMULATION" id="x_DAYSOFSTIMULATION" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DAYSOFSTIMULATION->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DAYSOFSTIMULATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<div id="r_DOSEOFGONADOTROPINS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" for="x_DOSEOFGONADOTROPINS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->caption() ?><?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DOSEOFGONADOTROPINS" name="x_DOSEOFGONADOTROPINS" id="x_DOSEOFGONADOTROPINS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DOSEOFGONADOTROPINS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->INJTYPE->Visible) { // INJTYPE ?>
	<div id="r_INJTYPE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_INJTYPE" for="x_INJTYPE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_INJTYPE" type="text/html"><?php echo $ivf_stimulation_chart_edit->INJTYPE->caption() ?><?php echo $ivf_stimulation_chart_edit->INJTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->INJTYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_INJTYPE" type="text/html"><span id="el_ivf_stimulation_chart_INJTYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_INJTYPE" data-value-separator="<?php echo $ivf_stimulation_chart_edit->INJTYPE->displayValueSeparatorAttribute() ?>" id="x_INJTYPE" name="x_INJTYPE"<?php echo $ivf_stimulation_chart_edit->INJTYPE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->INJTYPE->selectOptionListHtml("x_INJTYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_inj") && !$ivf_stimulation_chart_edit->INJTYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_INJTYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->INJTYPE->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->INJTYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_INJTYPE',url:'ivf_stimulation_injaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->INJTYPE->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_INJTYPE") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->INJTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<div id="r_ANTAGONISTDAYS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" for="x_ANTAGONISTDAYS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->caption() ?><?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTDAYS" name="x_ANTAGONISTDAYS" id="x_ANTAGONISTDAYS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ANTAGONISTDAYS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ANTAGONISTDAYS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<div id="r_ANTAGONISTSTARTDAY" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" for="x_ANTAGONISTSTARTDAY" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->caption() ?><?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTSTARTDAY" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->displayValueSeparatorAttribute() ?>" id="x_ANTAGONISTSTARTDAY" name="x_ANTAGONISTSTARTDAY"<?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->selectOptionListHtml("x_ANTAGONISTSTARTDAY") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ANTAGONISTSTARTDAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<div id="r_GROWTHHORMONE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GROWTHHORMONE" for="x_GROWTHHORMONE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->caption() ?><?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_GROWTHHORMONE" name="x_GROWTHHORMONE" id="x_GROWTHHORMONE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->GROWTHHORMONE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GROWTHHORMONE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<div id="r_PRETREATMENT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PRETREATMENT" for="x_PRETREATMENT" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PRETREATMENT" type="text/html"><?php echo $ivf_stimulation_chart_edit->PRETREATMENT->caption() ?><?php echo $ivf_stimulation_chart_edit->PRETREATMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->PRETREATMENT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PRETREATMENT" type="text/html"><span id="el_ivf_stimulation_chart_PRETREATMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_PRETREATMENT" data-value-separator="<?php echo $ivf_stimulation_chart_edit->PRETREATMENT->displayValueSeparatorAttribute() ?>" id="x_PRETREATMENT" name="x_PRETREATMENT"<?php echo $ivf_stimulation_chart_edit->PRETREATMENT->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->PRETREATMENT->selectOptionListHtml("x_PRETREATMENT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->PRETREATMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SerumP4->Visible) { // SerumP4 ?>
	<div id="r_SerumP4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SerumP4" for="x_SerumP4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SerumP4" type="text/html"><?php echo $ivf_stimulation_chart_edit->SerumP4->caption() ?><?php echo $ivf_stimulation_chart_edit->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SerumP4" type="text/html"><span id="el_ivf_stimulation_chart_SerumP4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->SerumP4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->SerumP4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->SerumP4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->FORT->Visible) { // FORT ?>
	<div id="r_FORT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FORT" for="x_FORT" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FORT" type="text/html"><?php echo $ivf_stimulation_chart_edit->FORT->caption() ?><?php echo $ivf_stimulation_chart_edit->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->FORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FORT" type="text/html"><span id="el_ivf_stimulation_chart_FORT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->FORT->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->FORT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->FORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->MedicalFactors->Visible) { // MedicalFactors ?>
	<div id="r_MedicalFactors" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MedicalFactors" for="x_MedicalFactors" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MedicalFactors" type="text/html"><?php echo $ivf_stimulation_chart_edit->MedicalFactors->caption() ?><?php echo $ivf_stimulation_chart_edit->MedicalFactors->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->MedicalFactors->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MedicalFactors" type="text/html"><span id="el_ivf_stimulation_chart_MedicalFactors">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_MedicalFactors" data-value-separator="<?php echo $ivf_stimulation_chart_edit->MedicalFactors->displayValueSeparatorAttribute() ?>" id="x_MedicalFactors" name="x_MedicalFactors"<?php echo $ivf_stimulation_chart_edit->MedicalFactors->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->MedicalFactors->selectOptionListHtml("x_MedicalFactors") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->MedicalFactors->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SCDate->Visible) { // SCDate ?>
	<div id="r_SCDate" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SCDate" for="x_SCDate" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SCDate" type="text/html"><?php echo $ivf_stimulation_chart_edit->SCDate->caption() ?><?php echo $ivf_stimulation_chart_edit->SCDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SCDate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SCDate" type="text/html"><span id="el_ivf_stimulation_chart_SCDate">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_SCDate" data-format="7" name="x_SCDate" id="x_SCDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->SCDate->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->SCDate->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->SCDate->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->SCDate->ReadOnly && !$ivf_stimulation_chart_edit->SCDate->Disabled && !isset($ivf_stimulation_chart_edit->SCDate->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->SCDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_SCDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->SCDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<div id="r_OvarianSurgery" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianSurgery" for="x_OvarianSurgery" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianSurgery" type="text/html"><?php echo $ivf_stimulation_chart_edit->OvarianSurgery->caption() ?><?php echo $ivf_stimulation_chart_edit->OvarianSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->OvarianSurgery->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianSurgery" type="text/html"><span id="el_ivf_stimulation_chart_OvarianSurgery">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianSurgery" name="x_OvarianSurgery" id="x_OvarianSurgery" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->OvarianSurgery->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->OvarianSurgery->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->OvarianSurgery->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->OvarianSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<div id="r_PreProcedureOrder" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PreProcedureOrder" for="x_PreProcedureOrder" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->caption() ?><?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><span id="el_ivf_stimulation_chart_PreProcedureOrder">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PreProcedureOrder" name="x_PreProcedureOrder" id="x_PreProcedureOrder" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->PreProcedureOrder->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->PreProcedureOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TRIGGERR->Visible) { // TRIGGERR ?>
	<div id="r_TRIGGERR" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TRIGGERR" for="x_TRIGGERR" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TRIGGERR" type="text/html"><?php echo $ivf_stimulation_chart_edit->TRIGGERR->caption() ?><?php echo $ivf_stimulation_chart_edit->TRIGGERR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TRIGGERR->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERR" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TRIGGERR" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TRIGGERR->displayValueSeparatorAttribute() ?>" id="x_TRIGGERR" name="x_TRIGGERR"<?php echo $ivf_stimulation_chart_edit->TRIGGERR->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->TRIGGERR->selectOptionListHtml("x_TRIGGERR") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_trigger") && !$ivf_stimulation_chart_edit->TRIGGERR->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TRIGGERR" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->TRIGGERR->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->TRIGGERR->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TRIGGERR',url:'ivf_stimulation_triggeraddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->TRIGGERR->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_TRIGGERR") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TRIGGERR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<div id="r_TRIGGERDATE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TRIGGERDATE" for="x_TRIGGERDATE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->caption() ?><?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERDATE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TRIGGERDATE" data-format="11" name="x_TRIGGERDATE" id="x_TRIGGERDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->TRIGGERDATE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->TRIGGERDATE->ReadOnly && !$ivf_stimulation_chart_edit->TRIGGERDATE->Disabled && !isset($ivf_stimulation_chart_edit->TRIGGERDATE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_edit->TRIGGERDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<div id="r_ATHOMEorCLINIC" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" for="x_ATHOMEorCLINIC" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->caption() ?><?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ATHOMEorCLINIC" name="x_ATHOMEorCLINIC" id="x_ATHOMEorCLINIC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ATHOMEorCLINIC->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ATHOMEorCLINIC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->OPUDATE->Visible) { // OPUDATE ?>
	<div id="r_OPUDATE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OPUDATE" for="x_OPUDATE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OPUDATE" type="text/html"><?php echo $ivf_stimulation_chart_edit->OPUDATE->caption() ?><?php echo $ivf_stimulation_chart_edit->OPUDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->OPUDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OPUDATE" type="text/html"><span id="el_ivf_stimulation_chart_OPUDATE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OPUDATE" data-format="11" name="x_OPUDATE" id="x_OPUDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->OPUDATE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->OPUDATE->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->OPUDATE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->OPUDATE->ReadOnly && !$ivf_stimulation_chart_edit->OPUDATE->Disabled && !isset($ivf_stimulation_chart_edit->OPUDATE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->OPUDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_OPUDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_edit->OPUDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<div id="r_ALLFREEZEINDICATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" for="x_ALLFREEZEINDICATION" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->caption() ?><?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ALLFREEZEINDICATION" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->displayValueSeparatorAttribute() ?>" id="x_ALLFREEZEINDICATION" name="x_ALLFREEZEINDICATION"<?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->selectOptionListHtml("x_ALLFREEZEINDICATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ALLFREEZEINDICATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ERA->Visible) { // ERA ?>
	<div id="r_ERA" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ERA" for="x_ERA" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ERA" type="text/html"><?php echo $ivf_stimulation_chart_edit->ERA->caption() ?><?php echo $ivf_stimulation_chart_edit->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ERA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ERA" type="text/html"><span id="el_ivf_stimulation_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ERA->displayValueSeparatorAttribute() ?>" id="x_ERA" name="x_ERA"<?php echo $ivf_stimulation_chart_edit->ERA->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ERA->selectOptionListHtml("x_ERA") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ERA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->PGTA->Visible) { // PGTA ?>
	<div id="r_PGTA" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PGTA" for="x_PGTA" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PGTA" type="text/html"><?php echo $ivf_stimulation_chart_edit->PGTA->caption() ?><?php echo $ivf_stimulation_chart_edit->PGTA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->PGTA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGTA" type="text/html"><span id="el_ivf_stimulation_chart_PGTA">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PGTA" name="x_PGTA" id="x_PGTA" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->PGTA->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->PGTA->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->PGTA->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->PGTA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->PGD->Visible) { // PGD ?>
	<div id="r_PGD" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PGD" for="x_PGD" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PGD" type="text/html"><?php echo $ivf_stimulation_chart_edit->PGD->caption() ?><?php echo $ivf_stimulation_chart_edit->PGD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->PGD->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGD" type="text/html"><span id="el_ivf_stimulation_chart_PGD">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PGD" name="x_PGD" id="x_PGD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->PGD->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->PGD->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->PGD->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->PGD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DATEOFET->Visible) { // DATEOFET ?>
	<div id="r_DATEOFET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DATEOFET" for="x_DATEOFET" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DATEOFET" type="text/html"><?php echo $ivf_stimulation_chart_edit->DATEOFET->caption() ?><?php echo $ivf_stimulation_chart_edit->DATEOFET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DATEOFET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATEOFET" type="text/html"><span id="el_ivf_stimulation_chart_DATEOFET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DATEOFET" data-format="11" name="x_DATEOFET" id="x_DATEOFET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DATEOFET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DATEOFET->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DATEOFET->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->DATEOFET->ReadOnly && !$ivf_stimulation_chart_edit->DATEOFET->Disabled && !isset($ivf_stimulation_chart_edit->DATEOFET->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->DATEOFET->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_DATEOFET", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_edit->DATEOFET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ET->Visible) { // ET ?>
	<div id="r_ET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ET" for="x_ET" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ET" type="text/html"><?php echo $ivf_stimulation_chart_edit->ET->caption() ?><?php echo $ivf_stimulation_chart_edit->ET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ET" type="text/html"><span id="el_ivf_stimulation_chart_ET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ET" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ET->displayValueSeparatorAttribute() ?>" id="x_ET" name="x_ET"<?php echo $ivf_stimulation_chart_edit->ET->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ET->selectOptionListHtml("x_ET") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ESET->Visible) { // ESET ?>
	<div id="r_ESET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ESET" for="x_ESET" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ESET" type="text/html"><?php echo $ivf_stimulation_chart_edit->ESET->caption() ?><?php echo $ivf_stimulation_chart_edit->ESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ESET" type="text/html"><span id="el_ivf_stimulation_chart_ESET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ESET" name="x_ESET" id="x_ESET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ESET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ESET->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ESET->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ESET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DOET->Visible) { // DOET ?>
	<div id="r_DOET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOET" for="x_DOET" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOET" type="text/html"><?php echo $ivf_stimulation_chart_edit->DOET->caption() ?><?php echo $ivf_stimulation_chart_edit->DOET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DOET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOET" type="text/html"><span id="el_ivf_stimulation_chart_DOET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DOET" name="x_DOET" id="x_DOET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DOET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DOET->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DOET->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DOET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<div id="r_SEMENPREPARATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SEMENPREPARATION" for="x_SEMENPREPARATION" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->caption() ?><?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SEMENPREPARATION" data-value-separator="<?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->displayValueSeparatorAttribute() ?>" id="x_SEMENPREPARATION" name="x_SEMENPREPARATION"<?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->selectOptionListHtml("x_SEMENPREPARATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->SEMENPREPARATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->REASONFORESET->Visible) { // REASONFORESET ?>
	<div id="r_REASONFORESET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_REASONFORESET" for="x_REASONFORESET" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_REASONFORESET" type="text/html"><?php echo $ivf_stimulation_chart_edit->REASONFORESET->caption() ?><?php echo $ivf_stimulation_chart_edit->REASONFORESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->REASONFORESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_REASONFORESET" type="text/html"><span id="el_ivf_stimulation_chart_REASONFORESET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_REASONFORESET" data-value-separator="<?php echo $ivf_stimulation_chart_edit->REASONFORESET->displayValueSeparatorAttribute() ?>" id="x_REASONFORESET" name="x_REASONFORESET"<?php echo $ivf_stimulation_chart_edit->REASONFORESET->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->REASONFORESET->selectOptionListHtml("x_REASONFORESET") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->REASONFORESET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<div id="r_Expectedoocytes" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Expectedoocytes" for="x_Expectedoocytes" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Expectedoocytes" type="text/html"><?php echo $ivf_stimulation_chart_edit->Expectedoocytes->caption() ?><?php echo $ivf_stimulation_chart_edit->Expectedoocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Expectedoocytes->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Expectedoocytes" type="text/html"><span id="el_ivf_stimulation_chart_Expectedoocytes">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Expectedoocytes" name="x_Expectedoocytes" id="x_Expectedoocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Expectedoocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Expectedoocytes->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Expectedoocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Expectedoocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate1->Visible) { // StChDate1 ?>
	<div id="r_StChDate1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate1" for="x_StChDate1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate1" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate1->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate1" type="text/html"><span id="el_ivf_stimulation_chart_StChDate1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate1" data-format="7" name="x_StChDate1" id="x_StChDate1" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate1->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate1->ReadOnly && !$ivf_stimulation_chart_edit->StChDate1->Disabled && !isset($ivf_stimulation_chart_edit->StChDate1->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate1->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate2->Visible) { // StChDate2 ?>
	<div id="r_StChDate2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate2" for="x_StChDate2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate2" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate2->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate2" type="text/html"><span id="el_ivf_stimulation_chart_StChDate2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate2" data-format="7" name="x_StChDate2" id="x_StChDate2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate2->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate2->ReadOnly && !$ivf_stimulation_chart_edit->StChDate2->Disabled && !isset($ivf_stimulation_chart_edit->StChDate2->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate2->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate3->Visible) { // StChDate3 ?>
	<div id="r_StChDate3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate3" for="x_StChDate3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate3" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate3->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate3" type="text/html"><span id="el_ivf_stimulation_chart_StChDate3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate3" data-format="7" name="x_StChDate3" id="x_StChDate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate3->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate3->ReadOnly && !$ivf_stimulation_chart_edit->StChDate3->Disabled && !isset($ivf_stimulation_chart_edit->StChDate3->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate3->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate4->Visible) { // StChDate4 ?>
	<div id="r_StChDate4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate4" for="x_StChDate4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate4" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate4->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate4" type="text/html"><span id="el_ivf_stimulation_chart_StChDate4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate4" data-format="7" name="x_StChDate4" id="x_StChDate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate4->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate4->ReadOnly && !$ivf_stimulation_chart_edit->StChDate4->Disabled && !isset($ivf_stimulation_chart_edit->StChDate4->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate4->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate5->Visible) { // StChDate5 ?>
	<div id="r_StChDate5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate5" for="x_StChDate5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate5" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate5->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate5" type="text/html"><span id="el_ivf_stimulation_chart_StChDate5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate5" data-format="7" name="x_StChDate5" id="x_StChDate5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate5->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate5->ReadOnly && !$ivf_stimulation_chart_edit->StChDate5->Disabled && !isset($ivf_stimulation_chart_edit->StChDate5->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate5->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate5", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate6->Visible) { // StChDate6 ?>
	<div id="r_StChDate6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate6" for="x_StChDate6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate6" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate6->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate6" type="text/html"><span id="el_ivf_stimulation_chart_StChDate6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate6" data-format="7" name="x_StChDate6" id="x_StChDate6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate6->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate6->ReadOnly && !$ivf_stimulation_chart_edit->StChDate6->Disabled && !isset($ivf_stimulation_chart_edit->StChDate6->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate6->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate6", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate7->Visible) { // StChDate7 ?>
	<div id="r_StChDate7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate7" for="x_StChDate7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate7" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate7->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate7" type="text/html"><span id="el_ivf_stimulation_chart_StChDate7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate7" data-format="7" name="x_StChDate7" id="x_StChDate7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate7->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate7->ReadOnly && !$ivf_stimulation_chart_edit->StChDate7->Disabled && !isset($ivf_stimulation_chart_edit->StChDate7->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate7->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate7", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate8->Visible) { // StChDate8 ?>
	<div id="r_StChDate8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate8" for="x_StChDate8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate8" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate8->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate8" type="text/html"><span id="el_ivf_stimulation_chart_StChDate8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate8" data-format="7" name="x_StChDate8" id="x_StChDate8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate8->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate8->ReadOnly && !$ivf_stimulation_chart_edit->StChDate8->Disabled && !isset($ivf_stimulation_chart_edit->StChDate8->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate8->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate8", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate9->Visible) { // StChDate9 ?>
	<div id="r_StChDate9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate9" for="x_StChDate9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate9" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate9->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate9" type="text/html"><span id="el_ivf_stimulation_chart_StChDate9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate9" data-format="7" name="x_StChDate9" id="x_StChDate9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate9->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate9->ReadOnly && !$ivf_stimulation_chart_edit->StChDate9->Disabled && !isset($ivf_stimulation_chart_edit->StChDate9->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate9->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate9", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate10->Visible) { // StChDate10 ?>
	<div id="r_StChDate10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate10" for="x_StChDate10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate10" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate10->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate10" type="text/html"><span id="el_ivf_stimulation_chart_StChDate10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate10" data-format="7" name="x_StChDate10" id="x_StChDate10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate10->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate10->ReadOnly && !$ivf_stimulation_chart_edit->StChDate10->Disabled && !isset($ivf_stimulation_chart_edit->StChDate10->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate10->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate10", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate11->Visible) { // StChDate11 ?>
	<div id="r_StChDate11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate11" for="x_StChDate11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate11" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate11->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate11" type="text/html"><span id="el_ivf_stimulation_chart_StChDate11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate11" data-format="7" name="x_StChDate11" id="x_StChDate11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate11->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate11->ReadOnly && !$ivf_stimulation_chart_edit->StChDate11->Disabled && !isset($ivf_stimulation_chart_edit->StChDate11->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate11->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate11", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate12->Visible) { // StChDate12 ?>
	<div id="r_StChDate12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate12" for="x_StChDate12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate12" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate12->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate12" type="text/html"><span id="el_ivf_stimulation_chart_StChDate12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate12" data-format="7" name="x_StChDate12" id="x_StChDate12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate12->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate12->ReadOnly && !$ivf_stimulation_chart_edit->StChDate12->Disabled && !isset($ivf_stimulation_chart_edit->StChDate12->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate12->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate12", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate13->Visible) { // StChDate13 ?>
	<div id="r_StChDate13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate13" for="x_StChDate13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate13" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate13->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate13" type="text/html"><span id="el_ivf_stimulation_chart_StChDate13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate13" data-format="7" name="x_StChDate13" id="x_StChDate13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate13->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate13->ReadOnly && !$ivf_stimulation_chart_edit->StChDate13->Disabled && !isset($ivf_stimulation_chart_edit->StChDate13->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate13->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate13", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay1->Visible) { // CycleDay1 ?>
	<div id="r_CycleDay1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay1" for="x_CycleDay1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay1" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay1->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay1" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay1" name="x_CycleDay1" id="x_CycleDay1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay2->Visible) { // CycleDay2 ?>
	<div id="r_CycleDay2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay2" for="x_CycleDay2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay2" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay2->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay2" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay2" name="x_CycleDay2" id="x_CycleDay2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay3->Visible) { // CycleDay3 ?>
	<div id="r_CycleDay3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay3" for="x_CycleDay3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay3" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay3->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay3" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay3" name="x_CycleDay3" id="x_CycleDay3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay4->Visible) { // CycleDay4 ?>
	<div id="r_CycleDay4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay4" for="x_CycleDay4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay4" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay4->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay4" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay4" name="x_CycleDay4" id="x_CycleDay4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay5->Visible) { // CycleDay5 ?>
	<div id="r_CycleDay5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay5" for="x_CycleDay5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay5" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay5->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay5" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay5" name="x_CycleDay5" id="x_CycleDay5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay6->Visible) { // CycleDay6 ?>
	<div id="r_CycleDay6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay6" for="x_CycleDay6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay6" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay6->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay6" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay6" name="x_CycleDay6" id="x_CycleDay6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay7->Visible) { // CycleDay7 ?>
	<div id="r_CycleDay7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay7" for="x_CycleDay7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay7" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay7->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay7" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay7" name="x_CycleDay7" id="x_CycleDay7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay8->Visible) { // CycleDay8 ?>
	<div id="r_CycleDay8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay8" for="x_CycleDay8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay8" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay8->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay8" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay8" name="x_CycleDay8" id="x_CycleDay8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay9->Visible) { // CycleDay9 ?>
	<div id="r_CycleDay9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay9" for="x_CycleDay9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay9" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay9->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay9" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay9" name="x_CycleDay9" id="x_CycleDay9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay10->Visible) { // CycleDay10 ?>
	<div id="r_CycleDay10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay10" for="x_CycleDay10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay10" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay10->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay10" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay10" name="x_CycleDay10" id="x_CycleDay10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay11->Visible) { // CycleDay11 ?>
	<div id="r_CycleDay11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay11" for="x_CycleDay11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay11" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay11->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay11" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay11" name="x_CycleDay11" id="x_CycleDay11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay12->Visible) { // CycleDay12 ?>
	<div id="r_CycleDay12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay12" for="x_CycleDay12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay12" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay12->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay12" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay12" name="x_CycleDay12" id="x_CycleDay12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay13->Visible) { // CycleDay13 ?>
	<div id="r_CycleDay13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay13" for="x_CycleDay13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay13" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay13->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay13" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay13" name="x_CycleDay13" id="x_CycleDay13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay1->Visible) { // StimulationDay1 ?>
	<div id="r_StimulationDay1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay1" for="x_StimulationDay1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay1" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay1->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay1" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay1" name="x_StimulationDay1" id="x_StimulationDay1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay2->Visible) { // StimulationDay2 ?>
	<div id="r_StimulationDay2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay2" for="x_StimulationDay2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay2" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay2->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay2" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay2" name="x_StimulationDay2" id="x_StimulationDay2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay3->Visible) { // StimulationDay3 ?>
	<div id="r_StimulationDay3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay3" for="x_StimulationDay3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay3" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay3->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay3" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay3" name="x_StimulationDay3" id="x_StimulationDay3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay4->Visible) { // StimulationDay4 ?>
	<div id="r_StimulationDay4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay4" for="x_StimulationDay4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay4" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay4->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay4" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay4" name="x_StimulationDay4" id="x_StimulationDay4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay5->Visible) { // StimulationDay5 ?>
	<div id="r_StimulationDay5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay5" for="x_StimulationDay5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay5" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay5->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay5" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay5" name="x_StimulationDay5" id="x_StimulationDay5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay6->Visible) { // StimulationDay6 ?>
	<div id="r_StimulationDay6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay6" for="x_StimulationDay6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay6" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay6->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay6" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay6" name="x_StimulationDay6" id="x_StimulationDay6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay7->Visible) { // StimulationDay7 ?>
	<div id="r_StimulationDay7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay7" for="x_StimulationDay7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay7" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay7->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay7" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay7" name="x_StimulationDay7" id="x_StimulationDay7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay8->Visible) { // StimulationDay8 ?>
	<div id="r_StimulationDay8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay8" for="x_StimulationDay8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay8" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay8->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay8" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay8" name="x_StimulationDay8" id="x_StimulationDay8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay9->Visible) { // StimulationDay9 ?>
	<div id="r_StimulationDay9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay9" for="x_StimulationDay9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay9" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay9->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay9" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay9" name="x_StimulationDay9" id="x_StimulationDay9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay10->Visible) { // StimulationDay10 ?>
	<div id="r_StimulationDay10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay10" for="x_StimulationDay10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay10" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay10->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay10" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay10" name="x_StimulationDay10" id="x_StimulationDay10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay11->Visible) { // StimulationDay11 ?>
	<div id="r_StimulationDay11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay11" for="x_StimulationDay11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay11" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay11->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay11" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay11" name="x_StimulationDay11" id="x_StimulationDay11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay12->Visible) { // StimulationDay12 ?>
	<div id="r_StimulationDay12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay12" for="x_StimulationDay12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay12" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay12->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay12" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay12" name="x_StimulationDay12" id="x_StimulationDay12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay13->Visible) { // StimulationDay13 ?>
	<div id="r_StimulationDay13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay13" for="x_StimulationDay13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay13" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay13->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay13" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay13" name="x_StimulationDay13" id="x_StimulationDay13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet1->Visible) { // Tablet1 ?>
	<div id="r_Tablet1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet1" for="x_Tablet1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet1" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet1->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet1" type="text/html"><span id="el_ivf_stimulation_chart_Tablet1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet1" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet1->displayValueSeparatorAttribute() ?>" id="x_Tablet1" name="x_Tablet1"<?php echo $ivf_stimulation_chart_edit->Tablet1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet1->selectOptionListHtml("x_Tablet1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_tablet") && !$ivf_stimulation_chart_edit->Tablet1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Tablet1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->Tablet1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->Tablet1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Tablet1',url:'ivf_stimulation_tabletaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet1->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet2->Visible) { // Tablet2 ?>
	<div id="r_Tablet2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet2" for="x_Tablet2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet2" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet2->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet2" type="text/html"><span id="el_ivf_stimulation_chart_Tablet2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet2" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet2->displayValueSeparatorAttribute() ?>" id="x_Tablet2" name="x_Tablet2"<?php echo $ivf_stimulation_chart_edit->Tablet2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet2->selectOptionListHtml("x_Tablet2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet2->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet3->Visible) { // Tablet3 ?>
	<div id="r_Tablet3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet3" for="x_Tablet3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet3" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet3->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet3" type="text/html"><span id="el_ivf_stimulation_chart_Tablet3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet3" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet3->displayValueSeparatorAttribute() ?>" id="x_Tablet3" name="x_Tablet3"<?php echo $ivf_stimulation_chart_edit->Tablet3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet3->selectOptionListHtml("x_Tablet3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet3->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet4->Visible) { // Tablet4 ?>
	<div id="r_Tablet4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet4" for="x_Tablet4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet4" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet4->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet4" type="text/html"><span id="el_ivf_stimulation_chart_Tablet4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet4" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet4->displayValueSeparatorAttribute() ?>" id="x_Tablet4" name="x_Tablet4"<?php echo $ivf_stimulation_chart_edit->Tablet4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet4->selectOptionListHtml("x_Tablet4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet4->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet5->Visible) { // Tablet5 ?>
	<div id="r_Tablet5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet5" for="x_Tablet5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet5" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet5->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet5" type="text/html"><span id="el_ivf_stimulation_chart_Tablet5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet5" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet5->displayValueSeparatorAttribute() ?>" id="x_Tablet5" name="x_Tablet5"<?php echo $ivf_stimulation_chart_edit->Tablet5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet5->selectOptionListHtml("x_Tablet5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet5->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet6->Visible) { // Tablet6 ?>
	<div id="r_Tablet6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet6" for="x_Tablet6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet6" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet6->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet6" type="text/html"><span id="el_ivf_stimulation_chart_Tablet6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet6" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet6->displayValueSeparatorAttribute() ?>" id="x_Tablet6" name="x_Tablet6"<?php echo $ivf_stimulation_chart_edit->Tablet6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet6->selectOptionListHtml("x_Tablet6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet6->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet7->Visible) { // Tablet7 ?>
	<div id="r_Tablet7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet7" for="x_Tablet7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet7" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet7->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet7" type="text/html"><span id="el_ivf_stimulation_chart_Tablet7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet7" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet7->displayValueSeparatorAttribute() ?>" id="x_Tablet7" name="x_Tablet7"<?php echo $ivf_stimulation_chart_edit->Tablet7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet7->selectOptionListHtml("x_Tablet7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet7->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet8->Visible) { // Tablet8 ?>
	<div id="r_Tablet8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet8" for="x_Tablet8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet8" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet8->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet8" type="text/html"><span id="el_ivf_stimulation_chart_Tablet8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet8" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet8->displayValueSeparatorAttribute() ?>" id="x_Tablet8" name="x_Tablet8"<?php echo $ivf_stimulation_chart_edit->Tablet8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet8->selectOptionListHtml("x_Tablet8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet8->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet9->Visible) { // Tablet9 ?>
	<div id="r_Tablet9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet9" for="x_Tablet9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet9" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet9->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet9" type="text/html"><span id="el_ivf_stimulation_chart_Tablet9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet9" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet9->displayValueSeparatorAttribute() ?>" id="x_Tablet9" name="x_Tablet9"<?php echo $ivf_stimulation_chart_edit->Tablet9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet9->selectOptionListHtml("x_Tablet9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet9->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet10->Visible) { // Tablet10 ?>
	<div id="r_Tablet10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet10" for="x_Tablet10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet10" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet10->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet10" type="text/html"><span id="el_ivf_stimulation_chart_Tablet10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet10" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet10->displayValueSeparatorAttribute() ?>" id="x_Tablet10" name="x_Tablet10"<?php echo $ivf_stimulation_chart_edit->Tablet10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet10->selectOptionListHtml("x_Tablet10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet10->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet11->Visible) { // Tablet11 ?>
	<div id="r_Tablet11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet11" for="x_Tablet11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet11" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet11->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet11" type="text/html"><span id="el_ivf_stimulation_chart_Tablet11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet11" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet11->displayValueSeparatorAttribute() ?>" id="x_Tablet11" name="x_Tablet11"<?php echo $ivf_stimulation_chart_edit->Tablet11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet11->selectOptionListHtml("x_Tablet11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet11->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet12->Visible) { // Tablet12 ?>
	<div id="r_Tablet12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet12" for="x_Tablet12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet12" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet12->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet12" type="text/html"><span id="el_ivf_stimulation_chart_Tablet12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet12" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet12->displayValueSeparatorAttribute() ?>" id="x_Tablet12" name="x_Tablet12"<?php echo $ivf_stimulation_chart_edit->Tablet12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet12->selectOptionListHtml("x_Tablet12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet12->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet13->Visible) { // Tablet13 ?>
	<div id="r_Tablet13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet13" for="x_Tablet13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet13" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet13->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet13" type="text/html"><span id="el_ivf_stimulation_chart_Tablet13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet13" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet13->displayValueSeparatorAttribute() ?>" id="x_Tablet13" name="x_Tablet13"<?php echo $ivf_stimulation_chart_edit->Tablet13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet13->selectOptionListHtml("x_Tablet13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet13->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH1->Visible) { // RFSH1 ?>
	<div id="r_RFSH1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH1" for="x_RFSH1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH1" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH1->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH1" type="text/html"><span id="el_ivf_stimulation_chart_RFSH1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH1" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH1->displayValueSeparatorAttribute() ?>" id="x_RFSH1" name="x_RFSH1"<?php echo $ivf_stimulation_chart_edit->RFSH1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH1->selectOptionListHtml("x_RFSH1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_rfsh") && !$ivf_stimulation_chart_edit->RFSH1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RFSH1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->RFSH1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->RFSH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RFSH1',url:'ivf_stimulation_rfshaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH1->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH2->Visible) { // RFSH2 ?>
	<div id="r_RFSH2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH2" for="x_RFSH2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH2" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH2->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH2" type="text/html"><span id="el_ivf_stimulation_chart_RFSH2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH2" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH2->displayValueSeparatorAttribute() ?>" id="x_RFSH2" name="x_RFSH2"<?php echo $ivf_stimulation_chart_edit->RFSH2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH2->selectOptionListHtml("x_RFSH2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH2->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH3->Visible) { // RFSH3 ?>
	<div id="r_RFSH3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH3" for="x_RFSH3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH3" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH3->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH3" type="text/html"><span id="el_ivf_stimulation_chart_RFSH3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH3" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH3->displayValueSeparatorAttribute() ?>" id="x_RFSH3" name="x_RFSH3"<?php echo $ivf_stimulation_chart_edit->RFSH3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH3->selectOptionListHtml("x_RFSH3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH3->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH4->Visible) { // RFSH4 ?>
	<div id="r_RFSH4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH4" for="x_RFSH4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH4" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH4->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH4" type="text/html"><span id="el_ivf_stimulation_chart_RFSH4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH4" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH4->displayValueSeparatorAttribute() ?>" id="x_RFSH4" name="x_RFSH4"<?php echo $ivf_stimulation_chart_edit->RFSH4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH4->selectOptionListHtml("x_RFSH4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH4->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH5->Visible) { // RFSH5 ?>
	<div id="r_RFSH5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH5" for="x_RFSH5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH5" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH5->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH5" type="text/html"><span id="el_ivf_stimulation_chart_RFSH5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH5" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH5->displayValueSeparatorAttribute() ?>" id="x_RFSH5" name="x_RFSH5"<?php echo $ivf_stimulation_chart_edit->RFSH5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH5->selectOptionListHtml("x_RFSH5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH5->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH6->Visible) { // RFSH6 ?>
	<div id="r_RFSH6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH6" for="x_RFSH6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH6" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH6->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH6" type="text/html"><span id="el_ivf_stimulation_chart_RFSH6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH6" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH6->displayValueSeparatorAttribute() ?>" id="x_RFSH6" name="x_RFSH6"<?php echo $ivf_stimulation_chart_edit->RFSH6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH6->selectOptionListHtml("x_RFSH6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH6->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH7->Visible) { // RFSH7 ?>
	<div id="r_RFSH7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH7" for="x_RFSH7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH7" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH7->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH7" type="text/html"><span id="el_ivf_stimulation_chart_RFSH7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH7" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH7->displayValueSeparatorAttribute() ?>" id="x_RFSH7" name="x_RFSH7"<?php echo $ivf_stimulation_chart_edit->RFSH7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH7->selectOptionListHtml("x_RFSH7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH7->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH8->Visible) { // RFSH8 ?>
	<div id="r_RFSH8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH8" for="x_RFSH8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH8" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH8->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH8" type="text/html"><span id="el_ivf_stimulation_chart_RFSH8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH8" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH8->displayValueSeparatorAttribute() ?>" id="x_RFSH8" name="x_RFSH8"<?php echo $ivf_stimulation_chart_edit->RFSH8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH8->selectOptionListHtml("x_RFSH8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH8->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH9->Visible) { // RFSH9 ?>
	<div id="r_RFSH9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH9" for="x_RFSH9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH9" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH9->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH9" type="text/html"><span id="el_ivf_stimulation_chart_RFSH9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH9" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH9->displayValueSeparatorAttribute() ?>" id="x_RFSH9" name="x_RFSH9"<?php echo $ivf_stimulation_chart_edit->RFSH9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH9->selectOptionListHtml("x_RFSH9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH9->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH10->Visible) { // RFSH10 ?>
	<div id="r_RFSH10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH10" for="x_RFSH10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH10" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH10->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH10" type="text/html"><span id="el_ivf_stimulation_chart_RFSH10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH10" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH10->displayValueSeparatorAttribute() ?>" id="x_RFSH10" name="x_RFSH10"<?php echo $ivf_stimulation_chart_edit->RFSH10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH10->selectOptionListHtml("x_RFSH10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH10->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH11->Visible) { // RFSH11 ?>
	<div id="r_RFSH11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH11" for="x_RFSH11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH11" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH11->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH11" type="text/html"><span id="el_ivf_stimulation_chart_RFSH11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH11" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH11->displayValueSeparatorAttribute() ?>" id="x_RFSH11" name="x_RFSH11"<?php echo $ivf_stimulation_chart_edit->RFSH11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH11->selectOptionListHtml("x_RFSH11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH11->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH12->Visible) { // RFSH12 ?>
	<div id="r_RFSH12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH12" for="x_RFSH12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH12" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH12->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH12" type="text/html"><span id="el_ivf_stimulation_chart_RFSH12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH12" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH12->displayValueSeparatorAttribute() ?>" id="x_RFSH12" name="x_RFSH12"<?php echo $ivf_stimulation_chart_edit->RFSH12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH12->selectOptionListHtml("x_RFSH12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH12->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH13->Visible) { // RFSH13 ?>
	<div id="r_RFSH13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH13" for="x_RFSH13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH13" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH13->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH13" type="text/html"><span id="el_ivf_stimulation_chart_RFSH13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH13" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH13->displayValueSeparatorAttribute() ?>" id="x_RFSH13" name="x_RFSH13"<?php echo $ivf_stimulation_chart_edit->RFSH13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH13->selectOptionListHtml("x_RFSH13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH13->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG1->Visible) { // HMG1 ?>
	<div id="r_HMG1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG1" for="x_HMG1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG1" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG1->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG1" type="text/html"><span id="el_ivf_stimulation_chart_HMG1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG1" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG1->displayValueSeparatorAttribute() ?>" id="x_HMG1" name="x_HMG1"<?php echo $ivf_stimulation_chart_edit->HMG1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG1->selectOptionListHtml("x_HMG1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_hmg") && !$ivf_stimulation_chart_edit->HMG1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_HMG1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->HMG1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->HMG1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_HMG1',url:'ivf_stimulation_hmgaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG1->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG2->Visible) { // HMG2 ?>
	<div id="r_HMG2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG2" for="x_HMG2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG2" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG2->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG2" type="text/html"><span id="el_ivf_stimulation_chart_HMG2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG2" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG2->displayValueSeparatorAttribute() ?>" id="x_HMG2" name="x_HMG2"<?php echo $ivf_stimulation_chart_edit->HMG2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG2->selectOptionListHtml("x_HMG2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG2->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG3->Visible) { // HMG3 ?>
	<div id="r_HMG3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG3" for="x_HMG3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG3" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG3->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG3" type="text/html"><span id="el_ivf_stimulation_chart_HMG3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG3" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG3->displayValueSeparatorAttribute() ?>" id="x_HMG3" name="x_HMG3"<?php echo $ivf_stimulation_chart_edit->HMG3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG3->selectOptionListHtml("x_HMG3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG3->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG4->Visible) { // HMG4 ?>
	<div id="r_HMG4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG4" for="x_HMG4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG4" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG4->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG4" type="text/html"><span id="el_ivf_stimulation_chart_HMG4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG4" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG4->displayValueSeparatorAttribute() ?>" id="x_HMG4" name="x_HMG4"<?php echo $ivf_stimulation_chart_edit->HMG4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG4->selectOptionListHtml("x_HMG4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG4->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG5->Visible) { // HMG5 ?>
	<div id="r_HMG5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG5" for="x_HMG5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG5" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG5->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG5" type="text/html"><span id="el_ivf_stimulation_chart_HMG5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG5" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG5->displayValueSeparatorAttribute() ?>" id="x_HMG5" name="x_HMG5"<?php echo $ivf_stimulation_chart_edit->HMG5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG5->selectOptionListHtml("x_HMG5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG5->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG6->Visible) { // HMG6 ?>
	<div id="r_HMG6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG6" for="x_HMG6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG6" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG6->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG6" type="text/html"><span id="el_ivf_stimulation_chart_HMG6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG6" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG6->displayValueSeparatorAttribute() ?>" id="x_HMG6" name="x_HMG6"<?php echo $ivf_stimulation_chart_edit->HMG6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG6->selectOptionListHtml("x_HMG6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG6->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG7->Visible) { // HMG7 ?>
	<div id="r_HMG7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG7" for="x_HMG7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG7" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG7->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG7" type="text/html"><span id="el_ivf_stimulation_chart_HMG7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG7" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG7->displayValueSeparatorAttribute() ?>" id="x_HMG7" name="x_HMG7"<?php echo $ivf_stimulation_chart_edit->HMG7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG7->selectOptionListHtml("x_HMG7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG7->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG8->Visible) { // HMG8 ?>
	<div id="r_HMG8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG8" for="x_HMG8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG8" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG8->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG8" type="text/html"><span id="el_ivf_stimulation_chart_HMG8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG8" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG8->displayValueSeparatorAttribute() ?>" id="x_HMG8" name="x_HMG8"<?php echo $ivf_stimulation_chart_edit->HMG8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG8->selectOptionListHtml("x_HMG8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG8->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG9->Visible) { // HMG9 ?>
	<div id="r_HMG9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG9" for="x_HMG9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG9" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG9->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG9" type="text/html"><span id="el_ivf_stimulation_chart_HMG9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG9" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG9->displayValueSeparatorAttribute() ?>" id="x_HMG9" name="x_HMG9"<?php echo $ivf_stimulation_chart_edit->HMG9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG9->selectOptionListHtml("x_HMG9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG9->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG10->Visible) { // HMG10 ?>
	<div id="r_HMG10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG10" for="x_HMG10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG10" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG10->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG10" type="text/html"><span id="el_ivf_stimulation_chart_HMG10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG10" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG10->displayValueSeparatorAttribute() ?>" id="x_HMG10" name="x_HMG10"<?php echo $ivf_stimulation_chart_edit->HMG10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG10->selectOptionListHtml("x_HMG10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG10->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG11->Visible) { // HMG11 ?>
	<div id="r_HMG11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG11" for="x_HMG11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG11" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG11->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG11" type="text/html"><span id="el_ivf_stimulation_chart_HMG11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG11" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG11->displayValueSeparatorAttribute() ?>" id="x_HMG11" name="x_HMG11"<?php echo $ivf_stimulation_chart_edit->HMG11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG11->selectOptionListHtml("x_HMG11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG11->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG12->Visible) { // HMG12 ?>
	<div id="r_HMG12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG12" for="x_HMG12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG12" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG12->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG12" type="text/html"><span id="el_ivf_stimulation_chart_HMG12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG12" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG12->displayValueSeparatorAttribute() ?>" id="x_HMG12" name="x_HMG12"<?php echo $ivf_stimulation_chart_edit->HMG12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG12->selectOptionListHtml("x_HMG12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG12->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG13->Visible) { // HMG13 ?>
	<div id="r_HMG13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG13" for="x_HMG13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG13" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG13->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG13" type="text/html"><span id="el_ivf_stimulation_chart_HMG13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG13" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG13->displayValueSeparatorAttribute() ?>" id="x_HMG13" name="x_HMG13"<?php echo $ivf_stimulation_chart_edit->HMG13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG13->selectOptionListHtml("x_HMG13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG13->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH1->Visible) { // GnRH1 ?>
	<div id="r_GnRH1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH1" for="x_GnRH1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH1" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH1->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH1" type="text/html"><span id="el_ivf_stimulation_chart_GnRH1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH1" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH1->displayValueSeparatorAttribute() ?>" id="x_GnRH1" name="x_GnRH1"<?php echo $ivf_stimulation_chart_edit->GnRH1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH1->selectOptionListHtml("x_GnRH1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_gnrh") && !$ivf_stimulation_chart_edit->GnRH1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_GnRH1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_edit->GnRH1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_edit->GnRH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_GnRH1',url:'ivf_stimulation_gnrhaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH1->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH2->Visible) { // GnRH2 ?>
	<div id="r_GnRH2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH2" for="x_GnRH2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH2" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH2->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH2" type="text/html"><span id="el_ivf_stimulation_chart_GnRH2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH2" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH2->displayValueSeparatorAttribute() ?>" id="x_GnRH2" name="x_GnRH2"<?php echo $ivf_stimulation_chart_edit->GnRH2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH2->selectOptionListHtml("x_GnRH2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH2->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH3->Visible) { // GnRH3 ?>
	<div id="r_GnRH3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH3" for="x_GnRH3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH3" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH3->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH3" type="text/html"><span id="el_ivf_stimulation_chart_GnRH3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH3" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH3->displayValueSeparatorAttribute() ?>" id="x_GnRH3" name="x_GnRH3"<?php echo $ivf_stimulation_chart_edit->GnRH3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH3->selectOptionListHtml("x_GnRH3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH3->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH4->Visible) { // GnRH4 ?>
	<div id="r_GnRH4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH4" for="x_GnRH4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH4" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH4->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH4" type="text/html"><span id="el_ivf_stimulation_chart_GnRH4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH4" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH4->displayValueSeparatorAttribute() ?>" id="x_GnRH4" name="x_GnRH4"<?php echo $ivf_stimulation_chart_edit->GnRH4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH4->selectOptionListHtml("x_GnRH4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH4->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH5->Visible) { // GnRH5 ?>
	<div id="r_GnRH5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH5" for="x_GnRH5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH5" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH5->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH5" type="text/html"><span id="el_ivf_stimulation_chart_GnRH5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH5" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH5->displayValueSeparatorAttribute() ?>" id="x_GnRH5" name="x_GnRH5"<?php echo $ivf_stimulation_chart_edit->GnRH5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH5->selectOptionListHtml("x_GnRH5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH5->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH6->Visible) { // GnRH6 ?>
	<div id="r_GnRH6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH6" for="x_GnRH6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH6" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH6->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH6" type="text/html"><span id="el_ivf_stimulation_chart_GnRH6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH6" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH6->displayValueSeparatorAttribute() ?>" id="x_GnRH6" name="x_GnRH6"<?php echo $ivf_stimulation_chart_edit->GnRH6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH6->selectOptionListHtml("x_GnRH6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH6->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH7->Visible) { // GnRH7 ?>
	<div id="r_GnRH7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH7" for="x_GnRH7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH7" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH7->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH7" type="text/html"><span id="el_ivf_stimulation_chart_GnRH7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH7" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH7->displayValueSeparatorAttribute() ?>" id="x_GnRH7" name="x_GnRH7"<?php echo $ivf_stimulation_chart_edit->GnRH7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH7->selectOptionListHtml("x_GnRH7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH7->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH8->Visible) { // GnRH8 ?>
	<div id="r_GnRH8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH8" for="x_GnRH8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH8" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH8->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH8" type="text/html"><span id="el_ivf_stimulation_chart_GnRH8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH8" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH8->displayValueSeparatorAttribute() ?>" id="x_GnRH8" name="x_GnRH8"<?php echo $ivf_stimulation_chart_edit->GnRH8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH8->selectOptionListHtml("x_GnRH8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH8->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH9->Visible) { // GnRH9 ?>
	<div id="r_GnRH9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH9" for="x_GnRH9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH9" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH9->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH9" type="text/html"><span id="el_ivf_stimulation_chart_GnRH9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH9" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH9->displayValueSeparatorAttribute() ?>" id="x_GnRH9" name="x_GnRH9"<?php echo $ivf_stimulation_chart_edit->GnRH9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH9->selectOptionListHtml("x_GnRH9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH9->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH10->Visible) { // GnRH10 ?>
	<div id="r_GnRH10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH10" for="x_GnRH10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH10" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH10->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH10" type="text/html"><span id="el_ivf_stimulation_chart_GnRH10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH10" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH10->displayValueSeparatorAttribute() ?>" id="x_GnRH10" name="x_GnRH10"<?php echo $ivf_stimulation_chart_edit->GnRH10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH10->selectOptionListHtml("x_GnRH10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH10->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH11->Visible) { // GnRH11 ?>
	<div id="r_GnRH11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH11" for="x_GnRH11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH11" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH11->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH11" type="text/html"><span id="el_ivf_stimulation_chart_GnRH11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH11" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH11->displayValueSeparatorAttribute() ?>" id="x_GnRH11" name="x_GnRH11"<?php echo $ivf_stimulation_chart_edit->GnRH11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH11->selectOptionListHtml("x_GnRH11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH11->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH12->Visible) { // GnRH12 ?>
	<div id="r_GnRH12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH12" for="x_GnRH12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH12" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH12->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH12" type="text/html"><span id="el_ivf_stimulation_chart_GnRH12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH12" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH12->displayValueSeparatorAttribute() ?>" id="x_GnRH12" name="x_GnRH12"<?php echo $ivf_stimulation_chart_edit->GnRH12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH12->selectOptionListHtml("x_GnRH12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH12->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH13->Visible) { // GnRH13 ?>
	<div id="r_GnRH13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH13" for="x_GnRH13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH13" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH13->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH13" type="text/html"><span id="el_ivf_stimulation_chart_GnRH13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH13" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH13->displayValueSeparatorAttribute() ?>" id="x_GnRH13" name="x_GnRH13"<?php echo $ivf_stimulation_chart_edit->GnRH13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH13->selectOptionListHtml("x_GnRH13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH13->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E21->Visible) { // E21 ?>
	<div id="r_E21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E21" for="x_E21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E21" type="text/html"><?php echo $ivf_stimulation_chart_edit->E21->caption() ?><?php echo $ivf_stimulation_chart_edit->E21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E21" type="text/html"><span id="el_ivf_stimulation_chart_E21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E21" name="x_E21" id="x_E21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E22->Visible) { // E22 ?>
	<div id="r_E22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E22" for="x_E22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E22" type="text/html"><?php echo $ivf_stimulation_chart_edit->E22->caption() ?><?php echo $ivf_stimulation_chart_edit->E22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E22" type="text/html"><span id="el_ivf_stimulation_chart_E22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E22" name="x_E22" id="x_E22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E23->Visible) { // E23 ?>
	<div id="r_E23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E23" for="x_E23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E23" type="text/html"><?php echo $ivf_stimulation_chart_edit->E23->caption() ?><?php echo $ivf_stimulation_chart_edit->E23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E23" type="text/html"><span id="el_ivf_stimulation_chart_E23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E23" name="x_E23" id="x_E23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E24->Visible) { // E24 ?>
	<div id="r_E24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E24" for="x_E24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E24" type="text/html"><?php echo $ivf_stimulation_chart_edit->E24->caption() ?><?php echo $ivf_stimulation_chart_edit->E24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E24" type="text/html"><span id="el_ivf_stimulation_chart_E24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E24" name="x_E24" id="x_E24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E25->Visible) { // E25 ?>
	<div id="r_E25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E25" for="x_E25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E25" type="text/html"><?php echo $ivf_stimulation_chart_edit->E25->caption() ?><?php echo $ivf_stimulation_chart_edit->E25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E25" type="text/html"><span id="el_ivf_stimulation_chart_E25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E25" name="x_E25" id="x_E25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E26->Visible) { // E26 ?>
	<div id="r_E26" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E26" for="x_E26" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E26" type="text/html"><?php echo $ivf_stimulation_chart_edit->E26->caption() ?><?php echo $ivf_stimulation_chart_edit->E26->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E26->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E26" type="text/html"><span id="el_ivf_stimulation_chart_E26">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E26" name="x_E26" id="x_E26" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E26->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E26->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E26->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E26->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E27->Visible) { // E27 ?>
	<div id="r_E27" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E27" for="x_E27" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E27" type="text/html"><?php echo $ivf_stimulation_chart_edit->E27->caption() ?><?php echo $ivf_stimulation_chart_edit->E27->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E27->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E27" type="text/html"><span id="el_ivf_stimulation_chart_E27">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E27" name="x_E27" id="x_E27" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E27->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E27->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E27->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E27->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E28->Visible) { // E28 ?>
	<div id="r_E28" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E28" for="x_E28" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E28" type="text/html"><?php echo $ivf_stimulation_chart_edit->E28->caption() ?><?php echo $ivf_stimulation_chart_edit->E28->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E28->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E28" type="text/html"><span id="el_ivf_stimulation_chart_E28">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E28" name="x_E28" id="x_E28" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E28->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E28->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E28->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E28->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E29->Visible) { // E29 ?>
	<div id="r_E29" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E29" for="x_E29" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E29" type="text/html"><?php echo $ivf_stimulation_chart_edit->E29->caption() ?><?php echo $ivf_stimulation_chart_edit->E29->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E29->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E29" type="text/html"><span id="el_ivf_stimulation_chart_E29">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E29" name="x_E29" id="x_E29" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E29->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E29->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E29->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E29->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E210->Visible) { // E210 ?>
	<div id="r_E210" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E210" for="x_E210" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E210" type="text/html"><?php echo $ivf_stimulation_chart_edit->E210->caption() ?><?php echo $ivf_stimulation_chart_edit->E210->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E210->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E210" type="text/html"><span id="el_ivf_stimulation_chart_E210">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E210" name="x_E210" id="x_E210" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E210->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E210->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E210->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E210->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E211->Visible) { // E211 ?>
	<div id="r_E211" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E211" for="x_E211" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E211" type="text/html"><?php echo $ivf_stimulation_chart_edit->E211->caption() ?><?php echo $ivf_stimulation_chart_edit->E211->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E211->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E211" type="text/html"><span id="el_ivf_stimulation_chart_E211">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E211" name="x_E211" id="x_E211" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E211->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E211->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E211->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E211->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E212->Visible) { // E212 ?>
	<div id="r_E212" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E212" for="x_E212" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E212" type="text/html"><?php echo $ivf_stimulation_chart_edit->E212->caption() ?><?php echo $ivf_stimulation_chart_edit->E212->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E212->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E212" type="text/html"><span id="el_ivf_stimulation_chart_E212">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E212" name="x_E212" id="x_E212" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E212->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E212->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E212->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E212->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E213->Visible) { // E213 ?>
	<div id="r_E213" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E213" for="x_E213" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E213" type="text/html"><?php echo $ivf_stimulation_chart_edit->E213->caption() ?><?php echo $ivf_stimulation_chart_edit->E213->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E213->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E213" type="text/html"><span id="el_ivf_stimulation_chart_E213">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E213" name="x_E213" id="x_E213" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E213->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E213->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E213->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E213->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P41->Visible) { // P41 ?>
	<div id="r_P41" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P41" for="x_P41" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P41" type="text/html"><?php echo $ivf_stimulation_chart_edit->P41->caption() ?><?php echo $ivf_stimulation_chart_edit->P41->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P41->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P41" type="text/html"><span id="el_ivf_stimulation_chart_P41">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P41" name="x_P41" id="x_P41" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P41->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P41->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P41->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P41->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P42->Visible) { // P42 ?>
	<div id="r_P42" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P42" for="x_P42" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P42" type="text/html"><?php echo $ivf_stimulation_chart_edit->P42->caption() ?><?php echo $ivf_stimulation_chart_edit->P42->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P42->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P42" type="text/html"><span id="el_ivf_stimulation_chart_P42">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P42" name="x_P42" id="x_P42" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P42->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P42->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P42->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P42->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P43->Visible) { // P43 ?>
	<div id="r_P43" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P43" for="x_P43" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P43" type="text/html"><?php echo $ivf_stimulation_chart_edit->P43->caption() ?><?php echo $ivf_stimulation_chart_edit->P43->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P43->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P43" type="text/html"><span id="el_ivf_stimulation_chart_P43">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P43" name="x_P43" id="x_P43" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P43->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P43->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P43->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P43->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P44->Visible) { // P44 ?>
	<div id="r_P44" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P44" for="x_P44" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P44" type="text/html"><?php echo $ivf_stimulation_chart_edit->P44->caption() ?><?php echo $ivf_stimulation_chart_edit->P44->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P44->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P44" type="text/html"><span id="el_ivf_stimulation_chart_P44">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P44" name="x_P44" id="x_P44" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P44->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P44->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P44->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P44->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P45->Visible) { // P45 ?>
	<div id="r_P45" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P45" for="x_P45" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P45" type="text/html"><?php echo $ivf_stimulation_chart_edit->P45->caption() ?><?php echo $ivf_stimulation_chart_edit->P45->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P45->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P45" type="text/html"><span id="el_ivf_stimulation_chart_P45">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P45" name="x_P45" id="x_P45" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P45->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P45->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P45->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P45->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P46->Visible) { // P46 ?>
	<div id="r_P46" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P46" for="x_P46" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P46" type="text/html"><?php echo $ivf_stimulation_chart_edit->P46->caption() ?><?php echo $ivf_stimulation_chart_edit->P46->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P46->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P46" type="text/html"><span id="el_ivf_stimulation_chart_P46">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P46" name="x_P46" id="x_P46" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P46->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P46->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P46->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P46->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P47->Visible) { // P47 ?>
	<div id="r_P47" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P47" for="x_P47" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P47" type="text/html"><?php echo $ivf_stimulation_chart_edit->P47->caption() ?><?php echo $ivf_stimulation_chart_edit->P47->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P47->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P47" type="text/html"><span id="el_ivf_stimulation_chart_P47">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P47" name="x_P47" id="x_P47" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P47->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P47->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P47->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P47->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P48->Visible) { // P48 ?>
	<div id="r_P48" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P48" for="x_P48" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P48" type="text/html"><?php echo $ivf_stimulation_chart_edit->P48->caption() ?><?php echo $ivf_stimulation_chart_edit->P48->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P48->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P48" type="text/html"><span id="el_ivf_stimulation_chart_P48">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P48" name="x_P48" id="x_P48" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P48->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P48->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P48->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P48->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P49->Visible) { // P49 ?>
	<div id="r_P49" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P49" for="x_P49" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P49" type="text/html"><?php echo $ivf_stimulation_chart_edit->P49->caption() ?><?php echo $ivf_stimulation_chart_edit->P49->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P49->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P49" type="text/html"><span id="el_ivf_stimulation_chart_P49">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P49" name="x_P49" id="x_P49" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P49->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P49->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P49->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P49->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P410->Visible) { // P410 ?>
	<div id="r_P410" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P410" for="x_P410" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P410" type="text/html"><?php echo $ivf_stimulation_chart_edit->P410->caption() ?><?php echo $ivf_stimulation_chart_edit->P410->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P410->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P410" type="text/html"><span id="el_ivf_stimulation_chart_P410">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P410" name="x_P410" id="x_P410" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P410->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P410->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P410->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P410->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P411->Visible) { // P411 ?>
	<div id="r_P411" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P411" for="x_P411" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P411" type="text/html"><?php echo $ivf_stimulation_chart_edit->P411->caption() ?><?php echo $ivf_stimulation_chart_edit->P411->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P411->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P411" type="text/html"><span id="el_ivf_stimulation_chart_P411">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P411" name="x_P411" id="x_P411" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P411->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P411->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P411->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P411->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P412->Visible) { // P412 ?>
	<div id="r_P412" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P412" for="x_P412" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P412" type="text/html"><?php echo $ivf_stimulation_chart_edit->P412->caption() ?><?php echo $ivf_stimulation_chart_edit->P412->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P412->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P412" type="text/html"><span id="el_ivf_stimulation_chart_P412">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P412" name="x_P412" id="x_P412" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P412->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P412->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P412->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P412->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P413->Visible) { // P413 ?>
	<div id="r_P413" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P413" for="x_P413" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P413" type="text/html"><?php echo $ivf_stimulation_chart_edit->P413->caption() ?><?php echo $ivf_stimulation_chart_edit->P413->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P413->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P413" type="text/html"><span id="el_ivf_stimulation_chart_P413">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P413" name="x_P413" id="x_P413" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P413->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P413->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P413->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P413->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt1->Visible) { // USGRt1 ?>
	<div id="r_USGRt1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt1" for="x_USGRt1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt1" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt1->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt1" type="text/html"><span id="el_ivf_stimulation_chart_USGRt1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt1" name="x_USGRt1" id="x_USGRt1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt2->Visible) { // USGRt2 ?>
	<div id="r_USGRt2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt2" for="x_USGRt2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt2" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt2->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt2" type="text/html"><span id="el_ivf_stimulation_chart_USGRt2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt2" name="x_USGRt2" id="x_USGRt2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt3->Visible) { // USGRt3 ?>
	<div id="r_USGRt3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt3" for="x_USGRt3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt3" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt3->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt3" type="text/html"><span id="el_ivf_stimulation_chart_USGRt3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt3" name="x_USGRt3" id="x_USGRt3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt4->Visible) { // USGRt4 ?>
	<div id="r_USGRt4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt4" for="x_USGRt4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt4" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt4->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt4" type="text/html"><span id="el_ivf_stimulation_chart_USGRt4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt4" name="x_USGRt4" id="x_USGRt4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt5->Visible) { // USGRt5 ?>
	<div id="r_USGRt5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt5" for="x_USGRt5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt5" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt5->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt5" type="text/html"><span id="el_ivf_stimulation_chart_USGRt5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt5" name="x_USGRt5" id="x_USGRt5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt6->Visible) { // USGRt6 ?>
	<div id="r_USGRt6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt6" for="x_USGRt6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt6" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt6->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt6" type="text/html"><span id="el_ivf_stimulation_chart_USGRt6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt6" name="x_USGRt6" id="x_USGRt6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt7->Visible) { // USGRt7 ?>
	<div id="r_USGRt7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt7" for="x_USGRt7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt7" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt7->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt7" type="text/html"><span id="el_ivf_stimulation_chart_USGRt7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt7" name="x_USGRt7" id="x_USGRt7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt8->Visible) { // USGRt8 ?>
	<div id="r_USGRt8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt8" for="x_USGRt8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt8" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt8->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt8" type="text/html"><span id="el_ivf_stimulation_chart_USGRt8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt8" name="x_USGRt8" id="x_USGRt8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt9->Visible) { // USGRt9 ?>
	<div id="r_USGRt9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt9" for="x_USGRt9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt9" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt9->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt9" type="text/html"><span id="el_ivf_stimulation_chart_USGRt9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt9" name="x_USGRt9" id="x_USGRt9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt10->Visible) { // USGRt10 ?>
	<div id="r_USGRt10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt10" for="x_USGRt10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt10" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt10->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt10" type="text/html"><span id="el_ivf_stimulation_chart_USGRt10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt10" name="x_USGRt10" id="x_USGRt10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt11->Visible) { // USGRt11 ?>
	<div id="r_USGRt11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt11" for="x_USGRt11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt11" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt11->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt11" type="text/html"><span id="el_ivf_stimulation_chart_USGRt11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt11" name="x_USGRt11" id="x_USGRt11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt12->Visible) { // USGRt12 ?>
	<div id="r_USGRt12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt12" for="x_USGRt12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt12" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt12->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt12" type="text/html"><span id="el_ivf_stimulation_chart_USGRt12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt12" name="x_USGRt12" id="x_USGRt12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt13->Visible) { // USGRt13 ?>
	<div id="r_USGRt13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt13" for="x_USGRt13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt13" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt13->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt13" type="text/html"><span id="el_ivf_stimulation_chart_USGRt13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt13" name="x_USGRt13" id="x_USGRt13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt1->Visible) { // USGLt1 ?>
	<div id="r_USGLt1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt1" for="x_USGLt1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt1" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt1->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt1" type="text/html"><span id="el_ivf_stimulation_chart_USGLt1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt1" name="x_USGLt1" id="x_USGLt1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt2->Visible) { // USGLt2 ?>
	<div id="r_USGLt2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt2" for="x_USGLt2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt2" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt2->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt2" type="text/html"><span id="el_ivf_stimulation_chart_USGLt2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt2" name="x_USGLt2" id="x_USGLt2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt3->Visible) { // USGLt3 ?>
	<div id="r_USGLt3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt3" for="x_USGLt3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt3" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt3->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt3" type="text/html"><span id="el_ivf_stimulation_chart_USGLt3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt3" name="x_USGLt3" id="x_USGLt3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt4->Visible) { // USGLt4 ?>
	<div id="r_USGLt4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt4" for="x_USGLt4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt4" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt4->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt4" type="text/html"><span id="el_ivf_stimulation_chart_USGLt4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt4" name="x_USGLt4" id="x_USGLt4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt5->Visible) { // USGLt5 ?>
	<div id="r_USGLt5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt5" for="x_USGLt5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt5" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt5->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt5" type="text/html"><span id="el_ivf_stimulation_chart_USGLt5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt5" name="x_USGLt5" id="x_USGLt5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt6->Visible) { // USGLt6 ?>
	<div id="r_USGLt6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt6" for="x_USGLt6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt6" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt6->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt6" type="text/html"><span id="el_ivf_stimulation_chart_USGLt6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt6" name="x_USGLt6" id="x_USGLt6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt7->Visible) { // USGLt7 ?>
	<div id="r_USGLt7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt7" for="x_USGLt7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt7" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt7->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt7" type="text/html"><span id="el_ivf_stimulation_chart_USGLt7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt7" name="x_USGLt7" id="x_USGLt7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt8->Visible) { // USGLt8 ?>
	<div id="r_USGLt8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt8" for="x_USGLt8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt8" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt8->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt8" type="text/html"><span id="el_ivf_stimulation_chart_USGLt8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt8" name="x_USGLt8" id="x_USGLt8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt9->Visible) { // USGLt9 ?>
	<div id="r_USGLt9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt9" for="x_USGLt9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt9" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt9->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt9" type="text/html"><span id="el_ivf_stimulation_chart_USGLt9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt9" name="x_USGLt9" id="x_USGLt9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt10->Visible) { // USGLt10 ?>
	<div id="r_USGLt10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt10" for="x_USGLt10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt10" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt10->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt10" type="text/html"><span id="el_ivf_stimulation_chart_USGLt10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt10" name="x_USGLt10" id="x_USGLt10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt11->Visible) { // USGLt11 ?>
	<div id="r_USGLt11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt11" for="x_USGLt11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt11" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt11->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt11" type="text/html"><span id="el_ivf_stimulation_chart_USGLt11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt11" name="x_USGLt11" id="x_USGLt11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt12->Visible) { // USGLt12 ?>
	<div id="r_USGLt12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt12" for="x_USGLt12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt12" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt12->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt12" type="text/html"><span id="el_ivf_stimulation_chart_USGLt12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt12" name="x_USGLt12" id="x_USGLt12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt13->Visible) { // USGLt13 ?>
	<div id="r_USGLt13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt13" for="x_USGLt13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt13" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt13->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt13" type="text/html"><span id="el_ivf_stimulation_chart_USGLt13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt13" name="x_USGLt13" id="x_USGLt13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM1->Visible) { // EM1 ?>
	<div id="r_EM1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM1" for="x_EM1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM1" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM1->caption() ?><?php echo $ivf_stimulation_chart_edit->EM1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM1" type="text/html"><span id="el_ivf_stimulation_chart_EM1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM1" name="x_EM1" id="x_EM1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM2->Visible) { // EM2 ?>
	<div id="r_EM2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM2" for="x_EM2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM2" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM2->caption() ?><?php echo $ivf_stimulation_chart_edit->EM2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM2" type="text/html"><span id="el_ivf_stimulation_chart_EM2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM2" name="x_EM2" id="x_EM2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM3->Visible) { // EM3 ?>
	<div id="r_EM3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM3" for="x_EM3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM3" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM3->caption() ?><?php echo $ivf_stimulation_chart_edit->EM3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM3" type="text/html"><span id="el_ivf_stimulation_chart_EM3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM3" name="x_EM3" id="x_EM3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM4->Visible) { // EM4 ?>
	<div id="r_EM4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM4" for="x_EM4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM4" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM4->caption() ?><?php echo $ivf_stimulation_chart_edit->EM4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM4" type="text/html"><span id="el_ivf_stimulation_chart_EM4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM4" name="x_EM4" id="x_EM4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM5->Visible) { // EM5 ?>
	<div id="r_EM5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM5" for="x_EM5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM5" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM5->caption() ?><?php echo $ivf_stimulation_chart_edit->EM5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM5" type="text/html"><span id="el_ivf_stimulation_chart_EM5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM5" name="x_EM5" id="x_EM5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM6->Visible) { // EM6 ?>
	<div id="r_EM6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM6" for="x_EM6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM6" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM6->caption() ?><?php echo $ivf_stimulation_chart_edit->EM6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM6" type="text/html"><span id="el_ivf_stimulation_chart_EM6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM6" name="x_EM6" id="x_EM6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM7->Visible) { // EM7 ?>
	<div id="r_EM7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM7" for="x_EM7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM7" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM7->caption() ?><?php echo $ivf_stimulation_chart_edit->EM7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM7" type="text/html"><span id="el_ivf_stimulation_chart_EM7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM7" name="x_EM7" id="x_EM7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM8->Visible) { // EM8 ?>
	<div id="r_EM8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM8" for="x_EM8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM8" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM8->caption() ?><?php echo $ivf_stimulation_chart_edit->EM8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM8" type="text/html"><span id="el_ivf_stimulation_chart_EM8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM8" name="x_EM8" id="x_EM8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM9->Visible) { // EM9 ?>
	<div id="r_EM9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM9" for="x_EM9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM9" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM9->caption() ?><?php echo $ivf_stimulation_chart_edit->EM9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM9" type="text/html"><span id="el_ivf_stimulation_chart_EM9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM9" name="x_EM9" id="x_EM9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM10->Visible) { // EM10 ?>
	<div id="r_EM10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM10" for="x_EM10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM10" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM10->caption() ?><?php echo $ivf_stimulation_chart_edit->EM10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM10" type="text/html"><span id="el_ivf_stimulation_chart_EM10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM10" name="x_EM10" id="x_EM10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM11->Visible) { // EM11 ?>
	<div id="r_EM11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM11" for="x_EM11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM11" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM11->caption() ?><?php echo $ivf_stimulation_chart_edit->EM11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM11" type="text/html"><span id="el_ivf_stimulation_chart_EM11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM11" name="x_EM11" id="x_EM11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM12->Visible) { // EM12 ?>
	<div id="r_EM12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM12" for="x_EM12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM12" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM12->caption() ?><?php echo $ivf_stimulation_chart_edit->EM12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM12" type="text/html"><span id="el_ivf_stimulation_chart_EM12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM12" name="x_EM12" id="x_EM12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM13->Visible) { // EM13 ?>
	<div id="r_EM13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM13" for="x_EM13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM13" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM13->caption() ?><?php echo $ivf_stimulation_chart_edit->EM13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM13" type="text/html"><span id="el_ivf_stimulation_chart_EM13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM13" name="x_EM13" id="x_EM13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others1->Visible) { // Others1 ?>
	<div id="r_Others1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others1" for="x_Others1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others1" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others1->caption() ?><?php echo $ivf_stimulation_chart_edit->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others1" type="text/html"><span id="el_ivf_stimulation_chart_Others1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others2->Visible) { // Others2 ?>
	<div id="r_Others2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others2" for="x_Others2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others2" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others2->caption() ?><?php echo $ivf_stimulation_chart_edit->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others2" type="text/html"><span id="el_ivf_stimulation_chart_Others2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others3->Visible) { // Others3 ?>
	<div id="r_Others3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others3" for="x_Others3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others3" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others3->caption() ?><?php echo $ivf_stimulation_chart_edit->Others3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others3" type="text/html"><span id="el_ivf_stimulation_chart_Others3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others3" name="x_Others3" id="x_Others3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others4->Visible) { // Others4 ?>
	<div id="r_Others4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others4" for="x_Others4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others4" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others4->caption() ?><?php echo $ivf_stimulation_chart_edit->Others4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others4" type="text/html"><span id="el_ivf_stimulation_chart_Others4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others4" name="x_Others4" id="x_Others4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others5->Visible) { // Others5 ?>
	<div id="r_Others5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others5" for="x_Others5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others5" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others5->caption() ?><?php echo $ivf_stimulation_chart_edit->Others5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others5" type="text/html"><span id="el_ivf_stimulation_chart_Others5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others5" name="x_Others5" id="x_Others5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others6->Visible) { // Others6 ?>
	<div id="r_Others6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others6" for="x_Others6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others6" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others6->caption() ?><?php echo $ivf_stimulation_chart_edit->Others6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others6" type="text/html"><span id="el_ivf_stimulation_chart_Others6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others6" name="x_Others6" id="x_Others6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others7->Visible) { // Others7 ?>
	<div id="r_Others7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others7" for="x_Others7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others7" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others7->caption() ?><?php echo $ivf_stimulation_chart_edit->Others7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others7" type="text/html"><span id="el_ivf_stimulation_chart_Others7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others7" name="x_Others7" id="x_Others7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others8->Visible) { // Others8 ?>
	<div id="r_Others8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others8" for="x_Others8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others8" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others8->caption() ?><?php echo $ivf_stimulation_chart_edit->Others8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others8" type="text/html"><span id="el_ivf_stimulation_chart_Others8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others8" name="x_Others8" id="x_Others8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others9->Visible) { // Others9 ?>
	<div id="r_Others9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others9" for="x_Others9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others9" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others9->caption() ?><?php echo $ivf_stimulation_chart_edit->Others9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others9" type="text/html"><span id="el_ivf_stimulation_chart_Others9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others9" name="x_Others9" id="x_Others9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others10->Visible) { // Others10 ?>
	<div id="r_Others10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others10" for="x_Others10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others10" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others10->caption() ?><?php echo $ivf_stimulation_chart_edit->Others10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others10" type="text/html"><span id="el_ivf_stimulation_chart_Others10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others10" name="x_Others10" id="x_Others10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others11->Visible) { // Others11 ?>
	<div id="r_Others11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others11" for="x_Others11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others11" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others11->caption() ?><?php echo $ivf_stimulation_chart_edit->Others11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others11" type="text/html"><span id="el_ivf_stimulation_chart_Others11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others11" name="x_Others11" id="x_Others11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others12->Visible) { // Others12 ?>
	<div id="r_Others12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others12" for="x_Others12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others12" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others12->caption() ?><?php echo $ivf_stimulation_chart_edit->Others12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others12" type="text/html"><span id="el_ivf_stimulation_chart_Others12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others12" name="x_Others12" id="x_Others12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others13->Visible) { // Others13 ?>
	<div id="r_Others13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others13" for="x_Others13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others13" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others13->caption() ?><?php echo $ivf_stimulation_chart_edit->Others13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others13" type="text/html"><span id="el_ivf_stimulation_chart_Others13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others13" name="x_Others13" id="x_Others13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR1->Visible) { // DR1 ?>
	<div id="r_DR1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR1" for="x_DR1" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR1" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR1->caption() ?><?php echo $ivf_stimulation_chart_edit->DR1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR1" type="text/html"><span id="el_ivf_stimulation_chart_DR1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR1" name="x_DR1" id="x_DR1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR1->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR2->Visible) { // DR2 ?>
	<div id="r_DR2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR2" for="x_DR2" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR2" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR2->caption() ?><?php echo $ivf_stimulation_chart_edit->DR2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR2" type="text/html"><span id="el_ivf_stimulation_chart_DR2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR2" name="x_DR2" id="x_DR2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR2->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR3->Visible) { // DR3 ?>
	<div id="r_DR3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR3" for="x_DR3" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR3" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR3->caption() ?><?php echo $ivf_stimulation_chart_edit->DR3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR3" type="text/html"><span id="el_ivf_stimulation_chart_DR3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR3" name="x_DR3" id="x_DR3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR3->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR4->Visible) { // DR4 ?>
	<div id="r_DR4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR4" for="x_DR4" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR4" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR4->caption() ?><?php echo $ivf_stimulation_chart_edit->DR4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR4" type="text/html"><span id="el_ivf_stimulation_chart_DR4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR4" name="x_DR4" id="x_DR4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR4->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR5->Visible) { // DR5 ?>
	<div id="r_DR5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR5" for="x_DR5" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR5" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR5->caption() ?><?php echo $ivf_stimulation_chart_edit->DR5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR5" type="text/html"><span id="el_ivf_stimulation_chart_DR5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR5" name="x_DR5" id="x_DR5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR5->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR6->Visible) { // DR6 ?>
	<div id="r_DR6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR6" for="x_DR6" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR6" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR6->caption() ?><?php echo $ivf_stimulation_chart_edit->DR6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR6" type="text/html"><span id="el_ivf_stimulation_chart_DR6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR6" name="x_DR6" id="x_DR6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR6->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR7->Visible) { // DR7 ?>
	<div id="r_DR7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR7" for="x_DR7" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR7" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR7->caption() ?><?php echo $ivf_stimulation_chart_edit->DR7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR7" type="text/html"><span id="el_ivf_stimulation_chart_DR7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR7" name="x_DR7" id="x_DR7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR7->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR8->Visible) { // DR8 ?>
	<div id="r_DR8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR8" for="x_DR8" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR8" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR8->caption() ?><?php echo $ivf_stimulation_chart_edit->DR8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR8" type="text/html"><span id="el_ivf_stimulation_chart_DR8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR8" name="x_DR8" id="x_DR8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR8->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR9->Visible) { // DR9 ?>
	<div id="r_DR9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR9" for="x_DR9" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR9" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR9->caption() ?><?php echo $ivf_stimulation_chart_edit->DR9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR9" type="text/html"><span id="el_ivf_stimulation_chart_DR9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR9" name="x_DR9" id="x_DR9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR9->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR10->Visible) { // DR10 ?>
	<div id="r_DR10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR10" for="x_DR10" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR10" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR10->caption() ?><?php echo $ivf_stimulation_chart_edit->DR10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR10" type="text/html"><span id="el_ivf_stimulation_chart_DR10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR10" name="x_DR10" id="x_DR10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR10->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR11->Visible) { // DR11 ?>
	<div id="r_DR11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR11" for="x_DR11" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR11" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR11->caption() ?><?php echo $ivf_stimulation_chart_edit->DR11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR11" type="text/html"><span id="el_ivf_stimulation_chart_DR11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR11" name="x_DR11" id="x_DR11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR11->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR12->Visible) { // DR12 ?>
	<div id="r_DR12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR12" for="x_DR12" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR12" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR12->caption() ?><?php echo $ivf_stimulation_chart_edit->DR12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR12" type="text/html"><span id="el_ivf_stimulation_chart_DR12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR12" name="x_DR12" id="x_DR12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR12->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR13->Visible) { // DR13 ?>
	<div id="r_DR13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR13" for="x_DR13" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR13" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR13->caption() ?><?php echo $ivf_stimulation_chart_edit->DR13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR13" type="text/html"><span id="el_ivf_stimulation_chart_DR13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR13" name="x_DR13" id="x_DR13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR13->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
	<div id="r_DOCTORRESPONSIBLE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE" for="x_DOCTORRESPONSIBLE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->caption() ?><?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<textarea data-table="ivf_stimulation_chart" data-field="x_DOCTORRESPONSIBLE" name="x_DOCTORRESPONSIBLE" id="x_DOCTORRESPONSIBLE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->getPlaceHolder()) ?>"<?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->editAttributes() ?>><?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->EditValue ?></textarea>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DOCTORRESPONSIBLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TidNo" type="text/html"><?php echo $ivf_stimulation_chart_edit->TidNo->caption() ?><?php echo $ivf_stimulation_chart_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TidNo->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_edit->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_TidNo" type="text/html"><span id="el_ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart_edit->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_edit->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_stimulation_chart_edit->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_TidNo" type="text/html"><span id="el_ivf_stimulation_chart_TidNo">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->TidNo->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Convert->Visible) { // Convert ?>
	<div id="r_Convert" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Convert" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Convert" type="text/html"><?php echo $ivf_stimulation_chart_edit->Convert->caption() ?><?php echo $ivf_stimulation_chart_edit->Convert->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Convert->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Convert" type="text/html"><span id="el_ivf_stimulation_chart_Convert">
<div id="tp_x_Convert" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Convert" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Convert->displayValueSeparatorAttribute() ?>" name="x_Convert[]" id="x_Convert[]" value="{value}"<?php echo $ivf_stimulation_chart_edit->Convert->editAttributes() ?>></div>
<div id="dsl_x_Convert" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_edit->Convert->checkBoxListHtml(FALSE, "x_Convert[]") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Convert->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Consultant" type="text/html"><?php echo $ivf_stimulation_chart_edit->Consultant->caption() ?><?php echo $ivf_stimulation_chart_edit->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Consultant" type="text/html"><span id="el_ivf_stimulation_chart_Consultant">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Consultant->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Consultant->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_stimulation_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->caption() ?><?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><span id="el_ivf_stimulation_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x_InseminatinTechnique" name="x_InseminatinTechnique"<?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label id="elh_ivf_stimulation_chart_IndicationForART" for="x_IndicationForART" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_IndicationForART" type="text/html"><?php echo $ivf_stimulation_chart_edit->IndicationForART->caption() ?><?php echo $ivf_stimulation_chart_edit->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IndicationForART" type="text/html"><span id="el_ivf_stimulation_chart_IndicationForART">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_IndicationForART" data-value-separator="<?php echo $ivf_stimulation_chart_edit->IndicationForART->displayValueSeparatorAttribute() ?>" id="x_IndicationForART" name="x_IndicationForART"<?php echo $ivf_stimulation_chart_edit->IndicationForART->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->IndicationForART->selectOptionListHtml("x_IndicationForART") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<div id="r_Hysteroscopy" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Hysteroscopy" type="text/html"><?php echo $ivf_stimulation_chart_edit->Hysteroscopy->caption() ?><?php echo $ivf_stimulation_chart_edit->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Hysteroscopy" type="text/html"><span id="el_ivf_stimulation_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x_Hysteroscopy" name="x_Hysteroscopy"<?php echo $ivf_stimulation_chart_edit->Hysteroscopy->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Hysteroscopy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<div id="r_EndometrialScratching" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EndometrialScratching" type="text/html"><?php echo $ivf_stimulation_chart_edit->EndometrialScratching->caption() ?><?php echo $ivf_stimulation_chart_edit->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EndometrialScratching" type="text/html"><span id="el_ivf_stimulation_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_stimulation_chart_edit->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x_EndometrialScratching" name="x_EndometrialScratching"<?php echo $ivf_stimulation_chart_edit->EndometrialScratching->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EndometrialScratching->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TrialCannulation" type="text/html"><?php echo $ivf_stimulation_chart_edit->TrialCannulation->caption() ?><?php echo $ivf_stimulation_chart_edit->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TrialCannulation" type="text/html"><span id="el_ivf_stimulation_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x_TrialCannulation" name="x_TrialCannulation"<?php echo $ivf_stimulation_chart_edit->TrialCannulation->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<div id="r_CYCLETYPE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CYCLETYPE" type="text/html"><?php echo $ivf_stimulation_chart_edit->CYCLETYPE->caption() ?><?php echo $ivf_stimulation_chart_edit->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CYCLETYPE" type="text/html"><span id="el_ivf_stimulation_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_stimulation_chart_edit->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x_CYCLETYPE" name="x_CYCLETYPE"<?php echo $ivf_stimulation_chart_edit->CYCLETYPE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CYCLETYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<div id="r_HRTCYCLE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HRTCYCLE" type="text/html"><?php echo $ivf_stimulation_chart_edit->HRTCYCLE->caption() ?><?php echo $ivf_stimulation_chart_edit->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HRTCYCLE" type="text/html"><span id="el_ivf_stimulation_chart_HRTCYCLE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->HRTCYCLE->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->HRTCYCLE->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HRTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<div id="r_OralEstrogenDosage" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->caption() ?><?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x_OralEstrogenDosage" name="x_OralEstrogenDosage"<?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->OralEstrogenDosage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<div id="r_VaginalEstrogen" class="form-group row">
		<label id="elh_ivf_stimulation_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->caption() ?><?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><span id="el_ivf_stimulation_chart_VaginalEstrogen">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->VaginalEstrogen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GCSF->Visible) { // GCSF ?>
	<div id="r_GCSF" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GCSF" for="x_GCSF" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GCSF" type="text/html"><?php echo $ivf_stimulation_chart_edit->GCSF->caption() ?><?php echo $ivf_stimulation_chart_edit->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GCSF" type="text/html"><span id="el_ivf_stimulation_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GCSF->displayValueSeparatorAttribute() ?>" id="x_GCSF" name="x_GCSF"<?php echo $ivf_stimulation_chart_edit->GCSF->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GCSF->selectOptionListHtml("x_GCSF") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GCSF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<div id="r_ActivatedPRP" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ActivatedPRP" type="text/html"><?php echo $ivf_stimulation_chart_edit->ActivatedPRP->caption() ?><?php echo $ivf_stimulation_chart_edit->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ActivatedPRP" type="text/html"><span id="el_ivf_stimulation_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_stimulation_chart_edit->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x_ActivatedPRP" name="x_ActivatedPRP"<?php echo $ivf_stimulation_chart_edit->ActivatedPRP->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ActivatedPRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->UCLcm->Visible) { // UCLcm ?>
	<div id="r_UCLcm" class="form-group row">
		<label id="elh_ivf_stimulation_chart_UCLcm" for="x_UCLcm" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_UCLcm" type="text/html"><?php echo $ivf_stimulation_chart_edit->UCLcm->caption() ?><?php echo $ivf_stimulation_chart_edit->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UCLcm" type="text/html"><span id="el_ivf_stimulation_chart_UCLcm">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->UCLcm->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->UCLcm->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->UCLcm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<div id="r_DATOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" for="x_DATOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DATOFEMBRYOTRANSFER" name="x_DATOFEMBRYOTRANSFER" id="x_DATOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DATOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->caption() ?><?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTHAWED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->NOOFEMBRYOSTRANSFERRED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<div id="r_DAYOFEMBRYOS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->caption() ?><?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DAYOFEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CRYOPRESERVEDEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ViaAdmin->Visible) { // ViaAdmin ?>
	<div id="r_ViaAdmin" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaAdmin" for="x_ViaAdmin" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaAdmin" type="text/html"><?php echo $ivf_stimulation_chart_edit->ViaAdmin->caption() ?><?php echo $ivf_stimulation_chart_edit->ViaAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ViaAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ViaAdmin">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaAdmin" name="x_ViaAdmin" id="x_ViaAdmin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ViaAdmin->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ViaAdmin->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ViaAdmin->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ViaAdmin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<div id="r_ViaStartDateTime" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaStartDateTime" for="x_ViaStartDateTime" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->caption() ?><?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><span id="el_ivf_stimulation_chart_ViaStartDateTime">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaStartDateTime" name="x_ViaStartDateTime" id="x_ViaStartDateTime" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ViaStartDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->ViaStartDateTime->ReadOnly && !$ivf_stimulation_chart_edit->ViaStartDateTime->Disabled && !isset($ivf_stimulation_chart_edit->ViaStartDateTime->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->ViaStartDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_ViaStartDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_stimulation_chart_edit->ViaStartDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ViaDose->Visible) { // ViaDose ?>
	<div id="r_ViaDose" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaDose" for="x_ViaDose" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaDose" type="text/html"><?php echo $ivf_stimulation_chart_edit->ViaDose->caption() ?><?php echo $ivf_stimulation_chart_edit->ViaDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ViaDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaDose" type="text/html"><span id="el_ivf_stimulation_chart_ViaDose">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaDose" name="x_ViaDose" id="x_ViaDose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ViaDose->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ViaDose->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ViaDose->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ViaDose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->AllFreeze->Visible) { // AllFreeze ?>
	<div id="r_AllFreeze" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AllFreeze" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AllFreeze" type="text/html"><?php echo $ivf_stimulation_chart_edit->AllFreeze->caption() ?><?php echo $ivf_stimulation_chart_edit->AllFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->AllFreeze->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AllFreeze" type="text/html"><span id="el_ivf_stimulation_chart_AllFreeze">
<div id="tp_x_AllFreeze" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_AllFreeze" data-value-separator="<?php echo $ivf_stimulation_chart_edit->AllFreeze->displayValueSeparatorAttribute() ?>" name="x_AllFreeze" id="x_AllFreeze" value="{value}"<?php echo $ivf_stimulation_chart_edit->AllFreeze->editAttributes() ?>></div>
<div id="dsl_x_AllFreeze" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_edit->AllFreeze->radioButtonListHtml(FALSE, "x_AllFreeze") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->AllFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<div id="r_TreatmentCancel" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TreatmentCancel" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TreatmentCancel" type="text/html"><?php echo $ivf_stimulation_chart_edit->TreatmentCancel->caption() ?><?php echo $ivf_stimulation_chart_edit->TreatmentCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TreatmentCancel->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TreatmentCancel" type="text/html"><span id="el_ivf_stimulation_chart_TreatmentCancel">
<div id="tp_x_TreatmentCancel" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_TreatmentCancel" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TreatmentCancel->displayValueSeparatorAttribute() ?>" name="x_TreatmentCancel" id="x_TreatmentCancel" value="{value}"<?php echo $ivf_stimulation_chart_edit->TreatmentCancel->editAttributes() ?>></div>
<div id="dsl_x_TreatmentCancel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_edit->TreatmentCancel->radioButtonListHtml(FALSE, "x_TreatmentCancel") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TreatmentCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Reason" for="x_Reason" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Reason" type="text/html"><?php echo $ivf_stimulation_chart_edit->Reason->caption() ?><?php echo $ivf_stimulation_chart_edit->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Reason->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Reason" type="text/html"><span id="el_ivf_stimulation_chart_Reason">
<textarea data-table="ivf_stimulation_chart" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Reason->getPlaceHolder()) ?>"<?php echo $ivf_stimulation_chart_edit->Reason->editAttributes() ?>><?php echo $ivf_stimulation_chart_edit->Reason->EditValue ?></textarea>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Reason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<div id="r_ProgesteroneAdmin" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneAdmin" for="x_ProgesteroneAdmin" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->caption() ?><?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneAdmin" name="x_ProgesteroneAdmin" id="x_ProgesteroneAdmin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ProgesteroneAdmin->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ProgesteroneAdmin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<div id="r_ProgesteroneStart" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneStart" for="x_ProgesteroneStart" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->caption() ?><?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneStart">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneStart" name="x_ProgesteroneStart" id="x_ProgesteroneStart" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ProgesteroneStart->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->ProgesteroneStart->ReadOnly && !$ivf_stimulation_chart_edit->ProgesteroneStart->Disabled && !isset($ivf_stimulation_chart_edit->ProgesteroneStart->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->ProgesteroneStart->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_ProgesteroneStart", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_edit->ProgesteroneStart->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<div id="r_ProgesteroneDose" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneDose" for="x_ProgesteroneDose" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->caption() ?><?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneDose">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneDose" name="x_ProgesteroneDose" id="x_ProgesteroneDose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ProgesteroneDose->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ProgesteroneDose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Projectron->Visible) { // Projectron ?>
	<div id="r_Projectron" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Projectron" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Projectron" type="text/html"><?php echo $ivf_stimulation_chart_edit->Projectron->caption() ?><?php echo $ivf_stimulation_chart_edit->Projectron->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Projectron->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Projectron" type="text/html"><span id="el_ivf_stimulation_chart_Projectron">
<div id="tp_x_Projectron" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Projectron" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Projectron->displayValueSeparatorAttribute() ?>" name="x_Projectron" id="x_Projectron" value="{value}"<?php echo $ivf_stimulation_chart_edit->Projectron->editAttributes() ?>></div>
<div id="dsl_x_Projectron" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_edit->Projectron->radioButtonListHtml(FALSE, "x_Projectron") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Projectron->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate14->Visible) { // StChDate14 ?>
	<div id="r_StChDate14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate14" for="x_StChDate14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate14" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate14->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate14" type="text/html"><span id="el_ivf_stimulation_chart_StChDate14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate14" data-format="7" name="x_StChDate14" id="x_StChDate14" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate14->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate14->ReadOnly && !$ivf_stimulation_chart_edit->StChDate14->Disabled && !isset($ivf_stimulation_chart_edit->StChDate14->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate14->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate14", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate15->Visible) { // StChDate15 ?>
	<div id="r_StChDate15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate15" for="x_StChDate15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate15" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate15->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate15" type="text/html"><span id="el_ivf_stimulation_chart_StChDate15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate15" data-format="7" name="x_StChDate15" id="x_StChDate15" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate15->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate15->ReadOnly && !$ivf_stimulation_chart_edit->StChDate15->Disabled && !isset($ivf_stimulation_chart_edit->StChDate15->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate15->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate15", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate16->Visible) { // StChDate16 ?>
	<div id="r_StChDate16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate16" for="x_StChDate16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate16" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate16->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate16" type="text/html"><span id="el_ivf_stimulation_chart_StChDate16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate16" data-format="7" name="x_StChDate16" id="x_StChDate16" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate16->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate16->ReadOnly && !$ivf_stimulation_chart_edit->StChDate16->Disabled && !isset($ivf_stimulation_chart_edit->StChDate16->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate16->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate16", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate17->Visible) { // StChDate17 ?>
	<div id="r_StChDate17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate17" for="x_StChDate17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate17" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate17->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate17" type="text/html"><span id="el_ivf_stimulation_chart_StChDate17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate17" data-format="7" name="x_StChDate17" id="x_StChDate17" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate17->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate17->ReadOnly && !$ivf_stimulation_chart_edit->StChDate17->Disabled && !isset($ivf_stimulation_chart_edit->StChDate17->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate17->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate17", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate18->Visible) { // StChDate18 ?>
	<div id="r_StChDate18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate18" for="x_StChDate18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate18" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate18->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate18" type="text/html"><span id="el_ivf_stimulation_chart_StChDate18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate18" data-format="7" name="x_StChDate18" id="x_StChDate18" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate18->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate18->ReadOnly && !$ivf_stimulation_chart_edit->StChDate18->Disabled && !isset($ivf_stimulation_chart_edit->StChDate18->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate18->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate18", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate19->Visible) { // StChDate19 ?>
	<div id="r_StChDate19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate19" for="x_StChDate19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate19" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate19->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate19" type="text/html"><span id="el_ivf_stimulation_chart_StChDate19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate19" data-format="7" name="x_StChDate19" id="x_StChDate19" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate19->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate19->ReadOnly && !$ivf_stimulation_chart_edit->StChDate19->Disabled && !isset($ivf_stimulation_chart_edit->StChDate19->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate19->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate19", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate20->Visible) { // StChDate20 ?>
	<div id="r_StChDate20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate20" for="x_StChDate20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate20" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate20->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate20" type="text/html"><span id="el_ivf_stimulation_chart_StChDate20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate20" data-format="7" name="x_StChDate20" id="x_StChDate20" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate20->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate20->ReadOnly && !$ivf_stimulation_chart_edit->StChDate20->Disabled && !isset($ivf_stimulation_chart_edit->StChDate20->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate20->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate20", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate21->Visible) { // StChDate21 ?>
	<div id="r_StChDate21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate21" for="x_StChDate21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate21" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate21->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate21" type="text/html"><span id="el_ivf_stimulation_chart_StChDate21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate21" data-format="7" name="x_StChDate21" id="x_StChDate21" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate21->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate21->ReadOnly && !$ivf_stimulation_chart_edit->StChDate21->Disabled && !isset($ivf_stimulation_chart_edit->StChDate21->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate21->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate21", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate22->Visible) { // StChDate22 ?>
	<div id="r_StChDate22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate22" for="x_StChDate22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate22" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate22->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate22" type="text/html"><span id="el_ivf_stimulation_chart_StChDate22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate22" data-format="7" name="x_StChDate22" id="x_StChDate22" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate22->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate22->ReadOnly && !$ivf_stimulation_chart_edit->StChDate22->Disabled && !isset($ivf_stimulation_chart_edit->StChDate22->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate22->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate22", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate23->Visible) { // StChDate23 ?>
	<div id="r_StChDate23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate23" for="x_StChDate23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate23" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate23->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate23" type="text/html"><span id="el_ivf_stimulation_chart_StChDate23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate23" data-format="7" name="x_StChDate23" id="x_StChDate23" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate23->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate23->ReadOnly && !$ivf_stimulation_chart_edit->StChDate23->Disabled && !isset($ivf_stimulation_chart_edit->StChDate23->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate23->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate23", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate24->Visible) { // StChDate24 ?>
	<div id="r_StChDate24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate24" for="x_StChDate24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate24" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate24->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate24" type="text/html"><span id="el_ivf_stimulation_chart_StChDate24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate24" data-format="7" name="x_StChDate24" id="x_StChDate24" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate24->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate24->ReadOnly && !$ivf_stimulation_chart_edit->StChDate24->Disabled && !isset($ivf_stimulation_chart_edit->StChDate24->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate24->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate24", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StChDate25->Visible) { // StChDate25 ?>
	<div id="r_StChDate25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate25" for="x_StChDate25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate25" type="text/html"><?php echo $ivf_stimulation_chart_edit->StChDate25->caption() ?><?php echo $ivf_stimulation_chart_edit->StChDate25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StChDate25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate25" type="text/html"><span id="el_ivf_stimulation_chart_StChDate25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate25" data-format="7" name="x_StChDate25" id="x_StChDate25" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StChDate25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StChDate25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StChDate25->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->StChDate25->ReadOnly && !$ivf_stimulation_chart_edit->StChDate25->Disabled && !isset($ivf_stimulation_chart_edit->StChDate25->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->StChDate25->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_StChDate25", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->StChDate25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay14->Visible) { // CycleDay14 ?>
	<div id="r_CycleDay14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay14" for="x_CycleDay14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay14" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay14->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay14" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay14" name="x_CycleDay14" id="x_CycleDay14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay15->Visible) { // CycleDay15 ?>
	<div id="r_CycleDay15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay15" for="x_CycleDay15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay15" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay15->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay15" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay15" name="x_CycleDay15" id="x_CycleDay15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay16->Visible) { // CycleDay16 ?>
	<div id="r_CycleDay16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay16" for="x_CycleDay16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay16" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay16->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay16" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay16" name="x_CycleDay16" id="x_CycleDay16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay17->Visible) { // CycleDay17 ?>
	<div id="r_CycleDay17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay17" for="x_CycleDay17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay17" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay17->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay17" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay17" name="x_CycleDay17" id="x_CycleDay17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay18->Visible) { // CycleDay18 ?>
	<div id="r_CycleDay18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay18" for="x_CycleDay18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay18" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay18->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay18" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay18" name="x_CycleDay18" id="x_CycleDay18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay19->Visible) { // CycleDay19 ?>
	<div id="r_CycleDay19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay19" for="x_CycleDay19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay19" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay19->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay19" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay19" name="x_CycleDay19" id="x_CycleDay19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay20->Visible) { // CycleDay20 ?>
	<div id="r_CycleDay20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay20" for="x_CycleDay20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay20" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay20->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay20" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay20" name="x_CycleDay20" id="x_CycleDay20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay21->Visible) { // CycleDay21 ?>
	<div id="r_CycleDay21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay21" for="x_CycleDay21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay21" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay21->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay21" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay21" name="x_CycleDay21" id="x_CycleDay21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay22->Visible) { // CycleDay22 ?>
	<div id="r_CycleDay22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay22" for="x_CycleDay22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay22" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay22->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay22" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay22" name="x_CycleDay22" id="x_CycleDay22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay23->Visible) { // CycleDay23 ?>
	<div id="r_CycleDay23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay23" for="x_CycleDay23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay23" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay23->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay23" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay23" name="x_CycleDay23" id="x_CycleDay23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay24->Visible) { // CycleDay24 ?>
	<div id="r_CycleDay24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay24" for="x_CycleDay24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay24" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay24->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay24" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay24" name="x_CycleDay24" id="x_CycleDay24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->CycleDay25->Visible) { // CycleDay25 ?>
	<div id="r_CycleDay25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay25" for="x_CycleDay25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay25" type="text/html"><?php echo $ivf_stimulation_chart_edit->CycleDay25->caption() ?><?php echo $ivf_stimulation_chart_edit->CycleDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->CycleDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay25" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay25" name="x_CycleDay25" id="x_CycleDay25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->CycleDay25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->CycleDay25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->CycleDay25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->CycleDay25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay14->Visible) { // StimulationDay14 ?>
	<div id="r_StimulationDay14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay14" for="x_StimulationDay14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay14" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay14->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay14" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay14" name="x_StimulationDay14" id="x_StimulationDay14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay15->Visible) { // StimulationDay15 ?>
	<div id="r_StimulationDay15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay15" for="x_StimulationDay15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay15" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay15->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay15" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay15" name="x_StimulationDay15" id="x_StimulationDay15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay16->Visible) { // StimulationDay16 ?>
	<div id="r_StimulationDay16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay16" for="x_StimulationDay16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay16" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay16->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay16" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay16" name="x_StimulationDay16" id="x_StimulationDay16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay17->Visible) { // StimulationDay17 ?>
	<div id="r_StimulationDay17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay17" for="x_StimulationDay17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay17" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay17->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay17" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay17" name="x_StimulationDay17" id="x_StimulationDay17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay18->Visible) { // StimulationDay18 ?>
	<div id="r_StimulationDay18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay18" for="x_StimulationDay18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay18" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay18->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay18" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay18" name="x_StimulationDay18" id="x_StimulationDay18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay19->Visible) { // StimulationDay19 ?>
	<div id="r_StimulationDay19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay19" for="x_StimulationDay19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay19" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay19->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay19" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay19" name="x_StimulationDay19" id="x_StimulationDay19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay20->Visible) { // StimulationDay20 ?>
	<div id="r_StimulationDay20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay20" for="x_StimulationDay20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay20" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay20->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay20" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay20" name="x_StimulationDay20" id="x_StimulationDay20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay21->Visible) { // StimulationDay21 ?>
	<div id="r_StimulationDay21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay21" for="x_StimulationDay21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay21" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay21->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay21" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay21" name="x_StimulationDay21" id="x_StimulationDay21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay22->Visible) { // StimulationDay22 ?>
	<div id="r_StimulationDay22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay22" for="x_StimulationDay22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay22" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay22->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay22" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay22" name="x_StimulationDay22" id="x_StimulationDay22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay23->Visible) { // StimulationDay23 ?>
	<div id="r_StimulationDay23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay23" for="x_StimulationDay23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay23" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay23->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay23" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay23" name="x_StimulationDay23" id="x_StimulationDay23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay24->Visible) { // StimulationDay24 ?>
	<div id="r_StimulationDay24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay24" for="x_StimulationDay24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay24" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay24->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay24" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay24" name="x_StimulationDay24" id="x_StimulationDay24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->StimulationDay25->Visible) { // StimulationDay25 ?>
	<div id="r_StimulationDay25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay25" for="x_StimulationDay25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay25" type="text/html"><?php echo $ivf_stimulation_chart_edit->StimulationDay25->caption() ?><?php echo $ivf_stimulation_chart_edit->StimulationDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->StimulationDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay25" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay25" name="x_StimulationDay25" id="x_StimulationDay25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->StimulationDay25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->StimulationDay25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->StimulationDay25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->StimulationDay25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet14->Visible) { // Tablet14 ?>
	<div id="r_Tablet14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet14" for="x_Tablet14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet14" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet14->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet14" type="text/html"><span id="el_ivf_stimulation_chart_Tablet14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet14" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet14->displayValueSeparatorAttribute() ?>" id="x_Tablet14" name="x_Tablet14"<?php echo $ivf_stimulation_chart_edit->Tablet14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet14->selectOptionListHtml("x_Tablet14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet14->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet15->Visible) { // Tablet15 ?>
	<div id="r_Tablet15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet15" for="x_Tablet15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet15" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet15->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet15" type="text/html"><span id="el_ivf_stimulation_chart_Tablet15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet15" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet15->displayValueSeparatorAttribute() ?>" id="x_Tablet15" name="x_Tablet15"<?php echo $ivf_stimulation_chart_edit->Tablet15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet15->selectOptionListHtml("x_Tablet15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet15->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet16->Visible) { // Tablet16 ?>
	<div id="r_Tablet16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet16" for="x_Tablet16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet16" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet16->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet16" type="text/html"><span id="el_ivf_stimulation_chart_Tablet16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet16" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet16->displayValueSeparatorAttribute() ?>" id="x_Tablet16" name="x_Tablet16"<?php echo $ivf_stimulation_chart_edit->Tablet16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet16->selectOptionListHtml("x_Tablet16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet16->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet17->Visible) { // Tablet17 ?>
	<div id="r_Tablet17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet17" for="x_Tablet17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet17" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet17->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet17" type="text/html"><span id="el_ivf_stimulation_chart_Tablet17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet17" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet17->displayValueSeparatorAttribute() ?>" id="x_Tablet17" name="x_Tablet17"<?php echo $ivf_stimulation_chart_edit->Tablet17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet17->selectOptionListHtml("x_Tablet17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet17->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet18->Visible) { // Tablet18 ?>
	<div id="r_Tablet18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet18" for="x_Tablet18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet18" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet18->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet18" type="text/html"><span id="el_ivf_stimulation_chart_Tablet18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet18" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet18->displayValueSeparatorAttribute() ?>" id="x_Tablet18" name="x_Tablet18"<?php echo $ivf_stimulation_chart_edit->Tablet18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet18->selectOptionListHtml("x_Tablet18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet18->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet19->Visible) { // Tablet19 ?>
	<div id="r_Tablet19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet19" for="x_Tablet19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet19" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet19->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet19" type="text/html"><span id="el_ivf_stimulation_chart_Tablet19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet19" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet19->displayValueSeparatorAttribute() ?>" id="x_Tablet19" name="x_Tablet19"<?php echo $ivf_stimulation_chart_edit->Tablet19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet19->selectOptionListHtml("x_Tablet19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet19->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet20->Visible) { // Tablet20 ?>
	<div id="r_Tablet20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet20" for="x_Tablet20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet20" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet20->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet20" type="text/html"><span id="el_ivf_stimulation_chart_Tablet20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet20" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet20->displayValueSeparatorAttribute() ?>" id="x_Tablet20" name="x_Tablet20"<?php echo $ivf_stimulation_chart_edit->Tablet20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet20->selectOptionListHtml("x_Tablet20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet20->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet21->Visible) { // Tablet21 ?>
	<div id="r_Tablet21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet21" for="x_Tablet21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet21" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet21->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet21" type="text/html"><span id="el_ivf_stimulation_chart_Tablet21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet21" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet21->displayValueSeparatorAttribute() ?>" id="x_Tablet21" name="x_Tablet21"<?php echo $ivf_stimulation_chart_edit->Tablet21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet21->selectOptionListHtml("x_Tablet21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet21->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet22->Visible) { // Tablet22 ?>
	<div id="r_Tablet22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet22" for="x_Tablet22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet22" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet22->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet22" type="text/html"><span id="el_ivf_stimulation_chart_Tablet22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet22" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet22->displayValueSeparatorAttribute() ?>" id="x_Tablet22" name="x_Tablet22"<?php echo $ivf_stimulation_chart_edit->Tablet22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet22->selectOptionListHtml("x_Tablet22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet22->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet23->Visible) { // Tablet23 ?>
	<div id="r_Tablet23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet23" for="x_Tablet23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet23" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet23->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet23" type="text/html"><span id="el_ivf_stimulation_chart_Tablet23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet23" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet23->displayValueSeparatorAttribute() ?>" id="x_Tablet23" name="x_Tablet23"<?php echo $ivf_stimulation_chart_edit->Tablet23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet23->selectOptionListHtml("x_Tablet23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet23->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet24->Visible) { // Tablet24 ?>
	<div id="r_Tablet24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet24" for="x_Tablet24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet24" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet24->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet24" type="text/html"><span id="el_ivf_stimulation_chart_Tablet24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet24" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet24->displayValueSeparatorAttribute() ?>" id="x_Tablet24" name="x_Tablet24"<?php echo $ivf_stimulation_chart_edit->Tablet24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet24->selectOptionListHtml("x_Tablet24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet24->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Tablet25->Visible) { // Tablet25 ?>
	<div id="r_Tablet25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet25" for="x_Tablet25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet25" type="text/html"><?php echo $ivf_stimulation_chart_edit->Tablet25->caption() ?><?php echo $ivf_stimulation_chart_edit->Tablet25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Tablet25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet25" type="text/html"><span id="el_ivf_stimulation_chart_Tablet25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet25" data-value-separator="<?php echo $ivf_stimulation_chart_edit->Tablet25->displayValueSeparatorAttribute() ?>" id="x_Tablet25" name="x_Tablet25"<?php echo $ivf_stimulation_chart_edit->Tablet25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->Tablet25->selectOptionListHtml("x_Tablet25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->Tablet25->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_Tablet25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Tablet25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH14->Visible) { // RFSH14 ?>
	<div id="r_RFSH14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH14" for="x_RFSH14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH14" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH14->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH14" type="text/html"><span id="el_ivf_stimulation_chart_RFSH14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH14" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH14->displayValueSeparatorAttribute() ?>" id="x_RFSH14" name="x_RFSH14"<?php echo $ivf_stimulation_chart_edit->RFSH14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH14->selectOptionListHtml("x_RFSH14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH14->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH15->Visible) { // RFSH15 ?>
	<div id="r_RFSH15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH15" for="x_RFSH15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH15" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH15->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH15" type="text/html"><span id="el_ivf_stimulation_chart_RFSH15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH15" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH15->displayValueSeparatorAttribute() ?>" id="x_RFSH15" name="x_RFSH15"<?php echo $ivf_stimulation_chart_edit->RFSH15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH15->selectOptionListHtml("x_RFSH15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH15->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH16->Visible) { // RFSH16 ?>
	<div id="r_RFSH16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH16" for="x_RFSH16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH16" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH16->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH16" type="text/html"><span id="el_ivf_stimulation_chart_RFSH16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH16" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH16->displayValueSeparatorAttribute() ?>" id="x_RFSH16" name="x_RFSH16"<?php echo $ivf_stimulation_chart_edit->RFSH16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH16->selectOptionListHtml("x_RFSH16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH16->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH17->Visible) { // RFSH17 ?>
	<div id="r_RFSH17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH17" for="x_RFSH17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH17" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH17->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH17" type="text/html"><span id="el_ivf_stimulation_chart_RFSH17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH17" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH17->displayValueSeparatorAttribute() ?>" id="x_RFSH17" name="x_RFSH17"<?php echo $ivf_stimulation_chart_edit->RFSH17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH17->selectOptionListHtml("x_RFSH17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH17->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH18->Visible) { // RFSH18 ?>
	<div id="r_RFSH18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH18" for="x_RFSH18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH18" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH18->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH18" type="text/html"><span id="el_ivf_stimulation_chart_RFSH18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH18" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH18->displayValueSeparatorAttribute() ?>" id="x_RFSH18" name="x_RFSH18"<?php echo $ivf_stimulation_chart_edit->RFSH18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH18->selectOptionListHtml("x_RFSH18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH18->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH19->Visible) { // RFSH19 ?>
	<div id="r_RFSH19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH19" for="x_RFSH19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH19" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH19->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH19" type="text/html"><span id="el_ivf_stimulation_chart_RFSH19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH19" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH19->displayValueSeparatorAttribute() ?>" id="x_RFSH19" name="x_RFSH19"<?php echo $ivf_stimulation_chart_edit->RFSH19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH19->selectOptionListHtml("x_RFSH19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH19->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH20->Visible) { // RFSH20 ?>
	<div id="r_RFSH20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH20" for="x_RFSH20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH20" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH20->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH20" type="text/html"><span id="el_ivf_stimulation_chart_RFSH20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH20" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH20->displayValueSeparatorAttribute() ?>" id="x_RFSH20" name="x_RFSH20"<?php echo $ivf_stimulation_chart_edit->RFSH20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH20->selectOptionListHtml("x_RFSH20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH20->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH21->Visible) { // RFSH21 ?>
	<div id="r_RFSH21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH21" for="x_RFSH21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH21" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH21->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH21" type="text/html"><span id="el_ivf_stimulation_chart_RFSH21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH21" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH21->displayValueSeparatorAttribute() ?>" id="x_RFSH21" name="x_RFSH21"<?php echo $ivf_stimulation_chart_edit->RFSH21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH21->selectOptionListHtml("x_RFSH21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH21->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH22->Visible) { // RFSH22 ?>
	<div id="r_RFSH22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH22" for="x_RFSH22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH22" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH22->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH22" type="text/html"><span id="el_ivf_stimulation_chart_RFSH22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH22" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH22->displayValueSeparatorAttribute() ?>" id="x_RFSH22" name="x_RFSH22"<?php echo $ivf_stimulation_chart_edit->RFSH22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH22->selectOptionListHtml("x_RFSH22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH22->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH23->Visible) { // RFSH23 ?>
	<div id="r_RFSH23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH23" for="x_RFSH23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH23" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH23->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH23" type="text/html"><span id="el_ivf_stimulation_chart_RFSH23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH23" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH23->displayValueSeparatorAttribute() ?>" id="x_RFSH23" name="x_RFSH23"<?php echo $ivf_stimulation_chart_edit->RFSH23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH23->selectOptionListHtml("x_RFSH23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH23->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH24->Visible) { // RFSH24 ?>
	<div id="r_RFSH24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH24" for="x_RFSH24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH24" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH24->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH24" type="text/html"><span id="el_ivf_stimulation_chart_RFSH24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH24" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH24->displayValueSeparatorAttribute() ?>" id="x_RFSH24" name="x_RFSH24"<?php echo $ivf_stimulation_chart_edit->RFSH24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH24->selectOptionListHtml("x_RFSH24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH24->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->RFSH25->Visible) { // RFSH25 ?>
	<div id="r_RFSH25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH25" for="x_RFSH25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH25" type="text/html"><?php echo $ivf_stimulation_chart_edit->RFSH25->caption() ?><?php echo $ivf_stimulation_chart_edit->RFSH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->RFSH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH25" type="text/html"><span id="el_ivf_stimulation_chart_RFSH25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH25" data-value-separator="<?php echo $ivf_stimulation_chart_edit->RFSH25->displayValueSeparatorAttribute() ?>" id="x_RFSH25" name="x_RFSH25"<?php echo $ivf_stimulation_chart_edit->RFSH25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->RFSH25->selectOptionListHtml("x_RFSH25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->RFSH25->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_RFSH25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->RFSH25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG14->Visible) { // HMG14 ?>
	<div id="r_HMG14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG14" for="x_HMG14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG14" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG14->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG14" type="text/html"><span id="el_ivf_stimulation_chart_HMG14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG14" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG14->displayValueSeparatorAttribute() ?>" id="x_HMG14" name="x_HMG14"<?php echo $ivf_stimulation_chart_edit->HMG14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG14->selectOptionListHtml("x_HMG14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG14->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG15->Visible) { // HMG15 ?>
	<div id="r_HMG15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG15" for="x_HMG15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG15" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG15->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG15" type="text/html"><span id="el_ivf_stimulation_chart_HMG15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG15" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG15->displayValueSeparatorAttribute() ?>" id="x_HMG15" name="x_HMG15"<?php echo $ivf_stimulation_chart_edit->HMG15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG15->selectOptionListHtml("x_HMG15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG15->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG16->Visible) { // HMG16 ?>
	<div id="r_HMG16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG16" for="x_HMG16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG16" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG16->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG16" type="text/html"><span id="el_ivf_stimulation_chart_HMG16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG16" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG16->displayValueSeparatorAttribute() ?>" id="x_HMG16" name="x_HMG16"<?php echo $ivf_stimulation_chart_edit->HMG16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG16->selectOptionListHtml("x_HMG16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG16->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG17->Visible) { // HMG17 ?>
	<div id="r_HMG17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG17" for="x_HMG17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG17" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG17->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG17" type="text/html"><span id="el_ivf_stimulation_chart_HMG17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG17" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG17->displayValueSeparatorAttribute() ?>" id="x_HMG17" name="x_HMG17"<?php echo $ivf_stimulation_chart_edit->HMG17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG17->selectOptionListHtml("x_HMG17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG17->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG18->Visible) { // HMG18 ?>
	<div id="r_HMG18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG18" for="x_HMG18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG18" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG18->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG18" type="text/html"><span id="el_ivf_stimulation_chart_HMG18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG18" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG18->displayValueSeparatorAttribute() ?>" id="x_HMG18" name="x_HMG18"<?php echo $ivf_stimulation_chart_edit->HMG18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG18->selectOptionListHtml("x_HMG18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG18->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG19->Visible) { // HMG19 ?>
	<div id="r_HMG19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG19" for="x_HMG19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG19" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG19->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG19" type="text/html"><span id="el_ivf_stimulation_chart_HMG19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG19" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG19->displayValueSeparatorAttribute() ?>" id="x_HMG19" name="x_HMG19"<?php echo $ivf_stimulation_chart_edit->HMG19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG19->selectOptionListHtml("x_HMG19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG19->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG20->Visible) { // HMG20 ?>
	<div id="r_HMG20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG20" for="x_HMG20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG20" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG20->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG20" type="text/html"><span id="el_ivf_stimulation_chart_HMG20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG20" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG20->displayValueSeparatorAttribute() ?>" id="x_HMG20" name="x_HMG20"<?php echo $ivf_stimulation_chart_edit->HMG20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG20->selectOptionListHtml("x_HMG20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG20->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG21->Visible) { // HMG21 ?>
	<div id="r_HMG21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG21" for="x_HMG21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG21" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG21->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG21" type="text/html"><span id="el_ivf_stimulation_chart_HMG21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG21" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG21->displayValueSeparatorAttribute() ?>" id="x_HMG21" name="x_HMG21"<?php echo $ivf_stimulation_chart_edit->HMG21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG21->selectOptionListHtml("x_HMG21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG21->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG22->Visible) { // HMG22 ?>
	<div id="r_HMG22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG22" for="x_HMG22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG22" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG22->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG22" type="text/html"><span id="el_ivf_stimulation_chart_HMG22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG22" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG22->displayValueSeparatorAttribute() ?>" id="x_HMG22" name="x_HMG22"<?php echo $ivf_stimulation_chart_edit->HMG22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG22->selectOptionListHtml("x_HMG22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG22->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG23->Visible) { // HMG23 ?>
	<div id="r_HMG23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG23" for="x_HMG23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG23" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG23->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG23" type="text/html"><span id="el_ivf_stimulation_chart_HMG23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG23" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG23->displayValueSeparatorAttribute() ?>" id="x_HMG23" name="x_HMG23"<?php echo $ivf_stimulation_chart_edit->HMG23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG23->selectOptionListHtml("x_HMG23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG23->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG24->Visible) { // HMG24 ?>
	<div id="r_HMG24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG24" for="x_HMG24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG24" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG24->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG24" type="text/html"><span id="el_ivf_stimulation_chart_HMG24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG24" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG24->displayValueSeparatorAttribute() ?>" id="x_HMG24" name="x_HMG24"<?php echo $ivf_stimulation_chart_edit->HMG24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG24->selectOptionListHtml("x_HMG24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG24->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HMG25->Visible) { // HMG25 ?>
	<div id="r_HMG25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG25" for="x_HMG25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG25" type="text/html"><?php echo $ivf_stimulation_chart_edit->HMG25->caption() ?><?php echo $ivf_stimulation_chart_edit->HMG25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HMG25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG25" type="text/html"><span id="el_ivf_stimulation_chart_HMG25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG25" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HMG25->displayValueSeparatorAttribute() ?>" id="x_HMG25" name="x_HMG25"<?php echo $ivf_stimulation_chart_edit->HMG25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HMG25->selectOptionListHtml("x_HMG25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->HMG25->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_HMG25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HMG25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH14->Visible) { // GnRH14 ?>
	<div id="r_GnRH14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH14" for="x_GnRH14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH14" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH14->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH14" type="text/html"><span id="el_ivf_stimulation_chart_GnRH14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH14" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH14->displayValueSeparatorAttribute() ?>" id="x_GnRH14" name="x_GnRH14"<?php echo $ivf_stimulation_chart_edit->GnRH14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH14->selectOptionListHtml("x_GnRH14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH14->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH15->Visible) { // GnRH15 ?>
	<div id="r_GnRH15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH15" for="x_GnRH15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH15" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH15->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH15" type="text/html"><span id="el_ivf_stimulation_chart_GnRH15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH15" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH15->displayValueSeparatorAttribute() ?>" id="x_GnRH15" name="x_GnRH15"<?php echo $ivf_stimulation_chart_edit->GnRH15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH15->selectOptionListHtml("x_GnRH15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH15->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH16->Visible) { // GnRH16 ?>
	<div id="r_GnRH16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH16" for="x_GnRH16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH16" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH16->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH16" type="text/html"><span id="el_ivf_stimulation_chart_GnRH16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH16" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH16->displayValueSeparatorAttribute() ?>" id="x_GnRH16" name="x_GnRH16"<?php echo $ivf_stimulation_chart_edit->GnRH16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH16->selectOptionListHtml("x_GnRH16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH16->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH17->Visible) { // GnRH17 ?>
	<div id="r_GnRH17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH17" for="x_GnRH17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH17" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH17->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH17" type="text/html"><span id="el_ivf_stimulation_chart_GnRH17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH17" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH17->displayValueSeparatorAttribute() ?>" id="x_GnRH17" name="x_GnRH17"<?php echo $ivf_stimulation_chart_edit->GnRH17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH17->selectOptionListHtml("x_GnRH17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH17->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH18->Visible) { // GnRH18 ?>
	<div id="r_GnRH18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH18" for="x_GnRH18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH18" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH18->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH18" type="text/html"><span id="el_ivf_stimulation_chart_GnRH18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH18" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH18->displayValueSeparatorAttribute() ?>" id="x_GnRH18" name="x_GnRH18"<?php echo $ivf_stimulation_chart_edit->GnRH18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH18->selectOptionListHtml("x_GnRH18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH18->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH19->Visible) { // GnRH19 ?>
	<div id="r_GnRH19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH19" for="x_GnRH19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH19" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH19->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH19" type="text/html"><span id="el_ivf_stimulation_chart_GnRH19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH19" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH19->displayValueSeparatorAttribute() ?>" id="x_GnRH19" name="x_GnRH19"<?php echo $ivf_stimulation_chart_edit->GnRH19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH19->selectOptionListHtml("x_GnRH19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH19->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH20->Visible) { // GnRH20 ?>
	<div id="r_GnRH20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH20" for="x_GnRH20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH20" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH20->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH20" type="text/html"><span id="el_ivf_stimulation_chart_GnRH20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH20" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH20->displayValueSeparatorAttribute() ?>" id="x_GnRH20" name="x_GnRH20"<?php echo $ivf_stimulation_chart_edit->GnRH20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH20->selectOptionListHtml("x_GnRH20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH20->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH21->Visible) { // GnRH21 ?>
	<div id="r_GnRH21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH21" for="x_GnRH21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH21" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH21->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH21" type="text/html"><span id="el_ivf_stimulation_chart_GnRH21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH21" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH21->displayValueSeparatorAttribute() ?>" id="x_GnRH21" name="x_GnRH21"<?php echo $ivf_stimulation_chart_edit->GnRH21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH21->selectOptionListHtml("x_GnRH21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH21->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH22->Visible) { // GnRH22 ?>
	<div id="r_GnRH22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH22" for="x_GnRH22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH22" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH22->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH22" type="text/html"><span id="el_ivf_stimulation_chart_GnRH22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH22" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH22->displayValueSeparatorAttribute() ?>" id="x_GnRH22" name="x_GnRH22"<?php echo $ivf_stimulation_chart_edit->GnRH22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH22->selectOptionListHtml("x_GnRH22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH22->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH23->Visible) { // GnRH23 ?>
	<div id="r_GnRH23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH23" for="x_GnRH23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH23" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH23->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH23" type="text/html"><span id="el_ivf_stimulation_chart_GnRH23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH23" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH23->displayValueSeparatorAttribute() ?>" id="x_GnRH23" name="x_GnRH23"<?php echo $ivf_stimulation_chart_edit->GnRH23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH23->selectOptionListHtml("x_GnRH23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH23->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH24->Visible) { // GnRH24 ?>
	<div id="r_GnRH24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH24" for="x_GnRH24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH24" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH24->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH24" type="text/html"><span id="el_ivf_stimulation_chart_GnRH24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH24" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH24->displayValueSeparatorAttribute() ?>" id="x_GnRH24" name="x_GnRH24"<?php echo $ivf_stimulation_chart_edit->GnRH24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH24->selectOptionListHtml("x_GnRH24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH24->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->GnRH25->Visible) { // GnRH25 ?>
	<div id="r_GnRH25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH25" for="x_GnRH25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH25" type="text/html"><?php echo $ivf_stimulation_chart_edit->GnRH25->caption() ?><?php echo $ivf_stimulation_chart_edit->GnRH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->GnRH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH25" type="text/html"><span id="el_ivf_stimulation_chart_GnRH25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH25" data-value-separator="<?php echo $ivf_stimulation_chart_edit->GnRH25->displayValueSeparatorAttribute() ?>" id="x_GnRH25" name="x_GnRH25"<?php echo $ivf_stimulation_chart_edit->GnRH25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->GnRH25->selectOptionListHtml("x_GnRH25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_edit->GnRH25->Lookup->getParamTag($ivf_stimulation_chart_edit, "p_x_GnRH25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_edit->GnRH25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P414->Visible) { // P414 ?>
	<div id="r_P414" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P414" for="x_P414" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P414" type="text/html"><?php echo $ivf_stimulation_chart_edit->P414->caption() ?><?php echo $ivf_stimulation_chart_edit->P414->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P414->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P414" type="text/html"><span id="el_ivf_stimulation_chart_P414">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P414" name="x_P414" id="x_P414" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P414->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P414->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P414->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P414->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P415->Visible) { // P415 ?>
	<div id="r_P415" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P415" for="x_P415" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P415" type="text/html"><?php echo $ivf_stimulation_chart_edit->P415->caption() ?><?php echo $ivf_stimulation_chart_edit->P415->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P415->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P415" type="text/html"><span id="el_ivf_stimulation_chart_P415">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P415" name="x_P415" id="x_P415" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P415->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P415->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P415->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P415->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P416->Visible) { // P416 ?>
	<div id="r_P416" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P416" for="x_P416" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P416" type="text/html"><?php echo $ivf_stimulation_chart_edit->P416->caption() ?><?php echo $ivf_stimulation_chart_edit->P416->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P416->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P416" type="text/html"><span id="el_ivf_stimulation_chart_P416">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P416" name="x_P416" id="x_P416" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P416->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P416->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P416->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P416->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P417->Visible) { // P417 ?>
	<div id="r_P417" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P417" for="x_P417" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P417" type="text/html"><?php echo $ivf_stimulation_chart_edit->P417->caption() ?><?php echo $ivf_stimulation_chart_edit->P417->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P417->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P417" type="text/html"><span id="el_ivf_stimulation_chart_P417">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P417" name="x_P417" id="x_P417" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P417->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P417->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P417->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P417->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P418->Visible) { // P418 ?>
	<div id="r_P418" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P418" for="x_P418" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P418" type="text/html"><?php echo $ivf_stimulation_chart_edit->P418->caption() ?><?php echo $ivf_stimulation_chart_edit->P418->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P418->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P418" type="text/html"><span id="el_ivf_stimulation_chart_P418">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P418" name="x_P418" id="x_P418" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P418->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P418->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P418->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P418->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P419->Visible) { // P419 ?>
	<div id="r_P419" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P419" for="x_P419" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P419" type="text/html"><?php echo $ivf_stimulation_chart_edit->P419->caption() ?><?php echo $ivf_stimulation_chart_edit->P419->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P419->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P419" type="text/html"><span id="el_ivf_stimulation_chart_P419">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P419" name="x_P419" id="x_P419" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P419->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P419->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P419->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P419->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P420->Visible) { // P420 ?>
	<div id="r_P420" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P420" for="x_P420" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P420" type="text/html"><?php echo $ivf_stimulation_chart_edit->P420->caption() ?><?php echo $ivf_stimulation_chart_edit->P420->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P420->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P420" type="text/html"><span id="el_ivf_stimulation_chart_P420">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P420" name="x_P420" id="x_P420" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P420->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P420->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P420->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P420->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P421->Visible) { // P421 ?>
	<div id="r_P421" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P421" for="x_P421" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P421" type="text/html"><?php echo $ivf_stimulation_chart_edit->P421->caption() ?><?php echo $ivf_stimulation_chart_edit->P421->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P421->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P421" type="text/html"><span id="el_ivf_stimulation_chart_P421">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P421" name="x_P421" id="x_P421" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P421->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P421->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P421->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P421->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P422->Visible) { // P422 ?>
	<div id="r_P422" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P422" for="x_P422" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P422" type="text/html"><?php echo $ivf_stimulation_chart_edit->P422->caption() ?><?php echo $ivf_stimulation_chart_edit->P422->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P422->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P422" type="text/html"><span id="el_ivf_stimulation_chart_P422">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P422" name="x_P422" id="x_P422" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P422->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P422->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P422->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P422->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P423->Visible) { // P423 ?>
	<div id="r_P423" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P423" for="x_P423" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P423" type="text/html"><?php echo $ivf_stimulation_chart_edit->P423->caption() ?><?php echo $ivf_stimulation_chart_edit->P423->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P423->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P423" type="text/html"><span id="el_ivf_stimulation_chart_P423">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P423" name="x_P423" id="x_P423" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P423->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P423->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P423->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P423->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P424->Visible) { // P424 ?>
	<div id="r_P424" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P424" for="x_P424" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P424" type="text/html"><?php echo $ivf_stimulation_chart_edit->P424->caption() ?><?php echo $ivf_stimulation_chart_edit->P424->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P424->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P424" type="text/html"><span id="el_ivf_stimulation_chart_P424">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P424" name="x_P424" id="x_P424" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P424->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P424->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P424->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P424->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->P425->Visible) { // P425 ?>
	<div id="r_P425" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P425" for="x_P425" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P425" type="text/html"><?php echo $ivf_stimulation_chart_edit->P425->caption() ?><?php echo $ivf_stimulation_chart_edit->P425->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->P425->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P425" type="text/html"><span id="el_ivf_stimulation_chart_P425">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P425" name="x_P425" id="x_P425" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->P425->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->P425->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->P425->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->P425->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt14->Visible) { // USGRt14 ?>
	<div id="r_USGRt14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt14" for="x_USGRt14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt14" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt14->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt14" type="text/html"><span id="el_ivf_stimulation_chart_USGRt14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt14" name="x_USGRt14" id="x_USGRt14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt15->Visible) { // USGRt15 ?>
	<div id="r_USGRt15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt15" for="x_USGRt15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt15" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt15->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt15" type="text/html"><span id="el_ivf_stimulation_chart_USGRt15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt15" name="x_USGRt15" id="x_USGRt15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt16->Visible) { // USGRt16 ?>
	<div id="r_USGRt16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt16" for="x_USGRt16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt16" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt16->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt16" type="text/html"><span id="el_ivf_stimulation_chart_USGRt16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt16" name="x_USGRt16" id="x_USGRt16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt17->Visible) { // USGRt17 ?>
	<div id="r_USGRt17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt17" for="x_USGRt17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt17" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt17->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt17" type="text/html"><span id="el_ivf_stimulation_chart_USGRt17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt17" name="x_USGRt17" id="x_USGRt17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt18->Visible) { // USGRt18 ?>
	<div id="r_USGRt18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt18" for="x_USGRt18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt18" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt18->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt18" type="text/html"><span id="el_ivf_stimulation_chart_USGRt18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt18" name="x_USGRt18" id="x_USGRt18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt19->Visible) { // USGRt19 ?>
	<div id="r_USGRt19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt19" for="x_USGRt19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt19" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt19->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt19" type="text/html"><span id="el_ivf_stimulation_chart_USGRt19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt19" name="x_USGRt19" id="x_USGRt19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt20->Visible) { // USGRt20 ?>
	<div id="r_USGRt20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt20" for="x_USGRt20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt20" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt20->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt20" type="text/html"><span id="el_ivf_stimulation_chart_USGRt20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt20" name="x_USGRt20" id="x_USGRt20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt21->Visible) { // USGRt21 ?>
	<div id="r_USGRt21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt21" for="x_USGRt21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt21" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt21->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt21" type="text/html"><span id="el_ivf_stimulation_chart_USGRt21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt21" name="x_USGRt21" id="x_USGRt21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt22->Visible) { // USGRt22 ?>
	<div id="r_USGRt22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt22" for="x_USGRt22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt22" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt22->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt22" type="text/html"><span id="el_ivf_stimulation_chart_USGRt22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt22" name="x_USGRt22" id="x_USGRt22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt23->Visible) { // USGRt23 ?>
	<div id="r_USGRt23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt23" for="x_USGRt23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt23" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt23->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt23" type="text/html"><span id="el_ivf_stimulation_chart_USGRt23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt23" name="x_USGRt23" id="x_USGRt23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt24->Visible) { // USGRt24 ?>
	<div id="r_USGRt24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt24" for="x_USGRt24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt24" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt24->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt24" type="text/html"><span id="el_ivf_stimulation_chart_USGRt24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt24" name="x_USGRt24" id="x_USGRt24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGRt25->Visible) { // USGRt25 ?>
	<div id="r_USGRt25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt25" for="x_USGRt25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt25" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGRt25->caption() ?><?php echo $ivf_stimulation_chart_edit->USGRt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGRt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt25" type="text/html"><span id="el_ivf_stimulation_chart_USGRt25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt25" name="x_USGRt25" id="x_USGRt25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGRt25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGRt25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGRt25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGRt25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt14->Visible) { // USGLt14 ?>
	<div id="r_USGLt14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt14" for="x_USGLt14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt14" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt14->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt14" type="text/html"><span id="el_ivf_stimulation_chart_USGLt14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt14" name="x_USGLt14" id="x_USGLt14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt15->Visible) { // USGLt15 ?>
	<div id="r_USGLt15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt15" for="x_USGLt15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt15" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt15->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt15" type="text/html"><span id="el_ivf_stimulation_chart_USGLt15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt15" name="x_USGLt15" id="x_USGLt15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt16->Visible) { // USGLt16 ?>
	<div id="r_USGLt16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt16" for="x_USGLt16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt16" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt16->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt16" type="text/html"><span id="el_ivf_stimulation_chart_USGLt16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt16" name="x_USGLt16" id="x_USGLt16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt17->Visible) { // USGLt17 ?>
	<div id="r_USGLt17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt17" for="x_USGLt17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt17" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt17->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt17" type="text/html"><span id="el_ivf_stimulation_chart_USGLt17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt17" name="x_USGLt17" id="x_USGLt17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt18->Visible) { // USGLt18 ?>
	<div id="r_USGLt18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt18" for="x_USGLt18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt18" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt18->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt18" type="text/html"><span id="el_ivf_stimulation_chart_USGLt18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt18" name="x_USGLt18" id="x_USGLt18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt19->Visible) { // USGLt19 ?>
	<div id="r_USGLt19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt19" for="x_USGLt19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt19" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt19->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt19" type="text/html"><span id="el_ivf_stimulation_chart_USGLt19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt19" name="x_USGLt19" id="x_USGLt19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt20->Visible) { // USGLt20 ?>
	<div id="r_USGLt20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt20" for="x_USGLt20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt20" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt20->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt20" type="text/html"><span id="el_ivf_stimulation_chart_USGLt20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt20" name="x_USGLt20" id="x_USGLt20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt21->Visible) { // USGLt21 ?>
	<div id="r_USGLt21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt21" for="x_USGLt21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt21" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt21->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt21" type="text/html"><span id="el_ivf_stimulation_chart_USGLt21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt21" name="x_USGLt21" id="x_USGLt21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt22->Visible) { // USGLt22 ?>
	<div id="r_USGLt22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt22" for="x_USGLt22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt22" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt22->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt22" type="text/html"><span id="el_ivf_stimulation_chart_USGLt22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt22" name="x_USGLt22" id="x_USGLt22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt23->Visible) { // USGLt23 ?>
	<div id="r_USGLt23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt23" for="x_USGLt23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt23" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt23->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt23" type="text/html"><span id="el_ivf_stimulation_chart_USGLt23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt23" name="x_USGLt23" id="x_USGLt23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt24->Visible) { // USGLt24 ?>
	<div id="r_USGLt24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt24" for="x_USGLt24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt24" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt24->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt24" type="text/html"><span id="el_ivf_stimulation_chart_USGLt24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt24" name="x_USGLt24" id="x_USGLt24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->USGLt25->Visible) { // USGLt25 ?>
	<div id="r_USGLt25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt25" for="x_USGLt25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt25" type="text/html"><?php echo $ivf_stimulation_chart_edit->USGLt25->caption() ?><?php echo $ivf_stimulation_chart_edit->USGLt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->USGLt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt25" type="text/html"><span id="el_ivf_stimulation_chart_USGLt25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt25" name="x_USGLt25" id="x_USGLt25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->USGLt25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->USGLt25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->USGLt25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->USGLt25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM14->Visible) { // EM14 ?>
	<div id="r_EM14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM14" for="x_EM14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM14" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM14->caption() ?><?php echo $ivf_stimulation_chart_edit->EM14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM14" type="text/html"><span id="el_ivf_stimulation_chart_EM14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM14" name="x_EM14" id="x_EM14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM15->Visible) { // EM15 ?>
	<div id="r_EM15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM15" for="x_EM15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM15" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM15->caption() ?><?php echo $ivf_stimulation_chart_edit->EM15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM15" type="text/html"><span id="el_ivf_stimulation_chart_EM15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM15" name="x_EM15" id="x_EM15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM16->Visible) { // EM16 ?>
	<div id="r_EM16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM16" for="x_EM16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM16" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM16->caption() ?><?php echo $ivf_stimulation_chart_edit->EM16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM16" type="text/html"><span id="el_ivf_stimulation_chart_EM16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM16" name="x_EM16" id="x_EM16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM17->Visible) { // EM17 ?>
	<div id="r_EM17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM17" for="x_EM17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM17" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM17->caption() ?><?php echo $ivf_stimulation_chart_edit->EM17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM17" type="text/html"><span id="el_ivf_stimulation_chart_EM17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM17" name="x_EM17" id="x_EM17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM18->Visible) { // EM18 ?>
	<div id="r_EM18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM18" for="x_EM18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM18" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM18->caption() ?><?php echo $ivf_stimulation_chart_edit->EM18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM18" type="text/html"><span id="el_ivf_stimulation_chart_EM18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM18" name="x_EM18" id="x_EM18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM19->Visible) { // EM19 ?>
	<div id="r_EM19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM19" for="x_EM19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM19" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM19->caption() ?><?php echo $ivf_stimulation_chart_edit->EM19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM19" type="text/html"><span id="el_ivf_stimulation_chart_EM19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM19" name="x_EM19" id="x_EM19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM20->Visible) { // EM20 ?>
	<div id="r_EM20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM20" for="x_EM20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM20" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM20->caption() ?><?php echo $ivf_stimulation_chart_edit->EM20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM20" type="text/html"><span id="el_ivf_stimulation_chart_EM20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM20" name="x_EM20" id="x_EM20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM21->Visible) { // EM21 ?>
	<div id="r_EM21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM21" for="x_EM21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM21" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM21->caption() ?><?php echo $ivf_stimulation_chart_edit->EM21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM21" type="text/html"><span id="el_ivf_stimulation_chart_EM21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM21" name="x_EM21" id="x_EM21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM22->Visible) { // EM22 ?>
	<div id="r_EM22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM22" for="x_EM22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM22" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM22->caption() ?><?php echo $ivf_stimulation_chart_edit->EM22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM22" type="text/html"><span id="el_ivf_stimulation_chart_EM22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM22" name="x_EM22" id="x_EM22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM23->Visible) { // EM23 ?>
	<div id="r_EM23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM23" for="x_EM23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM23" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM23->caption() ?><?php echo $ivf_stimulation_chart_edit->EM23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM23" type="text/html"><span id="el_ivf_stimulation_chart_EM23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM23" name="x_EM23" id="x_EM23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM24->Visible) { // EM24 ?>
	<div id="r_EM24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM24" for="x_EM24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM24" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM24->caption() ?><?php echo $ivf_stimulation_chart_edit->EM24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM24" type="text/html"><span id="el_ivf_stimulation_chart_EM24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM24" name="x_EM24" id="x_EM24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EM25->Visible) { // EM25 ?>
	<div id="r_EM25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM25" for="x_EM25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM25" type="text/html"><?php echo $ivf_stimulation_chart_edit->EM25->caption() ?><?php echo $ivf_stimulation_chart_edit->EM25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EM25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM25" type="text/html"><span id="el_ivf_stimulation_chart_EM25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM25" name="x_EM25" id="x_EM25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EM25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EM25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EM25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->EM25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others14->Visible) { // Others14 ?>
	<div id="r_Others14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others14" for="x_Others14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others14" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others14->caption() ?><?php echo $ivf_stimulation_chart_edit->Others14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others14" type="text/html"><span id="el_ivf_stimulation_chart_Others14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others14" name="x_Others14" id="x_Others14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others15->Visible) { // Others15 ?>
	<div id="r_Others15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others15" for="x_Others15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others15" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others15->caption() ?><?php echo $ivf_stimulation_chart_edit->Others15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others15" type="text/html"><span id="el_ivf_stimulation_chart_Others15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others15" name="x_Others15" id="x_Others15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others16->Visible) { // Others16 ?>
	<div id="r_Others16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others16" for="x_Others16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others16" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others16->caption() ?><?php echo $ivf_stimulation_chart_edit->Others16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others16" type="text/html"><span id="el_ivf_stimulation_chart_Others16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others16" name="x_Others16" id="x_Others16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others17->Visible) { // Others17 ?>
	<div id="r_Others17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others17" for="x_Others17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others17" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others17->caption() ?><?php echo $ivf_stimulation_chart_edit->Others17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others17" type="text/html"><span id="el_ivf_stimulation_chart_Others17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others17" name="x_Others17" id="x_Others17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others18->Visible) { // Others18 ?>
	<div id="r_Others18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others18" for="x_Others18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others18" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others18->caption() ?><?php echo $ivf_stimulation_chart_edit->Others18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others18" type="text/html"><span id="el_ivf_stimulation_chart_Others18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others18" name="x_Others18" id="x_Others18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others19->Visible) { // Others19 ?>
	<div id="r_Others19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others19" for="x_Others19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others19" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others19->caption() ?><?php echo $ivf_stimulation_chart_edit->Others19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others19" type="text/html"><span id="el_ivf_stimulation_chart_Others19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others19" name="x_Others19" id="x_Others19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others20->Visible) { // Others20 ?>
	<div id="r_Others20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others20" for="x_Others20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others20" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others20->caption() ?><?php echo $ivf_stimulation_chart_edit->Others20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others20" type="text/html"><span id="el_ivf_stimulation_chart_Others20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others20" name="x_Others20" id="x_Others20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others21->Visible) { // Others21 ?>
	<div id="r_Others21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others21" for="x_Others21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others21" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others21->caption() ?><?php echo $ivf_stimulation_chart_edit->Others21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others21" type="text/html"><span id="el_ivf_stimulation_chart_Others21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others21" name="x_Others21" id="x_Others21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others22->Visible) { // Others22 ?>
	<div id="r_Others22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others22" for="x_Others22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others22" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others22->caption() ?><?php echo $ivf_stimulation_chart_edit->Others22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others22" type="text/html"><span id="el_ivf_stimulation_chart_Others22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others22" name="x_Others22" id="x_Others22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others23->Visible) { // Others23 ?>
	<div id="r_Others23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others23" for="x_Others23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others23" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others23->caption() ?><?php echo $ivf_stimulation_chart_edit->Others23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others23" type="text/html"><span id="el_ivf_stimulation_chart_Others23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others23" name="x_Others23" id="x_Others23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others24->Visible) { // Others24 ?>
	<div id="r_Others24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others24" for="x_Others24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others24" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others24->caption() ?><?php echo $ivf_stimulation_chart_edit->Others24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others24" type="text/html"><span id="el_ivf_stimulation_chart_Others24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others24" name="x_Others24" id="x_Others24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->Others25->Visible) { // Others25 ?>
	<div id="r_Others25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others25" for="x_Others25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others25" type="text/html"><?php echo $ivf_stimulation_chart_edit->Others25->caption() ?><?php echo $ivf_stimulation_chart_edit->Others25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->Others25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others25" type="text/html"><span id="el_ivf_stimulation_chart_Others25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others25" name="x_Others25" id="x_Others25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->Others25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->Others25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->Others25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->Others25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR14->Visible) { // DR14 ?>
	<div id="r_DR14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR14" for="x_DR14" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR14" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR14->caption() ?><?php echo $ivf_stimulation_chart_edit->DR14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR14" type="text/html"><span id="el_ivf_stimulation_chart_DR14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR14" name="x_DR14" id="x_DR14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR14->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR15->Visible) { // DR15 ?>
	<div id="r_DR15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR15" for="x_DR15" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR15" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR15->caption() ?><?php echo $ivf_stimulation_chart_edit->DR15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR15" type="text/html"><span id="el_ivf_stimulation_chart_DR15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR15" name="x_DR15" id="x_DR15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR15->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR16->Visible) { // DR16 ?>
	<div id="r_DR16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR16" for="x_DR16" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR16" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR16->caption() ?><?php echo $ivf_stimulation_chart_edit->DR16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR16" type="text/html"><span id="el_ivf_stimulation_chart_DR16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR16" name="x_DR16" id="x_DR16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR16->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR17->Visible) { // DR17 ?>
	<div id="r_DR17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR17" for="x_DR17" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR17" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR17->caption() ?><?php echo $ivf_stimulation_chart_edit->DR17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR17" type="text/html"><span id="el_ivf_stimulation_chart_DR17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR17" name="x_DR17" id="x_DR17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR17->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR18->Visible) { // DR18 ?>
	<div id="r_DR18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR18" for="x_DR18" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR18" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR18->caption() ?><?php echo $ivf_stimulation_chart_edit->DR18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR18" type="text/html"><span id="el_ivf_stimulation_chart_DR18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR18" name="x_DR18" id="x_DR18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR18->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR19->Visible) { // DR19 ?>
	<div id="r_DR19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR19" for="x_DR19" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR19" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR19->caption() ?><?php echo $ivf_stimulation_chart_edit->DR19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR19" type="text/html"><span id="el_ivf_stimulation_chart_DR19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR19" name="x_DR19" id="x_DR19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR19->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR20->Visible) { // DR20 ?>
	<div id="r_DR20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR20" for="x_DR20" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR20" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR20->caption() ?><?php echo $ivf_stimulation_chart_edit->DR20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR20" type="text/html"><span id="el_ivf_stimulation_chart_DR20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR20" name="x_DR20" id="x_DR20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR20->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR21->Visible) { // DR21 ?>
	<div id="r_DR21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR21" for="x_DR21" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR21" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR21->caption() ?><?php echo $ivf_stimulation_chart_edit->DR21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR21" type="text/html"><span id="el_ivf_stimulation_chart_DR21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR21" name="x_DR21" id="x_DR21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR21->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR22->Visible) { // DR22 ?>
	<div id="r_DR22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR22" for="x_DR22" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR22" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR22->caption() ?><?php echo $ivf_stimulation_chart_edit->DR22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR22" type="text/html"><span id="el_ivf_stimulation_chart_DR22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR22" name="x_DR22" id="x_DR22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR22->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR23->Visible) { // DR23 ?>
	<div id="r_DR23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR23" for="x_DR23" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR23" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR23->caption() ?><?php echo $ivf_stimulation_chart_edit->DR23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR23" type="text/html"><span id="el_ivf_stimulation_chart_DR23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR23" name="x_DR23" id="x_DR23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR23->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR24->Visible) { // DR24 ?>
	<div id="r_DR24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR24" for="x_DR24" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR24" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR24->caption() ?><?php echo $ivf_stimulation_chart_edit->DR24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR24" type="text/html"><span id="el_ivf_stimulation_chart_DR24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR24" name="x_DR24" id="x_DR24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR24->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DR25->Visible) { // DR25 ?>
	<div id="r_DR25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR25" for="x_DR25" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR25" type="text/html"><?php echo $ivf_stimulation_chart_edit->DR25->caption() ?><?php echo $ivf_stimulation_chart_edit->DR25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DR25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR25" type="text/html"><span id="el_ivf_stimulation_chart_DR25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR25" name="x_DR25" id="x_DR25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->DR25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->DR25->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->DR25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DR25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E214->Visible) { // E214 ?>
	<div id="r_E214" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E214" for="x_E214" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E214" type="text/html"><?php echo $ivf_stimulation_chart_edit->E214->caption() ?><?php echo $ivf_stimulation_chart_edit->E214->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E214->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E214" type="text/html"><span id="el_ivf_stimulation_chart_E214">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E214" name="x_E214" id="x_E214" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E214->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E214->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E214->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E214->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E215->Visible) { // E215 ?>
	<div id="r_E215" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E215" for="x_E215" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E215" type="text/html"><?php echo $ivf_stimulation_chart_edit->E215->caption() ?><?php echo $ivf_stimulation_chart_edit->E215->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E215->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E215" type="text/html"><span id="el_ivf_stimulation_chart_E215">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E215" name="x_E215" id="x_E215" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E215->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E215->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E215->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E215->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E216->Visible) { // E216 ?>
	<div id="r_E216" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E216" for="x_E216" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E216" type="text/html"><?php echo $ivf_stimulation_chart_edit->E216->caption() ?><?php echo $ivf_stimulation_chart_edit->E216->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E216->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E216" type="text/html"><span id="el_ivf_stimulation_chart_E216">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E216" name="x_E216" id="x_E216" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E216->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E216->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E216->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E216->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E217->Visible) { // E217 ?>
	<div id="r_E217" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E217" for="x_E217" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E217" type="text/html"><?php echo $ivf_stimulation_chart_edit->E217->caption() ?><?php echo $ivf_stimulation_chart_edit->E217->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E217->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E217" type="text/html"><span id="el_ivf_stimulation_chart_E217">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E217" name="x_E217" id="x_E217" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E217->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E217->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E217->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E217->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E218->Visible) { // E218 ?>
	<div id="r_E218" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E218" for="x_E218" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E218" type="text/html"><?php echo $ivf_stimulation_chart_edit->E218->caption() ?><?php echo $ivf_stimulation_chart_edit->E218->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E218->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E218" type="text/html"><span id="el_ivf_stimulation_chart_E218">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E218" name="x_E218" id="x_E218" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E218->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E218->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E218->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E218->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E219->Visible) { // E219 ?>
	<div id="r_E219" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E219" for="x_E219" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E219" type="text/html"><?php echo $ivf_stimulation_chart_edit->E219->caption() ?><?php echo $ivf_stimulation_chart_edit->E219->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E219->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E219" type="text/html"><span id="el_ivf_stimulation_chart_E219">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E219" name="x_E219" id="x_E219" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E219->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E219->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E219->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E219->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E220->Visible) { // E220 ?>
	<div id="r_E220" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E220" for="x_E220" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E220" type="text/html"><?php echo $ivf_stimulation_chart_edit->E220->caption() ?><?php echo $ivf_stimulation_chart_edit->E220->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E220->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E220" type="text/html"><span id="el_ivf_stimulation_chart_E220">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E220" name="x_E220" id="x_E220" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E220->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E220->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E220->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E220->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E221->Visible) { // E221 ?>
	<div id="r_E221" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E221" for="x_E221" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E221" type="text/html"><?php echo $ivf_stimulation_chart_edit->E221->caption() ?><?php echo $ivf_stimulation_chart_edit->E221->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E221->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E221" type="text/html"><span id="el_ivf_stimulation_chart_E221">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E221" name="x_E221" id="x_E221" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E221->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E221->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E221->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E221->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E222->Visible) { // E222 ?>
	<div id="r_E222" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E222" for="x_E222" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E222" type="text/html"><?php echo $ivf_stimulation_chart_edit->E222->caption() ?><?php echo $ivf_stimulation_chart_edit->E222->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E222->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E222" type="text/html"><span id="el_ivf_stimulation_chart_E222">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E222" name="x_E222" id="x_E222" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E222->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E222->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E222->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E222->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E223->Visible) { // E223 ?>
	<div id="r_E223" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E223" for="x_E223" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E223" type="text/html"><?php echo $ivf_stimulation_chart_edit->E223->caption() ?><?php echo $ivf_stimulation_chart_edit->E223->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E223->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E223" type="text/html"><span id="el_ivf_stimulation_chart_E223">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E223" name="x_E223" id="x_E223" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E223->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E223->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E223->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E223->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E224->Visible) { // E224 ?>
	<div id="r_E224" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E224" for="x_E224" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E224" type="text/html"><?php echo $ivf_stimulation_chart_edit->E224->caption() ?><?php echo $ivf_stimulation_chart_edit->E224->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E224->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E224" type="text/html"><span id="el_ivf_stimulation_chart_E224">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E224" name="x_E224" id="x_E224" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E224->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E224->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E224->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E224->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->E225->Visible) { // E225 ?>
	<div id="r_E225" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E225" for="x_E225" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E225" type="text/html"><?php echo $ivf_stimulation_chart_edit->E225->caption() ?><?php echo $ivf_stimulation_chart_edit->E225->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->E225->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E225" type="text/html"><span id="el_ivf_stimulation_chart_E225">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E225" name="x_E225" id="x_E225" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->E225->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->E225->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->E225->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->E225->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<div id="r_EEETTTDTE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EEETTTDTE" for="x_EEETTTDTE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EEETTTDTE" type="text/html"><?php echo $ivf_stimulation_chart_edit->EEETTTDTE->caption() ?><?php echo $ivf_stimulation_chart_edit->EEETTTDTE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EEETTTDTE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EEETTTDTE" type="text/html"><span id="el_ivf_stimulation_chart_EEETTTDTE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EEETTTDTE" data-format="7" name="x_EEETTTDTE" id="x_EEETTTDTE" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EEETTTDTE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EEETTTDTE->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EEETTTDTE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->EEETTTDTE->ReadOnly && !$ivf_stimulation_chart_edit->EEETTTDTE->Disabled && !isset($ivf_stimulation_chart_edit->EEETTTDTE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->EEETTTDTE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_EEETTTDTE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->EEETTTDTE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->bhcgdate->Visible) { // bhcgdate ?>
	<div id="r_bhcgdate" class="form-group row">
		<label id="elh_ivf_stimulation_chart_bhcgdate" for="x_bhcgdate" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_bhcgdate" type="text/html"><?php echo $ivf_stimulation_chart_edit->bhcgdate->caption() ?><?php echo $ivf_stimulation_chart_edit->bhcgdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->bhcgdate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_bhcgdate" type="text/html"><span id="el_ivf_stimulation_chart_bhcgdate">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_bhcgdate" data-format="7" name="x_bhcgdate" id="x_bhcgdate" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->bhcgdate->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->bhcgdate->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->bhcgdate->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->bhcgdate->ReadOnly && !$ivf_stimulation_chart_edit->bhcgdate->Disabled && !isset($ivf_stimulation_chart_edit->bhcgdate->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->bhcgdate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_bhcgdate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_edit->bhcgdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<div id="r_TUBAL_PATENCY" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TUBAL_PATENCY" for="x_TUBAL_PATENCY" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->caption() ?><?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TUBAL_PATENCY" data-value-separator="<?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->displayValueSeparatorAttribute() ?>" id="x_TUBAL_PATENCY" name="x_TUBAL_PATENCY"<?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->selectOptionListHtml("x_TUBAL_PATENCY") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TUBAL_PATENCY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->HSG->Visible) { // HSG ?>
	<div id="r_HSG" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HSG" for="x_HSG" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HSG" type="text/html"><?php echo $ivf_stimulation_chart_edit->HSG->caption() ?><?php echo $ivf_stimulation_chart_edit->HSG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->HSG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HSG" type="text/html"><span id="el_ivf_stimulation_chart_HSG">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HSG" data-value-separator="<?php echo $ivf_stimulation_chart_edit->HSG->displayValueSeparatorAttribute() ?>" id="x_HSG" name="x_HSG"<?php echo $ivf_stimulation_chart_edit->HSG->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->HSG->selectOptionListHtml("x_HSG") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->HSG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->DHL->Visible) { // DHL ?>
	<div id="r_DHL" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DHL" for="x_DHL" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DHL" type="text/html"><?php echo $ivf_stimulation_chart_edit->DHL->caption() ?><?php echo $ivf_stimulation_chart_edit->DHL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->DHL->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DHL" type="text/html"><span id="el_ivf_stimulation_chart_DHL">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_DHL" data-value-separator="<?php echo $ivf_stimulation_chart_edit->DHL->displayValueSeparatorAttribute() ?>" id="x_DHL" name="x_DHL"<?php echo $ivf_stimulation_chart_edit->DHL->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->DHL->selectOptionListHtml("x_DHL") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->DHL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<div id="r_UTERINE_PROBLEMS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" for="x_UTERINE_PROBLEMS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->caption() ?><?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_UTERINE_PROBLEMS" data-value-separator="<?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_UTERINE_PROBLEMS" name="x_UTERINE_PROBLEMS"<?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->selectOptionListHtml("x_UTERINE_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->UTERINE_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<div id="r_W_COMORBIDS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_W_COMORBIDS" for="x_W_COMORBIDS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->caption() ?><?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_W_COMORBIDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_W_COMORBIDS" data-value-separator="<?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->displayValueSeparatorAttribute() ?>" id="x_W_COMORBIDS" name="x_W_COMORBIDS"<?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->selectOptionListHtml("x_W_COMORBIDS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->W_COMORBIDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<div id="r_H_COMORBIDS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_H_COMORBIDS" for="x_H_COMORBIDS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->caption() ?><?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_H_COMORBIDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_H_COMORBIDS" data-value-separator="<?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->displayValueSeparatorAttribute() ?>" id="x_H_COMORBIDS" name="x_H_COMORBIDS"<?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->selectOptionListHtml("x_H_COMORBIDS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->H_COMORBIDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" for="x_SEXUAL_DYSFUNCTION" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->caption() ?><?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SEXUAL_DYSFUNCTION" data-value-separator="<?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->displayValueSeparatorAttribute() ?>" id="x_SEXUAL_DYSFUNCTION" name="x_SEXUAL_DYSFUNCTION"<?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->selectOptionListHtml("x_SEXUAL_DYSFUNCTION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->SEXUAL_DYSFUNCTION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->TABLETS->Visible) { // TABLETS ?>
	<div id="r_TABLETS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TABLETS" for="x_TABLETS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TABLETS" type="text/html"><?php echo $ivf_stimulation_chart_edit->TABLETS->caption() ?><?php echo $ivf_stimulation_chart_edit->TABLETS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->TABLETS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TABLETS" type="text/html"><span id="el_ivf_stimulation_chart_TABLETS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->TABLETS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->TABLETS->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->TABLETS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->TABLETS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<div id="r_FOLLICLE_STATUS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" for="x_FOLLICLE_STATUS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->caption() ?><?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_FOLLICLE_STATUS" data-value-separator="<?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->displayValueSeparatorAttribute() ?>" id="x_FOLLICLE_STATUS" name="x_FOLLICLE_STATUS"<?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->selectOptionListHtml("x_FOLLICLE_STATUS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->FOLLICLE_STATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<div id="r_NUMBER_OF_IUI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" for="x_NUMBER_OF_IUI" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->caption() ?><?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_NUMBER_OF_IUI" data-value-separator="<?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->displayValueSeparatorAttribute() ?>" id="x_NUMBER_OF_IUI" name="x_NUMBER_OF_IUI"<?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->selectOptionListHtml("x_NUMBER_OF_IUI") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->NUMBER_OF_IUI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->PROCEDURE->Visible) { // PROCEDURE ?>
	<div id="r_PROCEDURE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PROCEDURE" for="x_PROCEDURE" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PROCEDURE" type="text/html"><?php echo $ivf_stimulation_chart_edit->PROCEDURE->caption() ?><?php echo $ivf_stimulation_chart_edit->PROCEDURE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->PROCEDURE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PROCEDURE" type="text/html"><span id="el_ivf_stimulation_chart_PROCEDURE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_PROCEDURE" data-value-separator="<?php echo $ivf_stimulation_chart_edit->PROCEDURE->displayValueSeparatorAttribute() ?>" id="x_PROCEDURE" name="x_PROCEDURE"<?php echo $ivf_stimulation_chart_edit->PROCEDURE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->PROCEDURE->selectOptionListHtml("x_PROCEDURE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->PROCEDURE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<div id="r_LUTEAL_SUPPORT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" for="x_LUTEAL_SUPPORT" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->caption() ?><?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_LUTEAL_SUPPORT" data-value-separator="<?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->displayValueSeparatorAttribute() ?>" id="x_LUTEAL_SUPPORT" name="x_LUTEAL_SUPPORT"<?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->selectOptionListHtml("x_LUTEAL_SUPPORT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->LUTEAL_SUPPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->caption() ?><?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SPECIFIC_MATERNAL_PROBLEMS" data-value-separator="<?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_MATERNAL_PROBLEMS" name="x_SPECIFIC_MATERNAL_PROBLEMS"<?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->selectOptionListHtml("x_SPECIFIC_MATERNAL_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_edit->SPECIFIC_MATERNAL_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<div id="r_ONGOING_PREG" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ONGOING_PREG" for="x_ONGOING_PREG" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->caption() ?><?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><span id="el_ivf_stimulation_chart_ONGOING_PREG">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->ONGOING_PREG->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_edit->ONGOING_PREG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_edit->EDD_Date->Visible) { // EDD_Date ?>
	<div id="r_EDD_Date" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EDD_Date" for="x_EDD_Date" class="<?php echo $ivf_stimulation_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EDD_Date" type="text/html"><?php echo $ivf_stimulation_chart_edit->EDD_Date->caption() ?><?php echo $ivf_stimulation_chart_edit->EDD_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_edit->EDD_Date->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EDD_Date" type="text/html"><span id="el_ivf_stimulation_chart_EDD_Date">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_edit->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_edit->EDD_Date->EditValue ?>"<?php echo $ivf_stimulation_chart_edit->EDD_Date->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_edit->EDD_Date->ReadOnly && !$ivf_stimulation_chart_edit->EDD_Date->Disabled && !isset($ivf_stimulation_chart_edit->EDD_Date->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_edit->EDD_Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartedit_js">
loadjs.ready(["fivf_stimulation_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartedit", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_stimulation_chart_edit->EDD_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_stimulation_chartedit" class="ew-custom-template"></div>
<script id="tpm_ivf_stimulation_chartedit" type="text/html">
<div id="ct_ivf_stimulation_chart_edit"><style>
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
<table id="ETTableStIIUUII" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TUBAL_PATENCY"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TUBAL_PATENCY")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_HSG"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_HSG")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_DHL"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_DHL")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_UTERINE_PROBLEMS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_W_COMORBIDS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_W_COMORBIDS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_H_COMORBIDS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_H_COMORBIDS")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_TABLETS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_TABLETS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_FOLLICLE_STATUS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_FOLLICLE_STATUS")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_PROCEDURE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_PROCEDURE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_LUTEAL_SUPPORT")/}}</span></td>
		  		<td></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_ONGOING_PREG"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_ONGOING_PREG")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_ivf_stimulation_chart_EDD_Date"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_EDD_Date")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="IUIivfcONVERTTER" class="row">
{{include tmpl="#tpc_ivf_stimulation_chart_Convert"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_stimulation_chart_Convert")/}}
</div>
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

<?php if (!$ivf_stimulation_chart_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_stimulation_chart_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_chart_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_stimulation_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_stimulation_chartedit", "tpm_ivf_stimulation_chartedit", "ivf_stimulation_chartedit", "<?php echo $ivf_stimulation_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_stimulation_chartedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_stimulation_chart_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	var tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="none";document.getElementById("x_StChDate1").style.width="220px",document.getElementById("x_StChDate2").style.width="220px",document.getElementById("x_StChDate3").style.width="220px",document.getElementById("x_StChDate4").style.width="220px",document.getElementById("x_StChDate5").style.width="220px",document.getElementById("x_StChDate6").style.width="220px",document.getElementById("x_StChDate7").style.width="220px",document.getElementById("x_StChDate8").style.width="220px",document.getElementById("x_StChDate9").style.width="220px",document.getElementById("x_StChDate10").style.width="220px",document.getElementById("x_StChDate11").style.width="220px",document.getElementById("x_StChDate12").style.width="220px",document.getElementById("x_StChDate13").style.width="220px",document.getElementById("x_StChDate14").style.width="220px",document.getElementById("x_StChDate15").style.width="220px",document.getElementById("x_StChDate16").style.width="220px",document.getElementById("x_StChDate17").style.width="220px",document.getElementById("x_StChDate18").style.width="220px",document.getElementById("x_StChDate19").style.width="220px",document.getElementById("x_StChDate20").style.width="220px",document.getElementById("x_StChDate21").style.width="220px",document.getElementById("x_StChDate22").style.width="220px",document.getElementById("x_StChDate23").style.width="220px",document.getElementById("x_StChDate24").style.width="220px",document.getElementById("x_StChDate25").style.width="220px",document.getElementById("x_CycleDay1").style.width="80px",document.getElementById("x_CycleDay2").style.width="80px",document.getElementById("x_CycleDay3").style.width="80px",document.getElementById("x_CycleDay4").style.width="80px",document.getElementById("x_CycleDay5").style.width="80px",document.getElementById("x_CycleDay6").style.width="80px",document.getElementById("x_CycleDay7").style.width="80px",document.getElementById("x_CycleDay8").style.width="80px",document.getElementById("x_CycleDay9").style.width="80px",document.getElementById("x_CycleDay10").style.width="80px",document.getElementById("x_CycleDay11").style.width="80px",document.getElementById("x_CycleDay12").style.width="80px",document.getElementById("x_CycleDay13").style.width="80px",document.getElementById("x_CycleDay14").style.width="80px",document.getElementById("x_CycleDay15").style.width="80px",document.getElementById("x_CycleDay16").style.width="80px",document.getElementById("x_CycleDay17").style.width="80px",document.getElementById("x_CycleDay18").style.width="80px",document.getElementById("x_CycleDay19").style.width="80px",document.getElementById("x_CycleDay20").style.width="80px",document.getElementById("x_CycleDay21").style.width="80px",document.getElementById("x_CycleDay22").style.width="80px",document.getElementById("x_CycleDay23").style.width="80px",document.getElementById("x_CycleDay24").style.width="80px",document.getElementById("x_CycleDay25").style.width="80px",document.getElementById("x_StimulationDay1").style.width="80px",document.getElementById("x_StimulationDay2").style.width="80px",document.getElementById("x_StimulationDay3").style.width="80px",document.getElementById("x_StimulationDay4").style.width="80px",document.getElementById("x_StimulationDay5").style.width="80px",document.getElementById("x_StimulationDay6").style.width="80px",document.getElementById("x_StimulationDay7").style.width="80px",document.getElementById("x_StimulationDay8").style.width="80px",document.getElementById("x_StimulationDay9").style.width="80px",document.getElementById("x_StimulationDay10").style.width="80px",document.getElementById("x_StimulationDay11").style.width="80px",document.getElementById("x_StimulationDay12").style.width="80px",document.getElementById("x_StimulationDay13").style.width="80px",document.getElementById("x_StimulationDay14").style.width="80px",document.getElementById("x_StimulationDay15").style.width="80px",document.getElementById("x_StimulationDay16").style.width="80px",document.getElementById("x_StimulationDay17").style.width="80px",document.getElementById("x_StimulationDay18").style.width="80px",document.getElementById("x_StimulationDay19").style.width="80px",document.getElementById("x_StimulationDay20").style.width="80px",document.getElementById("x_StimulationDay21").style.width="80px",document.getElementById("x_StimulationDay22").style.width="80px",document.getElementById("x_StimulationDay23").style.width="80px",document.getElementById("x_StimulationDay24").style.width="80px",document.getElementById("x_StimulationDay25").style.width="80px",document.getElementById("x_E21").style.width="80px",document.getElementById("x_E22").style.width="80px",document.getElementById("x_E23").style.width="80px",document.getElementById("x_E24").style.width="80px",document.getElementById("x_E25").style.width="80px",document.getElementById("x_E26").style.width="80px",document.getElementById("x_E27").style.width="80px",document.getElementById("x_E28").style.width="80px",document.getElementById("x_E29").style.width="80px",document.getElementById("x_E210").style.width="80px",document.getElementById("x_E211").style.width="80px",document.getElementById("x_E212").style.width="80px",document.getElementById("x_E213").style.width="80px",document.getElementById("x_E214").style.width="80px",document.getElementById("x_E215").style.width="80px",document.getElementById("x_E216").style.width="80px",document.getElementById("x_E217").style.width="80px",document.getElementById("x_E218").style.width="80px",document.getElementById("x_E219").style.width="80px",document.getElementById("x_E220").style.width="80px",document.getElementById("x_E221").style.width="80px",document.getElementById("x_E222").style.width="80px",document.getElementById("x_E223").style.width="80px",document.getElementById("x_E224").style.width="80px",document.getElementById("x_E225").style.width="80px",document.getElementById("x_P41").style.width="80px",document.getElementById("x_P42").style.width="80px",document.getElementById("x_P43").style.width="80px",document.getElementById("x_P44").style.width="80px",document.getElementById("x_P45").style.width="80px",document.getElementById("x_P46").style.width="80px",document.getElementById("x_P47").style.width="80px",document.getElementById("x_P48").style.width="80px",document.getElementById("x_P49").style.width="80px",document.getElementById("x_P410").style.width="80px",document.getElementById("x_P411").style.width="80px",document.getElementById("x_P412").style.width="80px",document.getElementById("x_P413").style.width="80px",document.getElementById("x_P414").style.width="80px",document.getElementById("x_P415").style.width="80px",document.getElementById("x_P416").style.width="80px",document.getElementById("x_P417").style.width="80px",document.getElementById("x_P418").style.width="80px",document.getElementById("x_P419").style.width="80px",document.getElementById("x_P420").style.width="80px",document.getElementById("x_P421").style.width="80px",document.getElementById("x_P422").style.width="80px",document.getElementById("x_P423").style.width="80px",document.getElementById("x_P424").style.width="80px",document.getElementById("x_P425").style.width="80px",document.getElementById("x_USGRt1").style.width="80px",document.getElementById("x_USGRt2").style.width="80px",document.getElementById("x_USGRt3").style.width="80px",document.getElementById("x_USGRt4").style.width="80px",document.getElementById("x_USGRt5").style.width="80px",document.getElementById("x_USGRt6").style.width="80px",document.getElementById("x_USGRt7").style.width="80px",document.getElementById("x_USGRt8").style.width="80px",document.getElementById("x_USGRt9").style.width="80px",document.getElementById("x_USGRt10").style.width="80px",document.getElementById("x_USGRt11").style.width="80px",document.getElementById("x_USGRt12").style.width="80px",document.getElementById("x_USGRt13").style.width="80px",document.getElementById("x_USGRt14").style.width="80px",document.getElementById("x_USGRt15").style.width="80px",document.getElementById("x_USGRt16").style.width="80px",document.getElementById("x_USGRt17").style.width="80px",document.getElementById("x_USGRt18").style.width="80px",document.getElementById("x_USGRt19").style.width="80px",document.getElementById("x_USGRt20").style.width="80px",document.getElementById("x_USGRt21").style.width="80px",document.getElementById("x_USGRt22").style.width="80px",document.getElementById("x_USGRt23").style.width="80px",document.getElementById("x_USGRt24").style.width="80px",document.getElementById("x_USGRt25").style.width="80px",document.getElementById("x_USGLt1").style.width="80px",document.getElementById("x_USGLt2").style.width="80px",document.getElementById("x_USGLt3").style.width="80px",document.getElementById("x_USGLt4").style.width="80px",document.getElementById("x_USGLt5").style.width="80px",document.getElementById("x_USGLt6").style.width="80px",document.getElementById("x_USGLt7").style.width="80px",document.getElementById("x_USGLt8").style.width="80px",document.getElementById("x_USGLt9").style.width="80px",document.getElementById("x_USGLt10").style.width="80px",document.getElementById("x_USGLt11").style.width="80px",document.getElementById("x_USGLt12").style.width="80px",document.getElementById("x_USGLt13").style.width="80px",document.getElementById("x_USGLt14").style.width="80px",document.getElementById("x_USGLt15").style.width="80px",document.getElementById("x_USGLt16").style.width="80px",document.getElementById("x_USGLt17").style.width="80px",document.getElementById("x_USGLt18").style.width="80px",document.getElementById("x_USGLt19").style.width="80px",document.getElementById("x_USGLt20").style.width="80px",document.getElementById("x_USGLt21").style.width="80px",document.getElementById("x_USGLt22").style.width="80px",document.getElementById("x_USGLt23").style.width="80px",document.getElementById("x_USGLt24").style.width="80px",document.getElementById("x_USGLt25").style.width="80px",document.getElementById("x_EM1").style.width="80px",document.getElementById("x_EM2").style.width="80px",document.getElementById("x_EM3").style.width="80px",document.getElementById("x_EM4").style.width="80px",document.getElementById("x_EM5").style.width="80px",document.getElementById("x_EM6").style.width="80px",document.getElementById("x_EM7").style.width="80px",document.getElementById("x_EM8").style.width="80px",document.getElementById("x_EM9").style.width="80px",document.getElementById("x_EM10").style.width="80px",document.getElementById("x_EM11").style.width="80px",document.getElementById("x_EM12").style.width="80px",document.getElementById("x_EM13").style.width="80px",document.getElementById("x_EM14").style.width="80px",document.getElementById("x_EM15").style.width="80px",document.getElementById("x_EM16").style.width="80px",document.getElementById("x_EM17").style.width="80px",document.getElementById("x_EM18").style.width="80px",document.getElementById("x_EM19").style.width="80px",document.getElementById("x_EM20").style.width="80px",document.getElementById("x_EM21").style.width="80px",document.getElementById("x_EM22").style.width="80px",document.getElementById("x_EM23").style.width="80px",document.getElementById("x_EM24").style.width="80px",document.getElementById("x_EM25").style.width="80px",document.getElementById("x_Others1").style.width="80px",document.getElementById("x_Others2").style.width="80px",document.getElementById("x_Others3").style.width="80px",document.getElementById("x_Others4").style.width="80px",document.getElementById("x_Others5").style.width="80px",document.getElementById("x_Others6").style.width="80px",document.getElementById("x_Others7").style.width="80px",document.getElementById("x_Others8").style.width="80px",document.getElementById("x_Others9").style.width="80px",document.getElementById("x_Others10").style.width="80px",document.getElementById("x_Others11").style.width="80px",document.getElementById("x_Others12").style.width="80px",document.getElementById("x_Others13").style.width="80px",document.getElementById("x_Others14").style.width="80px",document.getElementById("x_Others15").style.width="80px",document.getElementById("x_Others16").style.width="80px",document.getElementById("x_Others17").style.width="80px",document.getElementById("x_Others18").style.width="80px",document.getElementById("x_Others19").style.width="80px",document.getElementById("x_Others20").style.width="80px",document.getElementById("x_Others21").style.width="80px",document.getElementById("x_Others22").style.width="80px",document.getElementById("x_Others23").style.width="80px",document.getElementById("x_Others24").style.width="80px",document.getElementById("x_Others25").style.width="80px",document.getElementById("x_DR1").style.width="80px",document.getElementById("x_DR2").style.width="80px",document.getElementById("x_DR3").style.width="80px",document.getElementById("x_DR4").style.width="80px",document.getElementById("x_DR5").style.width="80px",document.getElementById("x_DR6").style.width="80px",document.getElementById("x_DR7").style.width="80px",document.getElementById("x_DR8").style.width="80px",document.getElementById("x_DR9").style.width="80px",document.getElementById("x_DR10").style.width="80px",document.getElementById("x_DR11").style.width="80px",document.getElementById("x_DR12").style.width="80px",document.getElementById("x_DR13").style.width="80px",document.getElementById("x_DR14").style.width="80px",document.getElementById("x_DR15").style.width="80px",document.getElementById("x_DR16").style.width="80px",document.getElementById("x_DR17").style.width="80px",document.getElementById("x_DR18").style.width="80px",document.getElementById("x_DR19").style.width="80px",document.getElementById("x_DR20").style.width="80px",document.getElementById("x_DR21").style.width="80px",document.getElementById("x_DR22").style.width="80px",document.getElementById("x_DR23").style.width="80px",document.getElementById("x_DR24").style.width="80px",document.getElementById("x_DR25").style.width="80px",document.getElementById("x_Tablet1").style.width="180px",document.getElementById("x_Tablet2").style.width="180px",document.getElementById("x_Tablet3").style.width="180px",document.getElementById("x_Tablet4").style.width="180px",document.getElementById("x_Tablet5").style.width="180px",document.getElementById("x_Tablet6").style.width="180px",document.getElementById("x_Tablet7").style.width="180px",document.getElementById("x_Tablet8").style.width="180px",document.getElementById("x_Tablet9").style.width="180px",document.getElementById("x_Tablet10").style.width="180px",document.getElementById("x_Tablet11").style.width="180px",document.getElementById("x_Tablet12").style.width="180px",document.getElementById("x_Tablet13").style.width="180px",document.getElementById("x_Tablet14").style.width="180px",document.getElementById("x_Tablet15").style.width="180px",document.getElementById("x_Tablet16").style.width="180px",document.getElementById("x_Tablet17").style.width="180px",document.getElementById("x_Tablet18").style.width="180px",document.getElementById("x_Tablet19").style.width="180px",document.getElementById("x_Tablet20").style.width="180px",document.getElementById("x_Tablet21").style.width="180px",document.getElementById("x_Tablet22").style.width="180px",document.getElementById("x_Tablet23").style.width="180px",document.getElementById("x_Tablet24").style.width="180px",document.getElementById("x_Tablet25").style.width="180px",document.getElementById("x_RFSH1").style.width="160px",document.getElementById("x_RFSH2").style.width="160px",document.getElementById("x_RFSH3").style.width="160px",document.getElementById("x_RFSH4").style.width="160px",document.getElementById("x_RFSH5").style.width="160px",document.getElementById("x_RFSH6").style.width="160px",document.getElementById("x_RFSH7").style.width="160px",document.getElementById("x_RFSH8").style.width="160px",document.getElementById("x_RFSH9").style.width="160px",document.getElementById("x_RFSH10").style.width="160px",document.getElementById("x_RFSH11").style.width="160px",document.getElementById("x_RFSH12").style.width="160px",document.getElementById("x_RFSH13").style.width="160px",document.getElementById("x_RFSH14").style.width="160px",document.getElementById("x_RFSH15").style.width="160px",document.getElementById("x_RFSH16").style.width="160px",document.getElementById("x_RFSH17").style.width="160px",document.getElementById("x_RFSH18").style.width="160px",document.getElementById("x_RFSH19").style.width="160px",document.getElementById("x_RFSH20").style.width="160px",document.getElementById("x_RFSH21").style.width="160px",document.getElementById("x_RFSH22").style.width="160px",document.getElementById("x_RFSH23").style.width="160px",document.getElementById("x_RFSH24").style.width="160px",document.getElementById("x_RFSH25").style.width="160px",document.getElementById("x_HMG1").style.width="160px",document.getElementById("x_HMG2").style.width="160px",document.getElementById("x_HMG3").style.width="160px",document.getElementById("x_HMG4").style.width="160px",document.getElementById("x_HMG5").style.width="160px",document.getElementById("x_HMG6").style.width="160px",document.getElementById("x_HMG7").style.width="160px",document.getElementById("x_HMG8").style.width="160px",document.getElementById("x_HMG9").style.width="160px",document.getElementById("x_HMG10").style.width="160px",document.getElementById("x_HMG11").style.width="160px",document.getElementById("x_HMG12").style.width="160px",document.getElementById("x_HMG13").style.width="160px",document.getElementById("x_HMG14").style.width="160px",document.getElementById("x_HMG15").style.width="160px",document.getElementById("x_HMG16").style.width="160px",document.getElementById("x_HMG17").style.width="160px",document.getElementById("x_HMG18").style.width="160px",document.getElementById("x_HMG19").style.width="160px",document.getElementById("x_HMG20").style.width="160px",document.getElementById("x_HMG21").style.width="160px",document.getElementById("x_HMG22").style.width="160px",document.getElementById("x_HMG23").style.width="160px",document.getElementById("x_HMG24").style.width="160px",document.getElementById("x_HMG25").style.width="160px",document.getElementById("x_GnRH1").style.width="150px",document.getElementById("x_GnRH2").style.width="150px",document.getElementById("x_GnRH3").style.width="150px",document.getElementById("x_GnRH4").style.width="150px",document.getElementById("x_GnRH5").style.width="150px",document.getElementById("x_GnRH6").style.width="150px",document.getElementById("x_GnRH7").style.width="150px",document.getElementById("x_GnRH8").style.width="150px",document.getElementById("x_GnRH9").style.width="150px",document.getElementById("x_GnRH10").style.width="150px",document.getElementById("x_GnRH11").style.width="150px",document.getElementById("x_GnRH12").style.width="150px",document.getElementById("x_GnRH13").style.width="150px",document.getElementById("x_GnRH14").style.width="150px",document.getElementById("x_GnRH15").style.width="150px",document.getElementById("x_GnRH16").style.width="150px",document.getElementById("x_GnRH17").style.width="150px",document.getElementById("x_GnRH18").style.width="150px",document.getElementById("x_GnRH19").style.width="150px",document.getElementById("x_GnRH20").style.width="150px",document.getElementById("x_GnRH21").style.width="150px",document.getElementById("x_GnRH22").style.width="150px",document.getElementById("x_GnRH23").style.width="150px",document.getElementById("x_GnRH24").style.width="150px",document.getElementById("x_GnRH25").style.width="150px";tableE2=document.getElementById("ETTableStIIUUII").style.display="none",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="none";var artcycle='<?php echo $resultsA[0]["ARTCYCLE"]; ?>',Treatment='<?php echo $resultsA[0]["Treatment"]; ?>';if("Intrauterine insemination(IUI)"==artcycle){tableE2=document.getElementById("tableE2").style.display="none",tableE2=document.getElementById("tableE21").style.display="none",tableE2=document.getElementById("tableE22").style.display="none",tableE2=document.getElementById("tableE23").style.display="none",tableE2=document.getElementById("tableE24").style.display="none",tableE2=document.getElementById("tableE25").style.display="none",tableE2=document.getElementById("tableE26").style.display="none",tableE2=document.getElementById("tableE27").style.display="none",tableE2=document.getElementById("tableE28").style.display="none",tableE2=document.getElementById("tableE29").style.display="none",tableE2=document.getElementById("tableE210").style.display="none",tableE2=document.getElementById("tableE211").style.display="none",tableE2=document.getElementById("tableE212").style.display="none",tableE2=document.getElementById("tableE213").style.display="none",tableE2=document.getElementById("tableE214").style.display="none",tableE2=document.getElementById("tableE215").style.display="none",tableE2=document.getElementById("tableE216").style.display="none",tableE2=document.getElementById("tableE217").style.display="none",tableE2=document.getElementById("tableE218").style.display="none",tableE2=document.getElementById("tableE219").style.display="none",tableE2=document.getElementById("tableE220").style.display="none",tableE2=document.getElementById("tableE221").style.display="none",tableE2=document.getElementById("tableE222").style.display="none",tableE2=document.getElementById("tableE223").style.display="none",tableE2=document.getElementById("tableE224").style.display="none",tableE2=document.getElementById("tableE225").style.display="none";var RowPreProcedureOrder=document.getElementById("RowPreProcedureOrder").style.display="none",RowALLFREEZEINDICATION=document.getElementById("RowALLFREEZEINDICATION").style.display="none",RowDATEOFET=document.getElementById("RowDATEOFET").style.display="none",colPGTA=document.getElementById("colPGTA").style.display="none",colPGD=document.getElementById("colPGD").style.display="none",fieldOPUDATE=document.getElementById("fieldOPUDATE");fieldOPUDATE.firstElementChild.innerText="IUI Date";var x_OPUDATE=document.getElementById("x_OPUDATE");x_OPUDATE.placeholder="IUI Date";var colP4=document.getElementById("colP4").innerHTML="A/CC",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ANTAGONISTDAYSstum=document.getElementById("ANTAGONISTDAYSstum").style.display="none";tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block",tableE2=document.getElementById("ETTableStIIUUII").style.display="block"}if("Frozen Embryo Transfer"===artcycle||"Evaluation cycle"===artcycle){var colE2=document.getElementById("colE2").innerHTML="VE",colUSGRt=(colP4=document.getElementById("colP4").innerHTML="Patches",document.getElementById("colUSGRt").innerHTML="Progesterone"),colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableTablet=(tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",document.getElementById("tableTablet").style.display="none"),tableRFSH=(tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",document.getElementById("tableRFSH").style.display="none"),tableHMG=(tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",document.getElementById("tableHMG").style.display="none"),rowTypeOfInfertility=(tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",document.getElementById("rowTypeOfInfertility").style.display="none"),rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProgesteroneAdminTable=(ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",document.getElementById("ProgesteroneAdminTable").style.display="none");ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",fieldSemenFrozen=document.getElementById("RowPreProcedureOrder").style.display="none",fieldSemenFrozen=document.getElementById("RowALLFREEZEINDICATION").style.display="none",fieldSemenFrozen=document.getElementById("RowDATEOFET").style.display="none",fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block"}else{ETTableSt=document.getElementById("ETTableSt").style.display="none";if("Intrauterine insemination(IUI)"!=artcycle)ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="block";ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none"}if("Fresh ET"==Treatment||"Frozen ET"==Treatment||"OD Fresh ET"==Treatment||"OD Frozen ET"==Treatment||"OD ICSI"==Treatment)colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",rowTypeOfInfertility=document.getElementById("rowTypeOfInfertility").style.display="none",rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none";if("ICSI H"==Treatment)tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block";if("OD ICSI"==Treatment)fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block";function ProgesteroneAccept(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function ProgesteroneCancel(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function addDays(e,t){const l=new Date(Number(e));return l.setDate(e.getDate()+t),l}function calculateDoseofGonadotropins(){}function calculateDoseofRFSHHMG(){for(var e=0,t=0,l=1;l<24;l++){var n="x_RFSH"+l;(d=document.getElementById(n).value.split(" ")).length>1&&(e=parseInt(e)+1,t="Follisurge"==d[0]?parseInt(t)+parseInt(d[1]):parseInt(t)+parseInt(d[2]));var d;n="x_HMG"+l;(d=document.getElementById(n).value.split(" ")).length>1&&(t="HUMOG"==d[0]?parseInt(t)+parseInt(d[1]):parseInt(t)+parseInt(d[2]))}document.getElementById("x_DAYSOFSTIMULATION").value=e,document.getElementById("x_DOSEOFGONADOTROPINS").value=t}function calculateDaysofGnRH(){for(var e=0,t=1;t<24;t++){var l="x_GnRH"+t;document.getElementById(l).value.split(" ").length>1&&(e=parseInt(e)+1)}document.getElementById("x_ANTAGONISTDAYS").value=e}
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_stimulation_chart_edit->terminate();
?>