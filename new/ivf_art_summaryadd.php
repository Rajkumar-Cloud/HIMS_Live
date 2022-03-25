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
$ivf_art_summary_add = new ivf_art_summary_add();

// Run the page
$ivf_art_summary_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_art_summaryadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_art_summaryadd = currentForm = new ew.Form("fivf_art_summaryadd", "add");

	// Validate form
	fivf_art_summaryadd.validate = function() {
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
			<?php if ($ivf_art_summary_add->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->ARTCycle->caption(), $ivf_art_summary_add->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Spermorigin->Required) { ?>
				elm = this.getElements("x" + infix + "_Spermorigin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Spermorigin->caption(), $ivf_art_summary_add->Spermorigin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->IndicationforART->Required) { ?>
				elm = this.getElements("x" + infix + "_IndicationforART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->IndicationforART->caption(), $ivf_art_summary_add->IndicationforART->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->DateofICSI->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofICSI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->DateofICSI->caption(), $ivf_art_summary_add->DateofICSI->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DateofICSI");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_art_summary_add->DateofICSI->errorMessage()) ?>");
			<?php if ($ivf_art_summary_add->Origin->Required) { ?>
				elm = this.getElements("x" + infix + "_Origin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Origin->caption(), $ivf_art_summary_add->Origin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Status->caption(), $ivf_art_summary_add->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Method->caption(), $ivf_art_summary_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->pre_Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_pre_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->pre_Concentration->caption(), $ivf_art_summary_add->pre_Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->pre_Motility->Required) { ?>
				elm = this.getElements("x" + infix + "_pre_Motility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->pre_Motility->caption(), $ivf_art_summary_add->pre_Motility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->pre_Morphology->Required) { ?>
				elm = this.getElements("x" + infix + "_pre_Morphology");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->pre_Morphology->caption(), $ivf_art_summary_add->pre_Morphology->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->post_Concentration->Required) { ?>
				elm = this.getElements("x" + infix + "_post_Concentration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->post_Concentration->caption(), $ivf_art_summary_add->post_Concentration->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->post_Motility->Required) { ?>
				elm = this.getElements("x" + infix + "_post_Motility");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->post_Motility->caption(), $ivf_art_summary_add->post_Motility->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->post_Morphology->Required) { ?>
				elm = this.getElements("x" + infix + "_post_Morphology");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->post_Morphology->caption(), $ivf_art_summary_add->post_Morphology->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->NumberofEmbryostransferred->Required) { ?>
				elm = this.getElements("x" + infix + "_NumberofEmbryostransferred");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->NumberofEmbryostransferred->caption(), $ivf_art_summary_add->NumberofEmbryostransferred->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Embryosunderobservation->Required) { ?>
				elm = this.getElements("x" + infix + "_Embryosunderobservation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Embryosunderobservation->caption(), $ivf_art_summary_add->Embryosunderobservation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->EmbryoDevelopmentSummary->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoDevelopmentSummary");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->EmbryoDevelopmentSummary->caption(), $ivf_art_summary_add->EmbryoDevelopmentSummary->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->EmbryologistSignature->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryologistSignature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->EmbryologistSignature->caption(), $ivf_art_summary_add->EmbryologistSignature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->IVFRegistrationID->Required) { ?>
				elm = this.getElements("x" + infix + "_IVFRegistrationID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->IVFRegistrationID->caption(), $ivf_art_summary_add->IVFRegistrationID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IVFRegistrationID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_art_summary_add->IVFRegistrationID->errorMessage()) ?>");
			<?php if ($ivf_art_summary_add->InseminatinTechnique->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminatinTechnique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->InseminatinTechnique->caption(), $ivf_art_summary_add->InseminatinTechnique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->ICSIDetails->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSIDetails");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->ICSIDetails->caption(), $ivf_art_summary_add->ICSIDetails->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->DateofET->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofET");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->DateofET->caption(), $ivf_art_summary_add->DateofET->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Reasonfornotranfer->Required) { ?>
				elm = this.getElements("x" + infix + "_Reasonfornotranfer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Reasonfornotranfer->caption(), $ivf_art_summary_add->Reasonfornotranfer->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->EmbryosCryopreserved->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryosCryopreserved");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->EmbryosCryopreserved->caption(), $ivf_art_summary_add->EmbryosCryopreserved->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->LegendCellStage->Required) { ?>
				elm = this.getElements("x" + infix + "_LegendCellStage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->LegendCellStage->caption(), $ivf_art_summary_add->LegendCellStage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->ConsultantsSignature->Required) { ?>
				elm = this.getElements("x" + infix + "_ConsultantsSignature");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->ConsultantsSignature->caption(), $ivf_art_summary_add->ConsultantsSignature->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Name->caption(), $ivf_art_summary_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->M2->Required) { ?>
				elm = this.getElements("x" + infix + "_M2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->M2->caption(), $ivf_art_summary_add->M2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Mi2->Required) { ?>
				elm = this.getElements("x" + infix + "_Mi2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Mi2->caption(), $ivf_art_summary_add->Mi2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->ICSI->Required) { ?>
				elm = this.getElements("x" + infix + "_ICSI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->ICSI->caption(), $ivf_art_summary_add->ICSI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->IVF->Required) { ?>
				elm = this.getElements("x" + infix + "_IVF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->IVF->caption(), $ivf_art_summary_add->IVF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->M1->Required) { ?>
				elm = this.getElements("x" + infix + "_M1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->M1->caption(), $ivf_art_summary_add->M1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->GV->Required) { ?>
				elm = this.getElements("x" + infix + "_GV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->GV->caption(), $ivf_art_summary_add->GV->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Others->Required) { ?>
				elm = this.getElements("x" + infix + "_Others");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Others->caption(), $ivf_art_summary_add->Others->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Normal2PN->Required) { ?>
				elm = this.getElements("x" + infix + "_Normal2PN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Normal2PN->caption(), $ivf_art_summary_add->Normal2PN->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Abnormalfertilisation1N->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormalfertilisation1N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Abnormalfertilisation1N->caption(), $ivf_art_summary_add->Abnormalfertilisation1N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Abnormalfertilisation3N->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormalfertilisation3N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Abnormalfertilisation3N->caption(), $ivf_art_summary_add->Abnormalfertilisation3N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->NotFertilized->Required) { ?>
				elm = this.getElements("x" + infix + "_NotFertilized");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->NotFertilized->caption(), $ivf_art_summary_add->NotFertilized->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Degenerated->Required) { ?>
				elm = this.getElements("x" + infix + "_Degenerated");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Degenerated->caption(), $ivf_art_summary_add->Degenerated->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->SpermDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SpermDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->SpermDate->caption(), $ivf_art_summary_add->SpermDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SpermDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_art_summary_add->SpermDate->errorMessage()) ?>");
			<?php if ($ivf_art_summary_add->Code1->Required) { ?>
				elm = this.getElements("x" + infix + "_Code1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Code1->caption(), $ivf_art_summary_add->Code1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Day1->Required) { ?>
				elm = this.getElements("x" + infix + "_Day1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Day1->caption(), $ivf_art_summary_add->Day1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->CellStage1->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->CellStage1->caption(), $ivf_art_summary_add->CellStage1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Grade1->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Grade1->caption(), $ivf_art_summary_add->Grade1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->State1->Required) { ?>
				elm = this.getElements("x" + infix + "_State1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->State1->caption(), $ivf_art_summary_add->State1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Code2->Required) { ?>
				elm = this.getElements("x" + infix + "_Code2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Code2->caption(), $ivf_art_summary_add->Code2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Day2->Required) { ?>
				elm = this.getElements("x" + infix + "_Day2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Day2->caption(), $ivf_art_summary_add->Day2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->CellStage2->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->CellStage2->caption(), $ivf_art_summary_add->CellStage2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Grade2->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Grade2->caption(), $ivf_art_summary_add->Grade2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->State2->Required) { ?>
				elm = this.getElements("x" + infix + "_State2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->State2->caption(), $ivf_art_summary_add->State2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Code3->Required) { ?>
				elm = this.getElements("x" + infix + "_Code3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Code3->caption(), $ivf_art_summary_add->Code3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Day3->Required) { ?>
				elm = this.getElements("x" + infix + "_Day3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Day3->caption(), $ivf_art_summary_add->Day3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->CellStage3->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->CellStage3->caption(), $ivf_art_summary_add->CellStage3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Grade3->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Grade3->caption(), $ivf_art_summary_add->Grade3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->State3->Required) { ?>
				elm = this.getElements("x" + infix + "_State3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->State3->caption(), $ivf_art_summary_add->State3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Code4->Required) { ?>
				elm = this.getElements("x" + infix + "_Code4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Code4->caption(), $ivf_art_summary_add->Code4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Day4->Required) { ?>
				elm = this.getElements("x" + infix + "_Day4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Day4->caption(), $ivf_art_summary_add->Day4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->CellStage4->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->CellStage4->caption(), $ivf_art_summary_add->CellStage4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Grade4->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Grade4->caption(), $ivf_art_summary_add->Grade4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->State4->Required) { ?>
				elm = this.getElements("x" + infix + "_State4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->State4->caption(), $ivf_art_summary_add->State4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Code5->Required) { ?>
				elm = this.getElements("x" + infix + "_Code5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Code5->caption(), $ivf_art_summary_add->Code5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Day5->Required) { ?>
				elm = this.getElements("x" + infix + "_Day5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Day5->caption(), $ivf_art_summary_add->Day5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->CellStage5->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->CellStage5->caption(), $ivf_art_summary_add->CellStage5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Grade5->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Grade5->caption(), $ivf_art_summary_add->Grade5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->State5->Required) { ?>
				elm = this.getElements("x" + infix + "_State5");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->State5->caption(), $ivf_art_summary_add->State5->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->TidNo->caption(), $ivf_art_summary_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_art_summary_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_art_summary_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->RIDNo->caption(), $ivf_art_summary_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_art_summary_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_art_summary_add->Volume->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Volume->caption(), $ivf_art_summary_add->Volume->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Volume1->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Volume1->caption(), $ivf_art_summary_add->Volume1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Volume2->Required) { ?>
				elm = this.getElements("x" + infix + "_Volume2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Volume2->caption(), $ivf_art_summary_add->Volume2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Concentration2->Required) { ?>
				elm = this.getElements("x" + infix + "_Concentration2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Concentration2->caption(), $ivf_art_summary_add->Concentration2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Total->Required) { ?>
				elm = this.getElements("x" + infix + "_Total");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Total->caption(), $ivf_art_summary_add->Total->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Total1->Required) { ?>
				elm = this.getElements("x" + infix + "_Total1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Total1->caption(), $ivf_art_summary_add->Total1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Total2->Required) { ?>
				elm = this.getElements("x" + infix + "_Total2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Total2->caption(), $ivf_art_summary_add->Total2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Progressive->Required) { ?>
				elm = this.getElements("x" + infix + "_Progressive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Progressive->caption(), $ivf_art_summary_add->Progressive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Progressive1->Required) { ?>
				elm = this.getElements("x" + infix + "_Progressive1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Progressive1->caption(), $ivf_art_summary_add->Progressive1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Progressive2->Required) { ?>
				elm = this.getElements("x" + infix + "_Progressive2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Progressive2->caption(), $ivf_art_summary_add->Progressive2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->NotProgressive->Required) { ?>
				elm = this.getElements("x" + infix + "_NotProgressive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->NotProgressive->caption(), $ivf_art_summary_add->NotProgressive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->NotProgressive1->Required) { ?>
				elm = this.getElements("x" + infix + "_NotProgressive1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->NotProgressive1->caption(), $ivf_art_summary_add->NotProgressive1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->NotProgressive2->Required) { ?>
				elm = this.getElements("x" + infix + "_NotProgressive2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->NotProgressive2->caption(), $ivf_art_summary_add->NotProgressive2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Motility2->Required) { ?>
				elm = this.getElements("x" + infix + "_Motility2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Motility2->caption(), $ivf_art_summary_add->Motility2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_art_summary_add->Morphology2->Required) { ?>
				elm = this.getElements("x" + infix + "_Morphology2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary_add->Morphology2->caption(), $ivf_art_summary_add->Morphology2->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	fivf_art_summaryadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_art_summaryadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_art_summaryadd.lists["x_ARTCycle"] = <?php echo $ivf_art_summary_add->ARTCycle->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_art_summary_add->ARTCycle->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Spermorigin"] = <?php echo $ivf_art_summary_add->Spermorigin->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Spermorigin"].options = <?php echo JsonEncode($ivf_art_summary_add->Spermorigin->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Origin"] = <?php echo $ivf_art_summary_add->Origin->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Origin"].options = <?php echo JsonEncode($ivf_art_summary_add->Origin->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Status"] = <?php echo $ivf_art_summary_add->Status->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Status"].options = <?php echo JsonEncode($ivf_art_summary_add->Status->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Method"] = <?php echo $ivf_art_summary_add->Method->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Method"].options = <?php echo JsonEncode($ivf_art_summary_add->Method->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_InseminatinTechnique"] = <?php echo $ivf_art_summary_add->InseminatinTechnique->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_art_summary_add->InseminatinTechnique->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_DateofET"] = <?php echo $ivf_art_summary_add->DateofET->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_DateofET"].options = <?php echo JsonEncode($ivf_art_summary_add->DateofET->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Reasonfornotranfer"] = <?php echo $ivf_art_summary_add->Reasonfornotranfer->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Reasonfornotranfer"].options = <?php echo JsonEncode($ivf_art_summary_add->Reasonfornotranfer->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_ConsultantsSignature"] = <?php echo $ivf_art_summary_add->ConsultantsSignature->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_ConsultantsSignature"].options = <?php echo JsonEncode($ivf_art_summary_add->ConsultantsSignature->lookupOptions()) ?>;
	fivf_art_summaryadd.lists["x_Day1"] = <?php echo $ivf_art_summary_add->Day1->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Day1"].options = <?php echo JsonEncode($ivf_art_summary_add->Day1->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_CellStage1"] = <?php echo $ivf_art_summary_add->CellStage1->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_CellStage1"].options = <?php echo JsonEncode($ivf_art_summary_add->CellStage1->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Grade1"] = <?php echo $ivf_art_summary_add->Grade1->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Grade1"].options = <?php echo JsonEncode($ivf_art_summary_add->Grade1->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_State1"] = <?php echo $ivf_art_summary_add->State1->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_State1"].options = <?php echo JsonEncode($ivf_art_summary_add->State1->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Day2"] = <?php echo $ivf_art_summary_add->Day2->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Day2"].options = <?php echo JsonEncode($ivf_art_summary_add->Day2->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_CellStage2"] = <?php echo $ivf_art_summary_add->CellStage2->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_CellStage2"].options = <?php echo JsonEncode($ivf_art_summary_add->CellStage2->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Grade2"] = <?php echo $ivf_art_summary_add->Grade2->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Grade2"].options = <?php echo JsonEncode($ivf_art_summary_add->Grade2->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_State2"] = <?php echo $ivf_art_summary_add->State2->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_State2"].options = <?php echo JsonEncode($ivf_art_summary_add->State2->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Day3"] = <?php echo $ivf_art_summary_add->Day3->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Day3"].options = <?php echo JsonEncode($ivf_art_summary_add->Day3->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_CellStage3"] = <?php echo $ivf_art_summary_add->CellStage3->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_CellStage3"].options = <?php echo JsonEncode($ivf_art_summary_add->CellStage3->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Grade3"] = <?php echo $ivf_art_summary_add->Grade3->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Grade3"].options = <?php echo JsonEncode($ivf_art_summary_add->Grade3->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_State3"] = <?php echo $ivf_art_summary_add->State3->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_State3"].options = <?php echo JsonEncode($ivf_art_summary_add->State3->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Day4"] = <?php echo $ivf_art_summary_add->Day4->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Day4"].options = <?php echo JsonEncode($ivf_art_summary_add->Day4->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_CellStage4"] = <?php echo $ivf_art_summary_add->CellStage4->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_CellStage4"].options = <?php echo JsonEncode($ivf_art_summary_add->CellStage4->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Grade4"] = <?php echo $ivf_art_summary_add->Grade4->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Grade4"].options = <?php echo JsonEncode($ivf_art_summary_add->Grade4->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_State4"] = <?php echo $ivf_art_summary_add->State4->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_State4"].options = <?php echo JsonEncode($ivf_art_summary_add->State4->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Day5"] = <?php echo $ivf_art_summary_add->Day5->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Day5"].options = <?php echo JsonEncode($ivf_art_summary_add->Day5->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_CellStage5"] = <?php echo $ivf_art_summary_add->CellStage5->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_CellStage5"].options = <?php echo JsonEncode($ivf_art_summary_add->CellStage5->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_Grade5"] = <?php echo $ivf_art_summary_add->Grade5->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_Grade5"].options = <?php echo JsonEncode($ivf_art_summary_add->Grade5->options(FALSE, TRUE)) ?>;
	fivf_art_summaryadd.lists["x_State5"] = <?php echo $ivf_art_summary_add->State5->Lookup->toClientList($ivf_art_summary_add) ?>;
	fivf_art_summaryadd.lists["x_State5"].options = <?php echo JsonEncode($ivf_art_summary_add->State5->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_art_summaryadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_art_summary_add->showPageHeader(); ?>
<?php
$ivf_art_summary_add->showMessage();
?>
<form name="fivf_art_summaryadd" id="fivf_art_summaryadd" class="<?php echo $ivf_art_summary_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_art_summary_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_art_summary_add->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_art_summary_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_ARTCycle" type="text/html"><?php echo $ivf_art_summary_add->ARTCycle->caption() ?><?php echo $ivf_art_summary_add->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ARTCycle" type="text/html"><span id="el_ivf_art_summary_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_art_summary_add->ARTCycle->displayValueSeparatorAttribute() ?>" id="x_ARTCycle" name="x_ARTCycle"<?php echo $ivf_art_summary_add->ARTCycle->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Spermorigin->Visible) { // Spermorigin ?>
	<div id="r_Spermorigin" class="form-group row">
		<label id="elh_ivf_art_summary_Spermorigin" for="x_Spermorigin" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Spermorigin" type="text/html"><?php echo $ivf_art_summary_add->Spermorigin->caption() ?><?php echo $ivf_art_summary_add->Spermorigin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Spermorigin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Spermorigin" type="text/html"><span id="el_ivf_art_summary_Spermorigin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Spermorigin" data-value-separator="<?php echo $ivf_art_summary_add->Spermorigin->displayValueSeparatorAttribute() ?>" id="x_Spermorigin" name="x_Spermorigin"<?php echo $ivf_art_summary_add->Spermorigin->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Spermorigin->selectOptionListHtml("x_Spermorigin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Spermorigin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->IndicationforART->Visible) { // IndicationforART ?>
	<div id="r_IndicationforART" class="form-group row">
		<label id="elh_ivf_art_summary_IndicationforART" for="x_IndicationforART" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_IndicationforART" type="text/html"><?php echo $ivf_art_summary_add->IndicationforART->caption() ?><?php echo $ivf_art_summary_add->IndicationforART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->IndicationforART->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IndicationforART" type="text/html"><span id="el_ivf_art_summary_IndicationforART">
<input type="text" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x_IndicationforART" id="x_IndicationforART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->IndicationforART->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->IndicationforART->EditValue ?>"<?php echo $ivf_art_summary_add->IndicationforART->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->IndicationforART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->DateofICSI->Visible) { // DateofICSI ?>
	<div id="r_DateofICSI" class="form-group row">
		<label id="elh_ivf_art_summary_DateofICSI" for="x_DateofICSI" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_DateofICSI" type="text/html"><?php echo $ivf_art_summary_add->DateofICSI->caption() ?><?php echo $ivf_art_summary_add->DateofICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->DateofICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofICSI" type="text/html"><span id="el_ivf_art_summary_DateofICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_DateofICSI" data-format="7" name="x_DateofICSI" id="x_DateofICSI" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->DateofICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->DateofICSI->EditValue ?>"<?php echo $ivf_art_summary_add->DateofICSI->editAttributes() ?>>
<?php if (!$ivf_art_summary_add->DateofICSI->ReadOnly && !$ivf_art_summary_add->DateofICSI->Disabled && !isset($ivf_art_summary_add->DateofICSI->EditAttrs["readonly"]) && !isset($ivf_art_summary_add->DateofICSI->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_art_summaryadd_js">
loadjs.ready(["fivf_art_summaryadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_art_summaryadd", "x_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_art_summary_add->DateofICSI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Origin->Visible) { // Origin ?>
	<div id="r_Origin" class="form-group row">
		<label id="elh_ivf_art_summary_Origin" for="x_Origin" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Origin" type="text/html"><?php echo $ivf_art_summary_add->Origin->caption() ?><?php echo $ivf_art_summary_add->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Origin->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Origin" type="text/html"><span id="el_ivf_art_summary_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Origin" data-value-separator="<?php echo $ivf_art_summary_add->Origin->displayValueSeparatorAttribute() ?>" id="x_Origin" name="x_Origin"<?php echo $ivf_art_summary_add->Origin->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Origin->selectOptionListHtml("x_Origin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Origin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_ivf_art_summary_Status" for="x_Status" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Status" type="text/html"><?php echo $ivf_art_summary_add->Status->caption() ?><?php echo $ivf_art_summary_add->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Status->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Status" type="text/html"><span id="el_ivf_art_summary_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Status" data-value-separator="<?php echo $ivf_art_summary_add->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $ivf_art_summary_add->Status->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_ivf_art_summary_Method" for="x_Method" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Method" type="text/html"><?php echo $ivf_art_summary_add->Method->caption() ?><?php echo $ivf_art_summary_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Method->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Method" type="text/html"><span id="el_ivf_art_summary_Method">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Method" data-value-separator="<?php echo $ivf_art_summary_add->Method->displayValueSeparatorAttribute() ?>" id="x_Method" name="x_Method"<?php echo $ivf_art_summary_add->Method->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Method->selectOptionListHtml("x_Method") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->pre_Concentration->Visible) { // pre_Concentration ?>
	<div id="r_pre_Concentration" class="form-group row">
		<label id="elh_ivf_art_summary_pre_Concentration" for="x_pre_Concentration" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_pre_Concentration" type="text/html"><?php echo $ivf_art_summary_add->pre_Concentration->caption() ?><?php echo $ivf_art_summary_add->pre_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->pre_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Concentration" type="text/html"><span id="el_ivf_art_summary_pre_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x_pre_Concentration" id="x_pre_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->pre_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->pre_Concentration->EditValue ?>"<?php echo $ivf_art_summary_add->pre_Concentration->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->pre_Concentration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->pre_Motility->Visible) { // pre_Motility ?>
	<div id="r_pre_Motility" class="form-group row">
		<label id="elh_ivf_art_summary_pre_Motility" for="x_pre_Motility" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_pre_Motility" type="text/html"><?php echo $ivf_art_summary_add->pre_Motility->caption() ?><?php echo $ivf_art_summary_add->pre_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->pre_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Motility" type="text/html"><span id="el_ivf_art_summary_pre_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x_pre_Motility" id="x_pre_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->pre_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->pre_Motility->EditValue ?>"<?php echo $ivf_art_summary_add->pre_Motility->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->pre_Motility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->pre_Morphology->Visible) { // pre_Morphology ?>
	<div id="r_pre_Morphology" class="form-group row">
		<label id="elh_ivf_art_summary_pre_Morphology" for="x_pre_Morphology" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_pre_Morphology" type="text/html"><?php echo $ivf_art_summary_add->pre_Morphology->caption() ?><?php echo $ivf_art_summary_add->pre_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->pre_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_pre_Morphology" type="text/html"><span id="el_ivf_art_summary_pre_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x_pre_Morphology" id="x_pre_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->pre_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->pre_Morphology->EditValue ?>"<?php echo $ivf_art_summary_add->pre_Morphology->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->pre_Morphology->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->post_Concentration->Visible) { // post_Concentration ?>
	<div id="r_post_Concentration" class="form-group row">
		<label id="elh_ivf_art_summary_post_Concentration" for="x_post_Concentration" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_post_Concentration" type="text/html"><?php echo $ivf_art_summary_add->post_Concentration->caption() ?><?php echo $ivf_art_summary_add->post_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->post_Concentration->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Concentration" type="text/html"><span id="el_ivf_art_summary_post_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x_post_Concentration" id="x_post_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->post_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->post_Concentration->EditValue ?>"<?php echo $ivf_art_summary_add->post_Concentration->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->post_Concentration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->post_Motility->Visible) { // post_Motility ?>
	<div id="r_post_Motility" class="form-group row">
		<label id="elh_ivf_art_summary_post_Motility" for="x_post_Motility" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_post_Motility" type="text/html"><?php echo $ivf_art_summary_add->post_Motility->caption() ?><?php echo $ivf_art_summary_add->post_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->post_Motility->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Motility" type="text/html"><span id="el_ivf_art_summary_post_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Motility" name="x_post_Motility" id="x_post_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->post_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->post_Motility->EditValue ?>"<?php echo $ivf_art_summary_add->post_Motility->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->post_Motility->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->post_Morphology->Visible) { // post_Morphology ?>
	<div id="r_post_Morphology" class="form-group row">
		<label id="elh_ivf_art_summary_post_Morphology" for="x_post_Morphology" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_post_Morphology" type="text/html"><?php echo $ivf_art_summary_add->post_Morphology->caption() ?><?php echo $ivf_art_summary_add->post_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->post_Morphology->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_post_Morphology" type="text/html"><span id="el_ivf_art_summary_post_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x_post_Morphology" id="x_post_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->post_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->post_Morphology->EditValue ?>"<?php echo $ivf_art_summary_add->post_Morphology->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->post_Morphology->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<div id="r_NumberofEmbryostransferred" class="form-group row">
		<label id="elh_ivf_art_summary_NumberofEmbryostransferred" for="x_NumberofEmbryostransferred" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_NumberofEmbryostransferred" type="text/html"><?php echo $ivf_art_summary_add->NumberofEmbryostransferred->caption() ?><?php echo $ivf_art_summary_add->NumberofEmbryostransferred->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->NumberofEmbryostransferred->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NumberofEmbryostransferred" type="text/html"><span id="el_ivf_art_summary_NumberofEmbryostransferred">
<input type="text" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x_NumberofEmbryostransferred" id="x_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->NumberofEmbryostransferred->EditValue ?>"<?php echo $ivf_art_summary_add->NumberofEmbryostransferred->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->NumberofEmbryostransferred->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<div id="r_Embryosunderobservation" class="form-group row">
		<label id="elh_ivf_art_summary_Embryosunderobservation" for="x_Embryosunderobservation" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Embryosunderobservation" type="text/html"><?php echo $ivf_art_summary_add->Embryosunderobservation->caption() ?><?php echo $ivf_art_summary_add->Embryosunderobservation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Embryosunderobservation->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Embryosunderobservation" type="text/html"><span id="el_ivf_art_summary_Embryosunderobservation">
<input type="text" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x_Embryosunderobservation" id="x_Embryosunderobservation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Embryosunderobservation->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Embryosunderobservation->EditValue ?>"<?php echo $ivf_art_summary_add->Embryosunderobservation->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Embryosunderobservation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<div id="r_EmbryoDevelopmentSummary" class="form-group row">
		<label id="elh_ivf_art_summary_EmbryoDevelopmentSummary" for="x_EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_EmbryoDevelopmentSummary" type="text/html"><?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->caption() ?><?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryoDevelopmentSummary" type="text/html"><span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x_EmbryoDevelopmentSummary" id="x_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->EditValue ?>"<?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->EmbryoDevelopmentSummary->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<div id="r_EmbryologistSignature" class="form-group row">
		<label id="elh_ivf_art_summary_EmbryologistSignature" for="x_EmbryologistSignature" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_EmbryologistSignature" type="text/html"><?php echo $ivf_art_summary_add->EmbryologistSignature->caption() ?><?php echo $ivf_art_summary_add->EmbryologistSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->EmbryologistSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryologistSignature" type="text/html"><span id="el_ivf_art_summary_EmbryologistSignature">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x_EmbryologistSignature" id="x_EmbryologistSignature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->EmbryologistSignature->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->EmbryologistSignature->EditValue ?>"<?php echo $ivf_art_summary_add->EmbryologistSignature->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->EmbryologistSignature->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<div id="r_IVFRegistrationID" class="form-group row">
		<label id="elh_ivf_art_summary_IVFRegistrationID" for="x_IVFRegistrationID" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_IVFRegistrationID" type="text/html"><?php echo $ivf_art_summary_add->IVFRegistrationID->caption() ?><?php echo $ivf_art_summary_add->IVFRegistrationID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->IVFRegistrationID->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVFRegistrationID" type="text/html"><span id="el_ivf_art_summary_IVFRegistrationID">
<input type="text" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x_IVFRegistrationID" id="x_IVFRegistrationID" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->IVFRegistrationID->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->IVFRegistrationID->EditValue ?>"<?php echo $ivf_art_summary_add->IVFRegistrationID->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->IVFRegistrationID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_art_summary_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_InseminatinTechnique" type="text/html"><?php echo $ivf_art_summary_add->InseminatinTechnique->caption() ?><?php echo $ivf_art_summary_add->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_InseminatinTechnique" type="text/html"><span id="el_ivf_art_summary_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_art_summary_add->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x_InseminatinTechnique" name="x_InseminatinTechnique"<?php echo $ivf_art_summary_add->InseminatinTechnique->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->ICSIDetails->Visible) { // ICSIDetails ?>
	<div id="r_ICSIDetails" class="form-group row">
		<label id="elh_ivf_art_summary_ICSIDetails" for="x_ICSIDetails" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_ICSIDetails" type="text/html"><?php echo $ivf_art_summary_add->ICSIDetails->caption() ?><?php echo $ivf_art_summary_add->ICSIDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->ICSIDetails->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSIDetails" type="text/html"><span id="el_ivf_art_summary_ICSIDetails">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x_ICSIDetails" id="x_ICSIDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->ICSIDetails->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->ICSIDetails->EditValue ?>"<?php echo $ivf_art_summary_add->ICSIDetails->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->ICSIDetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->DateofET->Visible) { // DateofET ?>
	<div id="r_DateofET" class="form-group row">
		<label id="elh_ivf_art_summary_DateofET" for="x_DateofET" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_DateofET" type="text/html"><?php echo $ivf_art_summary_add->DateofET->caption() ?><?php echo $ivf_art_summary_add->DateofET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->DateofET->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_DateofET" type="text/html"><span id="el_ivf_art_summary_DateofET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_DateofET" data-value-separator="<?php echo $ivf_art_summary_add->DateofET->displayValueSeparatorAttribute() ?>" id="x_DateofET" name="x_DateofET"<?php echo $ivf_art_summary_add->DateofET->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->DateofET->selectOptionListHtml("x_DateofET") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->DateofET->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<div id="r_Reasonfornotranfer" class="form-group row">
		<label id="elh_ivf_art_summary_Reasonfornotranfer" for="x_Reasonfornotranfer" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Reasonfornotranfer" type="text/html"><?php echo $ivf_art_summary_add->Reasonfornotranfer->caption() ?><?php echo $ivf_art_summary_add->Reasonfornotranfer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Reasonfornotranfer->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Reasonfornotranfer" type="text/html"><span id="el_ivf_art_summary_Reasonfornotranfer">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" data-value-separator="<?php echo $ivf_art_summary_add->Reasonfornotranfer->displayValueSeparatorAttribute() ?>" id="x_Reasonfornotranfer" name="x_Reasonfornotranfer"<?php echo $ivf_art_summary_add->Reasonfornotranfer->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Reasonfornotranfer->selectOptionListHtml("x_Reasonfornotranfer") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Reasonfornotranfer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<div id="r_EmbryosCryopreserved" class="form-group row">
		<label id="elh_ivf_art_summary_EmbryosCryopreserved" for="x_EmbryosCryopreserved" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_EmbryosCryopreserved" type="text/html"><?php echo $ivf_art_summary_add->EmbryosCryopreserved->caption() ?><?php echo $ivf_art_summary_add->EmbryosCryopreserved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->EmbryosCryopreserved->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_EmbryosCryopreserved" type="text/html"><span id="el_ivf_art_summary_EmbryosCryopreserved">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x_EmbryosCryopreserved" id="x_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->EmbryosCryopreserved->EditValue ?>"<?php echo $ivf_art_summary_add->EmbryosCryopreserved->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->EmbryosCryopreserved->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->LegendCellStage->Visible) { // LegendCellStage ?>
	<div id="r_LegendCellStage" class="form-group row">
		<label id="elh_ivf_art_summary_LegendCellStage" for="x_LegendCellStage" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_LegendCellStage" type="text/html"><?php echo $ivf_art_summary_add->LegendCellStage->caption() ?><?php echo $ivf_art_summary_add->LegendCellStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->LegendCellStage->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_LegendCellStage" type="text/html"><span id="el_ivf_art_summary_LegendCellStage">
<input type="text" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x_LegendCellStage" id="x_LegendCellStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->LegendCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->LegendCellStage->EditValue ?>"<?php echo $ivf_art_summary_add->LegendCellStage->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->LegendCellStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<div id="r_ConsultantsSignature" class="form-group row">
		<label id="elh_ivf_art_summary_ConsultantsSignature" for="x_ConsultantsSignature" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_ConsultantsSignature" type="text/html"><?php echo $ivf_art_summary_add->ConsultantsSignature->caption() ?><?php echo $ivf_art_summary_add->ConsultantsSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->ConsultantsSignature->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ConsultantsSignature" type="text/html"><span id="el_ivf_art_summary_ConsultantsSignature">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ConsultantsSignature"><?php echo EmptyValue(strval($ivf_art_summary_add->ConsultantsSignature->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_art_summary_add->ConsultantsSignature->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_art_summary_add->ConsultantsSignature->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_art_summary_add->ConsultantsSignature->ReadOnly || $ivf_art_summary_add->ConsultantsSignature->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ConsultantsSignature',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_art_summary_add->ConsultantsSignature->Lookup->getParamTag($ivf_art_summary_add, "p_x_ConsultantsSignature") ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_art_summary_add->ConsultantsSignature->displayValueSeparatorAttribute() ?>" name="x_ConsultantsSignature" id="x_ConsultantsSignature" value="<?php echo $ivf_art_summary_add->ConsultantsSignature->CurrentValue ?>"<?php echo $ivf_art_summary_add->ConsultantsSignature->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->ConsultantsSignature->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_art_summary_Name" for="x_Name" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Name" type="text/html"><?php echo $ivf_art_summary_add->Name->caption() ?><?php echo $ivf_art_summary_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Name->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Name" type="text/html"><span id="el_ivf_art_summary_Name">
<input type="text" data-table="ivf_art_summary" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Name->EditValue ?>"<?php echo $ivf_art_summary_add->Name->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->M2->Visible) { // M2 ?>
	<div id="r_M2" class="form-group row">
		<label id="elh_ivf_art_summary_M2" for="x_M2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_M2" type="text/html"><?php echo $ivf_art_summary_add->M2->caption() ?><?php echo $ivf_art_summary_add->M2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->M2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M2" type="text/html"><span id="el_ivf_art_summary_M2">
<input type="text" data-table="ivf_art_summary" data-field="x_M2" name="x_M2" id="x_M2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->M2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->M2->EditValue ?>"<?php echo $ivf_art_summary_add->M2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->M2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Mi2->Visible) { // Mi2 ?>
	<div id="r_Mi2" class="form-group row">
		<label id="elh_ivf_art_summary_Mi2" for="x_Mi2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Mi2" type="text/html"><?php echo $ivf_art_summary_add->Mi2->caption() ?><?php echo $ivf_art_summary_add->Mi2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Mi2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Mi2" type="text/html"><span id="el_ivf_art_summary_Mi2">
<input type="text" data-table="ivf_art_summary" data-field="x_Mi2" name="x_Mi2" id="x_Mi2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Mi2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Mi2->EditValue ?>"<?php echo $ivf_art_summary_add->Mi2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Mi2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->ICSI->Visible) { // ICSI ?>
	<div id="r_ICSI" class="form-group row">
		<label id="elh_ivf_art_summary_ICSI" for="x_ICSI" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_ICSI" type="text/html"><?php echo $ivf_art_summary_add->ICSI->caption() ?><?php echo $ivf_art_summary_add->ICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->ICSI->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_ICSI" type="text/html"><span id="el_ivf_art_summary_ICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSI" name="x_ICSI" id="x_ICSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->ICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->ICSI->EditValue ?>"<?php echo $ivf_art_summary_add->ICSI->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->ICSI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->IVF->Visible) { // IVF ?>
	<div id="r_IVF" class="form-group row">
		<label id="elh_ivf_art_summary_IVF" for="x_IVF" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_IVF" type="text/html"><?php echo $ivf_art_summary_add->IVF->caption() ?><?php echo $ivf_art_summary_add->IVF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->IVF->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_IVF" type="text/html"><span id="el_ivf_art_summary_IVF">
<input type="text" data-table="ivf_art_summary" data-field="x_IVF" name="x_IVF" id="x_IVF" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->IVF->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->IVF->EditValue ?>"<?php echo $ivf_art_summary_add->IVF->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->IVF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->M1->Visible) { // M1 ?>
	<div id="r_M1" class="form-group row">
		<label id="elh_ivf_art_summary_M1" for="x_M1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_M1" type="text/html"><?php echo $ivf_art_summary_add->M1->caption() ?><?php echo $ivf_art_summary_add->M1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->M1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_M1" type="text/html"><span id="el_ivf_art_summary_M1">
<input type="text" data-table="ivf_art_summary" data-field="x_M1" name="x_M1" id="x_M1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->M1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->M1->EditValue ?>"<?php echo $ivf_art_summary_add->M1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->M1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->GV->Visible) { // GV ?>
	<div id="r_GV" class="form-group row">
		<label id="elh_ivf_art_summary_GV" for="x_GV" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_GV" type="text/html"><?php echo $ivf_art_summary_add->GV->caption() ?><?php echo $ivf_art_summary_add->GV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->GV->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_GV" type="text/html"><span id="el_ivf_art_summary_GV">
<input type="text" data-table="ivf_art_summary" data-field="x_GV" name="x_GV" id="x_GV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->GV->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->GV->EditValue ?>"<?php echo $ivf_art_summary_add->GV->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->GV->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Others->Visible) { // Others ?>
	<div id="r_Others" class="form-group row">
		<label id="elh_ivf_art_summary_Others" for="x_Others" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Others" type="text/html"><?php echo $ivf_art_summary_add->Others->caption() ?><?php echo $ivf_art_summary_add->Others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Others->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Others" type="text/html"><span id="el_ivf_art_summary_Others">
<input type="text" data-table="ivf_art_summary" data-field="x_Others" name="x_Others" id="x_Others" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Others->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Others->EditValue ?>"<?php echo $ivf_art_summary_add->Others->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Others->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Normal2PN->Visible) { // Normal2PN ?>
	<div id="r_Normal2PN" class="form-group row">
		<label id="elh_ivf_art_summary_Normal2PN" for="x_Normal2PN" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Normal2PN" type="text/html"><?php echo $ivf_art_summary_add->Normal2PN->caption() ?><?php echo $ivf_art_summary_add->Normal2PN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Normal2PN->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Normal2PN" type="text/html"><span id="el_ivf_art_summary_Normal2PN">
<input type="text" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x_Normal2PN" id="x_Normal2PN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Normal2PN->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Normal2PN->EditValue ?>"<?php echo $ivf_art_summary_add->Normal2PN->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Normal2PN->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<div id="r_Abnormalfertilisation1N" class="form-group row">
		<label id="elh_ivf_art_summary_Abnormalfertilisation1N" for="x_Abnormalfertilisation1N" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Abnormalfertilisation1N" type="text/html"><?php echo $ivf_art_summary_add->Abnormalfertilisation1N->caption() ?><?php echo $ivf_art_summary_add->Abnormalfertilisation1N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Abnormalfertilisation1N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation1N" type="text/html"><span id="el_ivf_art_summary_Abnormalfertilisation1N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x_Abnormalfertilisation1N" id="x_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Abnormalfertilisation1N->EditValue ?>"<?php echo $ivf_art_summary_add->Abnormalfertilisation1N->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Abnormalfertilisation1N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<div id="r_Abnormalfertilisation3N" class="form-group row">
		<label id="elh_ivf_art_summary_Abnormalfertilisation3N" for="x_Abnormalfertilisation3N" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Abnormalfertilisation3N" type="text/html"><?php echo $ivf_art_summary_add->Abnormalfertilisation3N->caption() ?><?php echo $ivf_art_summary_add->Abnormalfertilisation3N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Abnormalfertilisation3N->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Abnormalfertilisation3N" type="text/html"><span id="el_ivf_art_summary_Abnormalfertilisation3N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x_Abnormalfertilisation3N" id="x_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Abnormalfertilisation3N->EditValue ?>"<?php echo $ivf_art_summary_add->Abnormalfertilisation3N->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Abnormalfertilisation3N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->NotFertilized->Visible) { // NotFertilized ?>
	<div id="r_NotFertilized" class="form-group row">
		<label id="elh_ivf_art_summary_NotFertilized" for="x_NotFertilized" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_NotFertilized" type="text/html"><?php echo $ivf_art_summary_add->NotFertilized->caption() ?><?php echo $ivf_art_summary_add->NotFertilized->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->NotFertilized->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotFertilized" type="text/html"><span id="el_ivf_art_summary_NotFertilized">
<input type="text" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x_NotFertilized" id="x_NotFertilized" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->NotFertilized->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->NotFertilized->EditValue ?>"<?php echo $ivf_art_summary_add->NotFertilized->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->NotFertilized->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Degenerated->Visible) { // Degenerated ?>
	<div id="r_Degenerated" class="form-group row">
		<label id="elh_ivf_art_summary_Degenerated" for="x_Degenerated" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Degenerated" type="text/html"><?php echo $ivf_art_summary_add->Degenerated->caption() ?><?php echo $ivf_art_summary_add->Degenerated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Degenerated->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Degenerated" type="text/html"><span id="el_ivf_art_summary_Degenerated">
<input type="text" data-table="ivf_art_summary" data-field="x_Degenerated" name="x_Degenerated" id="x_Degenerated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Degenerated->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Degenerated->EditValue ?>"<?php echo $ivf_art_summary_add->Degenerated->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Degenerated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->SpermDate->Visible) { // SpermDate ?>
	<div id="r_SpermDate" class="form-group row">
		<label id="elh_ivf_art_summary_SpermDate" for="x_SpermDate" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_SpermDate" type="text/html"><?php echo $ivf_art_summary_add->SpermDate->caption() ?><?php echo $ivf_art_summary_add->SpermDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->SpermDate->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_SpermDate" type="text/html"><span id="el_ivf_art_summary_SpermDate">
<input type="text" data-table="ivf_art_summary" data-field="x_SpermDate" name="x_SpermDate" id="x_SpermDate" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->SpermDate->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->SpermDate->EditValue ?>"<?php echo $ivf_art_summary_add->SpermDate->editAttributes() ?>>
<?php if (!$ivf_art_summary_add->SpermDate->ReadOnly && !$ivf_art_summary_add->SpermDate->Disabled && !isset($ivf_art_summary_add->SpermDate->EditAttrs["readonly"]) && !isset($ivf_art_summary_add->SpermDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_art_summaryadd_js">
loadjs.ready(["fivf_art_summaryadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_art_summaryadd", "x_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_art_summary_add->SpermDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Code1->Visible) { // Code1 ?>
	<div id="r_Code1" class="form-group row">
		<label id="elh_ivf_art_summary_Code1" for="x_Code1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Code1" type="text/html"><?php echo $ivf_art_summary_add->Code1->caption() ?><?php echo $ivf_art_summary_add->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Code1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code1" type="text/html"><span id="el_ivf_art_summary_Code1">
<input type="text" data-table="ivf_art_summary" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Code1->EditValue ?>"<?php echo $ivf_art_summary_add->Code1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Code1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Day1->Visible) { // Day1 ?>
	<div id="r_Day1" class="form-group row">
		<label id="elh_ivf_art_summary_Day1" for="x_Day1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Day1" type="text/html"><?php echo $ivf_art_summary_add->Day1->caption() ?><?php echo $ivf_art_summary_add->Day1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Day1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day1" type="text/html"><span id="el_ivf_art_summary_Day1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day1" data-value-separator="<?php echo $ivf_art_summary_add->Day1->displayValueSeparatorAttribute() ?>" id="x_Day1" name="x_Day1"<?php echo $ivf_art_summary_add->Day1->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Day1->selectOptionListHtml("x_Day1") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Day1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->CellStage1->Visible) { // CellStage1 ?>
	<div id="r_CellStage1" class="form-group row">
		<label id="elh_ivf_art_summary_CellStage1" for="x_CellStage1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_CellStage1" type="text/html"><?php echo $ivf_art_summary_add->CellStage1->caption() ?><?php echo $ivf_art_summary_add->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage1" type="text/html"><span id="el_ivf_art_summary_CellStage1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage1" data-value-separator="<?php echo $ivf_art_summary_add->CellStage1->displayValueSeparatorAttribute() ?>" id="x_CellStage1" name="x_CellStage1"<?php echo $ivf_art_summary_add->CellStage1->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->CellStage1->selectOptionListHtml("x_CellStage1") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->CellStage1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Grade1->Visible) { // Grade1 ?>
	<div id="r_Grade1" class="form-group row">
		<label id="elh_ivf_art_summary_Grade1" for="x_Grade1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Grade1" type="text/html"><?php echo $ivf_art_summary_add->Grade1->caption() ?><?php echo $ivf_art_summary_add->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade1" type="text/html"><span id="el_ivf_art_summary_Grade1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade1" data-value-separator="<?php echo $ivf_art_summary_add->Grade1->displayValueSeparatorAttribute() ?>" id="x_Grade1" name="x_Grade1"<?php echo $ivf_art_summary_add->Grade1->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Grade1->selectOptionListHtml("x_Grade1") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Grade1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->State1->Visible) { // State1 ?>
	<div id="r_State1" class="form-group row">
		<label id="elh_ivf_art_summary_State1" for="x_State1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_State1" type="text/html"><?php echo $ivf_art_summary_add->State1->caption() ?><?php echo $ivf_art_summary_add->State1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->State1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State1" type="text/html"><span id="el_ivf_art_summary_State1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State1" data-value-separator="<?php echo $ivf_art_summary_add->State1->displayValueSeparatorAttribute() ?>" id="x_State1" name="x_State1"<?php echo $ivf_art_summary_add->State1->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->State1->selectOptionListHtml("x_State1") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->State1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Code2->Visible) { // Code2 ?>
	<div id="r_Code2" class="form-group row">
		<label id="elh_ivf_art_summary_Code2" for="x_Code2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Code2" type="text/html"><?php echo $ivf_art_summary_add->Code2->caption() ?><?php echo $ivf_art_summary_add->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Code2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code2" type="text/html"><span id="el_ivf_art_summary_Code2">
<input type="text" data-table="ivf_art_summary" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Code2->EditValue ?>"<?php echo $ivf_art_summary_add->Code2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Code2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Day2->Visible) { // Day2 ?>
	<div id="r_Day2" class="form-group row">
		<label id="elh_ivf_art_summary_Day2" for="x_Day2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Day2" type="text/html"><?php echo $ivf_art_summary_add->Day2->caption() ?><?php echo $ivf_art_summary_add->Day2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Day2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day2" type="text/html"><span id="el_ivf_art_summary_Day2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day2" data-value-separator="<?php echo $ivf_art_summary_add->Day2->displayValueSeparatorAttribute() ?>" id="x_Day2" name="x_Day2"<?php echo $ivf_art_summary_add->Day2->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Day2->selectOptionListHtml("x_Day2") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Day2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->CellStage2->Visible) { // CellStage2 ?>
	<div id="r_CellStage2" class="form-group row">
		<label id="elh_ivf_art_summary_CellStage2" for="x_CellStage2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_CellStage2" type="text/html"><?php echo $ivf_art_summary_add->CellStage2->caption() ?><?php echo $ivf_art_summary_add->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage2" type="text/html"><span id="el_ivf_art_summary_CellStage2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage2" data-value-separator="<?php echo $ivf_art_summary_add->CellStage2->displayValueSeparatorAttribute() ?>" id="x_CellStage2" name="x_CellStage2"<?php echo $ivf_art_summary_add->CellStage2->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->CellStage2->selectOptionListHtml("x_CellStage2") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->CellStage2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Grade2->Visible) { // Grade2 ?>
	<div id="r_Grade2" class="form-group row">
		<label id="elh_ivf_art_summary_Grade2" for="x_Grade2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Grade2" type="text/html"><?php echo $ivf_art_summary_add->Grade2->caption() ?><?php echo $ivf_art_summary_add->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade2" type="text/html"><span id="el_ivf_art_summary_Grade2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade2" data-value-separator="<?php echo $ivf_art_summary_add->Grade2->displayValueSeparatorAttribute() ?>" id="x_Grade2" name="x_Grade2"<?php echo $ivf_art_summary_add->Grade2->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Grade2->selectOptionListHtml("x_Grade2") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Grade2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->State2->Visible) { // State2 ?>
	<div id="r_State2" class="form-group row">
		<label id="elh_ivf_art_summary_State2" for="x_State2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_State2" type="text/html"><?php echo $ivf_art_summary_add->State2->caption() ?><?php echo $ivf_art_summary_add->State2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->State2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State2" type="text/html"><span id="el_ivf_art_summary_State2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State2" data-value-separator="<?php echo $ivf_art_summary_add->State2->displayValueSeparatorAttribute() ?>" id="x_State2" name="x_State2"<?php echo $ivf_art_summary_add->State2->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->State2->selectOptionListHtml("x_State2") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->State2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Code3->Visible) { // Code3 ?>
	<div id="r_Code3" class="form-group row">
		<label id="elh_ivf_art_summary_Code3" for="x_Code3" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Code3" type="text/html"><?php echo $ivf_art_summary_add->Code3->caption() ?><?php echo $ivf_art_summary_add->Code3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Code3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code3" type="text/html"><span id="el_ivf_art_summary_Code3">
<input type="text" data-table="ivf_art_summary" data-field="x_Code3" name="x_Code3" id="x_Code3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Code3->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Code3->EditValue ?>"<?php echo $ivf_art_summary_add->Code3->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Code3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Day3->Visible) { // Day3 ?>
	<div id="r_Day3" class="form-group row">
		<label id="elh_ivf_art_summary_Day3" for="x_Day3" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Day3" type="text/html"><?php echo $ivf_art_summary_add->Day3->caption() ?><?php echo $ivf_art_summary_add->Day3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Day3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day3" type="text/html"><span id="el_ivf_art_summary_Day3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day3" data-value-separator="<?php echo $ivf_art_summary_add->Day3->displayValueSeparatorAttribute() ?>" id="x_Day3" name="x_Day3"<?php echo $ivf_art_summary_add->Day3->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Day3->selectOptionListHtml("x_Day3") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Day3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->CellStage3->Visible) { // CellStage3 ?>
	<div id="r_CellStage3" class="form-group row">
		<label id="elh_ivf_art_summary_CellStage3" for="x_CellStage3" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_CellStage3" type="text/html"><?php echo $ivf_art_summary_add->CellStage3->caption() ?><?php echo $ivf_art_summary_add->CellStage3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->CellStage3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage3" type="text/html"><span id="el_ivf_art_summary_CellStage3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage3" data-value-separator="<?php echo $ivf_art_summary_add->CellStage3->displayValueSeparatorAttribute() ?>" id="x_CellStage3" name="x_CellStage3"<?php echo $ivf_art_summary_add->CellStage3->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->CellStage3->selectOptionListHtml("x_CellStage3") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->CellStage3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Grade3->Visible) { // Grade3 ?>
	<div id="r_Grade3" class="form-group row">
		<label id="elh_ivf_art_summary_Grade3" for="x_Grade3" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Grade3" type="text/html"><?php echo $ivf_art_summary_add->Grade3->caption() ?><?php echo $ivf_art_summary_add->Grade3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Grade3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade3" type="text/html"><span id="el_ivf_art_summary_Grade3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade3" data-value-separator="<?php echo $ivf_art_summary_add->Grade3->displayValueSeparatorAttribute() ?>" id="x_Grade3" name="x_Grade3"<?php echo $ivf_art_summary_add->Grade3->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Grade3->selectOptionListHtml("x_Grade3") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Grade3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->State3->Visible) { // State3 ?>
	<div id="r_State3" class="form-group row">
		<label id="elh_ivf_art_summary_State3" for="x_State3" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_State3" type="text/html"><?php echo $ivf_art_summary_add->State3->caption() ?><?php echo $ivf_art_summary_add->State3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->State3->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State3" type="text/html"><span id="el_ivf_art_summary_State3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State3" data-value-separator="<?php echo $ivf_art_summary_add->State3->displayValueSeparatorAttribute() ?>" id="x_State3" name="x_State3"<?php echo $ivf_art_summary_add->State3->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->State3->selectOptionListHtml("x_State3") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->State3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Code4->Visible) { // Code4 ?>
	<div id="r_Code4" class="form-group row">
		<label id="elh_ivf_art_summary_Code4" for="x_Code4" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Code4" type="text/html"><?php echo $ivf_art_summary_add->Code4->caption() ?><?php echo $ivf_art_summary_add->Code4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Code4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code4" type="text/html"><span id="el_ivf_art_summary_Code4">
<input type="text" data-table="ivf_art_summary" data-field="x_Code4" name="x_Code4" id="x_Code4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Code4->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Code4->EditValue ?>"<?php echo $ivf_art_summary_add->Code4->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Code4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Day4->Visible) { // Day4 ?>
	<div id="r_Day4" class="form-group row">
		<label id="elh_ivf_art_summary_Day4" for="x_Day4" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Day4" type="text/html"><?php echo $ivf_art_summary_add->Day4->caption() ?><?php echo $ivf_art_summary_add->Day4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Day4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day4" type="text/html"><span id="el_ivf_art_summary_Day4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day4" data-value-separator="<?php echo $ivf_art_summary_add->Day4->displayValueSeparatorAttribute() ?>" id="x_Day4" name="x_Day4"<?php echo $ivf_art_summary_add->Day4->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Day4->selectOptionListHtml("x_Day4") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Day4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->CellStage4->Visible) { // CellStage4 ?>
	<div id="r_CellStage4" class="form-group row">
		<label id="elh_ivf_art_summary_CellStage4" for="x_CellStage4" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_CellStage4" type="text/html"><?php echo $ivf_art_summary_add->CellStage4->caption() ?><?php echo $ivf_art_summary_add->CellStage4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->CellStage4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage4" type="text/html"><span id="el_ivf_art_summary_CellStage4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage4" data-value-separator="<?php echo $ivf_art_summary_add->CellStage4->displayValueSeparatorAttribute() ?>" id="x_CellStage4" name="x_CellStage4"<?php echo $ivf_art_summary_add->CellStage4->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->CellStage4->selectOptionListHtml("x_CellStage4") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->CellStage4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Grade4->Visible) { // Grade4 ?>
	<div id="r_Grade4" class="form-group row">
		<label id="elh_ivf_art_summary_Grade4" for="x_Grade4" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Grade4" type="text/html"><?php echo $ivf_art_summary_add->Grade4->caption() ?><?php echo $ivf_art_summary_add->Grade4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Grade4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade4" type="text/html"><span id="el_ivf_art_summary_Grade4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade4" data-value-separator="<?php echo $ivf_art_summary_add->Grade4->displayValueSeparatorAttribute() ?>" id="x_Grade4" name="x_Grade4"<?php echo $ivf_art_summary_add->Grade4->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Grade4->selectOptionListHtml("x_Grade4") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Grade4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->State4->Visible) { // State4 ?>
	<div id="r_State4" class="form-group row">
		<label id="elh_ivf_art_summary_State4" for="x_State4" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_State4" type="text/html"><?php echo $ivf_art_summary_add->State4->caption() ?><?php echo $ivf_art_summary_add->State4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->State4->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State4" type="text/html"><span id="el_ivf_art_summary_State4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State4" data-value-separator="<?php echo $ivf_art_summary_add->State4->displayValueSeparatorAttribute() ?>" id="x_State4" name="x_State4"<?php echo $ivf_art_summary_add->State4->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->State4->selectOptionListHtml("x_State4") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->State4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Code5->Visible) { // Code5 ?>
	<div id="r_Code5" class="form-group row">
		<label id="elh_ivf_art_summary_Code5" for="x_Code5" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Code5" type="text/html"><?php echo $ivf_art_summary_add->Code5->caption() ?><?php echo $ivf_art_summary_add->Code5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Code5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Code5" type="text/html"><span id="el_ivf_art_summary_Code5">
<input type="text" data-table="ivf_art_summary" data-field="x_Code5" name="x_Code5" id="x_Code5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Code5->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Code5->EditValue ?>"<?php echo $ivf_art_summary_add->Code5->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Code5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Day5->Visible) { // Day5 ?>
	<div id="r_Day5" class="form-group row">
		<label id="elh_ivf_art_summary_Day5" for="x_Day5" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Day5" type="text/html"><?php echo $ivf_art_summary_add->Day5->caption() ?><?php echo $ivf_art_summary_add->Day5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Day5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Day5" type="text/html"><span id="el_ivf_art_summary_Day5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day5" data-value-separator="<?php echo $ivf_art_summary_add->Day5->displayValueSeparatorAttribute() ?>" id="x_Day5" name="x_Day5"<?php echo $ivf_art_summary_add->Day5->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Day5->selectOptionListHtml("x_Day5") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Day5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->CellStage5->Visible) { // CellStage5 ?>
	<div id="r_CellStage5" class="form-group row">
		<label id="elh_ivf_art_summary_CellStage5" for="x_CellStage5" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_CellStage5" type="text/html"><?php echo $ivf_art_summary_add->CellStage5->caption() ?><?php echo $ivf_art_summary_add->CellStage5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->CellStage5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_CellStage5" type="text/html"><span id="el_ivf_art_summary_CellStage5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage5" data-value-separator="<?php echo $ivf_art_summary_add->CellStage5->displayValueSeparatorAttribute() ?>" id="x_CellStage5" name="x_CellStage5"<?php echo $ivf_art_summary_add->CellStage5->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->CellStage5->selectOptionListHtml("x_CellStage5") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->CellStage5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Grade5->Visible) { // Grade5 ?>
	<div id="r_Grade5" class="form-group row">
		<label id="elh_ivf_art_summary_Grade5" for="x_Grade5" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Grade5" type="text/html"><?php echo $ivf_art_summary_add->Grade5->caption() ?><?php echo $ivf_art_summary_add->Grade5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Grade5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Grade5" type="text/html"><span id="el_ivf_art_summary_Grade5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade5" data-value-separator="<?php echo $ivf_art_summary_add->Grade5->displayValueSeparatorAttribute() ?>" id="x_Grade5" name="x_Grade5"<?php echo $ivf_art_summary_add->Grade5->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->Grade5->selectOptionListHtml("x_Grade5") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->Grade5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->State5->Visible) { // State5 ?>
	<div id="r_State5" class="form-group row">
		<label id="elh_ivf_art_summary_State5" for="x_State5" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_State5" type="text/html"><?php echo $ivf_art_summary_add->State5->caption() ?><?php echo $ivf_art_summary_add->State5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->State5->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_State5" type="text/html"><span id="el_ivf_art_summary_State5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State5" data-value-separator="<?php echo $ivf_art_summary_add->State5->displayValueSeparatorAttribute() ?>" id="x_State5" name="x_State5"<?php echo $ivf_art_summary_add->State5->editAttributes() ?>>
			<?php echo $ivf_art_summary_add->State5->selectOptionListHtml("x_State5") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_art_summary_add->State5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_art_summary_TidNo" for="x_TidNo" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_TidNo" type="text/html"><?php echo $ivf_art_summary_add->TidNo->caption() ?><?php echo $ivf_art_summary_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_TidNo" type="text/html"><span id="el_ivf_art_summary_TidNo">
<input type="text" data-table="ivf_art_summary" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->TidNo->EditValue ?>"<?php echo $ivf_art_summary_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_art_summary_RIDNo" for="x_RIDNo" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_RIDNo" type="text/html"><?php echo $ivf_art_summary_add->RIDNo->caption() ?><?php echo $ivf_art_summary_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_RIDNo" type="text/html"><span id="el_ivf_art_summary_RIDNo">
<input type="text" data-table="ivf_art_summary" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->RIDNo->EditValue ?>"<?php echo $ivf_art_summary_add->RIDNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label id="elh_ivf_art_summary_Volume" for="x_Volume" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Volume" type="text/html"><?php echo $ivf_art_summary_add->Volume->caption() ?><?php echo $ivf_art_summary_add->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Volume->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume" type="text/html"><span id="el_ivf_art_summary_Volume">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Volume->EditValue ?>"<?php echo $ivf_art_summary_add->Volume->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Volume->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Volume1->Visible) { // Volume1 ?>
	<div id="r_Volume1" class="form-group row">
		<label id="elh_ivf_art_summary_Volume1" for="x_Volume1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Volume1" type="text/html"><?php echo $ivf_art_summary_add->Volume1->caption() ?><?php echo $ivf_art_summary_add->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Volume1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume1" type="text/html"><span id="el_ivf_art_summary_Volume1">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Volume1->EditValue ?>"<?php echo $ivf_art_summary_add->Volume1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Volume1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Volume2->Visible) { // Volume2 ?>
	<div id="r_Volume2" class="form-group row">
		<label id="elh_ivf_art_summary_Volume2" for="x_Volume2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Volume2" type="text/html"><?php echo $ivf_art_summary_add->Volume2->caption() ?><?php echo $ivf_art_summary_add->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Volume2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Volume2" type="text/html"><span id="el_ivf_art_summary_Volume2">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Volume2->EditValue ?>"<?php echo $ivf_art_summary_add->Volume2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Volume2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Concentration2->Visible) { // Concentration2 ?>
	<div id="r_Concentration2" class="form-group row">
		<label id="elh_ivf_art_summary_Concentration2" for="x_Concentration2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Concentration2" type="text/html"><?php echo $ivf_art_summary_add->Concentration2->caption() ?><?php echo $ivf_art_summary_add->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Concentration2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Concentration2" type="text/html"><span id="el_ivf_art_summary_Concentration2">
<input type="text" data-table="ivf_art_summary" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Concentration2->EditValue ?>"<?php echo $ivf_art_summary_add->Concentration2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Concentration2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label id="elh_ivf_art_summary_Total" for="x_Total" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Total" type="text/html"><?php echo $ivf_art_summary_add->Total->caption() ?><?php echo $ivf_art_summary_add->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Total->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total" type="text/html"><span id="el_ivf_art_summary_Total">
<input type="text" data-table="ivf_art_summary" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Total->EditValue ?>"<?php echo $ivf_art_summary_add->Total->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Total->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Total1->Visible) { // Total1 ?>
	<div id="r_Total1" class="form-group row">
		<label id="elh_ivf_art_summary_Total1" for="x_Total1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Total1" type="text/html"><?php echo $ivf_art_summary_add->Total1->caption() ?><?php echo $ivf_art_summary_add->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Total1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total1" type="text/html"><span id="el_ivf_art_summary_Total1">
<input type="text" data-table="ivf_art_summary" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Total1->EditValue ?>"<?php echo $ivf_art_summary_add->Total1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Total1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Total2->Visible) { // Total2 ?>
	<div id="r_Total2" class="form-group row">
		<label id="elh_ivf_art_summary_Total2" for="x_Total2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Total2" type="text/html"><?php echo $ivf_art_summary_add->Total2->caption() ?><?php echo $ivf_art_summary_add->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Total2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Total2" type="text/html"><span id="el_ivf_art_summary_Total2">
<input type="text" data-table="ivf_art_summary" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Total2->EditValue ?>"<?php echo $ivf_art_summary_add->Total2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Total2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Progressive->Visible) { // Progressive ?>
	<div id="r_Progressive" class="form-group row">
		<label id="elh_ivf_art_summary_Progressive" for="x_Progressive" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Progressive" type="text/html"><?php echo $ivf_art_summary_add->Progressive->caption() ?><?php echo $ivf_art_summary_add->Progressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Progressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive" type="text/html"><span id="el_ivf_art_summary_Progressive">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive" name="x_Progressive" id="x_Progressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Progressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Progressive->EditValue ?>"<?php echo $ivf_art_summary_add->Progressive->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Progressive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Progressive1->Visible) { // Progressive1 ?>
	<div id="r_Progressive1" class="form-group row">
		<label id="elh_ivf_art_summary_Progressive1" for="x_Progressive1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Progressive1" type="text/html"><?php echo $ivf_art_summary_add->Progressive1->caption() ?><?php echo $ivf_art_summary_add->Progressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Progressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive1" type="text/html"><span id="el_ivf_art_summary_Progressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive1" name="x_Progressive1" id="x_Progressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Progressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Progressive1->EditValue ?>"<?php echo $ivf_art_summary_add->Progressive1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Progressive1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Progressive2->Visible) { // Progressive2 ?>
	<div id="r_Progressive2" class="form-group row">
		<label id="elh_ivf_art_summary_Progressive2" for="x_Progressive2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Progressive2" type="text/html"><?php echo $ivf_art_summary_add->Progressive2->caption() ?><?php echo $ivf_art_summary_add->Progressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Progressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Progressive2" type="text/html"><span id="el_ivf_art_summary_Progressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive2" name="x_Progressive2" id="x_Progressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Progressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Progressive2->EditValue ?>"<?php echo $ivf_art_summary_add->Progressive2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Progressive2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->NotProgressive->Visible) { // NotProgressive ?>
	<div id="r_NotProgressive" class="form-group row">
		<label id="elh_ivf_art_summary_NotProgressive" for="x_NotProgressive" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_NotProgressive" type="text/html"><?php echo $ivf_art_summary_add->NotProgressive->caption() ?><?php echo $ivf_art_summary_add->NotProgressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->NotProgressive->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive" type="text/html"><span id="el_ivf_art_summary_NotProgressive">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x_NotProgressive" id="x_NotProgressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->NotProgressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->NotProgressive->EditValue ?>"<?php echo $ivf_art_summary_add->NotProgressive->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->NotProgressive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->NotProgressive1->Visible) { // NotProgressive1 ?>
	<div id="r_NotProgressive1" class="form-group row">
		<label id="elh_ivf_art_summary_NotProgressive1" for="x_NotProgressive1" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_NotProgressive1" type="text/html"><?php echo $ivf_art_summary_add->NotProgressive1->caption() ?><?php echo $ivf_art_summary_add->NotProgressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->NotProgressive1->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive1" type="text/html"><span id="el_ivf_art_summary_NotProgressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x_NotProgressive1" id="x_NotProgressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->NotProgressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->NotProgressive1->EditValue ?>"<?php echo $ivf_art_summary_add->NotProgressive1->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->NotProgressive1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->NotProgressive2->Visible) { // NotProgressive2 ?>
	<div id="r_NotProgressive2" class="form-group row">
		<label id="elh_ivf_art_summary_NotProgressive2" for="x_NotProgressive2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_NotProgressive2" type="text/html"><?php echo $ivf_art_summary_add->NotProgressive2->caption() ?><?php echo $ivf_art_summary_add->NotProgressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->NotProgressive2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_NotProgressive2" type="text/html"><span id="el_ivf_art_summary_NotProgressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x_NotProgressive2" id="x_NotProgressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->NotProgressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->NotProgressive2->EditValue ?>"<?php echo $ivf_art_summary_add->NotProgressive2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->NotProgressive2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Motility2->Visible) { // Motility2 ?>
	<div id="r_Motility2" class="form-group row">
		<label id="elh_ivf_art_summary_Motility2" for="x_Motility2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Motility2" type="text/html"><?php echo $ivf_art_summary_add->Motility2->caption() ?><?php echo $ivf_art_summary_add->Motility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Motility2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Motility2" type="text/html"><span id="el_ivf_art_summary_Motility2">
<input type="text" data-table="ivf_art_summary" data-field="x_Motility2" name="x_Motility2" id="x_Motility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Motility2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Motility2->EditValue ?>"<?php echo $ivf_art_summary_add->Motility2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Motility2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_art_summary_add->Morphology2->Visible) { // Morphology2 ?>
	<div id="r_Morphology2" class="form-group row">
		<label id="elh_ivf_art_summary_Morphology2" for="x_Morphology2" class="<?php echo $ivf_art_summary_add->LeftColumnClass ?>"><script id="tpc_ivf_art_summary_Morphology2" type="text/html"><?php echo $ivf_art_summary_add->Morphology2->caption() ?><?php echo $ivf_art_summary_add->Morphology2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_art_summary_add->RightColumnClass ?>"><div <?php echo $ivf_art_summary_add->Morphology2->cellAttributes() ?>>
<script id="tpx_ivf_art_summary_Morphology2" type="text/html"><span id="el_ivf_art_summary_Morphology2">
<input type="text" data-table="ivf_art_summary" data-field="x_Morphology2" name="x_Morphology2" id="x_Morphology2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary_add->Morphology2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary_add->Morphology2->EditValue ?>"<?php echo $ivf_art_summary_add->Morphology2->editAttributes() ?>>
</span></script>
<?php echo $ivf_art_summary_add->Morphology2->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_art_summaryadd" class="ew-custom-template"></div>
<script id="tpm_ivf_art_summaryadd" type="text/html">
<div id="ct_ivf_art_summary_add"><style>
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
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr;
}
?>
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
				<a class="btn btn-app"  href="<?php echo $TrPlanurl; ?>">
				  <i class="fas fa-cart-plus"></i> Plan
				</a>
				<a class="btn btn-app" href="patientview.php?showdetail=&id=<?php echo $results2[0]["id"]; ?>">
				  <i class="fas fa-female"></i> Patient
				</a>
				<a class="btn btn-app"  href="patientview.php?showdetail=&id=<?php echo $results1[0]["id"]; ?>">
				  <i class="fas fa-male"></i> Partner
				</a>
				<a class="btn btn-app" href="<?php echo $VitalsHistoryUrl; ?>">
				  <span class="badge bg-warning"><?php echo $VitalsHistoryRowCount; ?></span>
				  <i class="fas fa-thermometer-full"></i> Vitals & History
				</a>
				<a class="btn btn-app" href="<?php echo $opurl; ?>">
				  <i class="fas fa-pencil-square-o"></i> OP
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
							<?php echo $ivfstimulationchartwarn; ?>
				  <i class="fas fa-sticky-note "></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfovumpickupchartUrl; ?>">
							<?php echo $ivfovumpickupchartwarn; ?>
				  <i class="fas fa-object-group"></i> Ovum Pick Up
				</a>
				<a class="btn btn-app"  href="<?php echo $ivf_et_chartUrl; ?>">
					<?php echo $Etcountwarn; ?>
				  <i class="fas fa-globe"></i> ET
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfsemenanalysisreportUrl; ?>">
							<?php echo $ivfsemenanalysisreportwarn; ?>
				  <i class="fas fa-puzzle-piece"></i> Semen Analysis
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfembryologychartlistUrl; ?>">
				  <i class="fas fa-bullseye"></i> Embryology 
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfotherprocedureUrl; ?>">
							<?php echo $ivfotherprocedurewarn; ?>
				  <i class="fas fa-life-ring"></i> Other Procedure
				</a>
				<a class="btn btn-app"  href="<?php echo $followupurl; ?>">
				  <i class="fas fa-map-marker"></i> Tracking
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfartsummaryUrl; ?>">
							 <?php echo $ivfartsummarycountwarn; ?>
				  <i class="fas fa-medkit"></i> Summary
				</a>
				<a class="btn btn-app"  href="<?php echo $patientserviceslistUrl; ?>">
				  <i class="fas fa-credit-card"></i> Billing
				</a>
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

<?php if (!$ivf_art_summary_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_art_summary_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_art_summary_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_art_summary->Rows) ?> };
	ew.applyTemplate("tpd_ivf_art_summaryadd", "tpm_ivf_art_summaryadd", "ivf_art_summaryadd", "<?php echo $ivf_art_summary->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_art_summaryadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_art_summary_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_M2").style.width="180px",document.getElementById("x_M1").style.width="180px",document.getElementById("x_Normal2PN").style.width="180px",document.getElementById("x_Mi2").style.width="180px",document.getElementById("x_GV").style.width="180px",document.getElementById("x_Abnormalfertilisation1N").style.width="180px",document.getElementById("x_Others").style.width="180px",document.getElementById("x_Abnormalfertilisation3N").style.width="180px",document.getElementById("x_ICSI").style.width="180px",document.getElementById("x_NotFertilized").style.width="180px",document.getElementById("x_IVF").style.width="180px",document.getElementById("x_Degenerated").style.width="180px",document.getElementById("x_pre_Concentration").style.width="180px",document.getElementById("x_post_Concentration").style.width="180px",document.getElementById("x_pre_Motility").style.width="180px",document.getElementById("x_post_Motility").style.width="180px",document.getElementById("x_pre_Morphology").style.width="180px",document.getElementById("x_post_Morphology").style.width="180px",document.getElementById("x_Volume").style.width="180px",document.getElementById("x_Volume1").style.width="180px",document.getElementById("x_Volume2").style.width="180px",document.getElementById("x_Concentration2").style.width="180px",document.getElementById("x_Total").style.width="180px",document.getElementById("x_Total1").style.width="180px",document.getElementById("x_Total2").style.width="180px",document.getElementById("x_Progressive").style.width="180px",document.getElementById("x_Progressive1").style.width="180px",document.getElementById("x_Progressive2").style.width="180px",document.getElementById("x_NotProgressive").style.width="180px",document.getElementById("x_NotProgressive1").style.width="180px",document.getElementById("x_NotProgressive2").style.width="180px",document.getElementById("x_Motility2").style.width="180px",document.getElementById("x_Morphology2").style.width="180px",document.getElementById("x_Code1").style.width="180px",document.getElementById("x_Day1").style.width="180px",document.getElementById("x_CellStage1").style.width="180px",document.getElementById("x_Grade1").style.width="180px",document.getElementById("x_State1").style.width="180px",document.getElementById("x_Code2").style.width="180px",document.getElementById("x_Day2").style.width="180px",document.getElementById("x_CellStage2").style.width="180px",document.getElementById("x_Grade2").style.width="180px",document.getElementById("x_State2").style.width="180px",document.getElementById("x_Code3").style.width="180px",document.getElementById("x_Day3").style.width="180px",document.getElementById("x_CellStage3").style.width="180px",document.getElementById("x_Grade3").style.width="180px",document.getElementById("x_State3").style.width="180px",document.getElementById("x_Code4").style.width="180px",document.getElementById("x_Day4").style.width="180px",document.getElementById("x_CellStage4").style.width="180px",document.getElementById("x_Grade4").style.width="180px",document.getElementById("x_State4").style.width="180px",document.getElementById("x_Code5").style.width="180px",document.getElementById("x_Day5").style.width="180px",document.getElementById("x_CellStage5").style.width="180px",document.getElementById("x_Grade5").style.width="180px",document.getElementById("x_State5").style.width="180px";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_art_summary_add->terminate();
?>