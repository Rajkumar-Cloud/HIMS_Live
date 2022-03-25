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
$ivf_outcome_edit = new ivf_outcome_edit();

// Run the page
$ivf_outcome_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_outcomeedit = currentForm = new ew.Form("fivf_outcomeedit", "edit");

// Validate form
fivf_outcomeedit.validate = function() {
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
		<?php if ($ivf_outcome_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->id->caption(), $ivf_outcome->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->RIDNO->caption(), $ivf_outcome->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Name->caption(), $ivf_outcome->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Age->caption(), $ivf_outcome->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->treatment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_treatment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->treatment_status->caption(), $ivf_outcome->treatment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ARTCYCLE->caption(), $ivf_outcome->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->RESULT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESULT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->RESULT->caption(), $ivf_outcome->RESULT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->status->caption(), $ivf_outcome->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->status->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->createdby->caption(), $ivf_outcome->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->createdby->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->createddatetime->caption(), $ivf_outcome->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->createddatetime->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->modifiedby->caption(), $ivf_outcome->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->modifiedby->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->modifieddatetime->caption(), $ivf_outcome->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->modifieddatetime->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->outcomeDate->Required) { ?>
			elm = this.getElements("x" + infix + "_outcomeDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->outcomeDate->caption(), $ivf_outcome->outcomeDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_outcomeDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->outcomeDate->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->outcomeDay->Required) { ?>
			elm = this.getElements("x" + infix + "_outcomeDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->outcomeDay->caption(), $ivf_outcome->outcomeDay->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_outcomeDay");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->outcomeDay->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->OPResult->Required) { ?>
			elm = this.getElements("x" + infix + "_OPResult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->OPResult->caption(), $ivf_outcome->OPResult->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Gestation->Required) { ?>
			elm = this.getElements("x" + infix + "_Gestation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Gestation->caption(), $ivf_outcome->Gestation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->TransferdEmbryos->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferdEmbryos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TransferdEmbryos->caption(), $ivf_outcome->TransferdEmbryos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->InitalOfSacs->Required) { ?>
			elm = this.getElements("x" + infix + "_InitalOfSacs");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->InitalOfSacs->caption(), $ivf_outcome->InitalOfSacs->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->ImplimentationRate->Required) { ?>
			elm = this.getElements("x" + infix + "_ImplimentationRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ImplimentationRate->caption(), $ivf_outcome->ImplimentationRate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->EmbryoNo->caption(), $ivf_outcome->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->ExtrauterineSac->Required) { ?>
			elm = this.getElements("x" + infix + "_ExtrauterineSac");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ExtrauterineSac->caption(), $ivf_outcome->ExtrauterineSac->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->PregnancyMonozygotic->Required) { ?>
			elm = this.getElements("x" + infix + "_PregnancyMonozygotic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->PregnancyMonozygotic->caption(), $ivf_outcome->PregnancyMonozygotic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->TypeGestation->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeGestation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TypeGestation->caption(), $ivf_outcome->TypeGestation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Urine->Required) { ?>
			elm = this.getElements("x" + infix + "_Urine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Urine->caption(), $ivf_outcome->Urine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->PTdate->Required) { ?>
			elm = this.getElements("x" + infix + "_PTdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->PTdate->caption(), $ivf_outcome->PTdate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Reduced->Required) { ?>
			elm = this.getElements("x" + infix + "_Reduced");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Reduced->caption(), $ivf_outcome->Reduced->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->INduced->Required) { ?>
			elm = this.getElements("x" + infix + "_INduced");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->INduced->caption(), $ivf_outcome->INduced->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->INducedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_INducedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->INducedDate->caption(), $ivf_outcome->INducedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Miscarriage->Required) { ?>
			elm = this.getElements("x" + infix + "_Miscarriage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Miscarriage->caption(), $ivf_outcome->Miscarriage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Induced1->Required) { ?>
			elm = this.getElements("x" + infix + "_Induced1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Induced1->caption(), $ivf_outcome->Induced1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Type->caption(), $ivf_outcome->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->IfClinical->Required) { ?>
			elm = this.getElements("x" + infix + "_IfClinical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->IfClinical->caption(), $ivf_outcome->IfClinical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->GADate->Required) { ?>
			elm = this.getElements("x" + infix + "_GADate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->GADate->caption(), $ivf_outcome->GADate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->GA->Required) { ?>
			elm = this.getElements("x" + infix + "_GA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->GA->caption(), $ivf_outcome->GA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->FoetalDeath->Required) { ?>
			elm = this.getElements("x" + infix + "_FoetalDeath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->FoetalDeath->caption(), $ivf_outcome->FoetalDeath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->FerinatalDeath->Required) { ?>
			elm = this.getElements("x" + infix + "_FerinatalDeath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->FerinatalDeath->caption(), $ivf_outcome->FerinatalDeath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TidNo->caption(), $ivf_outcome->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->TidNo->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->Ectopic->Required) { ?>
			elm = this.getElements("x" + infix + "_Ectopic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Ectopic->caption(), $ivf_outcome->Ectopic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Extra->Required) { ?>
			elm = this.getElements("x" + infix + "_Extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Extra->caption(), $ivf_outcome->Extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Implantation->Required) { ?>
			elm = this.getElements("x" + infix + "_Implantation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Implantation->caption(), $ivf_outcome->Implantation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->DeliveryDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->DeliveryDate->caption(), $ivf_outcome->DeliveryDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeliveryDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->DeliveryDate->errorMessage()) ?>");
		<?php if ($ivf_outcome_edit->BabyDetails->Required) { ?>
			elm = this.getElements("x" + infix + "_BabyDetails");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->BabyDetails->caption(), $ivf_outcome->BabyDetails->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->LSCSNormal->Required) { ?>
			elm = this.getElements("x" + infix + "_LSCSNormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->LSCSNormal->caption(), $ivf_outcome->LSCSNormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_edit->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Notes->caption(), $ivf_outcome->Notes->RequiredErrorMessage)) ?>");
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
fivf_outcomeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_outcomeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_outcomeedit.lists["x_Gestation"] = <?php echo $ivf_outcome_edit->Gestation->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_edit->Gestation->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Urine"] = <?php echo $ivf_outcome_edit->Urine->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_edit->Urine->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Miscarriage"] = <?php echo $ivf_outcome_edit->Miscarriage->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_edit->Miscarriage->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Induced1"] = <?php echo $ivf_outcome_edit->Induced1->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_edit->Induced1->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Type"] = <?php echo $ivf_outcome_edit->Type->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_edit->Type->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_edit->FoetalDeath->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_edit->FoetalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_edit->FerinatalDeath->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_edit->FerinatalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Ectopic"] = <?php echo $ivf_outcome_edit->Ectopic->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_edit->Ectopic->options(FALSE, TRUE)) ?>;
fivf_outcomeedit.lists["x_Extra"] = <?php echo $ivf_outcome_edit->Extra->Lookup->toClientList() ?>;
fivf_outcomeedit.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_edit->Extra->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_outcome_edit->showPageHeader(); ?>
<?php
$ivf_outcome_edit->showMessage();
?>
<form name="fivf_outcomeedit" id="fivf_outcomeedit" class="<?php echo $ivf_outcome_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_outcome_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_outcome_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_outcome_edit->IsModal ?>">
<?php if ($ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_outcome->RIDNO->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_outcome->Name->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $ivf_outcome->TidNo->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_outcome->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_outcome_id" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_id" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->id->caption() ?><?php echo ($ivf_outcome->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->id->cellAttributes() ?>>
<script id="tpx_ivf_outcome_id" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_outcome->id->CurrentValue) ?>">
<?php echo $ivf_outcome->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_outcome_RIDNO" for="x_RIDNO" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RIDNO" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->RIDNO->caption() ?><?php echo ($ivf_outcome->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<?php if ($ivf_outcome->RIDNO->getSessionValue() <> "") { ?>
<script id="tpx_ivf_outcome_RIDNO" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RIDNO->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_RIDNO" name="x_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_RIDNO" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RIDNO->EditValue ?>"<?php echo $ivf_outcome->RIDNO->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_outcome->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_outcome_Name" for="x_Name" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Name" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Name->caption() ?><?php echo ($ivf_outcome->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<?php if ($ivf_outcome->Name->getSessionValue() <> "") { ?>
<script id="tpx_ivf_outcome_Name" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Name->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_Name" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Name->EditValue ?>"<?php echo $ivf_outcome->Name->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_outcome->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_outcome_Age" for="x_Age" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Age" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Age->caption() ?><?php echo ($ivf_outcome->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Age" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Age->EditValue ?>"<?php echo $ivf_outcome->Age->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
	<div id="r_treatment_status" class="form-group row">
		<label id="elh_ivf_outcome_treatment_status" for="x_treatment_status" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_treatment_status" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->treatment_status->caption() ?><?php echo ($ivf_outcome->treatment_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_treatment_status" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->treatment_status->EditValue ?>"<?php echo $ivf_outcome->treatment_status->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->treatment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_outcome_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ARTCYCLE" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->ARTCYCLE->caption() ?><?php echo ($ivf_outcome->ARTCYCLE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ARTCYCLE" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome->ARTCYCLE->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_outcome_RESULT" for="x_RESULT" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_RESULT" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->RESULT->caption() ?><?php echo ($ivf_outcome->RESULT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RESULT" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RESULT->EditValue ?>"<?php echo $ivf_outcome->RESULT->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_outcome_status" for="x_status" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_status" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->status->caption() ?><?php echo ($ivf_outcome->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_status" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->status->EditValue ?>"<?php echo $ivf_outcome->status->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_ivf_outcome_createdby" for="x_createdby" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createdby" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->createdby->caption() ?><?php echo ($ivf_outcome->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createdby" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createdby->EditValue ?>"<?php echo $ivf_outcome->createdby->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_ivf_outcome_createddatetime" for="x_createddatetime" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_createddatetime" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->createddatetime->caption() ?><?php echo ($ivf_outcome->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createddatetime" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createddatetime->EditValue ?>"<?php echo $ivf_outcome->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->createddatetime->ReadOnly && !$ivf_outcome->createddatetime->Disabled && !isset($ivf_outcome->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->createddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_outcomeedit_js">
ew.createDateTimePicker("fivf_outcomeedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_outcome->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_ivf_outcome_modifiedby" for="x_modifiedby" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifiedby" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->modifiedby->caption() ?><?php echo ($ivf_outcome->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifiedby" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifiedby->EditValue ?>"<?php echo $ivf_outcome->modifiedby->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_ivf_outcome_modifieddatetime" for="x_modifieddatetime" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_modifieddatetime" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->modifieddatetime->caption() ?><?php echo ($ivf_outcome->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifieddatetime" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->modifieddatetime->ReadOnly && !$ivf_outcome->modifieddatetime->Disabled && !isset($ivf_outcome->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->modifieddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_outcomeedit_js">
ew.createDateTimePicker("fivf_outcomeedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_outcome->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
	<div id="r_outcomeDate" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDate" for="x_outcomeDate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->outcomeDate->caption() ?><?php echo ($ivf_outcome->outcomeDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x_outcomeDate" id="x_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDate->EditValue ?>"<?php echo $ivf_outcome->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDate->ReadOnly && !$ivf_outcome->outcomeDate->Disabled && !isset($ivf_outcome->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_outcomeedit_js">
ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_outcome->outcomeDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
	<div id="r_outcomeDay" class="form-group row">
		<label id="elh_ivf_outcome_outcomeDay" for="x_outcomeDay" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_outcomeDay" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->outcomeDay->caption() ?><?php echo ($ivf_outcome->outcomeDay->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDay" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x_outcomeDay" id="x_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDay->EditValue ?>"<?php echo $ivf_outcome->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDay->ReadOnly && !$ivf_outcome->outcomeDay->Disabled && !isset($ivf_outcome->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDay->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_outcomeedit_js">
ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_outcome->outcomeDay->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
	<div id="r_OPResult" class="form-group row">
		<label id="elh_ivf_outcome_OPResult" for="x_OPResult" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_OPResult" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->OPResult->caption() ?><?php echo ($ivf_outcome->OPResult->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<script id="tpx_ivf_outcome_OPResult" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x_OPResult" id="x_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->OPResult->EditValue ?>"<?php echo $ivf_outcome->OPResult->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->OPResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
	<div id="r_Gestation" class="form-group row">
		<label id="elh_ivf_outcome_Gestation" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Gestation" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Gestation->caption() ?><?php echo ($ivf_outcome->Gestation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Gestation" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Gestation">
<div id="tp_x_Gestation" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome->Gestation->displayValueSeparatorAttribute() ?>" name="x_Gestation" id="x_Gestation" value="{value}"<?php echo $ivf_outcome->Gestation->editAttributes() ?>></div>
<div id="dsl_x_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Gestation->radioButtonListHtml(FALSE, "x_Gestation") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Gestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<div id="r_TransferdEmbryos" class="form-group row">
		<label id="elh_ivf_outcome_TransferdEmbryos" for="x_TransferdEmbryos" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TransferdEmbryos" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->TransferdEmbryos->caption() ?><?php echo ($ivf_outcome->TransferdEmbryos->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TransferdEmbryos" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x_TransferdEmbryos" id="x_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome->TransferdEmbryos->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->TransferdEmbryos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<div id="r_InitalOfSacs" class="form-group row">
		<label id="elh_ivf_outcome_InitalOfSacs" for="x_InitalOfSacs" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_InitalOfSacs" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->InitalOfSacs->caption() ?><?php echo ($ivf_outcome->InitalOfSacs->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<script id="tpx_ivf_outcome_InitalOfSacs" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x_InitalOfSacs" id="x_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome->InitalOfSacs->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->InitalOfSacs->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<div id="r_ImplimentationRate" class="form-group row">
		<label id="elh_ivf_outcome_ImplimentationRate" for="x_ImplimentationRate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ImplimentationRate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->ImplimentationRate->caption() ?><?php echo ($ivf_outcome->ImplimentationRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ImplimentationRate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x_ImplimentationRate" id="x_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome->ImplimentationRate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->ImplimentationRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_ivf_outcome_EmbryoNo" for="x_EmbryoNo" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_EmbryoNo" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->EmbryoNo->caption() ?><?php echo ($ivf_outcome->EmbryoNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_EmbryoNo" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome->EmbryoNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<div id="r_ExtrauterineSac" class="form-group row">
		<label id="elh_ivf_outcome_ExtrauterineSac" for="x_ExtrauterineSac" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_ExtrauterineSac" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->ExtrauterineSac->caption() ?><?php echo ($ivf_outcome->ExtrauterineSac->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ExtrauterineSac" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x_ExtrauterineSac" id="x_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome->ExtrauterineSac->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->ExtrauterineSac->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<div id="r_PregnancyMonozygotic" class="form-group row">
		<label id="elh_ivf_outcome_PregnancyMonozygotic" for="x_PregnancyMonozygotic" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PregnancyMonozygotic" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?><?php echo ($ivf_outcome->PregnancyMonozygotic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PregnancyMonozygotic" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x_PregnancyMonozygotic" id="x_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome->PregnancyMonozygotic->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->PregnancyMonozygotic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
	<div id="r_TypeGestation" class="form-group row">
		<label id="elh_ivf_outcome_TypeGestation" for="x_TypeGestation" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TypeGestation" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->TypeGestation->caption() ?><?php echo ($ivf_outcome->TypeGestation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TypeGestation" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x_TypeGestation" id="x_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TypeGestation->EditValue ?>"<?php echo $ivf_outcome->TypeGestation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->TypeGestation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
	<div id="r_Urine" class="form-group row">
		<label id="elh_ivf_outcome_Urine" for="x_Urine" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Urine" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Urine->caption() ?><?php echo ($ivf_outcome->Urine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Urine" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome->Urine->displayValueSeparatorAttribute() ?>" id="x_Urine" name="x_Urine"<?php echo $ivf_outcome->Urine->editAttributes() ?>>
		<?php echo $ivf_outcome->Urine->selectOptionListHtml("x_Urine") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_outcome->Urine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
	<div id="r_PTdate" class="form-group row">
		<label id="elh_ivf_outcome_PTdate" for="x_PTdate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_PTdate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->PTdate->caption() ?><?php echo ($ivf_outcome->PTdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PTdate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x_PTdate" id="x_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PTdate->EditValue ?>"<?php echo $ivf_outcome->PTdate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->PTdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
	<div id="r_Reduced" class="form-group row">
		<label id="elh_ivf_outcome_Reduced" for="x_Reduced" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Reduced" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Reduced->caption() ?><?php echo ($ivf_outcome->Reduced->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Reduced" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x_Reduced" id="x_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Reduced->EditValue ?>"<?php echo $ivf_outcome->Reduced->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->Reduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
	<div id="r_INduced" class="form-group row">
		<label id="elh_ivf_outcome_INduced" for="x_INduced" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INduced" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->INduced->caption() ?><?php echo ($ivf_outcome->INduced->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INduced" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x_INduced" id="x_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INduced->EditValue ?>"<?php echo $ivf_outcome->INduced->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->INduced->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
	<div id="r_INducedDate" class="form-group row">
		<label id="elh_ivf_outcome_INducedDate" for="x_INducedDate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_INducedDate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->INducedDate->caption() ?><?php echo ($ivf_outcome->INducedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INducedDate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x_INducedDate" id="x_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INducedDate->EditValue ?>"<?php echo $ivf_outcome->INducedDate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->INducedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
	<div id="r_Miscarriage" class="form-group row">
		<label id="elh_ivf_outcome_Miscarriage" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Miscarriage" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Miscarriage->caption() ?><?php echo ($ivf_outcome->Miscarriage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Miscarriage" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Miscarriage">
<div id="tp_x_Miscarriage" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome->Miscarriage->displayValueSeparatorAttribute() ?>" name="x_Miscarriage" id="x_Miscarriage" value="{value}"<?php echo $ivf_outcome->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Miscarriage->radioButtonListHtml(FALSE, "x_Miscarriage") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Miscarriage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
	<div id="r_Induced1" class="form-group row">
		<label id="elh_ivf_outcome_Induced1" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Induced1" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Induced1->caption() ?><?php echo ($ivf_outcome->Induced1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Induced1" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Induced1">
<div id="tp_x_Induced1" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome->Induced1->displayValueSeparatorAttribute() ?>" name="x_Induced1" id="x_Induced1" value="{value}"<?php echo $ivf_outcome->Induced1->editAttributes() ?>></div>
<div id="dsl_x_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Induced1->radioButtonListHtml(FALSE, "x_Induced1") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Induced1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_ivf_outcome_Type" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Type" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Type->caption() ?><?php echo ($ivf_outcome->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Type" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Type">
<div id="tp_x_Type" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome->Type->displayValueSeparatorAttribute() ?>" name="x_Type" id="x_Type" value="{value}"<?php echo $ivf_outcome->Type->editAttributes() ?>></div>
<div id="dsl_x_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Type->radioButtonListHtml(FALSE, "x_Type") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
	<div id="r_IfClinical" class="form-group row">
		<label id="elh_ivf_outcome_IfClinical" for="x_IfClinical" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_IfClinical" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->IfClinical->caption() ?><?php echo ($ivf_outcome->IfClinical->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<script id="tpx_ivf_outcome_IfClinical" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x_IfClinical" id="x_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->IfClinical->EditValue ?>"<?php echo $ivf_outcome->IfClinical->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->IfClinical->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
	<div id="r_GADate" class="form-group row">
		<label id="elh_ivf_outcome_GADate" for="x_GADate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GADate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->GADate->caption() ?><?php echo ($ivf_outcome->GADate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GADate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x_GADate" id="x_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GADate->EditValue ?>"<?php echo $ivf_outcome->GADate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->GADate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
	<div id="r_GA" class="form-group row">
		<label id="elh_ivf_outcome_GA" for="x_GA" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_GA" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->GA->caption() ?><?php echo ($ivf_outcome->GA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GA" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x_GA" id="x_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GA->EditValue ?>"<?php echo $ivf_outcome->GA->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->GA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
	<div id="r_FoetalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FoetalDeath" for="x_FoetalDeath" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FoetalDeath" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->FoetalDeath->caption() ?><?php echo ($ivf_outcome->FoetalDeath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FoetalDeath" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x_FoetalDeath" name="x_FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FoetalDeath->selectOptionListHtml("x_FoetalDeath") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_outcome->FoetalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<div id="r_FerinatalDeath" class="form-group row">
		<label id="elh_ivf_outcome_FerinatalDeath" for="x_FerinatalDeath" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_FerinatalDeath" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->FerinatalDeath->caption() ?><?php echo ($ivf_outcome->FerinatalDeath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FerinatalDeath" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x_FerinatalDeath" name="x_FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FerinatalDeath->selectOptionListHtml("x_FerinatalDeath") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_outcome->FerinatalDeath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_outcome_TidNo" for="x_TidNo" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_TidNo" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->TidNo->caption() ?><?php echo ($ivf_outcome->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<?php if ($ivf_outcome->TidNo->getSessionValue() <> "") { ?>
<script id="tpx_ivf_outcome_TidNo" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TidNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_outcome_TidNo" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TidNo->EditValue ?>"<?php echo $ivf_outcome->TidNo->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_outcome->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
	<div id="r_Ectopic" class="form-group row">
		<label id="elh_ivf_outcome_Ectopic" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Ectopic" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Ectopic->caption() ?><?php echo ($ivf_outcome->Ectopic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Ectopic" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Ectopic">
<div id="tp_x_Ectopic" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome->Ectopic->displayValueSeparatorAttribute() ?>" name="x_Ectopic" id="x_Ectopic" value="{value}"<?php echo $ivf_outcome->Ectopic->editAttributes() ?>></div>
<div id="dsl_x_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Ectopic->radioButtonListHtml(FALSE, "x_Ectopic") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Ectopic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
	<div id="r_Extra" class="form-group row">
		<label id="elh_ivf_outcome_Extra" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Extra" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Extra->caption() ?><?php echo ($ivf_outcome->Extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Extra" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Extra">
<div id="tp_x_Extra" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome->Extra->displayValueSeparatorAttribute() ?>" name="x_Extra" id="x_Extra" value="{value}"<?php echo $ivf_outcome->Extra->editAttributes() ?>></div>
<div id="dsl_x_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Extra->radioButtonListHtml(FALSE, "x_Extra") ?>
</div></div>
</span>
</script>
<?php echo $ivf_outcome->Extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
	<div id="r_Implantation" class="form-group row">
		<label id="elh_ivf_outcome_Implantation" for="x_Implantation" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Implantation" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Implantation->caption() ?><?php echo ($ivf_outcome->Implantation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Implantation" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Implantation">
<input type="text" data-table="ivf_outcome" data-field="x_Implantation" name="x_Implantation" id="x_Implantation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Implantation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Implantation->EditValue ?>"<?php echo $ivf_outcome->Implantation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->Implantation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
	<div id="r_DeliveryDate" class="form-group row">
		<label id="elh_ivf_outcome_DeliveryDate" for="x_DeliveryDate" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_DeliveryDate" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->DeliveryDate->caption() ?><?php echo ($ivf_outcome->DeliveryDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_DeliveryDate" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_DeliveryDate">
<input type="text" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x_DeliveryDate" id="x_DeliveryDate" placeholder="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->DeliveryDate->EditValue ?>"<?php echo $ivf_outcome->DeliveryDate->editAttributes() ?>>
<?php if (!$ivf_outcome->DeliveryDate->ReadOnly && !$ivf_outcome->DeliveryDate->Disabled && !isset($ivf_outcome->DeliveryDate->EditAttrs["readonly"]) && !isset($ivf_outcome->DeliveryDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_outcomeedit_js">
ew.createDateTimePicker("fivf_outcomeedit", "x_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $ivf_outcome->DeliveryDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->BabyDetails->Visible) { // BabyDetails ?>
	<div id="r_BabyDetails" class="form-group row">
		<label id="elh_ivf_outcome_BabyDetails" for="x_BabyDetails" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_BabyDetails" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->BabyDetails->caption() ?><?php echo ($ivf_outcome->BabyDetails->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->BabyDetails->cellAttributes() ?>>
<script id="tpx_ivf_outcome_BabyDetails" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_BabyDetails">
<input type="text" data-table="ivf_outcome" data-field="x_BabyDetails" name="x_BabyDetails" id="x_BabyDetails" placeholder="<?php echo HtmlEncode($ivf_outcome->BabyDetails->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->BabyDetails->EditValue ?>"<?php echo $ivf_outcome->BabyDetails->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->BabyDetails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->LSCSNormal->Visible) { // LSCSNormal ?>
	<div id="r_LSCSNormal" class="form-group row">
		<label id="elh_ivf_outcome_LSCSNormal" for="x_LSCSNormal" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_LSCSNormal" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->LSCSNormal->caption() ?><?php echo ($ivf_outcome->LSCSNormal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->LSCSNormal->cellAttributes() ?>>
<script id="tpx_ivf_outcome_LSCSNormal" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_LSCSNormal">
<input type="text" data-table="ivf_outcome" data-field="x_LSCSNormal" name="x_LSCSNormal" id="x_LSCSNormal" placeholder="<?php echo HtmlEncode($ivf_outcome->LSCSNormal->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->LSCSNormal->EditValue ?>"<?php echo $ivf_outcome->LSCSNormal->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_outcome->LSCSNormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_outcome->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_ivf_outcome_Notes" for="x_Notes" class="<?php echo $ivf_outcome_edit->LeftColumnClass ?>"><script id="tpc_ivf_outcome_Notes" class="ivf_outcomeedit" type="text/html"><span><?php echo $ivf_outcome->Notes->caption() ?><?php echo ($ivf_outcome->Notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_outcome_edit->RightColumnClass ?>"><div<?php echo $ivf_outcome->Notes->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Notes" class="ivf_outcomeedit" type="text/html">
<span id="el_ivf_outcome_Notes">
<textarea data-table="ivf_outcome" data-field="x_Notes" name="x_Notes" id="x_Notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_outcome->Notes->getPlaceHolder()) ?>"<?php echo $ivf_outcome->Notes->editAttributes() ?>><?php echo $ivf_outcome->Notes->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_outcome->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_outcomeedit" class="ew-custom-template"></div>
<script id="tpm_ivf_outcomeedit" type="text/html">
<div id="ct_ivf_outcome_edit"><style>
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
$Tid = $_GET["fk_RIDNO"];//
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$Tid."'; ";
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
				<h3 class="card-title">Out Come</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_outcomeDate"/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDay"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_outcomeDay"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_OPResult"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_OPResult"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Gestation"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Gestation"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Ectopic"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Ectopic"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Extra"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Extra"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_InitalOfSacs"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_InitalOfSacs"/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_ImplimentationRate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_ImplimentationRate"/}}</span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Miscarriage"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Miscarriage"/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Induced1"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Induced1"/}}</span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Type"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Type"/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GADate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_GADate"/}}</span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GA"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_GA"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Urine"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Urine"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_PTdate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_PTdate"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$ivf_outcome_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_outcome_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_outcome_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_outcome->Rows) ?> };
ew.applyTemplate("tpd_ivf_outcomeedit", "tpm_ivf_outcomeedit", "ivf_outcomeedit", "<?php echo $ivf_outcome->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_outcomeedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_outcome_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_outcome_edit->terminate();
?>