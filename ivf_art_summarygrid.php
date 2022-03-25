<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_art_summary_grid))
	$ivf_art_summary_grid = new ivf_art_summary_grid();

// Run the page
$ivf_art_summary_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_grid->Page_Render();
?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>

// Form object
var fivf_art_summarygrid = new ew.Form("fivf_art_summarygrid", "grid");
fivf_art_summarygrid.formKeyCountName = '<?php echo $ivf_art_summary_grid->FormKeyCountName ?>';

// Validate form
fivf_art_summarygrid.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($ivf_art_summary_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->id->caption(), $ivf_art_summary->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->ARTCycle->caption(), $ivf_art_summary->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Spermorigin->Required) { ?>
			elm = this.getElements("x" + infix + "_Spermorigin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Spermorigin->caption(), $ivf_art_summary->Spermorigin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->IndicationforART->Required) { ?>
			elm = this.getElements("x" + infix + "_IndicationforART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->IndicationforART->caption(), $ivf_art_summary->IndicationforART->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->DateofICSI->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofICSI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->DateofICSI->caption(), $ivf_art_summary->DateofICSI->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DateofICSI");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_art_summary->DateofICSI->errorMessage()) ?>");
		<?php if ($ivf_art_summary_grid->Origin->Required) { ?>
			elm = this.getElements("x" + infix + "_Origin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Origin->caption(), $ivf_art_summary->Origin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Status->caption(), $ivf_art_summary->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Method->caption(), $ivf_art_summary->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->pre_Concentration->Required) { ?>
			elm = this.getElements("x" + infix + "_pre_Concentration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->pre_Concentration->caption(), $ivf_art_summary->pre_Concentration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->pre_Motility->Required) { ?>
			elm = this.getElements("x" + infix + "_pre_Motility");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->pre_Motility->caption(), $ivf_art_summary->pre_Motility->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->pre_Morphology->Required) { ?>
			elm = this.getElements("x" + infix + "_pre_Morphology");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->pre_Morphology->caption(), $ivf_art_summary->pre_Morphology->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->post_Concentration->Required) { ?>
			elm = this.getElements("x" + infix + "_post_Concentration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->post_Concentration->caption(), $ivf_art_summary->post_Concentration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->post_Motility->Required) { ?>
			elm = this.getElements("x" + infix + "_post_Motility");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->post_Motility->caption(), $ivf_art_summary->post_Motility->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->post_Morphology->Required) { ?>
			elm = this.getElements("x" + infix + "_post_Morphology");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->post_Morphology->caption(), $ivf_art_summary->post_Morphology->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->NumberofEmbryostransferred->Required) { ?>
			elm = this.getElements("x" + infix + "_NumberofEmbryostransferred");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->NumberofEmbryostransferred->caption(), $ivf_art_summary->NumberofEmbryostransferred->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Embryosunderobservation->Required) { ?>
			elm = this.getElements("x" + infix + "_Embryosunderobservation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Embryosunderobservation->caption(), $ivf_art_summary->Embryosunderobservation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->EmbryoDevelopmentSummary->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoDevelopmentSummary");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->EmbryoDevelopmentSummary->caption(), $ivf_art_summary->EmbryoDevelopmentSummary->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->EmbryologistSignature->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryologistSignature");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->EmbryologistSignature->caption(), $ivf_art_summary->EmbryologistSignature->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->IVFRegistrationID->Required) { ?>
			elm = this.getElements("x" + infix + "_IVFRegistrationID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->IVFRegistrationID->caption(), $ivf_art_summary->IVFRegistrationID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IVFRegistrationID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_art_summary->IVFRegistrationID->errorMessage()) ?>");
		<?php if ($ivf_art_summary_grid->InseminatinTechnique->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminatinTechnique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->InseminatinTechnique->caption(), $ivf_art_summary->InseminatinTechnique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->ICSIDetails->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIDetails");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->ICSIDetails->caption(), $ivf_art_summary->ICSIDetails->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->DateofET->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofET");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->DateofET->caption(), $ivf_art_summary->DateofET->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Reasonfornotranfer->Required) { ?>
			elm = this.getElements("x" + infix + "_Reasonfornotranfer");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Reasonfornotranfer->caption(), $ivf_art_summary->Reasonfornotranfer->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->EmbryosCryopreserved->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryosCryopreserved");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->EmbryosCryopreserved->caption(), $ivf_art_summary->EmbryosCryopreserved->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->LegendCellStage->Required) { ?>
			elm = this.getElements("x" + infix + "_LegendCellStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->LegendCellStage->caption(), $ivf_art_summary->LegendCellStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->ConsultantsSignature->Required) { ?>
			elm = this.getElements("x" + infix + "_ConsultantsSignature");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->ConsultantsSignature->caption(), $ivf_art_summary->ConsultantsSignature->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Name->caption(), $ivf_art_summary->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->M2->Required) { ?>
			elm = this.getElements("x" + infix + "_M2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->M2->caption(), $ivf_art_summary->M2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Mi2->Required) { ?>
			elm = this.getElements("x" + infix + "_Mi2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Mi2->caption(), $ivf_art_summary->Mi2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->ICSI->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->ICSI->caption(), $ivf_art_summary->ICSI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->IVF->Required) { ?>
			elm = this.getElements("x" + infix + "_IVF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->IVF->caption(), $ivf_art_summary->IVF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->M1->Required) { ?>
			elm = this.getElements("x" + infix + "_M1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->M1->caption(), $ivf_art_summary->M1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->GV->Required) { ?>
			elm = this.getElements("x" + infix + "_GV");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->GV->caption(), $ivf_art_summary->GV->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Others->Required) { ?>
			elm = this.getElements("x" + infix + "_Others");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Others->caption(), $ivf_art_summary->Others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Normal2PN->Required) { ?>
			elm = this.getElements("x" + infix + "_Normal2PN");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Normal2PN->caption(), $ivf_art_summary->Normal2PN->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Abnormalfertilisation1N->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormalfertilisation1N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Abnormalfertilisation1N->caption(), $ivf_art_summary->Abnormalfertilisation1N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Abnormalfertilisation3N->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormalfertilisation3N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Abnormalfertilisation3N->caption(), $ivf_art_summary->Abnormalfertilisation3N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->NotFertilized->Required) { ?>
			elm = this.getElements("x" + infix + "_NotFertilized");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->NotFertilized->caption(), $ivf_art_summary->NotFertilized->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Degenerated->Required) { ?>
			elm = this.getElements("x" + infix + "_Degenerated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Degenerated->caption(), $ivf_art_summary->Degenerated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->SpermDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SpermDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->SpermDate->caption(), $ivf_art_summary->SpermDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SpermDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_art_summary->SpermDate->errorMessage()) ?>");
		<?php if ($ivf_art_summary_grid->Code1->Required) { ?>
			elm = this.getElements("x" + infix + "_Code1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Code1->caption(), $ivf_art_summary->Code1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Day1->Required) { ?>
			elm = this.getElements("x" + infix + "_Day1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Day1->caption(), $ivf_art_summary->Day1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->CellStage1->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->CellStage1->caption(), $ivf_art_summary->CellStage1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Grade1->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Grade1->caption(), $ivf_art_summary->Grade1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->State1->Required) { ?>
			elm = this.getElements("x" + infix + "_State1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->State1->caption(), $ivf_art_summary->State1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Code2->Required) { ?>
			elm = this.getElements("x" + infix + "_Code2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Code2->caption(), $ivf_art_summary->Code2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Day2->Required) { ?>
			elm = this.getElements("x" + infix + "_Day2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Day2->caption(), $ivf_art_summary->Day2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->CellStage2->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->CellStage2->caption(), $ivf_art_summary->CellStage2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Grade2->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Grade2->caption(), $ivf_art_summary->Grade2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->State2->Required) { ?>
			elm = this.getElements("x" + infix + "_State2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->State2->caption(), $ivf_art_summary->State2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Code3->Required) { ?>
			elm = this.getElements("x" + infix + "_Code3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Code3->caption(), $ivf_art_summary->Code3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Day3->Required) { ?>
			elm = this.getElements("x" + infix + "_Day3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Day3->caption(), $ivf_art_summary->Day3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->CellStage3->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->CellStage3->caption(), $ivf_art_summary->CellStage3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Grade3->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Grade3->caption(), $ivf_art_summary->Grade3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->State3->Required) { ?>
			elm = this.getElements("x" + infix + "_State3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->State3->caption(), $ivf_art_summary->State3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Code4->Required) { ?>
			elm = this.getElements("x" + infix + "_Code4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Code4->caption(), $ivf_art_summary->Code4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Day4->Required) { ?>
			elm = this.getElements("x" + infix + "_Day4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Day4->caption(), $ivf_art_summary->Day4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->CellStage4->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->CellStage4->caption(), $ivf_art_summary->CellStage4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Grade4->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Grade4->caption(), $ivf_art_summary->Grade4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->State4->Required) { ?>
			elm = this.getElements("x" + infix + "_State4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->State4->caption(), $ivf_art_summary->State4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Code5->Required) { ?>
			elm = this.getElements("x" + infix + "_Code5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Code5->caption(), $ivf_art_summary->Code5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Day5->Required) { ?>
			elm = this.getElements("x" + infix + "_Day5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Day5->caption(), $ivf_art_summary->Day5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->CellStage5->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->CellStage5->caption(), $ivf_art_summary->CellStage5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Grade5->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Grade5->caption(), $ivf_art_summary->Grade5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->State5->Required) { ?>
			elm = this.getElements("x" + infix + "_State5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->State5->caption(), $ivf_art_summary->State5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->TidNo->caption(), $ivf_art_summary->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_art_summary->TidNo->errorMessage()) ?>");
		<?php if ($ivf_art_summary_grid->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->RIDNo->caption(), $ivf_art_summary->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_art_summary->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_art_summary_grid->Volume->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Volume->caption(), $ivf_art_summary->Volume->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Volume1->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Volume1->caption(), $ivf_art_summary->Volume1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Volume2->Required) { ?>
			elm = this.getElements("x" + infix + "_Volume2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Volume2->caption(), $ivf_art_summary->Volume2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Concentration2->Required) { ?>
			elm = this.getElements("x" + infix + "_Concentration2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Concentration2->caption(), $ivf_art_summary->Concentration2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Total->Required) { ?>
			elm = this.getElements("x" + infix + "_Total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Total->caption(), $ivf_art_summary->Total->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Total1->Required) { ?>
			elm = this.getElements("x" + infix + "_Total1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Total1->caption(), $ivf_art_summary->Total1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Total2->Required) { ?>
			elm = this.getElements("x" + infix + "_Total2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Total2->caption(), $ivf_art_summary->Total2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Progressive->Required) { ?>
			elm = this.getElements("x" + infix + "_Progressive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Progressive->caption(), $ivf_art_summary->Progressive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Progressive1->Required) { ?>
			elm = this.getElements("x" + infix + "_Progressive1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Progressive1->caption(), $ivf_art_summary->Progressive1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Progressive2->Required) { ?>
			elm = this.getElements("x" + infix + "_Progressive2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Progressive2->caption(), $ivf_art_summary->Progressive2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->NotProgressive->Required) { ?>
			elm = this.getElements("x" + infix + "_NotProgressive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->NotProgressive->caption(), $ivf_art_summary->NotProgressive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->NotProgressive1->Required) { ?>
			elm = this.getElements("x" + infix + "_NotProgressive1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->NotProgressive1->caption(), $ivf_art_summary->NotProgressive1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->NotProgressive2->Required) { ?>
			elm = this.getElements("x" + infix + "_NotProgressive2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->NotProgressive2->caption(), $ivf_art_summary->NotProgressive2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Motility2->Required) { ?>
			elm = this.getElements("x" + infix + "_Motility2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Motility2->caption(), $ivf_art_summary->Motility2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_art_summary_grid->Morphology2->Required) { ?>
			elm = this.getElements("x" + infix + "_Morphology2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_art_summary->Morphology2->caption(), $ivf_art_summary->Morphology2->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_art_summarygrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "ARTCycle", false)) return false;
	if (ew.valueChanged(fobj, infix, "Spermorigin", false)) return false;
	if (ew.valueChanged(fobj, infix, "IndicationforART", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofICSI", false)) return false;
	if (ew.valueChanged(fobj, infix, "Origin", false)) return false;
	if (ew.valueChanged(fobj, infix, "Status", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "pre_Concentration", false)) return false;
	if (ew.valueChanged(fobj, infix, "pre_Motility", false)) return false;
	if (ew.valueChanged(fobj, infix, "pre_Morphology", false)) return false;
	if (ew.valueChanged(fobj, infix, "post_Concentration", false)) return false;
	if (ew.valueChanged(fobj, infix, "post_Motility", false)) return false;
	if (ew.valueChanged(fobj, infix, "post_Morphology", false)) return false;
	if (ew.valueChanged(fobj, infix, "NumberofEmbryostransferred", false)) return false;
	if (ew.valueChanged(fobj, infix, "Embryosunderobservation", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryoDevelopmentSummary", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryologistSignature", false)) return false;
	if (ew.valueChanged(fobj, infix, "IVFRegistrationID", false)) return false;
	if (ew.valueChanged(fobj, infix, "InseminatinTechnique", false)) return false;
	if (ew.valueChanged(fobj, infix, "ICSIDetails", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofET", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reasonfornotranfer", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryosCryopreserved", false)) return false;
	if (ew.valueChanged(fobj, infix, "LegendCellStage", false)) return false;
	if (ew.valueChanged(fobj, infix, "ConsultantsSignature", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "M2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Mi2", false)) return false;
	if (ew.valueChanged(fobj, infix, "ICSI", false)) return false;
	if (ew.valueChanged(fobj, infix, "IVF", false)) return false;
	if (ew.valueChanged(fobj, infix, "M1", false)) return false;
	if (ew.valueChanged(fobj, infix, "GV", false)) return false;
	if (ew.valueChanged(fobj, infix, "Others", false)) return false;
	if (ew.valueChanged(fobj, infix, "Normal2PN", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abnormalfertilisation1N", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abnormalfertilisation3N", false)) return false;
	if (ew.valueChanged(fobj, infix, "NotFertilized", false)) return false;
	if (ew.valueChanged(fobj, infix, "Degenerated", false)) return false;
	if (ew.valueChanged(fobj, infix, "SpermDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day1", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade1", false)) return false;
	if (ew.valueChanged(fobj, infix, "State1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day2", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade2", false)) return false;
	if (ew.valueChanged(fobj, infix, "State2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code3", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day3", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage3", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade3", false)) return false;
	if (ew.valueChanged(fobj, infix, "State3", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code4", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day4", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage4", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade4", false)) return false;
	if (ew.valueChanged(fobj, infix, "State4", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code5", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day5", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage5", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade5", false)) return false;
	if (ew.valueChanged(fobj, infix, "State5", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Volume2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Concentration2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Total2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Progressive", false)) return false;
	if (ew.valueChanged(fobj, infix, "Progressive1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Progressive2", false)) return false;
	if (ew.valueChanged(fobj, infix, "NotProgressive", false)) return false;
	if (ew.valueChanged(fobj, infix, "NotProgressive1", false)) return false;
	if (ew.valueChanged(fobj, infix, "NotProgressive2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Motility2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Morphology2", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_art_summarygrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_art_summarygrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_art_summarygrid.lists["x_ARTCycle"] = <?php echo $ivf_art_summary_grid->ARTCycle->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_art_summary_grid->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Spermorigin"] = <?php echo $ivf_art_summary_grid->Spermorigin->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Spermorigin"].options = <?php echo JsonEncode($ivf_art_summary_grid->Spermorigin->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Origin"] = <?php echo $ivf_art_summary_grid->Origin->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Origin"].options = <?php echo JsonEncode($ivf_art_summary_grid->Origin->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Status"] = <?php echo $ivf_art_summary_grid->Status->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Status"].options = <?php echo JsonEncode($ivf_art_summary_grid->Status->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Method"] = <?php echo $ivf_art_summary_grid->Method->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Method"].options = <?php echo JsonEncode($ivf_art_summary_grid->Method->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_InseminatinTechnique"] = <?php echo $ivf_art_summary_grid->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_art_summary_grid->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_DateofET"] = <?php echo $ivf_art_summary_grid->DateofET->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_DateofET"].options = <?php echo JsonEncode($ivf_art_summary_grid->DateofET->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Reasonfornotranfer"] = <?php echo $ivf_art_summary_grid->Reasonfornotranfer->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Reasonfornotranfer"].options = <?php echo JsonEncode($ivf_art_summary_grid->Reasonfornotranfer->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_ConsultantsSignature"] = <?php echo $ivf_art_summary_grid->ConsultantsSignature->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_ConsultantsSignature"].options = <?php echo JsonEncode($ivf_art_summary_grid->ConsultantsSignature->lookupOptions()) ?>;
fivf_art_summarygrid.lists["x_Day1"] = <?php echo $ivf_art_summary_grid->Day1->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Day1"].options = <?php echo JsonEncode($ivf_art_summary_grid->Day1->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_CellStage1"] = <?php echo $ivf_art_summary_grid->CellStage1->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_CellStage1"].options = <?php echo JsonEncode($ivf_art_summary_grid->CellStage1->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Grade1"] = <?php echo $ivf_art_summary_grid->Grade1->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Grade1"].options = <?php echo JsonEncode($ivf_art_summary_grid->Grade1->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_State1"] = <?php echo $ivf_art_summary_grid->State1->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_State1"].options = <?php echo JsonEncode($ivf_art_summary_grid->State1->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Day2"] = <?php echo $ivf_art_summary_grid->Day2->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Day2"].options = <?php echo JsonEncode($ivf_art_summary_grid->Day2->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_CellStage2"] = <?php echo $ivf_art_summary_grid->CellStage2->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_CellStage2"].options = <?php echo JsonEncode($ivf_art_summary_grid->CellStage2->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Grade2"] = <?php echo $ivf_art_summary_grid->Grade2->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Grade2"].options = <?php echo JsonEncode($ivf_art_summary_grid->Grade2->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_State2"] = <?php echo $ivf_art_summary_grid->State2->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_State2"].options = <?php echo JsonEncode($ivf_art_summary_grid->State2->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Day3"] = <?php echo $ivf_art_summary_grid->Day3->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Day3"].options = <?php echo JsonEncode($ivf_art_summary_grid->Day3->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_CellStage3"] = <?php echo $ivf_art_summary_grid->CellStage3->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_CellStage3"].options = <?php echo JsonEncode($ivf_art_summary_grid->CellStage3->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Grade3"] = <?php echo $ivf_art_summary_grid->Grade3->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Grade3"].options = <?php echo JsonEncode($ivf_art_summary_grid->Grade3->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_State3"] = <?php echo $ivf_art_summary_grid->State3->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_State3"].options = <?php echo JsonEncode($ivf_art_summary_grid->State3->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Day4"] = <?php echo $ivf_art_summary_grid->Day4->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Day4"].options = <?php echo JsonEncode($ivf_art_summary_grid->Day4->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_CellStage4"] = <?php echo $ivf_art_summary_grid->CellStage4->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_CellStage4"].options = <?php echo JsonEncode($ivf_art_summary_grid->CellStage4->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Grade4"] = <?php echo $ivf_art_summary_grid->Grade4->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Grade4"].options = <?php echo JsonEncode($ivf_art_summary_grid->Grade4->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_State4"] = <?php echo $ivf_art_summary_grid->State4->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_State4"].options = <?php echo JsonEncode($ivf_art_summary_grid->State4->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Day5"] = <?php echo $ivf_art_summary_grid->Day5->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Day5"].options = <?php echo JsonEncode($ivf_art_summary_grid->Day5->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_CellStage5"] = <?php echo $ivf_art_summary_grid->CellStage5->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_CellStage5"].options = <?php echo JsonEncode($ivf_art_summary_grid->CellStage5->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_Grade5"] = <?php echo $ivf_art_summary_grid->Grade5->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_Grade5"].options = <?php echo JsonEncode($ivf_art_summary_grid->Grade5->options(FALSE, TRUE)) ?>;
fivf_art_summarygrid.lists["x_State5"] = <?php echo $ivf_art_summary_grid->State5->Lookup->toClientList() ?>;
fivf_art_summarygrid.lists["x_State5"].options = <?php echo JsonEncode($ivf_art_summary_grid->State5->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_art_summary_grid->renderOtherOptions();
?>
<?php $ivf_art_summary_grid->showPageHeader(); ?>
<?php
$ivf_art_summary_grid->showMessage();
?>
<?php if ($ivf_art_summary_grid->TotalRecs > 0 || $ivf_art_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_art_summary_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_art_summary">
<?php if ($ivf_art_summary_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_art_summary_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_art_summarygrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_art_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_art_summarygrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_art_summary_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_art_summary_grid->renderListOptions();

// Render list options (header, left)
$ivf_art_summary_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_art_summary->id->Visible) { // id ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary->id->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary->ARTCycle->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Spermorigin) == "") { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Spermorigin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary->Spermorigin->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Spermorigin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Spermorigin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Spermorigin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IndicationforART) == "") { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IndicationforART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary->IndicationforART->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IndicationforART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IndicationforART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IndicationforART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->DateofICSI) == "") { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary->DateofICSI->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofICSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->DateofICSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->DateofICSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary->Origin->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary->Status->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary->Method->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Concentration) == "") { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary->pre_Concentration->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Motility) == "") { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary->pre_Motility->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Motility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Motility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Motility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->pre_Morphology) == "") { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary->pre_Morphology->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->pre_Morphology->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->pre_Morphology->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->pre_Morphology->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Concentration) == "") { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary->post_Concentration->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Motility) == "") { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary->post_Motility->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Motility->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Motility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Motility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->post_Morphology) == "") { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary->post_Morphology->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->post_Morphology->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->post_Morphology->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->post_Morphology->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NumberofEmbryostransferred) == "") { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary->NumberofEmbryostransferred->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NumberofEmbryostransferred->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NumberofEmbryostransferred->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NumberofEmbryostransferred->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Embryosunderobservation) == "") { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary->Embryosunderobservation->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Embryosunderobservation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Embryosunderobservation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Embryosunderobservation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryoDevelopmentSummary) == "") { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryoDevelopmentSummary->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryoDevelopmentSummary->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryoDevelopmentSummary->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryologistSignature) == "") { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary->EmbryologistSignature->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryologistSignature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryologistSignature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryologistSignature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IVFRegistrationID) == "") { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary->IVFRegistrationID->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVFRegistrationID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IVFRegistrationID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IVFRegistrationID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary->InseminatinTechnique->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ICSIDetails) == "") { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary->ICSIDetails->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSIDetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ICSIDetails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ICSIDetails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->DateofET) == "") { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary->DateofET->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->DateofET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->DateofET->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->DateofET->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Reasonfornotranfer) == "") { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary->Reasonfornotranfer->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Reasonfornotranfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Reasonfornotranfer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Reasonfornotranfer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->EmbryosCryopreserved) == "") { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary->EmbryosCryopreserved->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->EmbryosCryopreserved->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->EmbryosCryopreserved->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->EmbryosCryopreserved->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->LegendCellStage) == "") { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary->LegendCellStage->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->LegendCellStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->LegendCellStage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->LegendCellStage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ConsultantsSignature) == "") { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary->ConsultantsSignature->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ConsultantsSignature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ConsultantsSignature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ConsultantsSignature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary->Name->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->M2) == "") { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->M2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary->M2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->M2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->M2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->M2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Mi2) == "") { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Mi2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary->Mi2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Mi2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Mi2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Mi2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->ICSI) == "") { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary->ICSI->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->ICSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->ICSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->ICSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->IVF) == "") { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->IVF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary->IVF->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->IVF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->IVF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->IVF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->M1) == "") { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->M1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary->M1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->M1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->M1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->M1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->GV) == "") { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->GV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary->GV->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->GV->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->GV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->GV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Others) == "") { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary->Others->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Others->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Normal2PN) == "") { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Normal2PN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary->Normal2PN->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Normal2PN->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Normal2PN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Normal2PN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Abnormalfertilisation1N) == "") { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary->Abnormalfertilisation1N->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation1N->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Abnormalfertilisation1N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Abnormalfertilisation1N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Abnormalfertilisation3N) == "") { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary->Abnormalfertilisation3N->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Abnormalfertilisation3N->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Abnormalfertilisation3N->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Abnormalfertilisation3N->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotFertilized) == "") { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotFertilized->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary->NotFertilized->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotFertilized->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotFertilized->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotFertilized->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Degenerated) == "") { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Degenerated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary->Degenerated->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Degenerated->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Degenerated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Degenerated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->SpermDate) == "") { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->SpermDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary->SpermDate->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->SpermDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->SpermDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->SpermDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary->Code1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day1) == "") { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary->Day1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary->CellStage1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary->Grade1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State1) == "") { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary->State1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary->Code2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day2) == "") { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary->Day2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary->CellStage2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary->Grade2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State2) == "") { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary->State2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code3) == "") { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary->Code3->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day3) == "") { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary->Day3->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage3) == "") { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary->CellStage3->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade3) == "") { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary->Grade3->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State3) == "") { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary->State3->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code4) == "") { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary->Code4->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day4) == "") { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary->Day4->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage4) == "") { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary->CellStage4->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade4) == "") { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary->Grade4->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State4) == "") { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary->State4->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Code5) == "") { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Code5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary->Code5->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Code5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Code5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Code5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Day5) == "") { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Day5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary->Day5->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Day5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Day5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Day5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->CellStage5) == "") { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary->CellStage5->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->CellStage5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->CellStage5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->CellStage5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Grade5) == "") { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary->Grade5->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Grade5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Grade5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Grade5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->State5) == "") { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->State5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary->State5->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->State5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->State5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->State5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary->Volume->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary->Volume1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary->Volume2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Volume2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Volume2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Volume2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary->Concentration2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Concentration2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Concentration2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Concentration2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary->Total->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary->Total1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary->Total2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Total2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Total2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive) == "") { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary->Progressive->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive1) == "") { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary->Progressive1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Progressive2) == "") { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary->Progressive2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Progressive2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Progressive2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Progressive2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive) == "") { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary->NotProgressive->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive1) == "") { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary->NotProgressive1->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->NotProgressive2) == "") { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary->NotProgressive2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->NotProgressive2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->NotProgressive2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->NotProgressive2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Motility2) == "") { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Motility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary->Motility2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Motility2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Motility2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Motility2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
	<?php if ($ivf_art_summary->sortUrl($ivf_art_summary->Morphology2) == "") { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary->Morphology2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary->Morphology2->headerCellClass() ?>"><div><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary->Morphology2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary->Morphology2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_art_summary->Morphology2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_art_summary_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_art_summary_grid->StartRec = 1;
$ivf_art_summary_grid->StopRec = $ivf_art_summary_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_art_summary_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_art_summary_grid->FormKeyCountName) && ($ivf_art_summary->isGridAdd() || $ivf_art_summary->isGridEdit() || $ivf_art_summary->isConfirm())) {
		$ivf_art_summary_grid->KeyCount = $CurrentForm->getValue($ivf_art_summary_grid->FormKeyCountName);
		$ivf_art_summary_grid->StopRec = $ivf_art_summary_grid->StartRec + $ivf_art_summary_grid->KeyCount - 1;
	}
}
$ivf_art_summary_grid->RecCnt = $ivf_art_summary_grid->StartRec - 1;
if ($ivf_art_summary_grid->Recordset && !$ivf_art_summary_grid->Recordset->EOF) {
	$ivf_art_summary_grid->Recordset->moveFirst();
	$selectLimit = $ivf_art_summary_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_art_summary_grid->StartRec > 1)
		$ivf_art_summary_grid->Recordset->move($ivf_art_summary_grid->StartRec - 1);
} elseif (!$ivf_art_summary->AllowAddDeleteRow && $ivf_art_summary_grid->StopRec == 0) {
	$ivf_art_summary_grid->StopRec = $ivf_art_summary->GridAddRowCount;
}

// Initialize aggregate
$ivf_art_summary->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_art_summary->resetAttributes();
$ivf_art_summary_grid->renderRow();
if ($ivf_art_summary->isGridAdd())
	$ivf_art_summary_grid->RowIndex = 0;
if ($ivf_art_summary->isGridEdit())
	$ivf_art_summary_grid->RowIndex = 0;
while ($ivf_art_summary_grid->RecCnt < $ivf_art_summary_grid->StopRec) {
	$ivf_art_summary_grid->RecCnt++;
	if ($ivf_art_summary_grid->RecCnt >= $ivf_art_summary_grid->StartRec) {
		$ivf_art_summary_grid->RowCnt++;
		if ($ivf_art_summary->isGridAdd() || $ivf_art_summary->isGridEdit() || $ivf_art_summary->isConfirm()) {
			$ivf_art_summary_grid->RowIndex++;
			$CurrentForm->Index = $ivf_art_summary_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_art_summary_grid->FormActionName) && $ivf_art_summary_grid->EventCancelled)
				$ivf_art_summary_grid->RowAction = strval($CurrentForm->getValue($ivf_art_summary_grid->FormActionName));
			elseif ($ivf_art_summary->isGridAdd())
				$ivf_art_summary_grid->RowAction = "insert";
			else
				$ivf_art_summary_grid->RowAction = "";
		}

		// Set up key count
		$ivf_art_summary_grid->KeyCount = $ivf_art_summary_grid->RowIndex;

		// Init row class and style
		$ivf_art_summary->resetAttributes();
		$ivf_art_summary->CssClass = "";
		if ($ivf_art_summary->isGridAdd()) {
			if ($ivf_art_summary->CurrentMode == "copy") {
				$ivf_art_summary_grid->loadRowValues($ivf_art_summary_grid->Recordset); // Load row values
				$ivf_art_summary_grid->setRecordKey($ivf_art_summary_grid->RowOldKey, $ivf_art_summary_grid->Recordset); // Set old record key
			} else {
				$ivf_art_summary_grid->loadRowValues(); // Load default values
				$ivf_art_summary_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_art_summary_grid->loadRowValues($ivf_art_summary_grid->Recordset); // Load row values
		}
		$ivf_art_summary->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_art_summary->isGridAdd()) // Grid add
			$ivf_art_summary->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_art_summary->isGridAdd() && $ivf_art_summary->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_art_summary_grid->restoreCurrentRowFormValues($ivf_art_summary_grid->RowIndex); // Restore form values
		if ($ivf_art_summary->isGridEdit()) { // Grid edit
			if ($ivf_art_summary->EventCancelled)
				$ivf_art_summary_grid->restoreCurrentRowFormValues($ivf_art_summary_grid->RowIndex); // Restore form values
			if ($ivf_art_summary_grid->RowAction == "insert")
				$ivf_art_summary->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_art_summary->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_art_summary->isGridEdit() && ($ivf_art_summary->RowType == ROWTYPE_EDIT || $ivf_art_summary->RowType == ROWTYPE_ADD) && $ivf_art_summary->EventCancelled) // Update failed
			$ivf_art_summary_grid->restoreCurrentRowFormValues($ivf_art_summary_grid->RowIndex); // Restore form values
		if ($ivf_art_summary->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_art_summary_grid->EditRowCnt++;
		if ($ivf_art_summary->isConfirm()) // Confirm row
			$ivf_art_summary_grid->restoreCurrentRowFormValues($ivf_art_summary_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_art_summary->RowAttrs = array_merge($ivf_art_summary->RowAttrs, array('data-rowindex'=>$ivf_art_summary_grid->RowCnt, 'id'=>'r' . $ivf_art_summary_grid->RowCnt . '_ivf_art_summary', 'data-rowtype'=>$ivf_art_summary->RowType));

		// Render row
		$ivf_art_summary_grid->renderRow();

		// Render list options
		$ivf_art_summary_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_art_summary_grid->RowAction <> "delete" && $ivf_art_summary_grid->RowAction <> "insertdelete" && !($ivf_art_summary_grid->RowAction == "insert" && $ivf_art_summary->isConfirm() && $ivf_art_summary_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_art_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_art_summary_grid->ListOptions->render("body", "left", $ivf_art_summary_grid->RowCnt);
?>
	<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_art_summary->id->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_id" class="form-group ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_id" class="ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<?php echo $ivf_art_summary->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_art_summary->ARTCycle->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ARTCycle" class="form-group ivf_art_summary_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_art_summary->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_art_summary->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_art_summary->ARTCycle->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ARTCycle" class="form-group ivf_art_summary_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_art_summary->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_art_summary->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_art_summary->ARTCycle->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_art_summary->ARTCycle->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<td data-name="Spermorigin"<?php echo $ivf_art_summary->Spermorigin->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Spermorigin" class="form-group ivf_art_summary_Spermorigin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Spermorigin" data-value-separator="<?php echo $ivf_art_summary->Spermorigin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin"<?php echo $ivf_art_summary->Spermorigin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Spermorigin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Spermorigin" class="form-group ivf_art_summary_Spermorigin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Spermorigin" data-value-separator="<?php echo $ivf_art_summary->Spermorigin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin"<?php echo $ivf_art_summary->Spermorigin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Spermorigin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Spermorigin->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<td data-name="IndicationforART"<?php echo $ivf_art_summary->IndicationforART->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IndicationforART" class="form-group ivf_art_summary_IndicationforART">
<input type="text" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IndicationforART->EditValue ?>"<?php echo $ivf_art_summary->IndicationforART->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IndicationforART" class="form-group ivf_art_summary_IndicationforART">
<input type="text" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IndicationforART->EditValue ?>"<?php echo $ivf_art_summary->IndicationforART->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<?php echo $ivf_art_summary->IndicationforART->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<td data-name="DateofICSI"<?php echo $ivf_art_summary->DateofICSI->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofICSI" class="form-group ivf_art_summary_DateofICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_DateofICSI" data-format="7" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" placeholder="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->DateofICSI->EditValue ?>"<?php echo $ivf_art_summary->DateofICSI->editAttributes() ?>>
<?php if (!$ivf_art_summary->DateofICSI->ReadOnly && !$ivf_art_summary->DateofICSI->Disabled && !isset($ivf_art_summary->DateofICSI->EditAttrs["readonly"]) && !isset($ivf_art_summary->DateofICSI->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofICSI" class="form-group ivf_art_summary_DateofICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_DateofICSI" data-format="7" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" placeholder="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->DateofICSI->EditValue ?>"<?php echo $ivf_art_summary->DateofICSI->editAttributes() ?>>
<?php if (!$ivf_art_summary->DateofICSI->ReadOnly && !$ivf_art_summary->DateofICSI->Disabled && !isset($ivf_art_summary->DateofICSI->EditAttrs["readonly"]) && !isset($ivf_art_summary->DateofICSI->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofICSI->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $ivf_art_summary->Origin->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Origin" class="form-group ivf_art_summary_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Origin" data-value-separator="<?php echo $ivf_art_summary->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin"<?php echo $ivf_art_summary->Origin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Origin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Origin" class="form-group ivf_art_summary_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Origin" data-value-separator="<?php echo $ivf_art_summary->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin"<?php echo $ivf_art_summary->Origin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Origin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<?php echo $ivf_art_summary->Origin->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $ivf_art_summary->Status->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Status" class="form-group ivf_art_summary_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Status" data-value-separator="<?php echo $ivf_art_summary->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status"<?php echo $ivf_art_summary->Status->editAttributes() ?>>
		<?php echo $ivf_art_summary->Status->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Status" class="form-group ivf_art_summary_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Status" data-value-separator="<?php echo $ivf_art_summary->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status"<?php echo $ivf_art_summary->Status->editAttributes() ?>>
		<?php echo $ivf_art_summary->Status->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Status" class="ivf_art_summary_Status">
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<?php echo $ivf_art_summary->Status->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $ivf_art_summary->Method->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Method" class="form-group ivf_art_summary_Method">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Method" data-value-separator="<?php echo $ivf_art_summary->Method->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method"<?php echo $ivf_art_summary->Method->editAttributes() ?>>
		<?php echo $ivf_art_summary->Method->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Method" class="form-group ivf_art_summary_Method">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Method" data-value-separator="<?php echo $ivf_art_summary->Method->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method"<?php echo $ivf_art_summary->Method->editAttributes() ?>>
		<?php echo $ivf_art_summary->Method->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Method" class="ivf_art_summary_Method">
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<?php echo $ivf_art_summary->Method->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<td data-name="pre_Concentration"<?php echo $ivf_art_summary->pre_Concentration->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Concentration" class="form-group ivf_art_summary_pre_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Concentration->EditValue ?>"<?php echo $ivf_art_summary->pre_Concentration->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Concentration" class="form-group ivf_art_summary_pre_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Concentration->EditValue ?>"<?php echo $ivf_art_summary->pre_Concentration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Concentration->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<td data-name="pre_Motility"<?php echo $ivf_art_summary->pre_Motility->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Motility" class="form-group ivf_art_summary_pre_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Motility->EditValue ?>"<?php echo $ivf_art_summary->pre_Motility->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Motility" class="form-group ivf_art_summary_pre_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Motility->EditValue ?>"<?php echo $ivf_art_summary->pre_Motility->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Motility->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<td data-name="pre_Morphology"<?php echo $ivf_art_summary->pre_Morphology->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Morphology" class="form-group ivf_art_summary_pre_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Morphology->EditValue ?>"<?php echo $ivf_art_summary->pre_Morphology->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Morphology" class="form-group ivf_art_summary_pre_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Morphology->EditValue ?>"<?php echo $ivf_art_summary->pre_Morphology->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->pre_Morphology->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<td data-name="post_Concentration"<?php echo $ivf_art_summary->post_Concentration->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Concentration" class="form-group ivf_art_summary_post_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Concentration->EditValue ?>"<?php echo $ivf_art_summary->post_Concentration->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Concentration" class="form-group ivf_art_summary_post_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Concentration->EditValue ?>"<?php echo $ivf_art_summary->post_Concentration->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Concentration->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<td data-name="post_Motility"<?php echo $ivf_art_summary->post_Motility->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Motility" class="form-group ivf_art_summary_post_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Motility->EditValue ?>"<?php echo $ivf_art_summary->post_Motility->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Motility" class="form-group ivf_art_summary_post_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Motility->EditValue ?>"<?php echo $ivf_art_summary->post_Motility->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Motility->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<td data-name="post_Morphology"<?php echo $ivf_art_summary->post_Morphology->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Morphology" class="form-group ivf_art_summary_post_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Morphology->EditValue ?>"<?php echo $ivf_art_summary->post_Morphology->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Morphology" class="form-group ivf_art_summary_post_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Morphology->EditValue ?>"<?php echo $ivf_art_summary->post_Morphology->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<?php echo $ivf_art_summary->post_Morphology->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td data-name="NumberofEmbryostransferred"<?php echo $ivf_art_summary->NumberofEmbryostransferred->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NumberofEmbryostransferred" class="form-group ivf_art_summary_NumberofEmbryostransferred">
<input type="text" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NumberofEmbryostransferred->EditValue ?>"<?php echo $ivf_art_summary->NumberofEmbryostransferred->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NumberofEmbryostransferred" class="form-group ivf_art_summary_NumberofEmbryostransferred">
<input type="text" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NumberofEmbryostransferred->EditValue ?>"<?php echo $ivf_art_summary->NumberofEmbryostransferred->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<?php echo $ivf_art_summary->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td data-name="Embryosunderobservation"<?php echo $ivf_art_summary->Embryosunderobservation->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Embryosunderobservation" class="form-group ivf_art_summary_Embryosunderobservation">
<input type="text" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Embryosunderobservation->EditValue ?>"<?php echo $ivf_art_summary->Embryosunderobservation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Embryosunderobservation" class="form-group ivf_art_summary_Embryosunderobservation">
<input type="text" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Embryosunderobservation->EditValue ?>"<?php echo $ivf_art_summary->Embryosunderobservation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<?php echo $ivf_art_summary->Embryosunderobservation->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td data-name="EmbryoDevelopmentSummary"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="form-group ivf_art_summary_EmbryoDevelopmentSummary">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->EditValue ?>"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="form-group ivf_art_summary_EmbryoDevelopmentSummary">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->EditValue ?>"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td data-name="EmbryologistSignature"<?php echo $ivf_art_summary->EmbryologistSignature->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryologistSignature" class="form-group ivf_art_summary_EmbryologistSignature">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryologistSignature->EditValue ?>"<?php echo $ivf_art_summary->EmbryologistSignature->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryologistSignature" class="form-group ivf_art_summary_EmbryologistSignature">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryologistSignature->EditValue ?>"<?php echo $ivf_art_summary->EmbryologistSignature->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryologistSignature->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td data-name="IVFRegistrationID"<?php echo $ivf_art_summary->IVFRegistrationID->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVFRegistrationID" class="form-group ivf_art_summary_IVFRegistrationID">
<input type="text" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVFRegistrationID->EditValue ?>"<?php echo $ivf_art_summary->IVFRegistrationID->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVFRegistrationID" class="form-group ivf_art_summary_IVFRegistrationID">
<input type="text" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVFRegistrationID->EditValue ?>"<?php echo $ivf_art_summary->IVFRegistrationID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVFRegistrationID->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_InseminatinTechnique" class="form-group ivf_art_summary_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_art_summary->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_art_summary->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_InseminatinTechnique" class="form-group ivf_art_summary_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_art_summary->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_art_summary->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_art_summary->InseminatinTechnique->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<td data-name="ICSIDetails"<?php echo $ivf_art_summary->ICSIDetails->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSIDetails" class="form-group ivf_art_summary_ICSIDetails">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSIDetails->EditValue ?>"<?php echo $ivf_art_summary->ICSIDetails->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSIDetails" class="form-group ivf_art_summary_ICSIDetails">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSIDetails->EditValue ?>"<?php echo $ivf_art_summary->ICSIDetails->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSIDetails->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<td data-name="DateofET"<?php echo $ivf_art_summary->DateofET->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofET" class="form-group ivf_art_summary_DateofET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_DateofET" data-value-separator="<?php echo $ivf_art_summary->DateofET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET"<?php echo $ivf_art_summary->DateofET->editAttributes() ?>>
		<?php echo $ivf_art_summary->DateofET->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofET" class="form-group ivf_art_summary_DateofET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_DateofET" data-value-separator="<?php echo $ivf_art_summary->DateofET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET"<?php echo $ivf_art_summary->DateofET->editAttributes() ?>>
		<?php echo $ivf_art_summary->DateofET->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<?php echo $ivf_art_summary->DateofET->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td data-name="Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Reasonfornotranfer" class="form-group ivf_art_summary_Reasonfornotranfer">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" data-value-separator="<?php echo $ivf_art_summary->Reasonfornotranfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->editAttributes() ?>>
		<?php echo $ivf_art_summary->Reasonfornotranfer->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Reasonfornotranfer" class="form-group ivf_art_summary_Reasonfornotranfer">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" data-value-separator="<?php echo $ivf_art_summary->Reasonfornotranfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->editAttributes() ?>>
		<?php echo $ivf_art_summary->Reasonfornotranfer->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<?php echo $ivf_art_summary->Reasonfornotranfer->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td data-name="EmbryosCryopreserved"<?php echo $ivf_art_summary->EmbryosCryopreserved->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryosCryopreserved" class="form-group ivf_art_summary_EmbryosCryopreserved">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryosCryopreserved->EditValue ?>"<?php echo $ivf_art_summary->EmbryosCryopreserved->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryosCryopreserved" class="form-group ivf_art_summary_EmbryosCryopreserved">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryosCryopreserved->EditValue ?>"<?php echo $ivf_art_summary->EmbryosCryopreserved->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<?php echo $ivf_art_summary->EmbryosCryopreserved->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<td data-name="LegendCellStage"<?php echo $ivf_art_summary->LegendCellStage->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_LegendCellStage" class="form-group ivf_art_summary_LegendCellStage">
<input type="text" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->LegendCellStage->EditValue ?>"<?php echo $ivf_art_summary->LegendCellStage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_LegendCellStage" class="form-group ivf_art_summary_LegendCellStage">
<input type="text" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->LegendCellStage->EditValue ?>"<?php echo $ivf_art_summary->LegendCellStage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<?php echo $ivf_art_summary->LegendCellStage->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td data-name="ConsultantsSignature"<?php echo $ivf_art_summary->ConsultantsSignature->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ConsultantsSignature" class="form-group ivf_art_summary_ConsultantsSignature">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature"><?php echo strval($ivf_art_summary->ConsultantsSignature->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_art_summary->ConsultantsSignature->ViewValue) : $ivf_art_summary->ConsultantsSignature->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_art_summary->ConsultantsSignature->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_art_summary->ConsultantsSignature->ReadOnly || $ivf_art_summary->ConsultantsSignature->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_art_summary->ConsultantsSignature->Lookup->getParamTag("p_x" . $ivf_art_summary_grid->RowIndex . "_ConsultantsSignature") ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_art_summary->ConsultantsSignature->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo $ivf_art_summary->ConsultantsSignature->CurrentValue ?>"<?php echo $ivf_art_summary->ConsultantsSignature->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ConsultantsSignature" class="form-group ivf_art_summary_ConsultantsSignature">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature"><?php echo strval($ivf_art_summary->ConsultantsSignature->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_art_summary->ConsultantsSignature->ViewValue) : $ivf_art_summary->ConsultantsSignature->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_art_summary->ConsultantsSignature->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_art_summary->ConsultantsSignature->ReadOnly || $ivf_art_summary->ConsultantsSignature->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_art_summary->ConsultantsSignature->Lookup->getParamTag("p_x" . $ivf_art_summary_grid->RowIndex . "_ConsultantsSignature") ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_art_summary->ConsultantsSignature->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo $ivf_art_summary->ConsultantsSignature->CurrentValue ?>"<?php echo $ivf_art_summary->ConsultantsSignature->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<?php echo $ivf_art_summary->ConsultantsSignature->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_art_summary->Name->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_art_summary->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<input type="text" data-table="ivf_art_summary" data-field="x_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Name->EditValue ?>"<?php echo $ivf_art_summary->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_art_summary->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<input type="text" data-table="ivf_art_summary" data-field="x_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Name->EditValue ?>"<?php echo $ivf_art_summary->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Name" class="ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<?php echo $ivf_art_summary->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<td data-name="M2"<?php echo $ivf_art_summary->M2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M2" class="form-group ivf_art_summary_M2">
<input type="text" data-table="ivf_art_summary" data-field="x_M2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M2->EditValue ?>"<?php echo $ivf_art_summary->M2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M2" class="form-group ivf_art_summary_M2">
<input type="text" data-table="ivf_art_summary" data-field="x_M2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M2->EditValue ?>"<?php echo $ivf_art_summary->M2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M2" class="ivf_art_summary_M2">
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<?php echo $ivf_art_summary->M2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<td data-name="Mi2"<?php echo $ivf_art_summary->Mi2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Mi2" class="form-group ivf_art_summary_Mi2">
<input type="text" data-table="ivf_art_summary" data-field="x_Mi2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Mi2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Mi2->EditValue ?>"<?php echo $ivf_art_summary->Mi2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Mi2" class="form-group ivf_art_summary_Mi2">
<input type="text" data-table="ivf_art_summary" data-field="x_Mi2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Mi2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Mi2->EditValue ?>"<?php echo $ivf_art_summary->Mi2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Mi2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<td data-name="ICSI"<?php echo $ivf_art_summary->ICSI->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSI" class="form-group ivf_art_summary_ICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSI->EditValue ?>"<?php echo $ivf_art_summary->ICSI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSI" class="form-group ivf_art_summary_ICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSI->EditValue ?>"<?php echo $ivf_art_summary->ICSI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<?php echo $ivf_art_summary->ICSI->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<td data-name="IVF"<?php echo $ivf_art_summary->IVF->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVF" class="form-group ivf_art_summary_IVF">
<input type="text" data-table="ivf_art_summary" data-field="x_IVF" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVF->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVF->EditValue ?>"<?php echo $ivf_art_summary->IVF->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVF" class="form-group ivf_art_summary_IVF">
<input type="text" data-table="ivf_art_summary" data-field="x_IVF" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVF->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVF->EditValue ?>"<?php echo $ivf_art_summary->IVF->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<?php echo $ivf_art_summary->IVF->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<td data-name="M1"<?php echo $ivf_art_summary->M1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M1" class="form-group ivf_art_summary_M1">
<input type="text" data-table="ivf_art_summary" data-field="x_M1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M1->EditValue ?>"<?php echo $ivf_art_summary->M1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M1" class="form-group ivf_art_summary_M1">
<input type="text" data-table="ivf_art_summary" data-field="x_M1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M1->EditValue ?>"<?php echo $ivf_art_summary->M1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_M1" class="ivf_art_summary_M1">
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<?php echo $ivf_art_summary->M1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<td data-name="GV"<?php echo $ivf_art_summary->GV->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_GV" class="form-group ivf_art_summary_GV">
<input type="text" data-table="ivf_art_summary" data-field="x_GV" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->GV->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->GV->EditValue ?>"<?php echo $ivf_art_summary->GV->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_GV" class="form-group ivf_art_summary_GV">
<input type="text" data-table="ivf_art_summary" data-field="x_GV" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->GV->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->GV->EditValue ?>"<?php echo $ivf_art_summary->GV->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_GV" class="ivf_art_summary_GV">
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<?php echo $ivf_art_summary->GV->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<td data-name="Others"<?php echo $ivf_art_summary->Others->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Others" class="form-group ivf_art_summary_Others">
<input type="text" data-table="ivf_art_summary" data-field="x_Others" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Others->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Others->EditValue ?>"<?php echo $ivf_art_summary->Others->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Others" class="form-group ivf_art_summary_Others">
<input type="text" data-table="ivf_art_summary" data-field="x_Others" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Others->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Others->EditValue ?>"<?php echo $ivf_art_summary->Others->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Others" class="ivf_art_summary_Others">
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<?php echo $ivf_art_summary->Others->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<td data-name="Normal2PN"<?php echo $ivf_art_summary->Normal2PN->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Normal2PN" class="form-group ivf_art_summary_Normal2PN">
<input type="text" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Normal2PN->EditValue ?>"<?php echo $ivf_art_summary->Normal2PN->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Normal2PN" class="form-group ivf_art_summary_Normal2PN">
<input type="text" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Normal2PN->EditValue ?>"<?php echo $ivf_art_summary->Normal2PN->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<?php echo $ivf_art_summary->Normal2PN->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td data-name="Abnormalfertilisation1N"<?php echo $ivf_art_summary->Abnormalfertilisation1N->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation1N" class="form-group ivf_art_summary_Abnormalfertilisation1N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation1N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation1N->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation1N" class="form-group ivf_art_summary_Abnormalfertilisation1N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation1N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation1N->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td data-name="Abnormalfertilisation3N"<?php echo $ivf_art_summary->Abnormalfertilisation3N->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation3N" class="form-group ivf_art_summary_Abnormalfertilisation3N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation3N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation3N->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation3N" class="form-group ivf_art_summary_Abnormalfertilisation3N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation3N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation3N->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<?php echo $ivf_art_summary->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<td data-name="NotFertilized"<?php echo $ivf_art_summary->NotFertilized->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotFertilized" class="form-group ivf_art_summary_NotFertilized">
<input type="text" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotFertilized->EditValue ?>"<?php echo $ivf_art_summary->NotFertilized->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotFertilized" class="form-group ivf_art_summary_NotFertilized">
<input type="text" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotFertilized->EditValue ?>"<?php echo $ivf_art_summary->NotFertilized->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotFertilized->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<td data-name="Degenerated"<?php echo $ivf_art_summary->Degenerated->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Degenerated" class="form-group ivf_art_summary_Degenerated">
<input type="text" data-table="ivf_art_summary" data-field="x_Degenerated" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Degenerated->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Degenerated->EditValue ?>"<?php echo $ivf_art_summary->Degenerated->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Degenerated" class="form-group ivf_art_summary_Degenerated">
<input type="text" data-table="ivf_art_summary" data-field="x_Degenerated" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Degenerated->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Degenerated->EditValue ?>"<?php echo $ivf_art_summary->Degenerated->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<?php echo $ivf_art_summary->Degenerated->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<td data-name="SpermDate"<?php echo $ivf_art_summary->SpermDate->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_SpermDate" class="form-group ivf_art_summary_SpermDate">
<input type="text" data-table="ivf_art_summary" data-field="x_SpermDate" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" placeholder="<?php echo HtmlEncode($ivf_art_summary->SpermDate->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->SpermDate->EditValue ?>"<?php echo $ivf_art_summary->SpermDate->editAttributes() ?>>
<?php if (!$ivf_art_summary->SpermDate->ReadOnly && !$ivf_art_summary->SpermDate->Disabled && !isset($ivf_art_summary->SpermDate->EditAttrs["readonly"]) && !isset($ivf_art_summary->SpermDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_SpermDate" class="form-group ivf_art_summary_SpermDate">
<input type="text" data-table="ivf_art_summary" data-field="x_SpermDate" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" placeholder="<?php echo HtmlEncode($ivf_art_summary->SpermDate->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->SpermDate->EditValue ?>"<?php echo $ivf_art_summary->SpermDate->editAttributes() ?>>
<?php if (!$ivf_art_summary->SpermDate->ReadOnly && !$ivf_art_summary->SpermDate->Disabled && !isset($ivf_art_summary->SpermDate->EditAttrs["readonly"]) && !isset($ivf_art_summary->SpermDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<?php echo $ivf_art_summary->SpermDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<td data-name="Code1"<?php echo $ivf_art_summary->Code1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code1" class="form-group ivf_art_summary_Code1">
<input type="text" data-table="ivf_art_summary" data-field="x_Code1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code1->EditValue ?>"<?php echo $ivf_art_summary->Code1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code1" class="form-group ivf_art_summary_Code1">
<input type="text" data-table="ivf_art_summary" data-field="x_Code1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code1->EditValue ?>"<?php echo $ivf_art_summary->Code1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<td data-name="Day1"<?php echo $ivf_art_summary->Day1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day1" class="form-group ivf_art_summary_Day1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day1" data-value-separator="<?php echo $ivf_art_summary->Day1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1"<?php echo $ivf_art_summary->Day1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day1" class="form-group ivf_art_summary_Day1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day1" data-value-separator="<?php echo $ivf_art_summary->Day1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1"<?php echo $ivf_art_summary->Day1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1"<?php echo $ivf_art_summary->CellStage1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage1" class="form-group ivf_art_summary_CellStage1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage1" data-value-separator="<?php echo $ivf_art_summary->CellStage1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1"<?php echo $ivf_art_summary->CellStage1->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage1" class="form-group ivf_art_summary_CellStage1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage1" data-value-separator="<?php echo $ivf_art_summary->CellStage1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1"<?php echo $ivf_art_summary->CellStage1->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1"<?php echo $ivf_art_summary->Grade1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade1" class="form-group ivf_art_summary_Grade1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade1" data-value-separator="<?php echo $ivf_art_summary->Grade1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1"<?php echo $ivf_art_summary->Grade1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade1" class="form-group ivf_art_summary_Grade1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade1" data-value-separator="<?php echo $ivf_art_summary->Grade1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1"<?php echo $ivf_art_summary->Grade1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<td data-name="State1"<?php echo $ivf_art_summary->State1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State1" class="form-group ivf_art_summary_State1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State1" data-value-separator="<?php echo $ivf_art_summary->State1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1"<?php echo $ivf_art_summary->State1->editAttributes() ?>>
		<?php echo $ivf_art_summary->State1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State1" class="form-group ivf_art_summary_State1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State1" data-value-separator="<?php echo $ivf_art_summary->State1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1"<?php echo $ivf_art_summary->State1->editAttributes() ?>>
		<?php echo $ivf_art_summary->State1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State1" class="ivf_art_summary_State1">
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<?php echo $ivf_art_summary->State1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<td data-name="Code2"<?php echo $ivf_art_summary->Code2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code2" class="form-group ivf_art_summary_Code2">
<input type="text" data-table="ivf_art_summary" data-field="x_Code2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code2->EditValue ?>"<?php echo $ivf_art_summary->Code2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code2" class="form-group ivf_art_summary_Code2">
<input type="text" data-table="ivf_art_summary" data-field="x_Code2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code2->EditValue ?>"<?php echo $ivf_art_summary->Code2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<td data-name="Day2"<?php echo $ivf_art_summary->Day2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day2" class="form-group ivf_art_summary_Day2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day2" data-value-separator="<?php echo $ivf_art_summary->Day2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2"<?php echo $ivf_art_summary->Day2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day2" class="form-group ivf_art_summary_Day2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day2" data-value-separator="<?php echo $ivf_art_summary->Day2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2"<?php echo $ivf_art_summary->Day2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2"<?php echo $ivf_art_summary->CellStage2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage2" class="form-group ivf_art_summary_CellStage2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage2" data-value-separator="<?php echo $ivf_art_summary->CellStage2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2"<?php echo $ivf_art_summary->CellStage2->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage2" class="form-group ivf_art_summary_CellStage2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage2" data-value-separator="<?php echo $ivf_art_summary->CellStage2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2"<?php echo $ivf_art_summary->CellStage2->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2"<?php echo $ivf_art_summary->Grade2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade2" class="form-group ivf_art_summary_Grade2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade2" data-value-separator="<?php echo $ivf_art_summary->Grade2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2"<?php echo $ivf_art_summary->Grade2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade2" class="form-group ivf_art_summary_Grade2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade2" data-value-separator="<?php echo $ivf_art_summary->Grade2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2"<?php echo $ivf_art_summary->Grade2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<td data-name="State2"<?php echo $ivf_art_summary->State2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State2" class="form-group ivf_art_summary_State2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State2" data-value-separator="<?php echo $ivf_art_summary->State2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2"<?php echo $ivf_art_summary->State2->editAttributes() ?>>
		<?php echo $ivf_art_summary->State2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State2" class="form-group ivf_art_summary_State2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State2" data-value-separator="<?php echo $ivf_art_summary->State2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2"<?php echo $ivf_art_summary->State2->editAttributes() ?>>
		<?php echo $ivf_art_summary->State2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State2" class="ivf_art_summary_State2">
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<?php echo $ivf_art_summary->State2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<td data-name="Code3"<?php echo $ivf_art_summary->Code3->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code3" class="form-group ivf_art_summary_Code3">
<input type="text" data-table="ivf_art_summary" data-field="x_Code3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code3->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code3->EditValue ?>"<?php echo $ivf_art_summary->Code3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code3" class="form-group ivf_art_summary_Code3">
<input type="text" data-table="ivf_art_summary" data-field="x_Code3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code3->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code3->EditValue ?>"<?php echo $ivf_art_summary->Code3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code3->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<td data-name="Day3"<?php echo $ivf_art_summary->Day3->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day3" class="form-group ivf_art_summary_Day3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day3" data-value-separator="<?php echo $ivf_art_summary->Day3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3"<?php echo $ivf_art_summary->Day3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day3" class="form-group ivf_art_summary_Day3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day3" data-value-separator="<?php echo $ivf_art_summary->Day3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3"<?php echo $ivf_art_summary->Day3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day3->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<td data-name="CellStage3"<?php echo $ivf_art_summary->CellStage3->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage3" class="form-group ivf_art_summary_CellStage3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage3" data-value-separator="<?php echo $ivf_art_summary->CellStage3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3"<?php echo $ivf_art_summary->CellStage3->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage3" class="form-group ivf_art_summary_CellStage3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage3" data-value-separator="<?php echo $ivf_art_summary->CellStage3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3"<?php echo $ivf_art_summary->CellStage3->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage3->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<td data-name="Grade3"<?php echo $ivf_art_summary->Grade3->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade3" class="form-group ivf_art_summary_Grade3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade3" data-value-separator="<?php echo $ivf_art_summary->Grade3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3"<?php echo $ivf_art_summary->Grade3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade3" class="form-group ivf_art_summary_Grade3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade3" data-value-separator="<?php echo $ivf_art_summary->Grade3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3"<?php echo $ivf_art_summary->Grade3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade3->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<td data-name="State3"<?php echo $ivf_art_summary->State3->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State3" class="form-group ivf_art_summary_State3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State3" data-value-separator="<?php echo $ivf_art_summary->State3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3"<?php echo $ivf_art_summary->State3->editAttributes() ?>>
		<?php echo $ivf_art_summary->State3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State3" class="form-group ivf_art_summary_State3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State3" data-value-separator="<?php echo $ivf_art_summary->State3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3"<?php echo $ivf_art_summary->State3->editAttributes() ?>>
		<?php echo $ivf_art_summary->State3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State3" class="ivf_art_summary_State3">
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<?php echo $ivf_art_summary->State3->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<td data-name="Code4"<?php echo $ivf_art_summary->Code4->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code4" class="form-group ivf_art_summary_Code4">
<input type="text" data-table="ivf_art_summary" data-field="x_Code4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code4->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code4->EditValue ?>"<?php echo $ivf_art_summary->Code4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code4" class="form-group ivf_art_summary_Code4">
<input type="text" data-table="ivf_art_summary" data-field="x_Code4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code4->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code4->EditValue ?>"<?php echo $ivf_art_summary->Code4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code4->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<td data-name="Day4"<?php echo $ivf_art_summary->Day4->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day4" class="form-group ivf_art_summary_Day4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day4" data-value-separator="<?php echo $ivf_art_summary->Day4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4"<?php echo $ivf_art_summary->Day4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day4" class="form-group ivf_art_summary_Day4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day4" data-value-separator="<?php echo $ivf_art_summary->Day4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4"<?php echo $ivf_art_summary->Day4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day4->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<td data-name="CellStage4"<?php echo $ivf_art_summary->CellStage4->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage4" class="form-group ivf_art_summary_CellStage4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage4" data-value-separator="<?php echo $ivf_art_summary->CellStage4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4"<?php echo $ivf_art_summary->CellStage4->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage4" class="form-group ivf_art_summary_CellStage4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage4" data-value-separator="<?php echo $ivf_art_summary->CellStage4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4"<?php echo $ivf_art_summary->CellStage4->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage4->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<td data-name="Grade4"<?php echo $ivf_art_summary->Grade4->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade4" class="form-group ivf_art_summary_Grade4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade4" data-value-separator="<?php echo $ivf_art_summary->Grade4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4"<?php echo $ivf_art_summary->Grade4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade4" class="form-group ivf_art_summary_Grade4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade4" data-value-separator="<?php echo $ivf_art_summary->Grade4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4"<?php echo $ivf_art_summary->Grade4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade4->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<td data-name="State4"<?php echo $ivf_art_summary->State4->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State4" class="form-group ivf_art_summary_State4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State4" data-value-separator="<?php echo $ivf_art_summary->State4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4"<?php echo $ivf_art_summary->State4->editAttributes() ?>>
		<?php echo $ivf_art_summary->State4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State4" class="form-group ivf_art_summary_State4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State4" data-value-separator="<?php echo $ivf_art_summary->State4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4"<?php echo $ivf_art_summary->State4->editAttributes() ?>>
		<?php echo $ivf_art_summary->State4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State4" class="ivf_art_summary_State4">
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<?php echo $ivf_art_summary->State4->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<td data-name="Code5"<?php echo $ivf_art_summary->Code5->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code5" class="form-group ivf_art_summary_Code5">
<input type="text" data-table="ivf_art_summary" data-field="x_Code5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code5->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code5->EditValue ?>"<?php echo $ivf_art_summary->Code5->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code5" class="form-group ivf_art_summary_Code5">
<input type="text" data-table="ivf_art_summary" data-field="x_Code5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code5->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code5->EditValue ?>"<?php echo $ivf_art_summary->Code5->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Code5->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<td data-name="Day5"<?php echo $ivf_art_summary->Day5->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day5" class="form-group ivf_art_summary_Day5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day5" data-value-separator="<?php echo $ivf_art_summary->Day5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5"<?php echo $ivf_art_summary->Day5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day5" class="form-group ivf_art_summary_Day5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day5" data-value-separator="<?php echo $ivf_art_summary->Day5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5"<?php echo $ivf_art_summary->Day5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Day5->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<td data-name="CellStage5"<?php echo $ivf_art_summary->CellStage5->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage5" class="form-group ivf_art_summary_CellStage5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage5" data-value-separator="<?php echo $ivf_art_summary->CellStage5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5"<?php echo $ivf_art_summary->CellStage5->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage5" class="form-group ivf_art_summary_CellStage5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage5" data-value-separator="<?php echo $ivf_art_summary->CellStage5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5"<?php echo $ivf_art_summary->CellStage5->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<?php echo $ivf_art_summary->CellStage5->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<td data-name="Grade5"<?php echo $ivf_art_summary->Grade5->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade5" class="form-group ivf_art_summary_Grade5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade5" data-value-separator="<?php echo $ivf_art_summary->Grade5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5"<?php echo $ivf_art_summary->Grade5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade5" class="form-group ivf_art_summary_Grade5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade5" data-value-separator="<?php echo $ivf_art_summary->Grade5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5"<?php echo $ivf_art_summary->Grade5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<?php echo $ivf_art_summary->Grade5->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<td data-name="State5"<?php echo $ivf_art_summary->State5->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State5" class="form-group ivf_art_summary_State5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State5" data-value-separator="<?php echo $ivf_art_summary->State5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5"<?php echo $ivf_art_summary->State5->editAttributes() ?>>
		<?php echo $ivf_art_summary->State5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State5" class="form-group ivf_art_summary_State5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State5" data-value-separator="<?php echo $ivf_art_summary->State5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5"<?php echo $ivf_art_summary->State5->editAttributes() ?>>
		<?php echo $ivf_art_summary->State5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_State5" class="ivf_art_summary_State5">
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<?php echo $ivf_art_summary->State5->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_art_summary->TidNo->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_art_summary->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<input type="text" data-table="ivf_art_summary" data-field="x_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->TidNo->EditValue ?>"<?php echo $ivf_art_summary->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_art_summary->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<input type="text" data-table="ivf_art_summary" data-field="x_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->TidNo->EditValue ?>"<?php echo $ivf_art_summary->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_art_summary->RIDNo->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_art_summary->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<input type="text" data-table="ivf_art_summary" data-field="x_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->RIDNo->EditValue ?>"<?php echo $ivf_art_summary->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_art_summary->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<input type="text" data-table="ivf_art_summary" data-field="x_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->RIDNo->EditValue ?>"<?php echo $ivf_art_summary->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<?php echo $ivf_art_summary->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $ivf_art_summary->Volume->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume" class="form-group ivf_art_summary_Volume">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume->EditValue ?>"<?php echo $ivf_art_summary->Volume->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume" class="form-group ivf_art_summary_Volume">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume->EditValue ?>"<?php echo $ivf_art_summary->Volume->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1"<?php echo $ivf_art_summary->Volume1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume1" class="form-group ivf_art_summary_Volume1">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume1->EditValue ?>"<?php echo $ivf_art_summary->Volume1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume1" class="form-group ivf_art_summary_Volume1">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume1->EditValue ?>"<?php echo $ivf_art_summary->Volume1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2"<?php echo $ivf_art_summary->Volume2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume2" class="form-group ivf_art_summary_Volume2">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume2->EditValue ?>"<?php echo $ivf_art_summary->Volume2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume2" class="form-group ivf_art_summary_Volume2">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume2->EditValue ?>"<?php echo $ivf_art_summary->Volume2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Volume2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2"<?php echo $ivf_art_summary->Concentration2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Concentration2" class="form-group ivf_art_summary_Concentration2">
<input type="text" data-table="ivf_art_summary" data-field="x_Concentration2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Concentration2->EditValue ?>"<?php echo $ivf_art_summary->Concentration2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Concentration2" class="form-group ivf_art_summary_Concentration2">
<input type="text" data-table="ivf_art_summary" data-field="x_Concentration2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Concentration2->EditValue ?>"<?php echo $ivf_art_summary->Concentration2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Concentration2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $ivf_art_summary->Total->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total" class="form-group ivf_art_summary_Total">
<input type="text" data-table="ivf_art_summary" data-field="x_Total" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total->EditValue ?>"<?php echo $ivf_art_summary->Total->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total" class="form-group ivf_art_summary_Total">
<input type="text" data-table="ivf_art_summary" data-field="x_Total" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total->EditValue ?>"<?php echo $ivf_art_summary->Total->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total" class="ivf_art_summary_Total">
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<td data-name="Total1"<?php echo $ivf_art_summary->Total1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total1" class="form-group ivf_art_summary_Total1">
<input type="text" data-table="ivf_art_summary" data-field="x_Total1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total1->EditValue ?>"<?php echo $ivf_art_summary->Total1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total1" class="form-group ivf_art_summary_Total1">
<input type="text" data-table="ivf_art_summary" data-field="x_Total1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total1->EditValue ?>"<?php echo $ivf_art_summary->Total1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<td data-name="Total2"<?php echo $ivf_art_summary->Total2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total2" class="form-group ivf_art_summary_Total2">
<input type="text" data-table="ivf_art_summary" data-field="x_Total2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total2->EditValue ?>"<?php echo $ivf_art_summary->Total2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total2" class="form-group ivf_art_summary_Total2">
<input type="text" data-table="ivf_art_summary" data-field="x_Total2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total2->EditValue ?>"<?php echo $ivf_art_summary->Total2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Total2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<td data-name="Progressive"<?php echo $ivf_art_summary->Progressive->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive" class="form-group ivf_art_summary_Progressive">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive->EditValue ?>"<?php echo $ivf_art_summary->Progressive->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive" class="form-group ivf_art_summary_Progressive">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive->EditValue ?>"<?php echo $ivf_art_summary->Progressive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<td data-name="Progressive1"<?php echo $ivf_art_summary->Progressive1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive1" class="form-group ivf_art_summary_Progressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive1->EditValue ?>"<?php echo $ivf_art_summary->Progressive1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive1" class="form-group ivf_art_summary_Progressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive1->EditValue ?>"<?php echo $ivf_art_summary->Progressive1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<td data-name="Progressive2"<?php echo $ivf_art_summary->Progressive2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive2" class="form-group ivf_art_summary_Progressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive2->EditValue ?>"<?php echo $ivf_art_summary->Progressive2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive2" class="form-group ivf_art_summary_Progressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive2->EditValue ?>"<?php echo $ivf_art_summary->Progressive2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Progressive2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<td data-name="NotProgressive"<?php echo $ivf_art_summary->NotProgressive->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive" class="form-group ivf_art_summary_NotProgressive">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive" class="form-group ivf_art_summary_NotProgressive">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td data-name="NotProgressive1"<?php echo $ivf_art_summary->NotProgressive1->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive1" class="form-group ivf_art_summary_NotProgressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive1->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive1" class="form-group ivf_art_summary_NotProgressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive1->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive1->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td data-name="NotProgressive2"<?php echo $ivf_art_summary->NotProgressive2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive2" class="form-group ivf_art_summary_NotProgressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive2->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive2" class="form-group ivf_art_summary_NotProgressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive2->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<?php echo $ivf_art_summary->NotProgressive2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<td data-name="Motility2"<?php echo $ivf_art_summary->Motility2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Motility2" class="form-group ivf_art_summary_Motility2">
<input type="text" data-table="ivf_art_summary" data-field="x_Motility2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Motility2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Motility2->EditValue ?>"<?php echo $ivf_art_summary->Motility2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Motility2" class="form-group ivf_art_summary_Motility2">
<input type="text" data-table="ivf_art_summary" data-field="x_Motility2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Motility2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Motility2->EditValue ?>"<?php echo $ivf_art_summary->Motility2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Motility2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<td data-name="Morphology2"<?php echo $ivf_art_summary->Morphology2->cellAttributes() ?>>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Morphology2" class="form-group ivf_art_summary_Morphology2">
<input type="text" data-table="ivf_art_summary" data-field="x_Morphology2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Morphology2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Morphology2->EditValue ?>"<?php echo $ivf_art_summary->Morphology2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Morphology2" class="form-group ivf_art_summary_Morphology2">
<input type="text" data-table="ivf_art_summary" data-field="x_Morphology2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Morphology2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Morphology2->EditValue ?>"<?php echo $ivf_art_summary->Morphology2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_art_summary->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_art_summary_grid->RowCnt ?>_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<?php echo $ivf_art_summary->Morphology2->getViewValue() ?></span>
</span>
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="fivf_art_summarygrid$x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->FormValue) ?>">
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="fivf_art_summarygrid$o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_art_summary_grid->ListOptions->render("body", "right", $ivf_art_summary_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_art_summary->RowType == ROWTYPE_ADD || $ivf_art_summary->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_art_summarygrid.updateLists(<?php echo $ivf_art_summary_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_art_summary->isGridAdd() || $ivf_art_summary->CurrentMode == "copy")
		if (!$ivf_art_summary_grid->Recordset->EOF)
			$ivf_art_summary_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_art_summary->CurrentMode == "add" || $ivf_art_summary->CurrentMode == "copy" || $ivf_art_summary->CurrentMode == "edit") {
		$ivf_art_summary_grid->RowIndex = '$rowindex$';
		$ivf_art_summary_grid->loadRowValues();

		// Set row properties
		$ivf_art_summary->resetAttributes();
		$ivf_art_summary->RowAttrs = array_merge($ivf_art_summary->RowAttrs, array('data-rowindex'=>$ivf_art_summary_grid->RowIndex, 'id'=>'r0_ivf_art_summary', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_art_summary->RowAttrs["class"], "ew-template");
		$ivf_art_summary->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_art_summary_grid->renderRow();

		// Render list options
		$ivf_art_summary_grid->renderListOptions();
		$ivf_art_summary_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_art_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_art_summary_grid->ListOptions->render("body", "left", $ivf_art_summary_grid->RowIndex);
?>
	<?php if ($ivf_art_summary->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_id" class="form-group ivf_art_summary_id">
<span<?php echo $ivf_art_summary->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_art_summary->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_ARTCycle" class="form-group ivf_art_summary_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_art_summary->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_art_summary->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_art_summary->ARTCycle->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_ARTCycle" class="form-group ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->ARTCycle->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ARTCycle" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_art_summary->ARTCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Spermorigin->Visible) { // Spermorigin ?>
		<td data-name="Spermorigin">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Spermorigin" class="form-group ivf_art_summary_Spermorigin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Spermorigin" data-value-separator="<?php echo $ivf_art_summary->Spermorigin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin"<?php echo $ivf_art_summary->Spermorigin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Spermorigin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Spermorigin" class="form-group ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary->Spermorigin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Spermorigin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Spermorigin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Spermorigin" value="<?php echo HtmlEncode($ivf_art_summary->Spermorigin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IndicationforART->Visible) { // IndicationforART ?>
		<td data-name="IndicationforART">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_IndicationforART" class="form-group ivf_art_summary_IndicationforART">
<input type="text" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IndicationforART->EditValue ?>"<?php echo $ivf_art_summary->IndicationforART->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_IndicationforART" class="form-group ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary->IndicationforART->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->IndicationforART->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IndicationforART" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IndicationforART" value="<?php echo HtmlEncode($ivf_art_summary->IndicationforART->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofICSI->Visible) { // DateofICSI ?>
		<td data-name="DateofICSI">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_DateofICSI" class="form-group ivf_art_summary_DateofICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_DateofICSI" data-format="7" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" placeholder="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->DateofICSI->EditValue ?>"<?php echo $ivf_art_summary->DateofICSI->editAttributes() ?>>
<?php if (!$ivf_art_summary->DateofICSI->ReadOnly && !$ivf_art_summary->DateofICSI->Disabled && !isset($ivf_art_summary->DateofICSI->EditAttrs["readonly"]) && !isset($ivf_art_summary->DateofICSI->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_DateofICSI" class="form-group ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary->DateofICSI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->DateofICSI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofICSI" value="<?php echo HtmlEncode($ivf_art_summary->DateofICSI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Origin->Visible) { // Origin ?>
		<td data-name="Origin">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Origin" class="form-group ivf_art_summary_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Origin" data-value-separator="<?php echo $ivf_art_summary->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin"<?php echo $ivf_art_summary->Origin->editAttributes() ?>>
		<?php echo $ivf_art_summary->Origin->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Origin" class="form-group ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary->Origin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Origin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Origin" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_art_summary->Origin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Status->Visible) { // Status ?>
		<td data-name="Status">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Status" class="form-group ivf_art_summary_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Status" data-value-separator="<?php echo $ivf_art_summary->Status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status"<?php echo $ivf_art_summary->Status->editAttributes() ?>>
		<?php echo $ivf_art_summary->Status->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Status" class="form-group ivf_art_summary_Status">
<span<?php echo $ivf_art_summary->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Status" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Status" value="<?php echo HtmlEncode($ivf_art_summary->Status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Method->Visible) { // Method ?>
		<td data-name="Method">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Method" class="form-group ivf_art_summary_Method">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Method" data-value-separator="<?php echo $ivf_art_summary->Method->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method"<?php echo $ivf_art_summary->Method->editAttributes() ?>>
		<?php echo $ivf_art_summary->Method->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Method" class="form-group ivf_art_summary_Method">
<span<?php echo $ivf_art_summary->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Method->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Method" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Method" value="<?php echo HtmlEncode($ivf_art_summary->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Concentration->Visible) { // pre_Concentration ?>
		<td data-name="pre_Concentration">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Concentration" class="form-group ivf_art_summary_pre_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Concentration->EditValue ?>"<?php echo $ivf_art_summary->pre_Concentration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Concentration" class="form-group ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary->pre_Concentration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->pre_Concentration->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->pre_Concentration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Motility->Visible) { // pre_Motility ?>
		<td data-name="pre_Motility">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Motility" class="form-group ivf_art_summary_pre_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Motility->EditValue ?>"<?php echo $ivf_art_summary->pre_Motility->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Motility" class="form-group ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary->pre_Motility->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->pre_Motility->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Motility" value="<?php echo HtmlEncode($ivf_art_summary->pre_Motility->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->pre_Morphology->Visible) { // pre_Morphology ?>
		<td data-name="pre_Morphology">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Morphology" class="form-group ivf_art_summary_pre_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->pre_Morphology->EditValue ?>"<?php echo $ivf_art_summary->pre_Morphology->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_pre_Morphology" class="form-group ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary->pre_Morphology->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->pre_Morphology->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_pre_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->pre_Morphology->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Concentration->Visible) { // post_Concentration ?>
		<td data-name="post_Concentration">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_post_Concentration" class="form-group ivf_art_summary_post_Concentration">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Concentration->EditValue ?>"<?php echo $ivf_art_summary->post_Concentration->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_post_Concentration" class="form-group ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary->post_Concentration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->post_Concentration->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Concentration" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Concentration" value="<?php echo HtmlEncode($ivf_art_summary->post_Concentration->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Motility->Visible) { // post_Motility ?>
		<td data-name="post_Motility">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_post_Motility" class="form-group ivf_art_summary_post_Motility">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Motility->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Motility->EditValue ?>"<?php echo $ivf_art_summary->post_Motility->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_post_Motility" class="form-group ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary->post_Motility->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->post_Motility->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Motility" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Motility" value="<?php echo HtmlEncode($ivf_art_summary->post_Motility->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->post_Morphology->Visible) { // post_Morphology ?>
		<td data-name="post_Morphology">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_post_Morphology" class="form-group ivf_art_summary_post_Morphology">
<input type="text" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->post_Morphology->EditValue ?>"<?php echo $ivf_art_summary->post_Morphology->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_post_Morphology" class="form-group ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary->post_Morphology->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->post_Morphology->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_post_Morphology" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_post_Morphology" value="<?php echo HtmlEncode($ivf_art_summary->post_Morphology->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td data-name="NumberofEmbryostransferred">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_NumberofEmbryostransferred" class="form-group ivf_art_summary_NumberofEmbryostransferred">
<input type="text" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NumberofEmbryostransferred->EditValue ?>"<?php echo $ivf_art_summary->NumberofEmbryostransferred->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_NumberofEmbryostransferred" class="form-group ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary->NumberofEmbryostransferred->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->NumberofEmbryostransferred->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NumberofEmbryostransferred" value="<?php echo HtmlEncode($ivf_art_summary->NumberofEmbryostransferred->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td data-name="Embryosunderobservation">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Embryosunderobservation" class="form-group ivf_art_summary_Embryosunderobservation">
<input type="text" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Embryosunderobservation->EditValue ?>"<?php echo $ivf_art_summary->Embryosunderobservation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Embryosunderobservation" class="form-group ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary->Embryosunderobservation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Embryosunderobservation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Embryosunderobservation" value="<?php echo HtmlEncode($ivf_art_summary->Embryosunderobservation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td data-name="EmbryoDevelopmentSummary">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryoDevelopmentSummary" class="form-group ivf_art_summary_EmbryoDevelopmentSummary">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->EditValue ?>"<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryoDevelopmentSummary" class="form-group ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary->EmbryoDevelopmentSummary->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->EmbryoDevelopmentSummary->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryoDevelopmentSummary" value="<?php echo HtmlEncode($ivf_art_summary->EmbryoDevelopmentSummary->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td data-name="EmbryologistSignature">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryologistSignature" class="form-group ivf_art_summary_EmbryologistSignature">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryologistSignature->EditValue ?>"<?php echo $ivf_art_summary->EmbryologistSignature->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryologistSignature" class="form-group ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary->EmbryologistSignature->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->EmbryologistSignature->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryologistSignature" value="<?php echo HtmlEncode($ivf_art_summary->EmbryologistSignature->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td data-name="IVFRegistrationID">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_IVFRegistrationID" class="form-group ivf_art_summary_IVFRegistrationID">
<input type="text" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVFRegistrationID->EditValue ?>"<?php echo $ivf_art_summary->IVFRegistrationID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_IVFRegistrationID" class="form-group ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary->IVFRegistrationID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->IVFRegistrationID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVFRegistrationID" value="<?php echo HtmlEncode($ivf_art_summary->IVFRegistrationID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_InseminatinTechnique" class="form-group ivf_art_summary_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_art_summary->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_art_summary->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_art_summary->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_InseminatinTechnique" class="form-group ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary->InseminatinTechnique->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->InseminatinTechnique->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_art_summary->InseminatinTechnique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSIDetails->Visible) { // ICSIDetails ?>
		<td data-name="ICSIDetails">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_ICSIDetails" class="form-group ivf_art_summary_ICSIDetails">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSIDetails->EditValue ?>"<?php echo $ivf_art_summary->ICSIDetails->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_ICSIDetails" class="form-group ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary->ICSIDetails->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->ICSIDetails->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSIDetails" value="<?php echo HtmlEncode($ivf_art_summary->ICSIDetails->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->DateofET->Visible) { // DateofET ?>
		<td data-name="DateofET">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_DateofET" class="form-group ivf_art_summary_DateofET">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_DateofET" data-value-separator="<?php echo $ivf_art_summary->DateofET->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET"<?php echo $ivf_art_summary->DateofET->editAttributes() ?>>
		<?php echo $ivf_art_summary->DateofET->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_DateofET" class="form-group ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary->DateofET->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->DateofET->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_DateofET" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_DateofET" value="<?php echo HtmlEncode($ivf_art_summary->DateofET->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td data-name="Reasonfornotranfer">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Reasonfornotranfer" class="form-group ivf_art_summary_Reasonfornotranfer">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" data-value-separator="<?php echo $ivf_art_summary->Reasonfornotranfer->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer"<?php echo $ivf_art_summary->Reasonfornotranfer->editAttributes() ?>>
		<?php echo $ivf_art_summary->Reasonfornotranfer->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Reasonfornotranfer" class="form-group ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary->Reasonfornotranfer->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Reasonfornotranfer->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Reasonfornotranfer" value="<?php echo HtmlEncode($ivf_art_summary->Reasonfornotranfer->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td data-name="EmbryosCryopreserved">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryosCryopreserved" class="form-group ivf_art_summary_EmbryosCryopreserved">
<input type="text" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->EmbryosCryopreserved->EditValue ?>"<?php echo $ivf_art_summary->EmbryosCryopreserved->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_EmbryosCryopreserved" class="form-group ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary->EmbryosCryopreserved->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->EmbryosCryopreserved->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_EmbryosCryopreserved" value="<?php echo HtmlEncode($ivf_art_summary->EmbryosCryopreserved->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->LegendCellStage->Visible) { // LegendCellStage ?>
		<td data-name="LegendCellStage">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_LegendCellStage" class="form-group ivf_art_summary_LegendCellStage">
<input type="text" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->LegendCellStage->EditValue ?>"<?php echo $ivf_art_summary->LegendCellStage->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_LegendCellStage" class="form-group ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary->LegendCellStage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->LegendCellStage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_LegendCellStage" value="<?php echo HtmlEncode($ivf_art_summary->LegendCellStage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td data-name="ConsultantsSignature">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_ConsultantsSignature" class="form-group ivf_art_summary_ConsultantsSignature">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature"><?php echo strval($ivf_art_summary->ConsultantsSignature->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_art_summary->ConsultantsSignature->ViewValue) : $ivf_art_summary->ConsultantsSignature->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_art_summary->ConsultantsSignature->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_art_summary->ConsultantsSignature->ReadOnly || $ivf_art_summary->ConsultantsSignature->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_art_summary->ConsultantsSignature->Lookup->getParamTag("p_x" . $ivf_art_summary_grid->RowIndex . "_ConsultantsSignature") ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_art_summary->ConsultantsSignature->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo $ivf_art_summary->ConsultantsSignature->CurrentValue ?>"<?php echo $ivf_art_summary->ConsultantsSignature->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_ConsultantsSignature" class="form-group ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary->ConsultantsSignature->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->ConsultantsSignature->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ConsultantsSignature" value="<?php echo HtmlEncode($ivf_art_summary->ConsultantsSignature->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<?php if ($ivf_art_summary->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<input type="text" data-table="ivf_art_summary" data-field="x_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Name->EditValue ?>"<?php echo $ivf_art_summary->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Name" class="form-group ivf_art_summary_Name">
<span<?php echo $ivf_art_summary->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Name" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_art_summary->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M2->Visible) { // M2 ?>
		<td data-name="M2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_M2" class="form-group ivf_art_summary_M2">
<input type="text" data-table="ivf_art_summary" data-field="x_M2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M2->EditValue ?>"<?php echo $ivf_art_summary->M2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_M2" class="form-group ivf_art_summary_M2">
<span<?php echo $ivf_art_summary->M2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->M2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M2" value="<?php echo HtmlEncode($ivf_art_summary->M2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Mi2->Visible) { // Mi2 ?>
		<td data-name="Mi2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Mi2" class="form-group ivf_art_summary_Mi2">
<input type="text" data-table="ivf_art_summary" data-field="x_Mi2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Mi2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Mi2->EditValue ?>"<?php echo $ivf_art_summary->Mi2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Mi2" class="form-group ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary->Mi2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Mi2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Mi2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Mi2" value="<?php echo HtmlEncode($ivf_art_summary->Mi2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->ICSI->Visible) { // ICSI ?>
		<td data-name="ICSI">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_ICSI" class="form-group ivf_art_summary_ICSI">
<input type="text" data-table="ivf_art_summary" data-field="x_ICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->ICSI->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->ICSI->EditValue ?>"<?php echo $ivf_art_summary->ICSI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_ICSI" class="form-group ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary->ICSI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->ICSI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_ICSI" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_ICSI" value="<?php echo HtmlEncode($ivf_art_summary->ICSI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->IVF->Visible) { // IVF ?>
		<td data-name="IVF">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_IVF" class="form-group ivf_art_summary_IVF">
<input type="text" data-table="ivf_art_summary" data-field="x_IVF" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->IVF->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->IVF->EditValue ?>"<?php echo $ivf_art_summary->IVF->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_IVF" class="form-group ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary->IVF->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->IVF->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_IVF" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_IVF" value="<?php echo HtmlEncode($ivf_art_summary->IVF->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->M1->Visible) { // M1 ?>
		<td data-name="M1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_M1" class="form-group ivf_art_summary_M1">
<input type="text" data-table="ivf_art_summary" data-field="x_M1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->M1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->M1->EditValue ?>"<?php echo $ivf_art_summary->M1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_M1" class="form-group ivf_art_summary_M1">
<span<?php echo $ivf_art_summary->M1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->M1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_M1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_M1" value="<?php echo HtmlEncode($ivf_art_summary->M1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->GV->Visible) { // GV ?>
		<td data-name="GV">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_GV" class="form-group ivf_art_summary_GV">
<input type="text" data-table="ivf_art_summary" data-field="x_GV" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->GV->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->GV->EditValue ?>"<?php echo $ivf_art_summary->GV->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_GV" class="form-group ivf_art_summary_GV">
<span<?php echo $ivf_art_summary->GV->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->GV->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_GV" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_GV" value="<?php echo HtmlEncode($ivf_art_summary->GV->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Others->Visible) { // Others ?>
		<td data-name="Others">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Others" class="form-group ivf_art_summary_Others">
<input type="text" data-table="ivf_art_summary" data-field="x_Others" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Others->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Others->EditValue ?>"<?php echo $ivf_art_summary->Others->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Others" class="form-group ivf_art_summary_Others">
<span<?php echo $ivf_art_summary->Others->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Others->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Others" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Others" value="<?php echo HtmlEncode($ivf_art_summary->Others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Normal2PN->Visible) { // Normal2PN ?>
		<td data-name="Normal2PN">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Normal2PN" class="form-group ivf_art_summary_Normal2PN">
<input type="text" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Normal2PN->EditValue ?>"<?php echo $ivf_art_summary->Normal2PN->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Normal2PN" class="form-group ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary->Normal2PN->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Normal2PN->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Normal2PN" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Normal2PN" value="<?php echo HtmlEncode($ivf_art_summary->Normal2PN->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td data-name="Abnormalfertilisation1N">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Abnormalfertilisation1N" class="form-group ivf_art_summary_Abnormalfertilisation1N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation1N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation1N->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Abnormalfertilisation1N" class="form-group ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation1N->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Abnormalfertilisation1N->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation1N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation1N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td data-name="Abnormalfertilisation3N">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Abnormalfertilisation3N" class="form-group ivf_art_summary_Abnormalfertilisation3N">
<input type="text" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Abnormalfertilisation3N->EditValue ?>"<?php echo $ivf_art_summary->Abnormalfertilisation3N->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Abnormalfertilisation3N" class="form-group ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary->Abnormalfertilisation3N->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Abnormalfertilisation3N->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Abnormalfertilisation3N" value="<?php echo HtmlEncode($ivf_art_summary->Abnormalfertilisation3N->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotFertilized->Visible) { // NotFertilized ?>
		<td data-name="NotFertilized">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_NotFertilized" class="form-group ivf_art_summary_NotFertilized">
<input type="text" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotFertilized->EditValue ?>"<?php echo $ivf_art_summary->NotFertilized->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_NotFertilized" class="form-group ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary->NotFertilized->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->NotFertilized->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotFertilized" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotFertilized" value="<?php echo HtmlEncode($ivf_art_summary->NotFertilized->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Degenerated->Visible) { // Degenerated ?>
		<td data-name="Degenerated">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Degenerated" class="form-group ivf_art_summary_Degenerated">
<input type="text" data-table="ivf_art_summary" data-field="x_Degenerated" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Degenerated->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Degenerated->EditValue ?>"<?php echo $ivf_art_summary->Degenerated->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Degenerated" class="form-group ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary->Degenerated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Degenerated->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Degenerated" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Degenerated" value="<?php echo HtmlEncode($ivf_art_summary->Degenerated->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->SpermDate->Visible) { // SpermDate ?>
		<td data-name="SpermDate">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_SpermDate" class="form-group ivf_art_summary_SpermDate">
<input type="text" data-table="ivf_art_summary" data-field="x_SpermDate" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" placeholder="<?php echo HtmlEncode($ivf_art_summary->SpermDate->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->SpermDate->EditValue ?>"<?php echo $ivf_art_summary->SpermDate->editAttributes() ?>>
<?php if (!$ivf_art_summary->SpermDate->ReadOnly && !$ivf_art_summary->SpermDate->Disabled && !isset($ivf_art_summary->SpermDate->EditAttrs["readonly"]) && !isset($ivf_art_summary->SpermDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_art_summarygrid", "x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_SpermDate" class="form-group ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary->SpermDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->SpermDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_SpermDate" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_SpermDate" value="<?php echo HtmlEncode($ivf_art_summary->SpermDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code1->Visible) { // Code1 ?>
		<td data-name="Code1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Code1" class="form-group ivf_art_summary_Code1">
<input type="text" data-table="ivf_art_summary" data-field="x_Code1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code1->EditValue ?>"<?php echo $ivf_art_summary->Code1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Code1" class="form-group ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary->Code1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Code1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_art_summary->Code1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day1->Visible) { // Day1 ?>
		<td data-name="Day1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Day1" class="form-group ivf_art_summary_Day1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day1" data-value-separator="<?php echo $ivf_art_summary->Day1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1"<?php echo $ivf_art_summary->Day1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Day1" class="form-group ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary->Day1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Day1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day1" value="<?php echo HtmlEncode($ivf_art_summary->Day1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage1" class="form-group ivf_art_summary_CellStage1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage1" data-value-separator="<?php echo $ivf_art_summary->CellStage1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1"<?php echo $ivf_art_summary->CellStage1->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage1" class="form-group ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary->CellStage1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->CellStage1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_art_summary->CellStage1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Grade1" class="form-group ivf_art_summary_Grade1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade1" data-value-separator="<?php echo $ivf_art_summary->Grade1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1"<?php echo $ivf_art_summary->Grade1->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Grade1" class="form-group ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary->Grade1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Grade1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_art_summary->Grade1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State1->Visible) { // State1 ?>
		<td data-name="State1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_State1" class="form-group ivf_art_summary_State1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State1" data-value-separator="<?php echo $ivf_art_summary->State1->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1"<?php echo $ivf_art_summary->State1->editAttributes() ?>>
		<?php echo $ivf_art_summary->State1->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_State1" class="form-group ivf_art_summary_State1">
<span<?php echo $ivf_art_summary->State1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->State1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State1" value="<?php echo HtmlEncode($ivf_art_summary->State1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code2->Visible) { // Code2 ?>
		<td data-name="Code2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Code2" class="form-group ivf_art_summary_Code2">
<input type="text" data-table="ivf_art_summary" data-field="x_Code2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code2->EditValue ?>"<?php echo $ivf_art_summary->Code2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Code2" class="form-group ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary->Code2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Code2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_art_summary->Code2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day2->Visible) { // Day2 ?>
		<td data-name="Day2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Day2" class="form-group ivf_art_summary_Day2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day2" data-value-separator="<?php echo $ivf_art_summary->Day2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2"<?php echo $ivf_art_summary->Day2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Day2" class="form-group ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary->Day2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Day2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day2" value="<?php echo HtmlEncode($ivf_art_summary->Day2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage2" class="form-group ivf_art_summary_CellStage2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage2" data-value-separator="<?php echo $ivf_art_summary->CellStage2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2"<?php echo $ivf_art_summary->CellStage2->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage2" class="form-group ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary->CellStage2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->CellStage2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_art_summary->CellStage2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Grade2" class="form-group ivf_art_summary_Grade2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade2" data-value-separator="<?php echo $ivf_art_summary->Grade2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2"<?php echo $ivf_art_summary->Grade2->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Grade2" class="form-group ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary->Grade2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Grade2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_art_summary->Grade2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State2->Visible) { // State2 ?>
		<td data-name="State2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_State2" class="form-group ivf_art_summary_State2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State2" data-value-separator="<?php echo $ivf_art_summary->State2->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2"<?php echo $ivf_art_summary->State2->editAttributes() ?>>
		<?php echo $ivf_art_summary->State2->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_State2" class="form-group ivf_art_summary_State2">
<span<?php echo $ivf_art_summary->State2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->State2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State2" value="<?php echo HtmlEncode($ivf_art_summary->State2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code3->Visible) { // Code3 ?>
		<td data-name="Code3">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Code3" class="form-group ivf_art_summary_Code3">
<input type="text" data-table="ivf_art_summary" data-field="x_Code3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code3->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code3->EditValue ?>"<?php echo $ivf_art_summary->Code3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Code3" class="form-group ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary->Code3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Code3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code3" value="<?php echo HtmlEncode($ivf_art_summary->Code3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day3->Visible) { // Day3 ?>
		<td data-name="Day3">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Day3" class="form-group ivf_art_summary_Day3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day3" data-value-separator="<?php echo $ivf_art_summary->Day3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3"<?php echo $ivf_art_summary->Day3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Day3" class="form-group ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary->Day3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Day3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day3" value="<?php echo HtmlEncode($ivf_art_summary->Day3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage3->Visible) { // CellStage3 ?>
		<td data-name="CellStage3">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage3" class="form-group ivf_art_summary_CellStage3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage3" data-value-separator="<?php echo $ivf_art_summary->CellStage3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3"<?php echo $ivf_art_summary->CellStage3->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage3" class="form-group ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary->CellStage3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->CellStage3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage3" value="<?php echo HtmlEncode($ivf_art_summary->CellStage3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade3->Visible) { // Grade3 ?>
		<td data-name="Grade3">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Grade3" class="form-group ivf_art_summary_Grade3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade3" data-value-separator="<?php echo $ivf_art_summary->Grade3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3"<?php echo $ivf_art_summary->Grade3->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Grade3" class="form-group ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary->Grade3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Grade3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade3" value="<?php echo HtmlEncode($ivf_art_summary->Grade3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State3->Visible) { // State3 ?>
		<td data-name="State3">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_State3" class="form-group ivf_art_summary_State3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State3" data-value-separator="<?php echo $ivf_art_summary->State3->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3"<?php echo $ivf_art_summary->State3->editAttributes() ?>>
		<?php echo $ivf_art_summary->State3->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_State3" class="form-group ivf_art_summary_State3">
<span<?php echo $ivf_art_summary->State3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->State3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State3" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State3" value="<?php echo HtmlEncode($ivf_art_summary->State3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code4->Visible) { // Code4 ?>
		<td data-name="Code4">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Code4" class="form-group ivf_art_summary_Code4">
<input type="text" data-table="ivf_art_summary" data-field="x_Code4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code4->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code4->EditValue ?>"<?php echo $ivf_art_summary->Code4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Code4" class="form-group ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary->Code4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Code4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code4" value="<?php echo HtmlEncode($ivf_art_summary->Code4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day4->Visible) { // Day4 ?>
		<td data-name="Day4">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Day4" class="form-group ivf_art_summary_Day4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day4" data-value-separator="<?php echo $ivf_art_summary->Day4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4"<?php echo $ivf_art_summary->Day4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Day4" class="form-group ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary->Day4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Day4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day4" value="<?php echo HtmlEncode($ivf_art_summary->Day4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage4->Visible) { // CellStage4 ?>
		<td data-name="CellStage4">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage4" class="form-group ivf_art_summary_CellStage4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage4" data-value-separator="<?php echo $ivf_art_summary->CellStage4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4"<?php echo $ivf_art_summary->CellStage4->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage4" class="form-group ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary->CellStage4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->CellStage4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage4" value="<?php echo HtmlEncode($ivf_art_summary->CellStage4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade4->Visible) { // Grade4 ?>
		<td data-name="Grade4">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Grade4" class="form-group ivf_art_summary_Grade4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade4" data-value-separator="<?php echo $ivf_art_summary->Grade4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4"<?php echo $ivf_art_summary->Grade4->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Grade4" class="form-group ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary->Grade4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Grade4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade4" value="<?php echo HtmlEncode($ivf_art_summary->Grade4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State4->Visible) { // State4 ?>
		<td data-name="State4">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_State4" class="form-group ivf_art_summary_State4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State4" data-value-separator="<?php echo $ivf_art_summary->State4->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4"<?php echo $ivf_art_summary->State4->editAttributes() ?>>
		<?php echo $ivf_art_summary->State4->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_State4" class="form-group ivf_art_summary_State4">
<span<?php echo $ivf_art_summary->State4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->State4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State4" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State4" value="<?php echo HtmlEncode($ivf_art_summary->State4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Code5->Visible) { // Code5 ?>
		<td data-name="Code5">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Code5" class="form-group ivf_art_summary_Code5">
<input type="text" data-table="ivf_art_summary" data-field="x_Code5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Code5->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Code5->EditValue ?>"<?php echo $ivf_art_summary->Code5->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Code5" class="form-group ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary->Code5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Code5->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Code5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Code5" value="<?php echo HtmlEncode($ivf_art_summary->Code5->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Day5->Visible) { // Day5 ?>
		<td data-name="Day5">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Day5" class="form-group ivf_art_summary_Day5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Day5" data-value-separator="<?php echo $ivf_art_summary->Day5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5"<?php echo $ivf_art_summary->Day5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Day5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Day5" class="form-group ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary->Day5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Day5->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Day5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Day5" value="<?php echo HtmlEncode($ivf_art_summary->Day5->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->CellStage5->Visible) { // CellStage5 ?>
		<td data-name="CellStage5">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage5" class="form-group ivf_art_summary_CellStage5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_CellStage5" data-value-separator="<?php echo $ivf_art_summary->CellStage5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5"<?php echo $ivf_art_summary->CellStage5->editAttributes() ?>>
		<?php echo $ivf_art_summary->CellStage5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_CellStage5" class="form-group ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary->CellStage5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->CellStage5->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_CellStage5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_CellStage5" value="<?php echo HtmlEncode($ivf_art_summary->CellStage5->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Grade5->Visible) { // Grade5 ?>
		<td data-name="Grade5">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Grade5" class="form-group ivf_art_summary_Grade5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_Grade5" data-value-separator="<?php echo $ivf_art_summary->Grade5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5"<?php echo $ivf_art_summary->Grade5->editAttributes() ?>>
		<?php echo $ivf_art_summary->Grade5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Grade5" class="form-group ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary->Grade5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Grade5->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Grade5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Grade5" value="<?php echo HtmlEncode($ivf_art_summary->Grade5->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->State5->Visible) { // State5 ?>
		<td data-name="State5">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_State5" class="form-group ivf_art_summary_State5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_art_summary" data-field="x_State5" data-value-separator="<?php echo $ivf_art_summary->State5->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5"<?php echo $ivf_art_summary->State5->editAttributes() ?>>
		<?php echo $ivf_art_summary->State5->selectOptionListHtml("x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_State5" class="form-group ivf_art_summary_State5">
<span<?php echo $ivf_art_summary->State5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->State5->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_State5" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_State5" value="<?php echo HtmlEncode($ivf_art_summary->State5->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<?php if ($ivf_art_summary->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<input type="text" data-table="ivf_art_summary" data-field="x_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->TidNo->EditValue ?>"<?php echo $ivf_art_summary->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_TidNo" class="form-group ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_TidNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_art_summary->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<?php if ($ivf_art_summary->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<input type="text" data-table="ivf_art_summary" data-field="x_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_art_summary->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->RIDNo->EditValue ?>"<?php echo $ivf_art_summary->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_RIDNo" class="form-group ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_RIDNo" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_art_summary->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume->Visible) { // Volume ?>
		<td data-name="Volume">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Volume" class="form-group ivf_art_summary_Volume">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume->EditValue ?>"<?php echo $ivf_art_summary->Volume->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Volume" class="form-group ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary->Volume->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Volume->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume" value="<?php echo HtmlEncode($ivf_art_summary->Volume->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Volume1" class="form-group ivf_art_summary_Volume1">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume1->EditValue ?>"<?php echo $ivf_art_summary->Volume1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Volume1" class="form-group ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary->Volume1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Volume1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume1" value="<?php echo HtmlEncode($ivf_art_summary->Volume1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Volume2" class="form-group ivf_art_summary_Volume2">
<input type="text" data-table="ivf_art_summary" data-field="x_Volume2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Volume2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Volume2->EditValue ?>"<?php echo $ivf_art_summary->Volume2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Volume2" class="form-group ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary->Volume2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Volume2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Volume2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Volume2" value="<?php echo HtmlEncode($ivf_art_summary->Volume2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Concentration2" class="form-group ivf_art_summary_Concentration2">
<input type="text" data-table="ivf_art_summary" data-field="x_Concentration2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Concentration2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Concentration2->EditValue ?>"<?php echo $ivf_art_summary->Concentration2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Concentration2" class="form-group ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary->Concentration2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Concentration2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Concentration2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Concentration2" value="<?php echo HtmlEncode($ivf_art_summary->Concentration2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total->Visible) { // Total ?>
		<td data-name="Total">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Total" class="form-group ivf_art_summary_Total">
<input type="text" data-table="ivf_art_summary" data-field="x_Total" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total->EditValue ?>"<?php echo $ivf_art_summary->Total->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Total" class="form-group ivf_art_summary_Total">
<span<?php echo $ivf_art_summary->Total->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Total->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total" value="<?php echo HtmlEncode($ivf_art_summary->Total->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total1->Visible) { // Total1 ?>
		<td data-name="Total1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Total1" class="form-group ivf_art_summary_Total1">
<input type="text" data-table="ivf_art_summary" data-field="x_Total1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total1->EditValue ?>"<?php echo $ivf_art_summary->Total1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Total1" class="form-group ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary->Total1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Total1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total1" value="<?php echo HtmlEncode($ivf_art_summary->Total1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Total2->Visible) { // Total2 ?>
		<td data-name="Total2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Total2" class="form-group ivf_art_summary_Total2">
<input type="text" data-table="ivf_art_summary" data-field="x_Total2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Total2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Total2->EditValue ?>"<?php echo $ivf_art_summary->Total2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Total2" class="form-group ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary->Total2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Total2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Total2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Total2" value="<?php echo HtmlEncode($ivf_art_summary->Total2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive->Visible) { // Progressive ?>
		<td data-name="Progressive">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive" class="form-group ivf_art_summary_Progressive">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive->EditValue ?>"<?php echo $ivf_art_summary->Progressive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive" class="form-group ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary->Progressive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Progressive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive" value="<?php echo HtmlEncode($ivf_art_summary->Progressive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive1->Visible) { // Progressive1 ?>
		<td data-name="Progressive1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive1" class="form-group ivf_art_summary_Progressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive1->EditValue ?>"<?php echo $ivf_art_summary->Progressive1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive1" class="form-group ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary->Progressive1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Progressive1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive1" value="<?php echo HtmlEncode($ivf_art_summary->Progressive1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Progressive2->Visible) { // Progressive2 ?>
		<td data-name="Progressive2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive2" class="form-group ivf_art_summary_Progressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_Progressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Progressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Progressive2->EditValue ?>"<?php echo $ivf_art_summary->Progressive2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Progressive2" class="form-group ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary->Progressive2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Progressive2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Progressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Progressive2" value="<?php echo HtmlEncode($ivf_art_summary->Progressive2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive->Visible) { // NotProgressive ?>
		<td data-name="NotProgressive">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive" class="form-group ivf_art_summary_NotProgressive">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive" class="form-group ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary->NotProgressive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->NotProgressive->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td data-name="NotProgressive1">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive1" class="form-group ivf_art_summary_NotProgressive1">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive1->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive1" class="form-group ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary->NotProgressive1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->NotProgressive1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive1" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td data-name="NotProgressive2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive2" class="form-group ivf_art_summary_NotProgressive2">
<input type="text" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->NotProgressive2->EditValue ?>"<?php echo $ivf_art_summary->NotProgressive2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_NotProgressive2" class="form-group ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary->NotProgressive2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->NotProgressive2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_NotProgressive2" value="<?php echo HtmlEncode($ivf_art_summary->NotProgressive2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Motility2->Visible) { // Motility2 ?>
		<td data-name="Motility2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Motility2" class="form-group ivf_art_summary_Motility2">
<input type="text" data-table="ivf_art_summary" data-field="x_Motility2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Motility2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Motility2->EditValue ?>"<?php echo $ivf_art_summary->Motility2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Motility2" class="form-group ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary->Motility2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Motility2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Motility2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Motility2" value="<?php echo HtmlEncode($ivf_art_summary->Motility2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_art_summary->Morphology2->Visible) { // Morphology2 ?>
		<td data-name="Morphology2">
<?php if (!$ivf_art_summary->isConfirm()) { ?>
<span id="el$rowindex$_ivf_art_summary_Morphology2" class="form-group ivf_art_summary_Morphology2">
<input type="text" data-table="ivf_art_summary" data-field="x_Morphology2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_art_summary->Morphology2->getPlaceHolder()) ?>" value="<?php echo $ivf_art_summary->Morphology2->EditValue ?>"<?php echo $ivf_art_summary->Morphology2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_art_summary_Morphology2" class="form-group ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary->Morphology2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_art_summary->Morphology2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="x<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_art_summary" data-field="x_Morphology2" name="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" id="o<?php echo $ivf_art_summary_grid->RowIndex ?>_Morphology2" value="<?php echo HtmlEncode($ivf_art_summary->Morphology2->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_art_summary_grid->ListOptions->render("body", "right", $ivf_art_summary_grid->RowIndex);
?>
<script>
fivf_art_summarygrid.updateLists(<?php echo $ivf_art_summary_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_art_summary->CurrentMode == "add" || $ivf_art_summary->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_art_summary_grid->FormKeyCountName ?>" id="<?php echo $ivf_art_summary_grid->FormKeyCountName ?>" value="<?php echo $ivf_art_summary_grid->KeyCount ?>">
<?php echo $ivf_art_summary_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_art_summary->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_art_summary_grid->FormKeyCountName ?>" id="<?php echo $ivf_art_summary_grid->FormKeyCountName ?>" value="<?php echo $ivf_art_summary_grid->KeyCount ?>">
<?php echo $ivf_art_summary_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_art_summary->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_art_summarygrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_art_summary_grid->Recordset)
	$ivf_art_summary_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_art_summary_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_art_summary_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_art_summary_grid->TotalRecs == 0 && !$ivf_art_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_art_summary_grid->terminate();
?>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_art_summary", "95%", "");
</script>
<?php } ?>