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
$ivf_et_chart_add = new ivf_et_chart_add();

// Run the page
$ivf_et_chart_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fivf_et_chartadd = currentForm = new ew.Form("fivf_et_chartadd", "add");

// Validate form
fivf_et_chartadd.validate = function() {
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
		<?php if ($ivf_et_chart_add->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->RIDNo->caption(), $ivf_et_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_et_chart_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Name->caption(), $ivf_et_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ARTCycle->caption(), $ivf_et_chart->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Consultant->caption(), $ivf_et_chart->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->InseminatinTechnique->Required) { ?>
			elm = this.getElements("x" + infix + "_InseminatinTechnique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->InseminatinTechnique->caption(), $ivf_et_chart->InseminatinTechnique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->IndicationForART->Required) { ?>
			elm = this.getElements("x" + infix + "_IndicationForART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->IndicationForART->caption(), $ivf_et_chart->IndicationForART->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->PreTreatment->Required) { ?>
			elm = this.getElements("x" + infix + "_PreTreatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->PreTreatment->caption(), $ivf_et_chart->PreTreatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Hysteroscopy->Required) { ?>
			elm = this.getElements("x" + infix + "_Hysteroscopy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Hysteroscopy->caption(), $ivf_et_chart->Hysteroscopy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->EndometrialScratching->Required) { ?>
			elm = this.getElements("x" + infix + "_EndometrialScratching");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->EndometrialScratching->caption(), $ivf_et_chart->EndometrialScratching->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->TrialCannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TrialCannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TrialCannulation->caption(), $ivf_et_chart->TrialCannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->CYCLETYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_CYCLETYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CYCLETYPE->caption(), $ivf_et_chart->CYCLETYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->HRTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_HRTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->HRTCYCLE->caption(), $ivf_et_chart->HRTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->OralEstrogenDosage->Required) { ?>
			elm = this.getElements("x" + infix + "_OralEstrogenDosage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->OralEstrogenDosage->caption(), $ivf_et_chart->OralEstrogenDosage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->VaginalEstrogen->Required) { ?>
			elm = this.getElements("x" + infix + "_VaginalEstrogen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->VaginalEstrogen->caption(), $ivf_et_chart->VaginalEstrogen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->GCSF->Required) { ?>
			elm = this.getElements("x" + infix + "_GCSF");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->GCSF->caption(), $ivf_et_chart->GCSF->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->ActivatedPRP->Required) { ?>
			elm = this.getElements("x" + infix + "_ActivatedPRP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ActivatedPRP->caption(), $ivf_et_chart->ActivatedPRP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->ERA->Required) { ?>
			elm = this.getElements("x" + infix + "_ERA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ERA->caption(), $ivf_et_chart->ERA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->UCLcm->Required) { ?>
			elm = this.getElements("x" + infix + "_UCLcm");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->UCLcm->caption(), $ivf_et_chart->UCLcm->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->DATEOFSTART->Required) { ?>
			elm = this.getElements("x" + infix + "_DATEOFSTART");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DATEOFSTART->caption(), $ivf_et_chart->DATEOFSTART->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DATEOFSTART");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->DATEOFSTART->errorMessage()) ?>");
		<?php if ($ivf_et_chart_add->DATEOFEMBRYOTRANSFER->Required) { ?>
			elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption(), $ivf_et_chart->DATEOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->errorMessage()) ?>");
		<?php if ($ivf_et_chart_add->DAYOFEMBRYOTRANSFER->Required) { ?>
			elm = this.getElements("x" + infix + "_DAYOFEMBRYOTRANSFER");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption(), $ivf_et_chart->DAYOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->NOOFEMBRYOSTHAWED->Required) { ?>
			elm = this.getElements("x" + infix + "_NOOFEMBRYOSTHAWED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->NOOFEMBRYOSTHAWED->caption(), $ivf_et_chart->NOOFEMBRYOSTHAWED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->NOOFEMBRYOSTRANSFERRED->Required) { ?>
			elm = this.getElements("x" + infix + "_NOOFEMBRYOSTRANSFERRED");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption(), $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->DAYOFEMBRYOS->Required) { ?>
			elm = this.getElements("x" + infix + "_DAYOFEMBRYOS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->DAYOFEMBRYOS->caption(), $ivf_et_chart->DAYOFEMBRYOS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->CRYOPRESERVEDEMBRYOS->Required) { ?>
			elm = this.getElements("x" + infix + "_CRYOPRESERVEDEMBRYOS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption(), $ivf_et_chart->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Code1->Required) { ?>
			elm = this.getElements("x" + infix + "_Code1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Code1->caption(), $ivf_et_chart->Code1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Code2->Required) { ?>
			elm = this.getElements("x" + infix + "_Code2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Code2->caption(), $ivf_et_chart->Code2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->CellStage1->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CellStage1->caption(), $ivf_et_chart->CellStage1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->CellStage2->Required) { ?>
			elm = this.getElements("x" + infix + "_CellStage2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->CellStage2->caption(), $ivf_et_chart->CellStage2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Grade1->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Grade1->caption(), $ivf_et_chart->Grade1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Grade2->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Grade2->caption(), $ivf_et_chart->Grade2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->ProcedureRecord->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureRecord");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ProcedureRecord->caption(), $ivf_et_chart->ProcedureRecord->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->Medicationsadvised->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicationsadvised");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->Medicationsadvised->caption(), $ivf_et_chart->Medicationsadvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->PostProcedureInstructions->Required) { ?>
			elm = this.getElements("x" + infix + "_PostProcedureInstructions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->PostProcedureInstructions->caption(), $ivf_et_chart->PostProcedureInstructions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->PregnancyTestingWithSerumBetaHcG->Required) { ?>
			elm = this.getElements("x" + infix + "_PregnancyTestingWithSerumBetaHcG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption(), $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->ReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ReviewDate->caption(), $ivf_et_chart->ReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_et_chart->ReviewDate->errorMessage()) ?>");
		<?php if ($ivf_et_chart_add->ReviewDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDoctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->ReviewDoctor->caption(), $ivf_et_chart->ReviewDoctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->TemplateProcedureRecord->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateProcedureRecord");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TemplateProcedureRecord->caption(), $ivf_et_chart->TemplateProcedureRecord->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->TemplateMedicationsadvised->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateMedicationsadvised");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TemplateMedicationsadvised->caption(), $ivf_et_chart->TemplateMedicationsadvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->TemplatePostProcedureInstructions->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplatePostProcedureInstructions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart->TemplatePostProcedureInstructions->caption(), $ivf_et_chart->TemplatePostProcedureInstructions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_et_chart_add->TidNo->Required) { ?>
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

// Form_CustomValidate event
fivf_et_chartadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_et_chartadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_et_chartadd.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_add->ARTCycle->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_add->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_add->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_add->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_add->PreTreatment->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_add->PreTreatment->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_add->Hysteroscopy->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_add->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_add->EndometrialScratching->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_add->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_add->TrialCannulation->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_add->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_add->CYCLETYPE->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_add->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_add->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_add->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_GCSF"] = <?php echo $ivf_et_chart_add->GCSF->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_add->GCSF->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_add->ActivatedPRP->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_add->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_ERA"] = <?php echo $ivf_et_chart_add->ERA->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_add->ERA->options(FALSE, TRUE)) ?>;
fivf_et_chartadd.lists["x_TemplateProcedureRecord"] = <?php echo $ivf_et_chart_add->TemplateProcedureRecord->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_TemplateProcedureRecord"].options = <?php echo JsonEncode($ivf_et_chart_add->TemplateProcedureRecord->lookupOptions()) ?>;
fivf_et_chartadd.lists["x_TemplateMedicationsadvised"] = <?php echo $ivf_et_chart_add->TemplateMedicationsadvised->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_TemplateMedicationsadvised"].options = <?php echo JsonEncode($ivf_et_chart_add->TemplateMedicationsadvised->lookupOptions()) ?>;
fivf_et_chartadd.lists["x_TemplatePostProcedureInstructions"] = <?php echo $ivf_et_chart_add->TemplatePostProcedureInstructions->Lookup->toClientList() ?>;
fivf_et_chartadd.lists["x_TemplatePostProcedureInstructions"].options = <?php echo JsonEncode($ivf_et_chart_add->TemplatePostProcedureInstructions->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_et_chart_add->showPageHeader(); ?>
<?php
$ivf_et_chart_add->showMessage();
?>
<form name="fivf_et_chartadd" id="fivf_et_chartadd" class="<?php echo $ivf_et_chart_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_et_chart_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_et_chart_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_et_chart_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_et_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_RIDNo" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->RIDNo->caption() ?><?php echo ($ivf_et_chart->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_RIDNo" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_RIDNo">
<input type="text" data-table="ivf_et_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->RIDNo->EditValue ?>"<?php echo $ivf_et_chart->RIDNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_et_chart_Name" for="x_Name" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Name" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Name->caption() ?><?php echo ($ivf_et_chart->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Name" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Name">
<input type="text" data-table="ivf_et_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Name->EditValue ?>"<?php echo $ivf_et_chart->Name->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_et_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ARTCycle" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ARTCycle->caption() ?><?php echo ($ivf_et_chart->ARTCycle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ARTCycle" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_et_chart->ARTCycle->displayValueSeparatorAttribute() ?>" id="x_ARTCycle" name="x_ARTCycle"<?php echo $ivf_et_chart->ARTCycle->editAttributes() ?>>
		<?php echo $ivf_et_chart->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_et_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Consultant" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Consultant->caption() ?><?php echo ($ivf_et_chart->Consultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Consultant" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Consultant">
<input type="text" data-table="ivf_et_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Consultant->EditValue ?>"<?php echo $ivf_et_chart->Consultant->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_et_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_InseminatinTechnique" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?><?php echo ($ivf_et_chart->InseminatinTechnique->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_InseminatinTechnique" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_et_chart->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x_InseminatinTechnique" name="x_InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->editAttributes() ?>>
		<?php echo $ivf_et_chart->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label id="elh_ivf_et_chart_IndicationForART" for="x_IndicationForART" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_IndicationForART" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->IndicationForART->caption() ?><?php echo ($ivf_et_chart->IndicationForART->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_IndicationForART" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_IndicationForART">
<input type="text" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->IndicationForART->EditValue ?>"<?php echo $ivf_et_chart->IndicationForART->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
	<div id="r_PreTreatment" class="form-group row">
		<label id="elh_ivf_et_chart_PreTreatment" for="x_PreTreatment" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PreTreatment" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->PreTreatment->caption() ?><?php echo ($ivf_et_chart->PreTreatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PreTreatment" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_PreTreatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_PreTreatment" data-value-separator="<?php echo $ivf_et_chart->PreTreatment->displayValueSeparatorAttribute() ?>" id="x_PreTreatment" name="x_PreTreatment"<?php echo $ivf_et_chart->PreTreatment->editAttributes() ?>>
		<?php echo $ivf_et_chart->PreTreatment->selectOptionListHtml("x_PreTreatment") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->PreTreatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<div id="r_Hysteroscopy" class="form-group row">
		<label id="elh_ivf_et_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Hysteroscopy" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Hysteroscopy->caption() ?><?php echo ($ivf_et_chart->Hysteroscopy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Hysteroscopy" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_et_chart->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x_Hysteroscopy" name="x_Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->editAttributes() ?>>
		<?php echo $ivf_et_chart->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->Hysteroscopy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<div id="r_EndometrialScratching" class="form-group row">
		<label id="elh_ivf_et_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_EndometrialScratching" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->EndometrialScratching->caption() ?><?php echo ($ivf_et_chart->EndometrialScratching->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_EndometrialScratching" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_et_chart->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x_EndometrialScratching" name="x_EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->editAttributes() ?>>
		<?php echo $ivf_et_chart->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->EndometrialScratching->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_et_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TrialCannulation" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->TrialCannulation->caption() ?><?php echo ($ivf_et_chart->TrialCannulation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TrialCannulation" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_et_chart->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x_TrialCannulation" name="x_TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->editAttributes() ?>>
		<?php echo $ivf_et_chart->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<div id="r_CYCLETYPE" class="form-group row">
		<label id="elh_ivf_et_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CYCLETYPE" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->CYCLETYPE->caption() ?><?php echo ($ivf_et_chart->CYCLETYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CYCLETYPE" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_et_chart->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x_CYCLETYPE" name="x_CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->editAttributes() ?>>
		<?php echo $ivf_et_chart->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->CYCLETYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<div id="r_HRTCYCLE" class="form-group row">
		<label id="elh_ivf_et_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_HRTCYCLE" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->HRTCYCLE->caption() ?><?php echo ($ivf_et_chart->HRTCYCLE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_HRTCYCLE" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_HRTCYCLE">
<input type="text" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->HRTCYCLE->EditValue ?>"<?php echo $ivf_et_chart->HRTCYCLE->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->HRTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<div id="r_OralEstrogenDosage" class="form-group row">
		<label id="elh_ivf_et_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?><?php echo ($ivf_et_chart->OralEstrogenDosage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_et_chart->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x_OralEstrogenDosage" name="x_OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->editAttributes() ?>>
		<?php echo $ivf_et_chart->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->OralEstrogenDosage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<div id="r_VaginalEstrogen" class="form-group row">
		<label id="elh_ivf_et_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_VaginalEstrogen" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?><?php echo ($ivf_et_chart->VaginalEstrogen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_VaginalEstrogen" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_VaginalEstrogen">
<input type="text" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->VaginalEstrogen->EditValue ?>"<?php echo $ivf_et_chart->VaginalEstrogen->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->VaginalEstrogen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
	<div id="r_GCSF" class="form-group row">
		<label id="elh_ivf_et_chart_GCSF" for="x_GCSF" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_GCSF" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->GCSF->caption() ?><?php echo ($ivf_et_chart->GCSF->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_GCSF" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_et_chart->GCSF->displayValueSeparatorAttribute() ?>" id="x_GCSF" name="x_GCSF"<?php echo $ivf_et_chart->GCSF->editAttributes() ?>>
		<?php echo $ivf_et_chart->GCSF->selectOptionListHtml("x_GCSF") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->GCSF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<div id="r_ActivatedPRP" class="form-group row">
		<label id="elh_ivf_et_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ActivatedPRP" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ActivatedPRP->caption() ?><?php echo ($ivf_et_chart->ActivatedPRP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ActivatedPRP" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_et_chart->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x_ActivatedPRP" name="x_ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->editAttributes() ?>>
		<?php echo $ivf_et_chart->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->ActivatedPRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
	<div id="r_ERA" class="form-group row">
		<label id="elh_ivf_et_chart_ERA" for="x_ERA" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ERA" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ERA->caption() ?><?php echo ($ivf_et_chart->ERA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ERA" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_et_chart->ERA->displayValueSeparatorAttribute() ?>" id="x_ERA" name="x_ERA"<?php echo $ivf_et_chart->ERA->editAttributes() ?>>
		<?php echo $ivf_et_chart->ERA->selectOptionListHtml("x_ERA") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_et_chart->ERA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
	<div id="r_UCLcm" class="form-group row">
		<label id="elh_ivf_et_chart_UCLcm" for="x_UCLcm" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_UCLcm" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->UCLcm->caption() ?><?php echo ($ivf_et_chart->UCLcm->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_UCLcm" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_UCLcm">
<input type="text" data-table="ivf_et_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->UCLcm->EditValue ?>"<?php echo $ivf_et_chart->UCLcm->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->UCLcm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<div id="r_DATEOFSTART" class="form-group row">
		<label id="elh_ivf_et_chart_DATEOFSTART" for="x_DATEOFSTART" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DATEOFSTART" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->DATEOFSTART->caption() ?><?php echo ($ivf_et_chart->DATEOFSTART->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFSTART" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_DATEOFSTART">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x_DATEOFSTART" id="x_DATEOFSTART" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFSTART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFSTART->EditValue ?>"<?php echo $ivf_et_chart->DATEOFSTART->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFSTART->ReadOnly && !$ivf_et_chart->DATEOFSTART->Disabled && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFSTART->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_et_chart->DATEOFSTART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<div id="r_DATEOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" for="x_DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?><?php echo ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x_DATEOFEMBRYOTRANSFER" id="x_DATEOFEMBRYOTRANSFER" placeholder="<?php echo HtmlEncode($ivf_et_chart->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->editAttributes() ?>>
<?php if (!$ivf_et_chart->DATEOFEMBRYOTRANSFER->ReadOnly && !$ivf_et_chart->DATEOFEMBRYOTRANSFER->Disabled && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($ivf_et_chart->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?><?php echo ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
		<label id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?><?php echo ($ivf_et_chart->NOOFEMBRYOSTHAWED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
		<label id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<div id="r_DAYOFEMBRYOS" class="form-group row">
		<label id="elh_ivf_et_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?><?php echo ($ivf_et_chart->DAYOFEMBRYOS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->DAYOFEMBRYOS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
		<label id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
	<div id="r_Code1" class="form-group row">
		<label id="elh_ivf_et_chart_Code1" for="x_Code1" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Code1" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Code1->caption() ?><?php echo ($ivf_et_chart->Code1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code1" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Code1">
<input type="text" data-table="ivf_et_chart" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code1->EditValue ?>"<?php echo $ivf_et_chart->Code1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Code1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
	<div id="r_Code2" class="form-group row">
		<label id="elh_ivf_et_chart_Code2" for="x_Code2" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Code2" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Code2->caption() ?><?php echo ($ivf_et_chart->Code2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code2" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Code2">
<input type="text" data-table="ivf_et_chart" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Code2->EditValue ?>"<?php echo $ivf_et_chart->Code2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Code2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
	<div id="r_CellStage1" class="form-group row">
		<label id="elh_ivf_et_chart_CellStage1" for="x_CellStage1" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CellStage1" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->CellStage1->caption() ?><?php echo ($ivf_et_chart->CellStage1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage1" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_CellStage1">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage1" name="x_CellStage1" id="x_CellStage1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage1->EditValue ?>"<?php echo $ivf_et_chart->CellStage1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->CellStage1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
	<div id="r_CellStage2" class="form-group row">
		<label id="elh_ivf_et_chart_CellStage2" for="x_CellStage2" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CellStage2" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->CellStage2->caption() ?><?php echo ($ivf_et_chart->CellStage2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage2" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_CellStage2">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage2" name="x_CellStage2" id="x_CellStage2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->CellStage2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->CellStage2->EditValue ?>"<?php echo $ivf_et_chart->CellStage2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->CellStage2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
	<div id="r_Grade1" class="form-group row">
		<label id="elh_ivf_et_chart_Grade1" for="x_Grade1" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Grade1" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Grade1->caption() ?><?php echo ($ivf_et_chart->Grade1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade1" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Grade1">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade1" name="x_Grade1" id="x_Grade1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade1->EditValue ?>"<?php echo $ivf_et_chart->Grade1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Grade1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
	<div id="r_Grade2" class="form-group row">
		<label id="elh_ivf_et_chart_Grade2" for="x_Grade2" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Grade2" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Grade2->caption() ?><?php echo ($ivf_et_chart->Grade2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade2" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Grade2">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade2" name="x_Grade2" id="x_Grade2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->Grade2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->Grade2->EditValue ?>"<?php echo $ivf_et_chart->Grade2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->Grade2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ProcedureRecord->Visible) { // ProcedureRecord ?>
	<div id="r_ProcedureRecord" class="form-group row">
		<label id="elh_ivf_et_chart_ProcedureRecord" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ProcedureRecord" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ProcedureRecord->caption() ?><?php echo ($ivf_et_chart->ProcedureRecord->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ProcedureRecord" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ProcedureRecord">
<?php AppendClass($ivf_et_chart->ProcedureRecord->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_ProcedureRecord" name="x_ProcedureRecord" id="x_ProcedureRecord" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart->ProcedureRecord->getPlaceHolder()) ?>"<?php echo $ivf_et_chart->ProcedureRecord->editAttributes() ?>><?php echo $ivf_et_chart->ProcedureRecord->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createEditor("fivf_et_chartadd", "x_ProcedureRecord", 35, 4, <?php echo ($ivf_et_chart->ProcedureRecord->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_et_chart->ProcedureRecord->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->Medicationsadvised->Visible) { // Medicationsadvised ?>
	<div id="r_Medicationsadvised" class="form-group row">
		<label id="elh_ivf_et_chart_Medicationsadvised" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Medicationsadvised" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->Medicationsadvised->caption() ?><?php echo ($ivf_et_chart->Medicationsadvised->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->Medicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Medicationsadvised" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_Medicationsadvised">
<?php AppendClass($ivf_et_chart->Medicationsadvised->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_Medicationsadvised" name="x_Medicationsadvised" id="x_Medicationsadvised" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart->Medicationsadvised->getPlaceHolder()) ?>"<?php echo $ivf_et_chart->Medicationsadvised->editAttributes() ?>><?php echo $ivf_et_chart->Medicationsadvised->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createEditor("fivf_et_chartadd", "x_Medicationsadvised", 35, 4, <?php echo ($ivf_et_chart->Medicationsadvised->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_et_chart->Medicationsadvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
	<div id="r_PostProcedureInstructions" class="form-group row">
		<label id="elh_ivf_et_chart_PostProcedureInstructions" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PostProcedureInstructions" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->PostProcedureInstructions->caption() ?><?php echo ($ivf_et_chart->PostProcedureInstructions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->PostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PostProcedureInstructions" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_PostProcedureInstructions">
<?php AppendClass($ivf_et_chart->PostProcedureInstructions->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_PostProcedureInstructions" name="x_PostProcedureInstructions" id="x_PostProcedureInstructions" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart->PostProcedureInstructions->getPlaceHolder()) ?>"<?php echo $ivf_et_chart->PostProcedureInstructions->editAttributes() ?>><?php echo $ivf_et_chart->PostProcedureInstructions->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createEditor("fivf_et_chartadd", "x_PostProcedureInstructions", 35, 4, <?php echo ($ivf_et_chart->PostProcedureInstructions->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_et_chart->PostProcedureInstructions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<div id="r_PregnancyTestingWithSerumBetaHcG" class="form-group row">
		<label id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" for="x_PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?><?php echo ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="text" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x_PregnancyTestingWithSerumBetaHcG" id="x_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
	<div id="r_ReviewDate" class="form-group row">
		<label id="elh_ivf_et_chart_ReviewDate" for="x_ReviewDate" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ReviewDate" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ReviewDate->caption() ?><?php echo ($ivf_et_chart->ReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDate" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ReviewDate">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDate->EditValue ?>"<?php echo $ivf_et_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_et_chart->ReviewDate->ReadOnly && !$ivf_et_chart->ReviewDate->Disabled && !isset($ivf_et_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_et_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_et_chartadd_js">
ew.createDateTimePicker("fivf_et_chartadd", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_et_chart->ReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<div id="r_ReviewDoctor" class="form-group row">
		<label id="elh_ivf_et_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ReviewDoctor" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->ReviewDoctor->caption() ?><?php echo ($ivf_et_chart->ReviewDoctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDoctor" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_ReviewDoctor">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_et_chart->ReviewDoctor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->ReviewDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
	<div id="r_TemplateProcedureRecord" class="form-group row">
		<label id="elh_ivf_et_chart_TemplateProcedureRecord" for="x_TemplateProcedureRecord" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplateProcedureRecord" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->TemplateProcedureRecord->caption() ?><?php echo ($ivf_et_chart->TemplateProcedureRecord->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->TemplateProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateProcedureRecord" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_TemplateProcedureRecord">
<?php $ivf_et_chart->TemplateProcedureRecord->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_et_chart->TemplateProcedureRecord->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplateProcedureRecord" data-value-separator="<?php echo $ivf_et_chart->TemplateProcedureRecord->displayValueSeparatorAttribute() ?>" id="x_TemplateProcedureRecord" name="x_TemplateProcedureRecord"<?php echo $ivf_et_chart->TemplateProcedureRecord->editAttributes() ?>>
		<?php echo $ivf_et_chart->TemplateProcedureRecord->selectOptionListHtml("x_TemplateProcedureRecord") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart->TemplateProcedureRecord->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedureRecord" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart->TemplateProcedureRecord->caption() ?>" data-title="<?php echo $ivf_et_chart->TemplateProcedureRecord->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedureRecord',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_et_chart->TemplateProcedureRecord->Lookup->getParamTag("p_x_TemplateProcedureRecord") ?>
</span>
</script>
<?php echo $ivf_et_chart->TemplateProcedureRecord->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
	<div id="r_TemplateMedicationsadvised" class="form-group row">
		<label id="elh_ivf_et_chart_TemplateMedicationsadvised" for="x_TemplateMedicationsadvised" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplateMedicationsadvised" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->TemplateMedicationsadvised->caption() ?><?php echo ($ivf_et_chart->TemplateMedicationsadvised->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->TemplateMedicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateMedicationsadvised" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_TemplateMedicationsadvised">
<?php $ivf_et_chart->TemplateMedicationsadvised->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_et_chart->TemplateMedicationsadvised->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplateMedicationsadvised" data-value-separator="<?php echo $ivf_et_chart->TemplateMedicationsadvised->displayValueSeparatorAttribute() ?>" id="x_TemplateMedicationsadvised" name="x_TemplateMedicationsadvised"<?php echo $ivf_et_chart->TemplateMedicationsadvised->editAttributes() ?>>
		<?php echo $ivf_et_chart->TemplateMedicationsadvised->selectOptionListHtml("x_TemplateMedicationsadvised") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart->TemplateMedicationsadvised->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedicationsadvised" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart->TemplateMedicationsadvised->caption() ?>" data-title="<?php echo $ivf_et_chart->TemplateMedicationsadvised->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedicationsadvised',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_et_chart->TemplateMedicationsadvised->Lookup->getParamTag("p_x_TemplateMedicationsadvised") ?>
</span>
</script>
<?php echo $ivf_et_chart->TemplateMedicationsadvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
	<div id="r_TemplatePostProcedureInstructions" class="form-group row">
		<label id="elh_ivf_et_chart_TemplatePostProcedureInstructions" for="x_TemplatePostProcedureInstructions" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplatePostProcedureInstructions" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->TemplatePostProcedureInstructions->caption() ?><?php echo ($ivf_et_chart->TemplatePostProcedureInstructions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplatePostProcedureInstructions" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplatePostProcedureInstructions" data-value-separator="<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->displayValueSeparatorAttribute() ?>" id="x_TemplatePostProcedureInstructions" name="x_TemplatePostProcedureInstructions"<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->editAttributes() ?>>
		<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->selectOptionListHtml("x_TemplatePostProcedureInstructions") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart->TemplatePostProcedureInstructions->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePostProcedureInstructions" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart->TemplatePostProcedureInstructions->caption() ?>" data-title="<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePostProcedureInstructions',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->Lookup->getParamTag("p_x_TemplatePostProcedureInstructions") ?>
</span>
</script>
<?php echo $ivf_et_chart->TemplatePostProcedureInstructions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_et_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_et_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TidNo" class="ivf_et_chartadd" type="text/html"><span><?php echo $ivf_et_chart->TidNo->caption() ?><?php echo ($ivf_et_chart->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_et_chart_add->RightColumnClass ?>"><div<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TidNo" class="ivf_et_chartadd" type="text/html">
<span id="el_ivf_et_chart_TidNo">
<input type="text" data-table="ivf_et_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart->TidNo->EditValue ?>"<?php echo $ivf_et_chart->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_et_chart->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_et_chartadd" class="ew-custom-template"></div>
<script id="tpm_ivf_et_chartadd" type="text/html">
<div id="ct_ivf_et_chart_add"><style>
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
<?php if (!$ivf_et_chart_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_et_chart_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_et_chart_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_et_chart->Rows) ?> };
ew.applyTemplate("tpd_ivf_et_chartadd", "tpm_ivf_et_chartadd", "ivf_et_chartadd", "<?php echo $ivf_et_chart->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_et_chartadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_et_chart_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_et_chart_add->terminate();
?>