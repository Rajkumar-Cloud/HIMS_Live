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
$view_ivf_treatment_plan_edit = new view_ivf_treatment_plan_edit();

// Run the page
$view_ivf_treatment_plan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_ivf_treatment_planedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fview_ivf_treatment_planedit = currentForm = new ew.Form("fview_ivf_treatment_planedit", "edit");

	// Validate form
	fview_ivf_treatment_planedit.validate = function() {
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
			<?php if ($view_ivf_treatment_plan_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->id->caption(), $view_ivf_treatment_plan_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->CoupleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CoupleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->CoupleID->caption(), $view_ivf_treatment_plan_edit->CoupleID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->PatientID->caption(), $view_ivf_treatment_plan_edit->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->PatientName->caption(), $view_ivf_treatment_plan_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->WifeCell->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->WifeCell->caption(), $view_ivf_treatment_plan_edit->WifeCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->PartnerID->caption(), $view_ivf_treatment_plan_edit->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->PartnerName->caption(), $view_ivf_treatment_plan_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->HusbandCell->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->HusbandCell->caption(), $view_ivf_treatment_plan_edit->HusbandCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->RIDNO->caption(), $view_ivf_treatment_plan_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Name->caption(), $view_ivf_treatment_plan_edit->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Age->caption(), $view_ivf_treatment_plan_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TreatmentStartDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TreatmentStartDate->caption(), $view_ivf_treatment_plan_edit->TreatmentStartDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ivf_treatment_plan_edit->TreatmentStartDate->errorMessage()) ?>");
			<?php if ($view_ivf_treatment_plan_edit->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->treatment_status->caption(), $view_ivf_treatment_plan_edit->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->ARTCYCLE->caption(), $view_ivf_treatment_plan_edit->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->RESULT->caption(), $view_ivf_treatment_plan_edit->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->status->caption(), $view_ivf_treatment_plan_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->modifiedby->caption(), $view_ivf_treatment_plan_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->modifieddatetime->caption(), $view_ivf_treatment_plan_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TreatementStopDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatementStopDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TreatementStopDate->caption(), $view_ivf_treatment_plan_edit->TreatementStopDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TreatementStopDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_ivf_treatment_plan_edit->TreatementStopDate->errorMessage()) ?>");
			<?php if ($view_ivf_treatment_plan_edit->TypePatient->Required) { ?>
				elm = this.getElements("x" + infix + "_TypePatient");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TypePatient->caption(), $view_ivf_treatment_plan_edit->TypePatient->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Treatment->Required) { ?>
				elm = this.getElements("x" + infix + "_Treatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Treatment->caption(), $view_ivf_treatment_plan_edit->Treatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TreatmentTec->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentTec");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TreatmentTec->caption(), $view_ivf_treatment_plan_edit->TreatmentTec->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TypeOfCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TypeOfCycle->caption(), $view_ivf_treatment_plan_edit->TypeOfCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->SpermOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SpermOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->SpermOrgin->caption(), $view_ivf_treatment_plan_edit->SpermOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->State->caption(), $view_ivf_treatment_plan_edit->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Origin->Required) { ?>
				elm = this.getElements("x" + infix + "_Origin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Origin->caption(), $view_ivf_treatment_plan_edit->Origin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->MACS->caption(), $view_ivf_treatment_plan_edit->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Technique->Required) { ?>
				elm = this.getElements("x" + infix + "_Technique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Technique->caption(), $view_ivf_treatment_plan_edit->Technique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->PgdPlanning->Required) { ?>
				elm = this.getElements("x" + infix + "_PgdPlanning");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->PgdPlanning->caption(), $view_ivf_treatment_plan_edit->PgdPlanning->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->IMSI->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->IMSI->caption(), $view_ivf_treatment_plan_edit->IMSI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->SequentialCulture->Required) { ?>
				elm = this.getElements("x" + infix + "_SequentialCulture");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->SequentialCulture->caption(), $view_ivf_treatment_plan_edit->SequentialCulture->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TimeLapse->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeLapse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TimeLapse->caption(), $view_ivf_treatment_plan_edit->TimeLapse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->AH->Required) { ?>
				elm = this.getElements("x" + infix + "_AH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->AH->caption(), $view_ivf_treatment_plan_edit->AH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Weight->Required) { ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Weight->caption(), $view_ivf_treatment_plan_edit->Weight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->BMI->Required) { ?>
				elm = this.getElements("x" + infix + "_BMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->BMI->caption(), $view_ivf_treatment_plan_edit->BMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->MaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->MaleIndications->caption(), $view_ivf_treatment_plan_edit->MaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->FemaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->FemaleIndications->caption(), $view_ivf_treatment_plan_edit->FemaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->UseOfThe->Required) { ?>
				elm = this.getElements("x" + infix + "_UseOfThe");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->UseOfThe->caption(), $view_ivf_treatment_plan_edit->UseOfThe->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Ectopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Ectopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Ectopic->caption(), $view_ivf_treatment_plan_edit->Ectopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Heterotopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Heterotopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Heterotopic->caption(), $view_ivf_treatment_plan_edit->Heterotopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TransferDFE->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferDFE[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TransferDFE->caption(), $view_ivf_treatment_plan_edit->TransferDFE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Evolutive->Required) { ?>
				elm = this.getElements("x" + infix + "_Evolutive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Evolutive->caption(), $view_ivf_treatment_plan_edit->Evolutive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->Number->Required) { ?>
				elm = this.getElements("x" + infix + "_Number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->Number->caption(), $view_ivf_treatment_plan_edit->Number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->SequentialCult->Required) { ?>
				elm = this.getElements("x" + infix + "_SequentialCult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->SequentialCult->caption(), $view_ivf_treatment_plan_edit->SequentialCult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_ivf_treatment_plan_edit->TineLapse->Required) { ?>
				elm = this.getElements("x" + infix + "_TineLapse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_treatment_plan_edit->TineLapse->caption(), $view_ivf_treatment_plan_edit->TineLapse->RequiredErrorMessage)) ?>");
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
	fview_ivf_treatment_planedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ivf_treatment_planedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ivf_treatment_planedit.lists["x_RIDNO"] = <?php echo $view_ivf_treatment_plan_edit->RIDNO->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_RIDNO"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->RIDNO->lookupOptions()) ?>;
	fview_ivf_treatment_planedit.lists["x_treatment_status"] = <?php echo $view_ivf_treatment_plan_edit->treatment_status->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_treatment_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->treatment_status->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_ARTCYCLE"] = <?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_RESULT"] = <?php echo $view_ivf_treatment_plan_edit->RESULT->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_RESULT"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->RESULT->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_status"] = <?php echo $view_ivf_treatment_plan_edit->status->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->status->lookupOptions()) ?>;
	fview_ivf_treatment_planedit.lists["x_Treatment"] = <?php echo $view_ivf_treatment_plan_edit->Treatment->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_Treatment"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->Treatment->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_TypeOfCycle"] = <?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->TypeOfCycle->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_SpermOrgin"] = <?php echo $view_ivf_treatment_plan_edit->SpermOrgin->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_SpermOrgin"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->SpermOrgin->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_State"] = <?php echo $view_ivf_treatment_plan_edit->State->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_State"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->State->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_MACS"] = <?php echo $view_ivf_treatment_plan_edit->MACS->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_MACS"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->MACS->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_PgdPlanning"] = <?php echo $view_ivf_treatment_plan_edit->PgdPlanning->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_PgdPlanning"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->PgdPlanning->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_MaleIndications"] = <?php echo $view_ivf_treatment_plan_edit->MaleIndications->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_MaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->MaleIndications->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_FemaleIndications"] = <?php echo $view_ivf_treatment_plan_edit->FemaleIndications->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_FemaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->FemaleIndications->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_Heterotopic"] = <?php echo $view_ivf_treatment_plan_edit->Heterotopic->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_Heterotopic"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->Heterotopic->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_TransferDFE[]"] = <?php echo $view_ivf_treatment_plan_edit->TransferDFE->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_TransferDFE[]"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->TransferDFE->options(FALSE, TRUE)) ?>;
	fview_ivf_treatment_planedit.lists["x_TineLapse"] = <?php echo $view_ivf_treatment_plan_edit->TineLapse->Lookup->toClientList($view_ivf_treatment_plan_edit) ?>;
	fview_ivf_treatment_planedit.lists["x_TineLapse"].options = <?php echo JsonEncode($view_ivf_treatment_plan_edit->TineLapse->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_ivf_treatment_planedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ivf_treatment_plan_edit->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_edit->showMessage();
?>
<form name="fview_ivf_treatment_planedit" id="fview_ivf_treatment_planedit" class="<?php echo $view_ivf_treatment_plan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_treatment_plan_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ivf_treatment_plan_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_id" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_id" type="text/html"><?php echo $view_ivf_treatment_plan_edit->id->caption() ?><?php echo $view_ivf_treatment_plan_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->id->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_id" type="text/html"><span id="el_view_ivf_treatment_plan_id">
<span<?php echo $view_ivf_treatment_plan_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_ivf_treatment_plan_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="view_ivf_treatment_plan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->id->CurrentValue) ?>">
<?php echo $view_ivf_treatment_plan_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_CoupleID" for="x_CoupleID" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_CoupleID" type="text/html"><?php echo $view_ivf_treatment_plan_edit->CoupleID->caption() ?><?php echo $view_ivf_treatment_plan_edit->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->CoupleID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_CoupleID" type="text/html"><span id="el_view_ivf_treatment_plan_CoupleID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->CoupleID->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->CoupleID->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PatientID" for="x_PatientID" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PatientID" type="text/html"><?php echo $view_ivf_treatment_plan_edit->PatientID->caption() ?><?php echo $view_ivf_treatment_plan_edit->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->PatientID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientID" type="text/html"><span id="el_view_ivf_treatment_plan_PatientID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->PatientID->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->PatientID->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PatientName" for="x_PatientName" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PatientName" type="text/html"><?php echo $view_ivf_treatment_plan_edit->PatientName->caption() ?><?php echo $view_ivf_treatment_plan_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->PatientName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientName" type="text/html"><span id="el_view_ivf_treatment_plan_PatientName">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->PatientName->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_WifeCell" for="x_WifeCell" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_WifeCell" type="text/html"><?php echo $view_ivf_treatment_plan_edit->WifeCell->caption() ?><?php echo $view_ivf_treatment_plan_edit->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->WifeCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_WifeCell" type="text/html"><span id="el_view_ivf_treatment_plan_WifeCell">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->WifeCell->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->WifeCell->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PartnerID" for="x_PartnerID" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PartnerID" type="text/html"><?php echo $view_ivf_treatment_plan_edit->PartnerID->caption() ?><?php echo $view_ivf_treatment_plan_edit->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerID" type="text/html"><span id="el_view_ivf_treatment_plan_PartnerID">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->PartnerID->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PartnerName" for="x_PartnerName" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PartnerName" type="text/html"><?php echo $view_ivf_treatment_plan_edit->PartnerName->caption() ?><?php echo $view_ivf_treatment_plan_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerName" type="text/html"><span id="el_view_ivf_treatment_plan_PartnerName">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->PartnerName->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_HusbandCell" for="x_HusbandCell" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_HusbandCell" type="text/html"><?php echo $view_ivf_treatment_plan_edit->HusbandCell->caption() ?><?php echo $view_ivf_treatment_plan_edit->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_HusbandCell" type="text/html"><span id="el_view_ivf_treatment_plan_HusbandCell">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->HusbandCell->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->HusbandCell->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_RIDNO" for="x_RIDNO" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_RIDNO" type="text/html"><?php echo $view_ivf_treatment_plan_edit->RIDNO->caption() ?><?php echo $view_ivf_treatment_plan_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->RIDNO->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RIDNO" type="text/html"><span id="el_view_ivf_treatment_plan_RIDNO">
<?php $view_ivf_treatment_plan_edit->RIDNO->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo EmptyValue(strval($view_ivf_treatment_plan_edit->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ivf_treatment_plan_edit->RIDNO->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ivf_treatment_plan_edit->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ivf_treatment_plan_edit->RIDNO->ReadOnly || $view_ivf_treatment_plan_edit->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ivf_treatment_plan_edit->RIDNO->Lookup->getParamTag($view_ivf_treatment_plan_edit, "p_x_RIDNO") ?>
<input type="hidden" data-table="view_ivf_treatment_plan" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $view_ivf_treatment_plan_edit->RIDNO->CurrentValue ?>"<?php echo $view_ivf_treatment_plan_edit->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Name" for="x_Name" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Name" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Name->caption() ?><?php echo $view_ivf_treatment_plan_edit->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Name->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Name" type="text/html"><span id="el_view_ivf_treatment_plan_Name">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Name->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Name->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Age" for="x_Age" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Age" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Age->caption() ?><?php echo $view_ivf_treatment_plan_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Age->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Age" type="text/html"><span id="el_view_ivf_treatment_plan_Age">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Age->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Age->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Age->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<div id="r_TreatmentStartDate" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatmentStartDate" for="x_TreatmentStartDate" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatmentStartDate" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->caption() ?><?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentStartDate" type="text/html"><span id="el_view_ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->editAttributes() ?>>
<?php if (!$view_ivf_treatment_plan_edit->TreatmentStartDate->ReadOnly && !$view_ivf_treatment_plan_edit->TreatmentStartDate->Disabled && !isset($view_ivf_treatment_plan_edit->TreatmentStartDate->EditAttrs["readonly"]) && !isset($view_ivf_treatment_plan_edit->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ivf_treatment_planedit_js">
loadjs.ready(["fview_ivf_treatment_planedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ivf_treatment_planedit", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ivf_treatment_plan_edit->TreatmentStartDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_treatment_status" for="x_treatment_status" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_treatment_status" type="text/html"><?php echo $view_ivf_treatment_plan_edit->treatment_status->caption() ?><?php echo $view_ivf_treatment_plan_edit->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->treatment_status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_treatment_status" type="text/html"><span id="el_view_ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->treatment_status->displayValueSeparatorAttribute() ?>" id="x_treatment_status" name="x_treatment_status"<?php echo $view_ivf_treatment_plan_edit->treatment_status->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->treatment_status->selectOptionListHtml("x_treatment_status") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_ARTCYCLE" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_ARTCYCLE" type="text/html"><?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->caption() ?><?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_ARTCYCLE" type="text/html"><span id="el_view_ivf_treatment_plan_ARTCYCLE">
<div id="tp_x_ARTCYCLE" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x_ARTCYCLE" id="x_ARTCYCLE" value="{value}"<?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->radioButtonListHtml(FALSE, "x_ARTCYCLE") ?>
</div></div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_RESULT" for="x_RESULT" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_RESULT" type="text/html"><?php echo $view_ivf_treatment_plan_edit->RESULT->caption() ?><?php echo $view_ivf_treatment_plan_edit->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->RESULT->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RESULT" type="text/html"><span id="el_view_ivf_treatment_plan_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_RESULT" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $view_ivf_treatment_plan_edit->RESULT->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->RESULT->selectOptionListHtml("x_RESULT") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_status" for="x_status" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_status" type="text/html"><?php echo $view_ivf_treatment_plan_edit->status->caption() ?><?php echo $view_ivf_treatment_plan_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_status" type="text/html"><span id="el_view_ivf_treatment_plan_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_status" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $view_ivf_treatment_plan_edit->status->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $view_ivf_treatment_plan_edit->status->Lookup->getParamTag($view_ivf_treatment_plan_edit, "p_x_status") ?>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<div id="r_TreatementStopDate" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatementStopDate" for="x_TreatementStopDate" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatementStopDate" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->caption() ?><?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatementStopDate" type="text/html"><span id="el_view_ivf_treatment_plan_TreatementStopDate">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatementStopDate" name="x_TreatementStopDate" id="x_TreatementStopDate" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->TreatementStopDate->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->editAttributes() ?>>
<?php if (!$view_ivf_treatment_plan_edit->TreatementStopDate->ReadOnly && !$view_ivf_treatment_plan_edit->TreatementStopDate->Disabled && !isset($view_ivf_treatment_plan_edit->TreatementStopDate->EditAttrs["readonly"]) && !isset($view_ivf_treatment_plan_edit->TreatementStopDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="view_ivf_treatment_planedit_js">
loadjs.ready(["fview_ivf_treatment_planedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ivf_treatment_planedit", "x_TreatementStopDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $view_ivf_treatment_plan_edit->TreatementStopDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TypePatient->Visible) { // TypePatient ?>
	<div id="r_TypePatient" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TypePatient" for="x_TypePatient" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TypePatient" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TypePatient->caption() ?><?php echo $view_ivf_treatment_plan_edit->TypePatient->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TypePatient->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypePatient" type="text/html"><span id="el_view_ivf_treatment_plan_TypePatient">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TypePatient" name="x_TypePatient" id="x_TypePatient" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->TypePatient->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->TypePatient->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->TypePatient->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TypePatient->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Treatment" for="x_Treatment" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Treatment" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Treatment->caption() ?><?php echo $view_ivf_treatment_plan_edit->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Treatment->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Treatment" type="text/html"><span id="el_view_ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->Treatment->displayValueSeparatorAttribute() ?>" id="x_Treatment" name="x_Treatment"<?php echo $view_ivf_treatment_plan_edit->Treatment->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->Treatment->selectOptionListHtml("x_Treatment") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TreatmentTec->Visible) { // TreatmentTec ?>
	<div id="r_TreatmentTec" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TreatmentTec" for="x_TreatmentTec" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TreatmentTec" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TreatmentTec->caption() ?><?php echo $view_ivf_treatment_plan_edit->TreatmentTec->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TreatmentTec->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentTec" type="text/html"><span id="el_view_ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TreatmentTec" name="x_TreatmentTec" id="x_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->TreatmentTec->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->TreatmentTec->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TreatmentTec->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<div id="r_TypeOfCycle" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TypeOfCycle" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TypeOfCycle" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->caption() ?><?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypeOfCycle" type="text/html"><span id="el_view_ivf_treatment_plan_TypeOfCycle">
<div id="tp_x_TypeOfCycle" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x_TypeOfCycle" id="x_TypeOfCycle" value="{value}"<?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->radioButtonListHtml(FALSE, "x_TypeOfCycle") ?>
</div></div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TypeOfCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->SpermOrgin->Visible) { // SpermOrgin ?>
	<div id="r_SpermOrgin" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SpermOrgin" for="x_SpermOrgin" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SpermOrgin" type="text/html"><?php echo $view_ivf_treatment_plan_edit->SpermOrgin->caption() ?><?php echo $view_ivf_treatment_plan_edit->SpermOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->SpermOrgin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SpermOrgin" type="text/html"><span id="el_view_ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x_SpermOrgin" name="x_SpermOrgin"<?php echo $view_ivf_treatment_plan_edit->SpermOrgin->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->SpermOrgin->selectOptionListHtml("x_SpermOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->SpermOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_State" for="x_State" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_State" type="text/html"><?php echo $view_ivf_treatment_plan_edit->State->caption() ?><?php echo $view_ivf_treatment_plan_edit->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->State->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_State" type="text/html"><span id="el_view_ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->State->displayValueSeparatorAttribute() ?>" id="x_State" name="x_State"<?php echo $view_ivf_treatment_plan_edit->State->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->State->selectOptionListHtml("x_State") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Origin->Visible) { // Origin ?>
	<div id="r_Origin" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Origin" for="x_Origin" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Origin" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Origin->caption() ?><?php echo $view_ivf_treatment_plan_edit->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Origin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Origin" type="text/html"><span id="el_view_ivf_treatment_plan_Origin">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Origin->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Origin->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Origin->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Origin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_MACS" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_MACS" type="text/html"><?php echo $view_ivf_treatment_plan_edit->MACS->caption() ?><?php echo $view_ivf_treatment_plan_edit->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->MACS->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MACS" type="text/html"><span id="el_view_ivf_treatment_plan_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS" id="x_MACS" value="{value}"<?php echo $view_ivf_treatment_plan_edit->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan_edit->MACS->radioButtonListHtml(FALSE, "x_MACS") ?>
</div></div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Technique->Visible) { // Technique ?>
	<div id="r_Technique" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Technique" for="x_Technique" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Technique" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Technique->caption() ?><?php echo $view_ivf_treatment_plan_edit->Technique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Technique->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Technique" type="text/html"><span id="el_view_ivf_treatment_plan_Technique">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Technique" name="x_Technique" id="x_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Technique->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Technique->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Technique->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Technique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->PgdPlanning->Visible) { // PgdPlanning ?>
	<div id="r_PgdPlanning" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_PgdPlanning" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_PgdPlanning" type="text/html"><?php echo $view_ivf_treatment_plan_edit->PgdPlanning->caption() ?><?php echo $view_ivf_treatment_plan_edit->PgdPlanning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->PgdPlanning->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PgdPlanning" type="text/html"><span id="el_view_ivf_treatment_plan_PgdPlanning">
<div id="tp_x_PgdPlanning" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x_PgdPlanning" id="x_PgdPlanning" value="{value}"<?php echo $view_ivf_treatment_plan_edit->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan_edit->PgdPlanning->radioButtonListHtml(FALSE, "x_PgdPlanning") ?>
</div></div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->PgdPlanning->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->IMSI->Visible) { // IMSI ?>
	<div id="r_IMSI" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_IMSI" for="x_IMSI" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_IMSI" type="text/html"><?php echo $view_ivf_treatment_plan_edit->IMSI->caption() ?><?php echo $view_ivf_treatment_plan_edit->IMSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->IMSI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_IMSI" type="text/html"><span id="el_view_ivf_treatment_plan_IMSI">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_IMSI" name="x_IMSI" id="x_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->IMSI->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->IMSI->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->IMSI->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->IMSI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->SequentialCulture->Visible) { // SequentialCulture ?>
	<div id="r_SequentialCulture" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SequentialCulture" for="x_SequentialCulture" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SequentialCulture" type="text/html"><?php echo $view_ivf_treatment_plan_edit->SequentialCulture->caption() ?><?php echo $view_ivf_treatment_plan_edit->SequentialCulture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->SequentialCulture->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCulture" type="text/html"><span id="el_view_ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_SequentialCulture" name="x_SequentialCulture" id="x_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->SequentialCulture->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->SequentialCulture->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->SequentialCulture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TimeLapse->Visible) { // TimeLapse ?>
	<div id="r_TimeLapse" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TimeLapse" for="x_TimeLapse" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TimeLapse" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TimeLapse->caption() ?><?php echo $view_ivf_treatment_plan_edit->TimeLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TimeLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TimeLapse" type="text/html"><span id="el_view_ivf_treatment_plan_TimeLapse">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_TimeLapse" name="x_TimeLapse" id="x_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->TimeLapse->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->TimeLapse->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TimeLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->AH->Visible) { // AH ?>
	<div id="r_AH" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_AH" for="x_AH" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_AH" type="text/html"><?php echo $view_ivf_treatment_plan_edit->AH->caption() ?><?php echo $view_ivf_treatment_plan_edit->AH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->AH->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_AH" type="text/html"><span id="el_view_ivf_treatment_plan_AH">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_AH" name="x_AH" id="x_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->AH->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->AH->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->AH->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->AH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Weight" for="x_Weight" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Weight" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Weight->caption() ?><?php echo $view_ivf_treatment_plan_edit->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Weight->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Weight" type="text/html"><span id="el_view_ivf_treatment_plan_Weight">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Weight->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Weight->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Weight->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->BMI->Visible) { // BMI ?>
	<div id="r_BMI" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_BMI" for="x_BMI" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_BMI" type="text/html"><?php echo $view_ivf_treatment_plan_edit->BMI->caption() ?><?php echo $view_ivf_treatment_plan_edit->BMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->BMI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_BMI" type="text/html"><span id="el_view_ivf_treatment_plan_BMI">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_BMI" name="x_BMI" id="x_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->BMI->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->BMI->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->BMI->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->BMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->MaleIndications->Visible) { // MaleIndications ?>
	<div id="r_MaleIndications" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_MaleIndications" for="x_MaleIndications" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_MaleIndications" type="text/html"><?php echo $view_ivf_treatment_plan_edit->MaleIndications->caption() ?><?php echo $view_ivf_treatment_plan_edit->MaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->MaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MaleIndications" type="text/html"><span id="el_view_ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->MaleIndications->displayValueSeparatorAttribute() ?>" id="x_MaleIndications" name="x_MaleIndications"<?php echo $view_ivf_treatment_plan_edit->MaleIndications->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->MaleIndications->selectOptionListHtml("x_MaleIndications") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->MaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->FemaleIndications->Visible) { // FemaleIndications ?>
	<div id="r_FemaleIndications" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_FemaleIndications" for="x_FemaleIndications" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_FemaleIndications" type="text/html"><?php echo $view_ivf_treatment_plan_edit->FemaleIndications->caption() ?><?php echo $view_ivf_treatment_plan_edit->FemaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->FemaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_FemaleIndications" type="text/html"><span id="el_view_ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x_FemaleIndications" name="x_FemaleIndications"<?php echo $view_ivf_treatment_plan_edit->FemaleIndications->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->FemaleIndications->selectOptionListHtml("x_FemaleIndications") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->FemaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->UseOfThe->Visible) { // UseOfThe ?>
	<div id="r_UseOfThe" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_UseOfThe" for="x_UseOfThe" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_UseOfThe" type="text/html"><?php echo $view_ivf_treatment_plan_edit->UseOfThe->caption() ?><?php echo $view_ivf_treatment_plan_edit->UseOfThe->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->UseOfThe->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_UseOfThe" type="text/html"><span id="el_view_ivf_treatment_plan_UseOfThe">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_UseOfThe" name="x_UseOfThe" id="x_UseOfThe" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->UseOfThe->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->UseOfThe->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->UseOfThe->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->UseOfThe->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Ectopic" for="x_Ectopic" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Ectopic" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Ectopic->caption() ?><?php echo $view_ivf_treatment_plan_edit->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Ectopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Ectopic" type="text/html"><span id="el_view_ivf_treatment_plan_Ectopic">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Ectopic->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Ectopic->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Ectopic->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Heterotopic->Visible) { // Heterotopic ?>
	<div id="r_Heterotopic" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Heterotopic" for="x_Heterotopic" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Heterotopic" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Heterotopic->caption() ?><?php echo $view_ivf_treatment_plan_edit->Heterotopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Heterotopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Heterotopic" type="text/html"><span id="el_view_ivf_treatment_plan_Heterotopic">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_Heterotopic" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->Heterotopic->displayValueSeparatorAttribute() ?>" id="x_Heterotopic" name="x_Heterotopic"<?php echo $view_ivf_treatment_plan_edit->Heterotopic->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->Heterotopic->selectOptionListHtml("x_Heterotopic") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Heterotopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TransferDFE->Visible) { // TransferDFE ?>
	<div id="r_TransferDFE" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TransferDFE" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TransferDFE" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TransferDFE->caption() ?><?php echo $view_ivf_treatment_plan_edit->TransferDFE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TransferDFE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TransferDFE" type="text/html"><span id="el_view_ivf_treatment_plan_TransferDFE">
<div id="tp_x_TransferDFE" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_TransferDFE" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->TransferDFE->displayValueSeparatorAttribute() ?>" name="x_TransferDFE[]" id="x_TransferDFE[]" value="{value}"<?php echo $view_ivf_treatment_plan_edit->TransferDFE->editAttributes() ?>></div>
<div id="dsl_x_TransferDFE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ivf_treatment_plan_edit->TransferDFE->checkBoxListHtml(FALSE, "x_TransferDFE[]") ?>
</div></div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TransferDFE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Evolutive->Visible) { // Evolutive ?>
	<div id="r_Evolutive" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Evolutive" for="x_Evolutive" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Evolutive" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Evolutive->caption() ?><?php echo $view_ivf_treatment_plan_edit->Evolutive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Evolutive->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Evolutive" type="text/html"><span id="el_view_ivf_treatment_plan_Evolutive">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Evolutive" name="x_Evolutive" id="x_Evolutive" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Evolutive->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Evolutive->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Evolutive->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Evolutive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->Number->Visible) { // Number ?>
	<div id="r_Number" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_Number" for="x_Number" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_Number" type="text/html"><?php echo $view_ivf_treatment_plan_edit->Number->caption() ?><?php echo $view_ivf_treatment_plan_edit->Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->Number->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Number" type="text/html"><span id="el_view_ivf_treatment_plan_Number">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_Number" name="x_Number" id="x_Number" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->Number->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->Number->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->Number->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->SequentialCult->Visible) { // SequentialCult ?>
	<div id="r_SequentialCult" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_SequentialCult" for="x_SequentialCult" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_SequentialCult" type="text/html"><?php echo $view_ivf_treatment_plan_edit->SequentialCult->caption() ?><?php echo $view_ivf_treatment_plan_edit->SequentialCult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->SequentialCult->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCult" type="text/html"><span id="el_view_ivf_treatment_plan_SequentialCult">
<input type="text" data-table="view_ivf_treatment_plan" data-field="x_SequentialCult" name="x_SequentialCult" id="x_SequentialCult" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_treatment_plan_edit->SequentialCult->getPlaceHolder()) ?>" value="<?php echo $view_ivf_treatment_plan_edit->SequentialCult->EditValue ?>"<?php echo $view_ivf_treatment_plan_edit->SequentialCult->editAttributes() ?>>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->SequentialCult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_treatment_plan_edit->TineLapse->Visible) { // TineLapse ?>
	<div id="r_TineLapse" class="form-group row">
		<label id="elh_view_ivf_treatment_plan_TineLapse" for="x_TineLapse" class="<?php echo $view_ivf_treatment_plan_edit->LeftColumnClass ?>"><script id="tpc_view_ivf_treatment_plan_TineLapse" type="text/html"><?php echo $view_ivf_treatment_plan_edit->TineLapse->caption() ?><?php echo $view_ivf_treatment_plan_edit->TineLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $view_ivf_treatment_plan_edit->RightColumnClass ?>"><div <?php echo $view_ivf_treatment_plan_edit->TineLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TineLapse" type="text/html"><span id="el_view_ivf_treatment_plan_TineLapse">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ivf_treatment_plan" data-field="x_TineLapse" data-value-separator="<?php echo $view_ivf_treatment_plan_edit->TineLapse->displayValueSeparatorAttribute() ?>" id="x_TineLapse" name="x_TineLapse"<?php echo $view_ivf_treatment_plan_edit->TineLapse->editAttributes() ?>>
			<?php echo $view_ivf_treatment_plan_edit->TineLapse->selectOptionListHtml("x_TineLapse") ?>
		</select>
</div>
</span></script>
<?php echo $view_ivf_treatment_plan_edit->TineLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ivf_treatment_planedit" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatment_planedit" type="text/html">
<div id="ct_view_ivf_treatment_plan_edit"><style>
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
if( $showmaster=="")
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
{{include tmpl="#tpc_view_ivf_treatment_plan_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_RIDNO")/}}
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_view_ivf_treatment_plan_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_PatientName")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_PatientID")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_PartnerName")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_PartnerID")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_WifeCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_WifeCell")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_HusbandCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_HusbandCell")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_Name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Name")/}}
{{include tmpl="#tpc_view_ivf_treatment_plan_CoupleID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_CoupleID")/}}
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
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_FemaleIndications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_FemaleIndications")/}}</span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MaleIndications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_MaleIndications")/}}</span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_ARTCYCLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_ARTCYCLE")/}}</span>
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
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Treatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Treatment")/}}</span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TreatmentTec"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_TreatmentTec")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TypeOfCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_TypeOfCycle")/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SpermOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_SpermOrgin")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_State")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Origin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Origin")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MACS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_MACS")/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Technique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Technique")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_PgdPlanning"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_PgdPlanning")/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_IMSI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_IMSI")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCulture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_SequentialCulture")/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TimeLapse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_TimeLapse")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_AH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_AH")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Weight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Weight")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_BMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_BMI")/}}</span>
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
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Ectopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Ectopic")/}}</span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_UseOfThe"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_UseOfThe")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TransferDFE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_TransferDFE")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Evolutive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Evolutive")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Number"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Number")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCult"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_SequentialCult")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TineLapse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_TineLapse")/}}</span>
						</td>
												<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Heterotopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_ivf_treatment_plan_Heterotopic")/}}</span>
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

<?php if (!$view_ivf_treatment_plan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ivf_treatment_plan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_treatment_plan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment_plan->Rows) ?> };
	ew.applyTemplate("tpd_view_ivf_treatment_planedit", "tpm_view_ivf_treatment_planedit", "view_ivf_treatment_planedit", "<?php echo $view_ivf_treatment_plan->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ivf_treatment_planedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ivf_treatment_plan_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function callSaveFunction(){document.getElementById("Repagehistoryview").value="EditFunction"}function callViewFunction(){document.getElementById("Repagehistoryview").value="ViewFunction"}function callNextFunction(){document.getElementById("Repagehistoryview").value="NextFunction"}function callHomeFunction(){document.getElementById("Repagehistoryview").value="HomeFunction"}document.getElementById("Treatment").style.display="none",document.getElementById("TreatmentTec").style.display="none",document.getElementById("TypeOfCycle").style.display="none",document.getElementById("SpermOrgin").style.display="none",document.getElementById("State").style.display="none",document.getElementById("Origin").style.display="none",document.getElementById("MACS").style.display="none",document.getElementById("Technique").style.display="none",document.getElementById("PgdPlanning").style.display="none",document.getElementById("IMSI").style.display="none",document.getElementById("SequentialCulture").style.display="none",document.getElementById("TimeLapse").style.display="none",document.getElementById("AH").style.display="none",document.getElementById("Weight").style.display="none",document.getElementById("BMI").style.display="none",document.getElementById("TreatmentTreatment").style.display="none",document.getElementById("Ectopic").style.display="none",document.getElementById("use").style.display="none","Intrauterine insemination(IUI)"==this.value&&(document.getElementById("Treatment").style.display="block",document.getElementById("TreatmentTec").style.display="block",document.getElementById("TypeOfCycle").style.display="block",document.getElementById("SpermOrgin").style.display="block",document.getElementById("State").style.display="block",document.getElementById("Origin").style.display="block",document.getElementById("MACS").style.display="block",document.getElementById("Technique").style.display="none",document.getElementById("PgdPlanning").style.display="none",document.getElementById("IMSI").style.display="none",document.getElementById("SequentialCulture").style.display="none",document.getElementById("TimeLapse").style.display="none",document.getElementById("AH").style.display="none",document.getElementById("Weight").style.display="none",document.getElementById("BMI").style.display="none"),"IVF"==this.value&&(document.getElementById("Treatment").style.display="block",document.getElementById("TreatmentTec").style.display="block",document.getElementById("TypeOfCycle").style.display="block",document.getElementById("SpermOrgin").style.display="block",document.getElementById("State").style.display="block",document.getElementById("Origin").style.display="block",document.getElementById("MACS").style.display="block",document.getElementById("Technique").style.display="block",document.getElementById("PgdPlanning").style.display="block",document.getElementById("IMSI").style.display="block",document.getElementById("SequentialCulture").style.display="block",document.getElementById("TimeLapse").style.display="block",document.getElementById("AH").style.display="block",document.getElementById("Weight").style.display="block",document.getElementById("BMI").style.display="block"),"Oocyte Vitrification"==this.value&&(document.getElementById("Treatment").style.display="block",document.getElementById("TreatmentTec").style.display="block",document.getElementById("TypeOfCycle").style.display="block",document.getElementById("SpermOrgin").style.display="block",document.getElementById("State").style.display="block",document.getElementById("Origin").style.display="block",document.getElementById("MACS").style.display="block",document.getElementById("Technique").style.display="block",document.getElementById("PgdPlanning").style.display="block",document.getElementById("IMSI").style.display="block",document.getElementById("SequentialCulture").style.display="block",document.getElementById("TimeLapse").style.display="block",document.getElementById("AH").style.display="block",document.getElementById("Weight").style.display="block",document.getElementById("BMI").style.display="block"),"Egg Donation"==this.value&&(document.getElementById("TypeOfCycle").style.display="block",document.getElementById("Origin").style.display="block",document.getElementById("Ectopic").style.display="block",document.getElementById("use").style.display="block"),"Frozen Embryo Transfer"==this.value&&(document.getElementById("TypeOfCycle").style.display="block",document.getElementById("PgdPlanning").style.display="block",document.getElementById("TreatmentTreatment").style.display="block"),"Evaluation cycle"==this.value&&(document.getElementById("TypeOfCycle").style.display="block",document.getElementById("PgdPlanning").style.display="block",document.getElementById("TreatmentTreatment").style.display="block");
});
</script>
<?php include_once "footer.php"; ?>
<?php
$view_ivf_treatment_plan_edit->terminate();
?>