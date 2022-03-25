<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_et_chart_grid))
	$ivf_et_chart_grid = new ivf_et_chart_grid();

// Run the page
$ivf_et_chart_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_grid->Page_Render();
?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>

// Form object
var fivf_et_chartgrid = new ew.Form("fivf_et_chartgrid", "grid");
fivf_et_chartgrid.formKeyCountName = '<?php echo $ivf_et_chart_grid->FormKeyCountName ?>';

// Validate form
fivf_et_chartgrid.validate = function() {
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
		<?php if ($ivf_et_chart_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->id->caption(), $ivf_et_chart->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->RIDNo->caption(), $ivf_et_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_et_chart_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Name->caption(), $ivf_et_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ARTCycle->caption(), $ivf_et_chart->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Consultant->caption(), $ivf_et_chart->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->InseminatinTechnique->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminatinTechnique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->InseminatinTechnique->caption(), $ivf_et_chart->InseminatinTechnique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->IndicationForART->Required) { ?>
			elm = this.getElements("x" + infix + "_IndicationForART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->IndicationForART->caption(), $ivf_et_chart->IndicationForART->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->PreTreatment->Required) { ?>
			elm = this.getElements("x" + infix + "_PreTreatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->PreTreatment->caption(), $ivf_et_chart->PreTreatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Hysteroscopy->Required) { ?>
			elm = this.getElements("x" + infix + "_Hysteroscopy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Hysteroscopy->caption(), $ivf_et_chart->Hysteroscopy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->EndometrialScratching->Required) { ?>
			elm = this.getElements("x" + infix + "_EndometrialScratching");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->EndometrialScratching->caption(), $ivf_et_chart->EndometrialScratching->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->TrialCannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TrialCannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TrialCannulation->caption(), $ivf_et_chart->TrialCannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->CYCLETYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_CYCLETYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CYCLETYPE->caption(), $ivf_et_chart->CYCLETYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->HRTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_HRTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->HRTCYCLE->caption(), $ivf_et_chart->HRTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->OralEstrogenDosage->Required) { ?>
			elm = this.getElements("x" + infix + "_OralEstrogenDosage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->OralEstrogenDosage->caption(), $ivf_et_chart->OralEstrogenDosage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->VaginalEstrogen->Required) { ?>
			elm = this.getElements("x" + infix + "_VaginalEstrogen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->VaginalEstrogen->caption(), $ivf_et_chart->VaginalEstrogen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->GCSF->Required) { ?>
			elm = this.getElements("x" + infix + "_GCSF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->GCSF->caption(), $ivf_et_chart->GCSF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->ActivatedPRP->Required) { ?>
			elm = this.getElements("x" + infix + "_ActivatedPRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ActivatedPRP->caption(), $ivf_et_chart->ActivatedPRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->ERA->Required) { ?>
			elm = this.getElements("x" + infix + "_ERA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ERA->caption(), $ivf_et_chart->ERA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->UCLcm->Required) { ?>
			elm = this.getElements("x" + infix + "_UCLcm");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->UCLcm->caption(), $ivf_et_chart->UCLcm->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->DATEOFSTART->Required) { ?>
			elm = this.getElements("x" + infix + "_DATEOFSTART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DATEOFSTART->caption(), $ivf_et_chart->DATEOFSTART->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DATEOFSTART");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->DATEOFSTART->errorMessage()) ?>");
		<?php if ($ivf_et_chart_grid->DATEOFEMBRYOTRANSFER->Required) { ?>
			elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption(), $ivf_et_chart->DATEOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->errorMessage()) ?>");
		<?php if ($ivf_et_chart_grid->DAYOFEMBRYOTRANSFER->Required) { ?>
			elm = this.getElements("x" + infix + "_DAYOFEMBRYOTRANSFER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption(), $ivf_et_chart->DAYOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->NOOFEMBRYOSTHAWED->Required) { ?>
			elm = this.getElements("x" + infix + "_NOOFEMBRYOSTHAWED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->NOOFEMBRYOSTHAWED->caption(), $ivf_et_chart->NOOFEMBRYOSTHAWED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->NOOFEMBRYOSTRANSFERRED->Required) { ?>
			elm = this.getElements("x" + infix + "_NOOFEMBRYOSTRANSFERRED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption(), $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->DAYOFEMBRYOS->Required) { ?>
			elm = this.getElements("x" + infix + "_DAYOFEMBRYOS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DAYOFEMBRYOS->caption(), $ivf_et_chart->DAYOFEMBRYOS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->CRYOPRESERVEDEMBRYOS->Required) { ?>
			elm = this.getElements("x" + infix + "_CRYOPRESERVEDEMBRYOS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption(), $ivf_et_chart->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Code1->Required) { ?>
			elm = this.getElements("x" + infix + "_Code1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Code1->caption(), $ivf_et_chart->Code1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Code2->Required) { ?>
			elm = this.getElements("x" + infix + "_Code2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Code2->caption(), $ivf_et_chart->Code2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->CellStage1->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CellStage1->caption(), $ivf_et_chart->CellStage1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->CellStage2->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CellStage2->caption(), $ivf_et_chart->CellStage2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Grade1->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Grade1->caption(), $ivf_et_chart->Grade1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->Grade2->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Grade2->caption(), $ivf_et_chart->Grade2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->PregnancyTestingWithSerumBetaHcG->Required) { ?>
			elm = this.getElements("x" + infix + "_PregnancyTestingWithSerumBetaHcG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption(), $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->ReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ReviewDate->caption(), $ivf_et_chart->ReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->ReviewDate->errorMessage()) ?>");
		<?php if ($ivf_et_chart_grid->ReviewDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDoctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ReviewDoctor->caption(), $ivf_et_chart->ReviewDoctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TidNo->caption(), $ivf_et_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->TidNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_et_chartgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "ARTCycle", false)) return false;
	if (ew.valueChanged(fobj, infix, "Consultant", false)) return false;
	if (ew.valueChanged(fobj, infix, "InseminatinTechnique", false)) return false;
	if (ew.valueChanged(fobj, infix, "IndicationForART", false)) return false;
	if (ew.valueChanged(fobj, infix, "PreTreatment", false)) return false;
	if (ew.valueChanged(fobj, infix, "Hysteroscopy", false)) return false;
	if (ew.valueChanged(fobj, infix, "EndometrialScratching", false)) return false;
	if (ew.valueChanged(fobj, infix, "TrialCannulation", false)) return false;
	if (ew.valueChanged(fobj, infix, "CYCLETYPE", false)) return false;
	if (ew.valueChanged(fobj, infix, "HRTCYCLE", false)) return false;
	if (ew.valueChanged(fobj, infix, "OralEstrogenDosage", false)) return false;
	if (ew.valueChanged(fobj, infix, "VaginalEstrogen", false)) return false;
	if (ew.valueChanged(fobj, infix, "GCSF", false)) return false;
	if (ew.valueChanged(fobj, infix, "ActivatedPRP", false)) return false;
	if (ew.valueChanged(fobj, infix, "ERA", false)) return false;
	if (ew.valueChanged(fobj, infix, "UCLcm", false)) return false;
	if (ew.valueChanged(fobj, infix, "DATEOFSTART", false)) return false;
	if (ew.valueChanged(fobj, infix, "DATEOFEMBRYOTRANSFER", false)) return false;
	if (ew.valueChanged(fobj, infix, "DAYOFEMBRYOTRANSFER", false)) return false;
	if (ew.valueChanged(fobj, infix, "NOOFEMBRYOSTHAWED", false)) return false;
	if (ew.valueChanged(fobj, infix, "NOOFEMBRYOSTRANSFERRED", false)) return false;
	if (ew.valueChanged(fobj, infix, "DAYOFEMBRYOS", false)) return false;
	if (ew.valueChanged(fobj, infix, "CRYOPRESERVEDEMBRYOS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Code2", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage1", false)) return false;
	if (ew.valueChanged(fobj, infix, "CellStage2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade2", false)) return false;
	if (ew.valueChanged(fobj, infix, "PregnancyTestingWithSerumBetaHcG", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReviewDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReviewDoctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_et_chartgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_et_chartgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_et_chartgrid.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_grid->ARTCycle->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_grid->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_grid->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_grid->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_grid->PreTreatment->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_grid->PreTreatment->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_grid->Hysteroscopy->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_grid->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_grid->EndometrialScratching->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_grid->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_grid->TrialCannulation->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_grid->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_grid->CYCLETYPE->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_grid->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_grid->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_grid->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_GCSF"] = <?php echo $ivf_et_chart_grid->GCSF->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_grid->GCSF->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_grid->ActivatedPRP->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_grid->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_et_chartgrid.lists["x_ERA"] = <?php echo $ivf_et_chart_grid->ERA->Lookup->toClientList() ?>;
fivf_et_chartgrid.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_grid->ERA->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$ivf_et_chart_grid->renderOtherOptions();
?>
<?php $ivf_et_chart_grid->showPageHeader(); ?>
<?php
$ivf_et_chart_grid->showMessage();
?>
<?php if ($ivf_et_chart_grid->TotalRecs > 0 || $ivf_et_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_et_chart_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_et_chart">
<?php if ($ivf_et_chart_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_et_chart_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_et_chartgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_et_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_et_chartgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_et_chart_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_et_chart_grid->renderListOptions();

// Render list options (header, left)
$ivf_et_chart_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_et_chart->id->Visible) { // id ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->IndicationForART) == "") { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->IndicationForART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->IndicationForART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->IndicationForART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->IndicationForART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->PreTreatment) == "") { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->PreTreatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->PreTreatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->PreTreatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->PreTreatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Hysteroscopy) == "") { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Hysteroscopy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Hysteroscopy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->EndometrialScratching) == "") { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->EndometrialScratching->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->EndometrialScratching->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->TrialCannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->TrialCannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CYCLETYPE) == "") { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CYCLETYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CYCLETYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->HRTCYCLE) == "") { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->HRTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->HRTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->OralEstrogenDosage) == "") { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->OralEstrogenDosage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->OralEstrogenDosage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->VaginalEstrogen) == "") { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->VaginalEstrogen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->VaginalEstrogen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->GCSF) == "") { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->GCSF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->GCSF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->GCSF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ActivatedPRP) == "") { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ActivatedPRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ActivatedPRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ERA) == "") { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ERA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ERA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ERA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->UCLcm) == "") { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->UCLcm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->UCLcm->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->UCLcm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->UCLcm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DATEOFSTART) == "") { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DATEOFSTART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DATEOFSTART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DATEOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DATEOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DAYOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->NOOFEMBRYOSTHAWED) == "") { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->NOOFEMBRYOSTHAWED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DAYOFEMBRYOS) == "") { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DAYOFEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DAYOFEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Code1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Code1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Code2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Code2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CellStage1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CellStage1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CellStage2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CellStage2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Grade1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Grade1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Grade2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Grade2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->PregnancyTestingWithSerumBetaHcG) == "") { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ReviewDoctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ReviewDoctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_et_chart_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_et_chart_grid->StartRec = 1;
$ivf_et_chart_grid->StopRec = $ivf_et_chart_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_et_chart_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_et_chart_grid->FormKeyCountName) && ($ivf_et_chart->isGridAdd() || $ivf_et_chart->isGridEdit() || $ivf_et_chart->isConfirm())) {
		$ivf_et_chart_grid->KeyCount = $CurrentForm->getValue($ivf_et_chart_grid->FormKeyCountName);
		$ivf_et_chart_grid->StopRec = $ivf_et_chart_grid->StartRec + $ivf_et_chart_grid->KeyCount - 1;
	}
}
$ivf_et_chart_grid->RecCnt = $ivf_et_chart_grid->StartRec - 1;
if ($ivf_et_chart_grid->Recordset && !$ivf_et_chart_grid->Recordset->EOF) {
	$ivf_et_chart_grid->Recordset->moveFirst();
	$selectLimit = $ivf_et_chart_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_et_chart_grid->StartRec > 1)
		$ivf_et_chart_grid->Recordset->move($ivf_et_chart_grid->StartRec - 1);
} elseif (!$ivf_et_chart->AllowAddDeleteRow && $ivf_et_chart_grid->StopRec == 0) {
	$ivf_et_chart_grid->StopRec = $ivf_et_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_et_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_et_chart->resetAttributes();
$ivf_et_chart_grid->renderRow();
if ($ivf_et_chart->isGridAdd())
	$ivf_et_chart_grid->RowIndex = 0;
if ($ivf_et_chart->isGridEdit())
	$ivf_et_chart_grid->RowIndex = 0;
while ($ivf_et_chart_grid->RecCnt < $ivf_et_chart_grid->StopRec) {
	$ivf_et_chart_grid->RecCnt++;
	if ($ivf_et_chart_grid->RecCnt >= $ivf_et_chart_grid->StartRec) {
		$ivf_et_chart_grid->RowCnt++;
		if ($ivf_et_chart->isGridAdd() || $ivf_et_chart->isGridEdit() || $ivf_et_chart->isConfirm()) {
			$ivf_et_chart_grid->RowIndex++;
			$CurrentForm->Index = $ivf_et_chart_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_et_chart_grid->FormActionName) && $ivf_et_chart_grid->EventCancelled)
				$ivf_et_chart_grid->RowAction = strval($CurrentForm->getValue($ivf_et_chart_grid->FormActionName));
			elseif ($ivf_et_chart->isGridAdd())
				$ivf_et_chart_grid->RowAction = "insert";
			else
				$ivf_et_chart_grid->RowAction = "";
		}

		// Set up key count
		$ivf_et_chart_grid->KeyCount = $ivf_et_chart_grid->RowIndex;

		// Init row class and style
		$ivf_et_chart->resetAttributes();
		$ivf_et_chart->CssClass = "";
		if ($ivf_et_chart->isGridAdd()) {
			if ($ivf_et_chart->CurrentMode == "copy") {
				$ivf_et_chart_grid->loadRowValues($ivf_et_chart_grid->Recordset); // Load row values
				$ivf_et_chart_grid->setRecordKey($ivf_et_chart_grid->RowOldKey, $ivf_et_chart_grid->Recordset); // Set old record key
			} else {
				$ivf_et_chart_grid->loadRowValues(); // Load default values
				$ivf_et_chart_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_et_chart_grid->loadRowValues($ivf_et_chart_grid->Recordset); // Load row values
		}
		$ivf_et_chart->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_et_chart->isGridAdd()) // Grid add
			$ivf_et_chart->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_et_chart->isGridAdd() && $ivf_et_chart->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_et_chart_grid->restoreCurrentRowFormValues($ivf_et_chart_grid->RowIndex); // Restore form values
		if ($ivf_et_chart->isGridEdit()) { // Grid edit
			if ($ivf_et_chart->EventCancelled)
				$ivf_et_chart_grid->restoreCurrentRowFormValues($ivf_et_chart_grid->RowIndex); // Restore form values
			if ($ivf_et_chart_grid->RowAction == "insert")
				$ivf_et_chart->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_et_chart->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_et_chart->isGridEdit() && ($ivf_et_chart->RowType == ROWTYPE_EDIT || $ivf_et_chart->RowType == ROWTYPE_ADD) && $ivf_et_chart->EventCancelled) // Update failed
			$ivf_et_chart_grid->restoreCurrentRowFormValues($ivf_et_chart_grid->RowIndex); // Restore form values
		if ($ivf_et_chart->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_et_chart_grid->EditRowCnt++;
		if ($ivf_et_chart->isConfirm()) // Confirm row
			$ivf_et_chart_grid->restoreCurrentRowFormValues($ivf_et_chart_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_et_chart->RowAttrs = array_merge($ivf_et_chart->RowAttrs, array('data-rowindex'=>$ivf_et_chart_grid->RowCnt, 'id'=>'r' . $ivf_et_chart_grid->RowCnt . '_ivf_et_chart', 'data-rowtype'=>$ivf_et_chart->RowType));

		// Render row
		$ivf_et_chart_grid->renderRow();

		// Render list options
		$ivf_et_chart_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_et_chart_grid->RowAction <> "delete" && $ivf_et_chart_grid->RowAction <> "insertdelete" && !($ivf_et_chart_grid->RowAction == "insert" && $ivf_et_chart->isConfirm() && $ivf_et_chart_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_et_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_et_chart_grid->ListOptions->render("body", "left", $ivf_et_chart_grid->RowCnt);
?>
	<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_et_chart->id->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_id" class="form-group ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_id" class="ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<?php echo $ivf_et_chart->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_et_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<input type="text" data-table="ivf_et_chart" data-field="x_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->RIDNo->EditValue ?>"<?php echo $ivf_et_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_et_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<input type="text" data-table="ivf_et_chart" data-field="x_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->RIDNo->EditValue ?>"<?php echo $ivf_et_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_et_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<input type="text" data-table="ivf_et_chart" data-field="x_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Name->EditValue ?>"<?php echo $ivf_et_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_et_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<input type="text" data-table="ivf_et_chart" data-field="x_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Name->EditValue ?>"<?php echo $ivf_et_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Name" class="ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<?php echo $ivf_et_chart->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ARTCycle" class="form-group ivf_et_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_et_chart->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_et_chart->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_et_chart->ARTCycle->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ARTCycle" class="form-group ivf_et_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_et_chart->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_et_chart->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_et_chart->ARTCycle->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_et_chart->ARTCycle->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Consultant" class="form-group ivf_et_chart_Consultant">
<input type="text" data-table="ivf_et_chart" data-field="x_Consultant" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Consultant->EditValue ?>"<?php echo $ivf_et_chart->Consultant->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Consultant" class="form-group ivf_et_chart_Consultant">
<input type="text" data-table="ivf_et_chart" data-field="x_Consultant" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Consultant->EditValue ?>"<?php echo $ivf_et_chart->Consultant->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_et_chart->Consultant->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_InseminatinTechnique" class="form-group ivf_et_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_et_chart->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_et_chart->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_InseminatinTechnique" class="form-group ivf_et_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_et_chart->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_et_chart->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_et_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART"<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_IndicationForART" class="form-group ivf_et_chart_IndicationForART">
<input type="text" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->IndicationForART->EditValue ?>"<?php echo $ivf_et_chart->IndicationForART->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_IndicationForART" class="form-group ivf_et_chart_IndicationForART">
<input type="text" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->IndicationForART->EditValue ?>"<?php echo $ivf_et_chart->IndicationForART->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_et_chart->IndicationForART->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<td data-name="PreTreatment"<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PreTreatment" class="form-group ivf_et_chart_PreTreatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_PreTreatment" data-value-separator="<?php echo $ivf_et_chart->PreTreatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment"<?php echo $ivf_et_chart->PreTreatment->editAttributes() ?>>
		<?php echo $ivf_et_chart->PreTreatment->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PreTreatment" class="form-group ivf_et_chart_PreTreatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_PreTreatment" data-value-separator="<?php echo $ivf_et_chart->PreTreatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment"<?php echo $ivf_et_chart->PreTreatment->editAttributes() ?>>
		<?php echo $ivf_et_chart->PreTreatment->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<?php echo $ivf_et_chart->PreTreatment->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Hysteroscopy" class="form-group ivf_et_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_et_chart->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->editAttributes() ?>>
		<?php echo $ivf_et_chart->Hysteroscopy->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Hysteroscopy" class="form-group ivf_et_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_et_chart->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->editAttributes() ?>>
		<?php echo $ivf_et_chart->Hysteroscopy->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_et_chart->Hysteroscopy->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td data-name="EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_EndometrialScratching" class="form-group ivf_et_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_et_chart->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->editAttributes() ?>>
		<?php echo $ivf_et_chart->EndometrialScratching->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_EndometrialScratching" class="form-group ivf_et_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_et_chart->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->editAttributes() ?>>
		<?php echo $ivf_et_chart->EndometrialScratching->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_et_chart->EndometrialScratching->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TrialCannulation" class="form-group ivf_et_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_et_chart->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->editAttributes() ?>>
		<?php echo $ivf_et_chart->TrialCannulation->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TrialCannulation" class="form-group ivf_et_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_et_chart->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->editAttributes() ?>>
		<?php echo $ivf_et_chart->TrialCannulation->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_et_chart->TrialCannulation->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td data-name="CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CYCLETYPE" class="form-group ivf_et_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_et_chart->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->editAttributes() ?>>
		<?php echo $ivf_et_chart->CYCLETYPE->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CYCLETYPE" class="form-group ivf_et_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_et_chart->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->editAttributes() ?>>
		<?php echo $ivf_et_chart->CYCLETYPE->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_et_chart->CYCLETYPE->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td data-name="HRTCYCLE"<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_HRTCYCLE" class="form-group ivf_et_chart_HRTCYCLE">
<input type="text" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->HRTCYCLE->EditValue ?>"<?php echo $ivf_et_chart->HRTCYCLE->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_HRTCYCLE" class="form-group ivf_et_chart_HRTCYCLE">
<input type="text" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->HRTCYCLE->EditValue ?>"<?php echo $ivf_et_chart->HRTCYCLE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_et_chart->HRTCYCLE->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td data-name="OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_OralEstrogenDosage" class="form-group ivf_et_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_et_chart->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->editAttributes() ?>>
		<?php echo $ivf_et_chart->OralEstrogenDosage->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_OralEstrogenDosage" class="form-group ivf_et_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_et_chart->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->editAttributes() ?>>
		<?php echo $ivf_et_chart->OralEstrogenDosage->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_et_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td data-name="VaginalEstrogen"<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_VaginalEstrogen" class="form-group ivf_et_chart_VaginalEstrogen">
<input type="text" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->VaginalEstrogen->EditValue ?>"<?php echo $ivf_et_chart->VaginalEstrogen->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_VaginalEstrogen" class="form-group ivf_et_chart_VaginalEstrogen">
<input type="text" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->VaginalEstrogen->EditValue ?>"<?php echo $ivf_et_chart->VaginalEstrogen->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_et_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<td data-name="GCSF"<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_GCSF" class="form-group ivf_et_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_et_chart->GCSF->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF"<?php echo $ivf_et_chart->GCSF->editAttributes() ?>>
		<?php echo $ivf_et_chart->GCSF->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_GCSF" class="form-group ivf_et_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_et_chart->GCSF->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF"<?php echo $ivf_et_chart->GCSF->editAttributes() ?>>
		<?php echo $ivf_et_chart->GCSF->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_et_chart->GCSF->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td data-name="ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ActivatedPRP" class="form-group ivf_et_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_et_chart->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->editAttributes() ?>>
		<?php echo $ivf_et_chart->ActivatedPRP->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ActivatedPRP" class="form-group ivf_et_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_et_chart->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->editAttributes() ?>>
		<?php echo $ivf_et_chart->ActivatedPRP->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_et_chart->ActivatedPRP->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<td data-name="ERA"<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ERA" class="form-group ivf_et_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_et_chart->ERA->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA"<?php echo $ivf_et_chart->ERA->editAttributes() ?>>
		<?php echo $ivf_et_chart->ERA->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ERA" class="form-group ivf_et_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_et_chart->ERA->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA"<?php echo $ivf_et_chart->ERA->editAttributes() ?>>
		<?php echo $ivf_et_chart->ERA->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_et_chart->ERA->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<td data-name="UCLcm"<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_UCLcm" class="form-group ivf_et_chart_UCLcm">
<input type="text" data-table="ivf_et_chart" data-field="x_UCLcm" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->UCLcm->EditValue ?>"<?php echo $ivf_et_chart->UCLcm->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_UCLcm" class="form-group ivf_et_chart_UCLcm">
<input type="text" data-table="ivf_et_chart" data-field="x_UCLcm" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->UCLcm->EditValue ?>"<?php echo $ivf_et_chart->UCLcm->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_et_chart->UCLcm->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td data-name="DATEOFSTART"<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFSTART" class="form-group ivf_et_chart_DATEOFSTART">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFSTART->EditValue ?>"<?php echo $ivf_et_chart->DATEOFSTART->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFSTART->ReadOnly && !$ivf_et_chart->DATEOFSTART->Disabled && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFSTART" class="form-group ivf_et_chart_DATEOFSTART">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFSTART->EditValue ?>"<?php echo $ivf_et_chart->DATEOFSTART->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFSTART->ReadOnly && !$ivf_et_chart->DATEOFSTART->Disabled && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFSTART->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td data-name="DATEOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFEMBRYOTRANSFER->ReadOnly && !$ivf_et_chart->DATEOFEMBRYOTRANSFER->Disabled && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFEMBRYOTRANSFER->ReadOnly && !$ivf_et_chart->DATEOFEMBRYOTRANSFER->Disabled && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td data-name="DAYOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td data-name="NOOFEMBRYOSTHAWED"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="form-group ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="form-group ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td data-name="NOOFEMBRYOSTRANSFERRED"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="form-group ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="form-group ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td data-name="DAYOFEMBRYOS"<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOS" class="form-group ivf_et_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOS" class="form-group ivf_et_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td data-name="CRYOPRESERVEDEMBRYOS"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="form-group ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="form-group ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<td data-name="Code1"<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code1" class="form-group ivf_et_chart_Code1">
<input type="text" data-table="ivf_et_chart" data-field="x_Code1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code1->EditValue ?>"<?php echo $ivf_et_chart->Code1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code1" class="form-group ivf_et_chart_Code1">
<input type="text" data-table="ivf_et_chart" data-field="x_Code1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code1->EditValue ?>"<?php echo $ivf_et_chart->Code1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code1->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<td data-name="Code2"<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code2" class="form-group ivf_et_chart_Code2">
<input type="text" data-table="ivf_et_chart" data-field="x_Code2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code2->EditValue ?>"<?php echo $ivf_et_chart->Code2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code2" class="form-group ivf_et_chart_Code2">
<input type="text" data-table="ivf_et_chart" data-field="x_Code2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code2->EditValue ?>"<?php echo $ivf_et_chart->Code2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code2->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1"<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage1" class="form-group ivf_et_chart_CellStage1">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage1->EditValue ?>"<?php echo $ivf_et_chart->CellStage1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage1" class="form-group ivf_et_chart_CellStage1">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage1->EditValue ?>"<?php echo $ivf_et_chart->CellStage1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage1->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2"<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage2" class="form-group ivf_et_chart_CellStage2">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage2->EditValue ?>"<?php echo $ivf_et_chart->CellStage2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage2" class="form-group ivf_et_chart_CellStage2">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage2->EditValue ?>"<?php echo $ivf_et_chart->CellStage2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage2->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1"<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade1" class="form-group ivf_et_chart_Grade1">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade1->EditValue ?>"<?php echo $ivf_et_chart->Grade1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade1" class="form-group ivf_et_chart_Grade1">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade1->EditValue ?>"<?php echo $ivf_et_chart->Grade1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade1->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2"<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade2" class="form-group ivf_et_chart_Grade2">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade2->EditValue ?>"<?php echo $ivf_et_chart->Grade2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade2" class="form-group ivf_et_chart_Grade2">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade2->EditValue ?>"<?php echo $ivf_et_chart->Grade2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade2->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td data-name="PregnancyTestingWithSerumBetaHcG"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="form-group ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="text" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="form-group ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="text" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate"<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDate" class="form-group ivf_et_chart_ReviewDate">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDate->EditValue ?>"<?php echo $ivf_et_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_et_chart->ReviewDate->ReadOnly && !$ivf_et_chart->ReviewDate->Disabled && !isset($ivf_et_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_et_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDate" class="form-group ivf_et_chart_ReviewDate">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDate->EditValue ?>"<?php echo $ivf_et_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_et_chart->ReviewDate->ReadOnly && !$ivf_et_chart->ReviewDate->Disabled && !isset($ivf_et_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_et_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor"<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDoctor" class="form-group ivf_et_chart_ReviewDoctor">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_et_chart->ReviewDoctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDoctor" class="form-group ivf_et_chart_ReviewDoctor">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_et_chart->ReviewDoctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDoctor->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_et_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<input type="text" data-table="ivf_et_chart" data-field="x_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->TidNo->EditValue ?>"<?php echo $ivf_et_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_et_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<input type="text" data-table="ivf_et_chart" data-field="x_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->TidNo->EditValue ?>"<?php echo $ivf_et_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_et_chart_grid->RowCnt ?>_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="fivf_et_chartgrid$x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="fivf_et_chartgrid$o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_et_chart_grid->ListOptions->render("body", "right", $ivf_et_chart_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_et_chart->RowType == ROWTYPE_ADD || $ivf_et_chart->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_et_chartgrid.updateLists(<?php echo $ivf_et_chart_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_et_chart->isGridAdd() || $ivf_et_chart->CurrentMode == "copy")
		if (!$ivf_et_chart_grid->Recordset->EOF)
			$ivf_et_chart_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_et_chart->CurrentMode == "add" || $ivf_et_chart->CurrentMode == "copy" || $ivf_et_chart->CurrentMode == "edit") {
		$ivf_et_chart_grid->RowIndex = '$rowindex$';
		$ivf_et_chart_grid->loadRowValues();

		// Set row properties
		$ivf_et_chart->resetAttributes();
		$ivf_et_chart->RowAttrs = array_merge($ivf_et_chart->RowAttrs, array('data-rowindex'=>$ivf_et_chart_grid->RowIndex, 'id'=>'r0_ivf_et_chart', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_et_chart->RowAttrs["class"], "ew-template");
		$ivf_et_chart->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_et_chart_grid->renderRow();

		// Render list options
		$ivf_et_chart_grid->renderListOptions();
		$ivf_et_chart_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_et_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_et_chart_grid->ListOptions->render("body", "left", $ivf_et_chart_grid->RowIndex);
?>
	<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_id" class="form-group ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_et_chart->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<?php if ($ivf_et_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<input type="text" data-table="ivf_et_chart" data-field="x_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->RIDNo->EditValue ?>"<?php echo $ivf_et_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_RIDNo" class="form-group ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_RIDNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_et_chart->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<?php if ($ivf_et_chart->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<input type="text" data-table="ivf_et_chart" data-field="x_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Name->EditValue ?>"<?php echo $ivf_et_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Name" class="form-group ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Name" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_et_chart->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_ARTCycle" class="form-group ivf_et_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_et_chart->ARTCycle->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle"<?php echo $ivf_et_chart->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_et_chart->ARTCycle->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_ARTCycle" class="form-group ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->ARTCycle->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_et_chart->ARTCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Consultant" class="form-group ivf_et_chart_Consultant">
<input type="text" data-table="ivf_et_chart" data-field="x_Consultant" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Consultant->EditValue ?>"<?php echo $ivf_et_chart->Consultant->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Consultant" class="form-group ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Consultant->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Consultant" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_et_chart->Consultant->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_InseminatinTechnique" class="form-group ivf_et_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_et_chart->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_et_chart->InseminatinTechnique->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_InseminatinTechnique" class="form-group ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->InseminatinTechnique->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_InseminatinTechnique" value="<?php echo HtmlEncode($ivf_et_chart->InseminatinTechnique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_IndicationForART" class="form-group ivf_et_chart_IndicationForART">
<input type="text" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->IndicationForART->EditValue ?>"<?php echo $ivf_et_chart->IndicationForART->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_IndicationForART" class="form-group ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->IndicationForART->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_IndicationForART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_IndicationForART" value="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<td data-name="PreTreatment">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_PreTreatment" class="form-group ivf_et_chart_PreTreatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_PreTreatment" data-value-separator="<?php echo $ivf_et_chart->PreTreatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment"<?php echo $ivf_et_chart->PreTreatment->editAttributes() ?>>
		<?php echo $ivf_et_chart->PreTreatment->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_PreTreatment" class="form-group ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->PreTreatment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PreTreatment" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PreTreatment" value="<?php echo HtmlEncode($ivf_et_chart->PreTreatment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Hysteroscopy" class="form-group ivf_et_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_et_chart->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->editAttributes() ?>>
		<?php echo $ivf_et_chart->Hysteroscopy->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Hysteroscopy" class="form-group ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Hysteroscopy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Hysteroscopy" value="<?php echo HtmlEncode($ivf_et_chart->Hysteroscopy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td data-name="EndometrialScratching">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_EndometrialScratching" class="form-group ivf_et_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_et_chart->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->editAttributes() ?>>
		<?php echo $ivf_et_chart->EndometrialScratching->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_EndometrialScratching" class="form-group ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->EndometrialScratching->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_EndometrialScratching" value="<?php echo HtmlEncode($ivf_et_chart->EndometrialScratching->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_TrialCannulation" class="form-group ivf_et_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_et_chart->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->editAttributes() ?>>
		<?php echo $ivf_et_chart->TrialCannulation->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_TrialCannulation" class="form-group ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->TrialCannulation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_et_chart->TrialCannulation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td data-name="CYCLETYPE">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_CYCLETYPE" class="form-group ivf_et_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_et_chart->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->editAttributes() ?>>
		<?php echo $ivf_et_chart->CYCLETYPE->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_CYCLETYPE" class="form-group ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->CYCLETYPE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CYCLETYPE" value="<?php echo HtmlEncode($ivf_et_chart->CYCLETYPE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td data-name="HRTCYCLE">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_HRTCYCLE" class="form-group ivf_et_chart_HRTCYCLE">
<input type="text" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->HRTCYCLE->EditValue ?>"<?php echo $ivf_et_chart->HRTCYCLE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_HRTCYCLE" class="form-group ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->HRTCYCLE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_HRTCYCLE" value="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td data-name="OralEstrogenDosage">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_OralEstrogenDosage" class="form-group ivf_et_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_et_chart->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->editAttributes() ?>>
		<?php echo $ivf_et_chart->OralEstrogenDosage->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_OralEstrogenDosage" class="form-group ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->OralEstrogenDosage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_OralEstrogenDosage" value="<?php echo HtmlEncode($ivf_et_chart->OralEstrogenDosage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td data-name="VaginalEstrogen">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_VaginalEstrogen" class="form-group ivf_et_chart_VaginalEstrogen">
<input type="text" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->VaginalEstrogen->EditValue ?>"<?php echo $ivf_et_chart->VaginalEstrogen->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_VaginalEstrogen" class="form-group ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->VaginalEstrogen->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_VaginalEstrogen" value="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<td data-name="GCSF">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_GCSF" class="form-group ivf_et_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_et_chart->GCSF->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF"<?php echo $ivf_et_chart->GCSF->editAttributes() ?>>
		<?php echo $ivf_et_chart->GCSF->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_GCSF" class="form-group ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->GCSF->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_GCSF" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_GCSF" value="<?php echo HtmlEncode($ivf_et_chart->GCSF->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td data-name="ActivatedPRP">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_ActivatedPRP" class="form-group ivf_et_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_et_chart->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->editAttributes() ?>>
		<?php echo $ivf_et_chart->ActivatedPRP->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_ActivatedPRP" class="form-group ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->ActivatedPRP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ActivatedPRP" value="<?php echo HtmlEncode($ivf_et_chart->ActivatedPRP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<td data-name="ERA">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_ERA" class="form-group ivf_et_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_et_chart->ERA->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA"<?php echo $ivf_et_chart->ERA->editAttributes() ?>>
		<?php echo $ivf_et_chart->ERA->selectOptionListHtml("x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_ERA" class="form-group ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->ERA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ERA" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ERA" value="<?php echo HtmlEncode($ivf_et_chart->ERA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<td data-name="UCLcm">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_UCLcm" class="form-group ivf_et_chart_UCLcm">
<input type="text" data-table="ivf_et_chart" data-field="x_UCLcm" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->UCLcm->EditValue ?>"<?php echo $ivf_et_chart->UCLcm->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_UCLcm" class="form-group ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->UCLcm->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_UCLcm" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_UCLcm" value="<?php echo HtmlEncode($ivf_et_chart->UCLcm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td data-name="DATEOFSTART">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_DATEOFSTART" class="form-group ivf_et_chart_DATEOFSTART">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFSTART->EditValue ?>"<?php echo $ivf_et_chart->DATEOFSTART->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFSTART->ReadOnly && !$ivf_et_chart->DATEOFSTART->Disabled && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_DATEOFSTART" class="form-group ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->DATEOFSTART->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFSTART" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td data-name="DATEOFEMBRYOTRANSFER">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFEMBRYOTRANSFER->ReadOnly && !$ivf_et_chart->DATEOFEMBRYOTRANSFER->Disabled && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->DATEOFEMBRYOTRANSFER->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DATEOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td data-name="DAYOFEMBRYOTRANSFER">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="form-group ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->DAYOFEMBRYOTRANSFER->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOTRANSFER" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td data-name="NOOFEMBRYOSTHAWED">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_NOOFEMBRYOSTHAWED" class="form-group ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_NOOFEMBRYOSTHAWED" class="form-group ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->NOOFEMBRYOSTHAWED->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTHAWED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td data-name="NOOFEMBRYOSTRANSFERRED">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="form-group ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="form-group ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_NOOFEMBRYOSTRANSFERRED" value="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td data-name="DAYOFEMBRYOS">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_DAYOFEMBRYOS" class="form-group ivf_et_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_DAYOFEMBRYOS" class="form-group ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->DAYOFEMBRYOS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_DAYOFEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td data-name="CRYOPRESERVEDEMBRYOS">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="form-group ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="form-group ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->CRYOPRESERVEDEMBRYOS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CRYOPRESERVEDEMBRYOS" value="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<td data-name="Code1">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Code1" class="form-group ivf_et_chart_Code1">
<input type="text" data-table="ivf_et_chart" data-field="x_Code1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code1->EditValue ?>"<?php echo $ivf_et_chart->Code1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Code1" class="form-group ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Code1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code1" value="<?php echo HtmlEncode($ivf_et_chart->Code1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<td data-name="Code2">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Code2" class="form-group ivf_et_chart_Code2">
<input type="text" data-table="ivf_et_chart" data-field="x_Code2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code2->EditValue ?>"<?php echo $ivf_et_chart->Code2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Code2" class="form-group ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Code2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Code2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Code2" value="<?php echo HtmlEncode($ivf_et_chart->Code2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_CellStage1" class="form-group ivf_et_chart_CellStage1">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage1->EditValue ?>"<?php echo $ivf_et_chart->CellStage1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_CellStage1" class="form-group ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->CellStage1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage1" value="<?php echo HtmlEncode($ivf_et_chart->CellStage1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_CellStage2" class="form-group ivf_et_chart_CellStage2">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage2->EditValue ?>"<?php echo $ivf_et_chart->CellStage2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_CellStage2" class="form-group ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->CellStage2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_CellStage2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_CellStage2" value="<?php echo HtmlEncode($ivf_et_chart->CellStage2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Grade1" class="form-group ivf_et_chart_Grade1">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade1->EditValue ?>"<?php echo $ivf_et_chart->Grade1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Grade1" class="form-group ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Grade1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade1" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade1" value="<?php echo HtmlEncode($ivf_et_chart->Grade1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_Grade2" class="form-group ivf_et_chart_Grade2">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade2->EditValue ?>"<?php echo $ivf_et_chart->Grade2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_Grade2" class="form-group ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->Grade2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_Grade2" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_Grade2" value="<?php echo HtmlEncode($ivf_et_chart->Grade2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td data-name="PregnancyTestingWithSerumBetaHcG">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="form-group ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="text" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="form-group ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_PregnancyTestingWithSerumBetaHcG" value="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_ReviewDate" class="form-group ivf_et_chart_ReviewDate">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDate->EditValue ?>"<?php echo $ivf_et_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_et_chart->ReviewDate->ReadOnly && !$ivf_et_chart->ReviewDate->Disabled && !isset($ivf_et_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_et_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_et_chartgrid", "x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_ReviewDate" class="form-group ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->ReviewDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_et_chart_ReviewDoctor" class="form-group ivf_et_chart_ReviewDoctor">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_et_chart->ReviewDoctor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_ReviewDoctor" class="form-group ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->ReviewDoctor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_et_chart->isConfirm()) { ?>
<?php if ($ivf_et_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<input type="text" data-table="ivf_et_chart" data-field="x_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->TidNo->EditValue ?>"<?php echo $ivf_et_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_et_chart_TidNo" class="form-group ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_et_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_et_chart" data-field="x_TidNo" name="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_et_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_et_chart->TidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_et_chart_grid->ListOptions->render("body", "right", $ivf_et_chart_grid->RowIndex);
?>
<script>
fivf_et_chartgrid.updateLists(<?php echo $ivf_et_chart_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_et_chart->CurrentMode == "add" || $ivf_et_chart->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_et_chart_grid->FormKeyCountName ?>" id="<?php echo $ivf_et_chart_grid->FormKeyCountName ?>" value="<?php echo $ivf_et_chart_grid->KeyCount ?>">
<?php echo $ivf_et_chart_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_et_chart->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_et_chart_grid->FormKeyCountName ?>" id="<?php echo $ivf_et_chart_grid->FormKeyCountName ?>" value="<?php echo $ivf_et_chart_grid->KeyCount ?>">
<?php echo $ivf_et_chart_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_et_chart->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_et_chartgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_et_chart_grid->Recordset)
	$ivf_et_chart_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_et_chart_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_et_chart_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_et_chart_grid->TotalRecs == 0 && !$ivf_et_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_et_chart_grid->terminate();
?>