<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_outcome_grid))
	$ivf_outcome_grid = new ivf_outcome_grid();

// Run the page
$ivf_outcome_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_grid->Page_Render();
?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>

// Form object
var fivf_outcomegrid = new ew.Form("fivf_outcomegrid", "grid");
fivf_outcomegrid.formKeyCountName = '<?php echo $ivf_outcome_grid->FormKeyCountName ?>';

// Validate form
fivf_outcomegrid.validate = function() {
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
		<?php if ($ivf_outcome_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->id->caption(), $ivf_outcome->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->RIDNO->caption(), $ivf_outcome->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Name->caption(), $ivf_outcome->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Age->caption(), $ivf_outcome->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->treatment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_treatment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->treatment_status->caption(), $ivf_outcome->treatment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ARTCYCLE->caption(), $ivf_outcome->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->RESULT->Required) { ?>
			elm = this.getElements("x" + infix + "_RESULT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->RESULT->caption(), $ivf_outcome->RESULT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->status->caption(), $ivf_outcome->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->status->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->createdby->caption(), $ivf_outcome->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->createdby->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->createddatetime->caption(), $ivf_outcome->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->createddatetime->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->modifiedby->caption(), $ivf_outcome->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->modifiedby->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->modifieddatetime->caption(), $ivf_outcome->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->modifieddatetime->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->outcomeDate->Required) { ?>
			elm = this.getElements("x" + infix + "_outcomeDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->outcomeDate->caption(), $ivf_outcome->outcomeDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_outcomeDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->outcomeDate->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->outcomeDay->Required) { ?>
			elm = this.getElements("x" + infix + "_outcomeDay");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->outcomeDay->caption(), $ivf_outcome->outcomeDay->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_outcomeDay");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->outcomeDay->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->OPResult->Required) { ?>
			elm = this.getElements("x" + infix + "_OPResult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->OPResult->caption(), $ivf_outcome->OPResult->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Gestation->Required) { ?>
			elm = this.getElements("x" + infix + "_Gestation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Gestation->caption(), $ivf_outcome->Gestation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->TransferdEmbryos->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferdEmbryos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TransferdEmbryos->caption(), $ivf_outcome->TransferdEmbryos->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->InitalOfSacs->Required) { ?>
			elm = this.getElements("x" + infix + "_InitalOfSacs");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->InitalOfSacs->caption(), $ivf_outcome->InitalOfSacs->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->ImplimentationRate->Required) { ?>
			elm = this.getElements("x" + infix + "_ImplimentationRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ImplimentationRate->caption(), $ivf_outcome->ImplimentationRate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->EmbryoNo->caption(), $ivf_outcome->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->ExtrauterineSac->Required) { ?>
			elm = this.getElements("x" + infix + "_ExtrauterineSac");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->ExtrauterineSac->caption(), $ivf_outcome->ExtrauterineSac->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->PregnancyMonozygotic->Required) { ?>
			elm = this.getElements("x" + infix + "_PregnancyMonozygotic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->PregnancyMonozygotic->caption(), $ivf_outcome->PregnancyMonozygotic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->TypeGestation->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeGestation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TypeGestation->caption(), $ivf_outcome->TypeGestation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Urine->Required) { ?>
			elm = this.getElements("x" + infix + "_Urine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Urine->caption(), $ivf_outcome->Urine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->PTdate->Required) { ?>
			elm = this.getElements("x" + infix + "_PTdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->PTdate->caption(), $ivf_outcome->PTdate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Reduced->Required) { ?>
			elm = this.getElements("x" + infix + "_Reduced");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Reduced->caption(), $ivf_outcome->Reduced->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->INduced->Required) { ?>
			elm = this.getElements("x" + infix + "_INduced");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->INduced->caption(), $ivf_outcome->INduced->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->INducedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_INducedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->INducedDate->caption(), $ivf_outcome->INducedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Miscarriage->Required) { ?>
			elm = this.getElements("x" + infix + "_Miscarriage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Miscarriage->caption(), $ivf_outcome->Miscarriage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Induced1->Required) { ?>
			elm = this.getElements("x" + infix + "_Induced1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Induced1->caption(), $ivf_outcome->Induced1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Type->caption(), $ivf_outcome->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->IfClinical->Required) { ?>
			elm = this.getElements("x" + infix + "_IfClinical");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->IfClinical->caption(), $ivf_outcome->IfClinical->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->GADate->Required) { ?>
			elm = this.getElements("x" + infix + "_GADate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->GADate->caption(), $ivf_outcome->GADate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->GA->Required) { ?>
			elm = this.getElements("x" + infix + "_GA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->GA->caption(), $ivf_outcome->GA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->FoetalDeath->Required) { ?>
			elm = this.getElements("x" + infix + "_FoetalDeath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->FoetalDeath->caption(), $ivf_outcome->FoetalDeath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->FerinatalDeath->Required) { ?>
			elm = this.getElements("x" + infix + "_FerinatalDeath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->FerinatalDeath->caption(), $ivf_outcome->FerinatalDeath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->TidNo->caption(), $ivf_outcome->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->TidNo->errorMessage()) ?>");
		<?php if ($ivf_outcome_grid->Ectopic->Required) { ?>
			elm = this.getElements("x" + infix + "_Ectopic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Ectopic->caption(), $ivf_outcome->Ectopic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Extra->Required) { ?>
			elm = this.getElements("x" + infix + "_Extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Extra->caption(), $ivf_outcome->Extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->Implantation->Required) { ?>
			elm = this.getElements("x" + infix + "_Implantation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->Implantation->caption(), $ivf_outcome->Implantation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_outcome_grid->DeliveryDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_outcome->DeliveryDate->caption(), $ivf_outcome->DeliveryDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeliveryDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_outcome->DeliveryDate->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_outcomegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "treatment_status", false)) return false;
	if (ew.valueChanged(fobj, infix, "ARTCYCLE", false)) return false;
	if (ew.valueChanged(fobj, infix, "RESULT", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "outcomeDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "outcomeDay", false)) return false;
	if (ew.valueChanged(fobj, infix, "OPResult", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gestation", false)) return false;
	if (ew.valueChanged(fobj, infix, "TransferdEmbryos", false)) return false;
	if (ew.valueChanged(fobj, infix, "InitalOfSacs", false)) return false;
	if (ew.valueChanged(fobj, infix, "ImplimentationRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryoNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExtrauterineSac", false)) return false;
	if (ew.valueChanged(fobj, infix, "PregnancyMonozygotic", false)) return false;
	if (ew.valueChanged(fobj, infix, "TypeGestation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Urine", false)) return false;
	if (ew.valueChanged(fobj, infix, "PTdate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Reduced", false)) return false;
	if (ew.valueChanged(fobj, infix, "INduced", false)) return false;
	if (ew.valueChanged(fobj, infix, "INducedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Miscarriage", false)) return false;
	if (ew.valueChanged(fobj, infix, "Induced1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Type", false)) return false;
	if (ew.valueChanged(fobj, infix, "IfClinical", false)) return false;
	if (ew.valueChanged(fobj, infix, "GADate", false)) return false;
	if (ew.valueChanged(fobj, infix, "GA", false)) return false;
	if (ew.valueChanged(fobj, infix, "FoetalDeath", false)) return false;
	if (ew.valueChanged(fobj, infix, "FerinatalDeath", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Ectopic", false)) return false;
	if (ew.valueChanged(fobj, infix, "Extra", false)) return false;
	if (ew.valueChanged(fobj, infix, "Implantation", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeliveryDate", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_outcomegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_outcomegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_outcomegrid.lists["x_Gestation"] = <?php echo $ivf_outcome_grid->Gestation->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_grid->Gestation->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Urine"] = <?php echo $ivf_outcome_grid->Urine->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_grid->Urine->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Miscarriage"] = <?php echo $ivf_outcome_grid->Miscarriage->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_grid->Miscarriage->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Induced1"] = <?php echo $ivf_outcome_grid->Induced1->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_grid->Induced1->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Type"] = <?php echo $ivf_outcome_grid->Type->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_grid->Type->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_grid->FoetalDeath->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_grid->FoetalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_grid->FerinatalDeath->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_grid->FerinatalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Ectopic"] = <?php echo $ivf_outcome_grid->Ectopic->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_grid->Ectopic->options(FALSE, TRUE)) ?>;
fivf_outcomegrid.lists["x_Extra"] = <?php echo $ivf_outcome_grid->Extra->Lookup->toClientList() ?>;
fivf_outcomegrid.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_grid->Extra->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_outcome_grid->renderOtherOptions();
?>
<?php $ivf_outcome_grid->showPageHeader(); ?>
<?php
$ivf_outcome_grid->showMessage();
?>
<?php if ($ivf_outcome_grid->TotalRecs > 0 || $ivf_outcome->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_outcome_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
<?php if ($ivf_outcome_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_outcome_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_outcomegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_outcome" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_outcomegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_outcome_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_outcome_grid->renderListOptions();

// Render list options (header, left)
$ivf_outcome_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome->id->Visible) { // id ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><div class="ew-table-header-caption"><?php echo $ivf_outcome->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><div><div id="elh_ivf_outcome_id" class="ivf_outcome_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_outcome->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><div><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><div><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><div class="ew-table-header-caption"><?php echo $ivf_outcome->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><div><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><div><div id="elh_ivf_outcome_status" class="ivf_outcome_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><div class="ew-table-header-caption"><?php echo $ivf_outcome->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><div><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><div><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_outcome->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><div><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><div><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->outcomeDate) == "") { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->outcomeDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->outcomeDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->outcomeDay) == "") { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><div class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><div><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->outcomeDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->outcomeDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->OPResult) == "") { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><div class="ew-table-header-caption"><?php echo $ivf_outcome->OPResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><div><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->OPResult->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->OPResult->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->OPResult->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Gestation) == "") { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Gestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Gestation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Gestation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TransferdEmbryos) == "") { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TransferdEmbryos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TransferdEmbryos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->InitalOfSacs) == "") { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><div class="ew-table-header-caption"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><div><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->InitalOfSacs->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->InitalOfSacs->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ImplimentationRate) == "") { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ImplimentationRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ImplimentationRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><div><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->EmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ExtrauterineSac) == "") { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><div><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ExtrauterineSac->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ExtrauterineSac->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->PregnancyMonozygotic) == "") { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><div class="ew-table-header-caption"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><div><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->PregnancyMonozygotic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->PregnancyMonozygotic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TypeGestation) == "") { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TypeGestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TypeGestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TypeGestation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TypeGestation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Urine) == "") { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Urine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Urine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Urine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->PTdate) == "") { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->PTdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->PTdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->PTdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->PTdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Reduced) == "") { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Reduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Reduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Reduced->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Reduced->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->INduced) == "") { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome->INduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><div><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->INduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->INduced->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->INduced->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->INducedDate) == "") { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->INducedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->INducedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->INducedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->INducedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Miscarriage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Miscarriage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Induced1) == "") { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Induced1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Induced1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Induced1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->IfClinical) == "") { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><div class="ew-table-header-caption"><?php echo $ivf_outcome->IfClinical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><div><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->IfClinical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->IfClinical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->IfClinical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->GADate) == "") { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->GADate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->GADate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->GADate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->GADate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->GA) == "") { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><div class="ew-table-header-caption"><?php echo $ivf_outcome->GA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><div><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->GA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->GA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->GA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->FoetalDeath) == "") { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome->FoetalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><div><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->FoetalDeath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->FoetalDeath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->FerinatalDeath) == "") { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><div><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->FerinatalDeath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->FerinatalDeath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Ectopic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Ectopic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Extra) == "") { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Implantation) == "") { ?>
		<th data-name="Implantation" class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Implantation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Implantation" class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><div><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Implantation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Implantation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Implantation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->DeliveryDate) == "") { ?>
		<th data-name="DeliveryDate" class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->DeliveryDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryDate" class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><div><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->DeliveryDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->DeliveryDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->DeliveryDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_outcome_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_outcome_grid->StartRec = 1;
$ivf_outcome_grid->StopRec = $ivf_outcome_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_outcome_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_outcome_grid->FormKeyCountName) && ($ivf_outcome->isGridAdd() || $ivf_outcome->isGridEdit() || $ivf_outcome->isConfirm())) {
		$ivf_outcome_grid->KeyCount = $CurrentForm->getValue($ivf_outcome_grid->FormKeyCountName);
		$ivf_outcome_grid->StopRec = $ivf_outcome_grid->StartRec + $ivf_outcome_grid->KeyCount - 1;
	}
}
$ivf_outcome_grid->RecCnt = $ivf_outcome_grid->StartRec - 1;
if ($ivf_outcome_grid->Recordset && !$ivf_outcome_grid->Recordset->EOF) {
	$ivf_outcome_grid->Recordset->moveFirst();
	$selectLimit = $ivf_outcome_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_outcome_grid->StartRec > 1)
		$ivf_outcome_grid->Recordset->move($ivf_outcome_grid->StartRec - 1);
} elseif (!$ivf_outcome->AllowAddDeleteRow && $ivf_outcome_grid->StopRec == 0) {
	$ivf_outcome_grid->StopRec = $ivf_outcome->GridAddRowCount;
}

// Initialize aggregate
$ivf_outcome->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_outcome->resetAttributes();
$ivf_outcome_grid->renderRow();
if ($ivf_outcome->isGridAdd())
	$ivf_outcome_grid->RowIndex = 0;
if ($ivf_outcome->isGridEdit())
	$ivf_outcome_grid->RowIndex = 0;
while ($ivf_outcome_grid->RecCnt < $ivf_outcome_grid->StopRec) {
	$ivf_outcome_grid->RecCnt++;
	if ($ivf_outcome_grid->RecCnt >= $ivf_outcome_grid->StartRec) {
		$ivf_outcome_grid->RowCnt++;
		if ($ivf_outcome->isGridAdd() || $ivf_outcome->isGridEdit() || $ivf_outcome->isConfirm()) {
			$ivf_outcome_grid->RowIndex++;
			$CurrentForm->Index = $ivf_outcome_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_outcome_grid->FormActionName) && $ivf_outcome_grid->EventCancelled)
				$ivf_outcome_grid->RowAction = strval($CurrentForm->getValue($ivf_outcome_grid->FormActionName));
			elseif ($ivf_outcome->isGridAdd())
				$ivf_outcome_grid->RowAction = "insert";
			else
				$ivf_outcome_grid->RowAction = "";
		}

		// Set up key count
		$ivf_outcome_grid->KeyCount = $ivf_outcome_grid->RowIndex;

		// Init row class and style
		$ivf_outcome->resetAttributes();
		$ivf_outcome->CssClass = "";
		if ($ivf_outcome->isGridAdd()) {
			if ($ivf_outcome->CurrentMode == "copy") {
				$ivf_outcome_grid->loadRowValues($ivf_outcome_grid->Recordset); // Load row values
				$ivf_outcome_grid->setRecordKey($ivf_outcome_grid->RowOldKey, $ivf_outcome_grid->Recordset); // Set old record key
			} else {
				$ivf_outcome_grid->loadRowValues(); // Load default values
				$ivf_outcome_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_outcome_grid->loadRowValues($ivf_outcome_grid->Recordset); // Load row values
		}
		$ivf_outcome->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_outcome->isGridAdd()) // Grid add
			$ivf_outcome->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_outcome->isGridAdd() && $ivf_outcome->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
		if ($ivf_outcome->isGridEdit()) { // Grid edit
			if ($ivf_outcome->EventCancelled)
				$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
			if ($ivf_outcome_grid->RowAction == "insert")
				$ivf_outcome->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_outcome->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_outcome->isGridEdit() && ($ivf_outcome->RowType == ROWTYPE_EDIT || $ivf_outcome->RowType == ROWTYPE_ADD) && $ivf_outcome->EventCancelled) // Update failed
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values
		if ($ivf_outcome->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_outcome_grid->EditRowCnt++;
		if ($ivf_outcome->isConfirm()) // Confirm row
			$ivf_outcome_grid->restoreCurrentRowFormValues($ivf_outcome_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_outcome->RowAttrs = array_merge($ivf_outcome->RowAttrs, array('data-rowindex'=>$ivf_outcome_grid->RowCnt, 'id'=>'r' . $ivf_outcome_grid->RowCnt . '_ivf_outcome', 'data-rowtype'=>$ivf_outcome->RowType));

		// Render row
		$ivf_outcome_grid->renderRow();

		// Render list options
		$ivf_outcome_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_outcome_grid->RowAction <> "delete" && $ivf_outcome_grid->RowAction <> "insertdelete" && !($ivf_outcome_grid->RowAction == "insert" && $ivf_outcome->isConfirm() && $ivf_outcome_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_grid->ListOptions->render("body", "left", $ivf_outcome_grid->RowCnt);
?>
	<?php if ($ivf_outcome->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_outcome->id->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_id" class="form-group ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_id" class="ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<?php echo $ivf_outcome->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RIDNO->EditValue ?>"<?php echo $ivf_outcome->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RIDNO->EditValue ?>"<?php echo $ivf_outcome->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<?php echo $ivf_outcome->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Name->EditValue ?>"<?php echo $ivf_outcome->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Name->EditValue ?>"<?php echo $ivf_outcome->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Name" class="ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<?php echo $ivf_outcome->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Age->EditValue ?>"<?php echo $ivf_outcome->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Age->EditValue ?>"<?php echo $ivf_outcome->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Age" class="ivf_outcome_Age">
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<?php echo $ivf_outcome->Age->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->treatment_status->EditValue ?>"<?php echo $ivf_outcome->treatment_status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->treatment_status->EditValue ?>"<?php echo $ivf_outcome->treatment_status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<?php echo $ivf_outcome->treatment_status->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome->ARTCYCLE->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome->ARTCYCLE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_outcome->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RESULT->EditValue ?>"<?php echo $ivf_outcome->RESULT->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RESULT->EditValue ?>"<?php echo $ivf_outcome->RESULT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<?php echo $ivf_outcome->RESULT->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_outcome->status->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_status" class="form-group ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->status->EditValue ?>"<?php echo $ivf_outcome->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_status" class="form-group ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->status->EditValue ?>"<?php echo $ivf_outcome->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_status" class="ivf_outcome_status">
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<?php echo $ivf_outcome->status->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createdby->EditValue ?>"<?php echo $ivf_outcome->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createdby->EditValue ?>"<?php echo $ivf_outcome->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createdby" class="ivf_outcome_createdby">
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<?php echo $ivf_outcome->createdby->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createddatetime->EditValue ?>"<?php echo $ivf_outcome->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->createddatetime->ReadOnly && !$ivf_outcome->createddatetime->Disabled && !isset($ivf_outcome->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createddatetime->EditValue ?>"<?php echo $ivf_outcome->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->createddatetime->ReadOnly && !$ivf_outcome->createddatetime->Disabled && !isset($ivf_outcome->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifiedby->EditValue ?>"<?php echo $ivf_outcome->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifiedby->EditValue ?>"<?php echo $ivf_outcome->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<?php echo $ivf_outcome->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->modifieddatetime->ReadOnly && !$ivf_outcome->modifieddatetime->Disabled && !isset($ivf_outcome->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->modifieddatetime->ReadOnly && !$ivf_outcome->modifieddatetime->Disabled && !isset($ivf_outcome->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate"<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDate->EditValue ?>"<?php echo $ivf_outcome->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDate->ReadOnly && !$ivf_outcome->outcomeDate->Disabled && !isset($ivf_outcome->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDate->EditValue ?>"<?php echo $ivf_outcome->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDate->ReadOnly && !$ivf_outcome->outcomeDate->Disabled && !isset($ivf_outcome->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay"<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDay->EditValue ?>"<?php echo $ivf_outcome->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDay->ReadOnly && !$ivf_outcome->outcomeDay->Disabled && !isset($ivf_outcome->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDay->EditValue ?>"<?php echo $ivf_outcome->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDay->ReadOnly && !$ivf_outcome->outcomeDay->Disabled && !isset($ivf_outcome->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDay->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult"<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->OPResult->EditValue ?>"<?php echo $ivf_outcome->OPResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->OPResult->EditValue ?>"<?php echo $ivf_outcome->OPResult->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<?php echo $ivf_outcome->OPResult->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation"<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<?php echo $ivf_outcome->Gestation->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos"<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome->TransferdEmbryos->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome->TransferdEmbryos->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<?php echo $ivf_outcome->TransferdEmbryos->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs"<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome->InitalOfSacs->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome->InitalOfSacs->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<?php echo $ivf_outcome->InitalOfSacs->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate"<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome->ImplimentationRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome->ImplimentationRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<?php echo $ivf_outcome->ImplimentationRate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome->EmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_outcome->EmbryoNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac"<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome->ExtrauterineSac->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome->ExtrauterineSac->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<?php echo $ivf_outcome->ExtrauterineSac->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic"<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome->PregnancyMonozygotic->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome->PregnancyMonozygotic->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<?php echo $ivf_outcome->PregnancyMonozygotic->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation"<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TypeGestation->EditValue ?>"<?php echo $ivf_outcome->TypeGestation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TypeGestation->EditValue ?>"<?php echo $ivf_outcome->TypeGestation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<?php echo $ivf_outcome->TypeGestation->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<td data-name="Urine"<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome->Urine->editAttributes() ?>>
		<?php echo $ivf_outcome->Urine->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome->Urine->editAttributes() ?>>
		<?php echo $ivf_outcome->Urine->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Urine" class="ivf_outcome_Urine">
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<?php echo $ivf_outcome->Urine->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate"<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PTdate->EditValue ?>"<?php echo $ivf_outcome->PTdate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PTdate->EditValue ?>"<?php echo $ivf_outcome->PTdate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<?php echo $ivf_outcome->PTdate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced"<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Reduced->EditValue ?>"<?php echo $ivf_outcome->Reduced->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Reduced->EditValue ?>"<?php echo $ivf_outcome->Reduced->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<?php echo $ivf_outcome->Reduced->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<td data-name="INduced"<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INduced->EditValue ?>"<?php echo $ivf_outcome->INduced->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INduced->EditValue ?>"<?php echo $ivf_outcome->INduced->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INduced" class="ivf_outcome_INduced">
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<?php echo $ivf_outcome->INduced->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate"<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INducedDate->EditValue ?>"<?php echo $ivf_outcome->INducedDate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INducedDate->EditValue ?>"<?php echo $ivf_outcome->INducedDate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<?php echo $ivf_outcome->INducedDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage"<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<?php echo $ivf_outcome->Miscarriage->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1"<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<?php echo $ivf_outcome->Induced1->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Type" class="ivf_outcome_Type">
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<?php echo $ivf_outcome->Type->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical"<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->IfClinical->EditValue ?>"<?php echo $ivf_outcome->IfClinical->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->IfClinical->EditValue ?>"<?php echo $ivf_outcome->IfClinical->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<?php echo $ivf_outcome->IfClinical->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<td data-name="GADate"<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GADate->EditValue ?>"<?php echo $ivf_outcome->GADate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GADate->EditValue ?>"<?php echo $ivf_outcome->GADate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GADate" class="ivf_outcome_GADate">
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<?php echo $ivf_outcome->GADate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<td data-name="GA"<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GA->EditValue ?>"<?php echo $ivf_outcome->GA->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GA->EditValue ?>"<?php echo $ivf_outcome->GA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_GA" class="ivf_outcome_GA">
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<?php echo $ivf_outcome->GA->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FoetalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FoetalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FoetalDeath->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FerinatalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FerinatalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FerinatalDeath->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_outcome->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TidNo->EditValue ?>"<?php echo $ivf_outcome->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_outcome->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TidNo->EditValue ?>"<?php echo $ivf_outcome->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<?php echo $ivf_outcome->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic"<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<?php echo $ivf_outcome->Ectopic->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<td data-name="Extra"<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Extra" class="ivf_outcome_Extra">
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<?php echo $ivf_outcome->Extra->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<td data-name="Implantation"<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<input type="text" data-table="ivf_outcome" data-field="x_Implantation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Implantation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Implantation->EditValue ?>"<?php echo $ivf_outcome->Implantation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<input type="text" data-table="ivf_outcome" data-field="x_Implantation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Implantation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Implantation->EditValue ?>"<?php echo $ivf_outcome->Implantation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_Implantation" class="ivf_outcome_Implantation">
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<?php echo $ivf_outcome->Implantation->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<td data-name="DeliveryDate"<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<input type="text" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" placeholder="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->DeliveryDate->EditValue ?>"<?php echo $ivf_outcome->DeliveryDate->editAttributes() ?>>
<?php if (!$ivf_outcome->DeliveryDate->ReadOnly && !$ivf_outcome->DeliveryDate->Disabled && !isset($ivf_outcome->DeliveryDate->EditAttrs["readonly"]) && !isset($ivf_outcome->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<input type="text" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" placeholder="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->DeliveryDate->EditValue ?>"<?php echo $ivf_outcome->DeliveryDate->editAttributes() ?>>
<?php if (!$ivf_outcome->DeliveryDate->ReadOnly && !$ivf_outcome->DeliveryDate->Disabled && !isset($ivf_outcome->DeliveryDate->EditAttrs["readonly"]) && !isset($ivf_outcome->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_outcome->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_outcome_grid->RowCnt ?>_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate">
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<?php echo $ivf_outcome->DeliveryDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_outcome->isConfirm()) { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="fivf_outcomegrid$x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->FormValue) ?>">
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="fivf_outcomegrid$o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_grid->ListOptions->render("body", "right", $ivf_outcome_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_outcome->RowType == ROWTYPE_ADD || $ivf_outcome->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_outcomegrid.updateLists(<?php echo $ivf_outcome_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_outcome->isGridAdd() || $ivf_outcome->CurrentMode == "copy")
		if (!$ivf_outcome_grid->Recordset->EOF)
			$ivf_outcome_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_outcome->CurrentMode == "add" || $ivf_outcome->CurrentMode == "copy" || $ivf_outcome->CurrentMode == "edit") {
		$ivf_outcome_grid->RowIndex = '$rowindex$';
		$ivf_outcome_grid->loadRowValues();

		// Set row properties
		$ivf_outcome->resetAttributes();
		$ivf_outcome->RowAttrs = array_merge($ivf_outcome->RowAttrs, array('data-rowindex'=>$ivf_outcome_grid->RowIndex, 'id'=>'r0_ivf_outcome', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_outcome->RowAttrs["class"], "ew-template");
		$ivf_outcome->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_outcome_grid->renderRow();

		// Render list options
		$ivf_outcome_grid->renderListOptions();
		$ivf_outcome_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_grid->ListOptions->render("body", "left", $ivf_outcome_grid->RowIndex);
?>
	<?php if ($ivf_outcome->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_id" class="form-group ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_outcome->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome->RIDNO->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<input type="text" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RIDNO->EditValue ?>"<?php echo $ivf_outcome->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RIDNO" class="form-group ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RIDNO" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_outcome->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<input type="text" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Name->EditValue ?>"<?php echo $ivf_outcome->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Name" class="form-group ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Name" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_outcome->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<input type="text" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Age->EditValue ?>"<?php echo $ivf_outcome->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Age" class="form-group ivf_outcome_Age">
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Age" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_outcome->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<input type="text" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->treatment_status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->treatment_status->EditValue ?>"<?php echo $ivf_outcome->treatment_status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_treatment_status" class="form-group ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->treatment_status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_treatment_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_outcome->treatment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<input type="text" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ARTCYCLE->EditValue ?>"<?php echo $ivf_outcome->ARTCYCLE->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ARTCYCLE" class="form-group ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->ARTCYCLE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_outcome->ARTCYCLE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<input type="text" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->RESULT->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->RESULT->EditValue ?>"<?php echo $ivf_outcome->RESULT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_RESULT" class="form-group ivf_outcome_RESULT">
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->RESULT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_RESULT" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_RESULT" value="<?php echo HtmlEncode($ivf_outcome->RESULT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<input type="text" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->status->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->status->EditValue ?>"<?php echo $ivf_outcome->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_status" class="form-group ivf_outcome_status">
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_status" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_outcome->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<input type="text" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createdby->EditValue ?>"<?php echo $ivf_outcome->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createdby" class="form-group ivf_outcome_createdby">
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createdby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_outcome->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->createddatetime->EditValue ?>"<?php echo $ivf_outcome->createddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->createddatetime->ReadOnly && !$ivf_outcome->createddatetime->Disabled && !isset($ivf_outcome->createddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_createddatetime" class="form-group ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_createddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_outcome->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<input type="text" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifiedby->EditValue ?>"<?php echo $ivf_outcome->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifiedby" class="form-group ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifiedby" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_outcome->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<input type="text" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->modifieddatetime->EditValue ?>"<?php echo $ivf_outcome->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_outcome->modifieddatetime->ReadOnly && !$ivf_outcome->modifieddatetime->Disabled && !isset($ivf_outcome->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_outcome->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_modifieddatetime" class="form-group ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_modifieddatetime" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_outcome->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDate->EditValue ?>"<?php echo $ivf_outcome->outcomeDate->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDate->ReadOnly && !$ivf_outcome->outcomeDate->Disabled && !isset($ivf_outcome->outcomeDate->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDate" class="form-group ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->outcomeDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDate" value="<?php echo HtmlEncode($ivf_outcome->outcomeDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<input type="text" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" placeholder="<?php echo HtmlEncode($ivf_outcome->outcomeDay->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->outcomeDay->EditValue ?>"<?php echo $ivf_outcome->outcomeDay->editAttributes() ?>>
<?php if (!$ivf_outcome->outcomeDay->ReadOnly && !$ivf_outcome->outcomeDay->Disabled && !isset($ivf_outcome->outcomeDay->EditAttrs["readonly"]) && !isset($ivf_outcome->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_outcomeDay" class="form-group ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->outcomeDay->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_outcomeDay" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_outcomeDay" value="<?php echo HtmlEncode($ivf_outcome->outcomeDay->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<input type="text" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" size="4" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->OPResult->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->OPResult->EditValue ?>"<?php echo $ivf_outcome->OPResult->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_OPResult" class="form-group ivf_outcome_OPResult">
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->OPResult->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_OPResult" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_OPResult" value="<?php echo HtmlEncode($ivf_outcome->OPResult->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Gestation" data-value-separator="<?php echo $ivf_outcome->Gestation->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="{value}"<?php echo $ivf_outcome->Gestation->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Gestation->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Gestation") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Gestation" class="form-group ivf_outcome_Gestation">
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Gestation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Gestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Gestation" value="<?php echo HtmlEncode($ivf_outcome->Gestation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<input type="text" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TransferdEmbryos->EditValue ?>"<?php echo $ivf_outcome->TransferdEmbryos->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TransferdEmbryos" class="form-group ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TransferdEmbryos->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TransferdEmbryos" value="<?php echo HtmlEncode($ivf_outcome->TransferdEmbryos->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<input type="text" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->InitalOfSacs->EditValue ?>"<?php echo $ivf_outcome->InitalOfSacs->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_InitalOfSacs" class="form-group ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->InitalOfSacs->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_InitalOfSacs" value="<?php echo HtmlEncode($ivf_outcome->InitalOfSacs->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<input type="text" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ImplimentationRate->EditValue ?>"<?php echo $ivf_outcome->ImplimentationRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ImplimentationRate" class="form-group ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->ImplimentationRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ImplimentationRate" value="<?php echo HtmlEncode($ivf_outcome->ImplimentationRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<input type="text" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->EmbryoNo->EditValue ?>"<?php echo $ivf_outcome->EmbryoNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_EmbryoNo" class="form-group ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->EmbryoNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_EmbryoNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_outcome->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<input type="text" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->ExtrauterineSac->EditValue ?>"<?php echo $ivf_outcome->ExtrauterineSac->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_ExtrauterineSac" class="form-group ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->ExtrauterineSac->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_ExtrauterineSac" value="<?php echo HtmlEncode($ivf_outcome->ExtrauterineSac->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<input type="text" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PregnancyMonozygotic->EditValue ?>"<?php echo $ivf_outcome->PregnancyMonozygotic->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PregnancyMonozygotic" class="form-group ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->PregnancyMonozygotic->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PregnancyMonozygotic" value="<?php echo HtmlEncode($ivf_outcome->PregnancyMonozygotic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<input type="text" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->TypeGestation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TypeGestation->EditValue ?>"<?php echo $ivf_outcome->TypeGestation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TypeGestation" class="form-group ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TypeGestation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TypeGestation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TypeGestation" value="<?php echo HtmlEncode($ivf_outcome->TypeGestation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<td data-name="Urine">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_Urine" data-value-separator="<?php echo $ivf_outcome->Urine->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine"<?php echo $ivf_outcome->Urine->editAttributes() ?>>
		<?php echo $ivf_outcome->Urine->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Urine" class="form-group ivf_outcome_Urine">
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Urine->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Urine" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Urine" value="<?php echo HtmlEncode($ivf_outcome->Urine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<input type="text" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->PTdate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->PTdate->EditValue ?>"<?php echo $ivf_outcome->PTdate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_PTdate" class="form-group ivf_outcome_PTdate">
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->PTdate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_PTdate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_PTdate" value="<?php echo HtmlEncode($ivf_outcome->PTdate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<input type="text" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Reduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Reduced->EditValue ?>"<?php echo $ivf_outcome->Reduced->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Reduced" class="form-group ivf_outcome_Reduced">
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Reduced->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Reduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Reduced" value="<?php echo HtmlEncode($ivf_outcome->Reduced->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<td data-name="INduced">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<input type="text" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INduced->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INduced->EditValue ?>"<?php echo $ivf_outcome->INduced->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INduced" class="form-group ivf_outcome_INduced">
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->INduced->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INduced" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INduced" value="<?php echo HtmlEncode($ivf_outcome->INduced->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<input type="text" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->INducedDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->INducedDate->EditValue ?>"<?php echo $ivf_outcome->INducedDate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_INducedDate" class="form-group ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->INducedDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_INducedDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_INducedDate" value="<?php echo HtmlEncode($ivf_outcome->INducedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Miscarriage" data-value-separator="<?php echo $ivf_outcome->Miscarriage->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="{value}"<?php echo $ivf_outcome->Miscarriage->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Miscarriage->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Miscarriage") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Miscarriage" class="form-group ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Miscarriage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Miscarriage" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Miscarriage" value="<?php echo HtmlEncode($ivf_outcome->Miscarriage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Induced1" data-value-separator="<?php echo $ivf_outcome->Induced1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="{value}"<?php echo $ivf_outcome->Induced1->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Induced1->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Induced1") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Induced1" class="form-group ivf_outcome_Induced1">
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Induced1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Induced1" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Induced1" value="<?php echo HtmlEncode($ivf_outcome->Induced1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<td data-name="Type">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Type" data-value-separator="<?php echo $ivf_outcome->Type->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="{value}"<?php echo $ivf_outcome->Type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Type->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Type") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Type" class="form-group ivf_outcome_Type">
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Type" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Type" value="<?php echo HtmlEncode($ivf_outcome->Type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<input type="text" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->IfClinical->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->IfClinical->EditValue ?>"<?php echo $ivf_outcome->IfClinical->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_IfClinical" class="form-group ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->IfClinical->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_IfClinical" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_IfClinical" value="<?php echo HtmlEncode($ivf_outcome->IfClinical->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<td data-name="GADate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<input type="text" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GADate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GADate->EditValue ?>"<?php echo $ivf_outcome->GADate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GADate" class="form-group ivf_outcome_GADate">
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->GADate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GADate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GADate" value="<?php echo HtmlEncode($ivf_outcome->GADate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<td data-name="GA">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<input type="text" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->GA->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->GA->EditValue ?>"<?php echo $ivf_outcome->GA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_GA" class="form-group ivf_outcome_GA">
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->GA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_GA" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_GA" value="<?php echo HtmlEncode($ivf_outcome->GA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FoetalDeath" data-value-separator="<?php echo $ivf_outcome->FoetalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FoetalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FoetalDeath" class="form-group ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->FoetalDeath->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FoetalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FoetalDeath" value="<?php echo HtmlEncode($ivf_outcome->FoetalDeath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_outcome" data-field="x_FerinatalDeath" data-value-separator="<?php echo $ivf_outcome->FerinatalDeath->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->editAttributes() ?>>
		<?php echo $ivf_outcome->FerinatalDeath->selectOptionListHtml("x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_FerinatalDeath" class="form-group ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->FerinatalDeath->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_FerinatalDeath" value="<?php echo HtmlEncode($ivf_outcome->FerinatalDeath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<?php if ($ivf_outcome->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<input type="text" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_outcome->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->TidNo->EditValue ?>"<?php echo $ivf_outcome->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_TidNo" class="form-group ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_TidNo" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_outcome->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Ectopic" data-value-separator="<?php echo $ivf_outcome->Ectopic->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="{value}"<?php echo $ivf_outcome->Ectopic->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Ectopic->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Ectopic") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Ectopic" class="form-group ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Ectopic->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Ectopic" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Ectopic" value="<?php echo HtmlEncode($ivf_outcome->Ectopic->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<td data-name="Extra">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<div id="tp_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_outcome" data-field="x_Extra" data-value-separator="<?php echo $ivf_outcome->Extra->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="{value}"<?php echo $ivf_outcome->Extra->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_outcome->Extra->radioButtonListHtml(FALSE, "x{$ivf_outcome_grid->RowIndex}_Extra") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Extra" class="form-group ivf_outcome_Extra">
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Extra->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Extra" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Extra" value="<?php echo HtmlEncode($ivf_outcome->Extra->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<td data-name="Implantation">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<input type="text" data-table="ivf_outcome" data-field="x_Implantation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_outcome->Implantation->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->Implantation->EditValue ?>"<?php echo $ivf_outcome->Implantation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_Implantation" class="form-group ivf_outcome_Implantation">
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->Implantation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_Implantation" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_Implantation" value="<?php echo HtmlEncode($ivf_outcome->Implantation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<td data-name="DeliveryDate">
<?php if (!$ivf_outcome->isConfirm()) { ?>
<span id="el$rowindex$_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<input type="text" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" placeholder="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->getPlaceHolder()) ?>" value="<?php echo $ivf_outcome->DeliveryDate->EditValue ?>"<?php echo $ivf_outcome->DeliveryDate->editAttributes() ?>>
<?php if (!$ivf_outcome->DeliveryDate->ReadOnly && !$ivf_outcome->DeliveryDate->Disabled && !isset($ivf_outcome->DeliveryDate->EditAttrs["readonly"]) && !isset($ivf_outcome->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_outcomegrid", "x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_outcome_DeliveryDate" class="form-group ivf_outcome_DeliveryDate">
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_outcome->DeliveryDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="x<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_outcome" data-field="x_DeliveryDate" name="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" id="o<?php echo $ivf_outcome_grid->RowIndex ?>_DeliveryDate" value="<?php echo HtmlEncode($ivf_outcome->DeliveryDate->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_grid->ListOptions->render("body", "right", $ivf_outcome_grid->RowIndex);
?>
<script>
fivf_outcomegrid.updateLists(<?php echo $ivf_outcome_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_outcome->CurrentMode == "add" || $ivf_outcome->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_outcome_grid->FormKeyCountName ?>" id="<?php echo $ivf_outcome_grid->FormKeyCountName ?>" value="<?php echo $ivf_outcome_grid->KeyCount ?>">
<?php echo $ivf_outcome_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_outcome->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_outcome_grid->FormKeyCountName ?>" id="<?php echo $ivf_outcome_grid->FormKeyCountName ?>" value="<?php echo $ivf_outcome_grid->KeyCount ?>">
<?php echo $ivf_outcome_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_outcome->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_outcomegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_outcome_grid->Recordset)
	$ivf_outcome_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_outcome_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_outcome_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_outcome_grid->TotalRecs == 0 && !$ivf_outcome->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_outcome_grid->terminate();
?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_outcome", "95%", "");
</script>
<?php } ?>