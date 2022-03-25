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
$ivf_stimulation_chart_add = new ivf_stimulation_chart_add();

// Run the page
$ivf_stimulation_chart_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_chart_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_stimulation_chartadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_stimulation_chartadd = currentForm = new ew.Form("fivf_stimulation_chartadd", "add");

	// Validate form
	fivf_stimulation_chartadd.validate = function() {
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
			<?php if ($ivf_stimulation_chart_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RIDNo->caption(), $ivf_stimulation_chart_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Name->caption(), $ivf_stimulation_chart_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ARTCycle->caption(), $ivf_stimulation_chart_add->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->FemaleFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->FemaleFactor->caption(), $ivf_stimulation_chart_add->FemaleFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->MaleFactor->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleFactor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->MaleFactor->caption(), $ivf_stimulation_chart_add->MaleFactor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Protocol->Required) { ?>
				elm = this.getElements("x" + infix + "_Protocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Protocol->caption(), $ivf_stimulation_chart_add->Protocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SemenFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_SemenFrozen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SemenFrozen->caption(), $ivf_stimulation_chart_add->SemenFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->A4ICSICycle->Required) { ?>
				elm = this.getElements("x" + infix + "_A4ICSICycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->A4ICSICycle->caption(), $ivf_stimulation_chart_add->A4ICSICycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TotalICSICycle->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalICSICycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TotalICSICycle->caption(), $ivf_stimulation_chart_add->TotalICSICycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TypeOfInfertility->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfInfertility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TypeOfInfertility->caption(), $ivf_stimulation_chart_add->TypeOfInfertility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Duration->caption(), $ivf_stimulation_chart_add->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->LMP->Required) { ?>
				elm = this.getElements("x" + infix + "_LMP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->LMP->caption(), $ivf_stimulation_chart_add->LMP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RelevantHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_RelevantHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RelevantHistory->caption(), $ivf_stimulation_chart_add->RelevantHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->IUICycles->Required) { ?>
				elm = this.getElements("x" + infix + "_IUICycles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->IUICycles->caption(), $ivf_stimulation_chart_add->IUICycles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->AFC->Required) { ?>
				elm = this.getElements("x" + infix + "_AFC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->AFC->caption(), $ivf_stimulation_chart_add->AFC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->AMH->Required) { ?>
				elm = this.getElements("x" + infix + "_AMH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->AMH->caption(), $ivf_stimulation_chart_add->AMH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->FBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_FBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->FBMI->caption(), $ivf_stimulation_chart_add->FBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->MBMI->Required) { ?>
				elm = this.getElements("x" + infix + "_MBMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->MBMI->caption(), $ivf_stimulation_chart_add->MBMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->OvarianVolumeRT->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianVolumeRT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->OvarianVolumeRT->caption(), $ivf_stimulation_chart_add->OvarianVolumeRT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->OvarianVolumeLT->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianVolumeLT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->OvarianVolumeLT->caption(), $ivf_stimulation_chart_add->OvarianVolumeLT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DAYSOFSTIMULATION->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYSOFSTIMULATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DAYSOFSTIMULATION->caption(), $ivf_stimulation_chart_add->DAYSOFSTIMULATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->Required) { ?>
				elm = this.getElements("x" + infix + "_DOSEOFGONADOTROPINS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->caption(), $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->INJTYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_INJTYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->INJTYPE->caption(), $ivf_stimulation_chart_add->INJTYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ANTAGONISTDAYS->Required) { ?>
				elm = this.getElements("x" + infix + "_ANTAGONISTDAYS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ANTAGONISTDAYS->caption(), $ivf_stimulation_chart_add->ANTAGONISTDAYS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->Required) { ?>
				elm = this.getElements("x" + infix + "_ANTAGONISTSTARTDAY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->caption(), $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GROWTHHORMONE->Required) { ?>
				elm = this.getElements("x" + infix + "_GROWTHHORMONE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GROWTHHORMONE->caption(), $ivf_stimulation_chart_add->GROWTHHORMONE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->PRETREATMENT->Required) { ?>
				elm = this.getElements("x" + infix + "_PRETREATMENT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->PRETREATMENT->caption(), $ivf_stimulation_chart_add->PRETREATMENT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SerumP4->Required) { ?>
				elm = this.getElements("x" + infix + "_SerumP4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SerumP4->caption(), $ivf_stimulation_chart_add->SerumP4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->FORT->Required) { ?>
				elm = this.getElements("x" + infix + "_FORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->FORT->caption(), $ivf_stimulation_chart_add->FORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->MedicalFactors->Required) { ?>
				elm = this.getElements("x" + infix + "_MedicalFactors");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->MedicalFactors->caption(), $ivf_stimulation_chart_add->MedicalFactors->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SCDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SCDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SCDate->caption(), $ivf_stimulation_chart_add->SCDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->OvarianSurgery->Required) { ?>
				elm = this.getElements("x" + infix + "_OvarianSurgery");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->OvarianSurgery->caption(), $ivf_stimulation_chart_add->OvarianSurgery->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->PreProcedureOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_PreProcedureOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->PreProcedureOrder->caption(), $ivf_stimulation_chart_add->PreProcedureOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TRIGGERR->Required) { ?>
				elm = this.getElements("x" + infix + "_TRIGGERR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TRIGGERR->caption(), $ivf_stimulation_chart_add->TRIGGERR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TRIGGERDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_TRIGGERDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TRIGGERDATE->caption(), $ivf_stimulation_chart_add->TRIGGERDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ATHOMEorCLINIC->Required) { ?>
				elm = this.getElements("x" + infix + "_ATHOMEorCLINIC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ATHOMEorCLINIC->caption(), $ivf_stimulation_chart_add->ATHOMEorCLINIC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->OPUDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_OPUDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->OPUDATE->caption(), $ivf_stimulation_chart_add->OPUDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ALLFREEZEINDICATION->Required) { ?>
				elm = this.getElements("x" + infix + "_ALLFREEZEINDICATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ALLFREEZEINDICATION->caption(), $ivf_stimulation_chart_add->ALLFREEZEINDICATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ERA->Required) { ?>
				elm = this.getElements("x" + infix + "_ERA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ERA->caption(), $ivf_stimulation_chart_add->ERA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->PGTA->Required) { ?>
				elm = this.getElements("x" + infix + "_PGTA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->PGTA->caption(), $ivf_stimulation_chart_add->PGTA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->PGD->Required) { ?>
				elm = this.getElements("x" + infix + "_PGD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->PGD->caption(), $ivf_stimulation_chart_add->PGD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DATEOFET->Required) { ?>
				elm = this.getElements("x" + infix + "_DATEOFET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DATEOFET->caption(), $ivf_stimulation_chart_add->DATEOFET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ET->Required) { ?>
				elm = this.getElements("x" + infix + "_ET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ET->caption(), $ivf_stimulation_chart_add->ET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ESET->Required) { ?>
				elm = this.getElements("x" + infix + "_ESET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ESET->caption(), $ivf_stimulation_chart_add->ESET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DOET->Required) { ?>
				elm = this.getElements("x" + infix + "_DOET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DOET->caption(), $ivf_stimulation_chart_add->DOET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SEMENPREPARATION->Required) { ?>
				elm = this.getElements("x" + infix + "_SEMENPREPARATION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SEMENPREPARATION->caption(), $ivf_stimulation_chart_add->SEMENPREPARATION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->REASONFORESET->Required) { ?>
				elm = this.getElements("x" + infix + "_REASONFORESET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->REASONFORESET->caption(), $ivf_stimulation_chart_add->REASONFORESET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Expectedoocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_Expectedoocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Expectedoocytes->caption(), $ivf_stimulation_chart_add->Expectedoocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate1->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate1->caption(), $ivf_stimulation_chart_add->StChDate1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate2->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate2->caption(), $ivf_stimulation_chart_add->StChDate2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate3->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate3->caption(), $ivf_stimulation_chart_add->StChDate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate4->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate4->caption(), $ivf_stimulation_chart_add->StChDate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate5->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate5->caption(), $ivf_stimulation_chart_add->StChDate5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate6->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate6->caption(), $ivf_stimulation_chart_add->StChDate6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate7->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate7->caption(), $ivf_stimulation_chart_add->StChDate7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate8->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate8->caption(), $ivf_stimulation_chart_add->StChDate8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate9->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate9->caption(), $ivf_stimulation_chart_add->StChDate9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate10->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate10->caption(), $ivf_stimulation_chart_add->StChDate10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate11->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate11->caption(), $ivf_stimulation_chart_add->StChDate11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate12->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate12->caption(), $ivf_stimulation_chart_add->StChDate12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate13->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate13->caption(), $ivf_stimulation_chart_add->StChDate13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay1->caption(), $ivf_stimulation_chart_add->CycleDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay2->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay2->caption(), $ivf_stimulation_chart_add->CycleDay2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay3->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay3->caption(), $ivf_stimulation_chart_add->CycleDay3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay4->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay4->caption(), $ivf_stimulation_chart_add->CycleDay4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay5->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay5->caption(), $ivf_stimulation_chart_add->CycleDay5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay6->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay6->caption(), $ivf_stimulation_chart_add->CycleDay6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay7->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay7->caption(), $ivf_stimulation_chart_add->CycleDay7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay8->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay8->caption(), $ivf_stimulation_chart_add->CycleDay8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay9->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay9->caption(), $ivf_stimulation_chart_add->CycleDay9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay10->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay10->caption(), $ivf_stimulation_chart_add->CycleDay10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay11->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay11->caption(), $ivf_stimulation_chart_add->CycleDay11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay12->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay12->caption(), $ivf_stimulation_chart_add->CycleDay12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay13->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay13->caption(), $ivf_stimulation_chart_add->CycleDay13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay1->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay1->caption(), $ivf_stimulation_chart_add->StimulationDay1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay2->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay2->caption(), $ivf_stimulation_chart_add->StimulationDay2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay3->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay3->caption(), $ivf_stimulation_chart_add->StimulationDay3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay4->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay4->caption(), $ivf_stimulation_chart_add->StimulationDay4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay5->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay5->caption(), $ivf_stimulation_chart_add->StimulationDay5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay6->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay6->caption(), $ivf_stimulation_chart_add->StimulationDay6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay7->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay7->caption(), $ivf_stimulation_chart_add->StimulationDay7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay8->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay8->caption(), $ivf_stimulation_chart_add->StimulationDay8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay9->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay9->caption(), $ivf_stimulation_chart_add->StimulationDay9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay10->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay10->caption(), $ivf_stimulation_chart_add->StimulationDay10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay11->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay11->caption(), $ivf_stimulation_chart_add->StimulationDay11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay12->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay12->caption(), $ivf_stimulation_chart_add->StimulationDay12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay13->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay13->caption(), $ivf_stimulation_chart_add->StimulationDay13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet1->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet1->caption(), $ivf_stimulation_chart_add->Tablet1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet2->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet2->caption(), $ivf_stimulation_chart_add->Tablet2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet3->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet3->caption(), $ivf_stimulation_chart_add->Tablet3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet4->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet4->caption(), $ivf_stimulation_chart_add->Tablet4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet5->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet5->caption(), $ivf_stimulation_chart_add->Tablet5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet6->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet6->caption(), $ivf_stimulation_chart_add->Tablet6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet7->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet7->caption(), $ivf_stimulation_chart_add->Tablet7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet8->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet8->caption(), $ivf_stimulation_chart_add->Tablet8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet9->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet9->caption(), $ivf_stimulation_chart_add->Tablet9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet10->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet10->caption(), $ivf_stimulation_chart_add->Tablet10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet11->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet11->caption(), $ivf_stimulation_chart_add->Tablet11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet12->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet12->caption(), $ivf_stimulation_chart_add->Tablet12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet13->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet13->caption(), $ivf_stimulation_chart_add->Tablet13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH1->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH1->caption(), $ivf_stimulation_chart_add->RFSH1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH2->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH2->caption(), $ivf_stimulation_chart_add->RFSH2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH3->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH3->caption(), $ivf_stimulation_chart_add->RFSH3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH4->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH4->caption(), $ivf_stimulation_chart_add->RFSH4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH5->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH5->caption(), $ivf_stimulation_chart_add->RFSH5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH6->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH6->caption(), $ivf_stimulation_chart_add->RFSH6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH7->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH7->caption(), $ivf_stimulation_chart_add->RFSH7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH8->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH8->caption(), $ivf_stimulation_chart_add->RFSH8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH9->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH9->caption(), $ivf_stimulation_chart_add->RFSH9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH10->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH10->caption(), $ivf_stimulation_chart_add->RFSH10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH11->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH11->caption(), $ivf_stimulation_chart_add->RFSH11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH12->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH12->caption(), $ivf_stimulation_chart_add->RFSH12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH13->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH13->caption(), $ivf_stimulation_chart_add->RFSH13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG1->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG1->caption(), $ivf_stimulation_chart_add->HMG1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG2->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG2->caption(), $ivf_stimulation_chart_add->HMG2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG3->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG3->caption(), $ivf_stimulation_chart_add->HMG3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG4->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG4->caption(), $ivf_stimulation_chart_add->HMG4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG5->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG5->caption(), $ivf_stimulation_chart_add->HMG5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG6->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG6->caption(), $ivf_stimulation_chart_add->HMG6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG7->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG7->caption(), $ivf_stimulation_chart_add->HMG7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG8->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG8->caption(), $ivf_stimulation_chart_add->HMG8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG9->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG9->caption(), $ivf_stimulation_chart_add->HMG9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG10->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG10->caption(), $ivf_stimulation_chart_add->HMG10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG11->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG11->caption(), $ivf_stimulation_chart_add->HMG11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG12->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG12->caption(), $ivf_stimulation_chart_add->HMG12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG13->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG13->caption(), $ivf_stimulation_chart_add->HMG13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH1->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH1->caption(), $ivf_stimulation_chart_add->GnRH1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH2->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH2->caption(), $ivf_stimulation_chart_add->GnRH2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH3->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH3->caption(), $ivf_stimulation_chart_add->GnRH3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH4->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH4->caption(), $ivf_stimulation_chart_add->GnRH4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH5->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH5->caption(), $ivf_stimulation_chart_add->GnRH5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH6->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH6->caption(), $ivf_stimulation_chart_add->GnRH6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH7->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH7->caption(), $ivf_stimulation_chart_add->GnRH7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH8->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH8->caption(), $ivf_stimulation_chart_add->GnRH8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH9->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH9->caption(), $ivf_stimulation_chart_add->GnRH9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH10->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH10->caption(), $ivf_stimulation_chart_add->GnRH10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH11->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH11->caption(), $ivf_stimulation_chart_add->GnRH11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH12->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH12->caption(), $ivf_stimulation_chart_add->GnRH12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH13->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH13->caption(), $ivf_stimulation_chart_add->GnRH13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E21->Required) { ?>
				elm = this.getElements("x" + infix + "_E21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E21->caption(), $ivf_stimulation_chart_add->E21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E22->Required) { ?>
				elm = this.getElements("x" + infix + "_E22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E22->caption(), $ivf_stimulation_chart_add->E22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E23->Required) { ?>
				elm = this.getElements("x" + infix + "_E23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E23->caption(), $ivf_stimulation_chart_add->E23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E24->Required) { ?>
				elm = this.getElements("x" + infix + "_E24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E24->caption(), $ivf_stimulation_chart_add->E24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E25->Required) { ?>
				elm = this.getElements("x" + infix + "_E25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E25->caption(), $ivf_stimulation_chart_add->E25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E26->Required) { ?>
				elm = this.getElements("x" + infix + "_E26");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E26->caption(), $ivf_stimulation_chart_add->E26->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E27->Required) { ?>
				elm = this.getElements("x" + infix + "_E27");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E27->caption(), $ivf_stimulation_chart_add->E27->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E28->Required) { ?>
				elm = this.getElements("x" + infix + "_E28");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E28->caption(), $ivf_stimulation_chart_add->E28->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E29->Required) { ?>
				elm = this.getElements("x" + infix + "_E29");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E29->caption(), $ivf_stimulation_chart_add->E29->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E210->Required) { ?>
				elm = this.getElements("x" + infix + "_E210");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E210->caption(), $ivf_stimulation_chart_add->E210->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E211->Required) { ?>
				elm = this.getElements("x" + infix + "_E211");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E211->caption(), $ivf_stimulation_chart_add->E211->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E212->Required) { ?>
				elm = this.getElements("x" + infix + "_E212");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E212->caption(), $ivf_stimulation_chart_add->E212->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E213->Required) { ?>
				elm = this.getElements("x" + infix + "_E213");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E213->caption(), $ivf_stimulation_chart_add->E213->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P41->Required) { ?>
				elm = this.getElements("x" + infix + "_P41");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P41->caption(), $ivf_stimulation_chart_add->P41->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P42->Required) { ?>
				elm = this.getElements("x" + infix + "_P42");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P42->caption(), $ivf_stimulation_chart_add->P42->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P43->Required) { ?>
				elm = this.getElements("x" + infix + "_P43");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P43->caption(), $ivf_stimulation_chart_add->P43->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P44->Required) { ?>
				elm = this.getElements("x" + infix + "_P44");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P44->caption(), $ivf_stimulation_chart_add->P44->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P45->Required) { ?>
				elm = this.getElements("x" + infix + "_P45");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P45->caption(), $ivf_stimulation_chart_add->P45->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P46->Required) { ?>
				elm = this.getElements("x" + infix + "_P46");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P46->caption(), $ivf_stimulation_chart_add->P46->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P47->Required) { ?>
				elm = this.getElements("x" + infix + "_P47");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P47->caption(), $ivf_stimulation_chart_add->P47->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P48->Required) { ?>
				elm = this.getElements("x" + infix + "_P48");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P48->caption(), $ivf_stimulation_chart_add->P48->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P49->Required) { ?>
				elm = this.getElements("x" + infix + "_P49");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P49->caption(), $ivf_stimulation_chart_add->P49->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P410->Required) { ?>
				elm = this.getElements("x" + infix + "_P410");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P410->caption(), $ivf_stimulation_chart_add->P410->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P411->Required) { ?>
				elm = this.getElements("x" + infix + "_P411");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P411->caption(), $ivf_stimulation_chart_add->P411->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P412->Required) { ?>
				elm = this.getElements("x" + infix + "_P412");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P412->caption(), $ivf_stimulation_chart_add->P412->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P413->Required) { ?>
				elm = this.getElements("x" + infix + "_P413");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P413->caption(), $ivf_stimulation_chart_add->P413->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt1->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt1->caption(), $ivf_stimulation_chart_add->USGRt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt2->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt2->caption(), $ivf_stimulation_chart_add->USGRt2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt3->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt3->caption(), $ivf_stimulation_chart_add->USGRt3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt4->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt4->caption(), $ivf_stimulation_chart_add->USGRt4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt5->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt5->caption(), $ivf_stimulation_chart_add->USGRt5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt6->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt6->caption(), $ivf_stimulation_chart_add->USGRt6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt7->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt7->caption(), $ivf_stimulation_chart_add->USGRt7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt8->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt8->caption(), $ivf_stimulation_chart_add->USGRt8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt9->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt9->caption(), $ivf_stimulation_chart_add->USGRt9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt10->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt10->caption(), $ivf_stimulation_chart_add->USGRt10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt11->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt11->caption(), $ivf_stimulation_chart_add->USGRt11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt12->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt12->caption(), $ivf_stimulation_chart_add->USGRt12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt13->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt13->caption(), $ivf_stimulation_chart_add->USGRt13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt1->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt1->caption(), $ivf_stimulation_chart_add->USGLt1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt2->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt2->caption(), $ivf_stimulation_chart_add->USGLt2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt3->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt3->caption(), $ivf_stimulation_chart_add->USGLt3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt4->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt4->caption(), $ivf_stimulation_chart_add->USGLt4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt5->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt5->caption(), $ivf_stimulation_chart_add->USGLt5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt6->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt6->caption(), $ivf_stimulation_chart_add->USGLt6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt7->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt7->caption(), $ivf_stimulation_chart_add->USGLt7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt8->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt8->caption(), $ivf_stimulation_chart_add->USGLt8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt9->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt9->caption(), $ivf_stimulation_chart_add->USGLt9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt10->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt10->caption(), $ivf_stimulation_chart_add->USGLt10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt11->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt11->caption(), $ivf_stimulation_chart_add->USGLt11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt12->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt12->caption(), $ivf_stimulation_chart_add->USGLt12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt13->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt13->caption(), $ivf_stimulation_chart_add->USGLt13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM1->Required) { ?>
				elm = this.getElements("x" + infix + "_EM1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM1->caption(), $ivf_stimulation_chart_add->EM1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM2->Required) { ?>
				elm = this.getElements("x" + infix + "_EM2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM2->caption(), $ivf_stimulation_chart_add->EM2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM3->Required) { ?>
				elm = this.getElements("x" + infix + "_EM3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM3->caption(), $ivf_stimulation_chart_add->EM3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM4->Required) { ?>
				elm = this.getElements("x" + infix + "_EM4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM4->caption(), $ivf_stimulation_chart_add->EM4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM5->Required) { ?>
				elm = this.getElements("x" + infix + "_EM5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM5->caption(), $ivf_stimulation_chart_add->EM5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM6->Required) { ?>
				elm = this.getElements("x" + infix + "_EM6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM6->caption(), $ivf_stimulation_chart_add->EM6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM7->Required) { ?>
				elm = this.getElements("x" + infix + "_EM7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM7->caption(), $ivf_stimulation_chart_add->EM7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM8->Required) { ?>
				elm = this.getElements("x" + infix + "_EM8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM8->caption(), $ivf_stimulation_chart_add->EM8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM9->Required) { ?>
				elm = this.getElements("x" + infix + "_EM9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM9->caption(), $ivf_stimulation_chart_add->EM9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM10->Required) { ?>
				elm = this.getElements("x" + infix + "_EM10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM10->caption(), $ivf_stimulation_chart_add->EM10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM11->Required) { ?>
				elm = this.getElements("x" + infix + "_EM11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM11->caption(), $ivf_stimulation_chart_add->EM11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM12->Required) { ?>
				elm = this.getElements("x" + infix + "_EM12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM12->caption(), $ivf_stimulation_chart_add->EM12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM13->Required) { ?>
				elm = this.getElements("x" + infix + "_EM13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM13->caption(), $ivf_stimulation_chart_add->EM13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others1->Required) { ?>
				elm = this.getElements("x" + infix + "_Others1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others1->caption(), $ivf_stimulation_chart_add->Others1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others2->Required) { ?>
				elm = this.getElements("x" + infix + "_Others2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others2->caption(), $ivf_stimulation_chart_add->Others2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others3->Required) { ?>
				elm = this.getElements("x" + infix + "_Others3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others3->caption(), $ivf_stimulation_chart_add->Others3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others4->Required) { ?>
				elm = this.getElements("x" + infix + "_Others4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others4->caption(), $ivf_stimulation_chart_add->Others4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others5->Required) { ?>
				elm = this.getElements("x" + infix + "_Others5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others5->caption(), $ivf_stimulation_chart_add->Others5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others6->Required) { ?>
				elm = this.getElements("x" + infix + "_Others6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others6->caption(), $ivf_stimulation_chart_add->Others6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others7->Required) { ?>
				elm = this.getElements("x" + infix + "_Others7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others7->caption(), $ivf_stimulation_chart_add->Others7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others8->Required) { ?>
				elm = this.getElements("x" + infix + "_Others8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others8->caption(), $ivf_stimulation_chart_add->Others8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others9->Required) { ?>
				elm = this.getElements("x" + infix + "_Others9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others9->caption(), $ivf_stimulation_chart_add->Others9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others10->Required) { ?>
				elm = this.getElements("x" + infix + "_Others10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others10->caption(), $ivf_stimulation_chart_add->Others10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others11->Required) { ?>
				elm = this.getElements("x" + infix + "_Others11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others11->caption(), $ivf_stimulation_chart_add->Others11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others12->Required) { ?>
				elm = this.getElements("x" + infix + "_Others12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others12->caption(), $ivf_stimulation_chart_add->Others12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others13->Required) { ?>
				elm = this.getElements("x" + infix + "_Others13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others13->caption(), $ivf_stimulation_chart_add->Others13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR1->Required) { ?>
				elm = this.getElements("x" + infix + "_DR1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR1->caption(), $ivf_stimulation_chart_add->DR1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR2->Required) { ?>
				elm = this.getElements("x" + infix + "_DR2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR2->caption(), $ivf_stimulation_chart_add->DR2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR3->Required) { ?>
				elm = this.getElements("x" + infix + "_DR3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR3->caption(), $ivf_stimulation_chart_add->DR3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR4->Required) { ?>
				elm = this.getElements("x" + infix + "_DR4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR4->caption(), $ivf_stimulation_chart_add->DR4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR5->Required) { ?>
				elm = this.getElements("x" + infix + "_DR5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR5->caption(), $ivf_stimulation_chart_add->DR5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR6->Required) { ?>
				elm = this.getElements("x" + infix + "_DR6");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR6->caption(), $ivf_stimulation_chart_add->DR6->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR7->Required) { ?>
				elm = this.getElements("x" + infix + "_DR7");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR7->caption(), $ivf_stimulation_chart_add->DR7->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR8->Required) { ?>
				elm = this.getElements("x" + infix + "_DR8");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR8->caption(), $ivf_stimulation_chart_add->DR8->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR9->Required) { ?>
				elm = this.getElements("x" + infix + "_DR9");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR9->caption(), $ivf_stimulation_chart_add->DR9->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR10->Required) { ?>
				elm = this.getElements("x" + infix + "_DR10");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR10->caption(), $ivf_stimulation_chart_add->DR10->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR11->Required) { ?>
				elm = this.getElements("x" + infix + "_DR11");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR11->caption(), $ivf_stimulation_chart_add->DR11->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR12->Required) { ?>
				elm = this.getElements("x" + infix + "_DR12");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR12->caption(), $ivf_stimulation_chart_add->DR12->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR13->Required) { ?>
				elm = this.getElements("x" + infix + "_DR13");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR13->caption(), $ivf_stimulation_chart_add->DR13->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DOCTORRESPONSIBLE->Required) { ?>
				elm = this.getElements("x" + infix + "_DOCTORRESPONSIBLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->caption(), $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TidNo->caption(), $ivf_stimulation_chart_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->Convert->Required) { ?>
				elm = this.getElements("x" + infix + "_Convert[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Convert->caption(), $ivf_stimulation_chart_add->Convert->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Consultant->caption(), $ivf_stimulation_chart_add->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->InseminatinTechnique->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminatinTechnique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->InseminatinTechnique->caption(), $ivf_stimulation_chart_add->InseminatinTechnique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->IndicationForART->Required) { ?>
				elm = this.getElements("x" + infix + "_IndicationForART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->IndicationForART->caption(), $ivf_stimulation_chart_add->IndicationForART->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Hysteroscopy->Required) { ?>
				elm = this.getElements("x" + infix + "_Hysteroscopy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Hysteroscopy->caption(), $ivf_stimulation_chart_add->Hysteroscopy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EndometrialScratching->Required) { ?>
				elm = this.getElements("x" + infix + "_EndometrialScratching");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EndometrialScratching->caption(), $ivf_stimulation_chart_add->EndometrialScratching->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TrialCannulation->Required) { ?>
				elm = this.getElements("x" + infix + "_TrialCannulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TrialCannulation->caption(), $ivf_stimulation_chart_add->TrialCannulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CYCLETYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CYCLETYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CYCLETYPE->caption(), $ivf_stimulation_chart_add->CYCLETYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HRTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_HRTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HRTCYCLE->caption(), $ivf_stimulation_chart_add->HRTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->OralEstrogenDosage->Required) { ?>
				elm = this.getElements("x" + infix + "_OralEstrogenDosage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->OralEstrogenDosage->caption(), $ivf_stimulation_chart_add->OralEstrogenDosage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->VaginalEstrogen->Required) { ?>
				elm = this.getElements("x" + infix + "_VaginalEstrogen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->VaginalEstrogen->caption(), $ivf_stimulation_chart_add->VaginalEstrogen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GCSF->Required) { ?>
				elm = this.getElements("x" + infix + "_GCSF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GCSF->caption(), $ivf_stimulation_chart_add->GCSF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ActivatedPRP->Required) { ?>
				elm = this.getElements("x" + infix + "_ActivatedPRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ActivatedPRP->caption(), $ivf_stimulation_chart_add->ActivatedPRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->UCLcm->Required) { ?>
				elm = this.getElements("x" + infix + "_UCLcm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->UCLcm->caption(), $ivf_stimulation_chart_add->UCLcm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DATOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->caption(), $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->caption(), $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTHAWED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->caption(), $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTRANSFERRED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->caption(), $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DAYOFEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DAYOFEMBRYOS->caption(), $ivf_stimulation_chart_add->DAYOFEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_CRYOPRESERVEDEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->caption(), $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ViaAdmin->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaAdmin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ViaAdmin->caption(), $ivf_stimulation_chart_add->ViaAdmin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ViaStartDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaStartDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ViaStartDateTime->caption(), $ivf_stimulation_chart_add->ViaStartDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ViaStartDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->ViaStartDateTime->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->ViaDose->Required) { ?>
				elm = this.getElements("x" + infix + "_ViaDose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ViaDose->caption(), $ivf_stimulation_chart_add->ViaDose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->AllFreeze->Required) { ?>
				elm = this.getElements("x" + infix + "_AllFreeze");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->AllFreeze->caption(), $ivf_stimulation_chart_add->AllFreeze->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TreatmentCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TreatmentCancel->caption(), $ivf_stimulation_chart_add->TreatmentCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Reason->Required) { ?>
				elm = this.getElements("x" + infix + "_Reason");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Reason->caption(), $ivf_stimulation_chart_add->Reason->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ProgesteroneAdmin->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneAdmin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ProgesteroneAdmin->caption(), $ivf_stimulation_chart_add->ProgesteroneAdmin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ProgesteroneStart->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneStart");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ProgesteroneStart->caption(), $ivf_stimulation_chart_add->ProgesteroneStart->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ProgesteroneDose->Required) { ?>
				elm = this.getElements("x" + infix + "_ProgesteroneDose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ProgesteroneDose->caption(), $ivf_stimulation_chart_add->ProgesteroneDose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Projectron->Required) { ?>
				elm = this.getElements("x" + infix + "_Projectron");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Projectron->caption(), $ivf_stimulation_chart_add->Projectron->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StChDate14->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate14->caption(), $ivf_stimulation_chart_add->StChDate14->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate14");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate14->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate15->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate15->caption(), $ivf_stimulation_chart_add->StChDate15->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate15");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate15->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate16->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate16->caption(), $ivf_stimulation_chart_add->StChDate16->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate16");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate16->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate17->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate17->caption(), $ivf_stimulation_chart_add->StChDate17->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate17");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate17->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate18->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate18->caption(), $ivf_stimulation_chart_add->StChDate18->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate18");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate18->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate19->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate19->caption(), $ivf_stimulation_chart_add->StChDate19->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate19");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate19->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate20->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate20->caption(), $ivf_stimulation_chart_add->StChDate20->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate20");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate20->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate21->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate21->caption(), $ivf_stimulation_chart_add->StChDate21->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate21");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate21->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate22->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate22->caption(), $ivf_stimulation_chart_add->StChDate22->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate22");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate22->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate23->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate23->caption(), $ivf_stimulation_chart_add->StChDate23->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate23");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate23->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate24->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate24->caption(), $ivf_stimulation_chart_add->StChDate24->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate24");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate24->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->StChDate25->Required) { ?>
				elm = this.getElements("x" + infix + "_StChDate25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StChDate25->caption(), $ivf_stimulation_chart_add->StChDate25->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_StChDate25");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->StChDate25->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->CycleDay14->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay14->caption(), $ivf_stimulation_chart_add->CycleDay14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay15->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay15->caption(), $ivf_stimulation_chart_add->CycleDay15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay16->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay16->caption(), $ivf_stimulation_chart_add->CycleDay16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay17->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay17->caption(), $ivf_stimulation_chart_add->CycleDay17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay18->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay18->caption(), $ivf_stimulation_chart_add->CycleDay18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay19->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay19->caption(), $ivf_stimulation_chart_add->CycleDay19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay20->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay20->caption(), $ivf_stimulation_chart_add->CycleDay20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay21->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay21->caption(), $ivf_stimulation_chart_add->CycleDay21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay22->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay22->caption(), $ivf_stimulation_chart_add->CycleDay22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay23->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay23->caption(), $ivf_stimulation_chart_add->CycleDay23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay24->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay24->caption(), $ivf_stimulation_chart_add->CycleDay24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->CycleDay25->Required) { ?>
				elm = this.getElements("x" + infix + "_CycleDay25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->CycleDay25->caption(), $ivf_stimulation_chart_add->CycleDay25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay14->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay14->caption(), $ivf_stimulation_chart_add->StimulationDay14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay15->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay15->caption(), $ivf_stimulation_chart_add->StimulationDay15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay16->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay16->caption(), $ivf_stimulation_chart_add->StimulationDay16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay17->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay17->caption(), $ivf_stimulation_chart_add->StimulationDay17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay18->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay18->caption(), $ivf_stimulation_chart_add->StimulationDay18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay19->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay19->caption(), $ivf_stimulation_chart_add->StimulationDay19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay20->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay20->caption(), $ivf_stimulation_chart_add->StimulationDay20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay21->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay21->caption(), $ivf_stimulation_chart_add->StimulationDay21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay22->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay22->caption(), $ivf_stimulation_chart_add->StimulationDay22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay23->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay23->caption(), $ivf_stimulation_chart_add->StimulationDay23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay24->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay24->caption(), $ivf_stimulation_chart_add->StimulationDay24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->StimulationDay25->Required) { ?>
				elm = this.getElements("x" + infix + "_StimulationDay25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->StimulationDay25->caption(), $ivf_stimulation_chart_add->StimulationDay25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet14->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet14->caption(), $ivf_stimulation_chart_add->Tablet14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet15->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet15->caption(), $ivf_stimulation_chart_add->Tablet15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet16->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet16->caption(), $ivf_stimulation_chart_add->Tablet16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet17->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet17->caption(), $ivf_stimulation_chart_add->Tablet17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet18->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet18->caption(), $ivf_stimulation_chart_add->Tablet18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet19->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet19->caption(), $ivf_stimulation_chart_add->Tablet19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet20->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet20->caption(), $ivf_stimulation_chart_add->Tablet20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet21->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet21->caption(), $ivf_stimulation_chart_add->Tablet21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet22->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet22->caption(), $ivf_stimulation_chart_add->Tablet22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet23->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet23->caption(), $ivf_stimulation_chart_add->Tablet23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet24->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet24->caption(), $ivf_stimulation_chart_add->Tablet24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Tablet25->Required) { ?>
				elm = this.getElements("x" + infix + "_Tablet25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Tablet25->caption(), $ivf_stimulation_chart_add->Tablet25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH14->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH14->caption(), $ivf_stimulation_chart_add->RFSH14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH15->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH15->caption(), $ivf_stimulation_chart_add->RFSH15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH16->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH16->caption(), $ivf_stimulation_chart_add->RFSH16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH17->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH17->caption(), $ivf_stimulation_chart_add->RFSH17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH18->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH18->caption(), $ivf_stimulation_chart_add->RFSH18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH19->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH19->caption(), $ivf_stimulation_chart_add->RFSH19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH20->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH20->caption(), $ivf_stimulation_chart_add->RFSH20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH21->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH21->caption(), $ivf_stimulation_chart_add->RFSH21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH22->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH22->caption(), $ivf_stimulation_chart_add->RFSH22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH23->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH23->caption(), $ivf_stimulation_chart_add->RFSH23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH24->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH24->caption(), $ivf_stimulation_chart_add->RFSH24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->RFSH25->Required) { ?>
				elm = this.getElements("x" + infix + "_RFSH25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->RFSH25->caption(), $ivf_stimulation_chart_add->RFSH25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG14->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG14->caption(), $ivf_stimulation_chart_add->HMG14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG15->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG15->caption(), $ivf_stimulation_chart_add->HMG15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG16->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG16->caption(), $ivf_stimulation_chart_add->HMG16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG17->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG17->caption(), $ivf_stimulation_chart_add->HMG17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG18->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG18->caption(), $ivf_stimulation_chart_add->HMG18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG19->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG19->caption(), $ivf_stimulation_chart_add->HMG19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG20->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG20->caption(), $ivf_stimulation_chart_add->HMG20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG21->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG21->caption(), $ivf_stimulation_chart_add->HMG21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG22->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG22->caption(), $ivf_stimulation_chart_add->HMG22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG23->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG23->caption(), $ivf_stimulation_chart_add->HMG23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG24->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG24->caption(), $ivf_stimulation_chart_add->HMG24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HMG25->Required) { ?>
				elm = this.getElements("x" + infix + "_HMG25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HMG25->caption(), $ivf_stimulation_chart_add->HMG25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH14->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH14->caption(), $ivf_stimulation_chart_add->GnRH14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH15->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH15->caption(), $ivf_stimulation_chart_add->GnRH15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH16->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH16->caption(), $ivf_stimulation_chart_add->GnRH16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH17->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH17->caption(), $ivf_stimulation_chart_add->GnRH17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH18->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH18->caption(), $ivf_stimulation_chart_add->GnRH18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH19->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH19->caption(), $ivf_stimulation_chart_add->GnRH19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH20->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH20->caption(), $ivf_stimulation_chart_add->GnRH20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH21->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH21->caption(), $ivf_stimulation_chart_add->GnRH21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH22->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH22->caption(), $ivf_stimulation_chart_add->GnRH22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH23->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH23->caption(), $ivf_stimulation_chart_add->GnRH23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH24->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH24->caption(), $ivf_stimulation_chart_add->GnRH24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->GnRH25->Required) { ?>
				elm = this.getElements("x" + infix + "_GnRH25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->GnRH25->caption(), $ivf_stimulation_chart_add->GnRH25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P414->Required) { ?>
				elm = this.getElements("x" + infix + "_P414");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P414->caption(), $ivf_stimulation_chart_add->P414->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P415->Required) { ?>
				elm = this.getElements("x" + infix + "_P415");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P415->caption(), $ivf_stimulation_chart_add->P415->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P416->Required) { ?>
				elm = this.getElements("x" + infix + "_P416");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P416->caption(), $ivf_stimulation_chart_add->P416->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P417->Required) { ?>
				elm = this.getElements("x" + infix + "_P417");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P417->caption(), $ivf_stimulation_chart_add->P417->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P418->Required) { ?>
				elm = this.getElements("x" + infix + "_P418");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P418->caption(), $ivf_stimulation_chart_add->P418->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P419->Required) { ?>
				elm = this.getElements("x" + infix + "_P419");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P419->caption(), $ivf_stimulation_chart_add->P419->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P420->Required) { ?>
				elm = this.getElements("x" + infix + "_P420");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P420->caption(), $ivf_stimulation_chart_add->P420->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P421->Required) { ?>
				elm = this.getElements("x" + infix + "_P421");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P421->caption(), $ivf_stimulation_chart_add->P421->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P422->Required) { ?>
				elm = this.getElements("x" + infix + "_P422");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P422->caption(), $ivf_stimulation_chart_add->P422->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P423->Required) { ?>
				elm = this.getElements("x" + infix + "_P423");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P423->caption(), $ivf_stimulation_chart_add->P423->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P424->Required) { ?>
				elm = this.getElements("x" + infix + "_P424");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P424->caption(), $ivf_stimulation_chart_add->P424->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->P425->Required) { ?>
				elm = this.getElements("x" + infix + "_P425");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->P425->caption(), $ivf_stimulation_chart_add->P425->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt14->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt14->caption(), $ivf_stimulation_chart_add->USGRt14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt15->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt15->caption(), $ivf_stimulation_chart_add->USGRt15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt16->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt16->caption(), $ivf_stimulation_chart_add->USGRt16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt17->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt17->caption(), $ivf_stimulation_chart_add->USGRt17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt18->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt18->caption(), $ivf_stimulation_chart_add->USGRt18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt19->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt19->caption(), $ivf_stimulation_chart_add->USGRt19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt20->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt20->caption(), $ivf_stimulation_chart_add->USGRt20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt21->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt21->caption(), $ivf_stimulation_chart_add->USGRt21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt22->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt22->caption(), $ivf_stimulation_chart_add->USGRt22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt23->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt23->caption(), $ivf_stimulation_chart_add->USGRt23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt24->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt24->caption(), $ivf_stimulation_chart_add->USGRt24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGRt25->Required) { ?>
				elm = this.getElements("x" + infix + "_USGRt25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGRt25->caption(), $ivf_stimulation_chart_add->USGRt25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt14->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt14->caption(), $ivf_stimulation_chart_add->USGLt14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt15->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt15->caption(), $ivf_stimulation_chart_add->USGLt15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt16->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt16->caption(), $ivf_stimulation_chart_add->USGLt16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt17->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt17->caption(), $ivf_stimulation_chart_add->USGLt17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt18->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt18->caption(), $ivf_stimulation_chart_add->USGLt18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt19->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt19->caption(), $ivf_stimulation_chart_add->USGLt19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt20->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt20->caption(), $ivf_stimulation_chart_add->USGLt20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt21->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt21->caption(), $ivf_stimulation_chart_add->USGLt21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt22->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt22->caption(), $ivf_stimulation_chart_add->USGLt22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt23->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt23->caption(), $ivf_stimulation_chart_add->USGLt23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt24->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt24->caption(), $ivf_stimulation_chart_add->USGLt24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->USGLt25->Required) { ?>
				elm = this.getElements("x" + infix + "_USGLt25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->USGLt25->caption(), $ivf_stimulation_chart_add->USGLt25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM14->Required) { ?>
				elm = this.getElements("x" + infix + "_EM14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM14->caption(), $ivf_stimulation_chart_add->EM14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM15->Required) { ?>
				elm = this.getElements("x" + infix + "_EM15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM15->caption(), $ivf_stimulation_chart_add->EM15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM16->Required) { ?>
				elm = this.getElements("x" + infix + "_EM16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM16->caption(), $ivf_stimulation_chart_add->EM16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM17->Required) { ?>
				elm = this.getElements("x" + infix + "_EM17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM17->caption(), $ivf_stimulation_chart_add->EM17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM18->Required) { ?>
				elm = this.getElements("x" + infix + "_EM18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM18->caption(), $ivf_stimulation_chart_add->EM18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM19->Required) { ?>
				elm = this.getElements("x" + infix + "_EM19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM19->caption(), $ivf_stimulation_chart_add->EM19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM20->Required) { ?>
				elm = this.getElements("x" + infix + "_EM20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM20->caption(), $ivf_stimulation_chart_add->EM20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM21->Required) { ?>
				elm = this.getElements("x" + infix + "_EM21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM21->caption(), $ivf_stimulation_chart_add->EM21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM22->Required) { ?>
				elm = this.getElements("x" + infix + "_EM22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM22->caption(), $ivf_stimulation_chart_add->EM22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM23->Required) { ?>
				elm = this.getElements("x" + infix + "_EM23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM23->caption(), $ivf_stimulation_chart_add->EM23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM24->Required) { ?>
				elm = this.getElements("x" + infix + "_EM24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM24->caption(), $ivf_stimulation_chart_add->EM24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EM25->Required) { ?>
				elm = this.getElements("x" + infix + "_EM25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EM25->caption(), $ivf_stimulation_chart_add->EM25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others14->Required) { ?>
				elm = this.getElements("x" + infix + "_Others14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others14->caption(), $ivf_stimulation_chart_add->Others14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others15->Required) { ?>
				elm = this.getElements("x" + infix + "_Others15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others15->caption(), $ivf_stimulation_chart_add->Others15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others16->Required) { ?>
				elm = this.getElements("x" + infix + "_Others16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others16->caption(), $ivf_stimulation_chart_add->Others16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others17->Required) { ?>
				elm = this.getElements("x" + infix + "_Others17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others17->caption(), $ivf_stimulation_chart_add->Others17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others18->Required) { ?>
				elm = this.getElements("x" + infix + "_Others18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others18->caption(), $ivf_stimulation_chart_add->Others18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others19->Required) { ?>
				elm = this.getElements("x" + infix + "_Others19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others19->caption(), $ivf_stimulation_chart_add->Others19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others20->Required) { ?>
				elm = this.getElements("x" + infix + "_Others20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others20->caption(), $ivf_stimulation_chart_add->Others20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others21->Required) { ?>
				elm = this.getElements("x" + infix + "_Others21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others21->caption(), $ivf_stimulation_chart_add->Others21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others22->Required) { ?>
				elm = this.getElements("x" + infix + "_Others22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others22->caption(), $ivf_stimulation_chart_add->Others22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others23->Required) { ?>
				elm = this.getElements("x" + infix + "_Others23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others23->caption(), $ivf_stimulation_chart_add->Others23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others24->Required) { ?>
				elm = this.getElements("x" + infix + "_Others24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others24->caption(), $ivf_stimulation_chart_add->Others24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->Others25->Required) { ?>
				elm = this.getElements("x" + infix + "_Others25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->Others25->caption(), $ivf_stimulation_chart_add->Others25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR14->Required) { ?>
				elm = this.getElements("x" + infix + "_DR14");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR14->caption(), $ivf_stimulation_chart_add->DR14->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR15->Required) { ?>
				elm = this.getElements("x" + infix + "_DR15");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR15->caption(), $ivf_stimulation_chart_add->DR15->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR16->Required) { ?>
				elm = this.getElements("x" + infix + "_DR16");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR16->caption(), $ivf_stimulation_chart_add->DR16->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR17->Required) { ?>
				elm = this.getElements("x" + infix + "_DR17");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR17->caption(), $ivf_stimulation_chart_add->DR17->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR18->Required) { ?>
				elm = this.getElements("x" + infix + "_DR18");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR18->caption(), $ivf_stimulation_chart_add->DR18->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR19->Required) { ?>
				elm = this.getElements("x" + infix + "_DR19");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR19->caption(), $ivf_stimulation_chart_add->DR19->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR20->Required) { ?>
				elm = this.getElements("x" + infix + "_DR20");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR20->caption(), $ivf_stimulation_chart_add->DR20->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR21->Required) { ?>
				elm = this.getElements("x" + infix + "_DR21");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR21->caption(), $ivf_stimulation_chart_add->DR21->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR22->Required) { ?>
				elm = this.getElements("x" + infix + "_DR22");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR22->caption(), $ivf_stimulation_chart_add->DR22->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR23->Required) { ?>
				elm = this.getElements("x" + infix + "_DR23");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR23->caption(), $ivf_stimulation_chart_add->DR23->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR24->Required) { ?>
				elm = this.getElements("x" + infix + "_DR24");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR24->caption(), $ivf_stimulation_chart_add->DR24->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DR25->Required) { ?>
				elm = this.getElements("x" + infix + "_DR25");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DR25->caption(), $ivf_stimulation_chart_add->DR25->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E214->Required) { ?>
				elm = this.getElements("x" + infix + "_E214");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E214->caption(), $ivf_stimulation_chart_add->E214->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E215->Required) { ?>
				elm = this.getElements("x" + infix + "_E215");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E215->caption(), $ivf_stimulation_chart_add->E215->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E216->Required) { ?>
				elm = this.getElements("x" + infix + "_E216");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E216->caption(), $ivf_stimulation_chart_add->E216->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E217->Required) { ?>
				elm = this.getElements("x" + infix + "_E217");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E217->caption(), $ivf_stimulation_chart_add->E217->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E218->Required) { ?>
				elm = this.getElements("x" + infix + "_E218");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E218->caption(), $ivf_stimulation_chart_add->E218->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E219->Required) { ?>
				elm = this.getElements("x" + infix + "_E219");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E219->caption(), $ivf_stimulation_chart_add->E219->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E220->Required) { ?>
				elm = this.getElements("x" + infix + "_E220");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E220->caption(), $ivf_stimulation_chart_add->E220->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E221->Required) { ?>
				elm = this.getElements("x" + infix + "_E221");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E221->caption(), $ivf_stimulation_chart_add->E221->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E222->Required) { ?>
				elm = this.getElements("x" + infix + "_E222");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E222->caption(), $ivf_stimulation_chart_add->E222->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E223->Required) { ?>
				elm = this.getElements("x" + infix + "_E223");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E223->caption(), $ivf_stimulation_chart_add->E223->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E224->Required) { ?>
				elm = this.getElements("x" + infix + "_E224");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E224->caption(), $ivf_stimulation_chart_add->E224->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->E225->Required) { ?>
				elm = this.getElements("x" + infix + "_E225");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->E225->caption(), $ivf_stimulation_chart_add->E225->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EEETTTDTE->Required) { ?>
				elm = this.getElements("x" + infix + "_EEETTTDTE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EEETTTDTE->caption(), $ivf_stimulation_chart_add->EEETTTDTE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EEETTTDTE");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->EEETTTDTE->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->bhcgdate->Required) { ?>
				elm = this.getElements("x" + infix + "_bhcgdate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->bhcgdate->caption(), $ivf_stimulation_chart_add->bhcgdate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_bhcgdate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->bhcgdate->errorMessage()) ?>");
			<?php if ($ivf_stimulation_chart_add->TUBAL_PATENCY->Required) { ?>
				elm = this.getElements("x" + infix + "_TUBAL_PATENCY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TUBAL_PATENCY->caption(), $ivf_stimulation_chart_add->TUBAL_PATENCY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->HSG->Required) { ?>
				elm = this.getElements("x" + infix + "_HSG");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->HSG->caption(), $ivf_stimulation_chart_add->HSG->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->DHL->Required) { ?>
				elm = this.getElements("x" + infix + "_DHL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->DHL->caption(), $ivf_stimulation_chart_add->DHL->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->UTERINE_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_UTERINE_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->UTERINE_PROBLEMS->caption(), $ivf_stimulation_chart_add->UTERINE_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->W_COMORBIDS->Required) { ?>
				elm = this.getElements("x" + infix + "_W_COMORBIDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->W_COMORBIDS->caption(), $ivf_stimulation_chart_add->W_COMORBIDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->H_COMORBIDS->Required) { ?>
				elm = this.getElements("x" + infix + "_H_COMORBIDS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->H_COMORBIDS->caption(), $ivf_stimulation_chart_add->H_COMORBIDS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->Required) { ?>
				elm = this.getElements("x" + infix + "_SEXUAL_DYSFUNCTION");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->caption(), $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->TABLETS->Required) { ?>
				elm = this.getElements("x" + infix + "_TABLETS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->TABLETS->caption(), $ivf_stimulation_chart_add->TABLETS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->FOLLICLE_STATUS->Required) { ?>
				elm = this.getElements("x" + infix + "_FOLLICLE_STATUS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->FOLLICLE_STATUS->caption(), $ivf_stimulation_chart_add->FOLLICLE_STATUS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->NUMBER_OF_IUI->Required) { ?>
				elm = this.getElements("x" + infix + "_NUMBER_OF_IUI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->NUMBER_OF_IUI->caption(), $ivf_stimulation_chart_add->NUMBER_OF_IUI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->PROCEDURE->Required) { ?>
				elm = this.getElements("x" + infix + "_PROCEDURE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->PROCEDURE->caption(), $ivf_stimulation_chart_add->PROCEDURE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->LUTEAL_SUPPORT->Required) { ?>
				elm = this.getElements("x" + infix + "_LUTEAL_SUPPORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->LUTEAL_SUPPORT->caption(), $ivf_stimulation_chart_add->LUTEAL_SUPPORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->Required) { ?>
				elm = this.getElements("x" + infix + "_SPECIFIC_MATERNAL_PROBLEMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->caption(), $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->ONGOING_PREG->Required) { ?>
				elm = this.getElements("x" + infix + "_ONGOING_PREG");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->ONGOING_PREG->caption(), $ivf_stimulation_chart_add->ONGOING_PREG->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_stimulation_chart_add->EDD_Date->Required) { ?>
				elm = this.getElements("x" + infix + "_EDD_Date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_chart_add->EDD_Date->caption(), $ivf_stimulation_chart_add->EDD_Date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EDD_Date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_stimulation_chart_add->EDD_Date->errorMessage()) ?>");

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
	fivf_stimulation_chartadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_stimulation_chartadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_stimulation_chartadd.lists["x_ARTCycle"] = <?php echo $ivf_stimulation_chart_add->ARTCycle->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ARTCycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_FemaleFactor"] = <?php echo $ivf_stimulation_chart_add->FemaleFactor->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_FemaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->FemaleFactor->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_MaleFactor"] = <?php echo $ivf_stimulation_chart_add->MaleFactor->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_MaleFactor"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->MaleFactor->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_Protocol"] = <?php echo $ivf_stimulation_chart_add->Protocol->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Protocol->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_SemenFrozen"] = <?php echo $ivf_stimulation_chart_add->SemenFrozen->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_SemenFrozen"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->SemenFrozen->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_A4ICSICycle"] = <?php echo $ivf_stimulation_chart_add->A4ICSICycle->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_A4ICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->A4ICSICycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_TotalICSICycle"] = <?php echo $ivf_stimulation_chart_add->TotalICSICycle->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TotalICSICycle"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TotalICSICycle->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_TypeOfInfertility"] = <?php echo $ivf_stimulation_chart_add->TypeOfInfertility->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TypeOfInfertility"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TypeOfInfertility->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_INJTYPE"] = <?php echo $ivf_stimulation_chart_add->INJTYPE->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_INJTYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->INJTYPE->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_ANTAGONISTSTARTDAY"] = <?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ANTAGONISTSTARTDAY"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_PRETREATMENT"] = <?php echo $ivf_stimulation_chart_add->PRETREATMENT->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_PRETREATMENT"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->PRETREATMENT->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_MedicalFactors"] = <?php echo $ivf_stimulation_chart_add->MedicalFactors->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_MedicalFactors"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->MedicalFactors->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_TRIGGERR"] = <?php echo $ivf_stimulation_chart_add->TRIGGERR->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TRIGGERR"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TRIGGERR->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_ALLFREEZEINDICATION"] = <?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ALLFREEZEINDICATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ALLFREEZEINDICATION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_ERA"] = <?php echo $ivf_stimulation_chart_add->ERA->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ERA"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ERA->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_ET"] = <?php echo $ivf_stimulation_chart_add->ET->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ET"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ET->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_SEMENPREPARATION"] = <?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_SEMENPREPARATION"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->SEMENPREPARATION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_REASONFORESET"] = <?php echo $ivf_stimulation_chart_add->REASONFORESET->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_REASONFORESET"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->REASONFORESET->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet1"] = <?php echo $ivf_stimulation_chart_add->Tablet1->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet1"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet1->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet2"] = <?php echo $ivf_stimulation_chart_add->Tablet2->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet2"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet2->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet3"] = <?php echo $ivf_stimulation_chart_add->Tablet3->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet3"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet3->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet4"] = <?php echo $ivf_stimulation_chart_add->Tablet4->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet4"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet4->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet5"] = <?php echo $ivf_stimulation_chart_add->Tablet5->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet5"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet5->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet6"] = <?php echo $ivf_stimulation_chart_add->Tablet6->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet6"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet6->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet7"] = <?php echo $ivf_stimulation_chart_add->Tablet7->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet7"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet7->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet8"] = <?php echo $ivf_stimulation_chart_add->Tablet8->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet8"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet8->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet9"] = <?php echo $ivf_stimulation_chart_add->Tablet9->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet9"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet9->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet10"] = <?php echo $ivf_stimulation_chart_add->Tablet10->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet10"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet10->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet11"] = <?php echo $ivf_stimulation_chart_add->Tablet11->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet11"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet11->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet12"] = <?php echo $ivf_stimulation_chart_add->Tablet12->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet12"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet12->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet13"] = <?php echo $ivf_stimulation_chart_add->Tablet13->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet13"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet13->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH1"] = <?php echo $ivf_stimulation_chart_add->RFSH1->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH1->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH2"] = <?php echo $ivf_stimulation_chart_add->RFSH2->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH2->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH3"] = <?php echo $ivf_stimulation_chart_add->RFSH3->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH3->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH4"] = <?php echo $ivf_stimulation_chart_add->RFSH4->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH4->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH5"] = <?php echo $ivf_stimulation_chart_add->RFSH5->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH5->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH6"] = <?php echo $ivf_stimulation_chart_add->RFSH6->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH6->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH7"] = <?php echo $ivf_stimulation_chart_add->RFSH7->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH7->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH8"] = <?php echo $ivf_stimulation_chart_add->RFSH8->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH8->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH9"] = <?php echo $ivf_stimulation_chart_add->RFSH9->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH9->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH10"] = <?php echo $ivf_stimulation_chart_add->RFSH10->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH10->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH11"] = <?php echo $ivf_stimulation_chart_add->RFSH11->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH11->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH12"] = <?php echo $ivf_stimulation_chart_add->RFSH12->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH12->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH13"] = <?php echo $ivf_stimulation_chart_add->RFSH13->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH13->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG1"] = <?php echo $ivf_stimulation_chart_add->HMG1->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG1"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG1->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG2"] = <?php echo $ivf_stimulation_chart_add->HMG2->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG2"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG2->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG3"] = <?php echo $ivf_stimulation_chart_add->HMG3->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG3"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG3->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG4"] = <?php echo $ivf_stimulation_chart_add->HMG4->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG4"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG4->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG5"] = <?php echo $ivf_stimulation_chart_add->HMG5->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG5"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG5->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG6"] = <?php echo $ivf_stimulation_chart_add->HMG6->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG6"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG6->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG7"] = <?php echo $ivf_stimulation_chart_add->HMG7->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG7"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG7->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG8"] = <?php echo $ivf_stimulation_chart_add->HMG8->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG8"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG8->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG9"] = <?php echo $ivf_stimulation_chart_add->HMG9->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG9"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG9->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG10"] = <?php echo $ivf_stimulation_chart_add->HMG10->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG10"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG10->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG11"] = <?php echo $ivf_stimulation_chart_add->HMG11->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG11"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG11->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG12"] = <?php echo $ivf_stimulation_chart_add->HMG12->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG12"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG12->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG13"] = <?php echo $ivf_stimulation_chart_add->HMG13->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG13"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG13->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH1"] = <?php echo $ivf_stimulation_chart_add->GnRH1->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH1"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH1->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH2"] = <?php echo $ivf_stimulation_chart_add->GnRH2->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH2"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH2->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH3"] = <?php echo $ivf_stimulation_chart_add->GnRH3->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH3"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH3->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH4"] = <?php echo $ivf_stimulation_chart_add->GnRH4->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH4"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH4->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH5"] = <?php echo $ivf_stimulation_chart_add->GnRH5->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH5"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH5->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH6"] = <?php echo $ivf_stimulation_chart_add->GnRH6->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH6"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH6->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH7"] = <?php echo $ivf_stimulation_chart_add->GnRH7->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH7"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH7->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH8"] = <?php echo $ivf_stimulation_chart_add->GnRH8->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH8"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH8->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH9"] = <?php echo $ivf_stimulation_chart_add->GnRH9->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH9"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH9->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH10"] = <?php echo $ivf_stimulation_chart_add->GnRH10->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH10"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH10->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH11"] = <?php echo $ivf_stimulation_chart_add->GnRH11->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH11"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH11->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH12"] = <?php echo $ivf_stimulation_chart_add->GnRH12->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH12"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH12->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH13"] = <?php echo $ivf_stimulation_chart_add->GnRH13->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH13"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH13->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Convert[]"] = <?php echo $ivf_stimulation_chart_add->Convert->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Convert[]"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Convert->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_InseminatinTechnique"] = <?php echo $ivf_stimulation_chart_add->InseminatinTechnique->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->InseminatinTechnique->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_IndicationForART"] = <?php echo $ivf_stimulation_chart_add->IndicationForART->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_IndicationForART"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->IndicationForART->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_Hysteroscopy"] = <?php echo $ivf_stimulation_chart_add->Hysteroscopy->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Hysteroscopy->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_EndometrialScratching"] = <?php echo $ivf_stimulation_chart_add->EndometrialScratching->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->EndometrialScratching->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_TrialCannulation"] = <?php echo $ivf_stimulation_chart_add->TrialCannulation->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TrialCannulation->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_CYCLETYPE"] = <?php echo $ivf_stimulation_chart_add->CYCLETYPE->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->CYCLETYPE->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_OralEstrogenDosage"] = <?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_GCSF"] = <?php echo $ivf_stimulation_chart_add->GCSF->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GCSF->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_ActivatedPRP"] = <?php echo $ivf_stimulation_chart_add->ActivatedPRP->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->ActivatedPRP->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_AllFreeze"] = <?php echo $ivf_stimulation_chart_add->AllFreeze->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_AllFreeze"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->AllFreeze->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_TreatmentCancel"] = <?php echo $ivf_stimulation_chart_add->TreatmentCancel->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TreatmentCancel"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TreatmentCancel->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_Projectron"] = <?php echo $ivf_stimulation_chart_add->Projectron->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Projectron"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Projectron->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet14"] = <?php echo $ivf_stimulation_chart_add->Tablet14->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet14"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet14->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet15"] = <?php echo $ivf_stimulation_chart_add->Tablet15->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet15"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet15->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet16"] = <?php echo $ivf_stimulation_chart_add->Tablet16->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet16"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet16->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet17"] = <?php echo $ivf_stimulation_chart_add->Tablet17->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet17"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet17->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet18"] = <?php echo $ivf_stimulation_chart_add->Tablet18->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet18"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet18->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet19"] = <?php echo $ivf_stimulation_chart_add->Tablet19->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet19"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet19->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet20"] = <?php echo $ivf_stimulation_chart_add->Tablet20->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet20"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet20->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet21"] = <?php echo $ivf_stimulation_chart_add->Tablet21->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet21"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet21->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet22"] = <?php echo $ivf_stimulation_chart_add->Tablet22->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet22"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet22->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet23"] = <?php echo $ivf_stimulation_chart_add->Tablet23->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet23"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet23->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet24"] = <?php echo $ivf_stimulation_chart_add->Tablet24->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet24"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet24->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet25"] = <?php echo $ivf_stimulation_chart_add->Tablet25->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_Tablet25"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->Tablet25->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH14"] = <?php echo $ivf_stimulation_chart_add->RFSH14->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH14->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH15"] = <?php echo $ivf_stimulation_chart_add->RFSH15->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH15->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH16"] = <?php echo $ivf_stimulation_chart_add->RFSH16->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH16->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH17"] = <?php echo $ivf_stimulation_chart_add->RFSH17->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH17->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH18"] = <?php echo $ivf_stimulation_chart_add->RFSH18->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH18->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH19"] = <?php echo $ivf_stimulation_chart_add->RFSH19->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH19->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH20"] = <?php echo $ivf_stimulation_chart_add->RFSH20->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH20->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH21"] = <?php echo $ivf_stimulation_chart_add->RFSH21->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH21->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH22"] = <?php echo $ivf_stimulation_chart_add->RFSH22->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH22->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH23"] = <?php echo $ivf_stimulation_chart_add->RFSH23->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH23->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH24"] = <?php echo $ivf_stimulation_chart_add->RFSH24->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH24->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH25"] = <?php echo $ivf_stimulation_chart_add->RFSH25->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_RFSH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->RFSH25->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG14"] = <?php echo $ivf_stimulation_chart_add->HMG14->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG14"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG14->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG15"] = <?php echo $ivf_stimulation_chart_add->HMG15->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG15"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG15->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG16"] = <?php echo $ivf_stimulation_chart_add->HMG16->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG16"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG16->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG17"] = <?php echo $ivf_stimulation_chart_add->HMG17->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG17"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG17->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG18"] = <?php echo $ivf_stimulation_chart_add->HMG18->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG18"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG18->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG19"] = <?php echo $ivf_stimulation_chart_add->HMG19->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG19"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG19->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG20"] = <?php echo $ivf_stimulation_chart_add->HMG20->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG20"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG20->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG21"] = <?php echo $ivf_stimulation_chart_add->HMG21->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG21"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG21->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG22"] = <?php echo $ivf_stimulation_chart_add->HMG22->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG22"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG22->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG23"] = <?php echo $ivf_stimulation_chart_add->HMG23->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG23"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG23->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG24"] = <?php echo $ivf_stimulation_chart_add->HMG24->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG24"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG24->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_HMG25"] = <?php echo $ivf_stimulation_chart_add->HMG25->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HMG25"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HMG25->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH14"] = <?php echo $ivf_stimulation_chart_add->GnRH14->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH14"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH14->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH15"] = <?php echo $ivf_stimulation_chart_add->GnRH15->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH15"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH15->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH16"] = <?php echo $ivf_stimulation_chart_add->GnRH16->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH16"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH16->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH17"] = <?php echo $ivf_stimulation_chart_add->GnRH17->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH17"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH17->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH18"] = <?php echo $ivf_stimulation_chart_add->GnRH18->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH18"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH18->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH19"] = <?php echo $ivf_stimulation_chart_add->GnRH19->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH19"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH19->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH20"] = <?php echo $ivf_stimulation_chart_add->GnRH20->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH20"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH20->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH21"] = <?php echo $ivf_stimulation_chart_add->GnRH21->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH21"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH21->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH22"] = <?php echo $ivf_stimulation_chart_add->GnRH22->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH22"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH22->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH23"] = <?php echo $ivf_stimulation_chart_add->GnRH23->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH23"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH23->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH24"] = <?php echo $ivf_stimulation_chart_add->GnRH24->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH24"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH24->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH25"] = <?php echo $ivf_stimulation_chart_add->GnRH25->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_GnRH25"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->GnRH25->lookupOptions()) ?>;
	fivf_stimulation_chartadd.lists["x_TUBAL_PATENCY"] = <?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_TUBAL_PATENCY"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->TUBAL_PATENCY->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_HSG"] = <?php echo $ivf_stimulation_chart_add->HSG->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_HSG"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->HSG->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_DHL"] = <?php echo $ivf_stimulation_chart_add->DHL->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_DHL"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->DHL->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_UTERINE_PROBLEMS"] = <?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_UTERINE_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->UTERINE_PROBLEMS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_W_COMORBIDS"] = <?php echo $ivf_stimulation_chart_add->W_COMORBIDS->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_W_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->W_COMORBIDS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_H_COMORBIDS"] = <?php echo $ivf_stimulation_chart_add->H_COMORBIDS->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_H_COMORBIDS"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->H_COMORBIDS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_SEXUAL_DYSFUNCTION"] = <?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_SEXUAL_DYSFUNCTION"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_FOLLICLE_STATUS"] = <?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_FOLLICLE_STATUS"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->FOLLICLE_STATUS->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_NUMBER_OF_IUI"] = <?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_NUMBER_OF_IUI"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->NUMBER_OF_IUI->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_PROCEDURE"] = <?php echo $ivf_stimulation_chart_add->PROCEDURE->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_PROCEDURE"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->PROCEDURE->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_LUTEAL_SUPPORT"] = <?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_LUTEAL_SUPPORT"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->LUTEAL_SUPPORT->options(FALSE, TRUE)) ?>;
	fivf_stimulation_chartadd.lists["x_SPECIFIC_MATERNAL_PROBLEMS"] = <?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->Lookup->toClientList($ivf_stimulation_chart_add) ?>;
	fivf_stimulation_chartadd.lists["x_SPECIFIC_MATERNAL_PROBLEMS"].options = <?php echo JsonEncode($ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_stimulation_chartadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_stimulation_chart_add->showPageHeader(); ?>
<?php
$ivf_stimulation_chart_add->showMessage();
?>
<form name="fivf_stimulation_chartadd" id="fivf_stimulation_chartadd" class="<?php echo $ivf_stimulation_chart_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_chart_add->IsModal ?>">
<?php if ($ivf_stimulation_chart->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_stimulation_chart_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RIDNo" type="text/html"><?php echo $ivf_stimulation_chart_add->RIDNo->caption() ?><?php echo $ivf_stimulation_chart_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RIDNo->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_add->RIDNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_RIDNo" type="text/html"><span id="el_ivf_stimulation_chart_RIDNo">
<span<?php echo $ivf_stimulation_chart_add->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_add->RIDNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_RIDNo" type="text/html"><span id="el_ivf_stimulation_chart_RIDNo">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->RIDNo->EditValue ?>"<?php echo $ivf_stimulation_chart_add->RIDNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Name" for="x_Name" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Name" type="text/html"><?php echo $ivf_stimulation_chart_add->Name->caption() ?><?php echo $ivf_stimulation_chart_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Name->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_add->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_Name" type="text/html"><span id="el_ivf_stimulation_chart_Name">
<span<?php echo $ivf_stimulation_chart_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_add->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_Name" type="text/html"><span id="el_ivf_stimulation_chart_Name">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Name->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ARTCycle" type="text/html"><?php echo $ivf_stimulation_chart_add->ARTCycle->caption() ?><?php echo $ivf_stimulation_chart_add->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ARTCycle" type="text/html"><span id="el_ivf_stimulation_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_stimulation_chart_add->ARTCycle->displayValueSeparatorAttribute() ?>" id="x_ARTCycle" name="x_ARTCycle"<?php echo $ivf_stimulation_chart_add->ARTCycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->FemaleFactor->Visible) { // FemaleFactor ?>
	<div id="r_FemaleFactor" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FemaleFactor" for="x_FemaleFactor" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FemaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_add->FemaleFactor->caption() ?><?php echo $ivf_stimulation_chart_add->FemaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->FemaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FemaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_FemaleFactor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_FemaleFactor" data-value-separator="<?php echo $ivf_stimulation_chart_add->FemaleFactor->displayValueSeparatorAttribute() ?>" id="x_FemaleFactor" name="x_FemaleFactor"<?php echo $ivf_stimulation_chart_add->FemaleFactor->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->FemaleFactor->selectOptionListHtml("x_FemaleFactor") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->FemaleFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->MaleFactor->Visible) { // MaleFactor ?>
	<div id="r_MaleFactor" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MaleFactor" for="x_MaleFactor" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MaleFactor" type="text/html"><?php echo $ivf_stimulation_chart_add->MaleFactor->caption() ?><?php echo $ivf_stimulation_chart_add->MaleFactor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->MaleFactor->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MaleFactor" type="text/html"><span id="el_ivf_stimulation_chart_MaleFactor">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_MaleFactor" data-value-separator="<?php echo $ivf_stimulation_chart_add->MaleFactor->displayValueSeparatorAttribute() ?>" id="x_MaleFactor" name="x_MaleFactor"<?php echo $ivf_stimulation_chart_add->MaleFactor->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->MaleFactor->selectOptionListHtml("x_MaleFactor") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->MaleFactor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Protocol->Visible) { // Protocol ?>
	<div id="r_Protocol" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Protocol" for="x_Protocol" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Protocol" type="text/html"><?php echo $ivf_stimulation_chart_add->Protocol->caption() ?><?php echo $ivf_stimulation_chart_add->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Protocol" type="text/html"><span id="el_ivf_stimulation_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_stimulation_chart_add->Protocol->displayValueSeparatorAttribute() ?>" id="x_Protocol" name="x_Protocol"<?php echo $ivf_stimulation_chart_add->Protocol->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Protocol->selectOptionListHtml("x_Protocol") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->Protocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SemenFrozen->Visible) { // SemenFrozen ?>
	<div id="r_SemenFrozen" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SemenFrozen" for="x_SemenFrozen" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SemenFrozen" type="text/html"><?php echo $ivf_stimulation_chart_add->SemenFrozen->caption() ?><?php echo $ivf_stimulation_chart_add->SemenFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SemenFrozen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SemenFrozen" type="text/html"><span id="el_ivf_stimulation_chart_SemenFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SemenFrozen" data-value-separator="<?php echo $ivf_stimulation_chart_add->SemenFrozen->displayValueSeparatorAttribute() ?>" id="x_SemenFrozen" name="x_SemenFrozen"<?php echo $ivf_stimulation_chart_add->SemenFrozen->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->SemenFrozen->selectOptionListHtml("x_SemenFrozen") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->SemenFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->A4ICSICycle->Visible) { // A4ICSICycle ?>
	<div id="r_A4ICSICycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_A4ICSICycle" for="x_A4ICSICycle" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_A4ICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_add->A4ICSICycle->caption() ?><?php echo $ivf_stimulation_chart_add->A4ICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->A4ICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_A4ICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_A4ICSICycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_A4ICSICycle" data-value-separator="<?php echo $ivf_stimulation_chart_add->A4ICSICycle->displayValueSeparatorAttribute() ?>" id="x_A4ICSICycle" name="x_A4ICSICycle"<?php echo $ivf_stimulation_chart_add->A4ICSICycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->A4ICSICycle->selectOptionListHtml("x_A4ICSICycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->A4ICSICycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TotalICSICycle->Visible) { // TotalICSICycle ?>
	<div id="r_TotalICSICycle" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TotalICSICycle" for="x_TotalICSICycle" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TotalICSICycle" type="text/html"><?php echo $ivf_stimulation_chart_add->TotalICSICycle->caption() ?><?php echo $ivf_stimulation_chart_add->TotalICSICycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TotalICSICycle->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TotalICSICycle" type="text/html"><span id="el_ivf_stimulation_chart_TotalICSICycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TotalICSICycle" data-value-separator="<?php echo $ivf_stimulation_chart_add->TotalICSICycle->displayValueSeparatorAttribute() ?>" id="x_TotalICSICycle" name="x_TotalICSICycle"<?php echo $ivf_stimulation_chart_add->TotalICSICycle->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->TotalICSICycle->selectOptionListHtml("x_TotalICSICycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->TotalICSICycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
	<div id="r_TypeOfInfertility" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TypeOfInfertility" for="x_TypeOfInfertility" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><?php echo $ivf_stimulation_chart_add->TypeOfInfertility->caption() ?><?php echo $ivf_stimulation_chart_add->TypeOfInfertility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TypeOfInfertility->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TypeOfInfertility" type="text/html"><span id="el_ivf_stimulation_chart_TypeOfInfertility">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TypeOfInfertility" data-value-separator="<?php echo $ivf_stimulation_chart_add->TypeOfInfertility->displayValueSeparatorAttribute() ?>" id="x_TypeOfInfertility" name="x_TypeOfInfertility"<?php echo $ivf_stimulation_chart_add->TypeOfInfertility->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->TypeOfInfertility->selectOptionListHtml("x_TypeOfInfertility") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->TypeOfInfertility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Duration" for="x_Duration" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Duration" type="text/html"><?php echo $ivf_stimulation_chart_add->Duration->caption() ?><?php echo $ivf_stimulation_chart_add->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Duration->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Duration" type="text/html"><span id="el_ivf_stimulation_chart_Duration">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Duration->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Duration->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Duration->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_ivf_stimulation_chart_LMP" for="x_LMP" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_LMP" type="text/html"><?php echo $ivf_stimulation_chart_add->LMP->caption() ?><?php echo $ivf_stimulation_chart_add->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->LMP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LMP" type="text/html"><span id="el_ivf_stimulation_chart_LMP">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->LMP->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->LMP->EditValue ?>"<?php echo $ivf_stimulation_chart_add->LMP->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->LMP->ReadOnly && !$ivf_stimulation_chart_add->LMP->Disabled && !isset($ivf_stimulation_chart_add->LMP->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RelevantHistory->Visible) { // RelevantHistory ?>
	<div id="r_RelevantHistory" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RelevantHistory" for="x_RelevantHistory" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RelevantHistory" type="text/html"><?php echo $ivf_stimulation_chart_add->RelevantHistory->caption() ?><?php echo $ivf_stimulation_chart_add->RelevantHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RelevantHistory->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RelevantHistory" type="text/html"><span id="el_ivf_stimulation_chart_RelevantHistory">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_RelevantHistory" name="x_RelevantHistory" id="x_RelevantHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->RelevantHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->RelevantHistory->EditValue ?>"<?php echo $ivf_stimulation_chart_add->RelevantHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->RelevantHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->IUICycles->Visible) { // IUICycles ?>
	<div id="r_IUICycles" class="form-group row">
		<label id="elh_ivf_stimulation_chart_IUICycles" for="x_IUICycles" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_IUICycles" type="text/html"><?php echo $ivf_stimulation_chart_add->IUICycles->caption() ?><?php echo $ivf_stimulation_chart_add->IUICycles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->IUICycles->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IUICycles" type="text/html"><span id="el_ivf_stimulation_chart_IUICycles">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_IUICycles" name="x_IUICycles" id="x_IUICycles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->IUICycles->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->IUICycles->EditValue ?>"<?php echo $ivf_stimulation_chart_add->IUICycles->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->IUICycles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->AFC->Visible) { // AFC ?>
	<div id="r_AFC" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AFC" for="x_AFC" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AFC" type="text/html"><?php echo $ivf_stimulation_chart_add->AFC->caption() ?><?php echo $ivf_stimulation_chart_add->AFC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->AFC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AFC" type="text/html"><span id="el_ivf_stimulation_chart_AFC">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_AFC" name="x_AFC" id="x_AFC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->AFC->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->AFC->EditValue ?>"<?php echo $ivf_stimulation_chart_add->AFC->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->AFC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->AMH->Visible) { // AMH ?>
	<div id="r_AMH" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AMH" for="x_AMH" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AMH" type="text/html"><?php echo $ivf_stimulation_chart_add->AMH->caption() ?><?php echo $ivf_stimulation_chart_add->AMH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->AMH->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AMH" type="text/html"><span id="el_ivf_stimulation_chart_AMH">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_AMH" name="x_AMH" id="x_AMH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->AMH->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->AMH->EditValue ?>"<?php echo $ivf_stimulation_chart_add->AMH->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->AMH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->FBMI->Visible) { // FBMI ?>
	<div id="r_FBMI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FBMI" for="x_FBMI" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FBMI" type="text/html"><?php echo $ivf_stimulation_chart_add->FBMI->caption() ?><?php echo $ivf_stimulation_chart_add->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FBMI" type="text/html"><span id="el_ivf_stimulation_chart_FBMI">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->FBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->FBMI->EditValue ?>"<?php echo $ivf_stimulation_chart_add->FBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->FBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->MBMI->Visible) { // MBMI ?>
	<div id="r_MBMI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MBMI" for="x_MBMI" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MBMI" type="text/html"><?php echo $ivf_stimulation_chart_add->MBMI->caption() ?><?php echo $ivf_stimulation_chart_add->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MBMI" type="text/html"><span id="el_ivf_stimulation_chart_MBMI">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->MBMI->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->MBMI->EditValue ?>"<?php echo $ivf_stimulation_chart_add->MBMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->MBMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
	<div id="r_OvarianVolumeRT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianVolumeRT" for="x_OvarianVolumeRT" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->caption() ?><?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeRT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeRT" name="x_OvarianVolumeRT" id="x_OvarianVolumeRT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->OvarianVolumeRT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->EditValue ?>"<?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->OvarianVolumeRT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
	<div id="r_OvarianVolumeLT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianVolumeLT" for="x_OvarianVolumeLT" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->caption() ?><?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianVolumeLT" type="text/html"><span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianVolumeLT" name="x_OvarianVolumeLT" id="x_OvarianVolumeLT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->OvarianVolumeLT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->EditValue ?>"<?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->OvarianVolumeLT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
	<div id="r_DAYSOFSTIMULATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" for="x_DAYSOFSTIMULATION" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->caption() ?><?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION" type="text/html"><span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYSOFSTIMULATION" name="x_DAYSOFSTIMULATION" id="x_DAYSOFSTIMULATION" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DAYSOFSTIMULATION->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DAYSOFSTIMULATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
	<div id="r_DOSEOFGONADOTROPINS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" for="x_DOSEOFGONADOTROPINS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->caption() ?><?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS" type="text/html"><span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DOSEOFGONADOTROPINS" name="x_DOSEOFGONADOTROPINS" id="x_DOSEOFGONADOTROPINS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DOSEOFGONADOTROPINS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->INJTYPE->Visible) { // INJTYPE ?>
	<div id="r_INJTYPE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_INJTYPE" for="x_INJTYPE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_INJTYPE" type="text/html"><?php echo $ivf_stimulation_chart_add->INJTYPE->caption() ?><?php echo $ivf_stimulation_chart_add->INJTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->INJTYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_INJTYPE" type="text/html"><span id="el_ivf_stimulation_chart_INJTYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_INJTYPE" data-value-separator="<?php echo $ivf_stimulation_chart_add->INJTYPE->displayValueSeparatorAttribute() ?>" id="x_INJTYPE" name="x_INJTYPE"<?php echo $ivf_stimulation_chart_add->INJTYPE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->INJTYPE->selectOptionListHtml("x_INJTYPE") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_inj") && !$ivf_stimulation_chart_add->INJTYPE->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_INJTYPE" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->INJTYPE->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->INJTYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_INJTYPE',url:'ivf_stimulation_injaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->INJTYPE->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_INJTYPE") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->INJTYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
	<div id="r_ANTAGONISTDAYS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" for="x_ANTAGONISTDAYS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->caption() ?><?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTDAYS" name="x_ANTAGONISTDAYS" id="x_ANTAGONISTDAYS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ANTAGONISTDAYS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ANTAGONISTDAYS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
	<div id="r_ANTAGONISTSTARTDAY" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" for="x_ANTAGONISTSTARTDAY" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->caption() ?><?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY" type="text/html"><span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ANTAGONISTSTARTDAY" data-value-separator="<?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->displayValueSeparatorAttribute() ?>" id="x_ANTAGONISTSTARTDAY" name="x_ANTAGONISTSTARTDAY"<?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->selectOptionListHtml("x_ANTAGONISTSTARTDAY") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ANTAGONISTSTARTDAY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
	<div id="r_GROWTHHORMONE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GROWTHHORMONE" for="x_GROWTHHORMONE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->caption() ?><?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GROWTHHORMONE" type="text/html"><span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_GROWTHHORMONE" name="x_GROWTHHORMONE" id="x_GROWTHHORMONE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->GROWTHHORMONE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->EditValue ?>"<?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->GROWTHHORMONE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->PRETREATMENT->Visible) { // PRETREATMENT ?>
	<div id="r_PRETREATMENT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PRETREATMENT" for="x_PRETREATMENT" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PRETREATMENT" type="text/html"><?php echo $ivf_stimulation_chart_add->PRETREATMENT->caption() ?><?php echo $ivf_stimulation_chart_add->PRETREATMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->PRETREATMENT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PRETREATMENT" type="text/html"><span id="el_ivf_stimulation_chart_PRETREATMENT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_PRETREATMENT" data-value-separator="<?php echo $ivf_stimulation_chart_add->PRETREATMENT->displayValueSeparatorAttribute() ?>" id="x_PRETREATMENT" name="x_PRETREATMENT"<?php echo $ivf_stimulation_chart_add->PRETREATMENT->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->PRETREATMENT->selectOptionListHtml("x_PRETREATMENT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->PRETREATMENT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SerumP4->Visible) { // SerumP4 ?>
	<div id="r_SerumP4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SerumP4" for="x_SerumP4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SerumP4" type="text/html"><?php echo $ivf_stimulation_chart_add->SerumP4->caption() ?><?php echo $ivf_stimulation_chart_add->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SerumP4" type="text/html"><span id="el_ivf_stimulation_chart_SerumP4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->SerumP4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->SerumP4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->SerumP4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->FORT->Visible) { // FORT ?>
	<div id="r_FORT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FORT" for="x_FORT" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FORT" type="text/html"><?php echo $ivf_stimulation_chart_add->FORT->caption() ?><?php echo $ivf_stimulation_chart_add->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->FORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FORT" type="text/html"><span id="el_ivf_stimulation_chart_FORT">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->FORT->EditValue ?>"<?php echo $ivf_stimulation_chart_add->FORT->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->FORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->MedicalFactors->Visible) { // MedicalFactors ?>
	<div id="r_MedicalFactors" class="form-group row">
		<label id="elh_ivf_stimulation_chart_MedicalFactors" for="x_MedicalFactors" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_MedicalFactors" type="text/html"><?php echo $ivf_stimulation_chart_add->MedicalFactors->caption() ?><?php echo $ivf_stimulation_chart_add->MedicalFactors->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->MedicalFactors->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_MedicalFactors" type="text/html"><span id="el_ivf_stimulation_chart_MedicalFactors">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_MedicalFactors" data-value-separator="<?php echo $ivf_stimulation_chart_add->MedicalFactors->displayValueSeparatorAttribute() ?>" id="x_MedicalFactors" name="x_MedicalFactors"<?php echo $ivf_stimulation_chart_add->MedicalFactors->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->MedicalFactors->selectOptionListHtml("x_MedicalFactors") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->MedicalFactors->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SCDate->Visible) { // SCDate ?>
	<div id="r_SCDate" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SCDate" for="x_SCDate" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SCDate" type="text/html"><?php echo $ivf_stimulation_chart_add->SCDate->caption() ?><?php echo $ivf_stimulation_chart_add->SCDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SCDate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SCDate" type="text/html"><span id="el_ivf_stimulation_chart_SCDate">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_SCDate" data-format="7" name="x_SCDate" id="x_SCDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->SCDate->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->SCDate->EditValue ?>"<?php echo $ivf_stimulation_chart_add->SCDate->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->SCDate->ReadOnly && !$ivf_stimulation_chart_add->SCDate->Disabled && !isset($ivf_stimulation_chart_add->SCDate->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->SCDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_SCDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->SCDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->OvarianSurgery->Visible) { // OvarianSurgery ?>
	<div id="r_OvarianSurgery" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OvarianSurgery" for="x_OvarianSurgery" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OvarianSurgery" type="text/html"><?php echo $ivf_stimulation_chart_add->OvarianSurgery->caption() ?><?php echo $ivf_stimulation_chart_add->OvarianSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->OvarianSurgery->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OvarianSurgery" type="text/html"><span id="el_ivf_stimulation_chart_OvarianSurgery">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OvarianSurgery" name="x_OvarianSurgery" id="x_OvarianSurgery" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->OvarianSurgery->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->OvarianSurgery->EditValue ?>"<?php echo $ivf_stimulation_chart_add->OvarianSurgery->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->OvarianSurgery->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
	<div id="r_PreProcedureOrder" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PreProcedureOrder" for="x_PreProcedureOrder" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><?php echo $ivf_stimulation_chart_add->PreProcedureOrder->caption() ?><?php echo $ivf_stimulation_chart_add->PreProcedureOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->PreProcedureOrder->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PreProcedureOrder" type="text/html"><span id="el_ivf_stimulation_chart_PreProcedureOrder">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PreProcedureOrder" name="x_PreProcedureOrder" id="x_PreProcedureOrder" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->PreProcedureOrder->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->PreProcedureOrder->EditValue ?>"<?php echo $ivf_stimulation_chart_add->PreProcedureOrder->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->PreProcedureOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TRIGGERR->Visible) { // TRIGGERR ?>
	<div id="r_TRIGGERR" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TRIGGERR" for="x_TRIGGERR" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TRIGGERR" type="text/html"><?php echo $ivf_stimulation_chart_add->TRIGGERR->caption() ?><?php echo $ivf_stimulation_chart_add->TRIGGERR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TRIGGERR->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERR" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERR">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TRIGGERR" data-value-separator="<?php echo $ivf_stimulation_chart_add->TRIGGERR->displayValueSeparatorAttribute() ?>" id="x_TRIGGERR" name="x_TRIGGERR"<?php echo $ivf_stimulation_chart_add->TRIGGERR->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->TRIGGERR->selectOptionListHtml("x_TRIGGERR") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_trigger") && !$ivf_stimulation_chart_add->TRIGGERR->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TRIGGERR" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->TRIGGERR->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->TRIGGERR->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TRIGGERR',url:'ivf_stimulation_triggeraddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->TRIGGERR->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_TRIGGERR") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->TRIGGERR->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
	<div id="r_TRIGGERDATE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TRIGGERDATE" for="x_TRIGGERDATE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><?php echo $ivf_stimulation_chart_add->TRIGGERDATE->caption() ?><?php echo $ivf_stimulation_chart_add->TRIGGERDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TRIGGERDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TRIGGERDATE" type="text/html"><span id="el_ivf_stimulation_chart_TRIGGERDATE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TRIGGERDATE" data-format="11" name="x_TRIGGERDATE" id="x_TRIGGERDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->TRIGGERDATE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->TRIGGERDATE->EditValue ?>"<?php echo $ivf_stimulation_chart_add->TRIGGERDATE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->TRIGGERDATE->ReadOnly && !$ivf_stimulation_chart_add->TRIGGERDATE->Disabled && !isset($ivf_stimulation_chart_add->TRIGGERDATE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_add->TRIGGERDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
	<div id="r_ATHOMEorCLINIC" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" for="x_ATHOMEorCLINIC" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->caption() ?><?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC" type="text/html"><span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ATHOMEorCLINIC" name="x_ATHOMEorCLINIC" id="x_ATHOMEorCLINIC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ATHOMEorCLINIC->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ATHOMEorCLINIC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->OPUDATE->Visible) { // OPUDATE ?>
	<div id="r_OPUDATE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OPUDATE" for="x_OPUDATE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OPUDATE" type="text/html"><?php echo $ivf_stimulation_chart_add->OPUDATE->caption() ?><?php echo $ivf_stimulation_chart_add->OPUDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->OPUDATE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OPUDATE" type="text/html"><span id="el_ivf_stimulation_chart_OPUDATE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_OPUDATE" data-format="11" name="x_OPUDATE" id="x_OPUDATE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->OPUDATE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->OPUDATE->EditValue ?>"<?php echo $ivf_stimulation_chart_add->OPUDATE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->OPUDATE->ReadOnly && !$ivf_stimulation_chart_add->OPUDATE->Disabled && !isset($ivf_stimulation_chart_add->OPUDATE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->OPUDATE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_OPUDATE", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_add->OPUDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
	<div id="r_ALLFREEZEINDICATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" for="x_ALLFREEZEINDICATION" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->caption() ?><?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION" type="text/html"><span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ALLFREEZEINDICATION" data-value-separator="<?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->displayValueSeparatorAttribute() ?>" id="x_ALLFREEZEINDICATION" name="x_ALLFREEZEINDICATION"<?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->selectOptionListHtml("x_ALLFREEZEINDICATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ALLFREEZEINDICATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ERA->Visible) { // ERA ?>
	<div id="r_ERA" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ERA" for="x_ERA" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ERA" type="text/html"><?php echo $ivf_stimulation_chart_add->ERA->caption() ?><?php echo $ivf_stimulation_chart_add->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ERA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ERA" type="text/html"><span id="el_ivf_stimulation_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_stimulation_chart_add->ERA->displayValueSeparatorAttribute() ?>" id="x_ERA" name="x_ERA"<?php echo $ivf_stimulation_chart_add->ERA->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ERA->selectOptionListHtml("x_ERA") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ERA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->PGTA->Visible) { // PGTA ?>
	<div id="r_PGTA" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PGTA" for="x_PGTA" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PGTA" type="text/html"><?php echo $ivf_stimulation_chart_add->PGTA->caption() ?><?php echo $ivf_stimulation_chart_add->PGTA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->PGTA->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGTA" type="text/html"><span id="el_ivf_stimulation_chart_PGTA">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PGTA" name="x_PGTA" id="x_PGTA" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->PGTA->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->PGTA->EditValue ?>"<?php echo $ivf_stimulation_chart_add->PGTA->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->PGTA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->PGD->Visible) { // PGD ?>
	<div id="r_PGD" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PGD" for="x_PGD" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PGD" type="text/html"><?php echo $ivf_stimulation_chart_add->PGD->caption() ?><?php echo $ivf_stimulation_chart_add->PGD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->PGD->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PGD" type="text/html"><span id="el_ivf_stimulation_chart_PGD">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_PGD" name="x_PGD" id="x_PGD" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->PGD->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->PGD->EditValue ?>"<?php echo $ivf_stimulation_chart_add->PGD->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->PGD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DATEOFET->Visible) { // DATEOFET ?>
	<div id="r_DATEOFET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DATEOFET" for="x_DATEOFET" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DATEOFET" type="text/html"><?php echo $ivf_stimulation_chart_add->DATEOFET->caption() ?><?php echo $ivf_stimulation_chart_add->DATEOFET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DATEOFET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATEOFET" type="text/html"><span id="el_ivf_stimulation_chart_DATEOFET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DATEOFET" data-format="11" name="x_DATEOFET" id="x_DATEOFET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DATEOFET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DATEOFET->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DATEOFET->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->DATEOFET->ReadOnly && !$ivf_stimulation_chart_add->DATEOFET->Disabled && !isset($ivf_stimulation_chart_add->DATEOFET->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->DATEOFET->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_DATEOFET", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_add->DATEOFET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ET->Visible) { // ET ?>
	<div id="r_ET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ET" for="x_ET" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ET" type="text/html"><?php echo $ivf_stimulation_chart_add->ET->caption() ?><?php echo $ivf_stimulation_chart_add->ET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ET" type="text/html"><span id="el_ivf_stimulation_chart_ET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ET" data-value-separator="<?php echo $ivf_stimulation_chart_add->ET->displayValueSeparatorAttribute() ?>" id="x_ET" name="x_ET"<?php echo $ivf_stimulation_chart_add->ET->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ET->selectOptionListHtml("x_ET") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ESET->Visible) { // ESET ?>
	<div id="r_ESET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ESET" for="x_ESET" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ESET" type="text/html"><?php echo $ivf_stimulation_chart_add->ESET->caption() ?><?php echo $ivf_stimulation_chart_add->ESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ESET" type="text/html"><span id="el_ivf_stimulation_chart_ESET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ESET" name="x_ESET" id="x_ESET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ESET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ESET->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ESET->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ESET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DOET->Visible) { // DOET ?>
	<div id="r_DOET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOET" for="x_DOET" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOET" type="text/html"><?php echo $ivf_stimulation_chart_add->DOET->caption() ?><?php echo $ivf_stimulation_chart_add->DOET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DOET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOET" type="text/html"><span id="el_ivf_stimulation_chart_DOET">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DOET" name="x_DOET" id="x_DOET" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DOET->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DOET->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DOET->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DOET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
	<div id="r_SEMENPREPARATION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SEMENPREPARATION" for="x_SEMENPREPARATION" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->caption() ?><?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEMENPREPARATION" type="text/html"><span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SEMENPREPARATION" data-value-separator="<?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->displayValueSeparatorAttribute() ?>" id="x_SEMENPREPARATION" name="x_SEMENPREPARATION"<?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->selectOptionListHtml("x_SEMENPREPARATION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->SEMENPREPARATION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->REASONFORESET->Visible) { // REASONFORESET ?>
	<div id="r_REASONFORESET" class="form-group row">
		<label id="elh_ivf_stimulation_chart_REASONFORESET" for="x_REASONFORESET" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_REASONFORESET" type="text/html"><?php echo $ivf_stimulation_chart_add->REASONFORESET->caption() ?><?php echo $ivf_stimulation_chart_add->REASONFORESET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->REASONFORESET->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_REASONFORESET" type="text/html"><span id="el_ivf_stimulation_chart_REASONFORESET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_REASONFORESET" data-value-separator="<?php echo $ivf_stimulation_chart_add->REASONFORESET->displayValueSeparatorAttribute() ?>" id="x_REASONFORESET" name="x_REASONFORESET"<?php echo $ivf_stimulation_chart_add->REASONFORESET->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->REASONFORESET->selectOptionListHtml("x_REASONFORESET") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->REASONFORESET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Expectedoocytes->Visible) { // Expectedoocytes ?>
	<div id="r_Expectedoocytes" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Expectedoocytes" for="x_Expectedoocytes" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Expectedoocytes" type="text/html"><?php echo $ivf_stimulation_chart_add->Expectedoocytes->caption() ?><?php echo $ivf_stimulation_chart_add->Expectedoocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Expectedoocytes->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Expectedoocytes" type="text/html"><span id="el_ivf_stimulation_chart_Expectedoocytes">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Expectedoocytes" name="x_Expectedoocytes" id="x_Expectedoocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Expectedoocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Expectedoocytes->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Expectedoocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Expectedoocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate1->Visible) { // StChDate1 ?>
	<div id="r_StChDate1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate1" for="x_StChDate1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate1" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate1->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate1" type="text/html"><span id="el_ivf_stimulation_chart_StChDate1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate1" data-format="7" name="x_StChDate1" id="x_StChDate1" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate1->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate1->ReadOnly && !$ivf_stimulation_chart_add->StChDate1->Disabled && !isset($ivf_stimulation_chart_add->StChDate1->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate1->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate2->Visible) { // StChDate2 ?>
	<div id="r_StChDate2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate2" for="x_StChDate2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate2" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate2->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate2" type="text/html"><span id="el_ivf_stimulation_chart_StChDate2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate2" data-format="7" name="x_StChDate2" id="x_StChDate2" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate2->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate2->ReadOnly && !$ivf_stimulation_chart_add->StChDate2->Disabled && !isset($ivf_stimulation_chart_add->StChDate2->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate2->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate3->Visible) { // StChDate3 ?>
	<div id="r_StChDate3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate3" for="x_StChDate3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate3" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate3->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate3" type="text/html"><span id="el_ivf_stimulation_chart_StChDate3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate3" data-format="7" name="x_StChDate3" id="x_StChDate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate3->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate3->ReadOnly && !$ivf_stimulation_chart_add->StChDate3->Disabled && !isset($ivf_stimulation_chart_add->StChDate3->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate3->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate4->Visible) { // StChDate4 ?>
	<div id="r_StChDate4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate4" for="x_StChDate4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate4" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate4->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate4" type="text/html"><span id="el_ivf_stimulation_chart_StChDate4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate4" data-format="7" name="x_StChDate4" id="x_StChDate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate4->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate4->ReadOnly && !$ivf_stimulation_chart_add->StChDate4->Disabled && !isset($ivf_stimulation_chart_add->StChDate4->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate4->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate5->Visible) { // StChDate5 ?>
	<div id="r_StChDate5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate5" for="x_StChDate5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate5" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate5->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate5" type="text/html"><span id="el_ivf_stimulation_chart_StChDate5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate5" data-format="7" name="x_StChDate5" id="x_StChDate5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate5->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate5->ReadOnly && !$ivf_stimulation_chart_add->StChDate5->Disabled && !isset($ivf_stimulation_chart_add->StChDate5->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate5->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate5", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate6->Visible) { // StChDate6 ?>
	<div id="r_StChDate6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate6" for="x_StChDate6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate6" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate6->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate6" type="text/html"><span id="el_ivf_stimulation_chart_StChDate6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate6" data-format="7" name="x_StChDate6" id="x_StChDate6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate6->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate6->ReadOnly && !$ivf_stimulation_chart_add->StChDate6->Disabled && !isset($ivf_stimulation_chart_add->StChDate6->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate6->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate6", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate7->Visible) { // StChDate7 ?>
	<div id="r_StChDate7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate7" for="x_StChDate7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate7" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate7->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate7" type="text/html"><span id="el_ivf_stimulation_chart_StChDate7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate7" data-format="7" name="x_StChDate7" id="x_StChDate7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate7->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate7->ReadOnly && !$ivf_stimulation_chart_add->StChDate7->Disabled && !isset($ivf_stimulation_chart_add->StChDate7->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate7->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate7", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate8->Visible) { // StChDate8 ?>
	<div id="r_StChDate8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate8" for="x_StChDate8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate8" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate8->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate8" type="text/html"><span id="el_ivf_stimulation_chart_StChDate8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate8" data-format="7" name="x_StChDate8" id="x_StChDate8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate8->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate8->ReadOnly && !$ivf_stimulation_chart_add->StChDate8->Disabled && !isset($ivf_stimulation_chart_add->StChDate8->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate8->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate8", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate9->Visible) { // StChDate9 ?>
	<div id="r_StChDate9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate9" for="x_StChDate9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate9" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate9->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate9" type="text/html"><span id="el_ivf_stimulation_chart_StChDate9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate9" data-format="7" name="x_StChDate9" id="x_StChDate9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate9->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate9->ReadOnly && !$ivf_stimulation_chart_add->StChDate9->Disabled && !isset($ivf_stimulation_chart_add->StChDate9->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate9->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate9", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate10->Visible) { // StChDate10 ?>
	<div id="r_StChDate10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate10" for="x_StChDate10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate10" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate10->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate10" type="text/html"><span id="el_ivf_stimulation_chart_StChDate10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate10" data-format="7" name="x_StChDate10" id="x_StChDate10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate10->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate10->ReadOnly && !$ivf_stimulation_chart_add->StChDate10->Disabled && !isset($ivf_stimulation_chart_add->StChDate10->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate10->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate10", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate11->Visible) { // StChDate11 ?>
	<div id="r_StChDate11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate11" for="x_StChDate11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate11" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate11->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate11" type="text/html"><span id="el_ivf_stimulation_chart_StChDate11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate11" data-format="7" name="x_StChDate11" id="x_StChDate11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate11->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate11->ReadOnly && !$ivf_stimulation_chart_add->StChDate11->Disabled && !isset($ivf_stimulation_chart_add->StChDate11->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate11->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate11", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate12->Visible) { // StChDate12 ?>
	<div id="r_StChDate12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate12" for="x_StChDate12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate12" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate12->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate12" type="text/html"><span id="el_ivf_stimulation_chart_StChDate12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate12" data-format="7" name="x_StChDate12" id="x_StChDate12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate12->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate12->ReadOnly && !$ivf_stimulation_chart_add->StChDate12->Disabled && !isset($ivf_stimulation_chart_add->StChDate12->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate12->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate12", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate13->Visible) { // StChDate13 ?>
	<div id="r_StChDate13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate13" for="x_StChDate13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate13" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate13->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate13" type="text/html"><span id="el_ivf_stimulation_chart_StChDate13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate13" data-format="7" name="x_StChDate13" id="x_StChDate13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate13->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate13->ReadOnly && !$ivf_stimulation_chart_add->StChDate13->Disabled && !isset($ivf_stimulation_chart_add->StChDate13->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate13->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate13", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay1->Visible) { // CycleDay1 ?>
	<div id="r_CycleDay1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay1" for="x_CycleDay1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay1" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay1->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay1" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay1" name="x_CycleDay1" id="x_CycleDay1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay2->Visible) { // CycleDay2 ?>
	<div id="r_CycleDay2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay2" for="x_CycleDay2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay2" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay2->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay2" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay2" name="x_CycleDay2" id="x_CycleDay2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay3->Visible) { // CycleDay3 ?>
	<div id="r_CycleDay3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay3" for="x_CycleDay3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay3" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay3->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay3" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay3" name="x_CycleDay3" id="x_CycleDay3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay4->Visible) { // CycleDay4 ?>
	<div id="r_CycleDay4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay4" for="x_CycleDay4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay4" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay4->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay4" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay4" name="x_CycleDay4" id="x_CycleDay4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay5->Visible) { // CycleDay5 ?>
	<div id="r_CycleDay5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay5" for="x_CycleDay5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay5" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay5->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay5" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay5" name="x_CycleDay5" id="x_CycleDay5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay6->Visible) { // CycleDay6 ?>
	<div id="r_CycleDay6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay6" for="x_CycleDay6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay6" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay6->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay6" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay6" name="x_CycleDay6" id="x_CycleDay6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay7->Visible) { // CycleDay7 ?>
	<div id="r_CycleDay7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay7" for="x_CycleDay7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay7" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay7->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay7" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay7" name="x_CycleDay7" id="x_CycleDay7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay8->Visible) { // CycleDay8 ?>
	<div id="r_CycleDay8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay8" for="x_CycleDay8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay8" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay8->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay8" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay8" name="x_CycleDay8" id="x_CycleDay8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay9->Visible) { // CycleDay9 ?>
	<div id="r_CycleDay9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay9" for="x_CycleDay9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay9" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay9->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay9" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay9" name="x_CycleDay9" id="x_CycleDay9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay10->Visible) { // CycleDay10 ?>
	<div id="r_CycleDay10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay10" for="x_CycleDay10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay10" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay10->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay10" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay10" name="x_CycleDay10" id="x_CycleDay10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay11->Visible) { // CycleDay11 ?>
	<div id="r_CycleDay11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay11" for="x_CycleDay11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay11" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay11->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay11" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay11" name="x_CycleDay11" id="x_CycleDay11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay12->Visible) { // CycleDay12 ?>
	<div id="r_CycleDay12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay12" for="x_CycleDay12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay12" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay12->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay12" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay12" name="x_CycleDay12" id="x_CycleDay12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay13->Visible) { // CycleDay13 ?>
	<div id="r_CycleDay13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay13" for="x_CycleDay13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay13" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay13->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay13" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay13" name="x_CycleDay13" id="x_CycleDay13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay1->Visible) { // StimulationDay1 ?>
	<div id="r_StimulationDay1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay1" for="x_StimulationDay1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay1" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay1->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay1" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay1" name="x_StimulationDay1" id="x_StimulationDay1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay2->Visible) { // StimulationDay2 ?>
	<div id="r_StimulationDay2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay2" for="x_StimulationDay2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay2" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay2->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay2" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay2" name="x_StimulationDay2" id="x_StimulationDay2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay3->Visible) { // StimulationDay3 ?>
	<div id="r_StimulationDay3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay3" for="x_StimulationDay3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay3" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay3->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay3" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay3" name="x_StimulationDay3" id="x_StimulationDay3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay4->Visible) { // StimulationDay4 ?>
	<div id="r_StimulationDay4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay4" for="x_StimulationDay4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay4" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay4->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay4" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay4" name="x_StimulationDay4" id="x_StimulationDay4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay5->Visible) { // StimulationDay5 ?>
	<div id="r_StimulationDay5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay5" for="x_StimulationDay5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay5" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay5->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay5" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay5" name="x_StimulationDay5" id="x_StimulationDay5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay6->Visible) { // StimulationDay6 ?>
	<div id="r_StimulationDay6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay6" for="x_StimulationDay6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay6" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay6->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay6" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay6" name="x_StimulationDay6" id="x_StimulationDay6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay7->Visible) { // StimulationDay7 ?>
	<div id="r_StimulationDay7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay7" for="x_StimulationDay7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay7" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay7->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay7" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay7" name="x_StimulationDay7" id="x_StimulationDay7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay8->Visible) { // StimulationDay8 ?>
	<div id="r_StimulationDay8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay8" for="x_StimulationDay8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay8" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay8->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay8" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay8" name="x_StimulationDay8" id="x_StimulationDay8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay9->Visible) { // StimulationDay9 ?>
	<div id="r_StimulationDay9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay9" for="x_StimulationDay9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay9" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay9->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay9" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay9" name="x_StimulationDay9" id="x_StimulationDay9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay10->Visible) { // StimulationDay10 ?>
	<div id="r_StimulationDay10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay10" for="x_StimulationDay10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay10" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay10->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay10" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay10" name="x_StimulationDay10" id="x_StimulationDay10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay11->Visible) { // StimulationDay11 ?>
	<div id="r_StimulationDay11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay11" for="x_StimulationDay11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay11" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay11->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay11" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay11" name="x_StimulationDay11" id="x_StimulationDay11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay12->Visible) { // StimulationDay12 ?>
	<div id="r_StimulationDay12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay12" for="x_StimulationDay12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay12" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay12->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay12" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay12" name="x_StimulationDay12" id="x_StimulationDay12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay13->Visible) { // StimulationDay13 ?>
	<div id="r_StimulationDay13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay13" for="x_StimulationDay13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay13" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay13->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay13" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay13" name="x_StimulationDay13" id="x_StimulationDay13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet1->Visible) { // Tablet1 ?>
	<div id="r_Tablet1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet1" for="x_Tablet1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet1" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet1->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet1" type="text/html"><span id="el_ivf_stimulation_chart_Tablet1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet1" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet1->displayValueSeparatorAttribute() ?>" id="x_Tablet1" name="x_Tablet1"<?php echo $ivf_stimulation_chart_add->Tablet1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet1->selectOptionListHtml("x_Tablet1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_tablet") && !$ivf_stimulation_chart_add->Tablet1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Tablet1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->Tablet1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->Tablet1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Tablet1',url:'ivf_stimulation_tabletaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet1->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet2->Visible) { // Tablet2 ?>
	<div id="r_Tablet2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet2" for="x_Tablet2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet2" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet2->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet2" type="text/html"><span id="el_ivf_stimulation_chart_Tablet2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet2" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet2->displayValueSeparatorAttribute() ?>" id="x_Tablet2" name="x_Tablet2"<?php echo $ivf_stimulation_chart_add->Tablet2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet2->selectOptionListHtml("x_Tablet2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet2->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet3->Visible) { // Tablet3 ?>
	<div id="r_Tablet3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet3" for="x_Tablet3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet3" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet3->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet3" type="text/html"><span id="el_ivf_stimulation_chart_Tablet3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet3" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet3->displayValueSeparatorAttribute() ?>" id="x_Tablet3" name="x_Tablet3"<?php echo $ivf_stimulation_chart_add->Tablet3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet3->selectOptionListHtml("x_Tablet3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet3->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet4->Visible) { // Tablet4 ?>
	<div id="r_Tablet4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet4" for="x_Tablet4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet4" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet4->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet4" type="text/html"><span id="el_ivf_stimulation_chart_Tablet4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet4" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet4->displayValueSeparatorAttribute() ?>" id="x_Tablet4" name="x_Tablet4"<?php echo $ivf_stimulation_chart_add->Tablet4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet4->selectOptionListHtml("x_Tablet4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet4->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet5->Visible) { // Tablet5 ?>
	<div id="r_Tablet5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet5" for="x_Tablet5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet5" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet5->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet5" type="text/html"><span id="el_ivf_stimulation_chart_Tablet5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet5" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet5->displayValueSeparatorAttribute() ?>" id="x_Tablet5" name="x_Tablet5"<?php echo $ivf_stimulation_chart_add->Tablet5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet5->selectOptionListHtml("x_Tablet5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet5->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet6->Visible) { // Tablet6 ?>
	<div id="r_Tablet6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet6" for="x_Tablet6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet6" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet6->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet6" type="text/html"><span id="el_ivf_stimulation_chart_Tablet6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet6" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet6->displayValueSeparatorAttribute() ?>" id="x_Tablet6" name="x_Tablet6"<?php echo $ivf_stimulation_chart_add->Tablet6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet6->selectOptionListHtml("x_Tablet6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet6->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet7->Visible) { // Tablet7 ?>
	<div id="r_Tablet7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet7" for="x_Tablet7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet7" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet7->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet7" type="text/html"><span id="el_ivf_stimulation_chart_Tablet7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet7" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet7->displayValueSeparatorAttribute() ?>" id="x_Tablet7" name="x_Tablet7"<?php echo $ivf_stimulation_chart_add->Tablet7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet7->selectOptionListHtml("x_Tablet7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet7->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet8->Visible) { // Tablet8 ?>
	<div id="r_Tablet8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet8" for="x_Tablet8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet8" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet8->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet8" type="text/html"><span id="el_ivf_stimulation_chart_Tablet8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet8" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet8->displayValueSeparatorAttribute() ?>" id="x_Tablet8" name="x_Tablet8"<?php echo $ivf_stimulation_chart_add->Tablet8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet8->selectOptionListHtml("x_Tablet8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet8->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet9->Visible) { // Tablet9 ?>
	<div id="r_Tablet9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet9" for="x_Tablet9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet9" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet9->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet9" type="text/html"><span id="el_ivf_stimulation_chart_Tablet9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet9" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet9->displayValueSeparatorAttribute() ?>" id="x_Tablet9" name="x_Tablet9"<?php echo $ivf_stimulation_chart_add->Tablet9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet9->selectOptionListHtml("x_Tablet9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet9->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet10->Visible) { // Tablet10 ?>
	<div id="r_Tablet10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet10" for="x_Tablet10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet10" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet10->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet10" type="text/html"><span id="el_ivf_stimulation_chart_Tablet10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet10" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet10->displayValueSeparatorAttribute() ?>" id="x_Tablet10" name="x_Tablet10"<?php echo $ivf_stimulation_chart_add->Tablet10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet10->selectOptionListHtml("x_Tablet10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet10->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet11->Visible) { // Tablet11 ?>
	<div id="r_Tablet11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet11" for="x_Tablet11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet11" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet11->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet11" type="text/html"><span id="el_ivf_stimulation_chart_Tablet11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet11" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet11->displayValueSeparatorAttribute() ?>" id="x_Tablet11" name="x_Tablet11"<?php echo $ivf_stimulation_chart_add->Tablet11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet11->selectOptionListHtml("x_Tablet11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet11->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet12->Visible) { // Tablet12 ?>
	<div id="r_Tablet12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet12" for="x_Tablet12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet12" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet12->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet12" type="text/html"><span id="el_ivf_stimulation_chart_Tablet12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet12" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet12->displayValueSeparatorAttribute() ?>" id="x_Tablet12" name="x_Tablet12"<?php echo $ivf_stimulation_chart_add->Tablet12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet12->selectOptionListHtml("x_Tablet12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet12->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet13->Visible) { // Tablet13 ?>
	<div id="r_Tablet13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet13" for="x_Tablet13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet13" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet13->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet13" type="text/html"><span id="el_ivf_stimulation_chart_Tablet13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet13" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet13->displayValueSeparatorAttribute() ?>" id="x_Tablet13" name="x_Tablet13"<?php echo $ivf_stimulation_chart_add->Tablet13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet13->selectOptionListHtml("x_Tablet13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet13->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH1->Visible) { // RFSH1 ?>
	<div id="r_RFSH1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH1" for="x_RFSH1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH1" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH1->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH1" type="text/html"><span id="el_ivf_stimulation_chart_RFSH1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH1" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH1->displayValueSeparatorAttribute() ?>" id="x_RFSH1" name="x_RFSH1"<?php echo $ivf_stimulation_chart_add->RFSH1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH1->selectOptionListHtml("x_RFSH1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_rfsh") && !$ivf_stimulation_chart_add->RFSH1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RFSH1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->RFSH1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->RFSH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RFSH1',url:'ivf_stimulation_rfshaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH1->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH2->Visible) { // RFSH2 ?>
	<div id="r_RFSH2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH2" for="x_RFSH2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH2" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH2->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH2" type="text/html"><span id="el_ivf_stimulation_chart_RFSH2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH2" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH2->displayValueSeparatorAttribute() ?>" id="x_RFSH2" name="x_RFSH2"<?php echo $ivf_stimulation_chart_add->RFSH2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH2->selectOptionListHtml("x_RFSH2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH2->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH3->Visible) { // RFSH3 ?>
	<div id="r_RFSH3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH3" for="x_RFSH3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH3" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH3->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH3" type="text/html"><span id="el_ivf_stimulation_chart_RFSH3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH3" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH3->displayValueSeparatorAttribute() ?>" id="x_RFSH3" name="x_RFSH3"<?php echo $ivf_stimulation_chart_add->RFSH3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH3->selectOptionListHtml("x_RFSH3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH3->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH4->Visible) { // RFSH4 ?>
	<div id="r_RFSH4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH4" for="x_RFSH4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH4" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH4->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH4" type="text/html"><span id="el_ivf_stimulation_chart_RFSH4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH4" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH4->displayValueSeparatorAttribute() ?>" id="x_RFSH4" name="x_RFSH4"<?php echo $ivf_stimulation_chart_add->RFSH4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH4->selectOptionListHtml("x_RFSH4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH4->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH5->Visible) { // RFSH5 ?>
	<div id="r_RFSH5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH5" for="x_RFSH5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH5" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH5->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH5" type="text/html"><span id="el_ivf_stimulation_chart_RFSH5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH5" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH5->displayValueSeparatorAttribute() ?>" id="x_RFSH5" name="x_RFSH5"<?php echo $ivf_stimulation_chart_add->RFSH5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH5->selectOptionListHtml("x_RFSH5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH5->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH6->Visible) { // RFSH6 ?>
	<div id="r_RFSH6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH6" for="x_RFSH6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH6" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH6->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH6" type="text/html"><span id="el_ivf_stimulation_chart_RFSH6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH6" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH6->displayValueSeparatorAttribute() ?>" id="x_RFSH6" name="x_RFSH6"<?php echo $ivf_stimulation_chart_add->RFSH6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH6->selectOptionListHtml("x_RFSH6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH6->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH7->Visible) { // RFSH7 ?>
	<div id="r_RFSH7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH7" for="x_RFSH7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH7" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH7->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH7" type="text/html"><span id="el_ivf_stimulation_chart_RFSH7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH7" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH7->displayValueSeparatorAttribute() ?>" id="x_RFSH7" name="x_RFSH7"<?php echo $ivf_stimulation_chart_add->RFSH7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH7->selectOptionListHtml("x_RFSH7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH7->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH8->Visible) { // RFSH8 ?>
	<div id="r_RFSH8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH8" for="x_RFSH8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH8" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH8->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH8" type="text/html"><span id="el_ivf_stimulation_chart_RFSH8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH8" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH8->displayValueSeparatorAttribute() ?>" id="x_RFSH8" name="x_RFSH8"<?php echo $ivf_stimulation_chart_add->RFSH8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH8->selectOptionListHtml("x_RFSH8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH8->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH9->Visible) { // RFSH9 ?>
	<div id="r_RFSH9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH9" for="x_RFSH9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH9" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH9->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH9" type="text/html"><span id="el_ivf_stimulation_chart_RFSH9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH9" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH9->displayValueSeparatorAttribute() ?>" id="x_RFSH9" name="x_RFSH9"<?php echo $ivf_stimulation_chart_add->RFSH9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH9->selectOptionListHtml("x_RFSH9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH9->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH10->Visible) { // RFSH10 ?>
	<div id="r_RFSH10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH10" for="x_RFSH10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH10" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH10->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH10" type="text/html"><span id="el_ivf_stimulation_chart_RFSH10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH10" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH10->displayValueSeparatorAttribute() ?>" id="x_RFSH10" name="x_RFSH10"<?php echo $ivf_stimulation_chart_add->RFSH10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH10->selectOptionListHtml("x_RFSH10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH10->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH11->Visible) { // RFSH11 ?>
	<div id="r_RFSH11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH11" for="x_RFSH11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH11" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH11->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH11" type="text/html"><span id="el_ivf_stimulation_chart_RFSH11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH11" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH11->displayValueSeparatorAttribute() ?>" id="x_RFSH11" name="x_RFSH11"<?php echo $ivf_stimulation_chart_add->RFSH11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH11->selectOptionListHtml("x_RFSH11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH11->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH12->Visible) { // RFSH12 ?>
	<div id="r_RFSH12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH12" for="x_RFSH12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH12" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH12->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH12" type="text/html"><span id="el_ivf_stimulation_chart_RFSH12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH12" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH12->displayValueSeparatorAttribute() ?>" id="x_RFSH12" name="x_RFSH12"<?php echo $ivf_stimulation_chart_add->RFSH12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH12->selectOptionListHtml("x_RFSH12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH12->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH13->Visible) { // RFSH13 ?>
	<div id="r_RFSH13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH13" for="x_RFSH13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH13" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH13->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH13" type="text/html"><span id="el_ivf_stimulation_chart_RFSH13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH13" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH13->displayValueSeparatorAttribute() ?>" id="x_RFSH13" name="x_RFSH13"<?php echo $ivf_stimulation_chart_add->RFSH13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH13->selectOptionListHtml("x_RFSH13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH13->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG1->Visible) { // HMG1 ?>
	<div id="r_HMG1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG1" for="x_HMG1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG1" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG1->caption() ?><?php echo $ivf_stimulation_chart_add->HMG1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG1" type="text/html"><span id="el_ivf_stimulation_chart_HMG1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG1" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG1->displayValueSeparatorAttribute() ?>" id="x_HMG1" name="x_HMG1"<?php echo $ivf_stimulation_chart_add->HMG1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG1->selectOptionListHtml("x_HMG1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_hmg") && !$ivf_stimulation_chart_add->HMG1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_HMG1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->HMG1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->HMG1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_HMG1',url:'ivf_stimulation_hmgaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->HMG1->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG2->Visible) { // HMG2 ?>
	<div id="r_HMG2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG2" for="x_HMG2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG2" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG2->caption() ?><?php echo $ivf_stimulation_chart_add->HMG2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG2" type="text/html"><span id="el_ivf_stimulation_chart_HMG2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG2" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG2->displayValueSeparatorAttribute() ?>" id="x_HMG2" name="x_HMG2"<?php echo $ivf_stimulation_chart_add->HMG2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG2->selectOptionListHtml("x_HMG2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG2->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG3->Visible) { // HMG3 ?>
	<div id="r_HMG3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG3" for="x_HMG3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG3" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG3->caption() ?><?php echo $ivf_stimulation_chart_add->HMG3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG3" type="text/html"><span id="el_ivf_stimulation_chart_HMG3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG3" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG3->displayValueSeparatorAttribute() ?>" id="x_HMG3" name="x_HMG3"<?php echo $ivf_stimulation_chart_add->HMG3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG3->selectOptionListHtml("x_HMG3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG3->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG4->Visible) { // HMG4 ?>
	<div id="r_HMG4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG4" for="x_HMG4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG4" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG4->caption() ?><?php echo $ivf_stimulation_chart_add->HMG4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG4" type="text/html"><span id="el_ivf_stimulation_chart_HMG4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG4" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG4->displayValueSeparatorAttribute() ?>" id="x_HMG4" name="x_HMG4"<?php echo $ivf_stimulation_chart_add->HMG4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG4->selectOptionListHtml("x_HMG4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG4->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG5->Visible) { // HMG5 ?>
	<div id="r_HMG5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG5" for="x_HMG5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG5" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG5->caption() ?><?php echo $ivf_stimulation_chart_add->HMG5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG5" type="text/html"><span id="el_ivf_stimulation_chart_HMG5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG5" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG5->displayValueSeparatorAttribute() ?>" id="x_HMG5" name="x_HMG5"<?php echo $ivf_stimulation_chart_add->HMG5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG5->selectOptionListHtml("x_HMG5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG5->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG6->Visible) { // HMG6 ?>
	<div id="r_HMG6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG6" for="x_HMG6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG6" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG6->caption() ?><?php echo $ivf_stimulation_chart_add->HMG6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG6" type="text/html"><span id="el_ivf_stimulation_chart_HMG6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG6" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG6->displayValueSeparatorAttribute() ?>" id="x_HMG6" name="x_HMG6"<?php echo $ivf_stimulation_chart_add->HMG6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG6->selectOptionListHtml("x_HMG6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG6->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG7->Visible) { // HMG7 ?>
	<div id="r_HMG7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG7" for="x_HMG7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG7" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG7->caption() ?><?php echo $ivf_stimulation_chart_add->HMG7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG7" type="text/html"><span id="el_ivf_stimulation_chart_HMG7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG7" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG7->displayValueSeparatorAttribute() ?>" id="x_HMG7" name="x_HMG7"<?php echo $ivf_stimulation_chart_add->HMG7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG7->selectOptionListHtml("x_HMG7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG7->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG8->Visible) { // HMG8 ?>
	<div id="r_HMG8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG8" for="x_HMG8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG8" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG8->caption() ?><?php echo $ivf_stimulation_chart_add->HMG8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG8" type="text/html"><span id="el_ivf_stimulation_chart_HMG8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG8" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG8->displayValueSeparatorAttribute() ?>" id="x_HMG8" name="x_HMG8"<?php echo $ivf_stimulation_chart_add->HMG8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG8->selectOptionListHtml("x_HMG8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG8->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG9->Visible) { // HMG9 ?>
	<div id="r_HMG9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG9" for="x_HMG9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG9" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG9->caption() ?><?php echo $ivf_stimulation_chart_add->HMG9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG9" type="text/html"><span id="el_ivf_stimulation_chart_HMG9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG9" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG9->displayValueSeparatorAttribute() ?>" id="x_HMG9" name="x_HMG9"<?php echo $ivf_stimulation_chart_add->HMG9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG9->selectOptionListHtml("x_HMG9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG9->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG10->Visible) { // HMG10 ?>
	<div id="r_HMG10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG10" for="x_HMG10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG10" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG10->caption() ?><?php echo $ivf_stimulation_chart_add->HMG10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG10" type="text/html"><span id="el_ivf_stimulation_chart_HMG10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG10" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG10->displayValueSeparatorAttribute() ?>" id="x_HMG10" name="x_HMG10"<?php echo $ivf_stimulation_chart_add->HMG10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG10->selectOptionListHtml("x_HMG10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG10->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG11->Visible) { // HMG11 ?>
	<div id="r_HMG11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG11" for="x_HMG11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG11" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG11->caption() ?><?php echo $ivf_stimulation_chart_add->HMG11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG11" type="text/html"><span id="el_ivf_stimulation_chart_HMG11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG11" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG11->displayValueSeparatorAttribute() ?>" id="x_HMG11" name="x_HMG11"<?php echo $ivf_stimulation_chart_add->HMG11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG11->selectOptionListHtml("x_HMG11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG11->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG12->Visible) { // HMG12 ?>
	<div id="r_HMG12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG12" for="x_HMG12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG12" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG12->caption() ?><?php echo $ivf_stimulation_chart_add->HMG12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG12" type="text/html"><span id="el_ivf_stimulation_chart_HMG12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG12" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG12->displayValueSeparatorAttribute() ?>" id="x_HMG12" name="x_HMG12"<?php echo $ivf_stimulation_chart_add->HMG12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG12->selectOptionListHtml("x_HMG12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG12->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG13->Visible) { // HMG13 ?>
	<div id="r_HMG13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG13" for="x_HMG13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG13" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG13->caption() ?><?php echo $ivf_stimulation_chart_add->HMG13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG13" type="text/html"><span id="el_ivf_stimulation_chart_HMG13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG13" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG13->displayValueSeparatorAttribute() ?>" id="x_HMG13" name="x_HMG13"<?php echo $ivf_stimulation_chart_add->HMG13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG13->selectOptionListHtml("x_HMG13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG13->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH1->Visible) { // GnRH1 ?>
	<div id="r_GnRH1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH1" for="x_GnRH1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH1" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH1->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH1" type="text/html"><span id="el_ivf_stimulation_chart_GnRH1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH1" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH1->displayValueSeparatorAttribute() ?>" id="x_GnRH1" name="x_GnRH1"<?php echo $ivf_stimulation_chart_add->GnRH1->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH1->selectOptionListHtml("x_GnRH1") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_stimulation_gnrh") && !$ivf_stimulation_chart_add->GnRH1->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_GnRH1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_stimulation_chart_add->GnRH1->caption() ?>" data-title="<?php echo $ivf_stimulation_chart_add->GnRH1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_GnRH1',url:'ivf_stimulation_gnrhaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH1->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH1") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH2->Visible) { // GnRH2 ?>
	<div id="r_GnRH2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH2" for="x_GnRH2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH2" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH2->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH2" type="text/html"><span id="el_ivf_stimulation_chart_GnRH2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH2" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH2->displayValueSeparatorAttribute() ?>" id="x_GnRH2" name="x_GnRH2"<?php echo $ivf_stimulation_chart_add->GnRH2->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH2->selectOptionListHtml("x_GnRH2") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH2->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH2") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH3->Visible) { // GnRH3 ?>
	<div id="r_GnRH3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH3" for="x_GnRH3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH3" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH3->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH3" type="text/html"><span id="el_ivf_stimulation_chart_GnRH3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH3" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH3->displayValueSeparatorAttribute() ?>" id="x_GnRH3" name="x_GnRH3"<?php echo $ivf_stimulation_chart_add->GnRH3->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH3->selectOptionListHtml("x_GnRH3") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH3->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH3") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH4->Visible) { // GnRH4 ?>
	<div id="r_GnRH4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH4" for="x_GnRH4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH4" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH4->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH4" type="text/html"><span id="el_ivf_stimulation_chart_GnRH4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH4" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH4->displayValueSeparatorAttribute() ?>" id="x_GnRH4" name="x_GnRH4"<?php echo $ivf_stimulation_chart_add->GnRH4->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH4->selectOptionListHtml("x_GnRH4") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH4->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH4") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH5->Visible) { // GnRH5 ?>
	<div id="r_GnRH5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH5" for="x_GnRH5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH5" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH5->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH5" type="text/html"><span id="el_ivf_stimulation_chart_GnRH5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH5" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH5->displayValueSeparatorAttribute() ?>" id="x_GnRH5" name="x_GnRH5"<?php echo $ivf_stimulation_chart_add->GnRH5->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH5->selectOptionListHtml("x_GnRH5") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH5->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH5") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH6->Visible) { // GnRH6 ?>
	<div id="r_GnRH6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH6" for="x_GnRH6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH6" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH6->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH6" type="text/html"><span id="el_ivf_stimulation_chart_GnRH6">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH6" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH6->displayValueSeparatorAttribute() ?>" id="x_GnRH6" name="x_GnRH6"<?php echo $ivf_stimulation_chart_add->GnRH6->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH6->selectOptionListHtml("x_GnRH6") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH6->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH6") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH7->Visible) { // GnRH7 ?>
	<div id="r_GnRH7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH7" for="x_GnRH7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH7" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH7->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH7" type="text/html"><span id="el_ivf_stimulation_chart_GnRH7">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH7" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH7->displayValueSeparatorAttribute() ?>" id="x_GnRH7" name="x_GnRH7"<?php echo $ivf_stimulation_chart_add->GnRH7->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH7->selectOptionListHtml("x_GnRH7") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH7->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH7") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH8->Visible) { // GnRH8 ?>
	<div id="r_GnRH8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH8" for="x_GnRH8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH8" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH8->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH8" type="text/html"><span id="el_ivf_stimulation_chart_GnRH8">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH8" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH8->displayValueSeparatorAttribute() ?>" id="x_GnRH8" name="x_GnRH8"<?php echo $ivf_stimulation_chart_add->GnRH8->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH8->selectOptionListHtml("x_GnRH8") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH8->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH8") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH9->Visible) { // GnRH9 ?>
	<div id="r_GnRH9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH9" for="x_GnRH9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH9" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH9->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH9" type="text/html"><span id="el_ivf_stimulation_chart_GnRH9">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH9" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH9->displayValueSeparatorAttribute() ?>" id="x_GnRH9" name="x_GnRH9"<?php echo $ivf_stimulation_chart_add->GnRH9->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH9->selectOptionListHtml("x_GnRH9") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH9->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH9") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH10->Visible) { // GnRH10 ?>
	<div id="r_GnRH10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH10" for="x_GnRH10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH10" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH10->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH10" type="text/html"><span id="el_ivf_stimulation_chart_GnRH10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH10" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH10->displayValueSeparatorAttribute() ?>" id="x_GnRH10" name="x_GnRH10"<?php echo $ivf_stimulation_chart_add->GnRH10->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH10->selectOptionListHtml("x_GnRH10") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH10->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH10") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH11->Visible) { // GnRH11 ?>
	<div id="r_GnRH11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH11" for="x_GnRH11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH11" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH11->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH11" type="text/html"><span id="el_ivf_stimulation_chart_GnRH11">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH11" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH11->displayValueSeparatorAttribute() ?>" id="x_GnRH11" name="x_GnRH11"<?php echo $ivf_stimulation_chart_add->GnRH11->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH11->selectOptionListHtml("x_GnRH11") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH11->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH11") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH12->Visible) { // GnRH12 ?>
	<div id="r_GnRH12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH12" for="x_GnRH12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH12" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH12->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH12" type="text/html"><span id="el_ivf_stimulation_chart_GnRH12">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH12" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH12->displayValueSeparatorAttribute() ?>" id="x_GnRH12" name="x_GnRH12"<?php echo $ivf_stimulation_chart_add->GnRH12->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH12->selectOptionListHtml("x_GnRH12") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH12->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH12") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH13->Visible) { // GnRH13 ?>
	<div id="r_GnRH13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH13" for="x_GnRH13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH13" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH13->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH13" type="text/html"><span id="el_ivf_stimulation_chart_GnRH13">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH13" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH13->displayValueSeparatorAttribute() ?>" id="x_GnRH13" name="x_GnRH13"<?php echo $ivf_stimulation_chart_add->GnRH13->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH13->selectOptionListHtml("x_GnRH13") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH13->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH13") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E21->Visible) { // E21 ?>
	<div id="r_E21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E21" for="x_E21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E21" type="text/html"><?php echo $ivf_stimulation_chart_add->E21->caption() ?><?php echo $ivf_stimulation_chart_add->E21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E21" type="text/html"><span id="el_ivf_stimulation_chart_E21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E21" name="x_E21" id="x_E21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E22->Visible) { // E22 ?>
	<div id="r_E22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E22" for="x_E22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E22" type="text/html"><?php echo $ivf_stimulation_chart_add->E22->caption() ?><?php echo $ivf_stimulation_chart_add->E22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E22" type="text/html"><span id="el_ivf_stimulation_chart_E22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E22" name="x_E22" id="x_E22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E23->Visible) { // E23 ?>
	<div id="r_E23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E23" for="x_E23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E23" type="text/html"><?php echo $ivf_stimulation_chart_add->E23->caption() ?><?php echo $ivf_stimulation_chart_add->E23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E23" type="text/html"><span id="el_ivf_stimulation_chart_E23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E23" name="x_E23" id="x_E23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E24->Visible) { // E24 ?>
	<div id="r_E24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E24" for="x_E24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E24" type="text/html"><?php echo $ivf_stimulation_chart_add->E24->caption() ?><?php echo $ivf_stimulation_chart_add->E24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E24" type="text/html"><span id="el_ivf_stimulation_chart_E24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E24" name="x_E24" id="x_E24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E25->Visible) { // E25 ?>
	<div id="r_E25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E25" for="x_E25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E25" type="text/html"><?php echo $ivf_stimulation_chart_add->E25->caption() ?><?php echo $ivf_stimulation_chart_add->E25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E25" type="text/html"><span id="el_ivf_stimulation_chart_E25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E25" name="x_E25" id="x_E25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E26->Visible) { // E26 ?>
	<div id="r_E26" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E26" for="x_E26" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E26" type="text/html"><?php echo $ivf_stimulation_chart_add->E26->caption() ?><?php echo $ivf_stimulation_chart_add->E26->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E26->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E26" type="text/html"><span id="el_ivf_stimulation_chart_E26">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E26" name="x_E26" id="x_E26" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E26->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E26->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E26->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E26->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E27->Visible) { // E27 ?>
	<div id="r_E27" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E27" for="x_E27" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E27" type="text/html"><?php echo $ivf_stimulation_chart_add->E27->caption() ?><?php echo $ivf_stimulation_chart_add->E27->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E27->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E27" type="text/html"><span id="el_ivf_stimulation_chart_E27">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E27" name="x_E27" id="x_E27" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E27->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E27->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E27->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E27->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E28->Visible) { // E28 ?>
	<div id="r_E28" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E28" for="x_E28" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E28" type="text/html"><?php echo $ivf_stimulation_chart_add->E28->caption() ?><?php echo $ivf_stimulation_chart_add->E28->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E28->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E28" type="text/html"><span id="el_ivf_stimulation_chart_E28">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E28" name="x_E28" id="x_E28" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E28->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E28->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E28->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E28->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E29->Visible) { // E29 ?>
	<div id="r_E29" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E29" for="x_E29" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E29" type="text/html"><?php echo $ivf_stimulation_chart_add->E29->caption() ?><?php echo $ivf_stimulation_chart_add->E29->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E29->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E29" type="text/html"><span id="el_ivf_stimulation_chart_E29">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E29" name="x_E29" id="x_E29" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E29->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E29->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E29->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E29->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E210->Visible) { // E210 ?>
	<div id="r_E210" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E210" for="x_E210" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E210" type="text/html"><?php echo $ivf_stimulation_chart_add->E210->caption() ?><?php echo $ivf_stimulation_chart_add->E210->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E210->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E210" type="text/html"><span id="el_ivf_stimulation_chart_E210">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E210" name="x_E210" id="x_E210" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E210->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E210->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E210->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E210->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E211->Visible) { // E211 ?>
	<div id="r_E211" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E211" for="x_E211" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E211" type="text/html"><?php echo $ivf_stimulation_chart_add->E211->caption() ?><?php echo $ivf_stimulation_chart_add->E211->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E211->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E211" type="text/html"><span id="el_ivf_stimulation_chart_E211">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E211" name="x_E211" id="x_E211" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E211->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E211->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E211->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E211->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E212->Visible) { // E212 ?>
	<div id="r_E212" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E212" for="x_E212" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E212" type="text/html"><?php echo $ivf_stimulation_chart_add->E212->caption() ?><?php echo $ivf_stimulation_chart_add->E212->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E212->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E212" type="text/html"><span id="el_ivf_stimulation_chart_E212">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E212" name="x_E212" id="x_E212" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E212->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E212->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E212->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E212->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E213->Visible) { // E213 ?>
	<div id="r_E213" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E213" for="x_E213" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E213" type="text/html"><?php echo $ivf_stimulation_chart_add->E213->caption() ?><?php echo $ivf_stimulation_chart_add->E213->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E213->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E213" type="text/html"><span id="el_ivf_stimulation_chart_E213">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E213" name="x_E213" id="x_E213" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E213->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E213->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E213->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E213->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P41->Visible) { // P41 ?>
	<div id="r_P41" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P41" for="x_P41" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P41" type="text/html"><?php echo $ivf_stimulation_chart_add->P41->caption() ?><?php echo $ivf_stimulation_chart_add->P41->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P41->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P41" type="text/html"><span id="el_ivf_stimulation_chart_P41">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P41" name="x_P41" id="x_P41" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P41->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P41->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P41->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P41->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P42->Visible) { // P42 ?>
	<div id="r_P42" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P42" for="x_P42" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P42" type="text/html"><?php echo $ivf_stimulation_chart_add->P42->caption() ?><?php echo $ivf_stimulation_chart_add->P42->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P42->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P42" type="text/html"><span id="el_ivf_stimulation_chart_P42">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P42" name="x_P42" id="x_P42" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P42->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P42->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P42->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P42->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P43->Visible) { // P43 ?>
	<div id="r_P43" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P43" for="x_P43" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P43" type="text/html"><?php echo $ivf_stimulation_chart_add->P43->caption() ?><?php echo $ivf_stimulation_chart_add->P43->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P43->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P43" type="text/html"><span id="el_ivf_stimulation_chart_P43">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P43" name="x_P43" id="x_P43" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P43->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P43->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P43->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P43->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P44->Visible) { // P44 ?>
	<div id="r_P44" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P44" for="x_P44" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P44" type="text/html"><?php echo $ivf_stimulation_chart_add->P44->caption() ?><?php echo $ivf_stimulation_chart_add->P44->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P44->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P44" type="text/html"><span id="el_ivf_stimulation_chart_P44">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P44" name="x_P44" id="x_P44" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P44->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P44->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P44->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P44->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P45->Visible) { // P45 ?>
	<div id="r_P45" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P45" for="x_P45" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P45" type="text/html"><?php echo $ivf_stimulation_chart_add->P45->caption() ?><?php echo $ivf_stimulation_chart_add->P45->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P45->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P45" type="text/html"><span id="el_ivf_stimulation_chart_P45">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P45" name="x_P45" id="x_P45" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P45->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P45->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P45->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P45->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P46->Visible) { // P46 ?>
	<div id="r_P46" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P46" for="x_P46" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P46" type="text/html"><?php echo $ivf_stimulation_chart_add->P46->caption() ?><?php echo $ivf_stimulation_chart_add->P46->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P46->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P46" type="text/html"><span id="el_ivf_stimulation_chart_P46">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P46" name="x_P46" id="x_P46" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P46->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P46->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P46->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P46->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P47->Visible) { // P47 ?>
	<div id="r_P47" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P47" for="x_P47" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P47" type="text/html"><?php echo $ivf_stimulation_chart_add->P47->caption() ?><?php echo $ivf_stimulation_chart_add->P47->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P47->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P47" type="text/html"><span id="el_ivf_stimulation_chart_P47">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P47" name="x_P47" id="x_P47" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P47->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P47->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P47->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P47->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P48->Visible) { // P48 ?>
	<div id="r_P48" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P48" for="x_P48" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P48" type="text/html"><?php echo $ivf_stimulation_chart_add->P48->caption() ?><?php echo $ivf_stimulation_chart_add->P48->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P48->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P48" type="text/html"><span id="el_ivf_stimulation_chart_P48">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P48" name="x_P48" id="x_P48" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P48->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P48->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P48->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P48->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P49->Visible) { // P49 ?>
	<div id="r_P49" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P49" for="x_P49" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P49" type="text/html"><?php echo $ivf_stimulation_chart_add->P49->caption() ?><?php echo $ivf_stimulation_chart_add->P49->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P49->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P49" type="text/html"><span id="el_ivf_stimulation_chart_P49">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P49" name="x_P49" id="x_P49" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P49->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P49->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P49->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P49->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P410->Visible) { // P410 ?>
	<div id="r_P410" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P410" for="x_P410" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P410" type="text/html"><?php echo $ivf_stimulation_chart_add->P410->caption() ?><?php echo $ivf_stimulation_chart_add->P410->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P410->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P410" type="text/html"><span id="el_ivf_stimulation_chart_P410">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P410" name="x_P410" id="x_P410" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P410->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P410->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P410->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P410->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P411->Visible) { // P411 ?>
	<div id="r_P411" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P411" for="x_P411" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P411" type="text/html"><?php echo $ivf_stimulation_chart_add->P411->caption() ?><?php echo $ivf_stimulation_chart_add->P411->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P411->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P411" type="text/html"><span id="el_ivf_stimulation_chart_P411">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P411" name="x_P411" id="x_P411" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P411->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P411->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P411->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P411->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P412->Visible) { // P412 ?>
	<div id="r_P412" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P412" for="x_P412" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P412" type="text/html"><?php echo $ivf_stimulation_chart_add->P412->caption() ?><?php echo $ivf_stimulation_chart_add->P412->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P412->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P412" type="text/html"><span id="el_ivf_stimulation_chart_P412">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P412" name="x_P412" id="x_P412" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P412->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P412->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P412->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P412->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P413->Visible) { // P413 ?>
	<div id="r_P413" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P413" for="x_P413" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P413" type="text/html"><?php echo $ivf_stimulation_chart_add->P413->caption() ?><?php echo $ivf_stimulation_chart_add->P413->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P413->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P413" type="text/html"><span id="el_ivf_stimulation_chart_P413">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P413" name="x_P413" id="x_P413" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P413->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P413->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P413->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P413->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt1->Visible) { // USGRt1 ?>
	<div id="r_USGRt1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt1" for="x_USGRt1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt1" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt1->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt1" type="text/html"><span id="el_ivf_stimulation_chart_USGRt1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt1" name="x_USGRt1" id="x_USGRt1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt2->Visible) { // USGRt2 ?>
	<div id="r_USGRt2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt2" for="x_USGRt2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt2" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt2->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt2" type="text/html"><span id="el_ivf_stimulation_chart_USGRt2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt2" name="x_USGRt2" id="x_USGRt2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt3->Visible) { // USGRt3 ?>
	<div id="r_USGRt3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt3" for="x_USGRt3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt3" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt3->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt3" type="text/html"><span id="el_ivf_stimulation_chart_USGRt3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt3" name="x_USGRt3" id="x_USGRt3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt4->Visible) { // USGRt4 ?>
	<div id="r_USGRt4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt4" for="x_USGRt4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt4" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt4->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt4" type="text/html"><span id="el_ivf_stimulation_chart_USGRt4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt4" name="x_USGRt4" id="x_USGRt4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt5->Visible) { // USGRt5 ?>
	<div id="r_USGRt5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt5" for="x_USGRt5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt5" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt5->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt5" type="text/html"><span id="el_ivf_stimulation_chart_USGRt5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt5" name="x_USGRt5" id="x_USGRt5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt6->Visible) { // USGRt6 ?>
	<div id="r_USGRt6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt6" for="x_USGRt6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt6" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt6->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt6" type="text/html"><span id="el_ivf_stimulation_chart_USGRt6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt6" name="x_USGRt6" id="x_USGRt6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt7->Visible) { // USGRt7 ?>
	<div id="r_USGRt7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt7" for="x_USGRt7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt7" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt7->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt7" type="text/html"><span id="el_ivf_stimulation_chart_USGRt7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt7" name="x_USGRt7" id="x_USGRt7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt8->Visible) { // USGRt8 ?>
	<div id="r_USGRt8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt8" for="x_USGRt8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt8" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt8->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt8" type="text/html"><span id="el_ivf_stimulation_chart_USGRt8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt8" name="x_USGRt8" id="x_USGRt8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt9->Visible) { // USGRt9 ?>
	<div id="r_USGRt9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt9" for="x_USGRt9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt9" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt9->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt9" type="text/html"><span id="el_ivf_stimulation_chart_USGRt9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt9" name="x_USGRt9" id="x_USGRt9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt10->Visible) { // USGRt10 ?>
	<div id="r_USGRt10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt10" for="x_USGRt10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt10" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt10->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt10" type="text/html"><span id="el_ivf_stimulation_chart_USGRt10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt10" name="x_USGRt10" id="x_USGRt10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt11->Visible) { // USGRt11 ?>
	<div id="r_USGRt11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt11" for="x_USGRt11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt11" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt11->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt11" type="text/html"><span id="el_ivf_stimulation_chart_USGRt11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt11" name="x_USGRt11" id="x_USGRt11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt12->Visible) { // USGRt12 ?>
	<div id="r_USGRt12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt12" for="x_USGRt12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt12" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt12->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt12" type="text/html"><span id="el_ivf_stimulation_chart_USGRt12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt12" name="x_USGRt12" id="x_USGRt12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt13->Visible) { // USGRt13 ?>
	<div id="r_USGRt13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt13" for="x_USGRt13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt13" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt13->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt13" type="text/html"><span id="el_ivf_stimulation_chart_USGRt13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt13" name="x_USGRt13" id="x_USGRt13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt1->Visible) { // USGLt1 ?>
	<div id="r_USGLt1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt1" for="x_USGLt1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt1" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt1->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt1" type="text/html"><span id="el_ivf_stimulation_chart_USGLt1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt1" name="x_USGLt1" id="x_USGLt1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt2->Visible) { // USGLt2 ?>
	<div id="r_USGLt2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt2" for="x_USGLt2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt2" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt2->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt2" type="text/html"><span id="el_ivf_stimulation_chart_USGLt2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt2" name="x_USGLt2" id="x_USGLt2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt3->Visible) { // USGLt3 ?>
	<div id="r_USGLt3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt3" for="x_USGLt3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt3" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt3->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt3" type="text/html"><span id="el_ivf_stimulation_chart_USGLt3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt3" name="x_USGLt3" id="x_USGLt3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt4->Visible) { // USGLt4 ?>
	<div id="r_USGLt4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt4" for="x_USGLt4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt4" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt4->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt4" type="text/html"><span id="el_ivf_stimulation_chart_USGLt4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt4" name="x_USGLt4" id="x_USGLt4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt5->Visible) { // USGLt5 ?>
	<div id="r_USGLt5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt5" for="x_USGLt5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt5" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt5->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt5" type="text/html"><span id="el_ivf_stimulation_chart_USGLt5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt5" name="x_USGLt5" id="x_USGLt5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt6->Visible) { // USGLt6 ?>
	<div id="r_USGLt6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt6" for="x_USGLt6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt6" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt6->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt6" type="text/html"><span id="el_ivf_stimulation_chart_USGLt6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt6" name="x_USGLt6" id="x_USGLt6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt7->Visible) { // USGLt7 ?>
	<div id="r_USGLt7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt7" for="x_USGLt7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt7" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt7->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt7" type="text/html"><span id="el_ivf_stimulation_chart_USGLt7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt7" name="x_USGLt7" id="x_USGLt7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt8->Visible) { // USGLt8 ?>
	<div id="r_USGLt8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt8" for="x_USGLt8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt8" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt8->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt8" type="text/html"><span id="el_ivf_stimulation_chart_USGLt8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt8" name="x_USGLt8" id="x_USGLt8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt9->Visible) { // USGLt9 ?>
	<div id="r_USGLt9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt9" for="x_USGLt9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt9" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt9->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt9" type="text/html"><span id="el_ivf_stimulation_chart_USGLt9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt9" name="x_USGLt9" id="x_USGLt9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt10->Visible) { // USGLt10 ?>
	<div id="r_USGLt10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt10" for="x_USGLt10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt10" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt10->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt10" type="text/html"><span id="el_ivf_stimulation_chart_USGLt10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt10" name="x_USGLt10" id="x_USGLt10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt11->Visible) { // USGLt11 ?>
	<div id="r_USGLt11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt11" for="x_USGLt11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt11" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt11->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt11" type="text/html"><span id="el_ivf_stimulation_chart_USGLt11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt11" name="x_USGLt11" id="x_USGLt11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt12->Visible) { // USGLt12 ?>
	<div id="r_USGLt12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt12" for="x_USGLt12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt12" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt12->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt12" type="text/html"><span id="el_ivf_stimulation_chart_USGLt12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt12" name="x_USGLt12" id="x_USGLt12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt13->Visible) { // USGLt13 ?>
	<div id="r_USGLt13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt13" for="x_USGLt13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt13" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt13->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt13" type="text/html"><span id="el_ivf_stimulation_chart_USGLt13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt13" name="x_USGLt13" id="x_USGLt13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM1->Visible) { // EM1 ?>
	<div id="r_EM1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM1" for="x_EM1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM1" type="text/html"><?php echo $ivf_stimulation_chart_add->EM1->caption() ?><?php echo $ivf_stimulation_chart_add->EM1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM1" type="text/html"><span id="el_ivf_stimulation_chart_EM1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM1" name="x_EM1" id="x_EM1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM2->Visible) { // EM2 ?>
	<div id="r_EM2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM2" for="x_EM2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM2" type="text/html"><?php echo $ivf_stimulation_chart_add->EM2->caption() ?><?php echo $ivf_stimulation_chart_add->EM2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM2" type="text/html"><span id="el_ivf_stimulation_chart_EM2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM2" name="x_EM2" id="x_EM2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM3->Visible) { // EM3 ?>
	<div id="r_EM3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM3" for="x_EM3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM3" type="text/html"><?php echo $ivf_stimulation_chart_add->EM3->caption() ?><?php echo $ivf_stimulation_chart_add->EM3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM3" type="text/html"><span id="el_ivf_stimulation_chart_EM3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM3" name="x_EM3" id="x_EM3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM4->Visible) { // EM4 ?>
	<div id="r_EM4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM4" for="x_EM4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM4" type="text/html"><?php echo $ivf_stimulation_chart_add->EM4->caption() ?><?php echo $ivf_stimulation_chart_add->EM4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM4" type="text/html"><span id="el_ivf_stimulation_chart_EM4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM4" name="x_EM4" id="x_EM4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM5->Visible) { // EM5 ?>
	<div id="r_EM5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM5" for="x_EM5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM5" type="text/html"><?php echo $ivf_stimulation_chart_add->EM5->caption() ?><?php echo $ivf_stimulation_chart_add->EM5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM5" type="text/html"><span id="el_ivf_stimulation_chart_EM5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM5" name="x_EM5" id="x_EM5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM6->Visible) { // EM6 ?>
	<div id="r_EM6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM6" for="x_EM6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM6" type="text/html"><?php echo $ivf_stimulation_chart_add->EM6->caption() ?><?php echo $ivf_stimulation_chart_add->EM6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM6" type="text/html"><span id="el_ivf_stimulation_chart_EM6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM6" name="x_EM6" id="x_EM6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM7->Visible) { // EM7 ?>
	<div id="r_EM7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM7" for="x_EM7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM7" type="text/html"><?php echo $ivf_stimulation_chart_add->EM7->caption() ?><?php echo $ivf_stimulation_chart_add->EM7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM7" type="text/html"><span id="el_ivf_stimulation_chart_EM7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM7" name="x_EM7" id="x_EM7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM8->Visible) { // EM8 ?>
	<div id="r_EM8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM8" for="x_EM8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM8" type="text/html"><?php echo $ivf_stimulation_chart_add->EM8->caption() ?><?php echo $ivf_stimulation_chart_add->EM8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM8" type="text/html"><span id="el_ivf_stimulation_chart_EM8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM8" name="x_EM8" id="x_EM8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM9->Visible) { // EM9 ?>
	<div id="r_EM9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM9" for="x_EM9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM9" type="text/html"><?php echo $ivf_stimulation_chart_add->EM9->caption() ?><?php echo $ivf_stimulation_chart_add->EM9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM9" type="text/html"><span id="el_ivf_stimulation_chart_EM9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM9" name="x_EM9" id="x_EM9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM10->Visible) { // EM10 ?>
	<div id="r_EM10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM10" for="x_EM10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM10" type="text/html"><?php echo $ivf_stimulation_chart_add->EM10->caption() ?><?php echo $ivf_stimulation_chart_add->EM10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM10" type="text/html"><span id="el_ivf_stimulation_chart_EM10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM10" name="x_EM10" id="x_EM10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM11->Visible) { // EM11 ?>
	<div id="r_EM11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM11" for="x_EM11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM11" type="text/html"><?php echo $ivf_stimulation_chart_add->EM11->caption() ?><?php echo $ivf_stimulation_chart_add->EM11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM11" type="text/html"><span id="el_ivf_stimulation_chart_EM11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM11" name="x_EM11" id="x_EM11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM12->Visible) { // EM12 ?>
	<div id="r_EM12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM12" for="x_EM12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM12" type="text/html"><?php echo $ivf_stimulation_chart_add->EM12->caption() ?><?php echo $ivf_stimulation_chart_add->EM12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM12" type="text/html"><span id="el_ivf_stimulation_chart_EM12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM12" name="x_EM12" id="x_EM12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM13->Visible) { // EM13 ?>
	<div id="r_EM13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM13" for="x_EM13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM13" type="text/html"><?php echo $ivf_stimulation_chart_add->EM13->caption() ?><?php echo $ivf_stimulation_chart_add->EM13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM13" type="text/html"><span id="el_ivf_stimulation_chart_EM13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM13" name="x_EM13" id="x_EM13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others1->Visible) { // Others1 ?>
	<div id="r_Others1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others1" for="x_Others1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others1" type="text/html"><?php echo $ivf_stimulation_chart_add->Others1->caption() ?><?php echo $ivf_stimulation_chart_add->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others1" type="text/html"><span id="el_ivf_stimulation_chart_Others1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others2->Visible) { // Others2 ?>
	<div id="r_Others2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others2" for="x_Others2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others2" type="text/html"><?php echo $ivf_stimulation_chart_add->Others2->caption() ?><?php echo $ivf_stimulation_chart_add->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others2" type="text/html"><span id="el_ivf_stimulation_chart_Others2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others3->Visible) { // Others3 ?>
	<div id="r_Others3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others3" for="x_Others3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others3" type="text/html"><?php echo $ivf_stimulation_chart_add->Others3->caption() ?><?php echo $ivf_stimulation_chart_add->Others3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others3" type="text/html"><span id="el_ivf_stimulation_chart_Others3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others3" name="x_Others3" id="x_Others3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others4->Visible) { // Others4 ?>
	<div id="r_Others4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others4" for="x_Others4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others4" type="text/html"><?php echo $ivf_stimulation_chart_add->Others4->caption() ?><?php echo $ivf_stimulation_chart_add->Others4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others4" type="text/html"><span id="el_ivf_stimulation_chart_Others4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others4" name="x_Others4" id="x_Others4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others5->Visible) { // Others5 ?>
	<div id="r_Others5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others5" for="x_Others5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others5" type="text/html"><?php echo $ivf_stimulation_chart_add->Others5->caption() ?><?php echo $ivf_stimulation_chart_add->Others5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others5" type="text/html"><span id="el_ivf_stimulation_chart_Others5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others5" name="x_Others5" id="x_Others5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others6->Visible) { // Others6 ?>
	<div id="r_Others6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others6" for="x_Others6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others6" type="text/html"><?php echo $ivf_stimulation_chart_add->Others6->caption() ?><?php echo $ivf_stimulation_chart_add->Others6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others6" type="text/html"><span id="el_ivf_stimulation_chart_Others6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others6" name="x_Others6" id="x_Others6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others7->Visible) { // Others7 ?>
	<div id="r_Others7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others7" for="x_Others7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others7" type="text/html"><?php echo $ivf_stimulation_chart_add->Others7->caption() ?><?php echo $ivf_stimulation_chart_add->Others7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others7" type="text/html"><span id="el_ivf_stimulation_chart_Others7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others7" name="x_Others7" id="x_Others7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others8->Visible) { // Others8 ?>
	<div id="r_Others8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others8" for="x_Others8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others8" type="text/html"><?php echo $ivf_stimulation_chart_add->Others8->caption() ?><?php echo $ivf_stimulation_chart_add->Others8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others8" type="text/html"><span id="el_ivf_stimulation_chart_Others8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others8" name="x_Others8" id="x_Others8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others9->Visible) { // Others9 ?>
	<div id="r_Others9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others9" for="x_Others9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others9" type="text/html"><?php echo $ivf_stimulation_chart_add->Others9->caption() ?><?php echo $ivf_stimulation_chart_add->Others9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others9" type="text/html"><span id="el_ivf_stimulation_chart_Others9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others9" name="x_Others9" id="x_Others9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others10->Visible) { // Others10 ?>
	<div id="r_Others10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others10" for="x_Others10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others10" type="text/html"><?php echo $ivf_stimulation_chart_add->Others10->caption() ?><?php echo $ivf_stimulation_chart_add->Others10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others10" type="text/html"><span id="el_ivf_stimulation_chart_Others10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others10" name="x_Others10" id="x_Others10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others11->Visible) { // Others11 ?>
	<div id="r_Others11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others11" for="x_Others11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others11" type="text/html"><?php echo $ivf_stimulation_chart_add->Others11->caption() ?><?php echo $ivf_stimulation_chart_add->Others11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others11" type="text/html"><span id="el_ivf_stimulation_chart_Others11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others11" name="x_Others11" id="x_Others11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others12->Visible) { // Others12 ?>
	<div id="r_Others12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others12" for="x_Others12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others12" type="text/html"><?php echo $ivf_stimulation_chart_add->Others12->caption() ?><?php echo $ivf_stimulation_chart_add->Others12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others12" type="text/html"><span id="el_ivf_stimulation_chart_Others12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others12" name="x_Others12" id="x_Others12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others13->Visible) { // Others13 ?>
	<div id="r_Others13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others13" for="x_Others13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others13" type="text/html"><?php echo $ivf_stimulation_chart_add->Others13->caption() ?><?php echo $ivf_stimulation_chart_add->Others13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others13" type="text/html"><span id="el_ivf_stimulation_chart_Others13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others13" name="x_Others13" id="x_Others13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR1->Visible) { // DR1 ?>
	<div id="r_DR1" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR1" for="x_DR1" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR1" type="text/html"><?php echo $ivf_stimulation_chart_add->DR1->caption() ?><?php echo $ivf_stimulation_chart_add->DR1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR1->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR1" type="text/html"><span id="el_ivf_stimulation_chart_DR1">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR1" name="x_DR1" id="x_DR1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR1->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR1->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR1->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR2->Visible) { // DR2 ?>
	<div id="r_DR2" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR2" for="x_DR2" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR2" type="text/html"><?php echo $ivf_stimulation_chart_add->DR2->caption() ?><?php echo $ivf_stimulation_chart_add->DR2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR2->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR2" type="text/html"><span id="el_ivf_stimulation_chart_DR2">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR2" name="x_DR2" id="x_DR2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR2->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR2->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR2->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR3->Visible) { // DR3 ?>
	<div id="r_DR3" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR3" for="x_DR3" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR3" type="text/html"><?php echo $ivf_stimulation_chart_add->DR3->caption() ?><?php echo $ivf_stimulation_chart_add->DR3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR3->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR3" type="text/html"><span id="el_ivf_stimulation_chart_DR3">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR3" name="x_DR3" id="x_DR3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR3->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR3->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR3->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR4->Visible) { // DR4 ?>
	<div id="r_DR4" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR4" for="x_DR4" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR4" type="text/html"><?php echo $ivf_stimulation_chart_add->DR4->caption() ?><?php echo $ivf_stimulation_chart_add->DR4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR4->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR4" type="text/html"><span id="el_ivf_stimulation_chart_DR4">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR4" name="x_DR4" id="x_DR4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR4->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR4->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR4->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR5->Visible) { // DR5 ?>
	<div id="r_DR5" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR5" for="x_DR5" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR5" type="text/html"><?php echo $ivf_stimulation_chart_add->DR5->caption() ?><?php echo $ivf_stimulation_chart_add->DR5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR5->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR5" type="text/html"><span id="el_ivf_stimulation_chart_DR5">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR5" name="x_DR5" id="x_DR5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR5->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR5->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR5->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR6->Visible) { // DR6 ?>
	<div id="r_DR6" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR6" for="x_DR6" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR6" type="text/html"><?php echo $ivf_stimulation_chart_add->DR6->caption() ?><?php echo $ivf_stimulation_chart_add->DR6->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR6->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR6" type="text/html"><span id="el_ivf_stimulation_chart_DR6">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR6" name="x_DR6" id="x_DR6" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR6->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR6->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR6->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR7->Visible) { // DR7 ?>
	<div id="r_DR7" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR7" for="x_DR7" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR7" type="text/html"><?php echo $ivf_stimulation_chart_add->DR7->caption() ?><?php echo $ivf_stimulation_chart_add->DR7->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR7->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR7" type="text/html"><span id="el_ivf_stimulation_chart_DR7">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR7" name="x_DR7" id="x_DR7" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR7->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR7->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR7->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR7->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR8->Visible) { // DR8 ?>
	<div id="r_DR8" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR8" for="x_DR8" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR8" type="text/html"><?php echo $ivf_stimulation_chart_add->DR8->caption() ?><?php echo $ivf_stimulation_chart_add->DR8->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR8->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR8" type="text/html"><span id="el_ivf_stimulation_chart_DR8">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR8" name="x_DR8" id="x_DR8" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR8->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR8->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR8->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR8->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR9->Visible) { // DR9 ?>
	<div id="r_DR9" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR9" for="x_DR9" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR9" type="text/html"><?php echo $ivf_stimulation_chart_add->DR9->caption() ?><?php echo $ivf_stimulation_chart_add->DR9->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR9->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR9" type="text/html"><span id="el_ivf_stimulation_chart_DR9">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR9" name="x_DR9" id="x_DR9" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR9->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR9->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR9->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR9->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR10->Visible) { // DR10 ?>
	<div id="r_DR10" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR10" for="x_DR10" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR10" type="text/html"><?php echo $ivf_stimulation_chart_add->DR10->caption() ?><?php echo $ivf_stimulation_chart_add->DR10->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR10->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR10" type="text/html"><span id="el_ivf_stimulation_chart_DR10">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR10" name="x_DR10" id="x_DR10" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR10->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR10->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR10->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR11->Visible) { // DR11 ?>
	<div id="r_DR11" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR11" for="x_DR11" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR11" type="text/html"><?php echo $ivf_stimulation_chart_add->DR11->caption() ?><?php echo $ivf_stimulation_chart_add->DR11->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR11->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR11" type="text/html"><span id="el_ivf_stimulation_chart_DR11">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR11" name="x_DR11" id="x_DR11" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR11->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR11->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR11->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR12->Visible) { // DR12 ?>
	<div id="r_DR12" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR12" for="x_DR12" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR12" type="text/html"><?php echo $ivf_stimulation_chart_add->DR12->caption() ?><?php echo $ivf_stimulation_chart_add->DR12->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR12->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR12" type="text/html"><span id="el_ivf_stimulation_chart_DR12">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR12" name="x_DR12" id="x_DR12" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR12->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR12->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR12->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR12->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR13->Visible) { // DR13 ?>
	<div id="r_DR13" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR13" for="x_DR13" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR13" type="text/html"><?php echo $ivf_stimulation_chart_add->DR13->caption() ?><?php echo $ivf_stimulation_chart_add->DR13->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR13->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR13" type="text/html"><span id="el_ivf_stimulation_chart_DR13">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR13" name="x_DR13" id="x_DR13" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR13->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR13->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR13->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR13->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
	<div id="r_DOCTORRESPONSIBLE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE" for="x_DOCTORRESPONSIBLE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->caption() ?><?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE" type="text/html"><span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<textarea data-table="ivf_stimulation_chart" data-field="x_DOCTORRESPONSIBLE" name="x_DOCTORRESPONSIBLE" id="x_DOCTORRESPONSIBLE" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DOCTORRESPONSIBLE->getPlaceHolder()) ?>"<?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->editAttributes() ?>><?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->EditValue ?></textarea>
</span></script>
<?php echo $ivf_stimulation_chart_add->DOCTORRESPONSIBLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TidNo" type="text/html"><?php echo $ivf_stimulation_chart_add->TidNo->caption() ?><?php echo $ivf_stimulation_chart_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TidNo->cellAttributes() ?>>
<?php if ($ivf_stimulation_chart_add->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_stimulation_chart_TidNo" type="text/html"><span id="el_ivf_stimulation_chart_TidNo">
<span<?php echo $ivf_stimulation_chart_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_stimulation_chart_add->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_stimulation_chart_add->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_stimulation_chart_TidNo" type="text/html"><span id="el_ivf_stimulation_chart_TidNo">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->TidNo->EditValue ?>"<?php echo $ivf_stimulation_chart_add->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_stimulation_chart_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Convert->Visible) { // Convert ?>
	<div id="r_Convert" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Convert" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Convert" type="text/html"><?php echo $ivf_stimulation_chart_add->Convert->caption() ?><?php echo $ivf_stimulation_chart_add->Convert->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Convert->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Convert" type="text/html"><span id="el_ivf_stimulation_chart_Convert">
<div id="tp_x_Convert" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Convert" data-value-separator="<?php echo $ivf_stimulation_chart_add->Convert->displayValueSeparatorAttribute() ?>" name="x_Convert[]" id="x_Convert[]" value="{value}"<?php echo $ivf_stimulation_chart_add->Convert->editAttributes() ?>></div>
<div id="dsl_x_Convert" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_add->Convert->checkBoxListHtml(FALSE, "x_Convert[]") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_add->Convert->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Consultant" type="text/html"><?php echo $ivf_stimulation_chart_add->Consultant->caption() ?><?php echo $ivf_stimulation_chart_add->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Consultant" type="text/html"><span id="el_ivf_stimulation_chart_Consultant">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Consultant->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Consultant->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_stimulation_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><?php echo $ivf_stimulation_chart_add->InseminatinTechnique->caption() ?><?php echo $ivf_stimulation_chart_add->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_InseminatinTechnique" type="text/html"><span id="el_ivf_stimulation_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_stimulation_chart_add->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x_InseminatinTechnique" name="x_InseminatinTechnique"<?php echo $ivf_stimulation_chart_add->InseminatinTechnique->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label id="elh_ivf_stimulation_chart_IndicationForART" for="x_IndicationForART" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_IndicationForART" type="text/html"><?php echo $ivf_stimulation_chart_add->IndicationForART->caption() ?><?php echo $ivf_stimulation_chart_add->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_IndicationForART" type="text/html"><span id="el_ivf_stimulation_chart_IndicationForART">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_IndicationForART" data-value-separator="<?php echo $ivf_stimulation_chart_add->IndicationForART->displayValueSeparatorAttribute() ?>" id="x_IndicationForART" name="x_IndicationForART"<?php echo $ivf_stimulation_chart_add->IndicationForART->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->IndicationForART->selectOptionListHtml("x_IndicationForART") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<div id="r_Hysteroscopy" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Hysteroscopy" type="text/html"><?php echo $ivf_stimulation_chart_add->Hysteroscopy->caption() ?><?php echo $ivf_stimulation_chart_add->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Hysteroscopy" type="text/html"><span id="el_ivf_stimulation_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_stimulation_chart_add->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x_Hysteroscopy" name="x_Hysteroscopy"<?php echo $ivf_stimulation_chart_add->Hysteroscopy->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->Hysteroscopy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<div id="r_EndometrialScratching" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EndometrialScratching" type="text/html"><?php echo $ivf_stimulation_chart_add->EndometrialScratching->caption() ?><?php echo $ivf_stimulation_chart_add->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EndometrialScratching" type="text/html"><span id="el_ivf_stimulation_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_stimulation_chart_add->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x_EndometrialScratching" name="x_EndometrialScratching"<?php echo $ivf_stimulation_chart_add->EndometrialScratching->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->EndometrialScratching->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TrialCannulation" type="text/html"><?php echo $ivf_stimulation_chart_add->TrialCannulation->caption() ?><?php echo $ivf_stimulation_chart_add->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TrialCannulation" type="text/html"><span id="el_ivf_stimulation_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_stimulation_chart_add->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x_TrialCannulation" name="x_TrialCannulation"<?php echo $ivf_stimulation_chart_add->TrialCannulation->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<div id="r_CYCLETYPE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CYCLETYPE" type="text/html"><?php echo $ivf_stimulation_chart_add->CYCLETYPE->caption() ?><?php echo $ivf_stimulation_chart_add->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CYCLETYPE" type="text/html"><span id="el_ivf_stimulation_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_stimulation_chart_add->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x_CYCLETYPE" name="x_CYCLETYPE"<?php echo $ivf_stimulation_chart_add->CYCLETYPE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->CYCLETYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<div id="r_HRTCYCLE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HRTCYCLE" type="text/html"><?php echo $ivf_stimulation_chart_add->HRTCYCLE->caption() ?><?php echo $ivf_stimulation_chart_add->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HRTCYCLE" type="text/html"><span id="el_ivf_stimulation_chart_HRTCYCLE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->HRTCYCLE->EditValue ?>"<?php echo $ivf_stimulation_chart_add->HRTCYCLE->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->HRTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<div id="r_OralEstrogenDosage" class="form-group row">
		<label id="elh_ivf_stimulation_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->caption() ?><?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_OralEstrogenDosage" type="text/html"><span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x_OralEstrogenDosage" name="x_OralEstrogenDosage"<?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->OralEstrogenDosage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<div id="r_VaginalEstrogen" class="form-group row">
		<label id="elh_ivf_stimulation_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><?php echo $ivf_stimulation_chart_add->VaginalEstrogen->caption() ?><?php echo $ivf_stimulation_chart_add->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_VaginalEstrogen" type="text/html"><span id="el_ivf_stimulation_chart_VaginalEstrogen">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->VaginalEstrogen->EditValue ?>"<?php echo $ivf_stimulation_chart_add->VaginalEstrogen->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->VaginalEstrogen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GCSF->Visible) { // GCSF ?>
	<div id="r_GCSF" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GCSF" for="x_GCSF" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GCSF" type="text/html"><?php echo $ivf_stimulation_chart_add->GCSF->caption() ?><?php echo $ivf_stimulation_chart_add->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GCSF" type="text/html"><span id="el_ivf_stimulation_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_stimulation_chart_add->GCSF->displayValueSeparatorAttribute() ?>" id="x_GCSF" name="x_GCSF"<?php echo $ivf_stimulation_chart_add->GCSF->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GCSF->selectOptionListHtml("x_GCSF") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->GCSF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<div id="r_ActivatedPRP" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ActivatedPRP" type="text/html"><?php echo $ivf_stimulation_chart_add->ActivatedPRP->caption() ?><?php echo $ivf_stimulation_chart_add->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ActivatedPRP" type="text/html"><span id="el_ivf_stimulation_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_stimulation_chart_add->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x_ActivatedPRP" name="x_ActivatedPRP"<?php echo $ivf_stimulation_chart_add->ActivatedPRP->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->ActivatedPRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->UCLcm->Visible) { // UCLcm ?>
	<div id="r_UCLcm" class="form-group row">
		<label id="elh_ivf_stimulation_chart_UCLcm" for="x_UCLcm" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_UCLcm" type="text/html"><?php echo $ivf_stimulation_chart_add->UCLcm->caption() ?><?php echo $ivf_stimulation_chart_add->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UCLcm" type="text/html"><span id="el_ivf_stimulation_chart_UCLcm">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->UCLcm->EditValue ?>"<?php echo $ivf_stimulation_chart_add->UCLcm->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->UCLcm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
	<div id="r_DATOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" for="x_DATOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DATOFEMBRYOTRANSFER" name="x_DATOFEMBRYOTRANSFER" id="x_DATOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DATOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->caption() ?><?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTHAWED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->NOOFEMBRYOSTRANSFERRED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<div id="r_DAYOFEMBRYOS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->caption() ?><?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DAYOFEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CRYOPRESERVEDEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ViaAdmin->Visible) { // ViaAdmin ?>
	<div id="r_ViaAdmin" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaAdmin" for="x_ViaAdmin" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaAdmin" type="text/html"><?php echo $ivf_stimulation_chart_add->ViaAdmin->caption() ?><?php echo $ivf_stimulation_chart_add->ViaAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ViaAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ViaAdmin">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaAdmin" name="x_ViaAdmin" id="x_ViaAdmin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ViaAdmin->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ViaAdmin->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ViaAdmin->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ViaAdmin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
	<div id="r_ViaStartDateTime" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaStartDateTime" for="x_ViaStartDateTime" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><?php echo $ivf_stimulation_chart_add->ViaStartDateTime->caption() ?><?php echo $ivf_stimulation_chart_add->ViaStartDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ViaStartDateTime->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaStartDateTime" type="text/html"><span id="el_ivf_stimulation_chart_ViaStartDateTime">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaStartDateTime" name="x_ViaStartDateTime" id="x_ViaStartDateTime" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ViaStartDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ViaStartDateTime->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ViaStartDateTime->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->ViaStartDateTime->ReadOnly && !$ivf_stimulation_chart_add->ViaStartDateTime->Disabled && !isset($ivf_stimulation_chart_add->ViaStartDateTime->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->ViaStartDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_ViaStartDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_stimulation_chart_add->ViaStartDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ViaDose->Visible) { // ViaDose ?>
	<div id="r_ViaDose" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ViaDose" for="x_ViaDose" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ViaDose" type="text/html"><?php echo $ivf_stimulation_chart_add->ViaDose->caption() ?><?php echo $ivf_stimulation_chart_add->ViaDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ViaDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ViaDose" type="text/html"><span id="el_ivf_stimulation_chart_ViaDose">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ViaDose" name="x_ViaDose" id="x_ViaDose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ViaDose->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ViaDose->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ViaDose->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ViaDose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->AllFreeze->Visible) { // AllFreeze ?>
	<div id="r_AllFreeze" class="form-group row">
		<label id="elh_ivf_stimulation_chart_AllFreeze" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_AllFreeze" type="text/html"><?php echo $ivf_stimulation_chart_add->AllFreeze->caption() ?><?php echo $ivf_stimulation_chart_add->AllFreeze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->AllFreeze->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_AllFreeze" type="text/html"><span id="el_ivf_stimulation_chart_AllFreeze">
<div id="tp_x_AllFreeze" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_AllFreeze" data-value-separator="<?php echo $ivf_stimulation_chart_add->AllFreeze->displayValueSeparatorAttribute() ?>" name="x_AllFreeze" id="x_AllFreeze" value="{value}"<?php echo $ivf_stimulation_chart_add->AllFreeze->editAttributes() ?>></div>
<div id="dsl_x_AllFreeze" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_add->AllFreeze->radioButtonListHtml(FALSE, "x_AllFreeze") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_add->AllFreeze->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TreatmentCancel->Visible) { // TreatmentCancel ?>
	<div id="r_TreatmentCancel" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TreatmentCancel" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TreatmentCancel" type="text/html"><?php echo $ivf_stimulation_chart_add->TreatmentCancel->caption() ?><?php echo $ivf_stimulation_chart_add->TreatmentCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TreatmentCancel->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TreatmentCancel" type="text/html"><span id="el_ivf_stimulation_chart_TreatmentCancel">
<div id="tp_x_TreatmentCancel" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_TreatmentCancel" data-value-separator="<?php echo $ivf_stimulation_chart_add->TreatmentCancel->displayValueSeparatorAttribute() ?>" name="x_TreatmentCancel" id="x_TreatmentCancel" value="{value}"<?php echo $ivf_stimulation_chart_add->TreatmentCancel->editAttributes() ?>></div>
<div id="dsl_x_TreatmentCancel" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_add->TreatmentCancel->radioButtonListHtml(FALSE, "x_TreatmentCancel") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_add->TreatmentCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Reason" for="x_Reason" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Reason" type="text/html"><?php echo $ivf_stimulation_chart_add->Reason->caption() ?><?php echo $ivf_stimulation_chart_add->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Reason->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Reason" type="text/html"><span id="el_ivf_stimulation_chart_Reason">
<textarea data-table="ivf_stimulation_chart" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Reason->getPlaceHolder()) ?>"<?php echo $ivf_stimulation_chart_add->Reason->editAttributes() ?>><?php echo $ivf_stimulation_chart_add->Reason->EditValue ?></textarea>
</span></script>
<?php echo $ivf_stimulation_chart_add->Reason->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
	<div id="r_ProgesteroneAdmin" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneAdmin" for="x_ProgesteroneAdmin" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->caption() ?><?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneAdmin" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneAdmin" name="x_ProgesteroneAdmin" id="x_ProgesteroneAdmin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ProgesteroneAdmin->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ProgesteroneAdmin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
	<div id="r_ProgesteroneStart" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneStart" for="x_ProgesteroneStart" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><?php echo $ivf_stimulation_chart_add->ProgesteroneStart->caption() ?><?php echo $ivf_stimulation_chart_add->ProgesteroneStart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ProgesteroneStart->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneStart" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneStart">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneStart" name="x_ProgesteroneStart" id="x_ProgesteroneStart" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ProgesteroneStart->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ProgesteroneStart->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ProgesteroneStart->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->ProgesteroneStart->ReadOnly && !$ivf_stimulation_chart_add->ProgesteroneStart->Disabled && !isset($ivf_stimulation_chart_add->ProgesteroneStart->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->ProgesteroneStart->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_ProgesteroneStart", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_stimulation_chart_add->ProgesteroneStart->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
	<div id="r_ProgesteroneDose" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ProgesteroneDose" for="x_ProgesteroneDose" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><?php echo $ivf_stimulation_chart_add->ProgesteroneDose->caption() ?><?php echo $ivf_stimulation_chart_add->ProgesteroneDose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ProgesteroneDose->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ProgesteroneDose" type="text/html"><span id="el_ivf_stimulation_chart_ProgesteroneDose">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ProgesteroneDose" name="x_ProgesteroneDose" id="x_ProgesteroneDose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ProgesteroneDose->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ProgesteroneDose->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ProgesteroneDose->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ProgesteroneDose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Projectron->Visible) { // Projectron ?>
	<div id="r_Projectron" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Projectron" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Projectron" type="text/html"><?php echo $ivf_stimulation_chart_add->Projectron->caption() ?><?php echo $ivf_stimulation_chart_add->Projectron->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Projectron->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Projectron" type="text/html"><span id="el_ivf_stimulation_chart_Projectron">
<div id="tp_x_Projectron" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_stimulation_chart" data-field="x_Projectron" data-value-separator="<?php echo $ivf_stimulation_chart_add->Projectron->displayValueSeparatorAttribute() ?>" name="x_Projectron" id="x_Projectron" value="{value}"<?php echo $ivf_stimulation_chart_add->Projectron->editAttributes() ?>></div>
<div id="dsl_x_Projectron" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_stimulation_chart_add->Projectron->radioButtonListHtml(FALSE, "x_Projectron") ?>
</div></div>
</span></script>
<?php echo $ivf_stimulation_chart_add->Projectron->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate14->Visible) { // StChDate14 ?>
	<div id="r_StChDate14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate14" for="x_StChDate14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate14" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate14->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate14" type="text/html"><span id="el_ivf_stimulation_chart_StChDate14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate14" data-format="7" name="x_StChDate14" id="x_StChDate14" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate14->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate14->ReadOnly && !$ivf_stimulation_chart_add->StChDate14->Disabled && !isset($ivf_stimulation_chart_add->StChDate14->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate14->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate14", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate15->Visible) { // StChDate15 ?>
	<div id="r_StChDate15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate15" for="x_StChDate15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate15" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate15->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate15" type="text/html"><span id="el_ivf_stimulation_chart_StChDate15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate15" data-format="7" name="x_StChDate15" id="x_StChDate15" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate15->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate15->ReadOnly && !$ivf_stimulation_chart_add->StChDate15->Disabled && !isset($ivf_stimulation_chart_add->StChDate15->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate15->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate15", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate16->Visible) { // StChDate16 ?>
	<div id="r_StChDate16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate16" for="x_StChDate16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate16" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate16->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate16" type="text/html"><span id="el_ivf_stimulation_chart_StChDate16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate16" data-format="7" name="x_StChDate16" id="x_StChDate16" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate16->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate16->ReadOnly && !$ivf_stimulation_chart_add->StChDate16->Disabled && !isset($ivf_stimulation_chart_add->StChDate16->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate16->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate16", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate17->Visible) { // StChDate17 ?>
	<div id="r_StChDate17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate17" for="x_StChDate17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate17" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate17->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate17" type="text/html"><span id="el_ivf_stimulation_chart_StChDate17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate17" data-format="7" name="x_StChDate17" id="x_StChDate17" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate17->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate17->ReadOnly && !$ivf_stimulation_chart_add->StChDate17->Disabled && !isset($ivf_stimulation_chart_add->StChDate17->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate17->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate17", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate18->Visible) { // StChDate18 ?>
	<div id="r_StChDate18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate18" for="x_StChDate18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate18" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate18->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate18" type="text/html"><span id="el_ivf_stimulation_chart_StChDate18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate18" data-format="7" name="x_StChDate18" id="x_StChDate18" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate18->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate18->ReadOnly && !$ivf_stimulation_chart_add->StChDate18->Disabled && !isset($ivf_stimulation_chart_add->StChDate18->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate18->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate18", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate19->Visible) { // StChDate19 ?>
	<div id="r_StChDate19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate19" for="x_StChDate19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate19" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate19->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate19" type="text/html"><span id="el_ivf_stimulation_chart_StChDate19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate19" data-format="7" name="x_StChDate19" id="x_StChDate19" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate19->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate19->ReadOnly && !$ivf_stimulation_chart_add->StChDate19->Disabled && !isset($ivf_stimulation_chart_add->StChDate19->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate19->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate19", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate20->Visible) { // StChDate20 ?>
	<div id="r_StChDate20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate20" for="x_StChDate20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate20" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate20->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate20" type="text/html"><span id="el_ivf_stimulation_chart_StChDate20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate20" data-format="7" name="x_StChDate20" id="x_StChDate20" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate20->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate20->ReadOnly && !$ivf_stimulation_chart_add->StChDate20->Disabled && !isset($ivf_stimulation_chart_add->StChDate20->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate20->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate20", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate21->Visible) { // StChDate21 ?>
	<div id="r_StChDate21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate21" for="x_StChDate21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate21" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate21->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate21" type="text/html"><span id="el_ivf_stimulation_chart_StChDate21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate21" data-format="7" name="x_StChDate21" id="x_StChDate21" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate21->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate21->ReadOnly && !$ivf_stimulation_chart_add->StChDate21->Disabled && !isset($ivf_stimulation_chart_add->StChDate21->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate21->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate21", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate22->Visible) { // StChDate22 ?>
	<div id="r_StChDate22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate22" for="x_StChDate22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate22" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate22->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate22" type="text/html"><span id="el_ivf_stimulation_chart_StChDate22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate22" data-format="7" name="x_StChDate22" id="x_StChDate22" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate22->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate22->ReadOnly && !$ivf_stimulation_chart_add->StChDate22->Disabled && !isset($ivf_stimulation_chart_add->StChDate22->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate22->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate22", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate23->Visible) { // StChDate23 ?>
	<div id="r_StChDate23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate23" for="x_StChDate23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate23" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate23->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate23" type="text/html"><span id="el_ivf_stimulation_chart_StChDate23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate23" data-format="7" name="x_StChDate23" id="x_StChDate23" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate23->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate23->ReadOnly && !$ivf_stimulation_chart_add->StChDate23->Disabled && !isset($ivf_stimulation_chart_add->StChDate23->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate23->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate23", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate24->Visible) { // StChDate24 ?>
	<div id="r_StChDate24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate24" for="x_StChDate24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate24" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate24->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate24" type="text/html"><span id="el_ivf_stimulation_chart_StChDate24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate24" data-format="7" name="x_StChDate24" id="x_StChDate24" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate24->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate24->ReadOnly && !$ivf_stimulation_chart_add->StChDate24->Disabled && !isset($ivf_stimulation_chart_add->StChDate24->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate24->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate24", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StChDate25->Visible) { // StChDate25 ?>
	<div id="r_StChDate25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StChDate25" for="x_StChDate25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StChDate25" type="text/html"><?php echo $ivf_stimulation_chart_add->StChDate25->caption() ?><?php echo $ivf_stimulation_chart_add->StChDate25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StChDate25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StChDate25" type="text/html"><span id="el_ivf_stimulation_chart_StChDate25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StChDate25" data-format="7" name="x_StChDate25" id="x_StChDate25" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StChDate25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StChDate25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StChDate25->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->StChDate25->ReadOnly && !$ivf_stimulation_chart_add->StChDate25->Disabled && !isset($ivf_stimulation_chart_add->StChDate25->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->StChDate25->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_StChDate25", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->StChDate25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay14->Visible) { // CycleDay14 ?>
	<div id="r_CycleDay14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay14" for="x_CycleDay14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay14" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay14->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay14" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay14" name="x_CycleDay14" id="x_CycleDay14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay15->Visible) { // CycleDay15 ?>
	<div id="r_CycleDay15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay15" for="x_CycleDay15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay15" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay15->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay15" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay15" name="x_CycleDay15" id="x_CycleDay15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay16->Visible) { // CycleDay16 ?>
	<div id="r_CycleDay16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay16" for="x_CycleDay16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay16" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay16->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay16" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay16" name="x_CycleDay16" id="x_CycleDay16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay17->Visible) { // CycleDay17 ?>
	<div id="r_CycleDay17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay17" for="x_CycleDay17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay17" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay17->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay17" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay17" name="x_CycleDay17" id="x_CycleDay17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay18->Visible) { // CycleDay18 ?>
	<div id="r_CycleDay18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay18" for="x_CycleDay18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay18" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay18->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay18" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay18" name="x_CycleDay18" id="x_CycleDay18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay19->Visible) { // CycleDay19 ?>
	<div id="r_CycleDay19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay19" for="x_CycleDay19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay19" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay19->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay19" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay19" name="x_CycleDay19" id="x_CycleDay19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay20->Visible) { // CycleDay20 ?>
	<div id="r_CycleDay20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay20" for="x_CycleDay20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay20" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay20->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay20" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay20" name="x_CycleDay20" id="x_CycleDay20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay21->Visible) { // CycleDay21 ?>
	<div id="r_CycleDay21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay21" for="x_CycleDay21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay21" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay21->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay21" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay21" name="x_CycleDay21" id="x_CycleDay21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay22->Visible) { // CycleDay22 ?>
	<div id="r_CycleDay22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay22" for="x_CycleDay22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay22" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay22->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay22" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay22" name="x_CycleDay22" id="x_CycleDay22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay23->Visible) { // CycleDay23 ?>
	<div id="r_CycleDay23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay23" for="x_CycleDay23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay23" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay23->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay23" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay23" name="x_CycleDay23" id="x_CycleDay23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay24->Visible) { // CycleDay24 ?>
	<div id="r_CycleDay24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay24" for="x_CycleDay24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay24" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay24->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay24" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay24" name="x_CycleDay24" id="x_CycleDay24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->CycleDay25->Visible) { // CycleDay25 ?>
	<div id="r_CycleDay25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_CycleDay25" for="x_CycleDay25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_CycleDay25" type="text/html"><?php echo $ivf_stimulation_chart_add->CycleDay25->caption() ?><?php echo $ivf_stimulation_chart_add->CycleDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->CycleDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_CycleDay25" type="text/html"><span id="el_ivf_stimulation_chart_CycleDay25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_CycleDay25" name="x_CycleDay25" id="x_CycleDay25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->CycleDay25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->CycleDay25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->CycleDay25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->CycleDay25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay14->Visible) { // StimulationDay14 ?>
	<div id="r_StimulationDay14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay14" for="x_StimulationDay14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay14" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay14->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay14" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay14" name="x_StimulationDay14" id="x_StimulationDay14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay15->Visible) { // StimulationDay15 ?>
	<div id="r_StimulationDay15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay15" for="x_StimulationDay15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay15" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay15->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay15" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay15" name="x_StimulationDay15" id="x_StimulationDay15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay16->Visible) { // StimulationDay16 ?>
	<div id="r_StimulationDay16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay16" for="x_StimulationDay16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay16" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay16->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay16" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay16" name="x_StimulationDay16" id="x_StimulationDay16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay17->Visible) { // StimulationDay17 ?>
	<div id="r_StimulationDay17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay17" for="x_StimulationDay17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay17" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay17->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay17" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay17" name="x_StimulationDay17" id="x_StimulationDay17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay18->Visible) { // StimulationDay18 ?>
	<div id="r_StimulationDay18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay18" for="x_StimulationDay18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay18" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay18->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay18" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay18" name="x_StimulationDay18" id="x_StimulationDay18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay19->Visible) { // StimulationDay19 ?>
	<div id="r_StimulationDay19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay19" for="x_StimulationDay19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay19" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay19->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay19" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay19" name="x_StimulationDay19" id="x_StimulationDay19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay20->Visible) { // StimulationDay20 ?>
	<div id="r_StimulationDay20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay20" for="x_StimulationDay20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay20" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay20->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay20" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay20" name="x_StimulationDay20" id="x_StimulationDay20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay21->Visible) { // StimulationDay21 ?>
	<div id="r_StimulationDay21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay21" for="x_StimulationDay21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay21" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay21->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay21" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay21" name="x_StimulationDay21" id="x_StimulationDay21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay22->Visible) { // StimulationDay22 ?>
	<div id="r_StimulationDay22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay22" for="x_StimulationDay22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay22" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay22->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay22" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay22" name="x_StimulationDay22" id="x_StimulationDay22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay23->Visible) { // StimulationDay23 ?>
	<div id="r_StimulationDay23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay23" for="x_StimulationDay23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay23" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay23->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay23" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay23" name="x_StimulationDay23" id="x_StimulationDay23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay24->Visible) { // StimulationDay24 ?>
	<div id="r_StimulationDay24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay24" for="x_StimulationDay24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay24" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay24->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay24" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay24" name="x_StimulationDay24" id="x_StimulationDay24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->StimulationDay25->Visible) { // StimulationDay25 ?>
	<div id="r_StimulationDay25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_StimulationDay25" for="x_StimulationDay25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_StimulationDay25" type="text/html"><?php echo $ivf_stimulation_chart_add->StimulationDay25->caption() ?><?php echo $ivf_stimulation_chart_add->StimulationDay25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->StimulationDay25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_StimulationDay25" type="text/html"><span id="el_ivf_stimulation_chart_StimulationDay25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_StimulationDay25" name="x_StimulationDay25" id="x_StimulationDay25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->StimulationDay25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->StimulationDay25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->StimulationDay25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->StimulationDay25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet14->Visible) { // Tablet14 ?>
	<div id="r_Tablet14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet14" for="x_Tablet14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet14" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet14->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet14" type="text/html"><span id="el_ivf_stimulation_chart_Tablet14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet14" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet14->displayValueSeparatorAttribute() ?>" id="x_Tablet14" name="x_Tablet14"<?php echo $ivf_stimulation_chart_add->Tablet14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet14->selectOptionListHtml("x_Tablet14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet14->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet15->Visible) { // Tablet15 ?>
	<div id="r_Tablet15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet15" for="x_Tablet15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet15" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet15->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet15" type="text/html"><span id="el_ivf_stimulation_chart_Tablet15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet15" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet15->displayValueSeparatorAttribute() ?>" id="x_Tablet15" name="x_Tablet15"<?php echo $ivf_stimulation_chart_add->Tablet15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet15->selectOptionListHtml("x_Tablet15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet15->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet16->Visible) { // Tablet16 ?>
	<div id="r_Tablet16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet16" for="x_Tablet16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet16" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet16->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet16" type="text/html"><span id="el_ivf_stimulation_chart_Tablet16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet16" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet16->displayValueSeparatorAttribute() ?>" id="x_Tablet16" name="x_Tablet16"<?php echo $ivf_stimulation_chart_add->Tablet16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet16->selectOptionListHtml("x_Tablet16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet16->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet17->Visible) { // Tablet17 ?>
	<div id="r_Tablet17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet17" for="x_Tablet17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet17" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet17->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet17" type="text/html"><span id="el_ivf_stimulation_chart_Tablet17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet17" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet17->displayValueSeparatorAttribute() ?>" id="x_Tablet17" name="x_Tablet17"<?php echo $ivf_stimulation_chart_add->Tablet17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet17->selectOptionListHtml("x_Tablet17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet17->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet18->Visible) { // Tablet18 ?>
	<div id="r_Tablet18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet18" for="x_Tablet18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet18" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet18->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet18" type="text/html"><span id="el_ivf_stimulation_chart_Tablet18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet18" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet18->displayValueSeparatorAttribute() ?>" id="x_Tablet18" name="x_Tablet18"<?php echo $ivf_stimulation_chart_add->Tablet18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet18->selectOptionListHtml("x_Tablet18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet18->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet19->Visible) { // Tablet19 ?>
	<div id="r_Tablet19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet19" for="x_Tablet19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet19" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet19->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet19" type="text/html"><span id="el_ivf_stimulation_chart_Tablet19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet19" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet19->displayValueSeparatorAttribute() ?>" id="x_Tablet19" name="x_Tablet19"<?php echo $ivf_stimulation_chart_add->Tablet19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet19->selectOptionListHtml("x_Tablet19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet19->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet20->Visible) { // Tablet20 ?>
	<div id="r_Tablet20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet20" for="x_Tablet20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet20" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet20->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet20" type="text/html"><span id="el_ivf_stimulation_chart_Tablet20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet20" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet20->displayValueSeparatorAttribute() ?>" id="x_Tablet20" name="x_Tablet20"<?php echo $ivf_stimulation_chart_add->Tablet20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet20->selectOptionListHtml("x_Tablet20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet20->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet21->Visible) { // Tablet21 ?>
	<div id="r_Tablet21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet21" for="x_Tablet21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet21" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet21->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet21" type="text/html"><span id="el_ivf_stimulation_chart_Tablet21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet21" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet21->displayValueSeparatorAttribute() ?>" id="x_Tablet21" name="x_Tablet21"<?php echo $ivf_stimulation_chart_add->Tablet21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet21->selectOptionListHtml("x_Tablet21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet21->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet22->Visible) { // Tablet22 ?>
	<div id="r_Tablet22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet22" for="x_Tablet22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet22" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet22->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet22" type="text/html"><span id="el_ivf_stimulation_chart_Tablet22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet22" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet22->displayValueSeparatorAttribute() ?>" id="x_Tablet22" name="x_Tablet22"<?php echo $ivf_stimulation_chart_add->Tablet22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet22->selectOptionListHtml("x_Tablet22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet22->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet23->Visible) { // Tablet23 ?>
	<div id="r_Tablet23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet23" for="x_Tablet23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet23" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet23->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet23" type="text/html"><span id="el_ivf_stimulation_chart_Tablet23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet23" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet23->displayValueSeparatorAttribute() ?>" id="x_Tablet23" name="x_Tablet23"<?php echo $ivf_stimulation_chart_add->Tablet23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet23->selectOptionListHtml("x_Tablet23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet23->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet24->Visible) { // Tablet24 ?>
	<div id="r_Tablet24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet24" for="x_Tablet24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet24" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet24->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet24" type="text/html"><span id="el_ivf_stimulation_chart_Tablet24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet24" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet24->displayValueSeparatorAttribute() ?>" id="x_Tablet24" name="x_Tablet24"<?php echo $ivf_stimulation_chart_add->Tablet24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet24->selectOptionListHtml("x_Tablet24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet24->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Tablet25->Visible) { // Tablet25 ?>
	<div id="r_Tablet25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Tablet25" for="x_Tablet25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Tablet25" type="text/html"><?php echo $ivf_stimulation_chart_add->Tablet25->caption() ?><?php echo $ivf_stimulation_chart_add->Tablet25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Tablet25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Tablet25" type="text/html"><span id="el_ivf_stimulation_chart_Tablet25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_Tablet25" data-value-separator="<?php echo $ivf_stimulation_chart_add->Tablet25->displayValueSeparatorAttribute() ?>" id="x_Tablet25" name="x_Tablet25"<?php echo $ivf_stimulation_chart_add->Tablet25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->Tablet25->selectOptionListHtml("x_Tablet25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->Tablet25->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_Tablet25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->Tablet25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH14->Visible) { // RFSH14 ?>
	<div id="r_RFSH14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH14" for="x_RFSH14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH14" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH14->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH14" type="text/html"><span id="el_ivf_stimulation_chart_RFSH14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH14" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH14->displayValueSeparatorAttribute() ?>" id="x_RFSH14" name="x_RFSH14"<?php echo $ivf_stimulation_chart_add->RFSH14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH14->selectOptionListHtml("x_RFSH14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH14->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH15->Visible) { // RFSH15 ?>
	<div id="r_RFSH15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH15" for="x_RFSH15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH15" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH15->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH15" type="text/html"><span id="el_ivf_stimulation_chart_RFSH15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH15" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH15->displayValueSeparatorAttribute() ?>" id="x_RFSH15" name="x_RFSH15"<?php echo $ivf_stimulation_chart_add->RFSH15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH15->selectOptionListHtml("x_RFSH15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH15->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH16->Visible) { // RFSH16 ?>
	<div id="r_RFSH16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH16" for="x_RFSH16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH16" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH16->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH16" type="text/html"><span id="el_ivf_stimulation_chart_RFSH16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH16" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH16->displayValueSeparatorAttribute() ?>" id="x_RFSH16" name="x_RFSH16"<?php echo $ivf_stimulation_chart_add->RFSH16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH16->selectOptionListHtml("x_RFSH16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH16->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH17->Visible) { // RFSH17 ?>
	<div id="r_RFSH17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH17" for="x_RFSH17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH17" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH17->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH17" type="text/html"><span id="el_ivf_stimulation_chart_RFSH17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH17" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH17->displayValueSeparatorAttribute() ?>" id="x_RFSH17" name="x_RFSH17"<?php echo $ivf_stimulation_chart_add->RFSH17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH17->selectOptionListHtml("x_RFSH17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH17->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH18->Visible) { // RFSH18 ?>
	<div id="r_RFSH18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH18" for="x_RFSH18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH18" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH18->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH18" type="text/html"><span id="el_ivf_stimulation_chart_RFSH18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH18" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH18->displayValueSeparatorAttribute() ?>" id="x_RFSH18" name="x_RFSH18"<?php echo $ivf_stimulation_chart_add->RFSH18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH18->selectOptionListHtml("x_RFSH18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH18->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH19->Visible) { // RFSH19 ?>
	<div id="r_RFSH19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH19" for="x_RFSH19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH19" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH19->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH19" type="text/html"><span id="el_ivf_stimulation_chart_RFSH19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH19" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH19->displayValueSeparatorAttribute() ?>" id="x_RFSH19" name="x_RFSH19"<?php echo $ivf_stimulation_chart_add->RFSH19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH19->selectOptionListHtml("x_RFSH19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH19->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH20->Visible) { // RFSH20 ?>
	<div id="r_RFSH20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH20" for="x_RFSH20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH20" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH20->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH20" type="text/html"><span id="el_ivf_stimulation_chart_RFSH20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH20" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH20->displayValueSeparatorAttribute() ?>" id="x_RFSH20" name="x_RFSH20"<?php echo $ivf_stimulation_chart_add->RFSH20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH20->selectOptionListHtml("x_RFSH20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH20->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH21->Visible) { // RFSH21 ?>
	<div id="r_RFSH21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH21" for="x_RFSH21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH21" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH21->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH21" type="text/html"><span id="el_ivf_stimulation_chart_RFSH21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH21" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH21->displayValueSeparatorAttribute() ?>" id="x_RFSH21" name="x_RFSH21"<?php echo $ivf_stimulation_chart_add->RFSH21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH21->selectOptionListHtml("x_RFSH21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH21->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH22->Visible) { // RFSH22 ?>
	<div id="r_RFSH22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH22" for="x_RFSH22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH22" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH22->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH22" type="text/html"><span id="el_ivf_stimulation_chart_RFSH22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH22" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH22->displayValueSeparatorAttribute() ?>" id="x_RFSH22" name="x_RFSH22"<?php echo $ivf_stimulation_chart_add->RFSH22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH22->selectOptionListHtml("x_RFSH22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH22->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH23->Visible) { // RFSH23 ?>
	<div id="r_RFSH23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH23" for="x_RFSH23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH23" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH23->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH23" type="text/html"><span id="el_ivf_stimulation_chart_RFSH23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH23" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH23->displayValueSeparatorAttribute() ?>" id="x_RFSH23" name="x_RFSH23"<?php echo $ivf_stimulation_chart_add->RFSH23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH23->selectOptionListHtml("x_RFSH23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH23->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH24->Visible) { // RFSH24 ?>
	<div id="r_RFSH24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH24" for="x_RFSH24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH24" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH24->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH24" type="text/html"><span id="el_ivf_stimulation_chart_RFSH24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH24" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH24->displayValueSeparatorAttribute() ?>" id="x_RFSH24" name="x_RFSH24"<?php echo $ivf_stimulation_chart_add->RFSH24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH24->selectOptionListHtml("x_RFSH24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH24->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->RFSH25->Visible) { // RFSH25 ?>
	<div id="r_RFSH25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_RFSH25" for="x_RFSH25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_RFSH25" type="text/html"><?php echo $ivf_stimulation_chart_add->RFSH25->caption() ?><?php echo $ivf_stimulation_chart_add->RFSH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->RFSH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_RFSH25" type="text/html"><span id="el_ivf_stimulation_chart_RFSH25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_RFSH25" data-value-separator="<?php echo $ivf_stimulation_chart_add->RFSH25->displayValueSeparatorAttribute() ?>" id="x_RFSH25" name="x_RFSH25"<?php echo $ivf_stimulation_chart_add->RFSH25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->RFSH25->selectOptionListHtml("x_RFSH25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->RFSH25->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_RFSH25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->RFSH25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG14->Visible) { // HMG14 ?>
	<div id="r_HMG14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG14" for="x_HMG14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG14" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG14->caption() ?><?php echo $ivf_stimulation_chart_add->HMG14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG14" type="text/html"><span id="el_ivf_stimulation_chart_HMG14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG14" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG14->displayValueSeparatorAttribute() ?>" id="x_HMG14" name="x_HMG14"<?php echo $ivf_stimulation_chart_add->HMG14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG14->selectOptionListHtml("x_HMG14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG14->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG15->Visible) { // HMG15 ?>
	<div id="r_HMG15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG15" for="x_HMG15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG15" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG15->caption() ?><?php echo $ivf_stimulation_chart_add->HMG15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG15" type="text/html"><span id="el_ivf_stimulation_chart_HMG15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG15" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG15->displayValueSeparatorAttribute() ?>" id="x_HMG15" name="x_HMG15"<?php echo $ivf_stimulation_chart_add->HMG15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG15->selectOptionListHtml("x_HMG15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG15->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG16->Visible) { // HMG16 ?>
	<div id="r_HMG16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG16" for="x_HMG16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG16" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG16->caption() ?><?php echo $ivf_stimulation_chart_add->HMG16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG16" type="text/html"><span id="el_ivf_stimulation_chart_HMG16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG16" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG16->displayValueSeparatorAttribute() ?>" id="x_HMG16" name="x_HMG16"<?php echo $ivf_stimulation_chart_add->HMG16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG16->selectOptionListHtml("x_HMG16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG16->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG17->Visible) { // HMG17 ?>
	<div id="r_HMG17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG17" for="x_HMG17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG17" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG17->caption() ?><?php echo $ivf_stimulation_chart_add->HMG17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG17" type="text/html"><span id="el_ivf_stimulation_chart_HMG17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG17" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG17->displayValueSeparatorAttribute() ?>" id="x_HMG17" name="x_HMG17"<?php echo $ivf_stimulation_chart_add->HMG17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG17->selectOptionListHtml("x_HMG17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG17->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG18->Visible) { // HMG18 ?>
	<div id="r_HMG18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG18" for="x_HMG18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG18" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG18->caption() ?><?php echo $ivf_stimulation_chart_add->HMG18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG18" type="text/html"><span id="el_ivf_stimulation_chart_HMG18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG18" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG18->displayValueSeparatorAttribute() ?>" id="x_HMG18" name="x_HMG18"<?php echo $ivf_stimulation_chart_add->HMG18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG18->selectOptionListHtml("x_HMG18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG18->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG19->Visible) { // HMG19 ?>
	<div id="r_HMG19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG19" for="x_HMG19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG19" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG19->caption() ?><?php echo $ivf_stimulation_chart_add->HMG19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG19" type="text/html"><span id="el_ivf_stimulation_chart_HMG19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG19" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG19->displayValueSeparatorAttribute() ?>" id="x_HMG19" name="x_HMG19"<?php echo $ivf_stimulation_chart_add->HMG19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG19->selectOptionListHtml("x_HMG19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG19->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG20->Visible) { // HMG20 ?>
	<div id="r_HMG20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG20" for="x_HMG20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG20" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG20->caption() ?><?php echo $ivf_stimulation_chart_add->HMG20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG20" type="text/html"><span id="el_ivf_stimulation_chart_HMG20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG20" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG20->displayValueSeparatorAttribute() ?>" id="x_HMG20" name="x_HMG20"<?php echo $ivf_stimulation_chart_add->HMG20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG20->selectOptionListHtml("x_HMG20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG20->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG21->Visible) { // HMG21 ?>
	<div id="r_HMG21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG21" for="x_HMG21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG21" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG21->caption() ?><?php echo $ivf_stimulation_chart_add->HMG21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG21" type="text/html"><span id="el_ivf_stimulation_chart_HMG21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG21" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG21->displayValueSeparatorAttribute() ?>" id="x_HMG21" name="x_HMG21"<?php echo $ivf_stimulation_chart_add->HMG21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG21->selectOptionListHtml("x_HMG21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG21->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG22->Visible) { // HMG22 ?>
	<div id="r_HMG22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG22" for="x_HMG22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG22" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG22->caption() ?><?php echo $ivf_stimulation_chart_add->HMG22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG22" type="text/html"><span id="el_ivf_stimulation_chart_HMG22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG22" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG22->displayValueSeparatorAttribute() ?>" id="x_HMG22" name="x_HMG22"<?php echo $ivf_stimulation_chart_add->HMG22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG22->selectOptionListHtml("x_HMG22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG22->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG23->Visible) { // HMG23 ?>
	<div id="r_HMG23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG23" for="x_HMG23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG23" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG23->caption() ?><?php echo $ivf_stimulation_chart_add->HMG23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG23" type="text/html"><span id="el_ivf_stimulation_chart_HMG23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG23" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG23->displayValueSeparatorAttribute() ?>" id="x_HMG23" name="x_HMG23"<?php echo $ivf_stimulation_chart_add->HMG23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG23->selectOptionListHtml("x_HMG23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG23->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG24->Visible) { // HMG24 ?>
	<div id="r_HMG24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG24" for="x_HMG24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG24" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG24->caption() ?><?php echo $ivf_stimulation_chart_add->HMG24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG24" type="text/html"><span id="el_ivf_stimulation_chart_HMG24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG24" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG24->displayValueSeparatorAttribute() ?>" id="x_HMG24" name="x_HMG24"<?php echo $ivf_stimulation_chart_add->HMG24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG24->selectOptionListHtml("x_HMG24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG24->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HMG25->Visible) { // HMG25 ?>
	<div id="r_HMG25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HMG25" for="x_HMG25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HMG25" type="text/html"><?php echo $ivf_stimulation_chart_add->HMG25->caption() ?><?php echo $ivf_stimulation_chart_add->HMG25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HMG25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HMG25" type="text/html"><span id="el_ivf_stimulation_chart_HMG25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HMG25" data-value-separator="<?php echo $ivf_stimulation_chart_add->HMG25->displayValueSeparatorAttribute() ?>" id="x_HMG25" name="x_HMG25"<?php echo $ivf_stimulation_chart_add->HMG25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HMG25->selectOptionListHtml("x_HMG25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->HMG25->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_HMG25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->HMG25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH14->Visible) { // GnRH14 ?>
	<div id="r_GnRH14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH14" for="x_GnRH14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH14" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH14->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH14" type="text/html"><span id="el_ivf_stimulation_chart_GnRH14">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH14" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH14->displayValueSeparatorAttribute() ?>" id="x_GnRH14" name="x_GnRH14"<?php echo $ivf_stimulation_chart_add->GnRH14->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH14->selectOptionListHtml("x_GnRH14") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH14->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH14") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH15->Visible) { // GnRH15 ?>
	<div id="r_GnRH15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH15" for="x_GnRH15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH15" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH15->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH15" type="text/html"><span id="el_ivf_stimulation_chart_GnRH15">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH15" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH15->displayValueSeparatorAttribute() ?>" id="x_GnRH15" name="x_GnRH15"<?php echo $ivf_stimulation_chart_add->GnRH15->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH15->selectOptionListHtml("x_GnRH15") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH15->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH15") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH16->Visible) { // GnRH16 ?>
	<div id="r_GnRH16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH16" for="x_GnRH16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH16" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH16->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH16" type="text/html"><span id="el_ivf_stimulation_chart_GnRH16">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH16" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH16->displayValueSeparatorAttribute() ?>" id="x_GnRH16" name="x_GnRH16"<?php echo $ivf_stimulation_chart_add->GnRH16->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH16->selectOptionListHtml("x_GnRH16") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH16->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH16") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH17->Visible) { // GnRH17 ?>
	<div id="r_GnRH17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH17" for="x_GnRH17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH17" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH17->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH17" type="text/html"><span id="el_ivf_stimulation_chart_GnRH17">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH17" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH17->displayValueSeparatorAttribute() ?>" id="x_GnRH17" name="x_GnRH17"<?php echo $ivf_stimulation_chart_add->GnRH17->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH17->selectOptionListHtml("x_GnRH17") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH17->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH17") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH18->Visible) { // GnRH18 ?>
	<div id="r_GnRH18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH18" for="x_GnRH18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH18" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH18->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH18" type="text/html"><span id="el_ivf_stimulation_chart_GnRH18">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH18" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH18->displayValueSeparatorAttribute() ?>" id="x_GnRH18" name="x_GnRH18"<?php echo $ivf_stimulation_chart_add->GnRH18->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH18->selectOptionListHtml("x_GnRH18") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH18->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH18") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH19->Visible) { // GnRH19 ?>
	<div id="r_GnRH19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH19" for="x_GnRH19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH19" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH19->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH19" type="text/html"><span id="el_ivf_stimulation_chart_GnRH19">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH19" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH19->displayValueSeparatorAttribute() ?>" id="x_GnRH19" name="x_GnRH19"<?php echo $ivf_stimulation_chart_add->GnRH19->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH19->selectOptionListHtml("x_GnRH19") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH19->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH19") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH20->Visible) { // GnRH20 ?>
	<div id="r_GnRH20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH20" for="x_GnRH20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH20" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH20->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH20" type="text/html"><span id="el_ivf_stimulation_chart_GnRH20">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH20" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH20->displayValueSeparatorAttribute() ?>" id="x_GnRH20" name="x_GnRH20"<?php echo $ivf_stimulation_chart_add->GnRH20->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH20->selectOptionListHtml("x_GnRH20") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH20->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH20") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH21->Visible) { // GnRH21 ?>
	<div id="r_GnRH21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH21" for="x_GnRH21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH21" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH21->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH21" type="text/html"><span id="el_ivf_stimulation_chart_GnRH21">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH21" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH21->displayValueSeparatorAttribute() ?>" id="x_GnRH21" name="x_GnRH21"<?php echo $ivf_stimulation_chart_add->GnRH21->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH21->selectOptionListHtml("x_GnRH21") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH21->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH21") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH22->Visible) { // GnRH22 ?>
	<div id="r_GnRH22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH22" for="x_GnRH22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH22" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH22->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH22" type="text/html"><span id="el_ivf_stimulation_chart_GnRH22">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH22" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH22->displayValueSeparatorAttribute() ?>" id="x_GnRH22" name="x_GnRH22"<?php echo $ivf_stimulation_chart_add->GnRH22->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH22->selectOptionListHtml("x_GnRH22") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH22->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH22") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH23->Visible) { // GnRH23 ?>
	<div id="r_GnRH23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH23" for="x_GnRH23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH23" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH23->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH23" type="text/html"><span id="el_ivf_stimulation_chart_GnRH23">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH23" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH23->displayValueSeparatorAttribute() ?>" id="x_GnRH23" name="x_GnRH23"<?php echo $ivf_stimulation_chart_add->GnRH23->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH23->selectOptionListHtml("x_GnRH23") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH23->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH23") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH24->Visible) { // GnRH24 ?>
	<div id="r_GnRH24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH24" for="x_GnRH24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH24" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH24->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH24" type="text/html"><span id="el_ivf_stimulation_chart_GnRH24">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH24" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH24->displayValueSeparatorAttribute() ?>" id="x_GnRH24" name="x_GnRH24"<?php echo $ivf_stimulation_chart_add->GnRH24->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH24->selectOptionListHtml("x_GnRH24") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH24->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH24") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->GnRH25->Visible) { // GnRH25 ?>
	<div id="r_GnRH25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_GnRH25" for="x_GnRH25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_GnRH25" type="text/html"><?php echo $ivf_stimulation_chart_add->GnRH25->caption() ?><?php echo $ivf_stimulation_chart_add->GnRH25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->GnRH25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_GnRH25" type="text/html"><span id="el_ivf_stimulation_chart_GnRH25">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_GnRH25" data-value-separator="<?php echo $ivf_stimulation_chart_add->GnRH25->displayValueSeparatorAttribute() ?>" id="x_GnRH25" name="x_GnRH25"<?php echo $ivf_stimulation_chart_add->GnRH25->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->GnRH25->selectOptionListHtml("x_GnRH25") ?>
		</select>
</div>
<?php echo $ivf_stimulation_chart_add->GnRH25->Lookup->getParamTag($ivf_stimulation_chart_add, "p_x_GnRH25") ?>
</span></script>
<?php echo $ivf_stimulation_chart_add->GnRH25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P414->Visible) { // P414 ?>
	<div id="r_P414" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P414" for="x_P414" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P414" type="text/html"><?php echo $ivf_stimulation_chart_add->P414->caption() ?><?php echo $ivf_stimulation_chart_add->P414->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P414->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P414" type="text/html"><span id="el_ivf_stimulation_chart_P414">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P414" name="x_P414" id="x_P414" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P414->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P414->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P414->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P414->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P415->Visible) { // P415 ?>
	<div id="r_P415" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P415" for="x_P415" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P415" type="text/html"><?php echo $ivf_stimulation_chart_add->P415->caption() ?><?php echo $ivf_stimulation_chart_add->P415->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P415->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P415" type="text/html"><span id="el_ivf_stimulation_chart_P415">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P415" name="x_P415" id="x_P415" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P415->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P415->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P415->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P415->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P416->Visible) { // P416 ?>
	<div id="r_P416" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P416" for="x_P416" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P416" type="text/html"><?php echo $ivf_stimulation_chart_add->P416->caption() ?><?php echo $ivf_stimulation_chart_add->P416->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P416->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P416" type="text/html"><span id="el_ivf_stimulation_chart_P416">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P416" name="x_P416" id="x_P416" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P416->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P416->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P416->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P416->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P417->Visible) { // P417 ?>
	<div id="r_P417" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P417" for="x_P417" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P417" type="text/html"><?php echo $ivf_stimulation_chart_add->P417->caption() ?><?php echo $ivf_stimulation_chart_add->P417->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P417->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P417" type="text/html"><span id="el_ivf_stimulation_chart_P417">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P417" name="x_P417" id="x_P417" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P417->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P417->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P417->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P417->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P418->Visible) { // P418 ?>
	<div id="r_P418" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P418" for="x_P418" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P418" type="text/html"><?php echo $ivf_stimulation_chart_add->P418->caption() ?><?php echo $ivf_stimulation_chart_add->P418->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P418->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P418" type="text/html"><span id="el_ivf_stimulation_chart_P418">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P418" name="x_P418" id="x_P418" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P418->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P418->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P418->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P418->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P419->Visible) { // P419 ?>
	<div id="r_P419" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P419" for="x_P419" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P419" type="text/html"><?php echo $ivf_stimulation_chart_add->P419->caption() ?><?php echo $ivf_stimulation_chart_add->P419->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P419->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P419" type="text/html"><span id="el_ivf_stimulation_chart_P419">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P419" name="x_P419" id="x_P419" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P419->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P419->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P419->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P419->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P420->Visible) { // P420 ?>
	<div id="r_P420" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P420" for="x_P420" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P420" type="text/html"><?php echo $ivf_stimulation_chart_add->P420->caption() ?><?php echo $ivf_stimulation_chart_add->P420->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P420->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P420" type="text/html"><span id="el_ivf_stimulation_chart_P420">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P420" name="x_P420" id="x_P420" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P420->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P420->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P420->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P420->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P421->Visible) { // P421 ?>
	<div id="r_P421" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P421" for="x_P421" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P421" type="text/html"><?php echo $ivf_stimulation_chart_add->P421->caption() ?><?php echo $ivf_stimulation_chart_add->P421->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P421->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P421" type="text/html"><span id="el_ivf_stimulation_chart_P421">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P421" name="x_P421" id="x_P421" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P421->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P421->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P421->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P421->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P422->Visible) { // P422 ?>
	<div id="r_P422" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P422" for="x_P422" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P422" type="text/html"><?php echo $ivf_stimulation_chart_add->P422->caption() ?><?php echo $ivf_stimulation_chart_add->P422->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P422->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P422" type="text/html"><span id="el_ivf_stimulation_chart_P422">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P422" name="x_P422" id="x_P422" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P422->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P422->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P422->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P422->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P423->Visible) { // P423 ?>
	<div id="r_P423" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P423" for="x_P423" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P423" type="text/html"><?php echo $ivf_stimulation_chart_add->P423->caption() ?><?php echo $ivf_stimulation_chart_add->P423->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P423->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P423" type="text/html"><span id="el_ivf_stimulation_chart_P423">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P423" name="x_P423" id="x_P423" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P423->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P423->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P423->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P423->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P424->Visible) { // P424 ?>
	<div id="r_P424" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P424" for="x_P424" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P424" type="text/html"><?php echo $ivf_stimulation_chart_add->P424->caption() ?><?php echo $ivf_stimulation_chart_add->P424->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P424->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P424" type="text/html"><span id="el_ivf_stimulation_chart_P424">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P424" name="x_P424" id="x_P424" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P424->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P424->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P424->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P424->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->P425->Visible) { // P425 ?>
	<div id="r_P425" class="form-group row">
		<label id="elh_ivf_stimulation_chart_P425" for="x_P425" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_P425" type="text/html"><?php echo $ivf_stimulation_chart_add->P425->caption() ?><?php echo $ivf_stimulation_chart_add->P425->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->P425->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_P425" type="text/html"><span id="el_ivf_stimulation_chart_P425">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_P425" name="x_P425" id="x_P425" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->P425->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->P425->EditValue ?>"<?php echo $ivf_stimulation_chart_add->P425->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->P425->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt14->Visible) { // USGRt14 ?>
	<div id="r_USGRt14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt14" for="x_USGRt14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt14" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt14->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt14" type="text/html"><span id="el_ivf_stimulation_chart_USGRt14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt14" name="x_USGRt14" id="x_USGRt14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt15->Visible) { // USGRt15 ?>
	<div id="r_USGRt15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt15" for="x_USGRt15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt15" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt15->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt15" type="text/html"><span id="el_ivf_stimulation_chart_USGRt15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt15" name="x_USGRt15" id="x_USGRt15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt16->Visible) { // USGRt16 ?>
	<div id="r_USGRt16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt16" for="x_USGRt16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt16" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt16->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt16" type="text/html"><span id="el_ivf_stimulation_chart_USGRt16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt16" name="x_USGRt16" id="x_USGRt16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt17->Visible) { // USGRt17 ?>
	<div id="r_USGRt17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt17" for="x_USGRt17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt17" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt17->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt17" type="text/html"><span id="el_ivf_stimulation_chart_USGRt17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt17" name="x_USGRt17" id="x_USGRt17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt18->Visible) { // USGRt18 ?>
	<div id="r_USGRt18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt18" for="x_USGRt18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt18" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt18->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt18" type="text/html"><span id="el_ivf_stimulation_chart_USGRt18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt18" name="x_USGRt18" id="x_USGRt18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt19->Visible) { // USGRt19 ?>
	<div id="r_USGRt19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt19" for="x_USGRt19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt19" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt19->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt19" type="text/html"><span id="el_ivf_stimulation_chart_USGRt19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt19" name="x_USGRt19" id="x_USGRt19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt20->Visible) { // USGRt20 ?>
	<div id="r_USGRt20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt20" for="x_USGRt20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt20" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt20->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt20" type="text/html"><span id="el_ivf_stimulation_chart_USGRt20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt20" name="x_USGRt20" id="x_USGRt20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt21->Visible) { // USGRt21 ?>
	<div id="r_USGRt21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt21" for="x_USGRt21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt21" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt21->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt21" type="text/html"><span id="el_ivf_stimulation_chart_USGRt21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt21" name="x_USGRt21" id="x_USGRt21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt22->Visible) { // USGRt22 ?>
	<div id="r_USGRt22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt22" for="x_USGRt22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt22" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt22->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt22" type="text/html"><span id="el_ivf_stimulation_chart_USGRt22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt22" name="x_USGRt22" id="x_USGRt22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt23->Visible) { // USGRt23 ?>
	<div id="r_USGRt23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt23" for="x_USGRt23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt23" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt23->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt23" type="text/html"><span id="el_ivf_stimulation_chart_USGRt23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt23" name="x_USGRt23" id="x_USGRt23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt24->Visible) { // USGRt24 ?>
	<div id="r_USGRt24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt24" for="x_USGRt24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt24" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt24->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt24" type="text/html"><span id="el_ivf_stimulation_chart_USGRt24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt24" name="x_USGRt24" id="x_USGRt24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGRt25->Visible) { // USGRt25 ?>
	<div id="r_USGRt25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGRt25" for="x_USGRt25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGRt25" type="text/html"><?php echo $ivf_stimulation_chart_add->USGRt25->caption() ?><?php echo $ivf_stimulation_chart_add->USGRt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGRt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGRt25" type="text/html"><span id="el_ivf_stimulation_chart_USGRt25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGRt25" name="x_USGRt25" id="x_USGRt25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGRt25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGRt25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGRt25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGRt25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt14->Visible) { // USGLt14 ?>
	<div id="r_USGLt14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt14" for="x_USGLt14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt14" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt14->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt14" type="text/html"><span id="el_ivf_stimulation_chart_USGLt14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt14" name="x_USGLt14" id="x_USGLt14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt15->Visible) { // USGLt15 ?>
	<div id="r_USGLt15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt15" for="x_USGLt15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt15" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt15->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt15" type="text/html"><span id="el_ivf_stimulation_chart_USGLt15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt15" name="x_USGLt15" id="x_USGLt15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt16->Visible) { // USGLt16 ?>
	<div id="r_USGLt16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt16" for="x_USGLt16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt16" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt16->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt16" type="text/html"><span id="el_ivf_stimulation_chart_USGLt16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt16" name="x_USGLt16" id="x_USGLt16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt17->Visible) { // USGLt17 ?>
	<div id="r_USGLt17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt17" for="x_USGLt17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt17" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt17->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt17" type="text/html"><span id="el_ivf_stimulation_chart_USGLt17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt17" name="x_USGLt17" id="x_USGLt17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt18->Visible) { // USGLt18 ?>
	<div id="r_USGLt18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt18" for="x_USGLt18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt18" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt18->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt18" type="text/html"><span id="el_ivf_stimulation_chart_USGLt18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt18" name="x_USGLt18" id="x_USGLt18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt19->Visible) { // USGLt19 ?>
	<div id="r_USGLt19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt19" for="x_USGLt19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt19" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt19->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt19" type="text/html"><span id="el_ivf_stimulation_chart_USGLt19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt19" name="x_USGLt19" id="x_USGLt19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt20->Visible) { // USGLt20 ?>
	<div id="r_USGLt20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt20" for="x_USGLt20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt20" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt20->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt20" type="text/html"><span id="el_ivf_stimulation_chart_USGLt20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt20" name="x_USGLt20" id="x_USGLt20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt21->Visible) { // USGLt21 ?>
	<div id="r_USGLt21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt21" for="x_USGLt21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt21" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt21->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt21" type="text/html"><span id="el_ivf_stimulation_chart_USGLt21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt21" name="x_USGLt21" id="x_USGLt21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt22->Visible) { // USGLt22 ?>
	<div id="r_USGLt22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt22" for="x_USGLt22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt22" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt22->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt22" type="text/html"><span id="el_ivf_stimulation_chart_USGLt22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt22" name="x_USGLt22" id="x_USGLt22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt23->Visible) { // USGLt23 ?>
	<div id="r_USGLt23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt23" for="x_USGLt23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt23" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt23->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt23" type="text/html"><span id="el_ivf_stimulation_chart_USGLt23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt23" name="x_USGLt23" id="x_USGLt23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt24->Visible) { // USGLt24 ?>
	<div id="r_USGLt24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt24" for="x_USGLt24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt24" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt24->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt24" type="text/html"><span id="el_ivf_stimulation_chart_USGLt24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt24" name="x_USGLt24" id="x_USGLt24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->USGLt25->Visible) { // USGLt25 ?>
	<div id="r_USGLt25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_USGLt25" for="x_USGLt25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_USGLt25" type="text/html"><?php echo $ivf_stimulation_chart_add->USGLt25->caption() ?><?php echo $ivf_stimulation_chart_add->USGLt25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->USGLt25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_USGLt25" type="text/html"><span id="el_ivf_stimulation_chart_USGLt25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_USGLt25" name="x_USGLt25" id="x_USGLt25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->USGLt25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->USGLt25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->USGLt25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->USGLt25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM14->Visible) { // EM14 ?>
	<div id="r_EM14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM14" for="x_EM14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM14" type="text/html"><?php echo $ivf_stimulation_chart_add->EM14->caption() ?><?php echo $ivf_stimulation_chart_add->EM14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM14" type="text/html"><span id="el_ivf_stimulation_chart_EM14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM14" name="x_EM14" id="x_EM14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM15->Visible) { // EM15 ?>
	<div id="r_EM15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM15" for="x_EM15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM15" type="text/html"><?php echo $ivf_stimulation_chart_add->EM15->caption() ?><?php echo $ivf_stimulation_chart_add->EM15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM15" type="text/html"><span id="el_ivf_stimulation_chart_EM15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM15" name="x_EM15" id="x_EM15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM16->Visible) { // EM16 ?>
	<div id="r_EM16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM16" for="x_EM16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM16" type="text/html"><?php echo $ivf_stimulation_chart_add->EM16->caption() ?><?php echo $ivf_stimulation_chart_add->EM16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM16" type="text/html"><span id="el_ivf_stimulation_chart_EM16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM16" name="x_EM16" id="x_EM16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM17->Visible) { // EM17 ?>
	<div id="r_EM17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM17" for="x_EM17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM17" type="text/html"><?php echo $ivf_stimulation_chart_add->EM17->caption() ?><?php echo $ivf_stimulation_chart_add->EM17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM17" type="text/html"><span id="el_ivf_stimulation_chart_EM17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM17" name="x_EM17" id="x_EM17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM18->Visible) { // EM18 ?>
	<div id="r_EM18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM18" for="x_EM18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM18" type="text/html"><?php echo $ivf_stimulation_chart_add->EM18->caption() ?><?php echo $ivf_stimulation_chart_add->EM18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM18" type="text/html"><span id="el_ivf_stimulation_chart_EM18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM18" name="x_EM18" id="x_EM18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM19->Visible) { // EM19 ?>
	<div id="r_EM19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM19" for="x_EM19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM19" type="text/html"><?php echo $ivf_stimulation_chart_add->EM19->caption() ?><?php echo $ivf_stimulation_chart_add->EM19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM19" type="text/html"><span id="el_ivf_stimulation_chart_EM19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM19" name="x_EM19" id="x_EM19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM20->Visible) { // EM20 ?>
	<div id="r_EM20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM20" for="x_EM20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM20" type="text/html"><?php echo $ivf_stimulation_chart_add->EM20->caption() ?><?php echo $ivf_stimulation_chart_add->EM20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM20" type="text/html"><span id="el_ivf_stimulation_chart_EM20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM20" name="x_EM20" id="x_EM20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM21->Visible) { // EM21 ?>
	<div id="r_EM21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM21" for="x_EM21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM21" type="text/html"><?php echo $ivf_stimulation_chart_add->EM21->caption() ?><?php echo $ivf_stimulation_chart_add->EM21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM21" type="text/html"><span id="el_ivf_stimulation_chart_EM21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM21" name="x_EM21" id="x_EM21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM22->Visible) { // EM22 ?>
	<div id="r_EM22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM22" for="x_EM22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM22" type="text/html"><?php echo $ivf_stimulation_chart_add->EM22->caption() ?><?php echo $ivf_stimulation_chart_add->EM22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM22" type="text/html"><span id="el_ivf_stimulation_chart_EM22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM22" name="x_EM22" id="x_EM22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM23->Visible) { // EM23 ?>
	<div id="r_EM23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM23" for="x_EM23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM23" type="text/html"><?php echo $ivf_stimulation_chart_add->EM23->caption() ?><?php echo $ivf_stimulation_chart_add->EM23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM23" type="text/html"><span id="el_ivf_stimulation_chart_EM23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM23" name="x_EM23" id="x_EM23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM24->Visible) { // EM24 ?>
	<div id="r_EM24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM24" for="x_EM24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM24" type="text/html"><?php echo $ivf_stimulation_chart_add->EM24->caption() ?><?php echo $ivf_stimulation_chart_add->EM24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM24" type="text/html"><span id="el_ivf_stimulation_chart_EM24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM24" name="x_EM24" id="x_EM24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EM25->Visible) { // EM25 ?>
	<div id="r_EM25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EM25" for="x_EM25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EM25" type="text/html"><?php echo $ivf_stimulation_chart_add->EM25->caption() ?><?php echo $ivf_stimulation_chart_add->EM25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EM25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EM25" type="text/html"><span id="el_ivf_stimulation_chart_EM25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EM25" name="x_EM25" id="x_EM25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EM25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EM25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EM25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->EM25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others14->Visible) { // Others14 ?>
	<div id="r_Others14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others14" for="x_Others14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others14" type="text/html"><?php echo $ivf_stimulation_chart_add->Others14->caption() ?><?php echo $ivf_stimulation_chart_add->Others14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others14" type="text/html"><span id="el_ivf_stimulation_chart_Others14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others14" name="x_Others14" id="x_Others14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others15->Visible) { // Others15 ?>
	<div id="r_Others15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others15" for="x_Others15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others15" type="text/html"><?php echo $ivf_stimulation_chart_add->Others15->caption() ?><?php echo $ivf_stimulation_chart_add->Others15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others15" type="text/html"><span id="el_ivf_stimulation_chart_Others15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others15" name="x_Others15" id="x_Others15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others16->Visible) { // Others16 ?>
	<div id="r_Others16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others16" for="x_Others16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others16" type="text/html"><?php echo $ivf_stimulation_chart_add->Others16->caption() ?><?php echo $ivf_stimulation_chart_add->Others16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others16" type="text/html"><span id="el_ivf_stimulation_chart_Others16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others16" name="x_Others16" id="x_Others16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others17->Visible) { // Others17 ?>
	<div id="r_Others17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others17" for="x_Others17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others17" type="text/html"><?php echo $ivf_stimulation_chart_add->Others17->caption() ?><?php echo $ivf_stimulation_chart_add->Others17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others17" type="text/html"><span id="el_ivf_stimulation_chart_Others17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others17" name="x_Others17" id="x_Others17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others18->Visible) { // Others18 ?>
	<div id="r_Others18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others18" for="x_Others18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others18" type="text/html"><?php echo $ivf_stimulation_chart_add->Others18->caption() ?><?php echo $ivf_stimulation_chart_add->Others18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others18" type="text/html"><span id="el_ivf_stimulation_chart_Others18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others18" name="x_Others18" id="x_Others18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others19->Visible) { // Others19 ?>
	<div id="r_Others19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others19" for="x_Others19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others19" type="text/html"><?php echo $ivf_stimulation_chart_add->Others19->caption() ?><?php echo $ivf_stimulation_chart_add->Others19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others19" type="text/html"><span id="el_ivf_stimulation_chart_Others19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others19" name="x_Others19" id="x_Others19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others20->Visible) { // Others20 ?>
	<div id="r_Others20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others20" for="x_Others20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others20" type="text/html"><?php echo $ivf_stimulation_chart_add->Others20->caption() ?><?php echo $ivf_stimulation_chart_add->Others20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others20" type="text/html"><span id="el_ivf_stimulation_chart_Others20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others20" name="x_Others20" id="x_Others20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others21->Visible) { // Others21 ?>
	<div id="r_Others21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others21" for="x_Others21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others21" type="text/html"><?php echo $ivf_stimulation_chart_add->Others21->caption() ?><?php echo $ivf_stimulation_chart_add->Others21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others21" type="text/html"><span id="el_ivf_stimulation_chart_Others21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others21" name="x_Others21" id="x_Others21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others22->Visible) { // Others22 ?>
	<div id="r_Others22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others22" for="x_Others22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others22" type="text/html"><?php echo $ivf_stimulation_chart_add->Others22->caption() ?><?php echo $ivf_stimulation_chart_add->Others22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others22" type="text/html"><span id="el_ivf_stimulation_chart_Others22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others22" name="x_Others22" id="x_Others22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others23->Visible) { // Others23 ?>
	<div id="r_Others23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others23" for="x_Others23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others23" type="text/html"><?php echo $ivf_stimulation_chart_add->Others23->caption() ?><?php echo $ivf_stimulation_chart_add->Others23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others23" type="text/html"><span id="el_ivf_stimulation_chart_Others23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others23" name="x_Others23" id="x_Others23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others24->Visible) { // Others24 ?>
	<div id="r_Others24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others24" for="x_Others24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others24" type="text/html"><?php echo $ivf_stimulation_chart_add->Others24->caption() ?><?php echo $ivf_stimulation_chart_add->Others24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others24" type="text/html"><span id="el_ivf_stimulation_chart_Others24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others24" name="x_Others24" id="x_Others24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->Others25->Visible) { // Others25 ?>
	<div id="r_Others25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_Others25" for="x_Others25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_Others25" type="text/html"><?php echo $ivf_stimulation_chart_add->Others25->caption() ?><?php echo $ivf_stimulation_chart_add->Others25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->Others25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_Others25" type="text/html"><span id="el_ivf_stimulation_chart_Others25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_Others25" name="x_Others25" id="x_Others25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->Others25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->Others25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->Others25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->Others25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR14->Visible) { // DR14 ?>
	<div id="r_DR14" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR14" for="x_DR14" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR14" type="text/html"><?php echo $ivf_stimulation_chart_add->DR14->caption() ?><?php echo $ivf_stimulation_chart_add->DR14->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR14->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR14" type="text/html"><span id="el_ivf_stimulation_chart_DR14">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR14" name="x_DR14" id="x_DR14" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR14->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR14->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR14->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR14->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR15->Visible) { // DR15 ?>
	<div id="r_DR15" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR15" for="x_DR15" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR15" type="text/html"><?php echo $ivf_stimulation_chart_add->DR15->caption() ?><?php echo $ivf_stimulation_chart_add->DR15->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR15->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR15" type="text/html"><span id="el_ivf_stimulation_chart_DR15">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR15" name="x_DR15" id="x_DR15" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR15->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR15->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR15->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR15->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR16->Visible) { // DR16 ?>
	<div id="r_DR16" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR16" for="x_DR16" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR16" type="text/html"><?php echo $ivf_stimulation_chart_add->DR16->caption() ?><?php echo $ivf_stimulation_chart_add->DR16->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR16->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR16" type="text/html"><span id="el_ivf_stimulation_chart_DR16">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR16" name="x_DR16" id="x_DR16" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR16->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR16->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR16->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR16->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR17->Visible) { // DR17 ?>
	<div id="r_DR17" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR17" for="x_DR17" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR17" type="text/html"><?php echo $ivf_stimulation_chart_add->DR17->caption() ?><?php echo $ivf_stimulation_chart_add->DR17->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR17->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR17" type="text/html"><span id="el_ivf_stimulation_chart_DR17">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR17" name="x_DR17" id="x_DR17" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR17->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR17->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR17->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR17->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR18->Visible) { // DR18 ?>
	<div id="r_DR18" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR18" for="x_DR18" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR18" type="text/html"><?php echo $ivf_stimulation_chart_add->DR18->caption() ?><?php echo $ivf_stimulation_chart_add->DR18->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR18->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR18" type="text/html"><span id="el_ivf_stimulation_chart_DR18">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR18" name="x_DR18" id="x_DR18" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR18->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR18->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR18->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR18->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR19->Visible) { // DR19 ?>
	<div id="r_DR19" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR19" for="x_DR19" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR19" type="text/html"><?php echo $ivf_stimulation_chart_add->DR19->caption() ?><?php echo $ivf_stimulation_chart_add->DR19->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR19->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR19" type="text/html"><span id="el_ivf_stimulation_chart_DR19">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR19" name="x_DR19" id="x_DR19" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR19->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR19->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR19->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR19->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR20->Visible) { // DR20 ?>
	<div id="r_DR20" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR20" for="x_DR20" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR20" type="text/html"><?php echo $ivf_stimulation_chart_add->DR20->caption() ?><?php echo $ivf_stimulation_chart_add->DR20->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR20->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR20" type="text/html"><span id="el_ivf_stimulation_chart_DR20">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR20" name="x_DR20" id="x_DR20" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR20->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR20->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR20->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR20->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR21->Visible) { // DR21 ?>
	<div id="r_DR21" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR21" for="x_DR21" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR21" type="text/html"><?php echo $ivf_stimulation_chart_add->DR21->caption() ?><?php echo $ivf_stimulation_chart_add->DR21->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR21->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR21" type="text/html"><span id="el_ivf_stimulation_chart_DR21">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR21" name="x_DR21" id="x_DR21" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR21->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR21->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR21->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR21->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR22->Visible) { // DR22 ?>
	<div id="r_DR22" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR22" for="x_DR22" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR22" type="text/html"><?php echo $ivf_stimulation_chart_add->DR22->caption() ?><?php echo $ivf_stimulation_chart_add->DR22->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR22->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR22" type="text/html"><span id="el_ivf_stimulation_chart_DR22">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR22" name="x_DR22" id="x_DR22" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR22->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR22->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR22->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR22->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR23->Visible) { // DR23 ?>
	<div id="r_DR23" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR23" for="x_DR23" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR23" type="text/html"><?php echo $ivf_stimulation_chart_add->DR23->caption() ?><?php echo $ivf_stimulation_chart_add->DR23->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR23->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR23" type="text/html"><span id="el_ivf_stimulation_chart_DR23">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR23" name="x_DR23" id="x_DR23" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR23->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR23->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR23->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR23->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR24->Visible) { // DR24 ?>
	<div id="r_DR24" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR24" for="x_DR24" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR24" type="text/html"><?php echo $ivf_stimulation_chart_add->DR24->caption() ?><?php echo $ivf_stimulation_chart_add->DR24->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR24->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR24" type="text/html"><span id="el_ivf_stimulation_chart_DR24">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR24" name="x_DR24" id="x_DR24" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR24->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR24->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR24->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR24->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DR25->Visible) { // DR25 ?>
	<div id="r_DR25" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DR25" for="x_DR25" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DR25" type="text/html"><?php echo $ivf_stimulation_chart_add->DR25->caption() ?><?php echo $ivf_stimulation_chart_add->DR25->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DR25->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DR25" type="text/html"><span id="el_ivf_stimulation_chart_DR25">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_DR25" name="x_DR25" id="x_DR25" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->DR25->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->DR25->EditValue ?>"<?php echo $ivf_stimulation_chart_add->DR25->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->DR25->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E214->Visible) { // E214 ?>
	<div id="r_E214" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E214" for="x_E214" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E214" type="text/html"><?php echo $ivf_stimulation_chart_add->E214->caption() ?><?php echo $ivf_stimulation_chart_add->E214->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E214->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E214" type="text/html"><span id="el_ivf_stimulation_chart_E214">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E214" name="x_E214" id="x_E214" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E214->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E214->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E214->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E214->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E215->Visible) { // E215 ?>
	<div id="r_E215" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E215" for="x_E215" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E215" type="text/html"><?php echo $ivf_stimulation_chart_add->E215->caption() ?><?php echo $ivf_stimulation_chart_add->E215->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E215->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E215" type="text/html"><span id="el_ivf_stimulation_chart_E215">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E215" name="x_E215" id="x_E215" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E215->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E215->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E215->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E215->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E216->Visible) { // E216 ?>
	<div id="r_E216" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E216" for="x_E216" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E216" type="text/html"><?php echo $ivf_stimulation_chart_add->E216->caption() ?><?php echo $ivf_stimulation_chart_add->E216->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E216->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E216" type="text/html"><span id="el_ivf_stimulation_chart_E216">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E216" name="x_E216" id="x_E216" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E216->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E216->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E216->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E216->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E217->Visible) { // E217 ?>
	<div id="r_E217" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E217" for="x_E217" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E217" type="text/html"><?php echo $ivf_stimulation_chart_add->E217->caption() ?><?php echo $ivf_stimulation_chart_add->E217->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E217->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E217" type="text/html"><span id="el_ivf_stimulation_chart_E217">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E217" name="x_E217" id="x_E217" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E217->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E217->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E217->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E217->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E218->Visible) { // E218 ?>
	<div id="r_E218" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E218" for="x_E218" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E218" type="text/html"><?php echo $ivf_stimulation_chart_add->E218->caption() ?><?php echo $ivf_stimulation_chart_add->E218->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E218->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E218" type="text/html"><span id="el_ivf_stimulation_chart_E218">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E218" name="x_E218" id="x_E218" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E218->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E218->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E218->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E218->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E219->Visible) { // E219 ?>
	<div id="r_E219" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E219" for="x_E219" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E219" type="text/html"><?php echo $ivf_stimulation_chart_add->E219->caption() ?><?php echo $ivf_stimulation_chart_add->E219->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E219->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E219" type="text/html"><span id="el_ivf_stimulation_chart_E219">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E219" name="x_E219" id="x_E219" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E219->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E219->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E219->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E219->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E220->Visible) { // E220 ?>
	<div id="r_E220" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E220" for="x_E220" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E220" type="text/html"><?php echo $ivf_stimulation_chart_add->E220->caption() ?><?php echo $ivf_stimulation_chart_add->E220->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E220->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E220" type="text/html"><span id="el_ivf_stimulation_chart_E220">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E220" name="x_E220" id="x_E220" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E220->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E220->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E220->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E220->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E221->Visible) { // E221 ?>
	<div id="r_E221" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E221" for="x_E221" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E221" type="text/html"><?php echo $ivf_stimulation_chart_add->E221->caption() ?><?php echo $ivf_stimulation_chart_add->E221->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E221->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E221" type="text/html"><span id="el_ivf_stimulation_chart_E221">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E221" name="x_E221" id="x_E221" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E221->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E221->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E221->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E221->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E222->Visible) { // E222 ?>
	<div id="r_E222" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E222" for="x_E222" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E222" type="text/html"><?php echo $ivf_stimulation_chart_add->E222->caption() ?><?php echo $ivf_stimulation_chart_add->E222->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E222->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E222" type="text/html"><span id="el_ivf_stimulation_chart_E222">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E222" name="x_E222" id="x_E222" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E222->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E222->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E222->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E222->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E223->Visible) { // E223 ?>
	<div id="r_E223" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E223" for="x_E223" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E223" type="text/html"><?php echo $ivf_stimulation_chart_add->E223->caption() ?><?php echo $ivf_stimulation_chart_add->E223->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E223->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E223" type="text/html"><span id="el_ivf_stimulation_chart_E223">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E223" name="x_E223" id="x_E223" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E223->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E223->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E223->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E223->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E224->Visible) { // E224 ?>
	<div id="r_E224" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E224" for="x_E224" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E224" type="text/html"><?php echo $ivf_stimulation_chart_add->E224->caption() ?><?php echo $ivf_stimulation_chart_add->E224->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E224->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E224" type="text/html"><span id="el_ivf_stimulation_chart_E224">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E224" name="x_E224" id="x_E224" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E224->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E224->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E224->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E224->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->E225->Visible) { // E225 ?>
	<div id="r_E225" class="form-group row">
		<label id="elh_ivf_stimulation_chart_E225" for="x_E225" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_E225" type="text/html"><?php echo $ivf_stimulation_chart_add->E225->caption() ?><?php echo $ivf_stimulation_chart_add->E225->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->E225->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_E225" type="text/html"><span id="el_ivf_stimulation_chart_E225">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_E225" name="x_E225" id="x_E225" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->E225->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->E225->EditValue ?>"<?php echo $ivf_stimulation_chart_add->E225->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->E225->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EEETTTDTE->Visible) { // EEETTTDTE ?>
	<div id="r_EEETTTDTE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EEETTTDTE" for="x_EEETTTDTE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EEETTTDTE" type="text/html"><?php echo $ivf_stimulation_chart_add->EEETTTDTE->caption() ?><?php echo $ivf_stimulation_chart_add->EEETTTDTE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EEETTTDTE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EEETTTDTE" type="text/html"><span id="el_ivf_stimulation_chart_EEETTTDTE">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EEETTTDTE" data-format="7" name="x_EEETTTDTE" id="x_EEETTTDTE" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EEETTTDTE->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EEETTTDTE->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EEETTTDTE->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->EEETTTDTE->ReadOnly && !$ivf_stimulation_chart_add->EEETTTDTE->Disabled && !isset($ivf_stimulation_chart_add->EEETTTDTE->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->EEETTTDTE->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_EEETTTDTE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->EEETTTDTE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->bhcgdate->Visible) { // bhcgdate ?>
	<div id="r_bhcgdate" class="form-group row">
		<label id="elh_ivf_stimulation_chart_bhcgdate" for="x_bhcgdate" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_bhcgdate" type="text/html"><?php echo $ivf_stimulation_chart_add->bhcgdate->caption() ?><?php echo $ivf_stimulation_chart_add->bhcgdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->bhcgdate->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_bhcgdate" type="text/html"><span id="el_ivf_stimulation_chart_bhcgdate">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_bhcgdate" data-format="7" name="x_bhcgdate" id="x_bhcgdate" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->bhcgdate->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->bhcgdate->EditValue ?>"<?php echo $ivf_stimulation_chart_add->bhcgdate->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->bhcgdate->ReadOnly && !$ivf_stimulation_chart_add->bhcgdate->Disabled && !isset($ivf_stimulation_chart_add->bhcgdate->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->bhcgdate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_bhcgdate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_stimulation_chart_add->bhcgdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
	<div id="r_TUBAL_PATENCY" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TUBAL_PATENCY" for="x_TUBAL_PATENCY" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->caption() ?><?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TUBAL_PATENCY" type="text/html"><span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_TUBAL_PATENCY" data-value-separator="<?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->displayValueSeparatorAttribute() ?>" id="x_TUBAL_PATENCY" name="x_TUBAL_PATENCY"<?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->selectOptionListHtml("x_TUBAL_PATENCY") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->TUBAL_PATENCY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->HSG->Visible) { // HSG ?>
	<div id="r_HSG" class="form-group row">
		<label id="elh_ivf_stimulation_chart_HSG" for="x_HSG" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_HSG" type="text/html"><?php echo $ivf_stimulation_chart_add->HSG->caption() ?><?php echo $ivf_stimulation_chart_add->HSG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->HSG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_HSG" type="text/html"><span id="el_ivf_stimulation_chart_HSG">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_HSG" data-value-separator="<?php echo $ivf_stimulation_chart_add->HSG->displayValueSeparatorAttribute() ?>" id="x_HSG" name="x_HSG"<?php echo $ivf_stimulation_chart_add->HSG->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->HSG->selectOptionListHtml("x_HSG") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->HSG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->DHL->Visible) { // DHL ?>
	<div id="r_DHL" class="form-group row">
		<label id="elh_ivf_stimulation_chart_DHL" for="x_DHL" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_DHL" type="text/html"><?php echo $ivf_stimulation_chart_add->DHL->caption() ?><?php echo $ivf_stimulation_chart_add->DHL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->DHL->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_DHL" type="text/html"><span id="el_ivf_stimulation_chart_DHL">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_DHL" data-value-separator="<?php echo $ivf_stimulation_chart_add->DHL->displayValueSeparatorAttribute() ?>" id="x_DHL" name="x_DHL"<?php echo $ivf_stimulation_chart_add->DHL->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->DHL->selectOptionListHtml("x_DHL") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->DHL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
	<div id="r_UTERINE_PROBLEMS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" for="x_UTERINE_PROBLEMS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->caption() ?><?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_UTERINE_PROBLEMS" data-value-separator="<?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_UTERINE_PROBLEMS" name="x_UTERINE_PROBLEMS"<?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->selectOptionListHtml("x_UTERINE_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->UTERINE_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
	<div id="r_W_COMORBIDS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_W_COMORBIDS" for="x_W_COMORBIDS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_add->W_COMORBIDS->caption() ?><?php echo $ivf_stimulation_chart_add->W_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->W_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_W_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_W_COMORBIDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_W_COMORBIDS" data-value-separator="<?php echo $ivf_stimulation_chart_add->W_COMORBIDS->displayValueSeparatorAttribute() ?>" id="x_W_COMORBIDS" name="x_W_COMORBIDS"<?php echo $ivf_stimulation_chart_add->W_COMORBIDS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->W_COMORBIDS->selectOptionListHtml("x_W_COMORBIDS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->W_COMORBIDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
	<div id="r_H_COMORBIDS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_H_COMORBIDS" for="x_H_COMORBIDS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><?php echo $ivf_stimulation_chart_add->H_COMORBIDS->caption() ?><?php echo $ivf_stimulation_chart_add->H_COMORBIDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->H_COMORBIDS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_H_COMORBIDS" type="text/html"><span id="el_ivf_stimulation_chart_H_COMORBIDS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_H_COMORBIDS" data-value-separator="<?php echo $ivf_stimulation_chart_add->H_COMORBIDS->displayValueSeparatorAttribute() ?>" id="x_H_COMORBIDS" name="x_H_COMORBIDS"<?php echo $ivf_stimulation_chart_add->H_COMORBIDS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->H_COMORBIDS->selectOptionListHtml("x_H_COMORBIDS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->H_COMORBIDS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
	<div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" for="x_SEXUAL_DYSFUNCTION" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->caption() ?><?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" type="text/html"><span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SEXUAL_DYSFUNCTION" data-value-separator="<?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->displayValueSeparatorAttribute() ?>" id="x_SEXUAL_DYSFUNCTION" name="x_SEXUAL_DYSFUNCTION"<?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->selectOptionListHtml("x_SEXUAL_DYSFUNCTION") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->SEXUAL_DYSFUNCTION->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->TABLETS->Visible) { // TABLETS ?>
	<div id="r_TABLETS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_TABLETS" for="x_TABLETS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_TABLETS" type="text/html"><?php echo $ivf_stimulation_chart_add->TABLETS->caption() ?><?php echo $ivf_stimulation_chart_add->TABLETS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->TABLETS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_TABLETS" type="text/html"><span id="el_ivf_stimulation_chart_TABLETS">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->TABLETS->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->TABLETS->EditValue ?>"<?php echo $ivf_stimulation_chart_add->TABLETS->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->TABLETS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
	<div id="r_FOLLICLE_STATUS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" for="x_FOLLICLE_STATUS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->caption() ?><?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS" type="text/html"><span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_FOLLICLE_STATUS" data-value-separator="<?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->displayValueSeparatorAttribute() ?>" id="x_FOLLICLE_STATUS" name="x_FOLLICLE_STATUS"<?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->selectOptionListHtml("x_FOLLICLE_STATUS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->FOLLICLE_STATUS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
	<div id="r_NUMBER_OF_IUI" class="form-group row">
		<label id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" for="x_NUMBER_OF_IUI" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->caption() ?><?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI" type="text/html"><span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_NUMBER_OF_IUI" data-value-separator="<?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->displayValueSeparatorAttribute() ?>" id="x_NUMBER_OF_IUI" name="x_NUMBER_OF_IUI"<?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->selectOptionListHtml("x_NUMBER_OF_IUI") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->NUMBER_OF_IUI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->PROCEDURE->Visible) { // PROCEDURE ?>
	<div id="r_PROCEDURE" class="form-group row">
		<label id="elh_ivf_stimulation_chart_PROCEDURE" for="x_PROCEDURE" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_PROCEDURE" type="text/html"><?php echo $ivf_stimulation_chart_add->PROCEDURE->caption() ?><?php echo $ivf_stimulation_chart_add->PROCEDURE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->PROCEDURE->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_PROCEDURE" type="text/html"><span id="el_ivf_stimulation_chart_PROCEDURE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_PROCEDURE" data-value-separator="<?php echo $ivf_stimulation_chart_add->PROCEDURE->displayValueSeparatorAttribute() ?>" id="x_PROCEDURE" name="x_PROCEDURE"<?php echo $ivf_stimulation_chart_add->PROCEDURE->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->PROCEDURE->selectOptionListHtml("x_PROCEDURE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->PROCEDURE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
	<div id="r_LUTEAL_SUPPORT" class="form-group row">
		<label id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" for="x_LUTEAL_SUPPORT" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->caption() ?><?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT" type="text/html"><span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_LUTEAL_SUPPORT" data-value-separator="<?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->displayValueSeparatorAttribute() ?>" id="x_LUTEAL_SUPPORT" name="x_LUTEAL_SUPPORT"<?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->selectOptionListHtml("x_LUTEAL_SUPPORT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->LUTEAL_SUPPORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
	<div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
		<label id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->caption() ?><?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" type="text/html"><span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_stimulation_chart" data-field="x_SPECIFIC_MATERNAL_PROBLEMS" data-value-separator="<?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_MATERNAL_PROBLEMS" name="x_SPECIFIC_MATERNAL_PROBLEMS"<?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?>>
			<?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->selectOptionListHtml("x_SPECIFIC_MATERNAL_PROBLEMS") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_stimulation_chart_add->SPECIFIC_MATERNAL_PROBLEMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
	<div id="r_ONGOING_PREG" class="form-group row">
		<label id="elh_ivf_stimulation_chart_ONGOING_PREG" for="x_ONGOING_PREG" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><?php echo $ivf_stimulation_chart_add->ONGOING_PREG->caption() ?><?php echo $ivf_stimulation_chart_add->ONGOING_PREG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->ONGOING_PREG->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_ONGOING_PREG" type="text/html"><span id="el_ivf_stimulation_chart_ONGOING_PREG">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->ONGOING_PREG->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->ONGOING_PREG->EditValue ?>"<?php echo $ivf_stimulation_chart_add->ONGOING_PREG->editAttributes() ?>>
</span></script>
<?php echo $ivf_stimulation_chart_add->ONGOING_PREG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_stimulation_chart_add->EDD_Date->Visible) { // EDD_Date ?>
	<div id="r_EDD_Date" class="form-group row">
		<label id="elh_ivf_stimulation_chart_EDD_Date" for="x_EDD_Date" class="<?php echo $ivf_stimulation_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_stimulation_chart_EDD_Date" type="text/html"><?php echo $ivf_stimulation_chart_add->EDD_Date->caption() ?><?php echo $ivf_stimulation_chart_add->EDD_Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_stimulation_chart_add->RightColumnClass ?>"><div <?php echo $ivf_stimulation_chart_add->EDD_Date->cellAttributes() ?>>
<script id="tpx_ivf_stimulation_chart_EDD_Date" type="text/html"><span id="el_ivf_stimulation_chart_EDD_Date">
<input type="text" data-table="ivf_stimulation_chart" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?php echo HtmlEncode($ivf_stimulation_chart_add->EDD_Date->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_chart_add->EDD_Date->EditValue ?>"<?php echo $ivf_stimulation_chart_add->EDD_Date->editAttributes() ?>>
<?php if (!$ivf_stimulation_chart_add->EDD_Date->ReadOnly && !$ivf_stimulation_chart_add->EDD_Date->Disabled && !isset($ivf_stimulation_chart_add->EDD_Date->EditAttrs["readonly"]) && !isset($ivf_stimulation_chart_add->EDD_Date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_stimulation_chartadd_js">
loadjs.ready(["fivf_stimulation_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_stimulation_chartadd", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_stimulation_chart_add->EDD_Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_stimulation_chartadd" class="ew-custom-template"></div>
<script id="tpm_ivf_stimulation_chartadd" type="text/html">
<div id="ct_ivf_stimulation_chart_add"><style>
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
</div>
<div id="AllFreezeCancelReason" class="row">
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
<table id="PreProcedureOrderPPOOUU" class="ew-table" style="width:100%;">
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

<?php if (!$ivf_stimulation_chart_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_stimulation_chart_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_chart_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_stimulation_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_stimulation_chartadd", "tpm_ivf_stimulation_chartadd", "ivf_stimulation_chartadd", "<?php echo $ivf_stimulation_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_stimulation_chartadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_stimulation_chart_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_StChDate1").style.width="220px",document.getElementById("x_StChDate2").style.width="220px",document.getElementById("x_StChDate3").style.width="220px",document.getElementById("x_StChDate4").style.width="220px",document.getElementById("x_StChDate5").style.width="220px",document.getElementById("x_StChDate6").style.width="220px",document.getElementById("x_StChDate7").style.width="220px",document.getElementById("x_StChDate8").style.width="220px",document.getElementById("x_StChDate9").style.width="220px",document.getElementById("x_StChDate10").style.width="220px",document.getElementById("x_StChDate11").style.width="220px",document.getElementById("x_StChDate12").style.width="220px",document.getElementById("x_StChDate13").style.width="220px",document.getElementById("x_StChDate14").style.width="220px",document.getElementById("x_StChDate15").style.width="220px",document.getElementById("x_StChDate16").style.width="220px",document.getElementById("x_StChDate17").style.width="220px",document.getElementById("x_StChDate18").style.width="220px",document.getElementById("x_StChDate19").style.width="220px",document.getElementById("x_StChDate20").style.width="220px",document.getElementById("x_StChDate21").style.width="220px",document.getElementById("x_StChDate22").style.width="220px",document.getElementById("x_StChDate23").style.width="220px",document.getElementById("x_StChDate24").style.width="220px",document.getElementById("x_StChDate25").style.width="220px",document.getElementById("x_CycleDay1").style.width="80px",document.getElementById("x_CycleDay2").style.width="80px",document.getElementById("x_CycleDay3").style.width="80px",document.getElementById("x_CycleDay4").style.width="80px",document.getElementById("x_CycleDay5").style.width="80px",document.getElementById("x_CycleDay6").style.width="80px",document.getElementById("x_CycleDay7").style.width="80px",document.getElementById("x_CycleDay8").style.width="80px",document.getElementById("x_CycleDay9").style.width="80px",document.getElementById("x_CycleDay10").style.width="80px",document.getElementById("x_CycleDay11").style.width="80px",document.getElementById("x_CycleDay12").style.width="80px",document.getElementById("x_CycleDay13").style.width="80px",document.getElementById("x_CycleDay14").style.width="80px",document.getElementById("x_CycleDay15").style.width="80px",document.getElementById("x_CycleDay16").style.width="80px",document.getElementById("x_CycleDay17").style.width="80px",document.getElementById("x_CycleDay18").style.width="80px",document.getElementById("x_CycleDay19").style.width="80px",document.getElementById("x_CycleDay20").style.width="80px",document.getElementById("x_CycleDay21").style.width="80px",document.getElementById("x_CycleDay22").style.width="80px",document.getElementById("x_CycleDay23").style.width="80px",document.getElementById("x_CycleDay24").style.width="80px",document.getElementById("x_CycleDay25").style.width="80px",document.getElementById("x_StimulationDay1").style.width="80px",document.getElementById("x_StimulationDay2").style.width="80px",document.getElementById("x_StimulationDay3").style.width="80px",document.getElementById("x_StimulationDay4").style.width="80px",document.getElementById("x_StimulationDay5").style.width="80px",document.getElementById("x_StimulationDay6").style.width="80px",document.getElementById("x_StimulationDay7").style.width="80px",document.getElementById("x_StimulationDay8").style.width="80px",document.getElementById("x_StimulationDay9").style.width="80px",document.getElementById("x_StimulationDay10").style.width="80px",document.getElementById("x_StimulationDay11").style.width="80px",document.getElementById("x_StimulationDay12").style.width="80px",document.getElementById("x_StimulationDay13").style.width="80px",document.getElementById("x_StimulationDay14").style.width="80px",document.getElementById("x_StimulationDay15").style.width="80px",document.getElementById("x_StimulationDay16").style.width="80px",document.getElementById("x_StimulationDay17").style.width="80px",document.getElementById("x_StimulationDay18").style.width="80px",document.getElementById("x_StimulationDay19").style.width="80px",document.getElementById("x_StimulationDay20").style.width="80px",document.getElementById("x_StimulationDay21").style.width="80px",document.getElementById("x_StimulationDay22").style.width="80px",document.getElementById("x_StimulationDay23").style.width="80px",document.getElementById("x_StimulationDay24").style.width="80px",document.getElementById("x_StimulationDay25").style.width="80px",document.getElementById("x_E21").style.width="80px",document.getElementById("x_E22").style.width="80px",document.getElementById("x_E23").style.width="80px",document.getElementById("x_E24").style.width="80px",document.getElementById("x_E25").style.width="80px",document.getElementById("x_E26").style.width="80px",document.getElementById("x_E27").style.width="80px",document.getElementById("x_E28").style.width="80px",document.getElementById("x_E29").style.width="80px",document.getElementById("x_E210").style.width="80px",document.getElementById("x_E211").style.width="80px",document.getElementById("x_E212").style.width="80px",document.getElementById("x_E213").style.width="80px",document.getElementById("x_E214").style.width="80px",document.getElementById("x_E215").style.width="80px",document.getElementById("x_E216").style.width="80px",document.getElementById("x_E217").style.width="80px",document.getElementById("x_E218").style.width="80px",document.getElementById("x_E219").style.width="80px",document.getElementById("x_E220").style.width="80px",document.getElementById("x_E221").style.width="80px",document.getElementById("x_E222").style.width="80px",document.getElementById("x_E223").style.width="80px",document.getElementById("x_E224").style.width="80px",document.getElementById("x_E225").style.width="80px",document.getElementById("x_P41").style.width="80px",document.getElementById("x_P42").style.width="80px",document.getElementById("x_P43").style.width="80px",document.getElementById("x_P44").style.width="80px",document.getElementById("x_P45").style.width="80px",document.getElementById("x_P46").style.width="80px",document.getElementById("x_P47").style.width="80px",document.getElementById("x_P48").style.width="80px",document.getElementById("x_P49").style.width="80px",document.getElementById("x_P410").style.width="80px",document.getElementById("x_P411").style.width="80px",document.getElementById("x_P412").style.width="80px",document.getElementById("x_P413").style.width="80px",document.getElementById("x_P414").style.width="80px",document.getElementById("x_P415").style.width="80px",document.getElementById("x_P416").style.width="80px",document.getElementById("x_P417").style.width="80px",document.getElementById("x_P418").style.width="80px",document.getElementById("x_P419").style.width="80px",document.getElementById("x_P420").style.width="80px",document.getElementById("x_P421").style.width="80px",document.getElementById("x_P422").style.width="80px",document.getElementById("x_P423").style.width="80px",document.getElementById("x_P424").style.width="80px",document.getElementById("x_P425").style.width="80px",document.getElementById("x_USGRt1").style.width="80px",document.getElementById("x_USGRt2").style.width="80px",document.getElementById("x_USGRt3").style.width="80px",document.getElementById("x_USGRt4").style.width="80px",document.getElementById("x_USGRt5").style.width="80px",document.getElementById("x_USGRt6").style.width="80px",document.getElementById("x_USGRt7").style.width="80px",document.getElementById("x_USGRt8").style.width="80px",document.getElementById("x_USGRt9").style.width="80px",document.getElementById("x_USGRt10").style.width="80px",document.getElementById("x_USGRt11").style.width="80px",document.getElementById("x_USGRt12").style.width="80px",document.getElementById("x_USGRt13").style.width="80px",document.getElementById("x_USGRt14").style.width="80px",document.getElementById("x_USGRt15").style.width="80px",document.getElementById("x_USGRt16").style.width="80px",document.getElementById("x_USGRt17").style.width="80px",document.getElementById("x_USGRt18").style.width="80px",document.getElementById("x_USGRt19").style.width="80px",document.getElementById("x_USGRt20").style.width="80px",document.getElementById("x_USGRt21").style.width="80px",document.getElementById("x_USGRt22").style.width="80px",document.getElementById("x_USGRt23").style.width="80px",document.getElementById("x_USGRt24").style.width="80px",document.getElementById("x_USGRt25").style.width="80px",document.getElementById("x_USGLt1").style.width="80px",document.getElementById("x_USGLt2").style.width="80px",document.getElementById("x_USGLt3").style.width="80px",document.getElementById("x_USGLt4").style.width="80px",document.getElementById("x_USGLt5").style.width="80px",document.getElementById("x_USGLt6").style.width="80px",document.getElementById("x_USGLt7").style.width="80px",document.getElementById("x_USGLt8").style.width="80px",document.getElementById("x_USGLt9").style.width="80px",document.getElementById("x_USGLt10").style.width="80px",document.getElementById("x_USGLt11").style.width="80px",document.getElementById("x_USGLt12").style.width="80px",document.getElementById("x_USGLt13").style.width="80px",document.getElementById("x_USGLt14").style.width="80px",document.getElementById("x_USGLt15").style.width="80px",document.getElementById("x_USGLt16").style.width="80px",document.getElementById("x_USGLt17").style.width="80px",document.getElementById("x_USGLt18").style.width="80px",document.getElementById("x_USGLt19").style.width="80px",document.getElementById("x_USGLt20").style.width="80px",document.getElementById("x_USGLt21").style.width="80px",document.getElementById("x_USGLt22").style.width="80px",document.getElementById("x_USGLt23").style.width="80px",document.getElementById("x_USGLt24").style.width="80px",document.getElementById("x_USGLt25").style.width="80px",document.getElementById("x_EM1").style.width="80px",document.getElementById("x_EM2").style.width="80px",document.getElementById("x_EM3").style.width="80px",document.getElementById("x_EM4").style.width="80px",document.getElementById("x_EM5").style.width="80px",document.getElementById("x_EM6").style.width="80px",document.getElementById("x_EM7").style.width="80px",document.getElementById("x_EM8").style.width="80px",document.getElementById("x_EM9").style.width="80px",document.getElementById("x_EM10").style.width="80px",document.getElementById("x_EM11").style.width="80px",document.getElementById("x_EM12").style.width="80px",document.getElementById("x_EM13").style.width="80px",document.getElementById("x_EM14").style.width="80px",document.getElementById("x_EM15").style.width="80px",document.getElementById("x_EM16").style.width="80px",document.getElementById("x_EM17").style.width="80px",document.getElementById("x_EM18").style.width="80px",document.getElementById("x_EM19").style.width="80px",document.getElementById("x_EM20").style.width="80px",document.getElementById("x_EM21").style.width="80px",document.getElementById("x_EM22").style.width="80px",document.getElementById("x_EM23").style.width="80px",document.getElementById("x_EM24").style.width="80px",document.getElementById("x_EM25").style.width="80px",document.getElementById("x_Others1").style.width="80px",document.getElementById("x_Others2").style.width="80px",document.getElementById("x_Others3").style.width="80px",document.getElementById("x_Others4").style.width="80px",document.getElementById("x_Others5").style.width="80px",document.getElementById("x_Others6").style.width="80px",document.getElementById("x_Others7").style.width="80px",document.getElementById("x_Others8").style.width="80px",document.getElementById("x_Others9").style.width="80px",document.getElementById("x_Others10").style.width="80px",document.getElementById("x_Others11").style.width="80px",document.getElementById("x_Others12").style.width="80px",document.getElementById("x_Others13").style.width="80px",document.getElementById("x_Others14").style.width="80px",document.getElementById("x_Others15").style.width="80px",document.getElementById("x_Others16").style.width="80px",document.getElementById("x_Others17").style.width="80px",document.getElementById("x_Others18").style.width="80px",document.getElementById("x_Others19").style.width="80px",document.getElementById("x_Others20").style.width="80px",document.getElementById("x_Others21").style.width="80px",document.getElementById("x_Others22").style.width="80px",document.getElementById("x_Others23").style.width="80px",document.getElementById("x_Others24").style.width="80px",document.getElementById("x_Others25").style.width="80px",document.getElementById("x_DR1").style.width="80px",document.getElementById("x_DR2").style.width="80px",document.getElementById("x_DR3").style.width="80px",document.getElementById("x_DR4").style.width="80px",document.getElementById("x_DR5").style.width="80px",document.getElementById("x_DR6").style.width="80px",document.getElementById("x_DR7").style.width="80px",document.getElementById("x_DR8").style.width="80px",document.getElementById("x_DR9").style.width="80px",document.getElementById("x_DR10").style.width="80px",document.getElementById("x_DR11").style.width="80px",document.getElementById("x_DR12").style.width="80px",document.getElementById("x_DR13").style.width="80px",document.getElementById("x_DR14").style.width="80px",document.getElementById("x_DR15").style.width="80px",document.getElementById("x_DR16").style.width="80px",document.getElementById("x_DR17").style.width="80px",document.getElementById("x_DR18").style.width="80px",document.getElementById("x_DR19").style.width="80px",document.getElementById("x_DR20").style.width="80px",document.getElementById("x_DR21").style.width="80px",document.getElementById("x_DR22").style.width="80px",document.getElementById("x_DR23").style.width="80px",document.getElementById("x_DR24").style.width="80px",document.getElementById("x_DR25").style.width="80px",document.getElementById("x_Tablet1").style.width="180px",document.getElementById("x_Tablet2").style.width="180px",document.getElementById("x_Tablet3").style.width="180px",document.getElementById("x_Tablet4").style.width="180px",document.getElementById("x_Tablet5").style.width="180px",document.getElementById("x_Tablet6").style.width="180px",document.getElementById("x_Tablet7").style.width="180px",document.getElementById("x_Tablet8").style.width="180px",document.getElementById("x_Tablet9").style.width="180px",document.getElementById("x_Tablet10").style.width="180px",document.getElementById("x_Tablet11").style.width="180px",document.getElementById("x_Tablet12").style.width="180px",document.getElementById("x_Tablet13").style.width="180px",document.getElementById("x_Tablet14").style.width="180px",document.getElementById("x_Tablet15").style.width="180px",document.getElementById("x_Tablet16").style.width="180px",document.getElementById("x_Tablet17").style.width="180px",document.getElementById("x_Tablet18").style.width="180px",document.getElementById("x_Tablet19").style.width="180px",document.getElementById("x_Tablet20").style.width="180px",document.getElementById("x_Tablet21").style.width="180px",document.getElementById("x_Tablet22").style.width="180px",document.getElementById("x_Tablet23").style.width="180px",document.getElementById("x_Tablet24").style.width="180px",document.getElementById("x_Tablet25").style.width="180px",document.getElementById("x_RFSH1").style.width="160px",document.getElementById("x_RFSH2").style.width="160px",document.getElementById("x_RFSH3").style.width="160px",document.getElementById("x_RFSH4").style.width="160px",document.getElementById("x_RFSH5").style.width="160px",document.getElementById("x_RFSH6").style.width="160px",document.getElementById("x_RFSH7").style.width="160px",document.getElementById("x_RFSH8").style.width="160px",document.getElementById("x_RFSH9").style.width="160px",document.getElementById("x_RFSH10").style.width="160px",document.getElementById("x_RFSH11").style.width="160px",document.getElementById("x_RFSH12").style.width="160px",document.getElementById("x_RFSH13").style.width="160px",document.getElementById("x_RFSH14").style.width="160px",document.getElementById("x_RFSH15").style.width="160px",document.getElementById("x_RFSH16").style.width="160px",document.getElementById("x_RFSH17").style.width="160px",document.getElementById("x_RFSH18").style.width="160px",document.getElementById("x_RFSH19").style.width="160px",document.getElementById("x_RFSH20").style.width="160px",document.getElementById("x_RFSH21").style.width="160px",document.getElementById("x_RFSH22").style.width="160px",document.getElementById("x_RFSH23").style.width="160px",document.getElementById("x_RFSH24").style.width="160px",document.getElementById("x_RFSH25").style.width="160px",document.getElementById("x_HMG1").style.width="160px",document.getElementById("x_HMG2").style.width="160px",document.getElementById("x_HMG3").style.width="160px",document.getElementById("x_HMG4").style.width="160px",document.getElementById("x_HMG5").style.width="160px",document.getElementById("x_HMG6").style.width="160px",document.getElementById("x_HMG7").style.width="160px",document.getElementById("x_HMG8").style.width="160px",document.getElementById("x_HMG9").style.width="160px",document.getElementById("x_HMG10").style.width="160px",document.getElementById("x_HMG11").style.width="160px",document.getElementById("x_HMG12").style.width="160px",document.getElementById("x_HMG13").style.width="160px",document.getElementById("x_HMG14").style.width="160px",document.getElementById("x_HMG15").style.width="160px",document.getElementById("x_HMG16").style.width="160px",document.getElementById("x_HMG17").style.width="160px",document.getElementById("x_HMG18").style.width="160px",document.getElementById("x_HMG19").style.width="160px",document.getElementById("x_HMG20").style.width="160px",document.getElementById("x_HMG21").style.width="160px",document.getElementById("x_HMG22").style.width="160px",document.getElementById("x_HMG23").style.width="160px",document.getElementById("x_HMG24").style.width="160px",document.getElementById("x_HMG25").style.width="160px",document.getElementById("x_GnRH1").style.width="150px",document.getElementById("x_GnRH2").style.width="150px",document.getElementById("x_GnRH3").style.width="150px",document.getElementById("x_GnRH4").style.width="150px",document.getElementById("x_GnRH5").style.width="150px",document.getElementById("x_GnRH6").style.width="150px",document.getElementById("x_GnRH7").style.width="150px",document.getElementById("x_GnRH8").style.width="150px",document.getElementById("x_GnRH9").style.width="150px",document.getElementById("x_GnRH10").style.width="150px",document.getElementById("x_GnRH11").style.width="150px",document.getElementById("x_GnRH12").style.width="150px",document.getElementById("x_GnRH13").style.width="150px",document.getElementById("x_GnRH14").style.width="150px",document.getElementById("x_GnRH15").style.width="150px",document.getElementById("x_GnRH16").style.width="150px",document.getElementById("x_GnRH17").style.width="150px",document.getElementById("x_GnRH18").style.width="150px",document.getElementById("x_GnRH19").style.width="150px",document.getElementById("x_GnRH20").style.width="150px",document.getElementById("x_GnRH21").style.width="150px",document.getElementById("x_GnRH22").style.width="150px",document.getElementById("x_GnRH23").style.width="150px",document.getElementById("x_GnRH24").style.width="150px",document.getElementById("x_GnRH25").style.width="150px";var tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="none",artcycle=(tableE2=document.getElementById("ETTableStIIUUII").style.display="none",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="none",'<?php echo $resultsA[0]["ARTCYCLE"]; ?>'),Treatment='<?php echo $resultsA[0]["Treatment"]; ?>';if("Intrauterine insemination(IUI)"==artcycle){tableE2=document.getElementById("tableE2").style.display="none",tableE2=document.getElementById("tableE21").style.display="none",tableE2=document.getElementById("tableE22").style.display="none",tableE2=document.getElementById("tableE23").style.display="none",tableE2=document.getElementById("tableE24").style.display="none",tableE2=document.getElementById("tableE25").style.display="none",tableE2=document.getElementById("tableE26").style.display="none",tableE2=document.getElementById("tableE27").style.display="none",tableE2=document.getElementById("tableE28").style.display="none",tableE2=document.getElementById("tableE29").style.display="none",tableE2=document.getElementById("tableE210").style.display="none",tableE2=document.getElementById("tableE211").style.display="none",tableE2=document.getElementById("tableE212").style.display="none",tableE2=document.getElementById("tableE213").style.display="none",tableE2=document.getElementById("tableE214").style.display="none",tableE2=document.getElementById("tableE215").style.display="none",tableE2=document.getElementById("tableE216").style.display="none",tableE2=document.getElementById("tableE217").style.display="none",tableE2=document.getElementById("tableE218").style.display="none",tableE2=document.getElementById("tableE219").style.display="none",tableE2=document.getElementById("tableE220").style.display="none",tableE2=document.getElementById("tableE221").style.display="none",tableE2=document.getElementById("tableE222").style.display="none",tableE2=document.getElementById("tableE223").style.display="none",tableE2=document.getElementById("tableE224").style.display="none",tableE2=document.getElementById("tableE225").style.display="none";var RowPreProcedureOrder=document.getElementById("RowPreProcedureOrder").style.display="none",RowALLFREEZEINDICATION=document.getElementById("RowALLFREEZEINDICATION").style.display="none",RowDATEOFET=document.getElementById("RowDATEOFET").style.display="none",colPGTA=document.getElementById("colPGTA").style.display="none",colPGD=document.getElementById("colPGD").style.display="none",fieldOPUDATE=document.getElementById("fieldOPUDATE");fieldOPUDATE.firstElementChild.innerText="IUI Date";var x_OPUDATE=document.getElementById("x_OPUDATE");x_OPUDATE.placeholder="IUI Date";var colP4=document.getElementById("colP4").innerHTML="A/CC",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ANTAGONISTDAYSstum=document.getElementById("ANTAGONISTDAYSstum").style.display="none";tableE2=document.getElementById("ETTableStIIUUII").style.display="block",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block"}if("Frozen Embryo Transfer"===artcycle||"Evaluation cycle"===artcycle){var colE2=document.getElementById("colE2").innerHTML="VE",colUSGRt=(colP4=document.getElementById("colP4").innerHTML="Patches",document.getElementById("colUSGRt").innerHTML="Progesterone"),colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableTablet=(tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",document.getElementById("tableTablet").style.display="none"),tableRFSH=(tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",document.getElementById("tableRFSH").style.display="none"),tableHMG=(tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",document.getElementById("tableHMG").style.display="none"),rowTypeOfInfertility=(tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",document.getElementById("rowTypeOfInfertility").style.display="none"),rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProgesteroneAdminTable=(ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",document.getElementById("ProgesteroneAdminTable").style.display="none");ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",fieldSemenFrozen=document.getElementById("RowPreProcedureOrder").style.display="none",fieldSemenFrozen=document.getElementById("RowALLFREEZEINDICATION").style.display="none",fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block"}else{ETTableSt=document.getElementById("ETTableSt").style.display="none";if("Intrauterine insemination(IUI)"!=artcycle)AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="block";ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none"}if("Fresh ET"==Treatment||"Frozen ET"==Treatment||"OD Fresh ET"==Treatment||"OD Frozen ET"==Treatment||"OD ICSI"==Treatment)colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",rowTypeOfInfertility=document.getElementById("rowTypeOfInfertility").style.display="none",rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none";if("ICSI H"==Treatment)tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none";if("OD ICSI"==Treatment)fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block";function ProgesteroneAccept(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function ProgesteroneCancel(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function addDays(e,t){const l=new Date(Number(e));return l.setDate(e.getDate()+t),l}function calculateDoseofGonadotropins(){}function calculateDoseofRFSHHMG(){for(var e=0,t=0,l=1;l<24;l++){var n="x_RFSH"+l;(d=document.getElementById(n).value.split(" ")).length>1&&(e=parseInt(e)+1,t="Follisurge"==d[0]?parseInt(t)+parseInt(d[1]):parseInt(t)+parseInt(d[2]));var d;n="x_HMG"+l;(d=document.getElementById(n).value.split(" ")).length>1&&(t="HUMOG"==d[0]?parseInt(t)+parseInt(d[1]):parseInt(t)+parseInt(d[2]))}document.getElementById("x_DAYSOFSTIMULATION").value=e,document.getElementById("x_DOSEOFGONADOTROPINS").value=t}function calculateDaysofGnRH(){for(var e=0,t=1;t<24;t++){var l="x_GnRH"+t;document.getElementById(l).value.split(" ").length>1&&(e=parseInt(e)+1)}document.getElementById("x_ANTAGONISTDAYS").value=e}
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_stimulation_chart_add->terminate();
?>