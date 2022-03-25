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
$ivf_treatment_plan_add = new ivf_treatment_plan_add();

// Run the page
$ivf_treatment_plan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_treatment_plan_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_treatment_planadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_treatment_planadd = currentForm = new ew.Form("fivf_treatment_planadd", "add");

	// Validate form
	fivf_treatment_planadd.validate = function() {
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
			<?php if ($ivf_treatment_plan_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->RIDNO->caption(), $ivf_treatment_plan_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_treatment_plan_add->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_treatment_plan_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Name->caption(), $ivf_treatment_plan_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TreatmentStartDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TreatmentStartDate->caption(), $ivf_treatment_plan_add->TreatmentStartDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_treatment_plan_add->TreatmentStartDate->errorMessage()) ?>");
			<?php if ($ivf_treatment_plan_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Age->caption(), $ivf_treatment_plan_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->treatment_status->caption(), $ivf_treatment_plan_add->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->ARTCYCLE->caption(), $ivf_treatment_plan_add->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->IVFCycleNO->Required) { ?>
				elm = this.getElements("x" + infix + "_IVFCycleNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->IVFCycleNO->caption(), $ivf_treatment_plan_add->IVFCycleNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->RESULT->caption(), $ivf_treatment_plan_add->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->status->caption(), $ivf_treatment_plan_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->createdby->caption(), $ivf_treatment_plan_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->createddatetime->caption(), $ivf_treatment_plan_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TreatementStopDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatementStopDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TreatementStopDate->caption(), $ivf_treatment_plan_add->TreatementStopDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TreatementStopDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_treatment_plan_add->TreatementStopDate->errorMessage()) ?>");
			<?php if ($ivf_treatment_plan_add->TypePatient->Required) { ?>
				elm = this.getElements("x" + infix + "_TypePatient");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TypePatient->caption(), $ivf_treatment_plan_add->TypePatient->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Treatment->Required) { ?>
				elm = this.getElements("x" + infix + "_Treatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Treatment->caption(), $ivf_treatment_plan_add->Treatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TreatmentTec->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentTec");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TreatmentTec->caption(), $ivf_treatment_plan_add->TreatmentTec->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TypeOfCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TypeOfCycle->caption(), $ivf_treatment_plan_add->TypeOfCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->SpermOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SpermOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->SpermOrgin->caption(), $ivf_treatment_plan_add->SpermOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->State->caption(), $ivf_treatment_plan_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Origin->Required) { ?>
				elm = this.getElements("x" + infix + "_Origin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Origin->caption(), $ivf_treatment_plan_add->Origin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->MACS->caption(), $ivf_treatment_plan_add->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Technique->Required) { ?>
				elm = this.getElements("x" + infix + "_Technique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Technique->caption(), $ivf_treatment_plan_add->Technique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->PgdPlanning->Required) { ?>
				elm = this.getElements("x" + infix + "_PgdPlanning");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->PgdPlanning->caption(), $ivf_treatment_plan_add->PgdPlanning->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->IMSI->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->IMSI->caption(), $ivf_treatment_plan_add->IMSI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->SequentialCulture->Required) { ?>
				elm = this.getElements("x" + infix + "_SequentialCulture");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->SequentialCulture->caption(), $ivf_treatment_plan_add->SequentialCulture->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TimeLapse->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeLapse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TimeLapse->caption(), $ivf_treatment_plan_add->TimeLapse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->AH->Required) { ?>
				elm = this.getElements("x" + infix + "_AH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->AH->caption(), $ivf_treatment_plan_add->AH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Weight->Required) { ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Weight->caption(), $ivf_treatment_plan_add->Weight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->BMI->Required) { ?>
				elm = this.getElements("x" + infix + "_BMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->BMI->caption(), $ivf_treatment_plan_add->BMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->MaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->MaleIndications->caption(), $ivf_treatment_plan_add->MaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->FemaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->FemaleIndications->caption(), $ivf_treatment_plan_add->FemaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->UseOfThe->Required) { ?>
				elm = this.getElements("x" + infix + "_UseOfThe");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->UseOfThe->caption(), $ivf_treatment_plan_add->UseOfThe->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Ectopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Ectopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Ectopic->caption(), $ivf_treatment_plan_add->Ectopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Heterotopic->Required) { ?>
				elm = this.getElements("x" + infix + "_Heterotopic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Heterotopic->caption(), $ivf_treatment_plan_add->Heterotopic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TransferDFE->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferDFE[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TransferDFE->caption(), $ivf_treatment_plan_add->TransferDFE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Evolutive->Required) { ?>
				elm = this.getElements("x" + infix + "_Evolutive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Evolutive->caption(), $ivf_treatment_plan_add->Evolutive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->Number->Required) { ?>
				elm = this.getElements("x" + infix + "_Number");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->Number->caption(), $ivf_treatment_plan_add->Number->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->SequentialCult->Required) { ?>
				elm = this.getElements("x" + infix + "_SequentialCult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->SequentialCult->caption(), $ivf_treatment_plan_add->SequentialCult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->TineLapse->Required) { ?>
				elm = this.getElements("x" + infix + "_TineLapse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->TineLapse->caption(), $ivf_treatment_plan_add->TineLapse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->PatientName->caption(), $ivf_treatment_plan_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->PatientID->caption(), $ivf_treatment_plan_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->PartnerName->caption(), $ivf_treatment_plan_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->PartnerID->caption(), $ivf_treatment_plan_add->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->WifeCell->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->WifeCell->caption(), $ivf_treatment_plan_add->WifeCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->HusbandCell->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->HusbandCell->caption(), $ivf_treatment_plan_add->HusbandCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_add->CoupleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CoupleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_add->CoupleID->caption(), $ivf_treatment_plan_add->CoupleID->RequiredErrorMessage)) ?>");
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
	fivf_treatment_planadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_treatment_planadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_treatment_planadd.lists["x_treatment_status"] = <?php echo $ivf_treatment_plan_add->treatment_status->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_treatment_status"].options = <?php echo JsonEncode($ivf_treatment_plan_add->treatment_status->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_ARTCYCLE"] = <?php echo $ivf_treatment_plan_add->ARTCYCLE->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_treatment_plan_add->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_RESULT"] = <?php echo $ivf_treatment_plan_add->RESULT->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_treatment_plan_add->RESULT->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_status"] = <?php echo $ivf_treatment_plan_add->status->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_status"].options = <?php echo JsonEncode($ivf_treatment_plan_add->status->lookupOptions()) ?>;
	fivf_treatment_planadd.lists["x_Treatment"] = <?php echo $ivf_treatment_plan_add->Treatment->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_Treatment"].options = <?php echo JsonEncode($ivf_treatment_plan_add->Treatment->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_TypeOfCycle"] = <?php echo $ivf_treatment_plan_add->TypeOfCycle->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($ivf_treatment_plan_add->TypeOfCycle->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_SpermOrgin"] = <?php echo $ivf_treatment_plan_add->SpermOrgin->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_SpermOrgin"].options = <?php echo JsonEncode($ivf_treatment_plan_add->SpermOrgin->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_State"] = <?php echo $ivf_treatment_plan_add->State->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_State"].options = <?php echo JsonEncode($ivf_treatment_plan_add->State->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_MACS"] = <?php echo $ivf_treatment_plan_add->MACS->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_MACS"].options = <?php echo JsonEncode($ivf_treatment_plan_add->MACS->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_PgdPlanning"] = <?php echo $ivf_treatment_plan_add->PgdPlanning->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_PgdPlanning"].options = <?php echo JsonEncode($ivf_treatment_plan_add->PgdPlanning->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_MaleIndications"] = <?php echo $ivf_treatment_plan_add->MaleIndications->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_MaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_add->MaleIndications->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_FemaleIndications"] = <?php echo $ivf_treatment_plan_add->FemaleIndications->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_FemaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_add->FemaleIndications->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_Heterotopic"] = <?php echo $ivf_treatment_plan_add->Heterotopic->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_Heterotopic"].options = <?php echo JsonEncode($ivf_treatment_plan_add->Heterotopic->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_TransferDFE[]"] = <?php echo $ivf_treatment_plan_add->TransferDFE->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_TransferDFE[]"].options = <?php echo JsonEncode($ivf_treatment_plan_add->TransferDFE->options(FALSE, TRUE)) ?>;
	fivf_treatment_planadd.lists["x_TineLapse"] = <?php echo $ivf_treatment_plan_add->TineLapse->Lookup->toClientList($ivf_treatment_plan_add) ?>;
	fivf_treatment_planadd.lists["x_TineLapse"].options = <?php echo JsonEncode($ivf_treatment_plan_add->TineLapse->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_treatment_planadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_treatment_plan_add->showPageHeader(); ?>
<?php
$ivf_treatment_plan_add->showMessage();
?>
<form name="fivf_treatment_planadd" id="fivf_treatment_planadd" class="<?php echo $ivf_treatment_plan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_treatment_plan_add->IsModal ?>">
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "ivf") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_treatment_plan_add->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Female" value="<?php echo HtmlEncode($ivf_treatment_plan_add->Name->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "view_donor_ivf") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_donor_ivf">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_treatment_plan_add->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Female" value="<?php echo HtmlEncode($ivf_treatment_plan_add->Name->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_treatment_plan_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_treatment_plan_RIDNO" for="x_RIDNO" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_RIDNO" type="text/html"><?php echo $ivf_treatment_plan_add->RIDNO->caption() ?><?php echo $ivf_treatment_plan_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->RIDNO->cellAttributes() ?>>
<?php if ($ivf_treatment_plan_add->RIDNO->getSessionValue() != "") { ?>
<script id="tpx_ivf_treatment_plan_RIDNO" type="text/html"><span id="el_ivf_treatment_plan_RIDNO">
<span<?php echo $ivf_treatment_plan_add->RIDNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_add->RIDNO->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNO" name="x_RIDNO" value="<?php echo HtmlEncode($ivf_treatment_plan_add->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_treatment_plan_RIDNO" type="text/html"><span id="el_ivf_treatment_plan_RIDNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->RIDNO->EditValue ?>"<?php echo $ivf_treatment_plan_add->RIDNO->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_treatment_plan_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_treatment_plan_Name" for="x_Name" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Name" type="text/html"><?php echo $ivf_treatment_plan_add->Name->caption() ?><?php echo $ivf_treatment_plan_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Name->cellAttributes() ?>>
<?php if ($ivf_treatment_plan_add->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_treatment_plan_Name" type="text/html"><span id="el_ivf_treatment_plan_Name">
<span<?php echo $ivf_treatment_plan_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_add->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_treatment_plan_add->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_treatment_plan_Name" type="text/html"><span id="el_ivf_treatment_plan_Name">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Name->EditValue ?>"<?php echo $ivf_treatment_plan_add->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_treatment_plan_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<div id="r_TreatmentStartDate" class="form-group row">
		<label id="elh_ivf_treatment_plan_TreatmentStartDate" for="x_TreatmentStartDate" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TreatmentStartDate" type="text/html"><?php echo $ivf_treatment_plan_add->TreatmentStartDate->caption() ?><?php echo $ivf_treatment_plan_add->TreatmentStartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TreatmentStartDate" type="text/html"><span id="el_ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan_add->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan_add->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan_add->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan_add->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan_add->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_treatment_planadd_js">
loadjs.ready(["fivf_treatment_planadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_treatment_planadd", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_treatment_plan_add->TreatmentStartDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_treatment_plan_Age" for="x_Age" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Age" type="text/html"><?php echo $ivf_treatment_plan_add->Age->caption() ?><?php echo $ivf_treatment_plan_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Age->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Age" type="text/html"><span id="el_ivf_treatment_plan_Age">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Age->EditValue ?>"<?php echo $ivf_treatment_plan_add->Age->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_ivf_treatment_plan_treatment_status" for="x_treatment_status" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_treatment_status" type="text/html"><?php echo $ivf_treatment_plan_add->treatment_status->caption() ?><?php echo $ivf_treatment_plan_add->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_treatment_status" type="text/html"><span id="el_ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan_add->treatment_status->displayValueSeparatorAttribute() ?>" id="x_treatment_status" name="x_treatment_status"<?php echo $ivf_treatment_plan_add->treatment_status->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->treatment_status->selectOptionListHtml("x_treatment_status") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_treatment_plan_ARTCYCLE" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_ARTCYCLE" type="text/html"><?php echo $ivf_treatment_plan_add->ARTCYCLE->caption() ?><?php echo $ivf_treatment_plan_add->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_ARTCYCLE" type="text/html"><span id="el_ivf_treatment_plan_ARTCYCLE">
<div id="tp_x_ARTCYCLE" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan_add->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x_ARTCYCLE" id="x_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan_add->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_add->ARTCYCLE->radioButtonListHtml(FALSE, "x_ARTCYCLE") ?>
</div></div>
</span></script>
<?php echo $ivf_treatment_plan_add->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<div id="r_IVFCycleNO" class="form-group row">
		<label id="elh_ivf_treatment_plan_IVFCycleNO" for="x_IVFCycleNO" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_IVFCycleNO" type="text/html"><?php echo $ivf_treatment_plan_add->IVFCycleNO->caption() ?><?php echo $ivf_treatment_plan_add->IVFCycleNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->IVFCycleNO->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_IVFCycleNO" type="text/html"><span id="el_ivf_treatment_plan_IVFCycleNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x_IVFCycleNO" id="x_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan_add->IVFCycleNO->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->IVFCycleNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_treatment_plan_RESULT" for="x_RESULT" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_RESULT" type="text/html"><?php echo $ivf_treatment_plan_add->RESULT->caption() ?><?php echo $ivf_treatment_plan_add->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_RESULT" type="text/html"><span id="el_ivf_treatment_plan_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_RESULT" data-value-separator="<?php echo $ivf_treatment_plan_add->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf_treatment_plan_add->RESULT->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->RESULT->selectOptionListHtml("x_RESULT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_treatment_plan_status" for="x_status" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_status" type="text/html"><?php echo $ivf_treatment_plan_add->status->caption() ?><?php echo $ivf_treatment_plan_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->status->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_status" type="text/html"><span id="el_ivf_treatment_plan_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_status" data-value-separator="<?php echo $ivf_treatment_plan_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf_treatment_plan_add->status->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $ivf_treatment_plan_add->status->Lookup->getParamTag($ivf_treatment_plan_add, "p_x_status") ?>
</span></script>
<?php echo $ivf_treatment_plan_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<div id="r_TreatementStopDate" class="form-group row">
		<label id="elh_ivf_treatment_plan_TreatementStopDate" for="x_TreatementStopDate" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TreatementStopDate" type="text/html"><?php echo $ivf_treatment_plan_add->TreatementStopDate->caption() ?><?php echo $ivf_treatment_plan_add->TreatementStopDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TreatementStopDate->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TreatementStopDate" type="text/html"><span id="el_ivf_treatment_plan_TreatementStopDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatementStopDate" data-format="7" name="x_TreatementStopDate" id="x_TreatementStopDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->TreatementStopDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->TreatementStopDate->EditValue ?>"<?php echo $ivf_treatment_plan_add->TreatementStopDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan_add->TreatementStopDate->ReadOnly && !$ivf_treatment_plan_add->TreatementStopDate->Disabled && !isset($ivf_treatment_plan_add->TreatementStopDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan_add->TreatementStopDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_treatment_planadd_js">
loadjs.ready(["fivf_treatment_planadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_treatment_planadd", "x_TreatementStopDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $ivf_treatment_plan_add->TreatementStopDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TypePatient->Visible) { // TypePatient ?>
	<div id="r_TypePatient" class="form-group row">
		<label id="elh_ivf_treatment_plan_TypePatient" for="x_TypePatient" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TypePatient" type="text/html"><?php echo $ivf_treatment_plan_add->TypePatient->caption() ?><?php echo $ivf_treatment_plan_add->TypePatient->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TypePatient->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TypePatient" type="text/html"><span id="el_ivf_treatment_plan_TypePatient">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TypePatient" name="x_TypePatient" id="x_TypePatient" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->TypePatient->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->TypePatient->EditValue ?>"<?php echo $ivf_treatment_plan_add->TypePatient->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->TypePatient->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_ivf_treatment_plan_Treatment" for="x_Treatment" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Treatment" type="text/html"><?php echo $ivf_treatment_plan_add->Treatment->caption() ?><?php echo $ivf_treatment_plan_add->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Treatment" type="text/html"><span id="el_ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan_add->Treatment->displayValueSeparatorAttribute() ?>" id="x_Treatment" name="x_Treatment"<?php echo $ivf_treatment_plan_add->Treatment->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->Treatment->selectOptionListHtml("x_Treatment") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TreatmentTec->Visible) { // TreatmentTec ?>
	<div id="r_TreatmentTec" class="form-group row">
		<label id="elh_ivf_treatment_plan_TreatmentTec" for="x_TreatmentTec" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TreatmentTec" type="text/html"><?php echo $ivf_treatment_plan_add->TreatmentTec->caption() ?><?php echo $ivf_treatment_plan_add->TreatmentTec->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TreatmentTec->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TreatmentTec" type="text/html"><span id="el_ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x_TreatmentTec" id="x_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan_add->TreatmentTec->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->TreatmentTec->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<div id="r_TypeOfCycle" class="form-group row">
		<label id="elh_ivf_treatment_plan_TypeOfCycle" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TypeOfCycle" type="text/html"><?php echo $ivf_treatment_plan_add->TypeOfCycle->caption() ?><?php echo $ivf_treatment_plan_add->TypeOfCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TypeOfCycle" type="text/html"><span id="el_ivf_treatment_plan_TypeOfCycle">
<div id="tp_x_TypeOfCycle" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan_add->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x_TypeOfCycle" id="x_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan_add->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_add->TypeOfCycle->radioButtonListHtml(FALSE, "x_TypeOfCycle") ?>
</div></div>
</span></script>
<?php echo $ivf_treatment_plan_add->TypeOfCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->SpermOrgin->Visible) { // SpermOrgin ?>
	<div id="r_SpermOrgin" class="form-group row">
		<label id="elh_ivf_treatment_plan_SpermOrgin" for="x_SpermOrgin" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_SpermOrgin" type="text/html"><?php echo $ivf_treatment_plan_add->SpermOrgin->caption() ?><?php echo $ivf_treatment_plan_add->SpermOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->SpermOrgin->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_SpermOrgin" type="text/html"><span id="el_ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan_add->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x_SpermOrgin" name="x_SpermOrgin"<?php echo $ivf_treatment_plan_add->SpermOrgin->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->SpermOrgin->selectOptionListHtml("x_SpermOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->SpermOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_ivf_treatment_plan_State" for="x_State" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_State" type="text/html"><?php echo $ivf_treatment_plan_add->State->caption() ?><?php echo $ivf_treatment_plan_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->State->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_State" type="text/html"><span id="el_ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan_add->State->displayValueSeparatorAttribute() ?>" id="x_State" name="x_State"<?php echo $ivf_treatment_plan_add->State->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->State->selectOptionListHtml("x_State") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Origin->Visible) { // Origin ?>
	<div id="r_Origin" class="form-group row">
		<label id="elh_ivf_treatment_plan_Origin" for="x_Origin" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Origin" type="text/html"><?php echo $ivf_treatment_plan_add->Origin->caption() ?><?php echo $ivf_treatment_plan_add->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Origin->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Origin" type="text/html"><span id="el_ivf_treatment_plan_Origin">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Origin->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Origin->EditValue ?>"<?php echo $ivf_treatment_plan_add->Origin->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Origin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label id="elh_ivf_treatment_plan_MACS" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_MACS" type="text/html"><?php echo $ivf_treatment_plan_add->MACS->caption() ?><?php echo $ivf_treatment_plan_add->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->MACS->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_MACS" type="text/html"><span id="el_ivf_treatment_plan_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan_add->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS" id="x_MACS" value="{value}"<?php echo $ivf_treatment_plan_add->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_add->MACS->radioButtonListHtml(FALSE, "x_MACS") ?>
</div></div>
</span></script>
<?php echo $ivf_treatment_plan_add->MACS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Technique->Visible) { // Technique ?>
	<div id="r_Technique" class="form-group row">
		<label id="elh_ivf_treatment_plan_Technique" for="x_Technique" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Technique" type="text/html"><?php echo $ivf_treatment_plan_add->Technique->caption() ?><?php echo $ivf_treatment_plan_add->Technique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Technique->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Technique" type="text/html"><span id="el_ivf_treatment_plan_Technique">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x_Technique" id="x_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Technique->EditValue ?>"<?php echo $ivf_treatment_plan_add->Technique->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Technique->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->PgdPlanning->Visible) { // PgdPlanning ?>
	<div id="r_PgdPlanning" class="form-group row">
		<label id="elh_ivf_treatment_plan_PgdPlanning" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PgdPlanning" type="text/html"><?php echo $ivf_treatment_plan_add->PgdPlanning->caption() ?><?php echo $ivf_treatment_plan_add->PgdPlanning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->PgdPlanning->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PgdPlanning" type="text/html"><span id="el_ivf_treatment_plan_PgdPlanning">
<div id="tp_x_PgdPlanning" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan_add->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x_PgdPlanning" id="x_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan_add->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_add->PgdPlanning->radioButtonListHtml(FALSE, "x_PgdPlanning") ?>
</div></div>
</span></script>
<?php echo $ivf_treatment_plan_add->PgdPlanning->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->IMSI->Visible) { // IMSI ?>
	<div id="r_IMSI" class="form-group row">
		<label id="elh_ivf_treatment_plan_IMSI" for="x_IMSI" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_IMSI" type="text/html"><?php echo $ivf_treatment_plan_add->IMSI->caption() ?><?php echo $ivf_treatment_plan_add->IMSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->IMSI->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_IMSI" type="text/html"><span id="el_ivf_treatment_plan_IMSI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x_IMSI" id="x_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan_add->IMSI->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->IMSI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->SequentialCulture->Visible) { // SequentialCulture ?>
	<div id="r_SequentialCulture" class="form-group row">
		<label id="elh_ivf_treatment_plan_SequentialCulture" for="x_SequentialCulture" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_SequentialCulture" type="text/html"><?php echo $ivf_treatment_plan_add->SequentialCulture->caption() ?><?php echo $ivf_treatment_plan_add->SequentialCulture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->SequentialCulture->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_SequentialCulture" type="text/html"><span id="el_ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x_SequentialCulture" id="x_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan_add->SequentialCulture->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->SequentialCulture->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TimeLapse->Visible) { // TimeLapse ?>
	<div id="r_TimeLapse" class="form-group row">
		<label id="elh_ivf_treatment_plan_TimeLapse" for="x_TimeLapse" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TimeLapse" type="text/html"><?php echo $ivf_treatment_plan_add->TimeLapse->caption() ?><?php echo $ivf_treatment_plan_add->TimeLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TimeLapse->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TimeLapse" type="text/html"><span id="el_ivf_treatment_plan_TimeLapse">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x_TimeLapse" id="x_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan_add->TimeLapse->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->TimeLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->AH->Visible) { // AH ?>
	<div id="r_AH" class="form-group row">
		<label id="elh_ivf_treatment_plan_AH" for="x_AH" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_AH" type="text/html"><?php echo $ivf_treatment_plan_add->AH->caption() ?><?php echo $ivf_treatment_plan_add->AH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->AH->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_AH" type="text/html"><span id="el_ivf_treatment_plan_AH">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x_AH" id="x_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->AH->EditValue ?>"<?php echo $ivf_treatment_plan_add->AH->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->AH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Weight->Visible) { // Weight ?>
	<div id="r_Weight" class="form-group row">
		<label id="elh_ivf_treatment_plan_Weight" for="x_Weight" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Weight" type="text/html"><?php echo $ivf_treatment_plan_add->Weight->caption() ?><?php echo $ivf_treatment_plan_add->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Weight->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Weight" type="text/html"><span id="el_ivf_treatment_plan_Weight">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Weight->EditValue ?>"<?php echo $ivf_treatment_plan_add->Weight->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Weight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->BMI->Visible) { // BMI ?>
	<div id="r_BMI" class="form-group row">
		<label id="elh_ivf_treatment_plan_BMI" for="x_BMI" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_BMI" type="text/html"><?php echo $ivf_treatment_plan_add->BMI->caption() ?><?php echo $ivf_treatment_plan_add->BMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->BMI->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_BMI" type="text/html"><span id="el_ivf_treatment_plan_BMI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x_BMI" id="x_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->BMI->EditValue ?>"<?php echo $ivf_treatment_plan_add->BMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->BMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->MaleIndications->Visible) { // MaleIndications ?>
	<div id="r_MaleIndications" class="form-group row">
		<label id="elh_ivf_treatment_plan_MaleIndications" for="x_MaleIndications" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_MaleIndications" type="text/html"><?php echo $ivf_treatment_plan_add->MaleIndications->caption() ?><?php echo $ivf_treatment_plan_add->MaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->MaleIndications->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_MaleIndications" type="text/html"><span id="el_ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_add->MaleIndications->displayValueSeparatorAttribute() ?>" id="x_MaleIndications" name="x_MaleIndications"<?php echo $ivf_treatment_plan_add->MaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->MaleIndications->selectOptionListHtml("x_MaleIndications") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->MaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->FemaleIndications->Visible) { // FemaleIndications ?>
	<div id="r_FemaleIndications" class="form-group row">
		<label id="elh_ivf_treatment_plan_FemaleIndications" for="x_FemaleIndications" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_FemaleIndications" type="text/html"><?php echo $ivf_treatment_plan_add->FemaleIndications->caption() ?><?php echo $ivf_treatment_plan_add->FemaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->FemaleIndications->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_FemaleIndications" type="text/html"><span id="el_ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_add->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x_FemaleIndications" name="x_FemaleIndications"<?php echo $ivf_treatment_plan_add->FemaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->FemaleIndications->selectOptionListHtml("x_FemaleIndications") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->FemaleIndications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->UseOfThe->Visible) { // UseOfThe ?>
	<div id="r_UseOfThe" class="form-group row">
		<label id="elh_ivf_treatment_plan_UseOfThe" for="x_UseOfThe" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_UseOfThe" type="text/html"><?php echo $ivf_treatment_plan_add->UseOfThe->caption() ?><?php echo $ivf_treatment_plan_add->UseOfThe->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->UseOfThe->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_UseOfThe" type="text/html"><span id="el_ivf_treatment_plan_UseOfThe">
<input type="text" data-table="ivf_treatment_plan" data-field="x_UseOfThe" name="x_UseOfThe" id="x_UseOfThe" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->UseOfThe->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->UseOfThe->EditValue ?>"<?php echo $ivf_treatment_plan_add->UseOfThe->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->UseOfThe->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_ivf_treatment_plan_Ectopic" for="x_Ectopic" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Ectopic" type="text/html"><?php echo $ivf_treatment_plan_add->Ectopic->caption() ?><?php echo $ivf_treatment_plan_add->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Ectopic" type="text/html"><span id="el_ivf_treatment_plan_Ectopic">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Ectopic->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Ectopic->EditValue ?>"<?php echo $ivf_treatment_plan_add->Ectopic->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Heterotopic->Visible) { // Heterotopic ?>
	<div id="r_Heterotopic" class="form-group row">
		<label id="elh_ivf_treatment_plan_Heterotopic" for="x_Heterotopic" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Heterotopic" type="text/html"><?php echo $ivf_treatment_plan_add->Heterotopic->caption() ?><?php echo $ivf_treatment_plan_add->Heterotopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Heterotopic->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Heterotopic" type="text/html"><span id="el_ivf_treatment_plan_Heterotopic">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Heterotopic" data-value-separator="<?php echo $ivf_treatment_plan_add->Heterotopic->displayValueSeparatorAttribute() ?>" id="x_Heterotopic" name="x_Heterotopic"<?php echo $ivf_treatment_plan_add->Heterotopic->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->Heterotopic->selectOptionListHtml("x_Heterotopic") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->Heterotopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TransferDFE->Visible) { // TransferDFE ?>
	<div id="r_TransferDFE" class="form-group row">
		<label id="elh_ivf_treatment_plan_TransferDFE" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TransferDFE" type="text/html"><?php echo $ivf_treatment_plan_add->TransferDFE->caption() ?><?php echo $ivf_treatment_plan_add->TransferDFE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TransferDFE->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TransferDFE" type="text/html"><span id="el_ivf_treatment_plan_TransferDFE">
<div id="tp_x_TransferDFE" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TransferDFE" data-value-separator="<?php echo $ivf_treatment_plan_add->TransferDFE->displayValueSeparatorAttribute() ?>" name="x_TransferDFE[]" id="x_TransferDFE[]" value="{value}"<?php echo $ivf_treatment_plan_add->TransferDFE->editAttributes() ?>></div>
<div id="dsl_x_TransferDFE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_add->TransferDFE->checkBoxListHtml(FALSE, "x_TransferDFE[]") ?>
</div></div>
</span></script>
<?php echo $ivf_treatment_plan_add->TransferDFE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Evolutive->Visible) { // Evolutive ?>
	<div id="r_Evolutive" class="form-group row">
		<label id="elh_ivf_treatment_plan_Evolutive" for="x_Evolutive" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Evolutive" type="text/html"><?php echo $ivf_treatment_plan_add->Evolutive->caption() ?><?php echo $ivf_treatment_plan_add->Evolutive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Evolutive->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Evolutive" type="text/html"><span id="el_ivf_treatment_plan_Evolutive">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Evolutive" name="x_Evolutive" id="x_Evolutive" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Evolutive->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Evolutive->EditValue ?>"<?php echo $ivf_treatment_plan_add->Evolutive->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Evolutive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->Number->Visible) { // Number ?>
	<div id="r_Number" class="form-group row">
		<label id="elh_ivf_treatment_plan_Number" for="x_Number" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_Number" type="text/html"><?php echo $ivf_treatment_plan_add->Number->caption() ?><?php echo $ivf_treatment_plan_add->Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->Number->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_Number" type="text/html"><span id="el_ivf_treatment_plan_Number">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Number" name="x_Number" id="x_Number" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->Number->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->Number->EditValue ?>"<?php echo $ivf_treatment_plan_add->Number->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->Number->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->SequentialCult->Visible) { // SequentialCult ?>
	<div id="r_SequentialCult" class="form-group row">
		<label id="elh_ivf_treatment_plan_SequentialCult" for="x_SequentialCult" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_SequentialCult" type="text/html"><?php echo $ivf_treatment_plan_add->SequentialCult->caption() ?><?php echo $ivf_treatment_plan_add->SequentialCult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->SequentialCult->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_SequentialCult" type="text/html"><span id="el_ivf_treatment_plan_SequentialCult">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCult" name="x_SequentialCult" id="x_SequentialCult" size="10" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->SequentialCult->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->SequentialCult->EditValue ?>"<?php echo $ivf_treatment_plan_add->SequentialCult->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->SequentialCult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->TineLapse->Visible) { // TineLapse ?>
	<div id="r_TineLapse" class="form-group row">
		<label id="elh_ivf_treatment_plan_TineLapse" for="x_TineLapse" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_TineLapse" type="text/html"><?php echo $ivf_treatment_plan_add->TineLapse->caption() ?><?php echo $ivf_treatment_plan_add->TineLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->TineLapse->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_TineLapse" type="text/html"><span id="el_ivf_treatment_plan_TineLapse">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_TineLapse" data-value-separator="<?php echo $ivf_treatment_plan_add->TineLapse->displayValueSeparatorAttribute() ?>" id="x_TineLapse" name="x_TineLapse"<?php echo $ivf_treatment_plan_add->TineLapse->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_add->TineLapse->selectOptionListHtml("x_TineLapse") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_treatment_plan_add->TineLapse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_treatment_plan_PatientName" for="x_PatientName" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PatientName" type="text/html"><?php echo $ivf_treatment_plan_add->PatientName->caption() ?><?php echo $ivf_treatment_plan_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PatientName" type="text/html"><span id="el_ivf_treatment_plan_PatientName">
<input type="text" data-table="ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->PatientName->EditValue ?>"<?php echo $ivf_treatment_plan_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_ivf_treatment_plan_PatientID" for="x_PatientID" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PatientID" type="text/html"><?php echo $ivf_treatment_plan_add->PatientID->caption() ?><?php echo $ivf_treatment_plan_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PatientID" type="text/html"><span id="el_ivf_treatment_plan_PatientID">
<input type="text" data-table="ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->PatientID->EditValue ?>"<?php echo $ivf_treatment_plan_add->PatientID->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_treatment_plan_PartnerName" for="x_PartnerName" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PartnerName" type="text/html"><?php echo $ivf_treatment_plan_add->PartnerName->caption() ?><?php echo $ivf_treatment_plan_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PartnerName" type="text/html"><span id="el_ivf_treatment_plan_PartnerName">
<input type="text" data-table="ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->PartnerName->EditValue ?>"<?php echo $ivf_treatment_plan_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_treatment_plan_PartnerID" for="x_PartnerID" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_PartnerID" type="text/html"><?php echo $ivf_treatment_plan_add->PartnerID->caption() ?><?php echo $ivf_treatment_plan_add->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_PartnerID" type="text/html"><span id="el_ivf_treatment_plan_PartnerID">
<input type="text" data-table="ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->PartnerID->EditValue ?>"<?php echo $ivf_treatment_plan_add->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_ivf_treatment_plan_WifeCell" for="x_WifeCell" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_WifeCell" type="text/html"><?php echo $ivf_treatment_plan_add->WifeCell->caption() ?><?php echo $ivf_treatment_plan_add->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_WifeCell" type="text/html"><span id="el_ivf_treatment_plan_WifeCell">
<input type="text" data-table="ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->WifeCell->EditValue ?>"<?php echo $ivf_treatment_plan_add->WifeCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_ivf_treatment_plan_HusbandCell" for="x_HusbandCell" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_HusbandCell" type="text/html"><?php echo $ivf_treatment_plan_add->HusbandCell->caption() ?><?php echo $ivf_treatment_plan_add->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_HusbandCell" type="text/html"><span id="el_ivf_treatment_plan_HusbandCell">
<input type="text" data-table="ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->HusbandCell->EditValue ?>"<?php echo $ivf_treatment_plan_add->HusbandCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_treatment_plan_add->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_ivf_treatment_plan_CoupleID" for="x_CoupleID" class="<?php echo $ivf_treatment_plan_add->LeftColumnClass ?>"><script id="tpc_ivf_treatment_plan_CoupleID" type="text/html"><?php echo $ivf_treatment_plan_add->CoupleID->caption() ?><?php echo $ivf_treatment_plan_add->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_treatment_plan_add->RightColumnClass ?>"><div <?php echo $ivf_treatment_plan_add->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_treatment_plan_CoupleID" type="text/html"><span id="el_ivf_treatment_plan_CoupleID">
<input type="text" data-table="ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_add->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_add->CoupleID->EditValue ?>"<?php echo $ivf_treatment_plan_add->CoupleID->editAttributes() ?>>
</span></script>
<?php echo $ivf_treatment_plan_add->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_treatment_planadd" class="ew-custom-template"></div>
<script id="tpm_ivf_treatment_planadd" type="text/html">
<div id="ct_ivf_treatment_plan_add"><style>
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
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_FemaleIndications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_FemaleIndications")/}}</span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_MaleIndications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_MaleIndications")/}}</span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_ARTCYCLE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_ARTCYCLE")/}}</span>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Treatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Treatment")/}}</span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_TreatmentTec"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_TreatmentTec")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_TypeOfCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_TypeOfCycle")/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_SpermOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_SpermOrgin")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_State")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Origin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Origin")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_MACS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_MACS")/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Technique"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Technique")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_PgdPlanning"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_PgdPlanning")/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_IMSI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_IMSI")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_SequentialCulture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_SequentialCulture")/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_TimeLapse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_TimeLapse")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_AH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_AH")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Weight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Weight")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_BMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_BMI")/}}</span>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Ectopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Ectopic")/}}</span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_UseOfThe"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_UseOfThe")/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_TransferDFE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_TransferDFE")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Evolutive"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Evolutive")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Number"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Number")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_SequentialCult"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_SequentialCult")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_TineLapse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_TineLapse")/}}</span>
						</td>
												<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_treatment_plan_Heterotopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_treatment_plan_Heterotopic")/}}</span>
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

<?php
	if (in_array("ivf_outcome", explode(",", $ivf_treatment_plan->getCurrentDetailTable())) && $ivf_outcome->DetailAdd) {
?>
<?php if ($ivf_treatment_plan->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_outcome", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_outcomegrid.php" ?>
<?php } ?>
<?php
	if (in_array("ivf_stimulation_chart", explode(",", $ivf_treatment_plan->getCurrentDetailTable())) && $ivf_stimulation_chart->DetailAdd) {
?>
<?php if ($ivf_treatment_plan->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_stimulation_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_stimulation_chartgrid.php" ?>
<?php } ?>
<?php
	if (in_array("ivf_semenanalysisreport", explode(",", $ivf_treatment_plan->getCurrentDetailTable())) && $ivf_semenanalysisreport->DetailAdd) {
?>
<?php if ($ivf_treatment_plan->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_semenanalysisreport", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_semenanalysisreportgrid.php" ?>
<?php } ?>
<?php
	if (in_array("ivf_embryology_chart", explode(",", $ivf_treatment_plan->getCurrentDetailTable())) && $ivf_embryology_chart->DetailAdd) {
?>
<?php if ($ivf_treatment_plan->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_embryology_chartgrid.php" ?>
<?php } ?>
<?php if (!$ivf_treatment_plan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_treatment_plan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_treatment_plan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_treatment_plan->Rows) ?> };
	ew.applyTemplate("tpd_ivf_treatment_planadd", "tpm_ivf_treatment_planadd", "ivf_treatment_planadd", "<?php echo $ivf_treatment_plan->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_treatment_planadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_treatment_plan_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function callSaveFunction(){document.getElementById("Repagehistoryview").value="EditFunction"}function callViewFunction(){document.getElementById("Repagehistoryview").value="ViewFunction"}function callNextFunction(){document.getElementById("Repagehistoryview").value="NextFunction"}function callHomeFunction(){document.getElementById("Repagehistoryview").value="HomeFunction"}document.getElementById("Treatment").style.display="none",document.getElementById("TreatmentTec").style.display="none",document.getElementById("TypeOfCycle").style.display="none",document.getElementById("SpermOrgin").style.display="none",document.getElementById("State").style.display="none",document.getElementById("Origin").style.display="none",document.getElementById("MACS").style.display="none",document.getElementById("Technique").style.display="none",document.getElementById("PgdPlanning").style.display="none",document.getElementById("IMSI").style.display="none",document.getElementById("SequentialCulture").style.display="none",document.getElementById("TimeLapse").style.display="none",document.getElementById("AH").style.display="none",document.getElementById("Weight").style.display="none",document.getElementById("BMI").style.display="none",document.getElementById("TreatmentTreatment").style.display="none",document.getElementById("Ectopic").style.display="none",document.getElementById("use").style.display="none";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_treatment_plan_add->terminate();
?>