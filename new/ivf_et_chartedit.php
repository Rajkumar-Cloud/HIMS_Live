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
$ivf_et_chart_edit = new ivf_et_chart_edit();

// Run the page
$ivf_et_chart_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_et_chartedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fivf_et_chartedit = currentForm = new ew.Form("fivf_et_chartedit", "edit");

	// Validate form
	fivf_et_chartedit.validate = function() {
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
			<?php if ($ivf_et_chart_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->id->caption(), $ivf_et_chart_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->RIDNo->caption(), $ivf_et_chart_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_et_chart_edit->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_et_chart_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Name->caption(), $ivf_et_chart_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ARTCycle->caption(), $ivf_et_chart_edit->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Consultant->caption(), $ivf_et_chart_edit->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->InseminatinTechnique->Required) { ?>
				elm = this.getElements("x" + infix + "_InseminatinTechnique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->InseminatinTechnique->caption(), $ivf_et_chart_edit->InseminatinTechnique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->IndicationForART->Required) { ?>
				elm = this.getElements("x" + infix + "_IndicationForART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->IndicationForART->caption(), $ivf_et_chart_edit->IndicationForART->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->PreTreatment->Required) { ?>
				elm = this.getElements("x" + infix + "_PreTreatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->PreTreatment->caption(), $ivf_et_chart_edit->PreTreatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Hysteroscopy->Required) { ?>
				elm = this.getElements("x" + infix + "_Hysteroscopy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Hysteroscopy->caption(), $ivf_et_chart_edit->Hysteroscopy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->EndometrialScratching->Required) { ?>
				elm = this.getElements("x" + infix + "_EndometrialScratching");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->EndometrialScratching->caption(), $ivf_et_chart_edit->EndometrialScratching->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->TrialCannulation->Required) { ?>
				elm = this.getElements("x" + infix + "_TrialCannulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->TrialCannulation->caption(), $ivf_et_chart_edit->TrialCannulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->CYCLETYPE->Required) { ?>
				elm = this.getElements("x" + infix + "_CYCLETYPE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->CYCLETYPE->caption(), $ivf_et_chart_edit->CYCLETYPE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->HRTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_HRTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->HRTCYCLE->caption(), $ivf_et_chart_edit->HRTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->OralEstrogenDosage->Required) { ?>
				elm = this.getElements("x" + infix + "_OralEstrogenDosage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->OralEstrogenDosage->caption(), $ivf_et_chart_edit->OralEstrogenDosage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->VaginalEstrogen->Required) { ?>
				elm = this.getElements("x" + infix + "_VaginalEstrogen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->VaginalEstrogen->caption(), $ivf_et_chart_edit->VaginalEstrogen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->GCSF->Required) { ?>
				elm = this.getElements("x" + infix + "_GCSF");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->GCSF->caption(), $ivf_et_chart_edit->GCSF->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->ActivatedPRP->Required) { ?>
				elm = this.getElements("x" + infix + "_ActivatedPRP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ActivatedPRP->caption(), $ivf_et_chart_edit->ActivatedPRP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->ERA->Required) { ?>
				elm = this.getElements("x" + infix + "_ERA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ERA->caption(), $ivf_et_chart_edit->ERA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->UCLcm->Required) { ?>
				elm = this.getElements("x" + infix + "_UCLcm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->UCLcm->caption(), $ivf_et_chart_edit->UCLcm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->DATEOFSTART->Required) { ?>
				elm = this.getElements("x" + infix + "_DATEOFSTART");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->DATEOFSTART->caption(), $ivf_et_chart_edit->DATEOFSTART->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DATEOFSTART");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_et_chart_edit->DATEOFSTART->errorMessage()) ?>");
			<?php if ($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->caption(), $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DATEOFEMBRYOTRANSFER");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->errorMessage()) ?>");
			<?php if ($ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOTRANSFER");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->caption(), $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->NOOFEMBRYOSTHAWED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTHAWED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->caption(), $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->Required) { ?>
				elm = this.getElements("x" + infix + "_NOOFEMBRYOSTRANSFERRED");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->caption(), $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->DAYOFEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_DAYOFEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->DAYOFEMBRYOS->caption(), $ivf_et_chart_edit->DAYOFEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->Required) { ?>
				elm = this.getElements("x" + infix + "_CRYOPRESERVEDEMBRYOS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->caption(), $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Code1->Required) { ?>
				elm = this.getElements("x" + infix + "_Code1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Code1->caption(), $ivf_et_chart_edit->Code1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Code2->Required) { ?>
				elm = this.getElements("x" + infix + "_Code2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Code2->caption(), $ivf_et_chart_edit->Code2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->CellStage1->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->CellStage1->caption(), $ivf_et_chart_edit->CellStage1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->CellStage2->Required) { ?>
				elm = this.getElements("x" + infix + "_CellStage2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->CellStage2->caption(), $ivf_et_chart_edit->CellStage2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Grade1->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Grade1->caption(), $ivf_et_chart_edit->Grade1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Grade2->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Grade2->caption(), $ivf_et_chart_edit->Grade2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->ProcedureRecord->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureRecord");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ProcedureRecord->caption(), $ivf_et_chart_edit->ProcedureRecord->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->Medicationsadvised->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicationsadvised");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->Medicationsadvised->caption(), $ivf_et_chart_edit->Medicationsadvised->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->PostProcedureInstructions->Required) { ?>
				elm = this.getElements("x" + infix + "_PostProcedureInstructions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->PostProcedureInstructions->caption(), $ivf_et_chart_edit->PostProcedureInstructions->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->Required) { ?>
				elm = this.getElements("x" + infix + "_PregnancyTestingWithSerumBetaHcG");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->caption(), $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->ReviewDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReviewDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ReviewDate->caption(), $ivf_et_chart_edit->ReviewDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReviewDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_et_chart_edit->ReviewDate->errorMessage()) ?>");
			<?php if ($ivf_et_chart_edit->ReviewDoctor->Required) { ?>
				elm = this.getElements("x" + infix + "_ReviewDoctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->ReviewDoctor->caption(), $ivf_et_chart_edit->ReviewDoctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->TemplateProcedureRecord->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateProcedureRecord");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->TemplateProcedureRecord->caption(), $ivf_et_chart_edit->TemplateProcedureRecord->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->TemplateMedicationsadvised->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateMedicationsadvised");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->TemplateMedicationsadvised->caption(), $ivf_et_chart_edit->TemplateMedicationsadvised->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->TemplatePostProcedureInstructions->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplatePostProcedureInstructions");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->TemplatePostProcedureInstructions->caption(), $ivf_et_chart_edit->TemplatePostProcedureInstructions->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_et_chart_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_et_chart_edit->TidNo->caption(), $ivf_et_chart_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_et_chart_edit->TidNo->errorMessage()) ?>");

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
	fivf_et_chartedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_et_chartedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_et_chartedit.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_edit->ARTCycle->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_edit->ARTCycle->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_edit->InseminatinTechnique->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_edit->InseminatinTechnique->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_edit->PreTreatment->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_edit->PreTreatment->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_edit->Hysteroscopy->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_edit->Hysteroscopy->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_edit->EndometrialScratching->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_edit->EndometrialScratching->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_edit->TrialCannulation->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_edit->TrialCannulation->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_edit->CYCLETYPE->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_edit->CYCLETYPE->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_edit->OralEstrogenDosage->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_edit->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_GCSF"] = <?php echo $ivf_et_chart_edit->GCSF->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_edit->GCSF->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_edit->ActivatedPRP->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_edit->ActivatedPRP->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_ERA"] = <?php echo $ivf_et_chart_edit->ERA->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_edit->ERA->options(FALSE, TRUE)) ?>;
	fivf_et_chartedit.lists["x_TemplateProcedureRecord"] = <?php echo $ivf_et_chart_edit->TemplateProcedureRecord->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_TemplateProcedureRecord"].options = <?php echo JsonEncode($ivf_et_chart_edit->TemplateProcedureRecord->lookupOptions()) ?>;
	fivf_et_chartedit.lists["x_TemplateMedicationsadvised"] = <?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_TemplateMedicationsadvised"].options = <?php echo JsonEncode($ivf_et_chart_edit->TemplateMedicationsadvised->lookupOptions()) ?>;
	fivf_et_chartedit.lists["x_TemplatePostProcedureInstructions"] = <?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->Lookup->toClientList($ivf_et_chart_edit) ?>;
	fivf_et_chartedit.lists["x_TemplatePostProcedureInstructions"].options = <?php echo JsonEncode($ivf_et_chart_edit->TemplatePostProcedureInstructions->lookupOptions()) ?>;
	loadjs.done("fivf_et_chartedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_et_chart_edit->showPageHeader(); ?>
<?php
$ivf_et_chart_edit->showMessage();
?>
<form name="fivf_et_chartedit" id="fivf_et_chartedit" class="<?php echo $ivf_et_chart_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_et_chart_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_et_chart_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_et_chart_id" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_id" type="text/html"><?php echo $ivf_et_chart_edit->id->caption() ?><?php echo $ivf_et_chart_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->id->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_id" type="text/html"><span id="el_ivf_et_chart_id">
<span<?php echo $ivf_et_chart_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_et_chart_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="ivf_et_chart" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_et_chart_edit->id->CurrentValue) ?>">
<?php echo $ivf_et_chart_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_et_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_RIDNo" type="text/html"><?php echo $ivf_et_chart_edit->RIDNo->caption() ?><?php echo $ivf_et_chart_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_RIDNo" type="text/html"><span id="el_ivf_et_chart_RIDNo">
<input type="text" data-table="ivf_et_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->RIDNo->EditValue ?>"<?php echo $ivf_et_chart_edit->RIDNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_et_chart_Name" for="x_Name" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Name" type="text/html"><?php echo $ivf_et_chart_edit->Name->caption() ?><?php echo $ivf_et_chart_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Name->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Name" type="text/html"><span id="el_ivf_et_chart_Name">
<input type="text" data-table="ivf_et_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Name->EditValue ?>"<?php echo $ivf_et_chart_edit->Name->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_et_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ARTCycle" type="text/html"><?php echo $ivf_et_chart_edit->ARTCycle->caption() ?><?php echo $ivf_et_chart_edit->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ARTCycle" type="text/html"><span id="el_ivf_et_chart_ARTCycle">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ARTCycle" data-value-separator="<?php echo $ivf_et_chart_edit->ARTCycle->displayValueSeparatorAttribute() ?>" id="x_ARTCycle" name="x_ARTCycle"<?php echo $ivf_et_chart_edit->ARTCycle->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_et_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Consultant" type="text/html"><?php echo $ivf_et_chart_edit->Consultant->caption() ?><?php echo $ivf_et_chart_edit->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Consultant" type="text/html"><span id="el_ivf_et_chart_Consultant">
<input type="text" data-table="ivf_et_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Consultant->EditValue ?>"<?php echo $ivf_et_chart_edit->Consultant->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<div id="r_InseminatinTechnique" class="form-group row">
		<label id="elh_ivf_et_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_InseminatinTechnique" type="text/html"><?php echo $ivf_et_chart_edit->InseminatinTechnique->caption() ?><?php echo $ivf_et_chart_edit->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->InseminatinTechnique->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_InseminatinTechnique" type="text/html"><span id="el_ivf_et_chart_InseminatinTechnique">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" data-value-separator="<?php echo $ivf_et_chart_edit->InseminatinTechnique->displayValueSeparatorAttribute() ?>" id="x_InseminatinTechnique" name="x_InseminatinTechnique"<?php echo $ivf_et_chart_edit->InseminatinTechnique->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->InseminatinTechnique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->IndicationForART->Visible) { // IndicationForART ?>
	<div id="r_IndicationForART" class="form-group row">
		<label id="elh_ivf_et_chart_IndicationForART" for="x_IndicationForART" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_IndicationForART" type="text/html"><?php echo $ivf_et_chart_edit->IndicationForART->caption() ?><?php echo $ivf_et_chart_edit->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->IndicationForART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_IndicationForART" type="text/html"><span id="el_ivf_et_chart_IndicationForART">
<input type="text" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->IndicationForART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->IndicationForART->EditValue ?>"<?php echo $ivf_et_chart_edit->IndicationForART->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->IndicationForART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->PreTreatment->Visible) { // PreTreatment ?>
	<div id="r_PreTreatment" class="form-group row">
		<label id="elh_ivf_et_chart_PreTreatment" for="x_PreTreatment" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PreTreatment" type="text/html"><?php echo $ivf_et_chart_edit->PreTreatment->caption() ?><?php echo $ivf_et_chart_edit->PreTreatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->PreTreatment->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PreTreatment" type="text/html"><span id="el_ivf_et_chart_PreTreatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_PreTreatment" data-value-separator="<?php echo $ivf_et_chart_edit->PreTreatment->displayValueSeparatorAttribute() ?>" id="x_PreTreatment" name="x_PreTreatment"<?php echo $ivf_et_chart_edit->PreTreatment->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->PreTreatment->selectOptionListHtml("x_PreTreatment") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->PreTreatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<div id="r_Hysteroscopy" class="form-group row">
		<label id="elh_ivf_et_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Hysteroscopy" type="text/html"><?php echo $ivf_et_chart_edit->Hysteroscopy->caption() ?><?php echo $ivf_et_chart_edit->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Hysteroscopy->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Hysteroscopy" type="text/html"><span id="el_ivf_et_chart_Hysteroscopy">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_Hysteroscopy" data-value-separator="<?php echo $ivf_et_chart_edit->Hysteroscopy->displayValueSeparatorAttribute() ?>" id="x_Hysteroscopy" name="x_Hysteroscopy"<?php echo $ivf_et_chart_edit->Hysteroscopy->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->Hysteroscopy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<div id="r_EndometrialScratching" class="form-group row">
		<label id="elh_ivf_et_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_EndometrialScratching" type="text/html"><?php echo $ivf_et_chart_edit->EndometrialScratching->caption() ?><?php echo $ivf_et_chart_edit->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->EndometrialScratching->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_EndometrialScratching" type="text/html"><span id="el_ivf_et_chart_EndometrialScratching">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_EndometrialScratching" data-value-separator="<?php echo $ivf_et_chart_edit->EndometrialScratching->displayValueSeparatorAttribute() ?>" id="x_EndometrialScratching" name="x_EndometrialScratching"<?php echo $ivf_et_chart_edit->EndometrialScratching->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->EndometrialScratching->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_et_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TrialCannulation" type="text/html"><?php echo $ivf_et_chart_edit->TrialCannulation->caption() ?><?php echo $ivf_et_chart_edit->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TrialCannulation" type="text/html"><span id="el_ivf_et_chart_TrialCannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TrialCannulation" data-value-separator="<?php echo $ivf_et_chart_edit->TrialCannulation->displayValueSeparatorAttribute() ?>" id="x_TrialCannulation" name="x_TrialCannulation"<?php echo $ivf_et_chart_edit->TrialCannulation->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<div id="r_CYCLETYPE" class="form-group row">
		<label id="elh_ivf_et_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CYCLETYPE" type="text/html"><?php echo $ivf_et_chart_edit->CYCLETYPE->caption() ?><?php echo $ivf_et_chart_edit->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->CYCLETYPE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CYCLETYPE" type="text/html"><span id="el_ivf_et_chart_CYCLETYPE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_CYCLETYPE" data-value-separator="<?php echo $ivf_et_chart_edit->CYCLETYPE->displayValueSeparatorAttribute() ?>" id="x_CYCLETYPE" name="x_CYCLETYPE"<?php echo $ivf_et_chart_edit->CYCLETYPE->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->CYCLETYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<div id="r_HRTCYCLE" class="form-group row">
		<label id="elh_ivf_et_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_HRTCYCLE" type="text/html"><?php echo $ivf_et_chart_edit->HRTCYCLE->caption() ?><?php echo $ivf_et_chart_edit->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->HRTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_HRTCYCLE" type="text/html"><span id="el_ivf_et_chart_HRTCYCLE">
<input type="text" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->HRTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->HRTCYCLE->EditValue ?>"<?php echo $ivf_et_chart_edit->HRTCYCLE->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->HRTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<div id="r_OralEstrogenDosage" class="form-group row">
		<label id="elh_ivf_et_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_OralEstrogenDosage" type="text/html"><?php echo $ivf_et_chart_edit->OralEstrogenDosage->caption() ?><?php echo $ivf_et_chart_edit->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->OralEstrogenDosage->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_OralEstrogenDosage" type="text/html"><span id="el_ivf_et_chart_OralEstrogenDosage">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" data-value-separator="<?php echo $ivf_et_chart_edit->OralEstrogenDosage->displayValueSeparatorAttribute() ?>" id="x_OralEstrogenDosage" name="x_OralEstrogenDosage"<?php echo $ivf_et_chart_edit->OralEstrogenDosage->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->OralEstrogenDosage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<div id="r_VaginalEstrogen" class="form-group row">
		<label id="elh_ivf_et_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_VaginalEstrogen" type="text/html"><?php echo $ivf_et_chart_edit->VaginalEstrogen->caption() ?><?php echo $ivf_et_chart_edit->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->VaginalEstrogen->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_VaginalEstrogen" type="text/html"><span id="el_ivf_et_chart_VaginalEstrogen">
<input type="text" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->VaginalEstrogen->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->VaginalEstrogen->EditValue ?>"<?php echo $ivf_et_chart_edit->VaginalEstrogen->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->VaginalEstrogen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->GCSF->Visible) { // GCSF ?>
	<div id="r_GCSF" class="form-group row">
		<label id="elh_ivf_et_chart_GCSF" for="x_GCSF" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_GCSF" type="text/html"><?php echo $ivf_et_chart_edit->GCSF->caption() ?><?php echo $ivf_et_chart_edit->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->GCSF->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_GCSF" type="text/html"><span id="el_ivf_et_chart_GCSF">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_GCSF" data-value-separator="<?php echo $ivf_et_chart_edit->GCSF->displayValueSeparatorAttribute() ?>" id="x_GCSF" name="x_GCSF"<?php echo $ivf_et_chart_edit->GCSF->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->GCSF->selectOptionListHtml("x_GCSF") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->GCSF->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<div id="r_ActivatedPRP" class="form-group row">
		<label id="elh_ivf_et_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ActivatedPRP" type="text/html"><?php echo $ivf_et_chart_edit->ActivatedPRP->caption() ?><?php echo $ivf_et_chart_edit->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ActivatedPRP->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ActivatedPRP" type="text/html"><span id="el_ivf_et_chart_ActivatedPRP">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ActivatedPRP" data-value-separator="<?php echo $ivf_et_chart_edit->ActivatedPRP->displayValueSeparatorAttribute() ?>" id="x_ActivatedPRP" name="x_ActivatedPRP"<?php echo $ivf_et_chart_edit->ActivatedPRP->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->ActivatedPRP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ERA->Visible) { // ERA ?>
	<div id="r_ERA" class="form-group row">
		<label id="elh_ivf_et_chart_ERA" for="x_ERA" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ERA" type="text/html"><?php echo $ivf_et_chart_edit->ERA->caption() ?><?php echo $ivf_et_chart_edit->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ERA->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ERA" type="text/html"><span id="el_ivf_et_chart_ERA">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_ERA" data-value-separator="<?php echo $ivf_et_chart_edit->ERA->displayValueSeparatorAttribute() ?>" id="x_ERA" name="x_ERA"<?php echo $ivf_et_chart_edit->ERA->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->ERA->selectOptionListHtml("x_ERA") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_et_chart_edit->ERA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->UCLcm->Visible) { // UCLcm ?>
	<div id="r_UCLcm" class="form-group row">
		<label id="elh_ivf_et_chart_UCLcm" for="x_UCLcm" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_UCLcm" type="text/html"><?php echo $ivf_et_chart_edit->UCLcm->caption() ?><?php echo $ivf_et_chart_edit->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->UCLcm->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_UCLcm" type="text/html"><span id="el_ivf_et_chart_UCLcm">
<input type="text" data-table="ivf_et_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->UCLcm->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->UCLcm->EditValue ?>"<?php echo $ivf_et_chart_edit->UCLcm->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->UCLcm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<div id="r_DATEOFSTART" class="form-group row">
		<label id="elh_ivf_et_chart_DATEOFSTART" for="x_DATEOFSTART" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DATEOFSTART" type="text/html"><?php echo $ivf_et_chart_edit->DATEOFSTART->caption() ?><?php echo $ivf_et_chart_edit->DATEOFSTART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->DATEOFSTART->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFSTART" type="text/html"><span id="el_ivf_et_chart_DATEOFSTART">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x_DATEOFSTART" id="x_DATEOFSTART" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->DATEOFSTART->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->DATEOFSTART->EditValue ?>"<?php echo $ivf_et_chart_edit->DATEOFSTART->editAttributes() ?>>
<?php if (!$ivf_et_chart_edit->DATEOFSTART->ReadOnly && !$ivf_et_chart_edit->DATEOFSTART->Disabled && !isset($ivf_et_chart_edit->DATEOFSTART->EditAttrs["readonly"]) && !isset($ivf_et_chart_edit->DATEOFSTART->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_et_chartedit", "x_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_et_chart_edit->DATEOFSTART->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<div id="r_DATEOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" for="x_DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x_DATEOFEMBRYOTRANSFER" id="x_DATEOFEMBRYOTRANSFER" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->editAttributes() ?>>
<?php if (!$ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->ReadOnly && !$ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->Disabled && !isset($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_et_chartedit", "x_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_et_chart_edit->DATEOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
		<label id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER" type="text/html"><?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER" type="text/html"><span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->EditValue ?>"<?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->DAYOFEMBRYOTRANSFER->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
		<label id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED" type="text/html"><?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->caption() ?><?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED" type="text/html"><span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->EditValue ?>"<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTHAWED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
		<label id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" type="text/html"><span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="text" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->NOOFEMBRYOSTRANSFERRED->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<div id="r_DAYOFEMBRYOS" class="form-group row">
		<label id="elh_ivf_et_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_DAYOFEMBRYOS" type="text/html"><?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->caption() ?><?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_DAYOFEMBRYOS" type="text/html"><span id="el_ivf_et_chart_DAYOFEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->DAYOFEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
		<label id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS" type="text/html"><span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="text" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->CRYOPRESERVEDEMBRYOS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Code1->Visible) { // Code1 ?>
	<div id="r_Code1" class="form-group row">
		<label id="elh_ivf_et_chart_Code1" for="x_Code1" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Code1" type="text/html"><?php echo $ivf_et_chart_edit->Code1->caption() ?><?php echo $ivf_et_chart_edit->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Code1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code1" type="text/html"><span id="el_ivf_et_chart_Code1">
<input type="text" data-table="ivf_et_chart" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Code1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Code1->EditValue ?>"<?php echo $ivf_et_chart_edit->Code1->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Code1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Code2->Visible) { // Code2 ?>
	<div id="r_Code2" class="form-group row">
		<label id="elh_ivf_et_chart_Code2" for="x_Code2" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Code2" type="text/html"><?php echo $ivf_et_chart_edit->Code2->caption() ?><?php echo $ivf_et_chart_edit->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Code2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Code2" type="text/html"><span id="el_ivf_et_chart_Code2">
<input type="text" data-table="ivf_et_chart" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Code2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Code2->EditValue ?>"<?php echo $ivf_et_chart_edit->Code2->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Code2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->CellStage1->Visible) { // CellStage1 ?>
	<div id="r_CellStage1" class="form-group row">
		<label id="elh_ivf_et_chart_CellStage1" for="x_CellStage1" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CellStage1" type="text/html"><?php echo $ivf_et_chart_edit->CellStage1->caption() ?><?php echo $ivf_et_chart_edit->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->CellStage1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage1" type="text/html"><span id="el_ivf_et_chart_CellStage1">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage1" name="x_CellStage1" id="x_CellStage1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->CellStage1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->CellStage1->EditValue ?>"<?php echo $ivf_et_chart_edit->CellStage1->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->CellStage1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->CellStage2->Visible) { // CellStage2 ?>
	<div id="r_CellStage2" class="form-group row">
		<label id="elh_ivf_et_chart_CellStage2" for="x_CellStage2" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_CellStage2" type="text/html"><?php echo $ivf_et_chart_edit->CellStage2->caption() ?><?php echo $ivf_et_chart_edit->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->CellStage2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_CellStage2" type="text/html"><span id="el_ivf_et_chart_CellStage2">
<input type="text" data-table="ivf_et_chart" data-field="x_CellStage2" name="x_CellStage2" id="x_CellStage2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->CellStage2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->CellStage2->EditValue ?>"<?php echo $ivf_et_chart_edit->CellStage2->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->CellStage2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Grade1->Visible) { // Grade1 ?>
	<div id="r_Grade1" class="form-group row">
		<label id="elh_ivf_et_chart_Grade1" for="x_Grade1" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Grade1" type="text/html"><?php echo $ivf_et_chart_edit->Grade1->caption() ?><?php echo $ivf_et_chart_edit->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Grade1->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade1" type="text/html"><span id="el_ivf_et_chart_Grade1">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade1" name="x_Grade1" id="x_Grade1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Grade1->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Grade1->EditValue ?>"<?php echo $ivf_et_chart_edit->Grade1->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Grade1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Grade2->Visible) { // Grade2 ?>
	<div id="r_Grade2" class="form-group row">
		<label id="elh_ivf_et_chart_Grade2" for="x_Grade2" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Grade2" type="text/html"><?php echo $ivf_et_chart_edit->Grade2->caption() ?><?php echo $ivf_et_chart_edit->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Grade2->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Grade2" type="text/html"><span id="el_ivf_et_chart_Grade2">
<input type="text" data-table="ivf_et_chart" data-field="x_Grade2" name="x_Grade2" id="x_Grade2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Grade2->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->Grade2->EditValue ?>"<?php echo $ivf_et_chart_edit->Grade2->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->Grade2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ProcedureRecord->Visible) { // ProcedureRecord ?>
	<div id="r_ProcedureRecord" class="form-group row">
		<label id="elh_ivf_et_chart_ProcedureRecord" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ProcedureRecord" type="text/html"><?php echo $ivf_et_chart_edit->ProcedureRecord->caption() ?><?php echo $ivf_et_chart_edit->ProcedureRecord->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ProcedureRecord" type="text/html"><span id="el_ivf_et_chart_ProcedureRecord">
<?php $ivf_et_chart_edit->ProcedureRecord->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_ProcedureRecord" name="x_ProcedureRecord" id="x_ProcedureRecord" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->ProcedureRecord->getPlaceHolder()) ?>"<?php echo $ivf_et_chart_edit->ProcedureRecord->editAttributes() ?>><?php echo $ivf_et_chart_edit->ProcedureRecord->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "editor"], function() {
	ew.createEditor("fivf_et_chartedit", "x_ProcedureRecord", 35, 4, <?php echo $ivf_et_chart_edit->ProcedureRecord->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_et_chart_edit->ProcedureRecord->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->Medicationsadvised->Visible) { // Medicationsadvised ?>
	<div id="r_Medicationsadvised" class="form-group row">
		<label id="elh_ivf_et_chart_Medicationsadvised" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_Medicationsadvised" type="text/html"><?php echo $ivf_et_chart_edit->Medicationsadvised->caption() ?><?php echo $ivf_et_chart_edit->Medicationsadvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->Medicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_Medicationsadvised" type="text/html"><span id="el_ivf_et_chart_Medicationsadvised">
<?php $ivf_et_chart_edit->Medicationsadvised->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_Medicationsadvised" name="x_Medicationsadvised" id="x_Medicationsadvised" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->Medicationsadvised->getPlaceHolder()) ?>"<?php echo $ivf_et_chart_edit->Medicationsadvised->editAttributes() ?>><?php echo $ivf_et_chart_edit->Medicationsadvised->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "editor"], function() {
	ew.createEditor("fivf_et_chartedit", "x_Medicationsadvised", 35, 4, <?php echo $ivf_et_chart_edit->Medicationsadvised->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_et_chart_edit->Medicationsadvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
	<div id="r_PostProcedureInstructions" class="form-group row">
		<label id="elh_ivf_et_chart_PostProcedureInstructions" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PostProcedureInstructions" type="text/html"><?php echo $ivf_et_chart_edit->PostProcedureInstructions->caption() ?><?php echo $ivf_et_chart_edit->PostProcedureInstructions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->PostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PostProcedureInstructions" type="text/html"><span id="el_ivf_et_chart_PostProcedureInstructions">
<?php $ivf_et_chart_edit->PostProcedureInstructions->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_PostProcedureInstructions" name="x_PostProcedureInstructions" id="x_PostProcedureInstructions" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->PostProcedureInstructions->getPlaceHolder()) ?>"<?php echo $ivf_et_chart_edit->PostProcedureInstructions->editAttributes() ?>><?php echo $ivf_et_chart_edit->PostProcedureInstructions->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "editor"], function() {
	ew.createEditor("fivf_et_chartedit", "x_PostProcedureInstructions", 35, 4, <?php echo $ivf_et_chart_edit->PostProcedureInstructions->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_et_chart_edit->PostProcedureInstructions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<div id="r_PregnancyTestingWithSerumBetaHcG" class="form-group row">
		<label id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" for="x_PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" type="text/html"><?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->caption() ?><?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" type="text/html"><span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="text" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x_PregnancyTestingWithSerumBetaHcG" id="x_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->PregnancyTestingWithSerumBetaHcG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ReviewDate->Visible) { // ReviewDate ?>
	<div id="r_ReviewDate" class="form-group row">
		<label id="elh_ivf_et_chart_ReviewDate" for="x_ReviewDate" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ReviewDate" type="text/html"><?php echo $ivf_et_chart_edit->ReviewDate->caption() ?><?php echo $ivf_et_chart_edit->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDate" type="text/html"><span id="el_ivf_et_chart_ReviewDate">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->ReviewDate->EditValue ?>"<?php echo $ivf_et_chart_edit->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_et_chart_edit->ReviewDate->ReadOnly && !$ivf_et_chart_edit->ReviewDate->Disabled && !isset($ivf_et_chart_edit->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_et_chart_edit->ReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_et_chartedit_js">
loadjs.ready(["fivf_et_chartedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_et_chartedit", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_et_chart_edit->ReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<div id="r_ReviewDoctor" class="form-group row">
		<label id="elh_ivf_et_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_ReviewDoctor" type="text/html"><?php echo $ivf_et_chart_edit->ReviewDoctor->caption() ?><?php echo $ivf_et_chart_edit->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_ReviewDoctor" type="text/html"><span id="el_ivf_et_chart_ReviewDoctor">
<input type="text" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->ReviewDoctor->EditValue ?>"<?php echo $ivf_et_chart_edit->ReviewDoctor->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->ReviewDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
	<div id="r_TemplateProcedureRecord" class="form-group row">
		<label id="elh_ivf_et_chart_TemplateProcedureRecord" for="x_TemplateProcedureRecord" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplateProcedureRecord" type="text/html"><?php echo $ivf_et_chart_edit->TemplateProcedureRecord->caption() ?><?php echo $ivf_et_chart_edit->TemplateProcedureRecord->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->TemplateProcedureRecord->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateProcedureRecord" type="text/html"><span id="el_ivf_et_chart_TemplateProcedureRecord">
<?php $ivf_et_chart_edit->TemplateProcedureRecord->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplateProcedureRecord" data-value-separator="<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->displayValueSeparatorAttribute() ?>" id="x_TemplateProcedureRecord" name="x_TemplateProcedureRecord"<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->selectOptionListHtml("x_TemplateProcedureRecord") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart_edit->TemplateProcedureRecord->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedureRecord" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart_edit->TemplateProcedureRecord->caption() ?>" data-title="<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedureRecord',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->Lookup->getParamTag($ivf_et_chart_edit, "p_x_TemplateProcedureRecord") ?>
</span></script>
<?php echo $ivf_et_chart_edit->TemplateProcedureRecord->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
	<div id="r_TemplateMedicationsadvised" class="form-group row">
		<label id="elh_ivf_et_chart_TemplateMedicationsadvised" for="x_TemplateMedicationsadvised" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplateMedicationsadvised" type="text/html"><?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->caption() ?><?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplateMedicationsadvised" type="text/html"><span id="el_ivf_et_chart_TemplateMedicationsadvised">
<?php $ivf_et_chart_edit->TemplateMedicationsadvised->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplateMedicationsadvised" data-value-separator="<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->displayValueSeparatorAttribute() ?>" id="x_TemplateMedicationsadvised" name="x_TemplateMedicationsadvised"<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->selectOptionListHtml("x_TemplateMedicationsadvised") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart_edit->TemplateMedicationsadvised->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedicationsadvised" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart_edit->TemplateMedicationsadvised->caption() ?>" data-title="<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedicationsadvised',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->Lookup->getParamTag($ivf_et_chart_edit, "p_x_TemplateMedicationsadvised") ?>
</span></script>
<?php echo $ivf_et_chart_edit->TemplateMedicationsadvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
	<div id="r_TemplatePostProcedureInstructions" class="form-group row">
		<label id="elh_ivf_et_chart_TemplatePostProcedureInstructions" for="x_TemplatePostProcedureInstructions" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TemplatePostProcedureInstructions" type="text/html"><?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->caption() ?><?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TemplatePostProcedureInstructions" type="text/html"><span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_et_chart" data-field="x_TemplatePostProcedureInstructions" data-value-separator="<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->displayValueSeparatorAttribute() ?>" id="x_TemplatePostProcedureInstructions" name="x_TemplatePostProcedureInstructions"<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->editAttributes() ?>>
			<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->selectOptionListHtml("x_TemplatePostProcedureInstructions") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_et_chart_edit->TemplatePostProcedureInstructions->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePostProcedureInstructions" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_et_chart_edit->TemplatePostProcedureInstructions->caption() ?>" data-title="<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePostProcedureInstructions',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->Lookup->getParamTag($ivf_et_chart_edit, "p_x_TemplatePostProcedureInstructions") ?>
</span></script>
<?php echo $ivf_et_chart_edit->TemplatePostProcedureInstructions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_et_chart_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_et_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_et_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_et_chart_TidNo" type="text/html"><?php echo $ivf_et_chart_edit->TidNo->caption() ?><?php echo $ivf_et_chart_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_et_chart_edit->RightColumnClass ?>"><div <?php echo $ivf_et_chart_edit->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_et_chart_TidNo" type="text/html"><span id="el_ivf_et_chart_TidNo">
<input type="text" data-table="ivf_et_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_et_chart_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_et_chart_edit->TidNo->EditValue ?>"<?php echo $ivf_et_chart_edit->TidNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_et_chart_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_et_chartedit" class="ew-custom-template"></div>
<script id="tpm_ivf_et_chartedit" type="text/html">
<div id="ct_ivf_et_chart_edit"><style>
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
{{include tmpl=~getTemplate("#tpx_RIDNO")/}}
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ARTCycle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Consultant")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_InseminatinTechnique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_InseminatinTechnique")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_IndicationForART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_IndicationForART")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PreTreatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PreTreatment")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Hysteroscopy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Hysteroscopy")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_EndometrialScratching"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_EndometrialScratching")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_TrialCannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TrialCannulation")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CYCLETYPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CYCLETYPE")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_HRTCYCLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_HRTCYCLE")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_OralEstrogenDosage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_OralEstrogenDosage")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_VaginalEstrogen"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_VaginalEstrogen")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_GCSF"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_GCSF")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ActivatedPRP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ActivatedPRP")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ERA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ERA")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_UCLcm"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_UCLcm")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFSTART"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DATEOFSTART")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_NOOFEMBRYOSTHAWED")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_DAYOFEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_DAYOFEMBRYOS")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS")/}}</span>
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
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Code1")/}}</span></td>
					<td><span class="ew-cell">D5</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CellStage1")/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Grade1")/}}</span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
				<tr>
					<td><span class="ew-cell">2</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Code2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Code2")/}}</span></td>
					<td><span class="ew-cell">D6</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_CellStage2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_CellStage2")/}}</span></td>
					<td><span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Grade2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Grade2")/}}</span></td>
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
				  {{include tmpl="#tpc_ivf_et_chart_TemplateProcedureRecord"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplateProcedureRecord")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ProcedureRecord"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ProcedureRecord")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplateMedicationsadvised"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplateMedicationsadvised")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_Medicationsadvised"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_Medicationsadvised")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_et_chart_TemplatePostProcedureInstructions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_TemplatePostProcedureInstructions")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PostProcedureInstructions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PostProcedureInstructions")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ReviewDate")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_et_chart_ReviewDoctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_et_chart_ReviewDoctor")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$ivf_et_chart_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_et_chart_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_et_chart_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_et_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_et_chartedit", "tpm_ivf_et_chartedit", "ivf_et_chartedit", "<?php echo $ivf_et_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_et_chartedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_et_chart_edit->showPageFooter();
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
$ivf_et_chart_edit->terminate();
?>