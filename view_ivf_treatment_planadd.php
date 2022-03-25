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
$view_ivf_treatment_plan_add = new view_ivf_treatment_plan_add();

// Run the page
$view_ivf_treatment_plan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_ivf_treatment_planadd = currentForm = new ew.Form("fview_ivf_treatment_planadd", "add");

// Validate form
fview_ivf_treatment_planadd.validate = function() {
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
		<?php if ($view_ivf_treatment_plan_add->CoupleID->Required) { ?>
			elm = this.getElements("x" + infix + "_CoupleID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->CoupleID->caption(), $view_ivf_treatment_plan->CoupleID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->PatientID->caption(), $view_ivf_treatment_plan->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->PatientName->caption(), $view_ivf_treatment_plan->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->WifeCell->Required) { ?>
			elm = this.getElements("x" + infix + "_WifeCell");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->WifeCell->caption(), $view_ivf_treatment_plan->WifeCell->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->PartnerID->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->PartnerID->caption(), $view_ivf_treatment_plan->PartnerID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->PartnerName->caption(), $view_ivf_treatment_plan->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->HusbandCell->Required) { ?>
			elm = this.getElements("x" + infix + "_HusbandCell");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->HusbandCell->caption(), $view_ivf_treatment_plan->HusbandCell->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->RIDNO->caption(), $view_ivf_treatment_plan->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Name->caption(), $view_ivf_treatment_plan->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Age->caption(), $view_ivf_treatment_plan->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TreatmentStartDate->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentStartDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TreatmentStartDate->caption(), $view_ivf_treatment_plan->TreatmentStartDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TreatmentStartDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_treatment_plan->TreatmentStartDate->errorMessage()) ?>");
		<?php if ($view_ivf_treatment_plan_add->treatment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_treatment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->treatment_status->caption(), $view_ivf_treatment_plan->treatment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->ARTCYCLE->caption(), $view_ivf_treatment_plan->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->RESULT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESULT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->RESULT->caption(), $view_ivf_treatment_plan->RESULT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->status->caption(), $view_ivf_treatment_plan->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->createdby->caption(), $view_ivf_treatment_plan->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->createddatetime->caption(), $view_ivf_treatment_plan->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TreatementStopDate->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatementStopDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TreatementStopDate->caption(), $view_ivf_treatment_plan->TreatementStopDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TreatementStopDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_treatment_plan->TreatementStopDate->errorMessage()) ?>");
		<?php if ($view_ivf_treatment_plan_add->TypePatient->Required) { ?>
			elm = this.getElements("x" + infix + "_TypePatient");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TypePatient->caption(), $view_ivf_treatment_plan->TypePatient->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Treatment->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Treatment->caption(), $view_ivf_treatment_plan->Treatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TreatmentTec->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentTec");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TreatmentTec->caption(), $view_ivf_treatment_plan->TreatmentTec->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TypeOfCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeOfCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TypeOfCycle->caption(), $view_ivf_treatment_plan->TypeOfCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->SpermOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_SpermOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->SpermOrgin->caption(), $view_ivf_treatment_plan->SpermOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->State->caption(), $view_ivf_treatment_plan->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Origin->Required) { ?>
			elm = this.getElements("x" + infix + "_Origin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Origin->caption(), $view_ivf_treatment_plan->Origin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->MACS->Required) { ?>
			elm = this.getElements("x" + infix + "_MACS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->MACS->caption(), $view_ivf_treatment_plan->MACS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Technique->Required) { ?>
			elm = this.getElements("x" + infix + "_Technique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Technique->caption(), $view_ivf_treatment_plan->Technique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->PgdPlanning->Required) { ?>
			elm = this.getElements("x" + infix + "_PgdPlanning");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->PgdPlanning->caption(), $view_ivf_treatment_plan->PgdPlanning->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->IMSI->Required) { ?>
			elm = this.getElements("x" + infix + "_IMSI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->IMSI->caption(), $view_ivf_treatment_plan->IMSI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->SequentialCulture->Required) { ?>
			elm = this.getElements("x" + infix + "_SequentialCulture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->SequentialCulture->caption(), $view_ivf_treatment_plan->SequentialCulture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TimeLapse->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeLapse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TimeLapse->caption(), $view_ivf_treatment_plan->TimeLapse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->AH->Required) { ?>
			elm = this.getElements("x" + infix + "_AH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->AH->caption(), $view_ivf_treatment_plan->AH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Weight->Required) { ?>
			elm = this.getElements("x" + infix + "_Weight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Weight->caption(), $view_ivf_treatment_plan->Weight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->BMI->Required) { ?>
			elm = this.getElements("x" + infix + "_BMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->BMI->caption(), $view_ivf_treatment_plan->BMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->MaleIndications->Required) { ?>
			elm = this.getElements("x" + infix + "_MaleIndications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->MaleIndications->caption(), $view_ivf_treatment_plan->MaleIndications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->FemaleIndications->Required) { ?>
			elm = this.getElements("x" + infix + "_FemaleIndications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->FemaleIndications->caption(), $view_ivf_treatment_plan->FemaleIndications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->UseOfThe->Required) { ?>
			elm = this.getElements("x" + infix + "_UseOfThe");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->UseOfThe->caption(), $view_ivf_treatment_plan->UseOfThe->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Ectopic->Required) { ?>
			elm = this.getElements("x" + infix + "_Ectopic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Ectopic->caption(), $view_ivf_treatment_plan->Ectopic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Heterotopic->Required) { ?>
			elm = this.getElements("x" + infix + "_Heterotopic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Heterotopic->caption(), $view_ivf_treatment_plan->Heterotopic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TransferDFE->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferDFE[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TransferDFE->caption(), $view_ivf_treatment_plan->TransferDFE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Evolutive->Required) { ?>
			elm = this.getElements("x" + infix + "_Evolutive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Evolutive->caption(), $view_ivf_treatment_plan->Evolutive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->Number->Required) { ?>
			elm = this.getElements("x" + infix + "_Number");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->Number->caption(), $view_ivf_treatment_plan->Number->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->SequentialCult->Required) { ?>
			elm = this.getElements("x" + infix + "_SequentialCult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->SequentialCult->caption(), $view_ivf_treatment_plan->SequentialCult->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_treatment_plan_add->TineLapse->Required) { ?>
			elm = this.getElements("x" + infix + "_TineLapse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan->TineLapse->caption(), $view_ivf_treatment_plan->TineLapse->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fview_ivf_treatment_planadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatment_planadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatment_planadd.lists["x_RIDNO"] = <?php echo $view_ivf_treatment_plan_add->RIDNO->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_RIDNO"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->RIDNO->lookupOptions()) ?>;
fview_ivf_treatment_planadd.lists["x_treatment_status"] = <?php echo $view_ivf_treatment_plan_add->treatment_status->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_treatment_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->treatment_status->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_ARTCYCLE"] = <?php echo $view_ivf_treatment_plan_add->ARTCYCLE->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->ARTCYCLE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_RESULT"] = <?php echo $view_ivf_treatment_plan_add->RESULT->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_RESULT"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->RESULT->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_status"] = <?php echo $view_ivf_treatment_plan_add->status->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->status->lookupOptions()) ?>;
fview_ivf_treatment_planadd.lists["x_Treatment"] = <?php echo $view_ivf_treatment_plan_add->Treatment->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_Treatment"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->Treatment->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_TypeOfCycle"] = <?php echo $view_ivf_treatment_plan_add->TypeOfCycle->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->TypeOfCycle->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_SpermOrgin"] = <?php echo $view_ivf_treatment_plan_add->SpermOrgin->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_SpermOrgin"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->SpermOrgin->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_State"] = <?php echo $view_ivf_treatment_plan_add->State->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_State"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->State->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_MACS"] = <?php echo $view_ivf_treatment_plan_add->MACS->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_MACS"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->MACS->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_PgdPlanning"] = <?php echo $view_ivf_treatment_plan_add->PgdPlanning->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_PgdPlanning"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->PgdPlanning->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_MaleIndications"] = <?php echo $view_ivf_treatment_plan_add->MaleIndications->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_MaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->MaleIndications->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_FemaleIndications"] = <?php echo $view_ivf_treatment_plan_add->FemaleIndications->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_FemaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->FemaleIndications->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_Heterotopic"] = <?php echo $view_ivf_treatment_plan_add->Heterotopic->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_Heterotopic"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->Heterotopic->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_TransferDFE[]"] = <?php echo $view_ivf_treatment_plan_add->TransferDFE->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_TransferDFE[]"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->TransferDFE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planadd.lists["x_TineLapse"] = <?php echo $view_ivf_treatment_plan_add->TineLapse->Lookup->toClientList() ?>;
fview_ivf_treatment_planadd.lists["x_TineLapse"].options = <?php echo JsonEncode($view_ivf_treatment_plan_add->TineLapse->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ivf_treatment_plan_add->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_add->showMessage();
?>
<form name="fview_ivf_treatment_planadd" id="fview_ivf_treatment_planadd" class="<?php echo $view_ivf_treatment_plan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_plan_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_plan_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_treatment_plan_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_CoupleID" for="x_CoupleID" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?><?php echo ($view_ivf_treatment_plan->CoupleID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->CoupleID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_CoupleID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment_plan->CoupleID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PatientID" for="x_PatientID" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->PatientID->caption() ?><?php echo ($view_ivf_treatment_plan->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->PatientID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_PatientID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PatientID->EditValue ?>"<?php echo $view_ivf_treatment_plan->PatientID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PatientName" for="x_PatientName" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->PatientName->caption() ?><?php echo ($view_ivf_treatment_plan->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->PatientName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_PatientName">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PatientName->EditValue ?>"<?php echo $view_ivf_treatment_plan->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_WifeCell" for="x_WifeCell" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?><?php echo ($view_ivf_treatment_plan->WifeCell->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->WifeCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_WifeCell">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->WifeCell->EditValue ?>"<?php echo $view_ivf_treatment_plan->WifeCell->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PartnerID" for="x_PartnerID" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?><?php echo ($view_ivf_treatment_plan->PartnerID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_PartnerID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PartnerID->EditValue ?>"<?php echo $view_ivf_treatment_plan->PartnerID->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PartnerName" for="x_PartnerName" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?><?php echo ($view_ivf_treatment_plan->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_PartnerName">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->PartnerName->EditValue ?>"<?php echo $view_ivf_treatment_plan->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_HusbandCell" for="x_HusbandCell" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?><?php echo ($view_ivf_treatment_plan->HusbandCell->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_HusbandCell">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->HusbandCell->EditValue ?>"<?php echo $view_ivf_treatment_plan->HusbandCell->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_RIDNO" for="x_RIDNO" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->RIDNO->caption() ?><?php echo ($view_ivf_treatment_plan->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->RIDNO->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_RIDNO">
<?php $view_ivf_treatment_plan->RIDNO->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_ivf_treatment_plan->RIDNO->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo strval($view_ivf_treatment_plan->RIDNO->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ivf_treatment_plan->RIDNO->ViewValue) : $view_ivf_treatment_plan->RIDNO->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ivf_treatment_plan->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ivf_treatment_plan->RIDNO->ReadOnly || $view_ivf_treatment_plan->RIDNO->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ivf_treatment_plan->RIDNO->Lookup->getParamTag("p_x_RIDNO") ?>
<input type="hidden" data-table="view_ivf_treatment_plan" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ivf_treatment_plan->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $view_ivf_treatment_plan->RIDNO->CurrentValue ?>"<?php echo $view_ivf_treatment_plan->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Name" for="x_Name" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Name" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Name->caption() ?><?php echo ($view_ivf_treatment_plan->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Name->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Name" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Name">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Name->EditValue ?>"<?php echo $view_ivf_treatment_plan->Name->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Age" for="x_Age" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Age" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Age->caption() ?><?php echo ($view_ivf_treatment_plan->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Age->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Age" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Age">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Age->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Age->EditValue ?>"<?php echo $view_ivf_treatment_plan->Age->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<div id="r_TreatmentStartDate" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatmentStartDate" for="x_TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatmentStartDate->caption() ?><?php echo ($view_ivf_treatment_plan->TreatmentStartDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->TreatmentStartDate->EditValue ?>"<?php echo $view_ivf_treatment_plan->TreatmentStartDate->editAttributes() ?>>
<?php if (!$view_ivf_treatment_plan->TreatmentStartDate->ReadOnly && !$view_ivf_treatment_plan->TreatmentStartDate->Disabled && !isset($view_ivf_treatment_plan->TreatmentStartDate->EditAttrs["readonly"]) && !isset($view_ivf_treatment_plan->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ivf_treatment_planadd_js">
ew.createDateTimePicker("fview_ivf_treatment_planadd", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ivf_treatment_plan->TreatmentStartDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_treatment_status" for="x_treatment_status" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->treatment_status->caption() ?><?php echo ($view_ivf_treatment_plan->treatment_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $view_ivf_treatment_plan->treatment_status->displayValueSeparatorAttribute() ?>" id="x_treatment_status" name="x_treatment_status"<?php echo $view_ivf_treatment_plan->treatment_status->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->treatment_status->selectOptionListHtml("x_treatment_status") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_ARTCYCLE" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->ARTCYCLE->caption() ?><?php echo ($view_ivf_treatment_plan->ARTCYCLE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_ARTCYCLE">
<div id="tp_x_ARTCYCLE" class="ew-template"><input type="radio" class="form-check-input" data-table="view_ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $view_ivf_treatment_plan->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x_ARTCYCLE" id="x_ARTCYCLE" value="{value}"<?php echo $view_ivf_treatment_plan->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan->ARTCYCLE->radioButtonListHtml(FALSE, "x_ARTCYCLE") ?>
</div></div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_RESULT" for="x_RESULT" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->RESULT->caption() ?><?php echo ($view_ivf_treatment_plan->RESULT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->RESULT->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_RESULT" data-value-separator="<?php echo $view_ivf_treatment_plan->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $view_ivf_treatment_plan->RESULT->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->RESULT->selectOptionListHtml("x_RESULT") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_status" for="x_status" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_status" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->status->caption() ?><?php echo ($view_ivf_treatment_plan->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_status" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_status" data-value-separator="<?php echo $view_ivf_treatment_plan->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $view_ivf_treatment_plan->status->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $view_ivf_treatment_plan->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $view_ivf_treatment_plan->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<div id="r_TreatementStopDate" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatementStopDate" for="x_TreatementStopDate" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatementStopDate" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatementStopDate->caption() ?><?php echo ($view_ivf_treatment_plan->TreatementStopDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TreatementStopDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatementStopDate" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatementStopDate">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatementStopDate" name="x_TreatementStopDate" id="x_TreatementStopDate" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->TreatementStopDate->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->TreatementStopDate->EditValue ?>"<?php echo $view_ivf_treatment_plan->TreatementStopDate->editAttributes() ?>>
<?php if (!$view_ivf_treatment_plan->TreatementStopDate->ReadOnly && !$view_ivf_treatment_plan->TreatementStopDate->Disabled && !isset($view_ivf_treatment_plan->TreatementStopDate->EditAttrs["readonly"]) && !isset($view_ivf_treatment_plan->TreatementStopDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ivf_treatment_planadd_js">
ew.createDateTimePicker("fview_ivf_treatment_planadd", "x_TreatementStopDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ivf_treatment_plan->TreatementStopDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TypePatient->Visible) { // TypePatient ?>
	<div id="r_TypePatient" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TypePatient" for="x_TypePatient" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TypePatient" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TypePatient->caption() ?><?php echo ($view_ivf_treatment_plan->TypePatient->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TypePatient->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypePatient" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TypePatient">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TypePatient" name="x_TypePatient" id="x_TypePatient" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->TypePatient->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->TypePatient->EditValue ?>"<?php echo $view_ivf_treatment_plan->TypePatient->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TypePatient->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Treatment" for="x_Treatment" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Treatment" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Treatment->caption() ?><?php echo ($view_ivf_treatment_plan->Treatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Treatment->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Treatment" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $view_ivf_treatment_plan->Treatment->displayValueSeparatorAttribute() ?>" id="x_Treatment" name="x_Treatment"<?php echo $view_ivf_treatment_plan->Treatment->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->Treatment->selectOptionListHtml("x_Treatment") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
	<div id="r_TreatmentTec" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatmentTec" for="x_TreatmentTec" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatmentTec" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatmentTec->caption() ?><?php echo ($view_ivf_treatment_plan->TreatmentTec->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentTec" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatmentTec" name="x_TreatmentTec" id="x_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->TreatmentTec->EditValue ?>"<?php echo $view_ivf_treatment_plan->TreatmentTec->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TreatmentTec->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<div id="r_TypeOfCycle" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TypeOfCycle" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TypeOfCycle" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TypeOfCycle->caption() ?><?php echo ($view_ivf_treatment_plan->TypeOfCycle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypeOfCycle" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TypeOfCycle">
<div id="tp_x_TypeOfCycle" class="ew-template"><input type="radio" class="form-check-input" data-table="view_ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $view_ivf_treatment_plan->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x_TypeOfCycle" id="x_TypeOfCycle" value="{value}"<?php echo $view_ivf_treatment_plan->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan->TypeOfCycle->radioButtonListHtml(FALSE, "x_TypeOfCycle") ?>
</div></div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TypeOfCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
	<div id="r_SpermOrgin" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SpermOrgin" for="x_SpermOrgin" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SpermOrgin" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->SpermOrgin->caption() ?><?php echo ($view_ivf_treatment_plan->SpermOrgin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SpermOrgin" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $view_ivf_treatment_plan->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x_SpermOrgin" name="x_SpermOrgin"<?php echo $view_ivf_treatment_plan->SpermOrgin->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->SpermOrgin->selectOptionListHtml("x_SpermOrgin") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->SpermOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_State" for="x_State" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_State" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->State->caption() ?><?php echo ($view_ivf_treatment_plan->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->State->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_State" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $view_ivf_treatment_plan->State->displayValueSeparatorAttribute() ?>" id="x_State" name="x_State"<?php echo $view_ivf_treatment_plan->State->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->State->selectOptionListHtml("x_State") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Origin->Visible) { // Origin ?>
	<div id="r_Origin" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Origin" for="x_Origin" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Origin" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Origin->caption() ?><?php echo ($view_ivf_treatment_plan->Origin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Origin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Origin" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Origin">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Origin->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Origin->EditValue ?>"<?php echo $view_ivf_treatment_plan->Origin->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Origin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_MACS" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_MACS" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->MACS->caption() ?><?php echo ($view_ivf_treatment_plan->MACS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->MACS->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MACS" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="radio" class="form-check-input" data-table="view_ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $view_ivf_treatment_plan->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS" id="x_MACS" value="{value}"<?php echo $view_ivf_treatment_plan->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan->MACS->radioButtonListHtml(FALSE, "x_MACS") ?>
</div></div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Technique->Visible) { // Technique ?>
	<div id="r_Technique" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Technique" for="x_Technique" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Technique" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Technique->caption() ?><?php echo ($view_ivf_treatment_plan->Technique->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Technique->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Technique" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Technique">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Technique" name="x_Technique" id="x_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Technique->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Technique->EditValue ?>"<?php echo $view_ivf_treatment_plan->Technique->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Technique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
	<div id="r_PgdPlanning" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PgdPlanning" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PgdPlanning" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->PgdPlanning->caption() ?><?php echo ($view_ivf_treatment_plan->PgdPlanning->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PgdPlanning" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_PgdPlanning">
<div id="tp_x_PgdPlanning" class="ew-template"><input type="radio" class="form-check-input" data-table="view_ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $view_ivf_treatment_plan->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x_PgdPlanning" id="x_PgdPlanning" value="{value}"<?php echo $view_ivf_treatment_plan->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan->PgdPlanning->radioButtonListHtml(FALSE, "x_PgdPlanning") ?>
</div></div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->PgdPlanning->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
	<div id="r_IMSI" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_IMSI" for="x_IMSI" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_IMSI" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->IMSI->caption() ?><?php echo ($view_ivf_treatment_plan->IMSI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->IMSI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_IMSI" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_IMSI">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_IMSI" name="x_IMSI" id="x_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->IMSI->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->IMSI->EditValue ?>"<?php echo $view_ivf_treatment_plan->IMSI->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->IMSI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
	<div id="r_SequentialCulture" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SequentialCulture" for="x_SequentialCulture" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SequentialCulture" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->SequentialCulture->caption() ?><?php echo ($view_ivf_treatment_plan->SequentialCulture->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCulture" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_SequentialCulture" name="x_SequentialCulture" id="x_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->SequentialCulture->EditValue ?>"<?php echo $view_ivf_treatment_plan->SequentialCulture->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->SequentialCulture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
	<div id="r_TimeLapse" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TimeLapse" for="x_TimeLapse" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TimeLapse" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TimeLapse->caption() ?><?php echo ($view_ivf_treatment_plan->TimeLapse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TimeLapse" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TimeLapse">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TimeLapse" name="x_TimeLapse" id="x_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->TimeLapse->EditValue ?>"<?php echo $view_ivf_treatment_plan->TimeLapse->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TimeLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->AH->Visible) { // AH ?>
	<div id="r_AH" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_AH" for="x_AH" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_AH" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->AH->caption() ?><?php echo ($view_ivf_treatment_plan->AH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->AH->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_AH" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_AH">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_AH" name="x_AH" id="x_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->AH->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->AH->EditValue ?>"<?php echo $view_ivf_treatment_plan->AH->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->AH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Weight" for="x_Weight" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Weight" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Weight->caption() ?><?php echo ($view_ivf_treatment_plan->Weight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Weight->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Weight" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Weight">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Weight->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Weight->EditValue ?>"<?php echo $view_ivf_treatment_plan->Weight->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->BMI->Visible) { // BMI ?>
	<div id="r_BMI" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_BMI" for="x_BMI" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_BMI" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->BMI->caption() ?><?php echo ($view_ivf_treatment_plan->BMI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->BMI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_BMI" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_BMI">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_BMI" name="x_BMI" id="x_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->BMI->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->BMI->EditValue ?>"<?php echo $view_ivf_treatment_plan->BMI->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->BMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
	<div id="r_MaleIndications" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_MaleIndications" for="x_MaleIndications" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_MaleIndications" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->MaleIndications->caption() ?><?php echo ($view_ivf_treatment_plan->MaleIndications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MaleIndications" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $view_ivf_treatment_plan->MaleIndications->displayValueSeparatorAttribute() ?>" id="x_MaleIndications" name="x_MaleIndications"<?php echo $view_ivf_treatment_plan->MaleIndications->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->MaleIndications->selectOptionListHtml("x_MaleIndications") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->MaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
	<div id="r_FemaleIndications" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_FemaleIndications" for="x_FemaleIndications" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_FemaleIndications" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->FemaleIndications->caption() ?><?php echo ($view_ivf_treatment_plan->FemaleIndications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_FemaleIndications" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $view_ivf_treatment_plan->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x_FemaleIndications" name="x_FemaleIndications"<?php echo $view_ivf_treatment_plan->FemaleIndications->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->FemaleIndications->selectOptionListHtml("x_FemaleIndications") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->FemaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->UseOfThe->Visible) { // UseOfThe ?>
	<div id="r_UseOfThe" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_UseOfThe" for="x_UseOfThe" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_UseOfThe" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->UseOfThe->caption() ?><?php echo ($view_ivf_treatment_plan->UseOfThe->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->UseOfThe->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_UseOfThe" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_UseOfThe">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_UseOfThe" name="x_UseOfThe" id="x_UseOfThe" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->UseOfThe->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->UseOfThe->EditValue ?>"<?php echo $view_ivf_treatment_plan->UseOfThe->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->UseOfThe->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Ectopic" for="x_Ectopic" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Ectopic" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Ectopic->caption() ?><?php echo ($view_ivf_treatment_plan->Ectopic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Ectopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Ectopic" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Ectopic">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Ectopic->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Ectopic->EditValue ?>"<?php echo $view_ivf_treatment_plan->Ectopic->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Heterotopic->Visible) { // Heterotopic ?>
	<div id="r_Heterotopic" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Heterotopic" for="x_Heterotopic" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Heterotopic" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Heterotopic->caption() ?><?php echo ($view_ivf_treatment_plan->Heterotopic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Heterotopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Heterotopic" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Heterotopic">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_Heterotopic" data-value-separator="<?php echo $view_ivf_treatment_plan->Heterotopic->displayValueSeparatorAttribute() ?>" id="x_Heterotopic" name="x_Heterotopic"<?php echo $view_ivf_treatment_plan->Heterotopic->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->Heterotopic->selectOptionListHtml("x_Heterotopic") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Heterotopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TransferDFE->Visible) { // TransferDFE ?>
	<div id="r_TransferDFE" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TransferDFE" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TransferDFE" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TransferDFE->caption() ?><?php echo ($view_ivf_treatment_plan->TransferDFE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TransferDFE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TransferDFE" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TransferDFE">
<div id="tp_x_TransferDFE" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ivf_treatment_plan" data-field="x_TransferDFE" data-value-separator="<?php echo $view_ivf_treatment_plan->TransferDFE->displayValueSeparatorAttribute() ?>" name="x_TransferDFE[]" id="x_TransferDFE[]" value="{value}"<?php echo $view_ivf_treatment_plan->TransferDFE->editAttributes() ?>></div>
<div id="dsl_x_TransferDFE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan->TransferDFE->checkBoxListHtml(FALSE, "x_TransferDFE[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TransferDFE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Evolutive->Visible) { // Evolutive ?>
	<div id="r_Evolutive" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Evolutive" for="x_Evolutive" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Evolutive" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Evolutive->caption() ?><?php echo ($view_ivf_treatment_plan->Evolutive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Evolutive->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Evolutive" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Evolutive">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Evolutive" name="x_Evolutive" id="x_Evolutive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Evolutive->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Evolutive->EditValue ?>"<?php echo $view_ivf_treatment_plan->Evolutive->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Evolutive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Number->Visible) { // Number ?>
	<div id="r_Number" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Number" for="x_Number" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Number" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->Number->caption() ?><?php echo ($view_ivf_treatment_plan->Number->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->Number->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Number" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_Number">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Number" name="x_Number" id="x_Number" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->Number->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->Number->EditValue ?>"<?php echo $view_ivf_treatment_plan->Number->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SequentialCult->Visible) { // SequentialCult ?>
	<div id="r_SequentialCult" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SequentialCult" for="x_SequentialCult" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SequentialCult" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->SequentialCult->caption() ?><?php echo ($view_ivf_treatment_plan->SequentialCult->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->SequentialCult->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCult" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_SequentialCult">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_SequentialCult" name="x_SequentialCult" id="x_SequentialCult" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan->SequentialCult->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan->SequentialCult->EditValue ?>"<?php echo $view_ivf_treatment_plan->SequentialCult->editAttributes() ?>>
</span>
</script>
<?php echo $view_ivf_treatment_plan->SequentialCult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TineLapse->Visible) { // TineLapse ?>
	<div id="r_TineLapse" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TineLapse" for="x_TineLapse" class="<?php echo $view_ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TineLapse" class="view_ivf_treatment_planadd" type="text/html"><span><?php echo $view_ivf_treatment_plan->TineLapse->caption() ?><?php echo ($view_ivf_treatment_plan->TineLapse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_add->RightColumnClass ?>"><div<?php echo $view_ivf_treatment_plan->TineLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TineLapse" class="view_ivf_treatment_planadd" type="text/html">
<span id="el_view_ivf_treatment_plan_TineLapse">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_TineLapse" data-value-separator="<?php echo $view_ivf_treatment_plan->TineLapse->displayValueSeparatorAttribute() ?>" id="x_TineLapse" name="x_TineLapse"<?php echo $view_ivf_treatment_plan->TineLapse->editAttributes() ?>>
		<?php echo $view_ivf_treatment_plan->TineLapse->selectOptionListHtml("x_TineLapse") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ivf_treatment_plan->TineLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ivf_treatment_planadd" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatment_planadd" type="text/html">
<div id="ct_view_ivf_treatment_plan_add"><style>
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
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
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
?>	
{{include tmpl="#tpc_view_ivf_treatment_plan_RIDNO"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_RIDNO"/}}
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_view_ivf_treatment_plan_PatientName"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PatientName"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PatientID"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PatientID"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PartnerName"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PartnerName"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PartnerID"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PartnerID"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_WifeCell"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_WifeCell"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_HusbandCell"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_HusbandCell"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_Name"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Name"/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_CoupleID"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_CoupleID"/}}
</div>
<div class="row">
<div id="patientdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
<div id="partnerdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPartnerId" class="ew-cell">Partner Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPartnerPatientName" class="ew-cell">Partner Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPartnerGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPartnerBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="SemPartnerprofilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPartnerAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPartnerMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPartnerEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
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
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
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
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Plan</h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td    style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_FemaleIndications"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_FemaleIndications"/}}</span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MaleIndications"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_MaleIndications"/}}</span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_ARTCYCLE"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_ARTCYCLE"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Treatment</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td  id="Treatment"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Treatment"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Treatment"/}}</span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TreatmentTec"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TreatmentTec"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TypeOfCycle"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TypeOfCycle"/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SpermOrgin"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SpermOrgin"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_State"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_State"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Origin"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Origin"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MACS"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_MACS"/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Technique"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Technique"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_PgdPlanning"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PgdPlanning"/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_IMSI"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_IMSI"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCulture"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SequentialCulture"/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TimeLapse"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TimeLapse"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_AH"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_AH"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Weight"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Weight"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_BMI"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_BMI"/}}</span>
						</td>
						<td id="aaa"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="Ectopic"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Ectopic"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Ectopic"/}}</span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_UseOfThe"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_UseOfThe"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TransferDFE"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TransferDFE"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Evolutive"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Evolutive"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Number"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Number"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCult"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SequentialCult"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TineLapse"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TineLapse"/}}</span>
						</td>
												<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Heterotopic"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Heterotopic"/}}</span>
						</td>
					</tr>				
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$view_ivf_treatment_plan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ivf_treatment_plan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_treatment_plan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment_plan->Rows) ?> };
ew.applyTemplate("tpd_view_ivf_treatment_planadd", "tpm_view_ivf_treatment_planadd", "view_ivf_treatment_planadd", "<?php echo $view_ivf_treatment_plan->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ivf_treatment_planadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ivf_treatment_plan_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

  document.getElementById("Treatment").style.display  = "none";
  document.getElementById("TreatmentTec").style.display  = "none";
  document.getElementById("TypeOfCycle").style.display  = "none";
  document.getElementById("SpermOrgin").style.display  = "none";
  document.getElementById("State").style.display  = "none";
  document.getElementById("Origin").style.display  = "none";
  document.getElementById("MACS").style.display  = "none";
  document.getElementById("Technique").style.display  = "none";
  document.getElementById("PgdPlanning").style.display  = "none";
  document.getElementById("IMSI").style.display  = "none";
  document.getElementById("SequentialCulture").style.display  = "none";
  document.getElementById("TimeLapse").style.display  = "none";
  document.getElementById("AH").style.display  = "none";
  document.getElementById("Weight").style.display  = "none";
  document.getElementById("BMI").style.display  = "none";
  document.getElementById("TreatmentTreatment").style.display  = "none";
	document.getElementById("Ectopic").style.display = "none";
  document.getElementById("use").style.display = "none";

 // document.getElementById("MaleIndications").style.display = "none";
 // document.getElementById("FemaleIndications").style.display = "none";
	function callSaveFunction()
	{		
		document.getElementById("Repagehistoryview").value = "EditFunction";
	}

	function callViewFunction()
	{		
		document.getElementById("Repagehistoryview").value = "ViewFunction";
	}

	function callNextFunction()
	{		
		document.getElementById("Repagehistoryview").value = "NextFunction";
	}

	function callHomeFunction()
	{		
		document.getElementById("Repagehistoryview").value = "HomeFunction";
	}
</script>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_plan_add->terminate();
?>